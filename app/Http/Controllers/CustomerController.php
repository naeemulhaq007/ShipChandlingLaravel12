<?php

namespace App\Http\Controllers;

use Session;
use Response;
use App\Models\AcFile;
use App\Models\Country;
use App\Models\Customer;
use App\Models\Typesetup;
use App\Models\termssetup;
use Illuminate\Http\Request;
use App\Models\CustomerContacts;
use App\Models\CustomerDiscount;
use App\Http\Requests\CustomerRequest;
use GroceryCrud\Core\GroceryCrud;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;




class CustomerController extends Controller
{


    public function customercodecheck(Request $request)
    {
        $BranchCode = Auth::user()->BranchCode;

        $Code = $request->input('code');
        $customers = Customer::where('CustomerCode', $Code)->where('BranchCode', $BranchCode)->first();
        return response()->json([
            'customers' => $customers,
        ]);
    }
    public function customernamecheck(Request $request)
    {

        $term = $request->input('term');
        $customers = Customer::where('CustomerName', 'like', "%$term%")->get();
        return response()->json($customers);
    }
    public function customer_setup()
    {
        $BranchCode = Auth::user()->BranchCode;

    $CustomerSetup = Customer::where('BranchCode', $BranchCode)->get();

        $TermsSetup = termssetup::distinct()->get();
        $TypeSetup = Typesetup::distinct()->get();
         $contacts = CustomerContacts::all();

        $custset = Customer::select('CustomerName', 'Country', 'AreaCode', 'AreaofBusiness', 'StateName', 'City', 'ActCode')->distinct()->get();
        $AOB = Customer::select('AreaofBusiness')->distinct()->WHERE('AreaofBusiness', '<>', '')->orderBy('AreaofBusiness')->get();
        $Country = Customer::select('Country')->distinct()->WHERE('Country', '<>', '')->orderBy('Country')->get();
        $StateName = Customer::select('StateName')->distinct()->WHERE('StateName', '<>', '')->orderBy('StateName')->get();
        $City = Customer::select('City')->distinct()->WHERE('City', '<>', '')->orderBy('City')->get();
        $SalesMan = DB::table('salesmansetup')->select('SManName', 'SManCode', 'ActCode')->distinct()->WHERE('SManName', '<>', '', 'OR', 'SManCode', '<>', '', 'OR', 'ActCode', '<>', '')->orderBy('SManName')->get();
        $lastid = Customer::where('BranchCode', $BranchCode)->max('CustomerCode');
        $idcontact = CustomerContacts::max('ID');
        if (!$lastid) {
            $lastid = 0;
        } else {
            $lastid = $lastid + 1;
        }
        $lastidcontact = $idcontact + 1;


        return view('Setups.customer_view', [
            'lastid' => $lastid,
            'custset' => $custset,
            'TypeSetup' => $TypeSetup,
            'TermsSetup' => $TermsSetup,
            'AOB' => $AOB,
            'Country' => $Country,
            'City' => $City,
            'StateName' => $StateName,
            'SalesMan' => $SalesMan,
            'lastidcontact' => $lastidcontact,
 'contacts' => $contacts,
  'CustomerSetup' => $CustomerSetup,

        ]);
    }


