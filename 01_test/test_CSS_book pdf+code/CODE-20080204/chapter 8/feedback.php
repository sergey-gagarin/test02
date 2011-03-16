<?php
if (array_key_exists('SUBMIT', $_POST)) {
  //mail processing script
  $to = 'me@example.com'; // use your own email address
  $subject = 'Feedback from website';

  // list expected fields
  $expected = array('realname', 'email', 'phone', 'message');
  // set required fields
  $required = array('realname', 'email', 'message');
  $headers = 'From: My website<feedback@example.com>';
  $process = 'process_mail.inc.php';
  if (file_exists($process) && is_readable($process)) {
    include($process);
    }
  else {
    $mailSent = false;
    mail($to, 'Server problem', "$process cannot be read", $headers);
    }
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHP feedback form</title>
<style type="text/css">
/* <![CDATA[ */
@import url(feedback-php.css);
/* ]]> */
</style>
</head>

<body>
<div id="wrapper">
<?php
if ($_POST && isset($missing) && !empty($missing)) {
?>
  <p class="warning">Not all required fields were filled in.</p>
<?php
  }
elseif ($_POST && !$mailSent) {
?>
  <p class="warning">Sorry, there was a problem sending your message. 
Please try later.</p>
<?php
  }
elseif ($_POST && $mailSent) {
?>
  <p><strong>Your message has been sent. Thank you for your feedback.
</strong></p>
<?php } ?>
<form id="form1" name="form1" method="post" action="">
  <fieldset>
  <legend>Personal Information</legend>
  <p>
    <label for="realname">Name:</label>
    <input name="realname" type="text" class="formField" id="realname" />
  </p>
  <p>
    <label for="email">E-mail address:</label>
    <input name="email" type="text" class="formField" id="email" />
  </p>
  <p>
    <label for="phone">Telephone:</label>
    <input name="phone" type="text" class="formField" id="phone" />
  </p>
  </fieldset>
  <p>
    <label for="message">Message:</label>
    <textarea name="message" cols="45" rows="5" class="formField" id="message"></textarea>
  </p>
  <p>
    <input name="SUBMIT" type="submit" class="submitButton" id="SUBMIT" value="SUBMIT" />
  </p>
</form>
</div>
</body>
</html>
