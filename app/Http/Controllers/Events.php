<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Models\Quote;
use App\Models\Vessel;
use App\Models\Events;
use App\Models\Customer;
use App\Models\Typesetup;
use App\Models\UserRights;
use App\Models\GodownSetup;
use App\Models\QuoteDetails;
use Illuminate\Http\Request;
use App\Models\CustomerContacts;
use App\Models\ShipingPortSetup;
use GroceryCrud\Core\GroceryCrud;
use Illuminate\Support\Facades\DB;
use App\Models\Events as modelevents;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Support\Facades\Auth;

class Events extends Controller
{
   
    public function Event_setup()
    {
        $MBranchCode = Auth::user()->BranchCode;

        $branch = Auth::user()->BranchCode;
        $UserName = Auth::user()->UserName;
        $lastid = modelevents::where('BranchCode', $MBranchCode)->max('EventNo');
        if (!$lastid) {
            $lastid = 0;
        }





        return view('Events.Events_view', [
            'lastid' => $lastid,
            'branch' => $branch,
            'UserName' => $UserName,

        ]);
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
        if ($id) {
            $Customercon = CustomerContacts::where('CustomerCode', $customercode)->where('ID', $id)->first();
        } else {
            $Customercon = (object) []; // Create an empty object
        }

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
        info($results);

        return response()->json([
            'message' => 'data  successfully!',
            'results' => $results,
            'eventfiller' => $eventfiller,
        ]);
    }
    public function Mqoutssave(Request $request)
    {
        $MBranchCode = Auth::user()->BranchCode;

        $gEventNo = $request->input('EventNo');
        $eventfiller = modelevents::find($gEventNo);
        $tableData = $request->input('tableData');
        // info('reach');
        info($tableData);

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
        $results = Quote::where('EventNo', $gEventNo)->where('BranchCode', $MBranchCode)->get();

        // return a success message
        return response()->json([
            'message' => 'data saved successfully!',
            'results' => $results,
        ]);
    }
    public function refcheck(Request $request)
    {
        $MBranchCode = Auth::user()->BranchCode;

        $refno = $request->refno;
        $EventNo = $request->EventNo;
        $quote = Quote::where('CustomerRefNo', $refno)->where('BranchCode', $MBranchCode)->first();

        if ($quote) {
            info('same');
            $EventNo = $quote->EventNo;
            $QuoteNo = $quote->QuoteNo;
            return response()->json([
                'data' => $EventNo,
                'QuoteNo' => $QuoteNo,
                'Code' => 'Success',
            ]);
        }
        info('Continue');
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






public function event_store(EventRequest $request)
{
    $BranchCode = config('app.MBranchCode');
    $datestamp = date("Y-m-d");
    $timestamps = date("Y-m-d G:i:s");

    $vesselr = $request->VesselName;
    $Customerr = $request->CustomerName;

    // 1. Get EventNo from request
    $Eventr = $request->EventNo;

    // 2. If EventNo is empty, auto-generate
    if (empty($Eventr)) {
        $latest = modelevents::where('BranchCode', $BranchCode)->max('EventNo');
        $Eventr = $latest ? $latest + 1 : 1;
    }

    // 3. Check existing Event
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
                'EventNo' =>  $Eventr,
                'GeneralVesselNote' =>  $request->GeneralVesselNote,
                'BranchCode' => Auth::user()->BranchCode,
                'ETA' =>  $request->ETA,
                'Contact' =>  $request->Contact,
                'Phone' =>  $request->Phone,
                'Cell' =>  $request->Cell,
                'BidDUeDate' =>  $request->BidDUeDate,
                'DueTime' =>  $request->DueTime,
                'ShippingPort' =>  $request->ShippingPort,
                'Note' =>  $request->followup,
                'Name' =>  $request->Name,
                'Email' =>  $request->Email,
                'Fax' =>  $request->Fax,
                'Status' =>  $request->Status,
                'ReturnVia' =>  $request->ReturnVia,
                'Priority' =>  $request->Priority,
                'Competition' =>  null,
                'CustomerCode' => $request->Customercode,
                'IMONo' =>  $request->IMONo,
                'Department' =>  $request->Department,
                'CustomerRef' =>  $request->CustomerRef,
                'BidDUeDate2' =>  $request->BidDUeDate2,
                'ReturnVia2' =>  $request->ReturnVia2,
                'EstLineQuote' =>  $request->EstLineQuote,
                'DueTme2' =>  $request->DueTme2,
                'EventCreatedUser' => Auth::user()->UserName,
                'EventCreatedDate' => $datestamp,
                'EventCreatedTime' => $timestamps,
                'ContactID' =>  $request->ContactID,
                'SendProductListDate' =>  null,
                'CustomerName' =>  $request->CustomerName,
                'VesselName' => $request->VesselName,
                'GodownCode' => $request->GodownName,
                'GodownName' => $request->GodownCodeget,
                'CusCode' =>  $request->CusCode,
                'CustomerActCode' =>  $request->CustomerActCode,
            ]);

