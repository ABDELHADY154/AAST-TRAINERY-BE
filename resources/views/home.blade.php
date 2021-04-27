@extends('layouts.app')



@section('content')
@section('js')
<script src="/admin-style/plugins/chart.js/Chart.min.js">

</script>
<script>
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData = {
        labels: [
            'BIS'
            , 'Marketing'
            , 'Accounting'
            , 'Finance'
            , 'Media Management'
            , 'Media'
            , 'Humanities'
        , ]
        , datasets: [{
            data: [700, 500, 400, 600, 300, 100, 50]
            , backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de']
        , }]
    }
    var donutOptions = {
        maintainAspectRatio: false
        , responsive: true
    , }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var donutChart = new Chart(donutChartCanvas, {
        type: 'doughnut'
        , data: donutData
        , options: donutOptions
    })

</script>

@endsection
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            {{-- <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div> --}}

            {{-- <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Starter Page</li>
                </ol>
            </div> --}}

        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small card -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{$posts}}</h3>

                                <p>Posts</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-stream"></i>
                            </div>

                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small card -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{$students}}</h3>

                                <p>Students</p>
                            </div>
                            <div class="icon">
                                <i class="far fa-user"></i>
                            </div>

                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small card -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{$applied}}</h3>

                                <p>Applied</p>
                            </div>
                            <div class="icon">
                                <i class="far fa-user"></i>
                            </div>

                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small card -->
                        <div class="small-box" style="color:#fff;background-color: #1E4274">
                            <div class="inner">
                                <h3>{{$accepted}}</h3>

                                <p>Accepted</p>
                            </div>
                            <div class="icon">
                                <i class="far fa-user"></i>
                            </div>

                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Student Departments</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>

    </div>
</div>
@endsection


@section('title', 'Dashboard')
