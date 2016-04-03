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
    
    #example1_filter label, #example1_paginate {
      float: right;
    }

  </style>

  <script type="text/javascript" src="{{ Asset('jquery-ui/jquery-ui.js') }}"></script>
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
                        <h3 class="box-title">{{trans('messages.list_kind_device')}}</h3>
                    </div>
                    <div class="box-body">
                      <div class="col-sm-6">
                        <a class="btn btn-primary" style="margin-left: -15px;" href="{!!route('kinddevices.create') !!}"><i class="fa fa-user-plus"> {{trans('messages.add_kind_device')}}</i></a>
                      </div>
                      <table id="example1" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                                <th style="width: 5%" class="text-center">#</th>
                                <th class="text-center">{{trans('messages.type_device')}}</th>
                                <th class="text-center">{{trans('messages.device_name')}}</th>
                                <th class="text-center">{{trans('messages.quantity')}}</th>
                                <th class="text-center">{{trans('messages.action')}}</th>
                            </tr>
                          </thead>
                          <tbody>
                                {{--*/ $number = 0 /*--}}
                                @foreach($kindDevices as $kind)
	                                <tr>
	                                <td class="text-right">{{++$number}}</td>
	                                <td>{{$kind->type_device->type_name}}</td>
	                                <td>{{$kind->device_name}}</td>
	                                <td>{{$kind->quantity}}</td>
	                                <td>
  	                                <a href="{{ route('kinddevices.show', $kind->id) }}" class="text-blue" title="{{trans('messages.edit')}}">
  	                                 <i class="fa fa-fw fa-edit"></i>
  	                                </a>
  	                                <a href="{{ route('kinddevices.destroy', $kind->id)}}" class="text-red" data-method="delete" title="{{trans('messages.delete')}}" data-token="{{ csrf_token() }}">
  	                                 <i class="fa fa-fw fa-ban"></i>
  	                                </a>
	                                </td>
	                                </tr>
                                @endforeach
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
