<?php
//Define variables
session_start();
$id = $_SESSION['globalid'];

$con = mysql_connect("localhost","attend_admin","create");

if (!$con)
 {
  	die('Could not connect: ' . mysql_error());
 }

mysql_select_db("attend_appdb", $con);

$sql = "SELECT Cat_No FROM User_Cat_XREF WHERE User_ID = '$id'";

if(!$sql)
{
	die(mysql_error());
}

$findrecord = mysql_query($sql);

if(!$findrecord)
{
	die(mysql_error());
}

if (mysql_num_rows ($findrecord) > 0)
{
	$trigUpdate = 1;
}

while($row = mysql_fetch_assoc($findrecord))
{
	echo $row['Cat_No'];
	if($row['Cat_No'] == 1)
	{
		$trighome = 1;
	}
	if($row['Cat_No'] == 2)
	{
		$trigcareer = 1;
	}
	if($row['Cat_No'] == 3)
	{
		$trigfinance = 1;
	}
	if($row['Cat_No'] == 4)
	{
		$trigfamily = 1;
	}
	if($row['Cat_No'] == 5)
	{
		$trigauto = 1;
	}
	if($row['Cat_No'] == 6)
	{
		$trigmisc = 1;
	}
}
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
	<form action="insertCategories.php" method="post">
	<fieldset data-role="controlgroup">
			<div data-role="controlgroup" data-type="horizontal" style="text-align:center;">
				<h3>Please select the Categories that apply to you. Then, click <?php if(!$trigUpdate){?>"Create Profile."<?php }?><?php if($trigUpdate){?>"Update Profile."<?php }?></h3>
			</div>
				<input type="checkbox" name="home" id="home" value="home"<?php if($trighome){ ?> checked="true" <?php } ?>>
		    		<label for="home">Home (Ex: Lawn, Maid, Air Filter)</label>
				<input type="checkbox" name="career" id="career" value="career"<?php if($trigcareer){ ?> checked="true" <?php } ?>>
		    		<label for="career">Career (Ex: Meetings, Shifts)</label>
				<input type="checkbox" name="finance" id="finance" value="finance"<?php if($trigfinance){ ?> checked="true" <?php } ?>>
		    		<label for="finance">Finance (Ex: Bills, Investments)</label>
				<input type="checkbox" name="family" id="family" value="family"<?php if($trigfamily){ ?> checked="true" <?php } ?>>
			    	<label for="family">Family (Ex: Kids, Spouse)</label>
				<input type="checkbox" name="auto" id="auto" value="auto"<?php if($trigauto){ ?> checked="true" <?php } ?>>
				    <label for="auto">Automobile (Ex: Oil Change, Tires)</label>
				<input type="checkbox" name="misc" id="misc" value="misc"<?php if($trigmisc){ ?> checked="true" <?php } ?>>
					 <label for="misc">Misc (Ex: Errands, Goals)</label>

			<?php if(!$trigUpdate){?><input type="submit" name="formSubmit" id="formSubmit" data-icon="arrow-r" value="Create Profile" class="insertCategories"/><?php }?>
			<?php if($trigUpdate){?><input type="submit" name="updateCats" id="updateCats" data-icon="check" value="Update Profile"/>
			<a href="#" type="button" data-rel="back" data-icon="delete">Cancel</a><?php }?>
		</fieldset>
	</form>
</div>

</div>
</body>
</html>