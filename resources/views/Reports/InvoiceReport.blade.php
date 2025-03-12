@extends('layouts.app')



@section('title', 'Invoice-Report')

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
                    <h3 class="text-center">Invoice Report</h3>

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="row py-1">

                                <div class="inputbox col-sm-5">
                                    <span class="Txtspan" id="">Date From</span>
                                    <input id='TxtDateFrom' type="date" value="">
                                </div>
                                <div class="inputbox col-sm-5">
                                    <span class="Txtspan" id="">Date to</span>
                                    <input id='TxtDateTo' type="date" value="">
                                </div>

                            </div>


                            <div class="row py-2">
                                <div class="inputbox col-sm-8">
                                    <span class="Txtspan" id="">Customer</span>
                                    <select id="CmbCustomer" disabled name="CmbCustomer">
                                        @foreach ($Customer as $Citem)
                                            <option value="{{ $Citem->CustomerName }}">{{ $Citem->CustomerName }}</option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="inputbox col-sm-2">
                                    <input type="text" readonly name="TxtCustomerCode" id="TxtCustomerCode">
                                </div>

                                <div class="CheckBox1 mt-2 ml-2">
                                    <label class="input-group text-info mx-1">
                                        <input type="checkbox" name="ChkAllCustomer" id="ChkAllCustomer" checked
                                            value=""> All
                                    </label>
                                </div>



                            </div>
                            <div class="row py-2">
                                <div class="inputbox col-sm-8">
                                    <span class="Txtspan" id="">Vessel</span>

                                    <select id="CmbVessel" disabled name="CmbVessel">
                                        @foreach ($Vessel as $Vitem)
                                            <option value="{{ $Vitem->VesselName }}">{{ $Vitem->VesselName }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="inputbox col-sm-2">
                                    <input type="text" readonly name="txtVesselCode" id="txtVesselCode">
                                </div>
                                <div class="CheckBox1 mt-2 ml-2">
                                    <label class="input-group text-info mx-1">
                                        <input type="checkbox" name="ChkAllVessel" id="ChkAllVessel" checked value="">
                                        All
                                    </label>
                                </div>


                            </div>
                            <div class="row py-2">

                                <div class="inputbox col-sm-8">
                                    <span class="Txtspan" id="">Department</span>

                                    <select id="CmbDepartment" disabled name="CmbDepartment">
                                        @foreach ($Typesetup as $item)
                                            <option value="{{ $item->TypeCode }}">{{ $item->TypeName }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="inputbox col-sm-2">
                                    <input type="text" readonly name="TxtDepartmentCode" id="TxtDepartmentCode">
                                </div>
                                <div class="CheckBox1 mt-2 ml-2">
                                    <label class="input-group text-info mx-1">
                                        <input type="checkbox" name="ChkAllDepartment" id="ChkAllDepartment" checked
                                            value=""> All
                                    </label>
                                </div>



                            </div>
                            <div class="row py-2">
                                <div class="inputbox col-sm-10">
                                    <span class="Txtspan" id="">Terms</span>

                                    <select id="CmbTerms" disabled name="CmbTerms">
                                        @foreach ($Terms as $titem)
                                            <option value="{{ $titem->Terms }}">{{ $titem->Terms }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="CheckBox1 mt-2 ml-2">
                                    <label class="input-group text-info mx-1">
                                        <input type="checkbox" name="ChkTermsAll" id="ChkTermsAll" checked value="">
                                        All
                                    </label>
                                </div>

                            </div>
                            <div class="row py-2 ">
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
                                                    <td class="text-center "><input class="form-check-input"
                                                            type="checkbox" name="" id=""
                                                            value=""></td>
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
                <table class="table small" style="width: 100%" id="InvoiceReporttable">
                    <thead class="">
                        <tr>
                            <th style="width: 100px">Inv#</th>
                            <th style="width: 100px">Date</th>
                            <th style="width: 200px">Vessel&nbsp;Name</th>
                            <th style="width: 200px">Customer&nbsp;Name</th>
                            <th style="width: 100px">Department&nbsp;Name</th>
                            <th style="width: 100px">Terms</th>
                            <th style="width: 100px">Cust&nbsp;Ref&nbsp;#</th>
                            <th class="text-right" style="width: 100px">Gross&nbsp;Sale</th>
                            <th class="text-center" style="width: 100px">Inv&nbsp;Disc&nbsp;%</th>
                            <th class="text-right" style="width: 100px">Inv&nbsp;Disc&nbsp;Amt</th>
                            <th class="text-right" style="width: 100px">Invoice&nbsp;Amount</th>
                            <th class="text-right" style="width: 100px">Cr&nbsp;Note&nbsp;Amount</th>

                        </tr>
                    </thead>
                    <tbody id="InvoiceReporttablebody">

                    </tbody>
                </table>
                <div class="row py-1">
                    <input type="text" class="form-control mx-1 ml-auto col-sm-1 text-right" name="TxtGrossSaleAmt"
                        id="TxtGrossSaleAmt">
                    <input type="text" class="form-control mx-1  col-sm-1  text-right" name="TxtInvDiscount"
                        id="TxtInvDiscount">
                    <input type="text" class="form-control mx-1  col-sm-1  text-right" name="TxtTotInvAmt"
                        id="TxtTotInvAmt">
                    <input type="text" class="form-control mx-1  col-sm-1 mr-4 text-right" name="TxtCrNoteAmt"
                        id="TxtCrNoteAmt">
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
        });

        $(document).ready(function() {
            var chekdate = new Date();
            const Today = chekdate.toISOString().substring(0, 10);

            $('#TxtDateFrom').val(Today);
            $('#TxtDateTo').val(Today);



        });
        $(document).ready(function() {
            // dataget();
            var table = $('#InvoiceReporttable').DataTable({

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

                scrollY: 270,
                deferRender: true,
                scroller: true,
                paging: false,
                info: false,
                ordering: false,
                searching: false,
                responsive: true,


            });
            $(".dt-button").removeClass("dt-button")




            $('#InvoiceReporttable tbody').on('click', 'tr', function() {
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
            var TxtCustomerCode = $('#TxtCustomerCode').val();
            var MBranchCode = '{{ $BranchCode }}';
            var Qry = '';


            Qry = "InvDate>='" + TxtDateFrom + "' and InvDate<='" + TxtDateTo + "' and BranchCode=" + MBranchCode +
                " and Status='INVOICED'";

            if (!$("#ChkAllDepartment").is(":checked")) {
                if (Qry !== "") Qry = Qry + " and ";
                Qry = Qry + "DepartmentCode='" + TxtDepartmentCode + "'";
            }

            if (!$("#ChkAllCustomer").is(":checked")) {
                if (Qry !== "") Qry = Qry + " and ";
                Qry = Qry + "CustomerCode='" + TxtCustomerCode + "'";
            }

            if (!$("#ChkAllVessel").is(":checked")) {
                if (Qry !== "") Qry = Qry + " and ";
                Qry = Qry + "VesselName='" + CmbVessel + "'";
            }


            if (!$("#ChkTermsAll").is(":checked") && CmbTerms == "CREDIT") {
                if (Qry !== "") Qry = Qry + " and ";
                Qry = Qry + "Terms<>'CASH'";
            } else if (!$("#ChkTermsAll").is(":checked")) {
                if (Qry !== "") Qry = Qry + " and ";
                Qry = Qry + "Terms= '" + CmbTerms + "'";
            }

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
            return Qry;
        }

        function dataget() {

            var Qry = QryMaker();
            // console.log(Qry);



            ajaxSetup();

            $.ajax({
                url: '/InvoiceReportsearch',
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

                    let data = resposne.TempInvoiceReport;
                    let table = document.getElementById('InvoiceReporttablebody');
                    table.innerHTML = ""; // Clear the table
                    $('#TxtTotInvAmt').val(parseFloat(resposne.TxtTotInvAmt).toFixed(2));
                    $('#TxtCrNoteAmt').val(parseFloat(resposne.TxtCrNoteAmt).toFixed(2));
                    $('#TxtGrossSaleAmt').val(parseFloat(resposne.TxtGrossSaleAmt).toFixed(2));
                    $('#TxtInvDiscount').val(parseFloat(resposne.TxtInvDiscount).toFixed(2));




                    data.forEach(function(item) {


                        let row = table.insertRow();
                        //   row.setAttribute("data-row-id", ids);
                        //   row.setAttribute('id', 'scoperow');
                        function createCell(content) {
                            let cell = row.insertCell();
                            cell.innerHTML = content;
                            return cell;
                        }

                        var odate = new Date(item.Invdate);
                        const Invdate = odate.toISOString().substring(0, 10);

                        createCell(item.InvNo);
                        createCell(Invdate);
                        createCell(item.VesselName);
                        createCell(item.CustomerName);
                        createCell(item.DepartmentName);
                        createCell(item.Terms);
                        createCell(item.PurchaseOrderNo);
                        createCell(parseFloat(item.GrossSaleAmt ? item.GrossSaleAmt : '0').toFixed(2))
                            .style.textAlign = 'right';
                        createCell(parseFloat(item.InvDiscPer ? item.InvDiscPer : '0').toFixed(2) + '%')
                            .style.textAlign = 'center';
                        createCell(parseFloat(item.InvDiscAmt ? item.InvDiscAmt : '0').toFixed(2)).style
                            .textAlign = 'right';
                        createCell(parseFloat(item.InvoiceAmt ? item.InvoiceAmt : '0').toFixed(2)).style
                            .textAlign = 'right';
                        createCell(parseFloat(item.CrNoteAmt ? item.CrNoteAmt : '0').toFixed(2)).style
                            .textAlign = 'right';


                        // TxtTotOrderAmt += parseFloat(item.ExtAmount ? item.ExtAmount : '0');





                    });

                    // $('#TxtTotOrderAmt').val(TxtTotOrderAmt.toFixed(2));

                    // $('#scoperow').dblclick(function () {
                    //     alert(this.td[0].innerHTML);
                    // });
                    // const table = document.getElementById("InvoiceReporttable");
                    // const tableBody = document.getElementById("InvoiceReporttablebody");

                    // tableBody.addEventListener("dblclick", function(e) {
                    //   if (e.target.tagName === "TD") {
                    //     const td = e.target;
                    //     const tr = td.parentNode;
                    //     const tdElements = tr.getElementsByTagName("td");
                    //         console.log(tdElements[0].innerHTML);
                    //         var ACt = tdElements[0].innerHTML;
                    //         // window.open("/Account-Ledger?ACT="+ACt);

                    //         window.location.href="Account-Ledger?ACT="+ACt;
                    //   }
                    // });


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
                window.location.href = "/InvoiceReportprint?DateFrom=" + TxtDateFrom + "&DateTo=" +
                    TxtDateTo;


            });


        });
    </script>
@stop


@section('content')
