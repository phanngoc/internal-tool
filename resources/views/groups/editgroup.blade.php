@extends('layouts.master')
@section ('head.title')
{{trans('messages.edit_group')}}
@stop

@section ('head.css')
    <style type="text/css">
        textarea{
            resize: none;
        }
    </style>
@stop

@section('body.content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            {{trans('messages.group_management')}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('index')}}"><i class="fa fa-dashboard"></i> {{trans('messages.dashboard')}}</a></li>
            <li><a href="{{ route('groups.index') }}">{{trans('messages.group')}}</a></li>
            <li class="active">{{trans('messages.edit_group')}}</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements disabled -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">{{trans('messages.edit_group')}}</h3>
                        <a class="btn btn-primary pull-right" href="{!!route('groups.index') !!}">{{trans('messages.list_group')}}</i></a>
                    </div>
                    <div class="box-body">
                        {!! Form::open( [
                        'route' => [ 'groups.update', $groups->id ],
                        'method' => 'PUT',
                        'class' => 'edit'
                        ])
                        !!}
                        <div class="col-md-8 col-md-offset-2">
                            <div class="form-group">
                                <label>Group Name<span class="text-red">*</span></label>
                                {!! Form::text('groupname', $groups->groupname, [ 'id' => 'groupname', 'class' => 'form-control', 'autofocus']) !!}
                                @if($errors->has('groupname'))<label for="groupname" class="error">{{$errors->first("groupname")}}</label>@endif
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                {!! Form::textarea('description',$groups->description,['id'=>'description', 'class'=>'form-control', 'rows'=>'4']) !!}
                            </div>
                            <div class="box-footer center">
                                <div class="form-group center">
                                    <div class="text-center">
                                        <input class="btn-primary btn" id="btn-submit-group" type="submit" value="Save">
                                        <input type='reset' name='reset' id='reset' class="btn btn-primary" value="{{trans('messages.reset')}}">
                                    </div>
                                </div>
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
                    required: "{{trans('messages.fail_empty')}}",
                    minlength: "{{trans('messages.fail_message',['number'=>'5'])}}"
                }
            }
        });
    </script>
</div>

@stop