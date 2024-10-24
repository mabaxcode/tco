<div class="container">
	<!--begin::Todo Files-->
	<div class="d-flex flex-row">
		<!--begin::List-->
		
		<div class="d-flex flex-column flex-grow-1">
			<!--begin::Head-->
			<div class="card card-custom gutter-b">
				<!--begin::Body-->
				<div class="card-body d-flex align-items-center justify-content-between flex-wrap py-3">
					<!--begin::Info-->
					<div class="d-flex align-items-center mr-2 py-2">
						<!--begin::Title-->
						<h3 class="font-weight-bold mb-0 mr-10"><?= $subject_name ?></h3>
						<!--end::Title-->
						<!--begin::Navigation-->
						<?/*
						<div class="d-flex mr-3">
							<!--begin::Navi-->
							<div class="navi navi-hover navi-active navi-link-rounded navi-bold d-flex flex-row">
								<!--begin::Item-->
								<div class="navi-item mr-2">
									<a href="custom/apps/todo/tasks.html" class="navi-link">
										<span class="navi-text">Tasks</span>
									</a>
								</div>
								<!--end::Item-->
								<!--begin::Item-->
								<div class="navi-item mr-2">
									<a href="custom/apps/todo/docs.html" class="navi-link">
										<span class="navi-text">Docs</span>
									</a>
								</div>
								<!--end::Item-->
								<!--begin::Item-->
								<div class="navi-item mr-2">
									<a href="custom/apps/todo/files.html" class="navi-link active">
										<span class="navi-text">Files</span>
									</a>
								</div>
								<!--end::Item-->
							</div>
							<!--end::Navi-->
							<!--begin::Dropdown-->
							<div class="dropdown">
								<a href="#" class="btn btn-clean btn-icon" data-toggle="dropdown">
									<i class="ki ki-bold-more-hor font-size-md"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
									<!--begin::Navigation-->
									<ul class="navi navi-hover py-5">
										<li class="navi-item">
											<a href="#" class="navi-link">
												<span class="navi-icon">
													<i class="flaticon2-drop"></i>
												</span>
												<span class="navi-text">New Group</span>
											</a>
										</li>
										<li class="navi-item">
											<a href="#" class="navi-link">
												<span class="navi-icon">
													<i class="flaticon2-list-3"></i>
												</span>
												<span class="navi-text">Contacts</span>
											</a>
										</li>
										<li class="navi-item">
											<a href="#" class="navi-link">
												<span class="navi-icon">
													<i class="flaticon2-rocket-1"></i>
												</span>
												<span class="navi-text">Groups</span>
												<span class="navi-link-badge">
													<span class="label label-light-primary label-inline font-weight-bold">new</span>
												</span>
											</a>
										</li>
										<li class="navi-item">
											<a href="#" class="navi-link">
												<span class="navi-icon">
													<i class="flaticon2-bell-2"></i>
												</span>
												<span class="navi-text">Calls</span>
											</a>
										</li>
										<li class="navi-item">
											<a href="#" class="navi-link">
												<span class="navi-icon">
													<i class="flaticon2-gear"></i>
												</span>
												<span class="navi-text">Settings</span>
											</a>
										</li>
										<li class="navi-separator my-3"></li>
										<li class="navi-item">
											<a href="#" class="navi-link">
												<span class="navi-icon">
													<i class="flaticon2-magnifier-tool"></i>
												</span>
												<span class="navi-text">Help</span>
											</a>
										</li>
										<li class="navi-item">
											<a href="#" class="navi-link">
												<span class="navi-icon">
													<i class="flaticon2-bell-2"></i>
												</span>
												<span class="navi-text">Privacy</span>
												<span class="navi-link-badge">
													<span class="label label-light-danger label-rounded font-weight-bold">5</span>
												</span>
											</a>
										</li>
									</ul>
									<!--end::Navigation-->
								</div>
							</div>
							<!--end::Dropdown-->
						</div>
						*/?>
						<!--end::Navigation-->
					</div>
					<!--end::Info-->
					<!--begin::Users-->
					<div class="symbol-group symbol-hover py-2">
						<div class="mr-6">
							<span class="label label-inline font-weight-bold label-warning"><?= $total?> Files</span>
						</div>
						
						<div>
							<a href="" class="btn btn-light-primary font-weight-bolder btn-sm upload-student-material">Upload</a>
						</div>
					</div>
					<?/*
					<div class="symbol-group symbol-hover py-2">
						<div class="symbol symbol-30" data-toggle="tooltip" data-placement="top" title="Alice Stone">
							<img alt="Pic" src="assets/media/users/300_19.jpg" />
						</div>
						<div class="symbol symbol-30" data-toggle="tooltip" data-placement="top" title="Anna Krox">
							<img alt="Pic" src="assets/media/users/300_21.jpg" />
						</div>
						<div class="symbol symbol-30" data-toggle="tooltip" data-placement="top" title="Nick Nilson">
							<img alt="Pic" src="assets/media/users/300_22.jpg" />
						</div>
						<div class="symbol symbol-30" data-toggle="tooltip" data-placement="top" title="Ana Tor">
							<img alt="Pic" src="assets/media/users/300_23.jpg" />
						</div>
						<div class="symbol symbol-30 symbol-light-primary" data-toggle="tooltip" data-placement="top" title="New user" role="button">
							<span class="symbol-label font-weight-bold">
								<i class="fa flaticon2-plus font-size-sm"></i>
							</span>
						</div>
					</div>
					*/?>
					<!--end::Users-->
				</div>
				<!--end::Body-->
			</div>
			<!--end::Head-->
			<!--begin::Row-->
			<div class="row">
				<!--begin::Col-->
				<? foreach ($materials as $key => $value) { ?>
				<?

				$ext = pathinfo($value['original_filename'], PATHINFO_EXTENSION);

				switch ($ext) {
					case 'pdf':
						$icon_file = "assets/media/svg/files/pdf.svg";
						break;

					case 'doc':
						$icon_file = "assets/media/svg/files/doc.svg";
						break;

					case 'docx':
						$icon_file = "assets/media/svg/files/doc.svg";
						break;

					case 'xls':
						$icon_file = "assets/media/svg/files/csv.svg";
						break;

					case 'xlsx':
						$icon_file = "assets/media/svg/files/csv.svg";
						break;
					
					default:
						$icon_file = "assets/media/svg/files/doc.svg";
						break;
				}

				
				?>
				<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
					<!--begin::Card-->
					<div class="card card-custom gutter-b card-stretch">
						<div class="card-header border-0">
							<h3 class="card-title"></h3>
							<div class="card-toolbar">
								<a href="#" class="navi-link delete-material" data-init="<?= $value['id']?>">
									<span class="navi-icon">
										<i class="flaticon2-trash text-danger"></i>
									</span>
								</a>
								<?/*
								<div class="dropdown dropdown-inline" data-toggle="tooltip" title="Quick actions" data-placement="left">
									<a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="ki ki-bold-more-hor"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
										<!--begin::Navigation-->
										<ul class="navi navi-hover py-5">
											
											<li class="navi-item">
												<a href="#" class="navi-link edit-material" data-init="<?= $value['id']?>">
													<span class="navi-icon">
														<i class="flaticon2-list-3 text-info"></i>
													</span>
													<span class="navi-text">Edit Filename</span>
												</a>
											</li>
											
											<li class="navi-item">
												<a href="#" class="navi-link delete-material" data-init="<?= $value['id']?>">
													<span class="navi-icon">
														<i class="flaticon2-trash text-danger"></i>
													</span>
													<span class="navi-text">Delete</span>
												</a>
											</li>
										</ul>
										<!--end::Navigation-->
									</div>
								</div>
								*/?>
							</div>
						</div>
						<div class="card-body">
							<div class="d-flex flex-column align-items-center">
								<!--begin: Icon-->
								<img alt="" class="max-h-65px" src="<?= base_url($icon_file); ?>" />
								<!--end: Icon-->
								<!--begin: Tite-->
								
						    	<? $path = base_url ($value['path'] . "/" . $value['filename']); ?>
						    		

								<a href="<?= $path; ?>" target="_BLANK" class="text-dark-75 font-weight-bold mt-15 font-size-lg"><?= $value['original_filename']?></a>
								<!--end: Tite-->
							</div>
						</div>
					</div>
					<!--end:: Card-->
				</div>
				<? } ?>
				<!--end::Col-->
			</div>
			<!--end::Row-->
		</div>
			
		<!--end::List-->
	</div>
	<!--end::Todo Files-->
</div>