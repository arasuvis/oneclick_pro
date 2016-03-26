
<style type="text/css">
	input[type=number] {-moz-appearance: textfield;}
</style>

<select>
<option value='-1'>Choose Property</option>
<?php foreach($property as $list) { ?>
	<option value="<?php echo $list->name; ?>"><?php echo $list->name; ?></option>
<?php } ?>
</select>



<select>
<option value='-1'>Choose Family Member</option>
<?php foreach($family as $member) { ?>
	<option value="<?php echo $member->member_name; ?>"><?php echo $member->member_name; ?></option>
<?php } ?>
</select>

<input type="number" id="number" placeholder="allocation in %">
<span id="num_val"></span>

<button id="add_more">OK<button>

<script src="<?php echo base_url(); ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>

<script>
$("#number").keyup(function(){
	var num = $("#number").val();
	if(num < 100)
	{
		
	}
	else
	{
		$("#num_val").append("Please give less than 100")	
	}
});

</script>