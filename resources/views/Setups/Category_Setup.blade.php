@extends('layouts.app')



@section('title', 'Category-Setup')

@section('content_header')

@stop

@section('content')

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
                        <h2 class="text-center">Category Setup</h2>
                    </b>

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">


                            <div class="row">
                                <div class="inputbox col-sm-8 py-2">
                                    <input readonly type="text" class="" id="TxtCode" name="TxtCode"
                                        required="required">
                                    <span class="Txtspan">
                                        Category Code </span>
                                </div>
                            </div>
                            <div class="row">

                                <div class="inputbox col-sm-8 py-2">
                                    <input type="text" class="" id="TxtCategoryName" name="TxtCategoryName"
                                        required="required">
                                    <span class="Txtspan">
                                        Category Name </span>
                                </div>
                            </div>





                            <div class="row py-2">
                                <button class="btn btn-primary  mx-2" id="CmdAdd" role="button"> <i
                                        class="fa fa-plus mr-1" aria-hidden="true"></i>Add</button>

                                <button class="btn btn-success mx-2" id="CmdSave" role="button"> <i
                                        class="fa fa-cloud mr-1" aria-hidden="true"></i>Save</button>

                                <button class="btn btn-warning mx-2" id="CmdDelete" role="button"> <i
                                        class="fa fa-multiply mr-1" aria-hidden="true"></i>Delete</button>

                                <button class="btn btn-danger mx-2" id="CmdExit" onclick="window.location.href='/'" role="button"> <i
                                        class="fa fa-door-open mr-1" aria-hidden="true"></i>Exit</button>
                            </div>


                        </div>

                        <div class="col-lg-6">
                            <div class="row py-2">
                                <div class="inputbox col-sm-12">
                                    <input type="text" class="" onkeyup="cusFunction()" id="TxtFind"
                                        name="TxtFind" required="required">
                                    <span class="ml-2">
                                        Search
                                    </span>
                                </div>
                            </div>
                            <div class="row py-2">



                                <div class="col-sm-12">

                                    <div class="rounded shadow">
                                        <table class="table small" id="Gd1">
                                            <thead class="bg-info">
                                                <tr>
                                                    <th>Category Code</th>
                                                    <th>Category Name</th>
                                                </tr>
                                            </thead>
                                            <tbody id="Gd1body">
                                                @foreach ($category as $categoryitem)
                                                    <tr class="js-row">
                                                        <td>{{ $categoryitem->CategoryCode }}</td>

                                                        <td>{{ $categoryitem->CategoryName }}</td>
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

        function cusFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("TxtFind");
            filter = input.value.toUpperCase();
            table = document.getElementById("Gd1body");
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
        };

        function jsdblfunc(row) {
            var Typecode = row.find('td:eq(0)').text();
            var CategoryName = row.find('td:eq(1)').text();

            $('#TxtCode').val(Typecode);
            $('#TxtCategoryName').val(CategoryName);


        }

        function clearform() {
            $('#TxtCode').val('');
            $('#TxtCategoryName').val('');
        }

        function createlist(tabledata) {
            let table = document.getElementById('Gd1body');
            table.innerHTML = ""; // Clear the table
            tabledata.forEach(function(item) {
                let row = table.insertRow();
                row.classList.add("js-row");

                function createCell(content) {
                    let cell = row.insertCell();
                    cell.innerHTML = content;
                    return cell;
                }
                createCell(item.CategoryCode);
                createCell(item.CategoryName);
            });



        }

        function performdelete() {
            var TxtCode = $('#TxtCode').val();

            ajaxSetup();
            $.ajax({
                url: "{{ route('CategoryDelete') }}",
                type: 'POST',
                data: {
                    TxtCode,
                },
                beforeSend: function() {
                    $('.overlay').show();
                },
                success: function(resposne) {
                    console.log(resposne);
                    if (resposne.Message == 'Deleted') {
                        if (resposne.categorysetup.length > 0) {
                            var categorysetup = resposne.categorysetup;
                            createlist(categorysetup);
                        }


                        clearform();

                        Swal.fire(
                            'Confirmed!',
                            'Category Is Deleted.',
                            'success'
                        );
                    }
                    $('.js-row').dblclick(function(e) {
                        e.preventDefault();
                        var row = $(this);
                        jsdblfunc(row);

                    });
                },
                error: function(data) {
                    console.log(data);
                    $('.overlay').hide();
                },
                complete: function() {
                    $('.overlay').hide();
                }


            });
        }


        $(document).ready(function() {

            $('.js-row').dblclick(function(e) {
                e.preventDefault();
                var row = $(this);
                jsdblfunc(row);

            });

            var table1 = $('#Gd1').DataTable({

                scrollY: 600,
                deferRender: true,
                scroller: true,
                paging: false,
                info: false,
                ordering: false,
                searching: false,
                responsive: true,


            });


            $('#CmdSave').click(function(e) {
                e.preventDefault();
                var TxtCode = $('#TxtCode').val();
                var TxtCategoryName = $('#TxtCategoryName').val();

                ajaxSetup();
                $.ajax({
                    url: "{{ route('CategorySave') }}",
                    type: 'POST',
                    data: {
                        TxtCode,
                        TxtCategoryName,

                    },
                    beforeSend: function() {
                        $('.overlay').show();
                    },
                    success: function(resposne) {
                        console.log(resposne);
                        if (resposne.Message == 'Saved') {
                            if (resposne.categorysetup.length > 0) {
                                var categorysetup = resposne.categorysetup;
                                createlist(categorysetup);
                            }


                            clearform();
                            Swal.fire(
                                'Confirmed!',
                                'Category Is Saved.',
                                'success'
                            );

                        }
                        $('.js-row').dblclick(function(e) {
                            e.preventDefault();
                            var row = $(this);
                            jsdblfunc(row);

                        });
                    },
                    error: function(data) {
                        console.log(data);
                        $('.overlay').hide();
                    },
                    complete: function() {
                        $('.overlay').hide();
                    }


                });
            });



            $('#CmdAdd').click(function(e) {
                e.preventDefault();
                $('#TxtCode').val('');
                $('#TxtCategoryName').val('');

            });

            $('#CmdDelete').click(function(e) {
                e.preventDefault();
                var TxtCode = $('#TxtCode').val();
                if (TxtCode == '') {
                    return Swaal.fire({
                        icon: 'error',
                        title: 'Category Not Found!',
                        text: 'Please Select Category To Delete',
                        footer: '<a href>Why do I have this issue?</a>'
                    });

                }

                Swal.fire({
                    title: 'Please enter Admin Authentication',
                    text: 'Are You Sure Want To Delete?',
                    icon: 'question',
                    input: 'password', // Adding an input field for password
                    inputPlaceholder: 'Enter your password', // Placeholder for the input field
                    showCancelButton: true,
                    confirmButtonText: 'Delete',
                    cancelButtonText: 'Cancel',
                    showLoaderOnConfirm: true, // You can display a loader animation while confirming
                    preConfirm: (password) => {
                        return new Promise((resolve, reject) => {
                            // Example password validation
                            if (password === '33221') {
                                resolve();
                            } else {
                                Swal.showValidationMessage('Incorrect password');
                                reject('Incorrect password');
                            }
                        });
                    },
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Password is correct, perform the delete action
                        performdelete();
                    }
                }).catch(() => {
                    Swaal.fire({
                        icon: 'error',
                        title: 'Incorrect password!',
                        text: 'Incorrect password',
                        footer: '<a href>Why do I have this issue?</a>'
                    });
                    // Swal.close(); // Close the dialog
                    // Handle rejection (incorrect password)

                });

            });


        });
    </script>




@stop


@section('content')
