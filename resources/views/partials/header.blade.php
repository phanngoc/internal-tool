<header class="main-header">
        <!-- Logo -->
        <a href="{{ route('index') }}" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>MCT</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>MANAGE COMPANY</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success">{{ $countUnreadMessage }}</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have {{ $countUnreadMessage }} unread messages</li>
                  <li>
                    <ul class="menu">
                      @foreach ($unReadMessages as $key => $unReadMessage)
                          <li>
                            @if ($key == 0)
                              Unread message
                            @endif
                            <a href="{{ route('clicknofify', $unReadMessage->id) }}">
                              <div class="pull-left">
                                <img src="{!!Asset('avatar/'.$unReadMessage->thread->avatar)!!}" class="img-circle" alt="User Image"/>
                              </div>
                              <h4>
                                {{ $unReadMessage->thread->header }}
                                <small><i class="fa fa-clock-o"></i> <?php echo ago_time($unReadMessage->updated_at);?></small>
                              </h4>
                              <p>{{ $unReadMessage->content }}</p>
                            </a>
                          </li>
                      @endforeach
                      @foreach ($readMessages as $key => $readMessage)
                          <li>
                            @if ($key == 0)
                              Message which you've already read
                            @endif
                            <a href="{{ route('clicknofify', $readMessage->id) }}">
                              <div class="pull-left">
                                <img src="{!!Asset('avatar/'.$readMessage->thread->avatar)!!}" class="img-circle" alt="User Image"/>
                              </div>
                              <h4>
                                {{ $readMessage->thread->header }}
                                <small><i class="fa fa-clock-o"></i> <?php echo ago_time($readMessage->updated_at);?></small>
                              </h4>
                              <p>{{ $readMessage->content }}</p>
                            </a>
                          </li>
                      @endforeach
                    </ul>
                  </li>
                  <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
              </li>
              <!-- Notifications: style can be found in dropdown.less -->
              <!-- <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">10</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 10 notifications</li>
                  <li>
                    inner menu: contains the actual data
                    <ul class="menu">
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> 5 new members joined today
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the page and may cause design problems
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-red"></i> 5 new members joined
                        </a>
                      </li>

                      <li>
                        <a href="#">
                          <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-user text-red"></i> You changed your username
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">View all</a></li>
                </ul>
              </li> -->
              <!-- Tasks: style can be found in dropdown.less -->
              <!-- <li class="dropdown tasks-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-flag-o"></i>
                  <span class="label label-danger">9</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 9 tasks</li>
                  <li>
                    inner menu: contains the actual data
                    <ul class="menu">
                      <li>Task item
                        <a href="#">
                          <h3>
                            Design some buttons
                            <small class="pull-right">20%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">20% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li>end task item
                      <li>Task item
                        <a href="#">
                          <h3>
                            Create a nice theme
                            <small class="pull-right">40%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">40% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li>end task item
                      <li>Task item
                        <a href="#">
                          <h3>
                            Some task I need to do
                            <small class="pull-right">60%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">60% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li>end task item
                      <li>Task item
                        <a href="#">
                          <h3>
                            Make beautiful transitions
                            <small class="pull-right">80%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">80% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li>end task item
                    </ul>
                  </li>
                  <li class="footer">
                    <a href="#">View all tasks</a>
                  </li>
                </ul>
              </li> -->
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo Asset(Auth::user()->employee()->get()->first()->avatar);?>" class="user-image" alt="User Image" width="35" height="35" />
                  <span class="hidden-xs"><?php echo Auth::user()->employee()->first()->lastname . " " . Auth::user()->employee()->first()->firstname;?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <?php if (Auth::user()->employee()->get()->first()->avatar == null) {?>
                       <img src="{{ Asset('avatar/avatar-default.png') }}" class="img-circle" alt="User Image" />
                    <?php } else {
	?>
                       <img src="<?php echo Asset(Auth::user()->employee()->get()->first()->avatar);?>" class="img-circle" alt="User Image" />
                    <?php
}
?>
                    <p>
                      <?php echo Auth::user()->fullname;?>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <!-- <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </li> -->
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="{{ url('profiles') }}" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="{{ url('/auth/logout')}}" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <script type="text/javascript">
      /*$(document).on('click', '#logout', function() {
      var form =
          $('<form>', {
            'method': 'GET',
            'action': "{{ url('/auth/logout')}}"
          });
      form.append().hide().appendTo('body').submit();
    return false;
  });*/
      </script>
