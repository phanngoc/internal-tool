<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>{{Config::get('app.system_name')}} @yield('head.title')</title>
    <style type="text/css">
        label.error{
            color: #e74c3c;
        }
    </style>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="{!!Asset('bootstrap/css/bootstrap.min.css')!!}" rel="stylesheet" type="text/css" />
    <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{!!Asset('dist/css/AdminLTE.css')!!}" rel="stylesheet" type="text/css" />
    <link href="{!!Asset('dist/css/skins/_all-skins.min.css')!!}" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="{!!Asset('treegrid/jquery.min.js')!!}"></script>
    <script src="{!!Asset('bootstrap/js/jquery.validate.min.js')!!}" type="text/javascript"></script>
    @yield('head.css')

  </head>
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">

      @include ('partials.header')

      @include ('partials.aside')
        <section class="view">
            <div class="" style="margin-left:inherit">
                <div class="">
                    @if(Session::has('messageOk'))
                    <div class="alert alert-success alert-dismissible user-message text-center" style="margin-top: 30px" role="alert">
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <span>{{ Session::get('messageOk') }}</span>
                    </div>
                    @elseif(Session::has('messageNo'))
                    <div class="alert alert-danger alert-dismissible user-message text-center" style="margin-top: 30px" role="alert">
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <span>{{ Session::get('messageNo') }}</span>
                    </div>
                    @endif

        @yield('body.content')

                </div>
            </div>
        </section>


    </div>
    <!-- End Wrapper -->

    <!-- jQuery 2.1.4 -->


    <!-- jQuery UI 1.11.2 -->
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>

    <!-- Bootstrap 3.3.2 JS -->
    <script src="{!!Asset('bootstrap/js/bootstrap.min.js')!!}" type="text/javascript"></script>

    <!-- Slimscroll -->
    <script src="{!!Asset('plugins/slimScroll/jquery.slimscroll.min.js')!!}" type="text/javascript"></script>

    <!-- AdminLTE App -->
    <script src="{!!Asset('dist/js/app.min.js')!!}" type="text/javascript"></script>
    @yield('body.js')

  </body>
</html>