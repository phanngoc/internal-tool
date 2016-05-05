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
            <a href="{{ route('manageproject.createproject') }}" class="btn btn-primary create-project">{{ trans('manageproject.create_project') }}</a>
          </div>
          <div class="box-body">
            <table class="table table-bordered">
              <tbody>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Project name</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
                <?php
                  $listProject = null;
                  if ($isDirectorOrManager) {
                    $listProject = $projects;
                  } else {
                    $listProject = $projectBelongUser;
                  }
                ?>
                
                @foreach($listProject as $project)
                  <tr>
                    <td>{{$project->id}}</td>
                    <td><a href="{{ route('manageproject.index',$project->id) }}">{{ $project->projectname }}</a></td>
                    <td>
                     {{$project->description}}
                    </td>
                    <td>
                      <a href="{{ route('manageproject.showProject', $project->id) }}" class="text-blue" title="Edit">
                          <i class="fa fa-fw fa-edit"></i>
                      </a>
        
                      <a href="{{ route('manageproject.destroyProject', $project->id)}}" class="text-red" data-method="delete" title="Delete" data-token="{{ csrf_token() }}">
                          <i class="fa fa-fw fa-ban"></i>
                      </a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div><!-- /.box-body -->
        </div>
      </div>
    </div>
  </section>
</div> <!-- .content-wrapper -->

<!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script> -->

<style type="text/css">
  .create-project {
    display: block;
    width: 146px;
    margin-top: 15px;
  }
</style>

<script type="text/javascript">
  $(document).on('click', 'a[data-method="delete"]', function() {
      var dataConfirm = $(this).attr('data-confirm');
      if (typeof dataConfirm === 'undefined') {
        dataConfirm = 'Are you sure delete this?';
      }
      var token = $(this).attr('data-token');
      var action = $(this).attr('href');
      if (confirm(dataConfirm)) {
        var form =
            $('<form>', {
              'method': 'POST',
              'action': action
            });
        var tokenInput =
            $('<input>', {
              'type': 'hidden',
              'name': '_token',
              'value': token
            });
        var hiddenInput =
            $('<input>', {
              'name': '_method',
              'type': 'hidden',
              'value': 'delete'
            });

        form.append(tokenInput, hiddenInput).hide().appendTo('body').submit();
      }
      return false;
  });
</script>

<link rel="stylesheet" href="{{ Asset('jquery-ui/1.11.4/jquery-ui.css') }}">
<script src="{{ Asset('jquery-ui/1.11.4/jquery-ui.js') }}"></script>
@stop
