<?
// "" === 34
// '' === 39


/// ------------------------------ try 2 -------------------------------------------- 
if(isset($_POST['sub'])){

    echo "text in = ".$_POST['in'];
    echo "text in_h = ".$_POST['in_h'];
    echo "<br>The second form with hidden in:
          <form action=r1_replace.php method=POST>
         <br>the in =  <input type='text' size='20' name='in' value='".str_replace("'","&#8217",$_POST['in'])."'>
          <input type='hidden' name=in_h value='".str_replace("","&#8217",$_POST['in'])."'>
          <input type='submit' name='sub2' value='222 second'>
          </form>";
}

if(isset($_POST['sub2'])){
    echo "<br>the fimal: <br>";
    echo "text from 2 form in = ".$_POST['in_h'];
    echo "   AND  text from 2 form in_h = ".$_POST['in_h'];
    
    }

print "<br>The first form: <br>
      <form action=r1_replace.php method=POST>
     start <input type='text' size='20' name='in'>
      <input type='hidden' name=in_h value='in'>
      <input type='submit' name='sub' value='start form'>
      </form> ";
//------------------------ END try 2 -----------------------------------


$input = "Name = O'Reily !!  'some' text";
$input2 = 'Name&aposs';

  $res = str_replace(" ", "++", $input ); /// change " " to ++ ///
  $res2 = str_replace("!", "&#38", $input ); /// change "!" to & ///
  $res3 = str_replace("!", "&#39", $input ); /// change " 34 " to " 39" ///
  
echo $res;
echo "<br>";
echo "RES 2 =  ".$res2;
echo "<br>";
echo "res 3 &#34 = &#39  ".$res3;
echo "<br>";

/// no double quotes on the text !! => value =\"  . $text .   \"   can be used 
echo  htmlentities($input, ENT_QUOTES );
echo "<br>";

$str = "A 'quote' is <b>bold</b>" ;
    // ???????: A 'quote' is &lt;b&gt;bold&lt;/b&gt;
echo htmlentities ( $str );
echo "<br>";
    // ???????: A &#039;quote&#039; is &lt;b&gt;bold&lt;/b&gt;
echo htmlentities ( $str , ENT_QUOTES ); 
echo "<br>";


print "<input type='text' name='name1' size='50' value=\"$input2\">   <br>";

print "<input type='text' name='name1' size='50' value=\"$input\">  <br>";
print "<input type='text' name='name1' size='50' value=\"$input\">  <br>";

$str = '<font color="ff000">\ ???? ????? ????????? ? ????? ?????? ?? ???????? \</font>';
echo $str;



?>
