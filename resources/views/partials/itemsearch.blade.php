
         <div class="container-fluid cusmod" style="position: absolute; z-index: 100;  top: -90px; left:-5px; display: none;" id="cusmod">

          <div class="col-sm-12">

            <div class="table-responsive" style="max-height: 200px; overflow-x:auto;">
                  <table id="producers-table" class="tabless">
                      <thead class="bg-info">
                            <tr>
                              <th hidden class="px-2">Item&nbsp;Code</th>
                              <th class="px-5">Item&nbsp;Name</th>
                              <th class="px-1">UOM</th>
                              <th class="px-2">IMPA</th>
                              <th class="px-4">LastDate</th>
                              <th class="px-2">Cost</th>
                              <th class="px-2">Price</th>
                              <th class="px-2">Stock&nbsp;Qty</th>
                              <th style="padding-left: 5rem;padding-right:5rem;">Vendor&nbsp;Name</th>
                              <th class="px-2">Type</th>
                              <th class="px-2">Vendor&nbsp;Part&nbsp;#</th>
                              <th class="px-2">User</th>
                              <th hidden class="p-2">Vendor&nbsp;Code</th>
                              <th class="p-2">Store</th>
                              <th class="p-2">Remarks</th>
                            </tr>
                        </thead>
                            <tbody  class="itemserchdata">

                            </tbody>
                        </table>
                    </div>


          </div>

         </div>

<style>

.tabless {
    border-collapse: collapse;
    width: 100%;
  }

  .tabless th {
    background-color: #17a2b8!important;
    color: white;
    font-weight: bold;
    padding: 8px;
    text-align: left;
    position: sticky;
    top: 0;
  }

  .tabless td {
    /* background-color: #ffffff!important; */
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
  }
</style>
<script>

