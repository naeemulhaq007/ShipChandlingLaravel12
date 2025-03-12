@extends('layouts.app')



@section('title', 'Stock-Transfer')

@section('content_header')

@stop

@section('content')
    </div>
    <?php echo View::make('partials.sendmail'); ?>
    <?php echo View::make('partials.BarCodePrint'); ?>

    <div class="container-fluid ">

        <div class="col-lg-12">
            <div class="row">

            </div>

            <div class="card mt-3">
                <div style="background-color:#EEE; " class="card-header">
                    <div class="card-tools ">
                        <button type="button" name="headertoggle" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>

                    </div>
                    <div class="row">
                        <h3 class="">Stock Transfer</h3>
                        <label for="" id="LblWorkUser" class="ml-auto text-info mx-1"> WorkUser </label>
                        <a name="firstvoucher" data-voucherno="{{ $firstVoucherNo }}" id="firstvoucher"
                            class="btn btn-secondary mx-1 " role="button"><i class="fa fa-arrow-left"
                                aria-hidden="true"></i></a>
                        <button id="prev-voucher" class="btn btn-info"><i class="fa fa-arrow-circle-left"
                                aria-hidden="true"></i></button>

                        <div class="input-group col-sm-1">

                            <input class="form-control" type="number" id="current-voucher" name="current-voucher"
                                value="" placeholder="Transfer # :">

                        </div>
                        <button id="next-voucher" class="btn btn-info"><i class="fa fa-arrow-circle-right"
                                aria-hidden="true"></i></button>
                        <a name="" id="lastvoucher" data-voucherno="{{ $lastVoucherNo }}"
                            class="btn btn-secondary mx-1" role="button"><i class="fa fa-arrow-right"
                                aria-hidden="true"></i></a>

                        <input type="hidden" id="vouchers" name="vouchers"
                            value="{{ implode(',', $Voucher->pluck('InvoiceNo')->toArray()) }}">

                    </div>

                </div>
                <div class="card-body">
                    <div class="row py-1">

                        <div class="inputbox col-sm-2">
                            <span class="Txtspan" id="">Date</span>
                            <input id='TxtVoucherDate' type="date" value="">
                        </div>

                        <div class="inputbox col-sm-2">
                            <span class="Txtspan" id="">Ref #</span>
                            <input id='TxtRefNo' type="text" class="" value="">
                        </div>

                        <button name="" id="" class="btn btn-info mx-1" role="button"><i
                                class="fab fa-plus text-white"></i> Vendor</button>
                        <button name="" id="" class="btn btn-info mx-1" role="button"><i
                                class="fab fa-plus text-white"></i> Location</button>
                        <button name="" id="" class="btn btn-info mx-1" role="button"><i
                                class="fab fa-plus text-white"></i> Stock Item</button>
                        <button name="" id="" class="btn btn-info mx-1" role="button"><i
                                class="fab fa-plus text-white"></i> Inv Rate</button>






                    </div>


                    <div class="row py-2">
                        <div class="inputbox col-sm-4">
                            <span class="Txtspan" id="">Stock A/c</span>
                            <input readonly type="text" id="TxtStockName" name="TxtStockName">
                        </div>

                        <div class="inputbox col-sm-1">
                            <input type="text" id="TxtStockCode" name="TxtStockCode">
                        </div>
                        <button name="" id="" class="btn btn-info" role="button"> Fill Avg
                            Cost</button>
                    </div>


                    <div class="row py-2">

                        <div class="inputbox col-sm-4">
                            <span class="Txtspan" id="">From Location</span>
                            <input readonly type="text" id="TxtGodownNameFrom" name="TxtGodownNameFrom">
                        </div>

                        <div class="inputbox col-sm-1">
                            <input type="text" id="TxtGodownCodeFrom" name="TxtGodownCodeFrom">
                        </div>

                        <div class="inputbox mt-1">
                            <button {{-- data-toggle="modal" data-target="#chartofaccount" --}} class="btn btn-info" id=""><i
                                    class="fas fa-search    "></i></button>
                        </div>

                        <div class="inputbox col-sm-1">
                            <input type="text" id="TxtStockQtyFrom" name="TxtStockQtyFrom" placeholder="Stock Qty">
                        </div>
                    </div>

                    <div class="row py-1 align-items-center">
                        <div class="inputbox col-sm-4">
                            <span class="Txtspan" id="">To Location &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                            <input readonly type="text" id="TxtGodownNameTo" name="TxtGodownNameTo">
                        </div>

                        <div class="inputbox col-sm-1">
                            <input type="text" id="TxtGodownCodeTo" name="TxtGodownCodeTo">
                        </div>
                        <button class="btn btn-info" id=""><i class="fas fa-search    "></i></button>

                        <div class="inputbox col-sm-1">
                            <input type="text" id="TxtStockQtyTo" name="TxtStockQtyTo" placeholder="Stock Qty">
                        </div>
                    </div>


                    <div class="row py-2">

                        <div class="inputbox col-sm-4">
                            <span class="Txtspan" id="">Vessel</span>
                            <input class="" readonly type="text" id="LblVesselName" name="LblVesselName">
                        </div>
                    </div>

                    <div class="row py-2">

                        <div class="inputbox col-sm-4">
                            <span class="Txtspan" id="">Stock A/c</span>
                            <input readonly type="text" id="TxtStockNameTo" name="TxtStockNameTo">
                        </div>

                        <div class="inputbox col-sm-1">
                            <input type="text" id="TxtStockCodeTo" name="TxtStockCodeTo">
                        </div>


                        <button name="" id="btnBarcode" data-toggle="modal" data-target="#Barcodemodal"
                            class="btn btn-info" role="button"><i class="fas fa-barcode    "></i> Print
                            BarCode</button>
                    </div>






                    <div class="row py-2">
                            <div class="inputbox col-sm-2">
                                <span class="Txtspan" id="">Sale Rate</span>
                                <input class=" " type="text" name="TxtSaleRate" id="TxtSaleRate">
                            </div>

                            <div class="inputbox col-sm-2">
                                <span class="Txtspan" id="">Last Rate</span>
                                <input class="" type="text" name="TxtLastPurRate" id="TxtLastPurRate">
                            </div>

                            <div class="inputbox col-sm-2">
                                 <span class="Txtspan" id="">Avg Rate</span>
                                <input class="" type="text" name="TxtAvgRate" id="TxtAvgRate">
                            </div>

                    </div>
                    <div class="row pt-2">
                    <button name="" id="" class="btn btn-info mx-2" role="button"> Stock Purchased</button>
                    <button name="" id="" class="btn btn-info mx-2" role="button"> Stock Adjustment</button>
                    <button name="" id="" class="btn btn-info mx-2" role="button"><i class="fab fa-plus text-white"></i> Show Stock</button>
