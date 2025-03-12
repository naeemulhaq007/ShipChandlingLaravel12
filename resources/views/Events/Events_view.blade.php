@extends('layouts.app')



@section('title', 'Events')

@section('content_header')
@stop

@section('content')
    <?php echo View::make('partials.search'); ?>
    <?php echo View::make('partials.searchves'); ?>
    @php
        $ShipId = request()->get('ShipId');
        $Token = request()->get('Token');
        $Priority = request()->get('Priority');
    @endphp


    @if (\Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>{!! \Session::get('success') !!}</strong>
        </div>
    @endif
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

    <form id="eventform" action="event/store" method="post">
        @csrf
        <div class="container-fluid">
            <div class="col-lg-12 pt-3">
                <div class="card">
                    <div class="card-header">
                        <div class="row ">
                            <h2 class="">Create Event</h2>
                            <h4 class="ml-auto shipdata">Ship Serv Data</h4>
                            <div class="card-tools ">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="row pt-2">
                                <div class="inputbox col-sm-6 ml-4">
                                    <textarea title="GeneralVessel" placeholder="" name="GeneralVesselNote" id="generalvessel" cols="10"
                                        rows="2"></textarea>
                                    <span class="Txtspan">
                                        General Vessel</span>

                                </div>
                                {{-- <div class="col-sm-1">
                                </div> --}}

                                <div class="col-sm-5 shipdata">
                                    <div class="row">
                                        <label for="">ShipServ Customer Name : <span id="shipcustomername" class="text-success"></span></label>
                                        <label for="">ShipServ DeliveryPort : <span id="shipDeliveryPort" class="text-success"></span></label>

                                    </div>
                                    <div class="row">
                                        <label for="">ShipServ Vessel Name : <span id="shipvesselname" class="text-success"></span></label>
                                    </div>
                                </div>
                            </div>

                            <div class="container-fluid">
                                <input type="hidden" class="form-control" name="EventNo" id="eventid" title="eventid">

                                <div class="col-md-12">
                                    <div class="row ">
                                        <div class="input-group col-sm-12 ">
                                            <div hidden class="inputbox col-sm-3 py-2">
                                                <input type="hidden" class=" " name="Customercode" id="companycode"
                                                    required="required" placeholder="Customer Code" readonly>
                                                <span class="Txtspan">
                                                    Cust.Code
                                                </span>
                                            </div>
                                            <div hidden class="inputbox col-sm-1 ">
                                                <input type="hidden" class=" " name="CusCode" id="Custcode">
                                                <span class="ml-2">
                                                    C.Code
                                                </span>
                                            </div>
                                            <div hidden class="inputbox col-sm-1 ">
                                                <input type="hidden" class=" " name="BranchCode" id="BranchCode">
                                                <span class="ml-2">
                                                    B.Code
                                                </span>
                                            </div>
                                            <div hidden class="inputbox col-sm-1 ">
                                                <input type="hidden" class=" " name="CustomerActCode" id="ACTcode"
                                                    required="required">
                                                <span class="ml-2">
                                                    C. Act. Code
                                                </span>
                                            </div>
                                            <div class="inputbox col-sm-6 py-2">
                                                <input type="text" class="" name="CustomerName" id="companyname"
                                                    data-toggle="modal" data-target="#searchrmod" data-id="cussearch"
                                                    data-name="cussearch" data-th1="Customer Code" data-th2="Customer Name"
                                                    data-th3="Address" data-th4="Email Address" required readonly
                                                    name="CustomerName" id="companyname" value="{{ old('CustomerName') }}"
                                                    title="Customer Name" placeholder="Customer Name" required="required">
                                                <span class="Txtspan">
                                                    Customer
                                                </span>
                                            </div>
                                            <div class="input-group-append py-2">
                                                <span data-toggle="modal" data-target="#searchrmod" data-id="cussearch"
                                                    data-name="cussearch" data-th1="Customer&nbsp;Code"
                                                    data-th2="Customer&nbsp;Name" data-th3="Address"
                                                    data-th4="Email Address" data-th5='Status'
                                                    class="input-group-text bg-info" style="cursor: pointer;"
                                                    id="cussearch"><i class="fas fa-search"></i></span>
                                            </div>
                                            <div class="inputbox col-sm-2 py-2">
                                                <span class="Txtspan">
                                                    Warehouse
                                                </span>
                                                <select required name="GodownName" id="GodownName">

                                                    <option id="" value="" selected> </option>


                                                </select>

                                            </div>
                                            <div class="inputbox col-sm-1 py-2">

                                                <a href="{{ route('warehouse-setup') }}" target="_blank" type="button"
                                                    class="btn btn-tool">
                                                    <i class="fas fa-plus"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-group col-sm-12 ">



                                            <div hidden class="inputbox col-sm-3 py-2">
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
                                            <div class="inputbox col-sm-6 py-2">
                                                <input type="text" class="" readonly required name="VesselName"
                                                    data-toggle="modal" data-target="#searchrmodw" value=""
                                                    id="vesselname" title="Vessel Name" placeholder="Vessel Name"
                                                    required="required">
                                                <span class="Txtspan">
                                                    Vessel
                                                </span>
                                            </div>
                                            <div class="input-group-append py-2">
                                                <span class="input-group-text bg-info" style="cursor: pointer;"
                                                    data-toggle="modal" data-target="#searchrmodw"id="vensearch"
                                                    data-id="vensearch" data-name="vensearch" data-th1="Vessel Code"
                                                    data-th2="Vessel Name" data-th3="Address" data-th4="Email Address"><i
                                                        class="fas fa-search"></i></span>
                                            </div>

                                            <div class="col-sm-2 py-2">
                                                <div class="inputbox">
                                                    <span class="Txtspan">
                                                        Port
                                                    </span>
                                                    <select required name="ShippingPort" id="ShippingPort">

                                                    </select>


                                                </div>
                                            </div>
                                            <div class="col-sm-1 py-2">
                                                <a type="button" href="{{ route('shipingport-setup') }}"
                                                    class="btn btn-tool">
                                                    <i class="fas fa-plus"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-group col-sm-12 ">
                                            <div class="inputbox col-sm-3 py-2">
                                                <span class="Txtspan">
                                                    Contact
                                                </span>
                                                <select type="text" name="Contact" id="Contact" title="Contact"
                                                    placeholder="Wait">


                                                </select>
                                            </div>
                                            <div class="inputbox col-sm-3 py-2">
                                                <input type="text" name="Name" id="name" title="name">
                                                <span class="Txtspan">
                                                    Name
                                                </span>
                                            </div>

                                            <div class="inputbox col-sm-3 py-2">
                                                <input type="text" name="Cell" id="cell" title="cell"
                                                    placeholder="">
                                                <span class="Txtspan">
                                                    Cell
                                                </span>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-group col-sm-12 ">

                                            <input type="hidden"name="GodownCodeget" id="godowncode" title="godowncode"
                                                value="" placeholder="">

                                            <div class="inputbox col-sm-3 py-2">
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
                                            <div class="inputbox col-sm-3 py-2">
                                                <span class="Txtspan">
                                                    Phone
                                                </span>
                                                <input type="tel" name="Phone" id="phoneno">
                                            </div>
                                            <div class="inputbox col-sm-3 py-2">
                                                <input type="text" name="Email" id="email" title="email"
                                                    placeholder="">
                                                <span class="Txtspan">
                                                    Email
                                                </span>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="input-group col-sm-12 ">

                                            <div class="inputbox col-sm-3 py-2">
                                                <span class="Txtspan">
                                                    ETA
                                                </span>
                                                <input type="date" required name="ETA" id="ETA">

                                            </div>

                                            <div class="inputbox col-sm-3 py-2">
                                                <span class="Txtspan">
                                                    Bid DueDate
                                                </span>
                                                <input required type="date" name="BidDUeDate" id="BidDueDate">
                                            </div>

                                            <div class="inputbox col-sm-3 py-2">
                                                <span class="Txtspan">
                                                    Due Time
                                                </span>
                                                <input type="time" id="appt" name="DueTime">
                                            </div>



                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-group col-sm-12 ">

                                            <div class="inputbox col-sm-3 py-2">
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


                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-group col-sm-12 ">
                                            <div class="inputbox col-sm-6 py-2">
                                                <textarea name="followup" id="followup" cols="28" rows="3"></textarea>
                                                <span class="Txtspan">
                                                    Follow Up</span>

                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">

                                        <button name="" id="NewBtn" class="btn btn-primary ml-3"
                                            role="button"><i class="fa fa-plus mr-1" aria-hidden="true"></i>
                                            New</button>
                                        <button type="submit" id="savebtn" class="btn btn-success mx-2"><i
                                                class="fa fa-cloud mr-1" aria-hidden="true"></i> Save
                                            Event</button>
                                        <button name="" id="DeleteBtn" class="btn btn-warning " role="button"><i
                                                class="fa fa-trash mr-1" aria-hidden="true"></i>
                                            Delete</button>
                                        <button name="" id="ExitBtn" href="/" class="btn btn-danger mx-2"
                                            role="button"><i class="fa fa-door-open mr-1"
                                                aria-hidden="true"></i>Exit</button>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        </div>
        <input type="hidden" id="ShipId" value="{{ $ShipId ? $ShipId : '' }}">
        <input type="hidden" id="Token" value="{{ $Token ? $Token : '' }}">
        <input type="hidden" id="TxtPriority" value="{{ $Priority ? $Priority : '' }}">
    </form>








@stop

@section('css')

@stop

@section('js')


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
                        var optionsArray = response.warehouse;
                        var selectElement = $('#GodownName');
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
        $(document).ready(function() {

            const today = new Date();
            const tomorrow = new Date(today);
            tomorrow.setDate(today.getDate() + 1);

            const todayISOString = today.toISOString().substring(0, 10);
            const tomorrowISOString = tomorrow.toISOString().substring(0, 10);

            $('#ETA').val(todayISOString);
            $('#BidDueDate').val(tomorrowISOString);

            $(document).on("dblclick", ".js-click", function() {
                $targetcustcode = $(this).attr('data-custcode');
                $targetact = $(this).attr('data-act');
                $targetcuscode = $(this).attr('data-cuscode');
                $targetcusname = $(this).attr('data-cusname');


                document.getElementById("companyname").value = $targetcusname;
                $('#searchcustname').val($targetcusname);
                document.getElementById("companycode").value = $targetcustcode;
                document.getElementById("searchbox").value = $targetcustcode;
                document.getElementById("Custcode").value = $targetcuscode;
                document.getElementById("ACTcode").value = $targetact;
                $('#searchrmod').modal('hide');
                if ($targetcusname) {
                    $("#companycode").change();
                }
                $('#searchrmodw').modal('show');


            });


            let x = {{ $lastid }};
            x++;
            let z = x;


            document.getElementById("eventid").value = z;

            $(document).on("dblclick", ".vesrow", function() {
                $targetvesname = $(this).attr('data-vesname');
                $targetvesimo = $(this).attr('data-vesimo');

                document.getElementById("vesselname").value = $targetvesname;
                document.getElementById("vesselcode").value = $targetvesimo;
                $('#searchrmodw').modal('hide');

            });

            $("#Department").on('change', function() {
                var id = this.options[this.selectedIndex].id;
                document.getElementById("Department_coder").value = id;

            });
            $('#GodownName').click(function(e) {
                var code = $(this).val();

                updategodown(code);
            });
            $('#ShippingPort').click(function(e) {
                var code = $(this).val();
                updateport(code);
            });
            $("#GodownName").on('change', function() {
                var id = this.options[this.selectedIndex].text;
                document.getElementById("godowncode").value = id;
            });

            $("#eventform").submit(function() {
                $("#savebtn").attr("disabled", true);
            });


            $('#Newbtn').click(function(e) {

                document.getElementById('generalvessel').value = '';
                document.getElementById('companyname').value = '';
                document.getElementById('vesselname').value = '';
                document.getElementById('GodownName').value = '';
                document.getElementById('companycode').value = '';
                document.getElementById('vesselcode').value = '';
                document.getElementById('GodownName').value = '';
                document.getElementById('ReturnVia').value = '';
                document.getElementById('phoneno').value = '';
                document.getElementById('name').value = '';
                document.getElementById('Contact').value = '';
                document.getElementById('cell').value = '';
                document.getElementById('email').value = '';
                document.getElementById('fax').value = '';
                document.getElementById('BidDueDate').value = '';
                document.getElementById('appt').value = '';
                document.getElementById('ETA').value = '';
                document.getElementById('Status').value = '';
                document.getElementById('Priority').value = '';
                document.getElementById('ShippingPort').value = '';
                document.getElementById('followup').value = '';
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

        $(document).ready(function () {
            $('.shipdata').hide();
            var ShipID = $('#ShipId').val();
            var Token = $('#Token').val();
            var Priority = $('#TxtPriority').val();
            async function fetchData() {
                ajaxSetup();
                $.ajax({
                    url: "{{route('getshiptoevent')}}",
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
                        $('#GodownName').click();
                        $('#ShippingPort').click();
                        // customersearchtable
                        if(response.data){
                            var list = response.data;
                        $('.cuser').html(response.output);

                        $('#searchrmod').modal('show');
                        $('.shipdata').show();
                        $('#name').val(list.consignee.contact.name);
                        $('#email').val(list.consignee.contact.email);
                        $('#cell').val(list.consignee.contact.mobile);
                        $('#phoneno').val(list.consignee.contact.telephone);
                        $('#ReturnVia').val('Shipserv');

                        const BidDueDate = new Date(list.orderDeliveryDate);
                        const BidDueDateISOString = BidDueDate.toISOString().substring(0, 10);
                        $('#BidDueDate').val(BidDueDateISOString);

                        // $('#ShippingPort').val(list.deliveryPort.name);
                        // $('#GodownName').val(list.deliveryPort.name);
                        $('#followup').val(list.termsAndConditions);
                        $('#Priority').val(Priority);
                        console.log(list.buyer.name);
                        $('#shipcustomername').text(list.buyer.name);
                        $('#shipvesselname').text(list.vessel.name);
                        $('#shipDeliveryPort').text(list.deliveryPort.name);
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

            if (ShipID !== '') {
                // const url = 'https://api.shipserv.com/order-management/documents/'+ShipID;
                //     const options = {
                //     method: 'GET',
                //     headers: {'Api-Version': 'v2', Accept: 'application/json', Authorization: Token}
                //     };

                //     try {
                //     const response = await fetch(url, options);
                //     const data = await response.json();
                //     console.log(data);
                //     } catch (error) {
                //     console.error(error);
                //     }
                fetchData();
            }
        });
    </script>
@stop


@section('content')
