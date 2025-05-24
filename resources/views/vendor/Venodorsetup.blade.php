@extends('layouts.app')



@section('title', 'Vendor-Setup')

@section('content_header')
@stop

@section('content')
    <?php echo View::make('partials.Vendorlistimport'); ?>

    {{-- </div> --}}
    <div id="alert-container">

    </div>
    <div class="tab-content">


        <div class="col-md-12 pt-2">
            <div class="card">
                <div class="card-header">

                    <div class="row ">
                        <div class="col-sm-4"></div>
                        <h2 class="mx-auto col-sm-7">Vendor Registration</h2>

                        {{-- <a name="firstvoucher" data-voucherno="" id="firstvoucher" class="btn btn-secondary mx-1 "
                        role="button"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                        <a name="" id="minus" class="btn btn-info mx-1" onclick="MinusCaps()" role="button"><i
                                class="fa fa-arrow-circle-left" aria-hidden="true"></i></a>
                        <a name="" id="plus" class="btn btn-info mx-1" onclick="PlusCaps()" role="button"><i
                                class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                        <a name="" id="lastvoucher" data-voucherno="" class="btn btn-secondary mx-1"
                            role="button"><i class="fa fa-arrow-right" aria-hidden="true"></i></a> --}}
                        <div class="card-tools ml-auto">
                            <!--<a name="Vendorlistbtn" data-voucherno="" id="Vendorlistbtn"-->
                            <!--    class="btn btn-default text-success mx-1 ml-auto" role="button">IMPORT List</a>-->
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>


                    </div>

                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <div class="row py-1">
                        <div class="col-lg-6">
                            <div class="row py-2 ">
                                <div class="inputbox col-sm-8">
                                    <input type="text" 
       class="" 
       value="{{ $VenderCode }}" 
       id="VenderCode"
       name="VenderCode"
       required="required"
       readonly
       autocomplete="off"
       data-lpignore="true"
       onfocus="this.blur();">

                                    <!--<input type="text" class="" value="{{ $VenderCode }}" id="VenderCode"-->
                                    <!--    required="required">-->
                                    <span class="Txtspan">
                                        Vendor Code
                                    </span>
                                </div>
                            </div>
                            <div class="row py-2 ">
                                <div class="inputbox col-sm-8">
                                    <input type="text" class="" id="VenderName" required="required">
                                    <span class="Txtspan">
                                        Vendor Name
                                    </span>
                                </div>
                            </div>




                            <div class="row py-2 ">
                                <div class="inputbox col-sm-8">
                                    <input type="text" class="" id="PhoneNo" required="required">
                                    <span class="Txtspan">
                                        Phone No.
                                    </span>
                                </div>
                            </div>



                            <div class="row py-2 ">
                                <div class="inputbox col-sm-8">
                                    <input type="text" class="" id="CallSign" required="required">
                                    <span class="Txtspan">
                                        Call Sign
                                    </span>
                                </div>
                            </div>
                            <div class="row py-2 ">
                                <div class="inputbox col-sm-8">
                                    <input type="text" class="" id="Address" required="required">
                                    <span class="Txtspan">
                                        Address
                                    </span>
                                </div>
                            </div>

                            <div class="row py-2 ">
                                <div class="inputbox col-sm-8">
                                    <input type="text" class="" id="FaxNo" required="required">
                                    <span class="Txtspan">
                                        Fax No.
                                    </span>
                                </div>
                            </div>






                            <div class="row py-2 ">
                                <div class="inputbox col-sm-8">
                                    <input type="email" name="EmailAddress" id="EmailAddress">
                                    <span class="Txtspan">
                                        Email Address
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="row py-2 ">
                                <div class="inputbox col-sm-8 ml-2">
                                    <input type="text" name="WebAddress" id="WebAddress">
                                    <span class="Txtspan">
                                        Web Address
                                    </span>
                                </div>
                            </div>
                            <div class="row py-2">



                                <div class="inputbox col-sm-8 ml-2">
                                    <span class="Txtspan">
                                        Status
                                    </span>
                                    <select name="Status" id="Status">
                                        <option value="ACTIVE">ACTIVE</option>
                                        <option value="INACTIVE">INACTIVE</option>
                                    </select>
                                </div>
                            </div>




                            <div class="row py-2">




                                <div class="inputbox col-sm-8 ml-2">
                                    <span class="Txtspan">
                                        Department
                                    </span>
                                    <select name="Department" id="Department">
                                        @foreach ($TypeSetup as $TypeSetupitem)
                                            <option value="{{ $TypeSetupitem->TypeCode }}">{{ $TypeSetupitem->TypeName }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>


                            </div>


                            <div class="row py-2 ">
                                <div class="inputbox col-sm-8 ml-2">
                                    <input type="text" name="City" id="City">
                                    <span class="Txtspan">
                                        City
                                    </span>
                                </div>
                            </div>
                            <div class="row py-2 ">
                                <div class="inputbox col-sm-8 ml-2">
                                    <input type="text" name="Country" id="Country">
                                    <span class="Txtspan">
                                        Country
                                    </span>
                                    <datalist id="Country">

                                    </datalist>
                                </div>

                            </div>
                            <div class="row py-2 ">
                                <div class="inputbox col-sm-8 ml-2">
                                    <input type="text" name="State" id="State">
                                    <span class="Txtspan">
                                        State
                                    </span>
                                    <datalist id="State">

                                    </datalist>
                                </div>

                            </div>




                            <div class="row py-2 ">
                                <div class="inputbox col-sm-8 ml-2">
                                    <input type="date" name="Date" id="Date">
                                    <span class="Txtspan">
                                        Date
                                    </span>

                                </div>

                            </div>




                        </div>






                        <div class="btn-toolbar float-right" role="toolbar" aria-label="">
                            <div class="btn-group ml-2" role="group" aria-label="">
                                      <button class="btn btn-primary my-2 mx-2" id="CmdAdd"  onclick="location.reload();" role="button"> <i class="fa fa-plus mr-1"
                            aria-hidden="true"></i>New</button>

                    <button class="btn btn-success my-2 mx-2" id="save" role="button"> <i class="fa fa-cloud mr-1"
                            aria-hidden="true"></i>Save</button>

                    <button class="btn btn-warning my-2 mx-2" id="CmdDelete" role="button"> <i
                            class="fa fa-multiply mr-1" aria-hidden="true"></i>Delete</button>
                    <a href="{{url('vendor-setup') }}" class="btn btn-danger my-2 mx-2" id="CmdExit" role="button">
                        <i class="fa fa-door-open mr-1" aria-hidden="true"></i>Exit</a>
                             
                            </div>
                        </div>

                    </div>








                </div>
            </div>

            </form>

        </div>


        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">



                    <div class="rounded shadow">
                        <table class="table " id="Warehousetable">
                            <thead class="">
                                <tr>
                                    <th>Code</th>
                                    <th>Vendor Name</th>
                                    <th>Department</th>
                                    <th>Email Address</th>
                                    <th>Address</th>

                                    <th hidden>Web Address</th>
                                    <th hidden>Status</th>
                                    <th hidden>Phone No.</th>
                                    <th hidden>Call Sign</th>
                                    <th hidden>Country</th>
                                    <th hidden>City</th>
                                    <th hidden>State</th>
                                    <th hidden>Date</th>
                                    <th hidden>Fax No.</th>
                                    <th hidden>DepartmentCode</th>



                                </tr>
                            </thead>
                            <tbody id="Warehousetablebody">
                                @foreach ($VenderSetup as $Vender)
                                    @php
                                        if ($Vender->DepartmentCode) {
                                            $depatmentname = DB::table('typesetup')
                                                ->where('TypeCode', $Vender->DepartmentCode)
                                                ->where('BranchCode', $BranchCode)
                                                ->first();
                                            $depatmentname = $depatmentname->TypeName;
                                        } else {
                                            $depatmentname = '';
                                        }
                                    @endphp


                                    <tr class="js-row">
                                        <td>{{ $Vender->VenderCode }}</td>

                                        <td>{{ $Vender->VenderName }}</td>

                                        <td>{{ $depatmentname }}</td>

                                        <td>{{ $Vender->EmailAddress }}</td>

                                        <td>{{ $Vender->Address }}</td>



                                        <td hidden>{{ $Vender->WebAddress }}</td>

                                        <td hidden>{{ $Vender->Status }}</td>

                                        <td hidden>{{ $Vender->PhoneNo }}</td>

                                        <td hidden>{{ $Vender->CallSign }}</td>

                                        <td hidden>{{ $Vender->Country }}</td>

                                        <td hidden>{{ $Vender->City }}</td>

                                        <td hidden>{{ $Vender->State }}</td>

                                        <td hidden>{{ date('Y-m-d', strtotime($Vender->Date)) }}</td>

                                        <td hidden>{{ $Vender->FaxNo }}</td>

                                        <td hidden>{{ $Vender->DepartmentCode }}</td>
                                @endforeach

                            </tbody>
                        </table>

                    </div>



                </div>
            </div>
        </div>

    @stop

    @section('css')
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">

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
            $(document).ready(function() {



                var table = $('#Warehousetable').DataTable({
                    scrollY: 400,
                    deferRender: true,
                    scroller: true,
                    paging: false,
                    info: false,
                    ordering: false,
                    responsive: true,
                    searching: true,


                });
                var table2 = $('#Vendorlisttable').DataTable({
                    scrollY: 350,
                    deferRender: true,
                    scroller: true,
                    paging: false,
                    info: false,
                    ordering: false,
                    responsive: true,
                    searching: false,


                });
                $('#Vendorlistbtn').click(function(e) {
                    e.preventDefault();
                    $('#Vendorlistmodal').modal('show')
                });

                $('#importForm').submit(function(e) {
                    e.preventDefault();

                    var formData = new FormData(this);
                    ajaxSetup();
                    $.ajax({
                        url: '{{ route('import-Vendorlist') }}',
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
    let table = document.getElementById('Vendorlisttablebody');
    table.innerHTML = ""; // Clear the table

    data.forEach(function (item) {
        let row = table.insertRow();

        function createCell(content) {
            let cell = row.insertCell();
            cell.innerHTML = content;
            return cell;
        }

        createCell(item.VendorCode);
        createCell(item.VendorName);
        createCell(item.Department);
        createCell(item.Status);
        createCell(item.CallSign);
    });

    $('#Vendorlisttables').show();
    $('#Savelist').show();
    table2.columns.adjust();
}


                 function tablecompser() {
    let table = document.getElementById('Vendorlisttablebody');
    let rows = table.rows;
    let dataarray = [];

    for (let i = 0; i < rows.length; i++) {
        let cells = rows[i].cells;
        dataarray.push({
            VendorCode: cells[0] ? cells[0].innerHTML : '',
            VendorName: cells[1] ? cells[1].innerHTML : '',
            Department: cells[2] ? cells[2].innerHTML : '',
            Status: cells[3] ? cells[3].innerHTML : '',
            CallSign: cells[4] ? cells[4].innerHTML : '',
        });
    }

    return dataarray;
}


    

               $('#Savelist').click(function(e) {
    e.preventDefault();
    var dataarray = tablecompser();
    console.log(dataarray);
    ajaxSetup();
    $.ajax({
        url: '{{ route('Vendorlist_save') }}',
        type: 'POST',
        data: {
            dataarray
        },
        beforeSend: function() {
            $('.overlay').show();
            $("#Savelist").attr("disabled", true);
        },
        success: function(response) {
            console.log(response);
            Swal.fire({
                icon: 'success',
                title: 'Saved Successfully!',
                text: 'Vendor list has been saved.',
                showConfirmButton: true,
                timer: 2500
            });
        },
        complete: function() {
            $('.overlay').hide();
            $("#Savelist").attr("disabled", false);
        }
    }); 
});



                

                $('.js-row').dblclick(function(e) {
                    e.preventDefault();
                    var row = $(this);
                    var Code = row.find('td:eq(0)').text();
                    var Name = row.find('td:eq(1)').text();
                    var Dept = row.find('td:eq(2)').text();
                    var Email = row.find('td:eq(4)').text();
                    var Addr = row.find('td:eq(3)').text();
                    var Web = row.find('td:eq(5)').text();
                    var Status = row.find('td:eq(6)').text();
                    var Phone = row.find('td:eq(7)').text();
                    var CallSign = row.find('td:eq(8)').text();
                    var Country = row.find('td:eq(9)').text();
                    var City = row.find('td:eq(10)').text();
                    var State = row.find('td:eq(11)').text();
                    var Date = row.find('td:eq(12)').text();
                    var Fax = row.find('td:eq(13)').text();
                    var DepartmentCode = row.find('td:eq(14)').text();
                    console.log(Status);
                    // var vendordate = new Date(Date);
                    // const ReqDate = vendordate.toISOString().substring(0, 10);
                    $('#VenderCode').val(Code);
                    $('#VenderName').val(Name);
                    $('#Department').val(DepartmentCode);
                    $('#EmailAddress').val(Email);
                    $('#Address').val(Addr);

                    $('#WebAddress').val(Web);
                    $('#Status').val(Status);
                    $('#PhoneNo').val(Phone);
                    $('#CallSign').val(CallSign);
                    $('#Country').val(Country);
                    $('#City').val(City);
                    $('#State').val(State);
                    $('#Date').val(Date);
                    $('#FaxNo').val(Fax);




                });




                $('#VenderCode').blur(function() {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: '{{ URL::to('vendorsearch') }}',
                        type: 'POST',
                        data: {
                            VenderCode: $('#VenderCode').val(),
                        },
                        beforeSend: function() {
                            // Show the overlay and spinner before sending the request
                            $('.overlay').show();
                        },
                        success: function(response) {
                            console.log(response);
                            if (response.status === "success") {
                                var data = response.Venodr;
                                $('#VenderCode').val(data.VenderCode);
                                $('#VenderName').val(data.VenderName);
                                $('#PhoneNo').val(data.PhoneNo);
                                $('#CallSign').val(data.CallSign);
                                $('#Address').val(data.Address);
                                $('#FaxNo').val(data.FaxNo);
                                $('#EmailAddress').val(data.EmailAddress);
                                $('#WebAddress').val(data.WebAddress);
                                $('#Status').val(data.Status);
                                $('#Department').val(data.DepartmentCode);
                                $('#WebAddress').val(data.WebAddress);
                                $('#City').val(data.City);
                                $('#Country').val(data.Country);
                                $('#State').val(data.State);
                                var today = new Date(data.Date);
                                var dd = String(today.getDate()).padStart(2, '0');
                                var mm = String(today.getMonth() + 1).padStart(2, '0');
                                var yyyy = today.getFullYear();
                                today = yyyy + '-' + mm + '-' + dd;
                                $('#Date').val(today);
                            }
                        },
                        error: function(xhr, status, error) {

                            console.log(error);

                        },
                        complete: function() {
                            // Hide the overlay and spinner after the request is complete
                            $('.overlay').hide();
                        }
                    });
            
               
            });
            
             $('#save').click(function(e) {


                    let formData = new FormData();
                    formData.append('VenderCode', $('#VenderCode').val());
                    formData.append('VenderName', $('#VenderName').val());
                    formData.append('PhoneNo', $('#PhoneNo').val());
                    formData.append('CallSign', $('#CallSign').val());
                    formData.append('Address', $('#Address').val());
                    formData.append('FaxNo', $('#FaxNo').val());
                    formData.append('EmailAddress', $('#EmailAddress').val());
                    formData.append('WebAddress', $('#WebAddress').val());
                    formData.append('Status', $('#Status').val());
                    formData.append('Department', $('#Department').val());
                    formData.append('WebAddress', $('#WebAddress').val());
                    formData.append('City', $('#City').val());
                    formData.append('Country', $('#Country').val());
                    formData.append('State', $('#State').val());
                    formData.append('Date', $('#Date').val());
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: '{{ URL::to('vendorsave') }}',
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        beforeSend: function() {
                            // Show the overlay and spinner before sending the request
                            $('.overlay').show();
                        },
                        success: function(response) {
                            if (response.status === "success") {
                                // Display a success message using a Bootstrap alert
                                var alertMessage =
                                    '<div class="alert alert-success alert-dismissible fade show" role="alert">' +
                                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                                    '<span aria-hidden="true">&times;</span>' +
                                    '</button>' +
                                    '<strong>Your request was successful!</strong>' +
                                    '</div>';
                                $("#alert-container").html(alertMessage);

                                // Scroll to the top of the page
                                window.scrollTo({
                                    top: 0,
                                    left: 0,
                                    behavior: "smooth"
                                });

                                location.reload();
                                // $('#new').click();
                            } else {
                                // Display an error message using a Bootstrap alert
                                var alertMessage =
                                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">' +
                                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                                    '<span aria-hidden="true">&times;</span>' +
                                    '</button>' +
                                    '<strong>Your request was unsuccessful.</strong>' +
                                    '</div>';
                                $("#alert-container").html(alertMessage);
                            }
                        },
                        error: function(xhr, status, error) {

                            var alertMessage =
                                '<div class="alert alert-danger alert-dismissible fade show" role="alert">' +
                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                                '<span aria-hidden="true">&times;</span>' +
                                '</button>' +
                                '<strong>An error occurred: ' + error + '</strong>' +
                                '</div>';
                            $("#alert-container").html(alertMessage);
                        },
                        complete: function() {
                    
                            $('.overlay').hide();
                        }
                    });
              
             });  
            });  
            
            
            
            
            
            
            
            
            
            
            
       $(document).ready(function () {

    // Row selection
    $(document).on('click', '.js-row', function () {
        $('.js-row').removeClass('selected');
        $(this).addClass('selected');
    });

    // Delete button click
    $(document).on('click', '#CmdDelete', function () {
        let selectedRow = $('.js-row.selected');
        if (selectedRow.length === 0) {
            Swal.fire({
                icon: 'warning',
                title: 'No Row Selected!',
                text: 'Please click on a row to select it before deleting.',
            });
            return;
        }

        let VenderCode = selectedRow.find('td:eq(0)').text();

        // Ask for password before showing final delete confirmation
        Swal.fire({
            title: 'Authentication Required',
            input: 'password',
            inputLabel: 'Enter your password to confirm',
            inputPlaceholder: 'Password',
            inputAttributes: {
                autocapitalize: 'off',
                autocorrect: 'off'
            },
            showCancelButton: true,
            confirmButtonText: 'Authenticate',
            cancelButtonText: 'Cancel',
            preConfirm: (password) => {
                if (!password) {
                    Swal.showValidationMessage('Password is required');
                }
                return password;
            }
        }).then((authResult) => {
            if (authResult.isConfirmed) {
                const enteredPassword = authResult.value;

                // Proceed to confirm deletion
                Swal.fire({
                    title: 'Are you sure?',
                    text: `Vendor Code ${VenderCode} will be deleted permanently!`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#aaa',
                    confirmButtonText: 'Yes, delete it!'
                }).then((deleteConfirm) => {
                    if (deleteConfirm.isConfirmed) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        $.ajax({
                            url: '{{ route("VendorDelete") }}',
                            type: 'POST',
                            data: {
                                VenderCode: VenderCode,
                                password: enteredPassword // send password to backend
                            },
                            beforeSend: function () {
                                $('.overlay').show();
                            },
                            success: function (response) {
                                if (response.status === 'success') {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Deleted!',
                                        text: `Vendor ${VenderCode} deleted successfully.`,
                                        timer: 2000
                                    });
                                    selectedRow.remove();
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Delete Failed!',
                                        text: response.message || 'Unable to delete vendor.',
                                    });
                                }
                            },
                            error: function () {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Server Error!',
                                    text: 'Something went wrong while deleting.',
                                });
                            },
                            complete: function () {
                                $('.overlay').hide();
                            }
                        });
                    }
                });
            }
        });
    });
});



</script>
          
      
        
        
    @stop


    @section('content')
