<div class="container">
	<div class="card card-custom">
		<div class="card-body">
			<!-- <p>Add
			<code>.nav-pills</code>within
			<code>.nav-tabs</code>to create pill shape navs.</p> -->
			<? if($no_student <> true){ ?>
			<div class="example mb-10">
				<div class="example-preview">
					<ul class="nav nav-pills" id="myTab1" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="home-tab-1" data-toggle="tab" href="#home-1">
								<span class="nav-icon">
									<i class="flaticon2-cardiogram"></i>
								</span>
								<span class="nav-text">Form 1</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="home-tab-2" data-toggle="tab" href="#home-2">
								<span class="nav-icon">
									<i class="flaticon2-cardiogram"></i>
								</span>
								<span class="nav-text">Form 2</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="home-tab-3" data-toggle="tab" href="#home-3">
								<span class="nav-icon">
									<i class="flaticon2-cardiogram"></i>
								</span>
								<span class="nav-text">Form 3</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="home-tab-4" data-toggle="tab" href="#home-4">
								<span class="nav-icon">
									<i class="flaticon2-cardiogram"></i>
								</span>
								<span class="nav-text">Form 4</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="home-tab-5" data-toggle="tab" href="#home-5">
								<span class="nav-icon">
									<i class="flaticon2-cardiogram"></i>
								</span>
								<span class="nav-text">Form 5</span>
							</a>
						</li>
						<?/*
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
								<span class="nav-icon">
									<i class="flaticon2-rocket-1"></i>
								</span>
								<span class="nav-text">Dropdown</span>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="#">Action</a>
								<a class="dropdown-item" href="#">Another action</a>
								<a class="dropdown-item" href="#">Something else here</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#">Separated link</a>
							</div>
						</li>
						*/?>
						<li class="nav-item">
							<a class="nav-link" id="home-tab-7" data-toggle="tab" href="#home-7" aria-controls="contact">
								<span class="nav-icon">
									<i class="flaticon2-cardiogram"></i>
								</span>
								<span class="nav-text">Sekolah Rendah</span>
							</a>
						</li>
					</ul>
					<div class="tab-content mt-5" id="myTabContent1">
						<!-- <div class="tab-pane fade show active" id="home-1" role="tabpanel" aria-labelledby="home-tab-1">
							<div align="right">
								<a href="" class="btn btn-light-primary font-weight-bolder btn-sm btn-add-homework" data-form='123'>Add Homework</a>
							</div>	
						</div>
						<div class="tab-pane fade" id="profile-1" role="tabpanel" aria-labelledby="profile-tab-1">
							<div align="right">
								<a href="" class="btn btn-light-primary font-weight-bolder btn-sm btn-add-homework" data-form='45'>Add Homework</a>
							</div>	
						</div> -->
						<div class="tab-pane fade show active" id="home-1" role="tabpanel" aria-labelledby="home-tab-1">
							<? if($form_1 == 'yes'){ ?>
							<div align="right">
								<a href="" class="btn btn-light-primary font-weight-bolder btn-sm btn-add-homework" data-form='1' data-classid="<?= $class_id?>" data-subjectid="<?= $subject_id?>">Add Homework</a>
							</div>	

							<? 
								$f1_homework = get_any_table_array(array('class_id' => $class_id, 'subject_id' => $subject_id, 'form' => '1', 'tutor_id' => $tutor['tutor_id']), 'homework');
							?>

							
							<br>
							<table class="table">
							    <thead class="thead-light">
							    	<th>No</th>
							    	<th>Homework Name</th>
							    	<th>Justification (Optional)</th>
							    	<th>Attachment</th>
							    </thead>
							    <tbody>
							    	<? $no = 1; ?>
							    	<? foreach ($f1_homework as $f1) { ?>
							    	<? $f1_attch = get_any_table_row(array('temp_key' => $f1['attachment'], 'is_submit' => '1'), 'homework_document'); ?>
							    	<? $path = base_url ($f1_attch['path'] . "/" . $f1_attch['filename']); ?>
							        <tr>
							        	<td><?= $no++; ?></td>
							        	<td><?= $f1['name'] ?></td>
							        	<td><?= $f1['remark'] ?></td>
							        	<td>
							        		<a href="<?= $path?>" target="_BLANK"><?= $f1_attch['original_filename']?></a>
							        	</td>
							        </tr>
							        <? } ?>
							    </tbody>
							</table>


							<? } else { ?>
							<p>No Student</p>
							<? } ?>
						</div>
						<div class="tab-pane fade" id="home-2" role="tabpanel" aria-labelledby="home-tab-2">
							<? if($form_2 == 'yes'){ ?>
							<div align="right">
								<a href="" class="btn btn-light-primary font-weight-bolder btn-sm btn-add-homework" data-form='2' data-classid="<?= $class_id?>" data-subjectid="<?= $subject_id?>">Add Homework</a>
							</div>	

							<? 
								$f2_homework = get_any_table_array(array('class_id' => $class_id, 'subject_id' => $subject_id, 'form' => '2', 'tutor_id' => $tutor['tutor_id']), 'homework');
							?>

							
							<br>
							<table class="table">
							    <thead class="thead-light">
							    	<th>No</th>
							    	<th>Homework Name</th>
							    	<th>Justification (Optional)</th>
							    	<th>Attachment</th>
							    </thead>
							    <tbody>
							    	<? $no = 1; ?>
							    	<? foreach ($f2_homework as $f2) { ?>
							    	<? $f2_attch = get_any_table_row(array('temp_key' => $f2['attachment'], 'is_submit' => '1'), 'homework_document'); ?>
							    	<? $path = base_url ($f2_attch['path'] . "/" . $f2_attch['filename']); ?>
							        <tr>
							        	<td><?= $no++; ?></td>
							        	<td><?= $f2['name'] ?></td>
							        	<td><?= $f2['remark'] ?></td>
							        	<td>
							        		<a href="<?= $path?>" target="_BLANK"><?= $f2_attch['original_filename']?></a>
							        	</td>
							        </tr>
							        <? } ?>
							    </tbody>
							</table>

							<? } else { ?>
							<p>No Student</p>
							<? } ?>
						</div>
						<div class="tab-pane fade" id="home-3" role="tabpanel" aria-labelledby="home-tab-3">
							<? if($form_3 == 'yes'){ ?>
							<div align="right">
								<a href="" class="btn btn-light-primary font-weight-bolder btn-sm btn-add-homework" data-form='3' data-classid="<?= $class_id?>" data-subjectid="<?= $subject_id?>">Add Homework</a>
							</div>	


							<? 
								$f3_homework = get_any_table_array(array('class_id' => $class_id, 'subject_id' => $subject_id, 'form' => '3', 'tutor_id' => $tutor['tutor_id']), 'homework');
							?>

							
							<br>
							<table class="table">
							    <thead class="thead-light">
							    	<th>No</th>
							    	<th>Homework Name</th>
							    	<th>Justification (Optional)</th>
							    	<th>Attachment</th>
							    </thead>
							    <tbody>
							    	<? $no = 1; ?>
							    	<? foreach ($f3_homework as $f3) { ?>
							    	<? $f3_attch = get_any_table_row(array('temp_key' => $f3['attachment'], 'is_submit' => '1'), 'homework_document'); ?>
							    	<? $path = base_url ($f3_attch['path'] . "/" . $f3_attch['filename']); ?>
							        <tr>
							        	<td><?= $no++; ?></td>
							        	<td><?= $f3['name'] ?></td>
							        	<td><?= $f3['remark'] ?></td>
							        	<td>
							        		<a href="<?= $path?>" target="_BLANK"><?= $f3_attch['original_filename']?></a>
							        	</td>
							        </tr>
							        <? } ?>
							    </tbody>
							</table>

							<? } else { ?>
							<p>No Student</p>
							<? } ?>
						</div>
						<div class="tab-pane fade" id="home-4" role="tabpanel" aria-labelledby="home-tab-4">
							<? if($form_4 == 'yes'){ ?>
							<div align="right">
								<a href="" class="btn btn-light-primary font-weight-bolder btn-sm btn-add-homework" data-form='4' data-classid="<?= $class_id?>" data-subjectid="<?= $subject_id?>">Add Homework</a>
							</div>	

							<? 
								$f4_homework = get_any_table_array(array('class_id' => $class_id, 'subject_id' => $subject_id, 'form' => '4', 'tutor_id' => $tutor['tutor_id']), 'homework');


							?>

							
							<br>
							<table class="table">
							    <thead class="thead-light">
							    	<th>No</th>
							    	<th>Homework Name</th>
							    	<th>Justification (Optional)</th>
							    	<th>Attachment</th>
							    </thead>
							    <tbody>
							    	<? $no = 1; ?>
							    	<? foreach ($f4_homework as $f4) { ?>
							    	<? $f4_attch = get_any_table_row(array('temp_key' => $f4['attachment'], 'is_submit' => '1'), 'homework_document'); ?>
							    	<? $path = base_url ($f4_attch['path'] . "/" . $f4_attch['filename']); ?>
							        <tr>
							        	<td><?= $no++; ?></td>
							        	<td><?= $f4['name'] ?></td>
							        	<td><?= $f4['remark'] ?></td>
							        	<td>
							        		<a href="<?= $path?>" target="_BLANK"><?= $f4_attch['original_filename']?></a>
							        	</td>
							        </tr>
							        <? } ?>
							    </tbody>
							</table>

						



							<? } else { ?>
							<p>No Student</p>
							<? } ?>
						</div>
						<div class="tab-pane fade" id="home-5" role="tabpanel" aria-labelledby="home-tab-5">
							<? if($form_5 == 'yes'){ ?>
							<div align="right">
								<a href="" class="btn btn-light-primary font-weight-bolder btn-sm btn-add-homework" data-form='5' data-classid="<?= $class_id?>" data-subjectid="<?= $subject_id?>">Add Homework</a>
							</div>	

							<? 
								$f5_homework = get_any_table_array(array('class_id' => $class_id, 'subject_id' => $subject_id, 'form' => '5', 'tutor_id' => $tutor['tutor_id']), 'homework');
							?>

							
							<br>
							<table class="table">
							    <thead class="thead-light">
							    	<th>No</th>
							    	<th>Homework Name</th>
							    	<th>Justification (Optional)</th>
							    	<th>Attachment</th>
							    </thead>
							    <tbody>
							    	<? $no = 1; ?>
							    	<? foreach ($f5_homework as $f5) { ?>
							    	<? $f5_attch = get_any_table_row(array('temp_key' => $f5['attachment'], 'is_submit' => '1'), 'homework_document'); ?>
							    	<? $path = base_url ($f5_attch['path'] . "/" . $f5_attch['filename']); ?>
							        <tr>
							        	<td><?= $no++; ?></td>
							        	<td><?= $f5['name'] ?></td>
							        	<td><?= $f5['remark'] ?></td>
							        	<td>
							        		<a href="<?= $path?>" target="_BLANK"><?= $f5_attch['original_filename']?></a>
							        	</td>
							        </tr>
							        <? } ?>
							    </tbody>
							</table>

							<? } else { ?>
							<p>No Student</p>
							<? } ?>
						</div>
						<div class="tab-pane fade" id="home-7" role="tabpanel" aria-labelledby="home-tab-7">
							<? if($form_7 == 'yes'){ ?>
							<div align="right">
								<a href="" class="btn btn-light-primary font-weight-bolder btn-sm btn-add-homework" data-form='7' data-classid="<?= $class_id?>" data-subjectid="<?= $subject_id?>">Add Homework</a>
							</div>	


							<? 
								$f7_homework = get_any_table_array(array('class_id' => $class_id, 'subject_id' => $subject_id, 'form' => '7', 'tutor_id' => $tutor['tutor_id']), 'homework');
							?>

							
							<br>
							<table class="table">
							    <thead class="thead-light">
							    	<th>No</th>
							    	<th>Homework Name</th>
							    	<th>Justification (Optional)</th>
							    	<th>Attachment</th>
							    </thead>
							    <tbody>
							    	<? $no = 1; ?>
							    	<? foreach ($f7_homework as $f7) { ?>
							    	<? $f7_attch = get_any_table_row(array('temp_key' => $f7['attachment'], 'is_submit' => '1'), 'homework_document'); ?>
							    	<? $path = base_url ($f7_attch['path'] . "/" . $f7_attch['filename']); ?>
							        <tr>
							        	<td><?= $no++; ?></td>
							        	<td><?= $f7['name'] ?></td>
							        	<td><?= $f7['remark'] ?></td>
							        	<td>
							        		<a href="<?= $path?>" target="_BLANK"><?= $f7_attch['original_filename']?></a>
							        	</td>
							        </tr>
							        <? } ?>
							    </tbody>
							</table>

							<? } else { ?>
							<p>No Student</p>
							<? } ?>
						</div>
					</div>
				</div>
			</div>
			<? } else {
					echo "There are no student";
			} ?>
		</div>
	</div>
</div>