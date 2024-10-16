<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title">New Class</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<i aria-hidden="true" class="ki ki-close"></i>
			</button>
		</div>
		<form class="form" id="assign-class-form-data">
			<div class="modal-body">
			<div class="py-1">
					<?/*
					<div class="d-flex align-items-center mb-2">
						<span class="font-weight-bold mr-2">Email:</span>
						<a href="#" class=" text-hover-primary"><?= $student_data['email']?></a>
					</div>
					<div class="d-flex align-items-center mb-2">
						<span class="font-weight-bold mr-2">Prefered Tutor :</span>
						<span class=""><?= strtoupper($student_class['tutor_id']) ?></span>
					</div>
					<div class="d-flex align-items-center mb-2">
						<span class="font-weight-bold mr-2">Student Class :</span>
						<span class=""><?= get_class_ref($class['id']) ?></span>
					</div>	
					*/?>
					
					<div class="d-flex align-items-center mb-2">
						<span class="font-weight-bold mr-2">Subject :</span>
						<span class="font-weight-bold"><?= get_ref_subject($student_class['subject_id']) ?></span>
					</div>
					
				</div>
			   <input type="hidden" name="tutor_id" value="<?= $student_class['id']?>">
			</div>
			<?
				$weekdays = getWeekendDates($tuition_application['approved_dt']);

				echo "<pre>"; print_r($weekdays); echo "</pre>";
			?>
		</form>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="button" class="btn btn-primary mr-2 do-assign-class">Assign</button>
		</div>
	</div>
</div>