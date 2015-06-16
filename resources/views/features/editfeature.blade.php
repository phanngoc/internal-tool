@extends ('layouts.master')

@section ('head.title')
    {{trans('messages.edit_feature')}}
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
            <li class="active">{{trans('messages.edit_feature')}}</li>
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
                        <a class="btn btn-primary pull-right" href="{!!route('users.index') !!}">{{trans('messages.list_feature')}}</i></a>
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
                          'route' => [ 'features.update', $feature->id ],
                          'method' => 'PUT',
                          'class' => 'edit'
                            ])
                        !!}
                        <div class="form-group">
                          <label>Feature Module Name<span class="text-red">*</span></label>
                          {!! Form::text('feature_name', $feature->name_feature, [ 'id' => 'feature_name', 'class' => 'form-control','autofocus']) !!}
                        </div>
                        <div class="form-group">
                          <label>Description</label>
                          {!! Form::textarea('description',$feature->description,['id'=>'description', 'class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                          <label>Action<span class="text-red">*</span></label>
                          {!! Form::text('action',$feature->url_action,['id'=>'action', 'class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                          <label for='is_menu'>{{trans('messages.is_menu')}}</label>
                            {!! Form::checkbox('is_menu','1', $feature->is_menu==1 ? 'checked':'',['id'=>'is_menu']) !!}
                        </div>
                        <div class="form-group">
                            <label for="module_id">Module<span class="text-red">*</span></label>
                            <select name="module_id" class="form-control module_id">
                                @foreach ($modules as $b)
                                   @if($b->id == $feature->module_id)
                                    <option value="{{ $b->id }}" selected>{{ $b->name }} </option>
                                   @else
                                    <option value="{{ $b->id }}">{{ $b->name }} </option>
                                   @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="parent_id">Parent Feature<span class="text-red">*</span></label>
                            <select name="parent_id" class="form-control parent_id">
                                <option value="0">No Parent</option>

                                @foreach ($features as $a)
                                   @if($a->id == $feature->parent_id)
                                    <option value="{{ $a->id }}" selected>{{ $a->name_feature }} </option>
                                   @else
                                    <option value="{{ $a->id }}">{{ $a->name_feature }} </option>
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

    <script type="text/javascript">
        $(document).ready(function () {
            $(".parent_id").select2();
            $(".module_id").select2()
            .on("change", function(){
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
                        $('.parent_id').append('<option value="0">No Parent</option>');
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
        $(".edit").validate({
            rules: {
                feature_name: {
                    required: true,
                    minlength: 3
                },
                action: {
                    required: true,
                    minlength: 3
                }
            },
            messages: {
                feature_name: {
                    required: "You can't leave this empty",
                    minlength: "{{trans('messages.fail_message',['number'=>'3'])}}"
                },
                action: {
                    required: "You can't leave this empty",
                    minlength: "{{trans('messages.fail_message',['number'=>'3'])}}"
                }
            }
        });
    </script>
</div>
@stop



