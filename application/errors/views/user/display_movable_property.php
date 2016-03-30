<?php
//print_r($this->session->userdata['is_userlogged_in']);die();
if (!isset($this->session->userdata['is_userlogged_in'])) {

header("location: dashboard");
}
?>
<?php include('header.php'); ?>

<a href="<?php echo base_url(); ?>mov_form"><button >Add + </button></a>
<table border="5" cellpadding="5px" cellspacing="5px">
<th>Name</th>
<th>Comments</th>

<?php foreach ($mov_prop as $data) { ?>
<tr>
	<td><?php echo $data->name ?></td>
	<td><?php echo $data->comments ?></td>
</tr>
<?php } ?>
</table>

<?php include("footer.php"); ?>