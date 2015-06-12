 @extends ('layouts.master')

@section ('head.title')
{{trans('messages.list_module')}}
@stop

@section ('head.css')
  <link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
@stop
@section('body.content')
<div class="content-wrapper">
<section class="content-header">
  <h1>
    {{trans('messages.module_management')}}
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> {{trans('messages.dashboard')}}</a></li>
    <li><a href="{{ route('modules.index') }}">{{trans('messages.module')}}</a></li>
    <li class="active">{{trans('messages.list_module')}}</li>
  </ol>
</section>

<!-- edit me -->

<script type="text/javascript" src="<?php echo asset('treegrid/jquery.min.js');?>"></script>

<link rel="stylesheet" type="text/css" href="<?php echo asset('treegrid/jquery.treegrid.css');?>">
<script type="text/javascript" src="<?php echo asset('treegrid/jquery.treegrid.js');?>"></script>
<script type="text/javascript" src="<?php echo asset('treegrid/jquery.treegrid.bootstrap3.js');?>"></script>

<script type="text/javascript">
  $(document).ready(function() {
        // $('.tree').treegrid();
        var target = $('#example1 tbody>tr>td:nth-child(2)');
        target.click(function(){
          var parent_tr = $(this).parent();
          if(parent_tr.next("tr").children('td:nth-child(2)').has("table").length != 0)
          {
            parent_tr.next("tr").remove();
            return;
          }

          else
          {
              var id = parent_tr.children("td:first").text();
              var tr = parent_tr;
              console.log("id:"+id);
              $.ajax({
                url: "showtree/"+id,
                async : false,
                success: function(data, status){
                  if(data != "")
                  {
                    $('<tr><td></td><td colspan="3">'+data+'</td></tr>').insertAfter(tr);
                    $('.tree').treegrid();
                  }
                }
              });

          }
        });
  });
</script>

<!-- edit me -->

<section class="content">
      <div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">{{trans('messages.list_module')}}</h3>
                </div>
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-hover">
                    <div class="col-sm-6">
                      <?php if (check(array('modules.create'), $allowed_routes)): ?>
                      <a class="btn btn-primary" href="{{ route('modules.create') }}"><i class="fa fa-plus-circle"> {{trans('messages.add_module')}}</i></a>
                      <?php endif;?>
                    </div>
                    <thead>
                      <tr>
                        <th style="width: 5%" class="text-center">#</th>
                        <th class="text-center">{{trans('messages.module_name')}}</th>
                        <th class="text-center">{{trans('messages.description')}}</th>
                        <th class="text-center">{{trans('messages.version')}}</th>
                        <th style="width: 10%" class="text-center">{{trans('messages.actions')}}</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($modules as $g):
	$number++;
	?>
				                      <tr>
				                        <td class="text-right">{{$number}}</td>
				                        <td>{{$g->name}}</td>
				                        <td>{{$g->description}}</td>
				                        <td class="text-right">{{$g->version}}</td>
				                        <td>
				                            <?php if (check(array('users.show'), $allowed_routes)): ?>
				                          <a href="{{ route('modules.show', $g->id) }}" class="text-blue" title="Edit">
				                              <i class="fa fa-fw fa-edit"></i>
				                          </a>
				                          <?php endif;?>
				                          <?php if (check(array('users.destroy'), $allowed_routes)): ?>
				                          <a href="{{ route('modules.destroy', $g->id)}}" class="text-red" data-method="delete" title="Delete" data-token="{{ csrf_token() }}">
				                              <i class="fa fa-fw fa-ban"></i>
				                          </a>
				                          <?php endif;?>
				                        </td>
				                      </tr>
				                     <?php endforeach;?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div>
            </div>
          </div>
</section>
</div>
@stop

@section ('body.js')
    <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('plugins/datatables/dataTables.bootstrap.min.js')}}" type="text/javascript"></script>

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
    var dataConfirm = $(this).attr('data-confirm');
    if (typeof dataConfirm === 'undefined') {
      dataConfirm = 'Are you sure delete this module?';
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
    <!-- page script -->
@stop