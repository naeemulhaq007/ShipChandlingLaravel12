@extends('layouts.app')



@section('title', 'SHIP SERV')

@section('content_header')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@stop


@section('content')
    </div>
    <div class="container-fluid ">
        <div class="card">
            <div class="card-header">
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
                <div class="row">
                    <h3 class="text-bold ">SHIP SERV DATA</h3>
                </div>
            </div>

            <div class="card-body">

                <div class="col-lg-12">
                    <div class="row">




                        <div class="inputbox col-sm-2 py-2">
                            <input class="" type="date" name="TxtDateFrom" id="TxtDateFrom">
                            <span class=" " id="">Date From </span>
                        </div>

                        <div class="inputbox col-sm-2 py-2">
                            <input class="" type="date" name="TxtDateTo" id="TxtDateTo">
                            <span class=" " id="">Date To </span>
                        </div>







                        <div class="inputbox col-sm-4 py-2">
                            <input class="" type="text" name="TxtCustomerName"  id="TxtCustomerName">
                            <span class=" " id="">Customer Name</span>
                        </div>
                        <div class="inputbox col-sm-4 py-2">
                            <input class="" type="text" name="TxtCustomerRefNo"  id="TxtCustomerRefNo">
                            <span class=" " id="">Ref No</span>
                        </div>



                    </div>
                    <div class="row">
                        <a name="BtnGoNew" id="BtnGoNew" class="btn btn-info  mx-2  col-sm-1" role="button">Refresh</a>
                        <a name="BtnNewEvent" id="BtnNewEvent" class="btn btn-info  mx-2  col-sm-1" role="button">Create Event</a>
                        <a name="CmdAKNOWLEDGE" id="CmdAKNOWLEDGE" class="btn btn-info  mx-2  col-sm-1" role="button">AKNOWLEDGE</a>
                        <a name="CmdDECLINE" id="CmdDECLINE" class="btn btn-info  mx-2  col-sm-1" role="button">DECLINE</a>

                        <div class="input-group col-sm-4 ">
                            <div class="rdform row  ">
                                <input id="ChkRFQ" type="radio" class="rainput" autocomplete="off"
                                    name="hopping" value="" >
                                <label class="ralabel mx-2" for="ChkRFQ"><span></span> RFQ</label>
                                <input id="ChkQuoted" type="radio" class="rainput" autocomplete="off"
                                    name="hopping" value="">
                                <label class="ralabel  mx-2" for="ChkQuoted"><span></span>Quoted</label>
                                <input id="CHKPO" type="radio" class="rainput" autocomplete="off"
                                    name="hopping" value="">
                                <label class="ralabel  mx-2" for="CHKPO"><span></span>PO</label>
                                <input id="ChkAll" type="radio" class="rainput" autocomplete="off"
                                    name="hopping" value="" checked>
                                <label class="ralabel  mx-2" for="ChkAll"><span></span>All</label>
                                <div class="worm">
                                    @for ($j = 0; $j < 30; $j++)
                                        <div class="worm__segment"></div>
                                    @endfor
                                </div>
                            </div>
                    </div>

                </div>
            </div>
        </div>
        <input type="hidden" name="TxtTokenNo" id="TxtTokenNo" value="">
        <input type="hidden" name="TxtPriority" id="TxtPriority" value="">
        <input type="hidden" name="qid" id="qid" value="">

        <div class="table-responsive card">
            <table class="table  table-striped table-bordered table-hover small" id="Shipservetable">

                <thead class="">
                    <tr>
                        <th hidden>Buyer Trns ID</th>
                        <th style="width: 300px">Customer&nbsp;Name</th>
                        <th style="width: 200px">Vessel&nbsp;Name</th>
                        <th style="width: 100px">Vessel&nbsp;IMO</th>
                        <th hidden>Supplier Name</th>
                        <th hidden>Supplier Trns ID</th>
                        <th style="width: 100px">Reference&nbsp;No</th>
                        <th style="width: 100px">Subject</th>
                        <th style="width: 100px">Submitted&nbsp;Date</th>
                        <th style="width: 50px">Priority</th>
                        <th style="width: 50px" class="text-right">Total&nbsp;Cost</th>
                        <th style="width: 50px">Ship&nbsp;Serv&nbsp;Status</th>
                        <th hidden>ID</th>
                        <th hidden>Trans ID</th>
                        <th hidden>Currency Code</th>
                        <th style="width: 50px" >Exported</th>
                        <th style="width: 50px" class="text-right">Event&nbsp;No</th>
                        <th style="width: 50px">Port</th>
                        <th style="width: 50px">QuoteNo</th>
                        <th style="width: 50px">Quote&nbsp;Status</th>
                        <th style="width: 50px">Quote&nbsp;Date</th>
                        <th style="width: 50px">Type</th>
                    </tr>
                </thead>
                <tbody >

                </tbody>
            </table>
        </div>
    </div>



