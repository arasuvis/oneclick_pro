
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Manage Advocates
          </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a>
            </li>
            <li><a href="#">Advocates</a>
            </li>	
           <!-- <li class="active">Data tables</li>-->
        </ol>
    </section>  

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><div> <a href='<?php echo base_url();?>admin/create/index'><button class='btn-primary'>Add Advocate</button></a></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
						<thead>
                          <tr>
	
				
				<td>Name</td>
				<td>Contact</td>
				<td>Email</td>
				<td>Address</td>
				<td>Added Date</td>
				<td>Action</td>
			</tr>
			</thead>
			<tbody>
			<?php foreach($messages as $m){ ?>
				<tr>
				
					
					<td> <?php echo $m->name; ?> </td>
					<td> <?php echo $m->phone_number; ?> </td>
					<td> <?php echo $m->email; ?> </td>
					<td> <?php echo $m->address; ?> </td>
					<td> <?php echo date("M-d-Y g:i", strtotime($m->date)); ?> </td>
					<td>
						 <a href='<?php echo base_url("admin/edit/index/" . $m->id); ?>'><button class='btn-primary'>Edit</button></a>
						 <a href='<?php echo base_url("admin/edit/delete/" . $m->id); ?>'><button class='btn-primary' onclick = "return delConfirm()">Delete</button></a>
				    </td>
				</tr>
			<?php } ?>
</tbody>
                            <tfoot>
                                 <tr>
	
				<td>Name</td>
				<td>Contact</td>
				<td>Email</td>
				<td>Address</td>
				<td>Added Date</td>
				<td>Action</td>
			</tr>
			
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
function delConfirm()
{
    var r=confirm('Do you want to delete');
    if( r == true )
    {
        return true;
    }
    else
    {
        return false;
    }
}
</script>