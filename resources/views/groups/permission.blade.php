 @extends ('layouts.master')

@section ('head.title')
  {{trans('messages.title_change_permission')}}
@stop

@section('body.content')
<style type="text/css">
  .feature{
    width: 32%;
    float: left;
  }
  a { cursor: pointer; }
  .check:hover {
    color: red;
  }
  legend{
    margin-bottom: 0px;
    margin-top: 0px;
    font-size: 16px;
  }
  fieldset{
    margin-bottom: 20px;
  }
  .inboxparent label:hover{
    font-weight: 700;
  }
  .inboxparent label{
    font-weight: normal;
  }
  .inboxparent{
    padding-left: 10px;
    color: #3C8DBC;

  }
</style>
<div class="content-wrapper">
<section class="content-header">
  <h1>
    {{trans('messages.group_management')}}
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> {{trans('messages.dashboard')}}</a></li>
    <li><a href="{{ route('groups.index') }}">{{trans('messages.group')}}</a></li>
    <li class="active">{{trans('messages.set_permission_for_group',array('group'=>$group->groupname))}}</li>
  </ol>
</section>

<section class="content">
      <div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">{{trans('messages.set_permission_for_group',array('group'=>$group->groupname))}}</h3>
                  <form role="form" action="{{ route('groups.permission') }}" method="POST">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="id_group" value="{{$group->id}}" />
                  <div class="box-body">
                     @foreach ($modules as $k_module => $v_module)
                          <fieldset>
                          <legend><input type="checkbox" class ="checkparent" id="{{$k_module}}"/>&nbsp;<label for="{{$k_module}}">{{$v_module->name}}</label></legend>
                          <div class="inboxparent">
                          {{--*/ $featuresall = $v_module->feature()->get() /*--}}
                          @foreach ($featuresall as $k_feature => $v_feature)
                              <label class="feature">
                                <input class ="checkchild" type="checkbox" name="permissions[]" value="{{$v_feature->id}}" {{in_array($v_feature->id, $featurecheck) ? 'checked' : ''}}/> </input>
                                <span class="inboxchild" data-toggle="tooltip" data-placement="top" title="{{$v_feature->description}}">{{$v_feature->name_feature}}</span>
                              </label>
                          @endforeach()
                          <div>
                            </fieldset>
                     @endforeach()
                  </div><!-- /.box-body -->
                    <div class="box-footer">
                      <div class="form-group">
                            <div class="col-sm-12 text-left">
                                <a id='checkall' class='check'>Check all</a>&nbsp;&nbsp;|&nbsp;
                                <a id='uncheckall' class='check'>Uncheck all</a>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 text-center">
                                <input class="btn-primary btn" type="submit" value="{{trans('messages.save')}}">
                                <input class="btn-primary btn" type="reset" value="{{trans('messages.reset')}}">
                            </div>
                        </div>
                    </div>

                    <script>
                       $(document).ready(function(){
                        $('#checkall').on('click',function(){
                          $("input").prop('checked', true);
                        });
                        $('#uncheckall').on('click',function(){
                          $("input").prop('checked', false);
                        });
                        $('.checkparent').on('click',function(){
                          var $container = $(this).parent();
                          var $container2 = $container.parent();
                          if($(this).is(':checked'))
                          $container2.find("input").prop('checked', true);
                        else
                          $container2.find("input").prop('checked', false);
                        });
                        $('.checkchild').on('change',function(){
                          var rs=false;
                          var $container = $(this).parent();
                          var $container2 = $container.parent();
                          var $container3 = $container2.parent();
                          $container3.find('legend > input').prop('checked', true);
                          if(!$(this).is(':checked')){
                            $container2.find("input").each(function(key, value) {
                            if($(value).is(':checked'))
                              rs=true;
                            });
                            if(!rs)
                              $container3.find('legend > input').prop('checked', false);
                          }
                        });
                        $("fieldset label input").each(function(key, value) {
                          if($(this).is(':checked'))
                          {
                            var $container = $(this).parent();
                            var $container2 = $container.parent();
                            var $container3 = $container2.parent();
                            $container3.find('legend > input').prop('checked', true);
                          }
                        });
                       });
                    </script>

                </form>
              </div>
            </div>
          </div>
</section>
</div>


@stop
