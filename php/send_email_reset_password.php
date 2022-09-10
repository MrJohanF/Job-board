<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include "db.php";
require_once __DIR__ . '/../vendor/autoload.php';

error_reporting(E_ALL ^ E_NOTICE);

if ($_POST["recover_email"]) {

    $regi_email = $_POST["recover_email"];

    $query = "SELECT email FROM candidato WHERE email ='{$regi_email}'";
    $result_query = mysqli_query($connection, $query);
    $count = mysqli_num_rows($result_query);
    if (!$result_query) {
        die("Query failed: " . mysqli_error($connection) . '' .
            mysqli_errno($connection));
    }


    if ($count >= 1) {

        $token = md5(rand(0, 1000));

        $query = "UPDATE candidato SET token = '{$token}' WHERE email= '{$regi_email}' ";
        $result_query = mysqli_query($connection, $query);

        $message = '
        
        
        <html xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:w="urn:schemas-microsoft-com:office:word" xmlns:m="http://schemas.microsoft.com/office/2004/12/omml" xmlns="http://www.w3.org/TR/REC-html40" data-lt-installed="true"><head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <meta name="ProgId" content="Word.Document">
        
        <meta name="Generator" content="Microsoft Word 15">
        
        <meta name="Originator" content="Microsoft Word 15">
        
        <link rel="File-List" href="file:///Temp/msohtmlclip1/01/clip_filelist.xml">
        
        <link rel="Edit-Time-Data" href="file:///Temp/msohtmlclip1/01/clip_editdata.mso">
        
    
        
        <link rel="themeData" href="file:///Temp/msohtmlclip1/01/clip_themedata.thmx">
        
        <link rel="colorSchemeMapping" href="file:///Temp/msohtmlclip1/01/clip_colorschememapping.xml">
        
    
        
        <style>
        
        <!--
        
        
        
         @font-face
        
            {font-family:"Cambria Math";
        
            panose-1:2 4 5 3 5 4 6 3 2 4;
        
            mso-font-charset:0;
        
            mso-generic-font-family:roman;
        
            mso-font-pitch:variable;
        
            mso-font-signature:3 0 0 0 1 0;}
        
        @font-face
        
            {font-family:Calibri;
        
            panose-1:2 15 5 2 2 2 4 3 2 4;
        
            mso-font-charset:0;
        
            mso-generic-font-family:swiss;
        
            mso-font-pitch:variable;
        
            mso-font-signature:-469750017 -1073732485 9 0 511 0;}
        
         /* Style Definitions */
        
         p.MsoNormal, li.MsoNormal, div.MsoNormal
        
            {mso-style-unhide:no;
        
            mso-style-qformat:yes;
        
            mso-style-parent:"";
        
            margin:0cm;
        
            mso-pagination:widow-orphan;
        
            font-size:11.0pt;
        
            font-family:"Calibri",sans-serif;
        
            mso-fareast-font-family:Calibri;
        
            mso-fareast-theme-font:minor-latin;}
        
        a:link, span.MsoHyperlink
        
            {mso-style-noshow:yes;
        
            mso-style-priority:99;
        
            color:blue;
        
            text-decoration:underline;
        
            text-underline:single;}
        
        a:visited, span.MsoHyperlinkFollowed
        
            {mso-style-noshow:yes;
        
            mso-style-priority:99;
        
            color:#954F72;
        
            mso-themecolor:followedhyperlink;
        
            text-decoration:underline;
        
            text-underline:single;}
        
        p
        
            {mso-style-noshow:yes;
        
            mso-style-priority:99;
        
            mso-margin-top-alt:auto;
        
            margin-right:0cm;
        
            mso-margin-bottom-alt:auto;
        
            margin-left:0cm;
        
            mso-pagination:widow-orphan;
        
            font-size:11.0pt;
        
            font-family:"Calibri",sans-serif;
        
            mso-fareast-font-family:Calibri;
        
            mso-fareast-theme-font:minor-latin;}
        
        .MsoChpDefault
        
            {mso-style-type:export-only;
        
            mso-default-props:yes;
        
            font-size:10.0pt;
        
            mso-ansi-font-size:10.0pt;
        
            mso-bidi-font-size:10.0pt;}
        
        @page WordSection1
        
            {size:612.0pt 792.0pt;
        
            margin:72.0pt 72.0pt 72.0pt 72.0pt;
        
            mso-header-margin:36.0pt;
        
            mso-footer-margin:36.0pt;
        
            mso-paper-source:0;}
        
        div.WordSection1
        
            {page:WordSection1;}
        
        -->
        
        </style>
        
        <!--[if gte mso 10]>
        
        <style>
        
         /* Style Definitions */
        
         table.MsoNormalTable
        
            {mso-style-name:"Table Normal";
        
            mso-tstyle-rowband-size:0;
        
            mso-tstyle-colband-size:0;
        
            mso-style-noshow:yes;
        
            mso-style-priority:99;
        
            mso-style-parent:"";
        
            mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
        
            mso-para-margin:0cm;
        
            mso-pagination:widow-orphan;
        
            font-size:10.0pt;
        
            font-family:"Times New Roman",serif;}
        
        </style>
        
        
        </head>
        
        
        
        <body lang="EN-GB" link="blue" vlink="#954F72" style="overflow-wrap: break-word; overflow-y: scroll;">
        
        <!--StartFragment-->
        
        
        
        <table class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100.0%;background:#B8CCE2;border-collapse:collapse;mso-yfti-tbllook:
        
         1184;mso-padding-alt:0cm 0cm 0cm 0cm">
        
         <tbody><tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:yes">
        
          <td valign="top" style="padding:0cm 0cm 0cm 0cm">
        
          <table class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100.0%;border-collapse:collapse;mso-yfti-tbllook:1184;
        
           mso-padding-alt:0cm 0cm 0cm 0cm">
        
           <tbody><tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:yes">
    
            <!-- Color fondo -->
        
        
            <td valign="top" style="background:#264bff;padding:0cm 0cm 0cm 0cm">
        
            <div align="center">
        
            <table class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100.0%;border-collapse:collapse;mso-yfti-tbllook:
        
             1184;mso-padding-alt:0cm 0cm 0cm 0cm">
        
             <tbody><tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes">
        
              <td valign="top" style="padding:0cm 0cm 0cm 0cm">
        
              <div align="center">
        
              <table class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0" width="600" style="width:450.0pt;border-collapse:collapse;mso-yfti-tbllook:
        
               1184;mso-padding-alt:0cm 0cm 0cm 0cm">
        
               <tbody><tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:yes">
        
                <td width="600" valign="top" style="width:450.0pt;padding:0cm 0cm 0cm 0cm">
        
                <div align="center">
        
                <table class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100.0%;border-collapse:collapse;mso-yfti-tbllook:
        
                 1184;mso-padding-alt:0cm 0cm 0cm 0cm">
        
                 <tbody><tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:
        
                  yes">
        
                  <td valign="top" style="padding:3.75pt 3.75pt 3.75pt 3.75pt">
        
                  <div align="center">
        
                  <table class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100.0%;border-collapse:collapse;
        
                   mso-yfti-tbllook:1184;mso-padding-alt:0cm 0cm 0cm 0cm">
        
                   <tbody><tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:
        
                    yes">
        
                    <td valign="top" style="padding:0cm 0cm 0cm 0cm">
        
                    <p class="MsoNormal" style="line-height:30.0pt;mso-line-height-rule:
        
                    exactly"><span style="font-size:30.0pt;mso-fareast-font-family:
        
                    &quot;Times New Roman&quot;">&nbsp; <o:p></o:p></span></p>
        
                    </td>
        
                   </tr>
        
                  </tbody></table>
        
                  </div>
        
                  </td>
        
                 </tr>
        
                </tbody></table>
        
                </div>
        
                </td>
        
               </tr>
        
              </tbody></table>
        
              </div>
        
              </td>
        
             </tr>
        
             <tr style="mso-yfti-irow:1;mso-yfti-lastrow:yes">
        
              <td valign="top" style="padding:0cm 0cm 0cm 0cm">
        
              <div align="center">
        
              <table class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0" width="600" style="width:450.0pt;border-collapse:collapse;mso-yfti-tbllook:
        
               1184;mso-padding-alt:0cm 0cm 0cm 0cm">
        
               <tbody><tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:yes">
        
                <td width="600" valign="top" style="width:450.0pt;background:white;
        
                padding:3.75pt 0cm 3.75pt 15.0pt">
        
                <table class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100.0%;border-collapse:collapse;mso-yfti-tbllook:
        
                 1184;mso-padding-alt:0cm 0cm 0cm 0cm">
        
                 <tbody><tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:
        
                  yes">
        
                  <td valign="top" style="padding:0cm 18.75pt 0cm 18.75pt">
        
                  <p class="MsoNormal" style="line-height:18.75pt"><span style="font-size:1.0pt;mso-fareast-font-family:&quot;Times New Roman&quot;">&nbsp;<o:p></o:p></span></p>
        
                  <p class="MsoNormal" style="line-height:18.75pt"><img width="203" src="https://tujob.co/webimages/emplea_logo_azul.png" align="left" style="outline: none;-ms-interpolation-mode: bicubic;border-bottom-width:
        
                  0in;border-left-width:0in;border-right-width:0in;border-top-width:
        
                  0in;clear:both;float:none;height:auto;max-width:203px;text-decoration:
        
                  none;width:100%;display:block" alt="Image" class="left fixedwidth" border="0" title="Image"><span style="font-size:1.0pt;mso-fareast-font-family:
        
                  &quot;Times New Roman&quot;">&nbsp;<o:p></o:p></span></p>
        
                  </td>
        
                 </tr>
        
                </tbody></table>
        
                </td>
        
               </tr>
        
              </tbody></table>
        
              </div>
        
              </td>
        
             </tr>
        
            </tbody></table>
        
            </div>
        
            <p class="MsoNormal" align="center" style="text-align:center;background:white"><span style="mso-fareast-font-family:&quot;Times New Roman&quot;;display:none;mso-hide:
        
            all"><o:p>&nbsp;</o:p></span></p>
        
            <div align="center">
        
            <table class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100.0%;border-collapse:collapse;mso-yfti-tbllook:
        
             1184;mso-padding-alt:0cm 0cm 0cm 0cm">
        
             <tbody><tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes">
        
              <td valign="top" style="padding:0cm 0cm 0cm 0cm;border-top:transparent;
        
              border-left:transparent;border-bottom:transparent;border-right:transparent">
        
              <div align="center">
        
              <table class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0" width="600" style="width:450.0pt;border-collapse:collapse;mso-yfti-tbllook:
        
               1184;mso-padding-alt:0cm 0cm 0cm 0cm">
        
               <tbody><tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:yes">
        
                <td width="600" valign="top" style="width:450.0pt;background:white;
        
                padding:3.75pt 26.25pt 0cm 26.25pt">
        
                <div align="center">
        
                <table class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100.0%;border-collapse:collapse;mso-yfti-tbllook:
        
                 1184;mso-padding-alt:0cm 0cm 0cm 0cm">
        
                 <tbody><tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes">
        
                  <td valign="top" style="padding:7.5pt 7.5pt 7.5pt 7.5pt">
        
                  <p style="margin:0cm;mso-line-height-alt:12.75pt"><span style="font-size:16.5pt;font-family:&quot;Arial&quot;,sans-serif;color:#132F40">Olvide mi contraseña?</span><span style="font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;
        
                  color:#132F40"><o:p></o:p></span></p>
        
                  </td>
        
                 </tr>
        
                 <tr style="mso-yfti-irow:1;mso-yfti-lastrow:yes">
        
                  <td valign="top" style="padding:3.75pt 7.5pt 22.5pt 7.5pt">
        
                  <p style="margin:0cm;line-height:15.75pt"><span style="font-size:
        
                  10.5pt;font-family:&quot;Arial&quot;,sans-serif;color:#555555">Para restabler tu contraseña selecciona el boton
                  recuperar. Se te llevara a una pantalla de restablecimiento de contraseña en donde deberas colocar tu nueva contraseña
                  si presentas errores no dudes en contactarnos.<o:p></o:p></span></p>
        
                  </td>
        
                 </tr>
        
                </tbody></table>
        
                </div>
        
                </td>
        
               </tr>
        
              </tbody></table>
        
              </div>
        
              </td>
        
             </tr>
        
             <tr style="mso-yfti-irow:1;mso-yfti-lastrow:yes">
        
              <td valign="top" style="padding:0cm 0cm 0cm 0cm">
        
              <div align="center">
        
              <table class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0" width="600" style="width:450.0pt;border-collapse:collapse;mso-yfti-tbllook:
        
               1184;mso-padding-alt:0cm 0cm 0cm 0cm">
        
               <tbody><tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:yes">
        
                <td width="600" valign="top" style="width:450.0pt;background:white;
        
                padding:11.25pt 26.25pt 1.5pt 26.25pt">
        
                <div align="center">
        
                <table class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100.0%;border-collapse:collapse;mso-yfti-tbllook:
        
                 1184;mso-padding-alt:0cm 0cm 0cm 0cm">
        
                 <tbody><tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes">
        
                  <td valign="top" style="padding:11.25pt 7.5pt 11.25pt 7.5pt">
        
                  <p style="margin:0cm;line-height:12.75pt"><span style="font-size:
        
                  12.0pt;font-family:&quot;Arial&quot;,sans-serif;color:#555555">Para </span><strong><span style="font-size:12.0pt;
        
                  font-family:&quot;Arial&quot;,sans-serif;color:#132F40">Restablecer contraseña </span></strong><span style="font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;color:#555555"><o:p></o:p></span></p>
        
                  <p style="margin:0cm;line-height:12.75pt"><span style="font-size:
        
                  12.0pt;font-family:&quot;Arial&quot;,sans-serif;color:#555555">Solo tienes que presionar en el siguiente boton.</span><span style="font-size:10.5pt;font-family:
        
                  &quot;Arial&quot;,sans-serif;color:#555555"><o:p></o:p></span></p>
        
                  </td>
        
                 </tr>
        
                 <tr style="mso-yfti-irow:1;mso-yfti-lastrow:yes">
        
                  <td valign="top" style="padding:3.75pt 7.5pt 26.25pt 7.5pt">
        
                  <p class="MsoNormal"><span style="mso-fareast-font-family:&quot;Times New Roman&quot;"><span style="mso-ignore:vglayout"><map name="MicrosoftOfficeMap0">
                      <area shape="Polygon" coords="30, 3, 11, 11, 3, 30, 11, 49, 30, 56, 272, 56, 289, 49, 297, 30, 289, 11, 272, 3, 30, 3" href="https://tujob.co/form_reset_password.php?email=' . $regi_email . '&token=' . $token . '">
                    </map>
                    <img border="0" width="239" height="46" src="https://tujob.co/webimages/boton_restablecer_blue.png" 
                    usemap="#MicrosoftOfficeMap0" alt="Rectangle: Rounded Corners: ACTIVATE MY ACCOUNT > "
                     v:shapes="_x0000_s1026"></span>
                     <span style="mso-fareast-font-family:&quot;Times New Roman&quot;"><o:p></o:p></span></p>
        
                  </td>
        
                 </tr>
        
                </tbody></table>
        
                </div>
        
                </td>
        
               </tr>
        
              </tbody></table>
        
              </div>
        
              </td>
        
             </tr>
        
            </tbody></table>
        
            </div>
        
            <p class="MsoNormal" align="center" style="text-align:center;background:#132F40"><span style="mso-fareast-font-family:&quot;Times New Roman&quot;;display:none;mso-hide:
        
            all"><o:p>&nbsp;</o:p></span></p>
        
            <div align="center">
        
            <table class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100.0%;border-collapse:collapse;mso-yfti-tbllook:
        
             1184;mso-padding-alt:0cm 0cm 0cm 0cm">
        
             <tbody><tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes">
        
              <td valign="top" style="padding:0cm 0cm 0cm 0cm;border-top:transparent;
        
              border-left:transparent;border-bottom:transparent;border-right:transparent">
        
              <div align="center">
        
              <table class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0" width="600" style="width:450.0pt;border-collapse:collapse;mso-yfti-tbllook:
        
               1184;mso-padding-alt:0cm 0cm 0cm 0cm">
        
               <tbody><tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:yes">
        
                <td width="300" valign="top" style="width:225.0pt;background:#132F40;
        
                padding:11.25pt 0cm 11.25pt 18.75pt">
        
                <div align="center">
        
                <table class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100.0%;border-collapse:collapse;mso-yfti-tbllook:
        
                 1184;mso-padding-alt:0cm 0cm 0cm 0cm">
        
                 <tbody><tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:
        
                  yes">
        
                  <td valign="top" style="padding:7.5pt 7.5pt 7.5pt 7.5pt">
        
                  <p style="margin:0cm;line-height:12.75pt"><strong><span style="font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;color:#F8F8F8">Soporte@tujob.com</span></strong><span style="font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;color:#F8F8F8"><o:p></o:p></span></p>
        
                  <p style="margin:0cm;line-height:12.75pt"><span style="font-size:
        
                  10.5pt;font-family:&quot;Arial&quot;,sans-serif;color:#F8F8F8">www.tujob.co <br>
                  Bogota D.C , Colombia. 110111<o:p></o:p></span></p>
        
                  </td>
        
                 </tr>
        
                </tbody></table>
        
                </div>
        
                </td>
        
                <td width="300" valign="top" style="width:225.0pt;background:#132F40;
        
                padding:3.75pt 0cm 3.75pt 0cm;border-top:transparent;border-left:transparent;
        
                border-bottom:transparent;border-right:transparent">
        
                <p class="MsoNormal" align="right" style="text-align:right;line-height:
        
                15.0pt;vertical-align:top"><span style="font-size:1.0pt;mso-fareast-font-family:
        
                &quot;Times New Roman&quot;;color:white;mso-color-alt:windowtext">&nbsp;</span><span style="font-size:1.0pt;mso-fareast-font-family:&quot;Times New Roman&quot;"><o:p></o:p></span></p>
        
                <div align="right">
        
                <table class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0" width="55" style="width:41.25pt;border-collapse:collapse;mso-yfti-tbllook:
        
                 1184;mso-padding-alt:0cm 0cm 0cm 0cm;border-spacing: 0" height="32">
        
                 <tbody><tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:
        
                  yes">
        
                  <td valign="top" style="padding:0cm 26.25pt 7.5pt 7.5pt;word-break:
        
                  break-word">
        
                  <div align="right">
        
                  <table class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100.0%;border-collapse:collapse;
        
                   mso-yfti-tbllook:1184;mso-padding-alt:0cm 0cm 0cm 0cm;word-break:
        
                   break-word">
        
                   <tbody><tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-row-margin-right:
        
                    24.0pt">
        
                    <td width="32" valign="top" style="width:24.0pt;padding:0cm 7.5pt 0cm 0cm">
        
                    <table class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0" align="left" width="32" style="width:24.0pt;border-collapse:collapse;
        
                     mso-yfti-tbllook:1184;margin-left:-2.25pt;margin-right:-2.25pt;
        
                     mso-table-anchor-vertical:paragraph;mso-table-anchor-horizontal:
        
                     column;mso-table-left:left;mso-padding-alt:0cm 0cm 0cm 0cm">
        
                     <tbody><tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:
        
                      yes">
        
                      <td valign="top" style="padding:0cm 0cm 0cm 0cm">
        
                      <p class="MsoNormal" style="line-height:3.75pt"><span style="font-size:1.0pt;mso-fareast-font-family:&quot;Times New Roman&quot;">&nbsp;<o:p></o:p></span></p>
        
                      </td>
        
                     </tr>
        
                    </tbody></table>
        
                    </td>
        
                    <td style="mso-cell-special:placeholder;border:none;padding:0cm 0cm 0cm 0cm" width="32"><p class="MsoNormal">&nbsp;</p></td>
        
                   </tr>
        
                   <tr style="mso-yfti-irow:1;mso-yfti-lastrow:yes" width="84">
        
                    <td width="32" valign="top" style="width:24.0pt;padding:0cm 0cm 0cm 0cm;
        
                    word-break:break-word">
        
                    <table class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0" align="left" width="32" style="width:24.0pt;border-collapse:collapse;
        
                     mso-yfti-tbllook:1184;margin-left:-2.25pt;margin-right:-2.25pt;
        
                     mso-table-anchor-vertical:paragraph;mso-table-anchor-horizontal:
        
                     column;mso-table-left:left;mso-padding-alt:0cm 0cm 0cm 0cm;
        
                     border-spacing: 0" height="32">
        
                     <tbody><tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:
        
                      yes;border-spacing: 0">
        
                      <td valign="top" style="padding:0cm 0cm 0cm 0cm">
        
                      <p class="MsoNormal" style="line-height:3.75pt"><span style="font-size:1.0pt;mso-fareast-font-family:&quot;Times New Roman&quot;">&nbsp;<o:p></o:p></span></p>
        
                      </td>
        
                     </tr>
        
                    </tbody></table>
        
                    </td>
        
                    <td width="32" valign="top" style="width:24.0pt;padding:0cm 0cm 0cm 0cm;
        
                    word-break:break-word">
        
                    <table class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0" align="left" width="32" style="width:24.0pt;border-collapse:collapse;
        
                     mso-yfti-tbllook:1184;margin-left:-2.25pt;margin-right:-2.25pt;
        
                     mso-table-anchor-vertical:paragraph;mso-table-anchor-horizontal:
        
                     column;mso-table-left:left;mso-padding-alt:0cm 0cm 0cm 0cm;
        
                     border-spacing: 0" height="32">
        
                     <tbody><tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:
        
                      yes">
        
                      <td valign="top" style="padding:0cm 0cm 0cm 0cm">
        
                      <p class="MsoNormal" style="line-height:3.75pt"><span style="font-size:1.0pt;mso-fareast-font-family:&quot;Times New Roman&quot;">&nbsp;<o:p></o:p></span></p>
        
                      </td>
        
                     </tr>
        
                    </tbody></table>
        
                    </td>
        
                   </tr>
        
                  </tbody></table>
        
                  </div>
        
                  </td>
        
                 </tr>
        
                </tbody></table>
        
                </div>
        
                </td>
        
               </tr>
        
              </tbody></table>
        
              </div>
        
              </td>
        
             </tr>
        
             <tr style="mso-yfti-irow:1;mso-yfti-lastrow:yes">
        
              <td valign="top" style="padding:0cm 0cm 0cm 0cm">
        
              <div align="center">
        
              <table class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0" width="600" style="width:450.0pt;border-collapse:collapse;mso-yfti-tbllook:
        
               1184;mso-padding-alt:0cm 0cm 0cm 0cm">
        
               <tbody><tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:yes">
        
                <td width="600" valign="top" style="width:450.0pt;padding:3.75pt 0cm 3.75pt 0cm">
        
                <div align="center">
        
                <table class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100.0%;border-collapse:collapse;mso-yfti-tbllook:
        
                 1184;mso-padding-alt:0cm 0cm 0cm 0cm">
        
                 <tbody><tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:
        
                  yes">
        
                  <td valign="top" style="padding:3.75pt 3.75pt 3.75pt 3.75pt">
        
                  <div align="center">
        
                  <table class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100.0%;border-collapse:collapse;
        
                   mso-yfti-tbllook:1184;mso-padding-alt:0cm 0cm 0cm 0cm">
        
                   <tbody><tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:
        
                    yes">
        
                    <td valign="top" style="padding:0cm 0cm 0cm 0cm">
        
                    <p class="MsoNormal" style="line-height:22.5pt;mso-line-height-rule:
        
                    exactly"><span style="font-size:22.5pt;mso-fareast-font-family:
        
                    &quot;Times New Roman&quot;">&nbsp; <o:p></o:p></span></p>
        
                    </td>
        
                   </tr>
        
                  </tbody></table>
        
                  </div>
        
                  </td>
        
                 </tr>
        
                </tbody></table>
        
                </div>
        
                </td>
        
               </tr>
        
              </tbody></table>
        
              </div>
        
              </td>
        
             </tr>
        
            </tbody></table>
        
            </div>
        
            </td>
        
           </tr>
        
          </tbody></table>
        
          </td>
        
         </tr>
        
        </tbody></table>
        
         
        <p class="MsoNormal"><span style="mso-fareast-font-family:&quot;Times New Roman&quot;"><o:p>&nbsp;</o:p></span></p>
        
        
        </body></html>
        
        ';

        $mail = new PHPMailer(true);

        try {
            $mail->IsSMTP();
            $mail->CharSet = 'UTF-8';

            $mail->Host = 'smtp.hostinger.co';
            $mail->Port = 587;
            $mail->SMTPDebug  = 0;
            $mail->SMTPAuth = true;
            $mail->Username = 'recovery@tujob.co';
            $mail->Password = 'Empleatic123.';

            $mail->setFrom('recovery@tujob.co');
            $mail->addAddress($regi_email);
            $mail->addReplyTo($regi_email);

            $mail->isHTML(true);
            $mail->Subject = "Recuperacion | Recuperacion contraseña, por TuJob.co";
            $mail->Body = '' . $message;


            $mail->send();
            echo 'Message has been sent';
            header("Location: ../index.php#submited_info");
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        header("Location: ../index.php#submited_info");
    }
}


if ($_POST["recover_email_company"]) {

    $regi_email = $_POST["recover_email_company"];

    $query = "SELECT email_empresa FROM empresa WHERE email_empresa ='{$regi_email}'";
    $result_query = mysqli_query($connection, $query);
    $count = mysqli_num_rows($result_query);
    if (!$result_query) {
        die("Query failed: " . mysqli_error($connection) . '' .
            mysqli_errno($connection));
    }


    if ($count >= 1) {


        $token = md5(rand(0, 1000));

        $query = "UPDATE empresa SET token = '{$token}' WHERE email_empresa= '{$regi_email}' ";
        $result_query = mysqli_query($connection, $query);


        $message = '
        <html xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:w="urn:schemas-microsoft-com:office:word" xmlns:m="http://schemas.microsoft.com/office/2004/12/omml" xmlns="http://www.w3.org/TR/REC-html40" data-lt-installed="true"><head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <meta name="ProgId" content="Word.Document">
        
        <meta name="Generator" content="Microsoft Word 15">
        
        <meta name="Originator" content="Microsoft Word 15">
        
        <link rel="File-List" href="file:///Temp/msohtmlclip1/01/clip_filelist.xml">
        
        <link rel="Edit-Time-Data" href="file:///Temp/msohtmlclip1/01/clip_editdata.mso">
        
    
        
        <link rel="themeData" href="file:///Temp/msohtmlclip1/01/clip_themedata.thmx">
        
        <link rel="colorSchemeMapping" href="file:///Temp/msohtmlclip1/01/clip_colorschememapping.xml">
        
    
        
        <style>
        
        <!--
        
        
        
         @font-face
        
            {font-family:"Cambria Math";
        
            panose-1:2 4 5 3 5 4 6 3 2 4;
        
            mso-font-charset:0;
        
            mso-generic-font-family:roman;
        
            mso-font-pitch:variable;
        
            mso-font-signature:3 0 0 0 1 0;}
        
        @font-face
        
            {font-family:Calibri;
        
            panose-1:2 15 5 2 2 2 4 3 2 4;
        
            mso-font-charset:0;
        
            mso-generic-font-family:swiss;
        
            mso-font-pitch:variable;
        
            mso-font-signature:-469750017 -1073732485 9 0 511 0;}
        
         /* Style Definitions */
        
         p.MsoNormal, li.MsoNormal, div.MsoNormal
        
            {mso-style-unhide:no;
        
            mso-style-qformat:yes;
        
            mso-style-parent:"";
        
            margin:0cm;
        
            mso-pagination:widow-orphan;
        
            font-size:11.0pt;
        
            font-family:"Calibri",sans-serif;
        
            mso-fareast-font-family:Calibri;
        
            mso-fareast-theme-font:minor-latin;}
        
        a:link, span.MsoHyperlink
        
            {mso-style-noshow:yes;
        
            mso-style-priority:99;
        
            color:blue;
        
            text-decoration:underline;
        
            text-underline:single;}
        
        a:visited, span.MsoHyperlinkFollowed
        
            {mso-style-noshow:yes;
        
            mso-style-priority:99;
        
            color:#954F72;
        
            mso-themecolor:followedhyperlink;
        
            text-decoration:underline;
        
            text-underline:single;}
        
        p
        
            {mso-style-noshow:yes;
        
            mso-style-priority:99;
        
            mso-margin-top-alt:auto;
        
            margin-right:0cm;
        
            mso-margin-bottom-alt:auto;
        
            margin-left:0cm;
        
            mso-pagination:widow-orphan;
        
            font-size:11.0pt;
        
            font-family:"Calibri",sans-serif;
        
            mso-fareast-font-family:Calibri;
        
            mso-fareast-theme-font:minor-latin;}
        
        .MsoChpDefault
        
            {mso-style-type:export-only;
        
            mso-default-props:yes;
        
            font-size:10.0pt;
        
            mso-ansi-font-size:10.0pt;
        
            mso-bidi-font-size:10.0pt;}
        
        @page WordSection1
        
            {size:612.0pt 792.0pt;
        
            margin:72.0pt 72.0pt 72.0pt 72.0pt;
        
            mso-header-margin:36.0pt;
        
            mso-footer-margin:36.0pt;
        
            mso-paper-source:0;}
        
        div.WordSection1
        
            {page:WordSection1;}
        
        -->
        
        </style>
        
        <!--[if gte mso 10]>
        
        <style>
        
         /* Style Definitions */
        
         table.MsoNormalTable
        
            {mso-style-name:"Table Normal";
        
            mso-tstyle-rowband-size:0;
        
            mso-tstyle-colband-size:0;
        
            mso-style-noshow:yes;
        
            mso-style-priority:99;
        
            mso-style-parent:"";
        
            mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
        
            mso-para-margin:0cm;
        
            mso-pagination:widow-orphan;
        
            font-size:10.0pt;
        
            font-family:"Times New Roman",serif;}
        
        </style>
        
        
        </head>
        
        
        
        <body lang="EN-GB" link="blue" vlink="#954F72" style="overflow-wrap: break-word; overflow-y: scroll;">
        
        <!--StartFragment-->
        
        
        
        <table class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100.0%;background:#B8CCE2;border-collapse:collapse;mso-yfti-tbllook:
        
         1184;mso-padding-alt:0cm 0cm 0cm 0cm">
        
         <tbody><tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:yes">
        
          <td valign="top" style="padding:0cm 0cm 0cm 0cm">
        
          <table class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100.0%;border-collapse:collapse;mso-yfti-tbllook:1184;
        
           mso-padding-alt:0cm 0cm 0cm 0cm">
        
           <tbody><tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:yes">
    
            <!-- Color fondo -->
        
        
            <td valign="top" style="background:#264bff;padding:0cm 0cm 0cm 0cm">
        
            <div align="center">
        
            <table class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100.0%;border-collapse:collapse;mso-yfti-tbllook:
        
             1184;mso-padding-alt:0cm 0cm 0cm 0cm">
        
             <tbody><tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes">
        
              <td valign="top" style="padding:0cm 0cm 0cm 0cm">
        
              <div align="center">
        
              <table class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0" width="600" style="width:450.0pt;border-collapse:collapse;mso-yfti-tbllook:
        
               1184;mso-padding-alt:0cm 0cm 0cm 0cm">
        
               <tbody><tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:yes">
        
                <td width="600" valign="top" style="width:450.0pt;padding:0cm 0cm 0cm 0cm">
        
                <div align="center">
        
                <table class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100.0%;border-collapse:collapse;mso-yfti-tbllook:
        
                 1184;mso-padding-alt:0cm 0cm 0cm 0cm">
        
                 <tbody><tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:
        
                  yes">
        
                  <td valign="top" style="padding:3.75pt 3.75pt 3.75pt 3.75pt">
        
                  <div align="center">
        
                  <table class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100.0%;border-collapse:collapse;
        
                   mso-yfti-tbllook:1184;mso-padding-alt:0cm 0cm 0cm 0cm">
        
                   <tbody><tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:
        
                    yes">
        
                    <td valign="top" style="padding:0cm 0cm 0cm 0cm">
        
                    <p class="MsoNormal" style="line-height:30.0pt;mso-line-height-rule:
        
                    exactly"><span style="font-size:30.0pt;mso-fareast-font-family:
        
                    &quot;Times New Roman&quot;">&nbsp; <o:p></o:p></span></p>
        
                    </td>
        
                   </tr>
        
                  </tbody></table>
        
                  </div>
        
                  </td>
        
                 </tr>
        
                </tbody></table>
        
                </div>
        
                </td>
        
               </tr>
        
              </tbody></table>
        
              </div>
        
              </td>
        
             </tr>
        
             <tr style="mso-yfti-irow:1;mso-yfti-lastrow:yes">
        
              <td valign="top" style="padding:0cm 0cm 0cm 0cm">
        
              <div align="center">
        
              <table class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0" width="600" style="width:450.0pt;border-collapse:collapse;mso-yfti-tbllook:
        
               1184;mso-padding-alt:0cm 0cm 0cm 0cm">
        
               <tbody><tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:yes">
        
                <td width="600" valign="top" style="width:450.0pt;background:white;
        
                padding:3.75pt 0cm 3.75pt 15.0pt">
        
                <table class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100.0%;border-collapse:collapse;mso-yfti-tbllook:
        
                 1184;mso-padding-alt:0cm 0cm 0cm 0cm">
        
                 <tbody><tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:
        
                  yes">
        
                  <td valign="top" style="padding:0cm 18.75pt 0cm 18.75pt">
        
                  <p class="MsoNormal" style="line-height:18.75pt"><span style="font-size:1.0pt;mso-fareast-font-family:&quot;Times New Roman&quot;">&nbsp;<o:p></o:p></span></p>
        
                  <p class="MsoNormal" style="line-height:18.75pt"><img width="203" src="https://tujob.co/webimages/emplea_logo_azul.png" align="left" style="outline: none;-ms-interpolation-mode: bicubic;border-bottom-width:
        
                  0in;border-left-width:0in;border-right-width:0in;border-top-width:
        
                  0in;clear:both;float:none;height:auto;max-width:203px;text-decoration:
        
                  none;width:100%;display:block" alt="Image" class="left fixedwidth" border="0" title="Image"><span style="font-size:1.0pt;mso-fareast-font-family:
        
                  &quot;Times New Roman&quot;">&nbsp;<o:p></o:p></span></p>
        
                  </td>
        
                 </tr>
        
                </tbody></table>
        
                </td>
        
               </tr>
        
              </tbody></table>
        
              </div>
        
              </td>
        
             </tr>
        
            </tbody></table>
        
            </div>
        
            <p class="MsoNormal" align="center" style="text-align:center;background:white"><span style="mso-fareast-font-family:&quot;Times New Roman&quot;;display:none;mso-hide:
        
            all"><o:p>&nbsp;</o:p></span></p>
        
            <div align="center">
        
            <table class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100.0%;border-collapse:collapse;mso-yfti-tbllook:
        
             1184;mso-padding-alt:0cm 0cm 0cm 0cm">
        
             <tbody><tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes">
        
              <td valign="top" style="padding:0cm 0cm 0cm 0cm;border-top:transparent;
        
              border-left:transparent;border-bottom:transparent;border-right:transparent">
        
              <div align="center">
        
              <table class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0" width="600" style="width:450.0pt;border-collapse:collapse;mso-yfti-tbllook:
        
               1184;mso-padding-alt:0cm 0cm 0cm 0cm">
        
               <tbody><tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:yes">
        
                <td width="600" valign="top" style="width:450.0pt;background:white;
        
                padding:3.75pt 26.25pt 0cm 26.25pt">
        
                <div align="center">
        
                <table class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100.0%;border-collapse:collapse;mso-yfti-tbllook:
        
                 1184;mso-padding-alt:0cm 0cm 0cm 0cm">
        
                 <tbody><tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes">
        
                  <td valign="top" style="padding:7.5pt 7.5pt 7.5pt 7.5pt">
        
                  <p style="margin:0cm;mso-line-height-alt:12.75pt"><span style="font-size:16.5pt;font-family:&quot;Arial&quot;,sans-serif;color:#132F40">Olvide mi contraseña?</span><span style="font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;
        
                  color:#132F40"><o:p></o:p></span></p>
        
                  </td>
        
                 </tr>
        
                 <tr style="mso-yfti-irow:1;mso-yfti-lastrow:yes">
        
                  <td valign="top" style="padding:3.75pt 7.5pt 22.5pt 7.5pt">
        
                  <p style="margin:0cm;line-height:15.75pt"><span style="font-size:
        
                  10.5pt;font-family:&quot;Arial&quot;,sans-serif;color:#555555">Para restabler tu contraseña selecciona el boton
                  recuperar. Se te llevara a una pantalla de restablecimiento de contraseña en donde deberas colocar tu nueva contraseña
                  si presentas errores no dudes en contactarnos.<o:p></o:p></span></p>
        
                  </td>
        
                 </tr>
        
                </tbody></table>
        
                </div>
        
                </td>
        
               </tr>
        
              </tbody></table>
        
              </div>
        
              </td>
        
             </tr>
        
             <tr style="mso-yfti-irow:1;mso-yfti-lastrow:yes">
        
              <td valign="top" style="padding:0cm 0cm 0cm 0cm">
        
              <div align="center">
        
              <table class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0" width="600" style="width:450.0pt;border-collapse:collapse;mso-yfti-tbllook:
        
               1184;mso-padding-alt:0cm 0cm 0cm 0cm">
        
               <tbody><tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:yes">
        
                <td width="600" valign="top" style="width:450.0pt;background:white;
        
                padding:11.25pt 26.25pt 1.5pt 26.25pt">
        
                <div align="center">
        
                <table class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100.0%;border-collapse:collapse;mso-yfti-tbllook:
        
                 1184;mso-padding-alt:0cm 0cm 0cm 0cm">
        
                 <tbody><tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes">
        
                  <td valign="top" style="padding:11.25pt 7.5pt 11.25pt 7.5pt">
        
                  <p style="margin:0cm;line-height:12.75pt"><span style="font-size:
        
                  12.0pt;font-family:&quot;Arial&quot;,sans-serif;color:#555555">Para </span><strong><span style="font-size:12.0pt;
        
                  font-family:&quot;Arial&quot;,sans-serif;color:#132F40">Restablecer contraseña </span></strong><span style="font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;color:#555555"><o:p></o:p></span></p>
        
                  <p style="margin:0cm;line-height:12.75pt"><span style="font-size:
        
                  12.0pt;font-family:&quot;Arial&quot;,sans-serif;color:#555555">Solo tienes que presionar en el siguiente boton.</span><span style="font-size:10.5pt;font-family:
        
                  &quot;Arial&quot;,sans-serif;color:#555555"><o:p></o:p></span></p>
        
                  </td>
        
                 </tr>
        
                 <tr style="mso-yfti-irow:1;mso-yfti-lastrow:yes">
        
                  <td valign="top" style="padding:3.75pt 7.5pt 26.25pt 7.5pt">
        
                  <p class="MsoNormal"><span style="mso-fareast-font-family:&quot;Times New Roman&quot;"><span style="mso-ignore:vglayout"><map name="MicrosoftOfficeMap0">
                      <area shape="Polygon" coords="30, 3, 11, 11, 3, 30, 11, 49, 30, 56, 272, 56, 289, 49, 297, 30, 289, 11, 272, 3, 30, 3" href="https://tujob.co/form_reset_password_company.php?email=' . $regi_email . '&token=' . $token . '">
                    </map>
                    <img border="0" width="239" height="46" src="https://tujob.co/webimages/boton_restablecer_blue.png" 
                    usemap="#MicrosoftOfficeMap0" alt="Rectangle: Rounded Corners: ACTIVATE MY ACCOUNT > "
                     v:shapes="_x0000_s1026"></span>
                     <span style="mso-fareast-font-family:&quot;Times New Roman&quot;"><o:p></o:p></span></p>
        
                  </td>
        
                 </tr>
        
                </tbody></table>
        
                </div>
        
                </td>
        
               </tr>
        
              </tbody></table>
        
              </div>
        
              </td>
        
             </tr>
        
            </tbody></table>
        
            </div>
        
            <p class="MsoNormal" align="center" style="text-align:center;background:#132F40"><span style="mso-fareast-font-family:&quot;Times New Roman&quot;;display:none;mso-hide:
        
            all"><o:p>&nbsp;</o:p></span></p>
        
            <div align="center">
        
            <table class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100.0%;border-collapse:collapse;mso-yfti-tbllook:
        
             1184;mso-padding-alt:0cm 0cm 0cm 0cm">
        
             <tbody><tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes">
        
              <td valign="top" style="padding:0cm 0cm 0cm 0cm;border-top:transparent;
        
              border-left:transparent;border-bottom:transparent;border-right:transparent">
        
              <div align="center">
        
              <table class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0" width="600" style="width:450.0pt;border-collapse:collapse;mso-yfti-tbllook:
        
               1184;mso-padding-alt:0cm 0cm 0cm 0cm">
        
               <tbody><tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:yes">
        
                <td width="300" valign="top" style="width:225.0pt;background:#132F40;
        
                padding:11.25pt 0cm 11.25pt 18.75pt">
        
                <div align="center">
        
                <table class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100.0%;border-collapse:collapse;mso-yfti-tbllook:
        
                 1184;mso-padding-alt:0cm 0cm 0cm 0cm">
        
                 <tbody><tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:
        
                  yes">
        
                  <td valign="top" style="padding:7.5pt 7.5pt 7.5pt 7.5pt">
        
                  <p style="margin:0cm;line-height:12.75pt"><strong><span style="font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;color:#F8F8F8">Soporte@tujob.com</span></strong><span style="font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;color:#F8F8F8"><o:p></o:p></span></p>
        
                  <p style="margin:0cm;line-height:12.75pt"><span style="font-size:
        
                  10.5pt;font-family:&quot;Arial&quot;,sans-serif;color:#F8F8F8">www.tujob.co <br>
                  Bogota D.C , Colombia. 110111<o:p></o:p></span></p>
        
                  </td>
        
                 </tr>
        
                </tbody></table>
        
                </div>
        
                </td>
        
                <td width="300" valign="top" style="width:225.0pt;background:#132F40;
        
                padding:3.75pt 0cm 3.75pt 0cm;border-top:transparent;border-left:transparent;
        
                border-bottom:transparent;border-right:transparent">
        
                <p class="MsoNormal" align="right" style="text-align:right;line-height:
        
                15.0pt;vertical-align:top"><span style="font-size:1.0pt;mso-fareast-font-family:
        
                &quot;Times New Roman&quot;;color:white;mso-color-alt:windowtext">&nbsp;</span><span style="font-size:1.0pt;mso-fareast-font-family:&quot;Times New Roman&quot;"><o:p></o:p></span></p>
        
                <div align="right">
        
                <table class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0" width="55" style="width:41.25pt;border-collapse:collapse;mso-yfti-tbllook:
        
                 1184;mso-padding-alt:0cm 0cm 0cm 0cm;border-spacing: 0" height="32">
        
                 <tbody><tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:
        
                  yes">
        
                  <td valign="top" style="padding:0cm 26.25pt 7.5pt 7.5pt;word-break:
        
                  break-word">
        
                  <div align="right">
        
                  <table class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100.0%;border-collapse:collapse;
        
                   mso-yfti-tbllook:1184;mso-padding-alt:0cm 0cm 0cm 0cm;word-break:
        
                   break-word">
        
                   <tbody><tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-row-margin-right:
        
                    24.0pt">
        
                    <td width="32" valign="top" style="width:24.0pt;padding:0cm 7.5pt 0cm 0cm">
        
                    <table class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0" align="left" width="32" style="width:24.0pt;border-collapse:collapse;
        
                     mso-yfti-tbllook:1184;margin-left:-2.25pt;margin-right:-2.25pt;
        
                     mso-table-anchor-vertical:paragraph;mso-table-anchor-horizontal:
        
                     column;mso-table-left:left;mso-padding-alt:0cm 0cm 0cm 0cm">
        
                     <tbody><tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:
        
                      yes">
        
                      <td valign="top" style="padding:0cm 0cm 0cm 0cm">
        
                      <p class="MsoNormal" style="line-height:3.75pt"><span style="font-size:1.0pt;mso-fareast-font-family:&quot;Times New Roman&quot;">&nbsp;<o:p></o:p></span></p>
        
                      </td>
        
                     </tr>
        
                    </tbody></table>
        
                    </td>
        
                    <td style="mso-cell-special:placeholder;border:none;padding:0cm 0cm 0cm 0cm" width="32"><p class="MsoNormal">&nbsp;</p></td>
        
                   </tr>
        
                   <tr style="mso-yfti-irow:1;mso-yfti-lastrow:yes" width="84">
        
                    <td width="32" valign="top" style="width:24.0pt;padding:0cm 0cm 0cm 0cm;
        
                    word-break:break-word">
        
                    <table class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0" align="left" width="32" style="width:24.0pt;border-collapse:collapse;
        
                     mso-yfti-tbllook:1184;margin-left:-2.25pt;margin-right:-2.25pt;
        
                     mso-table-anchor-vertical:paragraph;mso-table-anchor-horizontal:
        
                     column;mso-table-left:left;mso-padding-alt:0cm 0cm 0cm 0cm;
        
                     border-spacing: 0" height="32">
        
                     <tbody><tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:
        
                      yes;border-spacing: 0">
        
                      <td valign="top" style="padding:0cm 0cm 0cm 0cm">
        
                      <p class="MsoNormal" style="line-height:3.75pt"><span style="font-size:1.0pt;mso-fareast-font-family:&quot;Times New Roman&quot;">&nbsp;<o:p></o:p></span></p>
        
                      </td>
        
                     </tr>
        
                    </tbody></table>
        
                    </td>
        
                    <td width="32" valign="top" style="width:24.0pt;padding:0cm 0cm 0cm 0cm;
        
                    word-break:break-word">
        
                    <table class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0" align="left" width="32" style="width:24.0pt;border-collapse:collapse;
        
                     mso-yfti-tbllook:1184;margin-left:-2.25pt;margin-right:-2.25pt;
        
                     mso-table-anchor-vertical:paragraph;mso-table-anchor-horizontal:
        
                     column;mso-table-left:left;mso-padding-alt:0cm 0cm 0cm 0cm;
        
                     border-spacing: 0" height="32">
        
                     <tbody><tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:
        
                      yes">
        
                      <td valign="top" style="padding:0cm 0cm 0cm 0cm">
        
                      <p class="MsoNormal" style="line-height:3.75pt"><span style="font-size:1.0pt;mso-fareast-font-family:&quot;Times New Roman&quot;">&nbsp;<o:p></o:p></span></p>
        
                      </td>
        
                     </tr>
        
                    </tbody></table>
        
                    </td>
        
                   </tr>
        
                  </tbody></table>
        
                  </div>
        
                  </td>
        
                 </tr>
        
                </tbody></table>
        
                </div>
        
                </td>
        
               </tr>
        
              </tbody></table>
        
              </div>
        
              </td>
        
             </tr>
        
             <tr style="mso-yfti-irow:1;mso-yfti-lastrow:yes">
        
              <td valign="top" style="padding:0cm 0cm 0cm 0cm">
        
              <div align="center">
        
              <table class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0" width="600" style="width:450.0pt;border-collapse:collapse;mso-yfti-tbllook:
        
               1184;mso-padding-alt:0cm 0cm 0cm 0cm">
        
               <tbody><tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:yes">
        
                <td width="600" valign="top" style="width:450.0pt;padding:3.75pt 0cm 3.75pt 0cm">
        
                <div align="center">
        
                <table class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100.0%;border-collapse:collapse;mso-yfti-tbllook:
        
                 1184;mso-padding-alt:0cm 0cm 0cm 0cm">
        
                 <tbody><tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:
        
                  yes">
        
                  <td valign="top" style="padding:3.75pt 3.75pt 3.75pt 3.75pt">
        
                  <div align="center">
        
                  <table class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100.0%;border-collapse:collapse;
        
                   mso-yfti-tbllook:1184;mso-padding-alt:0cm 0cm 0cm 0cm">
        
                   <tbody><tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:
        
                    yes">
        
                    <td valign="top" style="padding:0cm 0cm 0cm 0cm">
        
                    <p class="MsoNormal" style="line-height:22.5pt;mso-line-height-rule:
        
                    exactly"><span style="font-size:22.5pt;mso-fareast-font-family:
        
                    &quot;Times New Roman&quot;">&nbsp; <o:p></o:p></span></p>
        
                    </td>
        
                   </tr>
        
                  </tbody></table>
        
                  </div>
        
                  </td>
        
                 </tr>
        
                </tbody></table>
        
                </div>
        
                </td>
        
               </tr>
        
              </tbody></table>
        
              </div>
        
              </td>
        
             </tr>
        
            </tbody></table>
        
            </div>
        
            </td>
        
           </tr>
        
          </tbody></table>
        
          </td>
        
         </tr>
        
        </tbody></table>
        
         
        <p class="MsoNormal"><span style="mso-fareast-font-family:&quot;Times New Roman&quot;"><o:p>&nbsp;</o:p></span></p>
        
        
        </body></html>
        ';



        $mail = new PHPMailer(true);

        try {
            $mail->IsSMTP();
            $mail->CharSet = 'UTF-8';

            $mail->Host = 'smtp.hostinger.co';
            $mail->Port = 587;
            $mail->SMTPDebug  = 0;
            $mail->SMTPAuth = true;
            $mail->Username = 'recovery@tujob.co';
            $mail->Password = 'Empleatic123.';

            $mail->setFrom('recovery@tujob.co');
            $mail->addAddress($regi_email);
            $mail->addReplyTo($regi_email);

            $mail->isHTML(true);
            $mail->Subject = "Recuperacion | Contraseña , por tuJob";
            $mail->Body = '' . $message;


            $mail->send();
            echo 'Message has been sent';
            header("Location: ../empresas.php#submited_info");
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        header("Location: ../empresas.php#submited_info");
    }
}
