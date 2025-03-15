<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Quote;
use App\Models\Events;
use App\Models\Vessel;
use App\Models\Customer;
use App\Models\RFQModel;
use App\Models\FlipTovsn;
use App\Models\ItemSetup;
use App\Models\Typesetup;
use App\Reports\MyReport;
use App\Models\OrderModel;
use App\Models\BranchSetup;
use App\Models\GodownSetup;
use App\Models\RFQVendorGS;
use App\Models\VenderSetup;
use Illuminate\Support\Str;
use App\Models\CompanySetup;
use App\Models\QuoteDetails;
use Illuminate\Http\Request;
use App\Models\RFQVendorGSUAE;
use App\Models\CustomerDiscount;
use App\Models\OrderMasterModel;
use App\Models\ItemSetupNew;
use App\Models\ShipingPortSetup;
use App\Models\VenderProductList;
use GroceryCrud\Core\GroceryCrud;
use Illuminate\Support\Facades\DB;
use App\Models\RFQVendorGSForEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use PDO;
use PDOException;

class Quotation extends Controller
{



    public function SPIMPAItem(Request $request)
    {
        $param1 = $request->keywords;
        // $SPIMPAItem = DB::select('EXEC SPIMPAItem');
        $SPIMPAItem = DB::select('EXEC SPIMPAItemSearch ?', array($param1));
        info($SPIMPAItem);
        return response()->json($SPIMPAItem);
        // return DataTables::of($SPIMPAItem)->toJson();

    }

    public function index(Request $request)
    {
        $BranchCode= Auth::user()->BranchCode;
        $MWorkUser = Auth::user()->UserName;
        $quote_no = $request->quote_no;
        $quotno = $request->quote_no;
        $quote_no = ($quote_no ? $quote_no : '');
        return view('quotation.quotation_view', [
            'quote_no' => $quote_no,
            'quotno' => $quotno,
            'BranchCode' => $BranchCode,
            'MWorkUser' => $MWorkUser,
        ]);
    }





    //edit
    public function edit($ItemCode)
    {
        if (request()->ajax()) {
            $data = DB::table('QryQuoteMasterOpen')->where('ItemCode', $ItemCode)->get();
            dd($data);
            return response()->json(['data' => $data]);
        }
    }

    //pricing

    public function PricingGet(Request $request)
    {
        $quote_no = $request->input('quote_no');
        $quotesdetails = QuoteDetails::where('QuoteNo', $quote_no)->get();
        $quotesmaster = Quote::where('QuoteNo', $quote_no)->first();
        info($quotesmaster);
        $CustomerCode = $quotesmaster->CustomerCode;
        $customerdata = Customer::where('CustomerCode', $CustomerCode)->first();


        return response()->json([
            'quote_no' => $quote_no,
            'quotesdetails' => $quotesdetails,
            'quotesmaster' => $quotesmaster,
            'customerdata' => $customerdata,
        ]);
    }
    public function pricing(Request $request)
    {
        $quote_no = $request->quote_no;
        $BranchCode= Auth::user()->BranchCode;

        $quotesdetails = QuoteDetails::where('QuoteNo', $quote_no)->get();
        $quotesmaster = Quote::where('QuoteNo', $quote_no)->first();
        $CustomerName = $quotesmaster->CustomerName;
        $customerdata = Customer::where('CustomerName', $CustomerName)->first();
        $citem = $customerdata;
        $Department = Typesetup::where('BranchCode', $BranchCode)->get();


        $eventno = $quotesmaster->EventNo;
        $depname = $quotesmaster->DepartmentName;
        $depcode = $quotesmaster->DepartmentCode;
        $VesselName = $quotesmaster->VesselName;
        $eventno = $quotesmaster->EventNo;
        $QDate = $quotesmaster->QDate;
        $QDater = date('d-M-Y', strtotime($QDate));


        return view('quotation.Pricing', [
            'quotesdetails' => $quotesdetails,
            'eventno' => $eventno,
            'quote_no' => $quote_no,
            'QDater' => $QDater,
            'depcode' => $depcode,
            'depname' => $depname,
            'CustomerName' => $CustomerName,
            'VesselName' => $VesselName,
            'citem' => $citem,
            'Department' => $Department,

        ]);
    }

    public function pricestore(Request $request)
    {
        $BranchCode= Auth::user()->BranchCode;
        $EventNo = $request->EventNo;
        $QuoteNo = $request->QuoteNo;
        $ChkPricing = $request->ChkPricing;
        $data = $request->datatablearray;

        // Initialize response variables
        $success = false;
        $ChkPricings = '';
        $quotesdetails = null;

        // Process each row of the data array
        foreach ($data as $row) {
            try {
                $Id = $row['Id'];
                $Tabledata = [
                    'VendorPrice' => $row['VendorPrice'] ?? null,
                    'SuggestPrice' => $row['SuggestPrice'] ?? null,
                    'Total' => $row['Total'] ?? null,
                    'GPRate' => $row['GPRate'] ?? null,
                    'GPAmount' => $row['GPAmount'] ?? null,
                    'TotalCost' => $row['TotalCost'] ?? null
                ];

                // Find the record and update if it exists
                $quotesdetails = QuoteDetails::find($Id);
                if ($quotesdetails) {
                    $quotesdetails->update($Tabledata);
                    Log::info("Record with ID {$Id} updated successfully.");
                    $success = true;
                } else {
                    Log::warning("Record with ID {$Id} not found.");
                }
            } catch (\Exception $e) {
                Log::error("Error updating record with ID {$Id}: " . $e->getMessage());
            }
        }

        // Update the QuoteMaster based on ChkPricing
        try {
            $QuoteMaster = Quote::where([
                'EventNo' => $EventNo,
                'QuoteNo' => $QuoteNo,
                'BranchCode' => $BranchCode
            ])->first();

            if ($QuoteMaster) {
                $ChkPricingValue = $ChkPricing ? 1 : 0;
                $QuoteMaster->update([
                    'ChkPricing' => $ChkPricingValue,
                    'WorkSellPricied' => Auth::user()->UserName
                ]);
                $ChkPricings = $ChkPricing ? 'saved' : 'remove';
                Log::info("QuoteMaster updated successfully for QuoteNo {$QuoteNo}.");
            } else {
                Log::warning("QuoteMaster not found for EventNo {$EventNo} and QuoteNo {$QuoteNo}.");
            }
        } catch (\Exception $e) {
            Log::error("Error updating QuoteMaster: " . $e->getMessage());
        }

        // Return JSON response
        return response()->json([
            'Message' => $success,
            'quote_no' => $QuoteNo,
            'quotesdetails' => $quotesdetails,
            'ChkPricing' => $ChkPricings
        ]);
    }

    //pricing
    public function rfqstore(Request $request)
    {
        try {
            // Initial setup
            $BranchCode= Auth::user()->BranchCode;
            $EventNo = $request->input('event_no');
            $QuoteNo = $request->input('quote_no');
            $DepartmentCode = $request->input('depcode');
            $DepartmentName = $request->input('DepartmentName');
            $ChkCosting = $request->input('ChkCosting', false);
            $data = $request->input('dataarray');

            // Initialize response variables
            $success = false;
            $error = null;
            $ChkCostingStatus = '';

            foreach ($data as $row) {
                $ID = $row['ID'] ?? null;

                // Validate required fields
                if (!$ID) {
                    Log::warning("Skipping row due to missing ID.");
                    continue;
                }

                $TableData = [
                    'VendorPrice' => $row['vendorcosta'] ?? null,
                    'VendorName' => $row['Vendor1'] ?? null,
                ];

                // Update QuoteDetails
                $quotesdetails = QuoteDetails::where('Id', $ID)
                    ->where('BranchCode', $BranchCode)
                    ->first();

                if ($quotesdetails) {
                    $quotesdetails->update($TableData);
                    Log::info("QuoteDetails updated for ID: {$ID}.");
                } else {
                    Log::warning("QuoteDetails not found for ID: {$ID}.");
                }

                // Prepare data for RFQ table
                $rfqData = [
                    'DepartmentCode' => $DepartmentCode,
                    'DepartmentName' => $DepartmentName,
                    'SKU' => $row['ItemCode'] ?? null,
                    'Description' => $row['ItemName'] ?? null,
                    'Qty' => $row['Qty'] ?? 0,
                    'CustUOM' => $row['PUOM'] ?? null,
                    'Vendor1' => $row['Vendor1'] ?? null,
                    'Cost1' => $row['vendorcosta'] ?? 0,
                    'ExtCost' => $row['vendorextcosta'] ?? 0,
                    'Vendor2' => $row['Vendor2'] ?? null,
                    'Cost2' => $row['Cost2'] ?? 0,
                    'ExtCost2' => $row['ExtCost2'] ?? 0,
                    'Vendor3' => $row['Vendor3'] ?? null,
                    'Cost3' => $row['Cost3'] ?? 0,
                    'ExtCost3' => $row['ExtCost3'] ?? 0,
                    'Vendor4' => $row['Vendor4'] ?? null,
                    'Cost4' => $row['Cost4'] ?? 0,
                    'ExtCost4' => $row['ExtCost4'] ?? 0,
                    'VendorCode1' => $row['VendorCode1'] ?? null,
                    'VendorCode2' => $row['VendorCode2'] ?? null,
                    'VendorCode3' => $row['VendorCode3'] ?? null,
                    'VendorCode4' => $row['VendorCode4'] ?? null,
                    'IMPACode' => $row['IMPAItemCode'] ?? null,
                ];

                // Insert or update RFQ table
                DB::table('rfq')->updateOrInsert(
                    ['QuoteNo' => $QuoteNo, 'EventNo' => $EventNo, 'BranchCode' => $BranchCode, 'QuoteID' => $ID],
                    $rfqData
                );

                Log::info("RFQ record inserted/updated for ID: {$ID}.");
            }

            // Update QuoteMaster ChkCosting flag
            $QuoteMaster = Quote::where('EventNo', $EventNo)
                ->where('QuoteNo', $QuoteNo)
                ->where('BranchCode', $BranchCode)
                ->first();

            if ($QuoteMaster) {
                $QuoteMaster->update([
                    'ChkCosting' => $ChkCosting ? 1 : 0,
                    'WorkUserCosted' => $ChkCosting ? Auth::user()->UserName : '',
                ]);

                $ChkCostingStatus = $ChkCosting ? 'saved' : 'removed';
                Log::info("QuoteMaster updated: ChkCosting {$ChkCostingStatus}.");
            } else {
                Log::warning("QuoteMaster not found for QuoteNo: {$QuoteNo}.");
            }

            // Success response
            $success = true;
            $message = 'RFQ has been updated successfully!';
        } catch (\Exception $e) {
            // Handle exceptions
            Log::error("Error in rfqstore method: " . $e->getMessage());
            $success = false;
            $error = 'An error occurred while updating RFQ.';
            $message = $error;
        }

        // Return JSON response
        return response()->json([
            'success' => $success,
            'message' => $message,
            'error' => $error,
            'ChkCosting' => $ChkCostingStatus,
        ]);
    }

