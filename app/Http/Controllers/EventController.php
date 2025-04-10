<?php

namespace App\Http\Controllers;

use App\Helpers\Ship;
use App\Http\Requests\EventRequest;
use App\Models\Quote;
use App\Models\Vessel;
use App\Models\Customer;
use App\Models\Typesetup;
use App\Models\UserRights;
use App\Models\GodownSetup;
use App\Models\QuoteDetails;
use Illuminate\Http\Request;
use App\Models\CustomerContacts;
use App\Models\ShipingPortSetup;
use Illuminate\Support\Facades\DB;
use App\Models\Events as modelevents;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class EventController extends Controller
{
    public function Event_setup()
    {
        $MBranchCode = Auth::user()->BranchCode;
        $branch = Auth::user()->BranchCode;
        $UserName = Auth::user()->UserName;
        $lastid = modelevents::where('BranchCode', $MBranchCode)->max('EventNo') ?? 0;

        return view('Events.Events_view', [
            'lastid' => $lastid,
            'branch' => $branch,
            'UserName' => $UserName,
        ]);
    }

    public function getshiptoevent(Request $request)
    {
        $ShipID = $request->input('ShipID');
        $Token = $request->input('Token');
        info($ShipID);
        info($Token);

        if (!$Token) {
            $shipservsetup = DB::table('shipservsetup')->first();
            $response = Http::withHeaders(['Accept' => 'application/json'])
                ->post("https://api.shipserv.com/authentication/oauth2/token", [
                    'grant_type' => $shipservsetup->GrantType,
                    'username' => $shipservsetup->UserName,
                    'password' => $shipservsetup->Password,
                    'client_id' => $shipservsetup->ClientId,
                    'client_secret' => $shipservsetup->ClientSecret
                ]);
            $Token = $response->json()['access_token'];
        }

        $baseUrl = 'https://api.shipserv.com/order-management/documents/' . $ShipID;
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $Token,
            'Api-Version' => 'v2',
            'Accept' => 'application/json'
        ])->get($baseUrl);

        if ($response->successful()) {
            $responseData = $response->json();
            $customer = $responseData['buyerContact']['name'];
            $searchItemWords = explode(' ', $customer);
            $output = "";

            foreach ($searchItemWords as $word) {
                $CustomerData = Customer::LikeName($word);
                foreach ($CustomerData as $product) {
                    $output .= '<tr class="js-click js-clickq" id="' . $product->CustomerName . '" data-id="' . $product->CustomerName . '"
                                 data-cusname="' . $product->CustomerName . '" data-custcode="' . $product->CustomerCode . '"
                                 data-cuscode="' . $product->CusCode . '" data-act="' . $product->ActCode . '" data-Address="' . $product->Address . '"
                                 data-CallSign="' . $product->CallSign . '" data-PhoneNo="' . $product->PhoneNo . '" data-FaxNo="' . $product->FaxNo . '"
                                 data-EmailAddress="' . $product->EmailAddress . '" data-WebAddress="' . $product->WebAddress . '" data-BContactPerson="' . $product->BContactPerson . '"
                                 data-BillingAddress="' . $product->BillingAddress . '" data-BTelephoneNo="' . $product->BTelephoneNo . '" data-BFaxNo="' . $product->BFaxNo . '"
                                 data-BEmailAddress="' . $product->BEmailAddress . '" data-BWeb="' . $product->BWeb . '" data-Status="' . $product->Status . '" data-ChkInactive="' . $product->ChkInactive . '"
                                 data-CreditLimit="' . $product->CreditLimit . '" data-Country="' . $product->Country . '" data-BranchCode="' . $product->BranchCode . '"
                                 data-Terms="' . $product->Terms . '" data-EventQuateCharges="' . $product->EventQuateCharges . '" data-City="' . $product->City . '"
                                 data-CustomerDiscPer="' . $product->CustomerDiscPer . '" data-InvoiceDiscPer="' . $product->InvoiceDiscPer . '" data-SalesManCommPer="' . $product->SalesManCommPer . '"
                                 data-RebaitPer="' . $product->RebaitPer . '" data-CreditNotePer="' . $product->CreditNotePer . '" data-AgentCommPer="' . $product->AgentCommPer . '"
                                 data-BankDetail="' . $product->BankDetail . '" data-Priority="' . $product->Priority . '" data-EnterCustomer="' . $product->EnterCustomer . '"
                                 data-CType="' . $product->CType . '" data-Vtype="' . $product->Vtype . '" data-CustCategory="' . $product->CustCategory . '"
                                 data-AreaofBusiness="' . $product->AreaofBusiness . '" data-AreaCode="' . $product->AreaCode . '" data-ContactPerson="' . $product->ContactPerson . '"
                                 data-StateName="' . $product->StateName . '" data-CashDiscPer="' . $product->CashDiscPer . '" data-MobileNo="' . $product->MobileNo . '"
                                 data-smancode="' . $product->SManCode . '" data-SManActCode="' . $product->SManActCode . '" data-WorkUser="' . $product->WorkUser . '"
                                 data-AgentCode="' . $product->AgentCode . '" data-AgentActCode="' . $product->AgentActCode . '" data-AssignUser="' . $product->AssignUser . '"
                                 data-LastEditDateTime="' . $product->LastEditDateTime . '">
                                 <td id="' . $product->CusCode . '">' . $product->CustomerCode . '</td>
                                 <td id="' . $product->ActCode . '">' . $product->CustomerName . '</td>
                                 <td id="' . $product->CustomerCode . '">' . $product->Address . '</td>
                                 <td id="' . $product->CustomerCode . '">' . $product->EmailAddress . '</td>
                                 <td id="' . $product->Status . '">' . $product->Status . '</td>
                                 </tr>';
                }
            }

            return response()->json([
                'data' => $responseData,
                'output' => $output
            ]);
        } else {
            return response()->json(['error' => $response->body()]);
        }
    }

    public function Event_setup_godownsetup()
    {
        $MBranchCode = Auth::user()->BranchCode;
        $warehouse = GodownSetup::select('GodownCode', 'GodownName', 'PrinterName')->where('BranchCode', $MBranchCode)->distinct()->get();

        return response()->json([
            'warehouse' => $warehouse,
        ]);
    }

    public function Es_portsetup()
    {
        $MBranchCode = Auth::user()->BranchCode;
        $shiping = ShipingPortSetup::select('PortName', 'PortCode')->where('BranchCode', $MBranchCode)->distinct()->get();

        return response()->json([
            'shiping' => $shiping,
        ]);
    }

    public function getcontact(Request $request)
    {
        $MBranchCode = Auth::user()->BranchCode;
        $customercode = $request->input('customercode');
        $id = $request->input('id');
        $Customercon = $id ? CustomerContacts::where('CustomerCode', $customercode)->where('ID', $id)->first() : (object) []; // Create an empty object
        $Customercontact = CustomerContacts::where('CustomerCode', $customercode)->get();

        return response()->json([
            'contacts' => $Customercontact,
            'Customercon' => $Customercon,
        ]);
    }

    public function QuoteGet(Request $request)
    {
        $Eventno = $request->Eventno;
        $MBranchCode = Auth::user()->BranchCode;
        $eventfiller = modelevents::where('BranchCode', $MBranchCode)->where('EventNo', $Eventno)->first();
        $results = Quote::where('EventNo', $Eventno)->where('BranchCode', $MBranchCode)->get();

        return response()->json([
            'message' => 'data successfully!',
            'results' => $results,
            'eventfiller' => $eventfiller,
        ]);
    }

    public function Mqoutssave(Request $request)
    {
        $MBranchCode = Auth::user()->BranchCode;
        $gEventNo = $request->input('EventNo');
        $eventfiller = modelevents::where('EventNo', $gEventNo)->where('BranchCode', $MBranchCode)->first();
        $tableData = $request->input('tableData');

        foreach ($tableData as $row) {
            $quote = new Quote;
            $lastQuote = Quote::orderBy('QuoteNo', 'DESC')->first();
            $QuoteNo = $lastQuote->QuoteNo + 1;
            $quote->QuoteNo = $QuoteNo;
            $quote->EventNo = $gEventNo;
            $quote->DepartmentName = $row[0];
            $quote->CustomerRefNo = $row[1];
            $quote->EstLineQuote = $row[2];
            $quote->BidDueDate = $row[3];
            $quote->DueTime = $row[4];
            $quote->ReturnVia = $row[5];
            $quote->DepartmentCode = $row[6];
            $quote->BranchCode = Auth::user()->BranchCode;
            $quote->QTime = date('h:i:s');
            $quote->QDate = date('Y-m-d');
            $quote->CustomerCode = $eventfiller->CustomerCode;
            $quote->CustomerName = $eventfiller->CustomerName;
            $quote->GodownName = $eventfiller->GodownName;
            $quote->GodownCode = $eventfiller->GodownCode;
            $quote->Terms = $eventfiller->Terms;
            $quote->Status = $eventfiller->Status;
            $quote->VesselName = $eventfiller->VesselName;
            $quote->WorkUser = Auth::user()->UserName;
            $quote->CreatedDate = date('Y-m-d');
            $quote->CreatedTime = date('h:i:s');
            $quote->save();
        }

        return response()->json([
            'message' => 'data saved successfully!',
            'results' => Quote::where('EventNo', $gEventNo)->where('BranchCode', $MBranchCode)->get(),
        ]);
    }

    public function refcheck(Request $request)
    {
        $MBranchCode = Auth::user()->BranchCode;
        $refno = $request->refno;
        $EventNo = $request->EventNo;
        $quote = Quote::where('CustomerRefNo', $refno)->where('BranchCode', $MBranchCode)->first();

        if ($quote) {
            return response()->json([
                'data' => $quote->EventNo,
                'QuoteNo' => $quote->QuoteNo,
                'Code' => 'Success',
            ]);
        }

        return response()->json([
            'Code' => 'Error',
            'data' => 'ok',
        ]);
    }

    public function showEmployee(Request $request)
    {
        $employees = Vessel::first();
        if ($request->keyword != '') {
            $employees = Vessel::where('CustomerCode', 'LIKE', '' . $request->keyword . '%')->get();
        }
        return response()->json([
            'employees' => $employees
        ]);
    }

    public function event_store(Request $request)
    {
        $BranchCode = Auth::user()->BranchCode;
        $datestamp = date("Y-m-d");
        $timestamps = date("Y-m-d G:i:s");
        $Eventr = $request->EventNo;
        $vesselr = $request->VesselName;
        $ShipId = $request->ShipId;
        $Token = $request->Token;
        $Customerr = $request->CustomerName;
        $Event = modelevents::where('EventNo', $Eventr)->where('BranchCode', $BranchCode)->first();

        if (!$Event) {
            $vessel_check_date = modelevents::whereRaw('BidDueDate >= DATE_SUB(NOW(), INTERVAL 1 MONTH)')
                ->where('VesselName', $vesselr)
                ->where('CustomerName', $Customerr)
                ->first();
        }

        if (!$Event) {
            if (!$vessel_check_date) {
                $Events = new modelevents([
                    'EventNo' => $request->EventNo,
                    'GeneralVesselNote' => $request->GeneralVesselNote,
                    'BranchCode' => $BranchCode,
                    'ETA' => $request->ETA,
                    'Contact' => $request->Contact,
                    'Phone' => $request->Phone,
                    'Cell' => $request->Cell,
                    'BidDUeDate' => $request->BidDUeDate,
                    'DueTime' => $request->DueTime,
                    'ShippingPort' => $request->ShippingPort,
                    'Note' => $request->followup,
                    'Name' => $request->Name,
                    'Email' => $request->Email,
                    'Fax' => $request->Fax,
                    'Status' => $request->Status,
                    'ReturnVia' => $request->ReturnVia,
                    'Priority' => $request->Priority,
                    'CustomerCode' => $request->Customercode,
                    'IMONo' => $request->IMONo,
                    'Department' => $request->Department,
                    'CustomerRef' => $request->CustomerRef,
                    'BidDUeDate2' => $request->BidDUeDate2,
                    'ReturnVia2' => $request->ReturnVia2,
                    'EstLineQuote' => $request->EstLineQuote,
                    'DueTme2' => $request->DueTme2,
                    'EventCreatedUser' => Auth::user()->UserName,
                    'EventCreatedDate' => $datestamp,
                    'EventCreatedTime' => $timestamps,
                    'CustomerName' => $request->CustomerName,
                    'VesselName' => $request->VesselName,
                    'GodownCode' => $request->GodownName,
                    'GodownName' => $request->GodownCodeget,
                    'CusCode' => $request->CusCode,
                    'CustomerActCode' => $request->CustomerActCode,
                ]);
                $Events->save();
                return redirect('events-setups/update?EventNo=' . $Eventr . '&ShipId=' . $ShipId . '&Token=' . $Token)
                    ->with('success', 'Your Event ' . $Eventr . ' With ' . $request->CustomerName . ' and ' . $request->VesselName . ' has been Created successfully!');
            } else {
                return redirect('events-setup')->with('error', 'Event Is Already Created! With ' . $request->CustomerName . ' Customer and Vessel IS: ' . $request->VesselName . ' <a href="/events-setups/update?EventNo=' . $vessel_check_date->EventNo . '"> Show me </a>');
            }
        } else {
            $Event->update($request->all());
        }

        return redirect('events-setups/update?EventNo=' . $Eventr . '&ShipId=' . $ShipId . '&Token=' . $Token)
            ->with('success', 'Your Event ' . $Eventr . ' With ' . $request->CustomerName . ' and ' . $request->VesselName . ' has been Updated successfully!');
    }

    public function quote_store(Request $request)
    {
        // dd($request->all());

        $MWorkUser = config('app.MUserName');
        $BranchCode = Auth::user()->BranchCode;
        $datestamp = date("Y-m-d");

        $gEventNo = $request->EventNo2;
        $eventfiller = modelevents::where('EventNo', $gEventNo)->where('BranchCode', $BranchCode)->first();
        if ($eventfiller) {

            $CustomerData = Customer::where('CustomerCode', $eventfiller->CustomerCode)->where('BranchCode', $BranchCode)->first();
        }
        $quote = Quote::firstOrNew(['QuoteNo' => $request->QuoteNo, 'BranchCode' => $BranchCode]);
        $quote->fill($request->all());
        $quote->EventNo = $request->EventNo2;
        $quote->DepartmentName = $request->DepartmentName;
        $quote->DepartmentCode = $request->DepartmentCode ? $request->DepartmentCode : Ship::DeptCodeByName($request->DepartmentName);
        $quote->CustomerRefNo = $request->CustomerRef;
        $quote->BidDueDate = $request->BidDUeDate2;
        $quote->ReturnVia = $request->ReturnVia;
        $quote->EstLineQuote = $request->EstLineQuote;
        $quote->DueTime = $request->DueTme2;
        $quote->QuoteNo = $request->QuoteNo;
        $quote->WorkUser = $MWorkUser;
        $quote->AssignQuote = $request->WorkUser;
        $quote->BranchCode = $BranchCode;
        $quote->QDate = $datestamp;
        $quote->QTime = date('H:i:s');
        $quote->CreatedDate = $datestamp;
        $quote->CreatedTime = date('H:i:s');
        $quote->CustomerCode = $eventfiller->CustomerCode;
        $quote->CustomerName = $eventfiller->CustomerName;
        $quote->GodownName = $eventfiller->GodownName;
        $quote->GodownCode = $eventfiller->GodownCode;
        $quote->Terms = $CustomerData ? $CustomerData->Terms : '';
        $quote->Status = $eventfiller->Status;
        $quote->CustCode = $CustomerData ? $CustomerData->CusCode : '';
        $quote->StatusCode = 1;
        $quote->StatusColorCode = "-128";
        $quote->ChkUpload = "E";
        $quote->VesselName = $eventfiller->VesselName;
        $quote->save();

        return redirect('quotation?quote_no=' . $request->QuoteNo);
    }

    public function deleteevent(Request $request)
    {
        $EventNo = $request->EventNo;
        if ($EventNo) {
            Quote::where('EventNo', $EventNo)->delete();
            modelevents::where('EventNo', $EventNo)->delete();
            return response()->json(['data' => $EventNo, 'Code' => 'Success']);
        }
        return response()->json(['data' => $EventNo, 'Code' => 'Error']);
    }

    public function update(Request $request)
    {
        $EventNo = $request->EventNo;
        $ShipId = $request->ShipId;
        $Token = $request->Token;

        $branch = Auth::user()->BranchCode;
        $UserName = Auth::user()->UserName;

        $deptype = Typesetup::select('TypeCode', 'TypeName')->distinct()->where('BranchCode', $branch)->get();
        $userss = UserRights::select('UserName')->distinct()->get();
        $lastQuote = Quote::where('BranchCode', $branch)->max('QuoteNo') ?? 0;

        return view('Events/update', [
            'deptype' => $deptype,
            'userss' => $userss,
            'branch' => $branch,
            'UserName' => $UserName,
            'lastQuote' => $lastQuote,
            'EventNo' => $EventNo,
            'ShipId' => $ShipId,
            'Token' => $Token,
        ]);
    }

    public function follow(Request $request)
    {
        if ($request->ajax()) {
            $output = "";
            $followps = DB::table('eventfollowup')->where('EventNo', '=', '' . $request->follow . "%")->get();
            if ($followps) {
                foreach ($followps as $followp) {
                    $output .= '<tr>' .
                        '<td id="' . $followp->FollowUp . '">' . $followp->FollowUp . '</td>' .
                        '<td id="' . $followp->Date . '">' . $followp->Date . '</td>' .
                        '<td id="' . $followp->WorkUser . '">' . $followp->WorkUser . '</td>' .
                        '</tr>';
                }
                return response()->json($output);
            }
        }
    }

    public function getEventMasterData(Request $request)
    {
        $event_no = $request->event_no;
        return response()->json(modelevents::where('EventNo', $event_no)->orderBy('id', 'DESC')->get());
    }
}
