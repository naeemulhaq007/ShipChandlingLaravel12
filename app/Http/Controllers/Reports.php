<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\temp2;
use App\Models\Trans;
use App\Models\AcFile;
use App\Models\FlipTovsn;
use App\Models\OrderModel;
use App\Models\TempIncome;
use App\Models\GodownSetup;
use App\Models\Customer;
use App\Models\CompanySetup;
use Illuminate\Http\Request;
use App\Models\ACCAgingModel;
use InvalidArgumentException;
use App\Models\OrderMasterModel;
use App\Models\TempProfitReport;
use App\Models\TempTrialBalance;
use App\Models\TempInvoiceReport;
use App\Models\Typesetup;
use App\Models\ReceiptVoucher;
use Illuminate\Support\Facades\DB;
use App\Models\PurchaseOrderDetail;
use App\Models\PurchaseOrderMaster;
use App\Models\TempUserPerformance;
use App\Models\ShipingPortSetup;
use App\Models\termssetup;
use App\Models\VenderSetup;
use App\Models\Events;
use App\Models\UserRights;
use App\Models\InvoiceMaster;
use App\Models\Quote;
use App\Models\BranchSetup;
use App\Models\FixAccountSetup;
use Illuminate\Support\Facades\Auth;

class Reports extends Controller
{

   
    
    public function TrialBalance()
    {
        $branchdata = DB::table('BranchSetup')->where('BranchCode',Auth::user()->BranchCode)->first();
        $MBranchCode = Auth::user()->BranchCode;
        $BranchName = $branchdata->BranchName;
        $MWorkUser = Auth::user()->UserName;

        return view('Reports.TrialBalance',
            [
                'MBranchCode' => $MBranchCode,
                'BranchCode' => $MBranchCode,
                'BranchName' => $BranchName,
            ]
        );
    }

    public function TrialBalancesearch(Request $request)
    {
        $PVendorcode = '756';
        $MBranchCode = Auth::user()->BranchCode;
        $MWorkUser = Auth::user()->UserName;

        info($MWorkUser);
        $MCurrency = config('app.Currency');
        $TxtDateFrom = $request->input('TxtDateFrom');
        $TxtDateTo = $request->input('TxtDateTo');
        $TxtActCode = $request->input('TxtActCode');
        $ChkActCode = $request->input('ChkActCode');
        $TxtSearchAc = $request->input('TxtSearchAc');

        TempTrialBalance::where('WorkUser', $MWorkUser)->where('BranchCode', $MBranchCode)->delete();


        if ($ChkActCode == 'false' && strlen(trim($TxtActCode)) !== 0) {
            if (intval($MBranchCode) > 0) {
                if ($TxtSearchAc !== '') {
                    $Qry = DB::table('qrytransacfile')
                        ->select(DB::raw('SUM(TransAmt) as MTransAmt, BranchCode, ActCode'))
                        ->where('AcName3', 'like', '%' . $TxtSearchAc . '%')
                        ->whereBetween('date', [$TxtDateFrom, $TxtDateTo])
                        ->where('BranchCode', $MBranchCode)
                        ->where('ActCode', 'like', $TxtActCode . '.%')
                        ->groupBy('BranchCode', 'ActCode')
                        ->get();
                } else {
                    $Qry = Trans::select(DB::raw('SUM(TransAmt) as MTransAmt, BranchCode, ActCode'))
                        ->whereBetween('date', [$TxtDateFrom, $TxtDateTo])
                        ->where('BranchCode', $MBranchCode)
                        ->where('ActCode', 'like', $TxtActCode . '.%')
                        ->groupBy('BranchCode', 'ActCode')
                        ->get();
                }
            } else {
                $Qry = Trans::select(DB::raw('SUM(TransAmt) as MTransAmt, BranchCode, ActCode'))
                    ->whereBetween('date', [$TxtDateFrom, $TxtDateTo])
                    ->where('ActCode', 'like', $TxtActCode . '.%')
                    ->groupBy('ActCode', 'BranchCode')
                    ->get();
            }
        } else {

            if ($MBranchCode !== 0) {
                $Qry = Trans::select(DB::raw('SUM(TransAmt) as MTransAmt, BranchCode, ActCode'))
                    ->where('BranchCode', $MBranchCode)
                    ->whereBetween('date', [$TxtDateFrom, $TxtDateTo])
                    ->groupBy('BranchCode', 'ActCode')
                    ->orderBy('ActCode')
                    ->get();
            } else {
                $Qry = Trans::select(DB::raw('SUM(TransAmt) as MTransAmt, BranchCode, ActCode'))
                    ->whereBetween('date', [$TxtDateFrom, $TxtDateTo])
                    ->orderBy('ActCode')
                    ->get();
            }
        }
        $TempTrialBalance = TempTrialBalance::where('WorkUser', $MWorkUser)->where('BranchCode', $MBranchCode)->first();

        for ($i = 0; $i < count($Qry); $i++) {
            $TempTrialBalance = new TempTrialBalance;
            $TempTrialBalance->ActCode = $Qry[$i]->ActCode;
            $TempTrialBalance->BranchCode = $MBranchCode;
            $TempTrialBalance->WorkUser = $MWorkUser;
            $TempActCode = $Qry[$i]->ActCode;
            $TempTrialBalance->Currency = $MCurrency;

            $AcFile3 = AcFile::where('BranchCode', $Qry[$i]->BranchCode)->where('ActCode', $TempActCode)->first();
            if ($AcFile3) {
                $TempTrialBalance->AcCode1 = $AcFile3->ACode1;
                $TempTrialBalance->AcName1 = $AcFile3->TitleLevel1;

                $TempTrialBalance->AcCode2 = $AcFile3->ACode2;
                $TempTrialBalance->AcName2 = $AcFile3->TitleLevel2;

                $TempTrialBalance->ACode3 = $AcFile3->ACode3;
                $TempTrialBalance->TitleLevel3 = $AcFile3->TitleLevel3;

                $TempTrialBalance->ACode4 = $AcFile3->ACode4;
                $TempTrialBalance->TitleLevel4 = $AcFile3->TitleLevel4;

                $TempTrialBalance->ACode5 = $AcFile3->ACode5;
                $TempTrialBalance->TitleLevel5 = $AcFile3->TitleLevel5;

                $TempTrialBalance->AcName3 = $AcFile3->AcName3;
            }

            $MTransAmt = $Qry[$i]->MTransAmt;
            $MTransAmt = round($MTransAmt, 2);

            if (intval($MTransAmt) > 0) {
                $TempTrialBalance->Debit = $MTransAmt;
                $TempTrialBalance->Credit = 0;
            } else {
                $TempTrialBalance->Credit = abs($MTransAmt);
                $TempTrialBalance->Debit = 0;
            }

            $TempTrialBalance->WorkUser = $MWorkUser;
            $TempTrialBalance->save();
        }
        $ChkOnlyChartOfAccount = $request->input('ChkOnlyChartOfAccount');

        if ($ChkOnlyChartOfAccount == 'false') {

            TempTrialBalance::whereNull('Debit')
                ->orWhere('Debit', 0)
                ->whereNull('Credit')
                ->orWhere('Credit', 0)
                ->where('BranchCode', $MBranchCode)
                ->where('Workuser', $MWorkUser)
                ->delete();
        }

        $TempTrialBalance = TempTrialBalance::where('BranchCode', $MBranchCode)
            ->where('Workuser', $MWorkUser)
            ->orderBy('BranchCode')
            ->orderBy('AcName1')
            ->orderBy('AcName2')
            ->orderBy('ActCode')
            ->get();
        info($TempTrialBalance);
        return response()->json([
            'TempTrialBalance' => $TempTrialBalance,
        ]);
    }

    public function TempIncome()
    {
        return view('Reports.TempIncome', []);
    }

    public function GetTempIncome(Request $request)
    {
        $TxtDateTo = $request->input('TxtDateTo');
        $TxtDateFrom = $request->input('TxtDateFrom');

        $Income = TempIncome::where('DateFrom', '>=', $TxtDateFrom)
            ->where('DateTo', '<=', $TxtDateTo)->orderBy('GroupSort')->orderBy('TitleName')
            ->get();


        return response()->json([
            'Income' => $Income,
        ]);
    }
    public function GetIncomepr(Request $request)
    {
        $TxtDateTo = $request->input('TxtDateTo');
        $TxtDateFrom = $request->input('TxtDateFrom');

        $Income = TempIncome::where('DateFrom', '>=', $TxtDateFrom)
            ->where('DateTo', '<=', $TxtDateTo)->orderBy('GroupSort')->orderBy('TitleName')
            ->get();


        return response()->json([
            'Income' => $Income,
        ]);
    }

    public function OrderReportCuscode(Request $request)
    {
        $customer = $request->input('customer');
        $MBranchCode = Auth::user()->BranchCode;

        $CustomerCode = Customer::select('CustomerCode')->where('CustomerName', $customer)->where('BranchCode', $MBranchCode)->first();
        if ($CustomerCode) {
            $CustomerCode = $CustomerCode->CustomerCode;
        }

        return response()->json([
            'CustomerCode' => $CustomerCode,
        ]);
    }

    public function OrderReport()
    {
        $PVendorcode = '756';
        $MBranchCode = Auth::user()->BranchCode;
        $MWorkUser = config('app.MWorkUser');
        $MCurrency = config('app.Currency');

        $Terms = PurchaseOrderMaster::select('Terms')
            ->distinct()
            ->where('BranchCode', $MBranchCode)
            ->get();
        $Status = OrderMasterModel::select('Status')
            ->distinct()
            ->where('BranchCode', $MBranchCode)
            ->get();
        $Customer = OrderMasterModel::select('CustomerName')
            ->distinct()
            ->where('BranchCode', $MBranchCode)
            ->orderBy('CustomerName')
            ->get();
        $Vessel = OrderMasterModel::select('VesselName')
            ->distinct()
            ->where('BranchCode', $MBranchCode)
            ->orderBy('VesselName')
            ->get();



        $Typesetup = Typesetup::select('TypeCode', 'TypeName')->where('BranchCode', $MBranchCode)->orderBy('typecode')->get();



        return view('Reports.OrderReport', [
            'BranchCode' => $MBranchCode,
            'Terms' => $Terms,
            'Status' => $Status,
            'Typesetup' => $Typesetup,
            'Customer' => $Customer,
            'Vessel' => $Vessel,
        ]);
    }

    public function orderreportprint(Request $request)
    {
        $Qry = $request->input('Qry');
        $Datefrom = $request->input('DateFrom');
        $DateTo = $request->input('TxtDateTo');
        $MBranchCode = Auth::user()->BranchCode;
        $BranchCode = Auth::user()->BranchCode;

        $company = CompanySetup::where('BranchCode', $BranchCode)->first();
        $orders = OrderMasterModel::select('PONo', 'OrderDate', 'VSNNo', 'EventNo', 'CustomerName', 'VesselName', 'Department', 'Terms', 'Status', 'OrderQty', 'RecQty', 'DeliveredQty', 'RtnQty', 'MissingQty', 'SoldQty', 'SaleReturnQty', 'ExtAmount', 'ChkSendEmail')
            // ->where('BranchCode', $MBranchCode)
            ->whereRaw($Qry)
            ->orderBy('OrderDate')
            ->orderBy('PONo')
            ->get();
        // dd($Qry);

        return view('prints.OrderReportprint', [
            'BranchCode' => $MBranchCode,
            'orders' => $orders,
            'Datefrom' => $Datefrom,
            'DateTo' => $DateTo,
            'company' => $company,
        ]);
    }

    public function OrderReportsearch(Request $request)
    {
        $MBranchCode = Auth::user()->BranchCode;
        $Qry = $request->input('Qry');

        $orders = OrderMasterModel::select('PONo', 'OrderDate', 'VSNNo', 'EventNo', 'CustomerName', 'VesselName', 'Department', 'Terms', 'Status', 'OrderQty', 'RecQty', 'DeliveredQty', 'RtnQty', 'MissingQty', 'SoldQty', 'SaleReturnQty', 'ExtAmount', 'ChkSendEmail')
            ->where('BranchCode', $MBranchCode)
            ->whereRaw($Qry)
            ->orderBy('OrderDate')
            ->orderBy('PONo')
            ->get();

        return response()->json([
            'orders' => $orders,
        ]);
    }
    public function PoReceivedReport()
    {
        $PVendorcode = '756';
        $MBranchCode = Auth::user()->BranchCode;
        $MWorkUser = config('app.MWorkUser');
        $MCurrency = config('app.Currency');

        $Terms = PurchaseOrderMaster::select('Terms')
            ->distinct()
            ->where('BranchCode', $MBranchCode)
            ->get();
        $Status = OrderMasterModel::select('Status')
            ->distinct()
            ->where('BranchCode', $MBranchCode)
            ->get();
        $Customer = OrderMasterModel::select('CustomerName')
            ->distinct()
            ->where('BranchCode', $MBranchCode)
            ->orderBy('CustomerName')
            ->get();
        $Vessel = OrderMasterModel::select('VesselName')
            ->distinct()
            ->where('BranchCode', $MBranchCode)
            ->orderBy('VesselName')
            ->get();
        $GodownSetup = GodownSetup::select('GodownCode', 'GodownName')
            ->where('ChkNotShow', 0)
            ->where('BranchCode', $MBranchCode)
            ->orderBy('Godowncode')
            ->get();


        $Typesetup = Typesetup::select('TypeCode', 'TypeName')->where('BranchCode', $MBranchCode)->orderBy('typecode')->get();



        return view('Reports.PO_Received_Report', [
            'BranchCode' => $MBranchCode,
            'Terms' => $Terms,
            'Status' => $Status,
            'Typesetup' => $Typesetup,
            'Customer' => $Customer,
            'Vessel' => $Vessel,
            'GodownSetup' => $GodownSetup,
        ]);
    }

    public function PoReceivedReportprint(Request $request)
    {
        $Qry = $request->input('Qry');
        $Qry2 = $request->input('Qry2');
        $MRep = $request->input('MRep');
        $Datefrom = $request->input('DateFrom');
        $DateTo = $request->input('TxtDateTo');
        $MBranchCode = Auth::user()->BranchCode;
        $BranchCode = Auth::user()->BranchCode;
        $MWorkUser = config('app.MWorkUser');

        $company = CompanySetup::where('BranchCode', $BranchCode)->first();
        // $results = DB::select('EXEC SpGetPurchaseOrderReport ?, ?', [$MBranchCode, $Qry]);
        // $results = PurchaseOrderMaster::where;
        // dd($Qry);
        $results = PurchaseOrderMaster::where('BranchCode', $MBranchCode)
            ->whereRaw($Qry)
            ->orderBy('PurchaseOrderNo')
            ->get();
        // $details = PurchaseOrderDetail::where('BranchCode', $MBranchCode)
        //             ->whereRaw('RecQty>0')
        //             ->orderBy('PurchaseOrderNo')
        //             ->limit(10)
        //             ->get();

        // dd($details);
        return view('prints.' . $MRep, [
            'BranchCode' => $MBranchCode,
            'table' => $results,
            'Datefrom' => $Datefrom,
            'Date' => $DateTo,
            'MWorkUser' => $MWorkUser,
            'company' => $company,
        ]);
    }

    public function PoReceivedReportsearch(Request $request)
    {
        $MBranchCode = Auth::user()->BranchCode;
        $Qry = $request->input('Qry');
        info($Qry);

        $results = DB::select('EXEC SpGetPurchaseOrderReport ?, ?', [$MBranchCode, $Qry]);






        return response()->json([
            'Data' => $results,
        ]);
    }



    public function PerformaInvoicePrint(Request $request)
    {
        $BranchCode = Auth::user()->BranchCode;
        $ChkKG = $request->input('ChkKG');
        $PONo = $request->input('PONo');

        $company = CompanySetup::where('BranchCode', $BranchCode)->first();
        $OrderMaster = OrderMasterModel::where('PONo', $PONo)->where('BranchCode', $BranchCode)->first();
        $OrderDetail = OrderModel::where('PONO', $PONo)->where('BranchCode', $BranchCode)->get();
        $OrderDetailf = OrderModel::where('PONO', $PONo)->where('BranchCode', $BranchCode)->first();
        $VSNNo = $OrderMaster->VSNNo;
        $FlipTovsn = FlipTovsn::where('VSNNo', $VSNNo)->where('BranchCode', $BranchCode)->first();

        return view('prints.PerformaInvoicePrint', [

            'ChkKG' => $ChkKG,
            'company' => $company,
            'OrderMaster' => $OrderMaster,
            'OrderDetails' => $OrderDetail,
            'OrderDetailf' => $OrderDetailf,
            'FlipToVSN' => $FlipTovsn,
        ]);
    }


    public function InvoiceReport()
    {
        $PVendorcode = '756';
        $MBranchCode = Auth::user()->BranchCode;
        $MWorkUser = config('app.MWorkUser');
        $MCurrency = config('app.Currency');

        $Terms = PurchaseOrderMaster::select('Terms')
            ->distinct()
            ->where('BranchCode', $MBranchCode)
            ->get();
        $Status = OrderMasterModel::select('Status')
            ->distinct()
            ->where('BranchCode', $MBranchCode)
            ->get();
        $Customer = OrderMasterModel::select('CustomerName')
            ->distinct()
            ->where('BranchCode', $MBranchCode)
            ->orderBy('CustomerName')
            ->get();
        $Vessel = OrderMasterModel::select('VesselName')
            ->distinct()
            ->where('BranchCode', $MBranchCode)
            ->orderBy('VesselName')
            ->get();



        $Typesetup = Typesetup::select('TypeCode', 'TypeName')->where('BranchCode', $MBranchCode)->orderBy('typecode')->get();



        return view('Reports.InvoiceReport', [
            'BranchCode' => $MBranchCode,
            'Terms' => $Terms,
            'Status' => $Status,
            'Typesetup' => $Typesetup,
            'Customer' => $Customer,
            'Vessel' => $Vessel,
        ]);
    }

