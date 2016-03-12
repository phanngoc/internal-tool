
<!DOCTYPE html>

<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
      body { font-family: DejaVu Sans, sans-serif; }
    </style>


    <head>
      <meta charset="UTF-8">

      <link rel=File-List href="{!!Asset('cv/filelist.xml')!!}">
      <link rel=Edit-Time-Data href="{!!Asset('cv/editdata.mso')!!}">
      <link rel=dataStoreItem href="{!!Asset('cv/item0001.xml')!!} "
        target="{!!Asset('cv/props002.xml')!!}">
      <link rel=themeData href="{!!Asset('cv/themedata.thmx')!!}">
      <link rel=colorSchemeMapping
        href="{!!Asset('cv/colorschememapping.xml')!!}">


    </head>
    <body >
      <div style='align:center'id="wrapper">
        <div class=WordSection1>
          <center><img
                      src="{!!Asset('cv/company.png')!!}" v:shapes="Picture_x0020_3" height="120" width="150" ></center>
          <p class=MsoNormal align=center style='text-align:center'>
            <span
              style='font-size:16.0pt;mso-bidi-font-size:10.0pt;font-family:"Arial","sans-serif"'>
              CURRICULUM
              VITAE
              <o:p></o:p>
            </span>
          </p>
          <p class=MsoNormal>
            <o:p>&nbsp;</o:p>
          </p>
          <table style="width:100%">
            <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
              <td width=657 colspan=5 valign=top style='width:492.75pt;border:solid #C2D69B 1.0pt;
                mso-border-alt:solid #C2D69B .5pt;background:#4CA702;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0in;
                  margin-bottom:6.0pt;margin-left:0in;text-align:center'>
                  <b style='mso-bidi-font-weight:
                    normal'>
                    <span style='font-size:10.0pt;font-family:"Arial","sans-serif";
                      color:white'>
                      PERSONAL INFORMATION
                      <o:p></o:p>
                    </span>
                  </b>
                </p>
              </td>
            </tr>
            <tr style='mso-yfti-irow:1'>
              <td width=92 valign=top style='width:69.2pt;border:solid #D9D9D9 1.0pt;
                border-top:none;mso-border-top-alt:solid #C2D69B .5pt;mso-border-alt:solid #D9D9D9 .5pt;
                mso-border-top-alt:solid #C2D69B .5pt;background:#F2F2F2;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                    Full
                    name
                    <o:p></o:p>
                  </span>
                </p>
              </td>
              <td width=171 valign=top style='width:127.9pt;border-top:none;border-left:
                none;border-bottom:solid #D9D9D9 1.0pt;border-right:solid #D9D9D9 1.0pt;
                mso-border-top-alt:solid #C2D69B .5pt;mso-border-left-alt:solid #D9D9D9 .5pt;
                mso-border-alt:solid #D9D9D9 .5pt;mso-border-top-alt:solid #C2D69B .5pt;
                padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt'>
                {!!$employee->lastname!!} {!!$employee->firstname!!}
                    <o:p></o:p>
                  </span>
                </p>
              </td>
              <td width=94 valign=top style='width:70.55pt;border-top:none;border-left:
                none;border-bottom:solid #D9D9D9 1.0pt;border-right:solid #D9D9D9 1.0pt;
                mso-border-top-alt:solid #C2D69B .5pt;mso-border-left-alt:solid #D9D9D9 .5pt;
                mso-border-alt:solid #D9D9D9 .5pt;mso-border-top-alt:solid #C2D69B .5pt;
                background:#F2F2F2;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                    Gender
                    <o:p></o:p>
                  </span>
                </p>
              </td>
              <td width=169 valign=top style='width:126.55pt;border-top:none;border-left:
                none;border-bottom:solid #D9D9D9 1.0pt;border-right:solid #D9D9D9 1.0pt;
                mso-border-top-alt:solid #C2D69B .5pt;mso-border-left-alt:solid #D9D9D9 .5pt;
                mso-border-alt:solid #D9D9D9 .5pt;mso-border-top-alt:solid #C2D69B .5pt;
                padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt'>
                   {!!$employee->gender == '0' ? 'Female' : 'Male'!!}
                    <o:p></o:p>
                  </span>
                </p>
              </td>
              <td width=131 rowspan=4 style='width:98.55pt;border-top:none;border-left:
                none;border-bottom:solid #D9D9D9 1.0pt;border-right:solid #D9D9D9 1.0pt;
                mso-border-top-alt:solid #C2D69B .5pt;mso-border-left-alt:solid #D9D9D9 .5pt;
                mso-border-alt:solid #D9D9D9 .5pt;mso-border-top-alt:solid #C2D69B .5pt;
                padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0in;
                  margin-bottom:6.0pt;margin-left:0in;text-align:center'>
                  <span
                    style='font-size:10.0pt;font-family:"Arial","sans-serif";mso-no-proof:yes'>
                   <![if !vml]>
                   <?php if ($employee->avatar == null) {?>
                                   <img width=78 height=100 src="{{ Asset('avatar/avatar-default.png') }}" style="border:1px solid black;" id="avatarimg" v:shapes="Picture_x0020_3" />
                                <?php } else {
	?>
                                   <img width=78 height=100 src="{{ Asset($employee->avatar) }}" style="border:1px solid black;" id="avatarimg" v:shapes="Picture_x0020_3" />
                                <?php
}
?>
                   <![endif]>
                  </span>

                  <span
                    style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                    <o:p></o:p>
                  </span>
                </p>
              </td>
            </tr>
            <tr style='mso-yfti-irow:2'>
              <td width=92 valign=top style='width:69.2pt;border:solid #D9D9D9 1.0pt;
                border-top:none;mso-border-top-alt:solid #D9D9D9 .5pt;mso-border-alt:solid #D9D9D9 .5pt;
                background:#F2F2F2;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                    Date
                    of birth
                    <o:p></o:p>
                  </span>
                </p>
              </td>
              <td width=171 valign=top style='width:127.9pt;border-top:none;border-left:
                none;border-bottom:solid #D9D9D9 1.0pt;border-right:solid #D9D9D9 1.0pt;
                mso-border-top-alt:solid #D9D9D9 .5pt;mso-border-left-alt:solid #D9D9D9 .5pt;
                mso-border-alt:solid #D9D9D9 .5pt;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                    {!!date_format(new DateTime($employee->date_of_birth), "d/m/Y")!!}
                    <o:p></o:p>
                  </span>
                </p>
              </td>
              <td width=94 valign=top style='width:70.55pt;border-top:none;border-left:
                none;border-bottom:solid #D9D9D9 1.0pt;border-right:solid #D9D9D9 1.0pt;
                mso-border-top-alt:solid #D9D9D9 .5pt;mso-border-left-alt:solid #D9D9D9 .5pt;
                mso-border-alt:solid #D9D9D9 .5pt;background:#F2F2F2;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                    Nationality
                    <o:p></o:p>
                  </span>
                </p>
              </td>
              <td width=169 valign=top style='width:126.55pt;border-top:none;border-left:
                none;border-bottom:solid #D9D9D9 1.0pt;border-right:solid #D9D9D9 1.0pt;
                mso-border-top-alt:solid #D9D9D9 .5pt;mso-border-left-alt:solid #D9D9D9 .5pt;
                mso-border-alt:solid #D9D9D9 .5pt;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt'>
                   <?php if ($employee->nationalitys == null) {?>
                     <?php echo "";?>
                   <?php } else {?>
                   <?php echo $employee->nationalitys->name;?>
                   <?php
}
?>
                    <o:p></o:p>
                  </span>
                </p>
              </td>
            </tr>
            <tr style='mso-yfti-irow:3'>
              <td width=92 valign=top style='width:69.2pt;border:solid #D9D9D9 1.0pt;
                border-top:none;mso-border-top-alt:solid #D9D9D9 .5pt;mso-border-alt:solid #D9D9D9 .5pt;
                background:#F2F2F2;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                    Email
                    <o:p></o:p>
                  </span>
                </p>
              </td>
              <td width=171 valign=top style='width:127.9pt;border-top:none;border-left:
                none;border-bottom:solid #D9D9D9 1.0pt;border-right:solid #D9D9D9 1.0pt;
                mso-border-top-alt:solid #D9D9D9 .5pt;mso-border-left-alt:solid #D9D9D9 .5pt;
                mso-border-alt:solid #D9D9D9 .5pt;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                       {!! $employee->email!!}
                    <o:p></o:p>
                  </span>
                </p>
              </td>
              <td width=94 valign=top style='width:70.55pt;border-top:none;border-left:
                none;border-bottom:solid #D9D9D9 1.0pt;border-right:solid #D9D9D9 1.0pt;
                mso-border-top-alt:solid #D9D9D9 .5pt;mso-border-left-alt:solid #D9D9D9 .5pt;
                mso-border-alt:solid #D9D9D9 .5pt;background:#F2F2F2;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                    Phone
                    <o:p></o:p>
                  </span>
                </p>
              </td>
              <td width=169 valign=top style='width:126.55pt;border-top:none;border-left:
                none;border-bottom:solid #D9D9D9 1.0pt;border-right:solid #D9D9D9 1.0pt;
                mso-border-top-alt:solid #D9D9D9 .5pt;mso-border-left-alt:solid #D9D9D9 .5pt;
                mso-border-alt:solid #D9D9D9 .5pt;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                       {!! $employee->phone!!}
                    <o:p></o:p>
                  </span>
                </p>
              </td>
            </tr>
            <tr style='mso-yfti-irow:4;mso-yfti-lastrow:yes'>
              <td width=92 valign=top style='width:69.2pt;border:solid #D9D9D9 1.0pt;
                border-top:none;mso-border-top-alt:solid #D9D9D9 .5pt;mso-border-alt:solid #D9D9D9 .5pt;
                background:#F2F2F2;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                    Address
                    <o:p></o:p>
                  </span>
                </p>
              </td>
              <td width=171 valign=top style='width:127.9pt;border-top:none;border-left:
                none;border-bottom:solid #D9D9D9 1.0pt;border-right:solid #D9D9D9 1.0pt;
                mso-border-top-alt:solid #D9D9D9 .5pt;mso-border-left-alt:solid #D9D9D9 .5pt;
                mso-border-alt:solid #D9D9D9 .5pt;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt'>
                      {!! $employee->address!!}
                    <o:p></o:p>
                  </span>
                </p>
              </td>
              <td width=94 valign=top style='width:70.55pt;border-top:none;border-left:
                none;border-bottom:solid #D9D9D9 1.0pt;border-right:solid #D9D9D9 1.0pt;
                mso-border-top-alt:solid #D9D9D9 .5pt;mso-border-left-alt:solid #D9D9D9 .5pt;
                mso-border-alt:solid #D9D9D9 .5pt;background:#F2F2F2;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                    <o:p>&nbsp;</o:p>
                  </span>
                </p>
              </td>
              <td width=169 valign=top style='width:126.55pt;border-top:none;border-left:
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
          <table style="width:100%" >
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
if (count($educations) == 0) {?>
            <tr style='mso-yfti-irow:1'>
              <td width=92 height=35 valign=top style='width:69.2pt;border:solid #D9D9D9 1.0pt;
                border-top:none;mso-border-top-alt:solid #C2D69B 1.0pt;mso-border-alt:solid #D9D9D9 .5pt;
                mso-border-top-alt:solid #C2D69B 1.0pt;background:#F2F2F2;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>

                    <o:p></o:p>
                  </span>
                </p>
              </td>
              <td width=565 height=35 valign=top style='width:423.55pt;border-top:none;border-left:
                none;border-bottom:solid #D9D9D9 1.0pt;border-right:solid #D9D9D9 1.0pt;
                mso-border-top-alt:solid #C2D69B 1.0pt;mso-border-left-alt:solid #D9D9D9 .5pt;
                mso-border-alt:solid #D9D9D9 .5pt;mso-border-top-alt:solid #C2D69B 1.0pt;
                padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>

                    <o:p></o:p>
                  </span>
                </p>
              </td>
            </tr>
            <tr style='mso-yfti-irow:1'>
              <td width=92 height=35 valign=top style='width:69.2pt;border:solid #D9D9D9 1.0pt;
                border-top:none;mso-border-top-alt:solid #C2D69B 1.0pt;mso-border-alt:solid #D9D9D9 .5pt;
                mso-border-top-alt:solid #C2D69B 1.0pt;background:#F2F2F2;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>

                    <o:p></o:p>
                  </span>
                </p>
              </td>
              <td width=565 height=35 valign=top style='width:423.55pt;border-top:none;border-left:
                none;border-bottom:solid #D9D9D9 1.0pt;border-right:solid #D9D9D9 1.0pt;
                mso-border-top-alt:solid #C2D69B 1.0pt;mso-border-left-alt:solid #D9D9D9 .5pt;
                mso-border-alt:solid #D9D9D9 .5pt;mso-border-top-alt:solid #C2D69B 1.0pt;
                padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>

                    <o:p></o:p>
                  </span>
                </p>
              </td>
            </tr>
            <?php
} else {

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
                  <span style='font-size:10.0pt'>
                      {!! $value->education!!}
                    <o:p></o:p>
                  </span>
                </p>
              </td>
            </tr>
                <?php }}
