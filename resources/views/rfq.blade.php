@extends('layouts.app')



@section('title', 'RFQ')

@section('content_header')
@stop

@section('content')
{{-- @if (\Session::has('success')) --}}
<div style="display: none" id="suuc" class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <strong>RFQ has been updated successfully!</strong>
  </div>

{{-- @endif
@if (\Session::has('error')) --}}
<div style="display: none" id="error" class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <strong>RFQ Not updated Check Again!</strong>
  </div>

{{-- @endif --}}
</div>
<?php// echo View::make('partials.importmodal') ?>

<div class="container-fluid p-2 small">

    <?php
    $sum = 0;
    ?>
    @foreach ($rfq as $item)
    <?php
    $totalcost = $item->VendorPrice*$item->Qty;
    $sum+= $totalcost;

    ?>
    @endforeach
    <form name="rfqform" id="rfqform" enctype="multipart/form-data">
        @csrf
        <div class="row">
    <div class="col-lg-12">

        <div class="card collapsed-card mt-3">
            <div  style="background-color:#EEE; " class="card-header">
                <div class="card-tools ">


                    <button type="button" name="headertoggle" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                        </div>
                <div class="row">
                    <div class="col-form-label row ml-2 ">
                       <strong>Quotation # :&nbsp;</strong> <label class="quote_no text-blue" for="quote_no"><input type="number" name="quote_no" class="col-sm-6 form-control form-control-sm" id="quote_no" value="{{$quote_no}}"></label>

                    </div>

                    <div class="col-form-label   ">
                        /&nbsp; <strong>Event # :&nbsp;</strong> <label class="event_no text-blue" id="event_no" for="event_no">{{$eventno}}</label>

                    </div>
                    <div class="col-form-label  ml-5 ">
                        /&nbsp;  <strong>Customer :&nbsp;</strong> <label  class="customer text-blue" for="customer"></label>

                    </div>
                    <div class="col-form-label  ml-5 ">
                        /&nbsp;  <strong>Vessel :&nbsp;</strong> <label class="vessel text-blue" for="vessel"></label>

                    </div>
                    <div class="col-form-label  ml-5 ">
                        /&nbsp;  <strong>Customer Ref # :&nbsp;</strong> <label class="customer_ref_no text-blue" for="customer_ref_no"></label>

                    </div>
                    <div class="col-form-label  ml-5 ">
                        /&nbsp;  <strong>Department Name :&nbsp;</strong> <label class="departmentname text-blue" id="departmentname" for="departmentname">{{$depname}}</label>

                    </div>
                    {{-- <form id="import-form" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="file" hidden class="ml-3" id="file-input" name="file" accept=".xlsx">
                        <button type="submit" hidden id="import-button" class="btn btn-primary">Import</button>
                    </form> --}}
                    &nbsp; <h5 class="text-blue ml-auto">(RFQ)Request For Quote</h5>


    </div>



            </div>
            <div class="card-body">
        <div class="row p-1">





        <div class="col-sm-3">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Department</span>
                </div>

                    <select class="custom-select" name="" id="">
                        <option selected value="{{$depname}}">{{$depname}}</option>

                    </select>

            </div>
        </div>
        <div class="col-sm-1">
            <input class="form-control" type="number" name="depcode" value="{{$depcode}}" placeholder="" aria-label="godwun">
            <input  type="hidden" name="GodownCode" id="GodownCode" value="{{$GodownCode}}" >
        </div>
        <div class="col-md-3">
            <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Vendor</span>
            </div>

                <select class="custom-select" name="" id="">
                    <option selected>Select one</option>
                    @foreach($department as $index => $obj)
                    {

                       <option value="{{$obj->VenderCode}}">{{$obj->VenderName}}</option>
                    }
                    @endforeach
                </select>
        </div>
        </div>


        </div>
        {{-- <div class="row p-1">
            <div class=" ml-auto p-1">
                    <a class="btn btn-default">Fill Vendor History</a>
            </div>
                <div class="p-1 mr-auto">
                    <a  id="" class="btn btn-default">Fill Vendor By Item</a>
            </div>
        </div> --}}
    </div>
    {{-- <div class="col-lg-2 ">
        <div class="form-group">
                <span class="input-group-text">Note</span>
          <textarea class="form-control" name="" id="" rows="3"></textarea>
        </div>
    </div> --}}

    {{-- <div class="col-lg-12">
        <div hidden class="row">
            <div class="col-sm-1">
                <a href=""> <p>R/Click For Notes</p></a>
            </div>
                <div class="col-sm-1">
                   <a name="" id="" class="btn btn-info" href="#" role="button">C</a>
            </div> --}}
            {{-- <div class="col-sm-2">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="">Search :</span>
                    </div>
                    <input class="form-control" type="text" name="" placeholder="Recipient's text" aria-label="Recipient's " aria-describedby="">
                    <a name="" id="" class="btn btn-info" href="#" role="button">GO</a>
                </div>
            </div> --}}
                {{-- <a name="" id="" class="btn btn-info" href="#" role="button">C</a> --}}
            {{-- <div class="col-sm-2">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="">Vendor 1 : </span>
                    </div>
                        <select id="Vendor" class="form-control" name="">
                            <option>Text</option>
                        </select>
                </div>
            </div>
            <a name="" id="" class="btn btn-info" href="#" role="button">GO</a> --}}

        {{-- </div>
    </div> --}}
    </div>
    </div>
