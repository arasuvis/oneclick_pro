
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Manage Relations
          </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><div> <a href='<?php echo base_url();?>admin/create/add_relation'><button class='btn btn-warning'>Add Relation</button></a></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
						<thead style="font-weight: bold">
                          <tr>
                <td>Sr No</td>			
				<td>Name</td>				
				<td>Added Date</td>
				<td>Action</td>
			</tr>
			</thead>
			<tbody>
            <?php $i=0; ?>
			<?php foreach($messages as $m){ ?>
				<tr>
				    <td><?php echo ++$i; ?></td>					
					<td> <?php echo $m->name; ?> </td>					
					<td> <?php echo date("M-d-Y g:i", strtotime($m->date)); ?> </td>
					<td>
						 <a href='<?php echo base_url("admin/edit/update_view/" . $m->rel_id); ?>'><button class='btn btn-success'>Edit</button></a>
						 <a href='<?php echo base_url("admin/edit/delete_relation/" . $m->rel_id); ?>' onClick ="return delConfirm()"><button class=' btn btn-danger'>Delete</button></a>
				    </td>
				</tr>
			<?php } ?>
</tbody>
                            <tfoot>
                                  <tr>			
				<td>Name</td>				
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
        var r = confirm("Do you want to delete");
        if(r==true)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
</script>