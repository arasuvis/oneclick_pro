 <style>
 .error {
color:red;
font-size:13px;
margin-bottom:-15px
}
 </style>
 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- general form elements -->


              <div class="box box-primary col-lg-1 col-md-1">
                <div class="box-header with-border">
                  <h3 class="box-title">Add Advocate</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
               <form method="POST" action="<?php echo base_url('admin/create/input'); ?>">
                  <div class="box-body">
                  <div class="form-group">
                      <label for="exampleInputPassword1">Name *</label>
                      <input type="text" class="form-control" name="name" id="name" placeholder="Name" >
                       <?php echo form_error('name'); ?>
                    </div>
                    

                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address *</label>
                      <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Enter email">
                     <?php echo form_error('email'); ?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password *</label>
                      <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
                       <?php echo form_error('password'); ?>
                    </div>
					<div class="form-group">
                      <label for="exampleInputPassword1">Mobile Number *</label>
                      <input type="number" class="form-control" id="phone_number" name="phone_number" placeholder="Mobile Number">
                      <?php echo form_error('phone_number'); ?>
                    </div>
					<div class="form-group">
                      <label for="exampleInputPassword1">Address</label>
                        <div><textarea id='address' name="address" rows="4" cols="130%"></textarea></div>
                    </div>					
                 
                 
                  </div><!-- /.box-body -->
                  <div class="form-group col-lg-offset-1" >
                 
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div><!-- /.box -->
<script src = "<?php echo base_url('plugins/jQuery/jQuery-2.1.4.min.js'); ?>"></script>
<script>      
$("input").attr("maxlength", 30);
</script>
	