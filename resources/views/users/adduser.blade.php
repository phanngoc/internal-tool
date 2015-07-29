@extends ('layouts.master')

@section ('head.title')
{{trans('messages.add_user')}}
@stop

@section ('body.content')
<link href="{{Asset('bootstrap/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
<script src="{{Asset('bootstrap/js/select2.min.js')}}" type="text/javascript"></script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{trans('messages.user_management')}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> {{trans('messages.dashboard')}}</a></li>
            <li><a href="{{ route('users.index') }}">{{trans('messages.user')}}</a></li>
            <li class="active">{{trans('messages.add_user')}}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">{{trans('messages.add_user')}}</h3>
                        <a class="btn btn-primary pull-right" href="{!!route('users.index') !!}">{{trans('messages.list_user')}}</i></a>
                    </div>
                    <!-- form start -->
                    {!! Form::open([
                    'route'=>['users.store'],
                    'method'=>'POST',
                    'id'=>'add'
                    ]) !!}
                    <div class="box-body">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="form-group">
                            {!! HTML::decode(Form::label('employee_id',trans('messages.lb_fullname').'<span id="label">*</span>')) !!}
                            {!! Form::select('employee_id',$results,null, ['class'=>'js-example-basic-multiple form-control','id'=>'employee_id','required'=>'true', 'style'=>'width:100%']) !!}
                        </div>
                        <div class="form-group">
                            {!! HTML::decode(Form::label('name',trans('messages.lb_username').'<span id="label">*</span>')) !!}
                            {!! Form::text('username',null,['id'=>'username','class'=>'form-control','placeholder'=>trans('messages.e_username')]) !!}
                        </div>
                        <div class="form-group">
                            {!! HTML::decode(Form::label('name',trans('messages.lb_password').'<span id="label">*</span>')) !!}
                            {!! Form::password('password',['id'=>'password','class'=>'form-control','placeholder'=>trans('messages.e_password')]) !!}
                        </div>
                        <div class="form-group">
                            {!! HTML::decode(Form::label('name',trans('messages.lb_password_confirmation').'<span id="label">*</span>')) !!}
                            {!! Form::password('password_confirm',['id'=>'password_confirm','class'=>'form-control','placeholder'=>trans('messages.e_password_confirmation')]) !!}
                        </div>
                        <div class="form-group" style="width:100%;">
                            {!! HTML::decode(Form::label('name',trans('messages.lb_groups').'<span id="label">*</span>')) !!}
                            {!! Form::select('group_id[]',$groups,null, ['id'=>'group_id','class'=>'form-control select2','multiple'=>'true', 'style'=>'width:100%']) !!}
                        </div>
                        <div class="box-footer center">
                            <div class="row">
                                <div class="col-sm-4 col-sm-offset-4 text-center">
                                    <input type="submit" class="btn btn-primary" value="Save"></input>
                                    <input type='reset' name='reset' id='reset' class="btn btn-primary" value="{{trans('messages.reset')}}">
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
    @if($errors->has('fullname'))
        $('<label for="employee_id">').text('{{$errors->first("fullname")}}').addClass('error').insertAfter('#employee_id');
    @endif
    @if($errors->has('username'))
        $('<label for="username">').text('{{$errors->first("username")}}').addClass('error').insertAfter('#username');
    @endif
    @if($errors->has('password'))
        $('<label for="password">').text('{{$errors->first("password")}}').addClass('error').insertAfter('#password');
    @endif
    @if($errors->has('password_confirm'))
        $('<label for="password_confirm">').text('{{$errors->first("password_confirm")}}').addClass('error').insertAfter('#password_confirm');
    @endif
    @if($errors->has('group_id'))
        $('<label for="group_id">').text('{{$errors->first("group_id")}}').addClass('error').insertAfter('#group_id');
    @endif
        $(document).ready(function(){
            $.validator.addMethod("username",function(value,element){
                return this.optional(element) || /^[a-zA-Z](([\._\-][a-zA-Z0-9])|[a-zA-Z0-9])*[a-z0-9]$/.test(value);
            },"");
        });
    </script>

    <script type="text/javascript">
        $(".select2").select2({
           placeholder: "{{trans('messages.sl_groups')}}"
        });
    </script>

    <script>
    $.validator.setDefaults({
        errorPlacement: function (error, element) {
        if (element.parent('.input-group').length) {
            error.insertAfter(element.parent());
        } else if (element.hasClass('select2')) {
            error.insertAfter(element.next('span'));
        } else {
            error.insertAfter(element);
        }
    }
    }),
        $("#add").validate({
            rules: {
                fullname: {
                    required: true,
                    minlength: 5
                },
                username: {
                    required: true,
                    minlength: 3,
                    username: true
                },
                password: {
                    required: true,
                    minlength: 6
                },
                password_confirm: {
                    required: true,
                    equalTo: "#password"
                },
                email: {
                    required: true,
                    email: true
                },
                'group_id[]': {
                    required: true,
                }
            },
            messages: {
                fullname: {
                    required: "{{trans('messages.fail_empty')}}",
                },
                username: {
                    required: "{{trans('messages.fail_empty')}}",
                    minlength: "Please enter more than 3 characters",
                    username: "Please enter a valid value"
                },
                password: {
                    required: "{{trans('messages.fail_empty')}}",
                    minlength: "Please enter more than 6 characters"
                },
                password_confirm: {
                    required: "{{trans('messages.fail_empty')}}",
                    equalTo: "These passwords don't match. Try again?"
                },
                email: {
                    required: "{{trans('messages.fail_empty')}}",
                    email: "Please enter a valid format email address"
                },
                'group_id[]': {
                    required: "{{trans('messages.fail_empty')}}",
                }
            }
        });
    </script>
</div>
@stop