<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.includes.head')
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    @include('admin.includes.nav')
    @include('admin.includes.main-sidebar')
    @yield('content')
    @include('admin.includes.footer')
    @include('admin.includes.control-sidebar')
</div>
<!-- ./wrapper -->

@include('admin.includes.scripts')
</body>
</html>
