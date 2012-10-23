<?php
//Define variables
$id = $_POST['passval'];
?>
<!doctype html>
<html>
<head>
  <title>Categories</title>
</head>
<body>
  <div data-role="page" id="categorySelect" data-title="Category Select">
    
<div data-role="header">
      <h1>Task Categories</h1>
</div>
    
<div data-role="content">
	<div data-role="content">
		<form action="insertCategories.php" method="post">
		<div data-role="fieldcontain">
		  <fieldset data-role="controlgroup">
			<div data-role="controlgroup" data-type="horizontal" style="text-align:center;">
				<h3>Please select the categories below that apply to you. Click the "Create Profile" button when you're ready to continue.</h3>
			</div>

			<br/>
				<input type="checkbox" name="home" id="home" value="home">
		    		<label for="home">Home (Ex: Lawn, Maid, Air Filter)</label>
				<input type="checkbox" name="career" id="career" value="career">
		    		<label for="career">Career (Ex: Meetings, Shifts)</label>
				<input type="checkbox" name="finance" id="finance" value="finance">
		    		<label for="finance">Finance (Ex: Bills, Investments)</label>
				<input type="checkbox" name="family" id="family" value="family">
			    	<label for="family">Family (Ex: Kids, Spouse)</label>
				<input type="checkbox" name="auto" id="auto" value="auto">
				    <label for="auto">Automobile (Ex: Oil Change, Tires)</label>
				<input type="checkbox" name="misc" id="misc" value="misc">
					 <label for="misc">Misc (Ex: Errands, Goals)</label>
				<!--<input type="checkbox" name="custom" id="custom" value="custom">
					 <label for="custom">Custom Category</label>-->
		  </fieldset>
			<input type="hidden" id="passid" name="passid" value='<?php echo $id ?>'>
			<input type="submit" name="formSubmit" id="formSubmit" value="Create Profile"/>
		</div>
	</form>
	</div>

</div>
	</div>
</body>
</html>