@extends('layouts.app')



@section('title', 'Shipping-Ports-Setup')

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
                        <h4 class="text-black">Shipping Ports Setup</h4>
                    </b>

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">


                                <div class="inputbox col-sm-8 py-2">
                                    <input type="text" class="" value="{{$PortCode}}" readonly id="TxtCode" name="TxtCode"
                                        required="required">
                                    <span class="Txtspan">
                                        Code </span>
                                </div>
                                <div class="inputbox col-sm-8 py-2">
                                    <input type="text" class="" id="TxtPortName" name="TxtPortName"
                                        required="required">
                                    <span class="Txtspan">
                                        Port </span>
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

                                                    <th>Port&nbsp;Name</th>
                                                </tr>
                                            </thead>
                                            <tbody id="Gd1body">
                                                @foreach ($ShipingPortSetup as $ShipingPortSetupitem)
                                                    <tr class="js-row">
                                                        <td>{{ $ShipingPortSetupitem->PortCode }}</td>

                                                        <td>{{ $ShipingPortSetupitem->PortName }}</td>
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
                            <a class="btn btn-info my-2 mx-2" id="CmdAdd" onclick="location.reload();" role="button"> <i
                                    class="fa fa-file-text mr-1" aria-hidden="true"></i>Add</a>

                            <button class="btn btn-success my-2 mx-2" id="CmdSave" role="button"> <i
                                    class="fa fa-file mr-1" aria-hidden="true"></i>Save</button>

                                    <a class="btn btn-danger my-2 mx-2" id="Button3" role="button"> <i
                                        class="fa fa-multiply mr-1" aria-hidden="true"></i>Delete</a>
                                        <a href="/" class="btn btn-danger my-2 mx-2" id="Button4" role="button"> <i
                                            class="fa fa-door-open mr-1" aria-hidden="true"></i>Exit</a>
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

            $('#CmdSave').click(function (e) {
                e.preventDefault();
                var TxtCode = $('#TxtCode').val();
                var TxtPortName = $('#TxtPortName').val();
                ajaxSetup();
                $.ajax({
                    url: '/ShipingPortSave',
                    type: 'POST',
                    data: {
                        TxtCode,
                        TxtPortName,
                    },
                    beforeSend: function() {
                        $('.overlay').show();
                    },
                    success: function(resposne) {
                        console.log(resposne);
                        if (resposne.Message) {
                            alert(resposne.Message)

                        if(resposne.ShipingPortSetup.length > 0){
                            var Ships = resposne.ShipingPortSetup;
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
                            createCell(item.PortCode);
                            createCell(item.PortName);

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
            });
            $('.js-row').dblclick(function (e) {
                e.preventDefault();
                var row = $(this);
                var Code = row.find('td:eq(0)').text();
                var PortName = row.find('td:eq(1)').text();

                $('#TxtCode').val(Code);
                $('#TxtPortName').val(PortName);

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
                    url: '/ShipingPortDelete',
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

                        if(resposne.ShipingPortSetup.length > 0){
                            var Ships = resposne.ShipingPortSetup;
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
                            createCell(item.PortCode);
                            createCell(item.PortName);

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
