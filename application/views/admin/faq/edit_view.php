 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- general form elements -->
              <div class="box box-primary col-lg-1 col-md-1">
                <div class="box-header with-border">
                  <h3 class="box-title">Update Faq</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
               <form method="POST" action="<?php echo base_url('admin/edit/edit_faq');?>">
			   <input type="hidden" name="faq_id" value="<?php echo $entry->faq_id; ?>"/>
                  <div class="box-body">
					<div class="form-group">
                     <label for="exampleInputPassword1">Type *</label>
                      
                    <select name="cat_type_name" class="form-control">
                    <option value=""> Select Type</option>

                    <?php  foreach($messages as $mess) {  ?>
      
                    <option <?php  if($entry->cat_type_name ==  $mess->cat_type_name) echo "selected";?> value="<?php echo $mess->cat_id; ?>"> <?php echo $mess->name; ?>  
                   </option> 
                   <?php } ?> 
                    </select> 
                  <?php echo form_error('cat_type_name'); ?>

                    <label for="exampleInputPassword1">Question  *</label>
                      <input type="text" class="form-control" value="<?php echo $entry->question; ?>" name="question" id="question" placeholder="Question">
                        <?php echo form_error('question'); ?>

                    <label for="exampleInputPassword1">Answer  *</label>
                      <input type="text" class="form-control" value="<?php echo $entry->answer; ?>" name="answer" id="answer" placeholder="Answer">
                      <?php echo form_error('answer'); ?>

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                  </div>
                </form>
              </div><!-- /.box -->
			

	
	