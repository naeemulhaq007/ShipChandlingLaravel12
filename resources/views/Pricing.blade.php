@extends('layouts.app')



@section('title', 'Pricing')

@section('content_header')
@stop

@section('content')
</div>
<div class="container-fluid p-2 ">

    <div class="col-lg-12">
        {{-- <div class="card collapsed-card small">
            <div  style="background-color:#EEE" class="card-header">
                <div class="card-tools ">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
        </button>
    </div>
                <!-- h5 class="card-title"></h5 -->
                <div class="row">

                                <div class="col-sm-2 row ml-2 ">
                                    <label class="col-sm-5 col-form-label" for="quote_no">Quotation # :</label>
                                    <input type="number" step="1" id="quote_no" class="form-control col-sm-5 ml-2">
                                </div>

                                <div class="col-form-label  ml-5 ">
                                    /&nbsp; <strong>Event # :&nbsp;</strong> <label class="event_no text-blue" for="event_no"></label>

                                </div>
                                <div class="col-form-label  ml-5 ">
                                    /&nbsp;  <strong>Customer :&nbsp;</strong> <label  class="customer text-blue" for="customer"></label>

                                </div>
                                <div class="col-form-label  ml-5 ">
                                    /&nbsp;  <strong>Vessel :&nbsp;</strong> <label class="vessel text-blue" for="vessel"></label>

                                </div>
                                <div class="col-form-label  ml-5 ">
                                    /&nbsp;  <strong>Customer Ref # :&nbsp;</strong> <label class="customer_ref_no text-blue" for="customer_ref_no"></label>

                                </div>
                                <div class="col-form-label  ml-5 ">
                                    /&nbsp;  <strong>Department Name :&nbsp;</strong> <label class="departmentname text-blue" id="departmentname" for="departmentname"></label>

                                </div>


                </div>



            </div>
        </div> --}}
        <div class="row">
            <div class="col-sm-2">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Event#</span>
                </div>
                <input class="form-control" type="number" name="EventNo" readonly placeholder="Event#" value="{{$eventno}}" aria-label="Event No">

            </div>
        </div>
            <div class="col-sm-2 ">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Quote#</span>
                </div>
                <input class="form-control" type="number" name="QuoteNo" readonly value="{{$quote_no}}" placeholder="Quote#" aria-label="Quote No">

            </div>
        </div>
            <div class="col-sm-2">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">QDate#</span>
                </div>
                <input class="form-control" type="text" name="QDate" readonly id="QDate" value="{{$QDater}}" >

            </div>
        </div>

        {{-- <div class="col-md-2 mx-auto text-white bg-dark text-center">
            <h3>Pricing Module</h3>
        </div> --}}
        <header class="col-sm-3 mx-auto">
            <h3>Pricing Module</h3>
        </header>

        <div class="col-sm-1">
            <input class="form-control" type="number" name="depcode" id="depcode" readonly value="{{$depcode}}" placeholder="" aria-label="godwun">
        </div>
        <div class="col-sm-2">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Department</span>
                </div>
                {{-- <input class="form-control" type="text" name="Department" placeholder="Department" aria-label="Department"> --}}
                {{-- <div class="form-group"> --}}
                    {{-- <label for=""></label> --}}
                    <select class="custom-select" name="" id="">
                        <option selected value="{{$depname}}">{{$depname}}</option>
                        {{-- <option value=""></option>
                        <option value=""></option>
                        <option value=""></option> --}}
                    </select>
                {{-- </div> --}}

            </div>
        </div>


        </div>

        <div class="row py-2">
           <div class="col-sm-2">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Customer :</span>
                </div>
                {{-- <label class="form-control" for="customer"> {{$CustomerName}}</label> --}}

                <input class="form-control" type="text" value="{{$CustomerName}}" name="CustomerName" placeholder="CustomerName" aria-label="CustomerName">

            </div>
        </div>
        </div>
        {{-- <div class="row">
           <div class="col-sm-1">
            <div class="input-group">
                <div class="input-group-prepend">
                   <span style="margin-left: 30px" class="input-group-text">Code :</span>
                </div>
                <label class="customer" for="customer"></label>


            </div>
        </div> --}}
        {{-- <div class="col-sm-1" style="margin-left: 15rem!important">

            <input class="form-control" type="number" name="" placeholder="#" aria-label="No">
            </div>
        <div class="col-sm-1 ">

            <input class="form-control" type="number" name="" placeholder="#" aria-label="No">
            </div>
            <div class="col-sm-2">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Port :</span>
                    </div>
                    //<input class="form-control" type="text" name="Department" placeholder="Department" aria-label="Department">
                    //<div class="form-group">
                      //  <label for=""></label>
                        <select class="custom-select" name="" id="">
                            <option selected disabled>Select one</option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                        </select>
                    //</div>

                </div>
            </div> --}}

        {{-- </div> --}}
        <div class="row">
           <div class="col-sm-2">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span style="padding-left: 30px" class="input-group-text ">Vessel :</span>
                </div>
                {{-- <label class="form-control" for="Vessel"> {{$VesselName}}</label> --}}
                <input class="form-control" type="text" value="{{$VesselName}}" name="VesselName" placeholder="VesselName" aria-label="VesselName">

                {{-- <label class="customer" for="customer"></label> --}}

                {{-- <input class="form-control" type="number" name="EventNo" placeholder="Event#" aria-label="Event No"> --}}

            </div>
        </div>
        {{-- <div class="col-sm-3" style="margin-left: 15rem!important">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Agent :</span>
                </div>
                //<div class="form-group">
                  //  <label for=""></label>
                    <select class="custom-select" name="" id="">
                        <option selected disabled>Select one</option>
                        <option value=""></option>
                        <option value=""></option>
                        <option value=""></option>
                    </select>
                    //</div>

                </div>
            </div>
            <div class="col-sm-1">
                <div class="input-group">
                <input class="form-control" type="number" name="Agentcode" placeholder="Agent code" aria-label="Agent">
                //<input class="form-control" type="text" name="" placeholder="Recipient's text" aria-label="Recipient's " aria-describedby="my-addon">
                <div class="input-group-append">
                    <span class="input-group-text" id="my-addon">Agent %</span>
                </div>
            </div>
        </div> --}}
        <div class="col-sm-2">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Last 6 Month</span>
                </div>
                <input class="form-control" type="date" name="l6month"  aria-label="l6month">

            </div>
        </div>
        <div class="col-sm-2">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Last 3 Month</span>
                </div>
                <input class="form-control" type="date" name="l3month"  aria-label="l6month">

            </div>
        </div>
        <div class="col-sm-2 ml-auto" >
            <div class="input-group">
                <div class="input-group-prepend">
                    <span style="cursor: pointer" onclick="gpset()" class="input-group-text gpc"><a>GP%</a></span>
                </div>
                <input class="form-control" type="number" id="gps"  name="gp" value="50.00" placeholder="GP%" aria-label="GP%">

            </div>
        </div>
        <div class="col-sm-2 mr-auto">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span style="cursor: pointer" onclick="markupset()" class="input-group-text markcup"><a >Markup%</a></span>
                </div>
                <input class="form-control" type="number" id="markcup"   value="100.00" name="Markup%" placeholder="Markup%" aria-label="Markup%">

            </div>
        </div>

        </div>

    </div>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">

    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
