 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- general form elements -->
              <div class="box box-primary col-lg-1 col-md-1">
                <div class="box-header with-border">
                  <h3 class="box-title">Update Advocate</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
               <form method="POST" action="<?php echo base_url('admin/edit/input');?>">
			   <input type="hidden" name="id" value="<?php echo $entry->id; ?>"/>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address *</label>
                      <input type="email" class="form-control" value="<?php echo $entry->email; ?>" name="exampleInputEmail1" id="exampleInputEmail1" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password *</label>
                      <input type="password" class="form-control" value="<?php echo $entry->password; ?>" name="exampleInputPassword1" id="exampleInputPassword1" placeholder="Password">
                    </div>
					<div class="form-group">
                      <label for="exampleInputPassword1">Name *</label>
                      <input type="text" class="form-control" value="<?php echo $entry->name; ?>" name="name" id="name" placeholder="Name">
                    </div>
					<div class="form-group">
                      <label for="exampleInputPassword1">Phone Number *</label>
                      <input type="phone_number" class="form-control" value="<?php echo $entry->phone_number; ?>" id="phone_number" name="phone_number" placeholder="Phone Number">
                    </div>
					<div class="form-group">
                      <label for="exampleInputPassword1">Address</label>
                      <textarea id='address' name="address"><?php echo $entry->address; ?></textarea>
                    </div>					
                   
                 
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div><!-- /.box -->
			

	
	