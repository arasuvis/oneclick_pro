 <!-- Add Property Modal -->
<div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Property Details</h4>
                </div>
                <div class="modal-body">
				<?php print_r($form_data);?>
					<link href="<?php echo base_url(); ?>res/css/style.css" rel="stylesheet" type="text/css" />
<div class="content">
 <form role="form"  id="property" class="property" method="POST" action="<?php echo base_url(); ?>add_immov">
  <div class="form-group">
    <label for="name">Name&nbsp;<span style="color:red;">*</span></label>
    <input class="form-control" type="text" name="name" id="name">
  </div>
   <div class="form-group">
    <label>Address</label>&nbsp;<span style="color:red;">*</span>
    <textarea type="text" class="form-control" name="address" id="address"></textarea>
  </div>
   <div class="form-group">
    <label>Municipal Number</label>&nbsp;<span style="color:red;">*</span>
    <input type="text" class="form-control"  name="municipal_number" id="municipal_number">
  </div>
   <div class="form-group">
    <label>Year Of Purchase</label>&nbsp;<span style="color:red;">*</span>
    <input type="text" class="form-control" name="year_of_purchase" id="year_of_purchase">
  </div>
   <div class="form-group">
   <label>Area</label>&nbsp;&nbsp;<span style="color:red;">*</span>
    <select id="area" class="form-control" name="area">
		<option value="-1">Choose area</option>
		<option value="Bangalore">Bangalore</option>
	</select>
  </div>
   <div class="form-group">
    <label>Nature Of Ownership</label>&nbsp;<span style="color:red;">*</span>
    <input type="text" class="form-control" name="nature_of_ownership" id="nature_of_ownership">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

		</div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>