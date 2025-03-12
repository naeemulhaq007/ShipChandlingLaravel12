@extends('layouts.app')



@section('title', 'Dashboard')

@section('content_header')
{{-- {{$data["pagetitle"]}} --}}
@stop

@section('content')


    <div style="padding: 20px" id="no-more-tables">
       
        {!! $output !!}
    </div>
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
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
