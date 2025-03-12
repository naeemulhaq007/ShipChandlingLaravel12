@extends('layouts.app')



@section('title', 'Events')

@section('content_header')
@stop

@section('content')


    <?php echo View::make('partials.search'); ?>
    <?php echo View::make('partials.searchves'); ?>

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
    <form id="eventform" action="event/store" method="post">
        @csrf
        <div class="container-fluid">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Create Event</h5>


                        <div class="card-tools">
                            <button class="btn btn-primary" id="Newbtn">New</button>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>


                        </div>

                    </div>

                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="row pt-2">
                                {{-- <div class="inputbox col-sm-6">
                                        <textarea name="GeneralVesselNote" id="generalvessel"
                                        ></textarea>
                                        <span class="Txtspan">Event Quate Chargers  :</span>

                                    </div> --}}

                                <div class="inputbox col-sm-6 ml-4">
                                    <textarea title="GeneralVessel" placeholder="" name="GeneralVesselNote" id="generalvessel" cols="10"
                                        rows="2"></textarea>


                                    <span class="Txtspan">
                                        General Vessel : </span>

                                </div>
                            </div>

                            {{-- <div class="input-group col-md-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="">General Vessel :</span>
                                    </div>
                                    <textarea class="form-control" title="GeneralVessel" placeholder="" name="GeneralVesselNote" id="generalvessel"
                                        cols="10" rows="2"></textarea>
                                </div> --}}

                            <ul class="nav ">


                                <li class="nav-link btn"><a data-toggle="pill" href="#create">RFQ Create</a></li>
                                <li class="nav-link btn "><a data-toggle="pill" href="#internal">Internal Notes</a></li>


                            </ul>









                            <div class="tab-content">
                                <div id="create" class="tab-pane  in active">

                                    <div class="container-fluid">
                                        <input type="hidden" class="form-control" name="EventNo" id="eventid"
                                            title="eventid">


                                        <div class="col-md-12">
                                            <div class="row py-2">
                                                <div class="input-group col-sm-12 ">
                                                    <div class="inputbox col-sm-3 ">
                                                        <input type="number" class=" " name="Customercode"
                                                            id="companycode" required="required" placeholder="Customer Code"
                                                            readonly>
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
                                                        <input type="hidden" class=" " name="BranchCode"
                                                            id="BranchCode">
                                                        <span class="ml-2">
                                                            B.Code
                                                        </span>
                                                    </div>
                                                    <div hidden class="inputbox col-sm-1 ">
                                                        <input type="hidden" class=" " name="CustomerActCode"
                                                            id="ACTcode" required="required">
                                                        <span class="ml-2">
                                                            C. Act. Code
                                                        </span>
                                                    </div>
                                                    <div class="inputbox col-sm-6">
                                                        <input type="text" class="" name="CustomerName"
                                                            id="companyname" data-toggle="modal" data-target="#searchrmod"
                                                            data-id="cussearch" data-name="cussearch"
                                                            data-th1="Customer Code" data-th2="Customer Name"
                                                            data-th3="Address" data-th4="Email Address" required readonly
                                                            name="CustomerName" id="companyname"
                                                            value="{{ old('CustomerName') }}" title="Customer Name"
                                                            placeholder="Customer Name" required="required">
                                                        <span class="Txtspan">
                                                            Customer
                                                        </span>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <span data-toggle="modal" data-target="#searchrmod"
                                                            data-id="cussearch" data-name="cussearch"
                                                            data-th1="Customer&nbsp;Code" data-th2="Customer&nbsp;Name"
                                                            data-th3="Address" data-th4="Email Address" data-th5='Status'
                                                            class="input-group-text bg-info" style="cursor: pointer;"
                                                            id="cussearch"><i class="fas fa-search"></i></span>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="row py-2">
                                                <div class="input-group col-sm-12 ">



                                                    <div class="inputbox col-sm-3 ">
                                                        <input type="number" class=" " name="IMONo"
                                                            id="vesselcode" value="" title="IMONo"
                                                            placeholder="Vcode" readonly>
                                                        <span class="Txtspan">
                                                            Vess. Code
                                                        </span>
                                                    </div>
                                                    <div hidden class="inputbox col-sm-2 ">
                                                        <input type="hidden" class=" " name="Vcode"
                                                            id="Vcode" value="" title="Vcode"
                                                            placeholder="IMONo" readonly>
                                                        <span class="ml-1">
                                                            V. Code
                                                        </span>
                                                    </div>
                                                    <div hidden class="inputbox col-sm-2 ">
                                                        <input type="hidden" class=" " name="vid"
                                                            id="vid" value="" title="vid"
                                                            placeholder="vid" readonly>
                                                        <span class="ml-1">
                                                            Vid. Code
                                                        </span>
                                                    </div>
                                                    <div class="inputbox col-sm-6">
                                                        <input type="text" class="" readonly required
                                                            name="VesselName" data-toggle="modal"
                                                            data-target="#searchrmodw" value="" id="vesselname"
                                                            title="Vessel Name" placeholder="Vessel Name"
                                                            required="required">
                                                        <span class="Txtspan">
                                                            Vessel
                                                        </span>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text bg-info" style="cursor: pointer;"
                                                            data-toggle="modal" data-target="#searchrmodw"id="vensearch"
                                                            data-id="vensearch" data-name="vensearch"
                                                            data-th1="Vessel Code" data-th2="Vessel Name"
                                                            data-th3="Address" data-th4="Email Address"><i
                                                                class="fas fa-search"></i></span>
                                                    </div>

                                                </div>
                                            </div>





                                            {{-- <div class="row py-1">
                                                    <div class="input-group col-md-8">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="">Vessel :</span>
                                                        </div>
                                                        <input type="text" class="form-control" readonly required
                                                            name="VesselName" data-toggle="modal"
                                                            data-target="#searchrmodw" value="" id="vesselname"
                                                            title="Vessel Name" placeholder="Vessel Name">
                                                    </div>

                                                    <div class="col-sm-1">
                                                        <button type="button" class="form-control btn btn-success"
                                                            data-toggle="modal" data-target="#searchrmodw"id="vensearch"
                                                            data-id="vensearch" data-name="vensearch"
                                                            data-th1="Vessel Code" data-th2="Vessel Name"
                                                            data-th3="Address" data-th4="Email Address"><i
                                                                class="fa fa-search"></i></button>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="number" class="form-control" readonly
                                                            name="IMONo" id="vesselcode" value="" title="IMONo"
                                                            placeholder="IMONo">
                                                    </div>

                                                    <input type="hidden" class="form-control" name="Vcode"
                                                        id="Vcode" title="Vcode" placeholder="Vcode">


                                                    <input type="hidden" class="form-control" name="vid"
                                                        id="vid" title="vid" placeholder="vid">


                                                </div> --}}
                                            <div class="row py-2">
                                                <div class="input-group col-sm-12 ">
                                                    <div class="inputbox col-sm-3">
                                                        <input type="text" name="Name" id="name"
                                                            title="name">
                                                        <span class="Txtspan">
                                                            Name
                                                        </span>
                                                    </div>
                                                    <div class="inputbox col-sm-3">
                                                        <input type="text" name="Contact" id="Contact"
                                                            title="Contact" placeholder="Wait">
                                                        <span class="Txtspan">
                                                            Contact
                                                        </span>
                                                    </div>
                                                    <div class="inputbox col-sm-3">
                                                        <input type="text" name="Cell" id="cell"
                                                            title="cell" placeholder="">
                                                        <span class="Txtspan">
                                                            Cell
                                                        </span>
                                                    </div>
                                                    <div class="inputbox col-sm-3">
                                                        <input type="text" name="Email" id="email"
                                                            title="email" placeholder="">
                                                        <span class="Txtspan">
                                                            Email
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>




                                            {{-- <div class="row py-1">

                                                    <div class="input-group col-md-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="">Warehouse
                                                                :</span>
                                                        </div>
                                                        <select class="custom-select" required name="GodownName"
                                                            id="GodownName">

                                                            <option id="GodownName" value="" selected> </option>
                                                            @foreach ($warehouse as $item)
                                                                <option id="{{ $item->GodownCode }}"
                                                                    data-GodownCode="{{ $item->GodownCode }}"
                                                                    value="{{ $item->GodownName }}">{{ $item->GodownName }}
                                                                </option>
                                                            @endforeach

                                                        </select>
                                                    </div>

                                                    <input type="hidden" class="form-control" name="GodownCode"
                                                        id="godowncode" title="godowncode" value=""
                                                        placeholder="">




                                                    <div class="input-group col-md-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="">RtnVia :</span>
                                                        </div>
                                                        <select class="custom-select" name="ReturnVia" id="ReturnVia">

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
                                                    <div class="input-group col-md-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="">Phone :</span>
                                                        </div>
                                                        <input class="form-control" type="tel" name="Phone"
                                                            id="phoneno">
                                                    </div>
                                                    <div class="input-group col-md-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="">Name :</span>
                                                        </div>
                                                        <input type="text" class="form-control" name="Name"
                                                            id="name" title="name" placeholder="">
                                                    </div>
                                                </div> --}}

                                            <div class="row py-2">
                                                <div class="input-group col-sm-12 ">

                                                    <div class="inputbox col-sm-2">
                                                        <select required name="GodownName" id="GodownName">

                                                            <option id="GodownName" value="" selected> </option>
                                                            @foreach ($warehouse as $item)
                                                                <option id="{{ $item->GodownCode }}"
                                                                    data-GodownCode="{{ $item->GodownCode }}"
                                                                    value="{{ $item->GodownName }}">{{ $item->GodownName }}
                                                                </option>
                                                            @endforeach

                                                        </select>
                                                        <span class="Txtspan">
                                                            Warehouse
                                                        </span>
                                                    </div>
                                                    <div class="inputbox col-sm-1">

                                                    <button type="button" class="btn btn-tool">
                                                        <i class="fas fa-plus"></i>
                                                    </button></div>

                                                    <input type="hidden"name="GodownCode" id="godowncode"
                                                        title="godowncode" value="" placeholder="">

                                                    <div class="inputbox col-sm-3">
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
                                                        <span class="Txtspan">
                                                            RtnVia
                                                        </span>
                                                    </div>
                                                    <div class="inputbox col-sm-3">
                                                        <input type="tel" name="Phone" id="phoneno">
                                                        <span class="Txtspan">
                                                            Phone
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="row py-1">

                                                <div class="input-group col-md-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="">Contact :</span>
                                                    </div>
                                                    <input type="text" class="form-control" name="Contact"
                                                        id="Contact" title="Contact" placeholder="Wait">

                                                </div>

                                                <div class="input-group col-md-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="">Cell :</span>
                                                    </div>
                                                    <input type="text" class="form-control" name="Cell"
                                                        id="cell" title="cell" placeholder="">
                                                </div>


                                                <div class="input-group col-md-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="">Email :</span>
                                                    </div>
                                                    <input type="text" class="form-control" name="Email"
                                                        id="email" title="email" placeholder="">
                                                </div>

                                                <div class="input-group col-md-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="">Fax :</span>
                                                    </div>
                                                    <input type="text" class="form-control" name="Fax"
                                                        id="fax" title="fax" placeholder="">
                                                </div>
                                            </div> --}}

                                            <div class="row py-2">
                                                <div class="input-group col-sm-12 ">

                                                    <div class="inputbox col-sm-3">
                                                        <input type="date" required name="ETA" id="ETA">
                                                        <span class="Txtspan">
                                                            ETA
                                                        </span>

                                                    </div>

                                                    <div class="inputbox col-sm-3">
                                                        <input required type="date" name="BidDUeDate" id="BidDueDate">
                                                        <span class="Txtspan">
                                                            Bid DueDate
                                                        </span>
                                                    </div>

                                                    <div class="inputbox col-sm-3">
                                                        <input type="time" required id="appt" name="DueTime">
                                                        <span class="Txtspan">
                                                            Due Time
                                                        </span>
                                                    </div>



                                                </div>
                                            </div>
                                            {{-- <div class="row py-1"> --}}


                                            {{-- <div class="input-group col-md-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="">Bid DueDate
                                                            :</span>
                                                    </div>
                                                    <input class="form-control" required type="date" name="BidDUeDate"
                                                        id="BidDueDate">
                                                </div>

                                                <div class="input-group col-md-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="">Due Time
                                                            :</span>
                                                    </div>
                                                    <input type="time" class="form-control" required id="appt"
                                                        name="DueTime">

                                                </div>

                                                <div class="input-group col-md-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="">ETA :</span>
                                                    </div>
                                                    <input type="date" class="form-control" required name="ETA"
                                                        id="ETA">
                                                </div> --}}

                                            {{-- <div class="input-group col-md-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="">Status :</span>
                                                    </div>
                                                    <select class="custom-select" required name="Status" id="Status">

                                                        <option selected> </option>
                                                        <option value="IN PROCESS">IN PROCESS</option>
                                                        <option value="CANCELED">CANCELED</option>
                                                        <option value="CLOSED">CLOSED</option>
                                                        <option value="ORDER RECEIVED">ORDER RECEIVED</option>


                                                    </select>
                                                </div>
                                            </div> --}}
                                            <div class="row py-2">
                                                <div class="input-group col-sm-12 ">
                                                    <div class="inputbox col-sm-3">
                                                        <select required name="Status" id="Status">

                                                            <option selected> </option>
                                                            <option value="IN PROCESS">IN PROCESS</option>
                                                            <option value="CANCELED">CANCELED</option>
                                                            <option value="CLOSED">CLOSED</option>
                                                            <option value="ORDER RECEIVED">ORDER RECEIVED</option>


                                                        </select>
                                                        <span class="Txtspan">
                                                            Status
                                                        </span>
                                                    </div>

                                                    <div class="inputbox col-sm-3">
                                                        <select required name="Priority" id="Priority">

                                                            <option selected>Select one</option>
                                                            <option value="Low">Low</option>
                                                            <option value="Medium">Medium</option>
                                                            <option value="High">High</option>
                                                            <option value="N/A">N/A</option>



                                                        </select>
                                                        <span class="Txtspan">
                                                            Priority
                                                        </span>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="inputbox">
                                                            <input type="text" name="ShippingPort" id="ShippingPort"
                                                                list="ShippingPort">
                                                            <datalist id="ShippingPort">
                                                                @foreach ($shiping as $item)
                                                                    <option id="" value="{{ $item->PortName }}">
                                                                @endforeach
                                                            </datalist>
                                                            <span class="Txtspan">
                                                                Port
                                                            </span>

                                                        </div>
                                                    </div>
                                                    <div class="col-sm-1">
                                                        <button type="button" class="btn btn-tool">
                                                            <i class="fas fa-plus"></i>
                                                        </button>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="row py-2">
                                                <div class="input-group col-sm-12 ">
                                                    <div class="inputbox col-sm-6">
                                                        <textarea name="followup" id="followup" cols="28" rows="3"></textarea>
                                                        <span class="Txtspan">
                                                            Follow Up</span>

                                                    </div>
                                                </div>
                                            </div>

                                            {{-- <div class="row py-1">

                                                <div class="input-group col-md-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="">Priority
                                                            :</span>
                                                    </div>
                                                    <select class="custom-select" required name="Priority"
                                                        id="Priority">

                                                        <option selected>Select one</option>
                                                        <option value="Low">Low</option>
                                                        <option value="Medium">Medium</option>
                                                        <option value="High">High</option>
                                                        <option value="N/A">N/A</option>



                                                    </select>
                                                </div>


                                                <div class="input-group col-md-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="">Port :</span>
                                                    </div>

                                                    <input type="text" name="ShippingPort" class="form-control"
                                                        id="ShippingPort" list="ShippingPort">
                                                    <datalist id="ShippingPort">
                                                        @foreach ($shiping as $item)
                                                            <option id="" value="{{ $item->PortName }}">
                                                        @endforeach
                                                    </datalist>
                                                </div>
                                                <div class="col-sm-1">

                                                </div>
                                                <div class="col-sm-1">
                                                </div>

                                            </div> --}}
                                            {{-- <div class="row py-1">

                                                <div class="input-group col-md-6">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="">Follow Up
                                                            :</span>
                                                    </div>
                                                    <textarea class="form-control" name="followup" id="followup" cols="28" rows="3"></textarea>
                                                </div>

                                            </div> --}}
                                            <div class="btn-toolbar float-right" role="toolbar" aria-label="">
                                                <div class="btn-group" role="group" aria-label="">

                                                    <button type="submit" id="savebtn" class="btn btn-primary"><i
                                                            class="fa fa-file-archive mr-1" aria-hidden="true"></i>Save
                                                        Event</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>












                                <div id="internal" class="tab-pane  in fade">

                                    <div class="container-fluid">
                                        <table
                                            class="table table-striped table-inverse table-responsive table-bordered table-hover">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </form>