<script>
$(document).ready( function () {
$('#pricinggrid').DataTable({
    scrollY:        400,
deferRender: true,
    scroller: true,
    paging: false,
    info:false,
    ordering:false,
    responsive:true,
dom: 'Bfrtip',
        buttons: [
            'excel',  {
            extend: 'print',
            text: 'Print Or PDF',
            customize: function ( doc ) {
                                            $(doc.document.body).find('h1').css('font-size', '15pt');
                                            $(doc.document.body).find('h1').css('text-align', 'center');
                                        },

            // customize: function ( doc ) {
            //     doc.content.splice( 1, 0, {
            //         margin: [ 0, 0, 0, 12 ],
            //         alignment: 'left',
            //         image: 'data:assets/images/company.png'
            //     } );
            // }
        }
        ]

});
} );

</script>
    <div class="col-lg-12  p-2">

        <table  class="table small" id="pricinggrid" >
            <thead class="bg-info">
                <tr >
                    <th>SR&nbsp;#</th>
                    <th>IMPA&nbsp;Code</th>
                    <th>Item&nbsp;Code</th>
                    <th style="padding-left: 5rem;padding-right: 5rem">Description</th>
                    <th>Qty</th>
                    <th>Unit</th>
                    <th style="padding-left: 4rem;padding-right: 4rem">Vendor&nbsp;Name</th>
                    <th>Vendor&nbsp;Code</th>
                    <th>Land&nbsp;Cost</th>
                    <th>Price&nbsp;Type</th>
                    <th>Sell&nbsp;Price</th>
                    <th>EST&nbsp;Total</th>
                    <th>GP&nbsp;%</th>
                    <th>Markup&nbsp;%</th>
                    <th>Purchase&nbsp;Amount</th>
                    <th>Profit&nbsp;Amount</th>
                    <th>Customer&nbsp;Note</th>
                    <th hidden>id</th>
                    <th hidden>sell</th>

                </tr>
                </thead>
                <tbody id="pricingtable">
                    <?php
                         $counter=0;
                        ?>
                    @foreach ($quotesdetails as $item)
                        <?php
                        $counter=$counter+1;

                        ?>

                    <tr>

                            <td><?php echo $counter;?></td>
                            <td>{{$item->IMPAItemCode}}</td>
                            <td>{{$item->ItemCode}}</td>
                            <td style="width:200px">{{$item->ItemName}}</td>
                            <td >{{$item->Qty}}</td>
                            <td>{{$item->PUOM}}</td>
                            <td>{{$item->VendorName}}</td>
                            <td>{{$item->VendorCode}}</td>
                            <td class="text-right">{{round($item->VendorPrice+$item->Freight,2)}}</td>

                            <td></td>
                            <td class="text-right" contenteditable='true' onblur="calc()">{{round($item->SuggestPrice,2)}}</td>
                        <?php
                       $est =  round($item->SuggestPrice*$item->Qty,2);
                       $purchse = round($item->VendorPrice*$item->Qty,2);
                       $lcost = round($item->VendorPrice+$item->Freight,2);
                       $MProfitAmt = $est-$purchse;
                       if($MProfitAmt == 0){
                        $MProfitAmt = 1;
                       }
                       if($est == 0){
                        $est = 1;
                       }
                       $gppercentage =$MProfitAmt ? round($MProfitAmt/$est*100,2) : 0;
                       $markuppercentage = $est ? round((($est/$purchse)*100)-100,2) : 0;
                    //    $gppercentage =1;
                    //    $markuppercentage =1;
                        ?>
                            <td class="text-right">{{$est}}</td>
                            <td class="text-center" contenteditable='true'>{{$gppercentage}}</td>
                            <td class="text-center" contenteditable='true'>{{$markuppercentage}}</td>
                            <td class="text-right">{{$purchse}}</td>
                            <td class="text-right">{{round($MProfitAmt,2)}}</td>

                        <td>{{$item->CustomerNotes}}</td>
                        <td hidden>{{$item->Id}}</td>
                        <td hidden>{{$lcost}}</td>
                    </tr>
                    @endforeach

                </tbody>
        </table>
        <?php
        $sum = 0;
        $sumt = 0;
        foreach($quotesdetails as $key=>$value)
        {
           $sum+= $value->Total;
           $ven = $value->VendorPrice;
           $qty = $value->Qty;
           $totalcost = $ven*$qty;
           $sumt+= $totalcost;
           $estfrig =$value->FreightRate;
           $EstFreight = $qty*$estfrig;
        //    echo round($totalcost, 2);
        }
        // echo $sum;
        ?>

    </div>
    <div class="col-lg-12 p-2" id="footer">
        {{-- <div class="row mx-auto" >
            <div class="col-sm-1">
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="Sellprice" id="" value="checkedValue" checked>
                Sell Priced
              </label>
            </div>
            </div>
            <div style="width:200px">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Vendor Disc %:</span>
                    </div>
                    <input class="" style="width: 70px;" type="number" name="VendorDisc" placeholder="Disc %" aria-label="Vendor Disc">

                </div>
            </div>
            <div class="col-sm-1">
            <input class="form-control" style="width: 50px;"  type="number" name="Vendor" placeholder="0" aria-label="Vendor">
        </div>
        </div> --}}
        <div class="row p-1">
            {{-- <div class="col-sm-2">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="my-addon">Est Freight</span>
                </div>
                <input class="form-control" type="text" name="EstFreight" value="<?php// echo $EstFreight;?>" placeholder="0" aria-label="Est Freight " aria-describedby="my-addon">
            </div>
        </div> --}}
            <div class="col-sm-2">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="my-addon">Sale Amount</span>
                </div>
                <input class="form-control" type="text" name="SaleAmount" readonly onblur="reSum()" id="saleamount" value="<?php echo $sum;?>" placeholder="0" aria-label="SaleAmount" aria-describedby="my-addon">
            </div>
        </div>
            <div class="col-sm-2">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="my-addon">Total Cost</span>
                </div>
                <input class="form-control" type="text" name="TotalCost" readonly onblur="reSum()" id="totalcoast" placeholder="0" value="<?php echo $sumt;?>" aria-label="TotalCost " aria-describedby="my-addon">
            </div>
        </div>
            <div class="col-sm-2">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="my-addon">Profit %</span>
                </div>
                <input class="form-control" type="text" name="Profit" id="profitper" readonly placeholder="0" aria-label="Profit " aria-describedby="my-addon">
            </div>
        </div>
            <div class="col-sm-2">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="my-addon">Profit Amount</span>
                </div>
                <input class="form-control" type="text" name="ProfitAmount" id="profitamount" readonly placeholder="0" aria-label="ProfitAmount " aria-describedby="my-addon">
            </div>
        </div>
        <div class="col-sm-1">
            {{-- <div class="btn-group-toggle" data-toggle="buttons"> --}}
                <label for="ChkPricing" > Sell Pricied </label>
                    <input type="checkbox" id="ChkPricing" readonly  value="0" name="ChkPricing">
            {{-- </div> --}}
        </div>
        </div>
        <div class="col-lg-12 ">
        <div class="row p-1" >
            <div class="col-sm-3">
            <div class="input-group">
                <div class="col-sm-3">
                    <input class="form-control" type="text" name="" value="{{$citem ? $citem->CashDiscPer : 0}}" onblur="dissum()" id="cashdisper" placeholder="0" aria-label="cash's " aria-describedby="my-addon">
                </div>
                <div class="input-group-append">
                    <span class="input-group-text px-2" id="my-addon">Cash Disc :</span>
                </div>
                <div class="col-sm-3">
                <input class="form-control" type="text" name="" placeholder="0" id="cahsl" aria-label="cash" aria-describedby="my-addon">
            </div>
            </div>
        </div>
    {{-- </div>
        <div class="row p-1"> --}}
            <div class="col-sm-3">
            <div class="input-group">
                <div class="col-sm-3">
                    <input class="form-control" type="text" name="" placeholder="0" value="{{$citem ? $citem->CreditNotePer : 0}}" onblur="dissum()" id="crnoper" aria-label="crnote " aria-describedby="my-addon">
                </div>
                <div class="input-group-append">
                    <span class="input-group-text px-2" id="my-addon">Credit Note :</span>
                </div>
                <div class="col-sm-3">
                <input class="form-control" type="text" name="" placeholder="0" id="crl" aria-label="Recipient's " aria-describedby="my-addon">
            </div>
            </div>
        </div>
    {{-- </div>
        <div class="row p-1"> --}}
            <div class="col-sm-3">
            <div class="input-group">
                <div class="col-sm-3">
                    <input class="form-control" type="text" name="" placeholder="0" value="{{$citem ? $citem->RebaitPer : 0}}" onblur="dissum()" id="avireb" aria-label="avi" aria-describedby="my-addon">
                </div>
                <div class="input-group-append">
                    <span class="input-group-text px-2" id="my-addon">Avi Rebate :</span>
                </div>
                <div class="col-sm-3">
                <input class="form-control" type="text" name="" placeholder="0" id="avirl" aria-label="Recipient's " aria-describedby="my-addon">
            </div>
            </div>
        </div>
    {{-- </div>
        <div class="row p-1"> --}}
            <div class="col-sm-3">
            <div class="input-group">
                <div class="col-sm-3">
                    <input class="form-control" type="text" name="" placeholder="0" value="{{$citem ? $citem->InvoiceDiscPer : 0}}" onblur="dissum()" id="volumedis" aria-label="Recipient's " aria-describedby="my-addon">
                </div>
                <div class="input-group-append">
                    <span class="input-group-text px-2" id="my-addon">Volume Disc :</span>
                </div>
                <div class="col-sm-3">
                <input class="form-control" type="text" name="" placeholder="0" id="volumel" aria-label="Recipient's " aria-describedby="my-addon">
            </div>
            </div>
        </div>
    {{-- </div>
        <div class="row p-1"> --}}



    </div>
    <div class="row p-1">
        <div class="col-sm-3">
            <div class="input-group">
                <div class="col-sm-3">
                    <input class="form-control" type="text" name="" value="{{$citem ? $citem->SalesManCommPer : 0}}" id="slscom" onblur="dissum()" placeholder="0" aria-label="sls's " aria-describedby="my-addon">
                </div>
                <div class="input-group-append">
                    <span class="input-group-text px-2" id="my-addon">SLs Comm :</span>
                </div>
                <div class="col-sm-3">
                <input class="form-control" type="text" name="" placeholder="0" id="slsl" aria-label="sls " aria-describedby="my-addon">
            </div>
            </div>
        </div>

        <div class="col-sm-2">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="my-addon">Total </span>
                </div>
                <input class="form-control" type="text" name="Total" id="txttotal" onblur="dissum()" placeholder="0" aria-label="Total " aria-describedby="my-addon">
            </div>
            </div>
            <div style="" class="col-sm-2">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="my-addon">Est Net Profit</span>
                    </div>
                    <input class="form-control" type="text" name="EstNetProfit" id="EstNetProfit" placeholder="0" aria-label="Est Net Profit " aria-describedby="my-addon">
                </div>
            </div>
            <div class="col-sm-2">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="my-addon">GP %</span>
                    </div>
                    <input class="form-control" type="text" name="GP" id="TxtGPPer" placeholder="0" aria-label="GP " aria-describedby="my-addon">
                </div>
            </div>
            <div class="col-sm-2">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="my-addon">Markup %</span>
                </div>
                <input class="form-control" type="text" name="Markup" id="TxtMarkUPPer" placeholder="0" aria-label="Markup " aria-describedby="my-addon">
            </div>
            </div>
            <div class="mr-1 ml-auto">
                <a href="{{ url()->previous() }}"><input type="button" class="form-control" value="Back">
                    {{-- <a onclick="window.close()" class="btn btn-info">Back</a> --}}
            </div>
                <div class="ml-1 mr-auto">
                {{-- <a href="{{ url()->previous() }}"><input type="button" class="form-control" value="Back"> --}}
                    <button type="submit" id="submit"  class="btn btn-success">Save</button>
            </div>

    </div>
    </div>
    </div>
    <div class="row">

