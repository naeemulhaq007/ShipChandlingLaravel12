@extends('layouts.app')



@section('title', 'FlipToVSN')

@section('content_header')
@stop

@section('content')
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
    </div>

    <div class="container-fluid ">
        <div class="col-lg-12">

            <div class="card
             ">
                <div style="background-color:#EEE" class="card-header">
                    <div class="card-tools ">
                        <h5 class="card-title mt-1 text-blue">Flip To VSN</h5>

                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                    <div class="row">

                        <div class="col-sm-2 row ml-2 ">
                            <label class="col-sm-5 col-form-label" for="Eventno">Event # :</label>
                            <input type="number" step="1" id="event" name="EventNo" value="{{ $EventNo }}"
                                class="form-control col-sm-5 ml-2">
                        </div>


                        <div class="col-form-label  ml-5 ">
                            /&nbsp; <strong>Customer :&nbsp;</strong> <label class="customer text-blue"
                                for="customer"></label>

                        </div>
                        <div class="col-form-label  ml-5 ">
                            /&nbsp; <strong>Vessel :&nbsp;</strong> <label  class="vessel text-blue"
                                for="vessel"></label>

                        </div>
                        <div class="col-form-label  ml-5 ">
                            /&nbsp; <strong>VSN :&nbsp;</strong> <label class="VSN text-blue" id="lblVSNNO"
                                for="customer_ref_no"></label>

                        </div>
                        <div class="col-form-label  ml-5 ">
                            /&nbsp; <strong>Department Name :&nbsp;</strong> <label class="departmentname text-blue"
                                id="departmentname" for="departmentname"></label>

                        </div>


                    </div>



                </div>
                <div class="card-body">
                    <div class="row pb-2">
                        <div class="inputbox col-sm-2 ">
                            <input type="date" class=""
                                value=""
                                id="oderdate" name="oderdate" >
                            <span class="ml-2 Txtspan">
                                OrderDate
                            </span>
                        </div>
                        <div class="inputbox col-sm-2 ">
                            <input type="date" class=""
                                value=""
                                id="Deleverydate" name="Deleverydate" >
                            <span class="ml-2 Txtspan">
                                Delevery Date
                            </span>
                        </div>
                        <div class="inputbox col-sm-2 ">
                            <input class="" type="time" id="DeleveryTime" name="DeleveryTime" value=""
                                >

                            <span class="ml-2 Txtspan">
                                Delevery Time
                            </span>
                        </div>

                        <div class="inputbox col-sm-2 ">
                            <span class="Txtspan">
                                Port
                            </span>
                            <select  name="port" id="port">

                                <option value="">Select-Port</option>
                                @foreach ($ShipingPortSetup as $item)
                                <option value="{{ $item->PortName }}">{{ $item->PortName }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="inputbox col-sm-2 ">
                            <span class="Txtspan">
                                Agency
                            </span>
                            <select  name="Agency" id="Agency">
                                <option selected value="">Select-Agency</option>
                                @foreach ($AgentSetup as $aitem)
                                    <option value="{{ $aitem->CustomerCode }}">{{ $aitem->CusCode }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="inputbox col-sm-2 ">
                            <span class="Txtspan">
                                Agent C.P
                            </span>
                            <select  name="agentcp" id="agentcp">
                                <option value=""></option>

                            </select>
                        </div>


                    </div>
                    <div class="row pt-2">
                        <div class="inputbox col-sm-2 ">
                            <span class="ml-2 Txtspan">
                                Location
                            </span>
                            <input type="text" name="location" id="location">

                        </div>
                        <div class="inputbox col-sm-2 ">
                            <span class="ml-2 Txtspan">
                                Wharehouse
                            </span>
                            <select  name="Wharehouse" id="Wharehouse">
                                <option value="">Select-Wharehouse</option>
                                @foreach ($GodownSetup as $item)
                                <option value="{{ $item->GodownCode }}">{{ $item->GodownName }}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="inputbox col-sm-6 ">
                            <textarea class="" name="gernalveselnoter" id="GVN" cols="30" rows="2"></textarea>
                            <span class="ml-2 Txtspan">
                                Gernal Vessel Note
                            </span>
                        </div>

                    </div>
                    <div class="row">
                        <div class="CheckBox1">
                            <label class="input-group text-danger mt-2">
                                <input class="" type="checkbox"  name="ChkTBN" id="ChkTBN" value="">
                                TBN
                            </label>
                        </div>
                        <h5 id="LblHold"></h5>
                        <a name="" id="vsnsave" class="btn btn-success ml-auto" role="button">Save VSN</a>
                    </div>





                </div>
            </div>


        </div>

        <div class=" card">
            <div class="card-body">

            <div class="rounded shadow ">
                <div class="table-responsive">
                    <table class="table " id="Fliptable" style="width: 100%">
                        <thead class="bg-info">
                            <tr>
                                <th>SNo</th>
                                <th>Quote&nbsp;#</th>
                                <th>Cust&nbsp;Req&nbsp;#</th>
                                <th>Quote&nbsp;Amt</th>
                                <th>Est&nbsp;Lines</th>
                                <th>VSN</th>
                                <th>Charge</th>
                                <th>Flip&nbsp;Date</th>
                                <th>Flip</th>
                                <th>Terms</th>
                            </tr>
                        </thead>
                        <tbody id="flib">


                        </tbody>
                    </table>

                </div>

            </div>

            <div class="row py-2 ">
                <a name="" id="refrsh" class="btn btn-info form-control ml-auto col-sm-1 mx-1" role="button">
                    Refresh</a>
                <a name="" id="vsnsave" class="btn btn-success form-control col-sm-1 mx-1" role="button">
                    Proceed</a>
                <a name="" id="" class="btn btn-danger form-control mr-auto col-sm-1 mx-1"
                    href="{{ url()->previous() }}" role="button">Close</a>
            </div>
            <div class="row py-2">
                <div class="mx-auto">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="">Confirmation Form By</span>
                                </div>
                                <input class="form-control" type="text" readonly name="workuser"
                                    value="{{ $user }}" placeholder="" id="workuser">

                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="">Avail Credit :</span>
                                </div>
                                <input class="form-control availcredit" type="text" readonly name="AvailCredit"
                                    id="availcredit" placeholder="" aria-label="" aria-describedby="">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="">Flip Amount :</span>
                                </div>
                                <input class="form-control" type="text" value="" readonly
                                    name="FlipAmount" id="FlipAmount" placeholder="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- </form> --}}

            <input type="hidden" name="transamount" id="transamount">
            <input type="hidden" name="credit_limit" id="credit_limit">
            <input type="hidden" name="TxtCustomerCode" id="TxtCustomerCode">
            <input type="hidden" name="TxtIMONO" id="TxtIMONO">
            <input type="hidden" name="cStatus" id="cStatus">
            <input type="hidden" name="TxtCustomerActCode" id="TxtCustomerActCode">
            <input type="hidden" name="quoteno" value="{{$quoteno}}" id="quoteno">


        </div>
    </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">


    <style>
        .boderless {
            border: none;
            border-width: 0;
            box-shadow: none;
            background: none;
            width: 75px;
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
    </style>
@stop

@section('js')
<script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
    <script>
        function ajaxSetup(){
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        };

        function FlipFillAgent(){
            var TxtAgentCode = $('#Agency').val();
            ajaxSetup();
            $.ajax({
                    type: 'post',
                    url: '{{ URL::to('FlipFillAgent') }}',
                    data: {
                        TxtAgentCode,

                    },
                    beforeSend: function() {
                        // Show the overlay and spinner before sending the request
                        // $('.overlay').show();
                    },
                    success: function(response) {
                    console.log(response);
                    var data = response.FillAgentContactPerson;
                    var agentcpSelect = document.getElementById("agentcp");

                    // Clear all existing options
                    agentcpSelect.innerHTML = '';

                    // Add new options from the data array
                    data.forEach(function(items) {
                    var option = document.createElement('option');
                    option.value = items.AgentCode;
                    option.textContent = items.AgentContactPerson;
                    agentcpSelect.appendChild(option);
                    });



                    },
                    complete: function() {
                        // Hide the overlay and spinner after the request is complete
                        // $('.overlay').hide();
                    }
                });

        }
        function DataGet(){
            var EventNo = $('#event').val();
            var quoteno = $('#quoteno').val();
            ajaxSetup();
            $.ajax({
                    type: 'post',
                    url: '{{ URL::to('flipdataget') }}',
                    data: {
                        EventNo,
                        quoteno,

                    },
                    beforeSend: function() {
                        // Show the overlay and spinner before sending the request
                        $('.overlay').show();
                    },
                    success: function(response) {
                    console.log(response);
                    var EventInvoice = response.EventInvoice;
                    var vsndata = response.vsndata;
                    if(vsndata){
                        if (vsndata.OrderDate) {
                        var odate = new Date(vsndata.OrderDate);
                        const OrderDate = odate.toISOString().substring(0, 10);
                        $('#oderdate').val(OrderDate);
                        }
                        if (vsndata.DeliveryDate) {
                            var Ddate = new Date(vsndata.DeliveryDate);
                            const DeliveryDate = Ddate.toISOString().substring(0, 10);
                            $('#Deleverydate').val(DeliveryDate);

                        }
                        $('#DeleveryTime').val(vsndata.Time);
                    }else{
                        var currentDate = new Date();
                        var formattedDate = currentDate.toISOString().slice(0, 10);  // Format: 'YYYY-MM-DD'
                        var formattedTime = currentDate.toISOString().slice(11, 19);  // Format: 'HH:MM:SS'

                        $('#oderdate').val(formattedDate);
                        $('#Deleverydate').val(formattedDate);
                        $('#DeleveryTime').val(formattedTime);


                    }
                    if (EventInvoice) {

                    $('.customer').text(EventInvoice.CustomerName);
                    $('#TxtCustomerCode').val(EventInvoice.CustomerCode);
                    $('#Wharehouse').val(EventInvoice.GodownCode);
                    $('#GVN').val(EventInvoice.Note);
                    $('#TxtIMONO').val(EventInvoice.IMONo);
                    $('.vessel').text(EventInvoice.VesselName);
                    // $('.lblVSNNO').text(EventInvoice.VesselName);
                    $('#departmentname').text(EventInvoice.Department);
                    if(EventInvoice.CHKTBN == 'Y'){
                        $('#CHKTBN').prop('checked',true);
                    }else{
                        $('#CHKTBN').prop('checked',false);

                    }
                    if(EventInvoice.CustPriority == 'H'){
                        $('#LblHold').show();
                        $('#LblHold').text('This Customer Is On Hold');
                    }else if(EventInvoice.CustPriority == 'ALLOW'){
                        $('#LblHold').show();
                        $('#LblHold').text('This Customer Is On Hold');
                    }else{
                        $('#LblHold').hide();
                        $('#LblHold').text('');

                    }


                    // var Ddate = new Date(EventInvoice.DeliveryDate);
                    // inputtime.value = now.toLocaleTimeString("en-US", {
                        //     hour12: false,
                        //     minute: "2-digit",
                        //     hour: "2-digit"
                        // });

                        $('#Agency').val(EventInvoice.AgentCode ? EventInvoice.AgentCode : "");
                        $('#port').val(EventInvoice.ShippingPort);

                        var counter = 0;
                        var tableRows = '';
                        var data = response.Quotes;

                        data.forEach(function(item) {
                            // console.log(item.QuoteNo == response.quoteno ? 'checkech' : 'no');
                            counter++;

                            tableRows += `
                                <tr>
                                    <td scope="row">${counter}</td>
                                    <input type="hidden" name="ID[]" value="${item.ID}">
                                    <td><input type="text" readonly class="boderless" name="QuoteNo[]" value="${item.QuoteNo}"></td>
                                    <td><input type="text" readonly class="boderless-w-width" name="CustomerRefNo[]" value="${item.CustomerRefNo}"></td>
                                    <td class="text-right"><input type="text" readonly class="boderless" name="ValueAmount[]" value="${parseFloat(item.ValueAmount).toFixed(2)}"></td>
                                    <td><input type="text" readonly class="boderless" name="EstLineQuote[]" value="${item.EstLineQuote}"></td>
                                    <td><input type="text" readonly class="boderless" name="VSNNo[]" value="${item.VSNNo ? item.VSNNo : ''}"></td>
                                    <td><input type="text" readonly class="boderless" name="FlipOrderNo[]" value="${item.FlipOrderNo ? item.FlipOrderNo : ''}"></td>
                                    <td><input type="text" readonly class="boderless" name="FlipDAte[]" value="${item.FlipDAte ? new Date(item.FlipDAte).toLocaleDateString('en-US') : ''}"></td>
                                    <td><input type="checkbox" class="flip_check" name="flip[${item.QuoteNo}]" id="flipcheck${counter}" ${item.QuoteNo == response.quoteno ? 'checked' : ''} value="${item.QuoteNo == response.quoteno ? 1 : item.ChkFlip}"></td>
                                    <td><input type="text" readonly class="boderless" name="Terms[]" value="${item.Terms}"></td>
                                </tr>
                            `;
                        });
                        // console.log(tableRows);

                        $('#flib').html(tableRows);

                    }
                    if (response.Dt1) {
                        var Dt1 = response.Dt1;
                        $('#cStatus').val(Dt1.Status);
                        $('#TxtCustomerActCode').val(Dt1.ActCode);

                    }
                $('#refrsh').click();

                    $('.flip_check').change(function (e) {
                // e.preventDefault();
                // alert(this.value);
                $('#refrsh').click();


            });
                    let flipcheckboxValues = []; // Array to store flipcheck checkbox values

// Loop through the table rows
let tableBody = document.getElementById('flib');
let rows = tableBody.rows;
for (let i = 0; i < rows.length; i++) {
    let cells = rows[i].cells;
    let quoteNo = cells[1].querySelector('input').value;
    let customerRefNo = cells[2].querySelector('input').value;
    let valueAmount = cells[3].querySelector('input').value;
    let EstLineQuote = cells[4].querySelector('input').value;
    let VSNNo = cells[5].querySelector('input').value;
    let FlipOrderNo = cells[6].querySelector('input').value;
    let FlipDAte = cells[7].querySelector('input').value;
    let flipcheck = cells[8].querySelector('input');

    let flipcheckValue = parseInt(flipcheck.value); // Convert to integer
    flipcheckboxValues.push(flipcheckValue); // Store flipcheck value in the array

    // Add click event listener to each flipcheck checkbox
    flipcheck.addEventListener('click', function () {
        if (this.checked) {
            this.value = 1;
        } else {
            this.value = 0;
        }
    });
    if (VSNNo > 0 || VSNNo !== '') {
                  vsnshow = cells[5].querySelector('input').value;
                  $('#lblVSNNO').text(vsnshow);
              } else {
                  console.log('Empty');
              }
}
// Now update the flipcheck checkboxes based on the stored values
for (let i = 0; i < rows.length; i++) {
    let flipcheck = rows[i].cells[8].querySelector('input');
    flipcheck.checked = flipcheckboxValues[i] === 1;
}



                    },
                    complete: function() {
                        // Hide the overlay and spinner after the request is complete
                        $('.overlay').hide();
                    }
                });




        };

        $(document).ready(function() {

            var table1 = $('#Fliptable').DataTable({
                scrollY: 400,
                // scrollX: true,
                deferRender: true,
                scroller: true,
                paging: false,
                info: false,
                ordering: false,
                searching: false,
                responsive: true,

            });

            // let quotechevker =  $(selector).val();

            // let tableBody = document.getElementById('flib');
            // let rows = tableBody.rows;
            // let vsnshow = 0;
            // let totalflips = 0;
            // let valueAmount = 0;
            // let TvalueAmount = 0;
            // for (let i = 0; i < rows.length; i++) {
            //     let cells = rows[i].cells;

            //     let VSNNo = cells[5].querySelector('input').value;
            //     let flipcheck = cells[8].querySelector('input').value;


            //     if (flipcheck > 0) {
            //         totalflips = totalflips + 1;
            //         valueAmount = cells[3].querySelector('input').value;

            //     }


            //     if (VSNNo > 0 || VSNNo !== '') {
            //         vsnshow = cells[5].querySelector('input').value;
            //         $('#showVSn').val(vsnshow);
            //     } else {
            //         console.log('Empty');
            //     }
            //     TvalueAmount += Number(valueAmount);

            // }
            // console.log(TvalueAmount);
            // $('#FlipAmount').val(TvalueAmount);



            var inputtime = document.getElementById("DeleveryTime");
            var now = new Date();
            inputtime.value = now.toLocaleTimeString("en-US", {
                hour12: false,
                minute: "2-digit",
                hour: "2-digit"
            });


            if ($('#event').val() > 0) {
                DataGet();

            }
            $('#event').keydown(function (e) {
                if (e.which == 13) {
                    $('#event').blur();
                }
            });

            $('#event').blur(function (e) {
                e.preventDefault();
                DataGet();
            });

            $('#Agency').change(function (e) {
                e.preventDefault();
                FlipFillAgent();
            });

            // $(".flip_check").click(function (e) {
            //     // e.preventDefault();

            // });

        });
        $(document).on("click", "#vsnsave", function() {
            let EventNo = $('#event').val();
            let OrderDate = document.getElementById('oderdate').value;
            let DeliveryDate = document.getElementById('Deleverydate').value;
            let Time = document.getElementById("DeleveryTime").value;
            let Port = document.getElementById("port").value;
            let Location =  $('#location option:selected').val();
            let TxtAgentCode = $('#Agency').val();
            let Agency = $('#Agency option:selected').text();
            let TxtAgentCPCode = $('#agentcp').val();
            let CmbAgent = $('#agentcp option:selected').text();

            let GeneralNotes = document.getElementById("GVN").value;
            let Confirmation = $('#workuser').val();
            let AvailCredit = document.getElementById("availcredit").value;
            let TotalQuote = document.getElementById("FlipAmount").value;
            let TotalFlip = 0;
            let NoOfQuote = 0;
            let CustomerName = $('.customer').text();
            let VesselName = $('.vessel').text();
            let CustomerCode = $('#TxtCustomerCode').val();
            let TxtIMONO = $('#TxtIMONO').val();




            let inputValues = [];
            let tableBody = document.getElementById('flib');
            let rows = tableBody.rows;
            for (let i = 0; i < rows.length; i++) {
                let cells = rows[i].cells;
                let quoteNo = cells[1].querySelector('input').value;
                let customerRefNo = cells[2].querySelector('input').value;
                let valueAmount = cells[3].querySelector('input').value;
                let EstLineQuote = cells[4].querySelector('input').value;
                let VSNNo = cells[5].querySelector('input').value;
                let FlipOrderNo = cells[6].querySelector('input').value;
                let FlipDAte = cells[7].querySelector('input').value;
                let flipcheck = cells[8].querySelector('input').value;
                let Terms = cells[9].querySelector('input').value;

                if (flipcheck > 0) {
                    TotalFlip = TotalFlip + 1;

                    inputValues.push({
                        quoteNo,
                        customerRefNo,
                        valueAmount,
                        EstLineQuote,
                        VSNNo,
                        FlipOrderNo,
                        FlipDAte,
                        flipcheck,
                        Terms
                    });

                }
                NoOfQuote += Number(1);
            }
            if($('#ChkTBN').is(":checked")){
                Swaal.fire({
                                icon: 'error',
                                title: 'You Cannot Flip!',
                                text: 'This customer is TBM! ,This Customer is Not Approved',
                                footer: '<a href>Why do I have this issue?</a>'
                            })
                return;
            }

                    if($('#cStatus').val() !== 'Active'){
                        Swaal.fire({
                                icon: 'error',
                                title: 'Inactive Customer!',
                                text: 'This Customer is INACTIVE please check in Customer Registration',
                                footer: '<a href>Why do I have this issue?</a>'
                            })
                        return;
                    }
                    // if($('#lblVSNNO').text() !== ''){

                    // }
                console.log('save');
            if (TotalFlip > 0) {
                ajaxSetup();
                var VSNNo = $('#lblVSNNO').text();
                $.ajax({
                    type: 'post',
                    url: '{{ URL::to('flipsavetwo') }}',
                    data: {
                          VSNNo,
                        EventNo,
                        OrderDate,
                        DeliveryDate,
                        Time,
                        Port,
                        Location,
                        Agency,
                        GeneralNotes,
                        Confirmation,
                        AvailCredit,
                        TotalQuote,
                        TotalFlip,
                        CustomerName,
                        CustomerCode,
                        VesselName,
                        NoOfQuote,
                        inputValues,
                        CmbAgent,
                        TxtAgentCode,
                        TxtAgentCPCode,
                        TxtIMONO,
                    },
                    beforeSend: function() {
                        // Show the overlay and spinner before sending the request
                        $('.overlay').show();
                    },
                    success: function(response) {
                        //   alert($response.Message + ' : ' + $response.QuotionFliped);
                        console.log(response);
                        if(response.Message == 'VSN No Already Alloted'){
                            Swaal.fire({
                                icon: 'error',
                                title: response.Message,
                                text: 'VSN Number Already Alloted To Different Customer And Vessel!',
                                footer: '<a href>Why do I have this issue?</a>'
                            })
                        }
                        if (response.Quotion) {
                            if (response.Quotion.length > 0) {
                                var quote =  response.Quotion;
                                console.log(quote);
                                quote.forEach(function(item) {
                                    let Quoteno = item.Quoteno;
                                    console.log(Quoteno);
                                    var url = '/Order?QuoteNo=' + Quoteno + '&EventNo=' + response.PEventNo;
                                    window.open(url, '_blank');
                                });

                            }

                        }
                    },
                    error: function(error) {
                            Swaal.fire({
                                icon: 'error',
                                title: error.statusText,
                                text: error.responseText,
                                footer: '<a href>Why do I have this issue?</a>'
                            })
                            console.log(error);
                            $('.overlay').hide();
                        },
                    complete: function() {
                        // Hide the overlay and spinner after the request is complete
                        $('.overlay').hide();
                    }
                });
            } else {
                console.log('No rows with flipcheck > 0');
                  Swaal.fire({
                                icon: 'question',
                                title: 'Oops...',
                                text: 'No rows with flipcheck',
                                footer: '<a href>Why do I have this issue?</a>'
                            })
            }


            // console.log(inputValues);

        });
    </script>
    <script>


        $(document).ready(function() {

            // console.log($creadit);

            $('#refrsh').click(function(e) {
                e.preventDefault();
                // alert();
                gpset();
                let tableBody = document.getElementById('flib');
                let rows = tableBody.rows;
                let totalqouteam = 0;
                for (let i = 0; i < rows.length; i++) {
                    let cells = rows[i].cells;
                    let quoteNo = cells[1].querySelector('input').value;
                    let customerRefNo = cells[2].querySelector('input').value;
                    let valueAmount = cells[3].querySelector('input').value;
                    let EstLineQuote = cells[4].querySelector('input').value;
                    let VSNNo = cells[5].querySelector('input').value;
                    let FlipOrderNo = cells[6].querySelector('input').value;
                    let FlipDAte = cells[7].querySelector('input').value;
                    let flipcheck = cells[8].querySelector('input').value;
                    let Terms = cells[9].querySelector('input').value;
                    console.log(valueAmount);
                    if (flipcheck > 0) {
                        totalqouteam += Number(valueAmount);
                    }
                }
                console.log(totalqouteam);
                $('#FlipAmount').val(totalqouteam);

            });
        });

        function gpset() {
                var credit_limit = $('#credit_limit').val();
                var transamount = $('#transamount').val();
            var $creadit = Math.round(credit_limit - transamount, 2);

            document.getElementById("availcredit").value = $creadit;

        }
        $(document).ready(function() {



        });
    </script>
@stop


@section('content')
