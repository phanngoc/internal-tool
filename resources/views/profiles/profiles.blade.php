@extends ('layouts.master')

@section ('head.title')
  {{trans('messages.list_group')}}
@stop

@section ('head.css')
  <link href="{{ Asset('plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="{{ Asset('jquery-accessible-tabs/jquery.accTabs.min.js') }}" ></script>
  <link rel="stylesheet" type="text/css" href="{{ Asset('jquery-accessible-tabs/jquery-accessible-tabs.css') }}">

  <script type="text/javascript" src="{{ Asset('jquery-ui/jquery-ui.js') }}" ></script>
  <link rel="stylesheet" type="text/css" href="{{ Asset('jquery-ui/jquery-ui.css') }}">

  <script src="{{ Asset('jquerycrop/js/jquery.Jcrop.min.js') }}"></script>
  <link rel="stylesheet" href="{{ Asset('jquerycrop/css/jquery.Jcrop.css') }}" type="text/css" />

  <script src="{{ Asset('bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>
  <link rel="stylesheet" href="{{ Asset('bootstrap-datepicker/bootstrap-datepicker.css') }}" type="text/css" />
  <style type="text/css">
      textarea {
          resize: none;
      }
  </style>

  <script type="text/javascript">
    $(function(){
    
        if(<?php echo $flagMessage; ?>)
        {
                  $div1=$('.error-message');
                  $div2=$('<div class="hidden alert alert-dismissible user-message text-center" style="margin-top: 30px" role="alert">');
                  $div2.append('<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>');
                  $div2.append("<span>Save Successfully</span>").addClass("alert-success").removeClass('hidden');
                  $div2.css("margin-bottom","0px");
                  console.log($div2);
                  $div1.append($div2);

                  $(".alert").delay(3000).hide(1000);
                  setTimeout(function() {
                      $('.alert').remove();
                  }, 5000); 
        }
        
      /*My Script Validate*/
      $.validator.setDefaults({
            errorPlacement: function (error, element) {
            if (element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else if (element.hasClass('select2')) {
                error.insertAfter(element.next('span'));
            } else {
                error.insertAfter(element);
            }
          }
        }),

      $.validator.addMethod("phone",function(value,element){
          return this.optional(element) || /(^\+[0-9]{2}|^\+[0-9]{2}\(0\)|^\(\+[0-9]{2}\)\(0\)|^00[0-9]{2}|^0)([0-9]{9}$|[0-9\-\s]{10}$)/.test(value);
      },"");

      $.validator.addMethod("number",function(value,element){
          return this.optional(element) || /^[0-9]*$/.test(value);
      },"");

      function constructJson(jsonKey, jsonValue){
         var jsonObj = {};
         jsonObj[jsonKey] = jsonValue;
         return jsonObj;
      }
      var res = {
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
            email: {
              required: true
            },
            address: {
              required: true
            },
            phone: {
              phone: true
            },
            employee_code: {
              required: true
            },
            /*'company[]': {
              required: true
            },
            'position[]': {
              required: true
            },
            'projectname[]': {
              required: true
            },
            'role[]': {
              required: true
            },
            'skillset[]': {
              required: true
            },
            'numberpeople[]': {
              number: true
            }*/
          };


      $("#formprofile").validate({
          ignore: [],
          rules: res,
          messages: {
            firstname: {
              required: "Please enter your first name",
              minlength: "Please enter more than 2 characters"
            },
            lastname: {
              required: "Please enter your last name",
              minlength: "Please enter more than 2 characters"
            },
            dateofbirth: {
              required: "Please enter your birthday"
            },
            email: {
              required: "Please enter your email"
            },
            address: {
              required: "Please enter your address"
            },
            employee_code: {
              required: "Please enter your employee code"
            },
            phone: {
              phone: "Please enter a valid value"
            },
            /*'company[]': {
              required: "Please enter company name"
            },
            'position[]': {
              required: "Please enter position name"
            },
            'projectname[]': {
              required: "Please enter project name"
            },
            'role[]': {
              required: "Please enter role"
            },
            'skillset[]':{
              required: "Please enter skill set ultilized"
            },
            'numberpeople[]': {
              number: "Please enter a valid number people"
            }*/
          }
      });

      function existShowError($obj)
      {
        console.log($obj.parent().find('.error').length);
        if($obj.parent().find('.error').length != 0)
        {
          return true;
        }
        return false;
      }

      $("#formprofile").submit(function( event ) {

            $('#tab_3 .edu_yearstart,#tab_3 .edu_yearend').each(function(key,value){
                if($(value).val() != '' && $(value).val().length != 4)
                {
                  $(value).parent().append('<label class="error">This field must 4 digit.</label>');
                  event.preventDefault();
                  return;
                }
                 
                if($(value).hasClass('edu_yearend'))
                {
                  var year_start = $(value).parent().prev().find('.edu_yearstart').val();
                  if(parseInt($(value).val()) < parseInt(year_start) )
                  {
                      $(value).parent().append('<label class="error">Year End must greater than Year Start.</label>');
                  }
                  event.preventDefault();
                  return;
                }
            });
      });

      $("#formprofile").on('change keyup','input',function( event ) {
            $('.edu_yearstart,.edu_yearend,.edu_education').each(function(key,value){
                $(value).parent().find('.error').remove();
            });
      });

      $('#tab_edu').on('change keyup','.calendar',function() {
        var sanitized = $(this).val().replace(/[^0-9]/g, '');
        $(this).val(sanitized);
      });

      /*CROP IMAGE NGOC VERSION*/
      var jcrop_api = null;
      $( ".startdate" ).datepicker({
       format: 'dd/mm/yyyy'
      });

      $( ".enddate" ).datepicker({
        format: 'dd/mm/yyyy'
      });

      // $( "#dateofbirth" ).datepicker({dateFormat: "dd/mm/yy"});
      $("#dateofbirth").datepicker({format: 'dd/mm/yyyy'});
      // $('#tab_edu').on('datepicker','.calendar',function(){

      // });

      $( ".calendar" ).datepicker({format: 'yyyy', viewMode: "years",minViewMode :"years",autoclose : true ,focusOnShow : false, disableEntry: true});


      // $( "#dialog-resize" ).dialog({
      //      width : 1100,
      //      height : 550,
      //      close: function( event, ui ) {
      //       if(jcrop_api != null)
      //       {
      //         jcrop_api.destroy();
      //         $('#imagecrop').removeAttr( "style" );
      //       }
      //      },
      // });
      $('#myModal').on('hidden.bs.modal', function () {
          if(jcrop_api != null)
            {
              jcrop_api.destroy();
              $('#imagecrop').removeAttr( "style" );
            }
      });
      //$( "#dialog-resize" ).dialog('close');
      $('input,select,textarea').prop("disabled", true);
      $('.action').hide();
      $('.addCompany, .removeCompany').hide();
      $('.addProject, .removeProject').hide();
      $('.delete_edu, .add_edu').hide();
      $('#inputlinkavatar').hide();
      $('.edit').click(function(e){
          $(this).prop("disabled", true);
          $('.addCompany, .removeCompany').show();
          $('.addProject, .removeProject').show();
          $('#inputlinkavatar').show();
          $('.delete_edu, .add_edu').show();
          $('input').prop("disabled", false);
          $('select').prop("disabled", false);
          $('textarea,a,i').prop("disabled", false);
          $('.action').show();
          e.preventDefault();

          addSkill();
          return false;
      });

      $('#avatar').on('change',function(e){
           var type_file = this.files[0].type;
           if(type_file.substr(0, 5) == 'image')
           {
             $('#dialog-resize').css({'display':'block','z-index':'9999'});
             $('.ui-front').css({'z-index':'9999'});
             //$( "#dialog-resize" ).dialog('open');
             $('#myModal').modal('show');
             readURL(this); 
           }
           else
           {
              alert("Please choose image");
           }
      });
      var x,y,width,height;


      function readURL(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();
              reader.onload = function (e) {
                  console.log('da onload lai:'+ e.target.result);
                  $('#imagecrop').attr('src', e.target.result);

                  $('#imagecrop').Jcrop({
                    onSelect:    showCoords,
                    bgColor:     'black',
                    bgOpacity:   .4,
                    setSelect:   [ 100, 100, 50, 50 ],
                    maxSize : [300,300],

                  },function(){
                    jcrop_api = this;
                  });

                  $('.btncropok').click(function(){
                        $('#myModal').modal('hide');
                        // $("#dialog-resize").dialog('close');
                        jcrop_api.destroy();
                        $('#imagecrop').removeAttr( "style" );
                        $('.canvas').append('<canvas id="myCanvas" width="'+width+'" height="'+height+'" style="display:none;"></canvas>');
                        var canvas = document.getElementById('myCanvas');
                        var context = canvas.getContext('2d');
                        var imageObj = new Image();

                        imageObj.onload = function() {
                          // draw cropped image
                          var sourceX = x;
                          var sourceY = y;
                          var sourceWidth = width;
                          var sourceHeight = height;
                          var destWidth = width;
                          var destHeight = height;
                          var destX = 0;
                          var destY = 0;

                          context.drawImage(imageObj, sourceX, sourceY, sourceWidth, sourceHeight, destX, destY, destWidth, destHeight);
                        };
                        imageObj.src = e.target.result;

                        setTimeout(function(){
                          var dataURL = canvas.toDataURL("image/png");
                          $('input[name="imageup"]').val(dataURL);
                          // $('form').append('<input type="hidden" name="imageup" value="'+dataURL+'"/>');
                          document.getElementById('avatarimg').src = dataURL;
                          $('#myCanvas').remove();
                        },50);

                  });
                  $('.btncropcancel').click(function(){
                     // $("#dialog-resize").dialog('close');
                     $('#myModal').modal('hide');
                     jcrop_api.destroy();
                     $('#imagecrop').removeAttr( "style" );
                  });
              }
              //console.log(input.files[0]);
              reader.readAsDataURL(input.files[0]);
          }
      }

      function showCoords(c)
      {
          // variables can be accessed here as
          // c.x, c.y, c.x2, c.y2, c.w, c.h
          x = c.x;
          y = c.y;
          width = c.w;
          height = c.h;
          console.log(c.x+"|"+c.y+"|"+c.x2+"|"+c.y2+"|"+c.w+"|"+c.h);
      };

      $('.cancel').click(function(){
          $('input,select,textarea,i').prop("disabled", true);
          $('.addCompany, .removeCompany').hide();
          $('.addProject, .removeProject').hide();
          $('#inputlinkavatar').hide();
          $('.delete_edu, .add_edu').hide();
          $('.action').hide();
          $('.add-skill').parents('tr').remove();
          $('.edit').prop("disabled", false);
      });


        /*ADD COMPANY*/
        $(document).on('click', '.addCompany', function(){
          $('#addcompany').append('<div id="area-add-company" class="box box-info"> <div class="box-header"> <div class="box-tools pull-right"> <button class="btn btn-danger removeCompany" title="Remove company" style="width:25px; height:30px; padding:5px 2px;"><i class="fa fa-remove"></i></button> </div> </div> <div class="box-body"> <div class="col-md-6"> <div class="form-group"> <label for="company">Company Name</label> <input type="text" name="company[]" class="form-control company" id="company"> </div> <div class="form-group"> <label for="position">Position</label> <input type="text" name="position[]" class="form-control" id="position"> </div> <div class="row"> <div class="col-md-6"> <div class="form-group"> <label for="startdate">Start Date</label> <input type="text" name="startdate[]" class="form-control startdate" id="startdate"> </div> </div> <div class="col-md-6"> <div class="form-group"> <label for="enddate">End Date</label> <input type="text" name="enddate[]" class="form-control enddate" id="enddate"> </div> </div> </div> </div> <div class="col-md-6"> <div class="form-group"> <label for="mainduties">Main Duties</label> <TEXTAREA name="mainduties[]" id="mainduties" rows="7" class="form-control"></TEXTAREA> </div> </div> </div> </div>');
          $( ".startdate" ).datepicker({
           format: 'dd/mm/yyyy'
          });

          $( ".enddate" ).datepicker({
            format: 'dd/mm/yyyy'
          });

          $("html, body").animate({ scrollTop: $(document).height() }, 1200);
          return false;
        });

        $(document).on('click', '.removeCompany', function(){
          $(this).parent().parent().parent().remove();
          return false;
        });

        /*ADD PROJECT*/
        $(document).on('click', '.addProject', function(){
          $('#addproject').append('<div id="area-add-project" class="box box-info"> <div class="box-header"> <div class="box-tools pull-right"> <button class="btn btn-danger removeProject" title="Remove project" style="width:25px; height:30px; padding:5px 2px;"><i class="fa fa-remove"></i></button> </div> </div> <div class="box-body"> <div class="col-md-6"> <div class="form-group"> <label for="projectname">Project Name</label> <input type="text" name="projectname[]" class="form-control" id="projectname"> </div> <div class="form-group"> <label for="customername">Customer Name</label> <input type="text" name="customername[]" class="form-control" id="customername"> </div> <div class="row"> <div class="col-md-6"> <div class="form-group"> <label for="role">Role</label> <input type="text" name="role[]" class="form-control" id="role"> </div> </div> <div class="col-md-6"> <div class="form-group"> <label for="numberpeople">Number People</label> <input type="text" name="numberpeople[]" class="form-control" id="numberpeople"> </div> </div> </div> <div class="form-group"> <label for="projectperiod">Project Period</label> <input type="text" name="projectperiod[]" class="form-control" id="projectperiod"> </div> <div class="form-group"> <label for="skillset">Skill Set</label> <input type="text" name="skillset[]" class="form-control" id="skillset"> </div> </div> <div class="col-md-6"> <div class="form-group"> <label for="projectdescription">Project Description</label> <TEXTAREA name="projectdescription[]" id="projectdescription" rows="15" class="form-control"></TEXTAREA> </div> </div> </div> </div>');
          $("html, body").animate({ scrollTop: $(document).height() }, 1200);
          return false;
        });

        $(document).on('click', '.removeProject', function(){
          $(this).parent().parent().parent().remove();
          return false;
        })

      });
  </script>
