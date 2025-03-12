@extends('layouts.app')



@section('title', 'AVI Rebate Report')

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
                        <h3 class="text-center">AVI Rebate Report</h3>
                    </b>

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">



                            <div class="row py-2 ">


                                <div class="inputbox col-sm-5 ml-1">
                                    <input type="date" class="" id="TxtDateFrom" required="required">
                                    <span class="Txtspan">
                                        Invoice Date From
                                    </span>
                                </div>

                                <div class="inputbox col-sm-5">
                                    <input type="date" class="" id="TxtDateTo" required="required">
                                    <span class="Txtspan">
                                        To
                                    </span>
                                </div>
                                <div class="CheckBox1 mt-2 ml-2">
                                    <label class="input-group text-info">
                                        <input type="checkbox" name="chkallInvDate" id="chkallInvDate" value=""> All
                                    </label>
                                </div>




                            </div>

                            <div class="row py-2 ">


                                <div class="inputbox col-sm-5 ml-1">
                                    <input type="date" class="" id="TxtRvDateFrom" required="required">
                                    <span class="Txtspan">
                                        Rv Date From
                                    </span>
                                </div>

                                <div class="inputbox col-sm-5">
                                    <input type="date" class="" id="TxtRVDateTo" required="required">
                                    <span class="Txtspan">
                                        To
                                    </span>
                                </div>



                                <div class="CheckBox1 mt-2 ml-2">
                                    <label class="input-group text-info">
                                        <input type="checkbox" name="ChkAllRVDate" id="ChkAllRVDate" checked value="">
                                        All
                                    </label>
                                </div>



                            </div>
                            <div class="row py-2">
                                <input type="hidden" class=" " id="TxtCustomerCode" required="required">

                                <div class="inputbox col-sm-10">
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
                                    <label class="input-group text-info">
                                        <input type="checkbox" name="ChkAllCustomer" id="ChkAllCustomer" checked
                                            value=""> All
                                    </label>
                                </div>
                            </div>
                            <div class="row py-2">



                                <input type="hidden" class=" " id="TxtVesselCode" disabled required="required">

                                <div class="inputbox col-sm-10">
                                    <input type="text" class="" id="CmbVessel" disabled required="required">
                                    <span class="Txtspan">
                                        Vessel Name
                                    </span>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text bg-info" style="cursor: pointer;" id="Button1"><i
                                            class="fas fa-search"></i></span>
                                </div>
                                <div class="CheckBox1 mt-2 ml-2">
                                    <label class="input-group text-info mx-1">
                                        <input type="checkbox" name="AllVessel" id="AllVessel" checked value=""> All
                                    </label>
                                </div>
                            </div>

                            <div class="row py-2">
                                <button class="btn btn-success  mx-2" id="BtnFill" role="button"> <i
                                        class="fa fa-file-text mr-1" aria-hidden="true"></i>Show</button>

                                <button class="btn btn-primary mx-2" id="CmdPrint" role="button"> <i
                                        class="fa fa-print mr-1" aria-hidden="true"></i>Print</button>

                                <button class="btn btn-danger mx-2" id="CmdExit" role="button"> <i
                                        class="fa fa-door-open mr-1" aria-hidden="true"></i>Exit</button>
                            </div>

                        </div>

                        <div class="col-lg-4">
                            <div class="row py-2">

                                    <div class="inputbox col-sm-10">
                                        <select name="CmbPort" disabled id="CmbPort">
                                            @foreach ($ShipingPortSetup as $ShipingPortSetupitem)
                                                <option value="{{ $ShipingPortSetupitem->PortName }}">
                                                    {{ $ShipingPortSetupitem->PortName }}</option>
                                            @endforeach
                                        </select>
                                        <span class="Txtspan">
                                            Port
                                        </span>
                                    </div>

                                    <div class="CheckBox1 mt-2 ml-2">
                                        <label class="input-group text-info">
                                            <input type="checkbox" name="ChkPortALL"
                                                id="ChkPortALL" checked value=""> All
                                        </label>
                                    </div>
                            </div>
                            <div class="row py-2 ">


                                <div class="inputbox col-sm-10">
                                    <span class="Txtspan">
                                        VSN #
                                    </span>
                                    <input type="text" class="" disabled id="TxtVSNNo" required="required">
                                </div>

                                <div class="CheckBox1 mt-2 ml-2">
                                    <label class="input-group text-info">
                                        <input type="checkbox" name="ChkVSNAll" id="ChkVSNAll"
                                            checked value=""> All
                                    </label>
                                </div>
                            </div>
                                <div class="row py-2 ">

                                <div class="inputbox col-sm-10">
                                    <input type="text" class="" disabled id="TxtChargeNo" required="required">
                                    <span class="Txtspan">
                                        Charge #
                                    </span>
                                </div>


                                <div class="CheckBox1 mt-2 ml-2">
                                    <label class="input-group text-info">
                                        <input type="checkbox" name="ChkChargeALL" checked
                                            id="ChkChargeALL" value=""> All
                                    </label>
                                </div>



                            </div>

                            <div class="row py-2">
                                    <input type="hidden" class=" " id="TxtGodownCode" required="required">

                                    <div class="inputbox col-sm-10">
                                        <span class="Txtspan">
                                            Warehouse
                                        </span>
                                        <select name="CmbGodownName" disabled id="CmbGodownName">
                                            @foreach ($GodownSetup as $Godownitem)
                                                <option value="{{ $Godownitem->GodownCode }}">{{ $Godownitem->GodownName }}
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>

                                    <div class="CheckBox1 mt-2 ml-2">
                                        <label class="input-group text-info">
                                            <input type="checkbox" name="ChkGodownAll"
                                                id="ChkGodownAll" checked value=""> All
                                        </label>
                                    </div>
                            </div>












                            <div class="row py-2">
                                <div class="input-group col-sm-8 ">
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


                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="row py-2">



                                <div class="col-sm-12">
                                    <div class="CheckBox1 mt-2 ml-2">
                                    <label class="input-group text-info ">
                                        <input type="checkbox" name="ChkAllWH" id="ChkAllWH"
                                            checked value=""> All
                                    </label>
                                </div>
                                    <div class="rounded shadow">
                                        <table class="table small" id="DG2">
                                            <thead class="bg-info">
                                                <tr>
                                                    <th>Select</th>

                                                    <th>Department&nbsp;Name</th>
                                                    <th>Department&nbsp;Code</th>
                                                </tr>
                                            </thead>
                                            <tbody id="DG2body">
                                                @foreach ($Deptsetup as $deptitem)
                                                    <tr>
                                                        <td><input type="checkbox" class="DG2CHK" name=""
                                                                id="">
                                                        </td>

                                                        <td>{{ $deptitem->TypeName }}</td>
                                                        <td class="DG2DepartmentCode">{{ $deptitem->Typecode }}</td>
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









    <div class="col-lg-12 pb-5">
        <div class="row">



            <div class="col-sm-12">
                <div class="rounded shadow">
                    <table class="table " id="DG3">
                        <thead class="">
                            <tr>
                                <th>Invoice&nbsp;#</th>
                                <th>Invoice&nbsp;Date</th>
                                <th>Vessel&nbsp;Name</th>
                                <th>Customer&nbsp;Ref&nbsp;#</th>
                                <th hidden>Terms</th>
                                <th>Department&nbsp;Name</th>
                                <th hidden>Status</th>
                                <th hidden>Inv Disc Amt</th>
                                <th hidden>Inv Disc %</th>
                                <th hidden>Cr.Note %</th>
                                <th class="text-right">Cr&nbsp;Note&nbsp;Amt.</th>
                                <th hidden>Invoice Amt</th>
                                <th class="text-right">Net&nbsp;Sale&nbsp;Amt.</th>
                                <th class="text-right">Received&nbsp;Amt</th>
                                <th class="text-right">Balance</th>
                                <th hidden>Agent Comm %</th>
                                <th hidden>Agent Comm Amt</th>
                                <th hidden>Sls Comm %</th>
                                <th hidden>Sls Comm Amt</th>
                                <th>AVI&nbsp;Rebate&nbsp;%</th>
                                <th class="text-right">AVI&nbsp;Rebate&nbsp;Amt</th>



                            </tr>
                        </thead>
                        <tbody id="DG3body">

                        </tbody>
                    </table>
                    <div class="row py-2">
                        <div class="inputbox col-sm-1 ml-auto">
                            <input type="text" class="" id="TxtCrNoteAmt" required="required">
                            <span class="ml-2">
                                CrNoteAmt
                            </span>
                        </div>
                        <div class="inputbox col-sm-1 mr-auto">
                            <input type="text" class="" id="TxtSoldAmt"required="required">
                            <span class="ml-2">
                                SoldAmt
                            </span>
                        </div>
                        <div class="inputbox col-sm-1 ">
                            <input type="text" class="" id="TxtTOtalNetSaleAmount" required="required">
                            <span class="ml-2">
                                NetSaleAmt
                            </span>
                        </div>
                        <div class="inputbox col-sm-1 ">
                            <input type="text" class="" id="TxtRecAmt" required="required">
                            <span class="ml-2">
                                RecAmt
                            </span>
                        </div>
                        <div class="inputbox col-sm-1 mr-5">
                            <input type="text" class="" id="TxtBalanceAmt" required="required">
                            <span class="ml-2">
                                BalanceAmt
                            </span>
                        </div>
                        <div class="inputbox col-sm-1 ml-5">
                            <input type="text" class="" id="TxtAVIRebateAmt"required="required">
                            <span class="ml-2">
                                AVIRebateAmt
                            </span>
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



            var table2 = $('#DG2').DataTable({

                scrollY: 200,
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
                deferRender: true,
                scroller: true,
                paging: false,
                info: false,
                ordering: false,
                searching: false,
                responsive: true,


            });

            // table1.column.adjust();



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




            $("#ChkPortALL").change(function() {
                // Check if the checkbox is checked
                if ($(this).is(":checked")) {
                    // Disable the select element
                    $("#CmbPort").prop("disabled", true);
                } else {
                    // Enable the select element
                    $("#CmbPort").prop("disabled", false);
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

            $('#BtnFill').click(function(e) {
                e.preventDefault();

                var Qry = "Status='INVOICED' and AVIRebatePer>0";

                if (!$("#chkallInvDate").is(":checked")) {
                    if (Qry !== "") Qry += " and ";
                    Qry += "InvDate>='" + $("#TxtDateFrom").val() + "' and InvDate<='" + $("#TxtDateTo")
                        .val() + "'";
                    DateFrom = $("#TxtDateFrom").val();
                    DateTo = $("#TxtDateTo").val();
                }

                if (!$("#ChkAllRVDate").is(":checked")) {
                    if (Qry !== "") Qry += " and ";
                    Qry += "RVDate>='" + $("#TxtRvDateFrom").val() + "' and RVDate<='" + $("#TxtRVDateTo")
                        .val() + "'";
                    DateFrom = "Rcvd: " + $("#TxtRvDateFrom").val();
                    DateTo = "Rcvd: " + $("#TxtRVDateTo").val();
                }

                if (!$("#ChkGodownAll").is(":checked")) {
                    if (Qry !== "") Qry += " and ";
                    Qry += "GodownCode=" + parseInt($("#TxtGodownCode").val());
                }

                if (!$("#ChkAllCustomer").is(":checked")) {
                    if (Qry !== "") Qry += " and ";
                    Qry += "CustomerCode=" + parseInt($("#TxtCustomerCode").val());
                }

                if (!$("#AllVessel").is(":checked")) {
                    if (Qry !== "") Qry += " and ";
                    Qry += "VesselName='" + $("#CmbVessel").val() + "'";
                }

                if (!$("#ChkVSNAll").is(":checked")) {
                    if (Qry !== "") Qry += " and ";
                    Qry += "VSNNo=" + parseInt($("#TxtVSNNo").val());
                }

                if (!$("#ChkPortALL").is(":checked")) {
                    if (Qry !== "") Qry += " and ";
                    Qry += "Port='" + $("#CmbPort").val() + "'";
                }

                if (!$("#ChkChargeALL").is(":checked")) {
                    if (Qry !== "") Qry += " and ";
                    Qry += "ChargeNo=" + parseInt($("#TxtChargeNo").val());
                }

                if (!$('#ChkAllWH').is(':checked')) {
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

                if ($("#OPTCASH").is(":checked")) {
                    if (Qry !== "") Qry += " and ";
                    Qry += "Terms='CASH'";
                } else if ($("#OptCredit").is(":checked")) {
                    if (Qry !== "") Qry += " and ";
                    Qry += "Terms<>'CASH'";
                } else if ($("#Optall").is(":checked")) {

                }


                ajaxSetup();

                $.ajax({
                    url: '/AviRebaterepShow',
                    type: 'POST',
                    data: {
                        Qry,
                    },
                    beforeSend: function() {
                        // Show the overlay and spinner before sending the request
                        $('.overlay').show();
                    },
                    success: function(resposne) {
                        console.log(resposne);
                        let data = resposne.Table;
                        var MCustomerCode = '';
                        var MCustomerName = '';
                        var MGodownCode = '';
                        var MGodownName = '';
                        var MLastGodownCode = '';
                        var MLastCustomerCode = '';
                        var MInvDiscAmt = 0;
                        var MInvoiceAmt = 0;
                        var MReceivedAmt = 0;
                        var MBalance = 0;
                        var MCrNoteAmt = 0;
                        var MAgentCommAmt = 0;
                        var MAVIRebateAmt = 0;
                        var MSlsCommAmt = 0;
                        var MNetSaleAmt = 0;
                        let table = document.getElementById('DG3body');
                        table.innerHTML = ""; // Clear the table
                        data.forEach(function(item) {

                            MCustomerCode = item.CustomerCode ? item.CustomerCode : '';
                            MCustomerName = item.CustomerName ? item.CustomerName : '';


                            MGodownCode = item.GodownCode ? item.GodownCode : '';
                            MGodownName = item.GodownName ? item.GodownName : '';

                            if (parseInt(MLastGodownCode) !== parseInt(MGodownCode)) {
                                let roww = table.insertRow();
                                roww.style.color = 'Maroon';
                                roww.style.backgroundColor = 'lavender';


                                function createCellw(content) {
                                    let cellw = roww.insertCell();
                                    cellw.innerHTML = content;
                                    return cellw;
                                }

                                MLastGodownCode = MGodownCode;
                                createCellw('');
                                createCellw('');
                                createCellw('');
                                createCellw('');
                                createCellw('').hidden = 'true';
                                createCellw(MGodownName);
                                createCellw('').hidden = 'true';
                                createCellw('').hidden = 'true';
                                createCellw('').hidden = 'true';
                                createCellw('').hidden = 'true';
                                createCellw('');
                                createCellw('').hidden = 'true';
                                createCellw('');
                                createCellw('');
                                createCellw('');
                                createCellw('').hidden = 'true';
                                createCellw('').hidden = 'true';
                                createCellw('').hidden = 'true';
                                createCellw('').hidden = 'true';
                                createCellw('');
                                createCellw('');


                                if (parseInt(MLastCustomerCode) !== parseInt(
                                        MCustomerCode)) {
                                    let rows = table.insertRow();
                                    rows.style.color = 'Navy';
                                    rows.style.backgroundColor = 'LightBlue';
                                    MLastCustomerCode = MCustomerCode;

                                    function createCellq(content) {
                                        let cells = rows.insertCell();
                                        cells.innerHTML = content;
                                        return cells;
                                    }
                                    createCellq('');
                                    createCellq('');
                                    createCellq('');
                                    createCellq(MCustomerName);
                                    createCellq('').hidden = 'true';
                                    createCellq('');
                                    createCellq('').hidden = 'true';
                                    createCellq('').hidden = 'true';
                                    createCellq('').hidden = 'true';
                                    createCellq('').hidden = 'true';
                                    createCellq('');
                                    createCellq('').hidden = 'true';
                                    createCellq('');
                                    createCellq('');
                                    createCellq('');
                                    createCellq('').hidden = 'true';
                                    createCellq('').hidden = 'true';
                                    createCellq('').hidden = 'true';
                                    createCellq('').hidden = 'true';
                                    createCellq('');
                                    createCellq('');



                                }

                            }
                            let row = table.insertRow();
                            var Balance = parseFloat(item.NetSaleAmt ? item.NetSaleAmt :
                                0) - (item.ReceivedAmt ? item.ReceivedAmt : 0)
                            if (Balance > 0) {
                                row.style.color = 'red';
                            } else {
                                row.style.color = 'green';
                            }

                            function createCell(content) {
                                let cell = row.insertCell();
                                cell.innerHTML = content;
                                return cell;
                            }

                            createCell(item.ChargeNo ? item.ChargeNo : '');
                            var odate = new Date(item.InvoiceDate ? item.InvoiceDate :
                                '');
                            const Invdate = odate.toISOString().substring(0, 10);
                            createCell(Invdate);
                            createCell(item.VesselName ? item.VesselName : '');
                            createCell(item.CustomerRefNo ? item.CustomerRefNo : '');
                            createCell(item.Terms ? item.Terms : '').hidden = 'true';
                            createCell(item.DepartmentName ? item.DepartmentName : '');
                            createCell(item.Status ? item.Status : '').hidden = 'true';
                            createCell(item.InvDiscAmt ? item.InvDiscAmt : '').hidden =
                                'true';
                            MInvDiscAmt += item.InvDiscAmt ? item.InvDiscAmt : 0;
                            createCell(item.InvDiscPer ? item.InvDiscPer : '').hidden =
                                'true';
                            createCell(item.CrNotePer ? item.CrNotePer : '').hidden =
                                'true';
                            let CrNoteAmtcol = createCell(item.CrNoteAmt ? item
                                .CrNoteAmt : '');
                            CrNoteAmtcol.style.textAlign = 'right';

                            MCrNoteAmt += item.CrNoteAmt ? item.CrNoteAmt : 0;
                            createCell(item.InvoiceAmt ? parseFloat(item.InvoiceAmt)
                                .toFixed(2) : '').hidden = 'true';
                            MInvoiceAmt += item.InvoiceAmt ? item.InvoiceAmt : 0;
                            let NetSaleAmtcol = createCell(item.NetSaleAmt ? parseFloat(
                                item.NetSaleAmt).toFixed(2) : '');
                            NetSaleAmtcol.style.textAlign = 'right';

                            MNetSaleAmt += item.NetSaleAmt ? item.NetSaleAmt : 0;
                            let ReceivedAmtcol = createCell(item.ReceivedAmt ?
                                parseFloat(item.ReceivedAmt).toFixed(2) : '');
                            ReceivedAmtcol.style.textAlign = 'right';

                            MReceivedAmt += item.ReceivedAmt ? item.ReceivedAmt : 0;
                            let Balancecol = createCell(Balance ? parseFloat(Balance)
                                .toFixed(2) : 0);
                            Balancecol.style.textAlign = 'right';
                            MBalance += Balance ? Balance : 0;
                            createCell(item.AgentCommPer ? item.AgentCommPer : '')
                                .hidden = 'true';
                            createCell(item.AgentCommAmt ? item.AgentCommAmt : '')
                                .hidden = 'true';
                            MAgentCommAmt += item.AgentCommAmt ? item.AgentCommAmt : 0;

                            createCell(item.SlsCommPer ? parseFloat(item.SlsCommPer)
                                .toFixed(2) : '').hidden = 'true';
                            createCell(item.SlsCommAmt ? parseFloat(item.SlsCommAmt)
                                .toFixed(2) : '').hidden = 'true';
                            MSlsCommAmt += item.SlsCommAmt ? item.SlsCommAmt : 0;

                            createCell(item.AVIRebatePer ? parseFloat(item.AVIRebatePer)
                                .toFixed(2) : '');
                            let AVIRebateAmtcol = createCell(item.AVIRebateAmt ?
                                parseFloat(item.AVIRebateAmt).toFixed(2) : '');
                            AVIRebateAmtcol.style.textAlign = 'right';
                            MAVIRebateAmt += item.AVIRebateAmt ? item.AVIRebateAmt : 0;


                        });
                        $('#TxtCrNoteAmt').val(parseFloat(MCrNoteAmt).toFixed(2));
                        $('#TxtTOtalNetSaleAmount').val(parseFloat(MNetSaleAmt).toFixed(2));
                        $('#TxtSoldAmt').val(parseFloat(MInvoiceAmt).toFixed(2));
                        $('#TxtRecAmt').val(parseFloat(MReceivedAmt).toFixed(2));
                        $('#TxtBalanceAmt').val(parseFloat(MBalance).toFixed(2));
                        $('#TxtAVIRebateAmt').val(parseFloat(MAVIRebateAmt).toFixed(2));
                        table3.columns.adjust();

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
