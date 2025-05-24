<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use App\Models\Trans;

use App\Models\Events;
use App\Models\Customer;
use App\Models\DMDetail;
use App\Models\DMMaster;
use App\Models\FlipTovsn;
use App\Models\Typesetup;
use App\Models\OrderModel;
use App\Models\termssetup;
use App\Models\GodownSetup;
use App\Models\VenderSetup;
use App\Models\QuoteDetails;
use Illuminate\Http\Request;
use App\Models\InvoiceDetail;
use App\Models\FixAccountSetup;
use App\Models\CustomerDiscount;
use App\Models\OrderMasterModel;
use Illuminate\Support\Facades\DB;
use App\Models\DeliveryOrderMaster;
use App\Models\PurchaseOrderDetail;
use App\Models\PurchaseOrderMaster;
use App\Models\PurchaseOrderCreateTemp;
use Illuminate\Support\Facades\Auth;

class Order extends Controller
{
    public function TxtPONO_LostFocus(Request $request)
    {
        $MBranchCode = Auth::user()->BranchCode;
        $Txtpono = $request->input('Txtpono');
        $OrderMaster = OrderMasterModel::where('PONO', $Txtpono)->where('BranchCode', $MBranchCode)->first();
        $OrderDetails = OrderModel::where('PONO', $Txtpono)->where('BranchCode', $MBranchCode)->orderBy('SNO')->get();
        // info($OrderDetails);
        $flipToVSN = FlipToVSN::where('VSNNo', $Txtpono)->where('BranchCode', $MBranchCode)->select('IMONo', 'CustomerName', 'VesselName', 'CustomerCode')->first();
        return response()->json([
            'OrderMaster' => $OrderMaster,
            'FlipToVSN' => $flipToVSN,
            'OrderDetail' => $OrderDetails,
        ]);

    }
    public function OrderDataGetQuote(Request $request)
    {
        $MBranchCode = Auth::user()->BranchCode;
        $QuoteNo = $request->input('QuoteNo');
        $QuoteMaster = Quote::where('QuoteNo', $QuoteNo)->where('BranchCode', $MBranchCode)->first();
        if ($QuoteMaster) {
            $VSNNo = $QuoteMaster->VSNNo;
            $TxtPONO = $QuoteMaster->FlipOrderNo;
        } else {
            $VSNNo = $request->input('VSNNo');
            $TxtPONO = $request->input('TxtPONO');
        }

        $FlipToVSN = FlipTovsn::where('VSNNo', $VSNNo)->where('BranchCode', $MBranchCode)->first(['IMONo', 'CustomerName']); // Specify only necessary fields
        $OrderDetail = OrderModel::where('PONO', $TxtPONO)->where('BranchCode', $MBranchCode)->orderBy('SNO')->get(['field1', 'field2']); // Specify only necessary fields
        // $Orders = DB::select('CALL SPQuoteDetailShowOrderForm(?, ?)', [
        //     $MBranchCode,
        //     $QuoteNo,
        // ]);
        // $Orders = DB::select("SELECT * FROM QRYQuotedetailShowOrderForm WHERE QuoteNo = ? AND BranchCode = ? ORDER BY SNo", [$QuoteNo, $MBranchCode]);
        $Orders = DB::table('qryquotedetailshoworderform')
            ->select('field1', 'field2') // Specify only necessary fields
            ->where('BranchCode', $MBranchCode)
            ->where('QuoteNo', $QuoteNo)
            ->get();

        // $Orders = DB::select('CALL SPQuoteDetailShowOrderForm(?, ?)', [
        //     $MBranchCode,
        //     $QuoteNo,
        // ]);
        info($OrderDetail);
        return response()->json([
            'QuoteMaster' => $QuoteMaster,
            'FlipToVSN' => $FlipToVSN,
            'OrderDetail' => $OrderDetail,
            'Orders' => $Orders,
        ]);
    }
    public function OrderDataGetEvent(Request $request)
    {
        $MBranchCode = Auth::user()->BranchCode;
        $EventNO = $request->input('EventNo');

        $RsMoves = Quote::select('QuoteNo', 'VSNNo', 'GodownCode', 'GodownName')->where('ChkFlip', 1)->where('EventNo', $EventNO)->where('VSNNo', '>', 0)->where('BranchCode', $MBranchCode)->orderBy('QuoteNo')->get();
        $RsMove = Quote::select('QuoteNo', 'VSNNo', 'GodownCode', 'GodownName')->where('ChkFlip', 1)->where('EventNo', $EventNO)->where('VSNNo', '>', 0)->where('BranchCode', $MBranchCode)->orderBy('QuoteNo')->first();

        if ($RsMoves) {
            $LblNoOfFliped = count($RsMoves);
        }
        return response()->json([
            'EventNO' => $EventNO,
            'RsMove' => $RsMove,
            'RsMoves' => $RsMoves,
            'LblNoOfFliped' => $LblNoOfFliped,
        ]);
    }
    public function index(Request $request)
    {
        $EventNo = $request->EventNo;
        $QuoteNo = $request->QuoteNo;
        $BranchCode = Auth::user()->BranchCode;
        $Terms = termssetup::distinct()->get(['Terms', 'Days']); // Specify only necessary fields
        $warehouse = GodownSetup::distinct()->get(['GodownCode', 'GodownName', 'PrinterName']); // Specify only necessary fields
        $deptype = Typesetup::where('BranchCode', $BranchCode)->orderBy('TypeCode')->get(['TypeCode', 'TypeName']); // Specify only necessary fields


        // $Orders = DB::select(DB::raw("exec SPQuoteDetailShowOrderForm '$BranchCode','$QuoteNo'"));
        // $Orders = DB::select('CALL SPQuoteDetailShowOrderForm(?, ?)', [
        //     $BranchCode,
        //     $QuoteNo,
        // ]);


        return view('Order', [
            'Terms' => $Terms,
            // 'Orders' => $Orders,
            'QuoteNo' => $QuoteNo,
            'EventNo' => $EventNo,
            'warehouse' => $warehouse,
            'deptype' => $deptype,
        ]);
    }




    // public function Checktermsordersave(Request $request){
//     $BranchCode = Auth::user()->BranchCode;
//     $TxtPONO = $request->input('Charge');
//     $TxtTerms = $request->input('Terms');

    //     $Terms = OrderMasterModel::select('Terms')->where('PONo',$TxtPONO)->where('BranchCode',$BranchCode)->first();
//     if($Terms){
//         if($Terms->Terms !== $TxtTerms){
//             $Message = 'Changed Terms!';
//             return response()->json([
//                 'message'=>$Message,
//             ]);
//         }
//     }

    // }
    private function AddNEw()
    {
        $BranchCode = Auth::user()->BranchCode;
        $MPONo1 = OrderMasterModel::where('BranchCode', $BranchCode)->max('PONO');
        if (intval($MPONo1) > 0) {
            $TxtPONO = intval($MPONo1) + 1;
        } else {
            $TxtPONO = 1;
        }
        return $TxtPONO;
    }
    public function ordersave(Request $request)
    {
        $MWorkUser = Auth::user()->UserName;

        $BranchCode = Auth::user()->BranchCode;
        $TxtPurchaseOrderNo = $request->input('TxtPurchaseOrderNo');
        $TxtPONO = $request->input('Charge');
        $TxtTerms = $request->input('Terms');
        $quoteno = $request->input('Quote');
        $TxtQuoteNo = $request->input('Quote');
        $Vsn = $request->input('Vsn');
        $Eventno = $request->input('Event');
        $OrderDate = $request->input('OrderDate');
        // info($quoteno);
        // info($Eventno);
        $PONO = OrderMasterModel::select('PONo')->where('PurchaseOrderNo', $TxtPurchaseOrderNo)->where('PONo', $TxtPONO)->where('BranchCode', $BranchCode)->first();
        if ($PONO) {
            $MMPURORDERNO = $PONO->PONo;
            $Message = 'Cust PO Already Exist! This Cust PO #  already exist in this PONo : ' . $MMPURORDERNO;
            return response()->json([
                'Message' => 'Already',
                'Text' => $Message,
            ]);
        }
        // info($TxtPONO);


        try {

            // info('start');
            if (intval($TxtPONO) == 0) {
                $TxtPONO = $this->AddNEw();
            }
            $Rs = OrderMasterModel::where('PONo', $TxtPONO)->where('BranchCode', $BranchCode)->first();
            if (!$Rs) {
                $Rs = new OrderMasterModel();
                $Rs->PONo = $TxtPONO;
            }
            // info('OrderMasterModel');

            $Rs->VSNNo = intval($Vsn);
            $Rs->EventNo = intval($Eventno);
            $Rs->QuoteNo = intval($request->input('Quote'));
            $Rs->OrderDate = $OrderDate;
            $Rs->Department = $request->input('Department');
            $Rs->DepartmentName = $request->input('DepartmentName');
            $Rs->CustomerCode = intval($request->input('txtCustomerCode'));
            $Rs->PurchaseOrderNo = $request->input('TxtPurchaseOrderNo');
            $Rs->CustomerRefNo = $request->input('custref');
            $Rs->ExtAmount = intval($request->input('LblTotal'));
            $Rs->EstLines = intval($request->input('LblNoOfItems'));
            $Rs->BranchCode = intval($BranchCode);
            $Rs->CustomerName = $request->input('CustomerName');
            $Rs->VEsselName = $request->input('VesselName');
            $Rs->Terms = $request->input('Terms');
            $Rs->OrderQty = intval($request->input('LblNoOfItems'));
            // $Rs->BContactPerson =  $request->input('Vsn');
            // $Rs->BillingAddress =  $request->input('Vsn');
            $Rs->GodownCode = intval($request->input('Godown'));
            $Rs->GodownName = $request->input('GodownName');
            $Rs->VesselCode = intval($request->input('VesselCode'));

            $MSTATUS = $Rs->Status ? $Rs->Status : '';
            if ($MSTATUS == '') {
                $Rs->Status = 'ORDER RECEIVED';
                $Rs->StatusCode = 1;
                $Rs->StatusColorCode = '-8323200';
            }
            $Rs->BranchCode = $BranchCode;
            $Rs->Terms = $request->input('Terms');
            $Rs->InvDiscPer = $request->input('txtDiscount');
            $Rs->save();




            // $EventNo = $request->input('Event');
            $data = $request->input('datat');
            if ($data) {
                $RowCount = count($data);
                // info($data);
            }




            foreach ($data as $row) {
                $MItemName = $row['ItemName'];
                $MOrderQty = $row['OrderQty'];
                $SNo = $row['SNo'];
                $IMPAItemCode = $row['IMPAItemCode'];
                $ItemCode = $row['ItemCode'];
                $Qty = $row['Qty'];
                $PUOM = $row['PUOM'];
                $Price = $row['Price'];
                $Total = $row['Total'];
                $HasMate = $row['HasMate'];

                if (strlen(trim($MItemName)) > 0 && floatval($MOrderQty) > 0) {
                    $MMID = $row['ID'];
                    // Your code here
                    // Find existing or create a new OrderModel instance
                    $Orderdetails = OrderModel::where('PONO', $TxtPONO)
                        ->where('ID', $MMID)
                        ->where('BranchCode', $BranchCode)
                        ->first(); // Use firstOrNew to create if not found
                    // info('Orderdetails');
                    if (!$Orderdetails) {
                        $Orderdetails = new OrderModel();
                    }
                    $Orderdetails->SNo = (int) $SNo;
                    $Orderdetails->PONO = (int) $TxtPONO;
                    $Orderdetails->VSNNo = (int) $Vsn;
                    $Orderdetails->EventNo = (int) $Eventno;
                    $Orderdetails->QuoteNo = (int) $TxtQuoteNo;
                    $Orderdetails->DepartmentName = $request->input('DepartmentName');
                    $Orderdetails->ItemCode = $ItemCode;
                    $Orderdetails->Qty = (float) $Qty;
                    $Orderdetails->PUOM = $PUOM;
                    $Orderdetails->ItemName = $MItemName;
                    $Orderdetails->OrderQty = (float) $MOrderQty;

                    $MNotRecQty = intval($Orderdetails->OrderQty ?? 0) - intval($Orderdetails->RecQty ?? 0) + intval($Orderdetails->PullQty ?? 0);

                    if (intval($MNotRecQty) > 0) {
                        $Orderdetails->NotRecQty = round(intval($MNotRecQty), 2);
                        $Orderdetails->OverQty = 0;
                    } else {
                        $Orderdetails->NotRecQty = 0;
                        $Orderdetails->OverQty = round(intval($MNotRecQty), 2);
                    }

                    $Orderdetails->Price = (float) $Price;
                    $Orderdetails->EstPrice = (float) $Total;
                    $Orderdetails->QID = (int) $row['QID'];
                    $Orderdetails->STKBuyOut = $row['stk'];
                    $Orderdetails->ProductName = $row['ProductName'];
                    $Orderdetails->Freight = (float) $row['Freight'];
                    $Orderdetails->GPAmount = (float) $row['GPAmount'];
                    $Orderdetails->VendorName = $row['VendorName'];
                    $Orderdetails->VendorPrice = (float) $row['VendorPrice'];
                    $Orderdetails->OurPrice = (float) $row['OurPrice'];
                    $Orderdetails->OriginName = $row['OriginName'];
                    $Orderdetails->VPart = $row['VPart'];
                    $Orderdetails->CustomerNotes = $row['CustomerNotes'];
                    $Orderdetails->VendorNotes = $row['VendorNotes'];
                    $Orderdetails->InternalBuyerNotes = $row['InternalBuyerNotes'];
                    $Orderdetails->VendorCode = (int) $row['VendorCode'];
                    $Orderdetails->VCategoryName = $row['VCategoryName'];
                    $Orderdetails->GPRate = !empty($row['GPRate']) ? (float) $row['GPRate'] : null;
                    $Orderdetails->LastDate = $row['LastDate'];
                    $Orderdetails->Alternative = $row['Alternative'];
                    $Orderdetails->OurUOM = $row['OurUOM'];
                    $Orderdetails->DiscIncomePer = !empty($row['DiscIncomePer']) ? (float) $row['DiscIncomePer'] : null;
                    $Orderdetails->DiscIncomeAmt = !empty($row['DiscIncomeAmt']) ? (float) $row['DiscIncomeAmt'] : null;
                    $Orderdetails->IMPA = $IMPAItemCode;
                    $Orderdetails->PoMadeNo = (int) $row['PoMadeNo'];
                    $Orderdetails->PoMadeDate = $row['PoMadeDate'];
                    $MChk = $row['MChk'];

                    $Orderdetails->ChkBuy = !empty($MChk) ? true : false;

                    $Orderdetails->Workuser = $row['Workuser'];
                    $Orderdetails->BranchCode = (int) $BranchCode;
                    $Orderdetails->FreightRate = !empty($row['FreightRate']) ? (float) $row['FreightRate'] : null;
                    $Orderdetails->HasmateNo = $row['HasmateNo'];
                    $Orderdetails->HasmateWeight = $row['HasmateWeight'];
                    $Orderdetails->HasMate = $HasMate;
                    $Orderdetails->GodownCode = $request->input('Godown');
                    $Orderdetails->GodownName = $request->input('GodownName');
                    $Orderdetails->save();

                }
            }

            $QuoteMasterupdate = DB::table('quotemaster')
                ->where('QuoteNo', $TxtQuoteNo)
                ->where('BranchCode', intval($BranchCode))
                ->update([
                    'FlipOrderNo' => intval($TxtPONO),
                    'VSNNo' => $Vsn,
                    'FlipDate' => $OrderDate,
                    'FlippedAmount' => intval($request->input('LblTotal')),
                    'Status' => 'ORDER RECEIVED',
                    'StatusColorCode' => '-8323200',
                    'StatusCode' => 5,
                ]);
            if ($QuoteMasterupdate) {
                info('QuoteMasterupdate Succes');
            }


            $result = OrderMasterModel::select(DB::raw('SUM(ExtAmount) as MValue'), DB::raw('COUNT(VSNNo) as MNoOfFlipped'))
                ->where('VSNNo', $Vsn)
                ->where('BranchCode', intval($BranchCode))
                ->first();
            if ($result) {
                // Access the results
                $TotalFlipedAmount = $result->MValue;
                $MNoOfFliped = $result->MNoOfFlipped;
            } else {
                $TotalFlipedAmount = 0;
                $MNoOfFliped = 0;

            }
            $FlipToVSNupdate = FlipTovsn::where('VSNNo', intval($Vsn))
                ->where('BranchCode', intval($BranchCode))
                ->update([
                    'FlipAmount' => intval($TotalFlipedAmount),
                    'TotalFlip' => intval($MNoOfFliped),
                ]);
            if ($FlipToVSNupdate) {
                info('FlipToVSN update succes');

            }

            $Rs1 = OrderMasterModel::where('VSNNo', intval($Vsn))
                ->where('PONO', intval($TxtPONO))
                ->where('BranchCode', intval($BranchCode))
                ->first();
            // info('OrderMasterModel2');

            $Rs2 = Quote::where('EventNo', $Eventno)
                ->where('QuoteNo', $TxtQuoteNo)
                ->where('BranchCode', intval($BranchCode))
                ->first();
            // info($Rs2);

            if ($Rs1) {
                // if($Rs2){
                // info('OrderMasterModel5');

                $Rs1->EventNo = $Eventno;
                $Rs1->QuoteNo = $TxtQuoteNo;
                $Rs1->VSNNo = $Vsn;
                $Rs1->PONO = $TxtPONO;
                $Rs1->DepartmentCode = $Rs2->DepartmentCode;
                $Rs1->DepartmentName = $request->input('DepartmentName');
                $Rs1->Department = $request->input('Department');
                $Rs1->Terms = $request->input('Terms');
                $Rs1->CustomerRefNo = $Rs2->CustomerRefNo;
                $Rs1->Oe = $Rs2->Oe;
                $Rs1->Buyer = $Rs2->Buyer;
                $Rs1->ReturnVia = $Rs2->ReturnVia;
                $Rs1->EstLineQuote = intval($RowCount);
                $Rs1->CstItems = $Rs2->CstItems;
                $Rs1->PricingItems = $Rs2->PricingItems;
                $Rs1->CustomerName = $request->input('CustomerName');
                $Rs1->VesselName = $request->input('VesselName');
                $Rs1->BidDueDate = $Rs2->BidDueDate;
                $Rs1->DueTime = $Rs2->DueTime;
                $Rs1->DiscPer = $Rs2->DiscPer;
                $Rs1->GSTPer = $Rs2->GSTPer;
                $Rs1->QDate = $Rs2->QDate;
                $Rs1->QTime = $Rs2->QTime;
                $Rs1->BranchCode = intval($BranchCode);
                $Rs1->ChkQuoteEntry = $Rs2->ChkQuoteEntry;
                $Rs1->ChkCosting = $Rs2->ChkCosting;
                $Rs1->ChkPricing = $Rs2->ChkPricing;
                $Rs1->QsentDate = $Rs2->QsentDate;
                $Rs1->QSenttime = $Rs2->QSenttime;
                $Rs1->Header = $Rs2->Header;
                $Rs1->EstLineQuote = $Rs2->EstLineQuote;
                $Rs1->ValueAmount = intval($request->input('LblTotal'));
                $Rs1->CostAmount = $Rs2->CostAmount;
                $Rs1->GPAmount = $Rs2->GPAmount;
                $Rs1->CustCode = $Rs2->CustCode;
                $Rs1->Freight = $Rs2->Freight;
                $Rs1->GivenDisc = $Rs2->GivenDisc;
                $Rs1->AgentCode = $Rs2->AgentCode;
                $Rs1->AgentName = $Rs2->AgentName;
                $Rs1->AgentPer = $Rs2->AgentPer;
                $Rs1->VendorDiscPer = $Rs2->VendorDiscPer;
                $Rs1->CrNotePer = $Rs2->CrNotePer;
                $Rs1->AVIRebatePer = $Rs2->AVIRebatePer;
                $Rs1->AgentCommPer = $Rs2->AgentCommPer;
                $Rs1->SlsCommPer = $Rs2->SlsCommPer;
                $Rs1->CrNoteAmount = $Rs2->CrNoteAmount;
                $Rs1->AVIRebateAmt = $Rs2->AVIRebateAmt;
                $Rs1->AgentCommAmt = $Rs2->AgentCommAmt;
                $Rs1->SlsCommAmt = $Rs2->SlsCommAmt;

                if (empty($Rs1->Status)) {
                    $Rs1->Status = "ORDER RECEIVED";
                    $Rs1->StatusCode = 1;
                    $Rs1->StatusColorCode = "-8323200";
                }

                $Rs1->WorkUser = $MWorkUser;

                $Rs1->save();
                // }
                if ($Rs1) {
                    // info('OrderMasterModel re saves');
                }
            }

            // foreach ($data as $row){
            //     $MMSNo = $row['SNo'];
            //     $MItemName = $row['ItemName'];
            //     // info($MMSNo);
            //     // info($data);
            //     // info($MItemName);
            //     // info($Eventno);
            //     // info($TxtQuoteNo);
            //     // info($BranchCode);
            //     if ($MItemName !== '') {
            //         $Rs3 = QuoteDetails::whereRaw('Qty > 0')
            //             ->where('SNo', intval($MMSNo))
            //             ->where('EventNo', intval($Eventno))
            //             ->where('QuoteNo', intval($TxtQuoteNo))
            //             ->where('BranchCode', intval($BranchCode))
            //             ->first();
            //         // info($Rs3);
            //         if ($Rs3) {

            //             $MItemName = $Rs3->ItemName;
            //             $MMID = $Rs3->Id;
            //             // info($MItemName);
            //             // info($MMID);
            //             $Rs4 = OrderModel::where('QID', intval($MMID))
            //                 ->where('PONO', intval($TxtPONO))
            //                 ->where('BranchCode', intval($BranchCode))
            //                 ->first();
            //             info($Rs4);
            //             if (!$Rs4) {
            //                 $Rs4 = new OrderModel;


            //                 $Rs4->SNO = $MMSNo;
            //                 $Rs4->PONO = intval($TxtPONO);
            //             }
            //             // info($Rs4);

            //             $Rs4->VSNNO = $Vsn;
            //             $Rs4->PONO = $TxtPONO;
            //             $Rs4->QuoteNo = $TxtQuoteNo;
            //             $Rs4->EventNo = $Eventno;
            //             $Rs4->OrderDate = $OrderDate;
            //             $Rs4->QDate = $Rs3->QDate;
            //             $Rs4->CustomerName = $request->input('CustomerName');
            //             $Rs4->VesselName = $request->input('VesselName');
            //             $Rs4->DepartmentName = $request->input('DepartmentName');
            //             $Rs4->QID = intval($row['QID']);
            //             $Rs4->LastDate = $row['LastDate'] ? $row['LastDate'] : null;
            //             $Rs4->SNO = $MMSNo;
            //             $MSalePrice = $Rs3->SuggestPrice ? $Rs3->SuggestPrice : '';
            //             $Rs4->ItemCode = $row['ItemCode'];
            //             $Rs4->ItemName = $row['ItemName'];
            //             $Rs4->ProductName = $row['ProductName'];
            //             $Rs4->Qty = $row['Qty'];
            //             $Rs4->PUOM = $row['PUOM'];
            //             $Rs4->Freight = $row['Freight'];
            //             $Rs4->SuggestPrice = $row['OurPrice'];
            //             $Rs4->Total = $row['Price'] * $row['OrderQty'];
            //             $MSaleAmt = $row['Price'] * $row['OrderQty'];
            //             $Rs4->OrderQty = (float) $row["OrderQty"];
            //             $Rs4->Price = (float) $row["Price"];
            //             $Rs4->EstPrice = (float) $MSaleAmt;
            //             $MCostAmt = (float) $row["VendorPrice"] * (float) $row["OrderQty"];
            //             $MGPAmount = (float) $MSaleAmt - (float) $MCostAmt + (float) $row['Freight'];
            //             $Rs4->GPAmount = $MGPAmount;
            //             $MGPPer = $MGPAmount / (($MSaleAmt == 0) ? 1 : $MSaleAmt) * 100;
            //             $Rs4->GpRate = $MGPPer;
            //             $Rs4->TotalCost = intval($MCostAmt);
            //             $Rs4->VendorName = $row["VendorName"];
            //             $Rs4->VendorCode = intval($row["VendorCode"]);
            //             $Rs4->VendorPrice = ($Rs3->VendorPrice) ? 0 : floatval($Rs3->VendorPrice);
            //             $Rs4->OurPrice = ($Rs3->OurPrice) ? 0 : floatval($Rs3->OurPrice);
            //             $Rs4->OriginName = $row["OriginName"];
            //             $Rs4->VPart = $row["VPart"];
            //             $Rs4->CustomerNotes = $row["CustomerNotes"];
            //             $Rs4->VendorNotes = $row["VendorNotes"];
            //             $Rs4->InternalBuyerNotes = $row["InternalBuyerNotes"];
            //             $Rs4->VCategoryName = $row["VCategoryName"];
            //             $Rs4->LastDate = $Rs3->LastDate;
            //             $Rs4->VendorPartNo = $Rs3->VendorPartNo;
            //             $Rs4->Alternative = $Rs3->Alternative;
            //             $Rs4->OurUOM = $Rs3->OurUOM;
            //             $Rs4->DiscIncomePer = $Rs3->DiscIncomePer;
            //             $Rs4->DiscIncomeAmt = $Rs3->DiscIncomeAmt;
            //             $Rs4->IMPA = $Rs3->IMPA;
            //             $Rs4->IMPAItemCode = $Rs2->IMPAItemCode;
            //             $Rs4->Updated = $Rs3->Updated;
            //             $Rs4->STKBuyOut = $Rs3->STKBuyOut;
            //             $Rs4->AgentCode = $Rs3->AgentCode;
            //             $Rs4->AgentName = $Rs3->AgentName;
            //             $Rs4->AgentPer = $Rs3->AgentPer;
            //             $Rs4->UpdatedDate = $Rs3->UpdatedDate;
            //             $Rs4->FreightRate = $Rs3->FreightRate;
            //             $Rs4->HasmateNo = $Rs3->HasmateNo;
            //             $Rs4->HasmateWeight = $Rs3->HasmateWeight;
            //             $Rs4->HasMate = $Rs3->HasMate;
            //             $Rs4->OverCommitQty = $Rs3->OverCommitQty;
            //             $Rs4->BranchCode = intval($BranchCode);
            //             // info($Rs4);
            //             $Rs4->save();

            //             if ($Rs4) {
            //                 // info('OrderModel re save');

            //             }

            //         }

            //     }

            // }








            return response()->json([
                'success' => 'Order has been updated successfully!',
                'Message' => 'success',
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Order Not updated Check Again' . $e->getMessage(),
                'Message' => 'Failed',
            ]);

        }

    }









