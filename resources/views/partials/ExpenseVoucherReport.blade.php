
<div class="modal fade" id="ExpenseVoucherReport" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label=""><span>×</span></button>
             </div>

            <div class="modal-body">

<div class="col-lg-12">
    <div class="row py-2 col-lg-7 mx-auto">
        <h1 class="text-info">Expense Voucher Report</h1>
    </div>
    <div class="row py-1 col-sm-6 mx-auto">
        <div class="input-group col-sm-6">
            <div class="input-group-prepend">
                <span class="input-group-text" id="">From</span>
            </div>
            <input class="form-control" type="date" name="TxtDateFrom" id="TxtDateFrom">
        </div>
        <div class="input-group col-sm-6">
            <div class="input-group-prepend">
                <span class="input-group-text" id="">To</span>
            </div>
            <input class="form-control" type="date" name="TxtDateTo" id="TxtDateTo">
        </div>
    </div>
    <div class="row py-1">
        <div class="col-sm-10 mx-auto">
            <div class="row py-1">
                <div class="input-group col-sm-11">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="">Account Code:</span>
                    </div>
                    <input class="form-control mr-1 col-sm-2" type="text" name="TxtAccountCode" id="TxtAccountCode">
                    <input class="form-control mx-1 col-sm-7" type="text" name="TxtAccountTitle" id="TxtAccountTitle">
                    <a name="" id="" class="btn btn-default col-sm-1"  role="button"><i class="fa fa-search" aria-hidden="true"></i></a>
                    <div class="form-check form-check-inline">

                        <label class="form-check-label ">
                            <input class="form-check-input " type="checkbox"  name="ChkDes" id="ChkDes" value=""> ALL
                        </label>
                    </div>
                </div>
            </div>
            <div class="row py-1">
                <div class="input-group col-sm-11">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="">Party Account Code :</span>
                    </div>
                    <input class="form-control mr-1 col-sm-2" type="text" name="TxtPartyAccountCode" id="TxtPartyAccountCode">
                    <input class="form-control mx-1 col-sm-7" type="text" name="TxtPartyAccountTitle" id="TxtPartyAccountTitle">
                    <a name="" id="" class="btn btn-default col-sm-1"  role="button"><i class="fa fa-search" aria-hidden="true"></i></a>
                    <div class="form-check form-check-inline">

                        <label class="form-check-label ">
                            <input class="form-check-input " type="checkbox"  name="ChkDes" id="ChkDes" value=""> ALL
                        </label>
                    </div>
                </div>
            </div>
            <div class="row py-1">
                <div class="input-group col-sm-7">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="">Cheque No :</span>
                    </div>
                    <input type="text" id="TxtChequeNo" class="form-control " name="TxtChequeNo" >

                </div>
                <div class="form-check form-check-inline">

                    <label class="form-check-label ">
                        <input class="form-check-input " type="checkbox"  name="ChkLocation" id="ChkLocation" value=""> ALL
                    </label>
                </div>

            </div>


            <div class="row py-1 mx-auto">
                <a name="" id="" class="btn btn-primary mx-2" href="#" role="button"><i class="fas fa-solid fa-save"></i> Generate</a>
                <a name="" id="" data-dismiss="modal" class="btn btn-primary mx-2" href="#" role="button"><i class="fas fa-door-open"></i> Exit</a>
            </div>
        </div>
    </div>
</div>

            </div>

        </div>
    </div>
</div>




<style>




</style>
