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
      size=3><align=left>Правка /</left></FONT>&nbsp;
      <FONT face="Times New Roman, Times, serif" color=#ffffff 
      size=3><align=right>Удаление</FONT></right></B></TD></TR>
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
<?php
extract($HTTP_GET_VARS); 
extract($HTTP_POST_VARS);

$day123 =date("d");
$day12=date("dY");
$month123 =date("D M"); 
$year123 =date("Y"); 
$todate="$month123:$day123:$year123";

if($action == "add_event") {
$l=base64_decode($m);
if ($l==$password){
echo "<table align=center width=500 border=0 cellspacing=1 cellpadding=1 bgcolor=000080>
<tr><td align=center bgcolor=face7d><font face=verdana size=2 color=de0000> <center>Добавить событие :</center></font></td></tr><form method=\"post\" action=\"?action=submit_event\"></center>";
echo "<tr><td align=center bgcolor=face7d><font face=verdana size=2 color=de0000>Заголовок : <input type=text value=\"\" name=ename size=35></font></td></tr><tr><td align=center bgcolor=face7d><font face=verdana size=2 color=de0000>Например : мой день рождения!</font></font></td></tr>";
echo "<tr><td align=center bgcolor=face7d><font face=verdana size=2 color=de0000> Описание :</font></td></tr><tr><td align=center bgcolor=face7d><font face=verdana size=2 color=de0000> <textarea name=discription rows=5 cols=45></textarea></font></td></tr><tr><td align=center bgcolor=face7d><font face=verdana size=2 color=de0000>Описание вашего события. txt или  html </td></tr></font>";
echo "<tr><td align=center bgcolor=face7d><font face=verdana size=2 color=de0000> Дата события :</font></td></tr>";
?>
<tr><td align=center bgcolor=face7d><font face=verdana size=2 color=de0000>
Месяц :<select name=month style="FONT-FAMILY: arial; FONT-SIZE: 12px; FONT-WEIGHT: 200"><option value="">Выбор<option value="1">Январь<option value="2">Февраль<option value="3">Март<option value="4">Апрель<option value="5">Май<option value="6">Июнь<option value="7">Июль<option value="8">Август<option value="9">Сентябрь<option value="10">Октябрь<option value="11">Ноябрь<option value="12">Декабрь</select></span> День :<select name=day style="FONT-FAMILY: arial; FONT-SIZE: 12px; FONT-WEIGHT: 200"><option value="">Выбор<option value="1">01<option value="2">02<option value="3">03<option value="4">04<option value="5">05<option value="6">06<option value="7">07<option value="8">08<option value="9">09<option value="10">10<option value="11">11<option value="12">12<option value="13">13<option value="14">14<option value="15">15<option value="16">16<option value="17">17<option value="18">18<option value="19">19<option value="20">20<option value="21">21<option value="22">22<option value="23">23<option value="24">24<option value="25">25<option value="26">26<option value="27">27<option value="28">28<option value="29">29<option value="30">30<option value="31">31</select> Год :<input type=text name="year" value="" size=4 maxlength=4 >&nbsp;(Месяц, День, Год) </font></td></tr>
<?php echo"&nbsp;";
echo "<input type=hidden name=m value=$m>";
echo "<tr><td align=center bgcolor=face7d><font face=verdana size=2 color=de0000><input type=submit value=Добавить></form></font></td></tr></table>";
}
}
if($action == "submit_event") {
$l=base64_decode($m);
$ename= str_replace ("|~~|","|~|", $ename);
$discription= str_replace ("|~~|","|~|", $discription);
if ($l==$password){
$date="$month;$day;$year";
if(strlen($date)<=4){
echo "Событие для этого дня уже есть.";
}else{
$fp = fopen ("../calendar/".$month.$day.$year.".txt", "w");
fwrite ($fp, "[event]");
fwrite ($fp, $ename);
fwrite ($fp, "|~~|");
fwrite ($fp, $discription);
fwrite ($fp, "|~~|");
fwrite ($fp, $date);
fwrite ($fp, "|~~|");
fclose ($fp);
print "Событие добавленно.";
}
}
}
if($action=="edit_event"){
$l=base64_decode($m);
if ($l==$password){
if($do=="delete"){
if(file_exists("../calendar/".$f)){
unlink("../calendar/".$f);
echo "<CENTER><B>Событие успешно удалено</B></CENTER>";
}else{
echo "<CENTER><FONT COLOR=red><B>Событие не может быть удалено.</B></FONT></CENTER>";
}
}
$handle = @opendir("../calendar");
echo"<table width=100%><tr>";
echo "<td bgcolor=#ffcc00><CENTER>Редактировать / Удалить </CENTER></td></tr></table><table width=80%><tr><td align=middle bgcolor=#ffcc00>Дата (М-Д-Г)</td><td align=middle bgcolor=#ffcc00>Выбор </td><td align=middle bgcolor=#ffcc00> действия</td></tr>";
while (false !== ($file = readdir($handle))) {
if ($file != "." && $file != "..") {
$fd = fopen ("../calendar/".$file, "r");
$stuff = fread ($fd, filesize ("../calendar/".$file));
fclose ($fd);
$read=explode("[event]",$stuff);
$temp=explode("|~~|",$read[1]);
$fog=explode(";",$temp[2]);
echo"<tr bgcolor=face7d><td width=30%><table width=20%><td>$fog[0]-</td><td>$fog[1]-</td><td>$fog[2]</td></td></table><td>[<A HREF=?action=edit_e&m=$m&f=$file>Редактировать</A>]</td><td>[<a href=?action=edit_event&do=delete&m=$m&f=$file>Удалить</a>]</td></tr>";
}
}
closedir($handle);
}
}
if($action=="edit_e"){
$l=base64_decode($m);
if ($l==$password){
$fd = fopen ("../calendar/".$f, "r");
$stuff = fread ($fd, filesize ("../calendar/".$f));
fclose ($fd);
$read=explode("[event]",$stuff);
$temp=explode("|~~|",$read[1]);
$ffo=explode(";",$temp[2]);
echo "<table align=center width=500 border=0 cellspacing=1 cellpadding=1 bgcolor=000080>
<tr><td align=center bgcolor=face7d><font face=verdana size=2 color=de0000>
Редактирование события за :  $ffo[0] - $ffo[1] - $ffo[2] (М-Д-Г)</center></font></td></tr><form method=\"post\" action=\"?action=submit_event\">";
echo "<tr><td align=center bgcolor=face7d><font face=verdana size=2 color=de0000>Заголловок :</font></td></tr> <tr><td align=center bgcolor=face7d><font face=verdana size=2 color=de0000> <input type=text value=\"$temp[0]\" name=ename size=35></font></td></tr><tr><td align=center bgcolor=face7d><font face=verdana size=2 color=de0000> Например : мой день рождения!</font></td></tr>";
echo "<tr><td align=center bgcolor=face7d><font face=verdana size=2 color=de0000>Описание :</font></td></tr><tr><td align=center bgcolor=face7d><font face=verdana size=2 color=de0000><textarea name=discription rows=5 cols=45>$temp[1]</textarea></font></td></tr><tr><td align=center bgcolor=face7d><font face=verdana size=2 color=de0000> Описание вашего события. txt или html</font></td></tr>";
echo "<input type=hidden name=month value=$ffo[0]><input type=hidden name=day value=$ffo[1]><input type=hidden name=year value=$ffo[2]>";
echo "<input type=hidden name=m value=$m>";
echo "<tr><td align=center bgcolor=face7d><font face=verdana size=2 color=de0000> <input type=submit value=Редактировать>&nbsp;<input type=reset value=Сбросить></form></table>";
}
}
?>

