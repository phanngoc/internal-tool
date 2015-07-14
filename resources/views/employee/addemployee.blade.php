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
            Employees Management
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> {{trans('messages.dashboard')}}</a></li>
            <li><a href="{{ route('employee.index') }}">Employees</a></li>
            <li class="active">{{trans('messages.add_employee')}}</li>
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
                        <div class="col-md-8 col-md-offset-2">
                            <div class="form-group">
                                {!! HTML::decode(Form::label('firstname',trans('messages.firstname').' <span id="label">*</span>')) !!}
                                {!! Form::text('firstname',null,['id'=>'firstname','class'=>'form-control','autofocus']) !!}
                            </div>
                            <div class="form-group">
                                {!! HTML::decode(Form::label('lastname',trans('messages.lastname').' <span id="label">*</span>')) !!}
                                {!! Form::text('lastname',null,['id'=>'lastname','class'=>'form-control','autofocus']) !!}
                            </div>
                            <div class="form-group">
                                {!! HTML::decode(Form::label('employee_code',trans('messages.employee_code').' <span id="label">*</span>')) !!}
                                {!! Form::text('employee_code',null,['id'=>'employee_code','class'=>'form-control']) !!}    
                            </div>
                            <div class="form-group">
                                {!! HTML::decode(Form::label('phone',trans('messages.phone').' <span id="label">*</span>')) !!}
                                {!! Form::text('phone',null,['id'=>'phone','class'=>'form-control']) !!}    
                            </div>
                            <div class="form-group">
                                {!! HTML::decode(Form::label('email',trans('messages.email').' <span id="label">*</span>')) !!}
                                {!! Form::text('email',null,['id'=>'email','class'=>'form-control']) !!}    
                            </div>
                            <div class="form-group">
                                {!! HTML::decode(Form::label('position',trans('messages.position').' <span id="label">*</span>')) !!}
                                {!! Form::select('position_id',$positions,null, ['class'=>'js-example-basic-multiple form-control','required'=>'true']) !!}
                            </div>
                            <div class="box-footer center">
                                <div class="row">
                                    <div class="text-center">
                                        <input type="submit" class="btn btn-primary" value="{{trans('messages.save')}}"></input>
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
        $(".js-example-basic-multiple").select2({
           placeholder: "{{trans('messages.sl_groups')}}"
        });
    </script>

    <script>
        $.validator.addMethod("phone",function(value,element){
            return this.optional(element) || /(^\+[0-9]{2}|^\+[0-9]{2}\(0\)|^\(\+[0-9]{2}\)\(0\)|^00[0-9]{2}|^0)([0-9]{9}$|[0-9\-\s]{10}$)/.test(value);
        },"");

        $.validator.addMethod("email",function(value,element){
            return this.optional(element) || /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i.test(value);
        },"");

        $("#add").validate({
            rules: {
                firstname: {
                    required: true,
                    minlength: 2
                },
                lastname: {
                    required: true,
                    minlength: 2
                },
                employee_code: {
                    required: true,
                    minlength: 7
                },
                phone: {
                    phone: true,
                    required: true
                },
                email: {
                    required: true,
                    email: true
                }

            },
            messages: {
                firstname: {
                    required: "You can't leave this empty",
                    minlength: "Please enter more than 2 characters"
                },
                lastname: {
                    required: "You can't leave this empty",
                    minlength: "Please enter more than 2 characters"
                },
                employee_code: {
                    required: "You can't leave this empty",
                    minlength: "Please enter more than 7 characters"
                },
                phone: {
                    required: "You can't leave this empty",
                    phone: "Please enter a valid value"
                },
                email: {
                    required: "You can't leave this empty",
                    email: "Please enter a valid value"
                }
            }
        });
    </script>
</div>
@stop