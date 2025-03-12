<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use App\Models\Quote;
use App\Models\temp2;
use App\Models\Events;
use App\Models\Customer;
use App\Models\RFQModel;
use Barryvdh\DomPDF\PDF;
use App\Models\FlipTovsn;
use App\Reports\MyReport;
use App\Models\OrderModel;
use App\Models\BranchSetup;
use App\Models\VenderSetup;
use App\Models\CompanySetup;
use App\Models\QuoteDetails;
use Illuminate\Http\Request;
use App\Models\CustomerDiscount;
use App\Models\OrderMasterModel;
use GroceryCrud\Core\GroceryCrud;
use Illuminate\Support\Facades\DB;
use App\Models\PurchaseOrderDetail;
use App\Models\PurchaseOrderMaster;
use App\Models\TempInventoryReport;
use App\Models\TempUserPerformance;
use App\Models\ExpensePaymentVoucher;
use App\Models\Typesetup;
use Illuminate\Support\Facades\Auth;

class Printer extends Controller
{
//

    public function quotationprint(Request $request,$quote_no){
        $lastid = DB::table('QuoteMaster')->orderBy('id', 'DESC')->first();
        $data["quote_no"] = $quote_no;
        $quotno = $quote_no;
        $quotesdetails = QuoteDetails::where('QuoteNo', $quotno)->get();
        $quotesmaster = Quote::where('QuoteNo', $quotno)->first();
        $depcode = $quotesmaster->DepartmentCode;
        $CustomerName = $quotesmaster->CustomerName;
        $CustomerCode = $quotesmaster->CustomerCode;
        $Customercodedata = Customer::where('CustomerCode', $CustomerCode)->get();
        $Customerdicount = CustomerDiscount::where('CustomerCode', $CustomerCode)->where('DepartmentCode',$depcode)->first();

        if ($Customerdicount===null) {
            $avi = 0;
            $inv = 0;
            $cr = 0;
            $acp = 0;
            $sls = 0;
        } else {
            $avi = $Customerdicount->AVIRebatePer;
            $inv = $Customerdicount->InvDiscPer;
            $cr = $Customerdicount->CrNotePer;
            $acp = $Customerdicount->AgentCommPer;
            $sls = $Customerdicount->SlsCommPer;
        }


        $VesselName = $quotesmaster->VesselName;
        $EventNo = $quotesmaster->EventNo;
        $BranchCode= Auth::user()->BranchCode;
        $QuoteMaster = Quote::where('QuoteNo',$quotno)->where('BranchCode',$BranchCode)->get();
        $eventdata = Events::where('EventNo',$EventNo)->where('BranchCode',$BranchCode)->first();
        foreach ($QuoteMaster as $items) {

        }
        $companysetup = CompanySetup::where('BranchCode',$BranchCode)->get();
        foreach ($companysetup as $company) {

        }
        $sql = "Select Distinct(VenderName),VenderCode From QryVendorDepartment where  (ChkInactive=0 or ChkInactive is Null) and ChkSelect=1 and TypeCode=$depcode and  BranchCode=$BranchCode order by VenderName";
        $department = DB::Select($sql);
        return view('prints.quotation', [
            'lastid'=>$lastid,
            'avi'=>$avi,
            'inv'=>$inv,
            'EventNo'=>$EventNo,
            'cr'=>$cr,
            'acp'=>$acp,
            'sls'=>$sls,
            'items' => $items,
            'Customercodedata' => $Customercodedata,
            'company' => $company,
            'quote_no' => $data['quote_no'],
            'quotno' => $quotno,
            'VesselName' => $VesselName,
            'quotesdetails' => $quotesdetails,
            'department' => $department,
            'eventdata' => $eventdata,
        ]);
    }
    public function orderentryprint(Request $request,$PONo){
        $BranchCode= Auth::user()->BranchCode;

        $lastid = DB::table('QuoteMaster')->orderBy('id', 'DESC')->first();
        $OrderDetails = OrderModel::where('PONO',$PONo)->get();
        $OrderMasterData = OrderMasterModel::where('PONo',$PONo)->where('BranchCode',$BranchCode)->first();

        // dd($OrderMasterData->CustomerCode);
        // dd($OrderMasterData);
        // dd($OrderDetails);
        // $quotesdetails = QuoteDetails::where('QuoteNo', $quotno)->get();
        // $quotesmaster = Quote::where('QuoteNo', $quotno)->get();
        // $depcode = $quotesmaster[0]->DepartmentCode;
        // $CustomerName = $quotesmaster[0]->CustomerName;
        // $CustomerCode = $quotesmaster[0]->CustomerCode;
        $Customercodedata = Customer::where('CustomerCode', $OrderMasterData->CustomerCode)->first();
        $Customerdicount = CustomerDiscount::where('CustomerCode', "$OrderMasterData->CustomerCode")->where('DepartmentCode',"$OrderMasterData->DepartmentCode")->first();

        if ($Customerdicount===null) {
            $avi = 0;
            $inv = 0;
            $cr = 0;
            $acp = 0;
            $sls = 0;
        } else {
            $avi = $Customerdicount->AVIRebatePer;
            $inv = $Customerdicount->InvDiscPer;
            $cr = $Customerdicount->CrNotePer;
            $acp = $Customerdicount->AgentCommPer;
            $sls = $Customerdicount->SlsCommPer;
        }


        // $EventNo = $quotesmaster[0]->EventNo;
        // $QuoteMaster = Quote::where('QuoteNo',$quotno)->where('BranchCode',$BranchCode)->get();
        // foreach ($QuoteMaster as $items) {

        // }
        $companysetup = CompanySetup::where('BranchCode',$BranchCode)->get();
        foreach ($companysetup as $company) {

        }
        // $sql = "Select Distinct(VenderName),VenderCode From QryVendorDepartment where  (ChkInactive=0 or ChkInactive is Null) and ChkSelect=1 and TypeCode=$depcode and  BranchCode=$BranchCode order by VenderName";
        // $department = DB::Select($sql);
        return view('prints.orderprint', [
            'lastid'=>$lastid,
            // 'avi'=>$avi,
            'inv'=>$inv,
            // 'EventNo'=>$EventNo,
            // 'cr'=>$cr,
            // 'acp'=>$acp,
            // 'sls'=>$sls,
            // 'items' => $items,
            'Customercodedata' => $Customercodedata,
            'company' => $company,
            // 'quote_no' => $data['quote_no'],
            'PONo' => $PONo,
            'OrderMasterData' => $OrderMasterData,
            // 'department' => $department,
            'OrderDetails' => $OrderDetails,
        ]);
    }

