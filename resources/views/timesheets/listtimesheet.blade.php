 @extends ('layouts.master')



@section ('head.title')

  {{trans('messages.list_user')}}

@stop



@section ('head.css')

  <link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />

@stop



@section ('body.content')

 <script>
            $(function () {
                $("#jsGrid").jsGrid({
//                height: "100%",
//                width: "100%",
//                filtering: false,
//                editing: true,
//                sorting: true,
//                paging: true,

                  pageLoading: false,
//                pageButtonCount: 5,
//                deleteConfirm: "Do you really want to delete the client?",
//                controller: db,
                    //("#jsGrid").jsGrid({
                  height: "auto",
                  width: "100%",
                  editing: true,
                  sorting: true,
                  paging: true,
                  pageSize: 15,
                  pageButtonCount: 5,
                  autoload: true,
                  controller: {
                        loadData: function () {
                            var d = $.Deferred();
                            $.ajax({
                                url: "{{route('timesheets.index')}}",
                                type: "get",
                                dataType: "json"
                            }).done(function (response) {
                                d.resolve(response);
                            });
                            return d.promise();
                        },
                        updateItem: function (updatingClient) {
                            var d = $.Deferred();
                            updatingClient['_token'] = '<?php echo csrf_token(); ?>';
                            return $.ajax({
                                type: "POST",
                                url: "{{route('itemupdate')}}",
                                data: updatingClient,
                                dataType: "json"
                            }).done(function (response) {
                                $("#jsGrid").jsGrid("editItem", response);
                            });
                        },
                        deleteItem: function (item) {
                            item['_token'] = '<?php echo csrf_token(); ?>';
                            return $.ajax({
                                type: "POST",
                                url: "{{route('itemdelete')}}",
                                data: item,
                                dataType: "json"
                            }).done(function (response) {
                                $("#jsGrid").jsGrid("deleteItem", response);
                            });
                        },
                    },
                  fields: [
                        {name: "id", type: "text", width: 20},
                        {name: "fullname", type: "text", width: 120},
                        {name: "username", type: "text", width: 120},
                        {name: "email", type: "text", width: 120},
                        {type: "control"}
                  ]
                });

            });
        </script>

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

                  <div id="jsGrid">
                    
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div>

@stop



@section ('body.js')

<style>
    .rating {
        color: #F8CA03;
    }
</style>
<link rel="stylesheet" type="text/css" href="{{Asset('/css/demos.css')}}" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,600,400' rel='stylesheet' type='text/css'>

<link rel="stylesheet" type="text/css" href="{{Asset('/css/jsgrid.css')}}" />
<link rel="stylesheet" type="text/css" href="{{Asset('/css/theme.css')}}" />
<script src="{{Asset('src/jsgrid.core.js')}}"></script>
<script src="{{Asset('/src/db.js')}}"></script>
<script src="{{Asset('src/jsgrid.load-indicator.js')}}"></script>
<script src="{{Asset('src/jsgrid.load-strategies.js')}}"></script>
<script src="{{Asset('src/jsgrid.sort-strategies.js')}}"></script>
<script src="{{Asset('src/jsgrid.field.js')}}"></script>
<script src="{{Asset('src/jsgrid.field.text.js')}}"></script>
<script src="{{Asset('src/jsgrid.field.number.js')}}"></script>
<script src="{{Asset('src/jsgrid.field.select.js')}}"></script>
<script src="{{Asset('src/jsgrid.field.checkbox.js')}}"></script>
<script src="{{Asset('src/jsgrid.field.control.js')}}"></script>

@stop