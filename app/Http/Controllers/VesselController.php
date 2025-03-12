<?php

namespace App\Http\Controllers;

use App\Http\Requests\VesselRequest;
use App\Models\Vessel;
use App\Models\Customer;
use Illuminate\Http\Request;
use GroceryCrud\Core\GroceryCrud;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use Illuminate\Support\Facades\Auth;

class VesselController extends Controller
{
    public function VesselGet(Request $request)
    {
        $perPage = 10; // You can adjust this value

        // Calculate the page number from the request or default to 1
        $page = $request->input('page', 1);

        // Calculate the offset to skip records based on the page number
        $offset = ($page - 1) * $perPage;

        // Query the database with pagination
        $VesselSetup = Vessel::where('CustomerCode',$request->input('CustomerCode'))->orderBy('CustomerCode', 'DESC')
            ->get();

        return response()->json([
            'VesselSetup' => $VesselSetup,
        ]);
    }
    public function VesselDelete(Request $request)
    {

        $BranchCode = Auth::user()->BranchCode;
        $vesselcode = $request->input('vesselcode');
        $Message = '';

        $VesselSetup = Vessel::where('ID', $vesselcode)->first();
        if ($VesselSetup) {
            $VesselDelete = Vessel::where('ID', $vesselcode)->delete();
            if ($VesselDelete) {
                $Message = 'Deleted';
            }
        }
        $VesselSetup = Vessel::get();

        return response()->json([
            'Message' => $Message,
            'VesselSetup' => $VesselSetup,
        ]);
    }
    public function vessel_setup()
    {
        $MBranchCode = Auth::user()->BranchCode;
        $lastid = Vessel::max('ID');
        if (!$lastid) {
            $lastid = 0;
        }


        return view('Setups.vessel_view', [

            'lastid' => $lastid,
        ]);
    }

