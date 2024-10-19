<div class="container">
	<!--begin::Education-->
	<div class="d-flex flex-row">
		<!--begin::Content-->
		<div class="flex-row-fluid">
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
											<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Chat-check.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M4.875,20.75 C4.63541667,20.75 4.39583333,20.6541667 4.20416667,20.4625 L2.2875,18.5458333 C1.90416667,18.1625 1.90416667,17.5875 2.2875,17.2041667 C2.67083333,16.8208333 3.29375,16.8208333 3.62916667,17.2041667 L4.875,18.45 L8.0375,15.2875 C8.42083333,14.9041667 8.99583333,14.9041667 9.37916667,15.2875 C9.7625,15.6708333 9.7625,16.2458333 9.37916667,16.6291667 L5.54583333,20.4625 C5.35416667,20.6541667 5.11458333,20.75 4.875,20.75 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
													<path d="M2,11.8650466 L2,6 C2,4.34314575 3.34314575,3 5,3 L19,3 C20.6568542,3 22,4.34314575 22,6 L22,15 C22,15.0032706 21.9999948,15.0065399 21.9999843,15.009808 L22.0249378,15 L22.0249378,19.5857864 C22.0249378,20.1380712 21.5772226,20.5857864 21.0249378,20.5857864 C20.7597213,20.5857864 20.5053674,20.4804296 20.317831,20.2928932 L18.0249378,18 L12.9835977,18 C12.7263047,14.0909841 9.47412135,11 5.5,11 C4.23590829,11 3.04485894,11.3127315 2,11.8650466 Z M6,7 C5.44771525,7 5,7.44771525 5,8 C5,8.55228475 5.44771525,9 6,9 L15,9 C15.5522847,9 16,8.55228475 16,8 C16,7.44771525 15.5522847,7 15,7 L6,7 Z" fill="#000000" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
									</span>
									<span class="nav-text font-weight-bold">Information</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<!--end::Header-->
				<!--Begin::Body-->
				<div class="card-body px-0">
					<div class="tab-content pt-5">
						<!--begin::Tab Content-->
						<div class="tab-pane active" id="kt_apps_contacts_view_tab_2" role="tabpanel">
							
							<?/*<form class="form" id="student-register-form" enctype="multipart/form-data" method="POST" action="<?= base_url('student/submit_registration')?>">*/?>

							<?php echo form_open_multipart('student/submit_registration');?>
								<!--begin::Heading-->
								<div class="row">
									<div class="col-lg-9 col-xl-6 offset-xl-3">
										<h3 class="font-size-h6 mb-5">Student Info:</h3>
									</div>
								</div>
								<!--end::Heading-->
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 text-right col-form-label">* Photo</label>
									<div class="col-lg-9 col-xl-9">
										<div class="image-input image-input-outline image-input-circle" id="kt_user_avatar" style="background-image: url(assets/media/users/blank.png)">
											<div class="image-input-wrapper" style="background-image: url(assets/media/svg/avatars/007-boy-2.svg)"></div>
											<label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
												<i class="fa fa-pen icon-sm text-muted"></i>
												<input type="file" name="profile_avatar" accept=".png, .jpg, .jpeg" />
												<!-- <input type="file" name="profile_avatar_remove" /> -->
											</label>
											<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
												<i class="ki ki-bold-close icon-xs text-muted"></i>
											</span>
											<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar">
												<i class="ki ki-bold-close icon-xs text-muted"></i>
											</span>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 text-right col-form-label">* Name</label>
									<div class="col-lg-9 col-xl-6">
										<input class="form-control form-control-lg" type="text" name="name" value="<?= $users['name']?>" />
									</div>
								</div>
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 text-right col-form-label">* Form</label>
									<div class="col-lg-9 col-xl-6">
										<!-- <input class="form-control form-control-lg" type="number" name="form" /> -->
										<select name="form" class="form-control form-control-lg">
												<option value="">Please Select</option>
												<option value="1">Form 1</option>
												<option value="2">Form 2</option>
												<option value="3">Form 3</option>
												<option value="4">Form 4</option>
												<option value="5">Form 5</option>
												<option value="7">SK RENDAH</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 text-right col-form-label">* School Name</label>
									<div class="col-lg-9 col-xl-6">
										<input class="form-control form-control-lg" type="text" name="school_name" />
									</div>
								</div>
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 text-right col-form-label">* School Address</label>
									<div class="col-lg-9 col-xl-6">
										<textarea class="form-control" name="school_address"></textarea>
									</div>
								</div>
								<div class="separator separator-dashed my-10"></div>
								<!--begin::Heading-->
								<div class="row">
									<div class="col-lg-9 col-xl-6 offset-xl-3">
										<h3 class="font-size-h6 mb-5">Contact Info:</h3>
									</div>
								</div>
								<!--end::Heading-->
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 text-right col-form-label">* Phone</label>
									<div class="col-lg-9 col-xl-6">
										<div class="input-group input-group-lg">
											<div class="input-group-prepend">
												<span class="input-group-text">
													<i class="la la-phone"></i>
												</span>
											</div>
											<input type="text" class="form-control form-control-lg" name="phone_no" placeholder="Phone" />
										</div>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 text-right col-form-label">* Email Address</label>
									<div class="col-lg-9 col-xl-6">
										<div class="input-group input-group-lg">
											<div class="input-group-prepend">
												<span class="input-group-text">
													<i class="la la-at"></i>
												</span>
											</div>
											<input type="text" class="form-control form-control-lg" name="email" value="<?= $users['email']?>" placeholder="Email" />
										</div>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 text-right col-form-label">* Address</label>
									<div class="col-lg-9 col-xl-6">
										<textarea class="form-control" name="address"></textarea>
									</div>
								</div>
								<div class="separator separator-dashed my-10"></div>
								<!--begin::Heading-->
								<div class="row">
									<div class="col-lg-9 col-xl-6 offset-xl-3">
										<h3 class="font-size-h6 mb-5">Guardian Info:</h3>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 text-right col-form-label">* Name</label>
									<div class="col-lg-9 col-xl-6">
										<input class="form-control form-control-lg" type="text" name="guardian_name⁠" />
									</div>
								</div>
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 text-right col-form-label">* Phone</label>
									<div class="col-lg-9 col-xl-6">
										<div class="input-group input-group-lg">
											<div class="input-group-prepend">
												<span class="input-group-text">
													<i class="la la-phone"></i>
												</span>
											</div> 
											<input type="text" class="form-control form-control-lg" name="guardian_phone" placeholder="Phone" />
										</div>
									</div>
								</div>
								<div class="separator separator-dashed my-10"></div>
								<!--begin::Heading-->
								<div class="row">
									<div class="col-lg-9 col-xl-6 offset-xl-3">
										<h3 class="font-size-h6 mb-5">Supporting Document:</h3>
									</div>
								</div>
								<!--end::Heading-->
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 text-right col-form-label">Copy of Indentity Card</label>
									<div class="col-lg-9 col-xl-6">
										<a href="#" class="btn btn-sm btn-primary upload-stud-doc">Upload File</a>
										<div id="load-nric-doc">
											<? if($nric_doc): ?>
												<div class="alert alert-secondary mt-2" role="alert">
												    <a href="#" class="alert-link"><?= $nric_doc['original_filename']?></a>
												    <? if($nric_doc['is_submit'] == 0){ ?>
													    <a href="#" class="close delete-stud-doc" data-init="<?= $nric_doc['id']?>"><i class="ki ki-close icon-nm"></i></a>
													<? } ?>
												</div>
											<? endif; ?>
										</div>
									</div>
								</div>

								<div class="d-flex justify-content-center border-top pt-10 mt-15">
									<div class="mr-8">
										<a href="<?= base_url()?>" class="btn btn-warning font-weight-bolder px-9 py-4">Cancel</a>
									</div>
									<div class="mr-8">
										<button type="submit" class="btn btn-success font-weight-bolder px-9 py-4">Submit</button>
									</div>
								</div>

							</form>
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
	<!--end::Education-->
</div>