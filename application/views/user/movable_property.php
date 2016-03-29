<?php
//print_r($this->session->userdata['is_userlogged_in']);die();
if (!isset($this->session->userdata['is_userlogged_in'])) {

header("location: dashboard");
}
?>
<?php include('header.php'); ?>

<form id="property" class="property" method="POST" action="<?php echo base_url(); ?>add_mov">
	<label>Name</label>&nbsp;
	<input type="text" name="name" id="name"><br><br>
	
	<label>Comment</label>&nbsp;
	<textarea type="text" name="comments" id="comments"></textarea><br><br>
	
	<input type="submit" value="submit" >
</form>

<?php include("footer.php"); ?>