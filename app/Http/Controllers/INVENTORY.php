<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JournalVoucher;
use App\Models\InvoiceDetail;
use App\Models\OrderMasterModel;
use App\Models\OrderModel;
use App\Models\InvoiceMaster;
use App\Models\VendorProductListAvgRate;
use App\Models\VenderProductList;
use App\Models\TempInventoryReport;
use App\Models\StLedger;
use App\Models\Trans;
use App\Models\ItemSetup;
use App\Models\VenderSetup;
use App\Models\CompanySetup;
use App\Models\GodownSetup;
use App\Models\Typesetup;
use App\Models\CategoryModel;
use App\Models\ShipingPortSetup;
use App\Models\FixAccountSetup;
use App\Models\CurrencyModel;
use App\Models\BranchSetup;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class INVENTORY extends Controller
{
  
    public function OpeningStock(){
        $MBranchCode = Auth::user()->BranchCode;
        $PVendorcode= 756;
        $BranchCode =Auth::user()->BranchCode;
        $Currency = CurrencyModel::select('Currency')->where('BranchCode', $BranchCode)->orderBy('Currency')->get();
        $FixAccountSetup = FixAccountSetup::where('BranchCode', $BranchCode)->first();
        // $Voucher = DB::table('InvoiceDetail')->select('InvoiceNo')->where('BranchCode',$MBranchCode)->orderBy('InvoiceNo')->get();
        $Voucher =InvoiceDetail::select('InvoiceNo')
    ->distinct()
    ->where('BranchCode', $MBranchCode)
    ->orderBy('InvoiceNo')
    ->get();

        // dd($Voucher);
        $firstVoucherNo = InvoiceDetail::where('BranchCode',$MBranchCode)->orderBy('InvoiceNo', 'asc')->first();
    $lastVoucherNo = InvoiceDetail::where('BranchCode',$MBranchCode)->orderBy('InvoiceNo', 'desc')->first();
    if(!$firstVoucherNo){
        $firstVoucherNo=0;
    }else{
        $firstVoucherNo = $firstVoucherNo->InvoiceNo;
    }
    if(!$lastVoucherNo){
        $lastVoucherNo=0;
    }else{
        $lastVoucherNo = $lastVoucherNo->InvoiceNo;

    }


        return view('inventory.OpeningStock', [

            'MBranchCode' => $MBranchCode,
            'Currency' => $Currency,
            'FixAccountSetup' => $FixAccountSetup,
            'firstVoucherNo' => $firstVoucherNo,
            'lastVoucherNo' => $lastVoucherNo,
            'Voucher' => $Voucher,
        ]);
    }

    public function searchOpeningStock(Request $request){
        $PVendorcode= 756;
        $BranchCode =Auth::user()->BranchCode;
       $voucherNo = $request->input('BillNo');
       $pono = $request->input('pono');
       $firstVoucherNo = InvoiceDetail::where('BranchCode',$BranchCode)->orderBy('InvoiceNo', 'asc')->first();
       $lastVoucherNo = InvoiceDetail::where('BranchCode',$BranchCode)->orderBy('InvoiceNo', 'desc')->first();
       if(!$firstVoucherNo){
           $firstVoucherNo=0;
       }else{
           $firstVoucherNo = $firstVoucherNo->InvoiceNo;
       }
       if(!$lastVoucherNo){
           $lastVoucherNo=0;
       }else{
           $lastVoucherNo = $lastVoucherNo->InvoiceNo;

       }
    $results = InvoiceDetail::where('InvoiceNo', $voucherNo)->where('BranchCode', $BranchCode)->orderBy('ID', 'asc')->get();


    // info($voucherNo);
    // info($BranchCode);
    info($results);

       return response()->json([
        'results' =>$results,
        'firstVoucherNo' =>$firstVoucherNo,
        'lastVoucherNo' =>$lastVoucherNo,

    ]);

    }
    public function StockPurchaseOrder(){
        $MBranchCode = Auth::user()->BranchCode;
        $PVendorcode= 756;
        $BranchCode =Auth::user()->BranchCode;
        $Currency = CurrencyModel::select('Currency')->where('BranchCode', $BranchCode)->orderBy('Currency')->get();
        $FixAccountSetup = FixAccountSetup::where('BranchCode', $BranchCode)->first();
        $GodownSetup = GodownSetup::where('BranchCode', $BranchCode)->orderBy('GodownCode')->get();
        // $Voucher = DB::table('InvoiceDetail')->select('InvoiceNo')->where('BranchCode',$MBranchCode)->orderBy('InvoiceNo')->get();
        $Voucher =DB::table('poinventorymaster')
    ->select('InvoiceNo')
    ->distinct()
    ->where('BranchCode', $MBranchCode)
    ->orderBy('InvoiceNo')
    ->get();

        // dd($Voucher);
        $firstVoucherNo = DB::table('poinventorymaster')->where('BranchCode',$MBranchCode)->orderBy('InvoiceNo', 'asc')->first();
    $lastVoucherNo = DB::table('poinventorymaster')->where('BranchCode',$MBranchCode)->orderBy('InvoiceNo', 'desc')->first();
    if($firstVoucherNo){
        $firstVoucherNo = $firstVoucherNo->InvoiceNo;
    }
    if($lastVoucherNo){
        $lastVoucherNo = $lastVoucherNo->InvoiceNo;
    }


        return view('inventory.StockPurchaseOrder', [

            'MBranchCode' => $MBranchCode,
            'GodownSetup' => $GodownSetup,
            'Currency' => $Currency,
            'FixAccountSetup' => $FixAccountSetup,
            'firstVoucherNo' => $firstVoucherNo,
            'lastVoucherNo' => $lastVoucherNo,
            'Voucher' => $Voucher,
        ]);
    }

    public function searchStockPurchase(Request $request){
        $PVendorcode= 756;
        $BranchCode =Auth::user()->BranchCode;
       $voucherNo = $request->input('BillNo');
       $pono = $request->input('pono');
    $firstVoucherNo = DB::table('poinventorymaster')->where('BranchCode',$BranchCode)->orderBy('InvoiceNo', 'asc')->first()->InvoiceNo;
    $lastVoucherNo = DB::table('poinventorymaster')->where('BranchCode',$BranchCode)->orderBy('InvoiceNo', 'desc')->first()->InvoiceNo;
    $Master = DB::table('poinventorymaster')->where('InvoiceNo', $voucherNo)->where('BranchCode', $BranchCode)->where('Type','PURC')->first();
    $results = DB::table('poinventorydetail')->where('InvoiceNo', $voucherNo)->where('BranchCode', $BranchCode)->where('Type','PURC')->orderBy('ID', 'asc')->get();
    $inv = InvoiceMaster::select('InvoiceNo')->where('PONo', $voucherNo)->where('BranchCode', $BranchCode)->where('Type','PURC')->orderBy('ID', 'asc')->first();


    // info($voucherNo);
    // info($inv);
    info($results);

       return response()->json([
        'Master' =>$Master,
        'results' =>$results,
        'inv' =>$inv,
        'firstVoucherNo' =>$firstVoucherNo,
        'lastVoucherNo' =>$lastVoucherNo,

    ]);

    }

    public function serchVenProList(Request $request){
        $PVendorcode= 756;
        $MBranchCode =Auth::user()->BranchCode;
       $MItemCode = $request->input('MItemCode');
       $TxtGodownCode = $request->input('TxtGodownCode');
    //    $pono = $request->input('pono');
    // $firstVoucherNo = DB::table('POInventoryMaster')->where('BranchCode',$BranchCode)->orderBy('InvoiceNo', 'asc')->first()->InvoiceNo;
    // $lastVoucherNo = DB::table('POInventoryMaster')->where('BranchCode',$BranchCode)->orderBy('InvoiceNo', 'desc')->first()->InvoiceNo;
    // $Master = DB::table('POInventoryMaster')->where('InvoiceNo', $voucherNo)->where('BranchCode', $BranchCode)->where('Type','PURC')->first();
    $results = DB::table('qryvenderproductlist')->where('ChkInactive','=',0,'or','ChkInactive','is','Null')->where('VenderCode',$PVendorcode)->where('ItemCode', $MItemCode)->where('BranchCode', $MBranchCode)->first();
    // $inv = DB::table('InvoiceDetail')->select('TradePrice')->where('GodownCode', $TxtGodownCode)->where('ItemCode',$MItemCode)->where('BranchCode', $BranchCode)->where('Type','PURC')->orderBy('Date', 'desc')->first();
    $inv = InvoiceDetail::select('TradePrice')
    ->where('GodownCode', '=', $TxtGodownCode)
    ->where('ItemCode', '=', $MItemCode)
    ->where('BranchCode', '=', $MBranchCode)
    ->where('Type', '=', 'PURC')
    ->orderBy('Date', 'desc')
    ->limit(1)
    ->value('TradePrice');

    // info($voucherNo);
    // info($inv);
    // info($results);

       return response()->json([
        'results' =>$results,
        'inv' =>$inv,

    ]);

    }
    public function stpuordelete(Request $request){
        $PVendorcode= 756;
        $MBranchCode =Auth::user()->BranchCode;
       $TxtInvoiceNo = $request->input('TxtVoucherNo');
       $status= 'notyet';
       info($TxtInvoiceNo);
      // Delete from POInventoryDetail table
$detailDeleted = DB::table('poinventorydetail')
->where('InvoiceNo', '=', $TxtInvoiceNo)
->where('BranchCode', '=', $MBranchCode)
->where('Type', '=', 'PURC')
->delete();

// Delete from POInventoryMaster table if POInventoryDetail delete was successful
$status = '';
if ($detailDeleted) {
DB::table('poinventorymaster')
    ->where('InvoiceNo', '=', $TxtInvoiceNo)
    ->where('BranchCode', '=', $MBranchCode)
    ->where('Type', '=', 'PURC')
    ->delete();
$status = 'deleted';
} else {
$status = 'not deleted';
}



       return response()->json([
        'status' =>$status,

    ]);

    }
    public function StockPOPurchased(){
        $MBranchCode = Auth::user()->BranchCode;
        $PVendorcode= 756;
        $BranchCode =Auth::user()->BranchCode;
        $Currency = CurrencyModel::select('Currency')->where('BranchCode', $BranchCode)->orderBy('Currency')->get();
        $FixAccountSetup = FixAccountSetup::where('BranchCode', $BranchCode)->first();
        $GodownSetup = GodownSetup::where('BranchCode', $BranchCode)->orderBy('GodownCode')->get();
        // $Voucher = DB::table('InvoiceDetail')->select('InvoiceNo')->where('BranchCode',$MBranchCode)->orderBy('InvoiceNo')->get();
        $Voucher =InvoiceMaster::select('InvoiceNo')
    ->distinct()
    ->where('BranchCode', $MBranchCode)
    ->where('Type', 'PURC')
    ->orderBy('InvoiceNo')
    ->get();

        // dd($Voucher);
        $firstVoucherNo = InvoiceMaster::where('BranchCode',$MBranchCode)->where('Type','PURC')->orderBy('InvoiceNo', 'asc')->first()->InvoiceNo;
    $lastVoucherNo = InvoiceMaster::where('BranchCode',$MBranchCode)->where('Type','PURC')->orderBy('InvoiceNo', 'desc')->first()->InvoiceNo;
    if(!$firstVoucherNo){
        $firstVoucherNo=0;
    }
    if(!$lastVoucherNo){
        $lastVoucherNo=0;
    }


        return view('inventory.StockPOPurchase', [

            'MBranchCode' => $MBranchCode,
            'GodownSetup' => $GodownSetup,
            'Currency' => $Currency,
            'FixAccountSetup' => $FixAccountSetup,
            'firstVoucherNo' => $firstVoucherNo,
            'lastVoucherNo' => $lastVoucherNo,
            'Voucher' => $Voucher,
        ]);
    }

    public function searchStockPOPurchased(Request $request){
        $PVendorcode= 756;
        $BranchCode =Auth::user()->BranchCode;
       $voucherNo = $request->input('BillNo');
       $pono = $request->input('pono');
    $firstVoucherNo = InvoiceMaster::where('BranchCode',$BranchCode)->where('Type','PURC')->orderBy('InvoiceNo', 'asc')->first()->InvoiceNo;
    $lastVoucherNo = InvoiceMaster::where('BranchCode',$BranchCode)->where('Type','PURC')->orderBy('InvoiceNo', 'desc')->first()->InvoiceNo;
    $Master = InvoiceMaster::where('InvoiceNo', $voucherNo)->where('BranchCode', $BranchCode)->where('Type','PURC')->first();
    $results = InvoiceDetail::where('InvoiceNo', $voucherNo)->where('BranchCode', $BranchCode)->where('Type','PURC')->orderBy('ID', 'asc')->get();
    $PaymentVoucher = DB::table('paymentvoucher')
    ->select('VoucherNo', 'VoucherDate', DB::raw('SUM(Amount) as MPayAmount'))
    ->where('POType', 'StockPO')
    ->where('ClientOrderNo', (int) $voucherNo)
    ->where('BranchCode', (int) $BranchCode)
    ->groupBy('VoucherNo', 'VoucherDate')
    ->first();


    // info($voucherNo);
    // info($inv);
    info($results);

       return response()->json([
        'Master' =>$Master,
        'results' =>$results,
        'PaymentVoucher' =>$PaymentVoucher,
        'firstVoucherNo' =>$firstVoucherNo,
        'lastVoucherNo' =>$lastVoucherNo,

    ]);

    }


    public function StockPOPurchaseddelete(Request $request){
        $PVendorcode= 756;
        $MBranchCode =Auth::user()->BranchCode;
       $TxtInvoiceNo = $request->input('TxtVoucherNo');
       $status= 'notyet';
       info($TxtInvoiceNo);
      // Delete from POInventoryDetail table
$detailDeleted = InvoiceDetail::where('InvoiceNo', '=', $TxtInvoiceNo)
->where('BranchCode', '=', $MBranchCode)
->where('Type', '=', 'PURC')
->delete();

// Delete from POInventoryMaster table if POInventoryDetail delete was successful
$status = '';
if ($detailDeleted) {
$masterdelete = InvoiceMaster::where('InvoiceNo', '=', $TxtInvoiceNo)
    ->where('BranchCode', '=', $MBranchCode)
    ->where('Type', '=', 'PURC')
    ->delete();
    if($masterdelete){
        Trans::where('Vnon', '=', $TxtInvoiceNo)
    ->where('BranchCode', '=', $MBranchCode)
    ->where('Vnoc', '=', 'PURC')
    ->delete();
    }
$status = 'deleted';
} else {
$status = 'not deleted';
}



       return response()->json([
        'status' =>$status,

    ]);

    }
    public function PullStock(){
        $MBranchCode = Auth::user()->BranchCode;
        $PVendorcode= 756;
        $BranchCode =Auth::user()->BranchCode;
        $Currency = CurrencyModel::select('Currency')->where('BranchCode', $BranchCode)->orderBy('Currency')->get();
        $FixAccountSetup = FixAccountSetup::where('BranchCode', $BranchCode)->first();
        $GodownSetup = GodownSetup::where('BranchCode', $BranchCode)->orderBy('GodownCode')->get();
        // $Voucher = DB::table('InvoiceDetail')->select('InvoiceNo')->where('BranchCode',$MBranchCode)->orderBy('InvoiceNo')->get();
        $Voucher =OrderMasterModel::select('PONo')->where('BranchCode', $MBranchCode)->orderBy('PONo')->get();

        // dd($FixAccountSetup);
        $firstVoucherNo = OrderMasterModel::where('BranchCode',$MBranchCode)->orderBy('PONo', 'asc')->first();
    $lastVoucherNo = OrderMasterModel::where('BranchCode',$MBranchCode)->orderBy('PONo', 'desc')->first();
    // dd($firstVoucherNo);
    if(!$firstVoucherNo){
        $firstVoucherNo=0;
    }else{
        $firstVoucherNo=$firstVoucherNo->PONo;

    }

    if(!$lastVoucherNo){
        $lastVoucherNo=0;
    }else{
        $lastVoucherNo=$lastVoucherNo->PONo;

    }


        return view('inventory.PullStock', [

            'MBranchCode' => $MBranchCode,
            'GodownSetup' => $GodownSetup,
            'Currency' => $Currency,
            'FixAccountSetup' => $FixAccountSetup,
            'firstVoucherNo' => $firstVoucherNo,
            'lastVoucherNo' => $lastVoucherNo,
            'Voucher' => $Voucher,
        ]);
    }

    public function getmoredata(Request $request){
        // $PVendorCode = $request->input('vendor_code');
    $MItemCode = $request->input('item_code');
    // $BranchCode = $request->input('branch_code');
    $PVendorCode= 756;
    $BranchCode =Auth::user()->BranchCode;
info($MItemCode);
    $VenderProductList = DB::table('venderproductlist')
        ->select('StockLocation', 'ChkStromme')
        ->where('VenderCode', $PVendorCode)
        ->where('ItemCode', $MItemCode)
        ->where('BranchCode', $BranchCode)
        ->first();

    return response()->json($VenderProductList);
    }
    public function searchPullStock(Request $request){
        $PVendorCode= 756;
        $BranchCode =Auth::user()->BranchCode;
       $voucherNo = $request->input('BillNo');
       $TxtVSNNo = $request->input('TxtVSNNo');
    $firstVoucherNo = OrderMasterModel::where('BranchCode',$BranchCode)->orderBy('PONo', 'asc')->first();
    $lastVoucherNo = OrderMasterModel::where('BranchCode',$BranchCode)->orderBy('PONo', 'desc')->first();
    $Master = OrderMasterModel::where('PONo', $voucherNo)->where('BranchCode', $BranchCode)->first();
    $results = DB::table('orderdetail')->where('PONO', $voucherNo)->where('BranchCode', $BranchCode)->where('VendorCode',$PVendorCode)->orderBy('ID', 'asc')->get();
    // $VenderProductList = DB::table('VenderProductList')->select('StockLocation','ChkStromme')->where('VenderCode',$PVendorCode)->where('ItemCode',$MItemCode)->where('BranchCode',$BranchCode)->first();
    $FlipToVSN = DB::table('fliptovsn')
    ->select('IMONo','CustomerName','VesselName','CustomerCode','GodownCode')
    ->where('VSNNo', $TxtVSNNo)
    ->where('BranchCode', (int) $BranchCode)
    ->first();
    if(!$firstVoucherNo){
        $firstVoucherNo=0;
    }else{
        $firstVoucherNo=$firstVoucherNo->PONo;

    }

    if(!$lastVoucherNo){
        $lastVoucherNo=0;
    }else{
        $lastVoucherNo=$lastVoucherNo->PONo;

    }

    // info($voucherNo);
    // info($inv);
    info($results);

       return response()->json([
        'Master' =>$Master,
        'results' =>$results,
        'FlipToVSN' =>$FlipToVSN,
        'firstVoucherNo' =>$firstVoucherNo,
        'lastVoucherNo' =>$lastVoucherNo,

    ]);

    }


    public function PullStocksave(Request $request){
        $PVendorcode= 756;
        $MBranchCode =Auth::user()->BranchCode;
       $TxtInvoiceNo = $request->input('TxtVoucherNo');
       $status= 'notyet';
        $alldata = $request->all();
        $table = $request->table;
for ($i=0; $i <count($table) ; $i++) {
    $MOrderID = $table[$i]['OrderID'];
    $orderdetail = OrderModel::where('ID',$MOrderID)->where('PONO',$TxtInvoiceNo)->where('BranchCode',$MBranchCode)->first();
    if(!$orderdetail){
        $orderdetail = new OrderModel;
    }
    $orderdetail->PONO = $TxtInvoiceNo;
    $orderdetail->PullDate = $request->input('TxtPullDate');
    $orderdetail->PullTime = $request->input('TxtPullTime');
    $orderdetail->PullQty = $table[$i]['PullQty'];
    $orderdetail->PullShortQty = $table[$i]['PullShortQty'];
    $orderdetail->RecQty = $table[$i]['PullQty'];
    $MNotRecQty =(int) $orderdetail->OrderQty - ($orderdetail->OrderQty ? $orderdetail->OrderQty : 0) + ($orderdetail->PullQty ? $orderdetail->PullQty : 0);
    if($MNotRecQty > 0){
        $orderdetail->NotRecQty = $MNotRecQty;
        $orderdetail->OverQty = 0;
    }else{
        $orderdetail->NotRecQty = 0;
        $orderdetail->OverQty = $MNotRecQty;
    }
    $orderdetail->OurPrice = $table[$i]['Rate'];
    $orderdetail->VendorPrice = $table[$i]['Rate'];
    $orderdetail->PullAmount = $table[$i]['Amount'];
    $orderdetail->TotalCost = $table[$i]['Amount'];
    $orderdetail->ItemCode = $table[$i]['ItemCode'];
    $orderdetail->ItemName = $table[$i]['ItemName'];
    $orderdetail->PUOM = $table[$i]['PUOM'];
    $orderdetail->VendorActCode = $request->input('TxtStockCode');
    $orderdetail->StockLocation = $table[$i]['STLocation'];
    $orderdetail->BranchCode = $MBranchCode;
    // $orderdetail->save();
    # code...
    info($orderdetail);
}

       return response()->json([
        'status' =>$status,
        'alldata' =>$alldata,

    ]);

    }

    public function PullStockdelete(Request $request){
        $PVendorcode= 756;
        $MBranchCode =Auth::user()->BranchCode;
       $TxtInvoiceNo = $request->input('TxtVoucherNo');
       $status= 'notyet';
       info($TxtInvoiceNo);
      // Delete from POInventoryDetail table
$detailDeleted = InvoiceDetail::where('InvoiceNo', '=', $TxtInvoiceNo)
->where('BranchCode', '=', $MBranchCode)
->where('Type', '=', 'PURC')
->delete();

// Delete from POInventoryMaster table if POInventoryDetail delete was successful
$status = '';
if ($detailDeleted) {
$masterdelete = InvoiceMaster::where('InvoiceNo', '=', $TxtInvoiceNo)
    ->where('BranchCode', '=', $MBranchCode)
    ->where('Type', '=', 'PURC')
    ->delete();
    if($masterdelete){
        Trans::where('Vnon', '=', $TxtInvoiceNo)
    ->where('BranchCode', '=', $MBranchCode)
    ->where('Vnoc', '=', 'PURC')
    ->delete();
    }
$status = 'deleted';
} else {
$status = 'not deleted';
}



       return response()->json([
        'status' =>$status,

    ]);

    }
    public function SaleReturn(){
        $MBranchCode = Auth::user()->BranchCode;
        $PVendorcode= 756;
        $BranchCode =Auth::user()->BranchCode;
        $Currency = CurrencyModel::select('Currency')->where('BranchCode', $BranchCode)->orderBy('Currency')->get();
        $FixAccountSetup = FixAccountSetup::where('BranchCode', $BranchCode)->first();
        $GodownSetup = GodownSetup::where('BranchCode', $BranchCode)->orderBy('GodownCode')->get();
        // $Voucher = DB::table('InvoiceDetail')->select('InvoiceNo')->where('BranchCode',$MBranchCode)->orderBy('InvoiceNo')->get();
        $Voucher =InvoiceMaster::select('InvoiceNo')->distinct()->where('BranchCode', $MBranchCode)->where('Type','SLRE')->orderBy('InvoiceNo')->get();

        // dd($Voucher);
        $firstVoucherNo = InvoiceMaster::where('BranchCode',$MBranchCode)->where('Type','SLRE')->orderBy('InvoiceNo', 'asc')->first();
    $lastVoucherNo = InvoiceMaster::where('BranchCode',$MBranchCode)->where('Type','SLRE')->orderBy('InvoiceNo', 'desc')->first();
    // dd($firstVoucherNo);
    if(!$firstVoucherNo){
        $firstVoucherNo=0;
    }else{
        $firstVoucherNo=$firstVoucherNo->InvoiceNo;

    }

    if(!$lastVoucherNo){
        $lastVoucherNo=0;
    }else{
        $lastVoucherNo=$lastVoucherNo->InvoiceNo;

    }


        return view('inventory.SaleReturn', [

            'MBranchCode' => $MBranchCode,
            'GodownSetup' => $GodownSetup,
            'Currency' => $Currency,
            'FixAccountSetup' => $FixAccountSetup,
            'firstVoucherNo' => $firstVoucherNo,
            'lastVoucherNo' => $lastVoucherNo,
            'Voucher' => $Voucher,
        ]);
    }

//     public function SaleReturngetmoredata(Request $request){
//         // $PVendorCode = $request->input('vendor_code');
//     $MItemCode = $request->input('item_code');
//     // $BranchCode = $request->input('branch_code');
//     $PVendorCode= 756;
//     $BranchCode =Auth::user()->BranchCode;
// info($MItemCode);
//     $VenderProductList = DB::table('VenderProductList')
//         ->select('StockLocation', 'ChkStromme')
//         ->where('VenderCode', $PVendorCode)
//         ->where('ItemCode', $MItemCode)
//         ->where('BranchCode', $BranchCode)
//         ->first();

//     return response()->json($VenderProductList);
//     }
    public function searchSaleReturn(Request $request){
        $PVendorCode= 756;
        $BranchCode =Auth::user()->BranchCode;
       $voucherNo = $request->input('BillNo');
       $TxtVSNNo = $request->input('TxtVSNNo');
    $firstVoucherNo = InvoiceMaster::where('BranchCode',$BranchCode)->where('Type','SLRE')->orderBy('InvoiceNo', 'asc')->first();
    $lastVoucherNo = InvoiceMaster::where('BranchCode',$BranchCode)->where('Type','SLRE')->orderBy('InvoiceNo', 'desc')->first();
    $Master = InvoiceMaster::where('InvoiceNo', $voucherNo)->where('Type','SLRE')->where('BranchCode', $BranchCode)->first();
    $results = InvoiceDetail::where('InvoiceNo', $voucherNo)->where('BranchCode', $BranchCode)->where('Type','SLRE')->orderBy('ID', 'asc')->get();
    // $VenderProductList = DB::table('VenderProductList')->select('StockLocation','ChkStromme')->where('VenderCode',$PVendorCode)->where('ItemCode',$MItemCode)->where('BranchCode',$BranchCode)->first();
    $FlipToVSN = DB::table('fliptovsn')
    ->select('IMONo','CustomerName','VesselName','CustomerCode','GodownCode')
    ->where('VSNNo', $TxtVSNNo)
    ->where('BranchCode', (int) $BranchCode)
    ->first();
    if(!$firstVoucherNo){
        $firstVoucherNo=0;
    }else{
        $firstVoucherNo=$firstVoucherNo->InvoiceNo;

    }

    if(!$lastVoucherNo){
        $lastVoucherNo=0;
    }else{
        $lastVoucherNo=$lastVoucherNo->InvoiceNo;

    }

    // info($voucherNo);
    // info($inv);
    info($results);

       return response()->json([
        'Master' =>$Master,
        'results' =>$results,
        'FlipToVSN' =>$FlipToVSN,
        'firstVoucherNo' =>$firstVoucherNo,
        'lastVoucherNo' =>$lastVoucherNo,

    ]);

    }


    public function SaleReturnsave(Request $request){
        $PVendorcode= 756;
        $MBranchCode =Auth::user()->BranchCode;
       $TxtInvoiceNo = $request->input('TxtVoucherNo');
       $status= 'notyet';
        $alldata = $request->all();
        $table = $request->table;
for ($i=0; $i <count($table) ; $i++) {
    $MOrderID = $table[$i]['OrderID'];
    $orderdetail = OrderModel::where('ID',$MOrderID)->where('PONO',$TxtInvoiceNo)->where('BranchCode',$MBranchCode)->first();
    if(!$orderdetail){
        $orderdetail = new OrderModel;
    }
    $orderdetail->PONO = $TxtInvoiceNo;
    $orderdetail->PullDate = $request->input('TxtPullDate');
    $orderdetail->PullTime = $request->input('TxtPullTime');
    $orderdetail->PullQty = $table[$i]['PullQty'];
    $orderdetail->PullShortQty = $table[$i]['PullShortQty'];
    $orderdetail->RecQty = $table[$i]['PullQty'];
    $MNotRecQty =(int) $orderdetail->OrderQty - ($orderdetail->OrderQty ? $orderdetail->OrderQty : 0) + ($orderdetail->PullQty ? $orderdetail->PullQty : 0);
    if($MNotRecQty > 0){
        $orderdetail->NotRecQty = $MNotRecQty;
        $orderdetail->OverQty = 0;
    }else{
        $orderdetail->NotRecQty = 0;
        $orderdetail->OverQty = $MNotRecQty;
    }
    $orderdetail->OurPrice = $table[$i]['Rate'];
    $orderdetail->VendorPrice = $table[$i]['Rate'];
    $orderdetail->PullAmount = $table[$i]['Amount'];
    $orderdetail->TotalCost = $table[$i]['Amount'];
    $orderdetail->ItemCode = $table[$i]['ItemCode'];
    $orderdetail->ItemName = $table[$i]['ItemName'];
    $orderdetail->PUOM = $table[$i]['PUOM'];
    $orderdetail->VendorActCode = $request->input('TxtStockCode');
    $orderdetail->StockLocation = $table[$i]['STLocation'];
    $orderdetail->BranchCode = $MBranchCode;
    // $orderdetail->save();
    # code...
    info($orderdetail);
}

       return response()->json([
        'status' =>$status,
        'alldata' =>$alldata,

    ]);

    }

    public function SaleReturndelete(Request $request){
        $PVendorcode= 756;
        $MBranchCode =Auth::user()->BranchCode;
       $TxtInvoiceNo = $request->input('TxtVoucherNo');
       $status= 'notyet';
       info($TxtInvoiceNo);
      // Delete from POInventoryDetail table
$detailDeleted = InvoiceDetail::where('InvoiceNo', '=', $TxtInvoiceNo)
->where('BranchCode', '=', $MBranchCode)
->where('Type', '=', 'PURC')
->delete();

// Delete from POInventoryMaster table if POInventoryDetail delete was successful
$status = '';
if ($detailDeleted) {
$masterdelete = InvoiceMaster::where('InvoiceNo', '=', $TxtInvoiceNo)
    ->where('BranchCode', '=', $MBranchCode)
    ->where('Type', '=', 'PURC')
    ->delete();
    if($masterdelete){
        Trans::where('Vnon', '=', $TxtInvoiceNo)
    ->where('BranchCode', '=', $MBranchCode)
    ->where('Vnoc', '=', 'PURC')
    ->delete();
    }
$status = 'deleted';
} else {
$status = 'not deleted';
}



       return response()->json([
        'status' =>$status,

    ]);

    }
    public function StockTransfer(){
        $MBranchCode = Auth::user()->BranchCode;
        $PVendorcode= 756;
        $BranchCode =Auth::user()->BranchCode;
        $Currency = CurrencyModel::select('Currency')->where('BranchCode', $BranchCode)->orderBy('Currency')->get();
        $FixAccountSetup = FixAccountSetup::where('BranchCode', $BranchCode)->first();
        $GodownSetup = GodownSetup::where('BranchCode', $BranchCode)->orderBy('GodownCode')->get();
        // $Voucher = DB::table('InvoiceDetail')->select('InvoiceNo')->where('BranchCode',$MBranchCode)->orderBy('InvoiceNo')->get();
        $Voucher =InvoiceMaster::select('InvoiceNo')->distinct()->where('BranchCode', $MBranchCode)->where('Type','GNIN')->orderBy('InvoiceNo')->get();

        // dd($Voucher);
        $firstVoucherNo = InvoiceMaster::select('InvoiceNo')->where('BranchCode',$MBranchCode)->where('Type','GNIN')->orderBy('InvoiceNo', 'asc')->first();
    $lastVoucherNo = InvoiceMaster::select('InvoiceNo')->where('BranchCode',$MBranchCode)->where('Type','GNIN')->orderBy('InvoiceNo', 'desc')->first();
    if(!$firstVoucherNo){
        $firstVoucherNo=0;
    }else{
        $firstVoucherNo=$firstVoucherNo->InvoiceNo;

    }
    // dd($firstVoucherNo);

    if(!$lastVoucherNo){
        $lastVoucherNo=0;
    }else{
        $lastVoucherNo=$lastVoucherNo->InvoiceNo;

    }
    // dd($lastVoucherNo);


        return view('inventory.StockTransfer', [

            'MBranchCode' => $MBranchCode,
            'GodownSetup' => $GodownSetup,
            'Currency' => $Currency,
            'FixAccountSetup' => $FixAccountSetup,
            'firstVoucherNo' => $firstVoucherNo,
            'lastVoucherNo' => $lastVoucherNo,
            'Voucher' => $Voucher,
        ]);
    }

//     public function SaleReturngetmoredata(Request $request){
//         // $PVendorCode = $request->input('vendor_code');
//     $MItemCode = $request->input('item_code');
//     // $BranchCode = $request->input('branch_code');
//     $PVendorCode= 756;
//     $BranchCode =Auth::user()->BranchCode;
// info($MItemCode);
//     $VenderProductList = DB::table('VenderProductList')
//         ->select('StockLocation', 'ChkStromme')
//         ->where('VenderCode', $PVendorCode)
//         ->where('ItemCode', $MItemCode)
//         ->where('BranchCode', $BranchCode)
//         ->first();

//     return response()->json($VenderProductList);
//     }
    public function searchStockTransfer(Request $request){
        $PVendorCode= 756;
        $BranchCode =Auth::user()->BranchCode;
       $voucherNo = $request->input('BillNo');
       $TxtVSNNo = $request->input('TxtVSNNo');
    $firstVoucherNo = InvoiceMaster::where('BranchCode',$BranchCode)->where('Type','GNIN')->orderBy('InvoiceNo', 'asc')->first();
    $lastVoucherNo = InvoiceMaster::where('BranchCode',$BranchCode)->where('Type','GNIN')->orderBy('InvoiceNo', 'desc')->first();
    $Master = InvoiceMaster::where('InvoiceNo', $voucherNo)->where('Type','GNIN')->where('BranchCode', $BranchCode)->first();
    $results = InvoiceDetail::where('InvoiceNo', $voucherNo)->where('BranchCode', $BranchCode)->where('Type','GNIN')->orderBy('ID', 'asc')->get();
    // $VenderProductList = DB::table('VenderProductList')->select('StockLocation','ChkStromme')->where('VenderCode',$PVendorCode)->where('ItemCode',$MItemCode)->where('BranchCode',$BranchCode)->first();
    $GodownSetup = GodownSetup::where('GodownCode', $Master->ActCode)->where('BranchCode', (int) $BranchCode)->first();
    $GodownSetupto = GodownSetup::where('GodownCode', $Master->GodownCode)->where('BranchCode', (int) $BranchCode)->first();
    if(!$firstVoucherNo){
        $firstVoucherNo=0;
    }else{
        $firstVoucherNo=$firstVoucherNo->InvoiceNo;

    }

    if(!$lastVoucherNo){
        $lastVoucherNo=0;
    }else{
        $lastVoucherNo=$lastVoucherNo->InvoiceNo;

    }

    // info($voucherNo);
    // info($inv);
    info($results);

       return response()->json([
        'Master' =>$Master,
        'results' =>$results,
        'GodownSetup' =>$GodownSetup,
        'GodownSetupto' =>$GodownSetupto,
        'firstVoucherNo' =>$firstVoucherNo,
        'lastVoucherNo' =>$lastVoucherNo,

    ]);

    }


    public function StockTransfersave(Request $request){
        $PVendorCode= 756;
        $MWorkUser =config('app.MUserName');
        $MBranchCode = Auth::user()->BranchCode;

       $TxtInvoiceNo = $request->input('TxtVoucherNo');
       $status= 'notyet';
        $alldata = $request->all();
        info($alldata);
        $table = $request->table;


        $InvoiceMaster = InvoiceMaster::where('InvoiceNo',$TxtInvoiceNo)->where('BranchCode',$MBranchCode)->where('Type','GNIN')->first();
if(!$InvoiceMaster){
    $InvoiceMaster = new InvoiceMaster;
    $InvoiceMaster->InvoiceNo = $TxtInvoiceNo;
}
$InvoiceMaster->RefNo = $request->input('TxtRefNo');
$InvoiceMaster->Date = $request->input('TxtDate');
$InvoiceMaster->Type = 'GNIN';
$InvoiceMaster->ActCode = $request->input('TxtGodownCodeFrom');
$InvoiceMaster->ActName = $request->input('TxtGodownNameFrom');
$InvoiceMaster->GodownCode = $request->input('TxtGodownCodeTo');
$InvoiceMaster->GodownName = $request->input('TxtGodownNameTo');
$InvoiceMaster->GodownCodeFrom = $request->input('TxtGodownCodeFrom');
$InvoiceMaster->GodownNameFrom = $request->input('TxtGodownNameFrom');
$InvoiceMaster->Description = $request->input('TxtDescription');
$InvoiceMaster->NetAmount = $request->input('TxtTotalAmount');
$InvoiceMaster->TotalQty = $request->input('TxtTotalQty');
$InvoiceMaster->TotalBonusQty = $request->input('TxtTotBonusQty');
$InvoiceMaster->TotalDiscAmt = $request->input('TxtTotalDiscAmt');
$InvoiceMaster->TotalExpense = $request->input('TxtTotalExp');
$InvoiceMaster->BranchCode = $MBranchCode;
$InvoiceMaster->WorkUser = $MWorkUser;
// info($InvoiceMaster);
$InvoiceMaster->save();
        $InvoiceDetail = InvoiceDetail::where('InvoiceNo',$TxtInvoiceNo)->where('BranchCode',$MBranchCode)->where('Type','GNIN')->get();
        // $counting = count($InvoiceDetail);
        if($InvoiceDetail->count() > 0){
            InvoiceDetail::where('InvoiceNo', $TxtInvoiceNo)
            ->where('BranchCode', $MBranchCode)
            ->where('Type', 'GNIN')
            ->delete();
            info('deleted');
        }
        // info($counting);

for ($i=0; $i <count($table) ; $i++) {
    $MOrderID = $table[$i]['ID'];
    $MItemName = $table[$i]['ItemName'];
    if (strlen(trim($MItemName)) !== 0) {



    $InvoiceDetail = new InvoiceDetail;
    $InvoiceDetail->InvoiceNo = $TxtInvoiceNo;
    $InvoiceDetail->Date = $request->input('TxtDate');
    $InvoiceDetail->ActCode = $request->input('TxtGodownCodeFrom');
    $InvoiceDetail->ActName = $request->input('TxtGodownNameFrom');
    $InvoiceDetail->GodownCode = $request->input('TxtGodownCodeTo');
    $InvoiceDetail->GodownName = $request->input('TxtGodownNameTo');
    $InvoiceDetail->GodownCodeFrom = $request->input('TxtGodownCodeFrom');
    $InvoiceDetail->GodownNameFrom = $request->input('TxtGodownNameFrom');
    $InvoiceDetail->VendorCode = $PVendorCode;
    $InvoiceDetail->BarCode = $table[$i]['BarCode'];
    $InvoiceDetail->ItemCode = $table[$i]['ItemCode'];
    $InvoiceDetail->ItemName = $MItemName;
    $InvoiceDetail->BatchNo = $table[$i]['BatchNo'];
    $InvoiceDetail->ExpiryDate = $table[$i]['ExpiryDate'];
    $InvoiceDetail->UOM = $table[$i]['PUOM'];
    $InvoiceDetail->Quantity = $table[$i]['Quantity'];
    $InvoiceDetail->BonusQty = $table[$i]['BonusQty'];
    $InvoiceDetail->TradePrice = $table[$i]['TradePrice'];
    $InvoiceDetail->GrossAmount = $table[$i]['GrossAmt'];
    $InvoiceDetail->DiscPer = $table[$i]['DiscPer'];
    $InvoiceDetail->DiscAmt = $table[$i]['DiscAmt'];
    $InvoiceDetail->TotalAmt = $table[$i]['Amount'];
    $InvoiceDetail->TotQty = $table[$i]['Quantity'];
    $InvoiceDetail->AvgRate = $table[$i]['Avgrate'];
    $InvoiceDetail->InvRate = $table[$i]['InvRate'];
    $InvoiceDetail->ExpPer = $table[$i]['ExpPer'];
    $InvoiceDetail->InvAmt = $table[$i]['InvAmt'];
    $InvoiceDetail->DepartmentName = $table[$i]['DepartmentName'];
    $InvoiceDetail->DepartmentCode = $table[$i]['DepartmentCode'];
    $InvoiceDetail->SaleRate = $table[$i]['SaleRate'];
    $InvoiceDetail->IMPAItemCode = $table[$i]['IMPAItemCode'];
    $InvoiceDetail->ExpireBarCode = $table[$i]['ExpireBarCode'];
    $InvoiceDetail->BranchCode = $MBranchCode;
    $InvoiceDetail->TotalQty = $request->input('TxtTotalQty');
    $InvoiceDetail->TotalBonusQty = $request->input('TxtTotBonusQty');
    $InvoiceDetail->TotalDiscAmt = $request->input('TxtTotalDiscAmt');
    $InvoiceDetail->NetAmount = $request->input('TxtTotalAmount');
    $InvoiceDetail->Description = $request->input('TxtDescription');
    $InvoiceDetail->Type = 'GNIN';
    $InvoiceDetail->WorkUser = $MWorkUser;
    $InvoiceDetail->StockQty = $table[$i]['StockQty'];
    // info($InvoiceDetail);
    $InvoiceDetail->save();


}



}

$InvoiceMasterGNOU = InvoiceMaster::where('InvoiceNo',$TxtInvoiceNo)->where('BranchCode',$MBranchCode)->where('Type','GNOU')->first();
if(!$InvoiceMasterGNOU){
    $InvoiceMasterGNOU = new InvoiceMaster;
    $InvoiceMasterGNOU->InvoiceNo = $TxtInvoiceNo;
}
$InvoiceMasterGNOU->Date = $request->input('TxtDate');
$InvoiceMasterGNOU->Type = 'GNOU';
$InvoiceMasterGNOU->ActCode = $request->input('TxtGodownCodeFrom');
$InvoiceMasterGNOU->ActName = $request->input('TxtGodownNameFrom');
$InvoiceMasterGNOU->GodownCode = $request->input('TxtGodownCodeTo');
$InvoiceMasterGNOU->GodownName = $request->input('TxtGodownNameTo');
$InvoiceMasterGNOU->Description = $request->input('TxtDescription');
$InvoiceMasterGNOU->NetAmount = $request->input('TxtTotalAmount');
$InvoiceMasterGNOU->TotalQty = $request->input('TxtTotalQty');
$InvoiceMasterGNOU->BranchCode = $MBranchCode;
$InvoiceMasterGNOU->WorkUser = $MWorkUser;
// info($InvoiceMaster);
$InvoiceMasterGNOU->save();

        $InvoiceDetailGNOU = InvoiceDetail::where('InvoiceNo',$TxtInvoiceNo)->where('BranchCode',$MBranchCode)->where('Type','GNOU')->get();
        if($InvoiceDetailGNOU->count() > 0){
            InvoiceDetail::where('InvoiceNo', $TxtInvoiceNo)
            ->where('BranchCode', $MBranchCode)
            ->where('Type', 'GNOU')
            ->delete();
            info('deleted');

        }

        // info('deta');
for ($i=0; $i <count($table) ; $i++) {
    $MOrderID = $table[$i]['ID'];
    $MItemName = $table[$i]['ItemName'];
    $ItemCode = $table[$i]['ItemCode'];
    if (strlen(trim($MItemName)) !== 0) {



    $InvoiceDetailGNOU = new InvoiceDetail;
    $InvoiceDetailGNOU->InvoiceNo = $TxtInvoiceNo;
    $InvoiceDetailGNOU->Date = $request->input('TxtDate');
    $InvoiceDetailGNOU->ActCode = $request->input('TxtGodownCodeFrom');
    $InvoiceDetailGNOU->ActName = $request->input('TxtGodownNameFrom');
    $InvoiceDetailGNOU->GodownCode = $request->input('TxtGodownCodeTo');
    $InvoiceDetailGNOU->GodownName = $request->input('TxtGodownNameTo');
    $InvoiceDetailGNOU->GodownCodeFrom = $request->input('TxtGodownCodeFrom');
    $InvoiceDetailGNOU->GodownNameFrom = $request->input('TxtGodownNameFrom');
    $InvoiceDetailGNOU->VendorCode = $PVendorCode;
    $InvoiceDetailGNOU->BarCode = $table[$i]['BarCode'];
    $InvoiceDetailGNOU->ItemCode = $table[$i]['ItemCode'];
    $InvoiceDetailGNOU->ItemName = $MItemName;
    $InvoiceDetailGNOU->BatchNo = $table[$i]['BatchNo'];
    $InvoiceDetailGNOU->UOM = $table[$i]['PUOM'];
    $InvoiceDetailGNOU->Quantity = $table[$i]['Quantity'];
    $InvoiceDetailGNOU->TradePrice = $table[$i]['TradePrice'];
    $InvoiceDetailGNOU->GrossAmount = $table[$i]['GrossAmt'];
    $InvoiceDetailGNOU->TotalAmt = $table[$i]['Amount'];
    $InvoiceDetailGNOU->TotQty = $table[$i]['Quantity'];
    $InvoiceDetailGNOU->ExpireBarCode = $table[$i]['ExpireBarCode'];
    $InvoiceDetailGNOU->BranchCode = $MBranchCode;
    $InvoiceDetailGNOU->TotalQty = $request->input('TxtTotalQty');
    $InvoiceDetailGNOU->NetAmount = $request->input('TxtTotalAmount');
    $InvoiceDetailGNOU->Description = $request->input('TxtDescription');
    $InvoiceDetailGNOU->Type = 'GNOU';
    $InvoiceDetailGNOU->WorkUser = $MWorkUser;
    $InvoiceDetailGNOU->StockQty = $table[$i]['StockQty'];
    $InvoiceDetailGNOU->save();

}

$pDateTo ='';
$pDateTo =$request->input('TxtDate');
$GodownCode =$request->input('TxtGodownCodeTo');
$DateFrom = '';
$DateFrom = date('Y-m-d', strtotime($request->input('BackLogDate')));
$DateTo = $pDateTo;
$Date = $pDateTo;
$BranchCode = $MBranchCode;
$SPPullStock = DB::select(DB::raw('SET NOCOUNT ON; DECLARE @PurAmt decimal(8,2), @SalAmt decimal(8,2), @StockAmt decimal(8,2); EXEC SPPPullStockAvgStockRate @ItemCode = ?, @GodownCode = ?, @BranchCode = ?, @DateFrom = ?, @DateTo = ?, @PurAmt = @PurAmt OUTPUT, @SalAmt = @SalAmt OUTPUT, @StockAmt = @StockAmt OUTPUT; SELECT @PurAmt AS PurAmt, @SalAmt AS SalAmt, @StockAmt AS StockAmt;'), [$ItemCode,$GodownCode,$BranchCode,$DateFrom,$DateTo]);
$SPCurrentStock = DB::select(DB::raw('SET NOCOUNT ON; DECLARE @Pur decimal(8,2), @Sal decimal(8,2), @StockQty decimal(8,2); EXEC SPPPullCurrentStock @ItemCode = ?, @GodownCode = ?, @BranchCode = ?, @Date = ?, @DateFrom = ?, @Pur = @Pur OUTPUT, @Sal = @Sal OUTPUT, @StockQty = @StockQty OUTPUT; SELECT @Pur AS Pur, @Sal AS Sal, @StockQty AS StockQty;'), [$ItemCode,$GodownCode,$BranchCode,$Date,$DateFrom]);

$StockAmt = $SPPullStock[0]->StockAmt;
$StockQty = $SPCurrentStock[0]->StockQty;
$PAvgRate= $StockAmt/($StockQty ? $StockQty : 1);

// info($SPPullStock);
// info($StockAmt);
// info($SPCurrentStock);
// info($StockQty);
$TradePriceqry = InvoiceDetail::select('TradePrice')->whereIn('Type',['PURC','GNIN'])->where('Date','<=',$Date)->where('GodownCode',$GodownCode)->where('ITemCode',$ItemCode)->where('VendorCode',$PVendorCode)->where('BranchCode',$MBranchCode)->orderBy('Date', 'Desc')->first();
if($TradePriceqry){
    $MTradePrice1 = $TradePriceqry->TradePrice;
}else{
    $MTradePrice1 = '';

}


$rs2 = VendorProductListAvgRate::where('GodownCode',$GodownCode)->where('ITemCode',$ItemCode)->where('VendorCode',$PVendorCode)->where('BranchCode',$MBranchCode)->first();
if(!$rs2){
    $rs2 = new VendorProductListAvgRate;
    $rs2->ITemCode = $ItemCode;
    $rs2->GodownCode = $GodownCode;
    $rs2->VendorCode = $PVendorCode;
    $rs2->BranchCode = $MBranchCode;
}
$rs2->AvgRate = $PAvgRate;
$rs2->LandCost = $MTradePrice1;
$rs2->LastDate = $Date;
$rs2->WorkUser = $MWorkUser;
$rs2->save();

$MMItemCode11 = $table[$i]['ItemCode'];
$VenderProductList =  VenderProductList::where('VenderCode',$PVendorCode)->where('ItemCode',$MMItemCode11)->where('BranchCode',$MBranchCode)->first();
if($VenderProductList){
    $VenderProductList->AvgRate = $PAvgRate;
    $VenderProductList->save();
}
$MAvgAmt =(int) $PAvgRate* (int) $table[$i]['Quantity'];

}

$Trans = Trans::where('Vnon',$TxtInvoiceNo)->where('Vnoc','STRN')->where('BranchCode',$MBranchCode)->first();
if($Trans){
    Trans::where('Vnon',$TxtInvoiceNo)->where('Vnoc','STRN')->where('BranchCode',$MBranchCode)->delete();
}
$Trans = new Trans;
$Trans->Vnon = $TxtInvoiceNo;
$Trans->Vnoc = 'STRN';
$Trans->Date = $Date;
$Trans->ActCode = $request->input('TxtStockCodeTo');
$Trans->ActCode2 = $request->input('TxtStockCode');
$Trans->Des = 'Stock Transfer From '.$request->input('TxtGodownNameFrom').' To '.$request->input('TxtGodownNameTo');
$Trans->TransAmt = $request->input('TxtNetAmount');
$Trans->WorkUser = $MWorkUser;
$Trans->BranchCode = $MBranchCode;
$Trans->save();

$Trans = new Trans;
$Trans->Vnon = $TxtInvoiceNo;
$Trans->TransType = 'Credit';
$Trans->Vnoc = 'STRN';
$Trans->Date = $Date;
$Trans->ActCode = $request->input('TxtStockCode');
$Trans->ActCode2 = $request->input('TxtStockCodeTo');
$Trans->Des = 'Stock Transfer From '.$request->input('TxtGodownNameFrom').' To '.$request->input('TxtGodownNameTo');
$Trans->TransAmt = (int) $request->input('TxtNetAmount')* -1;
$Trans->WorkUser = $MWorkUser;
$Trans->BranchCode = $MBranchCode;
$Trans->save();


return response()->json([
    'status' =>$status,
    'alldata' =>$alldata,
    'MAvgAmt' =>$MAvgAmt,

]);



    }

    public function barcodesearch(Request $request){
        $TxtInvoiceNo = $request->input('barcodeinv');
        $MWorkUser =config('app.MUserName');
        $MBranchCode = Auth::user()->BranchCode;
        $MList = $request->input('MList');

if($MList == 'OPSTK'){
    $InvoiceDetail = InvoiceDetail::where('InvoiceNo',$TxtInvoiceNo)->where('BranchCode',$MBranchCode)->where('Type','OPSTK')->orderBy('ID')->get();
}else{
    $InvoiceDetail = InvoiceDetail::where('InvoiceNo',$TxtInvoiceNo)->where('BranchCode',$MBranchCode)->where('Type','PURC')->orderBy('ID')->get();
}

    return response()->json([
        'InvoiceDetail' => $InvoiceDetail,

]);



    }




    public function StockTransferdelete(Request $request){
        $PVendorcode= 756;
        $MBranchCode =Auth::user()->BranchCode;
       $TxtInvoiceNo = $request->input('TxtVoucherNo');
       $status= 'notyet';
       info($TxtInvoiceNo);
      // Delete from POInventoryDetail table
$detailDeletedGNIN = InvoiceDetail::where('InvoiceNo', '=', $TxtInvoiceNo)
->where('BranchCode', '=', $MBranchCode)
->where('Type', '=', 'GNIN')
->delete();

if ($detailDeletedGNIN) {
$detailDeleted = InvoiceDetail::where('InvoiceNo', '=', $TxtInvoiceNo)
->where('BranchCode', '=', $MBranchCode)
->where('Type', '=', 'GNOU')
->delete();
}
// Delete from POInventoryMaster table if POInventoryDetail delete was successful
$status = '';
if ($detailDeleted) {

$masterdelete = InvoiceMaster::where('InvoiceNo', '=', $TxtInvoiceNo)
    ->where('BranchCode', '=', $MBranchCode)
    ->where('Type', '=', 'GNIN')
    ->delete();
    if($masterdelete){


        InvoiceMaster::where('InvoiceNo', '=', $TxtInvoiceNo)
    ->where('BranchCode', '=', $MBranchCode)
    ->where('Type', '=', 'GNOU')
    ->delete();

        Trans::where('Vnon', '=', $TxtInvoiceNo)
    ->where('BranchCode', '=', $MBranchCode)
    ->where('Vnoc', '=', 'STRN')
    ->delete();
    }
$status = 'deleted';
} else {
$status = 'not deleted';
}



       return response()->json([
        'status' =>$status,

    ]);

    }

    public function CurrentStockPosition(){
        $MBranchCode = Auth::user()->BranchCode;
        $MUserName =config('app.MUserName');
        $PVendorcode= 756;
        $BranchCode =Auth::user()->BranchCode;
        $Currency = CurrencyModel::select('Currency')->where('BranchCode', $BranchCode)->orderBy('Currency')->get();
        $FixAccountSetup = FixAccountSetup::where('BranchCode', $BranchCode)->first();
        $GodownSetup = GodownSetup::where('BranchCode', $BranchCode)->distinct()->orderBy('GodownCode')->get();
        $CategorySetup = CategoryModel::where('BranchCode', $BranchCode)->orderBy('CategoryName')->distinct()->get();
        $TypeSetup = Typesetup::where('BranchCode', $BranchCode)->distinct()->get();
        $BranchSetup = BranchSetup::where('BranchCode', $BranchCode)->first();
        // dd($BranchSetup);


        return view('inventory.CurrentStockPosition', [

            'MBranchCode' => $MBranchCode,
            'MWorkUser' => $MUserName,
            'GodownSetup' => $GodownSetup,
            'CategorySetup' => $CategorySetup,
            'TypeSetup' => $TypeSetup,
            'BranchSetup' => $BranchSetup,
            'Currency' => $Currency,
            'FixAccountSetup' => $FixAccountSetup,
        ]);
    }


    public function searchCurrentStockPosition(Request $request){
        $PVendorCode= 756;
        $MBranchCode = Auth::user()->BranchCode;
        $MWorkUser =config('app.MUserName');
        $TxtSearch = $request->input('TxtSearch');
        $TxtSearch = '%'.$TxtSearch.'%';

        $results = DB::select(DB::raw("SET NOCOUNT ON ;exec SPCurrStockFill @BranchCode='$MBranchCode',@MWorkUser='$MWorkUser',@TxtSearch='$TxtSearch'"));

        return response()->json([
            'results' =>$results,

        ]);

    }
    public function CurrentStockPositionsave(Request $request){
        $PVendorCode= 756;
        $MBranchCode = Auth::user()->BranchCode;
        $MWorkUser =config('app.MUserName');
        $qry =$request->input('Qry');
        $ChkGodownAll =$request->input('ChkGodownAll');
        $TxtGodownCode =$request->input('TxtGodownCode');
        $OptOrderStockCal =$request->input('OptOrderStockCal');
        $OptStockQty =$request->input('OptStockQty');
        $ChkOnlyNagative =$request->input('ChkOnlyNagative');
        $OptPullStockCal =$request->input('OptPullStockCal');
        $OptAvgRate =$request->input('OptAvgRate');
        $status = 'start';
        $txtstockQty = 0;
        $TxtTotalAmount = 0;
        $result = DB::select("SELECT * FROM QryVenderProductList WHERE BranchCode = ".$MBranchCode." AND ".$qry);
        $dats = count($result);
        // info($dats);
        TempInventoryReport::where('WorkUser',$MWorkUser)->where('BranchCode',$MBranchCode)->delete();
        $TempInventoryReport = TempInventoryReport::where('WorkUser',$MWorkUser)->where('BranchCode',$MBranchCode)->first();
// info($ChkGodownAll);
        if(count($result) > 0){
            for ($i=0; $i <count($result) ; $i++) {
            if ($ChkGodownAll == 'true') {
                $GodownSetup = GodownSetup::select('GodownCode','GodownName')->where('GodownCode','>',0)->where('ChkNotShow','<>',1)->where('BranchCode',$MBranchCode)->get();
                // info('all');
            }else{
                $GodownSetup = GodownSetup::select('GodownCode','GodownName')->where('GodownCode','>',0)->where('ChkNotShow','<>',1)->where('GodownCode',$TxtGodownCode)->where('BranchCode',$MBranchCode)->get();
                // info('noall');
            }
            if(count($GodownSetup) > 0){
                    for($j=0; $j <count($GodownSetup) ; $j++){
                        $TempInventoryReport = new TempInventoryReport;
                        $TempInventoryReport->ItemCode = $result[$i]->ItemCode;
                        $TempInventoryReport->ItemName = $result[$i]->ItemName;
                        $TempInventoryReport->IMPAItemCode = $result[$i]->IMPAItemCode;
                        $TempInventoryReport->DepartmentName = $result[$i]->TypeName;
                        $TempInventoryReport->CategoryName = $result[$i]->VCategoryName;
                        $TempInventoryReport->OrgineName = $result[$i]->OriginName;
                        $MMChkPERISHABLE = $result[$i]->ChkPERISHABLE;
                            if($MMChkPERISHABLE !== ''){
                                $TempInventoryReport->ChkPERISHABLE = $result[$i]->ChkPERISHABLE;
                            }
                        $TempInventoryReport->FixedPrice = $result[$i]->FixedPrice;
                        $TempInventoryReport->UOM = $result[$i]->UOM;
                        $MOurPrice = $result[$i]->OurPrice ? $result[$i]->OurPrice : 0;
                        $TempInventoryReport->OurPrice = $MOurPrice;
                        $MItemCode = $result[$i]->ItemCode;

                        $TradePrice = InvoiceDetail::select('TradePrice')->where('TradePrice','>',0)->where('GodownCode',$GodownSetup[$j]->GodownCode)->where('Type','PURC')->where('ITemCode',$MItemCode)->where('BranchCode',$MBranchCode)->orderBy('Date','Desc')->first();
                            if($TradePrice){
                                $MOurPrice1 = $TradePrice->TradePrice;
                                $TempInventoryReport->OurPrice = $MOurPrice1;
                            }
                        $MGodownCode11 = $GodownSetup[$j]->GodownCode;
                        $TempInventoryReport->BranchCode = $MBranchCode;
                        $TempInventoryReport->WorkUser = $MWorkUser;
                        $TempInventoryReport->GodownName = $GodownSetup[$j]->GodownName;
                        $TempInventoryReport->GodownCode = $MGodownCode11;
                        $PItemCode = $result[$i]->ItemCode;
                        $PGodownCode1 = $GodownSetup[$j]->GodownCode;
                        $PDateTo = $request->input('TxtDateTo');
                        // info($PDateTo);
                            if($OptPullStockCal == 'true'){
                                $MMStockType = 'PullStock';
                            }else if($OptOrderStockCal == 'true'){
                                $MMStockType = 'OrderStock';
                            }

                        $ItemCode = $PItemCode;
                        // info($ItemCode);
                        $GodownCode = $PGodownCode1;
                        $BranchCode = $MBranchCode;
                        $DateFrom = date('Y-m-d', strtotime($request->input('BackLogDate')));
                        info($DateFrom);
                        $DateTo = $request->input('TxtDateTo');
                        $Date = $request->input('TxtDateTo');
                        $VendorCode = $PVendorCode;

                        $SPPullStock = DB::select(DB::raw('SET NOCOUNT ON; DECLARE @PurAmt decimal(8,2), @SalAmt decimal(8,2), @StockAmt decimal(8,2); EXEC SPPPullStockAvgStockRate @ItemCode = ?, @GodownCode = ?, @BranchCode = ?, @DateFrom = ?, @DateTo = ?, @PurAmt = @PurAmt OUTPUT, @SalAmt = @SalAmt OUTPUT, @StockAmt = @StockAmt OUTPUT; SELECT @PurAmt AS PurAmt, @SalAmt AS SalAmt, @StockAmt AS StockAmt;'), [$ItemCode,$GodownCode,$BranchCode,$DateFrom,$DateTo]);
                        // $MPurAmt1 = $SPPullStock[0]->PurAmt;
                        // $MSalAmt1 = $SPPullStock[0]->SalAmt;
                        $stockAmt = $SPPullStock[0]->StockAmt;
                        if($MMStockType == 'PullStock'){
                            info('PullStock');
                            $SPCurrentStock = DB::select(DB::raw('SET NOCOUNT ON; DECLARE @Pur decimal(8,2), @Sal decimal(8,2), @StockQty decimal(8,2); EXEC SPPPullCurrentStock @ItemCode = ?, @GodownCode = ?, @BranchCode = ?, @Date = ?, @DateFrom = ?, @Pur = @Pur OUTPUT, @Sal = @Sal OUTPUT, @StockQty = @StockQty OUTPUT; SELECT @Pur AS Pur, @Sal AS Sal, @StockQty AS StockQty;'), [$ItemCode,$GodownCode,$BranchCode,$Date,$DateFrom]);
                            // $MPur1 = $SPCurrentStock[0]->Pur;
                            // $MSal1 = $SPCurrentStock[0]->Sal;
                            // info($MPur1);
                            // info($MSal1);
                            // $MStock1 = $MPur1-$MSal1;
                            $MStock1 = $SPCurrentStock[0]->StockQty;
                            $stockQty = $MStock1;

                            }else if($MMStockType == 'OrderStock'){
                                info('OrderStock');

                                $SPOrderStock = DB::select(DB::raw('SET NOCOUNT ON; DECLARE @Pur decimal(8,2), @Sal decimal(8,2), @SalOrder decimal(8,2), @StockQty decimal(8,2); EXEC SPOrderStock @ItemCode = ?, @GodownCode = ?, @BranchCode = ?, @VendorCode = ?, @Pur = @Pur OUTPUT, @Sal = @Sal OUTPUT, @SalOrder = @SalOrder OUTPUT, @StockQty = @StockQty OUTPUT; SELECT @Pur AS Pur, @Sal AS Sal, @SalOrder AS SalOrder, @StockQty AS StockQty;'), [$ItemCode,$GodownCode,$BranchCode,$VendorCode]);
                                // $MPur1 = $SPOrderStock[0]->Pur;
                                // $MSal1 = $SPOrderStock[0]->Sal;
                                // $MOrderSale1 = $SPOrderStock[0]->SalOrder;

                                // info($MPur1);
                                // info($MSal1);
                                // info($MOrderSale1);
                                // $MStock1 = $MPur1 - ($MSal1 + $MOrderSale1);
                                $MStock1 = $SPOrderStock[0]->StockQty;
                                $stockQty= $MStock1;

                        }


    // $resultsp = DB::select(DB::raw('SET NOCOUNT ON; DECLARE @StockAmt decimal(8,2), @StockQty decimal(8,2); EXEC SpCalculateStock @DateFrom = ?, @DateTo = ?, @Date = ?, @ItemCode = ?, @GodownCode = ?, @BranchCode = ?, @VendorCode = ?, @MMStockType = ?, @StockAmt = @StockAmt OUTPUT, @StockQty = @StockQty OUTPUT; SELECT @StockAmt AS StockAmt, @StockQty AS StockQty;'), [$DateFrom, $DateTo, $Date, $ItemCode, $GodownCode, $BranchCode, $VendorCode, $MMStockType]);


// $stockAmt = $resultsp[0]->StockAmt; // Retrieve the value of @StockAmt
// $stockQty = $resultsp[0]->StockQty; // Retrieve the value of @StockQty
// info($stockAmt);
// info($stockQty);
if($stockAmt > 0 && $stockQty > 0){

    $PAvgRate= $stockAmt / $stockQty ;
}else{
    $PAvgRate=0;
}
                        // if($PCurrQty == 0){
                        //     $PCurrQty = 1;
                        //     // info($PCurrQty);
                        // }
                        // if($MCostAmt == 0){
                        //         $MCostAmt = 1;
                        //         // info($MCostAmt);
                        //         }
                        // $MCostAmt = ($MCostAmt == 0) ? $MCostAmt : 1;
                        // $PCurrQty = ($PCurrQty == 0) ? $PCurrQty : 1;

                        $VenProListAvgrt = DB::table('vendorproductlistavgrate')->select('AvgRate','LandCost')->where('ItemCode',$PItemCode)->where('GodownCode',$PGodownCode1)->where('BranchCode',$MBranchCode)->first();
                        if($VenProListAvgrt){
                            $MAvgRate123 = $VenProListAvgrt->AvgRate;
                            if($MAvgRate123 > 0 ){
                                $PAvgRate = $MAvgRate123;
                            }else{
                                $PAvgRate = $VenProListAvgrt->LandCost;

                            }
                        }
                        $TempInventoryReport->StockQty = $stockQty;
                        $txtstockQty = $txtstockQty + $stockQty;
                        $TempInventoryReport->AvgRate = $PAvgRate;

                        $MAMount = $TempInventoryReport->OurPrice * $stockQty;
                        $MAmountAVG = $PAvgRate * $stockQty;

                        if($OptAvgRate == 'true'){
                            $TempInventoryReport->Amount = $MAmountAVG;
                            $TxtTotalAmount = $TxtTotalAmount+$MAmountAVG;
                        }else{
                            $TempInventoryReport->Amount = $MAMount;
                            $TxtTotalAmount = $TxtTotalAmount+$MAMount;
                        }
                        info($TempInventoryReport);
                        $TempInventoryReport->save();

                        $PAvgRate = 0;
                        $stockAmt = 0;
                        $PItemCode = 0;
                        $PGodownCode1 = 0;
                        $PItemCode = 0;
                        $PGodownCode1 = 0;
                        $stockQty = 0;

                    }
                }


        }
        if($TempInventoryReport){
            $status = 'Comlpete';
        }

}

if($ChkOnlyNagative == 'true'){
    TempInventoryReport ::where('STockQty','>=',0)->where('WorkUser',$MWorkUser)->where('BranchCode',$MBranchCode)->delete();
}
if($OptStockQty == 'true'){
    info('delete');
    TempInventoryReport ::where('STockQty','=',0)->where('WorkUser',$MWorkUser)->where('BranchCode',$MBranchCode)->delete();
}
// $TxtSearch = '% %';

// $InventoryReport = DB::select(DB::raw("SET NOCOUNT ON ;exec SPCurrStockFill @BranchCode='$MBranchCode',@MWorkUser='$MWorkUser',@TxtSearch='$TxtSearch'"));

$InventoryReport = TempInventoryReport::where('WorkUser',$MWorkUser)->where('BranchCode',$MBranchCode)->orderBy('ItemName')->get();


return response()->json([
    'results' =>$InventoryReport,
    'status' =>$status,
    'txtstockQty' =>$txtstockQty,
    'TxtTotalAmount' =>$TxtTotalAmount,

]);

    }

// public function CurrentStockPositionsave(Request $request)
// {
//     $PVendorCode = 756;

//     $MBranchCode = config('app.MBranchCode');
//     $BranchCode = $MBranchCode;
//     $MWorkUser = config('app.MUserName');
//     $qry = $request->input('Qry');
//     $ChkGodownAll = $request->input('ChkGodownAll');
//     $TxtGodownCode = $request->input('TxtGodownCode');
//     $OptOrderStockCal = $request->input('OptOrderStockCal');
//     $OptPullStockCal = $request->input('OptPullStockCal');
//     $OptAvgRate = $request->input('OptAvgRate');
//     $DateFrom = date('Y-m-d', strtotime($request->input('BackLogDate')));
//     $DateTo = $request->input('TxtDateTo');
//     $Date = $request->input('TxtDateTo');
//     $status = 'start';

//     $result = DB::select("SELECT * FROM QryVenderProductList WHERE BranchCode = " . $MBranchCode . " AND " . $qry);
//     TempInventoryReport::where('WorkUser', $MWorkUser)->where('BranchCode', $MBranchCode)->delete();

//     $GodownSetup = DB::table('GodownSetup')
//         ->select('GodownCode', 'GodownName')
//         ->where('GodownCode', '>', 0)
//         ->where('ChkNotShow', '<>', 1)
//         ->where('BranchCode', $MBranchCode)
//         ->when(!$ChkGodownAll, function ($query) use ($TxtGodownCode) {
//             return $query->where('GodownCode', $TxtGodownCode);
//         })
//         ->get();

//     if (count($result) > 0) {
//         $itemCodes = [];
//         $godownCodes = [];
//         foreach ($result as $item) {
//             $itemCodes[] = $item->ItemCode;
//         }
//         foreach ($GodownSetup as $godown) {
//             $godownCodes[] = $godown->GodownCode;
//         }

//         $tradePrices = InvoiceDetail::select('TradePrice', 'ITemCode')
//             ->where('TradePrice', '>', 0)
//             ->whereIn('GodownCode', $godownCodes)
//             ->where('Type', 'PURC')
//             ->whereIn('ITemCode', $itemCodes)
//             ->where('BranchCode', $MBranchCode)
//             ->orderBy('Date', 'DESC')
//             ->get()
//             ->keyBy('ITemCode');


//             foreach ($result as $item) {
//                 foreach ($GodownSetup as $godown) {
//                                 $sppPullCurrentStock = DB::select(DB::raw('SET NOCOUNT ON; DECLARE @Pur decimal(8,2), @Sal decimal(8,2), @SalOrder decimal(8,2), @StockQty decimal(8,2); EXEC SPOrderStock @ItemCode = ?, @GodownCode = ?, @BranchCode = ?, @VendorCode = ?, @Pur = @Pur OUTPUT, @Sal = @Sal OUTPUT, @SalOrder = @SalOrder OUTPUT, @StockQty = @StockQty OUTPUT; SELECT @Pur AS Pur, @Sal AS Sal, @SalOrder AS SalOrder, @StockQty AS StockQty;'), [$item->ItemCode,$godown->GodownCode,$BranchCode,$PVendorCode]);
//                         $sppPullStockAvgStockRate = DB::select(DB::raw('SET NOCOUNT ON; DECLARE @PurAmt decimal(8,2), @SalAmt decimal(8,2), @StockAmt decimal(8,2); EXEC SPPPullStockAvgStockRate @ItemCode = ?, @GodownCode = ?, @BranchCode = ?, @DateFrom = ?, @DateTo = ?, @PurAmt = @PurAmt OUTPUT, @SalAmt = @SalAmt OUTPUT, @StockAmt = @StockAmt OUTPUT; SELECT @PurAmt AS PurAmt, @SalAmt AS SalAmt, @StockAmt AS StockAmt;'), [$item->ItemCode,$godown->GodownCode,$BranchCode,$DateFrom,$DateTo]);

//                 // $sppPullStockAvgStockRate = DB::select(DB::raw('SET NOCOUNT ON; DECLARE @PurAmt decimal(8,2), @SalAmt decimal(8,2), @StockAmt decimal(8,2); EXEC SPPPullStockAvgStockRate @ItemCode, @GodownCode, @BranchCode, @DateFrom, @DateTo, @PurAmt OUTPUT, @SalAmt OUTPUT, @StockAmt OUTPUT; SELECT @PurAmt AS PurAmt, @SalAmt AS SalAmt, @StockAmt AS StockAmt;'), [$item->ItemCode, $godown->GodownCode, $MBranchCode, $DateFrom, $DateTo]);

//                 // $sppPullCurrentStock = DB::select(DB::raw('SET NOCOUNT ON; DECLARE @Pur decimal(8,2), @Sal decimal(8,2), @StockQty decimal(8,2); EXEC SPPPullCurrentStock @ItemCode, @GodownCode, @BranchCode, @Date, @DateFrom, @Pur OUTPUT, @Sal OUTPUT, @StockQty OUTPUT; SELECT @Pur AS Pur, @Sal AS Sal, @StockQty AS StockQty;'), [$item->ItemCode, $godown->GodownCode, $MBranchCode, $Date, $DateFrom]);
//                 $TempInventoryReport = new TempInventoryReport;
//                 $TempInventoryReport->ItemCode = $item->ItemCode;
//                 $TempInventoryReport->ItemName = $item->ItemName;
//                 $TempInventoryReport->IMPAItemCode = $item->IMPAItemCode;
//                 $TempInventoryReport->DepartmentName = $item->TypeName;
//                 $TempInventoryReport->CategoryName = $item->VCategoryName;
//                 $TempInventoryReport->OrgineName = $item->OriginName;
//                 $TempInventoryReport->ChkPERISHABLE = $item->ChkPERISHABLE ?: null;
//                 $TempInventoryReport->FixedPrice = $item->FixedPrice;
//                 $TempInventoryReport->UOM = $item->UOM;
//                 $MOurPrice = $item->OurPrice ?: 0;
//                 $TempInventoryReport->OurPrice = $MOurPrice;
//                 $MItemCode = $item->ItemCode;

//                 $tradePrice = $tradePrices[$MItemCode] ?? null;
//                 if ($tradePrice) {
//                     $MOurPrice1 = $tradePrice->TradePrice;
//                     $TempInventoryReport->OurPrice = $MOurPrice1;
//                 }

//                 $MGodownCode11 = $godown->GodownCode;
//                 $TempInventoryReport->BranchCode = $MBranchCode;
//                 $TempInventoryReport->WorkUser = $MWorkUser;
//                 $TempInventoryReport->GodownName = $godown->GodownName;
//                 $TempInventoryReport->GodownCode = $godown->GodownCode;
//                 $PItemCode = $item->ItemCode;
//                 $PGodownCode1 = $godown->GodownCode;
//                 $PDateTo = $request->input('TxtDateTo');

//                 if ($OptPullStockCal == true) {
//                     $MMStockType = 'PullStock';
//                 } else if ($OptOrderStockCal == true) {
//                     $MMStockType = 'OrderStock';
//                 }

//                 $ItemCode = $PItemCode;
//                 $GodownCode = $PGodownCode1;
//                 $BranchCode = $MBranchCode;
//                 $DateFrom = date('Y-m-d', strtotime($request->input('BackLogDate')));
//                 $DateTo = $request->input('TxtDateTo');
//                 $Date = $request->input('TxtDateTo');
//                 $VendorCode = $PVendorCode;

//                 $StockAmt = $sppPullStockAvgStockRate[$ItemCode][$GodownCode]['StockAmt'] ?? 0;

//                 if ($MMStockType == 'PullStock') {
//                     $PCurrQty = $sppPullCurrentStock[$ItemCode][$GodownCode]['StockQty'] ?? 0;
//                 } else if ($MMStockType == 'OrderStock') {
//                     $MPur1 = $SPOrderStock[$ItemCode][$GodownCode]['Pur'] ?? 0;
//                     $MSal1 = $SPOrderStock[$ItemCode][$GodownCode]['Sal'] ?? 0;
//                     $MOrderSale1 = $SPOrderStock[$ItemCode][$GodownCode]['SalOrder'] ?? 0;
//                     $MStock1 = $MPur1 - ($MSal1 + $MOrderSale1);
//                     $PCurrQty = $MStock1;
//                 }

//                 if ($PCurrQty == 0) {
//                     $PCurrQty = 1;
//                 }

//                 $PAvgRate = $StockAmt / $PCurrQty;

//                 $VenProListAvgrt = $vendorProductListAvgRate[$PItemCode][$PGodownCode1] ?? null;
//                 if ($VenProListAvgrt) {
//                     $MAvgRate123 = $VenProListAvgrt->AvgRate;
//                     if ($MAvgRate123 > 0) {
//                         $PAvgRate = $MAvgRate123;
//                     } else {
//                         $PAvgRate = $VenProListAvgrt->LandCost;
//                     }
//                 }

//                 $TempInventoryReport->StockQty = $PCurrQty;
//                 $TempInventoryReport->AvgRate = $PAvgRate;
//                 $MAMount = $TempInventoryReport->OurPrice * $PCurrQty;
//                 $MAmountAVG = $PAvgRate * $PCurrQty;
//                 if ($OptAvgRate == true) {
//                     $TempInventoryReport->Amount = $MAmountAVG;
//                 } else {
//                     $TempInventoryReport->Amount = $MAMount;
//                 }
//                 $TempInventoryReport->save();
//                 $PAvgRate = "";
//                 $PCurrQty = "";
//                 $PItemCode = "";
//                 $PGodownCode1 = "";
//                 $PItemCode = "";
//                 $PGodownCode1 = "";
//                 $PDateTo = "";
//             }
//         }

//         if ($TempInventoryReport) {
//             $status = 'Complete';
//         }
//     }

//     $InventoryReport = TempInventoryReport::where('WorkUser', $MWorkUser)->where('BranchCode', $MBranchCode)->get();

//     return response()->json([
//         'results' => $InventoryReport,
//         'status' => $status,
//     ]);
// }

public function StockLedger(Request $request){
    $MBranchCode = Auth::user()->BranchCode;
    $MUserName =config('app.MUserName');
    $PVendorcode= 756;
    $BranchCode =Auth::user()->BranchCode;
    $Currency = CurrencyModel::select('Currency')->where('BranchCode', $BranchCode)->orderBy('Currency')->get();
    $FixAccountSetup = FixAccountSetup::where('BranchCode', $BranchCode)->first();
    $GodownSetup = GodownSetup::where('BranchCode', $BranchCode)->distinct()->orderBy('GodownCode')->get();
    $CategorySetup = CategoryModel::where('BranchCode', $BranchCode)->get();
    $TypeSetup = Typesetup::where('BranchCode', $BranchCode)->distinct()->get();
    $BranchSetup = BranchSetup::where('BranchCode', $BranchCode)->first();
    // dd($BranchSetup);


    return view('inventory.StockLedger', [

        'MBranchCode' => $MBranchCode,
        'MWorkUser' => $MUserName,
        'GodownSetup' => $GodownSetup,
        'CategorySetup' => $CategorySetup,
        'TypeSetup' => $TypeSetup,
        'BranchSetup' => $BranchSetup,
        'Currency' => $Currency,
        'FixAccountSetup' => $FixAccountSetup,
    ]);
}
public function FillOrderCalculationStockLedgersave(Request $request){
    $MBranchCode = Auth::user()->BranchCode;
    $MWorkUser =config('app.MUserName');
    $PVendorcode= 756;
    $status = 'Start';
    $TxtLocationCode = $request->input('TxtLocationCode');
    $TxtLocationName = $request->input('TxtLocationName');
    $TxtArticleCode = $request->input('TxtArticleCode');
    $TxtArticleName = $request->input('TxtArticleName');
    $LblUom = $request->input('LblUom');
    $TxtDateFrom = $request->input('TxtDateFrom');
    $TxtDateTo = $request->input('TxtDateTo');
    $MDateFrom = $request->input('MDateFrom');
    $MDateTo = $request->input('MDateTo');


StLedger::where('BranchCode',$MBranchCode)->where('WorkUser',$MWorkUser)->delete();
// $stLedgerRecords = StLedger::where('BranchCode',$MBranchCode)->where('WorkUser',$MWorkUser)->get();


$MPurQty = InvoiceDetail::select(DB::raw('SUM(TotQty) as MPurQty'))->whereIn('Type', ['PURC', 'GNIN','STAJ'])
    ->where('GodownCode', $TxtLocationCode)
    ->where('ItemCode', $TxtArticleCode)
    ->where('Date', '<', $TxtDateFrom)
    ->where('BranchCode', $MBranchCode)
    ->first();
// info($MPurQty->MPurQty);
    if($MPurQty->MPurQty){
        $MPurQty = $MPurQty->MPurQty;
    }else{
        $MPurQty = 0;

    }
    $MPureQty = InvoiceDetail::select(DB::raw('SUM(TotQty) as MPureQty'))->whereIn('Type', ['PURE','GNOU'])
    ->where('GodownCode', $TxtLocationCode)
    ->where('ItemCode', $TxtArticleCode)
    ->where('Date', '<', $TxtDateFrom)
    ->where('BranchCode', $MBranchCode)
    ->first();
    if($MPureQty->MPureQty){
        $MPurRetQty = $MPureQty->MPureQty;
    }else{
        $MPurRetQty = 0;

    }
    $results = DB::table('orderdetail')
    ->select(
        DB::raw('SUM(RecQty) as MRecQty'),
        DB::raw('SUM(OrderQty) as MDeliveredQty'),
        DB::raw('SUM(ReturnQty) as MReturnQty'),
        DB::raw('SUM(SoldQty) as MSoldQty'),
        DB::raw('SUM(MissingQty) as MMissingQty'),
        DB::raw('SUM(PurRetQty) as MPurRetQty')
    )
    ->where('GodownCode', $TxtLocationCode)
    ->where('ItemCode', $TxtArticleCode)
    ->where('OrderDate', '<', $TxtDateFrom)
    ->where('BranchCode', $MBranchCode)
    ->first();
    if($results->MDeliveredQty){
        $MDeliveredQty = $results->MDeliveredQty;
    }else{
        $MDeliveredQty = 0;

    }
    if($results->MReturnQty){
        $MReturnQty = $results->MReturnQty;
    }else{
        $MReturnQty = 0;

    }
    $MTotQtyOp = $MPurQty - ($MDeliveredQty + $MPurRetQty + $MReturnQty);
    $MBalance = $MTotQtyOp;

    $stLedgerRecords = new StLedger;
    $stLedgerRecords->ITemCode = $TxtArticleCode;
    $stLedgerRecords->ItemName = $TxtArticleName;
    $stLedgerRecords->Date =$TxtDateFrom;
    $stLedgerRecords->UOM = $LblUom;
    $stLedgerRecords->GodownCode = $TxtLocationCode;
    $stLedgerRecords->GodownName = $TxtLocationName;
    $stLedgerRecords->BranchCode = $MBranchCode;
    $stLedgerRecords->Workuser = $MWorkUser;
    $stLedgerRecords->Des = 'Balance B/f.........';
    $stLedgerRecords->Type = 'Opening';
    $stLedgerRecords->StockIn = 0;
    $stLedgerRecords->StockOut = 0;
    $stLedgerRecords->Balance = $MBalance;
    info($stLedgerRecords);
    $stLedgerRecords->save();
    $TxtTotStockOut =0;
    $TxtTotStockIn =0;


    $InvoiceDetail = InvoiceDetail::whereIn('Type', ['PURC', 'RETN', 'OPSTK', 'PURE', 'GNIN', 'GNOU', 'STAJ'])
    ->where('TotQty', '<>', 0)
    ->where('GodownCode', $TxtLocationCode)
    ->where('ItemCode', $TxtArticleCode)
    ->whereBetween('Date', [$TxtDateFrom, $TxtDateTo])
    ->orderBy('Date')
    ->orderBy('InvoiceNo')
    ->get();


    if(count($InvoiceDetail) > 0){

        for ($i=0; $i <count($InvoiceDetail) ; $i++) {
            info($InvoiceDetail[$i]->ItemCode);
            $stLedgerRecords = new StLedger;
            $stLedgerRecords->ItemCode = $TxtArticleCode;
            $stLedgerRecords->ItemName = $TxtArticleName;
            $stLedgerRecords->Date = $InvoiceDetail[$i]->Date;
            $stLedgerRecords->Vnon = $InvoiceDetail[$i]->InvoiceNo;
            $stLedgerRecords->PONO = $InvoiceDetail[$i]->PONO;
            $stLedgerRecords->DepartmentName = $InvoiceDetail[$i]->DepartmentName;
            $stLedgerRecords->Des = $InvoiceDetail[$i]->ActName;
            $stLedgerRecords->REfNo = $InvoiceDetail[$i]->RefNo;
            $stLedgerRecords->Type = $InvoiceDetail[$i]->Type;
            $stLedgerRecords->UOM = $LblUom;
            $stLedgerRecords->GodownCode = $TxtLocationCode;
            $stLedgerRecords->GodownName = $TxtLocationName;
            $stLedgerRecords->BranchCode = $MBranchCode;
            $stLedgerRecords->Workuser = $MWorkUser;

            if($InvoiceDetail[$i]->Type == 'PURC' || $InvoiceDetail[$i]->Type == 'RETN' || $InvoiceDetail[$i]->Type == 'OPSTK' || $InvoiceDetail[$i]->Type == 'GNIN' || $InvoiceDetail[$i]->Type == 'STAJ'){
                $stLedgerRecords->StockIn = $InvoiceDetail[$i]->TotQty;
                $stLedgerRecords->Stockout = 0;
                $stLedgerRecords->Rate = $InvoiceDetail[$i]->TradePrice;
                $MAmount =  $InvoiceDetail[$i]->TradePrice*$InvoiceDetail[$i]->TotQty;
                $stLedgerRecords->Amount = $MAmount;
                $TxtTotStockIn = $InvoiceDetail[$i]->TotQty;
                $MBalance = $MBalance + $InvoiceDetail[$i]->TotQty;
            }else if($InvoiceDetail[$i]->Type == 'PURE' || $InvoiceDetail[$i]->Type == 'GNOU' ){
                $stLedgerRecords->StockIn = 0;
                $stLedgerRecords->Stockout = $InvoiceDetail[$i]->TotQty;
                $MBalance = $MBalance + $InvoiceDetail[$i]->TotQty;
                $MAmount =  $InvoiceDetail[$i]->TradePrice*$InvoiceDetail[$i]->TotQty;
                $stLedgerRecords->Amount = $MAmount;
                $TxtTotStockIn = $InvoiceDetail[$i]->TotQty;
            }
            $stLedgerRecords->Balance = $MBalance;
            $stLedgerRecords->save();

        }
    }

$OrderModel = OrderModel::where('GodownCode', $TxtLocationCode)
    ->where('OrderQty', '<>', 0)
    ->where('STKBuyOut', 'Stock')
    ->where('ItemCode', $TxtArticleCode)
    ->whereBetween('OrderDate', [$TxtDateFrom, $TxtDateTo])
    ->orderBy('VSNNo')
    ->orderBy('PONo')
    ->orderBy('OrderDate')
    ->get();

    if(count($OrderModel) > 0){

        for ($i=0; $i <count($OrderModel) ; $i++) {
            info($OrderModel[$i]->ItemCode);
            $stLedgerRecords = new StLedger;

            $stLedgerRecords->ItemCode = $TxtArticleCode;
            $stLedgerRecords->ItemName = $TxtArticleName;
            $stLedgerRecords->Date = isset($OrderModel[$i]->OrderDate) ? $OrderModel[$i]->OrderDate : "";
            $stLedgerRecords->Vnon = isset($OrderModel[$i]->PONO) ? $OrderModel[$i]->PONO : "";
            $stLedgerRecords->DepartmentName = isset($OrderModel[$i]->DepartmentName) ? $OrderModel[$i]->DepartmentName : "";
            $stLedgerRecords->REfNo = isset($OrderModel[$i]->VSNNo) ? $OrderModel[$i]->VSNNo : 0;
            $stLedgerRecords->Type = "SALE";
            $stLedgerRecords->UOM = $LblUom;
            $stLedgerRecords->GodownCode = $TxtLocationCode;
            $stLedgerRecords->GodownName = $TxtLocationName;
            $stLedgerRecords->BranchCode = $MBranchCode;
            $stLedgerRecords->Workuser = $MWorkUser;
            $stLedgerRecords->StockIn = 0;
            $stLedgerRecords->Stockout = isset($OrderModel[$i]->OrderQty) ? $OrderModel[$i]->OrderQty : 0;
            $stLedgerRecords->Des = (isset($OrderModel[$i]->CustomerName) ? $OrderModel[$i]->CustomerName : "") . " / " . (isset($OrderModel[$i]->VesselName) ? $OrderModel[$i]->VesselName : "");
            $stLedgerRecords->Rate = isset($OrderModel[$i]->Price) ? $OrderModel[$i]->Price : 0;
            $MAmount = (isset($OrderModel[$i]->Price) ? $OrderModel[$i]->Price : 0) * (isset($OrderModel[$i]->OrderQty) ? $OrderModel[$i]->OrderQty : 0);
            $stLedgerRecords->Amount = round($MAmount, 2);
            $MBalance = $MBalance - (isset($OrderModel[$i]->OrderQty) ? $OrderModel[$i]->OrderQty : 0);
            $stLedgerRecords->Balance = $MBalance;
            $TxtTotStockOut = $TxtTotStockOut + (isset($OrderModel[$i]->OrderQty) ? $OrderModel[$i]->OrderQty : 0);
            $stLedgerRecords->save();

        }
    }
    $OrderDetail = OrderModel::where('STKBuyOut', 'Stock')
    ->where('ReturnQty', '<>', 0)
    ->where('GodownCode', $TxtLocationCode)
    ->where('ItemCode', $TxtArticleCode)
    ->whereBetween('OrderDate', [$TxtDateFrom, $TxtDateTo])
    ->orderBy('VSNNo')
    ->orderBy('PONo')
    ->orderBy('OrderDate')
    ->get();

    if(count($OrderDetail) > 0){

        for ($i=0; $i <count($OrderDetail) ; $i++) {
            info($OrderDetail[$i]->ItemCode);
            $stLedgerRecords->ItemCode = $TxtArticleCode;
            $stLedgerRecords->ItemName = $TxtArticleName;
            $stLedgerRecords->Date = isset($OrderDetail[$i]->OrderDate) ? $OrderDetail[$i]->OrderDate : "";
            $stLedgerRecords->Vnon = isset($OrderDetail[$i]->PONO) ? $OrderDetail[$i]->PONO : "";
            $stLedgerRecords->DepartmentName = isset($OrderDetail[$i]->DepartmentName) ? $OrderDetail[$i]->DepartmentName : "";
            $stLedgerRecords->Des = (isset($OrderDetail[$i]->CustomerName) ? $OrderDetail[$i]->CustomerName : "") . " / " . (isset($OrderDetail[$i]->VesselName) ? $OrderDetail[$i]->VesselName : "");
            $stLedgerRecords->REfNo = isset($OrderDetail[$i]->VSNNo) ? $OrderDetail[$i]->VSNNo : 0;
            $stLedgerRecords->Type = "RETN";
            $stLedgerRecords->UOM = $LblUom;
            $stLedgerRecords->GodownCode = $TxtLocationCode;
            $stLedgerRecords->GodownName = $TxtLocationName;
            $stLedgerRecords->BranchCode = $MBranchCode;
            $stLedgerRecords->Workuser = $MWorkUser;
            $stLedgerRecords->Rate = isset($OrderDetail[$i]->Price) ? $OrderDetail[$i]->Price : 0;
            $stLedgerRecords->Amount = (isset($OrderDetail[$i]->Price) ? $OrderDetail[$i]->Price : 0) * (isset($OrderDetail[$i]->OrderQty) ? $OrderDetail[$i]->OrderQty : 0);
            $stLedgerRecords->StockIn = isset($OrderDetail[$i]->ReturnQty) ? $OrderDetail[$i]->ReturnQty : 0;
            $stLedgerRecords->Stockout = 0;
            $MBalance = $MBalance + (isset($OrderDetail[$i]->ReturnQty) ? $OrderDetail[$i]->ReturnQty : 0);
            $TxtTotStockOut = $TxtTotStockOut + (isset($OrderDetail[$i]->ReturnQty) ? $OrderDetail[$i]->ReturnQty : 0);
            $stLedgerRecords->Balance = $MBalance;


        }

    }
    $StLedger =StLedger::Select('Date','Vnon','PONO','Type','DepartmentName','Des','StockIn','StockOut','Balance','Rate','Amount')->where('WorkUser',$MWorkUser)->where('BranchCode',$MBranchCode)->orderBy('Date')->orderBy('Vnon')->orderBy('Type','desc')->get();

    if($StLedger){
        $status = 'complete';

    }
    // dd($BranchSetup);
    return response()->json([
        'TxtBalance' => $MBalance,
        'TxtTotStockIn' => $TxtTotStockIn,
        'TxtTotStockOut' => $TxtTotStockOut,
        'status' => $status,
        'StLedger' => $StLedger,
    ]);


}
public function FillPullStockCalStockLedgersave(Request $request){
    $MBranchCode = Auth::user()->BranchCode;
    $MWorkUser =config('app.MUserName');
    $PVendorcode= 756;
    $status = 'Start';
    $TxtLocationCode = $request->input('TxtLocationCode');
    $TxtLocationName = $request->input('TxtLocationName');
    $TxtArticleCode = $request->input('TxtArticleCode');
    $TxtArticleName = $request->input('TxtArticleName');
    $LblUom = $request->input('LblUom');
    $TxtDateFrom = $request->input('TxtDateFrom');
    $TxtDateTo = $request->input('TxtDateTo');
    $MDateFrom = $request->input('MDateFrom');
    $MDateTo = $request->input('MDateTo');
    $Backlogdate = $request->input('Backlogdate');

    StLedger::where('BranchCode',$MBranchCode)->where('WorkUser',$MWorkUser)->delete();


    $MPurQty = InvoiceDetail::select(DB::raw('SUM(TotQty) as MPurQty'))->whereIn('Type', ['MTSTK', 'PMSTK','OPSTK','RETN','SLRE','PURC','GNIN','STAJ'])
    ->where('GodownCode', $TxtLocationCode)
    ->where('ItemCode', $TxtArticleCode)
    ->whereBetween('Date', [$Backlogdate, $TxtDateFrom])
    ->where('BranchCode', $MBranchCode)
    ->first();
// info($MPurQty->MPurQty);
    if($MPurQty->MPurQty){
        $MPurQty = $MPurQty->MPurQty;
    }else{
        $MPurQty = 0;

    }
    $MPureQty = InvoiceDetail::select(DB::raw('SUM(TotQty) as MPureQty'))->whereIn('Type', ['DSAL','PULSTK','WAST','PURE','GNOU'])
    ->where('GodownCode', $TxtLocationCode)
    ->where('ItemCode', $TxtArticleCode)
    ->whereBetween('Date', [$Backlogdate, $TxtDateFrom])
    ->where('BranchCode', $MBranchCode)
    ->first();
    if($MPureQty->MPureQty){
        $MPurRetQty = $MPureQty->MPureQty;
    }else{
        $MPurRetQty = 0;

    }
    $MTotQtyOp = $MPurQty - $MPurRetQty;
    $MBalance = $MTotQtyOp;

    $stLedgerRecords = new StLedger;
    $stLedgerRecords->ITemCode = $TxtArticleCode;
    $stLedgerRecords->ItemName = $TxtArticleName;
    $stLedgerRecords->UOM = $LblUom;
    $stLedgerRecords->Date =$TxtDateFrom;
    $stLedgerRecords->GodownCode = $TxtLocationCode;
    $stLedgerRecords->GodownName = $TxtLocationName;
    $stLedgerRecords->BranchCode = $MBranchCode;
    $stLedgerRecords->Workuser = $MWorkUser;
    $stLedgerRecords->Des = 'Balance B/f.........';
    $stLedgerRecords->Type = 'Opening';
    $stLedgerRecords->StockIn = 0;
    $stLedgerRecords->StockOut = 0;
    $stLedgerRecords->Balance = $MBalance;
    info($stLedgerRecords);
    $stLedgerRecords->save();

    $TxtTotStockOut =0;
    $TxtTotStockIn =0;


    $InvoiceDetail = InvoiceDetail::where('TotQty', '<>', 0)
    ->where('Type', '<>', 'SALE')
    ->where('GodownCode', $TxtLocationCode)
    ->where('ItemCode', $TxtArticleCode)
    ->whereBetween('Date', [$TxtDateFrom, $TxtDateTo])
    ->orderBy('Date')
    ->orderBy('InvoiceNo')
    ->orderBy('Type','desc')
    ->orderBy('ID')
    ->get();


    if(count($InvoiceDetail) > 0){

        for ($i=0; $i <count($InvoiceDetail) ; $i++) {
            info($InvoiceDetail[$i]->ItemCode);
            $stLedgerRecords = new StLedger;
            $stLedgerRecords->ItemCode = $TxtArticleCode;
            $stLedgerRecords->ItemName = $TxtArticleName;
            $stLedgerRecords->Date = $InvoiceDetail[$i]->Date;
            $stLedgerRecords->Vnon = $InvoiceDetail[$i]->InvoiceNo;
            $stLedgerRecords->PONO = $InvoiceDetail[$i]->PONO;
            $stLedgerRecords->DepartmentName = $InvoiceDetail[$i]->DepartmentName;
            $MMType11 = $InvoiceDetail[$i]->Type;
            // $TxtTotStockOut = $TxtTotStockOut + $InvoiceDetail[$i]->TotQty;
            $stLedgerRecords->Des = $InvoiceDetail[$i]->ActName;
            $stLedgerRecords->REfNo = $InvoiceDetail[$i]->RefNo;
            $stLedgerRecords->Type = $InvoiceDetail[$i]->Type;
            $stLedgerRecords->UOM = $LblUom;
            $stLedgerRecords->GodownCode = $TxtLocationCode;
            $stLedgerRecords->GodownName = $TxtLocationName;
            $stLedgerRecords->BranchCode = $MBranchCode;
            $stLedgerRecords->Workuser = $MWorkUser;

            if($InvoiceDetail[$i]->Type == 'PMSTK' || $InvoiceDetail[$i]->Type == 'MTSTK' || $InvoiceDetail[$i]->Type == 'PURC' || $InvoiceDetail[$i]->Type == 'RETN' || $InvoiceDetail[$i]->Type == 'OPSTK' || $InvoiceDetail[$i]->Type == 'GNIN' || $InvoiceDetail[$i]->Type == 'STAJ'){
                $stLedgerRecords->StockIn = $InvoiceDetail[$i]->TotQty;
                $stLedgerRecords->Stockout = 0;
                $stLedgerRecords->Rate = $InvoiceDetail[$i]->TradePrice;
                $MAmount =  $InvoiceDetail[$i]->TradePrice*$InvoiceDetail[$i]->TotQty;
                $stLedgerRecords->Amount = $MAmount;
                $TxtTotStockIn = $TxtTotStockIn + $InvoiceDetail[$i]->TotQty;
                $MInvoiceNo = $InvoiceDetail[$i]->InvoiceNo;
                $MTotQty = $InvoiceDetail[$i]->TotQty;

                $MBalance = $MBalance + $MTotQty;
            }else if($InvoiceDetail[$i]->Type == 'PURE' || $InvoiceDetail[$i]->Type == 'GNOU' || $InvoiceDetail[$i]->Type == 'PULSTK' || $InvoiceDetail[$i]->Type == 'DSAL' || $InvoiceDetail[$i]->Type == 'WAST'){
                $stLedgerRecords->StockIn = 0;
                $stLedgerRecords->Stockout = $InvoiceDetail[$i]->TotQty;
                $MBalance = $MBalance - $InvoiceDetail[$i]->TotQty;
                $stLedgerRecords->Rate = $InvoiceDetail[$i]->TradePrice;
                $MAmount =  $InvoiceDetail[$i]->TradePrice*$InvoiceDetail[$i]->TotQty;
                $stLedgerRecords->Amount = $MAmount;
                $TxtTotStockOut = $TxtTotStockOut + $InvoiceDetail[$i]->TotQty;
            }
            $stLedgerRecords->Balance = $MBalance;
            $stLedgerRecords->save();

        }
    }
    $StLedger =StLedger::Select('Date','Vnon','PONO','Type','DepartmentName','Des','StockIn','StockOut','Balance','Rate','Amount')->where('WorkUser',$MWorkUser)->where('BranchCode',$MBranchCode)->orderBy('Date')->orderBy('Vnon')->orderBy('Type','desc')->get();
    if($StLedger){
        $status = 'complete';

    }


    return response()->json([
        'status' => $status,
        'TxtBalance' => $MBalance,
        'TxtTotStockOut' => $TxtTotStockOut,
        'TxtTotStockIn' => $TxtTotStockIn,
        'StLedger' => $StLedger,

    ]);
}


public function StockItemSetup(){
    $BranchCode = config('app.MBranchCode');
    $VenderSetup = VenderSetup::where('VenderName','<>','','OR','Address','<>','','OR','PhoneNo','<>','','OR','EmailAddress','<>','')->orderby('VenderName')->get();
    $companysetup = CompanySetup::where('BranchCode',$BranchCode)->first();
    // $origin = DB::select("Select Distinct(OriginName) From OriginSetup where BranchCode='$BranchCode' order by OriginName");
    $origin = DB::table('originsetup')->where('BranchCode',$BranchCode)->distinct()->orderBy('OriginName')->get();
    // $UOM = DB::select("Select Distinct(UOM) from ItemSetup where BranchCode='$BranchCode'");
    $UOM = ItemSetup::where('BranchCode',$BranchCode)->distinct()->get();
    // $PORT = DB::select("select * from ShipingPortSetup where BranchCode='$BranchCode' Order by PortCode");
    $PORT = ShipingPortSetup::where('BranchCode',$BranchCode)->distinct()->orderBy('PortCode')->get();
    // $Category = DB::select("Select distinct(CategoryName) from CategorySetup where  BranchCode='$BranchCode'");
    $Category = CategoryModel::where('BranchCode',$BranchCode)->distinct('CategoryName')->get();
    // $Department = DB::select("Select TypeName from TypeSetup where  BranchCode='$BranchCode'");
    $Department = Typesetup::where('BranchCode',$BranchCode)->distinct()->get();
    $GodownSetup = GodownSetup::where('ChkNotShow',0)->orWhere('ChkNotShow',Null)->where('BranchCode',$BranchCode)->get();


    return view('Stockproductlist', [

        'VenderSetup'=>$VenderSetup,
        'company'=>$companysetup,
        'origin'=>$origin,
        'UOM'=>$UOM,
        'PORT'=>$PORT,
        'Category'=>$Category,
        'Department'=>$Department,
        'GodownSetup'=>$GodownSetup,
    ]);

    }

    public function stockitem_store(Request $request){
        $BranchCode = config('app.MBranchCode');

        // dump($request->all());

        $checkitem = VenderProductList::where('VenderCode',$request->vendorcode)->where('ItemCode',$request->Productcode)->where('BranchCode',$BranchCode)->first();
// dd($checkitem);
try {
    if (!$checkitem) {
       $saveitem = new VenderProductList([
            "VenderName" => $request->Vendor
           ,"VenderCode" => $request->vendorcode
           ,"ItemCode" => $request->Productcode
           ,"Date" => $request->Date
           ,"IMPAItemCode" => $request->IMPACode
           ,"ItemName" => $request->ProductName
           ,"Remarks" => $request->Remarks
           ,"UOM" => $request->UOM
           ,"LastDate" => $request->LastUpdateDate
           ,"OriginName" => $request->Orign
           ,"LastRate" => $request->Lastprice
           ,"VendorPrice" => $request->VendorPrice
           ,"FixedPrice" => $request->SalePrice
           ,"Currency" => $request->Currency
           ,"Freight" => $request->Freight
           ,"PortName" => $request->Port
           ,"VCategoryName" => $request->Category
           ,"CategoryCode" => $request->Categorycode
           ,"DepartmentCode" => $request->Department
        //    ,"Vendoritembox" => $request->Vendoritembox
        ]);
    $saveitem->save();
    } else {
        $checkitem->update([
            "VenderName" => $request->Vendor
            ,"VenderCode" => $request->vendorcode
            ,"ItemCode" => $request->Productcode
            ,"Date" => $request->Date
            ,"IMPAItemCode" => $request->IMPACode
            ,"ItemName" => $request->ProductName
            ,"Remarks" => $request->Remarks
            ,"UOM" => $request->UOM
            ,"LastDate" => $request->LastUpdateDate
            ,"OriginName" => $request->Orign
            ,"LastRate" => $request->Lastprice
            ,"VendorPrice" => $request->VendorPrice
            ,"FixedPrice" => $request->SalePrice
            ,"Currency" => $request->Currency
            ,"Freight" => $request->Freight
            ,"PortName" => $request->Port
            ,"VCategoryName" => $request->Category
            ,"CategoryCode" => $request->Categorycode
            ,"DepartmentCode" => $request->Department
        ]);
        // DD('saveitem');
        // DD('Update');

    }
 return redirect()->back()->with('success','Item Saved');
} catch (\Throwable $th) {
    // dd('error');
    return redirect()->back()->with('error','Item Not Saved Error'.$th);
}



    }

    public function populateitems(Request $request){
        $BranchCode = config('app.MBranchCode');
        $FixAccountSetup = FixAccountSetup::where('BranchCode',$BranchCode)->first();
        $BackLogStockDate = $FixAccountSetup->BackLogStockDate;
        $Date = $request->today;
        // $Poup = DB::select("Select * from VenderProductList where VenderCode='$request->VenderCode' and ItemCode='$request->ItemCode' and BranchCode='$BranchCode'");
        $Poup = VenderProductList::where('VenderCode',$request->VenderCode)->where('ItemCode',$request->ItemCode)->where('BranchCode',$BranchCode)->first();
        $catagorycode = $Poup->CategoryCode;
        if($catagorycode){
            // info($catagorycode);

        }else{
            $catagorycode = 1;
        }
        // $Category = DB::select("Select CategoryName from CategorySetup where CategoryCode='1' AND BranchCode='$BranchCode'");
        $Category = CategoryModel::select('CategoryName')->where('CategoryCode',$catagorycode)->where('BranchCode',$BranchCode)->get();

        $GodownSetup = GodownSetup::where('ChkNotShow',0)->orWhere('ChkNotShow',Null)->where('BranchCode',$BranchCode)->get();
        $result = [];
        for ($i=0; $i <count($GodownSetup) ; $i++) {
        $PItemCode= $request->ItemCode;
        $PGodownCode1 = $GodownSetup[$i]->GodownCode;
        $SPCurrentStock = DB::select(DB::raw('SET NOCOUNT ON; DECLARE @Pur decimal(8,2), @Sal decimal(8,2), @StockQty decimal(8,2); EXEC SPPPullCurrentStock @ItemCode = ?, @GodownCode = ?, @BranchCode = ?, @Date = ?, @DateFrom = ?, @Pur = @Pur OUTPUT, @Sal = @Sal OUTPUT, @StockQty = @StockQty OUTPUT; SELECT @Pur AS Pur, @Sal AS Sal, @StockQty AS StockQty;'), [$PItemCode,$PGodownCode1,$BranchCode,$Date,$BackLogStockDate]);
        $MStock1 = $SPCurrentStock[0]->StockQty;
        $MCUrrStock = $MStock1;
        $result = [
            'GodownCode' => $GodownSetup[$i]->GodownCode,
            'GodownName' => $GodownSetup[$i]->GodownName,
            'Quantity' => $MCUrrStock
        ];

        $results[] = $result;

        }
        // info($Category);

        return response()->json([
            'Productcode' => $Poup->ItemCode,
            'VenderName' => $Poup->VenderName,
            'VenderCode' => $Poup->VenderCode,
            'Date' => $Poup->Date,
            'ItemName' => $Poup->ItemName,
            'IMPAItemCode' => $Poup->IMPAItemCode,
            'Remarks' => $Poup->Remarks,
            'UOM' => $Poup->UOM,
            'LastDate' => $Poup->LastDate,
            'LastRate' => $Poup->LastRate,
            'OriginName' => $Poup->OriginName,
            'VendorPrice' => $Poup->VendorPrice,
            'FixedPrice' => $Poup->FixedPrice,
            'Currency' => $Poup->Currency,
            'Freight' => $Poup->Freight,
            'PortName' => $Poup->PortName,
            'CategoryCode' => $Poup->CategoryCode,
            'DepartmentCode' => $Poup->DepartmentCode,
            'BarCode' => $Poup->BarCode,
            'Categorybox' => $Category,
            'GodownSetup' => $GodownSetup,
            'results' => $results,
        ]);
    }


}
