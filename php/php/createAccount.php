<?php
//Define variables
$createaccnt = $_POST['createaccnt'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$loginEmail = $_POST['loginEmail'];
$password = $_POST['password'];
$confirmpass = $_POST['confirmpass'];

/*echo $createacct."\n";
echo $firstName."\n";
echo $lastName."\n";
echo $loginEmail."\n";
echo $password."\n";
echo $confirmpass."\n";*/
?>
<!doctype html>
<html>
<head>
  <title>Thanks!</title>
</head>
<body>
  <div data-role="page" id="contactResult">
    
<div data-role="header">
      <h1>myPA</h1>
</div>
    
<div data-role="content">
<?php

$con = mysql_connect("localhost","attend_admin","create");

if (!$con)
 {
  	die('Could not connect: ' . mysql_error());
 }

mysql_select_db("attend_appdb", $con);

$findrecord = mysql_query("SELECT * FROM User WHERE User_First = '$firstName' AND User_Last = '$lastName' AND User_LogN = '$loginEmail'");

$rows = 0;

if(!$findrecord)
{
	die(mysql_error());
}

while($row = mysql_fetch_assoc($findrecord))
	{
		$rows = $rows + 1;
    }

if ($rows<1)
 {
  	if (strcmp($password,$confirmpass) == 0)
	{

		$sql = "INSERT INTO User (User_First, User_Last, User_LogN, User_Pass) VALUES ('$firstName','$lastName','$loginEmail','$password')";

		if (!mysql_query($sql,$con))
	  	{
	    	die('Error: ' . mysql_error());
	  	}
		echo "<h3>Thank you for signing up $firstName $lastName!</h3><br /><br />";?>
		<a href="../index.html#login" data-role="button">Login</a>
		<? echo "<br /><br /><h3>Please login with $loginEmail as the username and the password that you chose.</h3>";
	}
	else
	{?>
		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
			<div data-role="fieldcontain">
		  		<label for="firstName">First Name:</label>
		  		<input type="text" name="firstName" id="firstName" value="<?php echo $firstName ?>">
			</div>

			<div data-role="fieldcontain">
		  		<label for="lastName">Last Name:</label>
		  		<input type="text" name="lastName" id="lastName" value="<?php echo $lastName ?>">
			</div>

			<div data-role="fieldcontain">
		  		<label for="loginEmail">Email:</label>
		  		<input type="email" name="loginEmail" id="loginEmail" value="<?php echo $loginEmail ?>">
			</div>

			<div data-role="fieldcontain">
		  		<label for="password">Password:</label>
		  		<input type="password" name="password" id="password">
			</div>

			<div data-role="fieldcontain">
		  		<label for="confirmpass">Confirm Password:</label>
		  		<input type="password" name="confirmpass" id="confirmpass">
			</div>

			<input type="submit" name="createaccnt" id="createaccnt" value="Save and Start Organizing">
		</form>

		<?

		echo "<br/><font color='red'>Your passwords are not the same. Please retype them.</font>";
	}
}
else
{
	echo "<h3>It seems that you already have an account $firstName $lastName!</h3><br /><br />";?>
	<a href="../index.html#login" data-role="button">Login</a>
	<? echo "<br /><br /><h3>Please login with $loginEmail as the username and the password you chose.</h3>";
}


mysql_close($con);
?>
</div>
	</div>
</body>
</html>