    public function Purchaseorderprint($PONO){
        $BranchCode= Auth::user()->BranchCode;
        $company = CompanySetup::where('BranchCode',$BranchCode)->first();
        $purchaseordermaster =PurchaseOrderMaster::where('PurchaseOrderNo',$PONO)->first();
        $purchaseorderdetails =PurchaseOrderDetail::where('PurchaseOrderNo',$PONO)->get();
        $VenderSetup =VenderSetup::where('VenderCode',$purchaseordermaster->VendorCode)->first();
        // dd($purchaseorderdetails);
        return view('prints.PurchaseOrder', [
            'company'=>$company,
            'PONO'=> $PONO,
            'purchaseordermaster'=> $purchaseordermaster,
            'purchaseorderdetails'=> $purchaseorderdetails,
            'VenderSetup'=> $VenderSetup,
        ]);
    }
    public function deliveryorderprint(Request $request){
        $PONO = $request->MInvNo;
        $BranchCode= Auth::user()->BranchCode;
        if(request()->ajax()){
           $qry = OrderMasterModel::where('PONO',$request->MInvNo)->where('VSNNo',$request->MVsn)->where('BranchCode',$BranchCode)->update([
                'ChkSevenSeasDelivery'=>$request->MChkSevenDelivery
            ]);
            // DB::select("Update OrderMaster set ChkSevenSeasDelivery='$request->MChkSevenDelivery' where PONO='$request->MInvNo' and BranchCode='$BranchCode' and VSNNo='$request->MVsn'");
            // info($qry);
            $SevenDelivery = $request->MChkSevenDelivery;
            $SevenDeliveryNorway = $request->MChkSevenSeasNorwayAS;
            if ($SevenDelivery>0) {
                info("seven heading");
                $http = "/DeliveryOrderPrintse/";
            } else if($SevenDeliveryNorway>0) {
                info("norway heading");
                $http = "/DeliveryOrderPrintWay/";
                # code...
            }
             else {
                info("gss heading");
                $http = "/DeliveryOrderPrintre/";
                # code...
            }

if($qry == true){

    $Message = 'Update OrderMaster set ChkSevenSeasDelivery';
}else{
    $Message = 'error OrderMaster Notset ChkSevenSeasDelivery';
}
            return response()->json([
                'Message' =>$Message,
                'link' =>$PONO,
                'http' =>$http,

            ]);
        }
    }
    public function deliveryorderprintse($PONO){
        $BranchCode= Auth::user()->BranchCode;
        $company = CompanySetup::where('BranchCode',$BranchCode)->first();
        $OrderDetails = OrderModel::where('PONO',$PONO)->where('BranchCode',$BranchCode)->get();
        $OrderMaster = OrderMasterModel::where('PONO',$PONO)->where('BranchCode',$BranchCode)->first();
        $purchaseordermaster =PurchaseOrderMaster::where('chargeno',$PONO)->first();
        $purchaseorderdetails =PurchaseOrderDetail::where('chargeno',$PONO)->get();
        $Fliptovsn =FlipTovsn::where('VSNNo',$OrderMaster->VSNNo)->first();
        $Eventinvoice = Events::where('EventNo',$OrderMaster->EventNo)->where('BranchCode',$BranchCode)->first();
        $VenderSetup =VenderSetup::where('VenderCode',$purchaseordermaster->VendorCode)->first();
        $Customerdicount = CustomerDiscount::where('CustomerCode', "$OrderMaster->CustomerCode")->where('DepartmentCode',"$OrderMaster->DepartmentCode")->first();
        $CustomerSetup = Customer::where('CustomerCode', $OrderMaster->CustomerCode)->first();

        if ($Customerdicount===null) {
            $avi = 0;
            $inv = 0;
            $cr = 0;
            $acp = 0;
            $sls = 0;
        } else {
            $avi = $Customerdicount->AVIRebatePer;
            $inv = $Customerdicount->InvDiscPer;
            $cr = $Customerdicount->CrNotePer;
            $acp = $Customerdicount->AgentCommPer;
            $sls = $Customerdicount->SlsCommPer;
        }
        // dd($purchaseorderdetails);
        return view('prints.Deliveryorderprintseven', [
            'company'=>$company,
            'PONO'=> $PONO,
            'purchaseordermaster'=> $purchaseordermaster,
            'purchaseorderdetails'=> $purchaseorderdetails,
            'OrderDetails'=> $OrderDetails,
            'OrderMaster'=> $OrderMaster,
            'VenderSetup'=> $VenderSetup,
            'Fliptovsn'=> $Fliptovsn,
            'Eventinvoice'=> $Eventinvoice,
            'inv'=> $inv,
            'CustomerSetup'=> $CustomerSetup,
        ]);
    }
    public function deliveryorderprintnorway($PONO){
        $BranchCode= Auth::user()->BranchCode;
        $company = CompanySetup::where('BranchCode',$BranchCode)->first();
        $OrderDetails = OrderModel::where('PONO',$PONO)->where('BranchCode',$BranchCode)->get();
        $OrderMaster = OrderMasterModel::where('PONO',$PONO)->where('BranchCode',$BranchCode)->first();
        $purchaseordermaster =PurchaseOrderMaster::where('chargeno',$PONO)->first();
        $purchaseorderdetails =PurchaseOrderDetail::where('chargeno',$PONO)->get();
        $Fliptovsn =FlipTovsn::where('VSNNo',$OrderMaster->VSNNo)->first();
        $Eventinvoice = Events::where('EventNo',$OrderMaster->EventNo)->where('BranchCode',$BranchCode)->first();
        $VenderSetup =VenderSetup::where('VenderCode',$purchaseordermaster->VendorCode)->first();
        $Customerdicount = CustomerDiscount::where('CustomerCode', "$OrderMaster->CustomerCode")->where('DepartmentCode',"$OrderMaster->DepartmentCode")->first();
        $CustomerSetup = Customer::where('CustomerCode', $OrderMaster->CustomerCode)->first();

        if ($Customerdicount===null) {
            $avi = 0;
            $inv = 0;
            $cr = 0;
            $acp = 0;
            $sls = 0;
        } else {
            $avi = $Customerdicount->AVIRebatePer;
            $inv = $Customerdicount->InvDiscPer;
            $cr = $Customerdicount->CrNotePer;
            $acp = $Customerdicount->AgentCommPer;
            $sls = $Customerdicount->SlsCommPer;
        }
        // dd($purchaseorderdetails);
        return view('prints.Deliveryorderprintnorway', [
            'company'=>$company,
            'PONO'=> $PONO,
            'purchaseordermaster'=> $purchaseordermaster,
            'purchaseorderdetails'=> $purchaseorderdetails,
            'OrderDetails'=> $OrderDetails,
            'OrderMaster'=> $OrderMaster,
            'VenderSetup'=> $VenderSetup,
            'Fliptovsn'=> $Fliptovsn,
            'Eventinvoice'=> $Eventinvoice,
            'inv'=> $inv,
            'CustomerSetup'=> $CustomerSetup,
        ]);
    }
    public function Expensevoucherrptind(){
        return view('prints.Expensevoucherrpt', [

        ]);
    }
    public function Expensevoucherrpt($Voucherno){
        $BranchCode= Auth::user()->BranchCode;
        $company = CompanySetup::where('BranchCode',$BranchCode)->first();
        $ExpensePaymentVoucher = ExpensePaymentVoucher::where('VoucherNo',$Voucherno)->where('BranchCode',$BranchCode)->first();
        $ExpensePaymentVoucherfull = ExpensePaymentVoucher::where('VoucherNo',$Voucherno)->where('BranchCode',$BranchCode)->get();
        // $OrderDetails = OrderModel::where('PONO',$Voucherno)->where('BranchCode',$BranchCode)->get();
        // $purchaseordermaster =PurchaseOrderMaster::where('chargeno',$Voucherno)->first();
        // $purchaseorderdetails =PurchaseOrderDetail::where('chargeno',$Voucherno)->get();
        // $Fliptovsn =FlipTovsn::where('VSNNo',$OrderMaster->VSNNo)->first();
        // $Eventinvoice = Events::where('EventNo',$OrderMaster->EventNo)->where('BranchCode',$BranchCode)->first();
        // $VenderSetup =VenderSetup::where('VenderCode',$purchaseordermaster->VendorCode)->first();
        // $Customerdicount = CustomerDiscount::where('CustomerCode', "$OrderMaster->CustomerCode")->where('DepartmentCode',"$OrderMaster->DepartmentCode")->first();
        // $CustomerSetup = Customer::where('CustomerCode', $OrderMaster->CustomerCode)->first();

        // if ($Customerdicount===null) {
        //     $avi = 0;
        //     $inv = 0;
        //     $cr = 0;
        //     $acp = 0;
        //     $sls = 0;
        // } else {
        //     $avi = $Customerdicount->AVIRebatePer;
        //     $inv = $Customerdicount->InvDiscPer;
        //     $cr = $Customerdicount->CrNotePer;
        //     $acp = $Customerdicount->AgentCommPer;
        //     $sls = $Customerdicount->SlsCommPer;
        // }
        return view('prints.Expensevoucherrpt', [
            'BranchCode'=>$BranchCode,
            'company'=>$company,
            'Voucherno'=>$Voucherno,
            'ExpensePaymentVoucher'=>$ExpensePaymentVoucher,
            'ExpensePaymentVoucherfull'=>$ExpensePaymentVoucherfull,

        ]);
    }
    public function deliveryorderprintre($PONO){
        $BranchCode= Auth::user()->BranchCode;
        $company = CompanySetup::where('BranchCode',$BranchCode)->first();
        $OrderDetails = OrderModel::where('PONO',$PONO)->where('BranchCode',$BranchCode)->get();
        $OrderMaster = OrderMasterModel::where('PONO',$PONO)->where('BranchCode',$BranchCode)->first();
        $purchaseordermaster =PurchaseOrderMaster::where('chargeno',$PONO)->first();
        $purchaseorderdetails =PurchaseOrderDetail::where('chargeno',$PONO)->get();
        $Fliptovsn =FlipTovsn::where('VSNNo',$OrderMaster->VSNNo)->first();
        $Eventinvoice = Events::where('EventNo',$OrderMaster->EventNo)->where('BranchCode',$BranchCode)->first();
        $VenderSetup =VenderSetup::where('VenderCode',$purchaseordermaster->VendorCode)->first();
        $Customerdicount = CustomerDiscount::where('CustomerCode', "$OrderMaster->CustomerCode")->where('DepartmentCode',"$OrderMaster->DepartmentCode")->first();
        $CustomerSetup = Customer::where('CustomerCode', $OrderMaster->CustomerCode)->first();

        if ($Customerdicount===null) {
            $avi = 0;
            $inv = 0;
            $cr = 0;
            $acp = 0;
            $sls = 0;
        } else {
            $avi = $Customerdicount->AVIRebatePer;
            $inv = $Customerdicount->InvDiscPer;
            $cr = $Customerdicount->CrNotePer;
            $acp = $Customerdicount->AgentCommPer;
            $sls = $Customerdicount->SlsCommPer;
        }
        // dd($purchaseorderdetails);
        return view('prints.Deliveryorderprint', [
            'company'=>$company,
            'PONO'=> $PONO,
            'purchaseordermaster'=> $purchaseordermaster,
            'purchaseorderdetails'=> $purchaseorderdetails,
            'OrderDetails'=> $OrderDetails,
            'OrderMaster'=> $OrderMaster,
            'VenderSetup'=> $VenderSetup,
            'Fliptovsn'=> $Fliptovsn,
            'Eventinvoice'=> $Eventinvoice,
            'inv'=> $inv,
            'CustomerSetup'=> $CustomerSetup,
        ]);
    }
    public function FinalInvoicePrint($PONO){
        $BranchCode= Auth::user()->BranchCode;
        $company = CompanySetup::where('BranchCode',$BranchCode)->first();
        $OrderDetails = OrderModel::where('PONO',$PONO)->where('BranchCode',$BranchCode)->get();
        $OrderMaster = OrderMasterModel::where('PONO',$PONO)->where('BranchCode',$BranchCode)->first();
        $purchaseordermaster =PurchaseOrderMaster::where('chargeno',$PONO)->first();
        $purchaseorderdetails =PurchaseOrderDetail::where('chargeno',$PONO)->get();
        $Fliptovsn =FlipTovsn::where('VSNNo',$OrderMaster->VSNNo)->first();
        $Eventinvoice = Events::where('EventNo',$OrderMaster->EventNo)->where('BranchCode',$BranchCode)->first();
        $VenderSetup =VenderSetup::where('VenderCode',$purchaseordermaster->VendorCode)->first();
        if($OrderMaster->CustomerCode == 0){
            $CustomerName = $OrderMaster->CustomerName;
        $customerdata = Customer::where('CustomerName',$CustomerName)->where('BranchCode',$BranchCode)->first();
        $CustomerCode = $customerdata->CustomerCode;
        $DepartmentName = $purchaseordermaster->DepartmentName;
        $TypeSetup = Typesetup::where('TypeName',$DepartmentName)->first();
        $DepartmentCode = $TypeSetup->TypeCode;
        }else{
            $CustomerCode = $OrderMaster->CustomerCode;
            $DepartmentCode = $OrderMaster->DepartmentCode;
        }
        $Customerdicount = CustomerDiscount::where('CustomerCode', "$CustomerCode")->where('DepartmentCode',"$DepartmentCode")->first();
        // dd($Customerdicount);

        if ($Customerdicount===null) {
            $avi = 0;
            $inv = 0;
            $cr = 0;
            $acp = 0;
            $sls = 0;
        } else {
            $avi = $Customerdicount->AVIRebatePer;
            $inv = $Customerdicount->InvDiscPer;
            $cr = $Customerdicount->CrNotePer;
            $acp = $Customerdicount->AgentCommPer;
            $sls = $Customerdicount->SlsCommPer;
        }

        // dd($OrderDetails);
        return view('prints.FinalInvoicePrint', [
            'company'=>$company,
            'PONO'=> $PONO,
            'purchaseordermaster'=> $purchaseordermaster,
            'purchaseorderdetails'=> $purchaseorderdetails,
            'OrderDetails'=> $OrderDetails,
            'OrderMaster'=> $OrderMaster,
            'VenderSetup'=> $VenderSetup,
            'Fliptovsn'=> $Fliptovsn,
            'Eventinvoice'=> $Eventinvoice,
            'inv'=> $inv,
        ]);
    }



