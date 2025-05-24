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
                                <!--<div class="inputbox col-sm-4 ml-1">-->
                                <!--    <input type="number" class="" id="TxtComputer2" name="TxtComputer2"-->
                                <!--        required="required">-->
                                <!--    <span class="Txtspan">-->
                                <!--        Computer 2 # </span>-->
                                <!--</div>-->
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
                                    <!--<input type="text" class=" " id="TxtVendorCodeText" required="required">-->
                                    <input type="text" id="TxtVendorCodeText" readonly required="required">

                                     <span class="Txtspan position-absolute bg-white px-1" style="top: -10px; left: 12px; font-size: 12px; color: green;">
                                    Vendor Code
                                    </span>
                                    <!--<span class="Txtspan">-->
                                    <!--    Vendor Code-->
                                    <!--</span>-->
                                </div>
                                <div class="inputbox col-sm-6 ml-1">
                                    <!--<select name="CmbVenderName" id="CmbVenderName">-->
                                    <!--    <option value="0"></option>-->
                                    <!--    @foreach ($VenderSetup as $VenderSetupitem)-->
                                    <!--        <option value="{{ $VenderSetupitem->VenderCode }}">-->
                                    <!--            {{ $VenderSetupitem->VenderName }}-->
                                    <!--        </option>-->
                                    <!--    @endforeach-->
                                    <!--</select>-->
                                    <!--<span class="Txtspan">-->
                                         <select name="CmbVenderName" id="CmbVenderName">
        <option value="0" data-code="">Select Vendor</option>
        @foreach ($VenderSetup as $VenderSetupitem)
            <option value="{{ $VenderSetupitem->VenderCode }}" data-code="{{ $VenderSetupitem->VenderCode }}">
                {{ $VenderSetupitem->VenderName }}
            </option>
        @endforeach
    </select>
                                     <span class="Txtspan position-absolute bg-white px-1" style="top: -10px; left: 12px; font-size: 12px; color: green;">
                                        Vendor Name
                                    </span>
                                </div>


                            </div>


                            <div class="row py-2">




                                <div class="inputbox col-sm-8 ml-2">
                                    <select  name="CmbDepartment"  style="color: black;" id="CmbDepartment">
                                        <option value="0"></option>

                                        @foreach ($Department as $Departmentitem)
                                            <option value="{{ $Departmentitem->TypeCode }}">{{ $Departmentitem->TypeName }}
                                            </option>
                                        @endforeach
                                    </select>
                                     <span class="Txtspan position-absolute bg-white px-1" style="top: -10px; left: 12px; font-size: 12px; color: green;">
                                       Department
                                     </span>
                                    <!--<span class="Txtspan">-->
                                    <!--    Department-->
                                    <!--</span>-->
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
                                    <span class="Txtspan position-absolute bg-white px-1" style="top: -10px; left: 12px; font-size: 12px; color: green;">
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
                                     <button class="btn btn-primary mx-2" id="CmdNew" role="button" onclick="location.reload();">
    <i class="fa fa-plus mr-1" aria-hidden="true"></i>New
</button>

                               

                                <button class="btn btn-dark mx-2" id="CmdExport" role="button"> <i
                                        class="fa fa-file-excel mr-1" aria-hidden="true"></i>Export</button>

                                <button class="btn btn-dark mx-2" id="CmdImport" role="button"> <i
                                        class="fa fa-sign-in mr-1" aria-hidden="true"></i>Import</button>

                                <button class="btn btn-primary mx-2" id="CmdReport" role="button"> <i
                                        class="fa fa-file-text mr-1" aria-hidden="true"></i>Report</button>

                                <button class="btn btn-warning mx-2" id="CmdDelete" role="button"> <i
                                        class="fa fa-trash mr-1" aria-hidden="true"></i>Delete</button>
                                        <button class="btn btn-danger mx-2" id="CmdExit" role="button" onclick="window.location.href='{{ route('Vendor_Contract_Provision') }}'">
    <i class="fa fa-door-open mr-1" aria-hidden="true"></i>Exit
