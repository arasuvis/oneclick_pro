<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title></title>

<link href="<?php echo base_url(); ?>res/css/style.css" rel="stylesheet" type="text/css" />

<link href="<?php echo base_url(); ?>res/css/calendar.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>res/js/calendar.js"></script>

</head>
<body>
	<div class="content">
		<h1><?php echo $title; ?></h1>
		<?php echo $message; ?>
		<form method="post" action="<?php echo $action; ?>">
		<div class="data">
		<table>
		<tr>
				<td width="30%">Property<span style="color:red;">*</span></td>
				<td><select class="select" name="properties"><option>Select Property</option>
				<?php foreach($get_im_property as $prop)
				{
				?>
				<option value="<?php echo $prop->Immovable_id;?>"><?php echo $prop->name;?></option>
				<?php 					
				}
				?></select></td>
				
			</tr>
			<tr>
				<td width="30%">Member<span style="color:red;">*</span></td>
				<td><select class="select" name="fam_member"><option>Select Member</option>
				<?php foreach($get_family_members as $members)
				{
				?>
				<option value="<?php echo $members->user_id_new;?>"><?php echo $members->firstname;?></option>
				<?php 					
				}
				?></select></td>				
			</tr>
			<tr>
				<td valign="top">Percentage(%)<span style="color:red;">*</span></td>
				<td><input type="text" name="percent" class="text" value="<?php echo set_value('name',$this->form_data->percent); ?>"/>
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