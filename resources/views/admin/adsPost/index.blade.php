@extends('layouts.app')

@section('title', 'Ads')

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
                <h1 class="m-0 text-dark">Ad Posts</h1>
                <a href="{{route('adsPost.create')}}" class="btn btn-dark ml-3">
                    <i class="fas fa-plus"></i>
                </a>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Ads Posts</li>

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
                            <th>Company</th>
                            <th>Company Email</th>
                            <th>Phone Number</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td style="width: 20%">
                                <a href="{{route('company.show',$post->company->id)}}">{{$post->company->company_name}}</a>
                            </td>
                            <td>
                                {{$post->company->email}}
                            </td>
                            <td>
                                {{$post->company->phone_number}}
                            </td>
                            <td class="text-center">
                                <a href="{{route('adsPost.show',$post->id)}}" class="btn btn-primary">View</a>
                                {{-- <a href="{{route('adsPost.edit',$post->id)}}" class="btn btn-success">Edit</a> --}}
                                <form method="POST" action="{{route('adsPost.destroy',$post->id)}}" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
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
