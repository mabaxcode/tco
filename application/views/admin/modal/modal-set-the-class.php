<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title">New Class</h5>
			<button type="button" class="close close-modal-class-slot">
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
						<div class="d-flex align-items-center mb-2">
							<span class="font-weight-bold mr-2">Tutor :</span>
							<span class=""><?= ucfirst(get_ref_tutor($student_class['tutor_id'])); ?></span>
						</div>
						
					</div>
				<input type="hidden" name="tutor_id" value="<?= $student_class['id']?>">
		
			<?/*
			<table>
				<tr>
					<td>Date</td>
					<td>Available Slot</td>
				</tr>
				<? foreach($timetable as $date): ?>

					<?  
						#get the day
						$day = getDay($date['class_dt']);
					?>
					<tr>
						<td>
							<?= $date['class_dt']; ?> (<?= $day?>)
						</td>
						<td>
							<select onchange="set_the_class_slot(this.value, '<?= $date['id']?>');">
								<option value=''>Please Select</option>
								<? if( $day == 'Friday' || $day == 'Saturday' ){ ?>
								<option value='9:30 AM'>9:30 AM</option>
								<option value='10:30 AM'>10:30 AM</option>
								<option value='11:30 AM'>11:30 AM</option>
								<? } else { ?>
								<option value='8:30 PM'>8:30 PM</option>
								<option value='9:30 PM'>9:30 PM</option>
								<option value='10:30 PM'>10:30 PM</option>
								<? } ?>
							</select>
						</td>
					</tr>
				<? endforeach; ?>
				
			</table>
			*/?>

			<div class="table-responsive">
				<table class="table table-row-dashed table-row-gray-300 gy-7">
					<thead>
						<tr class="fw-semibold fs-6 text-gray-800 border-bottom border-gray-200">
							<th>Name</th>
							<th>Available Slot</th>
						</tr>
					</thead>
					<tbody>
					<? foreach($timetable as $date): ?>

						<?  
							#get the day
							$day = getDay($date['class_dt']);
						?>
						<tr>
							<td>
								<?= $date['class_dt']; ?> (<?= $day?>)
							</td>
							<td>
								<select onchange="set_the_class_slot(this.value, '<?= $date['id']?>');" class="form-control">
									<option value=''>Please Select</option>
									<? if( $day == 'Friday' || $day == 'Saturday' ){ ?>
									<option value='9:30 AM' <? if($date['class_time'] == '9:30 AM'){echo "selected";} ?> <?= checking_slot($date['class_dt'],'9:30 AM', $date['student_id'], $date['tuition_id']); ?> >9:30 AM</option>
									<option value='10:30 AM' <? if($date['class_time'] == '10:30 AM'){echo "selected";} ?> <?= checking_slot($date['class_dt'],'10:30 AM', $date['student_id'], $date['tuition_id']); ?> >10:30 AM</option>
									<option value='11:30 AM' <? if($date['class_time'] == '11:30 AM'){echo "selected";} ?> <?= checking_slot($date['class_dt'],'11:30 AM', $date['student_id'], $date['tuition_id']); ?> >11:30 AM</option>
									<? } else { ?>
									<option value='8:30 PM' <? if($date['class_time'] == '8:30 PM'){echo "selected";} ?> <?= checking_slot($date['class_dt'],'8:30 PM', $date['student_id'], $date['tuition_id']); ?> >8:30 PM</option>
									<option value='9:30 PM' <? if($date['class_time'] == '9:30 PM'){echo "selected";} ?> <?= checking_slot($date['class_dt'],'9:30 PM', $date['student_id'], $date['tuition_id']); ?> >9:30 PM</option>
									<option value='10:30 PM' <? if($date['class_time'] == '10:30 PM'){echo "selected";} ?> <?= checking_slot($date['class_dt'],'10:30 PM', $date['student_id'], $date['tuition_id']); ?> >10:30 PM</option>
									<? } ?>
								</select>
							</td>
						</tr>
						<? endforeach; ?>
					</tbody>
				</table>
			</div>
				</div>
		</form>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary close-modal-class-slot">Close</button>
		</div>
	</div>
</div>