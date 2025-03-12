@extends('layouts.app')



@section('title', 'User-Performance-Report')

@section('content_header')

@stop

@section('content')
<?php echo View::make('partials.Modalchartofaccount')->with('BranchCode', $BranchCode) ?>


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
                                {{-- </div> --}}


































                                <!-- <button class="button-79" role="button"><i class="fa fa-file text-dark"  aria-hidden="true"></i> Show</button>
                                                                <button class="button-78" role="button">Print</button>
                                                                <button class="button-78" role="button">Exit</button>-->
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
                                                    <td><input type="checkbox" name="" id=""></td>
                                                    <td>{{ $deptitem->Typecode }}</td>
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
                                                        <input type="checkbox" class="departmentcheck" id="">
                                                </td>
                                                <td>
                                                    {{$Godown->GodownName}}
                                                </td>
                                                <td>
                                                    {{$Godown->GodownCode}}
                                                </td>

                                            @endforeach

                                        </tbody>
                                    </table>

                                </div>
                            </div>

                        </div>
                    </div>
                    </div>
                    </div>











                <div class="col-lg-12 pb-5">
                    <div class="row">



                        <div class="col-sm-12">
                            <div class="rounded shadow">
                                <table class="table " id="DG1">
                                    <thead class="">
                                        <tr>
                                            <th>User&nbsp;Name</th>
                                            <th>Quote&nbsp;Date</th>
                                            <th>Quote&nbsp;No.</th>
                                            <th>Event&nbsp;No.</th>
                                            <th>Charge&nbsp;No.</th>
                                            <th>Vsn&nbsp;No.</th>
                                            <th>Dept</th>
                                            <th>Customer</th>
                                            <th>Vessel&nbsp;Name</th>
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

            function TotCalcu() {
                let table = document.getElementById('DG3body');
                let rows = table.rows;
                let TxtInvoiceAmt = 0;
                let TxtDrAmt = 0;
                let TxtNetInvoiceAmt = 0;
                let TxtPaidAmt = 0;
                let TxtBalAmt = 0;
                for (let i = 0; i < rows.length; i++) {
                    let cells = rows[i].cells;


                    InvoiceAmt = cells[10] ? cells[10].innerHTML : '';
                    Debitnote = cells[11] ? cells[11].innerHTML : '';
                    NetInvoiceAmt = cells[12] ? cells[12].innerHTML : '';
                    PaidAmt = cells[13] ? cells[13].innerHTML : '';
                    BalAmt = cells[14] ? cells[14].innerHTML : '';


                    TxtInvoiceAmt += Number(InvoiceAmt);
                    TxtDrAmt += Number(Debitnote);
                    TxtNetInvoiceAmt += Number(NetInvoiceAmt);
                    TxtPaidAmt += Number(PaidAmt);
                    TxtBalAmt += Number(BalAmt);
                }
                console.log(TxtInvoiceAmt);
                console.log(TxtDrAmt);
                console.log(TxtNetInvoiceAmt);
                console.log(TxtPaidAmt);
                console.log(TxtBalAmt);
                $('#TxtInvoiceAmt').val(TxtInvoiceAmt);
                $('#InvoiceAmt').text(TxtInvoiceAmt);
                $('#TxtDrAmt').val(TxtDrAmt);
                $('#DebitNote').text(TxtDrAmt);
                $('#TxtNetInvoiceAmt').val(TxtNetInvoiceAmt);
                $('#NetInvoiceAmt').text(TxtNetInvoiceAmt);
                $('#TxtPaidAmt').val(TxtPaidAmt);
                $('#PaidAmt').text(TxtPaidAmt);
                $('#TxtBalAmt').val(TxtBalAmt);
                $('#BalAmt').text(TxtBalAmt);
            }


            $(document).ready(function() {



                var table1 = $('#DG2').DataTable({

                    scrollY: 270,
                    deferRender: true,
                    scroller: true,
                    paging: false,
                    info: false,
                    ordering: false,
                    searching: false,
                    responsive: true,


                });
                var table1 = $('#DG3').DataTable({

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



                $("#AllVessel").change(function() {
                    // Check if the checkbox is checked
                    if ($(this).is(":checked")) {
                        // Disable the select element
                        $("#CmbVessel").prop("disabled", true);
                    } else {
                        // Enable the select element
                        $("#CmbVessel").prop("disabled", false);
                    }
                });




                $("#ChkAllCustomer").change(function() {
                    // Check if the checkbox is checked
                    if ($(this).is(":checked")) {
                        // Disable the select element
                        $("#CmbCustomer").prop("disabled", true);
                    } else {
                        // Enable the select element
                        $("#CmbCustomer").prop("disabled", false);
                    }
                });


                $("#AllVessel").change(function() {
                    // Check if the checkbox is checked
                    if ($(this).is(":checked")) {
                        // Disable the select element
                        $("#CmbVessel").prop("disabled", true);
                    } else {
                        // Enable the select element
                        $("#CmbVessel").prop("disabled", false);
                    }
                });


                $("#ChkVSNAll").change(function() {
                    // Check if the checkbox is checked
                    if ($(this).is(":checked")) {
                        // Disable the select element
                        $("#TxtVSNNo").prop("disabled", true);
                    } else {
                        // Enable the select element
                        $("#TxtVSNNo").prop("disabled", false);
                    }
                });

                $("#ChkChargeALL").change(function() {
                    // Check if the checkbox is checked
                    if ($(this).is(":checked")) {
                        // Disable the select element
                        $("#TxtChargeNo").prop("disabled", true);
                    } else {
                        // Enable the select element
                        $("#TxtChargeNo").prop("disabled", false);
                    }
                });
                $("#ChkGodownAll").change(function() {
                    // Check if the checkbox is checked
                    if ($(this).is(":checked")) {
                        // Disable the select element
                        $("#CmbGodownName").prop("disabled", true);
                    } else {
                        // Enable the select element
                        $("#CmbGodownName").prop("disabled", false);
                    }
                });

                $("#ChkInvoiceAll").change(function() {
                    // Check if the checkbox is checked
                    if ($(this).is(":checked")) {
                        // Disable the select element
                        $("#TxtInvoiceNoFrom").prop("disabled", true);
                        $("#TxtInvoiceNoTo").prop("disabled", true);
                    } else {
                        // Enable the select element
                        $("#TxtInvoiceNoFrom").prop("disabled", false);
                        $("#TxtInvoiceNoTo").prop("disabled", false);
                    }
                });

                $("#chkallInvDate").change(function() {
                    // Check if the checkbox is checked
                    if ($(this).is(":checked")) {
                        // Disable the select element
                        $("#TxtDateFrom").prop("disabled", true);
                        $("#TxtDateTo").prop("disabled", true);
                    } else {
                        // Enable the select element
                        $("#TxtDateFrom").prop("disabled", false);
                        $("#TxtDateTo").prop("disabled", false);
                    }
                });

                $("#ChkAllRVDate").change(function() {
                    // Check if the checkbox is checked
                    if ($(this).is(":checked")) {
                        // Disable the select element
                        $("#TxtRvDateFrom").prop("disabled", true);
                        $("#TxtRVDateTo").prop("disabled", true);
                    } else {
                        // Enable the select element
                        $("#TxtRvDateFrom").prop("disabled", false);
                        $("#TxtRVDateTo").prop("disabled", false);
                    }
                });
                $("#ChkGpAll").change(function() {
                    // Check if the checkbox is checked
                    if ($(this).is(":checked")) {
                        // Disable the select element
                        $("#txt_GpFrom").prop("disabled", true);
                        $("#txt_GpTo").prop("disabled", true);
                    } else {
                        // Enable the select element
                        $("#txt_GpFrom").prop("disabled", false);
                        $("#txt_GpTo").prop("disabled", false);
                    }
                });

                $("#ChkDueDateAll").change(function() {
                    // Check if the checkbox is checked
                    if ($(this).is(":checked")) {
                        // Disable the select element
                        $("#TxtDueDateFrom").prop("disabled", true);
                        $("#TxtDueDateTo").prop("disabled", true);
                    } else {
                        // Enable the select element
                        $("#TxtDueDateFrom").prop("disabled", false);
                        $("#TxtDueDateTo").prop("disabled", false);
                    }
                });
                $("#CkhOnlyDrNote").change(function() {
                    // Check if the checkbox is checked
                    if ($(this).is(":checked")) {
                        // Disable the select element
                        $("#CmbOnlyDrNote").prop("disabled", true);
                    } else {
                        // Enable the select element
                        $("#CmbOnlyDrNote").prop("disabled", false);
                    }
                });
                $("#ChkOkToPayAll").change(function() {
                    // Check if the checkbox is checked
                    if ($(this).is(":checked")) {
                        // Disable the select element
                        $("#CmbOkToPay").prop("disabled", true);
                    } else {
                        // Enable the select element
                        $("#CmbOkToPay").prop("disabled", false);
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














            });
        </script>




    @stop


    @section('content')
