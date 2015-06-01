 @extends ('layouts.master')

@section ('head.title')
  {{trans('messages.list_group')}}
@stop

@section ('head.css')
  <link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
@stop
@section('body.content')

<div class="content-wrapper">
<section class="content-header">
  <h1>
    {{trans('messages.group_management')}}
    <small>{{trans('messages.list_group')}}
    </small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> {{trans('messages.dashboard')}}</a></li>
    <li><a href="{{ route('groups.index') }}">{{trans('messages.group')}}</a></li>
    <li class="active">{{trans('messages.list_group')}}</li>
  </ol>
</section>

<section class="content">
      <div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">{{trans('messages.list_group')}}</h3>
                </div>
                <div class="row">
                    <div class="col-sm-2" style="margin-left:1%;">
                      <?php if (check(array('groups.create'), $allowed_routes)): ?>
                      <a class="btn btn-success btn-block" href="{{ route('groups.create') }}"><i class="fa fa-group"> {{trans('messages.add_group')}}</i></a>
                    <?php endif;?>
                    </div>
                  </div>
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th style="width: 5%">#</th>
                        <th>{{trans('messages.group_name')}}</th>
                        <th>{{trans('messages.description')}}</th>
                        <th>{{trans('messages.created_at')}}</th>
                        <th  style="width: 10%">{{trans('messages.actions')}}</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($groups as $g)
                      <tr>
                        <td>{{$g->id}} </td>
                        <td>{{$g->groupname}}</td>
                        <td>{{$g->description}}</td>
                        <td>{{$g->created_at}}</td>
                        <td>
                          <?php if (check(array('groups.show'), $allowed_routes)): ?>
                          <a href="{{ route('groups.show', $g->id) }}" class="text-blue" title="Edit">
                              <i class="fa fa-fw fa-edit"></i>
                          </a>
                          <?php endif;?>

                          <?php if (check(array('users.destroy'), $allowed_routes)): ?>
                          <a href="{{ route('groups.destroy', $g->id)}}" class="text-red" data-method="delete" title="Delete" data-token="{{ csrf_token() }}">
                              <i class="fa fa-fw fa-ban"></i>
                          </a>
                          <?php endif;?>

                          <?php if (check(array('groups.permission'), $allowed_routes)): ?>
                          <a href="{{ route('groups.permission', $g->id)}}" class="text-warning" title="Change Permission" data-token="{{ csrf_token() }}">
                              <i class="fa fa-fw fa-share"></i>
                          </a>
                           <?php endif;?>
                        </td>
                      </tr>
                     @endforeach
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
        $("#example1").dataTable();
        $('#example2').dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": false,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false
        });
      });
    </script>

    <script type="text/javascript">
      $(document).on('click', 'a[data-method="delete"]', function() {
    var dataConfirm = $(this).attr('data-confirm');
    if (typeof dataConfirm === 'undefined') {
      dataConfirm = 'Are you sure ?';
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