</button>


                                <!--<button class="btn btn-danger mx-2" id="CmdExit" role="button"> <i-->
                                <!--        class="fa fa-door-open mr-1" aria-hidden="true"></i>Exit</button>-->

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
                                    @php
                                    $unique = [];
                                     $filtered = [];
                                 
                                     foreach ($qrymaster as $qry) {
                                         $key = $qry->ComputerNo . '_' . $qry->VendorName . '_' . $qry                                 ->ExpiryDate . '_' . $qry->GodownName;
                                        if (!in_array($key, $unique)) {
                                             $unique[] = $key;
                                             $filtered[] = $qry;
                                         }
                                     }
                                    @endphp
                                      <tbody id="DG2body">
                                       @foreach ($filtered as $qry)
                                        <tr data-computerno="{{ $qry->ComputerNo }}" data-branchcode="{{ $qry->BranchCode ?? 8 }}">

                                               <td>{{ $qry->ComputerNo }}</td>
                                               <td>{{ $qry->VendorName }}</td>
                                               <td>{{ $qry->ExpiryDate }}</td>
                                               <td>{{ $qry->GodownName }}</td>
                                           </tr>
                                       @endforeach
                                   </tbody>

                                   <!-- <tbody id="DG2body">-->
                                   <!--       @foreach ($filtered as $qry)-->
                                   <!-- <tr>-->
                                   <!--    <td>{{ $qry->ComputerNo }}</td>-->
                                   <!--    <td>{{ $qry->VendorName }}</td>-->
                                   <!--    <td>{{ $qry->ExpiryDate }}</td>-->
                                   <!--    <td>{{ $qry->GodownName }}</td>-->
                                   <!--</tr>-->
                                   <!--     @endforeach-->

                                   <!-- </tbody>-->
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
                        <table class="table table-bordered table-hover" id="DG1" >
                              <thead class="bg-info text-center">
                                    <!--<tr>-->
                                    <!--   <th>Item Code</th>-->
                                    <!--   <th>Item Name</th>-->
                                    <!--   <th>Item Name Vendor</th>-->
                                    <!--   <th>UOM</th>-->
                                    <!--   <th>IMPA Code</th>-->
                                    <!--   <th>Vendor Price</th>-->
                                    <!--   <th>Last Date</th>-->
                                    <!--   <th>User</th>-->
                                    <!--   <th>V Part Code</th>-->
                                    <!--   <th>Remarks</th>-->

                                    <!--</tr>-->
                                    

        <tr>
         
            <th>Item Code</th>
            <th>Item Name</th>
            <th>Item Name Vendor</th>
            <th>UOM</th>
            <th>IMPA Code</th>
            <th>Vendor Price</th>
            <th>Last Date</th>
            <th>User</th>
            <th>V Part Code</th>
            <th>Remarks</th>
        </tr>


</thead>


                             


                            <tbody id="DG1body">

                            </tbody>

                        </table>

                    </div>







                </div>
                <div class="row py-2">
                <button class="btn btn-success  mx-2" id="AddRowBtn" role="button"> <i
                    class="fa fa-plus mr-1" aria-hidden="true"></i>Add Row</button>

<button class="btn btn-danger mx-2" id="DeleteRowBtn" role="button">
    <i class="fa fa-trash mr-1" aria-hidden="true"></i>Delete Row
