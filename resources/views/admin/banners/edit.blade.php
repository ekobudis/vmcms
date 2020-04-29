<div class="card card-primary card-outline card-outline-tabs">
    <div class="card-header p-0 border-bottom-0" id="dynamic-tabs">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item" id="tabBannerTab" >
                <a class="nav-link active" id="tabBannerTab" data-toggle="pill" href="#tabBanner" role="tab" aria-controls="tabWebmaster" aria-selected="true">Slide Information</a>
            </li>
            <li class="nav-item" id="tabImageTab" data-source="" data-table="page-table">
                <a class="nav-link" id="tabImageTab" data-toggle="pill" href="#tabImage" role="tab" aria-controls="tabWebmasterPage" aria-selected="false">Image Preview</a>
            </li>
        </ul>
    </div>
    @if(!$banner->id)
        {{ Form::model( $banner, ['url'=> 'admin/images','enctype'=>'multipart/form-data']) }}
    @else
        {{ Form::model( $banner, ['method' => 'PATCH','url'=> ['admin/images', $banner->id ],'enctype'=>'multipart/form-data']) }}
    @endif
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-four-tabContent">
                <div class="tab-pane fade show active" id="tabBanner" role="tabpanel" aria-labelledby="tabBannerTab">
                    <div class="row">
                        <div class="col-sm-6">
                            {{ Form::label('webmaster_banner_id','Banner Type',['class'=>'control-label']) }}
                            {{ Form::select('webmaster_banner_id' , \App\Helpers\Helper::getBannerType() , $banner->webmaster_banner_id , ['class'=>'form-control form-control-sm select','placeholder' => 'Select Banner Type']) }}
                        </div>
                        <div class="col-sm-6">
                            {{ Form::label('section_id','Post Category',['class'=>'control-label']) }}
                            {{ Form::select('section_id' , \App\Helpers\Helper::getMenuCategory() , $banner->section_id , ['class'=>'form-control form-control-sm select','placeholder' => 'Select Category']) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            {{ Form::label('banner_subtitle','Sub Title',['class'=>'control-label']) }}
                            {{ Form::text('banner_subtitle', null, ['id'=>'banner_subtitle', 'class'=>'form-control form-control-sm','placeholder'=>'Enter Sub Title']) }}
                        </div>
                        <div class="col-sm-6">
                            {{ Form::label('banner_title','Title',['class'=>'control-label']) }}
                            {{ Form::text('banner_title', null, ['id'=>'banner_title', 'class'=>'form-control form-control-sm','placeholder'=>'Enter Title']) }}
                        </div>
                    </div>
                    @if($banner->section_id!=0)
                    <div class="row">
                        <div class="col-sm-2">
                            {{ Form::label('title_class','Class Title',['class'=>'control-label']) }}
                            {{ Form::select('title_class' , \App\Helpers\Helper::getTitleClass() , $banner->title_class , ['class'=>'form-control form-control-sm select','placeholder' => 'Select Class Title']) }}
                        </div>
                        <div class="col-sm-2">
                            {{ Form::label('data_delay','Delay Image',['class'=>'control-label']) }}
                            {{ Form::number('data_delay', null, ['id'=>'data_delay','step'=>'any','class'=>'form-control form-control-sm']) }}
                        </div>
                        <div class="col-sm-3">
                            {{ Form::label('data_class','Class for Delay',['class'=>'control-label']) }}
                            {{ Form::select('data_class' , \App\Helpers\Helper::getDataClass() , $banner->data_class , ['class'=>'form-control form-control-sm select','placeholder' => 'Select Class Delay']) }}
                        </div>
                    </div>
                    @else
                    <div class="row" id="classCategoriID">
                        <div class="col-sm-2">
                            {{ Form::label('title_class','Class Title',['class'=>'control-label']) }}
                            {{ Form::select('title_class' , \App\Helpers\Helper::getTitleClass() , $banner->title_class , ['class'=>'form-control form-control-sm select','placeholder' => 'Select Class Title']) }}
                        </div>
                        <div class="col-sm-2">
                            {{ Form::label('data_delay','Delay Image',['class'=>'control-label']) }}
                            {{ Form::number('data_delay', null, ['id'=>'data_delay','step'=>'any','class'=>'form-control form-control-sm']) }}
                        </div>
                        <div class="col-sm-3">
                            {{ Form::label('data_class','Class for Delay',['class'=>'control-label']) }}
                            {{ Form::select('data_class' , \App\Helpers\Helper::getDataClass() , $banner->data_class , ['class'=>'form-control form-control-sm select','placeholder' => 'Select Class Delay']) }}
                        </div>
                    </div>
                    @endif
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
                        <div class="col-sm-12">
                            {{ Form::label('page_content','Page Content',['class'=>'control-label']) }}
                            {{ Form::textarea('page_content', null, ['id'=>'page_content', 'class'=>'form-control form-control-sm textarea','placeholder'=>'Description','rows'=> '120','style'=>'height:600px;']) }}
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