<div class="col-lg-12 py-2 ">

    <div class=" rounded shadow">
        <table id="rfqtable" class="table table-sm table-inverse

        table-borderd
        align-middle smfont" >
            <thead class="table-dark">
                {{-- <caption>Table Name</caption> --}}
                <tr>
                    <th>SNo</th>
                    <th>Export</th>
                    <th>SKU#</th>
                    <th style="padding-left: 6rem;padding-right: 6rem">Discription</th>
                    <th>Qty</th>
                    <th>UOM</th>
                    <th>SellPrice</th>
                    <th class="px-5">Vendor1</th>
                    <th>Cost1</th>
                    <th>ExtCost1</th>
                    <th>
                        {{-- <a name="" id="" class="btn btn-info" href="#" role="button">S</a> --}}
                    </th>
                    <th class="px-5">Vendor2</th>
                    <th>Cost2</th>
                    <th>ExtCost2</th>
                    <th>
                        {{-- <a name="" id="" class="btn btn-info" href="#" role="button">S</a> --}}
                    </th>
                    <th class="px-5">Vendor3</th>
                    <th>Cost3</th>
                    <th>ExtCost3</th>
                    <th>
                        {{-- <a name="" id="" class="btn btn-info" href="#" role="button">S</a> --}}
                    </th>
                    <th class="px-5">Vendor4</th>
                    <th>Cost4</th>
                    <th>ExtCost4</th>
                    <th>
                        {{-- <a name="" id="" class="btn btn-info" href="#" role="button">S</a> --}}
                    </th>
                </tr>
                </thead>
                <tbody id="rfqtbody" class="table-group-divider table-hover">
                    @foreach ($rfq as $index => $rfqItem)
                    <tr class="">
                        <input type="hidden" value="{{ $rfqItem->ID }}" name="ID[]">
                        <input type="hidden" value="{{ $rfqItem->VendorCode }}" name="VendorCode[]">
                        <td class="tdwidth" scope="row">
                            <input type="text" readonly class="boderless" name="SNo[]" value="{{ round($rfqItem->SNo, 2) }}" id="">
                        </td>
                        <td>
                            <input type="text" readonly class="boderless" name="IMPAItemCode[]" value="{{ $rfqItem->IMPAItemCode }}" id="">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input checkbox" name="Chk_export[]" checked value="1" id="Chk_export">
                            </div>
                        </td>
                        <td>
                            <input type="text" readonly class="boderless" name="ItemCode[]" value="{{ $rfqItem->ItemCode }}" id="">
                        </td>
                        <td class="s25width">
                            <input type="text" readonly class="boderlessdis" name="ItemName[]" value="{{ $rfqItem->ItemName }}" id="">
                        </td>
                        <td>
                            <input type="text" readonly class="boderless" name="Qty[]" value="{{ round($rfqItem->Qty, 2) }}" id="">
                        </td>
                        <td>
                            <input type="text" readonly class="boderless" name="PUOM[]" value="{{ $rfqItem->PUOM }}" id="">
                        </td>
                        <td>
                            <input type="text" readonly class="boderless" name="SuggestPrice[]" value="{{ round($rfqItem->SuggestPrice, 2) }}" id="">
                        </td>
                        <td class="s2width">
                            <select class="boderlessdis" id="Vendrorname" name="VendorName[]">
                                <option data-vendorcode="{{ $rfqItem->VendorCode1 }}" id="vendornamea{{ $loop->iteration }}" value="{{ $rfqItem->VendorName }}" selected>{{ $rfqItem->VendorName }}</option>
                                @foreach($department as $departmentItem)
                                    <option data-vendorcode="{{ $departmentItem->VenderCode }}" value="{{ $departmentItem->VenderCode }}">{{ $departmentItem->VenderName }}</option>
                                @endforeach
                            </select>
                        </td>

                        <td><input type="text"  class="boderless" name="vendorcosta[]" value="{{round($rfqItem->VendorPrice,2)}}" id="vendorcosta{{ $loop->iteration }}"></td>
                        <td><input type="text"  class="boderless" name="vendorextcosta[]" value="{{round($rfqItem->VendorPrice*$rfqItem->Qty,2)}}" id="vendorextcosta{{ $loop->iteration }}"></td>


                        <td hidden><a name=""  data-vendorname="{{$rfqItem->VendorName}}" data-vendorcost="{{$rfqItem->VendorPrice = round($rfqItem->VendorPrice, 2)}}" data-vendorextcost="{{$rfqItem->VendorPrice*$rfqItem->Qty}}"
                             id="switcha{{ $loop->iteration }}" class="btn btn-info"    role="button">R</a></td>

                             <td><a name="" data-vendorname="{{$rfqItem->Vendor2}}" data-vendorcost="{{$rfqItem->Cost2 = round($rfqItem->Cost2, 2)}}" data-vendorextcost="{{$rfqItem->ExtCost2}}"
                                id="switchb{{ $loop->iteration }}" class="btn btn-info"    role="button">S</a></td>


                        <td class="s2width">
                            <select class="boderlessdis" id="Vendrorname2" name="Vendor2[]" >
                                <option  data-vendorcode="{{$rfqItem->VendorCode2}}" id="vendornameb{{ $loop->iteration }}" value="{{$rfqItem->Vendor2}}" selected>{{$rfqItem->Vendor2}}</option>
                                @foreach($department as $key => $obje)


                                    <option data-vendorcode="{{$obje->VenderCode}}" value="{{$obje->VenderName}}">{{$obje->VenderName}}</option>

                                @endforeach
                            </select>
                        </td>

                        <td><input type="text"  class="boderless" name="Cost2[]" value="{{round($rfqItem->Cost2,2)}}" id="vendorcostb{{ $loop->iteration }}"></td>
                        <td><input type="text"  class="boderless" name="ExtCost2[]" value="{{round($rfqItem->ExtCost2,2)}}" id="vendorextcostb{{ $loop->iteration }}"></td>


                        <td><a name="" data-vendorname="{{$rfqItem->Vendor3}}" data-vendorcost="{{round($rfqItem->Cost3,2)}}" data-vendorextcost="{{$rfqItem->ExtCost3}}"
                            id="switchc{{ $loop->iteration }}" class="btn btn-info"    role="button">S</a></td>


                             <td class="s2width">
                                <select class="boderlessdis" id="Vendrorname3" name="Vendor3[]" >
                                    <option  data-vendorcode="{{$rfqItem->VendorCode3}}"  id="vendornamec{{ $loop->iteration }}" value="{{$rfqItem->Vendor3}}" selected>{{$rfqItem->Vendor3}}</option>
                                    @foreach($department as $index => $objw)


                                        <option data-vendorcode="{{$objw->VenderCode}}" value="{{$objw->VenderName}}">{{$objw->VenderName}}</option>

                                    @endforeach
                                </select>
                            </td>
                        <td><input type="text"  class="boderless" name="Cost3[]" value="{{round($rfqItem->Cost3,2)}}" id="vendorcostc{{ $loop->iteration }}"></td>
                        <td><input type="text"  class="boderless" name="ExtCost3[]" value="{{round($rfqItem->ExtCost3,2)}}" id="vendorextcostc{{ $loop->iteration }}"></td>

                        <td><a name="" data-vendorname="{{$rfqItem->Vendor4}}" data-vendorcost="{{round($rfqItem->Cost4,2)}}" data-vendorextcost="{{round($rfqItem->ExtCost4,2)}}"
                            id="switchd{{ $loop->iteration }}" class="btn btn-info"    role="button">S</a></td>


                             <td class="s2width">
                                <select class="boderlessdis" id="Vendrorname4" name="Vendor4[]" >
                                    <option  data-vendorcode="{{$rfqItem->VendorCode4}}"  id="vendornamed{{ $loop->iteration }}" value="{{$rfqItem->Vendor4}}" selected>{{$rfqItem->Vendor4}}</option>
                                    @foreach($department as $noindex => $objq)


                                        <option data-vendorcode="{{$objq->VenderCode}}" value="{{$objq->VenderName}}">{{$objq->VenderName}}</option>

                                    @endforeach
                                </select>
                            </td>
                             <td><input type="text"  class="boderless" name="Cost4[]" value="{{round($rfqItem->Cost4,2)}}" id="vendorcostd{{ $loop->iteration }}"></td>
                             <td><input type="text"  class="boderless" name="ExtCost4[]" value="{{round($rfqItem->ExtCost4,2)}}" id="vendorextcostd{{ $loop->iteration }}"></td>





                        </tr>

                    @endforeach
                </tbody>

        </table>
    </div>