@stop
@section('body.content')

<div class="content-wrapper">
<section class="content-header">
  <h1>
    {{trans('messages.employee_manager')}}
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> {{trans('messages.dashboard')}}</a></li>
    <li><a href="{{ route('employee.index') }}">{{trans('messages.employee')}}</a></li>
    <li class="active">{{trans('messages.profile')}}</li>
  </ol>
</section>
<div class="canvas">

</div>

  <!-- NGOC - DIALOG RESIZE ANH -->
<!--   <div id="dialog-resize" style="display:none">
    <div class="inner">
      <div class="img row">
         <div class="col-md-10 wrapimage">
           <img src="" id="imagecrop"/>
         </div>
         <div class="col-md-2">
           <button class="btn btn-primary btncropok">Ok</button>
           <button class="btn btn-primary btncropcancel">Cancel</button>
         </div>
      </div>
    </div>
  </div> -->

 <!-- Modal -->
  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Crop Avatar</h4>
        </div>

        <div class="modal-body">
         <div class="inner">
            <div class="img row">
               <div class="col-md-12 wrapimage">
                 <img src="" id="imagecrop"/>
               </div>
            </div>
          </div><!-- .inner -->
        </div>

        <div class="modal-footer">
          <div class="img row">
               <div class="col-md-9">

               </div>
               <div class="col-md-3">
                 <button class="btn btn-primary btncropok" style="margin-right:-4px;">Save</button>
                 <button class="btn btn-primary btncropcancel">Cancel</button>
               </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <!-- end Modal -->