</div>
    {{-- </form> --}}
</div>















@stop

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">


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
  background-image: linear-gradient(to right ,#553c9a, #ee4b2b, #00c2cb, #ff7f50, #553c9a);
  -webkit-background-clip: text;
  background-clip: text;
  background-size: 200%;
  background-position: -200%;
  transition: all ease-in-out 2s;
  cursor: pointer;
}
header h3:hover{
  background-position: 200%;
}
    </style>
@stop

@section('js')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
    <script>
function promptBeforeSubmit() {
    var confirmed = confirm("Have you Completed Sell Pricied?");

    if(confirmed){
        $('#ChkPricing').prop("checked", true);
        document.getElementById("ChkPricing").value = 1;
    }

    return confirmed;
}
$(document).ready(function() {
    $('input[type="checkbox"]').click(function() {
              if($(this).prop("checked") == true) {
                // alert("Checkbox is checked.");
                var inputf = document.getElementById("ChkPricing");


                inputf.value = 1;
              }
              else if($(this).prop("checked") == false) {
                // alert("Checkbox is unchecked.");
                var inputf = document.getElementById("ChkPricing");


                inputf.value = 0;
              }
            });

            reSum();
dissum();
});
    // if ($("#pricingform").length > 0) {
    //     alert('?');
    // $("#pricingform").validate({

    // submitHandler: function(form) {
    // $.ajaxSetup({
    // headers: {
    // 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    // }
    // });
    // // $('#submit').html('Please Wait...');
    // // $("#submit"). attr("disabled", true);
    // $.ajax({
    // url: "{{url('pricestore')}}",
    // type: "POST",
    // data: $('#pricingform').serialize(),
    // success: function( response ) {
    // $('#submit').html('Submit');
    // $("#submit"). attr("disabled", false);
    // alert('Ajax form has been submitted successfully');
    // document.getElementById("pricingform").reset();
    // }
    // });
    // }
    // })
    // }
    </script>


