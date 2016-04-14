
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
 
         
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            
         <!--   <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="../../index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
                <li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
              </ul>
            </li>-->	
        
            <li class="treeview active">
              <a href="#">
                <i class="fa fa-table"></i> <span>Dashboard</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
               
                <li ><a href="<?php echo base_url('admin/admin/index?page=1');  ?>"><i class="fa fa-circle-o"></i>Manage Advocate</a></li>

				        <li ><a href="<?php echo base_url('admin/create/relation?page=2');  ?>"><i class="fa fa-circle-o"></i>Manage Relations</a></li>

                <li><a href="<?php echo base_url('admin/create/property_type?page=3');  ?>"><i class="fa fa-circle-o"></i>Property Type</a></li>
         
                <li ><a href="<?php echo base_url('admin/create/ownership?page=4');  ?>"><i class="fa fa-circle-o"></i>Nature of Ownership</a></li>

                <li ><a href="<?php echo base_url('admin/create/faq?page=5');  ?>"><i class="fa fa-circle-o"></i>FAQ</a></li>

                <!-- <li ><a href="<?php //echo base_url('admin/create/vedio?page=6');  ?>"><i class="fa fa-circle-o"></i>Vedio</a></li> -->
                </ul>
            </li>        
        </section>
        <!-- /.sidebar -->
      </aside>
      <script src= "<?php echo base_url('plugins/jQuery/jQuery-2.1.4.min.js'); ?>"></script>
      <script>
      $(document).ready(function() { 
        $.each($('.treeview-menu').children(),function(key,val){
var test = <?php if(empty($_GET['page'])) echo 0;else echo $_GET['page']; ?>;
        if(test == (key+1)){
              $(this).addClass('active');
        }
      });
       
      });
      </script>