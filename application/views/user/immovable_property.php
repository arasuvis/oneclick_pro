<?php include('header.php'); ?>

<form id="property" class="property" method="POST" action="<?php echo base_url(); ?>add_immov">
	<label>Name</label>&nbsp;
	<input type="text" name="name" id="name"><br><br>
	
	<label>Address</label>&nbsp;
	<textarea type="text" name="address" id="address"></textarea><br><br>
	
	<label>Municipal Number</label>&nbsp;
	<input type="text" name="municipal_number" id="municipal_number"><br><br>
	
	<label>Year Of Purchase</label>&nbsp;
	<input type="text" name="year_of_purchase" id="year_of_purchase"><br><br>
	
	<label>Area</label>&nbsp;
	<select id="area" name="area">
		<option value="-1">Choose area</option>
		<option value="Bangalore">Bangalore</option>
	</select><br><br>
	
	<label>Nature Of Ownership</label>&nbsp;
	<input type="text" name="nature_of_ownership" id="nature_of_ownership"><br><br>
	
	<input type="submit" value="submit" >
</form>

<?php include("footer.php"); ?>