</div>




                </div>
            </div>
            <div class="rounded shadow mx-auto small">
                <table class="table table-hover   " id="StockTransfertable">
                    <thead class="bg-info">
                        <tr>
                            <th style="width: 100px">IMA/Item&nbsp;Code</th>
                            <th style="width: 1200px">Item&nbsp;Name</th>
                            <th class="text-right">UOM</th>
                            <th hidden class="text-right">Batch#</th>
                            <th hidden class="text-center">Expiry Date</th>
                            <th hidden class="text-center">ExpDate Bar Code</th>
                            <th class="text-center">Qty</th>
                            <th hidden class="text-center">Bns Qty</th>
                            <th class="text-right">Rate</th>
                            <th hidden class="text-right">Gross Amt</th>
                            <th hidden class="text-right">Disc %</th>
                            <th hidden class="text-right">Disc Amt</th>
                            <th class="text-right">Amount</th>
                            <th hidden class="text-right">TotQty</th>
                            <th hidden class="text-right">Avg Rate</th>
                            <th hidden class="text-right">Inv Rate</th>
                            <th hidden class="text-right">Exp %</th>
                            <th hidden class="text-right">InvAmt</th>
                            <th class="text-center">Department</th>
                            <th hidden class="text-center">DepartmentCode</th>
                            <th hidden class="text-right">Sale Rate</th>
                            <th class="text-center">IMPA</th>
                            <th class="text-center">Item&nbsp;Code</th>
                            <th class="text-right">StockQty</th>
                            <th hidden class="text-right">ID</th>
                        </tr>
                    </thead>
                    <tbody id="StockTransfertablebody">

                    </tbody>
                </table>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="row py-1">


                        <div class="CheckBox1 col-sm-2">

                            <label class="input-group text-info mx-1">
                                <input class=" " type="checkbox" onclick="" name="ChkCompanyHeading" id="ChkCompanyHeading" value=""> Company Heading
                            </label>
                        </div>
