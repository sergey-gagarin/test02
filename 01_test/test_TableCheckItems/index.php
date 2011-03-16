<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <title>         Title   </title>
  
</head>

<body>

<?php
  $checkedIds = array();
  $Items = array(
    item1 => array('info' => 'content of the First info-item 1',
                    'id' => '11'), 
    item2 => array('info' => 'content of the Second info-item 2',
                    'id' => '22'),
  
    item3 => array('info' => 'content of the Third info-item 3',
                    'id' => '33'),
  
  );
  $CheckedIds = array();
?>

 <form name="tableForm" action="process.php" method="post">
        <table border='1' >
        <thead>
         <tr>
          <th> Check </th>
          <th> Info </th>
          <th> Item id</th>
         </tr>
        </thead>



<?php
          $r = 0;
         foreach($Items as $item) :
             echo "<tr class='class".$r."'>";
            
             echo "<td><input type='checkbox' name='checked[]' value=".$item[id]."></td>";
             
             echo "<td>   $item[info]  </td>";
             echo "<td>   $item[id]   </td>";
             echo "</tr>";
             $r=1-$r;
         endforeach
?>
          </table>
          
         <?
          echo "<input type='hidden' name='IdsList' value= $CheckedIds>"; 
           ?>
          <input type = "submit" value="submit">
    </form>
  </body>
</html>