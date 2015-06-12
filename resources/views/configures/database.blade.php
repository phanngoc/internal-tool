<div class="form-group">
{!! Form::label('database_type', trans('messages.type_database')) !!}
{!! Form::select('database_type',array('mysql'=>'mysql','pgsql'=>'pgsql','sqlsrv'=>'sqlsrv'),array(Config::get('database.default')), ['class'=>'js-example-basic-multiple form-control','required'=>'true']) !!}
</div>
<div class="form-group">
    {{--*/ $host = Config::get('database.default') /*--}}
{!! Form::label('host', trans('messages.host'))!!}
{!! Form::text('host',Config::get("database.connections.$host.host"),['class'=>'form-control','placeholder'=>trans('messages.e_module_name'),'autofocus']) !!}
</div>
<div class="form-group">
{!! Form::label('name_database',trans('messages.name_database'))!!}
{!! Form::text('name_database',Config::get("database.connections.$host.database"),['id'=>'name_system','class'=>'form-control','placeholder'=>trans('messages.e_module_name')]) !!}
</div>
<div class="form-group">
{!! Form::label('username_database',trans('messages.username_database'))!!}
{!! Form::text('username_database',Config::get("database.connections.$host.username"),['class'=>'form-control','placeholder'=>trans('messages.e_module_name')]) !!}
</div>
<div class="form-group">
{!! Form::label('password_database',trans('messages.password_database'))!!}
{!! Form::input('password','password_database',Config::get("database.connections.$host.password"),['class'=>'form-control']) !!}

</div>