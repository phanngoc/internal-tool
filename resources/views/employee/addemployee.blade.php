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
            {{trans('messages.employee_manager')}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> {{trans('messages.dashboard')}}</a></li>
            <li><a href="{{ route('employee.index') }}">{{trans('messages.employee')}}</a></li>
            <li class="active">{{trans('messages.add_employee')}}</li>
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
                        <h3 class="box-title">{{trans('messages.add_employee')}}</h3>
                        <a class="btn btn-primary pull-right" href="{!!route('employee.index') !!}">{{trans('messages.list_employee')}}</i></a>
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
                    'route'=>['employee.store'],
                    'method'=>'POST',
                    'id'=>'add'
                    ]) !!}
                    <div class="box-body">
                        <div class="form-group">
                            {!! HTML::decode(Form::label('firstname',trans('messages.firstname').' (<span id="label">*</span>)')) !!}
                            {!! Form::text('firstname',null,['id'=>'firstname','class'=>'form-control','placeholder'=>trans('messages.e_fullname'),'autofocus']) !!}
                        </div>
                        <div class="form-group">
                            {!! HTML::decode(Form::label('lastname',trans('messages.lastname').' (<span id="label">*</span>)')) !!}
                            {!! Form::text('lastname',null,['id'=>'lastname','class'=>'form-control','placeholder'=>trans('messages.lastname'),'autofocus']) !!}
                        </div>
                        <div class="form-group">
                            {!! HTML::decode(Form::label('employee_code',trans('messages.employee_code').' (<span id="label">*</span>)')) !!}
                            {!! Form::text('employee_code',null,['id'=>'employee_code','class'=>'form-control','placeholder'=>trans('messages.employee_code')]) !!}    
                        </div>
                        <div class="form-group">
                            {!! HTML::decode(Form::label('phone',trans('messages.phone').' (<span id="label">*</span>)')) !!}
                            {!! Form::text('phone',null,['id'=>'phone','class'=>'form-control','placeholder'=>trans('messages.phone')]) !!}    
                        </div>
                        <div class="form-group">
                            {!! HTML::decode(Form::label('position',trans('messages.position').' (<span id="label">*</span>)')) !!}
                            {!! Form::select('position_id',$positions,null, ['class'=>'js-example-basic-multiple form-control','required'=>'true']) !!}
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
        $(".js-example-basic-multiple").select2({
           placeholder: "{{trans('messages.sl_groups')}}"
        });
    </script>

    <script>
        $("#add").validate({
            rules: {
                fullname: {
                    required: true,
                    minlength: 5
                },
                username: {
                    required: true,
                    minlength: 3
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
                group: {
                    required: true,
                }
            },
            messages: {
                fullname: {
                    required: "You can't leave this empty",
                    minlength: "{{trans('messages.fail_message',['number'=>'5'])}}"
                },
                username: {
                    required: "You can't leave this empty",
                    minlength: "{{trans('messages.fail_message',['number'=>'5'])}}"
                },
                password: {
                    required: "You can't leave this empty",
                    minlength: "{{trans('messages.fail_message',['number'=>'6'])}}"
                },
                password_confirm: {
                    required: "You can't leave this empty",
                    equalTo: "These passwords don't match. Try again?"
                },
                email: {
                    required: "Please enter your email",
                    email: "Please enter a valid format email address"
                },
                group: {
                    required: "Please select your group",
                }
            }
        });
    </script>
</div>
@stop