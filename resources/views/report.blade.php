<!DOCTYPE html>
<html>
<head>
    <title>Crystal Report Viewer</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
    <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/dist/js/demo.js') }}"></script>
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <iframe src="{{ route('report.generate', ['reportPath' => $reportPath]) }}" width="100%" height="600" frameborder="0"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>
