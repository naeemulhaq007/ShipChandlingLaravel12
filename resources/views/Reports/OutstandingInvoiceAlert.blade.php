@extends('layouts.app')



@section('title', 'Outstanding-Invoice-Alert')

@section('content_header')

@stop

@section('content')
    <?php// echo View::make('partials.impalistitemmodal'); ?> ?>
    <?php// echo View::make('partials.itemsearchmodal'); ?> ?>
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
                        <h4 class="text-black">Outstanding Invoice Alert</h4>
                    </b>

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">



                            <div class="row py-2 ">


                                <div class="inputbox col-sm-4 ml-2">
                                    <input type="date" class="" id="TxtDate" required="required">
                                    <span class="Txtspan">
                                        Due Date
                                    </span>
                                </div>

                            </div>



                            <div class="row ml-1 py-2">
                                <button class="btn btn-primary  mx-2" id="BtnShow" role="button"> <i
                                        class="fa fa-file-text mr-1" aria-hidden="true"></i>Show</button>

                                <button class="btn btn-success  mx-2" id="BtnPrint" role="button"> <i
                                        class="fa fa-print mr-1" aria-hidden="true"></i>Print</button>

                                <button class="btn btn-danger mx-2" id="GunaGradientButton2" role="button"> <i
                                        class="fa fa-door-open mr-1" aria-hidden="true"></i>Exit</button>
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
                            <th>Customer&nbsp;Name</th>
                            <th>Vessel&nbsp;Name</th>
                            <th>Invoice&nbsp;No.</th>
                            <th>Invoice&nbsp;Date</th>
                            <th>Terms</th>
                            <th>Due&nbsp;Date</th>
                            <th>Due&nbsp;Days</th>
                            <th>Customer&nbsp;Ref&nbsp;#</th>
                            <th>Department&nbsp;Name</th>
                            <th>Invoice&nbsp;Amount</th>
                            <th>Cr.&nbsp;Note</th>
                            <th>Rec.&nbsp;Amount</th>
                            <th>Balance</th>
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
                            Grand Total
                        </th>
                        <th>

                        </th>
                        <th>
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
            $('#TxtDate').val(today);
            $('#TxtDateTo').val(today);
            $('#TxtDueDateFrom').val(today);
            $('#TxtDueDateTo').val(today);





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

            $("#ChkWorkUser").change(function() {
                // Check if the checkbox is checked
                if ($(this).is(":checked")) {
                    // Disable the select element
                    $("#CmbWorkUser").prop("disabled", true);
                } else {
                    // Enable the select element
                    $("#CmbWorkUser").prop("disabled", false);
                }
            });



            $("#ChkAllOrdered").change(function() {
                // Check if the checkbox is checked
                if ($(this).is(":checked")) {
                    // Disable the select element
                    $("#cmbOrdered").prop("disabled", true);
                } else {
                    // Enable the select element
                    $("#cmbOrdered").prop("disabled", false);
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



            $("#ChkEventNoALL").change(function() {
                // Check if the checkbox is checked
                if ($(this).is(":checked")) {
                    // Disable the select element
                    $("#TxtEventNo").prop("disabled", true);
                } else {
                    // Enable the select element
                    $("#TxtEventNo").prop("disabled", false);
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