    public function InvoiceReportprint(Request $request)
    {
        $Datefrom = $request->input('DateFrom');
        $DateTo = $request->input('DateTo');
        $MBranchCode = Auth::user()->BranchCode;
        $BranchCode = Auth::user()->BranchCode;
        $MWorkUser = Auth::user()->UserName;

        $company = CompanySetup::where('BranchCode', $BranchCode)->first();
        $orders = TempInvoiceReport::where('BranchCode', $MBranchCode)
            ->where('WorkUser', $MWorkUser)
            ->orderBy('InvNo')->orderBy('Invdate')
            ->get();
        // dd($Qry);

        return view('prints.InvoiceReportprint', [
            'MWorkUser' => $MWorkUser,
            'BranchCode' => $MBranchCode,
            'orders' => $orders,
            'Datefrom' => $Datefrom,
            'DateTo' => $DateTo,
            'company' => $company,
        ]);
    }

    public function InvoiceReportsearch(Request $request)
    {
        $MBranchCode = Auth::user()->BranchCode;
        $Qry = $request->input('Qry');
        $MWorkUser = config('app.MWorkUser');

        TempInvoiceReport::where('BranchCode', $MBranchCode)->where('WorkUser', $MWorkUser)->delete();

        $TxtTotInvAmt = 0;
        $TxtCrNoteAmt = 0;
        $TxtInvDiscount = 0;
        $TxtGrossSaleAmt = 0;
        //    info($Qry);

        if ($Qry !== '') {
            $rs2 = DB::table('qryordermaster')
                ->where('BranchCode', $MBranchCode)
                ->whereRaw($Qry)
                ->orderBy('InvDate')
                ->orderBy('PONo')
                ->get();
            // info($rs2);
            if ($rs2) {
                for ($i = 0; $i < count($rs2); $i++) {
                    // info($rs2[$i]->PONo);
                    $rs1 = new TempInvoiceReport;
                    $rs1->BranchCode = $MBranchCode;
                    $rs1->WorkUser = $MWorkUser;
                    $rs1->InvNo = $rs2[$i]->PONo;
                    $rs1->Invdate = $rs2[$i]->InvDate;
                    $rs1->VesselName = $rs2[$i]->VesselName;
                    $rs1->CustomerName = $rs2[$i]->CustomerName;
                    $rs1->DepartmentName = $rs2[$i]->DepartmentName;
                    $rs1->Terms = $rs2[$i]->Terms;
                    $rs1->PurchaseOrderNo = $rs2[$i]->PurchaseOrderNo;
                    $NetAmount = (float) $rs2[$i]->NetAmount ? $rs2[$i]->NetAmount : 0;
                    $InvDiscAmt = (float) $rs2[$i]->InvDiscAmt ? $rs2[$i]->InvDiscAmt : 0;
                    $rs1->GrossSaleAmt = $NetAmount + $InvDiscAmt;
                    $rs1->InvDiscPer = $rs2[$i]->InvDiscPer;
                    $rs1->InvDiscAmt = $rs2[$i]->InvDiscAmt;
                    $rs1->InvoiceAmt = $NetAmount;
                    $TxtTotInvAmt = $TxtTotInvAmt + $NetAmount;
                    $CrNoteAmt = (float) $rs2[$i]->CrNoteAmt ? $rs2[$i]->CrNoteAmt : 0;
                    $CrNoteAmount = (float) $rs2[$i]->CrNoteAmount ? $rs2[$i]->CrNoteAmount : 0;
                    $rs1->CrNoteAmt = $CrNoteAmt + $CrNoteAmount;
                    $TxtCrNoteAmt = $TxtCrNoteAmt + $CrNoteAmt + $CrNoteAmount;
                    $TxtInvDiscount = $TxtInvDiscount + $InvDiscAmt;
                    $TxtGrossSaleAmt = $TxtGrossSaleAmt + $NetAmount + $InvDiscAmt;
                    $rs1->save();
                }
            }
        }
        $TxtTotInvAmt = round($TxtTotInvAmt, 2);
        $TxtCrNoteAmt = round($TxtCrNoteAmt, 2);
        $TxtGrossSaleAmt = round($TxtGrossSaleAmt, 2);
        $TxtInvDiscount = round($TxtInvDiscount, 2);



        $TempInvoiceReport = TempInvoiceReport::select(
            'InvNo',
            'Invdate',
            'VesselName',
            'CustomerName',
            'DepartmentName',
            'Terms',
            'PurchaseOrderNo',
            'GrossSaleAmt',
            'InvDiscPer',
            'InvDiscAmt',
            'InvoiceAmt',
            'CrNoteAmt'
        )->where('BranchCode', $MBranchCode)
            ->where('WorkUser', $MWorkUser)->orderBy('InvNo')->orderBy('Invdate')->get();

        return response()->json([
            'TxtTotInvAmt' => $TxtTotInvAmt,
            'TxtCrNoteAmt' => $TxtCrNoteAmt,
            'TxtGrossSaleAmt' => $TxtGrossSaleAmt,
            'TxtInvDiscount' => $TxtInvDiscount,
            'TempInvoiceReport' => $TempInvoiceReport,
        ]);
    }


    public function DMMissingReport()
    {
        $PVendorcode = '756';
        $MBranchCode = Auth::user()->BranchCode;
        $MWorkUser = config('app.MWorkUser');
        $MCurrency = config('app.Currency');

        $Terms = PurchaseOrderMaster::select('Terms')
            ->distinct()
            ->where('BranchCode', $MBranchCode)
            ->get();
        $Status = OrderMasterModel::select('Status')
            ->distinct()
            ->where('BranchCode', $MBranchCode)
            ->get();
        $Customer = OrderMasterModel::select('CustomerName')
            ->distinct()
            ->where('BranchCode', $MBranchCode)
            ->orderBy('CustomerName')
            ->get();
        $Vessel = OrderMasterModel::select('VesselName')
            ->distinct()
            ->where('BranchCode', $MBranchCode)
            ->orderBy('VesselName')
            ->get();
        $GodownSetup = GodownSetup::select('GodownCode', 'GodownName')
            ->where('ChkNotShow', 0)
            ->where('BranchCode', $MBranchCode)
            ->orderBy('Godowncode')
            ->get();


        $Typesetup = Typesetup::select('TypeCode', 'TypeName')->where('BranchCode', $MBranchCode)->orderBy('typecode')->get();
        $VenderSetup = VenderSetup::where('BranchCode', $MBranchCode)->orderBy('VenderName')->get();


        return view('Reports.DMMissingReport', [
            'BranchCode' => $MBranchCode,
            'Terms' => $Terms,
            'Status' => $Status,
            'Typesetup' => $Typesetup,
            'Customer' => $Customer,
            'Vessel' => $Vessel,
            'GodownSetup' => $GodownSetup,
            'VenderSetup' => $VenderSetup,
        ]);
    }

    public function DMMissingReportprint(Request $request)
    {
        $Datefrom = $request->input('DateFrom');
        $DateTo = $request->input('DateTo');
        $Qry = $request->input('Qry');
        $MBranchCode = Auth::user()->BranchCode;
        $BranchCode = Auth::user()->BranchCode;
        $MWorkUser = Auth::user()->UserName;

        $company = CompanySetup::where('BranchCode', $BranchCode)->first();

        // dd($Qry);
        $query = DB::table('qrymissingrpt')
            ->select('RTNDate', 'EventNo', 'QuoteNo', 'VSNNO', 'POMadeNo', 'GODOWNCODE', 'GODOWNNAME', 'ChargeNo', 'CustomerName', 'VendorName', 'DepartmentName', 'WorkUser', 'DiscPerVendor', DB::raw('SUM(DMMissingQty) as DMMissingQty'), DB::raw('SUM(DMMissingAmt) as DMMissingAmt'))
            ->where('RTNDate', '>=', $Datefrom)
            ->where('RTNDate', '<=', $DateTo)
            ->where('DMMissingQty', '>', 0)
            ->where('BranchCode', $MBranchCode)
            ->groupBy('RTNDate', 'EventNo', 'QuoteNo', 'VSNNO', 'POMadeNo', 'ChargeNo', 'GODOWNCODE', 'GODOWNNAME', 'CustomerName', 'VendorName', 'DepartmentName', 'WorkUser', 'DiscPerVendor')
            ->orderBy('RTNDate')
            ->orderBy('ChargeNo')
            ->orderBy('POMadeNo');
        if ($Qry) {
            $query->whereRaw($Qry);
        }

        // Execute the query and retrieve the results
        $results = $query->get();

        // Convert the results to a DataTable-like array structure
        $orders = $results->toArray();

        // dd($orders);


        return view('prints.DMMissingReportprint', [
            'MWorkUser' => $MWorkUser,
            'BranchCode' => $MBranchCode,
            'orders' => $orders,
            'Datefrom' => $Datefrom,
            'DateTo' => $DateTo,
            'company' => $company,
        ]);
    }

    public function DMMissingReportsearch(Request $request)
    {
        $MBranchCode = Auth::user()->BranchCode;
        $Qry = $request->input('Qry');
        $MWorkUser = config('app.MWorkUser');
        $txtDateFrom = $request->input('txtDateFrom');
        $txtDateTo = $request->input('txtDateTo');




        if ($Qry == '') {
            $rs1 = DB::table('qrymissingrpt')
                ->select('RTNDate', 'EventNo', 'QuoteNo', 'VSNNO', 'POMadeNo', 'GODOWNCODE', 'GODOWNNAME', 'ChargeNo', 'CustomerName', 'VendorName', 'DepartmentName', 'WorkUser', DB::raw('SUM(DMMissingQty) as DMMissingQty'), DB::raw('SUM(DMMissingAmt) as DMMissingAmt'))
                ->where('RTNDate', '>=', $txtDateFrom)
                ->where('RTNDate', '<=', $txtDateTo)
                ->where('DMMissingQty', '>', 0)
                ->where('BranchCode', $MBranchCode)
                ->groupBy('RTNDate', 'EventNo', 'QuoteNo', 'VSNNO', 'POMadeNo', 'ChargeNo', 'GODOWNCODE', 'GODOWNNAME', 'CustomerName', 'VendorName', 'DepartmentName', 'WorkUser', 'DiscPerVendor')
                ->orderBy('RTNDate')
                ->orderBy('ChargeNo')
                ->orderBy('POMadeNo')
                ->get();
        } else {
            $rs1 = DB::table('qrymissingrpt')
                ->select('RTNDate', 'EventNo', 'QuoteNo', 'VSNNO', 'POMadeNo', 'GODOWNCODE', 'GODOWNNAME', 'ChargeNo', 'CustomerName', 'VendorName', 'DepartmentName', 'WorkUser', 'DiscPerVendor', DB::raw('SUM(DMMissingQty) as DMMissingQty'), DB::raw('SUM(DMMissingAmt) as DMMissingAmt'))
                ->where('RTNDate', '>=', $txtDateFrom)
                ->where('RTNDate', '<=', $txtDateTo)
                ->where('DMMissingQty', '>', 0)
                ->where(DB::raw($Qry)) // Assuming $qry contains the additional condition
                ->where('BranchCode', $MBranchCode)
                ->groupBy('RTNDate', 'EventNo', 'QuoteNo', 'VSNNO', 'POMadeNo', 'ChargeNo', 'GODOWNCODE', 'GODOWNNAME', 'CustomerName', 'VendorName', 'DepartmentName', 'WorkUser', 'DiscPerVendor')
                ->orderBy('RTNDate')
                ->orderBy('ChargeNo')
                ->orderBy('POMadeNo')
                ->get();
        }

        // if($rs1->count() > 0){
        //     for ($i=0; $i <count($rs1) ; $i++) {

        //             // info($rs2[$i]->PONo);
        //                $rs1 = new TempInvoiceReport;
        //                $rs1->BranchCode = $MBranchCode;
        //                $rs1->WorkUser = $MWorkUser;
        //                $rs1->InvNo = $rs2[$i]->PONo;
        //                $rs1->Invdate = $rs2[$i]->InvDate;
        //                $rs1->VesselName = $rs2[$i]->VesselName;
        //                $rs1->CustomerName = $rs2[$i]->CustomerName;
        //                $rs1->DepartmentName = $rs2[$i]->DepartmentName;
        //                $rs1->Terms = $rs2[$i]->Terms;
        //                $rs1->PurchaseOrderNo = $rs2[$i]->PurchaseOrderNo;
        //                $NetAmount = (float) $rs2[$i]->NetAmount ? $rs2[$i]->NetAmount : 0;
        //                $InvDiscAmt = (float) $rs2[$i]->InvDiscAmt ? $rs2[$i]->InvDiscAmt : 0;
        //                $rs1->GrossSaleAmt =  $NetAmount + $InvDiscAmt;
        //                $rs1->InvDiscPer = $rs2[$i]->InvDiscPer;
        //                $rs1->InvDiscAmt = $rs2[$i]->InvDiscAmt;
        //                $rs1->InvoiceAmt = $NetAmount;
        //                $TxtTotInvAmt = $TxtTotInvAmt + $NetAmount;
        //                $CrNoteAmt = (float) $rs2[$i]->CrNoteAmt ? $rs2[$i]->CrNoteAmt : 0;
        //                $CrNoteAmount = (float) $rs2[$i]->CrNoteAmount ? $rs2[$i]->CrNoteAmount : 0;
        //                $rs1->CrNoteAmt = $CrNoteAmt + $CrNoteAmount;
        //                $TxtCrNoteAmt = $TxtCrNoteAmt +  $CrNoteAmt + $CrNoteAmount;
        //                $TxtInvDiscount = $TxtInvDiscount +  $InvDiscAmt;
        //                $TxtGrossSaleAmt = $TxtGrossSaleAmt + $NetAmount + $InvDiscAmt;
        //                $rs1->save();

        //             }


        //        }






        // Drop the TEMPDMMISSINGRPT table
        // DB::statement('DROP TABLE IF EXISTS TEMPDMMISSINGRPT');

        // Query to retrieve data from QryMissingRpt
        $query = DB::table('qrymissingrpt')
            ->select('RTNDate', 'EventNo', 'QuoteNo', 'VSNNO', 'POMadeNo', 'GODOWNCODE', 'GODOWNNAME', 'ChargeNo', 'CustomerName', 'VendorName', 'DepartmentName', 'WorkUser', 'DiscPerVendor', DB::raw('SUM(DMMissingQty) as DMMissingQty'), DB::raw('SUM(DMMissingAmt) as DMMissingAmt'))
            ->where('RTNDate', '>=', $txtDateFrom)
            ->where('RTNDate', '<=', $txtDateTo)
            ->where('DMMissingQty', '>', 0)
            ->where('BranchCode', $MBranchCode)
            ->groupBy('RTNDate', 'EventNo', 'QuoteNo', 'VSNNO', 'POMadeNo', 'ChargeNo', 'GODOWNCODE', 'GODOWNNAME', 'CustomerName', 'VendorName', 'DepartmentName', 'WorkUser', 'DiscPerVendor')
            ->orderBy('RTNDate')
            ->orderBy('ChargeNo')
            ->orderBy('POMadeNo');

        if ($Qry) {
            $query->whereRaw($Qry);
        }

        // Execute the query and retrieve the results
        $results = $query->get();

        // Convert the results to a DataTable-like array structure
        $dataTable = $results->toArray();


        return response()->json([
            'dataTable' => $dataTable,
            'rs1' => $rs1,

        ]);
    }

    public function RFQCustomerSummary()
    {

        $BranchCode = Auth::user()->BranchCode;
        $Typesetup = Typesetup::select('Typecode', 'TypeName')->where('BranchCode', $BranchCode)->orderBy('Typecode')->get();
        $GodownSetup = GodownSetup::select('GodownName', 'GodownCode')->Distinct()->where('GodownCode', '>', 0)->where('BranchCode', $BranchCode)->orderBy('GodownCode')->get();

        return view('Reports.RFQSummrayWise', [
            'Typesetup' => $Typesetup,
            'BranchCode' => $BranchCode,
            'GodownSetup' => $GodownSetup,
        ]);
    }
    public function PO_NotReceived()
    {

        $BranchCode = Auth::user()->BranchCode;
        $Typesetup = Typesetup::select('Typecode', 'TypeName')->where('BranchCode', $BranchCode)->orderBy('Typecode')->get();
        $GodownSetup = GodownSetup::select('GodownName', 'GodownCode')->Distinct()->where('GodownCode', '>', 0)->where('BranchCode', $BranchCode)->orderBy('GodownCode')->get();

        return view('Reports.PO_NotReceived', [
            'Typesetup' => $Typesetup,
            'BranchCode' => $BranchCode,
            'GodownSetup' => $GodownSetup,
        ]);
    }

