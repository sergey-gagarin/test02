<html>
<head>
<?php

$hcolor="green"; //Цвет сегодняшнего дня и события 									
$bcolor="cccccc"; //цвет таблицы
												
extract($HTTP_GET_VARS);
extract($HTTP_POST_VARS);
if($act=="see_event"){
if (file_exists($link)){
$fd = fopen ($link, "r"); 
$stuff = fread ($fd, filesize ($link)); 
fclose ($fd);
$read=explode("[event]",$stuff);
$temp=explode("|~~|",$read[1]);
echo "<table width=100% cellspacing=0 cellpadding=0><td><table width=100%><td bgcolor=$hcolor>Событие для : <B>$month $cc $year</B></td></table></td><table width=100%><tr><td width=100% bgcolor=#f1f1f1>";
echo "$temp[0]</td></tr><tr><td>$temp[1]</td></tr></table></table>";
}else{
echo "Это событие было удалено";
}
exit;
}
?>
<style>
TD {
COLOR: #333333; FONT-FAMILY: Verdana, Arial; FONT-SIZE: 11px; LINE-HEIGHT: 150%; padding-left: 0;
}
.sun{
COLOR: #ffffff; FONT-FAMILY: Verdana, Arial; FONT-SIZE: 11px;FONT-WEIGHT: bold; Background:#ff9900; padding-left: 1;TEXT-DECORATION: none;
}
.norm{
COLOR: #000000; FONT-FAMILY: Verdana, Arial; FONT-SIZE: 11px;FONT-WEIGHT: bold; Background:#ffffff; padding-left: 1;TEXT-DECORATION: none;
}
</style>
</head>
<body>
<?php
$date=array("Вс","Пн","Вт","Ср","Чт","Пт","Сб");
$month=date("M");
$day=date("D");
$dt=date("d");
$datearray = getdate();
$month = $datearray['mon'];
$year = $datearray['year'];
if($m != ""){
if($m>"12"){
$year=$yr+1;
$month="1";
}
elseif($m<="0"){
$year=$yr-1;
$month="12";
}else{
$year=$yr;
$month=$m;
}
}else{
$month=date("m");
$m = $month;
$yr=$year;
$m=round($m,0);
$yr=round($yr,0);
}if($m=="1"){
$sho="January";
}elseif($m=="2"){
$sho="February";
}elseif($m=="3"){
$sho="March";
}elseif($m=="4"){
$sho="April";
}elseif($m=="5"){
$sho="May";
}elseif($m=="6"){
$sho="June";
}elseif($m=="7"){
$sho="July";
}elseif($m=="8"){
$sho="August";
}elseif($m=="9"){
$sho="September";
}elseif($m=="10"){
$sho="October";
}elseif($m=="11"){
$sho="November";
}elseif($m=="12"){
$sho="December";
}elseif($m=="13"){
$sho="January";
}elseif($m=="0"){
$sho="December";
}if($m=="1"){
$sh="Январь";
}elseif($m=="2"){
$sh="Февраль";
}elseif($m=="3"){
$sh="Март";
}elseif($m=="4"){
$sh="Апрель";
}elseif($m=="5"){
$sh="Май";
}elseif($m=="6"){
$sh="Июнь";
}elseif($m=="7"){
$sh="Июль";
}elseif($m=="8"){
$sh="Август";
}elseif($m=="9"){
$sh="Сентябрь";
}elseif($m=="10"){
$sh="Октябрь";
}elseif($m=="11"){
$sh="Ноябрь";
}elseif($m=="12"){
$sh="Декабрь";
}elseif($m=="13"){
$sh="Январь";
}elseif($m=="0"){
$sh="Декабрь";
}echo "<table width=100% align=left border=0><tr><td align=center>";
echo"<table><td><B>$sh $year</B></td></table></td></tr><tr><td>";
$start= mktime(0,0,0,$month,1,$year);
$firstdayarray = getdate($start);
$mo=$m;
$start1= mktime(0,0,0,$mo+1,$day,$year);
$firstmontharray = getdate($start1);
echo"<table align=center border=1 cellpadding=2 cellspacing=0 bordercolor=$bcolor>";
foreach($date as $day){
if($day=="Вс"){
$class="sun";
}else{
$class="norm";
}
echo "<td border=1 width=25 align=middle class=$class>$day</td>";
}
echo "<tr>";
if($firstdayarray[wday]=="0"){
$x=0;
}else{
$x=1;
}
for($y=$x;$y<=($firstmontharray[mday]+$firstdayarray[wday]);$y++){
if($y % 7 == 1){
echo "<tr>";
}
if($y == $firstdayarray[wday]+1){
$t=1;
}
$m=round($m);
if (file_exists("calendar/".$m.$t.$yr.".txt")) {
$link="calendar/".$m.$t.$yr.".txt";
$ti="<input type=button name=cc style=\"height:18;border-width:0;background:$hcolor;color:#ffffff;font-weight:bold;align:center;valign:middle;\" value=\"$t\" onclick=javascript:window.open(\"?act=see_event&month=$sho&year=$yr&cc=$t&link=$link\",TOP=50,LEFT=40,WIDTH=400,HEIGHT=250);>";
}else{
$ti= "$t";
}
if($t==$dt){
echo "<form method=post><td align=middle valign=middle bgcolor=$hcolor><B>$ti</B></td></form>";
}else{
echo "<form method=post><td align=middle valign=middle>$ti</td></form>";
}
if($t>="1"){
$t=$t+1;
}
}
?>
</body>
</html>
