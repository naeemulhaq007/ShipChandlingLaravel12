@extends('layouts.app')



@section('title', 'User-Performance-Report')

@section('content_header')

@stop

@section('content')
<?php echo View::make('partials.Modalchartofaccount')->with('BranchCode', $BranchCode) ?>




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
                        <h4 class="text-black">User Performance Report</h4>
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
                                <!--<div class="input-group col-sm-6 ml-2">
                                                                                                <div class="input-group-prepend">
                                                                                                    <span class="input-group-text" style="width:120px" id="">Created From :
                                                                                                    </span>
                                                                                                </div>
                                                                                                <input id='TxtDateFrom' type="date" class="custom-input form-control" value="">
                                                                                            </div>
                                                                                            <div class="input-group col-sm-4 ml-4">
                                                                                                <div class="input-group-prepend">
                                                                                                    <span class="input-group-text" style="width:50px" id="">To :</span>
                                                                                                </div>
                                                                                                <input id='TxtDateTo' type="date" class="custom-input form-control" value="">
                                                                                            </div>-->





                                <!-- <div class="form-check form-check-inline ml-3">
                                                                                                <label class="form-check-label text-info mx-1">
                                                                                                    <input class="form-check-input " type="checkbox" name="ChkPODateAll"
                                                                                                        id="ChkPODateAll" value=""> All
                                                                                                </label>
                                                                                            </div>-->



                            </div>

                            <div class="row py-2">
                                <div class="input-group col-sm-12 ">



                                    <div class="inputbox col-sm-10">
                                        <select name="CmbUser" id="CmbUser" disabled>
                                            @foreach ($UserLIst as $UserLIstitem)
                                                <option value="{{ $UserLIstitem->UserName }}">{{ $UserLIstitem->UserName }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="Txtspan">
                                            User Name
                                        </span>
                                    </div>

                                    <div class="CheckBox1">
                                        <label class="input-group text-info ml-2">
                                            <input class=" " type="checkbox" name="ChkAllUser"
                                                id="ChkAllUser" checked value=""> All
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row ml-1 py-2">
                                <button class="btn btn-success  mx-2" id="BtnNewEvent" role="button"> <i
                                        class="fa fa-file-text mr-1" aria-hidden="true"></i>Show</button>

                                <button class="btn btn-primary mx-2" id="BtnVsnLog" role="button"> <i
                                        class="fa fa-print mr-1" aria-hidden="true"></i>Print</button>

                                <button class="btn btn-danger mx-2" id="GunaGradientButton2" role="button"> <i
                                        class="fa fa-door-open mr-1" aria-hidden="true"></i>Exit</button>
                            </div>









                        </div>

                        <div class="col-lg-7">












                            <div class="row py-2">
                                <div class="input-group col-sm-8 ">
                                    <div class="rdform row mt-3 ml-1">
                                        <input id="OptSellPrice" type="radio" class="rainput" name="hopping"
                                            value="">
                                        <label class="ralabel mx-2" for="OptSellPrice"><span></span>Sell Price</label>
                                        <input id="OptQuoteEntry" type="radio" class="rainput" name="hopping"
                                            value="">
                                        <label class="ralabel  mx-2" for="OptQuoteEntry"><span></span>Quote Entry</label>
                                        <input id="OptCreateQuote" type="radio" class="rainput" name="hopping"
                                            value="" checked>
                                        <label class="ralabel  mx-2" for="OptCreateQuote"><span></span>Create Quote</label>
                                        <div class="worm">
                                            @for ($i = 0; $i < 30; $i++)
                                                <div class="worm__segment"></div>
                                            @endfor
                                        </div>

                                    </div>
                                </div>

                                <div class="input-group col-sm-4 ml-2">
                                    <div class="rdform row mt-3 ml-3">
                                        <input id="ChkDetail" type="radio" class="rainput" autocomplete="off"
                                            name="hopping2" value="" checked>
                                        <label class="ralabel mx-2" for="ChkDetail"><span></span>Print Detail</label>
                                        <input id="ChkSummary" type="radio" class="rainput" autocomplete="off"
                                            name="hopping2" value="">
                                        <label class="ralabel  mx-2" for="ChkSummary"><span></span>Print Summary</label>
                                        <div class="worm2">
                                            @for ($j = 0; $j < 30; $j++)
                                                <div class="worm__segment2"></div>
                                            @endfor
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                </div>
                <div class="card ">

                    <div class="card-body">
                    <div class="col-lg-12 pb-2">
                        <div class="row">

                            <div class="col-sm-6">
                                <label class="form-check-label text-info mx-4">
                                    <input class="form-check-input " type="checkbox" name="ChkAllDepartment"
                                        id="ChkAllDepartment" checked value=""> All
                                </label>
                                <div class="rounded shadow">
                                    <table class="table small" id="DG2">
                                        <thead class="bg-info">
                                            <tr>
                                                <th>Select</th>
                                                <th>Department&nbsp;Name</th>
                                                <th>Code</th>
                                            </tr>
                                        </thead>
                                        <tbody id="DG2body">
                                            @foreach ($Deptsetup as $deptitem)
                                                <tr>
                                                    <td><input type="checkbox" class="DG2CHK" name="" id=""></td>
                                                    <td class="DG2DepartmentCode">{{ $deptitem->Typecode }}</td>
                                                    <td>{{ $deptitem->TypeName }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label class="form-check-label text-info mx-4">
                                    <input class="form-check-input " type="checkbox" name="ChkAllWarehouse"
                                        id="ChkAllWarehouse" checked value=""> All
                                </label>
                                <div class="rounded shadow">
                                    <table class="table small" id="DG3">
                                        <thead class="bg-info">
                                            <tr>
                                                <th>Select</th>
                                                <th>Godown&nbsp;Name</th>
                                                <th>Godown&nbsp;Code</th>
                                            </tr>
                                        </thead>
                                        <tbody id="DG3body">
                                            @foreach ($GodownSetup as $Godown)
                                            <tr>
                                                <td>
                                                        <input type="checkbox" class="DG3CHK" id="">
                                                </td>
                                                <td>{{$Godown->GodownName}}</td>
                                                <td class="DG3GodownCode">{{$Godown->GodownCode}}</td>

                                            @endforeach

                                        </tbody>
                                    </table>

                                </div>
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
                                        <th>User&nbsp;Name</th>
                                        <th>Quote&nbsp;Date</th>
                                        <th>Quote&nbsp;No.</th>
                                        <th>Event&nbsp;No.</th>
                                        <th>Charge&nbsp;No.</th>
                                        <th>Vsn&nbsp;No.</th>
                                        <th>Dept</th>
                                        <th style="width: 200px">Customer</th>
                                        <th style="width: 100px">Vessel&nbsp;Name</th>
                                        <th>Line&nbsp;Quote</th>
                                        <th>Quote&nbsp;Amount</th>
                                        <th>Line&nbsp;Order</th>
                                        <th>Order&nbsp;Amount</th>
                                        <th>Success&nbsp;%</th>
                                        <th>GP&nbsp;Per</th>





                                    </tr>
                                </thead>
                                <tbody id="DG1body">

                                </tbody>
                            </table>
                            <div class="row py-2">
                                <input type="text" name="TxtTotQuoteAmt" class="form-control col-sm-1  mx-1 ml-auto" id="TxtTotQuoteAmt">
                                <input type="text" name="TxtTotOrderAmt" class="form-control col-sm-1  mx-1 " id="TxtTotOrderAmt">
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



                $('#BtnNewEvent').click(function (e) {
                    e.preventDefault();

                    var Qry = "QDate>='" + $('#TxtDateFrom').val() + "' and QDate<='" + $('#TxtDateTo').val() + "'";

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
                            if($('#OptSellPrice').is(':checked')){
                                createCell(item.WorkSellPricied);
                            }
                            if($('#OptQuoteEntry').is(':checked')){
                                createCell(item.WorkUserQuoteEntry);
                            }
                            if($('#OptCreateQuote').is(':checked')){
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
                            MQUOTEAMOUNT = item.QuoteAmount ? parseFloat(item.QuoteAmount) : 0;
                            MORDERAMOUNT = item.OrderAmount ? parseFloat(item.OrderAmount) : 0;
                            var DG1SuccessPer = 0;
                            if(MORDERAMOUNT > 0 && MQUOTEAMOUNT > 0){
                               DG1SuccessPer = parseFloat(MORDERAMOUNT / MQUOTEAMOUNT * 100).toFixed(2);
                            }else{
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

                $('#BtnVsnLog').click(function (e) {
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
                            var ReportType='';
                            if ($('#OptSellPrice').is(':checked')){
                                ReportType = "Sell Price User";
                            }else if($('#OptQuoteEntry').is(':checked')){
                                ReportType = "Quote Entry User";
                            }else if($('#OptCreateQuote').is(':checked')){
                                ReportType = "Create Quote User";
                            }


                            if($('#ChkDetail').is(':checked')){
                                window.location='User-Performance-Print?datefrom='+datefrom+'&dateto='+dateto+'&ReportType='+ReportType;
                            }
                            else if($('#ChkSummary').is(':checked')){
                                window.location='User-Performance-Summary-Print?datefrom='+datefrom+'&dateto='+dateto+'&ReportType='+ReportType;
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


    @section('content')
