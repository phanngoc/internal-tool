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

  <script type="text/javascript">
      $(function(){

        /*CROP IMAGE NGOC VERSION*/
        var jcrop_api = null;
      $( "#startdate" ).datepicker({
        dateFormat: "dd/mm/yy"
      });
      $( "#enddate" ).datepicker({
        dateFormat: "dd/mm/yy"
      });
      $( "#dateofbirth" ).datepicker({dateFormat: "dd/mm/yy"});
      $( "#dialog-resize" ).dialog({
           width : 1100,
           height : 550,
           close: function( event, ui ) {
            if(jcrop_api != null)
            {
              jcrop_api.destroy();
              $('#imagecrop').removeAttr( "style" );
            }
           },
      });
      $( "#dialog-resize" ).dialog('close');

      // var d = $("#myDatepicker1").datepicker("getDate");
      // console.log(d);
      $('input,select,textarea').prop("disabled", true);
      $('.delete-skill').prop("style","visibility: hidden");

      $('.edit').click(function(){
          $('.removeProject').prop("style", "visibility: show");
          $('.removeCompany').prop("style", "visibility: show");
          $('input').prop("disabled", false);
          $('select').prop("disabled", false);
          $('textarea,a,i').prop("disabled", false);
          $('.delete-skill').prop("style","visibility: show");
          $(this).click(function(e){
             e.preventDefault();
          });
          addSkill();
      });

      $('#avatar').on('change',function(){
           console.log('xong a');
           $('#dialog-resize').css({'display':'block','z-index':'9999'});
           $('.ui-front').css({'z-index':'9999'});
           $( "#dialog-resize" ).dialog('open');
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
                  },function(){
                    jcrop_api = this;
                  });

                  $('.btncropok').click(function(){
                        $("#dialog-resize").dialog('close');
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
                     $("#dialog-resize").dialog('close');
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
          $('input,select,textarea').prop("disabled", true);
      });


        /*ADD COMPANY*/
        $(document).on('click', '#addCompany', function(){
          $('#addcompany').append('<div id="area-add-company"> <div class="form-group"> <label for="company">Company Name</label> <input type="text" name="company[]" class="form-control" id="company" value=""> </div> <div class="form-inline"> <div class="form-group"> <div class="form-group"> <label for="startdate">Start Date</label> <input type="text" name="startdate[]" class="form-control" id="startdate" value=""> </div> <div class="form-group"> <label for="enddate">End Date</label> <input type="text" name="enddate[]" class="form-control" id="enddate" value=""> </div> </div> </div> <br> <div class="form-group"> <label for="position">Position</label> <input type="text" name="position[]" class="form-control" id="position" value=""> </div> <!-- <div class="form-group"> <input type="button" id="addPosition" name="addPosition" value="ADD"> </div> --> <br> <div class="form-group"> <label for="mainduties">Main Duties</label> <TEXTAREA name="mainduties[]" id="mainduties" rows="5" class="form-control"></TEXTAREA> </div> <div class="form-group"> <input type="button" id="removeCompany" name="removeCompany" value="REMOVE" class="btn btn-success"> </div> </div>');
        });

        $(document).on('click', '#removeCompany', function(){
          $(this).parent().parent().remove();
        });

        /*ADD PROJECT*/
        $(document).on('click', '#addProject', function(){
          $('#addproject').append('<div id="area-add-project"> <div class="form-group"> <label for="projectname">Project Name</label> <input type="text" name="projectname[]" class="form-control" id="projectname"> </div> <div class="form-group"> <label for="customername">Customer Name</label> <input type="text" name="customername[]" class="form-control" id="customername"> </div> <div class="form-group"> <label for="role">Role</label> <input type="text" name="role[]" class="form-control" id="role"> </div> <div class="form-group"> <label for="numberpeople">Number People</label> <input type="text" name="numberpeople[]" class="form-control" id="numberpeople"> </div> <div class="form-group"> <label for="projectdescription">Project Description</label> <TEXTAREA name="projectdescription[]" id="projectdescription" rows="5" class="form-control"></TEXTAREA> </div> <div class="form-group"> <label for="projectperiod">Project Period</label> <input type="text" name="projectperiod[]" class="form-control" id="projectperiod"> </div> <div class="form-group"> <label for="skillset">Skill Set</label> <input type="text" name="skillset[]" class="form-control" id="skillset"> </div> <div class="form-group"> <input type="button" id="removeProject" name="removeProject" value="REMOVE" class="btn btn-success removeProject"> </div> </div>');
        });

        $(document).on('click', '#removeProject', function(){
          $(this).parent().parent().remove();
        })

      });
  </script>
