@extends('layouts.app')



@section('title', 'RFQ-Vessel-Summary')

@section('content_header')

@stop

@section('content')
    <?php echo View::make('partials.impalistitemmodal'); ?>
    <?php echo View::make('partials.itemsearchmodal'); ?>
    <?php echo View::make('partials.search'); ?>
    <?php echo View::make('partials.searchves'); ?>


    <div class="container-fluid ">

        <div class="col-lg-12">


            <div class="card mt-3">
                <div class="card-header">
                    <div class="card-tools ">


                        <button type="button" name="headertoggle" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                    <b>
                        <h3 class="text-center">RFQ Vessel Summary</h3>
                    </b>

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-5">



                            <div class="row py-1 ">


                                <div class="inputbox col-sm-5">
                                    <span class="Txtspan">
                                        Created From
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

                            <div class="row py-2">

                                    <div class="inputbox col-sm-2">
                                        <span class="Txtspan">
                                            C.Code
                                        </span>
                                        <input type="text" class=" " id="TxtCustomerCode" required="required">
                                    </div>
                                    <div class="inputbox col-sm-8">
                                        <span class="Txtspan">
                                            Customer Name
                                        </span>
                                        <input type="text" class="" disabled id="TxtCustomerName" required="required">
                                    </div>
                                    <div class="input-group-append">
                                        <button class="btn btn-info" style="cursor: pointer;" id="Button6"><i
                                                class="fas fa-search    "></i></button>
                                    </div>
                                    <div class="CheckBox1 mt-2 ml-2">
                                        <label class="input-group text-info">
                                            <input  type="checkbox" name="ChkAllCustomer"
                                                id="ChkAllCustomer" checked value=""> All
                                        </label>
                                    </div>
                            </div>

                            <div class="row py-2">
                                    <div class="inputbox col-sm-2 ">
                                        <span class="Txtspan">
                                            V.Code
                                        </span>
                                        <input type="text" class=" " id="TxtVesselCode" required="required">

                                    </div>
                                    <div class="inputbox col-sm-8">
                                        <span class="Txtspan">
                                            Vessel Name
                                        </span>
                                        <input type="text" class="" readonly id="TxtVname" required="required">

                                    </div>
                                    <div class="input-group-append">
                                        <button class="btn btn-info" style="cursor: pointer;" id="BtnVessel"><i
                                                class="fas fa-search    "></i></button>
                                    </div>
                                    <div class="CheckBox1 mt-2 ml-2">
                                        <label class="input-group text-info">
                                            <input type="checkbox" name="ChkAllVessel"
                                                id="ChkAllVessel" checked value=""> All
                                        </label>
                                    </div>
                            </div>
                            <div class="row py-2">
                                <a name="BtnFill" id="BtnNewEvent" class="btn btn-success mx-2" role="button"><i class="fa fa-file-text text-white" aria-hidden="true"></i> Show</a>
                                <a name="BtnPrint" id="BTNPrint" class="btn btn-primary mx-2 " role="button"><i class="fa fa-print text-white" aria-hidden="true"></i> Print</a>
                                <a name="BtnExit" id="Exitbtn" class="btn btn-danger mx-2" href="/"role="button"><i class="fas fa-door-open   text-white"></i> Exit</a>
                            </div>

                        </div>

                        <div class="col-lg-7">
                            <div class="row">


                                <div class="col-sm-6">
                                    <div class="CheckBox1 mt-2 ml-2">
                                    <label class="input-group text-info mx-4">
                                        <input class="form-check-input " type="checkbox" name="ChkAllWarehouse"
                                            id="ChkAllWarehouse" checked value=""> All
                                    </label></div>
                                    <div class="rounded shadow">
                                        <table class="table small" id="DG3">
                                            <thead class="bg-info">
                                                <tr>
                                                    <th>Select</th>
                                                    <th>Warehouse</th>
                                                    <th>Code</th>
                                                </tr>
                                            </thead>
                                            <tbody id="DG3body">
                                                @foreach ($GodownSetup as $Godown)
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" class="departmentcheck" id=""
                                                                >
                                                        </td>
                                                        <td>
                                                            {{ $Godown->GodownName }}
                                                        </td>
                                                        <td>
                                                            {{ $Godown->GodownCode }}
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>

                                    </div>
                                </div>






                                <div class="col-sm-6">
                                    <div class="CheckBox1 mt-2 ml-2">
                                    <label class="input-group text-info mx-4">
                                        <input type="checkbox" name="CHkUserAll"
                                            id="CHkUserAll" checked value=""> All
                                    </label></div>
                                    <div class="rounded shadow">
                                        <table class="table small" id="DGUSERLIST">
                                            <thead class="bg-info">
                                                <tr>
                                                    <th>Select</th>
                                                    <th>User&nbsp;Name</th>

                                                </tr>
                                            </thead>
                                            <tbody id="DGUSERLISTbody">
                                                @foreach ($UserLIst as $Type)
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" class="departmentcheck" id="DGUSERSEL"
                                                                >
                                                        </td>
                                                        <td>
                                                            {{ $Type->UserName }}
                                                        </td>

                                                @endforeach
                                            </tbody>
                                        </table>
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
                        <table class="table small" id="DG1">
                            <thead class="">
                                <tr>
                                    <th>Event No</th>
                                    <th>Vessel Name</th>
                                    <th style="width:270px;">Customer</th>
                                    <th>ETA Date</th>
                                    <th>No. of Quotes</th>
                                    <th>No. of Orders</th>
                                    <th class="text-right">Quote Amount</th>
                                    <th class="text-right">Order Amount</th>
                                    <th>Success %</th>
                                    <th>Work User</th>
                                    <th>Remarks</th>
                                    <th>Email Send</th>
                                    <th hidden>Email</th>
                                    <th hidden>Emailsend</th>
                                </tr>
                            </thead>
                            <tbody id="DG1body">

                            </tbody>
                        </table>

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