<section class="content">
      <div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">{{trans('messages.profile')}}</h3>
                </div>
                <div class="box-body">
                  <form action="{{ route('profiles.store') }}" method="POST" id="formprofile">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="imageup"/>
                    <div class="header-tabs row">
                      <div class="col-md-8"></div>
                      <div class="col-md-4" style="margin-bottom: 12px;padding-left: 168px">


                        <a href="{{ route('print.show',$employee->id) }}" class='btn btn-primary export' style="margin-right:2px;" >Export</a>

                        <a href="{{ route('printpreview.show',$employee->id) }}" class='btn btn-primary print' style="margin-right:1px;" >Print</a>
                        <button class='btn btn-primary edit'>Edit</button>

                      </div>
                    </div>

<!-- Thay giao dien -->
          <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">{{ trans('messages.personal_information') }}</a></li>
                  <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">{{ trans('messages.skills') }}</a></li>
                  <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">{{ trans('messages.educations') }}</a></li>
                  <li class=""><a href="#tab_4" data-toggle="tab" aria-expanded="false">Working Experiences</a></li>
                  <li class=""><a href="#tab_5" data-toggle="tab" aria-expanded="false">Taken Project</a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                   <div class="box box-info">
                    <div class="inner row">
                           <div class="col-md-6">
                              <div class="form-group" style="margin-top:10px;">
                                  <label for="employee_code">{{trans('messages.employee_code')}}<span class="text-red">*</span></label>
                                  <input type="text" name="employee_code" class="form-control" id="employee_code" value="{{ $employee->employee_code }}">
                              </div>
                              <div class="form-group">
                                  <label for="firstname">{{trans('messages.firstname')}}<span class="text-red">*</span></label>
                                  <input type="text" name="firstname" class="form-control" id="firstname" value="{{ $employee->firstname }}">
                              </div>
                              <div class="form-group">
                                  <label for="lastname">{{trans('messages.lastname')}}<span class="text-red">*</span></label>
                                  <input type="text" name="lastname" class="form-control" id="lastname" value="{{ $employee->lastname }}">
                              </div>

                              <div class="form-group">
                                <label for="gender">{{trans('messages.gender')}}<span class="text-red">*</span></label>
                                <select class="form-control" name="gender" id="gender">
                                  
                                  <option value="0" <?php if($employee->gender == 0) { echo 'selected';} ?> >{{trans('messages.male')}}</option>                                      
                                  
                                  <option value="1" <?php if($employee->gender == 1) { echo 'selected';} ?> >{{trans('messages.female')}}</option>
                                </select>
                              </div>

                              <div class="form-group">
                                <label for="dateofbirth">{{trans('messages.date_of_birth')}}<span class="text-red">*</span></label>
                                <input class="form-control" name="dateofbirth" id="dateofbirth" value="{{ $employee->date_of_birth }}"/>
                              </div>

                              <div class="form-group">
                                  <label for="nationality">{{trans('messages.nationality')}}<span class="text-red">*</span></label>
                                  <select name="nationality" class="form-control">
                                    @foreach($nationalities as $value)
                                      @if ($value->id == $employee->nationality)
                                        <option value="{{$value->id}}" selected>{{$value->name}}</option>
                                        @else
                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                      @endif
                                    @endforeach
                                  </select>
                              </div>

                              <div class="form-group">
                                  <label for="email">{{trans('messages.email')}}<span class="text-red">*</span></label>
                                  <input type="email" name="email" class="form-control" id="email" value="{{ $employee->email }}">
                              </div>

                              <div class="form-group">
                                  <label for="phone">{{trans('messages.phone')}}<span class="text-red">*</span></label>
                                  <input type="text" name="phone" class="form-control" id="phone" value="{{ $employee->phone }}">
                              </div>

                              <div class="form-group">
                                  <label for="position">Position<span class="text-red">*</span></label>
                                  <select name="position" class="form-control">
                                  @foreach($positions as $value)
                                      @if ($value->id == $employee->position_id)
                                        <option value="{{$value->id}}" selected>{{$value->name}}</option>
                                        @else
                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                      @endif
                                  @endforeach
                                  </select>
                              </div>

                           </div>
                           <div class="col-md-6">
                              <div class="form-group wrap-avatar" style="margin-top:10px">
                                <label for="avatar">{{trans('messages.avatar')}}</label><br>
                                <?php if ($employee->avatar == null) {?>
                                   <img src="{{ Asset('avatar/avatar-default.png') }}" style="border:1px solid black;" id="avatarimg" width="160" height="160" />
                                <?php } else {
	                              ?>
                                   <img src="{{ Asset($employee->avatar) }}" style="border:1px solid black;" id="avatarimg" width="160" height="160" />
                                <?php 
                                   }
                                ?>
                                
                                <input id="avatar" name="avatar" type="file" value="{{ $employee->avatar }}" style="display:none;" accept="image/*" />

                                <p style="margin:0px;margin-bottom:-5px;display:block;height:26px"><input type="button" value="Browse..." onclick="document.getElementById('avatar').click();" id="inputlinkavatar" /></p>
                                <input type="hidden" name="avatar_save" value="{{ $employee->avatar }}"/>
                              </div>
                              <div class="form-group">
                                  <label for="address">{{trans('messages.address')}}<span class="text-red">*</span></label>
                                  <input type="text" name="address" class="form-control" id="address" value="{{ $employee->address }}">
                              </div>

                              <div class="form-group">
                                  <label for="career_objective">{{trans('messages.career_objective')}}</label>
                                  <input type="text" name="career_objective" class="form-control" id="career_objective" value="{{ $employee->career_objective }}">
                              </div>

                              <div class="form-group">
                                  <label for="hobbies">{{trans('messages.hobby')}}</label>
                                  <input type="text" name="hobbies" class="form-control" id="hobbies" value="{{ $employee->hobbies }}" />
                              </div>

                              <div class="form-group">
                                  <label for="achievement_awards">{{trans('messages.award_achievement')}}</label>
                                  <textarea name="achievement_awards" class="form-control" style="display: block;height: 180px;" rows="5" id="achievement_awards"> {{ $employee->achievement_awards }} </textarea>
                              </div>
                           </div>
                         </div>
                    </div>
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2">
                      <div class="box box-info">
                    <div class="inner row">
                           <div class="col-md-6">
                             @include('profiles.skill')
                            </div>
                          </div>
                        </div>
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_3">
                     <div id="tab_edu">
                           <?php
