<li>
    <div class="wrap-content">
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
        <div class="item-content">
            {{$commentDetailFeature->content}}
        </div>
      </div> <!-- .content-comment -->
    </div> <!-- .wrap-content -->
</li>