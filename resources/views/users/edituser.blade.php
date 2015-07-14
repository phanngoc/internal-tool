@extends ('layouts.master')

@section ('head.title')
{{trans('messages.edit_user')}}
@stop

@section ('body.content')

<script src="{{Asset('bootstrap/js/select2.min.js')}}" type="text/javascript"></script>
<link href="{{Asset('bootstrap/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{trans('messages.user_management')}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> {{trans('messages.dashboard')}}</a></li>
            <li><a href="{{ route('users.index') }}">{{trans('messages.user')}}</a></li>
            <li class="active">{{trans('messages.edit_user')}}</li>
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
                        <h3 class="box-title">{{trans('messages.edit_user')}}</h3>
                        <a class="btn btn-primary pull-right" href="{!!route('users.index') !!}">{{trans('messages.list_user')}}</i></a>
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
                        'route'=>['users.update', $user->id],
                        'method'=>'PUT',
                        'id'=>'edit'
                    ]) !!}
                    <div class="box-body">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="form-group">
                                {!! HTML::decode(Form::label('employee_id',trans('messages.lb_fullname').'<span id="label">*</span>')) !!}
                                {!! Form::select('employee_id',$results,$resultchoose, ['class'=>'js-example-basic-multiple form-control','required'=>'true', 'style'=>'width:100%']) !!}
                            </div>

                            <div class="form-group">
                                {!! HTML::decode(Form::label('name',trans('messages.lb_username').'<span id="label">*</span>')) !!}
                                {!! Form::text('username',$user->username,['id'=>'username','class'=>'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('password', trans('messages.new_password')) !!}
                                {!! Form::password('password',['id'=>'password','class'=>'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('password', 'Password Confirmation') !!}
                                {!! Form::password('password_confirm',['id'=>'password_confirm','class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! HTML::decode(Form::label('name',trans('messages.lb_groups').'<span id="label">*</span>')) !!}
                                {!! Form::select('group_id[]', $groups, $groupssl, ['class'=>'select2 form-control','multiple'=>'true','required'=>'true', 'style'=>'width:100%']) !!}
                            </div>
                            <div class="box-footer center">
                                <div class="row">
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Save</button>
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
        $(".select2").select2();
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $.validator.addMethod("username",function(value,element){
                return this.optional(element) || /^[a-zA-Z](([\._\-][a-zA-Z0-9])|[a-zA-Z0-9])*[a-z0-9]$/.test(value);
            },"");
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
        $("#edit").validate({
            rules: {
                username: {
                    required: true,
                    minlength: 3,
                    username: true
                },
                password: {
                    minlength: 6
                },
                password_confirm: {
                    equalTo: "#password"
                },
                'group_id[]': {
                    required: true,
                }
            },
            messages: {
                fullname: {
                    required: "You can't leave this empty"
                },
                username: {
                    required: "You can't leave this empty",
                    minlength: "Please enter more than 3 characters",
                    username: "Please enter a valid value"
                },
                password: {
                    minlength: "Please enter more than 6 characters"
                },
                password_confirm: {
                    equalTo: "These passwords don't match. Try again?"
                },
                email: {
                    required: "Please enter your email",
                    email: "Please enter a valid format email address"
                },
                'group_id[]': {
                    required: "Please select your group",
                }
            }
        });
    </script>
</div>
@stop