    public function orderentry(Request $request)
    {
        $BranchCode = config('app.MBranchCode');
        $Order_no = $request->Order_no;
        $Orderno = $request->Order_no;
        $Order_no = ($Order_no ? $Order_no : '');
        return view('Activity.OrderEntry', [
            'Order_no' => $Order_no,
            'quotno' => $Orderno,
            'BranchCode' => $BranchCode,
        ]);

    }


    // public function Orderget(Request $request)
    // {

    //     $BranchCode = config('app.MBranchCode');
    //     $PONO = $request->input('Orderno');
    //     // info($PONO);
    //     $quotesdetails = DB::table('orderdetail')->where('PONO', $PONO)->where('BranchCode', $BranchCode)->OrderBy('SNo')->get();
    //     $DataQuotesMaster = OrderMasterModel::where('PONo', $PONO)->where('BranchCode', $BranchCode)->first();
    //     $depcode = $DataQuotesMaster->DepartmentCode;
    //     // info($depcode);
    //     $eventno = $DataQuotesMaster->EventNo;
    //     $TypeSetup = Typesetup::where('TypeCode', $depcode)->first();
    //     $CustomerCode = $DataQuotesMaster->CustomerCode;
    //     $Customerdicount = CustomerDiscount::where('CustomerCode', $CustomerCode)->where('DepartmentCode', $depcode)->first();

    //     $EventData = Events::where('EventNo', $eventno)->where('BranchCode', $BranchCode)->first();
    //     $warehouse = GodownSetup::select('GodownCode', 'GodownName')->distinct()->get();
    //     // info($depcode);
    //     $department = DB::table('QryVendorDepartment')->where(function ($query) {
    //         $query->where('ChkInactive', 0)
    //             ->orWhereNull('ChkInactive');
    //     })
    //         ->where('ChkSelect', 1)
    //         ->where('TypeCode', $depcode)
    //         ->where('BranchCode', $BranchCode)
    //         ->select('VenderName', 'VenderCode')
    //         ->distinct()
    //         ->orderBy('VenderName')
    //         ->get();

    //     return response()->json([
    //         'quotesdetails' => $quotesdetails,
    //         'DataQuotesMaster' => $DataQuotesMaster,
    //         'TypeSetup' => $TypeSetup,
    //         'Customerdicount' => $Customerdicount,
    //         'EventData' => $EventData,
    //         'vendors' => $department,
    //         'warehouse' => $warehouse,

    //     ]);

    // }
    
    
public function Orderget(Request $request)
{
   $BranchCode = Auth::user()->BranchCode;
    $QuoteNo = $request->input('Orderno');

    $DataQuotesMaster = DB::table('qryquotemasteropen')
        ->where('QuoteNo', $QuoteNo)
        ->where('BranchCode', $BranchCode)
        ->first();

    if (!$DataQuotesMaster) {
        return response()->json([
            'message' => 'Attempt to read property "DepartmentCode" on null'
        ], 500);
    }

    $depcode = $DataQuotesMaster->DepartmentCode;
    $eventno = $DataQuotesMaster->EventNo;
    $CustomerCode = $DataQuotesMaster->CustCode;

    $quotesdetails = DB::table('quotedetails')
        ->where('QuoteNo', $DataQuotesMaster->QuoteNo)
        ->where('BranchCode', $BranchCode)
        ->orderBy('SNo')
        ->get();

    $TypeSetup = DB::table('typesetup')->where('TypeCode', $depcode)->first();

    $Customerdicount = DB::table('customerdiscount')
        ->where('CustomerCode', $CustomerCode)
        ->where('DepartmentCode', $depcode)
        ->first();

    $EventData = DB::table('eventinvoice')
        ->where('EventNo', $eventno)
        ->where('BranchCode', $BranchCode)
        ->first();

    $warehouse = DB::table('qrygodownsetup')->select('GodownCode', 'GodownName')->distinct()->get();

    $vendors = DB::table('qryvendordepartment')
        ->where(function ($query) {
            $query->where('ChkInactive', 0)->orWhereNull('ChkInactive');
        })
        ->where('ChkSelect', 1)
        ->where('TypeCode', $depcode)
        ->where('BranchCode', $BranchCode)
        ->select('VenderName', 'VenderCode')
        ->distinct()
        ->orderBy('VenderName')
        ->get();

    return response()->json([
        'quotesdetails' => $quotesdetails,
        'DataQuotesMaster' => $DataQuotesMaster,
        'TypeSetup' => $TypeSetup,
        'Customerdicount' => $Customerdicount,
        'EventData' => $EventData,
        'vendors' => $vendors,
        'warehouse' => $warehouse,
    ]);
}


    public function OrderItemsave(Request $request)
    {
        $BranchCode = Auth::user()->BranchCode;
        $TableData = $request->dataarray;
        $allcom = $request->allcom;
        for ($i = 0; $i < count($TableData); $i++) {

            $insert_update = [];
            // info($TableData[$i]['snoCell']);
            $insert_update["EventNo"] = $event_no = (int) $request->event_no;
            $insert_update["QuoteNo"] = $quote_no = (int) $request->Order_no;
            $insert_update["ItemCode"] = $item_code = $TableData[$i]['itemCodeCell'];
            //$insert_update["Id"] = 1075709;
            if ($item_code == null) {
                info('null hai re baba');


            }
            $insert_update["BranchCode"] = $BranchCode;
            $insert_update["SNo"] = $TableData[$i]['snoCell'];
            $insert_update["ItemName"] = $TableData[$i]['item_descCell'];
            $insert_update["IMPA"] = $TableData[$i]['impaCell'];
            $insert_update["PUOM"] = $TableData[$i]['uomCell'];
            $insert_update["Qty"] = $TableData[$i]['qtyCell'];
            $insert_update["VendorName"] = $TableData[$i]['vendorNameCell'];
            $insert_update["VendorCode"] = $TableData[$i]['vendor_codeCell'];
            $insert_update["VendorPrice"] = $TableData[$i]['vendorpriceCell'];
            $insert_update["Cost"] = $TableData[$i]['vendorpriceCell'];
            $insert_update["SuggestPrice"] = $TableData[$i]['sell_priceCell'];
            $insert_update["Total"] = $TableData[$i]['totalCell'];
            $insert_update["CustomerNotes"] = $TableData[$i]['customer_notesCell'];
            $insert_update["VendorNotes"] = $TableData[$i]['notesCell'];
            $insert_update["InternalBuyerNotes"] = $TableData[$i]['internal_notesCell'];
            // $insert_update["VesselNote"] = $TableData[$i]['vessel_notesCell'];
            info($insert_update);

            $status = DB::table('orderdetail')
                ->updateOrInsert(
                    ['QuoteNo' => $quote_no, 'EventNo' => $event_no, 'ItemCode' => $item_code],
                    $insert_update
                );




        }
        $message = '';

        if ($status == true) {
            $message = 'Saved';
        }
            $sum = DB::table('orderdetail')
                ->where('quoteno', $quote_no)
                ->sum('suggestprice');
            $percentagedis = round(($allcom / $sum * 100), 2);
            $Quotemaster = OrderMasterModel::where('QuoteNo', $quote_no)->where('BranchCode', $BranchCode)->update([
                'ValueAmount' => $sum,
                'GivenDisc' => $allcom,
                'DiscPer' => $percentagedis,
            ]);

            return response()->json([
                'success' => $message,
                'BranchCode' => $BranchCode,
                'TableData' => $TableData,
                'insert_update' => $insert_update,
                'QuoteNo' => $quote_no,
            ]);




    }
    public function orderentrysave(Request $request)
    {
        $BranchCode = Auth::user()->BranchCode;
        $TableData = $request->dataarray;
        $allcom = $request->allcom;


        // $Orderget = OrderModel::where('ID',$ID)->get();
// dd($Orderget);
        try {
            // if ($Orderget===null) {
            // dd('null',$Orderget);
            for ($i = 0; $i < count($TableData); $i++) {

                // info($TableData[$i]['snoCell']);
                $insert_update = [];
                $insert_update["EventNo"] = $event_no = (int) $request->event_no;
                $insert_update["QuoteNo"] = $quote_no = (int) $request->quote_no;
                $insert_update["ItemCode"] = $item_code = $TableData[$i]['itemCodeCell'];
                //$insert_update["Id"] = 1075709;
                if ($item_code == null) {
                    info('null hai re baba');


                }
                $insert_update["BranchCode"] = $BranchCode;
                $insert_update["SNo"] = $TableData[$i]['snoCell'];
                $insert_update["ItemName"] = $TableData[$i]['item_descCell'];
                $insert_update["IMPA"] = $TableData[$i]['impaCell'];
                $insert_update["PUOM"] = $TableData[$i]['uomCell'];
                $insert_update["Qty"] = $TableData[$i]['qtyCell'];
                $insert_update["VendorName"] = $TableData[$i]['vendorNameCell'];
                $insert_update["VendorCode"] = $TableData[$i]['vendor_codeCell'];
                $insert_update["VendorPrice"] = $TableData[$i]['vendor_priceCell'];
                $insert_update["SuggestPrice"] = $TableData[$i]['sell_priceCell'];
                $insert_update["Total"] = $TableData[$i]['totalCell'];
                $insert_update["CustomerNotes"] = $TableData[$i]['customer_notesCell'];
                $insert_update["VendorNotes"] = $TableData[$i]['notesCell'];
                $insert_update["InternalBuyerNotes"] = $TableData[$i]['internal_notesCell'];
                // $insert_update["VesselNote"] = $TableData[$i]['vessel_notesCell'];
                info($insert_update["VendorPrice"]);

                $status = DB::table('orderdetail')
                    ->updateOrInsert(
                        ['QuoteNo' => $quote_no, 'EventNo' => $event_no, 'ItemCode' => $item_code],
                        $insert_update
                    );




            }
                $sum = DB::table('orderdetail')
                    ->where('quoteno', $quote_no)
                    ->sum('suggestprice');
                $percentagedis = round(($allcom / $sum * 100), 2);
                $Quotemaster = OrderMasterModel::where('QuoteNo', $quote_no)->where('BranchCode', $BranchCode)->update([
                    'ValueAmount' => $sum,
                    'GivenDisc' => $allcom,
                    'DiscPer' => $percentagedis,
                ]);
            return redirect()->back()->with('success', 'Order success = ' . $item_code);

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Order Entry Failed = ' . $item_code);

        }







    }

