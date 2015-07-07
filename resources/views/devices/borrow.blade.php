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
                                    <th class="text-center">Receive Date</th>
                                    <th class="text-center">Return Date</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Assignted To</th>
                                    <th style="width: 10%" class="text-center">{{trans('messages.actions')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
$index = 1;
foreach ($devices as $key => $value): ?>
                                  <tr>
                                    <input type="hidden" name="id" value="{{ $value->id }}"/>
                                    <td><?php echo $index;
$index++;?></td>
                                    <td>{{ $value->kind_device()->first()->device_name }}</td>
                                    <td>{{ $value->serial_device }}</td>
                                    <td><p style="display:none">{{ $value->receive_date }}</p><input value="{{ $value->receive_date }}" class="receive_date"/></td>
                                    <td><p style="display:none">{{ $value->return_date }}</p><input value="{{ $value->return_date }}" class="return_date"/></td>
                                    <td>{!! Form::select('status_id',$statusall,$value->status_devices()->first()->id, ['class'=>'js-example-basic-multiple form-control']) !!}</td>
                                    <td>

                                        {!! Form::select('employee_id',$employall,$value->employee_id, ['class'=>'js-example-basic-multiple form-control']) !!}

                                    </td>
                                    <td>
                                      <div class="text-blue accept itemaction" title="Edit">
                                        <i class="fa fa-fw fa-floppy-o"></i>
                                      </div>
                                    <!--   <div class="text-blue refresh itemaction" title="Refresh">
                                        <i class="fa fa-fw fa-refresh"></i>
                                      </div> -->
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
<style type="text/css">
  .itemaction{
    display: block;
    float: left;
    margin-left: 10px;
  }
</style>
<script type="text/javascript">
    $(document).ready(function(){
      $('.notifi').hide();
      $(".js-example-basic-multiple").select2({placeholder: "Please enter your group"});
      $(".receive_date").datepicker({dateFormat: "yy-mm-dd"});
      $(".return_date").datepicker({dateFormat: "yy-mm-dd"});

      $('.accept').click(function(){
          var data = {};
              data.id = $(this).parent().parent().find('input[name="id"]').val();
              data.receive_date = $(this).parent().parent().find('.receive_date').val();
              data.return_date = $(this).parent().parent().find('.return_date').val();
              data.status_id = $(this).parent().parent().find('select[name="status_id"]').val();
              data.employee_id = $(this).parent().parent().find('select[name="employee_id"]').val();
              $.ajax({
                 url : '{{ route("saveborrowdevice") }}',
                 type : 'POST',
                 data : {data : data , _token :"{{ csrf_token() }}" }
              }).done(function(res){
                  $('.notifi h4').html("Save successfully");
                  $('.notifi').show().delay(3000).fadeOut();
              });
      });

      $(".receive_date").change(function(){
         var val = $(this).val();
         $(this).parent().next().children('.return_date').datepicker('option', 'minDate', val);
      });
      $(".receive_date").trigger("change");


      $('select[name="employee_id"]').change(function(){
          if($(this).val() == 0)
          {
            console.log('ok');
            // $(this).parent().parent().find('select[name="status_id"]').find('option').removeAttr('selected');
            // $(this).parent().parent().find('select[name="status_id"]').find('option[value="'+3+'"]').attr('selected','selected');
            $(this).parent().parent().find('select[name="status_id"]').select2("val", 3);
            $(this).parent().parent().find('.receive_date').datepicker("setDate", "0000-00-00");
            $(this).parent().parent().find('.return_date').datepicker("setDate", "0000-00-00");
          }
      });
    });

</script>

@stop



@section ('body.js')

<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}" type="text/javascript"></script>
<script src="{{asset('plugins/datatables/dataTables.bootstrap.min.js')}}" type="text/javascript"></script>

    <script type="text/javascript">
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

        console.log(dataobj);
        $.fn.dataTable.ext.search.push(
            function( settings, data, dataIndex ) {
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
