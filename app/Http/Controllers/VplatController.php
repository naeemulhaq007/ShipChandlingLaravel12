<?php

namespace App\Http\Controllers;

use App\Models\RFQVendorWCI;
use Illuminate\Http\Request;
use App\Models\RFQVendorGSUAE;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use PhpOffice\PhpSpreadsheet\IOFactory;


class VplatController extends Controller
{
    public function Vplat_quoteWCI(Request $request){
        $BranchCode = $request->BranchCode;
        $VendorCode = $request->VendorCode;
        // info($VendorCode);
        $eventno = $request->eventno;
        $quoteno = $request->quoteNo;
        $data = RFQVendorWCI::where([
            ['BranchCode', $BranchCode],
            ['QuoteNo', $quoteno],
            ['VendorCode', $VendorCode],
        ])->orderBy('ID')->get();
        $dataf = RFQVendorWCI::where([
            ['BranchCode', $BranchCode],
            ['QuoteNo', $quoteno],
            ['VendorCode', $VendorCode],
        ])->first();

        // $Event = DB::connection('WCIsqlsrv')->tabke('')


// dd($dataf);
        return view('Vplat.Vplat_Quote_WCI', [

              'data' => $data,
              'dataf' => $dataf,
        ]);
    }


    public function importvplatWCI(Request $request)
    {
        $file = $request->file('file');
        $Quoteno = $request->input('Quoteno');


        $spreadsheet = IOFactory::load($file);
        $worksheet = $spreadsheet->getActiveSheet();
        $rows = $worksheet->toArray();
        $title = $rows[0][0];
$quoteParts = explode("|", $title);
$Quotenoget = $quoteParts[1];

if($Quoteno == $Quotenoget){
    info('same');
$message = 'File imported successfully';

}else{
    $message = 'Quoteno Not Same';
}
return response()->json([
        'message' => $message,
        'datarowes' => $rows,
    ]);

    }



public function uploadImageWCI(Request $request)
{


   $image = $request->file('image');
  $id = $request->id;
  $quoteno = $request->quoteno;
  $image_name = 'QuoteNo_'.$quoteno.'_ID_'.$id.'.'.$image->getClientOriginalExtension();
  $destinationPath = public_path('/images/Quote');
  $image->move($destinationPath, $image_name);
  Log::info("destinationPath: $destinationPath, image_name: $image_name");


            if($image_name){
                info('saved');
            }

  return response()->json(['image_name' => $image_name]);
}

public function saveqouteVplatWCI(Request $request){
    if($request->ajax()){

        $tablearray = $request->tablearray;
        $quoteNumber = $request->QuoteNo;
        $branchCode = $request->BranchCode;
        $vendorCode = $request->input('VendorCode');
        $WorkUser = $request->input('WorkUser');
        $FreightTotal = $request->input('FreightTotal');
        $CustomerName = $request->input('CustomerName');
        $VesselName = $request->input('VesselName');
        $VendorName = $request->input('VendorName');
        $WorkUserEmail = $request->input('WorkUserEmail');
        $Currency = $request->Currency;
        $date = date('Y-m-d');
        $time = date('H:i:s');

// ...




$tablearray = json_encode($tablearray); // Convert the array to JSON

try {
    $sp = DB::connection('WCIsqlsrv')->statement("EXEC UpdateRFQVendorWCI @tablearray = ?, @FreightTotal = ?, @Currency = ?, @date = ?, @time = ?", [
        $tablearray,
        $FreightTotal,
        $Currency,
        $date,
        $time
    ]);

    // Proceed with further actions if the stored procedure was executed successfully

} catch (\Exception $e) {
    // An error occurred, handle it here
    $errorMessage = $e->getMessage();
    // You can log or display the error message as per your requirements
    // For example:
    echo "Error executing the stored procedure: " . $errorMessage;
}


        $data = [
            'title' => 'Quote-Received : '.$quoteNumber,
            'body' => 'You have Received An Quote Please Check Software',
            'QuoteNo' => $quoteNumber,
            'BranchCode' => $branchCode,
            'VendorCode' => $vendorCode,
            'CustomerName' => $CustomerName,
            'VesselName' => $VesselName,
            'VendorName' => $VendorName,
            'VendorCode' => $vendorCode,
            'Link' => 'http://194.163.163.21/Vplat-Quote-WCI?&quoteNo='.$quoteNumber.'&VendorCode='.$vendorCode.'&BranchCode='.$branchCode,
        ];
        info($WorkUserEmail);
        if($WorkUserEmail == '' || !$WorkUserEmail){
            $WorkUserEmail = 'naeemulhaq06@gmail.com';
        }else{

            $toEmails = [
                $WorkUserEmail => $WorkUser,
            ];
            $fromEmail = 'wci20231@outlook.com';
            Mail::send('emails.test', $data, function ($message) use ($toEmails ,$fromEmail) {
                $message->to($toEmails)->subject('Vplat Quote Email');
                $message->from($fromEmail, 'Vplatform');
            });
        }


        return response()->json([
            'message' => 'Price Saved',
            'Code' => 'Success',
            'quoteNumber' => $quoteNumber,
            'tabledata' => $tablearray,
        ]);
    }
}
    public function Vplat_quoteUae(Request $request){
        $BranchCode = $request->BranchCode;
        $VendorCode = $request->VendorCode;
        // info($VendorCode);
        $eventno = $request->eventno;
        $quoteno = $request->quoteNo;
        $data = RFQVendorGSUAE::where([
            ['BranchCode', $BranchCode],
            ['QuoteNo', $quoteno],
            ['VendorCode', $VendorCode],
        ])->orderBy('ID')->get();
        $dataf = RFQVendorGSUAE::where([
            ['BranchCode', $BranchCode],
            ['QuoteNo', $quoteno],
            ['VendorCode', $VendorCode],
        ])->first();

        // $Event = DB::connection('WCIsqlsrv')->tabke('')


// dd($dataf);
        return view('Vplat.Vplat_Quote', [

              'data' => $data,
              'dataf' => $dataf,
        ]);
    }


