@if(!$document->id)
{!! Form::open(['id'=>'frm','enctype'=>'multipart/form-data']) !!}
@else
{!! Form::model($document,['method'=>'put','id'=>'frm','enctype'=>'multipart/form-data']) !!}
@endif
    <div class="modal-header">
        <h5 class="modal-title">{{!$document->id ? $title: $title }}</h5>
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
                        {{ Form::label('document_id','Document Type',['class'=>'control-label']) }}
                        {{ Form::select('document_id' , \App\Helpers\Helper::getDocumentType() , $document->document_id , ['class'=>'form-control select','placeholder' => 'Select Document Type']) }}
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-6">
                        {{ Form::label('description','Name',['class'=>'control-label']) }}
                        {{ Form::text('description',null, ['id'=>'description', 'class'=>'form-control','placeholder'=>'Entry Document Description'] ) }}
                    </div>
                </div>
                <div class="form-group">
                    <label for="document_filename">Document File</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="document_filename" name="document_filename">
                            <label class="custom-file-label" for="document_filename">Choose file</label>
                        </div>
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