<?
include ('user.php');
 set_magic_quotes_runtime(0); //ensure this is always off

 $serg = new User("sergey's gagarin","33");
 $arr;

if(!isset($_POST['go'])){

   
    print $serg->getAge()."  ".$serg->getName();
    echo "<br>The object was created <br>";
  
}




if(isset($_POST['go'])){
      $r = $_POST['sss'];
    echo "ok = $r";
    }
    
   
    
    print "serg print = ".$serg;
 $f="<form action='use_obj.php' method='post'>
          <input type='hidden' name='sss' value=$serg>
          <input type='submit' name='go' value='go'>     
      </form>";
    print $f;

?>
