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

  <!-- Date time picker -->
  <link rel="stylesheet" href="{{Asset('jquery-datetimepicker/jquery.datetimepicker.css')}}" />
  <script type="text/javascript" src="{{ Asset('jquery-datetimepicker/jquery.datetimepicker.full.js') }}"></script>
  <!-- End Date time picker -->

  <script id="iteminput" type="text/x-handlebars-template">
    <li><label for="item">Name </label><input name="item"/> <label for="startDate">Start date </label><input name="startDate"/> <label for="endDate">End date </label><input name="endDate"/><a class="delete">Delete</a><a class="add">Add</a></li>
  </script>


@include('manageproject.js-grantt')

@include('manageproject.modal')


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
                    <h3 class="box-title">{{trans('manageproject.list_detail_feature')}}</h3>
                  </div>
                  <div class="box-body">
                    <div class="header-managerproject row">
                       <div class="col-md-4">
                         <a href="{{ route('manageproject.createDetailFeature', $projectId) }}" class="btn btn-primary">{{ trans('manageproject.create_detail_feature') }}</a>
                       </div>
                       <div class="col-md-8">
                        <?php if (check(array('manageproject.assignUserToProject'), $allowed_routes)): ?>
                            <a href="{{ route('manageproject.assignUserToProject', $projectId) }}" class="btn btn-primary pull-right">{{ trans('manageproject.assignUserToProject') }}</a>
                        <?php endif ?>   
                        <a href="{{ route('manageproject.listproject') }}" class="btn btn-primary pull-right" style="margin-right: 10px;">{{ trans('manageproject.list_project') }}</a>
                       </div>
                    </div>
                    <!-- repair -->
                    <div class="nav-tabs-custom">
                          <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Issue</a></li>
                            <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Grantt</a></li>
                          </ul>
                          <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                             <div id="filter-bar">
                              <form id="form-filter" method="GET" action="{{ route('manageproject.index') }}">
                                <div class="group-filter">
                                   <label>Status</label>
                                   <select class="form-control select2 control-filter" name="status[]" multiple="multiple">
                                     @foreach ($statusprojects as $status)
                                      @if (in_array($status->id, $selectStatus))
                                        <option value="{{ $status->id }}" selected>{{ $status->name }}</option>
                                      @else
                                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                                      @endif                          
                                     @endforeach
                                   </select>
                                </div>
                                <div class="group-filter">
                                  <label>Priority</label>
                                  <select class="form-control select2 control-filter" name="priority[]" multiple="multiple">
                                     @foreach ($priorities as $priority)
                                      @if (in_array($priority->id, $selectPriority))
                                        <option value="{{ $priority->id }}" selected>{{ $priority->name }}</option>
                                      @else
                                        <option value="{{ $priority->id }}">{{ $priority->name }}</option>
                                      @endif   
                                      
                                     @endforeach
                                  </select>
                                </div>
                                <div class="group-filter">
                                  <label>Assigned To</label>
                                  <select class="form-control select2 control-filter" name="assigned_to[]" multiple="multiple">
                                     @foreach ($employees as $employee)
                                      @if (in_array($employee->id, $selectAssignedTo))
                                        <option value="{{ $employee->id }}" selected>{{ $employee->lastname.' '.$employee->firstname }}</option>
                                      @else
                                        <option value="{{ $employee->id }}">{{ $employee->lastname.' '.$employee->firstname }}</option>
                                      @endif  
                                      
                                     @endforeach
                                  </select>
                                </div>

                                <div class="group-filter">
                                  <label>Due Date</label>
                                  <input name="due_date" id="datepicker" class="datetimepicker" value="{{$selectEndDate}}"/>
                                </div>

                                <div class="group-filter">
                                  <button class="btn btn-primary">Search</button>
                                </div>
                              </form>
                             </div>
                             <div class="box box-info">
                                  <table class="table table-bordered">
                                    <tbody>
                                      <tr>
                                        <th>Id</th>
                                        <th>Status</th>
                                        <th>Priority</th>
                                        <th>Title</th>
                                        <th>Assigned To</th>
                                        <th>Start date</th>
                                        <th>End date</th>
                                        <th>%Done</th>
                                        <th>Action</th>
                                      </tr>
                                      @forelse ($detailfeatures as $depo)
                                        <tr>
                                          <td>{{ $depo->id }}</td>
                                          <td><span class="label-color" style="color:{{ $depo->status()->get()[0]->color }};background-color:{{ $depo->status()->get()[0]->background }}">{{ $depo->status()->get()[0]->name }}</span></td>
                                          <td><span class="label-color" style="background-color:{{ $depo->priority()->get()[0]->color }}">{{ $depo->priority()->get()[0]->name }}</span></td>
                                          <td><a href="{{ route('manageproject.editDetailFeature',$depo->id) }}">{{ $depo->name }}</a></td>
                                          <td>
                                          @foreach ($depo->employees()->get() as $employee)
                                            <span class="name_assigned">{{ $employee->lastname.' '.$employee->firstname }}</span>
                                          @endforeach
                                          </td>
                                          <td>{{ $depo->startdate }}</td>
                                          <td>{{ $depo->enddate }}</td>
                                          <td>{{ $depo->done }}%</td>
                                          <td>
                                            <a href="{{ route('manageproject.deleteDetailFeature',$depo->id)}}" class="text-red" data-method="delete" title="Delete" data-token="{{ csrf_token() }}">
                                                <i class="fa fa-fw fa-ban"></i>
                                            </a>
                                          </td>
                                        </tr>
                                      @empty
                                        You currently do not have item.
                                      @endforelse
                                    </tbody>
                                  </table>
                                  {!! $pagiDetailfeatures->render() !!}
                             </div> <!-- .box box-info -->
                           </div> <!-- #tab_1 -->
                           <div class="tab-pane" id="tab_2">
                            <div class="box box-info">
                                <div class="wrapper-input-select">
                                    <label>Select month</label>   
                                    <input type="text" id="datepickerchangegrantt" readOnly />
                                </div>
                                <div id="ganttChart"></div>
                                <div class="footer-managerproject row">
                                  <button class="btn btn-primary col-md-offset-10 saveall">Save</button>
                                </div>
                            </div>
                           </div> <!-- #tab_2 -->
                         </div> <!-- .tab-content -->
                    <!-- repair -->
                    <br/>
                    <div id="eventMessage"></div>
                  </div><!-- /.box-body -->
                </div>
              </div>
        </div>
  </section>
