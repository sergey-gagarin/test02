<?php
function flist() {
$dir= getcwd();
$d=dir("$dir");
echo "<br><table width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"1\">";

while (false !== ($entry=$d->read())) 
{
$x=is_file($entry);

if($entry[0] !=".") 
{
if($entry != $x) {

$path = "$entry";
$file = basename ($path,".note"); // $file is set to "index"

//EXCLUDE THESE FILES FROM THE NOTE LISTING
if(($entry != $x)&&($entry != "readme.txt")&&($entry != "edit.php")&&($entry != "view.php")&&($entry != "header.inc")&&($entry != "footer.inc")&&($entry != "index.php")&&($entry != "proc.php")&&($entry != "list.inc")){

//WRITE THE NOTE LISTING
echo "<tr><td><font size=\"1\" face=\"Verdana\">$file</font></td><td><font size=\"1\" face=\"Verdana\"><a href=\"javascript:popUp('view.php?note=$entry')\">VIEW</a></font></td><td><font size=\"1\" face=\"Verdana\"><a href=\"javascript:popUp('edit.php?note=$entry')\">EDIT</a></font></td><td><font size=\"1\" face=\"Verdana\"><a href=\"proc.php?del=$entry\" target=\"_self\">DELETE</a></font></td></tr>";
}}
else {echo "";}}}
echo "</table>";
$d->close();
}
?>