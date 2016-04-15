 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- general form elements -->
              <div class="box box-primary col-lg-1 col-md-1">
                <div class="box-header with-border">
                  <h3 class="box-title">Add Faq</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
               <form method="POST" action="insert_faq/">
                  <div class="box-body">                   
					<div class="form-group" >
                      <label for="exampleInputPassword1">Type *</label>
                      
                      <select name="cat_type_name" class="form-control">
                      <option value=""> Select Type</option>

                    <?php  foreach($type as $types) {  ?>
      
                    <option value="<?php echo $types->cat_id; ?>"> <?php echo $types->name; ?>  
                   </option> 
                   <?php } ?> 
                    </select> 
                  <?php echo form_error('type_name'); ?>

                   <label for="exampleInputPassword1">Question *</label>
                   <textarea class="form-control" name="question" id="question" placeholder="Question">Question</textarea>
                  <?php echo form_error('question'); ?>

                   <label for="exampleInputPassword1">Answer *</label>
                   <textarea class="form-control" name="answer" id="answer" placeholder="Answer"> Answer</textarea>
                  <?php echo form_error('answer'); ?>

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                  </div>
                </form>
              </div><!-- /.box -->
			

	