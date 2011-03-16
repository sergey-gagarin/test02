<?PHP
/*
* Aspect-Oriented Programming PHP API
*
* @package aophp
* @author $Author: sheiko $  
* @version $Id: aop.lib.php,v 2.0 2006/04/18 15:58:15 sheiko Exp $ 
* @since v.1.0 
* @copyright (c) Dmitry Sheiko http://www.cmsdevelopment.com 
*/ 

/**
* Aspect class, which declare an aspect 
* @package Aspect-Oriented Programming Library 
* @author $Author: sheiko $ 
*/
class Aspect {

   /**
     * Aspect's pointcuts array
     * @var pointer
     * @access private
     */	
	var $pointcuts;
   /**
     * Aspect's environment array
     * @var array
     * @access private
     */		
	var $env;
	
 	/** 
    * Class constructor 
    * @return object 
    */ 	
	function Aspect() {
		global $_ENV_;
		if(!isset($_ENV_)) $_ENV_  = array();
		$this->pointcuts = array();
		$this->env = &$_ENV_;
		return $this;
	}
	
	/** 
    * Add set of join points
    * @param string $CommandString special string in format "call MethodName1 or call MethodName2"
    * @return boolean
    */ 	
	function pointcut($CommandString) {
		return new Pointcut($CommandString, $this->pointcuts);
	}

	/** 
    * Set up environment
    * @param string $Section A new value of env
    * @param mixed $NewValue A new value of env
    * @return array
    */ 	
	function Env($Section=false, $NewValue=false) {
		if($Section) { $this->env[$Section] = $NewValue; return $this->env[$Section]; }
		return $this->env;
	}
	/** 
    * Set up environment
    * @param string section
    * @param mixed a new value of env
    * @return boolean
    */ 		
	function addEnv($Section=false, $NewValue=false) {
		if($Section) $this->env[$Section][] = $NewValue;
		return true;
	}
	/** 
    * Apply the aspect
    * @param string aspect object
    * @return boolean
    */ 		
	function apply(&$Aspect) {
		global $_ENV_;
		// We use global variable $_ENV_, because this method can be applied directly Aspect::apply
		if(!isset($_ENV_["ActiveAspects"])) $_ENV_["ActiveAspects"] = array();
		$_ENV_["ActiveAspects"][] = &$Aspect;
		return true;
	}		
	/** 
    * Class destructor 
    * @return boolean
    */ 		
	function destroy() {
		unset($this);
	}
}

/**
* Pointcut class, which declare an pointcut of the aspect (http://en.wikipedia.org/wiki/Advice_in_aspect-oriented_programming)
* @package Aspect-Oriented Programming Library 
* @author $Author: sheiko $ 
*/
class Pointcut extends Aspect {

   /**
     * Pointcut's methods array
     * @var array
     * @access private
     */			
	var $Methods;
   /**
     * Aspect's environment array
     * @var array
     * @access private
     */			
	var $pointcuts;

 	/** 
    * Class constructor 
    * @return object 
    */ 		
	function Pointcut($CommandString, &$pointcutsReference) {
		$this->Methods = array();
		$this->pointcuts = &$pointcutsReference;

		// Validate Input Parameters
		if(!is_string($CommandString)) trigger_error("CommandString parameter must be STRING", E_USER_ERROR);
		
		// Parse CommandString
		$this->Methods = split(" ", strtolower( preg_replace("/\s\s+/", " ", preg_replace("/(call\s|or\s)/is", "", trim($CommandString)))));
		if(!$this->Methods) trigger_error("CommandString does not contain methods names", E_USER_ERROR);
		return true;
	}

	/** 
    * Processing of start point
    * @param string $EvalCode
    * @return boolean
    */ 		
	function _before($EvalCode=false) {
		if(!$EvalCode) return false;
		$this->__apply("_before", $EvalCode);
		return true;
	}
	
	/** 
    * Processing of finish point
    * @param string $EvalCode
    * @return boolean
    */ 		
	function _after($EvalCode=false) {
		if(!$EvalCode) return false;
		$this->__apply("_after", $EvalCode);
		return true;
	}
	
	/** 
    * Processing of specified event point
    * @param string $EventID
    * @param string $EvalCode
    * @return boolean
    */ 		
	function _event($EventID=false, $EvalCode=false) {
		if(!$EventID OR !$EvalCode) return false;
		$this->__apply($EventID, $EvalCode);
		return true;
	}	
		
	/** 
    * Private service method
    * @param string $Point (_before|_after)
    * @param string $EvalCode
    * @return boolean
    */ 
	function __apply($Point, $EvalCode) {
		$Method = '';
		// Validate Input Parameters
		if(!$EvalCode)  trigger_error("This function parameter is invalid. Value of the parameter has to satisfy the eval code syntax", E_USER_ERROR);
		if(!$this->Methods) trigger_error("There is a need to define pointcut", E_USER_ERROR);
		foreach($this->Methods as $Method) {
			array_push($this->pointcuts,array($Method=>array($Point=>$EvalCode)));
		}
		return true;
	}
	
 	/** 
    * Class destructor 
    * @return boolean
    */ 		
	function destroy() {
		unset($this);
	}
	
}

