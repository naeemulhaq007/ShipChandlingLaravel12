@extends('layouts.app')



@section('title', 'Expense-Setup')

@section('content_header')

@stop

@section('content')
    </div>

    <div class="container-fluid">

        <div class="col-lg-12 pt-2">

            <div class="card mt-3">

                <div class="card-header">
                    <h3 class="text-bold text-center">Expense Setup</h3>
                </div>

                <table class="table" id="PO-recivedtable">
                    <thead class="">
                        <tr>
                            <th>Code</th>
                            <th>Expense Name</th>
                        </tr>
                    </thead>
                    <tbody id="Receiptvocvertablebody">

                        <tr data-row-id="">
                            <td></td>

                            <td></td>




                        </tr>
                    </tbody>
                </table>

            </div>
            <div class="card">


                <div class="card-body">



                    <div class="row">

                        <div class="inputbox col-sm-3 py-2">
                            <input id='TxtCode' type="text" class="" value="">
                            <span class="" id="">Code</span>
                        </div>

                    </div>


                    <div class="row">

                        <div class="inputbox col-sm-8 py-2">
                            <input class="" type="text" id="TxtCategoryName" name="TxtCategoryName">
                            <span id="">Expense Name
                            </span>
                        </div>

                    </div>

                    <div class="row py-5">

                        <div class="mx-auto">
                            <a name="" id="Button1" class="btn btn-primary mx-1" role="button"><i
                                    class="fa fa-plus mr-1" aria-hidden="true"></i> New</a>

                            <a name="CmdSave" id="Button2" class="btn btn-success mx-1" role="button"><i
                                    class="fa fa-cloud mr-1" aria-hidden="true"></i> Save</a>

                            <a name="" id="Button3" class="btn btn-warning mx-1" href="#" role="button"> <i
                                    class="fas fa-trash mr-1"></i> Delete</a>

                            <a name="" id="Button4" class="btn btn-danger mx-1" href="#" role="button"><i
                                    class="fas fa-door-open mr-1"></i> Exit</a>
                        </div>

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

        .rainput:nth-of-type(1):checked~.worm2 .worm__segment2 {
            transform: translateX(0.5em);
        }

        .rainput:nth-of-type(1):checked~.worm2 .worm__segment2:before {
            animation-name: ho1;
        }

        @keyframes ho1 {

            from,
            to {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-1.5em);
            }
        }

        .rainput:nth-of-type(2):checked~.worm2 .worm__segment2 {
            transform: translateX(9.55em);
        }

        .rainput:nth-of-type(2):checked~.worm2 .worm__segment2:before {
            animation-name: ho2;
        }

        @keyframes ho2 {

            from,
            to {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-1.5em);
            }
        }
    </style>
@stop

