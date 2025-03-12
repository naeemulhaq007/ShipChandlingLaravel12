@extends('layouts.app')



@section('title', 'RFQ-Vplat-View')

@section('content_header')
@stop

@section('content')


    <div class="container-fluid">




        <div class="row">
            <div class="col-lg-12">

                <div class="card collapsed-card mt-3">
                    <div style="background-color:#EEE; " class="card-header">
                        <div class="card-tools ">

                            {{-- <a name="" id="BtnVplatview" class="btn btn-info"  role="button">VPlat</a> --}}
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
                                /&nbsp; <strong>WareHouse :&nbsp;</strong> <label class=" text-blue" id="WareHouse" for="customer"></label>

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




                        </div>



                    </div>
                    <div class="card-body">
                        <div class="row">



                            <div class="inputbox col-sm-2 py-2">
                                <span class="Txtspan">
                                    Department
                                </span>
                                <select class="" name="cmpdept" id="cmpdept">
                                    @foreach ($Department as $Ditem)
                                    <option value="{{ $Ditem->TypeCode }}">{{ $Ditem->TypeName }}</option>
                                @endforeach

                                </select>

                                </select>
                            </div>



                            <div class="inputbox col-sm-2 py-2">
                                <span class="Txtspan">
                                    WareHouse
                                </span>
                                <select class="" name="CmbGodown" id="CmbGodown">
                                    @foreach ($GodownSetup as $Witem)
                                    <option value="{{ $Witem->GodownCode }}">{{ $Witem->GodownName }}</option>
                                @endforeach

                                </select>
                            </div>

                            <div class="inputbox col-sm-2 py-2">
                                <input type="date" class="" id="TxtReqDate" >
                                <span class="Txtspan">
                                    Req.Date
                                </span>
                            </div>
                            <div class="inputbox col-sm-2 py-2">
                                <input type="time" class="" id="TxtReqTime" >
                                <span class="Txtspan">
                                    Req.Time
                                </span>
                            </div>
                            <div class="inputbox col-sm-2 py-2">
                                <input type="date" class="" id="TxtETADAte" >
                                <span class="Txtspan">
                                    ETA
                                </span>
                            </div>


                        </div>
                        <div class="row">



                            <div class="inputbox col-sm-2 py-2">
                                <input type="date" class="" id="TxtSentDate" >
                                <span class="Txtspan">
                                    Sent Date
                                </span>
                            </div>
                            <div class="inputbox col-sm-2 py-2">
                                <input type="time" class="" id="TxtSentTime">
                                <span class="Txtspan">
                                    Sent Time
                                </span>
                            </div>
                            <div class="inputbox col-sm-2 py-2">
                                <input type="text" class="" id="TxtSentUser" >
                                <span class="ml-2">
                                    Sent User
                                </span>
                            </div>
                            <div class="inputbox col-sm-2 py-2">
                                <input type="text" class="" id="VendorCode" >
                                <span class="ml-2">
                                    VendorCode
                                </span>
                            </div>

                        </div>
                        <div class="row py-2">

                            <a name="" id="DownloadPrice" class="btn btn-info mx-2"  role="button">Download Price</a>
                            <a name="" id="UpdateInRFQALL" class="btn btn-info mx-2"  role="button">Update In RFQ ALL</a>
                            <a name="" class="btn btn-danger mx-2 col-sm-1 " href="/" role="button">Exit</a>
                        </div>
                    </div>

                </div>
            </div>
            <div class="card">
                <div class="card-body">


            <div class="col-lg-12 py-2 ">

                <div class="rounded table-responsive">
                    <table id="RfqVplattable" class="table table-inverse table-borderd">
                        <thead class="bg-info">
                            <tr>
                                <th>SNo</th>
                                <th style="width: 450px">Description</th>
                                <th>Qty</th>
                                <th>UOM</th>
                                <th>Sell&nbsp;Price</th>
                                <th style="width: 250px">Vendor</th>
                                <th>Customer&nbsp;Notes</th>
                                <th>Vendor&nbsp;Notes</th>
                                <th>VendorPartNo</th>
                                <th>V.Price&nbsp;Rec</th>
                                <th>Total&nbsp;Cost</th>
                                <th>V.Price&nbsp;Rec&nbsp;Date</th>
                                <th>V.Price&nbsp;Rec&nbsp;Time</th>
                                <th>VendorCode</th>
                                <th>Vendor&nbsp;Note</th>
                                <th>ProductCode</th>

                            </tr>
                        </thead>
                        <tbody id="RfqVplattablebody" class="table-hover">

                        </tbody>

                    </table>
                </div>


            </div>

        </div>
    </div>

        </div>






















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
                                    <input class="form-control" type="text" name="vendornemail" id="vendornemail">
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




