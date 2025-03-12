@extends('layouts.app')



@section('title', 'User-Rights')

@section('content_header')

@stop

@section('content')

<div class="card">
    <div class="card-header">
        <h5 class="text-center text-blue">ChatRoom</h5>
    </div>
    <div class="card-body">
        <div class="col-lg-12">

            <script src="https://minnit.chat/js/embed.js" defer></script><minnit-chat data-chatname="https://organizations.minnit.chat/914391333111366/Main?embed&nickname=" data-style="width:90%;height:500px;"></minnit-chat>

        </div>

    </div>
</div>
@stop

@section('css')


@stop

@section('js')

        <!--Start of Tawk.to Script-->
        {{-- <script type="text/javascript">
            var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
            (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/652e6fd1a84dd54dc4820f2b/1hcum9jh8';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
            })();
            </script> --}}
            <!--End of Tawk.to Script-->


@stop


@section('content')
