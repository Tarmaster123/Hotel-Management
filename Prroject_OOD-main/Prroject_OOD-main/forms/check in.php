<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'checkin@example.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $checkin = new PHP_Email_Form;
  $checkin->ajax = true;
  
  $checkin->to = $receiving_email_address;
  $checkin->from_name = $_POST['name'];
  $checkin->from_email = $_POST['email'];
  $checkin->subject = $_POST['subject'];

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  /*
  $contact->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );
  */

  $checkin->add_message( $_POST['name'], 'From');
  $checkin->add_message( $_POST['email'], 'Email');
  $checkin->add_message( $_POST['message'], 'Message', 10);

  echo $checkin->send();
?>
