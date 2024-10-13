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
			    	<label for="example-search-input" class="col-3 col-form-label">Tutor Name</label>
			    	<div class="col-9">
			    		<input class="form-control" disabled name="name" type="text" value="<?= strtoupper($tutor_data['name']) ?>" />
			    	</div>
			   </div>
			   <div class="form-group row">
			    	<label for="example-search-input" class="col-3 col-form-label">Tutor's Subject</label>
			    	<div class="col-9">
			    		<input class="form-control" disabled name="name" type="text" value="<?= get_ref_subject($tutor_data['subject']) ?>" />
			    	</div>
			   </div>
			   <div class="form-group row">
			    	<label for="example-search-input" class="col-3 col-form-label">* Assign To Class </label>
			    	<div class="col-9">
			    		<select name="assign_class" class="form-control">
			    			<option value="">[Please Select Class]</option>
			    			<? foreach ($class as $key) { ?>
			    					<option value="<?= $key['id']?>" <? if($tutor_data['assign_class'] == $key['id']){echo "selected";} ?>><?= $key['name']?></option>
			    			<? } ?>
			    		</select>
			    	</div>
			   </div>
			   <input type="hidden" name="tutor_id" value="<?= $tutor_data['tutor_id']?>">
			   <input type="hidden" name="subject_id" value="<?= $tutor_data['subject']?>">
			</div>
		</form>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="button" class="btn btn-primary mr-2 do-assign-class">Assign</button>
		</div>
	</div>
</div>