    public function RFQVesselSummary()
    {

        $BranchCode = Auth::user()->BranchCode;
        $UserLIst = UserRights::select('UserName')->where('BranchCode', $BranchCode)->orderBy('UserName')->get();
        $Typesetup = Typesetup::select('Typecode', 'TypeName')->where('BranchCode', $BranchCode)->orderBy('Typecode')->get();
        $GodownSetup = GodownSetup::select('GodownName', 'GodownCode')->Distinct()->where('GodownCode', '>', 0)->where('BranchCode', $BranchCode)->orderBy('GodownCode')->get();

        return view('Reports.RFQVesselSummary', [
            'Typesetup' => $Typesetup,
            'GodownSetup' => $GodownSetup,
            'UserLIst' => $UserLIst,
        ]);
    }
    public function RFQVesselSummarySearch(Request $request)
    {
        $Qry = $request->input('Qry');
        $BranchCode = Auth::user()->BranchCode;
        $MWorkUser = Auth::user()->UserName;
        info($BranchCode);
        info($MWorkUser);

        $Alldata = [];
        $EventInvoice = Events::selectRaw("ISNULL(Emailsend, 'N') AS Emailsend, EventCreatedUser, Email")
            ->whereRaw($Qry)
            ->orderBy('CustomerName')
            ->get();



        foreach ($EventInvoice as $Invoice) {
            $MEventno = $Invoice->Eventno;

            $QuoteMaster = OrderMasterModel::selectRaw('count(QuoteNo) as NoofQuote, sum(ValueAmount) as QuoteAmount')
                ->where('EventNo', $MEventno)
                ->where('BranchCode', $BranchCode)
                ->first();

            $OrderMaster2 = OrderMasterModel::selectRaw('count(PONo) as NoofOrder, sum(ExtAmount) as OrderAmount')
                ->where('EventNo', $MEventno)
                ->where('BranchCode', $BranchCode)
                ->first();

            $Alldata[] = [
                'Invoice' => $Invoice,
                'QuoteMaster' => $QuoteMaster,
                'OrderMaster2' => $OrderMaster2,
            ];
        }



        return response()->json([
            'Alldata' => $Alldata,

        ]);
    }
    public function RFQVesselSummaryP(Request $request)
    {
        $BranchCode = Auth::user()->BranchCode;
        // info($BranchCode);
        $MWorkUser = Auth::user()->UserName;
        // info($MWorkUser);
        $table = $request->input('dataarray');
        $Message = 'start';

        $tdelete = DB::table('tempnewrfqsummary')
            ->where('BranchCode', $BranchCode)
            ->where('Workuser', $MWorkUser)
            ->delete();
        if ($tdelete) {
            $Message = 'delete';
        }
        for ($i = 0; $i < count($table); $i++) {
            $MEventno = $table[$i]['EventNo'];
            if ($MEventno !== '') {
                $twmp = DB::table('tempnewrfqsummary')
                    ->where('BranchCode', $BranchCode)
                    ->where('WorkUser', $MWorkUser)
                    ->insert([
                        'EventNo' => $MEventno,
                        'BranchCode' => $BranchCode,
                        'WorkUser' => $MWorkUser,
                        'VesselName' => $table[$i]['VesselName'],
                        'CustomerName' => $table[$i]['Customer'],
                        'ETADate' => $table[$i]['ETADate'],
                        'NoOfQuote' => (int) $table[$i]['NoofQuotes'],
                        'NoOfOrder' => (int) $table[$i]['NoofOrders'],
                        'QuoteAmount' => (float) $table[$i]['QuoteAmount'],
                        'OrderAmount' => (float) $table[$i]['OrderAmount'],
                        'Success' => (int) $table[$i]['Success'],
                        'Remarks' => $table[$i]['Remarks'],
                        'EmailSend' => $table[$i]['EmailSend'],
                    ]);
                if ($twmp) {
                    $Message = 'Saved';
                }
            }
        }

        return response()->json([
            'Message' => $Message,

        ]);
    }



    public function ReturnItemReport()
    {

        $BranchCode = Auth::user()->BranchCode;
        $UserLIst = UserRights::select('UserName')->where('BranchCode', $BranchCode)->orderBy('UserName')->get();
        $Typesetup = Typesetup::select('Typecode', 'TypeName')->where('BranchCode', $BranchCode)->orderBy('Typecode')->get();
        $GodownSetup = GodownSetup::select('GodownName', 'GodownCode')->Distinct()->where('GodownCode', '>', 0)->where('BranchCode', $BranchCode)->orderBy('GodownCode')->get();

        return view('Reports.ReturnItemReport', [
            'Typesetup' => $Typesetup,
            'GodownSetup' => $GodownSetup,
            'UserLIst' => $UserLIst,
            'BranchCode' => $BranchCode,
        ]);
    }
    public function ReturnItemReportsearch(Request $request)
    {
        $BranchCode = Auth::user()->BranchCode;
        $Qry = $request->input('Qry');
        $Qry2 = $request->input('Qry2');


        if ($Qry !== '') {
            $PurchaseOrderMaster = PurchaseOrderMaster::select('PurchaseOrderNo', 'PORecDate', 'Terms', 'DueDate', 'VSNNo', 'ChargeNo', 'VendorActCode', 'VendorCode', 'VendorName', 'VesselName', 'DepartmentName', 'PVNo', 'NetAmount', 'PaidAmt', 'OKToPay', 'TotalReturnAmount')
                ->where('BranchCode', $BranchCode)
                ->whereRaw($Qry)
                ->orderBy('VendorName')
                ->orderBy('PurchaseOrderNo')
                ->orderBy('Date')
                ->get();
        } else {
            $PurchaseOrderMaster = PurchaseOrderMaster::select('PurchaseOrderNo', 'PORecDate', 'Terms', 'DueDate', 'VSNNo', 'ChargeNo', 'VendorActCode', 'VendorCode', 'VendorName', 'VesselName', 'DepartmentName', 'PVNo', 'NetAmount', 'PaidAmt', 'OKToPay', 'TotalReturnAmount')
                ->where('BranchCode', $BranchCode)
                ->orderBy('VendorName')
                ->orderBy('PurchaseOrderNo')
                ->orderBy('Date')
                ->get();
        }
        if ($Qry2 !== '') {
            $InvoiceMasters = InvoiceMaster::where('BranchCode', $BranchCode)
                ->where('Type', 'PURC')
                ->whereRaw($Qry2)
                ->orderBy('InvoiceNo')
                ->get();
        } else {
            $InvoiceMasters = InvoiceMaster::where('BranchCode', $BranchCode)
                ->where('Type', 'PURC')
                ->orderBy('InvoiceNo')
                ->get();
        }
        $InvoiceMaster = [];
        foreach ($InvoiceMasters as $invoice) {
            $MPOMadeNo = $invoice->InvoiceNo;
            $result = DB::table('paymentvoucher')
                ->select(DB::raw('SUM(Amount) as MPayAmount'))
                ->where('POType', 'StockPO')
                ->where('ClientOrderNo', $MPOMadeNo)
                ->where('BranchCode', $BranchCode)
                ->first();
            $MPayAmount = $result->MPayAmount;
            $InvoiceMaster[] = [
                'invoice' => $invoice,
                'MPayAmount' => $MPayAmount,
            ];
        }



        return response()->json([
            'PurchaseOrderMaster' => $PurchaseOrderMaster,
            'InvoiceMaster' => $InvoiceMaster,
        ]);
    }


    public function invNetProfitReport()
    {

        $BranchCode = Auth::user()->BranchCode;
        // $UserLIst = UserRights::select('UserName')->where('BranchCode',$BranchCode)->orderBy('UserName')->get();
        $Typesetup = Typesetup::select('Typecode', 'TypeName')->where('BranchCode', $BranchCode)->orderBy('Typecode')->get();
        $ShipingPortSetup = ShipingPortSetup::select('PortName')->where('PortCode', '<>', '0')->Distinct()->where('BranchCode', $BranchCode)->orderBy('PortName')->get();
        $GodownSetup = GodownSetup::select('GodownName', 'GodownCode')->Distinct()->where('GodownCode', '>', 0)->where('BranchCode', $BranchCode)->orderBy('GodownCode')->get();

        return view('Reports.InvoicedNetProfitReport', [
            'Deptsetup' => $Typesetup,
            'BranchCode' => $BranchCode,
            'ShipingPortSetup' => $ShipingPortSetup,
            'GodownSetup' => $GodownSetup,
        ]);
    }

    public function NetProfitReportsearch(Request $request)
    {

        $BranchCode = Auth::user()->BranchCode;
        $branchdata = DB::table('BranchSetup')->where('BranchCode',Auth::user()->BranchCode)->first();

        $BranchName = $branchdata->BranchName;
        $MWorkUser = Auth::user()->UserName;
        $Qry = $request->input('qry');

        $MMissingActCode = '';
        $FixAccountSetup = FixAccountSetup::where('BranchCode', $BranchCode)->first();
        if ($FixAccountSetup) {
            $MMissingActCode = $FixAccountSetup->MissingActCode;
        }

        TempProfitReport::where('BranchCode', $BranchCode)->where('WorkUser', $MWorkUser)->delete();
        // $qry = "InvDate>='2023-06-21' and InvDate<='2023-06-21' and DepartmentCode in (3,10)";
        // $Qry = str_replace("'", "''", $Qry);
        // $Qry = $request->input('qry');
        $SPNetProfitReport = DB::select('EXEC InsertSPNetProfitReportResult @BranchCode = ' . $BranchCode . ', @Qry = ' . $Qry);
        info(count($SPNetProfitReport));
        if (count($SPNetProfitReport) > 0) {
            for ($i = 0; $i < count($SPNetProfitReport); $i++) {
                $TempProfitReport = new TempProfitReport;
                $TempProfitReport->BranchCode = $BranchCode;
                $TempProfitReport->BranchName = $BranchName;
                $TempProfitReport->GodownCode = $SPNetProfitReport[$i]->GodownCode;
                $TempProfitReport->GodownName = $SPNetProfitReport[$i]->GodownName;
                $TempProfitReport->CustomerCode = $SPNetProfitReport[$i]->CustomerCode;
                $TempProfitReport->CustomerName = $SPNetProfitReport[$i]->CustomerName;
                $TempProfitReport->ChargeNo = $SPNetProfitReport[$i]->PONO;
                $TempProfitReport->InvoiceDate = $SPNetProfitReport[$i]->InvDate;
                $TempProfitReport->CustomerRefNo = $SPNetProfitReport[$i]->CustomerRefNo;
                $TempProfitReport->Terms = $SPNetProfitReport[$i]->Terms;
                $TempProfitReport->VesselName = $SPNetProfitReport[$i]->VesselName;
                $TempProfitReport->DepartmentCode = $SPNetProfitReport[$i]->DepartmentCode;
                $TempProfitReport->DepartmentName = $SPNetProfitReport[$i]->DepartmentName;
                $TempProfitReport->Status = $SPNetProfitReport[$i]->Status;
                $TempProfitReport->WorkUser = $MWorkUser;
                $MChargeNo11 = $SPNetProfitReport[$i]->PONO;
                $MPORetNetAmt = $SPNetProfitReport[$i]->MPORetNetAmt;
                $MPORecAmt = intval($SPNetProfitReport[$i]->MPORecAmt) - intval($MPORetNetAmt);
                $TempProfitReport->PurcAmt = $MPORecAmt;
                $MPullStockAmt = intval($SPNetProfitReport[$i]->MPullStockAmt);
                $TempProfitReport->PullStockAmt = $MPullStockAmt;
                $MSaleReturnCost = intval($SPNetProfitReport[$i]->MSaleReturnCost);
                $MMissingAmtSaleCost = intval($SPNetProfitReport[$i]->MMissingAmt);
                $MPurcReturnAmt = intval($MSaleReturnCost) + intval($MMissingAmtSaleCost);
                $TempProfitReport->PurcReturnAmt = intval($MPurcReturnAmt);
                $MNetCostAmt = (intval($MPORecAmt) + intval($MPullStockAmt)) - intval($MPurcReturnAmt);
                $TempProfitReport->NetCostAmt = intval($MNetCostAmt);
                $NCrNoteAmt = intval($SPNetProfitReport[$i]->NCrNoteAmt);
                $TempProfitReport->InvDiscPer = intval($SPNetProfitReport[$i]->InvDiscPer);
                $TempProfitReport->InvDiscAmt = intval($SPNetProfitReport[$i]->InvDiscAmt);
                $MCrNoteDeduction = intval($NCrNoteAmt) + intval($SPNetProfitReport[$i]->CrNoteAmount);
                $TempProfitReport->InvoiceAmt = intval($SPNetProfitReport[$i]->NetAmount) - intval($MCrNoteDeduction);
                $MRVAmount = $SPNetProfitReport[$i]->MRVAmount;
                $TempProfitReport->ReceivedAmt = intval($MRVAmount);
                $MNetInvoiceAmt = intval($SPNetProfitReport[$i]->NetAmount);
                $MBAlance = intval($MNetInvoiceAmt) - (intval($MRVAmount) + intval($MCrNoteDeduction));
                $TempProfitReport->Balance = intval($MBAlance);
                $TempProfitReport->GPPer = intval($SPNetProfitReport[$i]->GPPer);
                $TempProfitReport->GPAmount = intval($SPNetProfitReport[$i]->TotGPAmt);
                $TempProfitReport->CrNotePer = intval($SPNetProfitReport[$i]->CrNotePer);
                $TempProfitReport->CrNoteAmount = intval($NCrNoteAmt) + intval($SPNetProfitReport[$i]->CrNoteAmount);
                $TempProfitReport->AVIRebatePer = intval($SPNetProfitReport[$i]->AVIRebatePer);
                $TempProfitReport->AVIRebateAmt = intval($SPNetProfitReport[$i]->AVIRebateAmt);
                $TempProfitReport->AgentCommPer = intval($SPNetProfitReport[$i]->AgentCommPer);
                $TempProfitReport->AgentCommAmt = intval($SPNetProfitReport[$i]->AgentCommAmt);
                $TempProfitReport->SlsCommPer = intval($SPNetProfitReport[$i]->SlsCommPer);
                $TempProfitReport->SlsCommAmt = intval($SPNetProfitReport[$i]->SlsCommAmt);
                $MDeductionAmt = intval($NCrNoteAmt) + intval($SPNetProfitReport[$i]->CrNoteAmount) + intval($SPNetProfitReport[$i]->AVIRebateAmt) + intval($SPNetProfitReport[$i]->AgentCommAmt) + intval($SPNetProfitReport[$i]->SlsCommAmt);
                $MSaleAmt = intval($SPNetProfitReport[$i]->NetAmount) - intval($MDeductionAmt);
                $TempProfitReport->NetSaleAmt = intval($MSaleAmt);
                $TempProfitReport->save();
            }
        }

        $TempProfitReports = TempProfitReport::where('BranchCode', $BranchCode)->where('WorkUser', $MWorkUser)->orderBy('GodownCode')->orderBy('CustomerCode')->orderBy('InvoiceDate')->orderBy('ChargeNo')->get();


        return response()->json([
            'TempProfitReport' => $TempProfitReports,
        ]);
    }


    public function MaxPurchasedItemReport()
    {

        $BranchCode = Auth::user()->BranchCode;
        // $UserLIst = UserRights::select('UserName')->where('BranchCode',$BranchCode)->orderBy('UserName')->get();
        $Typesetup = Typesetup::select('Typecode', 'TypeName')->where('BranchCode', $BranchCode)->orderBy('Typecode')->get();
        $ShipingPortSetup = ShipingPortSetup::select('PortName')->where('PortCode', '<>', '0')->Distinct()->where('BranchCode', $BranchCode)->orderBy('PortName')->get();
        $GodownSetup = GodownSetup::select('GodownName', 'GodownCode')->Distinct()->where('GodownCode', '>', 0)->where('BranchCode', $BranchCode)->orderBy('GodownCode')->get();

        return view('Reports.MaxPurchasedItemReport', [
            'Deptsetup' => $Typesetup,
            'BranchCode' => $BranchCode,
            'ShipingPortSetup' => $ShipingPortSetup,
            'GodownSetup' => $GodownSetup,
        ]);
    }

    public function PurchaseReturnReport()
    {

        $BranchCode = Auth::user()->BranchCode;
        // $UserLIst = UserRights::select('UserName')->where('BranchCode',$BranchCode)->orderBy('UserName')->get();
        $Typesetup = Typesetup::select('Typecode', 'TypeName')->where('BranchCode', $BranchCode)->orderBy('Typecode')->get();
        $ShipingPortSetup = ShipingPortSetup::select('PortName')->where('PortCode', '<>', '0')->Distinct()->where('BranchCode', $BranchCode)->orderBy('PortName')->get();
        $GodownSetup = GodownSetup::select('GodownName', 'GodownCode')->Distinct()->where('GodownCode', '>', 0)->where('BranchCode', $BranchCode)->orderBy('GodownCode')->get();
        $Terms = PurchaseOrderMaster::select('Terms')->Distinct('Terms')->where('BranchCode', $BranchCode)->get();
        $Departments = OrderMasterModel::Select('Department')->distinct('Department')->where('BranchCode', $BranchCode)->orderBy('Department')->get();
        $Customers = OrderMasterModel::Select('CustomerName')->distinct('CustomerName')->where('BranchCode', $BranchCode)->orderBy('CustomerName')->get();
        $VendorS = OrderModel::Select('VendorName')->distinct('VendorName')->where('BranchCode', $BranchCode)->orderBy('VendorName')->get();
        $Vessels = OrderMasterModel::Select('VesselName')->distinct('VesselName')->where('BranchCode', $BranchCode)->orderBy('VesselName')->get();
        return view('Reports.PurchaseReturnReport', [
            'Deptsetup' => $Typesetup,
            'Terms' => $Terms,
            'Departments' => $Departments,
            'Customers' => $Customers,
            'VendorS' => $VendorS,
            'Vessels' => $Vessels,
            'BranchCode' => $BranchCode,
            'ShipingPortSetup' => $ShipingPortSetup,
            'GodownSetup' => $GodownSetup,
        ]);
    }

