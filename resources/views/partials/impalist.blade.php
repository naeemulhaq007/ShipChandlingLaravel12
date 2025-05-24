
<script>
$(document).ready(function () {
    tabledg = $('#Dg1').DataTable({
    scrollY: 600,
    scrollX: true,
    scroller:true,
    paging: false,
    info:false,
    ordering:false,
    searching:false,
    responsive:true,

});
$('#Dg1 tbody').on('dblclick', 'tr', function() {
        var rowData = tabledg.row(this).data();
        // console.log(rowData[9]);
        $('#item_code').val(rowData[9]);
        $('#item_desc').val(rowData[1]);
        $('#uom').val(rowData[2]);
        $('#impa').val(rowData[0]);
        // $('#vpart_no').val(rowData.VendorPartNo);
        $('#vendor_price').val(parseFloat(rowData[3]).toFixed(2));
        $('#sell_price').val(parseFloat(rowData[5]).toFixed(2));

        $('select[name="VenderName"]').val(rowData[11]);
        // and so on for other input fields
        $('#impalist').modal('hide');
    // $('#impalist').hide();
    if($('#setchk').prop("checked") == true){
        $('#impa').focus();

    }else{
        $('#qty').focus();
    }

    });

$('#TxtIMPAItemCode').on('keyup', function(e) {
        tabledg.column(0).search(this.value).draw();
  var keywords = $('#TxtIMPAItemCode').val();


  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("TxtIMPAItemCode");
  filter = input.value.toUpperCase();
  table = document.getElementById("Dg1");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";

      }
    }
  }

});
$('#TxtItemNameS').on('keyup', function(e) {
  var keywords = $('#TxtItemNameS').val();

    // if (keywords.length > 3) {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("TxtItemNameS");
  filter = input.value.toUpperCase();
  table = document.getElementById("Dg1");
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
// }
});
$('#TxtVendorName').on('keyup', function(e) {
  var keywords = $('#TxtVendorName').val();


  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("TxtVendorName");
  filter = input.value.toUpperCase();
  table = document.getElementById("Dg1");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[4];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";

      }
    }
  }

});
$('#TxtPacking').on('keyup', function(e) {
  var keywords = $('#TxtPacking').val();


  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("TxtPacking");
  filter = input.value.toUpperCase();
  table = document.getElementById("Dg1");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";

      }
    }
  }

});
});
</script>
