@extends('layouts.app')



@section('title', 'Purchase Order-Received')

@section('content_header')

@stop

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    </div>

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

        <div class="card ">

            <div class="card-header">
                <h2 class=" text-bold text-primary">PO Received</h2>
            </div>

            <div class="card-header" style="background-color:#f5f5f5; ">
                <div class="card-tools ">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
                <div class="row">
                    <div class=" ml-2 ">
                        <strong>PO #:</strong>&nbsp; <label class="PO text-blue"><input type="number" name="PONO"
                                class="form-control" style="width: 80px; margin-top:-5px" id="PONO"
                                value="{{ $PONO }}"></label>
                    </div>
                    <div class=" ml-2 ">
                        <strong>Charge #:</strong>&nbsp; <label id="lblCharge" class="Charge text-blue">{{ $ChargeNo }}</label>
                    </div>
                    <div class=" ml-5 ">
                        /&nbsp;<strong>VSN #:</strong>&nbsp; <label id="lblVSN" class="VSN text-blue"></label>
                    </div>

                    <div class="ml-5">
                        /&nbsp;<strong>Event #:</strong> &nbsp;<label id="lblEventno" class="event_no text-blue"
                            for="event_no"></label>
                    </div>
                    <div class="ml-5">
                        /&nbsp;<strong>Quote #:</strong> &nbsp;<label id="lblQuoteNo" class="QuoteNo text-blue"
                            for="QuoteNo"></label>
                    </div>
                    <div class="ml-5">
                        /&nbsp; <strong>Customer :&nbsp;</strong> <label class="customer text-blue"
                            id="lblCustomer" for="customer"></label>

                    </div>
                    <div class="ml-5">
                        /&nbsp; <strong>Vessel :&nbsp;</strong> <label class="vessel text-blue"
                           id="lblVessel" for="vessel"></label>

                    </div>
                    <div class="ml-5">
                        /&nbsp; <strong>Customer Ref # :&nbsp;</strong> <label class="customer_ref_no text-blue"
                           id="lblCustomerrefno" for="customer_ref_no"></label>

                    </div>
                    <div class="ml-5">
                        /&nbsp; <strong>Department :&nbsp;</strong> <label class="Department text-blue"
                           id="lblDepartment" for="Department"></label>

                    </div>
                </div>


            </div>

            <div class="card-body">
                <div class="row py-2">
                    <div class="inputbox col-sm-3">

                        <span class="Txtspan">Order Date</span>

                        <input id='orderdate' type="date" class=" "
                            value="">

                    </div>
                    <div class="inputbox col-sm-3">
                        <span class="Txtspan" id="">PO Date</span>

                        <input id='POdate' type="date" class=" "
                            value="">

                    </div>
                    <div class="inputbox col-sm-3">
                        <span class="Txtspan" id="">Req Date</span>

                        <input id='TxtReqDate' type="date" class=" "
                            value="">
                        <input id='TxtBackLogDate' hidden type="date" class=" "
                            value="">

                    </div>
                    <div class="inputbox col-sm-2">
                        <span class="Txtspan" id="">Time</span>

                        <input id='TxtReqTime' type="time" class=" "
                            value="">

                    </div>
                </div>
                <div class="row py-2">
                    <div class="inputbox col-sm-2">
                        <span class="Txtspan" id="">Status</span>

                        <select class="" name="status" id="status">
                            <option value="TRANSIT NOLA">TRANSIT NOLA</option>
                            <option value="DELIVERED">DELIVERED</option>

                        </select>
                    </div>
                    <div class="inputbox col-sm-2">
                        <span class="Txtspan" id="">Atten :</span>

                        <input type="text" readonly class="" id="TxtAtten" value=""
                            name="TxtAtten">
                        <input type="hidden" class="form-control" id="TxtBillingCompany"
                            value="" name="TxtBillingCompany">
                        <input type="hidden" class="form-control" id="TxtBillingAddress"
                            value="" name="TxtBillingAddress">
                    </div>
                    <div class="inputbox col-sm-2">
                        <span class="Txtspan" id="">Terms</span>

                        <select class="" id="TxtTerms" name="Terms">
                            <option value="N 7 Days">N 7 Days</option>
                            <option value="N 10 Days">N 10 Days</option>
                            <option value="N 14 Days">N 14 Days</option>
                            <option value="N 15 Days">N 15 Days</option>
                            <option value="N 21 Days">N 21 Days</option>
                            <option value="N 30 Days">N 30 Days</option>
                            <option value="N 45 Days">N 45 Days</option>
                            <option value="N 60 Days">N 60 Days</option>
                            <option value="N 90 Days">N 90 Days</option>
                            <option value="CASH">CASH</option>
                            <option value="CREDIT CARD">CREDIT CARD</option>
                            <option value="FOR CHEQUE">FOR CHEQUE</option>

                        </select>
                    </div>
                    <div class="inputbox col-sm-2">
                        <span class="Txtspan" id="">DeliveryOrderNo</span>

                        <input type="text" class="" readonly id="DeliveryOrderNo"
                            value="" name="DeliveryOrderNo">
                    </div>
                    <div class="inputbox col-sm-2">
                        <span class="Txtspan" id="">Vendor</span>

                        <input type="text" class="" readonly id="TxtVendorName" value=""
                            name="VendorName">
                        <input type="hidden" class="form-control" id="TxtVendorCode" value=""
                            name="TxtVendorCode">
                    </div>
                    <div class="inputbox col-sm-2">

                        <input type="text" class="" id="TxtVendorRefNo"
                            value="" name="TxtVendorRefNo">
                        <span class="" id="">Vendor Bill #</span>
                    </div>
                    <label hidden for="" id="LblCancelled">CANCELLED</label>
                </div>
                <div class="row py-1">

                    <div class="inputbox col-sm-3">
                        <span class="Txtspan" id="">Comments</span>
                        <textarea name="" class="" id="TxtVendorComments" cols="30" rows="2"></textarea>
                    </div>
                </div>

                <label for="" id="LblTotalInv"></label>

            </div>



        </div>
        <div class="card">
            <div class="card-body">


                <div class="">
                    <table class="table  table-inverse" id="Deliverytable" style="width: 100px">
                        <thead class="bg-info">
                            <tr>
                                <th>Rcvd</th>
                                <th>Item&nbsp;Code</th>
                                <th style="width: 400px">Item&nbsp;Name</th>
                                <th>UOM</th>
                                <th class="text-center">Order&nbsp;Qty</th>
                                <th class="text-center">Recvd&nbsp;Qty</th>
                                <th class="text-center">Return&nbsp;Qty</th>
                                <th class="text-center">Not&nbsp;Recvd&nbsp;Qty</th>
                                <th class="text-center">Over&nbsp;Qty</th>
                                <th hidden>Move to stock</th>
                                <th>Cancel&nbsp;Qty</th>
                                <th hidden>Vendor&nbsp;name</th>
                                <th class="text-right">Cost&nbsp;price</th>
                                <th class="text-right">Amount</th>
                                <th hidden>Order&nbsp;ID</th>
                                <th hidden>Quote&nbsp;ID</th>
                                <th hidden>VendorCode</th>
                                <th class="text-right">Sell&nbsp;Price</th>
                                <th hidden>SNo</th>
                                <th hidden>ID</th>
                                <th>GP%</th>
                                <th class="text-right">GP</th>
                                <th>IMPA</th>
                                <th>Customer&nbsp;Note</th>
                                <th>Vendor&nbsp;Note</th>
                            </tr>
                        </thead>
                        <tbody id="Deliverytablebody">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">


                <div class="row py-1 ml-3">


                    <div class="CheckBox1">
                        <label class="input-group text-info mt-2 mx-2">
                            <input class="" type="checkbox" name="ChkLocked" id="ChkLocked" value="">
                            Locked
                        </label>
                    </div>

                    <div class="CheckBox1">
                        <label class="input-group text-info mt-2 mx-2">
                            <input class="" type="checkbox" name="ChkOkToPay" id="ChkOkToPay" value="">
                            OK To PAY
                        </label>
                    </div>

                    <div class="CheckBox1">
                        <label class="input-group text-info mt-2 mx-2">
                            <input class="" type="checkbox" name="ChkReceivedCompleted" id="ChkReceivedCompleted"
                                value=""> Received Complete
                        </label>
                    </div>

                    <div class="CheckBox1">
                        <label class=" input-group text-info mt-2 mx-2">
                            <input class="" type="checkbox" checked name="ChkCompanyHeading"
                                id="ChkCompanyHeading" value=""> Company Heading
                        </label>
                    </div>

                    <div class="CheckBox1">
                        <label class=" input-group text-info mt-2 mx-2">
                            <input class="" type="checkbox" name="ChkNoCost" id="ChkNoCost" value=""> NO
                            COST Vendor
                        </label>
                    </div>

                </div>
                <div class="row py-2">

                    <a name="selectAll" id="selectAll" class="col-sm-1 btn mx-1 form-control btn-info"
                        role="button">Select</a>
                    <a name="unselectall" id="unselectall" class="col-sm-1 mx-1 form-control btn btn-info"
                        role="button">UnSelect</a>

                    <div class="inputbox col-sm-2">
                        <span class="Txtspan" id="">GST Tax</span>
                        <input class="" type="number" name="" placeholder="">
                    </div>

                    <div class="inputbox col-sm-2">
                        <span class="Txtspan" id="">%</span>
                        <input class="" type="number" name="" placeholder="">

                    </div>

                    <div class="inputbox col-sm-3">
                        <span class="Txtspan" id="">Description</span>
                        <input class="" type="text" id="Description" value=""
                            name="Description" placeholder="">
                    </div>

                    <a name="ReceivedAll" id="ReceivedAll" class="btn btn-primary col-sm-1"
                        role="button">ReceivedAll</a>
                </div>

                <div class="row py-2">
                    <div class="inputbox col-sm-2">
                        <span class="Txtspan" id="">Total </span>
                        <input class="   " readonly id="TxtTotalQty" type="number" name="" placeholder="">
                    </div>
                    <div class="inputbox col-sm-1">
                        <input class="   " readonly id="TxtTotalRecQty" type="number" name=""
                            placeholder="">
                    </div>
                    <div class="inputbox col-sm-1">
                        <input class="   " readonly id="TxtTotalNotRecQty" type="number" name=""
                            placeholder="">
                    </div>
                    <div class="inputbox col-sm-1">
                        <input class="   " readonly id="TxtTotOverQty" type="number" name="" placeholder="">
                    </div>

                    <div class="col-sm-1">
                        <div class="CheckBox1">
                            <label class="input-group text-info mt-2 ml-2">
                                <input type="checkbox" class="" name="ChkPaymentPaid" id="ChkPaymentPaid"
                                    value="">
                                Paid Amount
                            </label>
                        </div>
                    </div>


                    <div class="inputbox col-sm-3">
                        {{-- <span class="Txtspan " id="">TxtTotalAmount</span> --}}
                        <input class="   " type="text" value=""
                            name="TxtTotalAmount" id="TxtTotalAmount" placeholder="">

                    </div>

                    <div class="inputbox col-sm-2">
                        <span class="Txtspan " id="">Dr. Note</span>
                        <input class="   " type="text" value=""
                            name="TxtPurchaseReturn" id="TxtPurchaseReturn" placeholder="">
                        <input class="" id="VendorActCode" type="hidden"
                            value="" name="VendorActCode" placeholder="">
                    </div>


                    <a name="CmdSave" id="CmdSave" class="btn btn-success col-sm-1" role="button"><i
                            class="fa fa-cloud mr-2" aria-hidden="true"></i> SAVE</a>
                </div>
                <div class="row py-2 pb-4">
                    <div class="col-sm-6">
                        <div class="inputbox">
                            <span class="Txtspan" id="">Bank Details</span>
                            <textarea class="" type="text" name="Bankinfo" placeholder="" id="Bankinfo" rows="11"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row pb-2">
                                    <div class="inputbox col-sm-6">
                                        <span class="Txtspan" id="">Disc Per</span>
                                        <input class="" type="number" value=""
                                        onblur="Calcu()"

                                        name="TxtDiscPer" id="TxtDiscPer" placeholder="">
                                    </div>

                                    <div class="inputbox col-sm-6">
                                        <span class="Txtspan" id="">Amt</span>
                                        <input class="   " type="number" value=""
                                        name="TxtDiscAmt" id="TxtDiscAmt" placeholder="">
                                    </div>
                                </div>
                                <div class="row pb-2">
                                    <div class="inputbox col-sm-12">
                                        <span class="Txtspan" id="">Delivery Charges</span>
                                        <input class="   " onblur="Calcu()" type="number"
                                            value="" id="TxtDeliveryCharges"
                                            name="TxtDeliveryCharges" placeholder="">
                                    </div>
                                </div>

                                <div class="row py-2">
                                    <div class="inputbox col-sm-12">
                                        <span class="Txtspan" id="">Gross</span>
                                        <input class="   " id="TxtGrossAmt" onblur="Calcu()" type="number"
                                            name="" placeholder="">
                                    </div>
                                </div>



                                <div class="row py-2">
                                    <div class="inputbox col-sm-12">
                                        <span class="Txtspan" id="">Re-Stocking Charges</span>
                                        <input class="   " type="number" onblur="Calcu()"
                                            value=""
                                            name="TxtRestockingCharges" id="TxtRestockingCharges" placeholder="">
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="inputbox col-sm-12">
                                        <span class="Txtspan" id="">Credit Memo</span>
                                        <input class="   " type="number" name="TxtExchangeRateAdjustment"
                                            value=""
                                            onblur="Calcu()"
                                            id="TxtExchangeRateAdjustment" placeholder="">
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="inputbox col-sm-12">
                                        <span class="Txtspan" id="">Net Amount</span>
                                        <input class="   " type="number" name="TxtNetAmount" readonly
                                            id="TxtNetAmount" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 ">

                                <div class="row pb-2">
                                    <div class="inputbox col-sm-12">
                                        <span class="Txtspan " id="">Link1</span>
                                        <input class="   " type="text" name="TxtLink1" id="TxtLink1"
                                            value="" placeholder="">
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="inputbox col-sm-12">
                                        <span class="Txtspan " id="">Link2</span>
                                        <input class="   " type="text" name="TxtLink2" id="TxtLink2"
                                            value="" placeholder="">
                                    </div>
                                </div>
                                <div class="row py-2">

                                    <div class="inputbox col-sm-12">
                                        <span class="Txtspan " id="">Link3</span>
                                        <input class="   " type="text" name="TxtLink3" id="TxtLink3"
                                            value="" placeholder="">
                                    </div>
                                </div>
                                <div class="row py-2">

                                    <div class="inputbox col-sm-12">
                                        <span class="Txtspan " id="">Link4</span>
                                        <input class="   " type="text" name="TxtLink4" id="TxtLink4"
                                            value="" placeholder="">
                                    </div>
                                </div>
                                <div class="row py-2">

                                    <div class="inputbox col-sm-12">
                                        <span class="Txtspan " id="">Link5</span>
                                        <input class="   " type="text" name="TxtLink5" id="TxtLink5"
                                            value="" placeholder="">
                                    </div>
                                </div>
                                <div class="row py-2">

                                    <div class="inputbox col-sm-12">
                                        <span class="Txtspan " id="">Link6</span>
                                        <input class="   " type="text" name="TxtLink6" id="TxtLink6"
                                            value="" placeholder="">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="txtGodownCode" id="txtGodownCode">
    <input type="hidden" name="txtCustomerCode" id="txtCustomerCode">
    <input type="hidden" name="txtCustomerActCode" id="txtCustomerActCode">
    <input type="hidden" name="txtDispatchTime" id="txtDispatchTime">
    <input type="hidden" name="txtDispatchDate" id="txtDispatchDate">

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
                        <h3 class="cupon-pop">Charge #: <span>{{ $ChargeNo }}</span></h3>

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

        /* .col-lg-12 span{
                                                                                                                                                                                                                                                                                                                                                                    font-size: 11px;

                                                                                                                                                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                                                                                                                                                    .span-w{
                                                                                                                                                                                                                                                                                                                                                                    width: 115px;

                                                                                                                                                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                                                                                                                                                    .form-control{
                                                                                                                                                                                                                                                                                                                                                                        font-size: 11px;

                                                                                                                                                                                                                                                                                                                                                                    } */
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

        function ajaxSetup() {
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
        }
        function DataGet() {
            ajaxSetup();
            $.ajax({
                    type: 'post',
                    url: "{{ route('PORecDataget') }}",
                    data: {
                        PONO:$('#PONO').val(),
                        charge:$('#lblCharge').text(),
                    },
                    beforeSend: function() {
                        $('.overlay').show();
                    },
                    success: function(response) {
                        console.log(response);
                        if (response) {
                            if(response.PurchaseOrderMaster){
                                var Data = response.PurchaseOrderMaster;
                                $('#lblQuoteNo').text(Data.QuoteNo);
                                $('#orderdate').val(new Date(Data.Date).toISOString().substring(0, 10));
                                $('#POdate').val(new Date(Data.PODate).toISOString().substring(0, 10));
                                $('#TxtReqDate').val(new Date(Data.ReqDate).toISOString().substring(0, 10));
                                $('#TxtReqTime').val(Data.Time);
                                $('#TxtAtten').val(Data.Atten);
                                $('#TxtTerms').val(Data.Terms);
                                $('#TxtVendorName').val(Data.VendorName);
                                $('#TxtVendorCode').val(Data.VendorCode);
                                $('#TxtVendorComments').val(Data.VendorComment);
                                $('#lblDepartment').text(Data.DepartmentName);
                                $('#TxtDescription').val(Data.Des);
                                $('#TxtRestockingCharges').val(Data.RestockingCharges);
                                $('#TxtShipVia').val(Data.ShipVia);
                                $('#TxtTotalAmount').val(Data.PORecAmt);
                                $('#TxtDiscPer').val(Data.DiscPer);
                                $('#TxtDiscAmt').val(Data.DiscAmt);
                                $('#TxtGrossAmt').val(Data.GrossAmt);
                                $('#TxtGstPer').val(Data.GstPer);
                                $('#TxtGstAmt').val(Data.GSTAmt);
                                $('#TxtDeliveryCharges').val(Data.DeliveryCharges);
                                $('#TxtExchangeRateAdjustment').val(Data.ExchangeRateAdjustment);
                                $('#TxtPurchaseReturn').val(Data.TotalReturnAmount);
                                $('#TxtVendorRefNo').val(Data.VendorRefNo);
                                $('#TxtLink1').val(Data.Link1);
                                $('#TxtLink2').val(Data.Link2);
                                $('#TxtLink3').val(Data.Link3);
                                $('#TxtLink4').val(Data.Link4);
                                $('#TxtLink5').val(Data.Link5);
                                $('#TxtLink6').val(Data.Link6);
                                $('#TxtVendorCode2').val(Data.VendorCode2);
                                $('#TxtDeliveryCharges2').val(Data.deliverycharges2);
                                $('#TxtVendor2ActCode').val(Data.Vendor2ActCode);
                                $('#CmbVendorName2').val(Data.VendorName2);
                                if (Data.ChkReceivedCompleted == true) {
                                    $('#ChkReceivedCompleted').prop('checked',true);
                                }else{
                                    $('#ChkReceivedCompleted').prop('checked',false);
                                }
                                if (Data.OKToPay == true) {
                                    $('#ChkOkToPay').prop('checked',true);
                                }else{
                                    $('#ChkOkToPay').prop('checked',false);
                                }
                            }
                            if(response.flipToVSN){
                                var FlipData = response.flipToVSN;
                                $('#lblVSN').text(FlipData.VSNNo);
                                $('#lblEventno').text(FlipData.EventNo);
                                $('#lblCustomer').text(FlipData.CustomerName);
                                $('#lblVessel').text(FlipData.VesselName);
                                $('#TxtDlvDT').text(FlipData.DeliveryDate);
                                $('#lblQuoteNo').text(FlipData.QuoteNo);

                            }
                            if(response.PurchaseOrderDetail){
                                var list = response.PurchaseOrderDetail;
                                let table = document.getElementById('Deliverytablebody');
                                table.innerHTML = "";
                                list.forEach(function(item) {
                                    let row = table.insertRow();
                                    function createCell(content) {
                                        let cell = row.insertCell();
                                        cell.innerHTML = content;
                                        return cell;
                                    }

                                    createCell(`<input type="checkbox" name="Rcvd" ${item.ChkRcvd ? 'checked' : ''}
                                            class="checkbox" value="${item.ChkRcvd}" id="Rcvd${item.ID}">`);
                                    // createCell(item.ChkRcvd ? 1 : 0);
                                    createCell(item.ItemCode);
                                    createCell(item.ItemName);
                                    createCell(item.PUOM);
                                    createCell(item.OrderQty);
                                    createCell(item.RecQty);
                                    createCell(item.ReturnQty);
                                    createCell(item.NotRecQty);
                                    createCell(item.OverQty);
                                    createCell(item.MoveToStock).hidden='true';
                                    createCell(item.CancelQty);
                                    createCell(item.VendorName).hidden='true';
                                    createCell(item.VendorPrice);
                                    createCell(item.EstPrice);
                                    createCell(item.OrderID).hidden='true';
                                    createCell(item.QID).hidden='true';
                                    createCell(item.VendorCode).hidden='true';
                                    createCell(item.EstPrice);
                                    createCell(item.SNO).hidden='true';
                                    createCell(item.ID).hidden='true';
                                    createCell(item.GPRate);
                                    createCell(item.GPAmount);
                                    createCell(item.IMPA);
                                    createCell(item.CustomerNotes);
                                    createCell(item.VendorNotes);


                                });

                            }
                            // Calcu();
                        }


                    },
                    complete: function() {
                        $('.overlay').hide();
                    }

                });
        }
        function NetCalcu() {

            //      If LblCancelled.Visible = True Then
            //     TxtTotalAmount.Text = 0
            // End If
            var TxtDiscPer = $('#TxtDiscPer').val();
            var TxtTotalAmount = $('#TxtTotalAmount').val();
            var TxtDeliveryCharges = $('#TxtDeliveryCharges').val();

            if (parseFloat(TxtDiscPer) !== 0) {
                $('#TxtDiscAmt').val(parseFloat(TxtDiscPer ? TxtDiscPer : 0) * parseFloat(((TxtTotalAmount ? TxtTotalAmount : 0) == 0 ) ? 1 : TxtTotalAmount ) / 100);

            }

            var TxtDiscAmt = $('#TxtDiscAmt').val();


            var TxtGrossAmt = parseFloat(parseFloat(TxtTotalAmount ? TxtTotalAmount : 0) + parseFloat(TxtDeliveryCharges ? TxtDeliveryCharges : 0)) - parseFloat(TxtDiscAmt ? TxtDiscAmt : 0);
            $('#TxtGrossAmt').val(TxtGrossAmt);
            // var TxtGrossAmt = $('#TxtGrossAmt').val();
            var TxtRestockingCharges = $('#TxtRestockingCharges').val() ? $('#TxtRestockingCharges').val() : 0;
            var TxtExchangeRateAdjustment = $('#TxtExchangeRateAdjustment').val() ? $('#TxtExchangeRateAdjustment').val() : 0;

            var TxtNetAmount = (TxtGrossAmt ? TxtGrossAmt : 0) +  parseFloat(TxtRestockingCharges)  - parseFloat(TxtExchangeRateAdjustment ? TxtExchangeRateAdjustment: 0);
            console.log('Restock'+TxtRestockingCharges);
            console.log('Net'+TxtNetAmount);
            $('#TxtNetAmount').val(TxtNetAmount);
            // var TxtNetAmount = $('#TxtNetAmount').val();
            var TxtPurchaseReturn = $('#TxtPurchaseReturn').val();


            $('#TxtBalAmt').val(parseFloat(TxtNetAmount ? TxtNetAmount : 0) - parseFloat(TxtPurchaseReturn ? TxtPurchaseReturn : 0));

        }

        function Calcu() {
            let table = document.getElementById('Deliverytablebody');
            let rows = table.rows;

            let MAmt1 = 0;
            let MAmt = 0;
            let MSellAmt = 0;
            let MNoOfItems = 0;
            let MTotalRecQty = 0;
            let MTotalNotRecQty = 0;
            let MTotalPurQty = 0;
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


            for (let i = 0; i < rows.length; i++) {
                let cells = rows[i].cells;


                Rcvd = cells[0].innerHTML;
                Itemcode = cells[1].innerHTML;
                ItemName = cells[2].innerHTML;
                Puom = cells[3].innerHTML;
                Orderqty = cells[4].innerHTML;
                Recvdqty = cells[5].innerHTML;
                Returnqty = cells[6].innerHTML;
                NotRecvdqty = cells[7].innerHTML;
                Overqty = cells[8].innerHTML;
                Movetostock = cells[9].innerHTML;
                Cancelqty = cells[10].innerHTML;
                vendorname = cells[11].innerHTML;
                CostPrice = cells[12].innerHTML;
                Amount = cells[13].innerHTML;
                OrderID = cells[14].innerHTML;
                QuoteID = cells[15].innerHTML;
                VendorCode = cells[16].innerHTML;
                SellPrice = cells[17].innerHTML;
                Sno = cells[18].innerHTML;
                ID = cells[19].innerHTML;
                GPRate = cells[20].innerHTML;
                gpamount = cells[21].innerHTML;
                IMPA = cells[22].innerHTML;
                CustomerNote = cells[23].innerHTML;
                VendorNote = cells[24].innerHTML;
                console.log(Cancelqty);

                MNoOfItems += parseFloat(Orderqty ? Orderqty : 0);
                MTotalPurQty += parseFloat(Recvdqty ? Recvdqty : 0);
                MReturnQty += parseFloat(Returnqty ? Returnqty : 0);
                MTotalNotRecQty += parseFloat(NotRecvdqty ? NotRecvdqty : 0);
                MAmt1 = parseFloat(Recvdqty ? Recvdqty : 0) * parseFloat(CostPrice ? CostPrice : 0);
                cells[13].innerHTML = parseFloat(MAmt1 ? MAmt1 : 0).toFixed(2);

                if (parseFloat(Cancelqty ? Cancelqty : 0) > 0) {
                    MSellAmt = (parseFloat(Recvdqty ? Recvdqty : 0) - (parseFloat(Cancelqty ? Cancelqty : 0)) +
                        parseFloat(Returnqty ? Returnqty : 0)) * parseFloat(SellPrice ? SellPrice : 0);
                } else {
                    MSellAmt = (parseFloat(Recvdqty ? Recvdqty : 0) - parseFloat(Returnqty ? Returnqty : 0)) *
                        parseFloat(
                            SellPrice ? SellPrice : 0);
                    // console.log(SellPrice);

                    // *
                    //     SellPrice
                    //

                }
                console.log('se' + MSellAmt);

                TxtTotOverQty += parseFloat(Overqty ? Overqty : 0);
                MGpAmt = parseFloat(MSellAmt ? MSellAmt : 0).toFixed(2) - parseFloat(MAmt1 ? MAmt1 : 0).toFixed(2);
                cells[21].innerHTML = parseFloat(MGpAmt ? MGpAmt : 0).toFixed(2);
                // console.log('gpa' + MGpAmt);
                // console.log('sell' + SellPrice);
                GPRate = cells[20].innerHTML = parseFloat(((parseFloat(MGpAmt ? MGpAmt : 1) / ((MSellAmt == 0) ? 1 :
                    (MSellAmt))) * 100)).toFixed(2);

                if (parseFloat(GPRate ? GPRate : 0) <= 20) {
                    cells[20].style.color = 'red';
                } else if (parseFloat(GPRate ? GPRate : 0) >= 40) {
                    cells[20].style.color = 'green';
                } else {
                    cells[20].style.color = 'blue';
                }

                //

                TxtTotCancelQty += parseFloat(Cancelqty ? Cancelqty : 0);
                TxtTotMoveToStock += parseFloat(Movetostock ? Movetostock : 0);
                LblPOAmount += parseFloat(parseFloat(Recvdqty ? Recvdqty : 0) * parseFloat(SellPrice ? SellPrice : 0));

                MAmt += parseFloat(MAmt1 ? MAmt1 : 0).toFixed(2);

            }


            $('#TxtTotOverQty').val(parseFloat(TxtTotOverQty ? TxtTotOverQty : 0).toFixed(2));
            $('#TxtTotCancelQty').val(parseFloat(TxtTotCancelQty ? TxtTotCancelQty : 0).toFixed(2));
            $('#TxtTotMoveToStock').val(parseFloat(TxtTotMoveToStock ? TxtTotMoveToStock : 0).toFixed(2));
            $('#TxtTotRetrunQty').val(parseFloat(MReturnQty ? MReturnQty : 0).toFixed(2));
            $('#TxtTotalAmount').val(parseFloat(MAmt ? MAmt : 0).toFixed(2));
            $('#TxtGrossAmt').val(parseFloat(LblPOAmount ? LblPOAmount : 0).toFixed(2));
            $('#LblPOAmount').val(parseFloat(LblPOAmount ? LblPOAmount : 0).toFixed(2));
            $('#TxtTotalQty').val(parseFloat(MNoOfItems ? MNoOfItems : 0).toFixed(2));
            $('#TxtTotalNotRecQty').val(parseFloat(MTotalNotRecQty ? MTotalNotRecQty : 0).toFixed(2));
            $('#TxtTotalPurQty').val(parseFloat(MTotalPurQty ? MTotalPurQty : 0).toFixed(2));
            NetCalcu();

            $('#LblGPAmt').val($('#LblPOAmount').val() - $('#TxtBalAmt').val());
            $('#LblGPPer').val($('#LblGPAmt').val() / (($('#TxtBalAmt').val() == 0) ? 1 : $('#TxtBalAmt').val()) *
                100);
            $('#LblGPPer').val($('#LblGPPer').val() + '%');

        }

        $(document).ready(function() {
            var table1 = $('#Deliverytable').DataTable({
                scrollY: 550,
                scrollX: true,
                deferRender: true,
                scroller: true,
                paging: false,
                info: false,
                ordering: false,
                responsive: true,
                searching: false,



            });

            // table1.coulmns.djust();
            const selectAllButton = document.getElementById("selectAll");
            const unselectallButton = document.getElementById("unselectall");

            selectAllButton.addEventListener("click", function() {
                const checkboxes = document.querySelectorAll(".checkbox");
                checkboxes.forEach(function(checkbox) {
                    checkbox.checked = true;
                });
            });
            unselectallButton.addEventListener("click", function() {
                const checkboxes = document.querySelectorAll(".checkbox");
                checkboxes.forEach(function(checkbox) {
                    checkbox.checked = false;
                });
            });

            // check()
            // let ChkSevenSeasDelivery = document.getElementById("ChkSevenSeasDelivery");
            // if (ChkSevenSeasDelivery.value>0) {
            // // $("#ChkInactive").removeAttr("checked");
            //     ChkSevenSeasDelivery.checked = true;

            // }else{
            //     // $("#ChkInactive").removeAttr("checked");
            //     ChkSevenSeasDelivery.checked = false;

            // }
            // document.getElementById("deliverydate").valueAsDate = new Date();
            // var inputtime = document.getElementById("deliveryTime");
            // var now = new Date();
            // inputtime.value = now.toLocaleTimeString("en-US",{hour12:false});
            if ($('#PONO').val() !== '') {

                DataGet();
            }
            $('#PONO').blur(function (e) {
                e.preventDefault();
                DataGet();

            });
        });
    </script>
    <script>
        $(document).on("click", "#ReceivedAll", function() {
            deilver();
            // statuschecker()
        });

        function deilver() {
            let table = document.getElementById('Deliverytablebody');
            let rows = table.rows;
            let TxtTotalQty = 0;
            let TxtTotalRecQty = 0;
            let TxtTotalNotRecQty = 0;
            let TxtOverQty = 0;
            let TxtTotRtnQty = 0;
            let TxtTotMovetostock = 0;
            let TxtTotCancelqty = 0;
            let TxtTotalGPAmt = 0;
            let TxtTotCostAmt = 0;
            for (let i = 0; i < rows.length; i++) {
                let cells = rows[i].cells;
                cells[5].innerHTML = cells[4].innerHTML;
                cells[7].innerHTML = cells[4].innerHTML - cells[5].innerHTML;
                cells[21].innerHTML = Number(cells[13].innerHTML - cells[12].innerHTML);
                cells[21].innerHTML = Math.round(cells[21].innerHTML, 2);
                Rcvd = cells[0].innerHTML;
                Itemcode = cells[1].innerHTML;
                ItemName = cells[2].innerHTML;
                Puom = cells[3].innerHTML;
                Orderqty = cells[4].innerHTML;
                Recvdqty = cells[5].innerHTML;
                Returnqty = cells[6].innerHTML;
                NotRecvdqty = cells[7].innerHTML;
                Overqty = cells[8].innerHTML;
                Movetostock = cells[9].innerHTML;
                Cancelqty = cells[10].innerHTML;
                vendorname = cells[11].innerHTML;
                CostPrice = cells[12].innerHTML;
                Amount = cells[13].innerHTML;
                OrderID = cells[14].innerHTML;
                QuoteID = cells[15].innerHTML;
                VendorCode = cells[12].innerHTML;
                SellPrice = cells[17].innerHTML;
                Sno = cells[18].innerHTML;
                ID = cells[19].innerHTML;
                GPRate = cells[20].innerHTML;
                gpamount = cells[21].innerHTML;
                IMPA = cells[22].innerHTML;
                CustomerNote = cells[23].innerHTML;
                VendorNote = cells[24].innerHTML;



                cells[20].innerHTML = Math.round(Number((gpamount / (Amount ? Amount : 1)) * 100), 2);


                TxtTotalQty += Number(Orderqty);
                TxtTotalRecQty += Number(Recvdqty);
                TxtTotalNotRecQty += Number(NotRecvdqty);
                TxtOverQty += Number(Overqty);
                TxtTotalGPAmt += Number(gpamount);

            }


            $('#TxtTotalQty').val(TxtTotalQty);
            $('#TxtTotalRecQty').val(TxtTotalRecQty);
            $('#TxtTotalNotRecQty').val(TxtTotalNotRecQty);
            $('#TxtTotOverQty').val(TxtOverQty);
            // $('#TxtTotalGPAmt').val(TxtTotalGPAmt);
            Calcu();
        }



        $(document).on("click", "#CmdSave", function() {
            deilver();
            let status = document.getElementById("status").value;
            let Description = document.getElementById('Description').value;
            let POdate = document.getElementById('POdate').value;
            let TxtReqDate = document.getElementById('TxtReqDate').value;
            let TxtReqTime = document.getElementById('TxtReqTime').value;
            let TotalQty = document.getElementById("TxtTotalQty").value;
            let TotalRecQty = document.getElementById("TxtTotalRecQty").value;
            let TotalNotRecQty = document.getElementById("TxtTotalNotRecQty").value;
            let TxtTotOverQty = document.getElementById("TxtTotOverQty").value;
            let Bankinfo = document.getElementById("Bankinfo").value;
            let VendorActCode = document.getElementById("VendorActCode").value;
            let TxtBillingCompany = document.getElementById("TxtBillingCompany").value;
            let TxtBillingAddress = document.getElementById("TxtBillingAddress").value;
            // let VATPer = document.getElementById("VATPER").value;
            // let VATAmt = document.getElementById("VATAmt").value;
            let TxtNetAmount = $('#TxtNetAmount').val();
            let TxtVendorRefNo = $('#TxtVendorRefNo').val();
            let TxtLink1 = $('#TxtLink1').val();
            let TxtLink2 = $('#TxtLink2').val();
            let TxtLink3 = $('#TxtLink3').val();
            let TxtLink4 = $('#TxtLink4').val();
            let TxtLink5 = $('#TxtLink5').val();
            let TxtLink6 = $('#TxtLink6').val();
            let TxtVendorComments = $('#TxtVendorComments').val();
            let RestockingCharges = $('#RestockingCharges').val();
            let TxtPurchaseReturn = $('#TxtPurchaseReturn').val();
            let TotalReturnAmount = TxtPurchaseReturn;
            let TxtExchangeRateAdjustment = $('#TxtExchangeRateAdjustment').val();
            if (TxtNetAmount === '') {
                $('#TxtNetAmount').val(0);
            }
            TxtNetAmount = $('#TxtNetAmount').val();
            let TxtAtten = document.getElementById("TxtAtten").value;
            let InvDiscAmt = document.getElementById("TxtDiscAmt").value;
            let InvDiscPer = document.getElementById("TxtDiscPer").value;
            let Terms = document.getElementById("TxtTerms").value;
            let DeliveryOrderNo = document.getElementById("DeliveryOrderNo").value;
            let DeliveryCharges = document.getElementById("TxtDeliveryCharges").value;
            // let PaidAmt = document.getElementById("PaidAmt").value;
            // let ReceivedAmt = document.getElementById("ReceivedAmt").value;
            // let CostAmt = document.getElementById("CostAmt").value;
            // let GPCostAmt = document.getElementById("TxtGPCostAmt").value
            // let TotGPAmt = document.getElementById("TotGPAmt").value
            // let TxtGPPer = document.getElementById("TotGPAmt").value
            // // alert(deliveryTime);

            let GodownCode = $('#txtGodownCode').val();
            let VendorName = $('#TxtVendorName').val();
            let VendorCode = $('#TxtVendorCode').val();
            let ChargeNo = $('#lblCharge').text();
            let vsno = $('#lblVSN').text();
            let Pono = $('#PONO').val();
            let DispatchDate = $('#txtDispatchDate').val();
            let DispatchTime = $('#txtDispatchTime').val();
            let OrderDate = $('#orderdate').val();
            let DepartmentName = $('#lblDepartment').text();
            let CustomerActCode = $('#txtCustomerActCode').val();;
            let RefNo = $('#lblCustomerrefno').text();
            let EventNo = $('#lblEventno').text();
            let QuoteNo = $('#lblQuoteNo').text();
            let CustomerCode = $('#txtCustomerCode').val();
            let CustomerName = $('#lblCustomer').text();
            let VesselName = $('#lblVessel').text();
            let MPurCode = '{{ $FixAccountSetup ? $FixAccountSetup->ActPurchaseCode : '' }}';
            let MPORecDirectSupplyCode = '{{ $FixAccountSetup ? $FixAccountSetup->PORecDirectSupplyCode : '' }}';
            let MCashCode = '{{ $FixAccountSetup ? $FixAccountSetup->ActCashCode : '' }}';
            let MGSTCode = '{{ $FixAccountSetup ? $FixAccountSetup->GSTCode : '' }}';
            let MCOGSCode = '{{ $FixAccountSetup ? $FixAccountSetup->COGSCode : '' }}';
            let MDateDirectSupply = '{{ $FixAccountSetup ? $FixAccountSetup->DateDirectSupply : '' }}';
            let ChkPaymentPaid = 0;
            let OKToPay = 0;
            var TxtTerms = $('#TxtTerms option:selected').text();
            // alert(Pono);
            // alert(TxtTerms);
            if ($('#ChkReceivedCompleted').prop("checked") == false && TxtNetAmount > 0) {

                if (confirm("Have You Received Complete Quantity of this PO?  Received Completed ?")) {
                    $('#ChkReceivedCompleted').prop("checked", true);
                    ChkReceivedCompleted = 1;


                } else {
                    $('#ChkReceivedCompleted').prop("checked", false);

                    ChkReceivedCompleted = 0;
                }
            }
            if ($('#ChkPaymentPaid').prop("checked") == true) {
                ChkPaymentPaid = 1;
            } else {
                ChkPaymentPaid = 0;
            }
            if ($('#ChkOkToPay').prop("checked") == false) {
                OKToPay = 0;
            } else {
                OKToPay = 1;
            }

            if (OKToPay == 1 && TxtVendorRefNo == '') {
                Swal.fire(
                  'Bill # Not Found',
                  'Please Enter Vendor Bill # for OK to Pay',
                  'error'
                )
                $('#TxtVendorRefNo').focus();
                return;
            }
            if ($('#ChkNoCost').prop("checked") == true && TxtNetAmount > 0) {
                alert("NO COST Vendor. This is NO COST Vendor You Can Not Enter Any Amount In This PO");
                $('#TxtVendorName').focus();
                return;
            }
            // console.log('mpur'+MPurCode);
            if (MPurCode == '') {
                alert("Purchase Account Not Found. Plz Use Fix Account Setup");
                return;
            }
            if (TxtTerms === '') {
                alert("Terms Not Found. Please Select Terms First");
                $('#TxtTerms').focus();
                return;

            }
            // let MTerms = TxtTerms;
            if (Description === '') {
                let TxtDescriptionText = "PO Rcvd for " + VesselName + "/" + DepartmentName;
                $('#Description').val(TxtDescriptionText);
            }
            if (status === "") {
                alert('Please Select STATUS : "STATUS Not Found"');
                return;

            } else if (status === "INVOICED") {
                alert('Can Not Change Because Status is INVOICED : "Dont Have Permission to Change"');
                return;
            } else {
                console.log('mpur'+MPurCode);
                // $.ajax({
                //     type: "POST",
                //     url: "{{route('getvendorsetup')}}",
                //     data:{
                //     VendorCode,
                //     PONO,
                //     },
                // }).done(function(response) {
                    var VenderSetupterms = '';
                    var purchaseOrderNo = '';
                    console.log(VendorCode);
                    console.log($('#PONO').val());
                    $.ajax({
                    type: "GET",
                    url: "{{route('getvendorsetup')}}",
                    data: {
                        VendorCode: VendorCode,
                        PONO: $('#PONO').val()
                    },
                }).done(function(data) {
                    console.log(data);
                    if (data && data.VenderSetupterms && data.PurchaseOrderNo) {
                        VenderSetupterms = data.VenderSetupterms;
                        purchaseOrderNo = data.PurchaseOrderNo;
                    } else {
                        console.error("Invalid data received from server.");
                    }
                }).fail(function(xhr, status, error) {
                    console.error("AJAX request failed:", status, error);
                });



                  if (VenderSetupterms !== '') {
                    if (TxtTerms !== VenderSetupterms) {
                        if (confirm('This Terms Is Change, Do You Want To Change This Term')) {

                        } else {
                            $('#TxtTerms').focus();
                            return;
                        }
                    }
                }

                if ($('#ChkLocked').prop("checked") == true) {
                    var password = prompt(
                        "Invoice Is LOCKED due to (Paid Amount) or (OK To Pay is checked), Please enter Supervisor Password"
                    );
                    if (password === "332211") {
                        if (confirm("Are you sure you want to proceed?")) {
                            // proceed with action
                        } else {
                            alert("Access denied.");
                            return;
                        }
                    } else {
                        alert("Incorrect password.");
                        return;
                    }


                }
                if ($('#ChkReceivedCompleted').prop("checked") == true) {



                        if (purchaseOrderNo) {
                            var passwords = prompt(
                                "Invoice Is LOCKED due to (Paid Amount) or (OK To Pay is checked), Please enter Supervisor Password"
                            );
                            if (passwords === "332211") {
                                if (confirm("Are you sure you want to proceed?")) {
                                    // proceed with action
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

                let table = document.getElementById('Deliverytablebody');
                let rows = table.rows;
                let TxtTotalQty = 0;
                let TxtTotalRecQty = 0;
                let TxtTotalNotRecQty = 0;
                let TxtOverQty = 0;
                let TxtTotRtnQty = 0;
                let TxtTotMovetostock = 0;
                let TxtTotCancelqty = 0;
                let TxtTotalGPAmt = 0;
                let TxtTotCostAmt = 0;
                let PORecAmt = 0;
                let TotalCost = 0;
                let datas = [];
                for (let i = 0; i < rows.length; i++) {
                    let cells = rows[i].cells;
                    if ($('#Rcvd' + cells[19].innerHTML).prop("checked") == true) {


                        datas.push({


                            Rcvd: cells[0] ? 1 : '0',
                            Itemcode: cells[1] ? cells[1].innerHTML : '',
                            ItemName: cells[2] ? cells[2].innerHTML : '',
                            Puom: cells[3] ? cells[3].innerHTML : '',
                            Orderqty: cells[4] ? cells[4].innerHTML : '',
                            Recvdqty: cells[5] ? cells[5].innerHTML : '',
                            Returnqty: cells[6] ? cells[6].innerHTML : '',
                            NotRecvdqty: cells[7] ? cells[7].innerHTML : '',
                            Overqty: cells[8] ? cells[8].innerHTML : '',
                            Movetostock: cells[9] ? cells[9].innerHTML : '',
                            Cancelqty: cells[10] ? cells[10].innerHTML : '',
                            vendorname: cells[11] ? cells[11].innerHTML : '',
                            CostPrice: cells[12] ? cells[12].innerHTML : '',
                            Amount: cells[13] ? cells[13].innerHTML : '',
                            OrderID: cells[14] ? cells[14].innerHTML : '',
                            QuoteID: cells[15] ? cells[15].innerHTML : '',
                            VendorCode: cells[16] ? cells[12].innerHTML : '',
                            SellPrice: cells[17] ? cells[17].innerHTML : '',
                            Sno: cells[18] ? cells[18].innerHTML : '',
                            ID: cells[19] ? cells[19].innerHTML : '',
                            GPRate: cells[20] ? cells[20].innerHTML : '',
                            gpamount: cells[21] ? cells[21].innerHTML : '',
                            IMPA: cells[22] ? cells[22].innerHTML : '',
                            CustomerNote: cells[23] ? cells[23].innerHTML : '',
                            VendorNote: cells[24] ? cells[24].innerHTML : '',

                            TotalCost: ((Number(Recvdqty)) - (Number(Returnqty + Cancelqty + Movetostock)) *
                                CostPrice),

                        });
                        PORecAmt += Number(cells[13].innerHTML);
                    }


                }
                console.log(datas);

                if (datas.length < 1) {
                    alert('Please select Chk Received')
                    return;
                }


                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'post',
                    url: '{{ URL::to('porecived') }}',
                    data: {

                        datas,
                        TotalQty,
                        VendorName,
                        VendorCode,
                        TotalRecQty,
                        TotalNotRecQty,
                        DepartmentName,
                        status,
                        Bankinfo,
                        OrderDate,
                        ChkPaymentPaid,
                        Pono,
                        GodownCode,
                        TxtVendorRefNo,
                        TxtLink1,
                        TxtLink2,
                        TxtLink3,
                        TxtLink4,
                        TxtLink5,
                        TxtLink6,
                        Terms,
                        DeliveryCharges,
                        DeliveryOrderNo,
                        InvDiscPer,
                        TxtBillingCompany,
                        TxtBillingAddress,
                        POdate,
                        TxtVendorComments,
                        TxtReqTime,
                        TxtReqDate,
                        CustomerActCode,
                        InvDiscAmt,
                        OKToPay,
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
                        TxtNetAmount,
                        VendorActCode,
                        RestockingCharges,
                        TotalReturnAmount,
                        TxtPurchaseReturn,
                        TxtExchangeRateAdjustment,
                        PORecAmt,

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

                //     }).fail(function(data) {

                // });






            }




        });
        $(document).on("click", "#DeliverPrint", function() {
            let MInvNo = $('#PONO').val();
            let MVsn = $('#lblVSN').text();
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