    public function AVIRebateReport()
    {

        $BranchCode = Auth::user()->BranchCode;
        // $UserLIst = UserRights::select('UserName')->where('BranchCode',$BranchCode)->orderBy('UserName')->get();
        $Typesetup = Typesetup::select('Typecode', 'TypeName')->where('BranchCode', $BranchCode)->orderBy('Typecode')->get();
        $ShipingPortSetup = ShipingPortSetup::select('PortName')->where('PortCode', '<>', '0')->Distinct()->where('BranchCode', $BranchCode)->orderBy('PortName')->get();
        $GodownSetup = GodownSetup::select('GodownName', 'GodownCode')->Distinct()->where('GodownCode', '>', 0)->where('BranchCode', $BranchCode)->orderBy('GodownCode')->get();

        return view('Reports.AVIRebateReport', [
            'Deptsetup' => $Typesetup,
            'BranchCode' => $BranchCode,
            'ShipingPortSetup' => $ShipingPortSetup,
            'GodownSetup' => $GodownSetup,
        ]);
    }
    public function AviRebaterepShow(Request $request)
    {

        $MBranchCode = Auth::user()->BranchCode;
        $MBranchName = config('app.MBranchName');
        $MWorkUser = Auth::user()->UserName;
        $Qry = $request->input('Qry');
        DB::table('tempavirebaitreport')->where('BranchCode', $MBranchCode)->where('WorkUser', $MWorkUser)->Delete();
        $rs1 = DB::table('tempavirebaitreport')->where('BranchCode', $MBranchCode)->where('WorkUser', $MWorkUser)->get();



        if ($Qry !== "") {
            $PB1Value = 0;

            $rs2 = DB::select("Select * from OrderMaster where BranchCode=" . $MBranchCode . " and " . $Qry . " order by GodownCode,CustomerCode,InvDate,PONO");
            info($rs2);
            info($MBranchCode);
            if (count($rs2) > 0) {
                foreach ($rs2 as $row) {
                    $MChargeNo11 = $row->PONo ? $row->PONo : '';
                    $MRVAmount = ReceiptVoucher::where('BranchCode', $MBranchCode)->where('ClientOrderNo', $MChargeNo11)->sum('Amount');
                    $MCreditNoteAmt = DB::table('creditnote')->where('BranchCode', $MBranchCode)->where('ClientOrderNo', $MChargeNo11)->sum('CrNOteAmt');
                    $MTotCrNoteAmt = (float) $MCreditNoteAmt + (float) $row->CrNoteAmount;
                    $MDeductionAmt = (float) $MTotCrNoteAmt + (float) ($row->AVIRebateAmt ? $row->AVIRebateAmt : 0) + (float) ($row->AgentCommAmt ? $row->AgentCommAmt : 0) + (float) ($row->SlsCommAmt ? $row->SlsCommAmt : 0);
                    $MSaleAmt = (float) ($row->NetAmount ? $row->NetAmount : 0) - (float) $MTotCrNoteAmt;

                    DB::table('tempavirebaitreport')->insert([
                        'BranchCode' => $MBranchCode,
                        'BranchName' => $MBranchName,
                        'GodownCode' => $row->GodownCode,
                        'GodownName' => $row->GodownName,
                        'CustomerCode' => $row->CustomerCode,
                        'CustomerName' => $row->CustomerName,
                        'ChargeNo' => $row->PONo,
                        'InvoiceDate' => $row->InvDate,
                        'CustomerRefNo' => $row->CustomerRefNo,
                        'Terms' => $row->Terms,
                        'VesselName' => $row->VesselName,
                        'DepartmentCode' => $row->DepartmentCode,
                        'DepartmentName' => $row->DepartmentName,
                        'Status' => $row->Status,
                        'WorkUser' => $MWorkUser,
                        'InvDiscPer' => $row->InvDiscPer,
                        'InvDiscAmt' => $row->InvDiscAmt,
                        'InvoiceAmt' => $row->NetAmount,
                        'ReceivedAmt' => $MRVAmount,
                        'CrNotePer' => $row->CrNotePer,
                        'CrNoteAmount' => $MCreditNoteAmt + $row->CrNoteAmount,
                        // Set initial value
                        'AVIRebatePer' => $row->AVIRebatePer,
                        'AVIRebateAmt' => $row->AVIRebateAmt,
                        'AgentCommPer' => $row->AgentCommPer,
                        'AgentCommAmt' => $row->AgentCommAmt,
                        'SlsCommPer' => $row->SlsCommPer,
                        'SlsCommAmt' => $row->SlsCommAmt,
                        'NetSaleAmt' => $MSaleAmt,
                        'Balance' => $MSaleAmt - (float) ($MRVAmount),
                        'Type' => "AVI"
                    ]);

                    // $PB1Value += 1;
                    // $this->text = $PB1Value . " out of " . count($rs2);
                }
            }
        }


        // $UserLIst = UserRights::select('UserName')->where('BranchCode',$BranchCode)->orderBy('UserName')->get();
        $Table = DB::table('tempavirebaitreport')->where('Type', 'AVI')->where('BranchCode', $MBranchCode)->where('WorkUser', $MWorkUser)->orderBy('GodownCode')->orderBy('CustomerCode')->orderBy('InvoiceDate')->orderBy('ChargeNo')->get();
        return response()->json([
            'Table' => $Table,
        ]);
    }



    public function DailyQuotationReport()
    {

        $BranchCode = Auth::user()->BranchCode;
        // $UserLIst = UserRights::select('UserName')->where('BranchCode',$BranchCode)->orderBy('UserName')->get();
        $Typesetup = Typesetup::select('Typecode', 'TypeName')->where('BranchCode', $BranchCode)->orderBy('Typecode')->get();
        $ShipingPortSetup = ShipingPortSetup::select('PortName')->where('PortCode', '<>', '0')->Distinct()->where('BranchCode', $BranchCode)->orderBy('PortName')->get();
        $GodownSetup = GodownSetup::select('GodownName', 'GodownCode')->Distinct()->where('GodownCode', '>', 0)->where('BranchCode', $BranchCode)->orderBy('GodownCode')->get();

        return view('Reports.DailyQuotationReport', [
            'Deptsetup' => $Typesetup,
            'BranchCode' => $BranchCode,
            'ShipingPortSetup' => $ShipingPortSetup,
            'GodownSetup' => $GodownSetup,
        ]);
    }
    public function UserPerformance()
    {

        $BranchCode = Auth::user()->BranchCode;
        $UserLIst = UserRights::select('UserName')->where('BranchCode', $BranchCode)->orderBy('UserName')->get();
        $Typesetup = Typesetup::select('Typecode', 'TypeName')->where('BranchCode', $BranchCode)->orderBy('Typecode')->get();
        $ShipingPortSetup = ShipingPortSetup::select('PortName')->where('PortCode', '<>', '0')->Distinct()->where('BranchCode', $BranchCode)->orderBy('PortName')->get();
        $GodownSetup = GodownSetup::select('GodownName', 'GodownCode')->Distinct()->where('GodownCode', '>', 0)->where('BranchCode', $BranchCode)->orderBy('GodownCode')->get();

        return view('Reports.UserPerformance', [
            'Deptsetup' => $Typesetup,
            'UserLIst' => $UserLIst,
            'BranchCode' => $BranchCode,
            'ShipingPortSetup' => $ShipingPortSetup,
            'GodownSetup' => $GodownSetup,
        ]);
    }

    public function UserPerformanceShow(Request $request)
    {
        $Qry = $request->input('Qry');
        $OptSellPrice = $request->input('OptSellPrice');
        $OptQuoteEntry = $request->input('OptQuoteEntry');
        $OptCreateQuote = $request->input('OptCreateQuote');

        $BranchCode = Auth::user()->BranchCode;
        if ($OptSellPrice == 'true') {
            info('OptSellPrice');
            $query = DB::table('qryquotemasterwithordermaster')->select(
                'EnteredLineQuote',
                'EstLineQuote',
                'WorkSellPricied',
                'QDate',
                'QuoteNo',
                'EventNo',
                'FlipOrderNo',
                'VSNNo',
                'DepartmentName',
                'GodownName',
                'CustomerName',
                'VesselName',
                DB::raw('ROUND(COALESCE(ValueAmount,0),2) AS QuoteAmount'),
                DB::raw('ROUND(COALESCE(ExtAmount,0),2) AS OrderAmount'),
                'GPPer'
            )->where('WorkSellPricied', '<>', '')->whereRaw($Qry)->get();
        } else if ($OptQuoteEntry == 'true') {
            info('OptQuoteEntry');
            $query = DB::table('qryquotemasterwithordermaster')->select(
                'EnteredLineQuote',
                'EstLineQuote',
                'WorkUserQuoteEntry',
                'QDate',
                'QuoteNo',
                'EventNo',
                'FlipOrderNo',
                'VSNNo',
                'DepartmentName',
                'GodownName',
                'CustomerName',
                'VesselName',
                DB::raw('ROUND(COALESCE(ValueAmount,0),2) AS QuoteAmount'),
                DB::raw('ROUND(COALESCE(ExtAmount,0),2) AS OrderAmount'),
                'GPPer'
            )->where('WorkUserQuoteEntry', '<>', '')->whereRaw($Qry)->get();
        } else if ($OptCreateQuote == 'true') {
            info('OptCreateQuote');
            $query = DB::table('qryquotemasterwithordermaster')->select(
                'EnteredLineQuote',
                'EstLineQuote',
                'WorkUser',
                'QDate',
                'QuoteNo',
                'EventNo',
                'FlipOrderNo',
                'VSNNo',
                'DepartmentName',
                'GodownName',
                'CustomerName',
                'VesselName',
                DB::raw('ROUND(COALESCE(ValueAmount,0),2) AS QuoteAmount'),
                DB::raw('ROUND(COALESCE(ExtAmount,0),2) AS OrderAmount'),
                'GPPer'
            )
                ->where('WorkUser', '<>', '')->whereRaw($Qry)->get();
        }

        return response()->json([
            'query' => $query,
        ]);
    }
    public function saveWithRS(Request $request)
    {
        $table = $request->input('dtable');
        info($table);
        TempUserPerformance::truncate();

        $data = json_encode($table);

        DB::statement('EXEC spInsertTempUserPerformance @jsonData = ?', [$data]);

        $Message = 'Saved';

        return response()->json([
            'Message' => $Message,
        ]);
    }

    public function AccountsBalancesheetReport()
    {

        $BranchCode = Auth::user()->BranchCode;
        // $UserLIst = UserRights::select('UserName')->where('BranchCode',$BranchCode)->orderBy('UserName')->get();
        $Typesetup = Typesetup::select('Typecode', 'TypeName')->where('BranchCode', $BranchCode)->orderBy('Typecode')->get();
        $ShipingPortSetup = ShipingPortSetup::select('PortName')->where('PortCode', '<>', '0')->Distinct()->where('BranchCode', $BranchCode)->orderBy('PortName')->get();
        $GodownSetup = GodownSetup::select('GodownName', 'GodownCode')->Distinct()->where('GodownCode', '>', 0)->where('BranchCode', $BranchCode)->orderBy('GodownCode')->get();

        return view('Reports.AccountsBalancesheetReport', [
            'Deptsetup' => $Typesetup,
            'BranchCode' => $BranchCode,
            'ShipingPortSetup' => $ShipingPortSetup,
            'GodownSetup' => $GodownSetup,
        ]);
    }

    public function BalancesheetComparisonReport()
    {

        $BranchCode = Auth::user()->BranchCode;
        $UserLIst = UserRights::select('UserName')->where('BranchCode', $BranchCode)->orderBy('UserName')->get();
        $Typesetup = Typesetup::select('Typecode', 'TypeName')->where('BranchCode', $BranchCode)->orderBy('Typecode')->get();
        $ShipingPortSetup = ShipingPortSetup::select('PortName')->where('PortCode', '<>', '0')->Distinct()->where('BranchCode', $BranchCode)->orderBy('PortName')->get();
        $GodownSetup = GodownSetup::select('GodownName', 'GodownCode')->Distinct()->where('GodownCode', '>', 0)->where('BranchCode', $BranchCode)->orderBy('GodownCode')->get();

        return view('Reports.BalancesheetComparisonReport', [
            'Deptsetup' => $Typesetup,
            'UserLIst' => $UserLIst,
            'BranchCode' => $BranchCode,
            'ShipingPortSetup' => $ShipingPortSetup,
            'GodownSetup' => $GodownSetup,
        ]);
    }

    public function OutstandingReportInvoiceWise()
    {

        $BranchCode = Auth::user()->BranchCode;
        $Terms = PurchaseOrderMaster::select('Terms')->Distinct('Terms')->where('BranchCode', $BranchCode)->get();
        $LogStatus = DB::table('orderstatussetup')->Select('LogStatus')->orderBy('Code')->get();
        $Country = Customer::select('Country')->distinct()->WHERE('Country', '<>', '')->orderby('Country')->get();
        return view('Reports.OutstandingReportInvoiceWise', [
            'Terms' => $Terms,
            'BranchCode' => $BranchCode,
            'Country' => $Country,
            'LogStatus' => $LogStatus,
        ]);
    }
    public function OutstandingReportshow(Request $request)
    {
        $DateTo = $request->input('TxtDateTo');
        $DateFrom = $request->input('TxtDateFrom');
        $BranchCode = Auth::user()->BranchCode;

        $SPOutstanding = DB::select('EXEC SPOutstandingSaleDetail @DateTo = ?, @DateFrom = ?, @BranchCode = ?', [$DateTo, $DateFrom, $BranchCode]);

        // Apply filters
        $filteredResults = [];
        $Qry = $request->input('Qry');
        $Qry2 = $request->input('Qry2');

        if ($Qry2) {
            info('data');
            $QryBillMaster = DB::table('qrybillmasterincome')->where('BranchCode', $BranchCode)->whereRaw($Qry2)->orderBy('Date')->orderBy('BillNo')->get();
        } else {
            info('empty');
            $QryBillMaster = [];
        }

        $QryBillMasterdata = [];
        foreach ($QryBillMaster as $BillMaster) {
            $MBillNo1 = $BillMaster->BillNo;
            $MRVAmount = DB::table('billreceiptvoucher')->where('BranchCode', $BranchCode)->where('BillNo', $MBillNo1)->sum('Amount');
            $QryBillMasterdata[] = [
                'BillMaster' => $BillMaster,
                'MRVAmount' => $MRVAmount,
            ];
        }


        foreach ($SPOutstanding as $result) {
            if ($Qry === "" || $this->checkFilterConditions($Qry, $result)) {
                $filteredResults[] = $result;
            }
        }





        return response()->json([
            'SPOutstanding' => $filteredResults,
            'QryBillMaster' => $QryBillMasterdata,
        ]);
    }

    private function checkFilterConditions($Qry, $result)
    {
        $conditions = explode(' and ', $Qry);

        foreach ($conditions as $condition) {
            $parts = explode('=', $condition);

            if (count($parts) === 2) {
                $property = trim($parts[0]);
                $value = trim($parts[1]);

                if (property_exists($result, $property)) {
                    $propertyValue = $result->$property;

                    // Handle comparison without quotes
                    if (!is_numeric($value) && !is_bool($value) && !is_null($value)) {
                        $propertyValue = "'" . $propertyValue . "'";
                    }

                    $evaluatedCondition = $propertyValue == $value;

                    if (!$evaluatedCondition) {
                        return false;
                    }
                } else {
                    return false;
                }
            }
        }

        return true;
    }

