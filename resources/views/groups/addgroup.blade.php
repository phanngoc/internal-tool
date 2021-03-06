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
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">{{trans('messages.add_group')}}</h3>
                        <a class="btn btn-primary pull-right" href="{!!route('groups.index') !!}">{{trans('messages.list_group')}}</i></a>
                    </div>
                    <!-- form start -->
                    {!! Form::open([
                    'route'=>['groups.store'],
                    'method'=>'POST',
                    'id'=>'form-admin-group'
                    ]) !!}
                    <div class="box-body">
                        <div class="col-md-8 col-md-offset-2">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Group Name<span class="text-red">*</span></label>
                                {!! Form::text('groupname',null,['class'=>'form-control','autofocus']) !!}
                                @if($errors->has('groupname'))<label for="groupname" class="error">{{$errors->first("groupname")}}</label>@endif
                            </div>
                            <div class="form-group">
                                <label>{{trans('messages.description')}}</label>
                                <textarea class="form-control" rows="4" name="description"></textarea>
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
    <!--
    <script type="text/javascript">
        $(function(){
            $('#form-admin-group').focusout(function(){
                var postData = $(this).serializeArray();
                //alert(postData);
                var formURL = $(this).attr("action");
                $.ajax({
                    url : formURL,
                    type: "POST",
                    data : postData,
                    success:function(data) {
                        //alert('thanh cong');
                    },
                    error: function(data){
                        var errors = data.responseJSON;
                        console.log(errors);
                    }
                });
            });
        });
    </script>
    -->
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
                    required: "{{trans('messages.fail_empty')}}.",
                    minlength: "Please enter more than 3 characters."
                }
            }
        });
    </script>
</div>
@stop