<div class="col-sm-4"></div>
                        <div class="inputbox col-sm-1">
                            <span class="Txtspan" id="">Total</span>
                            <input class=" " type="text" name="TxtTotalQty" id="TxtTotalQty">
                        </div>

                        <div class="inputbox col-sm-1">
                            <input class="" type="text" name="TxtTotBonusQty" id="TxtTotBonusQty">
                        </div>

                        <div class="inputbox col-sm-1 ">
                            <input type="text" name="TxtTotalDiscAmt" id="TxtTotalDiscAmt">
                        </div>

                        <div class="inputbox col-sm-1 ">
                            <input type="text" name="TxtTotalAmount" id="TxtTotalAmount">

                        </div>

                        <div class="inputbox col-sm-1 ">
                            <input type="text" name="TxtTotCostAmount" id="TxtTotCostAmount">
                        </div>

                        <div class="inputbox col-sm-1">
                            <span class="Txtspan" id="">Avg Amt</span>

                            <input class=" " type="text" name="TxtAvgAmt" id="TxtAvgAmt">
                        </div>

                        {{-- <div class="form-group col-sm-3 row">
                <input type="text" id="TxtTotInvAmt" name="TxtTotInvAmt" class="form-control col-sm-4 ">
                <input type="text" id="TxtTotBankCharges" name="TxtTotBankCharges" class="form-control col-sm-4 ">
                <input type="text" id="TxtTotAmount" name="TxtTotAmount" class="form-control col-sm-4 ">

            </div> --}}
                    </div>
                    <div class="row py-2">

                        <div class="inputbox col-md-7">
                            <span class="Txtspan" id="">Description</span>
                            <input type="text" name="TxtDescription" id="TxtDescription">
                        </div>

                        <div class="inputbox col-md-2">
                            <span class="Txtspan" id="">Total Expense</span>
                            <input class="" type="text" name="TxtTotalExp" id="TxtTotalExp">
                        </div>

                        <div class="inputbox col-md-2">
                            <span class="Txtspan" id="">Net Amount</span>
                            <input class="" type="text" name="TxtNetAmount" id="TxtNetAmount">
                        </div>
                    </div>
                    <div class="progress progress-striped active">
                        <div class="progress-bar progress-bar-success bg-success" style="width:0%">
                        </div>
                    </div>

                    <div class="row py-2">
                        <div class="mx-auto">
                            {{-- <a name="" id="" class="btn btn-default"  data-toggle="modal" data-target="#sendmail" role="button"><i class="fas fa-envelope text-success"></i> Send</a> --}}
                            <a name="" id="Newinv" class="btn btn-primary" role="button"><i
                                    class="fa fa-plus-square text-white" aria-hidden="true"></i> New</a>
                            <a name="CmdSave" id="CmdSave" class="btn btn-success" role="button"><i
                                    class="fa fa-cloud text-white" aria-hidden="true"></i> Save</a>
                            <a name="" id="CmdDelete" class="btn btn-warning" role="button"> <i
                                    class="fas fa-trash text-dark"></i> Delete</a>
                            <a name="" href="/home" class="btn btn-danger" role="button"><i
                                    class="fas fa-door-open  text-white fa-fw"></i> Exit</a>
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
            /* font-size: 11px; */

        }

        .card-body span {}

        .form-control {
            /* font-size: 11px; */

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
                // $('#TxtAccode').val(AcCode).trigger("change");
                let AcName = $(this).data('acname');
                $('#TxtActCode').val(AcCode);
                $('#TxtActName').val(AcName);
                // alert(AcName);
            });
            $(".progress-bar").animate({
                width: "100%"

            }, 2500);
            setTimeout(function() {
                //   alert('Progress bar complete!');
                $(".progress-bar").hide();
            }, 3000);
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
                }
            });

            nextButton.addEventListener('click', () => {
                if (currentIndex < vouchers.length - 1) {
                    currentIndex++;
                    currentVoucherInput.value = vouchers[currentIndex];
                }
            });

        });
        $(document).ready(function() {
            // dataget();
            // $('#containers').hide();
            var table = $('#StockTransfertable').DataTable({

                scrollY: 350,
                deferRender: true,
                scroller: true,
                paging: false,
                info: false,
                ordering: false,
                // responsive:true,
                searching: false,
                dom: 'Bfrtip',
                buttons: [


                    {
                        text: 'ADD',
                        className: 'btn btn-info ',
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
                        className: 'btn btn-info Delete-row',
                        action: function(e, dt, node, config) {
                            //     var id = $('#deleteButton').attr('data-row-id');
                            //     Rowdeletefunc(table, id);
                            // table.row('.selected').remove().draw(false);
                        },
                        //   init: function(api, node, config) {
                        //     $(node).attr('id', 'deleteButton');
                        //     $(node).attr('data-row-id', '');
                        //   }
                    }, {
                        text: 'Print',
                        className: 'btn btn-info ',
                        action: function(e, dt, node, config) {
                            // Rowaddfunc();
                            $('#ExpenseVoucherReport').modal('show');

                        }
                    },
                ],

            });
            $('#StockTransfertable tbody').on('click', 'tr', function() {
                if ($(this).hasClass('selected')) {
                    $(this).removeClass('selected');
                } else {
                    table.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                }
            });

            // $('.Delete-row').click(function () {
            //     table.row('.selected').remove().draw(false);
            // });

            $(".dt-button").removeClass("dt-button")

            $('#current-voucher').blur(function() {
                dataget();
                // tablecomposer();

            });

            $("#current-voucher").on("keydown", function(event) {
                if (event.which === 13) {
                    dataget();
                    // tablecomposer();

                }
            });

            $('#next-voucher').click(function(e) {
                dataget();
                // tablecomposer();

            });
            $('#prev-voucher').click(function(e) {
                dataget();
                // tablecomposer();

            });
            $('#lastvoucher').click(function(e) {
                var voucherno = document.getElementById("lastvoucher").dataset.voucherno;
                document.getElementById("current-voucher").value = voucherno;
                dataget();
                // tablecomposer();

            });
            $('#firstvoucher').click(function(e) {
                var voucherno = document.getElementById("firstvoucher").dataset.voucherno;
                document.getElementById("current-voucher").value = voucherno;
                dataget();
                // tablecomposer();

            });
            $(document).on('keyup', '.setdes', function(e) {
                let tddes = this.innerHTML;
                var table = document.getElementById('StockTransfertablebody');
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
                        var table = document.getElementById('StockTransfertablebody');
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
                            url: '/serchVenProList',
                            type: 'POST',
                            data: {
                                MItemCode: td,
                                TxtGodownCode: $('#TxtGodownCode').val(),
                            },
                            beforeSend: function() {
                                // Show the overlay and spinner before sending the request
                                $('.overlay').show();
                            },
                            success: function(response) {

                                if (response.results !== null) {
                                    if (response.inv) {
                                        let inv = response.inv;
                                        console.log(inv);
                                        $('#TxtLastPurRate').val(parseFloat(inv).toFixed(2));
                                    }
                                    let item = response.results;
                                    console.log(item);
                                    let ItemCode = item.ItemCode;
                                    let ItemName = item.ItemName;
                                    $('#TxtAvgRate').val(parseFloat(item.AvgRate).toFixed(2));
                                    var table = document.getElementById(
                                        'StockTransfertablebody');
                                    var lastRow = table.rows[table.rows.length - 1];
                                    let itemnamecell = lastRow.cells[1];
                                    itemnamecell.innerHTML = ItemName;
                                    let PUOMcell = lastRow.cells[2];
                                    PUOMcell.innerHTML = item.UOM;
                                    PUOMcell.style.textAlign = 'center';
                                    let TradePricecell = lastRow.cells[4];
                                    TradePricecell.innerHTML = item.OurPrice;
                                    let ItemCodecell = lastRow.cells[6];
                                    ItemCodecell.innerHTML = ItemCode;
                                    ItemCodecell.style.textAlign = 'right';
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

            //         $('#StockTransfertable tbody').on('click', 'tr', function() {
            //     if ($(this).hasClass('selected')) {
            //       $(this).removeClass('selected');
            //       $('#deleteButton').attr('data-row-id', '');
            //     } else {
            //       table.$('tr.selected').removeClass('selected');
            //       $(this).addClass('selected');
            //       var id = $(this).attr('data-row-id');
            //       $('#deleteButton').attr('data-row-id', id);
            //     }
            //   });

            //   function Rowdeletefunc(table, id) {
            //     if (id) {
            //       table.row('[data-row-id="' + id + '"]').remove().draw();
            //       $('#deleteButton').attr('data-row-id', '');
            //     }
            //   }
            function Rowdeletefunc(table, rows) {
                if (rows) {
                    for (var i = 0; i < rows.length; i++) {
                        table.row(rows[i]).remove().draw();
                    }
                    $('#deleteButton').attr('data-row-id', '');
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



                var table = document.getElementById("StockTransfertable");
                // table.innerHTML = ""; // Clear the table

                var row = table.insertRow(-1);
                let ItemCodeCell = row.insertCell(0);
                ItemCodeCell.innerHTML = '';
                ItemCodeCell.contentEditable = true;
                // ItemCodeCell.style.width = '100px';
                ItemCodeCell.setAttribute('class', 'setact');


                let ItemNameCell = row.insertCell(1);
                ItemNameCell.innerHTML = '';
                ItemNameCell.contentEditable = true;
                // ItemNameCell.style.width = '180px';

                let PUOMCell = row.insertCell(2);
                PUOMCell.innerHTML = '';
                PUOMCell.contentEditable = true;
                PUOMCell.style.textAlign = 'center';
                // PUOMCell.style.width = '100px';
                PUOMCell.style.textAlign = 'right';

                // let BatchNoCell = row.insertCell(3);
                // BatchNoCell.innerHTML = '';
                // // BatchNoCell.style.textAlign = 'center';
                // BatchNoCell.contentEditable = true;
                // BatchNoCell.style.width = '100px';

                // let CurrencyCell = row.insertCell(4);
                // // CurrencyCell.style.textAlign = 'center';
                // CurrencyCell.innerHTML ='USD';
                // CurrencyCell.contentEditable = true;
                // CurrencyCell.style.width = '100px';

                // let expiryDateCell = row.insertCell(5);
                // expiryDateCell.innerHTML = '';
                // expiryDateCell.contentEditable = true;
                // expiryDateCell.style.width = '100px';

                // let ExpireBarCodeCell = row.insertCell(6);
                // ExpireBarCodeCell.innerHTML ='';
                // // ExpireBarCodeCell.style.textAlign = 'center';
                // ExpireBarCodeCell.contentEditable = true;
                // ExpireBarCodeCell.style.width = '100px';

                let QuantityCell = row.insertCell(3);
                QuantityCell.innerHTML = '';
                // QuantityCell.style.textAlign = 'center';
                QuantityCell.contentEditable = true;
                // QuantityCell.style.width = '100px';
                QuantityCell.style.textAlign = 'right';

                // let BonusQtyCell = row.insertCell(8);
                // BonusQtyCell.innerHTML = '';
                // // BonusQtyCell.style.textAlign = 'center';
                // BonusQtyCell.contentEditable = true;
                // BonusQtyCell.style.width = '100px';

                let TradePriceCell = row.insertCell(4);
                TradePriceCell.innerHTML = '';
                TradePriceCell.style.textAlign = 'right';
                TradePriceCell.contentEditable = true;
                // TradePriceCell.style.width = '100px';

                // let GrossAmtCell = row.insertCell(10);
                // GrossAmtCell.innerHTML ='';
                // GrossAmtCell.style.textAlign = 'right';
                // GrossAmtCell.contentEditable = true;
                // GrossAmtCell.style.width = '100px';

                // let DiscPerCell = row.insertCell(11);
                // DiscPerCell.innerHTML ='';
                // // DiscPerCell.style.textAlign = 'center';
                // DiscPerCell.style.width = '100px';
                // DiscPerCell.contentEditable = true;
                // //
                // let DiscAmtCell = row.insertCell(12);
                // DiscAmtCell.innerHTML = '';
                // DiscAmtCell.style.textAlign = 'right';
                // DiscAmtCell.style.width = '100px';
                // DiscAmtCell.contentEditable = true;

                let AmountCell = row.insertCell(5);
                AmountCell.innerHTML = '';
                AmountCell.style.textAlign = 'right';
                AmountCell.contentEditable = true;
                // AmountCell.style.width = '100px';

                let itmcodecell = row.insertCell(6);
                itmcodecell.innerHTML = '';
                itmcodecell.style.textAlign = 'right';
                // itmcodecell.style.width = '100px';
                itmcodecell.contentEditable = true;

                // let AvgRateCell = row.insertCell(15);
                // AvgRateCell.innerHTML ='';
                // AvgRateCell.style.textAlign = 'right';
                // AvgRateCell.style.width = '100px';
                // AvgRateCell.contentEditable = true;

                // let InvRateCell = row.insertCell(16);
                // InvRateCell.innerHTML ='';
                // InvRateCell.style.textAlign = 'right';
                // InvRateCell.style.width = '100px';
                // InvRateCell.contentEditable = true;

                // let ExpPerCell = row.insertCell(17);
                // ExpPerCell.innerHTML ='';
                // // ExpPerCell.style.textAlign = 'center';
                // ExpPerCell.style.width = '100px';
                // ExpPerCell.contentEditable = true;

                // let InvAmtCell = row.insertCell(18);
                // InvAmtCell.innerHTML ='';
                // InvAmtCell.style.textAlign = 'right';
                // InvAmtCell.style.width = '100px';
                // InvAmtCell.contentEditable = true;

                // let BarCodeCell = row.insertCell(19);
                // BarCodeCell.innerHTML ='';
                // // BarCodeCell.style.textAlign = 'center';
                // BarCodeCell.style.width = '100px';
                // BarCodeCell.contentEditable = true;

                // let DepartmentNameCell = row.insertCell(20);
                // DepartmentNameCell.innerHTML ='';
                // DepartmentNameCell.contentEditable = true;
                // DepartmentNameCell.style.width = '100px';

                // let DepartmentCodeCell = row.insertCell(21);
                // DepartmentCodeCell.innerHTML ='';
                // DepartmentCodeCell.contentEditable = true;
                // DepartmentCodeCell.style.width = '100px';

                // let SaleRateCell = row.insertCell(22);
                // SaleRateCell.innerHTML ='';
                // SaleRateCell.style.textAlign = 'right';
                // SaleRateCell.contentEditable = true;
                // SaleRateCell.style.width = '100px';

                // let IMPAItemCodeCell = row.insertCell(23);
                // IMPAItemCodeCell.innerHTML ='';
                // IMPAItemCodeCell.contentEditable = true;
                // IMPAItemCodeCell.style.width = '100px';


            };

            function Roweditfunc() {
                alert('edit');

            };

            function tablecomposer() {
                let table = document.getElementById('StockTransfertablebody');
                let rows = table.rows;
                var MTotalBonusQty = 0;
                var MTotalDiscAmt = 0;
                var MtotalAmt = 0;
                var MTotalQty = 0;
                //  datatablearray = [];
                for (let i = 0; i < rows.length; i++) {
                    let cells = rows[i].cells;
                    //   let ActCode = cells[0].innerHTML;
                    //   if (ActCode == '') {
                    //       alert('Please Enter ACT-CODE');
                    // return;
                    //   }
                    //   datatablearray.push({
                    let IMAItemCode = cells[0] ? cells[0].innerHTML : '';
                    let ItemName = cells[1] ? cells[1].innerHTML : '';
                    let PUOM = cells[2] ? cells[2].innerHTML : '';
                    let BatchNo = cells[3] ? cells[3].innerHTML : '';
                    let ExpiryDate = cells[4] ? cells[4].innerHTML : '';
                    let ExpireBarCode = cells[5] ? cells[5].innerHTML : '';
                    let Quantity = cells[6] ? cells[6].innerHTML : '';
                    let BonusQty = cells[7] ? cells[7].innerHTML : '';
                    let TradePrice = cells[8] ? cells[8].innerHTML : '';
                    let GrossAmount = cells[9] ? cells[9].innerHTML : '';
                    let DiscPer = cells[10] ? cells[10].innerHTML : '';
                    let DiscAmt = cells[11] ? cells[11].innerHTML : '';
                    let Amount = cells[12] ? cells[12].innerHTML : '';
                    let TotQty = cells[13] ? cells[13].innerHTML : '';
                    let AvgRate = cells[14] ? cells[14].innerHTML : '';
                    let InvRate = cells[15] ? cells[15].innerHTML : '';
                    let ExpPer = cells[16] ? cells[16].innerHTML : '';
                    let InvAmt = cells[17] ? cells[17].innerHTML : '';
                    let DepartmentName = cells[18] ? cells[18].innerHTML : '';
                    let DepartmentCode = cells[19] ? cells[19].innerHTML : '';
                    let SaleRate = cells[20] ? cells[20].innerHTML : '';
                    let IMPAItemCode = cells[21] ? cells[21].innerHTML : '';
                    let ITemCode = cells[22] ? cells[22].innerHTML : '';
                    let StockQty = cells[23] ? cells[23].innerHTML : '';

                    MTotalQty += parseFloat(Quantity);
                    MTotalBonusQty += parseFloat(BonusQty);
                    MTotalDiscAmt += parseFloat(DiscAmt);
                    cells[12].innerHTML = parseFloat(Quantity * TradePrice).toFixed(2);
                    MtotalAmt += parseFloat(Amount);
                    //   });
                    // console.log(MtotalAmt);
                }
                $('#TxtTotalAmount').val(parseFloat(MtotalAmt).toFixed(2));
                $('#TxtTotalQty').val(parseFloat(MTotalQty).toFixed(2));
                $('#TxtTotBonusQty').val(parseFloat(MTotalBonusQty).toFixed(2));
                $('#TxtTotalDiscAmt').val(parseFloat(MTotalDiscAmt).toFixed(2));
                let TxtTotalAmount = $('#TxtTotalAmount').val();
                $('#TxtNetAmount').val(parseFloat(TxtTotalAmount).toFixed(2));
            }


            // // $(document).ready(function () {
            // function CheckRecon(MReconAmtChange, callback) {
            //     var MVnon =  $('#TxtVoucherNo').val();
            //     var MVnoc = "JV";
            //     tablecomposer();
            //     let table = document.getElementById('StockTransfertablebody');
            //     let rows = table.rows;
            //     var DebitAmounttot = 0;
            //     var CreditAmounttot = 0;
            //      datatablearray = [];
            //         for (let i = 0; i < rows.length; i++) {
            //   let cells = rows[i].cells;
            // //   let ActCode = cells[0].innerHTML;
            // //   if (ActCode == '') {
            // //       alert('Please Enter ACT-CODE');
            // // return;
            // //   }
            //   datatablearray.push({
            //             ActCode : cells[0] ? cells[0].innerHTML : '',
            //             AccountName : cells[1] ? cells[1].innerHTML : '',
            //             DebitAmount : cells[2] ? cells[2].innerHTML : '',
            //             CreditAmount : cells[3] ? cells[3].innerHTML : '',
            //             Currency : cells[4] ? cells[4].innerHTML : '',
            //             Description : cells[5] ? cells[5].innerHTML : '',
            //   });

            //     }
            //     $.ajaxSetup({
            //   headers: {
            //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //   }
            // });

            // $.ajax({
            //   url: '/CheckRecon',
            //   type: 'POST',
            //   data: {
            //     MVnon,MVnoc,datatablearray,
            //   },
            //   success: function(resposne) {
            //     console.log(resposne);
            //     if(resposne.Message == 'ALREADY CONCILED Confirmation'){
            //         var password = prompt("RECONCILED VOUCHER FOUND!!!, Amount has been changed!!!");
            // if (password === "332211") {
            //   if (confirm("Do you want to proceed?")) {
            //     // proceed with action
            //     // alert("Changed Terms.");
            //     MReconAmt = "Y"
            //     // document.getElementById("CmbTerms").value = terms;
            //     callback(MReconAmt);
            //   } else {
            //     alert("Access denied.");
            //     return;
            // }
            // } else {
            //     alert("Incorrect password.");
            //     return;
            // }

            //     }
            //   }
            // });

            // }

            // });
            $('#TxtTotBonusQty').blur(function(e) {
                e.preventDefault();
                tablecomposer()

            });
            $('#TxtTotalQty').blur(function(e) {
                e.preventDefault();
                tablecomposer()

            });

            function CmdInvRate_Click(callback) {
                let MAmount = '';
                let MInvAmt = '';
                let MTotQty = '';
                let MInvRate = '';
                let MPer = '';
                let TxtTotCostAmount = 0;
                let table = document.getElementById('StockTransfertablebody');
                let rows = table.rows;
                for (let i = 0; i < rows.length; i++) {
                    let cells = rows[i].cells;

                    let = IMAItemCode = cells[0] ? cells[0].innerHTML : '';
                    let ItemName = cells[1] ? cells[1].innerHTML : '';
                    let PUOM = cells[2] ? cells[2].innerHTML : '';
                    let BatchNo = cells[3] ? cells[3].innerHTML : '';
                    let ExpiryDate = cells[4] ? cells[4].innerHTML : '';
                    let ExpireBarCode = cells[5] ? cells[5].innerHTML : '';
                    let Quantity = cells[6] ? cells[6].innerHTML : '';
                    let BonusQty = cells[7] ? cells[7].innerHTML : '';
                    let TradePrice = cells[8] ? cells[8].innerHTML : '';
                    let GrossAmount = cells[9] ? cells[9].innerHTML : '';
                    let DiscPer = cells[10] ? cells[10].innerHTML : '';
                    let DiscAmt = cells[11] ? cells[11].innerHTML : '';
                    let MAmount = cells[12] ? cells[12].innerHTML : '';
                    let TotQty = cells[13] ? cells[13].innerHTML : '';
                    let AvgRate = cells[14] ? cells[14].innerHTML : '';
                    let InvRate = cells[15] ? cells[15].innerHTML : '';
                    let ExpPer = cells[16] ? cells[16].innerHTML : '';
                    let InvAmt = cells[17] ? cells[17].innerHTML : '';
                    let DepartmentName = cells[18] ? cells[18].innerHTML : '';
                    let DepartmentCode = cells[19] ? cells[19].innerHTML : '';
                    let SaleRate = cells[20] ? cells[20].innerHTML : '';
                    let IMPAItemCode = cells[21] ? cells[21].innerHTML : '';
                    let ITemCode = cells[22] ? cells[22].innerHTML : '';
                    let StockQty = cells[23] ? cells[23].innerHTML : '';

                    let TxtTotalAmount = $('#TxtTotalAmount').val();
                    let TxtNetAmount = $('#TxtNetAmount').val();

                    MPer = Number(MAmount) / (TxtTotalAmount ? TxtTotalAmount : 1) * 100;
                    cells[16].innerHTML = parseFloat(MPer).toFixed(2);
                    MInvAmt = TxtNetAmount * MPer / 100;
                    MInvAmt = parseFloat(MInvAmt).toFixed(2);
                    cells[17].innerHTML = MInvAmt;
                    MTotQty = TotQty;
                    MInvRate = MInvAmt / (MTotQty ? MTotQty : 1);
                    cells[15].innerHTML = parseFloat(MInvRate).toFixed(2);

                    $('#TxtTotCostAmount').val(MInvAmt);

                }
                callback(TxtTotalAmount);
            }


            $('#CmdSave').click(function(e) {
                tablecomposer()
                let table = document.getElementById('StockTransfertablebody');
                let rows = table.rows;
                datatablearray = [];
                for (let i = 0; i < rows.length; i++) {
                    let cells = rows[i].cells;
                    let barcode = cells[0].innerHTML;
                    if (barcode == '') {
                        alert('Please Enter Itemcode');
                        return;
                    }
                    datatablearray.push({
                        BarCode: cells[0] ? cells[0].innerHTML : '',
                        ItemName: cells[1] ? cells[1].innerHTML : '',
                        PUOM: cells[2] ? cells[2].innerHTML : '',
                        BatchNo: cells[3] ? cells[3].innerHTML : '',
                        ExpiryDate: cells[4] ? cells[4].innerHTML : '',
                        ExpireBarCode: cells[5] ? cells[5].innerHTML : '',
                        Quantity: cells[6] ? cells[6].innerHTML : '',
                        BonusQty: cells[7] ? cells[7].innerHTML : '',
                        TradePrice: cells[8] ? cells[8].innerHTML : '',
                        GrossAmt: cells[9] ? cells[9].innerHTML : '',
                        DiscPer: cells[10] ? cells[10].innerHTML : '',
                        DiscAmt: cells[11] ? cells[11].innerHTML : '',
                        Amount: cells[12] ? cells[12].innerHTML : '',
                        TotQty: cells[13] ? cells[13].innerHTML : '',
                        Avgrate: cells[14] ? cells[14].innerHTML : '',
                        InvRate: cells[15] ? cells[15].innerHTML : '',
                        ExpPer: cells[16] ? cells[16].innerHTML : '',
                        InvAmt: cells[17] ? cells[17].innerHTML : '',
                        DepartmentName: cells[18] ? cells[18].innerHTML : '',
                        DepartmentCode: cells[19] ? cells[19].innerHTML : '',
                        SaleRate: cells[20] ? cells[20].innerHTML : '',
                        IMPAItemCode: cells[21] ? cells[21].innerHTML : '',
                        ItemCode: cells[22] ? cells[22].innerHTML : '',
                        StockQty: cells[23] ? cells[23].innerHTML : '',
                        ID: cells[24] ? cells[23].innerHTML : '',

                    });

                }

                if ($('#TxtGodownCodeFrom').val() == 0 || $('#TxtGodownCodeFrom').val() == '' || $(
                        '#TxtGodownCodeFrom').val() == null) {
                    alert('Location From Not Found !! Please enter Location From Code');
                    $('#TxtGodownCodeFrom').focus();
                    return;
                }

                if ($('#TxtGodownCodeTo').val() == 0 || $('#TxtGodownCodeTo').val() == '' || $(
                        '#TxtGodownCodeTo').val() == null) {
                    alert('Location From Not Found !! Please enter Location From Code');
                    $('#TxtGodownCodeTo').focus();
                    return;
                }
                if ($('#TxtStockCode').val() == 0 || $('#TxtStockCode').val() == '' || $('#TxtStockCode')
                    .val() == null) {
                    alert('Location From Not Found !! Please enter Location From Code');
                    $('#TxtStockCode').focus();
                    return;
                }
                if ($('#TxtStockCodeTo').val() == 0 || $('#TxtStockCodeTo').val() == '' || $(
                        '#TxtStockCodeTo').val() == null) {
                    alert('Location From Not Found !! Please enter Location From Code');
                    $('#TxtStockCodeTo').focus();
                    return;
                }


                // alert();
                CmdInvRate_Click(function() {

                    if ($('#TxtDescription').val() == '') {
                        $('#TxtDescription').val('Stock Transfer From ' + $('#TxtGodownNameFrom')
                            .val() + ' TO ' + $('#TxtGodownNameTo').val());
                    }
                    // console.log('yes');
                    // console.log(TxtTotalAmount);
                    let BackLogDate = '{{ $FixAccountSetup->BackLogDate }}';

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: '/StockTransfersave',
                        type: 'POST',
                        data: {
                            TxtVoucherNo: $('#current-voucher').val(),
                            TxtNetAmount: $('#TxtNetAmount').val(),
                            TxtGodownCodeFrom: $('#TxtGodownCodeFrom').val(),
                            TxtGodownNameFrom: $('#TxtGodownNameFrom').val(),
                            TxtGodownCodeTo: $('#TxtGodownCodeTo').val(),
                            TxtGodownNameTo: $('#TxtGodownNameTo').val(),
                            TxtStockCodeTo: $('#TxtStockCodeTo').val(),
                            TxtStockCode: $('#TxtStockCode').val(),
                            TxtDescription: $('#TxtDescription').val(),
                            TxtTotalAmount: $('#TxtTotalAmount').val(),
                            TxtTotalQty: $('#TxtTotalQty').val(),
                            TxtTotBonusQty: $('#TxtTotBonusQty').val(),
                            TxtTotalDiscAmt: $('#TxtTotalDiscAmt').val(),
                            TxtTotalExp: $('#TxtTotalExp').val(),
                            LblWorkUser: $('#LblWorkUser').text(),
                            TxtDate: $('#TxtVoucherDate').val(),
                            TxtRefNo: $('#TxtRefNo').val(),
                            table: datatablearray,
                            BackLogDate: BackLogDate,
                        },
                        beforeSend: function() {
                            // Show the overlay and spinner before sending the request
                            $('.overlay').show();
                        },
                        success: function(response) {
                            // if (data.success == true) {
                            // alert('saved');
                            // alert(response.MAvgAmt);
                            console.log(response);
                            $('#TxtAvgAmt').val(response.MAvgAmt);
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

            });


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
            var totalvouchers = '{{ $lastVoucherNo }}';
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
            let BillNo = $('#current-voucher').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '/searchStockTransfer',
                type: 'POST',
                data: {
                    BillNo,
                    // pono: $('#TxtClientOrder').val(),
                },
                success: function(resposne) {
                    document.getElementById("firstvoucher").dataset.voucherno = resposne.firstVoucherNo;
                    document.getElementById("lastvoucher").dataset.voucherno = resposne.lastVoucherNo;
                    console.log(resposne);
                    let data = resposne.results;
                    let Master = resposne.Master;
                    let GodownSetup = resposne.GodownSetup;
                    let GodownSetupto = resposne.GodownSetupto;
                    if (Master !== null) {
                        var chekdate = new Date(Master.Date);
                        // var ExpiryDate = new Date(Master.DueDate);
                        const forDate = chekdate.toISOString().substring(0, 10);
                        // const dueDate = ExpiryDate.toISOString().substring(0, 10);
                        $('#TxtRefNo').val(Master.RefNo);
                        $('#TxtGodownCodeFrom').val(Master.ActCode);
                        $('#TxtGodownNameFrom').val(Master.ActName);
                        $('#TxtGodownCodeTo').val(Master.GodownCode);
                        $('#TxtGodownNameTo').val(Master.GodownName);
                        $('#LblWorkUser').text(Master.WorkUser);
                        $('#TxtTotalExp').val(parseFloat(Master.TotalExpense).toFixed(2));
                        $('#TxtVoucherDate').val(forDate);
                        $('#TxtDescription').val(Master.Description);
                        $('#TxtStockCode').val(GodownSetup.StockCode);
                        $('#TxtStockName').val(GodownSetup.StockName);
                        $('#TxtStockCodeTo').val(GodownSetupto.StockCode);
                        $('#TxtStockNameTo').val(GodownSetupto.StockName);



                    }


                    //   console.log(Master);
                    let table = document.getElementById('StockTransfertablebody');
                    table.innerHTML = ""; // Clear the table
                    var ids = 0;

                    data.forEach(function(item) {
                        ids = ids + 1;


                        let row = table.insertRow();
                        row.setAttribute("data-row-id", ids);
                        row.setAttribute('id', 'scoperow');

                        let IMAItemCodeCell = row.insertCell(0);
                        IMAItemCodeCell.innerHTML = item.BarCode;
                        IMAItemCodeCell.style.width = '100px';


                        let ItemNameCell = row.insertCell(1);
                        ItemNameCell.innerHTML = item.ItemName;

                        let PUOMCell = row.insertCell(2);
                        PUOMCell.innerHTML = item.UOM;
                        PUOMCell.style.textAlign = 'center';

                        let BatchNoCell = row.insertCell(3);
                        BatchNoCell.innerHTML = item.BatchNo ? item.BatchNo : '';
                        BatchNoCell.style.textAlign = 'right';
                        BatchNoCell.hidden = true;

                        let ExpiryDateCell = row.insertCell(4);
                        ExpiryDateCell.innerHTML = item.ExpiryDate ? item.ExpiryDate : '';
                        ExpiryDateCell.style.textAlign = 'right';
                        ExpiryDateCell.hidden = true;

                        let ExpireBarCodeCell = row.insertCell(5);
                        ExpireBarCodeCell.innerHTML = item.ExpireBarCode ? item.ExpireBarCode : '';
                        ExpireBarCodeCell.style.textAlign = 'right';
                        ExpireBarCodeCell.hidden = true;

                        let QuantityCell = row.insertCell(6);
                        QuantityCell.innerHTML = item.Quantity ? item.Quantity : '';
                        QuantityCell.style.textAlign = 'right';
                        // QuantityCell.hidden = true;

                        let BonusQtyCell = row.insertCell(7);
                        BonusQtyCell.innerHTML = item.BonusQty ? item.BonusQty : '';
                        BonusQtyCell.style.textAlign = 'right';
                        BonusQtyCell.hidden = true;

                        let TradePriceCell = row.insertCell(8);
                        TradePriceCell.innerHTML = item.TradePrice ? parseFloat(item.TradePrice)
                            .toFixed(2) : '';
                        TradePriceCell.style.textAlign = 'right';

                        let GrossAmountCell = row.insertCell(9);
                        GrossAmountCell.innerHTML = item.GrossAmount ? parseFloat(item.GrossAmount)
                            .toFixed(2) : '';
                        GrossAmountCell.style.textAlign = 'right';
                        GrossAmountCell.hidden = true;

                        let DiscPerCell = row.insertCell(10);
                        DiscPerCell.innerHTML = item.DiscPer ? item.DiscPer : '';
                        DiscPerCell.style.textAlign = 'right';
                        DiscPerCell.hidden = true;

                        let DiscAmtCell = row.insertCell(11);
                        DiscAmtCell.innerHTML = item.DiscAmt ? item.DiscAmt : '';
                        DiscAmtCell.style.textAlign = 'right';
                        DiscAmtCell.hidden = true;

                        let AmountCell = row.insertCell(12);
                        AmountCell.innerHTML = item.TotalAmt ? parseFloat(item.TotalAmt).toFixed(2) :
                            '';
                        AmountCell.style.textAlign = 'right';

                        let TotQtyCell = row.insertCell(13);
                        TotQtyCell.innerHTML = item.TotQty ? item.TotQty : '';
                        TotQtyCell.style.textAlign = 'right';
                        TotQtyCell.hidden = true;

                        let AvgRateCell = row.insertCell(14);
                        AvgRateCell.innerHTML = item.AvgRate ? parseFloat(item.AvgRate).toFixed(2) : '';
                        AvgRateCell.style.textAlign = 'right';
                        AvgRateCell.hidden = true;

                        let InvRateCell = row.insertCell(15);
                        InvRateCell.innerHTML = item.InvRate ? parseFloat(item.InvRate).toFixed(2) : '';
                        InvRateCell.style.textAlign = 'right';
                        InvRateCell.hidden = true;

                        let ExpPerCell = row.insertCell(16);
                        ExpPerCell.innerHTML = item.ExpPer ? item.ExpPer : '';
                        ExpPerCell.style.textAlign = 'right';
                        ExpPerCell.hidden = true;

                        let InvAmtCell = row.insertCell(17);
                        InvAmtCell.innerHTML = item.InvAmt ? parseFloat(item.InvAmt).toFixed(2) : '';
                        InvAmtCell.style.textAlign = 'right';
                        InvAmtCell.hidden = true;

                        let DepartmentNameCell = row.insertCell(18);
                        DepartmentNameCell.innerHTML = item.DepartmentName ? item.DepartmentName : '';
                        DepartmentNameCell.style.textAlign = 'center';

                        let DepartmentCodeCell = row.insertCell(19);
                        DepartmentCodeCell.innerHTML = item.DepartmentCode ? item.DepartmentCode : '';
                        DepartmentCodeCell.style.textAlign = 'center';
                        DepartmentCodeCell.hidden = true;

                        let SaleRateCell = row.insertCell(20);
                        SaleRateCell.innerHTML = item.SaleRate ? parseFloat(item.SaleRate).toFixed(2) :
                            '';
                        SaleRateCell.style.textAlign = 'right';
                        SaleRateCell.hidden = true;

                        let IMPAItemCodeCell = row.insertCell(21);
                        IMPAItemCodeCell.innerHTML = item.IMPAItemCode ? item.IMPAItemCode : '';
                        IMPAItemCodeCell.style.textAlign = 'center';
                        // IMPAItemCodeCell.hidden = true;

                        let ITemCodeCell = row.insertCell(22);
                        ITemCodeCell.innerHTML = item.ItemCode ? item.ItemCode : '';
                        ITemCodeCell.style.textAlign = 'center';

                        let StockQtyCell = row.insertCell(23);
                        StockQtyCell.innerHTML = item.StockQty ? item.StockQty : '';
                        StockQtyCell.style.textAlign = 'right';

                        let IdCell = row.insertCell(24);
                        IdCell.innerHTML = item.Id ? item.Id : '';
                        IdCell.hidden = true;




                    });


                    $('#TxtTotalQty').blur();

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
                let table = document.getElementById('StockTransfertablebody');
                table.innerHTML = "";
                $('#TxtVoucherDate').val('');
                $('#TxtRefNo').val('');
                $('#TxtGodownCodeFrom').val('');
                $('#TxtGodownNameFrom').val('');
                $('#TxtStockQtyFrom').val('');
                $('#TxtGodownCodeTo').val('');
                $('#TxtGodownNameTo').val('');
                $('#LblVesselName').val('');
                $('#TxtStockCode').val('');
                $('#TxtStockName').val('');
                $('#TxtStockCodeTo').val('');
                $('#TxtStockNameTo').val('');
                $('#TxtSaleRate').val('');
                $('#TxtLastPurRate').val('');
                $('#TxtAvgRate').val('');
                $('#TxtDescription').val('');
                $('#TxtTotalQty').val('');
                $('#TxtTotBonusQty').val('');
                $('#TxtTotalDiscAmt').val('');
                $('#TxtTotalAmount').val('');
                $('#TxtTotCostAmount').val('');
                $('#TxtAvgAmt').val('');
                $('#TxtTotalExp').val('');
                $('#TxtNetAmount').val('');
                $('#LblWorkUser').text('WorkUser');
            });

            $('#CmdDelete').click(function(e) {
                e.preventDefault();
                var password = prompt("Delete Confirmation !! Do you want to Delete the Record!!!");
                if (password === "332211") {
                    if (confirm("Do you want to proceed?")) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        $.ajax({
                            url: '/stpuordelete',
                            type: 'POST',
                            data: {
                                TxtVoucherNo: $('#current-voucher').val(),
                            },
                            beforeSend: function() {
                                // Show the overlay and spinner before sending the request
                                $('.overlay').show();
                            },
                            success: function(data) {
                                console.log(data);
                                if (data.status == 'deleted') {
                                    alert(data.status);
                                    // Reload the page
                                    location.reload();

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

                    } else {
                        alert("Access denied.");
                        return;
                    }
                } else {
                    alert("Incorrect password.");
                    return;
                }



            });


            $('#btnBarcode').click(function(e) {
                e.preventDefault();
                let invoiceno = $('#current-voucher').val();
                $('#barcodeinv').val(invoiceno);
                $('#barcodeinv').blur();
            });


        });
    </script>
@stop


@section('content')