?>



          </table>
          <p class=MsoNormal>
            <o:p>&nbsp;</o:p>
          </p>
          <table align="center" style="width:100%">
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
foreach ($category_skill as $key => $value1) {
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
		if ($value->skill->category_id == $value1->id && $key != count($employee_skills) - 1) {
			?>

                        {!!$value->skill->skill!!}
                        <?php
if ($value->month_experience > 12) {
				$n = $value->month_experience / 12;
				$d = $value->month_experience % 12;
				echo "(" . round($n) . " year" . "," . " $d month)" . ",";
			} else {
				$m = $value->month_experience;
				echo "($m month),";
			}
			?>

                     <?php
} else if ($value->skill->category_id == $value1->id && $key == count($employee_skills) - 1) {
			?>
                             {!!$value->skill->skill!!}
                              <?php
if ($value->month_experience > 12) {
				$n = $value->month_experience / 12;
				$d = $value->month_experience % 12;
				echo "(" . round($n) . " year" . "," . " $d month)" . ".";
			} else {
				$m = $value->month_experience;
				echo "($m month).";
			}

			?>
                        <?php
}
	}

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

          <table style="width:100%">
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
if (count($taken_projects) == 0) {
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
                    style='font-size:10.0pt;font-family:"Arial","sans-serif"'></span></b>
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

                    <o:p></o:p>
                  </span>
                </p>
              </td>
            </tr>
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
                    style='font-size:10.0pt;font-family:"Arial","sans-serif"'></span></b>
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

                    <o:p></o:p>
                  </span>
                </p>
              </td>
            </tr>
            <?php
} else {
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
                  <span style='font-size:10.0pt'>
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
                  <span style='font-size:10.0pt'>
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
                  <span style='font-size:10.0pt'>
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
                  <span style='font-size:10.0pt'>
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
                  <span style='font-size:10.0pt'>
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
                  <span style='font-size:10.0pt'>
                       {!!$value->skill_set_ultilized!!}
                    <o:p></o:p>
                  </span>
                </p>
              </td>
            </tr>
            <?php }}
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
          <table style="width:100%">
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
if (count($experiences) == 0) {?>
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

                    <o:p></o:p>
                  </span>
                </p>
              </td>
                 <td width=134 valign=top style='width:301.5pt;border-top:none;border-left:
                none;border-bottom:solid #D9D9D9 1.0pt;border-right:solid #D9D9D9 1.0pt;
                mso-border-top-alt:solid #C2D69B 1.0pt;mso-border-left-alt:solid #D9D9D9 .5pt;
                mso-border-alt:solid #D9D9D9 .5pt;mso-border-top-alt:solid #C2D69B 1.0pt;
                padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>

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
                    style='mso-list:Ignore'><span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  </span></span></span><![endif]>
                  <span style='font-size:10.0pt;font-family:
                    "Arial","sans-serif"'>
                    <o:p></o:p>
                  </span>
                </p>

              </td>
            </tr>
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

                    <o:p></o:p>
                  </span>
                </p>
              </td>
                 <td width=134 valign=top style='width:301.5pt;border-top:none;border-left:
                none;border-bottom:solid #D9D9D9 1.0pt;border-right:solid #D9D9D9 1.0pt;
                mso-border-top-alt:solid #C2D69B 1.0pt;mso-border-left-alt:solid #D9D9D9 .5pt;
                mso-border-alt:solid #D9D9D9 .5pt;mso-border-top-alt:solid #C2D69B 1.0pt;
                padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>

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
                    style='mso-list:Ignore'><span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  </span></span></span><![endif]>
                  <span style='font-size:10.0pt;font-family:
                    "Arial","sans-serif"'>
                    <o:p></o:p>
                  </span>
                </p>

              </td>
            </tr>


              <?php
} else {
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
                  <span style='font-size:10.0pt'>
                 {!!$value->company!!}
                    <o:p></o:p>
                  </span>
                </p>
              </td>
                 <td width=134 valign=top style='width:301.5pt;border-top:none;border-left:
                none;border-bottom:solid #D9D9D9 1.0pt;border-right:solid #D9D9D9 1.0pt;
                mso-border-top-alt:solid #C2D69B 1.0pt;mso-border-left-alt:solid #D9D9D9 .5pt;
                mso-border-alt:solid #D9D9D9 .5pt;mso-border-top-alt:solid #C2D69B 1.0pt;
                padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
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
                  <span style='font-size:10.0pt'>
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
                    style='mso-list:Ignore'><span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  </span></span></span><![endif]>
                  <span style='font-size:10.0pt'>  {!!$value->main_duties!!}
                    <o:p></o:p>
                  </span>
                </p>

              </td>
            </tr>
            <?php }}
?>
          </table>
          <p class=MsoNormal>
            <o:p>&nbsp;</o:p>
          </p>
          <table style="width:100%">
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
                    style='mso-list:Ignore'><span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  </span></span></span><![endif]>
                  <span style='font-size:10.0pt'>
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
          <table style="width:100%">


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
                    style='mso-list:Ignore'><span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  </span></span></span><![endif]>
                  <span style='font-size:10.0pt'>
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
          <table style="width:100%">


            <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
              <td width=657 valign=top style='width:492.75pt;border:solid #C2D69B 1.0pt;
                background:#4CA702;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0in;
                  margin-bottom:6.0pt;margin-left:0in;text-align:center'>
                  <b style='mso-bidi-font-weight:
                    normal'>
                    <span style='font-size:10.0pt;font-family:"Arial","sans-serif";
                      color:white'>
                      ACHIEVEMENT AWARDS
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
                    style='mso-list:Ignore'><span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  </span></span></span><![endif]>
                  <span style='font-size:10.0pt'>
                    {!!$employee->achievement_awards!!}
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