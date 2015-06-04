@extends('layouts.master')
@section ('head.title')
{{trans('messages.add_module')}}
@stop

@section('body.content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            {{trans('messages.module_management')}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> {{trans('messages.dashboard')}}</a></li>
            <li><a href="{{ route('modules.index') }}">{{trans('messages.module')}}</a></li>
            <li class="active">{{trans('messages.add_module')}}</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">{{trans('messages.add_module')}}</h3>
                        <a class="btn btn-primary pull-right" href="{!!route('modules.index') !!}">{{trans('messages.list_module')}}</i></a>
                    </div>
                    <!-- form start -->
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
                    {!! Form::open([
                    'route'=>['modules.store'],
                    'method'=>'POST',
                    'id'=>'form-admin-module'
                    ]) !!}
                    <div class="box-body">
                        <!-- text input -->
                        <div class="form-group">
                            <label>{{trans('messages.name')}}:*</label>
                            {!! Form::text('name',null,['id'=>'name','class'=>'form-control','placeholder'=>trans('messages.e_module_name'),'autofocus']) !!}
                        </div>

                        <!-- textarea -->
                        <div class="form-group">
                            <label>{{trans('messages.description')}}</label>
                            <textarea class="form-control" rows="3" placeholder="{{trans('messages.e_description')}}" name="description"></textarea>
                        </div>

                        <div class="form-group">
                            <label>{{trans('messages.version')}}:*</label>
                            {!! Form::text('version',null,['id'=>'version','class'=>'form-control','placeholder'=>trans('messages.e_version'),'autofocus']) !!}
                        </div>
                    </div>
                    <div class="box-footer center">
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-4 text-center">
                                <input class="btn-primary btn" id="btn-submit-group" type="submit" value="{{trans('messages.save')}}">
                                <input type='reset' name='reset' id='reset' class="btn btn-primary" value="{{trans('messages.reset')}}">
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#name').focus();
        });
    </script>
     <script>
        $("#form-admin-module").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 3
                },
                version: {
                    required: true,
                    minlength: 3
                }
            },
            messages: {
                name: {
                    required: "{{trans('messages.fail_module')}}",
                    minlength: "{{trans('messages.fail_message',['number'=>'3'])}}"
                },
                version:{
                    required: "{{trans('messages.fail_version')}}",
                    minlength: "{{trans('messages.fail_message',['number'=>'3'])}}"
                }
            }
        });
    </script>
</div>
@stop