</button>

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
            TxtComputerNo: TxtComputerNo
        },
        beforeSend: function () {
            $('.overlay').show();
        },
        success: function (response) {
            console.log(response);

            if (response.error) {
                alert(response.error);
                return;
            }

            var Master = response.Master;
            var Details = response.Details;

            if (Master) {
                $('#TxtWorkUser').val(Master.WorkUser || '');

                if (Master.EntryDate) {
                    var odate = new Date(Master.EntryDate);
                    const EntryDate = odate.toISOString().substring(0, 10);
                    $('#TxtDate').val(EntryDate);
                }
            }
             let table = $('#DG1').DataTable();
table.clear(); // Clear existing DataTable rows

if (Details.length > 0) {
    const first = Details[0];
    $('#TxtVenderCode').val(first.VenderCode || '');
    $('#TxtVendorCodeText').val(first.VendorCusCode || '');
    $('#TxtExpiryDate').val(first.ExpiryDate || '');
    $('#TxtGodownCode').val(first.GodownCode || '');
    $('#TxtDepartmentCode').val(first.DepartmentCode || '');

    Details.forEach(function (item) {
        let formattedDate = item.LastDate ? new Date(item.LastDate).toISOString().substring(0, 10) : '';

        table.row.add([
           
            item.ItemCode || '',
            item.ItemName || '',
            '', // Optional blank column (e.g., Item Name Vendor)
            item.UOM || '',
            item.IMPAItemCode || '',
            item.VendorPrice || '',
            formattedDate,
            item.WorkUser || '',
            item.VPartCode || '',
            item.Remarks || ''
        ]);
    });

    table.draw();
    $('#LblTotal').val(Details.length);
} else {
    $('#CmbDepartment').val(0);
    table.draw();
}

   
        },
        complete: function () {
            $('.overlay').hide();
        },
        error: function (xhr) {
            alert('Server Error: ' + xhr.responseText);
        }
    });
}
        function updateDG2Table(data) {
    const table = document.getElementById('DG2body');
    table.innerHTML = ''; // Clear old rows

    const seen = new Set();
    const uniqueData = data.filter(item => {
        const key = `${item.ComputerNo}_${item.VendorCode}_${item.ExpiryDate}_${item.GodownName}`;
        if (seen.has(key)) return false;
        seen.add(key);
        return true;
    });

    uniqueData.forEach(item => {
        const row = table.insertRow();
        const expDate = new Date(item.ExpiryDate);

        // Highlight expired
        if (expDate < new Date()) {
            row.style.backgroundColor = 'red';
        }

        row.insertCell().innerText = item.ComputerNo || '';
        row.insertCell().innerText = item.VendorCode || '';
        row.insertCell().innerText = item.ExpiryDate || '';
        row.insertCell().innerText = item.GodownName || '';
    });
}
  



         
      
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
              NewComputer();
       
            $('#CmdNew').click(function (e) {
                e.preventDefault();
                NewComputer();
            });
            


      
            var table1 = $('#DG2').DataTable({
                     scrollY: 580,
                     deferRender: true,
                     scroller: {
                         loadingIndicator: true
                     },
                     paging: false,
                     info: false,
                     ordering: false,
                     searching: true,
                     responsive: true
                 });


            

            var odate = new Date();
            const today = odate.toISOString().substring(0, 10);
            $('#TxtDate').val(today);
            $('#TxtExpiryDate').val(today);




const dataTable = $('#DG1').DataTable({
    paging: true,
    responsive: true
});







let rowAdded = false;

$('#AddRowBtn').click(function () {
        $(this).prop('disabled', true);
    if (rowAdded) return; 

    let table = $('#DG1').DataTable();

    let newRow = table.row.add([
        `<input class="form-control" placeholder="Item Code">`,
        `<input class="form-control" placeholder="Item Name">`,
        `<input class="form-control" placeholder="Item Name Vendor">`,
        `<input class="form-control" placeholder="UOM">`,
        `<input class="form-control" placeholder="IMPA Code">`,
        `<input class="form-control" placeholder="Vendor Price">`,
        `<input class="form-control" type="date" placeholder="Last Date">`,
        `<input class="form-control" placeholder="User">`,
        `<input class="form-control" placeholder="V Part Code">`,
        `<input class="form-control" placeholder="Remarks">`
    ]).draw(false).node();

    $(newRow).find('td:eq(0) input').focus();

    rowAdded = true; // prevent repeat
});









