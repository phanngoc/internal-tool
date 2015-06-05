@extends('layouts.master')
@section ('head.title')
{{trans('messages.add_group')}}
@stop

@section('body.content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            {{trans('messages.group_management')}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('index')}}"><i class="fa fa-dashboard"></i> {{trans('messages.dashboard')}}</a></li>
            <li><a href="{{ route('groups.index') }}">{{trans('messages.group')}}</a></li>
            <li class="active">{{trans('messages.add_group')}}</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">{{trans('messages.add_group')}}</h3>
                        <a class="btn btn-primary pull-right" href="{!!route('groups.index') !!}">{{trans('messages.list_group')}}</i></a>
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
                    'route'=>['groups.store'],
                    'method'=>'POST',
                    'id'=>'form-admin-group'
                    ]) !!}
                    <div class="box-body">
                        <!-- text input -->
                        <div class="form-group">
                            <label>{{trans('messages.name')}}(<span id="label">*</span>)</label>
                            {!! Form::text('groupname',null,['id'=>'groupname','class'=>'form-control','placeholder'=>trans('messages.e_group_name'),'autofocus']) !!}
                        </div>

                        <!-- textarea -->
                        <div class="form-group">
                            <label>{{trans('messages.description')}}</label>
                            <textarea class="form-control" rows="3" placeholder="{{trans('messages.e_description')}}" name="description"></textarea>
                        </div>
                    </div>
                    <div class="box-footer">
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
            $('#groupname').focus();
        });
    </script>
     <script>
        $("#form-admin-group").validate({
            rules: {
                groupname: {
                    required: true,
                    minlength: 3
                }
            },
            messages: {
                groupname: {
                    required: "{{trans('messages.fail_group')}}",
                    minlength: "{{trans('messages.fail_message',['number'=>'3'])}}"
                }
            }
        });
    </script>
</div>
@stop