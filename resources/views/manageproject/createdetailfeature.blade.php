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
    <li class="active">{{trans('manageproject.create_detail_feature')}}</li>
  </ol>
</section>
<section class="content">
          <div class="row">
            <div class="col-md-12">
              <!-- general form elements disabled -->
              <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">{{trans('manageproject.create_detail_feature')}}</h3>
                    <a class="btn btn-primary pull-right" href="{!!route('manageproject.index', $projectId) !!}">{{trans('manageproject.list_detail_feature')}}</i></a>
                </div>
               {!! Form::open( [
                  'route' => [ 'manageproject.postCreateDetailFeature', $projectId],
                  'method' => 'POST',
                  'class' => 'create'
                    ])
                !!}
                <div class="box-body">
                  <div class="col-md-8 col-md-offset-2">

                    <div class="form-group">
                      <label>Name<span class="text-red">*</span></label>
                      {!! Form::text('name', null, [ 'id' => 'name', 'class' => 'form-control', 'autofocus']) !!}
                      @if($errors->has('name'))<label for="name" class="error">{{$errors->first("name")}}</label>@endif
                    </div>

                    <div class="form-group">
                      <label>Description</label>
                      <textarea name="description" class="form-control"></textarea>
                      @if($errors->has('description'))<label for="description" class="error">{{$errors->first("description")}}</label>@endif
                    </div>

                    <div class="form-group">
                      <label>Status<span class="text-red">*</span></label>
                      <select name='status_id' id='status_id' class="form-control">
                        @foreach($statusprojects as $status)                    
                          <option value="{{ $status->id }}">{{ $status->name }}</option>
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
                      <select class="form-control select2" name="employees[]" multiple>
                        @foreach ($employees as $employee)
                          <option value="{{ $employee->id }}">{{ $employee->lastname." ".$employee->firstname }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="priority_id" class="label-edit-data">Priority<span class="text-red">*&nbsp;</span></label>
                      <select name='priority_id' class="form-control select-edit-data">
                      @foreach ($priorities as $priority)
                        <option value="{{ $priority->id }}">{{ $priority->name }}</option>
                      @endforeach
                      </select>
                      <a class="edit-data" href="{{ route('crud.index','priority') }}"><i class="fa fa-pencil-square-o"></i></a>
                      @if($errors->has('priority_id'))<label for="priority_id" class="error">{{$errors->first("priority_id")}}</label>@endif
                    </div>

                    <div class="form-group">
                      <label class="label-edit-data">Feature project<span class="text-red">*&nbsp;</span></label>
                      <select name='featureproject_id' id='featureproject_id' class="form-control select-edit-data">
                      @foreach ($featureprojects as $feapro)
                        <option value="{{ $feapro->id }}">{{ $feapro->name }}</option>
                      @endforeach
                      </select>
                      <a class="edit-data" href="{{ route('crud.index','featureproject') }}"><i class="fa fa-pencil-square-o"></i></a>
                      @if($errors->has('featureproject_id'))<label for="featureproject_id" class="error">{{$errors->first("featureproject_id")}}</label>@endif
                    </div>

                    <div class="form-group">
                      <label class="label-edit-data">Type Feature<span class="text-red">*&nbsp;</span></label>
                      <select name='category_feature_id' id='category_feature_id' class="form-control select-edit-data">
                      @foreach ($categoryfeatures as $catefea)
                        <option value="{{ $catefea->id }}">{{ $catefea->name }}</option>
                      @endforeach
                      </select>
                      <a class="edit-data" href="{{ route('crud.index','category_feature') }}"><i class="fa fa-pencil-square-o"></i></a>
                      @if($errors->has('category_feature_id'))<label for="category_feature_id" class="error">{{$errors->first("category_feature_id")}}</label>@endif
                    </div>

                    <div class="form-group">
                      <label for="startdate">Start date<span class="text-red">*&nbsp;</span></label>
                      <input type="text" name="startdate" class="datepicker form-control"/>
                      @if($errors->has('startdate'))<label for="startdate" class="error">{{$errors->first("startdate")}}</label>@endif
                    </div>  

                    <div class="form-group">
                      <label for="enddate">End date<span class="text-red">*&nbsp;</span></label>
                      <input type="text" name="enddate" class="datepicker form-control"/>
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

<link rel="stylesheet" type="text/css" href="{{ Asset('css/detailfeature.css') }}">

    @include('manageproject.js-detailfeature')

    <script type="text/javascript">
        $(document).ready(function () {
            $('#name').focus();
            $('input[name="done"]').bootstrapSlider().bootstrapSlider('setValue', 50);
            $('.datepicker').datepicker({ dateFormat: 'yy-mm-dd 00:00:00' });
            $('.select2').select2();
            $('input[name="startdate"]').val(getToday());
            $('input[name="enddate"]').val(getToday());
        });
    </script>

</div>

@stop