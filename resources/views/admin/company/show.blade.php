@extends('layouts.app')

@section('title','Company')

@section('content')


<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Profile</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('company.index')}}">Company</a></li>
                    <li class="breadcrumb-item active">{{$company->company_name}}</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="{{asset('storage/images/companyLogo/' . $company->image),}}" alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center">{{$company->company_name}}</h3>

                        <p class="text-muted text-center">{{$company->company_field}}</p>
                        {{--
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Followers</b> <a class="float-right">1,322</a>
                            </li>
                            <li class="list-group-item">
                                <b>Following</b> <a class="float-right">543</a>
                            </li>
                            <li class="list-group-item">
                                <b>Friends</b> <a class="float-right">13,287</a>
                            </li>
                        </ul> --}}

                        {{-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- About Me Box -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">About {{$company->company_name}}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <strong><i class="fas fa-globe"></i> Website</strong>
                        <p class="text-muted">
                            <a href="{{$company->website}}" target="_blank">{{$company->website}}</a>
                        </p>

                        <hr>
                        <strong><i class="far fa-envelope"></i> Email</strong>
                        <p class="text-muted">
                            <a href="mailto:{{$company->email}}" target="_blank">{{$company->email}}</a>
                        </p>

                        <hr>
                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                        <p class="text-muted">{{$company->address}}</p>

                        <hr>
                        <strong><i class="fas fa-phone"></i> Phone Number</strong>

                        <p class="text-muted">{{$company->phone_number}}</p>

                        <hr>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Overview</a></li>
                            <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Internship Posts</a></li>
                            {{-- <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li> --}}
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">
                                <!-- Post -->
                                <div class="post">

                                    <p>
                                        {{$company->company_desc}}
                                    </p>
                                </div>

                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="timeline">
                                <!-- The timeline -->
                                <div class="timeline timeline-inverse">
                                    <!-- timeline time label -->
                                    @foreach ($company->internshipPosts as $post)
                                    <div class="time-label">
                                        <span class="bg-primary">
                                            {{$post->created_at}}
                                        </span>
                                    </div>

                                    <div>
                                        <i class="fas fa-envelope bg-primary"></i>

                                        <div class="timeline-item">

                                            <span class="time"><i class="far fa-clock"></i> {{$post->application_deadline}}</span>
                                            <h3 class="timeline-header"><a href="#">{{$post->internship_title}}</a></h3>
                                            <div class="timeline-body">
                                                {{$post->desc}}
                                            </div>
                                            <div class="timeline-footer">
                                                @foreach ($post->studentInterests as $interests )
                                                <a href="#" class="btn btn-danger btn-sm">{{$interests->interest}}</a>
                                                @endforeach
                                            </div>
                                            <hr>
                                            <div class="timeline-footer">
                                                @foreach ($post->internDepartments as $dep )
                                                <a href="#" class="btn btn-primary btn-sm">{{$dep->department_name}}</a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    @endforeach

                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
</section>




@endsection