    public function CurrentStockPositionprint(Request $request){
        $BranchCode= Auth::user()->BranchCode;
        $MWorkUser = Auth::user()->UserName;

        $company = CompanySetup::where('BranchCode',$BranchCode)->first();
        $OptStockQty =$request->query('OptStockQty');
        $MRep =$request->query('MRep');
        $Date =$request->query('Date');
        if($OptStockQty == true){
            $table = TempInventoryReport::where('WorkUser',$MWorkUser)->where('BranchCode',$BranchCode)->where('StockQty','>',0)->get();
        }else{

            $table = TempInventoryReport::where('WorkUser',$MWorkUser)->where('BranchCode',$BranchCode)->get();
        }
// info($table);
// dd()


        return view('prints.'.$MRep, [
            'company'=>$company,
            'table'=>$table,
            'Date'=>$Date,
            'MWorkUser'=>$MWorkUser,

        ]);
    }

    public function TrialBalanceprint(Request $request){
        $MWorkUser = Auth::user()->UserName;
        $BranchCode= Auth::user()->BranchCode;
        $company = CompanySetup::where('BranchCode',$BranchCode)->first();
        $table = DB::table('TempTrialBalance')->where('WorkUser',$MWorkUser)->where('BranchCode',$BranchCode)->orderBy('ActCode')->get();
        $DateTo = $request->DateTo;
// dd($table);
        return view('prints.TrialBalanceprint', [
            'company'=>$company,
            'MWorkUser'=>$MWorkUser,
            'BranchCode'=>$BranchCode,
            'Date'=>$DateTo,
            'table'=>$table,


        ]);
    }

