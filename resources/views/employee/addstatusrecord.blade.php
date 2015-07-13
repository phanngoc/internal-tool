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
            <li><a href="{{ route('statusrecord') }}">{{trans('messages.statusrecord')}}</a></li>
            <li class="active">{{trans('messages.add_statusrecord')}}</li>
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
                        <h3 class="box-title">{{trans('messages.add_statusrecord')}}</h3>
                        <a class="btn btn-primary pull-right" href="{!!route('statusrecord') !!}">{{trans('messages.list_statusrecord')}}</i></a>
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
                    'route'=>['statusrecord.savecreate'],
                    'method'=>'POST',
                    'id'=>'add'
                    ]) !!}
                    <div class="box-body">
                        <div class="form-group">
                            {!! HTML::decode(Form::label('name',trans('messages.name').'<span id="label">*</span>')) !!}
                            {!! Form::text('name',null,['id'=>'name','class'=>'form-control','placeholder'=>trans('messages.name')]) !!}
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
                name: {
                    required: true,
                    minlength: 2
                },
            },
            messages: {
                name: {
                    required: "You can't leave this empty"
                },
            }
        });
    </script>
</div>
@stop