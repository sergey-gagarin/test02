<?php
// PHP mail-processing script created by David Powers, 2007 (http://foundationphp.com/)
if (isset($_SERVER['SCRIPT_NAME']) && strpos($_SERVER['SCRIPT_NAME'], 'inc.php')) exit;
// remove escape characters from POST array
if (get_magic_quotes_gpc()) {
  function stripslashes_deep($value) {
    $value = is_array($value) ? array_map('stripslashes_deep', $value) : stripslashes($value);
    return $value;
    }
  $_POST = array_map('stripslashes_deep', $_POST);
  }

  // create empty array for any missing fields
  $missing = array();
  
  // assume that there is nothing suspect
  $suspect = false;
  // create a pattern to locate suspect phrases
  $pattern = '/Content-Type:|Bcc:|Cc:/i';
  
  // function to check for suspect phrases
  function isSuspect($val, $pattern, &$suspect) {
    // if the variable is an array, loop through each element
	// and pass it recursively back to the same function
	if (is_array($val)) {
      foreach ($val as $item) {
	    isSuspect($item, $pattern, $suspect);
	    }
	  }
    else {
      // if one of the suspect phrases is found, set Boolean to true
	  if (preg_match($pattern, $val)) {
        $suspect = true;
	    }
	  }
    }

  // check the $_POST array and any subarrays for suspect content
  isSuspect($_POST, $pattern, $suspect);
  
  if ($suspect) {
    $mailSent = false;
	unset($missing);
	}
  else {
    // process the $_POST variables
    foreach ($_POST as $key => $value) {
      // assign to temporary variable and strip whitespace if not an array
      $temp = is_array($value) ? $value : trim($value);
      // if empty and required, add to $missing array
      if (empty($temp) && in_array($key, $required)) {
        array_push($missing, $key);
        }
      // otherwise, assign to a variable of the same name as $key
      elseif (in_array($key, $expected)) {
        ${$key} = $temp;
        }
      }  
    }
	
  // validate the email address
  if (!empty($email)) {
    // regex to identify illegal characters in email address
    $checkEmail = '/^[^@]+@[^\s\r\n\'";,@%]+$/';
	// reject the email address if it deosn't match
	if (!preg_match($checkEmail, $email)) {
	  $suspect = true;
	  $mailSent = false;
	  unset($missing);
	  }
	}
  
  // go ahead only if not suspsect and all required fields OK
  if (!$suspect && empty($missing)) {
    // initialize the $message variable
    $message = '';
	// loop through the $expected array
    foreach($expected as $item) {
	  // assign the value of the current item to $val
	  if (isset(${$item})) {
	    $val = ${$item};
		}
	  // if it has no value, assign 'Not selected'
	  else {
	    $val = 'Not selected';
		}
	  // if an array, expand as comma-separated string
	  if (is_array($val)) {
	    $val = implode(', ', $val);
		}
	  // add label and value to the message body
	  $message .= ucfirst($item).": $val\n\n";
	  }
	
    // limit line length to 70 characters
    $message = wordwrap($message, 70);

    // create additional headers
	if (!empty($email)) {
	  $headers .= "\r\nReply-To: $email";
	  }
	
    // send it  
    $mailSent = mail($to, $subject, $message, $headers);
	  if ($mailSent) {
      // $missing is no longer needed if the email is sent, so unset it
      unset($missing);
      }
	}
?>