<html>
<head>
<script type="text/javascript">

function show_confirm2()
{
var r=confirm("Do you want to Drop the record?");
return r;
}

function popup() {
var windowprops = "width=200,height=200,top=100,left=100";
var myWin = window.open( "f1_book.php", "mynewwin" ,windowprops );
}

</script>
</head>
<body>




<?


  include_once('DB.php');
  

if (get_magic_quotes_gpc( )) {
echo "Magic quotes are enabled.";
} else {
echo "Magic quotes are disabled.";
}


    print "<a href=f3.php?pn='PN25'>link PN</a>";

     $tr='';
     $tr.="<table width=100%>
           <form method='POST' action='f2_2_2.php' onsubmit='return show_confirm2();'>
          <tr><td>Job ID (UW IDs)</td>        
        <td>  
              <input type ='submit' name='PN2'  value ='go f2 with confirm2() - f2_2_2.php'>
            </form>
        </td></tr></table>";
    print $tr;

     $tr='';
     $tr.="<table width=100%>
          
          <form method='POST' action='f3.php' onsubmit='popup(); return false'>
          <tr><td>Job ID (UW IDs)</td>        
        <td>  
              <input type ='submit' name='PN3' value ='onsubmit=popup()-f3.php'>
              
            </form>
        </td></tr></table>";


    print $tr;
    
    $tr='';
    $tr.="<table width=100%>";
          
    $tr.="    <form method='POST' action='f3.php' target='_blank'>";
    $tr.="     <tr><td>blank f3</td> ";       
    $tr.="    <td> "; 
    $tr.="         <input type ='submit' name='PN3' value ='go f3 with _blank'>";
    $tr.="        </form>";
    $tr.="    </td></tr></table>";


    print $tr;
    

?>

<a href="#" onclick="popup();return false">
Open f1_book.php
</a>

</body>
</html>