    public function FillEmailOnly(Request $request)
    {
        $MBranchCode = Auth::user()->BranchCode;
        $MWorkUser = Auth::user()->UserName;
        $MCurrency = config('app.Currency');

        // Input validation
        $validatedData = $request->validate([
            'QuoteNo' => 'required|string',
            'EventNo' => 'required|string',
            'table' => 'required|array',
            'CHKVENDORALL' => 'required|string',
            'TxtVendorNameEmail' => 'nullable|string',
        ]);

        $QuoteNo = $validatedData['QuoteNo'];
        $EventNo = $validatedData['EventNo'];
        $table = $validatedData['table'];
        $CHKVENDORALL = $validatedData['CHKVENDORALL'];

        $TxtVendorCodeSendEmail = "";

        // Cleanup previous data
        RFQVendorGSForEmail::where([
            'WorkUser' => $MWorkUser,
            'QuoteNo' => $QuoteNo,
            'EventNo' => $EventNo,
            'BranchCode' => $MBranchCode
        ])->delete();

        // Map vendor fields dynamically
        $vendorMap = [
            'Vendor 1' => ['VendorCode1', 'Vendor1'],
            'Vendor 2' => ['VendorCode2', 'Vendor2'],
            'Vendor 3' => ['VendorCode3', 'Vendor3'],
            'Vendor 4' => ['VendorCode4', 'Vendor4'],
            'Vendor 5' => ['VendorCode5', 'Vendor5']
        ];
        DB::transaction(function () use ($table, $CHKVENDORALL, $vendorMap, $request, $QuoteNo, $EventNo, $MBranchCode, $MWorkUser, $MCurrency, &$TxtVendorCodeSendEmail) {
            // Determine vendors to process
            $vendorCount = $CHKVENDORALL === 'true' ? 5 : 1;
            $TxtVendorNameEmail = $CHKVENDORALL === 'true' ? null : $request->input('TxtVendorNameEmail');
            $CompanySetup = CompanySetup::first();

            for ($MCount = 1; $MCount <= $vendorCount; $MCount++) {
                $currentVendor = $TxtVendorNameEmail ?? "Vendor $MCount";
                $vendorFields = $vendorMap[$currentVendor] ?? null;

                if (!$vendorFields) {
                    continue;
                }
                $tableCount = (int) count($table);
                info($tableCount);
                foreach ($table as $row) {
                    if (!isset($row['MChkExport']) || !in_array($row['MChkExport'], ['true', 1, '1'])) {
                        continue;
                    }

                    $MVendorCode = $row[$vendorFields[0]] ?? null;
                    $MVendorName = $row[$vendorFields[1]] ?? null;

                    if ($MVendorCode) {
                        $TxtVendorCodeSendEmail .= $TxtVendorCodeSendEmail ? ",$MVendorCode" : $MVendorCode;

                        // Retrieve vendor details
                        $vendorDetails = VenderSetup::where('BranchCode', $MBranchCode)
                            ->where('VenderCode', $MVendorCode)
                            ->first();

                        // Insert into RFQVendorGSForEmail
                        RFQVendorGSForEmail::updateOrCreate([
                            'QuoteNo' => $QuoteNo,
                            'EventNo' => $EventNo,
                            'VendorCode' => $MVendorCode,
                            'BranchCode' => $MBranchCode,
                            'WorkUser' => $MWorkUser,
                        ], [
                            'VendorName' => $vendorDetails->VenderName ?? $MVendorName,
                            'VendorEmail' => $vendorDetails->EmailAddress ?? null,
                        ]);
                        info($MBranchCode);
                        info($MBranchCode . $EventNo . $QuoteNo);
                        $dbh = new PDO("odbc:mssql_odbcG", "global", "Po60ps&1");
                        $dbh->query("delete rfqvendorgs where SNO > ". $tableCount." and QuoteNo = '". $QuoteNo ."' and EventNo = '". $EventNo ."' and BranchCode = '". $MBranchCode ."'");

                        // Remove excessive SNO entries
                        // RFQVendorGS::where('SNO', '>', count($table))
                        //     ->where('QuoteNo', $QuoteNo)
                        //     ->where('EventNo', $EventNo)
                        //     ->where('BranchCode', $MBranchCode)
                        //     ->delete();


                       // Check if SNO exists
                       $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        $query = $dbh->prepare("SELECT COUNT(*) FROM rfqvendorgs WHERE SNO = :SNO and VendorCode = :VendorCode and QuoteNo = :QuoteNo and EventNo = :EventNo");
                        $query->execute(['SNO' => $row['SNo'], 'VendorCode' => $MVendorCode, 'QuoteNo' => $QuoteNo, 'EventNo' => $EventNo]);
                        $count = $query->fetchColumn();

                        $dbh = new PDO("odbc:mssql_odbcG", "global", "Po60ps&1");
                        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        if ($count > 0) {
                            $sql = "UPDATE rfqvendorgs SET
                                EntryType = 'QUOTE',
                                VendorName = '".$MVendorName."',
                                BranchCode = '".$MBranchCode."',
                                CustomerRefNo = '".$request->input('TxtCustRefNo')."',
                                DepartmentCode = '".$request->input('TxtDepartmentCode')."',
                                DepartmentName = '".$request->input('CmbDepartment')."',
                                PortCode = '".$request->input('TxtGodownCode')."',
                                PortName = '".$request->input('CmdGodownName')."',
                                RequiredDate = '".$request->input('TxtReqDate')."',
                                RequiredTime = '".$request->input('TxtReqTime')."',
                                ETADate = '".$request->input('TxtETADAte')."',
                                SendDate = '".date('Y-m-d')."',
                                SendTime = '".date('H:i:s')."',
                                ProductCode = '".$row['ItemCode']."',
                                ProductName = '".$row['ItemName']."',
                                Qty = '".$row['Qty']."',
                                UOM = '".$row['PUOM']."',
                                UnitPrice = '".$row['SuggestPrice']."',
                                IMPACode = '".$row['IMPAItemCode']."',
                                Currency = '".$MCurrency."',
                                WorkUSer = '".$MWorkUser."',
                                CompanyName = '".$CompanySetup->CompanyName."',
                                CompanyAddress = '".$CompanySetup->CompanyAddress."',
                                CompanyEmailAddress = '".$CompanySetup->EmailAddress."',
                                CompanyWebSite = '".$CompanySetup->WebsiteAddress."',
                                CompanyPhoneNo = '".$CompanySetup->PhoneNo."',
                                CompanyFaxNo = '".$CompanySetup->FaxNo."',
                                Address = '".$vendorDetails->Address."',
                                PhoneNo = '".$vendorDetails->PhoneNo."',
                                VendorEmail = '".$vendorDetails->EmailAddress."'
                            WHERE SNO = '".$row['SNo']."'
                                AND VendorCode = '".$MVendorCode."'
                                AND QuoteNo = '".$QuoteNo."'
                                AND EventNo = '".$EventNo."'";

                            $dbh->query($sql);


                        } else {
                            $sql = "INSERT INTO rfqvendorgs (
                                EntryType, SNO, EventNo, QuoteNo, VendorCode, VendorName, BranchCode, CustomerRefNo, DepartmentCode,
                                DepartmentName, PortCode, PortName, RequiredDate, RequiredTime,
                                ETADate, SendDate, SendTime, ProductCode, ProductName, Qty,
                                UOM, UnitPrice, IMPACode, Currency, WorkUSer, CompanyName,
                                CompanyAddress, CompanyEmailAddress, CompanyWebSite,
                                CompanyPhoneNo, CompanyFaxNo, Address, PhoneNo, VendorEmail
                            ) VALUES (
                                'QUOTE',
                                '".$row['SNo']."',
                                '".$EventNo."',
                                '".$QuoteNo."',
                                '".$MVendorCode."',
                                '".$MVendorName."',
                                '".$MBranchCode."',
                                '".$request->input('TxtCustRefNo')."',
                                '".$request->input('TxtDepartmentCode')."',
                                '".$request->input('CmbDepartment')."',
                                '".$request->input('TxtGodownCode')."',
                                '".$request->input('CmdGodownName')."',
                                '".$request->input('TxtReqDate')."',
                                '".$request->input('TxtReqTime')."',
                                '".$request->input('TxtETADAte')."',
                                '".date('Y-m-d')."',
                                '".date('H:i:s')."',
                                '".$row['ItemCode']."',
                                '".$row['ItemName']."',
                                '".$row['Qty']."',
                                '".$row['PUOM']."',
                                '".$row['SuggestPrice']."',
                                '".$row['IMPAItemCode']."',
                                '".$MCurrency."',
                                '".$MWorkUser."',
                                '".$CompanySetup->CompanyName."',
                                '".$CompanySetup->CompanyAddress."',
                                '".$CompanySetup->EmailAddress."',
                                '".$CompanySetup->WebsiteAddress."',
                                '".$CompanySetup->PhoneNo."',
                                '".$CompanySetup->FaxNo."',
                                '".$vendorDetails->Address."',
                                '".$vendorDetails->PhoneNo."',
                                '".$vendorDetails->EmailAddress."'
                            )";

                    $dbh->query($sql);

                        }

                    }
                }
            }
        });

        // Fetch and return results
        $results = RFQVendorGSForEmail::select(
            'VendorCode',
            'VendorName',
            'VendorEmail',
            DB::raw('COUNT(VendorCode) as MNoOfLines')
        )
            ->where('QuoteNo', $QuoteNo)
            ->where('BranchCode', $MBranchCode)
            ->groupBy('VendorCode', 'VendorName', 'VendorEmail')
            ->get();

