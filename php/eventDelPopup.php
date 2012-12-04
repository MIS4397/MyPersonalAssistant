<?php
session_start();
$id = $_SESSION['globalid'];
?>
<script>
  $.mobile.changePage($('#error'), 'pop');
</script>
<!doctype html>
<html>
	<head>
	<meta charset="utf-8">
</head>
<body>
	<div data-role="dialog" id="error">
	  <div data-role="header">
	    <h1>Event Deleted</h1>
	  </div>
	  <div data-role="content">
	    <p>Your event has been successfully deleted.</p>
	<a href="insertCategories.php" data-role="button">Ok</a>
	  </div>
	</div>
</body>
</html>