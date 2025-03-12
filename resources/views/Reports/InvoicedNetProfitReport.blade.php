@extends('layouts.app')



@section('title', 'Invoiced-Net-Profit-Report')

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
                        <h3 class="text-center">Invoiced Net Profit Report</h3>
                    </b>

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">



                            <div class="row py-2 ">


                                <div class="inputbox col-sm-4">
                                    <input type="date" class="" id="TxtDateFrom" required="required">
                                    <span class="Txtspan">
                                        Invoice Date From
                                    </span>
                                </div>

                                <div class="inputbox col-sm-4">
                                    <input type="date" class="" id="TxtDateTo" required="required">
                                    <span class="Txtspan">
                                        To
                                    </span>
                                </div>
                                <div class="CheckBox1 mt-2">
                                    <label class="input-group text-info mx-1">
                                        <input type="checkbox" name="chkallInvDate"
                                            id="chkallInvDate" value=""> All
                                    </label>
                                </div>
                            </div>

                            <div class="row py-2 ">


                                <div class="inputbox col-sm-4">
                                    <input type="date" class="" disabled id="TxtRvDateFrom" required="required">
                                    <span class="Txtspan">
                                        Rv Date from
                                    </span>
                                </div>

                                <div class="inputbox col-sm-4">
                                    <input type="date" class="" disabled id="TxtRVDateTo" required="required">
                                    <span class="Txtspan">
                                        To
                                    </span>
                                </div>



                                <div class="CheckBox1 mt-2">
                                    <label class="input-group text-info mx-1">
                                        <input type="checkbox" name="ChkAllRVDate"
                                            id="ChkAllRVDate" checked value=""> All
                                    </label>
                                </div>



                            </div>
                            <div class="row py-2">



                                    <div hidden class="inputbox col-sm-2 ">
                                        <input type="text" class=" " id="TxtCustomerCode" required="required">
                                        <span class="Txtspan">
                                            C.Code
                                        </span>
                                    </div>
                                    <div class="inputbox col-sm-8">
                                        <input type="text" class="" id="CmbCustomer" disabled required="required">
                                        <span class="Txtspan">
                                            Customer Name
                                        </span>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-info" style="cursor: pointer;" id="Button6"><i
                                                class="fas fa-search"></i></span>
                                    </div>
                                    <div class="CheckBox1 mt-2 ml-2">
                                        <label class="input-group text-info mx-1">
                                            <input type="checkbox" name="ChkAllCustomer"
                                                id="ChkAllCustomer" checked value=""> All
                                        </label>
                                    </div>
                            </div>
                            <div class="row py-2">



                                    <div hidden class="inputbox col-sm-2">
                                        <input type="text" class=" " id="TxtVesselCode" disabled required="required">
                                        <span class="Txtspan">
                                            V. Code
                                        </span>
                                    </div>
                                    <div class="inputbox col-sm-8">
                                        <input type="text" class="" id="CmbVessel" required="required">
                                        <span class="Txtspan">
                                            Vessel Name
                                        </span>
                                    </div>
                                        <button class="btn btn-info" style="cursor: pointer;" id="Button1"><i
                                                class="fas fa-search"></i></button>
                                    <div class="CheckBox1 mt-2 ml-2">
                                        <label class="input-group text-info mx-1">
                                            <input type="checkbox" name="AllVessel"
                                                id="AllVessel" checked value=""> All
                                        </label>
                                    </div>
                            </div>

                            <div class="row ml-1 py-2">
                                <button class="btn btn-success  mx-2" id="CmdShow" role="button"> <i
                                        class="fa fa-file-text mr-1" aria-hidden="true"></i>Show</button>

                                <button class="btn btn-primary mx-2" id="CmdPrint" role="button"> <i
                                        class="fa fa-print mr-1" aria-hidden="true"></i>Print</button>

                                <button class="btn btn-danger mx-2" id="CmdExit" role="button"> <i
                                        class="fa fa-door-open mr-1" aria-hidden="true"></i>Exit</button>
                            </div>









                        </div>

                        <div class="col-lg-6">

                            <div class="row py-2">
                                <div class="input-group col-sm-12 ">



                                    <div hidden class="inputbox col-sm-2 ">
                                        <input type="hidden" class=" "  name="" id="TxtGodownCode" value="">
                                        <span class="ml-2">
                                            Warehouse Code
                                        </span>
                                    </div>
                                    <div class="inputbox col-sm-9">
                                        <span class="Txtspan">
                                            Warehouse
                                        </span>
                                        <select name="CmbGodownName" disabled  id="CmbGodownName">
                                            <option value="" style="display: none;" id="blankCmbGodownName"></option>
                                            @foreach ($GodownSetup as $Godownitem)
                                            <option value="{{$Godownitem->GodownCode}}">{{$Godownitem->GodownName}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="CheckBox1 mt-2 ml-2">
                                        <label class="input-group text-info mx-1">
                                            <input type="checkbox" name="ChkGodownAll"
                                                id="ChkGodownAll" checked value=""> All
                                        </label>
                                    </div>
                                </div>
                            </div>


                            <div class="row py-2 ">


                                <div class="inputbox col-sm-4 ml-2">
                                    <input type="text" class="" id="TxtVSNNo" disabled required="required">
                                    <span class="Txtspan">
                                        VSN #
                                    </span>
                                </div>
                                <div class="CheckBox1 mt-2 ml-2">
                                    <label class="input-group text-info mx-1">
                                        <input type="checkbox" name="ChkVSNAll"
                                            id="ChkVSNAll" value="" checked> All
                                    </label>
                                </div>

                                <div class="inputbox col-sm-4 ml-2">
                                    <input type="text" class="" id="TxtChargeNo" disabled required="required">
                                    <span class="Txtspan">
                                        Charge #
                                    </span>
                                </div>


                                <div class="CheckBox1 mt-2 ml-2">
                                    <label class="input-group text-info mx-1">
                                        <input type="checkbox" name="ChkChargeALL"
                                            id="ChkChargeALL" value="" checked> All
                                    </label>
                                </div>



                            </div>

                            <div class="row py-2 ">


                                <div class="inputbox col-sm-4 ml-2 mr-3">
                                    <input type="text" class="" id="txt_GpFrom" disabled required="required">
                                    <span class="Txtspan">
                                        GP From
                                    </span>
                                </div>

                                <div class="inputbox col-sm-4 ml-5">
                                    <input type="text" class="" id="txt_GpTo" disabled required="required">
                                    <span class="Txtspan">
                                        To
                                    </span>
                                </div>


                                <div class="CheckBox1 mt-2 ml-2">
                                    <label class="input-group text-info mx-1">
                                        <input type="checkbox" name="ChkGpAll"
                                            id="ChkGpAll" value="" checked> All
                                    </label>
                                </div>



                            </div>










                            <div class="row py-2">
                                <div class="input-group col-sm-4 ">
                                    <div class="rdform row mt-3 ml-1">
                                        <input id="OPTCASH" type="radio" class="rainput" name="hopping"
                                            value="">
                                        <label class="ralabel mx-2" for="OPTCASH"><span></span> Cash</label>
                                        <input id="OptCredit" type="radio" class="rainput" name="hopping"
                                            value="">
                                        <label class="ralabel  mx-2" for="OptCredit"><span></span>Credit</label>
                                        <input id="Optall" type="radio" class="rainput" name="hopping"
                                            value="" checked>
                                        <label class="ralabel  mx-2" for="Optall"><span></span>All</label>
                                        <div class="worm">
                                            @for ($i = 0; $i < 30; $i++)
                                                <div class="worm__segment"></div>
                                            @endfor
                                        </div>

                                    </div>
                                </div>

                                <div class="input-group col-sm-4 ml-2">
                                    <div class="rdform row mt-3 ml-3">
                                        <input id="OptDetail" type="radio" class="rainput" autocomplete="off"
                                            name="hopping2" value="" checked>
                                        <label class="ralabel mx-2" for="OptDetail"><span></span> DETAIL</label>
                                        <input id="OptSummary" type="radio" class="rainput" autocomplete="off"
                                            name="hopping2" value="">
                                        <label class="ralabel  mx-2" for="OptSummary"><span></span>SUMMARY</label>
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
                    <div class="col-lg-12 ">
                        <div class="row">

                            <div class="col-sm-6">
                                <div class="CheckBox1 mt-2 ml-2">
                                <label class="input=group text-info mx-4">
                                    <input type="checkbox" name="ChkAllWH"
                                        id="ChkAllWH" checked value=""> All
                                </label>
                            </div>
                                <div class="rounded shadow">
                                    <table class="table small" id="Departmenttable">
                                        <thead class="bg-info">
                                            <tr>
                                                <th>Select</th>
                                                <th>Department&nbsp;Name</th>
                                                <th>Department</th>
                                            </tr>
                                        </thead>
                                        <tbody id="Departmenttablebody">
                                            @foreach ($Deptsetup as $deptitem)
                                                <tr>
                                                    <td><input type="checkbox" name="" class="dgchk" id=""></td>
                                                    <td class="DepartmentCode">{{ $deptitem->Typecode }}</td>
                                                    <td>{{ $deptitem->TypeName }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="CheckBox1 mt-2 ml-2">
                                <label class="input-group text-info mx-4">
                                    <input type="checkbox" name="ChkPortALL"
                                        id="ChkPortALL" checked value=""> All
                                </label>
                            </div>
                                <div class="rounded shadow">
                                    <table class="table small" id="Porttable">
                                        <thead class="bg-info">
                                            <tr>
                                                <th>Select</th>
                                                <th>Port Name</th>

                                            </tr>
                                        </thead>
                                        <tbody id="Porttablebody">
                                            @foreach ($ShipingPortSetup as $ShipingPortitem)
                                            <tr>
                                                <td><input type="checkbox" name="" class="SelectPort" id=""></td>
                                                <td class="PortName">{{ $ShipingPortitem->PortName }}</td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div hidden class="row pt-3 ml-2">
                        <button class="btn btn-info mx-2" id="CmbSelUnSel" role="button">Select All</button>

                        <button class="btn btn-info mx-2" id="Button1" role="button">Unselect All</button>
                    </div>
                </div>
                    </div>













                        <div class="col-sm-12 pb-2">
                            <div class="rounded shadow table-responsive">
                                <table class="table" id="DG3">
                                    <thead class="">
                                        <tr>
                                            <th>Invoice&nbsp;#</th>
                                            <th>Invoice&nbsp;Date</th>
                                            <th>Vessel&nbsp;Name</th>
                                            <th>Customer&nbsp;Ref&nbsp;#</th>
                                            <th>Terms</th>
                                            <th>Department&nbsp;Name</th>
                                            <th>Status</th>
                                            <th>Purc&nbsp;Amt</th>
                                            <th>Return&nbsp;+&nbsp;Missing&nbsp;cost</th>
                                            <th>Pull&nbsp;Stock&nbsp;Amt.</th>
                                            <th>Net&nbsp;Cost&nbsp;Amt.</th>
                                            <th>Inv&nbsp;Disc&nbsp;%</th>
                                            <th>Inv&nbsp;Disc&nbsp;Amt.</th>
                                            <th>Cr&nbsp;Note&nbsp;%</th>
                                            <th>Cr&nbsp;Note&nbsp;Amt.</th>
                                            <th>Receivable&nbsp;Amt</th>
                                            <th>Received&nbsp;Amt</th>
                                            <th>Balance</th>
                                            <th>GP&nbsp;%</th>
                                            <th>GP&nbsp;Amount</th>
                                            <th>AVI&nbsp;Rebate&nbsp;%</th>
                                            <th>AVI&nbsp;Rebate&nbsp;Amt</th>
                                            <th>Agent&nbsp;Comm&nbsp;%</th>
                                            <th>Agent&nbsp;Comm&nbsp;Amt</th>
                                            <th>Sls&nbsp;Comm&nbsp;%</th>
                                            <th>Sls&nbsp;Comm&nbsp;Amt</th>
                                            <th>Net&nbsp;Sale&nbsp;Amt</th>



                                        </tr>
                                    </thead>
                                    <tbody id="DG3body">

                                    </tbody>
                                </table>
<div class="row">
    <input type="text" class="col-sm-1 ml-auto form-control" name="TxtTotPurcAmt" id="TxtTotPurcAmt">
    <input type="text" class="col-sm-1 form-control" name="TxtTotPurRetAmt" id="TxtTotPurRetAmt">
    <input type="text" class="col-sm-1 form-control" name="TxtPullStockAmt" id="TxtPullStockAmt">
    <input type="text" class="col-sm-1 mr-auto form-control" name="TxtTotNetCostAmt" id="TxtTotNetCostAmt">
    <input type="text" class="col-sm-1 mx-2 form-control" name="TxtTotInvDiscAmt" id="TxtTotInvDiscAmt">
    <input type="text" class="col-sm-1 form-control" name="TxtCrNoteAmt" id="TxtCrNoteAmt">
    <input type="text" class="col-sm-1 form-control" name="TxtInvoiceAmt" id="TxtInvoiceAmt">
    <input type="text" class="col-sm-1 form-control" name="TxtRecAmt" id="TxtRecAmt">
    <input type="text" class="col-sm-1 form-control" name="TxtBalanceAmt" id="TxtBalanceAmt">
    <div class="input-group col-sm-1">
        <div class="input-group-prepend">
            <span class="input-group-text" id="">Gp Amt :</span>
        </div>
        <input type="text" class=" form-control" name="TxtNPAmt" id="TxtNPAmt">
    </div>
    <input type="text" class="col-sm-1 form-control" name="TxtAVIRebaitAmt" id="TxtAVIRebaitAmt">
</div>
<div class="row">
    <div class="input-group col-sm-1 ml-auto">
        <div class="input-group-prepend">
            <span class="input-group-text" id="">Agent Comm :</span>
        </div>
        <input type="text" class=" form-control" name="TxtAgentCommAmt" id="TxtAgentCommAmt">
    </div>
    <div class="input-group col-sm-1 ml-auto">
        <div class="input-group-prepend">
            <span class="input-group-text" id="">Sls Comm :</span>
        </div>
        <input type="text" class=" form-control" name="TxtSlsCommAmt" id="TxtSlsCommAmt">
    </div>
    <div class="input-group col-sm-1 ml-auto">
        <div class="input-group-prepend">
            <span class="input-group-text" id="">Net Sale :</span>
        </div>
        <input type="text" class=" form-control" name="TxtNetSaleAmt" id="TxtNetSaleAmt">
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



                var table1 = $('#Departmenttable').DataTable({

                    scrollY: 300,
                    deferRender: true,
                    scroller: true,
                    paging: false,
                    info: false,
                    ordering: false,
                    searching: false,
                    responsive: true,


                });
                var table2 = $('#Porttable').DataTable({

                    scrollY: 300,
                    deferRender: true,
                    scroller: true,
                    paging: false,
                    info: false,
                    ordering: false,
                    searching: false,
                    responsive: true,


                });
                var table3 = $('#DG3').DataTable({

                    scrollY: 600,
                    scrollX: true,
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
                $('#TxtRvDateFrom').val(today);
                $('#TxtRVDateTo').val(today);

                $("#ChkAllVendor").change(function() {
                    // Check if the checkbox is checked
                    if ($(this).is(":checked")) {
                        // Disable the select element
                        $("#CmbVendor").prop("disabled", true);
                    } else {
                        // Enable the select element
                        $("#CmbVendor").prop("disabled", false);
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
                $("#CmbGodownName").change(function() {
                    var TxtGodownCode = $('#CmbGodownName').val();
                    $('#TxtGodownCode').val(TxtGodownCode);
                    // alert(TxtGodownCode);

                });

                $("#ChkGodownAll").change(function() {
  // Check if the checkbox is checked
  if ($(this).is(":checked")) {
    $("#CmbGodownName").prop("disabled", true);
    $('#blankCmbGodownName').show();
    // $("#CmbGodownName option:first").attr("selected", "selected");
    // Disable the select element
  } else {
    // Enable the select element
    $('#blankCmbGodownName').hide();
    // $("#CmbGodownName option:first").removeAttr("selected");
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
                    $('#TxtCustomerCode').val(custcode);
                    // alert(customer);
                    $('#searchrmod').modal('hide');
                    $("#CmbCustomer").prop("disabled", false);
                    $('#ChkAllCustomer').prop("checked", false)
                });



                $('#Button1').click(function(e) {
                    e.preventDefault();
                    $('#searchrmodw').modal('show');
                });


                $(document).on("dblclick", ".vesrow", function() {
                    var vesname = $(this).attr('data-vesname');
                    $('#CmbVessel').val(vesname);
                    // alert(customer);
                    $('#searchrmodw').modal('hide');
                    $("#CmbVessel").prop("disabled", false);
                    $('#AllVessel').prop("checked", false)
                });

                $('#Button8').click(function(e) {
                    e.preventDefault();
                    $('#AC_ledger').modal('show');
                });



                $('#CmdShow').click(function (e) {
                    e.preventDefault();
                    let qry = '';
                    if (!$('#chkallInvDate').is(':checked')) {
                        if (qry !== '') qry += ' and ';
                        qry += '"';
                        qry += " and InvDate>='" +$('#TxtDateFrom').val()+ "'  and InvDate<='"+$('#TxtDateTo').val()+"' ";


                        DateFrom = $('#TxtDateFrom').val();
                        DateTo = $('#TxtDateTo').val();
                      }

                      if (!$('#ChkAllRVDate').is(':checked')) {
                        if (qry !== '') qry += ' and ';
                        qry += "RVDate>='" + $('#TxtRvDateFrom').val() + "' and RVDate<='" + $('#TxtRVDateTo').val() + "'";
                        DateFrom = "Rcvd: " + $('#TxtRvDateFrom').val();
                        DateTo = "Rcvd: " + $('#TxtRVDateTo').val();
                      }

                      if (!$('#ChkGodownAll').is(':checked')) {
                        if (qry !== '') qry += ' and ';
                        qry += "GodownCode=" + parseInt($('#TxtGodownCode').val());
                      }

                      if (!$('#ChkAllCustomer').is(':checked')) {
                        if (qry !== '') qry += ' and ';
                        qry += "CustomerCode=" + parseInt($('#TxtCustomerCode').val());
                      }

                      if (!$('#AllVessel').is(':checked')) {
                        if (qry !== '') qry += ' and ';
                        qry += "VesselName='" + $('#CmbVessel').val() + "'";
                      }

                      if (!$('#ChkVSNAll').is(':checked')) {
                        if (qry !== '') qry += ' and ';
                        qry += "VSNNo=" + parseInt($('#TxtVSNNo').val());
                      }

                      if (!$('#ChkChargeALL').is(':checked')) {
                        if (qry !== '') qry += ' and ';
                        qry += "PONo=" + parseInt($('#TxtChargeNo').val());
                      }

                      if (!$('#ChkGpAll').is(':checked')) {
                        if (qry !== '') qry += ' and ';
                        qry += "GPPer>=" + parseFloat($('#txt_GpFrom').val()) + " and GPPer<=" + parseFloat($('#txt_GpTo').val());
                      }

                      let qry1 = "";

                      if (!$('#ChkAllWH').is(':checked')) {
                        let qry1 = "";
                        if (qry1 !== "") qry1 = "";

                        $('#Departmenttable tbody tr').each(function () {
                          if ($(this).find('.dgchk').is(':checked')) {
                            if (qry1 !== "") qry1 += ",";
                            qry1 += $(this).find('.DepartmentCode').text();
                          }
                        });

                        if (qry !== '') qry += ' and ';
                        qry += "DepartmentCode in (" + qry1 + ")";
                      }

                      let Qry2 = "";

                      if (!$('#ChkPortALL').is(':checked')) {
                        let Qry2 = "";
                        if (Qry2 !== "") Qry2 = "";

                        $('#Porttable tbody tr').each(function () {
                          if ($(this).find('.SelectPort').is(':checked')) {
                            if (Qry2 !== "") Qry2 += ",";
                            Qry2 += "'" + $(this).find('.PortName').text() + "'";
                          }
                        });

                        if (qry !== '') qry += ' and ';
                        qry += "PortName in (" + Qry2 + ")";
                      }

                      if ($('#OPTCASH').is(':checked')) {
                        if (qry !== '') qry += ' and ';
                        qry += "Terms='CASH'";
                      } else if ($('#OptCredit').is(':checked')) {
                        if (qry !== '') qry += ' and ';
                        qry += "Terms<>'CASH'";
                      } else if ($('#Optall').is(':checked')) {
                        // All option
                      }
                      qry += '"';

                      console.log(qry);

                      ajaxSetup();
                $.ajax({
                    url: '/NetProfitReportsearch',
                    type: 'POST',
                    data: {
                        qry,

                    },
                    beforeSend: function() {
                        // Show the overlay and spinner before sending the request
                        $('.overlay').show();
                    },
                    success: function(resposne) {
                        console.log(resposne);
                        let data = resposne.TempProfitReport;
                        let table = document.getElementById('DG3');
                        var MLastGodownCode = "";
                        var MLastCustomerCode = "";
                        var TxtTotPurcAmt = 0;
                        var TxtTotPurRetAmt = 0;
                        var TxtPullStockAmt = 0;
                        var TxtTotNetCostAmt= 0;
                        var TxtTotInvDiscAmt = 0;
                        var TxtInvoiceAmt = 0;
                        var TxtRecAmt = 0;
                        var TxtBalanceAmt= 0;
                        var TxtNPAmt = 0;
                        var TxtCrNoteAmt = 0;
                        var TxtAVIRebaitAmt = 0;
                        var TxtAgentCommAmt = 0;
                        var TxtSlsCommAmt = 0;
                        var TxtNetSaleAmt = 0;
                        table.innerHTML = ""; // Clear the table




                        data.forEach(function(item) {



                            var MCustomerCode = item.CustomerCode ? item.CustomerCode : '';
                            var MCustomerName = item.CustomerName ? item.CustomerName : '';
                            var MGodownCode = item.GodownCode ? item.GodownCode : '';
                            var MGodownName = item.GodownName ? item.GodownName : '';

                        if(parseInt(MLastGodownCode) !== parseInt(MGodownCode)){
                            let row = table.insertRow();

                            function createCell(content) {
                            let cell = row.insertCell();
                            cell.innerHTML = content;
                            return cell;
                            }
                            row.style.backgroundColor = '#E6E6FA';
                                row.style.backgroundColor = '#800000';

                                MLastGodownCode = MGodownCode;
                                createCell('');
                                createCell('');
                                createCell('');
                                createCell('');
                                createCell('');
                                createCell(MGodownName);
                                createCell('');
                                createCell('');
                                createCell('');
                                createCell('');
                                createCell('');
                                createCell('');
                                createCell('');
                                createCell('');
                                createCell('');
                                createCell('');
                                createCell('');
                                createCell('');
                                createCell('');
                                createCell('');
                                createCell('');
                                createCell('');
                                createCell('');
                                createCell('');
                                createCell('');
                                createCell('');




                                if(parseInt(MLastCustomerCode) !== parseInt(MCustomerCode)){

                                    let row = table.insertRow();

                                    function createCell(content) {
                                    let cell = row.insertCell();
                                    cell.innerHTML = content;
                                    return cell;
                                    }
                                    row.style.backgroundColor = '#ADD8E6';
                                    row.style.backgroundColor = '#000080';
                                    MLastCustomerCode = MCustomerCode;

                                        createCell('');
                                        createCell('');
                                        createCell('');
                                        createCell(MCustomerName);
                                        createCell('');
                                        createCell('');
                                        createCell('');
                                        createCell('');
                                        createCell('');
                                        createCell('');
                                        createCell('');
                                        createCell('');
                                        createCell('');
                                        createCell('');
                                        createCell('');
                                        createCell('');
                                        createCell('');
                                        createCell('');
                                        createCell('');
                                        createCell('');
                                        createCell('');
                                        createCell('');
                                        createCell('');
                                        createCell('');
                                        createCell('');
                                        createCell('');




                                }
                            }

                            let row = table.insertRow();

                            function createCell(content) {
                            let cell = row.insertCell();
                            cell.innerHTML = content;
                            return cell;
                            }


                            createCell(item.ChargeNo);
                            var odate = new Date(item.InvoiceDate);
                            const InvoiceDate = odate.toISOString().substring(0, 10);
                            createCell(InvoiceDate);
                            createCell(item.VesselName);
                            createCell(item.CustomerRefNo);
                            createCell(item.Terms);
                            createCell(item.DepartmentName);
                            createCell(item.Status);
                            createCell(item.PurcAmt);
                            createCell(item.PurcReturnAmt);
                            createCell(item.PullStockAmt);
                            createCell(item.NetCostAmt);

                            TxtTotPurcAmt += item.PurcAmt ? parseFloat(item.PurcAmt) : 0;
                            TxtTotPurRetAmt += item.PurcReturnAmt ? parseFloat(item.PurcReturnAmt) : 0;
                            TxtPullStockAmt += item.PullStockAmt ? parseFloat(item.PullStockAmt) : 0;
                            TxtTotNetCostAmt += item.NetCostAmt ? parseFloat(item.NetCostAmt) : 0;

                            createCell(item.InvDiscPer);
                            createCell(item.InvDiscAmt);
                            createCell(item.CrNotePer);
                            createCell(item.CrNoteAmount);
                            createCell(item.InvoiceAmt);
                            createCell(item.ReceivedAmt);
                            createCell(item.Balance);
                            createCell(item.GPPer);
                            createCell(item.GPAmount);
                            createCell(item.AVIRebatePer);
                            createCell(item.AVIRebateAmt);
                            createCell(item.AgentCommPer);
                            createCell(item.AgentCommAmt);
                            createCell(item.SlsCommPer);
                            createCell(item.SlsCommAmt);
                            createCell(item.NetSaleAmt);

                            TxtTotInvDiscAmt +=item.InvDiscAmt ? parseFloat(item.InvDiscAmt) : 0;
                            TxtInvoiceAmt += item.InvDiscAmt ? parseFloat(item.InvoiceAmt) : 0;
                            TxtRecAmt += item.InvDiscAmt ? parseFloat(item.ReceivedAmt) : 0;
                            TxtBalanceAmt += item.InvDiscAmt ? parseFloat(item.Balance) : 0;
                            TxtNPAmt += item.InvDiscAmt ? parseFloat(item.GPAmount) : 0;
                            TxtCrNoteAmt += item.InvDiscAmt ? parseFloat(item.CrNoteAmt) : 0;
                            TxtAVIRebaitAmt += item.InvDiscAmt ? parseFloat(item.AVIRebateAmt) : 0;
                            TxtAgentCommAmt += item.InvDiscAmt ? parseFloat(item.AgentCommAmt) : 0;
                            TxtSlsCommAmt += item.InvDiscAmt ? parseFloat(item.SlsCommAmt) : 0;
                            TxtNetSaleAmt +=item.InvDiscAmt ? parseFloat(item.NetSaleAmt) : 0;




                        });

                        $('#TxtTotPurcAmt').val(TxtTotPurcAmt.toFixed(2));
                        $('#TxtTotPurRetAmt').val(TxtTotPurRetAmt.toFixed(2));
                        $('#TxtPullStockAmt').val(TxtPullStockAmt.toFixed(2));
                        $('#TxtTotNetCostAmt').val(TxtTotNetCostAmt.toFixed(2));
                        $('#TxtTotInvDiscAmt').val(TxtTotInvDiscAmt.toFixed(2));
                        $('#TxtInvoiceAmt').val(TxtInvoiceAmt.toFixed(2));
                        $('#TxtRecAmt').val(TxtRecAmt.toFixed(2));
                        $('#TxtBalanceAmt').val(TxtBalanceAmt.toFixed(2));
                        $('#TxtNPAmt').val(TxtNPAmt.toFixed(2));
                        $('#TxtCrNoteAmt').val(TxtCrNoteAmt.toFixed(2));
                        $('#TxtAVIRebaitAmt').val(TxtAVIRebaitAmt.toFixed(2));
                        $('#TxtAgentCommAmt').val(TxtAgentCommAmt.toFixed(2));
                        $('#TxtSlsCommAmt').val(TxtSlsCommAmt.toFixed(2));
                        $('#TxtNetSaleAmt').val(TxtNetSaleAmt.toFixed(2));

                        let row = table.insertRow();

                        function createCell(content) {
                        let cell = row.insertCell();
                        cell.innerHTML = content;
                        return cell;
                        }
                        row.style.backgroundColor = '#90EE90';
                        row.style.backgroundColor = 'blue';
                        createCell('');
                        createCell('');
                        createCell('');
                        createCell('');
                        createCell('');
                        createCell('');
                        createCell('');
                        createCell('');
                        createCell('');
                        createCell('');
                        createCell('');
                        createCell('');
                        createCell('');
                        createCell('');
                        createCell('');
                        createCell('');
                        createCell('');
                        createCell(TxtTotInvDiscAmt);
                        createCell(TxtInvoiceAmt);
                        createCell(TxtRecAmt);
                        createCell(TxtBalanceAmt);
                        createCell(TxtNPAmt);
                        createCell(TxtCrNoteAmt);
                        createCell(TxtAVIRebaitAmt);
                        createCell(TxtAgentCommAmt);
                        createCell(TxtSlsCommAmt);
                        createCell(TxtNetSaleAmt);


                    },
                    error: function(data) {
                        console.log(data);
                        $('.overlay').hide();
                    },
                    complete: function() {
                        $('.overlay').hide();
                        // Hide the overlay and spinner after the request is complete
                    }
                });




                    });
//                 $('#CmdShow').click(function (e) {
//     e.preventDefault();

//     let qry = {
//         invDateFrom: $('#TxtDateFrom').val(),
//         invDateTo: $('#TxtDateTo').val(),
//         rvDateFrom: $('#TxtRvDateFrom').val(),
//         rvDateTo: $('#TxtRVDateTo').val(),
//         godownCode: $('#TxtGodownCode').val(),
//         customerCode: $('#TxtCustomerCode').val(),
//         vesselName: $('#CmbVessel').val(),
//         vsnNo: $('#TxtVSNNo').val(),
//         chargeNo: $('#TxtChargeNo').val(),
//         gpFrom: $('#txt_GpFrom').val(),
//         gpTo: $('#txt_GpTo').val(),
//         departments: [],
//         ports: [],
//         terms: ''
//     };


//     if (!$('#chkallInvDate').is(':checked')) {
//         qry.invDateFrom = "InvDate>='" + qry.invDateFrom + "'";
//         qry.invDateTo = "InvDate<='" + qry.invDateTo + "'";
//     }

//     if (!$('#ChkAllRVDate').is(':checked')) {
//         qry.rvDateFrom = "RVDate>='" + qry.rvDateFrom + "'";
//         qry.rvDateTo = "RVDate<='" + qry.rvDateTo + "'";
//     }

//     if (!$('#ChkGodownAll').is(':checked')) {
//         qry.godownCode = "GodownCode=" + parseInt(qry.godownCode);
//     }

//     if (!$('#ChkAllCustomer').is(':checked')) {
//         qry.customerCode = "CustomerCode=" + parseInt(qry.customerCode);
//     }

//     if (!$('#AllVessel').is(':checked')) {
//         qry.vesselName = "VesselName='" + qry.vesselName + "'";
//     }

//     if (!$('#ChkVSNAll').is(':checked')) {
//         qry.vsnNo = "VSNNo=" + parseInt(qry.vsnNo);
//     }

//     if (!$('#ChkChargeALL').is(':checked')) {
//         qry.chargeNo = "PONo=" + parseInt(qry.chargeNo);
//     }

//     if (!$('#ChkGpAll').is(':checked')) {
//         qry.gpFrom = "GPPer>=" + parseFloat(qry.gpFrom);
//         qry.gpTo = "GPPer<=" + parseFloat(qry.gpTo);
//     }

//     if (!$('#ChkAllWH').is(':checked')) {
//         $('#Departmenttable tbody tr').each(function () {
//             if ($(this).find('.dgchk').is(':checked')) {
//                 qry.departments.push($(this).find('.DepartmentCode').text());
//             }
//         });
//     }

//     if (!$('#ChkPortALL').is(':checked')) {
//         $('#Porttable tbody tr').each(function () {
//             if ($(this).find('.SelectPort').is(':checked')) {
//                 qry.ports.push($(this).find('.PortName').text());
//             }
//         });
//     }

//     if ($('#OPTCASH').is(':checked')) {
//         qry.terms = "Terms='CASH'";
//     } else if ($('#OptCredit').is(':checked')) {
//         qry.terms = "Terms<>'CASH'";
//     } else if ($('#Optall').is(':checked')) {
//         // All option
//     }

//     let qryString = JSON.stringify(qry);
//     console.log(qryString);

//     ajaxSetup();
//     $.ajax({
//         url: '/NetProfitReportsearch',
//         type: 'POST',
//         data: {
//             qry: qryString,
//         },
//         beforeSend: function() {
//             // Show the overlay and spinner before sending the request
//             $('.overlay').show();
//         },
//         success: function(response) {
//             console.log(response);
//         },
//         error: function(data) {
//             console.log(data);
//             $('.overlay').hide();
//         },
//         complete: function() {
//             $('.overlay').hide();
//             // Hide the overlay and spinner after the request is complete
//         }
//     });
// });









            });
        </script>




    @stop


    @section('content')
