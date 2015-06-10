 @extends ('layouts.master')

@section ('head.title')
  {{trans('messages.list_feature')}}
@stop

@section ('head.css')
  <link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
@stop

@section ('body.content')
  <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            {{trans('messages.feature_module_management')}}
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> {{trans('messages.dashboard')}}</a></li>
            <li><a href="{{ route('features.index') }}">{{trans('messages.feature_module')}}</a></li>
            <li class="active">{{trans('messages.list_feature')}}</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">{{trans('messages.list_feature')}}</h3>
                </div>
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <div class="col-sm-6">
                        <?php if (check(array('features.create'), $allowed_routes)): ?>
                       <a class="btn btn-primary" href="{{ route('features.create') }}"><i class="fa fa-plus-circle"> {{trans('messages.add_feature')}}</i></a>
                        <?php endif;?>
                    </div>
                    <thead>
                      <tr>
                        <th style="width: 5%" class="text-center">#</th>
                        <th class="text-center">{{trans('messages.feature_name')}}</th>
                        <th class="text-center">{{trans('messages.parent_name')}}</th>
                        <th class="text-center">{{trans('messages.description')}}</th>
                        <th class="text-center">{{trans('messages.URL')}}</th>
                        <th style="width: 10%" class="text-center">{{trans('messages.actions')}}</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($features as $feature):
	$number++;
	?>
		                    <tr>
		                        <td class="text-right">{{$number}}</td>
		                        <td>{{ $feature->name_feature }}</td>
		                        <td>{{ $feature->module->name }}</td>
		                        <td>{{ $feature->description }}</td>
		                        <td>{{ $feature->url_action }}</td>
		                        <td>  <?php if (check(array('features.show'), $allowed_routes)): ?>
		                          <a href="{{ route('features.show', $feature->id) }}" class="text-blue" title="edit"><i class="fa fa-fw fa-edit"></i></a>
		                          <?php endif;?>
		                          <?php if (check(array('features.destroy'), $allowed_routes)): ?>
		                        <a href="{{ route('features.destroy', $feature->id)}}" class="text-red" data-method="delete" title="Delete" data-token="{{ csrf_token() }}">
		                              <i class="fa fa-fw fa-ban"></i>
		                          </a>
		                          <?php endif;?>
		                        </td>
		                    </tr>
		                    <?php endforeach;?>

                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div>
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
    var dataConfirm = $(this).attr('data-confirm');
    if (typeof dataConfirm === 'undefined') {
      dataConfirm = 'Are you sure delete this feature?';
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
@stop