<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Quote;
use App\Models\Events;
use App\Models\Typesetup;
use App\Models\RFQVendorGS;
use App\Models\QuoteDetails;
use Illuminate\Http\Request;
use App\Models\RFQVendorGSUAE;
use App\Models\RFQVendorGSUAEs;
use App\Models\ProvisionOrderMaster;
use App\Models\ProvisionOrderDetails;
use App\Models\SECQryitemsetup;
use GroceryCrud\Core\GroceryCrud;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Intervention\Image\ImageManagerStatic as Image;
use PDO;

class Quotes extends Controller
{

    public function biddate(Request $request)
    {

        $BidDueDate = $request->input('date');

        $BranchCode= Auth::user()->BranchCode;
        $output = "";
        // $Event = DB::select(DB::raw("SET NOCOUNT ON ; exec SPEvent @BranchCode='$BranchCode',@BidDueDate='$BidDueDate'"));
        $Event = DB::select('CALL SPEvent(?, ?)', [$BranchCode, $BidDueDate]);

        $user = Events::select('EventCreatedUser')
            ->distinct()
            ->where('BidDUeDate', '>=', $BidDueDate)
            ->where('BranchCode', $BranchCode)
            ->orderBy('EventCreatedUser')
            ->get();
        foreach ($Event as $item) {
            $BidDueDatetr = $item->BidDUeDate;
            $BidDueDatetr = date('dS-M-Y', strtotime($BidDueDatetr));

            $ETAr = $item->ETA;
            $ETAr = date('dS-M-Y', strtotime($ETAr));
            $EventCreatedDater = $item->EventCreatedDate;
            $EventCreatedDater = date('dS-M-Y', strtotime($EventCreatedDater));
            $EventCreatedTimer = date('H:i:a', strtotime($item->EventCreatedTime));

            $output .= '
            <tr class="js-row" style="cursor:pointer" id="' . $item->EventNo . '" data-id="' . $item->EventNo . '"  ondblclick="dblclicker(this.id)"  onClick="clicker(this.id)">
            ' .
                '<td>' . $item->EventNo . '</td>' .

                '<td>' . $BidDueDatetr . '</td>' .
                '<td>' . $item->DueTime . '</td>' .
                '<td>' . $item->CustomerName . '</td>' .
                '<td>' . $item->VesselName . '</td>' .
                '<td>' . $item->ShippingPort . '</td>' .
                '<td>' . $item->STATUS . '</td>' .
                '<td>' . $ETAr . '</td>' .
                '<td>' . $item->Priority . '</td>' .
                '<td>' . $EventCreatedDater . '</td>' .
                '<td>' . $EventCreatedTimer . '</td>' .
                '<td>' . $item->EventCreatedUser . '</td>' .
                '<td>' . $item->MQouteNo . '</td>' .
                '<td>' . $item->GodownName . '</td>' .



                '</tr>';



        }
        // return Response($output);
        return response()->json([
            'output' => $output,
            'user' => $user,

        ]);
    }

    public function calcList($id)
    {
        $output = "";
        $eventId = Quote::find($id);
        $quotes = Quote::where('EventNo', $id)->get();
        foreach ($quotes as $quote) {
            $qBidDueDate = $quote->BidDueDate;
            $qBidDueDate = date('d-M-Y', strtotime($qBidDueDate));
            $quote->QDate = date('d-M-Y', strtotime($quote->QDate));


            $qValueAmount = $quote->ValueAmount;
            $qValueAmount = number_format((float) $qValueAmount, 2, '.', '');
            $qCostAmount = $quote->CostAmount;
            $qCostAmount = number_format((float) $qCostAmount, 2, '.', '');
            $qGPAmount = $quote->GPAmount;
            $qGPAmount = number_format((float) $qGPAmount, 2, '.', '');
            $output .= '
        <tr style="cursor:pointer" ondblclick="window.location.href=\'/quotation?quote_no=' . $quote->QuoteNo . '\'">' .
                '<td>' . $quote->QuoteNo . '</td>' .
                '<td>' . $quote->QDate . '</td>' .
                '<td>' . date('H:i:a', strtotime($quote->QTime)) . '</td>' .
                '<td>' . $quote->ReturnVia . '</td>' .
                '<td>' . $qBidDueDate . '</td>' .
                '<td>' . date('H:i:a', strtotime($quote->DueTime)) . '</td>' .
                '<td>' . $quote->EstLineQuote . '</td>' .
                '<td>' . $quote->CstItems . '</td>' .
                '<td>' . $quote->PricingItems . '</td>' .
                '<td>' . $quote->DepartmentName . '</td>' .
                '<td>' . $qValueAmount . '</td>' .
                '<td>' . $qCostAmount . '</td>' .
                '<td>' . $qGPAmount . '</td>' .
                '<td>' . $quote->Status . '</td>' .
                '<td>' . $quote->CustomerRefNo . '</td>' .
                '<td>' . $quote->VSNNo . '</td>' .
                '<td>' . $quote->FlipOrderNo . '</td>' .
                '<td>' . $quote->WorkUser . '</td>' .


                '</tr>';
        }

        return Response($output);
        // return Response::json($output);
    }