    public function update($ID)
    {
        // dd($ID);
        $vesselfiller = Vessel::find($ID);
        $crud = $this->_getGroceryCrudEnterprise();
        $crud->setTable('VesselSetup');
        $crud->setSubject('Vessel Setup', 'Vessel Setup');
        $crud->setPrimaryKey('ID', 'VesselSetup');
        $crud->setActionButton('Edit', 'fa fa-pencil', function ($row) {
            return '/vessel-setups/update/' . $row->ID;
        }, false);
        $crud->columns(['ID', 'CustomerCode', 'IMONo', 'VesselName', 'VesselType']);
        $crud->unsetadd();
        $crud->unsetEdit();
        $output = $crud->render();
        $data["pagetitle"] = "Vessel Setup";

        $branch = Auth::user()->BranchCode;
        $UserName = config('app.MUserName');
        return $this->_showOutputupdate($output, $data, $vesselfiller);
    }
    private function _showOutputupdate($output, $data = '', $vesselfiller)
    {
        if ($output->isJSONResponse) {
            return response($output->output, 200)
                ->header('Content-Type', 'application/json')
                ->header('charset', 'utf-8');
        }

        $css_files = $output->css_files;
        $js_files = $output->js_files;
        $output = $output->output;
        $custset = DB::table('CustomerSetup')->get();
        $Vessel = Vessel::get();
        $sales = DB::table('SalesManSetup')->get();
        $lastid = Vessel::orderBy('id', 'DESC')->first();
        $branch = Auth::user()->BranchCode;
        $UserName = config('app.MUserName');






        return view('vessel/update', [
            'output' => $output,
            'css_files' => $css_files,
            'js_files' => $js_files,
            'data' => $data,
            'custset' => $custset,
            'Vessel' => $Vessel,
            'sales' => $sales,
            'lastid' => $lastid,
            'vesselfiller' => $vesselfiller,


        ]);
    }
    public function importVessellist(Request $request)
    {

        $file = $request->file('excel_file');
        $startRow = $request->input('start_row');
        $startColumn = $request->input('start_column');
        $endRow = $request->input('end_Row');
        $CustomerCodeColumn = $request->input('CustomerCodeColumn');
        $CustomerNameColumn = $request->input('CustomerNameColumn');
        $VesselCodeColumn = $request->input('VesselCodeColumn');
        $VesselNameColumn = $request->input('VesselNameColumn');
        $IMOColumn = $request->input('IMOColumn');
        $VtypeColumn = $request->input('VtypeColumn');
        info($startRow);
        info($endRow);

        $filePath = $file->getPathname();

        $spreadsheet = IOFactory::load($filePath);
        $sheet = $spreadsheet->getActiveSheet();

        $data = [];
        for ($row = $startRow; $row <= $endRow; $row++) {
            $rowData = [];
            $CustomerCode = $sheet->getCellByColumnAndRow(
                Coordinate::columnIndexFromString($CustomerCodeColumn),
                $row
            )->getValue();
            $CustomerName = $sheet->getCellByColumnAndRow(
                Coordinate::columnIndexFromString($CustomerNameColumn),
                $row
            )->getValue();
            $VesselCode = $sheet->getCellByColumnAndRow(
                Coordinate::columnIndexFromString($VesselCodeColumn),
                $row
            )->getValue();
            $Vtype = $sheet->getCellByColumnAndRow(
                Coordinate::columnIndexFromString($VtypeColumn),
                $row
            )->getValue();
            $VesselName = $sheet->getCellByColumnAndRow(
                Coordinate::columnIndexFromString($VesselNameColumn),
                $row
            )->getValue();
            $IMO = $sheet->getCellByColumnAndRow(
                Coordinate::columnIndexFromString($IMOColumn),
                $row
            )->getValue();

            $rowData['CustomerCode'] = $CustomerCode;
            $rowData['CustomerName'] = $CustomerName;
            $rowData['VesselCode'] = $VesselCode;
            $rowData['VesselName'] = $VesselName;
            $rowData['Vtype'] = $Vtype;
            $rowData['IMO'] = $IMO;

            $data[] = $rowData;
        }
        info($data);

        return response()->json($data);
    }
    public function Vessellist_save(Request $request)
    {
        $BranchCode = Auth::user()->BranchCode;
        $TableData = $request->input('dataarray');

        for ($i = 0; $i < count($TableData); $i++) {
            $insert_update = [];
            $insert_update["CustomerCode"] = $CustomerCode = $TableData[$i]['CustomerCode'];
            $VesselCode = $TableData[$i]['VesselCode'];
            $insert_update["VesselName"] = $VesselName = $TableData[$i]['VesselName'];
            $insert_update["IMONo"] = $TableData[$i]['IMO'];
            $insert_update["VesselType"] = $TableData[$i]['Vtype'];

            $status = null;

            // Check if the record already exists
            $existingRecord = Vessel::where('ID', $VesselCode)
                ->where('CustomerCode', $CustomerCode)
                ->first();

            if ($existingRecord) {
                // Update the existing record
                $status = Vessel::where('ID', $VesselCode)
                    ->where('CustomerCode', $CustomerCode)
                    ->update($insert_update);
            } else {
                // Insert a new record without specifying the ID column
                $status = Vessel::insert($insert_update);
            }


            info($status);
        }

        return response()->json([
            'status' => $status,
        ]);
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $output = "";
            $products = DB::table('CustomerSetup')->where('CustomerName', 'LIKE', '' . $request->search . "%")->get();
            if ($products) {
                foreach ($products as $key => $product) {
                    $output .= '
                    <tr name="' . $product->CustomerName . '" id="' . $product->CustomerName . '" onClick="clicker(this.id);" data-dismiss="modal">' .

                        '<td id="' . $product->CustomerCode . '" onClick="clicke(this.id)">' . $product->CustomerCode . '</td>' .
                        '<td id="' . $product->CustomerCode . '" onClick="clicke(this.id)">' . $product->CustomerName . '</td>' .
                        '<td id="' . $product->CustomerCode . '" onClick="clicke(this.id)">' . $product->Address . '</td>' .
                        '<td id="' . $product->CustomerCode . '" onClick="clicke(this.id)">' . $product->EmailAddress . '</td>' .
                        '</tr>';
                }
                return Response($output);
            }
        }
    }


  


    public function store(Request $request)
    {

        $rvesselcode = $request->input('vesselcode');

        $vesselget = Vessel::where('ID', $rvesselcode)->first();


        if (!$vesselget) {

            $this->validate($request,[
            'IMONo' => 'required|unique:vesselsetup',
            'VesselName' => 'required',
            'VesselType' => 'required',
            // 'callsign' => 'required',
            ]);


            // Continue with the rest of your logic for storing/updating the record
        }else{
            $this->validate($request,[
                'IMONo' => 'required',
            'VesselName' => 'required',
            'VesselType' => 'required',
            ]);
        }
        $rvesselname = $request->input('vesselname');
        $rcompanycode = $request->input('companycode');
        // dd($rvesselcode);
        if (is_null($vesselget)) {
            $vessel = new Vessel([

                "CustomerCode" => $request->input('companycode'),
                "IMONo" => $request->input('IMONo'),
                "VesselName" => $request->input('VesselName'),
                "VesselType" => $request->input('VesselType'),
                "VCallSign" => $request->input('callsign'),
                "Email" => $request->input('email'),
                "PhoneNo" => $request->input('phonenumber'),
                "VNotes" => $request->input('VNotes'),
                "IMONO2" => null,
                "SuperintendentName" => $request->input('Supintendent'),
                "SuperintendentEmail" => null,
                "SuperintendentPhone" => null,
                "superintendentDate" => null,
                "Captainname" =>  $request->input('fleetmanager'),
                "CaptainEmail" => null,
                "CaprtainPhone" => null,
                "CaptainDate" => null,
                "ContactPerName" => $request->input('purchaser'),
                "ContactPerEmail" => null,
                "ContactPerPhone" => null,
                "ContactPerDate" => null,
                "SalesManCommPer" => null,
                "SalesManName" => null,
                "SalesManCode" => null,
                "SalesManActCode" => null,
                "SalesManNotes" => null,


            ]);

            $vessel->save();
            return response()->json([
                'success', 'Your VesselCode : ' . $rvesselcode . ' , V-Name ' . $rvesselname . ' has been Created successfully! '

            ]);
        } else {


            $vesselget->CustomerCode = $request->input('companycode');
            $vesselget->IMONo = $request->input('IMONo');
            $vesselget->VesselName = $request->input('VesselName');
            $vesselget->VesselType = $request->input('VesselType');
            $vesselget->VCallSign = $request->input('callsign');
            $vesselget->Email = $request->input('email');
            $vesselget->PhoneNo = $request->input('phonenumber');
            $vesselget->VNotes = $request->input('VNotes');
            $vesselget->Captainname = $request->input('fleetmanager');
            $vesselget->ContactPerName = $request->input('purchaser');
            $vesselget->SuperintendentName = $request->input('Supintendent');

            $vesselget->update();
            return response()->json([
                'success', 'Your VesselCode : ' . $rvesselcode . ' , V-Name' . $rvesselname . ' has been Updated successfully! '

            ]);
        }
    }
    public function getcustomer(Request $request)
    {
        $CustomerCode = $request->CustomerCode;

        $CustomerName = Customer::select('CustomerName')->where('CustomerCode', $CustomerCode)->first();
        if ($CustomerName) {

            $CustomerName = $CustomerName->CustomerName;
        }
        return response()->json([
            'CustomerName' => $CustomerName,
        ]);
    }
}
