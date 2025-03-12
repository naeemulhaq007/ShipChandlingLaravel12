
<!-- send mail Modal   -->

<div class="modal fade bd-example-modal-xl" id="Customerlistmodal"  tabindex="-1" role="dialog" aria-labelledby="searchrmod" aria-hidden="true">
    <div class="modal-dialog  modal-xl" style="max-width:1200px" role="document">
      <div  class="modal-content">
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
                        <label for="end_Row">End Row</label>
                        <input type="text" name="end_Row" id="end_Row" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mx-1">
                        <label for="CustomerCodeColumn">Customer Code col</label>
                        <input type="text" name="CustomerCodeColumn" id="CustomerCodeColumn" class="form-control" required>
                    </div>
                    <div class="form-group mx-1">
                        <label for="CustomerNameColumn">Customer Name col</label>
                        <input type="text" name="CustomerNameColumn" id="CustomerNameColumn" class="form-control" required>
                    </div>
                    <div class="form-group mx-1">
                        <label for="CtypeColumn">Ctype col</label>
                        <input type="text" name="CtypeColumn" id="CtypeColumn" class="form-control" required>
                    </div>
                    <div class="form-group mx-1">
                        <label for="VtypeColumn">Vtype col</label>
                        <input type="text" name="VtypeColumn" id="VtypeColumn" class="form-control" required>
                    </div>
                    <div class="form-group mx-1">
                        <label for="CategoryColumn">Category col</label>
                        <input type="text" name="CategoryColumn" id="CategoryColumn" class="form-control" required>
                    </div>

                </div>



                <div class="row">
                   <div class="col-sm-12 table-responsive" style="display: none" id="customerlisttables">
                       <table id="customerlisttable"

                        class="table ">
                           <thead class="bg-info">
                               <tr>
                                   <th>Customer&nbsp;Code</th>
                                   <th>Customer&nbsp;Name</th>
                                   <th>Ctype</th>
                                   <th>Vtype</th>
                                   <th>Category</th>
                                </tr>
                            </thead>
                            <tbody id="customerlisttablebody">

                            </tbody>


                        </table>

                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <a name="Savecustomerlist" id="Savecustomerlist" style="display: none" class="btn btn-primary"  role="button">SaveALL</a>
                <button type="submit" class="btn btn-primary">Import</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </form>
      </div>
    </div>
  </div>

        <!-- /.send mail modal -->
