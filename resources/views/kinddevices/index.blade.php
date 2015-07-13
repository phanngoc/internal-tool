@extends ('layouts.master')
@section ('head.title')
{{trans('messages.skill_management')}}
@stop
@section ('body.content')
<link rel="stylesheet" type="text/css" href="{{Asset('css/jsgrid.css')}}" />
<link rel="stylesheet" type="text/css" href="{{Asset('css/theme.css')}}" />
<link href="{{Asset('bootstrap/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
<script src="{{Asset('data/dbkinddevice.js')}}"></script>
<script src="{{Asset('data/dbmodeldevice.js')}}"></script>
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
            {{trans('messages.kind_device_management')}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> {{trans('messages.dashboard')}}</a></li>
            <li class="active">{{trans('messages.kind_device')}}</li>
        </ol>
    </section>
    <div id="dialog" title="Error">

    </div>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">{{trans('messages.list_kind_device')}}</h3>
                    </div>
                    <div class="box-body text-center">
                        <div class="col-sm-12">
                        <div class='thinh'></div>
                        
                       
                     
                        <div id="jsGridSkill" class="text-left jsGrid" ></div>
                        </div>
                    </div>
                    <!-- ================ end popup -->
                    <input type='hidden' value='{{csrf_token()}}' name='_token' id="_token" >
                    <script>
                    $(function () {
                     
                        $.skill = {
                          create : function() {
                            $("#jsGridSkill").jsGrid({
                            pageLoading: false,
                            height: "auto",
                            width: "100%",
                            editing: true,
                            inserting: true,
                            sorting: true,
                            searching: true,
                            paging: true,
                            pageSize: 15,
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
                        $.skill.create();

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
