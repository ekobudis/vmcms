@if(!$career->id)
{!! Form::open(['id'=>'frm']) !!}
@else
{!! Form::model($career,['method'=>'put','id'=>'frm']) !!}
@endif
    <div class="modal-header">
        <h5 class="modal-title">{{!$career->id ? $title: $title }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body" id="data-body">
        {{ Form::hidden('id', null , ['id'=>'id']) }}
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-xs-12">
                        {{ Form::label('position','Open Position',['class'=>'control-label']) }}
                        {{ Form::text('position',null, ['id'=>'position', 'class'=>'form-control','placeholder'=>'Entry Open Position'] ) }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-xs-12">
                        {{ Form::label('job_desc','Job Position',['class'=>'control-label']) }}
                        {{ Form::textarea('job_desc', null, ['id'=>'job_desc', 'class'=>'form-control textarea','placeholder'=>'Entry Job Position','rows'=> '20']) }}
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
    $('.textarea').summernote();
</script>   
