<?php

namespace App\Http\Controllers;

use PDO;
use Carbon\Carbon;
use App\Models\DMDetail;
use App\Models\FlipTovsn;
use App\Models\OrderModel;
use App\Models\GodownSetup;
use App\Models\QuoteDetails;
use Illuminate\Http\Request;
use App\Models\OrderMasterModel;
use App\Models\QryOrderMaster;
use App\Models\ShipingPortSetup;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use App\Models\PurchaseOrderDetail;
use App\Models\PurchaseOrderMaster;
use Illuminate\Support\Facades\Auth;

class VSN extends Controller
{
    public function index()
    {
        $BranchCode = Auth::user()->BranchCode;
        //FillGodown
        $Godown = GodownSetup::where('BranchCode', $BranchCode)->orderBy('GodownCode')->pluck('GodownName', 'GodownCode');
        $todayDate = date('Y-m-d');
        $StatusName = DB::table('statussetup')->where('BranchCode', $BranchCode)->orderBy('StatusCode')->get();
        $VSNLog = DB::table('vw_fliptovsn1')->where('BranchCode', $BranchCode)->where('DeliveryDate', '>=', $todayDate)->orderBy('DeliveryDate')->orderBy('Time')->orderBy('VSNNo')->get();

        return view('Activity.Vsn_log', [
            'Godown' => $Godown,
            'todayDate' => $todayDate,
            'StatusName' => $StatusName,
            'VSNLog' => $VSNLog,
        ]);
    }

    public function VsllogSerach(Request $request)
    {
        $MBranchCode = Auth::user()->BranchCode;
        $PVendorCode = config('app.PVendorCode');
        $Message = '';
        $Qry = $request->input('Qry');
        info($Qry);
            // $query = DB::table('VSNLog')->whereRaw($request->Qry);


            // $results = DB::table('vw_fliptovsn1')->where('BranchCode', $MBranchCode)->whereRaw($Qry)->orderBy('DeliveryDate')->orderBy('Time')->orderBy('VSNNo')->get();
            $results = DB::table('vw_fliptovsn1')->where('BranchCode', $MBranchCode)->whereRaw($Qry)->orderBy('DeliveryDate')->orderBy('Time')->orderBy('VSNNo');

            if ($results) {
                $Message = 'Success';
            }

            return DataTables::of($results)->make(true);
        // return response()->json([
        //     'Message' => $Message,
        //     'VSNLog' => $results,
        // ]);
    }

    public function ChargeListVsn(Request $request)
    {
        $BranchCode = Auth::user()->BranchCode;
        $VSN = $request->VSN;
        $Statut = DB::table('statussetup')->select(["StatusName", "StatusCode"])->where('BranchCode', $BranchCode)->orderBy("StatusName")->get();
        $Godown = GodownSetup::where('BranchCode', $BranchCode)->orderBy('GodownCode')->pluck('GodownName', 'GodownCode');
        $StatusName = DB::table('statussetup')->select('StatusName')->where('BranchCode', $BranchCode)->orderBy('StatusCode')->get();
        $ShipingPortSetup = ShipingPortSetup::where('BranchCode', $BranchCode)->orderBy('PortName')->get();
        $StatusSetup = DB::table('statussetup')->select('StatusName', 'StatusCode')->orderBy('StatusName')->get();

        return view('Activity.Charglistvsn', [
            'VSN' => $VSN,
            'Statut' => $Statut,
            'Godown' => $Godown,
            'StatusName' => $StatusName,
            'BranchCode' => $BranchCode,
            'ShipingPortSetup' => $ShipingPortSetup,
            'StatusSetup' => $StatusSetup,
        ]);
    }

    public function ChargeListBanksave(Request $request)
    {
        $BranchCode = Auth::user()->BranchCode;
        $table = $request->input('dataarray');
        $VSNNo = $request->input('VsnNo');
        $TxtBankInfo = $request->input('TxtBankInfo');
        $Message = 'start';
        for ($i = 0; $i < count($table); $i++) {
            $MChargeNo = $table[$i]['Charge'];
            $OrderMaster = OrderMasterModel::where('PONO', $MChargeNo)->where('VSNNo', $VSNNo)->where('BranchCode', $BranchCode)->first();
            $OrderMaster->BankInfo = $TxtBankInfo;
            $OrderMaster->save();
        }
        if ($OrderMaster) {
            $Message = 'Saved';
        } else {
            $Message = 'error';
        }
        return response()->json([
            'Message' => $Message,
        ]);
    }

