<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Details of Registration</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i aria-hidden="true" class="ki ki-close"></i>
            </button>
        </div>
        <div class="modal-body">
        	<? //print_r($student_data); ?>
        	<div class="card-body">
			   <div class="form-group row">
			    	<label for="example-search-input" class="col-2 col-form-label">Name</label>
			    	<div class="col-10">
			    		<input class="form-control" disabled type="text" value="<?= $student_data['name']?>"/>
			    	</div>
			   </div>
			   <div class="form-group row">
			    	<label for="example-email-input" class="col-2 col-form-label">Phone No.</label>
			    	<div class="col-10">
			    		<input class="form-control" disabled type="text" value="<?= $student_data['phone_no']?>"/>
			    	</div>
			   </div>
			   <div class="form-group row">
			    	<label for="example-url-input" class="col-2 col-form-label">Email</label>
			    	<div class="col-10">
			    		<input class="form-control" disabled type="text" value="<?= $student_data['email']?>"/>
			    	</div>
			   </div>
			   <div class="form-group row">
			    	<label for="example-tel-input" class="col-2 col-form-label">Address</label>
			    	<div class="col-10">
			     		<textarea class="form-control" rows="3" disabled><?= $student_data['address']?></textarea>
			    	</div>
			   </div>
			   <div class="form-group row">
			    	<label for="example-password-input" class="col-12 col-form-label">Copy of Indentity Card (Optional)</label>
			    	<? if($student_doc): ?>
			    	<label for="example-password-input" class="col-12 col-form-label">
			    		<? $path = $student_doc['path'] . "/" . $student_doc['filename']; ?>
			    		<a href="../<?= $path; ?>" target="_BLANK"><?= $student_doc['original_filename'] ?></a>
			    	</label>
			    	<? endif; ?>
			   </div>
			   <div class="form-group row">
			    	<label for="example-tel-input" class="col-2 col-form-label">Approval</label>
			    	<div class="col-10">
			    		<select class="custom-select form-control" id="decision-reg-student" required="">
							<option value="">Please select</option>
							<option value="1">Approved</option>
							<option value="2">Reject</option>
						</select>
						<p id="required-approval"></p>
			    	</div>
			   </div>
			</div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary font-weight-bold proceed-student-register" data-init="<?= $student_data['student_id']?>">Proceed</button>
        </div>
    </div>
</div>