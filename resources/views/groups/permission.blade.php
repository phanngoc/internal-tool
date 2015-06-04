 @extends ('layouts.master')

@section ('head.title')
  {{trans('messages.title_change_permission')}}
@stop

@section('body.content')

<div class="content-wrapper">
<section class="content-header">
  <h1>
    {{trans('messages.group_management')}}
    <small>{{trans('messages.set_permission_for_group',array('group'=>$group->groupname))}}
    </small>
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
                </div>
                <?php 

                  // function is_checked($id,$features)
                  // {
                  //   foreach ($features as $key => $value) {
                  //     if($value->id == $id)
                  //     {
                  //       return true;
                  //     }
                  //   }
                  //   return false;
                  // }
                ?>
                <form role="form" action="{{ route('groups.permission') }}" method="POST">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="id_group" value="{{$group->id}}" />
                  <div class="box-body">
                    <ul class="list-resource">
                      <?php foreach ($modules as $k_module => $v_module) {
                       ?>
                         <li class="resource-group">
                              <label class="resource-parent"><input type="checkbox"/> <?php echo $v_module->name; ?></label>
                              <ul class="resource-children">
                                <?php 
                                  $featuresall = $v_module->feature()->get();
                                  foreach ($featuresall as $k_feature => $v_feature) {
                                    ?>
                                      <li>
                                          <label><input type="checkbox" name="permissions[]" value="<?php echo $v_feature->id; ?>" <?php echo in_array($v_feature->id, $featurecheck) ? 'checked' : '' ?>/> <?php echo $v_feature->name_feature; ?></label>
                                      </li>
                                    <?php
                                  }
                                ?>
                              </ul>
                         </li>     

                       <?php
                      }?>
                    </ul>
                  </div><!-- /.box-body -->
                    <div class="box-footer">
                        <div class="form-group">
                            <div class="col-lg-offset-3 col-sm-offset-4 col-lg-9 col-sm-8">
                                <input class="btn-primary btn" type="submit" value="<?php echo trans('messages.submit'); ?>"> 
                                <a class="btn-default btn" href="<?php echo route('groups.index') ?>"><?php echo trans('messages.cancel'); ?></a>
                            </div>
                        </div>
                    </div>

                    <script>
                       $(document).ready(function(){
                          // $(".resource-parent").children("input").change(function() {
                          //     // var parent =  $(this).parent().parent();
                          //     // if(this.checked) {
                               
                          //     //   parent.children("input").prop('checked', true);
                          //     // }
                          //     // else
                          //     // {
                          //     //   parent.children("input").prop('checked', false);
                          //     // }
                          // });
                          $('.resource-parent input').on('click', function() {

                              var $container = $(this).parents('.resource-group');

                              var checkStatus = $(this).prop('checked');

                              $container.find('ul.resource-children input').each(function() {

                                  $(this).prop('checked', checkStatus);

                              });

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