@stop
@section('body.content')

<div class="content-wrapper">
<section class="content-header">
  <h1>
    {{trans('messages.profile')}}
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
  <div id="dialog-resize" style="display:none">
    <div class="inner">
      <div class="img row">
         <div class="col-md-8">
           <img src="" id="imagecrop"/>
         </div>
         <div class="col-md-4">
           <button class="btn btn-primary btncropok">Ok</button>
           <button class="btn btn-primary btncropcancel">Cancel</button>
         </div>
      </div>
    </div>
  </div>

<section class="content">
      <div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">{{trans('messages.profile')}}</h3>
                </div>
                <div class="box-body">

                  <form action="{{ route('employee.editmore.store',$employee->id) }}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="imageup"/>
                    <div class="header-tabs row">
                      <div class="col-md-8"></div>
                      <div class="col-md-4">

                        <a href="#" class='btn btn-primary export'>Export</a>
                        <a href="{{ route('printpreview.show') }}" class='btn btn-primary print'>Print</a>
                        <a href="#" class='btn btn-primary edit'>Edit</a>

                      </div>
                    </div>

                    <div class="tabs content-inner">
                      <h3>{{ trans('messages.personal_information') }}</h3>
                      <div>
                         <div class="inner row">
                           <div class="col-md-6">
                              <div class="form-group">
                                  <label for="firstname">Firstname:</label>
                                  <input type="text" name="firstname" class="form-control" id="firstname" value="{{ $employee->firstname }}">
                              </div>
                              <div class="form-group">
                                  <label for="lastname">Lastname:</label>
                                  <input type="text" name="lastname" class="form-control" id="lastname" value="{{ $employee->lastname }}">
                              </div>
                              <div class="form-group">
                                  <label for="employee_code">Employee Code:</label>
                                  <input type="text" name="employee_code" class="form-control" id="employee_code" value="{{ $employee->employee_code }}">
                              </div>
                              <div class="form-group">
                                  <label for="phone">Phone:</label>
                                  <input type="text" name="phone" class="form-control" id="phone" value="{{ $employee->phone }}">
                              </div>
                              <div class="form-group">
                                  <label for="position">Position:</label>
                                  <select class="form-control" name="position" id="position">
                                    @foreach($positions as $key=>$value)
                                      @if ($value->id == $employee->position_id)
                                        <option value="{{$value->id}}" selected>{{$value->name}}</option>
                                        @else
                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                      @endif
                                    @endforeach
                                  </select>
                              </div>
                              <div class="form-group">
                                  <label for="nationality">Nationality:</label>
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
                                  <label for="career_objective">Career objective:</label>
                                  <input type="text" name="career_objective" class="form-control" id="career_objective" value="{{ $employee->career_objective }}">
                              </div>
                              <div class="form-group">
                                  <label for="address">Address:</label>
                                  <input type="text" name="address" class="form-control" id="address" value="{{ $employee->address }}">
                              </div>
                              <div class="form-group">
                                <label for="gender">Gender:</label>
                                <select class="form-control" name="gender" id="gender">
                                  <option value="0">Male</option>
                                  <option value="1">Female</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="dateofbirth">Date of birth:</label>
                                <input class="form-control" name="dateofbirth" id="dateofbirth" value="{{ $employee->date_of_birth }}"/>
                              </div>
                              <div class="form-group">
                                  <label for="hobbies">Hobby:</label>
                                  <input type="text" name="hobbies" class="form-control" id="hobbies" value="{{ $employee->hobbies }}" />
                              </div>
                              <div class="form-group">
                                  <label for="achievement_awards">Achievement award:</label>
                                  <input type="text" name="achievement_awards" class="form-control" id="achievement_awards" value="{{ $employee->achievement_awards }}" />
                              </div>

                            </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                <label for="avatar">Avatar:</label><br>
                                <img src="{{ Asset($employee->avatar) }}" style="border:1px solid black;" id="avatarimg" />
                                <input id="avatar" class="btn btn-info" name="avatar" type="file" value="{{ $employee->avatar }}"/>
                              </div>
                           </div>
                         </div>
                      </div>

                      <h3>{{ trans('messages.skills') }}</h3>
                      <div>
                        @include('profiles.skill')
                      </div>

                      <h3>{{ trans('messages.educations') }}</h3>
                      <div id="tab_edu">
                           <?php
