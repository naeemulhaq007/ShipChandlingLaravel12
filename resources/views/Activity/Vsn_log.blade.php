@extends('layouts.app')



@section('title', 'VSN Log')

@section('content_header')
    <meta name="csrf-token" content="{{ csrf_token() }}" />

@stop

@section('content')
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
        <div class="col-lg-12 pt-2 card">
            <div class="card-header">
                <h2 class="text-blue text-bold">VSN LOG</h2>

            </div>
            <div class="card-body">






        <div class="">

            <div class="rounded shadow table-responsive">
                <table class="table table-inverse table-bordered " id="vsnlog">
                    <thead class="bg-info">

                        <tr>
                            <th style="width: 50px">+</th>
                            <th style="width: 50px">Time</th>
                            <th style="width: 50px">VSN&nbsp;Event&nbsp;#</th>
                            <th style="width: 200px" >Vessel</th>
                            <th style="width: 50px">p</th>
                            <th style="width: 50px">D</th>
                            <th style="width: 50px">C</th>
                            <th style="width: 50px">E</th>
                            <th style="width: 100px">Delivery&nbsp;Location</th>
                            <th style="width: 100px">Agency</th>
                            <th style="width: 100px" >Status</th>
                            <th style="width: 100px">Customer&nbsp;Comment</th>
                            <th style="width: 100px">Warehouse&nbsp;Comment</th>
                            <th style="width: 100px">Sales&nbsp;Comments</th>
                            <th style="width: 100px">Port</th>
                            <th style="width: 100px">Est&nbsp;ValueNot&nbsp;Shipped</th>
                            <th style="width: 100px">No&nbsp;Of&nbsp;Charge</th>
                            <th style="width: 100px">Truck</th>
                            <th style="width: 100px">DM&nbsp;Return</th>
                            <th style="width: 100px">Warehouse</th>
                        </tr>
                    </thead>
                    <tbody id="VsnlogTablebody">


                    </tbody>
                </table>

            </div>
        </div>

        <div class=" ">
            <div class="row py-2">
                <div class="col-sm-6">
                    <div class="row py-2">
                        <button class="btn btn-info  mx-1 col-sm-2" id="Button3" role="button">Add Status</button>
                        <button class="btn btn-info  mx-1 col-sm-2" id="Button6" role="button">Agent Reg</button>
                        <button class="btn btn-info  mx-1 col-sm-2" id="BtnChargeOrderForm" role="button">Add Truck</button>
                        <button class="btn btn-info  mx-1 col-sm-2" id="Button4" role="button">Event Log</button>
                        <button class="btn btn-success  mx-1" id="Button22" role="button"> <i class="fa fa-search mr-1"
                                aria-hidden="true"></i>Account Summary</button>

                    </div>
                    <div class="row py-2">
                        <button class="btn btn-info  mx-1 col-sm-2 " id="Button10" role="button">Agent Detail</button>
                        <button class="btn btn-info  mx-1 col-sm-2 " id="Button9" role="button">Add Driver</button>
                        <button class="btn btn-info  mx-1 col-sm-2 " id="Button8" role="button">Flip To VSN</button>
                        <button class="btn btn-info  mx-1 col-sm-2 " id="CmdDeleteEmptyVSN" role="button">Delete VSN</button>


                    </div>
                    <div class="row py-2">
                        <button class="btn btn-info  mx-1 col-sm-2" id="Button5" role="button">Quotation</button>
                        <button class="btn btn-info  mx-1 col-sm-2" id="CmdOrderTransfer" role="button">Order</button>
                        <button class="btn btn-info  mx-1 col-sm-2" id="Button7" role="button">Vessel Reg</button>
                        <button class="btn btn-info  mx-1 col-sm-2" id="CmdOrderLog" role="button">Order Log</button>



                    </div>

                    <div class="row py-2">
                        <div class="input-group col-sm-12 ml-2">
                            <div class="rdform row mt-3 ml-3">
                                <input id="OptCustomer" type="radio" class="rainput" autocomplete="off" name="hopping2"
                                    value="" checked>
                                <label class="ralabel mx-2" for="OptCustomer"><span></span>Customer</label>
                                <input id="OptVessel" type="radio" class="rainput" autocomplete="off" name="hopping2"
                                    value="">
                                <label class="ralabel  mx-2" for="OptVessel"><span></span>Vessels</label>
                                <input id="OptAgent" type="radio" class="rainput" autocomplete="off" name="hopping2"
                                value="">
                            <label class="ralabel  mx-2" for="OptAgent"><span></span>Agent</label>
                            <input id="OptLocation" type="radio" class="rainput" autocomplete="off" name="hopping2"
                            value="">
                        <label class="ralabel  mx-2" for="OptLocation"><span></span>Location</label>
                        <input id="OptPort" type="radio" class="rainput" autocomplete="off" name="hopping2"
                        value="">
                    <label class="ralabel  mx-2" for="OptPort"><span></span>Ports</label>
                                <div class="worm">
                                    @for ($j = 0; $j < 30; $j++)
                                        <div class="worm__segment"></div>
                                    @endfor
                                </div>
                            </div>

                        </div>



                    </div>
                    <div class="row py-2">
                        <a class="btn btn-danger mx-1" id="CmdExit" href="/" role="button"> <i class="fa fa-door-open mr-1"
                                aria-hidden="true"></i>Exit</a>
                        {{-- <button class="btn btn-primary mx-1" id="BtnGo" role="button">Go OLD</button> --}}
                    </div>

                </div>

                <div class="col-sm-6">

                    <div class="row py-2">
                        <button class="btn btn-info mx-1 col-sm-2" id="CmdPORec" role="button">PO REC</button>

                        <div class="inputbox col-sm-2">
                            <input id="TxtPORec">
                            <span class="Txtspan">Po Rec
                            </span>

                        </div>
                        <button class="btn btn-info " id="CmdOpenPO" role="button">Open</button>
                    </div>
                    <div class="row py-1">
                        <button class="btn btn-info mx-1 col-sm-2 " id="CmdCharge" role="button">Charge #</button>
                        <div class="inputbox col-sm-2 ">
                            <input id="TxtChargeNo">
                            <span class="Txtspan">Charge #
                            </span>

                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="inputbox col-sm-6">
                            <input type="text" id="CmbFilter" class=" " name="" list="SEARVH">
                            <datalist id="SEARVH">
                                <option value="">
                                <option value="">
                            </datalist>
                            <span class="Txtspan">Filters</span>
                        </div>
                        <button class="btn btn-info  mx-1" id="Button2" role="button"> <i class="fa fa-search mr-1"
                            aria-hidden="true"></i></button>
                        <div class="inputbox col-sm-2 ">
                            <input id="TxtCustomerCode">
                            <span class="Txtspan">C.Code
                            </span>

                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="inputbox col-sm-4">
                            <span class="Txtspan" id="">Status</span>
                            <select id="CmbStatus"  class="" name="">
                                <option selected value="ALL">ALL</option>
                                @foreach ($StatusName as $item)
                                <option value="{{$item->StatusCode}}">{{$item->StatusName}}</option>
                                @endforeach
                            </select>
                        </div>
                    {{-- </div>
                    <div class="row py-2"> --}}
                        <div class="inputbox col-sm-4">
                            <span class="Txtspan" id="">DM </span>
                            <select id="CmBDMShow"  class="" name="">
                                <option selected value="ALL">ALL</option>
                                <option  value="SHOW DM">SHOW DM</option>

                            </select>

                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="inputbox col-sm-4">
                            <span class="Txtspan" id="">WareHouse</span>
                            <select id="CmbGodownName"  class="" name="">
                                <option selected value="0">Select WareHouse</option>
                                @foreach ($Godown as $GodownCode=> $GodownName)
                                <option value="{{$GodownCode}}">{{$GodownName}}</option>
                                @endforeach
                            </select>
                        </div>

                    {{-- </div>
                    <div class="row py-2"> --}}

                    <div class="inputbox col-sm-4">
                        <input type="date" class="" id="TxtDateFrom" required="required">
                        <span class="Txtspan">
                           ETA From
                        </span>
                    </div>
                    </div>
                    <div class="row py-2">
                        <button class="btn btn-success mx-1 col-sm-2" id="BtnGoNew" role="button"> Go</button>
                        <button class="btn btn-danger mx-1 col-sm-2" id="Button1" role="button">Clear Filters</button>

                    </div>



                </div>



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
            transform: translateX(7.7em);
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

        .rainput:nth-of-type(3):checked~.worm .worm__segment {
            transform: translateX(13.9em);
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
        }

        .rainput:nth-of-type(4):checked~.worm .worm__segment {
            transform: translateX(19.5em);
        }

        .rainput:nth-of-type(4):checked~.worm .worm__segment:before {
            animation-name: hop4;
        }

        @keyframes hop4 {

            from,
            to {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-1.5em);
            }
        }
        .rainput:nth-of-type(5):checked~.worm .worm__segment {
            transform: translateX(26.3em);
        }

        .rainput:nth-of-type(5):checked~.worm .worm__segment:before {
            animation-name: hop5;
        }

        @keyframes hop5 {

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
    function AjaxSetup(){
        $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                }

            $(document).ready(function() {
                var today = new Date().toISOString().split('T')[0];
                $('#TxtDateFrom').val(today);
                var tabe = $('#vsnlog').DataTable({
                    scrollY: '600px',
                    scrollX: true,
                    deferRender: true,
                    scroller: true,
                    paging: true,
                    info: false,
                    ordering: false,
                    responsive: true,
                    searching: false,
                    processing: true,
                    serverSide: true, // Enable server-side processing
                    ajax: {
                        url: "{{ route('VsllogSerach') }}",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "POST",
                        data: function(d) {
                            var Qry = "";

                            if ($("#TxtDateFrom").val()) {
                                Qry = "DeliveryDate>='" + $("#TxtDateFrom").val() + "'";
                            }

                            if ($("#OptCustomer").prop("checked") === true && $("#CmbFilter").val() !== "") {
                                Qry += (Qry ? " and " : "") + "CustomerCode=" + parseInt($("#TxtCustomerCode").val());
                            }

                            if ($("#OptVessel").prop("checked") === true && $("#CmbFilter").val() !== "") {
                                Qry += (Qry ? " and " : "") + "QryVsnLog.VesselName ='" + $("#CmbFilter").val() + "'";
                            }

                            if ($("#OptAgent").prop("checked") === true && $("#CmbFilter").val() !== "") {
                                Qry += (Qry ? " and " : "") + "Agent='" + $("#CmbFilter").val() + "'";
                            }

                            if ($("#OptPort").prop("checked") === true && $("#CmbFilter").val() !== "") {
                                Qry += (Qry ? " and " : "") + "Port='" + $("#CmbFilter").val() + "'";
                            }

                            if ($("#OptLocation").prop("checked") === true && $("#CmbFilter").val() !== "") {
                                Qry += (Qry ? " and " : "") + "Location='" + $("#CmbFilter").val() + "'";
                            }

                            if ($("#CmbStatus").val() !== "" && $("#CmbStatus").val() !== "ALL") {
                                Qry += (Qry ? " and " : "") + "Status='" + $("#CmbStatus").val() + "'";
                            }

                            if (parseInt($("#CmbGodownName").val()) !== 0) {
                                Qry += (Qry ? " and " : "") + "GodownCode=" + parseInt($("#CmbGodownName").val());
                            }

                            d.Qry = Qry; // Pass the query string to the server
                        },
                        beforeSend: function() {
                            $('.overlay').show();
                        },
                        complete: function() {
                            $('.overlay').hide();
                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops... Something went wrong!',
                                text: error,
                                footer: '<a href>Why do I have this issue?</a>'
                            });
                        }
                    },
                    columns: [
                        {
                            data: null, // No actual data field, it's just a button
                            orderable: false, // Disable sorting on this column
                            searchable: false,
                            className: "text-center", // Center align button
                            render: function(data, type, row) {
                                return `<button class="btn btn-primary btn-sm expand-btn" data-id="${row['VSNNo']}">+</button>`;
                            }
                        },
                        { data: "Time" },
                        { data: "VSNNo" },
                        { data: "VesselName" },
                        { data: "P" },
                        { data: "D" },
                        { data: "C" },
                        { data: "E" },
                        { data: "Location" },
                        { data: "Agency" },
                        { data: "Status" },
                        { data: "Comments" },
                        { data: "WarehouseComments" },
                        { data: "SalesComments" },
                        { data: "Port" },
                        { data: "FlipAmount" },
                        { data: "TotalFlip" },
                        { data: "TruckName" },
                        {  data: null, // No actual data field, it's just a button
                            orderable: false, // Disable sorting on this column
                            searchable: false,
                            render: function(data, type, row) {
                                return ``;
                            } },
                        { data: "ShippingPort" }

                    ]
                });

                // Refresh table on button click
                $('#BtnGoNew').click(function(e) {
                    e.preventDefault();
                    tabe.ajax.reload();
                });

                $('#vsnlog tbody').on('click', '.expand-btn', function() {
                    var eventId = $(this).data('id');
                    window.location.href = 'ChargeList-VSN?VSN=' + eventId;
                    // Here you can perform any action, such as fetching details via AJAX
                });
            });


        </script>
    @stop


    @section('content')
