<div class="form-group">
{!! Form::label('system_name')!!}
{!! Form::text('system_name',Config::get('app.system_name'),['id'=>'name_system','class'=>'form-control','placeholder'=>trans('messages.e_module_name'),'autofocus']) !!}
</div>
<div class="form-group">
{!! Form::label('description')!!}
{!! Form::text('description',Config::get('app.system_description'),['id'=>'description','class'=>'form-control','placeholder'=>trans('messages.e_module_name'),'autofocus']) !!}
</div>
<!-- <div class="form-group">
{!! Form::label('site_offline')!!}
{!! Form::checkbox('site_offline',Config::get('app.site_offline'),['class'=>'form-control'])!!}
</div>
<div class="form-group">
{!! Form::label('offline_message')!!}
{!! Form::textarea('offline_message',Config::get('app.offline_message'),['rows'=>'2','cols'=>'40','id'=>'description','class'=>'form-control','placeholder'=>trans('messages.e_module_name'),'autofocus']) !!}
</div> -->

<div class="form-group">
{!! Form::label('url')!!}
{!! Form::text('url',Config::get('app.url'),['class'=>'form-control','placeholder'=>trans('messages.e_module_name'),'autofocus']) !!}
</div>
<div class="form-group">
{!! Form::label('time_zone')!!}
{!! Form::text('time_zone',Config::get('app.timezone'),['class'=>'form-control','placeholder'=>trans('messages.e_module_name'),'autofocus']) !!}
</div>
<div class="form-group">
{!! Form::label('debug',trans('messages.debug_app'))!!}
@if(Config::get('app.debug')=='true')
{!! Form::checkbox('debug','','true',['class'=>''])!!}
@else
{!! Form::checkbox('debug','','',['class'=>''])!!}
@endif
</div>
<!-- <div class="form-group">
{!! Form::label('expire_on_close')!!}
{!! Form::checkbox('site_offline',null,['class'=>'form-control'])!!}
</div>
<div class="form-group">
{!! Form::label('session_lifetime')!!}
{!! Form::text('session_lifetime',Config::get('app/'),['id'=>'description','class'=>'form-control','placeholder'=>trans('messages.e_module_name'),'autofocus']) !!}
</div> -->
