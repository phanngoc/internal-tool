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
<style>
    .rating {
        color: #F8CA03;
    }
</style>

<link rel="stylesheet" type="text/css" href="{{Asset('/css/jsgrid.css')}}" />
<link rel="stylesheet" type="text/css" href="{{Asset('/css/theme.css')}}" />

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
                      <a class="btn btn-success" href="{{ route('groups.create') }}"><i class="fa fa-group"> {{trans('messages.add_group')}}</i></a>
                    <?php endif;?>
                    </div>
                  </div>
                <div class="box-body">
<input type='hidden' value='{{csrf_token()}}' name='_token' id="_token" >
<div class="bs-example">
    <!-- Button HTML (to Trigger Modal) -->
<a href="#myModal" class="btn btn-lg btn-primary" data-toggle="modal" id="show">Launch Demo Modal</a>
<input class='btn btn-success btn' type="button" id="thinh" value="123">
    <!-- Modal HTML -->
<div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Team Project</h4>
                </div>
                <div class="modal-body">
                    <div id="jsGrid"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div><!-- /.box-body -->
</div>
</div>
</div>
</section>
</div>
    <script type="text/javascript">
    $(function(){
    $( "#show" ).on('click', function(){
//$.getScript("{{Asset('data/dbproject.js')}}");
$.getScript("{{Asset('data/dbproject.js')}}", function () {
   $("#jsGrid").jsGrid({
                    pageLoading: false,
                    height: "auto",
                    width: "100%",
                    editing: true,
                    inserting:true,
                    sorting: true,
                    paging: true,
                    pageSize: 15,
                    pageButtonCount: 5,
                    autoload: true,
                    controller: db,
                    fields: [
                        {name: "id", title: "ID", hidden: true, width: 20,class:"hidden"},
                        {name: "projectname",title: "Project Name", type: "text", id: "fullname", width: 120},
                        {name: "startdate", title: "Start",type: "text", width: 120},
                        {name: "enddate", title: "End",type: "text", width: 120},
                        {name: "user_id", title: "PM", type: "select", items: db.users, valueField: "id", textField: "fullname" },
                        {name: "status_id", title: "Status", type: "select", items: db.status, valueField: "id", textField: "name" },
                        {name: "comments", title: "Comment",type: "text", width: 120},
                        {
                            headerTemplate: function() {
                                return "Team";
                            },
                            itemTemplate: function(item) {
                                return $("<input class='btn btn-success btn'>").attr("type", "button")
                                        .on("click", function () {
                                            alert(JSON.stringify(item));
                                            return false;
                                        });
                            },
                            align: "center",
                            width: 50
                        },
                        {type: "control"}
                    ]
                });
});

    });
    });
    </script>

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
