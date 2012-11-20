<?php
//Define variables
session_start();
$id = $_SESSION['globalid'];
$type = $_POST['select'];
$_SESSION['globaltype']=$type;

echo $type;

$con = mysql_connect("localhost","attend_admin","create");

if (!$con)
 {
  	die('Could not connect: ' . mysql_error());
 }

mysql_select_db("attend_appdb", $con);

$sql = "SELECT DATE_FORMAT(Event_Time,'%l:%i %p') AS Time, Task_Name, Event_Loc, Event_Note, Event_UserID, Event_ID, DATE_FORMAT(Event_Date,'%m/%d/%Y') AS EvDate FROM Event, Task WHERE Event_TaskID = Task_ID AND Event_ID = '$type' AND Event_UserID = '$id' ORDER BY EvDate, Event_Time";

//$sql = "SELECT * FROM Event";

if(!$sql)
{
	die(mysql_error());
}

$findrecord = mysql_query($sql);

if(!$findrecord)
{
	die(mysql_error());
}

$row = mysql_fetch_assoc($findrecord)
?>
<!doctype html>
<html>
<head>
  <title>Modify Event</title>
</head>
<body>
  <div data-role="page" id="createEvent" data-title="createEvent">
    
<div data-role="header">
      <h1>Modify Event</h1>
	  <a href="#" data-icon="arrow-l" data-rel="back">Back</a>
</div>

<div data-role="content">
<h3>Please modify the date, time, location, and any notes you may have relating to your <?php echo $row['Task_Name'];?> event here.</h3>
	
<form action="insertCategories.php" method="post">
	<div data-role="fieldcontain" style='text-align:center;'>
     <label for="date">Date:</label>
     <input type="date" name="date" id="date" value="<?php echo $row['EvDate'];?>"/>
	</div>
	
	<div data-role="fieldcontain" style='text-align:center;'>
     <label for="time">Time:</label>
     <input type="time" name="time" id="time" value="<?php echo $row['Time'];?>"/>
	</div>

	<div data-role="fieldcontain" style='text-align:center;'>
	<label for="location">Location:</label>
	<textarea cols="3" rows="3" name="location" id="location"><?php echo $row['Event_Loc'];?></textarea>
	</div>
	
	<div data-role="fieldcontain" style='text-align:center;'>
	<label for="notes">Notes:</label>
	<textarea cols="3" rows="5" name="notes" id="notes"><?php echo $row['Event_Note'];?></textarea>
	</div>
	
	<div style='text-align:center;'>
	<input type="submit" name="updateEvent" id="updateEvent" value="Save Changes"/></div>
	<a href="#" type="button" data-rel="back">Cancel</a>
</form>
</div>
	</div>
	
</body>
</html>