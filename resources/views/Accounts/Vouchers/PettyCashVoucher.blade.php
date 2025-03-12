@extends('layouts.app')



@section('title', 'Petty-Cash-Voucher')

@section('content_header')

@stop

@section('content')
    </div>
    <?php echo View::make('partials.ExpenseVoucherReport'); ?>

    <div class="container-fluid">

        <div class="col-lg-12 pt-3">


            <div class="card">
                <div class="card-header">
                    <h3 class="text-center text-bold text-blue">Petty Cash Voucher</h3>

                </div>
                <div style="background-color:#EEE; " class="card-header">
                    <div class="row">
                    <div class="inputbox col-sm-3">
                        <input type="date" id="TxtVoucherDate">
                        <span>Voucher Date</span>
                    </div>
                    <div class="col-sm-5"></div>
                    <div class="card-tools ">
                        <div class=" row">


                            <a name="firstvoucher" data-voucherno="" id="CmdFirst" class="btn btn-secondary mx-1 ml-auto"
                                role="button"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                            <a name="" id="CmdBack" class="btn btn-info mx-1" onclick="MinusCaps()"
                                role="button"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a>

                            <div class="col-sm-3">
                                <div class="inputbox">
                                    <input class="" type="number" id="TxtVoucherNo" name="TxtVoucherNo"
                                        value="">
                                </div>
                            </div>

                            <a name="" id="CmdNext" class="btn btn-info mx-1" onclick="PlusCaps()"
                                role="button"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                            <a name="" id="CmdLast" data-voucherno="" class="btn btn-secondary mx-1"
                                role="button"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>

                            <a name="Button18" id="Button18" class="btn btn-info  mx-1" role="button"><i
                                    class="fa fa-pencil mr-1"></i>Edit Entry</a>
                            <button type="button" name="headertoggle" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>

                        </div>
                    </div>
                    </div>

                </div>
                <div class="card-body">

                    <table class="table" id="PO-recivedtable">
                        <thead class="c">
                            <tr>
                                <th>A/c&nbsp;Code</th>
                                <th>A/c&nbsp;Name</th>
                                <th>Amount</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody id="Receiptvocvertablebody">
                            <tr data-row-id="">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>




            <div class="card">
                <div class="card-body">
                    <div class="row py-2">

                        <div class="CheckBox1">
                            <label class="input group text-info">
                                <input class="ChkCompanyHeading mx-2 " type="checkbox" id="ChkCompanyHeading">Company
                                Heading
                            </label>
                        </div>
                        <div class="inputbox col-sm-2 ml-auto">
                            <input id="TxtTotAmount" type="number" class="" readonly>
                            <span></span>
                        </div>
                    </div>

                    <div class="row py-2">
                        <div class="mx-auto">
                            <a name="CmdAdd" id="CmdAdd" class="btn btn-primary mx-2" role="button"><i
                                    class="fa fa-plus mr-1" aria-hidden="true"></i> New</a>
                            <a name="CmdSave" id="CmdSave" class="btn btn-success mx-2" role="button"><i
                                    class="fa fa-cloud mr-1" aria-hidden="true"></i> Save</a>
                            <a name="CmdDelete" id="CmdDelete" class="btn btn-warning mx-2" href="#" role="button">
                                <i class="fas fa-trash  mr-1"></i> Delete</a>
                            <a name="CmdPrint" id="CmdPrint" class="btn btn-primary mx-2" role="button"><i
                                    class="fa fa-print  mr-1" aria-hidden="true"></i>Print Invoice</a>
                            <a name="CmdExit" id="CmdExit" class="btn btn-danger mx-2" href="#"
                                role="button"><i class="fas fa-door-open  mr-1"></i> Exit</a>
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
            function changeFormAction(action) {
                document.getElementById('my-form').action = action;
            }
            $('#viewpdf').click(function(e) {

                document.getElementById('my-form').action = 'storePDF';
                $('#savepdf').click();

            });
            $('#storepdf').click(function(e) {

                document.getElementById('my-form').action = 'send-email';
                $('#savepdf').click();
            });
            $('#pdf').click(function(e) {
                $('#file-input').click();
            });
            // $('#file-input').on('change', function(){
            //     if ($(this).val() != '') {
            //         $('#savepdf').click();
            //         $('#savepdf').prop('disabled', false);
            //     } else {
            //         $('#savepdf').prop('disabled', true);

            //     }
            // });
            const apikey = '72684ea695bf423cbde2780b4db84da6';

            fetch(`https://api.currencyfreaks.com/latest?apikey=${apikey}&symbols=PKR`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log(data.rates.PKR);
                    if (!data || !data.rates || !data.rates.PKR) {
                        throw new Error('Response data is missing PKR rate');
                    }
                    const usdToPkrRate = data.rates.PKR;
                    const rate = parseFloat(usdToPkrRate).toFixed(2);
                    // if (typeof usdToPkrRate !== 'number') {
                    //   throw new Error('Exchange rate is not a number');
                    // }
                    $('#pkrrate').val(rate);
                    console.log('1 USD = ' + rate + ' PKR');
                })
                .catch(error => {
                    console.error('Error fetching exchange rate:', error);
                });
        });
        $(document).ready(function() {
            dataget();
            var table = $('#PO-recivedtable').DataTable({

                scrollY: 460,
                deferRender: true,
                scroller: true,
                responsive: true,
                ordering: false,
                searching: false,
                info: false,
                paging: false,
                // dom: 'Bfrtip',
                // buttons: [




                // {
                //     text: 'Edit',
                // className: 'btn btn-primary ',
                // action: function ( e, dt, node, config ) {
                //     Roweditfunc();

                // }
                // },

                // ],

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
                var pkrrate = document.getElementById("pkrrate").value;
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
                let MSalesCode = '{{ $FixAccountSetup->ActSalesCode }}';
                let MUnEarnCommCode =
                    '{{ $FixAccountSetup->UnEarnCommCode ? $FixAccountSetup->UnEarnCommCode : '' }}';
                let MCommIncomeCode =
                    '{{ $FixAccountSetup->CommIncomeCode ? $FixAccountSetup->CommIncomeCode : '' }}';
                let MCashCode = '{{ $FixAccountSetup->ActCashCode ? $FixAccountSetup->ActCashCode : '' }}';
                let MBankChargesActCode =
                    '{{ $FixAccountSetup->BankChargesActCode ? $FixAccountSetup->BankChargesActCode : '' }}';

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
                url: '/search-Expense-vouchers',
                type: 'POST',
                data: {
                    voucherNo: $('#TxtVoucherNo').val(),
                    pono: $('#TxtClientOrder').val(),
                },
                success: function(resposne) {

                    document.getElementById("firstvoucher").dataset.voucherno = resposne.firstVoucherNo;
                    document.getElementById("lastvoucher").dataset.voucherno = resposne.lastVoucherNo;
                    // $('#TxtCreditNoteAmt').text(resposne.TxtCreditNoteAmt);
                    // $('#TxtRecAmount').text(resposne.MRecAmount);
                    // $('#TxtRefNo').val(resposne.OrderMaster.DeliveryOrderNo);
                    // $('#TxtVesselName').val(resposne.OrderMaster.VesselName);
                    // $('#TxtDesc').val('Vessel: '+ resposne.OrderMaster.VesselName);
                    // $('#TxtInvoiceAmt').val(Math.round(resposne.OrderMaster.NetAmount,2));
                    // $('#TxtCrNote').val(resposne.OrderMaster.CrNoteAmount);
                    // $('#TxtInvoiceAmount').text(parseFloat(resposne.OrderMaster.NetAmount).toFixed(2));
                    // $('#TxtActCode').val(resposne.OrderMaster.CustomerActCode);
                    // $('#TxtStatus').val(resposne.OrderMaster.Status);
                    let data = resposne.results;
                    let table = document.getElementById('Receiptvocvertablebody');
                    table.innerHTML = ""; // Clear the table
                    var ids = 0;
                    data.forEach(function(item) {
                        ids = ids + 1;
                        $('#TxtActCashCode').val(item.ActCashCode);
                        $('#TxtActCashName').val(item.CashActName);
                        $('#TxtBankCharges').val(item.BankCharges);
                        $('#TxtBankDescription').val(item.BankDesc);
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
