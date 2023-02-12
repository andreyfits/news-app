<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.admin.head')
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    @include('includes.admin.nav')
    @include('includes.admin.main-sidebar')
    @yield('content')
    @include('includes.admin.footer')
    @include('includes.admin.control-sidebar')
</div>
<!-- ./wrapper -->

@include('includes.admin.scripts')
</body>
</html>
