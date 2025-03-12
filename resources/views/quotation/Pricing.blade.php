@extends('layouts.app')



@section('title', 'Pricing')

@section('content_header')
@stop

@section('content')
    </div>
    <div class="container-fluid p-2 ">

        <div class="col-lg-12">
            <div class="card
             {{-- collapsed-card  --}}
             ">
                <div style="background-color:#EEE" class="card-header">
                    <div class="card-tools ">
                        <h5 class="card-title mt-1 text-blue">Pricing Module</h5>

                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                    <div class="row">

                        <div class="col-sm-2 row ml-2 ">
                            <label class="col-sm-5 col-form-label" for="quote_no">Quotation # :</label>
                            <input type="number" step="1" id="quote_no" value="{{ $quote_no }}"
                                class="form-control col-sm-5 ml-2">
                        </div>

                        <div class="col-form-label  ml-5 ">
                            /&nbsp; <strong>Event # :&nbsp;</strong> <label class="event_no  text-blue"
                                for="event_no" id="Event_no"></label>

                        </div>
                        <div class="col-form-label  ml-5 ">
                            /&nbsp; <strong>Customer :&nbsp;</strong> <label class="customer text-blue"
                                for="customer"></label>

                        </div>
                        <div class="col-form-label  ml-5 ">
                            /&nbsp; <strong>Vessel :&nbsp;</strong> <label class="vessel text-blue" for="vessel"></label>

                        </div>
                        <div class="col-form-label  ml-5 ">
                            /&nbsp; <strong>Customer Ref # :&nbsp;</strong> <label class="customer_ref_no text-blue"
                                for="customer_ref_no"></label>

                        </div>
                        <div class="col-form-label  ml-5 ">
                            /&nbsp; <strong>Department Name :&nbsp;</strong> <label class="departmentname text-blue"
                                id="departmentname" for="departmentname"></label>

                        </div>


                    </div>



                </div>
                <div class="card-body">
                    <div class="row ">
                        <div class="inputbox col-sm-2 py-2">
                            <input type="date" class="" value="" id="QDate" name="QDate" readonly>
                            <span class="ml-2 Txtspan">
                                QDate
                            </span>
                        </div>
                        <div class="inputbox col-sm-1 py-2">
                            <input type="number" class="" value="" id="depcode" name="depcode" readonly>
                            <span class="ml-2 Txtspan">
                                DepCode
                            </span>
                        </div>
                        <div class="inputbox col-sm-2 py-2">
                            <span class="Txtspan">
                                Department
                            </span>
                            <select class="" name="cmpdept" id="cmpdept">
                                @foreach ($Department as $Ditem)
                                    <option value="{{ $Ditem->TypeCode }}">{{ $Ditem->TypeName }}</option>
                                @endforeach

                            </select>

                            </select>
                        </div>




                    </div>
                    <div class="row py-2">

                        <div class="inputbox col-sm-2 ">
                            <input type="date" class="" value="" id="l6month" name="l6month" readonly>
                            <span class="ml-2 Txtspan">
                                Last 6 Month
                            </span>
                        </div>
                        <div class="inputbox col-sm-2 ">
                            <input type="date" class="" value="" id="l3month" name="l3month" readonly>
                            <span class="ml-2 Txtspan">
                                Last 3 Month
                            </span>
                        </div>
                        <div class="inputbox col-sm-2 ml-auto">
                            <input type="number" class="" value="0" id="gps" name="gp">
                            <span class="ml-2 Txtspan">
                                GP%
                            </span>
                        </div>
                        <div class="inputbox col-sm-2 ">
                            <input type="number" class="" value="0" id="markcup" name="Markup%">
                            <span class="ml-2 Txtspan">
                                Markup%
                            </span>
                        </div>

                    </div>



                    <div class="  p-2">

                        <table class="table " id="pricinggrid">
                            <thead class="bg-info">
                                <tr>
                                    <th>SR&nbsp;#</th>
                                    <th>IMPA&nbsp;Code</th>
                                    <th>Item&nbsp;Code</th>
                                    <th style="width: 450px">Description</th>
                                    <th>Qty</th>
                                    <th>Unit</th>
                                    <th style="width: 300px">Vendor&nbsp;Name</th>
                                    <th>Vendor&nbsp;Code</th>
                                    <th class="text-right">Land&nbsp;Cost</th>
                                    <th>Price&nbsp;Type</th>
                                    <th class="text-right">Sell&nbsp;Price</th>
                                    <th class="text-right">EST&nbsp;Total</th>
                                    <th>GP&nbsp;%</th>
                                    <th>Markup&nbsp;%</th>
                                    <th class="text-right">Purchase&nbsp;Amount</th>
                                    <th class="text-right">Profit&nbsp;Amount</th>
                                    <th>Customer&nbsp;Note</th>
                                    <th hidden>id</th>
                                    <th hidden>sell</th>

                                </tr>
                            </thead>
                            <tbody id="pricingtable">


                            </tbody>
                        </table>


                    </div>
                </div>
            </div>




        </div>
        <div class="card">
            <div class="card-body">


                <div class="col-lg-12 p-2" id="footer">

                    <div class="row p-1">
                        <div class="inputbox col-sm-2 ">
                            <input type="number" class="" readonly value="" id="saleamount" name="SaleAmount"
                                onblur="reSum()">
                            <span class="ml-2 Txtspan">
                                Sale Amount
                            </span>
                        </div>
                        <div class="inputbox col-sm-2 ">
                            <input type="number" class="" readonly value="" id="totalcoast" name="TotalCost"
                                onblur="reSum()">
                            <span class="ml-2 Txtspan">
                                Total Cost
                            </span>
                        </div>
                        <div class="inputbox col-sm-2 ">
                            <input type="number" class="" readonly value="" id="profitper" name="Profit">
                            <span class="ml-2 Txtspan">
                                Profit %
                            </span>
                        </div>
                        <div class="inputbox col-sm-2 ">
                            <input type="number" class="" readonly value="" id="profitamount" name="ProfitAmount">
                            <span class="ml-2 Txtspan">
                                Profit Amount
                            </span>
                        </div>

                        <div class="CheckBox1 ">
                            <label class="input-group text-info ml-1">
                                <input class="" type="checkbox" name="ChkPricing" id="ChkPricing"
                                    value=""> Sell Pricied
                            </label>
                        </div>




                    </div>
                    <div class="col-lg-12 ">
                        <div class="row py-2">
                            <div class="inputbox col-sm-1 ">
                                <input type="number" class="" value="{{ $citem ? $citem->CashDiscPer : 0 }}"
                                    id="cashdisper" readonly name="cashdisper">
                                <span class=" Txtspan">
                                    Cash Disc
                                </span>
                            </div>
                            <div class="inputbox col-sm-1 ">
                                <input type="number" class="" readonly value="" id="cahsl"
                                    onblur="dissum()" name="cashdisper">
                                <span class="Txtspan">
                                    Cash Disc
                                </span>
                            </div>

                            <div class="inputbox col-sm-1 ">
                                <input type="number" class="" value="{{ $citem ? $citem->CreditNotePer : 0 }}"
                                    id="crnoper" readonly name="crnoper">
                                <span class=" Txtspan">
                                    Credit Note
                                </span>
                            </div>
                            <div class="inputbox col-sm-1 ">
                                <input type="number" class="" readonly value="" id="crl"
                                    onblur="dissum()" name="crl">
                                <span class="Txtspan">
                                    Credit Note
                                </span>
                            </div>

                            <div class="inputbox col-sm-1 ">
                                <input type="number" class="" value="{{ $citem ? $citem->RebaitPer : 0 }}"
                                    id="avireb" readonly name="avireb">
                                <span class=" Txtspan">
                                    Avi Rebate
                                </span>
                            </div>
                            <div class="inputbox col-sm-1 ">
                                <input type="number" class="" readonly value="" id="avirl"
                                    onblur="dissum()" name="avirl">
                                <span class="Txtspan">
                                    Avi Rebate
                                </span>
                            </div>

                            <div class="inputbox col-sm-1 ">
                                <input type="number" class="" value="{{ $citem ? $citem->RebaitPer : 0 }}"
                                    id="volumedis" readonly name="volumedis">
                                <span class=" Txtspan">
                                    Volume Disc
                                </span>
                            </div>
                            <div class="inputbox col-sm-1 ">
                                <input type="number" class="" readonly value="" id="volumel"
                                    onblur="dissum()" name="volumel">
                                <span class="Txtspan">
                                    Volume Disc
                                </span>
                            </div>


                            <div class="inputbox col-sm-1 ">
                                <input type="number" class="" value="{{ $citem ? $citem->SalesManCommPer : 0 }}"
                                    id="slscom" readonly name="slscom">
                                <span class=" Txtspan">
                                    SLs Comm
                                </span>
                            </div>
                            <div class="inputbox col-sm-1 ">
                                <input type="number" class="" value="" id="slsl" onblur="dissum()"
                                    name="slsl">
                                <span class="Txtspan">
                                    SLs Comm
                                </span>
                            </div>

                        </div>
                        <div class="row py-1">

                            <div class="inputbox col-sm-2 ">
                                <input type="number" class="" value="" id="txttotal" readonly
                                    onblur="dissum()" name="Total">
                                <span class="Txtspan">
                                    Total
                                </span>
                            </div>
                            <div class="inputbox col-sm-2 ">
                                <input type="number" class="" value="" id="EstNetProfit" readonly
                                    name="EstNetProfit">
                                <span class="Txtspan">
                                    Est Net Profit
                                </span>
                            </div>
                            <div class="inputbox col-sm-2 ">
                                <input type="number" class="" value="" id="TxtGPPer" readonly
                                    name="GP">
                                <span class="Txtspan">
                                    GP %
                                </span>
                            </div>
                            <div class="inputbox col-sm-2 ">
                                <input type="number" class="" value="" id="TxtMarkUPPer" readonly
                                    name="Markup">
                                <span class="Txtspan">
                                    Markup %
                                </span>
                            </div>



                            <a name="" id="" class="btn btn-info mr-1 ml-auto col-sm-1"
                                href="{{ url()->previous() }}" role="button">Back</a>
                            <button type="submit" id="submit" class="btn btn-success col-sm-1 ml-1 ">Save</button>
                            <div class="CheckBox1 mt-2 ml-2">
                                <label class="input-group text-info ml-1">
                                    <input class="" type="checkbox" name="ChkCompleteRFQ" id="ChkCompleteRFQ"
                                        value=""> Costed
                                </label>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>















