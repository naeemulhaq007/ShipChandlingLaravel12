@extends('layouts.app')



@section('title', 'QuotationsEntry')

@section('content_header')
@stop

@section('content')
<?php echo View::make('partials.impalist') ?>
<?php echo View::make('partials.fullitemsearch') ?>

@php
  $status = request()->get('status');
  $error = request()->get('error');

@endphp

@if (request()->get('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <strong>{!! request()->get('status') !!}</strong>
  </div>

@endif
@if (request()->get('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <strong>{!! request()->get('error') !!}</strong>
  </div>

@endif
@if (\Session::has('status'))
<div class="alert alert-info alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <strong>{!! \Session::get('status') !!}</strong>
  </div>

@endif
</div>
<!--  form action=""  method="GET" -->
@csrf






    <!-- div class="col-md-12"  -->
        <div class="card collapsed-card ">
            <div  style="background-color:#EEE" class="card-header">
                <div class="card-tools ">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
        </button>
    </div>
                <div class="row">

                                <div class="col-form-label row ml-2 ">
                                   <strong>Quotation # :&nbsp;</strong> <label class="quote_no text-blue" for="quote_no">{{$DataQuotesMaster->QuoteNo}}</label>

                                </div>

                                <div class="col-form-label  ml-5 ">
                                    /&nbsp; <strong>Event # :&nbsp;</strong> <label class="event_no text-blue" for="event_no">{{$EventNo}}</label>

                                </div>
                                <div class="col-form-label  ml-5 ">
                                    /&nbsp;  <strong>Customer :&nbsp;</strong> <label  class="customer text-blue" for="customer">{{$EventData->CustomerName}}</label>

                                </div>
                                <div class="col-form-label  ml-5 ">
                                    /&nbsp;  <strong>Vessel :&nbsp;</strong> <label class="vessel text-blue" for="vessel">{{$EventData->VesselName}}</label>

                                </div>
                                <div class="col-form-label  ml-5 ">
                                    /&nbsp;  <strong>Customer Ref # :&nbsp;</strong> <label class="customer_ref_no text-blue" for="customer_ref_no">{{$DataQuotesMaster->CustomerRefNo}}</label>

                                </div>
                                <div class="col-form-label  ml-5 ">
                                    /&nbsp;  <strong>Department Name :&nbsp;</strong> <label class="departmentname text-blue" id="departmentname" for="departmentname">{{$DataQuotesMaster->DepartmentName}}</label>

                                </div>
                                <form id="import-form" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" hidden class="ml-3" id="file-input" name="file" accept=".xlsx">
                                    <button type="submit" hidden id="import-button" class="btn btn-primary">Import</button>
                                </form>


                </div>



            </div>
            <!-- /.card-header -->
            <div class="card-body">

                <div class="container-fluid ">
                    <div class="row">
                        <div class="col">
                            <div class="form-inline ">


                                <input type="hidden" id="event_no" class="event_no form-control " >
                                <div class="input-group mx-1">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">QDate</span>
                                    </div>
                                    <div class="input-group-prepend ">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>

                                    <input id='qdate' type="date" value="{{date('Y-m-d', strtotime($DataQuotesMaster->QDate))}}" class="form-control datetimepicker-input" data-inputmask-alias="datetime" data-inputmask-inputformat="mm/dd/yyyy" data-mask="" inputmode="numeric">

                                </div>
                                <div class="input-group  mx-1">
                                    <div class="input-group-prepend ">
                                        <span class="input-group-text">ETA</span>
                                    </div>
                                    <div class="input-group-prepend ">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>

                                    <input id='eta' type="date" value="{{date('Y-m-d', strtotime($EventData->ETA))}}" class="custom-input form-control datetimepicker-input" data-inputmask-alias="datetime" data-inputmask-inputformat="mm/dd/yyyy" data-mask="" inputmode="numeric">

                                </div>
                                <div class="input-group mx-1 ">
                                    <div class="input-group-prepend ">
                                        <span class="input-group-text">Bid Due</span>
                                    </div>
                                    <div class="input-group-prepend ">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>

                                    <input id='biddue' type="date" value="{{date('Y-m-d', strtotime($DataQuotesMaster->BidDueDate))}}" class="custom-input form-control datetimepicker-input" data-inputmask-alias="datetime" data-inputmask-inputformat="mm/dd/yyyy" data-mask="" inputmode="numeric">

                                </div>
                                <button type="button" class="form-control btn btn-block btn-danger mx-1">Exclude</button>

                                <div class="input-group mx-1 ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">VSN #</span>
                                    </div>
                                    <input type="text" id="vsn" value="{{$DataQuotesMaster->VSNNo}}" class="form-control " disabled>
                                </div>
                                <div class="input-group mx-1">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Charg #</span>
                                    </div>
                                    <input type="text" id="charg" value="{{$DataQuotesMaster->FlipOrderNo}}" class="form-control " disabled>
                                </div>
                                <div class="input-group mx-1">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Time</span>
                                    </div>
                                    <input type="text" id="qtime" class="form-control ">
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="row py-1">
                        <div class="col-lg-2">
                            <div class="row py-1">
                                <div class="input-group  mx-1">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Code</span>
                                    </div>
                                    <input type="text" id="code" class="form-control ">
                                </div>
                            </div>
                            <div class="row py-1">
                                <div class="input-group   mx-1">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Contact</span>
                                    </div>
                                    <input type="text" id="contact" class="form-control ">
                                </div>
                            </div>
                            <div class="row py-1">
                                <div class="input-group   mx-1">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">IMO #</span>
                                    </div>
                                    <input type="text" id="imo_no" class="form-control ">
                                </div>
                            </div>
                            <div class="row py-1">
                                <div class="input-group   mx-1">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Port</span>
                                    </div>
                                    <input type="text" id="port" class="form-control ">
                                </div>
                            </div>
                            <div class="row py-1">
                                <div class="input-group  mx-1">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Warehouse</span>
                                    </div>
                                    {!! Ship::WarehouseDropdown($quotno) !!}
                                </div>
                            </div>
                            <div class="row py-1">
                                <button type="button" class="btn btn-block btn-secondary col-sm-6">Follow Up</button>
                            </div>

                        </div>
                        <div class="col-lg-4">
                                <div class="row py-1">
                                    <div class="input-group mx-1">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Terms</span>
                                        </div>
                                        {!! Ship::termsDropdown() !!}
                                    </div>
                                </div>
                                <div class="row py-1">
                                    <div class="input-group mx-1">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Status</span>
                                        </div>
                                        {!! Ship::statusDropdown() !!}
                                    </div>
                                </div>

                                <div class="row py-1">
                                    <div class="input-group mx-1">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Header</span>
                                        </div>
                                        <input type="text" id="header" class="form-control">
                                    </div>
                                </div>
                                <div class="row py-1">
                                    <div class="input-group mx-1">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Remarks</span>
                                        </div>
                                        <input type="text" id="remarks" class="form-control ">
                                    </div>
                                </div>
                                <div class="row py-1">
                                    <div class="input-group mx-1">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Created</span>
                                        </div>
                                        <input type="text" id="created" class="form-control ">
                                    </div>
                                </div>

                        </div>

                        <div class="col-lg-4">

                            <div class="row py-1">
                                <div class="input-group mx-1">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Assign</span>
                                    </div>
                                    <input type="text" id="assign" class="form-control">
                                </div>
                            </div>

                            <div class="row py-1">
                                <div class="input-group mx-1">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Sent</span>
                                    </div>
                                    <input type="text" id="sent" class="form-control ">
                                </div>
                            </div>

                            <div class="row py-1">
                                <div class="input-group mx-1">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Est Lines</span>
                                    </div>
                                    <input type="text" id="est_lines" class="form-control ">
                                </div>
                            </div>

                            <div class="row py-1">
                                <div class="input-group mx-1">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Created Date/Time</span>
                                    </div>
                                    <input type="text" id="created_datetime" class="form-control ">
                                </div>
                            </div>
                            <div class="row py-1">
                                <div class="input-group mx-1">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Bid Due Date/Time</span>
                                    </div>
                                    <input type="text" id="bid_due_datetime" class="form-control ">
                                </div>
                            </div>




                            <div class="form-inline ml-2">
                                <div class="checkbox ml-2">
                                    <label for="checkboxes-0">

                                        <input type="checkbox" name="checkboxes" id="checkboxes-0" value="1">
                                        Quote Entry
                                    </label>
                                </div>
                                <div class="checkbox ml-2">
                                    <label for="checkboxes-1">

                                        <input type="checkbox" name="checkboxes" id="checkboxes-1" value="2">
                                        Sent To Vendor
                                    </label>
                                </div>
                                <div class="checkbox ml-2">
                                    <label for="checkboxes-1">

                                        <input type="checkbox" name="checkboxes" id="checkboxes-2" value="2">
                                        Costed
                                    </label>
                                </div>
                                <div class="checkbox ml-2">
                                    <label for="checkboxes-1">

                                        <input type="checkbox" name="checkboxes" id="checkboxes-3" value="2">
                                        Cell Priced
                                    </label>
                                </div>
                                <div class="checkbox ml-2">
                                    <label for="checkboxes-1">

                                        <input type="checkbox" name="checkboxes" id="checkboxes-4" value="2">
                                        Re-Key
                                    </label>
                                </div>
                                <div class="checkbox ml-2">
                                    <label for="checkboxes-1">

                                        <input type="checkbox" name="checkboxes" id="checkboxes-5" value="2">
                                        Sent To Cust
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>






            </div>

            <!-- /form -->

        </div>


        <div class="card">

            <div class="card-body item-data ">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="form-group col-sm-1">
                                <label for="name" class="control-label">SNo.</label>
                                <input type="text" value='' class="form-control form-control-sm input-sm" id="sno">
                                <input type="hidden" value='' name="item_id" class="form-control  input-sm" id="item_id">
                            </div>
                            <div class="form-group col-sm-1">
                                <label style='margin:4px' for="name" class="control-label">Set <input type='checkbox' id="setchk"></label>
                                <i id="opnitemfull" style="cursor: pointer" class="fas fa-search text-primary"></i>
                                <input type="text" value='' class="form-control form-control-sm" id="item_code" />
                            </div>
                            <div class="form-group col-sm-1">
                                <label for="name" id="impbtn" style="cursor: pointer" class="control-label text-primary">IMPA</label>
                                <input type="text" value='' class="form-control form-control-sm" id="impa">
                            </div>
                            <div class="form-group col-sm-1">
                                <label for="name" class="control-label">UOM</label>
                                <input type="text" value='' class="form-control form-control-sm" id="uom">
                            </div>
                            <div class="form-group col-sm-1">
                                <label for="name" class="control-label">V-Part#</label>
                                <input type="text" value='' class="form-control form-control-sm" id="vpart_no">
                            </div>
                            <div class="form-group col-sm-1">
                                <label for="name" class="control-label">Qty.</label>
                                <input type="number" value='' class="form-control form-control-sm" onkeyup="reSum();" onblur="reSum();" id="qty">
                            </div>
                            <div class="form-group col-sm-2">
                                <label for="name" class="control-label">Vendor</label>
                                <select class="custom-select custom-select-sm" name="VenderName" id="Vendrorname">
                                    <option data-VenderCode id="vendoredit" value="" selected>Select one</option>
                                    @foreach ($department as $key=> $vendor)
                                    <option data-VenderCode="{{$vendor->VenderCode}}" value="{{$vendor->VenderCode}}">{{$vendor->VenderName}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-sm-1">
                                <label for="name" class="control-label">Vendor Price</label>
                                <input type="number" value='' class="form-control form-control-sm" id="vendor_price">
                            </div>
                            <div class="form-group col-sm-1">
                                <label for="name" class="control-label">Sell Price</label>
                                <input type="number" value='' class="form-control form-control-sm" tabindex="18" onkeyup="reSum();" onblur="reSum();" id="sell_price">
                            </div>
                            <div class="form-group col-sm-1">
                                <label for="name" class="control-label">Total</label>
                                <input type="number" readonly value='' class="form-control form-control-sm" id="total">
                            </div>
                            <div class="form-group col-sm-1 mt-auto">
                                <button class="btn btn-success btn-sm" id="saveitem" type="button">Add</button>
                                <button class="btn btn-primary btn-sm" id="clearform" type="button">Clear</button>
                            </div>
                        </div>
                    </div>

                </div>

                <?php echo View::make('partials.itemsearch') ?>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <div class="mb-2 form-inline">
                                    <label for="name" class="control-label">Item Desc</label>

                                </div>
                                <div id="suggestions"></div>

                                <textarea class="form-control" tabindex="1"  id="item_desc"
                                {{-- data-toggle="modal" data-target="#searchrmod" --}}
                                ></textarea>

                            </div>
                            <div class="form-group col-md-2">
                                <label for="name" class="control-label">Customer Notes</label>
                                <textarea class="form-control" id="customer_notes"></textarea>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="name" class="control-label">Vendor Notes</label>
                                <textarea class="form-control" id="notes"></textarea>
                            </div>
                            <div class="form-group col-md-2">
                                <!--label for="name" class="control-label">Item Desc</label -->
                                <div class="mb-2 form-inline">
                                    <label for="name" class="control-label">Internal Notes</label>

                                </div>

                                <textarea class="form-control" id="internal_notes"></textarea>
                            </div>
                            <div  class="form-group col-md-2">
                                <label for="name"  class="control-label">Vessel Notes</label>
                                <textarea class="form-control" id="vessel_notes"></textarea>
                            </div>
                        </div>

                    </div>
                </div>
<!-- Add the button to trigger the appearance of the element -->
{{-- <button type="button" class="btn btn-primary" id="showBtn">Show Element</button> --}}

<!-- Add the element to be displayed on click -->
<div class="position-fixed bg-success text-white rounded p-3" id="myElement" style="right: -300px; top: 50px; transition: right 0.5s;">
  <p>Items Saved Succsess. <i class="fa fa-check " ></i></p>
</div>




            </div>
        </div>

{{--
        <div  id="no-more-tables">

            {!! $output !!}
        </div> --}}

<div style="margin-top: -45px;" class="col-sm-12 mx-auto">
    <table class="table  table-inverse" id="itemsgrid">
        <thead class="bg-info ">
            <tr >
                <th class="px5">SNO</th>
                <th class="px5">IMPA</th>
                <th class="px5">Item&nbsp;Code</th>
                <th style="padding-left: 7rem;padding-right: 7rem">Item&nbsp;Name</th>
                <th class="px5">Qty</th>
                <th class="px5">UOM</th>
                <th class="px5">Vpart</th>
                <th class="px5">Vendor&nbsp;Price</th>
                <th class="px5">Sell&nbsp;Price</th>
                <th class="px5">Total&nbsp;Price</th>
                <th style="padding-left: 5rem;padding-right: 5rem">Vendor&nbsp;Name</th>
                <th class="px5">Customer&nbsp;Note</th>
                <th class="px5">Vendor&nbsp;Note</th>
                <th class="px5">Internal&nbsp;Buyer&nbsp;Note</th>
                <th hidden>vessel_notes</th>
                <th hidden>VendorCode</th>

            </tr>
        </thead>
        <tbody class=" " id="myTable">

@foreach ($quotesdetails as $item)
    <tr class="Edititems">

    <td>{{round($item->SNo)}}</td>
    <td>{{$item->impa}}</td>
    <td>{{$item->ItemCode}}</td>
    <td>{{$item->ItemName}}</td>
    <td title="Right Click For Edit" contentEditable="true" class="blurCell">{{$item->Qty}}</td>
    <td>{{$item->PUOM}}</td>
    <td>{{$item->VPart}}</td>
    <td title="Right Click For Edit" contentEditable="true" class="blurCell">{{round($item->VendorPrice,2)}}</td>
    <td title="Right Click For Edit" contentEditable="true" class="blurCell">{{round($item->SuggestPrice,2)}}</td>
    <td>{{round($item->Total,2)}}</td>
    <td>{{$item->VendorName}}</td>
    <td title="Right Click For Edit" contentEditable="true">{{$item->CustomerNotes}}</td>
    <td title="Right Click For Edit" contentEditable="true">{{$item->VendorNotes}}</td>
    <td title="Right Click For Edit" contentEditable="true">{{$item->InternalBuyerNotes}}</td>
    <td hidden>{{$item->VesselNote}}</td>
    <td hidden>{{$item->VendorCode}}</td>


    </tr>
@endforeach

        </tbody>
    </table>
    </div>


        <div class="card ">

            <div class="card-body">
               {{--  <div class="row">
                     <div class="col-md-12">
                         <div class="form-inline">
                             <div class="form-group col-md-1 mb-1">
                                 <label for="name" class="control-label">Items: <span id="footer_items">1</span></label>
                             </div>
                             <div class="form-group col-md-1 mb-1">
                                 <label for="name" class="control-label">Value: <span id="footer_value">1</span></label>
                             </div>
                             <div class="form-group col-md-1 mb-1">
                                 <label for="name" class="control-label">Cost: <span id="footer_cost">1</span></label>
                             </div>
                             <div class="form-group col-md-1 mb-1">
                                 <label for="name" class="control-label">Freight: <span id="footer_freight">1</span></label>
                             </div>

                             <div class="form-check col-md-2 mb-1">
                                 <label for="name" class="control-label">GP: <span id="footer_gp">1</span></label>
                                 <input type="checkbox" class="form-check-input ml-3" id="footer_kg_to_lb">
                                 <label class="form-check-label" for="footer_kg_to_lb">KG to LB</label>
                             </div>
                              <div class="form-group  mb-1">
                                 <button id="SaveDatabase" class="btn btn-primary w-40">SavetoBase</button>
                             </div>

                         </div>
                     </div>
                 </div>--}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="row py-1">
                            <button class="btn btn-primary col-sm-2 mx-1">Close</button>
                            <button class="btn btn-primary col-sm-2 mx-1">Send</button>
                            <button class="btn btn-primary col-sm-2 mx-1">Import</button>
                            <button class="btn btn-primary col-sm-2 mx-1">Export</button>
                            <button  onclick="window.open('/quotation/rfq/{{$quotno}}', 'newWindowName', 'height=800,width=1200,top=200,left=200');return false;" class="btn btn-primary col-sm-2 mx-1">RFQ</button>
                        </div>
                        <div class="row py-1">
                            <button class="btn btn-primary col-sm-2 mx-1">Colors</button>
                            <button class="btn btn-primary col-sm-2 mx-1">GP</button>
                            <button id="Recalc" class="btn btn-primary col-sm-2 mx-1">Recalc</button>
                            <button id="fliptovsn" class="btn btn-primary col-sm-2 mx-1">Flip to VSN</button>
                            <button class="btn btn-primary col-sm-2 mx-1">MCTC</button>
                        </div>
                        <div class="row py-1">
                            <button onclick="window.location.href='/quotation/pricing/{{$quotno}}'" class="btn btn-primary col-sm-2 mx-1"  >Pricing</button>
                            <button class="btn btn-primary col-sm-2 mx-1">Export with Cost</button>
                            <div class="form-check form-check-inline col-sm-2">
                                <label class="form-check-label ">
                                    <input class="form-check-input " type="checkbox"  name="ShowinKG" id="ShowinKG"  value=""> Show in KG
                                </label>
                            </div>
                            <input type="text" class="form-control col-sm-2 mx-1" />
                            <input type="text" class="form-control col-sm-2 mx-1" />



                        </div>
                    </div>

                    <div class="col-md-6">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col">Sales Amt</th>
                                    <th scope="col">Cost + Frght</th>
                                    <th scope="col">Profit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row"></th>
                                    <th scope="row"></th>
                                    <td id="salesum"></td>
                                    <td id="costfright"></td>
                                    <td id="profitt"></td>
                                </tr>

                                <tr>
                                    <th scope="row"><input style="width:50px" type="number" id="footer_inv_percent"  value="{{$inv}}"/></th>
                                    <th scope="row">% Inv/Cash Disc:</th>
                                    {{-- DiscIncomeAmt --}}
                                    <td id="invdsic">0</td>
                                    <td ></td>
                                    <td ></td>
                                </tr>
                                <tr>
                                    <th scope="row"><input style="width:50px" type="number" id="footer_cr_note_percent" value="{{$cr}}" /></th>
                                    <th scope="row">% Cr Note:</th>
                                    <td id="crnote"> </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th id="aviper" scope="row">{{$avi}}</th>
                                    <th scope="row">% AVI Rebate:</th>
                                    <td id="avireb"></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th id="volper" scope="row">{{$acp}}</th>
                                    <th scope="row">% Volume Disc:</th>
                                    <td id="volumedis"></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th id="slsper" scope="row">{{$sls}}</th>
                                    <th scope="row">% Sls Comm:</th>
                                    <td id="slscomm"></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row"></th>
                                    <th scope="row">NET SALE:</th>
                                    <td id="netsales"></td>
                                    <td id="netcost"></td>
                                    <td id="netprofit"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
<div class="mx-auto">
<input type="hidden" name="DepartmentCode" id="DepartmentCode" value="{{$DataQuotesMaster->DepartmentCode}}">
<input type="hidden" name="GodownCode" id="GodownCode" value="{{$DataQuotesMaster->GodownCode}}">
<input type="hidden" name="ChkDeckEngin" id="ChkDeckEngin" value="{{$TypeSetup->ChkDeckEngin}}">

</div>




<div class="modal fade" id="impalist" role="dialog">
    <div class="modal-dialog " style=" max-width: 100%;margin: 0;top: 0;bottom: 0;left: 0;right: 0;height: 100vh;display: flex;">
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
                    <div class="table-responsive">
                        <table class="table  table-inverse" id="Dg1">
                            <thead class="bg-info">
                                <tr>
                                    <th >IMPA&nbsp;Code</th>
                                    <th >Product&nbsp;Name</th>
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
                                $SPIMPAItem = DB::table('ItemSetup')->select('ItemCode', 'ItemName', 'UOM', 'Cost', 'VendorName', 'SalePrice', 'TypeName', 'LastUpdate', 'WorkUser', 'StockCode', 'VendorPN','VendorCode')
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




<div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="importForm" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="importModalLabel">Import Excel File</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="excel_file">Excel File</label>
                        <input type="file" name="excel_file" id="excel_file" class="form-control-file" accept=".xls, .xlsx, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" required>
                    </div>
                    <div class="row">

                        <div class="form-group mx-1">
                            <label for="start_row">Start Row</label>
                            <input type="number" name="start_row" id="start_row" class="form-control" required>
                        </div>
                        <div class="form-group mx-1">
                            <label for="start_column">Start Column</label>
                            <input type="text" name="start_column" id="start_column" class="form-control" required>
                        </div>
                        <div class="form-group mx-1">
                            <label for="end_column">End Column</label>
                            <input type="text" name="end_column" id="end_column" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group mx-1">
                            <label for="itemCodeColumn">Item Code Column</label>
                            <input type="text" name="itemCodeColumn" id="itemCodeColumn" class="form-control" required>
                        </div>
                        <div class="form-group mx-1">
                            <label for="itemNameColumn">Item Name Column</label>
                            <input type="text" name="itemNameColumn" id="itemNameColumn" class="form-control" required>
                        </div>
                        <div class="form-group mx-1">
                            <label for="uomColumn">UOM Column</label>
                            <input type="text" name="uomColumn" id="uomColumn" class="form-control" required>
                        </div>
                        <div class="form-group mx-1">
                            <label for="vendorPriceColumn">Price Column</label>
                            <input type="text" name="vendorPriceColumn" id="vendorPriceColumn" class="form-control" required>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Import</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->



    @stop

    @section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    {{-- <link rel="stylesheet" type="text/css" href="assets/css/ajaxsuccess.css"> --}}
    <style>
                        label.custom_label {
                            min-width: 106px;
                            justify-content: left;
                        }

                        .mw50 {
                            max-width: 75px;
                        }

                        .line {
                            border: 1px solid rgba(0, 0, 0, .125);
                        }

                        .custom-input {
                            max-width: 166px;
                        }


                    </style>

        @stop

        @section('js')

        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


        <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
{{-- <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script> --}}
{{-- <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script> --}}
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.colVis.min.js"></script>
<script>
    var itemtablle
$(document).ready(function() {
    itemtablle = $('#itemsgrid').DataTable({
        scrollY: 350,
        deferRender: true,
    scroller: true,
    paging: false,
    info:false,
    ordering:false,
    searching:false,
    dom: 'Bfrtip',
    // language: {
    //   "emptyTable": ""
    // },

            buttons: [


                {
                    text: 'Excel Import',
            className: 'btn btn-primary ',
            action: function ( e, dt, node, config ) {
                $('#file-input').click();
                }
        },

            {
                text: 'Print',
                className: 'btn btn-primary',

                action: function ( e, dt, node, config ) {
                    window.open("/print/quotation/{{$quotno}}","_blank");
                }
            },
            {
                text: 'Register Item',
                className: 'btn btn-primary',
                action: function ( e, dt, node, config ) {
                    RegisterItem();
                }
            },
            {
                text: 'Save All',
                className: 'btn btn-primary',
                action: function ( e, dt, node, config ) {
                    updateDataOrder();
                }
            },
            // 'colvis'
            ]

            // autoClose: true,
        //     columnDefs: [
        //          {
        //     targets: -1,
        //     visible: false
        // } ]

    });
    $(".dt-button").removeClass("dt-button")

} );
$(document).ready(function() {
//     var dataar = '{{json_encode($quotesdetails)}}';

// if(dataar.length === 2) {
//   $('.dataTables_empty').closest('tr').remove();
// }
var dataar = '{{json_encode($quotesdetails)}}';

if (dataar.length === 2) {
  $('.dataTables_empty').closest('tr').remove();
} else {
  // do something else, such as populate the table with data
}


});
$(document).ready(function() {
    $("#itemsgrid tbody").on("contextmenu", function(event) {
    event.preventDefault();
});

  $('#itemsgrid tbody').sortable({

  update: function(event, ui) {
    updateSNo();
  },
//   start: function(event, ui) {
//     // detach the contenteditable functionality from the cells
//     $('#itemsgrid tbody td').attr('contenteditable', false);
//   },
//   stop: function(event, ui) {
//     // reattach the contenteditable functionality to the cells
//     $('#itemsgrid tbody td').attr('contenteditable', true);
//   }
});
});
</script>
<script>
// {


$(document).ready(function() {

    var currentTabIndex = 0;
var maxTabIndex = $('#producers-table tbody tr').length;
$('#producers-table').on('keydown', 'tr', function(event) {
  var keyCode = event.keyCode || event.which;
  var currentTabIndex = parseInt($(this).attr('tabindex'));

  if (keyCode === 38) { // up arrow
    event.preventDefault();
    if (currentTabIndex > 3) {
      $('tr[tabindex="' + (currentTabIndex - 1) + '"]').focus();
    }
  } else if (keyCode === 40) { // down arrow
    event.preventDefault();
    if (currentTabIndex < ($('#producers-table tbody tr').length + 2)) {
      $('tr[tabindex="' + (currentTabIndex + 1) + '"]').focus();
    }
  }
});


// // Set tabindex for table rows
// $('#producers-table tbody tr').attr('tabindex', function(index) {
//     return index;
// }).on('focus', function() {
//     currentTabIndex = $(this).index();
// }).on('keydown', function(e) {
//     if (e.keyCode === 38 && currentTabIndex > 0) { // Up arrow
//         e.preventDefault();
//         currentTabIndex--;
//         $('#producers-table tbody tr').eq(currentTabIndex).focus();
//     } else if (e.keyCode === 40 && currentTabIndex < maxTabIndex - 1) { // Down arrow
//         e.preventDefault();
//         currentTabIndex++;
//         $('#producers-table tbody tr').eq(currentTabIndex).focus();
//     }
// });
$('#impbtn').click(function(){
//    alert();
        $('#impalist').modal('show');

});
$('#opnitemfull').click(function(){
//    alert();
        $('#searchrmodfull').modal('show');

});




$('#cusmod').hide();
    $('#impa').on('keypress', function(event){
if(event.keyCode === 13){
    console.log('going');
    var DepartmentCode = $('#DepartmentCode').val();
        var GodownCode = $('#GodownCode').val();
        var ChkDeckEngin = $('#ChkDeckEngin').val();
        $value=$(this).val();


        $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
    $.ajax({
    type : 'post',
    url : '{{URL::to('itemnameserimpa')}}',
    data:{
        'impa':$value,

},
beforeSend: function() {
        // Show the overlay and spinner before sending the request
        $('.overlay').show();
    },
    success:function(item){
        console.log(item);
        if (item.length > 1) {
            // alert('list');
            showSuggestions(item);
        } else if(item.length = 1) {
            $('#item_code').val(item[0].ITemCode);
    $('#item_desc').val(item[0].ItemName);
    $('#uom').val(item[0].UOM);
    $('#vpart_no').val(item[0].VPartCode);
    $('#vendor_price').val(parseFloat(item[0].VendorPrice).toFixed(2));
    $('#sell_price').val(parseFloat(item[0].OurPrice).toFixed(2));
    $('select[name="VenderName"]').val(item[0].VenderCode);
            // alert('item');
            // console.log(item[0].ITemCode);
        }
    },
    error: function(xhr, status, error) {
        // Handle error
    },
    complete: function() {
        // Hide the overlay and spinner after the request is complete
        $('.overlay').hide();
    }
    });
    }
});


function showSuggestions(item) {
  var suggestions = $('#suggestions');
  suggestions.empty();

  if (item.length === 0) {
    suggestions.hide();
    return;
  }

  var ul = $('<ul>').addClass('suggestions-list list-group').css({
    'position': 'absolute',
    'z-index': '100',
    'width': '460px'
  });

  for (var i = 0; i < item.length; i++) {
    var li = $('<li>')
      .addClass('list-group-item')
      .text(item[i].ItemName+',  Type : '+item[i].Type)
      .data('ITemCode', item[i].ITemCode)
      .data('ItemName', item[i].ItemName)
      .data('UOM', item[i].UOM)
      .data('Type', item[i].Type)
      .data('VendorPrice', item[i].VendorPrice)
      .data('VenderCode', item[i].VenderCode)
      .data('VenderName', item[i].VenderName)
      .data('OurPrice', item[i].OurPrice)
      .data('VPartCode', item[i].VPartCode)
    ul.append(li);
  }

  // adjust the position of the ul element
  ul.css({
    'top': -32 + 'px',
    'left': 4 + 'px'
  });

  suggestions.append(ul).show();
}

$(document).on('click', function(event) {
  var suggestions = $('#suggestions');
  // check if the clicked element is inside the suggestions box
  if (!$(event.target).closest(suggestions).length) {
    suggestions.hide();
  }
});
$(document).on('dblclick', '.suggestions-list li', function() {
    var suggestions = $('#suggestions');

    $('#item_code').val($(this).data('ITemCode'));
    $('#item_desc').val($(this).data('ItemName'));
    $('#uom').val($(this).data('UOM'));
    $('#vpart_no').val($(this).data('VPartCode'));
    $('#vendor_price').val(parseFloat($(this).data('VendorPrice')).toFixed(2));
    $('#sell_price').val(parseFloat($(this).data('OurPrice')).toFixed(2));
    $('select[name="VenderName"]').val($(this).data('VenderCode'));
    suggestions.hide();

});

    $('#file-input').on('change', function(){
    if ($(this).val() != '') {
        $('#import-button').click();
        $('#import-button').prop('disabled', false);
    } else {
        $('#import-button').prop('disabled', true);

    }
});



    $('#import-form').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
        $.ajax({
            type : 'post',
            url : '{{URL::to('import')}}',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {
        // Show the overlay and spinner before sending the request
        $('.overlay').show();
    },
            success: function(data) {
                console.log(data);
                // console.log(data.datarowes);
                let array = data.datarowes;

let table = document.getElementById("myTable");

for (let i = 0; i < array.length; i++) {
    let row = table.insertRow();
    // let buttonCell = row.insertCell();
    // buttonCell.innerHTML = '<button style="font-size: 10px" class="btn btn-secondary btn-sm Edititems" type="button"  data-ItemCode="'+array[i][2]+'" data-ItemName="'+array[i][3]+'" data-Qty="'+array[i][4]+'" data-PUOM="'+array[i][5]+'" data-VPart="'+array[i][6]+'" data-VendorPrice="'+array[i][7]+'" data-VendorName="'+array[i][10]+'" data-SellPrice="'+array[i][8]+'" data-Total="'+array[i][9]+'" data-IMPAItemCode="'+array[i][1]+'" data-CustomerNotes="'+array[i][11]+'"  data-Notes="'+array[i][12]+'" data-InternalBuyerNotes="'+array[i][13]+'"  data-VesselNote="vessel_notes" data-VendorCode="'+array[i][15]+'" data-counter="'+array[i][0]+'"> <i class="fa fa-pencil" aria-hidden="true"></i>Edit   </button>';
    for (let j = 0; j < 14; j++) {
        let cell = row.insertCell();
        cell.innerHTML = array[i][j];
    }
}

updateSNo();



            },
            error: function(data) {
                console.log(data);
                // handle errors
            },
    complete: function() {
        // Hide the overlay and spinner after the request is complete
        $('.overlay').hide();
    }
        });
    });
});
// });
//
//
//
//
// {
    //
// }
//


  function RegisterItem() {
    var DepartmentName = '{{$DataQuotesMaster->DepartmentName}}';
    var DepartmentCode = '{{$DataQuotesMaster->DepartmentCode}}';
window.open("/Item-Register-Setup?DepartmentName="+DepartmentName+"&DepartmentCode="+DepartmentCode);



    // <a href="">Go to Item-Register-Setup</a>

   };
   $(document).ready(function() {
//     $("#qty").on("keydown", function(event) {
//         if (event.key === "Enter") {
//             $('#saveitem').click();
//   }
// });

$('#Vendrorname').on('change', function() {
    var itemname = $('#item_desc').val();
    if (itemname == "") {
return;
}

var vendorName = $("#Vendrorname option:selected").text();
    var VenderCode = $("#Vendrorname option:selected").val();

    alert(VenderCode);

    $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                    });
                    $.ajax({
                        type : 'post',
                        url : '{{URL::to('searchvendor')}}',
                        data: {
                            VenderCode,
                            itemname,
                        },
                        beforeSend: function() {
        // Show the overlay and spinner before sending the request
        $('.overlay').show();
    },
                        success: function($response) {
                            // var itemcode = $response.itemcode;
                            if ($response.status=='Success') {
                                $('#vendor_price').val($response.VenderProductList.VendorPrice);
                            }

                            console.log($response);
                        }
                        ,
    complete: function() {
        // Hide the overlay and spinner after the request is complete
        $('.overlay').hide();
    }
                    });

});

   });
   $(document).ready(function() {
    var isCtrlPressed = false;

    $("#item_desc").on("keydown", function(event) {
      if(event.which === 17) { // Ctrl key
        isCtrlPressed = true;
      }
      else if(event.which === 32 && isCtrlPressed) { // Space key while Ctrl is pressed
        // alert("Ctrl + Space pressed");
        // $('#myModal').modal('show');
        $('#cusmod').show();
      }
    });

    $("#item_desc").on("keyup", function(event) {
      if(event.which === 17) { // Ctrl key
        isCtrlPressed = false;
      }
    });
    // $("#item_desc").on("keyup", function() {
    //     keywords = $('#item_desc').val();
    //     if (keywords.length = 3) {
    //         // $('#searchrmod').modal('show');
    //     $('#cusmod').show();

    // //   $('#itemnameser').val(keywords);

    //         // alert('yes');
    //     }
    // });



  });
$(document).on("click", '#clearform', function() {


    document.getElementById("sno").value = '';
     document.getElementById("item_code").value= '';
     document.getElementById("impa").value= '';
    document.getElementById("uom").value= '';
     document.getElementById("vpart_no").value= '';
    document.getElementById("qty").value= '';
     document.getElementById("Vendrorname").value= '';
     document.getElementById("vendoredit").value= '';
     document.getElementById("vendoredit").innerHTML= '';
     document.getElementById("vendor_price").value= '';
     document.getElementById("sell_price").value= '';
     document.getElementById("total").value= '';
     document.getElementById("item_desc").value= '';
     document.getElementById("customer_notes").value= '';
     document.getElementById("notes").value= '';
     document.getElementById("internal_notes").value= '';
    document.getElementById("vessel_notes").value= '';
    $("#Vendrorname").prop("disabled", false);
    $('#Vendrorname option:eq(0)').prop('selected', true);
    $('#Vendrorname').click();
    $('#vendoredit').click();


});




document.addEventListener("keydown", function(event) {

    if(event.altKey && event.keyCode == 67){

        $('#customer_notes').focus();
    }
    else if(event.altKey && event.keyCode == 86){
        // alert(event.keyCode);

        $('#notes').focus();
    }
    else if(event.altKey && event.keyCode == 73){
        // alert(event.keyCode);

        $('#internal_notes').focus();
    }
});






$(document).on("click", '#saveitem', function() {
//    alert('click'); // // Get the values of the input fields and select element


var itemCode = document.getElementById("item_code").value;
var qty = document.getElementById("qty").value;

    var sno = document.getElementById("sno").value;
    var impa = document.getElementById("impa").value;
    var uom = document.getElementById("uom").value;
    var vpart_no = document.getElementById("vpart_no").value;
    var vendorName = $("#Vendrorname option:selected").text();
    var VenderCode = $("#Vendrorname option:selected").val();
    var vendor_price = document.getElementById("vendor_price").value;
    var sell_price = document.getElementById("sell_price").value;
    var total = document.getElementById("total").value;
    var item_desc = document.getElementById("item_desc").value;
    var customer_notes = document.getElementById("customer_notes").value;
    var notes = document.getElementById("notes").value;
    var internal_notes = document.getElementById("internal_notes").value;
    var vessel_notes = document.getElementById("vessel_notes").value;

     var DepartmentName = '{{$DataQuotesMaster->DepartmentName}}';
    var DepartmentCode = '{{$DataQuotesMaster->DepartmentCode}}';
     var dataob = {
  'sno': sno,
  'impa': impa,
  'uom': uom,
  'vpart_no': vpart_no,
  'vendorName': vendorName,
  'VenderCode': VenderCode,
  'vendor_price': vendor_price,
  'sell_price': sell_price,
  'total': total,
  'item_desc': item_desc,
  'customer_notes': customer_notes,
  'notes': notes,
  'internal_notes': internal_notes,
  'vessel_notes': vessel_notes,
  'item_code': item_code,
  'qty': qty,
  'DepartmentName': DepartmentName,
  'DepartmentCode': DepartmentCode
};

var qty = $('#qty').val().trim();
var item_code = $('#item_code').val().trim();
// console.log(item_code);
// console.log(qty);
                if(item_code == "")
                {
                    if(qty == '' || qty == 0){

                        alert('Please enter quantity');
                    $('#qty').focus();
                        return;

                    }if($('#vendor').val() == ""){
                        alert('Please enter vendor');
                    $('#vendor').focus();
                        return;
                    } if(item_desc == ''){
                        alert('No Item Selected')
                        return;
                    }
                    if (confirm("You have to Add New Item From Registration Setup")) {
                        // console.log('ajaxgoing');
                        console.log(dataob);
                        if($('#vendor_price').val() == ""){
                            alert('Please add Vendor Price');
                        return;
                        }
                        if($('#uom').val() == ""){
                            alert('Please add UOM');
                        return;
                        }
                        RegisterItem();
    //                     $.ajaxSetup({
    //                 headers: {
    //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //                 }
    //                 });
    //                 $.ajax({
    //                     type : 'post',
    //                     url : '{{URL::to('adnewitem')}}',
    //                     data: {dataob,},
    //                     beforeSend: function() {
    //     // Show the overlay and spinner before sending the request
    //     $('.overlay').show();
    // },
    //                     success: function($response) {
    //                         var itemcode = $response.itemcode;
    //                         console.log($response);
    //                         contsaveitem(itemcode);
    //                     },
    // complete: function() {
    //     // Hide the overlay and spinner after the request is complete
    //     $('.overlay').hide();
    // }
    //                 });
    //                 return;
                    }else{
                        return;
                    }
                    // alert('need update');

                }
                if(qty == '' || qty == 0)
                {
                    alert('Please enter quantity');
                    $('#qty').focus();
                    return;
                }

                if($('#vendor').val() == "")
                {
                    alert('Please enter vendor');
                    $('#vendor').focus();
                    return;
                }




                itemcode = $('#item_code').val().trim();

                contsaveitem(itemcode);
//   setTimeout(function() {
//     console.log("...30sec!");
//   }, 30000);



  });

function contsaveitem(itemcode) {
    // var itemCode = document.getElementById("item_code").value;
var qty = document.getElementById("qty").value;
// alert(itemcode);
    var sno = document.getElementById("sno").value;
    var impa = document.getElementById("impa").value;
    var uom = document.getElementById("uom").value;
    var vpart_no = document.getElementById("vpart_no").value;
    var vendorName = $("#Vendrorname option:selected").text();
    var VenderCode = $("#Vendrorname option:selected").val();
    var vendor_price = document.getElementById("vendor_price").value;
    var sell_price = document.getElementById("sell_price").value;
    var total = document.getElementById("total").value;
    var item_desc = document.getElementById("item_desc").value;
    var customer_notes = document.getElementById("customer_notes").value;
    var notes = document.getElementById("notes").value;
    var internal_notes = document.getElementById("internal_notes").value;
    var vessel_notes = document.getElementById("vessel_notes").value;

     var item_code = itemcode;
     var qty = $('#qty').val().trim();


    var table = document.getElementById("myTable");

    // Create a new row
    var newRow = table.insertRow(-1);

    // Insert cells in the new row
    // var actionCell = newRow.insertCell(0);
    var snoCell = newRow.insertCell(0);
    var impaCell = newRow.insertCell(1);
    var itemCodeCell = newRow.insertCell(2);
    var item_descCell = newRow.insertCell(3);
    var qtyCell = newRow.insertCell(4);
    var uomCell = newRow.insertCell(5);
    var vpart_noCell = newRow.insertCell(6);
    var vendor_priceCell = newRow.insertCell(7);
    var sell_priceCell = newRow.insertCell(8);
    var totalCell = newRow.insertCell(9);
    var vendorNameCell = newRow.insertCell(10);
    var customer_notesCell = newRow.insertCell(11);
    var notesCell = newRow.insertCell(12);
    var internal_notesCell = newRow.insertCell(13);





    // Add the values to the cells
    // actionCell.innerHTML = '<button style="font-size: 10px" class="btn btn-secondary btn-sm Edititems" type="button"  data-ItemCode="'+itemCode+'" data-ItemName="'+item_desc+'" data-Qty="'+qty+'" data-PUOM="'+uom+'" data-VPart="'+vpart_no+'" data-VendorPrice="'+vendor_price+'" data-VendorName="'+vendorName+'" data-SellPrice="'+sell_price+'"      data-Total="'+total+'" data-IMPAItemCode="'+impa+'" data-CustomerNotes="'+customer_notes+'"  data-Notes="'+notes+'" data-InternalBuyerNotes="'+internal_notes+'"  data-VesselNote="'+vessel_notes+'" data-VendorCode="'+VenderCode+'" data-counter="'+sno+'"> <i class="fa fa-pencil" aria-hidden="true"></i>Edit   </button>';
    snoCell.innerHTML = sno;
    itemCodeCell.innerHTML = item_code;
    impaCell.innerHTML = impa;
    uomCell.innerHTML = uom;
    vpart_noCell.innerHTML = vpart_no;
    qtyCell.innerHTML = qty;
    qtyCell.contentEditable = true;
    qtyCell.setAttribute('class', 'blurCell');
    vendorNameCell.innerHTML = vendorName;
    vendor_priceCell.innerHTML = vendor_price;
    vendor_priceCell.setAttribute('class', 'blurCell');
    vendor_priceCell.contentEditable = true;
    sell_priceCell.innerHTML = sell_price;
    sell_priceCell.setAttribute('class', 'blurCell');
    sell_priceCell.contentEditable = true;
    totalCell.innerHTML = total;
    item_descCell.innerHTML = item_desc;
    customer_notesCell.innerHTML = customer_notes;
    customer_notesCell.contentEditable = true;
    notesCell.innerHTML = notes;
    notesCell.contentEditable = true;
    internal_notesCell.innerHTML = internal_notes;
    internal_notesCell.contentEditable = true;
    var vessel_notesCell = newRow.insertCell(14);
    vessel_notesCell.innerHTML = vessel_notes;
    vessel_notesCell.hidden = true;
    var vender_codeCell = newRow.insertCell(15);
    vender_codeCell.innerHTML = VenderCode;
    vender_codeCell.hidden = true;




    $('#clearform').click();

  ComposeTable();
  updateSNo();
  updateDataOrder();
}



function updateSNo() {
  var i = 0;
  if ($('#itemsgrid tbody tr').length > 0) {
    i = 1;
  }
  $('#itemsgrid tbody tr').each(function() {
    //   var button = $(this).find('td:first-child button');
    //   button.attr('data-counter', i);
      $(this).find('td:first-child').text(i);
    i++;
  });
}


  function updateDataOrder() {
    let table = document.getElementById('myTable');
        let rows = table.rows;
        let quote_no = '{{$quote_no}}';
        let event_no = '{{$EventNo}}';

    let dataarray = [];
for (let i = 0;  i < rows.length; i++) {


  let cells = rows[i].cells;
  dataarray.push({


    // actionCell: cells[0] ? cells[0].innerHTML : '',
    snoCell: cells[0] ? cells[0].innerHTML : '',
    impaCell: cells[1] ? cells[1].innerHTML : '',
    itemCodeCell: cells[2] ? cells[2].innerHTML : '',
    item_descCell: cells[3] ? cells[3].innerHTML : '',
    qtyCell: cells[4] ? cells[4].innerHTML : '',
    uomCell: cells[5] ? cells[5].innerHTML : '',
    vpart_noCell: cells[6] ? cells[6].innerHTML : '',
    vendor_priceCell: cells[7] ? cells[7].innerHTML : '',
    sell_priceCell: cells[8] ? cells[8].innerHTML : '',
    totalCell: cells[9] ? cells[9].innerHTML : '',
    vendorNameCell: cells[10] ? cells[10].innerHTML : '',
    customer_notesCell: cells[11] ? cells[11].innerHTML : '',
    notesCell: cells[12] ? cells[12].innerHTML : '',
    internal_notesCell: cells[13] ? cells[13].innerHTML : '',
    vessel_notesCell: cells[14] ? cells[14].innerHTML : '',
    vendor_codeCell: cells[15] ? cells[15].innerHTML : '',







  });
// }
}
var slscomm = ($('#slscomm').text());
var volumedis = ($('#volumedis').text());
var avireb = ($('#avireb').text());
var crnote = ($('#crnote').text());
var invdsic = ($('#invdsic').text());
var port = ($('#Warehouse').val());
var portcode = ($("#Warehouse option:selected").text());
var DepartmentCode = $('#DepartmentCode').val();
var departmentname = $('#departmentname').text();
var CustomerRefNo = '{{$DataQuotesMaster->CustomerRefNo}}';
 var allcom = parseFloat(parseFloat(slscomm)+parseFloat(volumedis)+parseFloat(avireb)+parseFloat(crnote)+parseFloat(invdsic));
 console.log(allcom);
// var allcom = (slscomm+volumedis+avireb+crnote+invdsic);

$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$.ajax({
    type : 'post',
    url : '{{URL::to('QuotationItemsave')}}',
    data: {
        dataarray,
        quote_no,
        event_no,
        allcom,
        port,
        portcode,
        DepartmentCode,
        departmentname,
        CustomerRefNo,
    },

    success: function($response) {

    document.getElementById("myElement").style.right = "0";

// Set a timeout to hide the element after 10 seconds
setTimeout(function() {
  // Set the right property of the element back to -300px to hide it
  document.getElementById("myElement").style.right = "-300px";
}, 10000);

    }
  });
}
$(document).ready(function () {
    $("#footer_inv_percent").on("keydown", function(event) {
        if (event.which === 13) {
            ComposeTable()
        }
    });
    $("#footer_cr_note_percent").on("keydown", function(event) {
        if (event.which === 13) {
            ComposeTable()
        }
    });
});


$(document).on("blur", '#footer_cr_note_percent', function() {
    ComposeTable()
});
$(document).on("blur", '#footer_inv_percent', function() {

    ComposeTable()
});
 function ComposeTable(){

     var invval = $('#footer_inv_percent').val();
     var crnoteval = $('#footer_cr_note_percent').val();
     var slsper = $('#slsper').val();
     var volper = $('#volper').val();
     var aviper = $('#aviper').val();
     $('#salesum').text(0);
     $('#invdsic').text(0);
     $('#slscomm').text(0);
     $('#crnote').text(0);
     $('#volumedis').text(0);
     $('#avireb').text(0);

    let table = document.getElementById('myTable');
        let rows = table.rows;
   let saletotal = 0;
   let Costtotal = 0;
    let dataarray = [];
for (let i = 0; i < rows.length; i++) {
  let cells = rows[i].cells;
  if (cells[8].innerHTML !== '0' && cells[8].innerHTML !== '' && cells[8].innerHTML !== '0.00') {
    rows[i].style.backgroundColor = '#abddc129';
}else{
      rows[i].style.backgroundColor = 'white';

  }
  dataarray.push({


    // actionCell: cells[0] ? cells[0].innerHTML : '',
    snoCell: cells[0] ? cells[0].innerHTML : '',
    impaCell: cells[1] ? cells[1].innerHTML : '',
    itemCodeCell: cells[2] ? cells[2].innerHTML : '',
    item_descCell: cells[3] ? cells[3].innerHTML : '',
    qtyCell: cells[4] ? cells[4].innerHTML : '',
    uomCell: cells[5] ? cells[5].innerHTML : '',
    vpart_noCell: cells[6] ? cells[6].innerHTML : '',
    vendor_priceCell: cells[7] ? cells[7].innerHTML : '',
    sell_priceCell: cells[8] ? cells[8].innerHTML : '',
    totalCell: cells[9] ? cells[9].innerHTML : '',
    vendorNameCell: cells[10] ? cells[10].innerHTML : '',
    customer_notesCell: cells[11] ? cells[11].innerHTML : '',
    notesCell: cells[12] ? cells[12].innerHTML : '',
    internal_notesCell: cells[13] ? cells[13].innerHTML : '',
    vessel_notesCell: cells[14] ? cells[14].innerHTML : '',
    vendor_codeCell: cells[15] ? cells[15].innerHTML : '',







  });
  cells[9].innerHTML = parseFloat(cells[4].innerHTML*cells[8].innerHTML).toFixed(2);
  saletotal+= Number(cells[9].innerHTML);
  Costtotal+= Number(cells[4].innerHTML*cells[7].innerHTML);
}

$('#salesum').text(parseFloat(saletotal).toFixed(2));
$('#invdsic').text(parseFloat((saletotal*invval/100)).toFixed(2));
$('#crnote').text(parseFloat(saletotal*crnoteval/100).toFixed(2));
$('#slscomm').text(parseFloat(saletotal*slsper/100).toFixed(2));
$('#volumedis').text(parseFloat(saletotal*volper/100).toFixed(2));
$('#avireb').text(parseFloat(saletotal*aviper/100).toFixed(2));
$('#costfright').text(parseFloat(Costtotal).toFixed(2));
$('#footer_items').text(rows.length);
$('#footer_value').text(parseFloat(saletotal).toFixed(2));
$('#footer_cost').text(parseFloat(Costtotal).toFixed(2));
$('#footer_gp').text(parseFloat(saletotal-Costtotal).toFixed(2));


var salse = ($('#salesum').text());
var slscomm = ($('#slscomm').text());
var volumedis = ($('#volumedis').text());
var avireb = ($('#avireb').text());
var crnote = ($('#crnote').text());
var invdsic = ($('#invdsic').text());
var costfright = ($('#costfright').text);
$('#profitt').text(parseFloat(saletotal-Costtotal).toFixed(2));
var pravit = $('#profitt').text();

// console.log(pravit);
// console.log(salse);
// console.log(slscomm);
// console.log(volumedis);
// console.log(avireb);
// console.log(crnote);
 var allcom = parseFloat(parseFloat(slscomm)+parseFloat(volumedis)+parseFloat(avireb)+parseFloat(crnote)+parseFloat(invdsic));
 console.log(salse);
 console.log(allcom);
$('#netsales').text((salse-allcom).toFixed(2));
$('#netcost').text(parseFloat(Costtotal+allcom).toFixed(2));
var netsales = $('#netsales').text();
var netcost = $('#netcost').text();
$('#netprofit').text((netsales-netcost).toFixed(2));

// console.log();
// return dataarray;
 }

//  }
$(document).ready(function () {
    ComposeTable();
    // Get the elements we need
const cusmodEl = document.querySelector('#cusmod');
const qtyEl = document.querySelector('#qty');

// Check if the "cusmod" element has "display: none" applied
if (window.getComputedStyle(cusmodEl).display === 'none') {
  // Set the tab index of the "qty" element to 3
  qtyEl.setAttribute('tabindex', 17);
}

$('#fliptovsn').click(function(e){
    let table = document.getElementById('myTable');
    let rows = table.rows;
    let checkitem=0;
    for (let i = 0; i < rows.length; i++) {
    let cells = rows[i].cells;
    if(cells[2].innerHTML !== '0' && cells[2].innerHTML !== ''){
        checkitem+= Number(1);
    }

    }
    console.log(rows.length);
    console.log(checkitem);
    if(checkitem = rows.length){
        window.location.href="quotation/fliptovsn/{{$EventNo}}";
        // alert('sent');
    }else{

        alert('Please Check Item Code');
    }
});

});

 $(document).on("click", '#Recalc', function() {
    let quote_no = '{{$quote_no}}';
    let event_no = '{{$EventNo}}';
    var kg_to_lb = $("#footer_kg_to_lb").is(":checked");
    var Warehousecode = $('#Warehouse').val();
    var Warehousename = $("#Warehouse option:selected").text();

    // console.log(kg_to_lb);



        let table = document.getElementById('myTable');
        let rows = table.rows;

    let dataarray = [];
for (let i = 1; i < rows.length; i++) {
  let cells = rows[i].cells;
  dataarray.push({


    // actionCell: cells[0] ? cells[0].innerHTML : '',
    snoCell: cells[0] ? cells[0].innerHTML : '',
    impaCell: cells[1] ? cells[1].innerHTML : '',
    itemCodeCell: cells[2] ? cells[2].innerHTML : '',
    item_descCell: cells[3] ? cells[3].innerHTML : '',
    qtyCell: cells[4] ? cells[4].innerHTML : '',
    uomCell: cells[5] ? cells[5].innerHTML : '',
    vpart_noCell: cells[6] ? cells[6].innerHTML : '',
    vendor_priceCell: cells[7] ? cells[7].innerHTML : '',
    sell_priceCell: cells[8] ? cells[8].innerHTML : '',
    totalCell: cells[9] ? cells[9].innerHTML : '',
    vendorNameCell: cells[10] ? cells[10].innerHTML : '',
    customer_notesCell: cells[11] ? cells[11].innerHTML : '',
    notesCell: cells[12] ? cells[12].innerHTML : '',
    internal_notesCell: cells[13] ? cells[13].innerHTML : '',
    vessel_notesCell: cells[14] ? cells[14].innerHTML : '',
    vendor_codeCell: cells[15] ? cells[15].innerHTML : '',







  });

}
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$.ajax({
    type : 'post',
    url : '{{URL::to('Recal')}}',
    data: {
        quote_no,
        event_no,
        dataarray,
        kg_to_lb,
        Warehousecode,
        Warehousename,


    },
    beforeSend: function() {
        // Show the overlay and spinner before sending the request
        $('.overlay').show();
    },
    success: function($response) {

      if($response.Message == 'Converted to LB'){

          alert(
              'Success : '+$response.Message
              );
            }else{
                console.log($response.Message);
            }
            console.log($response.Success);
      console.log($response.datarowes);
    //   console.log($response.insert_update);
    },
    complete: function() {
        // Hide the overlay and spinner after the request is complete
        $('.overlay').hide();
    }
  });

});

  $(document).on("blur", '.blurCell', function() {
   ComposeTable();

});
// }
</script>







        <script>
var th = ['','thousand','million', 'billion','trillion'];
var dg = ['zero','one','two','three','four', 'five','six','seven','eight','nine'];
 var tn = ['ten','eleven','twelve','thirteen', 'fourteen','fifteen','sixteen', 'seventeen','eighteen','nineteen'];
 var tw = ['twenty','thirty','forty','fifty', 'sixty','seventy','eighty','ninety'];

function toWords(s) {
    s = s.toString();
    s = s.replace(/[\, ]/g,'');
    if (s != parseFloat(s)) return 'not a number';
    var x = s.indexOf('.');
    if (x == -1)
        x = s.length;
    if (x > 15)
        return 'too big';
    var n = s.split('');
    var str = '';
    var sk = 0;
    for (var i=0;   i < x;  i++) {
        if ((x-i)%3==2) {
            if (n[i] == '1') {
                str += tn[Number(n[i+1])] + ' ';
                i++;
                sk=1;
            } else if (n[i]!=0) {
                str += tw[n[i]-2] + ' ';
                sk=1;
            }
        } else if (n[i]!=0) { // 0235
            str += dg[n[i]] +' ';
            if ((x-i)%3==0) str += 'hundred ';
            sk=1;
        }
        if ((x-i)%3==1) {
            if (sk)
                str += th[(x-i-1)/3] + ' ';
            sk=0;
        }
    }

    if (x != s.length) {
        var y = s.length;
        str += 'point ';
        for (var i=x+1; i<y; i++)
            str += dg[n[i]] +' ';
    }
    return str.replace(/\s+/g,' ');
}


        </script>

        {{-- <link rel="stylesheet" href="{{ URL::asset('assets/ajax-live-search/css/fontello.css') }}"> --}}
        {{-- <link rel="stylesheet" href="{{ URL::asset('assets/ajax-live-search/css/animation.css') }}"> --}}
        {{-- <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/ajax-live-search/css/ajaxlivesearch.css') }}"> --}}
        <!--  -->
        {{-- <script src="{{ URL::asset('assets/ajax-live-search/js/ajaxlivesearch.js') }}"></script> --}}

        <script>

        </script>
  <script type="text/javascript" src="assets/js/printThis.js"></script>

        <script>
            $(document).ready(function () {
                $("#qty").on("keydown", function(event) {
  if (event.which === 13) {
    $("#saveitem").click();


  }
});
$("#sell_price").on("keydown", function(event) {
  if (event.which === 13) {
    $("#saveitem").click();


  }
});
$("#vendor_price").on("keydown", function(event) {
  if (event.which === 13) {
    $("#saveitem").click();


  }
});
            });


$(document).ready(function() {

var table = document.getElementById("itemsgrid");

// Add event listener for double-click on table rows
table.addEventListener("dblclick", function(event) {

  // Get the row index of the double-clicked row
  var rowIndex = event.target.parentElement.rowIndex;

  // Get the first cell value of the selected row (Serial Number)
  var serialNumber = table.rows[rowIndex].cells[0].innerHTML;

  // Get the values for the other cells in the selected row
  var impa = table.rows[rowIndex].cells[1].innerHTML;
  var itemCode = table.rows[rowIndex].cells[2].innerHTML;
  var itemName = table.rows[rowIndex].cells[3].innerHTML;
  var qty = table.rows[rowIndex].cells[4].innerHTML;
  var uom = table.rows[rowIndex].cells[5].innerHTML;
  var vpart = table.rows[rowIndex].cells[6].innerHTML;
  var vendorPrice = table.rows[rowIndex].cells[7].innerHTML;
  var sellPrice = table.rows[rowIndex].cells[8].innerHTML;
  var total = table.rows[rowIndex].cells[9].innerHTML;
  var vendorname = table.rows[rowIndex].cells[10].innerHTML;
  var customerNote = table.rows[rowIndex].cells[11].innerHTML;
  var vendorNote = table.rows[rowIndex].cells[12].innerHTML;
  var internalBuyerNote = table.rows[rowIndex].cells[13].innerHTML;
  var vesselNote = table.rows[rowIndex].cells[14].innerHTML;
  var vendorcode = table.rows[rowIndex].cells[15].innerHTML;

  // Set the values for the fields in the form
  document.querySelector('#sno').value = serialNumber;
  document.querySelector('#impa').value = impa;
  document.querySelector('#item_code').value = itemCode;
  document.querySelector('#item_desc').value = itemName;
  document.querySelector('#qty').value = qty;
  document.querySelector('#uom').value = uom;
  document.querySelector('#vpart_no').value = vpart;
  document.querySelector('#vendor_price').value = vendorPrice;
  document.querySelector('#sell_price').value = sellPrice;
  document.querySelector('#total').value = total;
  document.querySelector('#customer_notes').value = customerNote;
  document.querySelector('#notes').value = vendorNote;
  document.querySelector('#internal_notes').value = internalBuyerNote;
  document.querySelector('#vessel_notes').value = vesselNote;

  const vendorSelect = document.querySelector('#Vendrorname');
    const vendorOption = vendorSelect.querySelector(`option[value="${vendorcode}"]`);
    vendorOption.selected = true;
// });
table.rows[rowIndex].remove();
updateSNo();


});
});


            function reSum()
        {

            var qty = parseInt($('#qty').val());
                    var sell_price = parseFloat($('#sell_price').val())
                    if(!isNaN(qty) && !isNaN(sell_price))
                    {
                        var amonut = qty*sell_price
                        $('#total').val(amonut.toFixed(2));
                    }

        }





        </script>


        @stop


        @section('content')
