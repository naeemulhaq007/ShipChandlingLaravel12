@extends('layouts.app')



@section('title', 'Purchase-Order')

@section('content_header')

@stop

@section('content')
    </div>
    <div class="col-lg-12 container-fluid ">

        <div class="card mt-3">

            <div class="card-header" style="background-color:#EEE; ">
                <div class="card-tools ">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
                <div class="row">
                    <h5 class="text-blue">Purchase Order</h5>
                    <div class=" mx-5 ">
                        <strong>VSN #:</strong>&nbsp; <label class="VSN text-blue">{{ $VSN }}</label>
                    </div>
                    <div class=" mx-5 "></div>
                    <div class="mx-5">
                        /&nbsp;<strong>Event #:</strong> &nbsp;<label class="event_no text-blue"
                            for="event_no">{{ $FlipToVSN->EventNo }}</label>
                    </div>
                    <div class=" mx-5 "></div>

                    <div class="mx-5">
                        /&nbsp;<strong>Quote #:</strong> &nbsp;<label class="QuoteNo text-blue"
                            for="QuoteNo">{{ $FlipToVSN->QuoteNo }}</label>
                    </div>
                    <div class=" mx-5 "></div>

                    <div class="ml-5">
                        /&nbsp; <strong>Warehouse :&nbsp;</strong> <label class="Warehouse text-blue"
                            for="Warehouse">{{ $FlipToVSN->GodownName }}</label>

                    </div>
                </div>

            </div>
        </div>
        <div class="card">
            <div class="card-body">


                <div class=" table-responsive mx-auto">
                    <table class="table  table-inverse" id="PO">
                        <thead class="">
                            <tr>
                                <th style="width:500px">Vendor&nbsp;Name</th>
                                <th>Charge&nbsp;#</th>
                                <th>Approve&nbsp;Limit</th>
                                <th>PO&nbsp;#</th>
                                <th style="width:100px ">PO&nbsp;Date</th>
                                <th>PO&nbsp;Amount</th>
                                <th>Freight</th>
                                <th>Select</th>
                                <th>Ship&nbsp;Via</th>
                                <th style="width:100px ">Req&nbsp;Date</th>
                                <th>Time</th>
                                <th hidden>Shipto</th>
                                <th>Vendor&nbsp;Comment</th>
                                <th>Department</th>
                                <th hidden>Vendor&nbsp;Code</th>
                                <th>Email&nbsp;Address</th>
                                <th>Order&nbsp;Qty</th>
                                <th>Atten</th>
                                <th>A/c&nbsp;Post</th>
                            </tr>
                        </thead>
                        <tbody id="pco">




                        </tbody>
                    </table>


                </div>

                <div class="row">
                    <div class="inputbox col-sm-2 py-2">
                        <input readonly type="text" id="nooforder" value="" name="nooforder" placeholder="">
                        <span class="" id=""># Of Order</span>
                    </div>

                    <div class="inputbox col-sm-2 py-2">
                        <input readonly type="text" id="POTotal" value="" name="POTotal" placeholder="">
                        <span class="" id="">PO Total</span>
                    </div>

                    <div class="inputbox col-sm-2 py-2">
                        <input type="text" readonly id="SelectedValue" name="SelectedValue" placeholder="">
                        <span class="" id="">Selected Value</span>
                    </div>

                    <div class="inputbox col-sm-2 py-2">
                        <input type="text" readonly id="TotalFreight" value="" name="TotalFreight" placeholder="">
                        <span class="" id="">Total Freight</span>
                    </div>

                </div>
                <div class="row py-1">
                    <a name="" id="" class="form-control mx-1 col-sm-1 btn btn-warning"
                        onclick="window.close()" role="button">Close</a>
                    <a name="" id="" class="form-control mx-1 col-sm-1 btn btn-success" href="#"
                        role="button">Vendor Maint</a>
                    <a name="" id="printer" class="form-control mx-1 col-sm-2 btn btn-success"
                        {{-- href="{{ route('Purchaseorderprint', $PONO) }}" target="_blank" --}} role="button">Print Selected PO</a>
                    <a name="" id="" class="form-control mx-1 col-sm-1 btn btn-success" href="#"
                        role="button">Email Po</a>
                    <a name="" id="" class="form-control mx-1 col-sm-1 btn btn-success" href="#"
                        role="button">Ship Via</a>
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
        src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
    <script>
          function ajaxSetup() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        }
        function Dataget(){
          var vsno = $('.VSN').text();
            ajaxSetup();

            $.ajax({
                type: 'post',
                url: "{{ route('purchaseordercodataget') }}",
                data: {
                    vsno,
                },
                beforeSend: function() {
                    // Show the overlay and spinner before sending the request
                    $('.overlay').show();
                },
                success: function(response) {
                    console.log(response);
                    if (response.alldata) {
                        var data = response.alldata;
                        let table = document.getElementById('pco');
                        table.innerHTML = ""; // Clear the table
                        data.forEach(function(item) {
                            let row = table.insertRow();

                            function createCell(content) {
                                let cell = row.insertCell();
                                cell.innerHTML = content;
                                return cell;
                            }
                            createCell(item.OrderDetail.VendorName);
                            createCell(item.OrderDetail.PONO);
                           // Assuming 'item' is defined somewhere in your code
                            let approved = createCell('');
                            const checkbox = document.createElement('input');
                            checkbox.type = 'checkbox';
                            checkbox.name = 'approve';
                            checkbox.id = `approve${item.OrderDetail.POMadeNo}`;
                            if (item.PurchaseOrderMaster && item.PurchaseOrderMaster.Appr) {
                                checkbox.checked = true;
                                }

                                approved.appendChild(checkbox);

                            createCell(item.OrderDetail.POMadeNo);
                            createCell(item.OrderDetail.POMadeDate);
                            createCell(item.OrderDetail.MEstPrice);
                            createCell(item.OrderDetail.MFreight);
                            let selecettd = createCell('');
                            const selecettdbox = document.createElement('input');
                            selecettdbox.type = 'checkbox';
                            selecettdbox.name = 'Selected';
                            selecettdbox.id = `Selected${item.OrderDetail.POMadeNo}`;
                            if (item.PurchaseOrderMaster && item.PurchaseOrderMaster.Selected) {
                                selecettdbox.checked = true;
                                }

                                selecettd.appendChild(selecettdbox);

                                if (item.PurchaseOrderMaster) {
                                    createCell(item.PurchaseOrderMaster ? (item.PurchaseOrderMaster.ChkCancelledPO > 0 ? 'CANCELLED' : item.PurchaseOrderMaster.ShipVia) : ' ' );
                                    createCell(item.PurchaseOrderMaster ? item.PurchaseOrderMaster.ReqDate : '');
                                    createCell(item.PurchaseOrderMaster ? item.PurchaseOrderMaster.Time : '');
                                    createCell(item.PurchaseOrderMaster ? item.PurchaseOrderMaster.VendorComment : '');
                                    createCell(item.PurchaseOrderMaster ? item.PurchaseOrderMaster.DepartmentName : '');
                                    createCell(item.PurchaseOrderMaster ? item.PurchaseOrderMaster.EmailAddress : '');
                                    createCell(item.PurchaseOrderMaster ? item.PurchaseOrderMaster.OrderQty : '');
                                    createCell(item.PurchaseOrderMaster ? item.PurchaseOrderMaster.Atten : '');

                                }else{
                                    let nopurchase = createCell('');
                                    nopurchase.colSpan = 8;
                                    nopurchase.innerHTML = 'PurchaseOrder Not Created';

                                }
                                createCell(item.PostedAc);

                        });
                    }

                },
                error: function(error) {
                    console.log(error);

                    // handle error response
                },
                complete: function() {
                    // Hide the overlay and spinner after the request is complete
                    $('.overlay').hide();
                }
            });

        }
        $(document).ready(function() {
            $('#PO').DataTable({
                scrollY: 400,
                deferRender: true,
                scroller: true,
                paging: false,
                info: false,
                ordering: false,
                responsive: true,
                searching: false,


            });



            Dataget();


        })
        $(document).on("click", "#printer", function() {
            let table = document.getElementById('pco');
            let rows = table.rows;
            for (let i = 0; i < rows.length; i++) {
                let cells = rows[i].cells;
                vendorname = cells[0].innerHTML;
                charge = cells[1].innerHTML;
                approve = cells[2].innerHTML;
                po = cells[3].innerHTML;
                podate = cells[4].innerHTML;
                poammount = cells[5].innerHTML;
                freight = cells[6].innerHTML;
                selecterd = cells[7].innerHTML;
                // shipvia = cells[8].innerHTML;
                // reqdate = cells[9].innerHTML;
                // time = cells[10].innerHTML;
                // vendorcomment = cells[11].innerHTML;
                // department = cells[12].innerHTML;
                // emailaddress = cells[13].innerHTML;
                // orderqty = cells[14].innerHTML;
                // attren = cells[15].innerHTML;
                // acpost = cells[16].innerHTML;

                //   console.log(approve);
                //     console.log(selecterd);
                if ($('#Selected' + po).prop("checked") == true) {
                    // alert("Checkbox is checked.");
                    // if (document.getElementById("Selected"+po).checked) {
                    console.log(po + 'is checked');
                    document.getElementById("SelectedValue").value = poammount;
                    window.open("/Purchaseorderprint/" + po, "_blank");

                } else {
                    console.log(po + "Checkbox is not checked");
                }

                //       console.log(poammount);
                //       console.log(department);
                //   for (let j = 0; j < cells.length; j++) {
                //     console.log(cells[j].innerHTML);
                //   }
            }

        });
    </script>
@stop


@section('content')
