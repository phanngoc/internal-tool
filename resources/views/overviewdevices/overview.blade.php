@extends ('layouts.master')
@section ('head.title')
{{trans('messages.list_user')}}
@stop
@section ('head.css')
  <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('plugins/datatables/dataTables.bootstrap.min.js')}}" type="text/javascript"></script>
  <link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
  <style>
  .modal {
    position: absolute;
    top: 0px;
    right: 0px;
    bottom: 0px;
    left: 0px;
    z-index: 1000;
    background: rgba( 255, 255, 255, .8 )
                url({{asset('images/loading.gif')}})
                50% 50%
                no-repeat;
}

.box-body.loading {
    overflow: hidden;
}

.box-body.loading .modal {
    display: block;
}
  </style>
@stop

@section ('body.content')
<div class="content-wrapper">
  <section class="content-header">
    <h1>
    {{trans('messages.overview_device_management')}}
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> {{trans('messages.dashboard')}}</a></li>
      <li><a href="{{ route('employee') }}">{{trans('messages.device')}}</a></li>
      <li class="active">{{trans('messages.overview')}}</li>
    </ol>
  </section>

  <!-- FILTER -->
  <div class="col-xs-12">
    <!-- <form action="{{route('filterdevice')}}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
      <div class="form-group">
          <div class="col-sm-2">
            <div class="form-group">
              <label for="type_device">Type Device</label><br>
                <select class="form-control type_id" name="type_device">
                    <option value="0">None</option>
                    @foreach ($types as $type)
                    <option value="{!! $type->id !!}">{!! $type->type_name !!} </option>
                    @endforeach
                </select>
            </div>
          </div>
          <div class="col-sm-2">
            <div class="form-group">
              <label for="model_device">Model Device</label><br>
                <select class="form-control model_id" name="model_device">
                    <option value="0">None</option>
                    @foreach ($models as $model)
                    <option value="{!! $model->id !!}">{!! $model->model_name !!} </option>
                    @endforeach
                </select>
            </div>
          </div>
          <div class="col-sm-2">
            <div class="form-group">
              <label for="kind_device">Kind Device</label><br>
                <select class="form-control kind_id" name="kind_device">
                    <option value="0">None</option>
                    @foreach ($kinds as $kind)
                    <option value="{!! $kind->id !!}">{!! $kind->device_name !!} </option>
                    @endforeach
                </select>
            </div>
          </div>
          <div class="col-sm-2">
            <div class="form-group">
              <label for="status_device">Status Device</label><br>
                <select class="form-control status_id" name="status_device">
                    <option value="0">None</option>
                    @foreach ($statuses as $stt)
                    <option value="{!! $stt->id !!}">{!! $stt->status!!} </option>
                    @endforeach
                </select>
            </div>
          </div>
          <div class="col-sm-2">
            <div class="form-group">
              <label for="os_device">Operating System</label><br>
                <select class="form-control os_id" name="os_device">
                    <option value="0">None</option>
                    @foreach ($os as $o)
                    <option value="{!! $o->id !!}">{!! $o->os_name!!} </option>
                    @endforeach
                </select>
            </div>
          </div>
          <div class="col-sm-2">
            <div class="form-group">
              <label for="contract_number">Contract Number</label><br>
                <select class="form-control contract_id" name="contract_number">
                    <option value="0">None</option>
                    @foreach ($contract as $c)
                    <option value="{!! $c->id !!}">{!! $c->contract_number!!} </option>
                    @endforeach
                </select>
            </div>
          </div>
      </div>
      <div class="form-group">
        <input type="submit" name="filter" id="filter" class="btn btn-primary" value="Filter">
      </div>
    <!-- </form> -->
  <!-- END FILTER -->
  </div>

  <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Overview Devices</h3>
                    </div>
                    <div class="box-body" id="body">
                      <div class="modal"></div>
                        <table id="example1" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th style="width: 5%" class="text-center">#</th>
                              <th class="text-center">Code Employee</th>
                              <th class="text-center">Name Employee</th>
                              <th class="text-center">Role</th>
                              <th class="text-center">Name Device</th>
                              <th class="text-center">Serial Device</th>
                              <th class="text-center">Receive Date</th>
                              <th class="text-center">{{ trans('messages.status') }}</th>
                            </tr>
                          </thead>
                            <tbody>
                            {{--*/ $number=0 /*--}}
                            @foreach($devices as $device)
                              <tr>
                              <td class="text-center">{{++$number}}</td>
                              <td>{!!$device->employee_code!!}</td>
                              <td>{!!$device->fullname!!}</td>
                              <td>{!!$device->employee_position!!}</td>
                                <td>{{$device->device_name}}</td>
                              <td>{{$device->serial_device}}</td>
                              <td>{{$device->receive_date}}</td>
                              <td>{{$device->status}}</td>
                                </tr>
                          @endforeach()
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
  <!-- MY SCRIPT -->
  <script type="text/javascript">
    $(function(){
        /*Datatable*/
        tableview = $('#example1').DataTable( {
            bLengthChange: false,
        });

        /*AJAX lay value tu select -> filter va tra ket qua ve dang bang*/
        $('#filter').click(function(){
          var items = $(".type_id, .model_id, .kind_id, .status_id, .os_id, .contract_id");
          var object = {};
          items.each(function(index,value){
            object[this.name] = $(this).val();
          });
          var link = "{{route('filterdevice')}}";

          $.ajax({
            url: link,
            type: "get",
            dataType: "json",
            data: object,
            success: function(datas){
              /*Huy table*/
              tableview.destroy();
              $('#example1 tbody tr').remove();
              $.each(datas, function(index, value){
                var tr = $('<tr>');
                $('<td class="text-center">').append(index+1).appendTo(tr);
                $('<td>').append(value['employee_code']).appendTo(tr);
                $('<td>').append(value['fullname']).appendTo(tr);
                $('<td>').append(value['employee_position']).appendTo(tr);
                $('<td>').append(value['device_name']).appendTo(tr);
                $('<td>').append(value['serial_device']).appendTo(tr);
                $('<td>').append(value['receive_date']).appendTo(tr);
                $('<td>').append(value['status']).appendTo(tr);
                $('#example1 tbody').append(tr);
              });
              tableview = $('#example1').DataTable( {
                bLengthChange: false,
            });
            }
          });
        });

        /*Lay model name theo type id*/
        $(".type_id").change(function() {
         var id_type = $(this).val();
         var link = "{!! route('post-typedevice') !!}";
         $.ajax({
              url : link,
              type : "get",
              dateType:"json",
              data : {
                id: id_type
              },
              success : function (data){
                  $('.model_id').children("option").remove();
                  var json = $.parseJSON(data);
                  console.log(json);
                  $('.model_id').append('<option value="0">None</option>');
                  $.each(json, function(index, value) {
                      $('.model_id').append("<option value='"+value.id+"'>"+value.name+"</option>");
                  });
              }
          });
        });

        /*Lay kind name theo model id*/
        $(".model_id").change(function() {
         var id_model = $(this).val();
         var link = "{!! route('post-modeldevice') !!}";
         $.ajax({
              url : link,
              type : "get",
              dateType:"json",
              data : {
                id: id_model
              },
              success : function (data){
                  $('.kind_id').children("option").remove();
                  var json = $.parseJSON(data);
                  console.log(json);
                  $('.kind_id').append('<option value="0">None</option>');
                  $.each(json, function(index, value) {
                      $('.kind_id').append("<option value='"+value.id+"'>"+value.name+"</option>");
                  });
              }
          });
        });
    });
  </script>
  <!-- END MY SCRIPT -->
@stop