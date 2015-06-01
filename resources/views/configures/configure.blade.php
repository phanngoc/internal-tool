@extends ('layouts.master')

@section ('head.title')
{{trans('messages.configure')}}
@stop

@section ('body.content')
<link rel="stylesheet" href="{{Asset('dist/css/tabs.css')}}">
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <link href="{{Asset('bootstrap/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
        <script src="{{Asset('bootstrap/js/select2.min.js')}}" type="text/javascript"></script>
  <script>
  $(function() {
    $( "#tabs" ).tabs();
  });
  </script>
  <style type="text/css">

  </style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{trans('messages.configure')}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> {{trans('messages.dashboard')}}</a></li>
            <li class="active">{{trans('messages.configure')}}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-8 col-md-offset-2">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">{{trans('messages.configure')}}</h3>

                    </div>
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>{{trans('messages.whoop')}}</strong> {{trans('messages.problem')}}<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <!-- form start -->
                    <div class="box-body">
                    <div id="tabs">
  <ul>
    <li><a href="#tabs-site">Site</a></li>
    <li><a href="#tabs-database">Database</a></li>
    <li><a href="#tabs-system">System</a></li>
  </ul>
  <!-- From -->
  <form action="" method="post">
      <div id="tabs-site">
        <div class="form-group">
        {!! Form::label('name_system')!!}
        {!! Form::text('name_system',null,['id'=>'name_system','class'=>'form-control','placeholder'=>trans('messages.e_module_name'),'autofocus']) !!}
        </div>
        <div class="form-group">
        {!! Form::label('description')!!}
        {!! Form::text('description',null,['id'=>'description','class'=>'form-control','placeholder'=>trans('messages.e_module_name'),'autofocus']) !!}
        </div>
        <div class="form-group">
        {!! Form::label('site_offline')!!}
        {!! Form::checkbox('site_offline',null,['class'=>'form-control','checked'])!!}
        </div>
        <div class="form-group">
        {!! Form::label('offline_message')!!}
        {!! Form::textarea('offline_message',null,['rows'=>'2','cols'=>'40','id'=>'description','class'=>'form-control','placeholder'=>trans('messages.e_module_name'),'autofocus']) !!}
        </div>
      </div>
      <div id="tabs-database">
        <div class="form-group">
        {!! Form::label('type_database', trans('messages.type_database')) !!}
        {!! Form::select('type_database',array('mysql'=>'mysql','pgsql'=>'pgsql','sqlsrv'=>'sqlsrv'),null, ['class'=>'js-example-basic-multiple form-control','required'=>'true']) !!}
        </div>
        <div class="form-group">
        {!! Form::label('host', trans('messages.host'))!!}
        {!! Form::text('host',null,['id'=>'description','class'=>'form-control','placeholder'=>trans('messages.e_module_name'),'autofocus']) !!}
        </div>
        <div class="form-group">
        {!! Form::label('name_database')!!}
        {!! Form::text('name_database',null,['id'=>'name_system','class'=>'form-control','placeholder'=>trans('messages.e_module_name'),'autofocus']) !!}
        </div>
        <div class="form-group">
        {!! Form::label('username_database')!!}
        {!! Form::text('username_database',null,['id'=>'description','class'=>'form-control','placeholder'=>trans('messages.e_module_name'),'autofocus']) !!}
        </div>
        <div class="form-group">
        {!! Form::label('password_database')!!}
        {!! Form::text('password_database',null,['id'=>'description','class'=>'form-control','placeholder'=>trans('messages.e_module_name'),'autofocus']) !!}
        </div>
      </div>
      <div id="tabs-system">
        <div class="form-group">
        {!! Form::label('url')!!}
        {!! Form::text('url',null,['id'=>'name_system','class'=>'form-control','placeholder'=>trans('messages.e_module_name'),'autofocus']) !!}
        </div>
        <div class="form-group">
        {!! Form::label('time_zone')!!}
        {!! Form::text('time_zone',null,['id'=>'description','class'=>'form-control','placeholder'=>trans('messages.e_module_name'),'autofocus']) !!}
        </div>
        <div class="form-group">
        {!! Form::label('expire_on_close')!!}
        {!! Form::checkbox('site_offline',null,['class'=>'form-control'])!!}
        </div>
        <div class="form-group">
        {!! Form::label('session_lifetime')!!}
        {!! Form::text('session_lifetime',null,['id'=>'description','class'=>'form-control','placeholder'=>trans('messages.e_module_name'),'autofocus']) !!}
        </div>
      </div>
  </form>
</div>
</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@stop