<?php


     $hero1 = new User('Hero1','access level 5','0');
     print $hero1->name.'<br>';
   //  var_dump($hero1);      // 07_ print all object's variables
     print "print The user's name: $hero1->name  <br />";
     print $hero1;
    
    /*printing arrays */ 
    // Ok $bar = array("value" => "foo");
    // Ok print "this is {$bar['value']} !"; // works only with {}
     // no way! : print "this is 2 $bar['value'] !"; // this is foo !

     

class User {

    public $name = null;
    public $access = null;
    public $visits = null;
     
     function __construct($n='',$a='',$v=''){
          $this->name = $n;
          $this->access = $a;
          $this->visits = $v; 
     }
     
     function __toString(){
          return 'name - '.$this->name.'; access level - '.$this->access.'; number of visits - '.$this->visits.';';
     }
}

class UniUser {

    public $uni = null;
     
     function __construct($n='',$a='',$v='',$u=''){
          parent::__construct($n,$a,$v);
          $this->uni = $u;
     }
}








?>
