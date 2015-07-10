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
            {{trans('messages.candidate_manager')}}
          </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> {{trans('messages.dashboard')}}</a></li>
            <li><a href="{{ route('candidate.interview') }}">{{trans('messages.interview')}}</a></li>
            <li class="active">{{trans('messages.list_interview')}}</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">

                    <div class="box-header">
                        <h3 class="box-title">{{trans('messages.list_interview')}}</h3>
                    </div>
                    <div class="row">
                      
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 5%" class="text-center">#</th>
                                    <th class="text-center">Candidate name</th>
                                    <th class="text-center">Position</th>
                                    <th class="text-center">Date</th>
                                    <th class="text-center">Time</th>
                                    <th class="text-center">Assignted To</th>
                                    <th class="text-center">Status</th>
                                    <th style="width: 10%" class="text-center">{{trans('messages.actions')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                  $index = 1; 
                                  foreach ($interviews as $key => $value) : ?>
                                  <tr>
                                    <input type="hidden" name="id" value="{{ $value->id }}"/>
                                    <td><?php echo $index; $index++; ?></td>
                                    <td>{{ $value->last_name." ".$value->first_name }}</td>
                                    <td>
                                    <?php
                                      $positions = $value->positions()->get();
                                      $res_position = array();
                                      foreach ($positions as $k_p => $v_p) {
                                         $res_position += array($v_p->id => $v_p->name );
                                      }
                                    ?>
                                      {!! Form::select('position',$res_position,null, ['class'=>'js-example-basic-multiple form-control']) !!}
                                    </td>
                                    <td><p style="display:none">{{ $value->time_interview }}</p> <input value="{{ $value->time_interview }}" class="time_interview" style="width:109px" /></td>
                                    <td><p style="display:none">{{ $value->time }}</p> <input value="{{ $value->time }}" class="ui-timepicker-input time" type="text"  style="width:109px" /></td>
                                   
                                    <td>  
                                        <?php 
                                            $employees = $value->employees()->get();
                                            $employees_chose = array();
                                            foreach ($employees as $k_e => $v_e) {
                                                array_push($employees_chose,$v_e->id);
                                            }
                                        ?>
                                        {!! Form::select('employee_id',$employall,$employees_chose, ['class'=>'js-example-basic-multiple form-control','multiple'=>true]) !!}
                                    </td>

                                    <td>  
                                        {!! Form::select('status_record_id',$statusrecord,$value->status_record_id, ['class'=>'js-example-basic-multiple form-control']) !!}
                                    </td>

                                    <td>
                                      <div class="text-blue accept itemaction" title="Save">
                                        <i class="fa fa-fw fa-floppy-o"></i>
                                      </div>
                                      <a class="text-blue" data-toggle="modal" data-target="#myModal<?php echo $index;?>" title="Download">
                                       <i class="fa fa-download"></i>
                                      </a>

                                    <!--   <div class="text-blue refresh itemaction" title="Refresh">
                                        <i class="fa fa-fw fa-refresh"></i>
                                      </div> -->
                                    </td>
                                  </tr>

                                  <!-- Modal -->
                                  <div id="myModal<?php echo $index;?>" class="modal fade" role="dialog">
                                    <div class="modal-dialog">

                                      <!-- Modal content-->
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          <h4 class="modal-title">Download file attachment</h4>
                                        </div>
                                        <div class="modal-body">
                                          <select class="choose_file_download select2">
                                            <?php 

                                                $files = $value->files()->get();
                                              // $files = $value->candidate()->files()->get();
                                                foreach ($files as $k_f => $v_f) {
                                                ?>
                                                 <option value="<?php echo $value->id.'/'.$v_f->name;?>"><?php echo $v_f->name;?></option>
                                                <?php
                                                }
                                            ?>  
                                          </select>
                                          <button class="btn btn-primary download">Download</button>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                        </div>
                                      </div>

                                    </div>
                                  </div>
                                  <!-- end Modal -->

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

<script type="text/javascript">
  $(document).ready(function(){
    $('.download').click(function(){
        var param = $(this).prev().prev().val();
        console.log(param);
        window.open('download/'+param);
    });
    $(".select2").select2();

    $('select[name="position"]').next().css({'width' : '120px !important'});
    $('select[name="employee_id"]').next().css({'width' : '120px !important'});
    $('select[name="status_record_id"]').next().css({'width' : '120px !important'});
    $('select.choose_file_download').next().css({'width' : '349px !important'});
  });
</script>

<style type="text/css">
  /*.select2-container--default ,.select2-container--below,.choose_file_download
  {
    width: 170px;
  }*/
</style>


<style type="text/css">
  .itemaction{
    display: block;
    float: left;
    margin-left: 10px;
    margin-right: 5px;
  }
/*  .select2-container--default , .select2-container--above
  {
    width : 165px !important;
  }*/
</style>



<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}" type="text/javascript"></script>
<script src="{{asset('plugins/datatables/dataTables.bootstrap.min.js')}}" type="text/javascript"></script>

<script type="text/javascript">
      $(document).ready(function(){

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
            var position = $(value).find('td:nth-child(4)').find(':selected').text();
            var assignted_to = $(value).find('td:nth-child(7)').find(':selected').text();
            dataobj.push({position : position,assignted_to : assignted_to});
        });


        $.fn.dataTable.ext.search.push(
            function( settings, data, dataIndex ) {
                //var index = parseInt(data[0])-1;
                //var text_status = $('#example1 tbody tr').eq(dataIndex).find('td:nth-child(7)').find(':selected').text();
                //var text_employee = $('#example1 tbody tr').eq(dataIndex).find('td:nth-child(8)').find(':selected').text();

                // var text_date_receive = $('#example1 tbody tr').eq(dataIndex).find('td:nth-child(5) input').val();
                // var text_date_return = $('#example1 tbody tr').eq(dataIndex).find('td:nth-child(6) input').val();
                var position = dataobj[dataIndex].position;
                var assignted_to = dataobj[dataIndex].assignted_to;

                var input_sm = $('.input-sm').val();
                console.log(input_sm);
              

                // console.log(text_date_receive);
                if(lowcase(position).indexOf(lowcase(input_sm)) > -1 || lowcase(assignted_to).indexOf(lowcase(input_sm)) > -1 ||
                    lowcase(data[3]).indexOf(lowcase(input_sm)) > -1 || lowcase(data[4]).indexOf(lowcase(input_sm)) > -1 ||
                    lowcase(data[1]).indexOf(lowcase(input_sm)) > -1
                  ) 
                {
                  return true;
                }
               
                return false;
            }
        );

      $(".js-example-basic-multiple").select2({placeholder: "Please enter your group"});
      $(".time_interview").datepicker({dateFormat: "yy-mm-dd"});
    
      $('.accept').click(function(){
          var data = {};
              data.id = $(this).parent().parent().find('input[name="id"]').val();
              data.position = $(this).parent().parent().find('select[name="position"]').val();
              data.time_interview = $(this).parent().parent().find('.time_interview').val();
              data.time = $(this).parent().parent().find('.time').val();
              data.employee_id = $(this).parent().parent().find('select[name="employee_id"]').val();
              data.status_record_id = $(this).parent().parent().find('select[name="status_record_id"]').val();
              // remove hang sau khi lay gia tri
              if(data.status_record_id == 2)
              {
                var sTable = $('#example1').DataTable();
                sTable.row($(this).parent().parent()).remove().draw();  
              }
              
              $.ajax({
                 url : '{{ route("saveinterviewschedule") }}',
                 type : 'POST',
                 data : {data : data , _token :"{{ csrf_token() }}" }
              }).done(function(res){
                  //console.log($('.notifi').html());
                  $div1=$('.error-message');
                  $div2=$('<div class="hidden alert alert-dismissible user-message text-center" style="margin-top: 30px" role="alert">');
                  $div2.append('<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>');
                  $div2.append("<span>Save Successfully</span>").addClass("alert-success").removeClass('hidden');
                  $div2.css("margin-bottom","0px");
                  console.log($div2);
                  $div1.append($div2);

                  if(data.status_record_id == 2)
                  {
                    var sTable = $('#example1').DataTable();
                    sTable.row($(this).parent().parent()).remove().draw();  
                  }

                  $(".alert").delay(3000).hide(1000);
                      setTimeout(function() {
                      $('.alert').remove();
                  }, 5000); 
              });
      });
      $('.download').click(function(){
         var namefile = $(this).parent().find('.namefile').text();

      });
    });
        
</script>

@stop



@section ('body.js')


@stop
