<!--$sitebuilder version="2.9.0" extra="Java(1.8.0_161)" md5="7bf2855958a22a149628e216534b1b34"$-->
<!--$templateKey Religious|Pagoda - Blue|2.0$-->
<html>
  <head>
    <title>Contact Us</title>
    <meta name="generator" content="SiteBuilder/2.9.0/1.8.0_161">
    <!--$page size 762, 3000$-->
    <!--$page margin 0, 1, 20, 1$-->
    <!--$centered$-->
    <!--$fontFamily Arial$-->
    <!--$fontSize 10$-->
    <style type="text/css"><!--
      BODY {font-family:"Arial"; font-size:10;margin:0px;padding:0px;text-align:center;min-width:607px;}
      P {font-family:"Arial"; font-size:10;}
      FORM {margin:0;padding:0;}
      #centerwrapper {text-align:left;width:607px;margin-left:auto;margin-right:auto;}
    --></style>
    <script type="text/javascript">// workaround for IE table layout bugs
      function tableWorkaround(cols) { if (document.all) { document.write('<tr>'); for (var i = 0; i < cols; i++) { document.write('<td></td>'); } document.write('</tr>') }; }
      function tableWorkaround2_colheader() { if (document.all) { document.write('<col width="0">') }; }
      function tableWorkaround2(rowHeight) { if (document.all) { document.write('<td height="' + rowHeight + '">'); document.write('</td>') }; }
    </script>
  </head>
  <body bgcolor="#FFFFFF" text="#000000" link="#0000FF" vlink="#800080" topmargin="0" leftmargin="0">

  <?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL"; 
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}
	// potongan program insert untuk simpan ke tabel
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
  
  
<!--$begin exclude$-->
    <div id="centerwrapper">
      <div id="root" style="position:absolute;width:607px;height:451px;">
<!--$end exclude$-->
        <div id="e0" style="position:absolute;left:171;top:151;width:435;height:31;"><span class="text"><font color="#333333"><span style="font-size:10px;line-height:13px;">Register your account<br soft></span></font></span>        </div>
        <div id="e1" style="position:absolute;left:265;top:38;width:125;height:29;">
          <table border="0" cellspacing="0" cellpadding="0" width="125">
            <tr>
              <td nowrap height="29" align="center" valign="top"><span class="text"><b><font color="#003399" size="4"><span style="font-size:20px;line-height:24px;">R</span></font></b><font color="#003399" size="4"><span style="font-size:20px;line-height:24px;">egister<br soft></span></font></span></td>
            </tr>
          </table>
        </div>
        <div id="e2" style="position:absolute;left:171;top:198;width:357;height:233;"><!--$form formEmail="" formConfirmPage="" formErrorPage="%PageAssetImpl:/contactus.html" defaultURL="http://[SITE_CODE].webhosting.luminate.com/forms?login=[MEMBER_NAME]&to=[EMAIL]&confirm=[PAGE]&error=[ERROR_PAGE]"$-->
