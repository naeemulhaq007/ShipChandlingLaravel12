@extends('layouts.app')



@section('title', 'Charge List VSN')

@section('content_header')
    <meta name="csrf-token" content="{{ csrf_token() }}" />

@stop

@section('content')
    <?php echo View::make('partials.Bankinforamation'); ?>

    </div>
    <div class="container-fluid ">
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

        <div class="card ">
            <div style="background-color:#EEE; " class="card-header">
                <div class="card-tools row">
                    <button {{-- data-toggle="modal" data-target="#BankInformaion" --}} id="BankInformationmod" class="border mx-1">Bank Information</button>
                    <button class="border mx-1">Billing Information</button>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>

                </div>
                <div class="row">
                    <h2 class="mr-5 text-blue text-bold">Charge List Of VSN</h2>
                    <div class="col-form-label row  ml-2 ">
                        <strong>VSN # :</strong> <label class="VSN text-blue"> <input type="number" name="VSn"
                                class="form-control" style="width: 80px; margin-top:-10px" id="VsnNo"
                                value="{{ $VSN }}"> </label>
                    </div>

                    <div class="col-form-label ml-5">
                        /&nbsp; <strong>Event # :&nbsp;</strong> <label class="event_no text-blue" id="event_no"
                            for="event_no"></label>

                    </div>
                    <div class="col-form-label ml-5">
                        /&nbsp; <strong>Customer :&nbsp;</strong> <label class="customer text-blue" id="customer"
                            for="customer"></label>

                    </div>
                    <div class="col-form-label ml-5">
                        /&nbsp; <strong>Vessel :&nbsp;</strong> <label class="vessel text-blue" id="vessel"
                            for="vessel"></label>

                    </div>
                    {{-- <div class="col-form-label ml-5">
                                /&nbsp;  <strong>Customer Ref # :&nbsp;</strong> <label class="customer_ref_no text-blue" for="customer_ref_no"></label>

                            </div> --}}
                    {{-- <div class="col-sm-2" style="margin-left: 150px">
                                <div class="row">

                                </div>
                            </div> --}}

                </div>



            </div>
            <div class="card-body">

                <div class="col-lg-12 pb-2">

                    <div class="row">

                        <div class="inputbox col-6 col-lg-1 col-sm-2 py-2">
                            <span class="Txtspan" id="">Delivery Date</span>
                            <input type="date" id="LblDeliveryDate" name="LblDeliveryDate">
                        </div>

                        <div class="inputbox col-6 col-lg-1 col-sm-2 py-2">
                            <span class="Txtspan" id="">Time</span>
                            <input type="time" id="TxtTime" name="TxtTime">
                        </div>


                        <div class="inputbox col-6 col-lg-1 col-sm-2 py-2">
                            <input type="text" value="" id="LblLocation" name="location" required>
                            <span class="">Location</span>
                        </div>

                        <div class="inputbox col-6 col-sm-2 py-2">
                            <span class="Txtspan" id="">Port</span>
                            <select name="" id="port">
                                <option value=""></option>
                                @foreach ($ShipingPortSetup as $item)
                                    <option value="{{ $item->PortCode }}">{{ $item->PortName }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="inputbox col-6 col-sm-2 py-2">
                            <span class="Txtspan" id="">WareHouse</span>

                            <select name="" id="CmbGodown">
                                <option value="">
                                </option>
                                @foreach ($Godown as $GodownCode => $GodownName)
                                    <option value="{{ $GodownCode }}">{{ $GodownName }}
                                    </option>
                                @endforeach
                            </select>

                        </div>

                        <div class="inputbox col-6 col-lg-1 col-sm-2 py-2">
                            <input type="text" id="LblEstValue" name="LblEstValue" required>
                            <span class="" id="">Ext Value Total</span>
                        </div>



                        <div class="inputbox col-6 col-lg-1 col-sm-2 py-2">
                            <input type="text" id="LblAOB" name="LblAOB" required>
                            <span class="" id="">AOB</span>
                        </div>

                        <input type="hidden" value="" id="TxtAgentCode" name="TxtAgentCode">
                        <input type="hidden" value="" id="TxtAgentCust" name="TxtAgentCust">

                        <div class="inputbox col-6 col-lg-1 col-sm-2 py-2">
                            <input type="text" value="" id="CmbAgentName" name="CmbAgentName" required>
                            <span class="" id="">Agency</span>
                        </div>

                        <div class="inputbox col-6 col-lg-1 col-sm-2 py-2">
                            <input type="text" value="" id="txtAgencyno" name="txtAgencyno" required>
                            <span class="" id="">Agency No</span>

                        </div>

                        <div class="inputbox col-6 col-lg-1 col-sm-2 py-2">

                            <input type="text" value="" id="TxtAgencyFax" name="TxtAgencyFax" required>
                            <span id="">Agency Fax </span>

                        </div>

                        <div class="inputbox col-6 col-lg-1 col-sm-2 py-2">

                            <input type="text" id="TxtAgencyEmail" name="TxtAgencyEmail" required>
                            <span id="">Agency Email</span>

                        </div>

                        <div class="inputbox col-6 col-lg-1 col-sm-2 py-2">

                            <input type="text" id="CmbAgentCP" name="CmbAgentCP" required>
                            <span id="">Agent C.P</span>

                        </div>




                        <div class="inputbox col-6 col-lg-1 col-sm-2 py-2">
                            <input type="text" value="" id="LblCellNo" name="LblCellNo">
                            <span id="">Cell No</span>
                        </div>


                        <div class="inputbox col-6 col-lg-1 col-sm-2 py-2">
                            <input type="text" value="" id="LblPhoneNo" name="LblPhoneNo">
                            <span id="">Phone No</span>

                        </div>


                        <div class="inputbox col-6 col-lg-1 col-sm-2 py-2">
                            <input type="text" value="" id="LblFaxNo" name="LblFaxNo">
                            <span id="">Fax No</span>

                        </div>


                        <div class="inputbox col-6 col-sm-2 py-2">
                            <input type="email" value="" id="LblEmailAddress" name="LblEmailAddress">
                            <span id="">Email Address</span>

                        </div>


                        <div class="inputbox col-6 col-sm-2 py-2">
                            <textarea name="LblNote" id="LblNote" rows="1"></textarea>
                            <span id="">Notes</span>

                        </div>



                        <div class="inputbox col-6 col-sm-3 py-2">
                            <textarea name="TxtEventNotes" id="TxtEventNotes" rows="1"></textarea>
                            <span id="">Event Note</span>

                        </div>

                        <div class="inputbox col-12 col-sm-3 py-2">
                            <textarea name="TxtVSNComments" id="TxtVSNComments" rows="1"></textarea>
                            <span id="">Customer Comments</span>
                        </div>

                        <div class="inputbox col-12 col-sm-3 py-2">
                            <textarea name="TxtWareHouseComments" id="TxtWareHouseComments" rows="1"></textarea>
                            <span class="" id="">WareHouse Comments</span>
                        </div>

                        <div class="inputbox col-12 col-sm-3 py-2">

                            <span class="Txtspan" id="">VSN Status</span>
                            <select name="CmbVsnStatus" id="CmbVsnStatus">
                                <option selected>Select one</option>
                                @foreach ($StatusSetup as $item)
                                    <option value="{{ $item->StatusName }}">{{ $item->StatusName }}</option>
                                @endforeach
                            </select>

                        </div>

                    </div>

                    <h5 id="LblBlock" style="display: none" class="text-danger">This Vessel Is Block You Cannot Create
                        Purchase Order Against This Vessel</h5>
                    <h5 id="LBLReturnDM" style="display: none" class="text-danger">Please Use DM for Return:</h5>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">

                <ul class="nav pb-2 ">


                    <li class="nav-link btn bg-info mr-1"><a data-toggle="pill" href="#Charges">Charges</a></li>
                    <li id="purchasetab" class="nav-link btn bg-info ml-1 mr-1"><a data-toggle="pill" href="#purchase">Purchase Order</a>
                    </li>
                    <li id="DMtab" class="nav-link btn bg-info ml-1 mr-1"><a data-toggle="pill" href="#dm">DM</a></li>
                    {{-- <li class="nav-link btn bg-info ml-1 "><a data-toggle="pill" href="#direct">Direct Invoice</a></li> --}}


                </ul>



                <div class="tab-content">
                    <div id="Charges" class="tab-pane  in active">

                        <div class="">
                            <div class="rounded shadow ">
                                <table class="table table-hover table-inverse table-responsive " id="chargestable">
                                    <thead class="bg-info">

                                        <tr scope="row">
                                            <th>Charge#</th>
                                            <th>Department</th>
                                            <th>H</th>
                                            <th style="width: 150px">Terms</th>
                                            <th style="width: 150px">Cust&nbsp;Ref</th>
                                            <th style="width: 150px">Buyer</th>
                                            <th style="width: 150px">Status</th>
                                            <th>Order&nbsp;Amount</th>
                                            <th>Order&nbsp;Qty</th>
                                            <th>Rcvd&nbsp;Qty</th>
                                            <th>Pull&nbsp;Qty</th>
                                            <th>Ready&nbsp;Qty</th>
                                            <th>Cancel&nbsp;Qty</th>
                                            <th>Dlvrd&nbsp;Qty</th>
                                            <th>Rtn&nbsp;Qty</th>
                                            <th>Missing&nbsp;Qty</th>
                                            <th>Sold&nbsp;Qty</th>
                                            <th>Sal&nbsp;Rtn</th>
                                            <th>Shipped</th>
                                            <th>QuoteNo</th>
                                            <th>Dlv/Inv&nbsp;Amt</th>
                                            <th>Cost&nbsp;Amt</th>
                                            <th>Gp&nbsp;Amt</th>
                                            <th>Gp&nbsp;%</th>
                                            <th>Pending&nbsp;PO</th>
                                        </tr>
                                    </thead>
                                    <tbody id="chargestablebody">

                                    </tbody>
                                </table>
                                <div class="row py-1">
                                    <div class="form-check form-check-inline ml-5">
                                        <label class="form-check-label text-info mx-1">
                                            <input class="form-check-input " type="checkbox" name="ChkKG"
                                                id="ChkKG" checked value=""> Show in KG
                                        </label>
                                    </div>
                                    <a name="" id="" class="btnrefresh btn btn-default text-success mx-1"
                                        role="button">Refresh</a>
                                    <div class="inputbox col-6  col-sm-2 py-2 ml-auto">
                                        <span class="Txtspan">Total Inv Amt</span>
                                        <input class=" " readonly type="number" name="TxtTotInvoiceAmt"
                                            id="TxtTotInvoiceAmt">
                                    </div>
                                    <div class="inputbox col-6 col-sm-2 py-2">
                                        <span class="Txtspan">Total Cost</span>
                                        <input class=" " readonly type="number" name="TxtTotCostAmt" id="TxtTotCostAmt">
                                    </div>
                                    <div class="inputbox col-6 col-sm-2 py-2">
                                        <span class="Txtspan">Total GP Amt</span>
                                        <input class=" " readonly type="number" name="TxtTotGPAmt" id="TxtTotGPAmt">
                                    </div>
                                    <div class="inputbox col-6 col-sm-2 py-2 mr-auto">
                                        <span class="Txtspan">Total GP %</span>
                                        <input class=" " readonly type="number" name="LBLGPPEr" id="LBLGPPEr">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="purchase" class="tab-pane  in fade">

                        <div class="">
                            <div class="rounded shadow ">
                                <table class="table table-hover table-inverse" id="purchasetable">
                                    <thead class="bg-info">
                                        <tr>
                                            <th>Charge&nbsp;#</th>
                                            <th style="width: 150px">Department</th>
                                            <th style="width: 150px">Po&nbsp;#</th>
                                            <th style="width: 150px">Vendor&nbsp;Name</th>
                                            <th style="width: 150px">Req&nbsp;Date</th>
                                            <th style="width: 150px">Time</th>
                                            <th style="width: 150px">Frgt</th>
                                            <th style="width: 150px">PO&nbsp;Date</th>
                                            <th style="width: 150px">PO&nbsp;Amount</th>
                                            <th style="width: 150px">Ship&nbsp;Via</th>
                                            <th style="width: 150px">Vendor&nbsp;Comment</th>
                                            <th>Order&nbsp;Qty</th>
                                            <th>Rec&nbsp;Qty</th>
                                            <th>Not&nbsp;Rec&nbsp;Qty</th>
                                            <th>Return&nbsp;Qty</th>
                                            <th>Cancel&nbsp;Qty</th>
                                            <th hidden>VendorCode</th>
                                            <th>Ok&nbsp;To&nbsp;Pay</th>
                                            <th hidden>Cost&nbsp;Amt</th>
                                            <th>GP&nbsp;Amount</th>
                                            <th>GP&nbsp;%</th>
                                        </tr>
                                    </thead>
                                    <tbody id="purchasetablebody"></tbody>
                                </table>
                                <div class="row py-1">
                                    <a name="" id="" class="btnrefresh btn btn-default text-success ml-5"
                                        role="button">Refresh</a>

                                    <input readonly class="form-control col-12 col-sm-2 col-sm-1 py-2 mx-auto" type="text" name="TxtTotPOAmt"
                                        id="TxtTotPOAmt">
                                </div>
                            </div>
                        </div>

                    </div>
                    {{-- <div id="contextMenu" class="context-menu" >
    <!-- Add your custom menu options here -->
    <ul>
        <li><span class='Gainsboro'></span>&nbsp;<span>Gainsboro </span></li>
        <li><span class='Orange'></span>&nbsp;<span>Orange</span></li>
        <li><span class='Plum'></span>&nbsp;<span>Plum</span></li>
    </ul>
  </div> --}}
                    <div id="dm" class="tab-pane  in fade">
                        <div class="">
                            <div class="rounded shadow">
                                <table class="table table-hover table-inverse" id="DMtable">
                                    <thead class="bg-info">

                                        <tr>
                                            <th>Charge&nbsp;#</th>
                                            <th>Department</th>
                                            <th>PO&nbsp;#</th>
                                            <th>Vendor&nbsp;Name</th>
                                            <th>Work&nbsp;User</th>
                                            <th>Status</th>
                                            <th>Rtn&nbsp;Qty</th>
                                            <th>Return&nbsp;Amt</th>
                                            <th>Rtn&nbsp;To&nbsp;Vendor</th>
                                            <th>Rtn&nbsp;To&nbsp;Vendor&nbsp;Amount</th>
                                            <th>Move&nbsp;To&nbsp;Stock</th>
                                            <th>Move&nbsp;To&nbsp;Stock&nbsp;Amount</th>
                                            <th>Missing&nbsp;Exp</th>
                                            <th>Missing&nbsp;Amount</th>
                                            <th>RTN&nbsp;Balance</th>

                                        </tr>
                                    </thead>
                                    <tbody id="DMtablebody">


                                    </tbody>
                                </table>

                                <div class="row mx-2 py-1">

                                    <input readonly class="form-control col-6 col-lg-1 py-2  col-sm-2 " type="text"
                                        name="TxtTOtalDeliveryAmount" id="TxtTOtalDeliveryAmount">
                                    <input readonly class="form-control col-6 col-lg-1 py-2 col-sm-2 " type="text"
                                        name="TxtTotalReturnAmount" id="TxtTotalReturnAmount">
                                    <input readonly class="form-control col-6 col-lg-1 py-2 col-sm-2 " type="text"
                                        name="TxtTotalreturnToVendorAmount" id="TxtTotalreturnToVendorAmount">
                                    <input readonly class="form-control col-6 col-lg-1 py-2 col-sm-2 " type="text"
                                        name="TxtTotalMoveToStockAmount" id="TxtTotalMoveToStockAmount">
                                    <input readonly class="form-control col-6 col-lg-1 py-2 col-sm-2 " type="text"
                                        name="TxtTotalMissingAmount" id="TxtTotalMissingAmount">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="direct" class="tab-pane  in fade">
                        <div class=" mx-auto">
                            <div class="rounded shadow ">


                            </div>
                        </div>

                    </div>


                </div>


                <div class="col-lg-12">
                    <div class="row py-1">

                        <input class="" type="hidden" name="hidpono" id="hidpono" value="">
                    </div>
                    <div class="row ">
                            <a name="" id="btnProforma" class="btn col-5 mx-1 my-2 col-lg-1 col-sm-2 form-control btn-default"
                                role="button">Proforma</a>
                            <a name="" id="" class="btn form-control col-5 mx-1 my-2 col-lg-1 col-sm-2 btn-default" href="#"
                                role="button">Ship Name</a>
                            <a name="" id="" class="btn form-control col-5 mx-1 my-2 col-lg-1 col-sm-2 btn-default" href="#"
                                role="button">Not
                                Recv RPT</a>
                            <a name="" id="" class="btn form-control col-5 mx-1 my-2 col-lg-1 col-sm-2 btn-default" href="#"
                                role="button">Pull Stock Rep</a>
                            <a name="" id="" class="btn form-control col-5 mx-1 my-2 col-lg-1 col-sm-2 btn-default" href="#"
                                role="button">Edit Vsn</a>
                            <a name="" id="" class="btn form-control col-5 mx-1 my-2 col-lg-1 col-sm-2 btn-default" href="#"
                                role="button">Order Status</a>
                            <a name="" id="" class="btn form-control col-5 mx-1 my-2 col-lg-1 col-sm-2 btn-default" href="#"
                                role="button">Direct Invoice</a>


                            <a name="" id="" class="btn col-5 mx-1 my-2 col-lg-1 col-sm-2 form-control btn-default" href="#"
                                role="button">Hazmate</a>
                            <a name="" id="" class="btn col-5 mx-1 my-2 col-lg-1 col-sm-2 form-control btn-default"
                                href="/ShipDr?VSN={{ $VSN }}" role="button">Shipped DR</a>
                            <a name="" id="" class="btn col-5 mx-1 my-2 col-lg-1 col-sm-2 form-control btn-default" href="#"
                                role="button">Order Transfer</a>
                            <a name="" id="" class="btn col-5 mx-1 my-2 col-lg-1 col-sm-2 form-control btn-default" href="#"
                                role="button">Order VSN GP</a>
                            <a name="" id="" class="btn col-5 mx-1 my-2 col-lg-1 col-sm-2 form-control btn-success" href="#"
                                role="button"><i class="fa fa-arrow-right" aria-hidden="true"></i> Send</a>
                            <a name="" id="" class="btn col-5 mx-1 my-2 col-lg-1 col-sm-2 form-control btn-danger" href="#"
                                role="button">Close</a>

                            <a name="" id="" class="btn col-5 mx-1 my-2 col-lg-1 col-sm-2 form-control btn-default" href="#"
                                role="button">Cost Print</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class='context-menu' id="charge-context-menu">
        <ul>
            <li id="createpo" data-link="purchase-order"><span>Create PO </span></li>
            {{-- <li id="PO-Received" data-link="PO-Received"><span>PO-Purchased </span></li> --}}
            <li id="deliveryorder" data-link="Delivery-Order"><span>Delivry Order</span></li>
            <li id="finalinvoice" data-link="Final-Invoice"> <span>Final Invoice</span></li>
            <li id="NotDeliveredFillReport" data-link="Not-Delivered-Fill-Report"> <span>Not Delivered Fill Report</span>
            </li>
            <li id="crnotewithitem" data-link="crnotewithitem"> <span>Cr. Note with item</span></li>
            <li id="cancelledcharge" data-link="cancelledcharge"> <span>Cancelled Charge</span></li>
            <li id="orderform" data-link="Order-form"> <span>Order Form</span></li>
            <li id="Pullstock" data-link="Pullstock"> <span>Pull Stock</span></li>
            <li id="ordertransfer" data-link="ordertransfer"> <span>Order Transfer & Copy</span></li>
            <li id="stockgatepass" data-link="Stock-Gate-Pass"> <span>Stock gate pass (Out Stock)</span></li>
            <li id="deletecharge" data-link="deletecharge"> <span>Delete Charge #</span></li>
        </ul>
    </div>
    <div class='context-menu' id="purchase-context-menu">
        <ul>
            <li id="PO-Received" data-link="PO-Received"><span>PO-Purchased</span></li>
        </ul>
    </div>


    <input type='hidden' value='' id='txt_id'>
    <input type='hidden' value='' id='txt_QuoteNo'>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
    <style>
        .context-menu {
            display: none;
            position: absolute;
            border: 1px solid black;
            border-radius: 3px;
            width: 210px;
            background: white;
            box-shadow: 10px 10px 5px #888888;
        }

        .context-menu ul {
            list-style: none;
            padding: 2px;
        }

        .context-menu ul li {
            padding: 5px 2px;
            margin-bottom: 3px;
            color: white;
            font-weight: bold;
            background-color: #30cee3;
        }

        .context-menu ul li:hover {
            cursor: pointer;
            background-color: #088ea0;
        }

        /* Colors */
        .Gainsboro,
        .Orange,
        .Plum {
            width: 15px;
            height: 15px;
            border: 0px solid black;
            display: inline-block;
            margin-right: 5px;
        }

        .Gainsboro {
            background-color: Gainsboro;
        }

        .Orange {
            background-color: Orange;
        }

        .Plum {
            background-color: Plum;
        }

        /* .custombtn {

            max-width: 7%;
            position: relative;
            width: 100%;
            margin-right: 5px;
        } */

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
        $(document).ready(function() {
            var table1 = $('#chargestable').DataTable({
                scrollY: 400,
                scrollX: true,
                scroller: true,
                searching: false,
                ordering: false,
                scrollX: true,
                paging: false,
                info: false,



            });
            var table2 = $('#purchasetable').DataTable({
                scrollY: 400,
                scrollX: true,
                deferRender: true,
                scroller: true,
                paging: false,
                info: false,
                ordering: false,
                searching: false,
                responsive: true
            });


            var table3 = $('#DMtable').DataTable({
                scrollY: 400,
                scrollX: true,
                deferRender: true,
                scroller: true,
                paging: false,
                info: false,
                ordering: false,
                searching: false,
                responsive: true,



            });



            $('#BankInformationmod').click(function(e) {
                e.preventDefault();

                Swaal.fire({
                    title: 'Changing BankInformation',
                    text: 'Please enter Admin Authentication!',
                    icon: 'question',
                    input: 'password', // Adding an input field for password
                    inputPlaceholder: 'Enter your password', // Placeholder for the input field
                    showCancelButton: true,
                    confirmButtonText: 'Open',
                    cancelButtonText: 'Cancel',
                    showLoaderOnConfirm: true, // You can display a loader animation while confirming
                    preConfirm: (password) => {
                        return new Promise((resolve, reject) => {
                            if (password === '332211') {
                                resolve();
                            } else {
                                reject('Incorrect password');
                            }
                        }).catch(error => {
                            Swal.showValidationMessage(`Error: ${error}`);
                        });
                    },
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#BankInformaion').modal('show');

                    }
                });



            });



            $('#btnProforma').click(function(e) {
                e.preventDefault();
                var ChkKG = '';
                var PONo = $('#hidpono').val();

                if ($("#ChkKG").is(":checked")) {
                    ChkKG = 'Y';
                }

                var link = "/PerformaInvoicePrint?ChkKG=" + ChkKG + "&PONo=" + PONo;
                window.open(link, '_blank')

            });
            var Vsnno = $('#VsnNo').val();
            if (Vsnno > 0) {
                // alert(Vsnno);
                Dataget();
            }


            $('#VsnNo').keydown(function(event) {
                if (event.keyCode === 13) {
                    event.preventDefault();
                    $('#VsnNo').blur();
                }

            });
            $('#VsnNo').blur(function(e) {
                e.preventDefault();
                if ($(this).val() > 0) {

                    Dataget();
                }

            });
            $('.btnrefresh').click(function(e) {
                e.preventDefault();
                if ($('#VsnNo').val() > 0) {

                    Dataget();
                }

            });

            function ajaxSetup() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            }

            $('#btnbanksave').click(function(e) {
                e.preventDefault();

                var VsnNo = $('#VsnNo').val();
                var TxtBankInfo = $('#TxtBankInfo').val();
                var dataarray = tabcomposer();
                ajaxSetup();
                $.ajax({
                    url: '/ChargeListBanksave',
                    type: 'POST',
                    data: {
                        VsnNo,
                        dataarray,
                        TxtBankInfo,
                    },
                    beforeSend: function() {
                        // Show the overlay and spinner before sending the request
                        $('.overlay').show();
                    },
                    success: function(resposne) {
                        Swaal.fire({
                            icon: 'success',
                            title: 'Success alert',
                            text: 'Bank Information ' + resposne.Message,
                            showConfirmButton: true,
                            timer: 1500
                        })
                    },
                    error: function(data) {
                        console.log(data);
                        Swaal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                            footer: '<a href>Why do I have this issue?</a>'
                        })
                        $('.overlay').hide();
                    },
                    complete: function() {
                        $('.overlay').hide();
                        // Hide the overlay and spinner after the request is complete
                    }



                });

            });


            function TotFps() {
                let table = document.getElementById('chargestablebody');
                let rows = table.rows;
                var TxtTotalChargeAmount = 0;
                var TxtTotPOAmount = 0;
                var TxtTOtalDeliveryAmount = 0;
                var TxtTotInvoiceAmt = 0;
                var TxtTotGPAmt = 0;
                var TxtTotCostAmt = 0;

                for (let i = 0; i < rows.length; i++) {
                    let cells = rows[i].cells;


                    var Charge = cells[0] ? cells[0].innerHTML : '';
                    var Department = cells[1] ? cells[1].innerHTML : '';
                    var H = cells[2] ? cells[2].innerHTML : '';
                    var Terms = cells[3] ? cells[3].innerHTML : '';
                    var CustRef = cells[4] ? cells[4].innerHTML : '';
                    var Buyer = cells[5] ? cells[5].innerHTML : '';
                    var Status = cells[6] ? cells[6].innerHTML : '';
                    var OrderAmount = cells[7] ? cells[7].innerHTML : '';
                    var OrderQty = cells[8] ? cells[8].innerHTML : '';
                    var RcvdQty = cells[9] ? cells[9].innerHTML : '';
                    var PullQty = cells[10] ? cells[10].innerHTML : '';
                    var ReadyQty = cells[11] ? cells[11].innerHTML : '';
                    var CancelQty = cells[12] ? cells[12].innerHTML : '';
                    var DlvrdQty = cells[13] ? cells[13].innerHTML : '';
                    var RtnQty = cells[14] ? cells[14].innerHTML : '';
                    var MissingQty = cells[15] ? cells[15].innerHTML : '';
                    var SoldQty = cells[16] ? cells[16].innerHTML : '';
                    var SalRtn = cells[17] ? cells[17].innerHTML : '';
                    var Shipped = cells[18] ? cells[18].innerHTML : '';
                    var QuoteNo = cells[19] ? cells[19].innerHTML : '';
                    var DlvInvAmt = cells[20] ? cells[20].innerHTML : '';
                    var CostAmt = cells[21] ? cells[21].innerHTML : '';
                    var GpAmt = cells[22] ? cells[22].innerHTML : '';
                    var Gpper = cells[23] ? cells[23].innerHTML : '';
                    var Pendingpo = cells[24] ? cells[24].innerHTML : '';

                    if (parseFloat(OrderAmount) > 0) {
                        TxtTotalChargeAmount += parseFloat(OrderAmount);
                    }
                    if (parseFloat(DlvInvAmt) < 1) {

                        TxtTotInvoiceAmt += TxtTotalChargeAmount;
                    }else{
                        TxtTotInvoiceAmt += parseFloat(DlvInvAmt);

                    }
                    TxtTotGPAmt += parseFloat(GpAmt);
                    TxtTotCostAmt += parseFloat(CostAmt);
                }
                TxtTotInvoiceAmt = parseFloat(TxtTotInvoiceAmt).toFixed(2)
                TxtTotGPAmt = parseFloat(TxtTotGPAmt).toFixed(2)
                TxtTotCostAmt = parseFloat(TxtTotCostAmt).toFixed(2)

                $('#TxtTotInvoiceAmt').val(TxtTotInvoiceAmt);
                $('#TxtTotGPAmt').val(TxtTotGPAmt);
                $('#TxtTotCostAmt').val(TxtTotCostAmt);
                var LBLGPPEr = TxtTotGPAmt / ((TxtTotInvoiceAmt == 0) ? 1 : TxtTotInvoiceAmt) * 100;
                $('#LBLGPPEr').val(parseFloat(LBLGPPEr).toFixed(2));

                let table2 = document.getElementById('purchasetablebody');
                let rows2 = table2.rows;
                var TxtTotPOAmount = 0;
                for (let i = 0; i < rows2.length; i++) {
                    let cells2 = rows2[i].cells;
                    var Charge = cells2[0] ? cells2[0].innerHTML : '';
                    var Department = cells2[1] ? cells2[1].innerHTML : '';
                    var Po = cells2[2] ? cells2[2].innerHTML : '';
                    var VendorName = cells2[3] ? cells2[3].innerHTML : '';
                    var ReqDate = cells2[4] ? cells2[4].innerHTML : '';
                    var Time = cells2[5] ? cells2[5].innerHTML : '';
                    var Frgt = cells2[6] ? cells2[6].innerHTML : '';
                    var PODate = cells2[7] ? cells2[7].innerHTML : '';
                    var POAmount = cells2[8] ? cells2[8].innerHTML : '';
                    var ShipVia = cells2[9] ? cells2[9].innerHTML : '';
                    var VendorComment = cells2[10] ? cells2[10].innerHTML : '';
                    var OrderQty = cells2[11] ? cells2[11].innerHTML : '';
                    var RecQty = cells2[12] ? cells2[12].innerHTML : '';
                    var NotRecQty = cells2[13] ? cells2[13].innerHTML : '';
                    var ReturnQty = cells2[14] ? cells2[14].innerHTML : '';
                    var CancelQty = cells2[15] ? cells2[15].innerHTML : '';
                    var VendorCode = cells2[16] ? cells2[16].innerHTML : '';
                    var OkToPay = cells2[17] ? cells2[17].innerHTML : '';
                    var CostAmt = cells2[18] ? cells2[18].innerHTML : '';
                    var GPAmount = cells2[19] ? cells2[19].innerHTML : '';
                    var GP = cells2[20] ? cells2[20].innerHTML : '';

                    TxtTotPOAmount += parseFloat(POAmount);
                }
                TxtTotPOAmount = parseFloat(TxtTotPOAmount).toFixed(2);
                $('#TxtTotPOAmount').val(TxtTotPOAmount);

                $('#TxtTotalReturnAmount').val('');
                $('#TxtTotalreturnToVendorAmount').val('');
                $('#TxtTotalMoveToStockAmount').val('');
                $('#TxtTotalMissingAmount').val('');

                var TxtTotalReturnAmount = 0;
                var TxtTotalreturnToVendorAmount = 0;
                var TxtTotalMoveToStockAmount = 0;
                var TxtTotalMissingAmount = 0;

                let table3 = document.getElementById('DMtablebody');
                let rows3 = table3.rows;
                for (let i = 0; i < rows3.length; i++) {
                    let cells3 = rows3[i].cells;
                    var Charge2 = cells3[0] ? cells3[0].innerHTML : '';
                    var Department2 = cells3[1] ? cells3[1].innerHTML : '';
                    var Po2 = cells3[2] ? cells3[2].innerHTML : '';
                    var VendorName2 = cells3[3] ? cells3[3].innerHTML : '';
                    var WorkUser = cells3[4] ? cells3[4].innerHTML : '';
                    var Status = cells3[5] ? cells3[5].innerHTML : '';
                    var RtnQty = cells3[6] ? cells3[6].innerHTML : '';
                    var ReturnAmt = cells3[7] ? cells3[7].innerHTML : '';
                    var RtnToVendor = cells3[8] ? cells3[8].innerHTML : '';
                    var RtnToVendorAmount = cells3[9] ? cells3[9].innerHTML : '';
                    var MoveToStock = cells3[10] ? cells3[10].innerHTML : '';
                    var MoveToStockAmount = cells3[11] ? cells3[11].innerHTML : '';
                    var MissingExp = cells3[12] ? cells3[12].innerHTML : '';
                    var MissingAmount = cells3[13] ? cells3[13].innerHTML : '';
                    var RTNBalance = cells3[14] ? cells3[14].innerHTML : '';

                    if (parseFloat(ReturnAmt) > 0) {
                        TxtTotalReturnAmount += parseFloat(ReturnAmt);
                    }
                    if (parseFloat(RtnToVendorAmount) > 0) {
                        TxtTotalreturnToVendorAmount += parseFloat(RtnToVendorAmount);
                    }
                    if (parseFloat(MoveToStockAmount) > 0) {
                        TxtTotalMoveToStockAmount += parseFloat(MoveToStockAmount);
                    }
                    if (parseFloat(MissingAmount) > 0) {
                        TxtTotalMissingAmount += parseFloat(MissingAmount);
                    }

                }
                $('#TxtTotalReturnAmount').val(parseFloat(TxtTotalReturnAmount).toFixed(2));
                $('#TxtTotalreturnToVendorAmount').val(parseFloat(TxtTotalreturnToVendorAmount).toFixed(2));
                $('#TxtTotalMoveToStockAmount').val(parseFloat(TxtTotalMoveToStockAmount).toFixed(2));
                $('#TxtTotalMissingAmount').val(parseFloat(TxtTotalMissingAmount).toFixed(2));



            }

            function tabcomposer() {
                let table = document.getElementById('chargestablebody');
                let rows = table.rows;

                let dataarray = [];
                for (let i = 0; i < rows.length; i++) {
                    let cells = rows[i].cells;

                    dataarray.push({
                        Charge: cells[0] ? cells[0].innerHTML : '',
                        Department: cells[1] ? cells[1].innerHTML : '',
                        H: cells[2] ? cells[2].innerHTML : '',
                        Terms: cells[3] ? cells[3].innerHTML : '',
                        CustRef: cells[4] ? cells[4].innerHTML : '',
                        Buyer: cells[5] ? cells[5].innerHTML : '',
                        Status: cells[6] ? cells[6].innerHTML : '',
                        OrderAmount: cells[7] ? cells[7].innerHTML : '',
                        OrderQty: cells[8] ? cells[8].innerHTML : '',
                        RcvdQty: cells[9] ? cells[9].innerHTML : '',
                        PullQty: cells[10] ? cells[10].innerHTML : '',
                        ReadyQty: cells[11] ? cells[11].innerHTML : '',
                        CancelQty: cells[12] ? cells[12].innerHTML : '',
                        DlvrdQty: cells[13] ? cells[13].innerHTML : '',
                        RtnQty: cells[14] ? cells[14].innerHTML : '',
                        MissingQty: cells[15] ? cells[15].innerHTML : '',
                        SoldQty: cells[16] ? cells[16].innerHTML : '',
                        SalRtn: cells[17] ? cells[17].innerHTML : '',
                        Shipped: cells[18] ? cells[18].innerHTML : '',
                        QuoteNo: cells[19] ? cells[19].innerHTML : '',
                        DlvInvAmt: cells[20] ? cells[20].innerHTML : '',
                        CostAmt: cells[21] ? cells[21].innerHTML : '',
                        GpAmt: cells[22] ? cells[22].innerHTML : '',
                        Gpper: cells[23] ? cells[23].innerHTML : '',
                        Pendingpo: cells[24] ? cells[24].innerHTML : '',

                    });
                }
                return dataarray;
            }

            function Dataget() {
                ajaxSetup();
                var VsnNo = $('#VsnNo').val();

                $.ajax({
                    url: "{{ route('ChargeListVsnGet') }}",
                    type: 'POST',
                    data: {
                        VsnNo,
                    },
                    beforeSend: function() {
                        // Show the overlay and spinner before sending the request
                        $('.overlay').show();
                    },
                    success: function(resposne) {
                        console.log(resposne);
                        var master = resposne.ViewFTVANDVS;
                        var BankInfo = resposne.BankInfo;
                        var AgentSetup = null;
                        if (resposne.Masterdata) {
                            AgentSetup = resposne.Masterdata[0].AgentSetup;
                        }
                        // console.log(master.DueTime);
                        $('#event_no').text(master.EventNo);
                        $('#customer').text(master.CustomerName);
                        $('#vessel').text(master.VesselName);
                        var qchekdate = new Date(master.DeliveryDate);
                        const deliverydate = qchekdate.toISOString().substring(0, 10);
                        $('#LblDeliveryDate').val(deliverydate);
                        if (master.DueTime) {
                            const TimeTime = new Date(master.DueTime);
                            const hours = TimeTime.getHours().toString().padStart(2, '0');
                            const minutes = TimeTime.getMinutes().toString().padStart(2, '0');
                            const currentTimeFormatted = hours + ':' + minutes;
                            $('#TxtTime').val(currentTimeFormatted);
                        }
                        $('#LblLocation').val(master.Location);
                        $('#LblEstValue').val(master.FlipAmount ? parseFloat(master.FlipAmount).toFixed(
                            2) : 0);
                        let branch = '{{ $BranchCode }}';
                        if (branch == '8') {
                            $('#LblAOB').val('USA');

                        }
                        $('#TxtAgentCust').val(master.Agency);
                        $('#CmbAgentName').val(master.Agent);
                        $('#TxtAgentCode').val(master.AgentCode);
                        $('#TxtWareHouseComments').val(master.WareHouseComments);
                        $('#CmbGodown').val(master.GodownCode);
                        $('#TxtVSNComments').val(master.Comments);
                        $('#CmbPort').val(master.Port);
                        $('#CmbVsnStatus').val(master.Status);
                        $('#TxtEventNotes').val(master.Note);
                        let MMBlock = master.Block ? master.Block : "";
                        if (MMBlock == 'Y') {
                            $('#LblBlock').show();
                            $('#BTNBlock').show();
                        } else {
                            $('#LblBlock').hide();
                            $('#BTNBlock').hide();

                        }
                        $('#TxtAgentCPCode').val(master.AgentCPCode);
                        $('#CmbAgentCP').val(master.AgentCPName);
                        if (AgentSetup) {

                            $('#TxtAgentCust').val(AgentSetup.CusCode);
                            $('#TxtAgentCode').val(AgentSetup.CustomerCode);
                            $('#txtAgencyno').val(AgentSetup.PhoneNo);
                            $('#TxtAgencyFax').val(AgentSetup.Faxno);
                            $('#TxtAgencyEmail').val(AgentSetup.emailaddress);

                        } else {
                            $('#TxtAgentCust').val('');
                            $('#TxtAgentCode').val('');
                            $('#txtAgencyno').val('');
                            $('#TxtAgencyFax').val('');
                            $('#TxtAgencyEmail').val('');

                        }
                        if (BankInfo) {
                            $('#TxtBankInfo').val(BankInfo.BankInfo);

                        }

                        // const TimeTime = new Date(master.DueTime);
                        // const hours = TimeTime.getHours().toString().padStart(2, '0');
                        // const minutes = TimeTime.getMinutes().toString().padStart(2, '0');
                        // const currentTimeFormatted = hours + ':' + minutes;


                        var data = resposne.Charge;

                        var TxtTotPOAmt = 0;
                        let table = document.getElementById('chargestablebody');
                        if (data.length > 0) {
                            $('#CmbStatus').val(data[0].Status);
                            table.innerHTML = "";
                            data.forEach(function(item) {
                                let row = table.insertRow();
                                row.setAttribute("data-PONo", item.PONo);
                                row.setAttribute("data-status", item.Status);
                                // row.setAttribute("data-eventno", item.Status);
                                row.setAttribute("data-QuoteNo", item.QuoteNo);

                                function createCell(content) {
                                    let cell = row.insertCell();
                                    cell.innerHTML = content;
                                    return cell;
                                }
                                let PONo = createCell(item.PONo);
                                PONo.style.color = 'Yellow'
                                PONo.style.backgroundColor = 'blue'

                                createCell(item.DepartmentName);

                                let hasmate = createCell('');
                                hasmate.innerHTML = item.HasMate ? item.HasMate : '';
                                createCell(item.Terms);
                                // let customerref = createCell('');
                                createCell(item.PurchaseOrderNo ? item.PurchaseOrderNo : '');
                                createCell(item.Buyer);
                                let MStatusColorCode  = item.StatusColorCode;
                                 let Status = createCell(item.Status);
                                 if(MStatusColorCode !== ''){
                                    if (MStatusColorCode == '-10900225') {
                                        Status.style.backgroundColor = "rgba(99,183,255,1.00)";
                                    }
                                    else if (MStatusColorCode == '-8323073') {
                                        Status.style.backgroundColor = "rgba(127,0,255,1.00)";
                                    }
                                    else if (MStatusColorCode == '-15154944') {
                                        Status.style.backgroundColor = "rgba(34,34,170,1.00)";
                                        Status.style.color = 'Yellow';

                                    }
                                    else if (MStatusColorCode == '-8323200') {
                                        Status.style.backgroundColor = "rgba(127,0,128,1.00)";
                                    }
                                    else if (MStatusColorCode == '-32640') {
                                        Status.style.backgroundColor = "rgba(255,128,255,1.00)";
                                    }
                                    else if (MStatusColorCode == '-128') {
                                        Status.style.backgroundColor = "rgba(128,128,128,1.00)";
                                    }

                                }else{
                                    Status.style.backgroundColor = "white";
                                }
                                createCell(parseFloat(item.ExtAmount ? item.ExtAmount :
                                    0).toFixed(2)).style.textAlign = 'right';
                                createCell(parseFloat(item.ORDQTY ? item.ORDQTY : 0)
                                    .toFixed(2));
                                createCell(item.ReceivedQty ? item.ReceivedQty : 0);
                                createCell(item.PulQty ? item.PulQty : 0);
                                createCell(item.ReceivedQty ? item.ReceivedQty : 0);
                                createCell(item.CancQty ? item.CancQty : 0);
                                createCell(item.DelivQty ? item.DelivQty : 0);
                                createCell(item.RetuQty ? item.RetuQty : 0);
                                createCell(item.MissQty ? item.MissQty : 0);
                                createCell(item.SolQty ? item.SolQty : 0);
                                createCell(item.SaleReturnQty ? item.SaleReturnQty : 0);
                                createCell(item.ChkShipped);
                                createCell(item.QuoteNo);
                                createCell(parseFloat(item.LblNetAmount ? item.LblNetAmount : 0).toFixed(2)).style.textAlign = 'right';
                                let MCostAmt = item.CostAmount ? item.CostAmount : 0;
                                createCell(MCostAmt).style.textAlign = 'right';
                                createCell(item.GPAmount ? item.GPAmount : 0).style.textAlign = 'right';
                                let percentagec = (parseFloat(item.GPAmount ? item.GPAmount : 1) / (parseFloat(item.ExtAmount) == 0 ? 1 : parseFloat(item.ExtAmount)) *
                                    100);
                                    percentagec = parseFloat(percentagec ? percentagec : 0).toFixed(2);
                                createCell(percentagec+'%');
                                let MPendingPO = createCell('');
                                if (MPendingPO) {
                                    MPendingPO.innerHTML = item.MPendingPO ? item.MPendingPO : '';
                                }

                            });
                            TotFps();
                        }



                        table1.columns.adjust();
                        table2.columns.adjust();
                        table3.columns.adjust();
                        table3.columns.adjust();
                        $('#chargestablebody tr').click(function() {
                            if ($(this).hasClass('selected')) {
                                $(this).removeClass('selected');
                                $('#hidpono').val('');
                            } else {
                                table1.$('tr.selected').removeClass('selected');
                                $(this).addClass('selected');
                                var PONo = $(this).attr('data-PONo');
                                $('#hidpono').val(PONo);
                            }

                        });
                        $('#chargestablebody tr').dblclick(function() {
                            var PONo = $(this).attr('data-PONo');
                            // var status = $(this).attr('data-status');
                            window.open("/OrderEntry?Order_no=" + PONo, "_blank");
                        });
                        $("#chargestablebody tr").bind('contextmenu', function(e) {
                            var id = this.id;
                            $PONo = $(this).attr("data-PONo");
                            var status = $(this).attr('data-status');
                            var QuoteNo = $(this).attr('data-QuoteNo');

                            // alert($PONo);
                            $("#txt_id").val(status);
                            $("#txt_QuoteNo").val(QuoteNo);

                            var top = e.pageY - 50;
                            var left = e.pageX;

                            // Show contextmenu
                            $("#charge-context-menu").toggle(100).css({
                                top: top + "px",
                                left: left + "px"
                            });

                            // Disable default context menu
                            return false;
                        });

                        // Hide context menu
                        $(document).bind('contextmenu click', function() {
                            $("#charge-context-menu").hide();
                            $("#txt_id").val("");
                            $("#txt_QuoteNo").val("");
                            // alert($PONo);

                        });

                        // Disable context-menu from custom menu
                        $('#charge-context-menu').bind('contextmenu', function() {
                            return false;
                        });

                        // Clicked context-menu item
                        $('#charge-context-menu li').click(function() {
                            var className = $(this).attr("data-link");
                            var status = $('#txt_id').val();
                            var txt_QuoteNo = $('#txt_QuoteNo').val();
                            var EventNo = $('#event_no').text();
                            $("#charge-context-menu").hide();
                            if (className == 'deletecharge') {

                                return chargedeletefunc();
                            }
                            else if (className == 'Order-form') {

                                window.open("/Order?QuoteNo="+ txt_QuoteNo +"&EventNo=" + EventNo, "_blank");
                            }
                            else if (status !== 'CANCELLED') {
                                window.open("/" + className + "?PONO=" + $PONo, "_blank");
                            } else {
                                Swaal.fire({
                                    icon: 'error',
                                    title: 'Order Cancelled',
                                    text: 'Order is Cancelled!',
                                    footer: '<a href>Why do I have this issue?</a>'
                                })
                            }
                        });


                        TotFps()
                    },
                    error: function(data) {
                        console.log(data);
                        Swaal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                            footer: '<a href>Why do I have this issue?</a>'
                        })
                        $('.overlay').hide();
                    },
                    complete: function() {
                        $('.overlay').hide();
                        // Hide the overlay and spinner after the request is complete
                    }


                });
            }




            $('#purchasetab').click(function (e) {
                e.preventDefault();
                ajaxSetup();
                var VsnNo = $('#VsnNo').val();

                    $.ajax({
                        url: "{{ route('chargelistPOShow') }}",
                        type: 'POST',
                        data: {
                            VsnNo,
                        },
                        beforeSend: function() {
                            // Show the overlay and spinner before sending the request
                            $('.overlay').show();
                        },
                        success: function(resposne) {
                            console.log(resposne);
                            if (resposne) {

                            var dataPO = resposne.SPVSNPO;
                    //         var MMPOAmt = resposne.VSNPO.MMPOAmt;
                            if (dataPO.length > 0) {
                            let tablep = document.getElementById('purchasetablebody');
                            var TxtTotPOAmt = 0
                            tablep.innerHTML = "";
                            dataPO.forEach(function(itemP) {
                                let rowp = tablep.insertRow();
                                rowp.setAttribute("data-PONo", itemP.PurchaseOrderNo);
                                rowp.setAttribute("id", itemP.ChargeNo);

                                function createCell(content) {
                                    let cellp = rowp.insertCell();
                                    cellp.innerHTML = content;
                                    return cellp;
                                }
                                let ChargeNoP = createCell(itemP.ChargeNo);
                                ChargeNoP.style.color = 'Yellow'
                                ChargeNoP.style.backgroundColor = 'blue'

                                createCell(itemP.DepartmentName);
                                createCell(itemP.PurchaseOrderNo);

                                let VendorName = createCell(itemP.VendorName);
                                if (itemP.VendorName == 'CASH') {
                                    VendorName.style.backgroundColor = 'Pink';
                                }
                                var ReqDatecell = createCell('');
                                if (itemP.ReqDate) {
                                    var ReqDatedata = new Date(itemP.ReqDate);
                                    const ReqDate = ReqDatedata.toISOString().substring(0, 10);
                                    ReqDatecell.innerHTML = ReqDate;
                                }



                                let MChkCancelled = itemP.ChkCancelledPO ? itemP.ChkCancelledPO : false;

                                let DGTime = createCell('');
                                if (MChkCancelled == true) {
                                    DGTime.innerHTML = 'CANCELLED';
                                    DGTime.style.Color = 'red';
                                } else {
                                    DGTime.innerHTML = itemP.TIME;
                                    DGTime.style.Color = 'black';
                                }
                                if (itemP.SplitPONo !== null && itemP.SplitPONo !== "" && parseFloat(itemP.SplitPONo) > 0
                                ) {
                                    DGTime.innerHTML = (itemP.SplitPONo !== null) ?
                                        parseFloat(itemP.SplitPONo) : "";
                                }
                                // if ((parseFloat(itemP.OrderQty) - parseFloat(itemP.OrderQty)) <= 0) {
                                //     DGTime.innerHTML = 'CANCELLED';
                                //     DGTime.style.Color = 'red';
                                // } else {
                                //     DGTime.innerHTML = itemP.Time;
                                //     DGTime.style.Color = 'black';
                                // }

                                createCell(itemP.Freight);

                                var PoDatecell = createCell('');
                                if (itemP.PoDate) {
                                    var PoDatedata = new Date(itemP.PoDate);
                                    const PoDate = PoDatedata.toISOString().substring(0, 10);
                                    PoDatecell.innerHTML = PoDate;

                                }

                                createCell(parseFloat(itemP.NetAmount ? itemP.NetAmount : 0).toFixed(2));
                                createCell(itemP.ShipVia);
                                createCell(itemP.VendorComment);
                                createCell(itemP.OrderQty);
                                createCell(itemP.RecQty);
                                let NotRecQty = createCell('');
                                NotRecQty.innerHTML = parseFloat(itemP.OrderQty ? itemP.OrderQty : 0) - parseFloat(itemP.RecQty ? itemP.RecQty : 0) + parseFloat(itemP
                                    .CancelQty ? itemP.CancelQty : 0);
                                createCell(itemP.ReturnQty ? itemP.ReturnQty : 0);
                                createCell(itemP.CancelQty).style.Color = 'red';

                                let OKTOPay = createCell('');
                                if (itemP.OKTOPay) {
                                    OKTOPay.innerHTML = 'Yes';
                                } else {
                                    OKTOPay.innerHTML = 'No';
                                }
                                TxtTotPOAmt += parseFloat(itemP.NetAmount ? itemP.NetAmount : 0);

                                createCell(itemP.VendorActCode).hidden = true;
                                createCell(itemP.NetAmount).hidden = true;


                                let MBalanceAmt = parseFloat(itemP.NetAmount) -
                                    parseFloat(itemP.TotalReturnAmount ? itemP.TotalReturnAmount : 0);
                                let POGPAmt = parseFloat((MBalanceAmt ? MBalanceAmt : 0) -
                                    parseFloat(itemP.MMPOAmt ? itemP.MMPOAmt : 0)).toFixed(
                                    2);
                                createCell(POGPAmt);
                                let percentage = (parseFloat(POGPAmt) / (parseFloat(itemP
                                        .MMPOAmt) == 0 ? 1 : parseFloat(itemP.MMPOAmt)) *
                                    100);
                                    // console.log(percentage);
                                createCell(parseFloat(percentage ? percentage : 0).toFixed(2));

                            });
                            table2.columns.adjust();
                            $('#TxtTotPOAmt').val(TxtTotPOAmt);
                        }
                    }







                        $("#purchasetablebody tr").bind('contextmenu', function(e) {
                            var id = this.id;
                            $PONo = $(this).attr("data-PONo");
                            $("#txt_id").val(id);

                            var top = e.pageY - 50;
                            var left = e.pageX;

                            // Show contextmenu
                            $("#purchase-context-menu").toggle(100).css({
                                top: top + "px",
                                left: left + "px"
                            });

                            // Disable default context menu
                            return false;
                        });

                        // Hide context menu
                        $(document).bind('contextmenu click', function() {
                            $("#purchase-context-menu").hide();
                            // alert($PONo);

                            $("#txt_id").val("");
                        });

                        // Disable context-menu from custom menu
                        $('#purchase-context-menu').bind('contextmenu', function() {
                            return false;
                        });

                        // Clicked context-menu item
                        $('#purchase-context-menu li').click(function() {
                            var className = $(this).attr("data-link");
                            var titleid = $('#txt_id').val();
                            var cid = $("#txt_id").val();
                            // console.log(cid);
                            $("#purchase-context-menu").hide();
                            window.open("/" + className + "?PONO=" + $PONo + '&charge=' + cid,
                                "_blank");
                        });
                        TotFps();
                        },
                        error: function(data) {
                        console.log(data);
                        Swaal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                            footer: '<a href>Why do I have this issue?</a>'
                        })
                        $('.overlay').hide();
                    },
                    complete: function() {
                        $('.overlay').hide();
                        // Hide the overlay and spinner after the request is complete
                    }


                });
            });
            $('#DMtab').click(function (e) {
                e.preventDefault();
                ajaxSetup();
                var VsnNo = $('#VsnNo').val();

                    $.ajax({
                        url: "{{ route('chargelistDMShow') }}",
                        type: 'POST',
                        data: {
                            VsnNo,
                        },
                        beforeSend: function() {
                            // Show the overlay and spinner before sending the request
                            $('.overlay').show();
                        },
                        success: function(resposne) {
                            console.log(resposne);
                            if (resposne) {

                                var dataD = resposne.DMDetail;
                                if (dataD.length > 0) {

                            let tables = document.getElementById('DMtablebody');
                            tables.innerHTML = "";
                            dataD.forEach(function(itemD) {
                                let rows = tables.insertRow();

                                function createCell(content) {
                                    let cells = rows.insertCell();
                                    cells.innerHTML = content;
                                    return cells;
                                }
                                let ChargeNo = createCell(itemD.ChargeNo);
                                ChargeNo.style.color = 'Yellow'
                                ChargeNo.style.backgroundColor = 'blue'
                                createCell(itemD.DepartmentName);
                                createCell(itemD.POMadeNo);
                                createCell(itemD.VendorName);
                                createCell(itemD.WorkUser);
                                let DMStatus = createCell('');

                                createCell(itemD.MReturnQty);
                                createCell(itemD.MReturnCostAmt);
                                createCell(itemD.DMReturnQty);
                                createCell(itemD.DMReturnAmt);
                                createCell(itemD.DMMoveToStock);
                                createCell(itemD.DMMoveToStockAmt);
                                createCell(itemD.DMMissingQty);
                                createCell(itemD.DMMissingAmt);

                                let MReturnQty = parseFloat(itemD.MReturnQty);
                                let MReturnToVendor = parseFloat(itemD.DMReturnQty);
                                let MMoveToStock = parseFloat(itemD.DMMoveToStock);
                                let MMissing = parseFloat(itemD.DMMissingQty);
                                let DMRTNBal = parseFloat(MReturnQty - (MReturnToVendor +
                                    MMoveToStock + MMissing));
                                createCell(DMRTNBal ? DMRTNBal : 0).style.align = 'right';

                                if (DMRTNBal > 0) {
                                    DMStatus.innerHTML = 'Pending';
                                    $('#LBLReturnDM').show();
                                } else {
                                    DMStatus.innerHTML = 'Completed';
                                }



                            });
                        }
                    }


                        },
                        error: function(data) {
                        console.log(data);
                        Swaal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                            footer: '<a href>Why do I have this issue?</a>'
                        })
                        $('.overlay').hide();
                    },
                    complete: function() {
                        $('.overlay').hide();
                        // Hide the overlay and spinner after the request is complete
                    }


                });
            });

        });

        function chargedeletefunc() {
            alert('delete');
        }
    </script>
@stop


@section('content')
