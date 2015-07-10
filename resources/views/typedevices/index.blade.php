@extends ('layouts.master')
@section ('head.title')
    Device Detail
@stop
@section ('body.content')
<link rel="stylesheet" type="text/css" href="{{Asset('css/jsgrid.css')}}" />
<link rel="stylesheet" type="text/css" href="{{Asset('css/theme.css')}}" />
<link href="{{Asset('bootstrap/css/select2.min.css')}}" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="{{ Asset('jquery-accessible-tabs/jquery.accTabs.min.js') }}" ></script>
  <link rel="stylesheet" type="text/css" href="{{ Asset('jquery-accessible-tabs/jquery-accessible-tabs.css') }}">
  <script type="text/javascript" src="{{ Asset('jquery-ui/jquery-ui.js') }}" ></script>
  <link rel="stylesheet" type="text/css" href="{{ Asset('jquery-ui/jquery-ui.css') }}">
<style type="text/css">
    .jsGrid{
        float: left;
    }
    .jshead{
        margin-bottom: 10px;
        border-bottom: double;
    }
</style>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Device Management
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> {{trans('messages.dashboard')}}</a></li>
            <li class="active">Devices</li>
        </ol>
    </section>
    <div id="dialog" title="Error">

    </div>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Device Detail</h3>
                    </div>
                    <div class="box-body text-center">
                        <div class="col-sm-12">
                        <div class='thinh'></div>
                             <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">{{ trans('messages.type_device') }}</a></li>
                  <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">{{ trans('messages.model_device') }}</a></li>
                  <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">{{ trans('messages.kind_device') }}</a></li>
                   <li class=""><a href="#tab_4" data-toggle="tab" aria-expanded="false">{{ trans('messages.operating_system') }}</a></li>
                    <li class=""><a href="#tab_5" data-toggle="tab" aria-expanded="false">{{ trans('messages.information_device') }}</a></li>
                    <li class=""><a href="#tab_6" data-toggle="tab" aria-expanded="false">{{ trans('messages.status_device') }}</a></li>

                </ul>
                    <div class="tab-content">
                  <div class="tab-pane active" class="text-left jsGrid" id="tab_1">

                        </div>


                  <div class="tab-pane" class="text-left jsGrid"  id="tab_2">


                        </div>
                 <div class="tab-pane" class="text-left jsGrid"  id="tab_3">


                        </div>
                 <div class="tab-pane" class="text-left jsGrid"  id="tab_4">


                        </div>
                 <div class="tab-pane" class="text-left jsGrid"  id="tab_5">


                        </div>
                         <div class="tab-pane" class="text-left jsGrid"  id="tab_6">


                        </div>




                    <!-- ================ end popup -->
                    <input type='hidden' value='{{csrf_token()}}' name='_token' id="_token" >

                    <script>
$(function () {


    $("#tab_1").jsGrid({
        pageLoading: false,
        height: "auto",
        width: "100%",
        editing: true,
        inserting: true,
        sorting: true,
        searching: true,
        paging: true,
        pageSize: 10,
        pageButtonCount: 5,
        autoload: true,
        controller: dbtypedevice,
        fields: [
            {title:"#", width: 20, type: 'seqnum',sorting: false},
            {name: "type_name", title: "{{trans('messages.type_name')}}", type: "text"},
            {name: "description", title: "{{trans('messages.description')}}", type: "textarea"},
            {type: "control"}
        ]
    });

                  

                        $.skill = {
                          create : function() {
                             $("#tab_2").jsGrid("destroy");
                            $("#tab_2").jsGrid({
                            pageLoading: false,
                            height: "auto",
                            width: "100%",
                            editing: true,
                            inserting: true,
                            sorting: true,
                            searching: true,
                            paging: true,
                            pageSize: 10,
                            pageButtonCount: 5,
                            autoload: true,
                            controller: dbmodeldevice,
                            fields: [
                                {title:"#", width: 20, type: 'seqnum',sorting: false},

                                {name: "model_name", title: "{{trans('messages.model_name')}}", type: "text"},
                                  {name: "description", title: "{{trans('messages.description')}}", type: "text"},
                                   {name: "type_id", title: "{{trans('messages.type_device')}}", type: "select", items: dbmodeldevice.gettype(), valueField: "id", textField: "type_name"},
                                {type: "control"}
                            ]
                                });
                            },
                        };
                        $.skill.create();


                    
                        $.skill1 = {
                          create : function() {
                               $("#tab_3").jsGrid("destroy");
                            $("#tab_3").jsGrid({
                            pageLoading: false,
                            height: "auto",
                            width: "100%",
                            editing: true,
                            inserting: true,
                            sorting: true,
                            searching: true,
                            paging: true,
                            pageSize: 10,
                            pageButtonCount: 5,
                            autoload: true,
                            controller: dbkinddevice,
                            fields: [
                                {title:"#", width: 20, type: 'seqnum',sorting: false},

                                {name: "device_name", title: "{{trans('messages.device_name')}}", type: "text"},
                                  {name: "quantity", title: "{{trans('messages.quantity')}}", type: "text"},
                                   {name: "model_id", title: "{{trans('messages.model_name')}}", type: "select", items: dbkinddevice.gettype(), valueField: "id", textField: "model_name"},
                                {type: "control"}
                            ]
                                });
                            },
                        };
                        $.skill1.create();

});
                    </script>


                           <script>
