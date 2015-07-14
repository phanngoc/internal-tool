@extends ('layouts.master')

@section ('head.title')
    Add Candidate
@stop

@section ('body.content')
<link href="{{Asset('bootstrap/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
<script src="{{Asset('bootstrap/js/select2.min.js')}}" type="text/javascript"></script>
<script src="{{ Asset('bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>
<link rel="stylesheet" href="{{ Asset('bootstrap-datepicker/bootstrap-datepicker.css') }}" type="text/css" />

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Candidate Management
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> {{trans('messages.dashboard')}}</a></li>
            <li><a href="{{ route('users.index') }}">Human Resources</a></li>
            <li class="active">Add Candidate</li>
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
                        <h3 class="box-title">Add Candidate</h3>
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
                    'route'=>['candidates.store'],
                    'method'=>'POST',
                    'id'=>'add',
                    'enctype'=>'multipart/form-data'
                    ]) !!}
                    <div class="box-body">
                        <div class="form-group">
                            {!! HTML::decode(Form::label('firstname', 'First Name'.'<span id="label">*</span>')) !!}
                            {!! Form::text('firstname',null,['id'=>'firstname','class'=>'form-control','placeholder'=>'First Name']) !!}
                        </div>
                        <div class="form-group">
                            {!! HTML::decode(Form::label('lastname', 'Last Name'.'<span id="label">*</span>')) !!}
                            {!! Form::text('lastname',null,['id'=>'lastname','class'=>'form-control','placeholder'=>'Last Name']) !!}
                        </div>
                        <div class="form-group">
                            <label for="dateofbirth">Date of Birth<span id="label">*</span></label>
                            {!! Form::text('dateofbirth',null,['id'=>'dateofbirth','class'=>'form-control','placeholder'=>'Date of Birth']) !!}
                        </div>
                        <div class="form-group">
                            {!! HTML::decode(Form::label('phone', 'Phone'.'<span id="label">*</span>')) !!}
                            {!! Form::text('phone',null,['id'=>'phone','class'=>'form-control','placeholder'=>'Phone']) !!}
                        </div>
                        <div class="form-group">
                            {!! HTML::decode(Form::label('email', 'Email'.'<span id="label">*</span>')) !!}
                            {!! Form::email('email',null,['id'=>'email','class'=>'form-control','placeholder'=>'Email']) !!}
                        </div>
                        <div class="form-group">
                            {!! HTML::decode(Form::label('position', 'Position'.'<span id="label">*</span>')) !!}
                            {!! Form::select('position[]', $positions,null, ['class'=>'js-example-basic-multiple form-control','multiple'=>true]) !!}
                        </div>
                        <div class="form-group">
                            <label for="datesubmit">Date for receipt<span id="label">*</span></label>
                            {!! Form::text('datesubmit',null,['id'=>'datesubmit','class'=>'form-control','placeholder'=>'Date for receipt']) !!}
                        </div>

                        <div class="form-group">
                            {!! HTML::decode(Form::label('comment', 'Comment')) !!}
                            {!! Form::text('comment', null,['id'=>'comment','class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label for="file">Files</label>
                            <div id="area-show-file">
                                   <div class="wrap-item">
                                     <label for="titlefile0">Title File:</label>
                                     <input name = "titlefile0"/>
                                     <label for="namefile" style="float:left">File:</label>
                                     <div class = "namefile" style="float:left"></div>
                                     <div class = "buttondelete"></div>
                                     <label for = "file-upload" class="custom-file-upload">
                                        <i class = "fa fa-cloud-upload"></i>
                                     </label>
                                     <input name="files0" data-id="0" id="file" type="file" class="choosefile" />   
                                   </div>
                            </div>   
                            <div style="clear:both"></div>
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
    <script id="wrap-item" type="text/x-handlebars-template">
       <div class="wrap-item">
        <label for="titlefile@{{id}}">Title File:</label>
        <input name = "titlefile@{{id}}"/>
        <label for="namefile" style="float:left">File:</label>
        <div class="namefile" style="float:left"></div>
        <div class="buttondelete"></div>
         <label for="file-upload" class="custom-file-upload">
            <i class="fa fa-cloud-upload"></i>
         </label>
        <input name="files@{{id}}" data-id="@{{id}}" id="file" type="file" class="choosefile" />   
       </div>
    </script>
    <script type="text/javascript" src="{{ Asset('handlebars-v3.0.3.js') }}"></script>
    <style type="text/css">
        #area-show-file{
            display: block;
        }
        .wrap-item{
            display: block;
            float : left;
            width: 220px;
            height: auto;
            word-wrap: break-word;
            border : 1px solid #ECF0F5;
            border-radius: 5px;
        }
        .delete{
            cursor: pointer;
        }
        input[type="file"] {
            display: none;
        }
        .custom-file-upload{
            border: 1px solid #ccc;
            display: inline-block;
            padding: 6px 12px;
            cursor: pointer;
        }
    </style>
    <script type="text/javascript">
      $(function() {

         $('#area-show-file').on('click','.delete',function(){
            $(this).parent().parent().remove();
         });

         $('#area-show-file').on('click','.custom-file-upload',function(){
            $(this).next().click();
         });

         $('#area-show-file').on('change','.choosefile',function(){
            console.log($(this).parent());
            //$(this).parent().find('.namefile').after('<a class="delete text-red"><i class="fa fa-fw fa-ban"></i></a>');
            $(this).parent().find('.buttondelete').html('<a class="delete text-red"><i class="fa fa-fw fa-ban"></i></a>');
            // an button upload di
            $(this).prev().css({'display' : 'none'});
            var count = parseInt($(this).data('id')) + 1;
            var namefile = $(this).val();
            var pathArray = namefile.split( '\\' );
            $(this).parent().find('.namefile').html(pathArray[pathArray.length-1]);
            var context = {id: count};

            var source   = $("#wrap-item").html();
            var template = Handlebars.compile(source);
            var html    = template(context);
            $('#area-show-file').append(html);
         })
      });
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
        // $("#add").validate({
        //     rules: {
        //         firstname: {
        //             required: true,
        //             minlength: 2
        //         },
        //         lastname: {
        //             required: true,
        //             minlength: 2
        //         },
        //         dateofbirth: {
        //             required: true
        //         },
        //         phone: {
        //             required: true,
        //             phone: true
        //         },
        //         email: {
        //             required: true
        //         },
        //         datesubmit: {
        //             required: true
        //         }
        //     },
        //     messages: {
        //         firstname: {
        //             required: "You can't leave this empty",
        //             minlength: "Please enter more than 2 characters"
        //         },
        //         lastname: {
        //             required: "You can't leave this empty",
        //             minlength: "Please enter more than 2 characters"
        //         },
        //         dateofbirth: {
        //             required: "You can't leave this empty"
        //         },
        //         phone: {
        //             required: "You can't leave this empty",
        //             phone: "Please enter a valid value"
        //         },
        //         email: {
        //             required: "You can't leave this empty"
        //         },
        //         datesubmit: {
        //             required: "You can't leave this empty",
        //         }
        //     }
        // });
    </script>
</div>
@stop