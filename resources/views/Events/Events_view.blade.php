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
                            <h2 class="">Create Events</h2>
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
                                        General Vessel Note</span>

                                </div>
                                
                                
   <div class="form-group d-flex">
    <input  type="number" name="EventNo" id="event_no" class="form-control" placeholder="Enter Event No">
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
                                                                        
                                                                        
                                                                             <!-- <div class="inputbox col-sm-2 py-2">
                                <input type="text" class="" id="showCustomerCode" placeholder="Customer Code" readonly>
                                <span class="Txtspan">Code</span>
                                   </div> -->
                                            
                                            
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
  <!-- <div class="inputbox col-sm-2 py-2">
    <input type="text" class="" id="showVesselIMO" placeholder="Vessel IMO No" readonly>
    <span class="Txtspan">IMO</span>
</div> -->

        

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
                                                    Contacts
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

<button type="button" id="NewItem" class="btn btn-primary my-2 mx-2">
    <i class="fa fa-plus mr-1" aria-hidden="true"></i> New
</button>



                                    
                                        <button type="submit" id="savebtn" class="btn btn-success my-2 mx-2"><i
                                                class="fa fa-cloud mr-1" aria-hidden="true"></i> Save
                                            Event</button>
                                        <button name="" id="DeleteBtn" class="btn btn-warning my-2 mx-2" role="button"><i
                                                class="fa fa-trash mr-1" aria-hidden="true"></i>
                                            Delete</button>
                                                
                                                
                                                
                                                 <a name="" id="" class="btn btn-danger my-2 mx-2" href="{{url('events-setup') }}" role="button">
                         <i class="fa fa-arrow-right mr-1" aria-hidden="true"></i> Exit
                         </a>
                                        <!--<button name="" id="ExitBtn" href="/" class="btn btn-danger mx-2"-->
                                        <!--    role="button"><i class="fa fa-door-open mr-1"-->
                                        <!--        aria-hidden="true"></i>Exit</button>-->
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
            success: function(response) {
                if (response.warehouse) {
                    var optionsArray = response.warehouse;
                    var selectElement = $('#GodownName');
                    selectElement.empty().append($('<option>', {
                        value: '',
                        text: ''
                    }));
                    $.each(optionsArray, function(index, value) {
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
            success: function(response) {
                if (response.shiping) {
                    var selectElement = $('#ShippingPort');
                    var optionsArray = response.shiping;
                    selectElement.empty().append($('<option>', {
                        value: '',
                        text: ''
                    }));
                    $.each(optionsArray, function(index, value) {
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
    



function updateContactDropdown(code) {
    let customerCode = $('#companycode').val();
    if (!customerCode) return;

    $.ajax({
        type: 'POST',
        url: '/getcontact',
        data: {
            _token: '{{ csrf_token() }}',
            customercode: customerCode
        },
        success: function (response) {
            if (response.contacts) {
                var selectElement = $('#Contact');
                selectElement.empty().append('<option value="">--Select Contact --</option>');

                $.each(response.contacts, function (index, contact) {
                    selectElement.append($('<option>', {
                        value: contact.ID,
                        text: contact.CustName
                    }));
                });

                // Select contact
                selectElement.val(code);

                // Rebind dropdown change
                selectElement.off('change').on('change', function () {
                    let selectedId = $(this).val();
                    if (!selectedId) return;

                    $.ajax({
                        url: "/getcontact",
                        type: "POST",
                        data: {
                            _token: '{{ csrf_token() }}',
                            customercode: customerCode,
                            id: selectedId
                        },
                        success: function (res) {
                            if (res.Customercon) {
                                let c = res.Customercon;
                                $('#name').val(c.CustName);
                                $('#cell').val(c.Cell);
                                $('#email').val(c.Email);
                                $('#phoneno').val(c.Phone);
                            }
                        }
                    });
                });

                // Trigger once manually if code is already selected
                if (code) {
                    selectElement.trigger('change');
                }
            }
        }
    });
}







    $(document).ready(function() {
        ajaxSetup();

        // Set default dates
        const today = new Date();
        const tomorrow = new Date(today);
        tomorrow.setDate(today.getDate() + 1);
        $('#ETA').val(today.toISOString().substring(0, 10));
        $('#BidDueDate').val(tomorrow.toISOString().substring(0, 10));

        // Last ID assign
        let x = {{ $lastid }};
        document.getElementById("eventid").value = ++x;

        // Event vessel name select
        $(document).on("dblclick", ".vesrow", function() {
            $('#showVesselIMO').val($(this).data('vesimo'));

            $('#vesselname').val($(this).data('vesname'));
            $('#vesselcode').val($(this).data('vesimo'));
            $('#searchrmodw').modal('hide');
        });

        // Event customer select
        $(document).on("dblclick", ".js-click", function() {
              $('#showCustomerCode').val($(this).data('custcode'));
            $('#companyname').val($(this).data('cusname'));
            $('#searchcustname').val($(this).data('cusname'));
            $('#companycode').val($(this).data('custcode'));
            $('#searchbox').val($(this).data('custcode'));
            $('#Custcode').val($(this).data('cuscode'));
            $('#ACTcode').val($(this).data('act'));
            $('#searchrmod').modal('hide');
            $('#searchrmodw').modal('show');

            if ($(this).data('cusname')) {
                $("#companycode").trigger("change");
            }
        });
        
        
      $('#event_no').blur(function () {
    let eventNo = $('#event_no').val().trim();

    if (eventNo === '') {
        alert("Please enter Event No");
        return;
    }

    $('#eventid').val(eventNo);

    $.ajax({
        url: '/getEventMasterData',
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            event_no: eventNo
        },
        success: function (data) {
            if (data && data.event) {
                const e = data.event;

                $('#generalvessel').val(e.GeneralVesselNote ?? '');
                $('#companyname').val(e.CustomerName ?? '');
                $('#companycode').val(e.CustomerCode ?? '');
                $('#Custcode').val(e.CusCode ?? '');
                $('#ACTcode').val(e.CustomerActCode ?? '');
                $('#vesselname').val(e.VesselName ?? '');
                $('#vesselcode').val(e.IMONo ?? '');
                  
        $('#showCustomerCode').val(e.CustomerCode ?? '');
        $('#showVesselIMO').val(e.IMONo ?? '');

                updategodown(e.GodownCode ?? '');
                updateport(e.ShippingPort ?? '');
                updateContactDropdown(e.Contact ?? '');

                $('#phoneno').val(e.Phone ?? '');
                $('#cell').val(e.Cell ?? '');
                $('#email').val(e.Email ?? '');
                $('#name').val(e.Name ?? '');
                $('#ReturnVia').val(e.ReturnVia ?? '');
                $('#ETA').val(e.ETA ? e.ETA.substring(0, 10) : '');
                $('#BidDueDate').val(e.BidDUeDate ? e.BidDUeDate.substring(0, 10) : '');
                $('#appt').val(e.DueTime ?? '');
                $('#Priority').val(e.Priority ?? '');
                $('#followup').val(e.Note ?? '');
            } else {
                alert("Event not found.");
            }
        },
        error: function (xhr) {
            console.error(xhr.responseText);
            alert("Error fetching event: " + xhr.responseText);
        }
    });
});



    // $('#searchEventBtn').click(function () {
    //     let eventNo = $('#event_no').val().trim();

    //     if (eventNo === '') {
    //         alert("Please enter Event No");
    //         return;
    //     }

       
    //     $('#eventid').val(eventNo);

    //       $.ajax({
    //         url: '/getEventMasterData',
    //         type: 'POST',
    //         data: {
    //             _token: '{{ csrf_token() }}',
    //             event_no: eventNo
    //         },
    //         success: function (data) {
    //             if (data && data.EventNo) {
    //                  const e = data.event;
                  
    //                 $('#generalvessel').val(data.GeneralVesselNote ?? '');
    //                 $('#companyname').val(data.CustomerName ?? '');
    //                 $('#companycode').val(data.CustomerCode ?? '');
    //                 $('#Custcode').val(data.CusCode ?? '');
    //                 $('#ACTcode').val(data.CustomerActCode ?? '');
    //                 $('#vesselname').val(data.VesselName ?? '');
    //                 $('#vesselcode').val(data.IMONo ?? '');
    //                       // These 2 lines replace direct .val()
    //     updategodown(data.GodownCode ?? '');
    //     updateport(data.ShippingPort ?? '');
    //          updateContactDropdown(data.Contact ?? '');
    //                 // $('#GodownName').val(data.GodownCode ?? '');
    //                 // $('#ShippingPort').val(data.ShippingPort ?? '');
    //                 $('#phoneno').val(data.Phone ?? '');
    //                 $('#cell').val(data.Cell ?? '');
    //                 $('#email').val(data.Email ?? '');
    //                 $('#name').val(data.Name ?? '');
              

    //                 // $('#Contact').val(data.Contact ?? '');
    //                 $('#ReturnVia').val(data.ReturnVia ?? '');
    //                 $('#ETA').val(data.ETA ? data.ETA.substring(0, 10) : '');
    //                 $('#BidDueDate').val(data.BidDUeDate ? data.BidDUeDate.substring(0, 10) : '');
    //                 $('#appt').val(data.DueTime ?? '');
    //                 $('#Priority').val(data.Priority ?? '');
    //                 $('#followup').val(data.Note ?? '');
                    
                    
                    
                    

                 
    //                 // alert("Event data loaded. You can now edit and save.");
    //             } else {
    //                 alert("Event not found.");
    //             }
    //         },
        
         
         
 

    //         error: function (xhr) {
    //             console.error(xhr.responseText);
    //             alert("Error fetching event: " + xhr.responseText);
    //         }
    //     });
        
    //   });

          






//         Event No on blur → fetch event data
//         $('#event_no').on('blur', function () {
//                     const e = data.event;
//             let eventNo = $(this).val().trim();
//             if (eventNo === '') return;

//             $.ajax({
//                 url: '/getEventMasterData',
//                 type: 'POST',
//                 data: {
//                     _token: '{{ csrf_token() }}',
//                     event_no: eventNo
//                 },
//               success: function (data) {
//                 if (data && data.EventNo) {
//                      const e = data.event;
//                     $('#generalvessel').val(data.GeneralVesselNote ?? '');
//                     $('#companyname').val(data.CustomerName ?? '');
//                     $('#companycode').val(data.CustomerCode ?? '');
//                   $('#Custcode').val(data.CusCode ?? '');
//                     $('#ACTcode').val(data.CustomerActCode ?? '');
//                     $('#vesselname').val(data.VesselName ?? '');
//                     $('#vesselcode').val(data.IMONo ?? '');
//                     $('#GodownName').val(data.GodownCode ?? '');
//                     $('#ShippingPort').val(data.ShippingPort ?? '');
//                     $('#phoneno').val(data.Phone ?? '');
//                       $('#cell').val(data.Cell ?? '');
//                       $('#email').val(data.Email ?? '');
//                       $('#name').val(data.Name ?? '');
//                         updateContactDropdown(data.Contact ?? '');
//                     //   updateContactDropdown(e.ContactID ?? e.Contact ?? '');
//                     //   $('#Contact').val(data.Contact ?? '');
//                       $('#ReturnVia').val(data.ReturnVia ?? '');
//                       $('#ETA').val(data.ETA ? data.ETA.substring(0, 10) : '');
//                       $('#BidDueDate').val(data.BidDUeDate ? data.BidDUeDate.substring(0, 10) : '');
//                       $('#appt').val(data.DueTime ?? '');
//                       $('#Priority').val(data.Priority ?? '');
//                       $('#followup').val(data.Note ?? '');
//                     } else {
//                       alert("Event not found");
//                       $('#companyname, #vesselname').val('');
//                   }
//                 }

//             });
//         });



//     $('#event_no').on('blur', function () {
//     let eventNo = $(this).val().trim();
//     if (eventNo === '') return;

//     $.ajax({
//         url: '/getEventMasterData',
//         type: 'POST',
//         data: {
//             _token: '{{ csrf_token() }}',
//             event_no: eventNo
//         },
//         success: function (data) {
//             if (data && data.EventNo) {
//                 const e = data.event;  // ✅ Correct place

//                 $('#generalvessel').val(e.GeneralVesselNote ?? '');
//                 $('#companyname').val(e.CustomerName ?? '');
//                 $('#companycode').val(e.CustomerCode ?? '');
//                 $('#Custcode').val(e.CusCode ?? '');
//                 $('#ACTcode').val(e.CustomerActCode ?? '');
//                 $('#vesselname').val(e.VesselName ?? '');
//                 $('#vesselcode').val(e.IMONo ?? '');
//                 $('#GodownName').val(e.GodownCode ?? '');
//                 $('#ShippingPort').val(e.ShippingPort ?? '');
//                 $('#phoneno').val(e.Phone ?? '');
//                 $('#cell').val(e.Cell ?? '');
//                 $('#email').val(e.Email ?? '');
//                 $('#name').val(e.Name ?? '');
           
//                              updateContactDropdown(data.Contact ?? '');
//                 $('#ReturnVia').val(e.ReturnVia ?? '');
//                 $('#ETA').val(e.ETA ? e.ETA.substring(0, 10) : '');
//                 $('#BidDueDate').val(e.BidDUeDate ? e.BidDUeDate.substring(0, 10) : '');
//                 $('#appt').val(e.DueTime ?? '');
//                 $('#Priority').val(e.Priority ?? '');
//                 $('#followup').val(e.Note ?? '');
//             } else {
//                 alert("Event not found");
//                 $('#companyname, #vesselname').val('');
//             }
//         }
//     });
// });

        // On Department change
        $("#Department").on('change', function() {
            $('#Department_coder').val(this.options[this.selectedIndex].id);
        });

        // Godown/Port click
        $('#GodownName').click(function() {
            updategodown($(this).val());
        });

        $('#ShippingPort').click(function() {
            updateport($(this).val());
        });
        
        
        

        $("#GodownName").on('change', function() {
            $('#godowncode').val(this.options[this.selectedIndex].text);
        });


         function updategodown(selectedCode) {
    $.ajax({
        type: "get",
        url: "{{ route('Es_godownsetup') }}",
        success: function(response) {
            if (response.warehouse) {
                var select = $('#GodownName');
                select.empty().append('<option value="">Select</option>');
                response.warehouse.forEach(item => {
                    select.append(new Option(item.GodownName, item.GodownCode));
                });
                select.val(selectedCode); // set selected
            }
        }
    });
}

function updateport(selectedPort) {
    $.ajax({
        type: "get",
        url: "{{ route('Es_portsetup') }}",
        success: function(response) {
            if (response.shiping) {
                var select = $('#ShippingPort');
                select.empty().append('<option value="">Select</option>');
                response.shiping.forEach(item => {
                    select.append(new Option(item.PortName, item.PortName));
                });
                select.val(selectedPort); // set selected
            }
        }
    });
}


 
 $("#eventform").submit(function (e) {
    let eventNo = $('#eventid').val().trim();


});

        
        
        
        
        
        
        

        // New button clear form
     $(document).on("click", "#NewItem", function () {
    Cleardata();
    GenerateCode();
});


// clear form data
function Cleardata() {
    
    $('#eventform').find('input[type="text"], input[type="number"], input[type="email"], input[type="tel"], input[type="date"], input[type="time"]').val('');
    $('#eventform').find('textarea').val('');
    $('#eventform').find('select').prop('selectedIndex', 0);
    $('#eventform').find('input[type="hidden"]').val('');
    $('#eventform').find('input[type="checkbox"], input[type="radio"]').prop('checked', false);
    $('#shipcustomername, #shipDeliveryPort, #shipvesselname').text('');
}



        // Company code change →  this is For get form data With search input contact dropdown
        $("#companycode").change(function(e) {
            e.preventDefault();
            let customercode = $(this).val();
            ajaxSetup();
            $.ajax({
                url: "/getcontact",
                type: "POST",
                data: { customercode },
                beforeSend: function() { $('.overlay').show(); },
                success: function(response) {
                    var contacts = response.contacts;
                    $('#Contact').empty().append($('<option>', {
                        value: '',
                        text: '-- Select Contact --'
                    }));
                    contacts.forEach(contact => {
                        $('#Contact').append($('<option>', {
                            value: contact.ID,
                            text: contact.CustName
                        }));
                    });

                    $('#Contact').off('change').on('change', function() {
                        $.ajax({
                            url: "/getcontact",
                            type: "POST",
                            data: {
                                customercode,
                                id: $(this).val()
                            },
                            success: function(response) {
                                if (response.Customercon) {
                                    let c = response.Customercon;
                                    $('#name').val(c.CustName);
                                    $('#cell').val(c.Cell);
                                    $('#email').val(c.Email);
                                    $('#phoneno').val(c.Phone);
                                }
                            }
                        });
                    });
                },
                complete: function() { $('.overlay').hide(); }
            });
        });

        // ShipServ order pre-fill
        $('.shipdata').hide();
        var ShipID = $('#ShipId').val();
        var Token = $('#Token').val();
        var Priority = $('#TxtPriority').val();

        async function fetchData() {
            ajaxSetup();
            $.ajax({
                url: "{{route('getshiptoevent')}}",
                type: "POST",
                data: { ShipID, Token },
                beforeSend: function() { $('.overlay').show(); },
                success: function(response) {
                    if (response.data) {
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
                        $('#BidDueDate').val(BidDueDate.toISOString().substring(0, 10));

                        $('#followup').val(list.termsAndConditions);
                        $('#Priority').val(Priority);
                        $('#shipcustomername').text(list.buyer.name);
                        $('#shipvesselname').text(list.vessel.name);
                        $('#shipDeliveryPort').text(list.deliveryPort.name);
                    }
                },
                complete: function() { $('.overlay').hide(); }
            });
        }

        if (ShipID !== '') {
            fetchData();
        }
    });
    
    
    
    
    
    
    
    
    
    
    
    
    $(document).on("click", "#DeleteBtn", function (e) {
    e.preventDefault();

    const eventNo = $('#eventid').val();
    if (!eventNo) {
        alert("Please select an event to delete.");
        return;
    }

    const password = prompt("Please enter your password to confirm deletion:");

    if (!password) {
        alert("Deletion cancelled.");
        return;
    }

    // First verify password
    $.ajax({
        url: '/verify-password',
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            password: password
        },
        success: function (res) {
            if (res.status === 'success') {
                // Proceed to delete
                $.ajax({
                    url: '/delete-event',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        EventNo: eventNo
                    },
                    success: function (delRes) {
                        alert("Deleted: " + delRes.Code);
                        Cleardata();
                    },
                    error: function (xhr) {
                        alert("Delete failed.");
                        console.error(xhr.responseText);
                    }
                });
            } else {
                alert("Incorrect password. Deletion denied.");
            }
        },
        error: function (xhr) {
            alert("Password verification failed.");
            console.error(xhr.responseText);
        }
    });
});

</script>
@stop

@stop


@section('content')
