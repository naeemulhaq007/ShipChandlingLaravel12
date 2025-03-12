@extends('layouts.app')



@section('title', 'RFQ-Summary')

@section('content_header')

@stop

@section('content')
    <?php// echo View::make('partials.impalistitemmodal'); ?> ?> ?>
    <?php// echo View::make('partials.itemsearchmodal'); ?> ?> ?>
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
                        <h3 class="text-center">Max PO Received Item Report</h3>
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
                                <div class="inputbox col-sm-10">
                                    <input type="hidden" class=" " id="TxtGodownCode" required="required">
                                    <span class="Txtspan">
                                        Warehouse
                                    </span>

                                    <select name="CmbGodownName" id="CmbGodownName" disabled>
                                        @foreach ($GodownSetup as $Godownitem)
                                            <option value="{{ $Godownitem->GodownCode }}">{{ $Godownitem->GodownName }}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="CheckBox1 mt-2 ml-2">
                                    <label class="input-group text-info">
                                        <input type="checkbox" name="ChkAllGodwon" id="ChkAllGodwon" checked value="">
                                        All
                                    </label>
                                </div>
                            </div>


                            <div class="row py-2">
                                <div hidden class="inputbox col-sm-2 ">
                                    <input type="text" class=" " id="TxtItemCode" required="required">
                                    <span class="Txtspan">
                                        IMPA Code
                                    </span>
                                </div>
                                <div class="inputbox col-sm-10">
                                    <span class="Txtspan">
                                        IMPA Code
                                    </span>
                                    <select name="TxtItemName" id="TxtItemName" disabled>
                                        @foreach ($GodownSetup as $Godownitem)
                                            <option value="{{ $Godownitem->GodownCode }}">{{ $Godownitem->GodownName }}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="CheckBox1 mt-2 ml-2">
                                    <label class="input-group text-info">
                                        <input type="checkbox" name="ChkItemALL" id="ChkItemALL" checked value=""> All
                                    </label>
                                </div>
                            </div>

                            <div class="row py-2">
                                <input type="hidden" class=" " id="TxtVendorCode" required="required">

                                <div class="inputbox col-sm-10">
                                    <span class="Txtspan">
                                        Vendor
                                    </span>
                                    <select name="TxtVendorName" id="TxtVendorName" disabled>
                                        <!--    @foreach ($GodownSetup as $Godownitem)
    <option value="{{ $Godownitem->GodownCode }}">{{ $Godownitem->GodownName }}
                                                        </option>
    @endforeach -->
                                    </select>

                                </div>

                                <div class="CheckBox1 mt-2 ml-2">
                                    <label class="input-group text-info">
                                        <input type="checkbox" name="ChkVendorALL" id="ChkVendorALL" checked value="">
                                        All
                                    </label>
                                </div>
                            </div>

                            <div class="row py-2">
                                <div class="inputbox col-sm-5">
                                    <span class="Txtspan">
                                        Max Sort
                                    </span>
                                    <select name="CmbMaxType" id="CmbMaxType">
                                        <option value="Quantity">Quantity</option>
                                        <option value="Amount">Amount</option>
                                    </select>

                                </div>

                                <div class="inputbox col-sm-5">
                                    <select name="CmbSearchBy" id="CmbSearchBy" disabled>
                                        <option value="OnlyIMPA">Only IMPA</option>
                                        <option value="ItemName">ItemName</option>
                                    </select>
                                    <span class="Txtspan">
                                        Search By
                                    </span>
                                </div>
                            </div>

                            <div class="row py-2 ">
                                <div class="inputbox col-sm-5">
                                    <input type="text" class="" id="TxtTopItemNo" required="required"
                                        value="100">
                                    <span class="Txtspan">
                                        Top Item No
                                    </span>
                                </div>
                            </div>

                            <div class="row py-2">
                                <button class="btn btn-success  mx-2" id="BtnFill" role="button"> <i
                                        class="fa fa-file-text mr-1" aria-hidden="true"></i>Show</button>

                                <button class="btn btn-primary mx-2" id="Button1" role="button"> <i
                                        class="fa fa-print mr-1" aria-hidden="true"></i>Print</button>

                                <button class="btn btn-danger mx-2" id="CmdExit" role="button"> <i
                                        class="fa fa-door-open mr-1" aria-hidden="true"></i>Exit</button>
                            </div>

                        </div>


                        <div class="col-lg-6">
                            <div class="row py-2">



                                <div class="col-sm-12">
                                    <div class="CheckBox1 mt-2 ml-2">
                                    <label class="input-group text-info mx-4">
                                        <input type="checkbox" name="ChkAllWH" id="ChkAllWH"
                                            checked value=""> All
                                    </label></div>
                                    <div class="rounded shadow">
                                        <table class="table small" id="Departmenttable">
                                            <thead class="bg-info">
                                                <tr>
                                                    <th>Select</th>

                                                    <th>Department&nbsp;Name</th>
                                                </tr>
                                            </thead>
                                            <tbody id="Departmenttablebody">
                                                @foreach ($Deptsetup as $deptitem)
                                                    <tr>
                                                        <td><input type="checkbox" name="" id="">
                                                        </td>

                                                        <td>{{ $deptitem->TypeName }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="row px-4 py-4">
                                    <button class="btn btn-info" id="Button3" role="button">Select All</button>
                                </div>
                                <div class="row px-4 py-4">
                                    <button class="btn btn-info" id="Button2" role="button">Unselect All</button>
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
                    <table class="table " id="DG2">
                        <thead class="">
                            <tr>
                                <th>iMPA&nbsp;Code</th>
                                <th>Product&nbsp;Name</th>
                                <th>UOM</th>
                                <th>Qty.</th>
                                <th>Amount</th>
                                <th>Avg&nbsp;Price</th>
                                <th>Min.&nbsp;Price</th>
                                <th>Min.&nbsp;Price&nbsp;Date</th>
                                <th>Max.&nbsp;Price</th>
                                <th>Max.&nbsp;Price&nbsp;Date</th>
                                <th>Last&nbsp;Purc.&nbsp;Price</th>
                                <th>Last&nbsp;Purc.&nbsp;Date</th>


                            </tr>
                        </thead>
                        <tbody id="DG2body">

                        </tbody>
                    </table>

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
            let table = document.getElementById('DG2body');
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

                scrollY: 270,
                deferRender: true,
                scroller: true,
                paging: false,
                info: false,
                ordering: false,
                searching: false,
                responsive: true,


            });

            var table1 = $('#DG2').DataTable({

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
            $("#ChkAllGodwon").change(function() {
                // Check if the checkbox is checked
                if ($(this).is(":checked")) {
                    // Disable the select element
                    $("#CmbGodownName").prop("disabled", true);
                } else {
                    // Enable the select element
                    $("#CmbGodownName").prop("disabled", false);
                }
            });
            $("#ChkVendorALL").change(function() {
                // Check if the checkbox is checked
                if ($(this).is(":checked")) {
                    // Disable the select element
                    $("#TxtVendorName").prop("disabled", true);
                } else {
                    // Enable the select element
                    $("#TxtVendorName").prop("disabled", false);
                }
            });
            $("#ChkItemALL").change(function() {
                // Check if the checkbox is checked
                if ($(this).is(":checked")) {
                    // Disable the select element
                    $("#TxtItemName").prop("disabled", true);
                } else {
                    // Enable the select element
                    $("#TxtItemName").prop("disabled", false);
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

            $('#Button8').click(function(e) {
                e.preventDefault();
                $('#AC_ledger').modal('show');
            });














        });
    </script>




@stop


@section('content')
