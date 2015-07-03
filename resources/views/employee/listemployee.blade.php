@extends ('layouts.master')

@section ('head.title')

  {{trans('messages.list_user')}}

@stop


@section ('head.css')
  <link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
  <link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="{{ Asset('jquery-ui/jquery-ui.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ Asset('jquery-ui/jquery-ui.theme.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ Asset('jquery-ui/jquery-ui.structure.css') }}" />

  <style type="text/css">
    .ui-datepicker-month{
      color: #000000;
    }

    .ui-datepicker-year{
      color: #000000;
    }
  </style>

  <script type="text/javascript" src="{{ Asset('jquery-ui/jquery-ui.js') }}"></script>

  <script type="text/javascript">
    $(document).ready(function(){
      $("#birthday").datepicker({
          dateFormat: 'yy-mm',
          changeMonth: true,
          changeYear: true,
          showButtonPanel: false,

          onClose: function(dateText, inst) {
              var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
              var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
              $(this).val($.datepicker.formatDate('yy-mm', new Date(year, month, 1)));
          }
      });

      $("#birthday").focus(function () {
          $(".ui-datepicker-calendar").hide();
          $("#ui-datepicker-div").position({
              my: "center top",
              at: "center bottom",
              of: $(this)
          });
      });
  });
  </script>
@stop



@section ('body.content')
<script src="{{Asset('bootstrap/js/select2.min.js')}}" type="text/javascript"></script>
<link href="{{Asset('bootstrap/css/select2.min.css')}}" rel="stylesheet" type="text/css" />

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
    <!-- <div class="row">
      <div class="col-sm-12">
        <h4 style="margin-left:1%;">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Filter</a>
        </h4>
        <div id="collapseOne" class="panel-collapse collapse">
          <div class="box-body">
    
            <form action="{{route('filteremployee')}}" method="POST">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="row">
                <div class="col-sm-2">
                  <div class="form-group">
                    <label for="position">Position</label><br>
                    <select name="position" id="position" class="form-control">
                      <option value=""></option>
                      @foreach($positions as $p)
                        <option value="{{$p->id}}">{{$p->name}}</option>
                      @endforeach()
                    </select>
                  </div>
                </div>
                <div class="col-sm-2">
                  <div class="form-group">
                    <label for="nationality">Nationality</label><br>
                    <select name="nationality" id="nationality" class="form-control">
                      <option value=""></option>
                      @foreach($nationalities as $n)
                        <option value="{{$n->id}}">{{$n->name}}</option>
                      @endforeach()
                    </select>
                  </div>
                </div>
                <div class="col-sm-2">
                  <div class="form-group">
                    <label for="gender">Gender</label><br>
                    <select name="gender" id="gender" class="form-control">
                      <option value=""></option>
                      <option value="0">Nu</option>
                      <option value="1">Nam</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-2">
                  <div class="form-group">
                    <label for="birthday">Birthday</label><br>
                    <input type="text" name="birthday" class="form-control birthday" id="birthday" value="">
                  </div>
                </div>
              </div>
    
              <input type='submit' class='btn btn-primary' value="Filter">
    
            </form>
          </div>
        </div>
      </div>
    </div> -->
    <!-- END FILTER -->

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
                            <a class="btn btn-primary" style="margin-left: -15px;" href="{!!route('employee.create') !!}"><i class="fa fa-user-plus"> {{trans('messages.add_employee')}}</i></a>
                            <a class="btn btn-primary" href="{!!route('exportemployee') !!}"><i class="fa fa-file-excel-o"> Export</i></a>
                          </div>
                            <thead>
                                <tr>
                                    <th style="width: 5%" class="text-center">#</th>
                                    <th class="text-center">Employee's Code</th>
                                    <th class="text-center">First Name</th>
                                    <th class="text-center">Last Name</th>
                                    <th class="text-center">Phone</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Position</th>
                                    <th style="width: 10%" class="text-center">Actions</th>
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
											          <td>{{$g->email}}</td>
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
@stop
