<?

class User{

var $name;
var $age;
function User($n='ss', $a=''){
    
    $this->name = $n;
    $this->age = $a;

    } 
function getAge(){
    return $this->age;
  }
  
function getName(){
    return $this->name;
  }
  
public function __toString(){

    $n = str_replace("'","&#39",$this->name);
    return "\"".$n."::".$this->age."\"";
    }


}

?>
