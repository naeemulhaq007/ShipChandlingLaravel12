@extends('layouts.app')



@section('title', 'RFQ-Summary')

@section('content_header')

@stop

@section('content')


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
                        <h3 class="text-center">Purchase Return Report</h3>
                    </b>

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">



                            <div class="row py-2 ">


                                <div class="inputbox col-sm-5">
                                    <input type="date" class="" id="TxtDateFrom" required="required">
                                    <span class="Txtspan">
                                        Date From
                                    </span>
                                </div>

                                <div class="inputbox col-sm-5">
                                    <input type="date" class="" id="TxtDateTo" required="required">
                                    <span class="Txtspan">
                                        To
                                    </span>
                                </div>

                            </div>


                            <div class="row py-2">
                                <input type="hidden" class=" " id="TxtDepartmentCode" required="required">

                                <div class="inputbox col-sm-10">
                                    <span class="Txtspan">
                                        Department
                                    </span>
                                    <select name="CmbDepartment" id="CmbDepartment" disabled>
                                        @foreach ($Departments as $Departmentitem)
                                            <option value="{{ $Departmentitem->Department }}">
                                                {{ $Departmentitem->Department }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="CheckBox1 mt-2 ml-2">
                                    <label class="input-group text-info ">
                                        <input type="checkbox" name="ChkAllDepartment" id="ChkAllDepartment" checked
                                            value=""> All
                                    </label>
                                </div>
                            </div>


                            <div class="row py-2">
                                <input type="hidden" class=" " id="TxtCustomerCode" required="required">

                                <div class="inputbox col-sm-10">
                                    <span class="Txtspan">
                                        Customer Name
                                    </span>
                                    <select name="CmbCustomer" id="CmbCustomer" disabled>
                                        @foreach ($Customers as $Customersitem)
                                            <option value="{{ $Customersitem->CustomerName }}">
                                                {{ $Customersitem->CustomerName }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="CheckBox1 mt-2 ml-2">
                                    <label class="input-group text-info">
                                        <input type="checkbox" name="ChkAllCustomer" id="ChkAllCustomer" checked
                                            value=""> All
                                    </label>
                                </div>
                            </div>

                            <div class="row py-2">
                                <input type="hidden" class=" " id="TxtVesselCode" required="required">

                                <div class="inputbox col-sm-10">

                                    <span class="Txtspan">
                                        Vendor
                                    </span>

                                    <select name="CmbVendor" id="CmbVendor" disabled>
                                        @foreach ($VendorS as $VendorSitem)
                                            <option value="{{ $VendorSitem->VendorName }}">{{ $VendorSitem->VendorName }}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="CheckBox1 mt-2 ml-2">
                                    <label class="input-group text-info ">
                                        <input type="checkbox" name="ChkAllVendor" id="ChkAllVendor" checked value="">
                                        All
                                    </label>
                                </div>
                            </div>


                            <div class="row py-2">
                                <input type="hidden" class=" " id="TextBox1" disabled required="required">

                                <div class="inputbox col-sm-10">

                                    <span class="Txtspan">
                                        Vessel Name
                                    </span>

                                    <select name="CmbVessel" id="CmbVessel" disabled>
                                        @foreach ($Vessels as $Vesselsitem)
                                            <option value="{{ $Vesselsitem->VesselName }}">{{ $Vesselsitem->VesselName }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="CheckBox1 mt-2 ml-2">
                                    <label class="input-group text-info ">
                                        <input type="checkbox" name="ChkAllVessel"
                                            id="ChkAllVessel" checked value=""> All
                                    </label>
                                </div>

                            </div>
                            <div class="row py-2">

                                    <div class="inputbox col-sm-10">
                                         <span class="Txtspan">
                                            Terms
                                        </span>
                                        <select name="CmbTerms" id="CmbTerms" disabled>
                                            @foreach ($Terms as $Termsitem)
                                                <option value="{{ $Termsitem->Terms }}"> {{ $Termsitem->Terms }}</option>
                                            @endforeach
                                        </select>

                                    </div>

                                    <div class="CheckBox1 mt-2 ml-2">
                                        <label class="input-group text-info ">
                                            <input type="checkbox" name="ChkTermsAll"
                                                id="ChkTermsAll" checked value=""> All
                                        </label>
                                    </div>
                            </div>
                            <div class="row py-2">
                                <button class="btn btn-success  mx-2" id="BtnFill" role="button"> <i
                                        class="fa fa-file-text mr-1" aria-hidden="true"></i>Show</button>

                                <button class="btn btn-danger mx-2" id="CmdExit" role="button"> <i
                                        class="fa fa-door-open mr-1" aria-hidden="true"></i>Exit</button>
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
            $('#TxtDateFrom').val(today);
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



            $("#ChkAllVessel").change(function() {
                // Check if the checkbox is checked
                if ($(this).is(":checked")) {
                    // Disable the select element
                    $("#CmbVessel").prop("disabled", true);
                } else {
                    // Enable the select element
                    $("#CmbVessel").prop("disabled", false);
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




            $('#BtnFill').click(function(e) {
                e.preventDefault();
                var TxtDateTo = $('#TxtDateTo').val();
                var TxtDateFrom = $('#TxtDateFrom').val();


                var Qry = "Date>='" + $('#TxtDateFrom').val() + "' and Date<='" + $('#TxtDateTo').val() +
                    "'";

                if (!$('#ChkAllDepartment').is(':checked')) {
                    if (Qry !== "") Qry += " and ";
                    Qry += "DepartmentName='" + $('#CmbDepartment').val() + "'";
                }

                if (!$('#ChkAllCustomer').is(':checked')) {
                    if (Qry !== "") Qry += " and ";
                    Qry += "CustomerName='" + $('#CmbCustomer').val() + "'";
                }

                if (!$('#ChkAllVessel').is(':checked')) {
                    if (Qry !== "") Qry += " and ";
                    Qry += "VesselName='" + $('#CmbVessel').val() + "'";
                }

                if (!$('#ChkAllVendor').is(':checked')) {
                    if (Qry !== "") Qry += " and ";
                    Qry += "VendorName='" + $('#CmbVendor').val() + "'";
                }

                if (!$('#ChkTermsAll').is(':checked')) {
                    if (Qry !== "") Qry += " and ";
                    Qry += "Terms='" + $('#CmbTerms').val() + "'";
                }

                console.log(Qry);

                window.location = 'Purchase-Return-Print?TxtDateFrom=' + TxtDateFrom + '&TxtDateTo=' +
                    TxtDateTo + '&Qry=' + Qry;

            });











        });
    </script>




@stop


@section('content')
