@extends ('layouts.master')

@section ('head.title')

  {{trans('messages.list_user')}}

@stop


@section ('head.css')
  <link href="{{ Asset('plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="{{ Asset('jquery-ui/jquery-ui.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ Asset('jquery-ui/jquery-ui.theme.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ Asset('jquery-ui/jquery-ui.structure.css') }}" />
  <script type="text/javascript" src="{{ Asset('jquery-ui/jquery-ui.js') }}"></script>
  <!-- Date time picker -->
  <link rel="stylesheet" href="{{Asset('jquery-datetimepicker/jquery.datetimepicker.css')}}" />
  <script type="text/javascript" src="{{ Asset('jquery-datetimepicker/jquery.datetimepicker.full.js') }}"></script>
  <!-- End Date time picker -->
@stop



@section ('body.content')
<script src="{{Asset('bootstrap/js/select2.min.js')}}" type="text/javascript"></script>
<link href="{{Asset('bootstrap/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
<div class="content-wrapper">
    <script type="text/javascript" src="{{ Asset('jqueryvalidate/jquery.validate.js') }}"></script>
    <section class="content-header">
          <h1>
            {{trans('messages.device_manager')}}
          </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> {{trans('messages.dashboard')}}</a></li>
            <li><a href="{{ route('employee') }}">{{trans('messages.device')}}</a></li>
            <li class="active">{{trans('messages.borrow_device')}}</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">

                    <div class="box-header">
                        <h3 class="box-title">{{trans('messages.borrow_device')}}</h3>
                    </div>

                    <div class="alert alert-success notifi">
                        <h4 style="text-align:center;"></h4>
                    </div>

                    <div class="row">

                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 5%" class="text-center">#</th>
                                    <th class="text-center">Name Device</th>
                                    <th class="text-center">Serial Device</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Assignted To</th>
                                    <th class="text-center">Return Time</th>
                                    <th class="text-center">Note</th>
                                    <th style="width: 10%" class="text-center">{{trans('messages.actions')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $index = 1;
                                foreach ($devices as $key => $value): ?>
                                  <tr>
                                    <input type="hidden" name="id" value="{{ $value->id }}"/>
                                    <td><?php echo $index; $index++;?></td>
                                    <td>{{ $value->kind_device->device_name }}</td>
                                    <td>{{ $value->serial_device }}</td>
                                    <td><input type="hidden" name="status_id_first" value="{{$value->status_devices->id}}" />{!! Form::select('status_id',$statusall,$value->status_devices->id, ['class'=>'select2 form-control']) !!}</td>
                                    <td>
                                        <input type="hidden" name="employee_id_first" value="{{$value->employee_id}}" />
                                        @if ($value->status_id == 1 || $value->status_id == 2)
                                          {!! Form::select('employee_id',$employall,$value->employee_id, ['class'=>'select2 form-control','disabled'=> 'disabled']) !!}
                                        @else
                                          {!! Form::select('employee_id',$employall,$value->employee_id, ['class'=>'select2 form-control']) !!}
                                        @endif
                                    </td>
                                    <td><input class="datetimepicker" name="return_date" type="text"/></td>
                                    <td><input type="text" name="note" value="{{$value->note}}" /></td>
                                    <td>
                                      <div class="text-blue accept itemaction" title="Edit">
                                        <i class="fa fa-fw fa-floppy-o"></i>
                                      </div>
                                    </td>
                                  </tr>
	                              <?php endforeach;?>
                            </tbody>
                        </table> <!-- #example1 -->

                        <div class="box-header wrap-history-device">
                          <div class="box-title">History</div>
                        </div>
                        <div id="wrap-log-activity">
                          <table class="table table-bordered table-hover" id="log-device">
                            <thead>
                              <tr>
                                <th>#ID</th>
                                <th class="text-center">Device name</th>
                                <th class="text-center">Serial</th>
                                <th class="text-center">Employee name</th>
                                <th class="text-center">Lender name</th>
                                <th class="text-center">Action</th>
                                <th class="text-center">Note</th>
                                <th class="text-center">Time</th>
                              </tr>
                            </thead>
                          </table>
                        </div>
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
<style type="text/css">
  .itemaction{
    display: block;
    float: left;
    margin-left: 10px;
  }
  .select2-container {
    width: 128px !important;
  }
  .box-header .box-title {
    font-size: 20px;
    font-weight: bold;
  }
</style>

@stop



@section ('body.js')

<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}" type="text/javascript"></script>
<script src="{{asset('plugins/datatables/dataTables.bootstrap.min.js')}}" type="text/javascript"></script>

<script type="text/javascript" src="{{Asset('notifyjs/notify.js')}}"></script>

<script type="text/javascript">
    var BORROW = {{App\Models\BorrowDevice::BORROW}};
    var GRANT = {{App\Models\BorrowDevice::GRANT}};
    var FREE = {{App\Models\BorrowDevice::FREE}};
    var PENDING = {{App\Models\BorrowDevice::PENDING}};

    $(document).ready(function(){
      
      $('.datetimepicker').datetimepicker({format:'Y-m-d H:m:s',});

      var tableLogDevice = $('#log-device').dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": true,
          "bSort": true,
          "bInfo": false,
          "bAutoWidth": false,
          "processing": true,
          "serverSide": true,
           ajax: "{{route('logaction.data')}}"
      });

      $('.notifi').hide();
      $(".select2").select2();
      $(".receive_date").datepicker({dateFormat: "yy-mm-dd"});
      $(".return_date").datepicker({dateFormat: "yy-mm-dd"});

      $('.accept').click(function(){
          var $trParent = $(this).parent().parent();
          var data = {};
              data.id = $trParent.find('input[name="id"]').val();
              data.status_id = $trParent.find('select[name="status_id"]').val();
              data.employee_id = $trParent.find('select[name="employee_id"]').val();
              data.note = $trParent.find('input[name="note"]').val();
              data.return_date = $trParent.find('input[name="return_date"]').val();
              if (checkConditionSave($trParent)) {
                $.ajax({
                   url : '{{ route("saveborrowdevice") }}',
                   type : 'POST',
                   data : {data : data , _token :"{{ csrf_token() }}" }
                }).done(function(res){
                    tableLogDevice.api().ajax.reload();
                    if (res.res_status == 1) {
                      if (data.status_id == FREE) {
                        $trParent.find('input[name="status_id_first"]').val(3);
                        $trParent.find('select[name="employee_id"]').prop('disabled',false);
                      } else {
                        $trParent.find('input[name="status_id_first"]').val(data.status_id);
                        $trParent.find('select[name="employee_id"]').prop('disabled',true);
                      }
                      // $('.notifi h4').html("Save successfully");
                      // $('.notifi').show().delay(3000).fadeOut();
                      $div1=$('.error-message');
                      $div2=$('<div class="hidden alert alert-dismissible user-message text-center" style="margin-top: 30px" role="alert">');
                      $div2.append('<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>');
                      $div2.append("<span>Save Successfully</span>").addClass("alert-success").removeClass('hidden');
                      $div2.css("margin-bottom","0px");
                      console.log($div2);
                      $div1.append($div2);

                      $(".alert").delay(3000).hide(1000);
                          setTimeout(function() {
                          $('.alert').remove();
                      }, 5000); 
                    }
                });
              }
      });

      $(".receive_date").change(function(){
         var val = $(this).val();
         $(this).parent().next().children('.return_date').datepicker('option', 'minDate', val);
      });

      $(".receive_date").trigger("change");

      $('select[name="status_id"]').change(function(){
          var value = $(this).val();
          var $elemEmployee = $(this).parent().next().find('select[name="employee_id"]');
          var initialValueStatusId = $(this).parent().find('input[name="status_id_first"]').val();
          var initialValueEmployeeId = $(this).parent().next().find('input[name="employee_id_first"]').val();
          if (initialValueStatusId == FREE) {
            $elemEmployee.prop('disabled',false);
            $elemEmployee.val(0).trigger('change');
          } else {
            $elemEmployee.prop('disabled',true);
            $elemEmployee.val(initialValueEmployeeId).trigger('change');
          }

          if (value == PENDING) {
              $elemEmployee.prop('disabled',true);
              $elemEmployee.val(0).trigger('change');
          }
      });

      function checkConditionSave($trParent) {
        var status_id_first = $trParent.find('input[name="status_id_first"]').val();
        var status_id = $trParent.find('select[name="status_id"]').val();
        var employee_id = $trParent.find('select[name="employee_id"]').val();
        var returnDate = $trParent.find('input[name="return_date"]').val();
        var isOk = true;

        if (((status_id == 1) || (status_id == 2))  && employee_id == 0) 
        {
          isOk = false;
          $trParent.notify("Please select assign to.");
        } 
        if (returnDate.trim().length == 0) {
          isOk = false;
          $trParent.notify("Please fill return date.");
        }
        if (status_id_first == status_id) {
          $trParent.notify("Status not changed.");
          isOk = false;
        }
        return isOk;
      }

      // $('select[name="employee_id"]').change(function(){
      //     if($(this).val() == 0)
      //     {
      //       console.log('ok');
      //       // $(this).parent().parent().find('select[name="status_id"]').find('option').removeAttr('selected');
      //       // $(this).parent().parent().find('select[name="status_id"]').find('option[value="'+3+'"]').attr('selected','selected');
      //       $(this).parent().parent().find('select[name="status_id"]').select2("val", 3);
      //       $(this).parent().parent().find('.receive_date').datepicker("setDate", "0000-00-00");
      //       $(this).parent().parent().find('.return_date').datepicker("setDate", "0000-00-00");
      //     }
      // });
    });


      $(function () {

        function lowcase(text)
        {
          if(text == "") return text;
          var res = text.toLowerCase();
          return res;
        }
        var oTable = $('#example1').dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": true,
          "bSort": true,
          "bInfo": false,
          "bAutoWidth": false
        });

        var dataobj = [];

        $('#example1 tbody tr').each(function(key,value){
            var text_status = $(value).find('td:nth-child(7)').find(':selected').text();
            var text_employee = $(value).find('td:nth-child(8)').find(':selected').text();
            var text_receive_date = $(value).find('td:nth-child(5) input').val();
            var text_return_date = $(value).find('td:nth-child(6) input').val();
            dataobj.push({text_status : text_status,text_employee : text_employee ,text_receive_date : text_receive_date,text_return_date : text_return_date});
        });

        var allowFilter = ['example1'];
        $.fn.dataTable.ext.search.push(
            function( settings, data, dataIndex ) {
                if ( $.inArray( settings.nTable.getAttribute('id'), allowFilter ) == -1 )
                {
                   // if not table should be ignored
                   return true;
                }
                //console.log(data);
                //var index = parseInt(data[0])-1;
                //var text_status = $('#example1 tbody tr').eq(dataIndex).find('td:nth-child(7)').find(':selected').text();
                //var text_employee = $('#example1 tbody tr').eq(dataIndex).find('td:nth-child(8)').find(':selected').text();

                // var text_date_receive = $('#example1 tbody tr').eq(dataIndex).find('td:nth-child(5) input').val();
                // var text_date_return = $('#example1 tbody tr').eq(dataIndex).find('td:nth-child(6) input').val();
                var text_status = dataobj[dataIndex].text_status;
                var text_employee = dataobj[dataIndex].text_employee;
                var text_receive_date = dataobj[dataIndex].text_receive_date;
                var text_return_date = dataobj[dataIndex].text_return_date;

                var input_sm = $('.input-sm').val();
                console.log(input_sm);
                console.log(lowcase(text_receive_date));
                console.log(lowcase(text_receive_date).indexOf(lowcase(input_sm)));

                // console.log(text_date_receive);
                if(lowcase(text_status).indexOf(lowcase(input_sm)) > -1 || lowcase(text_employee).indexOf(lowcase(input_sm)) > -1 ||
                   lowcase(data[1]).indexOf(lowcase(input_sm)) > -1 || lowcase(data[2]).indexOf(lowcase(input_sm)) > -1
                   || lowcase(text_receive_date).indexOf(lowcase(input_sm)) > -1 || lowcase(text_return_date).indexOf(lowcase(input_sm)) > -1

                  )
                {
                  return true;
                }

                return false;
            }
        );
      });
    </script>

@stop