@stop

@section('css')



    <style>
        /* .card-body span {
                            width: 85px;
                            font-size: 11px;

                        }

                        .form-control {
                            font-size: 11px;

                        }

                        .custom-select {
                            font-size: 11px;

                        } */
    </style>
@stop

@section('js')


    <script>
        $(document).ready(function() {
            $(document).on("dblclick", ".js-click", function() {
                $targetcustcode = $(this).attr('data-custcode');
                $targetact = $(this).attr('data-act');
                $targetcuscode = $(this).attr('data-cuscode');
                $targetcusname = $(this).attr('data-cusname');
                // $targetID = $(this).attr('data-id');


                //value set


                document.getElementById("companyname").value = $targetcusname;
                document.getElementById("companycode").value = $targetcustcode;
                document.getElementById("searchbox").value = $targetcustcode;
                document.getElementById("Custcode").value = $targetcuscode;
                document.getElementById("ACTcode").value = $targetact;
                $('#searchrmod').modal('hide');


            });


            let x = {{ $lastid }};
            x++;
            let z = x;


            document.getElementById("eventid").value = z;
            // document.getElementById("eventidquote").value = p;

            $(document).on("dblclick", ".vesrow", function() {
                $targetvesname = $(this).attr('data-vesname');
                $targetvesimo = $(this).attr('data-vesimo');

                document.getElementById("vesselname").value = $targetvesname;
                document.getElementById("vesselcode").value = $targetvesimo;
                $('#searchrmodw').modal('hide');

            });

            $("#Department").on('change', function() {
                var id = this.options[this.selectedIndex].id;
                // console.log(id);
                document.getElementById("Department_coder").value = id;

            });
            $("#GodownName").on('change', function() {
                var id = this.options[this.selectedIndex].id;
                // console.log(id);
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
        });


        // }
    </script>
@stop


@section('content')
