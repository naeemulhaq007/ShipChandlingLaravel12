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
                    <h5 class="card-title">Company Setup</h5>


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
                                    <input type="text" class="" readonly name="CompanyCode" value=""
                                        id="CompanyCode" required="required">
                                    <span class="Txtspan">
                                        Company Code :
                                    </span>
                                </div>

                            </div>


                            <div class="row py-2">
                                <div class="inputbox col-sm-6">
                                    <input type="text" class="" name="CompanyName" id="CompanyName"
                                        required="required">
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
                                <a name="" id="" class="btn btn-info col-sm-2 my-2 ml-auto mx-1"
                                    onclick="location.reload();" role="button"><i class="fa fa-file"
                                        aria-hidden="true"></i> New</a>
                                <button type="submit" class="btn btn-success my-2 col-sm-2 mx-1">
                                    <i class="fa fa-file-archive" aria-hidden="true"></i> Save
                                </button>
                                <a name="" id="DeleteBtn" class="btn btn-danger my-2 col-sm-2 mx-1" role="button"><i
                                        class="fas fa-window-close    "></i> Delete</a>
                                <a name="" id="" class="btn btn-danger my-2 col-sm-2 mx-1" href="/"
                                    role="button"><i class="fas fa-door-open    "></i> Exit</a>
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
                            <th hidden>CompanyCode</th>
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
                                <td hidden>{{ $Company->BranchCode }}</td>
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
            @if (\Session::has('Message'))
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
                // paging: false,
                // info: false,
                ordering: false,
                // searching: false,
                responsive: true,


            });
            $('.js-branch').dblclick(function(e) {
                e.preventDefault();
                var row = $(this);
                var BranchCode = row.find('td:eq(0)').text();
                var CompanyName = row.find('td:eq(1)').text();
                var CompanyAddress = row.find('td:eq(2)').text();
                var PhoneNo = row.find('td:eq(3)').text();
                var EmailAddress = row.find('td:eq(4)').text();
                var FaxNo = row.find('td:eq(5)').text();
                var WebsiteAddress = row.find('td:eq(6)').text();
                var ID = row.find('td:eq(7)').text();

                $('#CompanyCode').val(ID);
                $('#CompanyName').val(CompanyName);
                $('#CompanyAddress').val(CompanyAddress);
                $('#PhoneNo').val(PhoneNo);
                $('#EmailAddress').val(EmailAddress);
                $('#FaxNo').val(FaxNo);
                $('#WebsiteAddress').val(WebsiteAddress);
                // $('#BranchCode').val(BranchCode);
            });
            $('#DeleteBtn').click(function(e) {
                e.preventDefault();
                var CompanyCode = $('#CompanyCode').val();
                var password = prompt("Please enter Admin Authentication:");
                if (password === "332211") {
                    if (confirm("Are you sure you want to proceed?")) {
                        // proceed with action
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
                            success: function(resposne) {
                                console.log(resposne);
                                if (resposne.Message == 'Deleted') {
                                    alert(resposne.Message)

                                    if (resposne.CompanySetup.length > 0) {
                                        var Ships = resposne.CompanySetup;
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
                                            createCell(item.BranchCode).hidden = 'true';
                                            createCell(item.CompanyName);
                                            createCell(item.CompanyAddress);
                                            createCell(item.PhoneNo);
                                            createCell(item.EmailAddress);
                                            createCell(item.FaxNo);
                                            createCell(item.WebsiteAddress);
                                            createCell(item.ID).hidden = 'true';

                                        });

                                    }
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

        });
    </script>
@stop


@section('content')
