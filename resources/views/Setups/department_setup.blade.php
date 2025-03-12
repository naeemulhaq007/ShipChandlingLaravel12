@extends('layouts.app')



@section('title', 'Department-Setup')

@section('content_header')

@stop

@section('content')
    <?php echo View::make('partials.search'); ?>
    <?php echo View::make('partials.searchves'); ?>


    <div class="container-fluid ">

        <div class="col-lg-12 pt-3">


            <div class="card ">
                <div class="card-header ">
                    <div class="card-tools ">


                        <button type="button" name="headertoggle" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                    <b>
                        <h4 class="text-black">Department Setup</h4>
                    </b>

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">


                            <div class="inputbox col-sm-8 py-2">
                                <input type="text" class="" id="TxtCode" value="{{$Maxcode}}" name="TxtCode" required="required">
                                <span class="Txtspan">
                                    Code </span>
                            </div>
                            <div class="inputbox col-sm-8 py-2">
                                <input type="text" class="" id="TxtTypeName" name="TxtTypeName"
                                    required="required">
                                <span class="Txtspan">
                                    Department </span>
                            </div>
                            <div class="row ml-1 py-2">
                                <div class="CheckBox1">
                                    <label class="input-group text-info ml-2">
                                        <input class=" " type="checkbox" name="ChkIMPA" id="ChkIMPA" value="">
                                        IMPA
                                    </label>
                                </div>
                                <div class="CheckBox1">
                                    <label class="input-group text-info ml-2">
                                        <input class=" " type="checkbox" name="ChkDeckEngin" id="ChkDeckEngin"
                                            value=""> Deck/Engine
                                    </label>
                                </div>
                                <div class="CheckBox1">
                                    <label class="input-group text-info ml-2">
                                        <input class=" " type="checkbox" name="ChkKGS" id="ChkKGS" value="">
                                        KG
                                    </label>
                                </div>
                                <div class="CheckBox1">
                                    <label class="input-group text-info ml-2">
                                        <input class=" " type="checkbox" name="ChkProvBond" id="ChkProvBond"
                                            value=""> Prov/Bond
                                    </label>
                                </div>
                            </div>



                        </div>

                        <div class="col-lg-6">

                            <div class="row py-2">



                                <div class="col-sm-12">

                                    <div class="rounded shadow">
                                        <table class="table small" id="Gd1">
                                            <thead class="bg-info">
                                                <tr>
                                                    <th>Code</th>

                                                    <th>Department&nbsp;Name</th>
                                                    <th>ChkIMPA</th>
                                                    <th>ChkShowKG</th>
                                                    <th>Deck/Engine</th>
                                                    <th>ChkProvBond</th>

                                                </tr>
                                            </thead>
                                            <tbody id="Gd1body">
                                                @foreach ($Deptsetup as $Typesetupitem)
                                                    <tr class="js-row">
                                                        <td>{{ $Typesetupitem->TypeCode }}</td>
                                                        <td>{{ $Typesetupitem->TypeName }}</td>
                                                        <td>{{ $Typesetupitem->ChkIMPA }}</td>
                                                        <td>{{ $Typesetupitem->ChkShowKG }}</td>
                                                        <td>{{ $Typesetupitem->ChkDeckEngin }}</td>
                                                        <td>{{ $Typesetupitem->ChkProvBond }}</td>

                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>











                        </div>
                    </div>
                    <div class="row ml-1">
                        <a class="btn btn-info  mx-2 my-2" id="Button1" onclick="location.reload();" role="button"> <i class="fa fa-plus mx-1" aria-hidden="true"></i>New</a>

                        <button class="btn btn-success mx-2 my-2" id="Button2" role="button"> <i class="fa fa-cloud mr-1"
                                aria-hidden="true"></i>Save</button>

                        <a class="btn btn-danger mx-2 my-2" id="Button3" role="button"> <i class="fa fa-multiply mr-1" aria-hidden="true"></i>Delete</a>
                        <a class="btn btn-danger mx-2 my-2" id="Button4" href="/" role="button"> <i class="fa fa-door-open mr-1" aria-hidden="true"></i>Exit</a>
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
        function ajaxSetup() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        }



        $(document).ready(function() {



            var table1 = $('#Gd1').DataTable({

                scrollY: 400,
                deferRender: true,
                scroller: true,
                paging: false,
                info: false,
                ordering: false,
                searching: false,
                responsive: true,


            });



            // table1.column.adjust();


        });


        $(document).ready(function() {

            $('#TxtCode').blur(function (e) {
                e.preventDefault();
                var TxtCode = $('#TxtCode').val();

                ajaxSetup();
                $.ajax({
                    url: '/Departmentget',
                    type: 'POST',
                    data: {
                        TxtCode,

                    },
                    beforeSend: function() {
                        $('.overlay').show();
                    },
                    success: function(resposne) {
                        console.log(resposne);
                        if (resposne.Message == 'Saved') {
                            var Typesetup = resposne.Typesetup;
                            $('#TxtCode').val(Typesetup.TypeCode);
                            $('#TxtTypeName').val(Typesetup.TypeName);
                            if (Typesetup.ChkIMPA == 1) {
                            $('#ChkIMPA').prop('checked',true);
                        }else{
                            $('#ChkIMPA').prop('checked',false);
                        }
                        if (Typesetup.ChkShowKG == 1) {
                            $('#ChkShowKG').prop('checked',true);
                        }else{
                            $('#ChkShowKG').prop('checked',false);
                        }
                        if (Typesetup.ChkDeckEngin == 1) {
                            $('#ChkDeckEngin').prop('checked',true);
                        }else{
                            $('#ChkDeckEngin').prop('checked',false);
                        }
                        if (Typesetup.ChkProvBond == 1) {
                            $('#ChkProvBond').prop('checked',true);
                        }else{
                            $('#ChkProvBond').prop('checked',false);
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
            });

            $('#Button2').click(function (e) {
                e.preventDefault();
                var TxtCode = $('#TxtCode').val();
                var TxtTypeName = $('#TxtTypeName').val();
                var ChkIMPA = $('#ChkIMPA').is(':checked');
                var ChkDeckEngin = $('#ChkDeckEngin').is(':checked');
                var ChkKGS = $('#ChkKGS').is(':checked');
                var ChkProvBond = $('#ChkProvBond').is(':checked');

                ajaxSetup();
                $.ajax({
                    url: '/DepartmentSave',
                    type: 'POST',
                    data: {
                        TxtCode,
                        TxtTypeName,
                        ChkIMPA,
                        ChkDeckEngin,
                        ChkKGS,
                        ChkProvBond,
                    },
                    beforeSend: function() {
                        $('.overlay').show();
                    },
                    success: function(resposne) {
                        console.log(resposne);
                        if (resposne.Message == 'Saved') {
                            alert(resposne.Message)

                        if(resposne.Typesetup.length > 0){
                            var Ships = resposne.Typesetup;
                            let table = document.getElementById('Gd1body');
                            table.innerHTML = ""; // Clear the table
                            Ships.forEach(function(item) {
                            let row = table.insertRow();
                            row.classList.add("js-row");

                            function createCell(content) {
                                let cell = row.insertCell();
                                cell.innerHTML = content;
                                return cell;
                            }
                            createCell(item.TypeCode);
                            createCell(item.TypeName);
                            createCell(item.ChkIMPA);
                            createCell(item.ChkShowKG);
                            createCell(item.ChkDeckEngin);
                            createCell(item.ChkProvBond);



                            });

                        }
                         $('#TxtCode').val(resposne.Maxcode);
                 $('#TxtTypeName').val('');

                 $('#ChkIMPA').prop('checked',false);
                 $('#ChkDeckEngin').prop('checked',false);
                 $('#ChkKGS').prop('checked',false);
                 $('#ChkProvBond').prop('checked',false);

                        }
                        $('.js-row').dblclick(function (e) {
                            e.preventDefault();
                            var row = $(this);
                        var Typecode = row.find('td:eq(0)').text();
                        var TypeName = row.find('td:eq(1)').text();
                        var ChkIMPA = row.find('td:eq(2)').text();
                        var ChkShowKG = row.find('td:eq(3)').text();
                        var ChkDeckEngin = row.find('td:eq(4)').text();
                        var ChkProvBond = row.find('td:eq(5)').text();

                        $('#TxtCode').val(Typecode);
                        $('#TxtTypeName').val(TypeName);
                        if (ChkIMPA == 1) {
                            $('#ChkIMPA').prop('checked',true);
                        }else{
                            $('#ChkIMPA').prop('checked',false);
                        }
                        if (ChkShowKG == 1) {
                            $('#ChkShowKG').prop('checked',true);
                        }else{
                            $('#ChkShowKG').prop('checked',false);
                        }
                        if (ChkDeckEngin == 1) {
                            $('#ChkDeckEngin').prop('checked',true);
                        }else{
                            $('#ChkDeckEngin').prop('checked',false);
                        }
                        if (ChkProvBond == 1) {
                            $('#ChkProvBond').prop('checked',true);
                        }else{
                            $('#ChkProvBond').prop('checked',false);
                        }
                        });
                    },
                    error: function(data) {
                        console.log(data);
                        $('.overlay').hide();
                    },
                    complete: function() {
                        $('.overlay').hide();
                    }


                });
            });
            $('#Button3').click(function (e) {
                e.preventDefault();
                var TxtCode = $('#TxtCode').val();
                var password = prompt("Please enter Admin Authentication:");
                if (password === "332211") {
                if (confirm("Are you sure you want to proceed?")) {
                    // proceed with action
                    ajaxSetup();
                $.ajax({
                    url: '/DepartmentDelete',
                    type: 'POST',
                    data: {
                        TxtCode,
                    },
                    beforeSend: function() {
                        $('.overlay').show();
                    },
                    success: function(resposne) {
                        console.log(resposne);
                        if (resposne.Message == 'Deleted') {
                            alert(resposne.Message)

                        if(resposne.Typesetup.length > 0){
                            var Ships = resposne.Typesetup;
                            let table = document.getElementById('Gd1body');
                            table.innerHTML = ""; // Clear the table
                            Ships.forEach(function(item) {
                            let row = table.insertRow();
                            row.classList.add("js-row");

                            function createCell(content) {
                                let cell = row.insertCell();
                                cell.innerHTML = content;
                                return cell;
                            }
                            createCell(item.TypeCode);
                            createCell(item.TypeName);
                            createCell(item.ChkIMPA);
                            createCell(item.ChkShowKG);
                            createCell(item.ChkDeckEngin);
                            createCell(item.ChkProvBond);


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



            $('.js-row').dblclick(function (e) {
                            e.preventDefault();
                            var row = $(this);
                        var Typecode = row.find('td:eq(0)').text();
                        var TypeName = row.find('td:eq(1)').text();
                        var ChkIMPA = row.find('td:eq(2)').text();
                        var ChkShowKG = row.find('td:eq(3)').text();
                        var ChkDeckEngin = row.find('td:eq(4)').text();
                        var ChkProvBond = row.find('td:eq(5)').text();

                        $('#TxtCode').val(Typecode);
                        $('#TxtTypeName').val(TypeName);
                        if (ChkIMPA == 1) {
                            $('#ChkIMPA').prop('checked',true);
                        }else{
                            $('#ChkIMPA').prop('checked',false);
                        }
                        if (ChkShowKG == 1) {
                            $('#ChkShowKG').prop('checked',true);
                        }else{
                            $('#ChkShowKG').prop('checked',false);
                        }
                        if (ChkDeckEngin == 1) {
                            $('#ChkDeckEngin').prop('checked',true);
                        }else{
                            $('#ChkDeckEngin').prop('checked',false);
                        }
                        if (ChkProvBond == 1) {
                            $('#ChkProvBond').prop('checked',true);
                        }else{
                            $('#ChkProvBond').prop('checked',false);
                        }
                        });



        });
    </script>




@stop


@section('content')
