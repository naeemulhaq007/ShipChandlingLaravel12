<?php

namespace App\Http\Controllers;

use App\Models\BranchSetup;
use Illuminate\Http\Request;
use GroceryCrud\Core\GroceryCrud;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class Branch extends Controller
{
   

   public function branch_setup()
{
    $lastid = BranchSetup::orderBy('id', 'DESC')->first();
    $branches  = BranchSetup::get();

 
    $nextBranchCode = $lastid ? $lastid->id + 1 : 1;

    return view('branch.branch_view', [
        'lastid' => $lastid,
        'branches' => $branches,
        'nextBranchCode' => $nextBranchCode, 
    ]);
}


    // private function _getGroceryCrudEnterprise() {
    //     $database = $this->_getDatabaseConnection();
    //     $config = config('grocerycrud');

    //     $crud = new GroceryCrud($config, $database);

    //     return $crud;
    // }

    // private function _branchoutput($output,$data='') {
    //     if ($output->isJSONResponse) {
    //         return response($output->output, 200)
    //             ->header('Content-Type', 'application/json')
    //             ->header('charset', 'utf-8');
    //     }

    //     $css_files = $output->css_files;
    //     $js_files = $output->js_files;
    //     $output = $output->output;
    //     $lastid = DB::table('BranchSetup')->orderBy('id', 'DESC')->first();


    //     return view('branch_view', [
    //         'output' => $output,
    //         'css_files' => $css_files,
    //         'js_files' => $js_files,
    //         'data'=>$data,
    //         'lastid'=>$lastid,
    //     ]);
    // }
    private function _getDatabaseConnection() {

        return [
            'adapter' => [
                'driver' => 'Pdo',
                'dsn' => 'sqlsrv:server = tcp:'.env('DB_HOST').',1433; Database = '.env('DB_DATABASE'),
                'database' => env('DB_DATABASE'),
                'username' => env('DB_USERNAME'),
                'password' => env('DB_PASSWORD'),
                //'charset' => 'utf8'
            ]
        ];
    }



    //get request


//   public function BranchDelete(Request $request)
// {
//     $branchCode = $request->input('branchcode');
//     $Message = '';

//     // Debug log (optional)
//     \Log::info("Delete requested for BranchCode: " . $branchCode);

//     // Find the branch first
//     $branch = BranchSetup::where('BranchCode', $branchCode)->first();

//     if ($branch) {
//         // Delete the branch
//         $BranchDelete = BranchSetup::where('BranchCode', $branchCode)->delete();

//         if ($BranchDelete) {
//             $Message = 'Deleted';
//         } else {
//             $Message = 'Failed to delete';
//         }
//     } else {
//         $Message = 'Branch not found';
//     }

//     // Always return fresh branch list
//     $branches = DB::table('BranchSetup')->get();

//     return response()->json([
//         'branches' => $branches,
//         'Message' => $Message,
//     ]);
// }


public function BranchDelete(Request $request)
{
    try {
        $branchCode = $request->input('branchcode');
        \Log::info("Delete requested for BranchCode: $branchCode");

        $branch = BranchSetup::where('BranchCode', $branchCode)->first();

        if ($branch) {
            $deleted = $branch->delete();
            if ($deleted) {
                return response()->json([
                    'branches' => BranchSetup::all(),
                    'Message' => 'Deleted',
                ]);
            }
        }

        return response()->json([
            'branches' => BranchSetup::all(),
            'Message' => 'Not Found',
        ]);

    } catch (\Exception $e) {
        \Log::error("Delete Error: " . $e->getMessage());
        return response()->json([
            'error' => true,
            'message' => 'Exception occurred'
        ], 500);
    }
}


    public function branchstore(Request $request){
        // dd($request->all());

        $branch = BranchSetup::where('BranchCode',$request->branch_code)->first();
        $Inactive = $request->Inactive;
        if($Inactive == true){
            $Inactive = 1;
        }else{
            $Inactive = 0;

        }
         $isNew = false;
        // dd($Inactive);
        if(!$branch){

            $branch = new BranchSetup;

                $branch->BranchCode = $request->branch_code;
                 $isNew = true;
            }

                $branch->Inactive= $Inactive;
                $branch->BranchName= $request->branchname;
                $branch->CityName= $request->cityname;
                $branch->pic= $request->IMGpath;
                $branch->Currency= $request->currency;
                $branch->Email= $request->branchemail;
                $branch->Password= $request->password;
                $branch->SMTP= $request->smpt;
                $branch->USDRate= $request->exchangerate;
                $branch->GSTPer= $request->gst;



            $branch->save();
             

            if($branch){
                
                $Message = 'Saved';
            }
            $Message = $isNew ? 'Saved' : 'Updated';

    return redirect('branch-setup')->with('Message', $Message);
        // return redirect('branch-setup')
        // ->with('Message',$Message);

    }

    public function branchuploadImage(Request $request)
    {
        $image = $request->file('image');
        $branchName = $_POST['branchname'];
        info($branchName);
        $branchcode = $request->branchcode;
        $image_name = 'Branch_'.$branchName.'_branchcode_'.$branchcode.'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images/Branches');
        $image->move($destinationPath, $image_name);
        Log::info("destinationPath: $destinationPath, image_name: $image_name");
        return response()->json(['image_name' => $image_name]);
    }

}
