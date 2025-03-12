@extends('layouts.app')



@section('title', 'Fix Account-Setup')

@section('content_header')
@stop

@section('content')
    <?php echo View::make('partials.Chartacmodal')->with('BranchCode', $BranchCode); ?>

    </div>
    <style>
        .file {
            visibility: hidden;
            position: absolute;
        }
    </style>
    <form action="Company/store" enctype="multipart/form-data" method="POST">
        @csrf





        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">
                    <div class="row">
                        <h2 class="mx-auto">Fix Account Setup</h2>

                        <a name="" id="" class="btn btn-primary" onclick="Dataget();" role="button">check</a>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>


                        </div>

                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" name="" id="btnid">
                            <input type="hidden" name="" id="btnname">


                            <div class="row py-2">

                                <div class="inputbox col-sm-2">
                                    <input type="text" class="" readonly name="TxtCashInHandACCode" value=""
                                        id="TxtCashInHandACCode" required="required">
                                    <span class="Txtspan">
                                        Code
                                    </span>
                                </div>

                                <div class="inputbox col-sm-8">
                                    <input type="text" class="" readonly name="TxtCashAccountTitle" value=""
                                        id="TxtCashAccountTitle" required="required">
                                    <span class="Txtspan">
                                        Cash In Hand Code
                                    </span>
                                </div>

                                <a name="" id="CmdCashCode" class="btn btn-info" data-code="TxtCashInHandACCode"
                                    data-name="TxtCashAccountTitle"
                                    onclick="Findactcode($(this).data('code'),$(this).data('name'))" role="button"><i
                                        class="fa fa-search" aria-hidden="true"></i></a>
                            </div>


                            <div class="row py-2">

                                <div class="inputbox col-sm-2">
                                    <input type="text" class="" readonly name="TxtpurchaseACCode" value=""
                                        id="TxtpurchaseACCode" required="required">
                                    <span class="Txtspan">
                                        Code
                                    </span>
                                </div>

                                <div class="inputbox col-sm-8">
                                    <input type="text" class="" readonly name="TxtPurchaseAccountTitle"
                                        value="" id="TxtPurchaseAccountTitle" required="required">
                                    <span class="Txtspan">
                                        Purchase PO Rec
                                    </span>
                                </div>

                                <a name="" id="CmdPurchaseCode" class="btn btn-info" data-code="TxtpurchaseACCode"
                                    data-name="TxtPurchaseAccountTitle"
                                    onclick="Findactcode($(this).data('code'),$(this).data('name'))" role="button"><i
                                        class="fa fa-search" aria-hidden="true"></i></a>
                            </div>



                            <div class="row py-2">

                                <div class="inputbox col-sm-2">
                                    <input type="text" class="" readonly name="TxtSalesACCode" value=""
                                        id="TxtSalesACCode" required="required">
                                    <span class="Txtspan">
                                        Code
                                    </span>
                                </div>

                                <div class="inputbox col-sm-8">
                                    <input type="text" class="" readonly name="TxtSaleAccountTitle" value=""
                                        id="TxtSaleAccountTitle" required="required">
                                    <span class="Txtspan">
                                        Sales A/C Code
                                    </span>
                                </div>

                                <a name="" id="CmdSalesCode" data-code="TxtSalesACCode"
                                    data-name="TxtSaleAccountTitle" class="btn btn-info"
                                    onclick="Findactcode($(this).data('code'),$(this).data('name'))" role="button"><i
                                        class="fa fa-search" aria-hidden="true"></i></a>
                            </div>


                            <div class="row py-2">

                                <div class="inputbox col-sm-2">
                                    <input type="text" class="" readonly name="TxtPurchaseReACCode"
                                        value="" id="TxtPurchaseReACCode" required="required">
                                    <span class="Txtspan">
                                        Code
                                    </span>
                                </div>

                                <div class="inputbox col-sm-8">
                                    <input type="text" class="" readonly name="TxtPurchaseRetAccountTitle"
                                        value="" id="TxtPurchaseRetAccountTitle" required="required">
                                    <span class="Txtspan">
                                        Purchase Ret. A/C Code
                                    </span>
                                </div>

                                <a name="" id="CmdPurchaseReturnCode" class="btn btn-info"
                                    data-code="TxtPurchaseReACCode" data-name="TxtPurchaseRetAccountTitle"
                                    onclick="Findactcode($(this).data('code'),$(this).data('name'))" role="button"><i
                                        class="fa fa-search" aria-hidden="true"></i></a>
                            </div>





                            <div class="row py-2">

                                <div class="inputbox col-sm-2">
                                    <input type="text" class="" readonly name="TxtSalesRetACCode"
                                        value="" id="TxtSalesRetACCode" required="required">
                                    <span class="Txtspan">
                                        Code
                                    </span>
                                </div>

                                <div class="inputbox col-sm-8">
                                    <input type="text" class="" readonly name="TxtSalesRetAccountTitle"
                                        value="" id="TxtSalesRetAccountTitle" required="required">
                                    <span class="Txtspan">
                                        Sales Ret. A/C Code
                                    </span>
                                </div>

                                <a name="" id="CmdSalesReturnCode" data-code="TxtSalesRetACCode"
                                    data-name="TxtSalesRetAccountTitle" class="btn btn-info"
                                    onclick="Findactcode($(this).data('code'),$(this).data('name'))" role="button"><i
                                        class="fa fa-search" aria-hidden="true"></i></a>
                            </div>


                            <div class="row py-2">

                                <div class="inputbox col-sm-2">
                                    <input type="text" class="" readonly name="TxtCapitalAccountCode"
                                        value="" id="TxtCapitalAccountCode" required="required">
                                    <span class="Txtspan">
                                        Code
                                    </span>
                                </div>

                                <div class="inputbox col-sm-8">
                                    <input type="text" class="" readonly name="TxtAccountTitleCap"
                                        value="" id="TxtAccountTitleCap" required="required">
                                    <span class="Txtspan">
                                        Capital Account Code
                                    </span>
                                </div>

                                <a name="" id="CmdCapitalActCode" data-code="TxtCapitalAccountCode"
                                    data-name="TxtAccountTitleCap" class="btn btn-info"
                                    onclick="Findactcode($(this).data('code'),$(this).data('name'))" role="button"><i
                                        class="fa fa-search" aria-hidden="true"></i></a>
                            </div>


                            <div class="row py-2">

                                <div class="inputbox col-sm-2">
                                    <input type="text" class="" readonly name="TxtSalaryCode" value=""
                                        id="TxtSalaryCode" required="required">

                                    <span class="Txtspan">
                                        Code
                                    </span>
                                </div>

                                <div class="inputbox col-sm-8">
                                    <input type="text" class="" readonly name="TxtSalaryName" value=""
                                        id="TxtSalaryName" required="required">

                                    <span class="Txtspan">
                                        Salary Expense Lv2 A/c
                                    </span>
                                </div>

                                <a name="" id="CmdCreditCardCode" data-code="TxtSalaryCode"
                                    data-name="TxtSalaryName" class="btn btn-info"
                                    onclick="Findactcode($(this).data('code'),$(this).data('name'))" role="button"><i
                                        class="fa fa-search" aria-hidden="true"></i></a>
                            </div>



                            <div class="row py-2">

                                <div class="inputbox col-sm-2">
                                    <input type="text" class="" readonly name="TxtOrderCode" value=""
                                        id="TxtOrderCode" required="required">
                                    <span class="Txtspan">
                                        Code
                                    </span>
                                </div>

                                <div class="inputbox col-sm-8">
                                    <input type="text" class="" readonly name="TxtOrderName" value=""
                                        id="TxtOrderName" required="required">
                                    <span class="Txtspan">
                                        Customer Order Code
                                    </span>
                                </div>

                                <a name="" id="CmbOrderCode" data-code="TxtOrderCode" data-name="TxtOrderName"
                                    class="btn btn-info" onclick="Findactcode($(this).data('code'),$(this).data('name'))"
                                    role="button"><i class="fa fa-search" aria-hidden="true"></i></a>
                            </div>



                            <div class="row py-2">

                                <div class="inputbox col-sm-2">
                                    <input type="text" class="" readonly name="TxtLCode" value=""
                                        id="TxtLCode" required="required">
                                    <span class="Txtspan">
                                        Code
                                    </span>
                                </div>

                                <div class="inputbox col-sm-8">
                                    <input type="text" class="" readonly name="TxtLName" value=""
                                        id="TxtLName" required="required">
                                    <span class="Txtspan">
                                        Labour Expense Code
                                    </span>
                                </div>

                                <a name="" id="Button1" data-code="TxtLCode" data-name="TxtLName"
                                    class="btn btn-info" onclick="Findactcode($(this).data('code'),$(this).data('name'))"
                                    role="button"><i class="fa fa-search" aria-hidden="true"></i></a>
                            </div>



                            <div class="row py-2">

                                <div class="inputbox col-sm-2">
                                    <input type="text" class="" readonly name="TxtStockVendorCode"
                                        value="" id="TxtStockVendorCode" required="required">
                                    <span class="Txtspan">
                                        Code
                                    </span>
                                </div>

                                <div class="inputbox col-sm-8">
                                    <input type="text" class="" readonly name="TxtStockVendorName"
                                        value="" id="TxtStockVendorName" required="required">
                                    <span class="Txtspan">
                                        Stock Vendor
                                    </span>
                                </div>

                                <a name="" id="Button2" data-code="TxtStockVendorCode"
                                    data-name="TxtStockVendorName" class="btn btn-info"
                                    onclick="Findactcode($(this).data('code'),$(this).data('name'))" role="button"><i
                                        class="fa fa-search" aria-hidden="true"></i></a>
                            </div>



                            <div class="row py-2">

                                <div class="inputbox col-sm-2">
                                    <input type="text" class="" readonly name="TxtUnearnCommCode"
                                        value="" id="TxtUnearnCommCode" required="required">
                                    <span class="Txtspan">
                                        Code
                                    </span>
                                </div>

                                <div class="inputbox col-sm-8">
                                    <input type="text" class="" readonly name="TxtUnearnCommName"
                                        value="" id="TxtUnearnCommName" required="required">
                                    <span class="Txtspan">
                                        Commission Income
                                    </span>
                                </div>

                                <a name="" id="Button3" data-code="TxtUnearnCommCode"
                                    data-name="TxtUnearnCommName" class="btn btn-info"
                                    onclick="Findactcode($(this).data('code'),$(this).data('name'))" role="button"><i
                                        class="fa fa-search" aria-hidden="true"></i></a>
                            </div>


                            <div class="row py-2">

                                <div class="inputbox col-sm-2">
                                    <input type="text" class="" readonly name="TxtGstCode" value=""
                                        id="TxtGstCode" required="required">
                                    <span class="Txtspan">
                                        Code
                                    </span>
                                </div>

                                <div class="inputbox col-sm-8">
                                    <input type="text" class="" readonly name="TxtGstName" value=""
                                        id="TxtGstName" required="required">
                                    <span class="Txtspan">
                                        GST/VAT Receivable
                                    </span>
                                </div>

                                <a name="" id="Button4" data-code="TxtGstCode" data-name="TxtGstName"
                                    class="btn btn-info" onclick="Findactcode($(this).data('code'),$(this).data('name'))"
                                    role="button"><i class="fa fa-search" aria-hidden="true"></i></a>
                            </div>



                            <div class="row py-2">

                                <div class="inputbox col-sm-2">
                                    <input type="text" class="" readonly name="TxtGSTIncomeCode" value=""
                                        id="TxtGSTIncomeCode" required="required">
                                    <span class="Txtspan">
                                        Code
                                    </span>
                                </div>

                                <div class="inputbox col-sm-8">
                                    <input type="text" class="" readonly name="TxtGSTIncomeName" value=""
                                        id="TxtGSTIncomeName" required="required">
                                    <span class="Txtspan">
                                        GST/VAT Income
                                    </span>
                                </div>

                                <a name="" id="Button5" data-code="TxtGSTIncomeCode"
                                    data-name="TxtGSTIncomeName" class="btn btn-info"
                                    onclick="Findactcode($(this).data('code'),$(this).data('name'))" role="button"><i
                                        class="fa fa-search" aria-hidden="true"></i></a>
                            </div>


                            <div class="row py-2">

                                <div class="inputbox col-sm-2">
                                    <input type="text" class="" readonly name="TxtMissingActCode"
                                        value="" id="TxtMissingActCode" required="required">
                                    <span class="Txtspan">
                                        Code
                                    </span>
                                </div>

                                <div class="inputbox col-sm-8">
                                    <input type="text" class="" readonly name="TxtMissingActName"
                                        value="" id="TxtMissingActName" required="required">
                                    <span class="Txtspan">
                                        Delvry Missing A/c
                                    </span>
                                </div>

                                <a name="" id="Button6" data-code="TxtMissingActCode"
                                    data-name="TxtMissingActName" class="btn btn-info"
                                    onclick="Findactcode($(this).data('code'),$(this).data('name'))" role="button"><i
                                        class="fa fa-search" aria-hidden="true"></i></a>
                            </div>

                            <div class="row py-2">

                                <div class="inputbox col-sm-2">
                                    <input type="text" class="" readonly name="TxtPurStockCode" value=""
                                        id="TxtPurStockCode" required="required">
                                    <span class="Txtspan">
                                        Code
                                    </span>
                                </div>

                                <div class="inputbox col-sm-8">
                                    <input type="text" class="" readonly name="TxtPurStockName" value=""
                                        id="TxtPurStockName" required="required">
                                    <span class="Txtspan">
                                        Purchase Stock A/c
                                    </span>
                                </div>

                                <a name="" id="Button7" data-code="TxtPurStockCode" data-name="TxtPurStockName"
                                    class="btn btn-info" onclick="Findactcode($(this).data('code'),$(this).data('name'))"
                                    role="button"><i class="fa fa-search" aria-hidden="true"></i></a>

                            </div>


                            <div class="row py-2">

                                <div class="inputbox col-sm-2">
                                    <input type="text" class="" readonly name="TxtCrNoteCode" value=""
                                        id="TxtCrNoteCode" required="required">
                                    <span class="Txtspan">
                                        Code
                                    </span>
                                </div>

                                <div class="inputbox col-sm-8">
                                    <input type="text" class="" readonly name="TxtCrNoteName" value=""
                                        id="TxtCrNoteName" required="required">
                                    <span class="Txtspan">
                                        Cr. Note A/c
                                    </span>
                                </div>

                                <a name="" id="Button8" data-code="TxtCrNoteCode" data-name="TxtCrNoteName"
                                    class="btn btn-info" onclick="Findactcode($(this).data('code'),$(this).data('name'))"
                                    role="button"><i class="fa fa-search" aria-hidden="true"></i></a>
                            </div>



                            <div class="row py-2">

                                <div class="inputbox col-sm-2">
                                    <input type="text" class="" readonly name="TxtCommExpCode" value=""
                                        id="TxtCommExpCode" required="required">
                                    <span class="Txtspan">
                                        Code
                                    </span>
                                </div>

                                <div class="inputbox col-sm-8">
                                    <input type="text" class="" readonly name="TxtCommExpName" value=""
                                        id="TxtCommExpName" required="required">
                                    <span class="Txtspan">
                                        Comm Exp A/c
                                    </span>
                                </div>

                                <a name="" id="Button9" data-code="TxtCommExpCode" data-name="TxtCommExpName"
                                    class="btn btn-info" onclick="Findactcode($(this).data('code'),$(this).data('name'))"
                                    role="button"><i class="fa fa-search" aria-hidden="true"></i></a>
                            </div>




                            <div class="row py-2">

                                <div class="inputbox col-sm-2">
                                    <input type="text" class="" readonly name="TxtStockAdjustCode"
                                        value="" id="TxtStockAdjustCode" required="required">
                                    <span class="Txtspan">
                                        Code
                                    </span>
                                </div>

                                <div class="inputbox col-sm-8">
                                    <input type="text" class="" readonly name="TxtStockAdjustName"
                                        value="" id="TxtStockAdjustName" required="required">
                                    <span class="Txtspan">
                                        Stock Adjustment
                                    </span>
                                </div>

                                <a name="" id="Button10" data-code="TxtStockAdjustCode"
                                    data-name="TxtStockAdjustNameTxtStockAdjustName" class="btn btn-info"
                                    onclick="Findactcode($(this).data('code'),$(this).data('name'))" role="button"><i
                                        class="fa fa-search" aria-hidden="true"></i></a>
                            </div>




                            <div class="row py-2">

                                <a name="" id="CmdSave" class="btn btn-primary col-sm-2 ml-2" role="button"><i
                                        class="fas fa-file mr-1    "></i> Update</a>
                                <a name="" id="CmdExit" class="btn btn-danger col-sm-2 mx-3" href="/"
                                    role="button"><i class="fas fa-door-open  mr-1  "></i> Exit</a>
                            </div>
                        </div>




                        <div class="col-md-6">


                            <div class="row py-2">

                                <div class="inputbox col-sm-2">
                                    <input type="text" class="" readonly name="TxtCOGSCode" value=""
                                        id="TxtCOGSCode" required="required">
                                    <span class="Txtspan">
                                        Code
                                    </span>
                                </div>

                                <div class="inputbox col-sm-8">
                                    <input type="text" class="" readonly name="TxtCOGSName" value=""
                                        id="TxtCOGSName" required="required">
                                    <span class="Txtspan">
                                        Cost Of Goods Sold
                                    </span>
                                </div>

                                <a name="" id="Button11" class="btn btn-info"
                                    onclick="Findactcode($(this).data('code'),$(this).data('name'))" role="button"><i
                                        class="fa fa-search" aria-hidden="true"></i></a>
                            </div>


                            <div class="row py-2">

                                <div class="inputbox col-sm-2">
                                    <input type="text" class="" readonly name="TxtAVIExpCode" value=""
                                        id="TxtAVIExpCode" required="required">
                                    <span class="Txtspan">
                                        Code
                                    </span>
                                </div>

                                <div class="inputbox col-sm-8">
                                    <input type="text" class="" readonly name="TxtAVIExpName" value=""
                                        id="TxtAVIExpName" required="required">
                                    <span class="Txtspan">
                                        AVI Rebait Expense A/c
                                    </span>
                                </div>

                                <a name="" id="Button12" class="btn btn-info"
                                    onclick="Findactcode($(this).data('code'),$(this).data('name'))" role="button"><i
                                        class="fa fa-search" aria-hidden="true"></i></a>
                            </div>


                            <div class="row py-2">

                                <div class="inputbox col-sm-2">
                                    <input type="text" class="" readonly name="TxtAVIPayableCode"
                                        value="" id="TxtAVIPayableCode" required="required">
                                    <span class="Txtspan">
                                        Code
                                    </span>
                                </div>

                                <div class="inputbox col-sm-8">
                                    <input type="text" class="" readonly name="TxtAVIPayableName"
                                        value="" id="TxtAVIPayableName" required="required">
                                    <span class="Txtspan">
                                        AVI Rebait Payable A/c
                                    </span>
                                </div>

                                <a name="" id="Button13" class="btn btn-info"
                                    onclick="Findactcode($(this).data('code'),$(this).data('name'))" role="button"><i
                                        class="fa fa-search" aria-hidden="true"></i></a>
                            </div>


                            <div class="row py-2">

                                <div class="inputbox col-sm-2">
                                    <input type="text" class="" readonly name="TxtBankChargesActCode"
                                        value="" id="TxtBankChargesActCode" required="required">
                                    <span class="Txtspan">
                                        Code
                                    </span>
                                </div>

                                <div class="inputbox col-sm-8">
                                    <input type="text" class="" readonly name="TxtBankChargesActName"
                                        value="" id="TxtBankChargesActName" required="required">
                                    <span class="Txtspan">
                                        Bank Charges A/c
                                    </span>
                                </div>

                                <a name="" id="Button14" class="btn btn-info"
                                    onclick="Findactcode($(this).data('code'),$(this).data('name'))" role="button"><i
                                        class="fa fa-search" aria-hidden="true"></i></a>
                            </div>



                            <div class="row py-2">

                                <div class="inputbox col-sm-5">
                                    <input type="date" class="" name="TxtBackLogDate" id="TxtBackLogDate"
                                        required="required">
                                    <span class="Txtspan">
                                        Back Log date
                                    </span>
                                </div>

                                <div class="inputbox col-sm-5">
                                    <input type="date" class="" name="TxtBackLogStockDate" value=""
                                        id="TxtBackLogStockDate" required="required">
                                    <span class="Txtspan">
                                        Back Log Stock
                                    </span>
                                </div>
                            </div>



                            <div class="row py-2">

                                <div class="inputbox col-sm-2">
                                    <input type="text" class="" readonly name="TxtCompanyTAxCode"
                                        value="" id="TxtCompanyTAxCode" required="required">
                                    <span class="Txtspan">
                                        Code
                                    </span>
                                </div>

                                <div class="inputbox col-sm-8">
                                    <input type="text" class="" readonly name="txtCompanyTaxBName"
                                        value="" id="txtCompanyTaxBName" required="required">
                                    <span class="Txtspan">
                                        Company Tax Payable
                                    </span>
                                </div>

                                <a name="" id="Button15" class="btn btn-info"
                                    onclick="Findactcode($(this).data('code'),$(this).data('name'))" role="button"><i
                                        class="fa fa-search" aria-hidden="true"></i></a>
                            </div>



                            <div class="row py-2">

                                <div class="inputbox col-sm-2">
                                    <input type="text" class="" readonly name="TXtGorssCode" value=""
                                        id="TXtGorssCode" required="required">
                                    <span class="Txtspan">
                                        Code
                                    </span>
                                </div>

                                <div class="inputbox col-sm-8">
                                    <input type="text" class="" readonly name="TxtGrossNAme" value=""
                                        id="TxtGrossNAme" required="required">
                                    <span class="Txtspan">
                                        Company Tax Expense
                                    </span>
                                </div>

                                <a name="" id="Button18" class="btn btn-info"
                                    onclick="Findactcode($(this).data('code'),$(this).data('name'))" role="button"><i
                                        class="fa fa-search" aria-hidden="true"></i></a>
                            </div>


                            <div class="row py-2">

                                <div class="inputbox col-sm-2">
                                    <input type="text" class="" readonly name="TxtDeduction" value=""
                                        id="TxtDeduction" required="required">
                                    <span class="Txtspan">
                                        Code
                                    </span>
                                </div>

                                <div class="inputbox col-sm-8">
                                    <input type="text" class="" readonly name="TxtDedName" value=""
                                        id="TxtDedName" required="required">
                                    <span class="Txtspan">
                                        Loan Deduction (Assets)
                                    </span>
                                </div>

                                <a name="" id="Button16" class="btn btn-info"
                                    onclick="Findactcode($(this).data('code'),$(this).data('name'))" role="button"><i
                                        class="fa fa-search" aria-hidden="true"></i></a>
                            </div>


                            <div class="row py-2">

                                <div class="inputbox col-sm-2">
                                    <input type="text" class="" readonly name="TxtEmpTaxCode" value=""
                                        id="TxtEmpTaxCode" required="required">
                                    <span class="Txtspan">
                                        Code
                                    </span>
                                </div>

                                <div class="inputbox col-sm-8">
                                    <input type="text" class="" readonly name="TxtEmpTAxNAm" value=""
                                        id="TxtEmpTAxNAm" required="required">
                                    <span class="Txtspan">
                                        Emp Tax Liability
                                    </span>
                                </div>

                                <a name="" id="Button17" class="btn btn-info"
                                    onclick="Findactcode($(this).data('code'),$(this).data('name'))" role="button"><i
                                        class="fa fa-search" aria-hidden="true"></i></a>
                            </div>


                            <div class="row py-2">

                                <div class="inputbox col-sm-2">
                                    <input type="text" class="" readonly name="TxtMileageCode" value=""
                                        id="TxtMileageCode" required="required">
                                    <span class="Txtspan">
                                        Code
                                    </span>
                                </div>

                                <div class="inputbox col-sm-8">
                                    <input type="text" class="" readonly name="TxtMileageName" value=""
                                        id="TxtMileageName" required="required">
                                    <span class="Txtspan">
                                        Milage ReImb A/c
                                    </span>
                                </div>

                                <a name="" id="Button19" class="btn btn-info"
                                    onclick="Findactcode($(this).data('code'),$(this).data('name'))" role="button"><i
                                        class="fa fa-search" aria-hidden="true"></i></a>
                            </div>



                            <div class="row py-2">

                                <div class="inputbox col-sm-2">
                                    <input type="text" class="" readonly name="TxtHealthInsCode" value=""
                                        id="TxtHealthInsCode" required="required">
                                    <span class="Txtspan">
                                        Code
                                    </span>
                                </div>

                                <div class="inputbox col-sm-8">
                                    <input type="text" class="" readonly name="TxtHealthInsName" value=""
                                        id="TxtHealthInsName" required="required">
                                    <span class="Txtspan">
                                        Health Insurance Exp
                                    </span>
                                </div>

                                <a name="" id="Button20" class="btn btn-info"
                                    onclick="Findactcode($(this).data('code'),$(this).data('name'))" role="button"><i
                                        class="fa fa-search" aria-hidden="true"></i></a>
                            </div>


                            <div class="row py-2">

                                <div class="inputbox col-sm-2">
                                    <input type="text" class="" readonly name="TxtTripChargesCode"
                                        value="" id="TxtTripChargesCode" required="required">
                                    <span class="Txtspan">
                                        Code
                                    </span>
                                </div>

                                <div class="inputbox col-sm-8">

                                    <input type="text" class="" readonly name="TxtTripChargesName"
                                        value="" id="TxtTripChargesName" required="required">
                                    <span class="Txtspan">
                                        Trip Charges / Bonus
                                    </span>

                                </div>

                                <a name="" id="Button23" class="btn btn-info"
                                    onclick="Findactcode($(this).data('code'),$(this).data('name'))" role="button"><i
                                        class="fa fa-search" aria-hidden="true"></i></a>
                            </div>


                            <div class="row py-2">

                                <div class="inputbox col-sm-2">
                                    <input type="text" class="" readonly name="TxtIncomeAndRevenueActCode"
                                        value="" id="TxtIncomeAndRevenueActCode" required="required">
                                    <span class="Txtspan">
                                        Code
                                    </span>
                                </div>

                                <div class="inputbox col-sm-8">
                                    <input type="text" class="" readonly name="TxtIncomeAndRevenueActName"
                                        value="" id="TxtIncomeAndRevenueActName" required="required">
                                    <span class="Txtspan">
                                        Income And Revenue A/c
                                    </span>
                                </div>

                                <a name="" id="Button22" class="btn btn-info"
                                    onclick="Findactcode($(this).data('code'),$(this).data('name'))" role="button"><i
                                        class="fa fa-search" aria-hidden="true"></i></a>
                            </div>



                            <div class="row py-2">

                                <div class="inputbox col-sm-2">
                                    <input type="text" class="" readonly name="txtRetainedEaringActCode"
                                        value="" id="txtRetainedEaringActCode" required="required">
                                    <span class="Txtspan">
                                        Code
                                    </span>
                                </div>

                                <div class="inputbox col-sm-8">
                                    <input type="text" class="" readonly name="txtRetainedEaringActName"
                                        value="" id="txtRetainedEaringActName" required="required">
                                    <span class="Txtspan">
                                        Retained Earnings A/c
                                    </span>
                                </div>

                                <a name="" id="Button21" class="btn btn-info"
                                    onclick="Findactcode($(this).data('code'),$(this).data('name'))" role="button"><i
                                        class="fa fa-search" aria-hidden="true"></i></a>
                            </div>



                            <div class="row py-2">

                                <div class="inputbox col-sm-2">
                                    <input type="text" class="" readonly name="TxtPORecDirectSupplyCode"
                                        value="" id="TxtPORecDirectSupplyCode" required="required">
                                    <span class="Txtspan">
                                        Code
                                    </span>
                                </div>

                                <div class="inputbox col-sm-8">
                                    <input type="text" class="" readonly name="TxtPORecDirectSupplyName"
                                        value="" id="TxtPORecDirectSupplyName" required="required">
                                    <span class="Txtspan">
                                        PO Rec Direct Supply
                                    </span>
                                </div>

                                <a name="" id="Button24" class="btn btn-info"
                                    onclick="Findactcode($(this).data('code'),$(this).data('name'))" role="button"><i
                                        class="fa fa-search" aria-hidden="true"></i></a>
                            </div>

                            <div class="row py-2">

                                <div class="inputbox col-sm-10">
                                    <input type="date" class="" name="TxtDateDirectSupply"
                                        id="TxtDateDirectSupply" required="required">
                                    <span class="Txtspan">
                                        Direct Supply Date
                                    </span>
                                </div>
                            </div>



                            <div class="row py-2">

                                <div class="inputbox col-sm-2">
                                    <input type="text" class="" readonly name="TxtPullStockForSaleCode"
                                        value="" id="TxtPullStockForSaleCode" required="required">
                                    <span class="Txtspan">
                                        Code
                                    </span>
                                </div>

                                <div class="inputbox col-sm-8">
                                    <input type="text" class="" readonly name="TxtPullStockForSaleName"
                                        value="" id="TxtPullStockForSaleName" required="required">
                                    <span class="Txtspan">
                                        Pull Stock for Sale
                                    </span>
                                </div>

                                <a name="" id="Button25" class="btn btn-info"
                                    data-code="TxtPullStockForSaleCode" data-name="TxtPullStockForSaleName"
                                    onclick="Findactcode($(this).data('code'),$(this).data('name'))" role="button"><i
                                        class="fa fa-search" aria-hidden="true"></i></a>
                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>





