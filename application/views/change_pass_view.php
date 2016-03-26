<?php include('header.php'); ?>

<form class="form-horizontal" method="post" action="new_pass">
<fieldset>

<!-- Form Name -->
<legend>Form Name</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Current Password</label>  
  <div class="col-md-4">
  <input id="textinput" name="password" type="text" placeholder="Enter Current Password" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Confirm Current Password</label>  
  <div class="col-md-4">
  <input id="textinput" name="confirm_password" type="text" placeholder="Confirm Current Password" class="form-control input-md" required="">
    <?php echo form_error('confirm_password'); ?> 
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">New Password</label>  
  <div class="col-md-4">
  <input id="textinput" name="new_password" type="text" placeholder="Enter New Password" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="button1id"></label>
  <div class="col-md-8">
   <?php echo form_reset(['name'=>'reset','value'=>'Cancel','class'=>'btn btn-warning']) ?><?php echo form_submit(['name'=>'submit','value'=>'Submit','class'=>'btn btn-info']) ?>
    
  </div>
</div>

</fieldset>
</form>



<?php include('footer.php'); ?>