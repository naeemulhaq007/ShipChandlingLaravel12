<?php

namespace App\Http\Controllers;

use App\Models\UOMModel;
use App\Models\Typesetup;
use App\Models\GodownSetup;
use App\Models\VenderSetup;
use App\Models\CompanySetup;
use App\Models\ItemSetupNew;
use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Models\ShipingPortSetup;
use App\Models\VenderProductList;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ItemSetup extends Controller
{

    public function ItemRegisterSetup(Request $request)
    {

        $BranchCode = Auth::user()->BranchCode;
        $MUserName= Auth::user()->UserName;
        $VenderSetup = VenderSetup::select('VenderName', 'Address', 'PhoneNo', 'EmailAddress')->distinct()->WHERE('VenderName', '<>', '', 'OR', 'Address', '<>', '', 'OR', 'PhoneNo', '<>', '', 'OR', 'EmailAddress', '<>', '')->orderBy('VenderName')->get();
        $company = CompanySetup::where('BranchCode', $BranchCode)->first();
        $origin = DB::table('originsetup')->where('BranchCode', $BranchCode)->orderBy("OriginName")->get();
        $UOM = UOMModel::where('BranchCode', $BranchCode)->get();
        // dd($UOM);
        $PORT = ShipingPortSetup::where("BranchCode", $BranchCode)->orderBy("PortCode")->get();
        $Category = CategoryModel::where('CategoryName', '<>', '')->get();
        // $Category = DB::select("Select distinct(CategoryName),CategoryCode from CategorySetup where  BranchCode='$BranchCode'");
        $Department = Typesetup::select(['TypeCode', 'TypeName'])->where('BranchCode', $BranchCode)->get();
        $warehouse = GodownSetup::select('GodownCode', 'GodownName', 'PrinterName')->distinct()->get();

        $vendors = DB::table('qryvendordepartment')->where(function ($query) {
            $query->where('ChkInactive', 0)
                ->orWhereNull('ChkInactive');
        })
            ->where('ChkSelect', 1)
            ->where('BranchCode', $BranchCode)
            ->select('VenderName', 'VenderCode')
            ->distinct()
            ->orderBy('VenderName')
            ->get();
        // $maxItemCode = VenderProductList::select('ItemCode')->orderBy('ItemCode','desc')->first();
        $maxItemCode = VenderProductList::max('ItemCode');
        // $maxItemCode = ItemSetupNew::max('ItemCode');
        $matches = [];
        info($maxItemCode);
        if (preg_match('/^([A-Za-z]*)(\d+)$/', $maxItemCode, $matches)) {
            $alphabetPart = $matches[1];
            $numericPart = $matches[2];

            $newNumericPart = intval($numericPart) + 1;

            // Specify the desired length of the numeric part (e.g., 7 for '0000001')
            $numericPartLength = 7;

            // Use sprintf to add leading zeros
            $newNumericPart = sprintf("%0{$numericPartLength}d", $newNumericPart);

            $newItemCode = $alphabetPart . $newNumericPart;
        } else {
            // If the regular expression doesn't match, set a default value
            $newItemCode = '0000001';
        }


        // dd($vendors);
        return view('ItemRegisterSetup', [

            'VenderSetup' => $VenderSetup,
            'company' => $company,
            'origin' => $origin,
            'UOM' => $UOM,
            'PORT' => $PORT,
            'Category' => $Category,
            'Department' => $Department,
            'vendors' => $vendors,
            'MUserName' => $MUserName,
            'warehouse' => $warehouse,
            'newItemCode' => $newItemCode,
        ]);
    }

    public function itemregsearch(Request $request)
    {
        $MBranchCode = session('MBranchCode');
        $PVendorCode = session('PVendorCode');
        $MItemDesc = $request->productname;

        $data = DB::table('qryitemsetupnew')->where('Itemname', 'like', '%' . $MItemDesc . '%')->where('BranchCode', $MBranchCode)->orderBy('ItemName')->get();
        info($data);
        return response()->json([
            'data' => $data,
        ]);
    }

    public function itemregselect(Request $request)
    {
        $BranchCode = Auth::user()->BranchCode;
        $PVendorCode = config('app.PVendorCode');
        if ($request->ajax()) {
            if ($request->vendorselect === null) {
                $vendorserch = DB::select("Select ItemCode,ItemName,IMPAItemCode,VenderCode,VenderName,Case ChkInactive WHEN 1 then 'Y' WHEN 0 then 'N' End as ChkInactive,VCategoryName from VenderProductList where VenderCode<>'$PVendorCode' and  Itemname like '$request->productname%'  and BranchCode='$BranchCode' order by ItemName");
            } else {
                $vendoritemserch = DB::select("Select * from VenderSetup where VenderName='$request->vendorselect' AND BranchCode='$BranchCode'");
                $vendorcode = $vendoritemserch[0]->VenderCode;
                $vendorserch = DB::select("Select ItemCode,ItemName,IMPAItemCode,VenderCode,VenderName,Case ChkInactive WHEN 1 then 'Y' WHEN 0 then 'N' End as ChkInactive,VCategoryName from VenderProductList where VenderCode='$vendorcode' and VenderCode<>'$PVendorCode' and  Itemname like '%'  and BranchCode='$BranchCode' order by ItemName"); # code...
            }


            $output = "";
            for ($i = 0; $i < count($vendorserch); $i++) {


                $output .= '
           <tr id="rowcell" data-ItemCode="' . $vendorserch[$i]->ItemCode . '" data-VenderCode="' . $vendorserch[$i]->VenderCode . '">' .

                    '<td id="">' . $vendorserch[$i]->ItemCode . '</td>' .
                    '<td id="">' . $vendorserch[$i]->ItemName . '</td>' .
                    // '<td id="">'.$vendorserch[$i]->IMPAItemCode.'</td>'.
                    '<td id="">' . $vendorserch[$i]->VenderName . '</td>' .
                    '<td id="">' . $vendorserch[$i]->ChkInactive . '</td>' .
                    // '<td id="">'.$vendorserch[$i]->VenderCode.'</td>'.
                    // '<td id="">'.$vendorserch[$i]->VCategoryName.'</td>'.
                    '</tr>';
            }
            return Response($output);
        }
    }

    public function populateitemreg(Request $request)
    {
        $BranchCode = Auth::user()->BranchCode;
        // info($request->all());


        // $CategoryCode = $request->CategoryCode;
        $ItemCode = $request->ItemCode;



        $list = DB::table('qryvendorproductlistnew')->select(["VenderCode", "VenderName", "VendorPrice", "UOM", "OurPrice", "LastDate", "WorkUser", "ID", "Type"])->where('ITemCode', $request->ItemCode)->WHERE('BranchCode', $BranchCode)->orderBy('Type', 'Desc')->orderBy('LastDate', 'Desc')->orderBy('OurPrice', 'asc')->orderBy('ID')->get();
        info('list' . $list);
        $vendors = DB::table('qryvendordepartment')->where(function ($query) {
            $query->where('ChkInactive', 0)
                ->orWhereNull('ChkInactive');
        })
            ->where('ChkSelect', 1)
            ->where('BranchCode', $BranchCode)
            ->select('VenderName', 'VenderCode')
            ->distinct()
            ->orderBy('VenderName')
            ->get();

        $UOM = UOMModel::get();


        // info($ItemCode);
        $Poup = DB::table("venderproductlist")->where('ItemCode', $ItemCode)->where('BranchCode', $BranchCode)->first();
        if ($Poup) {
            info('vendata');
            return response()->json([
                'message' => 'data',
                'data' => $Poup,
                'list' => $list,
                'vendors' => $vendors,
                'UOM' => $UOM,
            ]);
        } else {
            info('data');

            $data = ItemSetupNew::where('ItemCode', $ItemCode)
                ->where('BranchCode', $BranchCode)
                ->first();

            // info($CategoryCode);
            // info($Poup);
            return response()->json([
                'message' => 'data',
                'data' => $data,
                'list' => $list,
                'vendors' => $vendors,
                'UOM' => $UOM,
            ]);
        }
        info('nodata');

        return response()->json([
            'message' => 'Nodata',
            'list' => $list,
            'vendors' => $vendors,
            'UOM' => $UOM,
        ]);
    }

    public function bulkitemsave(Request $request)
    {
        $BranchCode = Auth::user()->BranchCode;
        $WorkUser = Auth::user()->UserName;
        $table = $request->input('dataarray');
        $status = 'start';
        $Allitemcode = [];
        foreach ($table as $row) {
            $saveitem = ItemSetupNew::where('ItemCode', $row['ItemCode'])
                ->where('BranchCode', $BranchCode)
                ->first();
            if ($row['ItemCode'] == '' && $row['ItemName'] !== null) {
                $lastid = ItemSetupNew::where('BranchCode', $BranchCode)->max('ItemCode');
                // Extract the prefix and numeric part
                $prefix = substr($lastid, 0, 1);
                $numericPart = substr($lastid, 1);

                // Increment the numeric part
                $newNumericPart = intval($numericPart) + 1;

                // Combine the prefix and incremented numeric part
                $nItemCode = $prefix . $newNumericPart;
            } else {
                // info($row['ItemName']);
                $nItemCode = $row['ItemCode'];
            }
            if ($row['ItemName'] !== null) {

                if (!$saveitem) {
                    $saveitem = new ItemSetupNew();
                    $saveitem->ItemCode = $nItemCode;
                }

                $saveitem->ItemName = $row['ItemName'];
                $saveitem->UOM = $row['UOM'];
                $saveitem->SaleRate = $row['Price'];
                $saveitem->BranchCode = $BranchCode;
                $saveitem->save();
            }

            $Allitemcode[] = [
                'itemcode' => $nItemCode,
            ];

            if ($saveitem) {
                $status = 'saved';
            }
        }

        return response()->json([
            'status' => $status,
            'BranchCode' => $BranchCode,
            'Allitemcode' => $Allitemcode,
        ]);
    }

    public function itemreg_store(Request $request)
    {
        $BranchCode = Auth::user()->BranchCode;
        $WorkUser = Auth::user()->UserName;

        $Alldata = $request->all();
        $Itemcode = '';
        $Itemcode = ($request->Itemcode);
        $dataarray = json_decode($request->input('dataarray'), true);
        info($Alldata);


        $saveitem = ItemSetupNew::where('ItemCode', '=', $Itemcode)
            ->where('BranchCode', '=', $BranchCode)
            ->first();

        info($saveitem);


        if (!$saveitem) {
            $saveitem = new ItemSetupNew();
            $saveitem->ItemCode = $Itemcode;
            info('No-data');
        } else {

            info('data');
        }
        $saveitem->IMPACode = (int) $request->IMPACode;
        if($request->ItemitemName){
            $saveitem->ItemName = $request->ItemitemName;
        }
        $saveitem->DepartmentCode = $request->Departmentcode;
        $saveitem->CategoryCode = intval($request->CategoryCode);
        $saveitem->BrandCode = intval($request->OrignCode);
        $saveitem->UOM = $request->uoms;
        $saveitem->Currency = $request->Currency;
        $saveitem->SaleRate = (float)($request->SalePrice);
        $saveitem->WorkUser = strval($WorkUser);
        $saveitem->BranchCode = intval($BranchCode);
        $saveitem->ReorderLevel = $request->ReorderLevel;
        $saveitem->ReorderQty = $request->ReorderQty;
        $saveitem->Date = date('Y-m-d', strtotime($request->Dateq));
        $saveitem->EntryDate = date('Y-m-d', strtotime($request->Dateq));
        $saveitem->ChkInactive = 'N';
        $saveitem->save();

        foreach ($dataarray as $row) {
            $savevenitem = VenderProductList::where('ItemCode', $Itemcode)->where('VenderCode', $row['Vendercode'])->where('BranchCode', $BranchCode)->first();
            info($Itemcode);
            if (!$savevenitem) {
                info('new');
                $savevenitem = new VenderProductList;
                $savevenitem->ItemCode = $Itemcode;
            } else {

                info('update');
            }
            $ID = $row['ID'];
            $VenderName = $row['VenderName'];
            $Vendercode = $row['Vendercode'];
            $UOM = $row['UOM'];
            $Type = $row['Type'];
            $OurPrice = $row['OurPrice'];
            // $LastDate = $row['LastDate'];
            $LastDate = date('Y-m-d');
            $WorkUser = $row['WorkUser'];
            // $datesave = date('Y-m-d', strtotime($request->Dateq));
            // info($datesave);
            info($LastDate);

            $savevenitem->Date = $request->Dateq;
            $savevenitem->IMPAItemCode = $request->IMPACode;
            $savevenitem->ItemName = $request->ItemitemName;
            $savevenitem->DepartmentCode = $request->Departmentcode;
            $savevenitem->CategoryCode = intval($request->CategoryCode);
            $savevenitem->LastDate = $LastDate;
            $savevenitem->UOM = $UOM;
            $savevenitem->Type = $Type;
            $savevenitem->VendorPrice = intval($OurPrice);
            $savevenitem->LastRate = intval($OurPrice);
            $savevenitem->Currency = $request->Currency;
            $savevenitem->OurPrice = intval($request->SalePrice);
            $savevenitem->FixedPrice = intval($request->SalePrice);
            $savevenitem->WorkUser = $WorkUser;
            $savevenitem->BranchCode = $BranchCode;
            $savevenitem->VenderCode = $Vendercode;
            $savevenitem->VenderName = $VenderName;
            $savevenitem->GodownCode = $request->godowncode;
            $savevenitem->GodownName = $request->godown;
            $savevenitem->ChkInactive = 0;

            info($savevenitem);
            $savevenitem->save();
        }
        if ($saveitem) {


            // do something with the row data...


            info('saveitem');
            $status = 'success';
        } else {

            info('not saved');
            $status = 'unsuccessful';
        }

        return response()->json([
            'status' => $status,
            'BranchCode' => $BranchCode,
            'Alldata' => $Alldata,

        ]);
    }
    public function itemdelete(Request $request)
    {
        $message = '';
        $Itemcode = $request->Itemcode;
        $check = ItemSetupNew::where('Itemcode', $Itemcode)->first();
        if ($check) {


            $deleteITS = ItemSetupNew::where('Itemcode', $Itemcode)->delete();
            if ($deleteITS == true) {
                $deleteVpl = VenderProductList::where('Itemcode', $Itemcode)->delete();
                $message = 'Item Deleted';
            } else {
                $message = 'Item Not Deleted';
            }
        } else {
            $message = 'Item Not found';
        }



        return response()->json([
            'message' => $message,
        ]);
    }
}
