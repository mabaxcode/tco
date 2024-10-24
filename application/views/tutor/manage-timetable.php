<div class="container">
	<div class="card card-custom">
		<div class="card-body">
		
			<a href="#" class="card-title text-hover-primary font-weight-bolder font-size-h5 text-dark mb-1"><?= $class_name?></a>
			<span class="label label-inline font-weight-bold label-warning">Subject <?= $subject_name?></span>
			

			<br><br>
			<!--begin: Datatable-->
			<table class="table table-separate table-head-custom table-checkable" id="mystudent-list-datatable">
				<thead>
					<tr>
						<th>No</th>
						<th>Date</th>
						<th>Time</th>
						<th>Class Link</th>
						<th>Online Class</th>
						<!-- <th style="text-align: right;">Action</th> -->
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
							<td><?= $key['class_dt'] ?></td>
							<td><?= $key['class_time'] ?></td>
							<td>
								<? if ($key['class_type'] == '1') { ?>
								<a href="<?= $key['class_link'] ?>" target="_BLANK"><?= $key['class_link']?></a>
								<? } else { ?>
								<span class="label label-inline font-weight-bold label-danger">Physical Class</span>
								<? } ?>
							</td>
							<td>
								<div class="col-8">
							   		<span class="switch switch-outline switch-icon switch-danger">
							    	<label>
							    	<?
							    		if ($key['class_type'] == '1') {
							    			$check = "checked";
							    		} else {
							    			$check = '';
							    		}
							    	?>
							     	<input type="checkbox" id="online-check-<?= $key['id']?>" <?= $check?> value="1" onchange="act_online_class('<?= $key['id']?>');" />
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
			<!--end: Datatable-->
		</div>
	</div>
</div>