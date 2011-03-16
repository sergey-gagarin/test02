<?php
if(isset($go)){
$file = "$fn.note";
$contents = stripslashes("$contents");
$fp = fopen("$file","a+");
fputs($fp, "$contents"); 
fclose($fp);
}

if(isset($del)){
unlink("$del");
}

if(isset($edit)){
$file = "$note";
$contents = stripslashes("$contents");
unlink("$note");
$fp = fopen("$file","w+");
fputs($fp, "$contents"); 
fclose($fp);
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>WebNotes v1.0</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<?php
if(isset($go)){
echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php\">";
}
if(isset($del)){
echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php\">";
}
else{
echo "<meta http-equiv=\"refresh\" content=\"2;URL=javascript:window.close()\">";
}
?>
</head>

<body bgcolor="#333333" text="#FFFFFF" link="#FFFF00" vlink="#FFFF00" alink="#FFFF00" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<div align="center">
  <table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
      <td align="center" valign="middle"><font color="#cccccc" size="2" face="Verdana">[ 
        DONE ]</font><br>
    </tr>
  </table>
</div>
</body>
</html>
