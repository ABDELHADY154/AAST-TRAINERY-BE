@extends('layouts.app')

@section('title','Session')

@section('content')


<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Session</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('session.index')}}">Sessions</a></li>
                    <li class="breadcrumb-item active">{{$session->title}}</li>
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
            <div class="row">
                <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Total Accepted Students</span>
                                    <span class="info-box-number text-center text-muted mb-0">{{count($session->students()->where('book_status','accepted')->get())}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Total Applied Students</span>
                                    <span class="info-box-number text-center text-muted mb-0">{{$session->students()->count()}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Total Rejected Students</span>
                                    <span class="info-box-number text-center text-muted mb-0">{{$session->students()->where('book_status','rejected')->count()}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Applicants</a></li>
                                <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Reviews</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <!-- Post -->
                                    <div class="row">

                                        <div class="col">

                                            <table class="table table-striped">
                                                <thead class="">
                                                    <tr>
                                                        <th scope="col">#ID</th>
                                                        <th scope="col">Name</th>
                                                        <th scope="col">Email</th>
                                                        {{-- <th scope="col">Status</th> --}}
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach ($session->students as $student)
                                                    <tr>
                                                        <th scope="row">{{$student->id}}</th>
                                                        <td><a href="{{route('student.show',$student->id)}}">{{$student->name}}</a></td>
                                                        <td>{{$student->email}}</td>
                                                        <td>
                                                            @if($student->pivot->book_status == 'booked')
                                                            <a href="{{route('accept.student.session', ['s'=>$student->id,'p'=>$session->id])}}" class="btn btn-success">Accept</a>
                                                            <a href="{{route('reject.student.session',['s'=>$student->id,'p'=>$session->id])}}" class="btn btn-danger">Reject</a>
                                                            @elseif ($student->pivot->book_status == 'accepted')
                                                            <a href="{{route('student.achieved.intern.session',['s'=>$student->id,'p'=>$session->id])}}" class="btn btn-warning">Accomplished</a>
                                                            <a href="{{route('reject.student.session',['s'=>$student->id,'p'=>$session->id])}}" class="btn btn-danger">Reject</a>
                                                            @elseif ($student->pivot->book_status == 'rejected')
                                                            <a href="{{route('accept.student.session', ['s'=>$student->id,'p'=>$session->id])}}" class="btn btn-success ">Accept</a>
                                                            <a href="#" class="btn btn-danger disabled">Rejected</a>
                                                            @elseif ($student->pivot->book_status == 'achieved')
                                                            <a href="#" class="btn btn-success disabled">Accomplished</a>
                                                            <a href="{{route('reject.student.session',['s'=>$student->id,'p'=>$session->id])}}" class="btn btn-danger">Reject</a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    @endforeach


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="timeline">
                                    <!-- The timeline -->
                                    <div class="timeline timeline-inverse">
                                        <!-- timeline time label -->
                                        @foreach ($session->studentReviews as $review)
                                        <div class="card">
                                            <div class="card-body">
                                                <!-- Post -->
                                                <div class="post">
                                                    <div class="user-block">
                                                        <img class="img-circle img-bordered-sm" src="{{asset('storage/images/avatars/' . $review->image)}}" alt="User Image">
                                                        <span class="username">
                                                            <a href="{{route('student.show',$review)}}">{{$review->name}}</a>
                                                        </span>

                                                    </div>
                                                    <!-- /.user-block -->
                                                    <div class="row mb-3">
                                                        <!-- /.col -->
                                                        <div class="col">
                                                            {{-- <div class="row"> --}}

                                                            <div class="col-sm">
                                                                {{$review->pivot->comment}} <br>
                                                                @if ($review->pivot->rate == 1)
                                                                <i class="fas fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                                @elseif ($review->pivot->rate == 2)
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                                @elseif ($review->pivot->rate == 3)
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                                @elseif ($review->pivot->rate == 4)
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                                @elseif ($review->pivot->rate == 5)
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                @endif
                                                                <a href="{{route('sessionReview.show',$review->pivot->id)}}" class="btn btn-primary float-right"><i class="fas fa-chevron-circle-right"></i></a>
                                                                {{-- </div> --}}

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
                                        @endforeach

                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    {{-- <div class="row">
                        <table class="table table-striped">
                            <thead class="">
                                <tr>
                                    <th scope="col">#ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($session->students as $student)
                                <tr>
                                    <th scope="row">{{$student->id}}</th>
                    <td><a href="{{route('student.show',$student->id)}}">{{$student->name}}</a></td>
                    <td>{{$student->email}}</td>
                    <td>
                        @if($student->pivot->book_status == 'booked')
                        <a href="{{route('accept.student.session', ['s'=>$student->id,'p'=>$session->id])}}" class="btn btn-success">Accept</a>
                        <a href="{{route('reject.student.session',['s'=>$student->id,'p'=>$session->id])}}" class="btn btn-danger">Reject</a>
                        @elseif ($student->pivot->book_status == 'accepted')
                        <a href="{{route('student.achieved.intern.session',['s'=>$student->id,'p'=>$session->id])}}" class="btn btn-warning">Accomplished</a>
                        <a href="{{route('reject.student.session',['s'=>$student->id,'p'=>$session->id])}}" class="btn btn-danger">Reject</a>
                        @elseif ($student->pivot->book_status == 'rejected')
                        <a href="{{route('accept.student.session', ['s'=>$student->id,'p'=>$session->id])}}" class="btn btn-success ">Accept</a>
                        <a href="#" class="btn btn-danger disabled">Rejected</a>
                        @elseif ($student->pivot->book_status == 'achieved')
                        <a href="#" class="btn btn-success disabled">Accomplished</a>
                        <a href="{{route('reject.student.session',['s'=>$student->id,'p'=>$session->id])}}" class="btn btn-danger">Reject</a>
                        @endif
                    </td>
                    </tr>
                    @endforeach


                    </tbody>
                    </table>
                </div> --}}
                {{-- <div class="row">
                        <div class="col-12">
                            <h4>Recent Activity</h4>
                            <div class="post">
                                <div class="user-block">
                                    <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                                    <span class="username">
                                        <a href="#">Jonathan Burke Jr.</a>
                                    </span>
                                    <span class="description">Shared publicly - 7:45 PM today</span>
                                </div>
                                <!-- /.user-block -->
                                <p>
                                    Lorem ipsum represents a long-held tradition for designers,
                                    typographers and the like. Some people hate it and argue for
                                    its demise, but others ignore.
                                </p>

                                <p>
                                    <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Demo File 1 v2</a>
                                </p>
                            </div>

                            <div class="post clearfix">
                                <div class="user-block">
                                    <img class="img-circle img-bordered-sm" src="../../dist/img/user7-128x128.jpg" alt="User Image">
                                    <span class="username">
                                        <a href="#">Sarah Ross</a>
                                    </span>
                                    <span class="description">Sent you a message - 3 days ago</span>
                                </div>
                                <!-- /.user-block -->
                                <p>
                                    Lorem ipsum represents a long-held tradition for designers,
                                    typographers and the like. Some people hate it and argue for
                                    its demise, but others ignore.
                                </p>
                                <p>
                                    <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Demo File 2</a>
                                </p>
                            </div>

                            <div class="post">
                                <div class="user-block">
                                    <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                                    <span class="username">
                                        <a href="#">Jonathan Burke Jr.</a>
                                    </span>
                                    <span class="description">Shared publicly - 5 days ago</span>
                                </div>
                                <!-- /.user-block -->
                                <p>
                                    Lorem ipsum represents a long-held tradition for designers,
                                    typographers and the like. Some people hate it and argue for
                                    its demise, but others ignore.
                                </p>

                                <p>
                                    <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Demo File 1 v1</a>
                                </p>
                            </div>
                        </div>
                    </div> --}}

            </div>
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                <h3 class="text-primary">{{$session->title}}</h3>
                <p class="text-muted">{{$session->desc}}</p>
                <br>
                <div class="text-muted">
                    <p class="text-sm">Coach Name
                        <b class="d-block">{{$session->coach->name}}</b>
                    </p>
                    <p class="text-sm">Coach Title
                        <b class="d-block">{{$session->coach->job_title}}</b>
                    </p>
                    <p class="text-sm">Price
                        <b class="d-block">{{$session->price}}</b>
                    </p>
                    <p class="text-sm">Published on
                        <b class="d-block">{{$session->created_at}}</b>
                    </p>

                </div>



            </div>
        </div>
    </div>
    <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>




@endsection