/**
* Advice service function package (http://en.wikipedia.org/wiki/Advice_in_aspect-oriented_programming)
* @package Aspect-Oriented Programming Library 
* @author $Author: sheiko $ 
*/

class Advice {
	/** 
    * Parent method name getting
    * @return boolean
    */ 	
	function getFunctionInfo() {
		$backtrace = debug_backtrace();
		if(!isset($backtrace[2]["class"])) $backtrace[2]["class"] = false;
		if(!isset($backtrace[2]["function"])) $backtrace[2]["function"] = false;
		return array(strtolower($backtrace[2]["class"]), strtolower($backtrace[2]["function"]));
	}
	/** 
    * Get eval code of the joinpont
    * @return string
    */ 	
	function getEvalCode($pointcut, $Event="_before", $ClassName=false, $MethodName=false) {
		$EvalCode = '';
		if(!is_array($pointcut)) return false;
		if(	isset($pointcut[$MethodName][$Event]) ) $EvalCode .= $pointcut[$MethodName][$Event];
		if(	isset($pointcut[$ClassName."::".$MethodName][$Event]) ) $EvalCode .= $pointcut[$ClassName."::".$MethodName][$Event];
		if(	isset($pointcut["*::".$MethodName][$Event] )) $EvalCode .= $pointcut["*::".$MethodName][$Event];
		if(	isset($pointcut[$ClassName."::*"][$Event] )) $EvalCode .= $pointcut[$ClassName."::*"][$Event];
		if(	isset($pointcut["*::*"][$Event]) ) $EvalCode .= $pointcut["*::*"][$Event];
		return $EvalCode;
	}	
	/** 
    * _Before process declaration
    * @return boolean
    */ 	
	function _before(&$obj) {
		global $_ENV_;
		list($ClassName, $MethodName) = Advice::getFunctionInfo();
		if(!isset($_ENV_["ActiveAspects"])) return false;
		foreach($_ENV_["ActiveAspects"] as $AspectObj) {
			if (gettype($AspectObj)!="object") trigger_error("This function parameter is invalid. Value of the parameter has to satisfy the Aspect object requirements", E_USER_ERROR);
			$backtrace = debug_backtrace();
			foreach($AspectObj->pointcuts as $pointcut){
				$EvalCode = Advice::getEvalCode($pointcut, "_before", $ClassName, $MethodName);
				if($EvalCode) {
					$Result = @eval($EvalCode." return true;" );
					if(!$Result) _trigger::error("_before process of the applied Aspect contains incorrect eval code");
				}
			}
		}
		return true;
	}
	/** 
    * _After process declaration
    * @return boolean
    */ 	
	function _after(&$obj) {
		global $_ENV_;
		list($ClassName, $MethodName) = Advice::getFunctionInfo();
		
		if(!isset($_ENV_["ActiveAspects"])) return false;
		foreach($_ENV_["ActiveAspects"] as $AspectObj) {
			if (gettype($AspectObj)!="object") trigger_error("This function parameter is invalid. Value of the parameter has to satisfy the Aspect object requirements", E_USER_ERROR);

			$pointcuts = array();
			$size = count($AspectObj->pointcuts);
			$backtrace = debug_backtrace();
			for($i=0;$i<$size;$i++){
				if(Advice::getEvalCode($AspectObj->pointcuts[$i], "_after", $ClassName, $MethodName)){
					array_unshift($pointcuts,$AspectObj->pointcuts[$i]);
				}
			}
			
			foreach($pointcuts as $pointcut){
				$EvalCode = Advice::getEvalCode($pointcut, "_after", $ClassName, $MethodName);
				if($EvalCode) {
					$Result = @eval($EvalCode." return true;" );
					if(!$Result) _trigger::error("_after process of the applied Aspect contains incorrect eval code");
				}
			}
		}
		return true;
	}
	/** 
    * _Event process declaration (Register new event)
    * @param object $EventID
    * @return boolean
    */ 	
	function _event($EventID, &$obj) {
		global $_ENV_;
		list($ClassName, $MethodName) = Advice::getFunctionInfo();
		if(!isset($_ENV_["ActiveAspects"])) return false;
		foreach($_ENV_["ActiveAspects"] as $AspectObj) {
			if (gettype($AspectObj)!="object") trigger_error("This function parameter is invalid. Value of the parameter has to satisfy the Aspect object requirements", E_USER_ERROR);
			$backtrace = debug_backtrace();
			foreach($AspectObj->pointcuts as $pointcut){
				$EvalCode = Advice::getEvalCode($pointcut, $EventID, $ClassName, $MethodName);
				if($EvalCode) {
					$Result = @eval($EvalCode." return true;" );
					if(!$Result) _trigger::error("{$EventID} process of the applied Aspect contains incorrect eval code");
				}
			}
		}
		return true;
	}	
}

/**
* Trigger service function package
* @package Aspect-Oriented Programming Library 
* @author $Author: sheiko $ 
*/
class _trigger {
	/** 
    * Error trigger
    * @param string $ErrorMessage
    * @return boolean
    */ 	
	function error($ErrorMessage) {
		$backtrace = debug_backtrace();
		$index = 2;
		die("<b>AOP Error:</b> ".$ErrorMessage." in <b>".$backtrace[$index]["file"]."</b> on line <b>".$backtrace[$index]["line"]."</b>");
		return true;
	}
} 
?>