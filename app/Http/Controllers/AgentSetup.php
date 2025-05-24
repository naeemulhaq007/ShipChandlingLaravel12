<?php

namespace App\Http\Controllers;

use App\Models\AgentSetup as ModelsAgentSetup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Prophecy\Exception\Prediction\AggregateException;
use Illuminate\Support\Facades\Auth;

class AgentSetup extends Controller
{
   
    public function agent_setup(){

        $MBranchCode= Auth::user()->BranchCode;

        $lastid = ModelsAgentSetup::where('BranchCode', $MBranchCode)->max('AgentCode');
        $AgentCommSetup = ModelsAgentSetup::where('BranchCode', $MBranchCode)->get();
        if(!$lastid){
            $lastid=0;
        }else{
            $lastid = $lastid+1;
        }
        return view('agent-setup.agent_view', [
            'lastid'=>$lastid,
            'AgentCommSetup'=>$AgentCommSetup,
        ]);
    }
    public function Deleteagent(Request $request){
        $MBranchCode= Auth::user()->BranchCode;
        $AgentCode = $request->input('AgentCode');
        $Message = '';
        $AgentCommSetup = ModelsAgentSetup::where('AgentCode',$AgentCode)->where('BranchCode', $MBranchCode)->delete();
        if($AgentCommSetup){

            $Message = 'Deleted';
        }
        return response()->json( [
            'Message'=> $Message ,
        ]);
    }
  
  

public function fetch(Request $request)
{
    $MBranchCode = Auth::user()->BranchCode;

    $agent = ModelsAgentSetup::where('AgentCode', $request->AgentCode)
        ->where('BranchCode', $MBranchCode)
        ->first();

    if ($agent) {
        return response()->json([
            'agent' => $agent
        ]);
    } else {
        return response()->json([
            'agent' => null
        ]);
    }
}

  

    private function _showOutput($output,$data='') {
        if ($output->isJSONResponse) {
            return response($output->output, 200)
                ->header('Content-Type', 'application/json')
                ->header('charset', 'utf-8');
        }

        $css_files = $output->css_files;
        $js_files = $output->js_files;
        $output = $output->output;
    $MBranchCode= Auth::user()->BranchCode;

        // $lastid = ModelsAgentSetup::orderBy('ID', 'DESC')->first();
        $lastid = ModelsAgentSetup::where('BranchCode', $MBranchCode)->max('AgentCode');
        if(!$lastid){
            $lastid=0;
        }
// dd($lastid);


        return view('agent_view', [
            'output' => $output,
            'css_files' => $css_files,
            'js_files' => $js_files,
            'data'=>$data,
            'lastid'=>$lastid,
        ]);
    }
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
    
    
    public function store(Request $request)
{
    $MBranchCode = Auth::user()->BranchCode;

    // Step 1: Agar user ne AgentCode diya ho to usi ko use karo
    $inputAgentCode = $request->AgentCode;

    // Step 2: Agar nahi diya, to auto-generate karo
    if (empty($inputAgentCode)) {
        $lastAgent = ModelsAgentSetup::where('AgentCode', 'like', 'AG%')
            ->orderBy('AgentCode', 'desc')
            ->first();

        if ($lastAgent && preg_match('/AG(\d+)/', $lastAgent->AgentCode, $matches)) {
            $nextNumber = (int)$matches[1] + 1;
        } else {
            $nextNumber = 1;
        }

        $inputAgentCode = 'AG' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);
    }

    // Step 3: Check if agent already exists
    $agent = ModelsAgentSetup::where('AgentCode', $inputAgentCode)
        ->where('BranchCode', $MBranchCode)
        ->first();

