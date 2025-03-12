@extends('layouts.app')



@section('title', 'Delivery Order')

@section('content_header')

@stop

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
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
    </div>

    <div class="col-lg-12 pt-2">

        <div class="card ">

            <div class="card-header" style="background-color:#ffffff; ">
                <div class="card-tools ">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
                <h3 class="text-center">Delivery Order</h3>

            </div>
            <div class="card-header" style="background-color:#f5f5f5; ">
                <div class="row">

                    <div class=" ml-2 ">
                        <strong>Charge #:</strong>&nbsp; <label class="VSN text-blue">{{ $PONO }}</label>
                    </div>
                    <div class=" ml-5 ">
                        /&nbsp;<strong>VSN #:</strong>&nbsp; <label class="VSN text-blue">{{ $DataMaster->VSNNo }}</label>
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

                    </div>
                </div>
            </div>


            <div class="card-body">
                <div class="row py-2">

                    <div class="inputbox col-sm-3">

                        <input id='orderdate' type="date" class=" "
                            value="{{ $DataMaster->OrderDate ? date('Y-m-d', strtotime($DataMaster->OrderDate)) : date('Y-m-d') }}">
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

                        <input id='deliveryTime' type="time" class="" value="{{ $DataMaster->DispatchTime }}">
                        <span class="Txtspan" id="">Delivery Time</span>

                    </div>

                </div>

                <div class="row py-2">

                    <div class="inputbox col-sm-2">
                        <span class="Txtspan" id="">Status</span>

                        <select class="" name="status" id="status">
                            <option selected value="{{ $DataMaster->Status }}">{{ $DataMaster->Status }}</option>
                            <option value="TRANSIT NOLA">TRANSIT NOLA</option>
                            <option value="DELIVERED">DELIVERED</option>
                        </select>
                    </div>

                    <div class="inputbox col-sm-2">

                        <input type="text" class="" id="TxtAtten" value="{{ $DataMaster->Atten }}"
                            name="TxtAtten">
                        <input type="hidden" class="form-control" id="TxtBillingCompany"
                            value="{{ $DataMaster->BContactPerson }}" name="TxtBillingCompany">
                        <input type="hidden" class="form-control" id="TxtBillingAddress"
                            value="{{ $DataMaster->BillingAddress }}" name="TxtBillingAddress">
                        <span class="" id="">Atten</span>
                    </div>

                    <div class="inputbox col-sm-2">

                        <input type="text" class="" id="Terms" value="{{ $DataMaster->Terms }}"
                            name="Terms">
                        <span class="" id="">Terms</span>

                    </div>

                    <div class="inputbox col-sm-2">

                        <input type="text" class="" id="DeliveryOrderNo"
                            value="{{ $DataMaster->DeliveryOrderNo }}" name="DeliveryOrderNo">
                        <span class="" id="">DeliveryOrderNo</span>

                    </div>

                </div>

            </div>
        </div>

        <div class="card">
            <div class="card-body">

                <table class="table  table-inverse" id="Deliverytable" style="width: 100%">
                    <thead class="bg-info">
                        <tr>
                            <th>Item&nbsp;Code</th>
                            <th>Item&nbsp;Name</th>
                            <th>UOM</th>
                            <th>Order&nbsp;Qty</th>
                            <th>Recvd&nbsp;Qty</th>
                            <th>Not&nbsp;Recvd&nbsp;Qty</th>
                            <th>Delivery&nbsp;Qty</th>
                            <th class="text-right">Rate</th>
                            <th class="text-right">Amount</th>
                            <th hidden>PurchaseOrderID</th>
                            <th hidden>QuoteID</th>
                            <th hidden>VendorCode</th>
                            <th hidden>VendorActCode</th>
                            <th hidden>GPPer</th>
                            <th hidden>GPAmt</th>
                            <th hidden>CostPrice</th>
                            <th hidden>VendorPrice</th>
                            <th hidden>DiscPer</th>
                            <th hidden>DiscAmt</th>
                            <th hidden>CostPriceNew</th>
                            <th>PO#</th>
                            <th>NoDiscount</th>
                        </tr>
                    </thead>
                    <tbody id="Deliverytablebody">
                        @foreach ($Datadetails as $item)


                            <?php
                            $MID = $item->ID;
                            $data = DB::table('purchaseorderdetail')
                                ->select(DB::raw('SUM(RecQty) as MRecQty, SUM(MoveToStock) as MMoveToStock, SUM(ReturnQty) as MReturnQty'))
                                ->where('OrderID', $MID)
                                ->where('ChargeNo', $DataMaster->PONo)
                                ->where('VSNNo', $DataMaster->VSNNo)
                                ->where('BranchCode', $BranchCode)
                                ->first();
                            ?>
                            <tr>
                                <td>{{ $item->ItemCode }}</td>
                                <td>{{ $item->ItemName }}</td>
                                <td>{{ $item->PUOM }}</td>
                                <td class="text-center">{{ $item->OrderQty }}</td>
                                <td class="text-center" id="recvdtd{{ $item->SNo }}"><?php if ($data->MRecQty > 0) {
                                    echo $data->MRecQty;
                                } else {
                                    $value = is_null($item->PullQty) ? 0 : $item->PullQty;
                                    echo $value;
                                } ?></td>


                                <td class="text-center" id="notrecv{{ $item->SNo }}"></td>
                                <td class="text-center">{{ $item->DeliveredQty }}</td>
                                <td class="text-right">{{ round($item->Price, 2) }}</td>
                                <td class="text-right">{{ round($item->DeliveredAmount, 2) }}</td>
                                <td hidden>{{ $item->ID }}</td>
                                <td hidden>{{ $item->QID }}</td>
                                <td hidden>{{ $item->VendorCode }}</td>
                                <td hidden>{{ $item->VendorActCode }}</td>
                                <td hidden>{{ $item->GPRate }}</td>
                                <td hidden>{{ $item->GPAmount ? round($item->GPAmount, 2) : 0}}</td>
                                <td hidden>{{ $item->CostPrice ? round($item->CostPrice, 2) : 0 }}</td>
                                <td hidden>{{ $item->VendorPrice ? round($item->VendorPrice, 2) : 0 }}</td>
                                <td hidden>{{ $item->DiscIncomePer }}</td>
                                <td hidden>{{ $item->DiscIncomeAmt }}</td>
                                <td hidden>{{ $item->CostPrice }}</td>
                                <td>{{ $item->POMadeNo }}</td>
                                <td class="text-right"><input type="checkbox" name="CHKNodis" id="CHKNodis"></td>


                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card">
            <div class="card-body">

                <div class="row py-2">

                    <div class="CheckBox1">
                        <label class="input-group text-info mx-3 mt-2">
                            <input class="" type="checkbox" onclick="check()" name="OptFormat1" id="OptFormat1"
                                value=""> Format 1
                        </label>
                    </div>

                    <div class="CheckBox1">
                        <label class="input-group text-info mx-3 mt-2">
                            <input class="" type="checkbox" onclick="check()" name="OptFormat2" id="OptFormat2"
                                value=""> Format 2
                        </label>
                    </div>

                    <div class="CheckBox1">
                        <label class="input-group text-info mx-3 mt-2">
                            <input class="" type="checkbox" onclick="check()" name="ChkSevenSeasNorwayAS"
                                id="ChkSevenSeasNorwayAS" value=""> Seven Seas Norway AS
                        </label>
                    </div>

                    <div class="CheckBox1">
                        <label class="input-group text-info mx-3 mt-2">
                            <input class="" type="checkbox" onclick="check()" name="ChkSevenSeasDelivery"
                                id="ChkSevenSeasDelivery" value="{{ $DataMaster->ChkSevenSeasDelivery }}"> Seven Seas
                            Delivery
                        </label>
                    </div>

                    <div class="CheckBox1">
                        <label class="finput-group text-info mx-3 mt-2">
                            <input class="" type="checkbox" checked name="ChkApplyPrice" id="ChkApplyPrice"
                                value=""> Apply on Price
                        </label>
                    </div>

                    <div class="CheckBox1">
                        <label class="input-group text-info mx-3 mt-2">
                            <input class="" type="checkbox" checked name="ChkCompanyHeading"
                                id="ChkCompanyHeading" value=""> Company Heading
                        </label>
                    </div>

                    <a name="DeliverPrint" id="DeliverPrint" class="btn btn-info col-sm-2" role="button"><i
                            class="fa fa-print" aria-hidden="true"></i> Delivery Print</a>

                </div>

                <div class="row py-2">

                    <div class="inputbox col-sm-2">
                        <input class="" type="number" name="TxtGPCostAmt" value="" id="TxtGPCostAmt"
                            placeholder="">
                        <span class="" id="">PO Cost + Pull Stock </span>
                    </div>

                    <div class="inputbox col-sm-2">
                        <input class="" type="number" name="" placeholder="">
                        <span class="" id="">Pull Stock </span>
                    </div>

                    <div class="inputbox col-sm-2">
                        <input class="" type="number" name="" placeholder="">
                        <input type="hidden" id="VATPER" name="VATPER" value="{{ $DataMaster->VATPER }}"
                            placeholder="">
                        <input type="hidden" id="VATAmt" name="VATAmt" placeholder="{{ $DataMaster->VATAmt }}">
                        <span class="" id="">VAT Amt </span>
                    </div>

                    <div class="inputbox col-sm-2">
                        <input class="" type="number" value="{{ $DataMaster->DeliveryCharges }}" name=""
                            placeholder="">
                        <span class="" id="">Dlvry Charges </span>
                    </div>

                    <div class="inputbox col-sm-3">
                        <input class="" type="text" id="Description" value="{{ $DataMaster->Des }}"
                            name="Description" placeholder="">
                        <span class="" id="">Description </span>
                    </div>

                    <a name="DeliverAll" id="DeliverAll" class="btn btn-primary col-sm-1" role="button">Deliver All</a>
                </div>


                <div class="row py-2">

                    <div class="inputbox col-sm-2">
                        <input class="" readonly id="TxtTotalQty" type="number" name="" placeholder="">
                        <span class="Txtspan" id="">Total </span>
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
                    </div>

                    <div class="col-sm-1">
                        <div class="CheckBox1 mt-2">
                            <label class="input-group text-info">
                                <input type="checkbox" class="" name="ChkKG" id="ChkKG" value=""
                                    checked>
                                KG
                            </label>
                        </div>
                    </div>

                    <div class="inputbox col-sm-2">
                        <input class="" type="text" value="{{ $DataMaster->ReceivedAmt }}" name="ReceivedAmt"
                            id="ReceivedAmt" placeholder="">
                        <span class="" id="">Rec Amt</span>
                    </div>

                    <div class="inputbox col-sm-2">
                        <input class="" type="text" value="{{ $DataMaster->PaidAmt }}" name="PaidAmt"
                            id="PaidAmt" placeholder="">
                        <input class="" id="VendorActCode" type="hidden"
                            value="{{ $DataMaster->VendorActCode }}" name="VendorActCode" placeholder="">
                        <span class=" " id="">Paid Amt</span>
                    </div>

                    <div class="inputbox col-sm-1">
                        <input class="" type="text" value="{{ $DataMaster->CostAmt }}" id="CostAmt"
                            name="CostAmt" placeholder="">
                        <span class="" id="">Cost</span>
                    </div>

                    <a name="SendDeliver" id="SendDeliver" class="btn btn-success col-sm-1" role="button"><i
                            class="fa fa-cloud mr-2" aria-hidden="true"></i> SAVE</a>

                </div>


                <div class="row py-2 pb-5">

                    <div class="col-sm-6">
                        <div class="inputbox">
                            <textarea class="" type="text" name="Bankinfo" placeholder="" id="Bankinfo" rows="13">{{ $bankdetails }}</textarea>
                            <span class="" id="">Bank Details</span>
                        </div>
                    </div>

                    <div class="col-sm-6">

                        <div class="row">

                            <div class="col-sm-4">

                                <div class="row pb-2">
                                    <div class="inputbox col-sm-12">
                                        <input class="" type="number" name="" placeholder="">
                                        <span class=" " id="">Gross</span>
                                    </div>
                                </div>

                                <div class="row py-2">
                                    <div class="inputbox col-sm-12">
                                        <input class="" type="number" value="{{ $DataMaster->DeliveryCharges }}"
                                            id="DeliveryCharges" name="DeliveryCharges" placeholder="">
                                        <span class=" " id="">Delivery Charges</span>
                                    </div>
                                </div>

                                <div class="row py-2">
                                    <div class="inputbox col-sm-12">
                                        <input class="" type="number" name="NetAmount" id="NetAmount"
                                            placeholder="">
                                        <span class=" " id="">Net Amount</span>
                                    </div>
                                </div>

                                <div class="row py-2">
                                    <div class="inputbox col-sm-12">
                                        <input class="" type="number" value="" name="TotGPAmt"
                                            id="TotGPAmt" placeholder="">
                                        <span class=" " id="">Total Gp Amt</span>
                                    </div>
                                </div>

                                <div class="row py-2 ">
                                    <div class="inputbox col-sm-12">
                                        <input class="" type="number" name="TxtGPPer" id="TxtGPPer"
                                            placeholder="">
                                        <span class=" " id="">GP %</span>
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-6">

                                <div class="row">

                                    <div class="inputbox col-sm-6">
                                        <input class="" type="number" value="{{ $DataMaster->InvDiscPer }}"
                                            name="InvDiscPer" id="InvDiscPer" placeholder="">
                                        <span class="" id="">INV Disc </span>
                                    </div>

                                    <div class="inputbox col-sm-6">
                                        <input class="" type="number" value="{{ $DataMaster->InvDiscAmt }}"
                                            name="InvDiscAmt" id="InvDiscAmt" placeholder="">
                                        <span class="" id="">%</span>
                                    </div>

                                </div>

                                <div class="row py-1 mt-3">
                                    <span class="col-sm-4 text-blue">0</span><label class="col-sm-4">%&nbsp;&nbsp;&nbsp;CR
                                        Note:</label><span class="col-sm-4 text-blue text-right">0</span>
                                </div>
                                <div class="row py-1">
                                    <span class="col-sm-4 text-blue">0</span><label
                                        class="col-sm-4">%&nbsp;&nbsp;&nbsp;AVI Rebate
                                        :</label><span class="col-sm-4 text-blue text-right">0</span>
                                </div>
                                <div class="row py-1">
                                    <span class="col-sm-4 text-blue">0</span><label
                                        class="col-sm-4">%&nbsp;&nbsp;&nbsp;Agent Comm
                                        :</label><span class="col-sm-4 text-blue text-right">0</span>
                                </div>
                                <div class="row py-1">
                                    <span class="col-sm-4 text-blue">0</span><label
                                        class="col-sm-4">%&nbsp;&nbsp;&nbsp;Sls Comm
                                        :</label><span class="col-sm-4 text-blue text-right">0</span>
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
    <div class="modal fade" id="ajax-success-modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label=""><span>×</span></button>
                </div>

                <div class="modal-body">

                    <div class="thank-you-pop">
                        <img src="<?php echo url('assets/images/Green-Round-Tick.png'); ?>" alt="">
                        <h1>Saved!</h1>
                        <p>Your submission is received </p>
                        <h3 class="cupon-pop">Charge #: <span>{{ $PONO }}</span></h3>

                    </div>

                </div>

            </div>
        </div>
    </div>
    {{-- </form> --}}
