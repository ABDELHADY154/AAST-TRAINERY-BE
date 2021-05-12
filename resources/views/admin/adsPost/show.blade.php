@extends('layouts.app')

@section('title','Ads')

@section('content')


<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Ad Post</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('adsPost.index')}}">Ad Post</a></li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>


<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">

        <div class="card-body">
            <!-- Post -->
            <div class="post">
                <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="{{asset('storage/images/companyLogo/' . $intern->company->image)}}" alt="User Image">
                    <span class="username">
                        <a href="{{route('company.show',$intern->company->id)}}">{{$intern->company->company_name}}</a>
                        {{-- <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a> --}}
                    </span>
                    {{-- <span class="description">Posted 5 photos - 5 days ago</span> --}}
                </div>
                <!-- /.user-block -->
                <div class="row mb-3">
                    <div class="col-sm-6">
                        <img class="img-fluid" src="{{asset('storage/images/adsImages/' . $intern->sponser_image)}}" alt="Photo">
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm">
                                {{$intern->desc}}

                            </div>

                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.post -->
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>




@endsection
