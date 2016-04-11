<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>SIMPLE CRUD APPLICATION</title>

      <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">
	   <link href="<?php echo base_url();?>res/css/style.css" rel="stylesheet">
	     <link rel="stylesheet" href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">

      <!-- Font Awesome -->
      <link rel="stylesheet" href="<?php echo base_url();?>css/font-awesome.min.css">
      <!-- Ionicons -->
      <link rel="stylesheet" href="<?php echo base_url();?>css/ionicons.min.css">
	  
	   <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.1.2/css/buttons.dataTables.min.css">
	  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<script type="text/javascript">
			var Settings = {
			base_url: '<?php echo base_url('plugins/datatables/extensions/TableTools/swf/'); ?>'
			}
		</script>
	<div class="content">
		<h1>Manage Witness</h1>
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
		<!--<div class="text-right"><?php echo anchor('person/add/','Add Witness',array('class'=>'btn btn-lg btn-primary text-right','data-toggle'=>'modal','data-target'=>'#myModal')); ?></div>-->
		<div class="text-right"><?php echo anchor('person/add/','Add Witness',array('class'=>'btn btn-lg btn-primary text-right')); ?></div>
			<br />
		<!--<div class="paging"><?php echo $pagination; ?></div>-->
		<div class="data"><?php echo $table; ?></div>
	
		
	</div>
</body>
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.1.2/js/dataTables.buttons.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
	<script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
	<script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
	<script src="//cdn.datatables.net/buttons/1.1.2/js/buttons.html5.min.js"></script>
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
        /*$('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });*/
      });
    </script>
</html>