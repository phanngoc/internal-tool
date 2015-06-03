
<style type="text/css">
  ul{
  list-style-type:none;
}
</style>
<!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="{!!Asset('dist/img/user2-160x160.jpg')!!}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p>Alexander Pierce</p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>

          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- End Search Form -->
<?php $current = Route::currentRouteName();?>

<ul class="sidebar-menu">
  <li class="header">MAIN NAVIGATION</li>
  <li class=" treeview">
      <a href="{{ route('index') }}">
        <i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
  </li>

  <li class="treeview">
        <a href="#">
          <i class="fa fa-gears"></i>
          <span>Settings</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">

       <?php if (check(array('users.index'), $allowed_routes)): ?>
        <li class=""><a href="{{ route('users.index') }}"><i class="fa fa-user"></i> User</a>
          <ul>

            <?php if (check(array('users.create'), $allowed_routes)): ?>
              <li class="">
                <a href="{{route('users.create')}}" class=""><i class="fa fa-user-plus"></i>  Add User</a>
              </li>
            <?php endif;?>

            <?php if (check(array('users.index'), $allowed_routes)): ?>
            <li class="">
              <a href="{{route('users.index')}}" class=""><i class="fa fa-list"></i> List Users</a>
            </li>
            <?php endif;?>

          </ul>
        </li>
       <?php endif;?>

       <?php if (check(array('groups.index'), $allowed_routes)): ?>
        <li>
          <a href="{{ route('groups.index') }}"><i class="fa fa-users"></i> Group </a>
          <ul>
            <?php if (check(array('users.create'), $allowed_routes)): ?>
             <li><a href="{{route('groups.create')}}" class=""><i class="fa fa-plus-circle"></i> Add Group</a></li>
            <?php endif;?>
            <li><a href="{{route('groups.index')}}" class=""><i class="fa fa-list"></i> List Groups</a></li>
           </ul>
         </li>
       <?php endif;?>


       <?php if (check(array('modules.index'), $allowed_routes)): ?>
         <li>
          <a href="{{ route('modules.index') }}"><i class="fa fa-users"></i> Module </a>
          <ul>
            <?php if (check(array('modules.create'), $allowed_routes)): ?>
              <li><a href="{{ route('modules.create') }}" class=""><i class="fa fa-plus-circle"></i> Add Module</a></li>
            <?php endif;?>
            <li><a href="{{ route('modules.index') }}" class=""><i class="fa fa-list"></i> List Modules</a></li>
           </ul>
         </li>
        <?php endif;?>

        <?php if (check(array('features.index'), $allowed_routes)): ?>
         <li>
          <a href="{{ route('features.index') }}"><i class="fa fa-users"></i> Feature Module </a>
          <ul>
            <?php if (check(array('features.create'), $allowed_routes)): ?>
               <li><a href="{{ route('features.create') }}" class=""><i class="fa fa-plus-circle"></i> Add Feature</a></li>
            <?php endif;?>
            <li><a href="{{ route('features.index') }}" class=""><i class="fa fa-list"></i> List Features</a></li>
           </ul>
         </li>
       <?php endif;?>  

        <?php if (check(array('configures.index'), $allowed_routes)): ?>
          <li><a href="{{ route('configures.index') }}"><i class="fa fa-user"></i> System</a></li>
        <?php endif;?>

        <?php if (check(array('languages.index'), $allowed_routes)): ?>
         <li><a href="{{ route('languages.index') }}"><i class="fa fa-language"></i> Language</a></li>
        <?php endif;?>

      </ul>
  </li>
</ul>
</section>
</aside>