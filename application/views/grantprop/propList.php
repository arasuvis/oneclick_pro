<body>

	<div class="content">
		<h1>Manage Doctors</h1>
    <!-- Modal HTML -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Content will be loaded here from "remote.php" file -->
            </div>
        </div>
    </div>
  
</div>
		<!--<div class="text-right"><?php echo anchor('person/add/','Add Witness',array('class'=>'btn btn-lg btn-primary text-right','data-toggle'=>'modal','data-target'=>'#myModal')); ?></div>-->
		<div class="text-right"><?php echo anchor('grantprop/add/','Add Doctor',array('class'=>'btn btn-lg btn-primary text-right')); ?></div>
			<br />
		<!--<div class="paging"><?php echo $pagination; ?></div>-->
		<div class="data"><?php echo $table; ?></div>
	
		
	</div>