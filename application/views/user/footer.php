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
<script src="<?php echo base_url(); ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="<?php echo base_url('js/bootstrap.min.js')?>" type="text/javascript"></script>
</body>   
</html>