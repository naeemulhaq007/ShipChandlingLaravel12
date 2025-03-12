\@extends('layouts.app')



@section('title', 'Currency Setup')

@section('content_header')

@stop

@section('content')
    </div>
    <?php echo View::make('partials.ExpenseVoucherReport'); ?>

    <div class="container-fluid">

        <div class="col-lg-12 pt-3">


            <div class="card">
                <div class="card-header">
                    <h3 class="text-center text-bold text-blue">Currency Setup</h3>
                    <div class="card-tools ">
                        <button type="button" name="headertoggle" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>

                    </div>
                </div>

                <div class="card-body">

                    <table class="table" id="PO-recivedtable">
                        <thead class="c">
                            <tr>
                                <th>Serial&nbsp;No.</th>
                                <th>Currency</th>
                                <th>Exchange&nbsp;Rate</th>
                            </tr>
                        </thead>
                        <tbody id="Receiptvocvertablebody">
                            <tr data-row-id="">
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>




            <div class="card">
                <div class="card-body">
                    <div class="row py-2">

                        <div class="inputbox col-sm-4">
                            <input type="hidden" id="ID" name="" value="">
                            <input type="text" id="TxtSerialNo" name="" value="">
                            <span>Serial No.</span>
                        </div>

                    </div>

                    <div class="row py-2">
                        <div class="inputbox col-sm-4">
                            <input id="TxtCurrency" type="text" class="">
                            <span>Currency Name</span>
                        </div>
                    </div>

                    <div class="row py-2">
                        <div class="inputbox col-sm-4">
                            <input id="TxtExchangeRate" type="double" class="">
                            <span>Exchange Rate</span>
                        </div>
                        <div class="inputbox col-sm-4">
                            <input id="pkrrate" type="double" class="">
                            <span>Current USD Rate</span>
                        </div>
                    </div>

                    <div class="row py-2">
                        <div class="mx-auto">
                            <a name="CmdAdd" id="CmdAdd" class="btn btn-primary mx-2" role="button"><i
                                    class="fa fa-plus mr-1" aria-hidden="true"></i> Add</a>
                            <a name="CmdSave" id="CmdSave" class="btn btn-success mx-2" role="button"><i
                                    class="fa fa-cloud mr-1" aria-hidden="true"></i> Save</a>
                            <a name="CmdDelete" id="CmdDelete" class="btn btn-warning mx-2" href="#" role="button">
                                <i class="fas fa-trash  mr-1"></i> Delete</a>

                            <a name="CmdExit" id="CmdExit" class="btn btn-danger mx-2" href="#" role="button"><i
                                    class="fas fa-door-open  mr-1"></i> Exit</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>



    </div>


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
    {{-- <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script> --}}
    {{-- <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js" integrity="sha512-a9NgEEK7tsCvABL7KqtUTQjl69z7091EVPpw5KxPlZ93T141ffe1woLtbXTX+r2/8TtTvRX/v4zTL2UlMUPgwg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    {{-- <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script> --}}
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
    <script>
        $(document).ready(function() {


            const apikey = '72684ea695bf423cbde2780b4db84da6';

            fetch(`https://api.currencyfreaks.com/latest?apikey=${apikey}&symbols=PKR`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log(data.rates.PKR);
                    if (!data || !data.rates || !data.rates.PKR) {
                        throw new Error('Response data is missing PKR rate');
                    }
                    const usdToPkrRate = data.rates.PKR;
                    // const allrate = data;
                    const rate = parseFloat(usdToPkrRate).toFixed(2);
                    // if (typeof usdToPkrRate !== 'number') {
                    //   throw new Error('Exchange rate is not a number');
                    // }
                    $('#pkrrate').val(rate);
                    console.log('1 USD = ' + rate + ' PKR');
                    // console.log(allrate);
                })
                .catch(error => {
                    console.error('Error fetching exchange rate:', error);
                });
        });
        $(document).ready(function() {
            dataget();
            var table = $('#PO-recivedtable').DataTable({

                scrollY: 460,
                deferRender: true,
                scroller: true,
                responsive: true,
                ordering: false,
                searching: false,
                info: false,
                paging: false,
                // dom: 'Bfrtip',
                // buttons: [




                // {
                //     text: 'Edit',
                // className: 'btn btn-primary ',
                // action: function ( e, dt, node, config ) {
                //     Roweditfunc();

                // }
                // },

                // ],

            });
            $(".dt-button").removeClass("dt-button")



            $('#CmdSave').click(function(e) {
                var ID = $('#ID').val();
                var TxtSerialNo = $('#TxtSerialNo').val();
                var TxtCurrency = $('#TxtCurrency').val();
                var TxtExchangeRate = $('#TxtExchangeRate').val();
                e.preventDefault();
                ajaxSetup();
                $.ajax({
                    type: "post",
                    url: "{{ route('CurrencySave') }}",
                    data: {
                        ID,
                        TxtSerialNo,
                        TxtCurrency,
                        TxtExchangeRate,
                    },
                    success: function(response) {
                        console.log(response);
                        if (response.Message == 'Saved') {
                            alert(response.Message)

                            if (response.currencyysetup.length > 0) {
                                var currency = response.CurrencySetup;
                                let table = document.getElementById('Receiptvocvertablebody');
                                table.innerHTML = ""; // Clear the table
                                currency.forEach(function(item) {
                                    let row = table.insertRow();
                                    row.classList.add("js-row");

                                    function createCell(content) {
                                        let cell = row.insertCell();
                                        cell.innerHTML = content;
                                        return cell;
                                    }
                                    createCell(item.id);
                                    createCell(item.TxtSerialNo);
                                    createCell(item.TxtCurrency);
                                    createCell(item.TxtExchangeRate);
                                });
                                dblcvkui()
                            }
                        }
                    }
                });

            });

            $('#CmdDelete').click(function(e) {

                var ID = $('#ID').val();
                e.preventDefault();
                ajaxSetup();
                $.ajax({
                    type: "post",
                    url: "{{ route('currencyDelete') }}",
                    data: {
                        ID,
                    },
                    success: function(response) {
                        console.log(response);
                        if (response.Message == 'Deleted') {
                            alert(response.Message)

                            if (response.currencyysetup.length > 0) {
                                var currency = response.CurrencySetup;
                                let table = document.getElementById('Receiptvocvertablebody');
                                table.innerHTML = ""; // Clear the table
                                currency.forEach(function(item) {
                                    let row = table.insertRow();
                                    row.classList.add("js-row");

                                    function createCell(content) {
                                        let cell = row.insertCell();
                                        cell.innerHTML = content;
                                        return cell;
                                    }
                                    createCell(item.id);
                                    createCell(item.TxtSerialNo);
                                    createCell(item.TxtCurrency);
                                    createCell(item.TxtExchangeRate);
                                });
                                dblcvkui()
                            }
                        }
                    }
                });

            });


        });

        $(document).ready(function() {


        });


        function ajaxSetup() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        }

        function dblcvkui() {
            const tableBody = document.getElementById("Receiptvocvertablebody");

            tableBody.addEventListener("dblclick", function(e) {
                if (e.target.tagName === "TD") {
                    const td = e.target;
                    const tr = td.parentNode;
                    const tdElements = tr.getElementsByTagName("td");

                    $('#ID').val(tdElements[0].innerHTML);
                    $('#TxtSerialNo').val(tdElements[1].innerHTML);
                    $('#TxtCurrency').val(tdElements[2].innerHTML);
                    $('#TxtExchangeRate').val(tdElements[3].innerHTML);


                }
            });
        }

        function dataget() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '{{ route('Currencydataget') }}',
                type: 'POST',
                data: {

                },
                success: function(resposne) {

                    console.log(resposne);
                    let data = resposne.currency;
                    let table = document.getElementById('Receiptvocvertablebody');
                    table.innerHTML = ""; // Clear the table
                    data.forEach(function(item) {
                        let row = table.insertRow();
                        row.classList.add("js-row");

                        function createCell(content) {
                            let cell = row.insertCell();
                            cell.innerHTML = content;
                            return cell;
                        }
                        createCell(item.id).hidden = 'true';
                        createCell(item.SerialNo);
                        createCell(item.Currency);
                        createCell(item.ExchangeRate);



                    });

                    dblcvkui();




                }
            });

        }
        $(document).ready(function() {





            $('#Newinv').click(function(e) {

                $('#TxtVoucherDate').val('');
                $('#TxtActCashName').val('');

            });



        });
    </script>
@stop


@section('content')
