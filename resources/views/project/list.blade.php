@extends ('layouts.master')

@section ('head.title')
{{trans('messages.add_user')}}
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
                <div id="jsGrid"></div>
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
                                var date= this._insertPicker.datepicker({option: "getDate"});
                                return  date.datepicker({ dateFormat: 'dd-mm-yy' }).val();                             
                            },
                            editValue: function () {
                                var date = this._editPicker.datepicker({ dateFormat: 'dd-mm-yy' }).val();
                                return date;
    }
                        });

                        jsGrid.fields.myDateField = MyDateField;
                        $("#jsGrid").jsGrid({
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
                                {name: "projectname", title: "Full Name", type: "text", id: "fullname", width: 120},
                                {name: "startdate", title: "Start date", type: "myDateField", width: 120},
                                {name: "enddate", title: "End date", type: "myDateField", width: 120},
                                {name: "status_id", title: "Start", type: "select", items: db.status, valueField: "id", textField: "name"},
                                {name: "user_id", title: "PM", type: "select", items: db.users, valueField: "id", textField: "fullname"},
                                {name: "comments", title: "Comments", type: "text", width: 120},
                                {
                                    headerTemplate: function () {
                                        return "Team";
                                    },
                                    itemTemplate: function (item) {
                                        return $("<input>").attr("type", "button")
                                                .on("click", function () {
                                                    alert("ok");
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
                </script>
<!--                 <script type="text/javascript">
$(".js-example-basic-multiple").select2({
   placeholder: "{{trans('messages.sl_groups')}}"
});
    </script>-->
            </div><!-- /.box-body -->
        </div>
    </section>
</div>
<script src="{{Asset('src/dbproject.js')}}"></script>
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
