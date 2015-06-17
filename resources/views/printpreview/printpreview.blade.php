<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <html xmlns:v="urn:schemas-microsoft-com:vml"
    xmlns:o="urn:schemas-microsoft-com:office:office"
    xmlns:w="urn:schemas-microsoft-com:office:word"
    xmlns:m="http://schemas.microsoft.com/office/2004/12/omml"
    xmlns="http://www.w3.org/TR/REC-html40">
    <head>
      <title>Print Preview  Page</title>
      <link rel="stylesheet" href="{!!Asset('bootstrap/css/print-preview.css')!!}" type="text/css" media="screen">
      <script src="{!!Asset('bootstrap/js/jquery.tools.min.js')!!}"></script>
      <script src="{!!Asset('bootstrap/js/jquery.print-preview.js')!!}" type="text/javascript" charset="utf-8"></script>
      <link rel=File-List href="{!!Asset('cv/filelist.xml')!!}">
      <link rel=Edit-Time-Data href="{!!Asset('cv/editdata.mso')!!}">
      <link rel=dataStoreItem href="{!!Asset('cv/item0001.xml')!!}"
        target="{!!Asset('cv/props002.xml')!!}">
      <link rel=themeData href="{!!Asset('cv/themedata.thmx')!!}">
      <link rel=colorSchemeMapping
        href="{!!Asset('cv/colorschememapping.xml')!!}">
      <script type="text/javascript">
        $(function() {
         
            // Add link for print preview and intialise
            $('#wrapper').prepend('<a class="print-preview">Print Preview</a>');
            $('.print-preview').click(function(){
              $("a").hide();
            });
           
            $('a.print-preview').printPreview();
            
            // Add keybinding (not recommended for production use)
            $(document).bind('keydown', function(e) {
                var code = (e.keyCode ? e.keyCode : e.which);
                if (code == 80 && !$('#print-modal').length) {
                    $.printPreview.loadPrintPreview();
                    return false;
                }            
            });
        });
      </script>
    </head>
    <body lang=EN-US link=blue vlink=purple style='tab-interval:.5in'>
      <div style='margin:0px 120px'id="wrapper">
        <div class=WordSection1>
          <center>
            <image src="{!!Asset('cv/image003.png')!!}" height="120" width="150">
          </center>
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
          <table class=MsoNormalTable border=1 cellspacing=0  cellpadding=0
            style='border-collapse:collapse;border:none;mso-border-alt:solid #D9D9D9 .5pt;
            mso-yfti-tbllook:1184;mso-padding-alt:0in 5.4pt 0in 5.4pt;mso-border-insideh:
            .5pt solid #D9D9D9;mso-border-insidev:.5pt solid #D9D9D9'>
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
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
              
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
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                   
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
                    <!--[if gte vml 1]>
                    <v:shapetype
                      id="_x0000_t75" coordsize="21600,21600" o:spt="75" o:preferrelative="t"
                      path="m@4@5l@4@11@9@11@9@5xe" filled="f" stroked="f">
                      <v:stroke joinstyle="miter"/>
                      <v:formulas>
                        <v:f eqn="if lineDrawn pixelLineWidth 0"/>
                        <v:f eqn="sum @0 1 0"/>
                        <v:f eqn="sum 0 0 @1"/>
                        <v:f eqn="prod @2 1 2"/>
                        <v:f eqn="prod @3 21600 pixelWidth"/>
                        <v:f eqn="prod @3 21600 pixelHeight"/>
                        <v:f eqn="sum @0 0 1"/>
                        <v:f eqn="prod @6 1 2"/>
                        <v:f eqn="prod @7 21600 pixelWidth"/>
                        <v:f eqn="sum @8 21600 0"/>
                        <v:f eqn="prod @7 21600 pixelHeight"/>
                        <v:f eqn="sum @10 21600 0"/>
                      </v:formulas>
                      <v:path o:extrusionok="f" gradientshapeok="t" o:connecttype="rect"/>
                      <o:lock v:ext="edit" aspectratio="t"/>
                    </v:shapetype>
                    <v:shape id="Picture_x0020_3" o:spid="_x0000_i1025" type="#_x0000_t75"
                      style='width:58.5pt;height:75pt;visibility:visible'>
                      <v:imagedata src="CV_DinhThiLoan_%20AsianTech_files/image001.png" o:title=""/>
                    </v:shape>
                    <![endif]--><![if !vml]><img width=78 height=100
                      src="cv/image002.png" v:shapes="Picture_x0020_3"><![endif]>
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
                    16/07/1988
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
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                    Vietnamese
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
                    dtloan@sdc.ud.edu.vn
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
                    +84
                    905 877069
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
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                    Son
                    Tra Dist., Da Nang
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
            <tr style='mso-yfti-irow:1'>
              <td width=92 valign=top style='width:69.2pt;border:solid #D9D9D9 1.0pt;
                border-top:none;mso-border-top-alt:solid #C2D69B 1.0pt;mso-border-alt:solid #D9D9D9 .5pt;
                mso-border-top-alt:solid #C2D69B 1.0pt;background:#F2F2F2;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                    2011
                    - 2013
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
                    Study
                    at Danang University of Technology
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
                    2007
                    - 2010
                    <o:p></o:p>
                  </span>
                </p>
              </td>
              <td width=565 valign=top style='width:423.55pt;border-top:none;border-left:
                none;border-bottom:solid #D9D9D9 1.0pt;border-right:solid #D9D9D9 1.0pt;
                mso-border-top-alt:solid #D9D9D9 .5pt;mso-border-left-alt:solid #D9D9D9 .5pt;
                mso-border-alt:solid #D9D9D9 .5pt;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                    Study
                    at Danang College of Information Technology
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
                    <o:p>&nbsp;</o:p>
                  </span>
                </p>
              </td>
              <td width=565 valign=top style='width:423.55pt;border-top:none;border-left:
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
            <tr style='mso-yfti-irow:4;mso-yfti-lastrow:yes'>
              <td width=92 valign=top style='width:69.2pt;border:solid #D9D9D9 1.0pt;
                border-top:none;mso-border-top-alt:solid #D9D9D9 .5pt;mso-border-alt:solid #D9D9D9 .5pt;
                background:#F2F2F2;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                    <o:p>&nbsp;</o:p>
                  </span>
                </p>
              </td>
              <td width=565 valign=top style='width:423.55pt;border-top:none;border-left:
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
            <tr style='mso-yfti-irow:1'>
              <td width=177 valign=top style='width:133.0pt;border:solid #D9D9D9 1.0pt;
                border-top:none;mso-border-top-alt:solid #C2D69B 1.0pt;mso-border-alt:solid #D9D9D9 .5pt;
                mso-border-top-alt:solid #C2D69B 1.0pt;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                    Programming
                    languages
                    <span style='background:yellow;mso-highlight:yellow'>
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
                    C
                    (2 years), C++ (1 year), Java for Android (6 month), HTML&amp;CSS (3 month) …
                    <o:p></o:p>
                  </span>
                </p>
              </td>
            </tr>
            <tr style='mso-yfti-irow:2'>
              <td width=177 valign=top style='width:133.0pt;border:solid #D9D9D9 1.0pt;
                border-top:none;mso-border-top-alt:solid #D9D9D9 .5pt;mso-border-alt:solid #D9D9D9 .5pt;
                padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                    Database
                    <o:p></o:p>
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
                    MS
                    SQL Server (1 year), MySQL (1 year)
                    <o:p></o:p>
                  </span>
                </p>
              </td>
            </tr>
            <tr style='mso-yfti-irow:3'>
              <td width=177 valign=top style='width:133.0pt;border:solid #D9D9D9 1.0pt;
                border-top:none;mso-border-top-alt:solid #D9D9D9 .5pt;mso-border-alt:solid #D9D9D9 .5pt;
                padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                    Operating
                    System
                    <o:p></o:p>
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
                    Windows
                    (5 years)
                    <o:p></o:p>
                  </span>
                </p>
              </td>
            </tr>
            <tr style='mso-yfti-irow:4'>
              <td width=177 valign=top style='width:133.0pt;border:solid #D9D9D9 1.0pt;
                border-top:none;mso-border-top-alt:solid #D9D9D9 .5pt;mso-border-alt:solid #D9D9D9 .5pt;
                padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                    Software/Tool
                    <o:p></o:p>
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
                    MS
                    Office 2003, 2007, 2010; Visio 2003, 2007; MS Project 2003, 2007; StartUML, RedMine,
                    HTTP Apache, Tomcat, Liferay Portal, SVN …
                    <o:p></o:p>
                  </span>
                </p>
              </td>
            </tr>
            <tr style='mso-yfti-irow:5'>
              <td width=177 valign=top style='width:133.0pt;border:solid #D9D9D9 1.0pt;
                border-top:none;mso-border-top-alt:solid #D9D9D9 .5pt;mso-border-alt:solid #D9D9D9 .5pt;
                padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                    Networking
                    <o:p></o:p>
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
                    TCP/IP,
                    DNS
                    <o:p></o:p>
                  </span>
                </p>
              </td>
            </tr>
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
                    style='font-size:10.0pt;font-family:"Arial","sans-serif"'>Project Management</span></b>
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
                    DEF
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
                    Analyzer
                    and Tester
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
                    5
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
                    Develop
                    website to manage projects of a multi-level company
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
                    2
                    months
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
                    PHP,
                    MySQL
                    <o:p></o:p>
                  </span>
                </p>
              </td>
            </tr>
            <tr style='mso-yfti-irow:6'>
              <td width=177 colspan=2 valign=top style='width:133.0pt;border:solid #D9D9D9 1.0pt;
                border-top:none;mso-border-top-alt:solid #4CA702 1.5pt;mso-border-alt:solid #D9D9D9 .5pt;
                mso-border-top-alt:solid #4CA702 1.5pt;padding:0in 5.4pt 0in 5.4pt'>
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
                mso-border-top-alt:solid #4CA702 1.5pt;mso-border-left-alt:solid #D9D9D9 .5pt;
                mso-border-alt:solid #D9D9D9 .5pt;mso-border-top-alt:solid #4CA702 1.5pt;
                padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <b style='mso-bidi-font-weight:normal'><span
                    style='font-size:10.0pt;font-family:"Arial","sans-serif"'>Office online</span></b>
                  <span
                    style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                    <o:p></o:p>
                  </span>
                </p>
              </td>
              <td width=131 colspan=2 valign=top style='width:98.05pt;border-top:none;
                border-left:none;border-bottom:solid #D9D9D9 1.0pt;border-right:solid #D9D9D9 1.0pt;
                mso-border-top-alt:solid #4CA702 1.5pt;mso-border-left-alt:solid #D9D9D9 .5pt;
                mso-border-alt:solid #D9D9D9 .5pt;mso-border-top-alt:solid #4CA702 1.5pt;
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
                mso-border-top-alt:solid #4CA702 1.5pt;mso-border-left-alt:solid #D9D9D9 .5pt;
                mso-border-alt:solid #D9D9D9 .5pt;mso-border-top-alt:solid #4CA702 1.5pt;
                padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                    The
                    University Of DaNang
                    <o:p></o:p>
                  </span>
                </p>
              </td>
            </tr>
            <tr style='mso-yfti-irow:7'>
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
                    Tester
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
                    6
                    <o:p></o:p>
                  </span>
                </p>
              </td>
            </tr>
            <tr style='mso-yfti-irow:8'>
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
                    Develop
                    a website to manage documents, reports, tasks and assignment tasks online …
                    <o:p></o:p>
                  </span>
                </p>
              </td>
            </tr>
            <tr style='mso-yfti-irow:9'>
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
                    10
                    months
                    <o:p></o:p>
                  </span>
                </p>
              </td>
            </tr>
            <tr style='mso-yfti-irow:10'>
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
                    PHP,
                    MySQL
                    <o:p></o:p>
                  </span>
                </p>
              </td>
            </tr>
            <tr style='mso-yfti-irow:11'>
              <td width=177 colspan=2 valign=top style='width:133.0pt;border:solid #D9D9D9 1.0pt;
                border-top:none;mso-border-top-alt:solid #4CA702 1.5pt;mso-border-alt:solid #D9D9D9 .5pt;
                mso-border-top-alt:solid #4CA702 1.5pt;padding:0in 5.4pt 0in 5.4pt'>
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
                mso-border-top-alt:solid #4CA702 1.5pt;mso-border-left-alt:solid #D9D9D9 .5pt;
                mso-border-alt:solid #D9D9D9 .5pt;mso-border-top-alt:solid #4CA702 1.5pt;
                padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <b style='mso-bidi-font-weight:normal'><span
                    style='font-size:10.0pt;font-family:"Arial","sans-serif"'>Time of scientific
                  research management</span></b>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                    <o:p></o:p>
                  </span>
                </p>
              </td>
              <td width=131 colspan=2 valign=top style='width:98.05pt;border-top:none;
                border-left:none;border-bottom:solid #D9D9D9 1.0pt;border-right:solid #D9D9D9 1.0pt;
                mso-border-top-alt:solid #4CA702 1.5pt;mso-border-left-alt:solid #D9D9D9 .5pt;
                mso-border-alt:solid #D9D9D9 .5pt;mso-border-top-alt:solid #4CA702 1.5pt;
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
                mso-border-top-alt:solid #4CA702 1.5pt;mso-border-left-alt:solid #D9D9D9 .5pt;
                mso-border-alt:solid #D9D9D9 .5pt;mso-border-top-alt:solid #4CA702 1.5pt;
                padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                    The
                    University Of DaNang
                    <o:p></o:p>
                  </span>
                </p>
              </td>
            </tr>
            <tr style='mso-yfti-irow:12'>
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
                    Tester
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
                    3
                    <o:p></o:p>
                  </span>
                </p>
              </td>
            </tr>
            <tr style='mso-yfti-irow:13'>
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
                    Develop
                    a website to manage time of scientific research for lecturer
                    <o:p></o:p>
                  </span>
                </p>
              </td>
            </tr>
            <tr style='mso-yfti-irow:14'>
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
                    5
                    moths
                    <o:p></o:p>
                  </span>
                </p>
              </td>
            </tr>
            <tr style='mso-yfti-irow:15'>
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
                    PHP,
                    MySQL
                    <o:p></o:p>
                  </span>
                </p>
              </td>
            </tr>
            <tr style='mso-yfti-irow:16'>
              <td width=177 colspan=2 valign=top style='width:133.0pt;border:solid #D9D9D9 1.0pt;
                border-top:none;mso-border-top-alt:solid #4CA702 1.5pt;mso-border-alt:solid #D9D9D9 .5pt;
                mso-border-top-alt:solid #4CA702 1.5pt;padding:0in 5.4pt 0in 5.4pt'>
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
                mso-border-top-alt:solid #4CA702 1.5pt;mso-border-left-alt:solid #D9D9D9 .5pt;
                mso-border-alt:solid #D9D9D9 .5pt;mso-border-top-alt:solid #4CA702 1.5pt;
                padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <b style='mso-bidi-font-weight:normal'><span
                    style='font-size:10.0pt;font-family:"Arial","sans-serif"'>Hook-up</span></b>
                  <span
                    style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                    <o:p></o:p>
                  </span>
                </p>
              </td>
              <td width=131 colspan=2 valign=top style='width:98.05pt;border-top:none;
                border-left:none;border-bottom:solid #D9D9D9 1.0pt;border-right:solid #D9D9D9 1.0pt;
                mso-border-top-alt:solid #4CA702 1.5pt;mso-border-left-alt:solid #D9D9D9 .5pt;
                mso-border-alt:solid #D9D9D9 .5pt;mso-border-top-alt:solid #4CA702 1.5pt;
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
                mso-border-top-alt:solid #4CA702 1.5pt;mso-border-left-alt:solid #D9D9D9 .5pt;
                mso-border-alt:solid #D9D9D9 .5pt;mso-border-top-alt:solid #4CA702 1.5pt;
                padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                    Visum
                    Company
                    <o:p></o:p>
                  </span>
                </p>
              </td>
            </tr>
            <tr style='mso-yfti-irow:17'>
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
                    Tester
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
                    3
                    <o:p></o:p>
                  </span>
                </p>
              </td>
            </tr>
            <tr style='mso-yfti-irow:18'>
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
                    Hook-up
                    is a iOS chat App. Besides, it supports searching and making friend with
                    other users surrounding you
                    <o:p></o:p>
                  </span>
                </p>
              </td>
            </tr>
            <tr style='mso-yfti-irow:19'>
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
                    20
                    working days
                    <o:p></o:p>
                  </span>
                </p>
              </td>
            </tr>
            <tr style='mso-yfti-irow:20'>
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
                    Object-C,
                    XML, MS SQL Server, ASP.NET, XMPP
                    <o:p></o:p>
                  </span>
                </p>
              </td>
            </tr>
            <tr style='mso-yfti-irow:21'>
              <td width=177 colspan=2 valign=top style='width:133.0pt;border:solid #D9D9D9 1.0pt;
                border-top:none;mso-border-top-alt:solid #4CA702 1.5pt;mso-border-alt:solid #D9D9D9 .5pt;
                mso-border-top-alt:solid #4CA702 1.5pt;padding:0in 5.4pt 0in 5.4pt'>
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
                mso-border-top-alt:solid #4CA702 1.5pt;mso-border-left-alt:solid #D9D9D9 .5pt;
                mso-border-alt:solid #D9D9D9 .5pt;mso-border-top-alt:solid #4CA702 1.5pt;
                padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <b style='mso-bidi-font-weight:normal'><span
                    style='font-size:10.0pt;font-family:"Arial","sans-serif"'>UD Smart POS for
                  Restaurant Managerment</span></b>
                  <span style='font-size:10.0pt;font-family:
                    "Arial","sans-serif"'>
                    <o:p></o:p>
                  </span>
                </p>
              </td>
              <td width=131 colspan=2 valign=top style='width:98.05pt;border-top:none;
                border-left:none;border-bottom:solid #D9D9D9 1.0pt;border-right:solid #D9D9D9 1.0pt;
                mso-border-top-alt:solid #4CA702 1.5pt;mso-border-left-alt:solid #D9D9D9 .5pt;
                mso-border-alt:solid #D9D9D9 .5pt;mso-border-top-alt:solid #4CA702 1.5pt;
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
                mso-border-top-alt:solid #4CA702 1.5pt;mso-border-left-alt:solid #D9D9D9 .5pt;
                mso-border-alt:solid #D9D9D9 .5pt;mso-border-top-alt:solid #4CA702 1.5pt;
                padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                    Many
                    customers
                    <o:p></o:p>
                  </span>
                </p>
              </td>
            </tr>
            <tr style='mso-yfti-irow:22'>
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
                    Analyzer
                    and Tester
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
                    5
                    <o:p></o:p>
                  </span>
                </p>
              </td>
            </tr>
            <tr style='mso-yfti-irow:23'>
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
                    UD
                    Smart Pos provides full features for restaurant management. This system is
                    suitable for many restaurants, hotels and coffee shops …
                    <o:p></o:p>
                  </span>
                </p>
              </td>
            </tr>
            <tr style='mso-yfti-irow:24'>
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
                    5
                    months
                    <o:p></o:p>
                  </span>
                </p>
              </td>
            </tr>
            <tr style='mso-yfti-irow:25'>
              <td width=177 colspan=2 valign=top style='width:133.0pt;border:solid #D9D9D9 1.0pt;
                border-top:none;mso-border-top-alt:solid #D9D9D9 .5pt;mso-border-alt:solid #D9D9D9 .5pt;
                padding:0in 5.4pt 0in 5.4pt'>
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
                border-left:none;border-bottom:solid #D9D9D9 1.0pt;border-right:solid #D9D9D9 1.0pt;
                mso-border-top-alt:solid #D9D9D9 .5pt;mso-border-left-alt:solid #D9D9D9 .5pt;
                mso-border-alt:solid #D9D9D9 .5pt;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                    Java
                    for Android, XML, MS SQL Server, ASP.NET, CakePHP
                    <o:p></o:p>
                  </span>
                </p>
              </td>
            </tr>
            <tr style='mso-yfti-irow:26'>
              <td width=177 colspan=2 valign=top style='width:133.0pt;border:solid #D9D9D9 1.0pt;
                border-top:none;mso-border-top-alt:solid #4CA702 1.5pt;mso-border-alt:solid #D9D9D9 .5pt;
                mso-border-top-alt:solid #4CA702 1.5pt;padding:0in 5.4pt 0in 5.4pt'>
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
                mso-border-top-alt:solid #4CA702 1.5pt;mso-border-left-alt:solid #D9D9D9 .5pt;
                mso-border-alt:solid #D9D9D9 .5pt;mso-border-top-alt:solid #4CA702 1.5pt;
                padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <b style='mso-bidi-font-weight:normal'><span
                    style='font-size:10.0pt;font-family:"Arial","sans-serif"'>Journal management</span></b>
                  <span
                    style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                    <o:p></o:p>
                  </span>
                </p>
              </td>
              <td width=131 colspan=2 valign=top style='width:98.05pt;border-top:none;
                border-left:none;border-bottom:solid #D9D9D9 1.0pt;border-right:solid #D9D9D9 1.0pt;
                mso-border-top-alt:solid #4CA702 1.5pt;mso-border-left-alt:solid #D9D9D9 .5pt;
                mso-border-alt:solid #D9D9D9 .5pt;mso-border-top-alt:solid #4CA702 1.5pt;
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
                mso-border-top-alt:solid #4CA702 1.5pt;mso-border-left-alt:solid #D9D9D9 .5pt;
                mso-border-alt:solid #D9D9D9 .5pt;mso-border-top-alt:solid #4CA702 1.5pt;
                padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                    The
                    University Of DaNang
                    <o:p></o:p>
                  </span>
                </p>
              </td>
            </tr>
            <tr style='mso-yfti-irow:27'>
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
                    Analyzer
                    and Tester
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
                    5
                    <o:p></o:p>
                  </span>
                </p>
              </td>
            </tr>
            <tr style='mso-yfti-irow:28'>
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
                    Develop
                    a website to manage process of a journal: post, choose review a journal,
                    publish reports to journal site …
                    <o:p></o:p>
                  </span>
                </p>
              </td>
            </tr>
            <tr style='mso-yfti-irow:29'>
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
                    5
                    months
                    <o:p></o:p>
                  </span>
                </p>
              </td>
            </tr>
            <tr style='mso-yfti-irow:30'>
              <td width=177 colspan=2 valign=top style='width:133.0pt;border:solid #D9D9D9 1.0pt;
                border-top:none;mso-border-top-alt:solid #D9D9D9 .5pt;mso-border-alt:solid #D9D9D9 .5pt;
                padding:0in 5.4pt 0in 5.4pt'>
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
                border-left:none;border-bottom:solid #D9D9D9 1.0pt;border-right:solid #D9D9D9 1.0pt;
                mso-border-top-alt:solid #D9D9D9 .5pt;mso-border-left-alt:solid #D9D9D9 .5pt;
                mso-border-alt:solid #D9D9D9 .5pt;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                    PHP,
                    MySQL
                    <o:p></o:p>
                  </span>
                </p>
              </td>
            </tr>
            <tr style='mso-yfti-irow:31;mso-row-margin-right:13.95pt'>
              <td width=172 valign=top style='width:128.7pt;border:solid #D9D9D9 1.0pt;
                border-top:none;mso-border-top-alt:solid #4CA702 1.5pt;mso-border-alt:solid #D9D9D9 .5pt;
                mso-border-top-alt:solid #4CA702 1.5pt;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                    Project
                    ‘s name
                    <o:p></o:p>
                  </span>
                </p>
              </td>
              <td width=184 colspan=2 valign=top style='width:137.9pt;border-top:none;
                border-left:none;border-bottom:solid #D9D9D9 1.0pt;border-right:solid #D9D9D9 1.0pt;
                mso-border-top-alt:solid #4CA702 1.5pt;mso-border-left-alt:solid #D9D9D9 .5pt;
                mso-border-alt:solid #D9D9D9 .5pt;mso-border-top-alt:solid #4CA702 1.5pt;
                padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <b style='mso-bidi-font-weight:normal'><span
                    style='font-size:10.0pt;font-family:"Arial","sans-serif"'>UD Read Software
                  for reading</span></b>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                    <o:p></o:p>
                  </span>
                </p>
              </td>
              <td width=128 colspan=2 valign=top style='width:95.9pt;border-top:none;
                border-left:none;border-bottom:solid #D9D9D9 1.0pt;border-right:solid #D9D9D9 1.0pt;
                mso-border-top-alt:solid #4CA702 1.5pt;mso-border-left-alt:solid #D9D9D9 .5pt;
                mso-border-alt:solid #D9D9D9 .5pt;mso-border-top-alt:solid #4CA702 1.5pt;
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
              <td width=155 colspan=2 valign=top style='width:116.3pt;border-top:none;
                border-left:none;border-bottom:solid #D9D9D9 1.0pt;border-right:solid #D9D9D9 1.0pt;
                mso-border-top-alt:solid #4CA702 1.5pt;mso-border-left-alt:solid #D9D9D9 .5pt;
                mso-border-alt:solid #D9D9D9 .5pt;mso-border-top-alt:solid #4CA702 1.5pt;
                padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                    Many
                    customers
                    <o:p></o:p>
                  </span>
                </p>
              </td>
              <td style='mso-cell-special:placeholder;border:none;padding:0in 0in 0in 0in'
                width=19>
                <p class='MsoNormal'>&nbsp;
              </td>
            </tr>
            <tr style='mso-yfti-irow:32;mso-row-margin-right:13.95pt'>
              <td width=172 valign=top style='width:128.7pt;border:solid #D9D9D9 1.0pt;
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
              <td width=184 colspan=2 valign=top style='width:137.9pt;border-top:none;
                border-left:none;border-bottom:solid #D9D9D9 1.0pt;border-right:solid #D9D9D9 1.0pt;
                mso-border-top-alt:solid #D9D9D9 .5pt;mso-border-left-alt:solid #D9D9D9 .5pt;
                mso-border-alt:solid #D9D9D9 .5pt;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                    Tester
                    <o:p></o:p>
                  </span>
                </p>
              </td>
              <td width=128 colspan=2 valign=top style='width:95.9pt;border-top:none;
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
              <td width=155 colspan=2 valign=top style='width:116.3pt;border-top:none;
                border-left:none;border-bottom:solid #D9D9D9 1.0pt;border-right:solid #D9D9D9 1.0pt;
                mso-border-top-alt:solid #D9D9D9 .5pt;mso-border-left-alt:solid #D9D9D9 .5pt;
                mso-border-alt:solid #D9D9D9 .5pt;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                    2
                    <o:p></o:p>
                  </span>
                </p>
              </td>
              <td style='mso-cell-special:placeholder;border:none;padding:0in 0in 0in 0in'
                width=19>
                <p class='MsoNormal'>&nbsp;
              </td>
            </tr>
            <tr style='mso-yfti-irow:33;mso-row-margin-right:13.95pt'>
              <td width=172 valign=top style='width:128.7pt;border:solid #D9D9D9 1.0pt;
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
              <td width=467 colspan=6 valign=top style='width:350.1pt;border-top:none;
                border-left:none;border-bottom:solid #D9D9D9 1.0pt;border-right:solid #D9D9D9 1.0pt;
                mso-border-top-alt:solid #D9D9D9 .5pt;mso-border-left-alt:solid #D9D9D9 .5pt;
                mso-border-alt:solid #D9D9D9 .5pt;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                    UD
                    Read Software for reading is a software supports PDF and many other formats
                    on mobile devices.
                    <o:p></o:p>
                  </span>
                </p>
              </td>
              <td style='mso-cell-special:placeholder;border:none;padding:0in 0in 0in 0in'
                width=19>
                <p class='MsoNormal'>&nbsp;
              </td>
            </tr>
            <tr style='mso-yfti-irow:34;mso-row-margin-right:13.95pt'>
              <td width=172 valign=top style='width:128.7pt;border:solid #D9D9D9 1.0pt;
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
              <td width=467 colspan=6 valign=top style='width:350.1pt;border-top:none;
                border-left:none;border-bottom:solid #D9D9D9 1.0pt;border-right:solid #D9D9D9 1.0pt;
                mso-border-top-alt:solid #D9D9D9 .5pt;mso-border-left-alt:solid #D9D9D9 .5pt;
                mso-border-alt:solid #D9D9D9 .5pt;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                    2
                    months
                    <o:p></o:p>
                  </span>
                </p>
              </td>
              <td style='mso-cell-special:placeholder;border:none;padding:0in 0in 0in 0in'
                width=19>
                <p class='MsoNormal'>&nbsp;
              </td>
            </tr>
            <tr style='mso-yfti-irow:35;mso-row-margin-right:13.95pt'>
              <td width=172 valign=top style='width:128.7pt;border:solid #D9D9D9 1.0pt;
                border-top:none;mso-border-top-alt:solid #D9D9D9 .5pt;mso-border-alt:solid #D9D9D9 .5pt;
                padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                    Skill
                    set utilized
                    <o:p></o:p>
                  </span>
                </p>
              </td>
              <td width=467 colspan=6 valign=top style='width:350.1pt;border-top:none;
                border-left:none;border-bottom:solid #D9D9D9 1.0pt;border-right:solid #D9D9D9 1.0pt;
                mso-border-top-alt:solid #D9D9D9 .5pt;mso-border-left-alt:solid #D9D9D9 .5pt;
                mso-border-alt:solid #D9D9D9 .5pt;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                    Java
                    for Android, SQLite, XML, SOAP
                    <o:p></o:p>
                  </span>
                </p>
              </td>
              <td style='mso-cell-special:placeholder;border:none;padding:0in 0in 0in 0in'
                width=19>
                <p class='MsoNormal'>&nbsp;
              </td>
            </tr>
            <tr style='mso-yfti-irow:36;mso-row-margin-right:13.95pt'>
              <td width=172 valign=top style='width:128.7pt;border:solid #D9D9D9 1.0pt;
                border-top:none;mso-border-top-alt:solid #4CA702 1.5pt;mso-border-alt:solid #D9D9D9 .5pt;
                mso-border-top-alt:solid #4CA702 1.5pt;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                    Project
                    ‘s name
                    <o:p></o:p>
                  </span>
                </p>
              </td>
              <td width=184 colspan=2 valign=top style='width:137.9pt;border-top:none;
                border-left:none;border-bottom:solid #D9D9D9 1.0pt;border-right:solid #D9D9D9 1.0pt;
                mso-border-top-alt:solid #4CA702 1.5pt;mso-border-left-alt:solid #D9D9D9 .5pt;
                mso-border-alt:solid #D9D9D9 .5pt;mso-border-top-alt:solid #4CA702 1.5pt;
                padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <b style='mso-bidi-font-weight:normal'><span
                    style='font-size:10.0pt;font-family:"Arial","sans-serif"'>UD 3000 Common
                  English Words</span></b>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                    <o:p></o:p>
                  </span>
                </p>
              </td>
              <td width=128 colspan=2 valign=top style='width:95.9pt;border-top:none;
                border-left:none;border-bottom:solid #D9D9D9 1.0pt;border-right:solid #D9D9D9 1.0pt;
                mso-border-top-alt:solid #4CA702 1.5pt;mso-border-left-alt:solid #D9D9D9 .5pt;
                mso-border-alt:solid #D9D9D9 .5pt;mso-border-top-alt:solid #4CA702 1.5pt;
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
              <td width=155 colspan=2 valign=top style='width:116.3pt;border-top:none;
                border-left:none;border-bottom:solid #D9D9D9 1.0pt;border-right:solid #D9D9D9 1.0pt;
                mso-border-top-alt:solid #4CA702 1.5pt;mso-border-left-alt:solid #D9D9D9 .5pt;
                mso-border-alt:solid #D9D9D9 .5pt;mso-border-top-alt:solid #4CA702 1.5pt;
                padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                    Many
                    customers
                    <o:p></o:p>
                  </span>
                </p>
              </td>
              <td style='mso-cell-special:placeholder;border:none;padding:0in 0in 0in 0in'
                width=19>
                <p class='MsoNormal'>&nbsp;
              </td>
            </tr>
            <tr style='mso-yfti-irow:37;mso-row-margin-right:13.95pt'>
              <td width=172 valign=top style='width:128.7pt;border:solid #D9D9D9 1.0pt;
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
              <td width=184 colspan=2 valign=top style='width:137.9pt;border-top:none;
                border-left:none;border-bottom:solid #D9D9D9 1.0pt;border-right:solid #D9D9D9 1.0pt;
                mso-border-top-alt:solid #D9D9D9 .5pt;mso-border-left-alt:solid #D9D9D9 .5pt;
                mso-border-alt:solid #D9D9D9 .5pt;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                    Tester
                    <o:p></o:p>
                  </span>
                </p>
              </td>
              <td width=128 colspan=2 valign=top style='width:95.9pt;border-top:none;
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
              <td width=155 colspan=2 valign=top style='width:116.3pt;border-top:none;
                border-left:none;border-bottom:solid #D9D9D9 1.0pt;border-right:solid #D9D9D9 1.0pt;
                mso-border-top-alt:solid #D9D9D9 .5pt;mso-border-left-alt:solid #D9D9D9 .5pt;
                mso-border-alt:solid #D9D9D9 .5pt;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                    3
                    <o:p></o:p>
                  </span>
                </p>
              </td>
              <td style='mso-cell-special:placeholder;border:none;padding:0in 0in 0in 0in'
                width=19>
                <p class='MsoNormal'>&nbsp;
              </td>
            </tr>
            <tr style='mso-yfti-irow:38;mso-row-margin-right:13.95pt'>
              <td width=172 valign=top style='width:128.7pt;border:solid #D9D9D9 1.0pt;
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
              <td width=467 colspan=6 valign=top style='width:350.1pt;border-top:none;
                border-left:none;border-bottom:solid #D9D9D9 1.0pt;border-right:solid #D9D9D9 1.0pt;
                mso-border-top-alt:solid #D9D9D9 .5pt;mso-border-left-alt:solid #D9D9D9 .5pt;
                mso-border-alt:solid #D9D9D9 .5pt;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                    UD
                    3000 Common English Words is a app helps users to practice listening,
                    speaking, reading and writing skills.
                    <o:p></o:p>
                  </span>
                </p>
              </td>
              <td style='mso-cell-special:placeholder;border:none;padding:0in 0in 0in 0in'
                width=19>
                <p class='MsoNormal'>&nbsp;
              </td>
            </tr>
            <tr style='mso-yfti-irow:39;mso-row-margin-right:13.95pt'>
              <td width=172 valign=top style='width:128.7pt;border:solid #D9D9D9 1.0pt;
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
              <td width=467 colspan=6 valign=top style='width:350.1pt;border-top:none;
                border-left:none;border-bottom:solid #D9D9D9 1.0pt;border-right:solid #D9D9D9 1.0pt;
                mso-border-top-alt:solid #D9D9D9 .5pt;mso-border-left-alt:solid #D9D9D9 .5pt;
                mso-border-alt:solid #D9D9D9 .5pt;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                    1
                    months
                    <o:p></o:p>
                  </span>
                </p>
              </td>
              <td style='mso-cell-special:placeholder;border:none;padding:0in 0in 0in 0in'
                width=19>
                <p class='MsoNormal'>&nbsp;
              </td>
            </tr>
            <tr style='mso-yfti-irow:40;mso-yfti-lastrow:yes;mso-row-margin-right:13.95pt'>
              <td width=172 valign=top style='width:128.7pt;border:solid #D9D9D9 1.0pt;
                border-top:none;mso-border-top-alt:solid #D9D9D9 .5pt;mso-border-alt:solid #D9D9D9 .5pt;
                padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                    Skill
                    set utilized
                    <o:p></o:p>
                  </span>
                </p>
              </td>
              <td width=467 colspan=6 valign=top style='width:350.1pt;border-top:none;
                border-left:none;border-bottom:solid #D9D9D9 1.0pt;border-right:solid #D9D9D9 1.0pt;
                mso-border-top-alt:solid #D9D9D9 .5pt;mso-border-left-alt:solid #D9D9D9 .5pt;
                mso-border-alt:solid #D9D9D9 .5pt;padding:0in 5.4pt 0in 5.4pt'>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:0in'>
                  <span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>
                    Java
                    for Android, SQLite
                    <o:p></o:p>
                  </span>
                </p>
              </td>
              <td style='mso-cell-special:placeholder;border:none;padding:0in 0in 0in 0in'
                width=19>
                <p class='MsoNormal'>&nbsp;
              </td>
            </tr>
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
                    Software
                    Development Centre
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
                    12/2012 – 10/2014 
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
                    Tester
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
                    "Arial","sans-serif"'>
                    Testing software projects: Reading requirements,
                    planning for testing, designing test case, implementing test module, testing
                    functions, reporting results.
                    <o:p></o:p>
                  </span>
                </p>
                <p class=MsoListParagraphCxSpLast style='margin-top:6.0pt;margin-right:0in;
                  margin-bottom:6.0pt;margin-left:.75in;mso-add-space:auto;text-indent:-.5in;
                  mso-list:l4 level1 lfo9'>
                  <![if !supportLists]><span style='font-size:10.0pt;
                    font-family:"Arial","sans-serif";mso-fareast-font-family:Arial'><span
                    style='mso-list:Ignore'>-<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  </span></span></span><![endif]>
                  <span style='font-size:10.0pt;font-family:
                    "Arial","sans-serif"'>
                    Managing bug tracking on such systems: Redmine
                    <o:p></o:p>
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
                    Become a good Tester at least next 1 year.
                    <o:p></o:p>
                  </span>
                </p>
                <p class=MsoListParagraphCxSpLast style='margin-top:6.0pt;margin-right:0in;
                  margin-bottom:6.0pt;margin-left:.75in;mso-add-space:auto;text-indent:-.5in;
                  mso-list:l4 level1 lfo9'>
                  <![if !supportLists]><span style='font-size:10.0pt;
                    font-family:"Arial","sans-serif";mso-fareast-font-family:Arial'><span
                    style='mso-list:Ignore'>-<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  </span></span></span><![endif]>
                  <span style='font-size:10.0pt;font-family:
                    "Arial","sans-serif"'>
                    Become master in testing software.
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
                    Playing badminton
                    <o:p></o:p>
                  </span>
                </p>
                <p class=MsoListParagraphCxSpLast style='margin-top:6.0pt;margin-right:0in;
                  margin-bottom:6.0pt;margin-left:.75in;mso-add-space:auto;text-indent:-.5in;
                  mso-list:l4 level1 lfo9'>
                  <![if !supportLists]><span style='font-size:10.0pt;
                    font-family:"Arial","sans-serif";mso-fareast-font-family:Arial'><span
                    style='mso-list:Ignore'>-<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  </span></span></span><![endif]>
                  <span style='font-size:10.0pt;font-family:
                    "Arial","sans-serif"'>
                    Taking part in social activities
                    <o:p></o:p>
                  </span>
                </p>
                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
                  6.0pt;margin-left:.75in;text-indent:-.5in;mso-list:l4 level1 lfo9'>
                  <![if !supportLists]><span
                    style='font-size:10.0pt;font-family:"Arial","sans-serif";mso-fareast-font-family:
                    Arial'><span style='mso-list:Ignore'>-<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  </span></span></span><![endif]>
                  <span style='font-size:10.0pt;font-family:
                    "Arial","sans-serif"'>
                    Listening to music
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