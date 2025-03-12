@extends('layouts.app')



@section('title', 'Order-Transfer-and-Copy')

@section('content_header')

@stop

@section('content')
    </div>
    <div class="col-lg-12 pt-3 ">
        <div class="card">
            <div class="card-header">
                <h2 class=" text-blue text-bold">Order Transfer and Copy</h2>
            </div>
            <div class="card-header">
                <div class="card-tools ">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
                <div class="row">

                    <div class="ml-5">
                        <strong>VSN # :&nbsp;</strong> <label class="VSN text-blue" for="VSN"></label>
                    </div>

                    <div class="  ml-5 ">
                        /&nbsp; <strong>Event # :&nbsp;</strong> <label class="event_no text-blue" for="event_no"></label>

                    </div>
                    <div class="  ml-5 ">
                        /&nbsp; <strong>Customer :&nbsp;</strong> <label class="customer text-blue" for="customer"></label>

                    </div>
                    <div class="  ml-5 ">
                        /&nbsp; <strong>Vessel :&nbsp;</strong> <label class="vessel text-blue" for="vessel"></label>

                    </div>

                    <div class="  ml-5 ">
                        /&nbsp; <strong>Charge # :&nbsp;</strong> <label class="Charge text-blue" for="Charge"><input
                                type="text" name="ChargeNo" class="form-control" style="width: 80px; margin-top:-5px"
                                id="ChargeNo" value="{{ $PONO }}"></label>&nbsp;&nbsp; <button
                            class="text-success border" id="filler">Fill</button>

                    </div>
                    <div class="  ml-5 ">
                        /&nbsp; <strong>Quote # :&nbsp;</strong> <label class="QuoteNo text-blue" for="QuoteNo"></label>

                    </div>

                    <div class="  ml-5 mr-5 ">
                        /&nbsp; <strong>IMO # :&nbsp;</strong> <label class="IMO text-blue" for="IMO"></label>

                    </div>




                </div>
            </div>
            <div class="card-body">
                <div class="col-lg-12 py-2">

                    <div class="row">

                        <div class="inputbox col-sm-2 py-1">
                            <input value="" type="date" id="PurchaseOrderDate" name="PurchaseOrderDate">
                            <span> Purchase Order Date </span>
                        </div>

                        <input class="" value="0" type="hidden" id="scode" name="scode">

                        <div class="inputbox col-sm-2 py-1">
                            <input value="" type="number" id="SplitPONo" name="SplitPONo">
                            <span> Split PO # </span>
                        </div>

                        <div class="inputbox col-sm-2 py-1">
                            <input value="" type="text" id="Godowncode" name="Godowncode">
                            <span>Godowncode</span>
                        </div>

                        <div class="inputbox col-sm-2 py-1">
                            <input value="" type="text" id="DepartmentName" name="DepartmentName">
                            <span>DepartmentName</span>
                        </div>
                        <div class="inputbox col-sm-2 py-1">
                            <input value="" type="text" id="Status" name="Status">
                            <input value="" type="hidden" id="CustomerCode" name="CustomerCode">
                            <span>Status</span>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">


                <div class=" mx-auto">
                    <table class="table  table-inverse " id="PO" style="width: 100%">
                        <thead class="bg-info">
                            <tr>
                                <th>Buy</th>
                                <th>Buy&nbsp;By</th>
                                <th>PO</th>
                                <th>Charge#</th>
                                <th>Qty</th>
                                <th>Unit</th>
                                <th>IMPA</th>
                                <th style="width:400px">Item&nbsp;Name</th>
                                <th>Internal</th>
                                <th style="width:200px">Vendor</th>
                                <th>V&nbsp;Srch</th>
                                <th class="text-right">Cost&nbsp;Price</th>
                                <th class="text-right">Sell&nbsp;Price</th>
                                <th hidden>Vendor&nbsp;Code</th>
                                <th hidden>OrderID</th>
                                <th hidden>SNo</th>
                                <th>Rec&nbsp;Qty&nbsp;Order</th>
                            </tr>
                        </thead>
                        <tbody id="podata" class="podata">

                        </tbody>
                    </table>
                </div>
                <div class="progress progress-striped active">
                    <div class="progress-bar progress-bar-success bg-success" style="width:0%">
                    </div>
                </div>
                <div class="row py-2 ml-1">
                    <a name="" id="selectAll" class="btn btn-info col-sm-1 form-control mx-1" role="button">Select
                        All</a>
                    <a name="" id="unselectall" class="btn btn-info col-sm-1 form-control mx-1"
                        role="button">UnSelect
                        All</a>
                    <a name="" id="refreshPage" class="btn btn-info col-sm-1 form-control mx-1"
                        role="button">Refresh</a>

                </div>

            </div>
        </div>
        <div class="card">
            <div class="card-body">


                <div class=" mx-auto">
                    <table class="table small table-inverse" id="vPO">
                        <thead class="bg-info">
                            <tr>
                                <th style="width: 200px">Vendor</th>
                                <th>Select</th>
                                <th>Total&nbsp;Purch&nbsp;Value</th>
                                <th>#Items&nbsp;NotPurch</th>
                                <th hidden>#&nbsp;of&nbsp;Prev&nbsp;POs</th>
                                <th>Rec&nbsp;Qty</th>
                                <th hidden>MFreight</th>
                                <th>Vendor&nbsp;Code</th>
                                <th>PO#</th>
                                <th>PO&nbsp;Date</th>
                                <th style="width: 200px">Atten:</th>
                                <th>Your&nbsp;Code</th>
                                <th>Terms</th>
                                <th>Ship&nbsp;Via</th>
                                <th>ReqDate</th>
                                <th>Time</th>
                                <th>Vendor&nbsp;Comments</th>
                                <th>PORecDate</th>
                                <th>PORecTime</th>
                            </tr>
                        </thead>
                        <tbody id="vpodata">

                        </tbody>
                    </table>
                </div>


                <div class="">

                    {{-- <div class="row py-1">
                        <div class="inputbox col-sm-1 mx-1">
                            <input type="text" name="" placeholder="">
                        </div>

                        <div class="inputbox col-sm-1 mx-1">
                            <input type="text" name="" placeholder="">
                        </div>

                        <div class="inputbox col-sm-1 mx-1">
                            <input type="text" name="" placeholder="">
                        </div>

                    </div> --}}

                    <div class="row py-3">

                        <div class="inputbox col-sm-2">
                            <input type="text" name="" placeholder="">
                            <span class="" id="">Total</span>
                        </div>

                        {{-- <div class="inputbox col-sm-2">
                            <input type="text" name="" placeholder="">
                            <span id="">Disc Per</span>
                        </div>

                        <div class="inputbox col-sm-2">
                            <input type="text" name="" placeholder="">
                            <span id="">Freight</span>
                        </div> --}}

                        <div class="inputbox col-sm-3">
                            <span class="Txtspan" id="">Department Filter</span>
                            <select name="" id="">
                                <option selected>Select one</option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <div class="row py-1 ml-1">
                        <a name="" id="selectallven" class="btn btn-info col-sm-1 form-control mx-1"
                            role="button">Select All</a>
                        <a name="" id="unselectallven" class="btn btn-info col-sm-1 form-control mx-1"
                            role="button">UnSelect All</a>

                    </div>
                    <div class="row py-1 ml-1">
                        <a name="" class="btn btn-info col-sm-1 form-control mx-1" role="button">Close</a>
                        <a name="" class="btn btn-info col-sm-1 form-control mx-1" role="button">Print PO
                            Selection</a>
                        <a name="" id="CreatePO" class="btn btn-success col-sm-2 form-control mx-1"
                            role="button">Create PO (Process)</a>
                        <a name="" class="btn btn-info col-sm-1 form-control mx-1" role="button">Clear Buyer</a>
                        <a name="" class="btn btn-info col-sm-1 form-control mx-1" role="button">V Plat Event</a>

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
        .tablesize {
            flex: 89%;
            max-width: 89%;
        }
    </style>
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
        function ajaxSetup() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        }
        // $(document).ready(function () {

        var datarray;


        function Calcu() {
            let table = document.getElementById('podata');
            let rows = table.rows;
            var MValue = 0;
            for (let i = 0; i < rows.length; i++) {
                let cells = rows[i].cells;
                if ($('#buychk' + cells[14].innerHTML).prop("checked") == true) {

                    var Qty = cells[4] ? cells[4].innerHTML : '';
                    var Cost = cells[11] ? cells[11].innerHTML : '';

                    MValue += parseFloat(Qty) * parseFloat(Cost);
                }

            }
            MValue = parseFloat(MValue).toFixed(2);
            $('#LblTotal').val(MValue);
        }

        function TableComposer() {
            let table = document.getElementById('podata');
            let rows = table.rows;
            var Mcheck;
            datarray = [];
            for (let i = 0; i < rows.length; i++) {
                let cells = rows[i].cells;
                if ($('#buychk' + cells[14].innerHTML).prop("checked") == true) {
                    Mcheck = 1;

                    datarray.push({

                        MCheck: Mcheck,
                        BuyBy: cells[1] ? cells[1].innerHTML : '',
                        PO: cells[2] ? cells[2].innerHTML : '',
                        Charge: cells[3] ? cells[3].innerHTML : '',
                        Qty: cells[4] ? cells[4].innerHTML : '',
                        Unit: cells[5] ? cells[5].innerHTML : '',
                        IMPA: cells[6] ? cells[6].innerHTML : '',
                        ItemName: cells[7] ? cells[7].innerHTML : '',
                        Internal: cells[8] ? cells[8].innerHTML : '',
                        Vendor: cells[9] ? cells[9].innerHTML : '',
                        VSrch: cells[10] ? cells[10].innerHTML : '',
                        Cost: cells[11] ? cells[11].innerHTML : '',
                        SellPrice: cells[12] ? cells[12].innerHTML : '',
                        VCode: cells[13] ? cells[13].innerHTML : '',
                        ID: cells[14] ? cells[14].innerHTML : '',
                        SNo: cells[15] ? cells[15].innerHTML : '',
                        RecQtyOrder: cells[16] ? cells[16].innerHTML : '',



                    });
                } else {
                    Mcheck = 0;
                }
                console.log(Mcheck);
            }
            console.log(datarray);
            return datarray;
        }


        // });
        function purchasefill() {
            var PONO = $('#ChargeNo').val();
            var scode = $('#scode').val();
            var TxtSplitPONo = $('#SplitPONo').val();
            ajaxSetup();
            $.ajax({
                type: 'post',
                url: "{{ route('purchaseorderfiller') }}",
                data: {
                    PONO,
                    scode,
                },
                beforeSend: function() {
                    // Show the overlay and spinner before sending the request
                    $('.overlay').show();
                },
                success: function(respose) {
                    console.log(respose);
                    var Master = respose.Ordermasterdata;
                    var flipToVSN = respose.flipToVSN;
                    $('.VSN').text(Master.VSNNo);
                    $('.event_no').text(Master.EventNo);
                    $('.QuoteNo').text(Master.QuoteNo);
                    $('#Godowncode').val(Master.GodownCode);
                    $('#DepartmentName').val(Master.DepartmentName);
                    $('#Status').val(Master.Status);
                    $('.customer').text(flipToVSN.CustomerName);
                    $('.vessel').text(flipToVSN.VesselName);
                    $('#CustomerCode').val(flipToVSN.CustomerCode);
                    if (respose.orders.length > 0) {
                        let data = respose.orders;


                        let table = document.getElementById('podata');
                        table.innerHTML = ""; // Clear the table
                        data.forEach(function(item) {
                            let cheked = '';
                            if (item.ChkBuy > 0) {
                                cheked = 'checked';
                            } else {
                                cheked = '';
                            }
                            let row = table.insertRow();

                            let chekedCell = row.insertCell(0);
                            chekedCell.innerHTML = '<input id="buychk' + item.ID +
                                '" class="checkbox" type="checkbox" ' + cheked + ' >';


                            let WorkUserCell = row.insertCell(1);
                            WorkUserCell.innerHTML = item.WorkUser;

                            let POMadeNoCell = row.insertCell(2);
                            POMadeNoCell.innerHTML = item.POMadeNo;

                            let PONOCell = row.insertCell(3);
                            PONOCell.innerHTML = item.PONO;

                            let MOrderQty = item.OrderQty ? item.OrderQty : 0;
                            let MOrderQtyPO = item.OrderQtyPO ? item.OrderQtyPO : 0;
                            let MCancelQtyPO = item.CancelQtyPO ? item.CancelQtyPO : 0;

                            let QtyCell = row.insertCell(4);
                            QtyCell.innerHTML = (parseFloat(MOrderQty) - parseFloat(MOrderQtyPO) -
                                parseFloat(MCancelQtyPO)).toFixed(2);

                            let PUOMCell = row.insertCell(5);
                            PUOMCell.innerHTML = item.PUOM;

                            let IMPACell = row.insertCell(6);
                            IMPACell.innerHTML = item.IMPAItemCode;

                            let ItemNamecell = row.insertCell(7);
                            ItemNamecell.innerHTML = item.ItemName;
                            // ItemNamecell.hidden = true;

                            let InternalBuyerNotesell = row.insertCell(8);
                            InternalBuyerNotesell.innerHTML = item.InternalBuyerNotes;

                            let VendorNamecell = row.insertCell(9);
                            VendorNamecell.innerHTML = item.VendorName;

                            let buttoncell = row.insertCell(10);
                            buttoncell.innerHTML = '<button class="btn btn-default">?</button>';

                            let VendorPricecell = row.insertCell(11);
                            VendorPricecell.innerHTML = parseFloat(item.VendorPrice ? item.VendorPrice :
                                0).toFixed(2);
                            VendorPricecell.style.textAlign = 'right';

                            let SuggestPricecell = row.insertCell(12);
                            SuggestPricecell.innerHTML = parseFloat(item.Price ? item.Price : 0)
                                .toFixed(2);
                            SuggestPricecell.style.textAlign = 'right';

                            let VendorCodecell = row.insertCell(13);
                            VendorCodecell.innerHTML = item.VendorCode;
                            VendorCodecell.hidden = true;


                            let IDl = row.insertCell(14);
                            IDl.innerHTML = item.ID;
                            IDl.hidden = true;

                            let SNocell = row.insertCell(15);
                            SNocell.innerHTML = item.SNo;
                            SNocell.hidden = true;
                            console.log(item.SNo);


                            let RecQtycell = row.insertCell(16);
                            RecQtycell.innerHTML = parseFloat(item.RecQty ? item.RecQty : 0).toFixed(2);
                            RecQtycell.style.textAlign = 'center';
                        });
                    }
                    const selectAllButton = document.getElementById("selectAll");
                    const unselectallButton = document.getElementById("unselectall");
                    const selectallven = document.getElementById("selectallven");
                    const unselectallven = document.getElementById("unselectallven");
                    selectAllButton.addEventListener("click", function() {
                        const checkboxes = document.querySelectorAll(".checkbox");
                        checkboxes.forEach(function(checkbox) {
                            checkbox.checked = true;
                        });
                    });
                    unselectallButton.addEventListener("click", function() {
                        const checkboxes = document.querySelectorAll(".checkbox");
                        checkboxes.forEach(function(checkbox) {
                            checkbox.checked = false;
                        });
                    });
                    selectallven.addEventListener("click", function() {
                        const checkboxven = document.querySelectorAll(".checkboxven");
                        checkboxven.forEach(function(checkboxven) {
                            checkboxven.checked = true;
                        });
                    });
                    unselectallven.addEventListener("click", function() {
                        const checkboxven = document.querySelectorAll(".checkboxven");
                        checkboxven.forEach(function(checkboxven) {
                            checkboxven.checked = false;
                        });
                    });
                    // console.log(data);
                    if (respose.orders.length > 0) {


                        $('#refreshPage').click();
                    }

                },
                complete: function() {
                    // Hide the overlay and spinner after the request is complete
                    $('.overlay').hide();
                }
            });

        }










        $(document).ready(function() {
            $(".progress-bar").animate({
                width: "100%"

            }, 2500);
            setTimeout(function() {
                //   alert('Progress bar complete!');
                $(".progress-bar").hide();
            }, 3000);

            var table1 = $('#PO').DataTable({
                scrollY: 350,
                scrollX: true,
                deferRender: true,
                scroller: true,
                paging: false,
                info: false,
                ordering: false,
                searching: false,
                responsive: true,


            });
            var table2 = $('#vPO').DataTable({
                scrollX: true,
                scrollY: 350,
                deferRender: true,
                scroller: true,
                paging: false,
                info: false,
                ordering: false,
                responsive: true,
                searching: false,



            });
            if ($('#ChargeNo').val() !== '') {

                purchasefill();
            }




            $('#refreshPage').click(function(e) {
                e.preventDefault();
                ajaxSetup();
                dataarray = TableComposer();
                console.log(dataarray);
                PONO = $('#ChargeNo').val();
                VSN = $('.VSN').text();
                $.ajax({
                    type: 'post',
                    url: '{{ URL::to('PObtnclick') }}',
                    data: {
                        dataarray,
                        PONO,
                        VSN,
                    },
                    beforeSend: function() {
                        // Show the overlay and spinner before sending the request
                        $('.overlay').show();
                    },
                    success: function(respose) {
                        console.log(respose);
                        var data = respose.data;
                        let table = document.getElementById('vpodata');
                        table.innerHTML = ""; // Clear the table
                        let sr = 0;
                        data.forEach(function(item) {
                            let row = table.insertRow();

                            function createCell(content) {
                                let cell = row.insertCell();
                                cell.innerHTML = content;
                                return cell;
                            }
                            createCell(item.OrderCreateTemp.VendorName);
                            let select = createCell('');
                            select.innerHTML = '<input id="checkboxven' + sr +
                                '" class="checkboxven" type="checkbox">';
                            createCell(parseFloat(item.OrderCreateTemp.MEstPrice)
                                .toFixed(2)).style.align = 'right';
                            createCell(item.OrderCreateTemp.MEstPriceCount);
                            createCell(item.OrderCreateTemp.PoMadeNo).hidden = true;
                            createCell('');
                            createCell('');
                            createCell(item.OrderCreateTemp.VendorCode);
                            createCell(item.OrderCreateTemp.PONo);
                            let PODatecell = createCell('');
                            if (item.PurchaseOrderMaster) {
                                if (item.PurchaseOrderMaster.PODate) {

                                    let PODatedate = new Date(item.PurchaseOrderMaster
                                        .PODate);
                                    let PODate = PODatedate.toISOString().substring(0,
                                        10);
                                    PODatecell.innerHTML = PODate;
                                }
                            }
                            let vencont = createCell('');
                            let YOurCode = createCell('');
                            let Terms = createCell('');
                            let ShipVia = createCell('');
                            if (item.VenderSetup) {
                                vencont.innerHTML = item.VenderSetup.ContactPerson;
                                YOurCode.innerHTML = item.VenderSetup.YourCode;
                                Terms.innerHTML = item.VenderSetup.Terms;
                                ShipVia.innerHTML = item.VenderSetup.ShipVia;
                            }
                            let ReqDate = createCell('');
                            let Time = createCell('');
                            let VendorComment = createCell('');
                            let PORecDate = createCell('');
                            let PORecTime = createCell('');
                            // createCell(item.OrderCreateTemp.MRecQty);
                            if (item.PurchaseOrderMaster) {
                                if (item.PurchaseOrderMaster.ReqDate) {
                                    let rDatedate = new Date(item.PurchaseOrderMaster
                                        .ReqDate);
                                    let ReqDateDate = rDatedate.toISOString().substring(
                                        0, 10);
                                    ReqDate.innerHTML = ReqDateDate;
                                }
                                if (item.PurchaseOrderMaster.Time) {
                                    const TimeTime = new Date(item.PurchaseOrderMaster
                                        .Time);
                                    const hours = TimeTime.getHours().toString()
                                        .padStart(2, '0');
                                    const minutes = TimeTime.getMinutes().toString()
                                        .padStart(2, '0');
                                    const currentTimeFormatted = hours + ':' + minutes;
                                    Time.innerHTML = currentTimeFormatted;

                                }
                                if (item.PurchaseOrderMaster.VendorComment) {

                                    VendorComment.innerHTML = item.PurchaseOrderMaster
                                        .VendorComment;
                                }

                                if (item.PurchaseOrderMaster.PORecDate) {
                                    let prDatedate = new Date(item.PurchaseOrderMaster
                                        .PORecDate);
                                    let PORecDateate = prDatedate.toISOString()
                                        .substring(0, 10);
                                    PORecDate.innerHTML = PORecDateate;

                                }
                                if (item.PurchaseOrderMaster.Time) {
                                    const sTimeTime = new Date(item.PurchaseOrderMaster
                                        .Time);
                                    const shours = sTimeTime.getHours().toString()
                                        .padStart(2, '0');
                                    const sminutes = sTimeTime.getMinutes().toString()
                                        .padStart(2, '0');
                                    const sFormatted = shours + ':' + sminutes;
                                    PORecTime.innerHTML = sFormatted;

                                }
                            }
                            sr = sr + 1;
                        });
                        table2.columns.adjust();
                    },

                    complete: function() {
                        // Hide the overlay and spinner after the request is complete
                        $('.overlay').hide();
                    }
                });
            });
        });
















        $(document).ready(function() {
            $('#filler').click(function(e) {
                $('#scode').val(1);
                purchasefill();
            });
            document.getElementById("PurchaseOrderDate").valueAsDate = new Date();
            // const refreshButton = document.getElementById("refreshPage");
            // refreshButton.addEventListener("click", function() {
            //     location.reload();
            // });


            $('#ChargeNo').keydown(function(event) {
                if (event.keyCode === 13) {
                    event.preventDefault();
                    $('#ChargeNo').blur();
                }

            });
            $('#ChargeNo').blur(function(e) {
                e.preventDefault();
                purchasefill();

            });


            $('#CreatePO').click(function(e) {
                e.preventDefault();
                EventNo = $('.event_no').text();
                PONo = $('#ChargeNo').val();
                QuoteNo = $('.QuoteNo').text();
                GodownCode = $('#Godowncode').val();
                DepartmentName = $('#DepartmentName').val();
                PurchaseOrderDate = $('#PurchaseOrderDate').val();
                SplitPONo = $('#SplitPONo').val();
                customer = $('.customer').val();
                vessel = $('.vessel').val();
                vsno = $('.VSN').text();
                let table = document.getElementById('podata');
                let tablev = document.getElementById('vpodata');
                let rows = table.rows;
                let rowsv = tablev.rows;
                let dataarray = [];
                let data2 = [];
                if (rowsv.length > 0) {

                    for (let j = 0; j < rowsv.length; j++) {
                        let cellsv = rowsv[j].cells;
                        let select;
                        console.log(j);
                        console.log($('#checkboxven' + j).prop("checked"));
                        if ($('#checkboxven' + j).prop("checked") == true) {
                            select = 1;
                        } else {
                            select = 0;
                        }
                        console.log('select' + select);
                        data2.push({
                            VendorName: cellsv[0] ? cellsv[0].innerHTML : '',
                            MCheck: select,
                            TotalPurcValue: cellsv[2] ? cellsv[2].innerHTML : '',
                            MEstPriceCount: cellsv[3] ? cellsv[3].innerHTML : '',
                            PoMadeNo: cellsv[4] ? cellsv[4].innerHTML : '',
                            RecQty: cellsv[5] ? cellsv[5].innerHTML : '',
                            Freight: cellsv[6] ? cellsv[6].innerHTML : '',
                            VendorCode: cellsv[7] ? cellsv[7].innerHTML : '',
                            PONo: cellsv[8] ? cellsv[8].innerHTML : '',
                            PODatecell: cellsv[9] ? cellsv[9].innerHTML : '',
                            Atten: cellsv[10] ? cellsv[10].innerHTML : '',
                            YOurCode: cellsv[11] ? cellsv[11].innerHTML : '',
                            Terms: cellsv[12] ? cellsv[12].innerHTML : '',
                            ShipVia: cellsv[13] ? cellsv[13].innerHTML : '',
                            ReqDate: cellsv[14] ? cellsv[14].innerHTML : '',
                            Time: cellsv[15] ? cellsv[15].innerHTML : '',
                            VendorComment: cellsv[16] ? cellsv[16].innerHTML : '',
                            PORecDate: cellsv[17] ? cellsv[17].innerHTML : '',
                            PORecTime: cellsv[18] ? cellsv[18].innerHTML : '',

                        });
                        console.log(select);
                    }
                }


                for (let i = 0; i < rows.length; i++) {
                    let cells = rows[i].cells;
                    tdid = cells[14].innerHTML;

                    if ($('#buychk' + tdid).prop("checked") == true) {
                        dataarray.push({

                            BuyBy: cells[1] ? cells[1].innerHTML : '',
                            PO: cells[2] ? cells[2].innerHTML : '',
                            Charge: cells[3] ? cells[3].innerHTML : '',
                            Qty: cells[4] ? cells[4].innerHTML : '',
                            Unit: cells[5] ? cells[5].innerHTML : '',
                            IMPA: cells[6] ? cells[6].innerHTML : '',
                            ItemName: cells[7] ? cells[7].innerHTML : '',
                            Internal: cells[8] ? cells[8].innerHTML : '',
                            Vendor: cells[9] ? cells[9].innerHTML : '',
                            VSrch: cells[10] ? cells[10].innerHTML : '',
                            Cost: cells[11] ? cells[11].innerHTML : '',
                            SellPrice: cells[12] ? cells[12].innerHTML : '',
                            VCode: cells[13] ? cells[13].innerHTML : '',
                            ID: cells[14] ? cells[14].innerHTML : '',
                            SNo: cells[15] ? cells[15].innerHTML : '',
                            RecQtyOrder: cells[16] ? cells[16].innerHTML : '',


                        });
                    } else {
                        console.log("Notchecked");
                    }
                }
                // alert('saved');
                console.log(dataarray);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'post',
                    url: '{{ URL::to('posave') }}',
                    data: {
                        dataarray,
                        data2,
                        vsno,
                        GodownCode,
                        PONo,
                        QuoteNo,
                        EventNo,
                        EventNo,
                        vessel,
                        customer,
                        DepartmentName,
                        PurchaseOrderDate,
                    },
                    beforeSend: function() {
                        // Show the overlay and spinner before sending the request
                        $('.overlay').show();
                    },
                    success: function(response) {
                        purchasefill();

                        window.open("/purchaseorder?vsno=" + response.vsno, "PurchaseOrder",
                            "height=1000,width=1000,top=100,left=200");
                    },
                    complete: function() {
                        // Hide the overlay and spinner after the request is complete
                        $('.overlay').hide();
                    }
                });


            });







        })
    </script>
@stop


@section('content')
