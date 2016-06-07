@extends('layouts.master')
@section ('head.title')
  {{trans('messages.edit_module')}}
@stop

@section('body.content')
   <!-- Bootstrap slider -->

<div class="content-wrapper">
<section class="content-header">
  <h1>
    {{trans('messages.project_management')}}
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{route('index')}}"><i class="fa fa-dashboard"></i> {{trans('messages.dashboard')}}</a></li>
    <li><a href="{{ route('modules.index') }}">{{trans('messages.project_management')}}</a></li>
    <li class="active">{{trans('manageproject.edit_detail_feature')}}</li>
  </ol>
</section>
<section class="content">
          <div class="row">
            <div class="col-md-12">
              <!-- general form elements disabled -->
              <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">{{trans('manageproject.edit_detail_feature')}}</h3>
                    <a class="btn btn-primary pull-right" href="{!!route('manageproject.index', $projectId) !!}">{{trans('manageproject.list_detail_feature')}}</i></a>
                </div>

                <div class="box-body">
                  {!! Form::open( [
                    'route' => [ 'manageproject.postEditDetailFeature', $detailfeature->id, $projectId ],
                    'method' => 'PUT',
                    'class' => 'edit'
                    ])
                  !!}
                  <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Name<span class="text-red">*</span></label>
                      {!! Form::text('name', $detailfeature->name, [ 'id' => 'name', 'class' => 'form-control', 'autofocus']) !!}
                      @if($errors->has('name'))<label for="name" class="error">{{$errors->first("name")}}</label>@endif
                    </div>

                    <div class="form-group">
                      <label class="label-edit-data">Status<span class="text-red">*</span></label>
                      <select name='status_id' id='status_id' class="form-control select-edit-data">
                        @foreach($statusprojects as $status)
                          @if($status->id == $detailfeature->status_id)
                          <option value="{{ $status->id }}" selected='selected'>{{ $status->name }}</option>
                          @else
                          <option value="{{ $status->id }}">{{ $status->name }}</option>
                          @endif
                        @endforeach
                      </select>
                      <a class="edit-data" href="{{ route('crud.index','statusprojects') }}"><i class="fa fa-pencil-square-o"></i></a>
                      @if($errors->has('priority_id'))<label for="status_id" class="error">{{$errors->first("status_id")}}</label>@endif
                    </div>

                    <div class="form-group">
                      <label class="label-edit-data">Assigned to<span class="text-red">*</span></label>
                      <select class="form-control select2 select-edit-data" name="employees[]" multiple>
                        <?php
                          $emps = $detailfeature->employees()->get();
                          function checkExist($idEmp, $empSelect) {
                            foreach ($empSelect as $key => $value) {
                              if ($value->id == $idEmp) {
                                return true;
                              }
                            }
                            return false;
                          }
                        ?>
                        @foreach($employees as $employee)
                          @if(checkExist($employee->id,$emps))
                          <option value="{{ $employee->id }}" selected='selected'>{{ $employee->lastname." ".$employee->firstname }}</option>
                          @else
                          <option value="{{ $employee->id }}">{{ $employee->lastname." ".$employee->firstname }}</option>
                          @endif
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label class="label-edit-data">Priority<span class="text-red">*&nbsp;</span></label>
                      <select name='priority_id' class="form-control select-edit-data">
                      @foreach($priorities as $priority)
                        @if($priority->id == $detailfeature->priority_id)
                        <option value="{{ $priority->id }}" selected='selected'>{{ $priority->name }}</option>
                        @else
                        <option value="{{ $priority->id }}">{{ $priority->name }}</option>
                        @endif
                      @endforeach
                      </select>
                      <a class="edit-data" href="{{ route('crud.index','priority') }}"><i class="fa fa-pencil-square-o"></i></a>
                      @if($errors->has('priority_id'))<label for="priority_id" class="error">{{$errors->first("priority_id")}}</label>@endif
                    </div>

                    <div class="form-group">
                      <label class="label-edit-data">Feature project<span class="text-red">*&nbsp;</span></label>
                      <select name='featureproject_id' id='featureproject_id' class="form-control select-edit-data">
                      @foreach($featureprojects as $feapro)
                        @if($feapro->id == $detailfeature->featureproject_id)
                        <option value="{{ $feapro->id }}" selected='selected'>{{ $feapro->name }}</option>
                        @else
                        <option value="{{ $feapro->id }}">{{ $feapro->name }}</option>
                        @endif
                      @endforeach
                      </select>
                      <a class="edit-data" href="{{ route('crud.index','featureproject') }}"><i class="fa fa-pencil-square-o"></i></a>
                      @if($errors->has('featureproject_id'))<label for="featureproject_id" class="error">{{$errors->first("featureproject_id")}}</label>@endif
                    </div>

                    <div class="form-group">
                      <label class="label-edit-data">Type Feature<span class="text-red">*&nbsp;</span></label>
                      <select name='category_feature_id' id='category_feature_id' class="form-control select-edit-data">
                      @foreach($categoryfeatures as $catefea)
                        @if($catefea->id == $detailfeature->category_feature_id)
                        <option value="{{ $catefea->id }}" selected='selected'>{{ $catefea->name }}</option>
                        @else
                        <option value="{{ $catefea->id }}">{{ $catefea->name }}</option>
                        @endif
                      @endforeach
                      </select>
                      <a class="edit-data" href="{{ route('crud.index','category_feature') }}"><i class="fa fa-pencil-square-o"></i></a>
                      @if($errors->has('category_feature_id'))<label for="category_feature_id" class="error">{{$errors->first("category_feature_id")}}</label>@endif
                    </div>

                    <div class="box-footer center">
                      <div class="form-group">
                          <div class="text-center">
                              <input class="btn-primary btn" id="btn-submit-group" type="submit" value="{{trans('messages.save')}}">
                              <input type='reset' name='reset' id='reset' class="btn btn-primary" value="{{trans('messages.reset')}}">
                          </div>
                      </div>
                    </div>
                  </div> <!-- .col-md-6 -->

                  <!-- we start second column in gui -->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Description</label>
                      <textarea name="description" class="form-control" cols="30" style="height: 150px">{{ $detailfeature->description }}</textarea>
                      @if($errors->has('description'))<label for="description" class="error">{{$errors->first("description")}}</label>@endif
                    </div>

                    <div class="form-group">
                      <label>Done (%) <span class="text-red">*&nbsp;</span></label>
                      <input name="done" class="form-control" data-slider-min="1" data-slider-max="100"/>
                      @if($errors->has('done'))
                        <label for="done" class="error">{{$errors->first("done")}}</label>
                      @endif
                    </div>

                    <div class="form-group">
                      <label for="startdate">Start date<span class="text-red">*&nbsp;</span></label>
                      <input type="text" name="startdate" class="datepicker form-control" value="{{ $detailfeature->startdate }}"/>
                      @if($errors->has('startdate'))<label for="startdate" class="error">{{$errors->first("startdate")}}</label>@endif
                    </div>

                    <div class="form-group">
                      <label for="enddate">End date<span class="text-red">*&nbsp;</span></label>
                      <input type="text" name="enddate" class="datepicker form-control" value="{{ $detailfeature->enddate }}" />
                      @if($errors->has('enddate'))<label for="enddate" class="error">{{$errors->first("enddate")}}</label>@endif
                    </div>

                  </div> <!-- .col-md-6 -->
                </div> <!-- .row -->
                {!! Form::close() !!}

                <?php
                   $empAuth = Auth::user()->employee()->get()[0];
                ?>

                <div class="row">
                  <div class="comment-wrapper">
                    <ul>
                      <?php
                        $commentDetailFeatures = $detailfeature->comment_detail_features()->get();
                        foreach ($commentDetailFeatures as $key => $value) {
                          $user = $value->author()->get()[0];
                          ?>
                          <li class="item-comment" data-id="{{$value->id}}" data-urldelete = "{{route('manageproject.deleteCommentDetailFeature',$value->id)}}">
                              <div class="wrap-content">
                                <div class="avatar">
                                  <img src="{{Asset($user->avatar)}}" alt="" class="avatar-user-comment"/>
                                </div>
                                <div class="content-comment">
                                  <div class="item-header">
                                    <p class="item-header-label">
                                        {{$user->lastname.' '.$user->firstname}} commented <?php echo ago_time($value->updated_at);?> ago
                                    </p>
                                    <!-- if it is my post, i can edit it -->
                                    @if ($empAuth->id == $user->id)
                                      <p class="item-header-action">
                                        <i class="fa fa-pencil-square-o edit-comment"></i>
                                        <i class="fa fa-times delete-comment"></i>
                                      </p>
                                    @endif
                                  </div>
                                  <div class="item-content">{{$value->content}}</div>
                                </div> <!-- .content-comment -->
                              </div> <!-- .wrap-content -->

                              <!-- This is a div, i need to save markdown -->
                              <div class="html-save hidden">
                                <div class="avatar">
                                  <img src="{{Asset($user->avatar)}}" alt="" class="avatar-user-comment"/>
                                </div>
                                <div class="content-comment">
                                  <div class="item-header">
                                    <p class="item-header-label">
                                        {{$user->lastname.' '.$user->firstname}} commented 2 ago
                                    </p>
                                    <!-- if it is my post, i can edit it -->
                                    @if ($empAuth->id == $user->id)
                                      <p class="item-header-action">
                                        <i class="fa fa-pencil-square-o edit-comment"></i>
                                        <i class="fa fa-times delete-comment"></i>
                                      </p>
                                    @endif
                                  </div>
                                  <div class="item-content">{{$value->content}}</div>
                                </div> <!-- .content-comment -->
                              </div>
                          </li>
                          <?php
                        }
                      ?>
                    </ul>

                    <div class="comment-post">
                      <div class="inner-comment">

                        <div class="wrapper-avatar">
                          <img src="{{Asset($empAuth->avatar)}}" alt="" class="avatar-user-comment"/>
                        </div> <!-- .wrapper-avatar -->

                        <div class="content-comment">
                          <div class="item-header">
                            <p class="item-header-label"></p>
                          </div> <!-- .item-header -->

                          <div class="item-content">
                              <textarea name="content-comment" rows="8" cols="40" id="content-comment"></textarea>
                              <p class="select-file" class="#">You can <a href="javascript:" class="attachfile">Select file</a></p>
                              <div class="hidden">
                                <form action="{{ route('manageproject.uploadFileCommentDetailFeature') }}" method="POST" enctype="multipart/form-data" class="form-edit">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                    <input type="file" name="fileup" />
                                </form>
                              </div>
                          </div> <!-- .item-content -->

                          <div class="item-button">
                              <a href="javascript:" class="btn btn-default closeissue">Close issue</a>
                              <a href="javascript:" class="btn btn-success createcomment">Comment</a>
                          </div>
                        </div> <!-- .content-comment -->

                      </div>
                    </div>
                  </div>
                </div> <!-- .row -->

                </div> <!-- .box-body -->

              </div><!-- /.box -->
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->