        return response()->json([
            'message' => 'Saved',
            'results' => $results,
        ]);
    }

    public function vplatsend(Request $request)
    {
        // Configurations
        $MBranchCode = Auth::user()->BranchCode;
        $MUserName = config('app.MUserName');

        // Validate Request Data
        $validatedData = $request->all();

        $quoteno = $validatedData['quoteno'];
        $eventno = $validatedData['eventno'];
        $WarehouseName = $validatedData['WarehouseName'];
        $MailTable = $validatedData['MailTable'];

        // Log the incoming request for debugging
        info('vplatsend request:', $request->all());

        // Email Sender Config
        $defaultEmail = "naeemulhaq06@gmail.com";
        // $defaultEmail = "zofatech.itsol@gmail.com";
        $fromEmail = 'shipchandling@christmasquarter.com';
        $emailSubject = "Vplat Quote Email";

        // Email Content Template
        $emailTitle = 'GLOBAL SHIP SERVICES - Request For Quotes';
        $emailBody = "Please find the link below and provide your best cost and availability for: {$WarehouseName}";

        // Process Mail Table
        foreach ($MailTable as $row) {
            if ($row['ChkSend'] !== 'true') {
                continue; // Skip rows where ChkSend is not true
            }

            // Extract details with fallback to default email
            $vendorCode = $row['VendorCode'];
            $vendorEmail = !empty($row['Email']) ? $row['Email'] : $defaultEmail;

            // Prepare Email Data
            $data = [
                'title' => "{$emailTitle} Event #: \"{$eventno}\" Quote #: \"{$quoteno}\"",
                'body' => $emailBody,
                'QuoteNo' => $quoteno,
                'Link' => "http://shipchandling.christmasquarter.com/Vplat-Quote?quoteNo={$quoteno}&VendorCode={$vendorCode}&BranchCode={$MBranchCode}",
            ];

            // Send Email
            Mail::send('emails.Vendoremail', $data, function ($message) use ($vendorEmail, $fromEmail, $emailSubject) {
                $message->to($vendorEmail)->subject($emailSubject);
                $message->from($fromEmail, 'Vplatform');
            });

            // Log email sending for traceability
            info("Email sent to VendorCode: {$vendorCode}, Email: {$vendorEmail}");
        }

        // Return Success Response
        return response()->json([
            'message' => 'Price sent successfully',
            'Code' => 'Success',
            'quoteno' => $quoteno,
        ]);
    }

    public function RFQ(Request $request)
    {
        // Configurations
        $BranchCode= Auth::user()->BranchCode;
        $PVendorCode = config('app.PVendorCode');

        // Request Input
        $quote_no = $request->input('quote_no', '');

        // Fetch Common Data
        $Department = Typesetup::where('BranchCode', $BranchCode)->get();
        $GodownSetup = GodownSetup::where('BranchCode', $BranchCode)->get();

        // Initialize vendors
        $vendors = null;

        // Fetch Vendors if Quote Number is Provided
        if (!empty($quote_no)) {
            $quotesmaster = Quote::where('QuoteNo', $quote_no)->first();

            if ($quotesmaster) {
                $depcode = $quotesmaster->DepartmentCode;

                $vendors = DB::table('qryvendordepartment')
                    ->select('VenderName', 'VenderCode')
                    ->distinct()
                    ->where(function ($query) {
                        $query->where('ChkInactive', 0)
                            ->orWhereNull('ChkInactive');
                    })
                    ->where('ChkSelect', 1)
                    ->where('TypeCode', $depcode)
                    ->where('BranchCode', $BranchCode)
                    ->orderBy('VenderName')
                    ->get();
            }
        }

        // Return View
        return view('quotation.rfq', [
            'quote_no' => $quote_no,
            'vendors' => $vendors,
            'Department' => $Department,
            'GodownSetup' => $GodownSetup,
        ]);
    }

    public function RFQvplatGet(Request $request)
    {
        // Fetch configurations
        $BranchCode= Auth::user()->BranchCode;

        // Retrieve input
        $QuoteNo = $request->input('QuoteNo');

        // Fetch QuoteMaster Record
        $quotesmaster = Quote::where('QuoteNo', $QuoteNo)
            ->where('BranchCode', $BranchCode)
            ->first();

        // Handle missing QuoteNo or QuoteMaster
        if (!$quotesmaster) {
            return response()->json([
                'message' => 'Quote not found.',
                'BranchCode' => $BranchCode,
                'results' => [],
            ], 404);
        }

        // Retrieve Event Number
        $EventNo = $quotesmaster->EventNo;

        // Fetch RFQ Results
        // $results = RFQVendorGS::select(
        //     'EventNo',
        //     'DepartmentCode',
        //     'DepartmentName',
        //     'CustomerRefNo',
        //     'PortCode',
        //     'PortName',
        //     'RequiredDate',
        //     'RequiredTime',
        //     'ETADate',
        //     'SendDate',
        //     'SendTime',
        //     'WorkUser',
        //     'SNo',
        //     'ProductName',
        //     'Qty',
        //     'UOM',
        //     'UnitPrice',
        //     'VendorName',
        //     'SendCustomerNote',
        //     'SendVendorNote',
        //     'VendorRcvdPrice',
        //     DB::raw('(Qty * VendorRcvdPrice) as MTotCost'),
        //     'ReceivedDate',
        //     'ReceivedTime',
        //     'VendorCode',
        //     'VendorRecRemarks',
        //     'ProductCode'
        // )
        //     ->where([
        //         ['EventNo', '=', $EventNo],
        //         ['QuoteNo', '=', $QuoteNo],
        //         ['BranchCode', '=', $BranchCode],
        //     ])
        //     ->orderBy('VendorCode')
        //     ->orderBy('SNo')
        //     ->orderBy('ID')
        //     ->get();
        $dbh = new PDO("odbc:mssql_odbcG", "global", "Po60ps&1");

        $sql = "SELECT
            EventNo,
            DepartmentCode,
            DepartmentName,
            CustomerRefNo,
            PortCode,
            PortName,
            RequiredDate,
            RequiredTime,
            ETADate,
            SendDate,
            SendTime,
            WorkUser,
            SNo,
            ProductName,
            Qty,
            UOM,
            UnitPrice,
            VendorName,
            SendCustomerNote,
            SendVendorNote,
            VendorRcvdPrice,
            (Qty * VendorRcvdPrice) AS MTotCost,
            ReceivedDate,
            ReceivedTime,
            VendorCode,
            VendorRecRemarks,
            ProductCode
        FROM rfqvendorgs
        WHERE EventNo = :EventNo
        AND QuoteNo = :QuoteNo
        AND BranchCode = :BranchCode
        ORDER BY VendorCode, SNo, ID";

// Prepare and execute the query
$stmt = $dbh->prepare($sql);
$stmt->execute([
    ':EventNo'   => $EventNo,
    ':QuoteNo'   => $QuoteNo,
    ':BranchCode'=> $BranchCode
]);

// Fetch all results as an associative array
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Return JSON Response
        return response()->json([
            'quotesmaster' => $quotesmaster,
            'results' => $results,
            'BranchCode' => $BranchCode,
        ]);
    }

    public function RFQvplatView(Request $request)
    {
        $BranchCode= Auth::user()->BranchCode;
        $PVendorCode = config('app.PVendorCode');
        $quote_no = $request->quote_no;
        $quote_no = ($quote_no ? $quote_no : '');
        $Department = Typesetup::where('BranchCode', $BranchCode)->get();
        $GodownSetup = GodownSetup::where('BranchCode', $BranchCode)->get();

        return view('quotation.RfqVplatview', [
            'quote_no' => $quote_no,
            'Department' => $Department,
            'GodownSetup' => $GodownSetup,
            'BranchCode' => $BranchCode,


        ]);
    }
    public function RFQGet(Request $request)
    {
        // Retrieve configurations
        $BranchCode= Auth::user()->BranchCode;
        $PVendorCode = config('app.PVendorCode');
        $quote_no = $request->input('quote_no');

        // Get the quote master record
        $quotesmaster = Quote::where('QuoteNo', $quote_no)
            ->where('BranchCode', $BranchCode)
            ->first();

        // If quote is not found, return an error response
        if (!$quotesmaster) {
            return response()->json([
                'message' => 'Quote not found',
                'status' => 'error',
            ], 404);
        }

        // Extract department code and event number
        $depcode = $quotesmaster->DepartmentCode;
        $eventno = $quotesmaster->EventNo;
        $QuoteNo = $quote_no;

        // Retrieve vendors based on department code and branch
        $vendors = DB::table('qryvendordepartment')
            ->select('VenderName', 'VenderCode')
            ->distinct()
            ->whereNull('ChkInactive')
            ->orWhere('ChkInactive', 0)
            ->where('ChkSelect', 1)
            ->where('TypeCode', $depcode)
            ->where('BranchCode', $BranchCode)
            ->orderBy('VenderName')
            ->get();

        // Fetch quote details using a subquery for RFQ data
        $rfq = QuoteDetails::select('*')
            ->fromSub(function ($query) use ($eventno, $QuoteNo, $BranchCode, $PVendorCode) {
                $query->select(
                    'M.VendorCode',
                    'M.IMPAItemCode',
                    'M.SNo',
                    'M.ItemCode',
                    'M.ItemName',
                    'M.Qty',
                    'M.PUOM',
                    'M.SuggestPrice',
                    'M.Updated',
                    'M.ID',
                    'M.VendorNotes',
                    'M.CustomerNotes',
                    'M.VendorName',
                    'M.VendorPrice',
                    'M.UpdatedDate',
                    'M.Freight',
                    'M.FreightRate',
                    'M.VendorPartNo',
                    'rfq.VendorNotes AS VendorNotes1',
                    'rfq.VendorNotes2',
                    'rfq.VendorNotes3',
                    'rfq.VendorNotes4',
                    'rfq.VendorNotes5',
                    'rfq.Vendor1',
                    'rfq.VendorCode1',
                    'rfq.RFQ1',
                    'rfq.RFQDate1',
                    'rfq.Cost1',
                    'rfq.ExtCost',
                    'rfq.Vendor2',
                    'rfq.VendorCode2',
                    'rfq.RFQ2',
                    'rfq.RFQDate2',
                    'rfq.Cost2',
                    'rfq.ExtCost2',
                    'rfq.Vendor3',
                    'rfq.VendorCode3',
                    'rfq.RFQ3',
                    'rfq.RFQDate3',
                    'rfq.Cost3',
                    'rfq.ExtCost3',
                    'rfq.Vendor4',
                    'rfq.VendorCode4',
                    'rfq.RFQ4',
                    'rfq.RFQDate4',
                    'rfq.Cost4',
                    'rfq.ExtCost4',
                    'rfq.Vendor5',
                    'rfq.VendorCode5',
                    'rfq.RFQ5',
                    'rfq.RFQDate5',
                    'rfq.Cost5',
                    'rfq.ExtCost5',
                    'rfq.ChkCompleteRFQ',
                    'M.WorkUser',
                    'rfq.WorkUser2',
                    'rfq.WorkUser3',
                    'rfq.WorkUser4',
                    'rfq.WorkUser5',
                    'rfq.VendorPartNo2',
                    'rfq.VendorPartNo3',
                    'rfq.VendorPartNo4',
                    'rfq.VendorPartNo5',
                    'M.LastDate'
                )
                    ->from('quotedetails as M')
                    ->leftJoin('rfq', 'rfq.QuoteID', '=', 'M.ID')
                    ->where('M.EventNo', $eventno)
                    ->where('M.QuoteNo', $QuoteNo)
                    ->where('M.BranchCode', $BranchCode)
                    ->where('M.VendorCode', '<>', $PVendorCode)
                    ->where(function ($query) {
                        $query->where('M.VPart', '<>', 'C')
                            ->orWhereNull('M.VPart')
                            ->orWhere('M.VendorPrice', 0);
                    });
            }, 'aa')
            ->orderBy('aa.SNo')
            ->orderBy('aa.ID')
            ->get();

        // Return the JSON response
        return response()->json([
            'quotesmaster' => $quotesmaster,
            'rfq' => $rfq,
            'vendors' => $vendors,
            'BranchCode' => $BranchCode,
        ]);
    }







    public function FlipFillAgent(Request $request)
    {
        $MBranchCode = Auth::user()->BranchCode;
        $WorkUser = Auth::user()->UserName;
        $TxtAgentCode = $request->input('TxtAgentCode');

        $FillAgentContactPerson = DB::table('agentcontactpersondetail')->where('AgentCode', $TxtAgentCode)->where('BranchCode', $MBranchCode)->orderBy('AgentContactPerson')->get();

        return response()->json([
            'FillAgentContactPerson' => $FillAgentContactPerson,

        ]);
    }

    public function flipdataget(Request $request)
    {
        $MBranchCode = Auth::user()->BranchCode;
        $WorkUser = Auth::user()->UserName;
        $EventNo = $request->input('EventNo');
        $quoteno = $request->input('quoteno');

        $Quotes = Quote::where('EventNo', $EventNo)->where('BranchCode', $MBranchCode)->orderBy('QuoteNo', 'desc')->get();
        $EventInvoice = DB::table('qryeventinvoice')->where('EventNo', $EventNo)->where('BranchCode', $MBranchCode)->where('VesselName', '<>', '')->first();
        $vsndata = FlipTovsn::where('EventNo', $EventNo)->where('BranchCode', $MBranchCode)->first();
        $Dt1 = null;
        if ($EventInvoice) {
            $Dt1 = Customer::where('CustomerCode', $EventInvoice->CustomerCode)->first();
        }




        return response()->json([
            'EventInvoice' => $EventInvoice,
            'Quotes' => $Quotes,
            'quoteno' => $quoteno,
            'vsndata' => $vsndata,
            'Dt1' => $Dt1,
        ]);
    }

    public function fliptovsn(Request $request)
    {
        $branch_code = Auth::user()->BranchCode;
        $user = Auth::user()->UserName;
        $EventNo = $request->EventNo;
        $quoteno = $request->quoteno;
        $AgentSetup = DB::table('agentsetup')->where('CusCode', '<>', '')->where('BranchCode', $branch_code)->orderBy('CusCode')->get();
        $ShipingPortSetup = ShipingPortSetup::where('BranchCode', $branch_code)->orderBy('PortCode')->get();
        $GodownSetup = GodownSetup::where('BranchCode', $branch_code)->get();





        return view('quotation.FlipToVsn', [
            'user' => $user,
            'EventNo' => $EventNo,
            'GodownSetup' => $GodownSetup,
            'quoteno' => $quoteno,
            'AgentSetup' => $AgentSetup,
            'ShipingPortSetup' => $ShipingPortSetup,
        ]);
    }



    public function flipsavetwo(Request $request)
    {



        $BranchCode= Auth::user()->BranchCode;
        $MWorkUser = Auth::user()->UserName;

        // info($request->all());
        $PVSNNo = $request->VSNNo;
        // $fliptovsn = FlipToVSN::where('VSNNo',$VSNNo)->where('BranchCode',$BranchCode)->first();
        $EventNo = $request->EventNo;
        $OrderDate = $request->OrderDate;
        $DeliveryDate = $request->DeliveryDate;
        $Time = $request->Time;
        $Port = $request->Port;
        $Location = $request->Location;

        $Agency = $request->Agency;
        $Agent = $request->CmbAgent;
        $GeneralNotes = $request->VSNGeneralNotesNo;
        $Confirmation = $request->Confirmation;
        $AvailCredit = $request->AvailCredit;
        $TotalQuote = $request->TotalQuote;
        $NoOfQuote = $request->NoOfQuote;
        $TotalFlip = $request->TotalFlip;
        $CustomerName = $request->CustomerName;
        $CustomerCode = $request->CustomerCode;
        $IMONO = $request->TxtIMONO;
        $VesselName = $request->VesselName;
        $flipdata = $request->inputValues;
        $Quotauons = [];
        $Message = '';


        if (!$PVSNNo) {
            $MVSNNO = FlipTovsn::where('BranchCode', $BranchCode)->max('VSNNO');
            $PVSNNo = intval($MVSNNO + 1);
        }

        $Rs = FlipTovsn::where('VSNNo', $PVSNNo)->where('BranchCode', $BranchCode)->first();
        if (!$Rs) {
            $Rs = new FlipTovsn;
            $Rs->VSNNo = $PVSNNo;
        }
        $Rs->VSNNo = $PVSNNo;
        $Rs->EventNo = $EventNo;
        $Rs->OrderDate = $OrderDate;
        $Rs->DeliveryDate = $DeliveryDate;
        $Rs->Time = $Time;
        $Rs->Location = $Location;
        $Rs->Port = $Port;
        $Rs->Confirmation = $Confirmation;
        $Rs->Agency = $Agency;
        $Rs->Des = $GeneralNotes;
        $Rs->AvailCredit = $AvailCredit;
        $Rs->FlipAmount = $TotalQuote;
        $Rs->NoOfQuote = $NoOfQuote;
        $Rs->TotalFlip = $TotalFlip;
        $Rs->BranchCode = $BranchCode;
        $Rs->CustomerName = $CustomerName;
        $Rs->VesselName = $VesselName;
        $Rs->WorkUser = $MWorkUser;
        $Rs->GeneralVesselNote = $GeneralNotes;
        $Rs->Agent = $Agent;
        $Rs->AgentCode = $request->input('TxtAgentCode');
        $Rs->AgentCPCode = $request->input('TxtAgentCPCode');
        $Rs->AgentCPName = $Agent;

        info('$FlipToVSN');
        info($Rs);
        $Rs->save();


        for ($i = 0; $i < count($flipdata); $i++) {


            $MQuoteNo = $flipdata[$i]['quoteNo'];
            $Rs1 = '';
            $Rs1 = Quote::where('QuoteNo', $MQuoteNo)->where('BranchCode', $BranchCode)->first();

            if ($Rs1) {
                $Rs1->VSNNo = $PVSNNo;
                $Rs1->ChkUpload = 'E';

                $Rs2 = DB::table('logremarks')->Select('Code', 'LogStatus', 'StatusColor')->where('Code', 5)->where('BranchCode', $BranchCode)->first();
                if ($Rs2) {
                    $Rs1->StatusCode = $Rs2->Code;
                    $Rs1->Status = $Rs2->LogStatus;
                    $Rs1->StatusColorCode = $Rs2->StatusColor;
                } else {
                    $Rs1->StatusCode = 0;
                    $Rs1->Status = '';
                    $Rs1->StatusColorCode = '';
                }
                $Rs1->save();
            }
            $Quotauons[] = [
                'Quoteno' => $MQuoteNo,
            ];
        }
        Quote::where('EventNo', $EventNo)->where('BranchCode', $BranchCode)->update(['ChkFlip' => 0]);



        $MQuoteNo = "";
        for ($i = 0; $i < count($flipdata); $i++) {
            $MQuoteNo = $flipdata[$i]['quoteNo'];
            if (intval($MQuoteNo) > 0) {
                Quote::where('QuoteNo', $MQuoteNo)->where('BranchCode', $BranchCode)->update(['ChkFlip' => 1]);
            } else {
                Quote::where('QuoteNo', $MQuoteNo)->where('BranchCode', $BranchCode)->update(['ChkFlip' => 0]);
            }
        }
        $lbldate = date('Y-m-d');
        $MChargeNo11 = "";
        $NCrNoteAmt = "";
        $MRVAmount = "";
        $MCrNoteAmount = "";
        $MInvAmt = "";
        $MNetAmount = "";
        $MBalance = "";

        $MAmount = "";
        $MNDays = "";
        $MTotalRec = "";

        $orders = OrderMasterModel::select(
            'PONo',
            'VSNNo',
            'InvDate',
            'Terms',
            'DueDate',
            DB::raw('TIMESTAMPDIFF(DAY, InvDate, CURRENT_TIMESTAMP) as NDays'),
            'CustomerName',
            'CustomerCode',
            'VesselName',
            'Department',
            'CustomerRefNo',
            'Status',
            'ChqNo',
            'RVNo',
            'CrNoteAmount',
            'NetAmount'
        )
            ->where('Status', 'INVOICED')
            ->where('VesselName', $VesselName)
            ->where('CustomerCode', $CustomerCode)
            ->where('BranchCode', $BranchCode)
            ->where('InvDate', '<=', $lbldate)
            ->orderBy('CustomerCode')
            ->orderBy('InvDate')
            ->orderBy('PONo')
            ->get();

        if (count($orders) > 0) {
            foreach ($orders as $key => $Row) {
                $MNDays = $Row->NDays;
                if (intval($MNDays) > 90) {
                    $MChargeNo11 = $Row->PONo ? $Row->PONo : '';
                    $MNetAmount = $Row->NetAmount ? $Row->NetAmount : '';
                    $NCrNoteAmt = DB::table('creditnote')->where('BranchCode', $BranchCode)->where('ClientOrderNo', $MChargeNo11)->sum('CrNoteAmt');
                    $MCrNoteAmount = $Row->CrNoteAmount ? $Row->CrNoteAmount : '';
                    $MRVAmount = DB::table('receiptvoucher')->where('BranchCode', $BranchCode)->where('ClientOrderNo', $MChargeNo11)->sum('Amount');
                    $MTotalRec = intval($MRVAmount) + intval($MCrNoteAmount) + intval($NCrNoteAmt);
                    $MBalance = round(intval($MNetAmount), 2) - round(intval($MTotalRec), 2);
                    $MNDays = $Row->NDays ? $Row->NDays : 0;
                    if (intval($MBalance) > 0 && intval($MNDays) > 90) {
                        $MAmount = intval($MAmount) + intval($MBalance);
                    }
                    if (intval($MAmount) > 0) {
                        Vessel::where('CustomerCode', $CustomerCode)->where('VesselName', $VesselName)->update(['Block' => 'Y']);
                    }
                }
            }
        }


        $Rs = FlipTovsn::where('VSNNo', $PVSNNo)->where('BranchCode', $BranchCode)->first();
        $Rs1 = Events::where('EventNo', $EventNo)->where('BranchCode', $BranchCode)->first();

        if ($Rs1) {

            $Rs->GodownCode = $Rs1->GodownCode;
            $Rs->GodownName = $Rs1->GodownName;
            $Rs->EventNo = $EventNo;
            $Rs->GeneralVesselNote = $Rs1->GeneralVesselNote;
            $Rs->Note = $Rs1->Note;
            $Rs->ETA = $Rs1->ETA;
            $Rs->Contact = $Rs1->Contact;
            $Rs->ContactID = $Rs1->ContactID;
            $Rs->CustomerName = $Rs1->CustomerName;
            $Rs->VesselName = $Rs1->VesselName;
            $Rs->Phone = $Rs1->Phone;
            $Rs->Cell = $Rs1->Cell;
            $Rs->BidDUeDate = $Rs1->BidDUeDate;
            $Rs->DueTime = $Rs1->DueTime;
            $Rs->ShippingPort = $Port;
            $Rs->Note = $GeneralNotes;
            $Rs->Name = $Rs1->Name;
            $Rs->Email = $Rs1->Email;
            $Rs->Fax = $Rs1->Fax;
            $Rs->Status = "Pending";
            $Rs->ReturnVia = $Rs1->ReturnVia;
            $Rs->Priority = $Rs1->Priority;
            $Rs->CustomerCode = $Rs1->CustomerCode;
            $Rs->IMONo = $Rs1->IMONo;
            $Rs->Department = $Rs1->Department;
            $Rs->CustomerRef = $Rs1->CustomerRef;
            $Rs->BidDUeDate2 = $Rs1->BidDUeDate2;
            $Rs->ReturnVia2 = $Rs1->ReturnVia2;
            $Rs->EventCreatedUser = $Rs1->EventCreatedUser;
            $Rs->EventCreatedDate = $Rs1->EventCreatedDate;
            $Rs->EventCreatedTime = $Rs1->EventCreatedTime;
            $Rs->BranchCode = $BranchCode;
            $Rs->PVID = $Rs1->PVID;
            $Rs->save();
        }


        return response()->json([
            'Message' => 'Quotion Fliped',
            'Quotion' => $Quotauons,
            'PEventNo' => $EventNo,

        ]);
    }
    private function getNextVSN($BranchCode)
    {
        $sqlvsnno = DB::select("SELECT MAX(VSNNO) as MVSNNO FROM FlipToVSN WHERE BranchCode = ?", [$BranchCode]);
        return strval($sqlvsnno[0]->MVSNNO + 1);
    }

    // Helper function to get the next Flip Order No
    private function getNextFlipOrderNo($flipOrderNo, $BranchCode)
    {
        if (is_null($flipOrderNo)) {
            $mpono = DB::select("SELECT MAX(FlipOrderNo) as MPONO FROM QuoteMaster WHERE BranchCode = ?", [$BranchCode]);
            return $mpono[0]->MPONO + 1;
        } else {
            return $flipOrderNo[0];
        }
    }

    private function createOrderMaster($lastvsn, $lastpnop, $getdata, $actcode, $EstLineQuoteup, $Termsup)
    {
        $OrderMaster = new OrderMasterModel([

            "VSNNo" => $lastvsn,
            "EventNo" => $getdata['EventNo'],
            "QuoteNo" => $getdata['QuoteNo'],
            "PONo" => $lastpnop,
            "VesselRefNo" => $getdata['VesselRefNo'],
            "Department" => $getdata['Department'],
            "CustomerRefNo" => $getdata['CustomerRefNo'],
            "Terms" => $Termsup,
            "BranchCode" => $getdata['BranchCode'],
            "ExtAmount" => $getdata['ExtAmount'],
            "EstLines" => $EstLineQuoteup,
            "CustomerName" => $actcode->CustomerName,
            "VesselName" => $actcode->VesselName,
            "Location" => $getdata['Location'],
            "Buyer" => $getdata['Buyer'],
            "POMadeNO" => $getdata['POMadeNO'],
            "POMadeDate" => $getdata['POMadeDate'],
            "CustomerCode" => $getdata['CustomerCode'],
            "BContactPerson" => $getdata['BContactPerson'],
            "BillingAddress" => $getdata['BillingAddress'],
            "BTelephoneNo" => $getdata['BTelephoneNo'],
            "BFaxNo" => $getdata['BFaxNo'],
            "BEmailAddress" => $getdata['BEmailAddress'],
            "BWeb" => $getdata['BWeb'],
            "Status" => $getdata['Status'],
            "Country" => $getdata['Country'],
            "CusCode" => $getdata['CusCode'],
            "InternalComments" => $getdata['InternalComments'],
            "City" => $getdata['City'],
            "DispatchDate" => $getdata['DispatchDate'],
            "DispatchTime" => $getdata['DispatchTime'],
            "DeliveryDes" => $getdata['DeliveryDes'],
            "InvDiscPer" => $getdata['InvDiscPer'],
            "InvDiscAmt" => $getdata['InvDiscAmt'],
            "NetAmount" => $getdata['NetAmount'],
            "InvDate" => $getdata['InvDate'],
            "InvTime" => $getdata['InvTime'],
            "OrderQty" => $getdata['OrderQty'],
            "RecQty" => $getdata['RecQty'],
            "DeliveredQty" => $getdata['DeliveredQty'],
            "RtnQty" => $getdata['RtnQty'],
            "MissingQty" => $getdata['MissingQty'],
            "SoldQty" => $getdata['SoldQty'],
            "PurchaseOrderNo" => $getdata['PurchaseOrderNo'],
            "OrderDate" => $getdata['OrderDate'],
            "PullQty" => $getdata['PullQty'],
            "PullDate" => $getdata['PullDate'],
            "PullTime" => $getdata['PullTime'],
            "PullDes" => $getdata['PullDes'],
            "DeliveryOrderNo" => $getdata['DeliveryOrderNo'],
            "TotGPAmt" => $getdata['TotGPAmt'],
            "VendorActCode" => $getdata['VendorActCode'],
            "ChkDirectDelivery" => $getdata['ChkDirectDelivery'],
            "Des" => $getdata['Des'],
            "CustomerActCode" => $getdata['CustomerActCode'],
            "CostAmt" => $getdata['CostAmt'],
            "GPPer" => $getdata['GPPer'],
            "VSNInvoiceNo" => $getdata['VSNInvoiceNo'],
            "CreateInvoice" => $getdata['CreateInvoice'],
            "GPCostAmt" => $getdata['GPCostAmt'],
            "Atten" => $getdata['Atten'],
            "ReceivedAmt" => $getdata['ReceivedAmt'],
            "PaidAmt" => $getdata['PaidAmt'],
            "BankInfo" => $getdata['BankInfo'],
            "VATPer" => $getdata['VATPer'],
            "VATAmt" => $getdata['VATAmt'],
            "DeliveryCharges" => $getdata['DeliveryCharges'],
            "WorkUserActive" => $getdata['WorkUserActive'],
            "DepartmentCode" => $getdata['DepartmentCode'],
            "DepartmentName" => $getdata['DepartmentName'],
            "Oe" => $getdata['Oe'],
            "ReturnVia" => $getdata['ReturnVia'],
            "EstLineQuote" => $getdata['EstLineQuote'],
            "CstItems" => $getdata['CstItems'],
            "PricingItems" => $getdata['PricingItems'],
            "BidDueDate" => $getdata['BidDueDate'],
            "DueTime" => $getdata['DueTime'],
            "DiscPer" => $getdata['DiscPer'],
            "GSTPer" => $getdata['GSTPer'],
            "QDate" => $getdata['QDate'],
            "QTime" => $getdata['QTime'],
            "ChkQuoteEntry" => $getdata['ChkQuoteEntry'],
            "ChkCosting" => $getdata['ChkCosting'],
            "ChkPricing" => $getdata['ChkPricing'],
            "QsentDate" => $getdata['QsentDate'],
            "QSenttime" => $getdata['QSenttime'],
            "Header" => $getdata['Header'],
            "ValueAmount" => $getdata['ValueAmount'],
            "CostAmount" => $getdata['CostAmount'],
            "GPAmount" => $getdata['GPAmount'],
            "StatusColorCode" => $getdata['StatusColorCode'],
            "StatusCode" => $getdata['StatusCode'],
            "CustCode" => $getdata['CustCode'],
            "Freight" => $getdata['Freight'],
            "WorkUser" => $getdata['WorkUser'],
            "USDRate" => $getdata['USDRate'],
            "comments" => $getdata['comments'],
            "GivenDisc" => $getdata['GivenDisc'],
            "AgentCode" => $getdata['AgentCode'],
            "AgentName" => $getdata['AgentName'],
            "AgentPer" => $getdata['AgentPer'],
            "PortCode" => $getdata['PortCode'],
            "PortName" => $getdata['PortName'],
            "Priority" => $getdata['Priority'],
            "SaleReturnQty" => $getdata['SaleReturnQty'],
            "SaleReturnAmount" => $getdata['SaleReturnAmount'],
            "ChkSendEmail" => $getdata['ChkSendEmail'],
            "DueDate" => $getdata['DueDate'],
            "CrNoteAmt" => $getdata['CrNoteAmt'],
            "SaleReturnDate" => $getdata['SaleReturnDate'],
            "SaleReturnTime" => $getdata['SaleReturnTime'],
            "ChqNo" => $getdata['ChqNo'],
            "ShippedDate" => $getdata['ShippedDate'],
            "ShippedTime" => $getdata['ShippedTime'],
            "LadingNo" => $getdata['LadingNo'],
            "ChkShipped" => $getdata['ChkShipped'],
            "RVNo" => $getdata['RVNo'],
            "GodownCode" => $getdata['GodownCode'],
            "GodownName" => $getdata['GodownName'],
            "VendorDiscPer" => $getdata['VendorDiscPer'],
            "RvDate" => $getdata['RvDate'],
            "CrNotePer" => $getdata['CrNotePer'],
            "AVIRebatePer" => $getdata['AVIRebatePer'],
            "AgentCommPer" => $getdata['AgentCommPer'],
            "SlsCommPer" => $getdata['SlsCommPer'],
            "CrNoteAmount" => $getdata['CrNoteAmount'],
            "AVIRebateAmt" => $getdata['AVIRebateAmt'],
            "AgentCommAmt" => $getdata['AgentCommAmt'],
            "SlsCommAmt" => $getdata['SlsCommAmt'],
            "VesselCode" => $getdata['VesselCode'],
            "ChkSevenSeasDelivery" => $getdata['ChkSevenSeasDelivery'],
            "PullStockPDFPath" => $getdata['PullStockPDFPath'],
            "PullTicketPrintedDate" => $getdata['PullTicketPrintedDate'],
            "ChkPullTicketPrinted" => $getdata['ChkPullTicketPrinted'],
            "StockPulledDateTime" => $getdata['StockPulledDateTime'],
            "ChkStockPulled" => $getdata['ChkStockPulled']
        ]);
        $OrderMaster->save();
    }
    private function processQuoteDetails($quoteNo, $lastvsn, $lastpnop, $request, $actcode)
    {
        $quoteDetails = QuoteDetails::where('QuoteNo', $quoteNo)->get();
        $BranchCode= Auth::user()->BranchCode;

        foreach ($quoteDetails as $detail) {
            OrderModel::create([
                "PONO" => $lastpnop,
                "OrderDate" => $request->oderdate,
                "VSNNo" => $lastvsn,
                "EventNo" => $detail->EventNo,
                "QuoteNo" => $detail->QuoteNo,
                "ItemCode" => $detail->ItemCode,
                "ItemName" => $detail->ItemName,
                "Qty" => $detail->Qty,
                "PUOM" => $detail->PUOM,
                "Price" => $detail->Price,
                "EstPrice" => $detail->EstPrice,
                "BranchCode" => $BranchCode,
                "DepartmentName" => $actcode['DepartmentName'],
                "STKBuyOut" => $detail->STKBuyOut,
                "ProductName" => $detail->ProductName,
                "Freight" => $detail->Freight,
                "GPAmount" => $detail->GPAmount,
                "VendorName" => $detail->VendorName,
                "VendorPrice" => $detail->VendorPrice,
                "OurPrice" => $detail->OurPrice,
                "OriginName" => $detail->OriginName,
                "VPart" => $detail->VPart,
                "CustomerNotes" => $detail->CustomerNotes,
                "VendorNotes" => $detail->VendorNotes,
                "InternalBuyerNotes" => $detail->InternalBuyerNotes,
                "VendorCode" => $detail->VendorCode,
                "VCategoryName" => $detail->VCategoryName,
                "GPRate" => $detail->GPRate,
                "LastDate" => $detail->LastDate,
                "Alternative" => $detail->Alternative,
                "OurUOM" => $detail->OurUOM,
                "DiscIncomePer" => $detail->DiscIncomePer,
                "DiscIncomeAmt" => $detail->DiscIncomeAmt,
                "IMPA" => $detail->IMPA,
                "SNo" => $detail->SNo,
                "CostPrice" => $detail->CostPrice,
                "GodownCode" => $detail->GodownCode,
                "QDate" => $detail->QDate,
                "CustomerName" => $detail->CustomerName,
                "VesselName" => $detail->VesselName,
                "SuggestPrice" => $detail->SuggestPrice,
                "Total" => $detail->Total,
                "Updated" => $detail->Updated,
                "TotalCost" => $detail->TotalCost,
                "IMPAItemCode" => $detail->IMPAItemCode,
                "PortCode" => $detail->PortCode,
                "PortName" => $detail->PortName,
                "OrderAmount" => $detail->OrderAmount,
                "AgentCode" => $detail->AgentCode,
                "AgentName" => $detail->AgentName,
                "AgentPer" => $detail->AgentPer,
                "UpdatedDate" => $detail->UpdatedDate,
                "FreightRate" => $detail->FreightRate,
                "HasmateNo" => $detail->HasmateNo,
                "HasmateWeight" => $detail->HasmateWeight,
                "HasMate" => $detail->HasMate,
                "GodownName" => $detail->GodownName,
                "DiscPerVendor" => $detail->DiscPerVendor,
                "VendorActCode" => $detail->VendorActCode,
                "Cost" => $detail->Cost,
                "VendorPartNo" => $detail->VendorPartNo
            ]);
        }
    }
    private function updateOrderDetails($quoteNo, $lastvsn, $lastpnop, $request, $actcode)
    {
        $quoteDetails = QuoteDetails::where('QuoteNo', $quoteNo)->get();
        $BranchCode= Auth::user()->BranchCode;

        foreach ($quoteDetails as $detail) {
            OrderModel::where('QuoteNo', $quoteNo)->update([
                "PONO" => $lastpnop,
                "OrderDate" => $request->oderdate,
                "VSNNo" => $lastvsn,
                "EventNo" => $detail->EventNo,
                "ItemCode" => $detail->ItemCode,
                "ItemName" => $detail->ItemName,
                "Qty" => $detail->Qty,
                "PUOM" => $detail->PUOM,
                "Price" => $detail->Price,
                "EstPrice" => $detail->EstPrice,
                "BranchCode" => $BranchCode,
                "DepartmentName" => $actcode['DepartmentName'],
                "STKBuyOut" => $detail->STKBuyOut,
                "ProductName" => $detail->ProductName,
                "Freight" => $detail->Freight,
                "GPAmount" => $detail->GPAmount,
                "VendorName" => $detail->VendorName,
                "VendorPrice" => $detail->VendorPrice,
                "OurPrice" => $detail->OurPrice,
                "OriginName" => $detail->OriginName,
                "VPart" => $detail->VPart,
                "CustomerNotes" => $detail->CustomerNotes,
                "VendorNotes" => $detail->VendorNotes,
                "InternalBuyerNotes" => $detail->InternalBuyerNotes,
                "VendorCode" => $detail->VendorCode,
                "VCategoryName" => $detail->VCategoryName,
                "GPRate" => $detail->GPRate,
                "LastDate" => $detail->LastDate,
                "Alternative" => $detail->Alternative,
                "OurUOM" => $detail->OurUOM,
                "DiscIncomePer" => $detail->DiscIncomePer,
                "DiscIncomeAmt" => $detail->DiscIncomeAmt,
                "IMPA" => $detail->IMPA,
                "SNo" => $detail->SNo,
                "CostPrice" => $detail->CostPrice,
                "GodownCode" => $detail->GodownCode,
                "QDate" => $detail->QDate,
                "CustomerName" => $detail->CustomerName,
                "VesselName" => $detail->VesselName,
                "SuggestPrice" => $detail->SuggestPrice,
                "Total" => $detail->Total,
                "Updated" => $detail->Updated,
                "TotalCost" => $detail->TotalCost,
                "IMPAItemCode" => $detail->IMPAItemCode,
                "PortCode" => $detail->PortCode,
                "PortName" => $detail->PortName,
                "OrderAmount" => $detail->OrderAmount,
                "AgentCode" => $detail->AgentCode,
                "AgentName" => $detail->AgentName,
                "AgentPer" => $detail->AgentPer,
                "UpdatedDate" => $detail->UpdatedDate,
                "FreightRate" => $detail->FreightRate,
                "HasmateNo" => $detail->HasmateNo,
                "HasmateWeight" => $detail->HasmateWeight,
                "HasMate" => $detail->HasMate,
                "GodownName" => $detail->GodownName,
                "DiscPerVendor" => $detail->DiscPerVendor,
                "VendorActCode" => $detail->VendorActCode,
                "Cost" => $detail->Cost,
                "VendorPartNo" => $detail->VendorPartNo
            ]);
        }
    }
    public function fliptovsnsave(Request $request)
    {
        // Get the branch code and current time
        $BranchCode= Auth::user()->BranchCode;
        $time = Carbon::now();

        // Ensure flip data is available, otherwise default to an empty array
        $checkbox = $request->flip ?? [0];

        // Loop through the flip data provided in the request
        foreach ($checkbox as $key => $cvalue) {

            // If '1' is found in the checkbox array, proceed with the logic
            if ($cvalue == 1) {
                $recvsn = $request->VSNNoo;

                // Prepare flip data for saving
                $flipdata = [
                    "ID" => $request->ID,
                    "QuoteNo" => $request->QuoteNo,
                    "CustomerRefNo" => $request->CustomerRefNo,
                    "ValueAmount" => $request->ValueAmount,
                    "EstLineQuote" => $request->EstLineQuote,
                    "VSNNo" => $request->VSNNo,
                    "FlipOrderNo" => $request->FlipOrderNo,
                    "FlipDAte" => $request->FlipDAte,
                    "flip" => $request->flip,
                    "Terms" => $request->Terms,
                ];

                // Handle VSN number if not provided
                $lastvsn = $recvsn ?: $this->getNextVSN($BranchCode);

                // Handle Flip Order No if not provided
                $lastpnop = $this->getNextFlipOrderNo($flipdata['FlipOrderNo'], $BranchCode);

                // Check if this FlipToVSN record already exists
                $FlipToVSN = FlipTovsn::where('VSNNo', $flipdata['VSNNo'])
                    ->where('BranchCode', $BranchCode)
                    ->first();

                // Retrieve quote data
                $getdata = Quote::where('QuoteNo', $flipdata['QuoteNo'])->first();
                $eventdata = Events::where('EventNo', $getdata['EventNo'])->first();

                // Retrieve OrderMaster record
                $OrderMasterg = OrderMasterModel::where('PONo', $lastpnop)->first();

                // Get Event Number and related data
                $EventNo = $getdata['EventNo'];
                $actcode = Events::where('EventNo', $EventNo)->first();

                // Process terms and estimated line quote
                $Termsup = implode('', $flipdata['Terms']);
                $EstLineQuoteup = implode('', $flipdata['EstLineQuote']);
                if (is_null($OrderMasterg)) {
                    // If no OrderMaster, create a new one
                    $this->createOrderMaster($lastvsn, $lastpnop, $getdata, $actcode, $EstLineQuoteup, $Termsup);
                    $this->updateQuoteData($getdata, $lastvsn, $lastpnop);

                    // Create or update FlipTovsn record
                    $this->createOrUpdateFlipTovsn($flipdata, $getdata, $lastvsn, $actcode);

                    // Create OrderModel details for each QuoteDetails
                    $this->processQuoteDetails($getdata->QuoteNo, $lastvsn, $lastpnop, $request, $actcode);
                } else {
                    // If OrderMaster exists, update
                    $this->updateOrderMaster($OrderMasterg, $lastvsn, $lastpnop, $getdata, $actcode, $EstLineQuoteup);
                    $this->updateQuoteData($getdata, $lastvsn, $lastpnop);

                    // Update FlipTovsn if it exists
                    $this->updateFlipTovsn($flipdata, $getdata, $lastvsn, $actcode);

                    // Update OrderModel details for each QuoteDetails
                    $this->updateOrderDetails($getdata->QuoteNo, $lastvsn, $lastpnop, $request, $actcode);
                }
            } else {
                return redirect()->back()->with('error', 'Flip Check Not Selected');
            }
        }
    }

    private function createOrUpdateFlipTovsn($flipdata, $getdata, $lastvsn, $actcode)
    {
        $existingFlip = FlipTovsn::where('VSNNo', $lastvsn)->first();

        if (is_null($existingFlip)) {
            FlipTovsn::create([
                "VSNNo" => $lastvsn,
                "EventNo" => $getdata['EventNo'],
                "QuoteNo" => $getdata['QuoteNo'],
                "OrderDate" => $flipdata->oderdate,
                "DeliveryDate" => $flipdata->Deleverydate,
                "Time" => $flipdata->toTimeString(),
                "Location" => $flipdata->location,
                "Port" => $flipdata->port,
                "Agency" => $flipdata->Agency,
                "Des" => $getdata['Des'],
                "AvailCredit" => $flipdata->AvailCredit,
                "FlipAmount" => $flipdata->FlipAmount,
                "NoOfQuote" => count($flipdata['flip']),
                "TotalFlip" => count($flipdata['flip']),
                "BranchCode" => $actcode['BranchCode'],
                "DepartmentName" => $getdata['DepartmentName'],
                "CustomerName" => $actcode->CustomerName,
                "VesselName" => $actcode->VesselName,
                "Comments" => $actcode['Comments'],
                "WorkUser" => $getdata['WorkUser'],
                "Status" => $getdata['Status'],
                "GeneralVesselNote" => $flipdata->gernalveselnoter,
                "ETA" => $actcode['ETA'],
                "Contact" => $actcode['Contact'],
                "ContactID" => $actcode['ContactID'],
                "Phone" => $actcode['Phone'],
                "Cell" => $actcode['Cell'],
                "BidDUeDate" => $actcode['BidDUeDate'],
                "DueTime" => $actcode['DueTime'],
                "ShippingPort" => $actcode['ShippingPort'],
                "Note" => $actcode['Note'],
                "Name" => $actcode['Name'],
                "Email" => $actcode['Email'],
                "Fax" => $actcode['Fax'],
                "ReturnVia" => $actcode['ReturnVia'],
                "Priority" => $actcode['Priority'],
                "CustomerCode" => $actcode['CustomerCode'],
                "IMONo" => $actcode['IMONo'],
                "Department" => $actcode['DepartmentName'],
                "CustomerRef" => $actcode['CustomerRefNo'],
                "BidDUeDate2" => $actcode['BidDUeDate2'],
                "ReturnVia2" => $actcode['ReturnVia2'],
                "EstLineQuote" => $getdata['EstLineQuote'],
                "DueTme2" => $actcode['DueTime'],
                "EventCreatedUser" => $actcode['EventCreatedUser'],
                "EventCreatedDate" => $actcode['EventCreatedDate'],
                "EventCreatedTime" => $actcode['EventCreatedTime'],
                "PVID" => $actcode['PVID'],
                "GodownCode" => $actcode['GodownCode'],
                "GodownName" => $actcode['GodownName'],
                "AgentCode" => $actcode['AgentCode']
            ]);
        } else {
            $existingFlip->update([
                "EventNo" => $getdata['EventNo'],
                "QuoteNo" => $getdata['QuoteNo'],
                "OrderDate" => $flipdata->oderdate,
                "DeliveryDate" => $flipdata->Deleverydate,
                "Time" => $flipdata->toTimeString(),
                "Location" => $flipdata->location,
                "Port" => $flipdata->port,
                "Agency" => $flipdata->Agency,
                "Des" => $getdata['Des'],
                "AvailCredit" => $flipdata->AvailCredit,
                "FlipAmount" => $flipdata->FlipAmount,
                "NoOfQuote" => count($flipdata['flip']),
                "TotalFlip" => count($flipdata['flip']),
                "BranchCode" => $actcode['BranchCode'],
                "DepartmentName" => $getdata['DepartmentName'],
                "CustomerName" => $actcode->CustomerName,
                "VesselName" => $actcode->VesselName,
                "Comments" => $actcode['Comments'],
                "WorkUser" => $getdata['WorkUser'],
                "Status" => $getdata['Status'],
                "GeneralVesselNote" => $flipdata->gernalveselnoter,
                "ETA" => $actcode['ETA'],
                "Contact" => $actcode['Contact'],
                "ContactID" => $actcode['ContactID'],
                "Phone" => $actcode['Phone'],
                "Cell" => $actcode['Cell'],
                "BidDUeDate" => $actcode['BidDUeDate'],
                "DueTime" => $actcode['DueTime'],
                "ShippingPort" => $actcode['ShippingPort'],
                "Note" => $actcode['Note'],
                "Name" => $actcode['Name'],
                "Email" => $actcode['Email'],
                "Fax" => $actcode['Fax'],
                "ReturnVia" => $actcode['ReturnVia'],
                "Priority" => $actcode['Priority'],
                "CustomerCode" => $actcode['CustomerCode'],
                "IMONo" => $actcode['IMONo'],
                "Department" => $actcode['DepartmentName'],
                "CustomerRef" => $actcode['CustomerRefNo'],
                "BidDUeDate2" => $actcode['BidDUeDate2'],
                "ReturnVia2" => $actcode['ReturnVia2'],
                "EstLineQuote" => $getdata['EstLineQuote'],
                "DueTme2" => $actcode['DueTime'],
                "EventCreatedUser" => $actcode['EventCreatedUser'],
                "EventCreatedDate" => $actcode['EventCreatedDate'],
                "EventCreatedTime" => $actcode['EventCreatedTime'],
                "PVID" => $actcode['PVID'],
                "GodownCode" => $actcode['GodownCode'],
                "GodownName" => $actcode['GodownName'],
                "AgentCode" => $actcode['AgentCode']
            ]);
        }
    }
    private function updateFlipTovsn($flipdata, $getdata, $lastvsn, $actcode)
    {
        FlipTovsn::where('VSNNo', $lastvsn)->update([
            "EventNo" => $getdata['EventNo'],
            "QuoteNo" => $getdata['QuoteNo'],
            "OrderDate" => $flipdata->oderdate,
            "DeliveryDate" => $flipdata->Deleverydate,
            "Time" => $flipdata->toTimeString(),
            "Location" => $flipdata->location,
            "Port" => $flipdata->port,
            "Agency" => $flipdata->Agency,
            "Des" => $getdata['Des'],
            "AvailCredit" => $flipdata->AvailCredit,
            "FlipAmount" => $flipdata->FlipAmount,
            "NoOfQuote" => count($flipdata['flip']),
            "TotalFlip" => count($flipdata['flip']),
            "BranchCode" => $actcode['BranchCode'],
            "DepartmentName" => $getdata['DepartmentName'],
            "CustomerName" => $actcode->CustomerName,
            "VesselName" => $actcode->VesselName,
            "Comments" => $actcode['Comments'],
            "WorkUser" => $getdata['WorkUser'],
            "Status" => $getdata['Status'],
            "GeneralVesselNote" => $flipdata->gernalveselnoter,
            "ETA" => $actcode['ETA'],
            "Contact" => $actcode['Contact'],
            "ContactID" => $actcode['ContactID'],
            "Phone" => $actcode['Phone'],
            "Cell" => $actcode['Cell'],
            "BidDUeDate" => $actcode['BidDUeDate'],
            "DueTime" => $actcode['DueTime'],
            "ShippingPort" => $actcode['ShippingPort'],
            "Note" => $actcode['Note'],
            "Name" => $actcode['Name'],
            "Email" => $actcode['Email'],
            "Fax" => $actcode['Fax'],
            "ReturnVia" => $actcode['ReturnVia'],
            "Priority" => $actcode['Priority'],
            "CustomerCode" => $actcode['CustomerCode'],
            "IMONo" => $actcode['IMONo'],
            "Department" => $actcode['DepartmentName'],
            "CustomerRef" => $actcode['CustomerRefNo'],
            "BidDUeDate2" => $actcode['BidDUeDate2'],
            "ReturnVia2" => $actcode['ReturnVia2'],
            "EstLineQuote" => $getdata['EstLineQuote'],
            "DueTme2" => $actcode['DueTime'],
            "EventCreatedUser" => $actcode['EventCreatedUser'],
            "EventCreatedDate" => $actcode['EventCreatedDate'],
            "EventCreatedTime" => $actcode['EventCreatedTime'],
            "PVID" => $actcode['PVID'],
            "GodownCode" => $actcode['GodownCode'],
            "GodownName" => $actcode['GodownName'],
            "AgentCode" => $actcode['AgentCode']
        ]);
    }
    private function updateQuoteData($getdata, $lastvsn, $lastpnop)
    {
        $getdata->update([
            'ChkFlip' => 1,
            'VSNNo' => $lastvsn,
            'FlipOrderNo' => $lastpnop,
            'FlipDate' => now(),
        ]);
    }

    public function getQuotationMasterData(Request $request)
    {
        $quote_no = $request->quote_no;
        $branch_code = Auth::user()->BranchCode;
        // , 'branch' => $branch, 'department_code' => $department_code
        //return response()->json( DB::table('QuoteMaster')->where('QuoteNo', $quote_no)->orderBy('id', 'DESC')->get());
        $quote_master = DB::table('QryQuoteMasterOpen')->where('QuoteNo', $quote_no)->orderBy('id', 'DESC')->get();
        //dd($quote_master);
        $department_code = $quote_master[0]->DepartmentCode;
        return response()->json([
            'quote_master' => $quote_master,
            'vendor_dropdown' => \App\Helpers\Ship::departmentDropdown(['name' => 'vendor', 'id' => 'vendor', 'branch_code' => $branch_code, 'department_code' => $department_code])
        ]);
    }






    public function adnewitem(Request $request){
        $BranchCode= Auth::user()->BranchCode;
        $WorkUser = Auth::user()->UserName;
        $TableData = $request->dataob;

        // Get the next item code and IMPA item code
        $newitemcode = VenderProductList::where('BranchCode', $BranchCode)->max('ItemCodeN') + 1;
        $newimpacode = VenderProductList::where('BranchCode', $BranchCode)->max('IMPAItemCode') + 1;

        info($TableData);

        // Get or create the ItemSetup
        $impacode = $TableData['impa'];
        $ItemSetup = ItemSetup::firstOrNew(['ItemCode' => $impacode]);

        // If the ItemSetup is newly created, populate fields
        if (!$ItemSetup->exists) {
            $ItemSetup->ItemCode = $impacode ?: $newimpacode;
            $ItemSetup->ItemName = $TableData['item_desc'];
            $ItemSetup->UOM = $TableData['uom'];
        }

        // Always update these fields for both new and existing ItemSetup
        $ItemSetup->WorkUser = $WorkUser;
        $ItemSetup->VendorCode = $TableData['VenderCode'];
        $ItemSetup->VendorName = $TableData['vendorName'];
        $ItemSetup->LastUpdate = Carbon::today(); // Using Carbon for date handling
        $ItemSetup->BranchCode = $BranchCode;
        $ItemSetup->TypeCode = $TableData['DepartmentCode'];
        $ItemSetup->TypeName = $TableData['DepartmentName'];
        $ItemSetup->Cost = $TableData['vendor_price'];
        $ItemSetup->SalePrice = $TableData['sell_price'];

        // Handle Item Code (StockCode)
        $itacode = $TableData['item_code'] ?: $newitemcode;
        $ItemSetup->StockCode = $itacode;
        $ItemSetup->save();

        // If no IMPA code provided, create a new VendorProductList
        if ($impacode === null) {
            $VenderProductList = new VenderProductList;
            $VenderProductList->ItemCode = $itacode;
            $VenderProductList->ItemName = $TableData['item_desc'];
            $VenderProductList->UOM = $TableData['uom'];
            $VenderProductList->VendorPrice = $TableData['vendor_price'];
            $VenderProductList->VenderCode = $TableData['VenderCode'];
            $VenderProductList->VenderName = $TableData['vendorName'];
            $VenderProductList->save();
        }

        // Return a response with necessary data
        return response()->json([
            'itemcode' => $newitemcode,
            'BranchCode' => $BranchCode,
            'TableData' => $TableData,
        ]);
    }

    public function QuotationItemsave(Request $request)
    {
        $BranchCode= Auth::user()->BranchCode;
        $TableData = $request->dataarray;
        $allcom = $request->allcom;
        $sum = $request->sum;

        $quoteNo = (int) $request->quote_no;
        $eventNo = (int) $request->event_no;

        // Delete existing records for the given QuoteNo and EventNo
        QuoteDetails::where('QuoteNo', $quoteNo)->where('EventNo', $eventNo)->delete();

        $insertData = [];
        foreach ($TableData as $data) {
            $insertData[] = [
                "EventNo" => $eventNo,
                "QuoteNo" => $quoteNo,
                "ItemCode" => $data['itemCodeCell'],
                "BranchCode" => $BranchCode,
                "SNo" => $data['snoCell'],
                "ItemName" => $data['item_descCell'],
                "impa" => $data['impaCell'],
                "PUOM" => $data['uomCell'],
                "Qty" => (float) $data['qtyCell'],
                "VendorName" => $data['vendorNameCell'],
                "VendorCode" => $data['vendor_codeCell'],
                "VendorPrice" => (float) $data['vendor_priceCell'],
                "SuggestPrice" => (float) $data['sell_priceCell'],
                "Total" => (float) $data['totalCell'],
                "CustomerNotes" => $data['customer_notesCell'],
                "VendorNotes" => $data['notesCell'],
                "InternalBuyerNotes" => $data['internal_notesCell'],
                "VesselNote" => $data['vessel_notesCell'],
            ];
        }

        // Use bulk insert or update
        $status = QuoteDetails::upsert($insertData, ['QuoteNo', 'EventNo', 'ItemCode']);

        if ($status) {
            // Update QuoteMaster with the new values
            Quote::where('QuoteNo', $quoteNo)
                ->where('BranchCode', $BranchCode)
                ->update([
                    'ValueAmount' => $sum,
                    'DiscIncome' => $allcom,
                ]);

            return response()->json([
                'success' => true,
                'BranchCode' => $BranchCode,
                'TableData' => $TableData,
                'QuoteNo' => $quoteNo,
            ]);
        }

        return response()->json(['message' => 'Error!'], 404);
    }

    public function itemsSave(Request $request){
        $BranchCode= Auth::user()->BranchCode;
        $quoteNo = (int) $request->post('quote_no');
        $eventNo = (int) $request->post('event_no');
        $itemCode = $request->post('item_code');

        // Delete existing QuoteDetails for the given QuoteNo and EventNo
        QuoteDetails::where('QuoteNo', $quoteNo)->where('EventNo', $eventNo)->delete();

        // Prepare the data for insertion or update
        $insertUpdate = [
            "EventNo" => $eventNo,
            "QuoteNo" => $quoteNo,
            "ItemCode" => $itemCode,
            "BranchCode" => $BranchCode,
            "SNo" => $this->getSNo($quoteNo, $request->post('sno')),
            "ItemName" => $request->post('item_name'),
            "impa" => $request->post('impa'),
            "PUOM" => $request->post('uom'),
            "Qty" => $request->post('qty'),
            "VendorName" => $request->post('vendor_name'),
            "VendorPrice" => $request->post('vendor_price'),
            "SuggestPrice" => $request->post('sell_price'),
            "Total" => $request->post('total'),
            "CustomerNotes" => $request->post('customer_notes'),
            "VendorNotes" => $request->post('notes'),
            "InternalBuyerNotes" => $request->post('internal_notes'),
            "VesselNote" => $request->post('vessel_notes'),
        ];

        // Update or insert QuoteDetails
        $status = QuoteDetails::updateOrInsert(
            ['QuoteNo' => $quoteNo, 'EventNo' => $eventNo, 'ItemCode' => $itemCode],
            $insertUpdate
        );

        // If update/insert was successful, update the QuoteMaster
        if ($status) {
            $sum = QuoteDetails::where('QuoteNo', $quoteNo)->sum('SuggestPrice');
            Quote::where('QuoteNo', $quoteNo)
                ->where('BranchCode', $BranchCode)
                ->update(['ValueAmount' => $sum]);

            return response()->json(['success' => true]);
        }

        return response()->json(['message' => 'Error!'], 404);
    }

    /**
     * Get the SNo value. If SNo is provided as 0 or null, get the max SNo from the database.
     */
    private function getSNo($quoteNo, $sno)
    {
        if ($sno === null || $sno === 0) {
            return DB::table('quotedetails')->where('QuoteNo', $quoteNo)->max('SNo') + 1;
        }
        return $sno;
    }


    public function import(Request $request)
    {
        $file = $request->file('file');

        $spreadsheet = IOFactory::load($file);
        $worksheet = $spreadsheet->getActiveSheet();
        $rows = $worksheet->toArray();
        return response()->json([
            'message' => 'File imported successfully',
            'datarowes' => $rows,
        ]);
    }

    public function Recal(Request $request)
    {
        $BranchCode= Auth::user()->BranchCode;
        $QuoteDetails = QuoteDetails::where('EventNo', $request->event_no)
            ->where('QuoteNo', $request->quote_no)
            ->where('BranchCode', $BranchCode)
            ->orderby('Sno')
            ->orderby('ID')
            ->get();

        if ($QuoteDetails->isEmpty()) {
            return response()->json(['Success' => 'Notsaved', 'Message' => 'No Quote Details found']);
        }

        $message = '';
        $success = '';
        foreach ($QuoteDetails as $rs) {
            // Assign warehouse details
            $rs->GodownCode = $request->Warehousecode;
            $rs->GodownName = $request->Warehousename;

            // Determine UOM and conversion logic
            $mpUOM = $rs->PUOM ?: 'KG';  // Default to 'KG' if PUOM is empty
            $isKgToLb = $request->kg_to_lb == "true" && in_array($mpUOM, ['KG', 'KGS']);

            // Conversion logic
            if ($isKgToLb) {
                $mQty11 = $rs->Qty * 2.2;
                $mOrderQty11 = $rs->OrderQty * 2.2;
                $suggestPrice = $rs->SuggestPrice / 2.2;
                $rs->PUOM = "LB";
                $message = 'Converted to LB';
            } else {
                $mQty11 = $rs->Qty;
                $mOrderQty11 = $rs->OrderQty;
                $suggestPrice = $rs->SuggestPrice;
                $message = 'Converted to KG';
            }

            // Default price calculations
            $vendorPrice = $rs->VendorPrice ?: 0;
            $ourPrice = $rs->OurPrice ?: 0;

            // Amounts and totals
            $mOrderAmount = round($mOrderQty11 * $suggestPrice, 2);
            $mQty = round($mQty11, 2);
            $total = round($mQty * $suggestPrice, 2);
            $totalCost = round($mQty * $ourPrice, 2);
            $gPAmount = $total - $totalCost;
            $gPRate = ($total != 0) ? round($gPAmount / $total * 100, 2) : 0;

            // Update the quote details
            $rs->Qty = $mQty;
            $rs->OrderQty = round($mOrderQty11, 2);
            $rs->OrderAmount = $mOrderAmount;
            $rs->Total = $total;
            $rs->TotalCost = $totalCost;
            $rs->GPAmount = $gPAmount;
            $rs->GPRate = $gPRate;
            $rs->VendorPrice = round($vendorPrice, 2);
            $rs->OurPrice = round($ourPrice, 2);
            $rs->SuggestPrice = round($suggestPrice, 2);

            // Save the updated record and determine success
            if ($rs->save()) {
                $success = 'saved';
            } else {
                $success = 'Notsaved';
            }
        }

        // Retrieve the updated quote details after recalculating
        $QuoteDetailsafter = QuoteDetails::where('EventNo', $request->event_no)
            ->where('QuoteNo', $request->quote_no)
            ->where('BranchCode', $BranchCode)
            ->orderby('Sno')
            ->orderby('ID')
            ->get();

        // Return the response with the recalculated data
        return response()->json([
            'Success' => $success,
            'Message' => $message,
            'datarowes' => $QuoteDetailsafter,
        ]);
    }


    public function itemgetfromship(Request $request)
    {
        $itemList = $request->input('Items');
        $data = [];

        foreach ($itemList as $item) {
            $impa = $item['partIdentification'][0]['partCode'] ?? null;
            $uom = $item['unitOfMeasure'] ?? '';
            $quantity = $item['quantity'] ?? 0;
            $itemName = $item['description'] ?? '';
            $searchItemWords = explode(' ', $itemName);

            $searchResults = $this->getSearchResults($searchItemWords, $itemName);

            if (!empty($searchResults['bestMatch'])) {
                $vendorDetails = $this->getVendorDetails($searchResults['bestMatch']->ItemCode);
                $rowData = [
                    'ItemCodeget' => $searchResults['bestMatch']->ItemCode,
                    'ItemNameget' => $searchResults['allMatches'],
                    'UOMget'      => $vendorDetails['UOM'] ?? $searchResults['bestMatch']->UOM,
                    'Priceget'    => $vendorDetails['Price'] ?? $searchResults['bestMatch']->SaleRate,
                    'Vendorcode'  => $vendorDetails['VendorCode'] ?? '',
                    'Vendor'      => $vendorDetails['VendorName'] ?? '',
                ];
            } else {
                $rowData = [
                    'ItemCodeget' => '',
                    'ItemNameget' => '',
                    'UOMget'      => '',
                    'Priceget'    => '',
                    'Vendorcode'  => '',
                    'Vendor'      => '',
                ];
            }

            $rowData = array_merge($rowData, [
                'Impa'       => $impa,
                'ItemName'   => $itemName,
                'percentage' => $searchResults['highestSimilarityPercentage'],
                'UOM'        => $uom,
                'Vpart'      => $impa,
                'Qty'        => $quantity,
            ]);

            $data[] = $rowData;
        }

        return response()->json($data);
    }

    /**
     * Fetch search results based on item words.
     */
    private function getSearchResults(array $searchItemWords, string $itemName)
    {
        $allMatches = [];
        $highestSimilarityPercentage = 0;
        $bestMatch = null;

        foreach ($searchItemWords as $word) {
            $items = ItemSetupNew::where('ItemName', 'like', '%' . $word . '%')
                ->union(
                    VenderProductList::where('ItemName', 'like', '%' . $word . '%')->limit(10)
                )
                ->get();

            foreach ($items as $item) {
                similar_text($itemName, $item->ItemName, $similarityPercentage);

                $allMatches[] = [
                    'ItemCode'   => $item->ItemCode,
                    'ItemName'   => $item->ItemName,
                    'UOM'        => $item->UOM,
                    'Percentage' => $similarityPercentage,
                    'SaleRate'   => $item->SaleRate ?? $item->LastRate,
                    'VenderName' => $item->VenderName ?? '',
                    'VenderCode' => $item->VenderCode ?? '',
                ];

                if ($similarityPercentage > $highestSimilarityPercentage) {
                    $highestSimilarityPercentage = $similarityPercentage;
                    $bestMatch = $item;
                }
            }
        }

        // Sort matches by similarity percentage and limit results
        usort($allMatches, fn($a, $b) => $b['Percentage'] <=> $a['Percentage']);
        $allMatches = array_slice($allMatches, 0, 10);

        return [
            'bestMatch'                  => $bestMatch,
            'allMatches'                 => $allMatches,
            'highestSimilarityPercentage' => $highestSimilarityPercentage,
        ];
    }

    /**
     * Fetch vendor details for a given item code.
     */
    private function getVendorDetails(?string $itemCode)
    {
        if (!$itemCode) {
            return [];
        }

        $vendorItem = VenderProductList::where('ItemCode', $itemCode)->first();

        if ($vendorItem) {
            return [
                'Price'      => $vendorItem->LastRate,
                'UOM'        => $vendorItem->UOM,
                'VendorCode' => $vendorItem->VenderCode,
                'VendorName' => $vendorItem->VenderName,
            ];
        }

        return [];
    }

    public function Quotationget(Request $request)
    {
        $BranchCode= Auth::user()->BranchCode;

        $quoteno = $request->input('quoteno');
        $DataQuotesMaster = DB::table('qryquotemasteropen')->where('QuoteNo', $quoteno)->where('BranchCode', $BranchCode)->first();


        $depcode = $DataQuotesMaster->DepartmentCode;
        $eventno = $DataQuotesMaster->EventNo;
        $quotesdetails = QuoteDetails::where('QuoteNo', $quoteno)->where('EventNo', $eventno)->where('BranchCode', $BranchCode)->OrderBy('SNo')->get();
        $TypeSetup = Typesetup::where('TypeCode', $depcode)->first();
        $CustomerCode = $DataQuotesMaster->CustomerCode;
        $Customerdicount = CustomerDiscount::where('CustomerCode', $CustomerCode)->where('DepartmentCode', $depcode)->first();

        $EventData = Events::where('EventNo', $eventno)->where('BranchCode', $BranchCode)->first();
        $warehouse = GodownSetup::select('GodownCode', 'GodownName')->distinct()->get();
        info($depcode);
        $vendors = DB::table('qryvendordepartment')->where(function ($query) {
            $query->where('ChkInactive', 0)
                ->orWhereNull('ChkInactive');
        })
            ->where('ChkSelect', 1)
            ->where('TypeCode', $depcode)
            ->where('BranchCode', $BranchCode)
            ->select('VenderName', 'VenderCode')
            ->distinct()
            ->orderBy('VenderName')
            ->get();
        info($vendors);


        return response()->json([
            'quotesdetails' => $quotesdetails,
            'DataQuotesMaster' => $DataQuotesMaster,
            'TypeSetup' => $TypeSetup,
            'Customerdicount' => $Customerdicount,
            'EventData' => $EventData,
            'vendors' => $vendors,
            'warehouse' => $warehouse,

        ]);
    }



    public function getToken()
    {
        $shipservsetup = DB::table('shipservsetup')->first();
        $GrantType = $shipservsetup->GrantType;
        $UserName = $shipservsetup->UserName;
        $Password = $shipservsetup->Password;
        $ClientId = $shipservsetup->ClientId;
        $ClientSecret = $shipservsetup->ClientSecret;

        $hostURL = "https://api.shipserv.com/authentication/oauth2/token";
        $response = Http::withHeaders([
            'Accept' => 'application/json'
        ])->post($hostURL, [
            'grant_type' => $GrantType,
            'username' => $UserName,
            'password' => $Password,
            'client_id' => $ClientId,
            'client_secret' => $ClientSecret
        ]);

        if ($response->successful()) {
            $json = $response->json();
            $bearerToken = $json['access_token'];
            return response()->json([
                'token' => $bearerToken,
                'shipservsetup' => $shipservsetup
            ]);
        } else {
            return response()->json(['error' => 'Failed to get token'], $response->status());
        }
    }

    ////////////////////////
    public function GetQuotesShipServe($quoteId, $accessToken)
    {
        try {
            $apiUrl = "https://api.shipserv.com/api/order-management/documents/$quoteId";
            $apiVersionHeader = "v2";

            // Set the request headers
            $response = Http::withHeaders([
                'Api-version' => $apiVersionHeader,
                'Authorization' => $accessToken
            ])->get($apiUrl);

            if ($response->successful()) {
                $responseData = $response->json();

                // Process the response data as needed
                // For example, you can return it to the client-side
                return response()->json($responseData);
            } else {
                $statusCode = $response->status();
                $statusDescription = $response->reason();

                // Handle the error response
                return response()->json(['error' => "Error: $statusDescription ($statusCode)"], $statusCode);
            }
        } catch (\Exception $ex) {
            // Handle any exceptions that occur during execution
            return response()->json(['error' => 'An error occurred: ' . $ex->getMessage()], 500);
        }
    }

    public function frmoutlook()
    {
        shell_exec('start outlook');

        // Return a response (optional)
        return response()->json(['message' => 'Outlook opened successfully']);
    }
    public function prepareEmail(Request $request)
    {
        $to = $request->input('to');
        $subject = 'Quote # ' . $request->input('quote_no');
        $attachmentPath = 'http://127.0.0.1:8000/Reports/Quotation6601634.xlsx'; // Adjust as needed

        // Pass data to view
        return view('emails.preview', compact('to', 'subject', 'attachmentPath'));
    }
}
