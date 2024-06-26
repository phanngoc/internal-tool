@extends ('layouts.master')

@section ('head.title')

  {{trans('messages.list_employee')}}

@stop


@section ('head.css')
  <link href="{{ Asset('plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="{{ Asset('jquery-ui/jquery-ui.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ Asset('jquery-ui/jquery-ui.theme.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ Asset('jquery-ui/jquery-ui.structure.css') }}" />
  <script type="text/javascript" src="{{ Asset('jquery-ui/jquery-ui.js') }}"></script>
@stop



@section ('body.content')

<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

<div class="content-wrapper">
    <script type="text/javascript" src="{{ Asset('jqueryvalidate/jquery.validate.js') }}"></script>
    <section class="content-header">
        <h1>
            Employees Management
          </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> {{trans('messages.dashboard')}}</a></li>
            <li><a href="{{ route('employee') }}">Employees</a></li>
            <li class="active">{{trans('messages.list_employee')}}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">List Employees</h3>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                          <div class="col-sm-6">
                            <a class="btn btn-primary" style="margin-left: -15px;" href="{!!route('employee.create') !!}"><i class="fa fa-plus-circle"> {{trans('messages.add_employee')}}</i></a>
                            <a class="btn btn-primary" href="{!!route('exportemployee') !!}"><i class="fa fa-file-excel-o"> Export</i></a>
                          </div>
                            <thead>
                                <tr>
                                    <th style="width: 5%" class="text-center">#</th>
                                    <th class="text-center" style="width: 10%">Code</th>
                                    <th class="text-center">Full Name</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Phone</th>
                                    <th class="text-center">Position</th>
                                    <th class="text-center">Gender</th>
                                    <th style="width: 10%" class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php $number = 0;foreach ($employees as $g): $number++;?>
																<tr>
																<td class="text-center">{{$number}}</td>
                                <td>{{$g->employee_code}}</td>
																<td><a href="{{ route('employee.editmore', $g->id) }}?action=edit">{{$g->lastname." ".$g->firstname}}</a></td>
																<td>{{$g->email}}</td>
											          <td>{{$g->phone}}</td>
																<td>{{$g->position_name}}</td>
                                <td>{{$g->gender==0?'Male':'Female'}}</td>
																<td class="text-center">
																<a href="{{ route('employee.editmore', $g->id) }}" class="text-blue" title="View">
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
@section ('body.js')
<script type="text/javascript" src="{{asset('plugins/json2html/json2html.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/json2html/jquery.json2html.js')}}"></script>
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}" type="text/javascript"></script>
<script src="{{asset('plugins/datatables/dataTables.bootstrap.min.js')}}" type="text/javascript"></script>
<script type="text/javascript">
      $(function () {
        $('#example1').dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": true,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false
        });
      });
</script>

<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,600,400' rel='stylesheet' type='text/css'>
@stop
