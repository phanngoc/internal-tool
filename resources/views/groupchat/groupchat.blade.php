@extends ('layouts.master')

@section ('head.title')
  {{trans('messages.list_group')}}
@stop

@section ('head.css')
  <link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
@stop
@section('body.content')

<link href="{{Asset('bootstrap/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
<script src="{{Asset('bootstrap/js/select2.min.js')}}" type="text/javascript"></script>

<div class="content-wrapper">
  <section class="content-header">
    <h1>
      {{trans('messages.holidays')}}
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> {{trans('messages.dashboard')}}</a></li>
      <li><a href="{{ route('groups.index') }}">{{trans('messages.calendar')}}</a></li>
      <li class="active">{{trans('messages.holidays')}}</li>
    </ol>
  </section>

  <section class="content">
      <div class="row">
          <div class="col-xs-12">
            <div class="box box-primary">
              <div class="box-header">
                <h3 class="box-title">{{trans('messages.holidays')}}</h3>
              </div>

              <div class="box-body">
                <div class="inner-box-body">
                  <div id="wrap-add-group" class="row">

                    <div class="form-group">
                      <label for="namegroup" class="col-sm-2 control-label">Name group</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="namegroup" placeholder="Name Group">
                      </div>
                    </div> <!-- .form-group -->

                    <div class="form-group">
                      <label for="namegroup" class="col-sm-2 control-label">Member</label>
                      <div class="col-sm-10">

                        {!! Form::select('employees[]', $dataSelectEmployee, null, ['class'=>'form-control select2', 'multiple'=>'true']) !!}

                      </div>
                    </div> <!-- .form-group -->

                    <div class="action" id="area-action">

                      <button class="btn btn-danger pull-right btn-control" id="deletegroup">Delete</button>
                      <button class="btn btn-success pull-right btn-control" id="cancelgroup">Cancel</button>
                      <button class="btn btn-primary pull-right btn-control" id="btnActionGroup" data-action="create">Create</button>
                      
                    </div> <!-- #area-action -->

                  </div> <!-- #wrap-add-group -->

                  <div id="wrap-area-chat" class="row">

                    <div id="list-group-chat" class="col-md-2">
                      <ul id="ul-list-group">
                        <li>Group1</li>
                        <li>Group2</li>
                        <li>Group3</li>
                        <li>Group4</li>
                      </ul>
                    </div> <!-- #list-group-chat -->

                    <div id="area-chat" class="col-md-10">
                      <div class="box box-success">
                          <div class="box-header ui-sortable-handle" style="cursor: move;">
                            <i class="fa fa-comments-o"></i>

                            <h3 class="box-title">Chat</h3>

                            <div class="box-tools pull-right" data-toggle="tooltip" title="Status">
                              <div class="btn-group" data-toggle="btn-toggle">
                                <button type="button" class="btn btn-default btn-sm active"><i class="fa fa-square text-green"></i>
                                </button>
                                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-square text-red"></i></button>
                              </div>
                            </div>
                          </div>

                          
                          <div class="box-body chat" id="chat-box">
                            <!-- chat item -->
                            
                            <!-- /.item -->
                          </div>

                          <!-- /.chat -->
                          <div class="box-footer">
                            <div class="input-group">
                              <input class="form-control" placeholder="Type message..." name="inputmessage">

                              <div class="input-group-btn">
                                <button type="button" class="btn btn-success" id="send-message"><i class="fa fa-plus"></i></button>
                              </div>
                            </div>
                          </div> <!-- .box-footer -->
                        </div>
                    </div> <!-- #area-chat -->
                  </div> <!-- #wrap-area-chat -->
                </div> <!-- .inner-box-body -->
              </div><!-- /.box-body -->
            </div> <!-- .box .box-primary -->
          </div>  <!-- col-xs-12 -->
      </div> <!-- row -->
  </section>

</div>

<style type="text/css">

  #list-group-chat ul#ul-list-group {
    padding-left: 0px;
  }

  #list-group-chat ul#ul-list-group li{
    display : block;
    text-align: center;
    height: 40px;
    border: 1px solid rgba(122, 122, 122, 0.42);
    -webkit-box-shadow: inset 0px -1px 5px 0px rgba(0,0,0,0.75);
    -moz-box-shadow: inset 0px -1px 5px 0px rgba(0,0,0,0.75);
    box-shadow: inset 0px -1px 1px 0px rgba(0,0,0,0.75);
    border-top: 0px;
    vertical-align: middle;
  }

  #wrap-add-group {
    margin-bottom: 10px;
  }

  .action:after, .form-group:after {
    content: ".";
    visibility: hidden;
    display: block;
    clear: both;
    height: 0;
    font-size: 0;
  }

  #wrap-add-group .btn-control {
    width: 91px;
    margin-right: 15px;
  }


  #list-group-chat ul#ul-list-group li:first-child {
    border-top : 1px solid rgba(122, 122, 122, 0.42);
  }

</style>

<script src="https://www.gstatic.com/firebasejs/live/3.0/firebase.js"></script>
<script type="text/javascript" src="{{ Asset('handlebars-v3.0.3.js') }}"></script>
<script type="text/javascript" src="{{ Asset('jquery.slimscroll.min.js') }}"></script>
<script type="text/javascript" src="{{ Asset('momentjs/moment.js') }}"></script>

<script id="item-chat" type="text/x-handlebars-template">
  <div class="item">
    <img src="dist/img/user3-128x128.jpg" alt="user image" class="offline">

    <p class="message">
      <a href="#" class="name">
        <small class="text-muted pull-right timemessage"><i class="fa fa-clock-o"></i> @{{ timestamp }}</small>
        @{{ fullname }}
      </a>
      @{{ message }}
    </p>

  </div>
</script>

@include('groupchat.js-groupchat')
@stop
