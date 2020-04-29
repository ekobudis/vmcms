@extends('admin.layouts.master')

@section('head')
	@include('admin.layouts.head')
@stop

@section('content')
    
@stop

@section('footer')
    @push('scripts')
    <script type="text/javascript">
        var uri = "{{ url()->current() }}";
        var tgl_hariini = "{{ \Carbon\Carbon::now()->format('Y-m-d') }}";

    </script>
    @endpush
@stop