            $Events->save();

            return redirect('events-setups/update?EventNo=' . $Eventr)
                ->with('success', 'Your Event ' . $Eventr . ' With ' . $request->CustomerName . ' and ' . $request->VesselName . ' has been created successfully!');
        } else {
            return redirect('events-setup')->with('error',
                'Event already created with ' . $request->CustomerName . ' and Vessel ' . $request->VesselName .
                ' <a href="/events-setups/update?EventNo=' . $vessel_check_date->EventNo . '"> Show me </a> ');
        }
    } else {
        $Event->EventNo = $Eventr;
        $Event->GeneralVesselNote = $request->GeneralVesselNote;
        $Event->BranchCode = $BranchCode;
        $Event->ETA = $request->ETA;
        $Event->Contact = $request->Contact;
        $Event->Phone = $request->Phone;
        $Event->Cell = $request->Cell;
        $Event->BidDUeDate = $request->BidDUeDate;
        $Event->DueTime = $request->DueTime;
        $Event->ShippingPort = $request->ShippingPort;
        $Event->Note = $request->followup;
        $Event->Name = $request->Name;
        $Event->Email = $request->Email;
        $Event->Fax = $request->Fax;
        $Event->Status = $request->Status;
        $Event->ReturnVia = $request->ReturnVia;
        $Event->Priority = $request->Priority;
        $Event->Competition = null;
        $Event->CustomerCode = $request->CustomerCode;
        $Event->IMONo = $request->IMONo;
        $Event->Department = $request->Department;
        $Event->CustomerRef = $request->CustomerRef;
        $Event->BidDUeDate2 = $request->BidDUeDate2;
        $Event->ReturnVia2 = $request->ReturnVia2;
        $Event->EstLineQuote = $request->EstLineQuote;
        $Event->DueTme2 = $request->DueTme2;
        $Event->EventCreatedUser = Auth::user()->UserName;
        $Event->ContactID = $request->ContactID;
        $Event->SendProductListDate = null;
        $Event->CustomerName = $request->CustomerName;
        $Event->VesselName = $request->VesselName;
        $Event->GodownCode = $request->GodownCode;
        $Event->GodownName = $request->GodownName;
        $Event->CusCode = $request->CusCode;
        $Event->CustomerActCode = $request->CustomerActCode;

        $Event->update();
    }

    return redirect('events-setups/update?EventNo=' . $Eventr)
        ->with('success', 'Your Event ' . $Eventr . ' With ' . $request->CustomerName . ' and ' . $request->VesselName . ' has been updated successfully!');
}

    // public function event_store(EventRequest $request)
    // {
    //     $BranchCode = config('app.MBranchCode');
    //     $datestamp = date("Y-m-d");
    //     $timestamps = date("Y-m-d G:i:s");
    //     // dd($request->Phone);

 
    //     $vesselr = $request->VesselName;
    //     $Customerr = $request->CustomerName;
        
        
    //     $Eventr = $request->EventNo;

    //     if (empty($Eventr)) {
    //       // Auto-generate new EventNo
    //       $latest = modelevents::where('BranchCode', $BranchCode)->max('EventNo');
    //       $Eventr = $latest ? $latest + 1 : 1;
    //   }

    //     $Event = modelevents::where('EventNo', $Eventr)->where('BranchCode', $BranchCode)->first();
    //     if (!$Event) {
    //         // $vessel_check_date = modelevents::whereRaw('BidDUeDate>= DATEADD(month, -1, GetDate())')->where('VesselName',$vesselr)->where('CustomerName',$Customerr)->first();
    //         $vessel_check_date = modelevents::whereRaw('BidDueDate >= DATE_SUB(NOW(), INTERVAL 1 MONTH)')
    //             ->where('VesselName', $vesselr)
    //             ->where('CustomerName', $Customerr)
    //             ->first();
    //     }
    //     # code...
    //     if (!$Event) {
    //         if (!$vessel_check_date) {


    //             $Events = new modelevents([


    //                 'EventNo' =>  $request->EventNo,
    //                 'GeneralVesselNote' =>  $request->GeneralVesselNote,
    //                 ' BranchCode' => $BranchCode,
    //                 'BranchCode' => Auth::user()->BranchCode,
    //                 'ETA' =>  $request->ETA,
    //                 'Contact' =>  $request->Contact,
    //                 'Phone' =>  $request->Phone,
    //                 'Cell' =>  $request->Cell,
    //                 'BidDUeDate' =>  $request->BidDUeDate,
    //                 'DueTime' =>  $request->DueTime,
    //                 'ShippingPort' =>  $request->ShippingPort,
    //                 'Note' =>  $request->followup,
    //                 'Name' =>  $request->Name,
    //                 'Email' =>  $request->Email,
    //                 'Fax' =>  $request->Fax,
    //                 'Status' =>  $request->Status,
    //                 'ReturnVia' =>  $request->ReturnVia,
    //                 'Priority' =>  $request->Priority,
    //                 'Competition' =>  null,
    //                 'CustomerCode' => $request->Customercode,
    //                 'IMONo' =>  $request->IMONo,
    //                 'Department' =>  $request->Department,
    //                 'CustomerRef' =>  $request->CustomerRef,
    //                 'BidDUeDate2' =>  $request->BidDUeDate2,
    //                 'ReturnVia2' =>  $request->ReturnVia2,
    //                 'EstLineQuote' =>  $request->EstLineQuote,
    //                 'DueTme2' =>  $request->DueTme2,
    //                 'EventCreatedUser' => Auth::user()->UserName,
    //                 'EventCreatedDate' => $datestamp,
    //                 'EventCreatedTime' => $timestamps,
    //                 'ContactID' =>  $request->ContactID,
    //                 'SendProductListDate' =>  null,
    //                 //    'PVID' =>  0,
    //                 'CustomerName' =>  $request->CustomerName,
    //                 'VesselName' => $request->VesselName,
    //                 'GodownCode' => $request->GodownName,
    //                 'GodownName' => $request->GodownCodeget,
    //                 'CusCode' =>  $request->CusCode,
    //                 'CustomerActCode' =>  $request->CustomerActCode,
    //             ]);
    //             // dd($Events);
    //             $Events->save();
    //             return redirect('events-setups/update?EventNo=' . $Eventr)->with('success', 'Your Event ' . $Eventr . 'With' . $request->CustomerName . 'and' . $request->VesselName . ' has been Created successfully! ');
    //         } else {
    //             return redirect('events-setup')->with('error', 'Event Is Already Created ! With ' . $request->CustomerName . ' Customer and Vessel IS : ' . $request->VesselName . ' <a href="/events-setups/update?EventNo=' . $vessel_check_date->EventNo . '"> Showme </a> ');
    //         }
    //     } else {
    //         $datestamp = date("Y-m-d");

    //         $timestamps = date("Y-m-d G:i:s");

    //         $Event->EventNo = $request->EventNo;
    //         $Event->GeneralVesselNote = $request->GeneralVesselNote;
    //         $Event->BranchCode = $BranchCode;
    //         $Event->ETA = $request->ETA;
    //         $Event->Contact = $request->Contact;
    //         $Event->Phone = $request->Phone;
    //         $Event->Cell = $request->Cell;
    //         $Event->BidDUeDate =  $request->BidDUeDate;
    //         $Event->DueTime =  $request->DueTime;
    //         $Event->ShippingPort =  $request->ShippingPort;
    //         $Event->Note = $request->followup;
    //         $Event->Name = $request->Name;
    //         $Event->Email = $request->Email;
    //         $Event->Fax = $request->Fax;
    //         $Event->Status = $request->Status;
    //         $Event->ReturnVia = $request->ReturnVia;
    //         $Event->Priority = $request->Priority;
    //         $Event->Competition =  null;
    //         $Event->CustomerCode =  $request->CustomerCode;
    //         $Event->IMONo =  $request->IMONo;
    //         $Event->Department =  $request->Department;
    //         $Event->CustomerRef =  $request->CustomerRef;
    //         $Event->BidDUeDate2 =  $request->BidDUeDate2;
    //         $Event->ReturnVia2 =  $request->ReturnVia2;
    //         $Event->EstLineQuote =  $request->EstLineQuote;
    //         $Event->DueTme2 =  $request->DueTme2;
    //         $Event->EventCreatedUser = Auth::user()->UserName;
    //         $Event->ContactID =  $request->ContactID;
    //         $Event->SendProductListDate = null;
    //         // $Event->PVID=0;
    //         $Event->CustomerName =  $request->CustomerName;
    //         $Event->VesselName =  $request->VesselName;
    //         $Event->GodownCode =  $request->GodownCode;
    //         $Event->GodownName =  $request->GodownName;
    //         $Event->CusCode =  $request->CusCode;
    //         $Event->CustomerActCode =  $request->CustomerActCode;
    //         // dd($Event);

    //         $Event->update();
    //     }
    //     // }

    //     return redirect('events-setups/update?EventNo=' . $Eventr)->with('success', 'Your Event ' . $Eventr . 'With' . $request->CustomerName . 'and' . $request->VesselName . ' has been Updated successfully! ');
    // }

    public function quote_store(Request $request)
    {
        $MWorkUser = config('app.MUserName');
        $BranchCode = config('app.MBranchCode');
        $datestamp = date("Y-m-d");
        $timestamps = date("Y-m-d G:i:s");
        $gEventNo = $request->EventNo2;
        $eventfiller = modelevents::where('EventNo', $gEventNo)->where('BranchCode', $BranchCode)->first();
        if ($eventfiller) {

            $CustomerData = Customer::where('CustomerCode', $eventfiller->CustomerCode)->where('BranchCode', $BranchCode)->first();
        }
        $quote = Quote::where('QuoteNo', $request->QuoteNo)->where('BranchCode', $BranchCode)->first();
        if (!$quote) {
            info('new');
            $quote = new Quote;
        } else {
            info('old');
        }
        $quote->EventNo = $request->EventNo2;
        $quote->DepartmentName = $request->DepartmentName;
        $quote->DepartmentCode = $request->DepartmentCode;
        $quote->CustomerRefNo = $request->CustomerRef;
        $quote->BidDueDate = $request->BidDUeDate2;
        $quote->ReturnVia = $request->ReturnVia;
        $quote->EstLineQuote = $request->EstLineQuote;
        $quote->DueTime = $request->DueTme2 ?? null;

        // $quote->DueTime = $request->DueTme2;
        $quote->QuoteNo = $request->QuoteNo;
        $quote->WorkUser = $MWorkUser;
        $quote->AssignQuote = $request->WorkUser;
        $quote->BranchCode = $BranchCode;
        $quote->QDate = $datestamp;
        $quote->QTime = date('H:i:s');
        $quote->CreatedDate = date('Y-m-d');
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
        // dd($quote);

        $quote->save();






        return redirect('quotation?quote_no=' . $request->QuoteNo);
    }
    






