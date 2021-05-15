@extends('layouts.app')

@section('title','Student Review')

@section('content')


<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Student Review</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('sessionReview.index')}}">Student Review</a></li>
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
                    <img class="img-circle img-bordered-sm" src="{{asset('storage/images/avatars/' . $student->image)}}" alt="User Image">
                    <span class="username">
                        <a href="{{route('student.show',$student)}}">{{$student->name}}</a>
                        {{-- <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a> --}}
                    </span>
                    <span class="description">{{$student->studentDepartment->department_name}}</span>
                </div>
                <!-- /.user-block -->
                <div class="row mb-3">
                    <div class="col-sm-6">
                        <h3>Session: </h3>
                        <h5 class="username">
                            <a href="{{route('session.show',$post)}}">{{$post->title}}</a>
                        </h5>
                        <span class="description">{{$post->desc}}</span>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">


                        <div class="col-sm">
                            <h3>Review: </h3>

                            {{$review->comment}} <br>
                            @if ($review->rate == 1)
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            @elseif ($review->rate == 2)
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            @elseif ($review->rate == 3)
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            @elseif ($review->rate == 4)
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            @elseif ($review->rate == 5)
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            @endif
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
    <!-- /.card -->

</section>




@endsection