    public function importCustomerlist(Request $request)
    {

        $file = $request->file('excel_file');
        $startRow = $request->input('start_row');
        $startColumn = $request->input('start_column');
        $endRow = $request->input('end_Row');
        $CustomerCodeColumn = $request->input('CustomerCodeColumn');
        $CustomerNameColumn = $request->input('CustomerNameColumn');
        $CtypeColumn = $request->input('CtypeColumn');
        $VtypeColumn = $request->input('VtypeColumn');
        $CategoryColumn = $request->input('CategoryColumn');
        info($startRow);
        info($endRow);

        $filePath = $file->getPathname();

        $spreadsheet = IOFactory::load($filePath);
        $sheet = $spreadsheet->getActiveSheet();

        $data = [];
        for ($row = max(2, $startRow); $row <= $endRow; $row++) {

            $rowData = [];
            $CustomerCode = $sheet->getCellByColumnAndRow(
                Coordinate::columnIndexFromString($CustomerCodeColumn),
                $row
            )->getValue();

            if (!is_numeric($CustomerCode)) {
                continue;
            }
            $CustomerName = $sheet->getCellByColumnAndRow(
                Coordinate::columnIndexFromString($CustomerNameColumn),
                $row
            )->getValue();
            $Ctype = $sheet->getCellByColumnAndRow(
                Coordinate::columnIndexFromString($CtypeColumn),
                $row
            )->getValue();
            $Vtype = $sheet->getCellByColumnAndRow(
                Coordinate::columnIndexFromString($VtypeColumn),
                $row
            )->getValue();
            $Category = $sheet->getCellByColumnAndRow(
                Coordinate::columnIndexFromString($CategoryColumn),
                $row
            )->getValue();

            $rowData['CustomerCode'] = $CustomerCode;
            $rowData['CustomerName'] = $CustomerName;
            $rowData['Ctype'] = $Ctype;
            $rowData['Vtype'] = $Vtype;
            $rowData['Category'] = $Category;

            $data[] = $rowData;
        }

        return response()->json($data);
    }
    public function Customerlist_save(Request $request)
    {
        $BranchCode = Auth::user()->BranchCode;
        $TableData = $request->input('dataarray');

        for ($i = 0; $i < count($TableData); $i++) {
            $insert_update = [];

            $CustomerCode = $TableData[$i]['CustomerCode'];


            if (!is_numeric($CustomerCode)) {
                continue;
            }


            if ($CustomerCode == "" || !$CustomerCode) {
                $lastid = Customer::where('BranchCode', $BranchCode)->max('CustomerCode');
                $CustomerCode = $lastid + 1;
            }

            $CustomerName = $TableData[$i]['CustomerName'];
            $insert_update["CustomerCode"] = $CustomerCode;
            $insert_update["CustomerName"] = $CustomerName;
            $insert_update["CType"] = $TableData[$i]['Ctype'];
            $insert_update["VType"] = $TableData[$i]['Vtype'];
            $insert_update["CustCategory"] = $TableData[$i]['Category'];
            $insert_update["BranchCode"] = $BranchCode;
            $insert_update["Status"] = 'Active';
            $insert_update["ChkInactive"] = 0;

            $status = DB::table('customersetup')
                ->updateOrInsert(
                    ['CustomerCode' => $CustomerCode, 'CustomerName' => $CustomerName, 'BranchCode' => $BranchCode],
                    $insert_update
                );

            $MActCode = '1.3.' . $CustomerCode;

            $AcFile = AcFile::where('ActCode', $MActCode)->where('BranchCode', $BranchCode)->first();
            if (!$AcFile) {
                $AcFile = new AcFile;
                $AcFile->ActCode = $MActCode;
            }

            $AcFile->AcName3 = $CustomerName;
            $AcFile->BranchCode = $BranchCode;
            $AcFile->AcCode1 = 1;
            $AcFile->AcCode2 = 3;
            $AcFile->AcCode3 = $CustomerCode;
            $AcFile->ACode1 = 1;
            $AcFile->ACode2 = 3;
            $AcFile->ACode3 = $CustomerCode;
            $AcFile->ACode4 = 0;
            $AcFile->ACode5 = 0;
            $AcFile->ACode6 = 0;
            $AcFile->ACode7 = 0;
            $AcFile->ACode8 = 0;
            $AcFile->ACode9 = 0;
            $AcFile->ACode10 = 0;
            $AcFile->AcLevel = 3;
            $AcFile->TitleLevel1 = 'ASSETS';
            $AcFile->TitleLevel2 = 'ACCOUNT RECEIVABLE';
            $AcFile->ChkCustomer = true;
            $AcFile->ChkExpence = false;
            $AcFile->ChkRecAC = false;
            $AcFile->ChkLabour = false;
            $AcFile->ChkInactive = false;
            $AcFile->OptType = 'B';
            $AcFile->ChkSupplier = false;
            $AcFile->save();
        }

        $message = 'NO';
        if ($status) {
            $message = 'Saved';
        }

        return response()->json([
            'message' => $message,
        ]);
    }


// public function customer_contacts_view()
// {
//     $contacts = CustomerContacts::all();

//     return view('Setups.customer_contacts_view', compact('contacts'));
// }



