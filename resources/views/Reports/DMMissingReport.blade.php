@extends('layouts.app')



@section('title', 'DMMissing-Report')

@section('content_header')

@stop

@section('content')
    </div>

    <div class="container-fluid ">

        <div class="col-lg-12">
            <div class="row">

            </div>

            <div class="card mt-3">
                <div class="card-header">
                    <div class="card-tools ">


                        <button type="button" name="headertoggle" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                    <h3 class="text-center">DMMissing Report</h3>

                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="row py-1">

                                <div class="inputbox col-sm-5">
                                    <span class="Txtspan" id="">Return Date From</span>
                                    <input id='TxtDateFrom' type="date" value="">
                                </div>
                                <div class="inputbox col-sm-5">
                                    <span class="Txtspan" id="">Return Date to</span>
                                    <input id='TxtDateTo' type="date" value="">
                                </div>

                            </div>

                            <div class="row py-2">
                                <div class="inputbox col-sm-8">
                                    <span class="Txtspan" id="">Vendor</span>
                                    <select id="CmbVendorName" disabled name="CmbVendorName">
                                        @foreach ($VenderSetup as $item)
                                            <option value="{{ $item->VenderCode }}">{{ $item->VenderName }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="inputbox col-sm-2">
                                    <input type="text" readonly name="TxtVendorCode"
                                    id="TxtVendorCode">
                                </div>
                                <div class="CheckBox1 mt-2 ml-2">
                                    <label class="input-group text-info mx-1">
                                        <input type="checkbox" name="ChkAllVendor"
                                            id="ChkAllVendor" checked value=""> All
                                    </label>
                                </div>




                            </div>
                            <div class="row py-2">
                                <div class="inputbox col-sm-8">
                                    <span class="Txtspan" id="">Customer</span>
                                    <select id="CmbCustomerName" disabled name="CmbCustomerName">
                                        @foreach ($Customer as $Citem)
                                            <option value="{{ $Citem->CustomerName }}">{{ $Citem->CustomerName }}</option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="inputbox col-sm-2">
                                    <input type="text" readonly  name="TxtCustomerCode"
                                        id="TxtCustomerCode">
                                </div>
                                    <div class="CheckBox1 mt-2 ml-2">
                                        <label class="input-group text-info mx-1">
                                            <input  type="checkbox" name="ChkAllCustomer"
                                                id="ChkAllCustomer" checked value=""> All
                                        </label>
                                    </div>
                            </div>

                            <div class="row py-2">
                                <div class="inputbox col-sm-8">
                                    <span class="Txtspan" id="">Godown</span>
                                    <select id="CmbGodownName" disabled name="CmbGodownName">
                                        @foreach ($GodownSetup as $Gitem)
                                            <option value="{{ $Gitem->GodownCode }}">{{ $Gitem->GodownName }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="inputbox col-sm-2">
                                    <input type="text" readonly name="TxtGodownCode"
                                    id="TxtGodownCode">
                                </div>

                                    <div class="CheckBox1 mt-2 ml-2">
                                        <label class="input-group text-info mx-1">
                                            <input  type="checkbox" name="ChkAllgodown"
                                                id="ChkAllgodown" checked value=""> All
                                        </label>
                                    </div>




                            </div>
                            <div class="row py-2">
                                    <button name="BtnFill" id="BtnFill" class="btn btn-success mx-2" role="button"><i class="fa fa-file-text text-white" aria-hidden="true"></i> Show</button>
                                    <button name="BtnPrint" id="BtnPrint" class="btn btn-primary mx-2" role="button"><i class="fa fa-print text-white" aria-hidden="true"></i> Print</button>
                                    <button name="BtnExit" id="BtnExit" class="btn btn-danger mx-2" href="/" role="button"><i class="fas fa-door-open   text-white"></i> Exit</button>
                            </div>

                        </div>


                        <div class="col-lg-6">

                            <div class="row">
                                <div class="CheckBox1 mt-2 ml-2">
                                    <label class="input-group text-info mx-1">
                                        <input type="checkbox" name="ChkAllWH" id="ChkAllWH"
                                            checked value=""> All
                                    </label>
                                </div>
                                <div class="table-responsive col-sm-12">

                                    <table class="table small " id="Warehousetable">
                                        <thead class="bg-info">
                                            <tr>
                                                <th class="text-center">Select</th>
                                                <th>Department&nbsp;Name</th>
                                                <th>Code</th>
                                            </tr>
                                        </thead>
                                        <tbody id="Warehousetablebody">
                                            @foreach ($Typesetup as $Witem)
                                                <tr>
                                                    <td class="text-center "><input class="form-check-input altyoe"
                                                            type="checkbox" name="" id="" value="">
                                                    </td>
                                                    <td>{{ $Witem->TypeName }}</td>
                                                    <td>{{ $Witem->TypeCode }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>


                            </div>

                        </div>







                    </div>




                </div>
            </div>

            <div class="rounded shadow table-responsive col-sm-12">
                <table class="table small" style="width: 100%" id="DMMisingrpttable">
                    <thead class="">
                        <tr>
                            <th style="width: 100px">Return&nbsp;Date</th>
                            <th style="width: 100px">Event&nbsp;#</th>
                            <th style="width: 100px">Quote&nbsp;#</th>
                            <th style="width: 100px">VSN&nbsp;#</th>
                            <th style="width: 100px">Charge&nbsp;#</th>
                            <th style="width: 100px">Department</th>
                            <th style="width: 100px">PO&nbsp;#</th>
                            <th style="width: 200px">Customer&nbsp;Name</th>
                            <th style="width: 200px">Vendor&nbsp;Name</th>
                            <th style="width: 100px">Work&nbsp;User</th>
                            <th style="width: 100px">Status</th>
                            <th style="width: 100px">Missing&nbsp;Qty</th>
                            <th class="text-right" style="width: 100px">Missing Amt</th>

                        </tr>
                    </thead>
                    <tbody id="DMMisingrpttablebody">

                    </tbody>
                </table>
                <div class="row py-1">
                    <input type="text" class="form-control mx-1 ml-auto col-sm-1 text-right" name="TxtTotMissingQty"
                        id="TxtTotMissingQty">
                    <input type="text" class="form-control mx-1  col-sm-1 mr-4 text-right" name="TxtTotMissingAmt"
                        id="TxtTotMissingAmt">
                </div>
            </div>



        </div>



    </div>

    {{-- <form action="/orderreportprint" method="post">
    @csrf
    <input type="text" id="qruey">
<button type="submit" id="btnqruey"></button>
</form> --}}

@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
    <style>
        .form-group {
            position: relative;
        }

        .title {
            position: absolute;
            top: -1.5em;
            left: 0.25em;
            background-color: #fff;
            padding: 0 0.5em;
        }

        .custom-col-2 {
            flex: 0 0 12.6%;
            max-width: 12.6%;
        }

        .span2 {
            width: 110px;
            /* font-size: 11px; */

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
        $(document).ready(function() {
            // Add change event listener to the checkbox
            $("#CmbCustomer").change(function() {
                var customer = $('#CmbCustomer').val();
                ajaxSetup();

                $.ajax({
                    url: '/orderrptcuscode',
                    type: 'POST',
                    data: {
                        customer,
                    },
                    beforeSend: function() {
                        // Show the overlay and spinner before sending the request
                        // $('.overlay').show();
                    },
                    success: function(resposne) {
                        console.log(resposne);
                        $('#TxtCustomerCode').val(resposne.CustomerCode);


                    },
                    error: function(data) {
                        console.log(data);
                        // $('.overlay').hide();
                    },
                    complete: function() {
                        // $('.overlay').hide();
                        // Hide the overlay and spinner after the request is complete
                    }


                });
            });


            $("#ChkAllVendor").change(function() {
                // Check if the checkbox is checked
                if ($(this).is(":checked")) {
                    // Disable the select element
                    $("#CmbVendorName").prop("disabled", true);
                } else {
                    // Enable the select element
                    $("#CmbVendorName").prop("disabled", false);
                }
            });
            $("#ChkAllWH").change(function() {
                // Check if the checkbox is checked
                if ($(this).is(":checked")) {
                    // Disable the select element
                    $("#altyoe").prop("disabled", true);
                } else {
                    // Enable the select element
                    $("#altyoe").prop("disabled", false);
                }
            });
            $("#ChkAllCustomer").change(function() {
                // Check if the checkbox is checked
                if ($(this).is(":checked")) {
                    // Disable the select element
                    $("#CmbCustomerName").prop("disabled", true);
                } else {
                    // Enable the select element
                    $("#CmbCustomerName").prop("disabled", false);
                }
            });
            $("#ChkAllgodown").change(function() {
                // Check if the checkbox is checked
                if ($(this).is(":checked")) {
                    // Disable the select element
                    $("#CmbGodownName").prop("disabled", true);
                } else {
                    // Enable the select element
                    $("#CmbGodownName").prop("disabled", false);
                }
            });

        });

        $(document).ready(function() {
            var chekdate = new Date();
            const Today = chekdate.toISOString().substring(0, 10);

            $('#TxtDateFrom').val(Today);
            $('#TxtDateTo').val(Today);



        });
        $(document).ready(function() {
            // dataget();
            var table = $('#DMMisingrpttable').DataTable({

                scrollY: 410,
                deferRender: true,
                scroller: true,
                paging: false,
                info: false,
                ordering: false,
                searching: false,
                responsive: true,


            });
            var table2 = $('#Warehousetable').DataTable({

                scrollY: 190,
                deferRender: true,
                scroller: true,
                paging: false,
                info: false,
                ordering: false,
                searching: false,
                responsive: true,


            });
            $(".dt-button").removeClass("dt-button")




            $('#DMMisingrpttable tbody').on('click', 'tr', function() {
                if ($(this).hasClass('selected')) {
                    $(this).removeClass('selected');
                    $('#deleteButton').attr('data-row-id', '');
                } else {
                    table.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                    var id = $(this).attr('data-row-id');
                    $('#deleteButton').attr('data-row-id', id);
                }
            });




            $('#BtnFill').click(function(e) {
                e.preventDefault();
                dataget();
            });

        });



        function ajaxSetup() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        }

        function QryMaker() {

            var CmbCustomer = $('#CmbCustomer').val();
            var CmbVessel = $('#CmbVessel').val();
            var CmbStatus = $('#CmbStatus').val();
            var CmbTerms = $('#CmbTerms').val();
            var TxtDateFrom = $('#TxtDateFrom').val();
            var TxtDateTo = $('#TxtDateTo').val();
            var TxtDepartmentCode = $('#TxtDepartmentCode').val();
            var TxtGodownCode = $('#TxtGodownCode').val();
            var TxtVendorCode = $('#TxtVendorCode').val();
            var TxtCustomerCode = $('#TxtCustomerCode').val();
            var MBranchCode = '{{ $BranchCode }}';
            var Qry = '';


            Qry = "";

            var qry1 = "";
            //---------------------------------
            if (!$("#ChkAllWH").is(":checked")) {
                if (qry1 === "") qry1 = "";
                if (qry1 !== "") qry1 = qry1;

                let table = document.getElementById('Warehousetablebody');
                let rows = table.rows;

                for (let i = 0; i < rows.length; i++) {
                    let cells = rows[i].cells;
                    let checkboxCell = cells[0]; // Assuming the checkbox cell is the first cell

                    if (checkboxCell.querySelector('input[type="checkbox"]').checked) {
                        if (qry1 !== "") qry1 = qry1 + ",";
                        let departmentCode = cells[2].innerText;
                        qry1 = qry1 + departmentCode;
                    }
                }

                if (Qry !== "") Qry = Qry + " and ";
                Qry = Qry + "DepartmentCode in (" + qry1 + ")";
            }


            if (!$("#ChkAllgodown").is(":checked")) {
                if (Qry !== "") Qry = Qry + " and ";
                Qry = Qry + "GodownCode='" + TxtGodownCode + "'";
            }
            if (!$("#ChkAllVendor").is(":checked")) {
                if (Qry !== "") Qry = Qry + " and ";
                Qry = Qry + "VendorCode='" + TxtVendorCode + "'";
            }


            if (!$("#ChkAllCustomer").is(":checked")) {
                if (Qry !== "") Qry = Qry + " and ";
                Qry = Qry + "CustomerCode='" + TxtCustomerCode + "'";
            }



            // if (!$("#ChkTermsAll").is(":checked") && CmbTerms == "CREDIT") {
            //   if (Qry !== "") Qry = Qry + " and ";
            //   Qry = Qry + "Terms<>'CASH'";
            // }else if(!$("#ChkTermsAll").is(":checked")){
            //     if (Qry !== "") Qry = Qry + " and ";
            //   Qry = Qry + "Terms= '" + CmbTerms + "'";
            // }


            return Qry;
        }

        function dataget() {

            var Qry = QryMaker();
            console.log(Qry);



            ajaxSetup();

            $.ajax({
                url: '/DMMissingReportsearch',
                type: 'POST',
                data: {
                    Qry,
                    txtDateFrom: $('#TxtDateFrom').val(),
                    txtDateTo: $('#TxtDateTo').val(),
                },
                beforeSend: function() {
                    // Show the overlay and spinner before sending the request
                    $('.overlay').show();
                },
                success: function(resposne) {
                    console.log(resposne);

                    let data = resposne.rs1;
                    let TxtTotMissingQty = 0;
                    let TxtTotMissingAmt = 0;
                    let table = document.getElementById('DMMisingrpttablebody');
                    if (data.length > 0) {

                        table.innerHTML = ""; // Clear the table


                        data.forEach(function(item) {


                            let row = table.insertRow();
                            //   row.setAttribute("data-row-id", ids);
                            //   row.setAttribute('id', 'scoperow');
                            function createCell(content) {
                                let cell = row.insertCell();
                                cell.innerHTML = content;
                                return cell;
                            }

                            var odate = new Date(item.RTNDate);
                            const Invdate = odate.toISOString().substring(0, 10);

                            createCell(Invdate);
                            createCell(item.EventNo);
                            createCell(item.QuoteNo);
                            createCell(item.VSNNO);
                            let charge = createCell(item.ChargeNo);
                            charge.style.color = 'yellow';
                            charge.style.backgroundColor = 'blue';
                            createCell(item.DepartmentName);
                            createCell(item.POMadeNo);
                            createCell((item.CustomerName ? item.CustomerName : ''));
                            createCell((item.VendorName ? item.VendorName : ''));
                            createCell((item.WorkUser ? item.WorkUser : ''));
                            createCell((item.WorkUser ? item.WorkUser : ''));
                            let status = createCell('');
                            status.contentEditable = true;
                            createCell(parseFloat(item.DMMissingQty ? item.DMMissingQty : '0').toFixed(
                                2));
                            createCell(parseFloat(item.DMMissingAmt ? item.DMMissingAmt : '0').toFixed(
                                2)).style.textAlign = 'right';


                            TxtTotMissingQty += parseFloat(item.DMMissingQty ? item.DMMissingQty : '0');
                            TxtTotMissingAmt += parseFloat(item.DMMissingAmt ? item.DMMissingAmt : '0');




                        });

                        $('#TxtTotMissingQty').val(TxtTotMissingQty.toFixed(2));
                        $('#TxtTotMissingAmt').val(TxtTotMissingAmt.toFixed(2));
                    }



                },
                error: function(data) {
                    console.log(data);
                    $('.overlay').hide();
                },
                complete: function() {
                    $('.overlay').hide();
                    // Hide the overlay and spinner after the request is complete
                }


            });

        }

        $(document).ready(function() {


            $('#BtnPrint').click(function(e) {
                var TxtDateFrom = $('#TxtDateFrom').val();
                var TxtDateTo = $('#TxtDateTo').val();
                // $('#btnqruey').click();
                window.location.href = "/DMMissingReportprint?DateFrom=" + TxtDateFrom + "&DateTo=" +
                    TxtDateTo;


            });


        });
    </script>
@stop


@section('content')
