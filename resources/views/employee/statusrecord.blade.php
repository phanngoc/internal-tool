@extends ('layouts.master')

@section ('head.title')

  {{trans('messages.list_user')}}

@stop


@section ('head.css')
  <link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />

  <link rel="stylesheet" type="text/css" href="{{ Asset('jquery-ui/jquery-ui.css') }}" />
  <script type="text/javascript" src="{{ Asset('jquery-ui/jquery-ui.js') }}"></script>

  <link rel="stylesheet" type="text/css" href="{{ Asset('jquery-timepicker/jquery.timepicker.css') }}" />
  <script type="text/javascript" src="{{ Asset('jquery-timepicker/jquery.timepicker.js') }}"></script>

  <style type="text/css">
  .ui-widget-header {
    color : black;
  }
  </style>
  <script type="text/javascript">
    $(document).ready(function(){
      $('.ui-timepicker-input').timepicker({ 'timeFormat': 'g:ia','step': 15});
    });
   
  </script>
@stop



@section ('body.content')

<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

 

<div class="content-wrapper">
    <script type="text/javascript" src="{{ Asset('jqueryvalidate/jquery.validate.js') }}"></script>
    <section class="content-header">
          <h1>
            {{trans('messages.employee_manager')}}
          </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> {{trans('messages.dashboard')}}</a></li>
            <li><a href="{{ route('employee') }}">{{trans('messages.device')}}</a></li>
            <li class="active">{{trans('messages.note_status')}}</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">

                    <div class="box-header">
                        <h3 class="box-title">{{trans('messages.note_status')}}</h3>
                    </div>

                    <div class="savesuccess">
                        
                    </div>

                    <div class="row">
                      
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover">
                          <div class="col-sm-6">
                            <a class="btn btn-primary" style="margin-left: -15px;" href="{!!route('statusrecord.create') !!}"><i class="fa fa-user-plus"> {{trans('messages.add_statusrecord')}}</i></a>
                          </div>
                            <thead>
                                <tr>
                                    <th style="width: 5%" class="text-center">#</th>
                                    <th class="text-center">Name</th>
                                    <th style="width: 10%" class="text-center">{{trans('messages.actions')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                  $index = 1; 
                                  foreach ($statusrecord as $key => $value) : ?>
                                  <tr>
                                    <input type="hidden" name="id" value="{{ $value->id }}"/>
                                    <td><?php echo $index; $index++; ?></td>
                                    <td><input value="{{ $value->name }}" /></td>
                                    
                                    <td>
                                      <div class="text-blue accept itemaction" title="Edit">
                                        <i class="fa fa-fw fa-floppy-o"></i>
                                      </div>
                                    </td>
                                  </tr>
	                              <?php endforeach; ?>
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
      $(".js-example-basic-multiple").select2({placeholder: "Please enter your group"});
    
      $('.accept').click(function(){
          var data = {};
              data.id = $(this).parent().parent().find('input[name="id"]').val();
              data.comment = $(this).parent().parent().find('.comment').val();
              data.status_record_id = $(this).parent().parent().find('select[name="statusrecord"]').val();
              console.log(data);
              $.ajax({
                 url : '{{ route("savenotestatus") }}',
                 type : 'POST',
                 data : {note : data , _token :"{{ csrf_token() }}" }
              }).done(function(res){
                  console.log('ok');
                  $('.savesuccess').html('<h4 style="text-align:center;">Save successfully</h4>');
              });
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
