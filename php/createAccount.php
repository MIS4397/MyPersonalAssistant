<?php
//Define variables
$createaccnt = $_POST['createaccnt'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$loginEmail = $_POST['loginEmail'];
/*$password = isset( $_POST['password'] ) ? preg_replace( "/[^\.\-\' a-
zA-Z0-9]/", "", $_POST['password'] ) : "";
$confirmpass = isset( $_POST['confirmpass'] ) ? preg_replace( "/[^\.\-\' a-
zA-Z0-9]/", "", $_POST['confirmpass'] ) : "";*/
// Return an appropriate response to the browser
echo $createacct;
echo $firstName;
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
      <h1>myPersonalAttendant</h1>
</div>
    
<div data-role="content">
<?php
echo $createacct;
echo $firstName;
echo "Testing this out";

$myString = "Hello!";
echo $myString;
echo "<h5>I love using PHP!</h5>";
/*$con = mysql_connect("localhost","root","root");
if (!$con)
 {
  	die('Could not connect: ' . mysql_error());
 }
mysql_select_db("appdb", $con);
mysql_close($con)*/

?>
</div>
	</div>
</body>
</html>