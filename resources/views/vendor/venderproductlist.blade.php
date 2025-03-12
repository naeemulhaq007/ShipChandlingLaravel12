@extends('layouts.app')



@section('title', 'vender-item-Setup')

@section('content_header')

@stop

@section('content')
</div>
<?php// echo View::make('partials.itemsearch') ?>
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
    <h5>Vender Product List</h5>
</header>

<form action="venderitem/store" enctype="multipart/form-data" method="POST">
    @csrf



      <div class="col-lg-12 row">


        <div class="col-md-6 contaniner">
            <div class="card">
                <div class="card-header">
                    <div class="card-tools ">


                        <button type="button" name="headertoggle" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                    <h5 class="card-title">Vender Product List</h5>


                </div>

                <div class="card-body">

                    <div class="row mb-2" >
                        <div class="inputbox col-sm-12">


                            <span class="Txtspan" id="">Vendor</span>

                                <select class="" required name="Vendor" id="vendorg">

                                    @foreach ($VenderSetup as $item)
                                    <option value="{{$item->VenderCode}}">{{$item->VenderName}}</option>
                                    @endforeach

                                </select>
                                <input type="hidden" name="vendorcode" id="vendorcode">

                        </div>

                    </div>
                    <div class="row">
                        <div class="inputbox col-sm-4 col-8 py-2">


                            <input class="" required type="text" name="Productcode" id="Productcode" placeholder="" >
                            <span class="Txtspan" id="">Product Code</span>

                        </div>

                        <a name="" id="" class="btn btn-info col-3 col-sm-1 mt-2 mb-2" href="#" role="button"><i class="fa fa-search" aria-hidden="true"></i></a>
                        <div class="inputbox col-sm-4 py-2">
                            <input class="" type="date" name="Date" id="Dateq" placeholder="" >


                                <span class="Txtspan" style="" id="">Date</span>

                        </div>
                        <div class="inputbox col-sm-3 py-2">
                            <input type="text" name="IMPACode" id="IMPACode" placeholder="" >

                                <span class="Txtspan" >IMPA Code</span>
                        </div>

                    </div>
                    <div class="row">
                        <div class="inputbox col-sm-12 py-2">
                            <input class="" required type="text" name="ProductName" id="ProductitemName" placeholder="Product Name">

                                <span class="Txtspan" id="">Product Name</span>
                        </div>



                    </div>
                    <div class="row">
                        <div class="inputbox col-sm-12 py-2">
                            <input type="text" name="Remarks" id="Remarks" placeholder="">
                            <span class="Txtspan" id="">Remarks</span>

                        </div>



                    </div>
                    <div class="row">
                        <div class="inputbox col-sm-6 py-2">
                                <span class="Txtspan" id="">UOM</span>
                            <select class="" required name="UOM" id="PUOM">
                                @foreach ($UOM as $uitem)

                                <option value="{{$uitem->UOM}}">{{$uitem->UOM}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="inputbox col-sm-6 py-2">
                                <span class="Txtspan" id="">Last Update Date</span>
                            <input class="" type="date" id="LastUpdateDate" name="LastUpdateDate" >
                        </div>


                    </div>
                    <div class="row">
                        <div class="inputbox col-sm-6 py-2">
                                <span class="Txtspan" id="">Country\Orign</span>
                            <select class="" name="Orign" id="Orign">
                                @foreach ($origin as $item)

                                <option value="{{$item->OriginName}}">{{$item->OriginName}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="inputbox col-sm-6 py-2">
                                <span class="Txtspan"  id="">Last price</span>
                            <input class="" type="text" id="LastRate" name="Lastprice" >
                        </div>


                    </div>
                    <div class="row">
                        <div class="inputbox col-sm-6 py-2">
                                <span class="Txtspan" id="">Vendor Price</span>
                            <input class="" required type="text" id="VendorPrice" name="VendorPrice" placeholder="Recipient's text" aria-label="Recipient's " aria-describedby="">
                        </div>
                        <div class="inputbox col-sm-6 py-2">
                                <span class="Txtspan" id="">Sale Price</span>
                            <input class="" type="text" name="SalePrice" id="SalePrice" placeholder="Recipient's text" aria-label="Recipient's " aria-describedby="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="inputbox col-sm-6 py-2">
                                <span class="Txtspan" id="">Currency</span>
                            <input class="" type="text" name="Currency" id="Currency" placeholder="Recipient's text" aria-label="Recipient's " aria-describedby="">
                        </div>
                        <div class="inputbox col-sm-6 py-2">

                                <span class="Txtspan" id="">Freight</span>

                            <input class="" type="text" name="Freight" id="Freight" placeholder="Recipient's text" aria-label="Recipient's " aria-describedby="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="inputbox col-sm-12 py-2">
                                <span class="Txtspan" id="">Port</span>

                            <select class="" required name="Port" id="Port">
                                {{-- <option value="" id="Port" selected>Select one</option> --}}
                                @foreach ($PORT as $pitem)

                                <option value="{{$pitem->PortName}}">{{$pitem->PortName}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">

                        <div class="inputbox col-sm-12 py-2">
                            <select class="" name="Category" id="Category">
                                {{-- <option value="" id="Category" selected>Select one</option> --}}
                                @foreach ($Category as $Citem)

                                <option value="{{$Citem->CategoryName}}">{{$Citem->CategoryName}}</option>
                                @endforeach
                            </select>
                            <span class="Txtspan-" id="">Category</span>

                            <input type="hidden" name="CategoryCode" id="CategoryCode">
                        </div>

                    </div>
                    <div class="row">

                        <div class="inputbox col-sm-12 py-2">
                                <span class="Txtspan" id="">Department</span>
                            <select class="" required name="Department" id="Department">
                                {{-- <option value="" id="Department" selected>Select one</option> --}}
                                @foreach ($Department as $Ditem)

                                <option value="{{$Ditem->TypeName}}">{{$Ditem->TypeName}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <button type="submit" name="" id="" class="btn btn-success"  role="button"><i class="fa fa-cloud" aria-hidden="true"></i> Save</button>
                    <a name="" id="" class="btn btn-warning ml-2"  role="button"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                    <a name="" id="" class="btn btn-danger ml-2" href="/" role="button"><i class="fa fa-door-open" aria-hidden="true"></i> Exit</a>

                </div>



            </div>
        </div>






        <div class="col-md-6 container small">
            <div class="card">
                <div class="card-header">
                    <div class="card-tools ">


                        <button type="button" name="headertoggle" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                    <h5 class="card-title">Item Box</h5>
                </div>
                <div class="card-body">
                    <div class="rounded shadow">
                            <div class="inputbox col-sm-12 py-2">
                                    <span class="Txtspan" id="">Vendor</span>
                                <select class="" name="Vendoritembox" id="Vendoritembox">
                                    <option selected>Select one</option>
                                    @foreach ($VenderSetup as $item)
                                    <option value="{{$item->VenderName}}">{{$item->VenderName}}</option>
                                    @endforeach
                                </select>
                            </div>
                        <table class="table table-bordered table-inverse " id="itemtable">
                            <thead class="bg-info">
                                <tr>
                                    <th>ItemCode</th>
                                    <th style="width: 250px">ItemName</th>
                                    <th style="width: 100px">VendorName</th>
                                    <th>Inactive</th>
                                </tr>
                            </thead>
                            <tbody class="itembody">

                            </tbody>
                        </table>
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
.input-group-text{
    font-size:10px;
    width:90px;
}
.form-control{
    font-size:10px;
}
.custom-select{
    font-size:10px;
}
header {
  width: 100%;
  height: 6vh;
  display: flex;
  justify-content: center;
  align-items: center;
  /* margin-bottom: 30px; */
}
header h5 {
  position: absolute;
  width: 70%;
  font-size: 35px;
  font-weight: 600;
  color: transparent;
  background-image: linear-gradient(to right ,#553c9a, #ee4b2b, #00c2cb, #ff7f50, #553c9a);
  -webkit-background-clip: text;
  background-clip: text;
  background-size: 200%;
  background-position: -200%;
  transition: all ease-in-out 2s;
  cursor: pointer;
}
header h5:hover{
  background-position: 200%;
}
    </style>
@stop

@section('js')
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
<script>
$(document).ready( function () {
    $('#itemtable').DataTable({
        scrollY: 590,
        deferRender: true,
    scroller: true,
    paging: false,
    info:false,
    ordering:false,
    searching:false,


    });
} );


// $(document).ready( function () {
    // })
    // Vendoritembox
    $(document).on("change", "#Vendoritembox", function() {
        $vendorname=$(this).val();
        // console.log($vendorname);
        $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
    $.ajax({
    type : 'post',
    url : '{{URL::to('vendorselect')}}',
    data:{'vendorselect':$vendorname},
    success:function(data){
    $('.itembody').html(data);
    // console.log(data);
    }
    });

})
    $(document).on("keyup", "#ProductitemName", function() {
        $productname=$(this).val();
        console.log($productname);
        $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
    $.ajax({
    type : 'post',
    url : '{{URL::to('vendorselect')}}',
    data:{'productname':$productname},
    success:function(data){
    $('.itembody').html(data);
    // console.log(data);
    }
    });

})
    $(document).on("dblclick", "#rowcell", function() {
        $ItemCode=$(this).attr('data-ItemCode');
        $VenderCode=$(this).attr('data-VenderCode');

        console.log($ItemCode);
        $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
    $.ajax({
    type : 'post',
    url : '{{URL::to('populate-itemf')}}',
    data:{'ItemCode':$ItemCode,'VenderCode':$VenderCode},
    success: function($response) {
        $('#Productcode').val($response.Productcode);
        $('#vendorg').val($response.VenderCode);
        // $('#vendorg').text($response.VenderName);
        // $('#Dateq').val($response.Date);
        document.getElementById('Dateq').valueAsDate = new Date($response.Date);
            $('#ProductitemName').val($response.ItemName);
            $('#IMPACode').val($response.IMPAItemCode);
            $('#Remarks').val($response.Remarks);
            $('#PUOM').val($response.UOM);
            // $('#PUOM').text($response.UOM);
    //         $('#uoms').append($('<option selected>', {
    //     value: $response.UOM,
    //     text : $response.UOM
    //   }));
            // $('#LastUpdateDate').val(response.LastDate);
        document.getElementById('LastUpdateDate').valueAsDate = new Date($response.LastDate);

            $('#LastRate').val(ParseFloat($response.LastRate).toFixed(2));
            $('#Orign').val($response.OriginName);
            // $('#Orign').text($response.OriginName);
            $('#VendorPrice').val(ParseFloat($response.VendorPrice).toFixed(2));
            $('#SalePrice').val(ParseFloat($response.FixedPrice).toFixed(2));
            $('#Currency').val($response.Currency);
            $('#Freight').val(ParseFloat($response.Freight).toFixed(2));
            $('#Port').val($response.PortName);
            // $('#Port').text($response.PortName);
            $('#Department').val($response.DepartmentCode);
            // $('#Department').text($response.DepartmentCode);
            $('#CategoryCode').val($response.CategoryCode);
            $categor = $response.Categorybox
            // console.log($categor);
            $('#Category').val($response.CategoryCode);
            // $('#Category').text($categor);
            $('#vendorcode').val($response.VenderCode);
        // $('#email').val(response.email);
    }
    });

})

</script>

@stop


@section('content')