$('#BtnFill').click(function (e) {
    e.preventDefault();

    var TxtDate = $('#TxtDate').val();
    var TxtExpiryDate = $('#TxtExpiryDate').val();
    var TxtComputerNo = $('#TxtComputerNo').val();
    var TxtVenderCode = $('#CmbVenderName').val();
    var CmbVenderName = $('#CmbVenderName option:selected').text();
    var TxtGodownCode = $('#CmbGodownName').val();
    var CmbGodownName = $('#CmbGodownName option:selected').text();
    var TxtDepartmentCode = $('#CmbDepartment').val();
    var CmbDepartment = $('#CmbDepartment option:selected').text();

    if (TxtComputerNo === '') {
        NewComputer();
        return;
    }
    if (TxtVenderCode == 0) {
        alert('Vendor Not Found. Please select vendor.');
        $('#CmbVenderName').focus();
        return;
    }
    if (TxtGodownCode == 0) {
        alert('Warehouse Not Found. Please select location.');
        $('#CmbGodownName').focus();
        return;
    }
    if (TxtDepartmentCode == 0) {
        alert('Department Not Found. Please select department.');
        $('#CmbDepartment').focus();
        return;
    }

    const rows = dataTable.rows({ search: 'applied' }).nodes();
    const dataArray = [];
    let hasError = false;

    for (let i = 0; i < rows.length; i++) {
        const cells = rows[i].cells;

        function cellValue(index) {
            const input = cells[index]?.querySelector('input');
            return input ? input.value.trim() : (cells[index]?.innerText.trim() || '');
        }

        const ItemCode = cellValue(0);
        const ItemName = cellValue(1);
        const ProductNameVendor = cellValue(2);
        const UOM = cellValue(3);
        const IMPACode = cellValue(4);
        const VendorPrice = cellValue(5);
        const LastDate = cellValue(6);
        const User = cellValue(7);
        const VPartNumber = cellValue(8);
        const Remarks = cellValue(9);

        const requiredFields = [ItemCode, ItemName];
        const requiredIndexes = [0, 1];

        for (let k = 0; k < requiredFields.length; k++) {
            if (!requiredFields[k]) {
                const colIndex = requiredIndexes[k];
                const cell = cells[colIndex];

                const pageSize = dataTable.page.info().length;
                const targetPage = Math.floor(i / pageSize);
                dataTable.page(targetPage).draw(false);

                setTimeout(() => {
                    let inputField = cell.querySelector('input');
                    if (!inputField) {
                        cell.innerHTML = `<input class="form-control border border-danger shadow-sm" value="">`;
                        inputField = cell.querySelector('input');
                    }
                    inputField.classList.add('border', 'border-danger', 'shadow-sm');
                    inputField.focus();
                }, 100);

                alert(`Row ${i + 1} column is missing required data. Please fill it.`);
                hasError = true;
                break;
            }
        }

        if (hasError) break;

        dataArray.push({
            ItemCode,
            ItemName,
            ProductNameVendor,
            UOM,
            IMPACode,
            VendorPrice,
            LastDate,
            User,
            VPartNumber,
            Remarks,
        });
    }

    if (hasError) return;

    ajaxSetup();

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
        beforeSend: function () {
            $('.overlay').show();
        },
        success: function (response) {
            console.log(response);

            if (response.Message === 'Deck\\Engine Contract Cannot Save On this Form') {
                alert(response.Message);
                return;
            }

            if (response.Message === 'Saved') {
                Swal.fire('Saved!', 'Contract saved successfully', 'success');

                // ✅ Update only vendor-level DG2 table
                if (response.table && response.table.length > 0) {
                    let seen = new Set();
                    let filtered = response.table.filter(item => {
                        const key = `${item.ComputerNo}_${item.VendorName}_${item.ExpiryDate}_${item.GodownName}`;
                        if (seen.has(key)) return false;
                        seen.add(key);
                        return true;
                    });

                    let table = document.getElementById('DG2body');
                    table.innerHTML = ''; // Clear old rows

                    filtered.forEach(item => {
                        let row = table.insertRow();
                        if (new Date(item.ExpiryDate) < new Date()) {
                            row.style.backgroundColor = 'red';
                        }
                        row.setAttribute('data-computerno', item.ComputerNo);
                        row.setAttribute('data-branchcode', item.BranchCode || 8);

                        row.insertCell().innerText = item.ComputerNo || '';
                        row.insertCell().innerText = item.VendorName || '';
                        row.insertCell().innerText = item.ExpiryDate || '';
                        row.insertCell().innerText = item.GodownName || '';
                    });
                }
            }
        },
        complete: function () {
            $('.overlay').hide();
        },
        error: function (xhr) {
            alert('Error while saving: ' + xhr.responseText);
        }
    });
});





