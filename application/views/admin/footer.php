<!--  <footer class="main-footer">
        <div class="pull-right hidden-xs">
        </div>
        <strong>Copyright &copy; 2015-2016 <a href="http://www.indglobal.in/">Indglobal</a>.</strong> All rights reserved.
      </footer>-->

  
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->
    <!-- jQuery 2.1.4 -->
   <script src="<?php echo base_url('plugins/jQuery/jQuery-2.1.4.min.js'); ?>"></script>
    <!-- Bootstrap 3.3.5 -->
   <script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
    <!-- DataTables -->
   <script src="<?php echo base_url('plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
   <script src="<?php echo base_url('plugins/datatables/dataTables.bootstrap.min.js'); ?>"></script>
    <!-- SlimScroll -->
   <script src="<?php echo base_url('plugins/slimScroll/jquery.slimscroll.min.js'); ?>"></script>
    <!-- FastClick -->
   <script src="<?php echo base_url('plugins/fastclick/fastclick.min.js'); ?>"></script>
    <!-- AdminLTE App -->
   <script src="<?php echo base_url('js/app.min.js'); ?>"></script>
    <!-- AdminLTE for demo purposes -->
   <script src="<?php echo base_url('js/demo.js'); ?>"></script>
    <!-- page script -->
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
  </body>
</html>
