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
          {{trans('messages.device_management')}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> {{trans('messages.dashboard')}}</a></li>
            <li><a href="{{ route('employee') }}">{{trans('messages.device')}}</a></li>
            <li class="active">{{trans('messages.device')}}</li>
        </ol>
    </section>

    

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">

                    <div class="box-header">
                        <h3 class="box-title">{{trans('messages.list_device')}}</h3>
                               <a class="btn btn-primary pull-right" style="margin-right: 5px;" href="{!!route('devices.create') !!}"><i class="fa fa-user-plus"> {{trans('messages.add_device')}}</i></a>
                        <a class="btn btn-primary pull-right" href="{{ route('importemployee') }}">Import</i></a>
                        <a class="btn btn-primary pull-right" href="{{ route('exportemployee') }}">Export To Excel</i></a>

                    </div>
                    <div class="row">
                        <div class="col-sm-2" style="margin-left:1%;">
                           
                        </div>
                        
                    </div>
                    <div class="box-body">
                      <table id="example1" class="table table-bordered table-striped">
                            
  <thead>
                                <tr>
                                    <th style="width: 5%" class="text-center">#</th>
                             
                                     
                                    <th class="text-center">Name Device</th>
                                    <th class="text-center">Serial Device</th>
                                    <th class="text-center">Operating Systems </th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Contract Number</th>
                             
                                   
                                   
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php $number = 0;foreach ($device as $g): $number++;?>
                                  <tr>
                                      <td class="text-right">{{$number}}</td>
                                      
                       
                 

                     

                   
            
                                     
                                       <td>{{$g->device_name}}</td>
                                       <td>{{$g->serial_device}}</td>
                                        <td>{{$g->os_name}}</td>                 
                                        <td>{{$g->status}}</td>
                                         <td>{{$g->contract_number}}</td>
                                      <td>
                                                    <a href="{{ route('devices.show', $g->id) }}" class="text-blue" title="Edit">
                                                    <i class="fa fa-fw fa-edit"></i>
                                                    </a>
                                                    <a href="{{ route('devices.delete', $g->id)}}" class="text-red" data-method="delete" title="Delete" data-token="{{ csrf_token() }}">
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
