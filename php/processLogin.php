<?php
//Define variables
$loginEmail = $_POST['loginEmail'];
$password = $_POST['password'];
?>
<!doctype html>
<html>
<head>
  <title>Logging In</title>
</head>
<body>
  <div data-role="page" id="loginResult">
    
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

$findrecord = mysql_query("SELECT * FROM User WHERE User_LogN = '$loginEmail' AND User_Pass = '$password'");

$rows = 0;

if(!$findrecord)
{
	die(mysql_error());
}

while($row = mysql_fetch_assoc($findrecord))
	{
		$rows = $rows + 1;
    }

if ($rows == 1)
{
	$uid = mysql_query("SELECT User_ID FROM User WHERE User_LogN = '$loginEmail' AND User_Pass = '$password'");
	
	if(!$uid)
	{
		die(mysql_error());
	}

	$id = mysql_result($uid, 0); 
	
	echo "<h3 style='text-align:center;'>You're logged in and ready to go!</h3>"?>
			<div data-role="controlgroup" data-type="horizontal" style="text-align:center;">
				<br/><br/>
					<img src="../images/juggling_mom.jpeg" width="300" height="300" alt="Logo">
				<br/><br/><br/>
				<form action="categorySelect.php" method="post">
					<input type="hidden" id="passval" name="passval" value='<?php echo $id ?>'/>
					<input type="submit" name="createaccnt" id="createaccnt" value="Let's get Organized!">
				</form>
				<!--<a href="#categorySelect" data-role="button">Let's get Organized!</a>-->
			</div>
	</div>
	</div>
	
<?php
}
else
{
?>
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
		<div data-role="fieldcontain">
		  <label for="loginEmail">Email:</label>
		  <input type="email" name="loginEmail" id="loginEmail">
		</div>
		
		<div data-role="fieldcontain">
		  <label for="password">Password:</label>
		  <input type="password" name="password" id="password">
		</div>
		
		<input type="submit" name="login" id="login" value="Login">	
	</form>
<?php 
	echo "<font color = 'red'><br/><br/>Your account could not be found. Please try logging in again or creating an account.</font>";
}


mysql_close($con);
?>
</div>
	</div>

</body>
</html>