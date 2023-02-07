<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('includes.head')
</head>
<body>
@include('includes.nav')
@include('includes.header')
@yield('content')
@include('includes.footer')
@include('includes.scripts')
</body>
</html>
