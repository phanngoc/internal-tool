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
            <div class="col-md-8 col-md-offset-2">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">{{trans('messages.edit_user')}}</h3>
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
                    {!! Form::model($user, array('method' => 'PUT', 'route' => array('users.update', $user->id), 'class'=>'edit')) !!}
                    <div class="box-body">
                        <div class="form-group">
                            {!! Form::label('fullname', trans('messages.lb_fullname')) !!}
                            {!! Form::text('fullname',null,['class'=>'form-control','id'=>'fullname','required'=>'true','autofocus']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('email', trans('messages.lb_email')) !!}
                            {!! Form::text('email',null,['class'=>'form-control','required'=>'true']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('group_id', trans('messages.lb_groups')) !!}
                            {!! Form::select('group_id[]',$groups,$groupssl, ['class'=>'js-example-basic-multiple form-control','multiple'=>'true','required'=>'true']) !!}
                        </div>
                        <div class="box-footer center">
                            <div class="row">
                                <div class="col-sm-4 col-sm-offset-4 text-center">
                                    <button type="submit" class="btn btn-primary">{{trans('messages.update')}}</button>
                                    <input type='reset' name='reset' id='reset' class="btn btn-danger" value="{{trans('messages.reset')}}">
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
        $(".js-example-basic-multiple").select2({placeholder: "Please select group"});
    </script>
    <script>
        $(".edit").validate({
            rules: {
                fullname: {
                    minlength: 4
                },
                email: {
                    email: true
                }
            },
            messages: {
                fullname: {
                    required: "{{trans('messages.fail_fullname')}}",
                    minlength: "{{trans('messages.fail_message',['number'=>'5'])}}"
                },
                email: {
                    required: "{{trans('messages.fail_email')}}",
                    email: "{{trans('messages.message_email')}}"
                },
                group_id[]: {
                    required: "REQUIRED"
                }
            }
        });
    </script>
</div>
@stop