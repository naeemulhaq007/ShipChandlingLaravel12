

<div id="Barcodemodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog  modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">BarCodePrint</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row pb-2">
                        <div class="input-group col-sm-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="">Invoice# :</span>
                            </div>
                            <input class="form-control" type="text" name="barcodeinv" id="barcodeinv">
                        </div>
                        <a name="" id="" class="btn btn-default mx-1 ml-auto"  role="button"><i class="fas fa-print"></i> Print</a>
                        {{-- <a name="" id="" class="btn btn-default mx-1"  role="button"><i class="fas fa-door-open text-danger"></i> Exit</a> --}}
                    </div>


                    <div class="rounded shadow mx-auto small">
                        <table class="table table-hover   "  id="barcodeprinttable">
                    <thead class="bg-info">
                      <tr>
                        <th style="width: 100px">Bar&nbsp;Code</th>
                        <th style="width: 1200px">Item&nbsp;Name</th>
                        <th class="text-right">PUOM</th>
                        <th class="text-right" >Batch&nbsp;No</th>
                        <th class="text-center" >Expiry&nbsp;Date</th>
                        <th class="text-center">Item&nbsp;Code</th>
                        <th class="text-center" >Qty</th>

                      </tr>
                    </thead>
                        <tbody id="barcodeprinttablebody">

                          </tbody>
                        </table>
                    </div>


                </div>
            </div>
            <div class="modal-footer">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#barcodeinv').blur(function (e) {
            e.preventDefault();
            let barcodeinv = $('#barcodeinv').val();
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

        $.ajax({
            url: '/barcodesearch',
            type: 'POST',
            data: {
                barcodeinv,
            }, beforeSend: function() {
        // Show the overlay and spinner before sending the request
        $('.overlay').show();
    },
    success: function (resposne) {
        let data = resposne.InvoiceDetail;
        console.log(data);
        let table = document.getElementById('barcodeprinttablebody');
    table.innerHTML = ""; // Clear the table
    data.forEach(function(item) {
        let row = table.insertRow();

        let BarcodeCell = row.insertCell(0);
    BarcodeCell.innerHTML = item.ExpireBarCode ? 'Exp '+item.ExpireBarCode : item.BarCode;
    // BarcodeCell.style.width = '100px';


    let ItemNameCell = row.insertCell(1);
    ItemNameCell.innerHTML = item.ItemName;

    let PUOMCell = row.insertCell(2);
    PUOMCell.innerHTML = item.UOM;

    let BatchNoCell = row.insertCell(3);
    BatchNoCell.innerHTML = item.BatchNo;

    var chekdate = new Date(item.ExpiryDate);
    const forDate = chekdate.toISOString().substring(0, 10);


    let ExpiryDateCell = row.insertCell(4);
    ExpiryDateCell.innerHTML = forDate;

    let ItemCodeCell = row.insertCell(5);
    ItemCodeCell.innerHTML = item.ItemCode;

    let QuantityCell = row.insertCell(6);
    QuantityCell.innerHTML = item.Quantity;



    })

    },
    error: function (xhr, status, error) {
        console.log(error);

    },
    complete: function() {
        // Hide the overlay and spinner after the request is complete
        $('.overlay').hide();
    }
});
        });

    });
</script>