<script type="text/javascript">
function checkForm2() {
if (document.forms.Form2.elements['email'].value.length == 0) {
    alert('Please enter a value for the "Your email address" field');
    return false;
}
  return true;
}
</script>
<form style="margin-top:0;margin-bottom:0;" name="Form2" onSubmit="if (checkForm2()) alert('You must publish this page to your account\nfor the form to function.'); return false;">
<!--$name Contact Us$--><!--$table$--><!-- IE tablecell height workaround --><!--$begin exclude$--><table border="0" cellspacing="0" cellpadding="0"><tr><td><!--$end exclude$--><table style="table-layout:fixed;border:0px none #000000" width=357 height=233 border=0 cellspacing=0 cellpadding=0><col width="357"><tr>
<td style="border:0px none #DCDCDC" width="357" height="233" valign="top">        <table border="0" cellspacing="0" cellpadding="0" width="357" height="233">
          <col width="125">
          <col width="10">
          <col width="2">
          <col width="20">
          <col width="90">
          <col width="78">
          <col width="11">
          <col width="21">
          <script>tableWorkaround2_colheader()</script>
          <tr>
            <td width="137" height="5" colspan="3"></td>
            <td height="26" width="188" colspan="3" rowspan="3" valign="top"><input name="name" value="<?php echo $name;?>" size="25"></td>
            <td width="32" height="5" colspan="2"></td>
            <script>tableWorkaround2(5)</script>
          </tr>
          <tr>
            <td nowrap height="19" width="125" valign="top"><span class="text"><font size="2"><span style="font-size:12px;line-height:15px;">Your name:<br soft></span></font></span></td>
            <td width="12" height="19" colspan="2"></td>
            <td width="32" height="19" colspan="2"></td>
            <script>tableWorkaround2(19)</script>
          </tr>
          <tr>
            <td width="137" height="2" colspan="3"></td>
            <td width="32" height="2" colspan="2"></td>
            <script>tableWorkaround2(2)</script>
          </tr>
          <tr>
            <td width="357" height="13" colspan="8"></td>
            <script>tableWorkaround2(13)</script>
          </tr>
          <tr>
            <td width="137" height="5" colspan="3"></td>
            <td height="26" width="188" colspan="3" rowspan="3" valign="top"><!--$required message="Please enter a value for the &quot;Your email address&quot; field"$--><input name="email" value="<?php echo $email;?>" size="25"></td>
            <td width="32" height="5" colspan="2"></td>
            <script>tableWorkaround2(5)</script>
          </tr>
          <tr>
            <td nowrap height="19" width="125" valign="top"><span class="text"><font size="2"><span style="font-size:12px;line-height:15px;">Your email address:<br soft></span></font></span></td>
            <td width="12" height="19" colspan="2"></td>
            <td width="32" height="19" colspan="2"></td>
            <script>tableWorkaround2(19)</script>
          </tr>
          <tr>
            <td width="135" height="2" colspan="3"></td>
            <td width="30" height="2" colspan="2"></td>
            <script>tableWorkaround2(2)</script>
          </tr>
          <tr>
            <td nowrap height="15" width="123" valign="top"><span class="text"><font size="2"><span style="font-size:12px;line-height:12px;">Username:<br soft></span></font></span></td>
            <td width="10" height="19" colspan="2"></td>
            <td width="30" height="19" colspan="2"></td>
            <script>tableWorkaround2(19)</script>
          </tr>
          <tr>
            <td width="135" height="2" colspan="2"><input type="name" value="<?php echo $username;?>" id="username"></td>
            <td width="30" height="2" colspan="2"></td>
            <script>tableWorkaround2(2)</script>
          </tr>
          <tr>
            <td width="350" height="18" colspan="8"></td>
            <script>tableWorkaround2(18)</script>
          </tr>
          <tr>
            <td nowrap height="19" width="125" rowspan="2" valign="top"><span class="text"><font size="2"><span style="font-size:12px;line-height:15px;">Password<br soft></span></font></span></td>
            <td width="232" height="1" colspan="7"></td>
            <script>tableWorkaround2(1)</script>
          </tr>
          <tr>
            <td width="10" height="18"></td>
            <td height="68" width="201" colspan="5" rowspan="2" valign="top"><div style="width:201px;height:68px;overflow:auto;"><!--$begin html$--><input type="password" value="<?php echo $password;?>" id="password"><!--$end html$--></div>
</td>
            <td width="21" height="18"></td>
            <script>tableWorkaround2(18)</script>
          </tr>
          <tr>
            <td width="135" height="50" colspan="2"></td>
            <td width="21" height="50"></td>
            <script>tableWorkaround2(50)</script>
          </tr>
          <tr>
            <td width="357" height="11" colspan="8"></td>
            <script>tableWorkaround2(11)</script>
          </tr>
          <tr>
            <td width="157" height="30" colspan="4"></td>
            <td height="30" width="90" valign="top"><input type="submit" value="Submit"></td>
            <td width="110" height="30" colspan="3"></td>
            <script>tableWorkaround2(30)</script>
          </tr>
          <tr>
            <td width="357" height="1" colspan="8"></td>
            <script>tableWorkaround2(1)</script>
          </tr>
          <script>tableWorkaround(9)</script>
        </table>
</td>
</tr>
</table>
<!-- IE tablecell height workaround --><!--$begin exclude$--></td></tr></table><!--$end exclude$--></form>
        </div>
<!--$begin exclude$-->
      </div>
    </div>
<!--$end exclude$-->
  </body>
</html>
