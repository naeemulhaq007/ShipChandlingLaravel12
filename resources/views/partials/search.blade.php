


<!--  Modal template  -->

<div class="modal fade bd-example-modal-xl" id="searchrmod"  tabindex="-1" role="dialog" aria-labelledby="searchrmod" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div  class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Search</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body gc-modal-body">
         <div class="container-fluid">
          <div class="row">

          </div>
          <div class="row py-2">
          <div class="col-sm-2">
            <label for="Search " class="modal-th2"></label></div>
          <div class="col-sm-7">
                <input type="text" class="modal-serc form-control mb-2"  id="cussearch" name="cussearch" >

               {{-- id="cussearch" --}}
            </div>
            <a name="" id="" class=" col-sm-3 btn btn-default" href="/customer-setup" target="_blank" role="button">Create Customer</a>
          </div>
            <table class="table table-bordered table-hover" id="customersearchtable">
                <thead>
                <tr>
                <th class="modal-th1">Customer&nbsp;Code</th>
                <th style="width: 400px" class="modal-th2">Customer&nbsp;Name</th>
                <th class="modal-th3">Address</th>
                <th class="modal-th4">Email&nbsp;Address</th>
                <th class="modal-th5">Status</th>
                </tr>
                </thead>
                <tbody id="customersearchtablebody" class="cuser">
                </tbody>
                </table>
         </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        </div>
      </div>
    </div>
  </div>

        <!-- /.modal -->


</div>
<!-- /.container -->

<script>
    $(document).ready(function() {



  $("button").each(function(index) {
    var logo = $(this).data("logo");
    $(this)
      .find(".button-logo")
      .attr("src", $(this).data("logo"));
  });

  $('#searchrmod').on('shown.bs.modal', function () {
  $('#cussearch').focus();
})

  $("#searchrmod").on("show.bs.modal", function(event) {
    var button = $(event.relatedTarget);
    var modal = $(this);
    // modal.find(".modal-logo").attr("src", button.data("logo"));
    modal.find(".modal-th1").text(button.data("th1"));
    modal.find(".modal-th2").text(button.data("th2"));
    modal.find(".modal-th3").text(button.data("th3"));
    modal.find(".modal-th4").text(button.data("th4"));
    modal.find(".modal-th5").text(button.data("th5"));
    modal.find(".modal-serc").attr("id", button.data("id"));
    modal.find(".modal-serc").attr("name", button.data("name"));
    $('#cussearch').focus();

  });

//   $('#searchrmod').on('shown.bs.modal', function () {
// })



  // document ready
});

</script>
<script type="text/javascript">
    $('#cussearch').on('keyup',function(){
        keywordss = $('#cussearch').val();
        if (keywordss.length >= 3) {


    $value=$(this).val();
    $.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
    $.ajax({
    type : 'post',
    url : '{{URL::to('cussearch')}}',
    data:{'cussearch':$value},
    success:function(data){
    $('.cuser').html(data);


    }
    });
}
    })
    </script>
<script type="text/javascript">
    $('#eventid').on('load',function(){
    $value=$(this).val();
    $.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
    $.ajax({
    type : 'post',
    url : '{{URL::to('follow')}}',
    data:{'follow':$value},
    success:function(data){
    $('.folow').html(data);
    }
    });
    })
    </script>



 <script type="text/javascript">

//                                     $('#vesserch').on('keyup',function(){
//                                     $value=$(this).val();
//                                     $.ajaxSetup({
// headers: {
// 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
// }
// });
//                                     $.ajax({
//                                     type : 'post',
//                                     url : '{{URL::to('vesserch')}}',
//                                     data:{'vesserch':$value},
//                                     success:function(data){
//                                       data=$vessele
//                                     }
//                                     });
//                                     })
                                </script>
