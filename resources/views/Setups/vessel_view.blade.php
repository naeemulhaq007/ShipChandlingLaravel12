@extends('layouts.app')



@section('title', 'Vessel-Setup')
<meta name="_token" content="{{ csrf_token() }}">
@section('content_header')
@stop

@section('content')
</div>
@php
$name = request()->get('name');
$code = request()->get('code');

@endphp
<?php echo View::make('partials.search'); ?>
<?php echo View::make('partials.Vessellistimport'); ?>
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
    @foreach ($errors->all() as $error)
    <strong>{{ $error }}</strong>
    @endforeach

</div>
@endif

<form id="VesselForm">
    @csrf


    <div class="col-md-12 ">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <h2 class="">Create Vessel</h2>

                    <div class="card-tools ml-auto">
                        <div class="row">
                         
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                </div>




            </div>
            <!-- /.card-header -->
            <div class="card-body">



                <div class="row py-1">




                    <input type="hidden" class="" value="{{ $code ? $code : '' }}" name="companycode" id="companycode">

                    <div class="inputbox py-2 col-sm-5">
                        <input type="text" class="" id="discompanyname" value="{{ $name ? $name : '' }}" readonly
                            name="discompanyname" data-toggle="modal" data-target="#searchrmod" required="required">
                        <input type="hidden" class="" id="companyname" name="companyname" data-toggle="modal"
                            data-target="#searchrmod" disabled required="required">
                        <span class="Txtspan">
                            Customer
                        </span>
                    </div>
                    <div class="input-group-append col-sm-1 py-2">
                        <button type="button"
                            class="btn btn-info w-100 d-flex align-items-center justify-content-center"
                            data-toggle="modal" data-target="#searchrmod" data-id="cussearch" data-name="cussearch"
                            data-th1="Customer Code" data-th2="Customer Name" data-th3="Address"
                            data-th4="Email Address">
                            <i class="fa fa-search mr-2"></i> Search
                        </button>
                    </div>

                    <!-- <div class="input-group-append py-2 col-sm-1">
                            <button type="button" class="form-control btn btn-info " data-toggle="modal"
                                data-target="#searchrmod" data-id="cussearch" data-name="cussearch" data-th1="Customer Code"
                                data-th2="Customer Name" data-th3="Address" data-th4="Email Address"><i
                                    class="fa fa-search mr-1"></i>Search</button>
                        </div> -->
                    <div class="inputbox col-sm-5" hidden>
                        <input type="text" class="" readonly id="vessel_code" value="" name="vessel_code"
                            required="required">
                        <input type="hidden" class="" id="vesselcode" name="vesselcode">
                        <span class="Txtspan">
                            Vessel Code
                        </span>
                    </div>
                </div>





                <div class="row">
                    <div class="inputbox col-sm-5 py-2">
                        <input type="text" class="" id="imo" name="IMONo" required="required">
                        <span class="Txtspan">
                            IMO #
                        </span>
                    </div>

                    <div class="col-sm-1"></div>
                    <div class="inputbox col-sm-5 py-2">
                        <input type="text" class="" id="vesselname" onblur="this.value = this.value.toUpperCase()"
                            name="VesselName" required="required">
                        <span class="Txtspan">
                            Vessel Name
                        </span>
                    </div>


                </div>
                <div class="row ">
                    <div class="inputbox col-sm-5 PY-2">
                        <input type="text" class="" id="vesseltype" onblur="this.value = this.value.toUpperCase()"
                            name="VesselType" list="type" required>
                        <datalist id="type">
                            <option value="Marine">
                            <option value="Tag">
                            <option value="Bulk">
                            <option value="Cargo">
                        </datalist>
                        <span class="Txtspan">
                            Vessel Type
                        </span>
                    </div>
                    {{-- <div class="input-group col-sm-5">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="">Vessel Type :</span>
                            </div>
                            <input type="text" required name="vesseltype"
                                onblur="this.value = this.value.toUpperCase()" class="form-control" id="vesseltype"
                                list="type">
                            <datalist id="type">
                                <option value="Marine">
                                <option value="Tag">
                                <option value="Bulk">
                                <option value="Cargo">
                            </datalist>

                        </div> --}}
                    <div class="col-sm-1"></div>
                    <div class="inputbox col-sm-5 PY-2">
                        <input type="email" class="" id="email" name="email">
                        <span class="">
                            Email
                        </span>
                    </div>

                </div>
                <div class="row">
                    <div class="inputbox col-sm-5 PY-2">
                        <input type="text" class="" id="callsign" name="callsign">
                        <span class="">
                            Call Sign
                        </span>
                    </div>

                    <div class="col-sm-1"></div>
                    <div class="inputbox col-sm-5 PY-2">
                        <input type="text" class="" id="phonenumber" name="phonenumber">
                        <span class="">
                            Phone number
                        </span>
                    </div>


                </div>


                <div class="row ">
                    {{-- <div class="inputbox col-sm-5">
                            <textarea class="" name="VNotes" id="VNotes" rows="3"></textarea>


                            <span class="Txtspan">
                                Vessel Notes :
                             </span>
                        </div> --}}
                    <div class="inputbox col-sm-5 PY-2">
                        {{-- <input type="text" class="" id="phonenumber"  name="phonenumber" required="required"> --}}
                        <textarea class="" name="VNotes" id="VNotes" rows="1"></textarea>

                        <span class="">
                            Vessel Notes
                        </span>
                    </div>
                    <div class="col-sm-1"></div>
                    <div class="inputbox col-sm-5 PY-2">
                        <input type="text" class="" id="purchaser" name="purchaser">
                        <span class="">
                            Purchaser
                        </span>
                    </div>

                </div>



                <div class="row">
                    <div class="inputbox col-sm-5 PY-2">
                        <input type="text" class="" id="Supintendent" name="Supintendent">
                        <span class="">
                            Supintendent
                        </span>
                    </div>

                    <div class="col-sm-1"></div>
                    <div class="inputbox col-sm-5 PY-2">
                        <input type="text" class="" id="fleetmanager" name="fleetmanager">
                        <span class="">
                            Fleet Manager
                        </span>
                    </div>


                </div>


