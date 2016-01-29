@extends ('layouts.master')

@section ('head.title')
    Edit Candidate
@stop

@section ('body.content')
<script src="{{Asset('bootstrap/js/select2.min.js')}}" type="text/javascript"></script>
<link href="{{Asset('bootstrap/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
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
                            <label for="datesubmit">Date for receipt<span id="label">*</span></label>
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
                            <label for="file">Files</label>
                            <div id="area-show-file">
                                  <?php                                     
                                    foreach ($f2 as $k_f => $v_f) {
                                      ?>
                                      <div class="wrap-item">
                                        <label for="titlefile<?php echo $v_f->id;?>">Title File:</label>
                                        <input name = "titlefile<?php echo $v_f->id;?>" value="<?php echo $v_f->title;?>"/>
                                        <label for="namefile" style="float:left">File:</label>
                                        <div class = "namefile" style="float:left"><?php echo $v_f->name; ?></div>

                                         <div class="buttondelete" style="float:left">
                                             <a class="delete text-red">
                                                <i class="fa fa-fw fa-ban"></i>
                                             </a>
                                             <a class="text-blue download" title="Download">
                                                <i class="fa fa-download"></i>
                                             </a>
                                         </div>
                                         <input name="files[]" value="<?php echo $v_f->id;?>" type="text" class="choosefile" />
                                       </div>
                                      <?php
                                    }
                                  ?>
                                     <div class="wrap-item">
                                         <label for="title_news0">Title File:</label>
                                         <input name = "title_news0"/>
                                         <label for="namefile" style="float:left">File:</label>
                                         <div class="namefile" style="float:left"></div>
                                         <div class="buttondelete"></div>
                                         <label for="file-upload" class="custom-file-upload">
                                            <i class="fa fa-cloud-upload"></i>
                                         </label>
                                         <input name="files_new0" data-id="0" type="file" class="choosefile" />
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
        <label for="title_news@{{id}}">Title File:</label>
        <input name = "title_news@{{id}}"/>
        <label for="namefile" style="float:left">File:</label>
        <div class="namefile" style="float:left"></div>
        <div class="buttondelete"></div>
         <label for="file-upload" class="custom-file-upload">
            <i class="fa fa-cloud-upload"></i>
         </label>
        <input name="files_new@{{id}}" data-id="@{{id}}" type="file" class="choosefile" />
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
            padding : 4px;
            margin-left: 15px;
        }
        .delete{
            cursor: pointer;
        }
        .choosefile {
            display: none !important;
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
         $('#area-show-file').on('click','.download',function(){
            var url = '/download/{{$candidate->id}}/'+$(this).parent().prev().html();
            window.open(url);
         });
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
           placeholder: "Select files"
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
                    required: "{{trans('messages.fail_empty')}}",
                    minlength: "Please enter more than 2 characters"
                },
                lastname: {
                    required: "{{trans('messages.fail_empty')}}",
                    minlength: "Please enter more than 2 characters"
                },
                dateofbirth: {
                    required: "{{trans('messages.fail_empty')}}",
                },
                phone: {
                    required: "{{trans('messages.fail_empty')}}",
                    phone: "Please enter a valid value"
                },
                email: {
                    required: "{{trans('messages.fail_empty')}}",
                },
                datesubmit: {
                    required: "{{trans('messages.fail_empty')}}",
                }
            }
        });
    </script>
</div>
@stop
