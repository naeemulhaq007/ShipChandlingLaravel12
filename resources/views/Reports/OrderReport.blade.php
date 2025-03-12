@extends('layouts.app')



@section('title', 'Order-Report')

@section('content_header')

@stop

@section('content')
    </div>

    <div class="container-fluid ">

        <div class="col-lg-12">
            <div class="row">

            </div>

            <div class="card mt-3">
                <div style="background-color:#EEE; " class="card-header">
                    <div class="card-tools ">


                        <button type="button" name="headertoggle" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                    <h5 class="text-blue">Order Report</h5>

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="row py-1">

                                <div class="inputbox col-sm-6">
                                    <span class="Txtspan" style="width:100px" id="">Date From</span>
                                    <input id='TxtDateFrom' type="date" value="">
                                </div>
                                <div class="inputbox col-sm-5">
                                    <span class="Txtspan" id="">Date to </span>
                                    <input id='TxtDateTo' type="date" value="">
                                </div>

                            </div>


                            <div class="row py-1">
                                <div class="inputbox col-sm-9">
                                    <span class="Txtspan">Customer</span>
                                    <select id="CmbCustomer" disabled class="" name="CmbCustomer">
                                        @foreach ($Customer as $Citem)
                                            <option value="{{ $Citem->CustomerName }}">{{ $Citem->CustomerName }}</option>
                                        @endforeach

                                    </select>


                                </div>

                                <div class="inputbox col-sm-2">
                                    <input type="text" readonly name="CustomerCode" id="CustomerCode">
                                </div>
                                <div class="CheckBox1">
                                    <label class="input-group text-info">
                                        <input type="checkbox" name="ChkAllCustomer" id="ChkAllCustomer" checked
                                            value=""> All
                                    </label>
                                </div>

                            </div>
                            <div class="row py-1">
                                <div class="inputbox col-sm-11">
                                    <span class="Txtspan">Vessel</span>
                                    <select id="CmbVessel" disabled class="" name="CmbVessel">
                                        @foreach ($Vessel as $Vitem)
                                            <option value="{{ $Vitem->VesselName }}">{{ $Vitem->VesselName }}</option>
                                        @endforeach
                                    </select>


                                </div>
                                <div class="CheckBox1">
                                    <label class="input-group text-info mx-1">
                                        <input class="" type="checkbox" name="ChkAllVessel" id="ChkAllVessel" checked
                                            value=""> All
                                    </label>
                                </div>
                            </div>
                            <div class="row py-1">
                                <div class="inputbox col-sm-11">
                                    <span class="Txtspan" id="">Terms </span>
                                    <select id="CmbTerms" disabled class="" name="CmbTerms">
                                        @foreach ($Terms as $titem)
                                            <option value="{{ $titem->Terms }}">{{ $titem->Terms }}</option>
                                        @endforeach
                                    </select>


                                </div>
                                <div class="CheckBox1">
                                    <label class="input-group text-info mx-1">
                                        <input class=" " type="checkbox" name="ChkTermsAll" id="ChkTermsAll" checked
                                            value=""> All
                                    </label>
                                </div>
                            </div>
                            <div class="row py-1">
                                <div class="inputbox col-sm-11">
                                    <span class="Txtspan" style="width:100px" id="">Status</span>
                                    <select id="CmbStatus" disabled class="" name="CmbStatus">
                                        @foreach ($Status as $sitem)
                                            <option value="{{ $sitem->Status }}">{{ $sitem->Status }}</option>
                                        @endforeach
                                    </select>


                                </div>
                                <div class="CheckBox1">
                                    <label class="input-group text-info mx-1">
                                        <input class=" " type="checkbox" name="ChkStatusAll"
                                            id="ChkStatusAll" checked value=""> All
                                    </label>
                                </div>
                            </div>

                        </div>


                        <div class="col-lg-6">
                            <div class="row py-1">

                                <div class="inputbox col-sm-11">
                                        <span class="Txtspan" id="">Department</span>
                                    <select id="CmbDepartment" disabled class="" name="CmbDepartment">
                                        @foreach ($Typesetup as $item)
                                            <option value="{{ $item->TypeCode }}">{{ $item->TypeName }}</option>
                                        @endforeach
                                    </select>


                                </div>
                                <div class="CheckBox1">
                                    <label class="input-group text-info mx-1">
                                        <input class=" " type="checkbox" name="ChkAllDepartment"
                                            id="ChkAllDepartment" checked value=""> All
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="table-responsive col-sm-11">

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
                                <div class="CheckBox1">
                                    <label class="input-group text-info mx-1">
                                        <input class=" " type="checkbox" name="ChkAllWH" id="ChkAllWH"
                                            checked value=""> All
                                    </label>
                                </div>

                            </div>

                        </div>

                            <div class="row py-1 mx-2">
                                <a name="BtnFill" id="BtnFill" class="btn btn-success col-sm-12" role="button"><i
                                        class="fa fa-file-text text-white" aria-hidden="true"></i> Show</a>
                            </div>
                            <div class="row py-1 mx-2">
                                <a name="BtnPrint" id="BtnPrint" class="btn btn-primary col-sm-12" role="button"><i
                                        class="fa fa-print text-white" aria-hidden="true"></i> Print</a>
                            </div>
                            <div class="row py-1 mx-2">
                                <a name="BtnExit" id="BtnExit" class="btn btn-danger col-sm-12" href="/"
                                    role="button"><i class="fas fa-door-open   text-white"></i> Exit</a>
                            </div>






                    </div>




                </div>
            </div>

            <div class="rounded shadow">
                <table class="table small" id="OrderRepotable">
                    <thead class="">
                        <tr>
                            <th>Order&nbsp;#</th>
                            <th>Order&nbsp;Date</th>
                            <th>VSN&nbsp;#</th>
                            <th>Event&nbsp;#</th>
                            <th>Customer&nbsp;Name</th>
                            <th>Vessel</th>
                            <th>Department</th>
                            <th>Terms</th>
                            <th>Status</th>
                            <th>Order&nbsp;Qty</th>
                            <th>Rec&nbsp;Qty</th>
                            <th>Delv&nbsp;Qty</th>
                            <th>Ret&nbsp;Qty</th>
                            <th>Miss&nbsp;Qty</th>
                            <th>Sold&nbsp;Qty</th>
                            <th>Return&nbsp;Qty</th>
                            <th>Order&nbsp;Amount</th>
                            <th>Send&nbsp;Mail</th>

                        </tr>
                    </thead>
                    <tbody id="OrderRepotablebody">

                    </tbody>
                </table>
                <div class="row py-1">
                    <input type="text" class="form-control ml-auto col-sm-1 mr-4 text-right" name="TxtTotOrderAmt"
                        id="TxtTotOrderAmt">
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
                        $('#CustomerCode').val(resposne.CustomerCode);


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
            var table = $('#OrderRepotable').DataTable({

                scrollY: 410,
                deferRender: true,
                scroller: true,
                paging: false,
                info: false,
                ordering: false,
                searching: false,


            });
            var table2 = $('#Warehousetable').DataTable({

                scrollY: 350,
                deferRender: true,
                scroller: true,
                paging: false,
                info: false,
                ordering: false,
                searching: false,
                responsive: true,


            });
            $(".dt-button").removeClass("dt-button")




            $('#OrderRepotable tbody').on('click', 'tr', function() {
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
            var MBranchCode = '{{ $BranchCode }}';
            var Qry = '';


            Qry = "OrderDate>='" + TxtDateFrom + "' and OrderDate<='" + TxtDateTo + "' and BranchCode=" + MBranchCode + "";

            if (!$("#ChkAllCustomer").is(":checked")) {
                if (Qry !== "") Qry = Qry + " and ";
                Qry = Qry + "CustomerName='" + CmbCustomer + "'";
            }

            if (!$("#ChkAllVessel").is(":checked")) {
                if (Qry !== "") Qry = Qry + " and ";
                Qry = Qry + "VesselName='" + CmbVessel + "'";
            }

            if (!$("#ChkStatusAll").is(":checked")) {
                if (Qry !== "") Qry = Qry + " and ";
                Qry = Qry + "Status='" + CmbStatus + "'";
            }

            if (!$("#ChkTermsAll").is(":checked")) {
                if (Qry !== "") Qry = Qry + " and ";
                Qry = Qry + "Terms='" + CmbTerms + "'";
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
                url: '/Orderreportsearch',
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

                    let data = resposne.orders;
                    let table = document.getElementById('OrderRepotablebody');
                    table.innerHTML = ""; // Clear the table
                    var ids = 0;
                    var TxtTotOrderAmt = 0;
                    var checked = 'checked';
                    data.forEach(function(item) {
                        ids = ids + 1;


                        let row = table.insertRow();
                        //   row.setAttribute("data-row-id", ids);
                        //   row.setAttribute('id', 'scoperow');
                        function createCell(content) {
                            let cell = row.insertCell();
                            cell.innerHTML = content;
                            return cell;
                        }
                        createCell(item.PONo)

                        var odate = new Date(item.OrderDate);
                        const OrderDate = odate.toISOString().substring(0, 10);
                        createCell(OrderDate);

                        createCell(item.VSNNo);
                        createCell(item.EventNo);
                        createCell(item.CustomerName);
                        createCell(item.VesselName);
                        createCell(item.Department);
                        createCell(item.Terms);
                        createCell(item.Status);
                        createCell(parseFloat(item.OrderQty).toFixed(2));
                        createCell(parseFloat(item.RecQty ? item.RecQty : '0').toFixed(2));
                        createCell(parseFloat(item.DeliveredQty ? item.DeliveredQty : '0').toFixed(2));
                        createCell(parseFloat(item.RtnQty ? item.RtnQty : '0').toFixed(2));
                        createCell(parseFloat(item.MissingQty ? item.MissingQty : '0').toFixed(2));
                        createCell(parseFloat(item.SoldQty ? item.SoldQty : '0').toFixed(2));
                        createCell(parseFloat(item.SaleReturnQty ? item.SaleReturnQty : '0').toFixed(
                            2));
                        createCell(parseFloat(item.ExtAmount ? item.ExtAmount : '0').toFixed(2)).style
                            .textAlign = 'right';
                        let ChkSendEmailCell = createCell('');
                        if (item.ChkSendEmail === '1') {
                            ChkSendEmailCell.innerHTML =
                                '<input class="ChkSendEmail mx-auto" type="checkbox" name="" id="" ' +
                                checked + ' value="' + item.ChkSendEmail + '">';
                        } else {
                            ChkSendEmailCell.innerHTML =
                                '<input class="ChkSendEmail mx-auto" type="checkbox" name="" id="" value="' +
                                item.ChkSendEmail + '">';
                        }


                        TxtTotOrderAmt += parseFloat(item.ExtAmount ? item.ExtAmount : '0');





                    });

                    $('#TxtTotOrderAmt').val(TxtTotOrderAmt.toFixed(2));

                    // $('#scoperow').dblclick(function () {
                    //     alert(this.td[0].innerHTML);
                    // });
                    // const table = document.getElementById("OrderRepotable");
                    const tableBody = document.getElementById("OrderRepotablebody");

                    tableBody.addEventListener("dblclick", function(e) {
                        if (e.target.tagName === "TD") {
                            const td = e.target;
                            const tr = td.parentNode;
                            const tdElements = tr.getElementsByTagName("td");
                            console.log(tdElements[0].innerHTML);
                            var ACt = tdElements[0].innerHTML;
                            // window.open("/Account-Ledger?ACT="+ACt);

                            window.location.href = "Account-Ledger?ACT=" + ACt;
                        }
                    });


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
                var Qry = QryMaker();
                var TxtDateFrom = $('#TxtDateFrom').val();
                var TxtDateTo = $('#TxtDateTo').val();
                // $('#btnqruey').click();
                window.location.href = "/orderreportprint?Qry=" + Qry + "&DateFrom=" + TxtDateFrom +
                    "&DateTo=" + TxtDateTo;


            });


        });
    </script>
@stop


@section('content')
