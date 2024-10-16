<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title">New Class</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<i aria-hidden="true" class="ki ki-close"></i>
			</button>
		</div>
		<form class="form" id="assign-class-form-data">
			<div class="modal-body">
				<div class="form-group row">
			    	<label for="example-search-input" class="col-3 col-form-label">Prefered Tutor</label>
			    	<div class="col-9">
			    		<input class="form-control" disabled name="name" type="text" value="<?= strtoupper($student_class['tutor_id']) ?>" />
			    	</div>
			   </div>
			   <div class="form-group row">
			    	<label for="example-search-input" class="col-3 col-form-label">Student Subject</label>
			    	<div class="col-9">
			    		<input class="form-control" disabled name="name" type="text" value="<?= get_ref_subject($student_class['subject_id']) ?>" />
			    	</div>
			   </div>
               <div class="form-group row">
			    	<label for="example-search-input" class="col-3 col-form-label">Student Class</label>
			    	<div class="col-9">
			    		<input class="form-control" disabled name="name" type="text" value="<?= get_class_ref($class['id']) ?>" />
			    	</div>
			   </div>
			   <input type="hidden" name="tutor_id" value="<?= $student_class['id']?>">
			</div>
		</form>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="button" class="btn btn-primary mr-2 do-assign-class">Assign</button>
		</div>
	</div>
</div>