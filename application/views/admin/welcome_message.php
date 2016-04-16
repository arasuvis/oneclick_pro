<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Manage Advocate
          </h1>
    </section>  


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><div> <a href='<?php echo base_url();?>admin/create/index'><button class='btn btn-warning'>Add Advocate</button></a></h3>
                    </div>
                    <?php if($feedback = $this->session->flashdata('feedback')) : ?>
  <?php $feedback_color = $this->session->flashdata('feedback_color') ?>
    <div class="row">
    <div class="col-lg-6 col-lg-offset-3">
      <div class="alert alert-dismissible <?php echo $feedback_color ?>">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <?php echo $feedback; ?>
      </div>
    </div>
    </div>
  <?php endif; ?>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped ">
						<thead style="font-weight: bold">
                          <tr>
	           
				<td>Sr No</td>
				<td>Name</td>
				<td>Contact</td>
				<td>Email</td>
				<td>Address</td>
				<td>Added Date</td>
				<td class="nodesign">Action</td>
			</tr>
			</thead>
			<tbody>
            <?php $i=0; ?>
			<?php foreach($messages as $m){ ?>
				<tr>
				    <td><?php echo ++$i; ?>					
					<td> <?php echo $m->name; ?> </td>
					<td> <?php echo $m->phone_number; ?> </td>
					<td> <?php echo $m->email; ?> </td>
					<td> <?php echo $m->address; ?> </td>
					<td> <?php echo date("M-d-Y g:i", strtotime($m->date)); ?> </td>
					<td>
						 <a href='<?php echo base_url("admin/edit/index/" . $m->id); ?>'><button class='btn btn-success'>Edit</button></a>
						 <a href='<?php echo base_url("admin/edit/delete_message/" . $m->id); ?>'><button class='btn btn-danger' onclick = "return delConfirm()">Delete</button></a>
				    </td>
				</tr>
			<?php } ?>
</tbody>
                            <tfoot>
                                 <tr style="font-weight: bold">
	            <td>Sr No</td>
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