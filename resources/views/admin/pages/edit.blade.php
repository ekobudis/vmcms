<div class="card card-primary card-outline card-outline-tabs">
    <div class="card-header p-0 border-bottom-0" id="dynamic-tabs">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item" id="tabPageTab" >
                <a class="nav-link active" id="tabPageTab" data-toggle="pill" href="#tabPage" role="tab" aria-controls="tabPage" aria-selected="true">Post Information</a>
            </li>
            <li class="nav-item" id="tabImageTab" data-source="" data-table="page-table">
                <a class="nav-link" id="tabImageTab" data-toggle="pill" href="#tabImage" role="tab" aria-controls="tabImage" aria-selected="false">Image Preview</a>
            </li>
        </ul>
    </div>
    @if(!$pages->id)
        {{ Form::model( $pages, ['url'=> 'admin/pages','enctype'=>'multipart/form-data']) }}
    @else
        {{ Form::model( $pages, ['method' => 'PATCH','url'=> ['admin/pages', $pages->id ],'enctype'=>'multipart/form-data']) }}
    @endif
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-four-tabContent">
                <div class="tab-pane fade show active" id="tabPage" role="tabpanel" aria-labelledby="tabPageTab">
                    <div class="row">
                        <div class="col-sm-6">
                            {{ Form::label('menu_item_id','Post Content',['class'=>'control-label']) }}
                            {{ Form::select('menu_item_id' , \App\Helpers\Helper::getPostMenus() , $pages->menu_item_id , ['class'=>'form-control form-control-sm select','id'=>'menu_item_id','placeholder' => 'Select Post Content']) }}
                        </div>
                        <div class="col-sm-3">
                            {{ Form::label('webmaster_banner_id','Image Size Type',['class'=>'control-label']) }}
                            {{ Form::select('webmaster_banner_id' , \App\Helpers\Helper::getBannerType() , $pages->webmaster_banner_id , ['class'=>'form-control form-control-sm select','id'=>'menu_item_id','placeholder' => 'Select Post Content']) }}
                        </div>
                        <div class="col-sm-3" id="homeID">
                            {{ Form::label('section_id','Post Category',['class'=>'control-label']) }}
                            <select name="section_id" id="section_id" class="form-control form-control-sm select" placeholder="Select Category Menu">
                                <option value="0">Select Category Menu</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            {{ Form::label('title','Title',['class'=>'control-label']) }}
                            {{ Form::text('title', null, ['id'=>'title', 'class'=>'form-control form-control-sm','placeholder'=>'Enter Title']) }}
                        </div>
                        <div class="col-sm-6" id="secTitle">
                            {{ Form::label('title_2','Second Title',['class'=>'control-label']) }}
                            {{ Form::text('title_2', null, ['id'=>'title_2', 'class'=>'form-control form-control-sm','placeholder'=>'Enter Second Title']) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            {{ Form::label('banner_description','Description',['class'=>'control-label']) }}
                            {{ Form::textarea('banner_description', null, ['id'=>'banner_description', 'class'=>'form-control form-control-sm textarea','placeholder'=>'Description','rows'=> '20','style'=>'height:300px;']) }}
                        </div>
                        <div class="col-sm-6">
                            {{ Form::label('banner_abstract','Abstrat',['class'=>'control-label']) }}
                            {{ Form::textarea('banner_abstract', null, ['id'=>'banner_abstract', 'class'=>'form-control form-control-sm textarea','placeholder'=>'Abstrat','rows'=> '20','style'=>'height:300px;']) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            {{ Form::label('banner_meta','Meta',['class'=>'control-label']) }}
                            {{ Form::text('banner_meta', null, ['id'=>'banner_meta', 'class'=>'form-control form-control-sm','placeholder'=>'Enter Meta']) }}
                        </div>
                        <div class="col-sm-6">
                            {{ Form::label('banner_meta_description','Meta Description',['class'=>'control-label']) }}
                            {{ Form::text('banner_meta_description', null, ['id'=>'banner_meta_description', 'class'=>'form-control form-control-sm','placeholder'=>'Enter Meta Description']) }}
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tabImage" role="tabpanel" aria-labelledby="tabImageTab">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="file" name="image_upload" id="image_upload" class="drop">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    {{ Form::close() }}
</div>