</div>

<div class="col-lg-12" >
    <div class="row">
    <div class="col-lg-4">
        <div class="row py-1">
            <a name="" id="selectAll" class="btn btn-info form-control smfont col-sm-2 mx-1" role="button">Select</a>
            <a name="" id="unselectall"  class="btn btn-info form-control smfont col-sm-2 mx-1"  role="button">UnSelect</a>
            <a name="" id=""  class="btn btn-info form-control smfont col-sm-2 mx-1" href="#" role="button">Export</a>
            <a name="" id="" class="btn btn-info form-control smfont col-sm-2 mx-1" data-toggle="modal"  data-target="#sendmail" href="#" role="button">Export/Send</a>
        </div>
        <div class="row py-1">
            <a name="" id="" class="btn btn-info form-control smfont col-sm-2 mx-1" href="#" role="button">Del Dupl IMPA</a>
            <a name="" id="" class="btn btn-info form-control smfont col-sm-2 mx-1" href="#" role="button">Delete Duplicate</a>
            <a name="" id="" class="btn btn-info form-control smfont col-sm-2 mx-1" href="#" role="button">V.Item Setup</a>
            <a name="" id="" class="btn btn-info form-control smfont col-sm-2 mx-1" href="#" role="button">Product</a>
        </div>
        <div class="row py-1">
            <a name="" id="" class="btn btn-info form-control smfont col-sm-2 mx-1" href="#" role="button">Vendor Rate</a>
            <a name="" id="" class="btn btn-info form-control smfont col-sm-2 mx-1" href="#" role="button">Savegrid</a>
            <a name="" id="" class="btn btn-info form-control smfont col-sm-2 mx-1" data-toggle="modal"  data-target="#import" href="#" role="button">Import</a>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="row py-1">
            <a name="" id="" class="btn btn-info form-control smfont col-sm-2 mx-1" href="#" role="button">Add Vendor</a>
            <button type="submit" name="" id="" class="btn btn-info form-control smfont col-sm-2 mx-1"  role="button">Save All</button>


            <div class="form-check form-check-inline">
                <label class="form-check-label  mx-1">
                    <input class="form-check-input " type="checkbox"  name="Chk" id="Chk" checked autocomplete="off" value=""> Sent To Vendor
                </label>
            </div>
        </div>
            <div class="row py-1">
            <a name="" id="" class="btn btn-info form-control smfont col-sm-2 mx-1" href="#" role="button">lowest Cost</a>
            <a name="" id="" class="btn btn-info form-control smfont col-sm-2 mx-1" href="{{ url()->previous() }}" role="button">Close</a>

            <div class="form-check form-check-inline">
                <label class="form-check-label  mx-1">
                    <input class="form-check-input " type="checkbox"  name="Costed" id="Costed" checked autocomplete="off" value=""> Costed
                </label>
            </div>
        </div>
        {{-- </div> --}}
        <div class="row py-1">

            <a name="" id="" class="btn btn-info form-control smfont col-sm-4 ml-1" data-toggle="modal"  data-target="#CopyVendor" role="button">Copy Vendor</a>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="row py-1">
            {{-- <div class="col-sm-3">
                <label for="totalcost"></label>
            </div>
                <div class="col-sm-1">
                    <input type="text" readonly class="boderless-w-width" name="totalcost" value="<?php// echo $sum;?>" id="">
        </div> --}}
<div class="input-group col-sm-6">
    <div class="input-group-prepend">
        <span class="input-group-text" id="">Total Cost : </span>
    </div>
                    <input type="text" readonly class="form-control" name="totalcost" value="<?php echo $sum;?>" id="totalcost">
</div>


        </div>
        <div class="row py-1">
            <a name="" id="" class="btn btn-info form-control smfont col-sm-2" data-toggle="modal" data-target="#sendmail" role="button">V-Plat SEND</a>

        <div class="input-group col-sm-6">
            <div class="input-group-prepend">
                <span class="input-group-text" id="">Req.Date :</span>
            </div>
            <input type="date" class="form-control" name="Reqdate" id="Reqdate">
        </div>


        </div>
        <div class="row py-1">

            <a name="" id="" class="btn btn-info form-control smfont col-sm-2" href="#" role="button">V-Plat Rcvd</a>

         <div class="input-group col-sm-6">
            <div class="input-group-prepend">
                <span class="input-group-text" id="">Req.time :</span>
            </div>
            <input type="time" class="form-control" name="reqtime" id="reqtime">
        </div>

        </div>
        <div class="row py-1">

            <a name="" id="" class="btn btn-info form-control smfont col-sm-2" href="/Vplat-Quote?eventno={{$eventno}}&quoteno={{$quote_no}}&BranchCode={{$BranchCode}}&VendorCode=39" role="button">V-Plat View</a>
            <div class="input-group col-sm-6">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="">ETA :</span>
                </div>
            <input type="date" class="form-control" name="eta" id="eta">
            </div>

        </div>
    </div>
    {{-- <div style="width:10%">
        <div class="row py-1">
            <div class="col-sm-2">
                <a name="" id="" class="btn btn-info form-control" href="#" role="button">Add Vendor</a>
            </div>
            <div class="col-sm-2">
            <a name="" id="" class="btn btn-info form-control" href="#" role="button">Save All</a>
        </div>
        <div class="btn-group" data-toggle="buttons">
            <label class="btn btn-info active">
                <input type="checkbox" name="" id=""  autocomplete="off">
            </label>
        </div>
        Sent To Vendor
        </div>
        <div class="row py-1">
            <div class="col-sm-2">
        <a name="" id="" class="btn btn-info form-control" href="#" role="button">Copy Vendor</a>
        <a name="" id="" class="btn btn-info" href="#" role="button">Save All</a>
    </div>
    </div>
    </div>
    <div style="width:120px">
        <div class="row py-1">
        <a name="" id="" class="btn btn-info form-control" href="#" role="button">Save All</a>
        </div>
        <div class="row py-1">
        <a name="" id="" class="btn btn-info form-control" href="#" role="button">Close</a>

        </div>
</div>
<div style="width: 100px">
<div class="py-1">
    <div class="btn-group" data-toggle="buttons">
        <label class="btn btn-info active">
            <input type="checkbox" name="" id=""  autocomplete="off">
        </label>
    </div>
    Sent To Vendor
        <div class="btn-group" data-toggle="buttons">
        <label class="btn btn-info">
            <input type="checkbox" name="" id="" autocomplete="off">
        </label>
        Costed

    </div>
</div>
</div> --}}
</div>
</div>