    public function purchaseorderGet(Request $request)
    {
        $PONO = $request->PONO;
        $BranchCode = Auth::user()->BranchCode;
        $Ordermasterdata = OrderMasterModel::where('PONo', $PONO)->first();
        $VSN = $Ordermasterdata->VSNNo;
        $Alldata = [];
        $vendqry = OrderModel::select(
            'orderdetail.VendorName',
            'orderdetail.VendorCode',
            'orderdetail.PoMadeNo',
            'orderdetail.PoMadeDate',
            DB::raw('SUM(orderdetail.OrderQty * orderdetail.VendorPrice) as MEstPrice'),
            DB::raw('COUNT(orderdetail.OrderQty) as MEstPriceCount'),
            DB::raw('SUM(orderdetail.Freight) as MFreight'),
            DB::raw('SUM(orderdetail.RecQty) as MRecQty')
        )
            ->join('VenderSetup', 'orderdetail.VendorCode', '=', 'VenderSetup.VenderCode')
            ->where('orderdetail.VendorCode', '<>', '756')
            ->where('orderdetail.VendorCode', '<>', 0)
            ->where('orderdetail.PONO', $PONO)
            ->where('orderdetail.BranchCode', $BranchCode)
            ->groupBy(
                'orderdetail.VendorName',
                'orderdetail.VendorCode',
                'orderdetail.PoMadeNo',
                'orderdetail.PoMadeDate'
            )
            ->orderBy('orderdetail.VendorCode')
            ->get();

        foreach ($vendqry as $qryd) {
            $contact = VenderSetup::select('ContactPerson', 'Terms')
                ->where([
                    ['VenderCode', $qryd->VendorCode],
                    ['BranchCode', $BranchCode],
                ])
                ->get();

            $PurchaseOrderMaster = PurchaseOrderMaster::select('ShipVia', 'ReqDate', 'Time', 'VendorComment', 'PurchaseOrderNo', 'PODate', 'ChkCancelledPO', 'PORecDate', 'PORecTime')
                ->where([
                    ['ChargeNo', $PONO],
                    ['VSNNo', $VSN],
                    ['VendorCode', $qryd->VendorCode],
                    ['BranchCode', $BranchCode],
                ])
                ->get();

            $yourcode = VenderSetup::select('YourCode', 'Terms')
                ->where([
                    ['VenderCode', $qryd->VendorCode],
                    ['BranchCode', $BranchCode],
                ])
                ->get();

            $purchaseorderdetails = PurchaseOrderDetail::select(DB::raw('SUM(RecQty) as MREcQty'))
                ->where('PurchaseOrderNo', $qryd->PoMadeNo)
                ->where('BranchCode', $BranchCode)
                ->first();


            $Alldata[] = [
                'contact' => $contact,
                'PurchaseOrderMaster' => $PurchaseOrderMaster,
                'yourcode' => $yourcode,
                'purchaseorderdetails' => $purchaseorderdetails,
                'vendqry' => $qryd,
            ];
        }



        return view('purchase.Purchaseorder', [
            'Alldata' => $Alldata,
            // 'BranchCode'=> $BranchCode,
            'Ordermasterdata' => $Ordermasterdata,
        ]);
    }
    public function purchaseorder(Request $request)
    {
        $PONO = $request->PONO;
        $BranchCode = Auth::user()->BranchCode;

        return view('purchase.Purchaseorder', [
            'PONO' => $PONO,
            'BranchCode' => $BranchCode,
        ]);
    }

    public function NotDeliveredFillReport(Request $request)
    {
        $PONO = $request->PONO;
        $BranchCode = Auth::user()->BranchCode;

        return view('purchase.NotDeliveredFillReport', [
            'PONO' => $PONO,
            'BranchCode' => $BranchCode,
        ]);
    }
    public function purchaseordercodataget(Request $request)
    {
        $VSNNo = $request->input('vsno');
        $BranchCode = Auth::user()->BranchCode;

        $OrderDetail = DB::table('orderdetail')
            ->select('VendorName', 'VendorCode', 'PONO', 'DepartmentName', 'POMadeNo', 'POMadeDate', 'EventNo', 'QuoteNO')
            ->selectRaw('SUM(OrderQty * VendorPrice) as MEstPrice')
            ->selectRaw('COUNT(VendorName) as MID')
            ->selectRaw('SUM(Freight) as MFreight')
            ->where('VendorCode', '<>', 0)
            ->where('VSNNo', $VSNNo) // Assuming you're getting VSNNo from a request
            ->where('ChkBuy', 1)
            ->where('BranchCode', $BranchCode) // Assuming you're getting BranchCode from a request
            ->groupBy('VendorName', 'VendorCode', 'PONO', 'DepartmentName', 'POMadeNo', 'POMadeDate', 'EventNo', 'QuoteNO')
            ->orderBy('PONO')
            ->orderBy('POMadeNo')
            ->get();
$alldata = [];
        foreach ($OrderDetail as $OD) {
            $MPONO = $OD->POMadeNo;
            $MVendorCode = $OD->VendorCode;
            $VenderSetup = VenderSetup::select('EmailAddress', 'ShipVia')->where('VenderCode', $MVendorCode)->where('BranchCode', $BranchCode)->first();
            $Trans = Trans::Select('Vnon')->where('Vnon', $MPONO)->where('Vnoc', 'PORCV')->where('BranchCode', $BranchCode)->first();
            if ($Trans) {
                $PostedAc = 'Y';
            } else {
                $PostedAc = 'N';
            }
            $PurchaseOrderMaster = PurchaseOrderMaster::where('PurchaseOrderNo', $MPONO)->where('VSNNo', $VSNNo)->where('BranchCode', $BranchCode)->first();



            $alldata[] = [
                'OrderDetail' => $OD,
                'VenderSetup' => $VenderSetup,
                'PurchaseOrderMaster' => $PurchaseOrderMaster,
                'PostedAc' => $PostedAc,

            ];
        }
        // dd($alldata);
        return response()->json([
            'alldata'=>$alldata,
        ]);
    }
    public function purchaseorderco(Request $request)
    {


        $PVendorcode = 756;

        $VSNNo = $request->input('vsno');
        // dd($VSNNo);
        $BranchCode = Auth::user()->BranchCode;
        //  $OrderDetail = DB::table('SppurchaseCo')
        //  ->where('VSNNo',$VSNNo)->get();
    //     $results = DB::table('orderdetail as od')
    // ->join('purchaseordermaster as pom', 'od.POMadeNo', '=', 'pom.PurchaseOrderNo')
    // ->join('vendersetup as vs', 'od.VendorCode', '=', 'vs.VenderCode')
    // ->join('trans as tr', 'od.POMadeNo', '=', 'tr.Vnon')
    // ->select(
    //     'od.POMadeNo',
    //     'od.VendorCode',
    //     'od.VSNNo',
    //     'od.ChkBuy',
    //     'od.BranchCode',
    //     'od.VendorName',
    //     'od.PONO',
    //     'od.POMadeDate',
    //     'od.QuoteNO',
    //     'od.EventNo',
    //     'od.OrderQty',
    //     'od.VendorPrice',
    //     'od.Freight',
    //     'pom.Appr',
    //     'pom.Selected',
    //     'pom.ChkCancelledPO',
    //     'pom.POAmount',
    //     'pom.ShipVia',
    //     'pom.Time',
    //     'pom.ReqDate',
    //     'pom.VendorComment',
    //     'pom.DepartmentName',
    //     'pom.Atten',
    //     'pom.VendorCode',
    //     'vs.EmailAddress',
    //     'vs.ShipVia',
    //     'tr.Vnon',
    //     'tr.Vnoc'
    // ) ->where('od.BranchCode',$BranchCode)
    //      ->where('od.VSNNo',$VSNNo)->get();

    // ->get();
        // dd();
        // $OrderDetail = DB::table('orderdetail')
        //     ->select('VendorName', 'VendorCode', 'PONO', 'DepartmentName', 'POMadeNo', 'POMadeDate', 'EventNo', 'QuoteNO')
        //     ->selectRaw('SUM(OrderQty * VendorPrice) as MEstPrice')
        //     ->selectRaw('COUNT(VendorName) as MID')
        //     ->selectRaw('SUM(Freight) as MFreight')
        //     ->where('VendorCode', '<>', 0)
        //     ->where('VSNNo', $VSNNo) // Assuming you're getting VSNNo from a request
        //     ->where('ChkBuy', 1)
        //     ->where('BranchCode', $BranchCode) // Assuming you're getting BranchCode from a request
        //     ->groupBy('VendorName', 'VendorCode', 'PONO', 'DepartmentName', 'POMadeNo', 'POMadeDate', 'EventNo', 'QuoteNO')
        //     ->orderBy('PONO')
        //     ->orderBy('POMadeNo')
        //     ->get();
        // $alldata = [];
        // foreach ($OrderDetail as $OD) {
        //     $MPONO = $OD->POMadeNo;
        //     $MVendorCode = $OD->VendorCode;
        //     $VenderSetup = VenderSetup::select('EmailAddress', 'ShipVia')->where('VenderCode', $MVendorCode)->where('BranchCode', $BranchCode)->first();
        //     $Trans = Trans::Select('Vnon')->where('Vnon', $MPONO)->where('Vnoc', 'PORCV')->where('BranchCode', $BranchCode)->first();
        //     if ($Trans) {
        //         $PostedAc = 'Y';
        //     } else {
        //         $PostedAc = 'N';
        //     }
        //     $PurchaseOrderMaster = PurchaseOrderMaster::where('PurchaseOrderNo', $MPONO)->where('VSNNo', $VSNNo)->where('BranchCode', $BranchCode)->first();



        //     $alldata[] = [
        //         'OrderDetail' => $OD,
        //         'VenderSetup' => $VenderSetup,
        //         'PurchaseOrderMaster' => $PurchaseOrderMaster,
        //         'PostedAc' => $PostedAc,

        //     ];
        // }
        // dd($alldata);
        $FlipToVSN = FlipTovsn::where('VSNNo', $VSNNo)->where('BranchCode', $BranchCode)->first();
        // dd($alldata[1]['OrderDetail']->POMadeNo);
        return view('purchase.PurchaseOrderCo', [
            'FlipToVSN' => $FlipToVSN,
            'VSN' => $VSNNo,
            // 'alldata' => $OrderDetail,

        ]);
    }
    // public function purchaseordersave($PONO){
//     $BranchCode =Auth::user()->BranchCode;

