@extends('admin.layouts.master')

@section('head')
    @include('admin.layouts.head')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dropify.min.css') }}">
@stop

@section('content')
    <div class="row">    
        <div class="col-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="heading-elements">
                        <div class="text-left">
                            <a href="#modalForm" data-href="{{ url()->current() }}/{{ $setting->id }}/create" data-toggle="modal" class="btn btn-info"><i class="icon-plus3 text-white"></i> New Client</a>
                        </div>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table class="table mb-0 table-borderless table-hover mb-0 slide-table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Logo</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                              </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.partials.modals.template')
@stop

@section('footer')
    @push('scripts')
    <script src="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('js/vimajs.js') }}"></script>
    <script type="text/javascript">
        var uri = "{{ url()->current() }}";
        var tgl_hariini = "{{ \Carbon\Carbon::now()->format('Y-m-d') }}";
        var saveState = "{{ $save_state }}";

        if(saveState==''){
            var tableBanner = $('.slide-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: uri,
                },
                columns: [
                        {data: 'gabungan', name: 'gabungan'},
                        {data: 'phone_no', name: 'phone_no'},
                        {data: 'preview', name: 'preview'},
                        {data: 'status', name: 'status',className:'text-center'},
                        {data: 'action', name: 'action',className:'text-center', orderable: false, searchable: false},
                    ],
                order: [[0, 'asc']]
            });
        }else{
            $('.drop').dropify();
            $('#classCategoriID').hide();

            $('#section_id').on('change',function(){
                var catID = $('#section_id').val();
                if(catID!=''){
                    $('#classCategoriID').show();
                }else{
                    $('#classCategoriID').hide();
                }
            });
        }
    </script>
    @endpush
@stop
