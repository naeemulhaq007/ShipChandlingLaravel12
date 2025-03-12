@extends('layouts.app')



@section('title', 'Branch-Setup')

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
    <form action="{{route('branch.store')}}" enctype="multipart/form-data" method="POST">
        @csrf





        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">
                    <h5 class="card-title">Create Branch</h5>


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
                                    <input type="text" class="" readonly name="branch_code" id="bcode"
                                        required="required">
                                    <span class="Txtspan">
                                        Branch code
                                    </span>
                                </div>

                                <div class="CheckBox1 ">
                                    <label class="input-group text-info ml-2">
                                        <input type="checkbox" name="Inactive" id="chkInactive"
                                            > Inactive
                                    </label>
                                </div>

                            </div>


                            <div class="row py-2">
                                <div class="inputbox col-sm-6">
                                    <input type="text" class="" name="branchname" id="branchname"
                                        required="required">
                                    <span class="ml-2">
                                        Branch Name
                                    </span>
                                </div>


                            </div>


                            <div class="row py-2">

                                <div class="inputbox col-sm-6">
                                    <input type="text" class="" name="cityname" id="cityname" required="required">
                                    <span class="ml-2">
                                        City Name
                                    </span>
                                </div>
                            </div>


                            <div class="row ">

                                <div class="inputbox py-2 col-sm-6">
                                    <input type="text" class="" name="currency" id="currency" required="required">
                                    <span class="ml-2">
                                        Currency
                                    </span>
                                </div>

                                <div class="inputbox py-2 col-sm-6">
                                    <input type="text" class="" name="exchangerate" id="exchangeRate"
                                        required="required">
                                    <span class="ml-2">
                                        ExchangeRate
                                    </span>
                                </div>
                            </div>

                            <div class="row py-2">

                                <div class="inputbox col-sm-6">
                                    <input type="text" class="" name="branchemail" id="branchemail">
                                    <span class="ml-2">
                                        Branch Email
                                    </span>
                                </div>
                            </div>

                            <div class="row ">

                                <div class="inputbox py-2 col-sm-6">
                                    <input type="text" class="" name="password" id="password">
                                    <span class="ml-2">
                                        Password
                                    </span>
                                </div>
                                <div class="inputbox py-2 col-sm-6">
                                    <input type="text" class="" name="smpt" id="smpt">
                                    <span class="ml-2">
                                        SMPT
                                    </span>
                                </div>


                            </div>
                            <div class="row ">

                                <div class="inputbox py-2 col-sm-6">
                                    <input type="text" class="" name="gst" id="gst">
                                    <span class="ml-2">
                                        GST %
                                    </span>
                                </div>
                                <div class="inputbox py-2 col-sm-6">
                                    <input type="text" readonly class="" name="IMGpath" id="IMGpath">
                                    <span class="Txtspan">
                                        Imagepath
                                    </span>
                                </div>
                            </div>


                            <div class="form-group col-md-12">
                                <label for="file">Upload File</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file"  class="custom-file-input image-upload"
                                            id="file" accept="image/*">
                                        <label class="custom-file-label" for="file">Choose file</label>
                                    </div>

                                </div>
                            </div>
                            <div class="row ">

                                <a name="" id="NewBtn" onclick="location.reload();"
                                    class="btn btn-info col-sm-1 mx-1 my-2" href="#" role="button">New</a>
                                <button type="submit" class="btn btn-success my-2 col-sm-1  mx-1">
                                    <i class="fa fa-file-archive" aria-hidden="true"></i> Save
                                </button>
                                <a name="" id="DeleteBtn" class="btn btn-danger my-2 col-sm-1 mx-1"
                                    role="button">Delete</a>
                                <a name="" id="" class="btn btn-danger col-sm-1 my-2 mx-1" href="/"
                                    role="button">Exit</a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">

                                <img src="https://via.placeholder.com/400x400" id="preview" width="400px"
                                    class="img-fluid ml-auto ">
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
                <h5 class="card-title">Update Branch</h5>


                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>


                </div>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-light" id="branchtable">
                    <thead class="thead-light">
                        <tr>
                            <th>BranchCode</th>
                            <th>BranchName</th>
                            <th>CityName</th>
                            <th>Currency</th>
                            <td hidden>USDRate</td>
                            <td hidden>GSTPer</td>
                            <td hidden>SMTP</td>
                            <td hidden>Email</td>
                            <td hidden>Password</td>
                            <td hidden>pic</td>
                            <th>Activity</th>
                            <th>Picture</th>
                        </tr>
                    </thead>
                    <tbody id="branchtablebody">
                        @foreach ($branches as $branch)
                            <tr class="js-branch">
                                <td>{{ $branch->BranchCode }}</td>
                                <td>{{ $branch->BranchName }}</td>
                                <td>{{ $branch->CityName }}</td>
                                <td>{{ $branch->Currency }}</td>
                                <td hidden>{{ $branch->USDRate }}</td>
                                <td hidden>{{ $branch->GSTPer }}</td>
                                <td hidden>{{ $branch->SMTP }}</td>
                                <td hidden>{{ $branch->Email }}</td>
                                <td hidden>{{ $branch->Password }}</td>
                                <td hidden>{{ $branch->pic }}</td>
                                <td>{{ ($branch->Inactive == 0) ? 'Active' : 'NotActive' }}</td>
                                <td>
                                    @if ($branch->pic)
                                        <a href="{{ asset('images/Branches/' . $branch->pic) }}" target="_blank">
                                            <img class="img-fluid" src="{{ asset('images/Branches/' . $branch->pic) }}"
                                                style="max-width: 40px; height: 30px;" alt="">
                                        </a>
                                    @endif
                                </td>


                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>