</section>



<link rel="stylesheet" type="text/css" href="{{ Asset('css/detailfeature.css') }}">
<script src="{{ Asset('handerbarjs/handlebars.js') }}"></script>

<script id="edit-comment-template" type="text/x-handlebars-template">
    <div class="comment-post" data-id="@{{ id }}">
      <div class="inner-comment">
        <div class="wrapper-avatar">
          <img src="@{{ avatar }}" alt="" class="avatar-user-comment"/>
        </div> <!-- .wrapper-avatar -->

        <div class="content-comment">
          <div class="item-header">
            <p class="item-header-label"></p>
          </div> <!-- .item-header -->

          <div class="item-content">
              <textarea name="content-comment" rows="8" cols="40" id="content-comment">@{{ content }}</textarea>
              <p class="select-file" class="#">You can <a href="javascript:" class="attachfile">Select file</a></p>
              <div class="hidden">
                <form action="{{ route('manageproject.uploadFileCommentDetailFeature') }}" method="POST" enctype="multipart/form-data" class="form-edit">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input type="file" name="fileup" />
                </form>
              </div>
          </div> <!-- .item-content -->

          <div class="item-button">
              <a href="javascript:" class="btn btn-default close-edit-comment">Close</a>
              <a href="javascript:" class="btn btn-success post-edit-comment">Comment</a>
          </div>
        </div> <!-- .content-comment -->
      </div>
    </div> <!-- .comment-post -->
