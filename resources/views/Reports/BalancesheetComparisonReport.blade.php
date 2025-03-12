@extends('layouts.app')



@section('title', 'BalancesheetComparisonReport')

@section('content_header')

@stop

@section('content')
    <?php echo View::make('partials.Modalchartofaccount')->with('BranchCode', $BranchCode); ?>




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
                        <h4 class="text-black">Balance sheet Report</h4>
                    </b>

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-5">



                            <div class="row py-2 ">


                                <div class="inputbox col-sm-5 ml-2">
                                    <input type="date" class="" id="TxtDateFrom" required="required">
                                    <span class="Txtspan">
                                        Date From :
                                    </span>
                                </div>

                                <div class="inputbox col-sm-5 ml-1">
                                    <input type="date" class="" id="TxtDateTo" required="required">
                                    <span class="Txtspan">
                                        To :
                                    </span>
                                </div>

                            </div>
                            <div class="row py-2 ">


                                <div class="inputbox col-sm-5 ml-2">
                                    <input type="date" class="" id="TxtDateToYear" required="required">
                                    <span class="Txtspan">

                                    </span>
                                </div>

                            </div>



                            <div class="row py-2 ">
                                <div class="inputbox col-sm-5 ml-2">
                                    <input type="text" class="" id="TxtYearFrom" required="required">
                                    <span class="Txtspan">
                                        Year From
                                    </span>
                                </div>

                                <div class="inputbox col-sm-5 ml-1">
                                    <input type="text" class="" id="TxtFromAmt" required="required">
                                    <span class="Txtspan">

                                    </span>
                                </div>
                            </div>
                            <div class="row py-2 ">
                                <div class="inputbox col-sm-5 ml-2">
                                    <input type="text" class="" id="TxtYearTo" required="required">
                                    <span class="Txtspan">
                                        Year To
                                    </span>
                                </div>

                                <div class="inputbox col-sm-5 ml-1">
                                    <input type="text" class="" id="TxtToAmt" required="required">
                                    <span class="Txtspan">

                                    </span>
                                </div>
                            </div>

                            <div class="row py-2 ">

                            </div>



                            <div class="row ml-1 py-2">
                                <button class="btn btn-dark  mx-2" id="CmdGenerateNew" role="button"> <i
                                        class="fa fa-file-text mr-1" aria-hidden="true"></i>Generate</button>

                                <button class="btn btn-primary mx-2" id="Button9" role="button"> <i
                                        class="fa fa-print mr-1" aria-hidden="true"></i>Print</button>

                                <button class="btn btn-danger mx-2" id="CmdExit" role="button"> <i
                                        class="fa fa-door-open mr-1" aria-hidden="true"></i>Exit</button>
                            </div>


                        </div>



                    </div>
                </div>
            </div>











            <div class=" pb-5 table-responsive">
                <div class="rounded shadow ">
                    <table class="table" id="DG1">
                        <thead class="">
                            <tr>
                                <th>Act&nbsp;Code</th>
                                <th>Act&nbsp;Name</th>
                                <th>Amount1</th>
                                <th>Amount2</th>
                            </tr>
                        </thead>
                        <tbody id="DG1body">

                        </tbody>
                    </table>
                    <div class="row py-2">
                        <input type="text" name="TxtTotQuoteAmt" class="form-control col-sm-1  mx-1 ml-auto"
                            id="TxtTotQuoteAmt">
                        <input type="text" name="TxtTotOrderAmt" class="form-control col-sm-1  mx-1 "
                            id="TxtTotOrderAmt">
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
            transform: translateX(7.6em);
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
            transform: translateX(15.9em);
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
            transform: translateX(8.6em);
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

        /* Adjust the table container to prevent horizontal scrollbar duplication */
        .table-responsive {
            overflow-x: auto;
        }

        /* Adjust the table to remove the default DataTables horizontal scrollbar */
        #DG1 {
            width: 100%;
            white-space: nowrap;
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

        function tablecompser() {
            let table = document.getElementById('DG1body');
            let rows = table.rows;
            var datatable = [];
            for (let i = 0; i < rows.length; i++) {
                let cells = rows[i].cells;
                datatable.push({
                    WorkSellPriced: cells[0] ? cells[0].innerHTML : '',
                    QDate: cells[1] ? cells[1].innerHTML : '',
                    QuoteNo: cells[2] ? cells[2].innerHTML : '',
                    EventNo: cells[3] ? cells[3].innerHTML : '',
                    FlipOrderNo: cells[4] ? cells[4].innerHTML : '',
                    VSNNo: cells[5] ? cells[5].innerHTML : '',
                    Department: cells[6] ? cells[6].innerHTML : '',
                    CustomerName: cells[7] ? cells[7].innerHTML : '',
                    Vessel: cells[8] ? cells[8].innerHTML : '',
                    LineQuote: cells[9] ? cells[9].innerHTML : '',
                    QuoteAmount: cells[10] ? cells[10].innerHTML : '',
                    LineOrder: cells[11] ? cells[11].innerHTML : '',
                    OrderAmount: cells[12] ? cells[12].innerHTML : '',
                    Success: cells[13] ? cells[13].innerHTML : '',
                    GPPer: cells[14] ? cells[14].innerHTML : '',


                });

            }
            return datatable;
        }


        $(document).ready(function() {



            var table2 = $('#DG2').DataTable({

                scrollY: 270,
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
            var table1 = $('#DG1').DataTable({

                scrollY: 600,
                scrollX: true,
                deferRender: true,
                scroller: true,
                paging: false,
                info: false,
                ordering: false,
                searching: false,
                responsive: true


            });

            // table1.column.adjust();



            var odate = new Date();
            const today = odate.toISOString().substring(0, 10);
            $('#TxtDateFrom').val(today);
            $('#TxtDateTo').val(today);
            $('#TxtDueDateFrom').val(today);
            $('#TxtDueDateTo').val(today);

            $("#ChkAllUser").change(function() {
                // Check if the checkbox is checked
                if ($(this).is(":checked")) {
                    // Disable the select element
                    $("#CmbUser").prop("disabled", true);
                } else {
                    // Enable the select element
                    $("#CmbUser").prop("disabled", false);
                }
            });








            $('#Button6').click(function(e) {
                e.preventDefault();
                $('#searchrmod').modal('show');
            });


            $(document).on("dblclick", ".js-click", function() {
                var customer = $(this).attr('data-cusname');
                var custcode = $(this).attr('data-custcode');
                $('#CmbCustomer').val(customer);
                $('#searchbox').val(custcode);
                // alert(customer);
                $('#searchrmod').modal('hide');
                $("#CmbCustomer").prop("disabled", false);
                $('#ChkAllCustomer').prop("checked", false)
            });



            $('#Button1').click(function(e) {
                e.preventDefault();
                $('#searchrmodw').modal('show');
            });


            $(document).on("dblclick", ".js-click", function() {
                var customer = $(this).attr('data-cusname');
                $('#CmbVessel').val(customer);
                // alert(customer);
                $('#searchrmodw').modal('hide');
                $("#CmbVessel").prop("disabled", false);
                $('#ChkAllVessel').prop("checked", false)
            });

            $('#Button8').click(function(e) {
                e.preventDefault();
                $('#AC_ledger').modal('show');
            });



            $('#BtnNewEvent').click(function(e) {
                e.preventDefault();

                var Qry = "QDate>='" + $('#TxtDateFrom').val() + "' and QDate<='" + $('#TxtDateTo').val() +
                    "'";

                if (!$('#ChkAllUser').is(':checked')) {
                    if ($('#OptSellPrice').is(':checked')) {
                        if (Qry !== "") Qry += " and ";
                        Qry += "WorkSellPricied = '" + $('#CmbUser').val() + "'";
                    } else if ($('#OptQuoteEntry').is(':checked')) {
                        if (Qry !== "") Qry += " and ";
                        Qry += "WorkUserQuoteEntry = '" + $('#CmbUser').val() + "'";
                    } else if ($('#OptCreateQuote').is(':checked')) {
                        if (Qry !== "") Qry += " and ";
                        Qry += "WorkUser= '" + $('#CmbUser').val() + "'";
                    }
                }

                if (!$('#ChkAllDepartment').is(':checked')) {
                    var Qry1 = "";
                    $('#DG2 tbody tr').each(function() {
                        if ($(this).find('.DG2CHK').is(':checked')) {
                            if (Qry1 !== "") Qry1 += ",";
                            Qry1 += $(this).find('.DG2DepartmentCode').text();
                        }
                    });

                    if (Qry1 !== "") {
                        if (Qry !== "") Qry += " and ";
                        Qry += "DepartmentCode in (" + Qry1 + ")";
                    }
                }

                if (!$('#ChkAllWarehouse').is(':checked')) {
                    var Qry2 = "";
                    $('#DG3 tbody tr').each(function() {
                        if ($(this).find('.DG3CHK').is(':checked')) {
                            if (Qry2 !== "") Qry2 += ",";
                            Qry2 += $(this).find('.DG3GodownCode').text();
                        }
                    });

                    if (Qry2 !== "") {
                        if (Qry !== "") Qry += " and ";
                        Qry += "GodownCode in (" + Qry2 + ")";
                    }
                }

                console.log(Qry); // Output the resulting query string
                var OptSellPrice = $('#OptSellPrice').is(':checked');
                var OptQuoteEntry = $('#OptQuoteEntry').is(':checked');
                var OptCreateQuote = $('#OptCreateQuote').is(':checked');
                // console.log(OptSellPrice); // Output the resulting query string

                ajaxSetup();

                $.ajax({
                    url: '/UserPerformanceShow',
                    type: 'POST',
                    data: {
                        Qry,
                        OptSellPrice,
                        OptQuoteEntry,
                        OptCreateQuote,
                    },
                    beforeSend: function() {
                        // Show the overlay and spinner before sending the request
                        $('.overlay').show();
                    },
                    success: function(resposne) {
                        console.log(resposne);
                        let data = resposne.query;
                        let table = document.getElementById('DG1body');
                        table.innerHTML = ""; // Clear the table
                        var TxtTotQuoteAmt = 0;
                        var TxtTotOrderAmt = 0;

                        data.forEach(function(item) {

                            let row = table.insertRow();

                            function createCell(content) {
                                let cell = row.insertCell();
                                cell.innerHTML = content;
                                return cell;
                            }
                            if ($('#OptSellPrice').is(':checked')) {
                                createCell(item.WorkSellPricied);
                            }
                            if ($('#OptQuoteEntry').is(':checked')) {
                                createCell(item.WorkUserQuoteEntry);
                            }
                            if ($('#OptCreateQuote').is(':checked')) {
                                createCell(item.WorkUser);
                            }
                            var Qdate = new Date(item.QDate);
                            const Qd = Qdate.toISOString().substring(0, 10);
                            createCell(Qd);
                            createCell(item.QuoteNo);
                            createCell(item.EventNo);
                            createCell(item.FlipOrderNo);
                            createCell(item.VSNNo);
                            createCell(item.DepartmentName);
                            createCell(item.CustomerName);
                            createCell(item.VesselName);
                            createCell(item.EnteredLineQuote);
                            createCell(parseFloat(item.QuoteAmount).toFixed(2));
                            createCell(item.EstLineQuote);
                            createCell(parseFloat(item.OrderAmount).toFixed(2));

                            var MORDERAMOUNT = 0;
                            var MQUOTEAMOUNT = 0;
                            MQUOTEAMOUNT = item.QuoteAmount ? parseFloat(item
                                .QuoteAmount) : 0;
                            MORDERAMOUNT = item.OrderAmount ? parseFloat(item
                                .OrderAmount) : 0;
                            var DG1SuccessPer = 0;
                            if (MORDERAMOUNT > 0 && MQUOTEAMOUNT > 0) {
                                DG1SuccessPer = parseFloat(MORDERAMOUNT / MQUOTEAMOUNT *
                                    100).toFixed(2);
                            } else {
                                DG1SuccessPer = 0;
                            }
                            createCell(DG1SuccessPer);
                            createCell(parseFloat(item.GPPer).toFixed(2));

                            TxtTotQuoteAmt += MQUOTEAMOUNT;
                            TxtTotOrderAmt += MORDERAMOUNT;


                        });
                        table1.columns.adjust();
                        $('TxtTotQuoteAmt').val(TxtTotQuoteAmt);
                        $('TxtTotOrderAmt').val(TxtTotOrderAmt);

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

            $('#BtnVsnLog').click(function(e) {
                e.preventDefault();


                var dtable = tablecompser();
                ajaxSetup();

                $.ajax({
                    url: '/saveWithRS',
                    type: 'POST',
                    data: {
                        dtable,
                    },
                    beforeSend: function() {
                        // Show the overlay and spinner before sending the request
                        $('.overlay').show();
                    },
                    success: function(resposne) {
                        console.log(resposne);
                        if (resposne.Message == 'Saved') {
                            var datefrom = $('#TxtDateFrom').val();
                            var dateto = $('#TxtDateTo').val();
                            var ReportType = '';
                            if ($('#OptSellPrice').is(':checked')) {
                                ReportType = "Sell Price User";
                            } else if ($('#OptQuoteEntry').is(':checked')) {
                                ReportType = "Quote Entry User";
                            } else if ($('#OptCreateQuote').is(':checked')) {
                                ReportType = "Create Quote User";
                            }


                            if ($('#ChkDetail').is(':checked')) {
                                window.location = 'User-Performance-Print?datefrom=' +
                                    datefrom + '&dateto=' + dateto + '&ReportType=' +
                                    ReportType;
                            } else if ($('#ChkSummary').is(':checked')) {
                                window.location = 'User-Performance-Summary-Print?datefrom=' +
                                    datefrom + '&dateto=' + dateto + '&ReportType=' +
                                    ReportType;
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








        });
    </script>




@stop
