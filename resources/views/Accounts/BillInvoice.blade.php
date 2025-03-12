@extends('layouts.app')



@section('title', 'Bill-Invoice')

@section('content_header')

@stop

@section('content')
    </div>

    <div class="container-fluid">

        <div class="col-lg-12 pt-2">
            <div class="row">

            </div>

            <div class="card">

                <div class="class-header">
                    <h3 class="text-center text-bold">Bill Invoice</h3>
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
                                <div class="inputbox col-sm-3">


                                    <input class="" type="number" id="TxtVoucherNo" name="TxtVoucherNo"
                                        value="">

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
                        <label class="mx-auto" id="workuser" for="">WorkUser</label>
                        <input type="date" class="mr-5 form-control col-sm-1" name="TxtDateActYear" id="TxtDateActYear">
                    </div>

                </div>
                <div class="card-body">

                    <div class="row py-2">

                        <div class="inputbox col-sm-2">
                            <input id='TxtDate' type="date" class="" value="">
                            <span class="" id="">Date </span>
                        </div>

                        <div class="inputbox col-sm-2">
                            <input class="" type="text" name="TxtRefNo" id="TxtRefNo">
                            <span class="" id="">Vendor Bill</span>
                        </div>

                        <div class="inputbox col-sm-2">
                            <span class="Txtspan" id="">Terms</span>
                            <select class="" id="CmbTerms" name="CmbTerms">
                                <option>Text</option>
                            </select>
                        </div>

                        <div class="inputbox col-sm-1">
                            <input type="text" class="" name="TxtDays" id="TxtDays">
                            <span> Days </span>
                        </div>

                        <a name="" id="" class="btn btn-info ml-auto " role="button">Edit Entry <i
                                class="fas fa-pencil"></i></a>
                    </div>

                    <div class="row py-2">

                        <div class="inputbox col-sm-6">
                            <input type="text" class="" name="TxtSupplierName" id="TxtSupplierName">
                            <span class="" id="">Vendor</span>
                        </div>

                        <a name="" id="" class="btn btn-info ml-auto mr-1" href="<?php echo url('VendorRegistration'); ?>"
                            role="button">Vendor Setup</a>
                        <a name="Browse" id="Browse" class="btn btn-info mx-1" role="button">Browse</a>
                    </div>

                    <div class="row py-2">

                        <div class="inputbox col-sm-6">
                            <input class="" type="text" name="TxtAddress" id="TxtAddress">
                            <span class="" id="">Address </span>
                        </div>

                        <div class="inputbox col-sm-1">
                            <input class="" type="text" name="TxtSupplierCode"
                                id="TxtSupplierCode">
                                <span>S. Code </span>
                        </div>

                        <div class="inputbox col-sm-4">
                            <input class="" type="text" name="TxtFileName" id="TxtFileName">
                            <span>File </span>
                        </div>

                    </div>

                    <div class="row py-2">

                        <div class="inputbox col-sm-2">
                            <input class="" type="text" name="TxtPhone" id="TxtPhone">
                            <span class="" id="">Phone </span>
                        </div>

                        <div class="inputbox col-sm-2">
                            <input class="" type="text" name="TxtMobile" id="TxtMobile">
                            <span class="" id="">Cell </span>
                        </div>

                        <div class="inputbox col-sm-2">
                            <input class="" type="text" name="TxtEmail" id="TxtEmail">
                            <span class="" id="">Email</span>
                        </div>

                        <button id="viewpdf" class="btn btn-info ml-auto mr-1" type="button"><i
                                style="font-size: 21px" class="fas fa-file-pdf"></i></button>
                        <button id="storepdf" class="btn btn-success mr-1" type="button"><i style="font-size: 21px"
                                class="fas fa-save    "></i></button>
                        <a name="" id="pdf" class="btn btn-danger mr-1" role="button"><i
                                style="font-size: 21px" class="fas fa-file-pdf    "></i></a>


                    </div>

                    <div class="row py-2">

                        <div class="inputbox col-sm-1">
                            <input class="" type="text" name="TxtCrCode" id="TxtCrCode">
                            <span class="" id="">Code</span>
                        </div>

                        <div class="inputbox col-sm-5">
                            <input class="" type="text" name="TxtCrName" id="TxtCrName">
                            <span class="" id="">Credit A/C</span>
                        </div>

                        <div class="inputbox col-sm-1">
                            <input class="" type="text" name="TxtCrBal" id="TxtCrBal">
                            <span class="" id="">Cr. Balance</span>
                        </div>

                    </div>

                    <div class="row py-2">

                        <div class="inputbox col-sm-6">
                            <input class="" type="hidden" name="TxtExpActCode" id="TxtExpActCode">
                            <input class="" type="text" name="TxtExpActName" id="TxtExpActName">
                            <span class="" id="">Expense A/c</span>
                        </div>

                    </div>

                    <div class="row py-2">
                        <div class="inputbox col-sm-6">
                            <input class="" type="text" name="TxtDescription" id="TxtDescription">
                            <span class="" id="">Description</span>
                        </div>

                        <div class="inputbox col-sm-2">
                            <input class="" type="text" name="TxtQuantity" id="TxtQuantity">
                            <span class="" id="">Quantity</span>
                        </div>

                        <div class="inputbox col-sm-2">
                            <input class="" type="text" name="TxtRate" id="TxtRate">
                            <span class="" id="">Rate</span>
                        </div>

                        <div class="inputbox col-sm-2">
                            <input class="" type="text" name="TxtAmt" id="TxtAmt">
                            <input class="" type="hidden" name="TxtID" id="TxtID">
                            <span class="" id="">Amount</span>
                        </div>

                    </div>



                </div>
            </div>

            <table class="table" id="PO-recivedtable">
                <thead class="">
                    <tr>
                        <th style="padding-left: 5rem;padding-right:5rem">Expense&nbsp;Name</th>
                        <th style="padding-left: 7rem;padding-right:7rem">Description</th>
                        <th>Qty</th>
                        <th class="text-right">Rate</th>
                        <th class="text-right">Amount</th>
                        <th>ExpCode</th>
                        <th hidden>ID</th>
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
                        <td hidden></td>
                    </tr>
                </tbody>
            </table>


            <div class="card">
                <div class="card-body">
                    <div class="row py-2">
                        {{-- <input type="text" class="form-control col-sm-1 mx-1" name="TxtTotgross" id="TxtTotgross">
            <input type="text" class="form-control col-sm-1 mx-1" name="TxtTotLoan" id="TxtTotLoan">
            <input type="text" class="form-control col-sm-1 mx-1" name="TxtGarnishment" id="TxtGarnishment">
            <input type="text" class="form-control col-sm-1 mx-1" name="TxtHealthInsurance" id="TxtHealthInsurance">
            <input type="text" class="form-control col-sm-1 mx-1" name="TxtTotEmpTax" id="TxtTotEmpTax">
            <input type="text" class="form-control col-sm-1 mx-1" name="TxtTotComTax" id="TxtTotComTax">
            <input type="text" class="form-control col-sm-1 mx-1" name="TxtMilage" id="TxtMilage">
            <input type="text" class="form-control col-sm-1 mx-1" name="TxtTripCharges" id="TxtTripCharges">
            <input type="text" class="form-control col-sm-1 mx-1" name="TxtTotal" id="TxtTotal">

            <a name="" id="SelectAll" class="btn btn-default"  role="button">Select All</a>
            <a name="" id="UnSelectAll" class="btn btn-default"  role="button">UnSelect All</a> --}}
                        <div class="inputbox col-sm-6">
                            <input class="" type="text" name="TxtDes" id="TxtDes">
                            <span class="" id="">Description</span>
                        </div>

                        <div class="CheckBox1">

                            <label class="input-group text-info mt-2 mx-2">
                                <input class=" " type="checkbox" onclick="" name="ChkOkToPay"
                                    id="ChkOkToPay" value=""> OK To PAY
                            </label>

                        </div>

                        <div class="inputbox col-sm-2">
                            <input class="" type="text" name="TxtNetAmount1" id="TxtNetAmount1">
                            <span class="" id="">Bill Amount</span>
                        </div>

                    </div>

                    <div class="row py-2">

                        <div class="inputbox col-sm-2">
                            <input class="" type="text" name="TxtPVNo" id="TxtPVNo">
                            <span class="" id="">Voucher#</span>
                        </div>

                        <div class="inputbox col-sm-2">
                            <input class="" type="text" name="TxtPVDate" id="TxtPVDate">
                            <span class="" id="">Date</span>
                        </div>

                        <div class="inputbox col-sm-2">
                            <input class=" " type="text" name="TxtPaidAmt" id="TxtPaidAmt">
                            <span class="" id="">Paid Amt </span>
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

                    </div>`
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
                var ExpActName = $('#TxtExpActName').val();
                var Description = $('#TxtDescription').val();
                var Quantity = $('#TxtQuantity').val();
                var Rate = $('#TxtRate').val();
                var Amount = $('#TxtAmt').val();
                var ExpActCode = $('#TxtExpActCode').val();
                var ID = $('#TxtID').val();



                var table = document.getElementById("PO-recivedtable");

                // Create a new row
                // let row = table.insertRow();
                var row = table.insertRow(-1);

                let ExpActNameCell = row.insertCell(0);
                ExpActNameCell.innerHTML = ExpActName;


                let DescriptionCell = row.insertCell(1);
                DescriptionCell.innerHTML = Description;

                let QuantityCell = row.insertCell(2);
                QuantityCell.innerHTML = Quantity;

                let RateCell = row.insertCell(3);
                RateCell.innerHTML = parseFloat(Rate).toFixed(2);
                RateCell.style.textAlign = 'right';

                let AmountCell = row.insertCell(4);
                AmountCell.innerHTML = parseFloat(Amount).toFixed(2);
                AmountCell.style.textAlign = 'right';

                let ExpActCodeCell = row.insertCell(5);
                ExpActCodeCell.innerHTML = ExpActCode;

                let IDCell = row.insertCell(6);
                IDCell.innerHTML = ID;
                IDCell.hidden = true;

            };

            function Roweditfunc() {
                alert('edit');

            };

            function tablecomposer() {
                let table = document.getElementById('Receiptvocvertablebody');
                let rows = table.rows;
                datatablearray = [];
                for (let i = 0; i < rows.length; i++) {
                    let cells = rows[i].cells;
                    datatablearray.push({
                        ExpenseName: cells[0] ? cells[0].innerHTML : '',
                        Description: cells[1] ? cells[1].innerHTML : '',
                        Qty: cells[2] ? cells[2].innerHTML : '',
                        Rate: cells[3] ? cells[3].innerHTML : '',
                        Amount: cells[4] ? cells[4].innerHTML : '',
                        ExpCode: cells[5] ? cells[5].innerHTML : '',
                        ID: cells[6] ? cells[6].innerHTML : '',

                    });

                }

            }
            $('#CmdSave').click(function(e) {
                tablecomposer()
                //    let TxtActCashCode = $('#TxtActCashCode').val();
                //    let TxtVoucherNo = $('#TxtVoucherNo').val();
                if ($("#ChkOkToPay").is(":checked") && $("#TxtRefNo").val().trim() == '') {
                    if (confirm("Please Enter Vendor Bill # for OK to Pay")) {
                        $('#TxtRefNo').focus();
                        return;
                    } else {}
                }

                if ($("#TxtCrCode").val() == '') {
                    $('#TxtCrCode').focus();
                    alert('Debit Not Found , Please Enter Debit Account');
                    return;


                }
                if ($("#TxtDes").val() == '') {
                    $('#TxtCrCode').val($("#TxtSupplierName").val() + " Bill# " + $("#TxtVoucherNo").val() +
                        " Vendor Bill# " + $("#TxtRefNo").val());
                }

                // if ($("#TxtRefNo").val() !== '') {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '/BillMastersave',
                    type: 'POST',
                    data: {
                        TxtSerialNo: $('#TxtVoucherNo').val(),
                        TxtRefNo: $('#TxtRefNo').val(),
                        TxtDes: $('#TxtDes').val(),
                        CmbTerms: $('#CmbTerms').val(),
                        TxtNetAmount1: $('#TxtNetAmount1').val(),
                        TxtSupplierCode: $('#TxtSupplierCode').val(),
                        TxtDate: $('#TxtDate').val(),
                        TxtCrCode: $('#TxtCrCode').val(),
                        ChkOkToPay: $("#ChkOkToPay").is(":checked"),
                        table: datatablearray,
                    },
                    success: function(data) {
                        if (data.success == true) {
                            alert('saved');
                            console.log(data);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log(error);

                    }
                });
                // }
                // let MSalesCode = '{{ $FixAccountSetup ? $FixAccountSetup->ActSalesCode : ''}}';
                // let MUnEarnCommCode = '{{ $FixAccountSetup ? $FixAccountSetup->UnEarnCommCode : '' }}';
                // let MCommIncomeCode = '{{ $FixAccountSetup ? $FixAccountSetup->CommIncomeCode : '' }}';
                // let MCashCode = '{{ $FixAccountSetup ? $FixAccountSetup->ActCashCode : '' }}';
                // let MBankChargesActCode = '{{ $FixAccountSetup ? $FixAccountSetup->BankChargesActCode : '' }}';

                // if (TxtVoucherNo == 0) {
                //     AddNew();
                // }


                // OrderMasterstep()
            });


        });

        $(document).ready(function() {
                var odate = new Date();
                const today = odate.toISOString().substring(0, 10);
                $('#TxtDate').val(today);
                $('#TxtDatefrom').val(today);
                $('#TxtDateTo').val(today);
                $('#TxtDateActYear').val(today);
                $('#TxtChqDate').val(today);


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

        // function Steptwo() {

        //     let radCashVouter = '';
        //     // if (document.getElementById("RadCashVoucher").checked == true) {
        //         if ($("#RadCashVoucher").is(":checked")) {
        //         radCashVouter = 'Cash';
        //     }else{

        //         radCashVouter = 'Bank';
        //     }

        //     var table = document.getElementById('Receiptvocvertablebody');
        //     console.log(table);
        //     let rows = table.rows;
        // console.log(rows);
        // let data = [];
        // for (let i = 0; i < rows.length; i++) {
        //     let cells = rows[i].cells;
        //   data.push({

        //     ActCode: cells[0] ? cells[0].innerHTML : '',
        //     AccountName: cells[1] ? cells[1].innerHTML : '',
        //     Amount: cells[2] ? cells[2].innerHTML : '',
        //     Currency: cells[3] ? cells[3].innerHTML : '',
        //     ChqNo: cells[4] ? cells[4].innerHTML : '',
        //     ChqDate: cells[5] ? cells[5].innerHTML : '',
        //     Description: cells[6] ? cells[6].innerHTML : '',
        //     ClientOrderNo: cells[7] ? cells[7].innerHTML : '',
        //     RefNo: cells[8] ? cells[8].innerHTML : '',
        //     BankcashRecamt: cells[9] ? cells[9].innerHTML : '',
        //     VesselName: cells[10] ? cells[10].innerHTML : '',
        //     BankCharges: cells[11] ? cells[11].innerHTML : '',



        // });
        // }
        // console.log(data);
        //     $.ajaxSetup({
        //   headers: {
        //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //   }
        // });

        // $.ajax({
        //   url: '/Steptwo-receipt-vouchers',
        //   type: 'POST',
        //   data: {
        //     txtVoucherNo: $('#TxtVoucherNo').val(),
        //     txtVoucherDate: $('#txtVoucherDate').val(),
        //     txtTotAmount: $('#txtTotAmount').val(),
        //     txtActCashCode: $('#txtActCashCode').val(),
        //     txtActCashName: $('#txtActCashName').val(),
        //     txtBankDescription: $('#txtBankDescription').val(),
        //     cmbPayType: $('#cmbPayType').val(),
        //     radCashVouter,
        //     data,
        //   },
        //   success: function(resposne) {
        //     alert(resposne.message);
        //     // $('#TxtVoucherNo').val(resposne.MVoucherNo);
        //   }
        // });

        // }
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
            var totalvouchers = '{{ $lastVoucherNo }}';

            if (vouncherno == '') {
                $('#TxtVoucherNo').val(1);
            } else {

                var nextValue = parseInt(vouncherno) + 1;
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
            var totalvouchers = '{{ $firstVoucherNo }}';
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
                url: '/searchBill',
                type: 'POST',
                data: {
                    BillNo: $('#TxtVoucherNo').val(),
                    pono: $('#TxtClientOrder').val(),
                },
                success: function(resposne) {

                    document.getElementById("firstvoucher").dataset.voucherno = resposne.firstVoucherNo;
                    document.getElementById("lastvoucher").dataset.voucherno = resposne.lastVoucherNo;

                    let data = resposne.results;
                    let table = document.getElementById('Receiptvocvertablebody');
                    table.innerHTML = ""; // Clear the table
                    var ids = 0;
                    if (resposne.Message == 'data') {
                        $('#TxtSupplierName').val(resposne.Supply.SupplierName);
                        $('#TxtAddress').val(resposne.Supply.address);
                        $('#TxtPhone').val(resposne.Supply.PhoneNo);
                        $('#TxtMobile').val(resposne.Supply.MobileNo);
                        $('#TxtEmail').val(resposne.Supply.emailAddress);
                        $('#TxtCrCode').val(resposne.Supply.ActCodeLiability);
                        $('#TxtCrCode').val(resposne.Acfile3.ActCode);
                        $('#TxtFileName').val(resposne.Acfile3.AcName3);

                    } else {
                        $('#TxtSupplierName').val();
                        $('#TxtAddress').val();
                        $('#TxtPhone').val();
                        $('#TxtMobile').val();
                        $('#TxtEmail').val();
                        $('#TxtCrCode').val();
                        $('#TxtCrName').val();
                    }
                    data.forEach(function(item) {
                        ids = ids + 1;
                        var chekdate = new Date(item.Date);
                        const options = {
                            weekday: 'long',
                            year: 'numeric',
                            month: 'long',
                            day: 'numeric'
                        };
                        const dayOfWeek = chekdate.toLocaleString('en-US', options).split(',')[0];
                        // console.log(dayOfWeek);
                        const DateActYear = chekdate.toLocaleDateString("en-US", {
                            year: 'numeric',
                            month: '2-digit',
                            day: '2-digit'
                        });
                        const forDate = chekdate.toISOString().substring(0, 10);
                        $('#TxtRefNo').val(item.RefNo);
                        $('#TxtSupplierCode').val(item.SupplierCode);
                        $('#TxtTotAmount').val(Math.round(item.TotAmount, 2));
                        $('#TxtDate').val(forDate);
                        $('#TxtDateActYear').val(forDate);
                        $('#TxtCrCode').val(item.CrActCode);
                        $('#TxtCrName').val(item.CrActName);
                        $('#TxtDes').val(item.Des);
                        $('#TxtDays').val(dayOfWeek);
                        // $('#TxtExpActName').val(item.ExpActName);
                        $('#CmbTerms :selected').val(item.Terms);
                        $('#CmbTerms :selected').text(item.Terms);
                        $('#workuser').text(item.WorkUSer);


                        if (item.OKToPay == true) {
                            document.getElementById("ChkOkToPay").checked = true;
                        } else {
                            document.getElementById("ChkOkToPay").checked = false;
                        }


                        let row = table.insertRow();
                        row.setAttribute("data-row-id", ids);
                        row.setAttribute('id', 'scoperow');

                        let ExpActNameCell = row.insertCell(0);
                        ExpActNameCell.innerHTML = item.ExpActName;


                        let DescriptionCell = row.insertCell(1);
                        DescriptionCell.innerHTML = item.Description;

                        let QuantityCell = row.insertCell(2);
                        QuantityCell.innerHTML = item.Quantity;

                        let RateCell = row.insertCell(3);
                        RateCell.innerHTML = parseFloat(item.Rate).toFixed(2);
                        RateCell.style.textAlign = 'right';

                        let AmountCell = row.insertCell(4);
                        AmountCell.innerHTML = parseFloat(item.Amount).toFixed(2);
                        AmountCell.style.textAlign = 'right';

                        let ExpActCodeCell = row.insertCell(5);
                        ExpActCodeCell.innerHTML = item.ExpActCode;

                        let IDCell = row.insertCell(6);
                        IDCell.innerHTML = item.ID;
                        IDCell.hidden = true;

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
