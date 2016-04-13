<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>SIMPLE CRUD APPLICATION</title>

<link href="<?php echo base_url(); ?>res/css/style.css" rel="stylesheet" type="text/css" />

</head>
<body>

		<div class="content">
		<h1><?php echo $title; ?></h1>
		<?php echo $message; ?>
		<form method="post" action="<?php echo $action; ?>">
		<div class="data">
		<?php// print_r($person); die();?>
				<table>
			
			<input type="hidden" name="id" value="<?php echo set_value('id',$this->form_data->id); ?>"/>
			<tr>
				<td valign="top">Property Type<span style="color:red;">*</span></td>
				<td><select name="name" >
					<option value=""> Select Property Type</option>

					<?php  foreach($property_type as $property) {  ?>
			
  				  <option <?php if(isset($person->name)) if($person->name ==  $property->prop_id) echo "selected"; ?> value="<?php echo $property->prop_id; ?>"> <?php echo $property->prop_name; ?>  
  			 </option> 
  				<?php } ?> 
 			</select>		
			<?php echo form_error('prop_name'); ?>
				</td>
			</tr>
			<tr>
				<td valign="top">Address<span style="color:red;">*</span></td>
				<td>
					<textarea rows="4" cols="30" name="address" class="text"> <?php echo set_value('address',$this->form_data->address); ?> </textarea>

				<?php echo form_error('address'); ?>
				</td>
			</tr>

			<tr>
				<td valign="top">Municipal Number<span style="color:red;">*</span></td>
				<td><input type="text" name="municipal_number" class="text" value="<?php echo set_value('municipal_number',$this->form_data->municipal_number); ?>"/>
<?php echo form_error('name'); ?>
				</td>
			</tr>

			<tr>
				<td valign="top">Year Of Purchase<span style="color:red;">*</span></td>
				<td><input type="text" name="year_of_purchase" class="text" value="<?php echo set_value('year_of_purchase',$this->form_data->year_of_purchase); ?>"/>
<?php echo form_error('name'); ?>
				</td>
			</tr>

			<tr>
				<td valign="top">Area<span style="color:red;">*</span></td>
				<td><input type="text" name="area" class="text" value="<?php echo set_value('area',$this->form_data->area); ?>"/>
<?php echo form_error('name'); ?>
				</td>
			</tr>
			
			<tr>
				<td valign="top">Nature Of Ownership<span style="color:red;">*</span></td>
				<td><select name="nature_of_ownership" >
					<option value=""> Select Ownership</option>

					<?php  foreach($ownership as $owner) {  ?>
			
  				  <option <?php if(isset($person->nature_of_ownership)) if($person->nature_of_ownership == $owner->own_id) echo "selected"; ?> value="<?php echo $owner->own_id; ?>"> <?php echo $owner->own_name; ?>  
  			 </option> 
  				<?php } ?> 
 			</select>		
			<?php echo form_error('nature_of_ownership'); ?>
				</td>
			</tr>

			<tr>
				<td>&nbsp;</td>
				<td><input type="submit" value="Save"/></td>
			</tr>
		</table>
		</div>
		</form>
		<br />
		<?php echo $link_back; ?>
	</div>
</body>
</html>