    public function RFQ_C_Print(Request $request){
        $Quote = $request->MInvNo;
        $Events = $request->Qry2;
        $BranchCode= Auth::user()->BranchCode;
        $MWorkUser = Auth::user()->UserName;

        $company = CompanySetup::where('BranchCode',$BranchCode)->first();

        // dd($Quote);
        // dd($Events);
        $BranchCode =config('app.MBranchCode');
        if ($Quote) {
            $QuoteMaster = Quote::whereRaw($Quote)->get();
        } else {
            $QuoteMaster = collect(); // Assign an empty collection if there are no quotes
        }

        if($Events){
            $EventInvoice = Events::whereRaw($Events)->get();
        }else{
            $EventInvoice = collect();
        }



        return view('prints.RFQCustomerSummrayprint', [
            'BranchCode'=>$BranchCode,
            'company'=>$company,
            'table'=>$QuoteMaster,
            'EventInvoice'=>$EventInvoice,
            'MWorkUser'=>$MWorkUser,

        ]);
    }
    public function RFQVesselSummrayprint(Request $request){
        $MWorkUser = Auth::user()->UserName;
        $BranchCode= Auth::user()->BranchCode;
        $company = CompanySetup::where('BranchCode',$BranchCode)->first();
        $table = DB::table('TempNewRFQSummary')->where('WorkUser',$MWorkUser)->where('BranchCode',$BranchCode)->get();
        $DateTo = $request->DateTo;
        return view('prints.RFQVesselSummrayprint', [
            'company'=>$company,
            'MWorkUser'=>$MWorkUser,
            'BranchCode'=>$BranchCode,
            'Date'=>$DateTo,
            'table'=>$table,


        ]);
    }


public function DailyQuotationReportprint(Request $request)
{


    $MWorkUser = Auth::user()->UserName;
    $BranchCode= Auth::user()->BranchCode;
    $company = CompanySetup::where('BranchCode', $BranchCode)->first();
    $dateTo = $request->input('TxtDateTo');
    $dateFrom = $request->input('TxtDateFrom');
    $Qry = $request->input('Qry');


    $query = DB::table('QuoteMaster')
        ->select(
            'QuoteMaster.CustomerName',
            'QuoteMaster.EnteredLineQuote',
            'QuoteMaster.EstLineQuote',
            'QuoteMaster.WorkUser',
            'QuoteMaster.QDate',
            'QuoteMaster.QuoteNo',
            'QuoteMaster.EventNo',
            'QuoteMaster.FlipOrderNo',
            'QuoteMaster.VSNNo',
            'QuoteMaster.VesselName',
            'QuoteMaster.CustomerRefNo',
            'QuoteMaster.DepartmentName',
            'EventInvoice.ShippingPort',
            'EventInvoice.GodownName',
            'QuoteMaster.ValueAmount',
            'OrderMaster.ExtAmount',
        )
        ->join('EventInvoice', 'QuoteMaster.EventNo', '=', 'EventInvoice.EventNo')
        ->join('PurchaseOrderMaster', 'QuoteMaster.QuoteNo', '=', 'PurchaseOrderMaster.QuoteNo')
        ->join('OrderMaster', 'QuoteMaster.QuoteNo', '=', 'OrderMaster.QuoteNo')
        ->leftJoin('DepartmentSetup', 'QuoteMaster.DepartmentCode', '=', 'DepartmentSetup.DepartmentCode')
        ->leftJoin('GodownSetup', 'QuoteMaster.GodownCode', '=', 'GodownSetup.GodownCode')
        ->leftJoin('CustomerSetup', 'QuoteMaster.CustomerCode', '=', 'CustomerSetup.CustomerCode')
        ->leftJoin('VesselSetup', 'EventInvoice.IMONo', '=', 'VesselSetup.IMONo')
        ->whereRaw($Qry)
        ->get();

        // dd($query);


    return view('prints.DailyQuotationrepprint', [
        'company' => $company,
        'MWorkUser' => $MWorkUser,
        'BranchCode' => $BranchCode,
        'DateTo' => $dateTo,
        'dateFrom' => $dateFrom,
        'Table' => $query,
    ]);
}

public function PurchaseReturnprint(Request $request)
{


    $MWorkUser = Auth::user()->UserName;
    $BranchCode= Auth::user()->BranchCode;
    $company = CompanySetup::where('BranchCode', $BranchCode)->first();
    $dateTo = $request->input('dateto');
    $dateFrom = $request->input('datefrom');
    $Qry = $request->input('Qry');
    $Table = DB::table('PurchaseReturnMaster')->where('BranchCode',$BranchCode)->whereRaw($Qry)->get();
// dd($Table);
    return view('prints.PurchaseReturnprint', [
        'company' => $company,
        'MWorkUser' => $MWorkUser,
        'BranchCode' => $BranchCode,
        'DateTo' => $dateTo,
        'dateFrom' => $dateFrom,
        'Table' => $Table,
    ]);
}
public function userPerformancePrint(Request $request)
{


    $MWorkUser = Auth::user()->UserName;
    $BranchCode= Auth::user()->BranchCode;
    $company = CompanySetup::where('BranchCode', $BranchCode)->first();
    $dateTo = $request->input('dateto');
    $dateFrom = $request->input('datefrom');
    $ReportType = $request->input('ReportType');
    $Table = TempUserPerformance::get();

    return view('prints.UserPerformancePrint', [
        'company' => $company,
        'MWorkUser' => $MWorkUser,
        'BranchCode' => $BranchCode,
        'DateTo' => $dateTo,
        'dateFrom' => $dateFrom,
        'ReportType' => $ReportType,
        'Table' => $Table,
    ]);
}

public function userPerformanceSummaryPrint(Request $request)
{


    $MWorkUser = Auth::user()->UserName;
    $BranchCode= Auth::user()->BranchCode;
    $company = CompanySetup::where('BranchCode', $BranchCode)->first();
    $dateTo = $request->input('dateto');
    $dateFrom = $request->input('datefrom');
    $ReportType = $request->input('ReportType');
    $Table = TempUserPerformance::get();

    return view('prints.UserPerformanceSummaryPrint', [
        'company' => $company,
        'MWorkUser' => $MWorkUser,
        'BranchCode' => $BranchCode,
        'DateTo' => $dateTo,
        'dateFrom' => $dateFrom,
        'ReportType' => $ReportType,
        'Table' => $Table,

    ]);
}

public function OutstandingReportInvoiceWisePrint(Request $request){

    $CHKBANKDTL = $request->CHKBANKDTL;
    $DateFrom = $request->DateFrom;
    $DateTo = $request->DateTo;
    $BranchCode= Auth::user()->BranchCode;
    $MWorkUser = Auth::user()->UserName;

    $company = CompanySetup::where('BranchCode',$BranchCode)->first();
    $BranchCode =config('app.MBranchCode');
    $MBANKDETAL='';

    if($CHKBANKDTL == 'true'){
        $MBANKDETAL='Y';
    }else{
        $MBANKDETAL='N';

    }
    $Table =  DB::table('TempOutstandingReportInvWise')->where('WorkUser',$MWorkUser)->where('BranchCode',$BranchCode)->get();

    // dd($Table);
    // dd($Events);






    return view('prints.OutstandingReportInvoiceWisePrint', [
        'BranchCode'=>$BranchCode,
        'company'=>$company,
        'table'=>$Table,
        'MBANKDETAL'=>$MBANKDETAL,
        'MWorkUser'=>$MWorkUser,
        'DateFrom'=>$DateFrom,
        'DateTo'=>$DateTo,

    ]);
}


public function OutstandingReportInvoiceWiseAlertPrint(Request $request){

    $CHKBANKDTL = $request->CHKBANKDTL;
    $DateFrom = $request->DateFrom;
    $DateTo = $request->DateTo;
    $BranchCode= Auth::user()->BranchCode;
    $MWorkUser = Auth::user()->UserName;

    $company = CompanySetup::where('BranchCode',$BranchCode)->first();
    $BranchCode =config('app.MBranchCode');
    $MBANKDETAL='';

    if($CHKBANKDTL == 'true'){
        $MBANKDETAL='Y';
    }else{
        $MBANKDETAL='N';

    }
    $Table =  DB::table('TempOutstandingReportInvWise')->where('WorkUser',$MWorkUser)->where('BranchCode',$BranchCode)->get();

    // dd($Table);
    // dd($Events);






    return view('prints.OutstandingReportInvoiceWiseAlertPrint', [
        'BranchCode'=>$BranchCode,
        'company'=>$company,
        'table'=>$Table,
        'MBANKDETAL'=>$MBANKDETAL,
        'MWorkUser'=>$MWorkUser,
        'DateFrom'=>$DateFrom,
        'DateTo'=>$DateTo,

    ]);
}
public function profit_loss_comparisionprint(Request $request){

    $CHKBANKDTL = $request->CHKBANKDTL;
    $DateFrom = $request->DateFrom;
    $DateTo = $request->DateTo;
    $BranchCode= Auth::user()->BranchCode;
    $MWorkUser = Auth::user()->UserName;

    $company = CompanySetup::where('BranchCode',$BranchCode)->first();
    $BranchCode =config('app.MBranchCode');
    $MBANKDETAL='';

    if($CHKBANKDTL == 'true'){
        $MBANKDETAL='Y';
    }else{
        $MBANKDETAL='N';

    }
    $Table =  DB::table('TempOutstandingReportInvWise')->where('WorkUser',$MWorkUser)->where('BranchCode',$BranchCode)->get();

    // dd($Table);
    // dd($Events);






    return view('prints.profit_loss_comparisionprint', [
        'BranchCode'=>$BranchCode,
        'company'=>$company,
        'table'=>$Table,
        'MBANKDETAL'=>$MBANKDETAL,
        'MWorkUser'=>$MWorkUser,
        'DateFrom'=>$DateFrom,
        'DateTo'=>$DateTo,

    ]);
}

public function profit_loss_2month_comparisionprint(Request $request){

    $CHKBANKDTL = $request->CHKBANKDTL;
    $DateFrom = $request->DateFrom;
    $DateTo = $request->DateTo;
    $BranchCode= Auth::user()->BranchCode;
    $MWorkUser = Auth::user()->UserName;

    $company = CompanySetup::where('BranchCode',$BranchCode)->first();
    $BranchCode =config('app.MBranchCode');
    $MBANKDETAL='';

    if($CHKBANKDTL == 'true'){
        $MBANKDETAL='Y';
    }else{
        $MBANKDETAL='N';

    }
    $Table =  DB::table('TempOutstandingReportInvWise')->where('WorkUser',$MWorkUser)->where('BranchCode',$BranchCode)->get();



    return view('prints.profit_loss_2month_comparisionprint', [
        'BranchCode'=>$BranchCode,
        'company'=>$company,
        'table'=>$Table,
        'MBANKDETAL'=>$MBANKDETAL,
        'MWorkUser'=>$MWorkUser,
        'DateFrom'=>$DateFrom,
        'DateTo'=>$DateTo,

    ]);
}

public function Agingprint(Request $request){

    $CHKBANKDTL = $request->CHKBANKDTL;
    $DateFrom = $request->DateFrom;
    $DateTo = $request->DateTo;
    $BranchCode= Auth::user()->BranchCode;
    $MWorkUser = Auth::user()->UserName;

    $company = CompanySetup::where('BranchCode',$BranchCode)->first();
    $BranchCode =config('app.MBranchCode');
    $MBANKDETAL='';

    if($CHKBANKDTL == 'true'){
        $MBANKDETAL='Y';
    }else{
        $MBANKDETAL='N';

    }
    $Table =  DB::table('TempOutstandingReportInvWise')->where('WorkUser',$MWorkUser)->where('BranchCode',$BranchCode)->get();


    return view('prints.Agingprint', [
        'BranchCode'=>$BranchCode,
        'company'=>$company,
        'table'=>$Table,
        'MBANKDETAL'=>$MBANKDETAL,
        'MWorkUser'=>$MWorkUser,
        'DateFrom'=>$DateFrom,
        'DateTo'=>$DateTo,

    ]);
}
public function BankReconciliationPrint(Request $request){

    $CHKBANKDTL = $request->CHKBANKDTL;
    $DateFrom = $request->DateFrom;
    $DateTo = $request->DateTo;
    $BranchCode= Auth::user()->BranchCode;
    $MWorkUser = Auth::user()->UserName;

    $company = CompanySetup::where('BranchCode',$BranchCode)->first();
    $BranchCode =config('app.MBranchCode');
    $MBANKDETAL='';

    if($CHKBANKDTL == 'true'){
        $MBANKDETAL='Y';
    }else{
        $MBANKDETAL='N';

    }
    $Table =  DB::table('TempOutstandingReportInvWise')->where('WorkUser',$MWorkUser)->where('BranchCode',$BranchCode)->get();


    return view('prints.BankReconciliationPrint', [
        'BranchCode'=>$BranchCode,
        'company'=>$company,
        'table'=>$Table,
        'MBANKDETAL'=>$MBANKDETAL,
        'MWorkUser'=>$MWorkUser,
        'DateFrom'=>$DateFrom,
        'DateTo'=>$DateTo,

    ]);
}
public function VendorProductListprint(Request $request){
    $BranchCode =config('app.MBranchCode');
    $VenderCode = $request->VenderCode;
    $PortCode = $request->PortCode;
    $Vender = DB::table('VenderSetup')->where('VenderCode',$VenderCode)->where('BranchCode',$BranchCode)->first();

    $VenderName= '';
    if($Vender){
        $VenderName = $Vender->VenderName;
    }
    $Table = DB::table('VenderProductList')->where('VenderCode',$VenderCode)->where('PortCode',$PortCode)->where('BranchCode',$BranchCode)->get();
    $company = CompanySetup::where('BranchCode',$BranchCode)->first();

    return view('prints.VendorProductListprint', [
        'company'=>$company,
        'BranchCode'=>$BranchCode,
        'VenderName'=>$VenderName,
        'Table'=>$Table,

    ]);
}

public function AgingReportPrint(){
    $BranchCode =config('app.MBranchCode');
    $MWorkUser = Auth::user()->UserName;

    // $Table = temp2::where('WorkUser',$MWorkUser)->where('BranchCode',$BranchCode)->get();
    $Table = temp2::where('WorkUser',$MWorkUser)->where('Credit','>',0)->where('BranchCode',$BranchCode)->get();
    $company = CompanySetup::where('BranchCode',$BranchCode)->first();
    // dd($Table);
    return view('prints.AgingReportPrint', [
        'company'=>$company,
        'BranchCode'=>$BranchCode,
        'Table'=>$Table,
        'MWorkUser'=>$MWorkUser,

    ]);
}


}