    // }
    public function purchaseorderfiller(Request $request)
    {
        $PVendorcode = 756;
        $PONO = $request->input('PONO');
        $scode = $request->input('scode');
        $TxtSplitPONo = $request->input('TxtSplitPONo');
        $BranchCode = Auth::user()->BranchCode;
        info($PONO);


        $Ordermasterdata = OrderMasterModel::where('PONo', $PONO)->where('BranchCode', $BranchCode)->first();

        $VSN = $Ordermasterdata->VSNNo;
        info($TxtSplitPONo);

        if ($TxtSplitPONo) {
            // $orders = DB::table('OrderDetail')
            //     ->where('POMadeNo', $TxtSplitPONo)
            //     ->whereRaw('(ISNULL(OrderQty,0) - (ISNULL(OrderQtyPO,0) - ISNULL(CancelQtyPO,0))) > 0')
            //     ->where('VendorCode', '<>', $PVendorcode)
            //     ->where('PONO', $PONO)
            //     ->where('BranchCode', $BranchCode)
            //     ->orderBy('SNo')
            //     ->orderBy('ID')
            //     ->get();

            $orders = DB::table('orderdetail')
                ->where('POMadeNo', $TxtSplitPONo)
                ->whereRaw('(IFNULL(OrderQty, 0) - (IFNULL(OrderQtyPO, 0) - IFNULL(CancelQtyPO, 0))) > 0')
                ->where('VendorCode', '<>', $PVendorcode)
                ->where('PONO', $PONO)
                ->where('BranchCode', $BranchCode)
                ->orderBy('SNo')
                ->orderBy('ID')
                ->get();


        } else {
            // $orders = DB::table('OrderDetail')
            //     ->whereRaw('(ISNULL(OrderQty,0) - (ISNULL(OrderQtyPO,0) - ISNULL(CancelQtyPO,0))) > 0')
            //     ->where('VendorCode', '<>', $PVendorcode)
            //     ->where('PONO', $PONO)
            //     ->where('BranchCode', $BranchCode)
            //     ->orderBy('SNo')
            //     ->orderBy('ID')
            //     ->get();
            $orders = DB::table('orderdetail')
                ->whereRaw('(IFNULL(OrderQty, 0) - (IFNULL(OrderQtyPO, 0) - IFNULL(CancelQtyPO, 0))) > 0')
                ->where('VendorCode', '!=', $PVendorcode)
                ->where('PONO', $PONO)
                ->where('BranchCode', $BranchCode)
                ->orderBy('SNo')
                ->orderBy('ID')
                ->get();


        }
        info($orders);





        $flipToVSN = FlipTovsn::select('CustomerCode', 'CustomerName', 'VesselName', 'GodownCode')
            ->where('VSNNo', $VSN)
            ->where('BranchCode', $BranchCode)
            ->first();








        return response()->json([
            'orders' => $orders,
            'Ordermasterdata' => $Ordermasterdata,
            'flipToVSN' => $flipToVSN,
            'scode' => $scode,

        ]);
    }
    public function PObtnclick(Request $request)
    {
        $PVendorcode = 756;
        $PONO = $request->input('PONO');
        $dataarray = $request->input('dataarray');
        // $scode = $request->input('scode');
        // $TxtSplitPONo = $request->input('TxtSplitPONo');
        $BranchCode = Auth::user()->BranchCode;
        $MWorkUser = Auth::user()->UserName;
        // info($dataarray);

        $Ordermasterdata = OrderMasterModel::where('PONo', $PONO)->first();
        $VSN = $Ordermasterdata->VSNNo;

        PurchaseOrderCreateTemp::where('ChargeNo', '=', $PONO)
            ->where('VSNNo', $VSN)
            ->where('BranchCode', $BranchCode)
            ->delete();
        $data = [];
        if ($dataarray) {

            for ($i = 0; $i < count($dataarray); $i++) {
                $MOrderID = $dataarray[$i]['ID'];
                $MOrderQty = $dataarray[$i]['Qty'];
                $MVendorCode = $dataarray[$i]['VCode'];
                $MCheck = $dataarray[$i]['MCheck'];
                $MVendorName = $dataarray[$i]['Vendor'];

                if ($MCheck == 1) {
                    $Rs5 = new PurchaseOrderCreateTemp;
                    $Rs5->ChargeNo = $PONO;
                    $Rs5->VSNNo = $VSN;
                    $Rs5->ChkBuy = true;
                    $Rs5->BuyBy = $MWorkUser;
                    $Rs5->VendorCode = $MVendorCode;
                    $Rs5->VendorName = $MVendorName;
                    $Rs5->PONo = $dataarray[$i]['PO'];
                    $Rs5->Qty = $dataarray[$i]['Qty'];
                    $Rs5->Cost = $dataarray[$i]['Cost'];
                    $Rs5->CostAmt = (float) $dataarray[$i]['Cost'] * (float) $dataarray[$i]['Qty'];
                    $Rs5->BranchCode = $BranchCode;
                    $Rs5->save();
                }




            }

        }

        $results = PurchaseOrderCreateTemp::select('VendorName', 'VendorCode', 'PONo', DB::raw('SUM(Qty*Cost) as MEstPrice'), DB::raw('COUNT(Qty) as MEstPriceCount'))
            ->where('VendorCode', '<>', $PVendorcode)
            ->where('VendorCode', '<>', 0)
            ->where('ChargeNo', $PONO)
            ->where('BranchCode', $BranchCode)
            ->groupBy('VendorName', 'VendorCode', 'PONo')
            ->orderBy('VendorName')
            ->get();

        foreach ($results as $OrderCreateTemp) {
            $MVendorCode = $OrderCreateTemp->VendorCode;

            $VenderSetup = VenderSetup::select('YourCode', 'ContactPerson', 'Terms', 'ShipVia')->where('VenderCode', $MVendorCode)->where('BranchCode', $BranchCode)->first();
            $PurchaseOrderMaster = PurchaseOrderMaster::Select('ShipVia', 'ReqDate', 'Time', 'VendorComment', 'PurchaseOrderNo', 'PODate', 'ChkCancelledPO', 'PORecDate', 'PORecTime')->where('ChargeNo', $PONO)->where('VSNNo', $VSN)->where('VendorCode', $MVendorCode)->where('BranchCode', $BranchCode)->first();

            $data[] = [
                'VenderSetup' => $VenderSetup,
                'OrderCreateTemp' => $OrderCreateTemp,
                'PurchaseOrderMaster' => $PurchaseOrderMaster,
            ];

        }



        return response()->json([
            'results' => $results,
            'data' => $data,

        ]);
    }
        public function posave(Request $request)
    {

        $MWorkUser = config('app.MUserName');
        $BranchCode = config('app.MBranchCode');
        $table = $request->input('dataarray');
        $table2 = $request->input('data2');
        $TxtChargeNo = $request->input('TxtChargeNo');
        $vsno = $request->input('vsno');
        $QuoteNo = $request->input('QuoteNo');
        $EventNo = $request->input('EventNo');
        $SplitPONo = $request->input('SplitPONo');
        $GodownCode = $request->input('GodownCode');
        $DepartmentName = $request->input('DepartmentName');
        $PurchaseOrderDate = $request->input('PurchaseOrderDate');
        $lblCustomerNameText = $request->input('customer');
        $lblVesselNameText = $request->input('vessel');

        DB::beginTransaction();

        try {


            OrderModel::where('PONO', $TxtChargeNo)
            ->where('VSNNo', $vsno)
            ->where('BranchCode', $BranchCode)
            ->update([
                'CurrChkBuy' => 0,
            ]);

        //    // Extract the values for bulk update from $table
        //         $valuesToUpdate = collect($table)->map(function ($row) use ($TxtChargeNo, $vsno, $BranchCode, $MWorkUser) {
        //             return [
        //                 'PONO' => $TxtChargeNo,
        //                 'VSNNo' => $vsno,
        //                 'BranchCode' => $BranchCode,
        //                 'ChkBuy' => true,
        //                 'WorkUser' => $MWorkUser,
        //                 'CurrChkBuy' => true,
        //                 'VendorCode' => $row['VCode'],
        //                 'VendorName' => $row['Vendor'],
        //                 'VendorPrice' => $row['Cost'],
        //                 'OurPrice' => $row['Cost'],
        //                 // Add other fields to update if needed
        //             ];
        //         });
        //         info($valuesToUpdate->toArray());
        //         info($valuesToUpdate);
        //         // Bulk update OrderModel
        //         OrderModel::whereIn('ID', collect($table)->pluck('OrderID'))
        //             ->update($valuesToUpdate);
                        // Begin building the SQL update query

                        // Iterate over each row in $table
                        foreach ($table as $index => $row) {
                    $sql = "UPDATE orderdetail SET ";
                    // Extract values for update
                    $values = [
                        'PONO' => $TxtChargeNo,
                        'VSNNo' => $vsno,
                        'BranchCode' => $BranchCode,
                        'ChkBuy' => true,
                        'WorkUser' => $MWorkUser,
                        'CurrChkBuy' => true,
                        'VendorCode' => $row['VCode'],
                        'VendorName' => $row['Vendor'],
                        'VendorPrice' => $row['Cost'],
                        'OurPrice' => $row['Cost'],
                        // Add other fields to update if needed
                    ];

                    // Initialize an array to hold SET clauses for this row
                    $setClauses = [];
                    foreach ($values as $column => $value) {
                        // Construct the SET clause for each column
                        $setClauses[] = "`$column` = '$value'";
                    }

                    // Combine the SET clauses into a single string
                    $setClause = implode(', ', $setClauses);

                    // Append the SET clause for the current row to the SQL query
                    $sql .= "$setClause WHERE `ID` = {$row['OrderID']}; ";

                    DB::statement($sql);
                }

                // Execute the constructed SQL query

            // foreach ($table as $row) {

            //         OrderModel::where('ID', $row['OrderID'])
            //             ->where('PONO', $TxtChargeNo)
            //             ->where('VSNNo', $vsno)
            //             ->where('BranchCode', $BranchCode)
            //             ->update([
            //                 'ChkBuy' => true,
            //                 'WorkUser' => $MWorkUser,
            //                 'CurrChkBuy' => true,
            //                 'VendorCode' => $row['VCode'],
            //                 'VendorName' => $row['Vendor'],
            //                 'VendorPrice' => $row['Cost'],
            //                 'OurPrice' => $row['Cost'],
            //             ]);

            // }




            foreach ($table2 as $row) {

            $MCheck = $row['MCheck'];
            if ($row['MCheck'] == 1) {
            if ($row['RecQty'] > 0 && $row['Atten'] !== "CANCELLED") {



                     purchaseOrderMaster::updateOrCreate(
                            [
                                'VSNNo' => 0,
                                'PurchaseOrderNo' => $row['PONo'],
                                'BranchCode' => $BranchCode
                            ],
                            [

                                'ChargeNo' => $TxtChargeNo,
                                'EventNo' => $EventNo,
                                'QuoteNo' => $QuoteNo,
                                'SplitPONo' => $SplitPONo,
                                // 'Selected' => 0,
                                ])->orWhereNull('VSNNo');


                     PurchaseOrderDetail::updateOrCreate(
                            [
                                'VSNNo' => 0,
                                'PurchaseOrderNo' => $row['PONo'],
                                 'BranchCode' => $BranchCode],
                            [
                                'VSNNo' => $vsno,
                                'ChargeNo' => $TxtChargeNo,
                                'EventNo' => $EventNo,
                                'QuoteNo' => $QuoteNo,
                                'SplitPONo' => $SplitPONo,
                            ])->orWhereNull('VSNNo');


                }
                if ($row['RecQty'] == 0 && $row['Atten'] !== "CANCELLED") {


                    PurchaseOrderDetail::where('PurchaseOrderNo', $row['PONo'])
                        ->where('BranchCode', $BranchCode)
                        ->delete();

                    purchaseOrderMaster::where('PurchaseOrderNo', $row['PONo'])
                        ->where('BranchCode', $BranchCode)
                        ->delete();

                    purchaseOrderMaster::where('VSNNo', $vsno)
                        ->where('BranchCode', $BranchCode)
                        ->update(['Selected' => 0]);


                        $orderDetails =  OrderModel::where('VendorCode', $row['VendorCode'])
                        ->where('PONO', $TxtChargeNo)
                        ->where('ChkBuy', 1)
                        ->where('VSNNo', $vsno)
                        ->where('BranchCode', $BranchCode)
                        ->first();



                    if ($orderDetails) {

                        if ($row['PONo'] == 0 || $row['PONo'] == '') {

                            $MPurchaseOrderNo = purchaseOrderMaster::where('BranchCode', $BranchCode)
                                ->max('PurchaseOrderNo');
                            if ($MPurchaseOrderNo) {
                                $MMPONoMax = $MPurchaseOrderNo + 1;

                            } else {
                                $MMPONoMax = 1;
                            }

                            purchaseOrderMaster::insert([
                                'PurchaseOrderNo' => $MMPONoMax,
                                'BranchCode' => $BranchCode,
                                'VSNNo' => $vsno,
                                'ChargeNo' => $TxtChargeNo,
                                'VendorCode' => $row['VendorCode']
                            ]);
                            $MPONO = $MMPONoMax;
                        }


                        $purchaseOrderMaster = purchaseOrderMaster::updateOrCreate(
                            [
                                'PurchaseOrderNo'=> $MPONO,
                                'VSNNo'=> $vsno,
                                'VendorCode'=> $row['VendorCode'],
                                'ChargeNo'=> $TxtChargeNo,
                                'BranchCode'=> $BranchCode
                            ],
                            [
                                'Selected'=>true,
                                'BranchCode'=>$BranchCode,
                                'SplitPONo'=>$SplitPONo,
                                'VSNNo'=>$vsno,
                                'ChargeNo'=>$TxtChargeNo,
                                'QuoteNo'=>$QuoteNo,
                                'GodownCode'=>$GodownCode,
                                'VendorCode'=>$row['VendorCode'],
                                'DepartmentName'=>$DepartmentName,
                                'PODate'=>$row['PODatecell'] ? $row['PODatecell'] : $PurchaseOrderDate,
                                'Date' => $row['PODatecell'] ? $row['PODatecell'] : $PurchaseOrderDate,
                                'Atten' => $row['Atten'],
                                'Freight' => $row['Freight'] ? $row['Freight'] : NULL,
                                'POAmount' => $row['TotalPurcValue'] ? $row['TotalPurcValue'] : NULL,
                                'Terms' => $row['Terms'] ? $row['Terms'] : NULL,
                                'CustomerName'=> $lblCustomerNameText,
                                'VesselName'=> $lblVesselNameText,
                                'Selected'=> ($MCheck == 1) ? true : false,
                                'Appr'=>  true,
                                'VendorName'=>  $orderDetails->VendorName ? $orderDetails->VendorName : NULL,
                                'ShipVia'=>  $row['ShipVia'] ? $row['ShipVia'] : NULL,
                                'ReqDate'=>  $row['ReqDate'] ? $row['ReqDate'] : date('Y-m-d'),
                                'Time'=> $row['Time'],
                                'VendorComment'=> $row['VendorComment'] ? $row['VendorComment'] : NULL,
                                'OrderQty'=> $row['MEstPriceCount'] ? $row['MEstPriceCount'] : NULL,
                                'WorkUser'=> $MWorkUser,
                            ]);


                    }

                    $Rs = OrderModel::where('VSNNo', $vsno)
                        ->where('CurrChkBuy', 1)
                        ->where('VendorCode', $row['VendorCode'])
                        ->where('PONO', $TxtChargeNo)
                        ->where('BranchCode', $BranchCode)
                        ->orderBy('SNO')
                        ->orderBy('ID')
                        ->get();

                    if ($Rs->count() > 0) {

                        foreach ($Rs as $Rsi) {
                            PurchaseOrderDetail::updateOrCreate(
                                [
                                    'SNO'=> $Rsi['SNO'], 'OrderID'=> $Rsi['ID'], 'PurchaseOrderNo'=> $MPONO, 'VSNNo'=> $vsno, 'VendorCode'=> $row['VendorCode'],'ChargeNo'=> $TxtChargeNo,'BranchCode'=> $BranchCode
                                ],
                                [
                                    'SplitPONo'=> $SplitPONo, 'EventNo'=> $EventNo,
                                    'QuoteNo'=> $QuoteNo,'ItemCode'=> $Rsi['ItemCode'],
                                    'ItemName'=> $Rsi['ItemName'],'Qty'=>$Rsi['Qty'],
                                    'PUOM'=> $Rsi['PUOM'],'OrderQty'=>$Rsi['OrderQty'],
                                    'CancelQty'=> 0,'Price'=>$Rsi['Price'],
                                    'EstPrice'=> $Rsi['EstPrice'],'DepartmentName'=>$Rsi['DepartmentName'],
                                    'QID'=> $Rsi['QID'],'STKBuyOut'=>$Rsi['STKBuyOut'],
                                    'ProductName'=> $Rsi['ProductName'],'Freight'=>$Rsi['Freight'],
                                    'GPAmount'=> $Rsi['GPAmount'],'VendorName'=>$Rsi['VendorName'],
                                    'VendorPrice'=> $Rsi['VendorPrice'],'OurPrice'=>$Rsi['OurPrice'],
                                    'OriginName'=> $Rsi['OriginName'],'VPart'=>$Rsi['VPart'],
                                    'CustomerNotes'=> $Rsi['CustomerNotes'],'VendorNotes'=>$Rsi['VendorNotes'],
                                    'InternalBuyerNotes'=> $Rsi['InternalBuyerNotes'],'VendorNotes'=>$Rsi['VendorNotes'],
                                    'VCategoryName'=> $Rsi['VCategoryName'],'GPRate'=>$Rsi['GPRate'],
                                    'Alternative'=> $Rsi['Alternative'],'OurUOM'=>$Rsi['OurUOM'],
                                    'DiscIncomePer'=> $Rsi['DiscIncomePer'],'DiscIncomeAmt'=>$Rsi['DiscIncomeAmt'],
                                    'IMPA'=> $Rsi['IMPA'],'IMPAItemCode'=>$Rsi['IMPAItemCode'],
                                    'GodownCode'=> $GodownCode,'VendorPartNo'=>$Rsi['VendorPartNo'],
                                    'GodownCode'=> $GodownCode,'VendorPartNo'=>$Rsi['VendorPartNo'],
                                ]

                    );

                            $Rsi->POMadeNo = $MPONO;
                            $Rsi->POMadeDate = $row['PODatecell'] ? $row['PODatecell'] : $PurchaseOrderDate;
                            $Rsi->Atten = $row['Atten'];

                            $MMSNO1 = $Rsi->ID ? $Rsi->ID : '';
                            $MCancelQty = '';

                            $Rs5 = PurchaseOrderDetail::select(DB::raw('SUM(OrderQty) as MOrderQty'), DB::raw('SUM(CancelQty) as MCancelQty'))
                                ->where('ChargeNo', $TxtChargeNo)
                                ->where('OrderID', $MMSNO1)
                                ->where('BranchCode', $BranchCode)
                                ->first();
                            if ($Rs5) {
                                // Access the sum values
                                $MOrderQty = $Rs5->MOrderQty;
                                $MCancelQty = $Rs5->MCancelQty;
                            } else {
                                $MOrderQty = 0;
                                $MCancelQty = 0;
                            }
                            $Rsi->OrderQtyPO = $MOrderQty;
                            $Rsi->CancelQtyPO = $MCancelQty;
                            $Rsi->save();

                        }
                    }

            }

        }
        }




        DB::commit();

        return response()->json([
            'Message' => 'Working Link',
            'PONO' => $TxtChargeNo,
            'vsno' => $vsno,
        ]);
    } catch (\Exception $e) {
        DB::rollBack();
        info($e->getMessage());
        // Handle the exception, log or return an error response
        return response()->json(['error' => $e->getMessage()], 500);
    }

    }
    // public function posave(Request $request)
    // {
    //     $PVendorcode = 756;
    //     $BranchCode = Auth::user()->BranchCode;
    //     $MWorkUser = Auth::user()->UserName;
    //     $table = $request->input('dataarray');
    //     $table2 = $request->input('data2');
    //     $PONo = $request->input('PONo');
    //     $vsno = $request->input('vsno');
    //     $QuoteNo = $request->input('QuoteNo');
    //     $EventNo = $request->input('EventNo');
    //     $SplitPONo = $request->input('SplitPONo');
    //     $GodownCode = $request->input('GodownCode');
    //     $DepartmentName = $request->input('DepartmentName');
    //     $PurchaseOrderDate = $request->input('PurchaseOrderDate');
    //     $lblCustomerNameText = $request->input('customer');
    //     $lblVesselNameText = $request->input('vessel');

    //     DB::table('orderdetail')
    //         ->where('PONO', $PONo)
    //         ->where('VSNNo', $vsno)
    //         ->where('BranchCode', $BranchCode)
    //         ->update(['CurrChkBuy' => 0]);




    //     for ($i = 0; $i < count($table); $i++) {
    //         # code...

    //         // info($request['tdVendorname']);
    //         $tdbuyby = $table[$i]['BuyBy'];
    //         $tdpo = $table[$i]['PO'];
    //         $tdcharge = $table[$i]['Charge'];
    //         $tdqty = $table[$i]['Qty'];
    //         $tdunit = $table[$i]['Unit'];
    //         $tdimpa = $table[$i]['IMPA'];
    //         $tdItemname = $table[$i]['ItemName'];
    //         $tdinternal = $table[$i]['Internal'];
    //         $MVendorName = $table[$i]['Vendor'];
    //         $Cost = (int) $table[$i]['Cost'];
    //         $tdsellprice = (int) $table[$i]['SellPrice'];
    //         $MVendorCode = $table[$i]['VCode'];
    //         $MOrderID = $table[$i]['ID'];
    //         $tdSNO = $table[$i]['SNo'];
    //         $tdREC = (int) $table[$i]['RecQtyOrder'];
    //         $estprice = (int) $tdqty * (int) $tdsellprice;

    //         $orderDetail = OrderModel::where('ID', $MOrderID)
    //             ->where('PONO', $PONo)
    //             ->where('VSNNo', $vsno)
    //             ->where('BranchCode', $BranchCode)
    //             ->first();
    //         if ($orderDetail) {
    //             $orderDetail->ChkBuy = true;
    //             $orderDetail->WorkUser = $MWorkUser;
    //             $orderDetail->CurrChkBuy = true;
    //             $orderDetail->VendorCode = $MVendorCode;
    //             $orderDetail->VendorName = $MVendorName;
    //             $orderDetail->VendorPrice = $Cost;
    //             $orderDetail->OurPrice = $Cost;
    //             $orderDetail->save();
    //         }
    //     }

    //     for ($i = 0; $i < count($table2); $i++) {

    //         $MCheck = $table2[$i]['MCheck'];
    //         info($MCheck);
    //         if ($MCheck == 1) {
    //             info('checking');

    //             $MPONO = $table2[$i]['PONo'];
    //             $POMade = $table[$i]['PO'];
    //             $MPOMadeDate = $table2[$i]['PODatecell'];
    //             $MCanPO = $table2[$i]['Atten'];
    //             $MRecQtyPO = $table2[$i]['RecQty'];
    //             $MVendorCode = $table2[$i]['VendorCode'];
    //             // info('rec'.$MRecQtyPO);
    //             info($MVendorCode);
    //                 info($PONo);
    //                 info($vsno);
    //                 info($BranchCode);
    //             if ($MRecQtyPO == 0 && $MCanPO !== "CANCELLED") {
    //                 info('checking2');

    //                 $purchaseOrderMaster = purchaseOrderMaster::where(function ($query) {
    //                     $query->where('VSNNo', 0)
    //                         ->orWhereNull('VSNNo');
    //                 })
    //                     ->where('PurchaseOrderNo', $PONo)
    //                     ->where('BranchCode', $BranchCode)
    //                     ->first();
    //                 if ($purchaseOrderMaster) {
    //                     $purchaseOrderMaster->VSNNo = $vsno;
    //                     $purchaseOrderMaster->ChargeNo = $PONo;
    //                     $purchaseOrderMaster->EventNo = $EventNo;
    //                     $purchaseOrderMaster->QuoteNo = $QuoteNo;
    //                     $purchaseOrderMaster->SplitPONo = $SplitPONo;
    //                     $purchaseOrderMaster->save();
    //                 }

    //                 $purchaseOrderDetail = PurchaseOrderDetail::where(function ($query) {
    //                     $query->where('VSNNo', 0)
    //                         ->orWhereNull('VSNNo');
    //                 })
    //                     ->where('PurchaseOrderNo', $PONo)
    //                     ->where('BranchCode', $BranchCode)
    //                     ->get();

    //                 if ($purchaseOrderDetail->count() > 0) {
    //                     info('checking3');

    //                     foreach ($purchaseOrderDetail as $detail) {
    //                         $detail->VSNNo = $vsno;
    //                         $detail->ChargeNo = $PONo;
    //                         $detail->EventNo = $EventNo;
    //                         $detail->QuoteNo = $QuoteNo;
    //                         $detail->SplitPONo = $SplitPONo;
    //                         $detail->save();

    //                     }
    //                 }

    //             }

    //             if ($MRecQtyPO == 0 && $MCanPO !== "CANCELLED") {
    //                 info('purchaseorder');
    //                 PurchaseOrderDetail::where('PurchaseOrderNo', $PONo)
    //                     ->where('BranchCode', $BranchCode)
    //                     ->delete();

    //                 purchaseOrderMaster::where('PurchaseOrderNo', $PONo)
    //                     ->where('BranchCode', $BranchCode)
    //                     ->delete();

    //                 purchaseOrderMaster::where('VSNNo', $vsno)
    //                     ->where('BranchCode', $BranchCode)
    //                     ->update(['Selected' => 0]);


    //                 info($MVendorCode);
    //                 info($PONo);
    //                 info($vsno);
    //                 info($BranchCode);
    //                 $orderDetails = DB::table('orderdetail')
    //                     ->where('VendorCode', $MVendorCode)
    //                     ->where('PONO', $PONo)
    //                     ->where('ChkBuy', 1)
    //                     ->where('VSNNo', $vsno)
    //                     ->where('BranchCode', $BranchCode)
    //                     ->first();


    //                 // info('orderdetails'.$orderDetails);

    //                 if ($orderDetails) {
    //                     info('orderdetailscount');

    //                     info($POMade);
    //                     if ($POMade == 0 || $POMade == '') {
    //                         info('inserting');

