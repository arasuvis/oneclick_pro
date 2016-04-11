 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- general form elements -->
              <div class="box box-primary col-lg-1 col-md-1">
                <div class="box-header with-border">
                  <h3 class="box-title">Update Advocate</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
               <form method="POST" action="<?php echo base_url('admin/edit/input');?>">
			   <input type="hidden" name="id" value="<?php if(isset($entry->id)) echo $entry->id;  else echo $_POST['id']; ?>"/>
                  <div class="box-body">
                   <label for="exampleInputPassword1">Name *</label>
                      <input type="text" class="form-control" value="<?php if(isset($entry->name)) echo $entry->name; else echo $_POST['name']; ?>" name="name" id="name" placeholder="Name">
                       <?php echo form_error('name'); ?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address *</label>
                      <input type="email" class="form-control" value="<?php if(isset($entry->email)) echo $entry->email; else echo $_POST['email']; ?>" name="email" id="exampleInputEmail1" placeholder="Enter email">
                      <?php echo form_error('email'); ?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password *</label>
                      <input type="password" class="form-control" value="<?php if(isset($entry->password)) echo $entry->password; else echo $_POST['password']; ?>" name="password" id="exampleInputPassword1" placeholder="Password">
                      <?php echo form_error('password'); ?>
                    </div>
					<div class="form-group">
                     
					<div class="form-group">
                      <label for="exampleInputPassword1">Phone Number *</label>
                      <input type="phone_number" class="form-control" value="<?php if(isset($entry->phone_number)) echo $entry->phone_number; else echo $_POST['phone_number']; ?>" id="phone_number" name="phone_number" placeholder="Phone Number">
                      <?php echo form_error('phone_number'); ?>
                    </div>
					<div class="form-group">
                      <label for="exampleInputPassword1">Address</label>
                      <textarea id='address' name="address"><?php if(isset($entry->address)) echo $entry->address; else echo $_POST['address']; ?></textarea>
                    </div>					
                   
                 
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div><!-- /.box -->
			

	
	