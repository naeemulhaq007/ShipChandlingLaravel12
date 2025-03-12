<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ShipServController extends Controller
{
  
    public function index(){

        return view('ShipServe.ShipServData');
    }

    public function getShipserve(Request $request){
        $TxtDateFrom = $request->input('TxtDateFrom');
        $TxtDateTo = $request->input('TxtDateTo');
        $TxtTokenNo = $request->input('TxtTokenNo');
        $chk = $request->input('chk');
        $BranchCode =Auth::user()->BranchCode;

        if(!$TxtTokenNo){

            $shipservsetup = DB::table('shipservsetup')->first();
                $GrantType = $shipservsetup->GrantType;
                $UserName = $shipservsetup->UserName;
                $Password = $shipservsetup->Password;
                $ClientId = $shipservsetup->ClientId;
                $ClientSecret = $shipservsetup->ClientSecret;


            $hostURL = "https://api.shipserv.com/authentication/oauth2/token";
            $response = Http::withHeaders([
                'Accept' => 'application/json'
            ])->post($hostURL, [
                'grant_type' => $GrantType,
                'username' => $UserName,
                'password' => $Password,
                'client_id' => $ClientId,
                'client_secret' => $ClientSecret
            ]);
            $json = $response->json();
            $bearerToken = $json['access_token'];
        }else{
            $bearerToken = $TxtTokenNo;
        }

        if ($bearerToken) {

                // $ApiURL = "https://api.shipserv.com/monitoring/order-management?pageSize=1000&submittedDate='gte':'".$TxtDateFrom."'&submittedDate='lte':'".$TxtDateTo."'";
                // $ApiURL = "https://api-stg.shipservlabs.com/order-management?pageSize=100&submittedDate='gte':'".$TxtDateFrom."'&submittedDate='lte':'".$TxtDateTo."'";
                // $ApiURL = "https://api-stg.shipservlabs.com/order-management?type=RequestForQuote&pageSize=100&submittedDate='gte':'".$TxtDateFrom."'&submittedDate='lte':'".$TxtDateTo."'";
                // $token = "ttD0BwDT8QdJW2BM1uIFs54jVD5Y5vAW";
                $baseUrl = "https://api.shipserv.com/monitoring/order-management";
                // $endpoint = "";
                $apiVersion = "v2";

                $response = Http::withHeaders([
                    'Authorization' => 'Bearer ' . $bearerToken,
                    'Api-Version' => $apiVersion,
                    'Accept' => 'application/json'
                ])->get($baseUrl, [
                    'pageSize' => 100,
                    'submittedDate'=>json_encode(['gte' => $TxtDateFrom, 'lte' => $TxtDateTo]),
                    'type' => $chk ? $chk : '',
                ]);
// info($response);
                // Check if request was successful
                if ($response->successful()) {
                    // Handle successful response
                    $responseData = $response->json();
                    // Process $responseData here
                    DB::table('TempShipServ')->where('BranchCode',$BranchCode)->delete();

                    $list = $responseData['content'];
                    foreach ($list as $key => $item) {
                        $id  = $item["id"];
                        $MMType  = $item["type"];
                        $transactionId  = $item["transactionId"];
                        $buyerTnId  = $item["buyerTnId"];
                        $buyerName  = $item["buyerName"];
                        $supplierTnId  = $item["supplierTnId"];
                        $supplierName  = $item["supplierName"];
                        $priority  = $item["priority"];
                        $MMCurrencyCode  = "USD";
                        $subject  = $item["subject"];
                        $totalCost  = $item["totalCost"];
                        $referenceNumber  = $item["referenceNumber"];
                        $status  = $item["status"];
                        $createdDate  = $item["createdDate"];
                        $submittedDate  = $item["submittedDate"];
                        $exported  = $item["exported"];
                        $vesselIMO  = $item["vesselImoNumber"];
                        $vesselName  = $item["vesselName"];
                        $MREFRFQNo  = "";
                        if ($MMType == "Quote"){

                            $MREFRFQNo = $item["requestForQuoteReferenceNumber"];
                        }
                        else{

                            $MREFRFQNo = "";
                        }


                        if(strlen($buyerTnId) !== 0){
                            $dateTime = Carbon::parse($submittedDate);
                            $createdDate = Carbon::parse($createdDate);

                            // Format DateTime object to MySQL datetime format

                              $Rs1 = DB::table('TempShipServ')->updateOrInsert(
                                [
                                    'ID'=>$id,
                                ],[
                                    'TokenNo'=>$bearerToken,
                                    'DateFrom'=>$TxtDateFrom,
                                    'DateTo'=>$TxtDateTo,
                                    'CustomerId'=>$buyerTnId,
                                    'CustomerName'=>$buyerName,
                                    'VesselName'=>$vesselName,
                                    'VesselIMO'=>$vesselIMO,
                                    'SupplierName'=>$supplierName,
                                    'SupplierId'=>$supplierTnId,
                                    'RefrenceNo'=>($MMType == 'Quote') ? $MREFRFQNo : $referenceNumber,
                                    'Type'=>$MMType,
                                    'Subject'=>$subject,
                                    'Priority'=>$priority,
                                    'TotalCost'=>$totalCost,
                                    'Status'=>$status,
                                    'SubmittedDate'=>$dateTime,
                                    'TransId'=>$transactionId,
                                    'CurrencyCode'=>"USD",
                                    'CreatedDate'=>$createdDate,
                                    'Exported'=>$exported,
                                    'BranchCode'=>$BranchCode,
                                ]);


                        }
                    }


                    // $Tempdata = DB::table('TempShipServ')->get();
                    // info($Tempdata);
                return response()->json(['data' => $responseData]);

                } else {
                    // Handle unsuccessful response
                    $errorMessage = $response->body();
                return response()->json(['data' => $errorMessage]);

                    // Handle error message
                }
                // $response = Http::withHeaders([
                //     'Api-Version' => 'v2',
                //     'Authorization' => $bearerToken,
                //     'Accept' => 'application/json'
                // ])->post($ApiURL);

                // if ($response->successful()) {
                //     $json = $response->json();
                //     info($json);
                //     return response()->json(['data' => $json]);
                // } else {
                //     info('Request failed: ' . $response->status());
                //     info('Response body: ' . $response->body());
                //     return response()->json(['error' => 'Request failed'], $response->status());
                // }

            } else {
                return response()->json(['error' => 'Failed to get token'], $response->status());
            }


        return response()->json([

        ]);
    }
}
