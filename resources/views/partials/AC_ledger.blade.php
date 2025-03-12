
<div class="modal fade" id="AC_ledger" role="dialog">
    <div class="modal-dialog modal-lg"  style="max-width:600px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label=""><span>×</span></button>
             </div>

            <div class="modal-body">

<div class="col-lg-12">
    <div class="row py-2 col-lg-3 mx-auto">
        <h1 class="text-info">Account Ledger</h1>
    </div>
    <div class="row py-1 col-sm-6 mx-auto">
        <div class="input-group col-sm-6">
            <div class="input-group-prepend">
                <span class="input-group-text" id="">From</span>
            </div>
            <input class="form-control" type="date" name="">
        </div>
        <div class="input-group col-sm-6">
            <div class="input-group-prepend">
                <span class="input-group-text" id="">To</span>
            </div>
            <input class="form-control" type="date" name="">
        </div>
    </div>
    <div class="row py-1">
        <div class="col-sm-10 mx-auto">
            <div class="row py-1">
                <div class="input-group col-sm-11">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="">Account :</span>
                    </div>
                    <input class="form-control mr-1 col-sm-2" type="text" name="">
                    <input class="form-control mx-1 col-sm-7" type="text" name="">
                    <a name="" id="" class="btn btn-default col-sm-1"  role="button"><i class="fa fa-search" aria-hidden="true"></i></a>
                </div>
            </div>
            <div class="row py-1">
                <div class="input-group col-sm-10">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="">Des :</span>
                    </div>
                    <input class="form-control mr-1" type="text" name="">
                </div>
                <div class="form-check form-check-inline">

                    <label class="form-check-label ">
                        <input class="form-check-input " type="checkbox"  name="ChkDes" id="ChkDes" value=""> ALL
                    </label>
                </div>
            </div>
            <div class="row py-1">
                <div class="input-group col-sm-5">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="">Location :</span>
                    </div>
                    <input type="text" id="Location" class="form-control " name="Location" list="Location">
                    <datalist id="Location">
                        <option value="HOUSTON">
                                <option value="NEW ORLEANS">
                                    <option value="LOS ANGELES">
                                        <option value="NEW JERSEY">
                                            <option value="NEW YORK">
                    </datalist>
                </div>
                <div class="form-check form-check-inline">

                    <label class="form-check-label ">
                        <input class="form-check-input " type="checkbox"  name="ChkLocation" id="ChkLocation" value=""> ALL
                    </label>
                </div>

            </div>
            <div class="row py-1">
                <div class="input-group col-sm-4">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="">Terms :</span>
                    </div>
                    <input type="text" id="Terms" class="form-control " name="Terms" list="Terms">
                    <datalist id="Terms">
                        <option value="CASH">
                            <option value="N 15 Days">
                                <option value="N 30 Days">
                                    <option value="N 45 Days">
                                        <option value="N 60 Days">
                                            <option value="N 90 Days">
                                                <option value="CREDIT CARD">
                                            </datalist>
                </div>
                <div class="form-check form-check-inline">

                    <label class="form-check-label ">
                        <input class="form-check-input " type="checkbox"  name="ChkTerms" id="ChkTerms" value=""> ALL
                    </label>
                </div>
            </div>
            <div class="row py-1">
                <div class="input-group col-sm-4">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="">Type :</span>
                    </div>
                    <input type="text" id="Terms" class="form-control " name="Type" list="Type">
                    <datalist id="Type">
                        {{-- <option value="CASH">
                            <option value="N 15 Days">
                                <option value="N 30 Days">
                                    <option value="N 45 Days">
                                        <option value="N 60 Days">
                                            <option value="N 90 Days">
                                                <option value="CREDIT CARD"> --}}
                                            </datalist>
                </div>
                <div class="form-check form-check-inline">

                    <label class="form-check-label mr-5">
                        <input class="form-check-input " type="checkbox"  name="ChkType" id="ChkType" value=""> ALL
                    </label>
                    <label class="form-check-label ml-5">
                        <input class="form-check-input " type="checkbox"  name="ChkCompanyHeading" id="ChkCompanyHeading" value=""> Company Heading
                    </label>

                </div>
            </div>
            <div class="row py-1">
                <a name="" id="" class="btn btn-primary mx-1" href="#" role="button"><i class="fas fa-solid fa-save"></i> Generate</a>
                <a name="" id="" data-dismiss="modal" class="btn btn-primary mx-1" href="#" role="button"><i class="fas fa-door-open"></i> Exit</a>
                <a name="" id="" class="btn btn-primary mx-1" href="#" role="button"><i class="fas fa-solid fa-save"></i> Aging Ledger</a>
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
