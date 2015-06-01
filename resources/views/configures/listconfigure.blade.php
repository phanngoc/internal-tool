 @extends ('layouts.master')

@section ('head.title')
  {{trans('messages.list_configure')}}
@stop

@section ('head.css')
  <link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
@stop

@section ('body.content')
  <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            {{trans('messages.configure_management')}}
            <small>{{trans('messages.list_configure')}}</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> {{trans('messages.dashboard')}}</a></li>
            <li><a href="{{ route('features.index') }}">{{trans('messages.configure')}}</a></li>
            <li class="active">{{trans('messages.list_configure')}}</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">{{trans('messages.list_configure')}}</h3>
                </div>
                <div class="row">
                    <!-- <div class="col-sm-2" style="margin-left:1%;">
                     <a class="btn btn-success btn-block" href="{{ route('features.create') }}"><i class="fa fa-plus">{{trans('messages.add_feature')}}</i></a>
                    </div> -->
                  </div>
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>{{trans('messages.name')}}</th>
                        <th>{{trans('messages.configure_value')}}</th>
                        <th>{{trans('messages.description')}}</th>
                        <th style="width: 20%">{{trans('messages.actions')}}</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($configures as $configure)
                    <tr>
                        <td>{{ $configure->name }}</td>
                        <td>{{ $configure->value }}</td>
                        <td>{{ $configure->description }}</td>
                        <td>
                          <a href="{{ route('configures.show', $configure->id) }}" class="text-blue" title="Edit">
                              <i class="fa fa-fw fa-edit"></i>
                              {{trans('messages.edit')}}
                          </a>
                        </td>
                    </tr>
                    @endforeach
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
@stop