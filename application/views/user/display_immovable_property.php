<?php include( "header.php"); ?>
<div class="content">
    <h1>Manage Immovable Properties</h1>
    <!-- Modal -->
   <?php include('modals_property.php');?>
</div>
<div class="text-right">
    <button class="btn btn-lg btn-primary" data-toggle="modal" data-target="#myModal">Add Property</button>
</div>
<br />
<div class="data">
    <?php echo $table; ?>
</div>
<?php include( "footer.php"); ?>