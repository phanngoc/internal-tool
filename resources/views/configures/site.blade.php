<style type="text/css">
	    .onoffswitch {
        position: relative; width: 76px;
        -webkit-user-select:none; -moz-user-select:none; -ms-user-select: none;
    }
    .onoffswitch-checkbox {
        display: none;
    }
    .onoffswitch-label {
        display: block; overflow: hidden; cursor: pointer;
        border: 2px solid #999999; border-radius: 20px;
    }
    .onoffswitch-inner {
        display: block; width: 200%; margin-left: -100%;
        -moz-transition: margin 0.3s ease-in 0s; -webkit-transition: margin 0.3s ease-in 0s;
        -o-transition: margin 0.3s ease-in 0s; transition: margin 0.3s ease-in 0s;
    }
    .onoffswitch-inner:before, .onoffswitch-inner:after {
        display: block; float: left; width: 50%; height: 18px; padding: 0; line-height: 18px;
        font-size: 14px; color: white; font-family: Trebuchet, Arial, sans-serif; font-weight: bold;
        -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box;
    }
    .onoffswitch-inner:before {
        content: "ON";
        padding-left: 10px;
        background-color: #34A7C1; color: #FFFFFF;
    }
    .onoffswitch-inner:after {
        content: "OFF";
        padding-right: 10px;
        background-color: #EEEEEE; color: #999999;
        text-align: right;
    }
    .onoffswitch-switch {
        display: block; width: 18px; margin: 0px;
        background: #FFFFFF;
        border: 2px solid #999999; border-radius: 20px;
        position: absolute; top: 0; bottom: 0; right: 54px;
        -moz-transition: all 0.3s ease-in 0s; -webkit-transition: all 0.3s ease-in 0s;
        -o-transition: all 0.3s ease-in 0s; transition: all 0.3s ease-in 0s;
    }
    .onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-inner {
        margin-left: 0;
    }
    .onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-switch {
        right: 0px;
    }

</style>
<div class="form-group">
{!! Form::label('name_system')!!}
{!! Form::text('name_system',null,['id'=>'name_system','class'=>'form-control','placeholder'=>trans('messages.e_module_name'),'autofocus']) !!}
{!! Form::label('description')!!}
{!! Form::text('description',null,['id'=>'description','class'=>'form-control','placeholder'=>trans('messages.e_module_name'),'autofocus']) !!}
{!! Form::label('site_offline')!!}
<div class="onoffswitch">
    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" checked>
    <label class="onoffswitch-label" for="myonoffswitch">
        <span class="onoffswitch-inner"></span>
        <span class="onoffswitch-switch"></span>
    </label>
</div>
{!! Form::label('offline_message')!!}
{!! Form::textarea('offline_message',null,['rows'=>'2','cols'=>'40','id'=>'description','class'=>'form-control','placeholder'=>trans('messages.e_module_name'),'autofocus']) !!}
</div>