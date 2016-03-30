<link rel = "Stylesheet" type="text/css" href="<?php  echo base_url('css/bootstrap.min.css'); ?>" > 

<form class="form-horizontal" method="post" action="reset_pass_email">
<fieldset>

<!-- Form Name -->
<legend>Forget Password</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email">Email</label>  
  <div class="col-md-4">
  <input id="email" name="email" type="email" placeholder="Enter Email" class="form-control input-md" required="">
    
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