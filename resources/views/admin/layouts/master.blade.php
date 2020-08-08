<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @yield('head')
</head>
<body class="admin">
    <div class="preloader">
		<div class="preloader_image"></div>
    </div>
    <div id="canvas">
		<div id="box_wrapper">
            
        </div>
    </div>
    <div class="wrapper">
        @include('admin.layouts.header-nav')
        
        @include('admin.layouts.sidebar')

        @include('admin.layouts.search')
        <section class="ls section_padding_top_50 section_padding_bottom_50 columns_padding_10">
            <div class="container-fluid">
                @yield('content')
            </div>
        </section>

        @include('admin.layouts.footer')
    </div>
    <!-- End Wrapper -->
    @include('admin.layouts.foot')
    @stack('scripts')
    <script type="text/javascript">
        @if(Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}";
            switch(type){
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;

                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;

                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;

                case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
        @endif
        $('.textarea').summernote();
    </script>
</body>
</html>