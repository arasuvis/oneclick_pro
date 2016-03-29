<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>One Click</title>

<link href="http://localhost/oneclick/trunk/css/bootstrap.min.css" rel="stylesheet">
<link href="http://localhost/oneclick/trunk/res/css/style.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url(); ?>plugins/datatables/css/jquery.dataTables.min.css">

<!-- Font Awesome -->
<link rel="stylesheet" href="http://localhost/oneclick/trunk/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="http://localhost/oneclick/trunk/css/ionicons.min.css">
  
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.1.2/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>/css/bootstrap.min.css">
<script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
</head>
<body>
	<script type="text/javascript">
		var Settings = {
		base_url: 'http://localhost/oneclick/trunk/plugins/datatables/extensions/TableTools/swf'
		}
	</script>
	<div class="content">
		<h1>Manage Immovable Properties</h1>
  	<!-- Modal -->
  	<div class="modal fade" id="myModal" role="dialog">
    	<div class="modal-dialog">
    
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			  <h4 class="modal-title"></h4>
			</div>
			<div class="modal-body">
			 
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
      
    	</div>
  	</div>
	</div>

	<div class="text-right">
	<a href="http://localhost/oneclick/trunk/person/add" class="btn btn-lg btn-primary text-right" data-toggle="modal" data-target="#myModal">Add Property</a>
	</div>
	<br />

	<div class="data"><?php echo $table; ?></div>

</body>
    <script src="<?php echo base_url(); ?>plugins/jQuery/jquery-1.12.0.min.js"></script>
    <script src="<?php echo base_url(); ?>plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url(); ?>plugins/datatables/js/dataTables.buttons.min.js"></script>
	<script src="<?php echo base_url(); ?>plugins/jQuery/jszip.min.js"></script>
	<script src="<?php echo base_url(); ?>plugins/jQuery/pdfmake.min.js"></script>
	<script src="<?php echo base_url(); ?>plugins/jQuery/vfs_fonts.js"></script>
	<script src="<?php echo base_url(); ?>plugins/jQuery/buttons.html5.min.js"></script>
	
	<script>
    $(function () {
        $("#example1").DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false,
		 columnDefs: [
   		{ orderable: false, targets: -1 }
		],
		dom: 'Bfrtip',
		buttons: [

		{
		    extend: 'csv',
			text: 'Download',
		    exportOptions: {
		       columns: [ 0, 1, 2, 3]
		    }
		}
		]

		});
    });
    </script>
</html>