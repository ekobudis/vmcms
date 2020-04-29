@if(!$client->id)
{!! Form::open(['id'=>'frm','enctype'=>'multipart/form-data']) !!}
@else
{!! Form::model($client,['method'=>'put','id'=>'frm','enctype'=>'multipart/form-data']) !!}
@endif
    <div class="modal-header">
        <h5 class="modal-title">{{!$client->id ? $title: $title }}</h5>
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
                        {{ Form::label('name','Client Name',['class'=>'control-label']) }}
                        {{ Form::text('name',null, ['id'=>'name', 'class'=>'form-control','placeholder'=>'Entry Client Name'] ) }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-xs-12">
                        {{ Form::label('address','Address',['class'=>'control-label']) }}
                        {{ Form::textarea('address',null, ['id'=>'address', 'class'=>'form-control','rows'=>'3','placeholder'=>'Entry Address'] ) }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-xs-6">
                        {{ Form::label('phone_no','Client Phone',['class'=>'control-label']) }}
                        {{ Form::text('phone_no',null, ['id'=>'phone_no', 'class'=>'form-control','placeholder'=>'Entry Client Phone'] ) }}
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-6">
                        {{ Form::label('city','Client City',['class'=>'control-label']) }}
                        {{ Form::text('city',null, ['id'=>'city', 'class'=>'form-control','placeholder'=>'Entry Client City'] ) }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-xs-6">
                        {{ Form::label('website','Client Website',['class'=>'control-label']) }}
                        {{ Form::text('website',null, ['id'=>'website', 'class'=>'form-control','placeholder'=>'Entry Client Website'] ) }}
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-6">
                        {{ Form::label('email','Client Email',['class'=>'control-label']) }}
                        {{ Form::email('email',null, ['id'=>'email', 'class'=>'form-control','placeholder'=>'Entry Client Email'] ) }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {{ Form::label('logo','Client Logo',['class'=>'control-label']) }}
                        <input type="file" name="image_upload" id="image_upload" class="drop">
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
    $('.drop').dropify();
</script>   