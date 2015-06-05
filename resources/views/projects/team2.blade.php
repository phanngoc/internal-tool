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

        <script>
            $(function () {
                $("#jsGrid").jsGrid({
                    pageLoading: false,
                    height: "auto",
                    width: "100%",
                    editing: true,
                    sorting: true,
                    paging: true,
                    pageSize: 15,
                    pageButtonCount: 5,
                    autoload: true,
                    controller: db,
                    fields: [
                        {name: "id", title: "ID", type: "text", width: 20},
                        {name: "fullname",title: "Full Name", type: "text", id: "fullname", width: 120},
                        {name: "email", title: "Email",type: "text", width: 120},
                        {name: "group", title: "Group", type: "select", items: db.groups, valueField: "id", textField: "groupname" },
                        //{name: "group",giatri:"id", type: "select", items: db.groups, valueField: "id", textField: "groupname" },
                        //{ name: "Country", type: "select", items: db.countries, valueField: "Id", textField: "Name" },
                        //{ name: "group", type: "select", items: db.countries, valueField: "Id", textField: "Name" },
                        //{name: "group", giatri:"groupname", type: "text", width: 120},
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
<script src="{{Asset('data/db.js')}}"></script>
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


