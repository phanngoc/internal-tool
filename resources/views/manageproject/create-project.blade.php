@extends ('layouts.master')

@section ('head.title')
  {{trans('messages.list_group')}}
@stop

@section('body.content')

  <link rel="stylesheet" type="text/css" href="{{ Asset('css/manageproject.css') }}">

  <script type="text/javascript" src="{{ Asset('jqueryganttview/jquery-1.4.2.js') }}"></script>

  <script type="text/javascript" src="{{ Asset('jqueryganttview/date.js') }}"></script>

  <script type="text/javascript" src="{{ Asset('jqueryganttview/jquery-ui-1.8.4.js') }}"></script>
  <link rel="stylesheet" type="text/css" href="{{ Asset('jqueryganttview/jquery-ui-1.8.4.css') }}" />

  <script type="text/javascript" src="{{ Asset('jqueryganttview/jquery.ganttView.js') }}"></script>
  <link rel="stylesheet" type="text/css" href="{{ Asset('jqueryganttview/jquery.ganttView.css') }}" />

  <script type="text/javascript" src="{!! Asset('treegrid/jquery-1.11.3.js') !!}"></script>

  <script type="text/javascript" src="{!! Asset('json2/json2.js') !!}"></script>

  <script src="{{Asset('bootstrap/js/select2.min.js')}}" type="text/javascript"></script>
  <link href="{{Asset('bootstrap/css/select2.min.css')}}" rel="stylesheet" type="text/css" />

  <script type="text/javascript" src="{{Asset('handlebars-v3.0.3.js')}}"></script>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      {{trans('messages.project_management')}}
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> {{trans('messages.dashboard')}}</a></li>
      <li class="active">{{trans('manageproject.list_detail_feature')}}</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">{{trans('manageproject.list_project')}}</h3>
            <a href="{{ route('manageproject.listproject') }}" class="btn btn-primary">{{ trans('manageproject.list_project') }}</a>
          </div>
          <div class="box-body">
            <div class="col-md-8 col-md-offset-2">
                {!! Form::open([
                  'route' => [ 'manageproject.postcreateproject' ],
                  'method' => 'POST',
                  'class' => 'edit'
                    ])
                !!}

                <div class="form-group">
                  <label>{{ trans('manageproject.projectname') }}<span class="text-red">*</span></label>
                  {!! Form::text('projectname', null, [ 'id' => 'projectname', 'class' => 'form-control','autofocus']) !!}
                  @if($errors->has('projectname'))<label for="projectname" class="error">{{$errors->first("projectname")}}</label>@endif
                </div>

                <div class="form-group">
                  <label>{{trans('manageproject.description')}}</label>
                  {!! Form::textarea('description', null, ['id'=>'description', 'class'=>'form-control']) !!}
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
          </div><!-- /.box-body -->
        </div>
      </div>
    </div>
  </section>
</div> <!-- .content-wrapper -->

<!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script> -->

<link rel="stylesheet" href="{{ Asset('jquery-ui/1.11.4/jquery-ui.css') }}">
<script src="{{ Asset('jquery-ui/1.11.4/jquery-ui.js') }}"></script>
@stop