<TABLE cellSpacing=0 cellPadding=0 width=525 align=center border=0> 
<TBODY>
<TD bgColor=#ffffff colSpan=2>
      <P align=center><IMG height=16 src="gb_div1.gif" 
      width=600 border=0></TD></TR></TBODY></BODY></center></TABLE>
		<table border="0" cellpadding="0" cellspacing="0" align="center">		
		        
                        <input type="button" value="Добавить" class="button" onClick="javascript:location.href='?action=add_event&m=$m'">
                        <input type="button" value="Редактировать" class="button" onClick="javascript:location.href='?action=edit_event&m=$m'">
                        <input type="button" value="завершить сессию" class="button" onClick="javascript:location.href='logout.php'">
                        <input type="button" value="log файл" class="button" onClick="javascript:location.href='log.php'">
			<input type="button" value="назад" class="button" onClick="javascript:location.href='index.php'">
                        <input type="button" value="Обновления" class="button" onClick="javascript:location.href='http://script-php.pp.ru/download.php'">




		</table>
<TABLE cellSpacing=0 cellPadding=0 width=525 align=center border=0> 
<TBODY>
<TD bgColor=#ffffff colSpan=2>
      <P align=center><IMG height=56 src="cr_down.gif" 
      width=600 border=0></TD></TR></TBODY></FORM></BODY></center></TABLE>
</html>