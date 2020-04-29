<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @yield('head')
</head>
<body id="bg">
    <div class="page-wraper roboto-condensed">
        <div id="loading-area"></div>
        <!-- header -->
        @include('frontend.layouts.header')
        <!-- end of header -->
        <!-- Content -->
        <div class="page-content bg-white">
            @yield('content')
        </div>
        <!-- End Content -->
        @include('frontend.layouts.footer')
    </div>
    @include('frontend.layouts.foot')
    @stack('scripts')
</body>
</html>