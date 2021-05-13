@extends('layouts.app')

@section('title','Coach')

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
                    <li class="breadcrumb-item active"><a href="{{route('coach.index')}}">Coach</a></li>
                    <li class="breadcrumb-item active">{{$coach->name}}</li>
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
                            <img class="profile-user-img img-fluid img-circle" src="{{asset('storage/images/coaches/' . $coach->image),}}" alt="User profile picture">
                        </div>
                        <h3 class="profile-username text-center">{{$coach->name}}</h3>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- About Me Box -->
                <div class="card card-primary">
                    {{-- <div class="card-header">
                        <h3 class="card-title">About</h3>
                    </div> --}}
                    <!-- /.card-header -->
                    <div class="card-body">
                        @if ($coach->fb_url)
                        <p class="text-muted">
                            <a href="{{$coach->fb_url}}" target="_blank"><strong><i class="fab fa-facebook-square"></i> Facebook</strong></a>
                        </p>
                        @endif
                        @if ($coach->insta_url)
                        <p class="text-muted">
                            <a href="{{$coach->insta_url}}" target="_blank"><strong><i class="fab fa-instagram-square"></i> Instagram</strong></a>
                        </p>
                        @endif
                        @if ($coach->in_url)

                        <p class="text-muted">
                            <a href="{{$coach->in_url}}" target="_blank"><strong><i class="fab fa-linkedin"></i> Linkedin</strong></a>
                        </p>
                        @endif
                        @if ($coach->y_url)
                        <p class="text-muted">
                            <a href="{{$coach->y_url}}" target="_blank"><strong><i class="fab fa-youtube"></i> Youtube</strong></a>
                        </p>
                        @endif
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
                            <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Bio</a></li>
                            <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Sessions</a></li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">
                                <!-- Post -->
                                <div class="post">

                                    <p>
                                        {{$coach->bio}}
                                    </p>
                                </div>

                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="timeline">
                                <!-- The timeline -->
                                <div class="timeline timeline-inverse">
                                    <!-- timeline time label -->
                                    @foreach ($coach->sessions as $session)
                                    <div class="time-label">
                                        <span class="bg-primary">
                                            {{$session->created_at}}
                                        </span>
                                    </div>

                                    <div>
                                        {{-- <i class="fas fa-envelope bg-primary"></i> --}}
                                        <i class="fas fa-video bg-primary"></i>

                                        <div class="timeline-item">

                                            <span class="time"> {{$session->price}} EGP</span>
                                            <h3 class="timeline-header"><a href="#">{{$session->title}}</a></h3>
                                            <div class="timeline-body">
                                                {{$session->desc}}
                                            </div>
                                            {{-- <div class="timeline-footer">
                                            @foreach ($post->studentInterests as $interests )
                                            <a href="#" class="btn btn-danger btn-sm">{{$interests->interest}}</a>
                                            @endforeach
                                        </div> --}}
                                        <hr>
                                        {{-- <div class="timeline-footer">
                                            @foreach ($post->internDepartments as $dep )
                                            <a href="#" class="btn btn-primary btn-sm">{{$dep->department_name}}</a>
                                        @endforeach
                                    </div> --}}
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
