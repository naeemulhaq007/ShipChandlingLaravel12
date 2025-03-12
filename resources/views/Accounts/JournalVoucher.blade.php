@extends('layouts.app')



@section('title', 'Journal-Voucher')

@section('content_header')

@stop

@section('content')
    </div>

    <div class="container-fluid">

        <div class="col-lg-12 pt-2">
            <div class="row">

            </div>

            <div class="card">

                <div class="card-header">

                    <h3 class="text-center text-bold">Journal Voucher</h3>
                </div>

                <div style="background-color:#EEE; " class="card-header">
                    <div class="card-tools ">
                        <div class=" row">
                            {{-- <button id="viewpdf" class="btn btn-default mr-1" type="button" ><i style="font-size: 21px" class="fas fa-file-pdf text-info"></i></button>
                        <button id="storepdf" class="btn btn-default mr-1" type="button"><i style="font-size: 21px" class="fas fa-save text-info   "></i></button>
                        <a name="" id="pdf" class="btn btn-default mr-1"  role="button"><i style="font-size: 21px" class="fas fa-file-pdf text-danger   "></i></a> --}}

                            {{-- /&nbsp;  <strong>Customer Ref # :&nbsp;</strong> <label class="customer_ref_no text-blue" for="customer_ref_no">Custref121</label> --}}
                            {{-- <a name="" id="" class="btn btn-primary  mx-1" role="button">PO Rec</a> --}}
                            <input type="date" class="form-control col-sm-2" id="TxtdateActYear">

                            <a name="firstvoucher" data-voucherno="{{ $firstVoucherNo }}" id="firstvoucher"
                                class="btn btn-secondary mx-1" role="button"><i class="fa fa-arrow-left"
                                    aria-hidden="true"></i></a>
                            <button id="prev-voucher" class="btn btn-info mx-1"><i class="fa fa-arrow-circle-left"
                                    aria-hidden="true"></i></button>

                            {{-- <a name="" id="minus" class="btn btn-info mx-1" onclick="MinusCaps()" role="button"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a> --}}
                            <div class="col-sm-3">
                                <div class="inputbox">
                                    {{-- <div class="input-group-prepend">
                    <span class="input-group-text" id="">Quote#</span>
                </div> --}}

                                    {{-- <input class="form-control" type="number"  id="TxtVoucherNo" name="TxtVoucherNo" value="" > --}}
                                    <input class="" type="number" id="current-voucher" name="current-voucher"
                                        value="">

                                </div>
                            </div>
                            <button id="next-voucher" class="btn btn-info mx-1"><i class="fa fa-arrow-circle-right"
                                    aria-hidden="true"></i></button>
                            {{-- <a name="" id="plus" class="btn btn-info mx-1"  onclick="PlusCaps()" role="button"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a> --}}
                            <a name="" id="lastvoucher" data-voucherno="{{ $lastVoucherNo }}"
                                class="btn btn-secondary mx-1" role="button"><i class="fa fa-arrow-right"
                                    aria-hidden="true"></i></a>

                            <input type="hidden" id="vouchers" name="vouchers"
                                value="{{ implode(',', $Voucher->pluck('VoucherNo')->toArray()) }}">
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

                        <div class="inputbox col-sm-3">
                            <input id='TxtVoucherDate' type="date" class="" value="">
                            <span class="" id="">VoucherDate</span>
                        </div>


                        <div class="inputbox col-sm-2">
                            <input type="text" readonly id="TxtReconWorkUser" name="TxtReconWorkUser" class="">
                            <span class="" id="">Reconcilation</span>
                        </div>

                        <div class="inputbox col-sm-1">

                            <input type="date" readonly id="TxtReconDate" name="TxtReconDate" class="">
                            <span class="" id=""></span>

                        </div>



                        <div class="inputbox col-sm-1">
                            <input type="text" readonly id="TxtAmt" name="TxtAmt" class="">
                            <span class="" id="">Amt.</span>

                        </div>

                    </div>

                    <div class="row py-2">
                        <div class="inputbox col-sm-3">
                            <span class="Txtspan" id="">Location</span>
                            {{-- <input class="form-control col-sm-10" type="text" name="CmbGodownName" id="CmbGodownName" list="GodownName">
<datalist id="GodownName">
    <option value="HOUSTON">
    <option value="NEW ORLEAN">
    <option value="LOS ANGELES">
    <option value="NEW JEARSY">
    <option value="NEW YORK">
<datalist> --}}
                            <select class="" id="CmbGodownName" name="CmbGodownName">
                                <option value="1">HOUSTON</option>
                                <option value="2">NEW ORLEAN</option>
                                <option value="3">LOS ANGELES</option>
                                <option value="4">NEW JEARSY</option>
                                <option value="5">NEW YORK</option>
                            </select>
                        </div>

                        {{-- <a name="CmdChartofAccount" id="CmdChartofAccount" class="btn btn-default ml-auto"  role="button">Chart of Account</a> --}}
                    </div>



                </div>
            </div>

            <table class="table" id="PO-recivedtable">
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
                <tbody id="Receiptvocvertablebody">
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


                        <div class="CheckBox1">

                            <label class="input-group text-info mt-2 mx-1">
                                <input class=" " type="checkbox" onclick="" name="ChkCompanyHeading"
                                    id="ChkCompanyHeading" value=""> Company Heading
                            </label>

                        </div>

                        <div class="inputbox col-sm-2">

                            <input class="" type="text" name="TxtTotDrAmount" id="TxtTotDrAmount">
                            <span>Dr. Amt. </span>
                        </div>

                        <div class="inputbox col-sm-2">

                            <input class="" type="text" name="TxtTotCrAmount" id="TxtTotCrAmount">
                            <span>Cr. Amt. </span>

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
    <div id="chartofaccount" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="my-modal-title">Chart of Account</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Content</p>
                    <?php echo View::make('partials.Searchchartofaccount'); ?>

                </div>
                <div class="modal-footer">
                    Footer
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
            const vouchersInput = document.getElementById('vouchers');
            const currentVoucherInput = document.getElementById('current-voucher');
            const prevButton = document.getElementById('prev-voucher');
            const nextButton = document.getElementById('next-voucher');

            let vouchers = vouchersInput.value.split(',');
            let currentIndex = vouchers.findIndex(voucher => voucher === currentVoucherInput.value);
            currentVoucherInput.value = vouchers[currentIndex];

            prevButton.addEventListener('click', () => {
                if (currentIndex > 0) {
                    currentIndex--;
                    currentVoucherInput.value = vouchers[currentIndex];
                    dataget();

                }
            });

            nextButton.addEventListener('click', () => {
                if (currentIndex < vouchers.length - 1) {
                    currentIndex++;
                    currentVoucherInput.value = vouchers[currentIndex];
                    dataget();

                }
            });

        });
        $(document).ready(function() {
            // dataget();
            // $('#containers').hide();
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

            $('#current-voucher').blur(function() {
                dataget();
            });

            $("#current-voucher").on("keydown", function(event) {
                if (event.which === 13) {
                    dataget();
                }
            });
            $('#lastvoucher').click(function(e) {
                var voucherno = document.getElementById("lastvoucher").dataset.voucherno;
                document.getElementById("current-voucher").value = voucherno;
                dataget();
            });
            $('#firstvoucher').click(function(e) {
                var voucherno = document.getElementById("firstvoucher").dataset.voucherno;
                document.getElementById("current-voucher").value = voucherno;
                dataget();
            });
            $(document).on('keyup', '.setdes', function(e) {
                let tddes = this.innerHTML;
                var table = document.getElementById('Receiptvocvertablebody');
                var lastRow = table.rows[table.rows.length - 1];
                var firstCell = lastRow.cells[0].innerHTML;
                console.log(tddes);
                console.log(firstCell);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '/jvdes',
                    type: 'POST',
                    data: {
                        des: tddes,
                        ActCode: firstCell,
                    },
                    beforeSend: function() {
                        // Show the overlay and spinner before sending the request
                        $('.overlay').show();
                    },
                    success: function(response) {
                        console.log(response.results.Des);
                        var table = document.getElementById('Receiptvocvertablebody');
                        var lastRow = table.rows[table.rows.length - 1];
                        let ExpActCodeCell = lastRow.cells[5];
                        ExpActCodeCell.innerHTML = response.results.Des;
                    },
                    error: function(xhr, status, error) {
                        console.log(error);

                    },
                    complete: function() {
                        // Hide the overlay and spinner after the request is complete
                        $('.overlay').hide();
                    }
                });

            });
            $(document).on('keydown', '.setact', function(e) {
                if (e.keyCode === 13) {
                    e.preventDefault();
                    let td = this.innerHTML;
                    if (td == null || td == '') {
                        $('#chartofaccount').modal('show');

                    } else {

                        // alert(td);
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        $.ajax({
                            url: '/jvact',
                            type: 'POST',
                            data: {
                                ActCode: td,
                            },
                            beforeSend: function() {
                                // Show the overlay and spinner before sending the request
                                $('.overlay').show();
                            },
                            success: function(response) {

                                if (response.results !== null) {
                                    console.log(response.results);
                                    let acname = response.results.AcName3;

                                    var table = document.getElementById(
                                        'Receiptvocvertablebody');
                                    var lastRow = table.rows[table.rows.length - 1];
                                    let ActCodeCell = lastRow.cells[1];
                                    ActCodeCell.innerHTML = acname;
                                } else {
                                    alert('Not Found');
                                }
                            },
                            error: function(xhr, status, error) {
                                console.log(error);

                            },
                            complete: function() {
                                // Hide the overlay and spinner after the request is complete
                                $('.overlay').hide();
                            }
                        });
                    }
                }
            });

            $('#PO-recivedtable tbody').on('click', 'tr', function() {
                if ($(this).hasClass('selected')) {
                    $(this).removeClass('selected');
                    // $('#deleteButton').attr('data-row-id', '');
                } else {
                    table.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                    // var id = $(this).attr('data-row-id');
                    // $('#deleteButton').attr('data-row-id', id);
                }
            });

            function Rowdeletefunc(table, id) {
                // if (id) {
                //     table.row('[data-row-id="' + id + '"]').remove().draw();
                //     $('#deleteButton').attr('data-row-id', '');
                // }else{
                //     alert('noid');
                // }
                if($('#PO-recivedtable tbody tr').hasClass('selected')){
                    console.log(table.row('.selected'));
                    // .remove().draw();

                }
            }

            function Rowaddfunc() {

                // alert('add');
                // var pkrrate = document.getElementById("pkrrate").value;
                //    var ExpActName = $('#TxtExpActName').val();
                //    var Description = $('#TxtDescription').val();
                //    var Quantity = $('#TxtQuantity').val();
                //    var Rate = $('#TxtRate').val();
                //    var Amount = $('#TxtAmt').val();
                //    var ExpActCode = $('#TxtExpActCode').val();
                //    var ID = $('#TxtID').val();



                var table = document.getElementById("Receiptvocvertablebody");
                let rowsc = table.rows;
                let id = rowsc.length+1;

                var row = table.insertRow(-1);
                row.setAttribute('data-row-id', id);

                let ExpActNameCell = row.insertCell(0);
                ExpActNameCell.contentEditable = true;
                ExpActNameCell.setAttribute('class', 'setact');


                let DescriptionCell = row.insertCell(1);
                DescriptionCell.contentEditable = true;

                let QuantityCell = row.insertCell(2);
                QuantityCell.contentEditable = true;
                QuantityCell.style.textAlign = 'right';

                let RateCell = row.insertCell(3);
                RateCell.contentEditable = true;
                RateCell.style.textAlign = 'right';

                let AmountCell = row.insertCell(4);
                AmountCell.contentEditable = true;

                let ExpActCodeCell = row.insertCell(5);
                ExpActCodeCell.contentEditable = true;
                ExpActCodeCell.setAttribute('class', 'setdes');


            };

            function Roweditfunc() {
                alert('edit');

            };

            function tablecomposer() {
                let table = document.getElementById('Receiptvocvertablebody');
                let rows = table.rows;
                var DebitAmounttot = 0;
                var CreditAmounttot = 0;
                //  datatablearray = [];
                for (let i = 0; i < rows.length; i++) {
                    let cells = rows[i].cells;
                    //   let ActCode = cells[0].innerHTML;
                    //   if (ActCode == '') {
                    //       alert('Please Enter ACT-CODE');
                    // return;
                    //   }
                    //   datatablearray.push({
                    let ActCode = cells[0] ? cells[0].innerHTML : '';
                    let AccountName = cells[1] ? cells[1].innerHTML : '';
                    let DebitAmount = cells[2] ? cells[2].innerHTML : '';
                    let CreditAmount = cells[3] ? cells[3].innerHTML : '';
                    let Currency = cells[4] ? cells[4].innerHTML : '';
                    let Description = cells[5] ? cells[5].innerHTML : '';
                    DebitAmounttot += Number(DebitAmount);
                    CreditAmounttot += Number(CreditAmount);
                    //   });

                }
                $('#TxtTotDrAmount').val(DebitAmounttot);
                $('#TxtTotCrAmount').val(CreditAmounttot);
            }


            // $(document).ready(function () {
            function CheckRecon(MReconAmtChange, callback) {
                var MVnon = $('#current-voucher').val();
                var MVnoc = "JV";
                tablecomposer();
                let table = document.getElementById('Receiptvocvertablebody');
                let rows = table.rows;
                var DebitAmounttot = 0;
                var CreditAmounttot = 0;
                datatablearray = [];
                for (let i = 0; i < rows.length; i++) {
                    let cells = rows[i].cells;
                    //   let ActCode = cells[0].innerHTML;
                    //   if (ActCode == '') {
                    //       alert('Please Enter ACT-CODE');
                    // return;
                    //   }
                    datatablearray.push({
                        ActCode: cells[0] ? cells[0].innerHTML : '',
                        AccountName: cells[1] ? cells[1].innerHTML : '',
                        DebitAmount: cells[2] ? cells[2].innerHTML : '',
                        CreditAmount: cells[3] ? cells[3].innerHTML : '',
                        Currency: cells[4] ? cells[4].innerHTML : '',
                        Description: cells[5] ? cells[5].innerHTML : '',
                    });

                }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '/CheckRecon',
                    type: 'POST',
                    data: {
                        MVnon,
                        MVnoc,
                        datatablearray,
                    },
                    success: function(resposne) {
                        console.log(resposne);
                        if (resposne.Message == 'ALREADY CONCILED Confirmation') {
                            var password = prompt(
                                "RECONCILED VOUCHER FOUND!!!, Amount has been changed!!!");
                            if (password === "332211") {
                                if (confirm("Do you want to proceed?")) {
                                    // proceed with action
                                    // alert("Changed Terms.");
                                    MReconAmt = "Y"
                                    // document.getElementById("CmbTerms").value = terms;
                                    callback(MReconAmt);
                                } else {
                                    alert("Access denied.");
                                    return;
                                }
                            } else {
                                alert("Incorrect password.");
                                return;
                            }

                        }
                    }
                });

            }

            // });
            $('#TxtTotCrAmount').blur(function(e) {
                e.preventDefault();
                tablecomposer()

            });
            $('#TxtTotDrAmount').blur(function(e) {
                e.preventDefault();
                tablecomposer()

            });
            $('#CmdSave').click(function(e) {
                tablecomposer()
                let MReconAmtChange = "";
                // console.log(datatablearray);

                // if (datatablearray.length = 0) {
                //     alert();
                //     return;
                // }
                let table = document.getElementById('Receiptvocvertablebody');
                let rows = table.rows;
                datatablearray = [];
                for (let i = 0; i < rows.length; i++) {
                    let cells = rows[i].cells;
                    let ActCode = cells[0].innerHTML;
                    if (ActCode == '') {
                        console.log(ActCode);
                        alert('Please Enter ACT-CODE');
                        return;
                    }
                    datatablearray.push({
                        ActCode: cells[0] ? cells[0].innerHTML : '',
                        AccountName: cells[1] ? cells[1].innerHTML : '',
                        DebitAmount: cells[2] ? cells[2].innerHTML : '',
                        CreditAmount: cells[3] ? cells[3].innerHTML : '',
                        Currency: cells[4] ? cells[4].innerHTML : '',
                        Description: cells[5] ? cells[5].innerHTML : '',

                    });

                }

                let TxtTotDrAmount = $('#TxtTotDrAmount').val();
                let TxtTotCrAmount = $('#TxtTotCrAmount').val();
                let GrpRecon = $('#GrpRecon').text();
                if (TxtTotDrAmount !== TxtTotCrAmount) {
                    alert('Amount Not Match /n The Debit Amount not equal to Credit Amount');
                    return;
                }

                if (GrpRecon == 'Reconciled') {
                    CheckRecon(MReconAmtChange, function(MReconAmt) {
                        // console.log(MReconAmtChange);
                        // continue your code here;
                        console.log(MReconAmt);
                        if (MReconAmt !== 'Y') {
                            alert('end');
                            return;
                        }


                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        $.ajax({
                            url: '/jvsave',
                            type: 'POST',
                            data: {
                                TxtGodownCode: $('#TxtGodownCode').val(),
                                TxtVoucherNo: $('#current-voucher').val(),
                                TxtVoucherDate: $('#TxtVoucherDate').val(),
                                TxtTotDrAmount: $('#TxtTotDrAmount').val(),
                                TxtTotCrAmount: $('#TxtTotCrAmount').val(),
                                table: datatablearray,
                            },
                            beforeSend: function() {
                                // Show the overlay and spinner before sending the request
                                $('.overlay').show();
                            },
                            success: function(data) {
                                // if (data.success == true) {
                                alert('saved');
                                console.log(data);
                                // }
                            },
                            error: function(xhr, status, error) {
                                console.log(error);

                            },
                            complete: function() {
                                // Hide the overlay and spinner after the request is complete
                                $('.overlay').hide();
                            }
                        });
                    });
                }



            });


        });



        function AddNew() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '/AddNew-Journal-vouchers',
                type: 'POST',
                data: {

                },
                success: function(resposne) {
                    alert(resposne.message);
                    $('#current-voucher').val(resposne.MVoucherNo);
                }
            });

        }

        function PlusCaps() {
            var vouncherno = $('#current-voucher').val();
            var totalvouchers = '{{ $lastVoucherNo }}';
            if (vouncherno == '') {
                $('#current-voucher').val(1);
            } else {

                var nextValue = parseInt(document.getElementById("current-voucher").value) + 1;
                if (nextValue > totalvouchers) {
                    return;
                } else {
                    document.getElementById("current-voucher").value = nextValue;
                    dataget();
                }
            }
        };

        function MinusCaps() {
            var vouncherno = $('#current-voucher').val();
            var totalvouchers = '{{ $firstVoucherNo }}';
            if (vouncherno == '') {
                return;
            } else {
                var nextValue = parseInt(document.getElementById("current-voucher").value) - 1;
                if (nextValue < 1) {
                    return;
                } else {
                    document.getElementById("current-voucher").value = nextValue;
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
                url: '/jvsearch',
                type: 'POST',
                data: {
                    BillNo: $('#current-voucher').val(),
                    pono: $('#TxtClientOrder').val(),
                },
                success: function(resposne) {

                    document.getElementById("firstvoucher").dataset.voucherno = resposne.firstVoucherNo;
                    document.getElementById("lastvoucher").dataset.voucherno = resposne.lastVoucherNo;

                    let data = resposne.results;
                    let table = document.getElementById('Receiptvocvertablebody');
                    table.innerHTML = ""; // Clear the table
                    var ids = 0;
                    // if (resposne.Message == 'data') {
                    //     $('#TxtSupplierName').val(resposne.Supply.SupplierName);
                    //     $('#TxtAddress').val(resposne.Supply.address);
                    //     $('#TxtPhone').val(resposne.Supply.PhoneNo);
                    //     $('#TxtMobile').val(resposne.Supply.MobileNo);
                    //     $('#TxtEmail').val(resposne.Supply.emailAddress);
                    //     $('#TxtCrCode').val(resposne.Supply.ActCodeLiability);
                    //     $('#TxtCrCode').val(resposne.Acfile3.ActCode);
                    //     $('#TxtFileName').val(resposne.Acfile3.AcName3);

                    // }else{
                    //     $('#TxtSupplierName').val();
                    //     $('#TxtAddress').val();
                    //     $('#TxtPhone').val();
                    //     $('#TxtMobile').val();
                    //     $('#TxtEmail').val();
                    //     $('#TxtCrCode').val();
                    //     $('#TxtCrName').val();
                    // }
                    if ((resposne.Trans) !== null) {
                        if (resposne.Trans.ChkRecon == true) {
                            $('#GrpRecon').text('Reconciled');
                            $('#GrpRecon').css("color", 'Green');
                            $('#TxtAmt').val(parseFloat(resposne.Trans.TransAmt).toFixed(2));

                        } else {
                            $('#GrpRecon').text('Not Reconciled');
                            $('#GrpRecon').css("color", 'Red');
                            $('#TxtAmt').val('');

                        }
                        $('#TxtReconWorkUser').val(resposne.Trans.ReconWorkUser);
                        // $('#TxtReconDate').val(resposne.Trans.ReconDate);
                        if (resposne.Trans.ReconDate) {

                            var chte = new Date(resposne.Trans.ReconDate);
                            const fDate = chte.toISOString().substring(0, 10);
                            $('#TxtReconDate').val(fDate);
                        }

                    } else {
                        $('#GrpRecon').text('Not Reconciled');
                        $('#GrpRecon').css("color", 'Red');
                        $('#TxtAmt').val('');
                        $('#TxtReconWorkUser').val('');
                        $('#TxtReconDate').val('');
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
                        // $('#TxtRefNo').val(item.RefNo);
                        // $('#TxtSupplierCode').val(item.SupplierCode);
                        // $('#TxtTotAmount').val(Math.round(item.TotAmount,2));
                        $('#TxtVoucherDate').val(forDate);
                        // $('#TxtDateActYear').val(forDate);
                        // $('#TxtCrCode').val(item.CrActCode);
                        // $('#TxtCrName').val(item.CrActName);
                        // $('#TxtDes').val(item.Des);
                        // $('#TxtDays').val(dayOfWeek);
                        // $('#TxtExpActName').val(item.ExpActName);
                        $('#CmbGodownName').val(item.GodownCode);
                        // $('#CmbGodownName :selected').val(item.GodownCode);
                        // $('#CmbGodownName :selected').text(item.GodownCode);
                        $('#TxtTotDrAmount').val(parseFloat(item.TotDrAmount).toFixed(2));
                        $('#TxtTotCrAmount').val(parseFloat(item.TotCrAmount).toFixed(2));
                        // $('#workuser').text(item.WorkUSer);


                        //         if (item.OKToPay == true) {
                        //     document.getElementById("ChkOkToPay").checked = true;
                        // } else {
                        //     document.getElementById("ChkOkToPay").checked = false;
                        // }


                        let row = table.insertRow();
                        //   row.setAttribute("data-row-id", ids);
                        //   row.setAttribute('id', 'scoperow');

                        let ActCodeCell = row.insertCell(0);
                        ActCodeCell.innerHTML = item.ActCode;


                        let ActName3Cell = row.insertCell(1);
                        ActName3Cell.innerHTML = item.ActName3;

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

                    // tableBody.addEventListener("dblclick", function(e) {
                    //   if (e.target.tagName === "TD") {
                    //     const td = e.target;
                    //     const tr = td.parentNode;
                    //     const tdElements = tr.getElementsByTagName("td");

                    //     // Set the value of the input field to the third td element's inner HTML
                    //     $('#TxtExpActName').val(tdElements[0].innerHTML);
                    //     $('#TxtDescription').val(tdElements[1].innerHTML);
                    //     $('#TxtQuantity').val(tdElements[2].innerHTML);
                    //     $('#TxtRate').val(tdElements[3].innerHTML);
                    //     $('#TxtAmt').val(tdElements[4].innerHTML);
                    //     $('#TxtExpActCode').val(tdElements[5].innerHTML);
                    //     $('#TxtID').val(tdElements[6].innerHTML);

                    //     // Remove the row from the table
                    //     // tableBody.removeChild(tr);
                    //   }
                    // });


                }
            });

        }
        $(document).ready(function() {
                var odate = new Date();
                const today = odate.toISOString().substring(0, 10);
                $('#TxtVoucherDate').val(today);
                $('#TxtDatefrom').val(today);
                $('#TxtDateTo').val(today);
                $('#TxtDueDate').val(today);
                $('#TxtDate').val(today);


            $('#TxtReconDate').val(today);
            $('#TxtVoucherDate').val(today);

            $('.parrent').dblclick(function(e) {
                let AcCode = $(this).data('accode');
                // $('#TxtAccode').val(AcCode).trigger("change");
                let AcName = $(this).data('acname');
                // $('#TxtAcName').val(AcName);
                // var table = document.getElementById('Receiptvocvertablebody');
                // var row = table.insertRow(-1);
                var table = document.getElementById('Receiptvocvertablebody');
                var lastRow = table.rows[table.rows.length - 1];
                var firstCell = lastRow.cells[0];
                // firstCell.innerHTML = "New HTML content";
                firstCell.contentEditable = true;
                firstCell.innerHTML = AcCode
                firstCell.setAttribute('class', 'setact');

                // let ExpActNameCell = row.insertCell(0);


                let DescriptionCell = lastRow.cells[1];
                DescriptionCell.contentEditable = true;
                DescriptionCell.innerHTML = AcName

                let QuantityCell = lastRow.cells[2];
                QuantityCell.contentEditable = true;
                QuantityCell.style.textAlign = 'right';

                let RateCell = lastRow.cells[3];
                RateCell.contentEditable = true;
                RateCell.style.textAlign = 'right';

                let AmountCell = lastRow.cells[4];
                AmountCell.contentEditable = true;

                let ExpActCodeCell = lastRow.cells[5];
                ExpActCodeCell.setAttribute('class', 'setdes');

                ExpActCodeCell.contentEditable = true;
                // alert(AcName);
                $('#chartofaccount').modal('hide');
            });
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
                $('#Receiptvocvertablebody').empty();
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
                AddNew();
            });



        });
    </script>
@stop


@section('content')
