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
label {
 display: inline-block;
 line-height: 1.5em;
 vertical-align: middle;
}
.ui-datepicke{
    font-family: "Trebuchet MS", "Helvetica", "Arial",  "Verdana", "sans-serif";
    font-size: 62.5%;
}
input {
 display: inline-block;
 vertical-align: middle;
}
.fa{
    cursor: pointer;
}
.fa-group
{
    display:inline;
    vertical-align:middle;
}
.ui-widget-header {
    background: #FFF none repeat scroll 0% 0%;
    }
.ui-datepicker-title select
{
    font-size: 12px;
    -moz-appearance: none;
    color: #3D454C;
    background: #FFF url("https://redmine.asiantech.vn/themes/circle/images/select.png") no-repeat scroll right center / 18px 16px;
}
.multiselect {
    width: 200px;
}
</style>
<link rel="stylesheet" type="text/css" href="{{Asset('css/jsgrid.css')}}" />
<link rel="stylesheet" type="text/css" href="{{Asset('css/theme.css')}}" />
<script type="text/javascript" src="{{ Asset('jquery-ui/jquery-ui.js') }}" ></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <!-- <link rel="stylesheet" type="text/css" href="{{ Asset('jquery-ui/jquery-ui.css') }}"> -->
<!-- <link rel="stylesheet" type="text/css" href="{{Asset('css/jquery-ui.css')}}" /> -->
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
                        <div class="btn-group">

</label>
</div>
                        <!-- <button class="btn btn-primary" id='btn-add-project'><i class="fa fa-plus-circle"> {{trans('messages.add_projects')}}</i></button> -->
                        <div id="jsGridProject">

                        </div>
                        <div id="myModal" class="modal fade">
                            <div class="modal-dialog" style='width:60%'>
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
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">{{trans('messages.close')}}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ================ end popup -->
                    <input type='hidden' value='{{csrf_token()}}' name='_token' id="_token" >