<div class="row">
    <div class="col-auto my-2 mx-1">
       <a id="NewBtn" onclick="location.reload();" class="btn btn-info w-100 px-3 py-2" role="button">
            <i class="fa fa-plus me-1"></i> New
        </a>
    </div>

    <div class="col-auto my-2 mx-1">
        <button type="submit" class="btn btn-success w-100 px-3 py-2">
            <i class="fa fa-file-archive me-1" aria-hidden="true"></i> Save
        </button>
    </div>

    <div class="col-auto my-2 mx-1">
        <a id="DeleteBtn" class="btn btn-danger w-100 px-3 py-2" role="button">
            <i class="fa fa-trash me-1"></i> Delete
        </a>
    </div>

    <div class="col-auto my-2 mx-1">
      <a class="btn btn-danger w-100 px-3 py-2" href="{{ url('vessel-setup') }}" role="button">
    <i class="fa fa-sign-out me-1"></i> Exit
</a>

        
    </div>
</div>





            </div>





        </div>
    </div>

</form>

<div class="col-md-12">
    <div class="card ">
        <div class="card-header">


            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>

                </button>


            </div>
            <h3 class="">Update Vessel</h3>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-light" id="Vesseltable" style="width: 100%">
                <thead class="thead-light">
                    <tr>

                        <th>Customer Code</th>
                        <th>Vessel Name</th>
                        <th>IMO No</th>
                        <th hidden>VesselType</th>
                        <th hidden>VCallSign</th>
                        <th hidden>Email</th>
                        <th hidden>PhoneNo</th>
                        <th hidden>VNotes </th>
                        <th hidden>CHKHOLD </th>
                        <th hidden>block </th>
                        <td hidden>ID</td>

                    </tr>
                </thead>
                <tbody id="Vesseltablebody">


                </tbody>

            </table>
        </div>
    </div>
</div>


@stop

