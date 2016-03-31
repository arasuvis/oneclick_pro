<body>

	<div class="content">
		<h1>Manage Immovable Properties</h1>
    <!-- Modal HTML -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Content will be loaded here from "remote.php" file -->
            </div>
        </div>
    </div>
  
</div>
		<div class="text-right"><?php echo anchor('property/add/','Add Property',array('class'=>'btn btn-lg btn-primary text-right','data-toggle'=>'modal','data-target'=>'#myModal')); ?></div>
			<br />
		<!--<div class="paging"><?php echo $pagination; ?></div>-->
		<div class="data"><?php echo $table; ?></div>
	
	</div>