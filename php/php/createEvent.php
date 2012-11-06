<?php
//Define variables
session_start();
$id = $_SESSION['globalid'];
$type = $_POST['select'];
$_SESSION['globaltype']=$type;
?>
<!doctype html>
<html>
<head>
  <title>Create Event</title>
</head>
<body>
  <div data-role="page" id="createEvent" data-title="createEvent">
    
<div data-role="header">
      <h1>Create Event</h1>	  
</div>

<div data-role="content">
<h3>Please enter the date, time, location, and any notes you may have relating to your event here.</h3>
	
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
	
	<div style='text-align:center;'>
		<!--<input type="hidden" name="passid" id="passid" value="<?php echo $id?>">
		<input type="hidden" id="passtrigger" name="passtrigger" value='1'/>-->
	<input type="submit" name="eventSubmit" id="eventSubmit" value="Create Event"/></div>
</form>
</div>
	</div>
	
</body>
</html>