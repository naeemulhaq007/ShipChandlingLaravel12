<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller; // Make sure this is included
use App\Models\Trans;
use App\Models\AcFile;
use App\Models\UOMModel;
use App\Models\Typesetup;
use App\Models\termssetup;
use Laminas\Db\Sql\Select;
use App\Models\GodownSetup;
use App\Models\VenderSetup;
use App\Models\CompanySetup;
use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Models\CurrencyModel;
use App\Models\InvoiceDetail;
use App\Models\InvoiceMaster;
use App\Models\FixAccountSetup;
use App\Models\OrderMasterModel;
use App\Models\ShipingPortSetup;
use App\Models\VendorDepartment;
use App\Models\VenderProductList;
use App\Models\UserRights;
use Illuminate\Support\Facades\Auth;
// use GroceryCrud\Core\GroceryCrud;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\Response;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        // dd(Auth::user());
        if (Auth::check()) {
            return view('home'); // Load homepage if authenticated
        } else {
            return redirect('login'); // Redirect to login page if not authenticated
        }
        return view('home', []);
    }

    public function indexload()
    {
        $BranchCode = Auth::user()->BranchCode;
        $MUserName = Auth::user()->UserName;
        $invoicesCount = InvoiceMaster::where('BranchCode', $BranchCode)->whereRaw('(NetAmount - PaidAmt) > 0')->count('Id');
        $invoicesReceviedCount = InvoiceMaster::where('BranchCode', $BranchCode)->whereRaw('(NetAmount - PaidAmt) = 0')->count('Id');

        $OrderCount = OrderMasterModel::where('BranchCode', $BranchCode)->whereRaw('(NetAmount - ReceivedAmt) > 0')->distinct('PONo')->count(DB::raw('DISTINCT PONo'));
        $OrderReceviedCount = OrderMasterModel::where('BranchCode', $BranchCode)->whereRaw('(NetAmount - ReceivedAmt) = 0')->distinct('PONo')->count(DB::raw('DISTINCT PONo'));
        $Allorder = [];
        $Ordersvsn = OrderMasterModel::select('VSNNo')->distinct('VSNNo')->where('BranchCode', $BranchCode)->orderBy('VSNNo', 'Desc')->limit(7)->get();
        foreach ($Ordersvsn as $Ordersvs) {
            $Orders = OrderMasterModel::select('PONo', 'CustomerName', 'VesselName', 'Status', 'ExtAmount',)->where('BranchCode', $BranchCode)->where('VSNNo', $Ordersvs->VSNNo)->first();
            $Allorder[] = [
                'Orders' => $Orders,
                'Vsn' => $Ordersvs,
            ];
        }

        $StockCount = OrderMasterModel::where('BranchCode', $BranchCode)->whereRaw('(NetAmount - ReceivedAmt) > 0')->distinct('VSNNo')->count(DB::raw('DISTINCT VSNNo'));
        $branchCode = $BranchCode;
        $dateTo = date('Y-m-d');
        $dateFrom = "2019-08-28";

        $BidDueDate = date('Y-m-d');
        $Event = DB::select('CALL SPEvent(?, ?)', [$BranchCode, $BidDueDate]);

        $VSNLog = DB::select("SELECT ID FROM vw_fliptovsn1 WHERE BranchCode = ? AND DeliveryDate >= ? ORDER BY DeliveryDate, Time, VSNNo", [$BranchCode, $BidDueDate]);

        $QuotationCount = count($Event);
        $VSNLogcount = count($VSNLog);


        $oneMonthAgo = now()->subMonth(); // Calculate the date one month ago

        $TOTALREVENUE = Trans::where('Date', '>=', $oneMonthAgo)
            ->where('transamt', '>', 0)
            ->sum('transamt');
        $TOTALCOST = Trans::where('Date', '>=', $oneMonthAgo)
            ->where('transamt', '<', 0)
            ->sum('transamt');
        $TOTALPROFIT = Trans::where('Date', '>=', $oneMonthAgo)
            ->sum('transamt');
        $transCount = Trans::count('transamt');
        $STOCK = VenderProductList::where('type', 'STOCK')->count();

        $UserRights = UserRights::where('UserName',$MUserName)->where('BranchCode',$BranchCode)->first();
        $branchName = config('custom.BranchName');
        info($branchName);
        return response()->json([
            'Allorder' => $Allorder,
            'OrderCount' => $OrderCount,
            'Invoice' => $invoicesCount,
            'VSNLogcount' => $VSNLogcount,
            'QuotationCount' => $QuotationCount,
            'OrderReceviedCount' => $OrderReceviedCount,
            'invoicesReceviedCount' => $invoicesReceviedCount,
            'TOTALREVENUE' => $TOTALREVENUE,
            'TOTALCOST' => $TOTALCOST,
            'TOTALPROFIT' => $TOTALPROFIT,
            'transCount' => $transCount,
            'STOCK' => $STOCK,
            'UserRights' => $UserRights,
        ]);
    }

    public function Origin_Setup()
    {

        $BranchCode = Auth::user()->BranchCode;
        $Typesetup = Typesetup::select('Typecode', 'TypeName')->where('BranchCode', $BranchCode)->orderBy('Typecode')->get();
        $TermsSetup = termssetup::where('BranchCode', $BranchCode)->get();
        $ShipingPortSetup = ShipingPortSetup::select('PortName', 'PortCode')->where('PortCode', '<>', '0')->Distinct()->where('BranchCode', $BranchCode)->orderBy('PortName')->get();

        $GodownSetup = GodownSetup::select('GodownName', 'GodownCode')->Distinct()->where('GodownCode', '>', 0)->where('BranchCode', $BranchCode)->orderBy('GodownCode')->get();
        $OriginSetup = DB::table('originsetup')->select('OriginCode', 'OriginName')->where('BranchCode', $BranchCode)->orderBy('OriginCode')->get();







        return view('Setups.Origin_Setup', [
            'TermsSetup' => $TermsSetup,
            'Deptsetup' => $Typesetup,
            'BranchCode' => $BranchCode,
            'ShipingPortSetup' => $ShipingPortSetup,
            'GodownSetup' => $GodownSetup,
            'OriginSetup' => $OriginSetup,
        ]);
    }

    public function TermsSave(Request $request)
    {
        $BranchCode = Auth::user()->BranchCode;
        $TxtCode = $request->input('TxtCode');
        $TxtTerms = $request->input('TxtTerms');
        $TxtDays = $request->input('TxtDays');
        $Message = '';
        $Terms = termssetup::where('TermsCode', $TxtCode)->where('BranchCode', $BranchCode)->first();
        if (!$Terms) {
            $Terms = new termssetup;
        }
        $Terms->TermsCode = $TxtCode;
        $Terms->Terms = $TxtTerms;
        $Terms->Days = $TxtDays;
        $Terms->BranchCode = $BranchCode;
        $Terms->save();
        if ($Terms) {
            $Message = 'Saved';
        }
        $Terms = termssetup::where('BranchCode', $BranchCode)->get();
        return response()->json([
            'Message' => $Message,
            'Terms' => $Terms,
        ]);
    }
    public function Terms_setup()
    {

        $BranchCode = Auth::user()->BranchCode;
        $Typesetup = Typesetup::select('Typecode', 'TypeName')->where('BranchCode', $BranchCode)->orderBy('Typecode')->get();
        $TermsSetup = termssetup::where('BranchCode', $BranchCode)->get();
        $ShipingPortSetup = ShipingPortSetup::select('PortName', 'PortCode')->where('PortCode', '<>', '0')->Distinct()->where('BranchCode', $BranchCode)->orderBy('PortName')->get();
        $GodownSetup = GodownSetup::select('GodownName', 'GodownCode')->Distinct()->where('GodownCode', '>', 0)->where('BranchCode', $BranchCode)->orderBy('GodownCode')->get();







        return view('Setups.Terms_setup', [
            'TermsSetup' => $TermsSetup,
            'Deptsetup' => $Typesetup,
            'BranchCode' => $BranchCode,
            'ShipingPortSetup' => $ShipingPortSetup,
            'GodownSetup' => $GodownSetup,
        ]);
    }
    public function ShipingPortSave(Request $request)
    {
        $BranchCode = Auth::user()->BranchCode;
        $TxtCode = $request->input('TxtCode');
        $TxtPortName = $request->input('TxtPortName');
        $Message = '';
        $ShipingPortSetup = ShipingPortSetup::where('PortCode', $TxtCode)->where('BranchCode', $BranchCode)->first();
        if (!$ShipingPortSetup) {
            $ShipingPortSetup = new ShipingPortSetup;
        }
        $ShipingPortSetup->PortCode = $TxtCode;
        $ShipingPortSetup->PortName = $TxtPortName;
        $ShipingPortSetup->BranchCode = $BranchCode;
        $ShipingPortSetup->save();
        if ($ShipingPortSetup) {
            $Message = 'Saved';
        }
        $ShipingPortSetup = ShipingPortSetup::where('BranchCode', $BranchCode)->where('PortCode', '<>', '0')->orderBy('PortName')->get();

        return response()->json([
            'Message' => $Message,
            'ShipingPortSetup' => $ShipingPortSetup,
        ]);
    }
    public function ShipingPortDelete(Request $request)
    {
        $BranchCode = Auth::user()->BranchCode;
        $TxtCode = $request->input('TxtCode');
        $Message = '';

        $ShipingPortdelete = ShipingPortSetup::where('PortCode', $TxtCode)->where('BranchCode', $BranchCode)->delete();
        if ($ShipingPortdelete) {
            $Message = 'Deleted';
        }
        $ShipingPortSetup = ShipingPortSetup::where('BranchCode', $BranchCode)->where('PortCode', '<>', '0')->orderBy('PortName')->get();

        return response()->json([
            'Message' => $Message,
            'ShipingPortSetup' => $ShipingPortSetup,
        ]);
    }
    public function ShipingPortGetPort()
    {
        $BranchCode = Auth::user()->BranchCode;

        $PortCode = ShipingPortSetup::where('BranchCode', $BranchCode)->max('PortCode');
        if ($PortCode) {
            $PortCode = $PortCode + 1;
        } else {
            $PortCode = 1;
        }
        return response()->json([
            'PortCode' => $PortCode,
        ]);
    }
    public function ShipingPort_Setup()
    {

        $BranchCode = Auth::user()->BranchCode;
        $Typesetup = Typesetup::select('Typecode', 'TypeName')->where('BranchCode', $BranchCode)->orderBy('Typecode')->get();
        $ShipingPortSetup = ShipingPortSetup::where('PortCode', '<>', '0')->where('BranchCode', $BranchCode)->orderBy('PortName')->get();
        $GodownSetup = GodownSetup::select('GodownName', 'GodownCode')->Distinct()->where('GodownCode', '>', 0)->where('BranchCode', $BranchCode)->orderBy('GodownCode')->get();
        $PortCode = ShipingPortSetup::where('BranchCode', $BranchCode)->max('PortCode');
        if ($PortCode) {
            $PortCode = $PortCode + 1;
        } else {
            $PortCode = 1;
        }
        return view('Setups.ShippingPortSetup', [
            'Deptsetup' => $Typesetup,
            'BranchCode' => $BranchCode,
            'ShipingPortSetup' => $ShipingPortSetup,
            'GodownSetup' => $GodownSetup,
            'PortCode' => $PortCode,
        ]);
    }

    public function Companystore(Request $request)
    {
        $BranchCode = Auth::user()->BranchCode;

        $Company = CompanySetup::where('ID', $request->CompanyCode)->first();
        if (!$Company) {

            $Company = new CompanySetup;
        }

        $Company->CompanyName = $request->CompanyName;
        $Company->CompanyAddress = $request->CompanyAddress;
        $Company->PhoneNo = $request->PhoneNo;
        $Company->EmailAddress = $request->EmailAddress;
        $Company->FaxNo = $request->FaxNo;
        $Company->WebsiteAddress = $request->WebsiteAddress;
        $Company->BranchCode = $BranchCode;


        $Company->save();
        $Message = '';
        if($Company){
            $Message = 'Saved';
        }
        return redirect('company-setup')
        ->with('Message',$Message);
    }
    public function CompanyDelete(Request $request)
    {
        $BranchCode = Auth::user()->BranchCode;
        $CompanyCode = $request->CompanyCode;
        $Message = '';

        $CompanySetup = CompanySetup::where('ID', $CompanyCode)->where('BranchCode', $BranchCode)->first();
        if ($CompanySetup) {
            $CompanyDelete = CompanySetup::where('ID', $CompanyCode)->where('BranchCode', $BranchCode)->delete();
            if ($CompanyDelete) {
                $Message = 'Deleted';
            }
        }
        $CompanySetup = CompanySetup::where('BranchCode', $BranchCode)->get();

        return response()->json([
            'Message' => $Message,
            'CompanySetup' => $CompanySetup,
        ]);
    }
    public function company_setup()
    {
        $BranchCode = Auth::user()->BranchCode;

        $CompanySetup = CompanySetup::where('BranchCode', $BranchCode)->get();

        return view('Setups.CompanySetup', [
            'CompanySetup' => $CompanySetup,
        ]);
    }

    public function WarehouseDelete(Request $request)
    {
        $BranchCode = Auth::user()->BranchCode;
        $TxtGodownCode = $request->input('TxtGodownCode');
        $Message = '';

        $GodownDelete = GodownSetup::where('GodownCode', $TxtGodownCode)->where('BranchCode', $BranchCode)->delete();
        if ($GodownDelete) {
            $Message = 'Deleted';
        }
        $GodownSetup = DB::table('qrygodownsetup')->where('BranchCode', $BranchCode)->orderBy('GodownCode')->get();

        return response()->json([
            'Message' => $Message,
            'GodownSetup' => $GodownSetup,
        ]);
    }
    public function WarehouseSave(Request $request)
    {
        $BranchCode = Auth::user()->BranchCode;
        $TxtGodownCode = $request->input('TxtGodownCode');
        $TxtGodownName = $request->input('TxtGodownName');
        $TxtPrinter = $request->input('txt_print');
        $CmbStateName = $request->input('CmbStateName');
        $TxtPrefix = $request->input('TxtPrefix');
        $TxtStockName = $request->input('TxtStockName');
        $TxtStockCode = $request->input('TxtStockCode');
        $ChkNotShow = $request->input('ChkNotShow');
        if ($ChkNotShow == 'false') {
            $ChkNotShow = 0;
        } else {

            $ChkNotShow = 1;
        }
        $Message = '';

        $GodownSetup = GodownSetup::where('GodownCode', $TxtGodownCode)->where('BranchCode', $BranchCode)->first();
        if (!$GodownSetup) {
            $GodownSetup = new GodownSetup;
        }
        $GodownSetup->GodownCode = $TxtGodownCode;
        $GodownSetup->GodownName = $TxtGodownName;
        $GodownSetup->PrinterName = $TxtPrinter;
        $GodownSetup->StockCode = $TxtStockCode;
        $GodownSetup->StockName = $TxtStockName;
        $GodownSetup->Prefix = $TxtPrefix;
        $GodownSetup->stateCode = $CmbStateName;
        $GodownSetup->ChkNotShow = $ChkNotShow;
        $GodownSetup->BranchCode = $BranchCode;
        $GodownSetup->save();
        if ($GodownSetup) {
            $Message = 'Saved';
        }
        $GodownSetup = DB::table('qrygodownsetup')->where('BranchCode', $BranchCode)->orderBy('GodownCode')->get();


        return response()->json([
            'GodownSetup' => $GodownSetup,
            'Message' => $Message,
        ]);
    }
    public function warehouse_setup()
    {
        $BranchCode = Auth::user()->BranchCode;
        $GodownSetup = DB::table('qrygodownsetup')->where('BranchCode', $BranchCode)->orderBy('GodownCode')->get();
        $GodownCode = GodownSetup::where('BranchCode', $BranchCode)->max('GodownCode');
        if ($GodownCode) {
            $NewGodownCode = $GodownCode + 1;
        } else {
            $NewGodownCode = 1;
        }

        $StateSetup = DB::table('statesetup')
            ->select('StateName', 'StateCode')
            ->whereNull('ChkInactive')
            ->where('BranchCode', $BranchCode)
            ->orWhere('ChkInactive', 'N')
            ->orderBy('StateName')
            ->distinct()
            ->get();


        return view('Setups.warehouse_setup', [
            'NewGodownCode' => $NewGodownCode,
            'BranchCode' => $BranchCode,
            'StateSetup' => $StateSetup,
            'GodownSetup' => $GodownSetup,
        ]);
    }



    public function Quote_setup()
    {
        $crud = $this->_getGroceryCrudEnterprise();
        $crud->setTable('QuoteMaster');
        $crud->where(["BranchCode" => config('app.MBranchCode')]);
        $crud->setSubject('Quote Setup', 'Quote Setup');


        $output = $crud->render();
        $data["pagetitle"] = "Quote Setup";
        return $this->_showOutput($output, $data);
    }

    public function DepartmentDelete(Request $request)
    {
        $BranchCode = Auth::user()->BranchCode;
        $TxtCode = $request->input('TxtCode');

        $Message = '';

        $Typesetup = Typesetup::where('Typecode', $TxtCode)->where('BranchCode', $BranchCode)->first();
        if ($Typesetup) {
            $TypeDelete = Typesetup::where('Typecode', $TxtCode)->where('BranchCode', $BranchCode)->delete();
            if ($TypeDelete) {
                $Message = 'Deleted';
            }
        }
        $Typesetup = Typesetup::where('BranchCode', $BranchCode)->orderBy('Typecode')->get();

        return response()->json([
            'Message' => $Message,
            'Typesetup' => $Typesetup,
        ]);
    }
    public function DepartmentSave(Request $request)
    {
        $BranchCode = Auth::user()->BranchCode;
        $TxtCode = $request->input('TxtCode');
        $TxtTypeName = $request->input('TxtTypeName');
        $ChkIMPA = $request->input('ChkIMPA');
        $ChkDeckEngin = $request->input('ChkDeckEngin');
        $ChkKGS = $request->input('ChkKGS');
        $ChkProvBond = $request->input('ChkProvBond');
        if ($ChkIMPA == 'false') {
            $ChkIMPA = 0;
        } else {

            $ChkIMPA = 1;
        }
        if ($ChkDeckEngin == 'false') {
            $ChkDeckEngin = 0;
        } else {

            $ChkDeckEngin = 1;
        }
        if ($ChkKGS == 'false') {
            $ChkKGS = 0;
        } else {

            $ChkKGS = 1;
        }
        if ($ChkProvBond == 'false') {
            $ChkProvBond = 0;
        } else {

            $ChkProvBond = 1;
        }
        $Message = '';

        $Typesetup = Typesetup::where('Typecode', $TxtCode)->where('BranchCode', $BranchCode)->first();
        if (!$Typesetup) {
            $Typesetup = new Typesetup;
        }
        $Typesetup->TypeCode = $TxtCode;
        $Typesetup->TypeName = $TxtTypeName;
        $Typesetup->BranchCode = $BranchCode;
        $Typesetup->ChkIMPA = $ChkIMPA;
        $Typesetup->ChkShowKG = $ChkKGS;
        $Typesetup->ChkDeckEngin = $ChkDeckEngin;
        $Typesetup->ChkProvBond = $ChkProvBond;
        $Typesetup->save();
        if ($Typesetup) {
            $Message = 'Saved';
        }
        $Typesetup = Typesetup::where('BranchCode', $BranchCode)->orderBy('Typecode')->get();

        $Maxcode = 1;
        $code = Typesetup::where('BranchCode', $BranchCode)->max('Typecode');
        if ($code) {
            $Maxcode = $code + 1;
        }
        return response()->json([
            'Typesetup' => $Typesetup,
            'Message' => $Message,
            'Maxcode' => $Maxcode,
        ]);
    }
    public function Departmentget(Request $request)
    {
        $BranchCode = Auth::user()->BranchCode;
        $TxtCode = $request->input('TxtCode');
        $Message = "";
        $Typesetup = Typesetup::where('Typecode', $TxtCode)->where('BranchCode', $BranchCode)->first();
        if ($Typesetup) {
            $Message = "Saved";
        }

        return response()->json([
            'Typesetup' => $Typesetup,
            'Message' => $Message,
        ]);
    }
    public function department_setup()
    {
        $BranchCode = Auth::user()->BranchCode;
        $Maxcode = 1;
        $code = Typesetup::where('BranchCode', $BranchCode)->max('Typecode');
        if ($code) {
            $Maxcode = $code + 1;
        }
        $Typesetup = Typesetup::where('BranchCode', $BranchCode)->orderBy('Typecode')->get();
        // dd($Typesetup);

        return view('Setups.department_setup', [
            'Deptsetup' => $Typesetup,
            'BranchCode' => $BranchCode,
            'Maxcode' => $Maxcode,
        ]);
    }




    public function vendorsearch(Request $request)
    {
        $VenderCode = (int) $request->VenderCode;
        $Venodr = VenderSetup::where('VenderCode', $VenderCode)->first();
        if ($Venodr) {
            $status = 'success';
        } else {

            $status = 'failed';
        }
        return response()->json([
            'status' => $status,
            'Venodr' => $Venodr,
        ]);
    }

    public function vendorsave(Request $request)
    {
        $MBranchCode = config('app.MBranchCode');
        $ChkInactive = 0;
        info($request->all());
        $VenderCode = (int) $request->VenderCode;
        if ($VenderCode == null) {
            $VenderCode = VenderSetup::where('BranchCode', $MBranchCode)->max('VenderCode');
            $VenderCode = $VenderCode + 1;
        }
        $Venodr = VenderSetup::where('VenderCode', $VenderCode)->first();
        if (!$Venodr) {
            $Venodr = new VenderSetup();
            $Venodr->VenderCode = $VenderCode;
        }

        $Venodr->VenderName = $request->VenderName;
        $Venodr->PhoneNo = $request->PhoneNo;
        $Venodr->CallSign = $request->CallSign;
        $Venodr->Address = $request->Address;
        $Venodr->FaxNo = $request->FaxNo;
        $Venodr->EmailAddress = $request->EmailAddress;
        $Venodr->WebAddress = $request->WebAddress;
        $Venodr->Status = $request->Status;
        $Venodr->DepartmentCode = $request->Department;
        $Venodr->City = $request->City;
        $Venodr->Country = $request->Country;
        $Venodr->State = $request->State;
        $Venodr->Date = $request->Date;
        $Venodr->BranchCode = $MBranchCode;
        $Venodr->ChkInactive = $ChkInactive;
        $Venodr->save();
        $VendorDepartment = VendorDepartment::where('VenderCode', $VenderCode)->first();
        if (!$VendorDepartment) {
            $VendorDepartment = new VendorDepartment();
            $VendorDepartment->VenderCode = $VenderCode;
        }
        $VendorDepartment->TypeCode = $request->Department;
        $VendorDepartment->BranchCode = $MBranchCode;
        $VendorDepartment->ChkSelect = 1;
        $VendorDepartment->CommPer1 = 0;
        $VendorDepartment->DiscPer1 = 0;
        $VendorDepartment->save();


        if ($Venodr) {
            $status = 'success';
        } else {

            $status = 'failed';
        }


        return response()->json([
            'status' => $status,
            'Venodr' => $Venodr,
        ]);
    }
    public function vendor_setup()
    {

        $MBranchCode = config('app.MBranchCode');
        $lastid = VenderSetup::where('BranchCode', $MBranchCode)->max('VenderCode');
        $TypeSetup = Typesetup::where('BranchCode', $MBranchCode)->get();
        $VenderSetup = VenderSetup::where('BranchCode', $MBranchCode)->get();
        if ($lastid) {
            $VenderCode = $lastid + 1;
        } else {
            $VenderCode = 1;
        }
        return view('vendor.Venodorsetup', [
            'BranchCode' => $MBranchCode,
            'VenderCode' => $VenderCode,
            'TypeSetup' => $TypeSetup,
            'VenderSetup' => $VenderSetup,

        ]);
    }



    public function importVendorlist(Request $request)
    {

        $file = $request->file('excel_file');
        $startRow = $request->input('start_row');
        $startColumn = $request->input('start_column');
        $endRow = $request->input('end_Row');
        $VendorCodeColumn = $request->input('VendorCodeColumn');
        $VendorNameColumn = $request->input('VendorNameColumn');
        $DepartmentColumn = $request->input('DepartmentColumn');
        $StatusColumn = $request->input('StatusColumn');
        $CallSignColumn = $request->input('CallSignColumn');
        info($startRow);
        info($endRow);
        // $total = strval($startRow) + strval($endRow) -1 ;
        // info($total);

        $filePath = $file->getPathname();

        $spreadsheet = IOFactory::load($filePath);
        $sheet = $spreadsheet->getActiveSheet();

        $data = [];
        for ($row = $startRow; $row <= $endRow; $row++) {
            $rowData = [];
            $VendorCode = $sheet->getCellByColumnAndRow(
                Coordinate::columnIndexFromString($VendorCodeColumn),
                $row
            )->getValue();
            $VendorName = $sheet->getCellByColumnAndRow(
                Coordinate::columnIndexFromString($VendorNameColumn),
                $row
            )->getValue();
            $Department = $sheet->getCellByColumnAndRow(
                Coordinate::columnIndexFromString($DepartmentColumn),
                $row
            )->getValue();
            $Status = $sheet->getCellByColumnAndRow(
                Coordinate::columnIndexFromString($StatusColumn),
                $row
            )->getValue();
            $CallSign = $sheet->getCellByColumnAndRow(
                Coordinate::columnIndexFromString($CallSignColumn),
                $row
            )->getValue();

            $rowData['VendorCode'] = $VendorCode;
            $rowData['VendorName'] = $VendorName;
            $rowData['Department'] = $Department;
            $rowData['Status'] = $Status;
            $rowData['CallSign'] = $CallSign;

            $data[] = $rowData;
        }

        return response()->json($data);
    }
    public function Vendorlist_save(Request $request)
    {
        $BranchCode = Auth::user()->BranchCode;
        $TableData = $request->input('dataarray');

        for ($i = 0; $i < count($TableData); $i++) {
            info($TableData[$i]);
            $insert_update = [];
            $insert_update["VenderCode"] = $VendorCode = $TableData[$i]['VendorCode'];
            $insert_update["VenderName"] = $VendorName = $TableData[$i]['VendorName'];
            $insert_update["Status"] = $TableData[$i]['Status'];
            $insert_update["DepartmentCode"] = $TableData[$i]['Department'];
            $insert_update["CallSign"] = $TableData[$i]['CallSign'];

            $status = VenderSetup::updateOrInsert(
                ['VenderCode' => $VendorCode, 'VenderName' => $VendorName, 'BranchCode' => $BranchCode],
                $insert_update
            );
            if ($status) {
                $message = 'Saved';
            }
        }

        return response()->json([
            'message' => $message,
        ]);
    }










    public function department_setup11()
    {
        $crud = $this->_getGroceryCrudEnterprise();
        $crud->setTable('ProductTypeSetup');
        $crud->setSubject('Department Setup', 'Department Setup');
        $crud->unsetJquery();
        $crud->setSkin("bootstrap-v4");
        $crud->unsetBootstrap();

        $output = $crud->render();
        $data["pagetitle"] = "Department Setup";


        return $this->_showOutput($output, $data);
    }






    /**
     * Grocery CRUD Output
     *
     * @return \Illuminate\Http\Response|\Illuminate\View\View
     */
    private function _showOutput($output, $data = '')
    {
        if ($output->isJSONResponse) {
            return response($output->output, 200)
                ->header('Content-Type', 'application/json')
                ->header('charset', 'utf-8');
        }

        $css_files = $output->css_files;
        $js_files = $output->js_files;
        $output = $output->output;

        return view('default_template', [
            'output' => $output,
            'css_files' => $css_files,
            'js_files' => $js_files,
            'data' => $data
        ]);
    }

    private function _termsOutput($output, $data = '')
    {
        if ($output->isJSONResponse) {
            return response($output->output, 200)
                ->header('Content-Type', 'application/json')
                ->header('charset', 'utf-8');
        }

        $css_files = $output->css_files;
        $js_files = $output->js_files;
        $output = $output->output;
        $term = termssetup::get();

        return view('terms_view', [
            'output' => $output,
            'css_files' => $css_files,
            'js_files' => $js_files,
            'data' => $data,
            'term' => $term,
        ]);
    }

    private function _branchoutput($output, $data = '')
    {
        if ($output->isJSONResponse) {
            return response($output->output, 200)
                ->header('Content-Type', 'application/json')
                ->header('charset', 'utf-8');
        }

        $css_files = $output->css_files;
        $js_files = $output->js_files;
        $output = $output->output;

        return view('branch_view', [
            'output' => $output,
            'css_files' => $css_files,
            'js_files' => $js_files,
            'data' => $data
        ]);
    }


    /**
     * Get database credentials as a Zend Db Adapter configuration
     * @return array[]
     */
    private function _getDatabaseConnection()
    {

        return [
            'adapter' => [
                'driver' => 'Pdo',
                'dsn' => 'sqlsrv:server = tcp:' . env('DB_HOST') . ',1433; Database = ' . env('DB_DATABASE'),
                'database' => env('DB_DATABASE'),
                'username' => env('DB_USERNAME'),
                'password' => env('DB_PASSWORD'),
                //'charset' => 'utf8'
            ]
        ];
    }






    public function update(Request $request)
    {
        // Update the title
        $title = $request->input('title');
        Config::set('adminlte.title', $title);
        $configPath = base_path('config/adminlte.php');
        $configData = file_get_contents($configPath);
        $newConfigData = str_replace("'title' => '" . config('adminlte.title') . "'", "'title' => '" . $title . "'", $configData);
        file_put_contents($configPath, $newConfigData);

        // Update the logo
        $slogo = $request->file('slogo');
        if ($slogo) {
            // Check if the file is a PNG
            if ($slogo->getClientOriginalExtension() !== 'png') {
                return Response::json(['success' => false, 'message' => 'Only PNG files are allowed!']);
            }

            // Delete the existing logo
            $existingLogo = Config::get('adminlte.logo');
            if ($existingLogo) {
                $existingLogoPath = str_replace(Storage::url(''), '', $existingLogo);
                Storage::delete($existingLogoPath);
            }

            // Store the new logo with the name 'slogo.png'
            $slogoPath = $slogo->storeAs('public/assets/images', 'slogo.png');
            $slogoUrl = Storage::url($slogoPath);
            Config::set('adminlte.logo', $slogoUrl);
            $newConfigData = str_replace("'logo' => '" . config('adminlte.logo') . "'", "'logo' => '" . $slogoUrl . "'", $newConfigData);
            file_put_contents($configPath, $newConfigData);
        }
        $newtitle = config('adminlte.title');
        return Response::json(['success' => true, 'message' => 'Settings updated successfully', 'newtitle' => $newtitle]);
    }
    public function FixAccountSetup()
    {
        $MBranchCode = config('app.MBranchCode');


        return view('Setups.FixAccountSetup', [
            "BranchCode" => $MBranchCode,
        ]);
    }
    public function FixAccountSetupGet()
    {
        $MBranchCode = config('app.MBranchCode');

        $FixAccountSetup = FixAccountSetup::where('BranchCode', $MBranchCode)->first();
        // $FixAccountSetup = FixAccountSetup::first();
        $TxtCashAccountTitle = '';
        $TxtPurchaseAccountTitle = '';
        $TxtSaleAccountTitle = '';
        $TxtPurchaseRetAccountTitle = '';
        $TxtSalesRetAccountTitle = '';
        $TxtAccountTitleCap = '';
        $TxtStockVendorName = '';
        if ($FixAccountSetup) {
            if ($FixAccountSetup->ActCashCode) {

                $ActCode = AcFile::select('AcName3')->where('ActCode', $FixAccountSetup->ActCashCode)->where('BranchCode', $MBranchCode)->first();
                // $ActCode = AcFile::select('AcName3')->where('ActCode', $FixAccountSetup->ActCashCode)->first();
                if ($ActCode) {
                    $TxtCashAccountTitle = $ActCode->AcName3;
                }
            }
            if ($FixAccountSetup->ActPurchaseCode) {

                $ActCode = AcFile::select('AcName3')->where('ActCode', $FixAccountSetup->ActPurchaseCode)->where('BranchCode', $MBranchCode)->first();
                // $ActCode = AcFile::select('AcName3')->where('ActCode', $FixAccountSetup->ActPurchaseCode)->first();
                if ($ActCode) {
                    $TxtPurchaseAccountTitle = $ActCode->AcName3;
                }
            }
            if ($FixAccountSetup->ActSalesCode) {

                $ActCode = AcFile::select('AcName3')->where('ActCode', $FixAccountSetup->ActSalesCode)->where('BranchCode', $MBranchCode)->first();
                // $ActCode = AcFile::select('AcName3')->where('ActCode', $FixAccountSetup->ActSalesCode)->first();
                if ($ActCode) {
                    $TxtSaleAccountTitle = $ActCode->AcName3;
                }
            }
            if ($FixAccountSetup->ActPurRetCode) {


                $ActCode = AcFile::select('AcName3')->where('ActCode', $FixAccountSetup->ActPurRetCode)->where('BranchCode', $MBranchCode)->first();
                // $ActCode = AcFile::select('AcName3')->where('ActCode', $FixAccountSetup->ActPurRetCode)->first();
                if ($ActCode) {
                    $TxtPurchaseRetAccountTitle = $ActCode->AcName3;
                }
            }
            if ($FixAccountSetup->ActSalesRetCode) {
                // info($FixAccountSetup->ActSalesRetCode);
                $ActCode = AcFile::select('AcName3')->where('ActCode', $FixAccountSetup->ActSalesRetCode)->where('BranchCode', $MBranchCode)->first();
                // $ActCode = AcFile::select('AcName3')->where('ActCode', $FixAccountSetup->ActSalesRetCode)->first();
                if ($ActCode) {

                    $TxtSalesRetAccountTitle = $ActCode->AcName3;
                }
            }
            if ($FixAccountSetup->MCapCode) {

                $ActCode = AcFile::select('AcName3')->where('ActCode', $FixAccountSetup->MCapCode)->where('BranchCode', $MBranchCode)->first();
                // $ActCode = AcFile::select('AcName3')->where('ActCode', $FixAccountSetup->MCapCode)->first();
                if ($ActCode) {
                    $TxtAccountTitleCap = $ActCode->AcName3;
                }
                // info($ActCode);

            }
            if ($FixAccountSetup->StockVendorCode) {
                // info($FixAccountSetup->StockVendorCode);

                $ActCode = VenderSetup::select('VenderName')->where('VenderCode', $FixAccountSetup->StockVendorCode)->where('BranchCode', $MBranchCode)->first();
                // $ActCode = VenderSetup::select('VenderName')->where('VenderCode', $FixAccountSetup->StockVendorCode)->first();
                if ($ActCode) {
                    $TxtStockVendorName = $ActCode->VenderName;
                }
            }
        }

        return response()->json([
            'FixAccountSetup' => $FixAccountSetup,
            'TxtCashAccountTitle' => $TxtCashAccountTitle,
            'TxtPurchaseAccountTitle' => $TxtPurchaseAccountTitle,
            'TxtSaleAccountTitle' => $TxtSaleAccountTitle,
            'TxtPurchaseRetAccountTitle' => $TxtPurchaseRetAccountTitle,
            'TxtSalesRetAccountTitle' => $TxtSalesRetAccountTitle,
            'TxtAccountTitleCap' => $TxtAccountTitleCap,
            'TxtStockVendorName' => $TxtStockVendorName,
        ]);
    }
    public function FixAccountSetupupdate(Request $request)
    {
        $MBranchCode = config('app.MBranchCode');
        $Message = 'Started';

        $FixAccountSetup = FixAccountSetup::where('BranchCode', $MBranchCode)->first();
        // $FixAccountSetup = FixAccountSetup::first();
        if (!$FixAccountSetup) {
            $FixAccountSetup = new FixAccountSetup;
        }
        $FixAccountSetup->ActCashCode = $request->input('TxtCashInHandACCode');
        $FixAccountSetup->ActSalesCode = $request->input('TxtSalesACCode');

        $FixAccountSetup->ActPurchaseCode = $request->input('TxtpurchaseACCode');

        $FixAccountSetup->ActPurRetCode = $request->input('TxtPurchaseReACCode');

        $FixAccountSetup->ActSalesRetCode = $request->input('TxtSalesRetACCode');
        $FixAccountSetup->MCapCode = $request->input('TxtCapitalAccountCode');
        $FixAccountSetup->ActCreditCardCode = $request->input('TxtSalaryCode');
        $FixAccountSetup->ActOrderCode = $request->input('TxtOrderCode');
        $FixAccountSetup->LCode = $request->input('TxtLCode');
        $FixAccountSetup->BranchCode = $MBranchCode;
        $FixAccountSetup->StockVendorCode = $request->input('TxtStockVendorCode');
        $FixAccountSetup->StockVendorname = $request->input('TxtStockVendorName');

        $FixAccountSetup->UnEarnCommCode = $request->input('TxtUnearnCommCode');
        $FixAccountSetup->UnEarnCommName = $request->input('TxtUnearnCommName');

        $FixAccountSetup->SalaryCode = $request->input('TxtSalaryCode');
        $FixAccountSetup->SalaryName = $request->input('TxtSalaryName');

        $FixAccountSetup->GstCode = $request->input('TxtGstCode');
        $FixAccountSetup->GstName = $request->input('TxtGstName');


        $FixAccountSetup->GstIncomeCode = $request->input('TxtGSTIncomeCode');
        $FixAccountSetup->GstIncomeName = $request->input('TxtGSTIncomeName');


        $FixAccountSetup->MissingActCode = $request->input('TxtMissingActCode');
        $FixAccountSetup->MissingActName = $request->input('TxtMissingActName');

        $FixAccountSetup->PurStockCode = $request->input('TxtPurStockCode');
        $FixAccountSetup->PurStockName = $request->input('TxtPurStockName');

        $FixAccountSetup->CrNoteCode = $request->input('TxtCrNoteCode');
        $FixAccountSetup->CrNoteName = $request->input('TxtCrNoteName');

        $FixAccountSetup->CommExpCode = $request->input('TxtCommExpCode');
        $FixAccountSetup->CommExpName = $request->input('TxtCommExpName');

        $FixAccountSetup->StockAdjustCode = $request->input('TxtStockAdjustCode');
        $FixAccountSetup->StockAdjustName = $request->input('TxtStockAdjustName');

        $FixAccountSetup->COGSCode = $request->input('Txtcogscode');
        $FixAccountSetup->COGSName = $request->input('TxtCOGSName');

        $FixAccountSetup->AVIExpCode = $request->input('TxtAVIExpCode');
        $FixAccountSetup->AVIExpName = $request->input('TxtAVIExpName');

        $FixAccountSetup->AVIPayableCode = $request->input('TxtAVIPayableCode');
        $FixAccountSetup->AVIPayableName = $request->input('TxtAVIPayableName');

        $FixAccountSetup->BankChargesActCode = $request->input('TxtBankChargesActCode');
        $FixAccountSetup->BankChargesActName = $request->input('TxtBankChargesActName');

        $FixAccountSetup->BacklogDate = $request->input('TxtBackLogDate');
        $FixAccountSetup->BacklogStockDate = $request->input('TxtBackLogStockDate');



        $FixAccountSetup->CompanyTAxActCode = $request->input('TxtCompanyTAxCode');
        $FixAccountSetup->CompanyTaxActName = $request->input('txtCompanyTaxBName');

        $FixAccountSetup->EmpTAxActCode = $request->input('TxtEmpTaxCode');
        $FixAccountSetup->EmpTAxActName = $request->input('TxtEmpTAxNAm');

        $FixAccountSetup->DeductionActCode = $request->input('TxtDeduction');
        $FixAccountSetup->DeductionActName = $request->input('TxtDedName');


        $FixAccountSetup->CTaxActCodeExp = $request->input('TXtGorssCode');
        $FixAccountSetup->CTaxActNameExp = $request->input('TxtGrossNAme');

        $FixAccountSetup->MileageCode = $request->input('TxtMileageCode');
        $FixAccountSetup->MileageName = $request->input('TxtMileageName');

        $FixAccountSetup->HealthInsCode = $request->input('TxtHealthInsCode');


        $FixAccountSetup->IncomeAndRevenueActCode = $request->input('TxtIncomeAndRevenueActCode');
        $FixAccountSetup->IncomeAndRevenueActName = $request->input('TxtIncomeAndRevenueActName');


        $FixAccountSetup->RetainedEarningActCode = $request->input('txtRetainedEaringActCode');
        $FixAccountSetup->RetainedEarningActname = $request->input('txtRetainedEaringActName');

        $FixAccountSetup->TripChargesCode = $request->input('TxtTripChargesCode');

        $FixAccountSetup->PORecDirectSupplyCode = $request->input('TxtPORecDirectSupplyCode');
        $FixAccountSetup->DateDirectSupply = $request->input('TxtDateDirectSupply');

        $FixAccountSetup->PullStockForSaleActCode = $request->input('TxtPullStockForSaleCode');
        $FixAccountSetup->PullStockForSaleActName = $request->input('TxtPullStockForSaleName');
        $FixAccountSetup->save();
        if ($FixAccountSetup) {
            $Message = 'Saved';
        }
        return response()->json([
            'Message' => $Message,
        ]);
    }




    public function State_Setup()
    {
        $MBranchCode = config('app.MBranchCode');
        $state = DB::table('statesetup')->select('StateCode', 'StateName', 'ChkInactive')->where('BranchCode', $MBranchCode)->get();
        return view('Setups.State_Setup', [
            'state' => $state,
        ]);
    }


    public function Status_Setup()
    {
        $MBranchCode = config('app.MBranchCode');
        $status = DB::table('statussetup')->where('BranchCode', $MBranchCode)->orderBy('StatusCode')->get();
        return view('Setups.Status_Setup', [
            'status' => $status,

        ]);
    }

    public function Priority_Setup()
    {
        $MBranchCode = config('app.MBranchCode');

        $priority = DB::table('prioritysetup')->where('BranchCode', $MBranchCode)->orderBy('PriorityCode')->get();
        return view('Setups.Priority_Setup', [
            'priority' => $priority,

        ]);
    }

    public function Log_Setup()
    {
        $MBranchCode = config('app.MBranchCode');

        $log = DB::table('logremarks')->where('BranchCode', $MBranchCode)->orderBy('Code')->get();

        return view('Setups.Log_Setup', [

            'log' => $log,
        ]);
    }

    public function Uomdelete(Request $request)
    {
        $Message = '';
        $MBranchCode = config('app.MBranchCode');
        $TxtCode = $request->input('TxtCode');
        $UOMsetup = UOMModel::find($TxtCode);
        if ($UOMsetup) {
            $UOMdelete = UOMModel::where('UOMCode', $TxtCode)->delete();
        }
        if ($UOMdelete) {
            $Message = 'Deleted';
        }


        $UOMsetups = UOMModel::where('BranchCode', $MBranchCode)->get();

        return response()->json([
            'Message' => $Message,
            'UOMsetups' => $UOMsetups,
        ]);
    }
    public function UomSave(Request $request)
    {
        $MBranchCode = config('app.MBranchCode');

        $TxtCode = $request->input('TxtCode');
        $TxtStateName = $request->input('TxtStateName');
        $ChkInactive = $request->input('ChkInactive');

        if ($ChkInactive == 'true') {
            $ChkInactive = 1;
        } else {
            $ChkInactive = 0;
        }

        $UOMsetup = UOMModel::find($TxtCode);
        if (!$UOMsetup) {
            $UOMsetup = new UOMModel;
        }
        $UOMsetup->UOMName = $TxtStateName;
        $UOMsetup->ChkInactive = $ChkInactive;
        $UOMsetup->BranchCode = $MBranchCode;
        $UOMsetup->save();
        $Message = '';
        if ($UOMsetup) {
            $Message = 'Saved';
        }
        $UOMsetups = UOMModel::where('BranchCode', $MBranchCode)->get();

        return response()->json([
            'Message' => $Message,
            'UOMsetups' => $UOMsetups,
        ]);
    }
    public function UOM_Setup()
    {
        $MBranchCode = config('app.MBranchCode');
        $UOM = UOMModel::where('BranchCode', $MBranchCode)->get();
        return view('Setups.UOM_Setup', [
            'UOM' => $UOM,
        ]);
    }

    public function Shipserv_Setup()
    {

        $MBranchCode = config('app.MBranchCode');
        $result = DB::table('shipservsetup')
            ->where('BranchCode', $MBranchCode)
            ->orderBy('ShipServCode')
            ->select('ShipServCode', 'TradeID', 'TradeName', 'GrantType', 'username', 'Password', 'ClientId', 'ClientSecret')
            ->get();

        return view('Setups.Shipserv_Setup', [
            'Shiptable' => $result,
        ]);
    }

    public function Shipvia_Setup()
    {
        $MBranchCode = config('app.MBranchCode');
        $shipvia = DB::table('shipvia')->where('BranchCode', $MBranchCode)->orderBy('ShipVIACode')->get();

        return view('Setups.Shipvia_Setup', [
            'shipvia' => $shipvia,
        ]);
    }


    public function CategoryDelete(Request $request)
    {
        $Message = '';
        $MBranchCode = config('app.MBranchCode');
        $TxtCode = $request->input('TxtCode');
        $Category = CategoryModel::find($TxtCode);

        if ($Category) {
            $Categoryde = CategoryModel::where('CategoryCode', $TxtCode)->delete();
        }
        if ($Categoryde) {
            $Message = 'Deleted';
        }


        $categorysetup = CategoryModel::where('BranchCode', $MBranchCode)->get();

        return response()->json([
            'Message' => $Message,
            'categorysetup' => $categorysetup,
        ]);
    }
    public function CategorySave(Request $request)
    {
        $MBranchCode = config('app.MBranchCode');


        $TxtCode = $request->input('TxtCode');
        $TxtCategoryName = $request->input('TxtCategoryName');
        $category = CategoryModel::find($TxtCode);
        if (!$category) {

            $category = new CategoryModel;
        }
        $category->CategoryName = $TxtCategoryName;
        $category->BranchCode = $MBranchCode;
        $category->save();

        $Message = '';
        if ($category) {
            $Message = 'Saved';
        }

        $categorysetup = CategoryModel::where('BranchCode', $MBranchCode)->get();


        return response()->json([
            'categorysetup' => $categorysetup,
            'Message' => $Message,
        ]);
    }
    public function Category_Setup()
    {
        $MBranchCode = config('app.MBranchCode');
        $category = CategoryModel::where('BranchCode', $MBranchCode)->orderBy('CategoryCode')->get();

        return view('Setups.Category_Setup', [
            'category' => $category,
        ]);
    }


    public function currencyDelete(Request $request)
    {
        $MBranchCode = config('app.MBranchCode');
        $ID = $request->input('ID');
        $currency = CurrencyModel::find($ID);
        $Message = '';
        if ($currency) {
            $currency = CurrencyModel::where('id', $ID)->delete();

            if ($currency) {
                $Message = 'Deleted';
            }
        }

        $currencyysetup = CurrencyModel::where('BranchCode', $MBranchCode)->get();


        return response()->json([
            'currencyysetup' => $currencyysetup,
            'Message' => $Message,
        ]);
    }

    public function CurrencySave(Request $request)
    {
        $MBranchCode = config('app.MBranchCode');
        $ID = $request->input('ID');
        $TxtSerialNo = $request->input('TxtSerialNo');
        $TxtCurrency = $request->input('TxtCurrency');
        $TxtExchangeRate = $request->input('TxtExchangeRate');
        $currency = CurrencyModel::find($ID);
        if (!$currency) {
            $currency = new CurrencyModel;
        }
        $currency->SerialNo = $TxtSerialNo;
        $currency->Currency = $TxtCurrency;
        $currency->ExchangeRate = $TxtExchangeRate;
        $currency->BranchCode = $MBranchCode;
        $currency->save();
        $Message = '';
        if ($currency) {
            $Message = 'Saved';
        }

        $currencyysetup = CurrencyModel::where('BranchCode', $MBranchCode)->get();


        return response()->json([
            'currencyysetup' => $currencyysetup,
            'Message' => $Message,
        ]);
    }
    public function Currency_Setup()
    {


        return view('Setups.Currency_Setup', []);
    }

    public function Currencydataget()
    {
        $MBranchCode = config('app.MBranchCode');
        $currency = CurrencyModel::where('BranchCode', $MBranchCode)->orderBy('SerialNo')->get();

        return response()->json([
            'currency' => $currency,

        ]);
    }
}
