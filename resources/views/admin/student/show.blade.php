@extends('layouts.app')

@section('title','Company')


@section('css')
{{-- <link href="/assets/css/font-awesome/css/all.min.css?ver=1.2.0" rel="stylesheet" /> --}}
{{-- <link href="/assets/css/bootstrap.min.css?ver=1.2.0" rel="stylesheet" /> --}}
{{-- <link href="/assets/css/aos.css?ver=1.2.0" rel="stylesheet" /> --}}
{{-- <link href="/assets/css/main.css?ver=1.2.0" rel="stylesheet" /> --}}
@endsection

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
                    <li class="breadcrumb-item active"><a href="{{route('student.index')}}">Student</a></li>
                    <li class="breadcrumb-item active">{{$student->name}}</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="page-content">
            <div class="container">
                <div class="cover shadow-lg bg-white">
                    <div class="cover-bg p-3 p-lg-4 text-white">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="avatar hover-effect bg-white  p-1 border-none">
                                    <img src="{{asset('storage/images/avatars/' . $student->image)}}" width="200" height="200" />
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-7 text-center text-md-start" style="color: #1E4274">
                                <h2 class="h1 mt-2" data-aos="fade-left" data-aos-delay="0">
                                    {{$student->name}}
                                </h2>
                                <p data-aos="fade-left" data-aos-delay="100">
                                    {{$student->studentDepartment->department_name}}
                                </p>
                                {{-- <div class="d-print-none" data-aos="fade-left" data-aos-delay="200">
                                    <a class="btn btn-light text-dark shadow-sm mt-1 me-1" href="right-resume.pdf" target="_blank">Download CV</a><a class="btn btn-success shadow-sm mt-1" href="#contact">Hire Me</a>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="about-section pt-4 px-3 px-lg-4 mt-1">
                        <div class="row">
                            <div class="col-md-6">
                                <h2 class="h3 mb-3">About</h2>
                                <div class="row mt-2 ml-2">
                                    <div class="col-sm-4">
                                        <div class="pb-1">Date Of Birth</div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="pb-1 text-secondary">{{$student->date_of_birth}}</div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="pb-1">Email</div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="pb-1 text-secondary">{{$student->email}}</div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="pb-1">Phone</div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="pb-1 text-secondary">{{$student->phone_number}}</div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="pb-1">Address</div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="pb-1 text-secondary">
                                            {{$student->city}} ,{{$student->country}}
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="pb-1">GPA</div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="pb-1 text-secondary">
                                            {{$student->gpa}}
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="pb-1">period</div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="pb-1 text-secondary">
                                            {{$student->period}}
                                        </div>
                                    </div>
                                </div>
                                {{-- <p>
                                   {{$student->}}
                                </p> --}}
                            </div>
                            <div class="col-md-5 offset-md-1">

                            </div>
                        </div>
                    </div>
                    <hr class="d-print-none" />
                    <div class="page-break"></div>
                    <div class="education-section px-3 px-lg-4 pb-4">
                        <h2 class="h3 mb-4">Education</h2>
                        <div class="timeline">
                            @foreach ($student->studentEducations as $edu)
                            <div class="timeline-card timeline-card-success card shadow-sm">
                                <div class="card-body">
                                    <div class="h5 mb-1">
                                        {{$edu->school_name}}
                                        {{-- <span class="text-muted h6">from International University</span> --}}
                                    </div>
                                    <div class="text-muted text-small mb-2">{{$edu->from}} | {{$edu->from}}</div>
                                    {{-- <div>
                                        Leverage agile frameworks to provide a robust synopsis for
                                        high level overviews. Iterative approaches to corporate
                                        strategy foster collaborative thinking to further the
                                        overall value proposition.
                                    </div> --}}
                                </div>
                            </div>
                            @endforeach


                        </div>
                    </div>
                    <hr class="d-print-none" />

                    <div class="work-experience-section px-3 px-lg-4">
                        <h2 class="h3 mb-4">Work Experience</h2>
                        <div class="timeline">
                            @foreach ($student->studentExperience as $exp )

                            <div class="timeline-card timeline-card-primary card shadow-sm">
                                <div class="card-body">
                                    <div class="h5 mb-1">
                                        {{$exp->job_title}}
                                        <span class="text-muted h6">at {{$exp->company_name}} | {{$exp->experience_type}}</span>
                                    </div>
                                    <div class="text-muted text-small mb-2">
                                        {{$exp->from}} - {{$exp->to}}
                                    </div>
                                    {{-- <div>
                                        Leverage agile frameworks to provide a robust synopsis for
                                        high level overviews. Iterative approaches to corporate
                                        strategy foster collaborative thinking to further the
                                        overall value proposition.
                                    </div> --}}
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                    <hr class="d-print-none" />
                    <div class="skills-section px-3 px-lg-4">
                        <h2 class="h3 mb-3">Language</h2>
                        <div class="row">
                            @foreach ($student->studentLanguages as $lang )
                            <div class="col-md-4">
                                <div class="mb-2">
                                    <span>{{$lang->language}}</span>
                                    <div class="progress my-1">
                                        <div class="progress-bar" role="progressbar" style="width: {{$lang->level*20}}%" aria-valuenow="{{$lang->level*20}}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                    {{-- <hr class="d-print-none" /> --}}



                </div>
            </div>
        </div>
</section>




@endsection
