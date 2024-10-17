<div class="container">
	<div class="d-flex flex-row">
		<!--begin::Aside-->
		<div class="flex-row-auto offcanvas-mobile w-300px w-xl-400px" id="kt_profile_aside">
			<!--begin::Nav Panel Widget 2-->
			<div class="card card-custom gutter-b">
				<!--begin::Body-->
				<div class="card-body">
					<!--begin::Wrapper-->
					<div class="d-flex justify-content-between flex-column pt-4 h-100">
						<!--begin::Container-->
						<div class="pb-5">
							<!--begin::Header-->
							<div class="d-flex flex-column flex-center">
								<!--begin::Symbol-->
								<div class="symbol symbol-120 symbol-circle symbol-success overflow-hidden">
									<span class="symbol-label">
										<?
											//print_r($student_pic);
										?>
										<img src="<?= view_profile_picture($student_pic)?>" class="h-75 align-self-end" alt="" />
									</span>
								</div>
								<!--end::Symbol-->
								<!--begin::Username-->
								<a href="#" class="card-title font-weight-bolder text-dark-75 text-hover-primary font-size-h6 m-0 pt-7 pb-1">
									<?= strtoupper($student_data['name'])?></a>
								<!--end::Username-->
								<!--begin::Info-->
								<div class="font-weight-bold text-dark-50 font-size-sm pb-6">
									<?//= $student_data['address']?>
									<a href="#"><?= $student_data['email']?></a>
								</div>
								<!--end::Info-->
							</div>
							<!--end::Header-->
							<!--begin::Body-->
							<div class="pt-1">
								<!--begin::Text-->
								<!-- <p class="text-dark-75 font-weight-nirmal font-size-lg m-0 pb-7">Outlines keep you honest. If poorly thought-out metaphors driving or create keep structure</p> -->
								<!--end::Text-->


								<div class="py-9">
									<?/*
									<div class="d-flex align-items-center justify-content-between mb-2">
										<span class="font-weight-bold mr-2">Email:</span>
										<a href="#" class="text-muted text-hover-primary"><?= $student_data['email']?></a>
									</div>
									*/?>
									<div class="d-flex align-items-center justify-content-between mb-2">
										<span class="font-weight-bold mr-2">Phone:</span>
										<span class="text-muted"><?= $student_data['phone_no']?></span>
									</div>
									<div class="d-flex align-items-center justify-content-between mb-2">
										<span class="font-weight-bold mr-2">Form:</span>
										<span class="text-muted"><?= $student_data['form']?></span>
									</div>
									<div class="d-flex align-items-center justify-content-between mb-2">
										<span class="font-weight-bold mr-2">Guardian's name:</span>
										<span class="text-muted"><?= $student_data['guardian_name⁠']?></span>
									</div>
									<div class="d-flex align-items-center justify-content-between mb-2">
										<span class="font-weight-bold mr-2">Guardian's Phone:</span>
										<span class="text-muted"><?= $student_data['guardian_phone']?></span>
									</div>
									<br>
									<div class="d-flex align-items-center justify-content-between mb-2">
										<span class="font-weight-bold mr-2">Address:</span>
									</div>
									<div class="d-flex align-items-center justify-content-between mb-2">
										<span class="text-muted"><?= $student_data['address']?></span>
									</div>
									<br>
									<div class="d-flex align-items-center justify-content-between mb-2">
										<span class="font-weight-bold mr-2">School Name:</span>
									</div>
									<div class="d-flex align-items-center justify-content-between mb-2">
										<span class="text-muted"><?= $student_data['school_name']?></span>
									</div>
									<div class="d-flex align-items-center justify-content-between mb-2">
										<span class="font-weight-bold mr-2">School Address:</span>
									</div>
									<div class="d-flex align-items-center justify-content-between mb-2">
										<span class="text-muted"><?= $student_data['school_address']?></span>
									</div>
								</div>
							</div>
							<!--end::Body-->
						</div>
						<!--eng::Container-->
						<!--begin::Footer-->
						<!-- <div class="d-flex flex-center" id="kt_sticky_toolbar_chat_toggler_1" data-toggle="tooltip" title="" data-placement="right" data-original-title="Chat Example">
							<button class="btn btn-primary font-weight-bolder font-size-sm py-3 px-14" data-toggle="modal" data-target="#kt_chat_modal">Write a Message</button>
						</div> -->
						<!--end::Footer-->
					</div>
					<!--end::Wrapper-->
				</div>
				<!--end::Body-->
			</div>
			<!--end::Nav Panel Widget 2-->
		</div>
		<!--end::Aside-->
		<!--begin::Content-->
		<div class="flex-row-fluid ml-lg-8">
			<!--begin::Card-->
			<div class="card card-custom gutter-bs">
				<!--Begin::Header-->
				<div class="card-header card-header-tabs-line">
					<div class="card-toolbar">
						<ul class="nav nav-tabs nav-tabs-space-lg nav-tabs-line nav-tabs-bold nav-tabs-line-3x" role="tablist">
							<li class="nav-item mr-3">
								<a class="nav-link active" data-toggle="tab" href="#kt_apps_contacts_view_tab_2">
									<span class="nav-icon mr-2">
										<span class="svg-icon mr-3">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Devices/Display1.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M11,20 L11,17 C11,16.4477153 11.4477153,16 12,16 C12.5522847,16 13,16.4477153 13,17 L13,20 L15.5,20 C15.7761424,20 16,20.2238576 16,20.5 C16,20.7761424 15.7761424,21 15.5,21 L8.5,21 C8.22385763,21 8,20.7761424 8,20.5 C8,20.2238576 8.22385763,20 8.5,20 L11,20 Z" fill="#000000" opacity="0.3" />
													<path d="M3,5 L21,5 C21.5522847,5 22,5.44771525 22,6 L22,16 C22,16.5522847 21.5522847,17 21,17 L3,17 C2.44771525,17 2,16.5522847 2,16 L2,6 C2,5.44771525 2.44771525,5 3,5 Z M4.5,8 C4.22385763,8 4,8.22385763 4,8.5 C4,8.77614237 4.22385763,9 4.5,9 L13.5,9 C13.7761424,9 14,8.77614237 14,8.5 C14,8.22385763 13.7761424,8 13.5,8 L4.5,8 Z M4.5,10 C4.22385763,10 4,10.2238576 4,10.5 C4,10.7761424 4.22385763,11 4.5,11 L7.5,11 C7.77614237,11 8,10.7761424 8,10.5 C8,10.2238576 7.77614237,10 7.5,10 L4.5,10 Z" fill="#000000" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
									</span>
									<span class="nav-text font-weight-bold">Scheduling & Class Management</span>
								</a>
							</li>
							<?/*
							<li class="nav-item mr-3">
								<a class="nav-link" data-toggle="tab" href="#kt_apps_contacts_view_tab_3">
									<span class="nav-icon mr-2">
										<span class="svg-icon mr-3">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Devices/Display1.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M11,20 L11,17 C11,16.4477153 11.4477153,16 12,16 C12.5522847,16 13,16.4477153 13,17 L13,20 L15.5,20 C15.7761424,20 16,20.2238576 16,20.5 C16,20.7761424 15.7761424,21 15.5,21 L8.5,21 C8.22385763,21 8,20.7761424 8,20.5 C8,20.2238576 8.22385763,20 8.5,20 L11,20 Z" fill="#000000" opacity="0.3" />
													<path d="M3,5 L21,5 C21.5522847,5 22,5.44771525 22,6 L22,16 C22,16.5522847 21.5522847,17 21,17 L3,17 C2.44771525,17 2,16.5522847 2,16 L2,6 C2,5.44771525 2.44771525,5 3,5 Z M4.5,8 C4.22385763,8 4,8.22385763 4,8.5 C4,8.77614237 4.22385763,9 4.5,9 L13.5,9 C13.7761424,9 14,8.77614237 14,8.5 C14,8.22385763 13.7761424,8 13.5,8 L4.5,8 Z M4.5,10 C4.22385763,10 4,10.2238576 4,10.5 C4,10.7761424 4.22385763,11 4.5,11 L7.5,11 C7.77614237,11 8,10.7761424 8,10.5 C8,10.2238576 7.77614237,10 7.5,10 L4.5,10 Z" fill="#000000" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
									</span>
									<span class="nav-text font-weight-bold">Account</span>
								</a>
							</li>
							<li class="nav-item mr-3">
								<a class="nav-link" data-toggle="tab" href="#kt_apps_contacts_view_tab_4">
									<span class="nav-icon mr-2">
										<span class="svg-icon mr-3">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Home/Globe.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M13,18.9450712 L13,20 L14,20 C15.1045695,20 16,20.8954305 16,22 L8,22 C8,20.8954305 8.8954305,20 10,20 L11,20 L11,18.9448245 C9.02872877,18.7261967 7.20827378,17.866394 5.79372555,16.5182701 L4.73856106,17.6741866 C4.36621808,18.0820826 3.73370941,18.110904 3.32581341,17.7385611 C2.9179174,17.3662181 2.88909597,16.7337094 3.26143894,16.3258134 L5.04940685,14.367122 C5.46150313,13.9156769 6.17860937,13.9363085 6.56406875,14.4106998 C7.88623094,16.037907 9.86320756,17 12,17 C15.8659932,17 19,13.8659932 19,10 C19,7.73468744 17.9175842,5.65198725 16.1214335,4.34123851 C15.6753081,4.01567657 15.5775721,3.39010038 15.903134,2.94397499 C16.228696,2.49784959 16.8542722,2.4001136 17.3003976,2.72567554 C19.6071362,4.40902808 21,7.08906798 21,10 C21,14.6325537 17.4999505,18.4476269 13,18.9450712 Z" fill="#000000" fill-rule="nonzero" />
													<circle fill="#000000" opacity="0.3" cx="12" cy="10" r="6" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
									</span>
									<span class="nav-text font-weight-bold">Settings</span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#kt_apps_contacts_view_tab_1">
									<span class="nav-icon mr-2">
										<span class="svg-icon mr-3">
											<!--begin::Svg Icon | path:assets/media/svg/icons/General/Notification2.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z" fill="#000000" />
													<circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
									</span>
									<span class="nav-text font-weight-bold">Notes</span>
								</a>
							</li>
							*/?>
						</ul>
					</div>
				</div>
				<!--end::Header-->
				<!--Begin::Body-->
				<div class="card-body px-0">
					<div class="tab-content">
						<!--begin::Tab Content-->
						<div class="tab-pane active" id="kt_apps_contacts_view_tab_2" role="tabpanel">
							<form class="form">
		
								<!-- <div class="row"> -->
									
									<div class="card-body">

										<?/*
										<div class="alert alert-custom alert-default" role="alert">
	 										<div class="alert-icon"><i class="flaticon-warning text-primary"></i></div>
	 										<div class="alert-text">
	 											 Here are examples of <code>.form-control</code> applied to each textual HTML5 input type:
	 										</div>
										</div>
										*/?>

										<table class="table">
											<thead class="table table-striped">
												<tr>
													<th>Subject</th>
													<th>Tutor</th>
													<th>Action</th>
													<!-- <th>Date/Time</th> -->
												</tr>
										    </thead>
										    <tbody>
										    	<? 

												$subject_arr = explode("|",$tuition_data['subjects']);
												foreach ($subject_arr as $val => $value) {

													$ref_subject = get_any_table_row(array('code' => $value), 'ref_subject');

													# get tutor based on subject
													$tutors = get_any_table_array(array('subject' => $value, 'assign_class !=' => '0'), 'tutor');

													$where = array('tuition_id' => $tuition_data['tuition_id'], 'student_id' => $student_data['student_id'], 'subject_id' => $value );
													$getClass = get_any_table_row($where, 'student_class');

													?>
														<tr>
															<td>
																<?= $ref_subject['descs']?>
																<?	
																	if ($getClass) {

																		$tutor_details = get_any_table_row(array('tutor_id' => $getClass['tutor_id']), 'tutor');
																		$classDetail = get_any_table_row(array('id' => $tutor_details['assign_class'] ), 'class');

																		if($getClass['tutor_id'] == 0){
																			echo "<br><font color='red'><b>Tutor is required</b></font>";
																		} else {
																			// echo $classDetail['name'];
																			echo "<br>";
																			echo "<span class='label label-inline font-weight-bold label-info'>".$classDetail['name']."</span>";
																		}

																		

																		

																	} else {
																		//echo "not set";
																		echo "<br><font color='red'><b>Tutor is required</b></font>";
																	}
																?>
															</td>
															<td>
																<div class="form-group">
																	<select class="form-control form-control-sm" id="" onchange="giving_class('<?= $student_data['student_id']?>', this.value, '<?= $value?>');">
																     	<option value="">Please select</option>
																     	<? foreach ($tutors as $subtutor) { ?>
																     			<option value="<?= $subtutor['tutor_id']?>" <? if($getClass['tutor_id'] == $subtutor['tutor_id']){echo "selected";}else{echo "";} ?>>
																     				<?= strtoupper($subtutor['name'])?>
																     				<?//= get_value_from_any_table('class', 'name', array('id' => $subtutor['assign_class'] ))?>
																     			</option>
																     	<? } ?>
																    </select>
																	
																</div>
															</td>
															<td>
																<? if($getClass){ 
																		
																		if($getClass['tutor_id'] <> 0){ ?>
																			<a class='btn btn-info btn-sm set-the-class-slot' data-init="<?= $getClass['id']?>">Available Slot</a>

																			<?  
																				$whereClassSlot = array('student_id' => $student_data['student_id'], 'subject_id' => $value, 'tuition_id' => $tuition_data['tuition_id'], 'class_time' => '');
																				$classSlotComplete = get_any_table_row($whereClassSlot, 'student_timetable');

																				if($classSlotComplete == true){
																					echo "<font color='red'><b>Class Slot Not Complete</b></font>";
																				} else {
																					echo '<i class="flaticon2-correct text-danger font-size-h5"></i>';
																				}
																			?>

																			

																		<? } else {
																			
																		}
																} else {
																	//$generateBtn = false;
																	//echo "<font color='red'><b>Please select tutor</b></font>";
																	
																}?>
																
																

															</td>
														</tr>
													<?
												}

												?>
										    </tbody>
										</table>
									</div>
									<input type="hidden" id="t-id" value="<?= $tuition_data['tuition_id']?>">
									<div class="card-footer" align="right">
									   <button type="reset" class="btn btn-secondary mr-2 generate-timetable" data-init="<?= $tuition_data['tuition_id']?>">Generate Timetable</button>
									   <button type="reset" class="btn btn-danger reset-student-class" data-init="<?= $tuition_data['tuition_id']?>" data-studentid="<?= $student_data['student_id']?>">Reset</button>
									</div>
							</form>
						</div>
						<!--end::Tab Content-->
						<!--begin::Tab Content-->
						<div class="tab-pane" id="kt_apps_contacts_view_tab_3" role="tabpanel">
							<form class="form">
								<!--begin::Notice-->
								<div class="row">
									<div class="col-lg-9 col-xl-6 offset-xl-3">
										<div class="alert alert-custom alert-light-danger fade show mb-9" role="alert">
											<div class="alert-icon">
												<i class="flaticon-warning"></i>
											</div>
											<div class="alert-text">Configure user passwords to expire periodically.
											<br />Users will need warning that their passwords are going to expire, or they might inadvertently get locked out of the system!</div>
											<div class="alert-close">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">
														<i class="ki ki-close"></i>
													</span>
												</button>
											</div>
										</div>
									</div>
								</div>
								<!--end::Notice-->
								<!--begin::Heading-->
								<div class="row">
									<div class="col-lg-9 col-xl-6 offset-xl-3">
										<h3 class="font-size-h6 mb-5">Account:</h3>
									</div>
								</div>
								<!--end::Heading-->
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 text-right col-form-label">Username</label>
									<div class="col-lg-9 col-xl-6">
										<div class="spinner spinner-sm spinner-success spinner-right">
											<input class="form-control form-control-lg form-control-solid" type="text" value="nick84" />
										</div>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 text-right col-form-label">Email Address</label>
									<div class="col-lg-9 col-xl-6">
										<div class="input-group input-group-lg input-group-solid">
											<div class="input-group-prepend">
												<span class="input-group-text">
													<i class="la la-at"></i>
												</span>
											</div>
											<input type="text" class="form-control form-control-lg form-control-solid" value="nick.watson@loop.com" placeholder="Email" />
										</div>
										<span class="form-text text-muted">Email will not be publicly displayed.
										<a href="#">Learn more</a>.</span>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 text-right col-form-label">Language</label>
									<div class="col-lg-9 col-xl-6">
										<select class="form-control form-control-lg form-control-solid">
											<option>Select Language...</option>
											<option value="id">Bahasa Indonesia - Indonesian</option>
											<option value="msa">Bahasa Melayu - Malay</option>
											<option value="ca">Català - Catalan</option>
											<option value="cs">Čeština - Czech</option>
											<option value="da">Dansk - Danish</option>
											<option value="de">Deutsch - German</option>
											<option value="en" selected="selected">English</option>
											<option value="en-gb">English UK - British English</option>
											<option value="es">Español - Spanish</option>
											<option value="eu">Euskara - Basque (beta)</option>
											<option value="fil">Filipino</option>
											<option value="fr">Français - French</option>
											<option value="ga">Gaeilge - Irish (beta)</option>
											<option value="gl">Galego - Galician (beta)</option>
											<option value="hr">Hrvatski - Croatian</option>
											<option value="it">Italiano - Italian</option>
											<option value="hu">Magyar - Hungarian</option>
											<option value="nl">Nederlands - Dutch</option>
											<option value="no">Norsk - Norwegian</option>
											<option value="pl">Polski - Polish</option>
											<option value="pt">Português - Portuguese</option>
											<option value="ro">Română - Romanian</option>
											<option value="sk">Slovenčina - Slovak</option>
											<option value="fi">Suomi - Finnish</option>
											<option value="sv">Svenska - Swedish</option>
											<option value="vi">Tiếng Việt - Vietnamese</option>
											<option value="tr">Türkçe - Turkish</option>
											<option value="el">Ελληνικά - Greek</option>
											<option value="bg">Български език - Bulgarian</option>
											<option value="ru">Русский - Russian</option>
											<option value="sr">Српски - Serbian</option>
											<option value="uk">Українська мова - Ukrainian</option>
											<option value="he">עִבְרִית - Hebrew</option>
											<option value="ur">اردو - Urdu (beta)</option>
											<option value="ar">العربية - Arabic</option>
											<option value="fa">فارسی - Persian</option>
											<option value="mr">मराठी - Marathi</option>
											<option value="hi">हिन्दी - Hindi</option>
											<option value="bn">বাংলা - Bangla</option>
											<option value="gu">ગુજરાતી - Gujarati</option>
											<option value="ta">தமிழ் - Tamil</option>
											<option value="kn">ಕನ್ನಡ - Kannada</option>
											<option value="th">ภาษาไทย - Thai</option>
											<option value="ko">한국어 - Korean</option>
											<option value="ja">日本語 - Japanese</option>
											<option value="zh-cn">简体中文 - Simplified Chinese</option>
											<option value="zh-tw">繁體中文 - Traditional Chinese</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 text-right col-form-label">Time Zone</label>
									<div class="col-lg-9 col-xl-6">
										<select class="form-control form-control-lg form-control-solid">
											<option data-offset="-39600" value="International Date Line West">(GMT-11:00) International Date Line West</option>
											<option data-offset="-39600" value="Midway Island">(GMT-11:00) Midway Island</option>
											<option data-offset="-39600" value="Samoa">(GMT-11:00) Samoa</option>
											<option data-offset="-36000" value="Hawaii">(GMT-10:00) Hawaii</option>
											<option data-offset="-28800" value="Alaska">(GMT-08:00) Alaska</option>
											<option data-offset="-25200" value="Pacific Time (US &amp; Canada)">(GMT-07:00) Pacific Time (US &amp; Canada)</option>
											<option data-offset="-25200" value="Tijuana">(GMT-07:00) Tijuana</option>
											<option data-offset="-25200" value="Arizona">(GMT-07:00) Arizona</option>
											<option data-offset="-21600" value="Mountain Time (US &amp; Canada)">(GMT-06:00) Mountain Time (US &amp; Canada)</option>
											<option data-offset="-21600" value="Chihuahua">(GMT-06:00) Chihuahua</option>
											<option data-offset="-21600" value="Mazatlan">(GMT-06:00) Mazatlan</option>
											<option data-offset="-21600" value="Saskatchewan">(GMT-06:00) Saskatchewan</option>
											<option data-offset="-21600" value="Central America">(GMT-06:00) Central America</option>
											<option data-offset="-18000" value="Central Time (US &amp; Canada)">(GMT-05:00) Central Time (US &amp; Canada)</option>
											<option data-offset="-18000" value="Guadalajara">(GMT-05:00) Guadalajara</option>
											<option data-offset="-18000" value="Mexico City">(GMT-05:00) Mexico City</option>
											<option data-offset="-18000" value="Monterrey">(GMT-05:00) Monterrey</option>
											<option data-offset="-18000" value="Bogota">(GMT-05:00) Bogota</option>
											<option data-offset="-18000" value="Lima">(GMT-05:00) Lima</option>
											<option data-offset="-18000" value="Quito">(GMT-05:00) Quito</option>
											<option data-offset="-14400" value="Eastern Time (US &amp; Canada)">(GMT-04:00) Eastern Time (US &amp; Canada)</option>
											<option data-offset="-14400" value="Indiana (East)">(GMT-04:00) Indiana (East)</option>
											<option data-offset="-14400" value="Caracas">(GMT-04:00) Caracas</option>
											<option data-offset="-14400" value="La Paz">(GMT-04:00) La Paz</option>
											<option data-offset="-14400" value="Georgetown">(GMT-04:00) Georgetown</option>
											<option data-offset="-10800" value="Atlantic Time (Canada)">(GMT-03:00) Atlantic Time (Canada)</option>
											<option data-offset="-10800" value="Santiago">(GMT-03:00) Santiago</option>
											<option data-offset="-10800" value="Brasilia">(GMT-03:00) Brasilia</option>
											<option data-offset="-10800" value="Buenos Aires">(GMT-03:00) Buenos Aires</option>
											<option data-offset="-9000" value="Newfoundland">(GMT-02:30) Newfoundland</option>
											<option data-offset="-7200" value="Greenland">(GMT-02:00) Greenland</option>
											<option data-offset="-7200" value="Mid-Atlantic">(GMT-02:00) Mid-Atlantic</option>
											<option data-offset="-3600" value="Cape Verde Is.">(GMT-01:00) Cape Verde Is.</option>
											<option data-offset="0" value="Azores">(GMT) Azores</option>
											<option data-offset="0" value="Monrovia">(GMT) Monrovia</option>
											<option data-offset="0" value="UTC">(GMT) UTC</option>
											<option data-offset="3600" value="Dublin">(GMT+01:00) Dublin</option>
											<option data-offset="3600" value="Edinburgh">(GMT+01:00) Edinburgh</option>
											<option data-offset="3600" value="Lisbon">(GMT+01:00) Lisbon</option>
											<option data-offset="3600" value="London">(GMT+01:00) London</option>
											<option data-offset="3600" value="Casablanca">(GMT+01:00) Casablanca</option>
											<option data-offset="3600" value="West Central Africa">(GMT+01:00) West Central Africa</option>
											<option data-offset="7200" value="Belgrade">(GMT+02:00) Belgrade</option>
											<option data-offset="7200" value="Bratislava">(GMT+02:00) Bratislava</option>
											<option data-offset="7200" value="Budapest">(GMT+02:00) Budapest</option>
											<option data-offset="7200" value="Ljubljana">(GMT+02:00) Ljubljana</option>
											<option data-offset="7200" value="Prague">(GMT+02:00) Prague</option>
											<option data-offset="7200" value="Sarajevo">(GMT+02:00) Sarajevo</option>
											<option data-offset="7200" value="Skopje">(GMT+02:00) Skopje</option>
											<option data-offset="7200" value="Warsaw">(GMT+02:00) Warsaw</option>
											<option data-offset="7200" value="Zagreb">(GMT+02:00) Zagreb</option>
											<option data-offset="7200" value="Brussels">(GMT+02:00) Brussels</option>
											<option data-offset="7200" value="Copenhagen">(GMT+02:00) Copenhagen</option>
											<option data-offset="7200" value="Madrid">(GMT+02:00) Madrid</option>
											<option data-offset="7200" value="Paris">(GMT+02:00) Paris</option>
											<option data-offset="7200" value="Amsterdam">(GMT+02:00) Amsterdam</option>
											<option data-offset="7200" value="Berlin">(GMT+02:00) Berlin</option>
											<option data-offset="7200" value="Bern">(GMT+02:00) Bern</option>
											<option data-offset="7200" value="Rome">(GMT+02:00) Rome</option>
											<option data-offset="7200" value="Stockholm">(GMT+02:00) Stockholm</option>
											<option data-offset="7200" value="Vienna">(GMT+02:00) Vienna</option>
											<option data-offset="7200" value="Cairo">(GMT+02:00) Cairo</option>
											<option data-offset="7200" value="Harare">(GMT+02:00) Harare</option>
											<option data-offset="7200" value="Pretoria">(GMT+02:00) Pretoria</option>
											<option data-offset="10800" value="Bucharest">(GMT+03:00) Bucharest</option>
											<option data-offset="10800" value="Helsinki">(GMT+03:00) Helsinki</option>
											<option data-offset="10800" value="Kiev">(GMT+03:00) Kiev</option>
											<option data-offset="10800" value="Kyiv">(GMT+03:00) Kyiv</option>
											<option data-offset="10800" value="Riga">(GMT+03:00) Riga</option>
											<option data-offset="10800" value="Sofia">(GMT+03:00) Sofia</option>
											<option data-offset="10800" value="Tallinn">(GMT+03:00) Tallinn</option>
											<option data-offset="10800" value="Vilnius">(GMT+03:00) Vilnius</option>
											<option data-offset="10800" value="Athens">(GMT+03:00) Athens</option>
											<option data-offset="10800" value="Istanbul">(GMT+03:00) Istanbul</option>
											<option data-offset="10800" value="Minsk">(GMT+03:00) Minsk</option>
											<option data-offset="10800" value="Jerusalem">(GMT+03:00) Jerusalem</option>
											<option data-offset="10800" value="Moscow">(GMT+03:00) Moscow</option>
											<option data-offset="10800" value="St. Petersburg">(GMT+03:00) St. Petersburg</option>
											<option data-offset="10800" value="Volgograd">(GMT+03:00) Volgograd</option>
											<option data-offset="10800" value="Kuwait">(GMT+03:00) Kuwait</option>
											<option data-offset="10800" value="Riyadh">(GMT+03:00) Riyadh</option>
											<option data-offset="10800" value="Nairobi">(GMT+03:00) Nairobi</option>
											<option data-offset="10800" value="Baghdad">(GMT+03:00) Baghdad</option>
											<option data-offset="14400" value="Abu Dhabi">(GMT+04:00) Abu Dhabi</option>
											<option data-offset="14400" value="Muscat">(GMT+04:00) Muscat</option>
											<option data-offset="14400" value="Baku">(GMT+04:00) Baku</option>
											<option data-offset="14400" value="Tbilisi">(GMT+04:00) Tbilisi</option>
											<option data-offset="14400" value="Yerevan">(GMT+04:00) Yerevan</option>
											<option data-offset="16200" value="Tehran">(GMT+04:30) Tehran</option>
											<option data-offset="16200" value="Kabul">(GMT+04:30) Kabul</option>
											<option data-offset="18000" value="Ekaterinburg">(GMT+05:00) Ekaterinburg</option>
											<option data-offset="18000" value="Islamabad">(GMT+05:00) Islamabad</option>
											<option data-offset="18000" value="Karachi">(GMT+05:00) Karachi</option>
											<option data-offset="18000" value="Tashkent">(GMT+05:00) Tashkent</option>
											<option data-offset="19800" value="Chennai">(GMT+05:30) Chennai</option>
											<option data-offset="19800" value="Kolkata">(GMT+05:30) Kolkata</option>
											<option data-offset="19800" value="Mumbai">(GMT+05:30) Mumbai</option>
											<option data-offset="19800" value="New Delhi">(GMT+05:30) New Delhi</option>
											<option data-offset="19800" value="Sri Jayawardenepura">(GMT+05:30) Sri Jayawardenepura</option>
											<option data-offset="20700" value="Kathmandu">(GMT+05:45) Kathmandu</option>
											<option data-offset="21600" value="Astana">(GMT+06:00) Astana</option>
											<option data-offset="21600" value="Dhaka">(GMT+06:00) Dhaka</option>
											<option data-offset="21600" value="Almaty">(GMT+06:00) Almaty</option>
											<option data-offset="21600" value="Urumqi">(GMT+06:00) Urumqi</option>
											<option data-offset="23400" value="Rangoon">(GMT+06:30) Rangoon</option>
											<option data-offset="25200" value="Novosibirsk">(GMT+07:00) Novosibirsk</option>
											<option data-offset="25200" value="Bangkok">(GMT+07:00) Bangkok</option>
											<option data-offset="25200" value="Hanoi">(GMT+07:00) Hanoi</option>
											<option data-offset="25200" value="Jakarta">(GMT+07:00) Jakarta</option>
											<option data-offset="25200" value="Krasnoyarsk">(GMT+07:00) Krasnoyarsk</option>
											<option data-offset="28800" value="Beijing">(GMT+08:00) Beijing</option>
											<option data-offset="28800" value="Chongqing">(GMT+08:00) Chongqing</option>
											<option data-offset="28800" value="Hong Kong">(GMT+08:00) Hong Kong</option>
											<option data-offset="28800" value="Kuala Lumpur">(GMT+08:00) Kuala Lumpur</option>
											<option data-offset="28800" value="Singapore">(GMT+08:00) Singapore</option>
											<option data-offset="28800" value="Taipei">(GMT+08:00) Taipei</option>
											<option data-offset="28800" value="Perth">(GMT+08:00) Perth</option>
											<option data-offset="28800" value="Irkutsk">(GMT+08:00) Irkutsk</option>
											<option data-offset="28800" value="Ulaan Bataar">(GMT+08:00) Ulaan Bataar</option>
											<option data-offset="32400" value="Seoul">(GMT+09:00) Seoul</option>
											<option data-offset="32400" value="Osaka">(GMT+09:00) Osaka</option>
											<option data-offset="32400" value="Sapporo">(GMT+09:00) Sapporo</option>
											<option data-offset="32400" value="Tokyo">(GMT+09:00) Tokyo</option>
											<option data-offset="32400" value="Yakutsk">(GMT+09:00) Yakutsk</option>
											<option data-offset="34200" value="Darwin">(GMT+09:30) Darwin</option>
											<option data-offset="34200" value="Adelaide">(GMT+09:30) Adelaide</option>
											<option data-offset="36000" value="Canberra">(GMT+10:00) Canberra</option>
											<option data-offset="36000" value="Melbourne">(GMT+10:00) Melbourne</option>
											<option data-offset="36000" value="Sydney">(GMT+10:00) Sydney</option>
											<option data-offset="36000" value="Brisbane">(GMT+10:00) Brisbane</option>
											<option data-offset="36000" value="Hobart">(GMT+10:00) Hobart</option>
											<option data-offset="36000" value="Vladivostok">(GMT+10:00) Vladivostok</option>
											<option data-offset="36000" value="Guam">(GMT+10:00) Guam</option>
											<option data-offset="36000" value="Port Moresby">(GMT+10:00) Port Moresby</option>
											<option data-offset="36000" value="Solomon Is.">(GMT+10:00) Solomon Is.</option>
											<option data-offset="39600" value="Magadan">(GMT+11:00) Magadan</option>
											<option data-offset="39600" value="New Caledonia">(GMT+11:00) New Caledonia</option>
											<option data-offset="43200" value="Fiji">(GMT+12:00) Fiji</option>
											<option data-offset="43200" value="Kamchatka">(GMT+12:00) Kamchatka</option>
											<option data-offset="43200" value="Marshall Is.">(GMT+12:00) Marshall Is.</option>
											<option data-offset="43200" value="Auckland">(GMT+12:00) Auckland</option>
											<option data-offset="43200" value="Wellington">(GMT+12:00) Wellington</option>
											<option data-offset="46800" value="Nuku'alofa">(GMT+13:00) Nuku'alofa</option>
										</select>
									</div>
								</div>
								<div class="form-group row align-items-center">
									<label class="col-xl-3 col-lg-3 col-form-label text-right">Communication</label>
									<div class="col-lg-9 col-xl-6">
										<div class="checkbox-inline">
											<label class="checkbox">
											<input type="checkbox" />
											<span></span>Email</label>
											<label class="checkbox">
											<input type="checkbox" />
											<span></span>SMS</label>
											<label class="checkbox">
											<input type="checkbox" />
											<span></span>Phone</label>
										</div>
									</div>
								</div>
								<div class="separator separator-dashed my-10"></div>
								<!--begin::Heading-->
								<div class="row">
									<div class="col-lg-9 col-xl-6 offset-xl-3">
										<h3 class="font-size-h6 mb-5">Security:</h3>
									</div>
								</div>
								<!--end::Heading-->
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 text-right col-form-label">Login verification</label>
									<div class="col-lg-9 col-xl-6">
										<button type="button" class="btn btn-light-primary font-weight-bold btn-sm">Setup login verification</button>
										<span class="form-text text-muted">After you log in, you will be asked for additional information to confirm your identity and protect your account from being compromised.
										<a href="#">Learn more</a>.</span>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 text-right col-form-label">Password reset verification</label>
									<div class="col-lg-9 col-xl-6">
										<div class="checkbox-inline">
											<label class="checkbox">
											<input type="checkbox" />
											<span></span>Require personal information to reset your password.</label>
										</div>
										<span class="form-text text-muted">For extra security, this requires you to confirm your email or phone number when you reset your password.
										<a href="#">Learn more</a>.</span>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 text-right col-form-label"></label>
									<div class="col-lg-9 col-xl-6">
										<button type="button" class="btn btn-light-danger font-weight-bold btn-sm">Deactivate your account ?</button>
									</div>
								</div>
							</form>
						</div>
						<!--end::Tab Content-->
						<!--begin::Tab Content-->
						<div class="tab-pane" id="kt_apps_contacts_view_tab_4" role="tabpanel">
							<form class="form">
								<div class="row">
									<label class="col-xl-3"></label>
									<div class="col-lg-9 col-xl-6">
										<h3 class="font-size-h6 mb-5">Setup Email Notification:</h3>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 text-right col-form-label">Email Notification</label>
									<div class="col-lg-9 col-xl-6">
										<span class="switch">
											<label>
												<input type="checkbox" checked="checked" name="email_notification_1" />
												<span></span>
											</label>
										</span>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 text-right col-form-label">Send Copy To Personal Email</label>
									<div class="col-lg-9 col-xl-6">
										<span class="switch">
											<label>
												<input type="checkbox" name="email_notification_2" />
												<span></span>
											</label>
										</span>
									</div>
								</div>
								<div class="separator separator-dashed my-10"></div>
								<!--begin::Heading-->
								<div class="row">
									<div class="col-lg-9 col-xl-6 offset-xl-3">
										<h3 class="font-size-h6 mb-5">Activity Related Emails:</h3>
									</div>
								</div>
								<!--end::Heading-->
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 text-right">When To Email</label>
									<div class="col-lg-9 col-xl-6">
										<div class="checkbox-list">
											<label class="checkbox">
											<input type="checkbox" />
											<span></span>You have new notifications.</label>
											<label class="checkbox">
											<input type="checkbox" />
											<span></span>You're sent a direct message</label>
											<label class="checkbox">
											<input type="checkbox" checked="checked" />
											<span></span>Someone adds you as a connection</label>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 text-right">When To Escalate Emails</label>
									<div class="col-lg-9 col-xl-6">
										<div class="checkbox-list">
											<label class="checkbox">
											<input type="checkbox" />
											<span></span>Upon new order.</label>
											<label class="checkbox">
											<input type="checkbox" />
											<span></span>New membership approval</label>
											<label class="checkbox">
											<input type="checkbox" checked="checked" />
											<span></span>Member registration</label>
										</div>
									</div>
								</div>
								<div class="separator separator-dashed my-10"></div>
								<!--begin::Heading-->
								<div class="row">
									<div class="col-lg-9 col-xl-6 offset-xl-3">
										<h3 class="font-size-h6 mb-5">Updates From Keenthemes:</h3>
									</div>
								</div>
								<!--end::Heading-->
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 text-right">Email You With</label>
									<div class="col-lg-9 col-xl-6">
										<div class="checkbox-list">
											<label class="checkbox">
											<input type="checkbox" />
											<span></span>News about Metronic product and feature updates</label>
											<label class="checkbox">
											<input type="checkbox" />
											<span></span>Tips on getting more out of Keen</label>
											<label class="checkbox">
											<input type="checkbox" checked="checked" />
											<span></span>Things you missed since you last logged into Keen</label>
											<label class="checkbox">
											<input type="checkbox" checked="checked" />
											<span></span>News about Metronic on partner products and other services</label>
											<label class="checkbox">
											<input type="checkbox" checked="checked" />
											<span></span>Tips on Metronic business products</label>
										</div>
									</div>
								</div>
							</form>
						</div>
						<!--end::Tab Content-->
						<!--begin::Tab Content-->
						<div class="tab-pane" id="kt_apps_contacts_view_tab_1" role="tabpanel">
							<div class="container">
								<form class="form">
									<div class="form-group">
										<textarea class="form-control form-control-lg form-control-solid" id="exampleTextarea" rows="3" placeholder="Type notes"></textarea>
									</div>
									<div class="row">
										<div class="col">
											<a href="#" class="btn btn-light-primary font-weight-bold">Add notes</a>
											<a href="#" class="btn btn-clean font-weight-bold">Cancel</a>
										</div>
									</div>
								</form>
								<div class="separator separator-dashed my-10"></div>
								<!--begin::Timeline-->
								<div class="timeline timeline-3">
									<div class="timeline-items">
										<div class="timeline-item">
											<div class="timeline-media">
												<img alt="Pic" src="assets/media/users/300_25.jpg" />
											</div>
											<div class="timeline-content">
												<div class="d-flex align-items-center justify-content-between mb-3">
													<div class="mr-2">
														<a href="#" class="text-dark-75 text-hover-primary font-weight-bold">New order has been placed</a>
														<span class="text-muted ml-2">Today</span>
														<span class="label label-light-success font-weight-bolder label-inline ml-2">new</span>
													</div>
													<div class="dropdown ml-2" data-toggle="tooltip" title="Quick actions" data-placement="left">
														<a href="#" class="btn btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															<i class="ki ki-more-hor font-size-lg text-primary"></i>
														</a>
														<div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right">
															<!--begin::Navigation-->
															<ul class="navi navi-hover">
																<li class="navi-header font-weight-bold py-4">
																	<span class="font-size-lg">Choose Label:</span>
																	<i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="Click to learn more..."></i>
																</li>
																<li class="navi-separator mb-3 opacity-70"></li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-success">Customer</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-danger">Partner</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-warning">Suplier</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-primary">Member</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-dark">Staff</span>
																		</span>
																	</a>
																</li>
																<li class="navi-separator mt-3 opacity-70"></li>
																<li class="navi-footer py-4">
																	<a class="btn btn-clean font-weight-bold btn-sm" href="#">
																	<i class="ki ki-plus icon-sm"></i>Add new</a>
																</li>
															</ul>
															<!--end::Navigation-->
														</div>
													</div>
												</div>
												<p class="p-0">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto.</p>
											</div>
										</div>
										<div class="timeline-item">
											<div class="timeline-media">
												<i class="flaticon2-shield text-danger"></i>
											</div>
											<div class="timeline-content">
												<div class="d-flex align-items-center justify-content-between mb-3">
													<div class="mr-2">
														<a href="#" class="text-dark-75 text-hover-primary font-weight-bold">Member has sent a request.</a>
														<span class="text-muted ml-2">8:30PM 20 June</span>
														<span class="label label-light-danger font-weight-bolder label-inline ml-2">pending</span>
													</div>
													<div class="dropdown ml-2" data-toggle="tooltip" title="Quick actions" data-placement="left">
														<a href="#" class="btn btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															<i class="ki ki-more-hor font-size-lg text-primary"></i>
														</a>
														<div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right">
															<!--begin::Navigation-->
															<ul class="navi navi-hover">
																<li class="navi-header font-weight-bold py-4">
																	<span class="font-size-lg">Choose Label:</span>
																	<i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="Click to learn more..."></i>
																</li>
																<li class="navi-separator mb-3 opacity-70"></li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-success">Customer</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-danger">Partner</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-warning">Suplier</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-primary">Member</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-dark">Staff</span>
																		</span>
																	</a>
																</li>
																<li class="navi-separator mt-3 opacity-70"></li>
																<li class="navi-footer py-4">
																	<a class="btn btn-clean font-weight-bold btn-sm" href="#">
																	<i class="ki ki-plus icon-sm"></i>Add new</a>
																</li>
															</ul>
															<!--end::Navigation-->
														</div>
													</div>
												</div>
												<p class="p-0">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto.</p>
											</div>
										</div>
										<div class="timeline-item">
											<div class="timeline-media">
												<i class="flaticon2-layers text-warning"></i>
											</div>
											<div class="timeline-content">
												<div class="d-flex align-items-center justify-content-between mb-3">
													<div class="mr-2">
														<a href="#" class="text-dark-75 text-hover-primary font-weight-bold">System deployment has been completed.</a>
														<span class="text-muted ml-2">11:00AM 30 June</span>
														<span class="label label-light-warning font-weight-bolder label-inline ml-2">done</span>
													</div>
													<div class="dropdown ml-2" data-toggle="tooltip" title="Quick actions" data-placement="left">
														<a href="#" class="btn btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															<i class="ki ki-more-hor font-size-lg text-primary"></i>
														</a>
														<div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right">
															<!--begin::Navigation-->
															<ul class="navi navi-hover">
																<li class="navi-header font-weight-bold py-4">
																	<span class="font-size-lg">Choose Label:</span>
																	<i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="Click to learn more..."></i>
																</li>
																<li class="navi-separator mb-3 opacity-70"></li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-success">Customer</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-danger">Partner</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-warning">Suplier</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-primary">Member</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-dark">Staff</span>
																		</span>
																	</a>
																</li>
																<li class="navi-separator mt-3 opacity-70"></li>
																<li class="navi-footer py-4">
																	<a class="btn btn-clean font-weight-bold btn-sm" href="#">
																	<i class="ki ki-plus icon-sm"></i>Add new</a>
																</li>
															</ul>
															<!--end::Navigation-->
														</div>
													</div>
												</div>
												<p class="p-0">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto.</p>
											</div>
										</div>
										<div class="timeline-item">
											<div class="timeline-media">
												<i class="flaticon2-notification fl text-primary"></i>
											</div>
											<div class="timeline-content">
												<div class="d-flex align-items-center justify-content-between mb-3">
													<div class="mr-2">
														<a href="#" class="text-dark-75 text-hover-primary font-weight-bold">Database backup has been completed.</a>
														<span class="text-muted ml-2">2 months ago</span>
														<span class="label label-light-primary font-weight-bolder label-inline ml-2">delivered</span>
													</div>
													<div class="dropdown ml-2" data-toggle="tooltip" title="Quick actions" data-placement="left">
														<a href="#" class="btn btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															<i class="ki ki-more-hor font-size-lg text-primary"></i>
														</a>
														<div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right">
															<!--begin::Navigation-->
															<ul class="navi navi-hover">
																<li class="navi-header font-weight-bold py-4">
																	<span class="font-size-lg">Choose Label:</span>
																	<i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="Click to learn more..."></i>
																</li>
																<li class="navi-separator mb-3 opacity-70"></li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-success">Customer</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-danger">Partner</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-warning">Suplier</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-primary">Member</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-dark">Staff</span>
																		</span>
																	</a>
																</li>
																<li class="navi-separator mt-3 opacity-70"></li>
																<li class="navi-footer py-4">
																	<a class="btn btn-clean font-weight-bold btn-sm" href="#">
																	<i class="ki ki-plus icon-sm"></i>Add new</a>
																</li>
															</ul>
															<!--end::Navigation-->
														</div>
													</div>
												</div>
												<p class="p-0">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto.</p>
											</div>
										</div>
									</div>
								</div>
								<!--end::Timeline-->
							</div>
						</div>
						<!--end::Tab Content-->
					</div>
				</div>
				<!--end::Body-->
			</div>
			<!--end::Card-->
		</div>
		<!--end::Content-->
	</div>
</div>