    public function importvplatUae(Request $request)
    {
        $file = $request->file('file');
        $Quoteno = $request->input('Quoteno');


        $spreadsheet = IOFactory::load($file);
        $worksheet = $spreadsheet->getActiveSheet();
        $rows = $worksheet->toArray();
        $title = $rows[0][0];
$quoteParts = explode("|", $title);
$Quotenoget = $quoteParts[1];

if($Quoteno == $Quotenoget){
    info('same');
$message = 'File imported successfully';

}else{
    $message = 'Quoteno Not Same';
}
return response()->json([
        'message' => $message,
        'datarowes' => $rows,
    ]);

    }



public function uploadImageUae(Request $request)
{


   $image = $request->file('image');
  $id = $request->id;
  $quoteno = $request->quoteno;
  $image_name = 'QuoteNo_'.$quoteno.'_ID_'.$id.'.'.$image->getClientOriginalExtension();
  $destinationPath = public_path('/images/Quote');
  $image->move($destinationPath, $image_name);
  Log::info("destinationPath: $destinationPath, image_name: $image_name");


            if($image_name){
                info('saved');
            }

  return response()->json(['image_name' => $image_name]);
}

public function saveqouteVplatUae(Request $request){
    if($request->ajax()){

        $tablearray = $request->tablearray;
        $quoteNumber = $request->QuoteNo;
        $branchCode = $request->BranchCode;
        $vendorCode = $request->input('VendorCode');
        $WorkUser = $request->input('WorkUser');
        $FreightTotal = $request->input('FreightTotal');
        $CustomerName = $request->input('CustomerName');
        $VesselName = $request->input('VesselName');
        $VendorName = $request->input('VendorName');
        $WorkUserEmail = $request->input('WorkUserEmail');
        $Currency = $request->Currency;
        $date = date('Y-m-d');
        $time = date('H:i:s');

// ...




$tablearray = json_encode($tablearray); // Convert the array to JSON


try {
    $sp = DB::connection('secsqlsrv')->statement("EXEC UpdateRFQVendorUAE @tablearray = ?, @FreightTotal = ?, @Currency = ?, @date = ?, @time = ?", [
        $tablearray,
        $FreightTotal,
        $Currency,
        $date,
        $time
    ]);

    // Proceed with further actions if the stored procedure was executed successfully

} catch (\Exception $e) {
    // An error occurred, handle it here
    $errorMessage = $e->getMessage();
    // You can log or display the error message as per your requirements
    // For example:
    echo "Error executing the stored procedure: " . $errorMessage;
}


        $data = [
            'title' => 'Quote-Received : '.$quoteNumber,
            'body' => 'You have Received An Quote Please Check Software',
            'QuoteNo' => $quoteNumber,
            'BranchCode' => $branchCode,
            'VendorCode' => $vendorCode,
            'CustomerName' => $CustomerName,
            'VesselName' => $VesselName,
            'VendorName' => $VendorName,
            'VendorCode' => $vendorCode,
            'Link' => 'http://194.163.163.21/Vplat-Quote-UAE?&quoteNo='.$quoteNumber.'&VendorCode='.$vendorCode.'&BranchCode='.$branchCode,
        ];
        info($WorkUserEmail);
        if($WorkUserEmail == '' || !$WorkUserEmail){
            $WorkUserEmail = 'naeemulhaq06@gmail.com';
        }else{

            $toEmails = [
                $WorkUserEmail => $WorkUser,
            ];
            $fromEmail = 'wci20231@outlook.com';
            Mail::send('emails.test', $data, function ($message) use ($toEmails ,$fromEmail) {
                $message->to($toEmails)->subject('Vplat Quote Email');
                $message->from($fromEmail, 'Vplatform');
            });
        }


        return response()->json([
            'message' => 'Price Saved',
            'Code' => 'Success',
            'quoteNumber' => $quoteNumber,
            'tabledata' => $tablearray,
        ]);
    }
}
}
