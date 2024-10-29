<div class="container">
	<div class="card card-custom">
		<div class="card-header flex-wrap py-5">
			<div class="card-title">
				<!-- <h3 class="card-label">List of Approved Tuition Application</h3> -->
			</div>
		</div>
		<div class="card-body">
			<!--begin: Datatable-->
			<table class="table table-separate table-head-custom table-checkable" id="student-register-datatable">
				<thead>
					<tr>
						<th>No</th>
						<th>Student Name</th>
						<th>Phone No.</th>
						<!-- <th>Student's Subject</th> -->
						<th style='text-align:right;'>Action</th>
					</tr>
				</thead>
				<tbody>
					<? $no =1; ?>
					<? if($tuition_apps){ ?>
						<? foreach ($tuition_apps as $key) { ?>
						<tr>
							<td><?= $no++;?></td>
							<td>
								<?= strtoupper(get_value_from_any_table('student_information', 'name', array('student_id' => $key['student_id'])));?>
							</td>
							<td><?= strtoupper(get_value_from_any_table('student_information', 'phone_no', array('student_id' => $key['student_id'])));?></td>
							<td align='right'>
								<a href="#" class="btn btn-sm btn-info font-weight-bolder text-uppercase view-attendance-record" data-init="<?= $key['student_id']?>">View Record</a>
							</td>
						</tr>
						<? } ?>
					<? } ?>
				</tbody>
			</table>
			<!--end: Datatable-->
		</div>
	</div>
</div>