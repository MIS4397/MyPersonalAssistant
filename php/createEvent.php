<?php
//Define variables
$id = $_POST['id'];
$home = $_POST['home'];
$career = $_POST['career'];
$finance = $_POST['finance'];
$family = $_POST['family'];
$auto = $_POST['auto'];
$misc = $_POST['misc'];
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
		<input type="hidden" name="uid" id="uid" value="<?php echo $id?>">
		<input type="hidden" name="home" id="home" value="<?php echo $home?>">
		<input type="hidden" name="career" id="career" value="<?php echo $career?>">
		<input type="hidden" name="finance" id="finance" value="<?php echo $finance?>">
		<input type="hidden" name="family" id="family" value="<?php echo $family?>">
		<input type="hidden" name="auto" id="auto" value="<?php echo $auto?>">
		<input type="hidden" name="misc" id="misc" value="<?php echo $misc?>">
	<input type="submit" name="eventSubmit" id="eventSubmit" value="Create Event"/></div>
</form>
</div>
	</div>
	
</body>
</html>