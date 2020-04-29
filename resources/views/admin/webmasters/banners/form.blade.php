@if(!$banners->id)
{!! Form::open(['id'=>'frm']) !!}
@else
{!! Form::model($banners,['method'=>'put','id'=>'frm']) !!}
@endif
    <div class="modal-header">
        <h5 class="modal-title">{{!$banners->id ? $title: $title }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body" id="data-body">
        {{ Form::hidden('id', null , ['id'=>'id']) }}
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-xs-6">
                        {{ Form::label('banner_type','Banner Type',['class'=>'control-label']) }}
                        {{ Form::select('banner_type' , \App\Helpers\Helper::getBannerSectionType() , $banners->banner_type , ['class'=>'form-control select','placeholder' => 'Select Banner Type']) }}
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-6">
                        {{ Form::label('banner_name','Name',['class'=>'control-label']) }}
                        {{ Form::text('banner_name',null, ['id'=>'banner_name', 'class'=>'form-control','placeholder'=>'Entry Name'] ) }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-xs-6">
                        {{ Form::label('destination_folder','Folder Name Destination',['class'=>'control-label']) }}
                        {{ Form::text('destination_folder',null, ['id'=>'destination_folder', 'class'=>'form-control','placeholder'=>'Entry Destination Folder'] ) }}
                    </div>
                    <div class="col-sm-3 col-md-3 col-xs-3">
                        {{ Form::label('width','Image Width',['class'=>'control-label']) }}
                        {{ Form::number('width',null, ['id'=>'width', 'class'=>'form-control text-right','placeholder'=>'Entry Image Width'] ) }}
                    </div>
                    <div class="col-sm-3 col-md-3 col-xs-3">
                        {{ Form::label('height','Image Height',['class'=>'control-label']) }}
                        {{ Form::number('height',null, ['id'=>'height', 'class'=>'form-control text-right','placeholder'=>'Entry Image Height'] ) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"> Close</button>
        <button type="submit" class="btn btn-primary" id="btn-save" value="create">Save Changes</button>
    </div>
{!! Form::close() !!}

<script type="text/javascript">
    
</script>