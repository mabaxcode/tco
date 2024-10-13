<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title">Class Details</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<i aria-hidden="true" class="ki ki-close"></i>
			</button>
		</div>
		<form class="form" id="update-class-form-data">
			<div class="modal-body">
				<div class="form-group row">
			    	<label for="example-search-input" class="col-2 col-form-label">* Class Name</label>
			    	<div class="col-10">
			    		<input class="form-control" name="name" type="text" value="<?= $class['name']?>" />
			    	</div>
			   </div>
			</div>
			<input type="hidden" name="id" value="<?= $id?>">
		</form>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="button" class="btn btn-primary mr-2 do-update-class">Update</button>
		</div>
	</div>
</div>