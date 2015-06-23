@extends ('layouts.master')

@section ('head.title')

  {{trans('messages.list_user')}}

@stop


@section ('head.css')
  <link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="{{ Asset('jquery-ui/jquery-ui.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ Asset('jquery-ui/jquery-ui.theme.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ Asset('jquery-ui/jquery-ui.structure.css') }}" />
  <script type="text/javascript" src="{{ Asset('jquery-ui/jquery-ui.js') }}"></script>
@stop



@section ('body.content')

<div class="content-wrapper">
    <script type="text/javascript" src="{{ Asset('jqueryvalidate/jquery.validate.js') }}"></script>
    <section class="content-header">
        <h1>
          {{trans('messages.employee_manager')}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> {{trans('messages.dashboard')}}</a></li>
            <li><a href="{{ route('employee') }}">{{trans('messages.employee')}}</a></li>
            <li class="active">{{trans('messages.list_employee')}}</li>
        </ol>
    </section>

    <!-- FILTER -->
    <div class="row">
      <div class="col-sm-12">
        <h4 style="margin-left:1%;">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Filter</a>
        </h4>
        <div id="collapseOne" class="panel-collapse collapse">
          <div class="box-body">

            <form action="#">
              <div class="row">
                <div class="col-sm-2">
                  <div class="form-group">
                    <label for="employee_code">Code</label><br>
                    <select name="empoyee_code" id="empoyee_code">
                      <option value="0"></option>
                      <option value="1">MS01</option>
                      <option value="2">MS02</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-2">
                  <div class="form-group">
                    <label for="position">Position</label>
                    <select name="position" id="position">
                      <option value="0"></option>
                      <option value="1">Human Resources</option>
                      <option value="2">Management Server</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-2">
                  <div class="form-group">
                    <label for="nationality">Nationality</label>
                    <select name="nationality" id="nationality">
                      <option value="0"></option>
                      <option value="1">Viet Nam</option>
                      <option value="2">Nhat Ban</option>
                    </select>
                  </div>
                </div>
              </div>
            </form>

            <a href="#" class="btn btn-primary">Filter</a>
          </div>
        </div>
      </div>
    </div>
    <!-- END FILTER -->




    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">List Employees</h3>
                    </div>
                    <div class="row">
                        <div class="col-sm-2" style="margin-left:1%;">
                            <a class="btn btn-primary btn-block" href="{!!route('employee.create') !!}"><i class="fa fa-user-plus"> {{trans('messages.add_employee')}}</i></a>
                        </div>
                        <div class="pull-right" style="margin-right:2%;">
                            <a class="btn btn-primary pull-right" href="{{ route('exportemployee') }}">Export To Excel</i></a>
                        </div>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 5%" class="text-center">#</th>
                                    <th class="text-center">First Name</th>
                                    <th class="text-center">Last Name</th>
                                    <th class="text-center">Employee ID Number</th>
                                    <th class="text-center">Mobile Phone</th>
                                    <th class="text-center">Position</th>
                                    <th style="width: 10%" class="text-center">{{trans('messages.actions')}}</th>
                                </tr>
                            </thead>
                            <tbody>
<?php $number = 0;foreach ($employees as $g): $number++;?>
										<tr>
										<td class="text-right">{{$number}}</td>
										<td>{{$g->firstname}}</td>
										<td>{{$g->lastname}}</td>
										<td>{{$g->employee_code}}</td>
										<td>{{$g->phone}}</td>
										<td>{{$g->position_name}}</td>
										<td>
										<a href="{{ route('employee.editmore', $g->id) }}" class="text-blue" title="Edit">
										<i class="fa fa-fw fa-edit"></i>
										</a>
										<a href="{{ route('employee.delete', $g->id)}}" class="text-red" data-method="delete" title="Delete" data-token="{{ csrf_token() }}">
										<i class="fa fa-fw fa-ban"></i>
										</a>
										</td>
										</tr>
										<?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
@stop
