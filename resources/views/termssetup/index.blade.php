@extends('layouts.app')
@section('content')

<form action="/termssetup" method="POST">
    @csrf
    
    
<div style="margin-bottom: 2%" class="btn-toolbar float-right" role="toolbar" aria-label="">
    <div class="btn-group" role="group" aria-label="">
        <a href="/Terms-setup"> <button type="button" class="btn btn-primary"><i class="fa fa-file" aria-hidden="true"></i> New Record</button></a>
        
        <button type="submit" class="btn btn-primary"><i class="fa fa-file-archive" aria-hidden="true"></i>Save</button>
        <button type="button" class="btn btn-primary"><i class="fa fa-recycle" aria-hidden="true"></i>Delete</button>
        <a href="/home"><button type="button" class="btn btn-primary"><i class="fa fa-door-open" aria-hidden="true"></i>Exit</button></a>
    </div>
   
</div>
<div style="clear: both">



    


   
      
 
         
            <div class="col-md-12">
              <div class="card">
                  <div class="card-header">
                      <h5 class="card-title">Terms Setup</h5>
      
      
                      <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="collapse">
                              <i class="fas fa-minus"></i>
                          </button>
                    
                      
                      </div>
      
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                      <div class="row">
                          <div style="margin-left: 25%" class="col-md-12">
                              
              <table class="table table-striped table-inverse table-bordered data-table table-responsive">
                  <thead class="thead-inverse">
                      <tr>
                          <th>Terms Code</th>
                          <th>Terms Name</th>
                          <th width="100px">Action</th>
                          {{-- <th>Code</th>
                          <th>ExchangeRate</th> --}}
                          
  
                          
                      </tr>
                      </thead>
                      <tbody>
                          @foreach ($data as $item)
                          <tr>
                              <td ><a href="/Terms-setup/update/{{$item->TermsCode}}">"{{$item->TermsCode}}"</a></td>
                              <td >"{{$item->Terms}}"</td>
                              {{-- <td>{{$item->CustomerCode}}</td> 
                              
                              <td>{{$item->exchangeRate}}</td>  --}}
                              
                              
                              
                           </tr> 
                           @endforeach 
                          
                      </tbody>
              </table>
      </div>
      </div>
      {{-- <script type="text/javascript">
        $(function () {
          
          var table = $('.data-table').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ route('terms-setup.index') }}",
              columns: [
                  {data: 'TermsCode', name: 'TermsCode'},
                  {data: 'Terms', name: 'Terms'},
                  {data: 'Days', name: 'Days'},
                  {data: 'action', name: 'action', orderable: false, searchable: false},
              ]
          });
          
        });
      </script> --}}
      <div class="row" style="margin-bottom: 1%">
        <div style="text-align: right" class="col-sm-2">
        <label class="" for="TermsCode">code : </label>
        </div>
        <div class="col-sm-5">
    <input type="text" name="TermsCode" class="form-control" value="" id="TermsCode"  placeholder="">
        </div>
    </div>
    <div class="row" style="margin-bottom: 1%">
        <div style="text-align: right" class="col-sm-2">
        <label class="" for="Terms">Terms: </label>
        </div>
        <div class="col-sm-5">
    <input type="text" required name="Terms" class="form-control"  id="Terms"  placeholder="">
        </div>
    </div>
    <div class="row" style="margin-bottom: 1%">
        <div style="text-align: right" class="col-sm-2">
        <label class="" for="Days">Days : </label>
        </div>
        <div class="col-sm-5">
    <input type="number" name="Days" class="form-control"  id="Days" value="{{$item->Days}}"  placeholder="">
        </div>
    </div>
      </div>
      
      </div>
      </div>
          </div>




      
        
        </form>
       
        
        
      
      </div>




   



@endsection