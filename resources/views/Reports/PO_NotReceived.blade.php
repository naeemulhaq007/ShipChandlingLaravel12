@extends('layouts.app')



@section('title', 'PO-Not-Received-Report')

@section('content_header')

@stop

@section('content')
    <?php echo View::make('partials.impalistitemmodal'); ?>
    <?php echo View::make('partials.itemsearchmodal'); ?>
    <?php echo View::make('partials.search'); ?>
    <?php echo View::make('partials.searchves'); ?>

    </div>

    <div class="container-fluid ">

        <div class="col-lg-12">
            <div class="row">

            </div>

            <div class="card mt-3">
                <div class="card-header">
                    <div class="card-tools ">


                        <button type="button" name="headertoggle" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                    <b>
                        <h3 class="text-center">PO Not Received Report</h3>
                    </b>

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">



                            <div class="row py-2 ">

                                <div class="inputbox col-sm-5">
                                    <span class="Txtspan" id="">Date From</span>
                                    <input id='TxtDateFrom' type="date" value="">
                                </div>

                                <div class="inputbox col-sm-5">
                                    <span class="Txtspan" style="width:80px" id="">To</span>
                                    <input id='TxtDateTo' type="date" value="">
                                </div>

                            </div>





                            <div class="row py-2">

                                <div class="inputbox col-sm-10">
                                    <span class="Txtspan" id="">Department</span>
                                    <select id="CmbDepartment" disabled name="CmbDepartment">
                                    </select>
                                </div>

                                <div class="CheckBox1 mt-2 ml-2">
                                    <label class="input-group text-info mx-1">
                                        <input class="" type="checkbox" name="ChkAllDepartment" id="ChkAllDepartment"
                                            checked value=""> All
                                    </label>
                                </div>

                            </div>

                            <div class="row py-2">

                                <div class="inputbox col-sm-10">
                                    <span class="Txtspan" id="">Customer</span>
                                    <input type="text" name="CmbCustomer" disabled id="CmbCustomer">
                                </div>

                                <button class="btn btn-info" style="cursor: pointer;" id="opnCustomer"><i
                                        class="fas fa-search    "></i></button>

                                <div class="CheckBox1 mt-2 ml-2">
                                    <label class="input-group text-info mx-1">
                                        <input type="checkbox" name="ChkAllCustomer" id="ChkAllCustomer" checked
                                            value=""> All
                                    </label>
                                </div>

                                <div class="inputbox col-sm-2">
                                    <input type="hidden" name="TxtCustomerCode" id="TxtCustomerCode">
                                </div>
                            </div>

                            <div class="row py-2">
                                <div class="inputbox col-sm-10">
                                    <span class="Txtspan" id="">Vendor</span>
                                    <select id="CmbVendor" disabled name="CmbVendor">
                                    </select>


                                </div>
                                <div class="CheckBox1 mt-2 ml-2">
                                    <label class="input-group text-info mx-1">
                                        <input type="checkbox" name="ChkAllVendor" id="ChkAllVendor" checked value="">
                                        All
                                    </label>
                                </div>

                            </div>



                            <div class="row py-2">
                                <div class="inputbox col-sm-10">
                                    <span class="Txtspan" id="">Vessel</span>
                                    <input type="text" name="txtVessel" id="txtVessel" readonly>


                                </div>
                                <div class="CheckBox1 mt-2 ml-2">
                                    <label class="input-group text-info mx-1">
                                        <input type="checkbox" name="ChkAllVessel" id="ChkAllVessel" checked value="">
                                        All
                                    </label>
                                </div>
                            </div>
                            <div class="row py-2 ml-1">
                                <button name="BtnFill" id="BtnFill" class="btn btn-success col-sm-2 mx-1"
                                    role="button"><i class="fa fa-file-text text-white" aria-hidden="true"></i>
                                    Report</button>

                                <button name="BtnExit" id="BtnExit" class="btn btn-danger col-sm-2 mx-1"
                                    href="/"role="button"><i class="fas fa-door-open   text-white"></i> Exit</button>
                            </div>

                        </div>



                        <div class="col-lg-6 ">
                            <div class="row py-2">
                                <div class="inputbox col-sm-10">
                                    <span class="Txtspan" id="">Terms</span>
                                    <select id="CmbTerms" disabled name="CmbTerms">
                                    </select>
                                </div>
                                <div class="CheckBox1 mt-2 ml-2">
                                    <label class="input-group text-info mx-1">
                                        <input type="checkbox" name="ChkTermsAll" id="ChkTermsAll" checked value="">
                                        All
                                    </label>
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="inputbox col-sm-5">
                                    <span class="Txtspan" id="">From VSN #
                                    </span>
                                    <input type="text" name="TxtVSNNoFrom" id="TxtVSNNoFrom" readonly>
                                </div>

                                <div class="inputbox col-sm-5">
                                    <span class="Txtspan" id="">To</span>
                                    <input type="text" name="TxtVSNNoTo" id="TxtVSNNoTo" readonly>
                                </div>

                                <div class="CheckBox1 mt-2 ml-2">
                                    <label class="input-group text-info mx-1">
                                        <input type="checkbox" name="ChkVSNAll" id="ChkVSNAll" checked value="">
                                        All
                                    </label>
                                </div>
                            </div>

                            <div class="row py-2">
                                <div class="inputbox col-sm-5">
                                    <span class="Txtspan" id="">From Charge #</span>
                                    <input type="text" name="TxtChargeNoFrom" id="TxtChargeNoFrom" readonly>
                                </div>

                                <div class="inputbox col-sm-5">
                                    <span class="Txtspan" id="">To</span>
                                    <input type="text" name="TxtChargeNoTo" id="TxtChargeNoTo" readonly>
                                </div>

                                <div class="CheckBox1 mt-2 ml-2">
                                    <label class="input-group text-info mx-1">
                                        <input type="checkbox" name="ChkChargeAll" id="ChkChargeAll" checked
                                            value=""> All
                                    </label>
                                </div>

                            </div>

                            <div class="row py-2">
                                <div class="inputbox col-sm-5">
                                    <span class="Txtspan" id="">From PO #</span>
                                    <input type="text" name="TxtPOFrom" id="TxtPOFrom" readonly>
                                </div>

                                <div class="inputbox col-sm-5">
                                    <span class="Txtspan" id="">To</span>
                                    <input type="text" name="TxtPOTo" id="TxtPOTo" readonly>
                                </div>
                                <div class="CheckBox1 mt-2 ml-2">
                                    <label class="input-group text-info mx-1">
                                        <input type="checkbox" name="ChkPOAll" id="ChkPOAll" checked value="">
                                        All
                                    </label>
                                </div>
                            </div>
                            <div class=" rdform row mt-2">

                                <input id="OptNotRvcd" type="radio" class="rainput" name="hopping" value=""
                                    checked>
                                <label class="ralabel mx-2" for="OptNotRvcd"><span></span>Not Rcvd</label>
                                <input id="OptOverQty" type="radio" class="rainput" name="hopping" value="">
                                <label class="ralabel  mx-2" for="OptOverQty"><span></span>Over Qty</label>

                                <div class="worm">
                                    @for ($i = 0; $i < 30; $i++)
                                        <div class="worm__segment"></div>
                                    @endfor



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
            transform: translateX(7.4em);
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
        $(document).ready(function() {
            var table1 = $('#Warehousetable').DataTable({
                scrollY: 410,
                deferRender: true,
                scroller: true,
                paging: false,
                info: false,
                ordering: false,
                searching: false,
            });

            var table2 = $('#Departmenttable').DataTable({
                scrollY: 410,
                deferRender: true,
                scroller: true,
                paging: false,
                info: false,
                ordering: false,
                searching: false,
            });


        });



        $(document).ready(function() {
            var chekdate = new Date();
            const Today = chekdate.toISOString().substring(0, 10);

            $('#TxtDateFrom').val(Today);
            $('#TxtDateTo').val(Today);
            $('#TxtDateETAFrom').val(Today);
            $('#TxtDateETATo').val(Today);

            $('#BtnFill').click(function(e) {

                e.preventDefault();

                let Qry = "";
                let Qry2 = "";

                Qry = "OrderDate>='" + $("#TxtDateFrom").val() + "' and OrderDate<='" + $("#TxtDateTo")
                    .val() + "' and BranchCode=" + parseFloat({{ $BranchCode }}) + "";

                if ($("#OptNotRvcd").is(":checked")) {
                    if (Qry2 !== "") Qry2 += " and ";
                    Qry2 += "NotRecQty>0";
                }

                if ($("#OptOverQty").is(":checked")) {
                    if (Qry2 !== "") Qry2 += " and ";
                    Qry2 += "OverQty>0";
                }

                if (!$("#ChkAllDepartment").is(":checked")) {
                    if (Qry !== "") Qry += " and ";
                    Qry += "Department='" + $("#CmbDepartment").val() + "'";
                }

                if (!$("#ChkAllCustomer").is(":checked")) {
                    if (Qry !== "") Qry += " and ";
                    Qry += "CustomerName='" + $("#CmbCustomer").val() + "'";
                }

                if (!$("#ChkAllVessel").is(":checked")) {
                    if (Qry !== "") Qry += " and ";
                    Qry += "VesselName='" + $("#CmbVessel").val() + "'";
                }

                if (!$("#ChkAllVendor").is(":checked")) {
                    if (Qry2 !== "") Qry2 += " and ";
                    Qry2 += "VendorName='" + $("#CmbVendor").val() + "'";
                }

                if (!$("#ChkTermsAll").is(":checked")) {
                    if (Qry !== "") Qry += " and ";
                    Qry += "Terms='" + $("#CmbTerms").val() + "'";
                }

                if (!$("#ChkVSNAll").is(":checked")) {
                    if (Qry !== "") Qry += " and ";
                    Qry += "VSNNo>='" + parseFloat($("#TxtVSNNoFrom").val()) + "' and VSNNo<='" +
                        parseFloat($("#TxtVSNNoTo").val()) + "'";
                }

                if (!$("#ChkChargeAll").is(":checked")) {
                    if (Qry !== "") Qry += " and ";
                    Qry += "ChargeNo>=" + parseFloat($("#TxtChargeNoFrom").val()) + " and ChargeNo<=" +
                        parseFloat($("#TxtChargeNoTo").val()) + "";
                }

                if (!$("#ChkPOAll").is(":checked")) {
                    if (Qry !== "") Qry += " and ";
                    Qry += "PurchaseOrderNo>=" + parseFloat($("#TxtPOFrom").val()) +
                        " and PurchaseOrderNo<=" + parseFloat($("#TxtPOTo").val()) + "";
                }




                console.log(Qry);
                console.log(Qry2);
                // window.location.href='/RFQ-C-Print?MInvNo='+MInvNo;

            });






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






            $("#ChkAllVessel").change(function() {
                // Check if the checkbox is checked
                if ($(this).is(":checked")) {
                    // Disable the select element
                    $("#txtVessel").prop("readonly", true);
                } else {
                    // Enable the select element
                    $("#txtVessel").prop("readonly", false);
                }
            });

            // $('#txtVessel').click(function (e) {
            //     alert();
            //     // e.preventDefault();
            // });



            $("#ChkVSNAll").change(function() {
                // Check if the checkbox is checked
                if ($(this).is(":checked")) {
                    // Disable the select element
                    $("#TxtVSNNoFrom").prop("readonly", true);
                    $("#TxtVSNNoTo").prop("readonly", true);
                } else {
                    // Enable the select element
                    $("#TxtVSNNoFrom").prop("readonly", false);
                    $("#TxtVSNNoTo").prop("readonly", false);
                }
            });



            $("#ChkTermsAll").change(function() {
                // Check if the checkbox is checked
                if ($(this).is(":checked")) {
                    // Disable the select element
                    $("#CmbTerms").prop("disabled", true);
                } else {
                    // Enable the select element
                    $("#CmbTerms").prop("disabled", false);
                }
            });




            $("#ChkChargeAll").change(function() {
                // Check if the checkbox is checked
                if ($(this).is(":checked")) {
                    // Disable the select element
                    $("#TxtChargeNoFrom").prop("disabled", true);
                    $("#TxtChargeNoTo").prop("disabled", true);
                } else {
                    // Enable the select element
                    $("#TxtChargeNoFrom").prop("disabled", false);
                    $("#TxtChargeNoTo").prop("disabled", false);
                }
            });




            $("#ChkPOAll").change(function() {
                // Check if the checkbox is checked
                if ($(this).is(":checked")) {
                    // Disable the select element
                    $("#TxtPOFrom").prop("disabled", true);
                    $("#TxtPOTo").prop("disabled", true);
                } else {
                    // Enable the select element
                    $("#TxtPOFrom").prop("disabled", false);
                    $("#TxtPOTo").prop("disabled", false);
                }
            });








            $('#opnCustomer').click(function(e) {
                e.preventDefault();
                $('#searchrmod').modal('show');
            });


            $(document).on("dblclick", ".js-click", function() {
                var customer = $(this).attr('data-cusname');
                var custcode = $(this).attr('data-custcode');
                $('#CmbCustomer').val(customer);
                $('#TxtCustomerCode').val(custcode);
                $('#searchbox').val(custcode);
                // alert(customer);
                $('#searchrmod').modal('hide');
                $("#CmbCustomer").prop("disabled", false);
                $('#ChkAllCustomer').prop("checked", false)
            });









            $('#txtVessel').click(function(e) {
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
















        });
    </script>




@stop


@section('content')
