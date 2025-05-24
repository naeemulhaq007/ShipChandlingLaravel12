@extends('layouts.app')



@section('title', 'Company-Setup')

@section('content_header')
@stop

@section('content')
</div>
<style>
.file {
    visibility: hidden;
    position: absolute;
}
</style>
<form action="Company/store" enctype="multipart/form-data" method="POST">
    @csrf





    <div class="col-md-12">
        <div class="card mt-3">
            <div class="card-header">
                <h5 class="card-title">Company Setupss</h5>


                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>


                </div>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">

                        <div class="row py-2">
                            <div class="inputbox col-sm-6">
                           <input type="text" class="" readonly name="CompanyCode" 
    value="{{ old('CompanyCode', $nextCompanyCode) }}" id="CompanyCode" required="required">



                                <span class="Txtspan">
                                    Company Code :
                                </span>
                            </div>

                        </div>


                        <div class="row py-2">
                            <div class="inputbox col-sm-6">
                                <input type="text" class="" name="CompanyName" id="CompanyName" required="required">
                                <span class="ml-2">
                                    Company Name :
                                </span>
                            </div>


                        </div>


                        <div class="row py-2">

                            <div class="inputbox col-sm-6">
                                <input type="text" class="" name="CompanyAddress" id="CompanyAddress"
                                    required="required">
                                <span class="ml-2">
                                    Company Address :
                                </span>
                            </div>
                        </div>


                        <div class="row ">

                            <div class="inputbox py-2 col-sm-6">
                                <input type="text" class="" name="PhoneNo" id="PhoneNo">
                                <span class="ml-2">
                                    Phone No :
                                </span>
                            </div>

                            <div class="inputbox py-2 col-sm-6">
                                <input type="text" class="" name="EmailAddress" id="EmailAddress">
                                <span class="ml-2">
                                    Email Address :
                                </span>
                            </div>
                        </div>

                        <div class="row ">

                            <div class="inputbox py-2 col-sm-6">
                                <input type="text" class="" name="FaxNo" id="FaxNo">
                                <span class="ml-2">
                                    Fax No :
                                </span>
                            </div>
                            <div class="inputbox py-2 col-sm-6">
                                <input type="text" class="" name="WebsiteAddress" id="WebsiteAddress">
                                <span class="ml-2">
                                    Website Address
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
                              <a class="btn btn-danger w-100 px-3 py-2" href="{{url('company-setup') }}" role="button">
                                   <i class="fa fa-sign-out me-1"></i> Exit
                                   </a>

                            </div>
                        </div>



                    </div>

                </div>
            </div>
        </div>
    </div>
</form>



<div class="col-lg-12">

    <div class="card mt-3 ">
        <div class="card-header">
            <h5 class="card-title">Update Company</h5>


            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>


            </div>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-light" id="companytable">
                <thead class="thead-light">
                    <tr>
                        <th>CompanyCode</th>
                        <th>CompanyName</th>
                        <th>CompanyAddress</th>
                        <th>PhoneNo</th>
                        <th>EmailAddress</th>
                        <th>FaxNo</th>
                        <th>WebsiteAddress</th>
                        <th hidden>BranchCode</th>
                    </tr>
                </thead>
                <tbody id="companytablebody">
                    @foreach ($CompanySetup as $Company)
                    <tr class="js-branch">
                        <td>{{ $Company->ID }}</td>
                        <td>{{ $Company->CompanyName }}</td>
                        <td>{{ $Company->CompanyAddress }}</td>
                        <td>{{ $Company->PhoneNo }}</td>
                        <td>{{ $Company->EmailAddress }}</td>
                        <td>{{ $Company->FaxNo }}</td>
                        <td>{{ $Company->WebsiteAddress }}</td>
                        <td hidden>{{ $Company->ID }}</td>



                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>

@stop

