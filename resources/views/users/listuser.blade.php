@extends ('layouts.master')
@section ('head.title')
  {{trans('messages.list_user')}}
@stop
@section ('head.css')
  <link href="{{ Asset('plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
@stop
@section ('body.content')
  <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            {{trans('messages.user_management')}}
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

                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">

                    <div class="col-sm-6">
                       <?php if (check(array('users.create'), $allowed_routes)): ?>
                       <a class="btn btn-primary" href="{!!route('users.create') !!}" style="margin-left: -15px;"><i class="fa fa-plus-circle"> {{trans('messages.add_user')}}</i></a>
                       <?php endif;?>
                    </div>

                    <thead>
                      <tr>
                        <th style="width: 5%" class="text-center">#</th>
                        <th class="text-center">User Name</th>
                        <th class="text-center">Full Name</th>
                        <th class="text-center">Group</th>
                        <th style="width: 10%" class="last-child text-center">{{trans('messages.actions')}}</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($users as $user):
                    	$number++;
                  	?>

									                      <tr>
									                        <td class="text-center">{{$number}}</td>
									                        <td>{{ $user->username }}</td>
									                        <td>{{ $user->employee->lastname.' '.$user->employee->firstname }}</td>
									                        <?php
	$groups = \App\Group::lists('groupname', 'id');
	$groupssl = $user->group->lists('id');
	?>
									                        <td>
									                           <?php foreach ($groupssl as $key => $value) {
		?>
		                                           <p class="grouptag"><?php echo $groups[$value]?></p>
		                                           <?php
	}?>
									                        </td>
									                        <td class="text-center">
									                          <?php if (check(array('users.show'), $allowed_routes)): ?>
									                          <a href="{{ route('users.show', $user->id)}}" class="text-blue" title="Edit">
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

    <link href="{{Asset('bootstrap/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{Asset('bootstrap/js/select2.min.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
      $(".selectmuti").select2({placeholder: ""}).prop("disabled", true);

      $(document).ready(function(){
        $('.select2-container').removeAttr( "style" );
      });
    </script>

    <style type="text/css">
      .select2-container--default.select2-container--disabled .select2-selection--multiple {
          background-color: transparent;
          cursor: default;
      }
      .select2-container--default .select2-selection--multiple {
          background-color: transparent;
          border: 0px solid black;
          cursor: text;
      }
      .grouptag{
        display: block;
        float: left;
        background-color: #cfd0d1;
        border-radius: 5px;
        padding-left: 5px;
        padding-right: 5px;
        margin : 4px;
      }
    </style>

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