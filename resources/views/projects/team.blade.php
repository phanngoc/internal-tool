@extends ('layouts.master')

@section ('head.title')
{{trans('messages.add_user')}}
@stop

@section ('body.content')
<style type="text/css">
    .lgroup{
        background-color: #E4E4E4;
        border: 1px solid #AAA;
        border-radius: 4px;
        cursor: default;
        float: left;
        margin-right: 5px;
        margin-top: 5px;
        padding: 0px 5px;
    }
</style>
<!-- <link rel="stylesheet" type="text/css" href="{{Asset('/css/demos.css')}}" /> -->
<link href="{{Asset('bootstrap/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
<script src="{{Asset('bootstrap/js/select2.min.js')}}" type="text/javascript"></script>
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

<div id="jsGrid"></div>
<input type='hidden' value='{{csrf_token()}}' name='_token' id="_token" >
        <script>
            $(function () {
                $("#jsGrid").jsGrid({
                    pageLoading: false,
                    height: "auto",
                    width: "100%",
                    editing: true,
                    sorting: true,
                    inserting: true,
                    paging: true,
                    pageSize: 15,
                    pageButtonCount: 5,
                    autoload: true,
                    controller: db,
                    fields: [
                        {name: "id", title: "ID",hidden: true, edit: false, width: 20},
                        {name: "projectname",title: "Project Name", type: "text", id: "fullname", width: 120},
                        {name: "startdate", title: "Start",type: "text", width: 120},
                        {name: "enddate", title: "End",type: "text", width: 120},
                        {name: "user_id",title: "PM", type: "select", items: db.users, valueField: "id", textField: "fullname" },
                        {
                            headerTemplate: function() {
                            return "Team";
                        },
                            itemTemplate: function(_, item) {
                                return $("<input>").attr({"type":"button","class":"btn btn-warning"})
                                    .on("click", function () {
                                    alert("ok");
                                    return false;
                            });
                        },
                align: "center",
                width: 50
            },
                        //{name: "team",title: "Team", type: "select", items: db.users, valueField: "id", textField: "fullname" },
                        //{name: "status_id", title: "Status",type: "select", width: 120},
                        { name: "status_id",title: "Status", type: "select", items: db.status, valueField: "id", textField: "name" },
                        {name: "comments", title: "Comment",type: "text", width: 120},
                        {type: "control"}
                    ]
                });

            });
        </script>
        <div class='abc'></div>
        <button id="xem">xem123</button>
        <script type="text/javascript">
            $('#xem').click(function(){
                $(".js-example-basic-multiple").select2();
            })
        </script>
                </div><!-- /.box-body -->
              </div>
            </div>
          </div>
</section>
</div>
@stop
@section ('body.js')
<style>
    .rating {
        color: #F8CA03;
    }
</style>

<link rel="stylesheet" type="text/css" href="{{Asset('/css/jsgrid.css')}}" />
<link rel="stylesheet" type="text/css" href="{{Asset('/css/theme.css')}}" />
<script src="{{Asset('data/dbproject.js')}}"></script>
<script src="{{Asset('src/jsgrid.core.js')}}"></script>
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


