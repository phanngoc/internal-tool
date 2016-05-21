@extends ('layouts.master')
@section ('head.title')
  {{trans('messages.list_candidate')}}
@stop
@section ('head.css')
  <link href="{{Asset('plugins/datatables/dataTables.bootstrap.css')}}" rel="stylesheet" type="text/css" />
@stop
@section ('body.content')
<script src="{{Asset('bootstrap/js/select2.min.js')}}" type="text/javascript"></script>
<link href="{{Asset('bootstrap/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
  <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            {{trans('messages.candidate_manager')}}
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> {{trans('messages.dashboard')}}</a></li>
            <li><a href="{{ route('users.index') }}">Human Resources</a></li>
            <li class="active">{{trans('messages.list_candidate') }}</li>
          </ol>
        </section>
        <!-- Main content -->

        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">{{trans('messages.list_candidate')}}</h3>
                </div>

                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">

                     <div class="col-sm-6">
                       <?php if (check(array('candidates.create'), $allowed_routes)): ?>
                       <a class="btn btn-primary" href="{!!route('candidates.create') !!}" style="margin-left: -15px;"><i class="fa fa-plus-circle"> Add Candidate</i></a>
                       <?php endif;?>
                     </div>
                    <thead>
                      <tr>
                        <th style="width: 5%" class="text-center">#</th>
                        <th class="text-center">Full Name</th>
                        <th class="text-center">Phone</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Position</th>
                        <th class="text-center">Date for receipt</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Comment</th>
                        <th style="width: 10%" class="last-child text-center">{{trans('messages.actions')}}</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    $number = 0;
                    foreach ($candidates as $candidate):
                  	   $number++;
                  	?>

	                      <tr>
	                        <td class="text-center">{{$number}}</td>
	                        <td>{{$candidate->last_name." ".$candidate->first_name}}</td>
                          <td>{{$candidate->phone}}</td>
                          <td>{{$candidate->email}}</td>
                          <td>
                             <?php
                              $positions = $candidate->positions()->get();
                              foreach ($positions as $key => $value) {
                                  echo '<p class="item_position">'.$value->name.'</p>';
                              }
                             ?>
                          </td>
                          <td>
                            <?php
                              $date = date_create($candidate->date_submit);
                              echo date_format($date,"d/m/Y");
                            ?>
                          </td>
                          <td>{{$candidate->status_record()->first()->name}}</td>
                          <td>{{$candidate->comment}}</td>
	                        <td>

	                          <a href="{{ route('candidates.show', $candidate->id)}}" class="text-blue" title="Edit">
	                              <i class="fa fa-fw fa-edit"></i>
	                          </a>

	                            {!! Form::open([
	                                'route'=>['candidates.destroy', $candidate->id],
	                                'method'=>'DELETE',
	                                'style' =>'display:inline'
	                            ])!!}
                              <a href="{{ route('candidates.destroy', $candidate->id)}}" class="text-red" data-method="delete" title="Delete" data-token="{{ csrf_token() }}">
                                 <i class="fa fa-fw fa-ban"></i>
                              </a>
                             {!! Form::close() !!}
                              <a class="text-blue" data-toggle="modal" data-target="#myModal<?php echo $number;?>" title="Download">
                                     <i class="fa fa-download"></i>
                              </a>
	                        </td>
	                      </tr>

                        <!-- Modal -->
                        <div id="myModal<?php echo $number;?>" class="modal fade" role="dialog">
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
                                    $files = $candidate->filecandidates()->get();
                                    foreach ($files as $k_f => $v_f) {
                                      ?>
                                      <option value="<?php echo $candidate->id.'/'.$v_f->name;?>"><?php echo $v_f->name;?></option>
                                      <?php
                                    }
                                  ?>
                                </select>
                                <button class="btn btn-primary download">Download</button>
                                <button class="btn btn-primary downloadAll" data-id="{{ $candidate->id }}">Download All</button>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                              </div>
                            </div>

                          </div>
                        </div>
                        <!-- end Modal -->
	                    <?php endforeach;?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div>
<script type="text/javascript">
  $(document).ready(function(){

    $('.download').click(function(){
        var param = $(this).prev().prev().val();
        window.open('download/'+param);
    });

    $('.downloadAll').click(function(){
       var id = $(this).data('id');
       $.ajax({
         url : 'zipfile/'+id,
         method : 'GET',
       }).done(function(res){
          window.open('downloadAll/'+id);
       });
    });

    $('.choose_file_download').css({'width' : '480px'});
    $(".select2").select2();
  });
</script>
<style type="text/css">
  .select2-container--default ,.select2-container--below,.choose_file_download
  {
    width: 170px;
  }
  #example1_filter{
    text-align: right;
  }
</style>

@stop


@section ('body.js')
  <!-- DATA TABES SCRIPT -->
    <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('plugins/datatables/dataTables.bootstrap.min.js')}}" type="text/javascript"></script>

  <!-- page script -->

    <script type="text/javascript">
      $(function () {
        $('#example1').dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": true,
          "bSort": true,
          "bInfo": false,
          "bAutoWidth": false
        });
      });
    </script>

    <script type="text/javascript">
    $(document).on('click', 'a[data-method="delete"]', function() {
      console.log('co click');
      var dataConfirm = $(this).attr('data-confirm');
      if (typeof dataConfirm === 'undefined') {
          dataConfirm = 'Are you sure delete this candidate?';
      }
      var token = $(this).attr('data-token');
      var action = $(this).attr('href');
      var flag = confirm(dataConfirm);
      if (flag) {
        console.log('confirm ok');
        var form =
            $('<form>', {
              'method': 'POST',
              'action': action
            });
        var tokenInput =
            $('<input>', {
              'type': 'hidden',
              'name': '_token',
              'value': token
            });
        var hiddenInput =
            $('<input>', {
              'name': '_method',
              'type': 'hidden',
              'value': 'delete'
            });
        form.append(tokenInput, hiddenInput).hide().appendTo('body').submit();
    }
    return false;
  });
    </script>
@stop
