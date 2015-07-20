@extends ('layouts.master')

@section ('head.title')
    {{trans('messages.edit_feature')}}
@stop

@section ('head.css')
<style type="text/css" media="screen">
    #is_menu{
        position: absolute;
    }
</style>
@stop

@section ('body.content')
<link href="{{Asset('bootstrap/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
<script src="{{Asset('bootstrap/js/select2.min.js')}}" type="text/javascript"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{trans('messages.feature_module_management')}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> {{trans('messages.dashboard')}}</a></li>
            <li><a href="{{ route('features.index') }}">{{trans('messages.feature_module')}}</a></li>
            <li class="active">Edit Feature Module</li>
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
                        <h3 class="box-title">Edit Feature Module</h3>
                        <a class="btn btn-primary pull-right" href="{!!route('features.index') !!}">{{trans('messages.list_feature')}}</i></a>
                    </div>
                    <!-- form start -->
                    <div class="box-body">
                        <div class="col-md-8 col-md-offset-2">
                                {!! Form::open( [
                              'route' => [ 'features.update', $feature->id ],
                              'method' => 'PUT',
                              'class' => 'edit'
                                ])
                            !!}
                            <div class="form-group">
                              <label>Feature Module Name<span class="text-red">*</span></label>
                              {!! Form::text('name_feature', $feature->name_feature, [ 'id' => 'name_feature', 'class' => 'form-control','autofocus']) !!}
                              @if($errors->has('name_feature'))<label for="name_feature" class="error">{{$errors->first("name_feature")}}</label>@endif
                            </div>
                            <div class="form-group">
                              <label>{{trans('messages.description')}}</label>
                              {!! Form::textarea('description',$feature->description,['id'=>'description', 'class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                    <label for="action">{{trans('messages.action')}}<span class="text-red">*</span></label><br>
                                    {!! Form::select('action[]',$routes,$routeselect, ['id'=>'action','class'=>'form-control action-url select2','multiple'=>'true', 'style'=>'width:100%']) !!}
                                    @if($errors->has('action'))<label for="action" class="error">{{$errors->first("action")}}</label>@endif
                                </div>
                            <div class="form-group">
                              <label for='is_menu'>{!!trans('messages.is_menu')!!}}&nbsp;</label>
                                {!! Form::checkbox('is_menu','1', $feature->is_menu==1 ? 'checked':'',['id'=>'is_menu']) !!}
                            </div>
                            <div class="form-group">
                                <label for="module_id">Module Name<span class="text-red">*</span></label>
                                <select name="module_id" id='module_id' class="form-control module_id select2" style="width:100%;">
                                    @foreach ($modules as $b)
                                       @if($b->id == $feature->module_id)
                                        <option value="{{ $b->id }}" selected>{{ $b->name }} </option>
                                       @else
                                        <option value="{{ $b->id }}">{{ $b->name }} </option>
                                       @endif
                                    @endforeach
                                </select>
                                @if($errors->has('module_id'))<label for="module_id" class="error">{{$errors->first("module_id")}}</label>@endif
                            </div>
                            <div class="form-group">
                                <label for="parent_id">Parent Feature Name<span class="text-red">*</span></label>
                                <select name="parent_id" id='parent_id' class="form-control parent_id select2" style="width:100%;">
                                    <option value="0">None</option>
                                    @foreach ($features as $a)
                                       @if($a->id == $feature->parent_id)
                                        <option value="{{ $a->id }}" selected>{{ $a->name_feature }} </option>
                                       @else
                                        <option value="{{ $a->id }}">{{ $a->name_feature }} </option>
                                       @endif
                                    @endforeach
                                </select>
                                @if($errors->has('parent_id'))<label for="parent_id" class="error">{{$errors->first("parent_id")}}</label>@endif
                            </div>

                            <div class="box-footer center">
                                <div class="form-group">
                                    <div class="text-center">
                                        <input class="btn-primary btn" id="btn-submit-group" type="submit" value="{{trans('messages.save')}}">
                                        <input type='reset' name='reset' id='reset' class="btn btn-primary" value="{{trans('messages.reset')}}">
                                    </div>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        $(document).ready(function () {
            $("select").select2();
            $(".module_id").select2()
            .on("change", function(){
                var id_module = $(this).val();
               var link = "{!! route('post-parent') !!}";
               $.ajax({
                    url : link,
                    type : "get",
                    dateType:"json",
                    data : {
                      id: id_module,
                      id_feature : {!!$feature->id!!}
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
            $('#feature_name').focus();
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
        $(".edit").validate({
            rules: {
                name_feature: {
                    required: true,
                    minlength: 2
                },
                'action[]': {
                    required: true,
                }
            },
            messages: {
                name_feature: {
                    required: "{{trans('messages.fail_empty')}}",
                    minlength: "Please enter more than 2 characters"
                },
                'action[]': {
                    required: "{{trans('messages.fail_empty')}}",
                }
            }
        });
    </script>
</div>
@stop



