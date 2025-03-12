@extends('layouts.app')



@section('title', 'Final Invoice')

@section('content_header')

@stop

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    </div>
    <?php echo View::make('partials.ajax_success'); ?>

    @if (\Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>{!! \Session::get('success') !!}</strong>
        </div>
    @endif
    @if (\Session::has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>{!! \Session::get('error') !!}</strong>
        </div>
    @endif

    <div class="col-lg-12 pt-2">
        <div class="card">

            <div class="card-header">

                <h3 class="text-center text-bold text-primary">Final Invoice</h3>

            </div>

            <div class="card-header" style="background-color:#f5f5f5; ">
                <div class="card-tools ">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
                <div class="row">
                    <div class="ml-2 d-flex align-items-center">

                        <strong>Charge #:</strong>&nbsp;
                        <div class="cut-text">

                            <label class="InvoiceNo col-form-label text-blue">{{$PONO}}</label>
                        </div>
                    </div>
                        <div class="ml-2 d-flex align-items-center">
                        /&nbsp;<strong>VSN #:</strong>&nbsp;
                        <div class="cut-text">
                            <label class="VSN col-form-label text-blue"></label>
                        </div>
                    </div>

                    <div class="ml-2 d-flex align-items-center">

                        /&nbsp;<strong>Event #:</strong> &nbsp;
                        <div class="cut-text">
                        <label class="event_no col-form-label text-blue"
                        for="event_no"></label>
                        </div>
                    </div>
                    <div class="ml-2 d-flex align-items-center">

                        /&nbsp;<strong>Quote #:</strong> &nbsp;
                        <div class="cut-text">
                            <label class="QuoteNo col-form-label text-blue"
                            for="QuoteNo"></label>
                        </div>

                    </div>
                    <div class="ml-5 d-flex align-items-center">
                        /&nbsp;<strong>CustomerName :</strong>&nbsp;
                        <div class="cut-textf">
                            <label class="customer col-form-label text-blue">Your Customer Name Here</label>
                        </div>
                    </div>

                    <div class="ml-2 d-flex align-items-center">
                        /&nbsp; <strong>Vessel :&nbsp;</strong> &nbsp;
                        <div class="cut-textf">
                        <label class="vessel col-form-label text-blue"
                            for="vessel"></label>
                        </div>

                    </div>
                    <div class="ml-2 d-flex align-items-center">

                        /&nbsp; <strong>Customer Ref # :&nbsp;</strong> &nbsp;
                        <div class="cut-textf">
                            <label class="customer_ref_no col-form-label text-blue"
                            for="customer_ref_no"></label>
                        </div>

                    </div>
                    <div class="ml-2 d-flex align-items-center">

                        /&nbsp; <strong>Department :&nbsp;</strong>
                        <div class="cut-text">

                        <label class="Department text-blue"
                            for="Department"></label>
                        </div>

                    </div>
                </div>


            </div>


            <div class="card-body">

                <div class="row ">

                    <div class="inputbox col-6 col-lg-2 py-2 col-sm-3">
                        <input id='orderdate' type="date" class=""
                            value="{{ date('Y-m-d') }}">
                        <input hidden id='TxtBackLogDate' type="date" class=""
                            value="{{ $FixAccountSetup->BackLogDate ? date('Y-m-d', strtotime($FixAccountSetup->BackLogDate)) : date('Y-m-d') }}">
                        <span class="Txtspan" id="">Order Date</span>
                    </div>

                    <div class="inputbox col-6 col-lg-2 py-2 col-sm-3">

                        <input id='deliverydate' type="date" class="" value="">
                        <span class="Txtspan" id="">Delivery Date</span>
                    </div>

                    <div class="inputbox col-6 col-lg-2 py-2 col-sm-3">
                        <input id='DispatchDate' type="date" class=""
                            value="{{  date('Y-m-d') }}">
                        <span class="Txtspan" id="">D O</span>
                    </div>

                    <div class="inputbox col-6 col-lg-2 py-2 col-sm-3">
                        <input id='deliveryTime' type="time" class=""
                            value="{{ date('H:i:s') }}">
                        <span class="Txtspan" id="">Delivery Time</span>
                    </div>



                    <div class="inputbox col-6 col-lg-2 py-2 col-sm-3">
                        <input id='TxtRtnDate' type="date" class=""
                            value="{{ date('Y-m-d') }}">
                        <span class="Txtspan" id="">Inv Date </span>
                    </div>

                    <div class="inputbox col-6 col-lg-2 py-2 col-sm-3">
                        <input id='TxtDueDate' type="date" class=""
                            value="{{ date('Y-m-d') }}">
                        <span class="Txtspan" id="">Due Date</span>
                    </div>

                    <div class="inputbox col-6 col-lg-2 py-2 col-sm-3">
                        <span class="Txtspan" id="">Status</span>
                        <select class="" name="status" id="status">

                            <option value="TRANSIT NOLA">TRANSIT NOLA</option>
                            <option value="DELIVERED">DELIVERED</option>
                        </select>
                    </div>

                    <div class="inputbox col-6 col-lg-2 py-2 col-sm-3">
                        <span class="Txtspan" id="">Warehouse</span>
                        <select class="" name="Warehouse" id="Warehouse">

                            @foreach ($warehouse as $item)
                                <option value="{{ $item->GodownCode }}">{{ $item->GodownName }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="inputbox col-6 col-lg-2 py-2 col-sm-3">

                        <span class="Txtspan" id="">Terms</span>
                        <select class="" name="CmbTerms" id="CmbTerms">

                            @foreach ($TermsSetup as $item)
                            <option value="{{$item->Terms}}">{{$item->Terms}}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="inputbox col-6 col-lg-2 py-2 col-sm-3">

                        <input id='TxtRtnTime' type="time" class=""
                            value="">
                        <span class="Txtspan" id="">Inv Time</span>
                    </div>
                </div>
            </div>



        </div>
        <div class="card">
            <div class="card-body">
                <div class="col-sm-12 mx-auto">
                    <table class="table  table-inverse " id="Invoicetable" style="width: 100%">
                        <thead class="bg-info">
                            <tr>
                                <th>Item&nbsp;Code</th>
                                <th style="padding-left: 7rem;padding-right: 7rem">Item&nbsp;Name</th>
                                <th>UOM</th>
                                <th>Order&nbsp;Qty</th>
                                <th>Recvd&nbsp;Qty</th>
                                <th>Not&nbsp;Recvd&nbsp;Qty</th>
                                <th>Delivery&nbsp;Qty</th>
                                <th>Rtn&nbsp;Qty</th>
                                <th>Misng&nbsp;Qty</th>
                                <th>Sold&nbsp;Qty</th>
                                <th class="text-right">Price</th>
                                <th class="text-right">Amount</th>
                                <th>PO#</th>
                                <th hidden>OrderID</th>
                                <th hidden>QuoteID</th>
                                <th hidden>VendorPrice</th>
                                <th hidden>VendorCode</th>
                                <th hidden>VendorActCode</th>
                                <th class="text-right">Cost</th>
                                <th class="text-right">GP&nbsp;%</th>
                                <th class="text-right">GPAmt</th>
                                <th style="padding-left: 5rem;padding-right: 5rem">Vendor&nbsp;Name</th>
                                <th hidden>DiscPer</th>
                                <th hidden>DiscAmt</th>
                                <th hidden>CostPriceNew</th>
                                <th hidden>DiscPerVendor</th>
                                <th hidden>ReturnCostAmt</th>
                                <th>No&nbsp;Discount</th>
                                <th>SNo</th>
                                <th>IMPA&nbsp;Code</th>
                                <th>StockCode</th>
                                <th hidden>Move&nbsp;To&nbsp;Stock&nbsp;Qty</th>
                                <th hidden>LBS&nbsp;QTY</th>
                                <th hidden>LBS&nbsp;Rate</th>
                                <th>LBS&nbsp;Amount</th>
                            </tr>
                        </thead>
                        <tbody id="Invoicetablebody">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row py-2">



                    <div class="CheckBox1">
                        <label class="input-group text-info mt-2 mx-3">
                            <input class=" " type="checkbox" onclick="check()" name="ChkSevenSeasDelivery"
                                id="ChkSevenSeasDelivery" value=""> Seven Seas Delivery
                        </label>
                    </div>

                    <div class="CheckBox1">
                        <label class="input-group text-info mt-2 mx-3">
                            <input class=" " type="checkbox" onclick="check()" name="ChkHold" id="ChkHold"
                                value=""> Hold
                        </label>
                    </div>

                    <div class="CheckBox1">
                        <label class="input-group text-info mt-2 mx-3">
                            <input class=" " type="checkbox" onclick="" name="ChkCompanyHeading"
                                id="ChkCompanyHeading" value=""> CompanyHeading
                        </label>
                    </div>
                    <div class="CheckBox1 ">
                        <label class="input-group text-info mt-2 mx-3">
                            <input type="checkbox" class="" name="ChkKG" id="ChkKG" value="" checked>
                            KG
                        </label>
                        <input type="hidden" class="" name="TxtDays" id="TxtDays" value="">
                    </div>
                    <a name="FinalPrint" id="FinalPrint" class="btn mx-1 btn-info my-2 col-5 col-lg-1 col-sm-3" role="button"><i class="fa fa-print mr-2" aria-hidden="true"></i>Final Print</a>
                    <a name="Invoicebtn" id="Invoicebtn" class="btn mx-1 btn-primary my-2 col-5 col-lg-1 col-sm-3" role="button"><i class="fa fa-file-invoice mr-2"></i> Invoice</a>
                    <a name="SaveInvoice" id="SaveInvoice" class="btn mx-1 btn-success my-2 col-5 col-lg-1 col-sm-3" role="button"><i class="fa fa-cloud mr-2" aria-hidden="true"></i> SAVE</a>
                </div>

                <div class="row ">

                    <div class="inputbox py-2 col-lg-2 col-6 col-sm-3">
                        <input class="" type="number" name="TxtGPCostAmt" id="TxtGPCostAmt" placeholder="">
                        <span class="" id="">PO Cost + Pull Stock</span>
                    </div>

                    <div class="inputbox py-2 col-6 col-lg-2 col-sm-3">
                        <input class="" type="number" name="TxtPullStockAmt" id="TxtPullStockAmt" placeholder="">
                        <span class="" id="">Pull Stock</span>
                    </div>

                    <div class="inputbox py-2 col-6 col-lg-2 col-sm-3">
                        <input class="" type="number" name="TxtPurchaseReturn" id="TxtPurchaseReturn" placeholder="">
                        <span class="" id="">PurchaseReturn</span>
                    </div>

                    <div class="inputbox py-2 col-6 col-lg-2 col-sm-3">
                        <input class="" type="number" name="TxtPODeliveryCharges" id="TxtPODeliveryCharges" placeholder="">
                        <span class="" id="">Dlvry Charges</span>
                    </div>

                    <div class="inputbox py-2 col-12 col-lg-2 col-sm-3">
                        <input class="" type="text" id="Description" name="Description"
                            value="" placeholder="">
                        <span class="" id="">Description</span>
                    </div>


                </div>


                <div class="row ">

                    <div class="inputbox py-2 col-6 col-lg-1 col-sm-2">
                        <input class="" readonly id="TxtTotalQty" type="number" name="" placeholder="">
                        <span class="Txtspan" id="">Total</span>
                    </div>
                    <div class="inputbox py-2 col-6 col-lg-1 col-sm-2">
                        <input class="" readonly id="TxtTotalRecQty" title="RecQty" type="number" name=""
                            placeholder="">
                    </div>



                    <div class="inputbox py-2 col-6 col-lg-1 col-sm-2">
                        <input class="" readonly id="TxtTotalNotRecQty" title="NotRecQty" type="number" name=""
                            placeholder="">
                    </div>


                    <div class="inputbox py-2 col-6 col-lg-1 col-sm-2">
                        <input class="" readonly id="TxtDeliveredQty" title="DeliveredQty" type="number" name="TxtDeliveredQty"
                            placeholder="">
                    </div>
                    <div class="inputbox py-2 col-6 col-lg-1 col-sm-2">
                        <input class="" readonly id="TxtTotRtnQty" type="number" title="TotRtnQty" name="TxtTotRtnQty" placeholder="">
                    </div>
                    <div class="inputbox py-2 col-6 col-lg-1 col-sm-2">
                        <input class="" id="TxtTotMissingQty" type="number" title="TotMissingQty" name="TxtTotMissingQty" placeholder="">
                    </div>

                    <div class="inputbox py-2 col-6 col-lg-1 col-sm-2">
                        <input class="" readonly type="text" name="TxtReturnCostAmt" title="ReturnCostAmt" id="TxtReturnCostAmt" placeholder="">
                    </div>
                    <div class="inputbox py-2 col-6 col-lg-1 col-sm-2">
                        <input class="" readonly type="text" name="TxtTotalLBSAmount" title="TotalLBSAmount" id="TxtTotalLBSAmount" placeholder="">
                    </div>

                    <div class="inputbox py-2 col-6 col-lg-1 col-sm-2">
                        <input class="" readonly type="text" name="TxtNetAmountSaved" title="NetAmountSaved" id="TxtNetAmountSaved" placeholder="">
                    </div>

                    <div class="inputbox py-2 col-6 col-lg-1 col-sm-2">
                        <input class="" readonly type="text" name="TxtCrNoteAmt" id="TxtCrNoteAmt" placeholder="">
                        <span class="Txtspan">Cr.Note</span>
                    </div>



                </div>


                <div class="row ">
                    <div class="col-sm-4 py-2">

                        <div class="row pb-2">
                            <div class="inputbox py-2 col-6 col-lg-2 col-sm-3">
                                <input class="" readonly id="TxtTotSoldQty" title="TotSoldQty" type="number" name="TxtTotSoldQty" placeholder="">
                            </div>
                            <div class="inputbox py-2 col-6 col-lg-2 col-sm-3">
                                <input class="" readonly id="TxtTotCostAmt" title="TotCostAmt" type="number" name="TxtTotCostAmt" placeholder="">
                            </div>
                            <div class="inputbox py-2 col-6 col-lg-4 col-sm-6">
                                <input class=""  id="TxtHandling" type="number" name="TxtHandling" placeholder="">
                                <span class="Txtspan" id="">handling Fees</span>

                            </div>
                        </div>
                        <div class="row">
                        <a  id="BtnUnInvoice" class="btn mx-1 my-1 btn-danger col-lg-3 col-sm-6" role="button"><i class="fa fa-cloud-upload mr-2" aria-hidden="true"></i> UnInvoice</a>

                        </div>
                        {{-- <div class="inputbox">
                            <textarea class="" type="text" name="" placeholder="" id="" rows="10">{{ $bankdetails }}</textarea>
                            <span class="" id="">Desc</span>
                        </div> --}}




                    </div>
                    <div class="col-sm-2">
                        <div class="row">

                            <div class="inputbox py-1 col-6 col-sm-12">
                                <input class="" type="text" name="TxtReturn" id="TxtReturn" placeholder="">
                                <span class="" id="">Return</span>
                            </div>

                            <div class="inputbox py-2 col-6 col-sm-12">
                                <input class="" type="text" name="TxtMissing"
                                    id="TxtMissing" placeholder="">
                                <span class="" id="">Missing</span>
                            </div>

                            <div class="inputbox py-2 col-6 col-sm-12">
                                <input class="" type="text" name="TxtTotal" id="TxtTotal"
                                    placeholder="">
                                <span class="" id="">Total</span>
                            </div>

                            <div class="inputbox py-2 col-6 col-sm-12">
                                <input class="" type="text" name="TxtRVDate" id="TxtRVDate" placeholder="">
                                <span class="" id="">RV Dt</span>
                            </div>

                            <div class="inputbox py-2 col-12 col-sm-12">
                                <input class="" type="text" name="TxtRVNo" id="TxtRVNo"
                                    placeholder="">
                                <span class="" id="">RV #</span>
                            </div>

                            </div>

                    </div>

                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-4">

                                <div class="row py-2">
                                    <div class="inputbox col-12 col-sm-12">
                                        <input class="" type="text" name="TxtTotalAmount" id="TxtTotalAmount" placeholder="">
                                        <span class="" id="">Gross</span>
                                    </div>
                                </div>

                                {{-- <div class="row py-2">
                                    <div class="inputbox col-sm-12">
                                        <input class="" type="text" name="TxtDeliveryCharges"
                                            id="TxtDeliveryCharges" placeholder="">
                                        <span class="" id="">Delivery Charges</span>
                                    </div>
                                </div> --}}

                                <div class="row ">
                                    <div class="inputbox py-2 col-6 col-sm-12">
                                        <input class="" type="text" name="TxtNetAmount" id="TxtNetAmount"
                                            placeholder="">
                                        <span class="" id="">Net Amount </span>
                                    </div>

                                    <div class="inputbox py-2 col-6 col-sm-12">
                                        <input class="" type="text" name="TxtTotalGPAmt" id="TxtTotalGPAmt" placeholder="">
                                        <span class="" id="">Total Gp Amt</span>
                                    </div>

                                    <div class="inputbox py-2 col-6 col-sm-12">
                                        <input class="" type="text" name="TxtGPPer" id="TxtGPPer"
                                            placeholder="">
                                        <span class="" id="">GP %</span>
                                    </div>

                                    <div class="inputbox py-2 col-6 col-sm-12">
                                        <input class="" type="text" name="TxtReceivedAmount"
                                            id="TxtReceivedAmount" placeholder="">
                                        <span class="" id="">Rcvd Amt</span>
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-8">

                                <div class="row py-2">

                                    <div class="inputbox col-6 py-2 col-sm-4">
                                        <input class="" type="text" name="TxtInvDiscPer" id="TxtInvDiscPer"
                                            placeholder="">
                                        <span class="" id="">INV Disc %</span>
                                    </div>

                                    <div class="inputbox col-6 py-2 col-sm-4">
                                        <input class="" type="text" name="TxtDiscAmt" id="TxtDiscAmt"
                                            placeholder="">
                                        <span class="" id="">Amt</span>
                                    </div>

                                </div>

                                <div class="row py-1 mt-3">
                                    <span id="LblCreditNotePer" class="col-3 col-sm-2 text-right text-blue">0</span><label
                                        class="col-5 col-sm-3">%&nbsp;&nbsp;&nbsp;CR Note:</label><span id="LblCreditNote"
                                        class="col-3 col-sm-2 text-blue text-right">0</span>
                                </div>
                                <div class="row py-1">
                                    <span id="LblRebaitPer" class="col-3 col-sm-2 text-right text-blue">0</span>
                                    <label class="col-5 col-sm-3">%&nbsp;&nbsp;&nbsp;AVI Rebate :</label><span id="LblRebaitAmt"
                                        class="col-3 col-sm-2 text-blue text-right">0</span>
                                    <label class="col-5 col-sm-3">NP :</label><span id="LBLNETGP"
                                        class="col-3 col-sm-2 text-success text-right">0</span>
                                </div>
                                <div class="row py-1">
                                    <span id="LblAgentCommPer" class="col-3 col-sm-2 text-right text-blue">0</span><label
                                        class="col-5 col-sm-3">%&nbsp;&nbsp;&nbsp;Agnt Comm :</label><span id="LblAgentComm"
                                        class="col-3 col-sm-2 text-blue text-right">0</span>
                                </div>
                                <div class="row py-1">
                                    <span id="LblSalesManCommPer" class="col-3 col-sm-2 text-right text-blue">0</span><label
                                        class="col-5 col-sm-3">%&nbsp;&nbsp;&nbsp;Sls Comm :</label><span id="LblSalesManComm"
                                        class="col-3 col-sm-2 text-blue text-right">0</span>
                                </div>
                                <div class="row py-1">
                                    <span class="col-3 col-sm-2"></span><label class="col-5 col-sm-3 text-blue">NET SALE
                                        :</label><span id="LblNetAmount" class="col-3 col-sm-2 text-right text-blue">0</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- </form> --}}

    <div id="loading" class="overlay">
        <div class="overlay__inner">
            <div class="overlay__content"><span class="spinner"></span></div>
        </div>
    </div>
    <input type="hidden" id="DataMasterTerms">
    <input type="hidden" id="CustomerActCode">
    {{-- {{$dt5}} --}}
@stop
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/ajaxsuccess.css">

    <style>
       @media (max-width: 767px) {
  body {
    font-size: 12px; /* Adjust as needed for smaller screens */
  }
}

        .span-w {
            width: 90px;

        }

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
        $(document).ready(function() {
            $("#loading").hide();

            $('#cupon-pop-pono').val('{{$PONO}}');

            //       }
            // console.log(MDTRTNQty);
            document.getElementById("deliverydate").valueAsDate = new Date();
            document.getElementById("TxtRtnDate").valueAsDate = new Date();
            var inputtime = document.getElementById("TxtRtnTime");
            var now = new Date();
            inputtime.value = now.toLocaleTimeString("en-US", {
                hour12: false
            });




            $('#Invoicetable').DataTable({
                scrollY: 350,
                scrollX: true,
                deferRender: true,
                scroller: true,
                paging: false,
                info: false,
                ordering: false,
                responsive: true,
                searching: false,
                // dom: 'Bfrtip',
                //       buttons: [
                //           'excel',
                //       ]

            });
        });


        function Calcu() {
           var MAmt = 0;var MAmt2 = 0;var MMNetAmount = 0;var MNoOfItems = 0;var MTotalRecQty = 0;var MTotalNotRecQty = 0;var MTotalPurQty = 0;var MVendorPrice = 0;var MCostPrice = 0;var MGPAmt = 0;var MGPPer = 0;var MEAPrice = 0;var MDiscPer = 0;var MLBSAmount = 0;var TxtTotRtnQty = 0;var TxtTotMissingQty = 0;var TxtTotMissingQty = 0; var TxtTotSoldQty=0;

            $('#TxtTotalNotRecQty, #TxtTotalRecQty, #TxtTotRtnQty, #TxtTotMissingQty, #TxtTotSoldQty, #TxtTotalGPAmt, #TxtReturn, #TxtMissing, #TxtGPCostAmt, #TxtReturnCostAmt, #TxtTotCostAmt').val(0);


            let table = document.getElementById('Invoicetablebody');
            let rows = table.rows;


            for (let i = 0; i < rows.length; i++) {
                let cells = rows[i].cells;

                    let Itemcode = cells[0] ? cells[0].innerHTML : '';
                    let ItemName = cells[1] ? cells[1].innerHTML : '';
                    let Puom = cells[2] ? cells[2].innerHTML : '';
                    let Orderqty = cells[3] ? cells[3].innerHTML : '';
                    let Recvdqty = cells[4] ? cells[4].innerHTML : '';
                    let NotRecvdqty = cells[5] ? cells[5].innerHTML : '';
                    let Deliveryqty = cells[6] ? cells[6].innerHTML : '';
                    let RtnQty = cells[7] ? cells[7].innerHTML : '';
                    let MisngQty = cells[8] ? cells[8].innerHTML : '';
                    let SoldQty = cells[9] ? cells[9].innerHTML : '';
                    let Price = cells[10] ? cells[10].innerHTML : '';
                    let Amount = cells[11] ? cells[11].innerHTML : '';
                    let PO = cells[12] ? cells[12].innerHTML : '';
                    let ID = cells[13] ? cells[13].innerHTML : '';
                    let QID = cells[14] ? cells[14].innerHTML : '';
                    let VendorPrice = cells[15] ? cells[15].innerHTML : '';
                    let VendorCode = cells[16] ? cells[16].innerHTML : '';
                    let VendorActCode = cells[17] ? cells[17].innerHTML : '';
                    let Cost = cells[18] ? cells[18].innerHTML : '';
                    let GP  = cells[19] ? cells[19].innerHTML : '';
                    let GPAmt = cells[20] ? cells[20].innerHTML : '';
                    let VendorName = cells[21] ? cells[21].innerHTML : '';
                    let DiscIncomePer = cells[22] ? cells[22].innerHTML : '';
                    let DiscIncomeAmt = cells[23] ? cells[23].innerHTML : '';
                    let CostPriceNew = cells[24] ? cells[24].innerHTML : '';
                    let DiscPerVendor = cells[25] ? cells[25].innerHTML : '';
                    let ReturnCostAmt = cells[26] ? cells[26].innerHTML : '';
                    let NoDiscount = cells[27] ? cells[27].querySelector('input[type="checkbox"]') : '';
                    let SNo = cells[28] ? cells[28].innerHTML : '';
                    let IMPACode = cells[29] ? cells[29].innerHTML : '';
                    let StockCode = cells[30] ? cells[30].innerHTML : '';
                    let MoveToStockQty = cells[31] ? cells[31].innerHTML : '';
                    let LBSQTY = cells[32] ? cells[32].innerHTML : '';
                    let LBSRate = cells[33] ? cells[33].innerHTML : '';
                    let LBSAmount = cells[34] ? cells[34].innerHTML : '';


                    MNoOfItems += Number(Orderqty);
                    MTotalRecQty += Number(Recvdqty);
                    MTotalNotRecQty += Number(NotRecvdqty);
                    MTotalPurQty += Number(Deliveryqty);


                    if ($('#ChkKG').prop('checked')) {
                        if (Puom == 'LB' || Puom == 'LBS') {
                            let MKGRate = parseFloat(Price * 2.2 ).toFixed(2);
                            cells[33].innerHTML == MKGRate;

                            let MLBSQTY = parseFloat(SoldQty / 2.2).toFixed(2);
                            cells[32].innerHTML == MLBSQTY;

                            let MAmtLBS = MKGRate * MLBSQTY;
                            cells[34].innerHTML == MAmtLBS;
                            cells[11].innerHTML == MAmtLBS;

                        }else{

                            let MMRate = parseFloat(Price).toFixed(2);
                            let MMQty = parseFloat(SoldQty).toFixed(2);
                            let MAmtLBS = parseFloat(MMRate * MMQty).toFixed(2);

                            cells[11].innerHTML == MAmtLBS;
                            cells[32].innerHTML == SoldQty;
                            cells[33].innerHTML == Price;
                            cells[34].innerHTML == MAmtLBS;

                        }
                    }else{
                        let MMRate = parseFloat(Price).toFixed(2);
                        let MMQty = parseFloat(SoldQty).toFixed(2);
                        let MAmtLBS = parseFloat(MMRate * MMQty).toFixed(2);

                        cells[11].innerHTML == MAmtLBS;
                        cells[32].innerHTML == SoldQty;
                        cells[33].innerHTML == Price;
                        cells[34].innerHTML == MAmtLBS;

                    }
                    TxtTotRtnQty += Number(RtnQty);
                    TxtTotMissingQty += Number(MisngQty);
                    TxtTotSoldQty += Number(SoldQty);


                    MEAPrice = parseFloat(Price).toFixed(2);
                    MVendorPrice = Cost;
                    MDiscPer = DiscPerVendor;
                    MCostPrice = parseFloat((Number(VendorPrice) - Number(VendorPrice)) * Number(MDiscPer) / 100).toFixed(2);


                    $('ChkDirectDelivery').prop('checked',false);
                    $('ChkApplyPrice').prop('checked',true);

                    cells[24].innerHTML == parseFloat(MCostPrice) * parseFloat(SoldQty);

                    $('TxtReturnCostAmt').val($('TxtReturnCostAmt').val() + (parseFloat(MCostPrice) * parseFloat(RtnQty)))
                    $('TxtGPCostAmt').val($('TxtGPCostAmt').val() + (parseFloat(cells[24].innerHTML)))


                    // Set ReturnCostAmt
                    cells[26].innerHTML == parseFloat(MCostPrice * RtnQty).toFixed(2);
                    // Calculate and set MGPAmt
                    var MSaleAmt = parseFloat(MEAPrice * SoldQty).toFixed(2);
                    var MCostAmt = MCostPrice * SoldQty;
                    var MCostDeliveredAmt = parseFloat(Deliveryqty) * MCostPrice;
                        MGPAmt = MSaleAmt - MCostAmt;
                        cells[20].innerHTML == MGPAmt.toFixed(2);

                    // Calculate and set GPPer
                    var MSaleAmtValue = parseFloat(MSaleAmt);
                    var MGPPer = MGPAmt / (MSaleAmtValue == 0 ? 1 : MSaleAmtValue) * 100;
                    cells[19].innerHTML == MGPPer.toFixed(2);

                    // Update TxtReturn and TxtMissing
                    var ReturnQtyValue = parseFloat(cells[7].innerHTML);
                    var MissingQtyValue = parseFloat(cells[8].innerHTML);
                    var TxtReturn = parseFloat($('#TxtReturn').val());
                    var TxtMissing = parseFloat($('#TxtMissing').val());
                    $('#TxtReturn').val((TxtReturn + ReturnQtyValue * MCostPrice).toFixed(2));
                    $('#TxtMissing').val((TxtMissing + MissingQtyValue * MCostPrice).toFixed(2));

                    // Set OurPrice
                    cells[18].innerHTML == parseFloat(MCostPrice).toFixed(2);

                    // Calculate and update MAmt
                    var AmountValue = parseFloat(cells[11].innerHTML);
                    var MMAmount = Math.round(AmountValue * 100) / 100; // Round to 2 decimal places
                    MAmt += Number(MMAmount);
                        if (NoDiscount == 0) {
                            let MAmount2 = cells[11].innerHTML;
                            let MMAmount2 = customRound(MAmount, 2);
                            MAmt2 = parseFloat(MAmt2) + parseFloat(MMAmount2);
                        }
                        MLBSAmount += Number(cells[34].innerHTML);
                        $('#TxtTotCostAmt').val($('#TxtTotCostAmt').val() + parseFloat(MCostDeliveredAmt));
            }
            $('#TxtTotRtnQty').val(parseFloat(TxtTotRtnQty).toFixed(2));
            $('#TxtTotMissingQty').val(TxtTotMissingQty);
            $('#TxtTotSoldQty').val(TxtTotSoldQty);

            $('#TxtTotalNotRecQty').val(MTotalNotRecQty);
            $('#TxtTotal').val(Number($('#TxtReturn').val()) + Number($('#TxtMissing').val()));
            $('#TxtTotalAmount').val(MAmt);
            $('#TxtTotalAmount2').val(MAmt2);
            $('#TxtTotalLBSAmount').val(MLBSAmount);
            $('#TxtTotalQty').val(MNoOfItems);
            $('#TxtDeliveredQty').val(MTotalPurQty);
            $('#TxtTotalRecQty').val(MTotalRecQty);

            if ($('#TxtInvDiscPer').val() !== 0 || $('#TxtInvDiscPer').val() !== '') {
                $('#TxtDiscAmt').val(parseFloat($('#TxtInvDiscPer').val() * $('#TxtTotalAmount').val() / 100).toFixed(2));

            }else{
                $('#TxtDiscAmt').val(0);
            }
            $('#TxtNetAmount').val( parseFloat( $('#TxtTotalAmount').val() - $('#TxtDiscAmt').val()).toFixed(2) );

            MMNetAmount = parseFloat($('#TxtTotalAmount2').val() - $('#TxtDiscAmt').val()).toFixed(2)

            $('#TxtTotalLBSAmount').val(parseFloat($('#TxtTotalLBSAmount').val() - $('#TxtDiscAmt').val()).toFixed(2));

            var MPOHandlingCharges = $('#TxtHandling').val();
            var TxtTotCostAmt =  $('#TxtTotCostAmt').val();
            var TxtPurchaseReturn =  $('#TxtPurchaseReturn').val();
            $('#TxtTotCostAmt').val((TxtTotCostAmt ? parseFloat(TxtTotCostAmt) : 0 + MPOHandlingCharges ? parseFloat(MPOHandlingCharges) : 0 ) -  TxtPurchaseReturn ? parseFloat(TxtPurchaseReturn) : 0);
            var plus = parseFloat($('#TxtGPCostAmt').val()) + parseFloat($('#TxtPullStockAmt').val() ? $('#TxtPullStockAmt').val() : 0) + ( MPOHandlingCharges ? parseFloat(MPOHandlingCharges) : 0  );
            var minus = ($('#TxtReturnCostAmt').val() + $('#TxtPurchaseReturn').val() + $('#TxtMissing').val());
            var TxtGPCostAmt = plus - minus;
            $('#TxtGPCostAmt').val(TxtGPCostAmt);

            if ($('#LblCreditNotePer').text() !== '0') {

                $('#LblCreditNote').text((parseFloat(MMNetAmount) * parseFloat($('#LblCreditNotePer').text()) / 100).toFixed(2))
            }else{
                $('#LblCreditNote').text(0);
            }


            var TxtRtnDate = new Date($('#TxtRtnDate').val()).getDate();
            if (TxtRtnDate >= ("01/01/2022") ) {
               var  MNetAmountForAgentComm = parseFloat(MMNetAmount) - (parseFloat($("#LblCreditNote").text()) + parseFloat($('#TxtCrNoteAmt').text()));
            }else{
                var  MNetAmountForAgentComm = parseFloat(MMNetAmount);
            }

            if ($('#LblRebaitPer').text() !== '0') {
                $('#LblRebaitAmt').text( (parseFloat(MNetAmountForAgentComm) * parseFloat($('#LblRebaitPer').text()) / 100).toFixed(2));
            }else{
                $('#LblRebaitAmt').text(0);
            }

            if ($('#LblAgentCommPer').text() !== '0') {
                $('#LblAgentComm').text( (parseFloat($('#TxtTotalAmount').val()) * parseFloat($('#LblAgentCommPer').text()) / 100).toFixed(2));
            }else{
                $('#LblAgentComm').text(0);
            }

            var MNetAmountForSManComm = parseFloat(MMNetAmount) - (parseFloat($('#LblCreditNote').text()) + parseFloat($('#TxtCrNoteAmt').val()) + parseFloat($('#LblRebaitAmt').text()) + parseFloat($('#LblAgentComm').text()));

            if ($('#LblSalesManCommPer').text() !== '0') {
                $('#LblSalesManComm').text( (parseFloat(MNetAmountForSManComm) * parseFloat($('#LblSalesManCommPer').text()) / 100).toFixed(2));
            }else{
                $('#LblSalesManComm').text(0);
            }
            let tn = ($('#TxtNetAmount').val())  - ($('#TxtCrNoteAmt').val());
            let cn = parseFloat($('#LblCreditNote').text()) + parseFloat($('#LblRebaitAmt').text());
            let as = parseFloat($('#LblAgentComm').text()) + parseFloat($('#LblSalesManComm').text());
            var LblNetAmount = ( tn + cn + as);
            $('#LblNetAmount').text(LblNetAmount);
            var MGPAmount =  (parseFloat($('#LblNetAmount').text()) - parseFloat($('#TxtGPCostAmt').val())).toFixed(2);
            $('#LBLNETGP').text(parseFloat(MGPAmount / $('#LblNetAmount').text() == 0 ? 1 : $('#LblNetAmount').text() * 100).toFixed(2));
            $('#TxtTotalGPAmt').val(($('#LblNetAmount').text() - $('#TxtGPCostAmt').val()).toFixed(2));
            TxtGPPer = 0;
            TxtGPPer = $('#TxtTotalGPAmt').val() / $('#LblNetAmount').text() == 0 ? 1 : $('#LblNetAmount').text() * 100;
            $('#TxtGPPer').val(parseFloat(TxtGPPer).toFixed(2));

        }

        function customRound(number, precision) {
            var factor = Math.pow(10, precision);
            var rounded = Math.round(number * factor) / factor;
            return rounded;
        }

        function tablecomposer() {
            let table = document.getElementById('Invoicetablebody');
            let rows = table.rows;
           var datatablearray = [];
            for (let i = 0; i < rows.length; i++) {
                let cells = rows[i].cells;
                datatablearray.push({

                Itemcode : cells[0] ? cells[0].innerHTML : '',
                ItemName : cells[1] ? cells[1].innerHTML : '',
                Puom : cells[2] ? cells[2].innerHTML : '',
                Orderqty : cells[3] ? cells[3].innerHTML : '',
                Recvdqty : cells[4] ? cells[4].innerHTML : '',
                NotRecvdqty : cells[5] ? cells[5].innerHTML : '',
                Deliveryqty : cells[6] ? cells[6].innerHTML : '',
                RtnQty : cells[7] ? cells[7].innerHTML : '',
                MisngQty : cells[8] ? cells[8].innerHTML : '',
                SoldQty : cells[9] ? cells[9].innerHTML : '',
                Price : cells[10] ? cells[10].innerHTML : '',
                Amount : cells[11] ? cells[11].innerHTML : '',
                PO : cells[12] ? cells[12].innerHTML : '',
                ID : cells[13] ? cells[13].innerHTML : '',
                QID : cells[14] ? cells[14].innerHTML : '',
                VendorPrice : cells[15] ? cells[15].innerHTML : '',
                VendorCode : cells[16] ? cells[16].innerHTML : '',
                VendorActCode : cells[17] ? cells[17].innerHTML : '',
                Cost : cells[18] ? cells[18].innerHTML : '',
                GP  : cells[19] ? cells[19].innerHTML : '',
                GPAmt : cells[20] ? cells[20].innerHTML : '',
                VendorName : cells[21] ? cells[21].innerHTML : '',
                DiscIncomePer : cells[22] ? cells[22].innerHTML : '',
                DiscIncomeAmt : cells[23] ? cells[23].innerHTML : '',
                CostPrice : cells[24] ? cells[24].innerHTML : '',
                DiscPerVendor : cells[25] ? cells[25].innerHTML : '',
                ReturnCostAmt : cells[26] ? cells[26].innerHTML : '',
                NoDiscount : cells[27] ? cells[27].innerHTML : '',
                SNo : cells[28] ? cells[28].innerHTML : '',
                IMPACode : cells[29] ? cells[29].innerHTML : '',
                StockCode : cells[30] ? cells[30].innerHTML : '',
                MoveToStockQty : cells[31] ? cells[31].innerHTML : '',
                LBSQTY : cells[32] ? cells[32].innerHTML : '',
                LBSRate : cells[33] ? cells[33].innerHTML : '',
                LBSAmount : cells[34] ? cells[34].innerHTML : '',




                });

            }
            return datatablearray;
        }


        $(document).on("click", "#Invoicebtn", function() {

            SaveInvoice();
        });

        function Invoicebtn() {



            // statuschecker()
            let MInvNo = '{{ $PONO }}';
            let MRep = "SaleInvoice";
            let CHeading = "0";

            if ($('#ChkCompanyHeading').prop("checked") == true) {
                CHeading = "1";
            } else {
                CHeading = "0";
            }
            let MPass = false;
            if ($('#ChkKG').prop("checked") == true) {
                MPass = true;
            } else {
                MPass = false;
            }

            window.open("/FinalInvoicePrint/" + {{ $PONO }}, "_blank");

            MInvNo = "";
            MPass = false;
        }

        function statuschecker() {
            let status = document.getElementById("status").value;
            let Description = document.getElementById('Description').value;

            vsno = $('#VSN').text();
            Pono = '{{ $PONO }}';
            DepartmentName = $('#DepartmentName').text();
            var VesselName = $('#VesselName').text();
            //   console.log(status);
            if (Description === "") {


                if (status === "DELIVERED") {
                    document.getElementById('Description').value = "Delivered to " + VesselName +
                        ", " + DepartmentName;

                } else {
                    document.getElementById('Description').value = "Transit to New Orlance " +
                    VesselName + ", " + DepartmentName;
                }

            }
        }
        $(document).on("click", "#Description", function() {
            statuschecker()
        })

        $(document).on("click", "#SaveInvoice", function() {
            SaveInvoice();
        });

        function SaveInvoice() {
             let CmbTerms = $('#CmbTerms').val();
            let terms = $('#DataMasterTerms').val();
            let status = document.getElementById("status").value;
            let Warehouse = document.getElementById('Warehouse').value;
            let CustomerActCode = $('#CustomerActCode').val();
            //         if (CmbTerms.trim().length === 0) {
            // alert('0');
            // }else{
            //             alert('loong');

            //         }

            const correctPassword = '332211';

            if ($('#ChkHold').prop("checked")) {
                Swal.fire(
                  'You Cannot Create the Invoice',
                  'This Vessel Is On Hold',
                  'info'
                )
                // alert();
                return;
            }
            if (terms !== CmbTerms) {
            Swal.fire({
                title: 'You Changed Terms',
                text: 'Please enter Admin Authentication!',
                input: 'password',
                inputAttributes: {
                    autocapitalize: 'off',
                    autocorrect: 'off'
                },
                showCancelButton: true,
                confirmButtonText: 'Submit',
                showLoaderOnConfirm: true,
                preConfirm: (password) => {
                    if (password !== correctPassword) {
                        Swal.showValidationMessage('Incorrect password');
                        return;
                    } else {

                        document.getElementById("CmbTerms").value = terms;

                    }
                },
                allowOutsideClick: () => !Swal.isLoading()
            })


            }

            if (Warehouse == "") {
                // alert("Empty");
                Swal.fire(
                  'Warehouse Not Found',
                  'Please select Warehouse First',
                  'error'
                )
                $('#Warehouse').focus();
                return;

            }
            if (CustomerActCode == null || CustomerActCode == '') {
                Swal.fire(
                  'A/c Code Not Found',
                  'Please Select the Account',
                  'error'
                )
                return;

            }
            if (CmbTerms.trim().length === 0) {
                Swal.fire(
                  'Terms Not Found',
                  'Please Select Terms First',
                  'error'
                )
                document.getElementById('CmbTerms').focus();
                return;
            }
            let MTerms = CmbTerms;
            let MTermsValid = true;

            CheckTerms();
            // else{
            // alert("Step-1");
            // }

            //         console.log("not working");

        }

        function CheckTerms() {
            let MTermsValid = true;
            let MTerms = document.getElementById('CmbTerms').value;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'post',
                url: '{{ URL::to('CheckTerms') }}',
                data: {
                    MTerms,
                    MTermsValid,


                },
                success: function($response) {
                    let TxtDays = $response.day;
                    if ($response.Message == !null) {
                        alert($response.Message);

                    }
                    // console.log($response.PTermsCode);
                    if ($response.MTermsValid == false) {
                        alert("exit");
                        return;
                    }

                    // alert('step2');
                    // DMMasterschecker();



                    CmbTerms_LostFocus(TxtDays)


                    let TxtInvoiceNo = $('.InvoiceNo').text();
                    if (parseInt(TxtInvoiceNo) === 0 || TxtInvoiceNo === '') {
                        // MaxNo();
                        return alert('Invoice Not found');
                    }

                    Invoicesavefunction(TxtInvoiceNo);




                }
            });







        }

        function Invoicesavefunction(TxtInvoiceNo) {
            let TxtRtnDate = $('#TxtRtnDate').val();
            let TxtRtnTime = $('#TxtRtnTime').val();
            let TxtRefNo = $('#CustomerRefNo').text();
            let TxtDispatchDate = $('#DispatchDate').val();
            let TxtVSNNo = $('#VSN').text();
            let TxtChargeNO = TxtInvoiceNo;
            let TxtEventNo = $('#EventNo').text();
            let Department = $('#DataMasterDepartment').val();
            let DepartmentCode = $('#DataMasterDepartmentCode').val();
            let DepartmentName = $('#DepartmentName').text();
            let TxtQuoteNO = $('#QuoteNo').text();
            let TxtActCode = $('#CustomerCode').val();
            let TxtActName = $('#CustomerName').text();
            let TxtActCodeNew = $('#CustomerActCode').val();
            let TxtDescription = $('#Description').val();
            let LblVesselName = $('#VesselName').text();
            let TxtTotalQty = $('#TxtTotalQty').val();
            let TxtTotalRecQty = $('#TxtTotalRecQty').val();
            let TxtTotalNotRecQty = $('#TxtTotalNotRecQty').val();
            let TxtDeliveredQty = $('#TxtDeliveredQty').val();
            let TxtTotRtnQty = $('#TxtTotRtnQty').val();
            let TxtTotMissingQty = $('#TxtTotMissingQty').val();
            let TxtTotSoldQty = $('#TxtTotSoldQty').val();
            let TxtTotalGPAmt = $('#TxtTotalGPAmt').val();
            let CmbTerms = $('#CmbTerms').val();
            let TxtNetAmount = $('#TxtNetAmount').val();
            let TxtDiscAmt = $('#TxtDiscAmt').val();
            let TxtInvDiscPer = $('#TxtInvDiscPer').val();
            let TxtOrderDate = $('#orderdate').val();
            let TxtDueDate = $('#TxtDueDate').val();
            let CmbGodownName = $('#Warehouse').val();
            var TxtGodownCode = $("#Warehouse option:selected").data("godowncode");
            let TxtDeliveryCharges = $('#TxtDeliveryCharges').val();
            let TxtGPPer = $('#TxtGPPer').val();
            let TxtTotCostAmt = $('#TxtTotCostAmt').val();
            let TxtReturn = $('#TxtReturn').val();
            let TxtCrNoteAmt = $('#CrNoteAmt').val();;
            let ChkSevenSeasDelivery = 0;
            if ($('#ChkSevenSeasDelivery').prop("checked") == true) {
                ChkSevenSeasDelivery = 1
            } else {
                ChkSevenSeasDelivery = 0
            }

            let LblCreditPer = $('#LblCreditNotePer').html();
            let LblRebaitPer = $('#LblRebaitPer').html();
            let LblAgentCommPer = $('#LblAgentCommPer').html();
            let LblSalesManCommPer = $('#LblSalesManCommPer').html();
            let LblCreditNote = $('#LblCreditNote').html();
            let LblRebaitAmt = $('#LblRebaitAmt').html();
            let LblAgentComm = $('#LblAgentComm').html();
            let LblSalesManComm = $('#LblSalesManComm').html();

            let Tabledata = tablecomposer();

            console.log(Tabledata);

            ajaxSetup();
            $.ajax({
                type: 'post',
                url: "{{ URL::to('InvoiceSave') }}",
                data: {
                    TxtInvoiceNo : TxtInvoiceNo,
                    Department : Department,
                    DepartmentCode : DepartmentCode,
                    DepartmentName : DepartmentName,
                    TxtRtnDate : TxtRtnDate,
                    TxtRtnTime : TxtRtnTime,
                    TxtRefNo : TxtRefNo,
                    TxtDispatchDate : TxtDispatchDate,
                    TxtVSNNo : TxtVSNNo,
                    TxtChargeNO : TxtChargeNO,
                    TxtEventNo : TxtEventNo,
                    TxtQuoteNO : TxtQuoteNO,
                    TxtActCode : TxtActCode,
                    TxtActName : TxtActName,
                    TxtActCodeNew : TxtActCodeNew,
                    TxtDescription : TxtDescription,
                    LblVesselName : LblVesselName,
                    TxtTotalQty : TxtTotalQty,
                    TxtTotalRecQty : TxtTotalRecQty,
                    TxtTotalNotRecQty : TxtTotalNotRecQty,
                    TxtDeliveredQty : TxtDeliveredQty,
                    TxtTotRtnQty : TxtTotRtnQty,
                    TxtTotMissingQty : TxtTotMissingQty,
                    TxtTotSoldQty : TxtTotSoldQty,
                    TxtTotalGPAmt : TxtTotalGPAmt,
                    CmbTerms : CmbTerms,
                    TxtNetAmount : TxtNetAmount,
                    TxtDiscAmt : TxtDiscAmt,
                    TxtInvDiscPer : TxtInvDiscPer,
                    TxtOrderDate : TxtOrderDate,
                    TxtDueDate : TxtDueDate,
                    TxtGodownCode : TxtGodownCode,
                    CmbGodownName : CmbGodownName,
                    TxtDeliveryCharges : TxtDeliveryCharges,
                    TxtGPPer : TxtGPPer,
                    TxtTotCostAmt : TxtTotCostAmt,
                    TxtCrNoteAmt : TxtCrNoteAmt,
                    ChkSevenSeasDelivery : ChkSevenSeasDelivery,
                    LblCreditPer : LblCreditPer,
                    LblRebaitPer : LblRebaitPer,
                    LblAgentCommPer : LblAgentCommPer,
                    LblSalesManCommPer : LblSalesManCommPer,
                    LblCreditNote : LblCreditNote,
                    LblRebaitAmt : LblRebaitAmt,
                    LblAgentComm : LblAgentComm,
                    LblSalesManComm : LblSalesManComm,
                    Tabledata : Tabledata,
                    TxtReturn : TxtReturn,




                },
                beforeSend: function() {
                    // Show the overlay and spinner before sending the request
                    $('.overlay').show();
                },
                success: function($response) {
                    let Message = $response.Message;
                    if (Message == 'Success') {
                        // alert('saved' + Message);
                        $('#ajax-success-modal').modal('show');

                        Invoicebtn();
                    } else {
                        alert('saved' + Message);

                    }

                },
                complete: function() {
                    // Hide the overlay and spinner after the request is complete
                    $('.overlay').hide();
                }


            });

        }


        function CmbTerms_LostFocus(TxtDays) {
            document.getElementById('TxtDays').value = TxtDays;
            let datexget = document.getElementById('TxtRtnDate').value;
            let datex = new Date(datexget);
            let TxtDueDate = document.getElementById('TxtDueDate').value;
            TxtDueDate = new Date(datex.setDate(datex.getDate() + parseInt(TxtDays)));

        }

        // function MaxNo() {
        //     let maxInvoiceNoplus = parseInt(maxInvoiceNo) + 1;

        //     $('.InvoiceNo').html(maxInvoiceNoplus);

        // }
    </script>

    <script>
        // function DMMasterschecker() {

        //     let txtReturnQty = $('#TxtTotRtnQty').val();

        //     if (MDTRTNQty == txtReturnQty) {

        //     } else {
        //         alert(
        //             "Return Quantity is Not Matched with DM Return Quantity, Please Correct your DM First or Remove All DM First Please Re-Check DM Again"
        //         );

        //         return;
        //     }
        //     if (MSalesCode.trim().length == 0) {
        //         alert("Sales Account Not Found Plz Use Fix Account Setup");
        //         return;

        //     }
        //     // alert("step-DMMasterschecker");


        // }

        $(document).on("click", "#FinalPrint", function() {
            let MRep = "FinalEdit";
            let CHeading = "1";
            let MPass = false;
            let MChargeNo = '{{ $PONO }}';
            if ($('#ChkKG').prop("checked") == true) {
                MPass = true;
            } else {
                MPass = false;
            }
            window.open("/FinalInvoicePrint/" + MChargeNo, "_blank");




        });

        function check() {
            let ChkSevenSeasDelivery = document.getElementById("ChkSevenSeasDelivery");
            let ChkHold = document.getElementById("ChkHold");









        }

        function  ajaxSetup(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        }
        function Dataget(){
            ajaxSetup();
            $.ajax({
                    type: 'post',
                    url: "{{ route('Final_invoiceDataget') }}",
                    data: {
                        PONO:$('.InvoiceNo').text(),
                    },
                    beforeSend: function() {
                        // Show the overlay and spinner before sending the request
                        $('.overlay').show();
                    },
                    success: function(response) {
                        console.log(response);

                        if(response.DataMaster){
                            var DataMaster = response.DataMaster;
                            $('.VSN').text(DataMaster.VSNNo);
                            $('.event_no').text(DataMaster.EventNo);
                            $('.QuoteNo').text(DataMaster.QuoteNo);
                            $('.customer').text(DataMaster.CustomerName);
                            $('.vessel').text(DataMaster.VesselName);
                            $('.customer_ref_no').text(DataMaster.CustomerRefNo);
                            $('.Department').text(DataMaster.DepartmentName);
                            $('#orderdate').val(DataMaster.OrderDate);
                            $('#DispatchDate').val(DataMaster.DispatchDate);
                            $('#deliveryTime').val(DataMaster.DispatchTime);
                            $('#status').val(DataMaster.Status);
                            $('#status').val(DataMaster.Status);
                            $('#TxtAtten').val(DataMaster.Atten);
                            $('#TxtBillingCompany').val(DataMaster.BContactPerson);
                            $('#TxtBillingAddress').val(DataMaster.BillingAddress);
                            $('#CmbTerms').val(DataMaster.Terms);
                            $('#DataMasterTerms').val(DataMaster.Terms);
                            $('#DeliveryOrderNo').val(DataMaster.DeliveryOrderNo);
                            if (DataMaster.ChkSevenSeasDelivery) {
                                $('#ChkSevenSeasDelivery').prop('checked',true);
                            }else{
                                $('#ChkSevenSeasDelivery').prop('checked',false);
                            }
                            $('#VATPER').val(DataMaster.VATPER);
                            $('#TxtVatAmt1').val(DataMaster.VATAmt);
                            $('#TxtPODeliveryCharges').val(DataMaster.DeliveryCharges);
                            $('#Description').val(DataMaster.Des);
                            $('#TxtRecAmt').val(DataMaster.ReceivedAmt);
                            $('#TxtPaidAmt').val(DataMaster.PaidAmt);
                            $('#VendorActCode').val(DataMaster.VendorActCode);
                            $('#TxtTotCostAmt').val(DataMaster.CostAmt);
                            $('#TxtInvDiscPer').val(DataMaster.InvDiscPer);
                            $('#TxtDiscAmt').val(DataMaster.InvDiscAmt);
                            $('#datacharge').val(DataMaster.PONo);
                            $('#CustomerActCode').val(DataMaster.CustomerActCode);

                        }
                        if(response.bankInfo){
                            $('#Bankinfo').val(response.bankInfo.BankInfo);
                        }
                        if(response.MGstAmt){
                            $('#TxtVatAmt1').val(response.MGstAmt);
                        }
                        if(response.MPODeliveryCharges){
                            $('#TxtPODeliveryCharges').val(parseFloat(response.MPODeliveryCharges) + parseFloat(response.MPOHandlingCharges) );
                        }
                        if(response.NetAmount){
                            $('#TxtGPCostAmt').val(response.NetAmount);
                        }
                        if(response.MPOReturnAmt){
                            $('#TxtPurchaseReturn').val(response.MPOReturnAmt);
                        }
                        if(response.MPOHandlingCharges){
                            $('#TxtHandling').val(response.MPOHandlingCharges);
                        }



                        if(response.Datadetails){
                            var Table = response.Datadetails
                            if(Table.length > 0){
                                let table = document.getElementById('Invoicetablebody');
                                table.innerHTML = ""; // Clear the table
                                Table.forEach(function(item) {
                                    // let item = hitem.Datadetails;
                                    // let pata = hitem.purchaseorderdetail;
                                    let row = table.insertRow();

                                    function createCell(content) {
                                        let cell = row.insertCell();
                                        cell.innerHTML = content;
                                        return cell;
                                    }


                                    createCell(item.ItemCode ? item.ItemCode : '');
                                    createCell(item.ItemName ? item.ItemName : '');
                                    createCell(item.PUOM ? item.PUOM : '');
                                    createCell(item.OrderQty ? item.OrderQty : '').style.textAlign = 'center';
                                    createCell(item.RecQty ? item.RecQty : 0).style.textAlign = 'center';
                                    createCell((item.RecQty ? item.RecQty : 0)-(item.OrderQty ? item.OrderQty : '')).style.textAlign = 'center';
                                    createCell((item.DeliveredQty ? item.DeliveredQty : 0)).style.textAlign = 'center';
                                    createCell((item.ReturnQty ? item.ReturnQty : 0)).style.textAlign = 'center';
                                    createCell((item.MissingQty ? item.MissingQty : 0)).style.textAlign = 'center';
                                    createCell((item.SoldQty ? item.SoldQty : 0)).style.textAlign = 'center';
                                    createCell((item.Price ? parseFloat(item.Price).toFixed(2) : 0)).style.textAlign = 'right';
                                    createCell((item.DeliveredAmount ? parseFloat(item.DeliveredAmount).toFixed(2) : 0)).style.textAlign = 'right';
                                    createCell((item.POMadeNo ? item.POMadeNo : ''));
                                    createCell((item.ID ? item.ID : '')).hidden = 'true';
                                    createCell((item.QID ? item.QID : '')).hidden = 'true';
                                    createCell((item.VendorPrice ? item.VendorPrice : '')).hidden = 'true';
                                    createCell((item.VendorCode ? item.VendorCode : '')).hidden = 'true';
                                    createCell((item.VendorActCode ? item.VendorActCode : '')).hidden = 'true';
                                    createCell((item.CostPrice ? item.CostPrice : '')).style.textAlign = 'right';
                                    createCell(((item.DeliveredAmount - item.CostPrice) / item.DeliveredAmount * 100)).style.textAlign = 'right';
                                    createCell(((item.DeliveredAmount - item.CostPrice) ?? '')).style.textAlign = 'right';
                                    createCell((item.VendorName ? item.VendorName : ''));
                                    createCell((item.DiscIncomePer ? item.DiscIncomePer : '')).hidden = 'true';
                                    createCell((item.DiscIncomeAmt ? item.DiscIncomeAmt : '')).hidden = 'true';
                                    createCell((item.CostPrice ? item.CostPrice : '')).hidden = 'true';
                                    createCell((item.DiscPerVendor ? item.DiscPerVendor : '')).hidden = 'true';
                                    createCell((item.ReturnCostAmt ? item.ReturnCostAmt : '')).hidden = 'true';
                                    var chktd = createCell('');
                                    chktd.innerHTML = '<input type="checkbox" name="CHKNodis" id="CHKNodis'+item.ID+'">';
                                    chktd.style.textAlign = 'center'
                                    createCell((item.SNo ? item.SNo : ''));
                                    createCell((item.IMPAItemCode ? item.IMPAItemCode : ''));
                                    createCell((item.STKBuyOut ? item.STKBuyOut : ''));
                                    createCell((item.MoveToStockQty ? item.MoveToStockQty : '')).hidden = 'true';
                                    createCell('').hidden = 'true';
                                    createCell('').hidden = 'true';
                                    createCell('');


                                });
                                Calcu();

                            }
                        }


                    },
                    complete: function() {
                        // Hide the overlay and spinner after the request is complete
                        $('.overlay').hide();
                    }
                });
        }
        $(document).ready(function () {
            Dataget();
        });

        // $(document).ajaxStart(function() {
        //     $("#loading").show();
        // });

        // // Hide the loading indicator when the request is completed or failed
        // $(document).ajaxStop(function() {
        //     $("#loading").hide();
        // });
    </script>
@stop


@section('content')
