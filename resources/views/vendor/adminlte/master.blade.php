<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    {{-- Base Meta Tags --}}
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1"> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Custom Meta Tags --}}
    @yield('meta_tags')

    {{-- Title --}}
    <title>
        @yield('title_prefix', config('adminlte.title_prefix', ''))
        @yield('title', config('adminlte.title', 'AdminLTE 3'))
        @yield('title_postfix', config('adminlte.title_postfix', ''))
    </title>

    {{-- Custom stylesheets (pre AdminLTE) --}}
    @yield('adminlte_css_pre')
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
    {{-- Base Stylesheets --}}
    @if(!config('adminlte.enabled_laravel_mix'))
        {{-- <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}"> --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        {{-- <link rel="stylesheet" href="{{ asset('vendor/overlayScrollbars/css/OverlayScrollbars.min.css') }}"> --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/2.1.0/styles/overlayscrollbars.min.css" integrity="sha512-SWInhnSfP5LyduITbBbAzzj0LCCw6CBqQIfLMACCnuihNPoTLoOGvT+YVmHsV6ub1VWKrQ2wPhZFmR+c5GZUMw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        {{-- Configured Stylesheets --}}
        @include('adminlte::plugins', ['type' => 'css'])

        {{-- <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}"> --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/css/adminlte.min.css" integrity="sha512-IuO+tczf4J43RzbCMEFggCWW5JuX78IrCJRFFBoQEXNvGI6gkUw4OjuwMidiS4Lm9Q2lILzpJwZuMWuSEeT9UQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    @else
        <link rel="stylesheet" href="{{ mix(config('adminlte.laravel_mix_css_path', 'css/app.css')) }}">
    @endif

    {{-- Livewire Styles --}}
    @if(config('adminlte.livewire'))
        @if(app()->version() >= 7)
            @livewireStyles
        @else
            <livewire:styles />
        @endif
    @endif

    {{-- Custom Stylesheets (post AdminLTE) --}}
    @yield('adminlte_css')

    {{-- Favicon --}}
    @if(config('adminlte.use_ico_only'))
        <link rel="shortcut icon" href="{{ asset('assets/favicons/favicon.ico') }}" />
    @elseif(config('adminlte.use_full_favicon'))
        <link rel="shortcut icon" href="{{ asset('assets/favicons/favicon.ico') }}" />
        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('assets/favicons/apple-icon-57x57.png') }}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('assets/favicons/apple-icon-60x60.png') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/favicons/apple-icon-72x72.png') }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/favicons/apple-icon-76x76.png') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/favicons/apple-icon-114x114.png') }}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/favicons/apple-icon-120x120.png') }}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('assets/favicons/apple-icon-144x144.png') }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets/favicons/apple-icon-152x152.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/favicons/apple-icon-180x180.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/favicons/favicon-16x16.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/favicons/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/favicons/favicon-96x96.png') }}">
        <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('assets/favicons/android-icon-192x192.png') }}">
        {{-- <link rel="manifest" crossorigin="use-credentials" href="{{ asset('favicons/manifest.json') }}"> --}}
        <meta name="msapplication-TileColor" content="#ffffff">
        {{-- <meta name="msapplication-TileImage" content="{{ asset('favicon/ms-icon-144x144.png') }}"> --}}
    @endif


    {{-- Base Scripts --}}
    @if(!config('adminlte.enabled_laravel_mix'))
        {{-- <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script> --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        {{-- <script src="{{ asset('vendor/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script> --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/2.1.0/browser/overlayscrollbars.browser.es6.min.js" integrity="sha512-1ZEhZBqxxLcq+dqd/djJm4jmpuT2qvHvsLGHkvKbCwde7AN6uz+WSIQpEOmDirXOrbeUIy0hbgajST3wtykKNw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        {{-- <script src="{{ asset('vendor/adminlte/plugins/inputmask/jquery.inputmask.min.js') }}"></script> --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8/jquery.inputmask.min.js" integrity="sha512-efAcjYoYT0sXxQRtxGY37CKYmqsFVOIwMApaEbrxJr4RwqVVGw8o+Lfh/+59TU07+suZn1BWq4fDl5fdgyCNkw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        {{-- Configured Scripts --}}
        @include('adminlte::plugins', ['type' => 'js'])
        <script>
            const Swaal = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-primary',
            cancelButton: 'btn btn-gray'
        },
        buttonsStyling: false
    });

        </script>
        {{-- <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script> --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/js/adminlte.min.js" integrity="sha512-KBeR1NhClUySj9xBB0+KRqYLPkM6VvXiiWaSz/8LCQNdRpUm38SWUrj0ccNDNSkwCD9qPA4KobLliG26yPppJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @else
        <script src="{{ mix(config('adminlte.laravel_mix_js_path', 'js/app.js')) }}"></script>
    @endif

    {{-- Livewire Script --}}
    @if(config('adminlte.livewire'))
        @if(app()->version() >= 7)
            @livewireScripts
        @else
            <livewire:scripts />
        @endif
    @endif

    {{-- Custom Scripts --}}
    @yield('adminlte_js')

</head>

<body class="@yield('classes_body')" @yield('body_data')>

    {{-- Body Content --}}
    @yield('body')


<style>

.cut-text {
            position: relative;
            width: 80px;
            max-width: 80px;
            overflow: hidden;
            white-space: nowrap;

        }

        .cut-text::after {
            content: "...";
            position: absolute;
            right: 0;
            bottom: 0;
            background: linear-gradient(to right, transparent, #eee 50%);
        }

        .cut-textf {
            position: relative;
            width: 150px;
            max-width: 150px;
            overflow: hidden;
            white-space: nowrap;

        }

        .cut-textf::after {
            content: "...";
            position: absolute;
            right: 0;
            bottom: 0;
            background: linear-gradient(to right, transparent, #eee 50%);
        }


 .content-wrapper {
    background-color: #e4e2e2;
    padding-top: 10px;
 }
    .CheckBox1 {
      --borderColor: #2ee5de;
      --borderWidth: .125em;
    }

    .CheckBox1 label {
      display: block;
      max-width: 100%;
    }

    .CheckBox1 input[type=checkbox] {
    -webkit-appearance: none;
    appearance: none;
    vertical-align: middle;
    background: #fff;
    font-size: 1em;
    border-radius: 0.125em;
    display: inline-block;
    border: var(--borderWidth) solid var(--borderColor);
    width: 1em;
    height: 1em;
    position: relative;
    }
    .CheckBox1 input[type=checkbox]:before,
    .CheckBox1 input[type=checkbox]:after {
    content: "";
    position: absolute;
    background: var(--borderColor);
    width: calc(var(--borderWidth) * 3);
    height: var(--borderWidth);
    top: 50%;
    left: 10%;
    transform-origin: left center;
    }
    .CheckBox1 input[type=checkbox]:before {
    transform: rotate(45deg) translate(calc(var(--borderWidth) / -2), calc(var(--borderWidth) / -2)) scaleX(0);
    transition: transform 200ms ease-in 200ms;
    }
    .CheckBox1 input[type=checkbox]:after {
    width: calc(var(--borderWidth) * 5);
    transform: rotate(-45deg) translateY(calc(var(--borderWidth) * 2)) scaleX(0);
    transform-origin: left center;
    transition: transform 200ms ease-in;
    --borderColor: #2ee5de;

    }
    .CheckBox1 input[type=checkbox]:checked:before {
    transform: rotate(45deg) translate(calc(var(--borderWidth) / -2), calc(var(--borderWidth) / -2)) scaleX(1);
    transition: transform 200ms ease-in;
    --borderColor: #2ee5de;
    }
    .CheckBox1 input[type=checkbox]:checked:after {
    width: calc(var(--borderWidth) * 5);
    transform: rotate(-45deg) translateY(calc(var(--borderWidth) * 2)) scaleX(1);
    transition: transform 200ms ease-out 200ms;
    --borderColor: #2ee5de;
    }
    .CheckBox1 input[type=checkbox]:focus {
    outline: calc(var(--borderWidth) / 2) dotted rgba(0, 0, 0, 0.25);
    }

    .overlay {
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    position: fixed;
    background: #222;
    opacity: 50%;
    display: none;
    z-index: 100;
}

.overlay__inner {
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    position: absolute;
}

.overlay__content {
    left: 50%;
    position: absolute;
    top: 50%;
    transform: translate(-50%, -50%);
}

.spinner {
    width: 75px;
    height: 75px;
    display: inline-block;
    border-width: 2px;
    border-color: rgba(255, 255, 255, 0.05);
    border-top-color: #fff;
    animation: spin 1s infinite linear;
    border-radius: 100%;
    border-style: solid;
}

@keyframes spin {
  100% {
    transform: rotate(360deg);
  }
}


.inputbox {
            position: relative;
        }

        .inputbox input {
            width: 100%;
            padding: 8px;
            border: 2px solid #e4e2e2;
            /* background: #fafafa; */
            border-radius: 5px;
            outline: none;
            color: #000000;
            font-size: 1em;
            transition: 0.5s;

        }
        .inputbox select {
            width: 100%;
            padding: 10px;
            border: 2px solid #e4e2e2;
            /* background: #fafafa; */
            border-radius: 5px;
            outline: none;
            color: #000000;
            font-size: 1em;
            transition: 0.5s;

        }
        .inputbox textarea {
            width: 100%;
            padding: 8px;
            border: 2px solid #e4e2e2;
            /* background: #fafafa; */
            border-radius: 5px;
            outline: none;
            color: #000000;
            font-size: 1em;
            transition: 0.5s;

        }

        .inputbox .Txtspan {
            /* display: none; */
            color: #057e42;
            transform: translate(10px) translateY(-9px);
            font-size: 0.90em;
            padding: 0 10px;
            background: #ffffff;
            /* border-left: 1px solid #8d8d8d; */
            /* border-right: 1px solid #8d8d8d; */
            letter-spacing: 0.2em;
        }

        .inputbox span {
            position: absolute;
            left: 0;
            padding: 10px;
            pointer-events: none;
            font-size: 1em;
            color: rgb(0, 0, 0);
            text-transform: uppercase;
            margin-left: 5px;


        }

        .inputbox input:valid~span,
        .inputbox input:focus~span {

            color: #057e42;
            transform: translate(10px) translateY(-9px);
            font-size: 0.90em;
            padding: 0 10px;
            background: #ffffff;
            border-radius: 2px;
            /* border-left: 2px solid #057e42; */
            /* border-right: 2px solid #057e42; */
            letter-spacing: 0.2em;

        }
        .inputbox select:valid~span,
        .inputbox select:focus~span {

            color: #057e42;
            transform: translate(10px) translateY(-9px);
            font-size: 0.90em;
            padding: 10px;
            background: #ffffff;
            border-radius: 2px;
            /* border-left: 2px solid #057e42; */
            /* border-right: 2px solid #057e42; */
            letter-spacing: 0.2em;

        }
        .inputbox textarea:valid~span,
        .inputbox textarea:focus~span {

            color: #057e42;
            transform: translate(10px) translateY(-9px);
            font-size: 0.90em;
            padding: 0 10px;
            background: #ffffff;
            border-radius: 2px;
            /* border-left: 2px solid #057e42; */
            /* border-right: 2px solid #057e42; */
            letter-spacing: 0.2em;

        }


/*
        .inputbox input:valid~span,
        .inputbox input:focus~span {
            background: #fefffe;
            color: #057e42;
        } */



        .inputbox input:valid,
        .inputbox input:focus {
            border: 2px solid #057e42;

        }
        .inputbox input:focus {
            background: #dbedf1;

        }
        .inputbox select:valid,
        .inputbox select:focus {
            border: 2px solid #057e42;
        }
        .inputbox textarea:valid,
        .inputbox textarea:focus {
            border: 2px solid #057e42;
        }
        .rdform {
            position: relative;
        }

        .rainput {
            position: fixed;
            top: -1.5em;
            left: -1.5em;
        }

        .ralabel {
            cursor: pointer;
            display: block;
            font-weight: bold;
            text-shadow: 0 0.1em 0.1em rgba(0, 0, 0, 0.2);
            transition: color 0.2s cubic-bezier(0.45, 0.05, 0.55, 0.95);
        }

        .ralabel:not(:last-of-type) {
            margin-bottom: 1.5em;
        }

        .ralabel span {
            box-shadow: 0 0 0 0.2em currentColor inset, 0 0.2em 0.2em rgba(0, 0, 0, 0.2), 0 0.3em 0.2em rgba(0, 0, 0, 0.2) inset;
            display: inline-block;
            margin-right: 0.5em;
            vertical-align: bottom;
            width: 1.5em;
            height: 1.5em;
            transition: transform 0.2s cubic-bezier(0.5, 0, 0.5, 2), box-shadow 0.2s cubic-bezier(0.45, 0.05, 0.55, 0.95), color 0.2s cubic-bezier(0.45, 0.05, 0.55, 0.95);
        }

        .ralabel span,
        .worm__segment:before {
            border-radius: 50%;
        }

        .rainput:checked+label,
        .rainput:checked+label span,
        .worm__segment:before {
            color: #04879b;
        }

        .rainput:checked+label,
        .rainput:checked+label span {
            transition-delay: 0.4s;
        }

        .rainput:checked+label span {
            transform: scale(1.2);
        }

        .worm {
            top: 0.375em;
            left: 0.375em;
        }

        .worm,
        .worm__segment {
            position: absolute;
        }

        .worm__segment {
            top: 0;
            left: 0;
            width: 0.75em;
            height: 0.75em;
            transition: transform 0.4s cubic-bezier(0.45, 0.05, 0.55, 0.95);
        }

        .worm__segment:before {
            animation-duration: 0.4s;
            animation-timing-function: cubic-bezier(0.45, 0.05, 0.55, 0.95);
            background: currentColor;
            content: "";
            display: block;
            width: 100%;
            height: 100%;
        }

        .worm__segment:first-child:before,
        .worm__segment:last-child:before {
            box-shadow: 0 0 1em 0 currentColor;
        }

        @php
    for ($i = 1; $i <= 30; $i++) {
        echo '.worm__segment:nth-child(' . $i . ') {';
        echo 'transition-delay: 0.1' . + $i * 2 . 's;';
        echo '}';

        echo '.worm__segment:nth-child(' . $i . '):before {';
        echo 'animation-delay: 0.1' . + $i * 2 . 's;';
        echo '}';
    }
@endphp

        .ralabel span,
        .worm__segment2:before {
            border-radius: 50%;
        }

        .rainput:checked+label,
        .rainput:checked+label span,
        .worm__segment2:before {
            color: #04879b;
        }

        /* .rainput:checked+label,
        .rainput:checked+label span {
            transition-delay: 0.4s;
        }

        .rainput:checked+label span {
            transform: scale(1.2);
        } */

        .worm2 {
            top: 0.375em;
            left: 0.375em;
        }

        .worm2,
        .worm__segment2 {
            position: absolute;
        }

        .worm__segment2 {
            top: 0;
            left: 0;
            width: 0.75em;
            height: 0.75em;
            transition: transform 0.4s cubic-bezier(0.45, 0.05, 0.55, 0.95);
        }

        .worm__segment2:before {
            animation-duration: 0.4s;
            animation-timing-function: cubic-bezier(0.45, 0.05, 0.55, 0.95);
            background: currentColor;
            content: "";
            display: block;
            width: 100%;
            height: 100%;
        }

        .worm__segment2:first-child:before,
        .worm__segment2:last-child:before {
            box-shadow: 0 0 1em 0 currentColor;
        }

        @php
    for ($i = 1; $i <= 30; $i++) {
        echo '.worm__segment2:nth-child(' . $i . ') {';
        echo 'transition-delay: 0.1' . + $i * 2 . 's;';
        echo '}';

        echo '.worm__segment2:nth-child(' . $i . '):before {';
        echo 'animation-delay: 0.1' . + $i * 2 . 's;';
        echo '}';
    }
@endphp
        .ralabel span,
        .worm__segment3:before {
            border-radius: 50%;
        }

        .rainput:checked+label,
        .rainput:checked+label span,
        .worm__segment3:before {
            color: #04879b;
        }


        .worm3 {
            top: 0.375em;
            left: 0.375em;
        }

        .worm3,
        .worm__segment3 {
            position: absolute;
        }

        .worm__segment3 {
            top: 0;
            left: 0;
            width: 0.75em;
            height: 0.75em;
            transition: transform 0.4s cubic-bezier(0.45, 0.05, 0.55, 0.95);
        }

        .worm__segment3:before {
            animation-duration: 0.4s;
            animation-timing-function: cubic-bezier(0.45, 0.05, 0.55, 0.95);
            background: currentColor;
            content: "";
            display: block;
            width: 100%;
            height: 100%;
        }

        .worm__segment3:first-child:before,
        .worm__segment3:last-child:before {
            box-shadow: 0 0 1em 0 currentColor;
        }

        @php
    for ($i = 1; $i <= 30; $i++) {
        echo '.worm__segment3:nth-child(' . $i . ') {';
        echo 'transition-delay: 0.1' . + $i * 2 . 's;';
        echo '}';

        echo '.worm__segment3:nth-child(' . $i . '):before {';
        echo 'animation-delay: 0.1' . + $i * 2 . 's;';
        echo '}';
    }
@endphp
        .ralabel span,
        .worm__segment4:before {
            border-radius: 50%;
        }

        .rainput:checked+label,
        .rainput:checked+label span,
        .worm__segment4:before {
            color: #04879b;
        }


        .worm4 {
            top: 0.375em;
            left: 0.375em;
        }

        .worm4,
        .worm__segment4 {
            position: absolute;
        }

        .worm__segment4 {
            top: 0;
            left: 0;
            width: 0.75em;
            height: 0.75em;
            transition: transform 0.4s cubic-bezier(0.45, 0.05, 0.55, 0.95);
        }

        .worm__segment4:before {
            animation-duration: 0.4s;
            animation-timing-function: cubic-bezier(0.45, 0.05, 0.55, 0.95);
            background: currentColor;
            content: "";
            display: block;
            width: 100%;
            height: 100%;
        }

        .worm__segment4:first-child:before,
        .worm__segment4:last-child:before {
            box-shadow: 0 0 1em 0 currentColor;
        }

        @php
    for ($i = 1; $i <= 30; $i++) {
        echo '.worm__segment4:nth-child(' . $i . ') {';
        echo 'transition-delay: 0.1' . + $i * 2 . 's;';
        echo '}';

        echo '.worm__segment4:nth-child(' . $i . '):before {';
        echo 'animation-delay: 0.1' . + $i * 2 . 's;';
        echo '}';
    }
@endphp


        /* States */





        /* Dark mode */
        @media screen and (prefers-color-scheme: dark) {


            .rainput:checked+label,
            .rainput:checked+label span,
            .worm__segment:before {
                color: #17a2b8;
            }
            .rainput:checked+label,
            .rainput:checked+label span,
            .worm__segment2:before {
                color: #17a2b8;
            }
            .rainput:checked+label,
            .rainput:checked+label span,
            .worm__segment3:before {
                color: #17a2b8;
            }
            .rainput:checked+label,
            .rainput:checked+label span,
            .worm__segment4:before {
                color: #17a2b8;
            }
        }
</style>
<div class="overlay">
    <div class="overlay__inner">
        <div class="overlay__content"><span class="spinner"></span></div>
    </div>
</div>
</body>

</html>
