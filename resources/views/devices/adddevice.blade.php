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
            {{trans('messages.device_manager')}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> {{trans('messages.dashboard')}}</a></li>
            <li><a href="{{ route('employee.index') }}">{{trans('messages.device')}}</a></li>
            <li class="active">{{trans('messages.add_device')}}</li>
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
                        <h3 class="box-title">{{trans('messages.add_device')}}</h3>
                        <a class="btn btn-primary pull-right" href="{!!route('devices.index') !!}">{{trans('messages.list_device')}}</i></a>
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
                    'route'=>['devices.store'],
                    'method'=>'POST',
                    'id'=>'add'
                    ]) !!}
                    <div class="box-body">
                        <div class="col-md-8 col-md-offset-2">
                        <div class="form-group">
                            {!! HTML::decode(Form::label('serial_device',trans('messages.serial_device').' <span id="label">*</span>')) !!}
                            {!! Form::text('serial_device',null,['id'=>'serial_device','class'=>'form-control','placeholder'=>trans('messages.serial_device')]) !!}
                        </div>
                        <div class="form-group">
                            {!! HTML::decode(Form::label('type_id',trans('messages.type_device').' <span id="label">*</span>')) !!}
                            <select name="type_id" id="type_id" class="js-example-basic-multiple form-control has-edit">
                                @foreach ($typedevices as $type) 
                                    <option value="{{$type->id}}">{{$type->type_name}}</option>
                                @endforeach
                            </select>
                            <a class="edit-data" href="{{ route('crud.index','type_devices') }}"><i class="fa fa-pencil-square-o"></i></a>
                        </div>
                        <div class="form-group">
                            {!! HTML::decode(Form::label('kind_device_id',trans('messages.device_name').' <span id="label">*</span>')) !!}
                            {!! Form::select('kind_device_id', $kinds,null, ['class'=>'js-example-basic-multiple form-control has-edit','required'=>'true']) !!}
                            <a class="edit-data" href="{{ route('crud.index', 'kind_devices') }}"><i class="fa fa-pencil-square-o"></i></a>
                        </div>
                        <div class="form-group">
                            {!! HTML::decode(Form::label('operatingsystem',trans('messages.operatingsystem').' <span id="label">*</span>')) !!}
                            {!! Form::select('os_id', $operatings, null, ['class'=>'js-example-basic-multiple form-control has-edit','required'=>'true']) !!}
                            <a class="edit-data" href="{{ route('crud.index','operating_systems') }}"><i class="fa fa-pencil-square-o"></i></a>
                        </div>
                         <div class="form-group">
                            {!! HTML::decode(Form::label('contract_number',trans('messages.contract_number').' <span id="label">*</span>')) !!}
                            {!! Form::select('information_id',$informations,null, ['class'=>'js-example-basic-multiple form-control has-edit','required'=>'true']) !!}
                            <a class="edit-data" href="{{ route('crud.index','information_devices') }}"><i class="fa fa-pencil-square-o"></i></a>
                        </div>
                        <div class="form-group">
                            {!! HTML::decode(Form::label('status',trans('messages.status').' <span id="label">*</span>')) !!}
                            {!! Form::select('status_id',$status,null, ['class'=>'js-example-basic-multiple form-control','required'=>'true']) !!}
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
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>


    <style type="text/css">
        label {
            min-width: 200px;   
        }
        .has-edit { 
            width: 94%;
        }
        a.edit-data {
            font-size: 19px;
        }
    </style>

    <script type="text/javascript">
       $(document).ready(function(){
            $('select[name="type_id"]').change(function(){
                var type_id = $(this).val();
                $.get('{{route("getKindDeviceByType")}}',{type_id : type_id}, function(result){
                    $('select[name="kind_device_id"]').html(result);
                    $('select[name="kind_device_id"]').select2();
                });
            });
       });

    $('select').select2();
    $('#serial_device').focus();
        $("#add").validate({
            rules: {
                firstname: {
                    required: true,
                    minlength: 3
                },
                lastname: {
                    required: true,
                    minlength: 1
                },
                employee_code: {
                    required: true,
                    minlength: 3
                },
                phone: {
                    required: true,
                    minlength : 5,
                },

            },
            messages: {
                firstname: {
                    required: "{{trans('messages.fail_empty')}}",
                    minlength: "{{trans('messages.fail_message',['number'=>'3'])}}"
                },
                lastname: {
                    required: "{{trans('messages.fail_empty')}}",
                    minlength: "{{trans('messages.fail_message',['number'=>'1'])}}"
                },
                employee_code: {
                    required: "{{trans('messages.fail_empty')}}",
                    minlength: "{{trans('messages.fail_message',['number'=>'3'])}}"
                },
                phone: {
                    required: "{{trans('messages.fail_empty')}}",
                    minlength: "{{trans('messages.fail_message',['number'=>'5'])}}"
                },
            }
        });
    </script>
</div>
@stop