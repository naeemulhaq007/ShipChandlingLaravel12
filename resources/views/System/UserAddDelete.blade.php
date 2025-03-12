@extends('layouts.app')



@section('title', 'User-ADD-Delete')

@section('content_header')

@stop

@section('content')
<div class="container-fluid">
    <div class="card mt-2">
        <div class="card-header">
            <div class="card-tools">
                <button type="button" name="headertoggle" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
            <h4 class="text-black">Users</h4>
        </div>
        <div class="card-body">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row py-2">

                            <div class="inputbox col-sm-5">
                                <input type="number" class="" id="TxtUserid" required="required">
                                <span class="ml-2">
                                    User ID :
                                </span>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label text-info mx-1">
                                    <input class="form-check-input " type="checkbox"  name="ChkDisable" id="ChkDisable"  value=""> Disable
                                </label>
                            </div>
                        </div>
                        <div class="row py-2">
                            <div class="inputbox col-sm-10">
                                <input type="text" class="" id="TxtFullName" name="TxtFullName" >
                                <span class="ml-2">
                                    Full Name :
                                </span>
                            </div>
                        </div>
                        <div class="row py-2">
                            <div class="inputbox col-sm-10">
                                <input type="email" class="" id="TxtEmailAddress" name="TxtEmailAddress" >
                                <span class="Txtspan ml-2">
                                    Email :
                                </span>
                            </div>
                        </div>
                        <div class="row py-2">
                            <div class="inputbox col-sm-10">
                                <input type="text" class="" id="TxtUserName" name="TxtUserName" required="required">
                                <span class="ml-2">
                                    User Name :
                                </span>
                            </div>
                        </div>
                        <div class="row py-2">
                            <div class="inputbox col-sm-10">
                                <input type="password" class="" id="TxtUserPassword" name="TxtUserPassword" required="required">
                                <span class="ml-2">
                                    User Password :
                                </span>
                            </div>
                        </div>
                        <div class="row py-2">
                            <div class="inputbox col-sm-10">
                                <input type="password" class="" id="TxtAdminPassword" name="TxtAdminPassword" required="required">
                                <span class="ml-2">
                                    Admin Password :
                                </span>
                            </div>
                        </div>
                        <div class="row  py-2 ml-1">
                            <a name="" id="Btn-New"    class="mx-1 col-sm-2 btn btn-info"  role="button">New</a>
                            <a name="" id="Btn-Delete" class="mx-1 col-sm-2 btn btn-danger"  role="button">Delete</a>
                            <a name="" id="Btn-Save"   class="mx-1 col-sm-2 btn btn-success"  role="button">Save</a>
                            <a name="" id="Btn-Exit"   class="mx-1 col-sm-2 btn btn-danger" href="/"  role="button">Exit</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row py-1">
                            <div class="inputbox col-sm-12">
                                <input type="text" class="" onkeyup="cusFunction()" id="TxtFind" name="TxtFind" required="required">
                                <span class="ml-2">
                                    Search :
                                </span>
                            </div>
                        </div>
                        <table class="table" id="Usertable">
                            <thead class="bg-info">
                                <tr>
                                    <th>UserID</th>
                                    <th>UserName</th>
                                </tr>
                            </thead>
                            <tbody id="Usertablebody">
                                {{-- @foreach($UserRights as $Users)
                                <tr class="js-row">
                                    <td>{{$Users->UserID}}</td>
                                    <td>{{$Users->UserName}}</td>
                                </tr>
                                @endforeach --}}
                            </tbody>

                        </table>
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

    </style>

@stop

@section('js')
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>

