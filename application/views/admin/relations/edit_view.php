 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- general form elements -->
              <div class="box box-primary col-lg-1 col-md-1">
                <div class="box-header with-border">
                  <h3 class="box-title">Update Relation</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
               <form method="POST" action="<?php echo base_url('admin/edit/edit_relation');?>">
			   <input type="hidden" name="id" value="<?php if(isset($entry->rel_id)) echo $entry->rel_id;  else echo $_POST['id']; ?>"/>
                  <div class="box-body">
					<div class="form-group">
                      <label for="exampleInputPassword1">Name *</label>
                      <input type="text" required class="form-control" value="<?php echo $entry->name; ?>" name="name" id="name" placeholder="Name">
                     

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                  </div>
                </form>
              </div><!-- /.box -->
			

	
	