@section('css')
{{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"> --}}

<style>
</style>
@stop

@section('js')
{{-- <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script> --}}

<script type="text/javascript">
function ajaxSetup() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
}



$(document).ready(function() {
    '{{ $lastid }}'
    let x = '{{ $lastid }}';
    x++;
    let z = x;

    $('#vesselcode').val(z);
    $('#vessel_code').val(z);

    // Dataget();

    $('#DeleteBtn').click(function(e) {
        e.preventDefault();
        var vesselcode = $('#vessel_code').val();
        var password = prompt("Please enter Admin Authentication:");
        if (password === "332211") {
            if (confirm("Are you sure you want to proceed?")) {
                // proceed with action
                ajaxSetup();
                $.ajax({
                    url: '/VesselDelete',
                    type: 'POST',
                    data: {
                        vesselcode,
                    },
                    beforeSend: function() {
                        $('.overlay').show();
                    },
                    success: function(resposne) {
                        console.log(resposne);
                        if (resposne.Message == 'Deleted') {
                            alert(resposne.Message)

                            if (resposne.VesselSetup.length > 0) {
                                // table1.clear().draw(); // Clear and redraw the table
                                table1.ajax.reload();


                            }
                            // var table1 = $('#Vesseltable').DataTable();
                            // table1.clear().draw(); // Clear and redraw the table
                        }

                    },
                    error: function(data) {
                        console.log(data);
                        $('.overlay').hide();
                    },
                    complete: function() {
                        $('.overlay').hide();
                    }


                });
            } else {
                alert("Access denied.");
            }
        } else {
            alert("Incorrect password.");
        }
    });


    var table1 = $('#Vesseltable').DataTable({
        scrollY: 400,
        deferRender: true,
        scroller: true,
        paging: true, // Enable pagination
        pageLength: 10, // Set the number of rows per page
        // info: false,
        // ordering: false,
        // searching:false,
        ajax: {
            url: '{{ route('VesselGetData') }}', // The URL to fetch data from
            type: 'POST', // The HTTP request type
            dataSrc: 'VesselSetup', // The key in the JSON response containing the data
            data: function(data) {
                data._token = $('meta[name="csrf-token"]').attr('content');
                data.CustomerCode = $('#companycode').val();
            }
        },
        columns: [{
                data: 'CustomerCode'
            },
            {
                data: 'VesselName'
            },
            {
                data: 'IMONo'
            },
            {
                data: 'VesselType',
                visible: false
            }, // Hidden columns
            {
                data: 'VCallSign',
                visible: false
            },
            {
                data: 'Email',
                visible: false
            },
            {
                data: 'PhoneNo',
                visible: false
            },
            {
                data: 'VNotes',
                visible: false
            },
            {
                data: 'CHKHOLD',
                visible: false
            },
            {
                data: 'block',
                visible: false
            },
            {
                data: 'ID',
                visible: false
            },
        ]
    });


    $('#discompanyname').on('keypress', function(e) {
        if (e.which === 13) { // Check if Enter key is pressed
            e.preventDefault();
            $('#searchrmod').modal('show'); // Open the modal
        }
    });



    $('#Vesseltable tbody').on('dblclick', 'tr', function() {
        var data = table1.row(this).data(); // Get the data of the clicked row
        // You can now use the 'data' object to access the row data
        console.log('Double-clicked row data:', data);

        // Example: Accessing specific columns
        var CustomerCode = data.CustomerCode;
        var VesselName = data.VesselName;
        var IMONo = data.IMONo;
        var VesselType = data.VesselType;
        var VCallSign = data.VCallSign;
        var Email = data.Email;
        var PhoneNo = data.PhoneNo;
        var VNotes = data.VNotes;
        var CHKHOLD = data.CHKHOLD;
        var block = data.block;
        var ID = data.ID;
        var Captainname = data.Captainname;
        var purchaser = data.ContactPerName;
        var SuperintendentName = data.SuperintendentName;

        $('#companycode').val(CustomerCode);
        $('#vessel_code').val(ID);
        $('#vesselcode').val(ID);
        $('#imo').val(IMONo);
        $('#vesselname').val(VesselName);
        $('#vesseltype').val(VesselType);
        $('#email').val(Email);
        $('#callsign').val(VCallSign);
        $('#phonenumber').val(PhoneNo);
        $('#VNotes').val(VNotes);
        $('#fleetmanager').val(Captainname);
        $('#purchaser').val(purchaser);
        $('#Supintendent').val(SuperintendentName);

        if (CustomerCode) {
            ajaxSetup();
            $.ajax({
                url: '{{ route('getcustomer') }}',
                type: 'POST',
                data: {
                    CustomerCode,
                },
                success: function(response) {
                    console.log(response);
                    if (response.CustomerName) {
                        $('#discompanyname').val(response.CustomerName);
                        $('#companyname').val(response.CustomerName);

                    }
                }
            });
        }

    });

    var table2 = $('#Vessellisttable').DataTable({
        scrollY: 400,
        deferRender: true,
        scroller: true,
        paging: false,
        info: false,
        ordering: false,
        searching: false,
    });


    $('#impcuslist').click(function(e) {
        e.preventDefault();
        $('#Vessellistmodal').modal('show')
        // alert();
    });

    $('#importForm').submit(function(e) {
        e.preventDefault();

        var formData = new FormData(this);
        ajaxSetup();
        $.ajax({
            url: '{{ route('import-Vessellist') }}',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                displayImportedData(response);
            }
        });
    });

    function displayImportedData(data) {
        let table = document.getElementById('Vessellisttablebody');
        table.innerHTML = ""; // Clear the table
        data.forEach(function(item) {
            let row = table.insertRow();

            function createCell(content) {
                let cell = row.insertCell();
                cell.innerHTML = content;
                return cell;
            }
            createCell(item.CustomerCode);
            createCell(item.CustomerName);
            createCell(item.VesselCode);
            createCell(item.VesselName);
            createCell(item.IMO);
            createCell(item.Vtype);


        });

        $('#Vessellisttables').show();
        $('#SaveVessellist').show();
        table2.columns.adjust();

        function tablecompser() {
            let table = document.getElementById('Vessellisttablebody');
            let rows = table.rows;
            let dataarray = [];
            for (let i = 0; i < rows.length; i++) {
                let cells = rows[i].cells;
                dataarray.push({

                    CustomerCode: cells[0] ? cells[0].innerHTML : '',
                    CustomerName: cells[1] ? cells[1].innerHTML : '',
                    VesselCode: cells[2] ? cells[2].innerHTML : '',
                    VesselName: cells[3] ? cells[3].innerHTML : '',
                    IMO: cells[4] ? cells[4].innerHTML : '',
                    Vtype: cells[5] ? cells[5].innerHTML : '',

                });
            }
            return dataarray;
        }

         $('#SaveVessellist').click(function(e) {
    e.preventDefault();
    var dataarray = tablecompser();
    console.log(dataarray);
    ajaxSetup();
    $.ajax({
        url: '{{ route('Vessellist_save')}}',
        type: 'POST',
        data: {
            dataarray
        },
        beforeSend: function() {
            $('.overlay').show();
            $("#SaveVessellist").attr("disabled", true);
        },
        success: function(response) {
            console.log(response);
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Vessel list imported successfully!',
                timer: 2000,
                showConfirmButton: false
            });
        },
        error: function(xhr) {
            console.log(xhr);
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Something went wrong during import!',
                timer: 3000,
                showConfirmButton: true
            });
        },
        complete: function() {
            $('.overlay').hide();
            $("#SaveVessellist").removeAttr("disabled");
        }
    });
});



       


    }

    $('#VesselForm').submit(function(e) {
        e.preventDefault();
        var formData = $('#VesselForm').serialize();
        ajaxSetup();
        $.ajax({
            type: "POST",
            url: "{{route('vesselstore')}}",
            data: formData,
            beforeSend: function() {
                // Show the overlay and spinner before sending the request
                $('.overlay').show();
            },
            success: function(response) {
                console.log(response);

                Swaal.fire({
                    icon: 'success',
                    title: 'Process Success',
                    text: response.success,
                    showConfirmButton: true,
                    timer: 1500
                })
            },
            error: function(xhr) {
                $('.overlay').hide();
                console.log(xhr);
            },
            complete: function() {
                // Hide the overlay and spinner after the request is complete
                $('.overlay').hide();
            }
        });
    });




    $(document).on("dblclick", ".js-click", function() {

        $customername = $(this).attr('data-cusname');
        $targetcustcode = $(this).attr('data-custcode');


        document.getElementById("discompanyname").value = $customername;
        document.getElementById("companyname").value = $customername;
        document.getElementById("companycode").value = $targetcustcode;
        $('#searchrmod').modal('hide');
        table1.ajax.reload();
    });
});
</script>


@stop


@section('content')