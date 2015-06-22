@extends ('layouts.master')

@section ('head.title')
{{trans('messages.project_management')}}
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
</style>

<link rel="stylesheet" type="text/css" href="{{Asset('css/jsgrid.css')}}" />
<link rel="stylesheet" type="text/css" href="{{Asset('css/theme.css')}}" />
<link rel="stylesheet" type="text/css" href="{{Asset('css/jquery-ui.css')}}" />
<link href="{{Asset('bootstrap/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
<!-- <script src="{{Asset('bootstrap/js/select2.min.js')}}" type="text/javascript"></script> -->
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            {{trans('messages.project_management')}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> {{trans('messages.dashboard')}}</a></li>
            <li class="active">{{trans('messages.project')}}</li>
        </ol>
    </section>
    <div id="dialog" title="Error">

    </div>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">{{trans('messages.list_project')}}</h3>
                    </div>
                    <div class="box-body">
                        <!-- <button class="btn btn-primary" id='btn-add-project'><i class="fa fa-plus-circle"> {{trans('messages.add_projects')}}</i></button> -->
                        <div id="jsGridProject"></div>
                        <div id="myModal" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div class="error-message"></div>
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

    // DIALOG ERRORS
    $( "#dialog" ).dialog({
          modal : true,
          autoOpen: false,
          draggable : false,
          resizable : false,
          width : 400,
          show: {
            effect: "blind",
            duration: 100
          },
          hide: {
            effect: "explode",
            duration: 200
          }
      });

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
            {name: "projectname", title: "{{trans('messages.project_name')}}", type: "text", id: "fullname", width: 120},
            {name: "startdate", title: "{{trans('messages.startdate')}}", type: "myDateField", width: 70},
            {name: "enddate", title: "{{trans('messages.enddate')}}", type: "myDateField", width: 70},
            {name: "user_id", title: "{{trans('messages.pm')}}", type: "select", items: db.users, valueField: "id", textField: "fullname", width: 120},
            {name: "status_id", title: "{{trans('messages.status')}}", type: "select", items: db.status, valueField: "id", textField: "name"},
            {
                headerTemplate: function () {
                    return "{{trans('messages.team')}}";
                },
                itemTemplate: function (_, item) {
                    return $("<span class='fa fa-hand-o-up' style='width:100%; height:100%;' title='" + item['listname'] + "'>")
                            .on("click", function ()
                            {
                                showteam(item['id'], item['projectname']);
                                return false;
                            });
                },
                align: "center",
                width: 50
            },
            {name: "comments", title: "{{trans('messages.comment')}}", type: "textarea", width: 120},
            {type: "control",title : "{{trans('messages.action')}}"}
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
                $("#jsGridTeam").jsGrid("destroy");
                $(".modal-title").text("{{trans('messages.team')}} " + projectname);
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
                        {name: "user_id", title: "{{trans('messages.user')}}", type: "select", items: dbteam.users, valueField: "id", textField: "fullname"},
                        {name: "group_id", title: "{{trans('messages.role')}}", type: "select", items: dbteam.groups, valueField: "id", textField: "groupname"},
                        {name: "joined", title: "{{trans('messages.joined')}}", type: "myDateField"},
                        {type: "control"}
                    ]
                });

                $('table').width('100%');
            }
        function isEmpty(value)
        {
            return value == '';
        }


        function checkValidate(classelem)
        {
            var projectname =  $(classelem).find('td:nth-child(2) input').val();
            var startdate = $(classelem).find('td:nth-child(3) input').val();
            var enddate = $(classelem).find('td:nth-child(4) input').val();
            var user_id = $(classelem).find('td:nth-child(5) input').val();
            var status_id = $(classelem).find('td:nth-child(6) input').val();
            var error = "<ul>";
            if(isEmpty(projectname))
            {
              error += "<li><b>projectname</b> not empty </li>";
            }
            if(isEmpty(startdate))
            {
              error += "<li><b>startdate</b> not empty </li>";
            }
            if(isEmpty(enddate))
            {
              error += "<li><b>enddate</b> not empty</li>";
            }
            if(isEmpty(user_id))
            {
              error += "<li><b>PM</b> not empty</li>";
            }
            if(isEmpty(status_id))
            {
              error += "<li><b>status</b> not empty</li>";
            }
            error += "</ul>";

            if(error != "<ul></ul>")
            {
               $( "#dialog" ).html(error);
               $( "#dialog" ).dialog( "open" );
               return false;
            }
            return true;
        }

        </script>
    </section>
</div>
<script type="text/javascript">
    $('#btn-add-project').on('click',function(){
        $('.jsgrid-insert-mode-button').trigger('click');
    });
</script>
<script src="{{Asset('data/dbteam.js')}}"></script>
<script src="{{Asset('data/dbproject.js')}}"></script>
@stop
@section ('body.js')
<script src="{{Asset('bootstrap/js/select2.min.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="{{asset('src/jquery-ui.js')}}"></script>
<script src="{{Asset('src/jsgrid.core-2.js')}}"></script>
<script src="{{Asset('src/jsgrid.load-indicator.js')}}"></script>
<script src="{{Asset('src/jsgrid.load-strategies.js')}}"></script>
<script src="{{Asset('src/jsgrid.sort-strategies.js')}}"></script>
<script src="{{Asset('src/jsgrid.field.js')}}"></script>
<script src="{{Asset('src/jsgrid.field.text.js')}}"></script>
<script src="{{Asset('src/jsgrid.field.number.js')}}"></script>
<script src="{{Asset('src/jsgrid.field.select.js')}}"></script>
<script src="{{Asset('src/jsgrid.field.textarea.js')}}"></script>
<script src="{{Asset('src/jsgrid.field.checkbox.js')}}"></script>
<script src="{{Asset('src/jsgrid.field.control.js')}}"></script>
@stop