</script>

@include('manageproject.js-detailfeature')

    <script src="{{ Asset('marked.js') }}" type="text/javascript"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#name').focus();
            $('input[name="done"]').bootstrapSlider().bootstrapSlider('setValue', {{ $detailfeature->done }});
            $('.datepicker').datepicker({ dateFormat: 'yy-mm-dd 00:00:00' });
            $('.select2').select2();
            $('.comment-wrapper').find('ul .wrap-content div.item-content').each(function(key,val){
              console.log('has run');
              $(val).html(marked($(val).html()));
            });

            var $commonPost = $('.comment-post');
            $('.comment-wrapper').on('click','.createcomment',function(){
              var text = $commonPost.find('textarea#content-comment').val();
              var detailId = {{$segment = Request::segment(3)}};
              $.ajax({
                type : "POST",
                url : "{{ route('manageproject.postCreateCommentDetailFeature') }}",
                data : {text : text, detailFeatureId : detailId, _token : "{{ csrf_token() }}"},
              }).done(function(response){
                var $result = $(response);
                var valTextarea = $result.find('.html-save .item-content').val();
                $result.find('.wrap-content .item-content').val(marked(valTextarea));
                var html = $('<div>').append($result.clone()).html();
                console.log(html);
                $('.comment-wrapper ul').append(html);
                $commonPost.find('textarea[name="content-comment"]').val("");
              });

            });

            $('.comment-wrapper').on('click','.edit-comment',function(){
              var $itemTarget = $(this).closest('li.item-comment');
              // we get markdown not parse
              var contentOld = $itemTarget.find('.html-save .item-content').text();
              // We will use when user press cancel button
              // var htmlOld = $itemTarget.find('.wrap-content').html();
              // $itemTarget.find('.html-save').html(htmlOld);
              var commentDFId = $(this).data('id');
              var source   = $("#edit-comment-template").html();
              var template = Handlebars.compile(source);
              var id = $itemTarget.data('id');
              var context = { avatar: "{{ Asset($empAuth->avatar) }}", content: contentOld, id: id };
              var html    = template(context);
              $itemTarget.find('.wrap-content').html(html);
            });

            $('.comment-wrapper').on('click','.close-edit-comment',function(){
              var $itemTarget = $(this).closest('li.item-comment');
              var htmlOld = $itemTarget.find('.html-save').html();
              $itemTarget.find('.wrap-content').html(htmlOld);
              $itemTarget.find('.wrap-content .item-content').html(marked(val));
            });

            $('.comment-wrapper').on('click','.delete-comment',function(){
              var $itemTarget = $(this).closest('li.item-comment');

              var urlDelete = $itemTarget.data('urldelete');
              if(confirm("Are you sure want to delete ?") == true)
              {
                $.ajax({
                    url: urlDelete,
                    method: 'POST',
                    data: {_token : "{{csrf_token()}}"},
                    success: function(res) {
                      if(res.status == "ok") {
                        alert("Delete successfully");
                        $itemTarget.remove();
                      } else {
                        alert("Delete unsuccessfully");
                      }
                    },
                    error: function(res) {

                    }
                });
              }
            });

            $('.comment-wrapper').on('click','.post-edit-comment',function(){
              var val = $(this).closest('li.item-comment').find('textarea[name="content-comment"]').val();

              var $itemTarget = $(this).closest('li.item-comment');
              var idDetailFea = $itemTarget.find('.comment-post').data('id');
              var htmlOld = $itemTarget.find('.html-save').html();
              $itemTarget.find('.wrap-content').html(htmlOld);
              $itemTarget.find('.item-content').html(marked(val));
              // we need save data which not markdown and then use it for edit
              $itemTarget.find('.html-save .item-content').html(val);
              $.ajax({
                type : "POST",
                url : "{{ route('manageproject.postEditCommentDetailFeature') }}",
                data : {val : val, detailFeatureId : idDetailFea, _token : "{{ csrf_token() }}"},
              }).done(function(response){

              });
            });

            $('.comment-wrapper').on('click','.attachfile',function(){
                $(this).parent().next().find('input[name="fileup"]').click();
                var $attachfile = $(this);
                var $textarea = $(this).parent().prev();
                var $formUpFile = $(this).parent().next().find('.form-edit');

                $(this).parent().next().find('input[name="fileup"]').change(function(){
                  var fdata = new FormData($formUpFile[0]);
                  console.log(fdata);
                  $textarea.val($textarea.val()+'[Uploading file]');
                  $.ajax({
                      url: $formUpFile.attr('action'),
                      method: 'POST',
                      data: fdata,
                      processData: false, // tell jQuery not to process the data
                      contentType: false, // tell jQuery not to set contentType
                      success: function(res) {
                        var oldVal = $textarea.val();
                        $textarea.val(oldVal.replace('[Uploading file]',res));
                      },
                      error: function(res) {

                      }
                  });
                });
            });



        });
    </script>
</div>

@stop