<script>

$(document).on("click", "#submit", function() {
    if(confirm("Have you Completed Sell Pricied?")){
        $('#ChkPricing').prop("checked", true);
        document.getElementById("ChkPricing").value = 1;
    }else{
        return;
    }
    tablecomposer();
    let QuoteNo = '{{$quote_no}}';
    let EventNo = '{{$eventno}}';
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
    let ChkPricing = $('#ChkPricing').val();

// console.log(datatablearray);
// alert('datatablearray');





 $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    // $('#submit').html('Please Wait...');
    // $("#submit"). attr("disabled", true);
    $.ajax({
    url: '{{URL::to('pricing-store')}}',

    type: "POST",
    data: {
        datatablearray,
        QuoteNo,
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
    }, beforeSend: function() {
        // Show the overlay and spinner before sending the request
        $('.overlay').show();
    },

    success: function($response) {

        // return redirect('quotation?quote_no='.$quote_no)->with('status', 'Pricing Updated');
        if ($response.success == true) {
        alert('Pricing_Updated');

        window.location.href = "/quotation?quote_no=" + $response.quote_no + "&status=Pricing IS Updated Success";
    } else {

        window.location.href = "/quotation?quote_no=" + $response.quote_no + "&error=Pricing Not updated Check Again";
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


    function tablecomposer(){
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

function calc(){


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
        addvalue = ((LandCost/100)*gpvalue);
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
let table = document.getElementById('pricingtable');
let markupvalue = $('#markcup').val();

    let rows = table.rows;
    let MCostRate =0;
    let MGPAmt =0;
    let MSellRate =0;
    let TxtDeliveredQty =0;
    let TxtGPCostAmt =0;
    let actperc =0;
        for (let i = 0; i < rows.length; i++) {
  let cells = rows[i].cells;
    Sno=cells[0].innerHTML;
    IMPAItemCode=cells[1].innerHTML;
    ItemCode=cells[2].innerHTML;
    ItemName=cells[3].innerHTML;
    Qty=cells[4].innerHTML;
    PUOM=cells[5].innerHTML;
    VendorName=cells[6].innerHTML;
    VendorCode=cells[7].innerHTML;
    LandCost=cells[8].innerHTML;
    Pricetype=cells[9].innerHTML;
    SuggestPrice=cells[10].innerHTML;
    Esttotal=cells[11].innerHTML;
    gppercentage=cells[12].innerHTML;
    markuppercentage=cells[13].innerHTML;
    purchse=cells[14].innerHTML;
    MProfitAmt=cells[15].innerHTML;
    CustomerNotes=cells[16].innerHTML;
    Id=cells[17].innerHTML;



    cells[13].innerHTML = markupvalue;
    cells[14].innerHTML = parseFloat(LandCost*Qty).toFixed(2);

    actperc = markupvalue/100;
     MCostRate =LandCost;
     MGPAmt = MCostRate*actperc;
     MSellRate = parseFloat(MCostRate)+parseFloat(MGPAmt);
     //  MGPAmt = MCostRate*markupvalue/100;
     //  MGPAmt = MCostRate-SuggestPrice;

     cells[10].innerHTML = parseFloat(MSellRate).toFixed(2);
     cells[11].innerHTML = parseFloat(MSellRate*Qty).toFixed(2);
     cells[15].innerHTML = parseFloat(Esttotal-purchse).toFixed(2);
     cells[12].innerHTML = parseFloat(MProfitAmt/Esttotal*100).toFixed(2);




// console.log(GPRate);
// TxtTotalQty +=Number(Orderqty);
// TxtTotalRecQty +=Number(Recvdqty);
// TxtTotalNotRecQty +=Number(NotRecvdqty);
// TxtDeliveredQty +=Number(Deliveryqty)
// TxtGPCostAmt+=Number(Orderqty*vendorprice);
// console.log('MCostRate'+MCostRate);
// console.log('MGPAmt'+MGPAmt);
// console.log('MSellRate'+MSellRate);
// console.log('SuggestPrice'+SuggestPrice);
// console.log('Esttotal'+Esttotal);
// console.log('gppercentage'+gppercentage);
// console.log('MProfitAmt'+MProfitAmt);
    }
    reSum();
dissum();
}

$(document).ready(function () {

    let table = document.getElementById('pricingtable');
// let markupvalue = $('#markcup').val();
 let tsaleamount =0;
 let ttotalcoast = 0;
 let tprofitamount = 0;
 let tprofitper = 0;

    let rows = table.rows;
    let aphaA =0;
    let mmark =0;
    let MSellRate =0;
    let TxtDeliveredQty =0;
    let TxtGPCostAmt =0;
        for (let i = 0; i < rows.length; i++) {
  let cells = rows[i].cells;
    Sno=cells[0].innerHTML;
    IMPAItemCode=cells[1].innerHTML;
    ItemCode=cells[2].innerHTML;
    ItemName=cells[3].innerHTML;
    Qty=cells[4].innerHTML;
    PUOM=cells[5].innerHTML;
    VendorName=cells[6].innerHTML;
    VendorCode=cells[7].innerHTML;
    LandCost=cells[8].innerHTML;
    Pricetype=cells[9].innerHTML;
    SuggestPrice=cells[10].innerHTML;
    Esttotal=cells[11].innerHTML;
    gppercentage=cells[12].innerHTML;
    markuppercentage=cells[13].innerHTML;
    purchse=cells[14].innerHTML;
    MProfitAmt=cells[15].innerHTML;
    CustomerNotes=cells[16].innerHTML;
    Id=cells[17].innerHTML;





    cells[11].innerHTML = parseFloat(SuggestPrice*Qty).toFixed(2) ;
    aphaA = parseFloat(Qty*LandCost,2);
    cells[14].innerHTML= aphaA;
    cells[15].innerHTML = parseFloat(Esttotal-purchse).toFixed(2);

    mmark = SuggestPrice-LandCost;
    if (mmark == 0) {
        mmark = 1;
    }
    cells[13].innerHTML = parseFloat((mmark/LandCost)*100).toFixed(2);
    cells[12].innerHTML = parseFloat((MProfitAmt/purchse)*100).toFixed(2);


 tsaleamount +=Number(Esttotal);
 ttotalcoast +=Number(aphaA);
 // TxtTotalRecQty +=Number(Recvdqty);

}
$('#saleamount').val(parseFloat(tsaleamount).toFixed(2));
$('#totalcoast').val(parseFloat(ttotalcoast).toFixed(2));
$('#profitamount').val(parseFloat(tsaleamount-ttotalcoast).toFixed(2));
let = profitamountget = $('#profitamount').val();
$('#profitper').val(parseFloat(profitamountget/ttotalcoast*100).toFixed(2));




dissum();
// reSumw();
reSum()
});


</script>


    <script>



// function gpset() {
//     $gpvalue = document.getElementById("gps").value
//     <?php
//     $counter=0;
//     ?>
//     @foreach ($quotesdetails as $item)
//     <?php
//     $counter=$counter+1;
//     ?>
//         $Quantity<?php echo $counter;?> = Math.round(document.getElementById("qty<?php echo $counter;?>").value,2);
//         $Estprice<?php echo $counter;?> = (document.getElementById("est<?php echo $counter;?>").value);
//         $Vendorprice<?php echo $counter;?> = Math.round(document.getElementById("VendorPrice<?php echo $counter;?>").value,2);
//         $Purcahseamount<?php echo $counter;?> = Math.round(document.getElementById("purchase_amount<?php echo $counter;?>").value,2);
//         $Sellprice<?php echo $counter;?> = Math.round(document.getElementById("sellprice<?php echo $counter;?>").value,2);
//         document.getElementById("gp<?php echo $counter;?>").value = $gpvalue;

//         var percentage = $gpvalue;
//         var number = $Vendorprice<?php echo $counter;?>;
//         var numberPlusPercentage<?php echo $counter;?> = $Vendorprice<?php echo $counter;?> + $Vendorprice<?php echo $counter;?> / 100 * $gpvalue;
// // console.log(numberPlusPercentage<?php echo $counter;?>);
//     document.getElementById("sellprice<?php echo $counter;?>").value = numberPlusPercentage<?php echo $counter;?>;
//     @endforeach
//     // console.log($gpvalue);



//     // reSumw();
//     reSum();
//     dissum();
// };

// function markupset() {
//     $markcupvalue = document.getElementById("markcup").value
//     <?php
//     $counter=0;
//     ?>
//     @foreach ($quotesdetails as $item)
//     <?php
//     $counter=$counter+1;

//     ?>
//     $Quantity<?php echo $counter;?> = Math.round(document.getElementById("qty<?php echo $counter;?>").value,2);
//     $Estprice<?php echo $counter;?> = (document.getElementById("est<?php echo $counter;?>").value);
//     $Vendorprice<?php echo $counter;?> = Math.round(document.getElementById("VendorPrice<?php echo $counter;?>").value,2);
//     $Purcahseamount<?php echo $counter;?> = Math.round(document.getElementById("purchase_amount<?php echo $counter;?>").value,2);
//     $Sellprice<?php echo $counter;?> = Math.round(document.getElementById("sellprice<?php echo $counter;?>").value,2);
//                         document.getElementById("markup<?php echo $counter;?>").value = $markcupvalue;


//     document.getElementById("purchase_amount<?php echo $counter;?>").value =$Vendorprice<?php echo $counter;?>*$Quantity<?php echo $counter;?>;
//      MCostRate =$Purcahseamount<?php echo $counter;?> /$Quantity<?php echo $counter;?>;
//      MGPAmt = MCostRate*$markcupvalue/100;
//      MSellRate = MCostRate+MGPAmt;
//     document.getElementById("sellprice<?php echo $counter;?>").value = MSellRate;
//     document.getElementById("est<?php echo $counter;?>").value = MSellRate*$Quantity<?php echo $counter;?>;
//     document.getElementById("profit_amount<?php echo $counter;?>").value = $Estprice<?php echo $counter;?>-$Purcahseamount<?php echo $counter;?>;
//     document.getElementById("gp<?php echo $counter;?>").value = document.getElementById("profit_amount<?php echo $counter;?>").value/document.getElementById("est<?php echo $counter;?>").value * 100;
//     document.getElementById("gp<?php echo $counter;?>").value = Math.round(document.getElementById("gp<?php echo $counter;?>").value,2);
//     // $markuppercentage = round((($est/$purchse)*100)-100,2);
//                         @endforeach
//                         dissum();
//                         dissum();
//                         // reSumw();
//     reSum();

// };
// function reSumw()
//         {

//             var num1 = parseInt(document.getElementById("saleamount").value);
//             var num2 = parseInt(document.getElementById("totalcoast").value);
//             var num3 = parseInt(document.getElementById("profitamount").value);
//             document.getElementById("profitamount").value = num1 - num2;
//             var num4 = num3/num2*100;
//             document.getElementById("profitper").value = Math.round(num4,2) ;
//             // dissum();
//             // dissum();
//         }

// $salesamountvalue = <?php echo $sum;?>;
//  var inputf = document.getElementById("saleamount").value;
//     inputf  = $salesamountvalue;
                        // $selsum<?php echo $counter;?> {{$item->OurPrice = number_format((float)$item->OurPrice, 2, '.', '')}}

// function reSum()
//         {
//             <?php
//     $counter=0;
//                         ?>
//                     @foreach ($quotesdetails as $item)
//                         <?php
//                         $counter=$counter+1;
//                         $ven = $item->VendorPrice;
//                         $qty = $item->Qty;
//                         $totalcost = $ven*$qty;
//                         ?>
//                         $gpvalue<?php echo $counter;?> = (document.getElementById("gp<?php echo $counter;?>").value);
//                         $markupvalue<?php echo $counter;?> = (document.getElementById("markup<?php echo $counter;?>").value);
//                         // console.log($gpvalue<?php echo $counter;?>);
//                         var numA<?php echo $counter;?> = Math.round(document.getElementById("qty<?php echo $counter;?>").value,2);
//                         var numB<?php echo $counter;?> = (document.getElementById("est<?php echo $counter;?>").value);
//                         var numC<?php echo $counter;?> = (document.getElementById("VendorPrice<?php echo $counter;?>").value);
//                         var numD<?php echo $counter;?> = (document.getElementById("purchase_amount<?php echo $counter;?>").value);
//                         var numE<?php echo $counter;?> = (document.getElementById("sellprice<?php echo $counter;?>").value);
//                             // console.log(numA<?php echo $counter;?>);
//                         document.getElementById("est<?php echo $counter;?>").value = numE<?php echo $counter;?>*numA<?php echo $counter;?>;
//                         $aphaA<?php echo $counter;?> =<?php echo $qty;?>*numC<?php echo $counter;?>;
//             // console.log($aphaA<?php echo $counter;?>);
//                         // document.getElementById("purchase_amount<?php echo $counter;?>").value =<?php echo $totalcost;?>;
//                         document.getElementById("purchase_amount<?php echo $counter;?>").value =Math.round($aphaA<?php echo $counter;?>,2);
//                         document.getElementById("profit_amount<?php echo $counter;?>").value = Math.round(numB<?php echo $counter;?> - numD<?php echo $counter;?>,2);
//                         $profitamount<?php echo $counter;?> = document.getElementById("profit_amount<?php echo $counter;?>").value ;
//                         // $gpvalue<?php echo $counter;?> = Math.round($profitamount<?php echo $counter;?>/numB<?php echo $counter;?>*100,2);
//                         //old (document.getElementById("gp<?php echo $counter;?>").value) = Math.round($profitamount<?php echo $counter;?>/numB<?php echo $counter;?>*100,2);
//                         // (document.getElementById("markup<?php echo $counter;?>").value) = ;
//                         $mmark = numE<?php echo $counter;?>-numC<?php echo $counter;?>;
//                         if ($mmark == 0) {
//                             $mmark = 1;
//                         }
//                         $markuppercentage = Math.round(($mmark/numC<?php echo $counter;?>*100),2);
//                         (document.getElementById("markup<?php echo $counter;?>").value) = $markuppercentage;
//                         (document.getElementById("gp<?php echo $counter;?>").value) = Math.round(($profitamount<?php echo $counter;?>/numD<?php echo $counter;?>*100),2);
//                         //old (document.getElementById("markup<?php echo $counter;?>").value) = $markuppercentage;
//                         // console.log($markuppercentage);
//                         @endforeach
//                         dissum();
//                         dissum();
//                     }
    // $(document).ready(function () {


    //     <?php
    // $counter=0;
    //                     ?>
    //                 @foreach ($quotesdetails as $item)
    //                     <?php
    //                     $counter=$counter+1;
    //                     $ven = $item->VendorPrice;
    //                     $qty = $item->Qty;
    //                     $totalcost = $ven*$qty;
    //                     ?>
    //                     $gpvalue<?php echo $counter;?> = (document.getElementById("gp<?php echo $counter;?>").value);
    //                     $markupvalue<?php echo $counter;?> = (document.getElementById("markup<?php echo $counter;?>").value);
    //                     // console.log($gpvalue<?php echo $counter;?>);
    //                     var numA<?php echo $counter;?> = Math.round(document.getElementById("qty<?php echo $counter;?>").value,2);
    //                     var numB<?php echo $counter;?> = (document.getElementById("est<?php echo $counter;?>").value);
    //                     var numC<?php echo $counter;?> = Math.round(document.getElementById("VendorPrice<?php echo $counter;?>").value,2);
    //                     var numD<?php echo $counter;?> = Math.round(document.getElementById("purchase_amount<?php echo $counter;?>").value,2);
    //                     var numE<?php echo $counter;?> = Math.round(document.getElementById("sellprice<?php echo $counter;?>").value,2);

    //                     (document.getElementById("est<?php echo $counter;?>").value) = numE<?php echo $counter;?>*numA<?php echo $counter;?>;
    //                     $aphaA<?php echo $counter;?> =<?php echo $qty;?>*numC<?php echo $counter;?>;
    //         // console.log($aphaA<?php echo $counter;?>);
    //                     // document.getElementById("purchase_amount<?php echo $counter;?>").value =<?php echo $totalcost;?>;
    //                     document.getElementById("purchase_amount<?php echo $counter;?>").value =$aphaA<?php echo $counter;?>;
    //                     document.getElementById("profit_amount<?php echo $counter;?>").value = Math.round(numB<?php echo $counter;?> - numD<?php echo $counter;?>,2);
    //                     $profitamount<?php echo $counter;?> = document.getElementById("profit_amount<?php echo $counter;?>").value ;
    //                     // $gpvalue<?php echo $counter;?> = Math.round($profitamount<?php echo $counter;?>/numB<?php echo $counter;?>*100,2);
    //                     //old (document.getElementById("gp<?php echo $counter;?>").value) = Math.round($profitamount<?php echo $counter;?>/numB<?php echo $counter;?>*100,2);
    //                     // (document.getElementById("markup<?php echo $counter;?>").value) = ;
    //                     $mmark = numE<?php echo $counter;?>-numC<?php echo $counter;?>;
    //                     if ($mmark == 0) {
    //                         $mmark = 1;
    //                     }
    //                     $markuppercentage = Math.round(($mmark/numC<?php echo $counter;?>*100),2);
    //                     (document.getElementById("markup<?php echo $counter;?>").value) = $markuppercentage;
    //                     (document.getElementById("gp<?php echo $counter;?>").value) = Math.round(($profitamount<?php echo $counter;?>/numD<?php echo $counter;?>*100),2);
    //                     //old (document.getElementById("markup<?php echo $counter;?>").value) = $markuppercentage;
    //                     // console.log($markuppercentage);
    //                     @endforeach
    //                     // sale-cost = /sale*100
    //                     // document.getElementById("profitamount").value = num6;

    //                     // console.log(numC<?php echo $counter;?>);
    //                     // var num4 = (document.getElementById("markup").value);
    //                     // console.log('prfit<?php echo $counter;?>',document.getElementById("profit_amount<?php echo $counter;?>").value = numB<?php echo $counter;?> - numD<?php echo $counter;?>);
    //                     // console.log(<?php echo $totalcost;?>);
    //                     // console.log('purchase<?php echo $counter;?>',document.getElementById("purchase_amount<?php echo $counter;?>").value = );

    //                     // console.log('estprice',document.getElementById("est").value = num1 * num6);
    //                     // reSum();
    //                     // // reSumw();
    //                     // // reSumw();
    //                     // dissum();
    //                     // dissum();
    //                 });
    function reSum() {
let table = document.getElementById('pricingtable');
// let markupvalue = $('#markcup').val();
let tsaleamount =0;
 let ttotalcoast = 0;
 let tprofitamount = 0;
 let tprofitper = 0;
    let rows = table.rows;
    let aphaA =0;
    let mmark =0;
    let MSellRate =0;
    let TxtDeliveredQty =0;
    let TxtGPCostAmt =0;
        for (let i = 0; i < rows.length; i++) {
  let cells = rows[i].cells;
    Sno=cells[0].innerHTML;
    IMPAItemCode=cells[1].innerHTML;
    ItemCode=cells[2].innerHTML;
    ItemName=cells[3].innerHTML;
    Qty=cells[4].innerHTML;
    PUOM=cells[5].innerHTML;
    VendorName=cells[6].innerHTML;
    VendorCode=cells[7].innerHTML;
    LandCost=cells[8].innerHTML;
    Pricetype=cells[9].innerHTML;
    SuggestPrice=cells[10].innerHTML;
    Esttotal=cells[11].innerHTML;
    gppercentage=cells[12].innerHTML;
    markuppercentage=cells[13].innerHTML;
    purchse=cells[14].innerHTML;
    MProfitAmt=cells[15].innerHTML;
    CustomerNotes=cells[16].innerHTML;
    Id=cells[17].innerHTML;


    cells[11].innerHTML = parseFloat(SuggestPrice*Qty).toFixed(2);
    aphaA = Qty*LandCost;
    cells[14].innerHTML = parseFloat(aphaA).toFixed(2);
    cells[15].innerHTML = parseFloat(Esttotal-purchse).toFixed(2);
    mmark = SuggestPrice-LandCost;
    if (mmark == 0) {
        mmark = 1;
    }
    cells[13].innerHTML = parseFloat((mmark/LandCost)*100).toFixed(2);
    cells[12].innerHTML = parseFloat((MProfitAmt/purchse)*100).toFixed(2);



    tsaleamount +=Number(Esttotal);
 ttotalcoast +=Number(aphaA);
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
$('#profitamount').val(parseFloat(tsaleamount-ttotalcoast).toFixed(2));
let = profitamountget = $('#profitamount').val();
$('#profitper').val(parseFloat(profitamountget/ttotalcoast*100).toFixed(2));

dissum();

}
                  function dissum(){

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
                      txttotal = saleamount-crnoper + +cashdisper + +avireb + +volumedis + +slscom;
                      txtEstnet = txttotal-totalcoast;
                      TxtGPPer = txtEstnet/txttotal*100;
                      TxtMarkUPPer = txtEstnet/totalcoast*100;
                      var MSaleAmtAfterDisc ="";
                      var TxtCashDIsc = parseFloat(cashl*100)/100;
                      document.getElementById("txttotal").value = parseFloat((txttotal*100)/100).toFixed(2);
                      document.getElementById("EstNetProfit").value = parseFloat((txtEstnet*100)/100).toFixed(2);
                      document.getElementById("TxtGPPer").value = parseFloat((TxtGPPer*100)/100).toFixed(2);
                      document.getElementById("TxtMarkUPPer").value = parseFloat((TxtMarkUPPer*100)/100).toFixed(2);

                      if(cashdisper > 0){(document.getElementById("cahsl").value) =TxtCashDIsc;}else{(document.getElementById("cahsl").value) = 0}
                      MSaleAmtAfterDisc = (saleamount) - (TxtCashDIsc);
                      var crl = (MSaleAmtAfterDisc) * (crnoper) / 100;
                      var TxtCreditNote = parseFloat((crl*100)/100).toFixed(2);

                      if(crnoper > 0){(document.getElementById("crl").value) = TxtCreditNote;}else{(document.getElementById("crl").value) = 0}
                      MSaleAmtAfterDisc = (saleamount) - (TxtCashDIsc) + (+TxtCreditNote);
                      var avirl = (MSaleAmtAfterDisc) * (avireb) / 100;
                      var TxtRebate = parseFloat((avirl*100)/100).toFixed(2);

                       if(avireb > 0){(document.getElementById("avirl").value) = TxtRebate;}else{(document.getElementById("avirl").value) = 0}
                       MSaleAmtAfterDisc = (saleamount) - (TxtCashDIsc) + (+TxtCreditNote) + (+TxtRebate);
                      var volumel = (MSaleAmtAfterDisc) * (volumedis) / 100;
                      var TxtAgentComm = parseFloat((volumel*100)/100).toFixed(2);

                       if(volumedis > 0){(document.getElementById("volumel").value) = TxtAgentComm;}else{(document.getElementById("volumel").value) = 0}
                       MSaleAmtAfterDisc = (saleamount) - (TxtCashDIsc) + (+TxtCreditNote) + (+TxtRebate) + (+TxtAgentComm);
                      var slsl = (MSaleAmtAfterDisc) * (slscom) / 100;
                      var TxtSLSComm = parseFloat((slsl*100)/100).toFixed(2);

                       if(slscom > 0){(document.getElementById("slsl").value) = TxtSLSComm}else{(document.getElementById("slsl").value) = 0}
                       txttotal = (saleamount) - ((TxtCreditNote) + (TxtCashDIsc) + (TxtRebate) + (TxtAgentComm) + (TxtSLSComm))


    }

    </script>
@stop


@section('content')
