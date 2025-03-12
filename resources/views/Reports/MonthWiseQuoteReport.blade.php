@extends('layouts.app')



@section('title', 'Month Wise Quote Success')

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
                        <h3 class="">Month Wise Quote Success</h3>
                    </b>

                </div>
                <div class="card-body">
                    <div class="row py-2">
                        <div class="inputbox col-sm-2">
                            <span class="Txtspan">
                                Year
                            </span>
                            <select name="TxtYear" id="TxtYear" >
                                <option value="">--Select Year--</option>
                                @foreach ($Years as $Year)
                                    <option value="{{ $Year }}">{{ $Year }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="col-sm-6">
                            <div class="rounded shadow">
                                <table class="table table-sm small" id="Departmenttable">
                                    <thead class="bg-info">
                                        <tr>
                                            <th>Select</th>
                                            <th>Department&nbsp;Name</th>
                                            <th hidden>Department&nbsp;Code</th>
                                        </tr>
                                    </thead>
                                    <tbody id="Departmenttablebody">
                                        @foreach ($Deptsetup as $deptitem)
                                            <tr>
                                                <td><input type="checkbox" name="" class="checkbox2" id=""></td>
                                                <td>{{ $deptitem->TypeName }}</td>
                                                <td hidden>{{ $deptitem->Typecode }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="CheckBox1 py-2 ">
                                    <label class="input-group text-info mx-4">
                                        <input type="checkbox" name="ChkAllDepartment" id="ChkAllDepartment" checked value="">
                                        All
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="rounded shadow">
                                <table class="table table-sm small" id="DG3">
                                    <thead class="bg-info">
                                        <tr>
                                            <th>Select</th>

                                            <th>Godown&nbsp;Name</th>
                                            <th hidden>Godown&nbsp;Code</th>
                                        </tr>
                                    </thead>
                                    <tbody id="DG3body">
                                        @foreach ($GodownSetup as $deptitem)
                                            <tr>
                                                <td><input type="checkbox" name="" class="checkbox" id=""></td>
                                                <td>{{ $deptitem->GodownName }}</td>
                                                <td hidden>{{ $deptitem->GodownCode }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="CheckBox1 py-2 ">
                                    <label class="input-group text-info mx-4">
                                        <input type="checkbox" name="ChkAllWH" id="ChkAllWH" checked value="">
                                        All
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row p4">
                        <button class="btn btn-success mx-2" id="BtnFill" role="button"> <i
                            class="fa fa-file-text mr-1" aria-hidden="true"></i>Show</button>

                    <button class="btn btn-primary mx-2" id="Button1" role="button"> <i
                            class="fa fa-print mr-1" aria-hidden="true"></i>Print</button>

                    <button class="btn btn-danger mx-2" id="CmdExit" role="button"> <i
                            class="fa fa-door-open mr-1" aria-hidden="true"></i>Exit</button>

                    </div>
                </div>





            </div>










    <div class="col-lg-12 col-sm-12 p-2 rounded shadow card">
        <div class="row">

            <div class="col-lg-6 col-sm-6">

                <table class="table " id="DG2">
                <thead class="bg-info">
                    <tr>
                        <th>Month&nbsp;Name</th>
                        <th class="text-right">Quote&nbsp;Amount</th>
                        <th class="text-right">Order&nbsp;Amount</th>
                        <th class="text-center">Success&nbsp;%</th>

                    </tr>
                </thead>
                <tbody id="DG2body">

                </tbody>
            </table>

            <div class="row py-2">
                <div class="col-sm-6"></div>
                <div class="col-sm-6">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="">Total</span>
                        </div>
                        <input readonly class="form-control col-sm-6 mr-1" type="text" id="TxtQuoteAmt" name="TxtQuoteAmt">
                        <input readonly class="form-control col-sm-6 mx-1" type="text" id="TxtOrderAmt" name="TxtOrderAmt">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6">
            <canvas id="myChart" width="400" height="200"></canvas>

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
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>

        function ajaxSetup() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        }


        $(document).ready(function() {
            var table1 = $('#Departmenttable').DataTable({
                scrollY: 270,
                deferRender: true,
                scroller: true,
                paging: false,
                info: false,
                ordering: false,
                searching: false,
                responsive: true,
            });
            var table2 = $('#DG2').DataTable({
                scrollY: 450,
                deferRender: true,
                scroller: true,
                paging: false,
                info: false,
                ordering: false,
                searching: false,
                responsive: true,
            });
            var table3 = $('#DG3').DataTable({
                scrollY: 270,
                deferRender: true,
                scroller: true,
                paging: false,
                info: false,
                ordering: false,
                searching: false,
                responsive: true,
            });

            if ($("#ChkAllWH").prop("checked")) {
                $(".checkbox").prop("checked", true);
            }
            else{
                $(".checkbox").prop("checked", false);
            }
            $(".checkbox").on("click", function () {
                if ($(this).prop("checked")) {

                }else{
                $("#ChkAllWH").prop("checked", false);

                }

            })

            if ($("#ChkAllDepartment").prop("checked")) {
                $(".checkbox2").prop("checked", true);
            }
            else{
                $(".checkbox2").prop("checked", false);
            }
            $(".checkbox2").on("click", function () {
                if ($(this).prop("checked")) {

                }else{
                $("#ChkAllDepartment").prop("checked", false);

                }

            })
        //     $("#selectAll").on("click", function () {
        //     $(".checkbox").prop("checked", true);
        //     $("#ChkAllWH").prop("checked", true);
        // });
        // $("#unselectall").on("click", function () {
        //     $(".checkbox").prop("checked", false);
        //     $("#ChkAllWH").prop("checked", false);
        // });

        $('#BtnFill').click(function (e) {
            e.preventDefault();
            var TxtYear = $('#TxtYear').val();
            if (TxtYear == '') {
                Swaal.fire({
                            icon: 'error',
                            title: 'Year Not Found!',
                            text: 'Please Enter Year First',
                            showConfirmButton: true,
                        })
                        return;

            }

            let Qry = "";
            let Qry2 = "";
            let Qry3 = "";

            if (!$("#ChkAllDepartment").prop("checked")) {

                $('#Departmenttablebody tr').each(function () {
                        let checkboxCell = $(this).find('td:first-child'); // Assuming the checkbox cell is the first cell

                        if (checkboxCell.find('input[type="checkbox"]').prop('checked')) {
                            if (Qry !== "") {
                                Qry += ",";
                            }

                            let departmentCode = $(this).find('td:eq(2)').text();
                            Qry += departmentCode;
                        }
                    });
                        if (Qry !== "") {
                            if (Qry3 !== "") {
                                Qry3 += " and ";
                            }
                            Qry3 += "DepartmentCode in (" + Qry + ")";
                        }


            }
            if (!$("#ChkAllWH").prop("checked")) {

                $('#DG3body tr').each(function () {
                        let checkboxCell = $(this).find('td:first-child'); // Assuming the checkbox cell is the first cell

                        if (checkboxCell.find('input[type="checkbox"]').prop('checked')) {
                            if (Qry2 !== "") {
                                Qry2 += ",";
                            }

                            let GodownCode = $(this).find('td:eq(2)').text();
                            Qry2 += GodownCode;
                        }
                    });
                        if (Qry2 !== "") {
                            if (Qry3 !== "") {
                                Qry3 += " and ";
                            }
                            Qry3 += "GodownCode in (" + Qry2 + ")";
                        }


            }

            ajaxSetup();
            $.ajax({
                url: "{{route('MonthWiseQuoteReportShow')}}",
                type: 'POST',
                data: {
                    Qry3,
                    TxtYear,
                },
                beforeSend: function() {
                    // Show the overlay and spinner before sending the request
                    $('.overlay').show();
                },
                success: function(resposne) {
                    console.log(resposne);

                    let datatab = resposne.dataToshow;
                    let table = document.getElementById('DG2body');
                    table.innerHTML = ""; // Clear the table




                    datatab.forEach(function(item) {


                        let row = table.insertRow();
                        function createCell(content) {
                            let cell = row.insertCell();
                            cell.innerHTML = content;
                            return cell;
                        }


                        createCell(item.MonthName);
                        createCell(item.QuoteAmount ? parseFloat(item.QuoteAmount).toFixed(2) : 0).style.textAlign = 'right';
                        createCell(item.OrderAmount ? parseFloat(item.OrderAmount).toFixed(2) : 0).style.textAlign = 'right';
                        createCell(item.Success+'%').style.textAlign = 'center';



                    });

                    $('#TxtOrderAmt').val(resposne.TxtOrderAmt);
                    $('#TxtQuoteAmt').val(resposne.TxtQuoteAmt);

                    var canvas = document.getElementById('myChart');
                    var ctx = canvas.getContext('2d');

                    canvas.innerHTML = '';



                    var months = datatab.map(item => item.MonthName);
                    var QuoteAmount = datatab.map(item => item.QuoteAmount);
                    var OrderAmount = datatab.map(item => item.OrderAmount);
                    var Success = datatab.map(item => item.Success);

                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: months,
                            datasets: [
                                {
                                    label: 'Quote Amount',
                                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                    borderColor: 'rgba(255, 99, 132, 1)',
                                    borderWidth: 1,
                                    data: QuoteAmount,
                                },
                                {
                                    label: 'Order Amount',
                                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                    borderColor: 'rgba(75, 192, 192, 1)',
                                    borderWidth: 1,
                                    data: OrderAmount,
                                },

                            ],
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true,

                                },
                            },
                        },
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