@stop

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">


    <style>

    </style>
@stop

@section('js')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>

    <script>
         function tabcomposer() {
                let table = document.getElementById('RfqVplattablebody');
                let rows = table.rows;

                let dataMail = [];
                for (let i = 0; i < rows.length; i++) {
                    let cells = rows[i].cells;


                    dataMail.push({
                        SNo	: cells[0] ? cells[0].innerHTML : '',
                        Description: cells[1] ? cells[1].innerHTML : '',
                        Qty: cells[2] ? cells[2].innerHTML : '',
                        UOM: cells[3] ? cells[3].innerHTML : '',
                        SellPrice: cells[4] ? cells[4].innerHTML : '',
                        Vendor: cells[5] ? cells[5].innerHTML : '',
                        CustomerNotes: cells[6] ? cells[6].innerHTML : '',
                        VendorNotes: cells[7] ? cells[7].innerHTML : '',
                        VendorPartNo: cells[8] ? cells[8].innerHTML : '',
                        VPriceRec: cells[9] ? cells[9].innerHTML : '',
                        TotalCost: cells[10] ? cells[10].innerHTML : '',
                        VPriceRecDate: cells[11] ? cells[11].innerHTML : '',
                        VPriceRecTime: cells[12] ? cells[12].innerHTML : '',
                        VendorCode: cells[13] ? cells[13].innerHTML : '',
                        VendorRecRemarks: cells[14] ? cells[14].innerHTML : '',
                        ProductCode: cells[15] ? cells[15].innerHTML : '',
                    });
                }

                return dataMail;
            }
        $(document).ready(function() {

            // $('#BtnVplatview').click(function (e) {
            //     e.preventDefault();
            //     var quoteno = $('#quote_no').val();
            //     var VendorCode = $('#VendorCode').val();

            //     window.location.href ='Vplat-Quote?&quoteNo='+quoteno+'&VendorCode='+VendorCode+'&BranchCode='+{{$BranchCode}};
            // });
            // var todaydata = new Date();
            // const today = todaydata.toISOString().substring(0, 10);
            // $('#Reqdate').val(today);
            // $('#eta').val(today);
            // const currentTime = new Date();
            // const hours = currentTime.getHours().toString().padStart(2, '0');
            // const minutes = currentTime.getMinutes().toString().padStart(2, '0');
            // const currentTimeFormatted = hours + ':' + minutes;

            // $('#reqtime').val(currentTimeFormatted);


           var table1 = $('#RfqVplattable').DataTable({
                scrollY: 700,
                scrollX: true,
                deferRender: true,
                scroller: true,
                paging: false,
                info: false,
                ordering: false,
                searching: false,
                responsive: true,


            });
            if ($('#quote_no').val() !== '' || $('#quote_no').val() > 0) {
                Dataget();

            }

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
                var QuoteNo = $('#quote_no').val();
                $.ajax({
                    url: '/RFQvplatGet',
                    type: 'POST',
                    data: {
                        QuoteNo,
                    },
                    beforeSend: function() {
                        // Show the overlay and spinner before sending the request
                        $('.overlay').show();
                    },
                    success: function(response) {
                        console.log(response);
                        let datamaster = response.quotesmaster;
                        if (datamaster) {

                            $('#event_no').text(datamaster.EventNo);
                            $('#WareHouse').text(datamaster.GodownName);
                            $('.vessel').text(datamaster.VesselName);
                            $('.customer_ref_no').text(datamaster.CustomerRefNo);
                            $('#departmentname').text(datamaster.DepartmentName);
                            $('#depcode').val(datamaster.DepartmentCode);
                            // $('#DepartmentMail').val(datamaster.DepartmentCode);
                            $('#cmpdept').val(datamaster.DepartmentCode);
                            $('#CmbGodown').val(datamaster.GodownCode);
                            $('#WarehouseMail').val(datamaster.GodownCode);
                        }

                        let data = response.results;
                        let ids = 0;
                        let table = document.getElementById('RfqVplattablebody');
                        if (data.length > 0) {

                            table.innerHTML = "";
                            data.forEach(function(item) {
                            $('#VendorCode').val(item.VendorCode);

                                ids = ids + 1;
                                let row = table.insertRow();
                                // row.addClass('js-row');
                                $(row).addClass('js-row');
                                function createCell(content) {
                                    let cell = row.insertCell();
                                    cell.innerHTML = content;
                                    return cell;
                                }
                                createCell(item.SNo);
                                createCell(item.ProductName);
                                createCell(item.Qty);
                                createCell(item.UOM);
                                createCell(item.UnitPrice);
                                createCell(item.VendorName);
                                createCell(item.SendCustomerNote);
                                createCell(item.SendVendorNote);
                                createCell('');
                                createCell(item.VendorRcvdPrice);
                                createCell(item.MTotCost);
                                var ReceivedDatecell = createCell('');

                                if(item.ReceivedDate){

                                    var Rdate = new Date(item.ReceivedDate);
                                    const ReceivedDate = Rdate.toISOString().substring(0, 10);
                                    ReceivedDatecell.innerHTML = ReceivedDate;
                                }
                                // createCell(ReceivedDate);

                                // const ReceivedTime = Rtime.getHours() + ':' + Rtime.getMinutes() + ':' + Rtime.getSeconds();
                                // var Rtime = new Date(item.ReceivedTime);
                                // var Rdate = new Date(item.ReceivedDate);
                                var formattedTimecell = createCell('');

                                if(item.ReceivedTime){

                                    const receivedTime = item.ReceivedTime.split('.')[0]; // Extract the time part before the dot
                                    const [hours, minutes, seconds] = receivedTime.split(':'); // Split the time into hours, minutes, and seconds
                                    const formattedTime = `${hours}:${minutes}:${seconds}`;
                                    formattedTimecell.innerHTML = formattedTime;
                                }

                                createCell(item.VendorCode);
                                createCell(item.VendorRecRemarks);
                                createCell(item.ProductCode);


                            });
                            table1.columns.adjust();
                        }

                        $('.js-row').dblclick(function (e) {
                            e.preventDefault();
                            var row = $(this);
                            // console.log(row.find('td:eq(13)').text());

                            var Code = row.find('td:eq(13)').text();
                            var quoteno = $('#quote_no').val();
                            // console.log('branch:'+{{$BranchCode}}+',vcode:'+Code+',quoteno:'+quoteno);


                            window.location.href ='Vplat-Quote?quoteNo='+quoteno+'&VendorCode='+Code+'&BranchCode='+{{$BranchCode}};

                        });
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    },
                    complete: function() {
                        // Hide the overlay and spinner after the request is complete
                        $('.overlay').hide();
                    }
                });

            }


            $('#DownloadPrice').click(function (e) {
                e.preventDefault();
                Dataget();

            });






            $('#UpdateInRFQALL').click(function(e) {
                let eventno = $('#event_no').text();
                let quoteno = $('#quote_no').val();
                var Table = tabcomposer();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'post',
                    url: '{{ URL::to('updateinrfq') }}',
                    data: {
                        quoteno,
                        eventno,
                        Table,

                    },
                    beforeSend: function() {
                        // Show the overlay and spinner before sending the request
                        $('.overlay').show();
                    },
                    success: function(response) {
                        console.log(response);
                        Swaal.fire({
                                    icon: 'success',
                                    title: 'Updated Successfully',
                                    text: 'Your Costing Has Been Updated!',
                                    showConfirmButton: true,
                                    timer: 2500
                                })
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









        });
    </script>
@stop


@section('content')
