@extends('layouts.app')



@section('title', 'Stock-Ledger')

@section('content_header')

@stop

@section('content')
    </div>
    <?php echo View::make('partials.fullitemsearch') ?>
    <?php //echo View::make('partials.BarCodePrint')?>

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
                        <h5 class="text-blue">Stock-Ledger</h5>


                    </div>

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="row py-1">

                                <div class="inputbox col-sm-4">
                                    <span class="Txtspan" id="">From</span>
                                    <input id='TxtDateFrom' type="date" value="">
                                </div>

                                <div class="inputbox col-sm-4">
                                    <span class="Txtspan" id="">To</span>
                                    <input id='TxtDateTo' type="date" value="">
                                </div>

                                <input id='TxtIMPACode' type="hidden"  value="0">
                                <div class="inputbox col-sm-1">
                                    <input id='TxtArticleCode' type="text" value="S23237422">
                                </div>

                            </div>


                            <div class="row py-2">

                                <div class="inputbox col-sm-8">
                                    <span class="Txtspan" id="">Item Code / IMPA</span>
                                    <input type="text" id="TxtArticleName" name="TxtArticleName" value="GLOVES WORKING COTTON NON SLIP DOTS">
                                </div>

                                <div class="inputbox col-sm-1">
                                    <input type="text" id="TxtItemCode" name="TxtItemCode" value="S23237422">
                                </div>

                                <button  class="btn btn-info" id="itemserchbtn"><i class="fas fa-search    "></i></button>
                            </div>


                            <div class="row py-2">

                                <div class="inputbox col-sm-8 ">
                                    <span class="Txtspan" id="">Warehouse</span>
                                    <input type="text" id="TxtLocationName" name="TxtLocationName" value="HOUSTON">
                                </div>
                                <div class="inputbox col-sm-1">
                                    <input  type="text" id="TxtLocationCode" name="TxtLocationCode" value="1">
                                </div>

                                <button class="btn btn-info" id=""><i class="fas fa-search    "></i></button>
                            </div>

                            <div class="row py-2">
                                <div class="input-group col-sm-12 ml-2">
                                    <div class="rdform row mt-3 ml-3">

                                        <input id="OptPullStockCal" type="radio" class="rainput" autocomplete="off" name="hopping2" value="" checked>
                                        <label class="ralabel mx-2" for="OptPullStockCal"><span></span>Pull Stock Cal</label>

                                        <input id="OptOrderStockCal" type="radio" class="rainput" autocomplete="off" name="hopping2" value="">
                                        <label class="ralabel  mx-2" for="OptOrderStockCal"><span></span>Order Stock Cal</label>

                                        <div class="worm2">
                                            @for ($j = 0; $j < 30; $j++)
                                                <div class="worm__segment2"></div>
                                            @endfor
                                        </div>
                                    </div>

                                </div>


                            </div>

                            {{-- <div class="row py-2">
                                <div class="btn-group col-sm-3" data-toggle="buttons">
                                    <label class="btn btn-default active">
                                        <input type="radio" name="options" id="OptPullStockCal" autocomplete="off" checked> Pull Stock Cal
                                    </label>
                                    <label class="btn btn-default">
                                        <input type="radio" name="options" id="OptOrderStockCal" autocomplete="off"> Order Stock Cal
                                    </label>
                                </div>
                            </div> --}}

                            <div class="row py-2 ml-1">
                                <a name="" id="CmdSave" class="btn btn-dark mx-1" role="button"><i
                                        class="fas fa-file-invoice text-white"></i> Generate</a>
                                <a name="" id="CmdPrint" class="btn btn-primary mx-1" role="button"><i
                                        class="fas fa-print"></i> Print</a>
                                <a name="" href="/home" class="btn btn-danger mx-1" role="button"><i
                                        class="fas fa-door-open fa-fw"></i> Exit</a>
                                {{-- <a name="" id="" class="btn btn-default ml-auto" role="button"><i class="fas fa-file-invoice text-primary"></i> Generate OLD</a> --}}
                                <div class="CheckBox1 ml-2">

                                    <label class="input-group text-info mx-1">
                                        <input class="" type="checkbox" onclick=""
                                            name="ChkCompanyHeading" id="ChkCompanyHeading" value=""> Company
                                        Heading
                                    </label>

                                </div>
                            </div>



                        </div>
                            {{-- <div class="row py-1">
                                <a name="" id="CmdSave" class="btn btn-dark mx-1" role="button"><i
                                        class="fas fa-file-invoice text-success"></i> Generate</a>
                                <a name="" id="CmdPrint" class="btn btn-default mx-1" role="button"><i
                                        class="fas fa-print text-info"></i> Print</a>
                                <a name="" href="/home" class="btn btn-default mx-1" role="button"><i
                                        class="fas fa-door-open  text-danger fa-fw"></i> Exit</a>
                                {{-- <a name="" id="" class="btn btn-default ml-auto" role="button"><i class="fas fa-file-invoice text-primary"></i> Generate OLD</a>
                                <div class="form-check form-check-inline ">

                                    <label class="form-check-label  mx-1">
                                        <input class="form-check-input " type="checkbox" onclick=""
                                            name="ChkCompanyHeading" id="ChkCompanyHeading" value=""> Company
                                        Heading
                                    </label>

                                </div>
                            </div> --}}
                            {{-- <div class="row pt-1">
    <div class="btn-group col-sm-6" data-toggle="buttons">
        <label class="btn btn-default active">
          <input type="radio" name="options" id="OptStockQty" autocomplete="off" checked> Stock Qty
        </label>
        <label class="btn btn-default">
          <input type="radio" name="options" id="OptAll" autocomplete="off"> ALL
        </label>
      </div>
      <div class="form-check form-check-inline ">

        <label class="form-check-label  mx-1">
            <input class="form-check-input " type="checkbox" onclick="" name="ChkStromme" id="ChkStromme" value=""> Only Stromme
        </label>

    </div>
</div>
<div class="row ">
    <div class="btn-group col-sm-6" data-toggle="buttons">
        <label class="btn btn-default active">
          <input type="radio" name="options2" id="OptWithQty" autocomplete="off" checked> With Qty
        </label>
        <label class="btn btn-default">
          <input type="radio" name="options2" id="OptBlankStockSheet" autocomplete="off"> Blank Sheet
        </label>
      </div>
      <div class="form-check form-check-inline ">

        <label class="form-check-label  mx-1">
            <input class="form-check-input " type="checkbox" onclick="" name="ChkOnlyInactive" id="ChkOnlyInactive" value=""> Only Inactive Item
        </label>

    </div>
</div>
<div class="row ">
    <div class="btn-group col-sm-6" data-toggle="buttons">
        <label class="btn btn-default active">
          <input type="radio" name="options3" id="OptPullStockCal" autocomplete="off" checked> Pull Stock Cal
        </label>
        <label class="btn btn-default">
          <input type="radio" name="options3" id="OptOrderStockCal" autocomplete="off"> Order Stock Cal
        </label>
      </div>
      <div class="form-check form-check-inline ">

        <label class="form-check-label  mx-1">
            <input class="form-check-input " type="checkbox" onclick="" name="ChkOnlyNagative" id="ChkOnlyNagative" value=""> Only Nagative Stock
        </label>

    </div>
</div>
<div class="row ">
    <div class="btn-group col-sm-6" data-toggle="buttons">
        <label class="btn btn-default active">
          <input type="radio" name="options4" id="OptLandCost" autocomplete="off" > OptLandCost
        </label>
        <label class="btn btn-default">
          <input type="radio" name="options4" id="OptAvgRate" autocomplete="off" checked> Avg Rate
        </label>
      </div>

</div> --}}
                        </div>


                    <div class="progress  ">
                        <div class="progress-bar progress-bar-striped bg-success progress-bar-animated" style="width:0%">
                        </div>
                    </div>

                    <div class="row py-1">

                    </div>



                </div>
            </div>
            <div class="rounded shadow mx-auto ">
                <table class="table table-hover   " id="StockLedgertable">
                    <thead class="bg-info">
                        <tr>
                            <th style="width: 90px">Date</th>
                            <th>OrderNo</th>
                            <th>PO#</th>
                            <th class="text-center">Type</th>
                            <th class="text-center">Department</th>
                            <th style="width: 1200px">Description</th>
                            <th class="text-center">Stock&nbsp;(IN)</th>
                            <th class="text-center">Stock&nbsp;(Out)</th>
                            <th class="text-center">Balance</th>
                            <th hidden class="text-right">Price</th>
                            <th class="text-right">Amount</th>
                            {{-- <th  class="text-right">Land&nbsp;Cost</th>
            <th class="text-right">Base&nbsp;Price</th>
            <th class="text-right">Fixed&nbsp;Price</th>
            <th class="text-right">Stock&nbsp;Qty</th>
            <th class="text-right">Avg&nbsp;Cost</th>
            <th class="text-right">Amount</th> --}}

                        </tr>
                    </thead>
                    <tbody id="StockLedgertablebody">

                    </tbody>

                </table>
                <div class="row"><input type="text" name="" class="form-control col-sm-1 mx-1 ml-auto"
                        id="TxtTotStockIn"> <input type="text" name="" class="form-control col-sm-1 mx-1"
                        id="TxtTotStockOut"><input type="text" name="" class="form-control col-sm-1 mx-1"
                        id="TxtBalance"></div>
            </div>


        </div>



    </div>


@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
    <style>


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
            transform: translateX(9.5em);
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
            $('#TxtTotStockIn').val(0);
            $('#TxtTotStockOut').val(0);
            $('#TxtBalance').val(0);
            $(".progress").hide();

            //         $('.parrent').dblclick(function(e){
            //     let AcCode = $(this).data('accode');
            //     // $('#TxtAccode').val(AcCode).trigger("change");
            //     let AcName = $(this).data('acname');
            //    $('#TxtActCode').val(AcCode);
            //    $('#TxtActName').val(AcName);
            //     // alert(AcName);
            //     });

            // setTimeout(function() {
            //     //   alert('Progress bar complete!');
            //     $(".progress-bar").hide();
            //     $(".progress").hide();
            //     }, 3000);
            $('#CmbGodownName').on('change', function() {
                var selectedOptionValue = $(this).val();
                $('#TxtGodownCode').val(selectedOptionValue);
            });
            $('#searchbtn').click(function(e) {
                e.preventDefault();
                // alert('hmm');
                dataget();
            });
            $('#itemserchbtn').click(function (e) {
                e.preventDefault();
                $('#searchrmodfull').modal('show');
            });
        });
        $(document).ready(function() {

            $(document).ready(function() {
                var today = new Date().toISOString().split('T')[0];
                $('#TxtDateTo').val(today);
                let PBackLogStockDate = '{{ $FixAccountSetup->BackLogDate }}';
                //   var StockDate = new Date(PBackLogStockDate);
                var StockDate = new Date(PBackLogStockDate);
                var year = StockDate.getFullYear();
                var month = ("0" + (StockDate.getMonth() + 1)).slice(-2);
                var day = ("0" + StockDate.getDate()).slice(-2);
                var formattedDate = year + "-" + month + "-" + day;
                $('#TxtDateFrom').val(formattedDate);

                //   var StockDate = new Date(PBackLogStockDate);
                //   const LogDate = StockDate.toISOString().substring(0, 10);
                //   $('#TxtDateFrom').val(LogDate);
                //   var StockDate = new Date(PBackLogStockDate).toISOString().split('T')[0];
            });

            // dataget();
            // $('#containers').hide();
            var table = $('#StockLedgertable').DataTable({

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
            $('#StockLedgertable tbody').on('click', 'tr', function() {
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



                var table = document.getElementById("StockLedgertable");
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
                let table = document.getElementById('StockLedgertablebody');
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
            //     let table = document.getElementById('StockLedgertablebody');
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
            //     let table = document.getElementById('StockLedgertablebody');
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
                let table = document.getElementById('StockLedgertablebody');
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



                // if (!$('#ChkItemALL').prop('checked') && $('#TxtItemCode').val() === "") {
                //     $('#TxtItemCode').focus();
                //     return;
                // }

                let PVendorCode = '{{ $FixAccountSetup->StockVendorCode }}';
                let PVendorName = '{{ $FixAccountSetup->StockVendorName }}';
                // let PBackLogStockDate = '{{ $FixAccountSetup->BackLogDate }}';
                let MMStockType = '';
                // let ChkGodownAll= $("#ChkGodownAll").is(":checked");
                // let OptOrderStockCal= $("#OptOrderStockCal").is(":checked");
                let OptPullStockCal = $("#OptPullStockCal").is(":checked");
                let OptOrderStockCal = $("#OptOrderStockCal").is(":checked");
                let PBackLogStockDate = '{{ $FixAccountSetup->BackLogDate }}';

                // Create two date objects
                var form = $('#TxtDateFrom').val();
                var to = $('#TxtDateTo').val();
                var date1 = new Date(form);
                var date2 = new Date(to);
                var StockDate = new Date(PBackLogStockDate);
                // const LogDate = StockDate.toISOString().substring(0, 10);

                var year = StockDate.getFullYear();
                var month = ("0" + (StockDate.getMonth() + 1)).slice(-2);
                var day = ("0" + StockDate.getDate()).slice(-2);
                var Backlogdate = year + "-" + month + "-" + day;



                // console.log(date1);
                console.log(StockDate);
                // Compare the dates
                if (date1 < StockDate) {
                    // Date1 is less than Date2
                    alert('You can not check Before : ' + StockDate);
                    return;
                }
                if (OptOrderStockCal == true) {

                    var link = 'FillOrderCalculation';
                } else {
                    var link = 'FillPullStockCal';

                }
                // alert(link);

                if ($('#TxtLocationCode').val() == 0 || $('#TxtLocationCode').val() == '') {
                    $('#TxtLocationCode').focus();
                    return;
                }
                if ($('#TxtArticleCode').val() == 0 || $('#TxtArticleCode').val() == '') {
                    $('#TxtArticleCode').focus();
                    return;
                }
                var MDateTo = new Date($('#TxtDateTo').val());
                var Myear = MDateTo.getFullYear();
                var Mmonth = ("0" + (MDateTo.getMonth() + 1)).slice(-2);
                var Mday = ("0" + MDateTo.getDate()).slice(-2);
                MDateTo = year + "-" + month + "-" + day;

                var MDateFrom = new Date($('#TxtDateFrom').val());
                var year = MDateFrom.getFullYear();
                var month = ("0" + (MDateFrom.getMonth() + 1)).slice(-2);
                var day = ("0" + MDateFrom.getDate()).slice(-2);
                MDateFrom = year + "-" + month + "-" + day;





                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '/' + link,
                    type: 'POST',
                    timeout: 180000,
                    data: {


                        Backlogdate: Backlogdate,
                        MDateFrom: MDateFrom,
                        MDateTo: MDateTo,
                        OptPullStockCal: OptPullStockCal,
                        OptOrderStockCal: OptOrderStockCal,
                        TxtLocationCode: $('#TxtLocationCode').val(),
                        TxtDateFrom: $('#TxtDateFrom').val(),
                        TxtLocationName: $('#TxtLocationName').val(),
                        TxtArticleCode: $('#TxtArticleCode').val(),
                        TxtArticleName: $('#TxtArticleName').val(),
                        LblUom: $('#LblUom').val(),
                        TxtDateTo: $('#TxtDateTo').val(),
                        table: datatablearray,
                    },
                    beforeSend: function() {

                        $('.progress').show();
                        $(".progress-bar").animate({
                            width: "100%"

                        }, 2500);
                        // Show the overlay and spinner before sending the request
                        $('.overlay').show();
                    },
                    success: function(response) {
                        $(".progress-bar").hide();
                        $(".progress").hide();
                        console.log(response);
                        let status = response.status;
                        let data = response.StLedger;
                        var TxtTotStockIn = response.TxtTotStockIn;
                        var TxtTotStockOut = response.TxtTotStockOut;
                        var TxtBalance = response.TxtBalance;
                        $('#TxtTotStockIn').val(0.00);
                        $('#TxtTotStockOut').val(0.00);
                        $('#TxtBalance').val(0.00);
                        $('#TxtTotStockIn').val(TxtTotStockIn);
                        $('#TxtTotStockOut').val(TxtTotStockOut);
                        $('#TxtBalance').val(TxtBalance);
                        if (status == 'complete') {
                            // alert()
                            //     //   console.log(Master);
                            let table = document.getElementById('StockLedgertablebody');
                            // let ChkGodownAll= $("#ChkGodownAll").is(":checked");
                            // let GodownName = $('#CmbGodownName option:selected').text();
                            // let ChkAllDepartment= $("#ChkAllDepartment").is(":checked");
                            // let Department = $('#CmbDepartment option:selected').text();
                            table.innerHTML = ""; // Clear the table
                            var ids = 0;

                            data.forEach(function(item) {
                                ids = ids + 1;

                                //  if(ChkGodownAll == true){
                                addingrow(item);
                                // }else{
                                // if (item.GodownName == GodownName) {
                                // addingrow(item);
                                // }
                                // }



                            });
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


                // });

            });


        });



        function dataget() {
            //     if (!$('#ChkGodownAll').prop('checked')) {
            //   if (Qry !== "") Qry += " and ";
            //   Qry += "GodownName='" + $('#CmbGodownName option:selected').text() + "'";
            // }
            let TxtSearch = $('#TxtSearch').val();
            //     $.ajaxSetup({
            //   headers: {
            //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //   }
            // });

            // $.ajax({
            //   url: '/searchCurrentStockPosition',
            //   type: 'POST',
            //   data: {
            //     TxtSearch,
            //     // pono: $('#TxtClientOrder').val(),
            //   },
            //   success: function(resposne) {
            // console.log(resposne);
            //       let data = resposne.results;
            //     //   console.log(Master);
            //     let table = document.getElementById('StockLedgertablebody');
            //     table.innerHTML = ""; // Clear the table
            //     let ChkGodownAll= $("#ChkGodownAll").is(":checked");
            //     let GodownName = $('#CmbGodownName option:selected').text();
            //     let ChkAllDepartment= $("#ChkAllDepartment").is(":checked");
            //     let Department = $('#CmbDepartment option:selected').text();
            //     data.forEach(function(item) {


            //         if(ChkGodownAll == true ){
            //             addingrow(item);
            //         }else{
            //             if (item.GodownName == GodownName) {
            //                 addingrow(item);
            //             }
            //         }



            //     });



            //   }
            // });

        }

        function addingrow(item) {
            let table = document.getElementById('StockLedgertablebody');
            var date = new Date(item.Date);
            var months = ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'];
            var day = date.getDate();
            var month = months[date.getMonth()];
            var year = date.getFullYear();
            var formattedDate = day + '-' + month + '-' + year; // "17-NOV-2022"

            let row = table.insertRow();
            // var Date = new Date(item.Date);
            // const forDate = Date.toISOString().substring(0, 10);


            let DateCell = row.insertCell(0);
            DateCell.innerHTML = formattedDate;


            let VnonCell = row.insertCell(1);
            VnonCell.innerHTML = item.Vnon;

            let PONOCell = row.insertCell(2);
            PONOCell.innerHTML = item.PONO;
            // CommodityCell.hidden = true;


            let TypeCell = row.insertCell(3);
            TypeCell.innerHTML = item.Type;
            // GodownCodeCell.hidden = true;

            let DepartmentNameCell = row.insertCell(4);
            DepartmentNameCell.innerHTML = item.DepartmentName;

            let DesCell = row.insertCell(5);
            DesCell.innerHTML = item.Des;

            let StockInCell = row.insertCell(6);
            StockInCell.innerHTML = item.StockIn;
            StockInCell.style.textAlign = 'right';
            // QuantityCell.hidden = true;

            // $StLedger =StLedger::Select('Date','Vnon','PONO','Type','DepartmentName','Des','StockIn','StockOut','Balance','Rate','Amount')->where('WorkUser',$MWorkUser)->where('BranchCode',$MBranchCode)->orderBy('Date')->orderBy('Vnon')->orderBy('Type','desc')->get();
            let StockOutCell = row.insertCell(7);
            StockOutCell.innerHTML = item.StockOut;
            StockOutCell.style.textAlign = 'right';

            let BalanceCell = row.insertCell(8);
            BalanceCell.innerHTML = item.Amount ? parseFloat(item.Balance).toFixed(2) : 0.00;
            BalanceCell.style.textAlign = 'right';

            // OrgineNameCell.hidden = true;

            let AmountCell = row.insertCell(9);
            AmountCell.innerHTML = item.Amount ? parseFloat(item.Amount).toFixed(2) : 0.00;
            AmountCell.style.textAlign = 'right';

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
            // // AvgRateCell.hidden = true;
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
                let table = document.getElementById('StockLedgertablebody');
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