function ajaxSetup(){
    $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

}

        $(document).ready(function() {

// $('.inputbox input').focus(function (e) {
//     $('.Txtspan').show();

// });
// $('.inputbox input').blur(function (e) {
//     $('.Txtspan').hide();

// });


            var table1 = $('#DG3').DataTable({

                scrollY: 150,
                deferRender: true,
                scroller: true,
                paging: false,
                info: false,
                ordering: false,
                searching: false,


            });

            var table2 = $('#DGUSERLIST').DataTable({

                scrollY: 150,
                deferRender: true,
                scroller: true,
                paging: false,
                info: false,
                ordering: false,
                searching: false,


            });

            var table3 = $('#DG1').DataTable({

                scrollY: 500,
                deferRender: true,
                scroller: true,
                paging: false,
                info: false,
                ordering: false,
                searching: false,


            });


        // });


        // $(document).ready(function() {

            var chekdate = new Date();
            const Today = chekdate.toISOString().substring(0, 10);
            $('#TxtDateTo').val(Today);
            $('#TxtDateFrom').val(Today);

            $("#ChkAllUser").change(function() {
                // Check if the checkbox is checked
                if ($(this).is(":checked")) {
                    // Disable the select element
                    $("#CmbUser").prop("disabled", true);
                    $("#CmbUser").prop("disabled", true);
                } else {
                    // Enable the select element
                    $("#CmbUser").prop("disabled", false);
                    $("#CmbUser").prop("disabled", false);
                }
            });



            $("#ChkAllStatus").change(function() {
                // Check if the checkbox is checked
                if ($(this).is(":checked")) {
                    // Disable the select element
                    $("#CmbStatus").prop("disabled", true);
                    $("#CmbStatus").prop("disabled", true);
                } else {
                    // Enable the select element
                    $("#CmbStatus").prop("disabled", false);
                    $("#CmbStatus").prop("disabled", false);
                }
            });




            $("#ChkAllCustomer").change(function() {
                // Check if the checkbox is checked
                if ($(this).is(":checked")) {
                    // Disable the select element
                    $("#TxtCustomerName").prop("disabled", true);
                    $("#TxtCustomerName").prop("disabled", true);
                } else {
                    // Enable the select element
                    $("#TxtCustomerName").prop("disabled", false);
                    $("#TxtCustomerName").prop("disabled", false);
                }
            });






            $("#ChkAllVessel").change(function() {
                // Check if the checkbox is checked
                if ($(this).is(":checked")) {
                    // Disable the select element
                    $("#TxtVname").prop("readonly", true);
                    $("#TxtVname").prop("readonly", true);
                } else {
                    // Enable the select element
                    $("#TxtVname").prop("readonly", false);
                    $("#TxtVname").prop("readonly", false);
                }
            });

            // $('#txtVessel').click(function (e) {
            //     alert();
            //     // e.preventDefault();
            // });



            $("#ChkEventAll").change(function() {
                // Check if the checkbox is checked
                if ($(this).is(":checked")) {
                    // Disable the select element
                    $("#CmbEvent").prop("disabled", true);
                    $("#CmbEvent").prop("disabled", true);
                } else {
                    // Enable the select element
                    $("#CmbEvent").prop("disabled", false);
                    $("#CmbEvent").prop("disabled", false);
                }
            });



            $("#ChkGodownAll").change(function() {
                // Check if the checkbox is checked
                if ($(this).is(":checked")) {
                    // Disable the select element
                    $("#CmbGodownName").prop("disabled", true);
                    $("#CmbGodownName").prop("disabled", true);
                } else {
                    // Enable the select element
                    $("#CmbGodownName").prop("disabled", false);
                    $("#CmbGodownName").prop("disabled", false);
                }
            });




            $("#ChkAllQuote").change(function() {
                // Check if the checkbox is checked
                if ($(this).is(":checked")) {
                    // Disable the select element
                    $("#CmbQuote").prop("disabled", true);
                    $("#CmbQuote").prop("disabled", true);
                } else {
                    // Enable the select element
                    $("#CmbQuote").prop("disabled", false);
                    $("#CmbQuote").prop("disabled", false);
                }
            });




            $("#ChkAllCosting").change(function() {
                // Check if the checkbox is checked
                if ($(this).is(":checked")) {
                    // Disable the select element
                    $("#CmbCosting").prop("disabled", true);
                    $("#CmbCosting").prop("disabled", true);
                } else {
                    // Enable the select element
                    $("#CmbCosting").prop("disabled", false);
                    $("#CmbCosting").prop("disabled", false);
                }
            });



            $("#ChkAllPricing").change(function() {
                // Check if the checkbox is checked
                if ($(this).is(":checked")) {
                    // Disable the select element
                    $("#CmbPricing").prop("disabled", true);
                    $("#CmbPricing").prop("disabled", true);
                } else {
                    // Enable the select element
                    $("#CmbPricing").prop("disabled", false);
                    $("#CmbPricing").prop("disabled", false);
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









            $('#BtnVessel').click(function(e) {
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




            $('#BtnNewEvent').click(function (e) {
                e.preventDefault();
                let Qry = "EventCreatedDate>='" + $('#TxtDateFrom').val() + "' and EventCreatedDate<='" + $('#TxtDateTo').val() + "'";
                if (!$('#ChkAllCustomer').is(":checked")) {
                    if (Qry !== "") Qry += " and ";
                    Qry += "CustomerCode= " + $('#TxtCustomerCode').val() + "";
                }

                if (!$('#ChkAllVessel').is(":checked")) {
                    if (Qry !== "") Qry += " and ";
                    Qry += "IMONo= " + $('#TxtVesselCode').val() + "";
                }

                if (!$('#ChkAllWarehouse').is(":checked")) {
                    let Qry1 = "";
                    let table = document.getElementById('DG3');
                    let rows = table.rows;
                    for (G = 0; G < rows.length; G++) {
                        let cells = rows[G].cells;
                        let checkboxCell = cells[0]; // Assuming the checkbox cell is the first cell
                        if (checkboxCell.querySelector('input[type="checkbox"]').checked) {
                            if (Qry1 !== "") Qry1 += ",";
                            let GodownCode = cells[2].innerText;
                            Qry1 += GodownCode;
                        }
                    }

                  if (Qry1 !== "") {
                    if (Qry !== "") Qry += " and ";
                    Qry += "GodownCode in (" + Qry1 + ")";
                  }
                }

                if (!$('#CHkUserAll').is(":checked")) {
                  let Qry2 = "";
                  let tabled = document.getElementById('DGUSERLIST');
                    let rowsd = tabled.rows;
                  for (let G3 = 0; G3 < rowsd.length; G3++) {
                    let cellsd = rowsd[G3].cells;
                        let checkboxCelld = cellsd[0]; // Assuming the checkbox cell is the first cell
                        if (checkboxCelld.querySelector('input[type="checkbox"]').checked) {
                      if (Qry2 !== "") Qry2 += ",";
                      let MMUserName =cells[1].innerText;
                      Qry2 += "'" + MMUserName + "'";
                    }
                  }

                  if (Qry2 !== "") {
                    if (Qry !== "") Qry += " and ";
                    Qry += "EventCreatedUser in (" + Qry2 + ")";
                  }
                }
                console.log(Qry);

                ajaxSetup();
                $.ajax({
                    url: '/RFQVesselSummarySearch',
                    type: 'POST',
                    data: {
                        Qry,
                    },
                    beforeSend: function() {
                        // Show the overlay and spinner before sending the request
                        $('.overlay').show();
                    },
                    success: function(resposne) {
                        console.log(resposne);
                        let data = resposne.Alldata;
                        let table = document.getElementById('DG1body');
                        table.innerHTML = ""; // Clear the table


                        data.forEach(function(item) {

                            let row = table.insertRow();

                            function createCell(content) {
                                let cell = row.insertCell();
                                cell.innerHTML = content;
                                return cell;
                            }

                            var Edate = new Date(item.Invoice.ETA);
                            const ETA = Edate.toISOString().substring(0, 10);
                            var MEventno = item.Invoice.Eventno;
                            createCell(MEventno);
                            createCell(item.Invoice.VesselName).style.width='200px';
                            createCell(item.Invoice.CustomerName).style.width='300px';
                            createCell(ETA).style.width='150px';


                            var DG1NoOfQuote = createCell('');
                            var DG1NoOfOrder = createCell('');
                            var DG1QuoteAmount = createCell('');
                            var DG1OrderAmount = createCell('');
                            var MMQuoteAmount = 0;
                            var MMORDERAmount = 0;
                            if(MEventno !== ''){
                                DG1NoOfQuote.innerHTML = item.QuoteMaster.NoofQuote ? item.QuoteMaster.NoofQuote : '';
                                DG1NoOfQuote.style.textAlign = 'center';
                                MMQuoteAmount = item.QuoteMaster.QuoteAmount ? parseFloat(item.QuoteMaster.QuoteAmount) : 0;
                                DG1QuoteAmount.innerHTML = MMQuoteAmount.toFixed(2);
                                DG1QuoteAmount.style.textAlign = 'right';

                                DG1NoOfOrder.innerHTML = item.OrderMaster2.NoofOrder ? item.OrderMaster2.NoofOrder : '';
                                DG1NoOfOrder.style.textAlign = 'center';

                                MMORDERAmount = item.OrderMaster2.OrderAmount ? parseFloat(item.OrderMaster2.OrderAmount) : 0;
                                DG1OrderAmount.innerHTML = MMORDERAmount.toFixed(2);
                                DG1OrderAmount.style.textAlign = 'right';
                                // console.log(MMORDERAmount);

                            }
                            var MMSUCESS =0;
                            var DG1Success = createCell('');

                            if (MMQuoteAmount > 0 && MMORDERAmount > 0) {
                                MMSUCESS = parseFloat(MMORDERAmount / MMQuoteAmount * 100);
                                DG1Success.innerHTML = MMSUCESS.toFixed(2);
                            }
                            createCell(item.Invoice.EventCreatedUser);
                            createCell(item.Invoice.Note);
                            var Emailsend = item.Invoice.Emailsend;
                            // console.log(Emailsend);
                            var Emailsendcell = createCell('');
                            if(Emailsend !== 'Y'){
                                Emailsendcell.innerHTML = '<input type="checkbox" class="Emailsend" id="" >';
                            }else{
                                Emailsendcell.innerHTML = '<input type="checkbox" class="Emailsend" id="" checked>';
                            }
                            createCell(item.Invoice.Email).hidden=true;
                            createCell(item.Invoice.Emailsend).hidden=true;





                        });
                        table3.columns.adjust();

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

                $('#BTNPrint').click(function (e) {
                    e.preventDefault();
                    var dataarray = tabcomposer();
                    ajaxSetup();
                    $.ajax({
                    url: '/RFQVesselSummaryP',
                    type: 'POST',
                    data: {
                        dataarray,
                    },
                    beforeSend: function() {
                        // Show the overlay and spinner before sending the request
                        $('.overlay').show();
                    },
                    success: function(resposne) {
                        console.log(resposne);
                        if (resposne.Message == 'Saved') {

                            window.location='/RFQVesselSummrayprint';
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
        function tabcomposer() {
  let table = document.getElementById('DG1body');
  let rows = table.rows;

  let dataarray = [];
  for (let i = 0; i < rows.length; i++) {
    let cells = rows[i].cells;

    dataarray.push({
        EventNo: cells[0] ? cells[0].innerHTML : '',
        VesselName: cells[1] ? cells[1].innerHTML : '',
        Customer: cells[2] ? cells[2].innerHTML : '',
        ETADate: cells[3] ? cells[3].innerHTML : '',
        NoofQuotes: cells[4] ? cells[4].innerHTML : '',
        NoofOrders: cells[5] ? cells[5].innerHTML : '',
        QuoteAmount: cells[6] ? cells[6].innerHTML : '',
        OrderAmount: cells[7] ? cells[7].innerHTML : '',
        Success : cells[8] ? cells[8].innerHTML : '',
        WorkUser: cells[9] ? cells[9].innerHTML : '',
        Remarks: cells[10] ? cells[10].innerHTML : '',
        EmailSend: cells[13] ? cells[13].innerHTML : '',
    });
  }

  return dataarray;
}

    </script>




@stop


@section('content')