@stop

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">


    <style>
        header {
            width: 100%;
            height: 6vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        header h3 {
            position: absolute;
            width: 55%;
            font-size: 25px;
            font-weight: 600;
            color: transparent;
            background-image: linear-gradient(to right, #553c9a, #ee4b2b, #00c2cb, #ff7f50, #553c9a);
            -webkit-background-clip: text;
            background-clip: text;
            background-size: 200%;
            background-position: -200%;
            transition: all ease-in-out 2s;
            cursor: pointer;
        }

        header h3:hover {
            background-position: 200%;
        }
    </style>
@stop

@section('js')

    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
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
        function ajaxSetup() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        };
        $(document).ready(function() {
            var table1 = $('#pricinggrid').DataTable({
                scrollY: 600,
                scrollX: true,
                deferRender: true,
                scroller: true,
                paging: false,
                info: false,
                ordering: false,
                searching: false,
                responsive: true,

            });
            DataGet();

            $('#gps').keypress(function(e) {
                if (e.which == 13) {
                    gpset();

                }
            });
            $('#markcup').keypress(function(e) {
                if (e.which == 13) {
                    markupset();

                }
            });
            $('#gps').blur(function(e) {
                e.preventDefault();
                gpset();
            });


            $('#markcup').blur(function(e) {
                e.preventDefault();
                markupset();
            });
            $('#quote_no').blur(function(e) {
                e.preventDefault();
                DataGet();
            });


            function DataGet() {
                var quote_no = $('#quote_no').val();

                ajaxSetup();
                $.ajax({
                    url: '{{ URL::to('PricingGet') }}',

                    type: "POST",
                    data: {
                        quote_no,
                    },
                    beforeSend: function() {
                        $('.overlay').show();
                    },
                    success: function(response) {
                        console.log(response);
                        var Customerdata = response.customerdata;
                        var data = response.quotesdetails;
                        var quotesmaster = response.quotesmaster;

                        if (quotesmaster) {
                            $('.event_no').text(quotesmaster.EventNo);
                            $('#quote_no').val(quotesmaster.QuoteNo);
                            $('.customer').text(quotesmaster.CustomerName);
                            $('.vessel').text(quotesmaster.VesselName);
                            $('.customer_ref_no').text(quotesmaster.CustomerRefNo);
                            $('#departmentname').text(quotesmaster.DepartmentName);
                            var Rdate = new Date(quotesmaster.QDate);
                            const ReceivedDate = Rdate.toISOString().substring(0, 10);
                            $('#QDate').val(ReceivedDate);
                            $('#depcode').val(quotesmaster.DepartmentCode);
                            $('#cmpdept').val(quotesmaster.DepartmentCode);
                            if (quotesmaster.ChkCosting) {
                                $('#ChkCompleteRFQ').prop("checked", true);
                            }else{
                                $('#ChkCompleteRFQ').prop("checked", false);

                            }
                            if (quotesmaster.ChkPricing) {
                                $('#ChkPricing').prop("checked", true);
                            }else{
                                $('#ChkPricing').prop("checked", false);

                            }
                        }
                        let ids = 0;
                        var sum = 0;
                        var sumt = 0;
                        var qty = 0;
                        var ven = 0;
                        var totalcost = 0;
                        var EstFreight = 0;
                        var estfrig = 0;
                        let table = document.getElementById('pricingtable');
                        if (data.length > 0) {
                            table.innerHTML = "";
                            data.forEach(function(item) {
                                let row = table.insertRow();
                                ids = ids + 1;

                                function createCell(content) {
                                    let cell = row.insertCell();
                                    cell.innerHTML = content;
                                    return cell;
                                }
                                createCell(ids);
                                createCell(item.IMPAItemCode);
                                createCell(item.ItemCode);
                                createCell(item.ItemName);
                                createCell(item.Qty);
                                createCell(item.PUOM);
                                createCell(item.VendorName);
                                createCell(item.VendorCode);
                                createCell(parseFloat(parseFloat(item.VendorPrice ? item
                                    .VendorPrice : 0) + parseFloat(item.Freight ?
                                    item.Freight : 0)).toFixed(2)).style.textAlign = 'right';
                                createCell('');
                                var suggestprice = createCell(parseFloat(item.SuggestPrice ?
                                    item.SuggestPrice : 0).toFixed(2));
                                suggestprice.style.textAlign = 'right';
                                suggestprice.onblur = calc;
                                suggestprice.style.Align = 'right';


                                var est = parseFloat((item.SuggestPrice ? item.SuggestPrice :
                                    0) * (item.Qty ? item.Qty : 0)).toFixed(2);
                                var newCell = createCell(est);
                                newCell.style.textAlign = 'right';
                                newCell.style.Align = 'right';

                                var gppercentage = item.MProfitAmt ? parseFloat(((item
                                        .MProfitAmt ? item.MProfitAmt : 1) / est) * 100)
                                    .toFixed(2) : 0;
                                var gppercentageCell = createCell(gppercentage);
                                gppercentageCell.style.textAlign = 'right';
                                gppercentageCell.onblur = calc;

                                var markuppercentage = est ? parseFloat(((est ? est : 1) / (item
                                        .purchse ? item.purchse : 1)) * 100 - 100).toFixed(2) :
                                    0;
                                var markuppercentageCell = createCell(markuppercentage);
                                markuppercentageCell.style.textAlign = 'right';
                                markuppercentageCell.onblur = calc;

                                var purchse = parseFloat((item.VendorPrice ? item.VendorPrice :
                                    0) * (item.Qty ? item.Qty : 0)).toFixed(2);
                                var purchseCell = createCell(purchse);
                                purchseCell.contentEditable = 'true';
                                purchseCell.onblur = calc;
                                purchseCell.style.textAlign = 'right';

                                var mProfitAmt = parseFloat(est - purchse).toFixed(2);
                                var mProfitAmtCell = createCell(mProfitAmt);
                                mProfitAmtCell.style.textAlign = 'right';
                                createCell(item.CustomerNotes);
                                createCell(item.Id).hidden = 'true';
                                var lcost = parseFloat((item.VendorPrice ? item.VendorPrice :
                                    0) + (item.Freight ? item.Freight : 0)).toFixed(2);
                                createCell(lcost).hidden = 'true';



                                sum += Number(item.Total);
                                ven = item.VendorPrice;
                                qty = item.Qty;
                                totalcost = ven * qty;
                                sumt += Number(totalcost);
                                estfrig = item.FreightRate;
                                EstFreight = qty * estfrig;

                            });
                            table1.columns.adjust();
                            $('#totalcoast').val(sumt);
                            $('#saleamount').val(sum);
                        }
                        redy();

                    },
                    complete: function() {
                        $('.overlay').hide();
                    }
                });


                // reSum();
                // dissum();
            };

        });



    </script>


    <script>
        $(document).on("click", "#submit", function() {

            if(!$('#ChkPricing').prop("checked")){

                if (confirm("Have you Completed Sell Pricied?")) {
                    $('#ChkPricing').prop("checked", true);
                } else {
                    return;
                }
            }

            tablecomposer();
            let QuoteNo = $('#quote_no').val();
            let EventNo = $('.event_no').text();
            let QDate = $('#QDate').val();
            let depcode = $('#depcode').val();
            let SaleAmount = $('#saleamount').val();
            let TotalCost = $('#totalcoast').val();
            let Profit = $('#profitper').val();
            let ProfitAmount = $('#profitamount').val();
            let Total = $('#txttotal').val();
            let EstNetProfit = $('#EstNetProfit').val();
            let GP = $('#TxtGPPer').val();
            let Markup = $('#TxtMarkUPPer').val();
            let ChkPricing = $('#ChkPricing').prop("checked");

            // console.log(datatablearray);
            // alert('datatablearray');





            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '{{ URL::to('pricing-store') }}',

                type: "POST",
                data: {
                    datatablearray,
                    QuoteNo,
                    EventNo,
                    depcode,
                    QDate,
                    SaleAmount,
                    TotalCost,
                    Profit,
                    ProfitAmount,
                    Total,
                    EstNetProfit,
                    GP,
                    Markup,
                    ChkPricing,
                },
                beforeSend: function() {
                    // Show the overlay and spinner before sending the request
                    $('.overlay').show();
                },

                success: function(response) {
                    console.log(response);

                    // return redirect('quotation?quote_no='.$quote_no)->with('status', 'Pricing Updated');
                    if (response.Message) {
                        Swaal.fire({
                            icon: 'success',
                            title: 'Prices Updated',
                            text: 'Your Prices Has Been Updated!',
                            showConfirmButton: true,
                            timer: 2500
                        }).then(() => {
                            window.location.href = "/quotation?quote_no=" + response.quote_no + "&status=Pricing IS Updated Success";
                        });

                    } else {
                        Swaal.fire({
                            icon: 'error',
                            title: 'error',
                            text: 'Your Prices Has Not Been Updated!',
                            showConfirmButton: true,
                        })
                        // window.location.href = "/quotation?quote_no=" + $response.quote_no +
                        //     "&error=Pricing Not updated Check Again";
                    }
                    // return redirect('quotation?quote_no='.$quote_no)->with(['error' => 'Pricing Not updated Check Again']);

                    // document.getElementById("pricingform").reset();
                },
                complete: function() {
                    // Hide the overlay and spinner after the request is complete
                    $('.overlay').hide();
                }
            });



        });


        function tablecomposer() {
            let table = document.getElementById('pricingtable');
            let rows = table.rows;
            datatablearray = [];
            for (let i = 0; i < rows.length; i++) {
                let cells = rows[i].cells;
                datatablearray.push({

                    SNo: cells[0] ? cells[0].innerHTML : '',
                    IMPAItemCode: cells[1] ? cells[1].innerHTML : '',
                    ItemCode: cells[2] ? cells[2].innerHTML : '',
                    ItemName: cells[3] ? cells[3].innerHTML : '',
                    Qty: cells[4] ? cells[4].innerHTML : '',
                    PUOM: cells[5] ? cells[5].innerHTML : '',
                    VendorName: cells[6] ? cells[6].innerHTML : '',
                    VendorCode: cells[7] ? cells[7].innerHTML : '',
                    VendorPrice: cells[8] ? cells[8].innerHTML : '',
                    Pricetype: cells[9] ? cells[9].innerHTML : '',
                    SuggestPrice: cells[10] ? cells[10].innerHTML : '',
                    Total: cells[11] ? cells[11].innerHTML : '',
                    GPRate: cells[12] ? cells[12].innerHTML : '',
                    markuppercentage: cells[13] ? cells[13].innerHTML : '',
                    TotalCost: cells[14] ? cells[14].innerHTML : '',
                    GPAmount: cells[15] ? cells[15].innerHTML : '',
                    CustomerNotes: cells[16] ? cells[16].innerHTML : '',
                    Id: cells[17] ? cells[17].innerHTML : '',





                });

            }

        }

        function calc() {


            reSum();
            reSum();

        }

        function gpset() {
            let table = document.getElementById('pricingtable');
            let gpvalue = $('#gps').val();
            let addvalue = 0;

            let rows = table.rows;


            for (let i = 0; i < rows.length; i++) {
                let cells = rows[i].cells;

                let SuggestPriceCell = cells[8];
                let SuggestPriceCella = cells[10];
                let SuggestCell = cells[18];
                let originalSuggestPrice = parseFloat(SuggestPriceCell.innerHTML);
                let originalSuggest = parseFloat(SuggestCell.innerHTML);

                let LandCost = parseFloat(cells[8].innerHTML);

                cells[12].innerHTML = gpvalue;
                addvalue = ((LandCost / 100) * gpvalue);
                let newSuggestPrice = parseFloat(addvalue + originalSuggest).toFixed(2);

                // Reset the SuggestPrice to its original value before updating it with the new GP value
                // SuggestPriceCell.innerHTML = originalSuggestPrice;
                SuggestPriceCella.innerHTML = newSuggestPrice;
            }

            reSum();
            reSum();
            reSum();
            dissum();
        }

        function markupset() {
            // let table = document.getElementById('pricingtable');
            // let markupvalue = $('#markcup').val();

            // let rows = table.rows;
            // let MCostRate = 0;
            // let MGPAmt = 0;
            // let MSellRate = 0;
            // let TxtDeliveredQty = 0;
            // let TxtGPCostAmt = 0;
            // let actperc = 0;
            // for (let i = 0; i < rows.length; i++) {
            //     let cells = rows[i].cells;
            //     Sno = cells[0].innerHTML;
            //     IMPAItemCode = cells[1].innerHTML;
            //     ItemCode = cells[2].innerHTML;
            //     ItemName = cells[3].innerHTML;
            //     Qty = cells[4].innerHTML;
            //     PUOM = cells[5].innerHTML;
            //     VendorName = cells[6].innerHTML;
            //     VendorCode = cells[7].innerHTML;
            //     LandCost = cells[8].innerHTML;
            //     Pricetype = cells[9].innerHTML;
            //     SuggestPrice = cells[10].innerHTML;
            //     Esttotal = cells[11].innerHTML;
            //     gppercentage = cells[12].innerHTML;
            //     markuppercentage = cells[13].innerHTML;
            //     purchse = cells[14].innerHTML;
            //     MProfitAmt = cells[15].innerHTML;
            //     CustomerNotes = cells[16].innerHTML;
            //     Id = cells[17].innerHTML;



            //     cells[13].innerHTML = markupvalue;
            //     cells[14].innerHTML = parseFloat(LandCost * Qty).toFixed(2);

            //     actperc = markupvalue / 100;
            //     MCostRate = LandCost;
            //     MGPAmt = MCostRate * actperc;
            //     MSellRate = parseFloat(MCostRate) + parseFloat(MGPAmt);
            //     //  MGPAmt = MCostRate*markupvalue/100;
            //     //  MGPAmt = MCostRate-SuggestPrice;

            //     cells[10].innerHTML = parseFloat(MSellRate).toFixed(2);
            //     cells[11].innerHTML = parseFloat(MSellRate * Qty).toFixed(2);
            //     cells[15].innerHTML = parseFloat(Esttotal - purchse).toFixed(2);
            //     cells[12].innerHTML = parseFloat(MProfitAmt / Esttotal * 100).toFixed(2);




            //     // console.log(GPRate);
            //     // TxtTotalQty +=Number(Orderqty);
            //     // TxtTotalRecQty +=Number(Recvdqty);
            //     // TxtTotalNotRecQty +=Number(NotRecvdqty);
            //     // TxtDeliveredQty +=Number(Deliveryqty)
            //     // TxtGPCostAmt+=Number(Orderqty*vendorprice);
            //     // console.log('MCostRate'+MCostRate);
            //     // console.log('MGPAmt'+MGPAmt);
            //     // console.log('MSellRate'+MSellRate);
            //     // console.log('SuggestPrice'+SuggestPrice);
            //     // console.log('Esttotal'+Esttotal);
            //     // console.log('gppercentage'+gppercentage);
            //     // console.log('MProfitAmt'+MProfitAmt);
            // }

            let table = document.getElementById('pricingtable');
            let markupPercentage = parseFloat($('#markcup').val());
            let rows = table.rows;


            for (let i = 0; i < rows.length; i++) {
                let cells = rows[i].cells;

                let LandCostCell = cells[8];
                let MarkupCell = cells[13];
                let SuggestPriceCella = cells[10];
                let originalLandCost = parseFloat(LandCostCell.innerHTML);
                let originalMarkup = parseFloat(MarkupCell.innerHTML);
                let originalSuggestPrice = parseFloat(SuggestPriceCella.innerHTML);

                let markupAmount = (originalLandCost * markupPercentage) / 100;
                let newMarkup = markupPercentage + markupAmount;
                let newSuggestPrice = originalSuggestPrice + markupAmount;

                MarkupCell.innerHTML = newMarkup.toFixed(2);
                SuggestPriceCella.innerHTML = newSuggestPrice.toFixed(2);
            }

            reSum();
            dissum();
        }

        // $(document).ready(function() {
        function redy() {

            let table = document.getElementById('pricingtable');
            // let markupvalue = $('#markcup').val();
            let tsaleamount = 0;
            let ttotalcoast = 0;
            let tprofitamount = 0;
            let tprofitper = 0;

            let rows = table.rows;
            let aphaA = 0;
            let mmark = 0;
            let MSellRate = 0;
            let TxtDeliveredQty = 0;
            let TxtGPCostAmt = 0;
            for (let i = 0; i < rows.length; i++) {
                let cells = rows[i].cells;
                Sno = cells[0].innerHTML;
                IMPAItemCode = cells[1].innerHTML;
                ItemCode = cells[2].innerHTML;
                ItemName = cells[3].innerHTML;
                Qty = cells[4].innerHTML;
                PUOM = cells[5].innerHTML;
                VendorName = cells[6].innerHTML;
                VendorCode = cells[7].innerHTML;
                LandCost = cells[8].innerHTML;
                Pricetype = cells[9].innerHTML;
                SuggestPrice = cells[10].innerHTML;
                Esttotal = cells[11].innerHTML;
                gppercentage = cells[12].innerHTML;
                markuppercentage = cells[13].innerHTML;
                purchse = cells[14].innerHTML;
                MProfitAmt = cells[15].innerHTML;
                CustomerNotes = cells[16].innerHTML;
                Id = cells[17].innerHTML;





                cells[11].innerHTML = parseFloat(SuggestPrice * Qty).toFixed(2);
                aphaA = parseFloat(Qty * LandCost, 2);
                cells[14].innerHTML = aphaA;
                cells[15].innerHTML = parseFloat(Esttotal - purchse).toFixed(2);

                mmark = SuggestPrice - LandCost;
                if (mmark == 0) {
                    mmark = 1;
                }
                cells[13].innerHTML = parseFloat((mmark / LandCost) * 100).toFixed(2);
                cells[12].innerHTML = parseFloat((MProfitAmt / purchse) * 100).toFixed(2);


                tsaleamount += Number(Esttotal);
                ttotalcoast += Number(aphaA);
                // TxtTotalRecQty +=Number(Recvdqty);

            }
            $('#saleamount').val(parseFloat(tsaleamount).toFixed(2));
            $('#totalcoast').val(parseFloat(ttotalcoast).toFixed(2));
            $('#profitamount').val(parseFloat(tsaleamount - ttotalcoast).toFixed(2));
            let = profitamountget = $('#profitamount').val();
            $('#profitper').val(parseFloat(profitamountget / ttotalcoast * 100).toFixed(2));




            dissum();
            // reSumw();
            reSum()
        }
        // });
    </script>


    <script>
        function reSum() {
            let table = document.getElementById('pricingtable');
            // let markupvalue = $('#markcup').val();
            let tsaleamount = 0;
            let ttotalcoast = 0;
            let tprofitamount = 0;
            let tprofitper = 0;
            let rows = table.rows;
            let aphaA = 0;
            let mmark = 0;
            let MSellRate = 0;
            let TxtDeliveredQty = 0;
            let TxtGPCostAmt = 0;
            for (let i = 0; i < rows.length; i++) {
                let cells = rows[i].cells;
                Sno = cells[0].innerHTML;
                IMPAItemCode = cells[1].innerHTML;
                ItemCode = cells[2].innerHTML;
                ItemName = cells[3].innerHTML;
                Qty = cells[4].innerHTML;
                PUOM = cells[5].innerHTML;
                VendorName = cells[6].innerHTML;
                VendorCode = cells[7].innerHTML;
                LandCost = cells[8].innerHTML;
                Pricetype = cells[9].innerHTML;
                SuggestPrice = cells[10].innerHTML;
                Esttotal = cells[11].innerHTML;
                gppercentage = cells[12].innerHTML;
                markuppercentage = cells[13].innerHTML;
                purchse = cells[14].innerHTML;
                MProfitAmt = cells[15].innerHTML;
                CustomerNotes = cells[16].innerHTML;
                Id = cells[17].innerHTML;


                cells[11].innerHTML = parseFloat(SuggestPrice * Qty).toFixed(2);
                aphaA = Qty * LandCost;
                cells[14].innerHTML = parseFloat(aphaA).toFixed(2);
                cells[15].innerHTML = parseFloat(Esttotal - purchse).toFixed(2);
                mmark = SuggestPrice - LandCost;
                if (mmark == 0) {
                    mmark = 1;
                }
                cells[13].innerHTML = parseFloat((mmark / LandCost) * 100).toFixed(2);
                cells[12].innerHTML = parseFloat((MProfitAmt / purchse) * 100).toFixed(2);



                tsaleamount += Number(Esttotal);
                ttotalcoast += Number(aphaA);
                // console.log(GPRate);
                // TxtTotalQty +=Number(Orderqty);
                // TxtTotalRecQty +=Number(Recvdqty);
                // TxtTotalNotRecQty +=Number(NotRecvdqty);
                // TxtDeliveredQty +=Number(Deliveryqty)
                // TxtGPCostAmt+=Number(Orderqty*vendorprice);
                // console.log('aphaA'+aphaA);
                // console.log('mmark'+mmark);
                // console.log('markuppercentage'+markuppercentage);
                // console.log('SuggestPrice'+SuggestPrice);
                // console.log('Esttotal'+Esttotal);
                // console.log('gppercentage'+gppercentage);
                // console.log('purchse'+purchse);
                // console.log('MProfitAmt'+MProfitAmt);
            }
            $('#saleamount').val(parseFloat(tsaleamount).toFixed(2));
            $('#totalcoast').val(parseFloat(ttotalcoast).toFixed(2));
            $('#profitamount').val(parseFloat(tsaleamount - ttotalcoast).toFixed(2));
            let = profitamountget = $('#profitamount').val();
            $('#profitper').val(parseFloat(profitamountget / ttotalcoast * 100).toFixed(2));

            dissum();

        }

        function dissum() {

            // reSumw()
            var cashdisper = (document.getElementById("cashdisper").value);
            var crnoper = (document.getElementById("crnoper").value);
            var avireb = (document.getElementById("avireb").value);
            var volumedis = (document.getElementById("volumedis").value);
            var slscom = (document.getElementById("slscom").value);
            var saleamount = (document.getElementById("saleamount").value);
            var totalcoast = (document.getElementById("totalcoast").value);
            var TGPPer = (document.getElementById("TxtGPPer").value);
            var TMarkUPPer = (document.getElementById("TxtMarkUPPer").value);
            var cashl = (saleamount) * (cashdisper) / 100;
            txttotal = saleamount - crnoper + +cashdisper + +avireb + +volumedis + +slscom;
            txtEstnet = txttotal - totalcoast;
            TxtGPPer = txtEstnet / txttotal * 100;
            TxtMarkUPPer = txtEstnet / totalcoast * 100;
            var MSaleAmtAfterDisc = "";
            var TxtCashDIsc = parseFloat(cashl * 100) / 100;
            document.getElementById("txttotal").value = parseFloat((txttotal * 100) / 100).toFixed(2);
            document.getElementById("EstNetProfit").value = parseFloat((txtEstnet * 100) / 100).toFixed(2);
            document.getElementById("TxtGPPer").value = parseFloat((TxtGPPer * 100) / 100).toFixed(2);
            document.getElementById("TxtMarkUPPer").value = parseFloat((TxtMarkUPPer * 100) / 100).toFixed(2);

            if (cashdisper > 0) {
                (document.getElementById("cahsl").value) = TxtCashDIsc;
            } else {
                (document.getElementById("cahsl").value) = 0
            }
            MSaleAmtAfterDisc = (saleamount) - (TxtCashDIsc);
            var crl = (MSaleAmtAfterDisc) * (crnoper) / 100;
            var TxtCreditNote = parseFloat((crl * 100) / 100).toFixed(2);

            if (crnoper > 0) {
                (document.getElementById("crl").value) = TxtCreditNote;
            } else {
                (document.getElementById("crl").value) = 0
            }
            MSaleAmtAfterDisc = (saleamount) - (TxtCashDIsc) + (+TxtCreditNote);
            var avirl = (MSaleAmtAfterDisc) * (avireb) / 100;
            var TxtRebate = parseFloat((avirl * 100) / 100).toFixed(2);

            if (avireb > 0) {
                (document.getElementById("avirl").value) = TxtRebate;
            } else {
                (document.getElementById("avirl").value) = 0
            }
            MSaleAmtAfterDisc = (saleamount) - (TxtCashDIsc) + (+TxtCreditNote) + (+TxtRebate);
            var volumel = (MSaleAmtAfterDisc) * (volumedis) / 100;
            var TxtAgentComm = parseFloat((volumel * 100) / 100).toFixed(2);

            if (volumedis > 0) {
                (document.getElementById("volumel").value) = TxtAgentComm;
            } else {
                (document.getElementById("volumel").value) = 0
            }
            MSaleAmtAfterDisc = (saleamount) - (TxtCashDIsc) + (+TxtCreditNote) + (+TxtRebate) + (+TxtAgentComm);
            var slsl = (MSaleAmtAfterDisc) * (slscom) / 100;
            var TxtSLSComm = parseFloat((slsl * 100) / 100).toFixed(2);

            if (slscom > 0) {
                (document.getElementById("slsl").value) = TxtSLSComm
            } else {
                (document.getElementById("slsl").value) = 0
            }
            txttotal = (saleamount) - ((TxtCreditNote) + (TxtCashDIsc) + (TxtRebate) + (TxtAgentComm) + (TxtSLSComm))


        }
    </script>
@stop


@section('content')
