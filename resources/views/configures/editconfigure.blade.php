@extends ('layouts.master')

@section ('head.title')
{{trans('messages.edit_configure')}}
@stop

@section ('body.content')
<link href="{{Asset('bootstrap/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
<script src="{{Asset('bootstrap/js/select2.min.js')}}" type="text/javascript"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{trans('messages.configure')}}
            <small>{{trans('messages.edit_configure')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> {{trans('messages.dashboard')}}</a></li>
            <li><a href="{{ route('users.index') }}">{{trans('messages.configure')}}</a></li>
            <li class="active">{{trans('messages.edit_configure')}}</li>
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
                        <h3 class="box-title">{{trans('messages.edit_configure')}}</h3>
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
                    {!! Form::model($configures, array('method' => 'PUT', 'route' => array('configures.update', $configures->id), 'class'=>'edit')) !!}
                    <div class="box-body">
                        <div class="form-group">
                            {!! Form::label('name', trans('messages.name')) !!}
                            {!! Form::text('name',null,['class'=>'form-control','id'=>'name','required'=>'true','disabled']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('value', trans('messages.configure_value')) !!}
                            @if(isset($languages))
                                <select name="value" class="js-example-basic-multiple form-control" autofocus>
                                    @foreach($languages as $language)

                                        @if($language->language_name==$configures->value)
                                            <option value="{{$language->code}}" selected>{{$language->language_name}}</option>
                                            @else
                                            <option value="{{$language->code}}">{{$language->language_name}}</option>
                                        @endif
                                    @endforeach()

                               </select>
                            @else
                                {!! Form::text('value',null,['class'=>'form-control','required'=>'true','autofocus']) !!}
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', trans('messages.description')) !!}
                            {!! Form::text('description',null,['class'=>'form-control']) !!}
                        </div>
                        <div class="box-footer center">
                            <div class="row">
                                <div class="col-sm-4 col-sm-offset-4 text-center">
                                    <button type="submit" class="btn btn-primary">{{trans('messages.edit')}}</button>
                                    <input type='button' name='cancel' id='cancel' class="btn btn-danger" value="{{trans('messages.cancel')}}">
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
$(".js-example-basic-multiple").select2({placeholder: "Select a state"});
    </script>
    @if(!isset($languages))
    <script>
        $(".edit").validate({
            rules: {
                value: {
                    minlength: 2
                },
            },
            messages: {
                name: {
                    required: "{{trans('messages.fail_value')}}",
                    minlength: "{{trans('messages.fail_value',['number'=>'2'])}}"
                },
            }
        });
    </script>
    @endif
</div>
@stop