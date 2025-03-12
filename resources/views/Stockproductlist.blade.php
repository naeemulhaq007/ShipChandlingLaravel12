@extends('layouts.app')



@section('title', 'Stock-item-Setup')

@section('content_header')

@stop

@section('content')
    </div>
    <?php// echo View::make('partials.itemsearch') ?> ?>
    @if (\Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>{!! \Session::get('success') !!}</strong>
        </div>
    @endif
    @if (\Session::has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>{!! \Session::get('error') !!}</strong>
        </div>
    @endif

    <header class="col-sm-4 mx-auto">
        <h5>Stock Product List</h5>
    </header>

    <form action="stockitem/store" enctype="multipart/form-data" method="POST">
        @csrf



        <div class="col-lg-12 row">


            <div class="col-md-6 contaniner">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Stock Product List</h5>


                        {{-- <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>


                    </div> --}}

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">


                        <div class="row mb-2">
                            <div class="inputbox col-sm-4">
                                    <span class="Txtspan" id="">Stock #</span>
                                <input class="" required type="text" name="Productcode" id="Productcode"
                                    placeholder="">
                            </div>

                            <button name="" id="" class="btn btn-info" href="#"
                                role="button"><i class="fa fa-search" aria-hidden="true"></i></button>
                            <div class="inputbox col-sm-4">
                                    <span class="Txtspan"  id="">Date</span>
                                <input class="" type="date" name="Date" id="Dateq" placeholder="">
                            </div>
                            <div class="inputbox col-sm-3">
                                    <span class="Txtspan"  id="">IMPA Code</span>
                                <input class="" type="text" name="IMPACode" id="IMPACode" placeholder="">
                            </div>

                        </div>
                        <div class="row mb-2">
                            <div class="inputbox col-sm-12 py-1">
                                    <span class="Txtspan" id="">Product Name</span>
                                <input class="" required type="text" name="ProductName" id="ProductitemName"
                                    placeholder="Product Name">
                            </div>



                        </div>
                        <div class="row mb-2">
                            <div class="inputbox col-sm-12 py-1">
                                    <span class="Txtspan" id="">BarCode</span>
                                <input class="" type="text" name="BarCode" id="BarCode" placeholder="">
                            </div>



                        </div>


                        <div class="row mb-2">
                            <div class="inputbox col-sm-12 py-1">
                                    <span class="Txtspan" id="">W.H. Location</span>
                                <input class="" type="text" name="whLocation" id="whLocation" placeholder="">
                            </div>



                        </div>
                        <div class="row mb-2">

                            <div class="inputbox col-sm-12 py-1">
                                    <span class="Txtspan" id="">Department</span>
                                <select class="" required name="Department" id="Department">
                                    @foreach ($Department as $Ditem)
                                        <option value="{{ $Ditem->TypeCode }}">{{ $Ditem->TypeName }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="row mb-2">

                            <div class="inputbox col-sm-12 py-1">
                                    <span class="Txtspan" id="">Category</span>
                                <select class="" name="Category" id="Category">
                                    @foreach ($Category as $Citem)
                                        <option value="{{ $Citem->CategoryCode }}">{{ $Citem->CategoryName }}</option>
                                    @endforeach
                                </select>
                                <input type="hidden" name="CategoryCode" id="CategoryCode">
                            </div>

                        </div>
                        <div class="row mb-2">

                            <div class="inputbox col-sm-12 py-1">
                                    <span class="Txtspan" id="">Brand</span>
                                <select class="" required name="OriginName" id="OriginName">
                                    @foreach ($origin as $Ditem)
                                        <option value="{{ $Ditem->OriginCode }}">{{ $Ditem->OriginName }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-12">
                                <div class="inputbox py-1">
                                        <span class="Txtspan" id="">Vendor</span>
                                    {{-- <input type="text" name="TermsCode" class="form-control" value="" id="TermsCode"  placeholder=""> --}}
                                    <select class="" required name="Vendor" id="Vendor">

                                        @foreach ($VenderSetup as $item)
                                            <option value="{{ $item->VenderCode }}">{{ $item->VenderName }}</option>
                                        @endforeach

                                    </select>
                                    <input type="hidden" name="vendorcode" id="vendorcode">
                                </div>
                            </div>

                        </div>
                        <div class="row mb-2">
                            <div class="inputbox col-sm-6 py-1">
                                    <span class="Txtspan" id="">UOM</span>
                                <select class="" required name="UOM" id="uoms">
                                    @foreach ($UOM as $uitem)
                                        <option value="{{ $uitem->UOM }}">{{ $uitem->UOM }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="inputbox col-sm-6 py-1">
                                    <span class="Txtspan" id="">Last Update Date</span>
                                <input class="" type="date" id="LastUpdateDate" name="LastUpdateDate">
                            </div>


                        </div>
                        <div class="row mb-2">
                            <div class="inputbox col-sm-6 py-1">
                                    <span class="Txtspan" id="">Land Cost Price</span>
                                <input class="" type="text" id="Landcostprice" name="Landcostprice">

                            </div>
                            <div class="inputbox col-sm-6 py-1">
                                    <span class="Txtspan" id="">Last price</span>
                                <input class="" type="text" id="LastRate" name="Lastprice">
                            </div>


                        </div>
                        <div class="row mb-2">
                            <div class="inputbox col-sm-6 py-1">
                                    <span class="Txtspan" id="">Fixed Sale Price</span>
                                <input class="" required type="text" id="SalePrice" name="SalePrice"
                                    placeholder="Recipient's text" aria-label="Recipient's " aria-describedby="">
                            </div>
                            <div class="inputbox col-sm-6 py-1">
                                    <span class="Txtspan" id="">Currency</span>
                                <input class="" type="text" name="Currency" id="Currency"
                                    placeholder="Recipient's text" aria-label="Recipient's " aria-describedby="">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="inputbox col-sm-6 py-1">
                                    <span class="Txtspan" id="">Base Price</span>
                                <input class="" type="text" name="baseprice" id="baseprice"
                                    placeholder="Recipient's text" aria-label="Recipient's " aria-describedby="">
                            </div>

                            <div class="inputbox col-sm-6 py-1">
                                    <span class="Txtspan" id="">Average Rate</span>

                                <input class="" type="text" name="Freight" id="Freight" aria-label="Recipient's " aria-describedby="">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-12">

                                <div class="row">
                                    <div class="inputbox col-sm-6 py-1">
                                            <span class="Txtspan" id="">Recorder Level</span>
                                        <input type="text" name="TxtReorderQty" class=""
                                            id="TxtReorderQty">

                                    </div>
                                    <div class="CheckBox1 col-sm-2">
                                        <label class="input-group text-info ml-2 mt-2">
                                            <input type="checkbox" name="ChkPullTicketPrinted" id="ChkPullTicketPrinted"
                                                onclick="" checked value="checkedValue"> PREISHABLE
                                        </label>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="inputbox col-sm-6 py-2">

                                            <span class="Txtspan" id="">Recorder Qty</span>
                                        <input type="text" name="TxtReorderQty"
                                            id="TxtReorderQty">
                                    </div>
                                    <div class="CheckBox1 col-sm-2">
                                        <label class="input-group text-info ml-2 mt-2">
                                            <input type="checkbox" name="ChkPullTicketPrinted" id="ChkPullTicketPrinted"
                                                onclick="" checked value="checkedValue"> GIFT
                                        </label>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="inputbox col-sm-6 py-2">

                                            <span class="Txtspan" id="">WareHouse</span>
                                        <select class="" required name="UOM" id="uoms">
                                            @foreach ($GodownSetup as $Godown)
                                                <option value="{{ $Godown->GodownCode }}">{{ $Godown->GodownName }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="CheckBox1 col-sm-2">
                                        <label class="input-group text-info ml-2 mt-2">
                                            <input type="checkbox" name="ChkPullTicketPrinted" id="ChkPullTicketPrinted"
                                                onclick="" checked value="checkedValue"> STROMME
                                        </label>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <button type="submit" name="" id="" class="btn btn-success col-sm-2"
                            role="button"><i class="fa fa-cloud" aria-hidden="true"></i> Save</button>
                        <a name="" id="" class="btn btn-warning col-sm-2" role="button"><i
                                class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                        <a name="" id="" class="btn btn-danger col-sm-2" href="/"
                            role="button"><i class="fa fa-door-open" aria-hidden="true"></i> Exit</a>
                        {{-- <div class="row" style="margin-bottom: 1%">
      <div style="text-align: right" class="col-sm-2">
      <label class="" for="Terms">Terms: </label>
      </div>
      <div class="col-sm-5">
  <input type="text" required name="Terms" class="form-control"  id="Terms"  placeholder="">
      </div>
  </div>
  <div class="row" style="margin-bottom: 1%">
      <div style="text-align: right" class="col-sm-2">
      <label class="" for="Days">Days : </label>
      </div>
      <div class="col-sm-5">
        {{-- <select class="custom-select" name="Days" id="">

            <option selected>Select one</option>
            @foreach ($term as $item)
            <option value="H">{{$item->Days}}</option>
           @endforeach

        </select>
      </div>
  </div> --}}



                    </div>

                </div>
            </div>
            <div class="col-md-6 container small">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Item Box</h5>


                        {{-- <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>


            </div> --}}

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="rounded shadow mx-auto">
                            <div class="row mb-2">
                                <div class="inputbox col-sm-12">
                                        <span class="Txtspan" id="">Search</span>
                                    <input class="" required type="text" name="serProductName"
                                        id="ProductitemName" placeholder="Product Name">

                                </div>
                            </div>
                            <div class=" ">
                                <table class="table table-bordered table-inverse " id="itemtable">
                                    <thead class="">
                                        <tr>
                                            <th style="width: 80px">ItemCode</th>
                                            <th style="width: 350px">ItemName</th>
                                            {{-- <th>IMPA#</th> --}}
                                            <th style="width: 200px">VendorName</th>
                                            <th>Inactive</th>
                                            {{-- <th>VendorCode</th> --}}
                                            {{-- <th>VCategoryName</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody class="itembody">
                                        {{-- <tr>
                                <td>SNo</td>
                                <td>Quote #</td>
                                <td>Cust Req #</td>
                                <td>Quote Amt</td>
                                <td>Est Lines</td>
                                <td>VSN</td>
                                <td>Charge</td>
                                </tr> --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-sm-6 mt-3">
                            <div class="table-container">
                                <table class="table table-bordered table-inverse  " id="godowntable">
                                    <tr>
                                        <th style="width: 200px;">GodownName</th>
                                        <th style="width: 70px;">Quantity</th>
                                    </tr>
                                    </thead>
                                    <tbody id="godowntablebody">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>


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
        $(document).ready(function() {

            var today = new Date().toISOString().split('T')[0];
            $('#Dateq').val(today);


            $('#itemtable').DataTable({
                scrollY: 380,
                deferRender: true,
                scroller: true,
                paging: false,
                info: false,
                ordering: false,
                searching: false,

            });



        });



        // $(document).ready( function () {
        // })
        // Vendoritembox
        //     $(document).on("change", "#Vendoritembox", function() {
        //         $vendorname=$(this).val();
        //         // console.log($vendorname);
        //         $.ajaxSetup({
        //   headers: {
        //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //   }
        // });
        //     $.ajax({
        //     type : 'post',
        //     url : '{{ URL::to('vendorselect') }}',
        //     data:{'vendorselect':$vendorname},
        //     success:function(data){
        //     $('.itembody').html(data);
        //     // console.log(data);
        //     }
        //     });

        // })
        $(document).on("keyup", "#ProductitemName", function() {
            $productname = $(this).val();
            console.log($productname);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'post',
                url: '{{ URL::to('itemselect') }}',
                data: {
                    'productname': $productname
                },
                success: function(data) {
                    $('.itembody').html(data);
                    // console.log(data);
                }
            });

        })
        $(document).on("dblclick", "#rowcell", function() {
            $ItemCode = $(this).attr('data-ItemCode');
            $VenderCode = $(this).attr('data-VenderCode');

            console.log($ItemCode);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'post',
                url: '{{ URL::to('populate-items') }}',
                data: {
                    'ItemCode': $ItemCode,
                    'VenderCode': $VenderCode,
                    'today': $('#Dateq').val(),
                },
                success: function($response) {
                    console.log($response);
                    $('#Productcode').val($response.Productcode);
                    $('#vendorg').val($response.VenderName);
                    $('#vendorg').text($response.VenderName);
                    let data = $response.results;

                    // $('#Dateq').val($response.Date);
                    document.getElementById('Dateq').valueAsDate = new Date($response.Date);
                    $('#ProductitemName').val($response.ItemName);
                    $('.sproductr').val($response.ItemName);
                    $('#IMPACode').val($response.IMPAItemCode);
                    $('#Remarks').val($response.Remarks);
                    $('#PUOM').val($response.UOM);
                    $('#PUOM').text($response.UOM);
                    //         $('#uoms').append($('<option selected>', {
                    //     value: $response.UOM,
                    //     text : $response.UOM
                    //   }));
                    // $('#LastUpdateDate').val(response.LastDate);
                    document.getElementById('LastUpdateDate').valueAsDate = new Date($response
                    .LastDate);

                    $('#LastRate').val(parseFloat($response.LastRate).toFixed(2));
                    $('#OriginName').val($response.OriginName);
                    $('#OriginName').text($response.OriginName);
                    $('#VendorPrice').val(parseFloat($response.VendorPrice).toFixed(2));
                    $('#SalePrice').val(parseFloat($response.FixedPrice).toFixed(2));
                    $('#Currency').val($response.Currency);
                    $('#Freight').val(parseFloat($response.Freight).toFixed(2));
                    $('#Port').val($response.PortName);
                    $('#Port').text($response.PortName);
                    $('#Department').val($response.DepartmentCode);
                    console.log($response.DepartmentCode);
                    // $('#Department').text($response.DepartmentCode);
                    $('#CategoryCode').text($response.CategoryCode);
                    // $categor = $response.Categorybox[0].CategoryName
                    // console.log($categor);
                    $('#Category').val($response.CategoryCode);
                    // $('#Category').text($categor);
                    $('#vendorcode').val($response.VenderCode);
                    $('#Vendor').val($response.VenderCode);
                    $('#BarCode').val($response.BarCode);


                    let table = document.getElementById('godowntablebody');
                    table.innerHTML = ""; // Clear the table
                    data.forEach(function(item) {
                        let row = table.insertRow();

                        let GodownNameCell = row.insertCell(0);
                        GodownNameCell.innerHTML = item.GodownName;
                        GodownNameCell.setAttribute('data-GodownCode', item.GodownCode);


                        let QuantityCell = row.insertCell(1);
                        QuantityCell.innerHTML = parseFloat(item.Quantity).toFixed(2);

                    });




                    // $('#email').val(response.email);
                }
            });

        })
    </script>

@stop


@section('content')
