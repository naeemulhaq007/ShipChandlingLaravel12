@extends('layouts.app')



@section('title', 'Return-Item-Report')

@section('content_header')

@stop

@section('content')
    <?php echo View::make('partials.AC_ledger'); ?>
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
                        <h3 class="text-center">Return Item Report</h3>
                    </b>

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">



                            <div class="row py-2 ">


                                <div class="inputbox col-sm-5">
                                    <span class="Txtspan">
                                        PO Rec Date
                                    </span>
                                    <input type="date" class="" id="TxtDateFrom" required="required">

                                </div>

                                <div class="inputbox col-sm-5">
                                    <span class="Txtspan">
                                        To
                                    </span>
                                    <input type="date" class="" id="TxtDateTo" required="required">

                                </div>





                            </div>
                            <div class="row py-2 ">


                                <div class="inputbox col-sm-5">
                                    <span class="Txtspan">
                                        Invoice From #
                                    </span>
                                    <input type="text" class="" id="TxtInvoiceNoFrom" disabled required="required">

                                </div>

                                <div class="inputbox col-sm-5">
                                    <span class="Txtspan">
                                        To
                                    </span>
                                    <input type="text" class="" id="TxtInvoiceNoTo" disabled required="required">

                                </div>


                                <div class="CheckBox1 mt-2 ml-2">
                                    <label class="input-group text-info mx-1">
                                        <input type="checkbox" name="ChkInvoiceAll" checked id="ChkInvoiceAll"
                                            value=""> All
                                    </label>
                                </div>



                            </div>
                            <div class="row py-2 ">


                                <div class="inputbox col-sm-5">
                                    <input type="date" class="" id="TxtDueDateFrom" disabled required="required">
                                    <span class="Txtspan">
                                        Due Date
                                    </span>
                                </div>

                                <div class="inputbox col-sm-5">
                                    <input type="date" class="" id="TxtDueDateTo" disabled required="required">
                                    <span class="Txtspan">
                                        To
                                    </span>
                                </div>



                                <div class="CheckBox1 mt-2 ml-2">
                                    <label class="input-group text-info mx-1">
                                        <input type="checkbox" name="ChkDueDateAll" checked id="ChkDueDateAll"
                                            value=""> All
                                    </label>
                                </div>



                            </div>
                            <div class="row py-2">


                                <div class="inputbox col-sm-10">
                                    <select name="CmbOkToPay" disabled id="CmbOkToPay">
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                    <span class="Txtspan">
                                        Ok to Pay
                                    </span>
                                </div>
                                {{-- <div class="dropdown ml-2">
                                        <button class="btn btn-info dropdown-toggle" type="button" id="CmbOkToPay"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Ok to Pay
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="CmbOkToPay">
                                            <button class="dropdown-item" type="button">Yes</button>
                                            <button class="dropdown-item" type="button">No</button>
                                        </div>
                                    </div> --}}


                                <div class="CheckBox1 mt-2 ml-2">
                                    <label class="input-group text-info mx-1">
                                        <input type="checkbox" name="ChkOkToPayAll" id="ChkOkToPayAll" checked
                                            value=""> All
                                    </label>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-6">

                            <div class="row">

                                <div class="inputbox col-sm-8 ">
                                    <span class="Txtspan">
                                        Only Dr.Note
                                    </span>
                                    <select name="CmbOnlyDrNote" disabled id="CmbOnlyDrNote">
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>


                                <div class="CheckBox1 mt-2 ml-2">
                                    <label class="input-group text-info mx-1">
                                        <input type="checkbox" name="CkhOnlyDrNote" id="CkhOnlyDrNote" checked
                                            value=""> All
                                    </label>
                                </div>
                            </div>


                            <div hidden class="inputbox col-sm-8">
                                <input type="text" class="" id="TxtVendorActCode" required="required">
                                <span class="Txtspan">
                                    Vendor Account code
                                </span>
                            </div>

                            <div class="row py-2">
                                <div hidden class="inputbox col-sm-2 ">
                                    <input type="text" class=" " id="TxtVendorCode" required="required">
                                    <span class="ml-2">
                                        Vnd.Code
                                    </span>
                                </div>
                                <div class="inputbox col-sm-8">
                                    <input type="text" class="" id="CmbVendor" disabled required="required">
                                    <span class="Txtspan">
                                        Vendor Name
                                    </span>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text bg-info" style="cursor: pointer;" id="Button2"><i
                                            class="fas fa-search"></i></span>
                                </div>
                                <div class="CheckBox1 mt-2 ml-2">
                                    <label class="input-group text-info mx-1">
                                        <input type="checkbox" name="ChkAllVendor" id="ChkAllVendor" checked
                                            value=""> All
                                    </label>
                                </div>
                                <button class="btn btn-info col-sm-2" id="Button8" role="button">A/c
                                    Ledger</button>

                            </div>

                            <div class="row py-2">



                                <input type="hidden" class=" " id="TxtVesselCode" required="required">

                                <div class="inputbox col-sm-8">
                                    <input type="text" class="" id="CmbVessel" disabled required="required">
                                    <span class="Txtspan">
                                        Vessel Name
                                    </span>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text bg-info" style="cursor: pointer;" id="Button1">
                                        <i class="fas fa-search"></i></span>
                                </div>
                                <div class="CheckBox1 mt-2 ml-2">
                                    <label class="input-group text-info mx-1">
                                        <input type="checkbox" name="AllVessel" id="AllVessel" checked value="">
                                        All
                                    </label>
                                </div>
                            </div>








                            <div class="row py-2">
                                <div class="input-group col-sm-12 ">


                                    <div class="rdform row mt-3 ml-1">
                                        <input id="OptUnclearInvoice" type="radio" class="rainput" name="hopping"
                                            value="">
                                        <label class="ralabel mx-2" for="OptUnclearInvoice"><span></span>Outstanding
                                            Invoices</label>
                                        <input id="OptClearInvoices" type="radio" class="rainput" name="hopping"
                                            value="">
                                        <label class="ralabel  mx-2" for="OptClearInvoices"><span></span>Paid
                                            Invoices</label>
                                        <input id="OptAll" type="radio" class="rainput" name="hopping"
                                            value="" checked>
                                        <label class="ralabel  mx-2" for="OptAll"><span></span>All Invoices</label>
                                        <div class="worm">
                                            @for ($i = 0; $i < 30; $i++)
                                                <div class="worm__segment"></div>
                                            @endfor

                                        </div>
                                    </div>

                                </div>
                            </div>










                        </div>





                        <!--<div class="row px-4 py-2">
                                                            <a name="BtnFill" id="BtnNewEvent" class="btn btn-outline-success" role="button"><i
                                                                    class="fa fa-file-text text-success" aria-hidden="true"></i> Show</a>
                                                        </div>-->
                        <div class="row px-4 py-2">
                            <button class="btn btn-success" id="CmdShow" role="button"> <i
                                    class="fa fa-file-text mr-2" aria-hidden="true"></i>Show</button>
                        </div>

                        <!--   <div class="row px-2 py-2">
                                                            <a name="BtnPrint" id="BTNPrint" class="btn btn-outline-primary" role="button"><i
                                                                    class="fa fa-print text-blue" aria-hidden="true"></i> Print</a>
                                                        </div>-->


                        <div class="row px-2 py-2">
                            <button class="btn btn-primary" id="BtnFill" role="button"> <i class="fa fa-print mr-1"
                                    aria-hidden="true"></i>Print</button>
                        </div>

                        <!--
                                                        <div class="row px-4 py-2">
                                                            <a name="BtnExit" id="GunaGradientButton2" class="btn btn-outline-danger"
                                                                href="/"role="button"><i class="fas fa-door-open   text-danger"></i> Exit</a>
                                                        </div> -->
                        <div class="row px-4 py-2">
                            <button class="btn btn-danger" id="CmdExit" role="button"> <i
                                    class="fa fa-door-open mr-1" aria-hidden="true"></i>Exit</button>
                        </div>





                        <!-- <button class="button-79" role="button"><i class="fa fa-file text-dark"  aria-hidden="true"></i> Show</button>
                                                            <button class="button-78" role="button">Print</button>
                                                            <button class="button-78" role="button">Exit</button>-->
                    </div>
                </div>

            </div>
        </div>

        <div class="col-lg-12 pb-5">
            <div class="row">




                <div class="rounded shadow table-responsive">
                    <table class="table " id="DG3">
                        <thead class="">
                            <tr>
                                <th hidden>VendorCode</th>
                                <th>Vendor&nbsp;Name</th>
                                <th>PoNo</th>
                                <th>Po&nbsp;Rec&nbsp;Date</th>
                                <th>Terms</th>
                                <th>Due&nbsp;Date</th>
                                <th>VSN&nbsp;#</th>
                                <th>Charge&nbsp;#</th>
                                <th>Vessel&nbsp;Name</th>
                                <th>Department</th>
                                <th>PV&nbsp;No.</th>
                                <th>Invoice&nbsp;Amt</th>
                                <th>Debit&nbsp;Note</th>
                                <th>Net&nbsp;Invoice&nbsp;Amt</th>
                                <th>Paid&nbsp;Amt</th>
                                <th>Bal&nbsp;Amt</th>
                                <th>Ok&nbsp;to&nbsp;Pay</th>
                                <th>Invoice&nbsp;Type</th>

                            </tr>
                        </thead>
                        <tbody id="DG3body">

                        </tbody>
                        <tr>
                            <th hidden></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>
                                Grand Total :
                            </th>
                            <th id="InvoiceAmt">

                            </th>
                            <th id="DebitNote">

                            </th>
                            <th id="NetInvoiceAmt">

                            </th>
                            <th id="PaidAmt">

                            </th>
                            <th id="BalAmt">

                            </th>
                        </tr>
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
            transform: translateX(12.8em);
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
            transform: translateX(21.5em);
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


            var table1 = $('#DG3').DataTable({

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
                    $("#CmbCustomer").prop("disabled", true);
                } else {
                    // Enable the select element
                    $("#CmbCustomer").prop("disabled", false);
                    $("#CmbCustomer").prop("disabled", false);
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

            $('#CmdShow').click(function(e) {
                e.preventDefault();
                var Qry = "";

                Qry = "PORecDate>='" + $("#TxtDateFrom").val() + "' and PORecDate<='" + $("#TxtDateTo")
                    .val() + "' and BranchCode=" + parseInt({{ $BranchCode }});

                if (!$("#ChkAllVendor").is(":checked")) {
                    if (Qry !== "") Qry += " and ";
                    Qry += "VendorActCode='" + $("#TxtVendorActCode").val() + "'";
                }

                if (!$("#AllVessel").is(":checked")) {
                    if (Qry !== "") Qry += " and ";
                    Qry += "VesselName='" + $("#CmbVessel").val() + "'";
                }

                if (!$("#ChkInvoiceAll").is(":checked")) {
                    if (Qry !== "") Qry += " and ";
                    Qry += "PurchaseOrderNo>=" + parseInt($("#TxtInvoiceNoFrom").val()) +
                        " and PurchaseOrderNo<=" + parseInt($("#TxtInvoiceNoTo").val());
                }

                if (!$("#ChkDueDateAll").is(":checked")) {
                    if (Qry !== "") Qry += " and ";
                    Qry += "DueDate>='" + $("#TxtDueDateFrom").val() + "' and DueDate<='" + $(
                        "#TxtDueDateTo").val() + "'";
                }

                if ($("#OptUnclearInvoice").is(":checked")) {
                    if (Qry !== "") Qry += " and ";
                    Qry += "NetAmount-PaidAmt>0";
                }

                if ($("#OptClearInvoices").is(":checked")) {
                    if (Qry !== "") Qry += " and ";
                    Qry += "NetAmount-PaidAmt<=0";
                }

                if (!$("#ChkOkToPayAll").is(":checked")) {
                    if ($("#CmbOkToPay").val() === "Yes") {
                        if (Qry !== "") Qry += " and ";
                        Qry += "OkToPay=1";
                    } else {
                        if (Qry !== "") Qry += " and ";
                        Qry += "(OkToPay<>1 or OKToPay is NULL)";
                    }
                }

                if (!$("#CkhOnlyDrNote").is(":checked")) {
                    if ($("#CmbOnlyDrNote").val() === "Yes") {
                        if (Qry !== "") Qry += " and ";
                        Qry += "TotalReturnAmount>0";
                    } else {
                        if (Qry !== "") Qry += " and ";
                        Qry += "TotalReturnAmount=0";
                    }
                }

                var Qry2 = "";

                Qry2 = "Date>='" + $("#TxtDateFrom").val() + "' and Date<='" + $("#TxtDateTo").val() +
                    "' and BranchCode=" + parseInt({{ $BranchCode }});

                if (!$("#ChkAllVendor").is(":checked")) {
                    if (Qry2 !== "") Qry2 += " and ";
                    Qry2 += "ActCode='" + $("#TxtVendorActCode").val() + "'";
                }

                if (!$("#ChkInvoiceAll").is(":checked")) {
                    if (Qry2 !== "") Qry2 += " and ";
                    Qry2 += "PONo>=" + parseInt($("#TxtInvoiceNoFrom").val()) + " and PONo<=" + parseInt($(
                        "#TxtInvoiceNoTo").val());
                }

                if (!$("#ChkDueDateAll").is(":checked")) {
                    if (Qry2 !== "") Qry2 += " and ";
                    Qry2 += "DueDate>='" + $("#TxtDueDateFrom").val() + "' and DueDate<='" + $(
                        "#TxtDueDateTo").val() + "'";
                }

                if ($("#OptUnclearInvoice").is(":checked")) {
                    if (Qry2 !== "") Qry2 += " and ";
                    Qry2 += "NetAmount-PaidAmt>0";
                }

                if ($("#OptClearInvoices").is(":checked")) {
                    if (Qry2 !== "") Qry2 += " and ";
                    Qry2 += "NetAmount-PaidAmt<=0";
                }

                if (!$("#ChkOkToPayAll").is(":checked")) {
                    if ($("#CmbOkToPay").val() === "Yes") {
                        if (Qry2 !== "") Qry2 += " and ";
                        Qry2 += "OkToPay=1";
                    } else {
                        if (Qry2 !== "") Qry2 += " and ";
                        Qry2 += "(OkToPay<>1 or OKToPay is NULL)";
                    }
                }


                console.log(Qry);
                console.log(Qry2);

                ajaxSetup();
                $.ajax({
                    url: '/ReturnItemReportsearch',
                    type: 'POST',
                    data: {
                        Qry,
                        Qry2,
                    },
                    beforeSend: function() {
                        // Show the overlay and spinner before sending the request
                        $('.overlay').show();
                    },
                    success: function(resposne) {
                        console.log(resposne);
                        let data2 = resposne.InvoiceMaster;
                        let data = resposne.PurchaseOrderMaster;
                        let table = document.getElementById('DG3body');
                        table.innerHTML = ""; // Clear the table
                        data.forEach(function(item) {
                            let row = table.insertRow();

                            function createCell(content) {
                                let cell = row.insertCell();
                                cell.innerHTML = content;
                                return cell;
                            }


                            createCell(item.VendorActCode).hidden = true;
                            createCell(item.VendorName);
                            createCell(item.PurchaseOrderNo)
                            var podate = new Date(item.PORecDate);
                            const PORecDate = podate.toISOString().substring(0, 10);
                            createCell(PORecDate);
                            createCell(item.Terms);

                            var dudate = new Date(item.DueDate);
                            const DueDate = dudate.toISOString().substring(0, 10);
                            createCell(DueDate);

                            createCell(item.VSNNo);
                            createCell(item.ChargeNo);
                            createCell(item.VesselName);
                            createCell(item.DepartmentName);
                            createCell(item.PVNo);
                            createCell(parseFloat(item.NetAmount ? item.NetAmount : '0')
                                .toFixed(2));
                            var MReturnCostAmt = item.TotalReturnAmount ? item
                                .TotalReturnAmount : 0;
                            createCell(parseFloat(MReturnCostAmt).toFixed(2));

                            createCell(parseFloat(item.NetAmount ? item.InvoiceAmt :
                                '0').toFixed(2));
                            var MPayAmount = item.PaidAmt ? item.PaidAmt : 0;
                            createCell(parseFloat(MPayAmount).toFixed(2));
                            createCell(parseFloat(item.NetAmount ? item.NetAmount : '0')
                                .toFixed(2));
                            let OKToPay = createCell('');
                            if (item.OKToPay) {
                                OKToPay.innerHTML =
                                    '<input class="ChkSendEmail mx-auto" type="checkbox" name="" id="" checked value="' +
                                    item.OKToPay + '">';
                            } else {
                                OKToPay.innerHTML =
                                    '<input class="ChkSendEmail mx-auto" type="checkbox" name="" id="" value="' +
                                    item.OKToPay + '">';
                            }
                            createCell('PO Received');


                            var MPOMadeNo = item.PurchaseOrderNo;


                        });

                        data2.forEach(function(item) {
                            let row = table.insertRow();

                            function createCell(content) {
                                let cell = row.insertCell();
                                cell.innerHTML = content;
                                return cell;
                            }




                            createCell(item.invoice.ActCode).hidden = true;
                            createCell(item.invoice.ActName);
                            createCell(item.invoice.InvoiceNo)
                            var podate = new Date(item.invoice.Date);
                            const PORecDate = podate.toISOString().substring(0, 10);
                            createCell(PORecDate);
                            createCell(item.invoice.Terms);

                            var dudate = new Date(item.invoice.DueDate);
                            const DueDate = dudate.toISOString().substring(0, 10);
                            createCell(DueDate);

                            createCell('');
                            createCell('');
                            createCell('');
                            createCell('Loc: ' + item.invoice.GodownName);
                            createCell(item.invoice.PVNo);
                            createCell(parseFloat(item.invoice.NetAmount ? item.invoice
                                .NetAmount : '0').toFixed(2));
                            createCell('');
                            createCell(parseFloat(item.invoice.NetAmount ? item.invoice
                                .NetAmount : '0').toFixed(2));

                            var MPayAmount = item.MPayAmount ? item.MPayAmount : 0;
                            createCell(parseFloat(MPayAmount).toFixed(2));
                            createCell(parseFloat(item.invoice.NetAmount ? item.invoice
                                .NetAmount : '0').toFixed(2));
                            let OKToPay = createCell('');
                            if (item.invoice.OKToPay) {
                                OKToPay.innerHTML =
                                    '<input class="ChkSendEmail mx-auto" type="checkbox" name="" id="" checked value="' +
                                    item.invoice.OKToPay + '">';
                            } else {
                                OKToPay.innerHTML =
                                    '<input class="ChkSendEmail mx-auto" type="checkbox" name="" id="" value="' +
                                    item.invoice.OKToPay + '">';
                            }
                            createCell('Purchased Stock');


                            var MPOMadeNo = item.invoice.PurchaseOrderNo;


                        });

                        TotCalcu();
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












        });
    </script>




@stop


@section('content')