</div>

</form>

















<!-- import Modal template  -->

<div class="modal fade bd-example-modal-lg" id="import"  tabindex="-1" role="dialog" aria-labelledby="searchrmod" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " style="max-width:800px;" role="document">
      <div  class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Import</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body gc-modal-body">
         <div class="container-fluid">
          <div class="row">
            <div class=" mx-auto">
            <h4>GLOBAL SHIP SERVICES</h4>
            </div>
          </div>
          <div class="col-sm-12 py-2">
          <textarea name="" id="" class="form-control" cols="235" rows="15"></textarea>
          </div>
          <div class="col-sm-12 py-2">
          <div class="row ml-1 py-2">
          <button type="button" class="btn btn-info form-control col-sm-2" ><i class="fa fa-search" aria-hidden="true"></i> Browse</button>
          <div class="col-sm-3">
          <input type="text" class="form-control" name="search" id="">
        </div>
          <button type="button" class="btn btn-info form-control col-sm-2" ><i class="fa fa-arrow-left "></i> Clear</button>

        </div>
        <div class="row py-2">

            <div class="input-group col-sm-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" style="width:130px" id="my-addon">Quantity COL :</span>
                </div>
                <input class="form-control" type="text" name="" value="B" placeholder="" >
            </div>
            <div class="input-group col-sm-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" style="width:130px"  id="my-addon">Stating Row :</span>
                </div>
                <input class="form-control" type="text" name="" value="14" placeholder="" >
            </div>
            <div class="input-group col-sm-3">
                <div class="input-group-prepend">
                    <span class="input-group-text form-control"  id="my-addon">Vendor :</span>
                </div>
                <select class="custom-select" name="" id="">
                    <option selected>Select one</option>
                    @foreach($department as $index => $obj)
                    {

                       <option value="{{$obj->VenderCode}}">{{$obj->VenderName}}</option>
                    }
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row py-2">
            <div class="input-group col-sm-3">
                <div class="input-group-prepend">
                    <span class="input-group-text form-control" style="width:130px" id="my-addon">Product Name Col :</span>
                </div>
                <input class="form-control" type="text" name="" value="E">
            </div>
            <div class="input-group col-sm-3">
                <div class="input-group-prepend">
                    <span class="input-group-text form-control" style="width:130px" id="my-addon">UOM :</span>
                </div>
                <input class="form-control" type="text" name="" value="C">
            </div>
        </div>
        <div class="row py-2">
            <div class="input-group col-sm-3">
                <div class="input-group-prepend">
                    <span class="input-group-text form-control" style="width:130px" id="my-addon">Price Col :</span>
                </div>
                <input class="form-control" type="text" name="" value="H">
            </div>
            <div class="input-group col-sm-3">
                <div class="input-group-prepend">
                    <span class="input-group-text form-control"  style="width:130px" id="my-addon">IMPA/ISSA Code :</span>
                </div>
                <input class="form-control" type="text" name="" value="D">
            </div>
        </div>
        <div class="row py-2">
            <div class="input-group col-sm-3">
                <div class="input-group-prepend">
                    <span class="input-group-text form-control"  style="width:130px" id="my-addon">Vendor Notes :</span>
                </div>
                <input class="form-control" type="text" name="" value="G">
            </div>
           <div class="col-sm-2 text-right">
            <p>Total : 0  0 </p>
           </div>
        </div>
        </div>


         </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" >Import</button>
          <button type="button" class="btn btn-success" >Import By IMPA</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-arrow-alt-circle-left "></i> Close</button>

        </div>
      </div>
    </div>
  </div>

        <!-- /.import modal -->

<div id="vendorsearch" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog " style="max-width:1400px;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Vendor Search</h5>
                <button class="close" data-dismiss="modal" data-toggle="modal" data-target="#CopyVendor" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
<div class="col-sm-12">
    <div class="row">
        {{-- <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="">Search :</span>
            </div>
            <input class="form-control" type="text" name="TxtSearch" id="TxtSearch" >
        </div> --}}
    </div>
    <div class="row py-2">
        @php
            $Vendortabel= DB::table('VenderSetup')->select([
                'VenderCode',
                'YourCode',
                'VenderName',
                'Address',
                'EmailAddress',
                'ActCode',
            ])->where('ChkInactive','<>','1')->orderBy('VenderName')->get();
        @endphp
        <div class="rounded shadow">
        <table  id="vendorsearchtable" class="table table-sm table-inverse

        table-borderd
        align-middle smfont" >
            <thead class="table-dark">
                <tr>
                    <th>Code</th>
                    <th>VendorCode</th>
                    <th style="padding-left: 6rem;padding-right: 6rem;">Name</th>
                    <th style="padding-left: 6rem;padding-right: 6rem;">Address</th>
                    <th style="padding-left: 6rem;padding-right: 6rem;">Email</th>
                    <th>ActCode</th>
                </tr>
            </thead>
            <tbody id="vendorsearchbody">
                @foreach ($Vendortabel as $items)
                <tr>
                    <td>{{$items->YourCode}}</td>
                    <td>{{$items->VenderCode}}</td>
                    <td>{{$items->VenderName}}</td>
                    <td>{{$items->Address}}</td>
                    <td>{{$items->EmailAddress}}</td>
                    <td>{{$items->ActCode}}</td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    </div>
