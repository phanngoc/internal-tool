@extends('layouts.master')
@section ('head.title')
{{trans('messages.edit_group')}}
@stop

@section('body.content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            {{trans('messages.group_management')}}
            <small>{{trans('messages.edit_group')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('index')}}"><i class="fa fa-dashboard"></i> {{trans('messages.dashboard')}}</a></li>
            <li><a href="{{ route('groups.index') }}">{{trans('messages.group')}}</a></li>
            <li class="active">{{trans('messages.edit_group')}}</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <!-- general form elements disabled -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">{{trans('messages.edit_group')}}</h3>
                    </div><!-- /.box-header -->
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
                    <div class="box-body">
                        {!! Form::open( [
                        'route' => [ 'groups.update', $groups->id ],
                        'method' => 'PUT',
                        'class' => 'edit'
                        ])
                        !!}
                        <div class="form-group">
                            <label>{{trans('messages.name')}}:*</label>
                            {!! Form::text('groupname', $groups->groupname, [ 'id' => 'groupname', 'class' => 'form-control', 'autofocus']) !!}
                        </div>
                        <div class="form-group">
                            <label>{{trans('messages.description')}}:</label>
                            {!! Form::textarea('description',$groups->description,['id'=>'description', 'class'=>'form-control']) !!}
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-footer center">
                        <div class="form-group center">
                            <div class="col-sm-4 col-sm-offset-4 text-center">
                                <input class="btn-primary btn" id="btn-submit-group" type="submit" value="{{trans('messages.update')}}">
                                <input type='reset' name='reset' id='reset' class="btn btn-danger" value="{{trans('messages.reset')}}">
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div><!-- /.box -->
            </div><!--/.col (right) -->
        </div>   <!-- /.row -->
    </section>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#groupname').focus();
        });
    </script>
    <script>
        $(".edit").validate({
            rules: {
                groupname: {
                    required: true,
                    minlength: 3
                }
            },
            messages: {
                groupname: {
                    required: "{{trans('messages.fail_group_name')}}",
                    minlength: "{{trans('messages.fail_message',['number'=>'5'])}}"
                }
            }
        });
    </script>
</div>

@stop