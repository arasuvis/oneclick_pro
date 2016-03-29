<link rel = "Stylesheet" type="text/css" href="<?php  echo base_url('css/bootstrap.min.css'); ?>" > 

<div >
<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>reg">
<fieldset>

<!-- Form Name -->
<legend>REGISTER PAGE</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-3 control-label" for="text">First Name</label>  
  <div class="col-md-3">
  <input id="text" name="fname" type="text" placeholder="First Name" class="form-control input-md" required="" value="<?php echo set_value('fname') ?>">
   <?php echo form_error('fname'); ?>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-3 control-label" for="text">Middle Name</label>  
  <div class="col-md-3">
  <input id="text" name="mname" type="text" placeholder="Middle Name" class="form-control input-md" required="" value="<?php echo set_value('mname') ?>">
  <?php echo form_error('mname'); ?> 
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-3 control-label" for="text">Surname</label>  
  <div class="col-md-3">
  <input id="text" name="surname" type="text" placeholder="Surname" class="form-control input-md" required="" value="<?php echo set_value('surname') ?>">
  <?php echo form_error('surname'); ?>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-3 control-label" for="email">Email Id</label>  
  <div class="col-md-3">
  <input id="email" name="email" type="email" placeholder="Email Id" class="form-control input-md" required="" value="<?php echo set_value('email') ?>">
<?php echo form_error('email'); ?> 
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-3 control-label" for="password">Password </label>
  <div class="col-md-3">
    <input id="password" name="password" type="password" placeholder="Password " class="form-control input-md" required="" value="<?php echo set_value('password') ?>">
  <?php echo form_error('password'); ?> 
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-3 control-label" for="password">Confirm Password </label>
  <div class="col-md-3">
    <input id="password" name="confirm_password" type="password" placeholder="Confirm Password " class="form-control input-md" required="" value="<?php echo set_value('confirm_password') ?>">
   <?php echo form_error('confirm_password'); ?> 
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-3 control-label" for="number">Age</label>  
  <div class="col-md-3">
  <input id="number" name="age" type="text" placeholder="Age" class="form-control input-md" required="" value="<?php echo set_value('age') ?>">
    <?php echo form_error('age'); ?>  
  </div>
</div>

<!-- Multiple Radios (inline) -->
<div class="form-group">
  <label class="col-md-3 control-label" for="radios">Gender</label>
  <div class="col-md-3"> 
    <label class="radio-inline" for="radios-0">
      <input type="radio" name="gender" id="radios-0" value="M" checked="checked">
      Male
    </label> 
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="gender" id="radios-1" value="F">
      Female
    </label> 
    <label class="radio-inline" for="radios-2">
      <input type="radio" name="gender" id="radios-2" value="O">
      Other
    </label>
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-3 control-label" for="textarea">Address</label>
  <div class="col-md-3">                     
    <textarea class="form-control" id="textarea" name="address" placeholder="Enter Address" value="<?php echo set_value('address') ?>"> </textarea>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-3 control-label" for="number">Mobile Number</label>  
  <div class="col-md-3">
  <input id="number" name="mobile" type="text" placeholder="Mobile Number" class="form-control input-md" required="" value="<?php echo set_value('mobile') ?>">
   <?php echo form_error('mobile'); ?> 
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-3 control-label" for="singlebutton"></label>
  <div class="col-md-3">
    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Submit</button>
  </div>
</div>

</fieldset>
</form>
</div>

<a href = "<?php echo base_url() ?>" >Home</a>

<?php include('footer.php'); ?>







