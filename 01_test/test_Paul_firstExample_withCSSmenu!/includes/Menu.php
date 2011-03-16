<div class="menu">
<?php
//////////////////////////////////////////////////////////////
// getting category titles from category table
// calling $db=Database (created in header.inc) in db2.php

$sql= "SELECT * FROM categories";
$db->execute($sql);
$cat_inf = $db->get_array();

while($cat_inf) 
    {
      $cat_titles[] = $cat_inf['cat_title'];
      $cat_inf = $db->get_array();
    }
    
//////////////////////////////////////////////////////////////////
// getting sections titles for each category from section table
// and putting them in menu (CSS handles menu = main.css) 
    
$sql_sections = "SELECT * FROM sections where cat_fkey = ";
?>

      <div id="navContainer">
        <div id="navigation">
         <ul>
          
          
      <? foreach($cat_titles as $cat_menu){ ?>
          <li>
              <? // category=Home is the only link in this menu 
                if($cat_menu=='Home') {echo "<a href=\"index.php?category=".$cat_menu."\">".$cat_menu."</a>"; 
                } else {echo "<p>".$cat_menu."<p>";}  ?> 
            <ul>
             <? // for each category get subsections and build sub-menu  
             $db->execute($sql_sections."'".$cat_menu."'");
             $sec_inf = $db->get_array();
             while($sec_inf)
              {  $sec_menu = $sec_inf['sec_title'];
                 $sec_inf = $db->get_array();
                 $sec_menu_href="<a class=\"menuitem\" href=\"index.php?category=".$cat_menu."&section=".$sec_menu."\"".">".$sec_menu."</a>";
             ?>
                <li>
                 <? print $sec_menu_href; ?>
                </li>            
             <?}?>  
                <!--/li--> 
            </ul>
                
          </li>
      <?}?>
          </ul>

        </div>
      </div>
</div>