    public function SaveCustomer(Request $request)
    {
        // dd($request->all());
        $rCustomerCode = $request->CustomerCode;
        $customerCheck = Customer::where('CustomerCode', $rCustomerCode)->first();

        if (!$customerCheck) {

            $validator = Validator::make($request->all(), [
                'CustomerCode' => 'required|unique:customersetup',
                'customername' => 'required',
                'Terms' => 'required',
            ]);

            if ($validator->fails()) {
                // Handle the validation failure as needed
                return response()->json([
                    'message' => 'Error',
                    'Message' => $validator,
                ]);
            }

            // Continue with the rest of your logic for storing/updating the record
        }else{
            $validator = Validator::make($request->all(), [
                'CustomerCode' => 'required',
                'customername' => 'required',
                'Terms' => 'required',
            ]);
        }
        $rCustomerName = $request->customername;
        $BranchCode = Auth::user()->BranchCode;

        $status = ($request->ChkInactive == 0) ? 'Active' : 'Inactive';

        $customerData = [
            'CustomerCode'        => $rCustomerCode,
            'CustomerName'        => $rCustomerName,
            'Address'             => $request->Address,
            'CallSign'            => $request->CallSign ?? null,
            'PhoneNo'             => $request->PhoneNo ?? $request->ContactPerson,
            'FaxNo'               => $request->FaxNo,
            'EmailAddress'        => $request->EmailAddress,
            'WebAddress'          => $request->WEB,
            'BContactPerson'      => $request->BContactPerson,
            'BillingAddress'      => $request->BillingAddress,
            'BTelephoneNo'        => $request->BTelephoneNo,
            'BFaxNo'              => $request->BFaxNo,
            'BEmailAddress'       => $request->BEmailAddress,
            'BWeb'                => $request->BWeb,
            'Status'              => $status,
            'ChkInactive'         => $request->ChkInactive,
            'CreditLimit'         => $request->CreditLimit,
            'Country'             => $request->Country,
            'BranchCode'          => $BranchCode,
            'CusCode'             => $request->CusCode,
            'Terms'               => $request->Terms,
            'EventQuateCharges'   => $request->EventQuateCharges,
            'City'                => $request->City,
            'ActCode'             => $request->ActCode,
            'CustomerDiscPer'     => $request->CustomerDiscPer,
            'InvoiceDiscPer'      => $request->InvoiceDiscPer,
            'SalesManCommPer'     => $request->SalesManCommPer,
            'RebaitPer'           => $request->RebaitPer,
            'CreditNotePer'       => $request->CreditNotePer,
            'AgentCommPer'        => $request->AgentCommPer,
            'BankDetail'          => $request->BankDetail,
            'Priority'            => $request->Priority,
            'EnterCustomer'       => "IMPORT",
            'CType'               => $request->c_type,
            'Vtype'               => $request->v_type,
            'CustCategory'        => $request->CustCategory,
            'AreaofBusiness'      => $request->AreaofBusiness,
            'AreaCode'            => $request->AreaCode,
            'ContactPerson'       => $request->ContactPerson,
            'StateName'           => $request->StateName,
            'CashDiscPer'         => $request->CashDiscPer,
            'MobileNo'            => $request->MobileNo,
            'SManCode'            => $request->SManCodedata,
            'SManActCode'         => $request->SManActCode ?? null,
            'WorkUser'            => Auth::user()->name,
            'AgentCode'           => $request->AgentCode ?? null,
            'AgentActCode'        => $request->AgentActCode ?? null,
            'AssignUser'          => $request->AssignUser ?? null,
            'LastEditDateTime'    => now(),
        ];

        $customer = Customer::firstOrNew([
            'CustomerCode' => $rCustomerCode,
            'BranchCode'   => $BranchCode,
        ]);
        $customer->fill($customerData);
        $customer->save();

        // $cd = [
        //     "CustomerCode" => $rCustomerCode,
        //     "DepartmentCode" => $request->cdDepartmentCode,
        //     "DepartmentName" => $request->cdDepartmentName,
        //     "InvDiscPer" => $request->cdInvDiscPer,
        //     "CrNotePer" => $request->cdCrNotePer,
        //     "AVIRebatePer" => $request->cdAVIRebatePer,
        //     "AgentCommPer" => $request->cdAgentCommPer,
        //     "SlsCommPer" => $request->cdSlsCommPer,
        // ];

        // Handle CustomerDiscounts for the customer
        $departmentCodes = (array) $request->cdDepartmentCode;
        $departmentNames = (array) $request->cdDepartmentName;
        $invDiscPers = (array) $request->cdInvDiscPer;
        $crNotePers = (array) $request->cdCrNotePer;
        $aviRebatePers = (array) $request->cdAVIRebatePer;
        $agentCommPers = (array) $request->cdAgentCommPer;
        $slsCommPers = (array) $request->cdSlsCommPer;

        foreach ($departmentCodes as $i => $deptCode) {
            if (empty($deptCode)) {
            continue;
            }

            CustomerDiscount::updateOrCreate(
            [
                'CustomerCode' => $rCustomerCode,
                'DepartmentCode' => $deptCode,
                'BranchCode' => $BranchCode,
            ],
            [
                'DepartmentName' => $departmentNames[$i] ?? null,
                'CrNotePer' => $crNotePers[$i] ?? 0,
                'InvDiscPer' => $invDiscPers[$i] ?? 0,
                'AVIRebatePer' => $aviRebatePers[$i] ?? 0,
                'AgentCommPer' => $agentCommPers[$i] ?? 0,
                'SlsCommPer' => $slsCommPers[$i] ?? 0,
            ]
            );
        }

        $MActCode = '1.3.' . $rCustomerCode;

        $AcFile = AcFile::where('ActCode', $MActCode)->where('BranchCode', $BranchCode)->first();
        $AcFileid = AcFile::where('BranchCode', $BranchCode)->max('ID');
        $AcFileid = $AcFileid + 1;
        if (!$AcFile) {
            $AcFile = new AcFile;
            $AcFile->ActCode = $MActCode;
            $AcFile->ID = $AcFileid;
        }
        $AcFile->AcName3 = $rCustomerName;
        $AcFile->BranchCode = $BranchCode;
        $AcFile->AcCode1 = 1;
        $AcFile->AcCode2 = 3;
        $AcFile->AcCode3 = $rCustomerCode;
        $AcFile->ACode1 = 1;
        $AcFile->ACode2 = 3;
        $AcFile->ACode3 = $rCustomerCode;
        $AcFile->ACode4 = 0;
        $AcFile->ACode5 = 0;
        $AcFile->ACode6 = 0;
        $AcFile->ACode7 = 0;
        $AcFile->ACode8 = 0;
        $AcFile->ACode9 = 0;
        $AcFile->ACode10 = 0;
        $AcFile->AcLevel = 3;
        $AcFile->TitleLevel1 = 'ASSETS';
        $AcFile->TitleLevel2 = 'ACCOUNT RECEIVABLE';
        $AcFile->ChkCustomer = true;
        $AcFile->ChkExpence = false;
        $AcFile->ChkRecAC = false;
        $AcFile->ChkLabour = false;
        $AcFile->ChkInactive = $request->ChkInactive;
        $AcFile->OptType = 'B';
        $AcFile->ChkSupplier = false;
        $AcFile->save();


        $message = is_null($customerCheck) ? 'Created' : 'Updated';

        return response()->json([
            'message' => $message,
            'CustomerCode' => $rCustomerCode,
            'CustomerName' => $rCustomerName,
        ]);
    }


public function DeleteCustomer(Request $request)
{
    $CustomerCode = $request->input('CustomerCode');
    $BranchCode = Auth::user()->BranchCode;

    $customerCheck = Customer::where('CustomerCode', $CustomerCode)
        ->where('BranchCode', $BranchCode)
        ->first();

    if ($customerCheck) {
        $CustomerName = $customerCheck->CustomerName;
        $deleted = Customer::where('CustomerCode', $CustomerCode)
            ->where('BranchCode', $BranchCode)
            ->delete();

        if ($deleted) {
            return response()->json([
                'message' => 'Deleted',
                'CustomerCode' => $CustomerCode,
                'CustomerName' => $CustomerName,
            ]);
        }
    }

    return response()->json([
        'message' => 'Error',
        'CustomerCode' => $CustomerCode,
        'CustomerName' => '',
    ]);
}


// public function DeleteCustomer(Request $request)
// {
//      dd('sdsds');
//     $CustomerCode = $request->input('CustomerCode');
//     $BranchCode = Auth::user()->BranchCode;

//     $customerCheck = Customer::where('CustomerCode', $CustomerCode)
//         ->where('BranchCode', $BranchCode)
//         ->first();

//     if ($customerCheck) {
//         $CustomerName = $customerCheck->CustomerName;
//         $deleted = Customer::where('CustomerCode', $CustomerCode)
//             ->where('BranchCode', $BranchCode)
//             ->delete();

//         if ($deleted) {
//             return response()->json([
//                 'message' => 'Deleted',
//                 'CustomerCode' => $CustomerCode,
//                 'CustomerName' => $CustomerName,
//             ]);
//         }
//     }

//     return response()->json([
//         'message' => 'Error',
//         'CustomerCode' => $CustomerCode,
//         'CustomerName' => '',
//     ]);
public function dislist(Request $request)
{
    $customercode = $request->input('customercode');

    // Fetch customer contacts
    $customerContacts = CustomerContacts::where('CustomerCode', $customercode)->get();

    // Fetch discounts list
    $discountsList = CustomerDiscount::where('CustomerCode', $customercode)
        ->orderBy('DepartmentCode')
        ->get();

    // Fetch salesman name
    $smancode = Customer::select('SManCode')->where('CustomerCode', $customercode)->first();
    $salesmanName = '';
    if ($smancode && $smancode->SManCode) {
        $salesman = DB::table('salesmansetup')
            ->select('SManName')
            ->where('SManCode', $smancode->SManCode)
            ->first();
        $salesmanName = $salesman ? $salesman->SManName : '';
    }

    // If no discounts, provide default departments
    $defaultDepartments = [];
    if ($discountsList->isEmpty()) {
        $defaultDepartments = [
            ["DepartmentName" => "CABIN", "DepartmentCode" => "1"],
            ["DepartmentName" => "DECK", "DepartmentCode" => "2"],
            ["DepartmentName" => "ENGINE", "DepartmentCode" => "3"],
            ["DepartmentName" => "LOGISTIC", "DepartmentCode" => "4"],
            ["DepartmentName" => "MEDICINE", "DepartmentCode" => "7"],
            ["DepartmentName" => "SAFETY", "DepartmentCode" => "8"],
            ["DepartmentName" => "BONDED", "DepartmentCode" => "10"],
            ["DepartmentName" => "PROVISIONS", "DepartmentCode" => "11"],
            ["DepartmentName" => "UNKNOWN", "DepartmentCode" => "12"],
            ["DepartmentName" => "PRIVATE", "DepartmentCode" => "13"],
        ];
    }

    return response()->json([
        'contacts' => $customerContacts,
        'discounts' => $discountsList,
        'defaultDepartments' => $defaultDepartments,
        'salesmanName' => $salesmanName,
    ]);
}






