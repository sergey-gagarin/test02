<?
############################################\
# Создание скрипта: -=FreeMan=-             #
# Имя скрипта: Гостевая книга               #
# Версия скрипта: 2.1                       #
# Статус: скрипт стоит $25                  #
# Требования: PHP3 и выше                   #
# Дата создания скрипта: 14 марта 2004 год  #
# Мыло:  freemen1983@inbox.ru               #
#############################################
#         Читай файл readme.txt             #
############################################/
	include("../data.php");
	session_start();
	if($login != $adminName && $password != $secretPassword)
	{
		session_destroy();
		Header("Location: login.php?page=".$page);exit;
	}
?>

<head>
<Title>Главная страница админа</Title>
</head>
<body lang=RU style='tab-interval:35.4pt'>
<table class=MsoNormalTable border=0 align=center cellspacing=0 cellpadding=0 bgcolor="#9db0cb"
 style='margin-left:29.55pt;border-collapse:collapse;border:none;mso-border-alt:
 three-d-engrave windowtext 6.0pt;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:6.0pt three-d-engrave windowtext;mso-border-insidev:6.0pt three-d-engrave windowtext'>
 <tr style='mso-yfti-irow:0;mso-yfti-lastrow:yes;height:351.0pt'>
  <td width=400 valign=top style='width:441.0pt;border:double windowtext 6.0pt;
  mso-border-alt:three-d-engrave windowtext 6.0pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:100.0pt'> <p class=MsoNormal><o:p>&nbsp;</o:p>

<style type="text/css">
<!--
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

<table width="525" align="center" cellspacing="1" cellpadding="1" bgcolor="#9db0cb">
  <TBODY>
  <TR>
    <TD vAlign=bottom align=middle bgColor=#ffffff colSpan=2><IMG height=56 
      src="cr_head.gif" width=600 border=0></TD></TR>
  <TR>
    <TD align=middle bgColor=#9db0cb colSpan=2><B><FONT 
      face="Times New Roman, Times, serif" color=#ffffff 
      size=3><align=left>Нарушители</left></FONT>&nbsp;
      <FONT face="Times New Roman, Times, serif" color=#ffffff 
      size=3><align=right>log файл</FONT></right></B></TD></TR>
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

<?
$onlyplog = "1000";
$p2messages = file("admin.log");
if ($pagelog == "")
{
$pagelog = "1";
}
$firstlog = count($p2messages) - ($onlyplog * ($pagelog - 1));
$secondlog = count($p2messages) - ($onlyplog * $pagelog) + 1;
if ($secondlog < 1)
{
$secondlog = 1;
}
$pageslog = (int) ((count($p2messages) + $onlyplog) / $onlyplog);
$linelog = "|";
for ($onlyplog = 1; $onlyplog <= $pageslog; $onlyplog++)
{
if ($onlyplog != $pagelog)
{
$linelog .= "";
}
if ($onlyplog == $pagelog)
{
$linelog .= " $onlyplog |";
}
}
echo "<table width=500 border=0 cellspacing=1 cellpadding=1 bgcolor=000080>";
$log_admin = file("admin.log");
if(count($log_admin) < "1")
{
echo "<tr><td bgcolor=#face7d align=center><font face=verdana size=2 color=de0000>Лог файл пуст!</font></td></td></tr>";
}
if(count($log_admin) == "1" or count($log_admin) > "1")
{
echo "<tr><td bgcolor=#face7d align=center colspan=5><font color=de0000 face=verdana size=2>Просмотр log файла</td></tr>";
echo "<tr><td bgcolor=#face7d align=center colspan=5><font face=verdana size=1>Ваш пароль на данный момент :  $secretPassword</td></tr>";
echo "<tr><td bgcolor=#face7d align=center><font color=de0000 face=verdana size=2>IP адрес</td><td bgcolor=#face7d align=center><font color=green face=verdana size=2>Хост</td><td bgcolor=#face7d align=center><font color=red face=verdana size=2>Дата</td><td bgcolor=#face7d align=center><font color=000000 face=verdana size=2>Введённый логин</td><td bgcolor=#face7d align=center><font color=000000 face=verdana size=2>Введённый пароль</td></tr>";
}
for ( $la = $firstlog-1; $la >= $secondlog-1; $la--)
{
list($log_ip,$log_host,$log_date,$log_login,$log_password)=explode("<>", $log_admin[$la]);
echo "<tr><td bgcolor=#face7d align=center><font color=000080 face=verdana size=2>$log_ip</td><td bgcolor=#face7d align=center><font color=000080 face=verdana size=2>$log_host</td><td bgcolor=#face7d align=center><font color=000080 face=verdana size=2>$log_date</td><td bgcolor=#face7d align=center><font color=000080 face=verdana size=2>$log_login</td><td bgcolor=#face7d align=center><font color=000080 face=verdana size=2>$log_password</td></tr>";
}
if(count($log_admin) == "1" or count($log_admin) > "1")
{
$coal2 = file("admin.log");
$coal = count($coal2);
echo "<form action=log.php method=get><tr><td bgcolor=#face7d align=center colspan=5><input type=submit name=logs  value=\"Очистить лог файл\"></td></tr>\n<tr><td bgcolor=#face7d align=center colspan=5><font color=000080 face=verdana size=2>Попыток входа не админом: <font color=de0000>$coal</font></font></td></tr></form>";
echo "</TABLE>";

}
if ($logs == "Очистить лог файл")
{
$log_f = fopen("admin.log","w+");
fputs ($log_f,"");
fclose ($log_f);
?>
<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php">
<?
}
?>


<TABLE cellSpacing=0 cellPadding=0 width=525 align=center border=0> 
<TBODY>
<TD bgColor=#ffffff colSpan=2>
      <P align=center><IMG height=16 src="gb_div1.gif" 
      width=600 border=0></TD></TR></TBODY></BODY></center></TABLE>
		<table border="0" cellpadding="0" cellspacing="0" align="center">		
		        
                        <input type="button" value="Добавить" class="button" onClick="javascript:location.href='cr.php?action=add_event&m=$m'">
                        <input type="button" value="Редактировать" class="button" onClick="javascript:location.href='cr.php?action=edit_event&m=$m'">
                        <input type="button" value="завершить сессию" class="button" onClick="javascript:location.href='logout.php'">
                        <input type="button" value="log файл" class="button" onClick="javascript:location.href='log.php'">
			<input type="button" value="назад" class="button" onClick="javascript:location.href='cr.php?action=add_event&m=$m'">
                        <input type="button" value="Обновления" class="button" onClick="javascript:location.href='http://script-php.pp.ru/download.php'">




		</table>
<TABLE cellSpacing=0 cellPadding=0 width=525 align=center border=0> 
<TBODY>
<TD bgColor=#ffffff colSpan=2>
      <P align=center><IMG height=56 src="cr_down.gif" 
      width=600 border=0></TD></TR></TBODY></FORM></BODY></center></TABLE>
</html>