$(document).ready(function() {


document.addEventListener("keydown", function (event) {
  if (event.key === "Escape") {
    $('#cusmod').hide();
    if($('#setchk').prop("checked") == true){
        $('#impa').focus();

    }else{
        $('#qty').focus();
    }
  }
});

//     $(item_desc).keydown(function (event) {


// var DepartmentCode = $('#DepartmentCode').val();
//         var GodownCode = $('#GodownCode').val();
//         var ChkDeckEngin = $('#ChkDeckEngin').val();

// })///////////////////////////////

// // Function to format the date as "2022-JUN-10"
// function formatDate(date) {
//   var months = ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'];
//   return date.getDate() + '-' + months[date.getMonth()] + '-' + date.getFullYear();
// }

// // Function to round the number to 2 decimal places
// function formatNumber(number) {
//   return parseFloat(number).toFixed(2);
// }

// // Function to create a table row
// function createTableRow(item) {
//   var row = '<tr>';

//   // Set the column values
//   row += '<td style="display:none;">' + item.ItemCode + '</td>';
//   row += '<td>' + item.ItemName + '</td>';
//   row += '<td>' + item.UOM + '</td>';
//   row += '<td>' + item.IMPAItemCode + '</td>';
//   row += '<td>' + formatDate(new Date(item.LastDate)) + '</td>';
//   row += '<td>' + formatNumber(item.OurPrice) + '</td>';
//   row += '<td>' + formatNumber(item.FixedPrice) + '</td>';
//   row += '<td>' + item.MStockQty + '</td>';
//   row += '<td>' + item.VenderName + '</td>';
//   row += '<td>' + item.Type + '</td>';
//   row += '<td>' + item.VendorPartNo + '</td>';
//   row += '<td>' + item.WorkUser + '</td>';
//   row += '<td style="display:none;">' + item.VenderCode + '</td>';
//   row += '<td>' + item.ChkStromme + '</td>';
//   row += '<td class="RemarksCell">' + item.Remarks + '</td>';

//   row += '</tr>';

//   return row;
// }

// // Function to filter the items based on the search keyword
// function filterItems(keyword) {
//   var filteredItems = [];

//   for (var i = 0; i < items.length; i++) {
//     var item = items[i];

//     // Filter based on the search keyword
//     if (item.ItemName.toLowerCase().indexOf(keyword.toLowerCase()) !== -1) {
//       filteredItems.push(item);
//     }
//   }

//   return filteredItems;
// }

// // Function to update the table with filtered data
// function updateTable(keyword) {
//   var filteredItems = filterItems(keyword);

//   // Clear the table body
//   $('#producers-table tbody').empty();

//   // Iterate over the filtered items and add rows to the table
//   for (var i = 0; i < filteredItems.length; i++) {
//     var item = filteredItems[i];
//     var row = createTableRow(item);
//     $('#producers-table tbody').append(row);
//   }

//   // Show/hide the "cusmod" element based on the filtered data
//   if (filteredItems.length > 0 && keyword.trim() !== '') {
//     $('#cusmod').show();
//   } else {
//     $('#cusmod').hide();
//   }
// }
//////////////////////2////////////////


var tableData = []; // Array to store the table data

function fetchData() {
  var itemNameq =  $('#item_desc').val();
  var DepartmentCode = $('#DepartmentCode').val();
  var GodownCode = $('#GodownCode').val();
  var ChkDeckEngin = $('#ChkDeckEngin').val();

  $.ajax({
    url: "/indexitem",
    method: "GET",
    data: {
      ItemNameq: itemNameq,
      DepartmentCode: DepartmentCode,
      GodownCode: GodownCode,
      ChkDeckEngin: ChkDeckEngin
    },
    success: function(response) {
      tableData = response; // Assuming the response is an array of objects
      renderTable();
    },
    error: function(error) {
      console.log(error);
    }
  });
}

function renderTable() {
  var ChkOnlyStock = $('#ChkOnlyStock').prop('checked');

  var tableBody = $('#producers-table tbody');
  tableBody.empty();
  var tabIndex = 3;
  tableData.forEach(function(row) {
    var tableRow = $('<tr>').attr('tabindex', tabIndex);
        tabIndex++;
    tableRow.append($('<td>', { text: row.ItemCode, style: 'display: none' }));
    tableRow.append($('<td>', { text: row.ItemName }));
    tableRow.append($('<td>', { text: row.UOM }));
    tableRow.append($('<td>', { text: row.IMPAItemCode }));

    var lastDate = new Date(row.LastDate);
    var formattedDate = lastDate.getDate() + '-' + lastDate.toLocaleString('en-US', { month: 'short' }) + '-' + lastDate.getFullYear();
    tableRow.append($('<td>', { text: formattedDate }));

    tableRow.append($('<td>', { text: row.OurPrice ? parseFloat(row.OurPrice).toFixed(2) : 0 }));
    tableRow.append($('<td>', { text: row.FixedPrice ? parseFloat(row.FixedPrice).toFixed(2) : 0 }));
    tableRow.append($('<td>', { text: row.MStockQty }));
    tableRow.append($('<td>', { text: row.VenderName }));
    tableRow.append($('<td>', { text: row.Type }));
    tableRow.append($('<td>', { text: row.VendorPartNo }));
    tableRow.append($('<td>', { text: row.WorkUser }));
    tableRow.append($('<td>', { text: row.VenderCode, style: 'display: none' }));
    tableRow.append($('<td>', { text: row.ChkStromme }));
    tableRow.append($('<td>', { text: row.Remarks, class: 'RemarksCell' }));

    if (row.Type === 'CONTRACT') {
      tableRow.css('background-color', 'yellow');
    } else if (row.Type === 'STOCK') {
      tableRow.css('background-color', '#90EE90');
    } else if (row.Type !== 'STOCK' && row.Type !== 'CONTRACT') {
      tableRow.css('background-color', '#ffffff');
    } else if (row.VenderCode === '') {
      tableRow.css('display', 'none');
    }

    if(ChkOnlyStock){
        if (row.Type === 'STOCK') {
            tableBody.append(tableRow);
        }
    }else{
        tableBody.append(tableRow);
    }

  });

  if (tableData.length > 0 && $('#item_desc').val().trim() !== '') {
    $('#cusmod').show();
  } else {
    $('#cusmod').hide();
  }
  $('#producers-table tbody').on('dblclick', 'tr', function() {

          $('#item_code').val($(this).find('td:eq(0)').text());
          $('#item_desc').val($(this).find('td:eq(1)').text());
          $('#uom').val($(this).find('td:eq(2)').text());
          $('#impa').val($(this).find('td:eq(3)').text());
          $('#vpart_no').val($(this).find('td:eq(10)').text());
          $('#vendor_price').val(parseFloat($(this).find('td:eq(5)').text()).toFixed(2));
          $('#sell_price').val(parseFloat($(this).find('td:eq(6)').text()).toFixed(2));

          $('select[name="VenderName"]').val($(this).find('td:eq(12)').text());
      $('#cusmod').hide();
      if($('#setchk').prop("checked") == true){
          $('#impa').focus();

      }else{
          $('#qty').focus();
      }

      });
      $('#producers-table').on('keypress', 'tr', function(event) {
        if (event.which === 13) { // 13 is the code for the enter key
            // var rowData = $(this).data();
            $('#item_code').val($(this).find('td:eq(0)').text());
          $('#item_desc').val($(this).find('td:eq(1)').text());
          $('#uom').val($(this).find('td:eq(2)').text());
          $('#impa').val($(this).find('td:eq(3)').text());
          $('#vpart_no').val($(this).find('td:eq(10)').text());
          $('#vendor_price').val(parseFloat($(this).find('td:eq(5)').text()).toFixed(2));
          $('#sell_price').val(parseFloat($(this).find('td:eq(6)').text()).toFixed(2));

          $('select[name="VenderName"]').val($(this).find('td:eq(12)').text());
      $('#cusmod').hide();
      if($('#setchk').prop("checked") == true){
          $('#impa').focus();

      }else{
          $('#qty').focus();
      }
        }
    });
}


$("#item_desc").on("keyup", function() {
  var keywordss = $('#item_desc').val();
  if (keywordss.length == 3) {
    console.log(keywordss);
    fetchData();
  }
  if (keywordss.length < 3) {
    $('#cusmod').hide();
  }
});


/////////////////////////////////////
//     var DepartmentCode = $('#DepartmentCode').val();
//         var GodownCode = $('#GodownCode').val();
//         var ChkDeckEngin = $('#ChkDeckEngin').val();

//         var table = $('#producers-table').DataTable({
//     processing: true,
//     scrollY: 180,
//     deferRender: true,
//     scroller: true,
//     paging: false,
//     info:false,
//     ordering:false,
//     responsive:true,
//     searching:false,
//     // responsive: true,

//     ajax: {
//         url: "/indexitem",
//         data: function (d) {
//             d.ItemName = '%'+$('#item_desc').val()+'%'; // Get the value from the input field with id "item-name-input"
//             d.DepartmentCode = $('#DepartmentCode').val(); // Get the value from the input field with id "item-name-input"
//             d.GodownCode = $('#GodownCode').val(); // Get the value from the input field with id "item-name-input"
//             d.ChkDeckEngin = $('#ChkDeckEngin').val(); // Get the value from the input field with id "item-name-input"
//         }
//     },
//     columns: [
//     { data: 'ItemCode',visible: false},
//     { data: 'ItemName' },
//     { data: 'UOM' },
//     { data: 'IMPAItemCode' },
//     { data: 'LastDate', render: function(data, type, row) {
//         // format LastDate as "2022-JUN-10"
//         if (type === 'display') {
//             var date = new Date(data);
//             var months = ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'];
//             data = date.getDate() + '-' + months[date.getMonth()] + '-' + date.getFullYear();
//         }
//         return data;
//     } },
//     { data: 'OurPrice',  render: function(data, type, row) {
//         // round OurPrice to 2 decimal places
//         if (type === 'display') {
//             data = parseFloat(data).toFixed(2);
//         }
//         return data;
//     } },
//     { data: 'FixedPrice', render: function(data, type, row) {
//         // round OurPrice to 2 decimal places
//         if (type === 'display') {
//             data = parseFloat(data).toFixed(2);
//         }
//         return data;
//     } },
//     { data: 'MStockQty' },
//     { data: 'VenderName' },
//     { data: 'Type' },
//     { data: 'VendorPartNo' },
//     { data: 'WorkUser' },
//     { data: 'VenderCode',visible: false},
//     { data: 'ChkStromme' },
//     { data: 'Remarks', className: "RemarksCell" },
// ],
// createdRow: function(row, data, dataIndex) {
//     if (data.Type == 'CONTRACT') {
//         $(row).css('background-color', 'yellow');
//     } else if (data.Type == 'STOCK') {
//         $(row).css('background-color', '#90EE90');
//     } else if (data.VenderCode == ''){
//         $(row).css('display', 'none');

//     }
// },
// initComplete: function(row,settings, json) {

//     if (this.fnGetData().length > 0 && $('#item_desc').val().trim() !== '') {
//       $('#cusmod').show();
//     } else {
//       $('#cusmod').hide();
//     }
//   },
// drawCallback: function(settings) {
//     // Check if there is data to display
//     if (this.fnGetData().length > 0 && $('#item_desc').val().trim() !== '') {
//       $('#cusmod').show();
//     } else {
//       $('#cusmod').hide();
//     }

//     tableDrawn = true;
//   },
//   rowCallback: function(row, data, index) {
//             $(row).attr('tabindex', index + 3);
//         }
// });

// $("#item_desc").on("keyup", function() {
//         keywordss = $('#item_desc').val();
//         if (keywordss.length == 3) {
// console.log(keywordss);
// table.ajax.reload();

//         }
//         if(keywordss.length < 3){
//     $('#cusmod').hide();

//         }
//     });




$('#item_desc').on('keyup', function(e) {
  var keywords = $('#item_desc').val();

    if (keywords.length > 2) {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("item_desc");
  filter = input.value.toUpperCase();
  table = document.getElementById("producers-table");
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

</script>


    <script>
        $(document).on("click", ".itemclas", function() {
            $ItemCode = $(this).attr('data-ItemCode');
            $ItemName = $(this).attr('data-ItemName');
            $UOM = $(this).attr('data-UOM');
            $IMPAItemCode = $(this).attr('data-IMPAItemCode');
            $OurPrice = $(this).attr('data-OurPrice');
            $FixedPrice = $(this).attr('data-FixedPrice');
            $StockQty = $(this).attr('data-StockQty');
            $VenderName = $(this).attr('data-VenderName');
            $TypeName = $(this).attr('data-TypeName');
            $VendorPartNo = $(this).attr('data-VendorPartNo');
            $VenderCode = $(this).attr('data-VenderCode');
            $LastDate = $(this).attr('data-LastDate');
            $ID = $(this).attr('data-ID');

            document.getElementById("item_code").value = $ItemCode;
            document.getElementById("item_desc").value = $ItemName;
            document.getElementById("uom").value = $UOM;
            document.getElementById("impa").value = $IMPAItemCode;
            document.getElementById("vendor_price").value = $OurPrice;
            document.getElementById("sell_price").value = $FixedPrice;
            $('#vendoredit').val($VenderCode);
                $('#vendoredit').html($VenderName);
                $('#vendoredit').attr('readonly');
                $("#Vendrorname").prop("disabled", true);

            document.getElementById("vpart_no").value = $VendorPartNo;
            document.getElementById("item_id").value = $ID;

            $('#qty').focus();
        })
    </script>



