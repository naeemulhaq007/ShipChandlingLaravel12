<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use App\Models\UserRights;
use App\Models\ChatUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SecurityController extends Controller
{
   
    
    public function changecurrent(Request $request){
        $MBranchCode =Auth::user()->BranchCode;
        $MWorkUser =Auth::user()->UserName;

        $message = $request->message;
        $QuoteNo = $request->QuoteNo;
        info($QuoteNo);
        if($message == 'set'){
            info('set');
            $user = $request->user;
            $Set = Quote::where('QuoteNo',$QuoteNo)->where('BranchCode',$MBranchCode)->first();
            if($Set){
                info($Set->WorkUserActive);
                if($Set->WorkUserActive ){
                // && $Set->WorkUserActive !== $MWorkUser){
                    info('a');
                    $message = 'Already';
                    $user = $Set->WorkUserActive;
                }else{
                    info('b');
                    $Set->WorkUserActive = $user;
                    $message = 'seted';
                    $Set->save();
                }
            }


        }else{
            info('unset');

            $Set = Quote::where('QuoteNo',$QuoteNo)->where('BranchCode',$MBranchCode)->first();

            if($Set){
                if($Set->WorkUserActive && $Set->WorkUserActive == $MWorkUser){
                    $Set->WorkUserActive = NULL;
                    $message = 'unseted';
                    $Set->save();
                    info('unseted');

                }else{
                    // $message = 'Already';
                }
                }
            }

        return response()->json([
            'message' => $message,
            'User' => $user,
        ]);
    }
    public function webSettings()
    {
        return view('System.Web_settings');
    }
    public function UserRights(){
        $MBranchCode =Auth::user()->BranchCode;
        $UserRights = UserRights::where('BranchCode',$MBranchCode)->get();

        return view('System.User-Rights',[
            'UserRights'=>$UserRights,
        ]);
    }
    public function Getuid(){
        $MBranchCode =Auth::user()->BranchCode;
        $Uid = UserRights::where('BranchCode',$MBranchCode)->max('UserID');
        $userid = intval($Uid)+1;
        return response()->json([
            'userid' => $userid,
        ]);
    }

    public function UserDELETE(Request $request){
        $MBranchCode =Auth::user()->BranchCode;
        $UserId = $request->input('TxtUserid');
        $Message = 'start';
        $UserRights = UserRights::where('BranchCode',$MBranchCode)->where('UserID',$UserId)->delete();

        if($UserRights){
            $Message = 'Deleted';
        }

        return response()->json([
            'Message' => $Message,
        ]);
    }
    public function UserAddDelete(){
        $MBranchCode =Auth::user()->BranchCode;

        $UserRights =UserRights::where('BranchCode',$MBranchCode)->get();
        $ap = 'error';
        $adminPassword = UserRights::select('Password')->where('BranchCode',$MBranchCode)->where('UserID',1)->first();
        if($adminPassword){
            $ap = $adminPassword->Password;
        }
        return view('System.UserAddDelete',[
            'UserRights'=>$UserRights,
            'ap'=>$ap,

        ]);
    }
    public function UserAdd(Request $request){
        $MBranchCode =Auth::user()->BranchCode;
        $UserId = $request->input('TxtUserid');
        info($UserId);

        $UserRights = UserRights::where('BranchCode',$MBranchCode)->where('UserID',$UserId)->first();
        if(!$UserRights){
            info($UserRights);
            $UserRights = UserRights::create([
                'UserID' => $UserId,
                'FullName' => $request->input('TxtFullName'),
                'UserName' => $request->input('TxtUserName'),
                'Email' => $request->input('TxtEmailAddress'),
                'Password' => $request->input('TxtUserPassword'),
                'BranchCode' => $MBranchCode,
                'ChkInactive' => $request->input('ChkDisable'),
            ]);
            info('save'.$UserRights);

        }else{
            $UserRights->UserID = $UserId;
            $UserRights->FullName = $request->input('TxtFullName');
            $UserRights->UserName = $request->input('TxtUserName');
            $UserRights->Email = $request->input('TxtEmailAddress');
            $UserRights->Password = $request->input('TxtUserPassword');
            $UserRights->BranchCode = $MBranchCode;
            $UserRights->ChkInactive = $request->input('ChkDisable');
            $UserRights->save();
            info('update'.$UserRights);

        }
        info('nothing'.$UserRights);

        return response()->json([
            'UserRights' => $UserRights,
        ]);
    }
    public function GetUserlist(){
        $MBranchCode =Auth::user()->BranchCode;

        $UserRights = UserRights::where('BranchCode',$MBranchCode)->get();

        return response()->json([
            'UserRights' => $UserRights,
        ]);
    }
    public function GetUserrights(Request $request){
        $MBranchCode =Auth::user()->BranchCode;
        $UserId = $request->input('UserId');

        $UserRights = UserRights::where('BranchCode',$MBranchCode)->where('UserID',$UserId)->first();

        return response()->json([
            'UserRights' => $UserRights,
        ]);
    }
    public function updateUserrights(Request $request){
        $MBranchCode =Auth::user()->BranchCode;
        $UserId = $request->input('Users');
        info($request->input());
        $UserRights = UserRights::where('BranchCode',$MBranchCode)->where('UserID',$UserId)->first();

if($UserRights){

    if($request->input('ChkBranchSetup') == true){
        $UserRights->BranchSetup = true;
    }else{
        $UserRights->BranchSetup = false;
    }

    if($request->input('ChkBankDetailRegistration') == true){
        $UserRights->ChkBankDetailRegistration = true;
    }else{
        $UserRights->ChkBankDetailRegistration = false;
    }

    if($request->input('ChkFixAccountSetup') == true){
        $UserRights->ChkFixAccountSetup = true;
    }else{
        $UserRights->ChkFixAccountSetup = false;
    }

    if($request->input('ChkVendorRecon') == true){
        $UserRights->ChkVendorRecon = true;
    }else{
        $UserRights->ChkVendorRecon = false;
    }

    if($request->input('ChkCustomerRecon') == true){
        $UserRights->ChkCustomerRecon = true;
    }else{
        $UserRights->ChkCustomerRecon = false;
    }

    if($request->input('ChkMenuStrip') == true){
        $UserRights->ChkMenuStrip = true;
    }else{
        $UserRights->ChkMenuStrip = false;
    }

    if($request->input('ChkUserPerformance') == true){
        $UserRights->ChkUserPerformance = true;
    }else{
        $UserRights->ChkUserPerformance = false;
    }

    if($request->input('ChkCompanySetup') == true){
        $UserRights->CompanySetup = true;
    }else{
        $UserRights->CompanySetup = false;
    }

    if($request->input('ChkDepartmentSetup') == true){
        $UserRights->DepartmentSetup = true;
    }else{
        $UserRights->DepartmentSetup = false;
    }



    if($request->input('ChkSendListToVessel') == true){
        $UserRights->SendProductListToVessel = true;
    }else{
        $UserRights->SendProductListToVessel = false;
    }
    if($request->input('ChkAssignUserColour') == true){
        $UserRights->ChkAssignUserColour = true;
    }else{
        $UserRights->ChkAssignUserColour = false;
    }



    if($request->input('ChkCategorySetup') == true){
        $UserRights->CategorySetup = true;
    }else{
        $UserRights->CategorySetup = false;
    }

    if($request->input('ChkOriginSetup') == true){
        $UserRights->OriginSetup = true;
    }else{
        $UserRights->OriginSetup = false;
    }
    if($request->input('ChkCompanySetup') == true){
        $UserRights->CompanySetup = true;
    }else{
        $UserRights->CompanySetup = false;
    }
    if($request->input('ChkDepartmentSetup') == true){
        $UserRights->DepartmentSetup = true;
    }else{
        $UserRights->DepartmentSetup = false;
    }
    if($request->input('ChkSendListToVendor') == true){
        $UserRights->SendListToVendor = true;
    }else{
        $UserRights->SendListToVendor = false;
    }
    if($request->input('ChkShipVipSetup') == true){
        $UserRights->ChkShipVipSetup = true;
    }else{
        $UserRights->ChkShipVipSetup = false;
    }
    if($request->input('ChkStatusSetup') == true){
        $UserRights->ChkStatusSetup = true;
    }else{
        $UserRights->ChkStatusSetup = false;
    }
    if($request->input('ChkWarehousesetup') == true){
        $UserRights->WarehouseSetup = true;
    }else{
        $UserRights->WarehouseSetup = false;
    }
    if($request->input('ChkTermsSetup') == true){
        $UserRights->TermsSetup = true;
    }else{
        $UserRights->TermsSetup = false;
    }
    if($request->input('ChkPrioritySetup') == true){
        $UserRights->ChkPrioritySetup = true;
    }else{
        $UserRights->ChkPrioritySetup = false;
    }
    if($request->input('ChkQuoteStatus') == true){
        $UserRights->ChkQuoteStatus = true;
    }else{
        $UserRights->ChkQuoteStatus = false;
    }
    if($request->input('ChkAccountingYearSetup') == true){
        $UserRights->AccountingYearSetup = true;
    }else{
        $UserRights->AccountingYearSetup = false;
    }
    if($request->input('ChkVesselSetup') == true){
        $UserRights->VesselSetup = true;
    }else{
        $UserRights->VesselSetup = false;
    }
    if($request->input('ChkCustomerSetup') == true){
        $UserRights->CustomerSetup = true;
    }else{
        $UserRights->CustomerSetup = false;
    }
    if($request->input('ChkVendorSetup') == true){
        $UserRights->VendorSetup = true;
    }else{
        $UserRights->VendorSetup = false;
    }
    if($request->input('ChkSalesmanSetup') == true){
        $UserRights->SalesmanSetup = true;
    }else{
        $UserRights->SalesmanSetup = false;
    }
    if($request->input('ChkIMPARegistration') == true){
        $UserRights->IMPARegistration = true;
    }else{
        $UserRights->IMPARegistration = false;
    }
    if($request->input('ChkIMPAWiseVendor') == true){
        $UserRights->IMPAWiseVendor = true;
    }else{
        $UserRights->IMPAWiseVendor = false;
    }
    if($request->input('ChkAgentRegistration') == true){
        $UserRights->ChkAgentRegistration = true;
    }else{
        $UserRights->ChkAgentRegistration = false;
    }
    if($request->input('ChkUpdateVendorPrice') == true){
        $UserRights->UpdateVendorPrice = true;
    }else{
        $UserRights->UpdateVendorPrice = false;
    }
    if($request->input('ChkLocationSetup') == true){
        $UserRights->ChkLocationSetup = true;
    }else{
        $UserRights->ChkLocationSetup = false;
    }
    if($request->input('ChkVenderProduct') == true){
        $UserRights->VendorProduct = true;
    }else{
        $UserRights->VendorProduct = false;
    }
    if($request->input('ChkImportProductList') == true){
        $UserRights->ImportProductList = true;
    }else{
        $UserRights->ImportProductList = false;
    }
    if($request->input('ChkSearchAgent') == true){
        $UserRights->ChkSearchAgent = true;
    }else{
        $UserRights->ChkSearchAgent = false;
    }
    if($request->input('ChkUpdateVenderPrice2') == true){
        $UserRights->UpdateVendorPrice2 = true;
    }else{
        $UserRights->UpdateVendorPrice2 = false;
    }
    if($request->input('ChkFixAccountSetup') == true){
        $UserRights->ChkFixAccountSetup = true;
    }else{
        $UserRights->ChkFixAccountSetup = false;
    }
    if($request->input('ChkMenuStrip') == true){
        $UserRights->ChkMenuStrip = true;
    }else{
        $UserRights->ChkMenuStrip = false;
    }
    if($request->input('ChkQuotationLog') == true){
        $UserRights->QuotationLog = true;
    }else{
        $UserRights->QuotationLog = false;
    }
    if($request->input('ChkCreateEvent') == true){
        $UserRights->CreateEvent = true;
    }else{
        $UserRights->CreateEvent = false;
    }
    if($request->input('ChkQuotation') == true){
        $UserRights->Quotation = true;
    }else{
        $UserRights->Quotation = false;
    }
    if($request->input('ChkSendListToVessel') == true){
        $UserRights->SendListToVendor = true;
    }else{
        $UserRights->SendListToVendor = false;
    }
    if($request->input('ChkVesselLog') == true){
        $UserRights->VesselLog = true;
    }else{
        $UserRights->VesselLog = false;
    }
    if($request->input('ChkRFQ') == true){
        $UserRights->ChkRFQ = true;
    }else{
        $UserRights->ChkRFQ = false;
    }
    if($request->input('ChkPullStock') == true){
        $UserRights->ChPullStock = true;
    }else{
        $UserRights->ChPullStock = false;
    }
    if($request->input('ChkIMPAListImport') == true){
        $UserRights->IMPAListImport = true;
    }else{
        $UserRights->IMPAListImport = false;
    }
    if($request->input('ChkOrderList') == true){
        $UserRights->ChkOrderList = true;
    }else{
        $UserRights->ChkOrderList = false;
    }
    if($request->input('ChkQuatationPriorityLog') == true){
        $UserRights->ChkQuatationPriorityLog = true;
    }else{
        $UserRights->ChkQuatationPriorityLog = false;
    }
    if($request->input('ChkVSNLog') == true){
        $UserRights->ChkVSNLog = true;
    }else{
        $UserRights->ChkVSNLog = false;
    }
    if($request->input('ChkFilp') == true){
        $UserRights->ChkFilp = true;
    }else{
        $UserRights->ChkFilp = false;
    }
    if($request->input('ChkChargesOrderForm') == true){
        $UserRights->ChkChargesOrderForm = true;
    }else{
        $UserRights->ChkChargesOrderForm = false;
    }
    if($request->input('ChkChargeQoute') == true){
        $UserRights->ChkChargeQoute = true;
    }else{
        $UserRights->ChkChargeQoute = false;
    }
    if($request->input('ChkChargesForEvent') == true){
        $UserRights->ChkChargesForEvent = true;
    }else{
        $UserRights->ChkChargesForEvent = false;
    }
    if($request->input('ChkPurchaseBuyOut') == true){
        $UserRights->ChkPurchaseBuyOut = true;
    }else{
        $UserRights->ChkPurchaseBuyOut = false;
    }
    if($request->input('ChkPoReceived') == true){
        $UserRights->ChkPoReceived = true;
    }else{
        $UserRights->ChkPoReceived = false;
    }
    if($request->input('ChkDeliveryOrder') == true){
        $UserRights->ChkDeliveryOrder = true;
    }else{
        $UserRights->ChkDeliveryOrder = false;
    }
    if($request->input('ChkFinalInvoice') == true){
        $UserRights->ChkFinalInvoice = true;
    }else{
        $UserRights->ChkFinalInvoice = false;
    }
    if($request->input('ChkAccountSummary') == true){
        $UserRights->ChkAccountSummary = true;
    }else{
        $UserRights->ChkAccountSummary = false;
    }
    if($request->input('ChkDashBoard') == true){
        $UserRights->ChkDashBoard = true;
    }else{
        $UserRights->ChkDashBoard = false;
    }
    if($request->input('ChkCrNoteWithItem') == true){
        $UserRights->ChkCrNoteWithItem = true;
    }else{
        $UserRights->ChkCrNoteWithItem = false;
    }
    if($request->input('ChkOrderReport') == true){
        $UserRights->ChkOrderReport = true;
    }else{
        $UserRights->ChkOrderReport = false;
    }
    if($request->input('ChkPoRec') == true){
        $UserRights->ChkPoRec = true;
    }else{
        $UserRights->ChkPoRec = false;
    }
    if($request->input('ChkDeliveryReport') == true){
        $UserRights->ChkDeliveryReport = true;
    }else{
        $UserRights->ChkDeliveryReport = false;
    }
    if($request->input('ChkMaxOrderItem') == true){
        $UserRights->ChkMaxOrderItem = true;
    }else{
        $UserRights->ChkMaxOrderItem = false;
    }
    if($request->input('ChkMAxOrderCustomer') == true){
        $UserRights->ChkMAxOrderCustomer = true;
    }else{
        $UserRights->ChkMAxOrderCustomer = false;
    }
    if($request->input('ChkMaxQuoteItem') == true){
        $UserRights->ChkMaxQuoteItem = true;
    }else{
        $UserRights->ChkMaxQuoteItem = false;
    }
    if($request->input('ChkRFQSummary') == true){
        $UserRights->ChkRFQSummary = true;
    }else{
        $UserRights->ChkRFQSummary = false;
    }
    if($request->input('ChkProfitRepot') == true){
        $UserRights->ChkProfitRepot = true;
    }else{
        $UserRights->ChkProfitRepot = false;
    }
    if($request->input('ChkSalesReturnReport') == true){
        $UserRights->ChkSalesReturnReport = true;
    }else{
        $UserRights->ChkSalesReturnReport = false;
    }
    if($request->input('ChkOutStandingReportInvWise') == true){
        $UserRights->ChkOutStandingReportInvWise = true;
    }else{
        $UserRights->ChkOutStandingReportInvWise = false;
    }
    if($request->input('ChkMissingItemReport') == true){
        $UserRights->ChkMissingItemReport = true;
    }else{
        $UserRights->ChkMissingItemReport = false;
    }
    if($request->input('ChkCustomerReport') == true){
        $UserRights->CustomerReport = true;
    }else{
        $UserRights->CustomerReport = false;
    }
    if($request->input('ChkVSNINVReport') == true){
        $UserRights->ChkVSNINVReport = true;
    }else{
        $UserRights->ChkVSNINVReport = false;
    }
    if($request->input('ChkVendorDetails') == true){
        $UserRights->ChkVendorDetails = true;
    }else{
        $UserRights->ChkVendorDetails = false;
    }
    if($request->input('ChkLedger') == true){
        $UserRights->ChkLedger = true;
    }else{
        $UserRights->ChkLedger = false;
    }
    if($request->input('ChkPurchaseReturnReport') == true){
        $UserRights->ChkPurchaseReturnReport = true;
    }else{
        $UserRights->ChkPurchaseReturnReport = false;
    }
    if($request->input('CmdGPReport') == true){
        $UserRights->GPReport = true;
    }else{
        $UserRights->GPReport = false;
    }
    if($request->input('ChkDepartmentWiseSalesReport') == true){
        $UserRights->ChkDepartmentWiseSalesReport = true;
    }else{
        $UserRights->ChkDepartmentWiseSalesReport = false;
    }
    if($request->input('ChkQuotationWithProduct') == true){
        $UserRights->ChkQuotationWithProduct = true;
    }else{
        $UserRights->ChkQuotationWithProduct = false;
    }
    if($request->input('ChkYearltyQuotationReport') == true){
        $UserRights->ChkYearltyQuotationReport = true;
    }else{
        $UserRights->ChkYearltyQuotationReport = false;
    }
    if($request->input('ChkMonthlyQuotationReport') == true){
        $UserRights->ChkMonthlyQuotationReport = true;
    }else{
        $UserRights->ChkMonthlyQuotationReport = false;
    }
    if($request->input('ChkPONotRecReport') == true){
        $UserRights->ChkPONotRecReport = true;
    }else{
        $UserRights->ChkPONotRecReport = false;
    }
    if($request->input('ChkYearlyStatusReport') == true){
        $UserRights->ChkYearlyStatusReport = true;
    }else{
        $UserRights->ChkYearlyStatusReport = false;
    }
    if($request->input('ChkVendorWiseSale') == true){
        $UserRights->VendorWiseSale = true;
    }else{
        $UserRights->VendorWiseSale = false;
    }
    if($request->input('VsnReport') == true){
        $UserRights->VsnReport = true;
    }else{
        $UserRights->VsnReport = false;
    }
    if($request->input('ChkVendorProductReport') == true){
        $UserRights->ChkVendorProductReport = true;
    }else{
        $UserRights->ChkVendorProductReport = false;
    }
    if($request->input('ChkYearlyGPReport') == true){
        $UserRights->ChkYearlyGPReport = true;
    }else{
        $UserRights->ChkYearlyGPReport = false;
    }
    if($request->input('ChkGStReport') == true){
        $UserRights->ChkGStReport = true;
    }else{
        $UserRights->ChkGStReport = false;
    }
    if($request->input('ChkQuotationReport') == true){
        $UserRights->ChkQuotationReport = true;
    }else{
        $UserRights->ChkQuotationReport = false;
    }
    if($request->input('ChkYearlyUserReport') == true){
        $UserRights->ChkYearlyUserReport = true;
    }else{
        $UserRights->ChkYearlyUserReport = false;
    }
    if($request->input('ChkDelvrdOrderProfit') == true){
        $UserRights->ChkDelvrdOrderProfit = true;
    }else{
        $UserRights->ChkDelvrdOrderProfit = false;
    }
    if($request->input('ChkRFQVesselSummary') == true){
        $UserRights->ChkRFQVesselSummary = true;
    }else{
        $UserRights->ChkRFQVesselSummary = false;
    }
    if($request->input('ChkIMPAReport') == true){
        $UserRights->IMPAReport = true;
    }else{
        $UserRights->IMPAReport = false;
    }
    if($request->input('ChkVATRefundReport') == true){
        $UserRights->ChkVATRefundReport = true;
    }else{
        $UserRights->ChkVATRefundReport = false;
    }
    if($request->input('ChkEventReport') == true){
        $UserRights->EventReport = true;
    }else{
        $UserRights->EventReport = false;
    }
    if($request->input('ChkDailyQuotationReport') == true){
        $UserRights->ChkDailyQuotationReport = true;
    }else{
        $UserRights->ChkDailyQuotationReport = false;
    }
    if($request->input('ChkVesselReport') == true){
        $UserRights->VesselReport = true;
    }else{
        $UserRights->VesselReport = false;
    }
    if($request->input('ChkVendorReport') == true){
        $UserRights->VendorReport = true;
    }else{
        $UserRights->VendorReport = false;
    }
    if($request->input('ChkVendorWiseGP') == true){
        $UserRights->VendorWiseGP = true;
    }else{
        $UserRights->VendorWiseGP = false;
    }
    if($request->input('ChkQuotationGPReport') == true){
        $UserRights->QuotationGPReport = true;
    }else{
        $UserRights->QuotationGPReport = false;
    }
    if($request->input('ChkUserPerformance') == true){
        $UserRights->ChkUserPerformance = true;
    }else{
        $UserRights->ChkUserPerformance = false;
    }
    if($request->input('CHKChartofAccounts') == true){
        $UserRights->CHKChartofAccounts = true;
    }else{
        $UserRights->CHKChartofAccounts = false;
    }
    if($request->input('ChkReceiptVoucher') == true){
        $UserRights->ChkReceiptVoucher = true;
    }else{
        $UserRights->ChkReceiptVoucher = false;
    }
    if($request->input('ChkVendorPaymentVoucher') == true){
        $UserRights->ChkVendorPaymentVoucher = true;
    }else{
        $UserRights->ChkVendorPaymentVoucher = false;
    }
    if($request->input('ChkExpVoucher') == true){
        $UserRights->ChkExpVoucher = true;
    }else{
        $UserRights->ChkExpVoucher = false;
    }
    if($request->input('ChkCreditNote') == true){
        $UserRights->ChkCreditNote = true;
    }else{
        $UserRights->ChkCreditNote = false;
    }
    if($request->input('ChkDebitNote') == true){
        $UserRights->ChkDebitNote = true;
    }else{
        $UserRights->ChkDebitNote = false;
    }
    if($request->input('ChkJV') == true){
        $UserRights->ChkJV = true;
    }else{
        $UserRights->ChkJV = false;
    }
    if($request->input('ChkPettyCashVoucher') == true){
        $UserRights->ChkPettyCashVoucher = true;
    }else{
        $UserRights->ChkPettyCashVoucher = false;
    }
    if($request->input('ChkEmployeeRegistration') == true){
        $UserRights->ChkEmployeeRegistration = true;
    }else{
        $UserRights->ChkEmployeeRegistration = false;
    }
    if($request->input('ChkSalarySheet') == true){
        $UserRights->ChkSalarySheet = true;
    }else{
        $UserRights->ChkSalarySheet = false;
    }
    if($request->input('ChkExpenseSetup') == true){
        $UserRights->ChkExpenseSetup = true;
    }else{
        $UserRights->ChkExpenseSetup = false;
    }
    if($request->input('ChkCurrencySetup') == true){
        $UserRights->ChkCurrencySetup = true;
    }else{
        $UserRights->ChkCurrencySetup = false;
    }
    if($request->input('ChkExpenseReport') == true){
        $UserRights->ChkExpenseReport = true;
    }else{
        $UserRights->ChkExpenseReport = false;
    }
    if($request->input('ChkReceiptVoucherReport') == true){
        $UserRights->ChkReceiptVoucherReport = true;
    }else{
        $UserRights->ChkReceiptVoucherReport = false;
    }
    if($request->input('ChkVendorPaymentsReport') == true){
        $UserRights->ChkVendorPaymentsReport = true;
    }else{
        $UserRights->ChkVendorPaymentsReport = false;
    }
    if($request->input('ChkCustomerOutstanding') == true){
        $UserRights->ChkCustomerOutstanding = true;
    }else{
        $UserRights->ChkCustomerOutstanding = false;
    }
    if($request->input('ChkCustomerOutstandingInvoiceWise') == true){
        $UserRights->ChkCustomerOutstandingInvoiceWise = true;
    }else{
        $UserRights->ChkCustomerOutstandingInvoiceWise = false;
    }
    if($request->input('ChkAgingCustomerReport') == true){
        $UserRights->ChkAgingCustomerReport = true;
    }else{
        $UserRights->ChkAgingCustomerReport = false;
    }
    if($request->input('CHKVendorOutstanding') == true){
        $UserRights->CHKVendorOutstanding = true;
    }else{
        $UserRights->CHKVendorOutstanding = false;
    }
    if($request->input('ChkVendorOutstandingInvoiceWise') == true){
        $UserRights->ChkVendorOutstandingInvoiceWise = true;
    }else{
        $UserRights->ChkVendorOutstandingInvoiceWise = false;
    }
    if($request->input('ChkAgingVendorReport') == true){
        $UserRights->ChkAgingVendorReport = true;
    }else{
        $UserRights->ChkAgingVendorReport = false;
    }
    if($request->input('ChkOutstandingInvoiceAlert') == true){
        $UserRights->ChkOutstandingInvoiceAlert = true;
    }else{
        $UserRights->ChkOutstandingInvoiceAlert = false;
    }
    if($request->input('ChkDebitReport') == true){
        $UserRights->ChkDebitReport = true;
    }else{
        $UserRights->ChkDebitReport = false;
    }
    if($request->input('ChkCreditReport') == true){
        $UserRights->ChkCreditReport = true;
    }else{
        $UserRights->ChkCreditReport = false;
    }
    if($request->input('ChkLedgerReconcile') == true){
        $UserRights->ChkLedgerReconcile = true;
    }else{
        $UserRights->ChkLedgerReconcile = false;
    }
    if($request->input('ChkCustomerReceiptHistoryReport') == true){
        $UserRights->ChkCustomerReceiptHistoryReport = true;
    }else{
        $UserRights->ChkCustomerReceiptHistoryReport = false;
    }
    if($request->input('ChkFixedAssetsDep') == true){
        $UserRights->ChkFixedAssetsDep = true;
    }else{
        $UserRights->ChkFixedAssetsDep = false;
    }
    if($request->input('ChkVendorRecon') == true){
        $UserRights->ChkVendorRecon = true;
    }else{
        $UserRights->ChkVendorRecon = false;
    }
    if($request->input('ChkCustomerRecon') == true){
        $UserRights->ChkCustomerRecon = true;
    }else{
        $UserRights->ChkCustomerRecon = false;
    }
    if($request->input('ChkLedger1') == true){
        $UserRights->ChkLedger1 = true;
    }else{
        $UserRights->ChkLedger1 = false;
    }
    if($request->input('ChkTrialBalancer') == true){
        $UserRights->ChkTrialBalancer = true;
    }else{
        $UserRights->ChkTrialBalancer = false;
    }
    if($request->input('ChkIncomeStatment') == true){
        $UserRights->ChkIncomeStatment = true;
    }else{
        $UserRights->ChkIncomeStatment = false;
    }
    if($request->input('ChkChkIncomeStatementComparison') == true){
        $UserRights->ChkChkIncomeStatementComparison = true;
    }else{
        $UserRights->ChkChkIncomeStatementComparison = false;
    }
    if($request->input('ChkClosingModule') == true){
        $UserRights->ChkClosingModule = true;
    }else{
        $UserRights->ChkClosingModule = false;
    }
    if($request->input('ChkStockItemRegistration') == true){
        $UserRights->ChkStockItemRegistration = true;
    }else{
        $UserRights->ChkStockItemRegistration = false;
    }
    if($request->input('ChkOpeningStock') == true){
        $UserRights->ChkOpeningStock = true;
    }else{
        $UserRights->ChkOpeningStock = false;
    }
    if($request->input('ChkPurchaseOrder') == true){
        $UserRights->ChkPurchaseOrder = true;
    }else{
        $UserRights->ChkPurchaseOrder = false;
    }
    if($request->input('ChkPurchaseInvoice') == true){
        $UserRights->ChkPurchaseInvoice = true;
    }else{
        $UserRights->ChkPurchaseInvoice = false;
    }
    if($request->input('ChPullStock') == true){
        $UserRights->ChPullStock = true;
    }else{
        $UserRights->ChPullStock = false;
    }
    if($request->input('chkStockSale') == true){
        $UserRights->chkStockSale = true;
    }else{
        $UserRights->chkStockSale = false;
    }
    if($request->input('ChkStockAdjustment') == true){
        $UserRights->ChkStockAdjustment = true;
    }else{
        $UserRights->ChkStockAdjustment = false;
    }
    if($request->input('ChkStockTransfer') == true){
        $UserRights->ChkStockTransfer = true;
    }else{
        $UserRights->ChkStockTransfer = false;
    }
    if($request->input('ChkPurcReturn') == true){
        $UserRights->ChkPurcReturn = true;
    }else{
        $UserRights->ChkPurcReturn = false;
    }
    if($request->input('CHKSaleReturn') == true){
        $UserRights->CHKSaleReturn = true;
    }else{
        $UserRights->CHKSaleReturn = false;
    }
    if($request->input('CHKCurrentStockPosition') == true){
        $UserRights->CHKCurrentStockPosition = true;
    }else{
        $UserRights->CHKCurrentStockPosition = false;
    }
    if($request->input('cHKStockLedger') == true){
        $UserRights->cHKStockLedger = true;
    }else{
        $UserRights->cHKStockLedger = false;
    }
    if($request->input('chkDailyStock') == true){
        $UserRights->chkDailyStock = true;
    }else{
        $UserRights->chkDailyStock = false;
    }
    if($request->input('ChkAddUser') == true){
        $UserRights->AddUser = true;
    }else{
        $UserRights->AddUser = false;
    }
    if($request->input('ChkUserRights') == true){
        $UserRights->UserRights = true;
    }else{
        $UserRights->UserRights = false;
    }








    // dd($UserRights);
    $Message = '';

    $UserRights->save();
    if($UserRights){
        $Message = 'Saved';
    }
    return response()->json([
        'Message' => $Message,
    ]);

}


    }
    public function Chat(){
        return view('System.Chat');
    }
    public function ChatApp()
    {
        $AllUser = ChatUser::get();
        $Chats = ChatUser::getChats();
        $LastChats = ChatUser::getlatestChats();
        // dd($Chats);
        // dd($Chats[1]->chats[0]->chat_user_id);
        return view('System.ChatApp', [
            'Chats' => $Chats,
            'LastChats' => $LastChats,
            'AllUser' => $AllUser,
        ]);
    }
    public function sendMessage(Request $request)
    {
        $message = $request->input('message');
        $recipientUserId = $request->input('recipientUserId');

        // Perform validation and additional logic as needed

        $senderUserId = Auth::user()->UserID; // Assuming you are using authentication

        $recipientUser = ChatUser::find($recipientUserId);

        if ($recipientUser) {
            $recipientUser->sendMessage($message, $senderUserId);
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Recipient user not found']);
    }
}
