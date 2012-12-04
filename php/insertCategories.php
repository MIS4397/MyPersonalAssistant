<?php
//Define variables
session_start();
$id = $_SESSION['globalid'];
$trigger = $_POST['passtrigger'];

$con = mysql_connect("localhost","attend_admin","create");

if (!$con)
 {
  	die('Could not connect: ' . mysql_error());
 }

mysql_select_db("attend_appdb", $con);

if($eventSubmit)
{
	/*header( 'Location: http://mypersonalattendant.com/app/php/eventAddPopup.php');*/
	$evtype = $_SESSION['globaltype'];
	//$evtype = $_POST['passevent'];
	$cleantime = DATE("H:i:s", STRTOTIME("$time"));
	$sql2 = "INSERT INTO Event (Event_UserID, Event_TaskID,Event_Time,Event_Date,Event_Loc,Event_Note,Event_Repeat,Event_RepSchedule) VALUES ('$id','$evtype','$cleantime','$date','$location','$notes','0','0')";
	mysql_query($sql2);
}

if($customSubmit)
{
	$evtype = $_SESSION['globaltype'];
	//$evtype = $_POST['passevent'];
	$cleantime = DATE("H:i:s", STRTOTIME("$time"));
	$sql2 = "INSERT INTO Event (Event_UserID,Event_CustomName,Event_TaskID,Event_Time,Event_Date,Event_Loc,Event_Note,Event_Repeat,Event_RepSchedule) VALUES ('$id','$name','39','$cleantime','$date','$location','$notes','0','0')";
	mysql_query($sql2);
}

if($updateEvent)
{
	$cleantime = DATE("H:i:s", STRTOTIME("$time"));
	$sql2 = "UPDATE Event SET Event_Time = '$cleantime', Event_Date = '$date', Event_Loc = '$location', Event_Note = '$notes' WHERE Event_ID = '$eventID'";
	mysql_query($sql2);
}
?>
<!doctype html>
<html>
<head>
  <title>Categories</title>
</head>
<body>
  <div data-role="page" id="setup" data-title="Setup">
    
<div data-role="header" style='height:44px;'>
      <h1>Categories</h1>
	  ￼<a href="viewEvents.php" data-role="button" data-icon="grid">Events Created</a>
	   <a href="index.html#events" data-role="button" data-icon="plus">More</a>
</div>	

<div data-role="content">
<?php
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

if($updateCats)
{
	$sql = "DELETE FROM User_Cat_XREF WHERE User_ID = '$id'";
	mysql_query($sql);
	
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
	echo "<h3 style='text-align:center;'>Home:</h3>";
	?>
	<form action = "createEvent.php" method="post">
	<select name="select">
	   <option value="1">Mow Lawn</option>
	   <option value="7">Clean Room</option>
	   <option value="8">Wash Clothes</option>
	   <option value="9">Grocery Shopping</option>
	</select>
	<input type="submit" name="homeSubmit" id="homeSubmit" data-icon="arrow-r" value="Edit">
	</form>
<?php }
if($career == "career")
{
	echo "<h3 style='text-align:center;'>Career: </h3>";
	?>
	<form action = "createEvent.php" method="post">
	<select name="select">
	   <option value="11">Meeting</option>
	   <option value="12">Shift</option>
	</select>
	<input type="submit" name="careerSubmit" id="careerSubmit" data-icon="arrow-r" value="Edit">
	</form>
<?php }
if($finance == "finance")
{
	echo "<h3 style='text-align:center;'>Finance: </h3>";
	?>
	<form action = "createEvent.php" method="post">
	<select name="select">
	   <option value="13">Water Bill</option>
	   <option value="14">Electricity Bill</option>
	   <option value="16">Credit Card Bill</option>
	   <option value="18">Car Note</option>
	   <option value="19">Phone Bill</option>
	</select>
	<input type="submit" name="financeSubmit" id="financeSubmit" data-icon="arrow-r" value="Edit">
	</form>
<?php }
if($family == "family")
{
	echo "<h3 style='text-align:center;'>Family: </h3>";
	?>
	<form action = "createEvent.php" method="post">
	<select name="select">
	    <option value="21">Kids' Event</option>
		<option value="22">School</option>
	</select>
	<input type="submit" name="familySubmit" id="familySubmit" data-icon="arrow-r" value="Edit">
	</form>
<?php }
if($auto == "auto")
{
	echo "<h3 style='text-align:center;'>Automobile:</h3>";
	?>
	<form action = "createEvent.php" method="post">
	<select name="select">
	   <option value="28">Oil Change</option>
	   <option value="29">Buy Oil</option>
	   <option value="31">Tire Alignment</option>
	</select>
	<input type="submit" name="autoSubmit" id="autoSubmit" data-icon="arrow-r" value="Edit">
	</form>
<?php }
if($misc == "misc")
{
	echo "<h3 style='text-align:center;'>Misc: </h3>";
	?>
	<form action = "createEvent.php" method="post">
	<select name="select">
	   <option value="35">Dry Cleaning</option>
	   <option value="36">Promotion Goal</option>
	   <option value="37">Marathon Goal</option>
	   <option value="38">Health Goal</option>
	</select>
	<input type="submit" name="miscSubmit" id="miscSubmit" data-icon="arrow-r" value="Edit">
	</form>
	
<?php }?>
<br />
<a href="addCustom.php" data-role="button" data-icon="gear" name="customEvent" id="customEvent">Customized Event</a>
<a href="categorySelect.php" data-role="button" data-icon="plus" name="customEvent" id="customEvent">More Categories</a>

	<!--<div data-role="popup" id="popupInserts">
		<a href = "#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>
		<p>This is a completely basic popup, no options set.<p>
	</div>-->
<?php
mysql_close($con);
?>
</div>
</div>
	
</body>
</html>