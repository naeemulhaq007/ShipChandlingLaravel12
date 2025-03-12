@extends('layouts.app')



@section('title', 'Opening-Balance')

@section('content_header')

@stop

@section('content')
    <?php echo View::make('partials.Chartacmodal'); ?>

    </div>

    <div class="container-fluid">

        <div class="col-lg-12 pt-2">
            <div class="row">

            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="text-center text-bold">Opening Balance<h3>
                </div>
                <div style="background-color:#EEE; " class="card-header">
                    <div class="card-tools ">
                        <div class=" row">
                            {{-- <button id="viewpdf" class="btn btn-default mr-1" type="button" ><i style="font-size: 21px" class="fas fa-file-pdf text-info"></i></button>
                        <button id="storepdf" class="btn btn-default mr-1" type="button"><i style="font-size: 21px" class="fas fa-save text-info   "></i></button>
                        <a name="" id="pdf" class="btn btn-default mr-1"  role="button"><i style="font-size: 21px" class="fas fa-file-pdf text-danger   "></i></a> --}}

                            {{-- /&nbsp;  <strong>Customer Ref # :&nbsp;</strong> <label class="customer_ref_no text-blue" for="customer_ref_no">Custref121</label> --}}
                            {{-- <a name="" id="" class="btn btn-primary  mx-1" role="button">PO Rec</a> --}}

                            <a name="firstvoucher" data-voucherno="{{ $firstVoucherNo }}" id="firstvoucher"
                                class="btn btn-secondary mx-1" role="button"><i class="fa fa-arrow-left"
                                    aria-hidden="true"></i></a>
                            <a name="" id="minus" class="btn btn-info mx-1" onclick="MinusCaps()"
                                role="button"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a>
                            <div class="col-sm-3">
                                <div class="inputbox">
                                    {{-- <div class="input-group-prepend">
                    <span class="input-group-text" id="">Quote#</span>
                </div> --}}

                                    <input class="" type="number" id="TxtVoucherNo" name="TxtVoucherNo"
                                        value="">

                                </div>
                            </div>
                            <a name="" id="plus" class="btn btn-info mx-1" onclick="PlusCaps()"
                                role="button"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                            <a name="" id="lastvoucher" data-voucherno="{{ $lastVoucherNo }}"
                                class="btn btn-secondary mx-1" role="button"><i class="fa fa-arrow-right"
                                    aria-hidden="true"></i></a>


                            <button type="button" name="headertoggle" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="row">
                    </div>

                </div>
                <div class="card-body">
                    <div class="row py-2">

                        <div class="inputbox col-sm-2">
                            <input id='TxtVoucherDate' type="date" class="" value="">
                            <span class="" id="">VoucherDate</span>
                        </div>

                    </div>

                    <div class="row py-2">
                        <div class="inputbox col-sm-1">
                            <input class="" type="text" name="TxtActCashCode" id="TxtActCashCode"
                                value="{{ $ActCode }}">
                                <span class="" id="">Code</span>
                        </div>

                        <div class="inputbox col-sm-5">
                            <input class="" type="text" name="TxtActCashName" id="TxtActCashName"
                            value="{{ $AcName3 }}">
                            <span class="" id="">Capital A/c </span>
                        </div>
                            <button style="cursor: pointer" data-target="#chart" data-toggle="modal"
                                class="btn btn-info" id=""><i class="fas fa-search    "></i></button>

                    </div>



                </div>
            </div>

            <table class="table" id="OpeningBalancetable">
                <thead class="">
                    <tr>
                        <th>Act&nbsp;Code</th>
                        <th style="padding-left: 5rem;padding-right:5rem">Account&nbsp;Name</th>
                        <th class="text-right">Debit&nbsp;Amount</th>
                        <th class="text-right">Credit&nbsp;Amount</th>
                        <th>Currency</th>
                        <th style="padding-left: 7rem;padding-right:7rem">Description</th>
                        {{-- <th hidden>ID</th> --}}
                    </tr>
                </thead>
                <tbody id="OpeningBalancetablebody">
                    <tr data-row-id="">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        {{-- <td hidden></td> --}}
                    </tr>
                </tbody>
            </table>


            <div class="card">
                <div class="card-body">
                    <div class="row py-2">


                        <div class="inputbox col-sm-1">

                        <input class="" type="text" name="TxtTotDrAmount"
                            id="TxtTotDrAmount">
                            <span class="" id="">Dr Amt.</span>

                        </div>

                        <div class="inputbox col-sm-1">

                        <input class="" type="text" name="TxtTotCrAmount"
                            id="TxtTotCrAmount">
                            <span class="" id="">Cr Amt.</span>

                        </div>
                        <div class="CheckBox1">

                            <label class="input-group text-info mt-2 mx-1">
                                <input class=" " type="checkbox" onclick="" name="ChkCompanyHeading"
                                    id="ChkCompanyHeading" checked value=""> Company Heading
                            </label>

                        </div>

                    </div>

                    <div class="row py-2">

                        <div class="mx-auto">
                            <a name="" id="Newinv" class="btn btn-primary" role="button"><i
                                    class="fa fa-plus" aria-hidden="true"></i> New</a>
                            <a name="CmdSave" id="CmdSave" class="btn btn-success" role="button"><i
                                    class="fa fa-cloud" aria-hidden="true"></i> Save</a>
                            <a name="" id="" class="btn btn-warning" href="#" role="button"> <i
                                    class="fas fa-trash"></i> Delete</a>
                            <a name="" id="" class="btn btn-danger" href="#" role="button"><i
                                    class="fas fa-door-open"></i> Exit</a>
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

            $('.parrent').dblclick(function(e) {
                let AcCode = $(this).data('accode');
                $('#TxtActCashCode').val(AcCode);
                let AcName = $(this).data('acname');
                $('#TxtActCashName').val(AcName);

                $('#chart').modal('hide');

            })

            function handleTxtActCodeBlur() {
                var txtActCode = document.getElementById('TxtActCashCode');
                var txtActName = document.getElementById('TxtActCashName');

                // Retrieve the matching element using data attribute
                var matchingElement = document.querySelector(`[data-accode="${txtActCode.value}"]`);

                if (matchingElement) {
                    // Retrieve the values from the matching element's data attributes
                    var acName = matchingElement.getAttribute('data-acname');
                    var acCode = matchingElement.getAttribute('data-accode');

                    // Set the values to the TxtActName textbox
                    txtActName.value = acName;

                    // Additional logic if needed
                    // ...
                    dataget();
                }
            }

            var txtActCode = document.getElementById('TxtActCashCode');
            txtActCode.addEventListener('blur', handleTxtActCodeBlur);

            // Attach the function to the keydown event of TxtActCode textbox to handle Enter key press
            txtActCode.addEventListener('keydown', function(event) {
                if (event.keyCode === 13) {
                    handleTxtActCodeBlur();
                }
            });

        });
        $(document).ready(function() {
            // dataget();
            var table = $('#OpeningBalancetable').DataTable({

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


            $('#OpeningBalancetable tbody').on('click', 'tr', function() {
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



                var table = document.getElementById("OpeningBalancetable");

                // Create a new row
                // let row = table.insertRow();
                var row = table.insertRow(-1);

                let ActCell = row.insertCell(0);
                ActCell.contentEditable = true;


                let ActNameCell = row.insertCell(1);
                ActNameCell.contentEditable = true;


                let DrCell = row.insertCell(2);
                DrCell.contentEditable = true;
                DrCell.style.textAlign = 'right';


                let CrCell = row.insertCell(3);
                CrCell.contentEditable = true;
                CrCell.style.textAlign = 'right';


                let CurrencyCell = row.insertCell(4);
                CurrencyCell.contentEditable = true;


                let DescriptionCell = row.insertCell(5);
                DescriptionCell.contentEditable = true;

            };

            function Roweditfunc() {
                alert('edit');

            };

            function tablecomposer() {
                let table = document.getElementById('OpeningBalancetablebody');
                let rows = table.rows;
                datatablearray = [];
                for (let i = 0; i < rows.length; i++) {
                    let cells = rows[i].cells;
                    datatablearray.push({
                        ActCode: cells[0] ? cells[0].innerHTML : '',
                        ActName: cells[1] ? cells[1].innerHTML : '',
                        DebitAmt: cells[2] ? cells[2].innerHTML : '',
                        CrAmt: cells[3] ? cells[3].innerHTML : '',
                        Currency: cells[4] ? cells[4].innerHTML : '',
                        Description: cells[5] ? cells[5].innerHTML : '',

                    });

                }

            }

            function ajaxsetup() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            }
            $('#CmdSave').click(function(e) {
                tablecomposer()
                ajaxsetup();
                $.ajax({
                    type: 'POST',
                    url: '/OpeningbalancesaveChekc',
                    data: {
                        TxtVoucherNo: $('#TxtVoucherNo').val(),
                        TxtVoucherDate: $('#TxtVoucherDate').val(),
                        TxtActCashCode: $('#TxtActCashCode').val(),
                        TxtActCashName: $('#TxtActCashName').val(),
                        TxtTotDrAmount: $('#TxtTotDrAmount').val(),
                        TxtTotCrAmount: $('#TxtTotCrAmount').val(),
                        table: datatablearray,
                    },
                    success: function(response) {

                        if (response.Message) {
                            alert(response.Message);

                        }
                        if (response.op == 'data') {
                            var password = prompt("Please enter Admin Authentication:");
                            if (password === "332211") {
                                ajaxsetup();
                                $.ajax({
                                    url: '/Openingbalancesave',
                                    type: 'POST',
                                    data: {
                                        TxtVoucherNo: $('#TxtVoucherNo').val(),
                                        TxtVoucherDate: $('#TxtVoucherDate').val(),
                                        TxtActCashCode: $('#TxtActCashCode').val(),
                                        TxtActCashName: $('#TxtActCashName').val(),
                                        TxtTotDrAmount: $('#TxtTotDrAmount').val(),
                                        TxtTotCrAmount: $('#TxtTotCrAmount').val(),
                                        table: datatablearray,
                                    },
                                    success: function(responses) {
                                        console.log(responses);
                                        alert(responses.Message);
                                    },
                                    error: function(xhr, status, error) {
                                        console.log(error);

                                    }
                                });
                            }

                        }
                    },
                    error: function(xhr, status, error) {
                        console.log(error);

                    }
                });

            });


        });

        $(document).ready(function() {
                var odate = new Date();
                const today = odate.toISOString().substring(0, 10);
                $('#TxtVoucherDate').val(today);
                $('#TxtDatefrom').val(today);
                $('#TxtDateTo').val(today);
                $('#TxtDueDate').val(today);
                $('#TxtDate').val(today);


        });

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
                url: '/Openingbalancesearch',
                type: 'POST',
                data: {
                    BillNo: $('#TxtVoucherNo').val(),
                },
                success: function(resposne) {

                    document.getElementById("firstvoucher").dataset.voucherno = resposne.firstVoucherNo;
                    document.getElementById("lastvoucher").dataset.voucherno = resposne.lastVoucherNo;

                    let data = resposne.results;
                    let table = document.getElementById('OpeningBalancetablebody');
                    table.innerHTML = ""; // Clear the table
                    var ids = 0;
                    var TxtTotDrAmount = 0;
                    var TxtTotCrAmount = 0;
                    if (data.length > 0) {

                        var chekdate = new Date(data[0].Date);
                        const forDate = chekdate.toISOString().substring(0, 10);
                        $('#TxtVoucherDate').val(forDate);
                        $('#TxtActCashCode').val(data[0].ActCapitalCode);
                        $('#TxtTotDrAmount').val(data[0].TotDrAmount);
                        $('#TxtTotCrAmount').val(data[0].TotCrAmount);
                    }

                    data.forEach(function(item) {
                        ids = ids + 1;




                        let row = table.insertRow();
                        row.setAttribute("data-row-id", ids);
                        row.setAttribute('id', 'scoperow');

                        let ActCodeCell = row.insertCell(0);
                        ActCodeCell.innerHTML = item.ActCode;


                        let AcName3Cell = row.insertCell(1);
                        AcName3Cell.innerHTML = item.AcName3;

                        let DrAmtCell = row.insertCell(2);
                        DrAmtCell.innerHTML = parseFloat(item.DrAmt).toFixed(2);
                        DrAmtCell.style.textAlign = 'right';


                        let CrAmtCell = row.insertCell(3);
                        CrAmtCell.innerHTML = parseFloat(item.CrAmt).toFixed(2);
                        CrAmtCell.style.textAlign = 'right';


                        let CurrencyCell = row.insertCell(4);
                        CurrencyCell.innerHTML = item.Currency;

                        let DesCell = row.insertCell(5);
                        DesCell.innerHTML = item.Des;

                        TxtTotDrAmount += parseFloat(item.DrAmt);
                        TxtTotCrAmount += parseFloat(item.CrAmt);

                    });

                    $('#TxtTotDrAmount').val(TxtTotDrAmount.toFixed(2));
                    $('#TxtTotCrAmount').val(TxtTotCrAmount.toFixed(2));
                    // $('#scoperow').dblclick(function () {
                    //     alert(this.td[0].innerHTML);
                    // });
                    // const table = document.getElementById("OpeningBalancetable");
                    const tableBody = document.getElementById("OpeningBalancetablebody");
                    const inputField = document.getElementById("TxtBank");

                    tableBody.addEventListener("dblclick", function(e) {
                        if (e.target.tagName === "TD") {
                            const td = e.target;
                            const tr = td.parentNode;
                            const tdElements = tr.getElementsByTagName("td");

                            // Set the value of the input field to the third td element's inner HTML
                            $('#TxtExpActName').val(tdElements[0].innerHTML);
                            $('#TxtDescription').val(tdElements[1].innerHTML);
                            $('#TxtQuantity').val(tdElements[2].innerHTML);
                            $('#TxtRate').val(tdElements[3].innerHTML);
                            $('#TxtAmt').val(tdElements[4].innerHTML);
                            $('#TxtExpActCode').val(tdElements[5].innerHTML);
                            $('#TxtID').val(tdElements[6].innerHTML);

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
                let table = document.getElementById('OpeningBalancetablebody');
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
