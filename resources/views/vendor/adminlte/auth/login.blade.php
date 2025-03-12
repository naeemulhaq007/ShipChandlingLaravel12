@extends('adminlte::auth.auth-page', ['auth_type' => 'login'])

@section('adminlte_css_pre')
    <link rel="stylesheet" href="{{ asset('vendor/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@stop
@php
    use App\Helpers\Ship;
$login_url = View::getSection('login_url') ?? config('adminlte.login_url', 'login') ;
$register_url = View::getSection('register_url') ?? config('adminlte.register_url', 'register') ;
$password_reset_url = View::getSection('password_reset_url') ?? config('adminlte.password_reset_url', 'password/reset') ;

@endphp
@if (config('adminlte.use_route_url', false))
    @php( $login_url = $login_url ? route($login_url) : '' )
    @php( $register_url = $register_url ? route($register_url) : '' )
    @php( $password_reset_url = $password_reset_url ? route($password_reset_url) : '' )
@else
    @php( $login_url = $login_url ? url($login_url) : '' )
    @php( $register_url = $register_url ? url($register_url) : '' )
    @php( $password_reset_url = $password_reset_url ? url($password_reset_url) : '' )
@endif

@section('auth_header', __('adminlte::adminlte.login_message'))

@section('auth_body')
<script>
    $(document).ready(function () {

        // $('#Branchmodal').modal('show');
        // $('#Branchmodal').on('hidden.bs.modal', function (e) {
        //     var USA = 210;
        //     var Manila = 112;
        //     var Branchcode = $('#SecretCode').val();
        //     if (Branchcode == USA) {
        //         $('#Branch').val(8);
        //         $('#Branch').text("USA");
        //         $('#Branchmodal').modal('hide');

        //     }else if(Branchcode == Manila){
        //         $('#Branch').val(9);
        //         $('#Branch').text("Manila");
        //         $('#Branchmodal').modal('hide');

        //     }else{
        //         alert('Invalid Code');
        //         $('#Branchmodal').modal('show');

        //         // location.reload();
        //     }
        // });
        // $('#Branchmodal').on('shown.bs.modal', function (e) {
        //     $('#SecretCode').focus();
        // })
        // $('#SecretCode').keydown(function (event) {
        //     if (event.which == 13) {
        //         $('#btnSecretCode').click();
        //     }
        // });
        // // var Branchcode = prompt("Enter Secratecode");
        // $('#btnSecretCode').click(function (e) {
        //     e.preventDefault();

        //     var USA = 210;
        //     var Manila = 112;
        //     var Branchcode = $('#SecretCode').val();
        //     if (Branchcode == USA) {
        //         $('#Branch').val(8);
        //         $('#Branch').text("USA");
        //         $('#Branchmodal').modal('hide');

        //     }else if(Branchcode == Manila){
        //         $('#Branch').val(9);
        //         $('#Branch').text("Manila");
        //         $('#Branchmodal').modal('hide');

        //     }else{
        //         alert('Invalid Code');
        //         // $('#Branchmodal').modal('show');

        //         location.reload();
        //     }
        // });




    });
</script>
    <form action="{{ $login_url }}" method="post">
        @csrf
        <b>Branch:</b>
            <div class="input-group mb-3">
                {!! Ship::Branches() !!}
            </div>


        {{-- UserName field --}}
        <b>User Name:</b>
        <div class="input-group mb-3">

            <input type="text" name="UserName" class="form-control @error('UserName') is-invalid @enderror"
                   value="{{ old('email') }}" placeholder="" autofocus>

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>

            @error('UserName')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Password field --}}
        <b>Password:</b>
        <div class="input-group mb-3">

            <input type="password" name="Password" class="form-control @error('Password') is-invalid @enderror"
                   placeholder="">

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>

            @error('Password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Login field --}}
        <div class="row">
            <div class="col-7">
                <div class="icheck-primary" title="{{ __('adminlte::adminlte.remember_me_hint') }}">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label for="remember">
                        {{ __('adminlte::adminlte.remember_me') }}
                    </label>
                </div>
            </div>

            <div class="col-5">
                <button type=submit class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
                    <span class="fas fa-sign-in-alt"></span>
                    {{ __('adminlte::adminlte.sign_in') }}
                </button>
            </div>
        </div>

    </form>


    <div id="Branchmodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="my-modal-title">Enter Your SecretCode</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="input-group col-sm-6">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="">Secret Code</span>
                            </div>
                            <input class="form-control" type="number" id="SecretCode" name="">
                        </div>
                        <a name="" id="btnSecretCode" class="btn btn-primary ml-auto"  role="button">Submit</a>
                    </div>
                </div>

            </div>
        </div>
    </div>

@stop

@section('auth_footer')
{{--    --}}{{-- Password reset link --}}
   @if($password_reset_url)
       <p class="my-0">
           <a href="{{ $password_reset_url }}">
               {{ __('adminlte::adminlte.i_forgot_my_password') }}
           </a>
       </p>
   @endif

{{--    --}}{{-- Register link --}}
   @if($register_url)
       <p class="my-0">
           <a href="{{ $register_url }}">
               {{ __('adminlte::adminlte.register_a_new_membership') }}
           </a>
       </p>
   @endif
@stop
