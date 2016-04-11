 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- general form elements -->
              <div class="box box-primary col-lg-1 col-md-1">
                <div class="box-header with-border">
                  <h3 class="box-title">Update Property Type</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
               <form method="POST" action="<?php echo base_url('admin/edit/edit_propertye_type');?>">
			   <input type="hidden" name="id" value="<?php echo $entry->prop_id; ?>"/>
                  <div class="box-body">
					<div class="form-group">
                      <label for="exampleInputPassword1">Name *</label>
                      <input type="text" class="form-control" value="<?php echo $entry->name; ?>" name="name" id="name" placeholder="Name">
                   

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                  </div>
                </form>
              </div><!-- /.box -->
			

	
	