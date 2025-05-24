
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="max-width: 800px;" role="document"> <!-- Reduced width -->
    <div class="modal-content" style="max-height: 90vh; overflow-y: auto;"> <!-- Reduced height -->
      <form id="importForm" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title" id="importModalLabel">Import Excel File</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

         <div class="modal-body">
          <div class="row">
            <div id="excelPreviewContainer" class="mt-4" style="max-height:400px; overflow:auto;">
              <table id="excelPreviewTable" class="table table-bordered table-striped">
                <thead></thead>
                <tbody></tbody>
              </table>
            </div>
            <div class="form-group col-sm-6">
              <label for="excel_file">Excel File</label>
              <input type="file" name="excel_file" id="excel_file" class="form-control-file" accept=".xls,.xlsx" required onchange="previewExcelFile(event)">
            </div>
          </div>

          <div class="row py-2">
            <div class="inputbox col-sm-3">
              <input type="number" name="start_row" id="start_row">
              <span class="Txtspan">Start Row</span>
            </div>
            <div class="inputbox col-sm-3">
              <input type="text" name="Impacolumn" id="Impacolumn">
              <span class="Txtspan">Impa Column</span>
            </div>
          </div>

          <div class="row py-2">
            <div class="inputbox col-sm-3">
              <input type="text" name="itemCodeColumn" id="itemCodeColumn">
              <span class="Txtspan">Item Code col</span>
            </div>
            <div class="inputbox col-sm-3">
              <input type="text" name="itemNameColumn" id="itemNameColumn" required>
              <span class="Txtspan">Item Name col</span>
            </div>
            <div class="inputbox col-sm-3">
              <input type="text" name="uomColumn" id="uomColumn">
              <span class="Txtspan">UOM col</span>
            </div>
          </div>

          <div class="row py-2">
            <div class="inputbox col-sm-3">
              <input type="text" name="vendorPriceColumn" id="vendorPriceColumn">
              <span class="Txtspan">VenPrice col</span>
            </div>
            <div class="inputbox col-sm-3">
              <input type="text" name="sellPriceColumn" id="sellPriceColumn">
              <span class="Txtspan">Price col</span>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-primary" onclick="opload()">Import</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- JS Libraries -->
<script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>

<!-- JS Logic -->
<script>
function previewExcelFile(event) {
  const file = event.target.files[0];
  if (!file) return;

  const reader = new FileReader();
  reader.onload = function (e) {
    const data = new Uint8Array(e.target.result);
    const workbook = XLSX.read(data, { type: 'array' });
    const worksheet = workbook.Sheets[workbook.SheetNames[0]];
    const sheetData = XLSX.utils.sheet_to_json(worksheet, { header: 1 });

    const tableHead = $('#excelPreviewTable thead');
    const tableBody = $('#excelPreviewTable tbody');
    tableHead.empty();
    tableBody.empty();

    if (sheetData.length > 0) {
      let headerHtml = '<tr><th>#</th>';
      for (let col = 0; col < sheetData[0].length; col++) {
        headerHtml += '<th>' + String.fromCharCode(65 + col) + '</th>';
      }
      headerHtml += '</tr>';
      tableHead.append(headerHtml);

      sheetData.forEach((row, index) => {
        let rowHtml = '<tr><td>' + (index + 1) + '</td>';
        row.forEach(cell => {
          rowHtml += '<td>' + (cell ?? '') + '</td>';
        });
        rowHtml += '</tr>';
        tableBody.append(rowHtml);
      });
    }
// if (sheetData.length > 0) {
//     let headerHtml = '<tr><th>S.No</th>'; // Add S.No header
//     for (let col = 0; col < sheetData[0].length; col++) {
//         headerHtml += '<th>' + String.fromCharCode(65 + col) + '</th>';
//     }
//     headerHtml += '</tr>';
//     tableHead.append(headerHtml);

//     sheetData.forEach((row, index) => {
//         let rowHtml = '<tr><td>' + (index + 1) + '</td>'; // Add serial number
//         row.forEach(cell => {
//             rowHtml += '<td>' + (cell ?? '') + '</td>';
//         });
//         rowHtml += '</tr>';
//         tableBody.append(rowHtml);
//     });
// }


  };

  reader.readAsArrayBuffer(file);
}










  function opload() {
    const file = document.getElementById('excel_file').files[0];
    if (!file) return alert('Please select an Excel file.');

    const itemName = document.getElementById('itemNameColumn').value.trim();
    if (!itemName) return alert('Item Name Column is required.');

    const formData = new FormData(document.getElementById('importForm'));

    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });

    $.ajax({
        type: 'POST',
        url: "{{ route('importQuataion') }}",
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            if (response.status === 'success') {
                $('#importModal').modal('hide');
                alert('Data imported successfully! Total rows: ' + response.data.length);

                // alert('Data imported successfully!');

                let table = $('#DG1').DataTable();
                table.clear();

                response.data.forEach(function (item) {
                    table.row.add([
                        item.ItemCode || '',
                        item.ItemName || '',
                        item.ItemNameVendor || '',
                        item.UOM || '',
                        item.IMPAItemCode || '',
                        item.VendorPrice || '',
                        item.LastDate || '',
                        item.WorkUser || '',
                        item.VPartCode || '',
                        item.Remarks || ''
                    ]);
                });

                table.draw();
            } else {
                alert('Import failed: ' + response.message);
            }
        },
        error: function (err) {
            console.error('Upload error:', err);
            alert('Upload failed. Check console for details.');
        }
    });
}





// function opload() {
//   const file = document.getElementById('excel_file').files[0];
//   if (!file) return alert('Please select an Excel file.');

//   const itemName = document.getElementById('itemNameColumn').value.trim();
//   if (!itemName) return alert('Item Name Column is required.');

//   const formData = new FormData(document.getElementById('importForm'));

//   $.ajaxSetup({
//     headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
//   });

//   $.ajax({
//     type: 'POST',
//     url: "{{ route('importQuataion') }}",
//     data: formData,
//     contentType: false,
//     processData: false,
//     success: function (response) {
//       // Move focus before hiding the modal
//       document.activeElement.blur(); // Remove focus from any button
//       $('body').focus(); // Optional: move focus to body

//       $('#importModal').modal('hide');
//       alert('Data imported successfully!');
//       populateTable();
//     },
//     error: function (err) {
//       console.error('Upload error:', err);
//       alert('Upload failed. Check console for details.');
//     }
//   });
// }




</script>