foreach ($educations as $key => $value) {
	?>
                             <div class="groupedu box box-info">
                               <div class="row">
                                  <div class="col-md-4">
                                    <div class="row">
                                      <div class="col-md-6">
                                        <label>{{trans('messages.year_start')}}</label>
                                        <input name="edu_yearstart<?php echo $value->id;?>" value="<?php echo $value->year_start;?>" class="form-control edu_yearstart calendar" />
                                      </div>
                                      <div class="col-md-6">
                                        <label>{{trans('messages.year_end')}}</label>
                                        <input name="edu_yearend<?php echo $value->id;?>" value="<?php echo $value->year_end;?>" class="form-control edu_yearend calendar"/>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <label>{{trans('messages.education')}}</label>
                                    <input name="edu_education<?php echo $value->id;?>" class="form-control edu_education" rows="3" value="<?php echo $value->education;?>"/>
                                  </div>
                                  <div class="col-md-4">
                                  </div>
                               </div>
                               <div class="row">
                                 <div class="col-md-10"><p></p></div>
                                 <button class="btn btn-danger delete_edu col-md-1" title="Delete education" style="width: 25px; height: 30px; padding: 5px 2px; display: inline-block; margin-left: 89px;"><i class="fa fa-remove"></i></button>
                                 <!-- <input type="button" class="btn btn-danger col-md-1 delete_edu" value="Delete"> -->
                                 <div class="col-md-1"><p></p></div>
                               </div>
                             </div>
                           <?php
}
?>

                           <div class="area-add">
                                <?php
