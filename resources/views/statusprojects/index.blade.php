@extends ('layouts.master')

@section ('head.title')
{{trans('messages.statusproject_management')}}
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
            {{trans('messages.statusproject_management')}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> {{trans('messages.dashboard')}}</a></li>
            <li class="active">{{trans('messages.statusproject')}}</li>
        </ol>
    </section>
    <div id="dialog" title="Error">

    </div>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">{{trans('messages.list_statusproject')}}</h3>
                    </div>
                    <div class="box-body">
                        <div id="jsGridProject"></div>
                    </div>

                    <!-- ================ end popup -->
                    <input type='hidden' value='{{csrf_token()}}' name='_token' id="_token" >
                    <script>
$(function () {


    $("#jsGridProject").jsGrid({
        pageLoading: false,
        height: "auto",
        width: "100%",
        editing: true,
        inserting: true,
        filtering:true,
        sorting: true,
        paging: true,
        pageSize: 15,
        pageButtonCount: 5,
        autoload: true,
        controller: db,
        fields: [
            {name: "name", title: "Name", type: "text", width: 120},
            {name: "description", title: "Description", type: "textarea", width: 120},
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

<script src="{{Asset('data/dbprojectstt.js')}}"></script>
@stop
@section ('body.js')
<script src="{{Asset('bootstrap/js/select2.min.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="{{asset('src/jquery-ui.js')}}"></script>
<script src="{{Asset('src/jsgrid.core.js')}}"></script>
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
