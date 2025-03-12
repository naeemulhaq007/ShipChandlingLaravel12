@extends('layouts.app')



@section('title', 'Vendor-Contract-Provision')

@section('content_header')

@stop

@section('content')
<?php echo View::make('partials.ImportExcelModal'); ?>


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
                        <h4 class="text-black">Vendor Contract Provision</h4>
                    </b>

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">

                            <div class="row py-2 ">
                                <div class="inputbox col-sm-4 ml-2">
                                    <input type="number" class="" id="TxtComputerNo" name="TxtComputerNo"
                                        required="required">
                                    <span class="Txtspan">
                                        Computer # </span>
                                </div>
                                <div class="inputbox col-sm-4 ml-1">
                                    <input type="number" class="" id="TxtComputer2" name="TxtComputer2"
                                        required="required">
                                    <span class="Txtspan">
                                        Computer 2 # </span>
                                </div>
                                <button class="btn btn-info  mx-1" id="Button6" role="button">Fill</button>
                                <div class="inputbox col-sm-2">
                                    <input type="text" class="" id="TxtWorkUser" readonly name="TxtWorkUser"
                                        >
                                    <span class="Txtspan">
                                        User </span>
                                </div>
                            </div>

                            <div class="row py-2 ">


                                <div class="inputbox col-sm-4 ml-2">
                                    <input type="date" class="" id="TxtDate" required="required">
                                    <span class="Txtspan">
                                        Entry Date
                                    </span>
                                </div>

                                <div class="inputbox col-sm-4 ml-1">
                                    <input type="date" class="" id="TxtExpiryDate" required="required">
                                    <span class="Txtspan">
                                        Expiry Date
                                    </span>
                                </div>





                            </div>

                            <div class="row py-2">

                                <div class="inputbox col-sm-2 ml-2">
                                    <input type="text" class=" " id="TxtVendorCodeText" required="required">
                                    <span class="Txtspan">
                                        Vendor Code
                                    </span>
                                </div>
                                <div class="inputbox col-sm-6 ml-1">
                                    <select name="CmbVenderName" id="CmbVenderName">
                                        <option value="0"></option>
                                        @foreach ($VenderSetup as $VenderSetupitem)
                                            <option value="{{ $VenderSetupitem->VenderCode }}">
                                                {{ $VenderSetupitem->VenderName }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span class="Txtspan">
                                        Vendor Name
                                    </span>
                                </div>


                            </div>


                            <div class="row py-2">




                                <div class="inputbox col-sm-8 ml-2">
                                    <select name="CmbDepartment" id="CmbDepartment">
                                        <option value="0"></option>

                                        @foreach ($Department as $Departmentitem)
                                            <option value="{{ $Departmentitem->TypeCode }}">{{ $Departmentitem->TypeName }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span class="Txtspan">
                                        Department
                                    </span>
                                </div>


                            </div>
                            <div class="row py-2">




                                <div class="inputbox col-sm-8 ml-2">
                                    <select name="CmbGodownName" id="CmbGodownName">
                                        <option value="0"></option>

                                        @foreach ($GodownSetup as $GodownSetupitem)
                                            <option value="{{ $GodownSetupitem->GodownCode }}">
                                                {{ $GodownSetupitem->GodownName }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span class="Txtspan">
                                        Location
                                    </span>
                                </div>


                            </div>
                            <div class="row py-2">
                                <div class="inputbox col-sm-8 ml-2">
                                    <input name="TxtEmailAddress" id="TxtEmailAddress">

                                    <span class="Txtspan">
                                        Email
                                    </span>
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="inputbox col-sm-8 ml-2">
                                    <input name="TxtAddress" id="TxtAddress">

                                    <span class="Txtspan">
                                        Address
                                    </span>
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="inputbox col-sm-8 ml-2">
                                    <input name="TxtPhoneNo" id="TxtPhoneNo">

                                    <span class="Txtspan">
                                        Phone No.
                                    </span>
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="inputbox col-sm-8 ml-2">
                                    <input name="LblTotal" id="LblTotal" readonly>

                                    <span class="Txtspan">
                                        No. of Products
                                    </span>
                                </div>
                            </div>

                            {{-- <div class="row py-2">
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
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label text-info mx-1">
                                            <input class="form-check-input " type="checkbox" name="AllVessel"
                                                id="AllVessel" checked value=""> All
                                        </label>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="row ml-1 py-2">
                                <button class="btn btn-success  mx-2" id="BtnFill" role="button"> <i
                                        class="fa fa-cloud mr-1" aria-hidden="true"></i>Save</button>

                                <button class="btn btn-primary mx-2" id="CmdNew" role="button"> <i
                                        class="fa fa-plus mr-1" aria-hidden="true"></i>New</button>

                                <button class="btn btn-dark mx-2" id="CmdExport" role="button"> <i
                                        class="fa fa-file-excel mr-1" aria-hidden="true"></i>Export</button>

                                <button class="btn btn-dark mx-2" id="CmdImport" role="button"> <i
                                        class="fa fa-sign-in mr-1" aria-hidden="true"></i>Import</button>

                                <button class="btn btn-primary mx-2" id="CmdReport" role="button"> <i
                                        class="fa fa-file-text mr-1" aria-hidden="true"></i>Report</button>

                                <button class="btn btn-warning mx-2" id="CmdDelete" role="button"> <i
                                        class="fa fa-trash mr-1" aria-hidden="true"></i>Delete</button>

                                <button class="btn btn-danger mx-2" id="CmdExit" role="button"> <i
                                        class="fa fa-door-open mr-1" aria-hidden="true"></i>Exit</button>

                            </div>

                        </div>

                        <div class="col-sm-6">

                            <div class="rounded shadow">
                                <table class="table small" id="DG2">
                                    <thead class="bg-info">
                                        <tr>
                                            <th>S#</th>
                                            <th>Vendor</th>
                                            <th>Exp Date</th>
                                            <th>W.H</th>

                                        </tr>
                                    </thead>
                                    <tbody id="DG2body">
                                        @foreach ($qrymaster as $qry)
                                            <tr>
                                                <td>
                                                    {{ $qry->ComputerNo }}
                                                </td>
                                                <td>
                                                    {{ $qry->VendorName }}
                                                </td>
                                                <td>
                                                    {{ $qry->ExpiryDate }}
                                                </td>
                                                <td>
                                                    {{ $qry->GodownName }}
                                                </td>
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
    </div>
    <div class="col-lg-12 pb-5">
        <div class="card">
            <div class="card-header ">
                <div class="card-tools ">


                    <button type="button" name="headertoggle" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
<?php echo View::make('partials.vencontractitemsearch'); ?>

                <div class="row">
                    <div class="inputbox col-sm-3 ml-2">
                        <input name="TxtItemName" id="TxtItemName">

                        <span class="Txtspan">
                            Search Product
                        </span>
                    </div>
                    <div class="inputbox col-sm-3 ml-4">
                        <input name="TxtIMPANO" id="TxtIMPANO">

                        <span class="Txtspan">
                            IMPA No.
                        </span>
                    </div>
                </div>

            </div>
            <div class="card-body">
                <div class="row">




                    <div class="rounded shadow table-responsive">
                        <table class="table " id="DG1">
                            <thead class="">
                                <tr>
                                    <th>Item&nbsp;Code</th>
                                    <th>Product&nbsp;Name</th>
                                    <th>Product&nbsp;Name&nbsp;Vendor</th>
                                    <th>UOM</th>
                                    <th>IMPA&nbsp;Code</th>
                                    <th>Vendor&nbsp;Price</th>
                                    <th>Last&nbsp;Date</th>
                                    <th>User</th>
                                    <th>V&nbsp;Part&nbsp;Number</th>
                                    <th>Remarks</th>
                                </tr>
                            </thead>
                            <tbody id="DG1body">

                            </tbody>

                        </table>

                    </div>







                </div>
                <div class="row py-2">
                <button class="btn btn-success  mx-2" id="BtnFill" role="button"> <i
                    class="fa fa-plus mr-1" aria-hidden="true"></i>Add Row</button>

            <button class="btn btn-danger mx-2" id="CmdExit" role="button"> <i
                    class="fa fa-multiply mr-1" aria-hidden="true"></i>Delete Row</button></div>
            </div>
        </div>
    </div>


    <div class="col-xl-12" id="impmod" style="display: none">
        <div class="row">
            <div class="card col-xl-12">
                <div class="card-header">
                    <h5 class="card-title">Item Imports</h5>

                    <a name="" id="btninsertthis" class="btn btn-primary ml-5"  role="button">Insert this to Table</a>
                    <div class="card-tools">
                        <a name="SaveImportItem" id="SaveImportItem" class="btn btn-primary"
                            role="button">SaveImportItem</a>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">


                        <div class="col-md-12 table-responsive">

                            <table class="table  table-inverse table-bordered" id="importitemtable">
                                <thead class="bg-info">
                                    <tr>
                                        <th style="width:125px">Our&nbsp;ItemCode</th>
                                        <th style="width:500px">Our&nbsp;ItemName</th>
                                        <th>Our&nbsp;UOM</th>
                                        <th class="text-right">QTY</th>
                                        <th class="text-right">Our&nbsp;Price</th>
                                        <th>Matching</th>
                                        <th style="width:100px">ItemCode</th>
                                        <th style="width:500px">ItemName</th>
                                        <th>UOM</th>
                                        <th class="text-right">Price</th>
                                    </tr>
                                </thead>
                                <tbody id="importitembody">
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
        function DataGet() {
            var TxtComputerNo = $('#TxtComputerNo').val();
            ajaxSetup();
            $.ajax({
                    url: '{{ route('GetDataVenContract') }}',
                    type: 'POST',
                    data: {
                        TxtComputerNo
                    },
                    beforeSend: function() {
                        // Show the overlay and spinner before sending the request
                        $('.overlay').show();
                    },
                    success: function(response) {
                        console.log(response);
                        var Master = response.Master;
                        var Details = response.Details;
                        if (Master) {
                            $('#TxtWorkUser').val(Master.WorkUser ? Master.WorkUser : '');
                            var odate = new Date(Master.EntryDate ? Master.EntryDate : '');
                            const EntryDate = odate.toISOString().substring(0, 10);
                            $('#TxtDate').val(EntryDate);
                        }
                        let table = document.getElementById('DG1body');
                        if(Details.length > 0){
                            $('#TxtVenderCode').val(Details[0].VenderCode);
                            $('#TxtVendorCodeText').val(Details[0].VendorCusCode);
                            // $('#CmbVenderName').val(Details[0].VenderName);
                            $('#TxtExpiryDate').val(Details[0].ExpiryDate);
                            $('#TxtGodownCode').val(Details[0].GodownCode);
                            // $('#TxtVenderCode').val(Details[0].GodownName);
                            $('#TxtDepartmentCode').val(Details[0].DepartmentCode);
                            // $('#TxtVenderCode').val(Details[0].TypeName);
                            table.innerHTML = ""; // Clear the table
                            var N = 0; // Clear the table

                            Details.forEach(function(item) {
                                N = N+1;
                            let row = table.insertRow();
                            function createCell(content) {
                            let cell = row.insertCell();
                            cell.innerHTML = content;
                            return cell;
                            }
                            createCell(item.ItemCode ? item.ItemCode : '');
                            createCell(item.ItemName ? item.ItemName : '');
                            createCell('');
                            createCell(item.UOM ? item.UOM : '');
                            createCell(item.VendorPrice ? item.VendorPrice : '');
                            createCell(item.Remarks ? item.Remarks : '');
                            let MDate1 = item.LastDate ? item.LastDate : ''
                            var Mdate = new Date(MDate1);
                            const LastDate = Mdate.toISOString().substring(0, 10);
                            createCell(LastDate);
                            createCell(item.IMPAItemCode ? item.IMPAItemCode : '');
                            createCell(item.WorkUser ? item.WorkUser : '');
                            createCell(item.VPartCode ? item.VPartCode : '');
                            createCell(item.ID ? item.ID : '');

                            });
                            $('#LblTotal').val(N);
                        }else{
                            table.innerHTML = ""; // Clear the table
                            $('#CmbDepartment').val(0);
                        }


                    },
                    complete: function() {
                        // Hide the overlay and spinner after the request is complete
                        $('.overlay').hide();
                    }
                });
        }
        // function Contactfiller() {
        //     var TxtComputer2 = $('#TxtComputer2').val();
        //     ajaxSetup();
        //     $.ajax({
        //             url: '{{ route('Contactfiller') }}',
        //             type: 'POST',
        //             data: {
        //                 TxtComputer2
        //             },
        //             beforeSend: function() {
        //                 // Show the overlay and spinner before sending the request
        //                 $('.overlay').show();
        //             },
        //             success: function(response) {
        //                 console.log(response);
        //                 // var Master = response.Master;
        //                 var Details = response.Table;
        //                 // if (Master) {
        //                 //     $('#TxtWorkUser').val(Master.WorkUser ? Master.WorkUser : '');
        //                 //     var odate = new Date(Master.EntryDate ? Master.EntryDate : '');
        //                 //     const EntryDate = odate.toISOString().substring(0, 10);
        //                 //     $('#TxtDate').val(EntryDate);
        //                 // }
        //                 let table = document.getElementById('DG1body');
        //                 if(Details.length > 0){
        //                     $('#TxtVenderCode').val(Details[0].VenderCode);
        //                     $('#TxtVendorCodeText').val(Details[0].VendorCusCode);
        //                     var odate = new Date(Details[0].ExpiryDate ? Details[0].ExpiryDate : '');
        //                     const ExpiryDate = odate.toISOString().substring(0, 10);
        //                     $('#TxtExpiryDate').val(ExpiryDate);
        //                     var Edate = new Date(Details[0].Date ? Details[0].Date : '');
        //                     const Date = Edate.toISOString().substring(0, 10);
        //                     $('#TxtDate').val(Date);
        //                     $('#TxtGodownCode').val(Details[0].GodownCode);
        //                     $('#TxtDepartmentCode').val(Details[0].DepartmentCode);
        //                     table.innerHTML = ""; // Clear the table
        //                     var N = 0; // Clear the table

        //                     Details.forEach(function(item) {
        //                         N = N+1;
        //                     let row = table.insertRow();
        //                     function createCell(content) {
        //                     let cell = row.insertCell();
        //                     cell.innerHTML = content;
        //                     return cell;
        //                     }
        //                     createCell(item.ItemCode ? item.ItemCode : '');
        //                     createCell(item.ItemName ? item.ItemName : '');
        //                     createCell('');
        //                     createCell(item.UOM ? item.UOM : '');
        //                     createCell(item.VendorPrice ? item.VendorPrice : '');
        //                     createCell(item.Remarks ? item.Remarks : '');
        //                     let MDate1 = item.LastDate ? item.LastDate : ''
        //                     var Mdate = new Date(MDate1);
        //                     const LastDate = Mdate.toISOString().substring(0, 10);
        //                     createCell(LastDate);
        //                     createCell(item.IMPAItemCode ? item.IMPAItemCode : '');
        //                     createCell(item.WorkUser ? item.WorkUser : '');
        //                     createCell(item.VPartCode ? item.VPartCode : '');
        //                     createCell(item.ID ? item.ID : '');

        //                     });
        //                     $('#LblTotal').val(N);
        //                 }else{
        //                     table.innerHTML = ""; // Clear the table
        //                     $('#CmbDepartment').val(0);
        //                 }


        //             },
        //             complete: function() {
        //                 // Hide the overlay and spinner after the request is complete
        //                 $('.overlay').hide();
        //             }
        //         });
        // }
        function ajaxSetup() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        }
        function rowcheck(){
            // Get the reference to the table body with ID "DG2body"
            const tableBody = document.getElementById('DG2body');

            // Loop through each row in the table body
            const rows = tableBody.getElementsByTagName('tr');
            for (let i = 0; i < rows.length; i++) {
                const row = rows[i];
                const expiryDateStr = row.cells[2].innerText; // Assuming the ExpiryDate cell is the third column (index 2)

                // Parse the date string to a Date object
                const expiryDate = new Date(expiryDateStr);

                // Compare with the current date
                if (expiryDate < new Date()) {
                    row.style.backgroundColor = 'red';
                }
            }

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

        function NewComputer(){
                ajaxSetup();

                $.ajax({
                    url: '{{ route('GetNewComp') }}',
                    type: 'POST',
                    data: {

                    },
                    beforeSend: function() {
                        // Show the overlay and spinner before sending the request
                        $('.overlay').show();
                    },
                    success: function(response) {
                        console.log(response);
                        $('#TxtComputerNo').val(response.MComputerNo);
                    },
                    complete: function() {
                        // Hide the overlay and spinner after the request is complete
                        $('.overlay').hide();
                    }
                });
            };
        $(document).ready(function() {
            rowcheck();
            $('#CmdNew').click(function (e) {
                e.preventDefault();
                NewComputer();
            });


            var table1 = $('#DG2').DataTable({

                scrollY: 580,
                deferRender: true,
                scroller: true,
                paging: false,
                info: false,
                ordering: false,
                searching: false,
                responsive: true,


            });

            var table2 = $('#DG1').DataTable({

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



            var odate = new Date();
            const today = odate.toISOString().substring(0, 10);
            $('#TxtDate').val(today);
            $('#TxtExpiryDate').val(today);


            $('#CmdImport').click(function (e) {
                e.preventDefault();
                $('#importModal').modal('show');
            });

            $('#importForm').submit(function(e) {
                e.preventDefault();

                var formData = new FormData(this);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '{{ route('importQuataion') }}',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,


                    beforeSend: function() {
                        // Show the overlay and spinner before sending the request
                        $('.overlay').show();
                    },
                    success: function(response) {
                        console.log(response);
                        displayImportedData(response);
                    },
                    complete: function() {
                        // Hide the overlay and spinner after the request is complete
                        $('.overlay').hide();
                    }
                });
            });

            function displayImportedData(data) {
                let table = document.getElementById('importitembody');
                table.innerHTML = ""; // Clear the table
                var id = 0; // Clear the table
                data.forEach(function(item) {
                    let row = table.insertRow();

                    let ItemCodegetCell = row.insertCell(0);
                    ItemCodegetCell.innerHTML = item.ItemCodeget;
                    ItemCodegetCell.contentEditable = 'true';

                    let ItemNamegetCell = row.insertCell(1);
                    ItemNamegetCell.innerHTML = item.ItemNameget;
                    ItemNamegetCell.contentEditable = 'true';

                    let UOMgetCell = row.insertCell(2);
                    UOMgetCell.innerHTML = item.UOMget;
                    UOMgetCell.contentEditable = 'true';
                    UOMgetCell.addEventListener('blur', function() {
                        this.textContent = this.textContent.toUpperCase();
                    });
                    let QTYCell = row.insertCell(3);
                    QTYCell.innerHTML = parseFloat(item.Qty).toFixed(2);
                    QTYCell.style.Align = "right";

                    let PricegetCell = row.insertCell(4);
                    PricegetCell.innerHTML = parseFloat(item.Priceget).toFixed(2);
                    PricegetCell.style.Align = "right";
                    PricegetCell.contentEditable = 'true';

                    let percentage = row.insertCell(5);
                    percentage.innerHTML = parseFloat(item.percentage).toFixed(2) + '%';

                    let ItemCodeCell = row.insertCell(6);
                    ItemCodeCell.innerHTML = item.ItemCode;


                    let ItemNameCell = row.insertCell(7);
                    ItemNameCell.innerHTML = item.ItemName;

                    let UOMCell = row.insertCell(8);
                    UOMCell.innerHTML = item.UOM;

                    let PriceCell = row.insertCell(9);
                    PriceCell.innerHTML = parseFloat(item.Price).toFixed(2);
                    PriceCell.style.Align = "right";

                    let VendorCell = row.insertCell(10);
                    VendorCell.innerHTML = item.Vendor;
                    VendorCell.hidden = 'true';

                    let VendorcodeCell = row.insertCell(11);
                    VendorcodeCell.innerHTML = item.Vendorcode;
                    VendorcodeCell.hidden = 'true';
                });
                $('#importModal').modal('hide');

                $('#impmod').show();
                // table3.columns.adjust();


            }

            $('#btninsertthis').click(function (e) {
                e.preventDefault();
                let table = document.getElementById('importitembody');

                let rows = table.rows;

                let dataarray = [];
                for (let i = 1; i < rows.length; i++) {
                    let cells = rows[i].cells;
                    dataarray.push({


                        ItemCode: cells[0] ? cells[0].innerHTML : '',
                        ItemName: cells[1] ? cells[1].innerHTML : '',
                        UOM: cells[2] ? cells[2].innerHTML : '',
                        QTY: cells[3] ? cells[3].innerHTML : '',
                        Price: cells[4] ? cells[3].innerHTML : '',
                        Vendor: cells[10] ? cells[10].innerHTML : '',
                        Vendorcode: cells[11] ? cells[11].innerHTML : '',


                    });

                }

                                let table2 = document.getElementById('DG1body');
                            table2.innerHTML = ""; // Clear the table
                            let Id = 0;
                                dataarray.forEach(function(item) {
                                    Id = Id+1
                            let row = table2.insertRow();
                            function createCell(content) {
                            let cell = row.insertCell();
                            cell.innerHTML = content;
                            return cell;
                            }
                            createCell(item.ItemCode ? item.ItemCode : '');
                            createCell(item.ItemName ? item.ItemName : '');
                            createCell('');
                            createCell(item.UOM ? item.UOM : '');
                            createCell(item.IMPACode ? item.IMPACode : '');

                            let VPrice = createCell(item.Price ? item.Price : '');
                            createCell(item.LastDate ? item.LastDate : '');
                            createCell(item.WorkUser ? item.WorkUser : '');
                            createCell(item.Vpart ? item.Vpart : '');
                            createCell(item.Remarks ? item.Remarks : '');



                                });

            });
            $('#BtnFill').click(function(e) {
                var TxtDate = $('#TxtDate').val();
                var TxtExpiryDate = $('#TxtExpiryDate').val();
                var TxtComputerNo = $('#TxtComputerNo').val();
                var TxtVenderCode = $('#CmbVenderName').val();
                var CmbVenderName = $('#CmbVenderName option:selected').text();
                var TxtGodownCode = $('#CmbGodownName').val();
                var CmbGodownName = $('#CmbGodownName option:selected').text();
                var TxtDepartmentCode = $('#CmbDepartment').val();
                var CmbDepartment = $('#CmbDepartment option:selected').text();
                if (TxtComputerNo == '') {
                    NewComputer();
                }
                if (TxtVenderCode == 0) {
                    alert('Vendor Not Found Please Select Vendor First');
                    $('#TxtVenderCode').focus();
                    return;
                }
                if (TxtGodownCode == 0) {
                    alert('Warehouse Not Found Please Select Warehouse First');
                    $('#TxtGodownCode').focus();
                    return;
                }
                if (TxtDepartmentCode == 0) {
                    alert('Department Not Found Please Select Department First');
                    $('#TxtDepartmentCode').focus();
                    return;
                }
                let table = document.getElementById('DG1body');
                let rows = table.rows;
                const dataArray = [];
                for (let i = 1; i < rows.length; i++) {
                    let cells = rows[i].cells;


                    ItemCode = cells[0] ? cells[0].innerHTML : '';
                    ItemName = cells[1] ? cells[1].innerHTML : '';
                    ProductNameVendor = cells[2] ? cells[2].innerHTML : '';
                    UOM = cells[3] ? cells[3].innerHTML : '';
                    IMPACode = cells[4] ? cells[4].innerHTML : '';
                    VendorPrice = cells[5] ? cells[5].innerHTML : '';
                    LastDate = cells[6] ? cells[6].innerHTML : '';
                    User = cells[7] ? cells[7].innerHTML : '';
                    VPartNumber = cells[8] ? cells[8].innerHTML : '';
                    Remarks = cells[9] ? cells[9].innerHTML : '';

                    if (Number(VendorPrice) > 0 ) {
                        if (ItemCode == '' || ItemName == '') {
                            alert('ItemCode Not Found In Grid Please Select Item Name from Item List');
                            return;
                        }
                    }

                    dataArray.push({
                        ItemCode: cells[0] ? cells[0].innerHTML : '',
                        ItemName: cells[1] ? cells[1].innerHTML : '',
                        ProductNameVendor: cells[2] ? cells[2].innerHTML : '',
                        UOM: cells[3] ? cells[3].innerHTML : '',
                        IMPACode: cells[4] ? cells[4].innerHTML : '',
                        VendorPrice: cells[5] ? cells[5].innerHTML : '',
                        LastDate: cells[6] ? cells[6].innerHTML : '',
                        User: cells[7] ? cells[7].innerHTML : '',
                        VPartNumber: cells[8] ? cells[8].innerHTML : '',
                        Remarks: cells[9] ? cells[9].innerHTML : ''
                            });

                }

                $.ajax({
                    url: '{{ route('VendorContracSave') }}',
                    type: 'POST',
                    data: {
                        TxtDate,
                        TxtExpiryDate,
                        CmbDepartment,
                        CmbGodownName,
                        CmbVenderName,
                        TxtComputerNo,
                        TxtVenderCode,
                        TxtGodownCode,
                        TxtDepartmentCode,
                        dataArray,
                    },
                    beforeSend: function() {
                        // Show the overlay and spinner before sending the request
                        $('.overlay').show();
                    },
                    success: function(response) {
                        console.log(response);

                        if (response.Message == 'Deck\Engine Contract Cannot Save On this Form') {
                            alert(response.Message);
                        }
                        if(response.Message == 'Saved'){
                            var data = response.table;
                            let table = document.getElementById('DG2body');
                            table.innerHTML = ""; // Clear the table
                            data.forEach(function(item) {

                                let row = table.insertRow();
                                if (new Date(item.ExpiryDate) < new Date()) {
                                    row.style.backgroundColor = 'red';
                                }

                                function createCell(content) {
                                let cell = row.insertCell();
                                cell.innerHTML = content;
                                return cell;
                                }
                            createCell(item.ComputerNo ? item.ComputerNo : '');
                            createCell(item.VendorCode ? item.VendorCode : '');
                            createCell(item.ExpiryDate ? item.ExpiryDate : '');
                            createCell(item.GodownName ? item.GodownName : '');

                            });
                        }

                    },
                    complete: function() {
                        // Hide the overlay and spinner after the request is complete
                        $('.overlay').hide();
                    }
                });



            });


            $('#TxtComputerNo').blur(function (e) {
                e.preventDefault();
                DataGet();
            });

            // $('#Button6').click(function (e) {
            //     e.preventDefault();
            //     var TxtComputer2 = $('#TxtComputer2').val();

            //     if (TxtComputer2 > 0) {
            //         NewComputer();
            //     }else{
            //         return;
            //     }



            // });

                $('#CmdReport').click(function (e) {
                    e.preventDefault();
                var PortCode = $('#CmbGodownName').val();
                var VenderCode = $('#CmbVenderName').val();

                window.location ='VendorProductListprint?VenderCode='+VenderCode+'&PortCode='+PortCode+'';
                });
            //     e.preventDefault();

            //     var TxtDateTo = $('#TxtDateTo').val();
            //     var TxtDateFrom = $('#TxtDateFrom').val();

            //     var Qry = "QuoteMaster.QDate>='" + $('#TxtDateFrom').val() + "' and QuoteMaster.QDate<='" +
            //         $('#TxtDateTo').val() + "'";

            //     if (!$('#ChkBranchALL').is(':checked')) {
            //         if (Qry !== "") Qry += " and ";
            //         Qry += "QuoteMaster.BranchCode=" + parseInt($('#TxtBranchCode').val());
            //     }

            //     if (!$('#ChkAllETA').is(':checked')) {
            //         if (Qry !== "") Qry += " and ";
            //         Qry += "EventInvoice.BidDueDate>='" + $('#TxtDateETAFrom').val() +
            //             "' and EventInvoice.BidDueDate<='" + $('#TxtDateETATo').val() + "'";
            //     }

            //     if (!$('#ChkAllDepartment').is(':checked')) {
            //         if (Qry !== "") Qry += " and ";
            //         Qry += "QuoteMaster.DepartmentCode=" + parseInt($('#TxtDepartmentCode').val());
            //     }

            //     if (!$('#ChkAllCustomer').is(':checked')) {
            //         if (Qry !== "") Qry += " and ";
            //         Qry += "QuoteMaster.CustomerCode=" + parseInt($('#TxtCustomerCode').val());
            //     }

            //     if (!$('#AllVessel').is(':checked')) {
            //         if (Qry !== "") Qry += " and ";
            //         Qry += "EventInvoice.IMONo='" + $('#TxtVesselCode').val() + "'";
            //     }

            //     if (!$('#ChkPortALL').is(':checked')) {
            //         if (Qry !== "") Qry += " and ";
            //         Qry += "EventInvoice.ShippingPort='" + $('#CmbPort').val() + "'";
            //     }

            //     if (!$('#ChkEventNoALL').is(':checked')) {
            //         if (Qry !== "") Qry += " and ";
            //         Qry += "EventInvoice.EventNo=" + parseInt($('#TxtEventNo').val());
            //     }

            //     if (!$('#ChkWorkUser').is(':checked')) {
            //         if (Qry !== "") Qry += " and ";
            //         Qry += "QuoteMaster.WorkUser='" + $('#CmbWorkUser').val() + "'";
            //     }

            //     if (!$('#ChkAllOrdered').is(':checked')) {
            //         if (Qry !== "") Qry += " and ";
            //         if ($('#cmbOrdered').val() === "Ordered") {
            //             Qry += "not isnull(QuoteMaster.VSNNo)";
            //         } else {
            //             Qry += "isnull(QuoteMaster.VSNNo)";
            //         }
            //     }

            //     window.location = 'Daily-Quotation-Report-Report?TxtDateFrom=' + TxtDateFrom +
            //         '&TxtDateTo=' + TxtDateTo + '&Qry=' + Qry;

            // });












        });
    </script>




@stop


@section('content')
