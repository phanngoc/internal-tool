
<style type="text/css">
    ul{
        list-style-type:none;
    }
    span#label{
        color:  #e74c3c;
    }
</style>
<script type="text/javascript">
            /*$(document).ready(function(){
            $.ajax({
                url: "{{route('admin.sidebar')}}",
            }).done(function(response) {
                $('.sidebar-menu').append(response);
                var vitrimenu='';
                vitrimenu=GetUserCookie();
                if(vitrimenu!='')
                {
                    $('ul.sidebar-menu  li.treeview').eq(vitrimenu).addClass("active").siblings();
                }
            });
            $('ul.sidebar-menu li.treeview').on('click',function() {
                var slideIndex = $(this).index('.treeview');
                UpdateUserCookie(slideIndex);
        });
        });*/

            </script>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo Asset(Auth::user()->employee()->get()->first()->avatar);?>" class="img-circle" alt="User Image" style="min-height:38px"/>
            </div>
            <div class="pull-left info">
                <p><?php echo Auth::user()->fullname;?></p>

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

        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
                <a href="{{ route('index') }}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
            </li>
            {!!$sidebar!!}
        </ul>
    </section>
</aside>