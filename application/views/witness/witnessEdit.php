<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Witness</title>

<link href="<?php echo base_url(); ?>res/css/style.css" rel="stylesheet" type="text/css" />

</head>
<body>
	<div class="content">
		<h1><?php echo $title; ?></h1>
		<?php echo $message; ?>
		<form method="post" action="<?php echo $action; ?>">
		<div class="data">
		<table>
			
				<input type="hidden" name="id" value="<?php echo set_value('witness_id',$this->form_data->id); ?>"/>
			<tr>
				<td valign="top">Name<span style="color:red;">*</span></td>
				<td><input type="text" name="name" class="text" value="<?php echo set_value('name',$this->form_data->name); ?>"/>
<?php echo form_error('name'); ?>
				</td>
			</tr>
			<tr>
				<td valign="top">Address<span style="color:red;">*</span></td>
				<td><input type="text" name="address" class="text" value="<?php echo set_value('address',$this->form_data->address); ?>"/>
<?php echo form_error('name'); ?>
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