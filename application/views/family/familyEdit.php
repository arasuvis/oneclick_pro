<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>SIMPLE CRUD APPLICATION</title>

<link href="<?php echo base_url(); ?>res/css/style.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery-ui.min.css" type="text/css" />
   
    
</head>
<body>

	<div class="content">
		<h1><?php echo $title; ?></h1>
		<?php echo $message; ?>
		<form method="post" action="<?php echo $action; ?>">
		<div class="data">
		<table>
			
				<input type="hidden" name="id" value="<?php echo set_value('id',$this->form_data->id); ?>"/>
			<tr>
				<td valign="top">Name<span style="color:red;">*</span></td>
				<td><input type="text" name="name" class="text" value="<?php echo set_value('name',$this->form_data->name); ?>"/>
<?php echo form_error('name'); ?>
				</td>
			</tr>
			<tr>
			<td valign="top">Relationship<span style="color:red;">*</span></td>
			<td><select name="relation">
					<?php foreach($rel as $relation) {  ?>
			
  				<option name="<?php echo $relation->name; ?>"> <?php echo $relation->name; ?>
  				</option>
  				<?php } ?>
 			</select>				
<?php echo form_error('relationship'); ?>
				</td>
			</tr>
			<tr>
				<td valign="top">Date of Birth<span style="color:red;">*</span></td>
				
				<td><input class="inputDate" id="datepicker"  />
					
<?php echo form_error('dob'); ?>
				</td>
			</tr>
			<tr>
				<td valign="top">Marital Status<span style="color:red;">*</span></td>
				<td><select name="marital_status">	
  				<option>Single </option>
  				<option>Married </option>
  	 			</select>			
<?php echo form_error('marital_status'); ?>
				</td>
			</tr>
			<tr>
			<tr>
				<td valign="top">Status<span style="color:red;">*</span></td>
				<td><input type="radio" name="status" class="text" value="Alive"/>Alive
				<input type="radio" name="status" class="text" value="Dead"/>Dead
<?php echo form_error('status'); ?>
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
<script type="text/javascript" src="<?php echo base_url('js/jquery-ui.min.js'); ?>"></script>
 <script type="text/javascript">
            $(function () {
                $('#datepicker').datepicker({
                	dateFormat:'yy-mm-dd'
                });
            });
        </script>
</html>