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
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="ui-widget">
                            <label for="tags">Tags: </label>
                            <input id="tags">
                        </div>
                        <div id="jsGridProject"></div>
                        <a href="#myModal" class="btn btn-lg btn-primary" data-toggle="modal" id="show">Launch Demo Modal</a>
                        <!-- ================ popup -->

                        <div id="myModal" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title"></h4>
                                        <input type='hidden' value='' name='project_id' id="project_id" >
                                    </div>
                                    <div class="modal-body">
                                        <div id="jsGridTeam"></div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ================ end popup -->
                    <input type='hidden' value='{{csrf_token()}}' name='_token' id="_token" >
                    <script>
$(function () {
    var MyDateField = function (config) {
        jsGrid.Field.call(this, config);
    };

    MyDateField.prototype = new jsGrid.Field({
        sorter: function (date1, date2) {
            return new Date(date1) - new Date(date2);
        },
        itemTemplate: function (value) {

            return value;
        },
        insertTemplate: function (value) {

            return this._insertPicker = $("<input>").datepicker({defaultDate: new Date()});
        },
        editTemplate: function (value) {
            return this._editPicker = $("<input>").datepicker().datepicker("setDate", new Date(value));
        },
        insertValue: function () {
            var date = this._insertPicker.datepicker({option: "getDate"});
            return  date.datepicker({dateFormat: 'dd-mm-yy'}).val();
        },
        editValue: function () {
            var date = this._editPicker.datepicker({dateFormat: 'dd-mm-yy'}).val();
            return date;
        }
    });

    jsGrid.fields.myDateField = MyDateField;
    $("#jsGridProject").jsGrid({
        pageLoading: false,
        height: "auto",
        width: "100%",
        editing: true,
        inserting: true,
        sorting: true,
        paging: true,
        pageSize: 15,
        pageButtonCount: 5,
        autoload: true,
        controller: db,
        fields: [
            {name: "id", title: "ID", hidden: true, width: 20, class: "hidden"},
            {name: "projectname", title: "Project Name", type: "text", id: "fullname", width: 120},
            {name: "startdate", title: "Start date", type: "myDateField", width: 120},
            {name: "enddate", title: "End date", type: "myDateField", width: 120},
            {name: "user_id", title: "PM", type: "select", items: db.users, valueField: "id", textField: "fullname"},
            {name: "status_id", title: "Status", type: "select", items: db.status, valueField: "id", textField: "name"},
            {
                headerTemplate: function () {
                    return "Team";
                },
                itemTemplate: function (_, item) {
                    return $("<span class='fa fa-group fa-2x red' style='width:100%; height:100%;' title='" + item['listname'] + "'>")
                            .on("click", function ()
                            {
                                showteam(item['id'], item['projectname']);
                                return false;
                            });
                },
                align: "center",
                width: 50
            },
            {name: "comments", title: "Comment", type: "text", width: 120},
            {type: "control"}
        ]
    });
});
                    </script>
                </div><!-- /.box-body -->
            </div>
        </div>
        <script>
            function showteam(id, projectname)
            {
                $(".modal-title").text("Team " + projectname);
                $("#project_id").val(id);
                $('#myModal').modal('show');
                $("#jsGridTeam").jsGrid({
                    pageLoading: false,
                    height: "auto",
                    width: "100%",
                    editing: true,
                    inserting: true,
                    sorting: true,
                    paging: true,
                    pageSize: 15,
                    pageButtonCount: 5,
                    autoload: true,
                    data: dbteam.getTeam(id),
                    controller: dbteam,
                    fields: [
                        {name: "id", title: "ID", hidden: true},
                        {name: "user_id", title: "User", type: "select", items: dbteam.users, valueField: "id", textField: "fullname"},
                        {name: "group_id", title: "Role", type: "select", items: dbteam.groups, valueField: "id", textField: "groupname"},
                        {name: "joined", title: "Joined", type: "text"},
                        {type: "control"}
                    ]
                });
            }
        </script>
    </section>
</div>
<script src="{{Asset('data/dbteam.js')}}"></script>
<script src="{{Asset('data/dbproject.js')}}"></script>
@stop
@section ('body.js')
<style>
    .rating {
        color: #F8CA03;
    }
</style>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,600,400' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="{{asset('bootstrap/js/bootstrap.js')}}">
<link rel="stylesheet" type="text/css" href="{{Asset('css/jsgrid.css')}}" />
<link rel="stylesheet" type="text/css" href="{{Asset('css/theme.css')}}" />
<link rel="stylesheet" type="text/css" href="{{Asset('css/jquery-ui.css')}}" />
<link href="{{Asset('bootstrap/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
<script src="{{Asset('bootstrap/js/select2.min.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="{{asset('src/jquery-ui.js')}}"></script>
<!--<script type="text/javascript">
                    $("#datepicker").datepicker({
                        inline: true
                    });
</script>-->
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
