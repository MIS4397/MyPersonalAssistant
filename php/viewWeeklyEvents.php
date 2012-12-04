<?php
//Define variables
session_start();
$id = $_SESSION['globalid'];
?>
<!doctype html>
<html>
<head>
  <title>Weekly Events</title>
</head>
<body>
  <div data-role="page" id="createEvent" data-title="createEvent">
    
<div data-role="header">
      <h1>Weekly Events</h1>
	  <a href="insertCategories.php" data-icon="back">Back</a>
	  <a href="index.html#events" data-role="button" data-icon="plus">More</a>
</div>

<div data-role="content">
<!--<h3>Please select an event below and click either the Edit or Delete buttons to modify the event. <br/><br/> This week's events are:</h3>-->
<?php

$con = mysql_connect("localhost","attend_admin","create");

if (!$con)
 {
  	die('Could not connect: ' . mysql_error());
 }

mysql_select_db("attend_appdb", $con);

$sql = "SELECT DATE_FORMAT( Event_Time,  '%l:%i %p' ) AS Time, Task_Name, Event_Loc, Event_CustomName, Event_Note, Event_UserID, Event_ID, DATE_FORMAT( Event_Date, '%m/%d/%Y' ) AS EvDate FROM Event, Task WHERE Event_TaskID = Task_ID AND Event_UserID = '$id' AND WEEK( Event_Date ) = WEEK( CURDATE( ) ) ORDER BY Event_Date, Event_Time";

if(!$sql)
{
	die(mysql_error());
}

$findrecord = mysql_query($sql);

if(!$findrecord)
{
	die(mysql_error());
}

?>
<fieldset data-role="controlgroup">
<form action="editEvent.php" method="post">
<?php
while($row = mysql_fetch_assoc($findrecord))
{
if(!empty($row['Event_CustomName']))
{
?>
<input type="radio" name="select" id="<?php echo $row['Event_ID']; ?>" value="<?php echo $row['Event_ID']; ?>">
<label for="<?php echo $row['Event_ID']; ?>"><?php echo $row['Event_CustomName']." <br/> ".$row['Time']." <br/>Date: ".$row['EvDate']."  <br/>Location: ".$row['Event_Loc']."  <br/>Note: ".$row['Event_Note']; ?></label>
<?php
}
else
{
?>
<input type="radio" name="select" id="<?php echo $row['Event_ID']; ?>" value="<?php echo $row['Event_ID']; ?>">
<label for="<?php echo $row['Event_ID']; ?>"><?php echo $row['Task_Name']." <br/> ".$row['Time']." <br/>Date: ".$row['EvDate']."  <br/>Location: ".$row['Event_Loc']."  <br/>Note: ".$row['Event_Note']; ?></label>
<?php
}
}
if (mysql_num_rows ($findrecord) > 0)
{?>
<input type="submit" name="editEvent" id="editEvent" data-icon="arrow-r" value="Edit"/>
<input type="submit" name="deleteEvent" id="deleteEvent" data-icon="delete" value="Delete"/>
<?php }?>
</form>
</fieldset>
	</div>

<div data-role="footer" data-id="footer" data-position="fixed">
		<div data-role="navbar">
				<ul>
					<li><a href="viewEvents.php" data-icon="star" data-iconpos="top">Today</a></li>
					<li><a href="viewWeeklyEvents.php" data-icon="grid" data-iconpos="top">Weekly</a></li>
					<li><a href="viewAllEvents.php" data-icon="arrow-u" data-iconpos="top">All</a></li>
				</ul>
			</div>
	</div>
</div>	
</body>
</html>