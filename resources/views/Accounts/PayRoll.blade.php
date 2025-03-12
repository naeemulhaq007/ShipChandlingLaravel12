@extends('layouts.app')



@section('title', 'Pay-Roll')

@section('content_header')


@stop

@section('content')
    </div>

    <div class="container-fluid">


        <div class="col-lg-12">
            <div class="row">

            </div>

            <div class="card mt-3">
                <div class="card-header">
                    <h3 class="text-center text-bold">Pay Roll</h3>
                </div>


                <div style="background-color:#EEE; " class="card-header">
                    <div class="card-tools ">
                        <div class=" row">
                        <button id="storepdf" class="btn btn-default mr-1" type="button"><i style="font-size: 21px" class="fas fa-save text-info   "></i></button>
                        <a name="" id="pdf" class="btn btn-default mr-1"  role="button"><i style="font-size: 21px" class="fas fa-file-pdf text-danger   "></i></a> --}}

                         

                            <a name="firstvoucher" data-voucherno="" id="firstvoucher" class="btn btn-secondary mx-1"
                                role="button"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                            <a name="" id="minus" class="btn btn-info mx-1" onclick="MinusCaps()"
                                role="button"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a>
                            <div class="col-sm-3">
                                <div class="inputbox">
                                   

                                    <input class="" type="number" id="TxtVoucherNo" name="TxtVoucherNo"
                                        value="">

                                </div>
                            </div>
                            <a name="" id="plus" class="btn btn-info mx-1" onclick="PlusCaps()"
                                role="button"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                            <a name="" id="lastvoucher" data-voucherno="" class="btn btn-secondary mx-1"
                                role="button"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>


                            <button type="button" name="headertoggle" class="btn btn-tool ml-auto"
                                data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <label class="mx-auto" id="workuser" for="">WorkUser</label>
                    </div>

                </div>

                <div class="card-body">

                    <div class="row py-2">

                        <div class="inputbox col-sm-2">
                            <input id='TxtDate' type="date" class="" value="">
                            <span class="" id="">Date</span>
                        </div>

                        <div class="inputbox col-sm-2">
                            <input class="" type="text" name="TxtRefNo" id="TxtRefNo">
                            <span class="" id="">Ref #</span>
                        </div>

                        <a name="" id="" class="btn btn-info ml-auto mr-1" href="<?php echo url('EmployeeRegistration'); ?>"
                            role="button">Employee Setup</a>
                        <a name="" id="" class="btn btn-info mx-1" role="button">Edit Entry <i
                                class="fas fa-arrow-left mr-1"></i></a>
                    </div>

                    <div class="row py-2">

                        <div class="inputbox col-sm-2">
                            <span class="Txtspan" id="">Location</span>
                            <select class="" id="CmbDepartment" name="">
                                <option>Text</option>
                            </select>
                        </div>

                        <div class="inputbox col-sm-1">
                            <input type="text" class="" name="TxtDepartmentCode" id="TxtDepartmentCode">
                        </div>

                        <div class="inputbox col-sm-2">
                            <span class="Txtspan" id="">Month</span>
                            <select class="" id="CmbMonth" name="">
                                <option>Text</option>
                            </select>
                        </div>

                        <div class="inputbox col-sm-1">
                            <input class="" type="text" name="TxtYear" id="TxtYear">
                            <span class="" id="">Year</span>
                        </div>

                        <div class="inputbox col-sm-1">
                            <input class="" type="text" name="TxtDays" id="TxtDays">
                            <span class="" id="">Days</span>
                        </div>

                        <div class="inputbox col-sm-1">
                            <input class="" type="text" name="TxtMonthNo" id="TxtMonthNo">
                            <span class="" id="">Month #</span>
                        </div>

                        <a name="CmdFillEmployee" id="CmdFillEmployee" class="btn btn-info ml-auto mr-1"
                            role="button">Fill Emloyee >></a>
                        <a name="Expensebtn" id="Expensebtn" class="btn btn-info mx-1" href="<?php echo url('ExpensePaymentVoucher'); ?>"
                            role="button">Expense Voucher</a>
                        <a name="CmdTrialBalance" id="CmdTrialBalance" class="btn btn-info mx-1" role="button">Trial
                            Balance</a>
                    </div>


                </div>
            </div>

            <table class="table" id="PO-recivedtable">
                <thead class="">
                    <tr>
                        <th>Code</th>&nbsp;
                        <th>Employee&nbsp;Name</th>
                        <th>Pay&nbsp;Type</th>
                        <th>Gross&nbsp;Salary</th>
                        <th>Loan&nbsp;Deduction</th>
                        <th>Garnishment</th>
                        <th>Health&nbsp;Insurance</th>
                        <th>Employee&nbsp;Tax</th>
                        <th>Company&nbsp;Tax</th>
                        <th>Mileage&nbsp;ReImb.</th>
                        <th>Trip Charges/&nbsp;Bonus</th>
                        <th>Net&nbsp;Salary</th>
                        <th>Remarks</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="Receiptvocvertablebody">
                    <tr data-row-id="">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><a name="CmdAddEmp" id="CmdAddEmp" class="btn btn-default" role="button"><i
                                    class="fas fa-plus-square"></i></a></td>
                    </tr>
                </tbody>
            </table>


            <div class="card">
                <div class="card-body">

                    <div class="row py-2">

                        <div class="inputbox  col-sm-1">
                            <input type="text" class=" " name="TxtTotgross"
                                id="TxtTotgross">
                        </div>

                        <div class="inputbox  col-sm-1">
                            <input type="text" class=" " name="TxtTotLoan" id="TxtTotLoan">
                        </div>

                        <div class="inputbox  col-sm-1">
                            <input type="text" class=" " name="TxtGarnishment"
                                id="TxtGarnishment">
                        </div>

                        <div class="inputbox  col-sm-1">
                            <input type="text" class=" " name="TxtHealthInsurance"
                                id="TxtHealthInsurance">
                        </div>

                        <div class="inputbox  col-sm-1">
                            <input type="text" class=" " name="TxtTotEmpTax"
                                id="TxtTotEmpTax">
                        </div>

                        <div class="inputbox  col-sm-1">
                            <input type="text" class=" " name="TxtTotComTax"
                                id="TxtTotComTax">
                        </div>

                        <div class="inputbox  col-sm-1">
                            <input type="text" class=" " name="TxtMilage" id="TxtMilage">
                        </div>

                        <div class="inputbox  col-sm-1">
                            <input type="text" class=" " name="TxtTripCharges"
                                id="TxtTripCharges">
                        </div>

                        <div class="inputbox  col-sm-1">
                            <input type="text" class=" " name="TxtTotal" id="TxtTotal">
                        </div>


                        <a name="" id="SelectAll" class="btn btn-info" role="button">Select All</a>
                        <a name="" id="UnSelectAll" class="btn btn-info ml-2" role="button">UnSelect All</a>

                    </div>

                    <div class="row py-2">

                        <div class="inputbox col-sm-1">
                            <input class="" type="text" name="txtActcode" id="txtActcode">
                        </div>

                        <div class="inputbox col-sm-5">
                            <input class="" type="text" name="TxtActNAme" id="TxtActNAme">
                            <span class="" id="">Act Code</span>
                        </div>

                        <div class="inputbox col-sm-1">
                            <input class="" type="text" name="TxtNetSalaryPayableCode"
                            id="TxtNetSalaryPayableCode">
                        </div>

                        <div class="inputbox col-sm-5">
                            <input class="" type="text" name="TxtNetSalaryPayableName"
                            id="TxtNetSalaryPayableName">
                            <span class="" id="">Net Salary Payable</span>
                        </div>

                    </div>

                    <div class="row py-2">
                        <div class="mx-auto">
                            <a name="" id="Newinv" class="btn btn-primary mx-1" role="button"><i
                                    class="fa fa-plus mr-1" aria-hidden="true"></i> New</a>

                            <a name="CmdSave" id="CmdSave" class="btn btn-success mx-1" role="button"><i
                                    class="fa fa-cloud mr-1" aria-hidden="true"></i> Save</a>

                            <a name="" id="" class="btn btn-warning mx-1" role="button"> <i
                                    class="fas fa-trash mr-1"></i> Delete</a>

                            <a name="" id="" class="btn btn-danger mx-1" role="button"><i
                                    class="fas fa-door-open mr-1"></i> Exit</a>

                            <a name="" id="" class="btn btn-primary mx-1" role="button"><img
                                    class="img-fluid" border="1" src="<?php echo url('assets/images/bank-check.png'); ?>" style="max-width:20px">
                                Print Sheet</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>



    </div>