    //                         $result = purchaseOrderMaster::select(DB::raw('MAX(PurchaseOrderNo) as MPurchaseOrderNo'))
    //                             ->where('BranchCode', $BranchCode)
    //                             ->first();
    //                         if ($result) {
    //                             $MMPONoMax = $result->MPurchaseOrderNo + 1;

    //                         } else {
    //                             $MMPONoMax = 1;
    //                         }

    //                         info('MMPONoMax' . $MMPONoMax);
    //                         purchaseOrderMaster::insert([
    //                             'PurchaseOrderNo' => $MMPONoMax,
    //                             'BranchCode' => $BranchCode,
    //                             'VSNNo' => $vsno,
    //                             'ChargeNo' => $PONo,
    //                             'VendorCode' => $MVendorCode
    //                         ]);
    //                         $MPONO = $MMPONoMax;
    //                     }


    //                     $purchaseOrderMaster = purchaseOrderMaster::where('PurchaseOrderNo', $MPONO)
    //                         ->where('VSNNo', $vsno)
    //                         ->where('VendorCode', $MVendorCode)
    //                         ->where('ChargeNo', $PONo)
    //                         ->where('BranchCode', $BranchCode)
    //                         ->first();
    //                     info('mpono' . $MPONO);
    //                     if (!$purchaseOrderMaster) {
    //                         $purchaseOrderMaster = new purchaseOrderMaster;

    //                         $purchaseOrderMaster->PurchaseOrderNo = $MPONO;
    //                         $purchaseOrderMaster->Selected = true;
    //                         $purchaseOrderMaster->BranchCode = $BranchCode;
    //                     } else {
    //                         info('upadre');

    //                         $purchaseOrderMaster->Selected = false;

    //                     }
    //                     $purchaseOrderMaster->SplitPONo = $SplitPONo;
    //                     $purchaseOrderMaster->VSNNo = $vsno;
    //                     $purchaseOrderMaster->ChargeNo = $PONo;
    //                     $purchaseOrderMaster->EventNo = $EventNo;
    //                     $purchaseOrderMaster->QuoteNo = $QuoteNo;
    //                     $purchaseOrderMaster->GodownCode = $GodownCode;
    //                     $purchaseOrderMaster->VendorCode = $MVendorCode;
    //                     $purchaseOrderMaster->DepartmentName = $DepartmentName;
    //                     $purchaseOrderMaster->PODate = $MPOMadeDate ? $MPOMadeDate : $PurchaseOrderDate;
    //                     $purchaseOrderMaster->Date = $MPOMadeDate ? $MPOMadeDate : $PurchaseOrderDate;
    //                     $purchaseOrderMaster->Atten = $MCanPO;
    //                     $purchaseOrderMaster->Freight = $table2[$i]['Freight'] ? $table2[$i]['Freight'] : NULL;
    //                     $purchaseOrderMaster->POAmount = $table2[$i]['TotalPurcValue'] ? $table2[$i]['TotalPurcValue'] : NULL;
    //                     $purchaseOrderMaster->Terms = $table2[$i]['Terms'] ? $table2[$i]['Terms'] : NULL;
    //                     $purchaseOrderMaster->CustomerName = $lblCustomerNameText;
    //                     $purchaseOrderMaster->VesselName = $lblVesselNameText;
    //                     if ($MCheck == 1) {
    //                         $purchaseOrderMaster->Selected = true;
    //                     } else {
    //                         $purchaseOrderMaster->Selected = false;
    //                     }
    //                     $purchaseOrderMaster->Appr = true;
    //                     $purchaseOrderMaster->VendorName = $orderDetails->VendorName ? $orderDetails->VendorName : NULL;
    //                     $purchaseOrderMaster->ShipVia = $table2[$i]['ShipVia'] ? $table2[$i]['ShipVia'] : NULL;
    //                     $purchaseOrderMaster->ReqDate = $table2[$i]['ReqDate'] ? $table2[$i]['ReqDate'] : date('Y-m-d');
    //                     $purchaseOrderMaster->Time = $table2[$i]['Time'];
    //                     $purchaseOrderMaster->VendorComment = $table2[$i]['VendorComment'] ? $table2[$i]['VendorComment'] : NULL;
    //                     $purchaseOrderMaster->OrderQty = $table2[$i]['MEstPriceCount'] ? $table2[$i]['MEstPriceCount'] : NULL;
    //                     $purchaseOrderMaster->WorkUser = $MWorkUser;

    //                     $purchaseOrderMaster->save();
    //                 }


    //                 $PurchaseOrderDetail = PurchaseOrderDetail::where('PurchaseOrderNo', $MPONO)
    //                     ->where('VSNNo', $vsno)
    //                     ->where('VendorCode', $MVendorCode)
    //                     ->where('ChargeNo', $PONo)
    //                     ->where('BranchCode', $BranchCode)
    //                     ->orderBy('ID')
    //                     ->first();

    //                 $Rs = OrderModel::where('VSNNo', $vsno)
    //                     ->where('CurrChkBuy', 1)
    //                     ->where('VendorCode', $MVendorCode)
    //                     ->where('PONO', $PONo)
    //                     ->where('BranchCode', $BranchCode)
    //                     ->orderBy('SNO')
    //                     ->orderBy('ID')
    //                     ->get();

    //                 if ($Rs->count() > 0) {

    //                     foreach ($Rs as $Rsi) {
    //                         info($Rsi);
    //                         if (!$PurchaseOrderDetail) {
    //                             $PurchaseOrderDetail = new PurchaseOrderDetail;
    //                         }

    //                         $PurchaseOrderDetail->SplitPONo = $SplitPONo;
    //                         $PurchaseOrderDetail->VSNNo = $vsno;
    //                         $PurchaseOrderDetail->EventNo = $EventNo;
    //                         $PurchaseOrderDetail->QuoteNo = $QuoteNo;
    //                         $PurchaseOrderDetail->ChargeNo = $PONo;
    //                         $PurchaseOrderDetail->ItemCode = $Rsi->ItemCode;
    //                         $PurchaseOrderDetail->ItemName = $Rsi->ItemName;
    //                         $PurchaseOrderDetail->Qty = $Rsi->Qty;
    //                         $PurchaseOrderDetail->PUOM = $Rsi->PUOM;

    //                         $MOrderQty1 = $Rsi->OrderQty ? $Rsi->OrderQty : '';
    //                         $MOrderQtyPO = $Rsi->OrderQtyPO ? $Rsi->OrderQtyPO : '';
    //                         $MCancelQtyPO = $Rsi->CancelQtyPO ? $Rsi->CancelQtyPO : '';

    //                         // $MOrderPOQty111 = $MOrderQty1 - ($MOrderQtyPO - $MCancelQtyPO);

    //                         $PurchaseOrderDetail->OrderQty = $MOrderQty1;
    //                         $PurchaseOrderDetail->CancelQty = 0;
    //                         $PurchaseOrderDetail->Price = $Rsi->Price;
    //                         $PurchaseOrderDetail->EstPrice = $Rsi->EstPrice;
    //                         $PurchaseOrderDetail->BranchCode = $BranchCode;
    //                         $PurchaseOrderDetail->DepartmentName = $Rsi->DepartmentName;
    //                         $PurchaseOrderDetail->QID = $Rsi->QID;
    //                         $PurchaseOrderDetail->OrderID = $Rsi->ID;
    //                         $PurchaseOrderDetail->STKBuyOut = $Rsi->STKBuyOut ? $Rsi->STKBuyOut : '';
    //                         $PurchaseOrderDetail->ProductName = $Rsi->ProductName ? $Rsi->ProductName : '';
    //                         $PurchaseOrderDetail->Freight = $Rsi->Freight ? $Rsi->Freight : 0;
    //                         $PurchaseOrderDetail->GPAmount = $Rsi->GPAmount ? $Rsi->GPAmount : 0;
    //                         $PurchaseOrderDetail->VendorName = $Rsi->VendorName ? $Rsi->VendorName : '';
    //                         $PurchaseOrderDetail->VendorPrice = $Rsi->VendorPrice ? $Rsi->VendorPrice : 0;
    //                         $PurchaseOrderDetail->OurPrice = $Rsi->OurPrice ? $Rsi->OurPrice : 0;
    //                         $PurchaseOrderDetail->OriginName = $Rsi->OriginName ? $Rsi->OriginName : '';
    //                         $PurchaseOrderDetail->VPart = $Rsi->VPart ? $Rsi->VPart : '';
    //                         $PurchaseOrderDetail->CustomerNotes = $Rsi->CustomerNotes ? $Rsi->CustomerNotes : '';
    //                         $PurchaseOrderDetail->VendorNotes = $Rsi->VendorNotes ? $Rsi->VendorNotes : '';
    //                         $PurchaseOrderDetail->InternalBuyerNotes = $Rsi->InternalBuyerNotes ? $Rsi->InternalBuyerNotes : '';
    //                         $PurchaseOrderDetail->VendorCode = $Rsi->VendorCode ? $Rsi->VendorCode : '';
    //                         $PurchaseOrderDetail->VCategoryName = $Rsi->VCategoryName ? $Rsi->VCategoryName : '';
    //                         $PurchaseOrderDetail->GPRate = $Rsi->GPRate ? $Rsi->GPRate : 0;
    //                         $PurchaseOrderDetail->Alternative = $Rsi->Alternative ? $Rsi->Alternative : '';
    //                         $PurchaseOrderDetail->OurUOM = $Rsi->OurUOM ? $Rsi->OurUOM : '';
    //                         $PurchaseOrderDetail->DiscIncomePer = $Rsi->DiscIncomePer ? $Rsi->DiscIncomePer : 0;
    //                         $PurchaseOrderDetail->DiscIncomeAmt = $Rsi->DiscIncomeAmt ? $Rsi->DiscIncomeAmt : 0;
    //                         $PurchaseOrderDetail->IMPA = $Rsi->IMPA ? $Rsi->IMPA : '';
    //                         $PurchaseOrderDetail->PurchaseOrderNo = $MPONO;
    //                         $PurchaseOrderDetail->SNo = $Rsi->SNo ? $Rsi->SNo : 1;
    //                         $PurchaseOrderDetail->IMPAItemCode = $Rsi->IMPAItemCode ? $Rsi->IMPAItemCode : '';
    //                         $PurchaseOrderDetail->GodownCode = $GodownCode;

    //                         $MVendorPartNo = $Rsi->VendorPartNo ? $Rsi->VendorPartNo : '';

    //                         $PurchaseOrderDetail->VendorPartNo = $MVendorPartNo;
    //                         $PurchaseOrderDetail->save();

    //                         $Rsi->POMadeNo = $MPONO;
    //                         $Rsi->POMadeDate = $MPOMadeDate ? $MPOMadeDate : $PurchaseOrderDate;
    //                         $Rsi->Atten = $MCanPO;

    //                         $MMSNO1 = $Rsi->ID ? $Rsi->ID : '';
    //                         $MCancelQty = '';

    //                         $Rs5 = PurchaseOrderDetail::select(DB::raw('SUM(OrderQty) as MOrderQty'), DB::raw('SUM(CancelQty) as MCancelQty'))
    //                             ->where('ChargeNo', $PONo)
    //                             ->where('OrderID', $MMSNO1)
    //                             ->where('BranchCode', $BranchCode)
    //                             ->first();
    //                         if ($Rs5) {
    //                             // Access the sum values
    //                             $MOrderQty = $Rs5->MOrderQty;
    //                             $MCancelQty = $Rs5->MCancelQty;
    //                         } else {
    //                             $MOrderQty = 0;
    //                             $MCancelQty = 0;
    //                         }
    //                         $Rsi->OrderQtyPO = $MOrderQty;
    //                         $Rsi->CancelQtyPO = $MCancelQty;
    //                         $Rsi->save();

    //                     }

    //                 }



    //             }



    //         }

    //     }




    //     return response()->json([
    //         'Message' => 'Working Link',
    //         'PONO' => $PONo,
    //         'vsno' => $vsno,
    //     ]);

    // }

