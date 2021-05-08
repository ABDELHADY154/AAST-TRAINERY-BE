<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/admin-style/Images/icon.png" type="image/x-icon">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} | @yield('title')</title>
    @include('layouts.admin-parts.css')

</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('layouts.admin-parts.navbar')

        @include('layouts.admin-parts.menu')

        <div class="content-wrapper">
            <div class="content">
                @yield('content')
            </div>
        </div>

        @include('layouts.admin-parts.footer')

    </div>
    @include('layouts.admin-parts.js')

</body>
</html>
