@extends ('layouts.master')
@section ('head.title')
{{trans('messages.skill_management')}}
@stop
@section ('body.content')
<link rel="stylesheet" type="text/css" href="{{Asset('css/jsgrid.css')}}" />
<link rel="stylesheet" type="text/css" href="{{Asset('css/theme.css')}}" />
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            {{trans('messages.status_device_management')}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> {{trans('messages.dashboard')}}</a></li>
            <li class="active">{{trans('messages.status_device')}}</li>
        </ol>
    </section>
    <div id="dialog" title="Error">

    </div>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">{{trans('messages.list_status_device')}}</h3>
                    </div>
                    <div class="box-body text-center">
                        <div class="col-sm-8 col-sm-offset-2">
                        <div id="jsGridStatusDevice" class="text-center"></div>
                        </div>
                    </div>

                    <!-- ================ end popup -->
                    <input type='hidden' value='{{csrf_token()}}' name='_token' id="_token" >
                    <script>
$(function () {


    $("#jsGridStatusDevice").jsGrid({
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
                </div><!-- /.box-body -->
            </div>
        </div>
    </section>
</div>

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
<script src="{{Asset('src/jsgrid.field.textarea.js')}}"></script>
<script src="{{Asset('src/jsgrid.field.control.js')}}"></script>
@stop