</div>
            </div>
            <div class="modal-footer">
                <button type="button" id="searvhclose" class="btn btn-secondary" data-toggle="modal" data-target="#CopyVendor" data-dismiss="modal"><i class="fa fa-arrow-alt-circle-left "></i> Close</button>

              </div>
        </div>
    </div>
</div>
<!-- CopyVendor modal -->

<div id="CopyVendor" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="CopyVendor" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered"  style="max-width:900px;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="CopyVendor-title">Copy Vendor</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-sm-12">
                    <div class="row py-1">
                        <input class="form-control col-sm-1" type="text" id="TxtVendorCodeC1" name="TxtVendorCodeC1" >
                        <div class="input-group col-sm-5">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="">Vendor 1 :</span>
                            </div>
                            <input class="form-control" type="text" id="CmbVendorNameC1" name="CmbVendorNameC1" >
                        </div>

                        <a name="" id="" class="btn btn-default col-sm-1" data-toggle="modal" data-target="#vendorsearch" data-dismiss="modal" role="button"><i class="fa fa-search " aria-hidden="true"></i></a>

                        <div class="col-sm-2"></div>
                        <div class="input-group col-sm-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="">SNO From :</span>
                            </div>
                            <input class="form-control" type="number" id="TxtSnoC1From" name="TxtSnoC1From" >
                        </div>
                    </div>
                    <div class="row py-1">
                        <input class="form-control col-sm-1" type="text" id="TxtVendorCodeC2" name="TxtVendorCodeC2" >
                        <div class="input-group col-sm-5">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="">Vendor 2 :</span>
                            </div>
                            <input class="form-control" type="text" id="CmbVendorNameC2" name="CmbVendorNameC2" >
                        </div>
                        <a name="" id="" class="btn btn-default col-sm-1" data-toggle="modal" data-target="#vendorsearch" data-dismiss="modal" role="button"><i class="fa fa-search " aria-hidden="true"></i></a>

                        <div class="col-sm-2"></div>
                        <div class="input-group col-sm-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="">To :</span>
                            </div>
                            <input class="form-control" type="number" id="TxtSnoC2To" name="TxtSnoC2To" >
                        </div>
                    </div>
                    <div class="row py-1">
                        <input class="form-control col-sm-1" type="text" id="TxtVendorCodeC3" name="TxtVendorCodeC3" >
                        <div class="input-group col-sm-5">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="">Vendor 3 :</span>
                            </div>
                            <input class="form-control" type="text" id="CmbVendorNameC3" name="CmbVendorNameC3" >
                        </div>
                        <a name="" id="" class="btn btn-default col-sm-1" data-toggle="modal" data-target="#vendorsearch" data-dismiss="modal" role="button"><i class="fa fa-search " aria-hidden="true"></i></a>


                    </div>
                    <div class="row py-1">
                        <input class="form-control col-sm-1" type="text" id="TxtVendorCodeC4" name="TxtVendorCodeC4" >
                        <div class="input-group col-sm-5">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="">Vendor 4 :</span>
                            </div>
                            <input class="form-control" type="text" id="CmbVendorNameC4" name="CmbVendorNameC4" >
                        </div>
                        <a name="" id="" class="btn btn-default col-sm-1" data-toggle="modal" data-target="#vendorsearch" data-dismiss="modal" role="button"><i class="fa fa-search " aria-hidden="true"></i></a>


                    </div>
                    <div class="row py-1">
                        <input class="form-control col-sm-1" type="text" id="TxtVendorCodeC5" name="TxtVendorCodeC5" >
                        <div class="input-group col-sm-5">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="">Vendor 5 :</span>
                            </div>
                            <input class="form-control" type="text" id="CmbVendorNameC5" name="CmbVendorNameC5" >
                        </div>
                        <a name="" id="" class="btn btn-default col-sm-1" data-toggle="modal" data-target="#vendorsearch" data-dismiss="modal" role="button"><i class="fa fa-search " aria-hidden="true"></i></a>


                    </div>
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="copybtn" class="btn btn-success" ><i class="fa fa-calendar" aria-hidden="true"></i> Copy  &nbsp;<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
                <button type="button" id="Copyclose" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-arrow-alt-circle-left "></i> Close</button>

              </div>
        </div>
    </div>
</div>


<!-- /CopyVendor modal -->

<!-- send mail Modal   -->

<div class="modal fade bd-example-modal-sm" id="sendmail"  tabindex="-1" role="dialog" aria-labelledby="searchrmod" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " style="max-width:1000px" role="document">
      <div  class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">SendMail</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body gc-modal-body">
         <div class="col-sm-12 ">

          <div hidden class="row py-1">
          <input type="text" name="" id="" class="form-control col-sm-4 mx-auto ">
          </div>
          <div class="row py-2">
            <div class="btn-group mx-auto" data-toggle="buttons">
                <label class="btn btn-default ">
                  <input type="radio" name="options" id="radLocalEmail" autocomplete="off"> Local Email
                </label>
                <label class="btn btn-default active">
                  <input type="radio" name="options" id="radvendorEmail" autocomplete="off" checked > vendor Email
                </label>
              </div>

          </div>


        <div class="row py-2">

            {{-- <div class="input-group col-sm-6">
                <div class="input-group-prepend">
                    <span class="input-group-text" >Email Address :</span>
                </div>
                <input class="form-control" type="text" name="" value="" placeholder="" >
            </div> --}}
            <div  class="input-group col-sm-6 ml-auto">

                <input class="form-control" readonly type="text" name="vendornameselect" id="vendornameselect">
            </div>

            <div class="input-group col-sm-4">
                <div class="input-group-prepend">
                    <span class="input-group-text form-control"  id="">Vendor :</span>
                </div>
                <select class="custom-select" name="vendorchanger" id="vendorchanger">
                       <option  value="">selectOne</option>
                       <option value="Vendor1">Vendor1</option>
                       <option value="Vendor2">Vendor2</option>
                       <option value="Vendor3">Vendor3</option>
                       <option value="Vendor4">Vendor4</option>

                </select>
            </div>
            <div class="col-sm-2 mr-auto">
                <div class="btn-group" data-toggle="buttons">
                    <label class="btn btn-info active">
                        <input type="checkbox" name="" id=""  autocomplete="off">
                    </label>
                </div>
                All
            </div>
        </div>
        <div hidden class="row py-2">
            <div class="input-group col-sm-1">

                <input class="form-control" type="hidden" name="selectvendorcode" id="selectvendorcode">
            </div>

        </div>
        <div class="row py-2">
            <div hidden class="input-group col-sm-1">

                <input class="form-control" type="text" name="" value="">
            </div>

            <div class="input-group col-sm-6">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="">Email Address</span>
                </div>
                <input class="form-control" type="text" name="vendornemail" id="vendornemail">
            </div>

        </div>


        </div>
        </div>
        <div class="modal-footer">
          <button type="button" id="V-PlatSEND" class="btn btn-success" ><i class="fa fa-calendar" aria-hidden="true"></i> SendMail<i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-arrow-alt-circle-left "></i> Close</button>

        </div>
      </div>
    </div>
  </div>

        <!-- /.send mail modal -->


