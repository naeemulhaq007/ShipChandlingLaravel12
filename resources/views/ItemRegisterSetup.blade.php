@extends('layouts.app')



@section('title', 'Item-Registration')

@section('content_header')

@stop

@section('content')
    </div>

    <div id="alert-container">

    </div>

    @php
        $selectedDepartment = request()->get('DepartmentName');
        $DepartmentCode = request()->get('DepartmentCode');

    @endphp





    <div class="col-lg-12  row">


        <div class="col-md-6 mt-3 contaniner">
            <div class="card">
                <div class="card-header">
                    <div class="card-tools ">


                        <button type="button" name="headertoggle" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                    <h5 class="card-title">Item Registration</h5>



                </div>
                <div class="card-body">


                    <div class="row ">

                        <div class="inputbox col-8 py-2 col-sm-4">
                            <input type="text" class="" id="Itemcode" required="required">
                            <span class="Txtspan">
                                Item Code
                            </span>
                        </div>

                        <a name="" id="" class="btn btn-primary my-2 col-sm-1 col-3" href="#" role="button"><i
                                class="fa fa-search" aria-hidden="true"></i></a>

                        <div class="inputbox col-sm-4 py-2">
                            <input type="date" class="" id="Dateq" name="Date" required="required">
                            <span class="Txtspan">
                                Date
                            </span>
                        </div>

                        <div class="inputbox col-sm-3 py-2">
                            <input type="text" class="" name="IMPACode" id="IMPACode" required="required">
                            <span class="Txtspan">
                                IMPA Code
                            </span>
                        </div>

                    </div>
                    <div class="row ">

                        <div class="inputbox col-sm-12 py-2">
                            <input type="text" class="" name="ItemName" id="ItemitemName" required="required">
                            <span class="Txtspan">
                                Item Name
                            </span>
                        </div>


                    </div>
                    <div class="row ">

                        <div class="inputbox col-sm-12 py-2">
                            <span class="Txtspan">
                                Department
                            </span>
                            <select name="Department" id="Departmentselect" required="required">


                                <option value=""></option>
                                @foreach ($Department as $Ditem)
                                    <option value="{{ $Ditem->TypeCode }}">{{ $Ditem->TypeName }}</option>
                                @endforeach
                            </select>

                        </div>

                    </div>
                    <div class="row">

                        <div class="inputbox col-sm-6 py-2">

                            <span class="Txtspan">
                                UOM
                            </span>
                            <select required name="UOM" id="uoms">
                                <option></option>

                                @foreach ($UOM as $uitem)
                                    <option value="{{ $uitem->UOMName }}">{{ $uitem->UOMName }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="inputbox col-sm-6 py-2">
                            <input class="" type="text" name="SalePrice" id="SalePrice" required>


                            <span class="Txtspan">
                                Sale Price
                            </span>
                        </div>




                    </div>

                    <div class="row">

                        <div class="inputbox col-sm-6 py-2">
                            <input class="" type="text" name="Currency" id="Currency" required>


                            <span class="Txtspan">
                                Currency
                            </span>
                        </div>
                        <div class="inputbox col-sm-6 py-2">
                            <input class="" type="text" name="ReorderLevel" id="ReorderLevel" required>


                            <span class="Txtspan">
                                Recorder Level
                            </span>
                        </div>

                    </div>
                    <div class="row">


                        <div class="inputbox col-sm-6 py-2">
                            <span class="Txtspan">
                                Category
                            </span>
                            <select name="Category" id="Category">
                                <option value="" id="Category" selected>Select one</option>
                                @foreach ($Category as $Citem)
                                    <option value="{{ $Citem->CategoryCode }}">{{ $Citem->CategoryName }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="inputbox col-sm-6 py-2">
                            <span class="Txtspan">
                                Warehouse
                            </span>
                            <select name="godown" id="godown">
                                <option value="" id="Category" selected>Select one</option>
                                @foreach ($warehouse as $warehouses)
                                    <option value="{{ $warehouses->GodownCode }}">{{ $warehouses->GodownName }}</option>
                                @endforeach
                            </select>
                        </div>


                    </div>

                    <div class="row">

                        <div class="inputbox col-sm-12 py-2">
                            <span class="Txtspan">
                                Brand
                            </span>
                            <select name="OrignCode" id="OrignCode">
                                <option selected value="">Select one</option>
                                @foreach ($origin as $item)
                                    <option value="{{ $item->OriginCode }}">{{ $item->OriginName }}</option>
                                @endforeach
                            </select>

                        </div>



                    </div>
                    <div class="row">

                        <div class="inputbox col-sm-6 py-2">
                            <span class="Txtspan">
                                Sub Category
                            </span>
                            <select name="SubCategory" id="SubCategory">
                                <option selected value="" id="Orign">Select one</option>
                                <option value=""></option>
                                @foreach ($origin as $item)
                                    <option value="{{ $item->OriginName }}">{{ $item->OriginName }}</option>
                                @endforeach
                            </select>

                        </div>



                        <div class="inputbox col-sm-6 py-2">
                            <span class="Txtspan">
                                Recorder Qty
                            </span>
                            <input class="" type="text" name="ReorderQty" id="ReorderQty" required>


                        </div>

                    </div>


                    <button name="SaveItem" id="SaveItem" class="btn btn-default col-sm-2 my-2" role="button"><i
                            class="fa fa-file-archive text-success" aria-hidden="true"></i> Save</button>
                    <a name="delete" id="delete" class="btn btn-default col-sm-2 my-2" role="button"><i
                            class="fa fa-file-code text-danger" aria-hidden="true"></i> Delete</a>
                    <button name="New"
                     id="NewItem"
                    {{-- onclick="location.reload();" --}}
                        class="btn btn-default col-sm-2 my-2" role="button"><i class="fa fa-file-image text-info"
                            aria-hidden="true"></i> New</button>
                    <a name="" id="" class="btn btn-default col-sm-2 my-2" href="/" role="button"><i
                            class="fa fa-arrow-right text-warning" aria-hidden="true"></i> Exit</a>
                    <button class="btn btn-default  col-sm-2 my-2" id="addRow">Add Ven Row</button>



                    <table class="table  table-inverse table-resposnive mt-3 small" id="Vendotable">
                        <thead class="bg-info">
                            <tr>
                                <th>ID</th>
                                <th style="padding-left: 50px; padding-right: 50px;">VenderName</th>
                                <th>UOM</th>
                                <th>Type</th>
                                <th>Price</th>
                                <th style="padding-left: 20px; padding-right: 20px;">LastDate</th>
                                <th>WorkUser</th>
                            </tr>
                        </thead>
                        <tbody id="verndores" class="hight">
                            <tr>
                                <td ></td>
                                <td><select class="custom-select" name="Vendor" id="Vendor">
                                        <option readonly value="">Select One</option>
                                        @foreach ($vendors as $key => $vendor)
                                            <option value="{{ $vendor->VenderCode }}">{{ $vendor->VenderName }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td><select class="custom-select" name="venuoms" id="venuoms">
                                        @foreach ($UOM as $uitem)
                                            <option value="{{ $uitem->UOMName }}">{{ $uitem->UOMName }}</option>
                                        @endforeach
                                    </select></td>
                                <td contenteditable="true"></td>
                                <td contenteditable="true"></td>
                                <td><input type="date" name="lastdateven" id="lastdateven"
                                        class="form-control lastdateven" value=""></td>
                                <td>{{ $MUserName }}</td>
                            </tr>
                        </tbody>
                    </table>

                </div>

            </div>
        </div>
        <div class="col-md-6 mt-3 container ">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Item Box</h5>


                    <div class="card-tools">
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#importModal">
                            <i class="fas fa-file-import text-success   "></i> Import Data
                        </button>


                    </div>

                </div>
                <div class="card-body">
                    <div class="row pb-2">

                        <div class="inputbox col-sm-12">
                            <input type="text" class="" name="ItemitemNameg" id="ItemitemNameg"
                                required="required">
                            <span class="ml-2">
                                Item Name
                            </span>
                        </div>
                    </div>
                    <div class="rounded shadow mx-auto">
                        <table class="table table-bordered table-resposnive table-inverse " id="itemtable">
                            <thead class="bg-info">
                                <tr>
                                    <th style="width:100px">ItemCode</th>
                                    <th style="width:500px">ItemName</th>
                                    <th>UOM</th>
                                    <th>Dept</th>
                                </tr>
                            </thead>
                            <tbody id="itembody">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-12" id="impmod" style="display: none">
        <div class="row">
            <div class="card col-xl-12">
                <div class="card-header">
                    <h5 class="card-title">Item Imports</h5>
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

    <div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form id="importForm" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="importModalLabel">Import Excel File</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">

                            <div class="form-group col-sm-6">
                                <label for="excel_file">Excel File</label>
                                {{-- <input type="file" name="excel_file" id="excel_file" class="form-control-file"
                                accept=".xls, .xlsx, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"
                                required> --}}
                                <input type="file" name="excel_file" id="excel_file" class="form-control-file"
                                    accept=".xls, .xlsx, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"
                                    required onchange="previewExcelFile(event)">

                            </div>


                        </div>
                        <button type="button" class="btn btn-info" onclick="openInNewWindow()">Open in New
                            Window</button>

                        <div class="row">

                            <div class="form-group mx-1">
                                <label for="start_row">Start Row</label>
                                <input type="number" name="start_row" id="start_row" class="form-control" required>
                            </div>
                            <div class="form-group mx-1">
                                <label for="start_column">Start Column</label>
                                <input type="text" name="start_column" id="start_column" class="form-control"
                                    required>
                            </div>
                            <div class="form-group mx-1">
                                <label for="end_column">End Row</label>
                                <input type="number" name="end_Row" id="end_Row" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group mx-1">
                                <label for="itemCodeColumn">Item Code Column</label>
                                <input type="text" name="itemCodeColumn" id="itemCodeColumn" class="form-control"
                                    required>
                            </div>
                            <div class="form-group mx-1">
                                <label for="itemNameColumn">Item Name Column</label>
                                <input type="text" name="itemNameColumn" id="itemNameColumn" class="form-control"
                                    required>
                            </div>
                            <div class="form-group mx-1">
                                <label for="uomColumn">UOM Column</label>
                                <input type="text" name="uomColumn" id="uomColumn" class="form-control" required>
                            </div>
                            <div class="form-group mx-1">
                                <label for="vendorPriceColumn">Price Column</label>
                                <input type="text" name="vendorPriceColumn" id="vendorPriceColumn"
                                    class="form-control" required>
                            </div>
                            <div class="form-group mx-1">
                                <label for="Impacolumn">Impa</label>
                                <input type="text" name="Impacolumn" id="Impacolumn"
                                    class="form-control" required>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Import</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="excelpreviewmod" tabindex="-1" role="dialog" aria-labelledby="importModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" style="max-width:1850px;" role="document">
            <div class="modal-content">
                <form id="importForm" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="importModalLabel">Preview Excel File</h5>
               <button type="button" class="btn btn-secondary ml-auto" onclick="opload()">Load Excel</button>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="excelContainer"></div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Import</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/handsontable/dist/handsontable.full.min.css">

    <style>
        header {
            width: 100%;
            height: 6vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        header h5 {
            position: absolute;
            width: 70%;
            font-size: 35px;
            font-weight: 600;
            color: transparent;
            background-image: linear-gradient(to right, #553c9a, #ee4b2b, #00c2cb, #ff7f50, #553c9a);
            -webkit-background-clip: text;
            background-clip: text;
            background-size: 200%;
            background-position: -200%;
            transition: all ease-in-out 2s;
            cursor: pointer;
        }

        header h5:hover {
            background-position: 200%;
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
    <script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
    <!-- Add the Handsontable CSS -->

    <!-- Add the Handsontable JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/handsontable/dist/handsontable.full.min.js"></script>

    <script>
        function previewExcelFile(event) {
            // var file = event.target.files[0];
            // var fileReader = new FileReader();

            // fileReader.onload = function(e) {
            //     var data = new Uint8Array(e.target.result);
            //     var workbook = XLSX.read(data, {
            //         type: 'array'
            //     });
            //     var sheetName = workbook.SheetNames[0];
            //     var worksheet = workbook.Sheets[sheetName];

            //     var sheetData = XLSX.utils.sheet_to_json(worksheet, {
            //         header: 1,
            //         raw: true
            //     });

            //     var excelContainer = document.getElementById('excelContainer');
            //     excelContainer.innerHTML = '';

            //     var hot = new Handsontable(excelContainer, {
            //         data: sheetData,
            //         rowHeaders: true,
            //         colHeaders: true,
            //         colWidths: 100,
            //         licenseKey: 'non-commercial-and-evaluation',
            //         // Additional options and configurations as needed
            //     });
            // };

            // fileReader.readAsArrayBuffer(file);
        }


function openInNewWindow() {
    $('#excelpreviewmod').modal('show');

}
function opload() {
    var fileInput = document.getElementById('excel_file');
    // Get the selected file
    var file = fileInput.files[0];
    console.log(file);

    // Create a FormData object
    var formData = new FormData();
    // Append the file to the FormData object
    formData.append('excel_file', file);

    $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
    $.ajax({
        type: "post",
        url: "{{route('importQuataionShow')}}",
        data: formData,
        contentType: false, // Don't set content type (automatically set by FormData)
        processData: false, // Don't process the data (needed for FormData)
        success: function(response) {
            console.log(response);
            // Check if the response has the expected data
            if (response.hasOwnProperty('rowData')) {
                // Create a table
                var table = $('<table>').addClass('table  table-inverse table-bordered');
                    var maxTableHeight = 700; // Set your desired maximum height
                // Create the header row
                var headerRow = $('<tr>');
                headerRow.append($('<th>').text('Row'));

                // Assuming rowData is an array of arrays where each inner array represents a row
                var columns = response.rowData[0].length;
                for (var col = 0; col < columns; col++) {
                    var columnHeader = String.fromCharCode(65 + col); // A, B, C, ...
                    headerRow.append($('<th>').text(columnHeader));
                }
                table.append(headerRow);

                // Add data rows
                $.each(response.rowData, function(rowIdx, rowData) {
                    var dataRow = $('<tr>');
                    dataRow.append($('<td>').text(rowIdx + 1)); // Row number
                    $.each(rowData, function(colIdx, cellValue) {
                        dataRow.append($('<td>').text(cellValue));
                    });
                    table.append(dataRow);
                });
                tableContainer = $('<div>').css({
                    'max-height': maxTableHeight + 'px',
                    'overflow': 'auto'
                }).append(table);

                // Append the table to the "excelContainer" div
                $('#excelContainer').empty().append(tableContainer);
            } else {
                console.error('Invalid response format');
            }

        },
        error: function(error) {
            // Handle the error
            console.error('Error uploading file:', error);
        }
    });


}



        $(document).ready(function() {

            function setdate() {
                var chekdate = new Date();
                const Today = chekdate.toISOString().substring(0, 10);

                $('.lastdateven').val(Today);

            }
            setdate();
            $('#itemtable').DataTable({
                scrollY: 560,
                deferRender: true,
                scroller: true,
                paging: false,
                ordering: false,
                info: false,
                searching: false,


            });
            var table2 = $('#Vendotable').DataTable({

                scrollY: 150,
                deferRender: true,
                scroller: true,
                paging: false,
                info: false,
                ordering: false,
                searching: false,
                responsive: true,


            });
            var table3 = $('#importitemtable').DataTable({

                scrollY: 450,
                deferRender: true,
                scroller: true,
                paging: false,
                info: false,
                ordering: false,
                searching: false,
                responsive: true,


            });

            $('#addRow').click(function(e) {
                addRow();

            });

            function addRow() {
                var table = document.getElementById("verndores");
                var row = table.insertRow(-1);
                var cell1 = row.insertCell(0);
                var cell3 = row.insertCell(1);
                var cell4 = row.insertCell(2);
                var cell5 = row.insertCell(3);
                var cell6 = row.insertCell(4);
                var cell7 = row.insertCell(5);
                var cell8 = row.insertCell(6);
                let vendorOptions = '<option selected> </option>';
                var data = {!! json_encode($vendors) !!};
                // console.log(data);

                var data2 = {!! json_encode($UOM) !!};
                // console.log(data2);
                data.forEach(function(item) {


                    vendorOptions += '<option data-depcode="' + item.VenderCode + '" value="' + item
                        .VenderCode + '">' + item.VenderName + '</option>';
                });

                let venuomsOptions = '<option selected> </option>';

                data2.forEach(function(item2) {
                    venuomsOptions += '<option>' + item2.UOMName + '</option>';


                });
                cell3.innerHTML = '<select class="custom-select" name="Vendor" id="Vendor">' + vendorOptions +
                    '</select>';
                cell4.innerHTML = '<select class="custom-select" name="venuoms" id="venuoms">' + venuomsOptions +
                    '</select>';

                cell5.contentEditable = true;
                cell6.contentEditable = true;
                cell7.innerHTML =
                    '<input type="date" name="lastdateven" id="lastdateven" class="form-control lastdateven" value="" >';
                cell8.innerHTML = '{{ $MUserName }}';


            }





            $('#importForm').submit(function(e) {
                e.preventDefault();
                $('#importModal').modal('hide');

                var formData = new FormData(this);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '{{ route('import-excel') }}',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    beforeSend: function() {
                        $('.overlay').show();
                    },
                    success: function(response) {
                        displayImportedData(response);

                    },
                    complete: function() {
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
                    ItemCodegetCell.classList.add('itemcodetd');

                    ItemCodegetCell.contentEditable = 'true';

                    let ItemNamegetCell = row.insertCell(1);
                    if (item && item.ItemNameget) {
                        let html = `<select class="form-control itemgselect" id="">`;
                        var Itemname = item.ItemNameget;

                        Itemname.forEach(function (itemit) {
                            html += '<option data-percentage="'+itemit.Percentage+'" data-itemcode="'+itemit.ItemCode+'" data-salerate="'+itemit.SaleRate+'" data-uom="'+itemit.UOM+'" value="' + itemit.ItemName + '"> ' + itemit.ItemName + ' </option>';
                        });

                        html += `</select>`;
                        ItemNamegetCell.innerHTML = html;
                    } else {
                        // Handle the case where 'item' or 'item.ItemNameget' is undefined
                        console.error("Error: 'item' or 'item.ItemNameget' is undefined.");
                    }
                    // ItemNamegetCell.contentEditable = 'true';

                    let UOMgetCell = row.insertCell(2);
                    UOMgetCell.innerHTML = item.UOMget;
                    UOMgetCell.contentEditable = 'true';
                    UOMgetCell.classList.add('UOMtd');

                    UOMgetCell.addEventListener('blur', function() {
                        this.textContent = this.textContent.toUpperCase();
                    });


                    let PricegetCell = row.insertCell(3);
                    PricegetCell.innerHTML = parseFloat(item.Priceget).toFixed(2);
                    PricegetCell.classList.add('saleratetd');

                    PricegetCell.style.Align = "right";
                    PricegetCell.contentEditable = 'true';

                    let percentage = row.insertCell(4);
                    percentage.classList.add('Percentagetd');
                    percentage.innerHTML = parseFloat(item.percentage).toFixed(2) + '%';

                    let ItemCodeCell = row.insertCell(5);
                    ItemCodeCell.innerHTML = item.ItemCode;


                    let ItemNameCell = row.insertCell(6);
                    ItemNameCell.innerHTML = item.ItemName;

                    let UOMCell = row.insertCell(7);

                    UOMCell.innerHTML = item.UOM;

                    let PriceCell = row.insertCell(8);
                    PriceCell.innerHTML = parseFloat(item.Price).toFixed(2);
                    PriceCell.style.Align = "right";

                });

                $('#impmod').show();
                table3.columns.adjust();

                $('.itemgselect').change(function (e) {
                    e.preventDefault();
                    var selectedOption = $(this).find('option:selected');

                    var Percentage = selectedOption.data('percentage');
                    var itemcode = selectedOption.data('itemcode');
                    var salerate = selectedOption.data('salerate');
                    var uom = selectedOption.data('uom');
                    var row = $(this).closest('tr');
                    var Percentagetd = $(row).find('.Percentagetd').text(parseFloat(Percentage).toFixed(2)+'%');
                    var itemcodetd = $(row).find('.itemcodetd').text(itemcode);
                    var UOMtd = $(row).find('.UOMtd').text(uom);
                    var saleratetd = $(row).find('.saleratetd').text(parseFloat(salerate).toFixed(2));


                });
            }
        });

        $(document).ready(function() {
            $(document).on('change', 'select[id^="Vendor"]', function() {
                var depCode = $(this).find('option:selected').val();
                $(this).closest('tr').find('td:first').text(depCode);
            });
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0');
            var yyyy = today.getFullYear();
            today = yyyy + '-' + mm + '-' + dd;
            $('#Dateq').val(today);


            var newitemcode = '{{ $newItemCode }}';
            console.log(newitemcode);
            $('#Itemcode').val(newitemcode);

            let depcode = '{{ $DepartmentCode }}';
            if (depcode !== '') {
                const vendorSelect = document.querySelector('#Departmentselect');
                const vendorOption = vendorSelect.querySelector(`option[value="${depcode}"]`);
                vendorOption.selected = true;

            }

        });

        $(document).on("click", "#delete", function() {
            var Itemcode = $('#Itemcode').val();

            var password = prompt("Please enter Admin Authentication:");
            if (password === "332211") {
                if (confirm("Are you Sure want to Delete : " + Itemcode)) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: '{{ URL::to('itemdelete') }}',
                        type: 'POST',
                        data: {
                            Itemcode,
                        },
                        beforeSend: function() {
                            $('.overlay').show();
                        },
                        success: function(response) {
                            alert(response.message);
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.error("AJAX request failed: " + errorThrown);
                        },
                        complete: function() {
                            $('.overlay').hide();
                        }
                    });
                } else {
                    alert("Access denied.");
                    return;
                }
            } else {
                alert("Incorrect password.");
                return;

            }
        });
        $(document).on("click", "#NewItem", function() {

            var Itemcode = $('#Itemcode').val('');
            var Dateq = $('#Dateq').val('');
            var IMPACode = $('#IMPACode').val('');
            var ItemitemName = $('#ItemitemName').val('');
            var Departmentcode = $('#Departmentselect').val('');
            var Departmentname = $('#Departmentselect option:selected').text('');
            var uoms = $('#uoms').val('');
            var SalePrice = $('#SalePrice').val('');
            var Currency = $('#Currency').val('');
            var ReorderLevel = $('#ReorderLevel').val('');
            var CategoryCode = $('#Category').val('');
            var Category = $('#Category option:selected').text('');
            var OrignCode = $('#OrignCode').val('');
            var Orign = $('#Orign option:selected').text('');
            var SubCategoryCode = $('#SubCategory').val('');
            var SubCategory = $('#SubCategory option:selected').text('');
            var ReorderQty = $('#ReorderQty').val('');
            @php
                $maxItemCode = DB::table('itemsetupnew')->max('ItemCode');
                $matches = [];
                if (preg_match('/^([A-Za-z]*)(\d+)$/', $maxItemCode, $matches)) {
                    $alphabetPart = $matches[1];
                    $numericPart = $matches[2];

                    $newNumericPart = intval($numericPart) + 1;

                    $dnewItemCode = $alphabetPart . $newNumericPart;
                } else {
                    // Handle the case when the regular expression doesn't match
    // You can provide a default value or throw an exception depending on your requirements.
    $newItemCode = '0000001';
                }
            @endphp
            $('#Itemcode').val('{{ $dnewItemCode }}');
        });
        $(document).on("click", "#SaveItem", function() {

            var Itemcode = $('#Itemcode').val();
            var Dateq = $('#Dateq').val();

            var IMPACode = $('#IMPACode').val();
            var ItemitemName = $('#ItemitemName').val();
            var Departmentcode = $('#Departmentselect').val();
            var Departmentname = $('#Departmentselect option:selected').text();
            var godowncode = $('#godown').val();
            var godown = $('#godown option:selected').text();
            var uoms = $('#uoms').val();
            var SalePrice = $('#SalePrice').val();
            var Currency = $('#Currency').val();
            var ReorderLevel = $('#ReorderLevel').val();
            var CategoryCode = $('#Category').val();
            var Category = $('#Category option:selected').text();
            var OrignCode = $('#OrignCode').val();
            var Orign = $('#Orign option:selected').text();
            var SubCategoryCode = $('#SubCategory').val();
            var SubCategory = $('#SubCategory option:selected').text();
            var ReorderQty = $('#ReorderQty').val();
            let table = document.getElementById('verndores');
            let rows = table.rows;

            let dataarray = [];

            for (let i = 0; i < rows.length; i++) {
                let cells = rows[i].cells;
                let vendorSelect = cells[1].querySelector('select[name="Vendor"]');
                let uomSelect = cells[2].querySelector('select[name="venuoms"]');
                let lastDateInput = cells[5].querySelector('input[name="lastdateven"]');

                console.log(uomSelect.value);
                dataarray.push({
                    ID: cells[0] ? cells[0].innerHTML : '',
                    Vendercode: vendorSelect ? vendorSelect.value : '',
                    VenderName: vendorSelect ? vendorSelect.options[vendorSelect.selectedIndex].text : '',
                    UOM: uomSelect ? uomSelect.value : '',
                    Type: cells[3] ? cells[3].innerHTML : '',
                    OurPrice: cells[4] ? cells[4].innerHTML : '',
                    LastDate: lastDateInput ? lastDateInput.value : '',

                    WorkUser: cells[6] ? cells[6].innerHTML : ''
                });
            }

            console.log(dataarray);

            if (Itemcode == '') {
                if (confirm("Want To Create An Item Code?")) {
                    @php
                        $maxItemCode = DB::table('itemsetupnew')->max('ItemCode');
                        $matches = [];
                        if (preg_match('/^([A-Za-z]*)(\d+)$/', $maxItemCode, $matches)) {
                            $alphabetPart = $matches[1];
                            $numericPart = $matches[2];

                            $newNumericPart = intval($numericPart) + 1;

                            $newItemCode = $alphabetPart . $newNumericPart;
                        } else {
                            // Handle the case when the regular expression doesn't match
    // You can provide a default value or throw an exception depending on your requirements.
    $newItemCode = '0000001';
                        }
                    @endphp
                    $('#Itemcode').val('{{ $newItemCode }}');
                    Itemcode = $('#Itemcode').val();
                    console.log(Itemcode);
                } else {
                    alert('Canceled Because No Item Code Found');
                    return $('#Itemcode').focus();

                }
            }
            if (ItemitemName == '') {
                alert('Please Type An Item Name');
                return $('#ItemitemName').focus();
            }

            if (Departmentcode == '') {
                alert('Please Select An Department');
                return $('#Departmentselect').focus();
            }
            if (uoms == '') {
                alert('Please Select Unit Of Measurement');
                return $('#uoms').focus();
            }
            if (SalePrice == '') {
                if (confirm('Sale Price In Not Defined Want to Continue')) {
                    SalePrice = 0;
                } else {
                    return $('#SalePrice').focus();
                }
            }

            if (Category == "Select one") {
                Category = null;
            }
            if (Orign == "Select one") {
                Orign = null;
            }
            if (SubCategory == "Select one") {
                SubCategory = null;
            }

            let formData = new FormData();
            formData.append('Itemcode', Itemcode);
            formData.append('Dateq', Dateq);
            formData.append('IMPACode', IMPACode);
            formData.append('ItemitemName', ItemitemName);
            formData.append('Departmentcode', Departmentcode);
            formData.append('Departmentname', Departmentname);
            formData.append('uoms', uoms);
            formData.append('SalePrice', SalePrice);
            formData.append('Currency', Currency);
            formData.append('ReorderLevel', ReorderLevel);
            formData.append('CategoryCode', CategoryCode);
            formData.append('Category', Category);
            formData.append('OrignCode', OrignCode);
            formData.append('Orign', Orign);
            formData.append('SubCategoryCode', SubCategoryCode);
            formData.append('SubCategory', SubCategory);
            formData.append('ReorderQty', ReorderQty);
            formData.append('godown', godown);
            formData.append('godowncode', godowncode);
            formData.append('dataarray', JSON.stringify(dataarray));
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ URL::to('itemregstore') }}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    // Show the overlay and spinner before sending the request
                    $('.overlay').show();
                },
                success: function(response) {
                    console.log(response.Alldata);
                    if (response.status === "success") {
                        Swaal.fire({
                                    icon: 'success',
                                    title: 'Item Saved',
                                    text: 'Item Has Been Saved SuccessFully!',
                                    showConfirmButton: true,
                                    timer: 3500
                                })


                    } else {

                        Swaal.fire({
                                    icon: 'error',
                                    title: 'Item Not Saved!',
                                    text: 'Your request was unsuccessfull!',
                                    showConfirmButton: true,
                                    timer: 3500
                                })

                    }
                },
                error: function(xhr, status, error) {
                    Swaal.fire({
                                    icon: 'error',
                                    title: 'Item Not Saved!',
                                    text: error,
                                    showConfirmButton: true,
                                    timer: 3500
                                })

                },
                complete: function() {
                    $('.overlay').hide();
                }
            });


        });




        function ajaxSetup() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        }

        function sercher() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'post',
                url: '{{ URL::to('itemregsearch') }}',
                data: {
                    'productname': $productname
                },
                beforeSend: function() {
                    $('.overlay').show();
                },
                success: function(resposne) {

                    let data = resposne.data;

                    let table = document.getElementById('itembody');
                    table.innerHTML = ""; // Clear the table
                    var ids = 0;
                    data.forEach(function(item) {
                        ids = ids + 1;
                        let row = table.insertRow();
                        row.setAttribute("data-ItemCode", item.ItemCode);
                        row.setAttribute("data-DepartmentCode", item.DepartmentCode);
                        row.setAttribute("data-CategoryCode", item.CategoryCode);
                        row.setAttribute('id', 'rowcell');

                        let ItemCodeCell = row.insertCell(0);
                        ItemCodeCell.innerHTML = item.ItemCode;


                        let ItemNameCell = row.insertCell(1);
                        ItemNameCell.innerHTML = item.ItemName;

                        let UOMCell = row.insertCell(2);
                        UOMCell.innerHTML = item.UOM;

                        let DepartmentCodeCell = row.insertCell(3);
                        DepartmentCodeCell.innerHTML = item.DepartmentCode;

                    });

                },
                complete: function() {
                    $('.overlay').hide();
                }
            });
        }
        $(document).on("keyup", "#ItemitemNameg", function() {

            $productname = $(this).val();
            console.log($productname);

            keywordss = $('#ItemitemNameg').val();
            if (keywordss.length == 3) {

                sercher();
            }

        })
        $(document).ready(function() {
            $('#ItemitemNameg').keypress(function(e) {
                if (e.which == 13) {
                    sercher();
                }
            });
            $('#ItemitemNameg').on('keyup', function(e) {
                var keywords = $('#ItemitemNameg').val();

                if (keywords.length > 3) {
                    var input, filter, table, tr, td, i, txtValue;
                    input = document.getElementById("ItemitemNameg");
                    filter = input.value.toUpperCase();
                    table = document.getElementById("itembody");
                    tr = table.getElementsByTagName("tr");
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[1];
                        if (td) {
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].style.display = "";
                            } else {
                                tr[i].style.display = "none";

                            }
                        }
                    }
                }
            });
        });

        $(document).on("dblclick", "#rowcell", function() {
            $ItemCode = $(this).attr('data-ItemCode');
            $DepartmentCode = $(this).attr('data-DepartmentCode');
            $CategoryCode = $(this).attr('data-CategoryCode');

            console.log('itemcode' + $ItemCode);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'post',
                url: '{{ URL::to('populateitemreg') }}',
                data: {
                    'ItemCode': $ItemCode,
                    'CategoryCode': $CategoryCode,
                    'DepartmentCode': $DepartmentCode,

                },
                success: function(response) {
                    console.log(response);
                    var item = response.data;
                    $('#Itemcode').val(item.ItemCode);
                    $('.ItemitemNameg').val(item.VenderName);
                    document.getElementById('Dateq').valueAsDate = new Date(item.Date);
                    $('#ItemitemName').val(item.ItemName);
                    $('#IMPACode').val(item.IMPAItemCode);
                    $('#PUOM').val(item.UOM);
                    $('#PUOM').text(item.UOM);

                    $('#Orign').val(item.OriginName);
                    $('#Orign').text(item.OriginName);
                    $('#SalePrice').val(Math.round(item.FixedPrice, 2));
                    $('#Currency').val(item.Currency);
                    $('#Departmentselect').val(item.DepartmentCode);
                    $('#ReorderQty').val(item.ReorderQty);
                    $('#ReorderLevel').val(item.ReorderLevel);
                    $('#Category').val(item.Categorybox);
                    $('#CategoryCode').val(item.Categorybox);
                    console.log(item.Categorybox);

                    let data = response.list;
                    let datav = response.vendors;
                    let dataU = response.UOM;
                    console.log(data);
                    let table = document.getElementById('verndores');
                    table.innerHTML = "";
                    let ids = 0;

                    data.forEach(function(item) {
                        ids++;
                        const checkDate = new Date(item.LastDate);
                        const options = {
                            weekday: 'long',
                            year: 'numeric',
                            month: 'long',
                            day: 'numeric'
                        };
                        const dayOfWeek = checkDate.toLocaleString('en-US', options).split(',')[
                            0];

                        const formattedDate = checkDate.toISOString().substring(0, 10);
                        console.log(formattedDate);

                        let row = table.insertRow();
                        let IDCell = row.insertCell(0);
                        IDCell.innerHTML = item.ID;

                        let VenderNameCell = row.insertCell(1);
                        let dropdownHtml =
                            '<select class="custom-select" name="Vendor" id="Vendor">';
                        datav.forEach(function(items) {
                            dropdownHtml += '<option data-depcode="' + items
                                .VenderCode + '" value="' + items.VenderCode + '"';
                            dropdownHtml += item.VenderCode === items.VenderCode ?
                                'selected' : '';
                            dropdownHtml += '>' + items.VenderName + '</option>';

                        });
                        dropdownHtml += '</select>';
                        VenderNameCell.innerHTML = dropdownHtml;

                        let UOMCell = row.insertCell(2);
                        let dropdownHtmls =
                            '<select class="custom-select" name="venuoms" id="venuoms">';

                        console.log(dataU);
                        dataU.forEach(function(itemu) {
                            dropdownHtmls += '<option value="' + itemu.UOMName + '"';
                            if (item.UOM == itemu.UOMName) {
                                dropdownHtmls += 'selected';
                                // console.log('same');
                                // console.log('item' + item.UOM);
                                // console.log('itemu' + itemu.UOM);
                            }
                            dropdownHtmls += '>' + itemu.UOMName + '</option>';

                        });
                        dropdownHtmls += '</select>';

                        UOMCell.innerHTML = dropdownHtmls;

                        let TypeCell = row.insertCell(3);
                        TypeCell.innerHTML = item.Type;
                        TypeCell.contentEditable = true;

                        let OurPriceCell = row.insertCell(4);
                        OurPriceCell.innerHTML = parseFloat(item.VendorPrice).toFixed(2);
                        OurPriceCell.contentEditable = true;
                        let LastDateCell = row.insertCell(5);
                        let lastDateInput = document.createElement('input');
                        lastDateInput.type = "date";
                        lastDateInput.name = "lastdateven";
                        lastDateInput.id = "lastdateven";
                        lastDateInput.className = "form-control";
                        lastDateInput.value = formattedDate;
                        LastDateCell.appendChild(lastDateInput);

                        let WorkUserCell = row.insertCell(6);
                        WorkUserCell.innerHTML = item.WorkUser;
                    });

                }
            });

            // $.ajax({
            //     type: 'post',
            //     url: '{{ URL::to('vendoritemcheck') }}',
            //     data: {
            //         'ItemCode': $ItemCode,
            //         'DepartmentCode': $DepartmentCode
            //     },
            //     success: function(response) {
            //         let data = response.list;
            //         let datav = response.vendors;
            //         let dataU = response.UOM;
            //         console.log(data);
            //         let table = document.getElementById('verndores');
            //         table.innerHTML = "";
            //         let ids = 0;

            //         data.forEach(function(item) {
            //             ids++;
            //             const checkDate = new Date(item.LastDate);
            //             const options = {
            //                 weekday: 'long',
            //                 year: 'numeric',
            //                 month: 'long',
            //                 day: 'numeric'
            //             };
            //             const dayOfWeek = checkDate.toLocaleString('en-US', options).split(',')[
            //                 0];

            //             const formattedDate = checkDate.toISOString().substring(0, 10);
            //             console.log(formattedDate);

            //             let row = table.insertRow();
            //             let IDCell = row.insertCell(0);
            //             IDCell.innerHTML = item.ID;

            //             let VenderNameCell = row.insertCell(1);
            //             let dropdownHtml =
            //                 '<select class="custom-select" name="Vendor" id="Vendor">';
            //             datav.forEach(function(items) {
            //                 dropdownHtml += '<option data-depcode="' + items
            //                     .VenderCode + '" value="' + items.VenderCode + '"';
            //                 dropdownHtml += item.VenderCode === items.VenderCode ?
            //                     'selected' : '';
            //                 dropdownHtml += '>' + items.VenderName + '</option>';

            //             });
            //             dropdownHtml += '</select>';
            //             VenderNameCell.innerHTML = dropdownHtml;

            //             let UOMCell = row.insertCell(2);
            //             let dropdownHtmls =
            //                 '<select class="custom-select" name="venuoms" id="venuoms">';
            //             dataU.forEach(function(itemu) {
            //                 dropdownHtmls += '<option value="' + itemu.UOM + '"';
            //                 if (item.UOM == itemu.UOM) {
            //                     dropdownHtmls += 'selected';
            //                     console.log('same');
            //                     console.log('item' + item.UOM);
            //                     console.log('itemu' + itemu.UOM);
            //                 }
            //                 dropdownHtmls += '>' + itemu.UOM + '</option>';

            //             });
            //             dropdownHtmls += '</select>';

            //             UOMCell.innerHTML = dropdownHtmls;

            //             let TypeCell = row.insertCell(3);
            //             TypeCell.innerHTML = item.Type;
            //             TypeCell.contentEditable = true;

            //             let OurPriceCell = row.insertCell(4);
            //             OurPriceCell.innerHTML = parseFloat(item.VendorPrice).toFixed(2);
            //             OurPriceCell.contentEditable = true;
            //             let LastDateCell = row.insertCell(5);
            //             let lastDateInput = document.createElement('input');
            //             lastDateInput.type = "date";
            //             lastDateInput.name = "lastdateven";
            //             lastDateInput.id = "lastdateven";
            //             lastDateInput.className = "form-control";
            //             lastDateInput.value = formattedDate;
            //             LastDateCell.appendChild(lastDateInput);

            //             let WorkUserCell = row.insertCell(6);
            //             WorkUserCell.innerHTML = item.WorkUser;
            //         });
            //     }
            // });


        })

        $(document).ready(function() {

            $('#SaveImportItem').click(function(e) {
                e.preventDefault();


                let table = document.getElementById('importitembody');
                let rows = table.rows;
                let dataarray = [];

                for (let i = 0; i < rows.length; i++) {
                    let cells = rows[i].cells;
                    var selectElement = cells[1].querySelector("select");
                    var ItemName = selectElement.value;

                    dataarray.push({
                        ItemCode: cells[0] ? cells[0].innerHTML : '',
                        ItemName: cells[1] ? ItemName : '',
                        UOM: cells[2] ? cells[2].innerHTML : '',
                        Price: cells[3] ? cells[3].innerHTML : '',
                    });
                }
                ajaxSetup();

                $.ajax({
                    type: 'post',
                    url: '{{ URL::to('bulkitemsave') }}',
                    data: {
                        dataarray
                    },
                    beforeSend: function() {
                        $('.overlay').show();
                    },
                    success: function(response) {
                        console.log(response);
                        if (response.status == 'saved') {
                            let table = document.getElementById('importitembody');
                            var data = response.Allitemcode;
                            data.forEach(function(item, index) {
                                let row = table.rows[index];
                                let ItemCodegetCell = row.cells[0];
                                ItemCodegetCell.innerHTML = item.itemcode;
                                ItemCodegetCell.contentEditable = 'true';
                                let matchinCell = row.cells[4];
                                matchinCell.innerHTML = 'Changed';
                            });
                            Swaal.fire({
                                    icon: 'success',
                                    title: 'Items Saved',
                                    text: 'Your New Items Are All Saved!',
                                    showConfirmButton: true,
                                    timer: 3500
                                })
                            $('#impmod').hide();
                        }
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
