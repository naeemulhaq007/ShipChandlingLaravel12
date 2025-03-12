@extends('layouts.app')



@section('title', 'Bank-Reconciliation')

@section('content_header')

@stop

@section('content')
    <?php// echo View::make('partials.impalistitemmodal'); ?> ?>
    <?php// echo View::make('partials.itemsearchmodal'); ?> ?>
    <?php echo View::make('partials.Modalchartofaccount')->with('BranchCode', $BranchCode); ?>
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
                        <h4 class="text-black">Bank Reconciliation</h4>
                    </b>

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">


                            <div class="row py-2">

                                <div class="inputbox col-sm-4 ml-2">
                                    <input id="TxtActCode" name="TxtActCode">
                                    <span class="Txtspan">Act. Code</span>



                                </div>

                            </div>
                            <div class="row py-2 ">


                                <div class="inputbox col-sm-4 ml-2">
                                    <input type="date" class="" id="TxtDateFrom" required="required">
                                    <span class="Txtspan">
                                        From
                                    </span>
                                </div>

                                <div class="inputbox col-sm-4 ml-1">
                                    <input type="date" class="" id="TxtDateTo" required="required">
                                    <span class="Txtspan">
                                        To
                                    </span>
                                </div>
                            </div>

                            <div class="row py-2">
                                <div class="inputbox col-sm-10 ml-2">
                                    <input id="TxtActName" name="TxtActName">
                                    <span class="Txtspan">Account</span>


                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text bg-info" style="cursor: pointer;" id="CmdActCode"><i
                                            class="fas fa-search"></i></span>
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="inputbox col-sm-10 ml-2">
                                    <input id="TxtDes" name="TxtDes" disabled>
                                    <span class="Txtspan">Des</span>


                                </div>
                                <div class="CheckBox1">
                                    <label class="input-group text-info ml-2">
                                        <input class="" type="checkbox" name="ChkSearchAcAll" id="ChkSearchAcAll"
                                            checked value=""> All
                                    </label>
                                </div>
                            </div>






                            <div class="row py-2">
                                <div class="inputbox col-sm-10 ml-2">
                                    <select name="CmbReconciled" id="CmbReconciled" disabled>
                                        <option value="None"></option>
                                        <option value="Reconciled">Reconciled</option>
                                        <option value="NotReconciled">Not Reconciled</option>
                                    </select>
                                    <span class="Txtspan">
                                        Reconciled
                                    </span>
                                </div>

                                <div class="CheckBox1">
                                    <label class="input-group text-info ml-2">
                                        <input class="" type="checkbox" name="ChkReconAll" id="ChkReconAll" checked
                                            value=""> All
                                    </label>
                                </div>


                            </div>


                            <div class="row py-2">
                                <div class="inputbox col-sm-10 ml-2">
                                    <input id="LblWorkUser" name="LblWorkUser" readonly>
                                    <span class="Txtspan">User</span>


                                </div>

                            </div>
                            {{-- <div class="row py-2">
                                <div class="input-group col-sm-12 ">



                                    <div hidden class="inputbox col-sm-2 ">
                                        <input type="text" class=" " id="TxtGodownCode" required="required">
                                        <span class="ml-2">
                                            Location Code
                                        </span>
                                    </div>
                                    <div class="inputbox col-sm-9">
                                        <select name="CmbGodownName" id="CmbGodownName" disabled>
                                            @foreach ($GodownSetup as $GodownSetupitem)
                                                <option value="{{ $GodownSetupitem->GodownCode }}">
                                                    {{ $GodownSetupitem->GodownName }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="Txtspan">
                                            Location
                                        </span>
                                    </div>

                                    <div class="CheckBox1">
                                        <label class="input-group text-info ml-2">
                                            <input class="" type="checkbox" name="ChkGodownAll" id="ChkGodownAll"
                                                checked value=""> All
                                        </label>
                                    </div>
                                </div>
                            </div> --}}
                            {{-- <div class="row py-2">
                                <div class="input-group col-sm-12 ">



                                    <div hidden class="inputbox col-sm-2 ">
                                        <input type="hidden" class=" " value="" id="TxtBranchCode"
                                            required="required">
                                        <span class="ml-2">
                                            B.Code
                                        </span>
                                    </div>
                                    <div class="inputbox col-sm-9">
                                        <select name="TxtBranchName" id="TxtBranchName" disabled>
                                            @foreach ($branchlist as $branchlistitem)
                                                <option value="{{ $branchlistitem->BranchCode }}">
                                                    {{ $branchlistitem->BranchName }}</option>
                                            @endforeach
                                        </select>
                                        <span class="Txtspan">
                                            Branch Name
                                        </span>
                                    </div>

                                    <div class="CheckBox1">
                                        <label class="input-group text-info ml-2">
                                            <input class="" type="checkbox" name="ChkBranchALL" id="ChkBranchALL"
                                                checked value=""> All
                                        </label>
                                    </div>
                                </div>
                            </div> --}}
                            {{-- <div class="row py-2">
                                <div class="input-group col-sm-12 ">




                                    <div class="inputbox col-sm-9">
                                        <input type="text" class=""id="TxtSearchAc" readonly disabled
                                            required="required">
                                        <span class="Txtspan">
                                            Search A/C
                                        </span>
                                    </div>

                                    <div class="CheckBox1">
                                        <label class="input-group text-info ml-2">
                                            <input class="" type="checkbox" name="ChkSearchAcAll" id="ChkSearchAcAll"
                                                checked value=""> All
                                        </label>
                                    </div>
                                </div>
                            </div> --}}

                            {{-- <div class="row py-2">
                                <div class="input-group col-sm-12 ">

                                    <div class="inputbox col-sm-9">
                                        <input type="text" class="" id="TxtNetIncome" required="required">
                                        <span class="Txtspan">
                                            Net Income
                                        </span>
                                    </div>


                                </div>
                            </div> --}}
                            {{-- <div class="row py-2">
                                <div class="input-group col-sm-12 ">
                                    <div id="ChkNetProfit" class="CheckBox1 ml-2">
                                        <label>
                                            <input type="checkbox" /> With Net Profit
                                            <span class="checkbox"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="input-group col-sm-12 ">
                                    <div id="ChkCompanyHeading" class="CheckBox1 ml-2">
                                        <label>
                                            <input type="checkbox" /> Company Heading
                                            <span class="checkbox"></span>
                                        </label>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="row ml-1 py-2">
                                <button class="btn btn-dark col-sm-2 ml-1" id="CmdGenerate" role="button">
                                    <i class=" fa  fa-file-alt mr-1"></i>Generate</button>
                                <button class="btn btn-primary col-sm-2 ml-3" id="CmdPrint" role="button">
                                    <i class="fa fa-print mr-1   "></i>Print Preview</button>

                                <button class="btn btn-danger col-sm-2 ml-3" id="CmdExit" role="button"> <i
                                        class="fa fa-door-open mr-1" aria-hidden="true"></i>Exit</button>
                            </div>
                            <div class="row ml-1 py-2">

                                <button class="btn btn-dark col-sm-2 ml-1" id="CmdRefresh" role="button"><i
                                        class="fa fa-refresh mr-1"></i>Refresh </button>
                                <button class="btn btn-success col-sm-2 ml-3" id="CmdReconciled" role="button"><i
                                        class="fa fa-check mr-1"></i>Reconciled </button>
                                <button class="btn btn-danger col-sm-2 ml-3" id="Button2" role="button"> <i
                                        class="fa fa-multiply mr-1" aria-hidden="true"></i>Not Reconciled</button>
                            </div>

                        </div>
                        <div class="col lg-6">
                            <div class="row py-2 ">


                                <div class="inputbox col-sm-4 ml-2">
                                    <input type="date" class="" id="TxtReconDateFrom" required="required" disabled>
                                    <span class="Txtspan">
                                        Recon From
                                    </span>
                                </div>

                                <div class="inputbox col-sm-4 ml-1">
                                    <input type="date" class="" id="TxtReconDateTo" required="required" disabled>
                                    <span class="Txtspan">
                                        To
                                    </span>
                                </div>

                                <div class="CheckBox1">
                                    <label class="input-group text-info ml-2">
                                        <input class="" type="checkbox" name="ChkReconDateAll" id="ChkReconDateAll"
                                            checked value=""> All
                                    </label>
                                </div>

                            </div>
                            <div class="row py-2">
                                <div class="inputbox col-sm-4 ml-2">
                                    <input type="date" id="LblPrintDate" name="LblPrintDate" readonly>
                                    <span class="Txtspan">Print Date</span>


                                </div>
                                <div class="inputbox col-sm-4 ml-2">
                                    <input type="time" id="LblPrintTime" name="LblPrintTime" readonly>
                                    <span class="Txtspan">Print Time</span>


                                </div>

                            </div>
                        </div>


                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="col-lg-12 pb-5">
        <div class="card">
            {{-- <div class="card-header ">
                <div class="card-tools ">


                    <button type="button" name="headertoggle" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
                <div class="row">
                    <div class="inputbox col-sm-3 ml-2">
                        <input name="TxtItemName" id="TxtItemName">

                        <span class="Txtspan">
                            Search Product
                        </span>
                    </div>
                    <div class="inputbox col-sm-3 ml-4">
                        <input name="TxtIMPANO" id="TxtIMPANO">

                        <span class="Txtspan">
                            IMPA No.
                        </span>
                    </div>
                </div>

            </div> --}}
            <div class="card-body">
                <div class="row">




                    <div class="rounded shadow table-responsive">
                        <table class="table " id="DG1">
                            <thead class="">
                                <tr>
                                    <th>Date</th>
                                    <th>Vnon</th>
                                    <th>Vnoc</th>
                                    <th>Description</th>

                                    <th>Pay&nbsp;Type</th>
                                    <th>Chk/Tr&nbsp;No.</th>
                                    <th>Debit</th>
                                    <th>Credit</th>
                                    <th>Balance</th>
                                    <th>Mark</th>
                                    <th>Recon</th>
                                    <th>Recon&nbsp;User.</th>
                                    <th>Recon&nbsp;Date.</th>
                                    <th>Recon&nbsp;Time.</th>
                                </tr>
                            </thead>
                            <tbody id="DG1body">

                            </tbody>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>
                                </th>
                                <th>
                                </th>

                            </tr>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>
                                </th>
                                <th>
                                </th>

                            </tr>
                        </table>

                    </div>







                </div>
                <h4 class="py-2">Account Balance
                </h4>
                <div class="row">
                    <div class="inputbox col-sm-2">
                        <input type="text" id="LblTotalDebit" name="LblTotalDebit">
                        <span class="Txtspan">Total Debit</span>


                    </div>
                    <div class="inputbox col-sm-2">
                        <input type="text" id="LblTotalCredit" name="LblTotalCredit">
                        <span class="Txtspan">Total Credit</span>


                    </div>
                    <div class="inputbox col-sm-2">
                        <input type="text" id="LblDiff" name="LblDiff">
                        <span class="Txtspan">Diff.</span>


                    </div>
                </div>
                <h4 class="py-2">Not Reconciled
                </h4>
                <div class="row">
                    <div class="inputbox col-sm-2">
                        <input type="text" id="LblNDebit" name="LblNDebit">
                        <span class="Txtspan">Total Debit</span>


                    </div>
                    <div class="inputbox col-sm-2">
                        <input type="text" id="LblNCredit" name="LblNCredit">
                        <span class="Txtspan">Total Credit</span>


                    </div>
                    <div class="inputbox col-sm-2">
                        <input type="text" id="LblNDiff" name="LblNDiff">
                        <span class="Txtspan">Diff.</span>


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
            $('#TxtReconDateFrom').val(today);
            $('#TxtReconDateTo').val(today);

            $("#ChkBranchALL").change(function() {
                // Check if the checkbox is checked
                if ($(this).is(":checked")) {
                    // Disable the select element
                    $("#TxtBranchName").prop("disabled", true);
                } else {
                    // Enable the select element
                    $("#TxtBranchName").prop("disabled", false);
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




            $("#ChkSearchAcAll").change(function() {
                // Check if the checkbox is checked
                if ($(this).is(":checked")) {
                    // Disable the select element
                    $("#TxtSearchAc").prop("disabled", true);
                } else {
                    // Enable the select element
                    $("#TxtSearchAc").prop("disabled", false);
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


            // $("#ChkReconDateAll").change(function() {
            //     // Check if the checkbox is checked
            //     if ($(this).is(":checked")) {
            //         // Disable the select element
            //         $("#TxtReconDateFrom").prop("disabled", true);
            //     } else {
            //         // Enable the select element
            //         $("#TxtVSNNo").prop("disabled", false);
            //     }
            // });

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



            $("#ChkSearchAcAll").change(function() {
                // Check if the checkbox is checked
                if ($(this).is(":checked")) {
                    // Disable the select element
                    $("#TxtDes").prop("disabled", true);
                } else {
                    // Enable the select element
                    $("#TxtDes").prop("disabled", false);
                }
            });



            $("#ChkReconAll").change(function() {
                // Check if the checkbox is checked
                if ($(this).is(":checked")) {
                    // Disable the select element
                    $("#CmbReconciled").prop("disabled", true);
                } else {
                    // Enable the select element
                    $("#CmbReconciled").prop("disabled", false);
                }
            });


            $("#ChkReconDateAll").change(function() {
                // Check if the checkbox is checked
                if ($(this).is(":checked")) {
                    // Disable the select element
                    $("#TxtReconDateFrom").prop("disabled", true);
                    $("#TxtReconDateTo").prop("disabled", true);
                } else {
                    // Enable the select element
                    $("#TxtReconDateFrom").prop("disabled", false);
                    $("#TxtReconDateTo").prop("disabled", false);
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

            $('#CmdActCode').click(function(e) {
                e.preventDefault();
                $('#chart').modal('show');
            });


            $(document).on("dblclick", ".parrent", function() {
                var acname = $(this).attr('data-acname');
                var accode = $(this).attr('data-accode');
                $('#TxtActName').val(acname);


                // alert(customer);
                $('#chart').modal('hide');
                $("#TxtActName").prop("disabled", false);
                $('#ChkSearchAcAll').prop("checked", false)
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














        });
    </script>




@stop


@section('content')
