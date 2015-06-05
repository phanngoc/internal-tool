@extends ('layouts.master')

@section ('head.title')
{{trans('messages.add_user')}}
@stop

@section ('body.content')
<link href="{{Asset('bootstrap/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
<script src="{{Asset('bootstrap/js/select2.min.js')}}" type="text/javascript"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{trans('messages.user_management')}}
            <small>{{trans('messages.add_user')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> {{trans('messages.dashboard')}}</a></li>
            <li><a href="{{ route('users.index') }}">{{trans('messages.user')}}</a></li>
            <li class="active">{{trans('messages.add_user')}}</li>
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
                        <h3 class="box-title">{{trans('messages.add_user')}}</h3>
                        <a class="btn btn-warning pull-right" href="{!!route('users.index') !!}">{{trans('messages.list_user')}}</i></a>
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
                    {!! Form::open([
                        'route'=>['users.store'],
                        'method'=>'POST',
                        'id'=>'add'
                      ]) !!}
                    <div class="box-body">
                        <div class="form-group">
                            {!! Form::label('fullname', trans('messages.lb_fullname')) !!}
                            {!! Form::text('fullname',null,['id'=>'fullname','class'=>'form-control','placeholder'=>trans('messages.e_fullname'),'autofocus']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('username', trans('messages.lb_username')) !!}
                            {!! Form::text('username',null,['id'=>'username','class'=>'form-control','placeholder'=>trans('messages.e_username')]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('password', trans('messages.lb_password')) !!}
                            {!! Form::password('password',['id'=>'password','class'=>'form-control','placeholder'=>trans('messages.e_password')]) !!}
                        </div>
                        <div class="form-group">
                           {!! Form::label('password_confirm', trans('messages.lb_password_confirmation')) !!}
                            {!! Form::password('password_confirm',['id'=>'password_confirm','class'=>'form-control','placeholder'=>trans('messages.e_password_confirmation')]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('email', trans('messages.lb_email')) !!}
                        {!! Form::email('email',null,['id'=>'email','class'=>'form-control','placeholder'=>trans('messages.e_email')]) !!}
                        </div>
                        <div class="form-group">
                            <ul class='select2-selection__rendered'><li class='select2-selection__choice' title='Account'><span role='presentation' class='select2-selection__choice__remove'>×</span>Account</li><li class='select2-search select2-search--inline'><input type='search' role='textbox' spellcheck='false' autocapitalize='off' autocorrect='off' autocomplete='off' tabindex='-1' class='select2-search__field' placeholder='' style='width: 0.75em;'></li></ul>
                            {!! Form::label('group_id', trans('messages.lb_groups')) !!}
                            {!! Form::select('group_id[]',$groups,null, ['class'=>'js-example-basic-multiple form-control','multiple'=>'true','required'=>'true']) !!}
                        </div>
                        <div class="box-footer center">
                            <div class="row">
                                <div class="col-sm-4 col-sm-offset-4 text-center">
                                    <input type="submit" class="btn btn-primary" value="Save" id='add'></input>
                                    <!-- <a href="{!! route('users.index') !!}" class="btn btn-danger">Cancel</a> -->
                                    <input type='reset' name='reset' id='reset' class="btn btn-danger" value="{{trans('messages.reset')}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
  $(".js-example-basic-multiple").select2({
    placeholder: "{{trans('messages.sl_groups')}}"
  });
</script>
     <script type="text/javascript">

</script>

     <script>
        $("#add").validate({
            rules: {
                fullname: {
                    required: true,
                    minlength: 5
                },
                username: {
                    required: true,
                    minlength: 3
                },
                password: {
                    required: true,
                    minlength: 6
                },
                password_confirm: {
                    required: true,
                    equalTo: "#password"
                },
                email: {
                    required: true,
                    email: true
                },
                group_id:{
                    required: true,
                }
            },
            messages: {
                fullname: {
                    required: "{{trans('messages.fail_fullname')}}",
                    minlength: "{{trans('messages.fail_message',['number'=>'5'])}}"
                },
                username: {
                    required: "{{trans('messages.fail_user')}}",
                    minlength: "{{trans('messages.fail_message',['number'=>'5'])}}"
                },
                password: {
                    required: "{{trans('messages.fail_password')}}",
                    minlength: "{{trans('messages.fail_message',['number'=>'6'])}}"
                },
                password_confirm: {
                    required: "{{trans('messages.fail_password')}}",
                    equalTo: "{{trans('messages.message_password')}}"
                },
                email: {
                    required: "{{trans('messages.fail_email')}}",
                    email: "{{trans('messages.message_email')}}"
                },
                group_id: {
                    required: "{{trans('messages.fail_group')}}",
                }
            }
        });
    </script>
</div>
@stop