// $('#BtnFill').click(function (e) {
//     e.preventDefault();

//     var TxtDate = $('#TxtDate').val();
//     var TxtExpiryDate = $('#TxtExpiryDate').val();
//     var TxtComputerNo = $('#TxtComputerNo').val();
//     var TxtVenderCode = $('#CmbVenderName').val();
//     var CmbVenderName = $('#CmbVenderName option:selected').text();
//     var TxtGodownCode = $('#CmbGodownName').val();
//     var CmbGodownName = $('#CmbGodownName option:selected').text();
//     var TxtDepartmentCode = $('#CmbDepartment').val();
//     var CmbDepartment = $('#CmbDepartment option:selected').text();

//     if (TxtComputerNo === '') {
//         NewComputer();
//         return;
//     }
//     if (TxtVenderCode == 0) {
//         alert('Vendor Not Found. Please select vendor.');
//         $('#CmbVenderName').focus();
//         return;
//     }
//     if (TxtGodownCode == 0) {
//         alert('Warehouse Not Found. Please select location.');
//         $('#CmbGodownName').focus();
//         return;
//     }
//     if (TxtDepartmentCode == 0) {
//         alert('Department Not Found. Please select department.');
//         $('#CmbDepartment').focus();
//         return;
//     }

//     const rows = dataTable.rows({ search: 'applied' }).nodes();
//     const dataArray = [];
//     let hasError = false;

//     for (let i = 0; i < rows.length; i++) {
//         const cells = rows[i].cells;

//         function cellValue(index) {
//             const input = cells[index]?.querySelector('input');
//             return input ? input.value.trim() : (cells[index]?.innerText.trim() || '');
//         }

//         const ItemCode = cellValue(0);
//         const ItemName = cellValue(1);
//         const ProductNameVendor = cellValue(2);
//         const UOM = cellValue(3);
//         const IMPACode = cellValue(4);
//         const VendorPrice = cellValue(5);
//         const LastDate = cellValue(6);
//         const User = cellValue(7);
//         const VPartNumber = cellValue(8);
//         const Remarks = cellValue(9);
        
        
        
//         const requiredFields = [ItemCode, ItemName];
//              const requiredIndexes = [0, 1];

//         // const requiredFields = [ItemCode, ItemName, UOM, VendorPrice, IMPACode];
//         // const requiredIndexes = [0, 1, 3, 5, 4];

//         for (let k = 0; k < requiredFields.length; k++) {
//             if (!requiredFields[k]) {
//                 const colIndex = requiredIndexes[k];
//                 const cell = cells[colIndex];
//                 const input = cell.querySelector('input');

//                 // Switch to the correct page if needed
//                 const pageSize = dataTable.page.info().length;
//                 const targetPage = Math.floor(i / pageSize);
//                 dataTable.page(targetPage).draw(false);

//                 setTimeout(() => {
//                     let inputField = cell.querySelector('input');
//                     if (!inputField) {
//                         cell.innerHTML = `<input class="form-control border border-danger shadow-sm" value="">`;
//                         inputField = cell.querySelector('input');
//                     }
//                     inputField.classList.add('border', 'border-danger', 'shadow-sm');
//                     inputField.focus();
//                 }, 100);

//                 alert(`Row ${i + 1} column is missing required data. Please fill it.`);
//                 hasError = true;
//                 break;
//             }
//         }

//         if (hasError) break;

//         dataArray.push({
            
//             ItemCode,
//             ItemName,
//             ProductNameVendor,
//             UOM,
//             IMPACode,
//             VendorPrice,
//             LastDate,
//             User,
//             VPartNumber,
//             Remarks,
//         });
//     }

//     if (hasError) return;