@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">



@stop

@section('js')
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>


    <script>
        // function Findactcode($(this).data('code'),$(this).data('name')) {
        //     var name = $(this).data('name');
        //     var code = $(this).data('code');
        //     console.log(code);
        //     console.log(name);




        // }
        function Findactcode(buttonId, buttonname) {

            console.log('Data Code:', buttonId);
            console.log('Data Name:', buttonname);
            $('#btnid').val(buttonId);
            $('#btnname').val(buttonname);
            $('#chart').modal("show");
        }



        function ajaxSetup() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        }

        function Dataget() {
            ajaxSetup();

            $.ajax({
                url: '/FixAccountSetupGet',
                type: 'POST',
                data: {



                },
                beforeSend: function() {
                    // Show the overlay and spinner before sending the request
                    $('.overlay').show();
                },
                success: function(resposne) {
                    console.log(resposne);
                    var Data = resposne.FixAccountSetup;
                    if (Data) {

                        $('#TxtCashInHandACCode').val(Data.ActCashCode);
                        $('#TxtSalesACCode').val(Data.ActSalesCode);
                        $('#TxtpurchaseACCode').val(Data.ActPurchaseCode);
                        $('#TxtPurchaseReACCode').val(Data.ActPurRetCode);
                        $('#TxtSalesRetACCode').val(Data.ActSalesRetCode);

                        $('#TxtCapitalAccountCode').val(Data.MCapCode);

                        $('#TxtSalaryCode').val(Data.ActCreditCardCode);

                        $('#TxtOrderCode').val(Data.ActOrderCode);

                        $('#TxtLCode').val(Data.LCode);

                        $('#TxtStockVendorCode').val(Data.StockVendorCode);

                        $('#TxtUnearnCommCode').val(Data.UnEarnCommCode);


                        $('#TxtUnearnCommName').val(Data.UnEarnCommName);


                        $('#TxtGstName').val(Data.GstName);


                        $('#TxtGstCode').val(Data.GstCode);

                        $('#TxtGSTIncomeName').val(Data.GstIncomeName);

                        $('#TxtGSTIncomeCode').val(Data.GstIncomeCode);


                        $('#TxtSalaryName').val(Data.SalaryName);

                        $('#TxtMissingActCode').val(Data.MissingActCode);

                        $('#TxtMissingActName').val(Data.MissingActName);

                        $('#TxtPurStockCode').val(Data.PurStockCode);

                        $('#TxtPurStockName').val(Data.PurStockName);

                        $('#TxtCrNoteCode').val(Data.CrNoteCode);

                        $('#TxtCrNoteName').val(Data.CrNoteName);

                        $('#TxtCommExpCode').val(Data.CommExpCode);

                        $('#TxtCommExpName').val(Data.CommExpName);



                        $('#TxtStockAdjustCode').val(Data.StockAdjustCode);

                        $('#TxtStockAdjustName').val(Data.StockAdjustName);

                        $('#TxtCOGSCode').val(Data.COGSCode);

                        $('#TxtCOGSName').val(Data.COGSName);

                        $('#TxtAVIExpCode').val(Data.AVIExpCode);

                        $('#TxtAVIExpName').val(Data.AVIExpName);


                        $('#TxtAVIPayableCode').val(Data.AVIPayableCode);

                        $('#TxtAVIPayableName').val(Data.AVIPayableName);


                        $('#TxtBankChargesActCode').val(Data.BankChargesActCode);

                        $('#TxtBankChargesActName').val(Data.BankChargesActName);

                        // $('#TxtBackLogDate').val(Data.BackLogDate);

                        // $('#TxtBackLogStockDate').val(Data.BacklogStockDate);

                        $('#TxtCompanyTAxCode').val(Data.CompanyTAxActCode);

                        $('#txtCompanyTaxBName').val(Data.CompanyTaxActName);









                        $('#TxtEmpTaxCode').val(Data.EmpTAxActCode);

                        $('#TxtEmpTAxNAm').val(Data.EmpTAxActName);


                        $('#TxtDeduction').val(Data.DeductionActCode);

                        $('#TxtDedName').val(Data.DeductionActName);

                        $('#TXtGorssCode').val(Data.CTaxActCodeExp);

                        $('#TxtGrossNAme').val(Data.CTaxActNameExp);

                        $('#TxtMileageCode').val(Data.MileageCode);

                        $('#TxtMileageName').val(Data.MileageName);


                        $('#TxtIncomeAndRevenueActCode').val(Data.IncomeAndRevenueActCode);

                        $('#TxtIncomeAndRevenueActName').val(Data.IncomeAndRevenueActName);


                        $('#txtRetainedEaringActCode').val(Data.RetainedEarningActCode);

                        $('#txtRetainedEaringActName').val(Data.RetainedEarningActname);

                        $('#TxtHealthInsCode').val(Data.HealthInsCode);

                        $('#TxtTripChargesCode').val(Data.TripChargesCode);



                        $('#TxtPORecDirectSupplyCode').val(Data.PORecDirectSupplyCode);
                        $('#TxtDateDirectSupply').val('');
                        if (Data.DateDirectSupply) {
                            var dsdate1 = new Date(Data.DateDirectSupply);
                            const drcsdate = dsdate1.toISOString().substring(0, 10);
                            $('#TxtDateDirectSupply').val(drcsdate);

                        }

                        $('#TxtPullStockForSaleCode').val(Data.PullStockForSaleActCode);

                        $('#TxtPullStockForSaleName').val(Data.PullStockForSaleActName);



                        $('#TxtBankChargesActCode').val(Data.BankChargesActCode);

                        $('#TxtBankChargesActName').val(Data.BankChargesActName);
                        $('#TxtBackLogDate').val('');
                        if (Data.BackLogDate) {
                            var backdate = new Date(Data.BackLogDate);
                            const Bdate = backdate.toISOString().substring(0, 10);
                            $('#TxtBackLogDate').val(Bdate);

                        }

                        $('#TxtBackLogStockDate').val('');
                        if (Data.BackLogStockDate) {
                            var blsdate = new Date(Data.BackLogStockDate);
                            const Blgsdate = blsdate.toISOString().substring(0, 10);

                            $('#TxtBackLogStockDate').val(Blgsdate);

                        }

                        $('#TxtCompanyTAxCode').val(Data.CompanyTAxActCode);

                        $('#txtCompanyTaxBName').val(Data.CompanyTaxActName);

                        $('#TxtAVIPayableCode').val(Data.AVIPayableCode);

                        $('#TxtAVIPayableName').val(Data.AVIPayableName);


                        $('#TxtBankChargesActCode').val(Data.BankChargesActCode);

                        $('#TxtBankChargesActName').val(Data.BankChargesActName);



                        $('#TxtCompanyTAxCode').val(Data.CompanyTAxActCode);

                        $('#txtCompanyTaxBName').val(Data.CompanyTaxActName);
                        $('#TxtCashAccountTitle').val(resposne.TxtCashAccountTitle);
                        $('#TxtPurchaseAccountTitle').val(resposne.TxtPurchaseAccountTitle);
                        $('#TxtSaleAccountTitle').val(resposne.TxtSaleAccountTitle);
                        $('#TxtPurchaseRetAccountTitle').val(resposne.TxtPurchaseRetAccountTitle);
                        $('#TxtSalesRetAccountTitle').val(resposne.TxtSalesRetAccountTitle);
                        $('#TxtAccountTitleCap').val(resposne.TxtAccountTitleCap);
                        $('#TxtStockVendorName').val(resposne.TxtStockVendorName);
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
        $(document).ready(function() {
            $('.parrent').dblclick(function(e) {
                e.preventDefault();
                var name = $(this).data('acname');
                var code = $(this).data('accode');
                var codeget = $('#btnid').val();
                var nameget = $('#btnname').val();
                $('#' + codeget).val(code);
                $('#' + nameget).val(name);
                $('#chart').modal("hide");

            });


            Dataget();



            $('#CmdSave').click(function(e) {
                e.preventDefault();
                var TxtCashInHandACCode = $('#TxtCashInHandACCode').val();
                var TxtCashAccountTitle = $('#TxtCashAccountTitle').val();

                var TxtpurchaseACCode = $('#TxtpurchaseACCode').val();
                var TxtPurchaseAccountTitle = $('#TxtPurchaseAccountTitle').val();

                var TxtSalesACCode = $('#TxtSalesACCode').val();
                var TxtSaleAccountTitle = $('#TxtSaleAccountTitle').val();

                var TxtPurchaseReACCode = $('#TxtPurchaseReACCode').val();
                var TxtPurchaseRetAccountTitle = $('#TxtPurchaseRetAccountTitle').val();

                var TxtSalesRetAccountTitle = $('#TxtSalesRetAccountTitle').val();
                var TxtSalesRetACCode = $('#TxtSalesRetACCode').val();

                var TxtCapitalAccountCode = $('#TxtCapitalAccountCode').val();
                var TxtAccountTitleCap = $('#TxtAccountTitleCap').val();

                var TxtSalaryCode = $('#TxtSalaryCode').val();
                var TxtSalaryName = $('#TxtSalaryName').val();

                var TxtOrderCode = $('#TxtOrderCode').val();
                var TxtOrderName = $('#TxtOrderName').val();

                var TxtLCode = $('#TxtLCode').val();
                var TxtLName = $('#TxtLName').val();

                var TxtStockVendorCode = $('#TxtStockVendorCode').val();
                var TxtStockVendorName = $('#TxtStockVendorName').val();

                var TxtUnearnCommCode = $('#TxtUnearnCommCode').val();
                var TxtUnearnCommName = $('#TxtUnearnCommName').val();

                var TxtGstCode = $('#TxtGstCode').val();
                var TxtGstName = $('#TxtGstName').val();

                var TxtGSTIncomeCode = $('#TxtGSTIncomeCode').val();
                var TxtGSTIncomeName = $('#TxtGSTIncomeName').val();

                var TxtMissingActCode = $('#TxtMissingActCode').val();
                var TxtMissingActName = $('#TxtMissingActName').val();

                var TxtPurStockCode = $('#TxtPurStockCode').val();
                var TxtPurStockName = $('#TxtPurStockName').val();


                var TxtCrNoteCode = $('#TxtCrNoteCode').val();
                var TxtCrNoteName = $('#TxtCrNoteName').val();

                var TxtCommExpCode = $('#TxtCommExpCode').val();
                var TxtCommExpName = $('#TxtCommExpName').val();

                var TxtStockAdjustCode = $('#TxtStockAdjustCode').val();
                var TxtStockAdjustName = $('#TxtStockAdjustName').val();

                var TxtCOGSCode = $('#TxtCOGSCode').val();
                var TxtCOGSName = $('#TxtCOGSName').val();

                var TxtAVIExpCode = $('#TxtAVIExpCode').val();
                var TxtAVIExpName = $('#TxtAVIExpName').val();

                var TxtAVIPayableCode = $('#TxtAVIPayableCode').val();
                var TxtAVIPayableName = $('#TxtAVIPayableName').val();

                var TxtBankChargesActCode = $('#TxtBankChargesActCode').val();
                var TxtBankChargesActName = $('#TxtBankChargesActName').val();

                var TxtBackLogDate = $('#TxtBackLogDate').val();
                var TxtBackLogStockDate = $('#TxtBackLogStockDate').val();

                var TXtGorssCode = $('#TXtGorssCode').val();
                var TxtGrossNAme = $('#TxtGrossNAme').val();

                var TxtDeduction = $('#TxtDeduction').val();
                var TxtDedName = $('#TxtDedName').val();

                var TxtEmpTaxCode = $('#TxtEmpTaxCode').val();
                var TxtEmpTAxNAm = $('#TxtEmpTAxNAm').val();

                var TxtMileageCode = $('#TxtMileageCode').val();
                var TxtMileageName = $('#TxtMileageName').val();

                var TxtHealthInsCode = $('#TxtHealthInsCode').val();
                var TxtHealthInsName = $('#TxtHealthInsName').val();

                var TxtTripChargesCode = $('#TxtTripChargesCode').val();
                var TxtTripChargesName = $('#TxtTripChargesName').val();

                var TxtIncomeAndRevenueActCode = $('#TxtIncomeAndRevenueActCode').val();
                var TxtIncomeAndRevenueActName = $('#TxtIncomeAndRevenueActName').val();

                var txtRetainedEaringActCode = $('#txtRetainedEaringActCode').val();
                var txtRetainedEaringActName = $('#txtRetainedEaringActName').val();

                var TxtPORecDirectSupplyCode = $('#TxtPORecDirectSupplyCode').val();
                var TxtPORecDirectSupplyName = $('#TxtPORecDirectSupplyName').val();

                var TxtPullStockForSaleCode = $('#TxtPullStockForSaleCode').val();
                var TxtPullStockForSaleName = $('#TxtPullStockForSaleName').val();

                var TxtDateDirectSupply = $('#TxtDateDirectSupply').val();




                if (TxtCashInHandACCode == '') {
                    $('#TxtCashInHandACCode').focus();
                    return;
                }
                if (TxtpurchaseACCode == '') {
                    $('#TxtpurchaseACCode').focus();
                    return;
                }
                if (TxtSalesACCode == '') {
                    $('#TxtSalesACCode').focus();
                    return;
                }
                if (TxtPurchaseReACCode == '') {
                    $('#TxtPurchaseReACCode').focus();
                    return;
                }
                if (TxtCapitalAccountCode == '') {
                    $('#TxtCapitalAccountCode').focus();
                    return;
                }
                if (TxtStockVendorCode == '') {
                    $('#TxtStockVendorCode').focus();
                    return;
                }


                ajaxSetup();
                $.ajax({
                    url: '/FixAccountSetupupdate',
                    type: 'POST',
                    data: {
                        TxtCashInHandACCode,
                        TxtCashAccountTitle,
                        TxtpurchaseACCode,
                        TxtPurchaseAccountTitle,

                        TxtSalesACCode,
                        TxtSaleAccountTitle,

                        TxtPurchaseReACCode,
                        TxtPurchaseRetAccountTitle,

                        TxtSalesRetAccountTitle,
                        TxtSalesRetACCode,
                        TxtCapitalAccountCode,
                        TxtAccountTitleCap,

                        TxtSalaryCode,
                        TxtSalaryName,

                        TxtOrderCode,
                        TxtOrderName,

                        TxtLCode,
                        TxtLName,

                        TxtStockVendorCode,
                        TxtStockVendorName,
                        TxtUnearnCommCode,
                        TxtUnearnCommName,

                        TxtGstCode,
                        TxtGstName,

                        TxtGSTIncomeCode,
                        TxtGSTIncomeName,

                        TxtMissingActCode,
                        TxtMissingActName,

                        TxtPurStockCode,
                        TxtPurStockName,


                        TxtCrNoteCode,
                        TxtCrNoteName,

                        TxtCommExpCode,
                        TxtCommExpName,

                        TxtStockAdjustCode,
                        TxtStockAdjustName,

                        TxtCOGSCode,
                        TxtCOGSName,

                        TxtAVIExpCode,
                        TxtAVIExpName,

                        TxtAVIPayableCode,
                        TxtAVIPayableName,

                        TxtBankChargesActCode,
                        TxtBankChargesActName,

                        TxtBackLogDate,
                        TxtBackLogStockDate,

                        TXtGorssCode,
                        TxtGrossNAme,

                        TxtDeduction,
                        TxtDedName,

                        TxtEmpTaxCode,
                        TxtEmpTAxNAm,

                        TxtMileageCode,
                        TxtMileageName,

                        TxtHealthInsCode,
                        TxtHealthInsName,

                        TxtTripChargesCode,
                        TxtTripChargesName,

                        TxtIncomeAndRevenueActCode,
                        TxtIncomeAndRevenueActName,

                        txtRetainedEaringActCode,
                        txtRetainedEaringActName,

                        TxtPORecDirectSupplyCode,
                        TxtPORecDirectSupplyName,

                        TxtPullStockForSaleCode,
                        TxtPullStockForSaleName,

                        TxtDateDirectSupply,

                    },
                    beforeSend: function() {
                        // Show the overlay and spinner before sending the request
                        $('.overlay').show();
                    },
                    success: function(resposne) {
                        console.log(resposne);
                        if (resposne.Message == 'Saved') {
                            alert('Saved');
                            Dataget();
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


            });

        });
    </script>
@stop


@section('content')
