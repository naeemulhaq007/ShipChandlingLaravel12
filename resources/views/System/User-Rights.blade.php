@extends('layouts.app')



@section('title', 'User-Rights')

@section('content_header')

@stop

@section('content')

<div class="container-fluid">
    @if (\Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <strong>{!! \Session::get('success') !!}</strong>
  </div>

@endif
    @if (\Session::has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <strong>{!! \Session::get('error') !!}</strong>
  </div>

@endif
    <div class="card mt-2">
        <div class="card-header">
            <div class="card-tools">
                <button type="button" name="headertoggle" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
            <h4 class="text-black">User Rights</h4>
        </div>
        <form id="userform" action="/update-Userrights" method="post">
            @csrf
        <div class="card-body">
            <div class="col-lg-12">
                <div class="row py-1">
                    <div class="inputbox col-sm-4">
                        <span class="Txtspan">
                            User Rights
                        </span>
                        <select name="Users" id="Users" >
                            <option value=""></option>
                            @foreach ($UserRights as $User)
                                <option value="{{ $User->UserID }}">{{ $User->UserName }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button name="" type="submit" id="BtnUpdate" class="btn btn-success col-sm-1 mx-1"  role="button">Update</button>
                    <a name="" id="BtnExit" class="btn btn-danger col-sm-1 mx-1"  href="/" role="button">Exit</a>
                </div>
                <div class="row py-1">
                    <div class="col-sm-2">
                        <h5 class="text-danger text-center">Setups</h5>

                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="ChkBranchSetup" id="ChkBranchSetup"
                                    value=""> Branch Setup
                            </label>
                        </div>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="ChkCompanySetup" id="ChkCompanySetup"
                                    value=""> Company Setup
                            </label>
                        </div>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="ChkDepartmentSetup" id="ChkDepartmentSetup"
                                    value=""> Department Setup
                            </label>
                        </div>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="ChkCategorySetup" id="ChkCategorySetup"
                                    value=""> Category Setup
                            </label>
                        </div>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="ChkOriginSetup" id="ChkOriginSetup"
                                    value=""> Origin Setup
                            </label>
                        </div>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="ChkSendListToVendor" id="ChkSendListToVendor"
                                    value=""> Send List To Vendor
                            </label>
                        </div>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="ChkShipVipSetup" id="ChkShipVipSetup"
                                    value=""> Ship VIA Setup
                            </label>
                        </div>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="ChkStatusSetup" id="ChkStatusSetup"
                                    value=""> Status Setup
                            </label>
                        </div>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="ChkWarehousesetup" id="ChkWarehousesetup"
                                    value=""> Warehouse Setup
                            </label>
                        </div>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="ChkTermsSetup" id="ChkTermsSetup"
                                    value=""> Terms Setup
                            </label>
                        </div>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="ChkPrioritySetup" id="ChkPrioritySetup"
                                    value=""> Priority Setup
                            </label>
                        </div>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="ChkQuoteStatus" id="ChkQuoteStatus"
                                    value=""> Quote Status Setup
                            </label>
                        </div>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="ChkAssignUserColour" id="ChkAssignUserColour"
                                    value=""> Assign User Colour
                            </label>
                        </div>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="ChkAccountingYearSetup" id="ChkAccountingYearSetup"
                                    value=""> Accounting Year
                            </label>
                        </div>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="ChkVesselSetup" id="ChkVesselSetup"
                                    value=""> Vessel Setup
                            </label>
                        </div>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="ChkCustomerSetup" id="ChkCustomerSetup"
                                    value=""> Customer Setup
                            </label>
                        </div>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="ChkVendorSetup" id="ChkVendorSetup"
                                    value=""> Vendor Setup
                            </label>
                        </div>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="ChkSalesmanSetup" id="ChkSalesmanSetup"
                                    value=""> Salesman Setup
                            </label>
                        </div>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="ChkIMPARegistration" id="ChkIMPARegistration"
                                    value=""> IMPA Registration
                            </label>
                        </div>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="ChkIMPAWiseVendor" id="ChkIMPAWiseVendor"
                                    value=""> IMPA WIse Vendor
                            </label>
                        </div>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="ChkAgentRegistration" id="ChkAgentRegistration"
                                    value=""> Agent Registration.
                            </label>
                        </div>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="ChkItemSetupProvision" id="ChkItemSetupProvision"
                                    value=""> Item Setup Provision
                            </label>
                        </div>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="CheckBox1" id="CheckBox1"
                                    value=""> Customer Center
                            </label>
                        </div>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="ChkUpdateVendorPrice" id="ChkUpdateVendorPrice"
                                    value=""> Update Vendor Price
                            </label>
                        </div>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="ChkLocationSetup" id="ChkLocationSetup"
                                    value=""> Location Setup
                            </label>
                        </div>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="ChkVenderProduct" id="ChkVenderProduct"
                                    value=""> Vendor Product
                            </label>
                        </div>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="ChkImportProductList" id="ChkImportProductList"
                                    value=""> Vendor Contract
                            </label>
                        </div>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="ChkSearchAgent" id="ChkSearchAgent"
                                    value=""> Search Agent
                            </label>
                        </div>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="ChkUpdateVenderPrice2" id="ChkUpdateVenderPrice2"
                                    value=""> Update Vender Price
                            </label>
                        </div>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="ChkBankDetailRegistration" id="ChkBankDetailRegistration"
                                    value=""> Bank Detail Registration
                            </label>
                        </div>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="ChkFixAccountSetup" id="ChkFixAccountSetup"
                                    value=""> Fix Account Setup
                            </label>
                        </div>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="ChkMenuStrip" id="ChkMenuStrip"
                                    value=""> Menu Strip
                            </label>
                        </div>

                    </div>
                    <div class="col-sm-1">
                        <h5 class="text-danger text-center">Activities</h5>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="ChkQuotationLog" id="ChkQuotationLog"
                                    value=""> Quotation Log
                            </label>
                        </div>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="ChkCreateEvent" id="ChkCreateEvent"
                                    value=""> Create Event
                            </label>
                        </div>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="ChkQuotation" id="ChkQuotation"
                                    value=""> Quotation
                            </label>
                        </div>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="ChkSendListToVessel" id="ChkSendListToVessel"
                                    value=""> Send List To Vessel
                            </label>
                        </div>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="ChkVesselLog" id="ChkVesselLog"
                                    value=""> Vessel Log
                            </label>
                        </div>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="ChkRFQ" id="ChkRFQ"
                                    value="">  RFQ
                            </label>
                        </div>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="ChkPullStock" id="ChkPullStock"
                                    value=""> Pull Stock
                            </label>
                        </div>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="ChkIMPAListImport" id="ChkIMPAListImport"
                                    value=""> IMPA List Import
                            </label>
                        </div>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="ChkOrderList" id="ChkOrderList"
                                    value=""> Order Log
                            </label>
                        </div>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="ChkQuatationPriorityLog" id="ChkQuatationPriorityLog"
                                    value=""> Quotation Priority Log
                            </label>
                        </div>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="ChkVSNLog" id="ChkVSNLog"
                                    value=""> VSN Log
                            </label>
                        </div>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="ChkFilp" id="ChkFilp"
                                    value=""> Filp To VSN
                            </label>
                        </div>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="ChkChargesOrderForm" id="ChkChargesOrderForm"
                                    value=""> Charge Order Form
                            </label>
                        </div>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="ChkChargeQoute" id="ChkChargeQoute"
                                    value=""> Charge Quote
                            </label>
                        </div>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="ChkChargesForEvent" id="ChkChargesForEvent"
                                    value=""> Charge For Event
                            </label>
                        </div>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="ChkPurchaseBuyOut" id="ChkPurchaseBuyOut"
                                    value=""> Purchase BUY OUT
                            </label>
                        </div>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="ChkPoReceived" id="ChkPoReceived"
                                    value=""> PO Received
                            </label>
                        </div>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="ChkDeliveryOrder" id="ChkDeliveryOrder"
                                    value=""> Delivery Order
                            </label>
                        </div>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="ChkFinalInvoice" id="ChkFinalInvoice"
                                    value=""> FINAL INVOICE
                            </label>
                        </div>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="ChkAccountSummary" id="ChkAccountSummary"
                                    value=""> Account Summary
                            </label>
                        </div>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="ChkDashBoard" id="ChkDashBoard"
                                    value=""> Dash Board
                            </label>
                        </div>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="ChkCrNoteWithItem" id="ChkCrNoteWithItem"
                                    value=""> Cr Note With Item
                            </label>
                        </div>

                    </div>
                    <div class="col-sm-3">
                        <h5 class="text-danger text-center">Reports</h5>
                        <div class="row">
                            <div class="CheckBox1 col-sm-6">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkOrderReport" id="ChkOrderReport"
                                    value=""> Order Report
                                </label>
                            </div>
                            <div class="CheckBox1 col-sm-6">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkPoRec" id="ChkPoRec"
                                    value=""> PO Rec Report
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="CheckBox1 col-sm-6">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkDeliveryReport" id="ChkDeliveryReport"
                                    value=""> Delivery Report
                                </label>
                            </div>
                            <div class="CheckBox1 col-sm-6">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkMaxOrderItem" id="ChkMaxOrderItem"
                                    value=""> Max ORDER Item
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="CheckBox1 col-sm-6">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkMAxOrderCustomer" id="ChkMAxOrderCustomer"
                                    value=""> Max ORDER Customer
                                </label>
                            </div>
                            <div class="CheckBox1 col-sm-6">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkMaxQuoteItem" id="ChkMaxQuoteItem"
                                    value=""> Max Quote Item
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="CheckBox1 col-sm-6">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkRFQSummary" id="ChkRFQSummary"
                                    value=""> RFQ Summary
                                </label>
                            </div>
                            <div class="CheckBox1 col-sm-6">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkProfitRepot" id="ChkProfitRepot"
                                    value=""> Profit Report
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="CheckBox1 col-sm-6">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkSalesReturnReport" id="ChkSalesReturnReport"
                                    value=""> AVI Rebait Report
                                </label>
                            </div>
                            <div class="CheckBox1 col-sm-6">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkOutStandingReportInvWise" id="ChkOutStandingReportInvWise"
                                    value=""> Outstanding Report Invoice Wise
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="CheckBox1 col-sm-6">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkMissingItemReport" id="ChkMissingItemReport"
                                    value=""> Missing Item Report
                                </label>
                            </div>
                            <div class="CheckBox1 col-sm-6">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkCustomerReport" id="ChkCustomerReport"
                                    value=""> Customer Report
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="CheckBox1 col-sm-6">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkVSNINVReport" id="ChkVSNINVReport"
                                    value=""> VSN Invoice Report
                                </label>
                            </div>
                            <div class="CheckBox1 col-sm-6">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkVendorDetails" id="ChkVendorDetails"
                                    value=""> Vendor Detail
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="CheckBox1 col-sm-6">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkLedger" id="ChkLedger"
                                    value=""> Ledger
                                </label>
                            </div>
                            <div class="CheckBox1 col-sm-6">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkPurchaseReturnReport" id="ChkPurchaseReturnReport"
                                    value=""> Purchase Return Report
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="CheckBox1 col-sm-6">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="CmdGPReport" id="CmdGPReport"
                                    value=""> GP Report
                                </label>
                            </div>
                            <div class="CheckBox1 col-sm-6">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkDepartmentWiseSalesReport" id="ChkDepartmentWiseSalesReport"
                                    value=""> Department Wise Sale Report
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="CheckBox1 col-sm-6">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkQuotationWithProduct" id="ChkQuotationWithProduct"
                                    value=""> Quotation With Product
                                </label>
                            </div>
                            <div class="CheckBox1 col-sm-6">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkYearltyQuotationReport" id="ChkYearltyQuotationReport"
                                    value=""> Yearly Quotation Report
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="CheckBox1 col-sm-6">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkMonthlyQuotationReport" id="ChkMonthlyQuotationReport"
                                    value=""> Monthly Quotation Report
                                </label>
                            </div>
                            <div class="CheckBox1 col-sm-6">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkPONotRecReport" id="ChkPONotRecReport"
                                    value=""> PO Not Rec Report
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="CheckBox1 col-sm-6">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkYearlyStatusReport" id="ChkYearlyStatusReport"
                                    value=""> Yearly Status Report
                                </label>
                            </div>
                            <div class="CheckBox1 col-sm-6">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkVendorWiseSale" id="ChkVendorWiseSale"
                                    value=""> Vendor Wise Sale
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="CheckBox1 col-sm-6">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="VsnReport" id="VsnReport"
                                    value=""> VSN Report
                                </label>
                            </div>
                            <div class="CheckBox1 col-sm-6">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkVendorProductReport" id="ChkVendorProductReport"
                                    value=""> Vendor Product Report
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="CheckBox1 col-sm-6">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkYearlyGPReport" id="ChkYearlyGPReport"
                                    value=""> Yearly GP Report
                                </label>
                            </div>
                            <div class="CheckBox1 col-sm-6">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkGStReport" id="ChkGStReport"
                                    value=""> GST Report
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="CheckBox1 col-sm-6">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkQuotationReport" id="ChkQuotationReport"
                                    value=""> Quotation Report
                                </label>
                            </div>
                            <div class="CheckBox1 col-sm-6">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkYearlyUserReport" id="ChkYearlyUserReport"
                                    value=""> Yearly User Report
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="CheckBox1 col-sm-6">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkDelvrdOrderProfit" id="ChkDelvrdOrderProfit"
                                    value=""> Delvrd Order Profit
                                </label>
                            </div>
                            <div class="CheckBox1 col-sm-6">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkRFQVesselSummary" id="ChkRFQVesselSummary"
                                    value=""> RFQ Vessel Summary
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="CheckBox1 col-sm-6">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkIMPAReport" id="ChkIMPAReport"
                                    value=""> IMPA Report
                                </label>
                            </div>
                            <div class="CheckBox1 col-sm-6">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkVATRefundReport" id="ChkVATRefundReport"
                                    value=""> VAT Refund Report
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="CheckBox1 col-sm-6">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkEventReport" id="ChkEventReport"
                                    value=""> Event Report
                                </label>
                            </div>
                            <div class="CheckBox1 col-sm-6">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkDailyQuotationReport" id="ChkDailyQuotationReport"
                                    value=""> Daily Quotation Report
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="CheckBox1 col-sm-6">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkVesselReport" id="ChkVesselReport"
                                    value=""> Vessel Report
                                </label>
                            </div>
                            <div class="CheckBox1 col-sm-6">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkVendorReport" id="ChkVendorReport"
                                    value=""> Vendor Report
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="CheckBox1 col-sm-6">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkVendorWiseGP" id="ChkVendorWiseGP"
                                    value=""> Vendor Wise GP
                                </label>
                            </div>
                            <div class="CheckBox1 col-sm-6">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkQuotationGPReport" id="ChkQuotationGPReport"
                                    value=""> Quotation GP Report
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="CheckBox1 col-sm-6">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkUserPerformance" id="ChkUserPerformance"
                                    value=""> User Performance
                                </label>
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-4">
                        <h5 class="text-danger text-center">Accounts</h5>
                        <div class="row">

                            <div class="col-sm-6">
                            <div class="CheckBox1">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="CHKChartofAccounts" id="CHKChartofAccounts"
                                    value=""> Chart of Accounts
                                </label>
                            </div>
                            <div class="CheckBox1">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkOpeningBalance" id="ChkOpeningBalances"
                                    value=""> Opening Balance
                                </label>
                            </div>
                            <div class="CheckBox1">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkReceiptVoucher" id="ChkReceiptVoucher"
                                    value=""> Receipt Voucher
                                </label>
                            </div>
                            <div class="CheckBox1">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkVendorPaymentVoucher" id="ChkVendorPaymentVoucher"
                                    value=""> Vendor Payment Voucher
                                </label>
                            </div>
                            <div class="CheckBox1">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkExpVoucher" id="ChkExpVoucher"
                                    value=""> Expense Voucher
                                </label>
                            </div>
                            <div class="CheckBox1">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkCreditNote" id="ChkCreditNote"
                                    value=""> Credit Note
                                </label>
                            </div>
                            <div class="CheckBox1">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkDebitNote" id="ChkDebitNote"
                                    value=""> Debit Note
                                </label>
                            </div>
                            <div class="CheckBox1">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkJV" id="ChkJV"
                                    value=""> Journal Voucher
                                </label>
                            </div>
                            <div class="CheckBox1">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkPettyCashVoucher" id="ChkPettyCashVoucher"
                                    value=""> Petty Cash Voucher
                                </label>
                            </div>
                            <div class="CheckBox1">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkEmployeeRegistration" id="ChkEmployeeRegistration"
                                    value=""> Employee Registration
                                </label>
                            </div>
                            <div class="CheckBox1">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkSalarySheet" id="ChkSalarySheet"
                                    value=""> Salary Sheet
                                </label>
                            </div>
                            <div class="CheckBox1">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkExpenseSetup" id="ChkExpenseSetup"
                                    value=""> Expense Setup
                                </label>
                            </div>
                            <div class="CheckBox1">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkCurrencySetup" id="ChkCurrencySetup"
                                    value=""> Currency Setup
                                </label>
                            </div>
                            <div class="CheckBox1">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkExpenseReport" id="ChkExpenseReport"
                                    value=""> Expense Report
                                </label>
                            </div>
                            <div class="CheckBox1">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkReceiptVoucherReport" id="ChkReceiptVoucherReport"
                                    value=""> Receipt Voucher Report
                                </label>
                            </div>
                            <div class="CheckBox1">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkVendorPaymentsReport" id="ChkVendorPaymentsReport"
                                    value=""> Vendor Payments Report
                                </label>
                            </div>
                            <div class="CheckBox1">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkCustomerOutstanding" id="ChkCustomerOutstanding"
                                    value=""> Customer Outstanding
                                </label>
                            </div>
                            <div class="CheckBox1">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkCustomerOutstandingInvoiceWise" id="ChkCustomerOutstandingInvoiceWise"
                                    value=""> Customer Outstanding Invoice Wise
                                </label>
                            </div>
                            <div class="CheckBox1">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkAgingCustomerReport" id="ChkAgingCustomerReport"
                                    value=""> Aging Customer Report
                                </label>
                            </div>
                            <div class="CheckBox1">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="CHKVendorOutstanding" id="CHKVendorOutstanding"
                                    value=""> Vendor Outstanding
                                </label>
                            </div>
                            <div class="CheckBox1">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkVendorOutstandingInvoiceWise" id="ChkVendorOutstandingInvoiceWise"
                                    value=""> Vendor Outstanding Invoice Wise
                                </label>
                            </div>
                            <div class="CheckBox1">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkAgingVendorReport" id="ChkAgingVendorReport"
                                    value=""> Aging Vendor Report
                                </label>
                            </div>
                            <div class="CheckBox1">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkOutstandingInvoiceAlert" id="ChkOutstandingInvoiceAlert"
                                    value=""> Outstanding Invoice Alert
                                </label>
                            </div>
                            <div class="CheckBox1">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkDebitReport" id="ChkDebitReport"
                                    value=""> Debit Note Report
                                </label>
                            </div>
                            <div class="CheckBox1">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkCreditReport" id="ChkCreditReport"
                                    value=""> Credit Note Report
                                </label>
                            </div>
                            <div class="CheckBox1">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkLedgerReconcile" id="ChkLedgerReconcile"
                                    value=""> Ledger Reconcile
                                </label>
                            </div>
                            <div class="CheckBox1">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkCustomerReceiptHistoryReport" id="ChkCustomerReceiptHistoryReport"
                                    value=""> Customer Receipt History Report
                                </label>
                            </div>
                            <div class="CheckBox1">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkFixedAssetsDep" id="ChkFixedAssetsDep"
                                    value=""> Fixed Assets Depreciation
                                </label>
                            </div>
                            <div class="CheckBox1">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkVendorRecon" id="ChkVendorRecon"
                                    value=""> Vendor Reconcilation
                                </label>
                            </div>
                            <div class="CheckBox1">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkCustomerRecon" id="ChkCustomerRecon"
                                    value=""> Customer Reconcilation
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <h5 class="text-danger text-center">Accounts Reports</h5>
                            <div class="CheckBox1">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkChartofAccountReport" id="ChkChartofAccountReport"
                                    value=""> Chart of Account Report
                                </label>
                            </div>
                            <div class="CheckBox1">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkLedger1" id="ChkLedger1"
                                    value=""> Account Ledger
                                </label>
                            </div>
                            <div class="CheckBox1">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkYearlyExpenceSheet" id="ChkYearlyExpenceSheet"
                                    value=""> Yearly Expense Sheet
                                </label>
                            </div>
                            <div class="CheckBox1">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkTrialBalancer" id="ChkTrialBalancer"
                                    value=""> Trial Balance
                                </label>
                            </div>
                            <div class="CheckBox1">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkComparisonTrialBalance" id="ChkComparisonTrialBalance"
                                    value=""> Comparison Trial Balance
                                </label>
                            </div>
                            <div class="CheckBox1">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkIncomeStatment" id="ChkIncomeStatment"
                                    value=""> Profit / Loss Account
                                </label>
                            </div>
                            <div class="CheckBox1">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkBalanceSheet" id="ChkBalanceSheet"
                                    value=""> Balance Sheet
                                </label>
                            </div>
                            <div class="CheckBox1">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkChkIncomeStatementComparison" id="ChkChkIncomeStatementComparison"
                                    value=""> Profit / Loss Account Comparisson
                                </label>
                            </div>
                            <div class="CheckBox1">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkProfitAndLoss2YearlyAccComparison" id="ChkProfitAndLoss2YearlyAccComparison"
                                    value=""> Profit / Loss 2 Yearly Account Comparison
                                </label>
                            </div>
                            <div class="CheckBox1">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkProfitAndLoss2MonthAccComparison" id="ChkProfitAndLoss2MonthAccComparison"
                                    value=""> Profit / Loss 2 Month Account Comparison
                                </label>
                            </div>
                            <div class="CheckBox1">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkClosingModule" id="ChkClosingModule"
                                    value=""> Closing Module
                                </label>
                            </div>
                            <div class="CheckBox1">
                                <label class="input-group text-info ml-2">
                                    <input class="checkbox" type="checkbox" name="ChkBalanceSheetComparison" id="ChkBalanceSheetComparison"
                                    value=""> Balance Sheet Comparison
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                    <div class="col-sm-2">
                        <h5 class="text-danger text-center">Inventory</h5>

                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="ChkStockItemRegistration" id="ChkStockItemRegistration"
                                value=""> Stock Item Registration
                            </label>
                        </div>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="ChkOpeningStock" id="ChkOpeningStock"
                                value=""> Opening Stock
                            </label>
                        </div>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="ChkPurchaseOrder" id="ChkPurchaseOrder"
                                value=""> Purchase Order
                            </label>
                        </div>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="ChkPurchaseInvoice" id="ChkPurchaseInvoice"
                                value=""> Purchase Invoice
                            </label>
                        </div>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="ChPullStock" id="ChPullStock"
                                value=""> Pull Stock
                            </label>
                        </div>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="chkStockSale" id="chkStockSale"
                                value=""> Stock Sale
                            </label>
                        </div>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="ChkStockAdjustment" id="ChkStockAdjustment"
                                value=""> Stock Adjustment
                            </label>
                        </div>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="ChkStockTransfer" id="ChkStockTransfer"
                                value=""> Stock Transfer
                            </label>
                        </div>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="ChkPurcReturn" id="ChkPurcReturn"
                                value=""> Purchase Return
                            </label>
                        </div>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="CHKSaleReturn" id="CHKSaleReturn"
                                value=""> Sale Return
                            </label>
                        </div>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="ChkStockAdjustment" id="cHKExpiredStock"
                                value=""> Expired Stock
                            </label>
                        </div>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="CHKCurrentStockPosition" id="CHKCurrentStockPosition"
                                value=""> Current Stock Position
                            </label>
                        </div>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="cHKStockLedger" id="cHKStockLedger"
                                value=""> Stock Ledger
                            </label>
                        </div>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="chkDailyStock" id="chkDailyStock"
                                value=""> Daily Stock
                            </label>
                        </div>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="CHkStockWestage" id="CHkStockWestage"
                                value=""> Stock Westage
                            </label>
                        </div>


                        <h5 class="text-danger text-center mt-2">Security</h5>

                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="ChkAddUser" id="ChkAddUser"
                                value=""> Add / Delete User
                            </label>
                        </div>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="ChkChangePassword" id="ChkChangePassword"
                                value=""> Change Password
                            </label>
                        </div>
                        <div class="CheckBox1">
                            <label class="input-group text-info ml-2">
                                <input class="checkbox" type="checkbox" name="ChkUserRights" id="ChkUserRights"
                                value=""> User Rights
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row py-1">
                    <a name="" id="selectAll"   class="btn btn-info mx-1"  role="button">Select All</a>
                    <a name="" id="unselectall" class="btn btn-info mx-1"  role="button">UNSelect All</a>
                </div>
            </div>
        </div>
    </form>
    </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
    <style>

    </style>

@stop

@section('js')
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>

    <script>
        function ajaxSetup() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        }


        $(document).ready(function () {



            const selectAllButton = document.getElementById("selectAll");
            const unselectallButton = document.getElementById("unselectall");
            selectAllButton.addEventListener("click", function() {
            const checkboxes = document.querySelectorAll(".checkbox");
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = true;
                checkbox.value = 1;

            });
            });
            unselectallButton.addEventListener("click", function() {
            const checkboxes = document.querySelectorAll(".checkbox");
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = false;
                checkbox.value = 0;
            });
            });

            $('#userform').submit(function(e) {
        e.preventDefault(); // Prevent the form from submitting normally

        var formData = $(this).serialize(); // Serialize the form data

        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: formData,
            beforeSend: function() {
            //         // Show the overlay and spinner before sending the request
                    $('.overlay').show();
                },
            success: function(response) {
                console.log(response);
                // Handle the success response
            },
            error: function(xhr) {
                console.log(xhr);
                $('.overlay').hide();

                // Handle the error response
            },
            complete: function() {
                    $('.overlay').hide();
                    // Hide the overlay and spinner after the request is complete
                }
        });
    });
            // $('#BtnUpdate').click(function (e) {
            //     e.preventDefault();
            //     ajaxSetup();
            //     $.ajax({
            //     url: '/update-Userrights',
            //     type: 'POST',
            //     data: {
            //         UserId,
            //     },
            //     beforeSend: function() {
            //         // Show the overlay and spinner before sending the request
            //         $('.overlay').show();
            //     },
            //     success: function(resposne) {

            //     },
            //     error: function(data) {
            //     console.log(data);
            //     $('.overlay').hide();
            //     },
            //     complete: function() {
            //         $('.overlay').hide();
            //         // Hide the overlay and spinner after the request is complete
            //     }


            //     });
            // });

            $('#Users').change(function (e) {
                e.preventDefault();
                var UserId = $('#Users').val();
                if (UserId !== '') {

                ajaxSetup();
                $.ajax({
                url: '/Get-Userrights',
                type: 'POST',
                data: {
                    UserId,
                },
                beforeSend: function() {
                    // Show the overlay and spinner before sending the request
                    $('.overlay').show();
                },
                success: function(resposne) {
                    console.log(resposne);
                    const checkboxes = document.querySelectorAll(".checkbox");
                    checkboxes.forEach(function(checkbox) {
                        checkbox.checked = false;
                    });
                    var user = resposne.UserRights;
                    if (user.BranchSetup == true) {
                        $('#ChkBranchSetup').prop('checked', true);
                        $('#ChkBranchSetup').val(user.BranchSetup);
                    }
                    if (user.CompanySetup == true) {
                        $('#ChkCompanySetup').prop('checked', true);
                        $('#ChkCompanySetup').val(user.CompanySetup);

                    }
                    if (user.ChkVendorRecon == true) {
                        $('#ChkVendorRecon').prop('checked', true).val(user.ChkVendorRecon);
                    }

                    if (user.ChkCustomerRecon == true) {
                        $('#ChkCustomerRecon').prop('checked', true).val(user.ChkCustomerRecon);
                    }

                    if (user.ChkUserPerformance == true) {
                        $('#ChkUserPerformance').prop('checked', true).val(user.ChkUserPerformance);
                    }

                    if (user.TermsSetup == true) {
                        $('#ChkTermsSetup').prop('checked', true).val(user.TermsSetup);
                    }

                    if (user.IMPAWiseVendor == true) {
                        $('#ChkIMPAWiseVendor').prop('checked', true).val(user.IMPAWiseVendor);
                    }

                    if (user.WarehouseSetup == true) {
                        $('#ChkWarehousesetup').prop('checked', true).val(user.WarehouseSetup);
                    }

                    if (user.VesselSetup == true) {
                        $('#ChkVesselSetup').prop('checked', true).val(user.VesselSetup);
                    }

                    if (user.AccountingYearSetup == true) {
                        $('#ChkAccountingYearSetup').prop('checked', true).val(user.AccountingYearSetup);
                    }

                    if (user.CustomerSetup == true) {
                        $('#ChkCustomerSetup').prop('checked', true).val(user.CustomerSetup);
                    }

                    if (user.VendorSetup == true) {
                        $('#ChkVendorSetup').prop('checked', true).val(user.VendorSetup);
                    }

                    if (user.SalesmanSetup == true) {
                        $('#ChkSalesmanSetup').prop('checked', true).val(user.SalesmanSetup);
                    }

                    if (user.DepartmentSetup == true) {
                        $('#ChkDepartmentSetup').prop('checked', true).val(user.DepartmentSetup);
                    }

                    if (user.OriginSetup == true) {
                        $('#ChkOriginSetup').prop('checked', true).val(user.OriginSetup);
                    } else {
                        $('#ChkOriginSetup').prop('checked', false).val(user.OriginSetup);
                    }

                    if (user.IMPARegistration == true) {
                        $('#ChkIMPARegistration').prop('checked', true).val(user.IMPARegistration);
                    } else {
                        $('#ChkIMPARegistration').prop('checked', false).val(user.IMPARegistration);
                    }

                    if (user.ChkShipVipSetup == true) {
                        $('#ChkShipVipSetup').prop('checked', true).val(user.ChkShipVipSetup);
                    } else {
                        $('#ChkShipVipSetup').prop('checked', false).val(user.ChkShipVipSetup);
                    }

                    if (user.ChkStatusSetup == true) {
                        $('#ChkStatusSetup').prop('checked', true).val(user.ChkStatusSetup);
                    } else {
                        $('#ChkStatusSetup').prop('checked', false).val(user.ChkStatusSetup);
                    }

                    if (user.ChkLocationSetup == true) {
                        $('#ChkLocationSetup').prop('checked', true).val(user.ChkLocationSetup);
                    } else {
                        $('#ChkLocationSetup').prop('checked', false).val(user.ChkLocationSetup);
                    }

                    // Continue this pattern for the remaining elements...

                   // ...

                    if (user.VendorProduct == true) {
                        $('#ChkVenderProduct').prop('checked', true).val(user.VendorProduct);
                    } else {
                        $('#ChkVenderProduct').prop('checked', false).val(user.VendorProduct);
                    }

                    if (user.ImportProductList == true) {
                        $('#ChkImportProductList').prop('checked', true).val(user.ImportProductList);
                    } else {
                        $('#ChkImportProductList').prop('checked', false).val(user.ImportProductList);
                    }

                    if (user.ChkQuoteStatus == true) {
                        $('#ChkQuoteStatus').prop('checked', true).val(user.ChkQuoteStatus);
                    } else {
                        $('#ChkQuoteStatus').prop('checked', false).val(user.ChkQuoteStatus);
                    }

                    if (user.ChkPrioritySetup == true) {
                        $('#ChkPrioritySetup').prop('checked', true).val(user.ChkPrioritySetup);
                    } else {
                        $('#ChkPrioritySetup').prop('checked', false).val(user.ChkPrioritySetup);
                    }

                    if (user.ChkSearchAgent == true) {
                        $('#ChkSearchAgent').prop('checked', true).val(user.ChkSearchAgent);
                    } else {
                        $('#ChkSearchAgent').prop('checked', false).val(user.ChkSearchAgent);
                    }

                    if (user.UpdateVendorPrice2 == true) {
                        $('#ChkUpdateVenderPrice2').prop('checked', true).val(user.UpdateVendorPrice2);
                    } else {
                        $('#ChkUpdateVenderPrice2').prop('checked', false).val(user.UpdateVendorPrice2);
                    }

                    // Continue this pattern for the remaining elements...



                    // ...

                    if (user.ChkBankDetailRegistration == true) {
                        $('#ChkBankDetailRegistration').prop('checked', true).val(user.ChkBankDetailRegistration);
                    } else {
                        $('#ChkBankDetailRegistration').prop('checked', false).val(user.ChkBankDetailRegistration);
                    }

                    if (user.ChkFixAccountSetup == true) {
                        $('#ChkFixAccountSetup').prop('checked', true).val(user.ChkFixAccountSetup);
                    } else {
                        $('#ChkFixAccountSetup').prop('checked', false).val(user.ChkFixAccountSetup);
                    }

                    if (user.ChkMenuStrip == true) {
                        $('#ChkMenuStrip').prop('checked', true).val(user.ChkMenuStrip);
                    } else {
                        $('#ChkMenuStrip').prop('checked', false).val(user.ChkMenuStrip);
                    }

                    if (user.SendListToVendor == true) {
                        $('#ChkSendListToVendor').prop('checked', true).val(user.SendListToVendor);
                    } else {
                        $('#ChkSendListToVendor').prop('checked', false).val(user.SendListToVendor);
                    }

                    if (user.ChkAgentRegistration == true) {
                        $('#ChkAgentRegistration').prop('checked', true).val(user.ChkAgentRegistration);
                    } else {
                        $('#ChkAgentRegistration').prop('checked', false).val(user.ChkAgentRegistration);
                    }

                    if (user.UpdateVendorPrice == true) {
                        $('#ChkUpdateVendorPrice').prop('checked', true).val(user.UpdateVendorPrice);
                    } else {
                        $('#ChkUpdateVendorPrice').prop('checked', false).val(user.UpdateVendorPrice);
                    }

                    if (user.SendProductListToVessel == true) {
                        $('#ChkSendListToVessel').prop('checked', true).val(user.SendProductListToVessel);
                    } else {
                        $('#ChkSendListToVessel').prop('checked', false).val(user.SendProductListToVessel);
                    }

                    if (user.QuotationLog == true) {
                        $('#ChkQuotationLog').prop('checked', true).val(user.QuotationLog);
                    } else {
                        $('#ChkQuotationLog').prop('checked', false).val(user.QuotationLog);
                    }

                    if (user.CreateEvent == true) {
                        $('#ChkCreateEvent').prop('checked', true).val(user.CreateEvent);
                    } else {
                        $('#ChkCreateEvent').prop('checked', false).val(user.CreateEvent);
                    }

                    if (user.Quotation == true) {
                        $('#ChkQuotation').prop('checked', true).val(user.Quotation);
                    } else {
                        $('#ChkQuotation').prop('checked', false).val(user.Quotation);
                    }
                    if (user.CategorySetup == true) {
                        $('#ChkCategorySetup').prop('checked', true).val(user.CategorySetup);
                    } else {
                        $('#ChkCategorySetup').prop('checked', false).val(user.CategorySetup);
                    }

                    if (user.IMPAListImport == true) {
                        $('#ChkIMPAListImport').prop('checked', true).val(user.IMPAListImport);
                    } else {
                        $('#ChkIMPAListImport').prop('checked', false).val(user.IMPAListImport);
                    }

                    if (user.ChkRFQ == true) {
                        $('#ChkRFQ').prop('checked', true).val(user.ChkRFQ);
                    } else {
                        $('#ChkRFQ').prop('checked', false).val(user.ChkRFQ);
                    }

                    // ...

                    if (user.ChkPullStock == true) {
                        $('#ChkPullStock').prop('checked', true).val(user.ChkPullStock);
                    } else {
                        $('#ChkPullStock').prop('checked', false).val(user.ChkPullStock);
                    }

                    if (user.VesselLog == true) {
                        $('#ChkVesselLog').prop('checked', true).val(user.VesselLog);
                    } else {
                        $('#ChkVesselLog').prop('checked', false).val(user.VesselLog);
                    }

                    if (user.ChkOrderList == true) {
                        $('#ChkOrderList').prop('checked', true).val(user.ChkOrderList);
                    } else {
                        $('#ChkOrderList').prop('checked', false).val(user.ChkOrderList);
                    }

                    if (user.ChkQuatationPriorityLog == true) {
                        $('#ChkQuatationPriorityLog').prop('checked', true).val(user.ChkQuatationPriorityLog);
                    } else {
                        $('#ChkQuatationPriorityLog').prop('checked', false).val(user.ChkQuatationPriorityLog);
                    }

                    if (user.ChkVSNLog == true) {
                        $('#ChkVSNLog').prop('checked', true).val(user.ChkVSNLog);
                    } else {
                        $('#ChkVSNLog').prop('checked', false).val(user.ChkVSNLog);
                    }

                    if (user.ChkFilp == true) {
                        $('#ChkFilp').prop('checked', true).val(user.ChkFilp);
                    } else {
                        $('#ChkFilp').prop('checked', false).val(user.ChkFilp);
                    }

                    if (user.ChkChargesOrderForm == true) {
                        $('#ChkChargesOrderForm').prop('checked', true).val(user.ChkChargesOrderForm);
                    } else {
                        $('#ChkChargesOrderForm').prop('checked', false).val(user.ChkChargesOrderForm);
                    }

                    if (user.ChkChargeQoute == true) {
                        $('#ChkChargeQoute').prop('checked', true).val(user.ChkChargeQoute);
                    } else {
                        $('#ChkChargeQoute').prop('checked', false).val(user.ChkChargeQoute);
                    }

                    if (user.ChkChargesForEvent == true) {
                        $('#ChkChargesForEvent').prop('checked', true).val(user.ChkChargesForEvent);
                    } else {
                        $('#ChkChargesForEvent').prop('checked', false).val(user.ChkChargesForEvent);
                    }

                    if (user.ChkPurchaseBuyOut == true) {
                        $('#ChkPurchaseBuyOut').prop('checked', true).val(user.ChkPurchaseBuyOut);
                    } else {
                        $('#ChkPurchaseBuyOut').prop('checked', false).val(user.ChkPurchaseBuyOut);
                    }

                    if (user.ChkPoReceived == true) {
                        $('#ChkPoReceived').prop('checked', true).val(user.ChkPoReceived);
                    } else {
                        $('#ChkPoReceived').prop('checked', false).val(user.ChkPoReceived);
                    }

                    if (user.ChkDeliveryOrder == true) {
                        $('#ChkDeliveryOrder').prop('checked', true).val(user.ChkDeliveryOrder);
                    } else {
                        $('#ChkDeliveryOrder').prop('checked', false).val(user.ChkDeliveryOrder);
                    }

                    if (user.ChkFinalInvoice == true) {
                        $('#ChkFinalInvoice').prop('checked', true).val(user.ChkFinalInvoice);
                    } else {
                        $('#ChkFinalInvoice').prop('checked', false).val(user.ChkFinalInvoice);
                    }

                    if (user.ChkAccountSummary == true) {
                        $('#ChkAccountSummary').prop('checked', true).val(user.ChkAccountSummary);
                    } else {
                        $('#ChkAccountSummary').prop('checked', false).val(user.ChkAccountSummary);
                    }

                    if (user.ChkDashBoard == true) {
                        $('#ChkDashBoard').prop('checked', true).val(user.ChkDashBoard);
                    } else {
                        $('#ChkDashBoard').prop('checked', false).val(user.ChkDashBoard);
                    }

                    if (user.ChkCrNoteWithItem == true) {
                        $('#ChkCrNoteWithItem').prop('checked', true).val(user.ChkCrNoteWithItem);
                    } else {
                        $('#ChkCrNoteWithItem').prop('checked', false).val(user.ChkCrNoteWithItem);
                    }

                    if (user.UpdateVendorPrice2 == true) {
                        $('#ChkUpdateVenderPrice2').prop('checked', true).val(user.UpdateVendorPrice2);
                    } else {
                        $('#ChkUpdateVenderPrice2').prop('checked', false).val(user.UpdateVendorPrice2);
                    }

                    if (user.ChkOrderReport == true) {
                        $('#ChkOrderReport').prop('checked', true).val(user.ChkOrderReport);
                    } else {
                        $('#ChkOrderReport').prop('checked', false).val(user.ChkOrderReport);
                    }

                    if (user.ChkPoRec == true) {
                        $('#ChkPoRec').prop('checked', true).val(user.ChkPoRec);
                    } else {
                        $('#ChkPoRec').prop('checked', false).val(user.ChkPoRec);
                    }

                    if (user.ChkDeliveryReport == true) {
                        $('#ChkDeliveryReport').prop('checked', true).val(user.ChkDeliveryReport);
                    } else {
                        $('#ChkDeliveryReport').prop('checked', false).val(user.ChkDeliveryReport);
                    }

                    if (user.ChkMaxOrderItem == true) {
                        $('#ChkMaxOrderItem').prop('checked', true).val(user.ChkMaxOrderItem);
                    } else {
                        $('#ChkMaxOrderItem').prop('checked', false).val(user.ChkMaxOrderItem);
                    }

                    if (user.ChkMAxOrderCustomer == true) {
                        $('#ChkMAxOrderCustomer').prop('checked', true).val(user.ChkMAxOrderCustomer);
                    } else {
                        $('#ChkMAxOrderCustomer').prop('checked', false).val(user.ChkMAxOrderCustomer);
                    }

                    if (user.ChkMaxQuoteItem == true) {
                        $('#ChkMaxQuoteItem').prop('checked', true).val(user.ChkMaxQuoteItem);
                    } else {
                        $('#ChkMaxQuoteItem').prop('checked', false).val(user.ChkMaxQuoteItem);
                    }

                    if (user.ChkRFQSummary == true) {
                        $('#ChkRFQSummary').prop('checked', true).val(user.ChkRFQSummary);
                    } else {
                        $('#ChkRFQSummary').prop('checked', false).val(user.ChkRFQSummary);
                    }

                    if (user.ChkProfitRepot == true) {
                        $('#ChkProfitRepot').prop('checked', true).val(user.ChkProfitRepot);
                    } else {
                        $('#ChkProfitRepot').prop('checked', false).val(user.ChkProfitRepot);
                    }

                    if (user.ChkSalesReturnReport == true) {
                        $('#ChkSalesReturnReport').prop('checked', true).val(user.ChkSalesReturnReport);
                    } else {
                        $('#ChkSalesReturnReport').prop('checked', false).val(user.ChkSalesReturnReport);
                    }

                    if (user.ChkOutStandingReportInvWise == true) {
                        $('#ChkOutStandingReportInvWise').prop('checked', true).val(user.ChkOutStandingReportInvWise);
                    } else {
                        $('#ChkOutStandingReportInvWise').prop('checked', false).val(user.ChkOutStandingReportInvWise);
                    }

                    if (user.ChkMissingItemReport == true) {
                        $('#ChkMissingItemReport').prop('checked', true).val(user.ChkMissingItemReport);
                    } else {
                        $('#ChkMissingItemReport').prop('checked', false).val(user.ChkMissingItemReport);
                    }

                    if (user.CustomerReport == true) {
                        $('#ChkCustomerReport').prop('checked', true).val(user.CustomerReport);
                    } else {
                        $('#ChkCustomerReport').prop('checked', false).val(user.CustomerReport);
                    }

                    if (user.ChkVSNINVReport == true) {
                        $('#ChkVSNINVReport').prop('checked', true).val(user.ChkVSNINVReport);
                    } else {
                        $('#ChkVSNINVReport').prop('checked', false).val(user.ChkVSNINVReport);
                    }

                    if (user.ChkVendorDetails == true) {
                        $('#ChkVendorDetails').prop('checked', true).val(user.ChkVendorDetails);
                    } else {
                        $('#ChkVendorDetails').prop('checked', false).val(user.ChkVendorDetails);
                    }

                    if (user.ChkLedger == true) {
                        $('#ChkLedger').prop('checked', true).val(user.ChkLedger);
                    } else {
                        $('#ChkLedger').prop('checked', false).val(user.ChkLedger);
                    }

                    if (user.ChkPurchaseReturnReport == true) {
                        $('#ChkPurchaseReturnReport').prop('checked', true).val(user.ChkPurchaseReturnReport);
                    } else {
                        $('#ChkPurchaseReturnReport').prop('checked', false).val(user.ChkPurchaseReturnReport);
                    }

                    if (user.ChkDepartmentWiseSalesReport == true) {
                        $('#ChkDepartmentWiseSalesReport').prop('checked', true).val(user.ChkDepartmentWiseSalesReport);
                    } else {
                        $('#ChkDepartmentWiseSalesReport').prop('checked', false).val(user.ChkDepartmentWiseSalesReport);
                    }

                    if (user.ChkQuotationWithProduct == true) {
                        $('#ChkQuotationWithProduct').prop('checked', true).val(user.ChkQuotationWithProduct);
                    } else {
                        $('#ChkQuotationWithProduct').prop('checked', false).val(user.ChkQuotationWithProduct);
                    }

                    if (user.ChkYearltyQuotationReport == true) {
                        $('#ChkYearltyQuotationReport').prop('checked', true).val(user.ChkYearltyQuotationReport);
                    } else {
                        $('#ChkYearltyQuotationReport').prop('checked', false).val(user.ChkYearltyQuotationReport);
                    }

                    if (user.ChkMonthlyQuotationReport == true) {
                        $('#ChkMonthlyQuotationReport').prop('checked', true).val(user.ChkMonthlyQuotationReport);
                    } else {
                        $('#ChkMonthlyQuotationReport').prop('checked', false).val(user.ChkMonthlyQuotationReport);
                    }

                    if (user.ChkYearlyStatusReport == true) {
                        $('#ChkYearlyStatusReport').prop('checked', true).val(user.ChkYearlyStatusReport);
                    } else {
                        $('#ChkYearlyStatusReport').prop('checked', false).val(user.ChkYearlyStatusReport);
                    }

                    if (user.ChkTrialBalancer == true) {
                        $('#ChkTrialBalancer').prop('checked', true).val(user.ChkTrialBalancer);
                    } else {
                        $('#ChkTrialBalancer').prop('checked', false).val(user.ChkTrialBalancer);
                    }

                    if (user.VendorWiseSale == true) {
                        $('#ChkVendorWiseSale').prop('checked', true).val(user.VendorWiseSale);
                    } else {
                        $('#ChkVendorWiseSale').prop('checked', false).val(user.VendorWiseSale);
                    }

                    if (user.VsnReport == true) {
                        $('#VsnReport').prop('checked', true).val(user.VsnReport);
                    } else {
                        $('#VsnReport').prop('checked', false).val(user.VsnReport);
                    }

                    if (user.VendorProductReport == true) {
                        $('#ChkVendorProductReport').prop('checked', true).val(user.VendorProductReport);
                    } else {
                        $('#ChkVendorProductReport').prop('checked', false).val(user.VendorProductReport);
                    }

                    if (user.ChkGStReport == true) {
                        $('#ChkGStReport').prop('checked', true).val(user.ChkGStReport);
                    } else {
                        $('#ChkGStReport').prop('checked', false).val(user.ChkGStReport);
                    }

                    if (user.ChkYearlyGPReport == true) {
                        $('#ChkYearlyGPReport').prop('checked', true).val(user.ChkYearlyGPReport);
                    } else {
                        $('#ChkYearlyGPReport').prop('checked', false).val(user.ChkYearlyGPReport);
                    }

                    if (user.QuotationReport == true) {
                        $('#ChkQuotationReport').prop('checked', true).val(user.QuotationReport);
                    } else {
                        $('#ChkQuotationReport').prop('checked', false).val(user.QuotationReport);
                    }

                    if (user.ChkYearlyUserReport == true) {
                        $('#ChkYearlyUserReport').prop('checked', true).val(user.ChkYearlyUserReport);
                    } else {
                        $('#ChkYearlyUserReport').prop('checked', false).val(user.ChkYearlyUserReport);
                    }

                    if (user.ChkDelvrdOrderProfit == true) {
                        $('#ChkDelvrdOrderProfit').prop('checked', true).val(user.ChkDelvrdOrderProfit);
                    } else {
                        $('#ChkDelvrdOrderProfit').prop('checked', false).val(user.ChkDelvrdOrderProfit);
                    }

                    if (user.ChkRFQVesselSummary == true) {
                        $('#ChkRFQVesselSummary').prop('checked', true).val(user.ChkRFQVesselSummary);
                    } else {
                        $('#ChkRFQVesselSummary').prop('checked', false).val(user.ChkRFQVesselSummary);
                    }

                    if (user.IMPAReport == true) {
                        $('#ChkIMPAReport').prop('checked', true).val(user.IMPAReport);
                    } else {
                        $('#ChkIMPAReport').prop('checked', false).val(user.IMPAReport);
                    }

                    if (user.ChkVATRefundReport == true) {
                        $('#ChkVATRefundReport').prop('checked', true).val(user.ChkVATRefundReport);
                    } else {
                        $('#ChkVATRefundReport').prop('checked', false).val(user.ChkVATRefundReport);
                    }

                    if (user.ChkIncomeStatment == true) {
                        $('#ChkIncomeStatment').prop('checked', true).val(user.ChkIncomeStatment);
                    } else {
                        $('#ChkIncomeStatment').prop('checked', false).val(user.ChkIncomeStatment);
                    }

                    if (user.EventReport == true) {
                        $('#ChkEventReport').prop('checked', true).val(user.EventReport);
                    } else {
                        $('#ChkEventReport').prop('checked', false).val(user.EventReport);
                    }

                    if (user.ChkDailyQuotationReport == true) {
                        $('#ChkDailyQuotationReport').prop('checked', true).val(user.ChkDailyQuotationReport);
                    } else {
                        $('#ChkDailyQuotationReport').prop('checked', false).val(user.ChkDailyQuotationReport);
                    }

                    if (user.VesselReport == true) {
                        $('#ChkVesselReport').prop('checked', true).val(user.VesselReport);
                    } else {
                        $('#ChkVesselReport').prop('checked', false).val(user.VesselReport);
                    }

                    if (user.VendorReport == true) {
                        $('#ChkVendorReport').prop('checked', true).val(user.VendorReport);
                    } else {
                        $('#ChkVendorReport').prop('checked', false).val(user.VendorReport);
                    }

                    if (user.VendorWiseGP == true) {
                        $('#ChkVendorWiseGP').prop('checked', true).val(user.VendorWiseGP);
                    } else {
                        $('#ChkVendorWiseGP').prop('checked', false).val(user.VendorWiseGP);
                    }

                    if (user.QuotationGPReport == true) {
                        $('#ChkQuotationGPReport').prop('checked', true).val(user.QuotationGPReport);
                    } else {
                        $('#ChkQuotationGPReport').prop('checked', false).val(user.QuotationGPReport);
                    }

                    if (user.GPReport == true) {
                        $('#CmdGPReport').prop('checked', true).val(user.GPReport);
                    } else {
                        $('#CmdGPReport').prop('checked', false).val(user.GPReport);
                    }
                    if (user.CHKChartofAccounts == true) {
                        $('#CHKChartofAccounts').prop('checked', true).val(user.CHKChartofAccounts);
                    } else {
                        $('#CHKChartofAccounts').prop('checked', false).val(user.CHKChartofAccounts);
                    }

                    if (user.ChkOpeningBalance == true) {
                        $('#ChkOpeningBalance').prop('checked', true).val(user.ChkOpeningBalance);
                    } else {
                        $('#ChkOpeningBalance').prop('checked', false).val(user.ChkOpeningBalance);
                    }

                    if (user.ChkReceiptVoucher == true) {
                        $('#ChkReceiptVoucher').prop('checked', true).val(user.ChkReceiptVoucher);
                    } else {
                        $('#ChkReceiptVoucher').prop('checked', false).val(user.ChkReceiptVoucher);
                    }

                    if (user.ChkVendorPaymentVoucher == true) {
                        $('#ChkVendorPaymentVoucher').prop('checked', true).val(user.ChkVendorPaymentVoucher);
                    } else {
                        $('#ChkVendorPaymentVoucher').prop('checked', false).val(user.ChkVendorPaymentVoucher);
                    }

                    if (user.ChkExpVoucher == true) {
                        $('#ChkExpVoucher').prop('checked', true).val(user.ChkExpVoucher);
                    } else {
                        $('#ChkExpVoucher').prop('checked', false).val(user.ChkExpVoucher);
                    }

                    if (user.ChkCreditNote == true) {
                        $('#ChkCreditNote').prop('checked', true).val(user.ChkCreditNote);
                    } else {
                        $('#ChkCreditNote').prop('checked', false).val(user.ChkCreditNote);
                    }

                    if (user.ChkDebitNote == true) {
                        $('#ChkDebitNote').prop('checked', true).val(user.ChkDebitNote);
                    } else {
                        $('#ChkDebitNote').prop('checked', false).val(user.ChkDebitNote);
                    }

                    if (user.ChkPettyCashVoucher == true) {
                        $('#ChkPettyCashVoucher').prop('checked', true).val(user.ChkPettyCashVoucher);
                    } else {
                        $('#ChkPettyCashVoucher').prop('checked', false).val(user.ChkPettyCashVoucher);
                    }

                    if (user.ChkJV == true) {
                        $('#ChkJV').prop('checked', true).val(user.ChkJV);
                    } else {
                        $('#ChkJV').prop('checked', false).val(user.ChkJV);
                    }

                    if (user.ChkEmployeeRegistration == true) {
                        $('#ChkEmployeeRegistration').prop('checked', true).val(user.ChkChargeQoute);
                    } else {
                        $('#ChkEmployeeRegistration').prop('checked', false).val(user.ChkChargeQoute);
                    }

                    if (user.ChkSalarySheet == true) {
                        $('#ChkSalarySheet').prop('checked', true).val(user.ChkSalarySheet);
                    } else {
                        $('#ChkSalarySheet').prop('checked', false).val(user.ChkSalarySheet);
                    }

                    if (user.ChkExpenseSetup == true) {
                        $('#ChkExpenseSetup').prop('checked', true).val(user.ChkExpenseSetup);
                    } else {
                        $('#ChkExpenseSetup').prop('checked', false).val(user.ChkExpenseSetup);
                    }

                    if (user.ChkCurrencySetup == true) {
                        $('#ChkCurrencySetup').prop('checked', true).val(user.ChkCurrencySetup);
                    } else {
                        $('#ChkCurrencySetup').prop('checked', false).val(user.ChkCurrencySetup);
                    }

                    if (user.ChkLedger1 == true) {
                        $('#ChkLedger1').prop('checked', true).val(user.ChkLedger1);
                    } else {
                        $('#ChkLedger1').prop('checked', false).val(user.ChkLedger1);
                    }

                    if (user.ChkExpenseReport == true) {
                        $('#ChkExpenseReport').prop('checked', true).val(user.ChkExpenseReport);
                    } else {
                        $('#ChkExpenseReport').prop('checked', false).val(user.ChkExpenseReport);
                    }

                    if (user.ChkReceiptVoucherReport == true) {
                        $('#ChkReceiptVoucherReport').prop('checked', true).val(user.ChkReceiptVoucherReport);
                    } else {
                        $('#ChkReceiptVoucherReport').prop('checked', false).val(user.ChkReceiptVoucherReport);
                    }

                    if (user.ChkCustomerOutstanding == true) {
                        $('#ChkCustomerOutstanding').prop('checked', true).val(user.ChkCustomerOutstanding);
                    } else {
                        $('#ChkCustomerOutstanding').prop('checked', false).val(user.ChkCustomerOutstanding);
                    }

                    if (user.ChkCustomerOutstandingInvoiceWise == true) {
                        $('#ChkCustomerOutstandingInvoiceWise').prop('checked', true).val(user.ChkCustomerOutstandingInvoiceWise);
                    } else {
                        $('#ChkCustomerOutstandingInvoiceWise').prop('checked', false).val(user.ChkCustomerOutstandingInvoiceWise);
                    }

                    if (user.ChkAgingCustomerReport == true) {
                        $('#ChkAgingCustomerReport').prop('checked', true).val(user.ChkAgingCustomerReport);
                    } else {
                        $('#ChkAgingCustomerReport').prop('checked', false).val(user.ChkAgingCustomerReport);
                    }

                    if (user.CHKVendorOutstanding == true) {
                        $('#CHKVendorOutstanding').prop('checked', true).val(user.CHKVendorOutstanding);
                    } else {
                        $('#CHKVendorOutstanding').prop('checked', false).val(user.CHKVendorOutstanding);
                    }

                    if (user.ChkVendorOutstandingInvoiceWise == true) {
                        $('#ChkVendorOutstandingInvoiceWise').prop('checked', true).val(user.ChkVendorOutstandingInvoiceWise);
                    } else {
                        $('#ChkVendorOutstandingInvoiceWise').prop('checked', false).val(user.ChkVendorOutstandingInvoiceWise);
                    }

                    if (user.ChkAgingVendorReport == true) {
                        $('#ChkAgingVendorReport').prop('checked', true).val(user.ChkAgingVendorReport);
                    } else {
                        $('#ChkAgingVendorReport').prop('checked', false).val(user.ChkAgingVendorReport);
                    }

                    if (user.ChkVendorPaymentsReport == true) {
                        $('#ChkVendorPaymentsReport').prop('checked', true).val(user.ChkVendorPaymentsReport);
                    } else {
                        $('#ChkVendorPaymentsReport').prop('checked', false).val(user.ChkVendorPaymentsReport);
                    }

                    if (user.ChkDebitReport == true) {
                        $('#ChkDebitReport').prop('checked', true).val(user.ChkDebitReport);
                    } else {
                        $('#ChkDebitReport').prop('checked', false).val(user.ChkDebitReport);
                    }

                    if (user.ChkCreditReport == true) {
                        $('#ChkCreditReport').prop('checked', true).val(user.ChkCreditReport);
                    } else {
                        $('#ChkCreditReport').prop('checked', false).val(user.ChkCreditReport);
                    }

                    if (user.ChkCustomerReceiptHistoryReport == true) {
                        $('#ChkCustomerReceiptHistoryReport').prop('checked', true).val(user.ChkCustomerReceiptHistoryReport);
                    } else {
                        $('#ChkCustomerReceiptHistoryReport').prop('checked', false).val(user.ChkCustomerReceiptHistoryReport);
                    }

                    if (user.ChkStockItemRegistration == true) {
                        $('#ChkStockItemRegistration').prop('checked', true).val(user.ChkStockItemRegistration);
                    } else {
                        $('#ChkStockItemRegistration').prop('checked', false).val(user.ChkStockItemRegistration);
                    }

                    if (user.ChkOpeningStock == true) {
                        $('#ChkOpeningStock').prop('checked', true).val(user.ChkOpeningStock);
                    } else {
                        $('#ChkOpeningStock').prop('checked', false).val(user.ChkOpeningStock);
                    }

                    if (user.ChkPurchaseOrder == true) {
                        $('#ChkPurchaseOrder').prop('checked', true).val(user.ChkPurchaseOrder);
                    } else {
                        $('#ChkPurchaseOrder').prop('checked', false).val(user.ChkPurchaseOrder);
                    }

                    if (user.ChkPurchaseInvoice == true) {
                        $('#ChkPurchaseInvoice').prop('checked', true).val(user.ChkPurchaseInvoice);
                    } else {
                        $('#ChkPurchaseInvoice').prop('checked', false).val(user.ChkPurchaseInvoice);
                    }

                    if (user.ChPullStock == true) {
                        $('#ChPullStock').prop('checked', true).val(user.ChPullStock);
                    } else {
                        $('#ChPullStock').prop('checked', false).val(user.ChPullStock);
                    }

                    if (user.chkStockSale == true) {
                        $('#chkStockSale').prop('checked', true).val(user.chkStockSale);
                    } else {
                        $('#chkStockSale').prop('checked', false).val(user.chkStockSale);
                    }

                    if (user.ChkStockAdjustment == true) {
                        $('#ChkStockAdjustment').prop('checked', true).val(user.ChkStockAdjustment);
                    } else {
                        $('#ChkStockAdjustment').prop('checked', false).val(user.ChkStockAdjustment);
                    }

                    if (user.ChkStockTransfer == true) {
                        $('#ChkStockTransfer').prop('checked', true).val(user.ChkStockTransfer);
                    } else {
                        $('#ChkStockTransfer').prop('checked', false).val(user.ChkStockTransfer);
                    }

                    if (user.ChkPurcReturn == true) {
                        $('#ChkPurcReturn').prop('checked', true).val(user.ChkPurcReturn);
                    } else {
                        $('#ChkPurcReturn').prop('checked', false).val(user.ChkPurcReturn);
                    }

                    if (user.CHKSaleReturn == true) {
                        $('#CHKSaleReturn').prop('checked', true).val(user.CHKSaleReturn);
                    } else {
                        $('#CHKSaleReturn').prop('checked', false).val(user.CHKSaleReturn);
                    }

                    if (user.cHKExpiredStock == true) {
                        $('#cHKExpiredStock').prop('checked', true).val(user.cHKExpiredStock);
                    } else {
                        $('#cHKExpiredStock').prop('checked', false).val(user.cHKExpiredStock);
                    }

                    if (user.CHKCurrentStockPosition == true) {
                        $('#CHKCurrentStockPosition').prop('checked', true).val(user.CHKCurrentStockPosition);
                    } else {
                        $('#CHKCurrentStockPosition').prop('checked', false).val(user.CHKCurrentStockPosition);
                    }

                    if (user.cHKStockLedger == true) {
                        $('#cHKStockLedger').prop('checked', true).val(user.cHKStockLedger);
                    } else {
                        $('#cHKStockLedger').prop('checked', false).val(user.cHKStockLedger);
                    }

                    if (user.chkDailyStock == true) {
                        $('#chkDailyStock').prop('checked', true).val(user.chkDailyStock);
                    } else {
                        $('#chkDailyStock').prop('checked', false).val(user.chkDailyStock);
                    }

                    if (user.CHkStockWestage == true) {
                        $('#CHkStockWestage').prop('checked', true).val(user.CHkStockWestage);
                    } else {
                        $('#CHkStockWestage').prop('checked', false).val(user.CHkStockWestage);
                    }

                    if (user.AddUser == true) {
                        $('#ChkAddUser').prop('checked', true).val(user.AddUser);
                    } else {
                        $('#ChkAddUser').prop('checked', false).val(user.AddUser);
                    }

                    if (user.ChangePassword == true) {
                        $('#ChkChangePassword').prop('checked', true).val(user.ChangePassword);
                    } else {
                        $('#ChkChangePassword').prop('checked', false).val(user.ChangePassword);
                    }

                    if (user.UserRights == true) {
                        $('#ChkUserRights').prop('checked', true).val(user.UserRights);
                    } else {
                        $('#ChkUserRights').prop('checked', false).val(user.UserRights);
                    }

                    if (user.ChkPONotRecReport == true) {
                        $('#ChkPONotRecReport').prop('checked', true).val(user.ChkPONotRecReport);
                    } else {
                        $('#ChkPONotRecReport').prop('checked', false).val(user.ChkPONotRecReport);
                    }

                    if (user.ChkOutstandingInvoiceAlert == true) {
                        $('#ChkOutstandingInvoiceAlert').prop('checked', true).val(user.ChkOutstandingInvoiceAlert);
                    } else {
                        $('#ChkOutstandingInvoiceAlert').prop('checked', false).val(user.ChkOutstandingInvoiceAlert);
                    }

                    if (user.ChkChkIncomeStatementComparison == true) {
                        $('#ChkChkIncomeStatementComparison').prop('checked', true).val(user.ChkChkIncomeStatementComparison);
                    } else {
                        $('#ChkChkIncomeStatementComparison').prop('checked', false).val(user.ChkChkIncomeStatementComparison);
                    }

                    if (user.ChkLedgerReconcile == true) {
                        $('#ChkLedgerReconcile').prop('checked', true).val(user.ChkLedgerReconcile);
                    } else {
                        $('#ChkLedgerReconcile').prop('checked', false).val(user.ChkLedgerReconcile);
                    }

                    if (user.ChkCustomerCenter == true) {
                        $('#ChkSalesmanSetup').prop('checked', true).val(user.ChkCustomerCenter);
                    } else {
                        $('#ChkSalesmanSetup').prop('checked', false).val(user.ChkCustomerCenter);
                    }

                    if (user.ChkFixedAssetsDep == true) {
                        $('#ChkFixedAssetsDep').prop('checked', true).val(user.ChkFixedAssetsDep);
                    } else {
                        $('#ChkFixedAssetsDep').prop('checked', false).val(user.ChkFixedAssetsDep);
                    }

                    if (user.ChkClosingModule == true) {
                        $('#ChkClosingModule').prop('checked', true).val(user.ChkClosingModule);
                    } else {
                        $('#ChkClosingModule').prop('checked', false).val(user.ChkClosingModule);
                    }







                },
                error: function(data) {
                    console.log(data);
                    $('.overlay').hide();
                },
                complete: function() {
                    $('.overlay').hide();
                    // Hide the overlay and spinner after the request is complete
                }


                });
            }

            });
        });
</script>




@stop


@section('content')
