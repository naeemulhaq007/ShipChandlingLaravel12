@extends('layouts.app')



@section('title', 'Purcahse-Order')

@section('content_header')

@stop

@section('content')
    </div>
    <div class="col-lg-12 small">
        <div class="row">
            <div class="custom-col-2 rounded shadow mx-auto">
                <h5 class="text-blue">Purchase Order Form</h5>
            </div>
        </div>
        <div class="card
    {{-- collapsed-card --}}
     mt-3">
            <div style="background-color:#EEE; " class="card-header">
                <!-- h5 class="card-title"></h5 -->

                <div class="form-inline">

                    <div class="input-group  ml-2 mb-2">
                        <strong>VSN # :&nbsp;</strong> <label class="VSN text-blue"
                            for="VSN">{{ $VSN }}</label>
                        {{-- <input type="number" readonly step="1" id="VSN" value="{{$VSN}}" class="form-control ml-2"> --}}
                    </div>

                    <div class="input-group  ml-5 mb-2">
                        /&nbsp; <strong>Event # :&nbsp;</strong> <label class="event_no text-blue"
                            for="event_no">{{ $Ordermasterdata->EventNo }}</label>

                    </div>
                    <div class="input-group  ml-5 mb-2">
                        /&nbsp; <strong>Customer :&nbsp;</strong> <label class="customer text-blue"
                            for="customer">{{ $Ordermasterdata->CustomerName }}</label>

                    </div>
                    <div class="input-group  ml-5 mb-2">
                        /&nbsp; <strong>Vessel :&nbsp;</strong> <label class="vessel text-blue"
                            for="vessel">{{ $Ordermasterdata->VesselName }}</label>

                    </div>
                    <div class="input-group  ml-5 mb-2">
                        /&nbsp; <strong>Customer Ref # :&nbsp;</strong> <label class="customer_ref_no text-blue"
                            for="customer_ref_no">{{ $Ordermasterdata->CustomerRefNo }}</label>

                    </div>
                    <div class="input-group  ml-5 mb-2">
                        /&nbsp; <strong>Charge # :&nbsp;</strong> <label class="Charge text-blue"
                            for="Charge">{{ $Ordermasterdata->PONo }}</label>&nbsp;&nbsp; <button
                            class="text-success border" onclick="purchasefill()">Fill</button>

                    </div>
                    <div class="input-group  ml-5 mb-2">
                        /&nbsp; <strong>Quote # :&nbsp;</strong> <label class="QuoteNo text-blue"
                            for="QuoteNo">{{ $Ordermasterdata->QuoteNo }}</label>

                    </div>
                    <div class="input-group  ml-5 mb-2">
                        /&nbsp; <strong>CustomerCode # :&nbsp;</strong> <label class="CustomerCode text-blue"
                            for="CustomerCode">{{ $Ordermasterdata->CustomerCode }}</label>

                    </div>
                    <div class="input-group  ml-5 mb-2">
                        /&nbsp; <strong>IMO # :&nbsp;</strong> <label class="IMO text-blue" for="IMO"></label>

                    </div>

                    <div class="input-group  ml-5 mb-2">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>



            </div>
            <div class="card-body">
                <div class="col-lg-12 py-2">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="pod">Purchase Order Date :</span>
                                </div>
                                {{-- <input class="form-control" value="{{date('Y-m-d', strtotime($value->DeliveryDate))}}" type="date" id="deliverydate" name="deliverydate" > --}}
                                <input class="form-control" value="" type="date" id="PurchaseOrderDate"
                                    name="PurchaseOrderDate">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="pod">Split PO # :</span>
                                </div>
                                {{-- <input class="form-control" value="{{date('Y-m-d', strtotime($value->DeliveryDate))}}" type="date" id="deliverydate" name="deliverydate" > --}}
                                <input class="form-control" value="" type="number" id="splitpo" name="splitpo">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=" mx-auto">
            <table class="table table-bordered table-inverse table-responsive" id="PO">
                <thead class="thead-dark">
                    <tr>
                        <th>Buy</th>
                        <th>Buy&nbsp;By</th>
                        <th>PO</th>
                        <th>Charge#</th>
                        <th>Qty</th>
                        <th>Unit</th>
                        <th>IMPA</th>
                        <th>Internal</th>
                        <th style="padding-left: 6rem;padding-right: 6rem">Vendor</th>
                        <th>V&nbsp;Srch</th>
                        <th>Cost&nbsp;Price</th>
                        <th>Sell&nbsp;Price</th>
                        <th>Vendor&nbsp;Code</th>
                        <th>SNo</th>
                        <th>Rec&nbsp;Qty&nbsp;Order</th>
                    </tr>
                </thead>
                <tbody class="podata">
                    {{-- <tr>
                    <td scope="row"></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td scope="row"></td>
                    <td></td>
                    <td></td>
                </tr> --}}
                </tbody>
            </table>
        </div>
        <div class="progress progress-striped active">
            <div class="progress-bar progress-bar-success bg-success" style="width:0%">
            </div>
        </div>
        <div class="row pt-2 pb-1">
            <a name="" id="selectall" class="btn btn-default col-sm-1 form-control" role="button">Select All</a>
            <a name="" id="unselectall" class="btn btn-default col-sm-1 form-control" role="button">UnSelect All</a>
            {{-- <div class="progress">
            <div class="progress-bar bg-success" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
          </div> --}}
        </div>
        <div class="row pt-1 pb-2">
            <a name="" id="refresh" class="btn btn-default col-sm-1 form-control" role="button">Refresh</a>

        </div>
        <div class="col-sm-11 mx-auto">
            <table class="table table-bordered table-inverse table-responsive" id="vPO">
                <thead class="thead-dark">
                    <tr>
                        <th style="padding-left: 6rem;padding-right: 6rem">Vendor</th>
                        <th>Select</th>
                        <th>Total&nbsp;Purch&nbsp;Value</th>
                        <th>#&nbsp;Item&nbsp;Not&nbsp;Purch</th>
                        <th>Rec&nbsp;Qty</th>
                        <th>Vendor&nbsp;Code</th>
                        <th>PO#</th>
                        <th>PO&nbsp;Date</th>
                        <th>Atten:</th>
                        <th>Your&nbsp;Code</th>
                        <th>Terms</th>
                        <th>Ship&nbsp;Via</th>
                        <th>ReqDate</th>
                        <th>Time</th>
                        <th>Vendor&nbsp;Comments</th>
                        <th>PORecDate</th>
                        <th>PORecTime</th>
                    </tr>
                </thead>
                <tbody class="vpodata">
                    {{-- <tr>
                        <td scope="row"></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td scope="row"></td>
                        <td></td>
                        <td></td>
                    </tr> --}}
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">

    <style>
        .tablesize {
            flex: 89%;
            max-width: 89%;
        }

        .custom-col-2 {
            flex: 0 0 12.6%;
            max-width: 12.6%;
        }

        .card-body span {
            width: 110px;
            font-size: 11px;

        }

        .form-control {
            font-size: 11px;

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
    <script>
        function purchasefill() {

            $PONO = {{ $Ordermasterdata->PONo }};

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'post',
                url: '{{ URL::to('purchaseorderfiller') }}',
                data: {
                    'PONO': $PONO
                },
                success: function(data) {
                    $('.podata').html(data);
                    // console.log(data);
                }
            });
            // $.ajax({
            // type : 'post',
            // url : '{{ URL::to('pofer') }}',
            // data:{'PONO':$PONO,
            // $VSNNo = $VSN,
            //         $POrderNo = document.getElementById("POMadeNog").innerHTML,
            //         $VendorCode = document.getElementById("VendorCodeg").innerHTML,
            // },
            // success:function(data){
            // $('.vpodata').html(data);
            // // console.log(data);
            // }
            // });

        }
        $(document).ready(function() {
            //     $(".progress-bar").animate({
            //     width: "100%"

            // }, 2500);
            // setTimeout(function() {
            //       alert('Progress bar complete!');
            //     }, 3000);

            $('#PO').DataTable({
                scrollY: 350,
                deferRender: true,
                scroller: true,
                responsive: true,
                // scrollX: true,
                // paging: false,
                dom: 'Bfrtip',
                buttons: [
                    'excel',
                ]

            });
            $('#vPO').DataTable({
                scrollY: 350,
                deferRender: true,
                scroller: true,
                // responsive: true,
                scrollX: true,
                // paging: false,
                dom: 'Bfrtip',
                buttons: [
                    'excel',
                ]

            });
        });
        purchasefill();
    </script>
    <script>
        $(document).ready(function() {
            document.getElementById("PurchaseOrderDate").valueAsDate = new Date();
        })
    </script>
@stop


@section('content')
