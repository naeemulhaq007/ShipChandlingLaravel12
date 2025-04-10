<?php

namespace App\Http\Controllers;
use Yajra\DataTables\Facades\DataTables;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\VenderProductList;
use App\Models\testlocal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
   public function cussearch(Request $request){
      $branchcode = Auth::user()->BranchCode;

      if($request->ajax())
      {
        // $country = 9401607;
           $output="";
        //   $products=Customer::where('Status','=','Active','and','ChkInactive','<>','1','and','CustomerName','LIKE',''.$request->cussearch."%",'and','BranchCode','=',''.$branchcode.'')->get();
        $products = Customer::where('ChkInactive', '<>', '1')
                    ->where('Status', '<>', '')
                    ->where('Status', '<>', 'I')
                    ->where('Status', '<>', 'Inactive')
                    ->where('CustomerName', 'LIKE', '%'.$request->cussearch.'%')
                    ->where('BranchCode', '=', $branchcode)
                    ->get();

        //   $products = DB::select("select * from CustomerSetup inner join CustomerDiscount on CustomerDiscount.CustomerCode = CustomerSetup.CustomerCode where CustomerSetup.CustomerName LIKE '%".$request->cussearch."%' and CustomerSetup.BranchCode = ".$branchcode."");
        // data-smanasale="'.$smanasale.'"
        if($products)
              {
               foreach ($products as $key => $product) {
                // if ($product->SManCode===null) {
                //     $smanasale = '';
                // } else {
                    // $salesmancodeg = DB::table('SalesManSetup')->select('SManName')->where('SManCode',$product->SManCode)->first();
                //     $smanasale = $salesmancodeg->SManName;
                // }


                // info($salesmancodeg->SManName);
                  $output.='
                  <tr class="js-click js-clickq" id="'.$product->CustomerName.'" data-id="'.$product->CustomerName.'"
                   data-cusname="'.$product->CustomerName.'" data-custcode="'.$product->CustomerCode.'"
                   data-cuscode="'.$product->CusCode.'" data-act="'.$product->ActCode.'" data-Address="'.$product->Address.'"
                   data-CallSign="'.$product->CallSign.'" data-PhoneNo="'.$product->PhoneNo.'" data-FaxNo="'.$product->FaxNo.'"
                   data-EmailAddress="'.$product->EmailAddress.'" data-WebAddress="'.$product->WebAddress.'" data-BContactPerson="'.$product->BContactPerson.'"
                   data-BillingAddress="'.$product->BillingAddress.'" data-BTelephoneNo="'.$product->BTelephoneNo.'" data-BFaxNo="'.$product->BFaxNo.'"
                   data-BEmailAddress="'.$product->BEmailAddress.'" data-BWeb="'.$product->BWeb.'" data-Status="'.$product->Status.'" data-ChkInactive="'.$product->ChkInactive.'"
                   data-CreditLimit="'.$product->CreditLimit.'" data-Country="'.$product->Country.'" data-BranchCode="'.$product->BranchCode.'"
                   data-Terms="'.$product->Terms.'" data-EventQuateCharges="'.$product->EventQuateCharges.'" data-City="'.$product->City.'"
                   data-CustomerDiscPer="'.$product->CustomerDiscPer.'" data-InvoiceDiscPer="'.$product->InvoiceDiscPer.'" data-SalesManCommPer="'.$product->SalesManCommPer.'"
                   data-RebaitPer="'.$product->RebaitPer.'" data-CreditNotePer="'.$product->CreditNotePer.'" data-AgentCommPer="'.$product->AgentCommPer.'"
                   data-BankDetail="'.$product->BankDetail.'" data-Priority="'.$product->Priority.'" data-EnterCustomer="'.$product->EnterCustomer.'"
                   data-CType="'.$product->CType.'" data-Vtype="'.$product->Vtype.'" data-CustCategory="'.$product->CustCategory.'"
                   data-AreaofBusiness="'.$product->AreaofBusiness.'" data-AreaCode="'.$product->AreaCode.'" data-ContactPerson="'.$product->ContactPerson.'"
                   data-StateName="'.$product->StateName.'" data-CashDiscPer="'.$product->CashDiscPer.'" data-MobileNo="'.$product->MobileNo.'"
                   data-smancode="'.$product->SManCode.'" data-SManActCode="'.$product->SManActCode.'" data-WorkUser="'.$product->WorkUser.'"
                   data-AgentCode="'.$product->AgentCode.'" data-AgentActCode="'.$product->AgentActCode.'" data-AssignUser="'.$product->AssignUser.'"
                   data-LastEditDateTime="'.$product->LastEditDateTime.'"


                    >'.

                  '<td  id="'.$product->CusCode.'" >'.$product->CustomerCode.'</td>'.
                  '<td id="'.$product->ActCode.'" >'.$product->CustomerName.'</td>'.
                  '<td id="'.$product->CustomerCode.'">'.$product->Address.'</td>'.
                  '<td id="'.$product->CustomerCode.'" >'.$product->EmailAddress.'</td>'.
                  '<td id="'.$product->Status.'" >'.$product->Status.'</td>'.
                  '</tr>';
                    }


              return Response($output);
               }
      }
                                        }

   public function itemnameserimpa(Request $request){
    $BranchCode = Auth::user()->BranchCode ;
    $impa = $request->impa;
    info($impa);
$item = DB::table('qryvenderproductlist')
    ->select('ItemCode', 'ItemName','Type','VendorPrice','VenderCode','VenderName','OurPrice','UOM','VPartCode','LastDate')
    ->where(function ($query) {
        $query->where('ChkInactive', 0)
              ->orWhereNull('ChkInactive');
    })
    ->where('IMPAItemCode', $impa)
    ->where('BranchCode', intval($BranchCode))
    ->orderBy('Type', 'desc')
    ->orderBy('LastDate', 'desc')
    ->orderBy('ID', 'desc')
    ->limit(10)
    ->get();

info($item);
return response()->json($item);
   }
