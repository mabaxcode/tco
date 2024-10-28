<div class="container">
	<div class="card card-custom">
		<div class="card-body">
			<!-- <p>Add
			<code>.nav-pills</code>within
			<code>.nav-tabs</code>to create pill shape navs.</p> -->
			<? if($no_subject == false){ ?>
			<div class="example mb-10">
				<div class="example-preview">
					<ul class="nav nav-pills" id="myTab1" role="tablist">
						<? $no = 1; ?>
						<? foreach ($timetable_subjects as $key) { ?>
						<li class="nav-item">
							<a class="nav-link <? if($no == '1'){ echo "active"; }else{ echo ""; }?>" id="home-tab-<?= $key['id']?>" data-toggle="tab" href="#home-1">
								<span class="nav-icon">
									<i class="flaticon2-layers-1"></i>
								</span>
								<span class="nav-text"><?= get_ref_subject($key['subject_id']); ?></span>
							</a>
						</li>
						<? $no++; } ?>
					</ul>
					<div class="tab-content mt-5" id="myTabContent1">
						<? $no2 = 1; ?>
						<? foreach ($timetable_subjects as $val) { ?>
						<?
							# get home based on subjec and class
							$homeworks = get_any_table_array(array('subject_id' => $val['subject_id'], 'class_id' => $val['class_id']), 'homework');
						?>
						<div class="tab-pane fade <? if($no2 == '1'){ echo "show active"; }else{ echo ""; }?>" id="home-tab-<?= $val['id']?>" role="tabpanel" aria-labelledby="home-tab-1">
							<? if($homeworks){ ?>
							<table class="table">
							    <thead class="thead-light">
							    	<th>No</th>
							    	<th>Homework</th>
							    	<th>Justification (Optional)</th>
							    	<!-- <th>Attachment</th> -->
							    	<th>Status</th>
							    	<th>Upload Your Answer</th>
							    </thead>
							    <tbody>
							    	<? $noHomework = 1; foreach($homeworks as $homework){ ?>
							    	<? $f1_attch = get_any_table_row(array('temp_key' => $homework['attachment'], 'is_submit' => '1'), 'homework_document'); ?>
							    	<? $path = base_url ($f1_attch['path'] . "/" . $f1_attch['filename']); ?>
							    	<?
							    	$homework_status = get_any_table_row(array('homework_id' => $homework['id'], 'student_id' => $users['id']), 'homework_status');

							    	if ($homework_status) {
							    		if ($homework_status['status'] == 0) {
							    			$status_desc = "<span class='label label-danger label-pill label-inline mr-2'>Not Complete</span>";
							    		} else {
							    			$status_desc = "<span class='label label-success label-pill label-inline mr-2'> Complete</span>";
							    		}
							    	} else {
							    		$status_desc = "<span class='label label-danger label-pill label-inline mr-2'>Not Complete</span>";
							    	}

							    	$path_answer = base_url ($homework_status['path'] . "/" . $homework_status['filename']);

							    	?>
							        <tr>
							        	<td><?= $noHomework++; ?></td>
							        	<td><?= $homework['name'] ?>
							        		<br>
							        		<a href="<?= $path?>" target="_BLANK"><?= $f1_attch['original_filename']?></a>
							        	</td>
							        	<td><?= $homework['remark'] ?></td>
							        	<?/*
							        	<td>
							        		<a href="<?= $path?>" target="_BLANK"><?= $f1_attch['original_filename']?></a>
							        	</td>
							        	*/?>
							        	<td><?= $status_desc?></td>
							        	<td>
							        		<a class="btn btn-sm btn-primary upload-homework-answer" data-init="<?= $homework['id']?>">Upload</a> 
							        		<br>
							        		<a href="<?= $path_answer?>" target="_BLANK">
							        			<?= $homework_status['original_filename']?>
							        		</a>
							        		<? if($homework_status){ ?>
							        		<i class="icon-nm text-danger flaticon2-trash stud-delete-homework" data-init="<?= $homework_status['id']?>"></i>
							        	    <? } ?>
							        	</td>
							        </tr>
							        <? } ?>
							    </tbody>
							</table>


							<? } else { ?>

								<p>No Homework</p>

							<? } ?>

						</div>
						<? $no2++; } ?>
					</div>
				</div>
			</div>
			<? } else {
					echo "There Are No Subject";
			} ?>
		</div>
	</div>
</div>