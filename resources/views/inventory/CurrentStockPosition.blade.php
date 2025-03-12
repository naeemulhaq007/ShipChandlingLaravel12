@extends('layouts.app')



@section('title', 'Current-Stock-Position')

@section('content_header')

@stop

@section('content')
    </div>
    <?php echo View::make('partials.sendmail'); ?>
    <?php //echo View::make('partials.BarCodePrint')
    ?>

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
                        <h3 class="">Current Stock Position</h3>
                        {{-- <label for="" id="LblWorkUser" class="ml-auto text-info mx-1"> WorkUser </label>
                    <a name="firstvoucher" data-voucherno="{{$firstVoucherNo}}" id="firstvoucher" class="btn btn-secondary mx-1 "  role="button"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                        <button id="prev-voucher" class="btn btn-info"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></button>

            <div class="input-group col-sm-1">

                <input class="form-control" type="number"  id="current-voucher" name="current-voucher" value="" placeholder="Transfer # :">

            </div>
        <button id="next-voucher" class="btn btn-info"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
            <a name="" id="lastvoucher" data-voucherno="{{$lastVoucherNo}}" class="btn btn-secondary mx-1"  role="button"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>

            <input type="hidden" id="vouchers" name="vouchers" value="{{ implode(',', $Voucher->pluck('InvoiceNo')->toArray()) }}"> --}}

                    </div>

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-8">

                            <div class="row py-2">

                                <div class="inputbox col-sm-3">
                                    <span class="Txtspan" id="">Up To</span>
                                    <input id='TxtDateTo' type="date" value="">
                                </div>
                                <div class="inputbox col-sm-1">
                                    <input id='TxtItemCode' type="text" value="">
                                </div>
                                <input id='TxtGodownCode' type="hidden" class="custom-input form-control" value="0">
                            </div>

                            <div class="row py-2">
                                <div class="inputbox col-sm-6 ">
                                    <span class="Txtspan" id="">Item Code / IMPA</span>
                                    <input readonly disabled type="text" id="TxtItemName" name="TxtItemName">

                                </div>
                                <div class="inputbox col-sm-1">
                                    <input type="text" id="TxtItemCodeNew" name="TxtItemCodeNew">
                                </div>
                                <button class="btn btn-info" id=""><i class="fas fa-search"></i></button>

                                <div class="CheckBox1 mt-2 col-sm-1">

                                    <label class="input-group  mx-1">
                                        <input type="checkbox" onclick="" name="ChkItemALL" id="ChkItemALL" checked
                                            value=""> All
                                    </label>
                                </div>
                                <div class="inputbox">
                                    <input type="text" id="TxtIMPACode" name="TxtIMPACode">

                                </div>
                            </div>

                            <div class="row py-2">

                                <div class="inputbox col-sm-5">
                                    <span class="Txtspan" id="">Warehouse</span>
                                    <select class="" id="CmbGodownName" name="CmbGodownName">
                                        @foreach ($GodownSetup as $Godown)
                                            <option value="{{ $Godown->GodownCode }}">{{ $Godown->GodownName }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="CheckBox1 mt-2">
                                    <label class="input-group text-info mx-1">
                                        <input class="" type="checkbox" onclick="" name="ChkGodownAll"
                                            id="ChkGodownAll" checked value=""> All
                                    </label>
                                </div>


                                <div class="inputbox col-sm-5 ml-1">
                                    <span class="Txtspan" id="">Category</span>
                                    <select class="" id="CmbCategoryName" name="CmbCategoryName">
                                        @foreach ($CategorySetup as $Category)
                                            <option value="{{ $Category->CategoryCode }}">{{ $Category->CategoryName }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="CheckBox1 mt-2">

                                    <label class="input-group text-info mx-1">
                                        <input type="checkbox" onclick="" name="ChkCategoryALL" id="ChkCategoryALL"
                                            checked value=""> All
                                    </label>
                                </div>





                            </div>
                            <div class="row py-2">

                                <div class="inputbox col-sm-5">
                                    <span class="Txtspan" id="">Department</span>
                                    <select class="" id="CmbDepartment" name="CmbDepartment">
                                        @foreach ($TypeSetup as $Department)
                                            <option value="{{ $Department->TypeCode }}">{{ $Department->TypeName }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="CheckBox1 mt-2">
                                    <label class="input-group text-info mx-1">
                                        <input class="" type="checkbox" onclick="" name="ChkAllDepartment"
                                            id="ChkAllDepartment" checked value=""> All
                                    </label>
                                </div>


                                <div class="inputbox col-sm-4">
                                    <span class="Txtspan" id="">Branch Name</span>
                                    <input readonly disabled type="text" id="TxtBranchName" name="TxtBranchName"
                                        value="{{ $BranchSetup->BranchName }}">
                                </div>
                                <div class="inputbox col-sm-1">
                                    <input type="text" id="TxtBranchCode" value="{{ $BranchSetup->BranchCode }}"
                                        name="TxtBranchCode">
                                </div>

                                <div class="CheckBox1 mt-2 ml-1">
                                    <label class="input-group text-info mx-1">
                                        <input class=" " type="checkbox" onclick="" name="ChkBranchALL"
                                            id="ChkBranchALL" value=""> All
                                    </label>
                                </div>


                            </div>

                            <div class="row py-2">
                                <button name="CmdItemSetup" id="CmdItemSetup" class="btn btn-info mx-1"
                                    role="button">Item Setup</button>
                                <button name="BtnStockAdjustment" id="BtnStockAdjustment" class="btn btn-info mx-1"
                                    role="button">Stock Cycling</button>
                            </div>

                            <div class="row py-2">
                                <button name="Del" id="Del" class="btn btn-warning mx-1 col-sm-1"
                                    role="button">Del</button>

                                <div class="inputbox col-sm-6">
                                    <span class="Txtspan" id="">Search</span>
                                    <input class="" type="text" name="TxtSearch" id="TxtSearch">


                                </div>
                                <button id="searchbtn" class="btn btn-info"><i
                                        class="fas fa-search text-white  "></i></button>

                            </div>




                        </div>
                        <div class="col-sm-4">
                            <div class="row py-1">
                                <button name="" id="CmdSave" class="btn btn-dark mx-1" role="button"><i
                                        class="fas fa-file-invoice text-white"></i> Generate</button>
                                <button name="" id="CmdPrint" class="btn btn-primary mx-1" role="button"><i
                                        class="fas fa-print text-white"></i> Print</button>
                                <button name="" href="/home" class="btn btn-danger mx-1" role="button"><i
                                        class="fas fa-door-open  text-white fa-fw"></i> Exit</button>
                                <button name="" id="" class="btn btn-secondary" role="button"><i
                                        class="fas fa-file-invoice text-white"></i> Generate OLD</button>

                            </div>
                            <div class="row py-2">
                                <div class="input-group col-sm-12 ml-2">
                                    <div class="rdform row mt-3 ml-3">
                                        <input id="OptStockQty" type="radio" class="rainput" autocomplete="off"
                                            name="hopping" value="" checked>
                                        <label class="ralabel mx-2" for="OptStockQty"><span></span> Stock Qty</label>

                                        <input id="OptAll" type="radio" class="rainput" autocomplete="off"
                                            name="hopping" value="">
                                        <label class="ralabel  mx-2" for="OptAll"><span></span>ALL</label>

                                        <div class="worm">
                                            @for ($j = 0; $j < 30; $j++)
                                                <div class="worm__segment"></div>
                                            @endfor
                                        </div>
                                    </div>
                                    <div class="CheckBox1 ml-1 mt-2">

                                        <label class="input-group text-info mx-1">
                                            <input class=" " type="checkbox" onclick=""
                                                name="ChkStromme" id="ChkStromme" value=""> Only Stromme
                                        </label>

                                    </div>
                                </div>


                            </div>

                            {{-- <div class="row py-2">
                                <div class="btn-group col-sm-6" data-toggle="buttons">
                                    <label class="btn btn-default active">
                                        <input type="radio" name="options" id="OptStockQty" autocomplete="off"
                                            checked> Stock Qty
                                    </label>
                                    <label class="btn btn-default">
                                        <input type="radio" name="options" id="OptAll" autocomplete="off"> ALL
                                    </label>
                                </div>
                                <div class="form-check form-check-inline ">

                                    <label class="form-check-label  mx-1">
                                        <input class="form-check-input " type="checkbox" onclick=""
                                            name="ChkStromme" id="ChkStromme" value=""> Only Stromme
                                    </label>

                                </div>
                            </div> --}}


                            <div class="row py-2">
                                <div class="input-group col-sm-12 ml-2">

                                    <div class="rdform row mt-3 ml-3">
                                        <input id="OptWithQty" type="radio" class="rainput" autocomplete="off" name="hopping2" value="" checked>
                                        <label class="ralabel mx-2" for="OptWithQty"><span></span> With Qty</label>

                                        <input id="OptBlankStockSheet" type="radio" class="rainput" autocomplete="off" name="hopping2" value="">
                                        <label class="ralabel  mx-2" for="OptBlankStockSheet"><span></span>Blank Sheet</label>

                                        <div class="worm2">
                                            @for ($j = 0; $j < 30; $j++)
                                                <div class="worm__segment2"></div>
                                            @endfor
                                        </div>
                                    </div>
                                    <div class="CheckBox1 ml-1 mt-2">

                                        <label class="input-group text-info mx-1">
                                            <input class="" type="checkbox" onclick=""
                                                name="ChkOnlyInactive" id="ChkOnlyInactive" value=""> Only Inactive
                                            Item
                                        </label>

                                    </div>
                                </div>


                            </div>

                            {{-- <div class="row ">
                                <div class="btn-group col-sm-6" data-toggle="buttons">
                                    <label class="btn btn-default active">
                                        <input type="radio" name="options2" id="OptWithQty" autocomplete="off"
                                            checked> With Qty
                                    </label>
                                    <label class="btn btn-default">
                                        <input type="radio" name="options2" id="OptBlankStockSheet"
                                            autocomplete="off"> Blank Sheet
                                    </label>
                                </div>
                                <div class="form-check form-check-inline ">

                                    <label class="form-check-label  mx-1">
                                        <input class="form-check-input " type="checkbox" onclick=""
                                            name="ChkOnlyInactive" id="ChkOnlyInactive" value=""> Only Inactive
                                        Item
                                    </label>

                                </div>
                            </div> --}}


                            <div class="row py-2">
                                <div class="input-group col-sm-12 ml-2">
                                    <div class="rdform row mt-3 ml-3">
                                        <input id="OptPullStockCal" type="radio" class="rainput" autocomplete="off" name="hopping3" value="" checked>
                                        <label class="ralabel mx-2" for="OptPullStockCal"><span></span> Pull Stock Cal</label>

                                        <input id="OptOrderStockCal" type="radio" class="rainput" autocomplete="off" name="hopping3" value="" >
                                        <label class="ralabel  mx-2" for="OptOrderStockCal"><span></span>Order Stock Cal</label>

                                        <div class="worm3">
                                            @for ($j = 0; $j < 30; $j++)
                                                <div class="worm__segment3"></div>
                                            @endfor
                                        </div>
                                    </div>
                                    <div class="CheckBox1 ml-4 mt-2">

                                        <label class="input-group text-info mx-1">
                                            <input class="form-check-input " type="checkbox" onclick=""
                                                name="ChkOnlyNagative" id="ChkOnlyNagative" value=""> Only Negative
                                            Stock
                                        </label>

                                    </div>
                                </div>


                            </div>

                            {{-- <div class="row ">
                                <div class="btn-group col-sm-6" data-toggle="buttons">
                                    <label class="btn btn-default active">
                                        <input type="radio" name="options3" id="OptPullStockCal" autocomplete="off"
                                            checked> Pull Stock Cal
                                    </label>
                                    <label class="btn btn-default">
                                        <input type="radio" name="options3" id="OptOrderStockCal" autocomplete="off">
                                        Order Stock Cal
                                    </label>
                                </div>
                                <div class="form-check form-check-inline ">

                                    <label class="form-check-label  mx-1">
                                        <input class="form-check-input " type="checkbox" onclick=""
                                            name="ChkOnlyNagative" id="ChkOnlyNagative" value=""> Only Nagative
                                        Stock
                                    </label>

                                </div>
                            </div> --}}


                            <div class="row py-2">
                                <div class="input-group col-sm-12 ml-2">
                                    <div class="rdform row mt-3 ml-3">
                                        <input id="OptLandCost" type="radio" class="rainput" autocomplete="off" name="hopping4" value="" checked>
                                        <label class="ralabel mx-2" for="OptLandCost"><span></span>OptLandCost</label>

                                        <input id="OptAvgRate" type="radio" class="rainput" autocomplete="off" name="hopping4" value="">
                                        <label class="ralabel  mx-2" for="OptAvgRate"><span></span>Avg Rate</label>

                                        <div class="worm4">
                                            @for ($j = 0; $j < 30; $j++)
                                                <div class="worm__segment4"></div>
                                            @endfor
                                        </div>
                                    </div>

                                </div>


                            </div>

                            {{-- <div class="row ">
                                <div class="btn-group col-sm-6" data-toggle="buttons">
                                    <label class="btn btn-default active">
                                        <input type="radio" name="options4" id="OptLandCost" autocomplete="off">
                                        OptLandCost
                                    </label>
                                    <label class="btn btn-default">
                                        <input type="radio" name="options4" id="OptAvgRate" autocomplete="off"
                                            checked> Avg Rate
                                    </label>
                                </div>

                            </div> --}}
                        </div>
                    </div>

                    <div class="progress  active">
                        <div class="progress-bar progress-bar-striped bg-success progress-bar-animated" style="width:0%">
                        </div>
                    </div>

                    <div class="row py-1">

                    </div>



                </div>
            </div>
            <div class="rounded shadow mx-auto small">
                <table class="table table-hover   " id="StockTransfertable">
                    <thead class="bg-info">
                        <tr>
                            <th>Stock&nbsp;#</th>
                            <th>IMPA</th>
                            <th hidden class="text-right">Commodity</th>
                            <th class="text-center">Category</th>
                            <th hidden class="text-center">Godown Code</th>
                            <th class="text-center">Godown&nbsp;Name</th>
                            <th style="width: 1200px">Product&nbsp;Description</th>
                            <th class="text-center">UOM</th>
                            <th class="text-center">Department&nbsp;Name</th>
                            <th hidden class="text-right">Origin</th>
                            <th class="text-right">Perishable</th>
                            <th class="text-right">Land&nbsp;Cost</th>
                            <th class="text-right">Base&nbsp;Price</th>
                            <th class="text-right">Fixed&nbsp;Price</th>
                            <th class="text-right">Stock&nbsp;Qty</th>
                            <th class="text-right">Avg&nbsp;Cost</th>
                            <th class="text-right">Amount</th>

                        </tr>
                    </thead>
                    <tbody id="StockTransfertablebody">

                    </tbody>

                </table>
                <div class="row"><input type="text" name="" class="form-control col-sm-1 mx-1 ml-auto"
                        id="TxtStockQty"> <input type="text" name="" class="form-control col-sm-1 mx-1"
                        id="TxtTotalAmount"></div>
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
        .rainput:nth-of-type(1):checked~.worm .worm__segment {
            transform: translateX(0.5em);
        }

        .rainput:nth-of-type(1):checked~.worm .worm__segment:before {
            animation-name: hop1;
        }

        @keyframes hop1 {

            from,
            to {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-1.5em);
            }
        }

        .rainput:nth-of-type(2):checked~.worm .worm__segment {
            transform: translateX(7.95em);
        }

        .rainput:nth-of-type(2):checked~.worm .worm__segment:before {
            animation-name: hop2;
        }

        @keyframes hop2 {

            from,
            to {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-1.5em);
            }
        }

        /* .rainput:nth-of-type(3):checked~.worm .worm__segment {
            transform: translateX(11.6em);
        }

        .rainput:nth-of-type(3):checked~.worm .worm__segment:before {
            animation-name: hop3;
        }

        @keyframes hop3 {

            from,
            to {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-1.5em);
            }
        } */


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
            transform: translateX(7.5em);
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
        .rainput:nth-of-type(1):checked~.worm3 .worm__segment3 {
            transform: translateX(0.5em);
        }

        .rainput:nth-of-type(1):checked~.worm3 .worm__segment3:before {
            animation-name: hou1;
        }

        @keyframes hou1 {

            from,
            to {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-1.5em);
            }
        }

        .rainput:nth-of-type(2):checked~.worm3 .worm__segment3 {
            transform: translateX(9.7em);
        }

        .rainput:nth-of-type(2):checked~.worm3 .worm__segment3:before {
            animation-name: hou2;
        }

        @keyframes hou2 {

            from,
            to {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-1.5em);
            }
        }
        .rainput:nth-of-type(1):checked~.worm4 .worm__segment4 {
            transform: translateX(0.5em);
        }

        .rainput:nth-of-type(1):checked~.worm4 .worm__segment4:before {
            animation-name: hoi1;
        }

        @keyframes hoi1 {

            from,
            to {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-1.5em);
            }
        }

        .rainput:nth-of-type(2):checked~.worm4 .worm__segment4 {
            transform: translateX(9.25em);
        }

        .rainput:nth-of-type(2):checked~.worm4 .worm__segment4:before {
            animation-name: hoi2;
        }

        @keyframes hoi2 {

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
            //         $('.parrent').dblclick(function(e){
            //     let AcCode = $(this).data('accode');
            //     // $('#TxtAccode').val(AcCode).trigger("change");
            //     let AcName = $(this).data('acname');
            //    $('#TxtActCode').val(AcCode);
            //    $('#TxtActName').val(AcName);
            //     // alert(AcName);
            //     });
            $(".progress-bar").animate({
                width: "100%"

            }, 2500);
            setTimeout(function() {
                //   alert('Progress bar complete!');
                $(".progress-bar").hide();
                $(".progress").hide();
            }, 3000);
            $('#CmbGodownName').on('change', function() {
                var selectedOptionValue = $(this).val();
                $('#TxtGodownCode').val(selectedOptionValue);
            });
            $('#searchbtn').click(function(e) {
                e.preventDefault();
                // alert('hmm');
                dataget();
            });
        });
        $(document).ready(function() {

            $(document).ready(function() {
                var today = new Date().toISOString().split('T')[0];
                $('#TxtDateTo').val(today);
            });

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
                            // $('#ExpenseVoucherReport').modal('show');
                            $('#CmdPrint').click();

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

            function Rowdeletefunc(table, rows) {
                if (rows) {
                    for (var i = 0; i < rows.length; i++) {
                        table.row(rows[i]).remove().draw();
                    }
                    $('#deleteButton').attr('data-row-id', '');
                }
            }


            function Rowaddfunc() {



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
                // var MTotalBonusQty = 0;
                // var MTotalDiscAmt = 0;
                // var MtotalAmt = 0;
                // var MTotalQty = 0;
                //  datatablearray = [];
                for (let i = 0; i < rows.length; i++) {
                    let cells = rows[i].cells;
                    //   let ActCode = cells[0].innerHTML;
                    //   if (ActCode == '') {
                    //       alert('Please Enter ACT-CODE');
                    // return;
                    //   }
                    //   datatablearray.push({
                    let ItemCode = cells[0] ? cells[0].innerHTML : '';
                    let IMPAItemCode = cells[1] ? cells[1].innerHTML : '';
                    let Commodity = cells[2] ? cells[2].innerHTML : '';
                    let CategoryName = cells[3] ? cells[3].innerHTML : '';
                    let GodownCode = cells[4] ? cells[4].innerHTML : '';
                    let GodownName = cells[5] ? cells[5].innerHTML : '';
                    let ItemName = cells[6] ? cells[6].innerHTML : '';
                    let UOM = cells[7] ? cells[7].innerHTML : '';
                    let DepartmentName = cells[8] ? cells[8].innerHTML : '';
                    let OrgineName = cells[9] ? cells[9].innerHTML : '';
                    let ChkPERISHABLE = cells[10] ? cells[10].innerHTML : '';
                    let OurPrice = cells[11] ? cells[11].innerHTML : '';
                    let BasePrice = cells[12] ? cells[12].innerHTML : '';
                    let FixedPrice = cells[13] ? cells[13].innerHTML : '';
                    let StockQty = cells[14] ? cells[14].innerHTML : '';
                    let AvgRate = cells[15] ? cells[15].innerHTML : '';
                    let Amount = cells[16] ? cells[16].innerHTML : '';





                    //    MTotalQty += parseFloat(Quantity);
                    //    MTotalBonusQty += parseFloat(BonusQty);
                    //    MTotalDiscAmt += parseFloat(DiscAmt);
                    //    cells[12].innerHTML = parseFloat(Quantity*TradePrice).toFixed(2);
                    //    MtotalAmt += parseFloat(Amount);
                    //   });
                    // console.log(MtotalAmt);
                }
                //     $('#TxtTotalAmount').val(parseFloat(MtotalAmt).toFixed(2));
                //     $('#TxtTotalQty').val(parseFloat(MTotalQty).toFixed(2));
                //     $('#TxtTotBonusQty').val(parseFloat(MTotalBonusQty).toFixed(2));
                //     $('#TxtTotalDiscAmt').val(parseFloat(MTotalDiscAmt).toFixed(2));
                //     let TxtTotalAmount = $('#TxtTotalAmount').val();
                // $('#TxtNetAmount').val(parseFloat(TxtTotalAmount).toFixed(2));
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
            // $('#TxtTotBonusQty').blur(function (e) {
            //     e.preventDefault();
            //     tablecomposer()

            // });
            // $('#TxtTotalQty').blur(function (e) {
            //     e.preventDefault();
            //     tablecomposer()

            // });

            // function CmdInvRate_Click(callback){
            //     let MAmount = '';
            //     let MInvAmt = '';
            //     let MTotQty = '';
            //     let MInvRate = '';
            //     let MPer = '';
            //     let TxtTotCostAmount = 0;
            //     let table = document.getElementById('StockTransfertablebody');
            //     let rows = table.rows;
            //     for (let i = 0; i < rows.length; i++) {
            //   let cells = rows[i].cells;

            //     let = IMAItemCode =  cells[0] ? cells[0].innerHTML : '';
            //    let  ItemName =  cells[1] ? cells[1].innerHTML : '';
            //    let  PUOM =  cells[2] ? cells[2].innerHTML : '';
            //    let  BatchNo =  cells[3] ? cells[3].innerHTML : '';
            //    let  ExpiryDate =  cells[4] ? cells[4].innerHTML : '';
            //    let  ExpireBarCode =  cells[5] ? cells[5].innerHTML : '';
            //    let  Quantity =  cells[6] ? cells[6].innerHTML : '';
            //    let  BonusQty =  cells[7] ? cells[7].innerHTML : '';
            //    let  TradePrice =  cells[8] ? cells[8].innerHTML : '';
            //    let  GrossAmount =  cells[9] ? cells[9].innerHTML : '';
            //    let  DiscPer =  cells[10] ? cells[10].innerHTML : '';
            //    let  DiscAmt =  cells[11] ? cells[11].innerHTML : '';
            //    let  MAmount =  cells[12] ? cells[12].innerHTML : '';
            //    let  TotQty =  cells[13] ? cells[13].innerHTML : '';
            //    let  AvgRate =  cells[14] ? cells[14].innerHTML : '';
            //    let  InvRate =  cells[15] ? cells[15].innerHTML : '';
            //    let  ExpPer =  cells[16] ? cells[16].innerHTML : '';
            //    let  InvAmt =  cells[17] ? cells[17].innerHTML : '';
            //    let  DepartmentName =  cells[18] ? cells[18].innerHTML : '';
            //    let  DepartmentCode =  cells[19] ? cells[19].innerHTML : '';
            //    let  SaleRate =  cells[20] ? cells[20].innerHTML : '';
            //    let  IMPAItemCode =  cells[21] ? cells[21].innerHTML : '';
            //    let  ITemCode =  cells[22] ? cells[22].innerHTML : '';
            //    let  StockQty =  cells[23] ? cells[23].innerHTML : '';

            //    let TxtTotalAmount = $('#TxtTotalAmount').val();
            //    let TxtNetAmount = $('#TxtNetAmount').val();

            //    MPer = Number(MAmount)/(TxtTotalAmount ? TxtTotalAmount : 1) * 100;
            //    cells[16].innerHTML = parseFloat(MPer).toFixed(2);
            //    MInvAmt = TxtNetAmount*MPer/100;
            //    MInvAmt = parseFloat(MInvAmt).toFixed(2);
            //    cells[17].innerHTML = MInvAmt;
            //    MTotQty = TotQty;
            //    MInvRate = MInvAmt/(MTotQty ? MTotQty : 1);
            //    cells[15].innerHTML = parseFloat(MInvRate).toFixed(2);

            //    $('#TxtTotCostAmount').val(MInvAmt);

            //     }
            //     callback(TxtTotalAmount);
            // }


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
                        ItemCode: cells[0] ? cells[0].innerHTML : '',
                        IMPAItemCode: cells[1] ? cells[1].innerHTML : '',
                        Commodity: cells[2] ? cells[2].innerHTML : '',
                        CategoryName: cells[3] ? cells[3].innerHTML : '',
                        GodownCode: cells[4] ? cells[4].innerHTML : '',
                        GodownName: cells[5] ? cells[5].innerHTML : '',
                        ItemName: cells[6] ? cells[6].innerHTML : '',
                        UOM: cells[7] ? cells[7].innerHTML : '',
                        DepartmentName: cells[8] ? cells[8].innerHTML : '',
                        OrgineName: cells[9] ? cells[9].innerHTML : '',
                        ChkPERISHABLE: cells[10] ? cells[10].innerHTML : '',
                        OurPrice: cells[11] ? cells[11].innerHTML : '',
                        BasePrice: cells[12] ? cells[12].innerHTML : '',
                        FixedPrice: cells[13] ? cells[13].innerHTML : '',
                        StockQty: cells[14] ? cells[14].innerHTML : '',
                        AvgRate: cells[15] ? cells[15].innerHTML : '',
                        Amount: cells[16] ? cells[16].innerHTML : '',

                    });

                }

                if ($('#TxtGodownCode').val() == 0) {
                    alert("Please Select Ware House First");
                    $('#CmbGodownName').focus();
                    return;
                }


                if (!$('#ChkItemALL').prop('checked') && $('#TxtItemCode').val() === "") {
                    $('#TxtItemCode').focus();
                    return;
                }

                let PVendorCode = '{{ $FixAccountSetup->StockVendorCode }}';
                let PVendorName = '{{ $FixAccountSetup->StockVendorName }}';
                let PBackLogStockDate = '{{ $FixAccountSetup->BackLogStockDate }}';
                let MMStockType = '';
                let ChkGodownAll = $("#ChkGodownAll").is(":checked");
                let OptOrderStockCal = $("#OptOrderStockCal").is(":checked");
                let OptPullStockCal = $("#OptPullStockCal").is(":checked");
                let ChkOnlyNagative = $("#ChkOnlyNagative").is(":checked");
                let OptStockQty = $("#OptStockQty").is(":checked");
                let OptAvgRate = $("#OptAvgRate").is(":checked");

                // let Qry = "'VenderCode','=',"+PVendorCode;
                var Qry = "VenderCode='" + parseInt(PVendorCode) + "'";

                if ($('#ChkStromme').is(":checked") == true) {
                    if (Qry !== "") Qry += " and ";
                    Qry += "ChkStromme=1";
                }

                if ($('#ChkAllDepartment').is(":checked") == false) {
                    if (Qry !== "") Qry += " and ";
                    Qry += "TypeName='" + $('#CmbDepartment option:selected').text() + "'";
                }


                if ($('#ChkItemALL').is(":checked") == false) {
                    if (Qry !== "") Qry += " and ";
                    Qry += "ItemCode='" + $('#TxtItemCode').val() + "'";
                }

                if ($('#ChkCategoryALL').is(":checked") == false) {
                    if (Qry !== "") Qry += " and ";
                    Qry += "VCategoryName='" + $("#CmbCategoryName option:selected").text() + "'";
                }

                if ($('#ChkPerishableOnly').is(":checked") == true) {
                    if (Qry !== "") Qry += " and ";
                    Qry += "ChkPERISHABLE=1";
                }

                if ($('#OptPullStockCal').is(":checked") == true) {
                    MMStockType = "PullStock";
                } else if ($('#OptOrderStockCal').is(":checked") == true) {
                    MMStockType = "OrderStock";
                }

                if ($('#ChkOnlyInactive').is(":checked") == true) {
                    if (Qry !== "") Qry += " and ";
                    Qry += "ChkInactive=1";
                } else {
                    if (Qry !== "") Qry += " and ";
                    Qry += "(ChkInactive=0 or ChkInactive is null)";
                }
                console.log(Qry);


                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '/CurrentStockPositionsave',
                    type: 'POST',
                    timeout: 180000,
                    data: {


                        ChkGodownAll: ChkGodownAll,
                        TxtDateTo: $('#TxtDateTo').val(),
                        OptStockQty: OptStockQty,
                        ChkOnlyNagative: ChkOnlyNagative,
                        OptOrderStockCal: OptOrderStockCal,
                        OptPullStockCal: OptPullStockCal,
                        BackLogDate: PBackLogStockDate,
                        OptAvgRate: OptAvgRate,
                        Qry: Qry,
                        TxtGodownCode: $('#TxtGodownCode').val(),
                        table: datatablearray,
                    },
                    beforeSend: function() {
                        // Show the overlay and spinner before sending the request
                        $('.overlay').show();
                    },
                    success: function(response) {
                        console.log(response);
                        let data = response.results;
                        let txtstockQty = response.txtstockQty;
                        let TxtTotalAmount = response.TxtTotalAmount;
                        $('#TxtStockQty').val(0);
                        $('#TxtTotalAmount').val(0);
                        $('#TxtStockQty').val(parseFloat(txtstockQty).toFixed(2));
                        $('#TxtTotalAmount').val(parseFloat(TxtTotalAmount).toFixed(2));
                        //   console.log(Master);
                        let table = document.getElementById('StockTransfertablebody');
                        let ChkGodownAll = $("#ChkGodownAll").is(":checked");
                        let GodownName = $('#CmbGodownName option:selected').text();
                        let ChkAllDepartment = $("#ChkAllDepartment").is(":checked");
                        let Department = $('#CmbDepartment option:selected').text();
                        table.innerHTML = ""; // Clear the table
                        var ids = 0;

                        data.forEach(function(item) {
                            ids = ids + 1;

                            if (ChkGodownAll == true) {
                                addingrow(item);
                            } else {
                                if (item.GodownName == GodownName) {
                                    addingrow(item);
                                }
                            }






                        });

                    },
                    error: function(xhr, status, error) {
                        console.log(error);

                    },
                    complete: function() {
                        // Hide the overlay and spinner after the request is complete
                        $('.overlay').hide();
                    }
                });


                // });

            });


        });



        function dataget() {
            //     if (!$('#ChkGodownAll').prop('checked')) {
            //   if (Qry !== "") Qry += " and ";
            //   Qry += "GodownName='" + $('#CmbGodownName option:selected').text() + "'";
            // }
            let TxtSearch = $('#TxtSearch').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '/searchCurrentStockPosition',
                type: 'POST',
                data: {
                    TxtSearch,
                    // pono: $('#TxtClientOrder').val(),
                },
                success: function(resposne) {
                    console.log(resposne);
                    let data = resposne.results;
                    //   console.log(Master);
                    let table = document.getElementById('StockTransfertablebody');
                    table.innerHTML = ""; // Clear the table
                    let ChkGodownAll = $("#ChkGodownAll").is(":checked");
                    let GodownName = $('#CmbGodownName option:selected').text();
                    let ChkAllDepartment = $("#ChkAllDepartment").is(":checked");
                    let Department = $('#CmbDepartment option:selected').text();
                    data.forEach(function(item) {


                        if (ChkGodownAll == true) {
                            addingrow(item);
                        } else {
                            if (item.GodownName == GodownName) {
                                addingrow(item);
                            }
                        }

                        //         let row = table.insertRow();

                        // let ItemCodeCell = row.insertCell(0);
                        // ItemCodeCell.innerHTML = item.ItemCode;


                        // let IMPAItemCodeCell = row.insertCell(1);
                        // IMPAItemCodeCell.innerHTML = item.IMPAItemCode;

                        // let CommodityCell = row.insertCell(2);
                        // CommodityCell.innerHTML = item.Commodity;
                        // CommodityCell.hidden = true;

                        // let CategoryNameCell = row.insertCell(3);
                        // CategoryNameCell.innerHTML = item.CategoryName;

                        // let GodownCodeCell = row.insertCell(4);
                        // GodownCodeCell.innerHTML = item.GodownCode;
                        // GodownCodeCell.hidden = true;

                        // let GodownNameCell = row.insertCell(5);
                        // GodownNameCell.innerHTML = item.GodownName;

                        // let ItemNameCell = row.insertCell(6);
                        // ItemNameCell.innerHTML = item.ItemName;

                        // let UOMCell = row.insertCell(7);
                        // UOMCell.innerHTML = item.UOM;
                        // // UOMCell.style.textAlign = 'right';
                        // // QuantityCell.hidden = true;

                        // let DepartmentNameCell = row.insertCell(8);
                        // DepartmentNameCell.innerHTML = item.DepartmentName;

                        // let OrgineNameCell = row.insertCell(9);
                        // OrgineNameCell.innerHTML = item.OrgineName;
                        // OrgineNameCell.hidden = true;

                        // let ChkPERISHABLECell = row.insertCell(10);
                        // ChkPERISHABLECell.innerHTML = item.ChkPERISHABLE;
                        // // DepartmentNameCell.style.textAlign = 'right';

                        // let OurPriceCell = row.insertCell(11);
                        // OurPriceCell.innerHTML =item.OurPrice  ? parseFloat(item.OurPrice).toFixed(2) : '';
                        // OurPriceCell.style.textAlign = 'right';

                        // let BasePriceCell = row.insertCell(12);
                        // BasePriceCell.innerHTML =item.BasePrice  ? parseFloat(item.BasePrice).toFixed(2) : '';
                        // BasePriceCell.style.textAlign = 'right';
                        // // BasePriceCell.hidden = true;



                        // let FixedPriceCell = row.insertCell(13);
                        // FixedPriceCell.innerHTML =item.FixedPrice ? parseFloat(item.FixedPrice).toFixed(2) : '';
                        // FixedPriceCell.style.textAlign = 'right';



                        // let StockQtyCell = row.insertCell(14);
                        // StockQtyCell.innerHTML =item.StockQty ? parseFloat(item.StockQty).toFixed(2) : '';
                        // StockQtyCell.style.textAlign = 'right';
                        // // StockQtyCell.hidden = true;

                        // let AvgRateCell = row.insertCell(15);
                        // AvgRateCell.innerHTML =item.AvgRate ? parseFloat(item.AvgRate).toFixed(2) : '';
                        // AvgRateCell.style.textAlign = 'right';

                        // let AmountCell = row.insertCell(16);
                        // AmountCell.innerHTML =item.Amount ? parseFloat(item.Amount).toFixed(2) : '';
                        // AmountCell.style.textAlign = 'right';





                    });



                }
            });

        }

        function addingrow(item) {
            let table = document.getElementById('StockTransfertablebody');
            let row = table.insertRow();

            let ItemCodeCell = row.insertCell(0);
            ItemCodeCell.innerHTML = item.ItemCode;


            let IMPAItemCodeCell = row.insertCell(1);
            IMPAItemCodeCell.innerHTML = item.IMPAItemCode;

            let CommodityCell = row.insertCell(2);
            CommodityCell.innerHTML = item.Commodity;
            CommodityCell.hidden = true;

            let CategoryNameCell = row.insertCell(3);
            CategoryNameCell.innerHTML = item.CategoryName;

            let GodownCodeCell = row.insertCell(4);
            GodownCodeCell.innerHTML = item.GodownCode;
            GodownCodeCell.hidden = true;

            let GodownNameCell = row.insertCell(5);
            GodownNameCell.innerHTML = item.GodownName;

            let ItemNameCell = row.insertCell(6);
            ItemNameCell.innerHTML = item.ItemName;

            let UOMCell = row.insertCell(7);
            UOMCell.innerHTML = item.UOM;
            // UOMCell.style.textAlign = 'right';
            // QuantityCell.hidden = true;

            let DepartmentNameCell = row.insertCell(8);
            DepartmentNameCell.innerHTML = item.DepartmentName;

            let OrgineNameCell = row.insertCell(9);
            OrgineNameCell.innerHTML = item.OrgineName;
            OrgineNameCell.hidden = true;

            let ChkPERISHABLECell = row.insertCell(10);
            ChkPERISHABLECell.innerHTML = item.ChkPERISHABLE;
            // DepartmentNameCell.style.textAlign = 'right';

            let OurPriceCell = row.insertCell(11);
            OurPriceCell.innerHTML = item.OurPrice ? parseFloat(item.OurPrice).toFixed(2) : '';
            OurPriceCell.style.textAlign = 'right';

            let BasePriceCell = row.insertCell(12);
            BasePriceCell.innerHTML = item.BasePrice ? parseFloat(item.BasePrice).toFixed(2) : '';
            BasePriceCell.style.textAlign = 'right';
            // BasePriceCell.hidden = true;



            let FixedPriceCell = row.insertCell(13);
            FixedPriceCell.innerHTML = item.FixedPrice ? parseFloat(item.FixedPrice).toFixed(2) : '';
            FixedPriceCell.style.textAlign = 'right';



            let StockQtyCell = row.insertCell(14);
            StockQtyCell.innerHTML = item.StockQty ? parseFloat(item.StockQty).toFixed(2) : '';
            StockQtyCell.style.textAlign = 'right';
            // StockQtyCell.hidden = true;

            let AvgRateCell = row.insertCell(15);
            AvgRateCell.innerHTML = item.AvgRate ? parseFloat(item.AvgRate).toFixed(2) : '';
            AvgRateCell.style.textAlign = 'right';

            let AmountCell = row.insertCell(16);
            AmountCell.innerHTML = item.Amount ? parseFloat(item.Amount).toFixed(2) : '';
            AmountCell.style.textAlign = 'right';
            // AvgRateCell.hidden = true;
        }
        $(document).ready(function() {


            //     $('#TxtBank').blur(function () {
            //     // $('#TxtBank').blur(function () {
            //       let TxtBank = parseFloat($('#TxtBank').val());
            //       let TxtInvAmount =parseFloat($('#TxtInvAmount').val());
            //       let TxtAmount = $('#TxtAmount').val();
            //       let TxtInvoiceAmt = $('#TxtInvoiceAmt').val();
            //       if(!isNaN(TxtInvAmount) && !isNaN(TxtBank)){

            //           $('#TxtInvAmount').val(TxtInvAmount-TxtBank);
            //           let TxtBankaf = parseFloat($('#TxtBank').val());
            //     let TxtInvAmountaf = parseFloat($('#TxtInvAmount').val());
            //     $('#TxtAmount').val(TxtInvAmountaf + TxtBankaf);

            //     if(TxtInvoiceAmt == TxtAmount){
            //     $("#TxtAmount").css({"background-color": "green","color": "white"});

            // }else{

            //     $("#TxtAmount").css({"background-color": "red","color": "white"});
            // }
            // }




            //     });

            //     $('#TxtInvoiceAmt').dblclick(function () {
            //       let TxtInvoiceAmt = $('#TxtInvoiceAmt').val();
            //       $('#TxtInvAmount').val(TxtInvoiceAmt);

            //     });


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


            // $('#btnBarcode').click(function (e) {
            //     e.preventDefault();
            //     let invoiceno = $('#current-voucher').val();
            //     $('#barcodeinv').val(invoiceno);
            //     $('#barcodeinv').blur();
            // });

            $('#CmdPrint').click(function(e) {
                e.preventDefault();
                // var RepQry = "";
                var MBranchCode = '{{ $MBranchCode }}';
                var MWorkUser = '{{ $MWorkUser }}';
                var OptStockQty = $("#OptStockQty").is(":checked");
                var Date = $('#TxtDateTo').val();
                if ($("#OptWithQty").is(":checked")) {
                    MRep = "CurrentStockPosition";
                } else if ($("#OptBlankStockSheet").is(":checked")) {
                    MRep = "CurrentStockPositionBlank";
                }

                var CHeading = "1";

                DateTo = $("#TxtDateTo").val();

                // MInvNo = RepQry;



                // console.log(MInvNo);
                console.log(MRep);
                // window.location.href = 'Current-StockPosition-print';

                // // Redirect to a named route with variables as route parameters
                // var redirectUrl = "{{ route('CurrentStockPositionprint', ['OptStockQty' => '+OptStockQty+', 'MRep' => '+MRep+']) }}";

                // // redirectUrl = redirectUrl.replace(':variable1', OptStockQty).replace(':variable2', MRep);
                // window.location.href = redirectUrl;

                // var variable1 = "value1";
                // var variable2 = "value2";

                // Redirect to a URL with variables
                var redirectUrl = "Current-StockPosition-print?OptStockQty=" + OptStockQty + "&MRep=" +
                    MRep + "&Date=" + Date;
                window.location.href = redirectUrl;


                // $.ajaxSetup({
                //   headers: {
                //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                //   }
                // });
                // $.ajax({
                //             url: '/Current-StockPosition-print',
                //             type: 'POST',
                //             data: {
                //                 OptStockQty,
                //                 MInvNo,
                //                 MRep,
                //             }, beforeSend: function() {
                //         // Show the overlay and spinner before sending the request
                //         $('.overlay').show();
                //     },
                //     success: function (data) {
                //         console.log(data);
                //     },
                //     error: function (xhr, status, error) {
                //         console.log(error);

                //     },
                //     complete: function() {
                //         // Hide the overlay and spinner after the request is complete
                //         $('.overlay').hide();
                //     }
                // });


            });



        });
    </script>
@stop


@section('content')
