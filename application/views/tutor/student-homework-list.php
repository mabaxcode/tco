<div class="container">
	<div class="card card-custom">
		<div class="card-body">
			<!--begin: Datatable-->
			<table class="table table-separate table-head-custom table-checkable" id="mystudent-list-datatable">
				<thead>
					<tr>
						<th>No</th>
						<th>Homework</th>
						<th>Justification (Optional)</th>
						<!-- <th>Class</th> -->
						<!-- <th>Subject</th> -->
						<th>Form</th>
						<th>Statistic Answered</th>
						<th style="text-align: right;">Action</th>
					</tr>
				</thead>
				<tbody>
					<? $no =1; ?>
					<? if($homeworks){ ?>
						<? foreach ($homeworks as $key) { ?>
						<?
						// $student_detail = get_any_table_row(array('student_id' => $key['student_id']), 'student_information'); 

						// $student_img    = get_any_table_row(array('user_id' => $key['student_id']), 'profile_picture'); 
						?>
						<tr>
							<td><?= $no++;?></td>
							<td class="pl-0 py-4">
								<?= ucfirst($key['name']) ?>
							</td>
							<td>
								<?= $key['remark'] ?>
							</td>
							<?/*
							<td>
								<?= ucfirst(get_class_ref($key['class_id'])); ?>
							</td>
							
							<td>
								<span class="label label-inline font-weight-bold label-info"><?= ucfirst(get_ref_subject($key['subject_id'])); ?></span>
							</td>
							*/?>
							<td>
								<?= $form = ($key['form'] == '7') ? '<span class="label label-inline font-weight-bold label-warning">SK Rendah</span>' : '<span class="label label-inline font-weight-bold label-success">Form ' . $key['form'] . '</span>'; ?>
							</td>
							<td>
								<?
								//$data['class_taken'] = get_any_table_row(array('tutor_id' => $this->user_id), 'tutor');
        						//$data['students']    = $this->DbTutor->get_all_mystudent($this->user_id, $data['class_taken']['assign_class']);

        						$student_under_this_tutor = get_any_table_array(array('tutor_id' => $key['tutor_id'], 'class_id' =>$key['class_id']), 'student_class');
        						$total_student            = count_student_form($student_under_this_tutor, $key['form']);


        						$total_student_complete   = count_student_complete($student_under_this_tutor, $key['id']);

        						echo "<font color='red'><b>Total Student Complete Homework : ". $total_student_complete . "/" . $total_student . "</b></font>";

								?>
							</td>
							<?/* <td><span class="label label-inline font-weight-bold label-info"><?= get_class_ref($key['class_id'])?></span></td> */?>
							<td align="right">
								<a href="<?= base_url('tutor/view_homework_details/'.$key['id']); ?>" class="btn btn-sm btn-info font-weight-bolder">View</a>
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