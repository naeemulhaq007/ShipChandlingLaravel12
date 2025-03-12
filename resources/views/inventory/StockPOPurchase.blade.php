@extends('layouts.app')



@section('title', 'Stock-PO-Purchased')

@section('content_header')

@stop

@section('content')
    </div>
    <?php echo View::make('partials.sendmail'); ?>

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
                        {{-- <div class=" row">


        </div> --}}

                    </div>
                    <div class="row">
                        <h3 class="">Stock PO Purchased</h3>
                        {{-- <form class="ml-auto" id="pdform" action="{{ route('storePDF') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" id="file-input" name="pdf_file" accept="application/pdf">
                        <button id="savepdf" class="btn btn-default " type="submit"><i style="font-size: 21px" class="fas fa-file-pdf text-info"></i></button>
                    </form> --}}
                        <form class="ml-auto" id="pdform" action="{{ route('storePDF') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            {{-- <input type="file" id="file-input" name="pdf_file" accept="application/pdf"> --}}
                            <label for="file-input" class="custom-file-upload mx-2">
                                <i class="fas fa-cloud-upload-alt"></i> Choose PDF File
                            </label>
                            <input id="file-input" type="file" name="pdf_file" accept="application/pdf"
                                style="display:none;">
                            <button id="savepdf" class="btn btn-default " type="submit"><i style="font-size: 21px"
                                    class="fas fa-file-pdf text-info"></i></button>
                        </form>

                        {{-- <button id="viewpdf" class="btn btn-default mr-1 " type="button" ></button> --}}
                        {{-- <button id="storepdf" class="btn btn-default mr-1" type="button"><i style="font-size: 21px" class="fas fa-save text-info   "></i></button> --}}
                        <a name="" id="pdf" class="btn btn-default mr-1" role="button"><i
                                style="font-size: 21px" class="fas fa-file-pdf text-danger   "></i></a>

                        <a name="firstvoucher" data-voucherno="{{ $firstVoucherNo }}" id="firstvoucher"
                            class="btn btn-secondary mx-1 " role="button"><i class="fa fa-arrow-left"
                                aria-hidden="true"></i></a>
                        <button id="prev-voucher" class="btn btn-info"><i class="fa fa-arrow-circle-left"
                                aria-hidden="true"></i></button>

                        <div class="input-group col-sm-1">

                            <input class="form-control" type="number" id="current-voucher" name="current-voucher"
                                value="">

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
                            <input id='TxtVoucherDate' type="date" class="" value="">
                        </div>


                        <div class="inputbox col-sm-2">
                            <span class="Txtspan" id="">PO #</span>
                            <input class="" type="text" name="TxtPONo" id="TxtPONo">
                        </div>


                        <div class="inputbox col-sm-2">
                            <span class="Txtspan" id="">Terms</span>
                            <select class="" id="TxtTerms" name="TxtTerms">
                                <option value="1">N 15 Days</option>
                                <option value="2">N 30 Days</option>
                                <option value="3">N 45 Days</option>
                                <option value="4">N 60 Days</option>
                                <option value="5">N 90 Days</option>
                                <option value="6">CASH</option>
                                <option value="7">CREDIT CARD</option>
                            </select>
                        </div>


                        <div class="inputbox col-sm-2">
                            <span class="Txtspan" id="">Due Date</span>
                            <input id='TxtDueDate' type="date" class="" value="">
                        </div>


                        <div class="inputbox col-sm-2">
                            <span class="Txtspan" id="">Vendor Bill #</span>
                            <input id='TxtRefNo' type="text" class="" value="">
                        </div>

                        <button name="" id="" class="btn btn-info" role="button"><i
                                class="fab fa-plus text-white"></i> Show Stock</button>

                    </div>


                    <div class="row py-2">

                        <div class="inputbox col-sm-5">
                            <span class="Txtspan " id="">Supplier</span>
                            <input type="text" id="TxtActName" name="TxtActName">
                        </div>
                        <button data-toggle="modal" data-target="#chartofaccount" class="btn btn-info" id=""><i
                                class="fas fa-search    "></i></button>

                        <div class="inputbox col-sm-1">
                            <input readonly type="text" id="TxtActCode" name="TxtActCode">
                        </div>

                        <div class="CheckBox1">

                            <label class="input-group text-info mx-2 mt-2">
                                <input type="checkbox" onclick="" name="ChkNoCost" id="ChkNoCost" value="">
                                NO COST Vendor
                            </label>
                        </div>

                        <div class="CheckBox1">
                            <label class="input-group text-info mx-2 mt-2">
                                <input type="checkbox" onclick="" name="ChkAllowZeroRatedStock"
                                    id="ChkAllowZeroRatedStock" value=""> Allow 0 Rated Stock
                            </label>
                        </div>
                    </div>


                    <div class="row py-2">

                        <div class="inputbox col-sm-5">
                            <span class="Txtspan" id="">Location </span>
                            <select id="CmbGodownName" name="CmbGodownName">
                                @foreach ($GodownSetup as $Godown)
                                    <option value="{{ $Godown->GodownCode }}">{{ $Godown->GodownName }}</option>
                                @endforeach
                            </select>

                        </div>
                        <button class="btn btn-info" id=""><i class="fas fa-search    "></i></button>

                        <div class="inputbox col-sm-1">
                            <input readonly type="text" id="TxtGodownCode" name="TxtGodownCode">
                        </div>

                        <button name="" id="" class="btn btn-info mx-1" role="button"><i
                                class="fab fa-plus text-white"></i> Vendor</button>
                        <button name="" id="" class="btn btn-info mx-1" role="button"><i
                                class="fab fa-plus text-white"></i> Location</button>
                        <button name="" id="" class="btn btn-info mx-1" role="button"><i
                                class="fab fa-plus text-white"></i> Stock Item</button>

                    </div>


                    <div class="row py-2">

                        <div class="inputbox col-sm-5">
                            <span class="Txtspan " id="">Stock A/c</span>
                            <input type="text" id="TxtStockName" name="TxtStockName">
                        </div>

                        <div class="inputbox col-sm-1">
                            <input readonly type="text" id="TxtStockCode" name="TxtStockCode">
                        </div>

                    </div>



                    <div class="row  py-1 align-items-center">

                        <div class="inputbox mt-3 col-sm-1">
                            <span class="Txtspan">Sale Rate</span>
                            <input class=" " type="text" name="TxtSaleRate" id="TxtSaleRate">
                        </div>

                        <div class="inputbox mt-3 col-sm-1">
                            <span class="Txtspan">Last Rate</span>
                            <input class=" " type="text" name="TxtLastPurRate" id="TxtLastPurRate">
                        </div>

                        <div class="inputbox mt-3 col-sm-1">
                            <span class="Txtspan">Avg Rate</span>
                            <input class="" type="text" name="TxtAvgRate" id="TxtAvgRate">
                        </div>

                        <div class="inputbox mt-3 col-sm-1">
                            <span class="Txtspan">Stock Rate</span>
                            <input class="" type="text" name="TxtStockQty" id="TxtStockQty">
                        </div>

                        <div class="inputbox mt-3 col-sm-2">
                            <span class="Txtspan">Vender</span>
                            <select class="" id="CmbVenderName" name="CmbVenderName">
                                <option value="756">Stock</option>
                            </select>
                        </div>

                        <button name="" id="" class="btn btn-info mt-3" role="button"><i
                                class="fab fa-plus text-white"></i> Fill</button>
                        <div class="inputbox mt-3 col-sm-1">
                            <span class="Txtspan">Inv #</span>
                            <input class="" type="text" name="TxtPOInvNo" id="TxtPOInvNo">
                        </div>
                        <button name="" id="" class="btn btn-info mt-3" role="button"><i
                                class="fab fa-plus text-white"></i> Fill Reorder Qty</button>

                    </div>



                </div>
            </div>
            <div class="rounded shadow mx-auto small">
                <table class="table table-hover   " id="StockPurchasetable">
                    <thead class="">
                        <tr>
                            <th style="width: 100px">IMA/Item Code</th>
                            <th style="width: 1200px">Item&nbsp;Name</th>
                            <th class="text-right">PUOM</th>
                            {{-- <th class="px-5" >BatchNo</th> --}}
                            {{-- <th class="px-5" >Currency</th> --}}
                            {{-- <th class="px-5" >ExpiryDate</th> --}}
                            {{-- <th class="px-5" >ExpireBarCode</th> --}}
                            <th class="text-right">Quantity</th>
                            {{-- <th class="px-5" >BonusQty</th> --}}
                            <th class="text-right">Price</th>
                            {{-- <th class="text-right">GrossAmt</th>
            <th class="px-5">DiscPer</th>
            <th class="text-right">DiscAmt</th> --}}
                            <th class="text-right">Amount</th>
                            <th class="text-right">Item Code</th>
                            {{-- <th class="px-5">TotQty</th>
            <th class="px-5">AvgRate</th>
            <th class="px-5">InvRate</th>
            <th class="px-5">ExpPer</th>
            <th class="text-right">InvAmt</th>
            <th class="px-5">BarCode</th>
            <th class="px-5">DepartmentName</th>
            <th class="px-5">DepartmentCode</th>
            <th class="text-right">SaleRate</th>
            <th class="px-5">IMPAItemCode</th> --}}
                        </tr>
                    </thead>
                    <tbody id="StockPurchasetablebody">

                    </tbody>
                </table>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="row py-1">


                        <div class="CheckBox1">
                            <label class="input-group text-info mx-2">
                                <input type="checkbox" onclick="" name="ChkCompanyHeading" id="ChkCompanyHeading"
                                    checked value=""> Company Heading
                            </label>
                        </div>

                        <div class="CheckBox1">
                            <label class="input-group text-info mx-1">
                                <input type="checkbox" onclick="" name="ChkAdvancePayment" id="ChkAdvancePayment"
                                    value=""> Advance Payment
                            </label>
                        </div>

                        <div class="CheckBox1">
                            <label class="input-group text-info mx-2">
                                <input type="checkbox" onclick="" name="ChkReceivedCompleted"
                                    id="ChkReceivedCompleted" value=""> Received Complete
                            </label>
                        </div>

                        <div class="CheckBox1">
                            <label class="input-group text-info mx-2">
                                <input type="checkbox" onclick="" name="ChkOkToPay" id="ChkOkToPay" value="">
                                OK To PAY
                            </label>
                        </div>

                        <div class="col-sm-2"></div>


                        <div class="inputbox col-sm-1">
                            <span class="Txtspan" id="">Total</span>
                            <input class="" type="text" name="TxtTotOrderQty" id="TxtTotOrderQty">
                        </div>

                        <div class="inputbox col-sm-1">
                            <input class="" type="text" name="TxtTotRecQty" id="TxtTotRecQty">
                        </div>

                        <div class="inputbox col-sm-1">
                            <input class="" type="text" name="TxtTotBalQty" id="TxtTotBalQty">
                        </div>

                        <div class="inputbox col-sm-2 ml-1">
                            <div class="row">

                                <input type="text" id="TxtTotalDiscAmt" name="TxtTotalDiscAmt" class="col-sm-4">
                                <input type="text" id="TxtTotalAmount" name="TxtTotalAmount" class="col-sm-4 ">
                                <input type="text" id="TxtTotCostAmountNew" name="TxtTotCostAmountNew"
                                    class="col-sm-4 ">
                            </div>

                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="inputbox col-md-6">
                            <span class="Txtspan" id="">Description</span>
                            <input class="" type="text" name="TxtDescription" id="TxtDescription">
                        </div>
                        <div class="inputbox col-md-2">
                            <span class="Txtspan" id="">Total Expense</span>
                            <input class="" type="text" name="TxtTotalExp" id="TxtTotalExp">
                        </div>
                        <div class="inputbox col-md-2">
                            <span class="Txtspan" id="">Net Amount</span>
                            <input class="" type="text" name="TxtNetAmount" id="TxtNetAmount">
                        </div>
                        <div class="inputbox col-md-1">
                            <input class="" type="text" name="TxtNetAmountTot" id="TxtNetAmountTot">
                        </div>
                        <button name="" id="" class="btn btn-success" role="button"><i
                                class="fab fa-plus text-white"></i> Update Cost</button>

                    </div>
                    {{-- <div class="row py-1"> --}}


                    {{-- </div> --}}
                    <div class="row py-1">

                        <div class="inputbox col-sm-3 ">
                            <span class="Txtspan" id="">LINK</span>
                            <input class="" type="text" name="TxtLink" id="TxtLink">
                        </div>

                        <div class="inputbox col-sm-2">
                            <span class="Txtspan" id="">PV#</span>
                            <input class="" type="text" name="TxtPVNo" id="TxtPVNo">
                        </div>

                        <div class="inputbox col-sm-2">
                            <span class="Txtspan " id="vendorpaymentbtn">PV</span>
                            <input class="" type="date" name="TxtPVDate" id="TxtPVDate">
                        </div>

                        <div class="inputbox col-md-2">
                            <span class="Txtspan" id="">Paid Amt</span>
                            <input class="" type="text" name="TxtPaidAmt" id="TxtPaidAmt">
                        </div>
                    </div>
                    <div class="progress progress-striped active">
                        <div class="progress-bar progress-bar-success bg-success" style="width:0%">
                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="mx-auto">
                            <a name="" id="" class="btn btn-success" data-toggle="modal"
                                data-target="#sendmail" role="button"><i class="fas fa-envelope text-white"></i>
                                Send</a>
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
        .pointer-cursor {
            cursor: pointer;
        }

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
            const element = document.getElementById('vendorpaymentbtn');
            element.addEventListener('mouseover', function() {
                element.classList.add('pointer-cursor');
            });

            /* Remove the class when the cursor moves away from the element */
            element.addEventListener('mouseout', function() {
                element.classList.remove('pointer-cursor');
            });
            //     document.getElementById('pdform').addEventListener('submit', function(e) {
            //     var fileInput = document.getElementById('file-input');
            //     if (!fileInput.value) {
            //         e.preventDefault(); // prevent form submission
            //         alert('Please select a file.');
            //     }
            // });
            var fileInput = document.getElementById('file-input');
            var customFileUpload = document.querySelector('.custom-file-upload');

            // customFileUpload.addEventListener('click', function() {
            //     fileInput.click();
            // });

            fileInput.addEventListener('change', function() {
                var fileName = fileInput.value;
                if (fileName) {
                    customFileUpload.innerHTML = fileName;
                } else {
                    customFileUpload.innerHTML = '<i class="fas fa-cloud-upload-alt"></i> Choose PDF File';
                }
            });



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
                $(".progress").hide();
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
            var table = $('#StockPurchasetable').DataTable({

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
            $('#StockPurchasetable tbody').on('click', 'tr', function() {
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
                tablecomposer();

            });

            $("#current-voucher").on("keydown", function(event) {
                if (event.which === 13) {
                    dataget();
                    tablecomposer();

                }
            });

            $('#next-voucher').click(function(e) {
                dataget();
                tablecomposer();

            });
            $('#prev-voucher').click(function(e) {
                dataget();
                tablecomposer();

            });
            $('#lastvoucher').click(function(e) {
                var voucherno = document.getElementById("lastvoucher").dataset.voucherno;
                document.getElementById("current-voucher").value = voucherno;
                dataget();
                tablecomposer();

            });
            $('#firstvoucher').click(function(e) {
                var voucherno = document.getElementById("firstvoucher").dataset.voucherno;
                document.getElementById("current-voucher").value = voucherno;
                dataget();
                tablecomposer();

            });
            $(document).on('keyup', '.setdes', function(e) {
                let tddes = this.innerHTML;
                var table = document.getElementById('StockPurchasetablebody');
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
                        var table = document.getElementById('StockPurchasetablebody');
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
                                        'StockPurchasetablebody');
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

            //         $('#StockPurchasetable tbody').on('click', 'tr', function() {
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



                var table = document.getElementById("StockPurchasetable");
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
                let table = document.getElementById('StockPurchasetablebody');
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
                    let barcode = cells[0] ? cells[0].innerHTML : '';
                    let itemname = cells[1] ? cells[1].innerHTML : '';
                    let PUOM = cells[2] ? cells[2].innerHTML : '';
                    let Quantity = cells[3] ? cells[3].innerHTML : '';
                    let Price = cells[4] ? cells[4].innerHTML : '';
                    let Amount = cells[5] ? cells[5].innerHTML : '';
                    let itemcode = cells[6] ? cells[6].innerHTML : '';
                    MtotalAmt += Number(Amount);
                    MTotalQty += Number(Quantity);
                    //   });

                }
                $('#TxtTotalAmount').val(MtotalAmt);
                $('#TxtTotalQty').val(MTotalQty);
                let TxtTotalExp = $('#TxtTotalExp').val();
                $('#TxtNetAmount').val(MtotalAmt + TxtTotalExp);
            }


            // // $(document).ready(function () {
            // function CheckRecon(MReconAmtChange, callback) {
            //     var MVnon =  $('#TxtVoucherNo').val();
            //     var MVnoc = "JV";
            //     tablecomposer();
            //     let table = document.getElementById('StockPurchasetablebody');
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
                let table = document.getElementById('StockPurchasetablebody');
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
                        ActCode: cells[0] ? cells[0].innerHTML : '',
                        AccountName: cells[1] ? cells[1].innerHTML : '',
                        DebitAmount: cells[2] ? cells[2].innerHTML : '',
                        CreditAmount: cells[3] ? cells[3].innerHTML : '',
                        Currency: cells[4] ? cells[4].innerHTML : '',
                        Description: cells[5] ? cells[5].innerHTML : '',

                    });

                }

                // let TxtTotDrAmount = $('#TxtTotDrAmount').val();
                // let TxtTotCrAmount = $('#TxtTotCrAmount').val();
                // let GrpRecon = $('#GrpRecon').text();
                // $('ChkNoCost').checked(true);
                if ($("#ChkNoCost").is(":checked")) {
                    alert('This is NO COST Vendor You Can Not Enter Any Amount In This PO')
                    return;
                }
                // if(TxtTotDrAmount !== TxtTotCrAmount){
                //     alert('Amount Not Match /n The Debit Amount not equal to Credit Amount');
                //     return;
                // }

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
                                TxtVoucherNo: $('#TxtVoucherNo').val(),
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
                url: '/searchStockPOPurchased',
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
                    let PaymentVoucher = resposne.PaymentVoucher;
                    if (Master !== null) {
                        var chekdate = new Date(Master.Date);
                        var ExpiryDate = new Date(Master.DueDate);
                        const dueDate = ExpiryDate.toISOString().substring(0, 10);
                        const forDate = chekdate.toISOString().substring(0, 10);
                        $('#TxtRefNo').val(Master.RefNo);
                        $('#TxtActCode').val(Master.ActCode);
                        $('#TxtActName').val(Master.ActName);
                        $('#TxtTotalExp').val(Math.round(Master.TotalExpense, 2));
                        $('#TxtVoucherDate').val(forDate);
                        $('#TxtDueDate').val(dueDate);
                        $('#TxtDescription').val(Master.Description);
                        $('#CmbGodownName').val(Master.GodownCode);
                        $('#TxtGodownCode').val(Master.GodownCode);
                        $('#TxtPONo').val(Master.PONO);
                        $('#TxtLink').val(Master.LINK);
                        var customFileUpload = document.querySelector('.custom-file-upload');
                        if (Master.PDFPath) {
                            customFileUpload.innerHTML = Master.PDFPath;

                        } else {
                            customFileUpload.innerHTML =
                                '<i class="fas fa-cloud-upload-alt"></i> Choose PDF File';

                        }

                        // $('#TxtLink').val(Master.PDFPath);
                        if (Master.OkToPay == true) {
                            $('#ChkOkToPay').prop('checked', true);

                        } else {
                            $('#ChkOkToPay').prop('checked', false);

                        }
                        if (Master.ChkAllowZeroRatedStock == 'Y') {
                            $('#ChkAdvancePayment').prop('checked', true);

                        } else {
                            $('#ChkAdvancePayment').prop('checked', false);

                        }
                        if (Master.ChkReceivedCompleted == true) {
                            $('#ChkReceivedCompleted').prop('checked', true);

                        } else {
                            $('#ChkReceivedCompleted').prop('checked', false);

                        }

                        //     if($("#ChkOkToPay").is(":checked")){
                        //     alert('This is NO COST Vendor You Can Not Enter Any Amount In This PO')
                        //     return;
                        // }
                        if (Master.ChkAdvancePayment == true) {
                            document.getElementById("ChkAdvancePayment").checked = true;
                        } else {
                            document.getElementById("ChkAdvancePayment").checked = false;
                        }
                    }

                    if (PaymentVoucher !== null) {
                        var pvnodate = new Date(PaymentVoucher.VoucherDate);
                        const pdate = pvnodate.toISOString().substring(0, 10);
                        let MVoucherDAte = '';
                        if ($('#TxtPVNo').val() == null || $('#TxtPVNo').val() == '') {
                            // alert(PaymentVoucher.VoucherNo);
                            // console.log(PaymentVoucher);
                            $('#TxtPVNo').val(PaymentVoucher.VoucherNo)
                            MVoucherDAte = pdate;
                        } else {
                            $('#TxtPVNo').val($('#TxtPVNo').val() + ',' + PaymentVoucher.VoucherNo)
                            MVoucherDAte = MVoucherDAte + ',' + pdate;

                        }
                        $('#TxtPaidAmt').val(PaymentVoucher.MPayAmount);
                        $('#TxtPVDate').val(MVoucherDAte);
                        // $('#TxtPOInvNo').val(inv.PaymentVoucher);

                    } else {
                        $('#TxtPOInvNo').val('');
                        $('#TxtPaidAmt').val('');
                        $('#TxtPVDate').val('');

                    }
                    //   console.log(Master);
                    let table = document.getElementById('StockPurchasetablebody');
                    table.innerHTML = ""; // Clear the table
                    var ids = 0;

                    data.forEach(function(item) {
                        ids = ids + 1;


                        let row = table.insertRow();
                        row.setAttribute("data-row-id", ids);
                        row.setAttribute('id', 'scoperow');

                        let ItemCodeCell = row.insertCell(0);
                        ItemCodeCell.innerHTML = item.BarCode;
                        // ItemCodeCell.style.width = '100px';


                        let ItemNameCell = row.insertCell(1);
                        ItemNameCell.innerHTML = item.ItemName;

                        let PUOMCell = row.insertCell(2);
                        PUOMCell.innerHTML = item.UOM;
                        PUOMCell.style.textAlign = 'center';



                        let QuantityCell = row.insertCell(3);
                        QuantityCell.innerHTML = item.Quantity ? item.Quantity : '';
                        QuantityCell.style.textAlign = 'right';

                        let TradePriceCell = row.insertCell(4);
                        TradePriceCell.innerHTML = item.TradePrice ? parseFloat(item.TradePrice)
                            .toFixed(2) : '';
                        TradePriceCell.style.textAlign = 'right';



                        let AmountCell = row.insertCell(5);
                        AmountCell.innerHTML = item.TotalAmt ? parseFloat(item.TotalAmt).toFixed(2) :
                            '';
                        AmountCell.style.textAlign = 'right';

                        let TotQtyCell = row.insertCell(6);
                        TotQtyCell.innerHTML = item.ItemCode;
                        TotQtyCell.style.textAlign = 'right';




                    });


                    // $('#scoperow').dblclick(function () {
                    //     alert(this.td[0].innerHTML);
                    // });
                    // const table = document.getElementById("StockPurchasetable");
                    const tableBody = document.getElementById("StockPurchasetablebody");
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
                let table = document.getElementById('StockPurchasetablebody');
                table.innerHTML = "";
                $('#TxtVoucherDate').val('');
                $('#TxtActCode').val('');
                $('#TxtActName').val('');
                $('#TxtGodownCode').val('');
                $('#TxtGodownName').val('');
                $('#TxtTerms').val('');
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
                            url: '/StockPOPurchaseddelete',
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



            $('#vendorpaymentbtn').click(function(e) {
                // alert('haha');
                let PVNo = $('#TxtPVNo').val();
                window.open('/VendorVoucher?pv=' + PVNo, '_blank');
            });


        });
    </script>
@stop


@section('content')
