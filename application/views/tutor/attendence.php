<div class="container">
	<div class="card card-custom">
		<div class="card-body">
			<!--begin: Datatable-->
			<table class="table table-separate table-head-custom table-checkable" id="mystudent-list-datatable">
				<thead>
					<tr>
						<th>No</th>
						<th>Class Date</th>
						<th>Class Time</th>
						<th>Class Type</th>
						<th style="text-align: right;">Action</th>
					</tr>
				</thead>
				<tbody>
					<? $no =1; ?>
					<? if($timetables){ ?>
						<? foreach ($timetables as $key) { ?>
						<?
						//$student_detail = get_any_table_row(array('student_id' => $key['student_id']), 'student_information'); 

						//$student_img = get_any_table_row(array('user_id' => $key['student_id']), 'profile_picture'); 
						?>
						<tr>
							<td><?= $no++;?></td>
							<td class="pl-0 py-4">
								<?= dmy($key['class_dt'])?>
							</td>
							<td>
								<?= $key['class_time']?>
							</td>
							<td>
								<? if($key['class_type'] == '1'){ ?>
								<span class="label label-inline font-weight-bold label-warning">Online Class</span>
								<? } else { ?>
								<span class="label label-inline font-weight-bold label-danger">Physical Class</span>
								<? } ?>
							</td>
							<?/* <td><span class="label label-inline font-weight-bold label-info"><?= get_class_ref($key['class_id'])?></span></td> */?>
							<td align="right">
								<a href="#" class="btn btn-sm btn-info font-weight-bolder text-uppercase view-student-details" data-init="<?= $key['id']?>">
								Make Attendence</a>
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