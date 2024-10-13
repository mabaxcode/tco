<div class="container">
	<!--begin::Card-->
	<div class="card card-custom gutter-b">
		<div class="card-body">
			<!--begin::Details-->
			<div class="d-flex mb-9">
				<!--begin: Pic-->
				<div class="flex-shrink-0 mr-7 mt-lg-0 mt-3">
					<div class="symbol symbol-50 symbol-lg-120">
						<? if($users['complete_register'] == 2): ?>
						<img src="<?= view_profile_picture($picture_data)?>" alt="image" />
						<? else: ?>
						<img src="assets/media/users/blank.png" alt="image" />
						<? endif; ?>
					</div>
					<div class="symbol symbol-50 symbol-lg-120 symbol-primary d-none">
						<span class="font-size-h3 symbol-label font-weight-boldest">JM</span>
					</div>
				</div>
				<!--end::Pic-->
				<!--begin::Info-->
				<div class="flex-grow-1">
					<!--begin::Title-->
					<div class="d-flex justify-content-between flex-wrap mt-1">
						<div class="d-flex mr-3">
							<a href="#" class="text-dark-75 text-hover-primary font-size-h5 font-weight-bold mr-3"><?= $users['name']?></a>
						</div>
						<? if($users['complete_register'] == 0): ?>
						<div class="my-lg-0 my-3">
							<a href="<?= base_url('student/registration'); ?>" class="btn btn-sm btn-danger font-weight-bolder text-uppercase">complete registration</a>
						</div>
						<? endif; ?>
					</div>
					<!--end::Title-->
					<!--begin::Content-->
					<div class="d-flex flex-wrap justify-content-between mt-1">
						<div class="d-flex flex-column flex-grow-1 pr-8">
							<div class="d-flex flex-wrap mb-4">
								<a href="#" class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
								<i class="flaticon2-new-email mr-2 font-size-lg"></i><?= $users['email']?></a>
								<a href="#" class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
								<i class="flaticon2-calendar-3 mr-2 font-size-lg"></i>
									<?
										switch ($users['user_type']) {
											case '1': echo "Tutor"; break;
											case '2': echo "Student"; break;
											case '4': echo "Admin"; break;
											default : echo "Not Found User Type"; break;
										}
									?>
								</a>
							</div>
							<? if($users['complete_register'] == 0){ ?>
							<!-- Pending approval -->
							<span class="font-weight-bold text-dark-50">Your student registration is <font color='red'><b>NOT COMPLETE</b></font> yet.</span>
							<span class="font-weight-bold text-dark-50">Please complete your student registration by click button <font color="blue"><b>COMPLETE REGISTRATION</b></font> to apply any Tuition Course</span>
							<? } elseif ($users['complete_register'] == 1) { ?>
							<span class="font-weight-bold text-dark-50">Your registration currently under the <font color="blue"><b>APPROVAL PROCESS</b></font></span>
							<? } ?>
						</div>
					</div>
					<!--end::Content-->
				</div>
				<!--end::Info-->
			</div>
			<!--end::Details-->
			<div class="separator separator-solid"></div>
		</div>
	</div>
	<!--end::Card-->
</div>