//     ajaxSetup();

//     $.ajax({
//         url: '{{ route('VendorContracSave') }}',
//         type: 'POST',
//         data: {
//             TxtDate,
//             TxtExpiryDate,
//             CmbDepartment,
//             CmbGodownName,
//             CmbVenderName,
//             TxtComputerNo,
//             TxtVenderCode,
//             TxtGodownCode,
//             TxtDepartmentCode,
//             dataArray,
//         },
//         beforeSend: function () {
//             $('.overlay').show();
//         },
//         success: function (response) {
//             console.log(response);

//             if (response.Message === 'Deck\\Engine Contract Cannot Save On this Form') {
//                 alert(response.Message);
//                 return;
//             }

//           if (response.Message === 'Saved') {
//     let computerNo = $('#TxtComputerNo').val();

//     $.ajax({
//         url: '/GetDataVenContract',
//         type: 'POST',
//         data: { TxtComputerNo: computerNo },
//         success: function (res) {
//             if (res.Details && res.Details.length > 0) {
//                 let table = $('#DG2').DataTable();
//                 table.clear();

//                 res.Details.forEach(function (item) {
//                     table.row.add([
//                         item.ItemCode,
//                         item.ItemName,
//                         item.UOM,
//                         item.VendorPrice,
//                         item.Currency,
//                         item.LastDate
//                     ]);
//                 });

//                 table.draw();
//             } else {
//                 console.warn('No details returned for DG2');
//             }
//         }
//     });
// }

//         //     if (response.Message === 'Saved') {
//         //         alert('Contract Saved Successfully');
               
//         // updateDG2Table(response.table);

//         //         const seen = new Set();
//         //         const uniqueData = response.table.filter(item => {
//         //             const key = `${item.ComputerNo}_${item.VendorCode}_${item.ExpiryDate}_${item.GodownName}`;
//         //             if (seen.has(key)) return false;
//         //             seen.add(key);
//         //             return true;
//         //         });

//         //         let table = document.getElementById('DG2body');
//         //         table.innerHTML = '';

//         //         uniqueData.forEach(item => {
//         //             let row = table.insertRow();
//         //             if (new Date(item.ExpiryDate) < new Date()) {
//         //                 row.style.backgroundColor = 'red';
//         //             }
//         //             row.insertCell().innerText = item.ComputerNo || '';
//         //             row.insertCell().innerText = item.VendorCode || '';
//         //             row.insertCell().innerText = item.ExpiryDate || '';
//         //             row.insertCell().innerText = item.GodownName || '';
//         //         });
//         //     }
//         },
//         complete: function () {
//             $('.overlay').hide();
//         },
//         error: function (xhr) {
//             alert('Error while saving: ' + xhr.responseText);
//         }
//     });
// });

  
  
  
  
  
     $('#DG1 tbody').on('click', 'tr', function () {
        $(this).toggleClass('selected');
    });



           $('#CmbVenderName').on('change', function() {
    var selectedCode = $(this).find(':selected').data('code');
    $('#TxtVendorCodeText').val(selectedCode || '');
});


            $('#TxtComputerNo').blur(function (e) {
                e.preventDefault();
                DataGet();
            });


                  $('#CmdReport').click(function (e) {
                    e.preventDefault();
                var PortCode = $('#CmbGodownName').val();
                var VenderCode = $('#CmbVenderName').val();

                window.location ='VendorProductListprint?VenderCode='+VenderCode+'&PortCode='+PortCode+'';
                });


            $('#CmdImport').click(function (e) {
                e.preventDefault();
                $('#importModal').modal('show');
            });
 
 
       
 

