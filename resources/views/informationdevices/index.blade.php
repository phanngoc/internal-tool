@extends ('layouts.master')
@section ('head.title')
{{trans('messages.skill_management')}}
@stop
@section ('body.content')
<link rel="stylesheet" type="text/css" href="{{Asset('css/jsgrid.css')}}" />
<link rel="stylesheet" type="text/css" href="{{Asset('css/theme.css')}}" />
<link rel="stylesheet" type="text/css" href="{{Asset('css/jquery-ui.css')}}" />
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            {{trans('messages.information_device_management')}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> {{trans('messages.dashboard')}}</a></li>
            <li class="active">{{trans('messages.information_device')}}</li>
        </ol>
    </section>
    <div id="dialog" title="Error">

    </div>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">{{trans('messages.list_information_device')}}</h3>
                    </div>
                    <div class="box-body text-center">
                        <div class="col-sm-8 col-sm-offset-2">
                        <div id="jsGridInformationDevice" class="text-center"></div>
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
    $("#jsGridInformationDevice").jsGrid({
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
        controller: dbinformationdevice,
        fields: [
            /*{name: "id", title: "{{trans('messages.id')}}",width:"10px"},*/
            {name: "contract_number", title: "{{trans('messages.contract_number')}}", type: "text"},
            {name: "buy_date", title: "{{trans('messages.buy_date')}}", type: "myDateField"},
            {name: "distribution", title: "{{trans('messages.distribution')}}", type: "text"},
            {name: "term_warranty", title: "{{trans('messages.term_warranty')}}", type: "text"},
            
            
            {type: "control"}
        ]
    });
});
                    </script>
                </div><!-- /.box-body -->
            </div>
        </div>
    </section>
</div>

<script src="{{Asset('data/dbinformationdevice.js')}}"></script>
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
