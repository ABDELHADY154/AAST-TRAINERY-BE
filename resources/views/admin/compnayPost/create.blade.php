@extends('layouts.app')
@section('title', 'Create Company')

@section('content')

@section('js')
<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        var imgInput = document.getElementById('customFile');
        var label = document.getElementById('labelIMG');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src)
        }
        label.innerHTML = imgInput.value;

    };

</script>
@endsection
{{-- <div class="content-wrapper"> --}}
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 d-flex">
                <h1 class="m-0 text-dark">Company Internship Posts</h1>

            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('companyInternshipPost.index')}}">Internship Posts</a></li>
                    <li class="breadcrumb-item active">Create Internship Posts</li>
                </ol>

            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="card card-body">
                {{-- <form action="{{route('companyInternshipPost.store')}}" method="POST" enctype="multipart/form-data">
                @include('admin.compnayPost.form')
                </form> --}}
                @livewire('company-post-create-form')

            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
{{-- </div> --}}

@endsection
{{-- @section('css')
<link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
<link href="https://unpkg.com/filepond-plugin-image-edit/dist/filepond-plugin-image-edit.css" rel="stylesheet" />
<style>
    .filepond {
        width: 20%;

    }

    .filePondContainer {
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
        align-self: center;
    }

</style>
@endsection
@section('js')
<script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-crop/dist/filepond-plugin-image-crop.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-resize/dist/filepond-plugin-image-resize.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-transform/dist/filepond-plugin-image-transform.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-edit/dist/filepond-plugin-image-edit.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-encode/dist/filepond-plugin-file-encode.js"></script>
<script>
    const inputElement = document.querySelector('input[id="company_logo"]');
    FilePond.registerPlugin(
        FilePondPluginFileValidateType
        , FilePondPluginImageExifOrientation
        , FilePondPluginImagePreview
        , FilePondPluginImageCrop
        , FilePondPluginImageResize
        , FilePondPluginImageTransform
        , FilePondPluginImageEdit
    );
    FilePond.create(
        inputElement, {
            labelIdle: `Drag & Drop your picture or <span class="filepond--label-action">Browse</span>`
            , imagePreviewHeight: 170
            , imageCropAspectRatio: '1:1'
            , imageResizeTargetWidth: 200
            , imageResizeTargetHeight: 200
            , stylePanelLayout: 'compact circle'
            , styleLoadIndicatorPosition: 'center bottom'
            , styleProgressIndicatorPosition: 'right bottom'
            , styleButtonRemoveItemPosition: 'left bottom'
            , styleButtonProcessItemPosition: 'right bottom'
        , }
    );
    FilePond.setOptions({
        server: {
            url: '/filepond/api'
            , process: '/process'
            , revert: '/process'
            , headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
}
}
});

</script>

@endsection --}}