@section('css')
{{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">



@stop

@section('js')
<script type="text/javascript" language="javascript"
    src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>


<script>
function ajaxSetup() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
}
$(document).ready(function() {
    @if(\Session::has('Message'))
    var Message = '{!! \Session::get('Message') !!}';
    if (Message == 'Saved') {

        Swaal.fire({
            icon: 'success',
            title: 'Saved Success',
            text: 'Your Commpany Has Been Registerd!',
            showConfirmButton: true,
            timer: 2500
        })

    }
    @endif


    var table1 = $('#companytable').DataTable({

        scrollY: 400,
        deferRender: true,
        scroller: true,
        paging: false,
        // info: false,
        ordering: false,
        // searching: false,
        responsive: true,


    });
  $('.js-branch').dblclick(function(e) {
    e.preventDefault();
    var row = $(this);
    var BranchCode = row.find('td:eq(0)').text(); // Assuming this is actual CompanyCode
    var CompanyName = row.find('td:eq(1)').text();
    var CompanyAddress = row.find('td:eq(2)').text();
    var PhoneNo = row.find('td:eq(3)').text();
    var EmailAddress = row.find('td:eq(4)').text();
    var FaxNo = row.find('td:eq(5)').text();
    var WebsiteAddress = row.find('td:eq(6)').text();
    var ID = row.find('td:eq(7)').text();

    $('#CompanyCode').val(BranchCode); // <- Use BranchCode for display
    $('#CompanyName').val(CompanyName);
    $('#CompanyAddress').val(CompanyAddress);
    $('#PhoneNo').val(PhoneNo);
    $('#EmailAddress').val(EmailAddress);
    $('#FaxNo').val(FaxNo);
    $('#WebsiteAddress').val(WebsiteAddress);
});


 $('#DeleteBtn').click(function(e) {
    e.preventDefault();
    var CompanyCode = $('#CompanyCode').val();

    if (!CompanyCode) {
        alert("Please select a company record first.");
        return;
    }

    var password = prompt("Please enter Admin Authentication:");

    if (password === "332211") { // ✅ Correct password
        if (confirm("Are you sure you want to delete this company?")) {
            ajaxSetup();
            $.ajax({
                url: '/CompanyDelete',
                type: 'POST',
                data: {
                    CompanyCode,
                },
                beforeSend: function() {
                    $('.overlay').show();
                },
                success: function(response) {
                    if (response.Message == 'Deleted') {
                        // ✅ Refresh the company table silently (without alert)
                        if (response.CompanySetup.length > 0) {
                            var Ships = response.CompanySetup;
                            let table = document.getElementById('companytablebody');
                            table.innerHTML = ""; // Clear the table
                            Ships.forEach(function(item) {
                                let row = table.insertRow();
                                row.classList.add("js-branch");

                                function createCell(content) {
                                    let cell = row.insertCell();
                                    cell.innerHTML = content;
                                    return cell;
                                }
                                createCell(item.BranchCode).hidden = true;
                                createCell(item.CompanyName);
                                createCell(item.CompanyAddress);
                                createCell(item.PhoneNo);
                                createCell(item.EmailAddress);
                                createCell(item.FaxNo);
                                createCell(item.WebsiteAddress);
                                createCell(item.ID).hidden = true;
                            });
                        }
                    }
                },
                error: function(error) {
                    console.log(error);
                    $('.overlay').hide();
                },
                complete: function() {
                    $('.overlay').hide();
                }
            });
        }
    } else {
        alert("Incorrect password.");
    }
});



// $('#DeleteBtn').click(function(e) {
//     e.preventDefault();

//     var CompanyCode = $('#CompanyCode').val();
//     if (!CompanyCode) {
//         Swal.fire({
//             icon: 'warning',
//             title: 'Missing Code',
//             text: 'Please select a company first!',
//         });
//         return;
//     }

  
//     Swal.fire({
//         title: 'Are you sure?',
//         text: "You are about to delete this company.",
//         icon: 'warning',
//         showCancelButton: true,
//         confirmButtonColor: '#d33',
//         cancelButtonColor: '#aaa',
//         confirmButtonText: 'Yes, delete it!'
//     }).then((result) => {
//         if (result.isConfirmed) {
//             ajaxSetup();
//             $.ajax({
//                 url: '/CompanyDelete',
//                 type: 'POST',
//                 data: {
//                     CompanyCode
//                 },
//                 beforeSend: function () {
//                     $('.overlay').show();
//                 },
//                 success: function (response) {
//                     if (response.Message === 'Deleted') {
//                         Swal.fire({
//                             icon: 'success',
//                             title: 'Deleted!',
//                             text: 'Company deleted successfully.',
//                             timer: 2000,
//                             showConfirmButton: false
//                         });

                  
//                         if (response.CompanySetup.length > 0) {
//                             let table = document.getElementById('companytablebody');
//                             table.innerHTML = "";
//                             response.CompanySetup.forEach(function (item) {
//                                 let row = table.insertRow();
//                                 row.classList.add("js-branch");

//                                 function createCell(content) {
//                                     let cell = row.insertCell();
//                                     cell.innerHTML = content;
//                                     return cell;
//                                 }

//                                 createCell(item.BranchCode).hidden = true;
//                                 createCell(item.CompanyName);
//                                 createCell(item.CompanyAddress);
//                                 createCell(item.PhoneNo);
//                                 createCell(item.EmailAddress);
//                                 createCell(item.FaxNo);
//                                 createCell(item.WebsiteAddress);
//                                 createCell(item.ID).hidden = true;
//                             });
//                         }

//                         $('#CompanyCode').val('');
//                         $('#CompanyName').val('');
//                         $('#CompanyAddress').val('');
//                         $('#PhoneNo').val('');
//                         $('#EmailAddress').val('');
//                         $('#FaxNo').val('');
//                         $('#WebsiteAddress').val('');
//                     }
//                 },
//                 error: function (xhr) {
//                     console.log(xhr);
//                     Swal.fire({
//                         icon: 'error',
//                         title: 'Error',
//                         text: 'Something went wrong while deleting!',
//                     });
//                 },
//                 complete: function () {
//                     $('.overlay').hide();
//                 }
//             });
//         }
//     });
// });


});
</script>
@stop


@section('content')