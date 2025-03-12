@extends('layouts.app')



@section('title', 'Log-Status')

@section('content_header')

@stop

@section('content')
    <?php// echo View::make('partials.impalistitemmodal'); ?>
    <?php// echo View::make('partials.itemsearchmodal'); ?>
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
                        <h2 class="text-center">Log Status</h2>
                    </b>

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">


                            <div class="row">
                                <div class="inputbox col-sm-8 py-2">
                                    <input type="text" class="" id="TxtCode" name="TxtCode" required="required">
                                    <span class="Txtspan">
                                        Code </span>
                                    </div>
                            </div>
                            <div class="row">

                                <div class="inputbox col-sm-8 py-2">
                                    <input type="text" class="" id="TxtStatus" name="TxtStatus"
                                        required="required">
                                        <span class="Txtspan">
                                           Log Status</span>
                                        </div>
                                    </div>



                                    <div class="row py-2">
                                        <button class="btn btn-primary  mx-2" id="CmdAdd" role="button"> <i class="fa fa-plus mr-1"
                                                aria-hidden="true"></i>Add</button>

                                        <button class="btn btn-success mx-2" id="CmdSave" role="button"> <i class="fa fa-cloud mr-1"
                                                aria-hidden="true"></i>Save</button>

                                        <button class="btn btn-warning mx-2" id="Button3" role="button"> <i class="fa fa-multiply mr-1"
                                                aria-hidden="true"></i>Delete</button>

                                        <button class="btn btn-danger mx-2" id="Button4" role="button"> <i class="fa fa-door-open mr-1"
                                                aria-hidden="true"></i>Exit</button>
                                    </div>


                        </div>

                        <div class="col-lg-6">
                            <div class="row py-2">
                                <div class="inputbox col-sm-12">
                                    <input type="text" class="" onkeyup="cusFunction()" id="TxtFind"
                                        name="TxtFind" required="required">
                                    <span class="ml-2">
                                        Search
                                    </span>
                                </div>
                            </div>
                            <div class="row py-2">



                                <div class="col-sm-12">

                                    <div class="rounded shadow">
                                        <table class="table small" id="Gd1">
                                            <thead class="bg-info">
                                                <tr>
                                                    <th>Code</th>

                                                    <th>Log&nbsp;Status</th>
                                                </tr>
                                            </thead>
                                            <tbody id="Gd1body">
                                                @foreach ($log as $logitem)
                                                    <tr>
                                                        <td>{{ $logitem->Code }}</td>

                                                        <td>{{ $logitem->LogStatus }}</td>
                                                    </tr>
                                                @endforeach
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
    </div>











@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
    <style>
        .rainput:nth-of-type(1):checked~.worm .worm__segment {
            transform: translateX(0.5em);
        }

        .rainput:nth-of-type(1):checked~.worm .worm__segment:before {
            animation-name: hop1;
        }

        @keyframes hop1 {

            from,
            to {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-1.5em);
            }
        }

        .rainput:nth-of-type(2):checked~.worm .worm__segment {
            transform: translateX(5.8em);
        }

        .rainput:nth-of-type(2):checked~.worm .worm__segment:before {
            animation-name: hop2;
        }

        @keyframes hop2 {

            from,
            to {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-1.5em);
            }
        }

        .rainput:nth-of-type(3):checked~.worm .worm__segment {
            transform: translateX(11.6em);
        }

        .rainput:nth-of-type(3):checked~.worm .worm__segment:before {
            animation-name: hop3;
        }

        @keyframes hop3 {

            from,
            to {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-1.5em);
            }
        }


        .rainput:nth-of-type(1):checked~.worm2 .worm__segment2 {
            transform: translateX(0.5em);
        }

        .rainput:nth-of-type(1):checked~.worm2 .worm__segment2:before {
            animation-name: ho1;
        }

        @keyframes ho1 {

            from,
            to {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-1.5em);
            }
        }

        .rainput:nth-of-type(2):checked~.worm2 .worm__segment2 {
            transform: translateX(6.8em);
        }

        .rainput:nth-of-type(2):checked~.worm2 .worm__segment2:before {
            animation-name: ho2;
        }

        @keyframes ho2 {

            from,
            to {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-1.5em);
            }
        }
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

                scrollY: 600,
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

        function cusFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("TxtFind");
            filter = input.value.toUpperCase();
            table = document.getElementById("Gd1body");
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
        $(document).ready(function() {








        });
    </script>




@stop


@section('content')
