@extends('admin.layouts.master')

@section('head')
	@include('admin.layouts.head')
@stop

@section('content')
    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="teaser warning_bg_color counter-background-teaser text-center">
                <span class="counter counter-background" data-from="0" data-to="1257" data-speed="2100">0</span>
                <h3 class="counter highlight" data-from="0" data-to="1257" data-speed="2100">0</h3>
                <p>Reviews / Month</p>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="teaser danger_bg_color counter-background-teaser text-center">
                <span class="counter counter-background" data-from="0" data-to="346" data-speed="1500">0</span>
                <h3 class="counter highlight" data-from="0" data-to="346" data-speed="1500">0</h3>
                <p>Clients / Month</p>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="teaser success_bg_color counter-background-teaser text-center">
                <span class="counter counter-background" data-from="0" data-to="216" data-speed="1900">0</span>
                <h3 class="counter highlight" data-from="0" data-to="216" data-speed="1900">0</h3>
                <p>Orders / Month</p>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="teaser info_bg_color counter-background-teaser text-center">
                <span class="counter counter-background" data-from="0" data-to="15" data-speed="1800">0</span>
                <h3 class="counter-wrap highlight" data-from="0" data-to="346" data-speed="1800">
                    <small>$</small>
                    <span class="counter" data-from="0" data-to="346" data-speed="1500">0</span>
                    <small class="counter-add">k</small>
                </h3>
                <p>Total Profit</p>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Yearly Visitors -->
        <div class="col-xs-12 col-md-6">
            <div class="with_border with_padding">
                <h4>Visitor Statistics</h4>
                <div class="canvas-chart-wrapper">
                    <canvas class="canvas-chart-line-yearly-visitors"></canvas>
                </div>
            </div>
        </div>
        <!-- .col-* -->
        <!-- Yearly Visitors -->
        <div class="col-xs-12 col-md-6">
            <div class="with_border with_padding">
                <h4>Visitor vs Sells</h4>
                <div class="canvas-chart-wrapper">
                    <canvas class="canvas-chart-line-visitors-sels"></canvas>
                </div>
            </div>
        </div>
    </div>
    <!-- .row -->
@stop

@section('footer')
    @push('scripts')
    <script type="text/javascript">
        var uri = "{{ url()->current() }}";
        var tgl_hariini = "{{ \Carbon\Carbon::now()->format('Y-m-d') }}";

    </script>
    @endpush
@stop