foreach ($educations as $key => $value) {
	?>
                             <div class="groupedu">
                               <div class="row">
                                  <div class="col-md-4">
                                    <div class="row">
                                      <div class="col-md-6">
                                        <label>Year Start</label>
                                        <input name="<?php echo $value->id;?>edu_yearstart" value="<?php echo $value->year_start;?>" class="form-control"/>
                                      </div>
                                      <div class="col-md-6">
                                        <label>Year End</label>
                                        <input name="<?php echo $value->id;?>edu_yearend" value="<?php echo $value->year_end;?>" class="form-control"/>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <label>Description</label>
                                    <textarea name="<?php echo $value->id;?>edu_description" class="form-control"><?php echo $value->description;?></textarea>
                                  </div>
                                  <div class="col-md-4">
                                    <label>Certificate</label>
                                    <input name="<?php echo $value->id;?>certificate" value="<?php echo $value->certificate;?>" class="form-control"/>
                                  </div>
                               </div>
                               <div class="row">
                                 <div class="col-md-10"><p></p></div>
                                 <a href="#" class="btn btn-danger col-md-1 delete_edu">Delete</a>
                                 <div class="col-md-1"><p></p></div>
                               </div>
                             </div>
                           <?php }
?>

                           <div class="area-add">

                           </div>
                           <div class="row">
                                 <div class="col-md-10"><p></p></div>
                                 <a href="#" class="btn btn-info col-md-1 add_edu">Add</a>
                                 <div class="col-md-1"><p></p></div>
                           </div>
                      </div>
                      <style type="text/css">
                       .groupedu{
                         border : 1px solid black;
                         border-radius: 3px;
                         margin: 5px;
                         padding : 8px;
                       }
                      </style>

                      <script type="text/javascript">
                        $(document).ready(function(){
                          $('.content-inner').on('click','.delete_edu',function(){
                            $(this).parent().parent().remove();
                          });

                          $('.add_edu').click(function(){
                              console.log($('#formaddedu').html());
                              $('.area-add').append($('#formaddedu').html());
                              return false;
                          });
                        });
                      </script>

                      <!-- WORKING EXPERIENCES -->
                      <h3>Working Experiences</h3>
                      <div>
                          <div class="inner row">
                           <div class="col-md-12">
                            <!-- COMPANY FORM -->
                            <fieldset>
                              <legend>COMPANY</legend>
                                <?php $i = 1;foreach ($experiences as $experience):

?>
                                <div id="area-add-company">
                                  <div class="form-group">
                                      <label for="company">Company Name</label>
                                      <input type="text" name="company[]" class="form-control" id="company" value="{{ $experience->company }}">
                                  </div>
                                  <div class="form-inline">
                                    <div class="form-group">
                                      <div class="form-group">
                                        <label for="startdate">Start Date</label>
                                        <input type="text" name="startdate[]" class="form-control" id="startdate" value="{{ $experience->year_start }}">
                                      </div>
                                      <div class="form-group">
                                        <label for="enddate">End Date</label>
                                        <input type="text" name="enddate[]" class="form-control" id="enddate" value="{{ $experience->year_end }}">
                                      </div>
                                    </div>
                                  </div>
                                  <br>
                                    <div class="form-group">
                                      <label for="position">Position</label>
                                      <input type="text" name="position[]" class="form-control" id="position" value="{{ $experience->position }}">
                                    </div>
                                    <!-- <div class="form-group">
                                      <input type="button" id="addPosition" name="addPosition" value="ADD">
                                    </div> -->
                                  <br>
                                  <div class="form-group">
                                    <label for="mainduties">Main Duties</label>
                                    <TEXTAREA name="mainduties[]" id="mainduties" rows="5" class="form-control">{{ $experience->main_duties }}</TEXTAREA>
                                  </div>
                                  <div class="form-group">
                                    <input type="button" id="removeCompany" name="removeCompany" value="REMOVE" class="btn btn-success removeCompany" style="visibility:hidden">
                                  </div>
                                </div>
                                <?php
