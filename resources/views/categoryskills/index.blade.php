@extends ('layouts.master')
@section ('head.title')
{{trans('messages.skill_management')}}
@stop
@section ('body.content')
<link rel="stylesheet" type="text/css" href="{{Asset('css/jsgrid.css')}}" />
<link rel="stylesheet" type="text/css" href="{{Asset('css/theme.css')}}" />
<link href="{{Asset('bootstrap/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
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
            {{trans('messages.skill_management')}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> {{trans('messages.dashboard')}}</a></li>
            <li class="active">{{trans('messages.skill')}}</li>
        </ol>
    </section>
    <div id="dialog" title="Error">

    </div>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">{{trans('messages.list_skill')}}</h3>
                    </div>
                    <div class="box-body text-center">
                        <div class="col-sm-12">
                        <div class="jsGrid jshead" style="width:48%;margin-right: 4%; "><h5><b>List Category Skill</b></h5></div>
                        <div class="jsGrid jshead" style="width:48%"><h5><b>List Skill</b></h5></div>
                        <div id="jsGridCategory" class="text-left jsGrid" style="margin-right: 4%;"></div>
                        <div id="jsGridSkill" class="text-left jsGrid" ></div>
                        </div>
                    </div>
                    <!-- ================ end popup -->
                    <input type='hidden' value='{{csrf_token()}}' name='_token' id="_token" >
                    <script>
                    $(function () {
					    $("#jsGridCategory").jsGrid({
					        pageLoading: false,
					        height: "auto",
					        width: "48%",
					        editing: true,
					        inserting: true,
					        sorting: true,
					        paging: true,
					        pageSize: 15,
					        pageButtonCount: 5,
					        autoload: true,
					        controller: dbcategory,
					        fields: [
					            {name: "id", title: "{{trans('messages.id')}}",width:"10px"},
					            {name: "category_name", title: "{{trans('messages.skill')}}", type: "text"},
					            {type: "control"}
					        ]
					    });
					    $("#jsGridSkill").jsGrid({
					        pageLoading: false,
					        height: "auto",
					        width: "48%",
					        editing: true,
					        inserting: true,
					        sorting: true,
					        paging: true,
					        pageSize: 15,
					        pageButtonCount: 5,
					        autoload: true,
					        controller: dbskill,
					        fields: [
					            {name: "id", title: "{{trans('messages.id')}}",width:"10px"},
					            {name: "category_id", title: "{{trans('messages.role')}}", type: "select", items: dbcategory.getData(), valueField: "id", textField: "category_name"},
					            {name: "skill", title: "{{trans('messages.skill')}}", type: "text"},
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

<script type="text/javascript">
	$('#rs').on('click',function(){
		$("#jsGridSkill").jsGrid("destroy");
		$("#jsGridSkill").jsGrid("reset");
		alert("a");
	})
</script>
<script src="{{Asset('data/dbcategory.js')}}"></script>
<script src="{{Asset('data/dbskill.js')}}"></script>
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
