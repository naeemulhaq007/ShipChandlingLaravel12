@extends('layouts.app')



@section('title', 'Balancesheet-Report')

@section('content_header')

@stop

@section('content')

    <div class="container-fluid ">

        <div class="col-lg-12">


            <div class="card mt-3">
                <div class="card-header">
                    <div class="card-tools ">


                        <button type="button" name="headertoggle" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                    <h4 >Balancesheet Report</h4>

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="row py-2 ">


                                <div class="inputbox col-sm-4 ml-2">
                                    <input type="date" class="" id="TxtDateTo" required="required">
                                    <span class="Txtspan">
                                        UP TO
                                    </span>
                                </div>

                            </div>



                            <div class="row ml-1 py-2">
                                <button class="btn btn-dark  mx-2" id="CmdGenerateNew" role="button"> <i
                                    class="fa fa-file-text mr-1" aria-hidden="true"></i>Generate</button>

                                <button class="btn btn-primary  mx-2" id="Button9" role="button"> <i
                                        class="fa fa-file-text mr-1" aria-hidden="true"></i>Print</button>

                                <button class="btn btn-danger mx-2" id="CmdExit" role="button"> <i
                                        class="fa fa-door-open mr-1" aria-hidden="true"></i>Exit</button>
                            </div>
                        </div>










                    </div>




                </div>
            </div>

            <div class="rounded shadow">
                <table class="table small" id="OrderRepotable">
                    <thead>
                        <tr>
                            <th>ActCode</th>
                            <th>ActName</th>
                            <th>Debit</th>
                            <th>Credit</th>
                            <th>ActName1</th>
                            <th>ActName2</th>
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

                scrollY: 150,
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