$i++;
endforeach;?>
                              <input type="button" id="addCompany" name="addCompany" value="ADD MORE COMPANY" class="btn btn-success">
                            </fieldset>

                              <div id="addcompany">

                              </div>

                          </div>
                         </div>
                      </div>

                      <h3>Taken Project</h3>
                            <div>
                                <div class="inner row">
                                 <div class="col-md-12">
                                    <fieldset>
                                      <legend>PROJECT</legend>
                                      @foreach($taken_projects as $project)
                                      <div id="area-add-project">
                                          <div class="form-group">
                                            <label for="projectname">Project Name</label>
                                            <input type="text" name="projectname[]" class="form-control" id="projectname" value="{{ $project->project_name }}">
                                          </div>
                                          <div class="form-group">
                                            <label for="customername">Customer Name</label>
                                            <input type="text" name="customername[]" class="form-control" id="customername" value="{{ $project->customer_name }}">
                                          </div>
                                          <div class="form-group">
                                            <label for="role">Role</label>
                                            <input type="text" name="role[]" class="form-control" id="role" value="{{ $project->role }}">
                                          </div>
                                          <div class="form-group">
                                            <label for="numberpeople">Number People</label>
                                            <input type="text" name="numberpeople[]" class="form-control" id="numberpeople" value="{{ $project->number_people }}">
                                          </div>
                                          <div class="form-group">
                                            <label for="projectdescription">Project Description</label>
                                            <TEXTAREA name="projectdescription[]" id="projectdescription" rows="5" class="form-control">{{ $project->project_description }}</TEXTAREA>
                                          </div>
                                          <div class="form-group">
                                            <label for="projectperiod">Project Period</label>
                                            <input type="text" name="projectperiod[]" class="form-control" id="projectperiod" value="{{ $project->project_period }}">
                                          </div>
                                          <div class="form-group">
                                            <label for="skillset">Skill Set</label>
                                            <input type="text" name="skillset[]" class="form-control" id="skillset" value="{{ $project->skill_set_ultilized }}">
                                          </div>
                                          <div class="form-group">
                                            <input type="button" id="removeProject" name="removeProject" value="REMOVE" class="btn btn-success removeProject" style="visibility:hidden">
                                          </div>
                                      </div>

                                      @endforeach()

                                      <input type="button" id="addProject" name="" value="ADD MORE PROJECT" class="btn btn-success center-block">
                                    </fieldset>

                                    <div id="addproject">

                                    </div>

                                  </div>
                                </div>
                              </div>
                    </div>

                    <div class="footer-tabs row">
                      <div class="col-md-8"></div>
                      <div class="col-md-4">
                        <button class='btn btn-primary btn-save'>Save</button>
                        <a class='btn btn-danger cancel' href="#">Cancel</a>
                      </div>
                    </div>
                    </form> <!-- close form -->
                </div><!-- /.box-body -->
                <script type="text/javascript">
                  $(document).ready(function(){
                    $(".content-inner").accTabs();
                  });
                </script>

              </div>
            </div>
          </div>
</section>
</div>

<!-- FORM ADD EDUCATION : DISPLAY NONE -->
<div id="formaddedu" style="display:none">
  <div class="groupedu">
       <div class="row">
          <div class="col-md-4">
            <div class="row">
              <div class="col-md-6">
                <label>Year Start</label>
                <input name="edu_yearstart[]" value="" class="form-control"/>
              </div>
              <div class="col-md-6">
                <label>Year End</label>
                <input name="edu_yearend[]" value="" class="form-control"/>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <label>Description</label>
            <textarea name="edu_description[]" class="form-control"></textarea>
          </div>
          <div class="col-md-4">
            <label>Certificate</label>
            <input name="certificate[]" value="" class="form-control"/>
          </div>
       </div>
       <div class="row">
         <div class="col-md-10"><p></p></div>
         <a href="#" class="btn btn-danger col-md-1 delete_edu">Delete</a>
         <div class="col-md-1"><p></p></div>
       </div>
  </div>
</div>
@stop