
<!-- send mail Modal   -->

<div class="modal fade bd-example-modal-sm" id="sendmail"  tabindex="-1" role="dialog" aria-labelledby="searchrmod" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " style="max-width:1000px" role="document">
      <div  class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">SendMail</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body gc-modal-body">
         <div class="col-sm-12 ">

          <div hidden class="row py-1">
          <input type="text" name="" id="" class="form-control col-sm-4 mx-auto ">
          </div>
          <div class="row py-2">
            <div class="btn-group mx-auto" data-toggle="buttons">
                <label class="btn btn-default ">
                  <input type="radio" name="options" id="radLocalEmail" autocomplete="off"> Local Email
                </label>
                <label class="btn btn-default active">
                  <input type="radio" name="options" id="radvendorEmail" autocomplete="off" checked > vendor Email
                </label>
              </div>

          </div>




        <div class="row py-2">


            <div class="input-group col-sm-12">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="">Email Address</span>
                </div>
                <input class="form-control" type="text" name="vendornemail" id="vendornemail">
            </div>

        </div>


        </div>
        </div>
        <div class="modal-footer">
          <button type="button" id="Mailsend" class="btn btn-success" ><i class="fa fa-calendar" aria-hidden="true"></i> SendMail<i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-arrow-alt-circle-left "></i> Close</button>

        </div>
      </div>
    </div>
  </div>

        <!-- /.send mail modal -->
