

SITE ADMIN   -  Add new Section <br>

<?

if(isset($_POST['insert'])){
$t=$_POST['sec_title'];
$c=$_POST['Category'];
$p=$_POST['published'];
$g=$_POST['pages'];
$d=$_POST['description'];
$cc=$_POST['content'];

$sql = "INSERT INTO sections (
sec_title,
cat_fkey,
published,
pages,
description,
content
) VALUES ('".$t."','".$c."','".$p."','".$g."','".$d."','".$cc."')";

global $db;
$db->execute($sql);
}

$sql2= "SELECT * FROM categories";
$db->execute($sql2);
$cat_inf = $db->get_array();

while($cat_inf) 
    {
      $cat_titles[] = $cat_inf['cat_title'];
      $cat_inf = $db->get_array();
    }
    
?> 
    <form method="POST" action="admin.php">
        
      <table border="1">
      
      <tr> <th>Section Title</th><td><INPUT type="text" name="sec_title" size="50"></td></tr>
      <tr> <th></th><td>Choose category</td></tr>
       
        <? foreach($cat_titles as $cat){ ?>
       <tr>  
          <td>
              <? echo $cat; ?>
          </td>
          <td>
              <input type="radio" name="Category" value="<? echo $cat; ?>" >
          </td> 
        </tr>
      <? } ?>


        
        <tr> <td>Published (0,1)</td><td><INPUT type="text" name="published" size="5"></td></tr>
        <tr> <td>Pages</td><td><INPUT type="text" name="pages" size="5"></td></tr>
        <tr> <td>Description</td><td><INPUT type="text" name="description" size="50"></td></tr>
        <tr> <td colspan=2><textarea cols="70" rows="10" name="content">content</textarea></td></tr>
      </table>
    <input type ="submit" name="insert" value ="insert">
    </form>
    <br><br>


