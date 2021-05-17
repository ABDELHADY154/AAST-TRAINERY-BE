@extends('layouts.app')

@section('title','Advisor Internship')

@section('content')


<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Internship Post</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('trainingAdvisorPost.index')}}">Internship Posts</a></li>
                    <li class="breadcrumb-item active">{{$intern->internship_title}}</li>
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
                                    <span class="info-box-number text-center text-muted mb-0">{{count($intern->appliedStudents()->where('application_status','accepted')->get())}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Total Applied Students</span>
                                    <span class="info-box-number text-center text-muted mb-0">{{$intern->appliedStudents()->count()}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Total Rejected Students</span>
                                    <span class="info-box-number text-center text-muted mb-0">{{$intern->appliedStudents()->where('application_status','rejected')->count()}}</span>
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

                                                    @foreach ($intern->appliedStudents as $student)
                                                    <tr>
                                                        <th scope="row">{{$student->id}}</th>
                                                        <td><a href="{{route('student.show',$student->id)}}">{{$student->name}}</a></td>
                                                        <td>{{$student->email}}</td>
                                                        {{-- <td>{{$student->pivot->application_status}}</td> --}}
                                                        <td>
                                                            @if($student->pivot->application_status == 'applied')
                                                            <a href="{{route('accept.student', ['s'=>$student->id,'p'=>$intern->id])}}" class="btn btn-success">Accept</a>
                                                            <a href="{{route('reject.student',['s'=>$student->id,'p'=>$intern->id])}}" class="btn btn-danger">Reject</a>
                                                            @elseif ($student->pivot->application_status == 'accepted')
                                                            {{-- <a href="#" class="btn btn-success disabled">Accepted</a> --}}
                                                            <a href="{{route('student.achieved.intern',['s'=>$student->id,'p'=>$intern->id])}}" class="btn btn-warning">Accomplished</a>
                                                            <a href="{{route('reject.student',['s'=>$student->id,'p'=>$intern->id])}}" class="btn btn-danger">Reject</a>
                                                            @elseif ($student->pivot->application_status == 'rejected')
                                                            <a href="{{route('accept.student', ['s'=>$student->id,'p'=>$intern->id])}}" class="btn btn-success ">Accept</a>
                                                            <a href="#" class="btn btn-danger disabled">Rejected</a>
                                                            @elseif ($student->pivot->application_status == 'achieved')
                                                            <a href="#" class="btn btn-success disabled">Accomplished</a>
                                                            <a href="{{route('reject.student',['s'=>$student->id,'p'=>$intern->id])}}" class="btn btn-danger">Reject</a>
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
                                        @foreach ($intern->studentReviews as $review)
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
                                                                <a href="{{route('internshipReview.show',$review->pivot->id)}}" class="btn btn-primary float-right"><i class="fas fa-chevron-circle-right"></i></a>
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
                    {{-- 'gender' => $request->gender,
            'type' => $request->type,
            'salary' => $request->salary,
            'application_deadline' => $request->application_deadline,
            'published_on' => now(),
            'desc' => $request->desc,
            'location' => $request->location,
            'location_url' => $request->location_url,
            'vacancy' => $request->vacancy, --}}
                </div>
                <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                    <h3 class="text-primary">{{$intern->internship_title}}</h3>
                    <p class="text-muted">{{$intern->desc}}</p>
                    <br>
                    <div class="text-muted">
                        <p class="text-sm">Gender
                            <b class="d-block">{{$intern->gender}}</b>
                        </p>
                        <p class="text-sm">Internship Type
                            <b class="d-block">{{$intern->type}}</b>
                        </p>
                        <p class="text-sm">Internship Salary
                            <b class="d-block">{{$intern->salary}}</b>
                        </p>
                        <p class="text-sm">Internship Application Deadline
                            <b class="d-block">{{$intern->application_deadline}}</b>
                        </p>
                        <p class="text-sm">Published On
                            <b class="d-block">{{$intern->published_on}}</b>
                        </p>
                        <p class="text-sm">Location
                            <b class="d-block">{{$intern->location}}</b>
                        </p>
                        @if($intern->location_url !== null)
                        <p class="text-sm">Location URL
                            <b class="d-block"><a href="{{$intern->location_url}}" target="_blank">{{$intern->location_url}}</a></b>
                        </p>
                        @endif
                    </div>

                    <h5 class="mt-5 text-muted">Internship Related Departments</h5>
                    <ul class="list-group list-group-flush">
                        @foreach ($intern->internDepartments as $dep)
                        <li class="list-group-item">
                            {{$dep->department_name}}
                        </li>
                        @endforeach
                    </ul>
                    <h5 class="mt-5 text-muted">Internship Requirements</h5>
                    <ul class="list-group list-group-flush">
                        @foreach ($intern->internshipReqs as $req)
                        <li class="list-group-item">
                            {{$req->req}}
                        </li>
                        @endforeach
                    </ul>
                    <div class="text-center mt-5 mb-3">
                        <a href="#" class="btn btn-sm btn-primary">Add files</a>
                        <a href="#" class="btn btn-sm btn-warning">Report contact</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>




@endsection
