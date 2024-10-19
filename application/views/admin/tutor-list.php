<div class="container">
	<div class="card card-custom">
		<div class="card-header flex-wrap py-5">
			<div class="card-title">
				<h3 class="card-label">List Of Tutor Application</h3>
			</div>
		</div>
		<div class="card-body">
			<!--begin: Datatable-->
			<table class="table table-separate table-head-custom table-checkable" id="student-register-datatable">
				<thead>
					<tr>
						<th>No</th>
						<th>Name</th>
						<th>Age</th>
						<th>Phone No.</th>
						<th>Subject</th>
						<th style="text-align: right;">Action</th>
					</tr>
				</thead>
				<tbody>
					<? $no =1; ?>
					<? if($tutors){ ?>
						<? foreach ($tutors as $key) { ?>
						<tr>
							<td><?= $no++;?></td>
							<td><?= $key['name']?></td>
							<td><?= $key['age']?></td>
							<td><?= $key['phone_no']?></td>
							<td><span class="label label-inline font-weight-bold label-info"><?= get_ref_subject($key['subject'])?></span></td>
							<td align="right">
								<a href="#" class="btn btn-sm btn-primary font-weight-bolder text-uppercase process-tutor-app" data-init="<?= $key['tutor_id']?>">Process</a>
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