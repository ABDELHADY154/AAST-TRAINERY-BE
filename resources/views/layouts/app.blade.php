<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} | @yield('title')</title>
    @include('layouts.admin-parts.css')
</head>
<body>

    @include('layouts.admin-parts.navbar')
    @include('layouts.admin-parts.menu')




    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <div class="content">
            @yield('content')
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    @include('layouts.admin-parts.mainSide')
    @include('layouts.admin-parts.footer')


    @include('layouts.admin-parts.js')

</body>
</html>
