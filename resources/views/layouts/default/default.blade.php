<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>
    <link rel="stylesheet" href="/css/app.css">
    @yield('styles')
</head>
<body>
<div class="container">
    @include('layouts.default.partials.header')
    @yield('content')
    @include('layouts.default.partials.footer')
</div>
</body>
<script src="/js/all.js"></script>
@yield('scripts')
</html>