    public function ChargeListVsnGet(Request $request)
    {
        $VSN = $request->input('VsnNo');
        $BranchCode = Auth::user()->BranchCode;
        $PVendorCode = config('app.PVendorCode');
        $todayDate = date('Y-m-d');
        $Masterdata = [];
        $ViewFTVANDVS = DB::table('viewftvandvs')->where('VSNNo', $VSN)->where('BranchCode', $BranchCode)->first();
        if ($ViewFTVANDVS) {
            $TxtAgentCode = strval($ViewFTVANDVS->AgentCode);
            $CmbAgentName = $ViewFTVANDVS->Agent;
            if ($TxtAgentCode == 0 && $CmbAgentName !== '') {
                $AgentSetup = DB::table('agentsetup')->select('CusCode', 'CustomerCode', 'PhoneNo', 'Faxno', 'emailaddress')->where('CustomerName', $CmbAgentName)->where('BranchCode', $BranchCode)->first();
                $FlipToVSN = FlipTovsn::where('VSNNo', $VSN)->where('BranchCode', $BranchCode)->first();
                $FlipToVSN->AgentCode = $AgentSetup->CustomerCode;
                $FlipToVSN->Agency = $AgentSetup->CusCode;
                $FlipToVSN->Agent = $ViewFTVANDVS->Agent;
                $FlipToVSN->AgentCPCode = $ViewFTVANDVS->AgentCPCode;
                $FlipToVSN->AgentCPName = $ViewFTVANDVS->AgentCPName;
                $FlipToVSN->save();
                $Masterdata[] = [
                    'AgentSetup' => $AgentSetup,
                    'ViewFTVANDVS' => $ViewFTVANDVS,
                ];
            } else {
                $Masterdata[] = [
                    'AgentSetup' => null,
                    'ViewFTVANDVS' => $ViewFTVANDVS,
                ];
            }
        }

        $Charge = DB::table('qrychargelist')->where('VSNNo', '=', $VSN)->get();
        $BankInfo = OrderMasterModel::where('BankInfo', '<>', null)->where('BranchCode', $BranchCode)->orderBy('PONo')->orderBy('DispatchDate', 'DESC')->first(['BankInfo']);

        return response()->json([
            'ViewFTVANDVS' => $ViewFTVANDVS,
            'Charge' => $Charge,
            'Masterdata' => $Masterdata,
            'BankInfo' => $BankInfo,
        ]);
    }

    public function chargelistDMShow(Request $request)
    {
        $VSN = $request->input('VsnNo');
        $BranchCode = Auth::user()->BranchCode;
        $PVendorCode = config('app.PVendorCode');
        $todayDate = date('Y-m-d');

        $DMDetail = DMDetail::select('POMadeNo', 'ChargeNo', 'VendorName', 'DepartmentName', 'WorkUser', 'DiscPerVendor')
            ->selectRaw('SUM(ReturnQty) as MReturnQty, SUM(ReturnCostAmt) as MReturnCostAmt, SUM(DMReturnQty) as DMReturnQty, SUM(DMReturnAmt) as DMReturnAmt, SUM(DMMissingQty) as DMMissingQty, SUM(DMMissingAmt) as DMMissingAmt, SUM(DMMoveToStock) as DMMoveToStock, SUM(DMMoveToStockAmt) as DMMoveToStockAmt')
            ->where('VSNNo', $VSN)
            ->where('BranchCode', $BranchCode)
            ->groupBy('POMadeNo', 'ChargeNo', 'VendorName', 'DepartmentName', 'WorkUser', 'DiscPerVendor')
            ->orderBy('ChargeNo')
            ->orderBy('POMadeNo')
            ->get();

        return response()->json([
            'DMDetail' => $DMDetail,
        ]);
    }

    public function chargelistPOShow(Request $request)
    {
        $VSN = $request->input('VsnNo');
        $BranchCode = Auth::user()->BranchCode;
        $PVendorCode = config('app.PVendorCode');
        $todayDate = date('Y-m-d');

        $VSNPO = [];
        $SPVSNPO = DB::table('qryvsnpo')
            ->join('purchaseorderdetail', 'qryvsnpo.PurchaseOrderNo', '=', 'purchaseorderdetail.PurchaseOrderNo')
            ->where('qryvsnpo.BranchCode', $BranchCode)
            ->where('qryvsnpo.VSNNo', $VSN)
            ->select(
                'qryvsnpo.*',
                DB::raw('SUM(purchaseorderdetail.RecQty * purchaseorderdetail.Price) as MMPOAmt')
            )
            ->groupBy('qryvsnpo.PurchaseOrderNo', 'qryvsnpo.ChargeNo', 'qryvsnpo.VSNNo', 'qryvsnpo.BranchCode')
            ->get();

        return response()->json([
            'SPVSNPO' => $SPVSNPO,
            'VSNPO' => $VSNPO,
        ]);
    }

