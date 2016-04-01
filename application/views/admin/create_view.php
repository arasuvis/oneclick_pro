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
               <form method="POST" action="input/">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address *</label>
                      <input type="email" class="form-control" name="exampleInputEmail1" id="exampleInputEmail1" placeholder="Enter email">
                     <?php echo form_error('exampleInputEmail1'); ?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password *</label>
                      <input type="password" class="form-control" name="exampleInputPassword1" id="exampleInputPassword1" placeholder="Password">
                    </div>
					<div class="form-group">
                      <label for="exampleInputPassword1">Name *</label>
                      <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                    </div>
					<div class="form-group">
                      <label for="exampleInputPassword1">Phone Number *</label>
                      <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Password">
                    </div>
					<div class="form-group">
                      <label for="exampleInputPassword1">Address</label>
                      <textarea id='address' name="address"></textarea>
                    </div>					
                   
                 
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div><!-- /.box -->
			

	