@section('js')
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
    <script>
        $(document).ready(function() {
            dataget();
            var table = $('#PO-recivedtable').DataTable({

                scrollY: 350,
                deferRender: true,
                scroller: true,
                // responsive: true,
                ordering: false,
                dom: 'Bfrtip',
                buttons: [


                    // {
                    // text: 'ADD',
                    // className: 'btn btn-primary ',
                    // action: function(e, dt, node, config) {
                    //     Rowaddfunc();
                    // }
                    // },
                    // {
                    //     text: 'Edit',
                    // className: 'btn btn-primary ',
                    // action: function ( e, dt, node, config ) {
                    //     Roweditfunc();

                    // }
                    // },
                    // {
                    // text: 'Delete',
                    // className: 'btn btn-primary',
                    // action: function(e, dt, node, config) {
                    //     var id = $('#deleteButton').attr('data-row-id');
                    //     Rowdeletefunc(table, id);
                    // },
                    // init: function(api, node, config) {
                    //     $(node).attr('id', 'deleteButton');
                    //     $(node).attr('data-row-id', '');
                    // }
                    // }
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
                var TxtClientOrder = document.getElementById("TxtClientOrder").value;
                var TxtCurrency = document.getElementById("TxtCurrency").value;
                var TxtRefno = document.getElementById("TxtRefno").value;
                var TxtActCode = document.getElementById("TxtActCode").value;
                var TxtActName = document.getElementById("TxtActName").value;
                var TxtInvAmount = document.getElementById("TxtInvAmount").value;
                var TxtAmount = document.getElementById("TxtAmount").value;
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
                var TxtBank = document.getElementById("TxtBank").value;
                var TxtVesselName = document.getElementById("TxtVesselName").value;



                var table = document.getElementById("PO-recivedtable");

                // Create a new row
                var newRow = table.insertRow(-1);
                var TxtActCodeCell = newRow.insertCell(0);
                var TxtActNameCell = newRow.insertCell(1);
                var TxtInvAmountCell = newRow.insertCell(2);
                var TxtAmountCell = newRow.insertCell(3);
                var CurrencyCell = newRow.insertCell(4);
                var TxtChqNoCell = newRow.insertCell(5);
                var TxtChqDateCell = newRow.insertCell(6);
                var TxtDescCell = newRow.insertCell(7);
                var InvoicnoCell = newRow.insertCell(8);
                var RefnoCell = newRow.insertCell(9);
                var VesselNameCell = newRow.insertCell(10);
                var BankChargesCell = newRow.insertCell(11);

                TxtActCodeCell.innerHTML = TxtActCode;
                TxtActNameCell.innerHTML = TxtActName;
                TxtInvAmountCell.innerHTML = TxtInvAmount;
                CurrencyCell.innerHTML = TxtCurrency;
                TxtAmountCell.innerHTML = TxtAmount;
                TxtChqNoCell.innerHTML = TxtChqNo;
                TxtChqDateCell.innerHTML = TxtChqDate;
                TxtDescCell.innerHTML = TxtDesc;
                InvoicnoCell.innerHTML = TxtClientOrder;
                RefnoCell.innerHTML = TxtRefno;
                VesselNameCell.innerHTML = TxtVesselName;
                BankChargesCell.innerHTML = TxtBank;
                BankChargesCell.hidden = true;


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
                let MUnEarnCommCode = '{{ $FixAccountSetup ? $FixAccountSetup->UnEarnCommCode : '' }}';
                let MCommIncomeCode = '{{ $FixAccountSetup ? $FixAccountSetup->CommIncomeCode : '' }}';
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
            var nextValue = parseInt(document.getElementById("TxtVoucherNo").value) + 1;
            document.getElementById("TxtVoucherNo").value = nextValue;
            dataget();
        };

        function MinusCaps() {
            var nextValue = parseInt(document.getElementById("TxtVoucherNo").value) - 1;
            document.getElementById("TxtVoucherNo").value = nextValue;
            dataget();
        };


        function dataget() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '/search-receipt-vouchers',
                type: 'POST',
                data: {
                    voucherNo: $('#TxtVoucherNo').val(),
                    pono: $('#TxtClientOrder').val(),
                },
                success: function(resposne) {

                    document.getElementById("firstvoucher").dataset.voucherno = resposne.firstVoucherNo;
                    document.getElementById("lastvoucher").dataset.voucherno = resposne.lastVoucherNo;
                    $('#TxtCreditNoteAmt').text(resposne.TxtCreditNoteAmt);
                    $('#TxtRecAmount').text(resposne.MRecAmount);
                    $('#TxtRefNo').val(resposne.OrderMaster.DeliveryOrderNo);
                    $('#TxtVesselName').val(resposne.OrderMaster.VesselName);
                    $('#TxtDesc').val('Vessel: ' + resposne.OrderMaster.VesselName);
                    $('#TxtInvoiceAmt').val(Math.round(resposne.OrderMaster.NetAmount, 2));
                    $('#TxtCrNote').val(resposne.OrderMaster.CrNoteAmount);
                    $('#TxtInvoiceAmount').text(parseFloat(resposne.OrderMaster.NetAmount).toFixed(2));
                    $('#TxtActCode').val(resposne.OrderMaster.CustomerActCode);
                    $('#TxtStatus').val(resposne.OrderMaster.Status);
                    let data = resposne.results;
                    let table = document.getElementById('Receiptvocvertablebody');
                    table.innerHTML = ""; // Clear the table
                    var ids = 0;
                    data.forEach(function(item) {
                        ids = ids + 1;
                        $('#TxtActCode').val(item.ActCode);
                        $('#TxtActName').val(item.AcName3);
                        $('#TxtBankDescription').val(item.BankDes);
                        $('#TxtClientOrder').val(item.ClientOrderNo);
                        var chekdate = new Date(item.VoucherDate);
                        // const DateActYear = chekdate.toLocaleDateString("en-US", {year: 'numeric', month: '2-digit', day: '2-digit'});
                        const forDate = chekdate.toISOString().substring(0, 10);
                        // console.log(DateActYear);
                        // var optionss = { year: 'numeric', month: 'short', day: 'numeric' };
                        // var formattedchekdate = chekdate.toLocaleDateString('en-US', optionss);
                        $('#TxtActCashCode').val(item.ActCashCode);
                        $('#TxtActCashName').val(item.CashName);
                        $('#TxtTotAmount').val(Math.round(item.TotAmount, 2));
                        $('#TxtVoucherDate').val(forDate);
                        $('#TxtDateActYear').val(forDate);
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

                        let actCodeCell = row.insertCell(0);
                        actCodeCell.innerHTML = item.ActCode;

                        let acName3Cell = row.insertCell(1);
                        acName3Cell.innerHTML = item.AcName3;

                        let amountCell = row.insertCell(2);
                        amountCell.innerHTML = Math.round(item.Amount, 2);

                        let invRecAmtCell = row.insertCell(3);
                        invRecAmtCell.innerHTML = Math.round(item.InvRecAmt, 2);

                        let currencyCell = row.insertCell(4);
                        currencyCell.innerHTML = item.Currency;

                        let chequeNoCell = row.insertCell(5);
                        chequeNoCell.innerHTML = item.ChequeNo;

                        let chequeDateCell = row.insertCell(6);
                        var date = new Date(item.ChequeDate);

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
                        chequeDateCell.innerHTML = formattedDate;

                        let desCell = row.insertCell(7);
                        desCell.innerHTML = item.Des;

                        let clientOrderNoCell = row.insertCell(8);
                        clientOrderNoCell.innerHTML = item.ClientOrderNo;

                        let refNoCell = row.insertCell(9);
                        refNoCell.innerHTML = item.RefNo;

                        let vesselNameCell = row.insertCell(10);
                        vesselNameCell.innerHTML = item.VesselName;

                        let BankChargesCell = row.insertCell(11);
                        BankChargesCell.hidden = true;
                        BankChargesCell.innerHTML = item.BankCharges;

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
                            $('#TxtInvAmount').val(tdElements[2].innerHTML);
                            $('#TxtAmount').val(tdElements[3].innerHTML);
                            $('#TxtCurrency').val(tdElements[4].innerHTML);
                            $('#TxtChqNo').val(tdElements[5].innerHTML);
                            var date = new Date(tdElements[6].innerHTML);
                            var formattedDate = date.getFullYear() + '-' + (date.getMonth() + 1)
                                .toString().padStart(2, '0') + '-' + date.getDate().toString().padStart(
                                    2, '0');

                            // Set the formatted date as the value of the input field
                            // document.getElementById("TxtChqDate").value = formattedDate;
                            $('#TxtChqDate').val(formattedDate);
                            // alert(tdElements[3].innerHTML);
                            $('#TxtDesc').val(tdElements[7].innerHTML);
                            $('#TxtClientOrder').val(tdElements[8].innerHTML);
                            $('#TxtRefno').val(tdElements[9].innerHTML);
                            $('#TxtBank').val(tdElements[11].innerHTML);

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
