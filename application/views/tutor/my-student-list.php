<div class="container">
	<div class="card card-custom">
		<div class="card-body">
			<!--begin: Datatable-->
			<table class="table table-separate table-head-custom table-checkable" id="mystudent-list-datatable">
				<thead>
					<tr>
						<th>No</th>
						<th>Photo</th>
						<th>Name</th>
						<th>Form</th>
						<th>Phone No.</th>
						<th style="text-align: right;">Action</th>
					</tr>
				</thead>
				<tbody>
					<? $no =1; ?>
					<? if($students){ ?>
						<? foreach ($students as $key) { ?>
						<?
						$student_detail = get_any_table_row(array('student_id' => $key['student_id']), 'student_information'); 

						$student_img = get_any_table_row(array('user_id' => $key['student_id']), 'profile_picture'); 
						?>
						<tr>
							<td><?= $no++;?></td>
							<td class="pl-0 py-4">
								<div class="symbol symbol-50 symbol-light">
									<span class="symbol-label">
										<img src="<?= view_profile_picture($student_img); ?>" class="h-50 align-self-center" alt="" />
									</span>
								</div>
							</td>
							<td>
								<?= ucfirst($student_detail['name']) ?><br><small><?= $student_detail['email']?></small>
							</td>
							<td>
								<?=
								$retVal = ($student_detail['form'] == '7') ? '<span class="label label-inline font-weight-bold label-info">SK RENDAH</span>' : '<span class="label label-inline font-weight-bold label-info">FORM ' . $student_detail['form'] . '</span>';
								?>
							</td>
							<td><?= $student_detail['phone_no']?></td>
							<?/* <td><span class="label label-inline font-weight-bold label-info"><?= get_class_ref($key['class_id'])?></span></td> */?>
							<td align="right">
								<a href="#" class="btn btn-sm btn-info font-weight-bolder text-uppercase view-student-details" data-init="<?= $key['student_id']?>">View Details</a>
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