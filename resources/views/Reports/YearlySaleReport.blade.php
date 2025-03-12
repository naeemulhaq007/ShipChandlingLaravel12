@extends('layouts.app')



@section('title', 'Yearly Sales Report')

@section('content_header')

@stop

@section('content')


    <div class="container-fluid ">
        <div class="col-sm-12 pt-3">
            <div class="card ">
                <div class="card-header ">
                    <div class="card-tools ">
                        <button type="button" name="headertoggle" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                    <b>
                        <h3 class="">Yearly Sales Report</h3>
                    </b>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="row py-2">

                                    <select name="TxtYear" id="TxtYear">
                                        <option value="">--Select Year--</option>
                                        @foreach ($Years as $Year)
                                            <option value="{{ $Year }}">{{ $Year }} </option>
                                        @endforeach
                                    </select>

                            </div>



                            <div class="row px-4 py-4 dont-print">
                                <button class="btn btn-success mx-2" id="BtnFill" role="button"> <i
                                        class="fa fa-file-text mr-1" aria-hidden="true"></i>Show</button>

                                <button class="btn btn-primary mx-2" id="Button1" role="button"> <i
                                        class="fa fa-print mr-1" aria-hidden="true"></i>Print</button>

                                <button class="btn btn-danger mx-2" id="CmdExit" role="button"> <i
                                        class="fa fa-door-open mr-1" aria-hidden="true"></i>Exit</button>
                            </div>
                        </div>

                        <div class=" col-sm-7 dont-print">
                            <div class="rounded shadow">
                                <table class="table small" id="Departmenttable">
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
                                                <td><input type="checkbox" name="" class="checkbox" id="">
                                                </td>

                                                <td>{{ $deptitem->TypeName }}</td>
                                                <td hidden>{{ $deptitem->Typecode }}</td>
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
                </div>
            </div>

        </div>











        <div class="col-lg-12 col-sm-12 p-2 rounded shadow card" id="chattab">
            <canvas id="myChart" width="400" height="200"></canvas>
        </div>






        <div class="col-lg-12 col-sm-12 p-2 rounded shadow card">

            <table class="table " id="DG2">

            </table>


        </div>

    </div>


@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
    <style>
        @media print {
            .dont-print {
                display: none !important;
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
            transform: translateX(6.75em);
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
@section('plugins.Select2', true)
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

            $('#TxtYear').select2({
                placeholder: "Select year",
                allowClear: false
            });
            $('#chattab').hide();
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
            // var table1 = $('#DG2').DataTable({
            //     scrollY: 600,
            //     deferRender: true,
            //     scroller: true,
            //     paging: false,
            //     info: false,
            //     ordering: false,
            //     searching: false,
            //     responsive: true,
            // });
            $("#ChkAllDepartment").change(function() {
                // Check if the checkbox is checked
                if ($(this).is(":checked")) {
                    // Disable the select element
                    $("#CmbDepartment").prop("disabled", true);
                } else {
                    // Enable the select element
                    $("#CmbDepartment").prop("disabled", false);
                }
            });

            if ($("#ChkAllDepartment").prop("checked")) {
                $("#CmbDepartment").prop("disabled", true);

            } else {
                $("#CmbDepartment").prop("disabled", false);
            }

            var myChart; // Declare myChart outside the function to make it accessible globally

            $('#BtnFill').click(function(e) {
                e.preventDefault();
                var TxtYear = $('#TxtYear').val();

                if (TxtYear == '') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Year Not Found!',
                        text: 'Please Enter Year First',
                        showConfirmButton: true,
                    });
                    return;
                }

                let Qry = "";
            let Qry3 = "";

            if (!$("#ChkAllWH").prop("checked")) {

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
                        }else{
                            Swal.fire({
                        icon: 'error',
                        title: 'Department Not Found!',
                        text: 'Please Select Department First',
                        showConfirmButton: true,
                    });
                    return;
                        }


            }

                ajaxSetup();
                $.ajax({
                    url: "{{ route('YearlySaleReportShow') }}",
                    type: 'POST',
                    data: {
                        Qry3: Qry3,
                        TxtYear: TxtYear,
                    },
                    beforeSend: function() {
                        // Show the overlay and spinner before sending the request
                        $('.overlay').show();
                    },
                    success: function(response) {
                        console.log(response);
                        let data = response.dataToInsert;
                        let table = document.getElementById('DG2');
                        table.innerHTML = ""; // Clear the table

                        // Remove rows with null or empty DepartmentName
                        data = data.filter(item => item.DepartmentName && item.DepartmentName
                            .trim() !== '');

                        var uniqueMonthNames = [...new Set(data.map(item => item.MonthName))];
                        var uniqueDepartmentNames = [...new Set(data.map(item => item
                            .DepartmentName))];

                        var tableHTML = '<thead class="bg-info"><tr><th>Department Name</th>';
                        uniqueMonthNames.forEach(month => {
                            tableHTML += '<th>' + month + '</th>';
                        });
                        tableHTML += '<th>Total</th></tr></thead><tbody>';

                        uniqueDepartmentNames.forEach(department => {
                            tableHTML += '<tr><td>' + department + '</td>';
                            var totalNoOfQuote = 0;
                            uniqueMonthNames.forEach(month => {
                                var matchingData = data.find(item => item
                                    .DepartmentName === department && item
                                    .MonthName === month);
                                var sum = matchingData ? matchingData
                                    .NetAmount : 0;
                                totalNoOfQuote += sum;
                                tableHTML += '<td>' + sum + '</td>';
                            });
                            tableHTML += '<td>' + parseFloat(totalNoOfQuote).toFixed(2) + '</td></tr>';
                        });

                        tableHTML += '</tbody>';

                        // Append the table to the container
                        $('#DG2').html(tableHTML);

                            // Destroy the existing chart if it exists
                            if (myChart) {
                                myChart.destroy();
                            }

                            $('#chattab').show();
                            // Extract data for the chart
                            var datasets = uniqueDepartmentNames.map(department => {
                                var dataPoints = uniqueMonthNames.map(month => {
                                    var matchingData = data.find(item => item
                                        .DepartmentName === department &&
                                        item.MonthName === month);
                                    return matchingData ? matchingData
                                        .NetAmount : 0;
                                });

                                return {
                                    label: department,
                                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                    borderColor: 'rgba(255, 99, 132, 1)',
                                    borderWidth: 1,
                                    data: dataPoints,
                                };
                            });

                            // Create the chart
                            var ctx = document.getElementById('myChart').getContext('2d');
                            myChart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: uniqueMonthNames,
                                    datasets: datasets,
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
                    error: function(error) {
                        console.log(error);
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
