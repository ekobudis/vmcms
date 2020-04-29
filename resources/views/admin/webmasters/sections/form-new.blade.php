@if(!$section->id)
{!! Form::open(['id'=>'frm']) !!}
@else
{!! Form::model($section,['method'=>'put','id'=>'frm']) !!}
@endif
    <div class="modal-header">
        <h5 class="modal-title">{{!$section->id ? $title: $title }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body" id="data-body">
        {{ Form::hidden('webmaster_id', $setting->id , ['id'=>'webmaster_id']) }}
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-xs-6">
                        {{ Form::label('menu_item_id','Menu Name',['class'=>'control-label']) }}
                        {{ Form::select('menu_item_id' , \App\Helpers\Helper::getMenus() , $section->menu_item_id , ['class'=>'form-control select','placeholder' => 'Select Menu']) }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-xs-12">
                        {{ Form::label('section_description','Description',['class'=>'control-label']) }}
                        {{ Form::textarea('section_description',null, ['id'=>'section_description', 'class'=>'form-control','placeholder'=>'Entry Description','rows'=> '3'] ) }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-xs-6">
                        {{ Form::label('section_type','Section Type',['class'=>'control-label']) }}
                        {{ Form::select('section_type' , \App\Helpers\Helper::getSiteSectionType() , $section->section_type , ['class'=>'form-control select','placeholder' => 'Select Section Type']) }}
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-6">
                        {{ Form::label('section_category','Page Category',['class'=>'control-label']) }}
                        {{ Form::select('section_category' , \App\Helpers\Helper::getSiteCategoryType() , $section->section_category , ['class'=>'form-control select','placeholder' => 'Select Page Category']) }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-xs-6">
                        {{ Form::label('icon_name','Icon Name',['class'=>'control-label']) }}
                        {{ Form::text('icon_name',null, ['id'=>'icon_name', 'class'=>'form-control','placeholder'=>'Entry Icon Name'] ) }}
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