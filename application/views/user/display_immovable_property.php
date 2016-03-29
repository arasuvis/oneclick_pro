<?php include("header.php"); ?>

<a href="<?php echo base_url(); ?>property"><button >Add + </button></a>
<table border="5" cellpadding="5px" cellspacing="5px">
<th>Property Name</th>
<th>Address</th>
<th>Municipal Number</th>
<th>Year Of Purchase</th>
<th>Area</th>
<th>Nature Of Ownership</th>

<?php foreach ($imv_prop as $data) { ?>
<tr>
	<td><?php echo $data->name ?></td>
	<td><?php echo $data->address ?></td>
	<td><?php echo $data->municipal_number ?></td>
	<td><?php echo $data->year_of_purchase ?></td>
	<td><?php echo $data->area ?></td>
	<td><?php echo $data->nature_of_ownership ?></td>
</tr>
<?php } ?>
</table>

<?php include("footer.php"); ?>