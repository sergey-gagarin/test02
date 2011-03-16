<?
//---------------------------------------------------------------------------
// 07-Jun-09
//---------------------------------------------------------------------------
include('header.inc');

print "<h2>This is the INDEX page of test_3_attach_files_db </h2>";

show_all();

function show_all(){
global $db;

//$sql= "SELECT * FROM jobs WHERE db_status = '1' ORDER BY address";
$sql= "SELECT * FROM jobs WHERE db_status = '1' ORDER BY j_number";
$db->execute($sql);
$_inf = $db->get_array();

print "<h2> List of all jobs </h2>";


while($_inf) 
    {
     $tr='';
     $tr.="<table border=1 width=700px>";
     $tr.="<form method='POST' action='index.php?page=jobs'>";
     
     $tr.="<tr>";
     $tr.="<td>".$_inf['j_number']."</td> <td>".$_inf['j_id']."</td> <td>".$_inf['j_type']."</td>";
     $tr.="<td>".$_inf['j_started']."</td> <td>".$_inf['j_civil']."</td> <td>".$_inf['crew']."</td>";
     $tr.="</tr>";
     
     $tr.="<tr>";
     $tr.="<td colspan=2>".$_inf['address']."</td> <td>".$_inf['suburb']."</td> <td>".$_inf['postcode']."</td>";
     $tr.="<td>".$_inf['council']."</td> <td>".$_inf['area']."</td>";
     $tr.="</tr>";
     
     $tr.="<tr>";
     $tr.="<td>".$_inf['d_issued']."</td> <td>".$_inf['d_started']."</td> <td>".$_inf['d_req']."</td>";
     $tr.="<td>".$_inf['d_sub']."</td> <td>".$_inf['d_sub_compl']."</td> <td>".$_inf['d_prac_compl']."</td>";
     $tr.="</tr>";
     
     $tr.="<tr>";
     $tr.="<td colspan=6>".$_inf['notes']."</td>";
     $tr.="</tr>";
     
     $tr.="<tr>";
     $tr.="<td colspan=3>".$_inf['printed']."</td>";
     $tr.="<td colspan=3>".$_inf['claim']."</td>";
     $tr.="</tr>";
     
   
    
     $tr.= "<td colspan=3 align='center'><input type ='submit' name='change' value ='change'></td>";
        
     $tr.="</form>
            
     
            <td  colspan=3 align='center'>
                  <form method='POST' action='index.php?page=reinstatements_for_1jobN'>
                    <input type ='submit' name='reinst_job' value ='reinstatements list'>
                    <input type='hidden' name='j_number' value='".$_inf['j_number']."'>
     
                  </form>
                  
            </td>
            </tr></table><br>";
            
      print $tr;
     

     $_inf = $db->get_array();
    }

//print "</table>";




}
//------------------------------------------------------------------------------



?>
<form enctype="multipart/form-data" action="img.php" method="post">
<input type="hidden" name="MAX_FILE_SIZE" value="16000" />
Send this file: <input name="book_image" type="file" /><br />
<input type="submit" value="Upload" />
</form>


<?php
//If you have received a submission.
if ($_POST['submitted'] == "yes"){
$goodtogo = true;
//Check for a blank submission.

try {
if ($_FILES['image']['size'] == 0){
$goodtogo = false;
throw new exception ("Sorry, you must upload an image.");
}
} catch (exception $e) {
echo $e->getmessage();
}
//Check for the file size.
try {
if ($_FILES['image']['size'] > 500000){
$goodtogo = false;
//Echo an error message.
throw new exception ("Sorry, the file is too big at approx: ". intval ($_FILES['image']['size'] / 1000) . "KB");
}
} catch (exception $e) {
echo $e->getmessage();
}
//Ensure that you have a valid mime type.
$allowedmimes = array ("image/jpeg","image/pjpeg");
try {
if (!in_array ($_FILES['image']['type'],$allowedmimes)){
$goodtogo = false;
throw new exception ("Sorry, the file must be of type .jpg.Yours is: " . $_FILES['image']['type'] . "");
}
} catch (exception $e) {
echo $e->getmessage ();
}
//If you have a valid submission, move it, then show it.
if ($goodtogo){
try {
//if (!move_uploaded_file ($_FILES['image']['tmp_name'],"01/".$_FILES['image']['name'].".jpg")){
if (!move_uploaded_file ($_FILES['image']['tmp_name'],"01/".$_FILES['image']['name'])){
$goodtogo = false;
throw new exception ("There was an error moving the file.");
}
} catch (exception $e) {
echo $e->getmessage ();
}
}
if ($goodtogo){
//Display the new image.
?>
<img src="01/<?php echo $_FILES['image']['name']; ?>"
alt="" title="" /><?php
}?>
<br /><a href="index.php">Try Again</a>
<?php }
//Only show the form if there is no submission.
if ($_POST['submitted'] != "yes"){
?>

<form action="index.php" method="post" enctype="multipart/form-data">
<p>Example:</p>
<input type="hidden" name="submitted" value="yes" />
Image Upload (.jpg only, 500KB Max):<br />
<input type="file" name="image" />  <br />
<input type="submit" value="Submit" style="margin-top: 10px" />
</form>
<?php
}
?>

<br><br>
<input type='button' value='button' onClick='fff'>






