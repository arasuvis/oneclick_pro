<?php include('header.php'); ?>

<form class="form-horizontal" method="post" action="credentials">
<fieldset>

<!-- Form Name -->
<legend>Login Form</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="text">Email Id</label>  
  <div class="col-md-4">
  <input id="text" name="email" type="text" placeholder="Enter Email Id" class="form-control input-md" required="" value="<?php echo set_value('email') ?>">
       </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="password">Password </label>
  <div class="col-md-4">
    <input id="password" name="password" type="password" placeholder="Enter Password " class="form-control input-md" required="">
      </div>
  </div>


<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="button1id"></label>
  <div class="col-md-8">
   <?php echo form_reset(['name'=>'reset','value'=>'Cancel','class'=>'btn btn-default']) ?><?php echo form_submit(['name'=>'submit','value'=>'Submit','class'=>'btn btn-primary']) ?>
   
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="button1id"></label>
  <div class="col-md-8">
   <a href="<?php echo base_url('user/forgot') ?>">Forgot Password</a>
  </div>
</div>

<a href = "<?php echo base_url('user') ?>" >Home</a>

</fieldset>
</form>


<?php include('footer.php'); ?>