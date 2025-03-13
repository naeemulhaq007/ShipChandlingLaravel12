<?php
namespace App\Helpers;
use Illuminate\Support\Facades\DB;
use App\Models\Quote;


class Ship
{
    static function categorydrop(){
        $categories = DB::connection('secsqlsrv')->table("categorysetup")->get();

        $html = '<div class="dropdown-menu" aria-labelledby="categoryDropdownButton">';
        foreach($categories as $key => $cat){

            $html .= '<a class="dropdown-item category-option" data-category="{{ $cat->CategoryCode }}" href="#">'.$cat->CategoryName. '</a>';
        }
        $html .='</div>';
        return $html;

    }
    static function Branches(){
        $branches = DB::table('branchsetup')->get();
        info($branches);
         $html = '<select class="form-control" name="BranchCode"  style="border-right:1px solid #ced4da">';
        // $html .= '<option value="'.$branches->BranchCode.'">'.$branches->BranchName.'</option>';
        foreach($branches as $key => $item)
        {
            $html .= '<option value="'.$item->BranchCode.'">'.$item->BranchName.'</option>';
        }
        $html .= '</select>';
        return $html;
    }
    static function deptDropdown($args = [])
    {
        $id = $name = 'department';
        if(isset($args['name'])) $name = $args['name'];
        if(isset($args['id'])) $id = $args['id'];
        $dept = ['0' => 'PROVISIONS','1' => 'CABIN','2' => 'DECK','3' => 'ENGINE','4' => 'LOGISTICS',
        '7' => 'MEDICINE','8' => 'SAFETY','9' => 'STAT','9' => 'STAT'
        ,'11' => 'PROVISIONS','12' => 'UNKNOWN'];

        $html = '<select id='.$id.' name='.$name.' >';
        foreach($dept as $value => $name)
        {
            $html .= '<option value="'.$value.'">'.$name.'</option>';
        }
        $html .= '</select>';
        return $html;
    }

    static function termsDropdown($args = [])
    {
        $id = $name = 'terms';
        if(isset($args['name'])) $name = $args['name'];
        if(isset($args['id'])) $id = $args['id'];
        $dept = ['0' => 'N 15 Days','1' => 'N 30 Days','2' => 'N 45 Days','3' => 'N 60 Days'
        ,'4' => 'N 90 Days','5' => 'Cash',];

        $html = '<select  id='.$id.' name='.$name.' >';
        foreach($dept as $value => $name)
        {
            $html .= '<option value="'.$value.'">'.$name.'</option>';
        }
        $html .= '</select>';
        return $html;
    }

    static function statusDropdown($args = [])
    {
        $id = $name = 'status';
        if(isset($args['name'])) $name = $args['name'];
        if(isset($args['id'])) $id = $args['id'];
        $dept = ['0' => 'IN PROGRESS','1' => 'ORDER RECEIVED','2' => 'PENDING FOR PRICING','3' => 'SENT TO CUSTOMER'
        ,'4' => 'SENT TO VENDOR','5' => 'UN-SUCCESSFULL'];

        $html = '<select  id='.$id.' name='.$name.' >';
        foreach($dept as $value => $name)
        {
            $html .= '<option value="'.$value.'">'.$name.'</option>';
        }
        $html .= '</select>';
        return $html;
    }

    static function departmentDropdown($args = [])
    {
        $id = $name = 'status';
        $dept_code = -1;
        $branch_code = -1;
        if(isset($args['name'])) $name = $args['name'];
        if(isset($args['id'])) $id = $args['id'];
        if(isset($args['department_code'])) $dept_code = $args['department_code'];
        if(isset($args['branch_code'])) $branch_code = $args['branch_code'];
        // Select Distinct(VenderName),VenderCode From QryVendorDepartment where  (ChkInactive=0 or ChkInactive is Null) and ChkSelect=1 and TypeCode=" & Val(TxtDepartmentCode.Text) & " and  BranchCode=" & Val(MBranchCode) & " order by VenderName
        //$department = DB::Select("Select Distinct(VenderName),VenderCode From QryVendorDepartment where  (ChkInactive=0 or ChkInactive is Null) and ChkSelect=1 and TypeCode=0 and  BranchCode=1 order by VenderName");
        $sql = "Select Distinct(VenderName),VenderCode From QryVendorDepartment where  (ChkInactive=0 or ChkInactive is Null) and ChkSelect=1 and TypeCode=$dept_code and  BranchCode=$branch_code order by VenderName";
        //dd($sql);
        $department = DB::Select($sql);

        $html = '<select  id='.$id.' name='.$name.' class="custom-select"><option value="" id="vendoredit" selected>Select Vendor</option>';
        if($department)
        {
            //dd($department);
            foreach($department as $index => $obj)
            {

                $html .= '<option value="'.$obj->VenderCode.'">'.$obj->VenderName.'</option>';
            }
        }
        $html .= '</select>';
        return $html;
    }

    static function WarehouseDropdown($quotno){
        $BranchCode =\Auth::user()->BranchCode;
        $QuoteMaster = Quote::where('QuoteNo',$quotno)->where('BranchCode',$BranchCode)->first();
        $warehouse = DB::table('GodownSetup')->select('GodownCode', 'GodownName')->distinct()->get();

        $QuoteMaster->GodownCode;
        $html = '<select  id="Warehouse" name="Warehouse" class="custom-select">';
        $html .= '<option value="'.$QuoteMaster->GodownCode.'">'.$QuoteMaster->GodownName.'</option>';
        foreach($warehouse as $key => $item)
        {
            $html .= '<option value="'.$item->GodownCode.'">'.$item->GodownName.'</option>';
        }
        $html .= '</select>';
        return $html;
    }

    static function getvendorsetup($VendorCode,$PONO){
        $BranchCode = auth()->user()->BranchCode;
        $VenderSetup = DB::table('vendersetup')->select('Terms')->where('VenderCode', $VendorCode)->where('BranchCode', $BranchCode)->first();
        $purchaseOrderNoa = DB::table('purchaseordermaster')->where('ChkReceivedCompleted', 1)->where('PurchaseOrderNo', $PONO)->where('BranchCode', $BranchCode)->first();
        if ($purchaseOrderNoa) {
            $PurchaseOrderNo = $purchaseOrderNoa->PurchaseOrderNo;
        } else {
            $PurchaseOrderNo = Null;
        }
        return response()->json([
            'VenderSetupterms' => $VenderSetup,
            'PurchaseOrderNo' => $PurchaseOrderNo,
        ]);

    }

}
