@extends('layouts.app')
@section('content')


    
<div style="margin-bottom: 2%" class="btn-toolbar float-right" role="toolbar" aria-label="">
    <div class="btn-group" role="group" aria-label="">
        <a href="/agent-setup"> <button type="button" class="btn btn-primary"><i class="fa fa-file" aria-hidden="true"></i> New Record</button></a>
        
        <button type="submit" class="btn btn-primary"><i class="fa fa-file-archive" aria-hidden="true"></i>Save</button>
        <button type="button" class="btn btn-primary"><i class="fa fa-recycle" aria-hidden="true"></i>Delete</button>
        <a href="/home"><button type="button" class="btn btn-primary"><i class="fa fa-door-open" aria-hidden="true"></i>Exit</button></a>
    </div>
   
</div>
<div style="clear: both">



    

@endsection