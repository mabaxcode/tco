<div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Student List</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<i aria-hidden="true" class="ki ki-close"></i>
			</button>
		</div>
		<div class="modal-body" style="height: 500px;">
			<table class="table table-separate table-head-custom table-checkable" id="mystudent-attend">
				<thead>
					<tr>
						<th>No</th>
						<th>Fullname</th>
						<th>Phone No.</th>
						<th>Email</th>
						<th>Attendence</th>
					</tr>
				</thead>
				<tbody>
					<? $no =1; ?>
					<? if($student){ ?>
						<? foreach ($student as $key) { ?>
						<?
						$student_detail = get_any_table_row(array('student_id' => $key['student_id']), 'student_information'); 

						//$student_img = get_any_table_row(array('user_id' => $key['student_id']), 'profile_picture'); 
						?>
						<tr>
							<td><?= $no++;?></td>
							<td class="pl-0 py-4">
								<?= ucfirst($student_detail['name'])?>
							</td>
							<td>
								<?= $student_detail['phone_no']?>
							</td>
							<td>
								<?= $student_detail['email']?>
							</td>
							<td>
								<?/*
								<a href="#" class="btn btn-sm btn-info font-weight-bolder btn-make-attendence" data-init="<?= $key['id']?>" data-action="<?= $action?>">
								Attendence</a> */?>
								<div class="col-8">
							   		<span class="switch switch-outline switch-icon switch-danger">
							    	<label>
							    	<?
							    		if ($key['class_attend'] == '1') {
							    			$check = "checked";
							    		} else {
							    			$check = '';
							    		}
							    	?>
							     	<input type="checkbox" id="attend-check-<?= $key['id']?>" <?= $check?> value="1" onchange="act_attend_class('<?= $key['id']?>');" />
							     	<span></span>
							    	</label>
							   		</span>
							  	</div>
							</td>
						</tr>
						<? } ?>
					<? } ?>
				</tbody>
			</table>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
		</div>
	</div>
</div>

<script type="text/javascript">
	var table = $('#mystudent-attend');

	table.DataTable({
		responsive: true,
		pagingType: 'full_numbers',
	});
</script>