 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- general form elements -->
              <div class="box box-primary col-lg-1 col-md-1">
                <div class="box-header with-border">
                  <h3 class="box-title">Update Property Type</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
               <form method="POST" action="<?php echo base_url('admin/edit/edit_propertye_type');?>">
			   <input type="hidden" name="id" value="<?php echo $entry->prop_id; ?>"/>
                  <div class="box-body">
					<div class="form-group">
                      <label for="exampleInputPassword1">Name *</label>
                      <input type="text" class="form-control" value="<?php if(isset($entry->prop_name)) echo $entry->prop_name; ?>" name="prop_name" id="name" placeholder="Name">
                   
                      <?php echo form_error('prop_name'); ?> 
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

	
	