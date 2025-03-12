@extends('layouts.app')



@section('title', 'Aging-Report')

@section('content_header')

@stop

@section('content')
    <?php echo View::make('partials.Chartacmodal')->with('BranchCode', $BranchCode) ?>
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
                        <h4 class="text-black">Aging Report</h4>
                    </b>

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">



                            <div class="row py-2 ">

                                <div class="inputbox col-sm-4 ml-2">
                                    <input type="date" class="" id="TxtDateTo" required="required">
                                    <span class="Txtspan">
                                      Up To
                                    </span>
                                </div>

                            </div>


                            <div class="row py-2">
                                <div class="input-group col-sm-12 ">


                                    <div class="inputbox col-sm-9">
                                        <input type="text" class=""id="TxtActCode" hidden disabled required="required">
                                        <span class="Txtspan">
                                            A/C Code
                                        </span>
                                    </div>

                                    <div class="inputbox col-sm-9">
                                        <input type="text" class=""id="TxtActName"disabled required="required">
                                        <span class="Txtspan">
                                            A/C Head
                                        </span>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-info" style="cursor: pointer;" id="CmdCustomerCode"><i
                                                class="fas fa-search"></i></span>
                                    </div>
                                    <div class="CheckBox1">
                                        <label class="input-group text-info ml-2">
                                            <input class="" type="checkbox" name="ChkAll"
                                                id="ChkAll" checked value=""> All
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="input-group col-sm-12 ">
                                    <div id="CHKBANKDTL" class="CheckBox1 ml-2">
                                        <label>
                                          <input type="checkbox" id=""> Company Heading
                                          <span class="checkbox"></span>
                                        </label>
                                      </div>
                                </div>
                            </div>


                            <div class="row ml-1 py-2">
                                <button class="btn btn-dark col-sm-2 ml-1" id="CmdGenerateNew" role="button"><i class="fa fa-file mr-1"></i>
                                    Generate Old </button>
                                 <button class="btn btn-info col-sm-2 ml-3" id="CmdGenerate" role="button">
                                     <i class="fas fa-file-invoice   mr-1 "></i>
                                     Generate</button>

                                <button class="btn btn-danger ml-3" id="CmdExit" role="button"> <i
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




            $("#ChkAll").change(function() {
                // Check if the checkbox is checked
                if ($(this).is(":checked")) {
                    // Disable the select element
                    $("#TxtActName").prop("disabled", true);
                } else {
                    // Enable the select element
                    $("#TxtActName").prop("disabled", false);
                }
            });

            $('#CmdCustomerCode').click(function(e) {
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
                $('#ChkAll').prop("checked", false)
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