// public function getEventMasterData(Request $request)
// {
//     $event_no = $request->input('event_no');
//     // $BranchCode = Auth::user()->BranchCode;

//     $BranchCode = config('app.MBranchCode');

//     try {
//         $event = Events::where('EventNo', $event_no)
//                       ->where('BranchCode', $BranchCode)
//                       ->first();

//         if (!$event) {
//             return response()->json(['error' => 'Event not '], 404);
//         }

//         // 👇 Fetch related contacts using CustomerCode
//         $contacts = \App\Models\CustomerContacts::where('CustomerCode', $event->CustomerCode)->get();

//         // ✅ Return proper JSON structure
//         return response()->json([
//             'event' => $event,
//             'contacts' => $contacts
//         ]);
//     } catch (\Exception $e) {
//         return response()->json(['error' => $e->getMessage()], 500);
//     }
// }


    public function deleteevent(Request $request)
    {
        $EventNo = $request->EventNo;
        if ($EventNo) {

            $deletequotes =  Quote::where('EventNo', $EventNo)->delete();
            if ($deletequotes) {
                info('QuoteDeleted');
            }
            $deleteenvent =  modelevents::where('EventNo', $EventNo)->delete();
        }
        if ($deleteenvent) {
            info('EventDeleted');

            return response()->json([
                'data' => $EventNo,
                'Code' => 'Success',
            ]);
        } else {

            return response()->json([
                'data' => $EventNo,
                'Code' => 'Error',
            ]);
        }
    }