</div>

<!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script> -->

<link rel="stylesheet" href="{{ Asset('jquery-ui/1.11.4/jquery-ui.css') }}">
<script src="{{ Asset('jquery-ui/1.11.4/jquery-ui.js') }}"></script>

<style type="text/css">

.ui-datepicker-calendar {
  display: none;
}

.footer-managerproject {
  padding-top: 20px;
  padding-bottom: 20px;
}

.control-filter {
  width: 160px;
}

.group-filter {
  display: block;
  float: left;
  margin-right: 16px;
}

#filter-bar {
  display: block;
  clear: both;
  padding-top: 10px;
  padding-bottom: 10px;
}

#filter-bar:after {
  content: ".";
  visibility: hidden;
  display: block;
  clear: both;
  height: 0;
  font-size: 0;
}

#filter-bar label {
  display: block;
  width: 160px;
  background-color: #D0D0A5;
  border-radius: 4px;
  padding: 5px;
  border: 1px solid #D09C9C;
}

input[name="due_date"] {
  width: 160px;
}

.select2-container .select2-selection {
    height: 115px;
    overflow: scroll;
} 
</style>

<script type="text/javascript">
      $('.select2').select2();

      $('.datetimepicker').datetimepicker({format:'Y-m-d',});

      $(document).on('click', 'a[data-method="delete"]', function() {
        var dataConfirm = $(this).attr('data-confirm');
        if (typeof dataConfirm === 'undefined') {
          dataConfirm = 'Are you sure delete this detail project?';
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
@stop
