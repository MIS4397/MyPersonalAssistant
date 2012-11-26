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
  <title>Custom Event</title>
</head>
<body>
  <div data-role="page" id="createEvent" data-title="createEvent">
    
<div data-role="header">
      <h1>Custom Event</h1>
	  <a href="#" data-icon="arrow-l" data-rel="back">Back</a>
</div>

<div data-role="content">
<h3>Please enter the name, date, time, location, and any notes you may have relating to your event <?php /*echo $type*/?> here.</h3>
	
<form action="insertCategories.php" method="post">
	<div data-role="fieldcontain" style='text-align:center;'>
     <label for="date">Event Name:</label>
     <input type="text" name="name" id="name" />
	</div>
	
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
	<input type="submit" name="customSubmit" id="customSubmit" value="Create Event"/></div>
	<a href="#" type="button" data-rel="back">Cancel</a>
</form>
</div>
	</div>
	
</body>
</html>