<script>
var global = {
        itemsdis:[]
    };
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
        filterTemplate: function() {
            return this._filtertPicker = $("<input>").datepicker({changeMonth: true,changeYear: true,dateFormat: 'yy-mm-dd',showButtonPanel:false}).datepicker();
        },
        insertTemplate: function () {
            return this._insertPicker = $("<input>").datepicker({changeMonth: true,changeYear: true,dateFormat: 'yy-mm-dd',showButtonPanel:false}).datepicker("setDate", new Date());
        },
        editTemplate: function (value) {
            return this._editPicker = $("<input>").datepicker({changeMonth: true,changeYear: true,dateFormat: 'yy-mm-dd',showButtonPanel:false}).datepicker("setDate", new Date(value));
        },
        insertValue: function () {
            var date = this._insertPicker.datepicker({option: "getDate"});
            return  date.datepicker({dateFormat: 'yy-mm-dd'}).val();
        },
        editValue: function () {
            var date = this._editPicker.datepicker({dateFormat: 'yy-mm-dd'}).val();
            return date;
        },
        filterValue: function() {
            var date = this._filtertPicker.datepicker({option: "getDate"});
            return  date.datepicker({dateFormat: 'yy-mm-dd'}).val();
        },
    });
    /*var btnTeam=function(config)
    {
        jsGrid.Field.call(this, config);
    };
    btnTeam.prototype = new jsGrid.Field({
        insertTemplate: function (value) {
            return $("<span class='fa fa-hand-o-up' style='width:100%; height:100%;'>")
                        .on("click", function ()
                        {
                            showteam("-1", item['projectname']);
                            return false;
                        });
        },
    });*/
    //var number=0;
    /*var STT=function(config)
    {
        jsGrid.Field.call(this, config);
    };
    STT.prototype = new jsGrid.Field({
        itemTemplate: function (value) {

            return value;
        },
    });*/
    jsGrid.fields.myDateField = MyDateField;
    dbteam.nodata=[];
    $("#jsGridProject").jsGrid({
        pageLoading: false,
        height: "auto",
        width: "100%",
        searching: true,
        lbSearch: "Search",
        editing: true,
        inserting: true,
        sorting: true,
        paging: true,
        pageSize: 15,
        loadIndicationDelay: 10000,
        pageButtonCount: 5,
        autoload: true,
        controller: db,
        fields: [
            {title:"#", width: 20, type: 'seqnum', sorting:false},
            {name: "project_name", title: "{{trans('messages.project_name')}}", type: "text", id: "fullname", width: 120, filtering:false},
            {name: "start_date", title: "{{trans('messages.startdate')}}", type: "myDateField", width: 70,align:"center"},
            {name: "end_date", title: "{{trans('messages.enddate')}}", type: "myDateField", width: 70,align:"center"},
            {name: "user_id", title: "{{trans('messages.pm')}}", type: "select", items: db.users, valueField: "id", textField: "fullname", width: 120},
            {name: "status_id", title: "{{trans('messages.status')}}", type: "select", items: db.status, valueField: "id", textField: "name"},
            {
                insertTemplate: function (_,item) {
                    return $("<i class='fa fa-group text-blue' style='width:100%; height:100%;'>")
                                .on("click", function ()
                                {
                                    var $z=$(this).parents('tr').children('td:nth-child(2)').children().val();
                                    showteam("", $z);

                                });
                },
                headerTemplate: function () {
                    return "{{trans('messages.team')}}";
                },
                itemTemplate: function (_, item) {
                    var listname="";
                    $.each(item['users'],function(index,value){
                        if(index==0)
                            listname=value['fullname'];
                        else
                            listname=listname+"\r\n"+value['fullname'];
                    });
                    return $("<i class='fa fa-group text-blue' style='width:100%; height:100%;' title='" + listname + "'>")
                            .on("click", function ()
                            {
                                showteam(item['id'], item['project_name']);
                                return false;
                            });
                },
                align: "center",
                width: 50
            },
            {name: "comments", title: "{{trans('messages.comment')}}", type: "textarea", width: 120, filtering:false},
            {type: "control",title : "{{trans('messages.action')}}",
                searchModeButtonTooltip: "Switch to filtering",
                insertModeButtonTooltip: "Switch to adding",
                editButtonTooltip: "Edit",
                deleteButtonTooltip: "Delete",
                searchButtonTooltip: "Filter",
                clearFilterButtonTooltip: "Clear filter",
                insertButtonTooltip: "Add",
                updateButtonTooltip: "Update",
                cancelEditButtonTooltip: "Cancel edit",
            }
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
                dbteam.itemsdis=[];
                $("#jsGridTeam").jsGrid("destroy");
                //alert(JSON.stringify(dbteam.clients));
                $(".modal-title").text("{{trans('messages.team')}} " + projectname);
                $("#project_id").val(id);
                $('#myModal').modal('show');
                $("#jsGridTeam").jsGrid({
                    pageLoading: false,
                    height: "auto",
                    width: "100%",
                    editing: true,
                    inserting: true,
                    searching: true,
                    sorting: true,
                    paging: true,
                    pageSize: 15,
                    pageButtonCount: 5,
                    autoload: true,
                    data: dbteam.getTeam(id),
                    controller: dbteam,
                    fields: [
                        {title:"#", width: "5%", type: 'seqnum', sorting:false},
                        {name: "user_id", title: "{{trans('messages.user')}}", type: "select", items: dbteam.users, valueField: "id", textField: "fullname",disable:true, width: "40%"},
                        {name: "group_id", title: "{{trans('messages.role')}}", type: "select", items: dbteam.groups, valueField: "id", textField: "groupname",width: "25%"},
                        {name: "joined", title: "{{trans('messages.joined')}}", type: "myDateField", width: "20%",align:"center"},
                        {type: "control", width: "10%"}
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
    $("#jsGridProject").on("change","table td:nth-child(3) input",function () {
        var dt2= $(this).parents("tr").first().children("td:nth-child(4)").find('input');
        var minDate = $(this).datepicker('getDate');
        dt2.datepicker('option', 'minDate', minDate);
        });
    $("#jsGridProject").on("change","table td:nth-child(4) input",function () {
        var dt2= $(this).parents("tr").first().children("td:nth-child(3)").find('input');
        var minDate = dt2.datepicker('getDate');
        if(new Date(minDate).getTime() > new Date($(this).datepicker('getDate')).getTime())
        {
            $(this).datepicker('option', 'minDate', minDate);
        }
        });
    /*$("#jsGridProject").on("change",".jsgrid-insert-row td:nth-child(3) input",function () {
        var dt2 = $('.jsgrid-edit-row td:nth-child(4) input');
        var startDate = $(this).datepicker('getDate');
        var minDate = $(this).datepicker('getDate');
        dt2.datepicker('option', 'minDate', minDate);
        if(new Date(startDate).getTime() > new Date(dt2.datepicker('getDate')).getTime())
        {
            alert("l");
        }else
            alert("2");

        });*/
</script>
<script type="text/javascript">
$select = $("select").off("change");

       $select.on("change", function(e) {
           alert("you selected :" + $(this).val());
       });
</script>
<script src="{{Asset('data/dbteam.js')}}"></script>
<script src="{{Asset('data/dbproject.js')}}"></script>
@stop
@section ('body.js')
<script src="{{Asset('bootstrap/js/select2.min.js')}}" type="text/javascript"></script>
<!-- <script type="text/javascript" src="{{asset('src/jquery-ui.js')}}"></script> -->
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