@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
    <style>
        .form-group {
            position: relative;
        }

        .title {
            position: absolute;
            top: -1.5em;
            left: 0.25em;
            background-color: #fff;
            padding: 0 0.5em;
        }

        .custom-col-2 {
            flex: 0 0 12.6%;
            max-width: 12.6%;
        }

        .span2 {
            width: 110px;
            font-size: 11px;

        }

        .card-body span {}

        .form-control {
            font-size: 11px;

        }
    </style>
@stop

@section('js')
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
    {{-- <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script> --}}
    {{-- <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js" integrity="sha512-a9NgEEK7tsCvABL7KqtUTQjl69z7091EVPpw5KxPlZ93T141ffe1woLtbXTX+r2/8TtTvRX/v4zTL2UlMUPgwg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    {{-- <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script> --}}
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
    <script>
        $(document).ready(function() {


        });
        $(document).ready(function() {
            // dataget();
            var table = $('#PO-recivedtable').DataTable({

                scrollY: 350,
                deferRender: true,
                scroller: true,
                paging: false,
                info: false,
                ordering: false,
                dom: 'Bfrtip',
                buttons: [


                    {
                        text: 'ADD',
                        className: 'btn btn-primary ',
                        action: function(e, dt, node, config) {
                            Rowaddfunc();
                        }
                    },

                    // {
                    //     text: 'Edit',
                    // className: 'btn btn-primary ',
                    // action: function ( e, dt, node, config ) {
                    //     Roweditfunc();

                    // }
                    // },
                    {
                        text: 'Delete',
                        className: 'btn btn-primary',
                        action: function(e, dt, node, config) {
                            var id = $('#deleteButton').attr('data-row-id');
                            Rowdeletefunc(table, id);
                        },
                        init: function(api, node, config) {
                            $(node).attr('id', 'deleteButton');
                            $(node).attr('data-row-id', '');
                        }
                    }, {
                        text: 'Print',
                        className: 'btn btn-primary ',
                        action: function(e, dt, node, config) {
                            // Rowaddfunc();
                            $('#ExpenseVoucherReport').modal('show');

                        }
                    },
                ],

            });
            $(".dt-button").removeClass("dt-button")

            $('#TxtVoucherNo').blur(function() {
                dataget();
            });

            $("#TxtVoucherNo").on("keydown", function(event) {
                if (event.which === 13) {
                    dataget();
                }
            });
            $('#lastvoucher').click(function(e) {
                var voucherno = document.getElementById("lastvoucher").dataset.voucherno;
                document.getElementById("TxtVoucherNo").value = voucherno;
                dataget();
            });
            $('#firstvoucher').click(function(e) {
                var voucherno = document.getElementById("firstvoucher").dataset.voucherno;
                document.getElementById("TxtVoucherNo").value = voucherno;
                dataget();
            });


            $('#PO-recivedtable tbody').on('click', 'tr', function() {
                if ($(this).hasClass('selected')) {
                    $(this).removeClass('selected');
                    $('#deleteButton').attr('data-row-id', '');
                } else {
                    table.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                    var id = $(this).attr('data-row-id');
                    $('#deleteButton').attr('data-row-id', id);
                }
            });

            function Rowdeletefunc(table, id) {
                if (id) {
                    table.row('[data-row-id="' + id + '"]').remove().draw();
                    $('#deleteButton').attr('data-row-id', '');
                }
            }

            function Rowaddfunc() {

                // alert('add');
                // var pkrrate = document.getElementById("pkrrate").value;
                var TxtActCode = document.getElementById("TxtActCode").value;
                var TxtActName = document.getElementById("TxtActName").value;
                var TxtCurrency = document.getElementById("CmbCurrency").value;
                // var TxtActCode = document.getElementById("TxtActCode").value;
                // var TxtActName = document.getElementById("TxtActName").value;
                var TxtAmount = document.getElementById("TxtAmount").value;
                // var TxtInvAmount = document.getElementById("TxtInvAmount").value;
                var TxtChqNo = document.getElementById("TxtChqNo").value;
                var CmbPayType = $("#CmbPayType option:selected").text();
                // var VenderCode = $("#CmbPayType option:selected").val();
                var inputDate = document.getElementById("TxtChqDate").value;
                var date = new Date(inputDate);

                // Create an array of month names in the desired format
                var months = ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'];

                // Get the day, month, and year from the Date object
                var day = date.getDate();
                var month = months[date.getMonth()];
                var year = date.getFullYear();

                // Create the final date string in the desired format
                var TxtChqDate = day + '-' + month + '-' + year; // "17-NOV-2022"
                // alert(TxtChqDate);
                var TxtDesc = document.getElementById("TxtDesc").value;
                var TxtBank = document.getElementById("TxtActCashName").value;
                // var TxtVesselName = document.getElementById("TxtVesselName").value;



                var table = document.getElementById("PO-recivedtable");

                // Create a new row
                // let row = table.insertRow();
                var newRow = table.insertRow(-1);
                var TxtActCodeCell = newRow.insertCell(0);
                var TxtActNameCell = newRow.insertCell(1);
                var BankNameCell = newRow.insertCell(2);
                // var TxtInvAmountCell = newRow.insertCell(2);
                var PKRAmountCell = newRow.insertCell(3);
                var CurrencyCell = newRow.insertCell(4);
                var TxtAmountCell = newRow.insertCell(5);
                var TxtChqNoCell = newRow.insertCell(6);
                var TxtChqDateCell = newRow.insertCell(7);
                var TxtDescCell = newRow.insertCell(8);
                // var InvoicnoCell = newRow.insertCell(8);
                // var RefnoCell = newRow.insertCell(9);
                // var VesselNameCell = newRow.insertCell(10);

                TxtActCodeCell.innerHTML = TxtActCode;
                TxtActNameCell.innerHTML = TxtActName;
                BankNameCell.innerHTML = TxtBank;
                // TxtInvAmountCell.innerHTML = TxtInvAmount;
                PKRAmountCell.innerHTML = parseFloat(pkrrate * TxtAmount).toFixed(2);
                CurrencyCell.innerHTML = TxtCurrency;
                TxtAmountCell.innerHTML = TxtAmount;
                TxtChqNoCell.innerHTML = TxtChqNo;
                TxtChqDateCell.innerHTML = TxtChqDate;
                TxtDescCell.innerHTML = TxtDesc;
                // InvoicnoCell.innerHTML = TxtClientOrder;
                // RefnoCell.innerHTML = TxtRefno;
                // VesselNameCell.innerHTML = TxtVesselName;
                // BankChargesCell.hidden = true;


            };

            function Roweditfunc() {
                alert('edit');

            };

            $('#CmdSave').click(function(e) {
                let TxtActCashCode = $('#TxtActCashCode').val();
                let TxtVoucherNo = $('#TxtVoucherNo').val();
                if (TxtActCashCode == 0) {
                    $('#TxtActCashCode').focus();
                    alert();
                    return;
                }
                let MSalesCode = '{{ $FixAccountSetup ? $FixAccountSetup->ActSalesCode : '' }}';
                let MUnEarnCommCode =
                    '{{ $FixAccountSetup ? $FixAccountSetup->UnEarnCommCode : '' }}';
                let MCommIncomeCode =
                    '{{ $FixAccountSetup ? $FixAccountSetup->CommIncomeCode : '' }}';
                let MCashCode = '{{ $FixAccountSetup ? $FixAccountSetup->ActCashCode : '' }}';
                let MBankChargesActCode =
                    '{{ $FixAccountSetup ? $FixAccountSetup->BankChargesActCode : '' }}';

                if (TxtVoucherNo == 0) {
                    AddNew();
                }


                OrderMasterstep()
            });


        });

        $(document).ready(function() {


        });

        function OrderMasterstep() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '/OrderMasterstep-receipt-vouchers',
                type: 'POST',
                data: {
                    rvno: $('#TxtVoucherNo').val(),
                },
                success: function(resposne) {
                    console.log(resposne.message);
                    if (resposne.message = 'saved') {
                        Steptwo();
                    } else {
                        alert(resposne.message);
                    }

                    // $('#TxtVoucherNo').val(resposne.MVoucherNo);
                }
            });

        }

        function Steptwo() {

            let radCashVouter = '';
            // if (document.getElementById("RadCashVoucher").checked == true) {
            if ($("#RadCashVoucher").is(":checked")) {
                radCashVouter = 'Cash';
            } else {

                radCashVouter = 'Bank';
            }

            var table = document.getElementById('Receiptvocvertablebody');
            console.log(table);
            let rows = table.rows;
            console.log(rows);
            let data = [];
            for (let i = 0; i < rows.length; i++) {
                let cells = rows[i].cells;
                data.push({

                    ActCode: cells[0] ? cells[0].innerHTML : '',
                    AccountName: cells[1] ? cells[1].innerHTML : '',
                    Amount: cells[2] ? cells[2].innerHTML : '',
                    Currency: cells[3] ? cells[3].innerHTML : '',
                    ChqNo: cells[4] ? cells[4].innerHTML : '',
                    ChqDate: cells[5] ? cells[5].innerHTML : '',
                    Description: cells[6] ? cells[6].innerHTML : '',
                    ClientOrderNo: cells[7] ? cells[7].innerHTML : '',
                    RefNo: cells[8] ? cells[8].innerHTML : '',
                    BankcashRecamt: cells[9] ? cells[9].innerHTML : '',
                    VesselName: cells[10] ? cells[10].innerHTML : '',
                    BankCharges: cells[11] ? cells[11].innerHTML : '',



                });
            }
            console.log(data);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '/Steptwo-receipt-vouchers',
                type: 'POST',
                data: {
                    txtVoucherNo: $('#TxtVoucherNo').val(),
                    txtVoucherDate: $('#txtVoucherDate').val(),
                    txtTotAmount: $('#txtTotAmount').val(),
                    txtActCashCode: $('#txtActCashCode').val(),
                    txtActCashName: $('#txtActCashName').val(),
                    txtBankDescription: $('#txtBankDescription').val(),
                    cmbPayType: $('#cmbPayType').val(),
                    radCashVouter,
                    data,
                },
                success: function(resposne) {
                    alert(resposne.message);
                    // $('#TxtVoucherNo').val(resposne.MVoucherNo);
                }
            });

        }

        function AddNew() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '/AddNew-receipt-vouchers',
                type: 'POST',
                data: {

                },
                success: function(resposne) {
                    alert(resposne.message);
                    $('#TxtVoucherNo').val(resposne.MVoucherNo);
                }
            });

        }

        function PlusCaps() {
            var vouncherno = $('#TxtVoucherNo').val();
            var totalvouchers = '{{ $vouchers }}';
            if (vouncherno == '') {
                $('#TxtVoucherNo').val(1);
            } else {

                var nextValue = parseInt(document.getElementById("TxtVoucherNo").value) + 1;
                if (nextValue > totalvouchers) {
                    return;
                } else {
                    document.getElementById("TxtVoucherNo").value = nextValue;
                    dataget();
                }
            }
        };

        function MinusCaps() {
            var vouncherno = $('#TxtVoucherNo').val();
            var totalvouchers = '{{ $vouchers }}';
            if (vouncherno == '') {
                return;
            } else {
                var nextValue = parseInt(document.getElementById("TxtVoucherNo").value) - 1;
                if (nextValue < 1) {
                    return;
                } else {
                    document.getElementById("TxtVoucherNo").value = nextValue;
                    dataget();
                }
            }
        };


        function dataget() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '/searchPayRoll',
                type: 'POST',
                data: {
                    voucherNo: $('#TxtVoucherNo').val(),
                    pono: $('#TxtClientOrder').val(),
                },
                success: function(resposne) {

                    document.getElementById("firstvoucher").dataset.voucherno = resposne.firstVoucherNo;
                    document.getElementById("lastvoucher").dataset.voucherno = resposne.lastVoucherNo;

                    let data = resposne.results;
                    let table = document.getElementById('Receiptvocvertablebody');
                    table.innerHTML = ""; // Clear the table
                    var ids = 0;
                    data.forEach(function(item) {
                        ids = ids + 1;
                        // $('#TxtActCashCode').val(item.SalaryNo);
                        // $('#TxtActCashName').val(item.CashActName);
                        // $('#TxtBankCharges').val(item.BankCharges);
                        // $('#TxtBankDescription').val(item.BankDesc);
                        // $('#TxtTotAmount').val(item.TotAmount);
                        // $('#TxtClientOrder').val(item.ClientOrderNo);
                        var chekdate = new Date(item.VoucherDate);
                        const DateActYear = chekdate.toLocaleDateString("en-US", {
                            year: 'numeric',
                            month: '2-digit',
                            day: '2-digit'
                        });
                        const forDate = chekdate.toISOString().substring(0, 10);
                        // console.log(DateActYear);
                        // var optionss = { year: 'numeric', month: 'short', day: 'numeric' };
                        // var formattedchekdate = chekdate.toLocaleDateString('en-US', optionss);
                        $('#TxtActCode').val(item.ActCode);
                        $('#TxtActName').val(item.ActName);
                        $('#TxtTotAmount').val(Math.round(item.TotAmount, 2));
                        $('#TxtVoucherDate').val(forDate);
                        $('#TxtDateActYear').val(DateActYear);
                        $('CmbPayType :selected').text(item.PayType);
                        $('CmbPayType :selected').val(item.PayType);

                        if (item.TransType == "Cash Voucher") {
                            document.getElementById("RadCashVoucher").checked = true;
                        } else {
                            document.getElementById("RadBankVoucher").checked = true;
                        }


                        let row = table.insertRow();
                        row.setAttribute("data-row-id", ids);
                        row.setAttribute('id', 'scoperow');

                        let ActCodeCell = row.insertCell(0);
                        ActCodeCell.innerHTML = item.ActCode;

                        let AccountNameCell = row.insertCell(1);
                        AccountNameCell.innerHTML = item.ActName3;

                        let bankNameCell = row.insertCell(2);
                        bankNameCell.innerHTML = item.BankName;

                        let AmountPKRCell = row.insertCell(3);
                        AmountPKRCell.innerHTML = parseFloat(item.AmountPKR).toFixed(2);

                        let CurrencyCell = row.insertCell(4);
                        CurrencyCell.innerHTML = item.Currency;

                        let AmountCell = row.insertCell(5);
                        AmountCell.innerHTML = parseFloat(item.Amount).toFixed(2);

                        var date = new Date(item.ChequeDate);
                        // alert(date);
                        // Create an array of month names in the desired format
                        var months = ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP',
                            'OCT', 'NOV', 'DEC'
                        ];

                        // Get the day, month, and year from the Date object
                        var day = date.getDate();
                        var month = months[date.getMonth()];
                        var year = date.getFullYear();

                        // Create the final date string in the desired format
                        var formattedDate = day + '-' + month + '-' + year; // "17-NOV-2022"
                        //   var date = new Date(item.ChequeDate);
                        //   var options = { year: 'numeric', month: 'short', day: 'numeric' };
                        //   var formattedDate = date.toLocaleDateString('en-US', options);
                        // alert(formattedDate);

                        let ChequeNoCell = row.insertCell(6);
                        ChequeNoCell.innerHTML = item.ChequeNo

                        let ChequeDateCell = row.insertCell(7);
                        ChequeDateCell.innerHTML = formattedDate;

                        let DesCell = row.insertCell(8);
                        DesCell.innerHTML = item.Des;

                        //   let PODateCell = row.insertCell(9);
                        //   PODateCell.innerHTML = formattedDate;

                        //   let vesselNameCell = row.insertCell(10);
                        //   vesselNameCell.innerHTML = item.VesselName;

                        //   let BankChargesCell = row.insertCell(11);
                        //   BankChargesCell.hidden = true;
                        //   BankChargesCell.innerHTML = item.BankCharges;

                    });


                    // $('#scoperow').dblclick(function () {
                    //     alert(this.td[0].innerHTML);
                    // });
                    // const table = document.getElementById("PO-recivedtable");
                    const tableBody = document.getElementById("Receiptvocvertablebody");
                    const inputField = document.getElementById("TxtBank");

                    tableBody.addEventListener("dblclick", function(e) {
                        if (e.target.tagName === "TD") {
                            const td = e.target;
                            const tr = td.parentNode;
                            const tdElements = tr.getElementsByTagName("td");

                            // Set the value of the input field to the third td element's inner HTML
                            // inputField.value = ;
                            $('#TxtActCode').val(tdElements[0].innerHTML);
                            $('#TxtActName').val(tdElements[1].innerHTML);
                            $('#TxtActCashName').val(tdElements[2].innerHTML);

                            // $('#TxtActCode').val(tdElements[3].innerHTML);
                            $('#CmbCurrency').val(tdElements[4].innerHTML);
                            $('#TxtAmount').val(tdElements[5].innerHTML);
                            // Set the formatted date as the value of the input field
                            // document.getElementById("TxtChqDate").value = formattedDate;
                            // alert(tdElements[3].innerHTML);
                            $('#TxtChqNo').val(tdElements[6].innerHTML);
                            // $('#TxtChqDate').val(tdElements[7].innerHTML);
                            $('#TxtDesc').val(tdElements[8].innerHTML);
                            // $('#TxtBank').val(tdElements[11].innerHTML);
                            var date = new Date(tdElements[7].innerHTML);
                            var formattedDate = date.getFullYear() + '-' + (date.getMonth() + 1)
                                .toString().padStart(2, '0') + '-' + date.getDate().toString().padStart(
                                    2, '0');
                            $('#TxtChqDate').val(formattedDate);

                            // Remove the row from the table
                            tableBody.removeChild(tr);
                        }
                    });


                }
            });

        }
        $(document).ready(function() {


            $('#TxtBank').blur(function() {
                // $('#TxtBank').blur(function () {
                let TxtBank = parseFloat($('#TxtBank').val());
                let TxtInvAmount = parseFloat($('#TxtInvAmount').val());
                let TxtAmount = $('#TxtAmount').val();
                let TxtInvoiceAmt = $('#TxtInvoiceAmt').val();
                if (!isNaN(TxtInvAmount) && !isNaN(TxtBank)) {

                    $('#TxtInvAmount').val(TxtInvAmount - TxtBank);
                    let TxtBankaf = parseFloat($('#TxtBank').val());
                    let TxtInvAmountaf = parseFloat($('#TxtInvAmount').val());
                    $('#TxtAmount').val(TxtInvAmountaf + TxtBankaf);

                    if (TxtInvoiceAmt == TxtAmount) {
                        $("#TxtAmount").css({
                            "background-color": "green",
                            "color": "white"
                        });

                    } else {

                        $("#TxtAmount").css({
                            "background-color": "red",
                            "color": "white"
                        });
                    }
                }




            });

            $('#TxtInvoiceAmt').dblclick(function() {
                let TxtInvoiceAmt = $('#TxtInvoiceAmt').val();
                $('#TxtInvAmount').val(TxtInvoiceAmt);

            });


            $('#Newinv').click(function(e) {
                let table = document.getElementById('Receiptvocvertablebody');
                table.innerHTML = "";
                $('#TxtVoucherDate').val('');
                $('#TxtActCashName').val('');
                $('#TxtActCashCode').val('');
                $('#TxtVesselName').val('');
                $('#TxtRefNo').val('');
                $('#TxtClientOrder').val('');
                $('#TxtActCode').val('');
                $('#TxtActName').val('');
                $('#TxtInvoiceAmt').val('');
                $('#TxtCrNote').val('');
                $('#TxtBank').val('');
                $('#TxtInvAmount').val('');
                $('#TxtAmount').val('');
                $('#TxtDesc').val('');
                $('#TxtCurrency').val('');
                $('#TxtRefno').val('');
                $('#TxtChqNo').val('');
                $('#TxtBankDescription').val('');
                $('#TxtChqDate').val('');
                $('#TxtTotAmount').val('');
                $('#TxtStatus').val('');
                $('#TxtInvoiceAmount').text('');
                $('#TxtCreditNoteAmt').text('');
                $('#MRecAmount').text('');
            });



        });
    </script>
@stop


@section('content')
