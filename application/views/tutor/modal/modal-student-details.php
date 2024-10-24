<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Student Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i aria-hidden="true" class="ki ki-close"></i>
            </button>
        </div>
        <div class="modal-body">
        	<? //print_r($student_data); ?>
        	
        	<div class="card-body">
        	   <div class="row">
					<label class="col-xl-2"></label>
					<div class="col-lg-10">
						<h5 class="font-weight-bold mb-6">Student Info</h5>
					</div>
				</div>
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
			    	<label for="example-url-input" class="col-2 col-form-label">Form</label>
			    	<div class="col-10">
			    		<input class="form-control" disabled type="text" value="<?= $retVal = ($student_data['form'] == '7') ? "SK RENDAH" : "FORM " . $student_data['form'] ; ?>"/>
			    	</div>
			   </div>
			   <div class="row">
					<label class="col-xl-2"></label>
					<div class="col-lg-10">
						<h5 class="font-weight-bold mb-6">Guardian Info</h5>
					</div>
				</div>
				<div class="form-group row">
			    	<label for="example-search-input" class="col-2 col-form-label">Guardian Name</label>
			    	<div class="col-10">
			    		<?
			    			//print_r($student_data);
			    		?>
			    		<input class="form-control" disabled type="text" value="<?= $student_data['guardian_name⁠']?>"/>
			    	</div>
			   </div>
			   <div class="form-group row">
			    	<label for="example-email-input" class="col-2 col-form-label">Guardian Phone No.</label>
			    	<div class="col-10">
			    		<input class="form-control" disabled type="text" value="<?= $student_data['guardian_phone']?>"/>
			    	</div>
			   </div>
			   <div class="row">
					<label class="col-xl-2"></label>
					<div class="col-lg-10">
						<h5 class="font-weight-bold mb-6">School Info</h5>
					</div>
				</div>
				<div class="form-group row">
			    	<label for="example-search-input" class="col-2 col-form-label">School Name</label>
			    	<div class="col-10">
			    		<?
			    			//print_r($student_data);
			    		?>
			    		<input class="form-control" disabled type="text" value="<?= $student_data['school_name']?>"/>
			    	</div>
			   </div>
			   <div class="form-group row">
			    	<label for="example-tel-input" class="col-2 col-form-label">School Address</label>
			    	<div class="col-10">
			     		<textarea class="form-control" rows="3" disabled><?= $student_data['school_address']?></textarea>
			    	</div>
			   </div>
			   <div class="form-group row">
			    	<label for="example-password-input" class="col-12 col-form-label">Copy of Indentity Card (Optional)</label>
			    	<? if($student_doc): ?>
			    	<label for="example-password-input" class="col-12 col-form-label">
			    		<? $path = base_url ($student_doc['path'] . "/" . $student_doc['filename']); ?>
			    		<a href="<?= $path; ?>" target="_BLANK"><?= $student_doc['original_filename'] ?></a>
			    	</label>
			    	<? endif; ?>
			   </div>
			</div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>