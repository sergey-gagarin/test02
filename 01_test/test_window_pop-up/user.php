



<?
$str = "new window - GET : ".$_GET['pids']."<br>";

$str.= "from POST = ".$_POST['post_ids'];

print "<form>
      <input type=\"button\" value=\"print\" onClick=\"window.print();\">
      </form>";

?>
