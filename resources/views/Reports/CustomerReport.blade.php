@extends('layouts.app')



@section('title', 'Customer-Report')

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
                        <h4 class="text-black">Customer Report</h4>

                    </b>

                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">



                            <div class="row py-2">
                                <div class="input-group col-sm-12 ">



                                    <div hidden class="inputbox col-sm-2 ">
                                        <input type="hidden" class=" " id="TxtCustomerCode" required="required">
                                        <span class="ml-2">
                                            C.Code
                                        </span>
                                    </div>
                                    <div class="inputbox col-sm-10">
                                        <input type="text" class="" id="CmbCustomer" disabled required="required">
                                        <span class="Txtspan">
                                            Customer Name
                                        </span>
                                    </div>

                                    <div class="CheckBox1">
                                        <label class="input-group text-info ml-3">
                                            <input class="" type="checkbox" name="ChkAllCustomer" id="ChkAllCustomer"
                                                checked value=""> All
                                        </label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-info" style="cursor: pointer;" id="Button6"><i
                                                class="fas fa-search"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row py-2">
                                <div class="input-group col-sm-12 ">


                                    <div class="inputbox col-sm-10">
                                        <select name="CmbCountry" id="CmbCountry" disabled>
                                            @foreach ($Country as $Countryitem)
                                                <option value="{{ $Countryitem->Country }}">{{ $Countryitem->Country }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="Txtspan">
                                            Country
                                        </span>
                                    </div>

                                    <div class="CheckBox1">
                                        <label class="input-group text-info ml-3">
                                            <input class=" " type="checkbox" name="ChkCountry" id="ChkCountry" checked
                                                value=""> All
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="input-group col-sm-12 ">


                                    <div class="inputbox col-sm-10">
                                        <select name="CmbState" id="CmbState" disabled>
                                            @foreach ($StateName as $StateNameitem)
                                                <option value="{{ $StateNameitem->StateName }}">
                                                    {{ $StateNameitem->StateName }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="Txtspan">
                                            State
                                        </span>
                                    </div>

                                    <div class="CheckBox1">
                                        <label class="input-group text-info ml-3">
                                            <input class=" " type="checkbox" name="ChkAllStateName"
                                                id="ChkAllStateName" checked value=""> All
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row py-2">
                                <div class="input-group col-sm-12 ">


                                    <div class="inputbox col-sm-10">
                                        <select name="CmbCity" id="CmbCity" disabled>
                                            @foreach ($City as $Cityitem)
                                                <option value="{{ $Cityitem->City }}">{{ $Cityitem->City }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="Txtspan">
                                            City
                                        </span>
                                    </div>

                                    <div class="CheckBox1">
                                        <label class="input-group text-info ml-3">
                                            <input class="" type="checkbox" name="ChkCity" id="ChkCity" checked
                                                value=""> All
                                        </label>
                                    </div>
                                </div>

                            </div>

                            <div class="row py-2">
                                <div class="input-group col-sm-12 ">


                                    <div class="inputbox col-sm-10">
                                        <select name="cMBaob" id="cMBaob" disabled>
                                            @foreach ($AOB as $AOBitem)
                                                <option value="{{ $AOBitem->AreaofBusiness }}">
                                                    {{ $AOBitem->AreaofBusiness }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="Txtspan">
                                            AOB
                                        </span>
                                    </div>

                                    <div class="CheckBox1">
                                        <label class="input-group text-info ml-3">
                                            <input class="" type="checkbox" name="ChkAob" id="ChkAob" checked
                                                value=""> All
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="input-group col-sm-12 ">



                                    <div class="inputbox col-sm-5">
                                        <select name="CmbCategory" id="CmbCategory" disabled>
                                            <option value="None"></option>
                                            <option value="H">H</option>
                                            <option value="L">L</option>
                                            <option value="M">M</option>
                                        </select>
                                        <span class="Txtspan">
                                            Category
                                        </span>
                                    </div>

                                    <div class="CheckBox1">
                                        <label class="input-group text-info ml-4">
                                            <input class=" " type="checkbox" name="ChkAllCategory"
                                                id="ChkAllCategory" checked value=""> All
                                        </label>
                                    </div>
                                    <div class="inputbox col-sm-4">
                                        <select name="CmbStatus" id="CmbStatus" disabled>
                                            <option value="None">None</option>
                                            <option value="Regular">Regular</option>
                                            <option value="Important">Important</option>
                                            <option value="Very Important">Very Important</option>

                                        </select>
                                        <span class="Txtspan">
                                            Status
                                        </span>
                                    </div>

                                    <div class="CheckBox1">
                                        <label class="input-group text-info ml-4">
                                            <input class="" type="checkbox" name="ChkAllStatus" id="ChkAllStatus"
                                                checked value=""> All
                                        </label>
                                    </div>
                                </div>
                            </div>


                            <div class="row py-2">
                                <div class="input-group col-sm-12 ">



                                    <div class="inputbox col-sm-5">
                                        <select name="CmbPriority" id="CmbPriority" disabled>
                                            <option value="None"></option>
                                            <option value="H">H</option>
                                            <option value="L">L</option>
                                            <option value="M">M</option>
                                        </select>
                                        <span class="Txtspan">
                                            Priority
                                        </span>
                                    </div>

                                    <div class="CheckBox1">
                                        <label class="input-group text-info ml-4">
                                            <input class=" " type="checkbox" name="ChkPriority" id="ChkPriority"
                                                checked value=""> All
                                        </label>
                                    </div>

                                    <div class="inputbox col-sm-4">
                                        <select name="CmbTerms" id="CmbTerms" disabled>
                                            <option value="N30">N30</option>
                                            <option value="N45">N45</option>
                                            <option value="N60">N60</option>
                                            <option value="N90">N90</option>
                                            <option value="Cash">Cash</option>
                                        </select>
                                        <span class="Txtspan">
                                            Terms
                                        </span>
                                    </div>

                                    <div class="CheckBox1">
                                        <label class="input-group text-info ml-4">
                                            <input class="" type="checkbox" name="ChkTerms" id="ChkTerms" checked
                                                value=""> All
                                        </label>
                                    </div>

                                </div>
                            </div>


                            <div class="row py-2">
                                <div class="input-group col-sm-12 ">



                                    <div class="inputbox col-sm-5">
                                        <select name="CmbEnterCustomer" id="CmbEnterCustomer" disabled>
                                            <option value="None"></option>
                                            <option value="H">H</option>
                                            <option value="L">L</option>
                                            <option value="M">M</option>
                                        </select>
                                        <span class="Txtspan">
                                            Enter Customer
                                        </span>
                                    </div>

                                    <div class="CheckBox1">
                                        <label class="input-group text-info ml-4">
                                            <input class="" type="checkbox" name="ChkEnterCustomer"
                                                id="ChkEnterCustomer" checked value=""> All
                                        </label>
                                    </div>
                                    <div class="inputbox col-sm-4">
                                        <select name="CmbBlock" id="CmbBlock" disabled>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                        <span class="Txtspan">
                                            Status Block
                                        </span>
                                    </div>

                                    <div class="CheckBox1">
                                        <label class="input-group text-info ml-4">
                                            <input class=" " type="checkbox" name="ChkBlockAll" id="ChkBlockAll"
                                                checked value=""> All
                                            <span class="checkbox"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="input-group col-sm-12 ">
                                    <div id="CheckBox1" class="CheckBox1 ml-2">
                                        <label>
                                            <input type="checkbox" /> Show With Detail
                                            <span class="checkbox"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!--   <div class="row py-2">
                                                <div class="input-group col-sm-12 ">
                                                    <div class="CheckBox1 ml-3">

                                                        <div class="cbx">

                                                          <input id="cbx-12" type="checkbox"/>

                                                          <label for="cbx-12"></label>
                                                          <svg width="15" height="14" viewbox="0 0 15 14" fill="none">
                                                            <path d="M2 8.36364L6.23077 12L13 2"></path>
                                                          </svg>
                                                        </div>


                                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1">
                                                          <defs>
                                                            <filter id="goo-12">
                                                              <fegaussianblur in="SourceGraphic" stddeviation="4" result="blur"></fegaussianblur>
                                                              <fecolormatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 22 -7" result="goo-12"></fecolormatrix>
                                                              <feblend in="SourceGraphic" in2="goo-12"></feblend>

                                                            </filter>

                                                          </defs>

                                                        </svg>

                                                      </div>
                                                </div>
                                            </div>-->
                            <div class="row ml-1 py-2">
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

        // function TotCalcu() {
        //     let table = document.getElementById('DG3body');
        //     let rows = table.rows;
        //     let TxtInvoiceAmt = 0;
        //     let TxtDrAmt = 0;
        //     let TxtNetInvoiceAmt = 0;
        //     let TxtPaidAmt = 0;
        //     let TxtBalAmt = 0;
        //     for (let i = 0; i < rows.length; i++) {
        //         let cells = rows[i].cells;


        //         InvoiceAmt = cells[10] ? cells[10].innerHTML : '';
        //         Debitnote = cells[11] ? cells[11].innerHTML : '';
        //         NetInvoiceAmt = cells[12] ? cells[12].innerHTML : '';
        //         PaidAmt = cells[13] ? cells[13].innerHTML : '';
        //         BalAmt = cells[14] ? cells[14].innerHTML : '';


        //         TxtInvoiceAmt += Number(InvoiceAmt);
        //         TxtDrAmt += Number(Debitnote);
        //         TxtNetInvoiceAmt += Number(NetInvoiceAmt);
        //         TxtPaidAmt += Number(PaidAmt);
        //         TxtBalAmt += Number(BalAmt);
        //     }
        //     console.log(TxtInvoiceAmt);
        //     console.log(TxtDrAmt);
        //     console.log(TxtNetInvoiceAmt);
        //     console.log(TxtPaidAmt);
        //     console.log(TxtBalAmt);
        //     $('#TxtInvoiceAmt').val(TxtInvoiceAmt);
        //     $('#InvoiceAmt').text(TxtInvoiceAmt);
        //     $('#TxtDrAmt').val(TxtDrAmt);
        //     $('#DebitNote').text(TxtDrAmt);
        //     $('#TxtNetInvoiceAmt').val(TxtNetInvoiceAmt);
        //     $('#NetInvoiceAmt').text(TxtNetInvoiceAmt);
        //     $('#TxtPaidAmt').val(TxtPaidAmt);
        //     $('#PaidAmt').text(TxtPaidAmt);
        //     $('#TxtBalAmt').val(TxtBalAmt);
        //     $('#BalAmt').text(TxtBalAmt);
        // }


        $(document).ready(function() {



            // var table1 = $('#Departmenttable').DataTable({

            //     scrollY: 200,
            //     deferRender: true,
            //     scroller: true,
            //     paging: false,
            //     info: false,
            //     ordering: false,
            //     searching: false,
            //     responsive: true,


            // });

            // var table1 = $('#DG3').DataTable({

            //     scrollY: 600,
            //     deferRender: true,
            //     scroller: true,
            //     paging: false,
            //     info: false,
            //     ordering: false,
            //     searching: false,
            //     responsive: true,


            // });

            // table1.column.adjust();


        });


        $(document).ready(function() {


            $("#ChkCity").change(function() {
                // Check if the checkbox is checked
                if ($(this).is(":checked")) {
                    // Disable the select element
                    $("#CmbCity").prop("disabled", true);
                } else {
                    // Enable the select element
                    $("#CmbCity").prop("disabled", false);
                }
            });



            $("#ChkAob").change(function() {
                // Check if the checkbox is checked
                if ($(this).is(":checked")) {
                    // Disable the select element
                    $("#cMBaob").prop("disabled", true);
                } else {
                    // Enable the select element
                    $("#cMBaob").prop("disabled", false);
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


            $("#ChkAllCategory").change(function() {
                // Check if the checkbox is checked
                if ($(this).is(":checked")) {
                    // Disable the select element
                    $("#CmbCategory").prop("disabled", true);
                } else {
                    // Enable the select element
                    $("#CmbCategory").prop("disabled", false);
                }
            });


            $("#ChkAllStatus").change(function() {
                // Check if the checkbox is checked
                if ($(this).is(":checked")) {
                    // Disable the select element
                    $("#CmbStatus").prop("disabled", true);
                } else {
                    // Enable the select element
                    $("#CmbStatus").prop("disabled", false);
                }
            });

            $("#ChkPriority").change(function() {
                // Check if the checkbox is checked
                if ($(this).is(":checked")) {
                    // Disable the select element
                    $("#CmbPriority").prop("disabled", true);
                } else {
                    // Enable the select element
                    $("#CmbPriority").prop("disabled", false);
                }
            });
            $("#ChkAllStateName").change(function() {
                // Check if the checkbox is checked
                if ($(this).is(":checked")) {
                    // Disable the select element
                    $("#CmbState").prop("disabled", true);
                } else {
                    // Enable the select element
                    $("#CmbState").prop("disabled", false);
                }
            });
            $("#ChkCountry").change(function() {
                // Check if the checkbox is checked
                if ($(this).is(":checked")) {
                    // Disable the select element
                    $("#CmbCountry").prop("disabled", true);
                } else {
                    // Enable the select element
                    $("#CmbCountry").prop("disabled", false);
                }
            });
            $("#ChkTerms").change(function() {
                // Check if the checkbox is checked
                if ($(this).is(":checked")) {
                    // Disable the select element
                    $("#CmbTerms").prop("disabled", true);
                } else {
                    // Enable the select element
                    $("#CmbTerms").prop("disabled", false);
                }
            });
            $("#ChkEnterCustomer").change(function() {
                // Check if the checkbox is checked
                if ($(this).is(":checked")) {
                    // Disable the select element
                    $("#CmbEnterCustomer").prop("disabled", true);
                } else {
                    // Enable the select element
                    $("#CmbEnterCustomer").prop("disabled", false);
                }
            });


            $("#ChkBlockAll").change(function() {
                // Check if the checkbox is checked
                if ($(this).is(":checked")) {
                    // Disable the select element
                    $("#CmbBlock").prop("disabled", true);
                } else {
                    // Enable the select element
                    $("#CmbBlock").prop("disabled", false);
                }
            });

            // $("#ChkAllRVDate").change(function() {
            //     // Check if the checkbox is checked
            //     if ($(this).is(":checked")) {
            //         // Disable the select element
            //         $("#TxtRvDateFrom").prop("disabled", true);
            //         $("#TxtRVDateTo").prop("disabled", true);
            //     } else {
            //         // Enable the select element
            //         $("#TxtRvDateFrom").prop("disabled", false);
            //         $("#TxtRVDateTo").prop("disabled", false);
            //     }
            // });




            // $("#ChkPortALL").change(function() {
            //     // Check if the checkbox is checked
            //     if ($(this).is(":checked")) {
            //         // Disable the select element
            //         $("#CmbPort").prop("disabled", true);
            //     } else {
            //         // Enable the select element
            //         $("#CmbPort").prop("disabled", false);
            //     }
            // });

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



            // $('#Button1').click(function(e) {
            //     e.preventDefault();
            //     $('#searchrmodw').modal('show');
            // });


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