@stop
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
    <style>
        .thank-you-pop {
            width: 100%;
            padding: 20px;
            text-align: center;
        }

        .thank-you-pop img {
            width: 76px;
            height: auto;
            margin: 0 auto;
            display: block;
            margin-bottom: 25px;
        }

        .thank-you-pop h1 {
            font-size: 42px;
            margin-bottom: 25px;
            color: #5C5C5C;
        }

        .thank-you-pop p {
            font-size: 20px;
            margin-bottom: 27px;
            color: #5C5C5C;
        }

        .thank-you-pop h3.cupon-pop {
            font-size: 25px;
            margin-bottom: 40px;
            color: #222;
            display: inline-block;
            text-align: center;
            padding: 10px 20px;
            border: 2px dashed #222;
            clear: both;
            font-weight: normal;
        }

        .thank-you-pop h3.cupon-pop span {
            color: #03A9F4;
        }

        .thank-you-pop a {
            display: inline-block;
            margin: 0 auto;
            padding: 9px 20px;
            color: #fff;
            text-transform: uppercase;
            font-size: 14px;
            background-color: #8BC34A;
            border-radius: 17px;
        }

        .thank-you-pop a i {
            margin-right: 5px;
            color: #fff;
        }

        #ajax-success-modal .modal-header {
            border: 0px;
        }

        .span-w {
            width: 90px;

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
            $('#Deliverytable').DataTable({
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
            // check()
            let ChkSevenSeasDelivery = document.getElementById("ChkSevenSeasDelivery");
            if (ChkSevenSeasDelivery.value > 0) {
                // $("#ChkInactive").removeAttr("checked");
                ChkSevenSeasDelivery.checked = true;

            } else {
                // $("#ChkInactive").removeAttr("checked");
                ChkSevenSeasDelivery.checked = false;

            }
            document.getElementById("deliverydate").valueAsDate = new Date();
            var inputtime = document.getElementById("deliveryTime");
            var now = new Date();
            inputtime.value = now.toLocaleTimeString("en-US", {
                hour12: false
            });
            let table = document.getElementById('Deliverytablebody');
            let rows = table.rows;
            let TxtTotalQty = 0;
            let TxtTotalRecQty = 0;
            let TxtTotalNotRecQty = 0;
            let TxtDeliveredQty = 0;
            let TxtGPCostAmt = 0;
            for (let i = 0; i < rows.length; i++) {
                let cells = rows[i].cells;

                Itemcode = cells[0].innerHTML;
                ItemName = cells[1].innerHTML;
                Puom = cells[2].innerHTML;
                Orderqty = cells[3].innerHTML;
                Recvdqty = cells[4].innerHTML;
                NotRecvdqty = cells[5].innerHTML;
                Deliveryqty = cells[6].innerHTML;
                rate = cells[7].innerHTML;
                Amount = cells[8].innerHTML;
                PurchaseOrderID = cells[9].innerHTML;
                QuoteID = cells[10].innerHTML;
                VendorCode = cells[11].innerHTML;
                VendorActCode = cells[12].innerHTML;
                GPPer = cells[13].innerHTML;
                GPAmt = cells[14].innerHTML;
                CostPrice = cells[15].innerHTML;
                VendorPrice = cells[16].innerHTML;
                DiscPer = cells[17].innerHTML;
                DiscAmt = cells[18].innerHTML;
                CostPriceNew = cells[19].innerHTML;
                Po = cells[20].innerHTML;
                NoDiscount = cells[21].innerHTML;


                // console.log(GPRate);
                TxtTotalQty += Number(Orderqty);
                TxtTotalRecQty += Number(Recvdqty);
                TxtTotalNotRecQty += Number(NotRecvdqty);
                TxtDeliveredQty += Number(Deliveryqty)
                TxtGPCostAmt += Number(Orderqty * VendorPrice);
                console.log(VendorPrice);
            }


            document.getElementById("TxtTotalQty").value = TxtTotalQty;
            document.getElementById("TxtTotalRecQty").value = TxtTotalRecQty;
            document.getElementById("TxtTotalNotRecQty").value = TxtTotalNotRecQty;
            document.getElementById("TxtDeliveredQty").value = TxtDeliveredQty;
            document.getElementById("TxtGPCostAmt").value = Math.round(TxtGPCostAmt, 2);


        });
    </script>
    <script>

function Calcu() {
            let table = document.getElementById('Deliverytablebody');
            let rows = table.rows;
            let MAmt2 = 0;
            let MAmt = 0;
            let MSellAmt = 0;
            let MNoOfItems = 0;
            let MTotalRecQty = 0;
            let MTotalNotRecQty = 0;
            let MTotalPurQty = 0;
            let MQty = 0;
            let MGPAmt = 0;

            let MReturnQty = 0;

            let LblPOAmount = 0;
            let TxtTotOverQty = 0;

            let TxtTotalQty = 0;
            let TxtTotalRecQty = 0;
            let TxtTotalNotRecQty = 0;
            let TxtOverQty = 0;
            let TxtTotRtnQty = 0;
            let TxtTotMoveToStock = 0;
            let TxtTotCancelQty = 0;
            let TxtTotalGPAmt = 0;
            let TxtTotCostAmt = 0;
            let MEAPrice =  0;
            let MVendorPrice= 0;
            let MCostPrice = 0;
            let MGPPer =  0;
            let MDiscPer =  0;
            let MCostAmt =  0;

            for (let i = 0; i < rows.length; i++) {
                let cells = rows[i].cells;

                Itemcode = cells[0].innerHTML;
                ItemName = cells[1].innerHTML;
                Puom = cells[2].innerHTML;
                Orderqty = cells[3].innerHTML;
                Recvdqty = cells[4].innerHTML;
                NotRecvdqty = cells[5].innerHTML;
                Deliveryqty = cells[6].innerHTML;
                MEAPrice = cells[7].innerHTML;
                Amount = cells[8].innerHTML;
                PurchaseOrderID = cells[9].innerHTML;
                QuoteID = cells[10].innerHTML;
                VendorCode = cells[11].innerHTML;
                VendorActCode = cells[12].innerHTML;
                MGPPer = cells[13].innerHTML;
                GPAmt = cells[14].innerHTML;
                MCostPrice = cells[15].innerHTML;
                MVendorPrice = cells[16].innerHTML;
                MDiscPer = cells[17].innerHTML;
                DiscAmt = cells[18].innerHTML;
                CostPriceNew = cells[19].innerHTML;
                Po = cells[20].innerHTML;
                NoDiscount = cells[21].innerHTML;



                MNoOfItems += parseFloat(Orderqty ? Orderqty : 0);
                TxtTotalRecQty +=  parseFloat(Recvdqty ? Recvdqty : 0);
                MTotalNotRecQty += parseFloat(NotRecvdqty ? NotRecvdqty : 0);
                MTotalPurQty += parseFloat(Deliveryqty ? Deliveryqty : 0);

                MAmt += parseFloat(Amount ? Amount : 0);
                if(cells[21].innerHTML.checked == true){
                    console.log(checked);
                    MAmt2 += parseFloat(Amount ? Amount : 0);
                }

                if($('#ChkApplyPrice').prop('checked') == true){
                    MCostPrice = parseFloat(MEAPrice ? MEAPrice : 0) - (parseFloat(MEAPrice ? MEAPrice : 0) * parseFloat(MDiscPer ? MDiscPer : 0) / 100);
                    MGPRate = parseFloat(MCostPrice ? MCostPrice : 0) - parseFloat(MVendorPrice ? MVendorPrice : 0);
                    cells[15].innerHTML = parseFloat(MCostPrice ? MCostPrice : 0).toFixed(2);
                    MDeliveryQty = (Deliveryqty ? Deliveryqty : 0);
                    if(parseFloat(Deliveryqty) > 0){
                        cells[19].innerHTML = parseFloat(MVendorPrice).toFixed(2);
                    }else{
                        cells[19].innerHTML = 0.00;
                    }
                }else{
                    MDeliveryQty = (Deliveryqty ? Deliveryqty : 0);
                    MCostPrice = parseFloat(MEAPrice ? MEAPrice : 0) - (parseFloat(MEAPrice ? MEAPrice : 0) * parseFloat(MDiscPer ? MDiscPer : 0) / 100);
                    MGPRate = parseFloat(MCostPrice ? MCostPrice : 0) * parseFloat(MGPPer ? MGPPer : 0) / 100;
                    if (Val(MDeliveryQty) > 0){
                        cells[19].innerHTML = parseFloat(MCostPrice ? MCostPrice : 0).toFixed(2);
                    }else{
                        cells[19].innerHTML = 0.00;
                    }
                }

                MQty = Deliveryqty ? Deliveryqty : 0;
                MGPAmt = parseFloat(MGPRate ? MGPRate : 0) * MQty;
                cells[14].innerHTML = parseFloat(MGPAmt ? MGPAmt : 0);

                MCostAmt = cells[19].innerHTML * parseFloat(MQty ? MQty : 0);
                TxtTotCostAmt += parseFloat(MCostAmt).toFixed(2);

                let MGPCostAmt = parseFloat(MVendorPrice ? MVendorPrice : 0) * parseFloat(MQty ? MQty : 0);
                TxtGPCostAmt += parseFloat(MGPCostAmt).toFixed(2);


                TxtTotalGPAmt += parseFloat(cells[14].innerHTML ? cells[14].innerHTML : 0).toFixed(2);




            }
            $('#TxtTotCostAmt').val(TxtTotCostAmt);
            $('#TxtGPCostAmt').val(TxtGPCostAmt);
            $('#TxtGPCostAmt').val($('#TxtGPCostAmt').val() + $('#TxtVatAmt1').val());
            $('#TxtTotalAmount').val(parseFloat(MAmt ? MAmt : 0).toFixed(2));
            $('#TxtTotalAmount2').val(MAmt2);
            $('#TxtTotalQty').val(parseFloat(MNoOfItems ? MNoOfItems : 0).toFixed(2));
            $('#TxtDeliveredQty').val(MTotalPurQty);
            $('#TxtTotalRecQty').val(parseFloat(MTotalRecQty ? MTotalRecQty : 0).toFixed(2));
            $('#TxtDiscAmt').val(parseFloat($('#TxtInvDiscPer').val() * $('#TxtTotalAmount2').val()).toFixed(2));
            $('#TxtNetAmount').val(parseFloat($('#TxtTotalAmount').val() * $('#TxtDiscAmt').val()).toFixed(2));
            let MMNetAmount2 = parseFloat($('#TxtTotalAmount2').val() - $('#TxtDiscAmt').val()).toFixed(2);
           // Assuming that data is a JSON string, parse it into an array of objects
var data = {!! json_encode($PurchaseOrderMaster) !!};
var TxtVatAmt1 = 0;
var TxtPODeliveryCharges = 0;
var TxtGPCostAmt = 0;

if (data.length > 0) {
    data.forEach(function(item) {
        TxtVatAmt1 += item.GstAmt ? parseFloat(item.GstAmt) : 0;
        TxtPODeliveryCharges += item.DeliveryCharges ? parseFloat(item.DeliveryCharges) : 0;
        TxtGPCostAmt += item.NetAmount ? parseFloat(item.NetAmount) : 0;
    });

    $('#TxtVatAmt1').val(TxtVatAmt1.toFixed(2));
    $('#TxtPODeliveryCharges').val(TxtPODeliveryCharges.toFixed(2));
    $('#TxtGPCostAmt').val(TxtGPCostAmt.toFixed(2));
} else {
    $('#TxtVatAmt1').val(0);
    $('#TxtPODeliveryCharges').val(0);
    $('#TxtGPCostAmt').val(0);
}


        $('#TxtGPCostAmt').val( parseFloat(parseInt(TxtGPCostAmt)) + parseInt($('#TxtPullStockAmt').val()));
        $('#TxtTotalGPAmt').val( parseFloat(parseInt($('#TxtNetAmount').val()))- parseInt($('#TxtGPCostAmt').val()).toFixed(2));



        var LblCreditNotePer =$('#LblCreditNotePer').val();
        if( parseFloat(LblCreditNotePer) > 0){
            $('#LblCreditNote').val(parseFloat(parseInt(MMNetAmount2) * parseInt(LblCreditNotePer) / 100).toFixed(2));
        }

        else{
            $('#LblCreditNote').val(0);

        }
        var LblCreditNote = $('#LblCreditNote').val();
        var MMAVIRebate  = parseFloat(parseInt(MMNetAmount2) - parseInt(LblCreditNote)).toFixed(2);
        var LblRebaitPer = $('#LblRebaitPer').val();

        if(parseFloat(LblRebaitPer) > 0){
            $('#LblRebaitAmt').val(parseFloat(parseFloat(MMAVIRebate) * parseFloat(LblRebaitPer) / 100).toFixed(2));

        }
        else{
            $('#LblRebaitAmt').val(0);

        }
        var LblRebaitAmt = $('#LblRebaitAmt').val();
        var MMAgentCommper = parseFloat(MMNetAmount2) - (parseFloat(LblCreditNote) + parseFloat(LblRebaitAmt));
        var LblAgentCommPer = $('#LblAgentCommPer').val();

        if( parseFloat(LblAgentCommPer) > 0) {
            $('#LblAgentComm').val(parseFloat(parseFloat(MMAgentCommper) * Val(LblAgentCommPer) / 100).toFixed(2));
        }
        else{
            $('#LblAgentComm').val(0);
        }
        var LblAgentComm = $('#LblAgentComm').val();
        var MMSalesManCommPer = parseFloat(MMNetAmount2) - (parseFloat(LblCreditNote) + parseFloat(LblRebaitAmt) + parseFloat(LblAgentComm));
        var LblSalesManCommPer = $('#LblSalesManCommPer').val();

        if (parseFloat(LblSalesManCommPer) > 0) {

            $('#LblSalesManComm').val(parseFloat(parseFloat(MMSalesManCommPer) * parseFloat(LblSalesManCommPer.Text) / 100).toFixed(2));
        }else{
            $('#LblSalesManComm').val(0);
        }

        var LblSalesManComm = $('#LblSalesManComm').val();
        var TxtNetAmount = $('#LblNetAmount').val();
        var LblNetAmount = parseFloat(TxtNetAmount) - (parseFloat(LblCreditNote) + parseFloat(LblRebaitAmt) + parseFloat(LblAgentComm) + parseFloat(LblSalesManComm));

        $('#LblNetAmount').val(LblNetAmount);
        var TxtGPCostAmt = $('#TxtGPCostAmt').val();
        LblNetAmount = $('#LblNetAmount').val();
        var MGPAmount = parseFloat(LblNetAmount) - parseFloat(TxtGPCostAmt);

        MGPAmount = parseFloat(MGPAmount).toFixed(2);
        $('#LBLNETGP').val(parseFloat((parseFloat(MGPAmount) / (LblNetAmount == 0) ? 1 : parseFloat(LblNetAmount) ) * 100).toFixed(2));

        $('#TxtTotalGPAmt').val(parseFloat(parseFloat(LblNetAmount) - parseFloat(TxtGPCostAmt)).toFixed(2));
         TxtTotalGPAmt = $('#TxtTotalGPAmt').val();
        $('#TxtGPPer').val(parseFloat(parseFloat((TxtTotalGPAmt) / (LblNetAmount == 0) ? 1 : parseFloat(LblNetAmount)) * 100).toFixed(2));

        }
$(document).ready(function () {
    Calcu();
});
        $(document).on("click", "#DeliverAll", function() {
            let table = document.getElementById('Deliverytablebody');
            let rows = table.rows;
            let TxtTotalQty = 0;
            let TxtTotalRecQty = 0;
            let TxtTotalNotRecQty = 0;
            let TxtDeliveredQty = 0;
            for (let i = 0; i < rows.length; i++) {
                let cells = rows[i].cells;
                Itemcode = cells[0].innerHTML;
                ItemName = cells[1].innerHTML;
                Puom = cells[2].innerHTML;
                Orderqty = cells[3].innerHTML;
                Recvdqty = cells[4].innerHTML;
                NotRecvdqty = cells[5].innerHTML;
                Deliveryqty = cells[6].innerHTML;
                rate = cells[7].innerHTML;
                Amount = cells[8].innerHTML;
                PurchaseOrderID = cells[9].innerHTML;
                QuoteID = cells[10].innerHTML;
                VendorCode = cells[11].innerHTML;
                VendorActCode = cells[12].innerHTML;
                GPPer = cells[13].innerHTML;
                GPAmt = cells[14].innerHTML;
                CostPrice = cells[15].innerHTML;
                VendorPrice = cells[16].innerHTML;
                DiscPer = cells[17].innerHTML;
                DiscAmt = cells[18].innerHTML;
                CostPriceNew = cells[19].innerHTML;
                Po = cells[20].innerHTML;
                NoDiscount = cells[21].innerHTML;

                cells[6].innerHTML = cells[4].innerHTML;

                TxtTotalQty += Number(Orderqty);
                TxtTotalRecQty += Number(Recvdqty);
                TxtTotalNotRecQty += Number(NotRecvdqty);
                TxtDeliveredQty += Number(Deliveryqty);
            }
            document.getElementById("TxtTotalQty").value = TxtTotalQty;
            document.getElementById("TxtTotalRecQty").value = TxtTotalRecQty;
            document.getElementById("TxtTotalNotRecQty").value = TxtTotalNotRecQty;
            document.getElementById("TxtDeliveredQty").value = TxtDeliveredQty;

            statuschecker()
        });

        function statuschecker() {

            let status = document.getElementById("status").value;
            let Description = document.getElementById('Description').value;

            vsno = {{ $DataMaster->VSNNo }};
            Pono = {{ $PONO }};
            DepartmentName = '{{ $Datadetailsfirst->DepartmentName }}';
            console.log(status);
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

        $(document).on("click", "#SendDeliver", function() {
            statuschecker()
            let status = document.getElementById("status").value;
            let Description = document.getElementById('Description').value;
            let deliverydate = document.getElementById('deliverydate').value;
            let deliveryTime = document.getElementById('deliveryTime').value;
            let TotalQty = document.getElementById("TxtTotalQty").value;
            let TotalRecQty = document.getElementById("TxtTotalRecQty").value;
            let TotalNotRecQty = document.getElementById("TxtTotalNotRecQty").value;
            let DeliveredQty = document.getElementById("TxtDeliveredQty").value;
            let Bankinfo = document.getElementById("Bankinfo").value;
            let VendorActCode = document.getElementById("VendorActCode").value;
            let TxtBillingCompany = document.getElementById("TxtBillingCompany").value;
            let TxtBillingAddress = document.getElementById("TxtBillingAddress").value;
            let VATPer = document.getElementById("VATPER").value;
            let VATAmt = document.getElementById("VATAmt").value;
            let NetAmount = document.getElementById("NetAmount").value;
            let TxtAtten = document.getElementById("TxtAtten").value;
            let InvDiscAmt = document.getElementById("InvDiscAmt").value;
            let InvDiscPer = document.getElementById("InvDiscPer").value;
            let Terms = $('#Terms').val();
            let DeliveryOrderNo = document.getElementById("DeliveryOrderNo").value;
            let DeliveryCharges = document.getElementById("DeliveryCharges").value;
            let PaidAmt = document.getElementById("PaidAmt").value;
            let ReceivedAmt = document.getElementById("ReceivedAmt").value;
            let CostAmt = document.getElementById("CostAmt").value;
            let GPCostAmt = document.getElementById("TxtGPCostAmt").value
            let TotGPAmt = document.getElementById("TotGPAmt").value
            let TxtGPPer = document.getElementById("TotGPAmt").value
            // alert(deliveryTime);

            let ChargeNo = '{{ $DataMaster->PONo }}';
            let vsno = '{{ $DataMaster->VSNNo }}';
            let Pono = '{{ $PONO }}';
            let DispatchDate = '{{ $DataMaster->DispatchDate }}';
            let DispatchTime = '{{ $DataMaster->DispatchTime }}';
            let OrderDate = '{{ $DataMaster->OrderDate }}';
            let DepartmentName = '{{ $Datadetailsfirst->DepartmentName }}';
            let CustomerActCode = '{{ $DataMaster->CustomerActCode }}';
            let RefNo = '{{ $DataMaster->CustomerRefNo }}';
            let EventNo = '{{ $DataMaster->EventNo }}';
            let QuoteNo = '{{ $DataMaster->QuoteNo }}';
            let CustomerCode = '{{ $DataMaster->CustomerCode }}';
            console.log(CustomerCode);
            let CustomerName = '{{ $DataMaster->CustomerName }}';
            let VesselName = '{{ $DataMaster->VesselName }}';
            let MChkSevenDelivery = 0;
            if ($('#ChkSevenSeasDelivery').prop("checked") == true) {
                MChkSevenDelivery = 1
            } else {
                MChkSevenDelivery = 0
            }
            if (status === "") {
                alert('Please Select STATUS : "STATUS Not Found"');
            } else if (status === "INVOICED") {
                alert('Can Not Change Because Status is INVOICED : "Dont Have Permission to Change"');

            } else {
                // alert('working');

                let table = document.getElementById('Deliverytablebody');
                let rows = table.rows;

                let data = [];
                for (let i = 0; i < rows.length; i++) {
                    let cells = rows[i].cells;
                    data.push({

                        Itemcode: cells[0].innerHTML,
                        ItemName: cells[1].innerHTM,
                        Puom: cells[2].innerHTML,
                        Orderqty: cells[3].innerHTML,
                        Recvdqty: cells[4].innerHTML,
                        NotRecvdqty: cells[5].innerHTML,
                        Deliveryqty: cells[6].innerHTML,
                        rate: cells[7].innerHTML,
                        Amount: cells[8].innerHTML,
                        PurchaseOrderID: cells[9].innerHTML,
                        QuoteID: cells[10].innerHTML,
                        VendorCode: cells[11].innerHTML,
                        VendorActCode: cells[12].innerHTML,
                        GPPer: cells[13].innerHTML,
                        GPAmt: cells[14].innerHTML,
                        CostPrice: cells[15].innerHTML,
                        VendorPrice: cells[16].innerHTML,
                        DiscPer: cells[17].innerHTML,
                        DiscAmt: cells[18].innerHTML,
                        CostPriceNew: cells[19].innerHTML,
                        Po: cells[20].innerHTML,
                        NoDiscount: cells[21].innerHTML,


                    });
                }
                // console.log(data);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'post',
                    url: '{{ URL::to('DeliveryOrdersave') }}',
                    data: {

                        data,
                        TotalQty,
                        CostAmt,
                        GPCostAmt,
                        TotalRecQty,
                        TotalNotRecQty,
                        DeliveredQty,
                        status,
                        Bankinfo,
                        OrderDate,
                        MChkSevenDelivery,
                        Pono,
                        PaidAmt,
                        ReceivedAmt,
                        VATPer,
                        Terms,
                        DeliveryCharges,
                        DeliveryOrderNo,
                        InvDiscPer,
                        TxtBillingCompany,
                        TxtBillingAddress,
                        deliverydate,
                        deliveryTime,
                        DispatchTime,
                        DispatchDate,
                        CustomerActCode,
                        InvDiscAmt,
                        VATAmt,
                        TxtAtten,
                        RefNo,
                        ChargeNo,
                        QuoteNo,
                        EventNo,
                        CustomerCode,
                        CustomerName,
                        Description,
                        vsno,
                        VesselName,
                        NetAmount,
                        VendorActCode,
                        TotGPAmt,
                        TxtGPPer,

                    },
                    beforeSend: function() {
                        // Show the overlay and spinner before sending the request
                        $('.overlay').show();
                    },
                    success: function($response) {
                        // $('.vpodata').html(data);
                        // console.log(data);
                        // console.log($response.Message);
                        // console.log($response.ordermaster);
                        // console.log($response.MInvNo);
                        // console.log($response.orderDetail);
                        // console.log($response.deliveryOrderMaster);
                        $('#ajax-success-modal').modal('show');


                    },
                    complete: function() {
                        // Hide the overlay and spinner after the request is complete
                        $('.overlay').hide();
                    }
                });

            }




        });
        $(document).on("click", "#DeliverPrint", function() {
            let MInvNo = '{{ $PONO }}';
            let MVsn = '{{ $DataMaster->VSNNo }}';
            let MRep = "DeliveryOrder";
            let MRepFormat = "";
            if ($('#OptFormat1').prop("checked") == true) {
                MRepFormat = "Format1";
            } else {
                MRepFormat = "Format2";
            }
            let MPass = false;
            if ($('#ChkKG').prop("checked") == true) {
                MPass = true;
            } else {
                MPass = false;
            }
            let CHeading = "0";
            if ($('#ChkCompanyHeading').prop("checked") == true) {
                CHeading = "1";
            } else {
                CHeading = "0";
            }
            let MChkSevenSeasNorwayAS = "0";
            if ($('#ChkSevenSeasNorwayAS').prop("checked") == true) {
                MChkSevenSeasNorwayAS = "1";
            } else {
                MChkSevenSeasNorwayAS = "0";
            }

            let MChkSevenDelivery = 0;
            if ($('#ChkSevenSeasDelivery').prop("checked") == true) {
                MChkSevenDelivery = 1
            } else {
                MChkSevenDelivery = 0
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'post',
                url: '{{ URL::to('DeliveryOrderPrint') }}',
                data: {
                    MChkSevenDelivery,
                    MChkSevenSeasNorwayAS,
                    CHeading,
                    MPass,
                    MRepFormat,
                    MRep,
                    MInvNo,
                    MVsn,

                },
                beforeSend: function() {
                    // Show the overlay and spinner before sending the request
                    $('.overlay').show();
                },
                success: function($response) {

                    console.log($response.Message);
                    window.open($response.http + $response.link, "_blank");




                },
                complete: function() {
                    // Hide the overlay and spinner after the request is complete
                    $('.overlay').hide();
                }
            });



        });

        function check() {
            let OptFormat1 = document.getElementById("OptFormat1");
            let OptFormat2 = document.getElementById("OptFormat2");
            let ChkSevenSeasDelivery = document.getElementById("ChkSevenSeasDelivery");
            let ChkSevenSeasNorwayAS = document.getElementById("ChkSevenSeasNorwayAS");

            if ($('#OptFormat1').prop("checked") == true) {
                // alert('check');
                OptFormat2.checked = false;
                OptFormat2.value = 0;
                OptFormat1.value = 1;
            }



            if ($('#OptFormat2').prop("checked") == true) {
                OptFormat1.checked = false;
                OptFormat1.value = 0;
                OptFormat2.value = 1;
            }

            if ($('#ChkSevenSeasDelivery').prop("checked") == true) {
                // alert('check');
                ChkSevenSeasNorwayAS.checked = false;
                ChkSevenSeasNorwayAS.value = 0;
                ChkSevenSeasDelivery.value = 1;
            }



            if ($('#ChkSevenSeasNorwayAS').prop("checked") == true) {
                ChkSevenSeasDelivery.checked = false;
                ChkSevenSeasDelivery.value = 0;
                ChkSevenSeasNorwayAS.value = 1;
            }


        }
    </script>
@stop


@section('content')