// Ã°Å¸Å¸Â¡ Import Handler: Fill form + DataTable
$('#importForm').submit(function (e) {
    e.preventDefault();
    let formData = new FormData(this);
    $.ajax({
        url: '{{ route("importVendorContract") }}',
        method: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function (res) {
            // Fill form fields from first row (optional)
            let first = res.data[0];
            $('#TxtComputerNo').val(res.computerNo);
            $('#TxtDate').val(res.entryDate);
            $('#TxtExpiryDate').val(res.expiryDate);
            $('#CmbVenderName').val(res.vendorName);
            $('#TxtVenderCode').val(res.vendorCode);
            $('#TxtVendorCodeText').val(res.vendorCodeText);
            $('#CmbDepartment').val(res.department);
            $('#TxtDepartmentCode').val(res.departmentCode);
            $('#CmbGodownName').val(res.godown);
            $('#TxtGodownCode').val(res.godownCode);

            // Fill DataTable
            let table = $('#DG1').DataTable();
            table.clear();
            res.data.forEach(row => {
                table.row.add([
           
                    row.ItemCode, row.ItemName, row.UOM, row.VendorPrice,
                    row.LastDate, row.IMPACode, row.VPartNumber, row.Remarks
                ]);
            });
            table.draw();
        }
    });
});


