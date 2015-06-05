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

                <script>
                    $(function () {

                    // Define date field
                    var MyDateField = function(config) {
                            jsGrid.Field.call(this, config);
                        };

                        MyDateField.prototype = new jsGrid.Field({
                            sorter: function(date1, date2) {
                                return new Date(date1) - new Date(date2);
                            },

                            itemTemplate: function(value) {
                                return value;
                            },

                            insertTemplate: function(value) {
                                return this._insertPicker = $("<input>").datepicker({ defaultDate: new Date() });
                            },

                            editTemplate: function(value) {
                                return this._editPicker = $("<input>").datepicker().datepicker("setDate", new Date(value));
                            },

                            insertValue: function() {
                                return this._insertPicker.datepicker("getDate").toISOString();
                            },

                            editValue: function() {
                                return this._editPicker.datepicker("getDate").toISOString();
                            }
                        });
                    jsGrid.fields.myDateField = MyDateField;

                    // Define autocomplete field
                    var MyDateField = function(config) {
                            jsGrid.Field.call(this, config);
                        };

                        MyDateField.prototype = new jsGrid.Field({
                            sorter: function(date1, date2) {
                                return new Date(date1) - new Date(date2);
                            },

                            itemTemplate: function(value) {
                                return value;
                            },

                            insertTemplate: function(value) {
                                return this._insertPicker = $("<input>").datepicker({ defaultDate: new Date() });
                            },

                            editTemplate: function(value) {
                                return this._editPicker = $("<input>").datepicker().datepicker("setDate", new Date(value));
                            },

                            insertValue: function() {
                                return this._insertPicker.datepicker("getDate").toISOString();
                            },

                            editValue: function() {
                                return this._editPicker.datepicker("getDate").toISOString();
                            }
                        });
                    jsGrid.fields.myDateField = MyDateField;


                    // Load jsGrid
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
                            controller: {
                                loadData: function () {
                                    var d = $.Deferred();
                                    $.ajax({
                                        url: "{{route('projects.index')}}",
                                        type: "get",
                                        dataType: "json"
                                    }).done(function (response) {
                                        d.resolve(response);
                                    });
                                    return d.promise();
                                },
                                updateItem: function (updatingClient) {
                                    var d = $.Deferred();
                                    updatingClient['_token'] = '<?php echo csrf_token();?>';
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
                                    item['_token'] = '<?php echo csrf_token();?>';
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
                                {name: "projectname", type: "text", width: 80},
                                {name: "startdate", type: "myDateField", width: 80, align: "center" },
                                {name: "enddate", type: "myDateField", width: 80, align: "center" },
                                {name: "pm", type: "text", width: 80},
                                {name: "status", type: "text", width:80},
                                {name: "comments", type: "text", width: 80},
                                {type: "control"}
                            ]
                        });

                    });
                </script>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
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

<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,600,400' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="{{asset('bootstrap/js/bootstrap.js')}}">
<link rel="stylesheet" type="text/css" href="{{Asset('css/jsgrid.css')}}" />
<link rel="stylesheet" type="text/css" href="{{Asset('css/theme.css')}}" />
<link rel="stylesheet" type="text/css" href="{{Asset('css/jquery-ui.css')}}" />
<script type="text/javascript" src="{{asset('src/jquery-ui.js')}}"></script>
<script type="text/javascript">
    $( "#datepicker" ).datepicker({
        inline: true
    });
</script>
<script src="{{Asset('src/jsgrid.core.js')}}"></script>
<script src="{{Asset('src/db.js')}}"></script>
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
