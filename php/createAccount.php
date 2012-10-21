<?php
/* Define some constants
define( "RECIPIENT_NAME", "John Smith" );
define( "RECIPIENT_EMAIL", "john@example.com" );
define( "EMAIL_SUBJECT", "Visitor Message" );*/
// Read the form values
$createaccnt = $_POST['createaccnt'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$loginEmail = $_POST['loginEmail'];
$password = isset( $_POST['password'] ) ? preg_replace( "/[^\.\-\' a-
zA-Z0-9]/", "", $_POST['password'] ) : "";
$confirmpass = isset( $_POST['confirmpass'] ) ? preg_replace( "/[^\.\-\' a-
zA-Z0-9]/", "", $_POST['confirmpass'] ) : "";

/*$success = false;
$senderName = isset( $_POST['senderName'] ) ? preg_replace( "/[^\.\-\' a-
zA-Z0-9]/", "", $_POST['senderName'] ) : "";
$senderEmail = isset( $_POST['senderEmail'] ) ? preg_replace( "/[^\.\-\_
\@a-zA-Z0-9]/", "", $_POST['senderEmail'] ) : "";
$productCategories = array();
if ( isset( $_POST['productCategories'] ) ) {
  foreach ( $_POST['productCategories'] as $cat ) $productCategories[] =
preg_replace( "/[^\'\-\ a-zA-Z0-9]/", "", $cat );
}
$message = isset( $_POST['message'] ) ? preg_replace( "/(From:|To:|BCC:|
CC:|Subject:|Content-Type:)/", "", $_POST['message'] ) : "";
if ( $productCategories ) {
  $message .= "\n\n---\n\nInterested in product categories:\n\n";
  foreach ( $productCategories as $cat ) $message .= "$cat\n";
￼￼}
// If all values exist, send the email
if ( $senderName && $senderEmail && $message ) {
  $recipient = Khalid Adil . " <" . khalidadil29@gmail.com . ">";
  $headers = "From: " . $senderName . " <" . $senderEmail . ">";
  $success = mail( $recipient, TEST_EMAIL, $message, $headers );
}*/
// Return an appropriate response to the browser
?>
<!doctype html>
<html>
<head>
  <title>Thanks!</title>
  <meta charset="utf-8">
</head>
<body>
  <div data-role="page" id="contactResult">
    <div data-role="header">
      <h1>Hairy Hippo</h1>
</div>
    <div data-role="content">
<?php echo "/n".$createacct."/n".$firstName."/n".$lastName."/n".$loginEmail."/n".$password ."/n"?>
<?php if ( isset( $_POST['firstName'] )  { ?>
      <div style="text-align: center;">
        <h2>Thanks!</h2>
        <img src="images/juggling_mom.jpeg" width="200" alt="Logo">
        <p>Thanks for sending your message! We'll get back to you shortly.</p>
      </div>
<?php } else { ?>
      <div style="text-align: center;">
        <h2>Oops!</h2>
        <p style="color: red">
There was a problem sending your message. Please make sure you
fill in all the fields in the form.<br><br>
          <a href="#contact" data-rel="back" data-role="button">Try Again</a>
</p>
      </div>
<?php } ?>
</div>
   <xsdiv data-role="footer" data-position="fixed" data-id="nav">
       <!--<div data-role="navbar">
        <ul>
          <li><a href="#home">Home</a></li>
          <li><a href="#products">Products</a></li>
          <li><a href="#contact" class="ui-btn-active ui-state-persist">Contact Us</a></li>
        </ul>
      </div>-->
    </div>
</div>
</body>
</html>