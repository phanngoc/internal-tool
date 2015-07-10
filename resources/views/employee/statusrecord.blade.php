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
            <li><a href="{{ route('statusrecord') }}">{{trans('messages.statusrecord')}}</a></li>
            <li class="active">{{trans('messages.list_statusrecord')}}</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">

                    <div class="box-header">
                        <h3 class="box-title">{{trans('messages.list_statusrecord')}}</h3>
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
                                    <td><p style="display:none">{{ $value->name }}</p><input value="{{ $value->name }}" class="name" /></td>
                                    
                                    <td>
                                      <div class="text-blue accept itemaction" title="Edit">
                                        <i class="fa fa-fw fa-floppy-o"></i>
                                      </div>
                                      <a href="{{ route('statusrecord.destroy', $value->id)}}" class="text-red" data-method="delete" title="Delete" data-token="{{ csrf_token() }}">
                                            <i class="fa fa-fw fa-ban"></i>
                                      </a>
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
              data.name = $(this).parent().parent().find('.name').val();
              if(data.name == '')
              {
                  $div1=$('.error-message');
                  $div2=$('<div class="hidden alert alert-dismissible user-message text-center" style="margin-top: 30px" role="alert">');
                  $div2.append('<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>');
                  $div2.append("<span>Input not valid</span>").addClass("alert-danger").removeClass('hidden');
                  $div2.css("margin-bottom","0px");
                  // console.log($div2);
                  $div1.append($div2);
              
                  $(".alert").delay(3000).hide(1000);
                      setTimeout(function() {
                      $('.alert').remove();
                  }, 5000);
                  return; 
              }
              console.log(data);
              $.ajax({
                 url : '{{ route("statusrecord.saveedit") }}',
                 type : 'POST',
                 data : {status : data , _token :"{{ csrf_token() }}" }
              }).done(function(res){
                      $div1=$('.error-message');
                      $div2=$('<div class="hidden alert alert-dismissible user-message text-center" style="margin-top: 30px" role="alert">');
                      $div2.append('<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>');
                      $div2.append("<span>Save Successfully</span>").addClass("alert-success").removeClass('hidden');
                      $div2.css("margin-bottom","0px");
                      console.log($div2);
                      $div1.append($div2);
                      //$div1.insertAfter( ".content-header" );

                      $(".alert").delay(3000).hide(1000);
                          setTimeout(function() {
                          $('.alert').remove();
                      }, 5000); 
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
      });
    </script>
    <script type="text/javascript">
        $(document).on('click', 'a[data-method="delete"]', function() {
          var dataConfirm = $(this).attr('data-confirm');
          if (typeof dataConfirm === 'undefined') {
              dataConfirm = 'Are you sure delete this status record?';
          }

          var token = $(this).attr('data-token');
          var action = $(this).attr('href');
          if (confirm(dataConfirm)) {

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

            form.append(tokenInput).hide().appendTo('body').submit();
          }
          return false;
        });
    </script>
@stop
