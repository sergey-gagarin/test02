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
      size=3><align=left>Главная страница </left></FONT>&nbsp;
      <FONT face="Times New Roman, Times, serif" color=#ffffff 
      size=3><align=right>админа</FONT></right></B></TD></TR>
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
<TABLE cellSpacing=0 cellPadding=0 width=525 align=center border=0> 
<TBODY>
<table align=center width=500 border=0 cellspacing=1 cellpadding=1 bgcolor=000080>
<tr><td align=center bgcolor=face7d><font face=verdana size=2 color=de0000> Панель управления календарём выбирите следующее действие</font></td></tr>
<tr><td align=left bgcolor=face7d><font face=verdana size=2 color=de0000> <b>Добавить</b> - добавить новое событие. </font></td></tr>
<tr><td align=left bgcolor=face7d><font face=verdana size=2 color=de0000> <b>Редактировать </b> - изменить существующие событие. </font></td></tr>
<tr><td align=left bgcolor=face7d><font face=verdana size=2 color=de0000> <b>завершить сессию </b> - выйти.  </font></td></tr>
<tr><td align=left bgcolor=face7d><font face=verdana size=2 color=de0000> <b>log файл </b> - просмотреть нарушителей. </font></td></tr>
<tr><td align=left bgcolor=face7d><font face=verdana size=2 color=de0000> <b>назад </b> на шаг назад. </font></td></tr> 
<tr><td align=left bgcolor=face7d><font face=verdana size=2 color=de0000> <b>Обновления </b> - просмотреть есть ли новые версии этого скрипта.</font></td></tr>
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
</body>
</html>