if (count($educations) == 0) {
	?>
                                  <div class="groupedu box box-info">
                                       <div class="row">
                                          <div class="col-md-4">
                                            <div class="row">
                                              <div class="col-md-6">
                                                <label>{{trans('messages.year_start')}}</label>
                                                <input name="edu_yearstart[]" value="" class="form-control edu_yearstart calendar"/>
                                              </div>
                                              <div class="col-md-6">
                                                <label>{{trans('messages.year_end')}}</label>
                                                <input name="edu_yearend[]" value="" class="form-control edu_yearend calendar"/>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="col-md-4">
                                              <label>{{trans('messages.education')}}</label>
                                              <input name="edu_education[]" class="form-control edu_education" rows="3"/>
                                          </div>
                                          <div class="col-md-4">

                                          </div>
                                       </div>
                                       <div class="row">
                                         <div class="col-md-10"><p></p></div>
                                         <button class="btn btn-danger delete_edu col-md-1" title="Delete education" style="width: 25px; height: 30px; padding: 5px 2px; display: inline-block;margin-left: 89px;"><i class="fa fa-remove"></i></button>
                                         <!-- <input type="button" class="btn btn-danger col-md-1 delete_edu" value="Delete"> -->
                                         <div class="col-md-1"><p></p></div>
                                       </div>
                                  </div>
                                  <?php
}
?>
                           </div>
                           <div class="row">
                                 <div class="col-md-10"><p></p></div>
                                 <a class="btn btn-primary add_edu col-md-1" title="Add new edu" style="width: 25px; height: 30px; padding: 5px 2px; display: inline-block;margin-left: 89px;"><i class="fa fa-plus"></i></a>
                                 <!-- <input type="button" class="btn btn-info col-md-1 add_edu" value="Add"> -->
                                 <div class="col-md-1"><p></p></div>
                           </div>
                              <style type="text/css">
                                .wrapimage{
                                  overflow: scroll;
                                  max-height: 370px;
                                }
                               .groupedu{
                                /* border : 1px solid black;
                                 border-radius: 3px;*/
                                 margin: 5px;
                                 padding : 8px;
                               }
                               #area-add-company{
                                 /*border : 1px solid black;*/
                                 border-radius: 3px;
                                 margin: 5px;
                                 padding : 8px;
                               }
                               #area-add-project{
                                 /*border : 1px solid black;*/
                                 border-radius: 3px;
                                 margin: 5px;
                                 padding : 8px;
                               }
                               .ui-widget-header {
                                  border: 1px solid #6583BE;
                                  background: #3c8dbc;
                                  color: #ffffff;
                                  font-weight: bold;
                                }
                                body .modal {
                                    width: 714px;
                                    margin-left: 22%;
                                    background: transparent !important;
                                }
                                .modal-dialog{
                                  width: auto !important;
                                }
                              </style>

                              <script type="text/javascript">
                                $(document).ready(function(){
                                  // $('.content-inner').on('click','.delete_edu',function(){

                                  //   return false;
                                  // });

                                  $('.add_edu').click(function(){
                                      $('.area-add').append($('#formaddedu').html());
                                      $( ".calendar" ).datepicker({format: 'yyyy', viewMode: "years",minViewMode :"years",autoclose : true ,focusOnShow : false, disableEntry: true});
                                      return false;
                                  });
                                  $('#tab_edu').on('click','.delete_edu',function(){
                                      $(this).parent().parent().remove();
                                      return false;
                                  });

                                });
                              </script>
                      </div> <!-- #tab_edu-->

                  </div>
                  <div class="tab-pane" id="tab_4">
                    <div class="inner row">
                           <div class="col-md-12">
                            <!-- COMPANY FORM -->
                            <!-- <fieldset> -->
                                <?php foreach ($experiences as $experience): ?>
                                <div id="area-add-company" class="box box-info">
                                  <div class="box-header">
                                    <div class="box-tools pull-right">
                                      <button class="btn btn-danger removeCompany" title="Remove company" style="width:25px; height:30px; padding:5px 2px;"><i class="fa fa-remove"></i></button>
                                    </div>
                                  </div>
                                  <div class="box-body">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="company">Company Name<!-- <span class="text-red">*</span> --></label>
                                          <input type="text" name="company[]" class="form-control company" id="company" value="{{ $experience->company }}">
                                      </div>
                                      <div class="form-group">
                                        <label for="position">Position<!-- <span class="text-red">*</span> --></label>
                                        <input type="text" name="position[]" class="form-control position" id="position" value="{{ $experience->position }}">
                                      </div>
                                      <div class="row">
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <label for="startdate">Start Date</label>
                                            <input type="text" name="startdate[]" class="form-control startdate" id="startdate" value="{{ $experience->year_start }}">
                                          </div>
                                        </div>
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <label for="enddate">End Date</label>
                                            <input type="text" name="enddate[]" class="form-control enddate" id="enddate" value="{{ $experience->year_end }}">
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="mainduties">Main Duties</label>
                                        <TEXTAREA name="mainduties[]" id="mainduties" rows="7" class="form-control">{{ $experience->main_duties }}</TEXTAREA>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <?php endforeach;?>

                              <div id="addcompany"></div>
                              <!-- Ban dau ko co gi ca -->
                              <div id="area-add-company" class="box box-info">
                                  <div class="box-header">
                                    <div class="box-tools pull-right">
                                      <button class="btn btn-danger removeCompany" title="Remove company" style="width:25px; height:30px; padding:5px 2px;"><i class="fa fa-remove"></i></button>
                                    </div>
                                  </div>
                                  <div class="box-body">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="company">Company Name<!-- <span class="text-red">*</span> --></label>
                                          <input type="text" name="company[]" class="form-control company" id="company">
                                      </div>
                                      <div class="form-group">
                                        <label for="position">Position<!-- <span class="text-red">*</span> --></label>
                                        <input type="text" name="position[]" class="form-control position" id="position">
                                      </div>
                                      <div class="row">
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <label for="startdate">Start Date</label>
                                            <input type="text" name="startdate[]" class="form-control startdate" id="startdate">
                                          </div>
                                        </div>
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <label for="enddate">End Date</label>
                                            <input type="text" name="enddate[]" class="form-control enddate" id="enddate">
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="mainduties">Main Duties</label>
                                        <TEXTAREA name="mainduties[]" id="mainduties" rows="7" class="form-control"></TEXTAREA>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              <!-- End -->
                              <button class="btn btn-primary pull-right addCompany" title="Add new company" style="width:25px; height:30px; padding:5px 2px;"><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                    </div><!-- /.tab-pane -->

                  <div class="tab-pane" id="tab_5">
                      <div class="inner row">
                         <div class="col-md-12">
                          @foreach($taken_projects as $project)
                          <div id="area-add-project" class="box box-info">
                            <div class="box-header">
                              <div class="box-tools pull-right">
                                <button class="btn btn-danger removeProject" title="Remove project" style="width:25px; height:30px; padding:5px 2px;"><i class="fa fa-remove"></i></button>
                              </div>
                            </div>
                            <div class="box-body">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="projectname">Project's Name<!-- <span class="text-red">*</span> --></label>
                                  <input type="text" name="projectname[]" class="form-control" id="projectname" value="{{ $project->project_name }}">
                                </div>
                                <div class="form-group">
                                  <label for="customername">Customer's Name</label>
                                  <input type="text" name="customername[]" class="form-control" id="customername" value="{{ $project->customer_name }}">
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="role">Role<!-- <span class="text-red">*</span> --></label>
                                      <input type="text" name="role[]" class="form-control" id="role" value="{{ $project->role }}">
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="numberpeople">Number Of People In Project<!-- <span class="text-red">*</span> --></label>
                                      <input type="text" name="numberpeople[]" class="form-control" id="numberpeople" value="{{ $project->number_people }}">
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="projectperiod">Project Period</label>
                                  <input type="text" name="projectperiod[]" class="form-control" id="projectperiod" value="{{ $project->project_period }}">
                                </div>
                                <div class="form-group">
                                  <label for="skillset">Skill Set Ultilized<!-- <span class="text-red">*</span> --></label>
                                  <input type="text" name="skillset[]" class="form-control" id="skillset" value="{{ $project->skill_set_ultilized }}">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="projectdescription">Project Description</label>
                                  <TEXTAREA name="projectdescription[]" id="projectdescription" rows="15" class="form-control">{{ $project->project_description }}</TEXTAREA>
                                </div>
                              </div>
                            </div>
                          </div>
                        @endforeach()

                      <div id="addproject"></div>
                      <!-- Ban dau ko co gi ca -->
                      <div id="area-add-project" class="box box-info">
                            <div class="box-header">
                              <div class="box-tools pull-right">
                                <button class="btn btn-danger removeProject" title="Remove project" style="width:25px; height:30px; padding:5px 2px;"><i class="fa fa-remove"></i></button>
                              </div>
                            </div>
                            <div class="box-body">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="projectname">Project's Name<!-- <span class="text-red">*</span> --></label>
                                  <input type="text" name="projectname[]" class="form-control" id="projectname">
                                </div>
                                <div class="form-group">
                                  <label for="customername">Customer's Name</label>
                                  <input type="text" name="customername[]" class="form-control" id="customername">
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="role">Role<!-- <span class="text-red">*</span> --></label>
                                      <input type="text" name="role[]" class="form-control" id="role">
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="numberpeople">Number Of People In Project<!-- <span class="text-red">*</span> --></label>
                                      <input type="text" name="numberpeople[]" class="form-control" id="numberpeople">
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="projectperiod">Project Period</label>
                                  <input type="text" name="projectperiod[]" class="form-control" id="projectperiod">
                                </div>
                                <div class="form-group">
                                  <label for="skillset">Skill Set Ultilized<!-- <span class="text-red">*</span> --></label>
                                  <input type="text" name="skillset[]" class="form-control" id="skillset">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="projectdescription">Project Description</label>
                                  <TEXTAREA name="projectdescription[]" id="projectdescription" rows="15" class="form-control"></TEXTAREA>
                                </div>
                              </div>
                            </div>
                          </div>
                      <!-- End -->
                      <button class="btn btn-primary pull-right addProject" title="Add new project" style="width:25px; height:30px; padding:5px 2px;"><i class="fa fa-plus"></i></button>
                  </div>
                </div>
              </div><!-- /.tab-content -->
          </div>
        </div>
          <!-- Thay giao dien -->


                    <div class="footer-tabs row">
                      <div class="col-md-8"></div>
                      <div class="col-md-4" style="padding-left: 220px;margin-top: -9px;">
                        <input type='submit' class='btn btn-primary btn-save' style="margin-right: 2px;" value="{{trans('messages.save')}}">
                        <input type="button" class='btn btn-primary cancel' value="{{trans('messages.cancel')}}">
                      </div>
                    </div>
                    </form> <!-- close form -->
                </div><!-- /.box-body -->


              </div>
            </div>
          </div>
