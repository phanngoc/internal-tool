@extends ('layouts.master')

@section ('head.title')
  {{trans('messages.list_group')}}
@stop

@section('body.content')

  <link rel="stylesheet" type="text/css" href="{{ Asset('css/manageproject.css') }}">

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
            <h3 class="box-title">{{trans('manageproject.assignUserToProject')}} <b>{{$project->projectname}}</b></h3>
            <a href="{{route('manageproject.index', $project->id)}}" class="btn btn-primary">{{trans('manageproject.list_project')}}</a>
          </div>
          <div class="box-body">
            <form action="{{route('manageproject.postAssignEmployeeToProject', $project->id)}}" method="POST">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <div class="form-group">
                <label for="employees">Assign user to project:</label>
                <select name="employees[]" id="employees" multiple="multiple" class="select2">
                  @foreach($employees as $employee)
                    @if (in_array($employee->id, $employeeSelected))
                      <option value="{{ $employee->id }}" selected="selected">{{ $employee->lastname." ".$employee->firstname }}</option>
                    @else
                      <option value="{{ $employee->id }}">{{ $employee->lastname." ".$employee->firstname }}</option>
                    @endif
                  @endforeach
                </select>
              </div>
              <button id="save-user-assign" class="btn btn-primary">Save</button>
            </form>
          </div><!-- /.box-body -->
        </div>
      </div>
    </div>
  </section>
</div> <!-- .content-wrapper -->

<script type="text/javascript">
  $(document).ready(function(){
    $('.select2').select2();
    $('#save-user-assign').click(function(){

    });
  });
</script>

<style type="text/css">
  #employees {
    display: block;
    width: 400px;
  }
</style>

<!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script> -->

<link rel="stylesheet" href="{{ Asset('jquery-ui/1.11.4/jquery-ui.css') }}">
<script src="{{ Asset('jquery-ui/1.11.4/jquery-ui.js') }}"></script>
@stop
