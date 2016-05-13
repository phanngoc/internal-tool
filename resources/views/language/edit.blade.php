@extends('layouts.master')

@section ('head.title')
{{trans('messages.add_group')}}
@stop

@section ('head.css')
    <style type="text/css">
        textarea {
            resize: none;
        }
    </style>
@stop

@section('body.content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            {{trans('language.language_management')}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('index')}}"><i class="fa fa-dashboard"></i> {{trans('messages.dashboard')}}</a></li>
            <li><a href="{{ route('groups.index') }}">{{trans('messages.group')}}</a></li>
            <li class="active">{{trans('messages.add_group')}}</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">{{trans('messages.add_group')}}</h3>
                        <a class="btn btn-primary pull-right" href="{!!route('languages.index') !!}">{{trans('language.list_language')}}</i></a>
                    </div>
                    <!-- form start -->
                    {!! Form::open([
                    'route'=>['languages.update', $language->id],
                    'method'=>'POST',
                    'id'=>'form-update-language'
                    ]) !!}
                    <div class="box-body">
                        <div class="col-md-8 col-md-offset-2">
                            <!-- text input -->
                            <div class="form-group">
                                <label>{{ trans('language.language_name') }}<span class="text-red">*</span></label>
                                {!! Form::text('language_name', $language->language_name, ['class'=>'form-control','autofocus']) !!}

                                @if($errors->has('language_name'))
                                    <label for="language_name" class="error">{{$errors->first("language_name")}}</label>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>{{trans('language.code')}}</label>
                                {!! Form::text('code', $language->code, ['class'=>'form-control','autofocus']) !!}

                                @if($errors->has('code'))
                                    <label for="code" class="error">{{$errors->first("code")}}</label>
                                @endif
                            </div>
                            <div class="box-footer">
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
        $("#form-update-language").validate({
            rules : {
                language_name : {
                    required: true,
                    minlength: 3
                },
                code : {
                    required: true,
                }
            },

            messages: {
                language_name: {
                    required: "Please enter language name",
                    minlength: "Please enter more than 3 characters."
                },
                code : {
                    required: "Please enter code",
                }
            }
        });
    </script>

</div>
@stop