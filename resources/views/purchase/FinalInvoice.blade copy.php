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
                    <div class=" ml-2 ">
                        <strong>Charge #:</strong>&nbsp; <label
                            class="InvoiceNo text-blue">{{ $DeliveryOrderMaster->InvoiceNo }}</label>
                    </div>
                    <div class=" ml-5 ">
                        /&nbsp;<strong>VSN #:</strong>&nbsp; <label
                            class="VSN text-blue">{{ $DeliveryOrderMaster->VSNNo }}</label>
                    </div>

                    <div class="ml-5">
                        /&nbsp;<strong>Event #:</strong> &nbsp;<label class="event_no text-blue"
                            for="event_no">{{ $DataMaster->EventNo }}</label>
                    </div>
                    <div class="ml-5">
                        /&nbsp;<strong>Quote #:</strong> &nbsp;<label class="QuoteNo text-blue"
                            for="QuoteNo">{{ $DataMaster->QuoteNo }}</label>
                    </div>
                    <div class="ml-5">
                        /&nbsp; <strong>Customer :&nbsp;</strong> <label class="customer text-blue"
                            for="customer">{{ $DataMaster->CustomerName }}</label>

                    </div>
                    <div class="ml-5">
                        /&nbsp; <strong>Vessel :&nbsp;</strong> <label class="vessel text-blue"
                            for="vessel">{{ $DataMaster->VesselName }}</label>

                    </div>
                    <div class="ml-5">
                        /&nbsp; <strong>Customer Ref # :&nbsp;</strong> <label class="customer_ref_no text-blue"
                            for="customer_ref_no">{{ $DataMaster->CustomerRefNo }}</label>

                    </div>
                    <div class="ml-5">
                        /&nbsp; <strong>Department :&nbsp;</strong> <label class="Department text-blue"
                            for="Department">{{ $Datadetailsfirst->DepartmentName }}</label>
                        {{-- <input type="hidden" name="CustomerActCode" id="CustomerActCode" value="{{$DeliveryOrderMaster->CustomerActCode}}"> --}}
                    </div>
                </div>


            </div>

            {{-- <form action="/Delivery-Order-save" method="post"> --}}
            {{-- @csrf --}}
            <div class="card-body">

                <div class="row py-2">

                    <div class="inputbox col-sm-3">
                        <input id='orderdate' type="date" class=""
                            value="{{ $DataMaster->OrderDat ? date('Y-m-d', strtotime($DataMaster->OrderDate)) : date('Y-m-d') }}">
                        <span class="" id="">Order Date</span>
                    </div>

                    <div class="inputbox col-sm-3">
                        <input id='deliverydate' type="date" class="" value="">
                        <span class="" id="">Delivery Date</span>
                    </div>

                    <div class="inputbox col-sm-3">
                        <input id='DispatchDate' type="date" class=""
                            value="{{ $DataMaster->DispatchDate ? date('Y-m-d', strtotime($DataMaster->DispatchDate)) : date('Y-m-d') }}">
                        <span class="" id="">D O</span>
                    </div>

                    <div class="inputbox col-sm-3">
                        <input id='deliveryTime' type="time" class=""
                            value="{{ $DataMaster->DispatchTime ? $DataMaster->DispatchTime : date('H:i:s') }}">
                        <span class="" id="">Delivery Time</span>
                    </div>

                </div>

                <div class="row py-2">

                    <div class="inputbox col-sm-3">
                        <input id='TxtRtnDate' type="date" class=""
                            value="{{ date('Y-m-d', strtotime($DeliveryOrderMaster->RtnDate)) }}">
                        <span class="" id="">Inv Date </span>
                    </div>

                    <div class="inputbox col-sm-3">
                        <input id='TxtDueDate' type="date" class=""
                            value="{{ date('Y-m-d', strtotime($DataMaster->BidDueDate)) }}">
                        <span class="" id="">Due Date</span>
                    </div>

                    <div class="inputbox col-sm-2">
                        <span class="Txtspan" id="">Status</span>
                        <select class="" name="status" id="status">
                            <option selected value="{{ $DataMaster->Status }}">{{ $DataMaster->Status }}</option>
                            <option value="TRANSIT NOLA">TRANSIT NOLA</option>
                            <option value="DELIVERED">DELIVERED</option>
                        </select>
                    </div>

                    <div class="inputbox col-sm-2">
                        <span class="Txtspan" id="">Warehouse</span>
                        <select class="" name="Warehouse" id="Warehouse">
                            <option selected data-GodownCode="{{ $DataMaster->GodownCode }}"
                                value="{{ $DataMaster->GodownName }}">{{ $DataMaster->GodownName }}</option>
                            @foreach ($warehouse as $item)
                                <option value="{{ $item->GodownCode }}">{{ $item->GodownName }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="inputbox col-sm-2">
                        <span class="Txtspan" id="">Terms</span>
                        <select class="" name="CmbTerms" id="CmbTerms">
                            <option selected value="{{ $DataMaster->Terms }}">{{ $DataMaster->Terms }}</option>
                            {{-- @foreach ($collection as $item)
                @endforeach --}}
                            <option value="CASH">CASH</option>
                        </select>
                    </div>

                </div>


                <div class="row py-2">
                    <div class="inputbox col-sm-3">
                        <input id='TxtRtnTime' type="time" class=""
                            value="{{ $DeliveryOrderMaster->RtnTime }}">
                        <span class="Txtspan" id="">Inv Time</span>
                    </div>
                </div>
            </div>



        </div>
        <div class="card">
            <div class="card-body">
                <div class="col-sm-12 mx-auto">
                    <table class="table  table-inverse " id="Invoicetable">
                        <thead class="">
                            <tr>
                                <th>SNO</th>
                                <th>Item&nbsp;Code</th>
                                <th style="padding-left: 6rem;padding-right: 6rem">Item&nbsp;Name</th>
                                <th>UOM</th>
                                <th>Order&nbsp;Qty</th>
                                <th>Recvd&nbsp;Qty</th>
                                <th>Not&nbsp;Recvd&nbsp;Qty</th>
                                <th>Delivery&nbsp;Qty</th>
                                <th>Rtn&nbsp;Qty</th>
                                <th>Misng&nbsp;Qty</th>
                                <th>Sold&nbsp;Qty</th>
                                <th>Price</th>
                                <th>Amount</th>
                                <th>PO#</th>
                                <th>Cost</th>
                                <th hidden>OrderID</th>
                                <th hidden>QuoteID</th>
                                <th hidden>VendorPrice</th>
                                <th hidden>VendorCode</th>
                                <th hidden>VendorActCode</th>
                                <th>GP&nbsp;%</th>
                                <th>GPAmt</th>
                                <th style="padding-left: 5rem;padding-right: 5rem">Vendor&nbsp;Name</th>
                                <th hidden>DiscPer</th>
                                <th hidden>DiscAmt</th>
                                <th hidden>CostPriceNew</th>
                                <th hidden>DiscPerVendor</th>
                                <th hidden>ReturnCostAmt</th>
                                <th>IMPA&nbsp;Code</th>
                                <th hidden>StockCode</th>
                                <th hidden>Move&nbsp;To&nbsp;Stock&nbsp;Qty</th>
                                <th hidden>LBS&nbsp;QTY</th>
                                <th hidden>LBS&nbsp;Rate</th>
                                <th hidden>LBS&nbsp;Amount</th>
                            </tr>
                        </thead>
                        <tbody id="Invoicetablebody">
                            @foreach ($Datadetails as $item)
                                <tr>
                                    <td>{{ $item->SNo }}</td>
                                    <td>{{ $item->ItemCode }}</td>
                                    <td>{{ $item->ItemName }}</td>
                                    <td class="text-center">{{ $item->PUOM }}</td>
                                    <td class="text-center">{{ $item->OrderQty }}</td>
                                    <td class="text-center">{{ $item->RecQty }}</td>
                                    <td class="text-center">{{ $item->NotRecQty }}</td>
                                    <td class="text-center">{{ $item->DeliveredQty ?: 0 }}</td>
                                    <td class="text-center">{{ $item->ReturnQty ?: 0 }}</td>
                                    <td class="text-center">{{ $item->MissingQty ?: 0 }}</td>
                                    <td class="text-center">{{ $item->SoldQty }}</td>
                                    <td class="text-right">{{ round($item->Price, 2) }}</td>
                                    <td class="text-right">{{ round($item->GPAmount, 2) }}</td>
                                    <td class="text-center">{{ $item->POMadeNo }}</td>
                                    <td class="text-right">{{ round($item->Cost, 2) }}</td>
                                    <td hidden>{{ $item->ID }}</td>
                                    <td hidden>QuoteID</td>
                                    <td hidden>{{ round($item->VendorPrice, 2) }}</td>
                                    <td hidden>{{ $item->VendorCode }}</td>
                                    <td hidden>{{ $item->VendorActCode }}</td>
                                    <td class="text-center">{{ round($item->GPRate, 2) }}</td>
                                    <td class="text-right">{{ round($item->GPAmount, 2) }}</td>
                                    <td class="">{{ $item->VendorName }}</td>
                                    <td hidden>{{ $item->DiscIncomePer }}</td>
                                    <td hidden>{{ round($item->DiscIncomeAmt, 2) }}</td>
                                    <td hidden>{{ round($item->CostPrice, 2) }}</td>
                                    <td hidden>{{ $item->DiscPerVendor }}</td>
                                    <td hidden>{{ round($item->ReturnCostAmt, 2) }}</td>
                                    <td>{{ $item->IMPA }}</td>
                                    <td hidden>StockCode</td>
                                    <td hidden>{{ $item->MoveToStockQty }}</td>
                                    <td hidden>LBS&nbsp;QTY</td>
                                    <td hidden>LBS&nbsp;Rate</td>
                                    <td hidden>LBS&nbsp;Amount</td>



                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row py-2">

                    {{-- <div class="form-check form-check-inline">
                        <label class="form-check-label mx-1">
                            <input class="form-check-input" type="checkbox" onclick="check()" name="OptFormat1" id="OptFormat1" value=""> Format 1
                        </label>
                        <label class="form-check-label mx-1">
                            <input class="form-check-input" type="checkbox" onclick="check()" name="OptFormat2" id="OptFormat2" value=""> Format 2
                        </label>
                    </div> --}}

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

                    <a name="FinalPrint" id="FinalPrint" class="btn btn-info col-sm-2" role="button"><i
                            class="fa fa-print mr-2" aria-hidden="true"></i>Final Print</a>

                </div>

                <div class="row py-2">

                    <div class="inputbox col-sm-2">
                        <input class="" type="number" name="" placeholder="">
                        <span class="" id="">PO Cost + Pull Stock</span>
                    </div>

                    <div class="inputbox col-sm-2">
                        <input class="" type="number" name="" placeholder="">
                        <span class="" id="">Pull Stock</span>
                    </div>

                    <div class="inputbox col-sm-2">
                        <input class="" type="number" name="" placeholder="">
                        <span class="" id="">VAT Amt</span>
                    </div>

                    <div class="inputbox col-sm-2">
                        <input class="" type="number" name="" placeholder="">
                        <span class="" id="">Dlvry Charges</span>
                    </div>

                    <div class="inputbox col-sm-3">
                        <input class="" type="text" id="Description" name="Description"
                            value="{{ $DataMaster->Des }}" placeholder="">
                        <span class="" id="">Description</span>
                    </div>

                    <a name="Invoicebtn" id="Invoicebtn" class="btn btn-primary col-sm-1" role="button"><i
                            class="fa fa-file-invoice mr-2"></i> Invoice</a>

                </div>


                <div class="row py-2">

                    <div class="inputbox col-sm-2">
                        <input class="" readonly id="TxtTotalQty" type="number" name="" placeholder="">
                        <span class="Txtspan" id="">Total</span>
                    </div>

                    <div class="inputbox col-sm-1">
                        <input class="" readonly id="TxtTotalRecQty" type="number" name=""
                            placeholder="">
                    </div>

                    <div class="inputbox col-sm-1">
                        <input class="" readonly id="TxtTotalNotRecQty" type="number" name=""
                            placeholder="">
                    </div>

                    <div class="inputbox col-sm-1">
                        <input class="" readonly id="TxtDeliveredQty" type="number" name=""
                            placeholder="">
                        <input class="" id="TxtTotRtnQty" type="hidden" name="TxtTotRtnQty" placeholder="">
                        <input class="" id="TxtTotMissingQty" type="hidden" name="TxtTotMissingQty"
                            placeholder="">
                        <input class="" id="TxtTotSoldQty" type="hidden" name="TxtTotSoldQty" placeholder="">
                        <input class="" id="TxtTotalGPAmt" type="hidden" name="TxtTotalGPAmt" placeholder="">
                        <input class="" id="TxtTotCostAmt" type="hidden" name="TxtTotCostAmt" placeholder="">
                        <input class="" id="TxtReturn" type="hidden" name="TxtReturn" placeholder="">
                    </div>


                    <div class="CheckBox1 col-sm-1">
                        <label class="input-group text-info mt-2">
                            <input type="checkbox" class="" name="ChkKG" id="ChkKG" value="" checked>
                            KG
                        </label>
                        <input type="hidden" class="" name="TxtDays" id="TxtDays" value="">
                    </div>


                    <div class="inputbox col-sm-2">
                        <input class="" type="text" name="" placeholder="">
                        <span class="" id="">Rec Amt</span>
                    </div>

                    <div class="inputbox col-sm-2">
                        <input class="" type="text" name="" placeholder="">
                        <span class="" id="">Paid Amt</span>
                    </div>

                    <div class="inputbox col-sm-1">
                    </div>

                    <a name="SaveInvoice" id="SaveInvoice" class="btn btn-success col-sm-1" role="button"><i
                            class="fa fa-cloud mr-2" aria-hidden="true"></i> SAVE</a>

                </div>


                <div class="row py-2">
                    <div class="col-sm-6">

                        <div class="inputbox">
                            <textarea class="" type="text" name="" placeholder="" id="" rows="13">{{ $bankdetails }}</textarea>
                            <span class="" id="">Bank Details</span>
                        </div>

                    </div>

                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-4">

                                <div class="row pb-2">
                                    <div class="inputbox col-sm-12">
                                        <input class="" type="text" name="" placeholder="">
                                        <span class="" id="">Gross</span>
                                    </div>
                                </div>

                                <div class="row py-2">
                                    <div class="inputbox col-sm-12">
                                        <input class="" type="text" name="TxtDeliveryCharges"
                                            id="TxtDeliveryCharges" placeholder="">
                                        <span class="" id="">Delivery Charges</span>
                                    </div>
                                </div>

                                <div class="row py-2">
                                    <div class="inputbox col-sm-12">
                                        <input class="" type="text" name="TxtNetAmount" id="TxtNetAmount"
                                            placeholder="">
                                        <span class="" id="">Net Amount </span>
                                    </div>
                                </div>

                                <div class="row py-2">
                                    <div class="inputbox col-sm-12">
                                        <input class="" type="text" name="" placeholder="">
                                        <span class="" id="">Total Gp Amt</span>
                                    </div>
                                </div>

                                <div class="row py-2">
                                    <div class="inputbox col-sm-12">
                                        <input class="" type="text" name="TxtGPPer" id="TxtGPPer"
                                            placeholder="">
                                        <span class="" id="">GP %</span>
                                    </div>
                                </div>

                                <div class="row py-2">
                                    <div class="inputbox col-sm-12">
                                        <input class="" type="text" name="TxtReceivedAmount"
                                            id="TxtReceivedAmount" placeholder="">
                                        <span class="" id="">Rcvd Amt</span>
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-6">

                                <div class="row py-2">

                                    <div class="inputbox col-sm-6">
                                        <input class="" type="text" name="TxtInvDiscPer" id="TxtInvDiscPer"
                                            placeholder="">
                                        <span class="" id="">INV Disc</span>
                                    </div>

                                    <div class="inputbox col-sm-6">
                                        <input class="" type="text" name="TxtDiscAmt" id="TxtDiscAmt"
                                            placeholder="">
                                        <span class="" id="">%</span>
                                    </div>

                                </div>

                                <div class="row py-1 mt-3">
                                    <span id="LblCreditPer" class="col-sm-4 text-blue">0</span><label
                                        class="col-sm-4">%&nbsp;&nbsp;&nbsp;CR Note:</label><span id="LblCreditNote"
                                        class="col-sm-4 text-blue text-right">0</span>
                                </div>
                                <div class="row py-1">
                                    <span id="LblRebaitPer" class="col-sm-4 text-blue">0</span><label
                                        class="col-sm-4">%&nbsp;&nbsp;&nbsp;AVI Rebate :</label><span id="LblRebaitAmt"
                                        class="col-sm-4 text-blue text-right">0</span>
                                </div>
                                <div class="row py-1">
                                    <span id="LblAgentCommPer" class="col-sm-4 text-blue">0</span><label
                                        class="col-sm-4">%&nbsp;&nbsp;&nbsp;Agent Comm :</label><span id="LblAgentComm"
                                        class="col-sm-4 text-blue text-right">0</span>
                                </div>
                                <div class="row py-1">
                                    <span id="LblSalesManCommPer" class="col-sm-4 text-blue">0</span><label
                                        class="col-sm-4">%&nbsp;&nbsp;&nbsp;Sls Comm :</label><span id="LblSalesManComm"
                                        class="col-sm-4 text-blue text-right">0</span>
                                </div>
                                <div class="row py-1">
                                    <span class="col-sm-4"></span><label class="col-sm-4 text-blue">NET SALE
                                        :</label><span class="col-sm-4 text-right text-blue">0</span>
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


    {{-- {{$dt5}} --}}
@stop
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/ajaxsuccess.css">

    <style>
        .col-lg-12 span {
            font-size: 11px;

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


    <?php
    $dt5 = DB::table('OrderMaster')
        ->select('Terms')
        ->where('PONO', '=', $PONO)
        ->where('BranchCode', '=', $BranchCode)
        ->first();
    $terms = $dt5->Terms;
    $DMMaster = DB::table('DMMaster')
        ->select('RtnQty')
        ->where('VSNNo', '=', $DeliveryOrderMaster->VSNNo)
        ->where('ChargeNo', '=', $DeliveryOrderMaster->InvoiceNo)
        ->where('BranchCode', '=', $BranchCode)
        ->first();
    if ($DMMaster) {
        $MDTRTNQty = $DMMaster->RtnQty;
    } else {
        $MDTRTNQty = '';
    }
    $FixAccountSetup = DB::table('FixAccountSetup')
        ->where('BranchCode', '=', $BranchCode)
        ->first();
    
    if ($FixAccountSetup == !null) {
        // dd('data');
        $MSalesCode = $FixAccountSetup->ActSalesCode;
        $MUnEarnCommCode = $FixAccountSetup->UnEarnCommCode;
        $MCashCode = $FixAccountSetup->ActCashCode;
        $MMissingActCode = $FixAccountSetup->MissingActCode;
        $MPurchaseActCode = $FixAccountSetup->ActPurchaseCode;
        $MPurStockCode = $FixAccountSetup->PurStockCode;
        $MCOGSCode = $FixAccountSetup->COGSCode;
        //   $MCRNoteCode = $FixAccountSetup->CRNoteCode;
        $MCommExpCode = $FixAccountSetup->CommExpCode;
        $MActPurRetCode = $FixAccountSetup->ActPurRetCode;
        $MAVIRebaitExpCode = $FixAccountSetup->AVIExpCode;
        $MAVIRebaitPayableCode = $FixAccountSetup->AVIPayableCode;
        $TxtBackLogDate = $FixAccountSetup->BackLogDate;
        $MPORecDirectSupplyCode = $FixAccountSetup->PORecDirectSupplyCode;
        $MDateDirectSupply = $FixAccountSetup->DateDirectSupply;
    } else {
        // dd('null');
    
        $MDateDirectSupply = Date('d-M-Y');
        $MSalesCode = '';
        $MCashCode = '';
        $MUnEarnCommCode = '';
        $MMissingActCode = '';
        $MPurchaseActCode = '';
        $MCRNoteCode = '';
        $MCommExpCode = '';
        $MCOGSCode = '';
        $MActPurRetCode = '';
        $MAVIRebaitExpCode = '';
        $MAVIRebaitPayableCode = '';
        $MPORecDirectSupplyCode = '';
    }
    
    $maxInvoiceNo = DB::table('DeliveryOrderMaster')
        ->where('BranchCode', '8')
        ->max('InvoiceNo');
    //   dd($maxInvoiceNo);
    ?>
    <script>
        let $terms = '{{ $terms }}';
        let MDTRTNQty = '{{ $MDTRTNQty }}';
        let ReturnQty = '{{ $DeliveryOrderMaster->ReturnQty }}';
        let MSalesCode = '{{ $MSalesCode }}';
        let MUnEarnCommCode = '{{ $MUnEarnCommCode }}';
        let MCashCode = '{{ $MCashCode }}';
        let MMissingActCode = '{{ $MMissingActCode }}';
        let MPurchaseActCode = '{{ $MPurchaseActCode }}';
        let MPurStockCode = '{{ $MPurStockCode }}';
        let MCOGSCode = '{{ $MCOGSCode }}';
        let MCommExpCode = '{{ $MCommExpCode }}';
        let MActPurRetCode = '{{ $MActPurRetCode }}';
        let MAVIRebaitExpCode = '{{ $MAVIRebaitExpCode }}';
        let MAVIRebaitPayableCode = '{{ $MAVIRebaitPayableCode }}';
        let TxtBackLogDate = '{{ $TxtBackLogDate }}';
        let MPORecDirectSupplyCode = '{{ $MPORecDirectSupplyCode }}';
        let MDateDirectSupply = '{{ $MDateDirectSupply }}';
        let maxInvoiceNo = '{{ $maxInvoiceNo }}';

        if (MDTRTNQty == '') {
            MDTRTNQty = 0;
        }
        if (ReturnQty == '') {
            ReturnQty = 0;
        }
    </script>
    <?php
    
    ?>

    <script>
        $(document).ready(function() {
            $("#loading").hide();
            //     let txtReturnQty =1;
            // console.log(MDTRTNQty);
            // console.log('get'+txtReturnQty);
            //       if(MDTRTNQty !== txtReturnQty) {
            //         alert('notmatched');
            //     }else{
            //           alert('matched');
            $('#cupon-pop-pono').val('{{ $DeliveryOrderMaster->InvoiceNo }}');

            //       }
            // console.log(MDTRTNQty);
            document.getElementById("deliverydate").valueAsDate = new Date();
            document.getElementById("TxtRtnDate").valueAsDate = new Date();
            var inputtime = document.getElementById("TxtRtnTime");
            var now = new Date();
            inputtime.value = now.toLocaleTimeString("en-US", {
                hour12: false
            });
            let table = document.getElementById('Invoicetablebody');
            let rows = table.rows;
            let TxtTotalQty = 0;
            let TxtTotalRecQty = 0;
            let TxtTotalNotRecQty = 0;
            let TxtDeliveredQty = 0;
            let TxtTotRtnQty = 0;
            let TxtTotMissingQty = 0;
            let TxtTotSoldQty = 0;
            let TxtTotalGPAmt = 0;
            let TxtTotCostAmt = 0;
            let MDiscPer = 0;
            let MCostPrice = 0;
            let TxtReturn = 0;

            for (let i = 0; i < rows.length; i++) {
                let cells = rows[i].cells;
                var Sno = cells[0].innerHTML;
                Itemcode = cells[1].innerHTML;
                ItemName = cells[2].innerHTML;
                Puom = cells[3].innerHTML;
                Orderqty = cells[4].innerHTML;
                Recvdqty = cells[5].innerHTML;
                NotRecvdqty = cells[6].innerHTML;
                Deliveryqty = cells[7].innerHTML;
                rtnqyty = cells[8].innerHTML;
                missingqty = cells[9].innerHTML;
                soldqty = cells[10].innerHTML;
                price = cells[11].innerHTML;
                amount = cells[12].innerHTML;
                Pomade = cells[13].innerHTML;
                Cost = cells[14].innerHTML;
                VendorPrice = cells[17].innerHTML;
                GPamount = cells[21].innerHTML;
                DiscPerVendor = cells[26].innerHTML;

                MDiscPer = DiscPerVendor;
                MCostPrice = VendorPrice - (VendorPrice * (MDiscPer) / 100);

                // console.log(GPRate);
                TxtReturn += Number(rtnqyty * MCostPrice);
                TxtTotalQty += Number(Orderqty);
                TxtTotalRecQty += Number(Recvdqty);
                TxtTotalNotRecQty += Number(NotRecvdqty);
                TxtDeliveredQty += Number(Deliveryqty)
                TxtTotRtnQty += Number(rtnqyty);
                TxtTotMissingQty += Number(missingqty);
                TxtTotSoldQty += Number(soldqty);
                TxtTotalGPAmt += Number(GPamount);
                TxtTotCostAmt += Number(Cost);
            }


            document.getElementById("TxtTotalQty").value = TxtTotalQty;
            document.getElementById("TxtTotalRecQty").value = TxtTotalRecQty;
            document.getElementById("TxtTotalNotRecQty").value = TxtTotalNotRecQty;
            document.getElementById("TxtDeliveredQty").value = TxtDeliveredQty;
            document.getElementById("TxtTotRtnQty").value = TxtTotRtnQty;
            document.getElementById("TxtTotMissingQty").value = TxtTotMissingQty;
            document.getElementById("TxtTotSoldQty").value = TxtTotSoldQty;
            document.getElementById("TxtTotalGPAmt").value = TxtTotalGPAmt;
            document.getElementById("TxtTotCostAmt").value = TxtTotCostAmt;
            document.getElementById("TxtReturn").value = TxtReturn;

            $('#Invoicetable').DataTable({
                scrollY: 350,
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
    </script>
    <script>
        function tablecomposer() {
            let table = document.getElementById('Invoicetablebody');
            let rows = table.rows;
            datatablearray = [];
            for (let i = 0; i < rows.length; i++) {
                let cells = rows[i].cells;
                datatablearray.push({

                    Sno: cells[0] ? cells[0].innerHTML : '',
                    Itemcode: cells[1] ? cells[1].innerHTML : '',
                    ItemName: cells[2] ? cells[2].innerHTML : '',
                    Puom: cells[3] ? cells[3].innerHTML : '',
                    Orderqty: cells[4] ? cells[4].innerHTML : '',
                    Recvdqty: cells[5] ? cells[5].innerHTML : '',
                    NotRecvdqty: cells[6] ? cells[6].innerHTML : '',
                    Deliveryqty: cells[7] ? cells[7].innerHTML : '',
                    rtnqyty: cells[8] ? cells[8].innerHTML : '',
                    missingqty: cells[9] ? cells[9].innerHTML : '',
                    soldqty: cells[10] ? cells[10].innerHTML : '',
                    price: cells[11] ? cells[11].innerHTML : '',
                    amount: cells[12] ? cells[12].innerHTML : '',
                    Pomade: cells[13] ? cells[13].innerHTML : '',
                    Cost: cells[14] ? cells[14].innerHTML : '',
                    ID: cells[15] ? cells[15].innerHTML : '',
                    QuoteID: cells[16] ? cells[16].innerHTML : '',
                    VendorPrice: cells[17] ? cells[17].innerHTML : '',
                    VendorCode: cells[18] ? cells[18].innerHTML : '',
                    VendorActCode: cells[19] ? cells[19].innerHTML : '',
                    GPRate: cells[20] ? cells[20].innerHTML : '',
                    GPAmount: cells[21] ? cells[21].innerHTML : '',
                    VendorName: cells[22] ? cells[22].innerHTML : '',
                    DiscIncomePer: cells[23] ? cells[23].innerHTML : '',
                    DiscIncomeAmt: cells[24] ? cells[24].innerHTML : '',
                    CostPrice: cells[25] ? cells[25].innerHTML : '',
                    DiscPerVendor: cells[26] ? cells[26].innerHTML : '',
                    ReturnCostAmt: cells[27] ? cells[27].innerHTML : '',
                    IMPA: cells[28] ? cells[28].innerHTML : '',
                    StockCode: cells[29] ? cells[29].innerHTML : '',
                    MoveToStockQty: cells[30] ? cells[30].innerHTML : '',
                    LBSQTY: cells[31] ? cells[31].innerHTML : '',
                    LBSRate: cells[32] ? cells[32].innerHTML : '',
                    LBSAmount: cells[33] ? cells[33].innerHTML : '',


                });

            }

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

            vsno = '{{ $DataMaster->VSNNo }}';
            Pono = '{{ $PONO }}';
            DepartmentName = '{{ $Datadetailsfirst->DepartmentName }}';
            //   console.log(status);
            if (Description === "") {


                if (status === "DELIVERED") {
                    document.getElementById('Description').value = "Delivered to " + ' {{ $DataMaster->VesselName }} ' +
                        ", " + DepartmentName;

                } else {
                    document.getElementById('Description').value = "Transit to New Orlance " +
                        ' {{ $DataMaster->VesselName }} ' + ", " + DepartmentName;
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
            let CmbTerms = document.getElementById('CmbTerms').value;
            let terms = '{{ $DataMaster->Terms }}';
            let status = document.getElementById("status").value;
            let Warehouse = document.getElementById('Warehouse').value;
            let CustomerActCode = '{{ $DeliveryOrderMaster->CustomerActCode }}';
            //         if (CmbTerms.trim().length === 0) {
            // alert('0');
            // }else{
            //             alert('loong');

            //         }



            if ($('#ChkHold').prop("checked") == true) {
                alert('This Vessel Is On Hold , You Cannot Create the Invoice');
                // alert();
                return;
            }
            if (terms != CmbTerms) {
                var password = prompt("You Changed Terms Please enter Admin Authentication:");
                if (password === "332211") {
                    if (confirm("Are you sure you want to proceed?")) {
                        // proceed with action
                        alert("Changed Terms.");
                        document.getElementById("CmbTerms").value = terms;
                    } else {
                        alert("Access denied.");
                    }
                } else {
                    alert("Incorrect password.");
                }


            }

            if (Warehouse == "") {
                // alert("Empty");
                alert("Please select Warehouse First Warehouse Not Found")
                document.getElementById('Warehouse').focus();
                return;

            }
            if (CustomerActCode == null || CustomerActCode == '') {
                alert("Please Select the Account A/c Code Not Found")
                return;

            }
            if (CmbTerms.trim().length === 0) {
                alert("Please Select Terms First");
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
                    }

                    // alert('step2');
                    DMMasterschecker();



                    CmbTerms_LostFocus(TxtDays)

                    // let TxtInvoiceNo = '';
                    // let TxtInvoiceNo = '{{ $DeliveryOrderMaster->InvoiceNo }}';
                    let TxtInvoiceNo = $('.InvoiceNo').html();
                    // alert("no :"+TxtInvoiceNo);
                    if (parseInt(TxtInvoiceNo) === 0 || TxtInvoiceNo === '') {
                        MaxNo();
                    }

                    Invoicesavefunction(TxtInvoiceNo);




                }
            });







        }

        function Invoicesavefunction(TxtInvoiceNo) {
            let TxtRtnDate = $('#TxtRtnDate').val();
            let TxtRtnTime = $('#TxtRtnTime').val();
            let TxtRefNo = '{{ $DataMaster->CustomerRefNo }}';
            let TxtDispatchDate = $('#DispatchDate').val();
            let TxtVSNNo = '{{ $DeliveryOrderMaster->VSNNo }}';
            let TxtChargeNO = TxtInvoiceNo;
            let TxtEventNo = '{{ $DataMaster->EventNo }}';
            let Department = '{{ $DataMaster->Department }}';
            let DepartmentCode = '{{ $DataMaster->DepartmentCode }}';
            let DepartmentName = '{{ $DataMaster->DepartmentName }}';
            let TxtQuoteNO = '{{ $DataMaster->QuoteNo }}';
            let TxtActCode = '{{ $DataMaster->CustomerCode }}';
            let TxtActName = '{{ $DataMaster->CustomerName }}';
            let TxtActCodeNew = '{{ $DeliveryOrderMaster->CustomerActCode }}';
            let TxtDescription = $('#Description').val();
            let LblVesselName = '{{ $DataMaster->VesselName }}';
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
            let TxtCrNoteAmt = '{{ $DataMaster->CrNoteAmt }}';
            let ChkSevenSeasDelivery = 0;
            if ($('#ChkSevenSeasDelivery').prop("checked") == true) {
                ChkSevenSeasDelivery = 1
            } else {
                ChkSevenSeasDelivery = 0
            }

            let LblCreditPer = $('#LblCreditPer').html();
            let LblRebaitPer = $('#LblRebaitPer').html();
            let LblAgentCommPer = $('#LblAgentCommPer').html();
            let LblSalesManCommPer = $('#LblSalesManCommPer').html();
            let LblCreditNote = $('#LblCreditNote').html();
            let LblRebaitAmt = $('#LblRebaitAmt').html();
            let LblAgentComm = $('#LblAgentComm').html();
            let LblSalesManComm = $('#LblSalesManComm').html();
            tablecomposer();
            let Tabledata = datatablearray;

            // console.log(datatablearray);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'post',
                url: '{{ URL::to('InvoiceSave') }}',
                data: {
                    TxtInvoiceNo,
                    Department,
                    DepartmentCode,
                    DepartmentName,
                    TxtRtnDate,
                    TxtRtnTime,
                    TxtRefNo,
                    TxtDispatchDate,
                    TxtVSNNo,
                    TxtChargeNO,
                    TxtEventNo,
                    TxtQuoteNO,
                    TxtActCode,
                    TxtActName,
                    TxtActCodeNew,
                    TxtDescription,
                    LblVesselName,
                    TxtTotalQty,
                    TxtTotalRecQty,
                    TxtTotalNotRecQty,
                    TxtDeliveredQty,
                    TxtTotRtnQty,
                    TxtTotMissingQty,
                    TxtTotSoldQty,
                    TxtTotalGPAmt,
                    CmbTerms,
                    TxtNetAmount,
                    TxtDiscAmt,
                    TxtInvDiscPer,
                    TxtOrderDate,
                    TxtDueDate,
                    TxtGodownCode,
                    CmbGodownName,
                    TxtDeliveryCharges,
                    TxtGPPer,
                    TxtTotCostAmt,
                    TxtCrNoteAmt,
                    ChkSevenSeasDelivery,
                    LblCreditPer,
                    LblRebaitPer,
                    LblAgentCommPer,
                    LblSalesManCommPer,
                    LblCreditNote,
                    LblRebaitAmt,
                    LblAgentComm,
                    LblSalesManComm,
                    Tabledata,
                    TxtBackLogDate,
                    TxtReturn,
                    MSalesCode,




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

        function MaxNo() {
            let maxInvoiceNoplus = parseInt(maxInvoiceNo) + 1;
            // let original = document.getElementByClassName('InvoiceNo').innerHTML;
            //     let original = $('.InvoiceNo').html();
            // alert(original);
            // alert(maxInvoiceNoplus);
            $('.InvoiceNo').html(maxInvoiceNoplus);

        }
    </script>

    <script>
        function DMMasterschecker() {
            // if (MDTRTNQty == !null) {
            //     let MDTRTNQty = MDTRTNQty;

            //   }
            let txtReturnQty = $('#TxtTotRtnQty').val();
            //     console.log(MDTRTNQty);
            // console.log(txtReturnQty);
            if (MDTRTNQty == txtReturnQty) {

            } else {
                alert(
                    "Return Quantity is Not Matched with DM Return Quantity, Please Correct your DM First or Remove All DM First Please Re-Check DM Again"
                );

                return;
            }
            if (MSalesCode.trim().length == 0) {
                alert("Sales Account Not Found Plz Use Fix Account Setup");
                return;

            }
            // alert("step-DMMasterschecker");


        }

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
            window.open("/FinalInvoicePrint/" + {{ $PONO }}, "_blank");

            // let MInvNo = '{{ $PONO }}';
            // let MVsn = '{{ $DataMaster->VSNNo }}';
            // let MRep = "DeliveryOrder";
            // let  MRepFormat = "";
            // if($('#OptFormat1').prop("checked") == true){
            //      MRepFormat = "Format1";
            // }
            // else{
            //       MRepFormat = "Format2";
            // }
            // let  MPass = false;
            // if($('#ChkKG').prop("checked") == true){
            //       MPass = true;
            // }
            // else{
            //       MPass = false;
            // }
            // let CHeading = "0";
            // if($('#ChkCompanyHeading').prop("checked") == true){
            //      CHeading = "1";
            // }
            // else{
            //      CHeading = "0";
            // }
            // let  MChkSevenSeasNorwayAS = "0";
            // if($('#ChkSevenSeasNorwayAS').prop("checked") == true){
            //       MChkSevenSeasNorwayAS = "1";
            // }
            // else{
            //      MChkSevenSeasNorwayAS = "0";
            // }

            // let MChkSevenDelivery = 0;
            // if($('#ChkSevenSeasDelivery').prop("checked") == true){
            //     MChkSevenDelivery = 1
            // }
            // else{
            //     MChkSevenDelivery = 0
            // }

            //         $.ajaxSetup({
            // headers: {
            // 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            // }
            // });
            //         $.ajax({
            // type : 'post',
            // url : '{{ URL::to('FinalInvoicePrint') }}',
            // data:{
            //     // MChkSevenDelivery,
            //     // MChkSevenSeasNorwayAS,
            //     // CHeading,
            //     // MPass,
            //     // MRepFormat,
            //     // MRep,
            //     // MInvNo,
            //     // MVsn,

            // },
            // success:function($response){

            //         alert($response.Message);
            //         // window.open("/FinalInvoicePrint/" + $response.link, "_blank");




            // }
            // });



        });

        function check() {
            let ChkSevenSeasDelivery = document.getElementById("ChkSevenSeasDelivery");
            let ChkHold = document.getElementById("ChkHold");



            // if ($('#ChkSevenSeasDelivery').prop("checked") == true) {
            // if ($('#ChkHold').prop("checked") == true) {
            //     // alert('check');
            //     ChkSevenSeasNorwayAS.checked = false;
            //     ChkSevenSeasNorwayAS.value=0;
            //     ChkSevenSeasDelivery.value=1;
            // }







        }
    </script>

    <script>
        $(document).ajaxStart(function() {
            $("#loading").show();
        });

        // Hide the loading indicator when the request is completed or failed
        $(document).ajaxStop(function() {
            $("#loading").hide();
        });
    </script>
@stop


@section('content')
