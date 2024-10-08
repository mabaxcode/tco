<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title">New Tuition</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<i aria-hidden="true" class="ki ki-close"></i>
			</button>
		</div>
		<form class="form" id="edit-subject-form-data">
			<div class="modal-body">
				<div class="form-group row">
					<label class="col-form-label col-lg-2 col-sm-12">Subject</label>
					<div class="col-lg-10 col-md-10 col-sm-12">
						<select class="form-control select2" id="kt_select_subject" name="subjects[]" multiple="multiple" required="">
							<? foreach ($subjects as $subject) { ?>
									<option value="<?= $subject['code']?>" <? foreach($arr_subjects as $key => $value) { if($value == $subject['code']){echo "selected";} else {echo "";} } ?>><?= $subject['descs']?></option>
							<? } ?>
						</select>
					</div>
				</div>
			</div>
			<input type="hidden" name="tuition_id" value="<?= $tuition_id?>">
		</form>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="button" class="btn btn-primary mr-2 update-payment-tuition">Save</button>
		</div>
	</div>
</div>

<script type="text/javascript">
$('#kt_select_subject').select2({
	width: '550px',
});
</script>