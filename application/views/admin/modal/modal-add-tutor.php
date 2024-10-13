<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add New Tutor</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i aria-hidden="true" class="ki ki-close"></i>
            </button>
        </div>
        <div class="modal-body">
        	<? //print_r($tutor_data); ?>
        	<div class="card-body">
			   <div class="form-group row">
			    	<label for="example-search-input" class="col-2 col-form-label">* Name</label>
			    	<div class="col-10">
			    		<input class="form-control" name="name" type="text"/>
			    	</div>
			   </div>
			   <div class="form-group row">
			    	<label for="example-search-input" class="col-2 col-form-label">* Age</label>
			    	<div class="col-10">
			    		<input class="form-control" name="age" type="text"/>
			    	</div>
			   </div>
			   <div class="form-group row">
			    	<label for="example-email-input" class="col-2 col-form-label">* Phone No.</label>
			    	<div class="col-10">
			    		<input class="form-control" name="phone_no" type="text" />
			    	</div>
			   </div>
			   <div class="form-group row">
			    	<label for="example-url-input" class="col-2 col-form-label">* Email</label>
			    	<div class="col-10">
			    		<input class="form-control" name="email" type="text" />
			    	</div>
			   </div>
			   <div class="form-group row">
			    	<label for="example-tel-input" class="col-2 col-form-label">* Address</label>
			    	<div class="col-10">
			     		<textarea class="form-control" name="address" rows="3"></textarea>
			    	</div>
			   </div>
			</div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary font-weight-bold proceed-add-tutor">Save</button>
        </div>
    </div>
</div>