@extends('layouts.app')

@section('title', 'Students')

@section('css')
<link rel="stylesheet" href="/admin-style/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/admin-style/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="/admin-style/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 d-flex">
                <h1 class="m-0 text-dark">Students</h1>
                {{-- <a href="{{route('student.create')}}" class="btn btn-dark ml-3">
                <i class="fas fa-plus"></i>
                </a> --}}
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Students</li>

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
                <table id="example1" class="table table-bordered table-striped">

                    <thead>
                        <tr class="text-center">
                            <th>#ID</th>
                            <th>Name</th>
                            <th>Phone Number</th>
                            <th>E-Mail</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                        <tr>
                            <td>{{$student->id}}</td>
                            <td>
                                {{$student->name}}
                            </td>
                            <td>
                                {{$student->phone_number}}
                            </td>

                            <td>
                                <a href="mailto:{{$student->email}}">{{$student->email}}</a>
                            </td>
                            <td class="text-center">
                                <a href="{{route('student.show',$student->id)}}" class="btn btn-primary">View</a>
                                {{-- <a href="{{route('student.edit',$student->id)}}" class="btn btn-success">Edit</a> --}}
                                <form method="POST" action="{{route('student.destroy',$student->id)}}" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                                {{-- <a href="{{route('company.destroy',$company->id)}}" class="btn btn-danger">Delete</a> --}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection
@section('js')
<script src="/admin-style/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/admin-style/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/admin-style/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/admin-style/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/admin-style/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/admin-style/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/admin-style/plugins/jszip/jszip.min.js"></script>
<script src="/admin-style/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/admin-style/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/admin-style/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/admin-style/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/admin-style/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true
            , "lengthChange": true
            , "autoWidth": false
            , "buttons": ["excel", "pdf", "print"] //, "colvis"]

        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    });

</script>
@endsection