    public function shipdr_OrderMaster(Request $request)
    {
        $BranchCode = Auth::user()->BranchCode;
        $MChargeNo = $request->MChargeNo;
        $TxtShipDate = $request->TxtShipDate;
        $TxtShipTime = $request->TxtShipTime;
        $TxtVSNNo = $request->TxtVSNNo;
        $MChkShipped = $request->isChecked;
        $OrderMaster = OrderMasterModel::where('PONO', $MChargeNo)->where('VSNNo', $TxtVSNNo)->where('BranchCode', $BranchCode)->first();
        if ($OrderMaster) {
            if ($MChkShipped == true) {
                $OrderMaster->ChkShipped = true;
                $OrderMaster->ShippedDate = $TxtShipDate;
                $OrderMaster->ShippedTime = $TxtShipTime;
            } else {
                $OrderMaster->ChkShipped = false;
                $OrderMaster->ShippedDate = null;
                $OrderMaster->ShippedTime = '';
            }
            $OrderMaster->save();
        }
        if ($OrderMaster) {
            $status = 'success';
        } else {
            $status = 'failed';
        }

        return response()->json([
            'status' => $status,
            'OrderMaster' => $OrderMaster,
            'MChargeNo' => $MChargeNo,
        ]);
    }

    public function ShipDRload(Request $request)
    {
        $MBranchCode = Auth::user()->BranchCode;
        $VSN = $request->input('VSNNO');
        $FlipToVSN = FlipToVSN::where('VSNNo', $VSN)->where('BranchCode', $MBranchCode)->first();
        $OrderMaster = OrderMasterModel::where('VSNNo', $VSN)->where('BranchCode', $MBranchCode)->orderBy('PONO')->first();

        // Get OrderMaster records
        $orderMasters = OrderMasterModel::where('VSNNo', $VSN)
            ->where('BranchCode', $MBranchCode)
            ->orderBy('PONO')
            ->get();

        $results = [];

        foreach ($orderMasters as $orderMaster) {
            $PONo = $orderMaster->PONo;

            // Get MOrderQty
            $mOrderQty = OrderModel::where('OrderQty', '>', 0)
                ->where('PONO', $PONo)
                ->where('VSNNo', $VSN)
                ->where('BranchCode', $MBranchCode)
                ->count('OrderQty');

            // Get MRecQty
            $mRecQty = OrderModel::where('RecQty', '>', 0)
                ->where('PONO', $PONo)
                ->where('VSNNo', $VSN)
                ->where('BranchCode', $MBranchCode)
                ->count('RecQty');

            // Get MDeliveredQty
            $mDeliveredQty = OrderModel::where('DeliveredQty', '>', 0)
                ->where('PONO', $PONo)
                ->where('VSNNo', $VSN)
                ->where('BranchCode', $MBranchCode)
                ->count('DeliveredQty');

            // Get MReturnQty
            $mReturnQty = OrderModel::where('ReturnQty', '>', 0)
                ->where('PONO', $PONo)
                ->where('VSNNo', $VSN)
                ->where('BranchCode', $MBranchCode)
                ->count('ReturnQty');

            // Get MMissingQty
            $mMissingQty = OrderModel::where('MissingQty', '>', 0)
                ->where('PONO', $PONo)
                ->where('VSNNo', $VSN)
                ->where('BranchCode', $MBranchCode)
                ->count('MissingQty');

            // Get MSoldQty
            $mSoldQty = OrderModel::where('SoldQty', '>', 0)
                ->where('PONO', $PONo)
                ->where('VSNNo', $VSN)
                ->where('BranchCode', $MBranchCode)
                ->count('SoldQty');

            // Get HasMate
            $hasMate = OrderModel::where('HasMate', '<>', '')
                ->where('PONO', $PONo)
                ->where('VSNNo', $VSN)
                ->where('BranchCode', $MBranchCode)
                ->select('HasMate')
                ->first();

            // Combine the results and OrderMaster data into an array for each OrderMaster row
            $result = [
                'OrderMaster' => $orderMaster,
                'PONo' => $PONo,
                'MOrderQty' => $mOrderQty,
                'MRecQty' => $mRecQty,
                'MDeliveredQty' => $mDeliveredQty,
                'MReturnQty' => $mReturnQty,
                'MMissingQty' => $mMissingQty,
                'MSoldQty' => $mSoldQty,
                'HasMate' => $hasMate
            ];

            $results[] = $result;
        }

        // Return the results as a JSON response
        return response()->json([
            'results' => $results,
            'FlipToVSN' => $FlipToVSN,
            'OrderMaster' => $OrderMaster,
        ]);
    }

    public function ShipDR(Request $request)
    {
        $VSN = $request->VSN;
        $BranchCode = Auth::user()->BranchCode;
        $Godown = GodownSetup::where('BranchCode', $BranchCode)->orderBy('GodownCode')->pluck('GodownName', 'GodownCode');
        $StatusName = DB::table('statussetup')->select('StatusName')->where('BranchCode', $BranchCode)->orderBy('StatusCode')->get();
        $Statut = DB::table('statussetup')->select(["StatusName", "StatusCode"])->where('BranchCode', $BranchCode)->orderBy("StatusName")->get();
        $ShipingPortSetup = ShipingPortSetup::where('BranchCode', $BranchCode)->orderBy('PortCode')->get();

        return view('ShipDr', [
            'Godown' => $Godown,
            'VSN' => $VSN,
            'StatusName' => $StatusName,
            'Statut' => $Statut,
            'ShipingPortSetup' => $ShipingPortSetup,
        ]);
    }
}
