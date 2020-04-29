@if(!$social->id)
{!! Form::open(['id'=>'frm']) !!}
@else
{!! Form::model($social,['method'=>'put','id'=>'frm']) !!}
@endif
    <div class="modal-header">
        <h5 class="modal-title">{{!$social->id ? $title: $title }}</h5>
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
                        {{ Form::label('social_name','Name',['class'=>'control-label']) }}
                        {{ Form::text('social_name',null, ['id'=>'social_name', 'class'=>'form-control','placeholder'=>'Entry Social Media Name'] ) }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-xs-6">
                        {{ Form::label('social_uuid','Social Media Code UUID',['class'=>'control-label']) }}
                        {{ Form::text('social_uuid',null, ['id'=>'social_uuid', 'class'=>'form-control','placeholder'=>'Entry Social Media Code UUID'] ) }}
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-6">
                        {{ Form::label('social_codename','Social Media Code Name',['class'=>'control-label']) }}
                        {{ Form::text('social_codename',null, ['id'=>'social_codename', 'class'=>'form-control','placeholder'=>'Entry Social Media Code Name'] ) }}
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