    public function cuscontactsave(Request $request)
    {
        $cid = (int) $request->coID; //remove this line
        $contactcheck = CustomerContacts::where('ID', $cid)->first();
        if (!$contactcheck) {
            $insert_update = [];
            $insert_update["CustomerCode"] = $request->coCustomerCode;
            $insert_update["Title"] = $request->coTITLE;
            $insert_update["CustName"] = $request->coNAME;
            $insert_update["DepartmentName"] = $request->coDEPARTMENT;
            $insert_update["Phone"] = $request->coPHONE;
            $insert_update["Cell"] = $request->coCELL;
            $insert_update["Fax"] = $request->coFAX;
            $insert_update["Email"] = $request->coEMAIL;
            $insert_update["Notes"] = $request->coNOTES;
            $insert_update["IMONo"] = $request->coIMONO;
            $status = CustomerContacts::create($insert_update);
        } else {
            $insert_update = [];
            $insert_update["CustomerCode"] = $request->coCustomerCode;
            $insert_update["Title"] = $request->coTITLE;
            $insert_update["CustName"] = $request->coNAME;
            $insert_update["DepartmentName"] = $request->coDEPARTMENT;
            $insert_update["Phone"] = $request->coPHONE;
            $insert_update["Cell"] = $request->coCELL;
            $insert_update["Fax"] = $request->coFAX;
            $insert_update["Email"] = $request->coEMAIL;
            $insert_update["Notes"] = $request->coNOTES;
            $insert_update["IMONo"] = $request->coIMONO;

            $status = $contactcheck->update($insert_update);
        }


        if ($status == true) {
            $message = 'Contact Saved';
        }



        return response()->json([
            'message' => $message,
        ]);
    }

    public function Newcutcontact()
    {
        $idcontact = CustomerContacts::max('ID');
        if (!$idcontact) {
            $idcontact = 0;
        } else {
            $idcontact = $idcontact + 1;
        }
        $newidcontact = $idcontact + 1;
        return response()->json([
            'newidcontact' => $newidcontact,
        ]);
    }
}
