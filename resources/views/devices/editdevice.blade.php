@extends ('layouts.master')

@section ('head.title')
    {{trans('messages.edit_device')}}
@stop

@section ('body.content')
<link href="{{Asset('bootstrap/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
<script src="{{Asset('bootstrap/js/select2.min.js')}}" type="text/javascript"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{trans('messages.device_management')}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> {{trans('messages.dashboard')}}</a></li>
            <li><a href="{{ route('features.index') }}">{{trans('messages.device')}}</a></li>
            <li class="active">{{trans('messages.edit_device')}}</li>
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
                    <div class="box-body">
                        {!! Form::open( [
                          'route' => [ 'devices.update', $device->id ],
                          'method' => 'PUT',
                          'class' => 'edit'
                            ])
                        !!}
                        <div class="form-group">
                        {!! HTML::decode(Form::label('serial_device',trans('messages.serial_device').' <span id="label">*</span>')) !!}
                        {!! Form::text('serial_device',$device->serial_device,['id'=>'serial_device','class'=>'form-control','placeholder'=>trans('messages.serial_device')]) !!}
                        </div>
                         <div class="form-group">
                            {!! HTML::decode(Form::label('device',trans('messages.device').' <span id="label">*</span>')) !!}
                            {!! Form::select('kind_device_id',$kinds,$device->kind_device_id, ['class'=>'js-example-basic-multiple form-control','required'=>'true']) !!}
                        </div>
                        <div class="form-group">
                            {!! HTML::decode(Form::label('operatingsystem',trans('messages.operatingsystem').' <span id="label">*</span>')) !!}
                            {!! Form::select('os_id',$operatings,$device->os_id, ['class'=>'js-example-basic-multiple form-control','required'=>'true']) !!}
                        </div>
                         <div class="form-group">
                            {!! HTML::decode(Form::label('contract_number',trans('messages.contract_number').' <span id="label">*</span>')) !!}
                            {!! Form::select('information_id',$informations,$device->information_id, ['class'=>'js-example-basic-multiple form-control','required'=>'true']) !!}
                        </div>
                        <div class="form-group">
                            {!! HTML::decode(Form::label('status',trans('messages.status').' <span id="label">*</span>')) !!}
                            {!! Form::select('status_id',$status,$device->status_id, ['class'=>'js-example-basic-multiple form-control','required'=>'true']) !!}
                        </div>
                        <div class="box-footer center">
                        <div class="form-group">
                              <div class="col-sm-4 col-sm-offset-4 text-center">
                                  <input class="btn-primary btn" id="btn-submit-group" type="submit" value="{{trans('messages.update')}}">
                                  <input type='reset' name='reset' id='reset' class="btn btn-primary" value="{{trans('messages.reset')}}">
                              </div>
                          </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

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
        $(".edit").validate({
            rules: {
                name_feature: {
                    required: true,
                    minlength: 3
                },
                'action[]': {
                    required: true,
                }
            },
            messages: {
                name_feature: {
                    required: "{{trans('messages.fail_empty')}}",
                    minlength: "{{trans('messages.fail_message',['number'=>'3'])}}"
                },
                'action[]': {
                    required: "{{trans('messages.fail_empty')}}",
                }
            }
        });
    </script>
</div>
@stop



