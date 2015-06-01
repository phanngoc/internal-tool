<div class="form-group">
{!! Form::label('url')!!}
{!! Form::text('url',null,['id'=>'name_system','class'=>'form-control','placeholder'=>trans('messages.e_module_name'),'autofocus']) !!}
{!! Form::label('time_zone')!!}
{!! Form::text('time_zone',null,['id'=>'description','class'=>'form-control','placeholder'=>trans('messages.e_module_name'),'autofocus']) !!}
{!! Form::label('session_lifetime')!!}
{!! Form::text('session_lifetime',null,['id'=>'description','class'=>'form-control','placeholder'=>trans('messages.e_module_name'),'autofocus']) !!}
{!! Form::label('expire_on_close')!!}
<div class="onoffswitch">
    <input type="checkbox" name="expire_on_close" class="onoffswitch-checkbox" id="myonoffswitch" checked>
    <label class="onoffswitch-label" for="myonoffswitch">
        <span class="onoffswitch-inner"></span>
        <span class="onoffswitch-switch"></span>
    </label>
</div>
</div>