// old update
    public function update(Request $request)
    {
        $EventNo = $request->EventNo;

        $branch = Auth::user()->BranchCode;
        $UserName = Auth::user()->UserName;
        
        

        $deptype = Typesetup::select('TypeCode', 'TypeName')->distinct()->where('BranchCode', $branch)->get();
        $userss = UserRights::select('UserName')->distinct()->get();
        $branch = Auth::user()->BranchCode;

        $lastQuote = Quote::where('BranchCode', $branch)->max('QuoteNo');
        if (!$lastQuote) {
            $lastQuote = 0;
        }
        $UserName = Auth::user()->UserName;






        return view('Events/update', [
            'deptype' => $deptype,
            'userss' => $userss,
            'branch' => $branch,
            'UserName' => $UserName,
            'lastQuote' => $lastQuote,
            'EventNo' => $EventNo,


        ]);
    }

    public function follow(Request $request)
    {
        if ($request->ajax()) {
            $output = "";
            $followps = DB::table('eventfollowup')->where('EventNo', '=', '' . $request->follow . "%")->get();
            if ($followps) {
                foreach ($followps as $key => $followp) {
                    $output .= '
                    <tr>' .

                        '<td id="' . $followp->FollowUp . '"  >' . $followp->FollowUp . '</td>' .
                        '<td id="' . $followp->Date . '" >' . $followp->Date . '</td>' .
                        '<td id="' . $followp->WorkUser . '" >' . $followp->WorkUser . '</td>' .

                        '</tr>';
                }
                return Response($output);
            }
        }
    }


    private function _eventno()
    {
        $lastid = modelevents::orderBy('EventNo')->first();
    }





}
