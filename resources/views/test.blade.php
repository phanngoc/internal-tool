<!DOCTYPE HTML>
<html>
    
    </head>
    <body >
      <div >
        <div >
          <center><img 
                      src="{!!Asset('avatar/image003.png')!!}" v:shapes="Picture_x0020_3" height="120" width="150" ></center>
          <p >
            <span>
          
              CURRICULUM
              VITAE
              <o:p></o:p>
            </span>
          </p>
          <p >
            <o:p>&nbsp;</o:p>
          </p>
          <table >
            <tr >
              <td >
                <p >
                  <b >
                    <span >
                      PERSONAL INFORMATION
                      <o:p></o:p>
                    </span>
                  </b>
                </p>
              </td>
            </tr>
            <tr >
              <td >
                <p >
                  <span >
                    Full
                    name
                    <o:p></o:p>
                  </span>
                </p>
              </td>
              <td >
                <p >
                  <span >
                {!!$employee->lastname!!} {!!$employee->firstname!!} 
                    <o:p></o:p>
                  </span>
                </p>
              </td>
              <td >
                <p >
                  <span >
                    Gender
                    <o:p></o:p>
                  </span>
                </p>
              </td>
              <td >
                <p >
                   {!!$employee->gender == '0' ? 'Female' : 'Male'!!} 
                    <o:p></o:p>
                  </span>
                </p>
              </td>
              <td >
                <p >
                  <span
                    >
                   <![if !vml]><img width=78 height=100
                      src="{!!Asset('avatar/'.$employee->avatar)!!}" v:shapes="Picture_x0020_3"><![endif]>
                  </span>
                
                  <span
                    >
                    <o:p></o:p>
                  </span>
                </p>
              </td>
            </tr>
            <tr>
              <td >
                <p >
                  <span >
                    Date
                    of birth
                    <o:p></o:p>
                  </span>
                </p>
              </td>
              <td >
                <p >
                  <span >
                    {!!date_format(new DateTime($employee->date_of_birth), "d/m/Y")!!}
                    <o:p></o:p>
                  </span>
                </p>
              </td>
              <td >
                  <span >
                    Nationality
                    <o:p></o:p>
                  </span>
                </p>
              </td>
              <td >
                  <span >
                 {!! $employee->nationalitys->name!!}
                    <o:p></o:p>
                  </span>
                </p>
              </td>
            </tr>
            <tr >
              <td >
                <p >
                  <span >
                    Email
                    <o:p></o:p>
                  </span>
                </p>
              </td>
              <td >
                <p >
                  <span >
                       {!! $employee->email!!}
                    <o:p></o:p>
                  </span>
                </p>
              </td>
              <td >
                <p >
                  <span >
                    Phone
                    <o:p></o:p>
                  </span>
                </p>
              </td>
              <td >
                <p >
                  <span >
                       {!! $employee->phone!!}
                    <o:p></o:p>
                  </span>
                </p>
              </td>
            </tr>
            <tr >
              <td >
                <p >
                  <span >
                    Address
                    <o:p></o:p>
                  </span>
                </p>
              </td>
              <td >
                  <span >
                      {!! $employee->address!!}
                    <o:p></o:p>
                  </span>
                </p>
              </td>
              <td >
                  <span >
                    <o:p>&nbsp;</o:p>
                  </span>
                </p>
              </td>
              <td >
                    <o:p>&nbsp;</o:p>
                  </span>
                </p>
              </td>
            </tr>
          </table>
          <p class=MsoNormal>
            <o:p>&nbsp;</o:p>
          </p>
          <table class=MsoNormalTable border=1 cellspacing=0 cellpadding=0
            style='border-collapse:collapse;border:none;mso-border-alt:solid #D9D9D9 .5pt;
            mso-yfti-tbllook:1184;mso-padding-alt:0in 5.4pt 0in 5.4pt;mso-border-insideh:
            .5pt solid #D9D9D9;mso-border-insidev:.5pt solid #D9D9D9'>
            <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
              <td width=657 colspan=2 valign=top style='width:492.75pt;border:solid #C2D69B 1.0pt;
                background:#4CA702;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0in;
                  margin-bottom:6.0pt;margin-left:0in;text-align:center'>
                  <b style='mso-bidi-font-weight:
                    normal'>
                    <span style='font-size:10.0pt;font-family:"Arial","sans-serif";
                      color:white'>
                      EDUCATION
                      <o:p></o:p>
                    </span>
                  </b>
                </p>
              </td>
            </tr>
           <?php
