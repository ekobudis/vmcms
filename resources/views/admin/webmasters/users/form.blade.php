@if(!$user->id)
{!! Form::open(['id'=>'frm']) !!}
@else
{!! Form::model($user,['method'=>'put','id'=>'frm']) !!}
@endif
    <div class="modal-header">
        <h5 class="modal-title">{{!$user->id ? $title: $title }}</h5>
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
                        {{ Form::label('name','Name',['class'=>'control-label']) }}
                        {{ Form::text('name',null, ['id'=>'name', 'class'=>'form-control','placeholder'=>'Entry Name'] ) }}
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-6">
                        {{ Form::label('username','User Name',['class'=>'control-label']) }}
                        {{ Form::text('username',null, ['id'=>'username', 'class'=>'form-control','max'=>'10','placeholder'=>'Entry User Name'] ) }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-xs-6">
                        {{ Form::label('email','Email',['class'=>'control-label']) }}
                        {{ Form::email('email',null, ['id'=>'email', 'class'=>'form-control','placeholder'=>'Entry Email'] ) }}
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-6">
                        {{ Form::label('permission_id','Permission',['class'=>'control-label']) }}
                        {{ Form::select('permission_id' , \App\Helpers\Helper::getPermission() , $user->permission_id , ['class'=>'form-control select','placeholder' => 'Select Permission']) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"> Close</button>
        <button type="submit" class="btn btn-primary" id="btn-save" value="create">Send Invitation</button>
    </div>
{!! Form::close() !!}