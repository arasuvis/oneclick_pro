<?php include('header.php'); ?>

<style type="text/css">
	input[type=number] {-moz-appearance: textfield;}
</style>

<div class="container">

<div class="show_more">

	<select>
	<option value="+1">Choose Property</option>
	<?php foreach($property as $list) { ?>
		<option value="<?php echo $list->name; ?>"><?php echo $list->name; ?></option>
	<?php } ?>
	</select>


	<select>
	<option value='-1'>Choose Family Member</option>
	<?php foreach($family as $member) { ?>
		<option value="<?php echo $member->member_id; ?>"><?php echo $member->member_name; ?></option>
	<?php } ?>
	</select>

	<input type="number" class="number" placeholder="allocation in %">

	<button class="add_more">OK</button>
</div>
</div>

<input type="hidden" id="property" value='<?php echo json_encode($property) ?>'>
<input type="hidden" id="member_name" value='<?php echo json_encode($family) ?>'>

<script src="<?php echo base_url(); ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>

<script>


$(document).ready(function(){
	$('.add_more').on('click',function(){
	var prev = $('.add_more').parent().children().first().val();
	var prev_family = $('.add_more').parent().children().first().next().val();
	var property = $.parseJSON($("#property").val());
	var family = $.parseJSON($("#member_name").val());
	
	

	var select_property = "";
   
	select_property = select_property+'<select><option value="+1">Choose Property</option>';
	
	$.each(property,function(key,ele){
	   	if(prev == ele.name)
	   	{
	        select_property = select_property+'<option selected value="'+ele.name+'">'+ele.name+'</option>';
	    }
	    else
	    {
	      	select_property = select_property+'<option value="'+ele.name+'">'+ele.name+'</option>';
	    }
   	});
   	select_property = select_property+'</select>';
   	//console.log(select_property);

   	var select_family = "";
   
	select_family = select_family+'<select><option value="-1">Choose Family Member</option>';
	
	$.each(family,function(key,val){
	   	if(prev_family == val.member_name)
	   	{
	        select_family = select_family+'<option value="'+val.member_id+'">'+val.member_name+'</option>';
	    }
	    else
	    {
	      	select_family = select_family+'<option value="'+val.member_id+'">'+val.member_name+'</option>';
	    }
   	});
	select_family = select_family+'</select>';
	
   	var input = '<input type="number" class="number1" placeholder="allocation in %">';


   	var my_div = '<div class="show_more">' + select_property + select_family + input + 
   	'<button class = "addition" onclick="addition()">+</button></div>';
   	$('.container').append(my_div);
   	$('.add_more').hide();
	
	});
	
});

function addition()
{
	$(".addition").hide();
	var prev = $('.add_more').parent().children().first().val();
	var prev_family = $('.add_more').parent().children().first().next().val();
	var property = $.parseJSON($("#property").val());
	var family = $.parseJSON($("#member_name").val());
		
	var select_property = "";
   
	select_property = select_property+'<select><option value="+1">Choose Property</option>';
	
	$.each(property,function(key,ele){
	   	if(prev == ele.name)
	   	{
	        select_property = select_property+'<option selected value="'+ele.name+'">'+ele.name+'</option>';
	    }
	    else
	    {
	      	select_property = select_property+'<option value="'+ele.name+'">'+ele.name+'</option>';
	    }
   	});
   	select_property = select_property+'</select>';
   	//console.log(select_property);

   	var select_family = "";
   
	select_family = select_family+'<select><option value="-1">Choose Family Member</option>';
	
	$.each(family,function(key,val){
	   	if(prev_family == val.member_name)
	   	{
	        select_family = select_family+'<option value="'+val.member_id+'">'+val.member_name+'</option>';
	    }
	    else
	    {
	      	select_family = select_family+'<option value="'+val.member_id+'">'+val.member_name+'</option>';
	    }
   	});
	select_family = select_family+'</select>';
	
   	var input = '<input type="number" class="number2" placeholder="allocation in %">';

   	var my_div = '<div class="show_more">' + select_property + select_family + input + ' <button class="addition" onclick="addition()">+</button></div>';
   	$('.container').append(my_div);
   	
}


</script>


<?php include("footer.php"); ?>