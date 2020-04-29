@if(!$permission->id)
{!! Form::open(['id'=>'frm']) !!}
@else
{!! Form::model($permission,['method'=>'put','id'=>'frm']) !!}
@endif
    <div class="modal-header">
        <h5 class="modal-title">{{!$permission->id ? $title: $title }}</h5>
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
                        {{ Form::label('name','Permission Name',['class'=>'control-label']) }}
                        {{ Form::text('name',null, ['id'=>'name', 'class'=>'form-control','placeholder'=>'Entry Permission Name'] ) }}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12">
                        <label class="display-block text-semibold">Active Apps</label>
                        <label class="checkbox-inline">
                        @if(!$permission->banner_status)
                        <input type="checkbox" class="styled" name="banner_status"  > Ad. Banners
                        @else
                        <input type="checkbox" class="styled" checked="true" name="banner_status"  > Ad. Banners
                        @endif
                        </label>
                        <label class="checkbox-inline">
                        @if(!$permission->setting_status)
                        <input type="checkbox" class="styled" name="setting_status"> User
                        @else
                        <input type="checkbox" class="styled" checked="true" name="setting_status"> User
                        @endif
                        </label>
                        <label class="checkbox-inline">
                        @if(!$permission->webmaster_status)
                        <input type="checkbox" class="styled" name="webmaster_status"> Webmaster
                        @else
                        <input type="checkbox" class="styled" checked="true" name="webmaster_status"> Webmaster
                        @endif
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12">
                        <label class="display-block text-semibold">Site Access</label><br>
                        @foreach($pageAccess as $menu_back)
                        <label class="checkbox-inline">
                            @if(!$permission->data)
                                <input type="checkbox" class="styled" name="data[]" value="{{ $menu_back->id }}" >
                            @else
                                <input type="checkbox" class="styled" checked="true" name="data[]" value="{{ $menu_back->id }}" >
                            @endif
                            {{ ucfirst(preg_replace('/[A-Z]/', ' $0', $menu_back->label)) }}
                        </label>
                        @endforeach
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-3">
                        <label class="display-block text-semibold">ADD Permission</label>
                        @if(!$permission->add)
                        <label class="radio-inline">
                            <input type="radio" class="styled" name="add" value="1" >
                            Yes
                        </label>
                        <label class="radio-inline">
                            <input type="radio" class="styled" checked="true" name="add" value="0" >
                            No
                        </label>
                        @else
                        <label class="radio-inline">
                            <input type="radio" class="styled" checked="true" name="add" value="1" >
                            Yes
                        </label>
                        <label class="radio-inline">
                            <input type="radio" class="styled" name="add" value="0" >
                            No
                        </label>
                        @endif
                    </div>
                    <div class="form-group col-sm-3">
                        <label class="display-block text-semibold">EDIT Permission</label>
                        @if(!$permission->edit)
                        <label class="radio-inline">
                            <input type="radio" class="styled" name="edit" value="1" >
                            Yes
                        </label>
                        <label class="radio-inline">
                            <input type="radio" class="styled" checked="true" name="edit" value="0" >
                            No
                        </label>
                        @else
                        <label class="radio-inline">
                            <input type="radio" class="styled" checked="true" name="edit" value="1" >
                            Yes
                        </label>
                        <label class="radio-inline">
                            <input type="radio" class="styled" name="edit" value="0" >
                            No
                        </label>
                        @endif
                    </div>
                    <div class="form-group col-sm-3">
                        <label class="display-block text-semibold">DELETE Permission</label>
                        @if(!$permission->delete)
                        <label class="radio-inline">
                            <input type="radio" class="styled" name="delete" value="1" >
                            Yes
                        </label>
                        <label class="radio-inline">
                            <input type="radio" class="styled" checked="true" name="delete" value="0" >
                            No
                        </label>
                        @else
                        <label class="radio-inline">
                            <input type="radio" class="styled" checked="true" name="delete" value="1" >
                            Yes
                        </label>
                        <label class="radio-inline">
                            <input type="radio" class="styled" name="delete" value="0" >
                            No
                        </label>
                        @endif
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