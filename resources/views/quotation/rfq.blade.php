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

    <div class="container-fluid p-2 ">




        <div class="row">
            <div class="col-lg-12">

                <div class="card collapsed-card mt-3">
                    <div class="card-header">
                        <div class="card-tools ">


                            <button type="button" name="headertoggle" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                        <div class="row">
                            <div class="col-form-label row ml-2 ">
                                <strong>Quotation # :&nbsp;</strong> <label class="quote_no text-blue" for="quote_no"><input
                                        type="number" name="quote_no" class="col-sm-6 form-control form-control-sm"
                                        id="quote_no" value="{{ $quote_no }}"></label>

                            </div>

                            <div class="col-form-label   ">
                                /&nbsp; <strong>Event # :&nbsp;</strong> <label class="event_no text-blue" id="event_no"
                                    for="event_no"></label>

                            </div>
                            <div class="col-form-label  ml-5 ">
                                /&nbsp; <strong>Customer :&nbsp;</strong> <label class="customer text-blue"
                                    for="customer"></label>

                            </div>
                            <div class="col-form-label  ml-5 ">
                                /&nbsp; <strong>Vessel :&nbsp;</strong> <label class="vessel text-blue"
                                    for="vessel"></label>

                            </div>
                            <div class="col-form-label  ml-5 ">
                                /&nbsp; <strong>Customer Ref # :&nbsp;</strong> <label class="customer_ref_no text-blue"
                                    for="customer_ref_no"></label>

                            </div>
                            <div class="col-form-label  ml-5 ">
                                /&nbsp; <strong>Department Name :&nbsp;</strong> <label class="departmentname text-blue"
                                    id="departmentname" for="departmentname"></label>

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





                            <div class="inputbox col-sm-2">
                                <span class="Txtspan">Department</span>

                                <select name="cmpdept" id="cmpdept">
                                    @foreach ($Department as $Ditem)
                                        <option value="{{ $Ditem->TypeCode }}">{{ $Ditem->TypeName }}</option>
                                    @endforeach

                                </select>

                            </div>
                            <input type="hidden" name="GodownCode" id="GodownCode" value="">

                            <div class="inputbox col-sm-1">
                                <input type="number" name="depcode" value="" id="depcode">
                            </div>
                            <div class="col-md-2">
                                <div class="inputbox">
                                    <span class="Txtspan">Vendor</span>

                                    <select name="" id="">
                                        <option selected>Select one</option>
                                        @if ($vendors !== '')
                                            @foreach ($vendors as $index => $obj)
                                                {

                                                <option value="{{ $obj->VenderCode }}">{{ $obj->VenderName }}</option>
                                                }
                                            @endforeach

                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="inputbox">
                                    <span class="Txtspan">WareHouse</span>

                                    <select name="CmbGodown" id="CmbGodown">
                                        @foreach ($GodownSetup as $Witem)
                                            <option value="{{ $Witem->GodownCode }}">{{ $Witem->GodownName }}</option>
                                        @endforeach

                                    </select>

                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="card">
                    <div class="card-body">


                <div class="col-lg-12 py-2 ">

                    <div class=" rounded shadow table-responsive">
                        <table id="rfqtable" class="table small table-inverse
        table-borderd
         ">
                            <thead class="bg-info">
                                {{-- <caption>Table Name</caption> --}}
                                <tr>
                                    <th>SNo</th>
                                    <th>Export</th>
                                    <th>SKU#</th>
                                    <th style="width:400px">Discription</th>
                                    <th>Qty</th>
                                    <th>UOM</th>
                                    <th>SellPrice</th>
                                    <th style="width: 150px">Vendor1</th>
                                    <th>Cost1</th>
                                    <th>ExtCost1</th>
                                    <th>
                                        {{-- <a name="" id="" class="btn btn-info" href="#" role="button">S</a> --}}
                                    </th>
                                    <th style="width: 150px">Vendor2</th>
                                    <th>Cost2</th>
                                    <th>ExtCost2</th>
                                    <th>
                                        {{-- <a name="" id="" class="btn btn-info" href="#" role="button">S</a> --}}
                                    </th>
                                    <th style="width: 150px">Vendor3</th>
                                    <th>Cost3</th>
                                    <th>ExtCost3</th>
                                    <th>
                                        {{-- <a name="" id="" class="btn btn-info" href="#" role="button">S</a> --}}
                                    </th>
                                    <th style="width: 150px">Vendor4</th>
                                    <th>Cost4</th>
                                    <th>ExtCost4</th>
                                    <th>
                                        {{-- <a name="" id="" class="btn btn-info" href="#" role="button">S</a> --}}
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="rfqtbody" class="table-group-divider table-hover">

                            </tbody>

                        </table>
                    </div>


                </div>
            </div>
        </div>
                <div class="col-lg-12 card p-2">
                    <div class="row py-2">
                        <div class="col-lg-4 px-4">


                            <div class="row py-1">
                                <a name="" id="selectAll" class="btn btn-info  smfont col-sm-3 mx-1"
                                    role="button">Select</a>
                                <a name="" id="unselectall" class="btn btn-info  smfont col-sm-3 mx-1"
                                    role="button">UnSelect</a>
                                <a name="" id="" class="btn btn-info  smfont col-sm-3 mx-1"
                                    href="#" role="button">Export</a>

                            </div>

                            <div class="row py-1">
                                <a name="" id="" class="btn btn-info  smfont col-sm-3 mx-1"
                                    data-toggle="modal" data-target="#sendmail" href="#"
                                    role="button">Export/Send</a>
                                <a name="" id="" class="btn btn-info  smfont col-sm-3 mx-1"
                                    href="#" role="button">Del Dupl IMPA</a>
                                <a name="" id="" class="btn btn-info  smfont col-sm-3 mx-1"
                                    href="#" role="button">Delete Duplicate</a>

                            </div>

                            <div class="row py-1">
                                <a name="" id="" class="btn btn-info  smfont col-sm-3 mx-1"
                                    href="#" role="button">V.Item Setup</a>
                                <a name="" id="" class="btn btn-info  smfont col-sm-3 mx-1"
                                    href="#" role="button">Product</a>
                                <a name="" id="" class="btn btn-info  smfont col-sm-3 mx-1"
                                    href="#" role="button">Vendor Rate</a>

                            </div>

                            <div class="row py-1">
                                <a name="" id="" class="btn btn-info  smfont col-sm-3 mx-1"
                                    href="#" role="button">Savegrid</a>
                                <a name="" id="" class="btn btn-info  smfont col-sm-3 mx-1"
                                    data-toggle="modal" data-target="#import" href="#" role="button">Import</a>
                            </div>

                        </div>



                        <div class="col-lg-4">

                            <div class="row py-1">
                                <a name="" id="" class="btn btn-info form-control smfont col-sm-2 mx-1"
                                    href="#" role="button">Add Vendor</a>
                                <button type="button" name="" id="SaveRfq"
                                    class="btn btn-info form-control smfont col-sm-2 mx-1" role="button">Save
                                    All</button>
                                <div class="CheckBox1">
                                    <label class="input-group text-info mx-1">
                                        <input type="checkbox" name="ChkSendToVendor" id="ChkSendToVendor"
                                            value=""> Sent To Vendor
                                    </label>
                                </div>
                            </div>


                            <div class="row py-1">
                                <a name="" id="" class="btn btn-info form-control smfont col-sm-2 mx-1"
                                    href="#" role="button">lowest Cost</a>
                                <a name="" id="" class="btn btn-info form-control smfont col-sm-2 mx-1"
                                    href="{{ url()->previous() }}" role="button">Close</a>
                                <div class="CheckBox1">
                                    <label class="input-group text-info mx-1">
                                        <input type="checkbox" name="Costed" id="Costed"
                                            value=""> Costed
                                    </label>
                                </div>
                            </div>


                            <div class="row py-1">

                                <a name="" id="" class="btn btn-info form-control smfont col-sm-4 ml-1"
                                    data-toggle="modal" data-target="#CopyVendor" role="button">Copy Vendor</a>
                            </div>

                        </div>



                        <div class="col-lg-4">


                            <div class="row py-1">
                                <div class="col-sm-3"></div>
                                <div class="inputbox col-sm-6">
                                    <span class="Txtspan" id="">Total Cost</span>
                                    <input type="text" readonly name="totalcost" value="" id="totalcost">
                                </div>

                            </div>


                            <div class="row py-2">
                                <a name="" id="" class="btn btn-info col-sm-3" data-toggle="modal"
                                    data-target="#sendmail" role="button">V-Plat SEND</a>

                                <div class="inputbox col-sm-6">
                                    <span class="Txtspan" id="">Req.Date</span>
                                    <input type="date" name="Reqdate" id="Reqdate">
                                </div>

                            </div>
                            <div class="row py-2">

                                <a name="" id="BTNvplatrec" class="btn btn-info  col-sm-3" role="button">V-Plat
                                    Rcvd</a>

                                <div class="inputbox col-sm-6">
                                    <span class="Txtspan" id="">Req.time</span>
                                    <input type="time" name="reqtime" id="reqtime">
                                </div>

                            </div>
                            <div class="row py-2">

                                <a name="" id="BTNvplatView" class="btn btn-info col-sm-3" role="button">V-Plat
                                    View</a>
                                <div class="inputbox col-sm-6">
                                    <span class="Txtspan" id="">ETA</span>
                                    <input type="date" name="eta" id="eta">
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            </div>


















            <!-- import Modal template  -->

            <div class="modal fade bd-example-modal-lg" id="import" tabindex="-1" role="dialog"
                aria-labelledby="searchrmod" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered " style="max-width:800px;" role="document">
                    <div class="modal-content">
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
                                        <button type="button" class="btn btn-info form-control col-sm-2"><i
                                                class="fa fa-search" aria-hidden="true"></i> Browse</button>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" name="search" id="">
                                        </div>
                                        <button type="button" class="btn btn-info form-control col-sm-2"><i
                                                class="fa fa-arrow-left "></i> Clear</button>

                                    </div>
                                    <div class="row py-2">

                                        <div class="input-group col-sm-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" style="width:130px"
                                                    id="my-addon">Quantity
                                                    COL :</span>
                                            </div>
                                            <input class="form-control" type="text" name="" value="B"
                                                placeholder="">
                                        </div>
                                        <div class="input-group col-sm-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" style="width:130px" id="my-addon">Stating
                                                    Row
                                                    :</span>
                                            </div>
                                            <input class="form-control" type="text" name="" value="14"
                                                placeholder="">
                                        </div>
                                        <div class="input-group col-sm-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text form-control" id="my-addon">Vendor :</span>
                                            </div>
                                            <select class="custom-select" name="" id="">
                                                <option selected>Select one</option>
                                                @if ($vendors !== '')
                                                    @foreach ($vendors as $index => $obj)
                                                        {

                                                        <option value="{{ $obj->VenderCode }}">{{ $obj->VenderName }}
                                                        </option>
                                                        }
                                                    @endforeach

                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row py-2">
                                        <div class="input-group col-sm-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text form-control" style="width:130px"
                                                    id="my-addon">Product Name Col :</span>
                                            </div>
                                            <input class="form-control" type="text" name="" value="E">
                                        </div>
                                        <div class="input-group col-sm-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text form-control" style="width:130px"
                                                    id="my-addon">UOM :</span>
                                            </div>
                                            <input class="form-control" type="text" name="" value="C">
                                        </div>
                                    </div>
                                    <div class="row py-2">
                                        <div class="input-group col-sm-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text form-control" style="width:130px"
                                                    id="my-addon">Price Col :</span>
                                            </div>
                                            <input class="form-control" type="text" name="" value="H">
                                        </div>
                                        <div class="input-group col-sm-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text form-control" style="width:130px"
                                                    id="my-addon">IMPA/ISSA Code :</span>
                                            </div>
                                            <input class="form-control" type="text" name="" value="D">
                                        </div>
                                    </div>
                                    <div class="row py-2">
                                        <div class="input-group col-sm-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text form-control" style="width:130px"
                                                    id="my-addon">Vendor Notes :</span>
                                            </div>
                                            <input class="form-control" type="text" name="" value="G">
                                        </div>
                                        <div class="col-sm-2 text-right">
                                            <p>Total : 0 0 </p>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning">Import</button>
                            <button type="button" class="btn btn-success">Import By IMPA</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                    class="fa fa-arrow-alt-circle-left "></i> Close</button>

                        </div>
                    </div>
                </div>
            </div>

            <!-- /.import modal -->

            <div id="vendorsearch" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title"
                aria-hidden="true">
                <div class="modal-dialog " style="max-width:1400px;" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="my-modal-title">Vendor Search</h5>
                            <button class="close" data-dismiss="modal" data-toggle="modal" data-target="#CopyVendor"
                                aria-label="Close">
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
                                        $Vendortabel = DB::table('vendersetup')
                                            ->select(['VenderCode', 'YourCode', 'VenderName', 'Address', 'EmailAddress', 'ActCode'])
                                            ->where('ChkInactive', '<>', '1')
                                            ->orderBy('VenderName')
                                            ->get();
                                    @endphp
                                    <div class="rounded shadow">
                                        <table id="vendorsearchtable"
                                            class="table table-sm table-inverse

        table-borderd
        align-middle smfont">
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
                                                        <td>{{ $items->YourCode }}</td>
                                                        <td>{{ $items->VenderCode }}</td>
                                                        <td>{{ $items->VenderName }}</td>
                                                        <td>{{ $items->Address }}</td>
                                                        <td>{{ $items->EmailAddress }}</td>
                                                        <td>{{ $items->ActCode }}</td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                        <input type="hidden" name="vencode" id="vencode">
                                        <input type="hidden" name="venname" id="venname">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="searvhclose" class="btn btn-secondary" data-toggle="modal"
                                data-target="#CopyVendor" data-dismiss="modal"><i
                                    class="fa fa-arrow-alt-circle-left "></i>
                                Close</button>

                        </div>
                    </div>
                </div>
            </div>
            <!-- CopyVendor modal -->

            <div id="CopyVendor" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="CopyVendor"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" style="max-width:900px;" role="document">
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
                                    <input class="form-control col-sm-1" type="text" id="TxtVendorCodeC1"
                                        name="TxtVendorCodeC1">
                                    <div class="input-group col-sm-5">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="">Vendor 1 :</span>
                                        </div>
                                        <input class="form-control" type="text" id="CmbVendorNameC1"
                                            name="CmbVendorNameC1">
                                    </div>

                                    <a name="" id="" class="vensearcq btn btn-default col-sm-1"
                                        data-toggle="modal" data-target="#vendorsearch" data-vencode="TxtVendorCodeC1"
                                        data-venname="CmbVendorNameC1" data-dismiss="modal" role="button"><i
                                            class="fa fa-search " aria-hidden="true"></i></a>

                                    <div class="col-sm-2"></div>
                                    <div class="input-group col-sm-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="">SNO From :</span>
                                        </div>
                                        <input class="form-control" type="number" id="TxtSnoC1From"
                                            name="TxtSnoC1From">
                                    </div>
                                </div>
                                <div class="row py-1">
                                    <input class="form-control col-sm-1" type="text" id="TxtVendorCodeC2"
                                        name="TxtVendorCodeC2">
                                    <div class="input-group col-sm-5">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="">Vendor 2 :</span>
                                        </div>
                                        <input class="form-control" type="text" id="CmbVendorNameC2"
                                            name="CmbVendorNameC2">
                                    </div>
                                    <a name="" id="" class="vensearcq btn btn-default col-sm-1"
                                        data-toggle="modal" data-target="#vendorsearch" data-vencode="TxtVendorCodeC2"
                                        data-venname="CmbVendorNameC2" data-dismiss="modal" role="button"><i
                                            class="fa fa-search " aria-hidden="true"></i></a>

                                    <div class="col-sm-2"></div>
                                    <div class="input-group col-sm-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="">To :</span>
                                        </div>
                                        <input class="form-control" type="number" id="TxtSnoC2To" name="TxtSnoC2To">
                                    </div>
                                </div>
                                <div class="row py-1">
                                    <input class="form-control col-sm-1" type="text" id="TxtVendorCodeC3"
                                        name="TxtVendorCodeC3">
                                    <div class="input-group col-sm-5">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="">Vendor 3 :</span>
                                        </div>
                                        <input class="form-control" type="text" id="CmbVendorNameC3"
                                            name="CmbVendorNameC3">
                                    </div>
                                    <a name="" id="" class="vensearcq btn btn-default col-sm-1"
                                        data-toggle="modal" data-target="#vendorsearch" data-vencode="TxtVendorCodeC3"
                                        data-venname="CmbVendorNameC3" data-dismiss="modal" role="button"><i
                                            class="fa fa-search " aria-hidden="true"></i></a>


                                </div>
                                <div class="row py-1">
                                    <input class="form-control col-sm-1" type="text" id="TxtVendorCodeC4"
                                        name="TxtVendorCodeC4">
                                    <div class="input-group col-sm-5">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="">Vendor 4 :</span>
                                        </div>
                                        <input class="form-control" type="text" id="CmbVendorNameC4"
                                            name="CmbVendorNameC4">
                                    </div>
                                    <a name="" id="" class="vensearcq btn btn-default col-sm-1"
                                        data-toggle="modal" data-target="#vendorsearch" data-vencode="TxtVendorCodeC4"
                                        data-venname="CmbVendorNameC4" data-dismiss="modal" role="button"><i
                                            class="fa fa-search " aria-hidden="true"></i></a>


                                </div>
                                <div class="row py-1">
                                    <input class="form-control col-sm-1" type="text" id="TxtVendorCodeC5"
                                        name="TxtVendorCodeC5">
                                    <div class="input-group col-sm-5">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="">Vendor 5 :</span>
                                        </div>
                                        <input class="form-control" type="text" id="CmbVendorNameC5"
                                            name="CmbVendorNameC5">
                                    </div>
                                    <a name="" id="" class="vensearcq btn btn-default col-sm-1"
                                        data-toggle="modal" data-target="#vendorsearch" data-vencode="TxtVendorCodeC5"
                                        data-venname="CmbVendorNameC5" data-dismiss="modal" role="button"><i
                                            class="fa fa-search " aria-hidden="true"></i></a>


                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="copybtn" class="btn btn-success"><i class="fa fa-calendar"
                                    aria-hidden="true"></i> Copy &nbsp;<i class="fa fa-arrow-circle-right"
                                    aria-hidden="true"></i></button>
                            <button type="button" id="Copyclose" class="btn btn-secondary" data-dismiss="modal"><i
                                    class="fa fa-arrow-alt-circle-left "></i> Close</button>

                        </div>
                    </div>
                </div>
            </div>


            <!-- /CopyVendor modal -->

            <div id="Finalmail" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="my-modal-title">Vendor Email List</h5>
                            <button class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="inputbox col-sm-3">
                                    <input type="text" class="" name="EventNOMail" id="EventNOMail"
                                        required="required">
                                    <span class="ml-2">
                                        Event :
                                    </span>
                                </div>
                                <div class="inputbox col-sm-3">
                                    <input type="text" class="" name="QuoteNOMail" id="QuoteNOMail"
                                        required="required">
                                    <span class="ml-2">
                                        Quote :
                                    </span>
                                </div>
                                <div class="inputbox col-sm-3">
                                    <span class="Txtspan ml-2">
                                        Department
                                    </span>
                                    <select  name="DepartmentMail" id="DepartmentMail"
                                        required="required">


                                        @foreach ($Department as $Ditem)
                                            <option value="{{ $Ditem->TypeCode }}">{{ $Ditem->TypeName }}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="inputbox col-sm-3">

                                    <span class="Txtspan ml-2">
                                        Ware House
                                    </span>
                                    <select  name="WarehouseMail" id="WarehouseMail"
                                        required="required">

                                        @foreach ($GodownSetup as $GodownSetupitem)
                                            <option value="{{ $GodownSetupitem->GodownCode }}">{{ $GodownSetupitem->GodownName }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <h5 class="text-blue" id="CustomernameMail"></h5>
                                <h5 id="VesselnameMail"></h5>
                            </div>
                            <div class="row">
                                <div class="table-responsive" id="Emailmodaltab">
                                    <table class="table table-light">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Send</th>
                                                <th hidden>Vendor&nbsp;Code</th>
                                                <th>Vendor&nbsp;Name</th>
                                                <th>Email</th>
                                                <th>NoOfLine</th>
                                            </tr>
                                        </thead>
                                        <tbody id="Emailmodaltabbody">
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="V-PlatSEND" class="btn btn-success"><i class="fa fa-calendar"
                                    aria-hidden="true"></i> Send &nbsp;<i class="fa fa-arrow-circle-right"
                                    aria-hidden="true"></i></button>
                            <button type="button" id="close" class="btn btn-secondary" data-dismiss="modal"><i
                                    class="fa fa-arrow-alt-circle-left "></i> Close</button>

                        </div>
                    </div>
                </div>
            </div>





            <!-- send mail Modal   -->

            <div class="modal fade bd-example-modal-sm" id="sendmail" tabindex="-1" role="dialog"
                aria-labelledby="searchrmod" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered " style="max-width:1000px" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">SendMail</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body gc-modal-body">
                            <div class="col-sm-12 ">

                                <div hidden class="row py-1">
                                    <input type="text" name="" id=""
                                        class="form-control col-sm-4 mx-auto ">
                                </div>
                                <div class="row py-2">
                                    <div class="btn-group mx-auto" data-toggle="buttons">
                                        <label class="btn btn-default ">
                                            <input type="radio" name="options" id="radLocalEmail" autocomplete="off">
                                            Local Email
                                        </label>
                                        <label class="btn btn-default active">
                                            <input type="radio" name="options" id="radvendorEmail" autocomplete="off"
                                                checked> vendor Email
                                        </label>
                                    </div>

                                </div>

                                <div class="row py-2">
                                    <div class="input-group col-sm-6 ml-auto">
                                        <input type="hidden" name="selectvendorcode" id="selectvendorcode">

                                        <input class="form-control" readonly type="hidden" name="vendornameselect"
                                            id="vendornameselect">
                                    </div>

                                    <div class="input-group col-sm-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text form-control" id="">Vendor :</span>
                                        </div>
                                        <select class="custom-select" name="vendorchanger" id="vendorchanger">
                                            <option value="">selectOne</option>
                                            <option value="Vendor 1">Vendor 1</option>
                                            <option value="Vendor 2">Vendor 2</option>
                                            <option value="Vendor 3">Vendor 3</option>
                                            <option value="Vendor 4">Vendor 4</option>

                                        </select>
                                    </div>
                                    <div class="col-sm-2 mr-auto">
                                        <div class="btn-group" data-toggle="buttons">
                                            <label class="btn btn-info active">
                                                <input type="checkbox" name="CHKVENDORALL" id="CHKVENDORALL"
                                                    autocomplete="off">
                                            </label>
                                        </div>
                                        All
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
                                        <input class="form-control" type="text" name="vendornemail"
                                            id="vendornemail">
                                    </div>

                                </div>


                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="vptsend" class="btn btn-success"><i class="fa fa-calendar"
                                    aria-hidden="true"></i> SendMail<i class="fa fa-arrow-circle-o-right"
                                    aria-hidden="true"></i></button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                    class="fa fa-arrow-alt-circle-left "></i> Close</button>

                        </div>
                    </div>
                </div>
            </div>

            <!-- /.send mail modal -->


        </div>
        <!-- /.container -->

        <script></script>

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
                background-image: linear-gradient(to right, #553c9a, #ee4b2b, #00c2cb, #ff7f50, #553c9a);
                -webkit-background-clip: text;
                background-clip: text;
                background-size: 200%;
                background-position: -200%;
                transition: all ease-in-out 2s;
                cursor: pointer;
            }

            header h5:hover {
                background-position: 200%;
            }

            .boderless {
                border: none;
                border-width: 0;
                box-shadow: none;
                background: none;
                width: 38px;
            }

            .boderless:focus {
                outline: none !important;
            }

            .boderless-w-width {
                border: none;
                border-width: 0;
                box-shadow: none;
                background: none;
            }

            .boderless-w-width:focus {
                outline: none !important;
            }

            .boderlessdis {
                border: none;
                border-width: 0;
                box-shadow: none;
                background: none;
                width: 100%;
            }

            .boderlessdis:focus {
                outline: none !important;
            }

            .s25width {
                width: 25%;
            }

            .s2width {
                width: 10%;
            }

            .tdwidth {
                width: 2%;
            }

            .dhig {
                max-height: 450px;
                min-height: 250px;
            }

            /* .font-size{
                            font-size: 0.7rem;
                        } */
            .smfont {
                /* font-size: 0.7rem; */
            }

            .chight {
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
            $(document).ready(function() {
                $(".vensearcq").click(function(event) {
                    // alert();
                    var button = $(this);
                    $("#vencode").val(button.data("vencode"));
                    $("#venname").val(button.data("venname"));
                });

                var todaydata = new Date();
                const today = todaydata.toISOString().substring(0, 10);
                $('#Reqdate').val(today);
                $('#eta').val(today);
                const currentTime = new Date();
                const hours = currentTime.getHours().toString().padStart(2, '0');
                const minutes = currentTime.getMinutes().toString().padStart(2, '0');
                const currentTimeFormatted = hours + ':' + minutes;

                $('#reqtime').val(currentTimeFormatted);


                $('#rfqtable').DataTable({
                    scrollY: 400,
                    deferRender: true,
                    scroller: true,
                    paging: false,
                    info: false,
                    ordering: false,
                    searching: false,
                    responsive: true,


                });
                $('#vendorsearchtable').DataTable({
                    scrollY: 500,
                    scroller: true,
                    // responsive: true,
                    scrollX: true,
                    paging: false,
                    ordering: false,



                });
                Dataget();

                function ajaxSetup() {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                }
                $('#quote_no').keydown(function(event) {
                    if (event.keyCode === 13) {
                        event.preventDefault();
                        $('#quote_no').blur();
                    }

                });
                $('#quote_no').blur(function(e) {
                    e.preventDefault();
                    Dataget();

                });

                function Dataget() {
                    ajaxSetup();
                    var quote_no = $('#quote_no').val();
                    $.ajax({
                        url: "{{route('RFQGet')}}",
                        type: 'POST',
                        data: {
                            quote_no,
                        },
                        beforeSend: function() {
                            // Show the overlay and spinner before sending the request
                            $('.overlay').show();
                        },
                        success: function(response) {
                            console.log(response);
                            let datamaster = response.quotesmaster;
                            $('#event_no').text(datamaster.EventNo);
                            $('#EventNOMail').val(datamaster.EventNo);
                            $('#QuoteNOMail').val(datamaster.QuoteNo);
                            $('.customer').text(datamaster.CustomerName);
                            $('.vessel').text(datamaster.VesselName);
                            $('.customer_ref_no').text(datamaster.CustomerRefNo);
                            $('#departmentname').text(datamaster.DepartmentName);
                            $('#depcode').val(datamaster.DepartmentCode);
                            $('#DepartmentMail').val(datamaster.DepartmentCode);
                            $('#cmpdept').val(datamaster.DepartmentCode);
                            $('#CmbGodown').val(datamaster.GodownCode);
                            $('#WarehouseMail').val(datamaster.GodownCode);
                            if (datamaster.ChkCosting) {
                                $('#Costed').prop("checked", true);
                            }else{
                                $('#Costed').prop("checked", false);

                            }
                            if (datamaster.ChkSendToVendor) {
                                $('#ChkSendToVendor').prop("checked", true);
                            }else{
                                $('#ChkSendToVendor').prop("checked", false);

                            }
                            let data = response.rfq;
                            let ids = 0;
                            let dataU = response.vendors;
                            let table = document.getElementById('rfqtbody');
                            if (data.length > 0) {
                                table.innerHTML = "";
                                data.forEach(function(item) {
                                    ids = ids + 1;
                                    let row = table.insertRow();

                                    function createCell(content) {
                                        let cell = row.insertCell();
                                        cell.innerHTML = content;
                                        return cell;
                                    }
                                    createCell(item.ID).hidden = true;
                                    createCell(Math.round(item.SNo));
                                    let Exportcell = createCell('');
                                    Exportcell.innerHTML =
                                        '<input type="checkbox" class="form-check-input checkbox" checked name=""  value="" id="Chk_export">'
                                    createCell(item.ItemCode);
                                    createCell(item.ItemName).style.width = '825px';
                                    createCell(parseFloat(item.Qty).toFixed(2));
                                    createCell(item.PUOM);
                                    createCell(parseFloat(item.SuggestPrice).toFixed(2)).style
                                        .textAlign = 'right';
                                    //ven1
                                    let Vendor1 = createCell('');
                                    let dropdownHtmls =
                                        '<select class="boderlessdis" id="Vendrorname" name="VendorName[]">';
                                    dataU.forEach(function(itemu) {
                                        dropdownHtmls += '<option value="' + itemu
                                            .VenderCode + '"';
                                        if (item.VendorCode == itemu.VenderCode) {
                                            dropdownHtmls += 'selected';

                                        }
                                        dropdownHtmls += '>' + itemu.VenderName +
                                            '</option>';

                                    });
                                    dropdownHtmls += '</select>';
                                    Vendor1.innerHTML = dropdownHtmls;
                                    Vendor1.style.width = '190px';

                                    let cost1 = createCell(item.VendorPrice ? parseFloat(item.VendorPrice).toFixed(2) : 0);
                                    cost1.style.textAlign = 'right'
                                    cost1.contentEditable = true;
                                    cost1.setAttribute('class', 'cellblur');


                                    let extcost1 = createCell(parseFloat(item.VendorPrice * item
                                        .Qty).toFixed(2));
                                    extcost1.style.textAlign = 'right'
                                    // extcost1.contentEditable = true;

                                    createCell(item.IMPAItemCode).hidden = true;
                                    let Sbtn1 = createCell('');
                                    Sbtn1.innerHTML = '<a name="" data-vendorname="' + item
                                        .VendorCode2 + '" data-vendorcost="' + parseFloat(item
                                            .Cost2).toFixed(2) + '" data-vendorextcost="' + item
                                        .ExtCost2 + '" id="switchb' + ids +
                                        '" class="btn btn-info"    role="button">S</a>'
                                    Sbtn1.querySelector('a').addEventListener('click', function() {
                                        // Function to be executed when the button is clicked
                                        const vendorcode = this.getAttribute(
                                            'data-vendorname');
                                        const vendorCost = parseFloat(this.getAttribute(
                                            'data-vendorcost')).toFixed(2);
                                        const vendorExtCost = this.getAttribute(
                                            'data-vendorextcost');

                                        const selectElement = this.closest('tr')
                                            .querySelector('select');


                                        // Set the selected option based on vendorName
                                        const options = selectElement.options;
                                        for (let i = 0; i < options.length; i++) {
                                            if (options[i].value === vendorcode) {
                                                options[i].selected = true;
                                                break;
                                            }
                                        }

                                        // Set vendorCost in column 9
                                        const costCell = this.closest('tr')
                                            .querySelectorAll('td')[9];
                                        costCell.innerHTML = vendorCost;

                                        // Set vendorExtCost in column 10 innerHTML
                                        const extCostCell = this.closest('tr')
                                            .querySelectorAll('td')[10];
                                        extCostCell.innerHTML = vendorExtCost;

                                        // Perform the desired operations with the retrieved data
                                        // ...
                                    });
                                    //ven2
                                    let Vendor2 = createCell('');
                                    let dropdownHtmls2 =
                                        '<select class="boderlessdis" id="Vendrorname2" name="Vendor2[]" >';
                                    dataU.forEach(function(itemu) {
                                        dropdownHtmls2 += '<option value="' + itemu
                                            .VenderCode + '"';
                                        if (item.VendorCode2 == itemu.VenderCode) {
                                            dropdownHtmls2 += 'selected';

                                        }
                                        dropdownHtmls2 += '>' + itemu.VenderName +
                                            '</option>';

                                    });
                                    dropdownHtmls2 += '</select>';
                                    Vendor2.innerHTML = dropdownHtmls2;
                                    Vendor2.style.width = '190px';

                                    let cost2 = createCell(item.Cost2 ? parseFloat(item.Cost2).toFixed(2) : 0);
                                    cost2.style.textAlign = 'right'
                                    cost2.contentEditable = true;
                                    cost2.setAttribute('class', 'cellblur');


                                    let extcost2 = createCell(parseFloat(item.ExtCost2).toFixed(2));
                                    extcost2.style.textAlign = 'right'
                                    // extcost2.contentEditable = true;

                                    let Sbtn2 = createCell('');
                                    Sbtn2.innerHTML = '<a name="" data-vendorname="' + item
                                        .VendorCode3 + '" data-vendorcost="' + parseFloat(item
                                            .Cost3).toFixed(2) + '" data-vendorextcost="' + item
                                        .ExtCost3 + '" id="switchc' + ids +
                                        '" class="btn btn-info"    role="button">S</a>'
                                    Sbtn2.querySelector('a').addEventListener('click', function() {
                                        // Function to be executed when the button is clicked
                                        const vendorcode = this.getAttribute(
                                            'data-vendorname');
                                        const vendorCost = parseFloat(this.getAttribute(
                                            'data-vendorcost')).toFixed(2);
                                        const vendorExtCost = this.getAttribute(
                                            'data-vendorextcost');

                                        const selectElement = this.closest('tr')
                                            .querySelector('select');

                                        // Set the selected option based on vendorName
                                        const options = selectElement.options;
                                        for (let i = 0; i < options.length; i++) {
                                            if (options[i].value === vendorcode) {
                                                options[i].selected = true;
                                                break;
                                            }
                                        }

                                        // Set vendorCost in column 9
                                        const costCell = this.closest('tr')
                                            .querySelectorAll('td')[9];
                                        costCell.innerHTML = vendorCost;

                                        // Set vendorExtCost in column 10 innerHTML
                                        const extCostCell = this.closest('tr')
                                            .querySelectorAll('td')[10];
                                        extCostCell.innerHTML = vendorExtCost;

                                        // Perform the desired operations with the retrieved data
                                        // ...
                                    });
                                    //ven3
                                    let Vendor3 = createCell('');
                                    let dropdownHtmls3 =
                                        '<select class="boderlessdis" id="Vendrorname2" name="Vendor2[]" >';
                                    dataU.forEach(function(itemu) {
                                        dropdownHtmls3 += '<option value="' + itemu
                                            .VenderCode + '"';
                                        if (item.VendorCode3 == itemu.VenderCode) {
                                            dropdownHtmls3 += 'selected';

                                        }
                                        dropdownHtmls3 += '>' + itemu.VenderName +
                                            '</option>';

                                    });
                                    dropdownHtmls3 += '</select>';
                                    Vendor3.innerHTML = dropdownHtmls2;
                                    Vendor3.style.width = '190px';

                                    let cost3 = createCell(item.Cost3 ? parseFloat(item.Cost3).toFixed(2) : 0);
                                    cost3.style.textAlign = 'right'
                                    cost3.setAttribute('class', 'cellblur');

                                    cost3.contentEditable = true;

                                    let extcost3 = createCell(parseFloat(item.ExtCost3).toFixed(2));
                                    extcost3.style.textAlign = 'right'
                                    // extcost3.contentEditable = true;

                                    let Sbtn3 = createCell('');
                                    Sbtn3.innerHTML = '<a name="" data-vendorname="' + item
                                        .VendorCode4 + '" data-vendorcost="' + parseFloat(item
                                            .Cost4).toFixed(2) + '" data-vendorextcost="' + item
                                        .ExtCost4 + '" id="switchc' + ids +
                                        '" class="btn btn-info"    role="button">S</a>'
                                    Sbtn3.querySelector('a').addEventListener('click', function() {
                                        // Function to be executed when the button is clicked
                                        const vendorcode = this.getAttribute(
                                            'data-vendorname');
                                        const vendorCost = parseFloat(this.getAttribute(
                                            'data-vendorcost')).toFixed(2);
                                        const vendorExtCost = this.getAttribute(
                                            'data-vendorextcost');

                                        const selectElement = this.closest('tr')
                                            .querySelector('select');


                                        // Set the selected option based on vendorName
                                        const options = selectElement.options;
                                        for (let i = 0; i < options.length; i++) {
                                            if (options[i].value === vendorcode) {
                                                options[i].selected = true;
                                                break;
                                            }
                                        }

                                        // Set vendorCost in column 9
                                        const costCell = this.closest('tr')
                                            .querySelectorAll('td')[9];
                                        costCell.innerHTML = vendorCost;

                                        // Set vendorExtCost in column 10 innerHTML
                                        const extCostCell = this.closest('tr')
                                            .querySelectorAll('td')[10];
                                        extCostCell.innerHTML = vendorExtCost;

                                        // Perform the desired operations with the retrieved data
                                        // ...
                                    }); //ven4
                                    let Vendor4 = createCell('');
                                    let dropdownHtmls4 =
                                        '<select class="boderlessdis" id="Vendrorname2" name="Vendor2[]" >';
                                    dataU.forEach(function(itemu) {
                                        dropdownHtmls4 += '<option value="' + itemu
                                            .VenderCode + '"';
                                        if (item.VendorCode4 == itemu.VenderCode) {
                                            dropdownHtmls4 += 'selected';

                                        }
                                        dropdownHtmls4 += '>' + itemu.VenderName +
                                            '</option>';

                                    });
                                    dropdownHtmls4 += '</select>';
                                    Vendor4.innerHTML = dropdownHtmls2;
                                    Vendor4.style.width = '190px';

                                    let cost4 = createCell(item.Cost4 ? parseFloat(item.Cost4).toFixed(2) : 0);

                                    cost4.style.textAlign = 'right'
                                    cost4.contentEditable = true;
                                    cost4.setAttribute('class', 'cellblur');

                                    let extcost4 = createCell(item.ExtCost4 ? parseFloat(item.ExtCost4).toFixed(2) : 0);
                                    extcost4.style.textAlign = 'right'
                                    // extcost4.contentEditable = true;


                                    // let Sbtn4 = createCell('');
                                    // Sbtn4.innerHTML='<a name="" data-vendorname="'+item.Vendor5+'" data-vendorcost="'+parseFloat(item.Cost5).toFixed(2)+'" data-vendorextcost="'+item.ExtCost5+'" id="switchc'+ids+'" class="btn btn-info"    role="button">S</a>'


                                });
                            }

                            $('.cellblur').blur(function(e) {
                                e.preventDefault();
                                let table = document.getElementById('rfqtbody');
                                let rows = table.rows;
                                let totalc = 0;
                                // alert();
                                for (let i = 0; i < rows.length; i++) {
                                    let cells = rows[i].cells;

                                    // let VendorCode = cells[8].querySelector("select").selectedOptions[0].value;
                                    // let VendorName = cells[8].querySelector("select").selectedOptions[0].text;
                                    // let VendorCode2 = cells[13].querySelector("select").selectedOptions[0].value;
                                    // let Vendor2 = cells[13].querySelector("select").selectedOptions[0].text;
                                    // let VendorCode3 = cells[17].querySelector("select").selectedOptions[0].value;
                                    // let Vendor3 = cells[17].querySelector("select").selectedOptions[0].text;
                                    // let VendorCode4 = cells[21].querySelector("select").selectedOptions[0].value;
                                    // let Vendor4 = cells[21].querySelector("select").selectedOptions[0].text;

                                    let Qty = cells[5] ? cells[5].innerHTML : '';
                                    let cost1 = cells[9] ? cells[9].innerHTML : '';
                                    let extcost1 = cells[10] ? cells[10].innerHTML : '';
                                    let Cost2 = cells[14] ? cells[14].innerHTML : '';
                                    let ExtCost2 = cells[15] ? cells[15].innerHTML : '';
                                    let Cost3 = cells[18] ? cells[18].innerHTML : '';
                                    let ExtCost3 = cells[19] ? cells[19].innerHTML : '';
                                    let Cost4 = cells[22] ? cells[22].innerHTML : '';
                                    let ExtCost4 = cells[23] ? cells[23].innerHTML : '';


                                    cells[10].innerHTML = parseFloat(cost1 * Qty).toFixed(2);
                          let tot = cells[10].innerHTML = parseFloat(cost1 * Qty).toFixed(2);
                                    cells[15].innerHTML = parseFloat(Cost2 * Qty).toFixed(2);
                                    cells[19].innerHTML = parseFloat(Cost3 * Qty).toFixed(2);
                                    cells[23].innerHTML = parseFloat(Cost4 * Qty).toFixed(2);


                                    totalc += parseFloat(tot);
                                }
                                $('#totalcost').val(totalc);

                            });
                            $('.cellblur').blur();
                        },
                        complete: function() {
                            // Hide the overlay and spinner after the request is complete
                            $('.overlay').hide();
                        }
                    });

                }
                let dataarray;

                function tabcomposer() {
                    let table = document.getElementById('rfqtbody');
                    let rows = table.rows;

                    let dataarray = [];
                    for (let i = 0; i < rows.length; i++) {
                        let cells = rows[i].cells;

                        let ChkExport = cells[2].querySelector("input").checked;
                        let VendorCode = cells[8].querySelector("select").selectedOptions[0].value;
                        let VendorName = cells[8].querySelector("select").selectedOptions[0].text;
                        let VendorCode2 = cells[13].querySelector("select").selectedOptions[0].value;
                        let Vendor2 = cells[13].querySelector("select").selectedOptions[0].text;
                        let VendorCode3 = cells[17].querySelector("select").selectedOptions[0].value;
                        let Vendor3 = cells[17].querySelector("select").selectedOptions[0].text;
                        let VendorCode4 = cells[21].querySelector("select").selectedOptions[0].value;
                        let Vendor4 = cells[21].querySelector("select").selectedOptions[0].text;

                        dataarray.push({
                            ID: cells[0] ? cells[0].innerHTML : '',
                            SNo: cells[1] ? cells[1].innerHTML : '',
                            MChkExport: ChkExport,
                            ItemCode: cells[3] ? cells[3].innerHTML : '',
                            ItemName: cells[4] ? cells[4].innerHTML : '',
                            Qty: cells[5] ? cells[5].innerHTML : '',
                            PUOM: cells[6] ? cells[6].innerHTML : '',
                            SuggestPrice: cells[7] ? cells[7].innerHTML : '',
                            VendorCode1: VendorCode,
                            Vendor1: VendorName,
                            vendorcosta: cells[9] ? cells[9].innerHTML : '',
                            vendorextcosta: cells[10] ? cells[10].innerHTML : '',
                            IMPAItemCode: cells[11] ? cells[11].innerHTML : '',
                            Vendor2: Vendor2,
                            VendorCode2: VendorCode2,
                            Cost2: cells[14] ? cells[14].innerHTML : '',
                            ExtCost2: cells[15] ? cells[15].innerHTML : '',
                            Vendor3: Vendor3,
                            VendorCode3: VendorCode3,
                            Cost3: cells[18] ? cells[18].innerHTML : '',
                            ExtCost3: cells[19] ? cells[19].innerHTML : '',
                            VendorCode4: VendorCode4,
                            Vendor4: Vendor4,
                            Cost4: cells[22] ? cells[22].innerHTML : '',
                            ExtCost4: cells[23] ? cells[23].innerHTML : '',
                        });
                    }

                    return dataarray;
                }

                function Mailtabcomposer() {
                    let table = document.getElementById('Emailmodaltabbody');
                    let rows = table.rows;

                    let dataMail = [];
                    for (let i = 0; i < rows.length; i++) {
                        let cells = rows[i].cells;

                        let ChSend = cells[0].querySelector("input").checked;

                        dataMail.push({
                            ChkSend: ChSend,
                            VendorCode: cells[1] ? cells[1].innerHTML : '',
                            VendorName: cells[2] ? cells[2].innerHTML : '',
                            Email: cells[3] ? cells[3].innerHTML : '',
                            NoOfLine: cells[4] ? cells[4].innerHTML : '',
                        });
                    }

                    return dataMail;
                }




                $('#SaveRfq').click(function(e) {
                    e.preventDefault();

                    if(!$('#Costed').prop("checked")){

                    if (confirm("Have you Completed Costed Pricied?")) {
                        $('#Costed').prop("checked", true);
                    } else {
                        return;
                    }
                    }



                    dataarray = tabcomposer();
                    console.log(dataarray);
                    var quote_no = $('#quote_no').val();
                    var event_no = $('#event_no').text();
                    var depcode = $('#depcode').val();
                    var GodownCode = $('#GodownCode').val();
                    var totalcost = $('#totalcost').val();
                    var Reqdate = $('#Reqdate').val();
                    var reqtime = $('#reqtime').val();
                    var ChkCosting = $('#Costed').prop("checked");
                    var eta = $('#eta').val();


                    ajaxSetup();
                    $.ajax({
                        url: '/rfq_store',
                        type: 'POST',
                        data: {
                            quote_no,
                            ChkCosting,
                            event_no,
                            depcode,
                            totalcost,
                            Reqdate,
                            reqtime,
                            eta,
                            dataarray,
                        },

                        beforeSend: function() {
                            // Show the overlay and spinner before sending the request
                            $('.overlay').show();
                        },
                        success: function(response) {
                            console.log(response);

                            if (response.error == 'false') {
                                Swaal.fire({
                                    icon: 'success',
                                    title: 'Costing Updated',
                                    text: 'Your Costing Has Been Updated!',
                                    showConfirmButton: true,
                                    timer: 2500
                                })

                            } else {
                                Swaal.fire({
                                    icon: 'error',
                                    title: 'Error!',
                                    text: 'Your Costing Has Not Updated!',
                                    showConfirmButton: true,
                                    timer: 2500
                                })
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
                } else {
                    $('#vendornemail').prop('readonly', false);
                }
                $('#radvendorEmail').click(function(e) {
                    if ($("#radvendorEmail").is(":checked")) {
                        $('#vendornemail').prop('readonly', true);
                    } else {
                        $('#vendornemail').prop('readonly', false);
                    }
                });
                $('#radLocalEmail').click(function(e) {
                    if ($("#radvendorEmail").is(":checked")) {
                        $('#vendornemail').prop('readonly', true);
                    } else {
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
                        let vendorcode = $('#Vendrorname option:selected').val();
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

                $('#V-PlatSEND').click(function(e) {
                    let eventno = $('#EventNOMail').val();
                    let quoteno = $('#QuoteNOMail').val();
                    let DepartmentName = $('#DepartmentMail option:selected').text();
                    let DepartmentCode = $('#DepartmentMail').val();
                    let WarehouseName = $('#WarehouseMail option:selected').text();
                    let WarehouseCode = $('#WarehouseMail').val();
                    var MailTable = Mailtabcomposer();

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: 'post',
                        url: '{{ URL::to('vplatsend') }}',
                        data: {
                            quoteno,
                            eventno,
                            MailTable,
                            DepartmentName,
                            DepartmentCode,
                            WarehouseName,
                            WarehouseCode,

                        },
                        beforeSend: function() {
                            // Show the overlay and spinner before sending the request
                            $('.overlay').show();
                            $('#Finalmail').modal('hide');
                        },
                        success: function(response) {
                            console.log(response);
                            Swaal.fire({
                                    icon: 'success',
                                    title: 'Email-Sent',
                                    text: 'Your Email Has Been Sent To Vendor!',
                                    showConfirmButton: true,
                                    timer: 2500
                                })
                        },
                        error: function(xhr, status, error) {
                            // Handle error
                            $('#Finalmail').modal('show');

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


                $('#copybtn').click(function(e) {
                    var snofrom = $('#TxtSnoC1From').val();
                    var snoto = $('#TxtSnoC2To').val();
                    snofrom = snofrom - 1;

                    if (snofrom !== '' && snoto !== '') {
                        if ($('#TxtVendorCodeC1').val() !== '') {
                            var v1 = $('#TxtVendorCodeC1').val();
                            let table = $('#rfqtbody');
                            let rows = table[0].rows;
                            for (let i = snofrom; i <= snoto; i++) {
                                let cells = $(rows[i]).find('td');
                                $(cells[8]).find('select').val(v1);

                            }
                        }

                        if ($('#TxtVendorCodeC2').val() > 0) {
                            var v2 = $('#TxtVendorCodeC2').val();

                            let table = $('#rfqtbody');
                            let rows = table[0].rows;
                            for (let i = snofrom; i < snoto; i++) {
                                let cells = $(rows[i]).find('td');
                                $(cells[13]).find('select').val(v2);
                            }
                        }

                        if ($('#TxtVendorCodeC3').val() > 0) {
                            var v3 = $('#TxtVendorCodeC3').val();
                            let table = $('#rfqtbody');
                            let rows = table[0].rows;
                            for (let i = snofrom; i < snoto; i++) {
                                let cells = $(rows[i]).find('td');
                                $(cells[17]).find('select').val(v3);

                            }
                        }

                        if ($('#TxtVendorCodeC4').val() > 0) {
                            var v4 = $('#TxtVendorCodeC4').val();
                            let table = $('#rfqtbody');
                            let rows = table[0].rows;
                            for (let i = snofrom; i < snoto; i++) {
                                let cells = $(rows[i]).find('td');
                                $(cells[21]).find('select').val(v4);

                            }
                        }

                        if ($('#TxtVendorCodeC5').val() > 0) {
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


                        var inpvencode = $('#vencode').val();
                        var inpvenname = $('#venname').val();
                        $('#' + inpvencode).val(vendorcode);
                        $('#' + inpvenname).val(name);
                        // document.querySelector('#TxtVendorCodeC1').value = vendorcode;
                        // document.querySelector('#CmbVendorNameC1').value = name;
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
                // // url : '{{ URL::to('Vendersearchmod') }}',
                // // data:{
                // //     value,
                // // },
                // // success:function($response){
                // // }
                // //         });

                //   }
                // });

                $('#vptsend').click(function(e) {
                    e.preventDefault();
                    var table = tabcomposer();
                    var CHKVENDORALL = $("#CHKVENDORALL").is(":checked");
                    var QuoteNo = $("#quote_no").val();
                    var TxtVendorNameEmail = $("#vendorchanger").val();
                    var EventNo = $("#event_no").text();
                    var TxtCustRefNo = $(".customer_ref_no").text();
                    var TxtDepartmentCode = $('#cmpdept').val();
                    var CmbDepartment = $("#departmentname").text();
                    var TxtGodownCode = $('#CmbGodown').val();
                    var CmdGodownName = $('#CmbGodown option:selected').text();
                    var TxtReqDate = $("#Reqdate").val();
                    var TxtReqTime = $("#reqtime").val();
                    var TxtETADAte = $("#eta").val();

                    ajaxSetup();
                    $.ajax({
                        type: 'post',
                        url: '{{ URL::to('FillEmailOnly') }}',
                        data: {
                            CHKVENDORALL,
                            QuoteNo,
                            EventNo,
                            table,
                            TxtCustRefNo,
                            CmbDepartment,
                            TxtReqDate,
                            TxtReqTime,
                            TxtETADAte,
                            TxtGodownCode,
                            CmdGodownName,
                            TxtVendorNameEmail,
                            TxtDepartmentCode,
                        },
                        beforeSend: function() {
                            $('#sendmail').modal('hide');

                            $('.overlay').show();
                        },
                        success: function(response) {
                            console.log(response);
                            if (response.message == 'Saved') {
                                $('#sendmail').modal('hide');
                                $('#Finalmail').modal('show');
                                var data = response.results;
                                let table = document.getElementById('Emailmodaltabbody');
                                table.innerHTML = "";
                                data.forEach(function(item) {
                                    let row = table.insertRow();

                                    function createCell(content) {
                                        let cell = row.insertCell();
                                        cell.innerHTML = content;
                                        return cell;
                                    }
                                    var checkboxx = createCell('');
                                    checkboxx.innerHTML =
                                        '<input type="checkbox" class="ChkSend" checked value="" name="ChkSend" id="ChkSend">';

                                    createCell(item.VendorCode).hidden = 'true';
                                    createCell(item.VendorName);
                                    createCell(item.VendorEmail);
                                    createCell(item.MNoOfLines);
                                });

                            }
                        },
                        error: function(xhr, status, error) {
                            console.log(error);
                        },
                        complete: function() {
                            // Hide the overlay and spinner after the request is complete
                            $('.overlay').hide();
                        }

                    });



                });

            });
            $(document).ready(function() {
                $('#BTNvplatView').click(function(e) {
                    e.preventDefault();
                    var quote_no = $('#quote_no').val();
                    window.location.href = '/RFQ-Vplat-View?quote_no=' + quote_no;
                });
            });
        </script>
    @stop


    @section('content')