    public function Delivery_Orderdataget(Request $request)
    {
        $PVendorcode = 756;
        $PONO = $request->PONO;
        $BranchCode = Auth::user()->BranchCode;
        $DataMaster = OrderMasterModel::where('PONO', $PONO)->where('BranchCode', $BranchCode)->first();
        // $warehouse = GodownSetup::select('GodownCode', 'GodownName', 'PrinterName')->distinct()->get();
        $bankInfo = OrderMasterModel::select('BankInfo')
            ->where('BankInfo', '!=', null)
            ->where('BranchCode', '=', $BranchCode)
            ->orderBy('PONo', 'asc')
            ->orderBy('DispatchDate', 'asc')
            ->first();
        $bankdetails = '';


        $Table = DB::table('deliveryorderview')
            ->where('PONO', $PONO)
            ->where('BranchCode', $BranchCode)
            ->get();
        //info($Table);

        return response()->json([
            'PONO' => $PONO,
            'BranchCode' => $BranchCode,
            'DataMaster' => $DataMaster,
            'Table' => $Table,
            // 'PurchaseOrderMaster'=>$PurchaseOrderMaster,
            // 'warehouse' => $warehouse,
            // 'Datadetailsfirst' => $Datadetailsfirst,
            // 'bankInfo' => $bankInfo,
        ]);
    }
    public function Delivery_Order(Request $request)
    {
        //         $PVendorcode = 756;
        $PONO = $request->input('PONO');
        $BranchCode = Auth::user()->BranchCode;
        $DataMaster = OrderMasterModel::where('PONO', $PONO)->where('BranchCode', $BranchCode)->first();
        //         $Datadetails = OrderModel::where('PONO', $PONO)->where('BranchCode', $BranchCode)->get();
//         $Datadetailsfirst = OrderModel::where('PONO', $PONO)->where('BranchCode', $BranchCode)->first();
//         $warehouse = GodownSetup::select('GodownCode', 'GodownName', 'PrinterName')->distinct()->get();
        $PurchaseOrderMaster = PurchaseOrderMaster::Select('GstAmt', 'DeliveryCharges', 'NetAmount')->where('ChargeNo', $PONO)->where('BranchCode', $BranchCode)->get();
        // // dd($Datadetails);

        //         $bankInfo = OrderMasterModel::select('BankInfo')
//             ->where('BankInfo', '!=', null)
//             ->where('BranchCode', '=', $BranchCode)
//             ->orderBy('PONo', 'asc')
//             ->orderBy('DispatchDate', 'asc')
//             ->first();
//         $bankdetails = '';

        // dd($bankdetails);

        return view('purchase.DeliveryOrder', [
            'PONO' => $PONO,
            'BranchCode' => $BranchCode,
            'DataMaster' => $DataMaster,
            // 'Datadetails' => $Datadetails,
            'PurchaseOrderMaster' => $PurchaseOrderMaster,
            // 'sundata'=>$sundata,
            // 'warehouse' => $warehouse,
            // 'bankdetails' => $bankdetails,
            // 'Datadetailsfirst' => $Datadetailsfirst,
        ]);
    }
    public function PO_received_save(Request $request)
    {
        $BranchCode = Auth::user()->BranchCode;
        $WorkUser = Auth::user()->UserName;
        $ChargeNo = $request->ChargeNo;
        $PONO = $request->Pono;
        $tabledata = $request->datas;
        $DataMaster = OrderMasterModel::where('PONO', $ChargeNo)->where('BranchCode', $BranchCode)->first();
        info($DataMaster);
        info($ChargeNo);
        $PurchaseOrderMastersave = PurchaseOrderMaster::where('PurchaseOrderNo', $PONO)
            ->where('BranchCode', $BranchCode)
            ->get()
            ->first();

        if (!$PurchaseOrderMastersave) {
            $PurchaseOrderMastersave = new PurchaseOrderMaster;
            $PurchaseOrderMastersave->PurchaseOrderNo = $PONO;

            info('new');
        }

        // Rest of the code remains the same

        $PurchaseOrderMastersave->Date = $DataMaster->OrderDate;
        $PurchaseOrderMastersave->PORecDate = date('Y-m-d');
        $PurchaseOrderMastersave->PoRecTime = date('h-i-s');
        $PurchaseOrderMastersave->DueDate = $DataMaster->DueDate;
        $PurchaseOrderMastersave->VendorRefNo = $DataMaster->DueDate;
        $PurchaseOrderMastersave->VSNNo = $DataMaster->VSNNo;
        $PurchaseOrderMastersave->ChargeNo = $ChargeNo;
        $PurchaseOrderMastersave->CustomerName = $DataMaster->CustomerName;
        $PurchaseOrderMastersave->VesselName = $DataMaster->VesselName;
        $PurchaseOrderMastersave->VendorCode = $request->VendorCode;
        $PurchaseOrderMastersave->VendorName = $request->VendorName;
        $PurchaseOrderMastersave->VendorActCode = $DataMaster->VendorActCode;
        $PurchaseOrderMastersave->EventNo = $DataMaster->EventNo;
        $PurchaseOrderMastersave->QuoteNo = $DataMaster->QuoteNo;
        $PurchaseOrderMastersave->DepartmentName = $DataMaster->DepartmentName;
        $PurchaseOrderMastersave->Des = $DataMaster->Des;
        $PurchaseOrderMastersave->BranchCode = $BranchCode;
        $PurchaseOrderMastersave->OrderQty = $request->TotalQty;
        $PurchaseOrderMastersave->RecQty = $request->TotalRecQty;
        $PurchaseOrderMastersave->ReturnQty = $request->ReturnQty;
        $PurchaseOrderMastersave->CancelQty = $request->CancelQty;
        $PurchaseOrderMastersave->GodownCode = $request->GodownCode;
        $PurchaseOrderMastersave->PoRecAmt = $request->PoRecAmt;
        $PurchaseOrderMastersave->Terms = $request->Terms;
        $PurchaseOrderMastersave->GstPer = $request->GstPer;
        $PurchaseOrderMastersave->GstAmt = $request->GstAmt;
        $PurchaseOrderMastersave->DiscPer = $request->DiscPer;
        $PurchaseOrderMastersave->DiscAmt = $request->DiscAmt;
        $PurchaseOrderMastersave->DeliveryCharges = $request->DeliveryCharges;
        $PurchaseOrderMastersave->GrossAmt = $request->GrossAmt;
        $PurchaseOrderMastersave->ExchangeRateAdjustment = $request->TxtExchangeRateAdjustment;
        $PurchaseOrderMastersave->ChkPaymentPaid = $request->ChkPaymentPaid;
        $PurchaseOrderMastersave->PaidAmt = $request->PaidAmt;
        $PurchaseOrderMastersave->TotalReturnAmount = $request->TxtPurchaseReturn;
        $PurchaseOrderMastersave->RestockingCharges = $request->RestockingCharges;
        $PurchaseOrderMastersave->WorkUser = $WorkUser;
        $PurchaseOrderMastersave->NetAmount = $request->NetAmount;
        $PurchaseOrderMastersave->OKToPay = $request->OKToPay;
        $PurchaseOrderMastersave->ChkReceivedCompleted = $request->ChkReceivedCompleted;
        $PurchaseOrderMastersave->Link1 = $request->TxtLink1;
        $PurchaseOrderMastersave->Link2 = $request->TxtLink2;
        $PurchaseOrderMastersave->Link3 = $request->TxtLink3;
        $PurchaseOrderMastersave->Link4 = $request->TxtLink4;
        $PurchaseOrderMastersave->Link5 = $request->TxtLink5;
        $PurchaseOrderMastersave->Link6 = $request->TxtLink6;
        $PurchaseOrderMastersave->VendorComment = $request->TxtVendorComments;
        $PurchaseOrderMastersave->save();


        for ($i = 0; $i < count($tabledata); $i++) {

            $MItemName = $tabledata[$i]['ItemName'];
            if (strlen(trim($MItemName)) !== 0) {
                $MOrderID = $tabledata[$i]['ID'];
                info($MItemName);
                info($MOrderID);
                $PurchaseOrderDetail = PurchaseOrderDetail::where('ID', $MOrderID)->where('PurchaseOrderNo', $PONO)->where('BranchCode', $BranchCode)->first();

                if (!$PurchaseOrderDetail) {
                    $PurchaseOrderDetail = new PurchaseOrderDetail();
                    $PurchaseOrderDetail->PurchaseOrderNo = $PONO;
                }
                // info('new');

                // info('old');
                $PurchaseOrderDetail->Date = $request->POdate;
                $PurchaseOrderDetail->GodownCode = $request->GodownCode;
                $PurchaseOrderDetail->VSNNo = $request->vsno;
                $PurchaseOrderDetail->EventNo = $request->EventNo;
                $PurchaseOrderDetail->QuoteNo = $request->QuoteNo;
                $PurchaseOrderDetail->ChargeNo = $request->ChargeNo;
                $PurchaseOrderDetail->DepartmentName = $request->DepartmentName;
                $PurchaseOrderDetail->ChkRcvd = $tabledata[$i]['Rcvd'];
                $PurchaseOrderDetail->ItemCode = $tabledata[$i]['Itemcode'];
                $PurchaseOrderDetail->ItemName = $MItemName;
                $PurchaseOrderDetail->PUOM = $tabledata[$i]['Puom'];
                $PurchaseOrderDetail->OrderQty = $tabledata[$i]['Orderqty'];
                $PurchaseOrderDetail->RecQty = $tabledata[$i]['Recvdqty'];
                $PurchaseOrderDetail->ReturnQty = $tabledata[$i]['Returnqty'];
                $PurchaseOrderDetail->NotRecQty = $tabledata[$i]['NotRecvdqty'];
                $PurchaseOrderDetail->OverQty = $tabledata[$i]['Overqty'];
                $PurchaseOrderDetail->VendorName = $request->VendorName;
                $PurchaseOrderDetail->VendorPrice = $tabledata[$i]['CostPrice'];
                $PurchaseOrderDetail->EstPrice = $tabledata[$i]['Amount'];
                $PurchaseOrderDetail->OrderID = $tabledata[$i]['OrderID'];
                $PurchaseOrderDetail->QID = $tabledata[$i]['QuoteID'];
                $PurchaseOrderDetail->VendorCode = $request->VendorCode;
                $PurchaseOrderDetail->Price = $tabledata[$i]['SellPrice'];
                $PurchaseOrderDetail->SNO = $tabledata[$i]['Sno'];
                $PurchaseOrderDetail->CancelQty = $tabledata[$i]['Cancelqty'];
                $PurchaseOrderDetail->IMPAItemCode = $tabledata[$i]['IMPA'];
                $PurchaseOrderDetail->CustomerNotes = $tabledata[$i]['CustomerNote'];
                $PurchaseOrderDetail->BranchCode = $BranchCode;
                $PurchaseOrderDetail->ChkPaymentPaid = $request->ChkPaymentPaid;

                $PurchaseOrderDetail->save();

                // info('OrderDetail saved');
            } else {
                info('itemnotfound');
            }

        }

        // $PurchaseOrderDetail = PurchaseOrderDetail::where('PurchaseOrderNo',$PONO)->where('BranchCode',$BranchCode)->get();

        // if ($PurchaseOrderDetail->count() > 0) {
        //     for ($i=0; $i <count($PurchaseOrderDetail) ; $i++) {
        //     $PurchaseOrderDetail->updateOrCreate([
        //                 'PurchaseOrderNo' => $PONO,
        //                 'Date' => $request->Date,
        //                 'GodownCode' => $request->GodownCode,
        //                 'VSNNo' => $request->VSNNo,
        //                 'EventNo' => $request->EventNo,
        //                 'QuoteNo' => $request->QuoteNo,
        //                 'ChargeNo' => $request->ChargeNo,
        //                 'DepartmentName' => $request->DepartmentName,
        //                 'ChkRcvd' => $tabledata->Rcvd,
        //                 'ItemCode' => $tabledata->ItemCode,
        //                 'ItemName' => $MItemName,
        //                 'PUOM' => $tabledata->PUOM,
        //                 'OrderQty' => $tabledata->OrderQty,
        //                 'RecQty' => $tabledata->RecQty,
        //                 'ReturnQty' => $tabledata->ReturnQty,
        //                 'NotRecQty' => $tabledata->NotRecQty,
        //                 'OverQty' => $tabledata->OverQty,
        //                 'VendorName' => $request->VendorName,
        //                 'VendorPrice' => $tabledata->VendorPrice,
        //                 'EstPrice' => $tabledata->EstPrice,
        //                 'OrderID' => $tabledata->PurchaseOrderID,
        //                 'QID' => $tabledata->QuoteID,
        //                 'VendorCode' => $request->VendorCode,
        //                 'Price' => $tabledata->EAPrice,
        //                 'SNO' => $tabledata->SNO,
        //                 'CancelQty' => $tabledata->CancelQty,
        //                 'IMPAItemCode' => $tabledata->IMPAItemCode,
        //                 'CustomerNotes' => $tabledata->CustomerNotes,
        //                 'BranchCode' => $BranchCode,
        //                 'ChkPaymentPaid' => $request->ChkPaymentPaid,
        //             ]);
        // }
        // }

        //     $PurchaseOrderDetail = PurchaseOrderDetail::where('PurchaseOrderNo', $PONO)
        // ->where('BranchCode', $BranchCode)
        // ->get()
        // ->each(function ($detail, $tabledata, $PONO, $request, $BranchCode) {
        //     $MItemName = $tabledata->ItemName;
        //     $MOrderQty = $tabledata->Orderqty;
        //     $detail->updateOrCreate([
        //         'PurchaseOrderNo' => $PONO,
        //         'Date' => $request->Date,
        //         'GodownCode' => $request->GodownCode,
        //         'VSNNo' => $request->VSNNo,
        //         'EventNo' => $request->EventNo,
        //         'QuoteNo' => $request->QuoteNo,
        //         'ChargeNo' => $request->ChargeNo,
        //         'DepartmentName' => $request->DepartmentName,
        //         'ChkRcvd' => $tabledata->Rcvd,
        //         'ItemCode' => $tabledata->ItemCode,
        //         'ItemName' => $MItemName,
        //         'PUOM' => $tabledata->PUOM,
        //         'OrderQty' => $tabledata->OrderQty,
        //         'RecQty' => $tabledata->RecQty,
        //         'ReturnQty' => $tabledata->ReturnQty,
        //         'NotRecQty' => $tabledata->NotRecQty,
        //         'OverQty' => $tabledata->OverQty,
        //         'VendorName' => $request->VendorName,
        //         'VendorPrice' => $tabledata->VendorPrice,
        //         'EstPrice' => $tabledata->EstPrice,
        //         'OrderID' => $tabledata->PurchaseOrderID,
        //         'QID' => $tabledata->QuoteID,
        //         'VendorCode' => $request->VendorCode,
        //         'Price' => $tabledata->EAPrice,
        //         'SNO' => $tabledata->SNO,
        //         'CancelQty' => $tabledata->CancelQty,
        //         'IMPAItemCode' => $tabledata->IMPAItemCode,
        //         'CustomerNotes' => $tabledata->CustomerNotes,
        //         'BranchCode' => $BranchCode,
        //         'ChkPaymentPaid' => $request->ChkPaymentPaid,
        //     ]);
        // });

        // Select * from OrderDetail where ID=" & Val(MOrderID) & " and PONo=" & Val(TxtChargeNO.Text) & " and BranchCode
        // ->each(function ($detail, $tabledata, $PONO, $request, $BranchCode) {
        //     $MItemName = $tabledata->ItemName;
        //     $MOrderQty = $tabledata->Orderqty;

        for ($i = 0; $i < count($tabledata); $i++) {

            $MItemName = $tabledata[$i]['ItemName'];
            $MOrderID = $tabledata[$i]['OrderID'];
            if (strlen(trim($MOrderID)) !== 0) {
                $OrderDetail = OrderModel::where('ID', $MOrderID)
                    ->where('BranchCode', $BranchCode)
                    ->first();
                if (!$OrderDetail) {
                    $OrderDetail = new OrderModel();
                }
                $OrderDetail->TotalCost = (float) $tabledata[$i]['TotalCost'];
                $OrderDetail->ItemName = $MItemName;
                $OrderDetail->PUOM = $tabledata[$i]['Puom'];
                $OrderDetail->VendorPrice = (float) $tabledata[$i]['CostPrice'];
                $OrderDetail->OurPrice = (float) $tabledata[$i]['CostPrice'];
                $OrderDetail->VendorCode = $tabledata[$i]['VendorCode'];
                $OrderDetail->VendorName = $tabledata[$i]['vendorname'];
                $result = PurchaseOrderDetail::selectRaw('SUM(RecQty) as MRecQty, SUM(MoveToStock) as MMoveToStock, SUM(ReturnQty) as MReturnQty')
                    ->where('OrderID', $MOrderID)
                    ->where('ChargeNo', $request->ChargeNo)
                    ->where('VSNNo', $request->vsno)
                    ->where('BranchCode', $BranchCode)
                    ->first();
                if ($result->MRecQty == !null) {
                    $MRecQty1 = $result->MRecQty;
                } else {
                    $MRecQty1 = "";
                }
                if ($result->MReturnQty == !null) {
                    $MReturnQty = $result->MReturnQty;
                } else {
                    $MReturnQty = "";
                }
                if ($result->MMoveToStock == !null) {
                    $MMoveToStock = $result->MMoveToStock;
                } else {
                    $MMoveToStock = "";
                }
                $MRecQty = (int) ($MRecQty1) - (int) ($MMoveToStock);


                $OrderDetail->RecQty = ((int) ($MRecQty1)) - (((int) ($MReturnQty)) + (int) ($tabledata[$i]['Cancelqty']) + (int) ($MMoveToStock));
                $OrderDetail->POMadeNo = $request->Pono;
                $OrderDetail->NotRecQty = ((int) ($tabledata[$i]['Orderqty'])) - ((int) ($tabledata[$i]['Recvdqty']));
                $OrderDetail->OverQty = $tabledata[$i]['Overqty'];
                $OrderDetail->save();
                //         $OrderDetail = OrderModel::where('ID', $MOrderID)
                //     ->where('BranchCode', $BranchCode)
                //     ->first()->updateOrCreate([
                //     'TotalCost' => $tabledata[$i]['TotalCost'],
                //     'ItemName' => $MItemName,
                //     'PUOM' => $tabledata[$i]['Puom'],
                //     'VendorPrice' => $tabledata[$i]['CostPrice'],
                //     'OurPrice' => $tabledata[$i]['CostPrice'],
                //     'VendorCode' => $tabledata[$i]['VendorCode'],
                //     'VendorName' => $tabledata[$i]['vendorname'],
                //     // 'VendorActCode' => $tabledata[$i]['VendorCode'],

                // ]);
            }
        }
        $statusc = OrderMasterModel::where('PONo', $request->ChargeNo)->where('BranchCode', $BranchCode)->first();
        if ($statusc) {
            $statusc->Status = "PO RECEIVED";
            $statusc->StatusColorCode = "-128";
            $statusc->StatusCode = 3;
            $statusc->save();
        }




        return response()->json([
            'Message' => 'Updated',

        ]);

    }
    public function getvendorsetup(Request $request)
    {
        $BranchCode = Auth::user()->BranchCode;

        $VendorCode = $request->input('VendorCode');
        $PONO = $request->input('PONO');
        info($PONO);
        $VenderSetup = DB::table('vendersetup')
        ->select('Terms')
        ->where('VenderCode', $VendorCode)
        ->where('BranchCode', $BranchCode)
        ->first();
 $purchaseOrderNoa = DB::table('purchaseordermaster')

                                ->where('ChkReceivedCompleted', 1)

                                ->where('PurchaseOrderNo', $PONO)

                                ->where('BranchCode', $BranchCode)

                                ->first();

                            if ($purchaseOrderNoa) {

                                $PurchaseOrderNo = $purchaseOrderNoa->PurchaseOrderNo;

                            } else {

                                $PurchaseOrderNo = Null;

                            }

                            return response()->json([
                                  'status' => 'success',
                                'VenderSetupterms' => $VenderSetup,
                                'PurchaseOrderNo' => $PurchaseOrderNo,
                            ]);

    }
    public function PORecDataget(Request $request)
    {
        $PONO = $request->input('PONO');
        $ChargeNo = $request->input('charge');

        $PVendorcode = 756;
        $BranchCode = Auth::user()->BranchCode;


        // $PurchaseOrderDetailfirst = PurchaseOrderDetail::where('PurchaseOrderNo', $PONO)
        //     ->where('BranchCode', $BranchCode)
        //     ->orderBy('SNO')
        //     ->orderBy('ID')
        //     ->first();
        // $VendorCode = 0;
        // $VendorName = '';

        // $DataMaster = OrderMasterModel::where('PONO', $PONO)->where('BranchCode', $BranchCode)->first();
        // $Datadetails = OrderModel::where('PONO', $PONO)->where('BranchCode', $BranchCode)->get();
        // $Datadetailsfirst = OrderModel::where('PONO', $PONO)->where('BranchCode', $BranchCode)->first();
        // $VendorCode = $PurchaseOrderDetailfirst->VendorCode;
        // $VendorName = $PurchaseOrderDetailfirst->VendorName;
        // if (count($PurchaseOrderDetail) > 0) {
        //     $DataMaster = OrderMasterModel::where('PONO', $ChargeNo)->where('BranchCode', $BranchCode)->first();
        //     $Datadetails = OrderModel::where('PONO', $ChargeNo)->where('BranchCode', $BranchCode)->get();
        //     $Datadetailsfirst = OrderModel::where('PONO', $ChargeNo)->where('BranchCode', $BranchCode)->first();
        //     // $VenderSetup = VenderSetup::select('Terms')->where('VenderCode',$VendorCode)->where('BranchCode',$BranchCode)->first();
        // }
        // $PurchaseOrderMaster = PurchaseOrderMaster::where('PurchaseOrderNo', $PONO)->where('BranchCode', $BranchCode)->first();

        // $bankInfo = OrderMasterModel::select('BankInfo')
        //     ->where('BankInfo', '!=', null)
        //     ->where('BranchCode', '=', $BranchCode)
        //     ->orderBy('PONo', 'asc')
        //     ->orderBy('DispatchDate', 'asc')
        //     ->first();
        // $bankdetails = '';

       $PurchaseOrderMaster = DB::table('QryPurchaseOrderMaster')->where('PurchaseOrderNo',$PONO)->where('BranchCode',$BranchCode)->first();
       if($PurchaseOrderMaster){
            $VSNNo = $PurchaseOrderMaster->VSNNo;
           $flipToVSN = FlipToVSN::where('VSNNo', $VSNNo)->where('BranchCode', $BranchCode)->first();
        }else{
           $flipToVSN = Null;

       }
        $PurchaseOrderDetail = PurchaseOrderDetail::whereRaw('(IFNULL(OrderQty, 0) - IFNULL(CancelQty, 0)) > 0')
            ->where('PurchaseOrderNo', $PONO)
            ->where('BranchCode', $BranchCode)
            ->orderBy('SNO')
            ->orderBy('ID')
            ->get();

        return response()->json([
            'PurchaseOrderMaster'=>$PurchaseOrderMaster,
            'PurchaseOrderDetail'=>$PurchaseOrderDetail,
            'flipToVSN'=>$flipToVSN,
        ]);
    }
    public function PO_received(Request $request)
    {
        $PONO = $request->PONO;
        $ChargeNo = $request->charge;
        $BranchCode = Auth::user()->BranchCode;

        $FixAccountSetup = FixAccountSetup::where('BranchCode', $BranchCode)->first();

        return view('purchase.PO_Received', [
            'ChargeNo' => $ChargeNo,
            'PONO' => $PONO,
            'BranchCode' => $BranchCode,
            'FixAccountSetup' => $FixAccountSetup,
        ]);
    }
    public function DeliveryOrdersave(Request $request)
    {




        $tabledata = $request->data;



        $PVendorcode = 756;
        $CostAmt = $request->CostAmt;
        $BranchCode = Auth::user()->BranchCode;
        $WorkUser = Auth::user()->UserName;
        $PONO = $request->Pono;
        $deliverydate = $request->deliverydate;
        $deliveryTime = $request->deliveryTime;
        $DispatchTime = $request->DispatchTime;
        $DispatchDate = $request->DispatchDate;
        $VSNNo = $request->vsno;
        $ChargeNo = $request->ChargeNo;
        $EventNo = $request->EventNo;
        $QuoteNo = $request->QuoteNo;
        $CustomerCode = $request->CustomerCode;
        $CustomerName = $request->CustomerName;
        $Des = $request->Description;
        $VesselName = $request->VesselName;
        $OrderQty = $request->TotalQty;
        $RecQty = $request->TotalRecQty;
        $NotRecQty = $request->TotalNotRecQty;
        $status = $request->status;
        $RefNo = $request->RefNo;
        $Bankinfo = $request->Bankinfo;
        $OrderDate = $request->OrderDate;
        $VendorActCode = $request->VendorActCode;
        $MChkSevenDelivery = $request->MChkSevenDelivery;
        $MChkSevenDelivery = $request->MChkSevenDelivery;
        $BillingAddress = $request->TxtBillingAddress;
        $BillingCompany = $request->TxtBillingCompany;
        $VATAmt = $request->VATAmt;
        $NetAmount = $request->NetAmount;
        $Atten = $request->TxtAtten;
        $VATPer = $request->VATPer;
        $InvDiscAmt = $request->InvDiscAmt;
        $InvDiscPer = $request->InvDiscPer;
        $Terms = $request->Terms;
        $DeliveryOrderNo = $request->DeliveryOrderNo;
        $DeliveryCharges = $request->DeliveryCharges;
        $PaidAmt = $request->PaidAmt;
        $ReceivedAmt = $request->ReceivedAmt;
        $GPCostAmt = $request->GPCostAmt;
        $Alldata = $request->all();
        $DeliveredQty = $request->DeliveredQty;
        $TotGPAmt = $request->TotGPAmt;
        $TxtGPPer = $request->TxtGPPer;
        $DepartmentName = $request->DepartmentName;

        // info('Get data',$Alldata);
        if ($request->ajax()) {
            info($CustomerCode);
            if ($CustomerCode == 0) {
                $customerdata = Customer::where('CustomerName', $CustomerName)->where('BranchCode', $BranchCode)->first();

            } else {
                $customerdata = Customer::where('CustomerCode', $CustomerCode)->where('BranchCode', $BranchCode)->first();
            }
            info($customerdata);
            $ActCode = $customerdata->ActCode;
            if ($ChargeNo == 0) {
                // info('0');

                $InvoiceNo = DB::select("Select max(InvoiceNo) as MInvNo from DeliveryOrderMaster where BranchCode='$BranchCode'");
                $MInvNo = $InvoiceNo[0]->MInvNo;
                if ($MInvNo === null) {
                    $MInvoiceNo = 1;
                } else {
                    $MInvoiceNo = $MInvNo + 1;
                }
            } else {
                $MInvoiceNo = $ChargeNo;
                // info('old');
                // info($ChargeNo);
            }

            // $invoiceNo = (int)$request->input('TxtInvoiceNo');
// $branchCode = (int)$request->input('MBranchCode');

            $deliveryOrderMaster = DeliveryOrderMaster::where('InvoiceNo', $MInvoiceNo)->where('BranchCode', $BranchCode)->first();

            if (!$deliveryOrderMaster) {
                $deliveryOrderMaster = new DeliveryOrderMaster;
                $deliveryOrderMaster->InvoiceNo = $MInvoiceNo;
            }

            $deliveryOrderMaster->DispatchDate = $DispatchDate;
            $deliveryOrderMaster->DispatchTime = $DispatchTime;
            $deliveryOrderMaster->CustomerActCode = $ActCode;
            $deliveryOrderMaster->RefNo = $RefNo;
            $deliveryOrderMaster->Date = $DispatchDate;
            $deliveryOrderMaster->VSNNo = (int) $VSNNo;
            $deliveryOrderMaster->ChargeNo = (int) $ChargeNo;
            $deliveryOrderMaster->EventNo = (int) $EventNo;
            $deliveryOrderMaster->QuoteNo = (int) $QuoteNo;
            $deliveryOrderMaster->CustomerCode = (int) $CustomerCode;
            $deliveryOrderMaster->CustomerName = $CustomerName;
            $deliveryOrderMaster->Des = $Des;
            $deliveryOrderMaster->BranchCode = $BranchCode;
            $deliveryOrderMaster->VesselName = $VesselName;
            $deliveryOrderMaster->OrderQty = (int) $OrderQty;
            $deliveryOrderMaster->RecQty = (int) $RecQty;
            $deliveryOrderMaster->NotRecQty = (int) $NotRecQty;
            $deliveryOrderMaster->DeliveredQty = (int) $DeliveredQty;
            $deliveryOrderMaster->TotGPAmt = (int) $TotGPAmt;
            $deliveryOrderMaster->GPCostAmt = (int) $GPCostAmt;
            $deliveryOrderMaster->VendorActCode = $VendorActCode;
            $deliveryOrderMaster->ChkDirectDelivery = false;
            $deliveryOrderMaster->WorkUser = $WorkUser;

            $deliveryOrderMaster->save();

            // info('D O Master Data',$deliveryOrderMaster);

            //check again
            $order = OrderMasterModel::where('PONO', $MInvoiceNo)
                ->where('BranchCode', $BranchCode)
                ->where('VSNNo', $VSNNo)
                ->first();

            if ($order) {
                $order->DispatchDate = $DispatchDate;
                $order->DispatchTime = $DispatchTime;
                $order->OrderDate = $OrderDate;
                $order->InvDiscPer = $InvDiscPer;
                $order->InvDiscAmt = $InvDiscAmt;
                if ($status == "DELIVERED") {
                    $order->Status = $status;
                    $order->StatusColorCode = "-15154944";
                    $order->StatusCode = 4;
                } else {
                    $order->Status = $status;
                    $order->StatusColorCode = "-15154944";
                    $order->StatusCode = 4;
                }
                $order->ChkSevenSeasDelivery = $MChkSevenDelivery ? 1 : 0;
                $order->VATPer = $VATPer;
                $order->VATAmt = $VATAmt;
                $order->NetAmount = $NetAmount;
                $order->ExtAmount = $NetAmount;
                $order->DeliveredQty = $DeliveredQty;
                $order->CustomerActCode = $ActCode;
                $order->CustomerCode = $CustomerCode;
                $order->VesselName = $VesselName;
                $order->Atten = $Atten;
                $MSoldQty = $DeliveredQty - (is_null($order->RtnQty) ? 0 : $order->RtnQty) + (is_null($order->MissingQty) ? 0 : $order->MissingQty);
                $order->SoldQty = $MSoldQty;
                $order->Terms = $Terms;
                $order->DeliveryOrderNo = $DeliveryOrderNo;
                $order->TotGPAmt = $TotGPAmt;
                $order->DeliveryCharges = $DeliveryCharges;
                $order->GPPer = $TxtGPPer;
                $order->CostAmt = $CostAmt;
                $order->GPCostAmt = $GPCostAmt;
                $order->VendorActCode = $VendorActCode;
                $order->ChkDirectDelivery = false;
                $order->Des = $Des;
                $order->ReceivedAmt = $ReceivedAmt;
                $order->PaidAmt = $PaidAmt;

                if ($Bankinfo != "") {
                    $order->BankInfo = $Bankinfo;
                }
                $order->BContactPerson = $BillingCompany;
                $order->BillingAddress = $BillingAddress;
                $order->save();

            }
            // info(' Order master Data',$order);
            info($tabledata);

            // check again
            for ($a = 0; $a < count($tabledata); $a++) {
                info($tabledata[$a]);
                $mItemName = $tabledata[$a]['ItemName'];
                // $GPCostAmt = $request->Deliveryqty;
                $DeliveredAmount = $tabledata[$a]['Amount'];
                $GPRates = $tabledata[$a]['GPPer'];
                $gpamounts = $tabledata[$a]['GPAmt'];
                // $DepartmentName = $tabledata[$a]['DepartmentName'];
                $Prices = $tabledata[$a]['rate'];
                $PUOMs = $tabledata[$a]['Puom'];
                $CostPrices = $tabledata[$a]['CostPriceNew'];
                $DiscIncomePer = $tabledata[$a]['DiscPer'];
                $DiscIncomeAmt = $tabledata[$a]['DiscAmt'];
                $Deliveryqty = $tabledata[$a]['Deliveryqty'];
                $NotRecvdqty = $tabledata[$a]['NotRecvdqty'];




                if (strlen(trim($mItemName)) !== 0) {
                    $mOrderId = (int) $tabledata[$a]['PurchaseOrderID'];
                    $orderDetail = OrderModel::where('ID', $mOrderId)
                        ->where('PONO', (int) $MInvoiceNo)
                        ->where('BranchCode', $BranchCode)
                        ->first();

                    if (!$orderDetail) {
                        $orderDetail = new OrderModel();
                    }

                    $orderDetail->PONO = (int) $MInvoiceNo;
                    $orderDetail->OrderDate = $OrderDate;
                    $orderDetail->DepartmentName = $DepartmentName;
                    $orderDetail->GPCostAmt = (float) $GPCostAmt;
                    $orderDetail->PUOM = $PUOMs;
                    $orderDetail->DeliveredQty = (float) $Deliveryqty;
                    $orderDetail->NotRecQty = (float) $NotRecvdqty;
                    $orderDetail->SoldQty = (float) $orderDetail->DeliveredQty - ($orderDetail->ReturnQty ?? 0 + $orderDetail->MissingQty ?? 0);
                    $orderDetail->GPRate = (float) $GPRates;
                    $orderDetail->GpAmount = (float) $gpamounts;
                    $orderDetail->CostPrice = (float) $CostPrices;
                    $orderDetail->Price = (float) $Prices;
                    $orderDetail->DeliveredAmount = (float) $DeliveredAmount;
                    $orderDetail->DiscIncomePer = (float) $DiscIncomePer;
                    $orderDetail->DiscIncomeAmt = (float) $DiscIncomeAmt;
                    $orderDetail->BranchCode = $BranchCode;
                    $orderDetail->save();
                }
                // info(' orderDetail Data',$orderDetail);

            }

            // info('lst');

            return response()->json([
                'Message' => 'Updated',
                'ordermaster' => $order,
                'Alldata' => $Alldata,
                'MInvoiceNo' => $MInvoiceNo,
                'orderDetail' => $orderDetail,
                'deliveryOrderMaster' => $deliveryOrderMaster,
            ]);
        }
        // dd($DeliveryOM);
    }
    public function Final_invoiceDataget(Request $request)
    {
        $PVendorcode = 756;
        $BranchCode = Auth::user()->BranchCode;
        $PONO = $request->input('PONO');
        $DataMaster = OrderMasterModel::where('PONO', $PONO)->where('BranchCode', $BranchCode)->first();
        $Datadetails = OrderModel::where('PONO', $PONO)->where('BranchCode', $BranchCode)->get();
        // $DeliveryOrderMaster = DeliveryOrderMaster::where('InvoiceNo', $PONO)->where('BranchCode', $BranchCode)->first();

        $warehouse = GodownSetup::select('GodownCode', 'GodownName', 'PrinterName')->distinct()->get();
        // $Datadetailsfirst = OrderModel::where('PONO', $PONO)->where('BranchCode', $BranchCode)->first();

        // $bankInfo = OrderMasterModel::select('BankInfo')
        //     ->where('BankInfo', '!=', null)
        //     ->where('BranchCode', '=', $BranchCode)
        //     ->orderBy('PONo', 'asc')
        //     ->orderBy('DispatchDate', 'asc')
        //     ->first();
        $bankdetails = '';

           $MGstAmt = DB::table('purchaseordermaster')->where('ChargeNo',$PONO)->where('BranchCode',$BranchCode)->Sum('GstAmt');
           $MPODeliveryCharges = DB::table('purchaseordermaster')->where('ChargeNo',$PONO)->where('BranchCode',$BranchCode)->Sum('DeliveryCharges');
           $NetAmount = DB::table('purchaseordermaster')->where('ChargeNo',$PONO)->where('BranchCode',$BranchCode)->Sum('NetAmount');
           $MPOHandlingCharges = DB::table('purchaseordermaster')->where('ChargeNo',$PONO)->where('BranchCode',$BranchCode)->Sum('deliverycharges2');
           $MPOReturnAmt = DB::table('purchaseordermasterreturn')->where('ChargeNo',$PONO)->where('BranchCode',$BranchCode)->Sum('NetAmount');

        return response()->json([
            'PONO' => $PONO,
            'DataMaster' => $DataMaster,
            'warehouse' => $warehouse,
            'Datadetails' => $Datadetails,
            'BranchCode' => $BranchCode,
            'bankdetails' => $bankdetails,
            'MGstAmt' => $MGstAmt,
            'MPODeliveryCharges' => $MPODeliveryCharges,
            'NetAmount' => $NetAmount,
            'MPOHandlingCharges' => $MPOHandlingCharges,
            'MPOReturnAmt' => $MPOReturnAmt,
            // 'DeliveryOrderMaster' => $DeliveryOrderMaster,
            // 'Datadetailsfirst' => $Datadetailsfirst,
        ]);
    }
    public function Final_invoice(Request $request)
    {
        $PVendorcode = 756;
        $BranchCode = Auth::user()->BranchCode;
        $PONO = $request->PONO;
        // $DataMaster = OrderMasterModel::where('PONO', $PONO)->where('BranchCode', $BranchCode)->first();
        // $Datadetails = OrderModel::where('PONO', $PONO)->where('BranchCode', $BranchCode)->get();
        // $DeliveryOrderMaster = DeliveryOrderMaster::where('InvoiceNo', $PONO)->where('BranchCode', $BranchCode)->first();

        $warehouse = GodownSetup::select('GodownCode', 'GodownName', 'PrinterName')->distinct()->where('BranchCode', $BranchCode)->get();
        $TermsSetup = termssetup::where('BranchCode', $BranchCode)->get();
        $FixAccountSetup = FixAccountSetup::where('BranchCOde', $BranchCode)->first();
        // $bankInfo = OrderMasterModel::select('BankInfo')
        //     ->where('BankInfo', '!=', null)
        //     ->where('BranchCode', '=', $BranchCode)
        //     ->orderBy('PONo', 'asc')
        //     ->orderBy('DispatchDate', 'asc')
        //     ->first();
        $bankdetails = '';

        return view('purchase.FinalInvoice', [
            'PONO' => $PONO,
            'TermsSetup' => $TermsSetup,
            'warehouse' => $warehouse,
            'FixAccountSetup' => $FixAccountSetup,
            'BranchCode' => $BranchCode,
            'bankdetails' => $bankdetails,
            // 'Datadetailsfirst' => $Datadetailsfirst,
            // 'DeliveryOrderMaster' => $DeliveryOrderMaster,
        ]);
    }

