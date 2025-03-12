
<div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">
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

                        <input type="file" name="excel_file" id="excel_file" class="form-control-file"
                        accept=".xls, .xlsx, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"
                        required onchange="previewExcelFile(event)">

                    </div>


                </div>
                <button type="button" class="btn btn-info my-2" onclick="openInNewWindow()">Open in New Window</button>
                <div class="row py-2">
                    <div class="inputbox col-sm-3 ">
                        <input type="number" name="start_row" id="start_row">
                        <span class="Txtspan">
                            Start Row
                        </span>
                    </div>
                    <div class="inputbox col-sm-3 ">
                        <input type="number" name="end_row" id="end_row">
                        <span class="Txtspan">
                            End Row
                        </span>
                    </div>
                    <div class="inputbox col-sm-3 ">
                        <input type="text" name="Impacolumn" id="Impacolumn">
                        <span class="Txtspan">
                            Impa Column
                        </span>
                    </div>


                </div>
                <div class="row py-2">
                    <div class="inputbox col-sm-3 ">
                        <input type="text" name="itemCodeColumn" id="itemCodeColumn">
                        <span class="Txtspan">
                            Item Code col
                        </span>
                    </div>
                    <div class="inputbox col-sm-3 ">
                        <input type="text" name="itemNameColumn" id="itemNameColumn" required>
                        <span class="Txtspan">
                            Item Name col
                        </span>
                    </div>
                    <div class="inputbox col-sm-3 ">
                        <input type="text" name="QtyColumn" id="QtyColumn" >
                        <span class="Txtspan">
                            Qty col
                        </span>
                    </div>
                    <div class="inputbox col-sm-3 ">
                        <input type="text" name="uomColumn" id="uomColumn" >
                        <span class="Txtspan">
                            UOM col
                        </span>
                    </div>
                </div>
                <div class="row py-2">
                    <div class="inputbox col-sm-3 ">
                        <input type="text" name="VpartColumn" id="VpartColumn" >
                        <span class="Txtspan">
                            Vpart col
                        </span>
                    </div>
                    <div class="inputbox col-sm-3 ">
                        <input type="text" name="vendorPriceColumn" id="vendorPriceColumn" >
                        <span class="Txtspan">
                            VenPrice col
                        </span>
                    </div>
                    <div class="inputbox col-sm-3 ">
                        <input type="text" name="sellPriceColumn" id="sellPriceColumn" >
                        <span class="Txtspan">
                            Price col
                        </span>
                    </div>
                    <div class="inputbox col-sm-3 ">
                        <input type="text" name="VendorNameColumn" id="VendorNameColumn" >
                        <span class="Txtspan">
                            Ven Name col
                        </span>
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
<!-- Modal -->

<div class="modal fade" id="excelpreviewmod" tabindex="-1" role="dialog" aria-labelledby="importModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-xl" style="max-width:1850px;" role="document">
   <div class="modal-content">
       <form id="importForms" enctype="multipart/form-data">
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
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
           </div>
       </form>
   </div>
</div>
</div>

<script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/handsontable/dist/handsontable.full.min.css">
<script src="https://cdn.jsdelivr.net/npm/handsontable/dist/handsontable.full.min.js"></script>
<script>
    function previewExcelFile(event) {
    // var file = event.target.files[0];
    // var fileReader = new FileReader();

    // fileReader.onload = function(e) {
    //     var data = new Uint8Array(e.target.result);
    //     var workbook = XLSX.read(data, { type: 'array' });
    //     var sheetName = workbook.SheetNames[0];
    //     var worksheet = workbook.Sheets[sheetName];

    //     var sheetData = XLSX.utils.sheet_to_json(worksheet, { header: 1, raw: true });

    //     var excelContainer = document.getElementById('excelContainer');
    //     excelContainer.innerHTML = '';

    //     var hot = new Handsontable(excelContainer, {
    //         data: sheetData,
    //         rowHeaders: true,
    //         colHeaders: true,
    //         colWidths: 'auto',
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
                                </script>