    public function updateinrfq(Request $request)
    {
        $MBranchCode= Auth::user()->BranchCode;
        $TxtQuoteNo = $request->input('quoteno');
        $TxtEventNo = $request->input('eventno');

        $Table = $request->input('Table');

        for ($i = 0; $i < count($Table); $i++) {
            $MMSNo1 = $Table[$i]['SNo'];
            $MVendorCode = $Table[$i]['VendorCode'];
            $MQty = $Table[$i]['Qty'];
            $MITemName = $Table[$i]['Description'];
            $VPriceRec = $Table[$i]['VPriceRec'];
            if ($VPriceRec > 0) {
                // Select * from RFQ where SNo=" & Val(MMSNo1) & " and QuoteNo=" & Val(TxtQuoteNo.Text) & " and EventNo=" & Val(TxtEventNo.Text) & " and BranchCode=" & Val(MBranchCode) & "
                // db
                $Rs3 = QuoteDetails::where('SNo', $MMSNo1)->where('QuoteNo', $TxtQuoteNo)->where('EventNo', $TxtEventNo)->where('BranchCode', $MBranchCode)->first();
                info($Rs3);
                if ($Rs3) {
                    $Rs3->Workuser = 'VPlat';
                    $Rs3->VPart = 'V';
                    $Rs3->VendorPrice = $VPriceRec;
                    $Rs3->OurPrice = $VPriceRec;
                    $Rs3->TotalCost = intval($VPriceRec) * intval($MQty);
                    $Rs3->LastDate = $Table[$i]['VPriceRecDate'];
                    $Rs3->UpdatedDate = $Table[$i]['VPriceRecDate'];
                    $Rs3->VendorNotes = $Table[$i]['VendorRecRemarks'];
                    $Rs3->VendorPartNo = $Table[$i]['VendorPartNo'];
                    $Rs3->save();
                }
            }

        }
        if ($Rs3) {
            $Message = 'Saved';
        }

        return response()->json([
            'Message' => $Message,
        ]);
    }

    public function index(Request $request)
    {
        $BidDueDate = date("Y-m-d");
        $BranchCode= Auth::user()->BranchCode;
        // $Event = DB::select(DB::raw("SET NOCOUNT ON ; exec SPEvent @BranchCode='$BranchCode',@BidDueDate='$BidDueDate'"));
        $Event = DB::select('CALL SPEvent(?, ?)', [$BranchCode, $BidDueDate]);

        $user = Events::select('EventCreatedUser')
            ->distinct()
            ->where('BidDUeDate', '>=', $BidDueDate)
            ->where('BranchCode', $BranchCode)
            ->orderBy('EventCreatedUser')
            ->get();


        return view('Activity.Events_log', [
            'Event' => $Event,
            'user' => $user,

        ]);
    }