    public function CheckTerms(Request $request)
    {
        $MTerms = $request->MTerms;
        info('s');
        info($MTerms);
        $MTermsValid = $request->MTermsValid;
        $BranchCode = Auth::user()->BranchCode;
        $Days = termssetup::select('Days')->where('Terms', $MTerms)->where('BranchCode', $BranchCode)->first();
        $day = 'monday';
        if ($Days) {

            $day = $Days->Days;
        }

        if ($MTerms) {

            $rs = termssetup::select('TermsCode')
                ->where('Terms', $MTerms)
                ->where('BranchCode', $BranchCode)
                ->first();

            $termsco = $rs->TermsCode;
        } else {
            $termsco = null;
        }


        if ($termsco) {
            $PTermsCode = $termsco;
            $Message = null;
        } else {
            $PTermsCode = "";
            $Message = "Please Select Terms From List Box Terms is Not in Valid Format";
            $MTermsValid = false;
        }
        return response()->json([
            'Message' => $Message,
            'PTermsCode' => $PTermsCode,
            'MTermsValid' => $MTermsValid,
            'MTerms' => $MTerms,
            'day' => $day,

        ]);
    }


    public function InvoiceSave(Request $request)
    {
        if (request()->ajax()) {
            $PVendorcode = 756;
            $BranchCode = Auth::user()->BranchCode;
            $MWorkUser = Auth::user()->UserName;
            $tabledata = request('Tabledata');
            $invoiceNo = request('TxtInvoiceNo');

            $deliveryOrder = DeliveryOrderMaster::where('InvoiceNo', $invoiceNo)
                ->where('BranchCode', $BranchCode)
                ->first();


            if (!$deliveryOrder) {
                $deliveryOrder = new DeliveryOrderMaster();
                $deliveryOrder->InvoiceNo = $invoiceNo;
            }

            $deliveryOrder->RtnDate = request('TxtRtnDate');
            $deliveryOrder->RtnTime = request('TxtRtnTime');
            $deliveryOrder->RefNo = request('TxtRefNo');
            $deliveryOrder->Date = request('TxtDispatchDate');
            $deliveryOrder->VSNNo = intval(request('TxtVSNNo'));
            $deliveryOrder->ChargeNo = intval(request('TxtChargeNO'));
            $deliveryOrder->EventNo = intval(request('TxtEventNo'));
            $deliveryOrder->QuoteNo = intval(request('TxtQuoteNO'));
            $deliveryOrder->CustomerCode = intval(request('TxtActCode'));
            $deliveryOrder->CustomerName = request('TxtActName');
            $deliveryOrder->CustomerActCode = request('TxtActCodeNew');
            $deliveryOrder->Des = request('TxtDescription');
            $deliveryOrder->BranchCode = $BranchCode;
            $deliveryOrder->WorkUser = $MWorkUser;
            $deliveryOrder->VesselName = request('LblVesselName');
            $deliveryOrder->OrderQty = intval(request('TxtTotalQty'));
            $deliveryOrder->RecQty = intval(request('TxtTotalRecQty'));
            $deliveryOrder->NotRecQty = intval(request('TxtTotalNotRecQty'));
            $deliveryOrder->DeliveredQty = intval(request('TxtDeliveredQty'));
            $deliveryOrder->ReturnQty = intval(request('TxtTotRtnQty'));
            $deliveryOrder->MissingQty = intval(request('TxtTotMissingQty'));
            $deliveryOrder->SoldQty = intval(request('TxtTotSoldQty'));
            $deliveryOrder->TotGPAmt = intval(request('TxtTotalGPAmt'));
            $deliveryOrder->VendorActCode = '';
            $deliveryOrder->ChkDirectDelivery = false;
            $deliveryOrder->Status = 'INVOICED';
            $deliveryOrder->save();

            // info($deliveryOrder);
            // info("deliveryOrder save");


            $invoiceNo = intval(request('TxtInvoiceNo'));
            $branchCode = intval(request('MBranchCode'));

            $order = OrderModel::where('PONO', $invoiceNo)
                ->where('BranchCode', $branchCode)
                ->first();

            if ($order) {
                $order->InvDate = request('TxtRtnDate');
                $order->InvTime = request('TxtRtnTime');
                $order->DueDate = request('TxtDueDate');
                $order->OrderDate = request('TxtOrderDate');
                $order->InvDiscPer = intval(request('TxtInvDiscPer'));
                $order->InvDiscAmt = intval(request('TxtDiscAmt'));
                $order->NetAmount = intval(request('TxtNetAmount'));
                $order->ExtAmount = intval(request('TxtNetAmount'));
                $order->Terms = request('CmbTerms');
                $order->DeliveredQty = intval(request('TxtDeliveredQty'));
                $order->RtnQty = intval(request('TxtTotRtnQty'));
                $order->MissingQty = intval(request('TxtTotMissingQty'));
                $order->SoldQty = intval(request('TxtTotSoldQty'));
                $order->TotGPAmt = intval(request('TxtTotalGPAmt'));
                $order->VendorActCode = '';
                $order->CustomerActCode = request('TxtActCodeNew');
                $order->CustomerCode = intval(request('TxtActCode'));
                $order->CustomerName = request('TxtActName');
                $order->VesselName = request('LblVesselName');
                $order->GodownCode = intval(request('TxtGodownCode'));
                $order->GodownName = request('CmbGodownName');
                $order->DeliveryCharges = intval(request('TxtDeliveryCharges'));
                $order->GpPer = intval(request('TxtGPPer'));
                $order->CostAmt = intval(request('TxtTotCostAmt'));
                $order->GPCostAmt = intval(request('TxtGPCostAmt'));
                $order->CostAmount = intval(request('TxtGPCostAmt'));
                $order->ChkDirectDelivery = false;
                $order->Des = request('TxtDescription');
                $order->CrNoteAmt = intval(request('TxtCrNoteAmt'));
                $order->WorkUser = $MWorkUser;
                $order->ChkSevenSeasDelivery = request('ChkSevenSeasDelivery');
                $order->CrNotePer = intval(request('LblCreditPer'));
                $order->AVIRebatePer = intval(request('LblRebaitPer'));
                $order->AgentCommPer = intval(request('LblAgentCommPer'));
                $order->SlsCommPer = intval(request('LblSalesManCommPer'));
                $order->CrNoteAmount = intval(request('LblCreditNote'));
                $order->AVIRebateAmt = intval(request('LblRebaitAmt.'));
                $order->AgentCommAmt = intval(request('LblAgentComm'));
                $order->SlsCommAmt = intval(request('LblSalesManComm'));
                $order->save();

                // info($order);
            }
            // info("order save");


            $OrderMaster = OrderMasterModel::where('PONO', $invoiceNo)->where('BranchCode', $BranchCode)->first();
            if($OrderMaster){
                $OrderMaster->Status = 'INVOICED';
                $OrderMaster->save();
            }

            for ($i = 0; $i < count($tabledata); $i++) {

                $MItemName = $tabledata[$i]['ItemName'];
                if (strlen(trim($MItemName)) !== 0) {
                    $MOrderID = $tabledata[$i]['ID'];

                    $OrderDetail = OrderModel::where('ID', $MOrderID)->where('PONO', $invoiceNo)->where('BranchCode', $BranchCode)->first();
                    if (!$OrderDetail) {
                        $OrderDetail = new OrderModel();

                    }

                    $OrderDetail->ReturnQty = $tabledata[$i]['RtnQty'];
                    $OrderDetail->MissingQty = $tabledata[$i]['MisngQty'];
                    $OrderDetail->SoldQty = $tabledata[$i]['SoldQty'];
                    $OrderDetail->Price = $tabledata[$i]['Price'];
                    $OrderDetail->InvoiceAmount = $tabledata[$i]['Amount'];
                    $OrderDetail->DeliveredAmount = $tabledata[$i]['Amount'];
                    $OrderDetail->GpAmount = $tabledata[$i]['GPAmt'];
                    $McostPriceNew1 = $tabledata[$i]['CostPrice'];
                    $OrderDetail->CostPrice = $tabledata[$i]['CostPrice'];
                    $OrderDetail->Cost = $tabledata[$i]['VendorPrice'];
                    $OrderDetail->DiscPerVendor = $tabledata[$i]['DiscPerVendor'];
                    $OrderDetail->ReturnCostAmt = $tabledata[$i]['ReturnCostAmt'];
                    $OrderDetail->VendorActCode = $tabledata[$i]['VendorActCode'];
                    $OrderDetail->MoveToStockQty = $tabledata[$i]['MoveToStockQty'];
                    $OrderDetail->BranchCode = $BranchCode;
                    $OrderDetail->WorkUser = $MWorkUser;
                    $OrderDetail->save();

                    // info($OrderDetail);
                    // info('OrderDetail saved');
                } else {
                    info('itemnotfound');
                }

            }




            $VSNNo = intval(request('TxtVSNNo'));
            $ChargeNo = intval(request('TxtChargeNO'));
            // $RtnQty = DB::table('DMMaster')->select('RtnQty')->where('VSNNo',$VSNNo)->where('ChargeNo',$ChargeNo)->where('BranchCode',$BranchCode)->first();
// if ($RtnQty) {}
            $TxtTotRtnQty = intval(request('TxtTotRtnQty'));
            $TxtRtnDate = request('TxtRtnDate');
            $FixAccountSetup = FixAccountSetup::where('BranchCode',$BranchCode)->first();
            $TxtBackLogDate = $FixAccountSetup->BackLogDate;
            if (($TxtTotRtnQty > 0) && ($TxtRtnDate > $TxtBackLogDate)) {
                $DMMaster = DMMaster::where('VSNNo', $VSNNo)->where('ChargeNo', $ChargeNo)->where('BranchCode', $BranchCode)->first();

                if (!$DMMaster) {
                    $DMMaster = new DMMaster();
                    $DMMaster->VSNNo = $VSNNo;
                    $DMMaster->ChargeNo = $ChargeNo;
                }
                $DMMaster->EventNo = intval(request('TxtEventNo'));
                $DMMaster->QuoteNo = intval(request('TxtQuoteNO'));
                $DMMaster->Department = intval(request('Department'));
                $DMMaster->CustomerRefNo = intval(request('TxtRefNo'));
                $DMMaster->BranchCode = $BranchCode;
                $DMMaster->CustomerName = request('TxtActName');
                $DMMaster->VesselName = request('LblVesselName');
                $DMMaster->GodownCode = request('TxtQuoteNO');
                $DMMaster->GodownName = request('TxtQuoteNO');
                $DMMaster->CustomerActCode = request('TxtActCodeNew');
                $DMMaster->CustomerCode = request('TxtActCode');
                $DMMaster->DepartmentCode = request('DepartmentCode');
                $DMMaster->DepartmentName = request('DepartmentName');
                $DMMaster->OrderDate = request('TxtOrderDate');
                $DMMaster->RTNDate = request('TxtRtnDate');
                $DMMaster->RTNTime = request('TxtRtnTime');
                $DMMaster->RtnQty = intval(request('TxtTotRtnQty'));
                $DMMaster->ReturnAmt = request('TxtReturn');
                $DMMaster->CostAmount = intval(request('TxtGPCostAmt'));
                $DMMaster->Des = "Return in " . request('CmbGodownName') . " From Customer " . request('TxtActName');
                $DMMaster->WorkUser = $MWorkUser;
                $DMMaster->save();
                // info($DMMaster);

                info("DMMaster save");
            }

            info("DMMaster skip");




            for ($i = 0; $i < count($tabledata); $i++) {

                $MItemName = $tabledata[$i]['ItemName'];
                $MReturnQty = $tabledata[$i]['RtnQty'];
                if (strlen(trim($MItemName)) !== 0) {
                    $MOrderID = $tabledata[$i]['ID'];
                    $DMDetail = DMDetail::where('OrderID', $MOrderID)->where('ChargeNo', $ChargeNo)->where('BranchCode', $BranchCode)->first();

                    if (!$DMDetail) {
                        $DMDetail = new DMDetail();
                    }
                    $DMDetail->OrderID = $MOrderID;
                    $DMDetail->VSNNo = $VSNNo;
                    $DMDetail->ChargeNo = $ChargeNo;
                    $DMDetail->EventNo = request('TxtEventNo');
                    $DMDetail->QuoteNo = request('TxtQuoteNO');
                    $DMDetail->ItemCode = $tabledata[$i]['Itemcode'];
                    $DMDetail->ItemName = $MItemName;
                    $DMDetail->PUOM = $tabledata[$i]['Puom'];
                    $DMDetail->OrderQty = $tabledata[$i]['Orderqty'];
                    $DMDetail->RecQty = $tabledata[$i]['Recvdqty'];
                    $DMDetail->SoldQty = $tabledata[$i]['SoldQty'];
                    $DMDetail->MissingQty = $tabledata[$i]['MisngQty'];
                    $DMDetail->ReturnQty = $tabledata[$i]['RtnQty'];
                    $DMDetail->VendorPrice = $tabledata[$i]['VendorPrice'];
                    $DMDetail->ReturnCostAmt = $tabledata[$i]['ReturnCostAmt'];
                    $DMDetail->CostPrice = $tabledata[$i]['Cost'];
                    $DMDetail->SellPrice = $tabledata[$i]['Price'];
                    $DMDetail->DiscPerVendor = $tabledata[$i]['Cost'];
                    $DMDetail->GodownCode = request('TxtGodownCode');
                    $DMDetail->VendorActCode = $tabledata[$i]['VendorActCode'];
                    $DMDetail->VendorCode = $tabledata[$i]['VendorCode'];
                    $DMDetail->VendorName = $tabledata[$i]['VendorName'];
                    $DMDetail->POMadeNo = $tabledata[$i]['PO'];
                    $DMDetail->SNo = $tabledata[$i]['SNo'];
                    $DMDetail->DepartmentName = request('DepartmentName');
                    $DMDetail->DepartmentCode = request('DepartmentCode');
                    $DMDetail->IMPAItemCode = $tabledata[$i]['IMPACode'];
                    $DMDetail->BranchCode = $BranchCode;
                    $DMDetail->WorkUser = $MWorkUser;
                    $DMDetail->save();

                    // info($DMDetail);
                    info("DMDetail save[$i]");
                } else {

                    info("DMDetail skip[$i]");
                }

            }




            $InvoiceDetail = InvoiceDetail::where('InvoiceNo', $invoiceNo)->where('BranchCode', $BranchCode)->where('Type', 'RETN')->get();


            if ($TxtRtnDate <= $TxtBackLogDate) {
                for ($i = 0; $i < count($tabledata); $i++) {
                    $MRetQty = $tabledata[$i]['RtnQty'];
                    $VendorCode = $tabledata[$i]['VendorCode'];

                    if (($MRetQty !== 0) && ($VendorCode == $PVendorcode)) {

                        $InvoiceDetail[$i] = new InvoiceDetail();

                        $InvoiceDetail[$i]->InvoiceNo = $invoiceNo;
                        $InvoiceDetail[$i]->Date = $TxtRtnDate;
                        $InvoiceDetail[$i]->ActCode = request('TxtActCode');
                        $InvoiceDetail[$i]->ActName = request('TxtActName');
                        $InvoiceDetail[$i]->GodownCode = request('TxtGodownCode');
                        $InvoiceDetail[$i]->GodownName = request('CmbGodownName');
                        $InvoiceDetail[$i]->VendorCode = $tabledata[$i]['VendorCode'];
                        $InvoiceDetail[$i]->ItemCode = $tabledata[$i]['Itemcode'];
                        $InvoiceDetail[$i]->ItemName = $tabledata[$i]['ItemName'];
                        $InvoiceDetail[$i]->BatchNo = "";
                        $InvoiceDetail[$i]->ExpiryDate = null;
                        $InvoiceDetail[$i]->UOM = $tabledata[$i]['Puom'];
                        $InvoiceDetail[$i]->Quantity = $tabledata[$i]['RtnQty'];
                        $InvoiceDetail[$i]->TotQty = $tabledata[$i]['RtnQty'];
                        $InvoiceDetail[$i]->BonusQty = 0;
                        $InvoiceDetail[$i]->RetailPrice = $tabledata[$i]['Price'];
                        $InvoiceDetail[$i]->TradePrice = $tabledata[$i]['Price'];
                        $InvoiceDetail[$i]->GrossAmount = $tabledata[$i]['Amount'];
                        $InvoiceDetail[$i]->DiscPer = 0;
                        $InvoiceDetail[$i]->DiscAmt = 0;
                        $InvoiceDetail[$i]->TotalAmt = $tabledata[$i]['Amount'];
                        $InvoiceDetail[$i]->BranchCode = $BranchCode;
                        $InvoiceDetail[$i]->TotalDiscAmt = intval(request('TxtDiscAmt'));
                        $InvoiceDetail[$i]->NetAmount = intval(request('TxtNetAmount'));
                        $InvoiceDetail[$i]->Description = request('TxtDescription');
                        $InvoiceDetail[$i]->Type = "RETN";
                        $InvoiceDetail[$i]->WorkUser = $MWorkUser;
                        $InvoiceDetail[$i]->save();


                        // info($InvoiceDetail);

                        info("InvoiceDetail RETN save[$i]");

                    } else {

                        info("InvoiceDetail RETN skip con2[$i]");
                    }

                }
            } else {
                info("InvoiceDetail RETN skip con1");

            }

            $InvoiceDetails = InvoiceDetail::where('InvoiceNo', $invoiceNo)->where('BranchCode', $BranchCode)->where('Type', 'SALE')->get();
            for ($i = 0; $i < count($tabledata); $i++) {
                $MSoldQty = $tabledata[$i]['SoldQty'];
                if (($MSoldQty !== 0) && ($VendorCode = $PVendorcode)) {

                    $InvoiceDetails[$i] = new InvoiceDetail();


                    $InvoiceDetails[$i]->InvoiceNo = $invoiceNo;
                    $InvoiceDetails[$i]->Date = $TxtRtnDate;
                    $InvoiceDetails[$i]->ActCode = request('TxtActCode');
                    $InvoiceDetails[$i]->ActName = request('TxtActName');
                    $InvoiceDetails[$i]->GodownCode = request('TxtGodownCode');
                    $InvoiceDetails[$i]->GodownName = request('CmbGodownName');
                    $InvoiceDetails[$i]->VendorCode = $tabledata[$i]['VendorCode'];
                    $InvoiceDetails[$i]->ItemCode = $tabledata[$i]['Itemcode'];
                    $InvoiceDetails[$i]->ItemName = $tabledata[$i]['ItemName'];
                    $InvoiceDetails[$i]->BatchNo = "";
                    $InvoiceDetails[$i]->ExpiryDate = null;
                    $InvoiceDetails[$i]->UOM = $tabledata[$i]['Puom'];
                    $InvoiceDetails[$i]->Quantity = $tabledata[$i]['SoldQty'];
                    $InvoiceDetails[$i]->TotQty = $tabledata[$i]['SoldQty'];
                    $InvoiceDetails[$i]->BonusQty = 0;
                    $InvoiceDetails[$i]->RetailPrice = $tabledata[$i]['Price'];
                    $InvoiceDetails[$i]->TradePrice = $tabledata[$i]['Price'];
                    $InvoiceDetails[$i]->GrossAmount = $tabledata[$i]['Amount'];
                    $InvoiceDetails[$i]->DiscPer = 0;
                    $InvoiceDetails[$i]->DiscAmt = 0;
                    $InvoiceDetails[$i]->TotalAmt = $tabledata[$i]['CostPrice'];
                    $InvoiceDetails[$i]->BranchCode = $BranchCode;
                    $InvoiceDetails[$i]->TotalDiscAmt = intval(request('TxtDiscAmt'));
                    $InvoiceDetails[$i]->NetAmount = intval(request('TxtNetAmount'));
                    $InvoiceDetails[$i]->Description = request('TxtDescription');
                    $InvoiceDetails[$i]->Type = "SALE";
                    $InvoiceDetails[$i]->WorkUser = $MWorkUser;
                    $InvoiceDetails[$i]->save();
                    // info($InvoiceDetails);
                    info("InvoiceDetails SALE Success[$i]");
                } else {

                    info("InvoiceDetails SALE skip[$i]");
                }
            }

            $Trans = Trans::where('Vnon', $invoiceNo)->where('BranchCode', $BranchCode)->where('Vnoc', 'SALE')->first();


            $MCurrency = 'USD';
            $TxtNetAmount = intval(request('TxtNetAmount'));
            if ($TxtNetAmount !== 0) {


                $Trans = new Trans();
                $Trans->GodownCode = request('TxtGodownCode');
                $Trans->Vnon = $invoiceNo;
                $Trans->Vnoc = "SALE";
                $Trans->Date = $TxtRtnDate;
                $Trans->ActCode = request('TxtActCodeNew');
                $Trans->ActCode2 = request('MSalesCode');
                $Trans->Des = request('TxtDescription');
                $Trans->TransAmt = $TxtNetAmount;
                $Trans->BranchCode = $BranchCode;
                $Trans->Currency = $MCurrency;
                $Trans->EntryDate = date('Y-m-d');
                $Trans->TransType = request('CmbTerms');
                $Trans->ClientOrderNo = $invoiceNo;
                $Trans->WorkUser = $MWorkUser;
                $Trans->save();
                // info($Trans);
                info("Trans debit Success");


                $Trans = new Trans();
                $Trans->GodownCode = request('TxtGodownCode');
                $Trans->Vnon = $invoiceNo;
                $Trans->Vnoc = "SALE";
                $Trans->Date = $TxtRtnDate;
                $Trans->ActCode = request('MSalesCode');
                $Trans->ActCode2 = request('TxtActCodeNew');
                $Trans->Des = request('TxtDescription') . " Sale To " . request('TxtActName');
                $Trans->TransAmt = $TxtNetAmount * -1;
                $Trans->BranchCode = $BranchCode;
                $Trans->Currency = $MCurrency;
                $Trans->EntryDate = date('Y-m-d');
                $Trans->TransType = request('CmbTerms');
                $Trans->ClientOrderNo = $invoiceNo;
                $Trans->WorkUser = $MWorkUser;
                $Trans->save();
                // info($Trans);
                info("Trans creadit Success");
            } else {

                info("Trans skip");
            }





            $message = 'Success';



            return response()->json([
                'Message' => $message,
                'invoiceNo' => $invoiceNo,


            ]);

        }


    }

    public function Pullstock(Request $request)
    {
        $PONO = $request->PONO;
        $BranchCode = Auth::user()->BranchCode;

        return view('purchase.Pullstock', [
            'PONO' => $PONO,
            'BranchCode' => $BranchCode,
        ]);
    }

    public function ordertransfer(Request $request)
    {
        $PONO = $request->PONO;
        $BranchCode = Auth::user()->BranchCode;

        return view('purchase.ordertransfer', [
            'PONO' => $PONO,
            'BranchCode' => $BranchCode,
        ]);
    }

    public function StockGatePass(Request $request)
    {
        $PONO = $request->PONO;
        $BranchCode = Auth::user()->BranchCode;

        return view('purchase.StockGatePass', [
            'PONO' => $PONO,
            'BranchCode' => $BranchCode,
        ]);
    }

}
