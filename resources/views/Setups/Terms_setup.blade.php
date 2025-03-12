@extends('layouts.app')



@section('title', 'Terms-Setup')

@section('content_header')

@stop

@section('content')


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
                        <h4 class="text-black">Terms Setup</h4>
                    </b>

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">


                                <div class="inputbox col-sm-8 py-2">
                                    <input type="text" class="" id="TxtCode" name="TxtCode" readonly
                                        required="required">
                                    <span class="Txtspan">
                                        Code </span>
                                </div>
                                <div class="inputbox col-sm-8 py-2">
                                    <input type="text" class="" id="TxtTerms" name="TxtPortName"
                                        required="required">
                                    <span class="Txtspan">
                                        Terms </span>
                                </div>
                                <div class="inputbox col-sm-8 py-2">
                                    <input type="text" class="" id="TxtDays" name="TxtPortName"
                                        required="required">
                                    <span class="Txtspan">
                                        Days </span>
                                </div>




                        </div>

                        <div class="col-lg-6">

                            <div class="row py-2">



                                <div class="col-sm-12">

                                    <div class="rounded shadow">
                                        <table class="table small" id="Gd1" style="width: 100%">
                                            <thead class="bg-info">
                                                <tr>
                                                    <th>Code</th>

                                                    <th>Terms</th>
                                                    <th>Days</th>
                                                </tr>
                                            </thead>
                                            <tbody id="Gd1body">
                                                @foreach ($TermsSetup as $TermsSetupitem)
                                                    <tr class="js-row">
                                                        <td>{{ $TermsSetupitem->TermsCode }}</td>

                                                        <td>{{ $TermsSetupitem->Terms }}</td>
                                                        <td>{{ $TermsSetupitem->Days }}</td>
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
                            <button class="btn btn-primary my-2 mx-2" id="Button1" role="button"> <i
                                    class="fa fa-plus mr-1" aria-hidden="true"></i>New</button>

                            <button class="btn btn-success my-2 mx-2" id="Button2" role="button"> <i
                                    class="fa fa-cloud mr-1" aria-hidden="true"></i>Save</button>

                                    <button class="btn btn-warning my-2 mx-2" id="Button3" role="button"> <i
                                        class="fa fa-multiply mr-1" aria-hidden="true"></i>Delete</button>
                                        <button class="btn btn-danger my-2 mx-2" id="Button4" role="button"> <i
                                            class="fa fa-door-open mr-1" aria-hidden="true"></i>Exit</button>
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

        function jsdblfunc(row){
            var Typecode = row.find('td:eq(0)').text();
                        var terms = row.find('td:eq(1)').text();
                        var days = row.find('td:eq(2)').text();

                        $('#TxtCode').val(Typecode);
                        $('#TxtTerms').val(terms);
                        $('#TxtDays').val(days);

        }
        function createlist(tabledata){
            let table = document.getElementById('Gd1body');
            table.innerHTML = ""; // Clear the table
            tabledata.forEach(function(item) {
                let row = table.insertRow();
                row.classList.add("js-row");

                function createCell(content) {
                    let cell = row.insertCell();
                    cell.innerHTML = content;
                    return cell;
                }
                createCell(item.TermsCode);
                createCell(item.Terms);
                createCell(item.Days);
            });



        }
        $(document).ready(function() {

            $('.js-row').dblclick(function (e) {
                            e.preventDefault();
                            var row = $(this);
                            jsdblfunc(row);

                        });

            var table1 = $('#Gd1').DataTable({

                scrollY: 500,
                deferRender: true,
                scroller: true,
                paging: false,
                info: false,
                ordering: false,
                searching: false,
                responsive: true,


            });

            $('#Button2').click(function (e) {
                e.preventDefault();
                var TxtCode = $('#TxtCode').val();
                var TxtTerms = $('#TxtTerms').val();
                var TxtDays = $('#TxtDays').val();

                ajaxSetup();
                $.ajax({
                    url: "{{route('TermsSave')}}",
                    type: 'POST',
                    data: {
                        TxtCode,
                        TxtTerms,
                        TxtDays,
                    },
                    beforeSend: function() {
                        $('.overlay').show();
                    },
                    success: function(resposne) {
                        console.log(resposne);
                        if (resposne.Message == 'Saved') {
                            if(resposne.Terms.length > 0){
                                var Terms = resposne.Terms;
                                createlist(Terms);
                            }



                         $('#TxtCode').val(resposne.Maxcode);
                    $('#TxtTerms').val('');
                    $('#TxtDays').val('');

                        }
                        $('.js-row').dblclick(function (e) {
                            e.preventDefault();
                            var row = $(this);
                            jsdblfunc(row);

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







        });
    </script>




@stop


@section('content')