    public function OutstandingReportpr(Request $request)
    {
        $Table = $request->input('Table');
        $BranchCode = Auth::user()->BranchCode;
        $MWorkUser = Auth::user()->UserName;

        DB::table('tempoutstandingreportinvwise')->where('WorkUser', $MWorkUser)->where('BranchCode', $BranchCode)->Delete();

        // Split the $Table array into smaller chunks
        $chunks = array_chunk($Table, 200); // Adjust the chunk size as needed

        foreach ($chunks as $chunk) {
            $values = [];

            foreach ($chunk as $row) {
                $values[] = sprintf(
                    "('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')",
                    $row['InvoiceNo'],
                    $row['InvDate'],
                    $row['VSNNo'],
                    $row['Terms'],
                    $row['DueDate'],
                    $row['Customercode'],
                    $row['Country'],
                    $row['CustomerName'],
                    $row['VesselName'],
                    $row['Department'],
                    $row['CustRefNo'],
                    $row['Status'],
                    $row['Chq'],
                    $row['RV'],
                    (int) $row['InvoiceAmount'],
                    (int) $row['ReceivedAmount'],
                    (int) $row['CrNoteAmt'],
                    (int) $row['BalanceAmount'],
                    $BranchCode,
                    $MWorkUser
                );
            }

            $query = sprintf(
                "INSERT INTO TempOutstandingReportInvWise (PoNo, InvDate, VSNNo, Terms, DueDate, CustomerCode, Country, CustomerName, VesselName, Department, CustomerRefNo, Status, ChqNo, RVNo, NetAmount, ReceivedAmt, CrNotAmt, BalAmt, BranchCode, WorkUser) VALUES %s",
                implode(',', $values)
            );

            DB::statement($query);
        }

        $Message = 'saved';

        return response()->json([
            'Message' => $Message,
        ]);
    }
    public function IncomeStatementReport()
    {

        $BranchCode = Auth::user()->BranchCode;
        $UserLIst = UserRights::select('UserName')->where('BranchCode', $BranchCode)->orderBy('UserName')->get();
        $branchlist = BranchSetup::get();
        $Typesetup = Typesetup::select('Typecode', 'TypeName')->where('BranchCode', $BranchCode)->orderBy('Typecode')->get();
        $ShipingPortSetup = ShipingPortSetup::select('PortName')->where('PortCode', '<>', '0')->Distinct()->where('BranchCode', $BranchCode)->orderBy('PortName')->get();
        $GodownSetup = GodownSetup::select('GodownName', 'GodownCode')->Distinct()->where('GodownCode', '>', 0)->where('BranchCode', $BranchCode)->orderBy('GodownCode')->get();

        return view('Reports.IncomeStatementReport', [
            'Deptsetup' => $Typesetup,
            'UserLIst' => $UserLIst,
            'branchlist' => $branchlist,
            'BranchCode' => $BranchCode,
            'ShipingPortSetup' => $ShipingPortSetup,
            'GodownSetup' => $GodownSetup,
        ]);
    }
    public function profit_loss_comparisionReport()
    {

        $BranchCode = Auth::user()->BranchCode;
        // $UserLIst = UserRights::select('UserName')->where('BranchCode',$BranchCode)->orderBy('UserName')->get();
        $Typesetup = Typesetup::select('Typecode', 'TypeName')->where('BranchCode', $BranchCode)->orderBy('Typecode')->get();
        $ShipingPortSetup = ShipingPortSetup::select('PortName')->where('PortCode', '<>', '0')->Distinct()->where('BranchCode', $BranchCode)->orderBy('PortName')->get();
        $GodownSetup = GodownSetup::select('GodownName', 'GodownCode')->Distinct()->where('GodownCode', '>', 0)->where('BranchCode', $BranchCode)->orderBy('GodownCode')->get();
        $Terms = PurchaseOrderMaster::select('Terms')->Distinct('Terms')->where('BranchCode', $BranchCode)->get();
        $Departments = OrderMasterModel::Select('Department')->distinct('Department')->where('BranchCode', $BranchCode)->orderBy('Department')->get();
        $Customers = OrderMasterModel::Select('CustomerName')->distinct('CustomerName')->where('BranchCode', $BranchCode)->orderBy('CustomerName')->get();
        $VendorS = OrderModel::Select('VendorName')->distinct('VendorName')->where('BranchCode', $BranchCode)->orderBy('VendorName')->get();
        $Vessels = OrderMasterModel::Select('VesselName')->distinct('VesselName')->where('BranchCode', $BranchCode)->orderBy('VesselName')->get();
        return view('Reports.profit_loss_comparisionReport', [
            'Deptsetup' => $Typesetup,
            'Terms' => $Terms,
            'Departments' => $Departments,
            'Customers' => $Customers,
            'VendorS' => $VendorS,
            'Vessels' => $Vessels,
            'BranchCode' => $BranchCode,
            'ShipingPortSetup' => $ShipingPortSetup,
            'GodownSetup' => $GodownSetup,
        ]);
    }
    public function profit_loss_2months_comparisionReport()
    {

        $BranchCode = Auth::user()->BranchCode;
        // $UserLIst = UserRights::select('UserName')->where('BranchCode',$BranchCode)->orderBy('UserName')->get();
        $Typesetup = Typesetup::select('Typecode', 'TypeName')->where('BranchCode', $BranchCode)->orderBy('Typecode')->get();
        $ShipingPortSetup = ShipingPortSetup::select('PortName')->where('PortCode', '<>', '0')->Distinct()->where('BranchCode', $BranchCode)->orderBy('PortName')->get();
        $GodownSetup = GodownSetup::select('GodownName', 'GodownCode')->Distinct()->where('GodownCode', '>', 0)->where('BranchCode', $BranchCode)->orderBy('GodownCode')->get();
        $Terms = PurchaseOrderMaster::select('Terms')->Distinct('Terms')->where('BranchCode', $BranchCode)->get();
        $Departments = OrderMasterModel::Select('Department')->distinct('Department')->where('BranchCode', $BranchCode)->orderBy('Department')->get();
        $Customers = OrderMasterModel::Select('CustomerName')->distinct('CustomerName')->where('BranchCode', $BranchCode)->orderBy('CustomerName')->get();
        $VendorS = OrderModel::Select('VendorName')->distinct('VendorName')->where('BranchCode', $BranchCode)->orderBy('VendorName')->get();
        $Vessels = OrderMasterModel::Select('VesselName')->distinct('VesselName')->where('BranchCode', $BranchCode)->orderBy('VesselName')->get();
        return view('Reports.profit_loss_2months_comparisionReport', [
            'Deptsetup' => $Typesetup,
            'Terms' => $Terms,
            'Departments' => $Departments,
            'Customers' => $Customers,
            'VendorS' => $VendorS,
            'Vessels' => $Vessels,
            'BranchCode' => $BranchCode,
            'ShipingPortSetup' => $ShipingPortSetup,
            'GodownSetup' => $GodownSetup,
        ]);
    }
    public function AgingReport()
    {

        $BranchCode = Auth::user()->BranchCode;
        $UserLIst = UserRights::select('UserName')->where('BranchCode', $BranchCode)->orderBy('UserName')->get();
        $branchlist = BranchSetup::get();
        $Typesetup = Typesetup::select('Typecode', 'TypeName')->where('BranchCode', $BranchCode)->orderBy('Typecode')->get();
        $ShipingPortSetup = ShipingPortSetup::select('PortName')->where('PortCode', '<>', '0')->Distinct()->where('BranchCode', $BranchCode)->orderBy('PortName')->get();
        $GodownSetup = GodownSetup::select('GodownName', 'GodownCode')->Distinct()->where('GodownCode', '>', 0)->where('BranchCode', $BranchCode)->orderBy('GodownCode')->get();

        return view('Reports.AgingReport', [
            'Deptsetup' => $Typesetup,
            'UserLIst' => $UserLIst,
            'branchlist' => $branchlist,
            'BranchCode' => $BranchCode,
            'ShipingPortSetup' => $ShipingPortSetup,
            'GodownSetup' => $GodownSetup,
        ]);
    }
    public function OutstandingInvoiceAlert()
    {


        return view('Reports.OutstandingInvoiceAlert', []);
    }
    public function VendorOutstandingInvoiceWiseReport()
    {

        $BranchCode = Auth::user()->BranchCode;
        // $UserLIst = UserRights::select('UserName')->where('BranchCode',$BranchCode)->orderBy('UserName')->get();
        $Typesetup = Typesetup::select('Typecode', 'TypeName')->where('BranchCode', $BranchCode)->orderBy('Typecode')->get();
        $ShipingPortSetup = ShipingPortSetup::select('PortName')->where('PortCode', '<>', '0')->Distinct()->where('BranchCode', $BranchCode)->orderBy('PortName')->get();
        $GodownSetup = GodownSetup::select('GodownName', 'GodownCode')->Distinct()->where('GodownCode', '>', 0)->where('BranchCode', $BranchCode)->orderBy('GodownCode')->get();
        // $Terms = PurchaseOrderMaster::select('Terms')->Distinct('Terms')->where('BranchCode', $BranchCode)->get();
        // $Departments = OrderMasterModel::Select('Department')->distinct('Department')->where('BranchCode', $BranchCode)->orderBy('Department')->get();
        // $Customers = OrderMasterModel::Select('CustomerName')->distinct('CustomerName')->where('BranchCode', $BranchCode)->orderBy('CustomerName')->get();
        // $VendorS = OrderModel::Select('VendorName')->distinct('VendorName')->where('BranchCode', $BranchCode)->orderBy('VendorName')->get();
        // $Vessels = OrderMasterModel::Select('VesselName')->distinct('VesselName')->where('BranchCode', $BranchCode)->orderBy('VesselName')->get();
        $VenderSetup = VenderSetup::where('BranchCode', $BranchCode)->orderBy('
        ')->get();

        return view('Reports.VendorOutstandingInvoiceWiseReport', [
            'Deptsetup' => $Typesetup,
            // 'Terms' => $Terms,
            // 'Departments' => $Departments,
            // 'Customers' => $Customers,
            // 'VendorS' => $VendorS,
            // 'Vessels' => $Vessels,
            'BranchCode' => $BranchCode,
            'ShipingPortSetup' => $ShipingPortSetup,
            'GodownSetup' => $GodownSetup,
            'VenderSetup' => $VenderSetup,
        ]);
    }
    public function BankReconcilationReport()
    {

        $BranchCode = Auth::user()->BranchCode;
        $branchlist = BranchSetup::get();

        // $UserLIst = UserRights::select('UserName')->where('BranchCode',$BranchCode)->orderBy('UserName')->get();
        $Typesetup = Typesetup::select('Typecode', 'TypeName')->where('BranchCode', $BranchCode)->orderBy('Typecode')->get();
        $ShipingPortSetup = ShipingPortSetup::select('PortName')->where('PortCode', '<>', '0')->Distinct()->where('BranchCode', $BranchCode)->orderBy('PortName')->get();
        $GodownSetup = GodownSetup::select('GodownName', 'GodownCode')->Distinct()->where('GodownCode', '>', 0)->where('BranchCode', $BranchCode)->orderBy('GodownCode')->get();
        // $Terms = PurchaseOrderMaster::select('Terms')->Distinct('Terms')->where('BranchCode', $BranchCode)->get();
        // $Departments = OrderMasterModel::Select('Department')->distinct('Department')->where('BranchCode', $BranchCode)->orderBy('Department')->get();
        // $Customers = OrderMasterModel::Select('CustomerName')->distinct('CustomerName')->where('BranchCode', $BranchCode)->orderBy('CustomerName')->get();
        // $VendorS = OrderModel::Select('VendorName')->distinct('VendorName')->where('BranchCode', $BranchCode)->orderBy('VendorName')->get();
        // $Vessels = OrderMasterModel::Select('VesselName')->distinct('VesselName')->where('BranchCode', $BranchCode)->orderBy('VesselName')->get();
        $VenderSetup = VenderSetup::where('BranchCode', $BranchCode)->orderBy('VenderName')->get();
        return view('Reports.BankReconcilationReport', [
            'Deptsetup' => $Typesetup,
            // 'Terms' => $Terms,
            'branchlist' => $branchlist,

            // 'Departments' => $Departments,
            // 'Customers' => $Customers,
            // 'VendorS' => $VendorS,
            // 'Vessels' => $Vessels,
            'BranchCode' => $BranchCode,
            'ShipingPortSetup' => $ShipingPortSetup,
            'GodownSetup' => $GodownSetup,
            'VenderSetup' => $VenderSetup,
        ]);
    }
    public function CustomerReports()
    {

        $BranchCode = Auth::user()->BranchCode;
        // $branchlist = BranchSetup::get();
        // $UserLIst = UserRights::select('UserName')->where('BranchCode',$BranchCode)->orderBy('UserName')->get();
        // $Typesetup = Typesetup::select('Typecode', 'TypeName')->where('BranchCode', $BranchCode)->orderBy('Typecode')->get();
        // $ShipingPortSetup = ShipingPortSetup::select('PortName')->where('PortCode', '<>', '0')->Distinct()->where('BranchCode', $BranchCode)->orderBy('PortName')->get();
        // $GodownSetup = GodownSetup::select('GodownName', 'GodownCode')->Distinct()->where('GodownCode', '>', 0)->where('BranchCode', $BranchCode)->orderBy('GodownCode')->get();
        // $VenderSetup = VenderSetup::where('BranchCode', $BranchCode)->orderBy('VenderName')->get();
        $Country = Customer::select('Country')->distinct()->WHERE('Country', '<>', '')->orderby('Country')->get();
        $StateName = Customer::select('StateName')->distinct()->WHERE('StateName', '<>', '')->orderby('StateName')->get();
        $City = Customer::select('City')->distinct()->WHERE('City', '<>', '')->orderby('City')->get();
        $AOB = Customer::select('AreaofBusiness')->distinct()->WHERE('AreaofBusiness', '<>', '')->orderby('AreaofBusiness')->get();

        return view('Reports.CustomerReport', [
            // 'Deptsetup' => $Typesetup,
            // 'branchlist' => $branchlist,
            'BranchCode' => $BranchCode,
            // 'ShipingPortSetup' => $ShipingPortSetup,
            // 'GodownSetup' => $GodownSetup,
            // 'VenderSetup' => $VenderSetup,
            'Country' => $Country,
            'StateName' => $StateName,
            'City' => $City,
            'AOB' => $AOB,
        ]);
    }
    public function ReceiptVoucherShow(Request $request)
    {
        $MBranchCode = Auth::user()->BranchCode;
        $Qry = $request->input('Qry');
        $ReceiptVouchers = ReceiptVoucher::Select('VoucherDate', 'VoucherNo', 'CashName', 'AcName3', 'TransType', 'ChequeNo', 'ChequeDate', 'ClientOrderNo', 'Des', 'Amount')->where('BranchCode', $MBranchCode)->whereRaw($Qry)->orderBy('VoucherDate')->orderBy('VoucherNo')->get();
        $MNetAmount = ReceiptVoucher::where('BranchCode', $MBranchCode)->whereRaw($Qry)->sum('Amount');

        return response()->json([

            'ReceiptVouchers' => $ReceiptVouchers,

            'MNetAmount' => $MNetAmount,
        ]);
    }


    public function ReceiptVoucherReport()
    {
        $MBranchCode = Auth::user()->BranchCode;
        $PVendorcode = 756;
        $BranchCode = Auth::user()->BranchCode;
        $FixAccountSetup = FixAccountSetup::where('BranchCode', $BranchCode)->first();
        $GodownSetup = GodownSetup::select('GodownName', 'GodownCode')->where('ChkNotShow', 0)->where('BranchCode', $MBranchCode)->orderBy('Godowncode')->get();
        $TermsSetup = termssetup::select('Terms', 'TermsCode')->distinct()->where('BranchCode', $MBranchCode)->orderBy('Terms')->get();
        // $Trans = Trans::select('Vnoc')->where('ChkNotShow',0)->where('BranchCode',$MBranchCode)->orderBy('Godowncode')->get();
        $VesselSetup = ReceiptVoucher::select('VesselName')->distinct()->orderBy('VesselName')->get();


        return view('Accounts.Reports.ReceiptVoucherReport', [
            'BranchCode' => $MBranchCode,
            'FixAccountSetup' => $FixAccountSetup,
            'GodownSetup' => $GodownSetup,
            'TermsSetup' => $TermsSetup,
            'VesselSetup' => $VesselSetup,
        ]);
    }


    public function VendorPaymentVoucherReport()
    {
        $MBranchCode = Auth::user()->BranchCode;
        $PVendorcode = 756;
        $BranchCode = Auth::user()->BranchCode;
        $FixAccountSetup = FixAccountSetup::where('BranchCode', $BranchCode)->first();
        $GodownSetup = GodownSetup::select('GodownName', 'GodownCode')->where('ChkNotShow', 0)->where('BranchCode', $MBranchCode)->orderBy('Godowncode')->get();
        $TermsSetup = termssetup::select('Terms', 'TermsCode')->distinct()->where('BranchCode', $MBranchCode)->orderBy('Terms')->get();
        // $Trans = Trans::select('Vnoc')->where('ChkNotShow',0)->where('BranchCode',$MBranchCode)->orderBy('Godowncode')->get();


        return view('Accounts.Reports.VendorPaymentVoucherReport', [
            'BranchCode' => $MBranchCode,
            'FixAccountSetup' => $FixAccountSetup,
            'GodownSetup' => $GodownSetup,
            'TermsSetup' => $TermsSetup,
        ]);
    }

    public function DebitNoteReport()
    {
        $MBranchCode = Auth::user()->BranchCode;
        $PVendorcode = 756;
        $BranchCode = Auth::user()->BranchCode;
        $FixAccountSetup = FixAccountSetup::where('BranchCode', $BranchCode)->first();
        $GodownSetup = GodownSetup::select('GodownName', 'GodownCode')->where('ChkNotShow', 0)->where('BranchCode', $MBranchCode)->orderBy('Godowncode')->get();
        $TermsSetup = termssetup::select('Terms', 'TermsCode')->distinct()->where('BranchCode', $MBranchCode)->orderBy('Terms')->get();
        // $Trans = Trans::select('Vnoc')->where('ChkNotShow',0)->where('BranchCode',$MBranchCode)->orderBy('Godowncode')->get();


        return view('Accounts.Reports.DebitNoteReport', [
            'BranchCode' => $MBranchCode,
            'FixAccountSetup' => $FixAccountSetup,
            'GodownSetup' => $GodownSetup,
            'TermsSetup' => $TermsSetup,
        ]);
    }


    public function CreditNoteReport()
    {
        $MBranchCode = Auth::user()->BranchCode;
        $PVendorcode = 756;
        $BranchCode = Auth::user()->BranchCode;
        $FixAccountSetup = FixAccountSetup::where('BranchCode', $BranchCode)->first();
        $GodownSetup = GodownSetup::select('GodownName', 'GodownCode')->where('ChkNotShow', 0)->where('BranchCode', $MBranchCode)->orderBy('Godowncode')->get();
        $TermsSetup = termssetup::select('Terms', 'TermsCode')->distinct()->where('BranchCode', $MBranchCode)->orderBy('Terms')->get();
        // $Trans = Trans::select('Vnoc')->where('ChkNotShow',0)->where('BranchCode',$MBranchCode)->orderBy('Godowncode')->get();


        return view('Accounts.Reports.CreditNoteReport', [
            'BranchCode' => $MBranchCode,
            'FixAccountSetup' => $FixAccountSetup,
            'GodownSetup' => $GodownSetup,
            'TermsSetup' => $TermsSetup,
        ]);
    }



    public function ExpenseReport()
    {
        $MBranchCode = Auth::user()->BranchCode;
        $PVendorcode = 756;
        $BranchCode = Auth::user()->BranchCode;
        $FixAccountSetup = FixAccountSetup::where('BranchCode', $BranchCode)->first();
        $GodownSetup = GodownSetup::select('GodownName', 'GodownCode')->where('ChkNotShow', 0)->where('BranchCode', $MBranchCode)->orderBy('Godowncode')->get();
        $TermsSetup = termssetup::select('Terms', 'TermsCode')->distinct()->where('BranchCode', $MBranchCode)->orderBy('Terms')->get();
        // $Trans = Trans::select('Vnoc')->where('ChkNotShow',0)->where('BranchCode',$MBranchCode)->orderBy('Godowncode')->get();


        return view('Accounts.Reports.ExpenseReport', [
            'BranchCode' => $MBranchCode,
            'FixAccountSetup' => $FixAccountSetup,
            'GodownSetup' => $GodownSetup,
            'TermsSetup' => $TermsSetup,
        ]);
    }


    public function OutstandingInvoiceAlertReport()
    {
        $MBranchCode = Auth::user()->BranchCode;
        $PVendorcode = 756;
        $BranchCode = Auth::user()->BranchCode;
        $FixAccountSetup = FixAccountSetup::where('BranchCode', $BranchCode)->first();
        $GodownSetup = GodownSetup::select('GodownName', 'GodownCode')->where('ChkNotShow', 0)->where('BranchCode', $MBranchCode)->orderBy('Godowncode')->get();
        $TermsSetup = termssetup::select('Terms', 'TermsCode')->distinct()->where('BranchCode', $MBranchCode)->orderBy('Terms')->get();
        // $Trans = Trans::select('Vnoc')->where('ChkNotShow',0)->where('BranchCode',$MBranchCode)->orderBy('Godowncode')->get();


        return view('Accounts.Reports.OutstandingInvoiceAlertReport', [
            'BranchCode' => $MBranchCode,
            'FixAccountSetup' => $FixAccountSetup,
            'GodownSetup' => $GodownSetup,
            'TermsSetup' => $TermsSetup,
        ]);
    }

    public function VendorBillOutstandingReport()
    {
        $MBranchCode = Auth::user()->BranchCode;
        $PVendorcode = 756;
        $BranchCode = Auth::user()->BranchCode;
        $FixAccountSetup = FixAccountSetup::where('BranchCode', $BranchCode)->first();
        $GodownSetup = GodownSetup::select('GodownName', 'GodownCode')->where('ChkNotShow', 0)->where('BranchCode', $MBranchCode)->orderBy('Godowncode')->get();
        $TermsSetup = termssetup::select('Terms', 'TermsCode')->distinct()->where('BranchCode', $MBranchCode)->orderBy('Terms')->get();
        // $Trans = Trans::select('Vnoc')->where('ChkNotShow',0)->where('BranchCode',$MBranchCode)->orderBy('Godowncode')->get();


        return view('Accounts.Reports.VendorBillOutstandingReport', [
            'BranchCode' => $MBranchCode,
            'FixAccountSetup' => $FixAccountSetup,
            'GodownSetup' => $GodownSetup,
            'TermsSetup' => $TermsSetup,
        ]);
    }

    public function VendorOutstandingReport()
    {
        $MBranchCode = Auth::user()->BranchCode;
        $PVendorcode = 756;
        $BranchCode = Auth::user()->BranchCode;
        $FixAccountSetup = FixAccountSetup::where('BranchCode', $BranchCode)->first();
        $GodownSetup = GodownSetup::select('GodownName', 'GodownCode')->where('ChkNotShow', 0)->where('BranchCode', $MBranchCode)->orderBy('Godowncode')->get();
        $TermsSetup = termssetup::select('Terms', 'TermsCode')->distinct()->where('BranchCode', $MBranchCode)->orderBy('Terms')->get();
        // $Trans = Trans::select('Vnoc')->where('ChkNotShow',0)->where('BranchCode',$MBranchCode)->orderBy('Godowncode')->get();


        return view('Accounts.Reports.VendorOutstandingReport', [
            'BranchCode' => $MBranchCode,
            'FixAccountSetup' => $FixAccountSetup,
            'GodownSetup' => $GodownSetup,
            'TermsSetup' => $TermsSetup,
        ]);
    }

    public function AccVendorOutstandingInvoiceWiseReport()
    {
        $MBranchCode = Auth::user()->BranchCode;
        $PVendorcode = 756;
        $BranchCode = Auth::user()->BranchCode;
        $FixAccountSetup = FixAccountSetup::where('BranchCode', $BranchCode)->first();
        $GodownSetup = GodownSetup::select('GodownName', 'GodownCode')->where('ChkNotShow', 0)->where('BranchCode', $MBranchCode)->orderBy('Godowncode')->get();
        $TermsSetup = termssetup::select('Terms', 'TermsCode')->distinct()->where('BranchCode', $MBranchCode)->orderBy('Terms')->get();
        // $Trans = Trans::select('Vnoc')->where('ChkNotShow',0)->where('BranchCode',$MBranchCode)->orderBy('Godowncode')->get();


        return view('Accounts.Reports.AccVendorOutstandingInvoiceWiseReport', [
            'BranchCode' => $MBranchCode,
            'FixAccountSetup' => $FixAccountSetup,
            'GodownSetup' => $GodownSetup,
            'TermsSetup' => $TermsSetup,
        ]);
    }

    public function AgingPayableReport()
    {
        $MBranchCode = Auth::user()->BranchCode;
        $PVendorcode = 756;
        $BranchCode = Auth::user()->BranchCode;
        $FixAccountSetup = FixAccountSetup::where('BranchCode', $BranchCode)->first();
        $GodownSetup = GodownSetup::select('GodownName', 'GodownCode')->where('ChkNotShow', 0)->where('BranchCode', $MBranchCode)->orderBy('Godowncode')->get();
        $TermsSetup = termssetup::select('Terms', 'TermsCode')->distinct()->where('BranchCode', $MBranchCode)->orderBy('Terms')->get();
        // $Trans = Trans::select('Vnoc')->where('ChkNotShow',0)->where('BranchCode',$MBranchCode)->orderBy('Godowncode')->get();


        return view('Accounts.Reports.AgingPayableReport', [
            'BranchCode' => $MBranchCode,
            'FixAccountSetup' => $FixAccountSetup,
            'GodownSetup' => $GodownSetup,
            'TermsSetup' => $TermsSetup,
        ]);
    }


    public function AgingPayableReportGen(Request $request)
    {
        $MBranchCode = Auth::user()->BranchCode;
        $WorkUser = config('app.MUserName');
        $PVendorcode = 756;
        $Actcode = $request->input('ActCode');
        $ActName = $request->input('ActName');
        $TxtDateTo = $request->input('TxtDateTo');
        $ChkAll = $request->input('ChkAll');
        info($Actcode);
        info($ActName);
        temp2::where("BranchCode", $MBranchCode)->where('WorkUser', $WorkUser)->delete();
        info($ChkAll);

        if ($ChkAll == 'true') {
            info('true');

            $Rs2 = Acfile::where('ChkSupplier', 1)
                ->where('BranchCode', (int) $MBranchCode)
                ->orderBy('AcName3')
                ->get();

        } else {
            info('false');
            $Rs2 = Acfile::where('ChkSupplier', 1)
                ->where('ActCode', $Actcode)
                ->where('BranchCode', (int) $MBranchCode)
                ->orderBy('AcName3')
                ->get();
        }
        info($Rs2);

        if (count($Rs2) > 0) {
            info('count');

            foreach ($Rs2 as $row) {
                info('loop');

                $Rs1 = new temp2;
                $Rs1->WorkUser = $WorkUser;
                $Rs1->ActCode = $Actcode;
                $Rs1->ActName = $ActName;

                $MTransAmt = Trans::where('Actcode', $Actcode)
                    ->where('BranchCode', $MBranchCode)
                    ->whereDate('Date', '<=', $TxtDateTo)
                    ->sum('TransAmt');
                info('transamt' . $MTransAmt);

                if (!$MTransAmt) {
                    $MTransAmt = 0;
                }

                $amtxtr = intval($MTransAmt);

                $MOpBAl = $row->OpeningBalance ? $row->OpeningBalance : 0;

                $amtx = intval($MTransAmt) + intval($MOpBAl);
                info('amxtx' . $amtx);

                if (intval($amtx) < 0) {
                    $Rs1->credit = intval($amtx) * -1;
                    $Rs1->debit = 0;
                } else {
                    $Rs1->debit = intval($amtx);
                    $Rs1->credit = 0;
                }

                // $Rs1->save();

                // $Rs1 = new temp2;

                $tot1 = 0;
                $tot2 = 0;
                $tot3 = 0;
                $tot4 = 0;
                $tot5 = 0;
                $tot6 = 0;
                $gtot = 0;
                $gtot2 = 0;

                if (intval($amtx) !== 0) {
                    $Rs5 = Trans::whereDate('Date', '<=', $TxtDateTo)
                        ->where('Actcode', $Actcode)
                        ->where('BranchCode', $MBranchCode)
                        ->orderBy('Date')
                        ->get();
                    info($Rs5);

                    $tot1 = 0;
                    $tot2 = 0;
                    $tot3 = 0;
                    $tot4 = 0;
                    $tot5 = 0;
                    $tot6 = 0;

                    if (count($Rs5) > 0) {
                        info('couiint2');

                        $gtot = 0;

                        foreach ($Rs5 as $record) {
                            $MDate = $record->Date;
                            info('loop2');

                            // Calculate the number of days between MDate and today's date
                            $dt = Carbon::parse($MDate)->diffInDays(Carbon::today());

                            // Update totals based on date range
                            if ($dt >= 0 && $dt <= 15) {
                                $tot1 += abs($record->TransAmt);
                            }

                            if ($dt >= 16 && $dt <= 30) {
                                $tot2 += abs($record->TransAmt);
                            }

                            if ($dt >= 31 && $dt <= 45) {
                                $tot3 += abs($record->TransAmt);
                            }

                            if ($dt >= 46 && $dt <= 60) {
                                $tot4 += abs($record->TransAmt);
                            }

                            if ($dt >= 61 && $dt <= 90) {
                                $tot5 += abs($record->TransAmt);
                            }

                            if ($dt >= 91) {
                                $tot6 += abs($record->TransAmt);
                            }

                            $gtot += abs($record->TransAmt);

                            // Check if gtot is greater than or equal to amtx
                            if ($gtot >= $amtx) {
                                break; // Exit the loop
                            }
                        }
                        $diff = $gtot - abs((int) $amtx);

                        if ($tot6 != 0) {
                            $tot6 = $tot6 - $diff;
                            $diff = 0;
                        }

                        if ($tot5 != 0) {
                            $tot5 = $tot5 - $diff;
                            $diff = 0;
                        }

                        if ($tot4 != 0) {
                            $tot4 = $tot4 - $diff;
                            $diff = 0;
                        }

                        if ($tot3 != 0) {
                            $tot3 = $tot3 - $diff;
                            $diff = 0;
                        }

                        if ($tot2 != 0) {
                            $tot2 = $tot2 - $diff;
                            $diff = 0;
                        }

                        if ($tot1 != 0) {
                            $tot1 = $tot1 - $diff;
                            $diff = 0;
                        }

                        $gtot2 = $tot1 + $tot2 + $tot3 + $tot4 + $tot5 + $tot6;

                    }
                }

                $Rs1->DateTo = $TxtDateTo;
                $Rs1->head = "Aging Report Payable (Supplier)";
                $Rs1->Drop1 = $tot1;
                $Rs1->Crop = $tot2;
                $Rs1->DrTr = $tot3;
                $Rs1->CrTr = $tot4;
                $Rs1->N60To90 = intval($tot5);
                $Rs1->Above90 = intval($tot6);


                $Rs1->DrCl = $gtot2;

                $Rs1->BranchCode = intval($MBranchCode);

                $Rs1->WorkUser = $WorkUser;
                info('rs1' . $Rs1);

                $Rs1->save();

            }
        }

        return response()->json([
            'Message' => 'Saved',
        ]);

    }

    public function AccAgingReport()
    {
        // $MBranchCode = Auth::user()->BranchCode;
        // $PVendorcode = 756;
        // $BranchCode = Auth::user()->BranchCode;
        // $FixAccountSetup = FixAccountSetup::where('BranchCode', $BranchCode)->first();
        // $GodownSetup = GodownSetup::select('GodownName', 'GodownCode')->where('ChkNotShow', 0)->where('BranchCode', $MBranchCode)->orderBy('Godowncode')->get();
        // $TermsSetup = termssetup::select('Terms', 'TermsCode')->distinct()->where('BranchCode', $MBranchCode)->orderBy('Terms')->get();
        // $Trans = Trans::select('Vnoc')->where('ChkNotShow',0)->where('BranchCode',$MBranchCode)->orderBy('Godowncode')->get();


        return view('Accounts.Reports.AccAgingReport', [
            // 'BranchCode' => $MBranchCode,
            // 'FixAccountSetup' => $FixAccountSetup,
            // 'GodownSetup' => $GodownSetup,
            // 'TermsSetup' => $TermsSetup,
        ]);
    }
    public function AccAgingGen(Request $request)
    {
        $MBranchCode = Auth::user()->BranchCode;
        $TxtDateTo = $request->input('TxtDateTo');
        $TxtActCode = $request->input('TxtActCode');
        $TxtActName = $request->input('TxtActName');
        $ID = $request->input('ID');
        $ChkAll = $request->input('ChkAll');
        $ChkCompanyHeading = $request->input('ChkCompanyHeading');
        $AccAging = ACCAgingModel::find($ID);
        if (!$AccAging) {
            $AccAging = new ACCAgingModel;
        }
        $AccAging->SerialNo = $TxtDateTo;
        $AccAging->Currency = $TxtActCode;
        $AccAging->ExchangeRate = $TxtActName;
        $AccAging->ExchangeRate = $ChkAll;
        $AccAging->ExchangeRate = $ChkCompanyHeading
        ;
        $AccAging->BranchCode = $MBranchCode;
        $AccAging->save();
        $Message = '';


        return response()->json([

        ]);
    }

    public function AccCustomerAgingInvoiceWiseReport()
    {
        // $MBranchCode = Auth::user()->BranchCode;
        // $PVendorcode = 756;
        // $BranchCode = Auth::user()->BranchCode;
        // $FixAccountSetup = FixAccountSetup::where('BranchCode', $BranchCode)->first();
        // $GodownSetup = GodownSetup::select('GodownName', 'GodownCode')->where('ChkNotShow', 0)->where('BranchCode', $MBranchCode)->orderBy('Godowncode')->get();
        // $TermsSetup = termssetup::select('Terms', 'TermsCode')->distinct()->where('BranchCode', $MBranchCode)->orderBy('Terms')->get();
        // $Trans = Trans::select('Vnoc')->where('ChkNotShow',0)->where('BranchCode',$MBranchCode)->orderBy('Godowncode')->get();


        return view('Accounts.Reports.AccCustomerAgingInvoiceWiseReport', [
            // 'BranchCode' => $MBranchCode,
            // 'FixAccountSetup' => $FixAccountSetup,
            // 'GodownSetup' => $GodownSetup,
            // 'TermsSetup' => $TermsSetup,
        ]);
    }

    public function AccBankReconcilationReport()
    {
        // $MBranchCode = Auth::user()->BranchCode;
        // $PVendorcode = 756;
        // $BranchCode = Auth::user()->BranchCode;
        // $FixAccountSetup = FixAccountSetup::where('BranchCode', $BranchCode)->first();
        // $GodownSetup = GodownSetup::select('GodownName', 'GodownCode')->where('ChkNotShow', 0)->where('BranchCode', $MBranchCode)->orderBy('Godowncode')->get();
        // $TermsSetup = termssetup::select('Terms', 'TermsCode')->distinct()->where('BranchCode', $MBranchCode)->orderBy('Terms')->get();
        // $Trans = Trans::select('Vnoc')->where('ChkNotShow',0)->where('BranchCode',$MBranchCode)->orderBy('Godowncode')->get();


        return view('Accounts.Reports.AccBankReconcilationReport', [
            // 'BranchCode' => $MBranchCode,
            // 'FixAccountSetup' => $FixAccountSetup,
            // 'GodownSetup' => $GodownSetup,
            // 'TermsSetup' => $TermsSetup,
        ]);
    }

    public function AccVendorReconcilationReport()
    {
        // $MBranchCode = Auth::user()->BranchCode;
        // $PVendorcode = 756;
        // $BranchCode = Auth::user()->BranchCode;
        // $FixAccountSetup = FixAccountSetup::where('BranchCode', $BranchCode)->first();
        // $GodownSetup = GodownSetup::select('GodownName', 'GodownCode')->where('ChkNotShow', 0)->where('BranchCode', $MBranchCode)->orderBy('Godowncode')->get();
        // $TermsSetup = termssetup::select('Terms', 'TermsCode')->distinct()->where('BranchCode', $MBranchCode)->orderBy('Terms')->get();
        // $Trans = Trans::select('Vnoc')->where('ChkNotShow',0)->where('BranchCode',$MBranchCode)->orderBy('Godowncode')->get();


        return view('Accounts.Reports.AccVendorReconcilationReport', [
            // 'BranchCode' => $MBranchCode,
            // 'FixAccountSetup' => $FixAccountSetup,
            // 'GodownSetup' => $GodownSetup,
            // 'TermsSetup' => $TermsSetup,
        ]);
    }

    public function AccCustomerReconcilationReport()
    {
        // $MBranchCode = Auth::user()->BranchCode;
        // $PVendorcode = 756;
        // $BranchCode = Auth::user()->BranchCode;
        // $FixAccountSetup = FixAccountSetup::where('BranchCode', $BranchCode)->first();
        // $GodownSetup = GodownSetup::select('GodownName', 'GodownCode')->where('ChkNotShow', 0)->where('BranchCode', $MBranchCode)->orderBy('Godowncode')->get();
        // $TermsSetup = termssetup::select('Terms', 'TermsCode')->distinct()->where('BranchCode', $MBranchCode)->orderBy('Terms')->get();
        // $Trans = Trans::select('Vnoc')->where('ChkNotShow',0)->where('BranchCode',$MBranchCode)->orderBy('Godowncode')->get();


        return view('Accounts.Reports.AccCustomerReconcilationReport', [
            // 'BranchCode' => $MBranchCode,
            // 'FixAccountSetup' => $FixAccountSetup,
            // 'GodownSetup' => $GodownSetup,
            // 'TermsSetup' => $TermsSetup,
        ]);
    }

    public function AccAgingPayableInvoiceWiseReport()
    {
        // $MBranchCode = Auth::user()->BranchCode;
        // $PVendorcode = 756;
        // $BranchCode = Auth::user()->BranchCode;
        // $FixAccountSetup = FixAccountSetup::where('BranchCode', $BranchCode)->first();
        // $GodownSetup = GodownSetup::select('GodownName', 'GodownCode')->where('ChkNotShow', 0)->where('BranchCode', $MBranchCode)->orderBy('Godowncode')->get();
        // $TermsSetup = termssetup::select('Terms', 'TermsCode')->distinct()->where('BranchCode', $MBranchCode)->orderBy('Terms')->get();
        // $Trans = Trans::select('Vnoc')->where('ChkNotShow',0)->where('BranchCode',$MBranchCode)->orderBy('Godowncode')->get();


        return view('Accounts.Reports.AccAgingPayableInvoiceWiseReport', [
            // 'BranchCode' => $MBranchCode,
            // 'FixAccountSetup' => $FixAccountSetup,
            // 'GodownSetup' => $GodownSetup,
            // 'TermsSetup' => $TermsSetup,
        ]);
    }
    public function CustomerOutstandingReport()
    {
        // $MBranchCode = Auth::user()->BranchCode;
        // $PVendorcode = 756;
        // $BranchCode = Auth::user()->BranchCode;
        // $FixAccountSetup = FixAccountSetup::where('BranchCode', $BranchCode)->first();
        // $GodownSetup = GodownSetup::select('GodownName', 'GodownCode')->where('ChkNotShow', 0)->where('BranchCode', $MBranchCode)->orderBy('Godowncode')->get();
        // $TermsSetup = termssetup::select('Terms', 'TermsCode')->distinct()->where('BranchCode', $MBranchCode)->orderBy('Terms')->get();
        // $Trans = Trans::select('Vnoc')->where('ChkNotShow',0)->where('BranchCode',$MBranchCode)->orderBy('Godowncode')->get();


        return view('Accounts.Reports.CustomerOutstandingReport', [
            // 'BranchCode' => $MBranchCode,
            // 'FixAccountSetup' => $FixAccountSetup,
            // 'GodownSetup' => $GodownSetup,
            // 'TermsSetup' => $TermsSetup,
        ]);
    }
    public function AccOutstandingInvoiceWiseReport()
    {
        // $MBranchCode = Auth::user()->BranchCode;
        // $PVendorcode = 756;
        // $BranchCode = Auth::user()->BranchCode;
        // $FixAccountSetup = FixAccountSetup::where('BranchCode', $BranchCode)->first();
        // $GodownSetup = GodownSetup::select('GodownName', 'GodownCode')->where('ChkNotShow', 0)->where('BranchCode', $MBranchCode)->orderBy('Godowncode')->get();
        // $TermsSetup = termssetup::select('Terms', 'TermsCode')->distinct()->where('BranchCode', $MBranchCode)->orderBy('Terms')->get();
        // $Trans = Trans::select('Vnoc')->where('ChkNotShow',0)->where('BranchCode',$MBranchCode)->orderBy('Godowncode')->get();


        return view('Accounts.Reports.AccOutstandingInvoiceWiseReport', [
            // 'BranchCode' => $MBranchCode,
            // 'FixAccountSetup' => $FixAccountSetup,
            // 'GodownSetup' => $GodownSetup,
            // 'TermsSetup' => $TermsSetup,
        ]);
    }

    public function MonthWiseNetProfitReport(){

        $BranchCode = Auth::user()->BranchCode;
        $Typesetup = Typesetup::select('Typecode', 'TypeName')->where('BranchCode', $BranchCode)->orderBy('Typecode')->get();
        $Years = Quote::where('BranchCode', $BranchCode)->orderBy('QDate','desc')->get()->map(function ($quote) {
            return Carbon::parse($quote->QDate)->year;
        })->unique();


        return view('Reports.MonthWiseNetProfitReport', [
            'Deptsetup' => $Typesetup,
            'BranchCode' => $BranchCode,
            'Years' => $Years,
        ]);
    }
    public function MonthWiseQuoteReport(){

        $BranchCode = Auth::user()->BranchCode;
        $Typesetup = Typesetup::select('Typecode', 'TypeName')->where('BranchCode', $BranchCode)->orderBy('Typecode')->get();
        $GodownSetup = GodownSetup::select('GodownName', 'GodownCode')->where('ChkNotShow', 0)->where('BranchCode', $BranchCode)->orderBy('Godowncode')->get();
        $Years = Quote::where('BranchCode', $BranchCode)->orderBy('QDate','desc')->get()->map(function ($quote) {
            return Carbon::parse($quote->QDate)->year;
        })->unique();


        return view('Reports.MonthWiseQuoteReport', [
            'Deptsetup' => $Typesetup,
            'BranchCode' => $BranchCode,
            'GodownSetup' => $GodownSetup,
            'Years' => $Years,
        ]);
    }
    public function MonthWiseNetProfitReportShow(Request $request){
        $BranchCode = Auth::user()->BranchCode;
        $MWorkUser = config('app.MUserName');
        $Qry3 = $request->input('Qry3');
        $year = $request->input('TxtYear');
        $MTransAmt = '';
        $FixAccountSetup = FixAccountSetup::select('ActSalesCode','ActPurchaseCode','ActCashCode','GSTCode','ActSalesCode')->where('BranchCode', $BranchCode)->first();
        if ($FixAccountSetup){


            $MPurRetCode = $FixAccountSetup->ActSalesCode ? $FixAccountSetup->ActSalesCode : '';
            $MPurCode = $FixAccountSetup->ActPurchaseCode ? $FixAccountSetup->ActPurchaseCode : '';
            $MCashCode = $FixAccountSetup->ActCashCode ? $FixAccountSetup->ActCashCode : '' ;
            $MGSTCode = $FixAccountSetup->GSTCode ? $FixAccountSetup->GSTCode : '';
            $MSaleCode = $FixAccountSetup->ActSalesCode ? $FixAccountSetup->ActSalesCode : '';
        }else{

            $MPurCode = "";
            $MCashCode = "";
            $MGSTCode = "";
            $MPurRetCode = "";
            $MSaleCode = "";
        }
        DB::table('tempnetprofitmonthwise')->where('WorkUser',$MWorkUser)->Delete();

        $months = [];
        $totalCostAmount = 0;
        $totalSaleAmount = 0;
        $totalProfit = 0;

        for ($month = 1; $month <= 12; $month++) {
            $startDate = now()->setDate($year, $month, 1)->startOfMonth();
            $endDate = now()->setDate($year, $month, 1)->endOfMonth();

            $sales = AcFile::where('OptType', 'P')
                ->orderBy('BranchCode')
                ->orderBy('AcCode3')
                ->get();

            $netSales = 0;
            $cogsAmount = 0;
            $MSalesAmt = 0;

            foreach ($sales as $sale) {
                if ($sale->ActCode === $MSaleCode) {

                    $result = OrderMasterModel::select(DB::raw('SUM((NetAmount + InvDiscAmt)) as MTransAmt'))
                        ->where('NetAmount', '>', 0)
                        ->where('Status', 'INVOICED')
                        ->where('BranchCode', '=', $BranchCode)
                        ->whereBetween('InvDate', [$startDate, $endDate])
                        ->when($Qry3, function ($query) use ($Qry3) {
                            return $query->whereRaw($Qry3);
                        })
                        ->first();

                        $MTransAmt = $result->MTransAmt ?? 0;
                        if($MTransAmt !== 0){
                            $MSalesAmt = $MSalesAmt + $MTransAmt;

                        }
                }
            }
            $MDedcutionAmt = 0;
            ////Invoice Discount
            $Dt3 = OrderMasterModel::select(DB::raw('SUM(InvDiscAmt) as MTransAmt'))
                ->where('NetAmount', '>', 0)
                ->where('Status', 'INVOICED')
                ->where('BranchCode', '=', $BranchCode)
                ->whereBetween('InvDate', [$startDate, $endDate])
                ->when($Qry3, function ($query) use ($Qry3) {
                    return $query->whereRaw($Qry3);
                })
                ->first();


                $MTransAmt = $Dt3->MTransAmt ?? 0;
                if($MTransAmt !== 0){
                    $MDedcutionAmt = $MDedcutionAmt + $MTransAmt;

                }

            $CRNoteInvoice = 0;

            $MTransAmt = DB::table('qrycreditnotewithtrans')
            ->select(DB::raw('SUM(TransAmt) as MTransAmt'))
            ->where('Vnoc', '<>', 'CLOS')
            ->where('ActCode', '=', $MSaleCode)
            ->where('Vnoc', '<>', 'CLOS')
            ->where('Vnoc', '=', 'CRNTS')
            ->where('BranchCode', '=', $BranchCode)
            ->whereBetween('Date', [$startDate, $endDate])
            ->when($Qry3, function ($query) use ($Qry3) {
                return $query->whereRaw($Qry3);
            })
            ->first();

            $CRNoteInvoice = $MTransAmt->MTransAmt ?? 0;

            $CRNoteAmt = 0;

            $result = DB::table('qrycreditnotewithtrans')
            ->select(DB::raw('SUM(TransAmt) as CrNoteAmt1'))
            ->where('Vnoc', '<>', 'CLOS')
            ->where('ActCode', '=', $MSaleCode)
            ->where('Vnoc', '<>', 'CLOS')
            ->where('Vnoc', '=', 'CrNote')
            ->where('BranchCode', '=', $BranchCode)
            ->whereBetween('Date', [$startDate, $endDate])
            ->when($Qry3, function ($query) use ($Qry3) {
                return $query->whereRaw($Qry3);
            })
            ->first();

            $CRNoteAmt = $result->CrNoteAmt1 ?? 0;

            $MTransAmt = $CRNoteInvoice + $CRNoteAmt;

            if($MTransAmt !== 0){
                $MDedcutionAmt = $MDedcutionAmt + $MTransAmt;
            }

            $MTotalSale = $MSalesAmt - $MDedcutionAmt;
            ////AVI Rebate
            $Dt3 = OrderMasterModel::select(DB::raw('SUM(AVIRebateAmt) as MTransAmt'))
            ->where('NetAmount', '>', 0)
            ->where('Status', 'INVOICED')
            ->where('BranchCode', '=', $BranchCode)
            ->whereBetween('InvDate', [$startDate, $endDate])
            ->when($Qry3, function ($query) use ($Qry3) {
                return $query->whereRaw($Qry3);
            })
            ->first();

                $MTransAmt = $Dt3->MTransAmt ?? 0;
                if($MTransAmt !== 0){
                    $MDedcutionAmt = $MDedcutionAmt + $MTransAmt;
                }
            ////sls commision
            $Dt3 ='';
            $Dt3 = OrderMasterModel::select(DB::raw('SUM(SlsCommAmt) as MTransAmt'))
            ->where('NetAmount', '>', 0)
            ->where('Status', 'INVOICED')
            ->where('BranchCode', '=', $BranchCode)
            ->whereBetween('InvDate', [$startDate, $endDate])
            ->when($Qry3, function ($query) use ($Qry3) {
                return $query->whereRaw($Qry3);
            })
            ->first();

            $MTransAmt = $result->MTransAmt ?? 0;
            if($MTransAmt !== 0){
                $MDedcutionAmt = $MDedcutionAmt + $MTransAmt;
            }
            ///Agent Commisison

            $MAgentCommAmt = 0;
            $Dt3 ='';
            $Dt3 = OrderMasterModel::select(DB::raw('SUM(AgentCommAmt) as MAgentCommAmt'))
            ->where('NetAmount', '>', 0)
            ->where('Status', 'INVOICED')
            ->where('BranchCode', '=', $BranchCode)
            ->whereBetween('InvDate', [$startDate, $endDate])
             ->when($Qry3, function ($query) use ($Qry3) {
                            return $query->whereRaw($Qry3);
                        })
            ->first();

            $MAgentCommAmt = $Dt3->MAgentCommAmt ?? 0;
            if($MAgentCommAmt !== 0){
                $MDedcutionAmt = $MDedcutionAmt + $MAgentCommAmt;
            }



            // Net sale.
            $MNetSales = $MSalesAmt - $MDedcutionAmt;
            $MCOGSAmt = 0;

            $Rs2 = AcFile::where('OptType', 'C')
            ->orderBy('BranchCode')
            ->orderBy('AcCode3')
            ->get();

            foreach($Rs2 as $Rss2){
                $Rs3 = DB::table('qrycreditnotewithtrans')
                    ->select(DB::raw('SUM(TransAmt) as MTransAmt'))
                    ->where('Vnoc', '<>', 'CLOS')
                    ->where('TransAmt', '<>', 0)
                    ->where('BranchCode', '=', $BranchCode)
                    ->where('ActCode', '=', $Rss2->ActCode)
                    ->whereBetween('Date', [$startDate, $endDate])
                     ->when($Qry3, function ($query) use ($Qry3) {
                            return $query->whereRaw($Qry3);
                        })
                    ->get();

                    foreach($Rs3 as $Rss3){
                        $MTransAmt = $Rss3->MTransAmt ?? 0;
                        if($MTransAmt !== 0){
                            $MCOGSAmt = $MCOGSAmt + $MTransAmt;
                        }
                    }

            }


            $MGROSSPROFIT =  $MNetSales - $MCOGSAmt;

            $percentage = ($MGROSSPROFIT / ($MNetSales == 0 ? 1 : $MNetSales)) * 100;

            // Store results in the database or any other desired output
            $Rs1 = DB::table('tempnetprofitmonthwise')->insert([
                'MonthName' => $startDate->format('F'),
                'SaleAmount' => round($MNetSales, 2),
                'CostAmount' => round($MCOGSAmt, 2),
                'ProfitAmount' => $MGROSSPROFIT,
                'Per' => round($percentage, 2),
                'BranchCode' => $BranchCode,
                'workuser' => $MWorkUser,
            ]);

            // Store results in an array for display or further processing
            $months[] = [
                'MonthName' => $startDate->format('F'),
                'SaleAmount' => round($MNetSales, 2),
                'CostAmount' => round($MCOGSAmt, 2),
                'ProfitAmount' => $MGROSSPROFIT,
                'Per' => round($percentage, 2),
            ];

            // Update totals
            $totalCostAmount += $MCOGSAmt;
            $totalSaleAmount += $MNetSales;
            $totalProfit += $MGROSSPROFIT;
        }
            $TxtPer = ($totalProfit / ($totalSaleAmount == 0 ? 1 : $totalSaleAmount)) * 100;
        // Additional processing or output as needed
        // ...
        // $Rs1 = DB::table('TempNetProfitMonthWise')->where('WorkUser',$MWorkUser)->get();

        return response()->json([
            'Rs1' => $months,
            'months' => $months,
            'TxtPer' => round($TxtPer, 2),
            'totalCostAmount' => round($totalCostAmount, 2),
            'totalSaleAmount' => round($totalSaleAmount, 2),
            'totalProfit' => round($totalProfit, 2),
        ]);



    }

    public function MonthWiseQuoteReportShow(Request $request){
        $MBranchCode = Auth::user()->BranchCode;
        $MWorkUser = config('app.MUserName');
        $Qry3 = $request->input('Qry3');
        $year = $request->input('TxtYear');


        $results = Quote::leftJoin('ordermaster', function ($join) {
            $join->on('quotemaster.QuoteNo', '=', 'ordermaster.QuoteNo')
                 ->on('quotemaster.BranchCode', '=', 'ordermaster.BranchCode');
        })
        ->whereYear('quotemaster.QDate', $year)
        ->when($Qry3, function ($query) use ($Qry3) {
            return $query->whereRaw($Qry3);
        })
        ->groupBy(DB::raw('MONTHNAME(quotemaster.QDate), MONTH(quotemaster.QDate)'))
        ->orderBy(DB::raw('MONTH(quotemaster.QDate)'))
        ->selectRaw('MONTHNAME(quotemaster.QDate) AS MonthName, ROUND(SUM(quotemaster.ValueAmount), 2) AS QuoteAmount, ROUND(SUM(COALESCE(ordermaster.ExtAmount, 0)), 2) AS OrderAmount')
        ->get();

            info($results);

        // Delete existing records
            DB::table('tempmonthwisequotereport')
            ->where('BranchCode', $MBranchCode)
            ->where('WorkUser', $MWorkUser)
            ->delete();

            // Insert new records
            $dataToInsert = [];
            $dataToshow = [];
            $TxtQuoteAmt=0;
            $TxtOrderAmt=0;
            foreach ($results as $result) {
            $dataToInsert[] = [
                'MonthName' => $result->MonthName,
                'QuoteAmount' => $result->QuoteAmount,
                'OrderAmount' => $result->OrderAmount,
                'BranchCode' => $MBranchCode,
                'WorkUser' => $MWorkUser,
            ];
            if((int)$result->OrderAmount > 0){
                $Success =($result->OrderAmount / $result->QuoteAmount * 100);
            }else{
                $Success = 0;
            }
            $dataToshow[] = [
                'MonthName' => $result->MonthName,
                'QuoteAmount' => $result->QuoteAmount,
                'OrderAmount' => $result->OrderAmount,
                'Success' => round($Success, 2),
            ];

            $TxtOrderAmt += $result->OrderAmount;
            $TxtQuoteAmt += $result->QuoteAmount;

            }

            DB::table('tempmonthwisequotereport')->insert($dataToInsert);

            return response()->json([
                'dataToshow' => $dataToshow,
                'TxtOrderAmt' => round($TxtOrderAmt, 2),
                'TxtQuoteAmt' => round($TxtQuoteAmt, 2),
            ]);


    }

    public function MonthQuoteSuccessCustomerWiseReport(){

        $BranchCode = Auth::user()->BranchCode;
        $Typesetup = Typesetup::select('Typecode', 'TypeName')->where('BranchCode', $BranchCode)->orderBy('Typecode')->get();
        $customers = Customer::select('CustomerCode', 'CustomerName')
                ->where('status', 'Active')
                ->whereNotNull('CustomerName')
                ->where('CustomerName', '<>', '')
                ->distinct()
                ->orderBy('CustomerName')
                ->get();

        $Years = Quote::where('BranchCode', $BranchCode)->orderBy('QDate','desc')->get()->map(function ($quote) {
            return Carbon::parse($quote->QDate)->year;
        })->unique();


        return view('Reports.MonthQuoteSuccessCustomerWiseReport', [
            'customers' => $customers,
            'Deptsetup' => $Typesetup,
            'BranchCode' => $BranchCode,
            'Years' => $Years,
        ]);
    }
    public function MonthQuoteSuccessCustomerWiseReportShow(Request $request){
        // Initialize variables
        $TxtQuoteAmt = 0;
        $TxtOrderAmt = 0;
        $TxtNoOfQuote = 0;
        $TxtNoOfOrder = 0;
        $TxtSuccess = 0;

        $MBranchCode = Auth::user()->BranchCode;
        $MWorkUser = config('app.MUserName');
        $Qry3 = $request->input('Qry3');
        $year = $request->input('TxtYear');


        // Query the database
        $results = Quote::leftJoin('ordermaster', function ($join) {
            $join->on('quotemaster.QuoteNo', '=', 'ordermaster.QuoteNo')
                 ->on('quotemaster.BranchCode', '=', 'ordermaster.BranchCode');
        })
        ->whereYear('quotemaster.QDate', $year)
        ->when($Qry3, function ($query) use ($Qry3) {
            return $query->whereRaw($Qry3);
        })
        ->groupBy(DB::raw('MONTHNAME(quotemaster.QDate), MONTH(quotemaster.QDate)'))
        ->orderBy(DB::raw('MONTH(quotemaster.QDate)'))
        ->selectRaw('MONTH(quotemaster.QDate) AS MonthNo, MONTHNAME(quotemaster.QDate) AS MonthName, ROUND(SUM(quotemaster.ValueAmount), 2) AS QuoteAmount, ROUND(SUM(COALESCE(ordermaster.ExtAmount, 0)), 2) AS OrderAmount')
        ->get();


        $dataToshow = [];
        $dataToInsert = [];

        // Process the results
        foreach ($results as $result) {
            // Extract values from the result
            $MMonthNo = $result->MonthNo;
            $MMonthName = $result->MonthName;
            $MMQuoteAmount = $result->QuoteAmount;
            $MMOrderAmount = $result->OrderAmount;
            $fromDate = now()->setDate($year, $MMonthNo, 1)->startOfMonth();
            $toDate = now()->setDate($year, $MMonthNo, 1)->endOfMonth();


            $MMNoOfQuote = Quote::leftJoin('ordermaster', function ($join) {
                $join->on('quotemaster.QuoteNo', '=', 'ordermaster.QuoteNo')
                     ->on('quotemaster.BranchCode', '=', 'ordermaster.BranchCode');
            })
            ->whereBetween('quotemaster.QDate', [$fromDate, $toDate])
            ->where('quotemaster.quoteno', '>', 0)
            ->when($Qry3, function ($query) use ($Qry3) {
                return $query->whereRaw($Qry3);
            })
            ->count();

            $MMNoOfOrder = Quote::leftJoin('ordermaster', function ($join) {
                $join->on('quotemaster.QuoteNo', '=', 'ordermaster.QuoteNo')
                     ->on('quotemaster.BranchCode', '=', 'ordermaster.BranchCode');
            })
            ->whereBetween('quotemaster.QDate', [$fromDate, $toDate])
            ->where('ordermaster.PONO', '>', 0)
            ->when($Qry3, function ($query) use ($Qry3) {
                return $query->whereRaw($Qry3);
            })
            ->count();


            if ($MMOrderAmount > 0) {
                $Success = round($MMOrderAmount / $MMQuoteAmount * 100, 2);
            } else {
                $Success = 0;
            }

            $dataToshow[] = [
                'MMonthNo' => $MMonthNo,
                'MonthName' => $MMonthName,
                'QuoteAmount' => $MMQuoteAmount,
                'OrderAmount' => $MMOrderAmount,
                'NoOfQuote' => $MMNoOfQuote,
                'NoOfOrder' => $MMNoOfOrder,
                'Success' => $Success,
            ];
            $dataToInsert[] = [
                'MonthName' => $MMonthName,
                'QuoteAmount' => $MMQuoteAmount,
                'NoOfQuote' => $MMNoOfQuote,
                'OrderAmount' => $MMOrderAmount,
                'NoOfOrder' => $MMNoOfOrder,
                'Success' => $Success,
                'WorkUser' => $MWorkUser,
                'BranchCode' => $MBranchCode,
            ];

            $TxtQuoteAmt += $MMQuoteAmount;
            $TxtOrderAmt += $MMOrderAmount;
            $TxtNoOfQuote += $MMNoOfQuote;
            $TxtNoOfOrder += $MMNoOfOrder;


        }

        // Update TxtSuccess
        if ($TxtQuoteAmt > 0) {
            $TxtSuccess = round($TxtOrderAmt / $TxtQuoteAmt * 100, 2);
        } else {
            $TxtSuccess = 0;
        }

        // Format results as needed
        $TxtQuoteAmt = number_format($TxtQuoteAmt, 2);
        $TxtOrderAmt = number_format($TxtOrderAmt, 2);
        $TxtNoOfQuote = number_format($TxtNoOfQuote, 2);
        $TxtNoOfOrder = number_format($TxtNoOfOrder, 2);
        $TxtSuccess = number_format($TxtSuccess, 2);
          // Delete existing records
          DB::table('tempmonthwisequotecustomerreport')
          ->where('BranchCode', $MBranchCode)
          ->where('WorkUser', $MWorkUser)
          ->delete();

          DB::table('tempmonthwisequotecustomerreport')->insert($dataToInsert);



        return response()->json([
            'dataToshow'=>$dataToshow,
            'TxtQuoteAmt'=>$TxtQuoteAmt,
            'TxtOrderAmt'=>$TxtOrderAmt,
            'TxtNoOfQuote'=>$TxtNoOfQuote,
            'TxtNoOfOrder'=>$TxtNoOfOrder,
            'TxtSuccess'=>$TxtSuccess,
        ]);
    }
    public function YearlyQuotationReport(){

        $BranchCode = Auth::user()->BranchCode;
        $Typesetup = Typesetup::select('Typecode', 'TypeName')->where('BranchCode', $BranchCode)->orderBy('Typecode')->get();


        $Years = Quote::select('QDate')->where('BranchCode', $BranchCode)->orderBy('QDate','desc')->get()->map(function ($quote) {
            return Carbon::parse($quote->QDate)->year;
        })->unique();


        return view('Reports.YearlyQuotationReport', [
            'Deptsetup' => $Typesetup,
            'BranchCode' => $BranchCode,
            'Years' => $Years,
        ]);
    }
    public function YearlyQuotationReportShow(Request $request){
        $MBranchCode = Auth::user()->BranchCode;
        $MBranchName = config('app.BranchName');
        $MWorkUser = config('app.MUserName');
        $CmbDepartment = $request->input('CmbDepartment');
        $year = $request->input('TxtYear');
        DB::table('tempyearlyquotationreport')
        ->where('BranchCode', $MBranchCode)
        ->where('WorkUser', $MWorkUser)
        ->delete();

        $dataToInsert = [];

        for ($i = 1; $i <= 12; $i++) {
            $result = Quote::select('DepartmentCode', 'DepartmentName', DB::raw('COUNT(QuoteNo) as MQuoteNo'), DB::raw('SUM(ValueAmount) as MValue'), DB::raw('SUM(CostAmount) as MCostAmount'), DB::raw('SUM(GPAmount) as MGPAmount'))
                ->whereMonth('QDate', '=', $i)
                ->whereYear('QDate', '=', $year)
                ->where('BranchCode', '=', $MBranchCode)
                ->when($CmbDepartment, function ($query, $CmbDepartment) {
                    return $query->whereRaw('DepartmentCode = ?', [$CmbDepartment]);
                })
                ->groupBy('DepartmentCode', 'DepartmentName')
                ->orderBy('DepartmentName')
                ->get();

            // ... (your existing code)

            if ($result->count() > 0) {
                foreach ($result as $row) {
                    $dataToInsert[] = [
                        'DepartmentCode'=>$row->DepartmentCode,
                        'DepartmentName'=>(String)$row->DepartmentName,
                        'MonthNo'=>$i,
                        'MonthName'=>(String) Carbon::create()->month($i)->format('F'),
                        'YearName'=>$year,
                        'NoOfQuote'=>$row->MQuoteNo,
                        'Value'=>$row->MValue,
                        'Cost'=>$row->MCostAmount,
                        'GP'=>$row->MGPAmount,
                        'BranchCode'=>$MBranchCode,
                        'WorkUser'=>(String)$MWorkUser,
                        'BranchName'=>(String)$MBranchName,
                    ];
                }
            } else {
                $dataToInsert[] = [
                    'DepartmentCode'=>Null,
                        'DepartmentName'=>Null,
                        'MonthNo'=>$i,
                        'MonthName'=>(String) Carbon::create()->month($i)->format('F'),
                        'YearName'=>$year,
                        'NoOfQuote'=>Null,
                        'Value'=>Null,
                        'Cost'=>Null,
                        'GP'=>Null,
                        'BranchCode'=>$MBranchCode,
                        'WorkUser'=>(String)$MWorkUser,
                        'BranchName'=>(String)$MBranchName,
                ];
            }
        }
        // Bulk insert outside the loop
        DB::table('tempyearlyquotationreport')->insert($dataToInsert);
        $data = DB::table('tempyearlyquotationreport')
        ->where('BranchCode', $MBranchCode)
        ->where('WorkUser', $MWorkUser)
        ->get();


        return response()->json([
            'dataToInsert'=>$data,
        ]);
    }
    public function YearlySaleReport(){

        $BranchCode = Auth::user()->BranchCode;
        $Typesetup = Typesetup::select('Typecode', 'TypeName')->where('BranchCode', $BranchCode)->orderBy('Typecode')->get();


        $Years = Quote::select('QDate')->where('BranchCode', $BranchCode)->orderBy('QDate','desc')->get()->map(function ($quote) {
            return Carbon::parse($quote->QDate)->year;
        })->unique();


        return view('Reports.YearlySaleReport', [
            'Deptsetup' => $Typesetup,
            'BranchCode' => $BranchCode,
            'Years' => $Years,
        ]);
    }
    public function YearlySaleReportShow(Request $request){
        $MBranchCode = Auth::user()->BranchCode;
        $MBranchName = config('app.BranchName');
        $MWorkUser = config('app.MUserName');
        $Qry3 = $request->input('Qry3');
        $year = $request->input('TxtYear');
        DB::table('tempyearlysalereport')
        ->where('BranchCode', '=', intval($MBranchCode))
        ->where('workuser', '=', $MWorkUser)
        ->delete();

        $dataToInsert = [];

        for ($i = 1; $i <= 12; $i++) {
            $result = DB::table('qryordermaster')->select('DepartmentCode', 'DepartmentName', DB::raw('SUM(LblNetAmount) as NETAMOUNT'))
            ->whereMonth('INVDate', '=', $i)
            ->whereYear('INVDate', '=', $year)
            ->where('BranchCode', '=', $MBranchCode)
            ->where('Status', '=', 'INVOICED')
            ->when($Qry3, function ($query) use ($Qry3) {
                return $query->whereRaw($Qry3);
            })
            ->groupBy('DepartmentCode', 'DepartmentName')
            ->orderBy('DepartmentName')
            ->get();

            // ... (your existing code)

            if ($result->count() > 0) {
                foreach ($result as $row) {
                    $dataToInsert[] = [
                        'DepartmentCode'=>$row->DepartmentCode,
                        'DepartmentName'=>(String)$row->DepartmentName,
                        'MonthNo'=>$i,
                        'MonthName'=>(String) Carbon::create()->month($i)->format('F'),
                        'YearName'=>$year,
                        'NetAmount'=>$row->NETAMOUNT,
                        'BranchCode'=>$MBranchCode,
                        'WorkUser'=>(String)$MWorkUser,
                        'BranchName'=>(String)$MBranchName,
                    ];
                }
            } else {
                $dataToInsert[] = [
                    'DepartmentCode'=>Null,
                        'DepartmentName'=>Null,
                        'MonthNo'=>$i,
                        'MonthName'=>(String) Carbon::create()->month($i)->format('F'),
                        'YearName'=>$year,
                        'NetAmount'=>Null,
                        'BranchCode'=>$MBranchCode,
                        'WorkUser'=>(String)$MWorkUser,
                        'BranchName'=>(String)$MBranchName,
                ];
            }
        }
        // Bulk insert outside the loop
        DB::table('tempyearlysalereport')->insert($dataToInsert);
        $data = DB::table('tempyearlysalereport')
        ->where('BranchCode', $MBranchCode)
        ->where('WorkUser', $MWorkUser)
        ->get();


        return response()->json([
            'dataToInsert'=>$data,
        ]);
    }
    public function YearlyUserReport(){

        $BranchCode = Auth::user()->BranchCode;
        $WorkUser = Quote::select('WorkUser')->distinct()->where('BranchCode', $BranchCode)->orderBy('WorkUser')->get();

        $Typesetup = Typesetup::select('Typecode', 'TypeName')->where('BranchCode', $BranchCode)->orderBy('Typecode')->get();

        $Years = Quote::select('QDate')->where('BranchCode', $BranchCode)->orderBy('QDate','desc')->get()->map(function ($quote) {
            return Carbon::parse($quote->QDate)->year;
        })->unique();


        return view('Reports.YearlySaleReport', [
            'Deptsetup' => $Typesetup,
            'WorkUser' => $WorkUser,
            'BranchCode' => $BranchCode,
            'Years' => $Years,
        ]);
    }
    public function YearlyUserReportShow(Request $request){
        $MBranchCode = Auth::user()->BranchCode;
        $MBranchName = config('app.BranchName');
        $MWorkUser = config('app.MUserName');
        $Qry3 = $request->input('Qry3');
        $year = $request->input('TxtYear');
        DB::table('tempyearlyquotationreport')
        ->where('BranchCode', '=', intval($MBranchCode))
        ->where('workuser', '=', $MWorkUser)
        ->delete();

        $dataToInsert = [];

        for ($i = 1; $i <= 12; $i++) {
            $result = DB::table('qryordermaster')->select('DepartmentCode', 'DepartmentName', DB::raw('SUM(LblNetAmount) as NETAMOUNT'))
            ->whereMonth('INVDate', '=', $i)
            ->whereYear('INVDate', '=', $year)
            ->where('BranchCode', '=', $MBranchCode)
            ->where('Status', '=', 'INVOICED')
            ->when($Qry3, function ($query) use ($Qry3) {
                return $query->whereRaw($Qry3);
            })
            ->groupBy('DepartmentCode', 'DepartmentName')
            ->orderBy('DepartmentName')
            ->get();

            // ... (your existing code)

            if ($result->count() > 0) {
                foreach ($result as $row) {
                    $dataToInsert[] = [
                        'DepartmentCode'=>$row->DepartmentCode,
                        'DepartmentName'=>(String)$row->DepartmentName,
                        'MonthNo'=>$i,
                        'MonthName'=>(String) Carbon::create()->month($i)->format('F'),
                        'YearName'=>$year,
                        'NetAmount'=>$row->NETAMOUNT,
                        'BranchCode'=>$MBranchCode,
                        'WorkUser'=>(String)$MWorkUser,
                        'BranchName'=>(String)$MBranchName,
                    ];
                }
            } else {
                $dataToInsert[] = [
                    'DepartmentCode'=>Null,
                        'DepartmentName'=>Null,
                        'MonthNo'=>$i,
                        'MonthName'=>(String) Carbon::create()->month($i)->format('F'),
                        'YearName'=>$year,
                        'NetAmount'=>Null,
                        'BranchCode'=>$MBranchCode,
                        'WorkUser'=>(String)$MWorkUser,
                        'BranchName'=>(String)$MBranchName,
                ];
            }
        }
        // Bulk insert outside the loop
        DB::table('tempyearlysalereport')->insert($dataToInsert);
        $data = DB::table('tempyearlysalereport')
        ->where('BranchCode', $MBranchCode)
        ->where('WorkUser', $MWorkUser)
        ->get();


        return response()->json([
            'dataToInsert'=>$data,
        ]);
    }

}
