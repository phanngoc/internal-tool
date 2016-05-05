<li class="item-comment" data-id="{{$commentDetailFeature->id}}" data-urldelete = "{{route('manageproject.deleteCommentDetailFeature',$commentDetailFeature->id)}}">
    <div class="wrap-content">
      <div class="avatar">
        <img src="{{Asset($employee->avatar)}}" alt="" class="avatar-user-comment"/>
      </div>
      <div class="content-comment">
        <div class="item-header">
          <p class="item-header-label">
              {{$employee->lastname.' '.$employee->firstname}} commented <?php echo ago_time($commentDetailFeature->updated_at);?> ago
          </p>

          <p class="item-header-action">
            <i class="fa fa-pencil-square-o edit-comment"></i>
            <i class="fa fa-times delete-comment"></i>
          </p>

        </div>
        <div class="item-content">{{$commentDetailFeature->content}}</div>
      </div> <!-- .content-comment -->
    </div> <!-- .wrap-content -->

    <!-- This is a div, i need to save markdown -->
    <div class="html-save hidden">
      <div class="avatar">
        <img src="{{Asset($employee->avatar)}}" alt="" class="avatar-user-comment"/>
      </div>
      <div class="content-comment">
        <div class="item-header">
          <p class="item-header-label">
              {{$employee->lastname.' '.$employee->firstname}} commented 2 ago
          </p>
          <p class="item-header-action">
            <i class="fa fa-pencil-square-o edit-comment"></i>
            <i class="fa fa-times delete-comment"></i>
          </p>
        </div>
        <div class="item-content">{{$commentDetailFeature->content}}</div>
      </div> <!-- .content-comment -->
    </div>
</li>
