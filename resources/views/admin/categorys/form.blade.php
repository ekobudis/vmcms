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
                        {{ Form::label('webmaster_section_id','Category Type',['class'=>'control-label']) }}
                        {{ Form::select('webmaster_section_id' , \App\Helpers\Helper::getMenuCategory() , $category->webmaster_section_id , ['class'=>'form-control select','placeholder' => 'Select Category Type']) }}
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-6">
                        {{ Form::label('name','Category Name',['class'=>'control-label']) }}
                        {{ Form::text('name',null, ['id'=>'name', 'class'=>'form-control','placeholder'=>'Entry Name'] ) }}
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