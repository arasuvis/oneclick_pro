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
		<table>
			
			<input type="hidden" name="id" value="<?php echo set_value('id',$this->form_data->id); ?>"/>
			
			
			<tr>
				<td valign="top">Select Family Membor<span style="color:red;">*</span></td>
				<td>
			
				<select name="member_id">

					<?php foreach ($get_family_member as $value) { ?>

					<option value="<?php echo $value->user_id_new; ?>"><?php echo $value->firstname; ?></option>
					
					<?php 
						if($this->form_data->member_id == $value->user_id_new)
						{ ?>
							<option selected value="<?php echo $value->user_id_new; ?>"><?php echo $value->firstname; ?></option>
						<?php }
					?>

					<?php } ?>
				</select>

				</td>
			</tr>

			<tr>
				<td valign="top">Reason<span style="color:red;">*</span></td>
				<td><input type="text" name="reason" class="text" value="<?php echo set_value('reason',$this->form_data->reason); ?>"/>
				<?php echo form_error('reason'); ?>
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