@if(!$workHour->id)
{!! Form::open(['id'=>'frm']) !!}
@else
{!! Form::model($workHour,['method'=>'put','id'=>'frm']) !!}
@endif
    <div class="modal-header">
        <h5 class="modal-title">{{!$workHour->id ? $title: $title }}</h5>
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
                        {{ Form::label('hour_name','Name',['class'=>'control-label']) }}
                        {{ Form::text('hour_name',null, ['id'=>'hour_name', 'class'=>'form-control','placeholder'=>'Entry Work Day Name'] ) }}
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-6">
                        {{ Form::label('hour_desc','Work Hour Start / Finish',['class'=>'control-label']) }}
                        {{ Form::text('hour_desc',null, ['id'=>'hour_desc', 'class'=>'form-control','placeholder'=>'Entry Work Hour'] ) }}
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