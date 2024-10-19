<div class="container">
	<div class="card card-custom">
		<div class="card-header flex-wrap py-5">
			<div class="card-title">
				<h3 class="card-label">List of Student Registration</h3>
			</div>
		</div>
		<div class="card-body">
        <div class="col-lg-12 col-xl-12 col-xxl-12 mb-10 mb-xl-0">
				<!--begin::Timeline widget 3-->
				<div class="card h-md-100">
					<!--begin::Header-->
					<div class="card-header border-0 pt-5">
						<h3 class="card-title align-items-start flex-column">
							<span class="card-label fw-bold text-gray-900">What’s up Today</span>
							<!-- <span class="text-muted mt-1 fw-semibold fs-7">Total 424,567 deliveries</span> -->
						</h3>
						<!--begin::Toolbar-->
						<!-- <div class="card-toolbar">
							<a href="#" class="btn btn-sm btn-light">Report Cecnter</a>
						</div> -->
						<!--end::Toolbar-->
					</div>
					<!--end::Header-->
					<!--begin::Body-->
					<div class="card-body pt-0 px-0">

						<?
								//echo "<pre>"; print_r($timetables); echo "</pre>";
						?>
						
						<!--begin::Nav-->
						<ul class="nav nav-stretch nav-pills nav-pills-custom nav-pills-active-custom d-flex justify-content-between mb-8 px-5">
							<? $no = 1; ?>
							<? foreach($timetables as $timetable){ ?>
							
								<!--begin::Nav item-->
								<li class="nav-item p-0 ms-0">
									<!--begin::Date-->
									<a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px py-4 px-3 btn-hover-bg-danger btn-hover-text-white <? if($no == '1'){echo "active";} else {} ?>" data-toggle="tab" href="#timetables_<?= $timetable['id']?>">
										<!-- <span class="font-weight-bold fs-7 fw-semibold">Fr</span> -->
										<span class="font-weight-bold"><b><?= get_day_only($timetable['class_dt']); ?></b></span>
										<span class="font-weight-bold"><b><?= get_month_only($timetable['class_dt']); ?></b></span>
									</a>
									<!--end::Date-->
								</li>

							<? $no++; } ?>
						</ul>
						
						<!--end::Nav-->
						<!--begin::Tab Content (ishlamayabdi)-->
						<div class="tab-content mb-2 px-9">
							<!--begin::Tap pane-->
							
							<? $contenttab = 1; ?>
							<? foreach($timetables as $timetable){ ?>
							<?
								# get the class on this day
								$allClasses = get_any_table_array(array('student_id' => $timetable['student_id'], 'tuition_id' => $timetable['tuition_id'], 'class_dt' => $timetable['class_dt']), 'student_timetable');	
							?>
							<div class="tab-pane fade <? if($contenttab == '1'){echo "show active";} else {} ?>" id="timetables_<?= $timetable['id']?>">
								<!--begin::Wrapper-->
								<? foreach($allClasses as $allClass){ ?>
								<div class="d-flex align-items-center mb-6">
									
									<span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-info" style="width:5px;"></span>

									
									<div class="flex-grow-1 me-5">
										<div class='container'>
											
													
													<!--begin::Time-->
													<div class="text-gray-800 fw-semibold font-size-h4"><?= $allClass['class_time']?> <span class='font-weight-mormal font-size-lg timeline-content text-muted'><?= $day = getDay($timetable['class_dt']);?></span></div>
													
													<!--end::Time-->
													<!--begin::Description-->
													<div class="text-gray-700 fw-semibold fs-6"><?= get_ref_subject($allClass['subject_id']); ?></div>
													<!--end::Description-->
													<!--begin::Link-->
													<div class="text-muted fs-7">Tutor by 
													<!--begin::Name-->
													<a href="#" class="text-primary opacity-75-hover fw-semibold"><?= ucfirst(get_ref_tutor($allClass['tutor_id'])); ?></a>
													<!--end::Name--></div>
													<!--end::Link-->
											
										</div>
									</div>
									
									<!--end::Info-->
									<!--begin::Action-->
									<a href="#" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#kt_modal_create_project">View</a>
									<!--end::Action-->
								</div>
								<? } ?>
								<!--end::Wrapper-->
							</div>
							<? $contenttab++;} ?>
							<!--end::Tap pane-->
						</div>
						<!--end::Tab Content-->
					</div>
					<!--end: Card Body-->
				</div>
				<!--end::Timeline widget 3-->
			</div>
		</div>
	</div>
</div>