@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
    <style>
           .rainput:nth-of-type(1):checked~.worm .worm__segment {
            transform: translateX(0.5em);
        }

        .rainput:nth-of-type(1):checked~.worm .worm__segment:before {
            animation-name: hop1;
        }

        @keyframes hop1 {

            from,
            to {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-1.5em);
            }
        }

        .rainput:nth-of-type(2):checked~.worm .worm__segment {
            transform: translateX(5.5em);
        }

        .rainput:nth-of-type(2):checked~.worm .worm__segment:before {
            animation-name: hop2;
        }

        @keyframes hop2 {

            from,
            to {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-1.5em);
            }
        }

        .rainput:nth-of-type(3):checked~.worm .worm__segment {
            transform: translateX(11.8em);
        }

        .rainput:nth-of-type(3):checked~.worm .worm__segment:before {
            animation-name: hop3;
        }

        @keyframes hop3 {

            from,
            to {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-1.5em);
            }
        }
        .rainput:nth-of-type(4):checked~.worm .worm__segment {
            transform: translateX(16.1em);
        }

        .rainput:nth-of-type(4):checked~.worm .worm__segment:before {
            animation-name: hop4;
        }

        @keyframes hop4 {

            from,
            to {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-1.5em);
            }
        }
    </style>
@stop

