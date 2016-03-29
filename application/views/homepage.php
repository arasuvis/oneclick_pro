<?php //include('header.php'); ?>

<?php
if (isset($this->session->userdata['logged_in'])) {

header("location: http://localhost/oneclick/trunk/credentials");
}
?>
<link rel="Stylesheet" type="text/css" href="<?php echo base_url('css/bootstrap.min.css');?>">  

<style>
  .login-text{
    
    color: #286090;
  }

</style>

<div class="container">
<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>credentials">
  <fieldset>
  <!-- Form Name -->
  <legend class="login-text">Login Form</legend>

  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-1 control-label" for="text">Email Id</label>  
      <div class="col-md-4">
        <input id="text" name="email" type="text" placeholder="Enter Email Id" class="form-control input-md" value="<?php echo set_value('email') ?>">
        <?php echo form_error('email'); ?>
      </div>
  </div>

  <!-- Password input-->
  <div class="form-group">
    <label class="col-md-1 control-label" for="password">Password </label>
    <div class="col-md-4">
      <input id="password" name="password" type="password" placeholder="Enter Password " class="form-control input-md" >
      <?php echo form_error('password'); ?>
    </div>
  </div>

  <!-- Button (Double) -->
  <div class="form-group">
    <label class="col-md-6 control-label" for="button1id"></label>
    <div class="col-md-12">
      <button class="btn btn-primary">Submit</button>
      <button class="btn btn-primary">Cancel</button>
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-6 control-label" for="button1id"></label>
    <div class="col-md-12">
      <a href="<?php echo base_url('user/forgot') ?>">Forgot Password</a>
    </div>
    <div class="col-md-12">
      <a href="<?php echo base_url('registration') ?>">Not yet registerd? &nbsp;Signup</a>
    </div>
  </div>
  </fieldset>
</form>
</div>
<?php include('footer.php'); ?>