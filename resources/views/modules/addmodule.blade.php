@extends('layouts.master')
@section ('head.title')
{{trans('messages.add_module')}}
@stop

@section ('head.css')
    <style type="text/css">
        textarea{
            resize: none;
        }
    </style>
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
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">{{trans('messages.add_module')}}</h3>

                        <a class="btn btn-primary pull-right" href="{!!route('modules.index') !!}">{{trans('messages.list_module')}}</i></a>

                    </div>
                    <!-- form start -->
                    {!! Form::open([
                    'route'=>['modules.store'],
                    'method'=>'POST',
                    'id'=>'form-admin-module'
                    ]) !!}
                    <div class="box-body">
                        <div class="col-md-8 col-md-offset-2">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Module Name<span class="text-red">*</span></label>
                                {!! Form::text('name',null,['id'=>'name','class'=>'form-control','autofocus']) !!}
                                @if($errors->has('name'))<label for="name" class="error">{{$errors->first("name")}}</label>@endif
                            </div>
                            <!-- textarea -->
                            <div class="form-group">
                                <label>{{trans('messages.description')}}</label>
                                <textarea class="form-control" rows="3" name="description"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Version<span class="text-red">*</span></label>
                                {!! Form::text('version',null,['id'=>'version','class'=>'form-control','autofocus']) !!}
                                @if($errors->has('version'))<label for="version" class="error">{{$errors->first("version")}}</label>@endif
                            </div>
                            <div class="form-group">
                                <label>Order<span class="text-red">*&nbsp;</span></label>
                                <select name='order' id='order'>
                                @for($i=1;$i<=$maxorder+1;$i++)
                                    @if($i==$maxorder+1)
                                        <option value="{{$i}}" selected="selected">{{$i}}</option>
                                    @else
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endif
                                @endfor
                                </select>
                                @if($errors->has('order'))<label for="order" class="error">{{$errors->first("order")}}</label>@endif
                            </div>
                            <div class="box-footer center">
                                <div class="form-group">
                                    <div class="text-center">
                                        <input class="btn-primary btn" id="btn-submit-group" type="submit" value="{{trans('messages.save')}}">
                                        <input type='reset' name='reset' id='reset' class="btn btn-primary" value="{{trans('messages.reset')}}">
                                    </div>
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
        $(document).ready(function () {
            $('#name').focus();
        });
    </script>
     <script>
        $("#form-admin-module").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 2
                },
                version: {
                    required: true,
                    minlength: 3
                }
            },
            messages: {
                name: {
                    required: "{{trans('messages.fail_empty')}}",
                    minlength: "Please enter more than 2 characters"
                },
                version:{
                    required: "{{trans('messages.fail_empty')}}",
                    minlength: "Please enter more than 2 characters"
                }
            }
        });
    </script>
</div>
@stop