    $agentData = [
        'AgentCode' => $inputAgentCode,
        'ActCode' => $request->ActCode,
        'AgentName' => $request->AgentName,
        'Address' => $request->Address,
        'CallSign' => null,
        'ChkInactive' => 0,
        'BranchCode' => $MBranchCode,
        'CusCode' => $request->CusCode,
        'PhoneNo' => $request->PhoneNo,
        'FaxNo' => $request->FaxNo,
        'EmailAddress' => $request->EmailAddress,
        'WebAddress' => $request->WebAddress,
        'Country' => $request->Country,
        'City' => $request->City,
        'State' => $request->State,
        'Zip' => $request->Zip,
        'BContactPerson' => $request->BContactPerson,
        'BillingAddress' => $request->BillingAddress,
        'BTelephoneNo' => $request->BTelephoneNo,
        'BFaxNo' => $request->BFaxNo,
        'BEmailAddress' => $request->BEmailAddress,
        'BWeb' => $request->BWeb,
        'Status' => $request->Status,
        'CreditLimit' => $request->CreditLimit,
        'Terms' => $request->Terms,
        'EventQuateCharges' => $request->EventQuateCharges,
    ];

    if ($agent) {
        $agent->update($agentData);
    } else {
        ModelsAgentSetup::create($agentData);
    }

    return redirect('agent-setup')->with('Message', 'Saved with Agent Code: ' . $inputAgentCode);
}

    
//     public function store(Request $request)
// {
//     $MBranchCode = Auth::user()->BranchCode;

//     // Check if agent already exists
//     $agent = ModelsAgentSetup::where('AgentCode', $request->AgentCode)
//         ->where('BranchCode', $MBranchCode)
//         ->first();

//     if ($agent) {
//         // If agent exists, update only other fields
//         $agent->update([
//             'ActCode' => $request->ActCode,
//             'AgentName' => $request->AgentName,
//             'Address' => $request->Address,
//             'CallSign' => null,
//             'ChkInactive' => 0,
//             'CusCode' => $request->CusCode,
//             'PhoneNo' => $request->PhoneNo,
//             'FaxNo' => $request->FaxNo,
//             'EmailAddress' => $request->EmailAddress,
//             'WebAddress' => $request->WebAddress,
//             'Country' => $request->Country,
//             'City' => $request->City,
//             'State' => $request->State,
//             'Zip' => $request->Zip,
//             'BContactPerson' => $request->BContactPerson,
//             'BillingAddress' => $request->BillingAddress,
//             'BTelephoneNo' => $request->BTelephoneNo,
//             'BFaxNo' => $request->BFaxNo,
//             'BEmailAddress' => $request->BEmailAddress,
//             'BWeb' => $request->BWeb,
//             'Status' => $request->Status,
//             'CreditLimit' => $request->CreditLimit,
//             'Terms' => $request->Terms,
//             'EventQuateCharges' => $request->EventQuateCharges,
//         ]);
//     } else {
//         // If agent doesn't exist, insert new
//         ModelsAgentSetup::create([
//             'AgentCode' => $request->AgentCode,
//             'ActCode' => $request->ActCode,
//             'AgentName' => $request->AgentName,
//             'Address' => $request->Address,
//             'CallSign' => null,
//             'ChkInactive' => 0,
//             'BranchCode' => $MBranchCode,
//             'CusCode' => $request->CusCode,
//             'PhoneNo' => $request->PhoneNo,
//             'FaxNo' => $request->FaxNo,
//             'EmailAddress' => $request->EmailAddress,
//             'WebAddress' => $request->WebAddress,
//             'Country' => $request->Country,
//             'City' => $request->City,
//             'State' => $request->State,
//             'Zip' => $request->Zip,
//             'BContactPerson' => $request->BContactPerson,
//             'BillingAddress' => $request->BillingAddress,
//             'BTelephoneNo' => $request->BTelephoneNo,
//             'BFaxNo' => $request->BFaxNo,
//             'BEmailAddress' => $request->BEmailAddress,
//             'BWeb' => $request->BWeb,
//             'Status' => $request->Status,
//             'CreditLimit' => $request->CreditLimit,
//             'Terms' => $request->Terms,
//             'EventQuateCharges' => $request->EventQuateCharges,
//         ]);
//     }

//     return redirect('agent-setup')->with('Message', 'Saved');
// }





}
