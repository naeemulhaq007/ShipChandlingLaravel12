@extends('layouts.app')
@section('content')

<form action="/agent-setup" method="POST">
    @csrf
    @method('PUT')
    
<div style="margin-bottom: 2%" class="btn-toolbar float-right" role="toolbar" aria-label="">
    <div class="btn-group" role="group" aria-label="">
        <a href="/agent-setup"><button type="button" class="btn btn-primary"><i class="fa fa-file" aria-hidden="true"></i> New Record</button></a>
        
        <a href="submit"> <button type="submit" class="btn btn-primary"><i class="fa fa-file-archive" aria-hidden="true"></i>Save</button></a>
        <button type="button" class="btn btn-primary"><i class="fa fa-recycle" aria-hidden="true"></i>Delete</button>
        <a href="/home"><button type="button" class="btn btn-primary"><i class="fa fa-door-open" aria-hidden="true"></i>Exit</button></a>
    </div>
   
</div>
<div style="clear: both">



    

      
        


          <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Create Agent Commission</h5>
        
        
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                  
                    
                    </div>
        
                </div>
                <!-- /.card-header -->
                <div style="text-align: right" class="card-body">
                    <div class="row">
                        
       
            
            
                
                    <div style="text-align: right" class="col-sm-2">
                <label for="agent_id">Agent ID : </label>
                    </div>
                <div class="col-sm-1">
          <input type="text"   class="form-control"disabled name="ID" 
          value="{{$data->ID}}"
           id="agentid"  placeholder="Empty">
                </div>  
                {{-- <button type="submit" id="customersearch"><i class="fa fa-search"></i></button> --}}
            
            
        
            
        
            
        </div>
        
            
        
           
        
        </div>
        
        <div class="row">
            <div style="text-align: right" class="col-sm-2">
            <label for="agentname">Name Of Agent : </label>
            </div>
            <div class="col-sm-5">
        <input style="margin-bottom: 2%" type="text" value="{{$data ->CustomerName}}"   name="CustomerName" class="form-control"  id     ="agentname"  placeholder="Empty">
            </div>
        </div>
        
   
        
        
        <div class="row" style="margin-bottom: 1%">
            <div style="text-align: right" class="col-sm-2">
            <label for="agentcode">Code : </label>
            </div>
            <div class="col-sm-3">
        <input type="text"   name="agentcode" value="{{$data->CustomerCode}}" class="form-control"  id="CustomerCode"  placeholder="Empty">
            </div>
              <div style="text-align: right" class="col-sm-2">
                <label for="exchangeRate">Exchange Rate : </label>
                </div>
            <div class="col-sm-3">
        <input type="text"   name="exchangerate" class="form-control"  id="exchangeRate"  placeholder="Empty">
            </div> 
        </div>
        <hr>
        <h2>General Information</h2>
        <div class="row" style="margin-bottom: 1%">
            <div style="text-align: right" class="col-sm-2">
            <label class="" for="address">Address : </label>
            </div>
            <div class="col-sm-5">
        <input type="text" name="address" value="{{$data->Address}}"  class="form-control"  id="Address"  placeholder="Empty">
            </div>
        </div>
        <div class="row" style="margin-bottom: 1%">
            <div style="text-align: right" class="col-sm-2">
            <label class="" for="telephone">Telephone : </label>
            </div>
            <div class="col-sm-5">
        <input type="text" name="PhoneNo"  value="{{$data->PhoneNo}}" class="form-control"  id="telephone"  placeholder="Empty">
            </div>
        </div>
        
        <div class="row" style="margin-bottom: 1%">
            <div style="text-align: right" class="col-sm-2">
            <label class="" for="fax">Fax # : </label>
            </div>
            <div class="col-sm-3">
        <input type="text"   name="FaxNo" value="{{$data->FaxNo}}" class="form-control"  id="fax"  placeholder="Empty">
            </div>
        
            <div style="text-align: right" class="col-sm-2">
                <label for="email">Email : </label>
                </div>
                <div class="col-sm-3">
            <input type="email" name="EmailAddress" class="form-control" value="{{$data->EmailAddress}}" id="email"  placeholder="Empty">
                </div>
        </div>
        <div class="row" style="margin-bottom: 1%">
            <div style="text-align: right" class="col-sm-2">
            <label class="" for="web">Web  : </label>
            </div>
            <div class="col-sm-3">
        <input type="text"   name="WebAddress" class="form-control" value="{{$data->WebAddress}}" id="web"  placeholder="Empty">
            </div>
        
            <div style="text-align: right" class="col-sm-2">
                <label for="country">Country : </label>
                </div>
                <div class="col-sm-3">
            <input type="text"   name="Country" class="form-control" value="{{$data->Country}}" id="country"  placeholder="Empty">
                </div>
        </div>
        <div class="row" style="margin-bottom: 1%">
            <div style="text-align: right" class="col-sm-2">
            <label class="" for="city">City : </label>
            </div>
            <div class="col-sm-3">
        <input type="text"   name="City" class="form-control" value="{{$data->City}}"  id="city"  placeholder="Empty">
            </div>
        
            <div style="text-align: right" class="col-sm-2">
                <label for="state">State : </label>
                </div>
                <div class="col-sm-3">
            <input type="text"   name="State" class="form-control" value="{{$data->State}}"  id="state"  placeholder="Empty">
                </div>
        </div>
        <div class="row" style="margin-bottom: 1%">
            <div style="text-align: right" class="col-sm-2">
            <label class="" for="zip">Zip : </label>
            </div>
            <div class="col-sm-3">
        <input type="text"   name="Zip" class="form-control" value="{{$data->Zip}}" id="zip"  placeholder="Empty">
            </div>
        </div>
        
           
        <hr>
        <h2>Billing Information</h2>
        <div class="row" style="margin-bottom: 1%">
            <div style="text-align: right" class="col-sm-2">
            <label class="" for="contactperson">Contact Person : </label>
            </div>
            <div class="col-sm-5">
        <input type="text" name="BContactPerson" class="form-control" value="{{$data->BContactPerson}}" id="contactperson"  placeholder="Empty">
            </div>
        </div>
        <div class="row" style="margin-bottom: 1%">
            <div style="text-align: right" class="col-sm-2">
            <label class="" for="billingaddress">Billing Address : </label>
            </div>
            <div class="col-sm-5">
        <input type="text"   name="BillingAddress" class="form-control" value="{{$data->BillingAddress}}"  id="billingaddress"  placeholder="Empty">
            </div>
        </div>
        <div class="row" style="margin-bottom: 1%">
            <div style="text-align: right" class="col-sm-2">
            <label class="" for="bilingtelephone">Telephone : </label>
            </div>
            <div class="col-sm-5">
        <input type="text" name="BTelephoneNo" class="form-control" value="{{$data->BTelephoneNo}}" id="bilingtelephone"  placeholder="Empty">
            </div>
        </div>
        
        <div class="row" style="margin-bottom: 1%">
            <div style="text-align: right" class="col-sm-2">
            <label class="" for="bilingfax">Fax # : </label>
            </div>
            <div class="col-sm-3">
        <input type="text"   name="BFaxNo" class="form-control" value="{{$data->BFaxNo}}"  id="bilingfax"  placeholder="Empty">
            </div>
        
            <div style="text-align: right" class="col-sm-2">
                <label for="bilingemail">Email : </label>
                </div>
                <div class="col-sm-3">
            <input type="email" name="BEmailAddress" class="form-control" value="{{$data->BEmailAddress}}"  id="bilingemail"  placeholder="Empty">
                </div>
        </div>
        <div class="row" style="margin-bottom: 1%">
            <div style="text-align: right" class="col-sm-2">
            <label class="" for="web">Web  : </label>
            </div>
            <div class="col-sm-3">
        <input type="text"   name="BWeb" class="form-control" value="{{$data->BWeb}}" id="bilingweb"  placeholder="Empty">
            </div>
        
            <div style="text-align: right" class="col-sm-2">
                <label for="bilingstatus">Status : </label>
                </div>
                <div class="col-sm-3">
            <input type="text"    name="Status" class="form-control" value="{{$data->Status}}"  id="bilingstatus"  placeholder="Empty">
                </div>
        </div>
        <div class="row" style="margin-bottom: 1%">
            <div style="text-align: right" class="col-sm-2">
            <label class="" for="creaditlimit">Creadit Limit : </label>
            </div>
            <div class="col-sm-3">
        <input type="text"    name="CreditLimit" class="form-control"  value="{{$data->CreditLimit}}" id="creaditlimit"  placeholder="Empty">
            </div>
        
            <div style="text-align: right" class="col-sm-2">
                <label for="terms">Terms : </label>
                </div>
                <div class="col-sm-3">
            <input type="text"    name="Terms" class="form-control"  value="{{$data->Terms}}" id="terms"  placeholder="Empty">
                </div>
        </div>
        <div class="row" style="margin-bottom: 1%">
            <div style="text-align: right" class="col-sm-2">
            <label class="" for="eqcic">Event Quate Chargers Internal Comment : </label>
            </div>
            <div class="col-sm-5">

               
                  <textarea class="form-control" name="EventQuateCharges" id="eqcic" rows="3">{{$data->EventQuateCharges}}</textarea>
                
    
            </div>
        </div>
        
        
        
        </div>
        
        
        
        
        
        </div>
        
        
        </form>
        <script>
            
            </script>
        
        
        
      
      </div>




   

        <!-- /.card-header -->
        
            </div>



   
</div>


</div>
</div>


@endsection