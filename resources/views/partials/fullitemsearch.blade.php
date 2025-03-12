

<style>
    .RemarksCell {
   max-width: 100px;
 overflow: hidden;
 white-space: nowrap;
 text-overflow: ellipsis;
}
</style>

  <div class="modal fade" id="searchrmodfull" tabindex="-1" role="dialog" aria-labelledby="search-modal-full" aria-hidden="true">
    <div class="modal-dialog modal-xl" style="max-width:1470px;" role="document">
      <div class="modal-content">
        <div class="modal-body gc-modal-body" style="background-color: #b8dedf">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-12">
                <label for="item-name" class="modal-th2">Search Item Name:</label>
                <input type="text" class="modal-search form-control mb-2" id="itemnameser2" name="">
              </div>
            </div>
            <div class="col-sm-12">
                <div class="table-responsive" style="max-height: 700px; overflow-x:auto;">
                    <table id="producers-tables" class="table">
                        <thead class="bg-info">
                        <tr>
                            <th>Code</th>
                            <th>Name</th>
                            <th>UOM</th>
                            <th>IMPA&nbsp;Code</th>
                            <th>Last&nbsp;Date</th>
                            <th>Cost</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Vendor&nbsp;Name</th>
                            <th>Type</th>
                            <th>Vendor&nbsp;Part#</th>
                            <th>Added&nbsp;By</th>
                            <th hidden>Vendor Code</th>
                            <th style="width: 100px">Store</th>
                            <th>Remarks</th>
                        </tr>
                        </thead>
                        <tbody class="itemserchdata"></tbody>
                    </table>
                </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary">Close</button>
        </div>
      </div>
    </div>
  </div>


        <!-- /.modal -->


<!-- /.container -->

