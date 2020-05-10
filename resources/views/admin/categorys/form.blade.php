@if(!$category->id)
{!! Form::open(['id'=>'frm']) !!}
@else
{!! Form::model($category,['method'=>'put','id'=>'frm']) !!}
@endif
    <div class="modal-header">
        <h5 class="modal-title">{{!$category->id ? $title: $title }}</h5>
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
                        {{ Form::label('name','Category Name',['class'=>'control-label']) }}
                        {{ Form::text('name',null, ['id'=>'name', 'class'=>'form-control','placeholder'=>'Entry Name'] ) }}
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-6">
                        {{ Form::label('icon','Icon Name',['class'=>'control-label']) }}
                        {{ Form::text('icon',null, ['id'=>'icon', 'class'=>'form-control','placeholder'=>'Entry Flaticon Name'] ) }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-xs-12">
                        {{ Form::label('description','Category Description',['class'=>'control-label']) }}
                        {{ Form::textarea('description',null, ['id'=>'description', 'class'=>'form-control','rows'=>'3','placeholder'=>'Entry Description'] ) }}
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