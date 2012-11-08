<?php
//Define variables
session_start();
$id = $_SESSION['globalid'];
$trigger = $_POST['passtrigger'];
?>
<!doctype html>
<html>
<head>
  <title>Categories</title>
</head>
<body>
  <div data-role="page" id="setup" data-title="Setup">
    
<div data-role="header">
      <h1>Categories</h1>
	  ￼<a href="viewEvents.php" data-role="button">View Events</a>
	   <a href="index.html#events" data-role="button">Add</a>
</div>	
<?php
$con = mysql_connect("localhost","attend_admin","create");

if (!$con)
 {
  	die('Could not connect: ' . mysql_error());
 }

mysql_select_db("attend_appdb", $con);

if($formSubmit == "Create Profile")
{
	if($home)
	{
		$sql = "INSERT INTO User_Cat_XREF (User_ID, Cat_No) VALUES ('$id','1')";
		mysql_query($sql);
	}
	if($career)
	{
		$sql = "INSERT INTO User_Cat_XREF (User_ID, Cat_No) VALUES ('$id','2')";
		mysql_query($sql);
	}
	if($finance)
	{
		$sql = "INSERT INTO User_Cat_XREF (User_ID, Cat_No) VALUES ('$id','3')";
		mysql_query($sql);
	}
	if($family)
	{
		$sql = "INSERT INTO User_Cat_XREF (User_ID, Cat_No) VALUES ('$id','4')";
		mysql_query($sql);
	}
	if($auto)
	{
		$sql = "INSERT INTO User_Cat_XREF (User_ID, Cat_No) VALUES ('$id','5')";
		mysql_query($sql);
	}
	if($misc)
	{
		$sql = "INSERT INTO User_Cat_XREF (User_ID, Cat_No) VALUES ('$id','6')";
		mysql_query($sql);
	}
}

/*$findrecord = mysql_query("SELECT * FROM User WHERE User_LogN = '$loginEmail' AND User_Pass = '$password'");

$rows = 0;

if(!$findrecord)
{
	die(mysql_error());
}

while($row = mysql_fetch_assoc($findrecord))
	{
		$rows = $rows + 1;
    }

if ($rows == 1)*/

if(!$formSubmit)
{
		$catsetup = mysql_query("SELECT * FROM User_Cat_XREF WHERE User_ID = '$id'");
		
			$home = "";
			$career = "";
			$finance = "";
			$family = "";
			$auto = "";
			$misc = "";
			
			while($row = mysql_fetch_assoc($catsetup))
			{
				switch ($row["Cat_No"]) {
					case 1:
						$home = "home";
						break;
					case 2:
						$career = "career";
						break;
					case 3:
						$finance = "finance";
						break;
					case 4:
						$family = "family";
						break;
					case 5:
						$auto = "auto";
						break;
					case 6:
						$misc = "misc";
						break;
				}
		    }
}

if($home == "home")
{
	echo "<h3 style='text-align:center;'>Home: </h3><br />";
	?>
	<form action = "createEvent.php" method="post">
	<select name="select">
	   <option value="1">Mow Lawn</option>
	   <option value="7">Clean Room</option>
	   <option value="8">Wash Clothes</option>
	   <option value="9">Grocery Shopping</option>
	</select>
	<input type="submit" name="homeSubmit" id="homeSubmit" value="Add">
	</form>
<?php echo "<br />";}
if($career == "career")
{
	echo "<h3 style='text-align:center;'>Career: </h3><br />";
	?>
	<form action = "createEvent.php" method="post">
	<select name="select">
	   <option value="11">Weekly Meeting</option>
	   <option value="12">Shift</option>
	</select>
	<input type="submit" name="careerSubmit" id="careerSubmit" value="Add">
	</form>
<?php echo "<br />";}
if($finance == "finance")
{
	echo "<h3 style='text-align:center;'>Finance: </h3><br />";
	?>
	<form action = "createEvent.php" method="post">
	<select name="select">
	   <option value="13">Water Bill</option>
	   <option value="14">Electricity Bill</option>
	   <option value="16">Credit Card Bill</option>
	   <option value="18">Car Note</option>
	   <option value="19">Phone Bill</option>
	</select>
	<input type="submit" name="financeSubmit" id="financeSubmit" value="Add">
	</form>
<?php echo "<br />";}
if($family == "family")
{
	echo "<h3 style='text-align:center;'>Family: </h3><br />";
	?>
	<form action = "createEvent.php" method="post">
	<select name="select">
	    <option value="21">Weekly Practice</option>
		<option value="22">School</option>
	</select>
	<input type="submit" name="familySubmit" id="familySubmit" value="Add">
	</form>
<?php echo "<br />";}
if($auto == "auto")
{
	echo "<h3 style='text-align:center;'>Automobile:</h3><br />";
	?>
	<form action = "createEvent.php" method="post">
	<select name="select">
	   <option value="28">Oil Change</option>
	   <option value="29">Buy Oil</option>
	   <option value="31">Tire Alignment</option>
	</select>
	<input type="submit" name="autoSubmit" id="autoSubmit" value="Add">
	</form>
<?php echo "<br />";}
if($misc == "misc")
{
	echo "<h3 style='text-align:center;'>Misc: </h3><br />";
	?>
	<form action = "createEvent.php" method="post">
	<select name="select">
	   <option value="35">Dry Cleaning</option>
	   <option value="36">Promotion Goal</option>
	   <option value="37">Marathon Goal</option>
	   <option value="38">Health Goal</option>
	</select>
	<input type="submit" name="miscSubmit" id="miscSubmit" value="Add">
	</form>
<?php echo "<br />";}

if($eventSubmit)
{
	$evtype = $_SESSION['globaltype'];
	//$evtype = $_POST['passevent'];
	$cleantime = DATE("H:i:s", STRTOTIME("$time"));
	$sql2 = "INSERT INTO Event (Event_UserID, Event_TaskID,Event_Time,Event_Date,Event_Loc,Event_Note,Event_Repeat,Event_RepSchedule) VALUES ('$id','$evtype','$cleantime','$date','$location','$notes','0','0')";
	mysql_query($sql2);
}

mysql_close($con);
?>
</div>

<!--<div data-role="popup" id="popupLogin" data-theme="a" class="ui-corner-all">
	<form>
		<div style="padding:10px 20px;">
			<h3>Please sign in</h3>
			<label for="un" class="ui-hidden-accessible">Username:</label>
			<input type="text" name="user" id="un" value="" placeholder="username" data-theme="a" />
			<label for="pw" class="ui-hidden-accessible">Password:</label>
			<input type="password" name="pass" id="pw" value="" placeholder="password" data-theme="a" />
			<button type="submit" data-theme="b">Sign in</button>
		</div>
	</form>
</div>-->
	</div>
	
</body>
</html>