</section>
</div>


<style type="text/css">
  .box.box-primary {
    background-color: #F7F9FF;
  }
</style>
<!-- FORM ADD EDUCATION : DISPLAY NONE -->
<div id="formaddedu" style="display:none">
  <div class="groupedu box box-info">
       <div class="row">
          <div class="col-md-4">
            <div class="row">
              <div class="col-md-6">
                <label>{{trans('messages.year_start')}}</label>
                <input name="edu_yearstart[]" value="" class="form-control edu_yearstart calendar"/>
              </div>
              <div class="col-md-6">
                <label>{{trans('messages.year_end')}}</label>
                <input name="edu_yearend[]" value="" class="form-control edu_yearend calendar"/>
              </div>
            </div>
          </div>
          <div class="col-md-4">
              <label>{{trans('messages.education')}}</label>
              <input name="edu_education[]" class="form-control edu_education" rows="3"/>
          </div>
          <div class="col-md-4">

          </div>
       </div>
       <div class="row">
         <div class="col-md-10"><p></p></div>
         <button class="btn btn-danger delete_edu col-md-1" title="Delete education" style="width: 25px; height: 30px; padding: 5px 2px; display: inline-block; margin-left: 89px;"><i class="fa fa-remove"></i></button>
         <!-- <input type="button" class="btn btn-danger col-md-1 delete_edu" value="Delete"> -->
         <div class="col-md-1"><p></p></div>
       </div>
  </div>
</div>
@stop