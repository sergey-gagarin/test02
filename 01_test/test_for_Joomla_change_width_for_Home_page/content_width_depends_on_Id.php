<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
<head>
  <jdoc:include type="head" /> 
  
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  
     <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/system.css" type="text/css" />
     <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/general.css" type="text/css" />
  	<link href="<?php echo $this->baseurl; ?>/templates/explorecc/css/styles.css" rel="stylesheet" type="text/css" />
  	<link rel="shortcut icon" href="<?php echo $this->baseurl; ?>/templates/explorecc/images/favicon.ico" type="image/x-icon" />
  </head>

  <body>





    


    
    <div id="top">
      <h3>explore culture</h3>
    </div>
    
    <div id="banner">
         
    </div> 
    

    
    <div id="user3">
          complete cultural experience in language and cuisine
          
          
    </div> 

 
      <!--div id="user4">
        <jdoc:include type="modules" name="user3" style="xhtml" />
    </div--> 



     
     <?php
  ////////////////// function to get the global parameter - page id ///////////
     
    function getItemid(){
                          global $Itemid;
                          return $Itemid;
                        }
    $newItemid = getItemid();  /// to be used on the page (==1 for home page) 
?>   


    <div id="menu">
    <div class="two">

     <jdoc:include type="modules" name="left" style="xhtml" />

    </div>
    </div>



<!-- width for home page=640, for the rest of the pages = 790  -->
    <div id="content" <? $style="style=\"width: 790px;\""; if ($newItemid!=1) echo $style;  ?>   >
    <jdoc:include type="component" />
    </div>


<!-- module Upcoming Special evemts - for home page only; display:none - for the rest  -->
    <div id="right"  <? $style="style=\"display:none;\""; if ($newItemid!=1) echo $style;  ?>   >
     <jdoc:include type="modules" name="right" style="xhtml" />

    </div>

     
    
    

    

    
    <div id="clear">
  clear    fix !!!!!!!!!!
    </div>
    
    <div id="footer">
    footer content
    </div>

  </body>   
</html>
