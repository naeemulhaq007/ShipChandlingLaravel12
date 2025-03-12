@extends('layouts.app')



@section('title', 'Stock-Sale-Report')

@section('content_header')

@stop

@section('content')
    <?php echo View::make('partials.itemsearchmodal'); ?>


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
                        <h4 class="text-black">Stock Sale Report</h4>
                    </b>

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">



                            <div class="row py-2 ">


                                <div class="inputbox col-sm-4 ml-2">
                                    <input type="date" class="" id="TxtDateFrom" required="required">
                                    <span class="Txtspan">
                                        Inv Date From
                                    </span>
                                </div>

                                <div class="inputbox col-sm-4 ml-5">
                                    <input type="date" class="" id="TxtDateTo" required="required">
                                    <span class="Txtspan">
                                        To
                                    </span>
                                </div>

                            </div>


                            <div class="row py-2">
                                <div class="input-group col-sm-12 ">



                                    <div hidden class="inputbox col-sm-2 ">
                                        <input type="text" class=" " id="TxtDepartmentCode" required="required">
                                        <span class="ml-2">
                                            Department Code
                                        </span>
                                    </div>
                                    <div class="inputbox col-sm-9">
                                        <select name="CmbDepartment" id="CmbDepartment" disabled>
                                            @foreach ($Departments as $Departmentitem)
                                                <option value="{{ $Departmentitem->Department }}">
                                                    {{ $Departmentitem->Department }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="Txtspan">
                                            Department
                                        </span>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label text-info ">
                                            <input class="form-check-input " type="checkbox" name="ChkAllDepartment"
                                                id="ChkAllDepartment" checked value=""> All
                                        </label>
                                    </div>
                                </div>
                            </div>



                            <div class="row py-2">
                                <div class="input-group col-sm-12 ">



                                    <div hidden class="inputbox col-sm-2 ">
                                        <input type="hidden" class=" " id="TxtVesselCode" disabled
                                            required="required">
                                        <span class="ml-2">
                                            V. Code
                                        </span>
                                    </div>
                                    <div class="inputbox col-sm-9">
                                        <select name="CmbVessel" id="CmbVessel" disabled>
                                            @foreach ($Vessels as $Vesselsitem)
                                                <option value="{{ $Vesselsitem->VesselName }}">
                                                    {{ $Vesselsitem->VesselName }}
                                                </option>
                                            @endforeach
                                        </select>

                                        <span class="Txtspan">
                                            Vessel Name
                                        </span>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label text-info mx-1">
                                            <input class="form-check-input " type="checkbox" name="AllVessel" id="AllVessel"
                                                checked value=""> All
                                        </label>
                                    </div>
                                    {{-- <div class="input-group-append">
                                        <span class="input-group-text bg-info" style="cursor: pointer;" id="Button1"><i
                                                class="fas fa-search"></i></span>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="input-group col-sm-12 " type="text">



                                    <div class="inputbox col-sm-9">
                                        <input type="text" class="" id="TxtVSNNo" required="required" disabled>
                                        <span class="Txtspan">
                                            VSN #
                                        </span>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label text-info ">
                                            <input class="form-check-input " type="checkbox" name="ChkVSNALL" id="ChkVSNALL"
                                                checked value=""> All
                                        </label>
                                    </div>
                                </div>
                            </div>




                            <div class="row py-2">
                                <div class="input-group col-sm-12 ">



                                    <div hidden class="inputbox col-sm-2 ">
                                        <input type="hidden" class=" " id="TxtItemCodeNew" required="required">
                                        <span class="ml-2">
                                            Item Code New
                                        </span>
                                    </div>
                                    <div hidden class="inputbox col-sm-2 ">
                                        <input type="hidden" class=" " id="TxtIMPACode" required="required">
                                        <span class="ml-2">
                                            Impa Code
                                        </span>
                                    </div>

                                    <div hidden class="inputbox col-sm-2 ">
                                        <input type="hidden" class=" " id="TxtItemCode" required="required">
                                        <span class="ml-2">
                                            Item Code
                                        </span>
                                    </div>
                                    <div class="inputbox col-sm-9">
                                        <input type="text" class="" id="TxtItemName" disabled required="required">
                                        <span class="Txtspan">
                                            Item Code / IMPA
                                        </span>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-info" style="cursor: pointer;" id="CmdArticleCode"><i
                                                class="fas fa-search"></i></span>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label text-info mx-1">
                                            <input class="form-check-input " type="checkbox" name="ChkItemALL"
                                                id="ChkItemALL" checked value=""> All
                                        </label>
                                    </div>
                                </div>
                            </div>














                            <div class="row py-2">
                                <div class="input-group col-sm-10 ml-2">
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

                                <div class="row py-2 ml-2 py-2">
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

                $('#CmdArticleCode').click(function() {
                    //    alert();
                    $('#searchrmodfull').modal('show');

                });
                // $(document).on("dblclick", ".js-click", function() {
                //     var customer = $(this).attr('data-itemname');
                //     var custcode = $(this).attr('data-itemcode');
                //     $('#TxtItemName').val(customer);
                //     $('#TxtItemCode').val(custcode);
                //     $('#TxtIMPACode').val(custcode);
                //     // alert(customer);
                //     $('#searchrmodfull').modal('hide');
                //     $("#TxtItemName").prop("disabled", false);
                //     $('#ChkItemALL').prop("checked", false)
                // });

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




                $("#ChkVSNALL").change(function() {
                    // Check if the checkbox is checked
                    if ($(this).is(":checked")) {
                        // Disable the select element
                        $("#TxtVSNNo").prop("disabled", true);
                    } else {
                        // Enable the select element
                        $("#TxtVSNNo").prop("disabled", false);
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





                //  (table2)


                $('#producers-tables tbody').on('dblclick', 'tr', function() {
                var rowData = table2.row(this).data();
                console.log(rowData);
                $('#TxtItemCodeNew').val(rowData.ItemCode);
                $('#TxtItemCode').val(rowData.ItemCode);
                $('#TxtItemName').val(rowData.ItemName);
                $('#TxtIMPACode').val(rowData.IMPAItemCode);
                $('#searchrmodfull').modal('hide');
                $('#ChkItemALL').prop("checked", false);
                $("#TxtItemCodeNew").prop("disabled", false);
                $("#TxtItemCode").prop("disabled", false);
                $("#TxtIMPACode").prop("disabled", false);
                $("#TxtItemName").prop("disabled", false);
            });


            });
        </script>




    @stop


    @section('content')
