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

$sql = "SELECT DATE_FORMAT(Event_Time,'%l:%i %p') AS Time, Task_Name, Event_Loc, Event_Note, Event_UserID, Event_CustomName, Event_ID, DATE_FORMAT(Event_Date,'%m/%d/%Y') AS EvDate FROM Event, Task WHERE Event_TaskID = Task_ID AND Event_ID = '$type' AND Event_UserID = '$id' ORDER BY EvDate, Event_Time";

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
$EvID = $row['Event_ID'];

if($deleteEvent)
{
	$sql2 = "DELETE FROM Event WHERE Event_ID = '$EvID'";
	mysql_query($sql2);
	header( 'Location: http://mypersonalattendant.com/app/php/insertCategories.php');
}
if($editEvent)
{
$time = $row['Time'];
$cleantime = DATE("H:i:s", STRTOTIME("$time"));
$date = $row['EvDate'];
$cleandate = DATE("Y-m-d", STRTOTIME("$date"));
?>
<!doctype html>
<html>
<head>
  <title>Modify Event</title>
</head>
<body>
  <div data-role="page" id="createEvent" data-title="createEvent">
    
<div data-role="header">
      <h1><?php 
			if($row['Event_CustomName'])
			{
				echo $row['Event_CustomName'];
			}
			else
			{
				echo $row['Task_Name'];
			}
?></h1>
	  <a href="#" data-icon="back" data-rel="back" data-icon="back">Back</a>
</div>
<div data-role="content">
<!--<h3>Event Name: <?php echo $row['Task_Name'];?> </h3>-->
	
<form action="insertCategories.php" method="post">
	<div data-role="fieldcontain" style='text-align:center;'>
     <label for="date">Date:</label>
     <input type="date" name="date" id="date" value="<?php echo $cleandate;?>"/>
	</div>
	
	<div data-role="fieldcontain" style='text-align:center;'>
     <label for="time">Time:</label>
     <input type="time" name="time" id="time" value="<?php echo $cleantime;?>"/>
	</div>

	<div data-role="fieldcontain" style='text-align:center;'>
	<label for="location">Location:</label>
	<textarea cols="3" rows="3" name="location" id="location"><?php echo $row['Event_Loc'];?></textarea>
	</div>
	
	<div data-role="fieldcontain" style='text-align:center;'>
	<label for="notes">Notes:</label>
	<textarea cols="3" rows="5" name="notes" id="notes"><?php echo $row['Event_Note'];?></textarea>
	</div>
	
	<input type="hidden" name="eventID" id="eventID" value="<?php echo $row['Event_ID'];?>"/>
	
	<div style='text-align:center;' data-role="controlgroup" data-type="horizontal">
	<input type="submit" name="updateEvent" id="updateEvent" data-icon="check" value="Save"/>
	<a href="#" type="button" data-rel="back" data-icon="delete">Cancel</a></div>
</form>
</div><?php } ?>
	</div>
	
</body>
</html>