    public function Vplat_quote(Request $request)
    {
        // $BranchCode= Auth::user()->BranchCode;
        ini_set('max_execution_time', 320);
        $BranchCode = $request->BranchCode;
        // dd($BranchCode);
        $VendorCode = $request->VendorCode;
        $eventno = $request->eventno;
        $quoteno = $request->quoteNo;

        // dd($quoteno);
        // dd($VendorCode);
        // $data = DB::connection('secsqlsrv')->select("SELECT * FROM WEBItemSetup")->where('BranchCode',$BranchCode)->get();
        // $data = RFQVendorGS::where([
        //     ['BranchCode', $BranchCode],
        //     // ['EventNo', $eventno],
        //     ['QuoteNo', $quoteno],
        //     ['VendorCode', $VendorCode],
        // ])->get();
        // // dd($data);
        // $dataf = RFQVendorGS::where([
        //     ['BranchCode', $BranchCode],
        //     // ['EventNo', $eventno],
        //     ['QuoteNo', $quoteno],
        //     ['VendorCode', $VendorCode],
        // ])->first();
        $dbh = new PDO("odbc:mssql_odbcG", "global", "Po60ps&1");
        $sql = "SELECT
       *
    FROM rfqvendorgs
    WHERE VendorCode = :VendorCode
    AND QuoteNo = :QuoteNo
    AND BranchCode = :BranchCode";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([
        ':VendorCode'   => $VendorCode,
        ':QuoteNo'   => $quoteno,
        ':BranchCode'=> $BranchCode
    ]);

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
$dataf = $stmt->fetch(PDO::FETCH_ASSOC);
        return view('Vplat_Quote_New', [
            'data' => $data,
            'dataf' => $dataf,
        ]);
    }

    // public static function exportWithLockedCells($data, $filename) {

    //     info($data);
    //     info($filename);
    //     $spreadsheet = new Spreadsheet();
    //     $sheet = $spreadsheet->getActiveSheet();
    //     $sheet->fromArray($data, null, 'A1');
    //     $sheet->getProtection()->setSheet(true);

    //     // specify which cells to lock
    //     $sheet->getStyle('A1:Z1')->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_PROTECTED);

    //     $writer = new Xlsx($spreadsheet);
    //     $writer->save($filename);
    // }

    public function importvplat(Request $request)
    {
        // Handle file upload
        $file = $request->file('file');
        $Quoteno = $request->input('Quoteno');
        // info($Quoteno);


        // Read and extract data from the file
        $spreadsheet = IOFactory::load($file);
        $worksheet = $spreadsheet->getActiveSheet();
        $rows = $worksheet->toArray();
        $title = $rows[0][0];
        $quoteParts = explode("|", $title);
        $Quotenoget = $quoteParts[1];

        // $id will now be equal to 6583301
        if ($Quoteno == $Quotenoget) {
            info('same');

            return response()->json([
                'message' => 'File imported successfully',
                'datarowes' => $rows,
                // 'ItemName' => $ItemNamecom,
            ]);
        }
        return response()->json([
            'message' => 'Quoteno Not Same',
            'datarowes' => $rows,
            // 'ItemName' => $ItemNamecom,
        ]);

    }



    public function uploadDatafile(Request $request)
    {
        $image = $request->file('image');
        $id = $request->id;
        $quoteno = $request->quoteno;
        $image_name = 'Impa_' . $quoteno . '_Vendor_' . $id . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('/DataFile');
        $image->move($destinationPath, $image_name);
        Log::info("destinationPath: $destinationPath/$image_name");

        if ($image_name) {
            info('saved');
        }

        return response()->json(['image_name' => $image_name]);
    }
    public function uploadImage(Request $request)
    {






        $image = $request->file('image');
        $id = $request->id;
        $quoteno = $request->quoteno;
        $image_name = 'QuoteNo_' . $quoteno . '_ID_' . $id . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('/images/Quote');
        $image->move($destinationPath, $image_name);
        Log::info("destinationPath: $destinationPath, image_name: $image_name");

        if ($image_name) {
            info('saved');
        }

        return response()->json(['image_name' => $image_name]);
    }

    public function saveqouteVplat(Request $request)
    {

        $tablearray = $request->tablearray;
        $quoteNumber = $request->QuoteNo;
        $branchCode = $request->BranchCode;
        $vendorCode = $request->input('VendorCode');
        $WorkUser = $request->input('WorkUser');
        $FreightTotal = $request->input('FreightTotal');
        $CustomerName = $request->input('CustomerName');
        $VesselName = $request->input('VesselName');
        $VendorName = $request->input('VendorName');
        $WorkUserEmail = $request->input('WorkUserEmail');
        $Currency = $request->Currency;
        $date = date('Y-m-d');
        $time = date('H:i:s');



        $tablearray = json_encode($tablearray); // Convert the array to JSON

        try {
            // $sp = DB::select('CALL SPUpdateRFQGS(?, ?, ?, ?, ?)', [
            //     $tablearray,
            //     $FreightTotal,
            //     $Currency,
            //     $date,
            //     $time,
            // ]);
            // $sp = DB::connection('secsqlsrv')->statement("EXEC SPUpdateRFQVendorGS @tablearray = ?, @FreightTotal = ?, @Currency = ?, @date = ?, @time = ?", [
            //     $tablearray,
            //     $FreightTotal,
            //     $Currency,
            //     $date,
            //     $time
            // ]);
            $dbh = new PDO("odbc:mssql_odbcG", "global", "Po60ps&1");

            $sql = "EXEC SPUpdateRFQVendorGS @tablearray = :tablearray,
                                 @FreightTotal = :FreightTotal,
                                 @Currency = :Currency,
                                 @date = :date,
                                 @time = :time";

                                 $stmt = $dbh->prepare($sql);

                                 // Bind parameters
                                 $stmt->bindParam(':tablearray', $tablearray, PDO::PARAM_STR);
                                 $stmt->bindParam(':FreightTotal', $FreightTotal, PDO::PARAM_STR);
                                 $stmt->bindParam(':Currency', $Currency, PDO::PARAM_STR);
                                 $stmt->bindParam(':date', $date, PDO::PARAM_STR);
                                 $stmt->bindParam(':time', $time, PDO::PARAM_STR);

                                 // Execute the stored procedure
                                 $stmt->execute();
            // info($sp);
            // Proceed with further actions if the stored procedure was executed successfully

        } catch (\Exception $e) {
            // An error occurred, handle it here
            $errorMessage = $e->getMessage();
            // You can log or display the error message as per your requirements
            // For example:
            info($errorMessage);

            // echo "Error executing the stored procedure: " . $errorMessage;
        }

        $data = [
            'title' => 'Quote-Received : ' . $quoteNumber,
            'body' => 'You have Received An Quote Please Check Software',
            'QuoteNo' => $quoteNumber,
            'BranchCode' => $branchCode,
            'VendorCode' => $vendorCode,
            'CustomerName' => $CustomerName,
            'VesselName' => $VesselName,
            'VendorName' => $VendorName,
            'Link' => 'http://shipchandling.christmasquarter.com/Vplat-Quote?&quoteNo=' . $quoteNumber . '&VendorCode=' . $vendorCode . '&BranchCode=' . $branchCode,
        ];
        if ($WorkUserEmail == '' || !$WorkUserEmail && $WorkUser !== null) {
            $WorkUserEmail = 'naeemulhaq06@gmail.com';
        }

        $toEmails = [
            $WorkUserEmail => $WorkUser,
        ];
        $fromEmail = 'shipchandling@christmasquarter.com';
        Mail::send('emails.test', $data, function ($message) use ($toEmails, $fromEmail) {
            $message->to($toEmails)->subject('Vplat Quote Email');
            $message->from($fromEmail, 'Vplatform');
        });



        return response()->json([
            'message' => 'Price Saved',
            'Code' => 'Success',
            'quoteNumber' => $quoteNumber,
            // 'tabledata' => $tablearray,
        ]);
    }


    public function Quotelog(Request $request)
    {
        $BranchCode= Auth::user()->BranchCode;
        $LogRemarks = DB::table('logremarks')->where('BranchCode', $BranchCode)->orderBy('Code')->get();
        $TypeSetup = Typesetup::where('BranchCode', $BranchCode)->where('ChkIMPA', 0)->get();

        return view('quotation.Quote_log', [
            'LogRemarks' => $LogRemarks,
            'TypeSetup' => $TypeSetup,
        ]);
    }
    public function getquote(Request $request)
    {
        $BranchCode= Auth::user()->BranchCode;
        $ChkSentToCust = $request->input('ChkSentToCust');
        $Qrry = $request->input('Qry');
        info($Qrry);

        $sp = DB::select('CALL SpQuoteLogWeb(?, ?, ?)',[
            $ChkSentToCust,
            $BranchCode,
            $Qrry
        ]);


        return response()->json([
            'sp' => $sp,
        ]);
    }
    public function SetHot(Request $request)
    {
        $MBranchCode= Auth::user()->BranchCode;
        $TxtQuoteNo = $request->input('TxtQuoteNo');

        $QuoteMaster = Quote::where('QuoteNo', $TxtQuoteNo)->where('BranchCode', $MBranchCode)->first();
        $Message = 'start';
        if ($QuoteMaster) {
            $QuoteMaster->HOT = 1;
            $QuoteMaster->save();

            if ($QuoteMaster) {
                $Message = 'HOT';
            }
        }

        return response()->json([
            'Message' => $Message,
            'QuoteNo' => $TxtQuoteNo,
        ]);
    }
    public function NotHot(Request $request)
    {
        $MBranchCode= Auth::user()->BranchCode;
        $TxtQuoteNo = $request->input('TxtQuoteNo');

        $QuoteMaster = Quote::where('QuoteNo', $TxtQuoteNo)->where('BranchCode', $MBranchCode)->first();
        $Message = 'start';
        if ($QuoteMaster) {
            $QuoteMaster->HOT = 0;
            $QuoteMaster->save();

            if ($QuoteMaster) {
                $Message = 'NotHot';
            }
        }

        return response()->json([
            'Message' => $Message,
            'QuoteNo' => $TxtQuoteNo,
        ]);
    }


    public function welcome(Request $request)
    {
        $BranchCode = $request->BranchCode;
        $categories = DB::connection('secsqlsrv')->table("CategorySetup")->get();
        $sessionId = session()->getId(); // Retrieve current session ID
        $cart = Cart::where('session', $sessionId)->get();

        return view('Frontend.home', [

            'categories' => $categories,
            'BranchCode' => $BranchCode,
            'cart' => $cart,

        ]);
    }
    public function addtocart(Request $request)
    {
        $itemCode = $request->input('itemCode');
        $dept = $request->input('dept');
        $quantity = $request->input('quantity');
        $categoryName = $request->input('categoryName');
        $categoryCode = $request->input('categoryCode');
        $sessionId = session()->getId(); // Retrieve current session ID
        info($sessionId);
        // Check if the item already exists in the cart for the current session
        $cartItem = Cart::where('session', $sessionId)
                        ->where('itemcode', $itemCode)
                        ->first();

        if ($cartItem) {
            // If item exists, update its quantity
            $cartItem->increment('quantity', $quantity);
            $message = 'Item quantity updated in cart';
        } else {
            // If item doesn't exist, create a new cart entry
            $cartItem = Cart::create([
                'session' => $sessionId,
                'itemcode' => $itemCode,
                'department' => $dept,
                'quantity' => $quantity,
                'category' => $categoryName,
                'categorycode' => $categoryCode
            ]);
            info($cartItem);
            $message = 'Item added to cart';
        }
        $cart = Cart::where('session', $sessionId)->get();
        return response()->json([
            'Message' => $message,
            'cart' => $cart
        ]);
    }

    public function getProducts(Request $request)
    {
        $categoryCode = $request->input('categoryCode');
        $Department = $request->input('Department');
        $BranchCode = $request->input('BranchCode');
        // info($Department);
        if ($categoryCode) {
            $product_lists = SECQryitemsetup::getAlldata()
                ->where('CategoryCode', $categoryCode)
                ->where('ChkProvBond', 1)
                ->where('BranchCode', $BranchCode)
                ->when($Department, function ($query, $Department) {
                    return $query->where('TypeName', $Department);
                })
                ->get();
        } else {
            $product_lists = SECQryitemsetup::getAlldata()
                ->where('ChkProvBond', 1)
                ->where('BranchCode', $BranchCode)
                ->when($Department, function ($query, $Department) {
                    return $query->where('TypeName', $Department);
                })
                ->get();
        }

        return response()->json(['data' => $product_lists]);
    }
    public function ProvisionGetQuoteSave(Request $request)
    {

        $formData = $request->input('form');
        // $Department = $request->input('Department');
        parse_str($formData, $formDataArray);

        // Retrieve the value of 'customername'
        $customername = $formDataArray['customername'];
        $vesselimo = $formDataArray['vesselimo'];
        $CustomerRefNo = $formDataArray['CustomerRefNo'];
        $MBranchCode = $formDataArray['BranchCode'];
        $Message = "";
        // info($formDataArray);
        // info($CustomerRefNo);
        // Retrieve the rowsData array
        $rowsData = $request->input('rowsData');

        if($customername){
            $Cusrefcheck = ProvisionOrderMaster::where('CustomerRefNo', $CustomerRefNo)
            ->first();
            // info($Cusrefcheck);
            if($Cusrefcheck){
                $Message = "Found";

                return response()->json([
                    'Message' => $Message
                ]);
            }
            $orderMaster = ProvisionOrderMaster::where('customer_name', $customername)
            ->where('vessel_imo', $vesselimo)
            ->where('CustomerRefNo', $CustomerRefNo)
            ->first();

        if ($orderMaster) {
            $orderMaster->update([
                'full_name' => $formDataArray['fullname'],
                'vessel_name' => $formDataArray['vesselname'],
                'email' => $formDataArray['email'],
                'reqdate' => $formDataArray['reqdate'],
                'shippingport' => $formDataArray['ShipingPort'],
                'message' => $formDataArray['message'],
                'ContactNo' => $formDataArray['ContactNo'],
                'CustomerRefNo' => $formDataArray['CustomerRefNo']
            ]);
            $id = $orderMaster->id;
        } else {
            $newOrderMaster =  ProvisionOrderMaster::create([
                'branchcode' => $MBranchCode,
                'customer_name' => $customername,
                'vessel_imo' => $vesselimo,
                'full_name' => $formDataArray['fullname'],
                'vessel_name' => $formDataArray['vesselname'],
                'email' => $formDataArray['email'],
                'reqdate' => $formDataArray['reqdate'],
                'shippingport' => $formDataArray['ShipingPort'],
                'message' => $formDataArray['message'],
                'ContactNo' => $formDataArray['ContactNo'],
                'CustomerRefNo' => $formDataArray['CustomerRefNo']
            ]);
            $id = $newOrderMaster->id;
        }
        // info($rowsData);
        // info($Department);
        // if(!$Department || $Department == 'Select Department'){
        //     $Department = 'BOTH';
        // }
        // info('Department value: ' . $Department);

        foreach ($rowsData as $row) {
            $OrderDetail = ProvisionOrderDetails::where('itemcode', $row['itemCode'])->where('order_id', $id)->first();
                $Department = DB::connection('secsqlsrv')->table("QryItemSetupNew")->select('TypeName')->where('itemcode', $row['itemCode'])->first();
                $Department = $Department->TypeName;
                    info($Department);
            if ($OrderDetail) {
                $OrderDetail->update([
                    'quantity' => $row['quantity'],
                    'customercomment' => $row['itemcomment'],
                    'packing' => $row['selectedValue'],
                    'orderddate' => date('Y-m-d'),
                    'department' => $Department,
                ]);
            } else {
                $newOrderDetail = ProvisionOrderDetails::create([
                    'branchcode' => $MBranchCode,
                    'order_id' => $id,
                    'itemcode' => $row['itemCode'],
                    'customercomment' => $row['itemcomment'],
                    'packing' => $row['selectedValue'],
                    'quantity' => $row['quantity'],
                    'orderddate' => date('Y-m-d'),
                    'department' => $Department,
                ]);
            }
        }


        }
        $Message = "Saved";

        return response()->json([
            'Message' => $Message
        ]);
    }

    public function ProvisionSubscription(Request $request){
        $Email = $request->input('Email');
        $BranchCode = $request->input('BranchCode');

        $sub = DB::table('OnlineSubscription')->where('email', $Email)->first();

            if (!$sub) {
                $sub = DB::table('OnlineSubscription')->insert([
                    'email' => $Email,
                    'branchcode' => $BranchCode,
                ]);

            } else {
                $sub->update([
                    'email' => $Email,
                    'branchcode' => $BranchCode,
                ]);
            }
            $Message = '';
            if($sub){
                $Message = 'Saved';
            }

            return response()->json([
                'Message'=>$Message,
            ]);


    }

}
