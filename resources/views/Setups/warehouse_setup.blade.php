@extends('layouts.app')



@section('title', 'Warehouse-Setup')

@section('content_header')

@stop

@section('content')
    <?php echo View::make('partials.Chartacmodal')->with('BranchCode',$BranchCode); ?>


    <div class="container-fluid ">

        <div class="col-lg-12 pt-3">


            <div class="card ">
                <div class="card-header ">
                    <div class="card-tools ">


                        <button type="button" name="headertoggle" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                    <b>
                        <h4 class="text-black">Warehouse Setup</h4>
                    </b>

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">

                            <div class="row">
                                <div class="inputbox col-sm-8 py-2">
                                    <input type="text" class="" id="TxtGodownCode" value="{{$NewGodownCode}}" name="TxtGodownCode"
                                        required="required">
                                    <span class="Txtspan">
                                        Code </span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="inputbox col-sm-8 py-2">
                                    <input type="text" class="" id="TxtGodownName" name="TxtGodownName"
                                        required="required">
                                    <span class="Txtspan">
                                        Warehouse </span>
                                </div>

                                <div class="CheckBox1 py-2">
                                    <label class="input-group text-info ml-2">
                                        <input class=" " type="checkbox" name="ChkNotShow" id="ChkNotShow"
                                            value=""> Do Not Show Operation
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="inputbox col-sm-8 py-2">
                                    <input type="text" class="" id="txt_print" name="txt_print"
                                        required="required">
                                    <span class="Txtspan">
                                        Printer Name </span>
                                </div>
                            </div>
                            <div class="row">
                                <div  class="inputbox col-sm-2 py-2">
                                    <input type="text" class="" id="TxtStockCode" name="TxtStockCode"
                                        required="required">
                                        <span class="Txtspan">
                                            Code</span>
                                </div>
                                <div class="inputbox col-sm-6 col-8 py-2">
                                    <input type="text" class="" id="TxtStockName" name="TxtStockName"
                                        required="required">
                                    <span class="Txtspan">
                                        Stock A/C </span>
                                </div>
                                    <span class="input-group-text col-3 col-sm-1 bg-info my-2" style="cursor: pointer;" id="CmdStock"><i
                                            class="fas fa-search"></i></span>




                            </div>

                            <div class="row">

                                <div class="inputbox col-sm-8 py-2">
                                    <input type="text" class="" id="TxtPrefix" name="TxtPrefix"
                                        required="required">
                                    <span class="Txtspan">
                                        Prefix </span>
                                </div>
                            </div>
                            <div class="row">
                            <div class="inputbox py-2 col-sm-8">

                                <span class="Txtspan">
                                    State Name
                                </span>
                                <select name="CmbStateName" id="CmbStateName" >
                                    @foreach ($StateSetup as $StateSetupitem)
                                        <option value="{{ $StateSetupitem->StateCode }}">{{ $StateSetupitem->StateName }} </option>
                                    @endforeach
                                </select>

                            </div>
                            </div>
                            <input type="hidden" class="" id="TxtStateCode" name="TxtStateCode"
                                        required="required">















                        </div>

                        <div class="col-lg-6">

                            <div class="row py-2">



                                <div class="col-sm-12">

                                    <div class="rounded shadow">
                                        <table class="table small" id="Gd1">
                                            <thead class="bg-info">
                                                <tr>
                                                    <th>Codesss</th>
                                                    <th>Warehouse&nbsp;Name</th>
                                                    <th>Stock&nbsp;Name</th>
                                                    <th>State&nbsp;Name</th>
                                                    <th hidden>PrinterName</th>
                                                    <th hidden>StockCode</th>
                                                    <th hidden>Prefix</th>
                                                    <th hidden>ChkNotShow</th>
                                                    <th hidden>stateCode</th>

                                                </tr>
                                            </thead>
                                            <tbody id="Gd1body">
                                                @foreach ($GodownSetup as $GodownSetupitem)
                                                    <tr class="js-row">
                                                        <td>{{ $GodownSetupitem->GodownCode }}</td>
                                                        <td>{{ $GodownSetupitem->GodownName }}</td>
                                                        <td>{{ $GodownSetupitem->StockName }}</td>
                                                        <td>{{ $GodownSetupitem->StateName ?? '' }}</td>

                                                    
                                                        <td hidden>{{ $GodownSetupitem->PrinterName }}</td>
                                                        <td hidden>{{ $GodownSetupitem->StockCode }}</td>
                                                        <td hidden>{{ $GodownSetupitem->Prefix }}</td>
                                                        <td hidden>{{ $GodownSetupitem->ChkNotShow }}</td>
                                                        <td hidden>{{ $GodownSetupitem->stateCode }}</td>

                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>











                        </div>
                    </div>
                    <div class="row ml-1">
                        <button class="btn btn-primary my-2 mx-2" id="CmdAdd" role="button"> <i class="fa fa-plus mr-1"
                                aria-hidden="true"></i>New</button>

                        <button class="btn btn-success my-2 mx-2" id="CmdSave" role="button"> <i class="fa fa-cloud mr-1"
                                aria-hidden="true"></i>Save</button>

                        <button class="btn btn-warning my-2 mx-2" id="CmdDelete" role="button"> <i class="fa fa-multiply mr-1"
                                aria-hidden="true"></i>Delete</button>
                        <a href="{{url('warehouse-setup') }}" class="btn btn-danger my-2 mx-2" id="CmdExit" role="button"> <i class="fa fa-door-open mr-1"
                                aria-hidden="true"></i>Exit</a>
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
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>

    <script>
        function ajaxSetup() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        }


