@extends('layouts.app')
@section('title', 'Edit Session')

@section('content')



{{-- <div class="content-wrapper"> --}}
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 d-flex">
                <h1 class="m-0 text-dark">Session</h1>

            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('session.index')}}">Session</a></li>
                    <li class="breadcrumb-item active">Edit Session</li>
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
                {{-- SessionEditForm --}}
                @livewire('session-edit-form',['model'=>$session])

            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
{{-- </div> --}}

@endsection
