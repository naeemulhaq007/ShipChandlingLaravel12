@extends('layouts.app')



@section('title', 'Quote Log')

@section('content_header')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@stop


@section('content')
    </div>
    <div class="container-fluid ">
        <div class="card">
            <div class="card-header">
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
                <div class="row">
                    <h3 class="text-bold mx-auto">Quote Log</h3>
                </div>
            </div>

            <div class="card-body">

                <div class="col-lg-12">
                    <div class="row">

                        <div class="inputbox col-sm-2 py-2">
                            <input class="" type="text" name="TxtRemarks" id="TxtRemarks">
                            <span class=" " id="">Remarks</span>
                        </div>

                        <div class="inputbox col-sm-2 py-2">
                            <input class="" type="text" name="TxtQuoteNo" id="TxtQuoteNo">
                            <span class=" " id="">Quote No</span>
                        </div>

                        <div class="inputbox col-sm-2 py-2">
                            <input class="" type="text" name="TxtCustomerRefNo" id="TxtCustomerRefNo">
                            <span class=" " id="">Ref No</span>
                        </div>

                        <div class="inputbox col-sm-2 py-2">
                            <input class="" type="date" name="TxtDateFrom" id="TxtDateFrom">
                            <span class=" " id="">Q Date </span>
                        </div>

                        <div class="inputbox col-sm-2 py-2">
                            <input class="" type="date" name="TxtDateTo" id="TxtDateTo">
                            <span class=" " id="">Q To </span>
                        </div>

                        <div class="CheckBox1">
                            <label class="input-group text-info mt-2 ml-2 py-2">
                                <input class=" " type="checkbox" name="ChkQDAteAll" id="ChkQDAteAll" checked
                                    value=""> ALL
                            </label>
                        </div>

                        <a name="BtnGoNew" id="BtnGoNew" class="btn btn-info  mx-3 my-2 col-sm-1"
                            role="button">Refresh</a>

                        <div class="inputbox col-sm-2 py-2">
                            <span class="Txtspan" id="">Deck/Engin / Prov/Bond</span>
                            <select id="CmbDeckEngin" class="" name="CmbDeckEngin">
                                <option></option>
                            </select>
                        </div>

                        <div class="inputbox col-sm-2 py-2">
                            <input class="" type="text" name="TxtCustomerName" id="TxtCustomerName">
                            <span class=" " id="">Customer Name</span>
                        </div>

                        <div class="inputbox col-sm-2 py-2">
                            <input class="" type="text" name="TxtVesselSearch" id="TxtVesselSearch">
                            <span class=" " id="">Vessel</span>
                        </div>

                        <div class="inputbox col-sm-2 py-2">
                            <input class="" type="text" name="TxtPortName" id="TxtPortName">
                            <span class=" " id="">Port</span>
                        </div>

                        <div class="inputbox col-sm-2 py-2">
                            <span class="Txtspan" id="">Department</span>
                            <select id="CmbDepartment" class="" name="CmbDepartment">
                                <option value=""></option>
                                @foreach ($TypeSetup as $item)
                                    <option value="{{ $item->TypeCode }}">{{ $item->TypeName }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="inputbox col-sm-2 py-2">
                            <input class="" type="text" name="TxtValueAmount" id="TxtValueAmount">
                            <span class=" " id="">Value Amount</span>
                        </div>


                        <div class="inputbox col-sm-2 py-2">
                            <span class="Txtspan" id="">Status</span>
                            <select id="CmbStatus" class="" name="CmbStatus">
                                @foreach ($LogRemarks as $status)
                                    <option value="{{ $status->Code }}">{{ $status->LogStatus }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="inputbox col-sm-2 py-2">
                            <span class="Txtspan" id="">Quote Entry</span>
                            <select id="CmbQuoteEntry" class="" name="CmbQuoteEntry">
                                <option></option>
                            </select>
                        </div>

                        <div class="inputbox col-sm-2 py-2">
                            <span class="Txtspan" id="">Send To Vendor</span>
                            <select id="CmbSendToVendor" class="" name="CmbSendToVendor">
                                <option></option>
                            </select>
                        </div>

                        <div class="inputbox col-sm-2 py-2">
                            <span class="Txtspan" id="">Costing</span>
                            <select id="CmbCosting" class="" name="CmbCosting">
                                <option></option>
                            </select>
                        </div>

                        <div class="inputbox col-sm-2 py-2">
                            <span class="Txtspan" id="">Pricing</span>
                            <select id="CmbPricing" class="" name="CmbPricing">
                                <option></option>
                            </select>
                        </div>

                        <div class="inputbox col-sm-2 py-2">
                            <span class="Txtspan" id="">Re Key</span>
                            <select id="CmbReKey" class="" name="CmbReKey">
                                <option></option>
                            </select>
                        </div>

                        <div class="inputbox col-sm-2 py-2">
                            <span class="Txtspan" id="">S To Cus</span>
                            <select id="CmbSendToCust" class="" name="CmbSendToCust">
                                <option value="N">N</option>
                                <option value="Y">Y</option>
                            </select>
                        </div>

                        <div class="inputbox col-sm-2 py-2">
                            <span class="Txtspan" id="">Work User</span>
                            <select id="CmbWorkUser" class="" name="CmbWorkUser">
                                <option></option>
                            </select>
                        </div>

                        <div class="inputbox col-sm-2 py-2">
                            <input class="" type="text" name="TxtTotEstLineQuote" id="TxtTotEstLineQuote">
                            <span class=" " id="">Total Est Lines of Quote</span>
                        </div>

                        <div class="inputbox col-sm-2 py-2">
                            <input class="" type="text" name="TxtTotEnteredLineQuote"
                                id="TxtTotEnteredLineQuote">
                            <span class=" " id="">Entered Lines of Quote</span>
                        </div>
                    </div>
                    <div class="row">
                        <a name="CmdHot" id="CmdHot" class="btn btn-danger mx-2 col-sm-1 my-2" role="button">
                            HOT</a>
                        <a name="CmdNotHot" id="CmdNotHot" class="btn btn-success  mx-2 my-2 col-sm-1"
                            role="button">Not HOT</a>
                        <a name="BtnClearFilter" id="BtnClearFilter" class="btn btn-dark mx-2 my-2 col-sm-1"
                            role="button">Clear Filter</a>
                        <a name="updatevplat" id="updatevplat" class="btn btn-primary mx-2 my-2 col-sm-1"
                            role="button">Update VPlat</a>
                    </div>

                </div>
            </div>
        </div>
        <div class="table-responsive card">
            <table class="table  table-striped table-bordered table-hover small" id="quotelog">

                <thead class="">
                    <tr>
                        <th style="width: 50px">S&nbsp;No</th>
                        <th style="width: 50px">Quote&nbsp;No</th>
                        <th style="width: 119px">Q&nbsp;Date</th>
                        <th style="width: 48px">Cat</th>
                        <th style="width: 115px">Bid&nbsp;Due&nbsp;Date</th>
                        <th style="width: 119px">ETA</th>
                        <th style="width: 125px">Customer&nbsp;Ref&nbsp;No</th>
                        <th style="width: 600px">Customer&nbsp;Name</th>
                        <th style="width: 300px">Vessel&nbsp;Name</th>
                        <th style="width: 50px">Port&nbsp;Name</th>
                        <th style="width: 50px">Dept</th>
                        <th style="width: 50px">Est&nbsp;Line&nbsp;Quote</th>
                        <th style="width: 50px">Enter&nbsp;ed&nbsp;Line</th>
                        <th style="width: 50px">Cost&nbsp;Items</th>
                        <th style="width: 50px">Sale&nbsp;Items</th>
                        <th style="width: 50px" class="text-right">Sale&nbsp;Amount</th>
                        <th style="width: 50px" class="text-right">Gross&nbsp;Amount</th>
                        <th style="width: 50px">Status</th>
                        <th style="width: 50px">Quote&nbsp;Entry</th>
                        <th style="width: 50px">Sent&nbsp;To&nbsp;Vendor</th>
                        <th style="width: 50px">Costed</th>
                        <th style="width: 50px">Sale&nbsp;Pricied</th>
                        <th style="width: 50px">Rekey</th>
                        <th style="width: 50px">Sent&nbsp;To&nbsp;Cust.</th>
                        <th style="width: 50px">Remarks</th>
                        <th style="width: 50px">Create&nbsp;Quote</th>
                        <th style="width: 50px">User</th>
                        <th style="width: 50px">VSNNo</th>
                        <th style="width: 50px">StatusColorCode</th>
                        <th style="width: 50px">Hot</th>
                        <th style="width: 50px">EventNo</th>
                        {{-- <th style="width: 50px">MUserColor</th> --}}
                    </tr>
                </thead>
                <tbody id="quotelog-body">

                </tbody>
            </table>
        </div>
    </div>



@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
@stop

@section('js')
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>

    <script>
        $(document).ready(function() {
            var chekdate = new Date();
            const Today = chekdate.toISOString().substring(0, 10);

            $('#TxtDateFrom').val(Today);
            $('#TxtDateTo').val(Today);


            var table = $('#quotelog').DataTable({
                scrollY: 700,
                scrollX: true,
                deferRender: true,
                scroller: true,
                paging: false,
                info: false,
                ordering: false,
                responsive: true,
                searching: false,
                fixedHeader: true,
            });
            $(".dt-button").removeClass("dt-button")

            $('#quotelog tbody').on('click', 'tr', function() {
                var selectedRow = $(this);
                var selectedData = selectedRow[0].cells[1].innerHTML; // Get data from the second column (index 1)
                var CustomerRefNo = selectedRow[0].cells[6].innerHTML; // Get data from the second column (index 1)
                var CustomerName = selectedRow[0].cells[7].innerHTML; // Get data from the second column (index 1)
                var VesselName = selectedRow[0].cells[8].innerHTML; // Get data from the second column (index 1)
                var PortName = selectedRow[0].cells[9].innerHTML; // Get data from the second column (index 1)
                var Dept = selectedRow[0].cells[10].innerHTML; // Get data from the second column (index 1)
                var EstLineQuote = selectedRow[0].cells[11].innerHTML; // Get data from the second column (index 1)
                var GrossAmount = selectedRow[0].cells[16].innerHTML; // Get data from the second column (index 1)
                var Remarks = selectedRow[0].cells[24].innerHTML; // Get data from the second column (index 1)
                var thirdLastColumnValue = selectedRow.find('td:nth-last-child(3)').text(); // Get value from the third-to-last column

                if (thirdLastColumnValue === '1') {
                    selectedRow.css('background-color','rgb(199, 62, 74)'); // Set the background color if the value is '1'
                }

                if (!selectedRow.hasClass('selected')) {
                    $('#quotelog tbody tr').removeClass('selected'); // Remove 'selected' class from all rows
                    selectedRow.addClass('selected');
                    selectedRow.css('background-color',''); // Reset background color to remove inline style
                    // console.log(selectedData); // Log the data from the second column
                    $('#TxtQuoteNo').val(selectedData);
                    $('#TxtCustomerRefNo').val(CustomerRefNo);
                    $('#TxtCustomerName').val(CustomerName);
                    $('#TxtVesselSearch').val(VesselName);
                    $('#TxtPortName').val(PortName);
                    $('#TxtTotEnteredLineQuote').val(EstLineQuote);
                    $('#TxtValueAmount').val(GrossAmount);
                    $('#TxtRemarks').val(Remarks);
                    $('#CmbDepartment option').each(function() {
                        if ($(this).text() === Dept) {
                            $(this).prop('selected', true); // This selects the option
                        }
                    });
                }
                checkhot();

            });



            // function cusFunction() {
            //   var input, filter, table, tr, td, i, txtValue;
            //   input = document.getElementById("eventserch");
            //   filter = input.value.toUpperCase();
            //   table = document.getElementById("eventtable");
            //   tr = table.getElementsByTagName("tr");
            //   for (i = 0; i < tr.length; i++) {
            //     td = tr[i].getElementsByTagName("td")[3];
            //     if (td) {
            //       txtValue = td.textContent || td.innerText;
            //       if (txtValue.toUpperCase().indexOf(filter) > -1) {
            //         tr[i].style.display = "";
            //       } else {
            //         tr[i].style.display = "none";
            //       }
            //     }
            //   }
            // };

            // function vesFunction() {
            //   var input, filter, table, tr, td, i, txtValue;
            //   input = document.getElementById("vessercher");
            //   filter = input.value.toUpperCase();
            //   table = document.getElementById("eventtable");
            //   tr = table.getElementsByTagName("tr");
            //   for (i = 0; i < tr.length; i++) {
            //     td = tr[i].getElementsByTagName("td")[4];
            //     if (td) {
            //       txtValue = td.textContent || td.innerText;
            //       if (txtValue.toUpperCase().indexOf(filter) > -1) {
            //         tr[i].style.display = "";
            //       } else {
            //         tr[i].style.display = "none";
            //       }
            //     }
            //   }
            // };

            // function onChangeSelectOption() {
            // var selectElement = document.getElementById("username"); // replace "mySelect" with the ID of your select element
            // var selectedValue = selectElement.value;
            // var table = document.getElementById("eventtable"); // replace "eventtable" with the ID of your table
            // var rows = table.getElementsByTagName("tr");

            // for (var i = 0; i < rows.length; i++) {
            //     var cells = rows[i].getElementsByTagName("td");
            //     var showRow = false;
            //     for (var j = 0; j < cells.length; j++) {
            //     if (cells[j].textContent.toLowerCase().indexOf(selectedValue.toLowerCase()) > -1) {
            //         showRow = true;
            //         break;
            //     }
            //     }
            //     rows[i].style.display = showRow ? "" : "none";
            //     }
            // }
            function ajaxsetup() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            }

            $('#BtnGoNew').click(function(e) {
                e.preventDefault();

                var ChkQDAteAll = $('#ChkQDAteAll').is(":checked");
                var TxtDateFrom = $("#TxtDateFrom").val();
                var TxtDateTo = $("#TxtDateTo").val();
                var CmbSendToCust = $("#CmbSendToCust").val();
                var CmbCosting = $("#CmbCosting option:selected").text();
                var CmbPricing = $("#CmbPricing option:selected").text();
                var CmbReKey = $("#CmbReKey option:selected").text();
                var CmbStatus = $("#CmbStatus option:selected").text();
                var CmbWorkUser = $("#CmbWorkUser option:selected").text();
                var CmbDepartment = $("#CmbDepartment option:selected").text();
                var CmbDeckEngin = $("#CmbDeckEngin option:selected").text();
                var TxtVesselSearch = $("#TxtVesselSearch").val();
                var TxtCustomerName = $("#TxtCustomerName").val();
                var TxtPortName = $("#TxtPortName").val();
                var TxtQuoteNo = $("#TxtQuoteNo").val();
                var TxtValueAmount = $("#TxtValueAmount").val();
                var TxtCustomerRefNo = $("#TxtCustomerRefNo").val();


                var TxtDateFrom = $('#TxtDateFrom').val();
                var TxtDateTo = $('#TxtDateTo').val();
                var ChkSentToCust = $('#CmbSendToCust').val();
                var Qry = '';
                if (ChkQDAteAll == 'false') {
                    if (Qry !== "") Qry += " and ";
                    Qry += "QDate >= '" + TxtDateFrom + "' and QDate <= '" + TxtDateTo + "'";
                }

                if (CmbStatus !== "") {
                    if (Qry !== "") Qry += " and ";
                    Qry += "Status = '" + CmbStatus + "'";
                }

                if (CmbWorkUser !== "") {
                    if (Qry !== "") Qry += " and ";
                    Qry += "WorkUser = '" + CmbWorkUser + "'";
                }

                if (CmbDepartment !== "") {
                    if (Qry !== "") Qry += " and ";
                    Qry += "DepartmentName = '" + CmbDepartment + "'";
                }

                if (CmbDeckEngin !== "") {
                    if (CmbDeckEngin === "Deck/Engin") {
                        if (Qry !== "") Qry += " and ";
                        Qry += "ChkDeckEngin = 1";
                    } else {
                        if (Qry !== "") Qry += " and ";
                        Qry += "ChkDeckEngin = 0";
                    }
                }

                if (TxtVesselSearch !== "") {
                    if (Qry !== "") Qry += " and ";
                    Qry += "VesselName like '%" + TxtVesselSearch + "%'";
                }

                if (TxtCustomerName !== "") {
                    if (Qry !== "") Qry += " and ";
                    Qry += "CustomerName like '%" + TxtCustomerName + "%'";
                }

                if (TxtPortName !== "") {
                    if (Qry !== "") Qry += " and ";
                    Qry += "POrtName like '%" + TxtPortName + "%'";
                }

                if (parseInt(TxtQuoteNo) > 0) {
                    CmbSendToCust = "";
                    CmbStatus = "";
                    if (Qry !== "") Qry += " and ";
                    Qry += "QuoteNo = " + parseInt(TxtQuoteNo);
                } else {
                    CmbSendToCust = "N";
                    CmbStatus = "IN PROCESS";
                }

                var valueAmount = parseInt(TxtValueAmount.value);
                if (isNaN(valueAmount)) {
                    valueAmount = 0; // Set valueAmount to 0 if it is NaN (not a number)
                }

                if (valueAmount !== 0) {
                    if (Qry !== "") Qry += " and ";
                    Qry += "ValueAmount <= " + valueAmount;
                }

                if (TxtCustomerRefNo !== "") {
                    if (Qry !== "") Qry += " and ";
                    Qry += "CustomerRefNo like '%" + TxtCustomerRefNo + "%'";
                }

                if (CmbQuoteEntry === "Y") {
                    if (Qry !== "") Qry += " and ";
                    Qry += "ChkQuoteEntry = 1";
                } else if (CmbQuoteEntry === "N") {
                    if (Qry !== "") Qry += " and ";
                    Qry += "ChkQuoteEntry = 0";
                }

                if (CmbSendToVendor === "Y") {
                    if (Qry !== "") Qry += " and ";
                    Qry += "ChkSendToVendor = 1";
                } else if (CmbSendToVendor === "N") {
                    if (Qry !== "") Qry += " and ";
                    Qry += "(ChkSendToVendor = 0 or ChkSendToVendor is null)";
                }

                if (CmbCosting === "Y") {
                    if (Qry !== "") Qry += " and ";
                    Qry += "ChkCosting = 1";
                } else if (CmbCosting === "N") {
                    if (Qry !== "") Qry += " and ";
                    Qry += "ChkCosting = 0";
                }

                if (CmbPricing === "Y") {
                    if (Qry !== "") Qry += " and ";
                    Qry += "ChkPricing = 1";
                } else if (CmbPricing === "N") {
                    if (Qry !== "") Qry += " and ";
                    Qry += "ChkPricing = 0";
                }

                if (CmbReKey === "Y") {
                    if (Qry !== "") Qry += " and ";
                    Qry += "ChkReKey = 1";
                } else if (CmbReKey === "N") {
                    if (Qry !== "") Qry += " and ";
                    Qry += "(ChkReKey = 0 or ChkReKey is null)";
                }
                console.log(Qry);
                ajaxsetup();

                $.ajax({
                    type: 'post',
                    url: '{{ URL::to('getquote') }}',
                    data: {
                        ChkQDAteAll,
                        CmbSendToCust,
                        CmbReKey,
                        CmbPricing,
                        CmbCosting,
                        CmbStatus,
                        CmbWorkUser,
                        CmbDepartment,
                        CmbDeckEngin,
                        TxtVesselSearch,
                        TxtQuoteNo,
                        TxtValueAmount,
                        TxtCustomerRefNo,
                        TxtPortName,
                        TxtCustomerName,
                        TxtDateFrom,
                        TxtDateTo,
                        ChkSentToCust,
                        Qry,
                    },
                    beforeSend: function() {
                        // Show the overlay and spinner before sending the request
                        $('.overlay').show();
                    },
                    success: function(response) {
                        console.log(response);
                        if (response.sp) {
                            var data = response.sp;
                            let table = document.getElementById('quotelog-body');
                            table.innerHTML = ""; // Clear the table
                            data.forEach(function(item, index) {
                                let ids = index + 1;
                                let row = table.insertRow();

                                if (item.HOT == '1') {
                                    // row.style.backgroundColor = "rgb(199 62 74)";
                                    row.classList.add("table-danger");

                                }

                                var checked = 'checked';

                                function createCell(content) {
                                    let cell = row.insertCell();
                                    cell.innerHTML = content;
                                    return cell;
                                }

                                createCell(ids).style.width = '50px';

                                createCell(item.QuoteNo).style.width = '50px';

                                var qdate = new Date(item.QDate);
                                var qmonths = ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN',
                                    'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'
                                ];
                                var qday = qdate.getDate();
                                var qmonth = qmonths[qdate.getMonth()];
                                var qyear = qdate.getFullYear();
                                var QDate = qday + '-' + qmonth + '-' + qyear;
                                createCell(QDate).style.width = '119px';

                                createCell(item.CustCategory).style.width = '50px';

                                var Bdate = new Date(item.BidDueDate);
                                var Bmonths = ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN',
                                    'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'
                                ];
                                var Bday = Bdate.getDate();
                                var Bmonth = Bmonths[Bdate.getMonth()];
                                var Byear = Bdate.getFullYear();
                                var BDate = Bday + '-' + Bmonth + '-' + Byear;
                                createCell(BDate).style.width = '119px';

                                var edate = new Date(item.ETA);
                                var emonths = ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN',
                                    'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'
                                ];
                                var eday = edate.getDate();
                                var emonth = emonths[edate.getMonth()];
                                var eyear = edate.getFullYear();
                                var eDate = eday + '-' + emonth + '-' + eyear;
                                createCell(eDate).style.width = '119px';

                                createCell(item.CustomerRefNo).style.width = '50px';
                                createCell(item.CustomerName).style.width = '600px';
                                createCell(item.VesselName).style.width = '300px';
                                createCell(item.POrtName).style.width = '50px';
                                createCell(item.DepartmentName).style.width = '50px';
                                createCell(item.EstLineQuote).style.width = '50px';
                                createCell(item.EnterLineQuote).style.width = '50px';
                                createCell(item.CstItems).style.width = '50px';
                                createCell(item.PricingItems).style.width = '50px';
                                createCell(parseFloat(item.ValueAmount ? item.ValueAmount : 0).toFixed(2)).style.textAlign = 'right';
                                createCell(parseFloat(item.MGrossSale ? item.MGrossSale : 0).toFixed(2)).style.textAlign = 'right';
                                createCell(item.STATUS).style.width = '50px';

                                if (item.ChkQuoteEntry) {
                                     createCell('<input class="ChkQuoteEntry mx-auto" disabled type="checkbox" name="ChkQuoteEntry" id="ChkQuoteEntry" ' + checked + ' value="' + item.ChkQuoteEntry + '">');
                                } else {
                                    createCell('<input class="ChkQuoteEntry mx-auto" disabled type="checkbox" name="ChkQuoteEntry" id="ChkQuoteEntry" value="' + item.ChkQuoteEntry + '">');
                                }

                                if (item.ChkSendToVendor) {
                                    createCell('<input class="ChkSendToVendor mx-auto" disabled type="checkbox" name="ChkSendToVendor" id="ChkSendToVendor" ' + checked + ' value="' + item.ChkSendToVendor + '">');
                                } else {
                                    createCell('<input class="ChkSendToVendor mx-auto" disabled type="checkbox" name="ChkSendToVendor" id="ChkSendToVendor" value="' + item.ChkSendToVendor + '">');
                                }

                                if (item.ChkCosting) {
                                     createCell('<input class="ChkCosting mx-auto" disabled type="checkbox" name="ChkCosting" id="ChkCosting" ' + checked + ' value="' + item.ChkCosting + '">');
                                } else {
                                     createCell('<input class="ChkCosting mx-auto" disabled type="checkbox" name="ChkCosting" id="ChkCosting" value="' + item.ChkCosting + '">');
                                }

                                if (item.ChkPricing) {
                                    createCell('<input class="ChkPricing mx-auto" disabled type="checkbox" name="ChkPricing" id="ChkPricing" ' + checked + ' value="' + item.ChkPricing + '">');
                                } else {
                                    createCell('<input class="ChkPricing mx-auto" disabled type="checkbox" name="ChkPricing" id="ChkPricing" value="' + item.ChkPricing + '">');
                                }

                                if (item.ChkRekey) {
                                    createCell('<input class="ChkRekey mx-auto" disabled type="checkbox" name="ChkRekey" id="ChkRekey" ' + checked + ' value="' + item.ChkRekey + '">');
                                } else {
                                    createCell('<input class="ChkRekey mx-auto" disabled type="checkbox" name="ChkRekey" id="ChkRekey" value="' + item.ChkRekey + '">');
                                }

                                if (item.ChkSentToCust) {
                                    createCell('<input class="mx-auto ChkSentToCust" disabled type="checkbox" name="ChkSentToCust" id="ChkSentToCust" ' + checked + ' value="' + item.ChkSentToCust + '">');
                                } else {
                                    createCell('<input class="mx-auto ChkSentToCust" disabled type="checkbox" name="ChkSentToCust" id="ChkSentToCust" value="' + item.ChkSentToCust + '">');
                                }

                                createCell(item.Comments).style.width = '50px';
                                createCell(item.AssignQuote).style.width = '50px';
                                createCell(item.WorkUser).style.width = '50px';
                                createCell(item.VSNNo).style.width = '50px';
                                createCell(item.StatusColorCode).style.width = '50px';
                                createCell(item.HOT).style.width = '50px';
                                createCell(item.EventNo).style.width = '50px';
                                // createCell(item.MUserColor).style.width = '50px';
                            });

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


            });

            function checkhot() {
                let table = document.getElementById('quotelog-body');
                let rows = table.rows;
                for (let i = 0; i < rows.length; i++) {
                    let cells = rows[i].cells;
                    if (cells[29].innerHTML == '1') {
                        // rows[i].style.backgroundColor = "rgb(199 62 74)";
                        rows[i].classList.add("table-danger");

                    } else {
                        // rows[i].style.backgroundColor = "";
                        rows[i].classList.remove("table-danger");

                    }

                }
            }

            function Makehot(QuoteNo) {
                let table = document.getElementById('quotelog-body');
                let rows = table.rows;
                for (let i = 0; i < rows.length; i++) {
                    let cells = rows[i].cells;
                    if (cells[1].innerHTML == QuoteNo) {
                        rows[i].classList.add("table-danger");

                        cells[29].innerHTML = '1';
                    }

                }
            }

            function NotHot(QuoteNo) {
                let table = document.getElementById('quotelog-body');
                let rows = table.rows;
                for (let i = 0; i < rows.length; i++) {
                    let cells = rows[i].cells;
                    if (cells[1].innerHTML == QuoteNo) {
                        rows[i].style.backgroundColor = "";
                        cells[29].innerHTML = '0'; // Corrected assignment operator
                    }
                }
            }


            $('#CmdHot').click(function(e) {
                e.preventDefault();
                var TxtQuoteNo = $('#TxtQuoteNo').val();

                ajaxsetup();

                $.ajax({
                    type: 'post',
                    url: '{{ URL::to('SetHot') }}',
                    data: {
                        TxtQuoteNo,

                    },
                    beforeSend: function() {
                        // Show the overlay and spinner before sending the request
                        $('.overlay').show();
                    },
                    success: function(response) {
                        console.log(response);
                        if (response.Message == 'HOT') {
                            Makehot(response.QuoteNo);
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

            });


            $('#CmdNotHot').click(function(e) {
                e.preventDefault();
                var TxtQuoteNo = $('#TxtQuoteNo').val();

                ajaxsetup();

                $.ajax({
                    type: 'post',
                    url: '{{ URL::to('NotHot') }}',
                    data: {
                        TxtQuoteNo,

                    },
                    beforeSend: function() {
                        // Show the overlay and spinner before sending the request
                        $('.overlay').show();
                    },
                    success: function(response) {
                        console.log(response);
                        if (response.Message == 'NotHot') {
                            NotHot(response.QuoteNo);
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

            });

            $('#BtnClearFilter').click(function(e) {
                e.preventDefault();
                $(TxtQuoteNo).val('');
                $(TxtCustomerRefNo).val('');
                $(TxtCustomerName).val('');
                $(TxtVesselSearch).val('');
                $(TxtPortName).val('');
                $(TxtValueAmount).val('');
                $(CmbQuoteEntry).val('');
                $(CmbSendToVendor).val('');
                $(CmbCosting).val('');
                $(CmbPricing).val('');
                $(CmbReKey).val('');
                $(CmbSendToCust).val('N');
                $(CmbDepartment).val('');


            });


        });
    </script>
@stop


@section('content')
