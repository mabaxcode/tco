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
						<th>Tuition ID</th>
						<th>Student Name</th>
						<th>Student's Subject</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<? $no =1; ?>
					<? if($tuition_apps){ ?>
						<? foreach ($tuition_apps as $key) { ?>
						<tr>
							<td><?= $no++;?></td>
							<td><?= $key['tuition_id']?></td>
							<td>
								<?= strtoupper(get_value_from_any_table('student_information', 'name', array('student_id' => $key['student_id'])));?>
							</td>
							<td>
									
								<? 

								$subject_arr = explode("|",$key['subjects']);
								foreach ($subject_arr as $val => $value) {
									$ref_subject = get_any_table_row(array('code' => $value), 'ref_subject');
									?>
										<b><?= $ref_subject['descs']?></b><br>
									<?
								}

								?>
							</td>
							<td>
								<a href="<?= base_url('admin/student_scheduling/'. $key['tuition_id']) ?>" class="btn btn-sm btn-primary font-weight-bolder text-uppercase">Create Scheduling</a>
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