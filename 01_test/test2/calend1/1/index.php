<?php
include('list.inc');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>WebNotes v1.0</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.input {
	scrollbar-3d-light-color: Black;
	scrollbar-arrow-color: White;
	scrollbar-base-color: #000000;
	scrollbar-dark-shadow-color: Black;
	scrollbar-face-color: Black;
	scrollbar-highlight-color: Black;
	scrollbar-shadow-color: #000000;
	font-family: Verdana;
	font-size: xx-small;
	font-style: normal;
	line-height: normal;
	font-weight: normal;
	font-variant: normal;
	text-transform: none;
	color: #CCCCCC;
	text-decoration: none;
	background-color: #000000;
	border: 1px solid #FFFFFF;
}
.button {
	font-family: Verdana;
	font-size: x-small;
	font-style: normal;
	line-height: normal;
	font-weight: normal;
	font-variant: normal;
	text-transform: none;
	color: #FFFFFF;
	text-decoration: none;
	background-color: #000000;
	border-top-width: 1px;
	border-right-width: 1px;
	border-bottom-width: 1px;
	border-left-width: 1px;
	border-top-style: solid;
	border-right-style: solid;
	border-bottom-style: solid;
	border-left-style: solid;
	border-top-color: #FFFFFF;
	border-right-color: #333333;
	border-bottom-color: #333333;
	border-left-color: #FFFFFF;
}
.table {
	background-color: #666666;
	border-top-width: 2px;
	border-right-width: 2px;
	border-bottom-width: 2px;
	border-left-width: 2px;
	border-top-style: solid;
	border-right-style: solid;
	border-bottom-style: solid;
	border-left-style: solid;
	border-top-color: #CCCCCC;
	border-right-color: #000000;
	border-bottom-color: #000000;
	border-left-color: #CCCCCC;
}
-->
</style>
<SCRIPT LANGUAGE="JavaScript">
function popUp(URL) {
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=0,width=400,height=400,left = 287,top = 109');");
}
</script>
</head>

<body bgcolor="#333333" text="#FFFFFF" link="#FFFF00" vlink="#FFFF00" alink="#FFFF00" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<div align="center">
  <table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
      <td align="center" valign="middle"><form action="proc.php" method="post" enctype="multipart/form-data" name="form1" target="_self">
<table width="282" border="0" cellspacing="0" cellpadding="1">
            <tr> 
              <td width="280" align="left" valign="bottom"><font color="#FFFFFF" size="1" face="Verdana"><strong>WebNotes 
                v1.0</strong></font></td>
            </tr>
            <tr> 
              <td align="center" valign="top"> <table width="276" border="0" cellpadding="0" cellspacing="0" class="table">
                  <tr> 
                    <td width="300" align="center" valign="middle"> <table width="276" border="0" cellpadding="6" cellspacing="0" bgcolor="#000000">
                        <tr> 
                          <td width="92" align="right" valign="top" bgcolor="#333333"><strong><font color="#FFFFFF" size="2" face="Verdana">FILENAME:</font></strong></td>
                          <td width="160" bgcolor="#333333"> <input name="fn" type="text" class="input" id="fn2" size="32"></td>
                        </tr>
                        <tr> 
                          <td align="right" valign="top" bgcolor="#333333"><strong><font color="#FFFFFF" size="2" face="Verdana">CONTENTS:</font></strong></td>
                          <td bgcolor="#333333"><textarea name="contents" cols="31" rows="7" class="input" id="contents"></textarea></td>
                        </tr>
                        <tr align="center" bgcolor="#333333"> 
                          <td colspan="2" valign="top"><font color="#000000"> 
                            <input name="go" type="submit" class="button" id="go" value="Save Note">
                            <br>
                            <?php flist(); ?>
                            <br>
                            </font> <font size="1" face="Verdana">[ <a href="index.php">REFRESH 
                            NOTE LIST</a> ]</font></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
          </table>
          <font color="#999999" size="1" face="Verdana">Copyright &copy;2002 NeoSites.com. 
          All rights reserved.</font> 
        </form></td>
    </tr>
  </table>
</div>
</body>
</html>
