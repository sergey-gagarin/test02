<?
############################################\
# Создание скрипта: -=FreeMan=-             #
# Имя скрипта: Гостевая книга               #
# Версия скрипта: 2.1                       #
# Статус: скрипт стоит $45                  #
# Требования: PHP3 и выше                   #
# Дата создания скрипта: 14 марта 2004 год  #
# Мыло:  freemen1983@inbox.ru               #
#############################################
#         Читай файл readme.txt             #
############################################/
include("../data.php");

	session_start();
	if ($login != null)
	{
		session_register("login");
	}
	else
	{
		session_unregister("login");
	}
	if ($password != null)
	{
		session_register("password");
		$password = md5($password);
              
              
                    
	}
	else
	{
		session_unregister("password");
	}
	if($login == $adminName && $password == $secretPassword)
	{
		Header("Location: index.php?page=".$page."&PHPSESSID=".$PHPSESSID);exit;
	}
	else
	{
		if(isset($login) || isset($password))
		{
			@sleep(2);
                { if (empty($log_ip)){ if (getenv('HTTP_X_FORWARDED_FOR'))
                { $log_ip=getenv('HTTP_X_FORWARDED_FOR'); }
                else {$log_ip=getenv('REMOTE_ADDR'); } }
                else {$log_ip=getenv('REMOTE_ADDR'); }
                $log_host=gethostbyaddr("$log_ip");
                $log_date=date('d\.m\.Y, H:i:s');
                $log_file=fopen("admin.log","a+");
                $p = eregi_replace("<","&lt;","$p");
                $p = eregi_replace(">","&gt;","$p");
                if($p=="") {$p=""; }
                fputs ($log_file,"$log_ip<> $log_host<> $log_date<> $login<> $password<>$p\n");
                fclose ($log_file);

        } 
                       
			$warning = "<font color=red><center><b>В доступе отказано!!!</b></font></center>";
		}
		session_unregister("password");
		session_unregister("login");
 
?>

<head>
<Title>Введите логин и пароль админа</Title>
</head>

		<br><br>
<body lang=RU style='tab-interval:35.4pt'>
<table class=MsoNormalTable border=0 align=center cellspacing=0 cellpadding=0 bgcolor="#9db0cb"
 style='margin-left:29.55pt;border-collapse:collapse;border:none;mso-border-alt:
 three-d-engrave windowtext 6.0pt;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:6.0pt three-d-engrave windowtext;mso-border-insidev:6.0pt three-d-engrave windowtext'>
 <tr style='mso-yfti-irow:0;mso-yfti-lastrow:yes;height:351.0pt'>
  <td width=400 valign=top style='width:441.0pt;border:double windowtext 6.0pt;
  mso-border-alt:three-d-engrave windowtext 6.0pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:250.0pt'> <p class=MsoNormal><o:p>&nbsp;</o:p>

<style type="text/css">
<!--
.field	{border: 1px; border-style: solid; border-color: #000000; background-color: #ffe6b7; font-family: verdana; font-size: 10px; color: #de0000;}
#field	{border: 1px; border-style: solid; border-color: #000000; background-color: #fef1d8; font-family: verdana; font-size: 10px; color: #de0000;}


input.field {
	width : 170px
}

input.button {
	border-style: outset;
	width: 230px;
	cursor: hand;
	background : rgb(212,208,200);
	background: #96A096
}
<?=$style?>
a:link {
	text-decoration : none
}

a:visited {
	text-decoration : none
}

a:active {
	text-decoration : none
}

a:hover {
	text-decoration : underline
}

.redtext {
	font : 8pt "Verdana","Arial Cyr", "Arial","Tahoma","Helvetica", sans-serif;
	color : #c00000;
}

.text {
	font : 8pt "Verdana","Arial Cyr", "Arial","Tahoma","Helvetica", sans-serif;
	color : #000000
}

#line {
	color : #000000;
}

textarea {
	font-size : 8pt;
	font-family : "Verdana",Arial,sans-serif;
	color : #000000;
	background : rgb(212,208,200);
	border-style : ridge;
	width : 380px
}

input {
	font-size : 8pt; font-family : "Verdana",Arial,sans-serif;
	color : #000000
}

input.field {
	border-style : ridge;
	width : 190px;
	background : rgb(212,208,200);
}

input.button {
	border-style : outset;
	width : 190px;
	cursor : hand;
	background : rgb(212,208,200);
}


body {
	scrollbar-face-color : #FFFFFF;
	scrollbar-shadow-color : #000000;
	scrollbar-highlight-color : #FFFFFF;
	scrollbar-3dlight-color : #FFFFFF;
	scrollbar-darkshadow-color : #FFFFFF;
	scrollbar-track-color : #488a96;
	scrollbar-arrow-color : #000000
} 

-->
</style>
<body bgcolor="#a0c0c0">
<table border=0 align=center>
<tr><td>
<table width="500" align="center" cellspacing="1" cellpadding="1" bgcolor="#9db0cb">
  <TBODY>
  <TR>
    <TD vAlign=bottom align=middle bgColor=#ffffff colSpan=2><IMG height=56 
      src="cr_head.gif" width=600 border=0></TD></TR>
  <TR>
    <TD align=middle bgColor=#9db0cb colSpan=2><B><FONT 
      face="Times New Roman, Times, serif" color=#ffffff 
      size=3></FONT>&nbsp;  <? session_start();
	if ($login != null)
	{
		session_register("login");
        print"сессия открыта";

	}
	else
	{
		session_unregister("login");
        print"сессия закрыта";
	}
?>
      <FONT face="Times New Roman, Times, serif" color=#ffffff 
      size=3><align=right></B></TD></TR>
  <TR>
    <TD bgColor=#ffffff colSpan=2>
      <P align=center><IMG height=16 src="gb_div1.gif" 
      width=600 border=0></P></TD></TR>
  <TR>
    <TD colSpan=2 height=5>&nbsp;</TD></TR>
  <TR>
    <TD bgColor=#9db0cb colSpan=2>
      <DIV align=center>
      <TABLE cellSpacing=0 cellPadding=0 width=524 border=0>
        <TBODY>
    

<form action="login.php?page=<?=$page?>&PHPSESSID=<?=$PHPSESSID?>" method="post">
<tr>
<TABLE cellSpacing=0 cellPadding=0 width=525 align=center border=0> 
<td valign="bottom" class="text">
		<p><?=$warning?>
		<p>Логин :<br><input type="text" name="login" value="" maxlength="255" size="15" class="field" onfocus="id=className" onblur="id=''"" style="font: italic; width: 190px">
		<p>Пароль :<br><input type="password" name="password" value="" maxlength="255" size="15" class="field" onfocus="id=className" onblur="id=''"" style="font: italic; width: 190px">
	<TABLE cellSpacing=0 cellPadding=0 width=525 align=center border=0> 
<TBODY>
<TD colSpan=2>
      <P align=center><IMG height=16 src="gb_div1.gif" 
      width=600 border=0>	
                <input type="submit"value="   Войти        "  class="button">
		<input type="button" value="назад     " class="button" onClick="javascript:window.location.href='logout.php'">

				<?php @include("top.inc"); ?>
</TD></TR>
</form>
</body>
<?php @include("in-counter.inc"); ?>
<TABLE cellSpacing=0 cellPadding=0 width=525 align=center border=0> 
<TBODY>
<TD bgColor=#ffffff colSpan=2>
      <P align=center><IMG height=56 src="cr_down.gif" 
      width=600 border=0></TD></TR></TBODY></FORM></BODY></center></TABLE>
</html>
<?
	}
?>
