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
						<th>Status</th>
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
							<td>
								<? $action = '1'; ?>
								<? if($key['status'] == '2'){ ?>
										<b><font color="red">Class Has Finished</font></b>
								<? } else {

										if (strtotime($now) < strtotime($key['class_dt'])) { 
										$action = '2';
										?>
										<a href="#" class="btn btn-icon btn-light-success pulse pulse-success mr-5">
										    <i class="flaticon2-protected"></i>
										    <span class="pulse-ring"></span>
										</a>

										<? }

								} ?>
							</td>
							<?/* <td><span class="label label-inline font-weight-bold label-info"><?= get_class_ref($key['class_id'])?></span></td> */?>
							<td align="right">
								<a href="#" class="btn btn-sm btn-info font-weight-bolder btn-make-attendence" data-init="<?= $key['id']?>" data-action="<?= $action?>">
								Attendence</a>
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