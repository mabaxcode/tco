<div class="container">
	<div class="card card-custom">
		<div class="card-header flex-wrap py-5">
			<div class="card-title">
				<h3 class="card-label">List Of Class</h3>
			</div>
			
			<div class="card-toolbar">
				<a href="<?= base_url('tutor/students_homework'); ?>" class="btn btn-primary font-weight-bolder add-new-class">
				<span class="svg-icon svg-icon-md">
					<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
							<rect x="0" y="0" width="24" height="24" />
							<circle fill="#000000" cx="9" cy="15" r="6" />
							<path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
						</g>
					</svg>
					<!--end::Svg Icon-->
				</span>Back to Listing</a>
			</div>
			
		</div>
		<div class="card-body">

			<?
				//print_r($homeworks);
			?>

			

			<!--begin: Datatable-->
			<table class="table table-separate table-head-custom table-checkable">
				<thead>
					<tr>
						<th>No</th>
						<th>Student Name</th>
						<th>Status</th>
						<th>Submit Date</th>
						<th>Answer</th>
						<!-- <th style="text-align: right;">Action</th> -->
					</tr>
				</thead>
				<tbody>
					<? $no =1; ?>
					<? if($students){ ?>
						<? foreach ($students as $key) { ?>
						<?
						$student_detail = get_any_table_row(array('student_id' => $key['student_id']), 'student_information'); 

						$student_img = get_any_table_row(array('user_id' => $key['student_id']), 'profile_picture');

						if ($student_detail['form'] == $form) {
						?>
							<tr>
								<td><?= $no++;?></td>
								<?/*
								<td class="pl-0 py-4">
									<div class="symbol symbol-50 symbol-light">
										<span class="symbol-label">
											<img src="<?= view_profile_picture($student_img); ?>" class="h-50 align-self-center" alt="" />
										</span>
									</div>
								</td>
								*/?>
								<td>
									<?= ucfirst($student_detail['name']) ?><br><small><?= $student_detail['email']?></small>
								</td>
								<td>
									<?
									$homework_done = get_any_table_row(array('student_id' => $student_detail['student_id'], 'homework_id' => $homeworks['id']), 'homework_status');

									if ($homework_done) {
										if ($homework_done['status'] == '1') {
											$submit_dt = $homework_done['create_dt'];
											echo '<span class="label label-inline font-weight-bold label-info">Done</span>';
										} else {
											echo '<span class="label label-inline font-weight-bold label-danger">Not Done</span>';
											$submit_dt = '-';
										}
									}else{
										echo '<span class="label label-inline font-weight-bold label-danger">Not Done</span>';
										$submit_dt = '-';
									}
									?>
								</td>
								<td><?= $submit_dt?></td>
								<td>
									<? $path = base_url ($homework_done['path'] . "/" . $homework_done['filename']); ?>
									<a href="<?= $path?>" target="_BLANK"><?= $homework_done['original_filename']?></a>
								</td>
								<?/* <td><span class="label label-inline font-weight-bold label-info"><?= get_class_ref($key['class_id'])?></span></td> */?>
								<?/*
								<td align="right">
									<a href="#" class="btn btn-sm btn-info font-weight-bolder text-uppercase view-student-details" data-init="<?= $key['student_id']?>">View Details</a>
								</td>
								*/?>
							</tr>
						<? } ?>
						<? } ?>
					<? } ?>
				</tbody>
			</table>
			<!--end: Datatable-->
		</div>
	</div>
</div>