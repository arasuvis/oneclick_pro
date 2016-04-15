 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- general form elements -->
              <div class="box box-primary col-lg-1 col-md-1">
                <div class="box-header with-border">
                  <h3 class="box-title">Add Ownership</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
               <form method="POST" action="insert_ownership/">
                  <div class="box-body">                   
					<div class="form-group" >
                      <label for="exampleInputPassword1">Name *</label>
                      <input type="text" class="form-control" name="own_name" id="name" placeholder="Name">
                  <?php echo form_error('own_name'); ?>

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                  </div>
                </form>
              </div><!-- /.box -->
	<script src = "<?php echo base_url('plugins/jQuery/jQuery-2.1.4.min.js'); ?>"></script>
<script>      
$("input").attr("maxlength", 30);
</script>		

	