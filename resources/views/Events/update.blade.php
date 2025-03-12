@extends('layouts.app')



@section('title', 'Events')

@section('content_header')
@stop

@section('content')
    <?php echo View::make('partials.search'); ?>
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </strong>
        </div>
    @endif
    </div>


    <div class="container-fluid">
        <div class="col-lg-12 pt-3">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="inputbox col-sm-1 ">
                            <input type="number" class="" value="{{ $EventNo }}" id="EventNo">
                            <span class="Txtspan">
                                Event
                            </span>
                        </div>
                        <button id="newevent" class="btn btn-primary">New Event</button>

                        <h2 class="ml-auto">Event Update</h2>
                        <div class="card-tools ">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>

                    </div>
                </div>
                <div class="card-body">
                    <form id="eventform" action="/event/store" method="post">

                        @csrf
                        <div class="col-md-12">
                            <div class="row pt-2">


                                <div class="inputbox col-sm-6 ml-4">
                                    <textarea title="GeneralVessel" placeholder="" name="GeneralVesselNote" id="generalvessel" cols="10"
                                        rows="2"></textarea>


                                    <span class="Txtspan">
                                        General Vessel : </span>

                                </div>
                            </div>













                            <div class="container-fluid">
                                <input type="hidden" class="form-control" name="EventNo" id="eventid" title="eventid">



                                <div class="row py-2">
                                    <input hidden type="hidden" class="" name="Customercode" id="companycode"
                                        required="required" placeholder="Customer Code" readonly>

                                    <div hidden class="inputbox  ">
                                        <input type="hidden" class=" " name="CusCode" id="Custcode">
                                        <span class="ml-2">
                                            C.Code
                                        </span>
                                    </div>
                                    <div hidden class="inputbox  ">
                                        <input type="hidden" class=" " name="BranchCode" id="BranchCode">
                                        <span class="ml-2">
                                            B.Code
                                        </span>
                                    </div>
                                    <div hidden class="inputbox  ">
                                        <input type="hidden" class=" " name="CustomerActCode" id="ACTcode"
                                            required="required">
                                        <span class="ml-2">
                                            C. Act. Code
                                        </span>
                                    </div>
                                    <div class="inputbox col-sm-6">
                                        <input type="text" class="" name="CustomerName" id="companyname"
                                            data-toggle="modal" data-target="#searchrmod" required readonly
                                            value="{{ old('CustomerName') }}" title="Customer Name"
                                            placeholder="Customer Name">
                                        <span class="Txtspan">
                                            Customer
                                        </span>
                                    </div>
                                    <div class="input-group-append">
                                        <span data-toggle="modal" data-target="#searchrmod" data-id="cussearch"
                                            class="input-group-text bg-info" style="cursor: pointer;" id="cussearch"><i
                                                class="fas fa-search"></i></span>
                                    </div>

                                    <div class="inputbox col-sm-2">
                                        <span class="Txtspan">
                                            Warehouse
                                        </span>
                                        <select required name="GodownCode" id="GodownName">

                                            <option id="" value="" selected> </option>
                                            {{-- @foreach ($warehouse as $item)
                                                        <option id="{{ $item->GodownCode }}"
                                                            data-GodownCode="{{ $item->GodownCode }}"
                                                            value="{{ $item->GodownCode }}">{{ $item->GodownName }}
                                                        </option>
                                                    @endforeach --}}

                                        </select>
                                    </div>
                                    <div class="col-sm-1 py-2">

                                        <a href="{{ route('warehouse-setup') }}" target="_blank" type="button"
                                            class="btn btn-tool">
                                            <i class="fas fa-plus"></i>
                                        </a>
                                    </div>
                                </div>

                                <div class="row py-2">



                                    <div hidden class="inputbox col-sm-3 ">
                                        <input type="number" class=" " name="IMONo" id="vesselcode"
                                            value="" title="IMONo" placeholder="Vcode" readonly>
                                        <span class="Txtspan">
                                            Vess. Code
                                        </span>
                                    </div>
                                    <div hidden class="inputbox col-sm-2 ">
                                        <input type="hidden" class=" " name="Vcode" id="Vcode"
                                            value="" title="Vcode" placeholder="IMONo" readonly>
                                        <span class="ml-1">
                                            V. Code
                                        </span>
                                    </div>
                                    <div hidden class="inputbox col-sm-2 ">
                                        <input type="hidden" class=" " name="vid" id="vid"
                                            value="" title="vid" placeholder="vid" readonly>
                                        <span class="ml-1">
                                            Vid. Code
                                        </span>
                                    </div>
                                    <div class="inputbox col-sm-6">
                                        <input type="text" class="" value="" readonly required
                                            name="VesselName" data-toggle="modal" data-target="#searchrmodw"
                                            id="vesselname" title="Vessel Name" placeholder="Vessel Name">
                                        <span class="Txtspan">
                                            Vessel
                                        </span>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-info" style="cursor: pointer;"
                                            data-toggle="modal" data-target="#searchrmodw" id="vensearch">
                                            <i class="fas fa-search"></i></span>
                                    </div>
                                    <div class="inputbox col-sm-2">
                                        <span class="Txtspan">
                                            Port
                                        </span>
                                        <select required name="ShippingPort" id="ShippingPort">
                                            {{-- @foreach ($shiping as $item)
                                                        <option value="{{ $item->PortName }}">
                                                            {{ $item->PortName }}</option>
                                                    @endforeach --}}
                                        </select>

                                    </div>
                                    <div class="col-sm-1 py-2">
                                        <a type="button" href="{{ route('shipingport-setup') }}" target="_blank"
                                            class="btn btn-tool">
                                            <i class="fas fa-plus"></i>
                                        </a>
                                    </div>
                                </div>



                                <div class="row py-2">
                                    <div class="inputbox col-sm-3">
                                        <span class="Txtspan">
                                            Contact
                                        </span>
                                        <select type="text" name="Contact" id="Contact" title="Contact"
                                            placeholder="Contact Person">
                                        </select>

                                    </div>
                                    <div class="inputbox col-sm-3">
                                        <input type="text" name="Name" id="name" title="name">
                                        <span class="Txtspan">
                                            Name
                                        </span>
                                    </div>

                                    <div class="inputbox col-sm-3">
                                        <input type="text" name="Cell" id="cell" title="cell"
                                            placeholder="">
                                        <span class="Txtspan">
                                            Cell
                                        </span>
                                    </div>

                                </div>

                                <div class="row py-2">
                                    <input type="hidden"name="GodownName" id="godown" value="" placeholder="">
                                    <div class="inputbox col-sm-3">
                                        <span class="Txtspan">
                                            RtnVia
                                        </span>
                                        <select name="ReturnVia" id="ReturnVia">

                                            <option selected> </option>

                                            <option value="Shipserv">Shipserv</option>
                                            <option value="Email">Email</option>
                                            <option value="E-Com">E-Com</option>
                                            <option value="Excel to Customer">Excel to Customer</option>
                                            <option value="PDF-Email">PDF-Email</option>
                                            <option value="Excel To Vessel">Excel To Vessel</option>
                                            <option value="Portal E-Com">Portal E-Com</option>
                                            <option value="Cust File">Cust File</option>
                                            <option value="Not Assigned">Not Assigned</option>



                                        </select>
                                    </div>
                                    <div class="inputbox col-sm-3">
                                        <input type="tel" name="Phone" id="phoneno">
                                        <span class="Txtspan">
                                            Phone
                                        </span>
                                    </div>
                                    <div class="inputbox col-sm-3">
                                        <input type="text" name="Email" id="email" title="email"
                                            placeholder="">
                                        <span class="Txtspan">
                                            Email
                                        </span>
                                    </div>
                                </div>


                                <div class="row py-2">

                                    <div class="inputbox col-sm-3">
                                        <input type="date" required name="ETA" id="ETA">
                                        <span class="Txtspan">
                                            ETA
                                        </span>

                                    </div>

                                    <div class="inputbox col-sm-3">
                                        <input required type="date" name="BidDUeDate" id="BidDueDates">
                                        <span class="Txtspan">
                                            Bid DueDate
                                        </span>
                                    </div>

                                    <div class="inputbox col-sm-3">
                                        <input type="time" id="appt" name="DueTime">
                                        <span class="Txtspan">
                                            Due Time
                                        </span>
                                    </div>



                                </div>

                                <div class="row py-2">
                                    {{-- <div class="inputbox col-sm-3">
                                                        <span class="Txtspan">
                                                            Status
                                                        </span>
                                                        <select required name="Status" id="Status">

                                                            <option selected> </option>
                                                            <option value="IN PROCESS">IN PROCESS</option>
                                                            <option value="CANCELED">CANCELED</option>
                                                            <option value="CLOSED">CLOSED</option>
                                                            <option value="ORDER RECEIVED">ORDER RECEIVED</option>


                                                        </select>
                                                    </div> --}}

                                    <div class="inputbox col-sm-3">
                                        <span class="Txtspan">
                                            Priority
                                        </span>
                                        <select required name="Priority" id="Priority">

                                            <option selected>Select one</option>
                                            <option value="Low">Low</option>
                                            <option value="Medium">Medium</option>
                                            <option value="High">High</option>
                                            <option value="N/A">N/A</option>



                                        </select>
                                    </div>
                                    <div class="">

                                    </div>


                                </div>





                                <button type="button" id="deletebtn" class="btn btn-danger mx-1"><i
                                        class="fa fa-file mr-1" aria-hidden="true"></i>Delete</button>
                                <button type="submit" id="updatebtn" class="btn btn-primary"><i
                                        class="fa fa-file-archive mr-1" aria-hidden="true"></i>Update
                                    Event</button>

                            </div>

                    </form>

                </div>
            </div>









            <div id="internal" class="tab-pane  in fade">

                <div class="container-fluid">
                    <table class="table table-striped table-inverse table-responsive table-bordered table-hover">
                        <thead class="thead-inverse">
                            <tr>
                                <th>Follow Up</th>
                                <th>Date</th>
                                <th>Work User</th>
                            </tr>
                        </thead>
                        <tbody class="folow">


                        </tbody>
                    </table>
                </div>




            </div>
            <?php echo View::make('partials.searchves'); ?>
        </div>

    </div>




    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#home">Single Quote</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#menu1">Multiple Quote</a>
                </li>
            </ul>

        </div>
        <div class="card-body">
            <div class="tab-content">
                <div id="home" class="tab-pane fade show active">
                    <form action="/quote/store" id="quoteform" method="post">
                        @csrf
                        <div class="col-md-12">
                            <div class="row py-2">
                                <div class="inputbox col-sm-4">
                                    <span class="Txtspan" id="">Department</span>
                                    <select name="DepartmentName" id="Department">

                                        <option selected> </option>
                                        @foreach ($deptype as $item)
                                            <option value="{{ $item->TypeName }}" value="" class="depname"
                                                data-depcode="{{ $item->TypeCode }}" id="{{ $item->TypeCode }}">
                                                {{ $item->TypeName }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <input type="hidden" name="DepartmentCode" id="Department_coder"
                                    title="Department_coder" placeholder="">
                                <div class="col-sm-3"></div>

                                <div class="inputbox col-sm-4">
                                    <span class="Txtspan" id="">Quote No</span>
                                    <input type="text" readonly name="Quote_No" id="Quote_No" title="Quote_No"
                                        placeholder="">
                                    <input type="hidden" name="QuoteNo" id="QuoteNo" title="QuoteNo" placeholder="">
                                </div>

                                <input type="hidden" name="EventNo2" value="" id="eventi"
                                    title="eventidquote">
                            </div>
                            <div class="row py-2">

                                <div class="inputbox col-sm-4">
                                    <span class="Txtspan" id="">Customer Ref#</span>
                                    <input type="text" name="CustomerRef" id="CustomerRef" title="CustomerRef"
                                        placeholder="">


                                </div>
                                <div class="col-sm-3"></div>


                                <div class="inputbox col-sm-4">
                                    <span class="Txtspan" id="">Est.Lines Quote</span>
                                    <input type="text" name="EstLineQuote" id="EstLinesQuote" title="EstLinesQuote"
                                        placeholder="">
                                </div>


                            </div>
                            <div class="row py-2">

                                <div class="inputbox col-sm-4">
                                    <span class="Txtspan" id="">Bid DueDate</span>
                                    <input format="dd-MMMM-yyyy" type="date" id="BidDUeDate2" name="BidDUeDate2">
                                </div>
                                <div class="col-sm-3"></div>
                                <div class="inputbox col-sm-4">
                                    <span class="Txtspan" id="">Due Time</span>
                                    <input type="time" id="DueTme2" name="DueTme2">
                                </div>


                            </div>
                            <div class="row py-2">

                                <div class="inputbox col-sm-4">
                                    <span class="Txtspan" id="">Rtn Via</span>
                                    <select name="ReturnVia" id="ReturnVia2">

                                        <option selected> </option>

                                        <option value="Shipserv">Shipserv</option>
                                        <option value="Email">Email</option>
                                        <option value="E-Com">E-Com</option>
                                        <option value="Excel to Customer">Excel to Customer</option>
                                        <option value="PDF-Email">PDF-Email</option>
                                        <option value="Excel To Vessel">Excel To Vessel</option>
                                        <option value="Portal E-Com">Portal E-Com</option>
                                        <option value="Cust File">Cust File</option>
                                        <option value="Not Assigned">Not Assigned</option>

                                    </select>
                                </div>

                                <div class="col-sm-3"></div>

                                <div class="inputbox col-sm-4">
                                    <span class="Txtspan" id="">Assign User</span>

                                    <select name="WorkUser" id="asuser">

                                        <option selected> </option>
                                        @foreach ($userss as $item)
                                            <option value="{{ $item->UserName }}">{{ $item->UserName }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <button type="submit" id="SaveQuote" class="btn btn-primary"><i
                                        class="fa fa-file-archive mr-1" aria-hidden="true"></i>Save Quote</button>
                            </div>
                        </div>


                        <input type="hidden" name="ShipId" id="ShipId" value="{{ $ShipId ? $ShipId : '' }}">
                        <input type="hidden" name="Token" id="Token" value="{{ $Token ? $Token : '' }}">
                    </form>
                </div>





                <div id="menu1" class="tab-pane fade">
                    <div class="row">


                        <div class="col-sm-12 table-responsive">


                            <table class="table table-bordered  " id="myTable">
                                <thead>
                                    <tr>
                                        <th class="px-5">Department</th>
                                        <th>Customer&nbsp;Ref&nbsp;#</th>
                                        <th>Est&nbsp;Lines&nbsp;Quote</th>
                                        <th>Bid&nbsp;Due&nbsp;Date</th>
                                        <th>Due&nbsp;Time</th>
                                        <th>Rtn&nbsp;Via</th>
                                        <th>Department&nbsp;Code</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="inputbox">
                                                <select class="DepartmentN" name="DepartmentName" id="Department">

                                                    <option selected> </option>
                                                    @foreach ($deptype as $item)
                                                        <option value="{{ $item->TypeName }}" value=""
                                                            class="depnameq" data-depcode="{{ $item->TypeCode }}"
                                                            id="{{ $item->TypeCode }}">
                                                            {{ $item->TypeName }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </td>
                                        <td class="CustomerRef2" contenteditable="true"></td>
                                        <td contenteditable="true"></td>
                                        <td>
                                            <div class="inputbox">
                                                <input type="date" id="bidDueDate" name="bidDueDate">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="inputbox">
                                                <input type="time" id="dueTime" name="dueTime">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="inputbox">
                                                <select name="ReturnVia" id="ReturnVia">

                                                    <option selected> </option>

                                                    <option value="Shipserv">Shipserv</option>
                                                    <option value="Email">Email</option>
                                                    <option value="E-Com">E-Com</option>
                                                    <option value="Excel to Customer">Excel to Customer</option>
                                                    <option value="PDF-Email">PDF-Email</option>
                                                    <option value="Excel To Vessel">Excel To Vessel</option>
                                                    <option value="Portal E-Com">Portal E-Com</option>
                                                    <option value="Cust File">Cust File</option>
                                                    <option value="Not Assigned">Not Assigned</option>

                                                </select>
                                            </div>
                                        </td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>


                    </div>
                    <div class="row py-1">

                        <button class="form-control mx-1 col-sm-1 ml-auto btn-warning" onclick="addRow()">Add Row</button>
                        <button class="form-control mx-1 col-sm-1 btn-danger" onclick="deleteRow()">Delete Row</button>
                        <button class="form-control mx-1 col-sm-1 btn-success" onclick="saveTable()"
                            id="submitquote">Save
                            Quotes</button>

                    </div>
                </div>
            </div>

        </div>
    </div>





    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Quotes</h5>
        </div>
        <div class="card-body">
            <table class="table  table-inverse " id="qoutestable">
                <thead class="">
                    <tr>
                        <th>Event#</th>
                        <th>Department&nbsp;Name</th>
                        <th>Customer&nbsp;Ref#</th>
                        <th>Bid&nbsp;Due&nbsp;Date</th>
                        <th>Rtn&nbsp;Via</th>
                        <th>Quote&nbsp;No</th>
                        <th>EST&nbsp;Line&nbsp;Quote</th>
                        <th>Due&nbsp;Time</th>
                        <th>WorkUser</th>
                    </tr>
                </thead>
                <tbody id="qoutesBody">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tbody>
            </table>

        </div>
    </div>
    {{-- </div> --}}
@stop

@section('css')
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css"> --}}
    <style>
    </style>
@stop

@section('js')
    {{-- <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script> --}}
    <script>
        function ajaxSetup() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        }

        function updategodown(code) {
            ajaxSetup();
            $.ajax({
                type: "get",
                url: "{{ route('Es_godownsetup') }}",
                // data: "data",
                success: function(response) {
                    console.log(response);
                    if (response.warehouse) {
                        // alert('data');
                        var selectElement = $('#GodownName');
                        var optionsArray = response.warehouse;
                        selectElement.empty();
                        selectElement.append($('<option>', {
                            value: '',
                            text: ''
                        }));
                        $.each(optionsArray, function(index, value) {
                            // console.log(value);
                            selectElement.append($('<option>', {
                                value: value.GodownCode,
                                text: value.GodownName
                            }));
                        });
                        $('#GodownName').val(code);

                    }

                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        function updateport(code) {
            ajaxSetup();
            $.ajax({
                type: "get",
                url: "{{ route('Es_portsetup') }}",
                // data: "data",
                success: function(response) {
                    console.log(response);
                    if (response.shiping) {
                        // alert('data');
                        var selectElement = $('#ShippingPort');
                        var optionsArray = response.shiping;
                        selectElement.empty();
                        selectElement.append($('<option>', {
                            value: '',
                            text: ''
                        }));
                        $.each(optionsArray, function(index, value) {
                            // console.log(value);
                            selectElement.append($('<option>', {
                                value: value.PortName,
                                text: value.PortName
                            }));
                        });
                        $('#ShippingPort').val(code);

                    }

                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        function chekrefence(refno) {
            var EventNo = '{{ $EventNo }}';
            var Quote_No = $('#Quote_No').val();
            if (!Quote_No) {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: '{{ URL::to('refcheck') }}',
                    data: {
                        refno,
                        EventNo,
                    },
                    success: function($response) {
                        if ($response.Code == 'Success') {
                            Swaal.fire({
                                icon: 'error',
                                title: 'CustomerRef is Exits',
                                text: 'CustomerRef is Exits on this Event : ' + $response.data +
                                    ', And This Quote : ' + $response.QuoteNo,
                                footer: '<a href="https://wa.link/d2jy7g">Why do I have this issue?</a>'
                            })
                        } else {

                            console.log($response.data);
                        }
                    },
                });
            }
        }
        $(document).on("dblclick", ".js-click", function() {
            $targetcustcode = $(this).attr('data-custcode');
            $targetact = $(this).attr('data-act');
            $targetcuscode = $(this).attr('data-cuscode');
            $targetcusname = $(this).attr('data-cusname');
            // $targetID = $(this).attr('data-id');


            //value set


            document.getElementById("companyname").value = $targetcusname;
            document.getElementById("companycode").value = $targetcustcode;
            $('#searchcustname').val($targetcusname);

            document.getElementById("searchbox").value = $targetcustcode;
            document.getElementById("Custcode").value = $targetcuscode;
            document.getElementById("ACTcode").value = $targetact;
            $('#searchrmod').modal('hide');
            if ($targetcusname) {
                $("#companycode").change();

            }
            $('#searchrmodw').modal('show');

        });
        $(document).ready(function() {
            $('#GodownName').click(function(e) {
                // e.preventDefault();
                var code = $(this).val();
                updategodown(code);
            });
            $('#ShippingPort').click(function(e) {
                // e.preventDefault();
                var code = $(this).val();
                updateport(code);
            });

            let a = {{ $lastQuote }};
            a++;
            let c = a;

            var inputq = document.getElementById("QuoteNo");
            inputq.value = c;

            $("#quoteform").submit(function() {
                $("#SaveQuote").attr("disabled", true);
            });
            $("#eventform").submit(function() {
                $("#updatebtn").attr("disabled", true);
            });
            $('#newevent').click(function(e) {
                window.location.href = "/events-setup";

            });
            $('#deletebtn').click(function(e) {
                var passwords = prompt("Please enter Supervisor Password");
                if (passwords === "332211") {
                    if (confirm("Are you sure you want to proceed?")) {
                        let EventNo = '{{ $EventNo }}';
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            type: 'POST',
                            url: '{{ URL::to('deleteevent') }}',
                            data: {
                                EventNo,
                            },
                            success: function($response) {
                                if ($response.Code == 'Success') {
                                    window.location.href = "/events-setup";

                                } else {

                                    console.log($response.data);
                                }
                            },
                        });
                        // proceed with action
                    } else {
                        alert("Access denied.");
                        return;
                    }
                } else {
                    alert("Incorrect password.");
                    return;
                }
            });
            // Listen for change events on all Department select elements
            $(document).on('change', 'select[id^="Department"]', function() {
                // Get the data-depcode value of the selected option
                var depCode = $(this).find('option:selected').data('depcode');
                // Find the corresponding row and update its last cell
                $(this).closest('tr').find('td:last').text(depCode);
            });

            $("#Department").on('change', function() {
                var id = this.options[this.selectedIndex].id;
                // console.log(id);
                document.getElementById("Department_coder").value = id;

            });

            $("#godown").on('change', function() {
                var id = this.options[this.selectedIndex].id;
                // console.log(id);
                document.getElementById("godowncode").value = id;
            });

            $(document).on("click", ".js-click", function() {
                $targetcustcode = $(this).attr('data-custcode');
                $targetact = $(this).attr('data-act');
                $targetcuscode = $(this).attr('data-cuscode');
                $targetcusname = $(this).attr('data-cusname');
                // $targetID = $(this).attr('data-id');


                //value set


                var inputF = document.getElementById("companyname");
                //   var inputr = document.getElementById("discompanyname");

                inputF.value = $targetcusname;
                var inputs = document.getElementById("companycode");
                var inputd = document.getElementById("searchbox");


                inputs.value = $targetcustcode;
                inputd.value = $targetcustcode;
                var inputq = document.getElementById("Custcode");


                inputq.value = $targetcuscode;
                var inputw = document.getElementById("ACTcode");


                inputw.value = $targetact;

                // console.log("Selected custcode:" + $targetcustcode);
                // console.log("Selected act:" + $targetact);
                // console.log("Selected cuscode:" + $targetcuscode);
                // console.log("Selected cusname:" + $targetcusname);
                // console.log("Selected ID:" + $targetID);
                // REMOVE WILL COME HERE
            });
            $("#companycode").change(function(e) {
                e.preventDefault();
                var customercode = $(this).val();
                // alert(customercode);

                ajaxSetup();
                $.ajax({
                    url: "/getcontact",
                    type: "POST",
                    data: {
                        customercode,
                    },

                    beforeSend: function() {
                        // Show the overlay and spinner before sending the request
                        $('.overlay').show();
                    },
                    success: function(response) {
                        console.log(response);

                        var contacts = response.contacts;
                        $('#Contact').empty(); // Clear existing options
                        $('#Contact').append($('<option>', {
                            value: '',
                            text: '-- Select Contact --'
                        }));
                        for (let i = 0; i < contacts.length; i++) {
                            let option = $('<option>', {
                                value: contacts[i].ID,
                                text: contacts[i].CustName
                            });
                            $('#Contact').append(option);
                        }

                        $('#Contact').change(function(e) {
                            e.preventDefault();
                            var id = $(this).val();
                            $.ajax({
                                url: "/getcontact",
                                type: "POST",
                                data: {
                                    customercode,
                                    id,
                                },
                                success: function(response) {
                                    console.log(response);
                                    if (response.Customercon) {
                                        var Customercon = response
                                            .Customercon;
                                        $('#name').val(Customercon
                                            .CustName);
                                        $('#cell').val(Customercon.Cell);
                                        $('#email').val(Customercon.Email);
                                        $('#phoneno').val(Customercon
                                            .Phone);
                                    }
                                }
                            });


                        });

                    },
                    failed: function(output) {
                        var errors = output.responseJSON;
                        alert(errors.message);
                        //Swal.close();
                    },
                    complete: function() {
                        // Hide the overlay and spinner after the request is complete
                        $('.overlay').hide();
                    }



                });
            });
        });
        $(document).on("dblclick", ".vesrow", function() {
            $targetvesname = $(this).attr('data-vesname');
            $targetvesimo = $(this).attr('data-vesimo');

            // document.getElementById("vesselname").value = $targetvesname;
            $('#vesselname').val($targetvesname);
            $('#vesselcode').val($targetvesimo);
            // document.getElementById("vesselcode").value = $targetvesimo;
            $('#searchrmodw').modal('hide');

        });

        function addRow() {
            var table = document.getElementById("myTable");
            var row = table.insertRow(-1);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
            var cell5 = row.insertCell(4);
            var cell6 = row.insertCell(5);
            var cell7 = row.insertCell(6);
            // cell1.contentEditable = true;
            cell1.innerHTML =
                '<select class="custom-select DepartmentN" name="DepartmentName" id="Department"><option selected> </option>@foreach ($deptype as $item)<option value="{{ $item->TypeName }}" value="" class="depname" data-depcode="{{ $item->TypeCode }}" id="{{ $item->TypeCode }}">{{ $item->TypeName }}</option>@endforeach</select>';
            cell2.contentEditable = true;
            cell2.classList.add('CustomerRef2');

            cell3.contentEditable = true;
            // cell4.contentEditable = true;
            cell4.innerHTML = '<input type="date" class="form-control" id="bidDueDate" name="bidDueDate">';
            // cell5.contentEditable = true;
            cell5.innerHTML = '<input type="time" class="form-control" id="dueTime" name="dueTime">';
            // cell6.contentEditable = true;
            cell6.innerHTML =
                '<select class="custom-select" name="ReturnVia" id="ReturnVia"><option selected> </option>        <option value="Shipserv">Shipserv</option>        <option value="Email">Email</option>        <option value="E-Com">E-Com</option>        <option value="Excel to Customer">Excel to Customer</option>        <option value="PDF-Email">PDF-Email</option>        <option value="Excel To Vessel">Excel To Vessel</option>        <option value="Portal E-Com">Portal E-Com</option>        <option value="Cust File">Cust File</option>        <option value="Not Assigned">Not Assigned</option></select>';
            // cell7.contentEditable = true;
            $(".CustomerRef2").on('blur', function() {
                // alert('check')
                var refno = $(this).text();
                chekrefence(refno);



            })
        }

        function deleteRow() {
            var table = document.getElementById("myTable");
            if (table.rows.length > 1) {
                table.deleteRow(-1);
            }
        }

        function saveTable() {
            var tableData = [];
            $("#myTable tbody tr").each(function() {
                var rowData = [];
                $(this).find("td").each(function() {
                    if ($(this).find("input[type='date']").length > 0) {
                        rowData.push($(this).find("input[type='date']").val());
                    } else if ($(this).find("input[type='time']").length > 0) {
                        rowData.push($(this).find("input[type='time']").val());
                    } else if ($(this).find("select").length > 0) {
                        rowData.push($(this).find("select").val());
                    } else {
                        rowData.push($(this).text());
                    }
                });
                tableData.push(rowData);
            });
            console.log(tableData);

            var EventNo = $('#EventNo').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ URL::to('Mqoutssave') }}',
                method: "POST",
                data: {
                    tableData,
                    EventNo,
                },
                success: function(response) {
                    alert(response.message);
                    let data = resposne.results;
                    let table = document.getElementById('qoutesBody');
                    table.innerHTML = ""; // Clear the table
                    var ids = 0;

                    data.forEach(function(item) {
                        ids = ids + 1;
                        var chekdate = new Date(item.BidDueDate);
                        const options = {
                            weekday: 'long',
                            year: 'numeric',
                            month: 'long',
                            day: 'numeric'
                        };
                        const dayOfWeek = chekdate.toLocaleString('en-US', options).split(',')[0];
                        // console.log(dayOfWeek);
                        const DateActYear = chekdate.toLocaleDateString("en-US", {
                            year: 'numeric',
                            month: '2-digit',
                            day: '2-digit'
                        });
                        const forDate = chekdate.toISOString().substring(0, 10);

                        let row = table.insertRow();

                        let EventnoCell = row.insertCell(0);
                        EventnoCell.innerHTML = item.EventNo;


                        let DepartmentNameCell = row.insertCell(1);
                        DepartmentNameCell.innerHTML = item.DepartmentName;

                        let CustomerRefCell = row.insertCell(2);
                        CustomerRefCell.innerHTML = item.CustomerRefNo;

                        let BidDueDateCell = row.insertCell(3);
                        BidDueDateCell.innerHTML = forDate;
                        //   RateCell.style.textAlign = 'right';

                        let RtnViaCell = row.insertCell(4);
                        RtnViaCell.innerHTML = item.ReturnVia;
                        //   AmountCell.style.textAlign = 'right';

                        let QuoteNoCell = row.insertCell(5);
                        QuoteNoCell.innerHTML = item.QuoteNo;

                        let ESTLineQuoteCell = row.insertCell(6);
                        ESTLineQuoteCell.innerHTML = item.EstLineQuote;

                        let DueTimeCell = row.insertCell(7);
                        DueTimeCell.innerHTML = item.DueTime;

                        let WorkUserCell = row.insertCell(8);
                        WorkUserCell.innerHTML = item.WorkUser;
                        //   IDCell.hidden = true;
                        const tableBody = document.getElementById("qoutesBody");
                        tableBody.addEventListener("click", function(e) {
                            if (e.target.tagName === "TD") {
                                const td = e.target;
                                const tr = td.parentNode;
                                const tdElements = tr.getElementsByTagName("td");
                                $('#eventi').val(tdElements[0].innerHTML);
                                $('#Department').val(tdElements[1].innerHTML);
                                $('#CustomerRef').val(tdElements[2].innerHTML);
                                $('#BidDUeDate2').val(tdElements[3].innerHTML);
                                $('#ReturnVia2').val(tdElements[4].innerHTML);
                                $('#Quote_No').val(tdElements[5].innerHTML);
                                $('#QuoteNo').val(tdElements[5].innerHTML);
                                $('#EstLinesQuote').val(tdElements[6].innerHTML);
                                $('#DueTme2').val(tdElements[7].innerHTML);
                                $('#asuser').val(tdElements[8].innerHTML);
                            }
                        });
                        tableBody.addEventListener("dblclick", function(e) {
                            if (e.target.tagName === "TD") {
                                const td = e.target;
                                const tr = td.parentNode;
                                const tdElements = tr.getElementsByTagName("td");
                                window.location.href = "/quotation?quote_no=" + tdElements[5]
                                    .innerHTML;

                                // Set the value of the input field to the third td element's inner HTML
                                // $('#TxtExpActName').val(tdElements[0].innerHTML);
                                // $('#TxtDescription').val(tdElements[1].innerHTML);
                                // $('#TxtQuantity').val(tdElements[2].innerHTML);
                                // $('#TxtRate').val(tdElements[3].innerHTML);
                                // $('#TxtAmt').val(tdElements[4].innerHTML);
                                // $('#TxtExpActCode').val(tdElements[5].innerHTML);
                                // $('#TxtID').val(tdElements[6].innerHTML);

                                // // Remove the row from the table
                                // tableBody.removeChild(tr);
                            }
                        });
                    })
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        }
        $(document).ready(function() {
            // $(selector).val();
            var ShipID = $('#ShipId').val();
            var Token = $('#Token').val();
            if (ShipID !== '') {
                fetchData();
            }
            async function fetchData() {
                ajaxSetup();
                $.ajax({
                    url: "{{ route('getshiptoevent') }}",
                    type: "POST",
                    data: {
                        ShipID,
                        Token,
                    },

                    beforeSend: function() {
                        // Show the overlay and spinner before sending the request
                        $('.overlay').show();
                    },
                    success: function(response) {
                        console.log(response);
                        if (response.data) {
                            var list = response.data;
                            $('#CustomerRef').val(list.referenceNumber);
                            $('#EstLinesQuote').val(list.lineItems.length);

                        }
                    },
                    failed: function(output) {
                        var errors = output.responseJSON;
                        alert(errors.message);
                        //Swal.close();
                    },
                    complete: function() {
                        // Hide the overlay and spinner after the request is complete
                        $('.overlay').hide();
                    }



                });

            }


            dataget();
            var table1 = $('#qoutestable').DataTable({
                scrollY: 350,
                deferRender: true,
                scroller: true,
                responsive: true,
                info: false,
                paging: false,
                ordering: false,
                searching: false,


            });
            var table = $('#myTable').DataTable({

            });


            //gettingdata
            function dataget() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '/QuoteGet',
                    type: 'POST',
                    data: {
                        Eventno: '{{ $EventNo }}',
                    },
                    success: function(resposne) {
                        console.log(resposne);
                        let data = resposne.results;
                        let eventfiller = resposne.eventfiller;
                        if (eventfiller) {
                            $('#eventi').val(eventfiller.EventNo);
                            $('#eventid').val(eventfiller.EventNo);
                            $('#followup').val(eventfiller.Note);
                            var selElement = $('#ShippingPort');
                            selElement.append($('<option>', {
                                value: eventfiller.ShippingPort,
                                text: eventfiller.ShippingPort
                            }));
                            $('#ShippingPort').val(eventfiller.ShippingPort);
                            $('#Priority').val(eventfiller.Priority);
                            $('#Status').val(eventfiller.Status);
                            console.log(eventfiller.ETA);

                            // var Edate = new Date(eventfiller.ETA);
                            // const ETA = Edate.toISOString().substring(0, 10);
                            // Edate.setMinutes(Edate.getMinutes() + Edate.getTimezoneOffset()); // Adjust for the local time zone offset
                            // const ETA = Edate.toISOString().substring(0, 10);
                            var etaString = eventfiller.ETA.split(' ')[0]; // Extract the date part
                            var Edate = new Date(etaString);
                            const ETA = Edate.toISOString().substring(0, 10);
                            $('#ETA').val(ETA);

                            // $('#ETA').val(eventfiller.ETA);
                            // var Ddate = new Date(eventfiller.DueTime);
                            // const DueTime = Ddate.toISOString().substring(0, 10);
                            // console.log(eventfiller.DueTime);

                            $('#appt').val(eventfiller.DueTime);
                            $('#DueTme2').val(eventfiller.DueTime);
                            // var Bdate = new Date(eventfiller.BidDUeDate);
                            // const BidDUeDate = Bdate.toISOString().substring(0, 10);
                            var bidString = eventfiller.BidDUeDate.split(' ')[
                            0]; // Extract the date part
                            var Bdate = new Date(bidString);
                            const BidDUeDate = Bdate.toISOString().substring(0, 10);
                            // console.log(BidDUeDate);
                            $('#BidDueDates').val(BidDUeDate);
                            $('#BidDUeDate2').val(BidDUeDate);
                            $('#fax').val(eventfiller.Fax);
                            $('#cell').val(eventfiller.Cell);
                            $('#email').val(eventfiller.Email);
                            $('#name').val(eventfiller.Name);
                            $('#phoneno').val(eventfiller.Phone);
                            $('#Contact').val(eventfiller.Contact);
                            $('#godowncode').val(eventfiller.GodownCode);
                            var selectElement = $('#GodownName');
                            selectElement.append($('<option>', {
                                value: eventfiller.GodownCode,
                                text: eventfiller.GodownName
                            }));
                            console.log(eventfiller.GodownName);
                            console.log(eventfiller.GodownCode);
                            $('#GodownName').val(eventfiller.GodownCode);
                            $('#ReturnVia').val(eventfiller.ReturnVia);
                            $('#ReturnVia2').val(eventfiller.ReturnVia);
                            $('#godown').val(eventfiller.GodownName);
                            $('#vesselcode').val(eventfiller.IMONo);
                            $('#Vcode').val(eventfiller.Vcode);
                            $('#vid').val(eventfiller.PVID);
                            $('#vesselname').val(eventfiller.VesselName);
                            $('#ACTcode').val(eventfiller.CustomerActCode);
                            $('#BranchCode').val(eventfiller.BranchCode);
                            $('#Custcode').val(eventfiller.CusCode);
                            $('#companycode').val(eventfiller.CustomerCode);
                            $('#companyname').val(eventfiller.CustomerName);
                            $('#eventno').val(eventfiller.EventNo);
                            $('#generalvessel').val(eventfiller.GeneralVesselNote);
                            $("#companycode").change();

                        }
                        let table = document.getElementById('qoutesBody');
                        table.innerHTML = ""; // Clear the table
                        var ids = 0;

                        data.forEach(function(item) {
                            ids = ids + 1;
                            var chekdate = new Date(item.BidDueDate);
                            const options = {
                                weekday: 'long',
                                year: 'numeric',
                                month: 'long',
                                day: 'numeric'
                            };
                            const dayOfWeek = chekdate.toLocaleString('en-US', options).split(
                                ',')[0];
                            // console.log(dayOfWeek);
                            const DateActYear = chekdate.toLocaleDateString("en-US", {
                                year: 'numeric',
                                month: '2-digit',
                                day: '2-digit'
                            });
                            const forDate = chekdate.toISOString().substring(0, 10);

                            let row = table.insertRow();

                            let EventnoCell = row.insertCell(0);
                            EventnoCell.innerHTML = item.EventNo;


                            let DepartmentNameCell = row.insertCell(1);
                            DepartmentNameCell.innerHTML = item.DepartmentName;

                            let CustomerRefCell = row.insertCell(2);
                            CustomerRefCell.innerHTML = item.CustomerRefNo;

                            let BidDueDateCell = row.insertCell(3);
                            BidDueDateCell.innerHTML = forDate;
                            //   RateCell.style.textAlign = 'right';

                            let RtnViaCell = row.insertCell(4);
                            RtnViaCell.innerHTML = item.ReturnVia;
                            //   AmountCell.style.textAlign = 'right';

                            let QuoteNoCell = row.insertCell(5);
                            QuoteNoCell.innerHTML = item.QuoteNo;

                            let ESTLineQuoteCell = row.insertCell(6);
                            ESTLineQuoteCell.innerHTML = item.EstLineQuote;

                            let DueTimeCell = row.insertCell(7);
                            DueTimeCell.innerHTML = item.DueTime;

                            let WorkUserCell = row.insertCell(8);
                            WorkUserCell.innerHTML = item.WorkUser;
                            //   IDCell.hidden = true;
                            const tableBody = document.getElementById("qoutesBody");

                            tableBody.addEventListener("click", function(e) {
                                if (e.target.tagName === "TD") {
                                    const td = e.target;
                                    const tr = td.parentNode;
                                    const tdElements = tr.getElementsByTagName("td");
                                    $('#eventi').val(tdElements[0].innerHTML);

                                    $('#Department').val(tdElements[1].innerHTML);
                                    $('#CustomerRef').val(tdElements[2].innerHTML);
                                    $('#BidDUeDate2').val(tdElements[3].innerHTML);
                                    $('#ReturnVia').val(tdElements[4].innerHTML);
                                    $('#Quote_No').val(tdElements[5].innerHTML);
                                    $('#QuoteNo').val(tdElements[5].innerHTML);
                                    $('#EstLinesQuote').val(tdElements[6].innerHTML);
                                    $('#DueTme2').val(tdElements[7].innerHTML);
                                    $('#asuser').val(tdElements[8].innerHTML);
                                }
                            });
                            tableBody.addEventListener("dblclick", function(e) {
                                if (e.target.tagName === "TD") {
                                    const td = e.target;
                                    const tr = td.parentNode;
                                    const tdElements = tr.getElementsByTagName("td");
                                    window.location.href = "/quotation?quote_no=" +
                                        tdElements[5].innerHTML;

                                    // Set the value of the input field to the third td element's inner HTML
                                    // $('#TxtExpActName').val(tdElements[0].innerHTML);
                                    // $('#TxtDescription').val(tdElements[1].innerHTML);
                                    // $('#TxtQuantity').val(tdElements[2].innerHTML);
                                    // $('#TxtRate').val(tdElements[3].innerHTML);
                                    // $('#TxtAmt').val(tdElements[4].innerHTML);
                                    // $('#TxtExpActCode').val(tdElements[5].innerHTML);
                                    // $('#TxtID').val(tdElements[6].innerHTML);

                                    // // Remove the row from the table
                                    // tableBody.removeChild(tr);
                                }
                            });
                        });
                    },
                    error: function(xhr, status, error) {
                        console.log(error);

                    }
                });
            }






            $("#CustomerRef").on('blur', function() {
                // alert('check')
                var refno = $(this).val();
                chekrefence(refno);



            })
            $(".CustomerRef2").on('blur', function() {
                // alert('check')
                var refno = $(this).text();
                chekrefence(refno);



            })
        });
        if (typeof $ !== 'undefined') {
            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            });
        }

        window.addEventListener('gcrud.datagrid.ready', () => {
            var heading_array = [];
            var c = 0;
            $(".grocery-crud-table thead th:gt(0)").each(function() {
                title = $(this).html();
                title = title.replace("<div>", '');
                title = title.replace("</div>", '');
                //heading_array.push(title);
                console.log(title);
                $(".gc-datagrid-row").each(function() {
                    $(this).find(".gc-data-container:eq(" + c + ")").attr("data-title", title);
                });
                c++;
            })

        });
    </script>
@stop


@section('content')
