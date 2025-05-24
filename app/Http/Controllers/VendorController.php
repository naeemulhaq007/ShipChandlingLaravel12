<?php

namespace App\Http\Controllers;

use App\Models\Typesetup;
use App\Models\GodownSetup;
use App\Models\VenderSetup;
use App\Models\CompanySetup;
use App\Models\ItemSetupNew;
use Illuminate\Http\Request;
use App\Models\VenderProductList;
use Illuminate\Support\Facades\DB;
use App\Models\VendorContractMaster;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use Illuminate\Support\Facades\Auth;


class VendorController extends Controller
{
    
    public function saveImportedItems(Request $request)
{
    $items = $request->input('items'); // this should be an array of rows

    foreach ($items as $item) {
        VendorContractItem::create([
            'ItemCode' => $item['ItemCode'],
            'ItemName' => $item['ItemName'],
            'UOM' => $item['UOM'],
            'Qty' => $item['QTY'],
            'VendorPrice' => $item['Price'],
            'VenderName' => $item['Vendor'],
            'VenderCode' => $item['Vendorcode'],
            // Add LastDate, WorkUser, Remarks if needed
        ]);
    }

    return response()->json(['status' => 'success']);
}
public function delete(Request $request)
{
    $VenderCode = $request->VenderCode;
    $BranchCode = Auth::user()->BranchCode;

    try {
        $deleted = DB::table('vendersetup')
            ->where('VenderCode', $VenderCode)
            ->where('BranchCode', $BranchCode)
            ->delete();

        if ($deleted) {
            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['status' => 'failed', 'message' => 'Vendor not found.']);
        }
    } catch (\Exception $e) {
        return response()->json(['status' => 'failed', 'message' => $e->getMessage()]);
    }
}

    
    
    
    
    
   public function VendorItemSetup(){
    $BranchCode = Auth::user()->BranchCode;
    $VenderSetup = VenderSetup::select('VenderCode','VenderName','Address','PhoneNo','EmailAddress')->distinct()->WHERE('VenderName','<>','','OR','Address','<>','','OR','PhoneNo','<>','','OR','EmailAddress','<>','')->orderBy('VenderName')->get();
    $companysetup = CompanySetup::where('BranchCode',$BranchCode)->first();
    $company = $companysetup;

    $origin = DB::table('originsetup')->select("OriginName")->distinct()->where('BranchCode',$BranchCode)->orderBy("OriginName")->get();
    $UOM = DB::table('itemsetup')->select("UOM")->distinct()->where('BranchCode',$BranchCode)->get();
    $PORT = DB::table('shipingportsetup')->where('BranchCode',$BranchCode)->orderBy("PortCode")->get();
    $Category = DB::table('categorysetup')->select("CategoryName")->distinct()->where('BranchCode',$BranchCode)->get();
    $Department = DB::table('typesetup')->select("TypeName")->where('BranchCode',$BranchCode)->get();

    return view('vendor.venderproductlist', [

        'VenderSetup'=>$VenderSetup,
        'company'=>$company,
        'origin'=>$origin,
        'UOM'=>$UOM,
        'PORT'=>$PORT,
        'Category'=>$Category,
        'Department'=>$Department,
    ]);

    }
   public function StockItemSetup(){
    $BranchCode = Auth::user()->BranchCode;
    $VenderSetup = VenderSetup::select('VenderName','Address','PhoneNo','EmailAddress')->distinct()->WHERE('VenderName','<>','','OR','Address','<>','','OR','PhoneNo','<>','','OR','EmailAddress','<>','')->orderby('VenderName')->get();
    $companysetup = CompanySetup::where('BranchCode',$BranchCode)->first();
    $company = $companysetup;
    $origin = DB::table('originsetup')->select("originname")->distinct()->where('BranchCode',$BranchCode)->orderBy("OriginName")->get();
    $UOM = DB::table('itemsetup')->select("UOM")->distinct()->where('BranchCode',$BranchCode)->get();
    $PORT = DB::table('shipingportsetup')->where('BranchCode',$BranchCode)->orderBy("PortCode")->get();
    $Category = DB::table('categorysetup')->select("CategoryName")->distinct()->where('BranchCode',$BranchCode)->get();
    $Department = DB::table('typesetup')->select("TypeName")->where('BranchCode',$BranchCode)->get();

    return view('Stockproductlist', [

        'VenderSetup'=>$VenderSetup,
        'company'=>$company,
        'origin'=>$origin,
        'UOM'=>$UOM,
        'PORT'=>$PORT,
        'Category'=>$Category,
        'Department'=>$Department,
    ]);

    }
    public function vendorselect(Request $request){
         $BranchCode = Auth::user()->BranchCode;
         $PVendorCode = '756';
         if($request->ajax())
         {
            if ($request->vendorselect===null) {
                $vendorserch = DB::select("Select ItemCode,ItemName,IMPAItemCode,VenderCode,VenderName,Case ChkInactive WHEN 1 then 'Y' WHEN 0 then 'N' End as ChkInactive,VCategoryName from VenderProductList where VenderCode<>'$PVendorCode' and  Itemname like '$request->productname%'  and BranchCode='$BranchCode' order by ItemName");

            } else {
                $vendoritemserch = DB::select("Select * from VenderSetup where VenderName='$request->vendorselect' AND BranchCode='$BranchCode'");
                $vendorcode = $vendoritemserch[0]->VenderCode;
                $vendorserch = DB::select("Select ItemCode,ItemName,IMPAItemCode,VenderCode,VenderName,Case ChkInactive WHEN 1 then 'Y' WHEN 0 then 'N' End as ChkInactive,VCategoryName from VenderProductList where VenderCode='$vendorcode' and VenderCode<>'$PVendorCode' and  Itemname like '%'  and BranchCode='$BranchCode' order by ItemName");# code...
            }


       $output="";
       for ($i=0; $i <count($vendorserch) ; $i++) {


        $output.='
        <tr id="rowcell" data-ItemCode="'.$vendorserch[$i]->ItemCode.'" data-VenderCode="'.$vendorserch[$i]->VenderCode.'">'.

        '<td id="">'.$vendorserch[$i]->ItemCode.'</td>'.
        '<td id="">'.$vendorserch[$i]->ItemName.'</td>'.
        // '<td id="">'.$vendorserch[$i]->IMPAItemCode.'</td>'.
        '<td id="">'.$vendorserch[$i]->VenderName.'</td>'.
        '<td id="">'.$vendorserch[$i]->ChkInactive.'</td>'.
        // '<td id="">'.$vendorserch[$i]->VenderCode.'</td>'.
        // '<td id="">'.$vendorserch[$i]->VCategoryName.'</td>'.
        '</tr>';
          }
    return Response($output);


         }
    }
    public function itemselect(Request $request){
         $BranchCode = Auth::user()->BranchCode;
         $PVendorCode = '756';
         if($request->ajax())
         {

                $vendorserch = DB::select("Select * from VenderProductList where VenderCode='$PVendorCode' and (ChkInactive=0 or ChkInactive is Null) and  Itemname like '$request->productname%'  and BranchCode='$BranchCode' order by ItemName");




       $output="";
       for ($i=0; $i <count($vendorserch) ; $i++) {


        $output.='
        <tr id="rowcell" data-ItemCode="'.$vendorserch[$i]->ItemCode.'" data-VenderCode="'.$vendorserch[$i]->VenderCode.'">'.

        '<td id="">'.$vendorserch[$i]->ItemCode.'</td>'.
        '<td id="">'.$vendorserch[$i]->ItemName.'</td>'.
        // '<td id="">'.$vendorserch[$i]->IMPAItemCode.'</td>'.
        '<td id="">'.$vendorserch[$i]->VenderName.'</td>'.
        '<td id="">'.$vendorserch[$i]->ChkInactive.'</td>'.
        // '<td id="">'.$vendorserch[$i]->VenderCode.'</td>'.
        // '<td id="">'.$vendorserch[$i]->VCategoryName.'</td>'.
        '</tr>';
          }
    return Response($output);


         }
    }

    public function populateitemf(Request $request){
        $BranchCode = Auth::user()->BranchCode;

        $Poup = DB::select("Select * from VenderProductList where VenderCode='$request->VenderCode' and ItemCode='$request->ItemCode' and BranchCode='$BranchCode'");
        $catagorycode = $Poup[0]->CategoryCode;
        info($catagorycode);
        $Category = DB::select("Select CategoryName from CategorySetup where CategoryCode='1' AND BranchCode='$BranchCode'");
        info($Category);

        return response()->json([
            'Productcode' => $Poup[0]->ItemCode,
            'VenderName' => $Poup[0]->VenderName,
            'VenderCode' => $Poup[0]->VenderCode,
            'Date' => $Poup[0]->Date,
            'ItemName' => $Poup[0]->ItemName,
            'IMPAItemCode' => $Poup[0]->IMPAItemCode,
            'Remarks' => $Poup[0]->Remarks,
            'UOM' => $Poup[0]->UOM,
            'LastDate' => $Poup[0]->LastDate,
            'LastRate' => $Poup[0]->LastRate,
            'OriginName' => $Poup[0]->OriginName,
            'VendorPrice' => $Poup[0]->VendorPrice,
            'FixedPrice' => $Poup[0]->FixedPrice,
            'Currency' => $Poup[0]->Currency,
            'Freight' => $Poup[0]->Freight,
            'PortName' => $Poup[0]->PortName,
            'CategoryCode' => $Poup[0]->CategoryCode,
            'DepartmentCode' => $Poup[0]->DepartmentCode,
            'Categorybox' => $Category,
        ]);
    }
    public function populateitems(Request $request){
        $BranchCode = Auth::user()->BranchCode;
        // info($request->all());


        $CategoryCode = $request->CategoryCode;
        $ItemCode = (int)$request->ItemCode;
        // info($ItemCode);
        $Poup = DB::table("VenderProductList")->where('ItemCode',$ItemCode)->where('BranchCode',$BranchCode)->first();
        // info($CategoryCode);

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
            'ReorderLevel' => $Poup->ReorderLevel,
            'ReorderQty' => $Poup->ReorderQty,
            'Categorybox' => $CategoryCode,
        ]);
    }

    public function venderitem_store(Request $request){
        $BranchCode = Auth::user()->BranchCode;

        dump($request->all());

        $checkitem = VenderProductList::where('VenderCode',$request->vendorcode)->where('ItemCode',$request->Productcode)->where('BranchCode',$BranchCode)->first();
// dd($checkitem);
try {
    if ($checkitem===null) {
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
    public function stockitem_store(Request $request){
        $BranchCode = Auth::user()->BranchCode;

        // dump($request->all());

        $checkitem = VenderProductList::where('VenderCode',$request->vendorcode)->where('ItemCode',$request->Productcode)->where('BranchCode',$BranchCode)->first();
dd($checkitem);
try {
    if ($checkitem===null) {
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
    public function Vendor_Contract_Provision(){
        $BranchCode = Auth::user()->BranchCode;
        $VenderSetup = VenderSetup::select('VenderCode','VenderName','Address','PhoneNo','EmailAddress')->distinct()->WHERE('VenderName','<>','','OR','Address','<>','','OR','PhoneNo','<>','','OR','EmailAddress','<>','')->orderBy('VenderName')->get();
        $Department = Typesetup::where("BranchCode",$BranchCode)->get();
        $GodownSetup = GodownSetup::whereRaw('(ChkNotShow=0 or ChkNotShow is Null)')->where('GodownCode', '>', 0)->where('BranchCode', $BranchCode)->orderBy('GodownName')->get();
        $qrymaster = DB::table('qryvendorcontractmaster')
    ->where('Type','K')
    ->where('ChkProvBond',1)
    ->where('BranchCode',$BranchCode)
    ->get();

        // $qrymaster = DB::table('qryvendorcontractmaster')->where('Type','K')->where('ChkProvBond',1)->where('BranchCode',$BranchCode)->get();


        return view('Setups.Vendor_Contract_Provision', [

            'VenderSetup'=>$VenderSetup,
            'Department'=>$Department,
            'GodownSetup'=>$GodownSetup,
            'qrymaster'=>$qrymaster,
        ]);

    }
    public function GetNewComp(Request $request){
        $MBranchCode = Auth::user()->BranchCode;
        $MComputerNo = DB::table('vendorcontractmaster')->where('Type','K')->where('BranchCode', $MBranchCode)->max('ComputerNo');
        if($MComputerNo){
            $NewComp  = intval($MComputerNo) + 1;
        }else{
            $NewComp = 1;
        }

        return response()->json([
            'MComputerNo' => $NewComp
         ]);
    }
        // public function VendorContracSave(Request $request){
        // $MBranchCode = Auth::user()->BranchCode;
        // $branchdata = DB::table('branchsetup')->where('BranchCode', $MBranchCode)->first();

        // // $branchdata = DB::table('BranchSetup')->where('BranchCode',$MBranchCode)->first();

        // $Currency = $branchdata->Currency;
        // $MWorkUser =Auth::user()->UserName;
        // $CmbDepartment =  $request->input('CmbDepartment');
        // $CmbGodownName =  $request->input('CmbGodownName');
        // $CmbVenderName =  $request->input('CmbVenderName');
        // $TxtDepartmentCode =  $request->input('TxtDepartmentCode');
        // $TxtGodownCode =  $request->input('TxtGodownCode');
        // $TxtVenderCode =  $request->input('TxtVenderCode');
        // $TxtComputerNo =  $request->input('TxtComputerNo');
        // $TxtVendorCodeText =  $request->input('TxtVendorCodeText');
        // $TxtDate =  $request->input('TxtDate');
        // $TxtExpiryDate =  $request->input('TxtExpiryDate');
        // $Table =  $request->input('dataArray');
        // $MDEPARTMENTCHK = '';
        // $Message = 'Start';

        // $Chkdeckengin = DB::table('typesetup')->select('Chkdeckengin')->where('TypeCode',$CmbDepartment)->where('BranchCode',$MBranchCode)->first();
        // if($Chkdeckengin){
        //     $MDEPARTMENTCHK = $Chkdeckengin->Chkdeckengin ? $Chkdeckengin->Chkdeckengin : '';
        // }

        // if($MDEPARTMENTCHK){
        //     $Message = 'Deck\Engine Contract Cannot Save On this Form';
        //     return response()->json([
        //         'Message'=>$Message,
        //     ]);
        // }

        // $Rs1 = VendorContractMaster::where('Type','K')->where('ComputerNo',$TxtComputerNo)->where('BranchCode',$MBranchCode)->get();
        // if(!$Rs1){
        //     $Rs1 = new VendorContractMaster;
        //     $Rs1->ComputerNo = $TxtComputerNo;
        //     $Rs1->BranchCode = $MBranchCode;
        // }
        // $Rs1->Type = 'K';
        // $Rs1->EntryDate = $TxtDate;
        // $Rs1->ExpiryDate = $TxtExpiryDate;
        // $Rs1->VendorName = $CmbVenderName;
        // $Rs1->VendorCode = $TxtVenderCode;
        // $Rs1->VendorCodeUSA = $TxtVendorCodeText;
        // $Rs1->GodownCode = $TxtGodownCode;
        // $Rs1->GodownName = $CmbGodownName;
        // $Rs1->DepartmentCode = $TxtDepartmentCode;
        // $Rs1->DepartmentName = $CmbDepartment;
        // $Rs1->WorkUSer = $MWorkUser;
        // $Rs1->save();

        // VenderProductList::where('Type','K')->where('ComputerNo',$TxtComputerNo)->where('BranchCode',$MBranchCode)->delete();

        // foreach ($Table as $row) {
        //     $MProductCode = $row['ItemCode'];
        //     $MVendorPrice = $row['VendorPrice'];
        //     if($MProductCode !== ''){
        //         $Rs1 = '';
        //         $Rs1 = VenderProductList::where('Type','K')->where('VenderCode',$TxtVenderCode)->where('ItemCode',$MProductCode)->where('BranchCode',$MBranchCode)->first();
        //         if($Rs1){
        //             $Rs1 = new VenderProductList;
        //             $Rs1->ComputerNo = $TxtComputerNo;
        //         }
        //         $Rs1->ItemCodeN = $MProductCode;
        //         $Rs1->ItemCode = $MProductCode;
        //         $Rs1->VenderCode = $TxtVenderCode;
        //         $Rs1->Date = $TxtDate;
        //         $Rs1->ExpiryDate = $TxtExpiryDate;
        //         $Rs1->ItemName = trim($row['ItemName']);
        //         $Rs1->UOM = ($row['UOM']);
        //         $Rs1->VendorPrice = $MVendorPrice;
        //         $Rs1->OurPrice = $MVendorPrice;
        //         $Rs1->Currency = $Currency;
        //         $Rs1->LASTRate = $MVendorPrice;
        //         $Rs1->Diff = 0;
        //         $Rs1->LASTDate = $row['LastDate'] ? $row['LastDate'] : date('Y-m-d');
        //         $Rs1->Rate = $MVendorPrice;
        //         $Rs1->CommPer = 0;
        //         $Rs1->GP = 0;
        //         $Rs1->VCategoryName = '';
        //         $Rs1->IMPAItemCode = $row['IMPACode'];
        //         $Rs1->VPartCode = $row['VPartNumber'];
        //         $Rs1->Remarks = $row['Remarks'];
        //         $Rs1->VenderName = $CmbVenderName;
        //         $Rs1->DiscPer = 0;
        //         $Rs1->GodownCode = $TxtGodownCode;
        //         $Rs1->GodownName = $CmbGodownName;
        //         $Rs1->Type = 'K';
        //         $Rs1->VendorCusCode = $TxtVendorCodeText;
        //         $Rs1->DepartmentCode = $TxtDepartmentCode;
        //         $Rs1->WorkUser = $MWorkUser;
        //         $Rs1->ChkNoGp = False;
        //         $Rs1->BranchCode = $MBranchCode;
        //         $Rs1->save();

        //     }
        // }
        // if($Rs1){
        //     $Message = 'Saved';
        // }


        // $data = DB::table('qryvendorcontractmaster')->where('Type','K')->where('ChkProvBond',1)->where('BranchCode',$MBranchCode)->get();

        // return response()->json([
        //     'Message'=>$Message,
        //     'table'=>$data,
        // ]);

        // }
        


public function VendorContracSave(Request $request)
{
    try {
        $MBranchCode = Auth::user()->BranchCode;
        $MWorkUser = Auth::user()->UserName;

        $branchdata = DB::table('branchsetup')->where('BranchCode', $MBranchCode)->first();
        $Currency = $branchdata->Currency ?? '';

        $TxtDate = $request->input('TxtDate');
        $TxtExpiryDate = $request->input('TxtExpiryDate');
        $TxtComputerNo = $request->input('TxtComputerNo');
        $TxtVenderCode = $request->input('TxtVenderCode');
        $TxtVendorCodeText = $request->input('TxtVendorCodeText');
        $TxtGodownCode = $request->input('TxtGodownCode');
        $CmbGodownName = $request->input('CmbGodownName');
        $TxtDepartmentCode = $request->input('TxtDepartmentCode');
        $CmbDepartment = $request->input('CmbDepartment');
        $CmbVenderName = $request->input('CmbVenderName');
        $Table = $request->input('dataArray');

        $Chkdeckengin = DB::table('typesetup')
            ->select('Chkdeckengin')
            ->where('TypeCode', $CmbDepartment)
            ->where('BranchCode', $MBranchCode)
            ->first();

        if ($Chkdeckengin && $Chkdeckengin->Chkdeckengin) {
            return response()->json([
                'Message' => 'Deck/Engine Contract Cannot Save On this Form',
            ]);
        }

       
        VendorContractMaster::updateOrInsert(
            [
                'ComputerNo' => $TxtComputerNo,
                'BranchCode' => $MBranchCode,
            ],
            [
                'Type' => 'K',
                'EntryDate' => $TxtDate,
                'ExpiryDate' => $TxtExpiryDate,
                'VendorName' => $CmbVenderName,
                'VendorCode' => $TxtVenderCode,
                'VendorCodeUSA' => $TxtVendorCodeText,
                'GodownCode' => $TxtGodownCode,
                'GodownName' => $CmbGodownName,
                'DepartmentCode' => $TxtDepartmentCode,
                'DepartmentName' => $CmbDepartment,
                'WorkUser' => $MWorkUser,
                'ChkProvBond' => 1,
            ]
        );

     
        VenderProductList::where('Type', 'K')
            ->where('ComputerNo', $TxtComputerNo)
            ->where('BranchCode', $MBranchCode)
            ->delete();

        
        foreach ($Table as $row) {
            if (!empty($row['ItemCode'])) {
                $Rs2 = new VenderProductList;
                $Rs2->ComputerNo = $TxtComputerNo;
                $Rs2->ItemCodeN = $row['ItemCode'];
                $Rs2->ItemCode = $row['ItemCode'];
                $Rs2->VenderCode = $TxtVenderCode;
                $Rs2->Date = $TxtDate;
                $Rs2->ExpiryDate = $TxtExpiryDate;
                $Rs2->ItemName = $row['ItemName'] ?? '';
                $Rs2->UOM = $row['UOM'] ?? '';
                $Rs2->VendorPrice = $row['VendorPrice'] ?? 0;
                $Rs2->OurPrice = $row['VendorPrice'] ?? 0;
                $Rs2->Currency = $Currency;
                $Rs2->LASTRate = $row['VendorPrice'] ?? 0;
                $Rs2->Diff = 0;
                $Rs2->LASTDate = $row['LastDate'] ?? date('Y-m-d');
                $Rs2->Rate = $row['VendorPrice'] ?? 0;
                $Rs2->CommPer = 0;
                $Rs2->GP = 0;
                $Rs2->VCategoryName = '';
                $Rs2->IMPAItemCode = $row['IMPACode'] ?? '';
                $Rs2->VPartCode = $row['VPartNumber'] ?? '';
                $Rs2->Remarks = $row['Remarks'] ?? '';
                $Rs2->VenderName = $CmbVenderName;
                $Rs2->DiscPer = 0;
                $Rs2->GodownCode = $TxtGodownCode;
                $Rs2->GodownName = $CmbGodownName;
                $Rs2->Type = 'K';
                $Rs2->VendorCusCode = $TxtVendorCodeText;
                $Rs2->DepartmentCode = $TxtDepartmentCode;
                $Rs2->WorkUser = $MWorkUser;
                $Rs2->ChkNoGp = false;
                $Rs2->BranchCode = $MBranchCode;
                $Rs2->save();
            }
        }

       
        // $data = DB::table('qryvendorcontractmaster')
        //     ->where('Type', 'K')
        //     ->where('ChkProvBond', 1)
        //     ->where('BranchCode', $MBranchCode)
        //     ->get();
            
$data = DB::table('qryvendorcontractmaster')
    ->select('ComputerNo', 'VendorCode', 'EntryDate', 'ExpiryDate', 'GodownName')
    ->where('Type', 'K')
    ->where('ChkProvBond', 1)
    ->where('BranchCode', $MBranchCode)
     ->distinct()
    ->get(); 


        return response()->json([
            'Message' => 'Saved',
            'table' => $data,
        ]);
    } catch (\Exception $e) {
        \Log::error('VendorContracSave Error: ' . $e->getMessage());
        return response()->json([
            'Message' => 'Error: ' . $e->getMessage(),
        ]);
    }
}





public function deleteContractMaster(Request $request)
{
    $request->validate([
        'ComputerNo' => 'required|integer',
        'BranchCode' => 'required|integer',
        'password' => 'required|string',
    ]);

    // Simple static password check — you can use Auth or hashed check if needed
    if ($request->password !== '332211') {
        return response()->json(['status' => 'error', 'message' => 'Invalid password']);
    }

    $deleted = DB::table('vendorcontractmaster')
        ->where('ComputerNo', $request->ComputerNo)
        ->where('BranchCode', $request->BranchCode)
        ->delete();

    if ($deleted) {
        return response()->json(['status' => 'success']);
    } else {
        return response()->json(['status' => 'error', 'message' => 'Row not found or already deleted']);
    }
}



        public function Contactfiller(Request $request){
            $MBranchCode = Auth::user()->BranchCode;
            $TxtComputer2 =  $request->input('TxtComputer2');

        $Table = DB::table('qryvenderproductList')->where('Type', 'CONTRACT')->whereIn('DepartmentCode', [10, 11])->where('ComputerNo', $TxtComputer2)->where('BranchCode', $MBranchCode)->get();


            return response()->json([
                'Table'=>$Table,
            ]);
        }
        
        
        
        
        
        
        
public function GetDataVenContract(Request $request){
    $MBranchCode = Auth::user()->BranchCode;
    $branchdata = DB::table('branchsetup')->where('BranchCode', $MBranchCode)->first();

    $Currency = $branchdata->Currency ?? '';
    $MWorkUser = Auth::user()->UserName;
    $TxtComputerNo = $request->input('TxtComputerNo');
    info("TxtComputerNo: " . $TxtComputerNo);

    $Master = VendorContractMaster::where('ComputerNo', $TxtComputerNo)
                ->where('BranchCode', $MBranchCode)
                ->first();

  
    $Details = DB::table('qryvenderproductlist')
                ->where('ComputerNo', $TxtComputerNo)
                ->where('BranchCode', $MBranchCode)
                ->orderBy('Id')
                ->get();

    info("Details Count: " . $Details->count());

    return response()->json([
          'Master' => $Master ? $Master->toArray() : null,
         'Details' => $Details->toArray(),
    ]);
}



        // public function GetDataVenContract(Request $request){
        //     $MBranchCode = Auth::user()->BranchCode;
        //     $branchdata = DB::table('BranchSetup')->where('BranchCode',$MBranchCode)->first();

        //     $Currency = $branchdata->Currency;
        //     $MWorkUser =Auth::user()->UserName;
        //     $TxtComputerNo =  $request->input('TxtComputerNo');
        //     info($TxtComputerNo);
        //     $Master = VendorContractMaster::where('ComputerNo',$TxtComputerNo)->where('BranchCode',$MBranchCode)->first();
        //     $Details = DB::table('qryvenderproductlist')->where('Type','k')->where('ComputerNo',$TxtComputerNo)->where('BranchCode',$MBranchCode)->orderBy('Id')->get();
        //     info($Details);


        //     return response()->json([
        //         'Master'=>$Master,
        //         'Details'=>$Details,
        //     ]);
        // }
        
        
        
        
        
        
        
        
        
        
        


        public function importVendorContract(Request $request){
            $file = $request->file('excel_file');
                    $startRow = $request->input('start_row');
                    $end_row = $request->input('end_row');
                    $itemCodeColumn = $request->input('itemCodeColumn');
                    $itemNameColumn = $request->input('itemNameColumn');
                    $Impacolumn = $request->input('Impacolumn');
                    $QtyColumn = $request->input('QtyColumn');
                    $VpartColumn = $request->input('VpartColumn');
                    $uomColumn = $request->input('uomColumn');
                    $vendorPriceColumn = $request->input('vendorPriceColumn');
                    $sellPriceColumn = $request->input('sellPriceColumn');
                    $VendorNameColumn = $request->input('VendorNameColumn');

                    $itemCodeColumn = $itemCodeColumn ? $itemCodeColumn : 'z';
                    $itemNameColumn = $itemNameColumn ? $itemNameColumn : 'z';
                    $Impacolumn = $Impacolumn ? $Impacolumn : 'z';
                    $QtyColumn = $QtyColumn ? $QtyColumn : 'z';
                    $VpartColumn = $VpartColumn ? $VpartColumn : 'z';
                    $uomColumn = $uomColumn ? $uomColumn : 'z';
                    $vendorPriceColumn = $vendorPriceColumn ? $vendorPriceColumn : 'z';
                    $sellPriceColumn = $sellPriceColumn ? $sellPriceColumn : 'z';
                    $VendorNameColumn = $VendorNameColumn ? $VendorNameColumn : 'z';

            $filePath = $file->getPathname();

            $spreadsheet = IOFactory::load($filePath);
            $sheet = $spreadsheet->getActiveSheet();

            $data = [];
            for ($row = $startRow; $row <= $end_row; $row++) {
                $rowData = [];
                $itemCode = $sheet->getCellByColumnAndRow(
                    Coordinate::columnIndexFromString($itemCodeColumn),
                    $row
                )->getValue();
                $itemName = $sheet->getCellByColumnAndRow(
                    Coordinate::columnIndexFromString($itemNameColumn),
                    $row
                )->getValue();
                $uom = $sheet->getCellByColumnAndRow(
                    Coordinate::columnIndexFromString($uomColumn),
                    $row
                )->getValue();
                $vendorPrice = $sheet->getCellByColumnAndRow(
                    Coordinate::columnIndexFromString($vendorPriceColumn),
                    $row
                )->getValue();
                $sellPrice = $sheet->getCellByColumnAndRow(
                    Coordinate::columnIndexFromString($sellPriceColumn),
                    $row
                )->getValue();
                $VendorName = $sheet->getCellByColumnAndRow(
                    Coordinate::columnIndexFromString($VendorNameColumn),
                    $row
                )->getValue();
                $Vpart = $sheet->getCellByColumnAndRow(
                    Coordinate::columnIndexFromString($VpartColumn),
                    $row
                )->getValue();
                $Qty = $sheet->getCellByColumnAndRow(
                    Coordinate::columnIndexFromString($QtyColumn),
                    $row
                )->getValue();
                $Impa = $sheet->getCellByColumnAndRow(
                    Coordinate::columnIndexFromString($Impacolumn),
                    $row
                )->getValue();

                $searchItemWords = explode(' ', $itemName);
                $searchItem = null;
                $highestSimilarityPercentage = 0;

                if($Impa){
                    $impaitems = ItemSetupNew::where('IMPACode',$Impa)->first();
                    // info('IMPA'.$impaitems);
                    if ($impaitems){
                        $rowData['ItemCodeget'] = $impaitems->ItemCode;
                        $rowData['ItemNameget'] = $impaitems->ItemName;
                        $rowData['UOMget'] = $impaitems->UOM;
                        $rowData['Priceget'] = $impaitems->SaleRate;
                        $rowData['IMPACode'] = $impaitems->IMPACode;
                        $rowData['Vendorcode'] = '';
                        $rowData['Vendor'] = '';
                    }else{

                        $rowData['ItemCodeget'] = '';
                        $rowData['ItemNameget'] = '';
                        $rowData['UOMget'] = '';
                        $rowData['Priceget'] = '';
                        $rowData['IMPACode'] = '';
                        $rowData['Vendorcode'] = '';
                        $rowData['Vendor'] = '';
                    }


                    $venditems = VenderProductList::where('ItemCode',$impaitems->ItemCode)->first();
                    // info('Ven'.$venditems);

                    if($venditems){
                        $rowData['Priceget'] = $venditems->LastRate;
                        $rowData['UOMget'] = $venditems->UOM;
                    }

                }else{

                foreach ($searchItemWords as $word) {
                    $items = ItemSetupNew::where('ItemName', 'like', '%' . $word . '%')->get();
                    foreach ($items as $item) {
                        similar_text($itemName, $item->ItemName, $similarityPercentage);

                        if ($similarityPercentage > $highestSimilarityPercentage) {
                            $highestSimilarityPercentage = $similarityPercentage;
                            $searchItem = $item;
                        }
                    }
                }
                if ($searchItem) {
                    info( 'Most Similar Item: ' . $searchItem->ItemName . ' (Similarity Percentage: ' . $highestSimilarityPercentage . '%)');
                } else {
                    info( 'No matching item found.');
                }
                // info($searchItem);



                if ($searchItem){
                    $rowData['ItemCodeget'] = $searchItem->ItemCode;
                    $rowData['ItemNameget'] = $searchItem->ItemName;
                    $rowData['UOMget'] = $searchItem->UOM;
                    $rowData['Priceget'] = $searchItem->SaleRate;
                    $rowData['Vendorcode'] = '';
                    $rowData['Vendor'] = '';

                    if($searchItem->ItemCode){
                        $venditems = VenderProductList::where('ItemCode',$searchItem->ItemCode)->first();
                        // info('Ven'.$venditems);

                        if($venditems){
                            $rowData['Priceget'] = $venditems->LastRate;
                            $rowData['IMPACode'] = $venditems->IMPAItemCode;
                            $rowData['UOMget'] = $venditems->UOM;
                            $rowData['Vendorcode'] =$venditems->VenderCode;
                            $rowData['Vendor'] = $venditems->VenderName;
                            $rowData['LastDate'] = $venditems->LastDate;
                            $rowData['Remarks'] = $venditems->Remarks;

                        }
                    }
                }else{

                    $rowData['ItemCodeget'] = '';
                    $rowData['ItemNameget'] = '';
                    $rowData['UOMget'] = '';
                    $rowData['Priceget'] = '';
                    $rowData['IMPACode'] = '';
                    $rowData['Vendorcode'] = '';
                    $rowData['Vendor'] = '';
                }
            }


                $rowData['ItemCode'] = $itemCode;
                $rowData['Impa'] = $Impa;
                $rowData['ItemName'] = $itemName;
                $rowData['percentage'] = $highestSimilarityPercentage;
                $rowData['UOM'] = $uom;
                $rowData['VPrice'] = $vendorPrice;
                $rowData['Price'] = $sellPrice;
                $rowData['VendorName'] = $VendorName;
                $rowData['Vpart'] = $Vpart;
                $rowData['Qty'] = $Qty;

                $data[] = $rowData;
            }
        info($data);

            return response()->json($data);
        }
        
        
        
        
        
        
        
        
        
        
        
        
        public function getVendorProductList()
{
  $data = VenderProductList::orderBy('id', 'desc')->limit(100)->get();


    return response()->json(['data' => $data]);
}

}
