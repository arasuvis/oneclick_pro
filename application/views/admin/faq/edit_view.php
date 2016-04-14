 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- general form elements -->
              <div class="box box-primary col-lg-1 col-md-1">
                <div class="box-header with-border">
                  <h3 class="box-title">Update Faq</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
               <form method="POST" action="<?php echo base_url('admin/edit/edit_ownership');?>">
			   <input type="hidden" name="id" value="<?php echo $entry->faq_id; ?>"/>
                  <div class="box-body">
					<div class="form-group">
                     <label for="exampleInputPassword1">Type *</label>
                      
                      <select name="cat_type_name" class="form-control">
                      <option value=""> Select Type</option>

                    <?php  foreach($messages as $mess) {  ?>
      
                    <option <?php  /*if(isset($entry->name)) if($mess->name ==  $property->prop_id) echo "selected"; */ ?> value="<?php echo $mess->cat_id; ?>"> <?php echo $mess->name; ?>  
                   </option> 
                   <?php } ?> 
                    </select> 
                  <?php echo form_error('type_name'); ?>

                   

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                  </div>
                </form>
              </div><!-- /.box -->
			

	
	