// info($ITemCode);
// return response()->json([
//     'item' => $item,
//     'ItemName' => $ItemName,
//     'Code' => 'Success',
// ]);

    // }
public function searchvendor(Request $request){
    $BranchCode = Auth::user()->BranchCode ;
    $VenderCode = $request->input('VenderCode');
    $itemname = $request->input('itemname');
    $VenderProductList = VenderProductList::where('VenderCode',$VenderCode)->where('ItemName',$itemname)->first();


    if($VenderProductList){
        return response()->json( [
            'status'=> 'Success' ,
            'BranchCode' => $BranchCode,
            'VenderProductList' => $VenderProductList,
        ]);
    }else{
        return response()->json( [
            'status'=> 'error' ,
            'BranchCode' => $BranchCode,
            'VenderProductList' => $VenderProductList,
        ]);
    }

}
   public function indexitema(Request $request)
   {
    $BranchCode = Auth::user()->BranchCode ;
    $GodownCode = $request->input('GodownCode');
    $DateTo = date('Y-m-d');
    $DateFrom = "2019-08-28";
    $ItemName = $request->input('ItemName');
    $DepartmentCode = $request->input('DepartmentCode');
    $ChkDeckEngin = $request->input('ChkDeckEngin');

    info($ChkDeckEngin);
    $gitem = DB::select(DB::raw("SET NOCOUNT ON ;exec SPVendorProductListWithStock @BranchCode='$BranchCode',@GodownCode='$GodownCode',@DateTo='$DateTo',@DateFrom='$DateFrom',@ItemName='$ItemName',@DepartmentCode='$DepartmentCode',@ChkDeckEngin='$ChkDeckEngin'"));

    return response()->json($gitem);
   }
   public function indexitem(Request $request)
   {
    //    info($request->all());

       $BranchCode = Auth::user()->BranchCode;
       $GodownCode = $request->input('GodownCode');
       $DateTo = date('Y-m-d');
       $DateFrom = "2019-08-28";
       $ItemName = $request->input('ItemNameq');
       $DepartmentCode = $request->input('DepartmentCode');
       $ChkDeckEngin = $request->input('ChkDeckEngin');
    //    info('item'.$ItemName);
    //    info($DepartmentCode);
    //    info($ChkDeckEngin);
    //    $gitem = DB::select(DB::raw("SET NOCOUNT ON ;exec SPVendorProductListWithStock @BranchCode='$BranchCode',@GodownCode='$GodownCode',@DateTo='$DateTo',@DateFrom='$DateFrom',@ItemName='$ItemName',@DepartmentCode='$DepartmentCode',@ChkDeckEngin='$ChkDeckEngin'"));
//     $gitem = DB::select(DB::raw("SET @BranchCode = $BranchCode, @GodownCode = $GodownCode, @DateTo = '$DateTo', @DateFrom = '$DateFrom', @ItemName = '$ItemName', @DepartmentCode = '$DepartmentCode', @ChkDeckEngin = $ChkDeckEngin;"));
// $gitem = DB::select(DB::raw("CALL SPVendorProductListWithStock(@BranchCode, @GodownCode, @DateTo, @DateFrom, @ItemName, @DepartmentCode, @ChkDeckEngin)"));
try {
    $gitem = DB::select(
        "CALL SPVendorProductListWithStock(:BranchCode, :GodownCode, :DateTo, :DateFrom, :SearchItemName, :DepartmentCode, :ChkDeckEngin)",
        [
            'BranchCode' => $BranchCode,
            'GodownCode' => $GodownCode,
            'DateTo' => $DateTo,
            'DateFrom' => $DateFrom,
            'SearchItemName' => $ItemName,
            'DepartmentCode' => $DepartmentCode,
            'ChkDeckEngin' => (int)$ChkDeckEngin,
        ]
    );
} catch (\Exception $e) {
    info('Stored Procedure Error: ' . $e->getMessage());
    // Handle error gracefully
}


    //    info($gitem);

       return response()->json($gitem);
   }
   public function venconitem(Request $request)
   {
    $query = $request->input('query');
    $TxtDepartmentCode1 = $request->input('TxtDepartmentCode1');
    $TxtVenderCode = $request->input('TxtVenderCode');
    $TxtItemName = $request->input('TxtItemName');
    $TxtIMPANO = $request->input('TxtIMPANO');
    $TxtComputerNo = $request->input('TxtComputerNo');

    // Perform the database query using Eloquent Query Builder with the filters
    $MBranchCode = Auth::user()->BranchCode;
    $gitem = DB::table('qryvenderproductlist')
        // ->where('type','<>' ,'K')
        // ->where('ComputerNo', $TxtComputerNo)
        ->where('BranchCode', $MBranchCode);

    // Add the dynamic filter conditions if they exist
    // if (!empty($query)) {
    //     $gitem = $gitem->whereRaw($query);
    // }
    if ($TxtDepartmentCode1 !== null && $TxtDepartmentCode1 !== '' && $TxtDepartmentCode1 !== 0) {
        $TxtDepartmentCode1 = (int)$TxtDepartmentCode1; // Convert to integer if needed
        $gitem = $gitem->where('DepartmentCode', $TxtDepartmentCode1);
    }
    if ($TxtVenderCode !== null && $TxtVenderCode !== '' && $TxtVenderCode !== 0) {
        $TxtVenderCode = (int)$TxtVenderCode; // Convert to integer if needed
        $gitem = $gitem->where('VenderCode', $TxtVenderCode);
    }
    if (!empty($TxtItemName)) {
        $gitem = $gitem->where('ItemName', 'like', '%' . $TxtItemName . '%');
    }
    if (!empty($TxtIMPANO)) {
        $gitem = $gitem->where('IMPAItemCode', 'like', '%' . $TxtIMPANO . '%');
    }

    // Execute the query and get the results
    $gitem = $gitem->get();
    info($gitem);
       return response()->json($gitem);
   }



   public function itemnameser(Request $request){
    $BranchCode = Auth::user()->BranchCode ;
$GodownCode = $request->GodownCode;
$DateTo = date('Y-m-d');
$DateFrom = "2019-08-28";
$ItemName = $request->itemnameser;
// info($ItemNames);
// $ItemName = "glove%";
$DepartmentCode=$request->DepartmentCode;
$ChkDeckEngin =$request->ChkDeckEngin;

      if($request->ajax())
      {

$gitem = DB::select(DB::raw("SET NOCOUNT ON ;exec SPVendorProductListWithStock @BranchCode='$BranchCode',@GodownCode='$GodownCode',@DateTo='$DateTo',@DateFrom='$DateFrom',@ItemName='$ItemName',@DepartmentCode='$DepartmentCode',@ChkDeckEngin='$ChkDeckEngin'"));
// dd($gitem);
$output="";

              if($gitem)
              {
                for ($i=0; $i <count($gitem) ; $i++) {
                    if($gitem[$i]->Type == 'STOCK'){
                        $bg = 'style="background-color:green;color:white;"';
                    }else if($gitem[$i]->Type == 'CONTRACT'){
                        $bg = 'style="background-color:yellow;"';
                    }else{
                        $bg='';
                    }
                  $output.='
                  <tr class="itemclas" name="" id="'.$gitem[$i]->ItemCode.'" data-ItemCode="'.$gitem[$i]->ItemCode.'"data-ItemName="'.$gitem[$i]->ItemName.'"data-UOM="'.$gitem[$i]->UOM.'"
                  data-IMPAItemCode="'.$gitem[$i]->IMPAItemCode.'"data-LastDate="'.$gitem[$i]->LastDate.'"data-OurPrice="'.round($gitem[$i]->OurPrice,2).'"data-FixedPrice="'.round($gitem[$i]->FixedPrice,2).'"
                  data-StockQty="'.$gitem[$i]->MStockQty.'"data-VenderName="'.$gitem[$i]->VenderName.'"data-TypeName="'.$gitem[$i]->Type.'"data-VendorPartNo="'.$gitem[$i]->VendorPartNo.'"
                  data-VenderCode="'.$gitem[$i]->VenderCode.'" data-dismiss="modal">'.

                  '<td id="">'.$gitem[$i]->ItemCode.'</td>'.
                  '<td id="">'.$gitem[$i]->ItemName.'</td>'.
                  '<td id="">'.$gitem[$i]->UOM.'</td>'.
                  '<td id="">'.$gitem[$i]->IMPAItemCode.'</td>'.
                  '<td id="">'.date("Y-m-d", strtotime($gitem[$i]->LastDate)).'</td>'.
                  '<td id="">'.round($gitem[$i]->OurPrice,2).'</td>'.
                  '<td id="">'.round($gitem[$i]->FixedPrice,2).'</td>'.
                  '<td id="">'.$gitem[$i]->MStockQty.'</td>'.
                  '<td id="">'.$gitem[$i]->VenderName.'</td>'.
                  '<td '.$bg.' id="">'.$gitem[$i]->Type.'</td>'.
                  '<td id="">'.$gitem[$i]->VendorPartNo.'</td>'.
                  '<td id="">'.$gitem[$i]->WorkUser.'</td>'.
                  '<td hidden id="">'.$gitem[$i]->VenderCode.'</td>'.
                  '<td id="">'.$gitem[$i]->ChkStromme.'</td>'.
                  '<td id="">'.$gitem[$i]->Remarks.'</td>'.
                  '</tr>';
                    }
              return Response($output);
               }
      }
                                        }

}
