<?php
//Define variables
session_start();
$id = $_SESSION['globalid'];
?>
<!doctype html>
<html>
<head>
  <title>View Events</title>
</head>
<body>
  <div data-role="page" id="createEvent" data-title="createEvent">
    
<div data-role="header">
      <h1>View Today's Events</h1>
	  <a href="insertCategories.php" data-icon="arrow-l">Back</a>
	  <a href="index.html#events" data-role="button">Add</a>
</div>

<div data-role="content">
<h3>The events for today are:</h3>

<?php

$con = mysql_connect("localhost","attend_admin","create");

if (!$con)
 {
  	die('Could not connect: ' . mysql_error());
 }

mysql_select_db("attend_appdb", $con);

$sql = "SELECT DATE_FORMAT(Event_Time,'%l:%i %p') AS Time, Task_Name, Event_Loc, Event_Note, Event_UserID FROM Event, Task WHERE Event_TaskID = Task_ID AND Event_UserID = '$id' AND Event_Date = CurDate() ORDER BY Event_Time";

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
<ul data-role="listview">
<?php
while($row = mysql_fetch_assoc($findrecord))
{?>
	<li><h3><?php echo $row['Task_Name']." <br/> ".$row['Time']." <br/>Location: ".$row['Event_Loc']."  <br/>Note: ".$row['Event_Note'];?></h3></li><?php
}?></ul>
	</div>

<div data-role="footer" data-id="footer" data-position="fixed">
		<div data-role="navbar">
				<ul>
					<li><a href="viewEvents.php">Today</a></li>
					<li><a href="viewWeeklyEvents.php">Weekly</a></li>
					<li><a href="viewMonthlyEvents.php">All</a></li>
				</ul>
			</div>
	</div>
</div>	
</body>
</html>