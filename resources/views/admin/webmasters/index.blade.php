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
            <div class="card card-primary card-outline card-outline-tabs">
                <div class="card-header p-0 border-bottom-0" id="dynamic-tabs">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="tabWebmasterTab" data-toggle="pill" href="#tabWebmaster" role="tab" aria-controls="tabWebmaster" aria-selected="true">Company Information</a>
                        </li>
                        @if($setting->id)
                        <li class="nav-item" id="tabWebmasterPageTab" data-source="" data-table="page-table">
                            <a class="nav-link" id="tabWebmasterPageTab" data-toggle="pill" href="#tabWebmasterPage" role="tab" aria-controls="tabWebmasterPage" aria-selected="false">Page Setting</a>
                        </li>
                        <li class="nav-item" id="tabWebmasterBannerTab" data-source="" data-table="banner-table">
                            <a class="nav-link" id="tabWebmasterBannerTab" data-toggle="pill" href="#tabWebmasterBanner" role="tab" aria-controls="tabWebmasterBanner" aria-selected="false">Slide Setting</a>
                        </li>
                        <li class="nav-item" id="tabWebmasterHoursTab" data-source="" data-table="workhour-table">
                            <a class="nav-link" id="tabWebmasterHoursTab" data-toggle="pill" href="#tabWebmasterHours" role="tab" aria-controls="tabWebmasterHours" aria-selected="false">Work Hours</a>
                        </li>
                        <li class="nav-item" id="tabWebmasterSocialsTab" data-source="" data-table="social-table">
                            <a class="nav-link" id="tabWebmasterSocialsTab" data-toggle="pill" href="#tabWebmasterSocials" role="tab" aria-controls="tabWebmasterSocials" aria-selected="false">Socials</a>
                        </li>
                        <li class="nav-item" id="tabWebmasterDocumentTab" data-source="" data-table="document-table">
                            <a class="nav-link" id="tabWebmasterDocumentTab" data-toggle="pill" href="#tabWebmasterDocument" role="tab" aria-controls="tabWebmasterDocument" aria-selected="false">Company Brochures</a>
                        </li>
                        @endif
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-four-tabContent">
                        <div class="tab-pane fade show active" id="tabWebmaster" role="tabpanel" aria-labelledby="tabWebmasterTab">
                            @if(!$setting)
                                {{ Form::model( $setting, ['url'=> 'admin/settings','enctype'=>'multipart/form-data']) }}
                            @else
                                {{ Form::model( $setting, ['method' => 'PATCH','url'=> ['admin/settings', $setting->id ],'enctype'=>'multipart/form-data']) }}
                            @endif
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            {{ Form::label('name','Company Name',['class'=>'control-label']) }}
                                            {{ Form::text('name', null, ['id'=>'name', 'class'=>'form-control form-control-sm','placeholder'=>'Enter Company Name']) }}
                                        </div>
                                        <div class="col-sm-3">
                                            {{ Form::label('email','Company Email',['class'=>'control-label']) }}
                                            {{ Form::email('email', null, ['id'=>'email', 'class'=>'form-control form-control-sm','placeholder'=>'Enter Company Email']) }}
                                        </div>
                                        <div class="col-sm-3">
                                            {{ Form::label('website','Site Name',['class'=>'control-label']) }}
                                            {{ Form::text('website', null, ['id'=>'website', 'class'=>'form-control form-control-sm','placeholder'=>'Enter Site Name']) }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            {{ Form::label('address','Company Address',['class'=>'control-label']) }}
                                            {{ Form::textarea('address', null, ['id'=>'address', 'class'=>'form-control form-control-sm','placeholder'=>'Address','rows'=> '7']) }}
                                        </div>
                                        <div class="col-sm-6">
                                            {{ Form::label('description','Description',['class'=>'control-label']) }}
                                            {{ Form::textarea('description', null, ['id'=>'description', 'class'=>'form-control form-control-sm textarea','placeholder'=>'Description','rows'=> '10']) }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            {{ Form::label('phone_no','Phone No',['class'=>'control-label']) }}
                                            {{ Form::text('phone_no', null, ['id'=>'phone_no', 'class'=>'form-control form-control-sm','placeholder'=>'Enter Phone No']) }}
                                        </div>
                                        <div class="col-sm-3">
                                            {{ Form::label('mobile_no','Mobile No',['class'=>'control-label']) }}
                                            {{ Form::text('mobile_no', null, ['id'=>'mobile_no', 'class'=>'form-control form-control-sm','placeholder'=>'Enter Mobile No']) }}
                                        </div>
                                        <div class="col-sm-3">
                                            {{ Form::label('latitude','Latitude',['class'=>'control-label']) }}
                                            {{ Form::text('latitude', null, ['id'=>'latitude', 'class'=>'form-control form-control-sm','placeholder'=>'Enter Latitude']) }}
                                        </div>
                                        <div class="col-sm-3">
                                            {{ Form::label('longitude','Longitude',['class'=>'control-label']) }}
                                            {{ Form::text('longitude', null, ['id'=>'longitude', 'class'=>'form-control form-control-sm','placeholder'=>'Enter Longitude']) }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            {{ Form::label('city','City',['class'=>'control-label']) }}
                                            {{ Form::text('city', null, ['id'=>'city', 'class'=>'form-control form-control-sm','placeholder'=>'Enter City']) }}
                                        </div>
                                        <div class="col-sm-3">
                                            {{ Form::label('state','State',['class'=>'control-label']) }}
                                            {{ Form::text('state', null, ['id'=>'state', 'class'=>'form-control form-control-sm','placeholder'=>'Enter State']) }}
                                        </div>
                                        <div class="col-sm-3">
                                            {{ Form::label('country','Country',['class'=>'control-label']) }}
                                            {{ Form::text('country', null, ['id'=>'country', 'class'=>'form-control form-control-sm','placeholder'=>'Enter Country']) }}
                                        </div>
                                        <div class="col-sm-2">
                                            {{ Form::label('postal_code','Postal Code',['class'=>'control-label']) }}
                                            {{ Form::text('postal_code', null, ['id'=>'postal_code', 'class'=>'form-control form-control-sm','placeholder'=>'Enter Postal Code']) }}
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            {{ Form::label('logo','Company Logo',['class'=>'control-label']) }}
                                            <input type="file" name="logo" id="logo" class="drop">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            {{ Form::close() }}
                        </div>
                        @if($setting->id)
                        <div class="tab-pane fade" id="tabWebmasterPage" role="tabpanel" aria-labelledby="tabWebmasterPageTab">
                            <div class="heading-elements">
                                <div class="text-left">
                                    <a href="#modalForm" data-href="{{ url()->current() }}/section/create" data-toggle="modal" class="btn btn-info"><i class="icon-plus3 text-white"></i> New Section</a>
                                </div>
                            </div>
                            <br>
                            <div class="table-responsive">
                                <table class="table mb-0 table-borderless table-hover mb-0 page-table">
                                    <thead>
                                        <tr>
                                            <th>Page Name</th>
                                            <th>Type</th>
                                            <th>Category</th>
					                        <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                      </thead>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tabWebmasterBanner" role="tabpanel" aria-labelledby="tabWebmasterBannerTab">
                            <div class="heading-elements">
                                <div class="text-left">
                                    <a href="#modalForm" data-href="{{ url()->current() }}/banner/create" data-toggle="modal" class="btn btn-info"><i class="icon-plus3 text-white"></i> New Banner</a>
                                </div>
                            </div>
                            <br>
                            <div class="table-responsive">
                                <table class="table mb-0 table-borderless table-hover mb-0 banner-table">
                                    <thead>
                                        <tr>
                                            <th>Description</th>
                                            <th>Size</th>
					                        <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                      </thead>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tabWebmasterHours" role="tabpanel" aria-labelledby="tabWebmasterHoursTab">
                            <div class="heading-elements">
                                <div class="text-left">
                                    <a href="#modalForm" data-href="{{ url()->current() }}/work-hours/create" data-toggle="modal" class="btn btn-info"><i class="icon-plus3 text-white"></i> New Work Hour</a>
                                </div>
                            </div>
                            <br>
                            <div class="table-responsive">
                                <table class="table mb-0 table-borderless table-hover mb-0 workhour-table">
                                    <thead>
                                        <tr>
                                            <th>Description</th>
					                        <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                      </thead>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tabWebmasterSocials" role="tabpanel" aria-labelledby="tabWebmasterSocialsTab">
                            <div class="heading-elements">
                                <div class="text-left">
                                    <a href="#modalForm" data-href="{{ url()->current() }}/social-media/create" data-toggle="modal" class="btn btn-info"><i class="icon-plus3 text-white"></i> New Account</a>
                                </div>
                            </div>
                            <br>
                            <div class="table-responsive">
                                <table class="table mb-0 table-borderless table-hover mb-0 sosmed-table">
                                    <thead>
                                        <tr>
                                            <th>Social Media Name</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                      </thead>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tabWebmasterDocument" role="tabpanel" aria-labelledby="tabWebmasterDocumentTab">
                            <div class="heading-elements">
                                <div class="text-left">
                                    <a href="#modalForm" data-href="{{ url()->current() }}/documents/create" data-toggle="modal" class="btn btn-info"><i class="icon-plus3 text-white"></i> New Document</a>
                                </div>
                            </div>
                            <br>
                            <div class="table-responsive">
                                <table class="table mb-0 table-borderless table-hover mb-0 document-table">
                                    <thead>
                                        <tr>
                                            <th>Document Name</th>
					                        <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                      </thead>
                                </table>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.partials.modals.template')
@stop

@section('footer')
    @push('scripts')
    {!! Menu::scripts() !!}
    <script src="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('js/vimajs.js') }}"></script>
    <script type="text/javascript">
        var uri = "{{ url()->current() }}";
        var tgl_hariini = "{{ \Carbon\Carbon::now()->format('Y-m-d') }}";
        var saveState = "{{ $save_state }}";

        $(function () {
            // Summernote
            $('.textarea').summernote()
        });
        $('.drop').dropify();

        if(saveState=='edit'){
            $('#tabWebmasterBannerTab a').on('shown.bs.tab', function(event){
                $('.banner-table').DataTable().destroy();
                getBanner();
            });

            $('#tabWebmasterPageTab a').on('shown.bs.tab', function(event){
                $('.page-table').DataTable().destroy();
                getPageSection();
            });

            $('#tabWebmasterHoursTab a').on('shown.bs.tab', function(event){
                $('.workhour-table').DataTable().destroy();
                getWorkHour();
            });

            $('#tabWebmasterSocialsTab a').on('shown.bs.tab', function(event){
                $('.sosmed-table').DataTable().destroy();
                getSocialMedia();
            });

            $('#tabWebmasterDocumentTab a').on('shown.bs.tab', function(event){
                $('.document-table').DataTable().destroy();
                getDocument();
            });

            function getBanner()
            {
                var uri_banner = "{{ route('admin.settings.banners',['id'=>$setting->id]) }}";
                //console.log(uri_banner);
                var tableBanner = $('.banner-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: uri_banner,
                    },
                    columns: [
                            {data: 'gabungan', name: 'gabungan'},
                            {data: 'size', name: 'size'},
                            {data: 'status', name: 'status',className:'text-center'},
                            {data: 'action', name: 'action',className:'text-center', orderable: false, searchable: false},
                        ],
                    order: [[0, 'asc']]
                });
            }

            function getPageSection()
            {
                var uri_section = "{{ route('admin.settings.section',['id'=>$setting->id]) }}";
                //console.log(uri_section);
                var tableSection = $('.page-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: uri_section,
                    },
                    columns: [
                            {data: 'gabungan', name: 'gabungan'},
                            {data: 'sectionType', name: 'sectionType'},
                            {data: 'sectionCategory', name: 'sectionCategory'},
                            {data: 'status', name: 'status',className:'text-center'},
                            {data: 'action', name: 'action',className:'text-center', orderable: false, searchable: false},
                        ],
                    order: [[0, 'asc']]
                });
            }

            function getWorkHour()
            {
                var uri_workHour = "{{ route('admin.settings.work-hours',['id'=>$setting->id]) }}";
                //console.log(uri_section);
                var tableSection = $('.workhour-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: uri_workHour,
                    },
                    columns: [
                            {data: 'gabungan', name: 'gabungan'},
                            {data: 'status', name: 'status',className:'text-center'},
                            {data: 'action', name: 'action',className:'text-center', orderable: false, searchable: false},
                        ],
                    order: [[0, 'asc']]
                });
            }

            function getSocialMedia()
            {
                var uri_sosmed = "{{ route('admin.settings.social-medias',['id'=>$setting->id]) }}";
                //console.log(uri_section);
                var tableSection = $('.sosmed-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: uri_sosmed,
                    },
                    columns: [
                            {data: 'gabungan', name: 'gabungan'},
                            {data: 'status', name: 'status',className:'text-center'},
                            {data: 'action', name: 'action',className:'text-center', orderable: false, searchable: false},
                        ],
                    order: [[0, 'asc']]
                });
            }

            function getDocument()
            {
                var uri_document = "{{ route('admin.settings.documents',['id'=>$setting->id]) }}";
                //console.log(uri_section);
                var tableSection = $('.document-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: uri_document,
                    },
                    columns: [
                            {data: 'gabungan', name: 'gabungan'},
                            {data: 'status', name: 'status',className:'text-center'},
                            {data: 'action', name: 'action',className:'text-center', orderable: false, searchable: false},
                        ],
                    order: [[0, 'asc']]
                });
            }
        }
        
    </script>
    @endpush
@stop