$('#vendorContractForm').submit(function (e) {
    e.preventDefault();

    let dataArray = [];
    $('#DG1 tbody tr').each(function () {
        let row = $(this).find('td').map(function () {
            return $(this).text();
        }).get();

        dataArray.push({
            ItemCode: row[0],
            ItemName: row[1],
            UOM: row[2],
            VendorPrice: row[3],
            LastDate: row[4],
            IMPACode: row[5],
            VPartNumber: row[6],
            Remarks: row[7]
        });
    });

    let formData = {
        _token: '{{ csrf_token() }}',
        TxtComputerNo: $('#TxtComputerNo').val(),
        TxtDate: $('#TxtDate').val(),
        TxtExpiryDate: $('#TxtExpiryDate').val(),
        CmbVenderName: $('#CmbVenderName').val(),
        TxtVenderCode: $('#TxtVenderCode').val(),
        TxtVendorCodeText: $('#TxtVendorCodeText').val(),
        CmbDepartment: $('#CmbDepartment').val(),
        TxtDepartmentCode: $('#TxtDepartmentCode').val(),
        CmbGodownName: $('#CmbGodownName').val(),
        TxtGodownCode: $('#TxtGodownCode').val(),
        dataArray: dataArray
    };

    $.post('{{ route("VendorContracSave") }}', formData, function (res) {
        if (res.Message === 'Saved') {
            alert('Contract Saved Successfully');
        } else {
            alert(res.Message);
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
            
            


        let itemtable; // Global DataTable reference

$('#btninsertthis').click(function (e) {
    e.preventDefault();

    let table = document.getElementById('importitembody');
    let rows = table.rows;
    let dataarray = [];

    for (let i = 0; i < rows.length; i++) {
        let cells = rows[i].cells;

        dataarray.push({
            ItemCode: cells[0]?.innerText.trim() || '',
            ItemName: cells[1]?.innerText.trim() || '',
            UOM: cells[2]?.innerText.trim() || '',
            QTY: cells[3]?.innerText.trim() || '',
            Price: cells[4]?.innerText.trim() || '',
            percentage: cells[5]?.innerText.trim() || '',
            ItemCodeFinal: cells[6]?.innerText.trim() || '',
            ItemNameFinal: cells[7]?.innerText.trim() || '',
            UOMFinal: cells[8]?.innerText.trim() || '',
            FinalPrice: cells[9]?.innerText.trim() || '',
            Vendor: cells[10]?.innerText.trim() || '',
            Vendorcode: cells[11]?.innerText.trim() || '',
            LastDate: '',
            WorkUser: '',
            Vpart: '',
            Remarks: ''
        });
    }

    // ðŸ”„ Ajax call to save
    $.ajax({
        url: '{{ route("saveImportedItems") }}',
        method: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            items: dataarray
        },
        success: function (response) {
            if (response.status === 'success') {
                alert('Items saved successfully!');

                // âœ… STEP 1: Destroy existing DataTable (if any)
                if ($.fn.DataTable.isDataTable('#DG1')) {
                    $('#DG1').DataTable().clear().destroy();
                }

                // âœ… STEP 2: Set dynamic <thead> using keys from first row
                let headers = ['Select', ...Object.keys(dataarray[0])];

                      let theadHtml = '<tr>';
                      headers.forEach(key => {
                       theadHtml += `<th>${key}</th>`;
                   });
                   theadHtml += '</tr>';
                   $('#DG1 thead').html(theadHtml);

            

                // âœ… STEP 3: Reinitialize DataTable
                itemtable = $('#DG1').DataTable();

                // âœ… STEP 4: Populate rows
           dataarray.forEach(item => {
    let row = [`<input type="checkbox" class="row-select" />`]; // Select column first
    Object.keys(item).forEach(key => {
        row.push(item[key] ?? '');
    });
    itemtable.row.add(row);
});


                itemtable.draw();

        
                $('#impmod').hide();
            } else {
                alert('Failed to save items.');
            }
        },
        error: function (xhr) {
            alert('Error: ' + xhr.responseText);
        }
    });
});

         
        


         
// Delete Row In IMPort
$('#DeleteRowBtn').click(function () {
    const table = $('#DG1').DataTable();
    table.row('.selected').remove().draw(false);
});


     });
        
    
 function populateTable() {
  $.ajax({
    url: "{{ route('vendor.product.list') }}", // Laravel route for fetching data
    method: 'GET',
    success: function (response) {
      // 1. DataTable initialize ya reference lo
      let table = $('#DG1').DataTable();

      // 2. Table ko clear karo
     table.clear();
response.data.forEach(function (item) {
table.row.add([
    `<input type="checkbox" class="row-select" />`,    // 1: Select
    item.ItemCode || '',
    item.ItemName || '',
    item.UOM || '',
    item.QTY || '',
    item.Price || '',
    item.percentage || '',
    item.ItemCodeFinal || '',
    item.ItemNameFinal || '',
    item.UOMFinal || '',
    item.FinalPrice || '',
    item.Vendor || '',
    item.Vendorcode || '',
    item.LastDate || '',
    item.WorkUser || '',
    item.VPart || '',
    item.Remarks || ''
]);

});
table.draw();
table.page('first').draw('page'); 


     
      table.draw();
    },
    error: function (err) {
      console.error('AJAX Error:', err);
      alert('Data load failed!');
    }
  });
}
$(document).ready(function () {
    let selectedDG2Row = null;

    // Select row logic
    $('#DG2body').on('click', 'tr', function () {
        $('#DG2body tr').removeClass('table-danger');
        $(this).addClass('table-danger');

        selectedDG2Row = {
            ComputerNo: $(this).data('computerno'),
            BranchCode: $(this).data('branchcode')
        };
    });

    // From DG2 Delete button click
    $('#CmdDelete').click(function () {
        if (!selectedDG2Row) {
            Swal.fire('Please select a row to delete.', '', 'warning');
            return;
        }

        Swal.fire({
            title: 'Authenticate to Delete',
            input: 'password',
            inputLabel: 'Enter Admin Password',
            inputPlaceholder: '••••••',
            inputAttributes: {
                autocapitalize: 'off',
                autocorrect: 'off'
            },
            showCancelButton: true,
            confirmButtonText: 'Delete',
            showLoaderOnConfirm: true,
            preConfirm: (password) => {
                return $.ajax({
                    url: '{{ route("vendor.contract.master.delete") }}',
                    method: 'POST',
                    data: {
                        ComputerNo: selectedDG2Row.ComputerNo,
                        BranchCode: selectedDG2Row.BranchCode,
                        password: password,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    }
                }).then(response => {
                    if (response.status === 'success') {
                        return response;
                    } else {
                        throw new Error(response.message || 'Delete failed');
                    }
                }).catch(error => {
                    Swal.showValidationMessage(error.message);
                });
            },
            allowOutsideClick: () => !Swal.isLoading()
        }).then((result) => {
            if (result.isConfirmed) {
                // Remove the row from the table
                $('#DG2body tr.table-danger').remove();
                selectedDG2Row = null;

                Swal.fire('Deleted!', 'Row deleted from database.', 'success');
            }
        });
    });
});




    </script>




@stop


@section('content')
