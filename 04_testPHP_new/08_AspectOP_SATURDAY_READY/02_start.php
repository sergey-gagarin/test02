<?php

//--------------------
// 1.   lib.php
//--------------------
include("aop.lib.php"); 

// advice 1
function someFunctionBeforeJoinPoint($arg=null)
{
    print "<div style=\"color: green;\">$arg According to the DB data you are the agency admin! Welcome! </div>";
}

// advice 2
function callAfter($arg=null)
{
    print "<div style=\"color: grey;\">$arg Why not to send an SMS to agency team members about changes? </div>";
}


//-----------------------
// 2. actions.php
//-----------------------

// create a new aspect:
$checkRoleAspect = new Aspect();

//Then we set up a Pointcut(set of joint points) - the methods it affects:       ( or call Agency::getTeams)
// pointcut(join points)
$pc1 = $checkRoleAspect->pointcut("call Agency::getMembers or call Agency::getTeams");

//The next step is to specify the program code - advices (functions) for entry  
//and/or for exit from decleared join points
//In other words for the decleared methods 
//in the current pointcut:
$pc1->_before("someFunctionBeforeJoinPoint('checkRoleAspect in action:');");
$pc1->_after("callAfter('checkRoleAspect in action:');");
$pc1->destroy();

Aspect::apply($checkRoleAspect);


//-------------------------------------
// business logic
//-------------------------------------                                         
$agency = new Agency();
print "<h3> Call getMembers() </h3>";
$agency->getMembers();

print "<h3> Call getTeams() </h3>";
$agency->getTeams();



//---------------------------
// 3. Model
//---------------------------
 class Agency
 {
  var $members = array('member1', 'member2','member3', 'member4', 'member5');
  var $teams = array('Team 1', 'Team 2','Team 3');
 
  function getMembers()
  {
        Advice::_before($this);
        
       foreach ($this->members as $m)
       {
          print "<br> Info about ".$m;
       }
       
       Advice::_after($this);
  }
  
  
  
  function getTeams()
  {
        Advice::_before($this);
        
       foreach ($this->teams as $t)
       {
          print "<br> Info about ".$t;
       }
       
       Advice::_after($this);
  }
 
 }




?>
