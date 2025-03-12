@extends('layouts.app')



@section('title', 'Charge List VSN')

@section('content_header')
<meta name="csrf-token" content="{{ csrf_token() }}" />

@stop

@section('content')
</div>
<div class="container-fluid small">
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
    <div class="row">
    <header class="col-sm-8 mx-auto">
        <h5>Charge List Of VSN</h5>
    </header>

</div>
    <div class="card
     {{-- collapsed-card --}}
      mt-3">
        <div  style="background-color:#EEE; " class="card-header">
            <!-- h5 class="card-title"></h5 -->
            <div class="form-inline">

                            <div  class="input-group  ml-2 mb-2">
                                <strong >VSN # :</strong> <label  class="VSN text-blue">{{$VSN}}</label>
                            </div>

                            <div class="input-group  ml-5 mb-2">
                                /&nbsp; <strong>Event # :&nbsp;</strong> <label class="event_no text-blue" for="event_no">{{$value->EventNo}}</label>

                            </div>
                            <div class="input-group  ml-5 mb-2">
                                /&nbsp;  <strong>Customer :&nbsp;</strong> <label class="customer text-blue" for="customer">{{$value->CustomerName}}</label>

                            </div>
                            <div class="input-group  ml-5 mb-2">
                                /&nbsp;  <strong>Vessel :&nbsp;</strong> <label class="vessel text-blue" for="vessel">{{$value->VesselName}}</label>

                            </div>
                            <div class="input-group  ml-5 mb-2">
                                /&nbsp;  <strong>Customer Ref # :&nbsp;</strong> <label class="customer_ref_no text-blue" for="customer_ref_no">{{$value->CustomerRef}}</label>

                            </div>
                            <div class="col-sm-2" style="margin-left: 150px">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <button  class="border">Bank Information</button>
                                    </div>
                                    <div class="col-sm-6">
                                    <button  class="border">Billing Information</button>
                                </div>
                                </div>
                            </div>
                            <div class="input-group  ml-5 mb-2">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
            </div>



        </div>
                        <div class="card-body">
                            <div class="col-lg-12 pb-2">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"  id="dd">Delivery Date :</span>
                                            </div>
                                            <input class="form-control" value="{{date('Y-m-d', strtotime($value->DeliveryDate))}}" type="date" id="deliverydate" name="deliverydate" >
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"  id="dtime">Time :</span>
                                            </div>
                                            <input class="form-control" type="time" value="{{$value->Time}}" id="Time" name="Time" >
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"  id="loc">location :</span>
                                            </div>
                                            <input class="form-control" type="text" value="{{$value->Location}}" id="location" name="location" >
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"  id="loc">port :</span>
                                            </div>
                                            <select class="custom-select" name="" id="">
                                                <option selected>{{$value->Port}}</option>
                                                <option value=""></option>
                                                <option value=""></option>
                                                <option value=""></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"  id="ware">WareHouse:</span>
                                            </div>
                                            <select disabled class="custom-select" name="" id="">
                                                <option selected>{{$value->GodownName}}</option>
                                                <option value=""></option>
                                                <option value=""></option>
                                                <option value=""></option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="row py-2">
                                    <div class="col-sm-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"  id="ware">Event Note:</span>
                                            </div>

                                              <textarea class="form-control" name="" id="" rows="1"></textarea>

                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"  id="ware">Customer Comments:</span>
                                            </div>
                                            <textarea class="form-control" name="" id="" rows="1"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"  id="ware">WareHouse:</span>
                                            </div>
                                            <textarea class="form-control" name="" id="" rows="1"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"  id="ware">VSN Status:</span>
                                            </div>
                                            <select  class="custom-select" name="" id="">
                                                <option selected>Select one</option>
                                                @foreach ($Statut as $item)
                                                <option value="{{$item->StatusCode}}">{{$item->StatusName}}</option>

                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
        </div>


        <ul class="nav pb-2 ">


            <li class="nav-link btn bg-info mr-1"><a data-toggle="pill" href="#Charges">Charges</a></li>
            <li class="nav-link btn bg-info ml-1 mr-1"><a data-toggle="pill" href="#purchase">Purchase Order</a></li>
            <li class="nav-link btn bg-info ml-1 mr-1"><a data-toggle="pill" href="#dm">DM</a></li>
            <li class="nav-link btn bg-info ml-1 "><a data-toggle="pill" href="#direct">Direct Invoice</a></li>


          </ul>



          <div class="tab-content">
            <div id="Charges" class="tab-pane  in active">

        <div class="col-lg-12">
        <div class="rounded shadow mx-auto">
           <table class="table table-hover table-inverse table-responsive "  id="chargestable">
            <thead class="bg-info">

                <tr scope="row">
                    <th>Charge#</th>
                    <th>Department</th>
                    <th>H</th>
                    <th>Terms</th>
                    <th>Cust.Ref</th>
                    <th>Buyer</th>
                    <th>Status</th>
                    <th>Order.Amount</th>
                    <th>Order.Qty</th>
                    <th>Rcvd.Qty</th>
                    <th>Pull.Qty</th>
                    <th>Ready.Qty</th>
                    <th>Cancel.Qty</th>
                    <th>Dlvrd.Qty</th>
                    <th>Rtn.Qty</th>
                    <th>Missing.Qty</th>
                    <th>Sold.Qty</th>
                    <th>Sal.Rtn</th>
                    <th>Shipped</th>
                    <th>QuoteNo</th>
                    <th>Dlv/Inv.Amt</th>
                    <th>Cost.Amt</th>
                    <th>Gp.Amt</th>
                    <th>Gp.%</th>
                    <th>Pending.PO</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($ordermaster as $item)

                    <tr scope="row" data-PONo="{{$item->PONo}}" id="">

                        <td >{{$item->PONo}}</td>
                        <td >{{$item->DepartmentName}}</td>
                        <td ></td>
                        <td >{{$item->Terms}}</td>
                        <td >{{$item->CustomerRefNo}}</td>
                        <td >{{$item->Buyer}}</td>
                        <td >{{$item->Status}}</td>
                        <td class="text-right">{{round($item->ExtAmount,2)}}</td>
                        <td >{{round($parme->OrderQty,2)}}</td>
                        <td >{{round($parme->RecQty,2)}}</td>
                        <td >{{round($parme->PullQty,2)}}</td>
                        <td >{{round($parme->PullQty+$parme->RecQty,2)}}</td>
                        <td >{{round($parme->CancelQty,2)}}</td>
                        <td >{{round($parme->DeliveredQty,2)}}</td>
                        <td >{{round($parme->ReturnQty,2)}}</td>
                        <td >{{round($parme->MissingQty,2)}}</td>
                        <td >{{round($parme->SoldQty,2)}}</td>
                        <td >{{round($item->SaleReturnQty,2)}}</td>
                        <td >{{$item->ChkShipped}}</td>
                        <td >{{$item->QuoteNo}}</td>
                        <td class="text-right">{{round($item->NetAmount,2)}}</td>
                        <td class="text-right">{{round(($item->GPCostAmt)+($item->CrNoteAmt)+($item->CrNoteAmount)+($item->SlsCommAmt)+($item->AVIRebateAmt)+($item->AgentCommAmt),2)}}</td>
                        <td class="text-right">{{round($item->TotGPAmt,2)}}</td>
                        <td >{{round($item->GPPer,2)}}</td>
                        <td >Query</td>
                        {{-- <td scope="row">{{$sqldv}}</td> --}}


                    </tr>
                    @endforeach

                </tbody>
           </table>

                </div>
                </div>
            </div>

            <div id="purchase" class="tab-pane  in fade">

                <div class="col-lg-12 mx-auto">
                    <div class="rounded shadow ml-2">
                       <table class="table table-hover table-inverse
                       {{-- table-responsive --}}
                       "
                       id="purchasetable"
                       >
                        <thead class="bg-info">

                            <tr>
                                <th>Charge#</th>
                                <th>Department</th>
                                <th>Po#</th>
                                <th>Vendor Name</th>
                                <th>Req Data</th>
                                <th>Time</th>
                                <th>Frgt</th>
                                <th>PO Date</th>
                                <th>PO Amount</th>
                                <th>Order Qty</th>
                                <th>Rec Qty</th>
                                <th>Not Rec Qty</th>
                                <th>Return Qty</th>
                                <th>Cancel Qty</th>
                                <th>Ok To Pay</th>
                                <th>GP Amount</th>
                                <th>GP %</th>

                            </tr>
                            </thead>
                            {{-- <tbody>
                                @foreach ($PurchaseOrderMaster as $Pitem)
                                @php
                                $rtnqty = DB::table('PurchaseReturnMaster')->where('PurchaseOrderNo',$Pitem->PurchaseOrderNo)->where('BranchCode',$BranchCode)->sum("TotalReturnQty");
                                @endphp
<script>
$('#return{{$Pitem->PurchaseOrderNo}}').text({{$rtnqty}});
</script>
                                <tr data-PONo="{{$Pitem->PurchaseOrderNo}}">

                                    <td>{{$Pitem->ChargeNo}}</td>
                                    <td>{{$Pitem->DepartmentName}}</td>
                                    <td>{{$Pitem->PurchaseOrderNo}}</td>
                                    <td>{{$Pitem->VendorName}}</td>
                                    <td>{{date('d-M-Y', strtotime($Pitem->ReqDate))}}</td>
                                    <td>{{$Pitem->Time}}</td>
                                    <td>{{$Pitem->Freight}}</td>
                                    <td>{{date('d-M-Y', strtotime($Pitem->PODate))}}</td>
                                    <td>{{round($Pitem->POAmount,2)}}</td>
                                    <td>{{round($Pitem->OrderQty,2)}}</td>
                                    <td>{{round($Pitem->RecQty,2)}}</td>
                                    <td>{{round(($Pitem->OrderQty)-($Pitem->RecQty),2)}}</td>
                                    <td id="return{{$Pitem->PurchaseOrderNo}}"><td>
                                    {{--
                                    <td>{{$Pitem->CancelQty ? round($Pitem->CancelQty,2) : 0}}</td>
                                    <td>{{$Pitem->OKToPay ? $Pitem->OKToPay : 'Yes'}}</td>
                                    <td>{{$Pitem->TotalReturnAmount ?  ($Pitem->POAmount)-($Pitem->TotalReturnAmount)-($MMPOAmt) : 0}}</td>
                                    <td>{{ ($MMPOAmt != 0) ? ($Pitem->POAmount)-($Pitem->TotalReturnAmount)-($MMPOAmt)/($MMPOAmt)*100 : ($Pitem->POAmount)-($Pitem->TotalReturnAmount)-(1)/(1)*100 }}</td>


                                </tr>
                                @endforeach

                            </tbody> --}}
                            <tbody>
                                @foreach ($PurchaseOrderMaster as $key=> $Pitem)
                                @php
                                    $Mrtnqty = DB::table('PurchaseReturnMaster')->where('PurchaseOrderNo',$Pitem->PurchaseOrderNo)->where('BranchCode',$BranchCode)->sum("TotalReturnQty");

                                @endphp
                                <tr data-PONo="{{$Pitem->PurchaseOrderNo}}">
                                    <td>{{$Pitem->ChargeNo}}</td>
                                    <td>{{$Pitem->DepartmentName}}</td>
                                    <td>{{$Pitem->PurchaseOrderNo}}</td>
                                    <td>{{$Pitem->VendorName ? $Pitem->VendorName : 'Vendor Not Saved'}}</td>
                                    <td>{{$Pitem->ReqDate ? (date('d-M-Y', strtotime($Pitem->ReqDate))) : 'NoData'}}</td>
                                    <td>{{$Pitem->Time}}</td>
                                    <td>{{$Pitem->Freight}}</td>
                                    <td>{{$Pitem->PODate ? (date('d-M-Y', strtotime($Pitem->PODate))) : 'NoData'}}</td>
                                    <td>{{round($Pitem->POAmount,2)}}</td>
                                    <td>{{round($Pitem->OrderQty,2)}}</td>
                                    <td>{{round($Pitem->RecQty,2)}}</td>
                                    <td>{{round(((int)$Pitem->RecQty)-((int)$Pitem->OrderQty),2)}}</td>
                                    <td>{{round($Mrtnqty,2)}}</td>
                                    <td>{{$Pitem->CancelQty ? round($Pitem->CancelQty,2) : 0}}</td>
                                    <td>{{$Pitem->OKToPay ? $Pitem->OKToPay : 'Yes'}}</td>
                                    <td>{{$Pitem->TotalReturnAmount ?  ($Pitem->POAmount)-($Pitem->TotalReturnAmount)-($MMPOAmt) : 0}}</td>
                                    <td>{{ ($MMPOAmt != 0) ? ($Pitem->POAmount)-($Pitem->TotalReturnAmount)-($MMPOAmt)/($MMPOAmt)*100 : ($Pitem->POAmount)-($Pitem->TotalReturnAmount)-(1)/(1)*100 }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                       </table>

                            </div>
                            </div>
</div>
<div id="contextMenu" class="context-menu" >
    <!-- Add your custom menu options here -->
    <ul>
        <li><span class='Gainsboro'></span>&nbsp;<span>Gainsboro </span></li>
        <li><span class='Orange'></span>&nbsp;<span>Orange</span></li>
        <li><span class='Plum'></span>&nbsp;<span>Plum</span></li>
    </ul>
  </div>
<div id="dm" class="tab-pane  in fade">
    <div class="col-lg-11 mx-auto">
        <div class="rounded shadow ">
           <table class="table table-hover table-inverse table-responsive"
           {{-- id="DMtable" --}}
           >
            <thead class="bg-info">

                <tr>
                    <th>Charge #</th>
                    <th>Department</th>
                    <th>PO #</th>
                    <th>Vendor Name</th>
                    <th>Work User</th>
                    <th>Status</th>
                    <th>Rtn Qty</th>
                    <th>Return Amt</th>
                    <th>Return To Vendor</th>
                    <th>Rtn Vendor Amount</th>
                    <th>Move To Stock Amount</th>
                    <th>Missing Exp</th>
                    <th>Missing Amount</th>
                    <th>RTN Balance</th>

                </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($dmdisplay as $ditem)

                    <tr>

                        <td scope="row">{{$ditem->ChargeNo}}</td>
                        <td scope="row">{{$ditem->DepartmentName}}</td>
                        <td scope="row">{{$ditem->POMadeNo}}</td>
                        <td scope="row">{{$ditem->VendorName}}</td>
                        <td scope="row">{{$ditem->WorkUser}}</td>
                        <td scope="row"><?php
                    //    $DMRTNBal = ($ditem->MReturnQty) - ($ditem->DMReturnQty) + ($ditem->DMMoveToStock) + ($ditem->DMMissingQty);
                    //    if ($DMRTNBal>0) {
                    //     $dmstatus = 'Pending';
                    //    }
                    //    else {
                    //     $dmstatus = 'Completed';
                    //    }
                    //    echo$dmstatus;
                        ?></td>
                        <td scope="row">{{$ditem->MReturnQty}}</td>
                        <td scope="row">{{$ditem->MReturnCostAmt}}</td>
                        <td scope="row">{{$ditem->DMReturnQty}}</td>
                        <td scope="row">{{$ditem->DMReturnAmt}}</td>
                        <td scope="row">{{$ditem->DMMoveToStock}}</td>
                        <td scope="row">{{$ditem->DMMissingQty}}</td>
                        <td scope="row">{{$ditem->DMMissingAmt}}</td>
                        <td scope="row"><?php //echo$DMRTNBal;?></td>



                    </tr>
                    @endforeach --}}

                </tbody>
           </table>

                </div>
                </div>
</div>
<div id="direct" class="tab-pane  in fade">
    <div class="col-lg-12 mx-auto">
        <div class="rounded shadow ">


                </div>
                </div>

            </div>
        </div>

<div class="col-lg-12">
    <div class="row py-1">
        <div class="form-check form-check-inline">
            <label class="form-check-label text-info mx-1">
                <input class="form-check-input " type="checkbox"  name="ChkKG" id="ChkKG" checked value=""> Show in KG
            </label>
        </div>
        <input class="" type="text"  name="hidpono" id="hidpono"  value="">
    </div>
    <div class="row py-2">
        <div class="custombtn">
            <a name="" id="btnProforma" class="btn form-control btn-default"  role="button">Proforma</a>
        </div>
        <div class="custombtn">
            <a name="" id="" class="btn form-control btn-default" href="#" role="button">Ship Name</a>
        </div>
        <div class="custombtn">
            <a name="" id="" class="btn form-control btn-default" href="#" role="button">Not Recv RPT</a>
        </div>
        <div class="custombtn">
            <a name="" id="" class="btn form-control btn-default" href="#" role="button">Pull Stock Rep</a>
        </div>
        <div class="custombtn">
            <a name="" id="" class="btn form-control btn-default" href="#" role="button">Edit Vsn</a>
        </div>
        <div class="custombtn">
            <a name="" id="" class="btn form-control btn-default" href="#" role="button">Order Status</a>
        </div>
        <div class="custombtn">
            <a name="" id="" class="btn form-control btn-default" href="#" role="button">Direct Invoice</a>
        </div>

    </div>
    <div class="row">
        <div class="custombtn">
            <a name="" id="" class="btn form-control btn-default" href="#" role="button">Hazmate</a>
        </div>
        <div class="custombtn">
            <a name="" id="" class="btn form-control btn-default" href="/ShipDr/{{$VSN}}" role="button">Shipped DR</a>
        </div>
        <div class="custombtn">
            <a name="" id="" class="btn form-control btn-default" href="#" role="button">Order Transfer</a>
        </div>
        <div class="custombtn">
            <a name="" id="" class="btn form-control btn-default" href="#" role="button">Order VSN GP</a>
        </div>
        <div class="custombtn">
            <a name="" id="" class="btn form-control btn-success" href="#" role="button"><i class="fa fa-arrow-right" aria-hidden="true"></i> Send</a>
        </div>
        <div class="custombtn">
            <a name="" id="" class="btn form-control btn-danger" href="#" role="button">Close</a>
        </div>
        <div class="custombtn">
            <a name="" id="" class="btn form-control btn-default" href="#" role="button">Cost Print</a>
        </div>
    </div>
</div>
</div>
<div class='context-menu'>
    <ul>
        <li id="createpo" data-link="purchase-order"><span>Create PO </span></li>
        <li id="PO-Received" data-link="PO-Received"><span>PO-Purchased </span></li>
        <li id="deliverorder" data-link="Delivery-Order"><span>Delivry Order</span></li>
        <li id="finalinvoice" data-link="Final-Invoice"> <span>Final Invoice</span></li>
    </ul>
 </div>

 <input type='hidden' value='' id='txt_id'>
</div>
@stop

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
<style>

    .context-menu{
     display: none;
     position: absolute;
     border: 1px solid black;
     border-radius: 3px;
     width: 200px;
     background: white;
     box-shadow: 10px 10px 5px #888888;
}

.context-menu ul{
     list-style: none;
     padding: 2px;
}

.context-menu ul li{
     padding: 5px 2px;
     margin-bottom: 3px;
     color: white;
     font-weight: bold;
     background-color: rgb(0, 209, 80);
}

.context-menu ul li:hover{
     cursor: pointer;
     background-color: #7fffc3;
}
/* Colors */
.Gainsboro ,.Orange ,.Plum {
     width:15px;
     height:15px;
     border: 0px solid black;
     display: inline-block;
     margin-right: 5px;
}

.Gainsboro {
     background-color: Gainsboro ;
}
.Orange {
     background-color: Orange ;
}
.Plum {
     background-color: Plum ;
}
.custombtn{

        max-width:7%;
        position: relative;
        width:100%;
        margin-right:5px;
    }
    .btn{
        font-size: 11px;
    }
    .input-group-text{
        font-size: 11px;
    }
    header {
      width: 100%;

      display: flex;
      justify-content: center;
      align-items: center;
      margin: 0;
    }
    header h5 {
      position: absolute;
      width: 40%;
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

$(document).ready(function() {
    $('#chargestable tr').dblclick(function() {
        var PONo = $(this).attr('data-PONo');
        // alert(PONo);
        // window.location.replace("/OrderEntry/"+PONo);
        window.open("/OrderEntry/"+PONo,"_blank");
    });
});

$(document).ready(function(){

 // disable right click and show custom context menu
 $("tr").bind('contextmenu', function (e) {
      var id = this.id;
      $PONo = $(this).attr("data-PONo")
    //   alert($PONo);
      $("#txt_id").val(id);

      var top = e.pageY-50;
      var left = e.pageX;

      // Show contextmenu
      $(".context-menu").toggle(100).css({
          top: top + "px",
          left: left + "px"
      });

      // disable default context menu
      return false;
 });

 // Hide context menu
 $(document).bind('contextmenu click',function(){
     $(".context-menu").hide();
    //   alert($PONo);

     $("#txt_id").val("");
 });

// disable context-menu from custom menu
$('.context-menu').bind('contextmenu',function(){
    return false;
});

// Clicked context-menu item
$('.context-menu li').click(function(){
    var className = $(this).attr("data-link");
    var titleid = $('#txt_id').val();
    // $( "#"+ titleid ).css( "background-color", className );
    $(".context-menu").hide();
    window.open("/"+className+"/"+$PONo,"_blank");
});

});
$(document).ready( function () {
    $('#chargestable').DataTable({
        scrollY: 400,
    // deferRender:    true,
    scroller:       true,
ordering:false,

    // responsive: true,
    scrollX: true,
    // paging: false



    });
//     $('#purchasetable').DataTable({
//         scrollY: 400,
//     // deferRender:    true,
//     scroller:       true,
//     // responsive: true,
//     scrollX: true,
//     // paging: false



//     });

// } );
// $(document).ready( function () {
//     $('#purchasetable').DataTable({
//         scrollY: 400,
//     // deferRender:    true,
//     scroller:       true,
//     // responsive: true,
//     scrollX: true,
//     // paging: false



//     });
// } );
// $(document).ready( function () {
//     $('#DMtable').DataTable({
//         scrollY: 400,
//     // deferRender:    true,
//     scroller:       true,
//     // responsive: true,
//     scrollX: true,
//     // paging: false



//     });
// } );
// $(document).ready( function () {
//     $('#directtable').DataTable({
//         scrollY: 400,
//     // deferRender:    true,
//     scroller:       true,
//     // responsive: true,
//     scrollX: true,
//     // paging: false



//     });
$('#chargestable tr').click(function() {
        var PONo = $(this).attr('data-PONo');

        $('#hidpono').val(PONo);
    });

    $('#btnProforma').click(function (e) {
        e.preventDefault();
        var ChkKG = '';
        var PONo = $('#hidpono').val();

        if($("#ChkKG").is(":checked")){
            ChkKG = 'Y';
        }

        window.location="/PerformaInvoicePrint?"+ChkKG+"&PONo="+PONo;

});


} );

</script>
@stop


@section('content')
