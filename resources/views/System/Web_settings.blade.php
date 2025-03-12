@extends('layouts.app')

@section('title', 'Settings')

@section('content')
<div class="container-fluid">
    <div class="card mt-2">
        <div class="card-header">
            <div class="card-tools">
                <button type="button" name="headertoggle" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
            <h4 class="text-black">Settings</h4>
        </div>
        <div class="card-body">
            <div class="col-lg-12">
                <form id="settingsForm" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ config('adminlte.title') }}">
                    </div>

                    <div class="form-group">
                        <label for="slogo">Logo (PNG only)</label>
                        <input type="file" name="slogo" class="form-control-file">
                    </div>

                    <button id="saveButton" type="button" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#saveButton').click(function () {
            var form = $('#settingsForm')[0];
            var formData = new FormData(form);

            $.ajax({
                url: '{{ route('settings.update') }}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    console.log(response);
                    if (response.success) {
                        alert(response.message);
                    } else {
                        alert(response.message);
                    }
                },
                error: function (xhr, status, error) {
                    console.log(xhr.responseText);
                    alert('An error occurred while updating the settings.');
                }
            });
        });
    });
</script>
@endsection
