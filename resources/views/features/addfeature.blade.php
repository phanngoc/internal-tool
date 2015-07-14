@extends ('layouts.master')
@section ('head.title')
{{trans('messages.add_feature')}}
@stop

@section ('body.content')
<link href="{{Asset('bootstrap/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
<script src="{{Asset('bootstrap/js/select2.min.js')}}" type="text/javascript"></script>
<style type="text/css">
    .select2 .select2-container .select2-container--default .select2-container--above .select2-container--open{
        width: 100%;
    }
    label.myErrorClass {
    color: red;
    font-size: 11px;
    display: block;
    }
    textarea{
        resize: none;
    }
    #is_menu{
        position: absolute;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Management Features Module
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
            <div class="col-md-12">
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
                            <div class="col-md-8 col-md-offset-2">
                                <div class="form-group">
                                    <label for="name_feature">Feature Module Name<span class="text-red">*</span></label>
                                    {!! Form::text('name_feature',null,['id'=>'name_feature','class'=>'form-control','autofocus']) !!}
                                </div>
                                <div class="form-group">
                                    <label for="description">{{trans('messages.description')}}</label>
                                    <textarea class="form-control" name="description" id="description" cols="" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="action">{{trans('messages.action')}}<span class="text-red">*</span></label><br>
                                    {!! Form::select('action[]',$routes,null, ['class'=>'form-control action-url select2','multiple'=>'true', 'style'=>'width:100%']) !!}
                                </div>
                                <div class="form-group">
                                    <label for='is_menu'>Show The Feature Module In Main Menu&nbsp;</label>
                                    {!! Form::checkbox('is_menu','1', '',['id'=>'is_menu']) !!}
                                </div>
                                <div class="form-group">
                                    <label for="">Module Name<span class="text-red">*</span></label><br>
                                    <select class="form-control module_id" name="module_id" style="width:100%">
                                        @foreach ($module as $modules)
                                        <option value="{!! $modules->id !!}">{!! $modules->name !!} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Parent Feature Name</label><br>
                                    <select name="parent_id" class="form-control parent_id" style="width:100%">
                                        <option value="0">None</option>
                                        @foreach ($feature as $features)
                                        <option value="{!! $features->id !!}">{!! $features->name_feature !!} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="box-footer">
                                    <div class="row">
                                        <div class="text-center">
                                            <input type="submit" class="btn btn-primary" value="{{trans('messages.save')}}"></input>
                                            <input type='reset' name='reset' id='reset' class="btn btn-primary" value="{{trans('messages.reset')}}">
                                        </div>
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
            $('#name_feature').focus();
            $('.resource-parent input').on('click', function () {

                var $container = $(this).parents('.resource-group');

                var checkStatus = $(this).prop('checked');

                $container.find('ul.resource-children input').each(function () {

                    $(this).prop('checked', checkStatus);

                });

            });
            $("select").select2();
            $(".module_id").select2().on("change", function(){
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
                            $('.parent_id').select2("destroy");
                            $('.parent_id').children("option").remove();
                            var json = $.parseJSON(data);
                            console.log(json);
                            $('.parent_id').append('<option value="0">None</option>');
                            $.each(json, function(index, value) {
                                $('.parent_id').append("<option value='"+value.id+"'>"+value.name+"</option>");
                            });
                            $('.parent_id').select2();
                        }
                    });
                });
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
                name_feature: {
                    required: true,
                    minlength: 2
                },
                'action[]': {
                    required: true
                },
            },
            messages: {
                name_feature: {
                    required: "{!!trans('messages.fail_empty')!!}",
                    minlength: "Please enter more than 2 characters"
                },
                'action[]': {
                    required: "{!!trans('messages.fail_empty')!!}",
                }
            }
        });
    </script>
</div>
@stop



