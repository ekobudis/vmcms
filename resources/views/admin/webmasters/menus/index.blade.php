@extends('admin.layouts.master')

@section('head')
    @include('admin.layouts.head')
@stop

@section('content')
    <div class="row">    
        <div class="col-12 col-sm-12">
            {!! Menu::render() !!}
        </div>
    </div>
    @include('admin.partials.modals.template')
@stop

@section('footer')
    @push('scripts')
    {!! Menu::scripts() !!}
    <script src="{{ asset('js/vimajs.js') }}"></script>
    <script type="text/javascript">
        var uri = "{{ url()->current() }}";
        
    </script>
    @endpush
@stop
