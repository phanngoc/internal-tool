@extends ('layouts.master')
@section ('head.title')
{{trans('messages.add_feature')}}
@stop
@section ('head.css')
<link href="{{Asset('bootstrap/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
@stop
@section ('body.content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{trans('messages.feature_module_management')}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> {{trans('messages.dashboard')}}</a></li>
            <li><a href="{{ route('features.index') }}">{{trans('messages.feature_module')}}</a></li>
            <li class="active">{{trans('messages.add_feature')}}</li>
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
                        <h3 class="box-title">{{trans('messages.add_feature')}}</h3>
                        <a class="btn btn-primary pull-right" href="{!!route('features.index') !!}">{{trans('messages.list_feature')}}</i></a>
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
                    <form role="form" action="{{ route('features.store') }}" method="POST" id="add">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name_feature">{{trans('messages.name')}}:*</label>
                                {!! Form::text('name_feature',null,['id'=>'name_feature','class'=>'form-control','placeholder'=>trans('messages.e_module_name'),'autofocus']) !!}
                            </div>
                            <div class="form-group">
                                <label for="description">{{trans('messages.description')}}:</label>
                                <input type="text" class="form-control" name="description" id="description" placeholder="{{trans('messages.e_description')}}">
                            </div>
                            <div class="form-group">
                                <label for="url">{{trans('messages.action')}}:*</label>
                                {!! Form::text('action',null,['id'=>'action','class'=>'form-control','placeholder'=>trans('messages.e_URL'),'autofocus']) !!}
                            </div>
                            <div class="form-group">
                                <label for="password">{{trans('messages.feature_module')}}:</label><br>
                                <select class="form-control id-module" name="id_module">
                                     <option value="0" selected="selected">No Module</option>
                                    @foreach ($module as $modules)
                                    <option value="{!! $modules->id !!}">{!! $modules->name !!} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="password">{{trans('messages.feature_parent')}}:</label><br>
                                <select class="form-control" id="id_parent" name="id_parent">
                                    <option value="0">No Parent</option>
                                    @foreach ($feature as $features)
                                    <option value="{!! $features->id !!}">{!! $features->name_feature !!} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="box-footer">
                                <div class="row">
                                    <div class="col-md-offset-4">
                                        <input type="submit" class="btn btn-primary" value="{{trans('messages.save')}}"></input>

                                        <input type='reset' name='reset' id='reset' class="btn btn-primary" value="{{trans('messages.reset')}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#feature_name').focus();
            $('.resource-parent input').on('click', function () {

                var $container = $(this).parents('.resource-group');

                var checkStatus = $(this).prop('checked');

                $container.find('ul.resource-children input').each(function () {

                    $(this).prop('checked', checkStatus);

                });

            });
             $('.id-module').change(function(){
               var id_module = $(this).val();
               var link = "{!! route('post-parent') !!}";

               $.ajax({
                    url : link,
                    type : "get",
                    dateType:"json",
                    data : {
                      id: id_module
                    },
                    success : function (data){
                       $('#id_parent').children("option").remove();
                        var json = $.parseJSON(data);
                        console.log(json);
                        $('#id_parent').append('<option value="0">No Parent</option>');
                        $.each(json, function(index, value) {
                            $('#id_parent').append("<option value='"+value.id+"'>"+value.name+"</option>");
                        });
                    }
                });
            });
        });
    </script>
    <script>
        $("#add").validate({
            rules: {
                name_feature: {
                    required: true,
                    minlength: 3
                },
                action: {
                    required: true,
                    minlength: 3
                }
            },
            messages: {
                name_feature: {
                    required: "Please enter Feature's name",
                    minlength: "To enter 3 or more characters"
                },
                action: {
                    required: "Please enter Action",
                    minlength: "To enter 3 or more characters"
                }
            }
        });
    </script>
</div>
@stop
@section ('body.js')
<script src="{{Asset('bootstrap/js/select2.min.js')}}" type="text/javascript"></script>
<script type="text/javascript">
        $(document).ready(function () {
            $(".js-example-placeholder-multiple").select2({
                placeholder: "Select a module"
            });
            $(".js-example-basic-multiple").select2();
        });
</script>
@stop


