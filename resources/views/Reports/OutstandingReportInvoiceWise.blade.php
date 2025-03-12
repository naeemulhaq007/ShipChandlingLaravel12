@extends('layouts.app')



@section('title', 'InvoiceWise-Outstanding-Report')

@section('content_header')

@stop

@section('content')
    <?php echo View::make('partials.search') ?>
    <?php echo View::make('partials.searchves') ?>

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
                        <h4 class="text-black">Outstanding Report Invoice Wise</h4>
                    </b>

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">



                            <div class="row py-2 ">


                                <div class="inputbox col-sm-4 ml-2">
                                    <input type="date" class="" id="TxtInvDateFrom" required="required">
                                    <span class="Txtspan">
                                        Invoice Date From
                                    </span>
                                </div>

                                <div class="inputbox col-sm-4 ml-5">
                                    <input type="date" class="" id="TxtInvDateTo" required="required">
                                    <span class="Txtspan">
                                        To
                                    </span>
                                </div>
                                <div class="CheckBox1">
                                    <label class="input-group text-info ml-2">
                                        <input class=" " type="checkbox" name="ChkInvDAteAll" id="ChkInvDAteAll"
                                            value=""> All
                                    </label>
                                </div>
                            </div>
                            <div class="row py-2 ">


                                <div class="inputbox col-sm-4 ml-2">
                                    <input type="date" class="" disabled id="TxtDateFrom" required="required">
                                    <span class="Txtspan">
                                        Order Date From
                                    </span>
                                </div>

                                <div class="inputbox col-sm-4 ml-5">
                                    <input type="date" class="" disabled id="TxtDateTo" required="required">
                                    <span class="Txtspan">
                                        To
                                    </span>
                                </div>
                                <div class="CheckBox1">
                                    <label class="input-group text-info ml-2">
                                        <input class=" " type="checkbox" name="ChkOrderAll" id="ChkOrderAll" checked
                                            value=""> All
                                    </label>
                                </div>
                            </div>

                            <div class="row py-2 ">
                                <div class="inputbox col-sm-4 ml-2">
                                    <input type="text" class="" disabled id="TxtInvoiceNoFrom" required="required">
                                    <span class="Txtspan">
                                        Invoice From
                                    </span>
                                </div>

                                <div class="inputbox col-sm-4 ml-5">
                                    <input type="text" class="" disabled id="TxtInvoiceNoTo" required="required">
                                    <span class="Txtspan">
                                        To
                                    </span>
                                </div>
                                <div class="CheckBox1">
                                    <label class="input-group text-info ml-2">
                                        <input class=" " type="checkbox" name="ChkInvoiceAll" id="ChkInvoiceAll"
                                            checked value=""> All
                                    </label>
                                </div>
                            </div>
                            <div class="row py-2 ">
                                <div class="inputbox col-sm-4 ml-2">
                                    <input type="text" class="" disabled id="TxtOverDaysFrom" required="required">
                                    <span class="Txtspan">
                                        Over Days From
                                    </span>
                                </div>

                                <div class="inputbox col-sm-4 ml-5">
                                    <input type="text" class="" disabled id="TxtOverDaysTo" required="required">
                                    <span class="Txtspan">
                                        To
                                    </span>
                                </div>
                                <div class="CheckBox1">
                                    <label class="input-group text-info ml-2">
                                        <input class=" " type="checkbox" name="ChkAllOverDays" id="ChkAllOverDays"
                                            checked value=""> All
                                    </label>
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="input-group col-sm-12 ">

                                    <div class="inputbox col-sm-9">
                                        <select name="CmbTerms" id="CmbTerms" disabled>
                                            @foreach ($Terms as $Termsitem)
                                                <option value="{{ $Termsitem->Terms }}"> {{ $Termsitem->Terms }}</option>
                                            @endforeach
                                        </select>
                                        <span class="Txtspan">
                                            Terms
                                        </span>
                                    </div>

                                    <div class="CheckBox1">
                                        <label class="input-group text-info">
                                            <input class=" " type="checkbox" name="ChkTermsAll" id="ChkTermsAll"
                                                checked value=""> All
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="input-group col-sm-12 ">


                                    <div class="inputbox col-sm-9">
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
                                        <label class="input-group text-info">
                                            <input class=" " type="checkbox" name="ChkAllCountry"
                                                id="ChkAllCountry" checked value=""> All
                                        </label>
                                    </div>

                                </div>
                            </div>



                            <div class="row ml-1 py-2">
                                <button class="btn btn-success  mx-2" id="Button4" role="button"> <i
                                        class="fa fa-file-text mr-1" aria-hidden="true"></i>Show</button>
                                <button class="btn btn-primary mx-2" id="Button3" role="button"> <i
                                        class="fa fa-door-open mr-1" aria-hidden="true"></i>Print</button>
                                <button class="btn btn-danger mx-2" id="CmdExit" role="button"> <i
                                        class="fa fa-door-open mr-1" aria-hidden="true"></i>Exit</button>
                            </div>

                        </div>
                        <div class="col-lg-6">
                            <div class="row py-2">
                                <div class="input-group col-sm-12 ">



                                    <div hidden class="inputbox col-sm-2 ">
                                        <input type="hidden" class=" " id="TxtCustomerCode" required="required">
                                        <span class="ml-2">
                                            C.Code
                                        </span>
                                    </div>
                                    <div hidden class="inputbox col-sm-2 ">
                                        <input type="hidden" class=" " id="TxtActCode" required="required">
                                        <span class="ml-2">
                                            Act.Code
                                        </span>
                                    </div>

                                    <div class="inputbox col-sm-8">
                                        <input type="text" class="" id="CmbCustomer" disabled
                                            required="required">
                                        <span class="Txtspan">
                                            Customer Name
                                        </span>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-info" style="cursor: pointer;" id="Button2"><i
                                                class="fas fa-search"></i></span>
                                    </div>
                                    <div class="CheckBox1">
                                        <label class="input-group text-info ml-2">
                                            <input class=" " type="checkbox" name="ChkAllCustomer"
                                                id="ChkAllCustomer" checked value=""> All
                                        </label>
                                    </div>
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
                                        <input type="text" class="" id="CmbVessel" disabled
                                            required="required">
                                        <span class="Txtspan">
                                            Vessel Name
                                        </span>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-info" style="cursor: pointer;" id="Button1"><i
                                                class="fas fa-search"></i></span>
                                    </div>
                                    <div class="CheckBox1">
                                        <label class="input-group text-info ml-2">
                                            <input class="" type="checkbox" name="AllVessel" id="AllVessel"
                                                checked value=""> All
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="input-group col-sm-12 ">




                                    <div class="inputbox col-sm-8">
                                        <select name="CmbStatus" id="CmbStatus" disabled>
                                            @foreach ($LogStatus as $LogStatusitem)
                                                <option value="{{ $LogStatusitem->LogStatus }}">
                                                    {{ $LogStatusitem->LogStatus }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="Txtspan">
                                            Status
                                        </span>
                                    </div>

                                    <div class="CheckBox1">
                                        <label class="input-group text-info ml-1">
                                            <input class=" " type="checkbox" name="ChkStatusAll" id="ChkStatusAll"
                                                checked value=""> All
                                        </label>
                                    </div>
                                </div>
                            </div>


                            <div class="row py-2">
                                <div class="input-group col-sm-12 ">
                                    <div id="CHKBANKDTL" class="CheckBox1 ml-2">
                                        <label>
                                          <input type="checkbox"/> Show Bank Detail
                                          <span class="checkbox"></span>
                                        </label>
                                      </div>
                                </div>
                            </div>

                            <div class="row py-2 ">


                                <div class="inputbox col-sm-4 ml-2">
                                    <input type="date" class="" disabled id="TxtDueDateFrom" required="required">
                                    <span class="Txtspan">
                                        Due Date From
                                    </span>
                                </div>

                                <div class="inputbox col-sm-4">
                                    <input type="date" class="" disabled id="TxtDueDateTo" required="required">
                                    <span class="Txtspan">
                                        To
                                    </span>
                                </div>
                                <div class="CheckBox1">
                                    <label class="input-group text-info">
                                        <input class=" " type="checkbox" name="ChkDueDateAll" id="ChkDueDateAll" checked
                                            value=""> All
                                    </label>
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="input-group col-sm-8 ">
                                    <div class="rdform row mt-3 ml-1">
                                        <input id="OptUnclearInvoice" type="radio" class="rainput" name="hopping"
                                            value="">
                                        <label class="ralabel mx-2" for="OptUnclearInvoice"><span></span>Sell Price</label>
                                        <input id="OptClearInvoices" type="radio" class="rainput" name="hopping"
                                            value="">
                                        <label class="ralabel  mx-2" for="OptClearInvoices"><span></span>Quote Entry</label>
                                        <input id="OptAll" type="radio" class="rainput" name="hopping"
                                            value="" checked>
                                        <label class="ralabel  mx-2" for="OptAll"><span></span>Create
                                            Quote</label>
                                        <div class="worm">
                                            @for ($i = 0; $i < 30; $i++)
                                                <div class="worm__segment"></div>
                                            @endfor
                                        </div>

                                    </div>
                                </div>
                                <div class="input-group col-sm-8 ml-2">
                                    <div class="rdform row mt-3 ml-3">
                                        <input id="OptCustomerDetail" type="radio" class="rainput" autocomplete="off"
                                            name="hopping2" value="" checked>
                                        <label class="ralabel mx-2" for="OptCustomerDetail"><span></span>Delivery Report</label>
                                        <input id="OptCustomerGroup" type="radio" class="rainput" autocomplete="off"
                                            name="hopping2" value="">
                                        <label class="ralabel  mx-2" for="OptCustomerGroup"><span></span>Customer Group</label>
                                        <div class="worm2">
                                            @for ($j = 0; $j < 30; $j++)
                                                <div class="worm__segment2"></div>
                                            @endfor
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            </div>
            <div class=" pb-5 ">
                <div class="rounded shadow ">
                    <table class="table" id="DG1">
                    <thead class="">
                        <tr>
                            <th>Invoice&nbsp;No.</th>
                            <th style="width: 110px">InvDate</th>
                            <th>VSNNo.</th>
                            <th>Terms</th>
                            <th>Due&nbsp;Date</th>
                            <th>Due&nbsp;NDays</th>
                            <th>Inv&nbsp;NDays</th>
                            <th>Country</th>
                            <th style="width: 250px">Customer&nbsp;Name</th>
                            <th hidden>Customer&nbsp;code</th>
                            <th style="width: 200px">Vessel&nbsp;Name</th>
                            <th>Department</th>
                            <th>Cust&nbsp;Ref&nbsp;No.</th>
                            <th>Status</th>
                            <th>Chq&nbsp;#</th>
                            <th>Invoice&nbsp;Amount</th>
                            <th>RV&nbsp;#</th>
                            <th>Received&nbsp;Amount</th>
                            <th>Cr&nbsp;Note&nbsp;Amt</th>
                            <th>Balance&nbsp;Amount</th>
                        </tr>
                    </thead>
                    <tbody id="DG1body">

                    </tbody>
                </table>
                <div class="row py-2">
                    <h5 class="ml-auto text-blue">Grand Total : </h5>
                    <input type="text" name="TxtTotInvoiceAmt" class="form-control col-sm-1  mx-1 " id="TxtTotInvoiceAmt">
                    <input type="text" name="TxtTotRecAmt" class="form-control col-sm-1  mx-1 " id="TxtTotRecAmt">
                    <input type="text" name="TxtTotCrNoteAmt" class="form-control col-sm-1  mx-1 " id="TxtTotCrNoteAmt">
                    <input type="text" name="TxtTotBalAmt" class="form-control col-sm-1  mx-1 mr-3" id="TxtTotBalAmt">
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
                transform: translateX(7.6em);
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
                transform: translateX(15.9em);
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
                transform: translateX(10.45em);
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
            function tabcomposer() {
  let table = document.getElementById('DG1body');
  let rows = table.rows;

  let dataarray = [];
  for (let i = 0; i < rows.length; i++) {
    let cells = rows[i].cells;

    dataarray.push({
        InvoiceNo: cells[0] ? cells[0].innerHTML : '',
        InvDate: cells[1] ? cells[1].innerHTML : '',
        VSNNo: cells[2] ? cells[2].innerHTML : '',
        Terms: cells[3] ? cells[3].innerHTML : '',
        DueDate: cells[4] ? cells[4].innerHTML : '',
        DueNDays: cells[5] ? cells[5].innerHTML : '',
        InvNDays: cells[6] ? cells[6].innerHTML : '',
        Country: cells[7] ? cells[7].innerHTML : '',
        CustomerName : cells[8] ? cells[8].innerHTML : '',
        Customercode: cells[9] ? cells[9].innerHTML : '',
        VesselName: cells[10] ? cells[10].innerHTML : '',
        Department: cells[11] ? cells[11].innerHTML : '',
        CustRefNo: cells[12] ? cells[12].innerHTML : '',
        Status: cells[13] ? cells[13].innerHTML : '',
        Chq: cells[14] ? cells[14].innerHTML : '',
        InvoiceAmount: cells[15] ? cells[15].innerHTML : '',
        RV: cells[16] ? cells[16].innerHTML : '',
        ReceivedAmount: cells[17] ? cells[17].innerHTML : '',
        CrNoteAmt: cells[18] ? cells[18].innerHTML : '',
        BalanceAmount: cells[19] ? cells[19].innerHTML : '',


    });
  }

  return dataarray;
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





                var table1 = $('#DG1').DataTable({

                    scrollY: 600,
                    scrollX: true,
                    deferRender: true,
                    scroller: true,
                    paging: false,
                    info: false,
                    ordering: false,
                    searching: false,
                    responsive: true,


                });

                // table1.column.adjust();


                var odate = new Date();
                const today = odate.toISOString().substring(0, 10);
                $('#TxtDateFrom').val(today);
                $('#TxtDateTo').val(today);
                $('#TxtInvDateFrom').val(today);
                $('#TxtInvDateTo').val(today);
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



                $("#ChkOrderAll").change(function() {
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

                $("#ChkInvDAteAll").change(function() {
                    // Check if the checkbox is checked
                    if ($(this).is(":checked")) {
                        // Disable the select element
                        $("#TxtInvDateFrom").prop("disabled", true);
                        $("#TxtInvDateTo").prop("disabled", true);
                    } else {
                        // Enable the select element
                        $("#TxtInvDateFrom").prop("disabled", false);
                        $("#TxtInvDateTo").prop("disabled", false);
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
                $("#ChkAllOverDays").change(function() {
                    // Check if the checkbox is checked
                    if ($(this).is(":checked")) {
                        // Disable the select element
                        $("#TxtOverDaysFrom").prop("disabled", true);
                        $("#TxtOverDaysTo").prop("disabled", true);
                    } else {
                        // Enable the select element
                        $("#TxtOverDaysFrom").prop("disabled", false);
                        $("#TxtOverDaysTo").prop("disabled", false);
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

                $("#ChkStatusAll").change(function() {
                    // Check if the checkbox is checked
                    if ($(this).is(":checked")) {
                        // Disable the select element
                        $("#CmbStatus").prop("disabled", true);
                    } else {
                        // Enable the select element
                        $("#CmbStatus").prop("disabled", false);
                    }
                });

                $("#ChkAllCountry").change(function() {
                    // Check if the checkbox is checked
                    if ($(this).is(":checked")) {
                        // Disable the select element
                        $("#CmbCountry").prop("disabled", true);
                    } else {
                        // Enable the select element
                        $("#CmbCountry").prop("disabled", false);
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

                $('#Button2').click(function(e) {
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


                $('#Button4').click(function(e) {
                e.preventDefault();
                var TxtDateTo = $('#TxtInvDateTo').val();
                var TxtDateFrom = $('#TxtInvDateFrom').val();

                var Qry = "";
                if (!$("#ChkOrderAll").is(":checked")) {
                    if (Qry !== "") Qry += " and ";
                    Qry += "OrderDate>='" + $("#TxtDateFrom").val() + "' and OrderDate<='" + $("#TxtDateTo").val() + "'";
                }

                if (!$("#ChkDueDateAll").is(":checked")) {
                    if (Qry !== "") Qry += " and ";
                    Qry += "DueDate>='" + $("#TxtDueDateFrom").val() + "' and DueDate<='" + $("#TxtDueDateTo").val() + "'";
                }

                if (!$("#ChkAllCustomer").is(":checked")) {
                    if (Qry !== "") Qry += " and ";
                    Qry += "CustomerCode=" + parseFloat($("#TxtCustomerCode").val());
                }

                if (!$("#AllVessel").is(":checked")) {
                    if (Qry !== "") Qry += " and ";
                    Qry += "VesselName='" + $("#CmbVessel").val() + "'";
                }

                if (!$("#ChkAllCountry").is(":checked")) {
                    if (Qry !== "") Qry += " and ";
                    Qry += "Country='" + $("#CmbCountry").val() + "'";
                }

                if (!$("#ChkInvoiceAll").is(":checked")) {
                    if (Qry !== "") Qry += " and ";
                    Qry += "PONO>=" + parseFloat($("#TxtInvoiceNoFrom").val()) + " and PONO<=" + parseFloat($("#TxtInvoiceNoTo").val());
                }

                if (!$("#ChkTermsAll").is(":checked")) {
                    if (Qry !== "") Qry += " and ";
                    Qry += "Terms='" + $("#CmbTerms").val() + "'";
                }

                if (!$("#ChkStatusAll").is(":checked")) {
                    if (Qry !== "") Qry += " and ";
                    Qry += "Status='" + $("#CmbStatus").val() + "'";
                }

                if (!$("#ChkAllOverDays").is(":checked")) {
                    if (Qry !== "") Qry += " and ";
                    Qry += "(ToDay-InvDate)>=" + parseFloat($("#TxtOverDaysFrom").val()) + " and (ToDay-InvDate)<=" + parseFloat($("#TxtOverDaysTo").val());
                }


                var Qry2 ='';

                if ($("#ChkBill").is(":checked")) {

                Qry2 = "Date>='" + $('#TxtInvDateFrom').val() + "' and Date<='" + $('#TxtInvDateTo').val() + "'";


                    if (!$("#ChkInvoiceAll").is(":checked")) {
                        if (Qry2 !== "") Qry2 += " and ";
                        Qry2 += "BillNo>=" + $('#TxtInvoiceNoFrom').val() + " and BillNo<=" + $('#TxtInvoiceNoTo').val();
                    }

                    if (!$("#ChkAllCountry").is(":checked")) {
                    if (Qry2 !== "") Qry2 += " and ";
                        Qry2 += "Country='" + $('#CmbCountry').val() + "'";
                    }

                    if (!$("#ChkAllCustomer").is(":checked")) {
                    if (Qry2 !== "") Qry2 += " and ";
                        Qry2 += "ActCode='" + $('#TxtActCode').val() + "'";
                    }

                }



                console.log(Qry);
                console.log(Qry2);
                ajaxSetup();
                $.ajax({
                    url: '/OutstandingReportshow',
                    type: 'POST',
                    data: {
                        Qry2: Qry2, // Corrected to pass the Qry variable
                        Qry: Qry, // Corrected to pass the Qry variable
                        TxtDateTo: TxtDateTo,
                        TxtDateFrom: TxtDateFrom,
                    },
                    beforeSend: function() {
                        // Show the overlay and spinner before sending the request
                        $('.overlay').show();
                    },
                    success: function(response) {
                        console.log(response);
                        var data = response.SPOutstanding;
                        var data2 = response.QryBillMaster;
                        var TxtTotInvoiceAmt = '';
                        var TxtTotRecAmt = '';
                        var TxtTotCrNoteAmt = '';
                        var TxtTotBalAmt = '';
                        let table = document.getElementById('DG1body');
                        table.innerHTML = ""; // Clear the table
                        data.forEach(function(item) {

                                var MNetAmount = item.NetAmount ? parseFloat(item.NetAmount).toFixed(2) : '';
                                var NCrNoteAmt = item.MCrNoteAmt ? parseFloat(item.MCrNoteAmt).toFixed(2) : '';
                                var MCrNoteAmount = item.CrNoteAmount ? parseFloat(item.CrNoteAmount).toFixed(2) : '';
                                var MRVAmount = item.MRecAmount ?  parseFloat(item.MRecAmount).toFixed(2) : '';
                                var MTotalRec = MRVAmount + MCrNoteAmount + NCrNoteAmt;
                                var MBalance = parseFloat(MNetAmount) - parseFloat(MTotalRec);
                                MBalance = parseFloat(MBalance).toFixed(2) ;

                                if ($("#OptUnclearInvoice").is(":checked") && MBalance > 0) {
                                    let row = table.insertRow();
                                    function createCell(content) {
                                            let cell = row.insertCell();
                                            cell.innerHTML = content;
                                            return cell;
                                        }

                                createCell(item.PONo ? item.PONo : '');
                                var datex = new Date(item.InvDate ? item.InvDate : '');
                                const invdate = datex.toISOString().substring(0, 10);
                                createCell(invdate);
                                createCell(item.VSNNo ? item.VSNNo : '');
                                createCell(item.Terms ? item.Terms : '');
                                var MTerms = item.Terms ? item.Terms : ''
                                var MDueDate = new Date(item.DueDate ? item.DueDate : '');

                                var timeDiff = Math.abs(MDueDate.getTime() - datex.getTime());
                                var daysDiff = Math.ceil(timeDiff / (24 * 60 * 60 * 1000));
                                const ddate = MDueDate.toISOString().substring(0, 10);
                                createCell(ddate);
                                var timeDiffcol = createCell('');
                                 if (daysDiff > 0) {
                                     timeDiffcol.innerHTML = daysDiff;
                                 }else{
                                     timeDiffcol.innerHTML = '';
                                    }
                                    if ((item.InvNDays ? item.InvNDays : '') > 0) {
                                        createCell((item.InvNDays ? item.InvNDays : ''));
                                    }else{
                                        createCell('');
                                    }
                                createCell(item.Country ? item.Country : '');
                                createCell(item.CustomerName ? item.CustomerName : '');
                                createCell(item.CustomerCode ? item.CustomerCode : '').hidden = 'true';
                                var VesselNamecol = createCell(item.VesselName ? item.VesselName : '');
                                createCell(item.Department ? item.Department : '');
                                createCell(item.PurchaseOrderNo ? item.PurchaseOrderNo : '');
                                createCell(item.Status ? item.Status : '');
                                createCell(item.ChqNo ? item.ChqNo : '');
                                createCell(item.NetAmount ? parseFloat(item.NetAmount).toFixed(2) : '');
                                createCell(item.RVNO ? item.RVNO : '');
                                createCell(MRVAmount);
                                createCell(MCrNoteAmount+NCrNoteAmt);
                                createCell(MBalance);


                                TxtTotInvoiceAmt += Number(item.NetAmount ? item.NetAmount : 0);
                                         TxtTotRecAmt += Number(MRVAmount ? MRVAmount : 0);
                                         TxtTotCrNoteAmt += Number(MCrNoteAmount ? MCrNoteAmount : 0) + parseFloat(NCrNoteAmt ? NCrNoteAmt : 0);
                                         TxtTotBalAmt += Number(MBalance ? MBalance : 0);

                                         if (timeDiff > 90) {
                                            timeDiffcol.style.color = 'Red';
                                            VesselNamecol.style.BackgroundColor = 'pink';
                                         }
                                }

                                if ($("#OptClearInvoices").is(":checked") && MBalance <= 0) {
                                    let row = table.insertRow();
                                    function createCell(content) {
                                            let cell = row.insertCell();
                                            cell.innerHTML = content;
                                            return cell;
                                        }

                                    createCell(item.PONo ? item.PONo : '');
                                    var datex = new Date(item.InvDate ? item.InvDate : '');
                                    const invdate = datex.toISOString().substring(0, 10);
                                    createCell(invdate);
                                    createCell(item.VSNNo ? item.VSNNo : '');
                                    createCell(item.Terms ? item.Terms : '');
                                    var MTerms = item.Terms ? item.Terms : '';
                                    var MDueDate = new Date(item.DueDate ? item.DueDate : '');
                                    const ddate = MDueDate.toISOString().substring(0, 10);
                                    createCell(ddate);
                                    var timeDiff = Math.abs(MDueDate.getTime() - datex.getTime());
                                var daysDiff = Math.ceil(timeDiff / (24 * 60 * 60 * 1000));

                                   var timeDiffcol = createCell('');
                                    if (daysDiff > 0) {
                                        timeDiffcol.innerHTML = daysDiff;
                                    }else{
                                        timeDiffcol.innerHTML = '';
                                    }
                                    createCell('');
                                    createCell(item.Country ? item.Country : '');
                                    createCell(item.CustomerName ? item.CustomerName : '');
                                    createCell(item.CustomerCode ? item.CustomerCode : '').hidden = 'true';
                                    var VesselNamecol = createCell(item.VesselName ? item.VesselName : '');
                                    createCell(item.Department ? item.Department : '');
                                    createCell(item.CustomerRefNo ? item.CustomerRefNo : '');
                                    createCell(item.Status ? item.Status : '');
                                    createCell(item.ChqNo ? item.ChqNo : '');
                                    createCell(item.NetAmount ? parseFloat(item.NetAmount).toFixed(2) : '');
                                    createCell(item.RVNO ? item.RVNO : '');
                                    createCell(MRVAmount);
                                    createCell(MCrNoteAmount+NCrNoteAmt);
                                    createCell(MBalance);

                                    TxtTotInvoiceAmt += Number(item.NetAmount ? item.NetAmount : 0);
                                         TxtTotRecAmt += Number(MRVAmount ? MRVAmount : 0);
                                         TxtTotCrNoteAmt += Number(MCrNoteAmount ? MCrNoteAmount : 0) + parseFloat(NCrNoteAmt ? NCrNoteAmt : 0);
                                         TxtTotBalAmt += Number(MBalance ? MBalance : 0);

                                    if (daysDiff > 90) {
                                       timeDiffcol.style.color = 'Red';
                                       VesselNamecol.style.BackgroundColor = 'pink';
                                    }


                                }

                                if ($("#OptAll").is(":checked") ) {
                                    let row = table.insertRow();
                                    function createCell(content) {
                                            let cell = row.insertCell();
                                            cell.innerHTML = content;
                                            return cell;
                                        }

                                createCell(item.PONo ? item.PONo : '');
                                var datex = new Date(item.InvDate ? item.InvDate : '');
                                const invddate = datex.toISOString().substring(0, 10);
                                var MDueDate = new Date(item.DueDate ? item.DueDate : '');

                                var timeDiff = Math.abs(MDueDate.getTime() - datex.getTime());
                                var daysDiff = Math.ceil(timeDiff / (24 * 60 * 60 * 1000));

                                const ddate = MDueDate.toISOString().substring(0, 10);
                                createCell(invddate);
                                createCell(item.VSNNo ? item.VSNNo : '');
                                createCell(item.Terms ? item.Terms : '');
                                var MTerms = item.Terms ? item.Terms : ''
                                createCell(ddate);
                                var timeDiffcol = createCell('');
                                 if (daysDiff > 0) {
                                     timeDiffcol.innerHTML = daysDiff;
                                 }else{
                                     timeDiffcol.innerHTML = '';
                                    }
                                    if (MBalance > 0) {
                                        if (daysDiff > 0) {
                                        timeDiffcol.innerHTML = daysDiff;
                                        }else{
                                            timeDiffcol.innerHTML = '';
                                        }
                                        if ((item.InvNDays ? item.InvNDays : '') > 0) {
                                        createCell((item.InvNDays ? item.InvNDays : ''));
                                    }else{
                                        createCell('');
                                    }
                                    }else{
                                        timeDiffcol.innerHTML = '';
                                        createCell('');
                                    }
                                createCell(item.Country ? item.Country : '');
                                createCell(item.CustomerName ? item.CustomerName : '');
                                createCell(item.CustomerCode ? item.CustomerCode : '').hidden = 'true';
                                var VesselNamecol = createCell(item.VesselName ? item.VesselName : '');
                                createCell(item.Department ? item.Department : '');
                                createCell(item.CustomerRefNo ? item.CustomerRefNo : '');
                                createCell(item.Status ? item.Status : '');
                                createCell(item.ChqNo ? item.ChqNo : '');
                                createCell(item.NetAmount ? parseFloat(item.NetAmount).toFixed(2) : '');
                                createCell(item.RVNO ? item.RVNO : '');
                                createCell(MRVAmount);
                                createCell(MCrNoteAmount+NCrNoteAmt);
                                createCell(MBalance);



                                        TxtTotInvoiceAmt += Number(item.NetAmount ? item.NetAmount : 0);
                                         TxtTotRecAmt += Number(MRVAmount ? MRVAmount : 0);
                                         TxtTotCrNoteAmt += Number(MCrNoteAmount ? MCrNoteAmount : 0) + parseFloat(NCrNoteAmt ? NCrNoteAmt : 0);
                                         TxtTotBalAmt += Number(MBalance ? MBalance : 0);

                                         if (daysDiff > 90) {
                                            timeDiffcol.style.color = 'Red';
                                            VesselNamecol.style.BackgroundColor = 'pink';
                                         }
                                }

                        });
                        data2.forEach(function(item2) {
                            // var MBillNo1 = item2.BillNo ? item2.BillNo : '';
                            var MBillAmount = item2.BillMaster.BillNo ? parseFloat(item2.BillMaster.BillAmount).toFixed(2) : '';
                            var MRVAmount = item2.MRVAmount ? parseFloat(item2.MRVAmount).toFixed(2) : '';

                            var MBalanceBillAmt = MBillAmount - MRVAmount;

                            if ($("#OptUnclearInvoice").is(":checked") && MBalanceBillAmt > 0) {
                                let row = table.insertRow();
                                    function createCell(content) {
                                            let cell = row.insertCell();
                                            cell.innerHTML = content;
                                            return cell;
                                        }

                                        createCell(item2.BillMaster.BillNo ? item2.BillMaster.BillNo : '');
                                        var MBillDate = new Date(item2.BillMaster.Date ? item2.BillMaster.Date : '');
                                        const ddate = MBillDate.toISOString().substring(0, 10);
                                        createCell(ddate);
                                        createCell('');
                                        createCell(item.Terms ? item.Terms : '');
                                        var MTerms = item.Terms ? item.Terms : ''
                                        var dueDate = new Date(item2.BillMaster.DueDate ? item2.BillMaster.DueDate : '');
                                        const duedate = dueDate.toISOString().substring(0, 10);
                                        createCell(duedate);
                                        var datex = new Date();
                                        var timeDiff = Math.abs(MBillDate.getTime() - datex.getTime());
                                var daysDiff = Math.ceil(timeDiff / (24 * 60 * 60 * 1000));

                                        var timeDiffcol = createCell('');
                                         if (daysDiff > 0) {
                                             timeDiffcol.innerHTML = daysDiff;
                                         }else{
                                             timeDiffcol.innerHTML = 0;
                                            }
                                        createCell('');
                                        createCell(item2.BillMaster.Country ? item2.BillMaster.Country : '');
                                        createCell(item2.BillMaster.CustomerName ? item2.BillMaster.CustomerName : '');
                                        createCell(item2.BillMaster.CustomerCode ? item2.BillMaster.CustomerCode : '').hidden = 'true';
                                        var VesselNamecol = createCell(item2.BillMaster.VesselName ? item2.BillMaster.VesselName : '');
                                        createCell(item2.BillMaster.Department ? item2.BillMaster.Department : '');
                                        createCell(item2.BillMaster.RefNo ? item2.BillMaster.RefNo : '');
                                        createCell('Bill Income');
                                        createCell('');
                                        createCell(item2.BillMaster.BillAmount ? parseFloat(item2.BillMaster.BillAmount).toFixed(2) : '');
                                        createCell('');
                                        createCell(MRVAmount);
                                        createCell(0);
                                        createCell(parseFloat(item2.BillMaster.BillAmount ? item2.BillMaster.BillAmount : '') - parseFloat(MRVAmount));
                                         TxtTotInvoiceAmt += parseFloat(item.NetAmount);
                                         TxtTotRecAmt += parseFloat(MRVAmount);
                                         TxtTotCrNoteAmt += parseFloat(MCrNoteAmount) + parseFloat(NCrNoteAmt);
                                         TxtTotBalAmt += parseFloat(MBalance);

                                         if (daysDiff > 90) {
                                            timeDiffcol.style.color = 'Red';
                                            VesselNamecol.style.BackgroundColor = 'pink';
                                         }


                            }
                            if ($("#OptClearInvoices").is(":checked") && MBalanceBillAmt <= 0) {
                                let row = table.insertRow();
                                    function createCell(content) {
                                            let cell = row.insertCell();
                                            cell.innerHTML = content;
                                            return cell;
                                        }

                                createCell(item2.BillMaster.BillNo ? item2.BillMaster.BillNo : '');
                                var MBillDate = new Date(item2.BillMaster.Date ? item2.BillMaster.Date : '');
                                const ddate = MBillDate.toISOString().substring(0, 10);
                                createCell(ddate);
                                createCell('');
                                createCell(item.Terms ? item.Terms : '');
                                var MTerms = item.Terms ? item.Terms : ''
                                var dueDate = new Date(item2.BillMaster.DueDate ? item2.BillMaster.DueDate : '');
                                    const duedate = dueDate.toISOString().substring(0, 10);
                                createCell(duedate);
                                var datex = new Date();
                                var timeDiff = Math.abs(MBillDate.getTime() - datex.getTime());
                                var daysDiff = Math.ceil(timeDiff / (24 * 60 * 60 * 1000));


                                var timeDiffcol = createCell('');
                                 if (daysDiff > 0) {
                                     timeDiffcol.innerHTML = daysDiff;
                                 }else{
                                     timeDiffcol.innerHTML = 0;
                                    }
                                createCell('');
                                createCell('');
                                createCell(item2.BillMaster.CustomerName ? item2.BillMaster.CustomerName : '');
                                createCell(item2.BillMaster.CustomerCode ? item2.BillMaster.CustomerCode : '');
                                var VesselNamecol = createCell(item2.BillMaster.VesselName ? item2.BillMaster.VesselName : '');
                                createCell(item2.BillMaster.Department ? item2.BillMaster.Department : '');
                                createCell(item2.BillMaster.RefNo ? item2.BillMaster.RefNo : '');
                                createCell('Bill Income');
                                createCell('');
                                createCell(item2.BillMaster.BillAmount ? item2.BillMaster.BillAmount : '');
                                createCell('');
                                createCell(MRVAmount);
                                createCell(0);
                                createCell(parseFloat(item2.BillMaster.BillAmount ? parseFloat(item2.BillMaster.BillAmount).toFixed(2) : '') - parseFloat(MRVAmount));

                                 TxtTotInvoiceAmt += Number(item.NetAmount ? item.NetAmount : 0);
                                         TxtTotRecAmt += Number(MRVAmount ? MRVAmount : 0);
                                         TxtTotCrNoteAmt += 0;
                                         TxtTotBalAmt += Number(parseFloat(item2.BillMaster.BillAmount ? item2.BillMaster.BillAmount : 0) - parseFloat(MRVAmount ? MRVAmount : 0));
                                if (daysDiff > 90) {
                                timeDiffcol.style.color = 'Red';
                                VesselNamecol.style.BackgroundColor = 'pink';
                                }

                            }
                            if ($("#OptAll").is(":checked")) {
                                let row = table.insertRow();
                                    function createCell(content) {
                                            let cell = row.insertCell();
                                            cell.innerHTML = content;
                                            return cell;
                                        }
                                createCell(item2.BillMaster.BillNo ? item2.BillMaster.BillNo : '');
                                var MBillDate = new Date(item2.BillMaster.Date ? item2.BillMaster.Date : '');
                                const ddate = MBillDate.toISOString().substring(0, 10);
                                createCell(ddate);
                                createCell('');
                                createCell('Bill Income');
                                var timeDiff = Math.abs(MBillDate.getTime() - datex.getTime());
                                var daysDiff = Math.ceil(timeDiff / (24 * 60 * 60 * 1000));

                                var MTerms = item.Terms ? item.Terms : ''
                                var dueDate = new Date(item2.BillMaster.DueDate ? item2.BillMaster.DueDate : '');
                                    const duedate = dueDate.toISOString().substring(0, 10);
                                    createCell(duedate);
                                var datex = new Date();
                                var timeDiffcol = createCell('');
                                 if (daysDiff > 0) {
                                     timeDiffcol.innerHTML = daysDiff;
                                 }else{
                                     timeDiffcol.innerHTML = 0;
                                    }
                                createCell('');
                                createCell('');
                                createCell(item2.BillMaster.CustomerName ? item2.BillMaster.CustomerName : '');
                                createCell(item2.BillMaster.CustomerCode ? item2.BillMaster.CustomerCode : '').hidden = 'true';
                                var VesselNamecol = createCell(item2.BillMaster.VesselName ? item2.BillMaster.VesselName : '');
                                createCell(item2.BillMaster.Department ? item2.BillMaster.Department : '');
                                createCell(item2.BillMaster.RefNo ? item2.BillMaster.RefNo : '');
                                createCell('Bill Income');
                                createCell('');
                                createCell(item2.BillMaster.BillAmount ? item2.BillMaster.BillAmount : '');
                                createCell('');
                                createCell(MRVAmount);
                                createCell(0);
                                createCell(parseFloat(item2.BillMaster.BillAmount ? parseFloat(item2.BillMaster.BillAmount).toFixed(2) : '') - parseFloat(MRVAmount));


                                         TxtTotInvoiceAmt += Number(item.NetAmount ? item.NetAmount : 0);
                                         TxtTotRecAmt += Number(MRVAmount ? MRVAmount : 0);
                                         TxtTotCrNoteAmt += 0;
                                         TxtTotBalAmt += Number(parseFloat(item2.BillMaster.BillAmount ? item2.BillMaster.BillAmount : 0) - parseFloat(MRVAmount ? MRVAmount : 0));

                                         if (daysDiff > 90) {
                                            timeDiffcol.style.color = 'Red';
                                            VesselNamecol.style.BackgroundColor = 'pink';
                                         }

                            }



                        });

                        $('#TxtTotInvoiceAmt').val(parseFloat(TxtTotInvoiceAmt).toFixed(2));
                        $('#TxtTotRecAmt').val(parseFloat(TxtTotRecAmt).toFixed(2));
                        $('#TxtTotCrNoteAmt').val(parseFloat(TxtTotCrNoteAmt).toFixed(2));
                        $('#TxtTotBalAmt').val(parseFloat(TxtTotBalAmt).toFixed(2));

                        table1.columns.adjust();

                        // Process the filtered results returned from the controller
                        // Here you can update your view with the filtered data
                    },
                    error: function(data) {
                        console.log(data);
                        $('.overlay').hide();
                    },
                    complete: function() {
                        $('.overlay').hide();
                    }
                });
            });





            $('#Button3').click(function (e) {
                e.preventDefault();
                var dataarray = tabcomposer();
                console.log(dataarray);
                ajaxSetup();
                $.ajax({
                    url: '/OutstandingReportpr',
                    type: 'POST',
                    data: {
                        Table: dataarray, // Corrected to pass the Qry variable
                    },
                    beforeSend: function() {
                        // Show the overlay and spinner before sending the request
                        $('.overlay').show();
                    },
                    success: function(response) {
                        console.log(response);
                        if (response.Message == 'saved') {
                            var CHKBANKDTL = $("#CHKBANKDTL").is(":checked");
                            var DateFrom = $('#TxtInvDateFrom').val();
                            var DateTo = $('#TxtInvDateTo').val();
                            window.location='Outstanding-Report-InvoiceWise-Print?CHKBANKDTL='+CHKBANKDTL+'&DateFrom='+DateFrom+'&DateTo='+DateTo;
                            // alert('senc');
                        }
                    },
                    error: function(data) {
                        console.log(data);
                        $('.overlay').hide();
                    },
                    complete: function() {
                        $('.overlay').hide();
                    }
                });


            });








            });
        </script>




    @stop


    @section('content')
