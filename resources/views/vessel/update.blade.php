@extends('layouts.app')



@section('title', 'Vessel Update')
<meta name="_token" content="{{ csrf_token() }}">
@section('content_header')
Vessel Setup
@stop

@section('content')
</div>
<?php echo View::make('partials.search') ?>
@if (\Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <strong>{!! \Session::get('success') !!}</strong>
  </div>

@endif
 @if ($errors->any())
 <div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
            @foreach ($errors->all() as $error)
            <strong>{{ $error }}</strong>
            @endforeach

    </div>
@endif
<form action="/vessel/store" method="POST">
    @csrf


       <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Create Vessel</h5>



                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>


                    </div>

                </div>
                <!-- /.card-header -->
                <div class="card-body">




        <div class="row py-1 ml-2">
            <div class="input-group col-sm-5">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="">Company CODE :</span>
                </div>
                <input type="text"  name="discompanycode" class="form-control"  id="discompanyname" value="{{$vesselfiller->CustomerCode}}"  placeholder="Company Name">
            <input type="hidden"  name="companycode" class="form-control"  id="companycode"  value="{{$vesselfiller->CustomerCode}}" placeholder="">
            </div>
            {{-- <div style="text-align: right" class="col-sm-2">
            <label class="" for="companyname">Company CODE : </label>
            </div>
            <div class="col-sm-3">
            <input type="text"  name="discompanycode" class="form-control"  id="discompanyname" value="{{$vesselfiller->CustomerCode}}"  placeholder="Company Name">
            <input type="hidden"  name="companyname" class="form-control"  id="companyname" value="{{$vesselfiller->CustomerCode}}" placeholder="">
            <input type="hidden"  name="companycode" class="form-control"  id="companycode"  value="{{$vesselfiller->CustomerCode}}" placeholder="">


            </div> --}}

            <div class="col-sm-1">
                <a href="<?php echo url('vessel-setup');?>"><button type="button"  class="form-control float-left"><i class="fa fa-file"></i>New</button></a>
            </div>

                {{-- <label for="vesselcode">Vessel Code : </label>
                </div>
                <div class="col-sm-3">
            <input type="text" disabled name="vessel_code" class="form-control" value="{{$vesselfiller->ID}}"  id="vessel_code"  placeholder="">
            <input type="hidden"  name="vesselcode" class="form-control" value="{{$vesselfiller->ID}}" id="vesselcode"  placeholder="">

                </div> --}}
                <div class="input-group col-sm-5">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="">Vessel Code :</span>
                    </div>
                    <input type="text" readonly name="vessel_code" class="form-control" value="{{$vesselfiller->ID}}"  id="vessel_code"  placeholder="">
            <input type="hidden"  name="vesselcode" class="form-control" value="{{$vesselfiller->ID}}" id="vesselcode"  placeholder="">
                </div>
            </div>



        <script type="text/javascript">



        $(document).on("click", ".js-click", function() {
    $targetcustcode = $(this).attr('data-custcode');
    $targetact = $(this).attr('data-act');
    $targetcuscode = $(this).attr('data-cuscode');
    $targetcusname = $(this).attr('data-cusname');

    document.getElementById("companyname").value = $targetcusname;
            document.getElementById("discompanyname").value = $targetcusname;
            document.getElementById("companycode").value = $targetcustcode;


});
        //   function clicker(clicked_id)
        //   {

        //     document.getElementById("companyname").value = clicked_id;
        //     document.getElementById("discompanyname").value = clicked_id;




        //   }
        //   function clicke(clicked_id)
        //   {
        //     // alert(clicked_id);
        //      document.getElementById("companycode").value = clicked_id;





        //   }
        </script>
                <div class="row py-1 ml-2">

            <div class="input-group col-sm-5">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="">Vessel Name :</span>
                </div>
        <input type="text" required name="vesselname" value="{{$vesselfiller->VesselName}}" class="form-control"  id="vesselname"  placeholder="">
            </div>
            <div class="col-sm-1"></div>

            <div class="input-group col-sm-5">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="">IMO # :</span>
                </div>
        <input type="text" required name="imo" class="form-control" value="{{$vesselfiller->IMONo}}" id="imo"  placeholder="">
            </div>
        </div>
        <div class="row py-1 ml-2">

            <div class="input-group col-sm-5">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="">Vessel Type :</span>
                </div>
        <input type="text" required name="vesseltype" class="form-control" value="{{$vesselfiller->VesselType}}"  id="vesseltype"  placeholder="">
            </div>
            <div class="col-sm-1"></div>

            <div class="input-group col-sm-5">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="">Email :</span>
                </div>
            <input type="email" required name="email" value="{{$vesselfiller->Email}}"  class="form-control"  id="email"  placeholder="">
                </div>
        </div>
        <div class="row py-1 ml-2">

            <div class="input-group col-sm-5">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="">Call Sign :</span>
                </div>
        <input type="text" required name="callsign" value="{{$vesselfiller->VCallSign}}"  class="form-control"  id="callsign"  placeholder="">
            </div>


        </div>
        <div class="row py-1 ml-2">

            <div class="input-group col-sm-5">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="">Phone number :</span>
                </div>
        <input type="text" required name="phonenumber" value="{{$vesselfiller->PhoneNo}}" class="form-control"  id="phonenumber"  placeholder="">
            </div>
        </div>
        <div class="row py-1 ml-2">

            <div class="input-group col-sm-5">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="">Vessel Notes :</span>
                </div>
                <textarea class="form-control" name="VNotes" id="VNotes" rows="3">{{$vesselfiller->VNotes}}</textarea>

            </div>
        </div>
        {{-- <div class="row" style="margin-bottom: 1%">
            <div style="text-align: right" class="col-sm-2">
            <label class="" for="commission">Commission %: </label>
            </div>
            <div class="col-sm-2">
        <input type="text" required name="commission" class="form-control"  id="commission"  placeholder="">
            </div>

            <div class="form-group row">

                <div class="col-sm-5">
                    <select class="custom-select" name="AreaofBusiness" id="">

                        <option selected>Select one</option>
                        @foreach ($sales as $item)
                        <option value="{{$item->SManName}}">{{$item->SManName}}</option>
                       @endforeach

                    </select>
                </div>
            </div>

        </div>
        <div class="row" style="margin-bottom: 1%">
            <div style="text-align: right" class="col-sm-2">
            <label class="" for="salesmannote">Sales Man Notes: </label>
            </div>
            <div class="col-sm-5">
                <textarea class="form-control" name="salesmannote" id="salesmannote" rows="3"></textarea>

            </div>
        </div> --}}


        <button type="submit" class="btn btn-primary float-right"><i class="fa fa-file-archive" aria-hidden="true"></i>Save</button>


        </div>





        </div>
    </div>

        </form>



    <div style="padding: 20px" id="no-more-tables">

        {!! $output !!}
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="../css/admin_custom.css"> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @foreach ($css_files as $css_file)
        <link rel="stylesheet" href="{{ $css_file }}">
    @endforeach
    <style>
        .gc-caption-title-container{
            display:none;
        }
        @media only screen and (max-width: 800px) {
            /* Force table to not be like tables anymore */
            #no-more-tables table,
            #no-more-tables thead,
            #no-more-tables tbody,
            #no-more-tables th,
            #no-more-tables td,
            #no-more-tables tr {
                display: block;
            }

            /* Hide table headers (but not display: none;, for accessibility) */
            #no-more-tables thead tr {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }

            #no-more-tables tr { border: 1px solid #ccc; }

            #no-more-tables td {
                /* Behave like a "row" */
                border: none;
                border-bottom: 1px solid #eee;
                position: relative;
                padding-left: 50%;
                white-space: normal;
                text-align:left;
            }

            #no-more-tables td:before {
                /* Now like a table header */
                position: absolute;
                /* Top/left values mimic padding */
                top: 6px;
                left: 6px;
                width: 45%;
                padding-right: 10px;
                white-space: nowrap;
                text-align:left;
                font-weight: bold;
            }

            /*
            Label the data
            */
            #no-more-tables td:before { content: attr(data-title); }
        }
        .gc-container .table{
font-size: 11px;

        }
        .gc-container .btn{
font-size: 11px;

        }
        .gc-footer-tools{
font-size: 11px;

        }
        .card-body span{
width: 95px;
font-size: 11px;

}
.form-control{
    font-size: 11px;

}
    </style>
@stop

@section('js')
    @foreach ($js_files as $js_file)
        <script src="{{ $js_file }}"></script>
    @endforeach
    <script>
        if (typeof $ !== 'undefined') {
            $(document).ready(function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            });
        }

        window.addEventListener('gcrud.datagrid.ready', () => {
            var heading_array=[];
            var c=0;
            $(".grocery-crud-table thead th:gt(0)").each(function(){
                title=$(this).html();
                title=title.replace("<div>",'');
                title=title.replace("</div>",'');
                //heading_array.push(title);
                console.log(title);
                $(".gc-datagrid-row").each(function() {
                    $(this).find(".gc-data-container:eq(" + c + ")").attr("data-title", title);
                });
            c++;})

        });

    </script>
@stop


@section('content')
