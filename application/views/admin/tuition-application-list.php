<div class="container">
	<div class="card card-custom">
		<div class="card-header flex-wrap py-5">
			<div class="card-title">
				<h3 class="card-label">List of Tuition Application</h3>
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
						<th>Total Paid Amount</th>
						<th style="text-align: right;">Action</th>
					</tr>
				</thead>
				<tbody>
					<? $no =1; ?>
					<? if($tuition_apps){ ?>
						<? foreach ($tuition_apps as $key) { ?>
						<? $student = get_any_table_row(array('student_id' => $key['student_id']), 'student_information'); ?>
						<tr>
							<td><?= $no++;?></td>
							<td><?= $key['tuition_id']?></td>
							<td><?= $student['name']?></td>
							<td>RM<?= $key['total']?></td>
							<td nowrap="nowrap" align="right">
								<a href="#" class="btn btn-sm btn-primary font-weight-bolder text-uppercase process-tuition-app" data-init="<?= $key['tuition_id']?>">Process</a>
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