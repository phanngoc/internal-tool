@extends ('layouts.master')

@section ('head.title')
{{trans('messages.configure')}}
@stop

@section ('body.content')
<link href="{{Asset('bootstrap/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
<script src="{{Asset('bootstrap/js/select2.min.js')}}" type="text/javascript"></script>
<script type="text/javascript">
  $(document).ready(function() {
        $(".add-configures").click(function(){
        /*$( ".box-body" ).insertAfter($('.form-group').last().append( "<hr><div class='form-group'><label for='name'>{{trans('messages.name')}} {{trans('messages.configure')}}</label><input type='text' name='name[]' class='form-control' id='name' required='true' autofocus /><label for='value'>{{trans('messages.configure_value')}}</label><input type='text' name='value[]' class='form-control' id='name' required='true' /></div>" );*/
        /*$( ".form-group" ).last().insertAfter( "<hr><div class='form-group'><label for='name'>{{trans('messages.name')}} {{trans('messages.configure')}}</label><input type='text' name='name[]' class='form-control' id='name' required='true' autofocus /><label for='value'>{{trans('messages.configure_value')}}</label><input type='text' name='value[]' class='form-control' id='name' required='true' /></div>" );*/
        $( ".form-group:last" ).after( "<hr><div class='form-group'><label for='name'>{{trans('messages.configure')}} {{trans('messages.name')}}</label><input type='text' name='name[]' class='form-control' id='name' required='true' autofocus /><label for='value'>{{trans('messages.configure_value')}}</label><input type='text' name='value[]' class='form-control' id='name' required='true' /></div>" );
        $(document).scrollTop($(document).height());
    });
  });
</script>
<!-- <input type='text' name='name[]' /><input type='text' name='value[]' /> -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{trans('messages.configure')}}
            <small>{{trans('messages.configure')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> {{trans('messages.dashboard')}}</a></li>
            <li><a href="{{ route('users.index') }}">{{trans('messages.configure')}}</a></li>
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
                    <div class="row">
                    <div class="col-sm-2" style="margin-left:1%;">
                     <a class="btn btn-success add-configures"><i class="fa fa-plus"> {{trans('messages.add_configure')}}</i></a>
                     <!-- <input type="button" class="btn btn-success add-configures" value="{{trans('messages.add_configure')}}"> -->
                    </div>
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
                    {!! Form::open([
                    'route'=>['configures.update'],
                    'method'=>'post',
                    'id'=>'form-admin-group'
                    ]) !!}
                    <div class="box-body">
                    @foreach($configures as $config)
                        <div class="form-group">
                            {!! Form::label('value', $config->name) !!}
                            {!! Form::text('value[]',$config->value,['class'=>'form-control','id'=>'name','required'=>'true']) !!}
                            {!! Form::hidden('name[]',$config->name) !!}
                        </div>
                    @endforeach()
                    <div class="box-footer">
                            <div class="row">

                                <div class="col-sm-4 col-sm-offset-4 text-center">
                                    <button type="submit" class="btn btn-primary">{{trans('messages.save')}}</button>
                                    <input type='reset' name='reset' id='reset' class="btn btn-danger" value="{{trans('messages.reset')}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
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