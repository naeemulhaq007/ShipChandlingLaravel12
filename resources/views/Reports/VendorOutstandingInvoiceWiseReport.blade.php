@extends('layouts.app')



@section('title', 'Vendor Outstanding InvoiceWise Report')

@section('content_header')

@stop

@section('content')
<?php echo View::make('partials.AC_ledger'); ?>
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
                        <h4 class="text-black">Vendor Outstanding Report InvoiceWise</h4>
                    </b>

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">



                            <div class="row py-2 ">


                                <div class="inputbox col-sm-4 ml-2">
                                    <input type="date" class="" id="TxtDateFrom" required="required">
                                    <span class="Txtspan">
                                        PO REC Date From
                                    </span>
                                </div>

                                <div class="inputbox col-sm-4 ml-4">
                                    <input type="date" class="" id="TxtDateTo" required="required">
                                    <span class="Txtspan">
                                        To
                                    </span>
                                </div>





                            </div>


                            <div class="row py-2 ">


                                <div class="inputbox col-sm-4 ml-2">
                                    <input type="date" class="" id="TxtInvoiceNoFrom" required="required" disabled>
                                    <span class="Txtspan">
                                        Invoice Date From
                                    </span>
                                </div>

                                <div class="inputbox col-sm-4 ml-4">
                                    <input type="date" class="" id="TxtInvoiceNoTo" required="required" disabled>
                                    <span class="Txtspan">
                                        To
                                    </span>
                                </div>
                                <div class="CheckBox1">
                                    <label class="input-group text-info ml-2">
                                        <input class=" " type="checkbox" name="ChkInvoiceAll" id="ChkInvoiceAll" checked
                                            value=""> All
                                    </label>
                                </div>
                            </div>



                            <div class="row py-2 ">


                                <div class="inputbox col-sm-4 ml-2">
                                    <input type="date" class="" id="TxtDueDateFrom" disabled required="required">
                                    <span class="Txtspan">
                                        Due Date
                                    </span>
                                </div>

                                <div class="inputbox col-sm-4 ml-4">
                                    <input type="date" class="" id="TxtDueDateTo" disabled required="required">
                                    <span class="Txtspan">
                                        To
                                    </span>
                                </div>



                                <div class="CheckBox1">
                                    <label class="input-group text-info ml-2">
                                        <input class="" type="checkbox" name="ChkDueDateAll" checked
                                            id="ChkDueDateAll" value=""> All
                                    </label>
                                </div>



                            </div>




                            <div class="row py-2">
                                <div class="input-group col-sm-12 ">



                                    <div hidden class="inputbox col-sm-2 ">
                                        <input type="text" class=" " id="TxtVesselCode" disabled
                                            required="required">
                                        <span class="ml-2">
                                            V. Code
                                        </span>
                                    </div>
                                    <div class="inputbox col-sm-8">
                                        <input type="text" class="" id="CmbVessel" disabled required="required">
                                        <span class="Txtspan">
                                            Vessel Name
                                        </span>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-info" style="cursor: pointer;" id="Button1"><i
                                                class="fas fa-search"></i></span>
                                    </div>

                                    <div class="CheckBox1">
                                        <label class="input-group text-info ml-1">
                                            <input class=" " type="checkbox" name="AllVessel" id="AllVessel"
                                                checked value=""> All
                                        </label>
                                    </div>
                                </div>
                            </div>



                            <div class="row ml-1 py-2">
                                <button class="btn btn-success  mx-2" id="BtnFill" role="button"> <i class="fa fa-file-text mr-1" aria-hidden="true"></i>Show</button>
                                <button class="btn btn-primary mx-2" id="Button3" role="button"> <i class="fa fa-print mr-1" aria-hidden="true"></i>Print</button>
                                <button class="btn btn-danger mx-2" id="CmdExit" role="button"> <i class="fa fa-door-open mr-1" aria-hidden="true"></i>Exit</button>
                            </div>

                        </div>


                        <div class="col-md-6">
                            <div class="row py-2">
                                <div class="input-group col-sm-12 ">




                                    <div hidden class="inputbox col-sm-8">
                                        <input type="text" class="" id="TxtVendorActCode" required="required">
                                        <span class="ml-2">
                                            Vendor Account code
                                        </span>
                                    </div>

                                </div>
                            </div>
                            <div class="row py-2">



                                        <input type="hidden" class=" " id="TxtVendorCode" >

                                    <div class="inputbox col-sm-7">
                                        <select name="CmbVendor" id="CmbVendor" disabled>
                                            @foreach ($VenderSetup as $VendorSitem)
                                                <option value="{{ $VendorSitem->VenderName }}">
                                                    {{ $VendorSitem->VenderName }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="Txtspan">
                                            Vendor
                                        </span>
                                    </div>

                                    <div class="CheckBox1">
                                        <label class="input-group text-info ml-2">
                                            <input class="" type="checkbox" name="ChkAllVendor" id="ChkAllVendor"
                                                checked value=""> All
                                        </label>
                                    </div>
                                    <button class="btn btn-info col-sm-2 ml-4" id="Button8" role="button">A/c Ledger</button>

                                </div>
                                <div class="row py-2">
                                    <div class="input-group col-sm-12 ">


                                        <div class="rdform row mt-3 ml-1">
                                            <input id="OptUnclearInvoice" type="radio" class="rainput" name="hopping" value="">
                                            <label class="ralabel mx-2" for="OptUnclearInvoice"><span></span>Outstanding Invoices</label>
                                            <input id="OptClearInvoices" type="radio" class="rainput" name="hopping" value="">
                                            <label class="ralabel  mx-2" for="OptClearInvoices"><span></span>Paid Invoices</label>
                                            <input id="OptAll" type="radio" class="rainput" name="hopping" value="" checked>
                                            <label class="ralabel  mx-2" for="OptAll"><span></span>All Invoices</label>
                                            <div class="worm">
                                                @for ($i = 0; $i < 30; $i++)
                                                    <div class="worm__segment">
                                                    </div>

                                                    @endfor
                                                </div>

                                            </div>

                                        </div>
                                </div>
                            <div class="row py-2">

                                <div class="inputbox col-sm-7">
                                    <select name="CmbOkToPay" id="CmbOkToPay" disabled>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                    <span class="Txtspan">
                                        Ok To Pay
                                    </span>
                                </div>



                                    <div class="CheckBox1">
                                        <label class="input-group text-info ml-2">
                                            <input class="" type="checkbox" name="ChkOkToPayAll"
                                                id="ChkOkToPayAll" checked value=""> All
                                        </label>
                                    </div>

                            </div>
                            <div class="row py-2">

                                <div class="inputbox col-sm-7">
                                    <select name="CmbOnlyDrNote" id="CmbOnlyDrNote" disabled>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                    <span class="Txtspan">
                                        Only Dr. Note
                                    </span>
                                </div>



                                    <div class="CheckBox1">
                                        <label class="input-group text-info ml-2">
                                            <input class="" type="checkbox" name="CkhOnlyDrNote"
                                                id="CkhOnlyDrNote" checked value=""> All
                                        </label>
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




                <div class="rounded shadow table-responsive">
                    <table class="table " id="DG3">
                        <thead class="">
                            <tr>
                                <th hidden>VendorCode</th>
                                <th>Vendor&nbsp;Name</th>
                                <th>Po/Bill&nbsp;No</th>
                                <th>Date</th>
                                <th>Vendor&nbsp;Bill&nbsp;No.</th>
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
                                <th>Running&nbsp;Total</th>
                                <th>Ok&nbsp;to&nbsp;Pay</th>


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
            transform: translateX(21.55em);
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

                scrollY: 200,
                deferRender: true,
                scroller: true,
                paging: false,
                info: false,
                ordering: false,
                searching: false,
                responsive: true,


            });

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
            $('#TxtInvoiceNoFrom').val(today);
            $('#TxtInvoiceNoTo').val(today);
            $('#Button8').click(function (e) {
                e.preventDefault();
                $('#AC_ledger').modal('show');
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


            $("#ChkBranchALL").change(function() {
                // Check if the checkbox is checked
                if ($(this).is(":checked")) {
                    // Disable the select element
                    $("#CmbBranchName").prop("disabled", true);
                } else {
                    // Enable the select element
                    $("#CmbBranchName").prop("disabled", false);
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




            $("#ChkAllETA").change(function() {
                // Check if the checkbox is checked
                if ($(this).is(":checked")) {
                    // Disable the select element
                    $("#TxtDateETAFrom").prop("disabled", true);
                    $("#TxtDateETATo").prop("disabled", true);
                } else {
                    // Enable the select element
                    $("#TxtDateETAFrom").prop("disabled", false);
                    $("#TxtDateETATo").prop("disabled", false);
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
                var vessel = $(this).attr('data-vesname');
                $('#CmbVessel').val(vessel);
                // alert(customer);
                $('#searchrmodw').modal('hide');
                $("#CmbVessel").prop("disabled", false);
                $('#AllVessel').prop("checked", false)
            });

            $('#Button8').click(function(e) {
                e.preventDefault();
                $('#AC_ledger').modal('show');
            });


            $('#BtnFill').click(function(e) {
                e.preventDefault();

                var TxtDateTo = $('#TxtDateTo').val();
                var TxtDateFrom = $('#TxtDateFrom').val();

                var Qry = "QuoteMaster.QDate>='" + $('#TxtDateFrom').val() + "' and QuoteMaster.QDate<='" +
                    $('#TxtDateTo').val() + "'";

                if (!$('#ChkBranchALL').is(':checked')) {
                    if (Qry !== "") Qry += " and ";
                    Qry += "QuoteMaster.BranchCode=" + parseInt($('#TxtBranchCode').val());
                }

                if (!$('#ChkAllETA').is(':checked')) {
                    if (Qry !== "") Qry += " and ";
                    Qry += "EventInvoice.BidDueDate>='" + $('#TxtDateETAFrom').val() +
                        "' and EventInvoice.BidDueDate<='" + $('#TxtDateETATo').val() + "'";
                }

                if (!$('#ChkAllDepartment').is(':checked')) {
                    if (Qry !== "") Qry += " and ";
                    Qry += "QuoteMaster.DepartmentCode=" + parseInt($('#TxtDepartmentCode').val());
                }

                if (!$('#ChkAllCustomer').is(':checked')) {
                    if (Qry !== "") Qry += " and ";
                    Qry += "QuoteMaster.CustomerCode=" + parseInt($('#TxtCustomerCode').val());
                }

                if (!$('#AllVessel').is(':checked')) {
                    if (Qry !== "") Qry += " and ";
                    Qry += "EventInvoice.IMONo='" + $('#TxtVesselCode').val() + "'";
                }

                if (!$('#ChkPortALL').is(':checked')) {
                    if (Qry !== "") Qry += " and ";
                    Qry += "EventInvoice.ShippingPort='" + $('#CmbPort').val() + "'";
                }

                if (!$('#ChkEventNoALL').is(':checked')) {
                    if (Qry !== "") Qry += " and ";
                    Qry += "EventInvoice.EventNo=" + parseInt($('#TxtEventNo').val());
                }

                if (!$('#ChkWorkUser').is(':checked')) {
                    if (Qry !== "") Qry += " and ";
                    Qry += "QuoteMaster.WorkUser='" + $('#CmbWorkUser').val() + "'";
                }

                if (!$('#ChkAllOrdered').is(':checked')) {
                    if (Qry !== "") Qry += " and ";
                    if ($('#cmbOrdered').val() === "Ordered") {
                        Qry += "not isnull(QuoteMaster.VSNNo)";
                    } else {
                        Qry += "isnull(QuoteMaster.VSNNo)";
                    }
                }

                window.location = 'Daily-Quotation-Report-Report?TxtDateFrom=' + TxtDateFrom +
                    '&TxtDateTo=' + TxtDateTo + '&Qry=' + Qry;

            });











        });
    </script>




@stop


@section('content')
