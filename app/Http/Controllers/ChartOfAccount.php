<?php

namespace App\Http\Controllers;

use App\Models\Trans;
use App\Models\AcFile;
use App\Models\EmpReg;
use App\Models\AcLedger;
use Illuminate\View\View;
use App\Models\BillDetail;
use App\Models\BillMaster;
use Illuminate\Http\Request;
use App\Models\JournalVoucher;
use App\Models\OpeningBalance;
use App\Models\BillDetailIncome;
use App\Models\billmasterincome;
use Illuminate\Support\Facades\DB;
use App\Http\Middleware\GlobalVariablesMiddleware;
use App\Models\CurrencyModel;
use App\Models\GodownSetup;
use App\Models\Typesetup;
use App\Models\termssetup;
use App\Models\CompanySetup;
use App\Models\FixAccountSetup;
use Illuminate\Support\Facades\Auth;


class ChartOfAccount extends Controller
{
   
    public function index(){
        $BranchCode= Auth::user()->BranchCode;
       $Chartl1 = AcFile::where('BranchCode',$BranchCode)->where('ACode2',0)->where('ACode3',0)->orderBy('acode1')->orderBy('acode2')->orderBy('acode3')->orderBy('acode4')->orderBy('acode5')->orderBy('ACODE6')->orderBy('ACODE7')->get();

        return view('Accounts.ChartOfAccount', [
            'Chartl1'=>$Chartl1,
            'BranchCode'=>$BranchCode,
            'BranchCode'=>$BranchCode,
        ]);
    }
       public function chartedcodegen(Request $request){
        $Accode = $request->Accode;
        $acName = $request->acName;
        $Lvl = $request->Lvl;
        $xxxxx =0;
        $LEVX = '';
        $XXXE2=0;
        $dxd='';
        $Maxx=0;
        $Nextt='';
        $xxxe=0;
        $xxx =0;
        $XXXE3=0;
        $xxxx=0;
        $txtAccode='';
        $tcode='';
        $BranchCode= Auth::user()->BranchCode;

        $AcFile = AcFile::Select('actcode', 'AcName3', 'acode1', 'acode2', 'acode3', 'acode4', 'acode5', 'acode6', 'AcLevel')->where('ActCode',$Accode)->where('BranchCode',$BranchCode)->first();
        info($AcFile);
        if($AcFile){
            $LEVX = $AcFile->AcLevel;

        }else{
            $LEVX = '';
        }
        info($LEVX);
        if($LEVX == 1){
            $XXXE2= $AcFile->acode1;
                $acfile2=AcFile::Select( 'actcode', 'AcName3',  'acode1', 'acode2', 'acode3', 'acode4', 'acode5', 'acode6',  'AcLevel')->where('BranchCode',$BranchCode)->where('ACODE1',$XXXE2)->where('acode3',0)->orderBy('acode2')->get();
                info($acfile2);
                $dxd = $AcFile->AcName3;
                if(!$acfile2){
                    return response()->json(['message' => 'Records not Found'], 200);
                }

            $Maxx = $acfile2->last()->acode2+1;
            $nextt = trim($Accode) . '.' . trim(strval($Maxx));
            $txtAccode = $nextt;
        $tcode=trim(strval($Maxx));

        }
        if($LEVX == 2){
            $xxxe = $AcFile->acode1;
            $XXXE2 = $AcFile->acode2;
                $acfile2=AcFile::where('BranchCode',$BranchCode)->where('acode1',$xxxe)->where('acode2',$XXXE2)->where('acode4',0)->orderBy('acode3')->get();
                if(!$acfile2){
                    return response()->json(['message' => 'Records not Found'], 200);
                }
                info($acfile2);

            $Maxx = $acfile2->last()->acode3+1;
            $nextt = trim($Accode) . '.' . trim(strval($Maxx));
            $txtAccode = $nextt;
        $tcode=trim(strval($Maxx));

        }
        if($LEVX == 3){
            $xxx = $AcFile->acode3;
            $xxxe = $AcFile->acode2;
            $XXXE2 = $AcFile->acode1;
                $acfile2=AcFile::where('BranchCode',$BranchCode)->where('acode1',$XXXE2)->where('acode2',$xxxe)->where('acode3',$xxx)->where('acode5',0)->orderBy('acode4')->get();
                if(!$acfile2){
                    return response()->json(['message' => 'Records not Found'], 200);
                }
                info($acfile2);

            $Maxx = $acfile2->last()->acode4+1;
            $nextt = trim($Accode) . '.' . trim(strval($Maxx));
            $txtAccode = $nextt;
        $tcode=trim(strval($Maxx));

        }
        if($LEVX == 4){
            $xxx = $AcFile->acode4;
            $xxxe = $AcFile->acode3;
            $XXXE2 = $AcFile->acode1;
            $XXXE3 = $AcFile->acode2;
                $acfile2=AcFile::where('BranchCode',$BranchCode)->where('acode1',$XXXE2)->where('acode2',$XXXE3)->where('acode3',$xxxe)->where('acode4',$xxx)->where('acode6',0)->orderBy('acode5')->get();
                if(!$acfile2){
                    return response()->json(['message' => 'Records not Found'], 200);
                }
                info($acfile2);

            $Maxx = $acfile2->last()->acode5+1;
            $nextt = trim($Accode) . '.' . trim(strval($Maxx));
            $txtAccode = $nextt;
        $tcode=trim(strval($Maxx));

        }
        if($LEVX == 5){
            $xxxx = $AcFile->acode5;
            $xxx = $AcFile->acode4;
            $xxxe = $AcFile->acode3;
            $XXXE3 = $AcFile->acode2;
            $XXXE2 = $AcFile->acode1;
                $acfile2=AcFile::where('BranchCode',$BranchCode)->where('acode1',$XXXE2)->where('acode2',$XXXE3)->where('acode3',$xxxe)->where('acode4',$xxx)->where('acode5',$xxxx)->where('acode7',0)->orderBy('acode6')->get();
                if(!$acfile2){
                    return response()->json(['message' => 'Records not Found'], 200);
                }
                info($acfile2);

            $Maxx = $acfile2->last()->acode6+1;
            $nextt = trim($Accode) . '.' . trim(strval($Maxx));
            $txtAccode = $nextt;
        $tcode=trim(strval($Maxx));

        }
        if($LEVX == 6){
            $xxxxx = $AcFile->acode6;
            $xxxx = $AcFile->acode5;
            $xxx = $AcFile->acode4;
            $xxxe = $AcFile->acode3;
            $XXXE2 = $AcFile->acode1;
            $XXXE3 = $AcFile->acode2;
                $acfile2=AcFile::where('BranchCode',$BranchCode)->where('acode1',$XXXE2)->where('acode2',$XXXE3)->where('acode3',$xxxe)->where('acode4',$xxx)->where('acode5',$xxxx)->where('acode6',$xxxxx)->where('acode7',0)->orderBy('acode7')->get();
                if(!$acfile2){
                    return response()->json(['message' => 'Records not Found'], 200);
                }
                info($acfile2);

            $Maxx = $acfile2->last()->acode7+1;
            $nextt = trim($Accode) . '.' . trim(strval($Maxx));
            $txtAccode = $nextt;
        $tcode=trim(strval($Maxx));

        }
        $Lvl = $LEVX+1;
info($txtAccode);
info($acName);

        return response()->json([
            // 'status' =>$status,
        'Lvl' =>$Lvl,
        'txtAccode' =>$txtAccode,
        'tcode' =>$tcode,
        'acName' =>$acName,


        ]);

       }
       public function cmdchartedadd(Request $request){
        $Accode = $request->Accode;
        $acName = $request->acName;
        $Lvl = $request->Lvl;
        $BranchCode= Auth::user()->BranchCode;
        $status = 'starting';
        // info($Lvl);
        // info($Accode);
        $Transctions = Trans::where('BranchCode',$BranchCode)->where('ActCode',$Accode)->first();
        if($Transctions){
            info($Transctions);
        //     info($Transctions);
            $status='data';
            return response()->json([
                'status' =>$status,
            'Accode' =>$Accode,
            'Transctions' =>$Transctions,


            ]);
        }
        $LENACNAME = strlen($acName);
        $INTLvl = (int)($Lvl);
        // if ($INTLvl == 0 ){
        //     info($INTLvl);

        // }else{
        //     info('k');
        // }
        if ($LENACNAME == 0 || $INTLvl == 0) {
            return response()->json(['message' => 'Please Select Control a/c Before Add Code'], 200);
          }
        if ($Lvl >= 5) {
            return response()->json(['message' => 'You Can Not Open More Than 5 Level'], 200);
          }
        //   if (strlen($acName) === 0)


        return response()->json([
            'status' =>$status,
            'Accode' =>$Accode,
            'acName' =>$acName,
            'level' =>$INTLvl,


        ]);
       }
       public function cmdchartedsave(Request $request){
        $acName = $request->acName;
        $Accode = $request->Accode;
        $OpCr = $request->OpCr;
        $TxtOpBal = $request->TxtOpBal;
        $BranchCode= Auth::user()->BranchCode;
        $status = 'starting';

$acName3 = AcFile::where('BranchCode', $BranchCode)
    ->where('AcName3', $acName)
    ->where('ActCode', '<>', '')
    ->value('AcName3');
if($acName3){
    info($acName3);
    $status='data';
    if ($acName3 == $acName) {
        $Message ='Account Name : '.$acName.' , Already Exist, Please Enter Different Name';
        return response()->json([
            'status' =>$status,
            'acName' =>$acName,
            'acName3' =>$acName3,
            'Message' =>$Message,


        ]);
    }
    return response()->json([
        'status' =>$status,
        'acName' =>$acName,
        'acName3' =>$acName3,


    ]);
}
$vxp = 0;
$acdata = AcFile::where('actcode',$Accode)->where('BranchCode',$BranchCode)->first();
if(!$acdata){
    $acdata = new AcFile;
    $acdata->ActCode = $Accode;

}else{
$vxp = 1;
}
$acdata->AcName3 = $acName;
$acdata->BranchCode = $BranchCode;
$acdata->OpeningBalance = $TxtOpBal;
if($OpCr == true){
    $acdata->OpeningBalance = $TxtOpBal*-1;
}else{
    $acdata->OpeningBalance = abs(floatval($TxtOpBal));
}
$acdata->Address1 = $request->Address1;
$acdata->Address2 = $request->Address2;
$acdata->Address3 = $request->Address3;
$acdata->gST = $request->gST;
$acdata->sameaddress = $request->ChkSameAddress;
$acdata->ChkSalesMan = $request->ChkSalesMan;
$acdata->ChkCrBill = $request->ChkCrBill;
$acdata->ChkIncome = $request->ChkIncome;
$acdata->ChkDepreciation = $request->ChkDepreciation;

$acdata->phone = $request->TxtPhone ? $request->TxtPhone : '-';
$acdata->fax = $request->TxtFaxNo ? $request->TxtFaxNo : '-';
$acdata->email = $request->txtemail ? $request->txtemail : '-';

$acdata->ChkCustomer = $request->ChkCustomer;
$acdata->ChkSupplier = $request->ChkSupplier;
$acdata->ChkExpence = $request->ChkExpence;

if ($request->has('OptNoneOfAll') && $request->input('OptNoneOfAll') == true) {
    $MOptType = 'N';
} elseif ($request->has('OptTradingAc') && $request->input('OptTradingAc') == true) {
    $MOptType = 'C';
} elseif ($request->has('OptPLAc') && $request->input('OptPLAc') == true) {
    $MOptType = 'P';
} elseif ($request->has('OptExpense') && $request->input('OptExpense') == true) {
    $MOptType = 'E';
} elseif ($request->has('OptBalanceSheetAc') && $request->input('OptBalanceSheetAc') == true) {
    $MOptType = 'B';
}

$acdata->OptType = $MOptType;
$acdata->Actype = $MOptType;

$acdata->ChkInactive = $request->ChkInactive;

$acdata->acode1 = $request->a1;
$acdata->AcCode1 = $request->a1;
$acdata->acode2 = $request->a2;
$acdata->AcCode2 = $request->a2;
$acdata->acode3 = $request->a3;
$acdata->AcCode3 = $request->a3;
$acdata->acode4 = $request->a4;
$acdata->acode5 = $request->a5;
$acdata->acode6 = $request->a6;
$acdata->acode7 = $request->a7;
$acdata->acode8 = floatval(0);
$acdata->acode9 = floatval(0);
$acdata->acode10 = floatval(0);

$acdata->AcLevel = $request->Lvl;

$acdata->TitleLevel1 = $request->Level1;
$acdata->TitleLevel2 = $request->Level2;
$acdata->TitleLevel3 = $request->Level3;
$acdata->TitleLevel4 = $request->Level4;
$acdata->TitleLevel5 = $request->Level5;

$acdata->WorkUSer = config('app.MUserName');
info($acdata);
$acdata->save();
//////////some fileds are not saving
if($acdata == true){
    $status = 'Account Save';
}

return response()->json([
    'status' =>$status,
    'acName' =>$acName,
    'acName3' =>$acName3,
    'vxp' =>$vxp,


]);


       }

public function transcode(Request $request){
    $MBranchCode = Auth::user()->BranchCode;
    $act = $request->act;
    $MTransAmt = Trans::where('BranchCode', $MBranchCode)
    ->where('ActCode', $act)
    ->sum('TransAmt');

    return response()->json([
        'MTransAmt' =>$MTransAmt,

    ]);
}

public function Employeesave(Request $request){
    $MBranchCode = Auth::user()->BranchCode;
    $Alldata = $request->all();
info($Alldata);

$Employee = EmpReg::where('EmpNo',$request->empno)->where('BranchCode',$MBranchCode)->first();
// if(!$Employee){
//     info('new');
// }else{
//     info('data');
//     info($Employee);

// }
if($request->Inactive == true){
    $Inactive = 1;
}else{
    $Inactive = 0;
}
if(!$Employee){
    info('new');
    $Employee = new EmpReg;
}
$Employee->AccNo = $request->accno;
$Employee->Date = $request->regdate;
$Employee->EmpName = $request->empname;
$Employee->DepartmentCode = $request->departmentcode;
$Employee->NICNo = $request->nicno;
$Employee->PTCLNO = $request->ptclno;
$Employee->CellNo = $request->cellno;
$Employee->Salary = $request->salary;
$Employee->Emailadd = $request->emailadd;
$Employee->DateOfService = $request->entrydate;
$Employee->PostalAdd = $request->postaladd;
$Employee->Comments = $request->comments;
$Employee->BranchCode = $MBranchCode;
$Employee->Inactive = $Inactive;
$Employee->PayTypeCode = $request->paytypecode;
$Employee->save();
if($Employee == true){
    $Message = 'Saved';
}else{
    $Message = 'NotSaved';
}


$data = EmpReg::where('BranchCode',$MBranchCode)->orderBy('EmpNo','asc')->get();

    return response()->json([
        'Alldata'=>$Alldata,
        'Message'=>$Message,
        'data'=>$data,
    ]);
}

public function Employeedelete(Request $request){
    $MBranchCode = Auth::user()->BranchCode;
info($request->empno);
info($request->all());
    $Employeedelete = EmpReg::where('EmpNo', $request->empno)->where('BranchCode',$MBranchCode)->delete();
    if($Employeedelete == true){
        $Message = 'Deleted';
    }else{
        $Message = 'NotDeleted';
    }
    $data = EmpReg::where('BranchCode',$MBranchCode)->orderBy('EmpNo','asc')->get();

    return response()->json([
        'Message'=>$Message,
        'data'=>$data,

    ]);
}
public function EmployeeRegistration(){
    $MBranchCode = Auth::user()->BranchCode;

    return view('Accounts.EmployeeRegistration', [
        'MBranchCode' => $MBranchCode,
    ]);
}
public function PayRoll(){
    $MBranchCode = Auth::user()->BranchCode;
    $PVendorcode= 756;
    $BranchCode =Auth::user()->BranchCode;
    $vouchers = DB::table('expensepaymentvoucher')->select('VoucherNo')->distinct()->where('BranchCode', $BranchCode)->orderBy('VoucherNo')->get();
    $Currency = CurrencyModel::select('Currency')->where('BranchCode', $BranchCode)->orderBy('Currency')->get();
    $FixAccountSetup = FixAccountSetup::where('BranchCode', $BranchCode)->first();
    return view('Accounts.PayRoll', [
        'MBranchCode' => $MBranchCode,
        'vouchers' => $vouchers,
        'Currency' => $Currency,
        'FixAccountSetup' => $FixAccountSetup,
    ]);
}
public function BillInvoice(){
    $MBranchCode = Auth::user()->BranchCode;
    $PVendorcode= 756;
    $BranchCode =Auth::user()->BranchCode;
    $vouchers = DB::table('qrybilldetail')->select('BillNo')->distinct()->where('BranchCode', $BranchCode)->orderBy('BillNo')->get();
    $Currency = CurrencyModel::select('Currency')->where('BranchCode', $BranchCode)->orderBy('Currency')->get();
    $FixAccountSetup = FixAccountSetup::where('BranchCode', $BranchCode)->first();
    $firstVoucherNo = DB::table('qrybilldetail')->orderBy('BillNo', 'asc')->first();
$lastVoucherNo = DB::table('qrybilldetail')->orderBy('BillNo', 'desc')->first();
if(!$firstVoucherNo){
    $firstVoucherNo=0;
}else{
    $firstVoucherNo = $firstVoucherNo->BillNo;
}

if(!$lastVoucherNo){
    $lastVoucherNo=0;
}else{
    $lastVoucherNo = $lastVoucherNo->BillNo;

}


    return view('Accounts.BillInvoice', [
        'MBranchCode' => $MBranchCode,
        'vouchers' => $vouchers,
        'Currency' => $Currency,
        'FixAccountSetup' => $FixAccountSetup,
        'firstVoucherNo' => $firstVoucherNo,
        'lastVoucherNo' => $lastVoucherNo,
    ]);
}


public function BillMastersave(Request $request){
    $MBranchCode = Auth::user()->BranchCode;
    $MWorkUser = Auth::user()->UserName;

   $TxtSerialNo = $request->input('TxtSerialNo');
   info($TxtSerialNo);
   $TxtRefNo = $request->input('TxtRefNo');
   $ChkOkToPay = $request->input('ChkOkToPay');
   $TxtDate = $request->input('TxtDate');
   $TableData = $request->table;

if($TxtRefNo == !null){

    $BillMaster = BillMaster::where('BillNo','<>',$TxtSerialNo)->where('RefNo',$TxtRefNo)->where('type','Bill')->where('BranchCode',$MBranchCode)->orderBy('BillNo')->first();
    if($BillMaster){
        return response()->json(['message' => 'This Vendor Bill No: '.$BillMaster->RefNo.'Already Exist on Bill No: '.$BillMaster->BillNo], 200);
    }
}
if($TxtSerialNo == '' || $TxtSerialNo == null){
    $TxtSerialNomax = DB::table('billmaster')->max('BillNo')->where('BranchCode',$MBranchCode);
    $TxtSerialNo = $TxtSerialNomax+1;
}
$BillSave = BillMaster::where('BillNo',$TxtSerialNo)->where('type','Bill')->where('BranchCode',$MBranchCode)->first();
info($TxtSerialNo);


if(!$BillSave){
    $BillSave = new BillMaster;
    $BillSave->BranchCode = $MBranchCode;
    $BillSave->BillNo = $TxtSerialNo;
}
$BillSave->OKToPay = $ChkOkToPay;
$BillSave->RefNo = $TxtRefNo;
$BillSave->Date = $TxtDate;
$BillSave->LastDate = date('Y-m-d');
$BillSave->CrActCode = $request->input('TxtCrCode');
$BillSave->SupplierCode = $request->input('TxtSupplierCode');
$BillSave->Des = $request->input('TxtDes');
$BillSave->Terms = $request->input('CmbTerms');
$BillSave->BillAmount = $request->input('TxtNetAmount1');
$BillSave->Type = 'Bill';
$BillSave->WorkUser = $MWorkUser;
$BillSave->save();
info($TxtSerialNo);

for ($i=0; $i <count($TableData) ; $i++) {
    // $insert_update = [];
    // $insert_update["BillNo"] = $TxtSerialNo;
    $ID = (int) $TableData[$i]['ID'];
    if($ID === null ||$ID === 0){
        $max = DB::table('billdetail')
        ->where('BranchCode', $MBranchCode)
        ->max('ID');
        $ID = $max+1;
    }
    $BillDetail = BillDetail::where('ID' , $ID)->where('BillNo' , $TxtSerialNo)->where('BranchCode', $MBranchCode)->first();
if(!$BillDetail){
    $BillDetail = new BillDetail;
    $BillDetail->BranchCode = $MBranchCode;
    $BillDetail->WorkUser = $MWorkUser;
}
$BillDetail->RefNo = $TxtRefNo;
$BillDetail->Date = $TxtDate;
$BillDetail->LastDate = date('Y-m-d');
$BillDetail->Description = $TableData[$i]['Description'];
$BillDetail->Quantity = $TableData[$i]['Qty'];
$BillDetail->Rate = $TableData[$i]['Rate'];
$BillDetail->Amount = $TableData[$i]['Amount'];
$BillDetail->ExpActCode = $TableData[$i]['ExpCode'];
$BillDetail->CrActCode = $request->input('TxtCrCode');
$BillDetail->Des = $request->input('TxtDes');
$BillDetail->Terms = $request->input('CmbTerms');
$BillDetail->SupplierCode = $request->input('TxtSupplierCode');
$BillDetail->Type = 'Bill';
$BillDetail->OKToPay = $ChkOkToPay;
$BillDetail->save();


}
if($BillDetail == true)
        {
            return response()->json( [
                'success'=> true ,
                'BranchCode' => $MBranchCode,
                'TableData' => $TableData,
                'billdetail' => $BillDetail,
                'TxtSerialno' => $TxtSerialNo,
            ]);
        }else{
            return response()->json(['message' => 'Error!'], 404);

        }

}
public function searchBill(Request $request){
    $PVendorcode= 756;
    $MBranchCode = Auth::user()->BranchCode;
   $BillNo = $request->input('BillNo');
   $pono = $request->input('pono');
$firstVoucherNo = DB::table('qrybilldetail')->orderBy('BillNo', 'asc')->first()->BillNo;
$lastVoucherNo = DB::table('qrybilldetail')->orderBy('BillNo', 'desc')->first()->BillNo;
$results = DB::table('qrybilldetail')
      ->where('BillNo', $BillNo)
      ->where('BranchCode', $MBranchCode)
      ->orderBy('BillNo', 'asc')
      ->get();
      $Message = 'nodata';
      $Supply = '';
      $Acfile3 = '';
      if(count($results) > 0){
        // info('data');
          $SupplierCode = $results[0]->SupplierCode;
          $TxtCrCode = $results[0]->CrActCode;
    $Supply = DB::table('suppliersetup')
          ->where('SupplierCode', $SupplierCode)
          ->where('BranchCode', $MBranchCode)
          ->first();
          $Message = 'data';
          $Acfile3 = DB::table('acfile3')
                ->where('actcode', $TxtCrCode)
                ->where('BranchCode', $MBranchCode)
                ->first();
        }


info($results);
// info($Supply);
// info($Acfile3);

   return response()->json([
    'results' =>$results,
    'firstVoucherNo' =>$firstVoucherNo,
    'lastVoucherNo' =>$lastVoucherNo,
    'Supply' =>$Supply,
    'Acfile3' =>$Acfile3,
    'Message' =>$Message,

]);

}
public function PROFITLOSSSTATMENT(){
    return view('Accounts.ProfitLoss', []);

}
public function IncomeBillInvoice(){
    $MBranchCode = Auth::user()->BranchCode;
    $BranchCode= Auth::user()->BranchCode;
    $PVendorcode= 756;
    $department = Typesetup::where('BranchCode', $BranchCode)->orderBy('TypeName')->get();
    $GodownSetup = GodownSetup::where('BranchCode', $BranchCode)->orderBy('GodownName')->get();
    // dd($GodownSetup);
    $vouchers = DB::table('qrybilldetailincome')->select('BillNo')->distinct()->where('BranchCode', $BranchCode)->orderBy('BillNo')->get();
    $Currency = CurrencyModel::select('Currency')->where('BranchCode', $BranchCode)->orderBy('Currency')->get();
    $FixAccountSetup = FixAccountSetup::where('BranchCode', $BranchCode)->first();
    $firstVoucherNo = DB::table('qrybilldetailincome')->orderBy('BillNo', 'asc')->first()->BillNo;
$lastVoucherNo = DB::table('qrybilldetailincome')->orderBy('BillNo', 'desc')->first()->BillNo;
if(!$firstVoucherNo){
    $firstVoucherNo=0;
}
if(!$lastVoucherNo){
    $lastVoucherNo=0;
}
    return view('Accounts.IncomeBillInvoice', [
        'MBranchCode' => $MBranchCode,
        'BranchCode' => $BranchCode,
        'vouchers' => $vouchers,
        'Currency' => $Currency,
        'department' => $department,
        'GodownSetup' => $GodownSetup,
        'FixAccountSetup' => $FixAccountSetup,
        'firstVoucherNo' => $firstVoucherNo,
        'lastVoucherNo' => $lastVoucherNo,
    ]);
}


public function IncomeBillMastersave(Request $request){
    $MBranchCode = Auth::user()->BranchCode;
    $MWorkUser = Auth::user()->UserName;

   $TxtSerialNo = $request->input('TxtSerialNo');
   info($TxtSerialNo);
   $TxtRefNo = $request->input('TxtRefNo');
   $ChkOkToPay = $request->input('ChkOkToPay');
   $TxtDate = $request->input('TxtDate');
   $TableData = $request->table;

if($TxtRefNo == !null){

    $BillMaster = billmasterincome::where('BillNo','<>',$TxtSerialNo)->where('RefNo',$TxtRefNo)->where('type','BREC')->where('BranchCode',$MBranchCode)->orderBy('BillNo')->get();
    if(count($BillMaster) > 0){
        return response()->json(['message' => 'This Customer Invoice No: '.$BillMaster[0]->RefNo.'Already Exist on Invoice No: '.$BillMaster[0]->BillNo], 200);
    }
}
$BillSave = billmasterincome::where('BillNo',$TxtSerialNo)->where('type','BREC')->where('BranchCode',$MBranchCode)->first();
if($TxtSerialNo == '' || $TxtSerialNo == null){
    $TxtSerialNomax = billmasterincome::max('BillNo')->where('type','BREC')->where('BranchCode',$MBranchCode);
    $TxtSerialNo = $TxtSerialNomax+1;
}
info($TxtSerialNo);


if(!$BillSave){
    info('insert');
    $BillSave = new billmasterincome;
    $BillSave->BranchCode = $MBranchCode;
    $BillSave->BillNo = $TxtSerialNo;
}else{

    info('update');
}
$BillSave->OKToPay = $ChkOkToPay;
$BillSave->RefNo = $TxtRefNo;
$BillSave->Date = $TxtDate;
$BillSave->LastDate = date('Y-m-d');
$BillSave->CrActCode = $request->input('TxtCrCode');
$BillSave->CustomerCode = $request->input('TxtSupplierCode');
$BillSave->Des = $request->input('TxtDes');
$BillSave->Terms = $request->input('CmbTerms');
$BillSave->Days = $request->input('TxtDays');
$BillSave->WorkUser = $MWorkUser;
$BillSave->DepartmentCode = $request->input('DepartmentCode');
$BillSave->Department = $request->input('Department');
$BillSave->GodownCode = $request->input('GodownCode');
$BillSave->GodownName = $request->input('GodownName');
$BillSave->VesselName = $request->input('VESSELNAME');
$BillSave->BillAmount = $request->input('BillAmount');
$BillSave->Type = 'BREC';
$BillSave->BankInfo = $request->input('BankInfo');
$BillSave->save();
info($TxtSerialNo);

for ($i=0; $i <count($TableData) ; $i++) {
    // $insert_update = [];
    // $insert_update["BillNo"] = $TxtSerialNo;
    $ID = (int) $TableData[$i]['ID'];
    if($ID === null ||$ID === 0){
        $max = DB::table('billdetail')
        ->where('BranchCode', $MBranchCode)
        ->max('ID');
        $ID = $max+1;
    }
    $BillDetail = BillDetailIncome::where('ID' , $ID)->where('BillNo' , $TxtSerialNo)->where('BranchCode', $MBranchCode)->first();
if(!$BillDetail){
    $BillDetail = new BillDetailIncome;
    $BillDetail->BranchCode = $MBranchCode;
    $BillDetail->BillNo = $TxtSerialNo;
    $BillDetail->WorkUser = $MWorkUser;
}
$BillDetail->RefNo = $TxtRefNo;
$BillDetail->Date = $TxtDate;
$BillDetail->DueDate = $request->input('TxtDueDate');
$BillDetail->LastDate = date('Y-m-d');
$BillDetail->Description = $TableData[$i]['Description'];
$BillDetail->Quantity = $TableData[$i]['Qty'];
$BillDetail->Rate = $TableData[$i]['Rate'];
$BillDetail->Amount = $TableData[$i]['Amount'];
$BillDetail->IncomeActCode = $TableData[$i]['IncomeCode'];
$BillDetail->ActCode = $request->input('TxtCrCode');
$BillDetail->Des = $request->input('TxtDes');
$BillDetail->Days = $request->input('TxtDays');
$BillDetail->Terms = $request->input('CmbTerms');
$BillDetail->DepartmentCode = $request->input('DepartmentCode');
$BillDetail->Department = $request->input('Department');
$BillDetail->GodownCode = $request->input('GodownCode');
$BillDetail->GodownName = $request->input('GodownName');
$BillDetail->VesselName = $request->input('VESSELNAME');
// $BillDetail->BillAmount = $request->input('BillAmount');
$BillDetail->CustomerCode = $request->input('TxtSupplierCode');
$BillDetail->Type = 'BREC';
// $BillDetail->BankInfo = $request->input('BankInfo');
$BillDetail->OKToPay = $ChkOkToPay;
$BillDetail->save();


}
if($BillDetail == true)
        {
            return response()->json( [
                'success'=> true ,
                'BranchCode' => $MBranchCode,
                'TableData' => $TableData,
                'billdetail' => $BillDetail,
                'TxtSerialno' => $TxtSerialNo,
            ]);
        }else{
            return response()->json(['message' => 'Error!'], 404);

        }

}
public function IncomesearchBill(Request $request){
    $PVendorcode= 756;
    $MBranchCode = Auth::user()->BranchCode;
   $BillNo = $request->input('BillNo');
   $pono = $request->input('pono');
   $BankInfo = billmasterincome::select('BankInfo')->where('type','BREC')->where('BranchCode',$MBranchCode)->orderBy('BillNo' ,'Desc')->first();
   $Masterbill = billmasterincome::where('BillNo',$BillNo)->where('type','BREC')->where('BranchCode',$MBranchCode)->orderBy('BillNo' ,'Desc')->first();
$firstVoucherNo = DB::table('qrybilldetailincome')->orderBy('BillNo', 'asc')->first()->BillNo;
$lastVoucherNo = DB::table('qrybilldetailincome')->orderBy('BillNo', 'desc')->first()->BillNo;
$results = DB::table('qrybilldetailincome')
      ->where('BillNo', $BillNo)
      ->where('type', 'BREC')
      ->where('BranchCode', $MBranchCode)
      ->orderBy('ID', 'asc')
      ->get();
      $Message = 'nodata';
      $Supply = '';
      $Acfile3 = '';
      if(count($results) > 0){
    //     info($results);
    // //       $SupplierCode = $results[0]->SupplierCode;
    //       $TxtCrCode = $results[0]->CrActCode;
    $Supply = DB::table('billreceiptvoucher')
          ->where('BillNo', $BillNo)
          ->where('BranchCode', $MBranchCode)
          ->first();

          $Message = 'data';

    //       $Acfile3 = DB::table('Acfile3')
    //             ->where('actcode', $TxtCrCode)
    //             ->where('BranchCode', $MBranchCode)
    //             ->first();
        }


info($results);
// info($Supply);
// info($Acfile3);

   return response()->json([
    'results' =>$results,
    'firstVoucherNo' =>$firstVoucherNo,
    'lastVoucherNo' =>$lastVoucherNo,
    'Supply' =>$Supply,
    'Acfile3' =>$Acfile3,
    'Masterbill' =>$Masterbill,
    'Message' =>$Message,
    'BankInfo' =>$BankInfo,

]);

}
public function searchPayRoll(Request $request){
    $PVendorcode =config('app.PVendorCode');
    $MBranchCode = Auth::user()->BranchCode;
   $SalaryNo = $request->input('SalaryNo');
   $pono = $request->input('pono');
$firstVoucherNo = DB::table('salarysheet')->orderBy('SalaryNo', 'asc')->first()->SalaryNo;
$lastVoucherNo = DB::table('salarysheet')->orderBy('SalaryNo', 'desc')->first()->SalaryNo;
$results = DB::table('salarysheet')
      ->where('SalaryNo', $SalaryNo)
      ->where('BranchCode', $MBranchCode)
      ->orderBy('SalaryNo', 'asc')
      ->get();


info($results);

   return response()->json([
    'results' =>$results,
    'firstVoucherNo' =>$firstVoucherNo,
    'lastVoucherNo' =>$lastVoucherNo,

]);

}

public function OpeningbalancesaveChekc(Request $request){

    $MBranchCode = config('app.MBranchCode');
    $TxtVoucherNo = $request->TxtVoucherNo;

    $OpeningBalance = OpeningBalance::where('VoucherNo',$TxtVoucherNo)->where('BranchCode',$MBranchCode)->first();

    if($OpeningBalance){

        return response()->json([
            'op'=>'data',
        ]);
    }else{
        return $this->Openingbalancesave($request);
    }

}
public function Openingbalancesave(Request $request){
    $MBranchCode = Auth::user()->BranchCode;
    $TxtVoucherNo = $request->TxtVoucherNo;
    $TableData = $request->table;

    try {
    OpeningBalance::where('VoucherNo',$TxtVoucherNo)->where('BranchCode',$MBranchCode)->delete();
    // $OpeningBalance = OpeningBalance::where('VoucherNo',$TxtVoucherNo)->where('BranchCode',$MBranchCode)->first();
    $Message ='';

    for ($i=0; $i < count($TableData) ; $i++) {
        $Message = $TableData[$i]['ActCode'];
        info($TableData[$i]['ActCode']);

            if (strlen(trim($Message)) !== 0) {
                $OpeningBalance = new OpeningBalance;
                $OpeningBalance->ActCapitalCode = $request->input('TxtActCashCode');
                $OpeningBalance->VoucherNo = $TxtVoucherNo;
                $OpeningBalance->Date = $request->input('TxtVoucherDate');
                $OpeningBalance->TotDrAmount = $request->input('TxtTotDrAmount');
                $OpeningBalance->TotCrAmount = $request->input('TxtTotCrAmount');
                $OpeningBalance->BranchCode = $MBranchCode;
                $OpeningBalance->ActCode = $TableData[$i]['ActCode'];
                $OpeningBalance->DrAmt = $TableData[$i]['DebitAmt'];
                $OpeningBalance->CrAmt = $TableData[$i]['CrAmt'];
                $OpeningBalance->Currency = $TableData[$i]['Currency'];
                $OpeningBalance->Des = $TableData[$i]['Description'];
                $OpeningBalance->save();
            }


    }
    Trans::where('Vnon',$TxtVoucherNo)->where('Vnoc','OPBAL')->where('BranchCode',$MBranchCode)->delete();
    for ($i=0; $i < count($TableData) ; $i++) {
        $Message = $TableData[$i]['ActCode'];
        if (strlen(trim($Message)) !== 0 && $TableData[$i]['DebitAmt'] !== 0) {
            $Trans = new Trans;
            $Trans->Vnon = $TxtVoucherNo;
            $Trans->Vnoc = 'OPBAL';
            $Trans->Date = $request->input('TxtVoucherDate');
            $Trans->BranchCode = $MBranchCode;
            $Trans->Currency = $TableData[$i]['Currency'];
           $message = $TableData[$i]['DebitAmt'];
            if(intval($message) >  0){
                $Trans->ActCode = $TableData[$i]['ActCode'];
                $Trans->ActCode2 = $request->input('TxtActCashCode');
                $Trans->TransAmt = intval($message);
            }
            $message = $TableData[$i]['Description'] ? $TableData[$i]['Description'] : '';
            $Trans->Des = $message;
            $Trans->save();

            $Trans = new Trans;
            $Trans->Vnon = $TxtVoucherNo;
            $Trans->Vnoc = 'OPBAL';
            $Trans->Date = $request->input('TxtVoucherDate');
            $Trans->BranchCode = $MBranchCode;
            $Trans->Currency = $TableData[$i]['Currency'];
           $message = $TableData[$i]['DebitAmt'];
            if(intval($message) >  0){
                $Trans->ActCode = $request->input('TxtActCashCode');
                $Trans->ActCode2 = $TableData[$i]['ActCode'];
                $Trans->TransAmt = intval($message) * -1;
            }
            $message = $TableData[$i]['Description'] ? $TableData[$i]['Description'] : '';
            $Trans->Des = $message;
            $Trans->save();

        }


        if (strlen(trim($Message)) !== 0 && $TableData[$i]['CrAmt'] !== 0) {
            $Trans = new Trans;
            $Trans->Vnon = $TxtVoucherNo;
            $Trans->Vnoc = 'OPBAL';
            $Trans->Date = $request->input('TxtVoucherDate');
            $Trans->BranchCode = $MBranchCode;
            $Trans->Currency = $TableData[$i]['Currency'];
           $message = $TableData[$i]['CrAmt'];
            if(intval($message) >  0){
                $Trans->ActCode = $request->input('TxtActCashCode');
                $Trans->ActCode2 = $TableData[$i]['ActCode'];
                $Trans->TransAmt = intval($message);
            }
            $message = $TableData[$i]['Description'] ? $TableData[$i]['Description'] : '';
            $Trans->Des = $message;
            $Trans->save();

            $Trans = new Trans;
            $Trans->Vnon = $TxtVoucherNo;
            $Trans->Vnoc = 'OPBAL';
            $Trans->Date = $request->input('TxtVoucherDate');
            $Trans->BranchCode = $MBranchCode;
            $Trans->Currency = $TableData[$i]['Currency'];
           $message = $TableData[$i]['CrAmt'];
            if(intval($message) >  0){
                $Trans->ActCode = $TableData[$i]['ActCode'];
                $Trans->ActCode2 = $request->input('TxtActCashCode');
                $Trans->TransAmt = intval($message) * -1;
            }
            $message = $TableData[$i]['Description'] ? $TableData[$i]['Description'] : '';
            $Trans->Des = $message;
            $Trans->save();

        }

    }

    return response()->json([
        'Message' => 'Data saved successfully.',
      ]);
    } catch (\Exception $e) {
      return response()->json([
        'Message' => 'Error saving data: ' . $e->getMessage(),
      ]);
    }

}


public function Openingbalance(){
    $MBranchCode = Auth::user()->BranchCode;
    $BranchCode= Auth::user()->BranchCode;
    $PVendorcode= 756;
    $department = Typesetup::where('BranchCode', $BranchCode)->orderBy('TypeName')->get();
    $GodownSetup = GodownSetup::where('BranchCode', $BranchCode)->orderBy('GodownName')->get();
    // dd($GodownSetup);
    $vouchers = DB::table('qryopeningbalance')->select('VoucherNo')->distinct()->where('BranchCode', $BranchCode)->orderBy('VoucherNo')->get();
    $Currency = CurrencyModel::select('Currency')->where('BranchCode', $BranchCode)->orderBy('Currency')->get();
    $FixAccountSetup = FixAccountSetup::where('BranchCode', $BranchCode)->first();
    if($FixAccountSetup){
        $MCapitalCode = $FixAccountSetup->MCapCode;
        $MCashCode = $FixAccountSetup->ActCashCode;
    }
    else{
        $MCapitalCode = '';
        $MCashCode = '';
    }
    $acdata = AcFile::Select('ActCode','AcName3')->where('ActCode',$MCapitalCode)->first();
if($acdata){
    $ActCode = $acdata->ActCode;
    $AcName3 = $acdata->AcName3;
}else{
    $ActCode = $MCapitalCode;
    $AcName3 = '';
}
    $firstVoucherNo = DB::table('qryopeningbalance')->orderBy('VoucherNo', 'asc')->first();
    if($firstVoucherNo){
        $firstVoucherNo = $firstVoucherNo->VoucherNo;
    }
    $lastVoucherNo = DB::table('qryopeningbalance')->orderBy('VoucherNo', 'desc')->first();
    if($lastVoucherNo){
        $lastVoucherNo = $lastVoucherNo->VoucherNo;
    }
    return view('Accounts.Openingbalance', [
        'MBranchCode' => $MBranchCode,
        'BranchCode' => $BranchCode,
        'vouchers' => $vouchers,
        'Currency' => $Currency,
        'department' => $department,
        'GodownSetup' => $GodownSetup,
        'FixAccountSetup' => $FixAccountSetup,
        'firstVoucherNo' => $firstVoucherNo,
        'lastVoucherNo' => $lastVoucherNo,
        'MCapitalCode' => $MCapitalCode,
        'MCashCode' => $MCashCode,
        'ActCode' => $ActCode,
        'AcName3' => $AcName3,
    ]);
}

public function Openingbalancesearch(Request $request){
    $PVendorcode= 756;
    $MBranchCode = Auth::user()->BranchCode;
   $BillNo = $request->input('BillNo');
$firstVoucherNo = DB::table('qryopeningbalance')->orderBy('VoucherNo', 'asc')->first();
if($firstVoucherNo){
    $firstVoucherNo = $firstVoucherNo->VoucherNo;
}else{
    $firstVoucherNo = 0;
}
$lastVoucherNo = DB::table('qryopeningbalance')->orderBy('VoucherNo', 'desc')->first();
if($lastVoucherNo){
    $lastVoucherNo = $lastVoucherNo->VoucherNo;
}else{
    $lastVoucherNo = 0;
}
$results = DB::table('qryopeningbalance')
      ->where('VoucherNo', $BillNo)
      ->where('BranchCode', $MBranchCode)
      ->orderBy('ID', 'asc')
      ->get();
      $Message = 'nodata';

      if(count($results) > 0){


          $Message = 'data';

        }


info($results);
// info($Supply);
// info($Acfile3);

   return response()->json([
    'results' =>$results,
    'firstVoucherNo' =>$firstVoucherNo,
    'lastVoucherNo' =>$lastVoucherNo,
    'Message' =>$Message,

]);

}


public function journalvoucher(){
    $MBranchCode = Auth::user()->BranchCode;
    $PVendorcode= 756;
    $BranchCode =Auth::user()->BranchCode;
    $Currency = CurrencyModel::select('Currency')->where('BranchCode', $BranchCode)->orderBy('Currency')->get();
    $FixAccountSetup = FixAccountSetup::where('BranchCode', $BranchCode)->first();
    $Voucher = JournalVoucher::select('VoucherNo')->orderBy('VoucherNo')->get();
    $firstVoucherNo = JournalVoucher::orderBy('VoucherNo', 'asc')->first();
    $lastVoucherNo = JournalVoucher::orderBy('VoucherNo', 'desc')->first();
if($firstVoucherNo){
    $firstVoucherNo = $firstVoucherNo->VoucherNo;
}
if($lastVoucherNo){
    $lastVoucherNo = $lastVoucherNo->VoucherNo;
}


    return view('Accounts.JournalVoucher', [
        'MBranchCode' => $MBranchCode,
        'Currency' => $Currency,
        'FixAccountSetup' => $FixAccountSetup,
        'firstVoucherNo' => $firstVoucherNo,
        'lastVoucherNo' => $lastVoucherNo,
        'Voucher' => $Voucher,
    ]);
}


public function CheckRecon(Request $request){
    $MBranchCode = Auth::user()->BranchCode;
    $MWorkUser = Auth::user()->UserName;
    $MVnoc = $request->MVnoc;
    $MVnon = $request->MVnon;
    $TableData = $request->datatablearray;
    $MRecon = false;
    $Message = 'start';
    $MReconAmtChange = 'N';

    for ($i=0; $i < count($TableData) ; $i++) {
        # code...
        info($TableData[$i]);
         $MDebitAmt = $TableData[$i]['DebitAmount'];
         $MCreditAmt = $TableData[$i]['CreditAmount'];
         if($MDebitAmt > 0){

             // $trans = trans::Select('ChkRecon','TransAmt')->where('TransAmt','<',0)->where('Vnon',$MVnon)->where('Vnoc',$MVnoc)->where('BranchCode',$MBranchCode)->first();
        //      $trans = trans::select(DB::raw('IFNULL(ChkRecon, 0) AS ChkRecon, TransAmt'))
        //  ->where('TransAmt', '>', 0)
        //  ->where('Vnon', $MVnon)
        //  ->where('Vnoc', $MVnoc)
        //  ->where('BranchCode', $MBranchCode)
        //  ->first();
        $trans = Trans::select(DB::raw('ISNULL(ChkRecon, 0) AS ChkRecon, TransAmt'))
    ->where('TransAmt', '>', 0)
    ->where('Vnon', $MVnon)
    ->where('Vnoc', $MVnoc)
    ->where('BranchCode', $MBranchCode)
    ->first();

     if($trans){
         $MRecon = $trans->ChkRecon;
         if($MRecon == True){
             if($trans->TransAmt !== $MDebitAmt){
                $Message = 'ALREADY CONCILED Confirmation';
                $MReconAmtChange = 'Y';
             }
         }
     }
         }
         if($MCreditAmt > 0){

             // $trans = trans::Select('ChkRecon','TransAmt')->where('TransAmt','<',0)->where('Vnon',$MVnon)->where('Vnoc',$MVnoc)->where('BranchCode',$MBranchCode)->first();
             $trans = trans::select('ChkRecon', 'TransAmt')
         ->where('TransAmt', '<', 0)
         ->where('Vnon', $MVnon)
         ->where('Vnoc', $MVnoc)
         ->where('BranchCode', $MBranchCode)
         ->first();
     if($trans){
         $MRecon = $trans->ChkRecon;
         if($MRecon == True){
             if($trans->TransAmt !== $MCreditAmt){
                $Message = 'ALREADY CONCILED Confirmation';
                $MReconAmtChange = 'Y';
             }
         }
     }
         }
    }

    return response()->json( [
        'BranchCode' => $MBranchCode,
        'TableData' => $TableData,
        'Message' => $Message,
        'MReconAmtChange' => $MReconAmtChange,
    ]);
}

public function jvsave(Request $request){
    $MBranchCode = Auth::user()->BranchCode;
    $MWorkUser = Auth::user()->UserName;
    $TxtVoucherNo = $request->input('TxtVoucherNo');
    $TxtVoucherDate = $request->input('TxtVoucherDate');
    $TxtGodownCode = $request->input('TxtGodownCode');
    $TxtTotCrAmount = $request->input('TxtTotCrAmount');
    $TxtTotDrAmount = $request->input('TxtTotDrAmount');
    $Currency = 'USD';
    $TableData = $request->table;


$BillSave = JournalVoucher::where('VoucherNo',$TxtVoucherNo)->where('BranchCode',$MBranchCode)->first();
for ($i=0; $i <count($TableData) ; $i++) {



if(!$BillSave){
    $BillSave = new JournalVoucher;
}
$BillSave->ActCode = $TableData[$i]['ActCode'];
$BillSave->GodownCode = $TxtGodownCode;
$BillSave->VoucherNo = $TxtVoucherNo;
$BillSave->Date = $TxtVoucherDate;
$BillSave->TotDrAmount = $TxtTotDrAmount;
$BillSave->TotCrAmount = $TxtTotCrAmount;
$BillSave->Currency = $Currency;
$BillSave->ActName3 = $TableData[$i]['AccountName'];
$BillSave->DrAmt = $TableData[$i]['DebitAmount'];
$BillSave->CrAmt = $TableData[$i]['CreditAmount'];
$BillSave->Des = $TableData[$i]['Description'];
$BillSave->BranchCode = $MBranchCode;
info($BillSave);
$BillSave->save();
    }
    $trans = trans::where('Vnon',$TxtVoucherNo)->where('Vnoc','JV')->where('BranchCode',$MBranchCode)->first();
    for ($i=0; $i <count($TableData) ; $i++) {

    if(!$trans){
        $trans = new trans;
        // $BillSave->ActCode = $TableData[$i]['ActCode'];
    }
    $trans->GodownCode = $TxtGodownCode;
    $trans->Vnon = $TxtVoucherNo;
    $trans->Vnoc = 'JV';
    $trans->Date = $TxtVoucherDate;
    $trans->BranchCode = $MBranchCode;
    $trans->Currency = $Currency;
    $trans->ActCode = $TableData[$i]['ActCode'];
    info($trans);

    }


// }
// if($BillDetail == true)
//         {
            return response()->json( [
                // 'success'=> true ,
                'BranchCode' => $MBranchCode,
                'TableData' => $TableData,
                'BillSave' => $BillSave,
                // 'TxtSerialno' => $TxtSerialNo,
            ]);
//         }else{
//             return response()->json(['message' => 'Error!'], 404);

//         }

}
public function jvdes(Request $request){
    $MBranchCode = Auth::user()->BranchCode;
    $ActCode = $request->ActCode;
    $Des = JournalVoucher::select('Des')->where('ActCode',$ActCode)->orderBy('ID','desc')->first();
    // info($Des);
    return response()->json([
        'results' =>$Des,

    ]);
}
public function jvact(Request $request){
    $MBranchCode = Auth::user()->BranchCode;
    $ActCode = $request->ActCode;
    $act = AcFile::where('BranchCode',$MBranchCode)->where('ActCode',$ActCode)->first();
    // $Des = JournalVoucher::select('Des')->where('ActCode',$ActCode)->orderBy('ID','desc')->first();
    // info($Des);
    return response()->json([
        'results' =>$act,

    ]);
}

public function jvsearch(Request $request){
    $PVendorcode= 756;
    $MBranchCode = Auth::user()->BranchCode;
   $BillNo = $request->input('BillNo');
   $pono = $request->input('pono');
$firstVoucherNo = JournalVoucher::orderBy('VoucherNo', 'asc')->first()->VoucherNo;
$lastVoucherNo = JournalVoucher::orderBy('VoucherNo', 'desc')->first()->VoucherNo;
$results = JournalVoucher::where('VoucherNo', $BillNo)
->where('BranchCode', $MBranchCode)
->orderBy('ID', 'asc')
->get();
$Message = 'nodata';
$Supply = '';
$Acfile3 = '';
$Trans = '';
$ActCodeget = '';
if(count($results) > 0){
    info($results[0]->ActCode);
    $ActCode = $results[0]->ActCode;

    $ActCodeget = Acfile::select('ActCode')->where('ChkRecAc', 1)->where('ActCode',$ActCode)->where('BranchCode',$MBranchCode)->get();
    info($ActCodeget);
    if(count($ActCodeget) > 0){

        $Trans = Trans::select('ChkRecon','ReconWorkUser','ReconDate','TransAmt')->where('Vnon', $BillNo)->where('Vnoc','JV')->where('ActCode',$ActCode)->where('BranchCode',$MBranchCode)->first();
        info($Trans);


    }
          $Message = 'data';

        }


info($results);
// info($Supply);
// info($Acfile3);

   return response()->json([
    'results' =>$results,
    'firstVoucherNo' =>$firstVoucherNo,
    'lastVoucherNo' =>$lastVoucherNo,
    'Supply' =>$Supply,
    'Acfile3' =>$Acfile3,
    'Message' =>$Message,
    'ActCodeget' =>$ActCodeget,
    'Trans' =>$Trans,

]);

}

public function AccountLedger(){
    $MBranchCode = Auth::user()->BranchCode;
    $PVendorcode= 756;
    $BranchCode =Auth::user()->BranchCode;
    $FixAccountSetup = FixAccountSetup::where('BranchCode', $BranchCode)->first();
    $GodownSetup = GodownSetup::select('GodownName','GodownCode')->where('ChkNotShow',0)->where('BranchCode',$MBranchCode)->orderBy('Godowncode')->get();
    $TermsSetup = termssetup::select('Terms','TermsCode')->distinct()->where('BranchCode',$MBranchCode)->orderBy('Terms')->get();
    // $Trans = Trans::select('Vnoc')->where('ChkNotShow',0)->where('BranchCode',$MBranchCode)->orderBy('Godowncode')->get();


    return view('Accounts.AccountLedger', [
        'BranchCode' => $MBranchCode,
        'FixAccountSetup' => $FixAccountSetup,
        'GodownSetup' => $GodownSetup,
        'TermsSetup' => $TermsSetup,
    ]);
}
public function MultiAccountLedger(){
    $MBranchCode = Auth::user()->BranchCode;
    $PVendorcode= 756;
    $BranchCode =Auth::user()->BranchCode;
    $FixAccountSetup = FixAccountSetup::where('BranchCode', $BranchCode)->first();
    $GodownSetup = GodownSetup::select('GodownName','GodownCode')->where('ChkNotShow',0)->where('BranchCode',$MBranchCode)->orderBy('Godowncode')->get();
    $TermsSetup = termssetup::select('Terms','TermsCode')->distinct()->where('BranchCode',$MBranchCode)->orderBy('Terms')->get();
    // $Trans = Trans::select('Vnoc')->where('ChkNotShow',0)->where('BranchCode',$MBranchCode)->orderBy('Godowncode')->get();


    return view('Accounts.MultiAccountLedger', [
        'BranchCode' => $MBranchCode,
        'FixAccountSetup' => $FixAccountSetup,
        'GodownSetup' => $GodownSetup,
        'TermsSetup' => $TermsSetup,
    ]);
}

public function ACFillType(Request $request){
    $MBranchCode = Auth::user()->BranchCode;
    $PVendorcode= 756;
    $ActCode = $request->input('ActCode');

    $Trans = Trans::select('Vnoc')->distinct()->where('BranchCode',$MBranchCode)->where('ActCode',$ActCode)->get();


    return response()->json([
        'Trans' => $Trans,
    ]);
}

public function AClGenrate(Request $request){
    $MBranchCode = Auth::user()->BranchCode;
    $MWorkUser = Auth::user()->UserName;

    $PVendorcode= 756;
    $TxtActCode = $request->input('ActCode');
    $TxtActName = $request->input('ActName');
    $ChkGodownAll = $request->input('ChkGodownAll');
    $TxtDateFrom = $request->input('TxtDateFrom');
    $TxtDateTo = $request->input('TxtDateTo');
    $ChkCompanyHeading = $request->input('ChkCompanyHeading');
    $Qry = $request->input('Qry');

    AcLedger::where('WorkUser',$MWorkUser)->where('BranchCode',$MBranchCode)->delete();
    $AcFile = AcFile::select('OpeningBalance')->where('ActCode',$TxtActCode)->where('BranchCode',$MBranchCode)->first();
    if($AcFile){
        $MAcFileOp = $AcFile->OpeningBalance;
    }else{
        $MAcFileOp = 0;
    }
    if ($ChkGodownAll !== 'true') {
        info('false');
        $MTransOps = Trans::selectRaw('SUM(TransAmt) as MTransOp')
            ->where('GodownCode', $request->input('TxtGodownCode'))
            ->where('ActCode', $TxtActCode)
            ->where('Date', '<', $TxtDateFrom)
            ->where('BranchCode', $MBranchCode)
            ->get();
    $MTransOpe = $MTransOps[0]->MTransOp;

            // info($MTransOpe);
    } else {
        info('trues');
       $MTransOps = Trans::selectRaw('SUM(TransAmt) as MTransOp')
    ->where('ActCode', $TxtActCode)
    ->where('Date', '<', $TxtDateFrom)
    ->where('BranchCode', $MBranchCode)
    ->get();
    $MTransOpe = $MTransOps[0]->MTransOp;
    // info($MTransOpe);

    }

    if($MTransOpe){
        $MTransOp = $MTransOpe;
    }else{
        $MTransOp = 0;

    }
    $TotOp = $MAcFileOp + $MTransOp;
    $MBalance = $TotOp;

    $AcLedger = new AcLedger;
    $AcLedger->ActCode = $TxtActCode;
    $AcLedger->WorkUser = $MWorkUser;
    $AcLedger->Des = 'Balance B/f...';
    $AcLedger->ChkRecon = 0;
// info($TotOp);
    if($TotOp > 0){
        $AcLedger->Debit = 0;
        $AcLedger->Credit = 0;
        $MBalance = $TotOp;
        $AcLedger->Balance = round(abs((float)$TotOp), 2);
        $AcLedger->Mark = "Dr";
    }else{
        $AcLedger->Debit = 0;
        $AcLedger->Credit = 0;
        $MBalance = $TotOp;
        $AcLedger->Balance = round(abs((float)$TotOp), 2);
        $AcLedger->Mark = "Cr";
    }
    $AcLedger->BranchCode = $MBranchCode;
    $AcLedger->save();

    if($Qry == ''){
        $trans = Trans::where('ActCode', $TxtActCode)
        ->whereBetween('Date', [
            $TxtDateFrom,
            $TxtDateTo
        ])
            ->where('BranchCode', $MBranchCode)
            ->orderBy('Date')
            ->orderBy('Vnoc')
            ->orderBy('Vnon')
            ->get();

    }else{

        $trans = Trans::where('ActCode', $TxtActCode)
        ->whereBetween('Date', [
            $TxtDateFrom,
            $TxtDateTo
        ])
        ->where('BranchCode', $MBranchCode)
        ->whereRaw($Qry)
        ->orderBy('Date')
        ->orderBy('Vnoc')
        ->orderBy('Vnon')
        ->get();



    }
    if(count($trans) > 0){
        for ($i=0; $i < count($trans) ; $i++) {
            $AcLedger = new AcLedger;
            $AcLedger->ActCode = $TxtActCode;
            $AcLedger->Date = $trans[$i]->Date;
            $AcLedger->Vnon = $trans[$i]->Vnon;
            $AcLedger->RefNo = $trans[$i]->ChqNo;
            $AcLedger->ChqNo = $trans[$i]->ChqNo;
            $MVnoc = $trans[$i]->Vnoc;

            if($MVnoc == 'DMSNG'){
                $MDes = $trans[$i]->Des;
                $bVon = $trans[$i]->Vnon;
                $DMMissingMaster = DB::table('dmmissingmaster')->select('DepartmentName','GodownName')->where('PurchaseOrderNo',$bVon)->where('BranchCode',$MBranchCode)->first();
                if($DMMissingMaster){
                    $MDes = $MDes.', '.$DMMissingMaster->DepartmentName.', '.$DMMissingMaster->GodownName;
                }
            }else{
                $MDes = $trans[$i]->Des;
            }
            $AcLedger->Des = $MDes;
            $AcLedger->Vnoc = $trans[$i]->Vnoc;
            $AcLedger->TransType = $trans[$i]->PayType;
            $AcLedger->WorkUser = $MWorkUser;
            $AcLedger->ChqNo = $trans[$i]->ChqNo;
            $AcLedger->ChqDate = $trans[$i]->ChqDate;
            $ChkRecon = $trans[$i]->ChkRecon;
            if($ChkRecon == true){
                $MRecon = true;
            }else{
                $MRecon = false;
            }
            if($MRecon == true){
                $AcLedger->ChkRecon = 1;
            }else{
                $AcLedger->ChkRecon = 0;
            }
            $TransAmt = $trans[$i]->TransAmt;
            if($TransAmt > 0){
                $AcLedger->Debit = round($trans[$i]->TransAmt, 2);
                $AcLedger->Credit = 0;
                $MBalance = floatval($MBalance) + round(floatval($trans[$i]->TransAmt), 2);
            }
            else{
                $AcLedger->Debit = 0;
                $AcLedger->Credit = round($TransAmt, 2);
                $MBalance = floatval($MBalance) - abs(floatval($TransAmt));
                $MBalance = number_format($MBalance, 2);
            }
// info($MBalance);
            if($MBalance > 0){
                info('dr');
                $AcLedger->Mark = 'Dr';
            }else{
                info('cr');
                $AcLedger->Mark = 'Cr';
            }
            $AcLedger->Balance = round(floatval($MBalance), 2);
            $AcLedger->BranchCode = $MBranchCode;
            $AcLedger->save();

        }

    }
    $MRep = 'cc';
    $DateFrom = $request->input('TxtDateFrom');
    $DateTo = $request->input('TxtDateTo');
if($ChkCompanyHeading == 'true'){
    $CHeading = '1';
}else{
    $CHeading = '0';
}



    return response()->json([
        'MRep' => $MRep,
        'DateFrom' => $DateFrom,
        'DateTo' => $DateTo,
        'CHeading' => $CHeading,
        'TxtActCode' => $TxtActCode,
        'TxtActName' => $TxtActName,
    ]);
}

public function LedgerGrid(Request $request){
    $DateFrom = $request->input('TxtDateFrom');
    $TxtActCode = $request->input('TxtActCode');
    $TxtActName = $request->input('TxtActName');
    $DateTo = $request->input('TxtDateTo');
    $CHeading = $request->input('CHeading');
    $BranchCode = config('app.MBranchCode');
    $MWorkUser = Auth::user()->UserName;
    $company = CompanySetup::where('BranchCode',$BranchCode)->first();
    $AcLedger = AcLedger::where('workuser',$MWorkUser)->where('BranchCode',$BranchCode)->orderBy('Date')->orderBy('Vnoc')->orderBy('Vnon')->get();
    $ChkLedgerReconcile = DB::table('UserRights')->select('ChkLedgerReconcile')->where('ChkLedgerReconcile',1)->where('UserName',$MWorkUser)->where('BranchCode',$BranchCode)->first();
    // dd($ChkLedgerReconcile);



    return view('prints.frmLedgerGrid', [
        'DateFrom' => $DateFrom,
        'Date' => $DateTo,
        'CHeading' => $CHeading,
        'company' => $company,
        'MWorkUser' => $MWorkUser,
        'items' => $AcLedger,
        'ChkLedgerReconcile' => $ChkLedgerReconcile,
        'TxtActCode' => $TxtActCode,
        'TxtActName' => $TxtActName,
    ]);
}


public function Customer_Setup_Income(){
    //     $message='';
//  $PVendorcode= 756;
$BranchCode =Auth::user()->BranchCode;
$vouchers = DB::table('pettycashvoucher')->select('VoucherNo')->distinct()->where('BranchCode', $BranchCode)->orderBy('VoucherNo')->get();
$Currency = CurrencyModel::select('Currency')->where('BranchCode', $BranchCode)->orderBy('Currency')->get();
$FixAccountSetup = FixAccountSetup::where('BranchCode', $BranchCode)->first();
// dd($FixAccountSetup->ActCashCode);
// $ReceiptVoucher = DB::table('ReceiptVoucher')->where('BranchCode', $BranchCode)->orderBy('Currency')->get();


    return view('Accounts.Customer_Setup_Income', [
        'vouchers' => $vouchers,
        'Currency' => $Currency,
        'FixAccountSetup' => $FixAccountSetup,
        // 'message' => $message,

    ]);
}

public function Vendor_Setup_Income(){
    //     $message='';
//  $PVendorcode= 756;
$BranchCode =Auth::user()->BranchCode;
$vouchers = DB::table('pettycashvoucher')->select('VoucherNo')->distinct()->where('BranchCode', $BranchCode)->orderBy('VoucherNo')->get();
$Currency = CurrencyModel::select('Currency')->where('BranchCode', $BranchCode)->orderBy('Currency')->get();
$FixAccountSetup = FixAccountSetup::where('BranchCode', $BranchCode)->first();
// dd($FixAccountSetup->ActCashCode);
// $ReceiptVoucher = DB::table('ReceiptVoucher')->where('BranchCode', $BranchCode)->orderBy('Currency')->get();


    return view('Accounts.Vendor_Setup_Income', [
        'vouchers' => $vouchers,
        'Currency' => $Currency,
        'FixAccountSetup' => $FixAccountSetup,
        // 'message' => $message,

    ]);
}

public function Expense_Setup(){
    //     $message='';
//  $PVendorcode= 756;
$BranchCode =Auth::user()->BranchCode;
$vouchers = DB::table('pettycashvoucher')->select('VoucherNo')->distinct()->where('BranchCode', $BranchCode)->orderBy('VoucherNo')->get();
$Currency = CurrencyModel::select('Currency')->where('BranchCode', $BranchCode)->orderBy('Currency')->get();
$FixAccountSetup = FixAccountSetup::where('BranchCode', $BranchCode)->first();
// dd($FixAccountSetup->ActCashCode);
// $ReceiptVoucher = DB::table('ReceiptVoucher')->where('BranchCode', $BranchCode)->orderBy('Currency')->get();


    return view('Accounts.Expense_Setup', [
        'vouchers' => $vouchers,
        'Currency' => $Currency,
        'FixAccountSetup' => $FixAccountSetup,
        // 'message' => $message,

    ]);
}


public function Fixed_Assets_Depreciation(){
    //     $message='';
//  $PVendorcode= 756;
$BranchCode =Auth::user()->BranchCode;
$vouchers = DB::table('pettycashvoucher')->select('VoucherNo')->distinct()->where('BranchCode', $BranchCode)->orderBy('VoucherNo')->get();
$Currency = CurrencyModel::select('Currency')->where('BranchCode', $BranchCode)->orderBy('Currency')->get();
$FixAccountSetup = FixAccountSetup::where('BranchCode', $BranchCode)->first();
// dd($FixAccountSetup->ActCashCode);
// $ReceiptVoucher = DB::table('ReceiptVoucher')->where('BranchCode', $BranchCode)->orderBy('Currency')->get();


    return view('Accounts.Fixed_Assets_Depreciation', [
        'vouchers' => $vouchers,
        'Currency' => $Currency,
        'FixAccountSetup' => $FixAccountSetup,
        // 'message' => $message,

    ]);
}


public function Customer_Receipt_History(){
    //     $message='';
//  $PVendorcode= 756;
$BranchCode =Auth::user()->BranchCode;
$vouchers = DB::table('pettycashvoucher')->select('VoucherNo')->distinct()->where('BranchCode', $BranchCode)->orderBy('VoucherNo')->get();
$Currency = CurrencyModel::select('Currency')->where('BranchCode', $BranchCode)->orderBy('Currency')->get();
$FixAccountSetup = FixAccountSetup::where('BranchCode', $BranchCode)->first();
// dd($FixAccountSetup->ActCashCode);
// $ReceiptVoucher = DB::table('ReceiptVoucher')->where('BranchCode', $BranchCode)->orderBy('Currency')->get();


    return view('Accounts.Customer_Receipt_History', [
        'vouchers' => $vouchers,
        'Currency' => $Currency,
        'FixAccountSetup' => $FixAccountSetup,
        // 'message' => $message,

    ]);
}


public function YearlyExpenseReport(){
    //     $message='';
//  $PVendorcode= 756;
$BranchCode =Auth::user()->BranchCode;
$vouchers = DB::table('pettycashvoucher')->select('VoucherNo')->distinct()->where('BranchCode', $BranchCode)->orderBy('VoucherNo')->get();
$Currency = CurrencyModel::select('Currency')->where('BranchCode', $BranchCode)->orderBy('Currency')->get();
$FixAccountSetup = FixAccountSetup::where('BranchCode', $BranchCode)->first();
// dd($FixAccountSetup->ActCashCode);
// $ReceiptVoucher = DB::table('ReceiptVoucher')->where('BranchCode', $BranchCode)->orderBy('Currency')->get();


    return view('Accounts.YearlyExpenseReport', [
        'vouchers' => $vouchers,
        'Currency' => $Currency,
        'FixAccountSetup' => $FixAccountSetup,
        // 'message' => $message,


    ]);
}






}
