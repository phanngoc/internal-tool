<link href="{{Asset('bootstrap/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
<script src="{{Asset('bootstrap/js/select2.min.js')}}" type="text/javascript"></script>
<div class="form-group">
{!! Form::label('type_database Type', trans('messages.lb_groups')) !!}
{!! Form::select('type_database',array('mysql'=>'mysql','pgsql'=>'pgsql','sqlsrv'=>'sqlsrv'),null, ['class'=>'js-example-basic-multiple form-control','required'=>'true']) !!}
{!! Form::label('host')!!}
{!! Form::text('host',null,['id'=>'description','class'=>'form-control','placeholder'=>trans('messages.e_module_name'),'autofocus']) !!}
{!! Form::label('name_database')!!}
{!! Form::text('name_database',null,['id'=>'name_system','class'=>'form-control','placeholder'=>trans('messages.e_module_name'),'autofocus']) !!}
{!! Form::label('database_username')!!}
{!! Form::text('database_username',null,['id'=>'description','class'=>'form-control','placeholder'=>trans('messages.e_module_name'),'autofocus']) !!}
{!! Form::label('database_password')!!}
{!! Form::text('database_password',null,['id'=>'description','class'=>'form-control','placeholder'=>trans('messages.e_module_name'),'autofocus']) !!}
</div>