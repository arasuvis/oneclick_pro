<?php include('header.php'); ?>

<form class="form-horizontal" method="post" action="reset_new_pass">
<fieldset>

<!-- Form Name -->
<legend>Reset Password</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email">Email</label>  
  <div class="col-md-4">
  <input id="email" name="email" type="text" placeholder="" class="form-control input-md" value="<?php echo $em; ?>" readonly>
    
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="passwordinput">New Password</label>
  <div class="col-md-4">
    <input id="passwordinput" name="password" type="password" placeholder="Enter New Password" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="passwordinput">Confirm Password </label>
  <div class="col-md-4">
    <input id="passwordinput" name="confirm_password" type="password" placeholder="Confirm Password " class="form-control input-md" required="">
     <?php echo form_error('confirm_password'); ?> 
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button id="singlebutton" name="singlebutton" class="btn btn-success">Submit</button>
  </div>
</div>

</fieldset>
</form>

<?php include('footer.php'); ?>