@extends ('layouts.master')

@section ('head.title')
{{trans('messages.add_user')}}
@stop

@section ('body.content')

<div id="content">
    <section>
        <h1>Basic Scenario</h1>
        <div id="jsGrid"></div>

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
                                url: "{{route('itemindex')}}",
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

    </section>
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


