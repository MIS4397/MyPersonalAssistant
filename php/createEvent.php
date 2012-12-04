<?php
//Define variables
session_start();
$id = $_SESSION['globalid'];
$type = $_POST['select'];
$_SESSION['globaltype']=$type;

$con = mysql_connect("localhost","attend_admin","create");

if (!$con)
 {
  	die('Could not connect: ' . mysql_error());
 }

mysql_select_db("attend_appdb", $con);

$sql = "SELECT Task_Name FROM Task WHERE Task_ID ='$type'";

if(!$sql)
{
	die(mysql_error());
}

$findrecord = mysql_query($sql);

if(!$findrecord)
{
	die(mysql_error());
}

$row = mysql_fetch_assoc($findrecord);

?>
<!doctype html>
<html>
<head>
  <title>Create Event</title>
</head>
<body>
  <div data-role="page" id="createEvent" data-title="createEvent">
    
<div data-role="header">
      <h1><?php echo $row['Task_Name'];?></h1>
	  <a href="#" data-icon="back" data-rel="back" data-icon="back">Back</a>
</div>

<div data-role="content">
<!--<h3>Please enter the date, time, location, and any notes you may have relating to your event <?php /*echo $type*/?> here.</h3>-->
	
<form action="insertCategories.php" method="post">
	<div data-role="fieldcontain" style='text-align:center;'>
     <label for="date">Date:</label>
     <input type="date" name="date" id="date" />
	</div>
	
	<div data-role="fieldcontain" style='text-align:center;'>
     <label for="time">Time:</label>
     <input type="time" name="time" id="time" />
	</div>

	<div data-role="fieldcontain" style='text-align:center;'>
	<label for="location">Location:</label>
	<textarea cols="3" rows="3" name="location" id="location"></textarea>
	</div>
	
	<div data-role="fieldcontain" style='text-align:center;'>
	<label for="notes">Notes:</label>
	<textarea cols="3" rows="5" name="notes" id="notes"></textarea>
	</div>
	
	<div style='text-align:center;' data-role="controlgroup" data-type="horizontal">
	<input type="submit" name="eventSubmit" id="eventSubmit" data-icon="plus" value="Add"/>
	<a href="#" type="button" data-rel="back" data-icon="delete">Cancel</a></div>
</form>
</div>
	</div>
	
</body>
</html>