<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title">Online Class</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<i aria-hidden="true" class="ki ki-close"></i>
			</button>
		</div>
		<form class="form" id="class-online-form-data">
		<div class="modal-body">
			<div class="form-group">
			    <label><b>Enter Google Meet Link </b><span class="text-danger">*</span></label>
			    <input type="text" name="class_link" class="form-control"  />
			    <span class="form-text text-muted">This link will share to your students.</span>
			   </div>
			</div>

			<input type="hidden" name="class_dt" value="<?= $this_timetable['class_dt'] ?>">
			<input type="hidden" name="class_time" value="<?= $this_timetable['class_time'] ?>">


		</form>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary close-checkbox-online">Close</button>
			<button type="button" class="btn btn-primary mr-2 save-class-link">Save</button>
		</div>
	</div>
</div>