</div>
<!-- /.container -->

<script>

                                </script>

@stop

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">


    <style>

header {
  width: 100%;
  height: 4vh;
  display: flex;
  justify-content: center;
  align-items: center;
  margin: 0;
}
header h5 {
  position: absolute;
  width: 55%;
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
        .boderless{
            border: none;
border-width: 0;
box-shadow: none;
background: none;
width:38px;
        }
        .boderless:focus {outline:none!important;}
        .boderless-w-width{
            border: none;
border-width: 0;
box-shadow: none;
background: none;
        }
        .boderless-w-width:focus {outline:none!important;}
        .boderlessdis{
            border: none;
border-width: 0;
box-shadow: none;
background: none;
width:100%;
        }
        .boderlessdis:focus {outline:none!important;}
        .s25width{
            width: 25%;
        }
        .s2width{
            width: 10%;
        }
.tdwidth{
    width: 2%;
}
        .dhig{
            max-height: 450px;
             min-height: 250px;
        }
        /* .font-size{
            font-size: 0.7rem;
        } */
        .smfont{
            font-size: 0.7rem;
        }
        .chight{
            height: 50px;
        }
/* .table-fixed tbody {
    height: 300px;
    overflow-y: auto;
    width: 100%;
} */

/* .table-fixed thead,
.table-fixed tbody,
.table-fixed tr,
.table-fixed td,
.table-fixed th {
    display: block;
}

.table-fixed tbody td,
.table-fixed tbody th,
.table-fixed thead > tr > th {
    float: left;
    position: relative;

    &::after {
        content: '';
        clear: both;
        display: block;
    }
} */
    </style>
@stop

@section('js')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>

    <script>
$(document).ready( function () {
    $('#rfqtable').DataTable({
        scrollY:        400,
    // deferRender:    true,
    scroller:       true,
    // responsive: true,
    scrollX: true,
    ordering: false,
    paging: false,



    });
    $('#vendorsearchtable').DataTable({
    scrollY:        500,
    scroller:       true,
    // responsive: true,
    scrollX: true,
    paging: false,
    ordering: false,



    });



    $('#rfqform').submit(function (e) {
            e.preventDefault();

            var formData = new FormData(this);
        var quote_no = $('#quote_no').val();
        var event_no = $('#event_no').text();
        var depcode = $('#depcode').val();
        var GodownCode = $('#GodownCode').val();
        var totalcost = $('#totalcost').val();
        var Reqdate = $('#Reqdate').val();
        var reqtime = $('#reqtime').val();
        var eta = $('#eta').val();

            formData.append("quote_no", quote_no);
            formData.append("event_no", event_no);
            formData.append("depcode", depcode);
            formData.append("GodownCode", GodownCode);
            formData.append("totalcost", totalcost);
            formData.append("Reqdate", Reqdate);
            formData.append("reqtime", reqtime);
            formData.append("eta", eta);
            $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
            $.ajax({
                url: '/rfq/store/'+{{$quote_no}},
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,


    beforeSend: function() {
        // Show the overlay and spinner before sending the request
        $('.overlay').show();
    },
                success: function (response) {
                    if(response.error == 'false'){
                        $('#suuc').show();
                    }else{

                        $('#error').show();
                    }
                    // displayImportedData(response);
                },
                complete: function() {
        // Hide the overlay and spinner after the request is complete
        $('.overlay').hide();
    }
            });
        });

    if ($("#radvendorEmail").is(":checked")) {
        $('#vendornemail').prop('readonly', true);
    }else{
        $('#vendornemail').prop('readonly', false);
    }
    $('#radvendorEmail').click(function(e){
        if ($("#radvendorEmail").is(":checked")) {
        $('#vendornemail').prop('readonly', true);
    }else{
        $('#vendornemail').prop('readonly', false);
    }
    });
    $('#radLocalEmail').click(function(e){
        if ($("#radvendorEmail").is(":checked")) {
        $('#vendornemail').prop('readonly', true);
    }else{
        $('#vendornemail').prop('readonly', false);
    }
    });
$('#vendorchanger').on('change', function() {
    let vendor = (this.value);
     console.log(this);
     if (vendor == 'Vendor1') {
         let gvendorname = $('#Vendrorname option:selected').text();
         console.log(gvendorname);
         $('#vendornameselect').val(gvendorname);
    // let selectedOption = $('#Vendrorname option:eq('+$('#Vendrorname').prop('selectedIndex')+')');
    // let vendorcode = selectedOption.attr('data-vendorcode');
    // console.log(vendorcode);
    let vendorcode = $('#Vendrorname option:selected').data('vendorcode');
    $('#selectvendorcode').val(vendorcode);
console.log(vendorcode);



    }
    if (vendor == 'Vendor2') {
        let gvendorname = $('#Vendrorname2').val();
        console.log(gvendorname);
        $('#vendornameselect').val(gvendorname);

    }
    if (vendor == 'Vendor3') {
        let gvendorname = $('#Vendrorname3').val();
        console.log(gvendorname);
        $('#vendornameselect').val(gvendorname);

    }
    if (vendor == 'Vendor4') {
        let gvendorname = $('#Vendrorname4').val();
        console.log(gvendorname);
        $('#vendornameselect').val(gvendorname);

    }
});

$('#V-PlatSEND').click(function(e){
    let eventno = '{{$eventno}}';
    let quoteno = '{{$quote_no}}';
    let VenderCode = $('#selectvendorcode').val();
    let DepartmentName = '{{$depname}}';
    let DepartmentCode = '{{$depcode}}';
    let VendorName = $('#vendornameselect').val();
    // let PortCode = $request->PortCode;
    // let PortName = $request->PortName;
    // let ETADate = $request->ETADate;
    // let RequiredDate = $request->RequiredDate;
    // let RequiredTime = $request->RequiredTime;
    // let CustomerRefNo = $request->CustomerRefNo;
    $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
    $.ajax({
    type : 'post',
    url : '{{URL::to('vplatsend')}}',
    data:{
        quoteno,
        eventno,
        VenderCode,
        DepartmentName,
        DepartmentCode,
        VendorName,

},
beforeSend: function() {
        // Show the overlay and spinner before sending the request
        $('.overlay').show();
    },
    success:function(response){
console.log(response);
    },
    error: function(xhr, status, error) {
        // Handle error
    },
    complete: function() {
        // Hide the overlay and spinner after the request is complete
        $('.overlay').hide();
    }
    });
});

    const selectAllButton = document.getElementById("selectAll");
const unselectallButton = document.getElementById("unselectall");

selectAllButton.addEventListener("click", function() {
  const checkboxes = document.querySelectorAll(".checkbox");
  checkboxes.forEach(function(checkbox) {
    checkbox.checked = true;
  });
});
unselectallButton.addEventListener("click", function() {
  const checkboxes = document.querySelectorAll(".checkbox");
  checkboxes.forEach(function(checkbox) {
    checkbox.checked = false;
  });
});


$('#copybtn').click(function(e){
    // alert('check');


     var snofrom = $('#TxtSnoC1From').val();
     var snoto = $('#TxtSnoC2To').val();
    snofrom = snofrom-1;

console.log(snofrom);
if((snofrom) !== '' && (snoto) !== ''){
        // console.log(snofrom);
        // alert('yes sno');

        if($('#TxtVendorCodeC1').val() > 0 ){
           var v1 = $('#CmbVendorNameC1').val();
           var cmb1 = $('#vendornamea1').val();
            let table = document.getElementById('rfqtbody');
            let rows = table.rows;
            // console.log(rows);
            for (let i = snofrom; i < snoto; i++) {
            // console.log('Loop iteration:', i);

            let cells = rows[i].cells;
            let vendorSelect = cells[7].querySelector('select[name="VendorName[]"]');
            // console.log('Selected element:', vendorSelect);

            let vendorOption = vendorSelect.querySelector(`option[value="${v1}"]`);
            // console.log('Selected option:', vendorOption);

            if (vendorOption) {
                vendorSelect.value = v1;
            }
            }


            // alert('yes copy');
        }

        if($('#TxtVendorCodeC2').val() > 0 ){
            var v2 = $('#CmbVendorNameC2').val();
            let table = document.getElementById('rfqtbody');
            let rows = table.rows;
            // console.log(rows);
            for (let i = snofrom; i < snoto; i++) {
            // console.log('Loop iteration:', i);

            let cells = rows[i].cells;
            let vendorSelect = cells[12].querySelector('select[name="Vendor2[]"]');
            // console.log('Selected element:', vendorSelect);

            let vendorOption = vendorSelect.querySelector(`option[value="${v2}"]`);
            // console.log('Selected option:', vendorOption);

            if (vendorOption) {
                vendorSelect.value = v2;
            }
            }
            // alert('yes copy');
        }

        if($('#TxtVendorCodeC3').val() > 0 ){
            var v3 = $('#CmbVendorNameC3').val();
            let table = document.getElementById('rfqtbody');
            let rows = table.rows;
            // console.log(rows);
            for (let i = snofrom; i < snoto; i++) {
            // console.log('Loop iteration:', i);

            let cells = rows[i].cells;
            let vendorSelect = cells[16].querySelector('select[name="Vendor3[]"]');
            // console.log('Selected element:', vendorSelect);

            let vendorOption = vendorSelect.querySelector(`option[value="${v3}"]`);
            // console.log('Selected option:', vendorOption);

            if (vendorOption) {
                vendorSelect.value = v3;
            }
            }
            // alert('yes copy');
        }

        if($('#TxtVendorCodeC4').val() > 0 ){
            var v4 = $('#CmbVendorNameC4').val();
            let table = document.getElementById('rfqtbody');
            let rows = table.rows;
            // console.log(rows);
            for (let i = snofrom; i < snoto; i++) {
            // console.log('Loop iteration:', i);

            let cells = rows[i].cells;
            let vendorSelect = cells[20].querySelector('select[name="Vendor4[]"]');
            // console.log('Selected element:', vendorSelect);

            let vendorOption = vendorSelect.querySelector(`option[value="${v4}"]`);
            // console.log('Selected option:', vendorOption);

            if (vendorOption) {
                vendorSelect.value = v4;
            }
            }
            // alert('yes copy');
        }

        if($('#TxtVendorCodeC5').val() > 0 ){
            alert('yes copy');
        }
    }
    $('#Copyclose').click();

});

const trs = document.querySelectorAll('#vendorsearchtable tbody tr');

// Add a dblclick event listener to each tr
trs.forEach(tr => {
  tr.addEventListener('dblclick', () => {
    // Get the values from the td elements in the double-clicked tr
    const code = tr.querySelector('td:nth-child(1)').textContent.trim();
    const vendorcode = tr.querySelector('td:nth-child(2)').textContent.trim();
    const name = tr.querySelector('td:nth-child(3)').textContent.trim();
    const address = tr.querySelector('td:nth-child(4)').textContent.trim();
    const email = tr.querySelector('td:nth-child(5)').textContent.trim();
    const actcode = tr.querySelector('td:nth-child(6)').textContent.trim();


    // Put the values into the specified fields
    document.querySelector('#TxtVendorCodeC1').value = vendorcode;
    document.querySelector('#CmbVendorNameC1').value = name;
    $('#searvhclose').click();

});
});

// $("#TxtSearch").on("keydown", function(event) {
//   if (event.which === 13) {
//     let value = $('#TxtSearch').val();
// //  $.ajaxSetup({
// // headers: {
// // 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
// // }
// // });
// // $.ajax({
// // type : 'post',
// // url : '{{URL::to('Vendersearchmod')}}',
// // data:{
// //     value,
// // },
// // success:function($response){
// // }
// //         });

//   }
// });



} );

        <?php
        $sum = 0;
        $counter=0;
        ?>
        @foreach ($rfq as $item)
        <?php
        $counter=$counter+1;
        $totalcost = $item->VendorPrice*$item->Qty;
        $sum+= $totalcost;

        ?>

        $(document).on('click', '#switcha<?php echo $counter;?>', function(){
            $vendorname = $(this).attr('data-vendorname');
            $vendorcost = $(this).attr('data-vendorcost');
            $vendorextcost = $(this).attr('data-vendorextcost');
            $vendorname2 = $('#switchb<?php echo $counter;?>').attr('data-vendorname');
            $vendorcost2 = $('#switchb<?php echo $counter;?>').attr('data-vendorcost');
            $vendorextcost2 = $('#switchb<?php echo $counter;?>').attr('data-vendorextcost');
            $vendorname3 = $('#switchc<?php echo $counter;?>').attr('data-vendorname');
            $vendorcost3 = $('#switchc<?php echo $counter;?>').attr('data-vendorcost');
            $vendorextcost3 = $('#switchc<?php echo $counter;?>').attr('data-vendorextcost');
            $vendorname4 = $('#switchd<?php echo $counter;?>').attr('data-vendorname');
            $vendorcost4 = $('#switchd<?php echo $counter;?>').attr('data-vendorcost');
            $vendorextcost4 = $('#switchd<?php echo $counter;?>').attr('data-vendorextcost');

            document.getElementById('vendornamea<?php echo $counter;?>').value = $vendorname;
            document.getElementById('vendorcosta<?php echo $counter;?>').value = $vendorcost;
            document.getElementById('vendorextcosta<?php echo $counter;?>').value = $vendorextcost;
            document.getElementById('vendornameb<?php echo $counter;?>').value = $vendorname2;
            document.getElementById('vendorcostb<?php echo $counter;?>').value = $vendorcost2;
            document.getElementById('vendorextcostb<?php echo $counter;?>').value = $vendorextcost2;
            document.getElementById('vendornamec<?php echo $counter;?>').value = $vendorname3;
            document.getElementById('vendorcostc<?php echo $counter;?>').value = $vendorcost3;
            document.getElementById('vendorextcostc<?php echo $counter;?>').value = $vendorextcost3;
            document.getElementById('vendornamed<?php echo $counter;?>').value = $vendorname4;
            document.getElementById('vendorcostd<?php echo $counter;?>').value = $vendorcost4;
            document.getElementById('vendorextcostd<?php echo $counter;?>').value = $vendorextcost4;
        });
        $(document).on('click', '#switchb<?php echo $counter;?>', function(){

            $vendorname2 = document.getElementById('vendornameb<?php echo $counter;?>').value;
            $vendornamea =document.getElementById('vendornamea<?php echo $counter;?>').value;
            $vendorcost2 = document.getElementById('vendorcostb<?php echo $counter;?>').value;
            $vendorcosta = document.getElementById('vendorcosta<?php echo $counter;?>').value;
            $vendorextcost2 = document.getElementById('vendorextcostb<?php echo $counter;?>').value;
            $vendorextcosta = document.getElementById('vendorextcosta<?php echo $counter;?>').value;

            document.getElementById('vendornameb<?php echo $counter;?>').value = $vendornamea;
            document.getElementById('vendornameb<?php echo $counter;?>').innerHTML = $vendornamea;
            document.getElementById('vendornamea<?php echo $counter;?>').value = $vendorname2;
            document.getElementById('vendornamea<?php echo $counter;?>').innerHTML = $vendorname2;
            document.getElementById('vendorcostb<?php echo $counter;?>').value = $vendorcosta;
            document.getElementById('vendorcosta<?php echo $counter;?>').value = $vendorcost2;
            document.getElementById('vendorextcostb<?php echo $counter;?>').value = $vendorextcosta;
            document.getElementById('vendorextcosta<?php echo $counter;?>').value = $vendorextcost2;
        });
        $(document).on('click', '#switchc<?php echo $counter;?>', function(){

            $vendorname3 = document.getElementById('vendornamec<?php echo $counter;?>').value;
            $vendornamea =document.getElementById('vendornamea<?php echo $counter;?>').value;
            $vendorcost3 = document.getElementById('vendorcostc<?php echo $counter;?>').value;
            $vendorcosta = document.getElementById('vendorcosta<?php echo $counter;?>').value;
            $vendorextcost3 = document.getElementById('vendorextcostc<?php echo $counter;?>').value;
            $vendorextcosta = document.getElementById('vendorextcosta<?php echo $counter;?>').value;

            document.getElementById('vendornamec<?php echo $counter;?>').innerHTML = $vendornamea;
            document.getElementById('vendornamea<?php echo $counter;?>').innerHTML = $vendorname3;
            document.getElementById('vendornamec<?php echo $counter;?>').value = $vendornamea;
            document.getElementById('vendornamea<?php echo $counter;?>').value = $vendorname3;
            document.getElementById('vendorcostc<?php echo $counter;?>').value = $vendorcosta;
            document.getElementById('vendorcosta<?php echo $counter;?>').value = $vendorcost3;
            document.getElementById('vendorextcostc<?php echo $counter;?>').value = $vendorextcosta;
            document.getElementById('vendorextcosta<?php echo $counter;?>').value = $vendorextcost3;
        });
        $(document).on('click', '#switchd<?php echo $counter;?>', function(){

            $vendorname4 = document.getElementById('vendornamed<?php echo $counter;?>').value;
            $vendornamea =document.getElementById('vendornamea<?php echo $counter;?>').value;
            $vendorcost4 = document.getElementById('vendorcostd<?php echo $counter;?>').value;
            $vendorcosta = document.getElementById('vendorcosta<?php echo $counter;?>').value;
            $vendorextcost4 = document.getElementById('vendorextcostd<?php echo $counter;?>').value;
            $vendorextcosta = document.getElementById('vendorextcosta<?php echo $counter;?>').value;

            document.getElementById('vendornamed<?php echo $counter;?>').innerHTML = $vendornamea;
            document.getElementById('vendornamea<?php echo $counter;?>').innerHTML = $vendorname4;
            document.getElementById('vendornamed<?php echo $counter;?>').value = $vendornamea;
            document.getElementById('vendornamea<?php echo $counter;?>').value = $vendorname4;
            document.getElementById('vendorcostd<?php echo $counter;?>').value = $vendorcosta;
            document.getElementById('vendorcosta<?php echo $counter;?>').value = $vendorcost4;
            document.getElementById('vendorextcostd<?php echo $counter;?>').value = $vendorextcosta;
            document.getElementById('vendorextcosta<?php echo $counter;?>').value = $vendorextcost4;
        });

                   @endforeach
        console.log('<?php echo $sum;?>');


    </script>
@stop


@section('content')
