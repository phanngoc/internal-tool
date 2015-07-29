<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>{{App\Configure::where('name', '=', 'system_name')->first()->value}} @yield('head.title')</title>
    <link rel="shortcut icon" href="http://asiantech.vn/favicon.ico" type="">
    <style type="text/css">
        label.error{
            color: #e74c3c;
        }
        .error-message {
          margin-top: 10px;
          margin-bottom: 0px;
        }
        /* .alert {
          padding: 15px;
          margin-bottom: 0px;
          border: 1px solid transparent;
          border-radius: 4px;
        } */
    </style>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="{!!Asset('bootstrap/css/bootstrap.min.css')!!}" rel="stylesheet" type="text/css" />
    <!-- FontAwesome 4.3.0 -->
    <link href="{!!Asset('Font-Awesome-master/css/font-awesome.min.css')!!}" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="{!!Asset('font-awesome/ionicons.min.css')!!}" rel="stylesheet" type="text/css" />
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
                @yield('body.content')
            </div>
        </section>


    </div>
    <!-- End Wrapper -->

    <!-- jQuery 2.1.4 -->


    <!-- jQuery UI 1.11.2 -->
    <!-- <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script> -->

    <!-- Bootstrap 3.3.2 JS -->
    <script src="{!!Asset('bootstrap/js/bootstrap.min.js')!!}" type="text/javascript"></script>
    <script src="{!!Asset('js/app-internal.js')!!}" type="text/javascript"></script>

    <!-- Slimscroll -->
    <script src="{!!Asset('plugins/slimScroll/jquery.slimscroll.min.js')!!}" type="text/javascript"></script>

    <!-- AdminLTE App -->
    <script src="{!!Asset('dist/js/app.min.js')!!}" type="text/javascript"></script>
    @yield('body.js')
    <script type="text/javascript">
        $div1=$('<div class="error-message">');
        $div2=$('<div class="hidden alert alert-dismissible user-message text-center" style="margin-top: 30px" role="alert">');
        $div2.append('<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>');
        @if(Session::has('messageOk'))
            $div2.append("<span>{{ Session::get('messageOk') }}</span>").addClass("alert-success").removeClass('hidden');
        @elseif(Session::has('messageNo'))
            $div2.append("<span>{{ Session::get('messageNo') }}</span>").addClass("alert-danger").removeClass('hidden');
        @elseif(Session::has('messageDelete'))
            $div2.append("<span>{{ Session::get('messageDelete') }}</span>").addClass("alert-success").removeClass('hidden');
        @endif
        $div2.css("margin-bottom","0px");
        $div1.append($div2);
        $div1.insertAfter( ".content-header" );

        $(".alert").delay(3000).hide(1000);
            setTimeout(function() {
            $('.alert').remove();
        }, 5000);
    </script>
    <script type="text/javascript">
        $(document).ajaxStart(function () {
            $("#btn-ajax").show();
        }).ajaxStop(function () {
            $("#btn-ajax").hide();
        });
    </script>
  </body>
</html>