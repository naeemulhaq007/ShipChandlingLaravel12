
<div class="modal fade" id="impalist" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label=""><span>×</span></button>
            </div>
            <div class="modal-body">
                <div class="col-sm-12">
                    <div class="row pb-2">
                        <input type="text" class="form-control col-sm-1" name="TxtIMPAItemCode" id="TxtIMPAItemCode">
                        <input type="text" class="form-control col-sm-5 mx-1" name="TxtItemNameS" id="TxtItemNameS">
                        <input type="text" class="form-control col-sm-1" name="TxtPacking" id="TxtPacking">
                        <input type="text" class="form-control col-sm-3 ml-5 mr-1" name="TxtVendorName" id="TxtVendorName">
                        <input type="hidden" class="form-control col-sm-1" name="TxtDepartmentCode" id="TxtDepartmentCode">
                    </div>
                    <div class="table-responsive col-sm-12">
                        <table class="table  table-inverse" id="Dg1">
                            <thead class="bg-info">
                                <tr>
                                    <th >IMPA&nbsp;Code</th>
                                    <th style="width: 400px">Product&nbsp;Name</th>
                                    <th >UOM</th>
                                    <th >Cost </th>
                                    <th >Vendor</th>
                                    <th >Sale&nbsp;Price</th>
                                    <th >Dept</th>
                                    <th >Last&nbsp;Update</th>
                                    <th >User</th>
                                    <th >Item&nbsp;Code</th>
                                    <th hidden >VendorPN</th>
                                    <th hidden >VendorCode</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $SPIMPAItem = DB::table('itemsetup')->select('ItemCode', 'ItemName', 'UOM', 'Cost', 'VendorName', 'SalePrice', 'TypeName', 'LastUpdate', 'WorkUser', 'StockCode', 'VendorPN','VendorCode')
                                ->where('ItemName', '<>', '')
                                ->orderBy('ItemCode')
                                ->limit(800)
                                ->get();
                                @endphp
                                @foreach ($SPIMPAItem as $item)
                                <tr>
                                    <td>{{$item->ItemCode}}</td>
                                    <td>{{$item->ItemName}}</td>
                                    <td>{{$item->UOM}}</td>
                                    <td>{{round($item->Cost,2)}}</td>
                                    <td>{{$item->VendorName}}</td>
                                    <td>{{round($item->SalePrice,2)}}</td>
                                    <td>{{$item->TypeName}}</td>
                                    <td>{{date('d-M-Y', strtotime($item->LastUpdate))}}</td>
                                    <td>{{$item->WorkUser}}</td>
                                    <td>{{$item->StockCode}}</td>
                                    <td hidden>{{$item->VendorPN}}</td>
                                    <td hidden>{{$item->VendorCode}}</td>
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



<script>
    $(document).ready(function () {
    tabledg = $('#Dg1').DataTable({
    scrollY: 600,
    scrollX: true,
    deferRender:true,
    scroller:true,
    paging: false,
    info:false,
    ordering:false,
    searching:false,
    responsive:true,

});


$('#TxtIMPAItemCode').on('keyup', function(e) {
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
