@extends('layouts.master')
@section ('head.title')
  {{trans('messages.edit_module')}}
@stop

@section('body.content')
   <!-- Bootstrap slider -->

<div class="content-wrapper">
<section class="content-header">
  <h1>
    {{trans('messages.project_management')}}
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{route('index')}}"><i class="fa fa-dashboard"></i> {{trans('messages.dashboard')}}</a></li>
    <li><a href="{{ route('modules.index') }}">{{trans('messages.project_management')}}</a></li>
    <li class="active">{{trans('manageproject.edit_detail_feature')}}</li>
  </ol>
</section>
<section class="content">
          <div class="row">
            <div class="col-md-12">
              <!-- general form elements disabled -->
              <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">{{trans('manageproject.edit_detail_feature')}}</h3>
                    <a class="btn btn-primary pull-right" href="{!!route('manageproject.index') !!}">{{trans('manageproject.list_detail_feature')}}</i></a>
                </div>
               {!! Form::open( [
                  'route' => [ 'manageproject.postEditDetailFeature', $detailfeature->id ],
                  'method' => 'PUT',
                  'class' => 'edit'
                    ])
                !!}
                <div class="box-body">
                  <div class="col-md-8 col-md-offset-2">

                    <div class="form-group">
                      <label>Name<span class="text-red">*</span></label>
                      {!! Form::text('name', $detailfeature->name, [ 'id' => 'name', 'class' => 'form-control', 'autofocus']) !!}
                      @if($errors->has('name'))<label for="name" class="error">{{$errors->first("name")}}</label>@endif
                    </div>

                    <div class="form-group">
                      <label>Description</label>
                      <textarea name="description" class="form-control">{{ $detailfeature->description }}</textarea>
                      @if($errors->has('description'))<label for="description" class="error">{{$errors->first("description")}}</label>@endif
                    </div>

                    <div class="form-group">
                      <label>Status<span class="text-red">*</span></label>
                      <select name='status_id' id='status_id' class="form-control">
                        @foreach($statusprojects as $status)
                          @if($status->id == $detailfeature->status_id)
                          <option value="{{ $status->id }}" selected='selected'>{{ $status->name }}</option>
                          @else
                          <option value="{{ $status->id }}">{{ $status->name }}</option>
                          @endif
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Done (%) <span class="text-red">*&nbsp;</span></label>
                      <input name="done" class="form-control" data-slider-min="1" data-slider-max="100"/>  
                      @if($errors->has('done'))
                        <label for="done" class="error">{{$errors->first("done")}}</label>
                      @endif
                    </div>

                    <div class="form-group">
                      <label>Priority<span class="text-red">*&nbsp;</span></label>
                      <select name='priority_id' class="form-control">
                      @foreach($priorities as $priority)
                        @if($priority->id == $detailfeature->priority_id)
                        <option value="{{ $priority->id }}" selected='selected'>{{ $priority->name }}</option>
                        @else
                        <option value="{{ $priority->id }}">{{ $priority->name }}</option>
                        @endif
                      @endforeach
                      </select>
                      @if($errors->has('priority_id'))<label for="priority_id" class="error">{{$errors->first("priority_id")}}</label>@endif
                    </div>

                    <div class="form-group">
                      <label>Feature project<span class="text-red">*&nbsp;</span></label>
                      <select name='featureproject_id' id='featureproject_id' class="form-control">
                      @foreach($featureprojects as $feapro)
                        @if($feapro->id == $detailfeature->featureproject_id)
                        <option value="{{ $feapro->id }}" selected='selected'>{{ $feapro->name }}</option>
                        @else
                        <option value="{{ $feapro->id }}">{{ $feapro->name }}</option>
                        @endif
                      @endforeach
                      </select>
                      @if($errors->has('featureproject_id'))<label for="featureproject_id" class="error">{{$errors->first("featureproject_id")}}</label>@endif
                    </div>

                    <div class="form-group">
                      <label>Type Feature<span class="text-red">*&nbsp;</span></label>
                      <select name='category_feature_id' id='category_feature_id' class="form-control">
                      @foreach($categoryfeatures as $catefea)
                        @if($catefea->id == $detailfeature->category_feature_id)
                        <option value="{{ $catefea->id }}" selected='selected'>{{ $catefea->name }}</option>
                        @else
                        <option value="{{ $catefea->id }}">{{ $catefea->name }}</option>
                        @endif
                      @endforeach
                      </select>
                      @if($errors->has('category_feature_id'))<label for="category_feature_id" class="error">{{$errors->first("category_feature_id")}}</label>@endif
                    </div>

                    <div class="form-group">
                      <label for="startdate">Start date<span class="text-red">*&nbsp;</span></label>
                      <input type="text" name="startdate" class="datepicker form-control" value="{{ $detailfeature->startdate }}"/>
                      @if($errors->has('startdate'))<label for="startdate" class="error">{{$errors->first("startdate")}}</label>@endif
                    </div>  

                    <div class="form-group">
                      <label for="enddate">End date<span class="text-red">*&nbsp;</span></label>
                      <input type="text" name="enddate" class="datepicker form-control" value="{{ $detailfeature->enddate }}" />
                      @if($errors->has('enddate'))<label for="enddate" class="error">{{$errors->first("enddate")}}</label>@endif
                    </div>  

                    <div class="box-footer center">
                      <div class="form-group">
                          <div class="text-center">
                              <input class="btn-primary btn" id="btn-submit-group" type="submit" value="{{trans('messages.save')}}">
                              <input type='reset' name='reset' id='reset' class="btn btn-primary" value="{{trans('messages.reset')}}">
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
                {!! Form::close() !!}
              </div><!-- /.box -->
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
</section>

    <!-- Jquery ui     -->
    <script type="text/javascript" src="{{ Asset('jquery-ui/jquery-ui.js') }}"></script>
    <link rel="stylesheet" href="{{ Asset('jquery-ui/jquery-ui.css') }}"></script>

    <!-- Bootstrap slider -->
    <script type="text/javascript" src="{{ Asset('bootstrap-slider/bootstrap-slider.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ Asset('bootstrap-slider/bootstrap-slider.min.css') }}" />

    <script type="text/javascript">
        $(document).ready(function () {
            $('#name').focus();
            $('input[name="done"]').bootstrapSlider().bootstrapSlider('setValue', {{ $detailfeature->done }});
            $('.datepicker').datepicker({ dateFormat: 'yy-mm-dd 00:00:00' });
        });
    </script>
    <script>
        $(".edit").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 2
                },
                version: {
                    required: true,
                    minlength: 3
                }
            },
            messages: {
                name: {
                    required: "{{trans('messages.fail_empty')}}",
                    minlength: "Please enter more than 2 characters"
                },
                version: {
                    required: "{{trans('messages.fail_empty')}}",
                    minlength: "Please enter more than 2 characters"
                }
            }
        });
    </script>
</div>

@stop