@stop

@section('css')

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
                            text: 'Your Branch Has Been Registerd!',
                            showConfirmButton: true,
                            timer: 2500
                        })

            }
            @endif

            var table1 = $('#branchtable').DataTable({

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
                var branchId = row.find('td:eq(0)').text();
                var branchName = row.find('td:eq(1)').text();
                var cityname = row.find('td:eq(2)').text();
                var currency = row.find('td:eq(3)').text();
                var USDRate = row.find('td:eq(4)').text();
                var GSTPer = row.find('td:eq(5)').text();
                var SMTP = row.find('td:eq(6)').text();
                var branchemail = row.find('td:eq(7)').text();
                var Password = row.find('td:eq(8)').text();
                var pic = row.find('td:eq(9)').text();
                var chkInactive = row.find('td:eq(10)').text();
console.log(chkInactive);

                if (chkInactive == 'Active') {
                    $('chkInactive').prop('checked',true);
                }else{
                    $('chkInactive').prop('checked',false);

                }
                $('#bcode').val(branchId);
                $('#branchname').val(branchName);
                $('#cityname').val(cityname);
                $('#currency').val(currency);
                $('#exchangeRate').val(USDRate);
                $('#branchemail').val(branchemail);
                $('#password').val(Password);
                $('#smpt').val(SMTP);
                $('#gst').val(GSTPer);
                $('#IMGpath').val(pic);
                if (pic) {

                    $('#preview').attr('src', "{{ asset('images/Branches/') }}" + '/' + pic);
                } else {
                    $('#preview').attr('src', "https://via.placeholder.com/400x400");

                }
            });

            let x = {{ $lastid->BranchCode }};
            x++;
            let z = x;

            $('#bcode').val(z);

            $('#file').click(function(e) {
                if ($('#branchname').val() == '') {
                    e.preventDefault();
                    alert('Please Type Name First to save The Image');
                }

            });
            $('#file').on('change', function(e) {
                var fileName = e.target.files[0].name;
                $('.custom-file-label').text(fileName);

                var reader = new FileReader();
                reader.onload = function(e) {
                    // get loaded data and render thumbnail.
                    $('#preview').attr('src', e.target.result);
                };
                // read the image file as a data URL.
                reader.readAsDataURL(this.files[0]);
            });
        });

        $(document).on('change', '.image-upload', function() {
            var branchcode = $('#bcode').val();
            var branchName = '';
            branchName = $('#branchname').val();
            console.log(branchName);
            let input = $(this);
            let file = input.siblings('.image-preview');
            let image = input[0].files[0];
            let imagePreview = document.createElement('img'); // create new image element


            let formData = new FormData();
            formData.append('image', image);
            formData.append('branchcode', branchcode);
            formData.append('branchname', branchName);

            ajaxSetup();
            $.ajax({
                url: '{{ URL::to('Branchupload-image') }}',
                type: 'POST',
                data: formData,

                processData: false,
                contentType: false,
                success: function(response) {
                    $('#IMGpath').val(response.image_name);
                    alert('uploaded');
                }
            });
        });
        $(document).ready(function() {
            $('#DeleteBtn').click(function(e) {
                e.preventDefault();
                var branchcode = $('#bcode').val();
                var password = prompt("Please enter Admin Authentication:");
                if (password === "332211") {
                    if (confirm("Are you sure you want to proceed?")) {
                        ajaxSetup();
                        $.ajax({
                            url: '{{ URL::to('BranchDelete') }}',
                            type: 'POST',
                            data: {
                                branchcode,
                            },
                            beforeSend: function() {
                                $('.overlay').show();
                            },
                            success: function(response) {
                                console.log(response);
                                if (response.Message == 'Deleted') {
                                    alert(response.Message);
                                    if(response.branches.length > 0){
                                        var branches = response.branches;
                                        let table = document.getElementById('branchtablebody');
                                        table.innerHTML = ""; // Clear the table
                                        branches.forEach(function(item) {
                                        let row = table.insertRow();
                                        row.classList.add("js-branch");

                                        function createCell(content) {
                                            let cell = row.insertCell();
                                            cell.innerHTML = content;
                                            return cell;
                                        }
                                        createCell(item.BranchCode);
                                        createCell(item.BranchName);
                                        createCell(item.CityName);
                                        createCell(item.Currency);
                                        createCell(item.USDRate).hidden = 'true';
                                        createCell(item.GSTPer).hidden = 'true';
                                        createCell(item.SMTP).hidden = 'true';
                                        createCell(item.Email).hidden = 'true';
                                        createCell(item.Password).hidden = 'true';
                                        createCell(item.pic).hidden = 'true';
                                        console.log(item.Inactive);

                                        createCell((item.Inactive == 0) ? 'Active' : 'Not Active');
                                        let imager = createCell('');
                                        if (item.pic) {
                                        let anchor = document.createElement('a');
                                        anchor.href = 'images/Branches/'+item.pic;
                                        anchor.target = '_blank';

                                        let img = document.createElement('img');
                                        img.className = 'img-fluid';
                                        img.src = 'images/Branches/'+item.pic;
                                        img.style.maxWidth = '40px';
                                        img.style.height = '30px';
                                        img.alt = '';

                                        anchor.appendChild(img);
                                        imager.appendChild(anchor);
                                        }



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
