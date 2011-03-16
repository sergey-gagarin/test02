<?
//---------------------------------------------------------------------------
// 07-Jun-09
//---------------------------------------------------------------------------


print "<h2>This is the 2222222 </h2>";

if($_POST['book_image']){echo "it has come<br>";}
echo "$book_image['tmp_name']";

!@move_uploaded_file($book_image['tmp_name'],$upload_dir . $book_image['name']);

$upload_page = 'index.php';
$upload_dir = '01';

?>
//------------------------------------------------------------------------------