<script>
    $(document).ready(function() {
  // executes when HTML-Document is loaded and DOM is ready

//   $('#itemtable').DataTable({
//         scrollY:        400,
//     // deferRender:    true,
//     scroller:       true,
//     // responsive: true,
//     ordering: false,
//     // scrollX: true,
//     paging: false,
///////////////////////////////////

var tableData2 = []; // Array to store the table data

function fetchData2() {
  var itemName = '%' + $('#itemnameser2').val() + '%';
  var DepartmentCode = $('#DepartmentCode').val();
  var GodownCode = $('#GodownCode').val();
  var ChkDeckEngin = $('#ChkDeckEngin').val();

  $.ajax({
    url: "/indexitema",
    method: "GET",
    data: {
      ItemName: itemName,
      DepartmentCode: DepartmentCode,
      GodownCode: GodownCode,
      ChkDeckEngin: ChkDeckEngin
    },
    success: function(response) {
      tableData2 = response; // Assuming the response is an array of objects
      renderTable2();
    },
    error: function(error) {
      console.log(error);
    }
  });
}

function renderTable2() {
  var tableBody2 = $('#producers-tables tbody');
  tableBody2.empty();
  var tabIndex = 3;
  tableData2.forEach(function(row) {
    var tableRow = $('<tr>').attr('tabindex', tabIndex);
        tabIndex++;
    tableRow.append($('<td>', { text: row.ItemCode,  }));
    tableRow.append($('<td>', { text: row.ItemName }));
    tableRow.append($('<td>', { text: row.UOM }));
    tableRow.append($('<td>', { text: row.IMPAItemCode }));

    var lastDate = new Date(row.LastDate);
    var formattedDate = lastDate.getDate() + '-' + lastDate.toLocaleString('en-US', { month: 'short' }) + '-' + lastDate.getFullYear();
    tableRow.append($('<td>', { text: formattedDate }));

    tableRow.append($('<td>', { text: parseFloat(row.OurPrice).toFixed(2) }));
    tableRow.append($('<td>', { text: parseFloat(row.FixedPrice).toFixed(2) }));
    tableRow.append($('<td>', { text: row.MStockQty }));
    tableRow.append($('<td>', { text: row.VenderName }));
    tableRow.append($('<td>', { text: row.Type }));
    tableRow.append($('<td>', { text: row.VendorPartNo }));
    tableRow.append($('<td>', { text: row.WorkUser }));
    tableRow.append($('<td>', { text: row.VenderCode, style: 'display: none' }));
    tableRow.append($('<td>', { text: row.ChkStromme, style: 'width: 100px' }));
    tableRow.append($('<td>', { text: row.Remarks, style: 'width: 100px', class: 'RemarksCell' }));

    if (row.Type === 'CONTRACT') {
      tableRow.css('background-color', 'yellow');
    } else if (row.Type === 'STOCK') {
      tableRow.css('background-color', '#90EE90');
    } else if (row.VenderCode === '') {
      tableRow.css('display', 'none');
    }

    tableBody2.append(tableRow);
  });


  $('#producers-tables tbody').on('dblclick', 'tr', function() {

          $('#item_code').val($(this).find('td:eq(0)').text());
          $('#item_desc').val($(this).find('td:eq(1)').text());
          $('#uom').val($(this).find('td:eq(2)').text());
          $('#impa').val($(this).find('td:eq(3)').text());
          $('#vpart_no').val($(this).find('td:eq(10)').text());
          $('#vendor_price').val(parseFloat($(this).find('td:eq(5)').text()).toFixed(2));
          $('#sell_price').val(parseFloat($(this).find('td:eq(6)').text()).toFixed(2));

          $('select[name="VenderName"]').val($(this).find('td:eq(12)').text());
      $('#searchrmodfull').modal('hide');
      if($('#setchk').prop("checked") == true){
          $('#impa').focus();

      }else{
          $('#qty').focus();
      }

      });
      $('#producers-tables').on('keypress', 'tr', function(event) {
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
      $('#searchrmodfull').modal('hide');
      if($('#setchk').prop("checked") == true){
          $('#impa').focus();

      }else{
          $('#qty').focus();
      }
        }
    });
}


$("#itemnameser2").on("keyup", function() {
  var keywordss = $('#itemnameser2').val();
  if (keywordss.length == 3) {
    console.log(keywordss);
    fetchData2();
  }

});
//////////////////////////////////


//     });
// var DepartmentCode = $('#DepartmentCode').val();
//         var GodownCode = $('#GodownCode').val();
//         var ChkDeckEngin = $('#ChkDeckEngin').val();
// console.log(ChkDeckEngin+'e');


//         var table2 = $('#producers-tables').DataTable({
//     processing: true,
//     serverSide: true,
//     ordering:false,
//     ajax: {
//         url: "{{ url('/indexitema') }}?GodownCode="+GodownCode+"&DepartmentCode="+DepartmentCode+"&ChkDeckEngin="+ChkDeckEngin,
//         data: function (d) {
//             d.ItemName = '%'+$('#itemnameser2').val()+'%'; // Get the value from the input field with id "item-name-input"
//         }
//     },
//     columns: [
//     { data: 'ItemCode', name: 'ItemCode' },
//     { data: 'ItemName', name: 'ItemName' },
//     { data: 'UOM', name: 'UOM' },
//     { data: 'IMPAItemCode', name: 'IMPAItemCode' },
//     { data: 'LastDate', name: 'LastDate', render: function(data, type, row) {
//         // format LastDate as "2022-JUN-10"
//         if (type === 'display') {
//             var date = new Date(data);
//             var months = ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'];
//             data = date.getFullYear() + '-' + months[date.getMonth()] + '-' + date.getDate();
//         }
//         return data;
//     } },
//     { data: 'OurPrice', name: 'OurPrice', render: function(data, type, row) {
//         // round OurPrice to 2 decimal places
//         if (type === 'display') {
//             data = parseFloat(data).toFixed(2);
//         }
//         return data;
//     } },
//     { data: 'FixedPrice', name: 'FixedPrice', render: function(data, type, row) {
//         // round OurPrice to 2 decimal places
//         if (type === 'display') {
//             data = parseFloat(data).toFixed(2);
//         }
//         return data;
//     } },
//     { data: 'MStockQty', name: 'Stock' },
//     { data: 'VenderName', name: 'VendorName' },
//     { data: 'Type', name: 'Type' },
//     { data: 'VendorPartNo', name: 'VendorPart' },
//     { data: 'WorkUser', name: 'User' },
//     { data: 'VenderCode', name: 'VendorCode' },
//     { data: 'ChkStromme', name: 'Store' },
//     { data: 'Remarks', name: 'Remarks' },
// ],
// createdRow: function(row, data, dataIndex) {
//     if (data.Type == 'CONTRACT') {
//         $(row).css('background-color', 'yellow');
//     } else if (data.Type == 'STOCK') {
//         $(row).css('background-color', '#90EE90');
//     }
// },
// rowCallback: function(row, data, index) {
//             $(row).attr('tabindex', index + 3);
//         }
// });

// // Trigger search on enter key press
// $('#itemnameser2').on('keypress', function(e) {
//   if (e.which === 13) {
//     table2.draw();
//   }
// });
// $("#item_desc").on("keyup", function() {
//         keywordss = $('#itemnameser2').val();
//         if (keywordss.length >= 3) {
//             // $('#searchrmod').modal('show');
//             // alert('yes');
//     table2.draw();

//         }
//     });
// });
// $('#producers-tables tbody').on('dblclick', 'tr', function() {
//         var rowData = table2.row(this).data();
//         $('#item_code').val(rowData.ItemCode);
//         $('#item_desc').val(rowData.ItemName);
//         $('#uom').val(rowData.UOM);
//         $('#impa').val(rowData.IMPAItemCode);
//         $('#vpart_no').val(rowData.VendorPartNo);
//         $('#vendor_price').val(parseFloat(rowData.OurPrice).toFixed(2));
//         $('#sell_price').val(parseFloat(rowData.FixedPrice).toFixed(2));

//         $('select[name="VenderName"]').val(rowData.VenderCode);
//         // and so on for other input fields
//         $('#searchrmodfull').modal('hide');
//     });

  $('#searchrmodfull').on('shown.bs.modal', function () {
    //   var val = $('#item_desc').val();
      $('#itemnameser2').trigger('focus')
    //   $('#itemnameser2').val(val);
})


$('#itemnameser2').on('keyup', function(e) {
  var keywords = $('#itemnameser2').val();

    if (keywords.length > 2) {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("itemnameser2");
  filter = input.value.toUpperCase();
  table = document.getElementById("producers-tables");
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

  // document ready
});

</script>
<script type="text/javascript">






//    $('#itemnameser2').on('keypress', function(event){
//   if(event.keyCode === 13){
//         $keywords = $(this).val();
//         var DepartmentCode = $('#DepartmentCode').val();
//         var GodownCode = $('#GodownCode').val();
//         var ChkDeckEngin = $('#ChkDeckEngin').val();

//         // console.log(DepartmentCode);
//         // console.log(GodownCode);
//         // console.log(ChkDeckEngin);

//     if ($keywords.length >= 3) {

//         $value='%'+$(this).val()+'%';
//     // console.log($value+'%');
//     $.ajaxSetup({
//   headers: {
//     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//   }
// });
//     $.ajax({
//     type : 'post',
//     url : '{{URL::to('itemnameser')}}',
//     data:{
//         'itemnameser':$value,
//         'DepartmentCode':DepartmentCode,
//         'GodownCode':GodownCode,
//         'ChkDeckEngin':ChkDeckEngin,

// },
//     success:function(data){
//     $('.itemserchdata').html(data);
//     // console.log(data);
//     }
//     });
//     }

//   }
//     })

    </script>



