 @extends ('layouts.master')



@section ('head.title')

  {{trans('messages.list_user')}}

@stop



@section ('head.css')

  <link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />

@stop



@section ('body.content')

  <div class="content-wrapper">

        <!-- Content Header (Page header) -->

        <section class="content-header">

          <h1>

            {{trans('messages.user_management')}}

            <small>{{trans('messages.list_user')}}</small>

          </h1>

          <ol class="breadcrumb">

            <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> {{trans('messages.dashboard')}}</a></li>

            <li><a href="{{ route('users.index') }}">{{trans('messages.user')}}</a></li>

            <li class="active">{{trans('messages.list_user')}}</li>

          </ol>

        </section>



        <!-- Main content -->

        <section class="content">

          <div class="row">

            <div class="col-xs-12">

              <div class="box box-primary">

                <div class="box-header">

                  <h3 class="box-title">{{trans('messages.list_user')}}</h3>

                </div>

                <div class="row">

                    <div class="col-sm-2" style="margin-left:1%;">



                     <?php if (check(array('users.create'), $allowed_routes)): ?>

                     <a class="btn btn-success btn-block" href="{!!route('users.create') !!}"><i class="fa fa-user-plus"> {{trans('messages.add_user')}}</i></a>

                     <?php endif;?>

                    </div>

                </div>

                <div class="box-body">

                  <table id="example1" class="table table-bordered table-striped">

                    <thead>

                      <tr>

                        <th style="width: 5%">#</th>

                        <th>{{trans('messages.username')}}</th>

                        <th>{{trans('messages.fullname')}}</th>

                        <th>{{trans('messages.email')}}</th>

                        <th style="width: 10%" class="last-child">{{trans('messages.actions')}}</th>

                      </tr>

                    </thead>

                    <tbody>

                    @foreach ($users as $user)

                      <tr>

                        <td>{{ $user->id }}</td>

                        <td>{{ $user->username }}</td>

                        <td>{{ $user->fullname }}</td>

                        <td>{{ $user->email }}</td>

                        <td>

                          <?php if (check(array('users.show'), $allowed_routes)): ?>

                          <a href="{{ route('users.show', $user->id)}}" class="text-blue" title="edit">



                              <i class="fa fa-fw fa-edit"></i>

                          </a>

                          <?php endif;?>

                          {!! Form::open([

                                'route'=>['users.destroy', $user->id],

                                'method'=>'DELETE',

                                'style' =>'display:inline'

                              ])!!}

                              <?php if (check(array('users.destroy'), $allowed_routes)): ?>

                              <a href="{{ route('users.destroy', $user->id)}}" class="text-red" data-method="delete" title="Delete" data-token="{{ csrf_token() }}">



                              <i class="fa fa-fw fa-ban"></i>

                          </a>

                             <?php endif;?>



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
@stop