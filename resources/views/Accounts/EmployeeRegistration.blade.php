@extends('layouts.app')



@section('title', 'Employee-Registration')

@section('content_header')

@stop

@section('content')
    </div>
    {{-- <?php// echo View::make('partials.itemsearch') ?> ?> --}}

    <div id="alert-container">

    </div>





    {{-- <form action="itemreg/store" enctype="multipart/form-data" method="POST">
    @csrf --}}



    <div class="col-lg-12 row pt-2">

        <div class="col-md-12 contaniner">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center text-bold">Employee Registration</h3>
                </div>

            </div>
        </div>

        <div class="col-md-6 contaniner">
            <div class="card">

                <div class="card-header">
                    <h5 class="text-center">Pay Roll Registration</h5>




                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <div class="row py-2">

                        <div class="inputbox col-sm-4">
                            <input class="" type="text" name="TxtEmpNo" id="TxtEmpNo" placeholder="">
                            <span class="" id="">Employee No</span>
                        </div>

                        {{-- <a name="" id="" class="btn btn-default col-sm-1" href="#" role="button"><i class="fa fa-search" aria-hidden="true"></i></a> --}}

                        <div class="inputbox col-sm-4">
                            <input class="" type="date" name="DateTimePicker1" id="DateTimePicker1"
                            placeholder="">
                            <span class="" id="">Registration Date</span>
                        </div>

                        <div class="CheckBox1">
                            <label class="input-group text-info mx-2 mt-2">
                                <input class="" type="checkbox" name="Inactive" id="Inactive"
                                    autocomplete="off"> Inactive
                            </label>
                        </div>

                    </div>


                    <div class="row py-2">

                        <div class="inputbox col-sm-12">
                            <input class="" type="text" name="TxtName" id="TxtName" placeholder="">
                            <span class="" id="">Full Name</span>
                        </div>

                    </div>

                    <div class="row py-2">


                        <div class="inputbox col-sm-12">
                            <input class="" type="text" name="TxtPostalAdd" id="TxtPostalAdd"
                            placeholder="">
                            <span class="" id="">Address</span>
                        </div>

                    </div>

                    <div class="row py-2">
                        <div class="inputbox col-sm-12">
                            <input class="" type="text" name="TxtNICNo" id="TxtNICNo"
                            placeholder="">
                            <span class="" id="">S.S. / T.I.N #</span>
                        </div>
                    </div>

                    <div class="row py-2">
                        <div class="inputbox col-sm-12">
                            <span class="Txtspan" id="">Pay Location</span>

                            <select class="" name="Department" id="Departmentselect">
                                <option disabled value=""></option>
                                @foreach (DB::table('empdepartmentsetup')->where('BranchCode', $MBranchCode)->orderBy('DepartmentCode', 'asc')->get() as $dep)
                                    <option value="{{ $dep->DepartmentCode }}">{{ $dep->DepartmentName }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>

                    <div class="row py-2">

                        <div class="inputbox col-sm-6">
                            <span class="Txtspan" id="">Pay Type</span>

                            <select class=""  name="PayType" id="PayType">
                                @foreach (DB::table('paytype')->where('BranchCode', $MBranchCode)->orderBy('paytype', 'asc')->get() as $pay)
                                    <option value="{{ $pay->PayCode }}">{{ $pay->paytype }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="inputbox col-sm-6">
                            <input class="" type="text" name="TxtSalary" id="TxtSalary"
                            placeholder="Recipient's text" aria-label="Recipient's " aria-describedby="">
                            <span class="" id="">Gross Pay</span>
                        </div>

                    </div>

                    <div class="row py-2">

                        <div class="inputbox col-sm-6">
                            <input class="" type="text" name="Currency" id="Currency"
                            placeholder="Recipient's text" aria-label="Recipient's " aria-describedby="">
                            <span class="" id="">Currency</span>
                        </div>

                        <div class="inputbox col-sm-6">
                            <input class="" type="date" name="DateTimePicker2" id="DateTimePicker2">
                            <span id="">Entry Date In Service</span>
                        </div>

                    </div>

                    <div class="row py-2">

                        <div class="inputbox col-sm-12">
                            <input type="text" class="" name="TxtAccNo" id="TxtAccNo">
                            <span class="" id="">A/c No with Bank</span>
                        </div>

                    </div>

                    <div class="row py-2">

                        <div class="inputbox col-sm-12">
                            <input type="text" class="" name="TxtPTCLNO" id="TxtPTCLNO">
                            <span class="" id="">Phone #</span>
                        </div>
                    </div>

                    <div class="row py-2">
                        <div class="inputbox col-sm-12">
                            <input type="text" class="" name="TxtCellNo" id="TxtCellNo">
                            <span class="" id="">Cell No</span>
                        </div>
                    </div>

                    <div class="row py-2">
                        <div class="inputbox col-sm-12">
                            <input class="" type="text" name="TxtEmailadd" id="TxtEmailadd">
                            <span class="" id="">Email Address</span>
                        </div>
                    </div>

                    <div class="row py-2">
                        <div class="inputbox col-sm-12">
                            <input class="" type="text" name="TxtComments" id="TxtComments">
                            <span class="" id="">Comments</span>
                        </div>
                    </div>

                    <button name="New" id="NewItem" class="btn btn-primary col-sm-2 mt-2" role="button"><i
                            class="fa fa-plus mr-1" aria-hidden="true"></i> New</button>

                    <button name="SaveItem" id="SaveItem" class="btn btn-success col-sm-2 mx-2 mt-2" role="button"><i
                            class="fa fa-cloud mr-1" aria-hidden="true"></i> Save</button>

                    <a name="" id="Deletedata" class="btn btn-warning col-sm-2 mt-2" role="button"><i
                            class="fa fa-trash mr-1" aria-hidden="true"></i> Delete</a>


                    <a name="" id="" class="btn btn-danger col-sm-2 mx-2 mt-2" href="/" role="button"><i
                            class="fas fa-door-open mr-1"></i> Exit</a>


                </div>

            </div>
        </div>
        <div class="col-md-6 container">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-center">Employee Data</h5>




                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="rounded shadow mx-auto">
                        <div class="row py-1">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="row">
                                            <div class="col-sm-5">
                                                <img src="https://via.placeholder.com/80x80" id="preview"
                                                    width="120px" class="img-thumbnail">

                                                <div hidden class="form-group">
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" name="file"
                                                                class="custom-file-input" id="file"
                                                                accept="image/*">
                                                            <label class="custom-file-label" for="file">Choose
                                                                file</label>
                                                        </div>
                                                        <div class="input-group-append">
                                                            <button type="button" class="btn btn-primary">Browse</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 ">
                                                <div class="row py-1">
                                                    <button name="" class="btn btn-info" id="browse-btn"><i
                                                            class="fas fa-images" aria-hidden="true"></i> Get
                                                        Picture</button>

                                                </div>
                                                <div class="row py-1">
                                                    <button type="button" class="btn btn-info" id="clear-btn"><i
                                                            class="fas fa-eraser"></i> Clear</button>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-sm-6">
                                        <div class="py-1 row">
                                            <button id="viewpdf" class="btn btn-primary mr-1" type="button"><i
                                                    style="font-size: 21px"
                                                    class="fas fa-file-pdf"></i></button>
                                            <button id="storepdf" class="btn btn-success mr-1" type="button"><i
                                                    style="font-size: 21px" class="fas fa-save   "></i></button>
                                            <a name="" id="pdf" class="btn btn-danger mr-1"
                                                role="button"><i style="font-size: 21px"
                                                    class="fas fa-file-pdf   "></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12" style="margin-top: -30px">
                            <table class="table  table-inverse " id="itemtable">
                                <thead class="bg-info">
                                    <tr>
                                        <th>EmpCode</th>
                                        <th style="width: 250px">Employee Name</th>
                                        <th>Designation</th>
                                        <th>Pay Type</th>
                                        <th>A/c #</th>
                                    </tr>
                                </thead>
                                <tbody class="itembody">
                                    @foreach (DB::table('empreg')->where('BranchCode', $MBranchCode)->orderBy('EmpNo', 'asc')->get() as $emp)
                                        <tr id="rowdata"
                                            data-EmpNo="{{ $emp->EmpNo }}"data-AccNo="{{ $emp->AccNo }}"data-Date="{{ $emp->Date }}"
                                            data-EmpName="{{ $emp->EmpName }}"data-Gender="{{ $emp->Gender }}"data-Designation="{{ $emp->Designation }}"data-DepartmentCode="{{ $emp->DepartmentCode }}"
                                            data-Department="{{ $emp->Department }}"data-NICNo="{{ $emp->NICNo }}"data-PersonalNo="{{ $emp->PersonalNo }}"data-DOBirth="{{ $emp->DOBirth }}"data-EduQual="{{ $emp->EduQual }}"
                                            data-Subject="{{ $emp->Subject }}"data-Salary="{{ $emp->Salary }}"data-PTCLNO="{{ $emp->PTCLNO }}"data-CellNo="{{ $emp->CellNo }}"
                                            data-Emailadd="{{ $emp->Emailadd }}"data-DateOfService="{{ $emp->DateOfService }}"data-DateOfCollege="{{ $emp->DateOfCollege }}"
                                            data-MaritalStatus="{{ $emp->MaritalStatus }}"data-PostalAdd="{{ $emp->PostalAdd }}"data-Comments="{{ $emp->Comments }}"data-MachineCode="{{ $emp->MachineCode }}"
                                            data-PIC="{{ $emp->PIC }}"data-Inactive="{{ $emp->Inactive }}"data-PayTypeCode="{{ $emp->PayTypeCode }}"data-Paytype="{{ $emp->Paytype }}">
                                            <td>{{ $emp->EmpNo }}</td>
                                            <td>{{ $emp->EmpName }}</td>
                                            <td>{{ $emp->Designation }}</td>
                                            <td>{{ $emp->Department }}</td>
                                            <td>{{ $emp->AccNo }}</td>

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
    {{-- </form> --}}


@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
    <style>
        .hight {
            position: relative;
            overflow: auto;
            width: 100%;
            max-height: 200px;
            height: 200px;
        }

        .input-group-text {
            font-size: 10px;
            width: 90px;
        }

        .form-control {
            font-size: 10px;
        }

        .custom-select {
            font-size: 10px;
        }

        header {
            width: 100%;
            height: 6vh;
            display: flex;
            justify-content: center;
            align-items: center;
            /* margin-bottom: 30px; */
        }

        header h5 {
            position: absolute;
            width: 70%;
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
    </style>
@stop

@section('js')
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
    <script>
        $(document).ready(function() {
            $(document).on("click", "#browse-btn", function() {
                $('#file').trigger("click");
            });

            $('#file').on('change', function(e) {
                var fileName = e.target.files[0].name;
                $('.custom-file-label').text(fileName);

                var reader = new FileReader();
                reader.onload = function(e) {
                    // get loaded data and render thumbnail.
                    $('#preview').attr('src', e.target.result);
                };
                // read the image file as a data URL.
                reader.readAsDataURL(this.files[0]);
            });
            $('#getpic').click(function(e) {
                $('#file').trigger("click");
            });
            $('#itemtable').DataTable({
                scrollY: 585,
                deferRender: true,
                scroller: true,
                ordering: false,
                paging: false,
                info: false,
                //     dom: 'Bfrtip',
                // buttons: [
                //         'excel',  {
                //         extend: 'print',
                //         text: 'Print Or PDF',

                //                  }
                //         ]

            });
        });

        $(document).ready(function() {
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0');
            var yyyy = today.getFullYear();
            today = yyyy + '-' + mm + '-' + dd;
            $('#DateTimePicker1').val(today);

            //   $('.rowdata').dblclick(function(e){
            $(document).on("dblclick", "#rowdata", function() {

                const data = $(this).data();
                const todayi = new Date(data.date);
                const ddd = String(todayi.getDate()).padStart(2, '0');
                const mmm = String(todayi.getMonth() + 1).padStart(2, '0');
                const yyyyy = todayi.getFullYear();
                const formattedTodayi = `${yyyyy}-${mmm}-${ddd}`;
                $('#DateTimePicker1').val(formattedTodayi);
                const data2 = $(this).data();
                const todayi2 = new Date(data2.date);
                const ddd2 = String(todayi2.getDate()).padStart(2, '0');
                const mmm2 = String(todayi2.getMonth() + 1).padStart(2, '0');
                const yyyyy2 = todayi2.getFullYear();
                const formattedTodayi2 = `${yyyyy2}-${mmm2}-${ddd2}`;
                $('#DateTimePicker2').val(formattedTodayi2);

                const fields = [{
                        selector: '#TxtEmpNo',
                        dataField: 'empno'
                    },
                    {
                        selector: '#TxtName',
                        dataField: 'empname'
                    },
                    {
                        selector: '#TxtPostalAdd',
                        dataField: 'postaladd'
                    },
                    {
                        selector: '#TxtNICNo',
                        dataField: 'nicno'
                    },
                    {
                        selector: '#Departmentselect',
                        dataField: 'departmentcode'
                    },
                    {
                        selector: '#PayType',
                        dataField: 'paytypecode'
                    },
                    {
                        selector: '#TxtSalary',
                        dataField: 'salary'
                    },
                    {
                        selector: '#Currency',
                        dataField: '',
                        value: 'USD'
                    },
                    {
                        selector: '#TxtAccNo',
                        dataField: 'accno'
                    },
                    {
                        selector: '#TxtPTCLNO',
                        dataField: 'ptclno'
                    },
                    {
                        selector: '#TxtCellNo',
                        dataField: 'cellno'
                    },
                    {
                        selector: '#TxtEmailadd',
                        dataField: 'emailadd'
                    },
                    {
                        selector: '#TxtComments',
                        dataField: 'comments'
                    }
                ];

                fields.forEach(field => {
                    if (field.dataField) {
                        const value = data[field.dataField];
                        $(field.selector).val(value);
                    } else if (field.value) {
                        $(field.selector).val(field.value);
                    }
                });
            });

        });

        $(document).on("click", "#NewItem", function() {

            cleardata();
        });

        function cleardata() {
            const fields = [{
                    selector: '#TxtEmpNo',
                    dataField: 'empno'
                },
                {
                    selector: '#TxtName',
                    dataField: 'empname'
                },
                {
                    selector: '#TxtPostalAdd',
                    dataField: 'postaladd'
                },
                {
                    selector: '#TxtNICNo',
                    dataField: 'nicno'
                },
                {
                    selector: '#Departmentselect',
                    dataField: 'departmentcode'
                },
                {
                    selector: '#PayType',
                    dataField: 'paytypecode'
                },
                {
                    selector: '#DateTimePicker2',
                    dataField: 'date'
                },
                {
                    selector: '#DateTimePicker1',
                    dataField: 'date'
                },
                {
                    selector: '#TxtSalary',
                    dataField: 'salary'
                },
                {
                    selector: '#Currency',
                    dataField: '',
                    value: 'USD'
                },
                {
                    selector: '#TxtAccNo',
                    dataField: 'accno'
                },
                {
                    selector: '#TxtPTCLNO',
                    dataField: 'ptclno'
                },
                {
                    selector: '#TxtCellNo',
                    dataField: 'cellno'
                },
                {
                    selector: '#TxtEmailadd',
                    dataField: 'emailadd'
                },
                {
                    selector: '#TxtComments',
                    dataField: 'comments'
                }
            ];

            for (let i = 0; i < fields.length; i++) {
                const field = fields[i];
                $(field.selector).val('');
            }
        }

        function saveFormData() {
            const Inactive = $('#Inactive').is(":checked");

            const fields = [{
                    selector: '#TxtEmpNo',
                    dataField: 'empno'
                },
                {
                    selector: '#TxtName',
                    dataField: 'empname'
                },
                {
                    selector: '#TxtPostalAdd',
                    dataField: 'postaladd'
                },
                {
                    selector: '#TxtNICNo',
                    dataField: 'nicno'
                },
                {
                    selector: '#Departmentselect',
                    dataField: 'departmentcode'
                },
                {
                    selector: '#PayType',
                    dataField: 'paytypecode'
                },
                {
                    selector: '#DateTimePicker2',
                    dataField: 'entrydate'
                },
                {
                    selector: '#DateTimePicker1',
                    dataField: 'regdate'
                },
                {
                    selector: '#TxtSalary',
                    dataField: 'salary'
                },
                {
                    selector: '#Currency',
                    dataField: 'currency'
                },
                {
                    selector: '#TxtAccNo',
                    dataField: 'accno'
                },
                {
                    selector: '#TxtPTCLNO',
                    dataField: 'ptclno'
                },
                {
                    selector: '#TxtCellNo',
                    dataField: 'cellno'
                },
                {
                    selector: '#TxtEmailadd',
                    dataField: 'emailadd'
                },
                {
                    selector: '#TxtComments',
                    dataField: 'comments'
                }
            ];

            const formData = new FormData();

            fields.forEach(field => {
                const value = $(field.selector).val();
                if (field.value) {
                    formData.append(field.dataField, field.value);
                } else {
                    formData.append(field.dataField, value);
                }
            });
            formData.append('Inactive', Inactive);
            return formData;
        }


        $(document).on("click", "#SaveItem", function() {
            const formData = saveFormData();



            if ($('#TxtEmpNo').val() == '') {
                if (confirm("Want To Create An Employee No ?")) {

                } else {
                    alert('Canceled Because No Employee No Found');
                    return $('#TxtEmpNo').focus();

                }
            }
            if ($('#TxtName').val() == '') {
                alert('Please Type An Full Name');
                return $('#TxtName').focus();
            }

            if ($('#Departmentselect').val() == '') {
                alert('Please Select An Pay Location');
                return $('#Departmentselect').focus();
            }
            if ($('#PayType').val() == '') {
                alert('Please Select PayType');
                return $('#PayType').focus();
            }
            if ($('#TxtSalary').val == '') {
                if (confirm('Salary In Not Defined Want to Continue')) {

                } else {
                    return $('#TxtSalary').focus();
                }
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ URL::to('Employeesave') }}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                    alert(response.Message);
                    const table = document.getElementsByClassName('itembody')[0];
                    table.innerHTML = ""; // Clear the table

                    const data = response.data;
                    data.forEach((item) => {
                        const row = table.insertRow();
                        row.setAttribute("id", 'rowdata');

                        const rowAttributes = [
                            "EmpNo",
                            "AccNo",
                            "Date",
                            "EmpName",
                            "Gender",
                            "Designation",
                            "DepartmentCode",
                            "Department",
                            "NICNo",
                            "PersonalNo",
                            "DOBirth",
                            "EduQual",
                            "Subject",
                            "Salary",
                            "PTCLNO",
                            "CellNo",
                            "Emailadd",
                            "DateOfService",
                            "DateOfCollege",
                            "MaritalStatus",
                            "PostalAdd",
                            "Comments",
                            "MachineCode",
                            "PIC",
                            "Inactive",
                            "PayTypeCode",
                            "Paytype"
                        ];

                        rowAttributes.forEach((attribute) => {
                            row.setAttribute(`data-${attribute}`, item[attribute]);
                        });

                        const EmpCodeCell = row.insertCell(0);
                        EmpCodeCell.innerHTML = item.EmpNo;

                        const EmpNameCell = row.insertCell(1);
                        EmpNameCell.innerHTML = item.EmpName;

                        const DesignationCell = row.insertCell(2);
                        DesignationCell.innerHTML = item.Designation;

                        const DepartmentCell = row.insertCell(3);
                        DepartmentCell.innerHTML = item.Department;

                        const AccNoCell = row.insertCell(4);
                        AccNoCell.innerHTML = item.AccNo;
                    });
                    cleardata();
                },
                error: function(xhr, status, error) {
                    console.log(error);

                }
            });


        });



        $(document).on("click", "#Deletedata", function() {
            let empno = $('#TxtEmpNo').val();
            let empname = $('#TxtName').val();

            var password = prompt("Please enter Admin Authentication:");
            if (password === "332211") {
                if (confirm("Are you Sure want to Delete " + empno + ' : ' + empname + '?')) {

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: '{{ URL::to('Employeedelete') }}',
                        type: 'POST',
                        data: {
                            empno,
                            empname,
                        },
                        // processData: false,
                        // contentType: false,
                        success: function(response) {
                            alert(response.Message);
                            console.log(response);
                            // alert('deleted');
                            const table = document.getElementsByClassName('itembody')[0];
                            table.innerHTML = ""; // Clear the table

                            const data = response.data;
                            data.forEach((item) => {
                                const row = table.insertRow();
                                row.setAttribute("id", 'rowdata');

                                const rowAttributes = [
                                    "EmpNo",
                                    "AccNo",
                                    "Date",
                                    "EmpName",
                                    "Gender",
                                    "Designation",
                                    "DepartmentCode",
                                    "Department",
                                    "NICNo",
                                    "PersonalNo",
                                    "DOBirth",
                                    "EduQual",
                                    "Subject",
                                    "Salary",
                                    "PTCLNO",
                                    "CellNo",
                                    "Emailadd",
                                    "DateOfService",
                                    "DateOfCollege",
                                    "MaritalStatus",
                                    "PostalAdd",
                                    "Comments",
                                    "MachineCode",
                                    "PIC",
                                    "Inactive",
                                    "PayTypeCode",
                                    "Paytype"
                                ];

                                rowAttributes.forEach((attribute) => {
                                    row.setAttribute(`data-${attribute}`, item[
                                        attribute]);
                                });

                                const EmpCodeCell = row.insertCell(0);
                                EmpCodeCell.innerHTML = item.EmpNo;

                                const EmpNameCell = row.insertCell(1);
                                EmpNameCell.innerHTML = item.EmpName;

                                const DesignationCell = row.insertCell(2);
                                DesignationCell.innerHTML = item.Designation;

                                const DepartmentCell = row.insertCell(3);
                                DepartmentCell.innerHTML = item.Department;

                                const AccNoCell = row.insertCell(4);
                                AccNoCell.innerHTML = item.AccNo;
                            });
                            cleardata();

                        },
                        error: function(xhr, status, error) {
                            console.log(error);

                        }
                    });

                } else {
                    alert("Access denied.");
                    return;
                }
            } else {
                alert("Incorrect password.");
                return;

            }



            // alert('dangerdeletedata?')
        });




        //     $(document).on("keyup", "#ItemitemNameg", function() {
        //         $productname=$(this).val();
        //         console.log($productname);
        //         $.ajaxSetup({
        //   headers: {
        //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //   }
        // });
        //     $.ajax({
        //     type : 'post',
        //     url : '{{ URL::to('itemregselect') }}',
        //     data:{'productname':$productname},
        //     success:function(data){
        //     $('.itembody').html(data);
        //     // console.log(data);
        //     }
        //     });

        // })
        //     $(document).on("dblclick", "#rowcell", function() {
        //         $ItemCode=$(this).attr('data-ItemCode');
        //         $VenderCode=$(this).attr('data-VenderCode');

        //         console.log($ItemCode);
        //         $.ajaxSetup({
        //   headers: {
        //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //   }
        // });
        //     $.ajax({
        //     type : 'post',
        //     url : '{{ URL::to('populateitemreg') }}',
        //     data:{'ItemCode':$ItemCode,'VenderCode':$VenderCode},
        //     success: function($response) {
        //         $('#Itemcode').val($response.Productcode);
        //         $('.ItemitemNameg').val($response.VenderName);
        //         // $('#Dateq').val($response.Date);
        //         document.getElementById('Dateq').valueAsDate = new Date($response.Date);
        //             $('#ItemitemName').val($response.ItemName);
        //             $('#IMPACode').val($response.IMPAItemCode);
        //             // $('#Remarks').val($response.Remarks);
        //             $('#PUOM').val($response.UOM);
        //             $('#PUOM').text($response.UOM);
        //     //         $('#uoms').append($('<option selected>', {
        //     //     value: $response.UOM,
        //     //     text : $response.UOM
        //     //   }));
        //             // $('#LastUpdateDate').val(response.LastDate);
        //         // document.getElementById('LastUpdateDate').valueAsDate = new Date($response.LastDate);

        //             // $('#LastRate').val($response.LastRate);
        //             $('#Orign').val($response.OriginName);
        //             $('#Orign').text($response.OriginName);
        //             // $('#VendorPrice').val($response.VendorPrice);
        //             $('#SalePrice').val(Math.round($response.FixedPrice,2));
        //             $('#Currency').val($response.Currency);
        //             // $('#Freight').val($response.Freight);
        //             // $('#Port').val($response.PortName);
        //             // $('#Port').text($response.PortName);
        //             $('#Department').val($response.DepartmentCode);
        //             $('#Department').text($response.DepartmentCode);
        //             $('#CategoryCode').text($response.CategoryCode);
        //             $('#ReorderQty').val($response.ReorderQty);
        //             $('#ReorderLevel').val($response.ReorderLevel);
        //             // $('#ReorderQty').text($response.ReorderQty);
        //             // $('#ReorderLevel').text($response.ReorderLevel);
        //             $categor = $response.Categorybox[0].CategoryName
        //             // console.log($categor);
        //             $('#Category').val($categor);
        //             $('#Category').text($categor);
        //             // $('#vendorcode').val($response.VenderCode);
        //         // $('#email').val(response.email);
        //     }
        //     });
        //     $.ajax({
        //     type : 'post',
        //     url : '{{ URL::to('vendoritemcheck') }}',
        //     data:{'ItemCode':$ItemCode,'VenderCode':$VenderCode},
        //     success: function($response) {
        //         $('#verndores').html($response);

        //     }
        //     });

        // })
    </script>

@stop


@section('content')
