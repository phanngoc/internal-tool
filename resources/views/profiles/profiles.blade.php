@extends ('layouts.master')

@section ('head.title')
  {{trans('messages.list_group')}}
@stop

@section ('head.css')
  <link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="{{ Asset('jquery-accessible-tabs/jquery.accTabs.min.js') }}" ></script>
  <link rel="stylesheet" type="text/css" href="{{ Asset('jquery-accessible-tabs/jquery-accessible-tabs.css') }}">

  <script type="text/javascript" src="{{ Asset('jquery-ui/jquery-ui.js') }}" ></script>
  <link rel="stylesheet" type="text/css" href="{{ Asset('jquery-ui/jquery-ui.css') }}">

  <script src="{{ Asset('jquerycrop/js/jquery.Jcrop.min.js') }}"></script>
  <link rel="stylesheet" href="{{ Asset('jquerycrop/css/jquery.Jcrop.css') }}" type="text/css" />

  <script src="{{ Asset('bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>
  <link rel="stylesheet" href="{{ Asset('bootstrap-datepicker/bootstrap-datepicker.css') }}" type="text/css" />
  <script type="text/javascript">
      $(function(){

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
            phone: {
              phone: true
            },
            'company[]': {
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
            }
          };

      // for(i=0;i<5;i++)
      // {
      //    var edu_yearstart = i+'edu_yearstart';
      //    var edu_yearend = i+'edu_yearend';
      //    console.log(edu_yearstart);
      //   // var item = {'edu_yearstart':{required:true}};
      //   // $.extend(true,res,item);
      //   jQuery.validator.addClassRules(edu_yearstart, {
      //     required: true,
      //   });
      //   jQuery.validator.addClassRules(edu_yearend, {
      //     required: true,
      //   });
      // }
      // res = {
      //   phone : {phone:true},
      //   edu_yearstart1 : {required :true },
      //   edu_yearstart2 : {required :true },
      //   edu_yearstart3 : {required :true },
      //   edu_yearstart4 : {required :true },
      //   edu_yearstart5 : {required :true },
      //   edu_yearstart6 : {required :true }
      // };

      // for(i=0;i<9;i++)
      // {
      //   var edu_yearstart = 'edu_yearstart'+i;
      //   var edu_yearend = 'edu_yearend'+i;
      //   //console.log(edu_yearstart);
      //   var item = constructJson(edu_yearstart,{required:true});
      //   var item1 = constructJson(edu_yearend,{required:true});
      //   // var item = {'edu_yearstart':{required:true}};
      //   $.extend(true,res,item);
      //   $.extend(true,res,item1);
      // }

      // console.log(JSON.stringify(res));



      $("#formprofile").validate({
          rules: res,
          messages: {
            phone: {
              phone: "Please enter a valid value"
            },
            'company[]': {
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
            }
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

      var objvalidate = function(arrclass){
          this.counterror = 0;
          var self = this;
          $.each(arrclass,function(key,value){
             var nameclass = key;
             $('#tab_edu').on('focusout','.'+nameclass,function(){
               var valcal = $(this).val();
               var $this = $(this);
               if(self.existShowError($this)) return;
               $.each(value,function(k,v){
                  console.log(self.runFunc(k,[valcal]));
                  if(!self.runFunc(k,[valcal]))
                  {
                    self.counterror++;
                    $this.parent().append('<label class="error">'+v+'</label>');
                  }
               });
             });
             $('#tab_edu').on('keyup','.'+nameclass,function(){
                 self.counterror = 0;
                 $(this).parent().find('.error').remove();
             });
          });
          $( "#formprofile" ).submit(function( event ) {
            if(self.counterror != 0)
            {
              event.preventDefault();
            }
          });
          this.existShowError = function($obj)
          {
             // console.log($obj.parent().find('.error').length);
              if($obj.parent().find('.error').length != 0)
              {
                return true;
              }
              return false;
          },
          this.notEmpty = function(value)
          {
            return (value != '');
          },
          this.isNumber4Digit = function(value)
          {
            var reg = new RegExp('^[0-9]{4}$');
            return reg.test(value);
          },
          this.runFunc = function (name, arguments)
          {
              var fn = this[name];
              if(typeof fn !== 'function')
                  return;

              return fn.apply(window, arguments);
          }

      }
      var param = {
         edu_yearstart : { notEmpty : 'This field is required.',isNumber4Digit : 'This field is must 4 digit.' },
         edu_yearend : { notEmpty : 'This field is required.',isNumber4Digit : 'This field is must 4 digit.' },
         edu_education : { notEmpty : 'This field is required.'},
         position : { notEmpty : 'This field is required.' },
         company : { notEmpty : 'This field is required.' },
      }
      objvalidate(param);
      // $('#tab_edu').on('focusout','.edu_yearstart,.edu_yearend',function(){
      //    //$("#formprofile").validate().form();
      //    if(existShowError($(this))) return;
      //    var reg = new RegExp('^[0-9]{4}$');
      //    var counterror = 0;
      //    if($(this).val()=='')
      //    {
      //     counterror++;
      //     $(this).parent().append('<label class="error">This field is required.</label>');
      //    }
      //    if(!reg.test($(this).val()))
      //    {
      //     counterror++;
      //     $(this).parent().append('<label class="error">This field is must 4 digit.</label>');
      //    }
      //    if(counterror == 0)
      //    {
      //     $(this).parent().find('.error').remove();
      //    }
      // });
      // $('#tab_edu').on('focusout','.edu_education',function(){
      //    //$("#formprofile").validate().form();
      //    if(existShowError($(this))) return;
      //    var reg = new RegExp('^[0-9]{4}$');
      //    var counterror = 0;
      //    if($(this).val()=='')
      //    {
      //     counterror++;
      //     $(this).parent().append('<label class="error">This field is required.</label>');
      //    }
      //    if(counterror == 0)
      //    {
      //     $(this).parent().find('.error').remove();
      //    }
      // });
      // $('#tab_edu').on('keyup','.edu_yearstart,.edu_yearend,.edu_education',function(){
      //    $(this).parent().find('.error').remove();
      // });

      // setInterval(function(){
      //     $("#formprofile").validate().form();
      // }, 1000);
      /*End My Script Validate*/

        /*CROP IMAGE NGOC VERSION*/
      var jcrop_api = null;
          $( ".startdate" ).datepicker({
           format: 'dd/mm/yyyy'
          });

          $( ".enddate" ).datepicker({
            format: 'dd/mm/yyyy'
          });

     // $( "#dateofbirth" ).datepicker({dateFormat: "dd/mm/yy"});
      $( "#dateofbirth" ).datepicker({format: 'dd/mm/yyyy'});

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
      $('.edit').click(function(e){
          $(this).prop("disabled", true);
          $('.addCompany, .removeCompany').show();
          $('.addProject, .removeProject').show();
          $('.delete_edu, .add_edu').show();
          $('input').prop("disabled", false);
          $('select').prop("disabled", false);
          $('textarea,a,i').prop("disabled", false);
          $('.action').show();
          e.preventDefault();

          addSkill();
          return false;
      });

      $('#avatar').on('change',function(){
           console.log('xong a');
           $('#dialog-resize').css({'display':'block','z-index':'9999'});
           $('.ui-front').css({'z-index':'9999'});
           //$( "#dialog-resize" ).dialog('open');
           $('#myModal').modal('show');
           readURL(this);

      });
      var x,y,width,height;


      function readURL(input) {
          console.log('vo duoc');
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
              console.log(input.files[0]);
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
          $('.delete_edu, .add_edu').hide();
          $('.action').hide();
          $('.add-skill').parents('tr').remove();
          $('.edit').prop("disabled", false);
      });


        /*ADD COMPANY*/
        $(document).on('click', '.addCompany', function(){
          $('#addcompany').append('<div id="area-add-company" class="box box-info"> <div class="box-header"> <div class="box-tools pull-right"> <button class="btn btn-primary addCompany" title="Add new company" style="width:25px; height:30px; padding:5px 2px;"><i class="fa fa-plus"></i></button> <button class="btn btn-danger removeCompany" title="Remove company" style="width:25px; height:30px; padding:5px 2px;"><i class="fa fa-remove"></i></button> </div> </div> <div class="box-body"> <div class="col-md-6"> <div class="form-group"> <label for="company">Company Name</label> <input type="text" name="company[]" class="form-control company" id="company"> </div> <div class="form-group"> <label for="position">Position</label> <input type="text" name="position[]" class="form-control" id="position"> </div> <div class="row"> <div class="col-md-6"> <div class="form-group"> <label for="startdate">Start Date</label> <input type="text" name="startdate[]" class="form-control startdate" id="startdate"> </div> </div> <div class="col-md-6"> <div class="form-group"> <label for="enddate">End Date</label> <input type="text" name="enddate[]" class="form-control enddate" id="enddate"> </div> </div> </div> </div> <div class="col-md-6"> <div class="form-group"> <label for="mainduties">Main Duties</label> <TEXTAREA name="mainduties[]" id="mainduties" rows="7" class="form-control"></TEXTAREA> </div> </div> </div> </div>');
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
          $('#addproject').append('<div id="area-add-project" class="box box-info"> <div class="box-header"> <div class="box-tools pull-right"> <button class="btn btn-primary addProject" title="Add new project" style="width:25px; height:30px; padding:5px 2px;"><i class="fa fa-plus"></i></button> <button class="btn btn-danger removeProject" title="Remove project" style="width:25px; height:30px; padding:5px 2px;"><i class="fa fa-remove"></i></button> </div> </div> <div class="box-body"> <div class="col-md-6"> <div class="form-group"> <label for="projectname">Project Name</label> <input type="text" name="projectname[]" class="form-control" id="projectname"> </div> <div class="form-group"> <label for="customername">Customer Name</label> <input type="text" name="customername[]" class="form-control" id="customername"> </div> <div class="row"> <div class="col-md-6"> <div class="form-group"> <label for="role">Role</label> <input type="text" name="role[]" class="form-control" id="role"> </div> </div> <div class="col-md-6"> <div class="form-group"> <label for="numberpeople">Number People</label> <input type="text" name="numberpeople[]" class="form-control" id="numberpeople"> </div> </div> </div> <div class="form-group"> <label for="projectperiod">Project Period</label> <input type="text" name="projectperiod[]" class="form-control" id="projectperiod"> </div> <div class="form-group"> <label for="skillset">Skill Set</label> <input type="text" name="skillset[]" class="form-control" id="skillset"> </div> </div> <div class="col-md-6"> <div class="form-group"> <label for="projectdescription">Project Description</label> <TEXTAREA name="projectdescription[]" id="projectdescription" rows="15" class="form-control"></TEXTAREA> </div> </div> </div> </div>');
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
               <div class="col-md-9 wrapimage">
                 <img src="" id="imagecrop"/>
               </div>
               <div class="col-md-3">
                 <button class="btn btn-primary btncropok">Ok</button>
                 <button class="btn btn-primary btncropcancel">Cancel</button>
               </div>
            </div>
          </div><!-- .inner -->
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
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
                      <div class="col-md-4">


                        <a href="{{ route('print.show',$employee->id) }}"class='btn btn-primary export'>Export</a>

                        <a href="{{ route('printpreview.show',$employee->id) }}" class='btn btn-primary print'>Print</a>
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
                              <div class="form-group">
                                  <label for="firstname">{{trans('messages.firstname')}}</label>
                                  <input type="text" name="firstname" class="form-control" id="firstname" value="{{ $employee->firstname }}">
                              </div>
                              <div class="form-group">
                                  <label for="lastname">{{trans('messages.lastname')}}</label>
                                  <input type="text" name="lastname" class="form-control" id="lastname" value="{{ $employee->lastname }}">
                              </div>

                              <div class="form-group">
                                <label for="gender">{{trans('messages.gender')}}</label>
                                <select class="form-control" name="gender" id="gender">
                                  <option value="0">{{trans('messages.male')}}</option>
                                  <option value="1">{{trans('messages.female')}}</option>
                                </select>
                              </div>

                              <div class="form-group">
                                <label for="dateofbirth">{{trans('messages.date_of_birth')}}</label>
                                <input class="form-control" name="dateofbirth" id="dateofbirth" value="{{ $employee->date_of_birth }}"/>
                              </div>

                              <div class="form-group">
                                  <label for="nationality">{{trans('messages.nationality')}}</label>
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
                                  <label for="email">{{trans('messages.email')}}</label>
                                  <input type="email" name="email" class="form-control" id="email" value="{{ $employee->email }}">
                              </div>

                              <div class="form-group">
                                  <label for="phone">{{trans('messages.phone')}}</label>
                                  <input type="text" name="phone" class="form-control" id="phone" value="{{ $employee->phone }}">
                              </div>

                              <div class="form-group">
                                  <label for="position">Position</label>
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
                              <div class="form-group wrap-avatar">
                                <label for="avatar">{{trans('messages.avatar')}}</label><br>
                                <img src="{{ Asset($employee->avatar) }}" style="border:1px solid black;" id="avatarimg" width="160" height="160" />
                                <input id="avatar" name="avatar" type="file" value="{{ $employee->avatar }}" style="display:none;" />
                                <p style="margin: 0px;margin-bottom: -5px;"><input type="button" value="Browse..." onclick="document.getElementById('avatar').click();" /></p>
                                <input type="hidden" name="avatar_save" value="{{ $employee->avatar }}"/>
                              </div>
                              <div class="form-group">
                                  <label for="address">{{trans('messages.address')}}</label>
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
                                  <input type="text" name="achievement_awards" class="form-control" id="achievement_awards" value="{{ $employee->achievement_awards }}" />
                              </div>
                              <div class="form-group">
                                  <label for="employee_code">{{trans('messages.employee_code')}}</label>
                                  <input type="text" name="employee_code" class="form-control" id="employee_code" value="{{ $employee->employee_code }}">
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
                                        <input name="edu_yearstart<?php echo $value->id;?>" value="<?php echo $value->year_start;?>" class="form-control edu_yearstart" required/>
                                      </div>
                                      <div class="col-md-6">
                                        <label>{{trans('messages.year_end')}}</label>
                                        <input name="edu_yearend<?php echo $value->id;?>" value="<?php echo $value->year_end;?>" class="form-control edu_yearend"/>
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
                                 <button class="btn btn-danger delete_edu" title="Delete education" style="width: 25px; height: 30px; padding: 5px 2px; display: inline-block;"><i class="fa fa-remove"></i></button>
                                 <!-- <input type="button" class="btn btn-danger col-md-1 delete_edu" value="Delete"> -->
                                 <div class="col-md-1"><p></p></div>
                               </div>
                             </div>
                           <?php
}
?>

                           <div class="area-add">

                           </div>
                           <div class="row">
                                 <div class="col-md-10"><p></p></div>
                                 <a class="btn btn-primary add_edu" title="Add new edu" style="width: 25px; height: 30px; padding: 5px 2px; display: inline-block;"><i class="fa fa-plus"></i></a>
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
                                    width: 940px;
                                    margin-left: 15%;
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
                                      console.log($('#formaddedu').html());
                                      $('.area-add').append($('#formaddedu').html());
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
                                      <a class="btn btn-primary addCompany" title="Add new company" style="width:25px; height:30px; padding:5px 2px;"><i class="fa fa-plus"></i></a>
                                      <button class="btn btn-danger removeCompany" title="Remove company" style="width:25px; height:30px; padding:5px 2px;"><i class="fa fa-remove"></i></button>
                                    </div>
                                  </div>
                                  <div class="box-body">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="company">Company Name</label>
                                          <input type="text" name="company[]" class="form-control company" id="company" value="{{ $experience->company }}">
                                      </div>
                                      <div class="form-group">
                                        <label for="position">Position</label>
                                        <input type="text" name="position[]" class="form-control position" id="position" value="{{ $experience->position }}" required>
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
                                <button class="btn btn-primary addProject" title="Add new project" style="width:25px; height:30px; padding:5px 2px;"><i class="fa fa-plus"></i></button>
                                <button class="btn btn-danger removeProject" title="Remove project" style="width:25px; height:30px; padding:5px 2px;"><i class="fa fa-remove"></i></button>
                              </div>
                            </div>
                            <div class="box-body">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="projectname">Project's Name</label>
                                  <input type="text" name="projectname[]" class="form-control" id="projectname" value="{{ $project->project_name }}">
                                </div>
                                <div class="form-group">
                                  <label for="customername">Customer's Name</label>
                                  <input type="text" name="customername[]" class="form-control" id="customername" value="{{ $project->customer_name }}">
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="role">Role</label>
                                      <input type="text" name="role[]" class="form-control" id="role" value="{{ $project->role }}">
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="numberpeople">Number Of People In Project</label>
                                      <input type="text" name="numberpeople[]" class="form-control" id="numberpeople" value="{{ $project->number_people }}">
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="projectperiod">Project Period</label>
                                  <input type="text" name="projectperiod[]" class="form-control" id="projectperiod" value="{{ $project->project_period }}">
                                </div>
                                <div class="form-group">
                                  <label for="skillset">Skill Set Ultilized</label>
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

                      <div id="addproject">

                    </div>
                  </div>
                </div>
              </div><!-- /.tab-content -->
          </div>
        </div>
          <!-- Thay giao dien -->


                    <div class="footer-tabs row">
                      <div class="col-md-8"></div>
                      <div class="col-md-4">
                        <input type='submit' class='btn btn-primary btn-save'value="{{trans('messages.save')}}">
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
                <input name="edu_yearstart[]" value="" class="form-control edu_yearstart"/>
              </div>
              <div class="col-md-6">
                <label>{{trans('messages.year_end')}}</label>
                <input name="edu_yearend[]" value="" class="form-control edu_yearend"/>
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
         <button class="btn btn-danger delete_edu" title="Delete education" style="width: 25px; height: 30px; padding: 5px 2px; display: inline-block;margin-right: 53px;"><i class="fa fa-remove"></i></button>
         <!-- <input type="button" class="btn btn-danger col-md-1 delete_edu" value="Delete"> -->
         <div class="col-md-1"><p></p></div>
       </div>
  </div>
</div>
@stop