$(document).ready(function() {


var table1 = $('#Gd1').DataTable({
    scrollY: 400,
    deferRender: true,
    scroller: true,
    paging: false,
    info: false,
    searching: true,
    responsive: true,
    ordering: true,
    order: [[1, 'asc']] // ✅ ASCENDING order
});


    // table1.column.adjust();


});

        $(document).ready(function() {
            $('#CmdStock').click(function(e) {
                e.preventDefault();
                $('#chart').modal('show');
            });

            $('.parrent').dblclick(function (e) {
                e.preventDefault();
                var code = $(this).data('accode');
                var Name = $(this).data('acname');
                $('#TxtStockCode').val(code);
                $('#TxtStockName').val(Name);
                $('#chart').modal('hide');
            });

            $('.js-row').dblclick(function (e) {
            e.preventDefault();
            var row = $(this);
            var Code = row.find('td:eq(0)').text();
            var WarehouseName = row.find('td:eq(1)').text();
            var StockName = row.find('td:eq(2)').text();
            var StateName = row.find('td:eq(3)').text();
            var PrinterName = row.find('td:eq(4)').text();
            var StockCode = row.find('td:eq(5)').text();
            var Prefix = row.find('td:eq(6)').text();
            var ChkNotShow = row.find('td:eq(7)').text();
            var stateCode = row.find('td:eq(8)').text();

                $('#TxtGodownCode').val(Code);
                $('#TxtGodownName').val(WarehouseName);
                $('#txt_print').val(PrinterName);
                $('#TxtStockCode').val(StockCode);
                $('#TxtStockName').val(StockName);
                $('#TxtPrefix').val(Prefix);
                $('#CmbStateName').val(stateCode);


            });

            $('#CmdAdd').click(function (e) {
                e.preventDefault();
                location.reload();
            });
            $('#CmdDelete').click(function (e) {
                e.preventDefault();
               var TxtGodownCode = $('#TxtGodownCode').val();

                var password = prompt("Please enter Admin Authentication:");
                if (password === "332211") {
                if (confirm("Are you sure you want to proceed?")) {
                    // proceed with action
                    ajaxSetup();
                $.ajax({
                    url: '/WarehouseDelete',
                    type: 'POST',
                    data: {
                        TxtGodownCode,
                    },
                    beforeSend: function() {
                        $('.overlay').show();
                    },
                    success: function(response) {
                        console.log(response);
                        if (response.Message == 'Deleted') {
                            alert(response.Message)

                            if(response.GodownSetup.length > 0){
                            var Ships = response.GodownSetup;
                            let table = document.getElementById('Gd1body');
                            table.innerHTML = ""; // Clear the table
                            Ships.forEach(function(item) {
                           
                             let row = table.insertRow(0)
                            row.classList.add("js-row");

                            function createCell(content) {
                                let cell = row.insertCell();
                                cell.innerHTML = content;
                                return cell;
                            }
                            createCell(item.GodownCode);
                            createCell(item.GodownName);
                            createCell(item.StockName);
                            createCell(item.StateName);
                            createCell(item.PrinterName).hidden = 'true';
                            createCell(item.StockCode).hidden = 'true';
                            createCell(item.Prefix).hidden = 'true';
                            createCell(item.ChkNotShow).hidden = 'true';
                            createCell(item.stateCode).hidden = 'true';
                            });

                        }
                        }

                    },
                    error: function(data) {
                        console.log(data);
                        $('.overlay').hide();
                    },
                    complete: function() {
                        $('.overlay').hide();
                    }


                });
            } else {
                alert("Access denied.");
            }
            } else {
                alert("Incorrect password.");
            }

            });

            $('#CmdSave').click(function (e) {
               var TxtGodownCode = $('#TxtGodownCode').val();
               var TxtGodownName = $('#TxtGodownName').val();
               var txt_print = $('#txt_print').val();
               var TxtStockCode = $('#TxtStockCode').val();
               var TxtStockName = $('#TxtStockName').val();
               var TxtPrefix = $('#TxtPrefix').val();
               var CmbStateName = $('#CmbStateName').val();
               var ChkNotShow = $('#ChkNotShow').is(":checked");
                e.preventDefault();
                ajaxSetup();
               $.ajax({
    type: "post",
    url: "/WarehouseSave",
    data: {
        TxtGodownCode,
        TxtGodownName,
        txt_print,
        TxtStockCode,
        TxtStockName,
        TxtPrefix,
        CmbStateName,
        ChkNotShow,
    },
success: function (response) {
    console.log(response);

    if (response.Message == 'Saved') {

        Swal.fire({
            icon: 'success',
            title: 'Saved Successfully!',
            text: 'Warehouse has been saved.',
            showConfirmButton: true,
            timer: 2000
        });

        if (response.GodownSetup.length > 0) {
            var Ships = response.GodownSetup;

            // ✅ Sort ascending by Warehouse Name
            Ships.sort(function(a, b) {
                var nameA = (a.GodownName || '').toUpperCase();
                var nameB = (b.GodownName || '').toUpperCase();
                if (nameA < nameB) return -1;
                if (nameA > nameB) return 1;
                return 0;
            });

          
            if ($.fn.DataTable.isDataTable('#Gd1')) {
                $('#Gd1').DataTable().destroy();
            }

            let table = document.getElementById('Gd1body');
            table.innerHTML = ""; // Clear the table

            Ships.forEach(function(item) {
                let row = table.insertRow();
                row.classList.add("js-row");

                function createCell(content) {
                    let cell = row.insertCell();
                    cell.innerHTML = content ?? '';
                    return cell;
                }

                createCell(item.GodownCode);
                createCell(item.GodownName);
                createCell(item.StockName);
                createCell(item.StateName);
                createCell(item.PrinterName).hidden = true;
                createCell(item.StockCode).hidden = true;
                createCell(item.Prefix).hidden = true;
                createCell(item.ChkNotShow).hidden = true;
                createCell(item.stateCode).hidden = true;
            });

          
       var table1 = $('#Gd1').DataTable({
    scrollY: 400,
    deferRender: true,
    scroller: true,
    paging: false,
    info: false,
    searching: false,
    responsive: true,
    ordering: true,
    order: [[1, 'asc']] 
});

        }
    }
},



    error: function () {
        Swal.fire({
            icon: 'error',
            title: 'Oops!',
            text: 'Something went wrong while saving.',
            timer: 3000
        });
    }
});

            });


        });
    </script>




@stop


@section('content')