<script>
    function ajaxSetup(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    }

    function Updatelist() {
        ajaxSetup();

        $.ajax({
            url: '{{ route('GetUserlist') }}',
            type: 'POST',
            data: {
            },
            success: function (response) {
                console.log(response);
                var data = response.UserRights;
                let table = document.getElementById('Usertablebody');
                table.innerHTML = ""; // Clear the table
                data.forEach(function(item) {
                let row = table.insertRow();
                row.classList.add('js-row');
                function createCell(content) {
                let cell = row.insertCell();
                cell.innerHTML = content;
                return cell;
                }
                createCell(item.UserID)
                createCell(item.UserName)
                });

                $('.js-row').dblclick(function (e) {
            e.preventDefault();
            var UserId = $(this).find('td:first').text();
            // console.log(firstCellData);
            ajaxSetup();

                $.ajax({
                    url: '{{ route('GetUserrights') }}',
                    type: 'POST',
                    data: {
                        UserId,
                    },
                    success: function (response) {
                        console.log(response);
                        // $('#TxtUserid').val('');
                        var User = response.UserRights;
                        $('#TxtUserid').val(User.UserID);
                        $('#TxtFullName').val(User.FullName);
                        $('#TxtUserName').val(User.UserName);
                        $('#TxtEmailAddress').val(User.Email);
                        $('#TxtUserPassword').val(User.Password);
                        if (User.ChkInactive == true) {
                            $('#ChkDisable').prop('checked', true).val(User.ChkInactive);
                        } else {
                            $('#ChkDisable').prop('checked', false).val(User.ChkInactive);
                        }
                    },
                    error: function (xhr, status, error) {
                        console.log(xhr.responseText);
                        alert('An error occurred while updating the settings.');
                    }
                });

        });
            },
            error: function (xhr, status, error) {
                console.log(xhr.responseText);
                alert('An error occurred while updating the settings.');
            }
        });



    }

    function getnewuid() {
        ajaxSetup();

        $.ajax({
                url: '{{ route('settings.Getuid') }}',
                type: 'POST',
                data: {
                },
                success: function (response) {
                    console.log(response);
                    $('#TxtUserid').val(response.userid);
                },
                error: function (xhr, status, error) {
                    console.log(xhr.responseText);
                    alert('An error occurred while updating the settings.');
                }
            });
    }
    function cusFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("TxtFind");
  filter = input.value.toUpperCase();
  table = document.getElementById("Usertablebody");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
};
    $(document).ready(function () {
        Updatelist();
        var table = $('#Usertable').DataTable({

            scrollY:410,
            deferRender:true,
            scroller:true,
            paging: false,
            info:false,
            ordering:false,
            searching:false,


        });

        $('#Btn-New').click(function (e) {
            e.preventDefault();

            $('#TxtUserid').val('');
            $('#TxtFullName').val('');
            $('#TxtUserName').val('');
            $('#TxtEmailAddress').val('');
            $('#TxtUserPassword').val('');
            $('#TxtAdminPassword').val('');
            $('#ChkDisable').prop('checked', false).val('');

            getnewuid();
        });



        $('#Btn-Delete').click(function () {
           var TxtUserid =  $('#TxtUserid').val();
           var adpas = '{{$ap}}';
            if(TxtUserid !== ''){
                var password = prompt("Are you Sure want to delete User enter Admin Authentication:");
                if (password == adpas) {
                    ajaxSetup();
                    $.ajax({
                        url: '{{ route('settings.UserDelete') }}',
                        type: 'POST',
                        data: {
                            TxtUserid,
                        },
                        success: function (response) {
                            console.log(response);
                            if(response.Message == 'Deleted'){
                                alert('User Is ' +response.Message);
                                $('#Btn-New').click();
                                Updatelist();
                            }
                        },
                        error: function (xhr, status, error) {
                            console.log(xhr.responseText);
                            alert('An error occurred while updating the settings.');
                        }
                    });
                } else {
                    alert("Incorrect password.");
                }
        }
        });
        // $('.js-row').dblclick(function (e) {
        //     e.preventDefault();
        //     // $(this).find('td').each(function () {
        //     //     console.log($(this).text());
        //     // });
        // });
        $('.js-row').dblclick(function (e) {
            e.preventDefault();
            var UserId = $(this).find('td:first').text();
            // console.log(firstCellData);
            ajaxSetup();

                $.ajax({
                    url: '{{ route('GetUserrights') }}',
                    type: 'POST',
                    data: {
                        UserId,
                    },
                    success: function (response) {
                        console.log(response);
                        // $('#TxtUserid').val('');
                        var User = response.UserRights;
                        $('#TxtUserid').val(User.UserID);
                        $('#TxtFullName').val(User.FullName);
                        $('#TxtUserName').val(User.UserName);
                        $('#TxtEmailAddress').val(User.Email);
                        $('#TxtUserPassword').val(User.Password);
                        if (User.ChkInactive == true) {
                            $('#ChkDisable').prop('checked', true).val(User.ChkInactive);
                        } else {
                            $('#ChkDisable').prop('checked', false).val(User.ChkInactive);
                        }
                    },
                    error: function (xhr, status, error) {
                        console.log(xhr.responseText);
                        alert('An error occurred while updating the settings.');
                    }
                });

        });


        $('#Btn-Save').click(function () {
           var TxtUserid =  $('#TxtUserid').val();
           var TxtFullName =  $('#TxtFullName').val();
           var TxtUserName =  $('#TxtUserName').val();
           var TxtEmailAddress =  $('#TxtEmailAddress').val();
           var TxtUserPassword =  $('#TxtUserPassword').val();
           var TxtAdminPassword =  $('#TxtAdminPassword').val();
           var ChkDisable = $("#ChkDisable").is(":checked");
           var adpas = '{{$ap}}';

        if (TxtUserid == '') {
            getnewuid();
        }
        if (TxtFullName == '') {
        alert('Please Enter Name');
        return;
        }
        if (TxtUserName == '') {
            alert('Please Enter UserName');
            return;
        }
        if (TxtUserName == '') {
            alert('Please Enter UserName');
            return;
        }
        if (TxtUserPassword == '') {
            alert('Please Enter UserPassword');
            return;
        }
        if (TxtUserPassword == '') {
            alert('Please Enter TxtAdminPassword');
            return;
        }
           if (TxtAdminPassword == adpas) {
               ajaxSetup();

            $.ajax({
                url: '{{ route('settings.UserADD') }}',
                type: 'POST',
                data: {
                    TxtUserid,
                    TxtFullName,
                    TxtUserName,
                    TxtEmailAddress,
                    TxtUserPassword,
                    ChkDisable,
                    // TxtAdminPassword,
                },
                success: function (response) {
                    console.log(response);
                    Updatelist();
                    $('#Btn-New').click();


                },
                error: function (xhr, status, error) {
                    console.log(xhr.responseText);
                    alert('An error occurred while updating the settings.');
                }
            });

        }else{
            alert('Admin Password is Incorrect');
        }
        });
    });
</script>




@stop


@section('content')