$(function () {


    $("#tab_4").jsGrid({
        pageLoading: false,
        height: "auto",
        width: "100%",
        editing: true,
        inserting: true,
        sorting: true,
        paging: true,
         searching: true,
        pageSize: 10,
        pageButtonCount: 5,
        autoload: true,
        controller: dboperatingsystem,
        fields: [
            /*{name: "id", title: "{{trans('messages.id')}}",width:"10px"},*/
            {name: "os_name", title: "{{trans('messages.status')}}", type: "text"},
            {name: "version", title: "{{trans('messages.description')}}", type: "text"},


            {type: "control"}
        ]
    });
});
                    </script>

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
        }
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
    $("#tab_5").jsGrid({
        pageLoading: false,
        height: "auto",
        width: "100%",
        editing: true,
        inserting: true,
        sorting: true,
        paging: true,
         searching: true,
        pageSize: 10,
        pageButtonCount: 5,
        autoload: true,
        controller: dbinformationdevice,
        fields: [
            /*{name: "id", title: "{{trans('messages.id')}}",width:"10px"},*/
            {name: "contract_number", title: "{{trans('messages.contract_number')}}", type: "text",width:70},
            {name: "buy_date", title: "{{trans('messages.buy_date')}}", type: "myDateField"},
            {name: "distribution", title: "{{trans('messages.distribution')}}", type: "text"},
            {name: "term_warranty", title: "{{trans('messages.term_warranty')}}", type: "text"},


            {type: "control"}
        ]
    });
});
                    </script>
                            <script>
$(function () {


    $("#tab_6").jsGrid({
        pageLoading: false,
        height: "auto",
        width: "100%",
        editing: true,
        inserting: true,
        sorting: true,
        paging: true,
        pageSize: 15,
         searching: true,
        pageButtonCount: 5,
        autoload: true,
        controller: dbstatusdevice,
        fields: [
            /*{name: "id", title: "{{trans('messages.id')}}",width:"10px"},*/
            {name: "status", title: "{{trans('messages.status')}}", type: "text"},
            {name: "description", title: "{{trans('messages.description')}}", type: "text"},


            {type: "control"}
        ]
    });
});
                    </script>




                    </div>
                </div>
                </div><!-- /.box-body -->
            </div>
            </div>
        </div>
    </div>
    </section>
</div>
<script type="text/javascript">
$("li").on("click",function(){

$("table").width('100%');


  

});

</script>
<script type="text/javascript">
    $('#rs').on('click',function(){
        $("#tab_2").jsGrid("destroy");
        $("#tab_2").jsGrid("reset");
        alert("a");
    })
</script>

<script src="{{Asset('data/dbtypedevice.js')}}"></script>
<script src="{{Asset('data/dbmodeldevice.js')}}"></script>
<script src="{{Asset('data/dbkinddevice.js')}}"></script>
<script src="{{Asset('data/dboperatingsystem.js')}}"></script>
<script src="{{Asset('data/dbinformationdevice.js')}}"></script>
<script src="{{Asset('data/dbstatusdevice.js')}}"></script>

@stop
@section ('body.js')
<script src="{{Asset('bootstrap/js/select2.min.js')}}" type="text/javascript"></script>
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


