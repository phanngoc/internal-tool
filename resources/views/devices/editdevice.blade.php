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
                          <label>{{trans('messages.serial_device')}}<span class="text-red">*</span></label>
                          {!! Form::text('serial_device', $device->serial_device, [ 'id' => 'serial_device', 'class' => 'form-control','autofocus']) !!}
                        </div>
                        <div class="form-group">
                            <label for="kind_device_id">{{trans('messages.device_name')}}<span class="text-red">*</span></label>
                            <select name="kind_device_id" class="form-control module_id select2">
                                @foreach ($kinds as $b)
                                   @if($b->id == $device->kind_device_id)
                                    <option value="{{ $b->id }}" selected>{{ $b->device_name }} </option>
                                   @else
                                    <option value="{{ $b->id }}">{{ $b->device_name }} </option>
                                   @endif
                                @endforeach
                            </select>
                        </div>
                         <div class="form-group">
                            <label for="os_id">{{trans('messages.operating_system')}}<span class="text-red">*</span></label>
                            <select name="os_id" class="form-control module_id select2">
                                @foreach ($opes as $b)
                                   @if($b->id == $device->os_id)
                                    <option value="{{ $b->id }}" selected>{{ $b->os_name }} </option>
                                   @else
                                    <option value="{{ $b->id }}">{{ $b->os_name }} </option>
                                   @endif
                                @endforeach
                            </select>
                        </div>
                          <div class="form-group">
                            <label for="status_id">{{trans('messages.status_device')}}<span class="text-red">*</span></label>
                            <select name="status_id" class="form-control module_id select2">
                                @foreach ($status as $b)
                                   @if($b->id == $device->status_id)
                                    <option value="{{ $b->id }}" selected>{{ $b->status }} </option>
                                   @else
                                    <option value="{{ $b->id }}">{{ $b->status }} </option>
                                   @endif
                                @endforeach
                            </select>
                        </div>
                         <div class="form-group">
                            <label for="information_id">{{trans('messages.contract_number')}}<span class="text-red">*</span></label>
                            <select name="information_id" class="form-control module_id select2">
                                @foreach ($infos as $b)
                                   @if($b->id == $device->information_id)
                                    <option value="{{ $b->id }}" selected>{{ $b->contract_number }} </option>
                                   @else
                                    <option value="{{ $b->id }}">{{ $b->contract_number }} </option>
                                   @endif
                                @endforeach
                            </select>
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



