


<!--  Modal template  -->

<div class="modal fade bd-example-modal-lg" id="import"  tabindex="-1" role="dialog" aria-labelledby="searchrmod" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div  class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Import</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body gc-modal-body">
         <div class="container-fluid">
          <div class="row">
            <div class=" mx-auto">
            <h4>GLOBAL SHIP SERVICES</h4>
            </div>
          </div>
          <div class="col-sm-12 py-2">
          <textarea name="" id="" class="form-control" cols="235" rows="15"></textarea>
          </div>
          <div class="row">
          <button type="button" class="btn btn-primary" ><i class="fa fa-search" aria-hidden="true"></i> Browse</button>
          <div class="col-sm-3">
          <input type="text" class="form-control" name="search" id="">
        </div>
          <button type="button" class="btn btn-primary" ><i class="fa fa-arrow-left "></i> Clear</button>

        </div>
        <div class="row">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="my-addon">Quantity COL :</span>
                </div>
                <input class="form-control" type="text" name="" value="B" placeholder="" >
            </div>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="my-addon">Stating Row :</span>
                </div>
                <input class="form-control" type="text" name="" value="14" placeholder="" >
            </div>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="my-addon">Vendor :</span>
                </div>
                <select class="custom-select" name="" id="">
                    <option selected>Select one</option>
                    @foreach($department as $index => $obj)
                    {

                       <option value="{{$obj->VenderCode}}">{{$obj->VenderName}}</option>
                    }
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="my-addon">Product Name Col :</span>
                </div>
                <input class="form-control" type="text" name="" value="E">
            </div>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="my-addon">UOM :</span>
                </div>
                <input class="form-control" type="text" name="" value="C">
            </div>
        </div>
        <div class="row">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="my-addon">Price Col :</span>
                </div>
                <input class="form-control" type="text" name="" value="H">
            </div>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="my-addon">IMPA/ISSA Code :</span>
                </div>
                <input class="form-control" type="text" name="" value="D">
            </div>
        </div>
        <div class="row">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="my-addon">Vendor Notes :</span>
                </div>
                <input class="form-control" type="text" name="" value="G">
            </div>
           <div class="col-sm-1 text-right">
            <p>Total : 0  0 </p>
           </div>
        </div>


         </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" >Import</button>
          <button type="button" class="btn btn-success" >Import By IMPA</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-arrow-alt-circle-left "></i> Close</button>

        </div>
      </div>
    </div>
  </div>

        <!-- /.modal -->


</div>
<!-- /.container -->

<script>

                                </script>
