<?php
//Define variables
session_start();
$id = $_SESSION['globalid'];
/*$home = $_POST['home'];
$career = $_POST['career'];
$finance = $_POST['finance'];
$family = $_POST['family'];
$auto = $_POST['auto'];
$misc = $_POST['misc'];*/
?>
<!doctype html>
<html>
<head>
  <title>View Events</title>
</head>
<body>
  <div data-role="page" id="createEvent" data-title="createEvent">
    
<div data-role="header">
      <h1>View Events</h1>
	  <a href="previous-page.html" data-rel="back" data-icon="arrow-l">Back</a>
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

$sql = "SELECT Event_Time, Task_Name, Event_Loc, Event_Note, Event_UserID FROM Event, Task WHERE Event_TaskID = Task_ID AND Event_UserID = '$id' AND Event_Date = CurDate() ORDER BY Event_Time";

if(!$sql)
{
	die(mysql_error());
}

$findrecord = mysql_query($sql);

if(!$findrecord)
{
	die(mysql_error());
}

/*while($row = mysql_fetch_assoc($findrecord))
{
	$rows = $rows + 1;
}

if ($rows > 1)
{
	echo "More than 1 event";
}*/

?>
<ul data-role="listview">
<?php
while($row = mysql_fetch_assoc($findrecord))
{?>
	<li><h3><?php echo $row['Task_Name']." <br/> ".$row['Event_Time']." <br/>Event Location: ".$row['Event_Loc']."  <br/>Event Note: ".$row['Event_Note'];?></h3></li><?php
}?></ul>
	</div>

<div data-role="footer" data-id="footer" data-position="fixed">
		<div data-role="navbar">
				<ul>
					<li><a href="viewEvents.php">Today</a></li>
					<li><a href="viewWeeklyEvents.php">Weekly</a></li>
					<li><a href="viewMonthlyEvents.php">Monthly</a></li>
				</ul>
			</div>
	</div>
</div>	
</body>
</html>