@section('js')
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>


    <script>
        $(document).ready(function() {
            var chekdate = new Date();
            const Today = chekdate.toISOString().substring(0, 10);
                        chekdate.setMonth(chekdate.getMonth() - 1); // Subtract one month
        const oneMonthBefore = chekdate.toISOString().substring(0, 10);

            $('#TxtDateFrom').val(oneMonthBefore);
            $('#TxtDateTo').val(Today);


            var table = $('#Shipservetable').DataTable({
                scrollY: 700,
                scrollX: true,
                deferRender: true,
                scroller: true,
                paging: false,
                info: false,
                ordering: false,
                responsive: true,
                searching: false,
                fixedHeader: true,
            });
            $(".dt-button").removeClass("dt-button")

            $('#TxtCustomerRefNo').keyup(function (e) {
                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("TxtCustomerRefNo");
                filter = input.value.toUpperCase();
                table = document.getElementById("Shipservetable");
                tr = table.getElementsByTagName("tr");
                for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[6];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                    } else {
                    tr[i].style.display = "none";
                    }
                }
                }
            })
            $('#TxtCustomerName').keyup(function (e) {
                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("TxtCustomerName");
                filter = input.value.toUpperCase();
                table = document.getElementById("Shipservetable");
                tr = table.getElementsByTagName("tr");
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[1];
                    if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                    }
                }
            });
            function ajaxsetup() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            }
            function GetToken(){
                fetch('/get-token')
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    $('#TxtTokenNo').val(data.token);
                    // You can use the token in your application
                })
                .catch(error => console.error('Error:', error));
            }

            GetToken();

        function formatDate(dateString) {
            const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
            const date = new Date(dateString);
            const day = date.getDate();
            const monthIndex = date.getMonth();
            const year = date.getFullYear();
            const month = months[monthIndex];

            return `${day}-${month}-${year}`;
        }


         function fetchDataFromShipServ() {
             let chk = '';
             if (!document.getElementById('ChkAll').checked) {
                 if (document.getElementById('ChkRFQ').checked) {
                     chk = 'RequestForQuote';
                    } else if (document.getElementById('ChkQuoted').checked) {
                        chk = 'Quote';
                    } else if (document.getElementById('CHKPO').checked) {
                        chk = 'PurchaseOrder';
                    }
                }
                var TxtDateFrom = $('#TxtDateFrom').val();
                var TxtDateTo = $('#TxtDateTo').val();
                var TxtTokenNo = $('#TxtTokenNo').val();
                ajaxsetup();

                $.ajax({
                    type: 'post',
                    url: "{{ route('getShipserve') }}",
                    data: {
                        TxtDateFrom,
                        TxtDateTo,
                        TxtTokenNo,
                        chk,
                    },
                    beforeSend: function() {
                        $('.overlay').show();
                    },
                    success: function(response) {
                        console.log(response);
                        if (response.data) {
                            if (response.data.content) {
                                var List = response.data.content;
                                let table2 = $('#Shipservetable tbody').empty();
                                List.forEach(function(item) {
                                    let row = $('<tr>').addClass("intro-x").appendTo(table2);
                                    function createCell(content, className, atribut) {
                                        return $('<td>').html(content).addClass(className).attr(atribut, atribut).appendTo(row);
                                        }
                                    createCell(item.buyerTnId,'','hidden');
                                    createCell(item.buyerName);
                                    createCell(item.vesselName);
                                    createCell(item.supplierTnId,'','hidden');
                                    createCell(item.supplierName,'','hidden');
                                    createCell(item.vesselImoNumber);
                                    createCell(item.referenceNumber);
                                    createCell(item.subject);
                                    createCell(formatDate(item.submittedDate));
                                    createCell(item.priority);
                                    createCell(item.totalCost);
                                    createCell(item.status);
                                    createCell(item.transactionId,'','hidden');
                                    createCell('USD','','hidden');
                                    createCell(item.exported);
                                    createCell('');
                                    createCell('');
                                    createCell('');
                                    createCell('');
                                    createCell('');
                                    createCell(item.type);
                                    createCell(item.id,'','hidden');
                                })

                                table.columns.adjust();
                            }

                        }

                    },

                    error: function(data) {
                        console.log(data);
                        $('.overlay').hide();
                    },
                    complete: function() {
                        $('.overlay').hide();
                        // Hide the overlay and spinner after the request is complete
                    }

                });

            }
            $('#BtnGoNew').click(function(e) {
                fetchDataFromShipServ();
            })
            $('#Shipservetable tbody').on('click', 'tr', function() {
                var selectedRow = $(this);
                var TxtPriority = selectedRow[0].cells[9].innerHTML; // Get data from the second column (index 1)
                var LastColumnValue = selectedRow.find('td:nth-last-child(1)').text(); // Get value from the third-to-last column
                // console.log(selectedData);
                // console.log(LastColumnValue);/
                // if (thirdLastColumnValue === '1') {
                //     selectedRow.css('background-color',
                //         'rgb(199, 62, 74)'); // Set the background color if the value is '1'
                // }

                if (!selectedRow.hasClass('selected')) {
                    $('#Shipservetable tbody tr').removeClass(
                        'selected'); // Remove 'selected' class from all rows
                    selectedRow.addClass('selected');
                        $('#qid').val('');
                        $('#qid').val(LastColumnValue);
                        $('#TxtPriority').val('');
                        $('#TxtPriority').val(TxtPriority);

                    selectedRow.css('background-color',
                        ''); // Reset background color to remove inline style
                    // console.log(selectedData); // Log the data from the second column
                    // $('#TxtQuoteNo').val(selectedData);
                }
                // checkhot();

            });
                $('#BtnNewEvent').click(function (e) {
                    e.preventDefault();
                    if ($('#qid').val() == '') {

                    }else{
                        var token = $('#TxtTokenNo').val()
                        var Priority = $('#TxtPriority').val()
                        window.location.href = "{{route('events-setup')}}"+"?ShipId="+ $('#qid').val()+'&Token='+token+'&Priority='+Priority;
                    }
                });
            $('#BtnClearFilter').click(function(e) {
                e.preventDefault();
                $(TxtQuoteNo).val('');
                $(TxtCustomerRefNo).val('');
                $(TxtCustomerName).val('');
                $(TxtVesselSearch).val('');
                $(TxtPortName).val('');
                $(TxtValueAmount).val('');
                $(CmbQuoteEntry).val('');
                $(CmbSendToVendor).val('');
                $(CmbCosting).val('');
                $(CmbPricing).val('');
                $(CmbReKey).val('');
                $(CmbSendToCust).val('N');
                $(CmbDepartment).val('');
            });



        });


</script>

@stop

@section('content')