foreach ($educations as $key => $value) {
  ?>
            <tr style='mso-yfti-irow:1'>
              <td width=92 valign=top style='width:69.2pt;border:solid #D9D9D9 1.0pt;
                border-top:none;mso-border-top-alt:solid #C2D69B 1.0pt;mso-border-alt:solid #D9D9D9 .5pt;
                mso-border-top-alt:solid #C2D69B 1.0pt;background:#F2F2F2;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                       {!! $value->year_start!!}-{!! $value->year_end!!}
                    <o:p></o:p>
                  </span>
                </p>
              </td>
              <td width=565 valign=top style='width:423.55pt;border-top:none;border-left:
                none;border-bottom:solid #D9D9D9 1.0pt;border-right:solid #D9D9D9 1.0pt;
                mso-border-top-alt:solid #C2D69B 1.0pt;mso-border-left-alt:solid #D9D9D9 .5pt;
                mso-border-alt:solid #D9D9D9 .5pt;mso-border-top-alt:solid #C2D69B 1.0pt;
                padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                      {!! $value->education!!}
                    <o:p></o:p>
                  </span>
                </p>
              </td>
            </tr>
                <?php }
                 ?>


         
          </table>
          <p class=MsoNormal>
            <o:p>&nbsp;</o:p>
          </p>
          <table class=MsoNormalTable border=1 cellspacing=0 cellpadding=0
            style='border-collapse:collapse;border:none;mso-border-alt:solid #D9D9D9 .5pt;
            mso-yfti-tbllook:1184;mso-padding-alt:0in 5.4pt 0in 5.4pt;mso-border-insideh:
            .5pt solid #D9D9D9;mso-border-insidev:.5pt solid #D9D9D9'>
            <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
              <td width=657 colspan=2 valign=top style='width:492.75pt;border:solid #C2D69B 1.0pt;
                background:#4CA702;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0in;
                  margin-bottom:6.0pt;margin-left:0in;text-align:center'>
                  <b style='mso-bidi-font-weight:
                    normal'>
                    <span style='font-size:10.0pt;font-family:"Arial","sans-serif";
                      color:white'>
                      SKILLS
                      <o:p></o:p>
                    </span>
                  </b>
                </p>
              </td>
            </tr>
            <?php
            foreach ($category_skill as $key => $value1){
              ?>

            <tr style='mso-yfti-irow:1'>
              <td width=177 valign=top style='width:133.0pt;border:solid #D9D9D9 1.0pt;
                border-top:none;mso-border-top-alt:solid #C2D69B 1.0pt;mso-border-alt:solid #D9D9D9 .5pt;
                mso-border-top-alt:solid #C2D69B 1.0pt;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                   {!!$value1->category_name!!}
                  
                      <o:p></o:p>
                    </span>
                  </span>
                </p>
              </td>
              <td width=480 valign=top style='width:359.75pt;border-top:none;border-left:
                none;border-bottom:solid #D9D9D9 1.0pt;border-right:solid #D9D9D9 1.0pt;
                mso-border-top-alt:solid #C2D69B 1.0pt;mso-border-left-alt:solid #D9D9D9 .5pt;
                mso-border-alt:solid #D9D9D9 .5pt;mso-border-top-alt:solid #C2D69B 1.0pt;
                padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                   <?php
                   foreach ($employee_skills as $key => $value) {
                    if ($value->skill->category_id==$value1->id){
                    ?>  
                        
                        {!!$value->skill->skill!!}({!!$value->month_experience!!} tháng),

                   

                   <?php }}

                   ?>
                  
                    
                    
                    
                    <o:p></o:p>
                  </span>
                </p>
              </td>
            </tr>

           <?php }
                 ?>
            
            <tr style='mso-yfti-irow:6;mso-yfti-lastrow:yes'>
              <td width=177 valign=top style='width:133.0pt;border:solid #D9D9D9 1.0pt;
                border-top:none;mso-border-top-alt:solid #D9D9D9 .5pt;mso-border-alt:solid #D9D9D9 .5pt;
                padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                    <o:p>&nbsp;</o:p>
                  </span>
                </p>
              </td>
              <td width=480 valign=top style='width:359.75pt;border-top:none;border-left:
                none;border-bottom:solid #D9D9D9 1.0pt;border-right:solid #D9D9D9 1.0pt;
                mso-border-top-alt:solid #D9D9D9 .5pt;mso-border-left-alt:solid #D9D9D9 .5pt;
                mso-border-alt:solid #D9D9D9 .5pt;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                    <o:p>&nbsp;</o:p>
                  </span>
                </p>
              </td>
            </tr>
          </table>
          <p class=MsoNormal>
            <o:p>&nbsp;</o:p>
          </p>
          <table class=MsoNormalTable border=1 cellspacing=0 cellpadding=0
            style='border-collapse:collapse;border:none;mso-border-alt:solid #D9D9D9 .5pt;
            mso-yfti-tbllook:1184;mso-padding-alt:0in 5.4pt 0in 5.4pt;mso-border-insideh:
            .5pt solid #D9D9D9;mso-border-insidev:.5pt solid #D9D9D9'>
            <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
              <td width=657 colspan=8 valign=top style='width:492.75pt;border:solid #C2D69B 1.0pt;
                background:#4CA702;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0in;
                  margin-bottom:6.0pt;margin-left:0in;text-align:center'>
                  <b style='mso-bidi-font-weight:
                    normal'>
                    <span style='font-size:10.0pt;font-family:"Arial","sans-serif";
                      color:white'>
                      TAKEN PROJECTS
                      <o:p></o:p>
                    </span>
                  </b>
                </p>
              </td>
            </tr>
            <?php 
            foreach ($taken_projects as $key => $value) {
              ?>
              
            
            <tr style='mso-yfti-irow:1'>
              <td width=177 colspan=2 valign=top style='width:133.0pt;border:solid #D9D9D9 1.0pt;
                border-top:none;mso-border-top-alt:solid #C2D69B 1.0pt;mso-border-alt:solid #D9D9D9 .5pt;
                mso-border-top-alt:solid #C2D69B 1.0pt;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                    Project
                    ‘s name
                    <o:p></o:p>
                  </span>
                </p>
              </td>
              <td width=189 colspan=2 valign=top style='width:141.75pt;border-top:none;
                border-left:none;border-bottom:solid #D9D9D9 1.0pt;border-right:solid #D9D9D9 1.0pt;
                mso-border-top-alt:solid #C2D69B 1.0pt;mso-border-left-alt:solid #D9D9D9 .5pt;
                mso-border-alt:solid #D9D9D9 .5pt;mso-border-top-alt:solid #C2D69B 1.0pt;
                padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <b style='mso-bidi-font-weight:normal'><span
                    style='font-size:10.0pt;font-family:"Arial","sans-serif"'>{!!$value->project_name!!}</span></b>
                  <span
                    style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                    <o:p></o:p>
                  </span>
                </p>
              </td>
              <td width=131 colspan=2 valign=top style='width:98.05pt;border-top:none;
                border-left:none;border-bottom:solid #D9D9D9 1.0pt;border-right:solid #D9D9D9 1.0pt;
                mso-border-top-alt:solid #C2D69B 1.0pt;mso-border-left-alt:solid #D9D9D9 .5pt;
                mso-border-alt:solid #D9D9D9 .5pt;mso-border-top-alt:solid #C2D69B 1.0pt;
                padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                    Customer’s
                    name
                    <o:p></o:p>
                  </span>
                </p>
              </td>
              <td width=160 colspan=2 valign=top style='width:119.95pt;border-top:none;
                border-left:none;border-bottom:solid #D9D9D9 1.0pt;border-right:solid #D9D9D9 1.0pt;
                mso-border-top-alt:solid #C2D69B 1.0pt;mso-border-left-alt:solid #D9D9D9 .5pt;
                mso-border-alt:solid #D9D9D9 .5pt;mso-border-top-alt:solid #C2D69B 1.0pt;
                padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                    {!!$value->customer_name!!}
                    <o:p></o:p>
                  </span>
                </p>
              </td>
            </tr>
            <tr style='mso-yfti-irow:2'>
              <td width=177 colspan=2 valign=top style='width:133.0pt;border:solid #D9D9D9 1.0pt;
                border-top:none;mso-border-top-alt:solid #D9D9D9 .5pt;mso-border-alt:solid #D9D9D9 .5pt;
                padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                    Role
                    <o:p></o:p>
                  </span>
                </p>
              </td>
              <td width=189 colspan=2 valign=top style='width:141.75pt;border-top:none;
                border-left:none;border-bottom:solid #D9D9D9 1.0pt;border-right:solid #D9D9D9 1.0pt;
                mso-border-top-alt:solid #D9D9D9 .5pt;mso-border-left-alt:solid #D9D9D9 .5pt;
                mso-border-alt:solid #D9D9D9 .5pt;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                      {!!$value->role!!}
                    <o:p></o:p>
                  </span>
                </p>
              </td>
              <td width=131 colspan=2 valign=top style='width:98.05pt;border-top:none;
                border-left:none;border-bottom:solid #D9D9D9 1.0pt;border-right:solid #D9D9D9 1.0pt;
                mso-border-top-alt:solid #D9D9D9 .5pt;mso-border-left-alt:solid #D9D9D9 .5pt;
                mso-border-alt:solid #D9D9D9 .5pt;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                    Number
                    of people in project
                    <o:p></o:p>
                  </span>
                </p>
              </td>
              <td width=160 colspan=2 valign=top style='width:119.95pt;border-top:none;
                border-left:none;border-bottom:solid #D9D9D9 1.0pt;border-right:solid #D9D9D9 1.0pt;
                mso-border-top-alt:solid #D9D9D9 .5pt;mso-border-left-alt:solid #D9D9D9 .5pt;
                mso-border-alt:solid #D9D9D9 .5pt;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                      {!!$value->number_people!!}
                    <o:p></o:p>
                  </span>
                </p>
              </td>
            </tr>
            <tr style='mso-yfti-irow:3'>
              <td width=177 colspan=2 valign=top style='width:133.0pt;border:solid #D9D9D9 1.0pt;
                border-top:none;mso-border-top-alt:solid #D9D9D9 .5pt;mso-border-alt:solid #D9D9D9 .5pt;
                padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                    Project
                    description
                    <o:p></o:p>
                  </span>
                </p>
              </td>
              <td width=480 colspan=6 valign=top style='width:359.75pt;border-top:none;
                border-left:none;border-bottom:solid #D9D9D9 1.0pt;border-right:solid #D9D9D9 1.0pt;
                mso-border-top-alt:solid #D9D9D9 .5pt;mso-border-left-alt:solid #D9D9D9 .5pt;
                mso-border-alt:solid #D9D9D9 .5pt;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                       {!!$value->project_description!!}
                    <o:p></o:p>
                  </span>
                </p>
              </td>
            </tr>
            <tr style='mso-yfti-irow:4'>
              <td width=177 colspan=2 valign=top style='width:133.0pt;border:solid #D9D9D9 1.0pt;
                border-top:none;mso-border-top-alt:solid #D9D9D9 .5pt;mso-border-alt:solid #D9D9D9 .5pt;
                padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in;tab-stops:center 61.1pt'>
                  <span style='font-size:10.0pt;
                    font-family:"Arial","sans-serif"'>
                    Project period
                    <o:p></o:p>
                  </span>
                </p>
              </td>
              <td width=480 colspan=6 valign=top style='width:359.75pt;border-top:none;
                border-left:none;border-bottom:solid #D9D9D9 1.0pt;border-right:solid #D9D9D9 1.0pt;
                mso-border-top-alt:solid #D9D9D9 .5pt;mso-border-left-alt:solid #D9D9D9 .5pt;
                mso-border-alt:solid #D9D9D9 .5pt;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                      {!!$value->project_period!!}
                    <o:p></o:p>
                  </span>
                </p>
              </td>
            </tr>
            <tr style='mso-yfti-irow:5'>
              <td width=177 colspan=2 valign=top style='width:133.0pt;border-top:none;
                border-left:solid #D9D9D9 1.0pt;border-bottom:solid #4CA702 1.5pt;border-right:
                solid #D9D9D9 1.0pt;mso-border-top-alt:solid #D9D9D9 .5pt;mso-border-alt:
                solid #D9D9D9 .5pt;mso-border-bottom-alt:solid #4CA702 1.5pt;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                    Skill
                    set utilized
                    <o:p></o:p>
                  </span>
                </p>
              </td>
              <td width=480 colspan=6 valign=top style='width:359.75pt;border-top:none;
                border-left:none;border-bottom:solid #4CA702 1.5pt;border-right:solid #D9D9D9 1.0pt;
                mso-border-top-alt:solid #D9D9D9 .5pt;mso-border-left-alt:solid #D9D9D9 .5pt;
                mso-border-alt:solid #D9D9D9 .5pt;mso-border-bottom-alt:solid #4CA702 1.5pt;
                padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                       {!!$value->skill_set_ultilized!!}
                    <o:p></o:p>
                  </span>
                </p>
              </td>
            </tr>
            <?php }
            ?>
            <![if !supportMisalignedColumns]>
            <tr height=0>
              <td width=172 style='border:none'></td>
              <td width=6 style='border:none'></td>
              <td width=178 style='border:none'></td>
              <td width=11 style='border:none'></td>
              <td width=117 style='border:none'></td>
              <td width=14 style='border:none'></td>
              <td width=141 style='border:none'></td>
              <td width=19 style='border:none'></td>
            </tr>
            <![endif]>
          </table>
          <p class=MsoNormal>
            <o:p>&nbsp;</o:p>
          </p>
          <table class=MsoNormalTable border=1 cellspacing=0 cellpadding=0
            style='border-collapse:collapse;border:none;mso-border-alt:solid #D9D9D9 .5pt;
            mso-yfti-tbllook:1184;mso-padding-alt:0in 5.4pt 0in 5.4pt;mso-border-insideh:
            .5pt solid #D9D9D9;mso-border-insidev:.5pt solid #D9D9D9'>
            <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
              <td width=657 colspan=3 valign=top style='width:492.75pt;border:solid #C2D69B 1.0pt;
                background:#4CA702;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0in;
                  margin-bottom:6.0pt;margin-left:0in;text-align:center'>
                  <b style='mso-bidi-font-weight:
                    normal'>
                    <span style='font-size:10.0pt;font-family:"Arial","sans-serif";
                      color:white'>
                      WORKING EXPERIENCE
                      <o:p></o:p>
                    </span>
                  </b>
                </p>
              </td>
            </tr>
            <?php
            foreach ($experiences as $key => $value) {
              ?>
             
            

            <tr style='mso-yfti-irow:1'>
              <td width=121 valign=top style='width:90.9pt;border:solid #D9D9D9 1.0pt;
                border-top:none;mso-border-top-alt:solid #C2D69B 1.0pt;mso-border-alt:solid #D9D9D9 .5pt;
                mso-border-top-alt:solid #C2D69B 1.0pt;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                    Company
                    <o:p></o:p>
                  </span>
                </p>
              </td>
              <td width=402 valign=top style='width:301.5pt;border-top:none;border-left:
                none;border-bottom:solid #D9D9D9 1.0pt;border-right:solid #D9D9D9 1.0pt;
                mso-border-top-alt:solid #C2D69B 1.0pt;mso-border-left-alt:solid #D9D9D9 .5pt;
                mso-border-alt:solid #D9D9D9 .5pt;mso-border-top-alt:solid #C2D69B 1.0pt;
                padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                 {!!$value->company!!}
                    <o:p></o:p>
                  </span>
                </p>
              </td>
              <td width=134 valign=top style='width:100.35pt;border:none;border-right:solid #D9D9D9 1.0pt;
                mso-border-top-alt:solid #C2D69B 1.0pt;mso-border-left-alt:solid #D9D9D9 .5pt;
                mso-border-top-alt:solid #C2D69B 1.0pt;mso-border-left-alt:solid #D9D9D9 .5pt;
                mso-border-right-alt:solid #D9D9D9 .5pt;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal align=right style='margin-top:6.0pt;margin-right:0in;
                  margin-bottom:6.0pt;margin-left:0in;text-align:right'>
                  <span style='font-size:
                    10.0pt;font-family:"Arial","sans-serif"'>
                   {!!date_format(new DateTime($value->year_start), "d/m/Y")!!}- {!!date_format(new DateTime($value->year_end), "d/m/Y")!!}
                    <o:p></o:p>
                  </span>
                </p>
              </td>
            </tr>
            <tr style='mso-yfti-irow:2'>
              <td width=121 valign=top style='width:90.9pt;border:solid #D9D9D9 1.0pt;
                border-top:none;mso-border-top-alt:solid #D9D9D9 .5pt;mso-border-alt:solid #D9D9D9 .5pt;
                padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                    Position
                    <o:p></o:p>
                  </span>
                </p>
              </td>
              <td width=536 colspan=2 valign=top style='width:401.85pt;border-top:none;
                border-left:none;border-bottom:solid #D9D9D9 1.0pt;border-right:solid #D9D9D9 1.0pt;
                mso-border-top-alt:solid #D9D9D9 .5pt;mso-border-left-alt:solid #D9D9D9 .5pt;
                mso-border-alt:solid #D9D9D9 .5pt;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                    {!!$value->position!!}
                    <o:p></o:p>
                  </span>
                </p>
              </td>
            </tr>
            <tr style='mso-yfti-irow:3;mso-yfti-lastrow:yes'>
              <td width=121 valign=top style='width:90.9pt;border-top:none;border-left:
                solid #D9D9D9 1.0pt;border-bottom:solid #4CA702 1.5pt;border-right:solid #D9D9D9 1.0pt;
                mso-border-top-alt:solid #D9D9D9 .5pt;mso-border-alt:solid #D9D9D9 .5pt;
                mso-border-bottom-alt:solid #4CA702 1.5pt;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                    Main
                    duties
                    <o:p></o:p>
                  </span>
                </p>
              </td>
              <td width=536 colspan=2 valign=top style='width:401.85pt;border-top:none;
                border-left:none;border-bottom:solid #4CA702 1.5pt;border-right:solid #D9D9D9 1.0pt;
                mso-border-top-alt:solid #D9D9D9 .5pt;mso-border-left-alt:solid #D9D9D9 .5pt;
                mso-border-alt:solid #D9D9D9 .5pt;mso-border-bottom-alt:solid #4CA702 1.5pt;
                padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoListParagraphCxSpFirst style='margin-top:6.0pt;margin-right:0in;
                  margin-bottom:6.0pt;margin-left:.75in;mso-add-space:auto;text-indent:-.5in;
                  mso-list:l4 level1 lfo9'>
                  <![if !supportLists]><span style='font-size:10.0pt;
                    font-family:"Arial","sans-serif";mso-fareast-font-family:Arial'><span
                    style='mso-list:Ignore'>-<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  </span></span></span><![endif]>
                  <span style='font-size:10.0pt;font-family:
                    "Arial","sans-serif"'>  {!!$value->main_duties!!}
                    <o:p></o:p>
                  </span>
                </p>
               
              </td>
            </tr>
            <?php }
            ?>
          </table>
          <p class=MsoNormal>
            <o:p>&nbsp;</o:p>
          </p>
          <table class=MsoNormalTable border=1 cellspacing=0 cellpadding=0
            style='border-collapse:collapse;border:none;mso-border-alt:solid #D9D9D9 .5pt;
            mso-yfti-tbllook:1184;mso-padding-alt:0in 5.4pt 0in 5.4pt;mso-border-insideh:
            .5pt solid #D9D9D9;mso-border-insidev:.5pt solid #D9D9D9'>
            <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
              <td width=657 valign=top style='width:492.75pt;border:solid #C2D69B 1.0pt;
                background:#4CA702;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0in;
                  margin-bottom:6.0pt;margin-left:0in;text-align:center'>
                  <b style='mso-bidi-font-weight:
                    normal'>
                    <span style='font-size:10.0pt;font-family:"Arial","sans-serif";
                      color:white'>
                      CAREER OBJECTIVE
                      <o:p></o:p>
                    </span>
                  </b>
                </p>
              </td>
            </tr>
            <tr style='mso-yfti-irow:1;mso-yfti-lastrow:yes'>
              <td width=657 valign=top style='width:492.75pt;border:solid #D9D9D9 1.0pt;
                border-top:none;mso-border-top-alt:solid #C2D69B 1.0pt;mso-border-alt:solid #D9D9D9 .5pt;
                mso-border-top-alt:solid #C2D69B 1.0pt;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoListParagraphCxSpFirst style='margin-top:6.0pt;margin-right:0in;
                  margin-bottom:6.0pt;margin-left:.75in;mso-add-space:auto;text-indent:-.5in;
                  mso-list:l4 level1 lfo9'>
                  <![if !supportLists]><span style='font-size:10.0pt;
                    font-family:"Arial","sans-serif";mso-fareast-font-family:Arial'><span
                    style='mso-list:Ignore'>-<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  </span></span></span><![endif]>
                  <span style='font-size:10.0pt;font-family:
                    "Arial","sans-serif"'>
                    {!!$employee->career_objective!!}
                    <o:p></o:p>
                  </span>
                </p>
              
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                    <o:p>&nbsp;</o:p>
                  </span>
                </p>
              </td>
            </tr>
          </table>
          <p class=MsoNormal>
            <o:p>&nbsp;</o:p>
          </p>
          <table class=MsoNormalTable border=1 cellspacing=0 cellpadding=0
            style='border-collapse:collapse;border:none;mso-border-alt:solid #D9D9D9 .5pt;
            mso-yfti-tbllook:1184;mso-padding-alt:0in 5.4pt 0in 5.4pt;mso-border-insideh:
            .5pt solid #D9D9D9;mso-border-insidev:.5pt solid #D9D9D9'>
            
            <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
              <td width=657 valign=top style='width:492.75pt;border:solid #C2D69B 1.0pt;
                background:#4CA702;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0in;
                  margin-bottom:6.0pt;margin-left:0in;text-align:center'>
                  <b style='mso-bidi-font-weight:
                    normal'>
                    <span style='font-size:10.0pt;font-family:"Arial","sans-serif";
                      color:white'>
                      HOBBY
                      <o:p></o:p>
                    </span>
                  </b>
                </p>
              </td>
            </tr>
            <tr style='mso-yfti-irow:1;mso-yfti-lastrow:yes'>
              <td width=657 valign=top style='width:492.75pt;border:solid #D9D9D9 1.0pt;
                border-top:none;mso-border-top-alt:solid #C2D69B 1.0pt;mso-border-alt:solid #D9D9D9 .5pt;
                mso-border-top-alt:solid #C2D69B 1.0pt;padding:0in 5.4pt 0in 5.4pt'>
               
                <p class=MsoListParagraphCxSpFirst style='margin-top:6.0pt;margin-right:0in;
                  margin-bottom:6.0pt;margin-left:.75in;mso-add-space:auto;text-indent:-.5in;

                  mso-list:l4 level1 lfo9'>
                  <![if !supportLists]><span style='font-size:10.0pt;
                    font-family:"Arial","sans-serif";mso-fareast-font-family:Arial'><span
                    style='mso-list:Ignore'>-<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  </span></span></span><![endif]>
                  <span style='font-size:10.0pt;font-family:
                    "Arial","sans-serif"'>
                    {!!$employee->hobbies!!}
                    <o:p></o:p>
                  </span>
                </p>

              
                
              </td>
            </tr>
          </table>
          <p class=MsoNormal>
            <o:p>&nbsp;</o:p>
          </p>
          <p class=MsoNormal>
            <o:p>&nbsp;</o:p>
          </p>
        </div>
      </div>
    </body>
  </html>