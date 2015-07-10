@extends ('layouts.master')

@section ('head.title')
    Edit Candidate
@stop

@section ('body.content')
<script src="{{Asset('bootstrap/js/select2.min.js')}}" type="text/javascript"></script>
<link href="{{Asset('bootstrap/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Candidate Management
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> {{trans('messages.dashboard')}}</a></li>
            <li><a href="{{ route('users.index') }}">Human Resources</a></li>
            <li class="active">Edit Candidate</li>
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
                        <h3 class="box-title">Edit Candidate</h3>
                        <a class="btn btn-primary pull-right" href="{!!route('candidates.index') !!}">List Candidates</i></a>
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
                        'route'=>['candidates.update', $candidate->id],
                        'method'=>'PUT',
                        'enctype'=>'multipart/form-data',
                        'id'=>'edit'
                    ]) !!}
                    <div class="box-body">
                        <div class="form-group">
                            {!! HTML::decode(Form::label('firstname', 'First Name'.'<span id="label">*</span>')) !!}
                            {!! Form::text('firstname', $candidate->first_name,['id'=>'firstname','class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! HTML::decode(Form::label('lastname', 'Last Name'.'<span id="label">*</span>')) !!}
                            {!! Form::text('lastname', $candidate->last_name,['id'=>'lastname','class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label for="dateofbirth">Date of Birth<span id="label">*</span></label>
                            {!! Form::text('dateofbirth', $candidate->date_of_birth,['id'=>'dateofbirth','class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! HTML::decode(Form::label('phone', 'Phone'.'<span id="label">*</span>')) !!}
                            {!! Form::text('phone', $candidate->phone,['id'=>'phone','class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! HTML::decode(Form::label('email', 'Email'.'<span id="label">*</span>')) !!}
                            {!! Form::email('email', $candidate->email,['id'=>'email','class'=>'form-control']) !!}
                        </div>
                         <div class="form-group">
                            {!! HTML::decode(Form::label('position', 'Position'.'<span id="label">*</span>')) !!}
                            {!! Form::select('position[]', $positions,$candidate->positions->lists('id'), ['class'=>'js-example-basic-multiple form-control','multiple'=>true]) !!}
                        </div>
                        <div class="form-group">
                            <label for="datesubmit">Date Submit Record<span id="label">*</span></label>
                            {!! Form::text('datesubmit', $candidate->date_submit,['id'=>'datesubmit','class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! HTML::decode(Form::label('status_record_id', 'Status Record'.'<span id="label">*</span>')) !!}
                            {!! Form::select('status_record_id', $status_records,$candidate->status_record_id, ['class'=>'js-example-basic-multiple form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! HTML::decode(Form::label('comment', 'Comment')) !!}
                            {!! Form::text('comment', $candidate->comment,['id'=>'comment','class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('delete_files', 'Old Files') !!}
                            {!! Form::select('delete_files[]', $f2, $f1, ['class'=>'js-example-basic-multiple form-control','multiple'=>'true']) !!}
                        </div>
                        <div class="form-group">
                            <label for="file">Submit Files</label>
                            <input name="files[]" id="file" type="file" multiple="" />
                        </div>
                        <div class="box-footer center">
                            <div class="row">
                                <div class="col-sm-4 col-sm-offset-4 text-center">
                                    <input type="submit" class="btn btn-primary" value="Save"></input>
                                    <input type='reset' name='reset' id='reset' class="btn btn-primary" value="{{trans('messages.reset')}}">
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
        $(".js-example-basic-multiple").select2();
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $( "#dateofbirth" ).datepicker({format: 'dd/mm/yyyy'});
            $( "#datesubmit" ).datepicker({format: 'dd/mm/yyyy'});
            $.validator.addMethod("phone",function(value,element){
                return this.optional(element) || /(^\+[0-9]{2}|^\+[0-9]{2}\(0\)|^\(\+[0-9]{2}\)\(0\)|^00[0-9]{2}|^0)([0-9]{9}$|[0-9\-\s]{10}$)/.test(value);
            },"");
        });
    </script>

    <script type="text/javascript">
        $(".js-example-basic-multiple").select2({
           placeholder: "{{trans('messages.sl_groups')}}"
        });
    </script>

    <script>
        $("#edit").validate({
            rules: {
                firstname: {
                    required: true,
                    minlength: 2
                },
                lastname: {
                    required: true,
                    minlength: 2
                },
                dateofbirth: {
                    required: true
                },
                phone: {
                    required: true,
                    phone: true
                },
                email: {
                    required: true
                },
                datesubmit: {
                    required: true
                }
            },
            messages: {
                firstname: {
                    required: "You can't leave this empty",
                    minlength: "Please enter more than 2 characters"
                },
                lastname: {
                    required: "You can't leave this empty",
                    minlength: "Please enter more than 2 characters"
                },
                dateofbirth: {
                    required: "You can't leave this empty"
                },
                phone: {
                    required: "You can't leave this empty",
                    phone: "Please enter a valid value"
                },
                email: {
                    required: "You can't leave this empty"
                },
                datesubmit: {
                    required: "You can't leave this empty",
                }
            }
        });
    </script>
</div>
@stop