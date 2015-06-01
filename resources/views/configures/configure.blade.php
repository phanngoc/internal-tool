@extends ('layouts.master')

@section ('head.title')
{{trans('messages.configure')}}
@stop

@section ('body.content')
<link rel="stylesheet" href="{{Asset('dist/css/tabs.css')}}">
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <link href="{{Asset('bootstrap/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
        <script src="{{Asset('bootstrap/js/select2.min.js')}}" type="text/javascript"></script>
  <script>
  $(function() {
    $( "#tabs" ).tabs();
  });
  </script>
  <style type="text/css">

  </style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{trans('messages.configure')}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> {{trans('messages.dashboard')}}</a></li>
            <li class="active">{{trans('messages.configure')}}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-8 col-md-offset-2">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">{{trans('messages.configure')}}</h3>

                    </div>
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>{{trans('messages.whoop')}}</strong> {{trans('messages.problem')}}<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <!-- form start -->
                    <div class="box-body">
                    <div id="tabs">
  <ul>
    <li><a href="#tabs-system">System</a></li>
    <li><a href="#tabs-database">Database</a></li>
  </ul>
  <!-- From -->
  <form action="{!!route('configures.update')!!}" method="post">
      <div id="tabs-system">
        @include('configures.system')
      </div>
      <div id="tabs-database">
        @include('configures.database')
      </div>
      <div class="box-footer center">
        <div class="form-group col-sm-4 col-sm-offset-4 text-center">
        <input type='button' class='btn-primary btn text-center' value="{!!trans('messages.save')!!}"/>
      </div>
      </div>
  </form>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
</div>
@stop