@extends('layouts.app')



@section('title', 'Order')

@section('content_header')
@stop


@section('content')
    @if (\Session::has('fliped'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>{!! \Session::get('fliped') !!}</strong>
        </div>
    @endif
    </div>

    {{-- <form action="/Order/{{$QuoteNo}}/Save" method="post"> --}}
    {{-- @csrf --}}
    <div class="container-fluid pt-2">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <h2 class="text-blue  text-bold">ORDER FORM</h2>

                    <div class="card-tools ml-auto">
                        <div class="row">
                            <a name="" id="minus" class="btn btn-info  mr-1 " role="button"><i
                                    class="fa fa-arrow-circle-left" aria-hidden="true"></i></a>
                            <div class="inputbox ">
                                <span class="Txtspan" id="">Quote#</span>

                                <input class="" type="tel" id="caps" name="Quote"
                                    value="{{ $QuoteNo }}">

                            </div>
                            <a name="" id="plus" class="btn btn-info mx-1 " role="button"><i
                                    class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>

                            <a name="" id="" class="btn btn-secondary" role="button">Billing
                                Information</a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="card-header" style="background-color:#EEE; ">
                <div class="card-tools ">

                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
                <div class="row">

                    <div class="ml-2 d-flex align-items-center">
                        <strong>VesselName :</strong>&nbsp;

                        <div class="cut-textf">
                            <label class="VesselName col-form-label text-blue">Your Vessel Name Here</label>
                        </div>
                    </div>
                    <div class="ml-5 d-flex align-items-center">
                        /&nbsp;<strong>CustomerName :</strong>&nbsp;
                        <div class="cut-textf">
                            <label class="CustomerName col-form-label text-blue">Your Customer Name Here</label>
                        </div>
                    </div>


                    <div class="ml-5 d-flex align-items-center">
                        /&nbsp;<strong>VSNNo #:</strong> &nbsp;
                        <div class="cut-text">
                            <label class="VSNNo  col-form-label text-blue" for="VSNNo"></label>
                        </div>
                    </div>
                    <div class="ml-5 d-flex align-items-center">
                        /&nbsp; <strong>Charge :</strong> &nbsp;
                        <div class="cut-text">
                            <label class="Charge col-form-label text-blue" for="Charge"></label>
                        </div>
                    </div>

                    <div class="ml-5 d-flex align-items-center">
                        /&nbsp; <strong>Cust Ref# :</strong>&nbsp;
                        <div class="cut-text">
                            <label class="custref col-form-label text-blue" for="CustRef"></label>
                        </div>
                    </div>
                    <div class="ml-5 d-flex align-items-center">
                        /&nbsp; <strong>Cust Po# :</strong> &nbsp;
                        <div class="cut-text">
                            <label class="Cust_Po col-form-label text-blue" for="Cust_Po"></label>
                        </div>
                    </div>

                    <div class="ml-5 d-flex align-items-center">
                        /&nbsp; <strong>N.O.F :</strong>&nbsp;
                        <div class="cut-text">
                            <label class="NOF col-form-label text-blue" for="NOF"></label>
                        </div>
                    </div>





                    {{-- <div class="ml-5">

                    </div> --}}
                </div>


            </div>
            {{-- <form action="/Delivery-Order-save" method="post"> --}}
            {{-- @csrf --}}
            <div class="card-body">
                <div class="row ">
                    <div class="inputbox col-sm-1 py-2">
                        <input type="number" id="event_no" name="EventNo" value="{{ $EventNo }}" class="">
                        <span>Event # :</span>
                    </div>
                    <div class="inputbox col-sm-2 py-2">
                        <span class="Txtspan" id="">Terms</span>
                        <select class="" name="Terms" id="Terms">
                            <option value="0">Select Terms</option>
                            @foreach ($Terms as $item)
                                <option value="{{ $item->Terms }}">{{ $item->Terms }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="inputbox col-sm-2 py-2">
                        <span class="Txtspan" id="">Department</span>
                        <select class="" name="DepartmentName" id="DepartmentName">
                            <option value="0">Select Departmen</option>
                            @foreach ($deptype as $item)
                                <option value="{{ $item->TypeCode }}">{{ $item->TypeName }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="inputbox col-sm-2 py-2">
                        <span class="Txtspan" id="">Order Date</span>

                        <input class="" type="date" id="orderdate" name="OrderDate" value="">

                    </div>
                    <div class="inputbox col-sm-2 py-2">
                        <span class="Txtspan" id="">WareHouse</span>
                        <select class="" name="GodownName" id="GodownName">
                            <option value="0">Select WareHouse</option>

                            @foreach ($warehouse as $item)
                                <option value="{{ $item->GodownCode }}">{{ $item->GodownName }}</option>
                            @endforeach
                        </select>
                    </div>


                    {{-- <a name="" id="" class="btn btn-secondary mx-1" onclick="quoteadd()" role="button"><i class="fa fa-arrow-right" aria-hidden="true"></i></a> --}}

                    {{-- <div class="col-sm-2">
                                <a name="" id="" class="btn btn-success"  role="button"><i class="fa fa-print" aria-hidden="true"></i> Cloud Print</a>
                            </div> --}}
                </div>
                <div class="row ">
                    <div class="inputbox col-sm-2 py-2">
                        <span class="Txtspan" id="">Status</span>

                        <input class="" type="text" readonly id="TxtStatus" name="TxtStatus" value="">

                    </div>
                </div>

            </div>
        </div>
        <div class="card">
            <div class="card-body">



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

                <div class="row py-2">
                    <div class=" col-sm-12 rounded shadow mx-auto">
                        <div class=" table-responsive">
                            <table data-show-export="true" id="ordertable" data-show-print="true" class="display"
                                width="100%">
                                <thead class="bg-info">
                                    <tr>
                                        <th class="border-0 rounded-start">IMPA&nbsp;Code</th>
                                        <th class="border-0">Item&nbsp;Code</th>
                                        <th class="border-0">Qty</th>
                                        <th class="border-0">PUOM</th>
                                        <th class="border-0" style="width: 400px">Item&nbsp;Name</th>
                                        <th class="border-0">Orderd</th>
                                        <th class="border-0">Price</th>
                                        <th class="border-0">Est&nbsp;Price</th>
                                        <th class="border-0" hidden>QID</th>
                                        <th class="border-0" hidden>STK / Buy Out</th>
                                        <th class="border-0" hidden>Product Name</th>
                                        <th class="border-0" hidden>Freight</th>
                                        <th class="border-0" hidden>GP Amt</th>
                                        <th class="border-0" hidden>Vendor Name</th>
                                        <th class="border-0" hidden>Vendor Price</th>
                                        <th class="border-0" hidden>Actual Cost</th>
                                        <th class="border-0" hidden>Origin Name</th>
                                        <th class="border-0" hidden>V-Part</th>
                                        <th class="border-0" hidden>Customer Notes</th>
                                        <th class="border-0" hidden>Vendor Notes</th>
                                        <th class="border-0" hidden>Internal Buyer Notes</th>
                                        <th class="border-0" hidden>Vendor Code</th>
                                        <th class="border-0" hidden>Category Name</th>
                                        <th class="border-0" hidden>GP Rate</th>
                                        <th class="border-0" hidden>Last Update Date</th>
                                        <th class="border-0" hidden>Alternate</th>
                                        <th class="border-0" hidden>Client UOM</th>
                                        <th class="border-0" hidden>Disc Income %</th>
                                        <th class="border-0" hidden>Disc Income Amt</th>
                                        <th class="border-0" hidden>IMPA</th>
                                        <th class="border-0" hidden>POMadeNo</th>
                                        <th class="border-0" hidden>POMadeDate</th>
                                        <th class="border-0" hidden>ChkBuy</th>
                                        <th class="border-0" hidden>WorkUser</th>
                                        <th class="border-0">ID</th>
                                        <th class="border-0">SNo</th>
                                        <th class="border-0" hidden>Freight Rate</th>
                                        <th class="border-0">Hasmate</th>
                                        <th class="border-0">HasMateNo</th>
                                        <th class="border-0 rounded-end">Hasmate&nbsp;Weight</th>
                                        <th class="border-0 " hidden>intorderqty</th>

                                    </tr>
                                </thead>
                                <tbody class="ordersearc" id="ordersearc">

                                </tbody>
                            </table>

                        </div>

                    </div>

                </div>

            </div>
        </div>
        <div class="card">
            <div class="card-body">

                <div class="row py-2">
                    <div class="col-sm-6">
                        <div class="row py-b">

                            <a name="" id="" class="btn btn-secondary mx-1" href="#"
                                role="button">Cost
                                Print</a>
                            <a name="" id="" class="btn btn-danger mx-1" href="#"
                                role="button">Close</a>
                            <a name="" id="" class="btn btn-danger mx-1" href="#"
                                role="button">Dont
                                Flip-Close</a>
                            <button type="button" name="" id="procedsave" class="btn btn-success mx-1"
                                role="button">Procces -Create VSN</button>
                            <a name="" id="" class="btn btn-secondary mx-1" href="#"
                                role="button"><i class="fa fa-calendar-check" aria-hidden="true"></i> Export</a>
                            <a name="" id="" class="btn btn-secondary mx-1" href="#"
                                role="button"><i class="fa fa-database" aria-hidden="true"></i> send</a>
                        </div>
                        <div class="row py-2">
                            <div class="inputbox col-sm-4 py-2">
                                <span class="Txtspan" id="">Est Lines :</span>
                                <input class="" type="text" name="EstLines" readonly id="txtEstLines"
                                    value="">
                            </div>

                            <div class="inputbox col-sm-4 py-2">
                                <span class="Txtspan" id="">Order Qty :</span>
                                <input class="" type="text" readonly name="txttotalorders" id="txttotalorders">
                            </div>

                        </div>
                        <div class="row">
                            <div class="inputbox col-sm-4 py-2">
                                <span class="Txtspan" id="">Dis %:</span>
                                <input class="" type="text" id="txtDiscount" name="Discount" readonly
                                    value="">
                            </div>
                            <div class="inputbox col-sm-4 py-2">
                                <span class="Txtspan" id="">Total :</span>
                                <input class="" type="text" name="Totalamount" readonly id="txtTotalamount"
                                    value="">
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-6">
                        <div class="card collapsed-card">
                            <div class="card-header" style="background-color:#EEE; ">
                                <p class="card-title"> DISCOUNTS </p>

                                <div class="card-tools ">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col"></th>
                                            <th scope="col">Sales Amt</th>
                                            <th scope="col">Est Lines</th>
                                            <th scope="col">Order Qty</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row"></th>
                                            <th scope="row"></th>
                                            <td id="salesum">0</td>
                                            <td id="EstLines">0</td>
                                            <td id="totalorders">0</td>
                                        </tr>

                                        <tr>
                                            <th scope="row"><input style="width:50px" type="number"
                                                    id="footer_inv_percent" value="" /></th>
                                            <th scope="row">% Inv/Cash Disc:</th>
                                            {{-- DiscIncomeAmt --}}
                                            <td id="invdsic">0</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><input style="width:50px" type="number"
                                                    id="footer_cr_note_percent" value="" /></th>
                                            <th scope="row">% Cr Note:</th>
                                            <td id="crnote"> </td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th id="aviper" scope="row"></th>
                                            <th scope="row">% AVI Rebate:</th>
                                            <td id="avireb"></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th id="volper" scope="row"></th>
                                            <th scope="row">% Volume Disc:</th>
                                            <td id="volumedis"></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th id="slsper" scope="row"></th>
                                            <th scope="row">% Sls Comm:</th>
                                            <td id="slscomm"></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"></th>
                                            <th scope="row">NET SALE:</th>
                                            <td id="netsales"></td>
                                            <td id=""></td>
                                            <td id=""></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="txtCustomerCode" id="txtCustomerCode">
                    <input type="hidden" name="TxtVesselCode" id="TxtVesselCode">
                    <input type="hidden" name="chkterms" id="chkterms">
                    <div class="col-sm-6">

                    </div>
                </div>
            </div>
        </div>
        {{-- </form> --}}
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="jquery.dataTables.colResize.css"> --}}

    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jqc-1.12.4/dt-1.13.1/b-2.3.2/sl-1.5.0/datatables.min.css"/> --}}
    {{-- <link rel="stylesheet" type="text/css" href="Editor-2.0.10/css/editor.dataTables.css"> --}}
    {{--
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">


    <style>


        .changwidth {
            width: 75px;

        }

        .boderless:focus {
            outline: none !important;
        }

        .boderless-w-width {
            border: none;
            border-width: 0;
            box-shadow: none;
            background: none;
        }

        .boderless-w-width:focus {
            outline: none !important;
        }

        .boderlessdis {
            border: none;
            border-width: 0;
            box-shadow: none;
            background: none;
            width: 100%;
        }

        .boderlessdis:focus {
            outline: none !important;
        }

        .w2 {
            width: 500px
        }
    </style>
@stop

@section('js')

    {{-- <script src="jquery.dataTables.colResize.js"></script> --}}
    {{-- <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jqc-1.12.4/dt-1.13.1/b-2.3.2/sl-1.5.0/datatables.min.js"></script> --}}
    {{-- <script type="text/javascript" src="Editor-2.0.10/js/dataTables.editor.js"></script> --}}
    {{-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
<script type="text/javascript"  src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
<script type="text/javascript"  src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript"  src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript"  src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
<script type="text/javascript"  src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script> --}}
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
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
        function ajaxsetup() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        }

        function TxtPONO_LostFocus(Txtpono) {
            ajaxsetup();
            $.ajax({
                url: "{{ route('TxtPONOLostFocus') }}",
                type: 'POST',
                data: {
                    Txtpono,
                },
                beforeSend: function() {
                    // Show the overlay and spinner before sending the request
                    $('.overlay').show();
                },
                success: function(resposne) {
                    console.log('pono');
                    console.log(resposne);
                    if (resposne) {
                        var OrderMaster = resposne.OrderMaster;
                        var FlipToVSN = resposne.FlipToVSN;
                        var OrderDetail = resposne.OrderDetail;

                        if (OrderMaster) {
                            if (OrderMaster.EventNo) {
                                $('#EventNo').val(OrderMaster.EventNo);
                            }
                            if (OrderMaster.QuoteNo) {
                                $('#caps').val(OrderMaster.QuoteNo);
                            }
                            if (OrderMaster.DepartmentCode) {
                                $('#DepartmentName').val(OrderMaster.DepartmentCode);
                            }
                            if (OrderMaster.CustomerRefNo) {
                                $('.custref').text(OrderMaster.CustomerRefNo);
                            }
                            if (OrderMaster.VSNNo) {
                                $('.VSNNo').text(OrderMaster.VSNNo);
                            }
                            if (OrderMaster.PurchaseOrderNo) {
                                $('.Cust_Po').text(OrderMaster.PurchaseOrderNo);
                            }
                            if (typeof OrderMaster !== 'undefined' && OrderMaster.OrderDate) {
                                var odate = new Date(OrderMaster.OrderDate);
                                if (!isNaN(odate)) {
                                    var year = odate.getFullYear();
                                    var month = String(odate.getMonth() + 1).padStart(2, '0');
                                    var day = String(odate.getDate()).padStart(2, '0');

                                    var formattedDate = year + '-' + month + '-' + day;
                                    $('#orderdate').val(formattedDate);
                                } else {
                                    console.error('Invalid OrderDate value:', OrderMaster.OrderDate);
                                }
                            } else {
                                console.warn('OrderDate is undefined or null');
                            }


                            $('#Terms').val(OrderMaster.Terms);
                            $('#chkterms').val(OrderMaster.Terms);
                            $('#txtDiscount').val(OrderMaster.InvDiscPer);
                            $('#GodownName').val(OrderMaster.GodownCode);
                            $('#TxtStatus').val(OrderMaster.Status);
                        } else {
                            $('#TxtStatus').val('-');
                            $('#txtDiscount').val('');
                        }
                        if (OrderDetail) {
                            if (OrderDetail.length > 0) {
                                var table = document.getElementById('ordersearc');
                                table.innerHTML = ""; // Clear the table

                                OrderDetail.forEach(function(item) {
                                    let row = table.insertRow();

                                    function createCell(content) {
                                        let cell = row.insertCell();
                                        cell.innerHTML = content;
                                        return cell;
                                    }

                                    createCell(item.IMPAItemCode ? item.IMPAItemCode : '');
                                    createCell(item.ItemCode ? item.ItemCode : '');
                                    createCell(item.Qty ? item.Qty : '').classList.add("text-center");
                                    createCell(item.PUOM ? item.PUOM : '').classList.add("text-center");
                                    createCell(item.ItemName ? item.ItemName : '');
                                    let MOrderQty1 = item.OrderQty ? parseFloat(item.OrderQty).toFixed(
                                        2) : item.Qty;
                                    let orderqtycell = createCell(MOrderQty1);
                                    orderqtycell.contentEditable = true
                                    orderqtycell.classList.add("tabbody");
                                    orderqtycell.classList.add("text-center");

                                    createCell(item.Price ? parseFloat(item.Price).toFixed(2) : '')
                                        .classList.add("text-right");
                                    createCell((item.Price ? item.Price : '') * MOrderQty1).classList
                                        .add("text-right");
                                    createCell(item.QID ? item.QID : '').hidden = 'true';
                                    createCell(item.STKBuyOut ? item.STKBuyOut : '').hidden = 'true';
                                    createCell(item.ProductName ? item.ProductName : '').hidden =
                                        'true';
                                    createCell(item.Freight ? item.Freight : '').hidden = 'true';
                                    createCell(item.GPAmount ? item.GPAmount : '').hidden = 'true';
                                    createCell(item.VendorName ? item.VendorName : '').hidden = 'true';
                                    createCell(item.VendorPrice ? item.VendorPrice : '').hidden =
                                        'true';
                                    createCell(item.OurPrice ? item.OurPrice : '').hidden = 'true';
                                    createCell(item.OriginName ? item.OriginName : '').hidden = 'true';
                                    createCell(item.VPart ? item.VPart : '').hidden = 'true';
                                    createCell(item.CustomerNotes ? item.CustomerNotes : '').hidden =
                                        'true';
                                    createCell(item.VendorNotes ? item.VendorNotes : '').hidden =
                                        'true';
                                    createCell(item.InternalBuyerNotes ? item.InternalBuyerNotes : '')
                                        .hidden = 'true';
                                    createCell(item.VendorCode ? item.VendorCode : '').hidden = 'true';
                                    createCell(item.VCategoryName ? item.VCategoryName : '').hidden =
                                        'true';
                                    createCell(item.GPRate ? item.GPRate : '').hidden = 'true';
                                    createCell(item.LastDate ? item.LastDate : '').hidden = 'true';
                                    createCell(item.Alternative ? item.Alternative : '').hidden =
                                        'true';
                                    createCell(item.OurUOM ? item.OurUOM : '').hidden = 'true';
                                    createCell(item.DiscIncomePer ? item.DiscIncomePer : '').hidden =
                                        'true';
                                    createCell(item.DiscIncomeAmt ? item.DiscIncomeAmt : '').hidden =
                                        'true';
                                    createCell(item.IMPA ? item.IMPA : '').hidden = 'true';
                                    createCell(item.PoMadeNo ? item.PoMadeNo : '').hidden = 'true';
                                    createCell(item.PoMadeDate ? item.PoMadeDate : '').hidden = 'true';
                                    createCell(item.ChkBuy ? item.ChkBuy : '').hidden = 'true';
                                    createCell(item.WorkUser ? item.WorkUser : '').hidden = 'true';
                                    createCell(item.ID ? item.ID : '');
                                    // console.log(item.ID);
                                    // createCell('');
                                    createCell(item.SNo ? Math.round(item.SNo) : '');
                                    createCell(item.FreightRate ? item.FreightRate : '').hidden =
                                        'true';
                                    createCell(item.HasMate ? item.HasMate : '');
                                    createCell(item.HasmateNo ? item.HasmateNo : '');
                                    createCell(item.HasmateWeight ? item.HasmateWeight : '');
                                    createCell(item.OrderQty).hidden = 'true';




                                });
                                talbcomeser();
                            }
                        }
                        if (FlipToVSN) {
                            $('.CustomerName').text(FlipToVSN.CustomerName);
                            $('#txtCustomerCode').val(FlipToVSN.CustomerCode);
                            $('.VesselName').text(FlipToVSN.VesselName);
                        } else {
                            var today = new Date();

                            // Format the date as "YYYY-MM-DD"
                            var formattedDate = today.toISOString().substr(0, 10);

                            // Set the value of the input field
                            $("#orderdate").val(formattedDate);

                        }



                    }
                },
                complete: function() {
                    $('.tabbody').blur(function() {
                        talbcomeser();

                    });
                    $('.tabbody').keypress(function (e) {
                if (e.which == 13) {
                    e.preventDefault();
                    talbcomeser();

                        }
                    });
                }
            });

        }

        var tab = $('#ordertable').DataTable();

        function DataGetQuote() {
            var QuoteNo = $('#caps').val();
            ajaxsetup();
            $.ajax({
                url: "{{ route('OrderDataGetQuote') }}",
                type: 'POST',
                data: {
                    QuoteNo,
                },
                beforeSend: function() {
                    // Show the overlay and spinner before sending the request
                    $('.overlay').show();
                },
                success: function(resposne) {
                    console.log(resposne);
                    var QuoteMaster = resposne.QuoteMaster;
                    var FlipToVSN = resposne.FlipToVSN;
                    var OrderDetail = resposne.OrderDetail;
                    var Orders = resposne.Orders;
                    $('.CustomerName').text('');
                    $('#txtCustomerCode').val('');
                    $('.VesselName').text('');
                    $('#EventNo').val('');
                    $('.VSNNo').text('');
                    $('#DepartmentName').val('');
                    $('.Charge').text('');
                    $('.custref').text('');
                    $('.Cust_Po').text('');
                    $('#TxtVesselCode').val('');
                    $('#Terms').val('');
                    $('#chkterms').val('');
                    $('#orderdate').val('');

                    if (QuoteMaster) {
                        console.log('quote');

                        $('.CustomerName').text(QuoteMaster.CustomerName);
                        $('#txtCustomerCode').val(QuoteMaster.CustCode);
                        $('.VesselName').text(QuoteMaster.VesselName);
                        $('#EventNo').val(QuoteMaster.EventNo);
                        $('.VSNNo').text(QuoteMaster.VSNNo);
                        $('#DepartmentName').val(QuoteMaster.DepartmentCode);
                        $('.Charge').text(QuoteMaster.FlipOrderNo);
                        $('.custref').text(QuoteMaster.CustomerRefNo);
                        $('.Cust_Po').text(QuoteMaster.CustomerRefNoPO);
                        $('#TxtVesselCode').val(QuoteMaster.VesselCode);
                        $('#Terms').val(QuoteMaster.Terms);
                        $('#chkterms').val(QuoteMaster.Terms);
                        $('#TxtStatus').val(QuoteMaster.Status);
                        if (QuoteMaster.FlipDAte) {

                            var odate = new Date(QuoteMaster.FlipDAte);
                            const OrderDate = odate.toISOString().substring(0, 10);
                            $('#orderdate').val(OrderDate);
                        } else {
                            document.getElementById('orderdate').valueAsDate = new Date();

                        }
                        var DiscPer = QuoteMaster.DiscPer;
                        $('#txtDiscount').val(DiscPer);

                    }
                    if (FlipToVSN !== null) {
                        console.log('flip');

                        $('.CustomerName').text(FlipToVSN.CustomerName);
                        $('#txtCustomerCode').val(FlipToVSN.CustomerCode);
                        $('.VesselName').text(FlipToVSN.VesselName);
                        $('#GodownName').val(FlipToVSN.GodownCode);
                    }
                    if (OrderDetail) {
                        var Txtpono = $('.Charge').text();
                        if (Txtpono > 0 || Txtpono !== '') {
                            TxtPONO_LostFocus(Txtpono);
                        }
                    }
                    if (Orders) {
                        if (Orders.length > 0) {
                            var table = document.getElementById('ordersearc');
                            table.innerHTML = ""; // Clear the table

                            Orders.forEach(function(item) {
                                let row = table.insertRow();

                                function createCell(content) {
                                    let cell = row.insertCell();
                                    cell.innerHTML = content;
                                    return cell;
                                }
                                createCell(item.IMPAItemCode ? item.IMPAItemCode : '');
                                createCell(item.ItemCode ? item.ItemCode : '');
                                createCell(item.Qty ? item.Qty : '').classList.add("text-center");
                                createCell(item.PUOM ? item.PUOM : '').classList.add("text-center");
                                createCell(item.ItemName ? item.ItemName : '');
                                let MOrderQty1 = item.OrderQty ? parseFloat(item.OrderQty).toFixed(2) : item.Qty;
                                let orderqtycell = createCell(MOrderQty1);
                                orderqtycell.contentEditable = true
                                orderqtycell.classList.add("tabbody");
                                orderqtycell.classList.add("text-center");

                                createCell(item.SuggestPrice ? parseFloat(item.SuggestPrice).toFixed(2) : '').classList.add("text-right");
                                createCell((item.SuggestPrice ? item.SuggestPrice : '') * MOrderQty1) .classList.add("text-right");
                                createCell(item.QID ? item.QID : '').hidden = 'true';
                                createCell(item.STKBuyOut ? item.STKBuyOut : '').hidden = 'true';
                                createCell(item.ProductName ? item.ProductName : '').hidden = 'true';
                                createCell(item.Freight ? item.Freight : '').hidden = 'true';
                                createCell(item.GPAmount ? item.GPAmount : '').hidden = 'true';
                                createCell(item.VendorName ? item.VendorName : '').hidden = 'true';
                                createCell(item.VendorPrice ? item.VendorPrice : '').hidden = 'true';
                                createCell(item.OurPrice ? item.OurPrice : '').hidden = 'true';
                                createCell(item.OriginName ? item.OriginName : '').hidden = 'true';
                                createCell(item.VPart ? item.VPart : '').hidden = 'true';
                                createCell(item.CustomerNotes ? item.CustomerNotes : '').hidden = 'true';
                                createCell(item.VendorNotes ? item.VendorNotes : '').hidden = 'true';
                                createCell(item.InternalBuyerNotes ? item.InternalBuyerNotes : '').hidden = 'true';
                                createCell(item.VendorCode ? item.VendorCode : '').hidden = 'true';
                                createCell(item.VCategoryName ? item.VCategoryName : '').hidden = 'true';
                                createCell(item.GPRate ? item.GPRate : '').hidden = 'true';
                                createCell(item.LastDate ? item.LastDate : '').hidden = 'true';
                                createCell(item.Alternative ? item.Alternative : '').hidden = 'true';
                                createCell(item.OurUOM ? item.OurUOM : '').hidden = 'true';
                                createCell(item.DiscIncomePer ? item.DiscIncomePer : '').hidden = 'true';
                                createCell(item.DiscIncomeAmt ? item.DiscIncomeAmt : '').hidden = 'true';
                                createCell(item.IMPA ? item.IMPA : '').hidden = 'true';
                                createCell('').hidden = 'true';
                                createCell('').hidden = 'true';
                                createCell('').hidden = 'true';
                                createCell('').hidden = 'true';
                                createCell(item.ID ? item.ID : '');
                                // createCell('').hidden = 'true';
                                createCell(item.SNo ? Math.round(item.SNo) : '');
                                createCell(item.FreightRate ? item.FreightRate : '').hidden = 'true';
                                createCell(item.HasMate ? item.HasMate : '');
                                createCell(item.HasmateNo ? item.HasmateNo : '');
                                createCell(item.HasmateWeight ? item.HasmateWeight : '');
                                createCell(item.OrderQty).hidden = 'true';



                            });
                            talbcomeser();

                        }
                    }



                    // if(resposne.LblNoOfFliped){

                    //     $('.NOF').text(resposne.LblNoOfFliped);
                    //     $('.NOF').text(resposne.VSNNo);
                    //     $('.GodownName').text(resposne.GodownCode);
                    //     // $('.NOF').text(resposne.GodownName);

                    // }

                },
                complete: function() {
                    // Hide the overlay and spinner after the request is complete
                    $('.overlay').hide();
                    $('.tabbody').blur(function() {
                        talbcomeser();

                    });
                    $('.tabbody').keypress(function (e) {
                if (e.which == 13) {
                    e.preventDefault();
                    talbcomeser();

                        }
                    });
                }
            });


        }

        function DataGetEvent() {
            var EventNo = $('#event_no').val();

            ajaxsetup();
            $.ajax({
                url: "{{ route('OrderDataGetEvent') }}",
                type: 'POST',
                data: {
                    EventNo,
                },
                beforeSend: function() {
                    // Show the overlay and spinner before sending the request
                    $('.overlay').show();
                },
                success: function(response) {
                    console.log(response);
                    if (response.LblNoOfFliped) {
                        var rsmove = response.RsMove;
                        $('.NOF').text(response.LblNoOfFliped);
                        $('.VSNNo').text(rsmove.VSNNo);
                        $('.GodownName').text(rsmove.GodownCode);
                        // $('.NOF').text(response.GodownName);
                    }
                    if (response.RsMoves) {
                        var RsMoves = response.RsMoves;
                        var initialQuoteNo =
                            '{{ $QuoteNo }}'; // Get the initial QuoteNo from Blade template
                        var currentQuoteIndex = findIndexByQuoteNo(RsMoves, initialQuoteNo);

                        function findIndexByQuoteNo(array, quoteNo) {
                            for (var i = 0; i < array.length; i++) {
                                if (array[i].QuoteNo === quoteNo) {
                                    return i;
                                }
                            }
                            return 0; // Default to 0 if not found
                        }


                        $('#minus').click(function(e) {
                            if (currentQuoteIndex > 0) {
                                currentQuoteIndex--;
                            }
                            updateQuote();
                        });
                        $('#plus').click(function(e) {

                            if (currentQuoteIndex < RsMoves.length - 1) {
                                currentQuoteIndex++;
                            }
                            updateQuote();
                        });

                        function updateQuote() {
                            // Update the input value with the current QuoteNo
                            document.getElementById('caps').value = RsMoves[currentQuoteIndex].QuoteNo;
                        }

                        // Initial input value setup
                        updateQuote();


                    }

                },
                complete: function() {
                    // Hide the overlay and spinner after the request is complete
                    $('.overlay').hide();
                    DataGetQuote();

                }
            });

        }

        $(document).ready(function() {
            if ($('#event_no').val() > 0) {
                DataGetEvent();

            }

            $('#event_no').blur(function(e) {
                e.preventDefault();
                if ($('#event_no').val() > 0) {
                    DataGetEvent();
                }

            });


            $('#ordertable').DataTable({
                scrollY: 300,
                // deferRender:    true,
                scroller: true,
                // responsive: true,
                // scrollX: true,
                paging: false,
                ordering: false,
                searching: false,


            });

        });
        window.onload = function() {
            //var CapsNum = localStorage.getItem("CapsNum");

            //   if (CapsNum == null) {
            //     CapsNum = "0";
            //   } else {
            //     document.getElementById("caps").value = CapsNum;
            //   }
        }
        window.onbeforeunload = function() {
            localStorage.setItem("CapsNum", document.getElementById("caps").value);
        }

        // function PlusCaps() {
        //     var nextValue = parseInt(document.getElementById("caps").value) + 1;

        //     setNextValue(nextValue);
        // }

        // function MinusCaps() {
        //     var nextValue = parseInt(document.getElementById("caps").value) - 1;
        //     setNextValue(nextValue);
        // }

        // function setNextValue(nextValue) {
        //     //localStorage.setItem("CapsNum", nextValue);
        //     document.getElementById("caps").value = nextValue;
        //     window.location.href = '/Order?QuoteNo=/' + nextValue;

        // }
        $(document).ready(function() {
            document.getElementById('orderdate').valueAsDate = new Date();

            // talbcomeser();
            $('.tabbody').blur(function() {
                talbcomeser();

            });
            $('.tabbody').keypress(function (e) {
                if (e.which == 13) {
                    e.preventDefault();
                    talbcomeser();

                }
            });

            $("#footer_inv_percent").on("keydown", function(event) {
                if (event.which === 13) {
                    talbcomeser();
                }
            });
            $("#footer_cr_note_percent").on("keydown", function(event) {
                if (event.which === 13) {
                    talbcomeser();
                }
            });

            $('#procedsave').click(function(e) {
                SaveOrder();
            });

        });

        $(document).on("blur", '#footer_cr_note_percent', function() {
            talbcomeser();

        });
        $(document).on("blur", '#footer_inv_percent', function() {

            talbcomeser();

        });

        function SaveOrder() {
            talbcomeser();
            var Department = $('#DepartmentName').val();
            var cmbTerms = $('#Terms').val();
            var Terms = $('#Terms option:selected').text();
            var chkterms = $('#chkterms').val();
            var Godown = $('#GodownName').val();

            if ($('#TxtStatus').val() == 'INVOICED') {
                return alert('Permission Denied! Already INVOICED Can Not Change');
            }
            if (Department == 0) {
                return alert('Department Not Found! Please Select Department First');

            }
            if (cmbTerms == 0) {
                return alert('Terms Not Selected! Please Select Terms First');

            }
            if (Godown == 0) {
                return alert('Warehouse Not Selected! Please Select Warehouse First');

            }
            $("#procedsave").attr("disabled", true);

            // console.log(chkterms);
            if (chkterms != Terms) {
                Swaal.fire({
                    title: 'You Changed Terms Please enter Admin Authentication',
                    text: 'Are You Sure Want To Change?',
                    icon: 'question',
                    input: 'password', // Adding an input field for password
                    inputPlaceholder: 'Enter your password', // Placeholder for the input field
                    showCancelButton: true,
                    confirmButtonText: 'Change',
                    cancelButtonText: 'Cancel',
                    showLoaderOnConfirm: true, // You can display a loader animation while confirming
                    preConfirm: (password) => {
                        // Here you can validate the password and perform your delete action
                        // You can also return a Promise if you need to perform an asynchronous action
                        return new Promise((resolve, reject) => {
                            // Example password validation
                            if (password === '332211') {
                                resolve();
                            } else {
                                reject('Incorrect password');
                            }
                        }).catch(error => {
                            $('#Terms').val(chkterms);
                            Swal.showValidationMessage(`Error: ${error}`);
                        });
                    },
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            'Confirmed!',
                            'Terms Is Changed.',
                            'success'
                        );
                        performAjaxCall();
                    }
                });

            } else {
                performAjaxCall();
            }

        }

        function performAjaxCall() {
            let Totalamount = $('#netsales').text();
            let Event = $('#event_no').val();
            let Quote = $('#caps').val();
            let Charge = $('.Charge').text();
            let Vsn = $('.VSNNo').text();
            let CustomerName = $('.CustomerName').text();
            let custref = $('.custref').text();
            let txtCustomerCode = $('#txtCustomerCode').val();
            let TxtPurchaseOrderNo = $('.Cust_Po').text();
            let VesselName = $('.VesselName').text();
            let VesselCode = $('#TxtVesselCode').text();
            var Department = $('#DepartmentName').val();
            var DepartmentName = $('#DepartmentName option:selected').text();
            var cmbTerms = $('#Terms').val();
            var Terms = $('#Terms option:selected').text();
            var chkterms = $('#chkterms').val();
            var Godown = $('#GodownName').val();
            var GodownName = $('#GodownName option:selected').text();
            let OrderDate = $('#orderdate').val();
            let LblTotal = $('#txtTotalamount').val();
            let LblNoOfItems = $('#txtEstLines').val();
            let txtDiscount = $('#txtDiscount').val();
            console.log(OrderDate);

            var table = document.getElementById('ordersearc');
            let rows = table.rows;
            let datat = [];
            for (var i = 0; i < rows.length; i++) {
                let cells = rows[i].cells;
                let oderqtychk = parseInt(cells[5].innerHTML);
                let SNo = cells[36].innerHTML;

                console.log(SNo);

                console.log(oderqtychk);
                if (oderqtychk > 0) {
                    datat.push({

                        IMPAItemCode: cells[0] ? cells[0].innerHTML : '',
                        ItemCode: cells[1] ? cells[1].innerHTML : '',
                        Qty: cells[2] ? cells[2].innerHTML : '',
                        PUOM: cells[3] ? cells[3].innerHTML : '',
                        ItemName: cells[4] ? cells[4].innerHTML : '',
                        OrderQty: cells[5] ? cells[5].innerHTML : '',
                        Price: cells[6] ? cells[6].innerHTML : '',
                        Total: cells[7] ? cells[7].innerHTML : '',
                        QID: cells[8] ? cells[8].innerHTML : '',
                        stk: cells[9] ? cells[9].innerHTML : '',
                        ProductName: cells[10] ? cells[10].innerHTML : '',
                        Freight: cells[11] ? cells[11].innerHTML : '',
                        GPAmount: cells[12] ? cells[12].innerHTML : '',
                        VendorName: cells[13] ? cells[13].innerHTML : '',
                        VendorPrice: cells[14] ? cells[14].innerHTML : '',
                        OurPrice: cells[15] ? cells[15].innerHTML : '',
                        OriginName: cells[16] ? cells[16].innerHTML : '',
                        VPart: cells[17] ? cells[17].innerHTML : '',
                        CustomerNotes: cells[18] ? cells[18].innerHTML : '',
                        VendorNotes: cells[19] ? cells[19].innerHTML : '',
                        InternalBuyerNotes: cells[20] ? cells[20].innerHTML : '',
                        VendorCode: cells[21] ? cells[21].innerHTML : '',
                        VCategoryName: cells[22] ? cells[22].innerHTML : '',
                        GPRate: cells[23] ? cells[23].innerHTML : '',
                        LastDate: cells[24] ? cells[24].innerHTML : '',
                        Alternative: cells[25] ? cells[25].innerHTML : '',
                        OurUOM: cells[26] ? cells[26].innerHTML : '',
                        DiscIncomePer: cells[27] ? cells[27].innerHTML : '',
                        DiscIncomeAmt: cells[28] ? cells[28].innerHTML : '',
                        IMPA: cells[29] ? cells[29].innerHTML : '',
                        PoMadeNo: cells[30] ? cells[30].innerHTML : '',
                        PoMadeDate: cells[31] ? cells[31].innerHTML : '',
                        MChk: cells[32] ? cells[32].innerHTML : '',
                        Workuser: cells[33] ? cells[33].innerHTML : '',
                        ID: cells[34] ? cells[34].innerHTML : '',
                        SNo: cells[35] ? cells[35].innerHTML : '',
                        FreightRate: cells[36] ? cells[36].innerHTML : '',
                        HasMate: cells[37] ? cells[37].innerHTML : '',
                        HasmateNo: cells[38] ? cells[38].innerHTML : '',
                        HasmateWeight: cells[39] ? cells[39].innerHTML : '',
                        intorderqty: cells[40] ? cells[40].innerHTML : '',

                    })

                }
            }
            console.log(datat);
            console.log(datat[0].SNo);

            ajaxsetup();
            $.ajax({
                url: "{{ route('ordersave') }}",
                type: 'POST',
                data: {
                    datat,
                    Event,
                    Quote,
                    TxtPurchaseOrderNo,
                    Charge,
                    VesselName,
                    VesselCode,
                    DepartmentName,
                    Department,
                    GodownName,
                    Godown,
                    Vsn,
                    CustomerName,
                    txtCustomerCode,
                    OrderDate,
                    Terms,
                    custref,
                    Totalamount,
                    LblNoOfItems,
                    LblTotal,
                    txtDiscount,
                },
                beforeSend: function() {
                    // Show the overlay and spinner before sending the request
                    $('.overlay').show();
                },
                success: function(resposne) {
                    console.log(resposne);
                    if (resposne.Message == 'Already') {
                        Swaal.fire({
                            icon: 'error',
                            title: 'Cust PO Already Exist!',
                            text: resposne.Text,
                            footer: '<a href>Why do I have this issue?</a>'
                        })
                    }
                    if (resposne.Message == "Failed") {
                        Swaal.fire({
                            icon: 'error',
                            title: 'Oops...Something went wrong!',
                            text: resposne.error,
                            footer: '<a href>Why do I have this issue?</a>'
                        })
                    }
                    if (resposne.Message == 'success') {
                        var PEventNo = $('#event_no').val();
                        var PQuoteNo = $('#caps').val();
                        var PVSNNo = $('.VSNNo').text();
                        var MChargeNo = $('.Charge').text();
                        let Quote = $('#caps').val();



                        window.location.href = '/ChargeList-VSN?VSN=' + PVSNNo;
                        // alert('saved');

                    } else {
                        console.log(resposne);

                    }


                },
                complete: function() {
                    // Hide the overlay and spinner after the request is complete
                    $('.overlay').hide();
                    $("#procedsave").attr("disabled", false);

                }
            });
        }

        function talbcomeser() {

            var invval = $('#footer_inv_percent').val();
            var crnoteval = $('#footer_cr_note_percent').val();
            var slsper = $('#slsper').text();
            var volper = $('#volper').text();
            var aviper = $('#aviper').text();
            $('#salesum').text(0);

            let tEstLines = 0;
            let ttotalorders = 0;
            let tTotalamount = 0;


            var table = document.getElementById('ordersearc');
            let rows = table.rows;
            for (var i = 0; i < rows.length; i++) {
                let cells = rows[i].cells;

                impa = cells[0].innerHTML;
                itemcode = cells[1].innerHTML;
                qty = cells[2].innerHTML;
                puom = cells[3].innerHTML;
                itemname = cells[4].innerHTML;
                Orderqty = cells[5].innerHTML;
                price = cells[6].innerHTML;
                estprice = cells[7].innerHTML;
                id = cells[8].innerHTML;
                stk = cells[9].innerHTML;
                ProductName = cells[10].innerHTML;
                Freight = cells[11].innerHTML;
                intorderqty = cells[40].innerHTML;

                cells[7].innerHTML = parseFloat(Orderqty * price).toFixed(2);
                if (Orderqty !== qty) {
                    cells[5].style.color = '#f51d06';
                } else {
                    cells[5].style.color = 'black';
                }

                tEstLines += Number(1);
                ttotalorders += Number(Orderqty);
                tTotalamount += parseFloat(estprice);

            }
            $('#txtEstLines').val(tEstLines);
            $('#txttotalorders').val(ttotalorders);
            $('#txtTotalamount').val(tTotalamount.toFixed(2));
            $('#salesum').text(parseFloat(tTotalamount).toFixed(2));

            $('#invdsic').text(parseFloat((tTotalamount * invval / 100)).toFixed(2));
            let crnote2 = parseFloat(tTotalamount * crnoteval / 100);
            let slscomm2 = parseFloat(tTotalamount * slsper / 100);
            let volumedis2 = parseFloat(tTotalamount * volper / 100);
            let avireb2 = parseFloat(tTotalamount * aviper / 100);
            $('#crnote').text(crnote2.toFixed(2));
            $('#slscomm').text(slscomm2.toFixed(2));
            $('#volumedis').text(volumedis2.toFixed(2));
            $('#avireb').text(avireb2.toFixed(2));

            var salse = parseFloat($('#salesum').text());
            var slscomm = parseFloat($('#slscomm').text());
            var volumedis = parseFloat($('#volumedis').text());
            var avireb = parseFloat($('#avireb').text());
            var crnote = parseFloat($('#crnote').text());
            var invdsic = parseFloat($('#invdsic').text());

            var allcom = (slscomm + volumedis + avireb + crnote + invdsic);
            $('#netsales').text((salse - allcom).toFixed(2));

        }
    </script>


@stop


@section('content')
