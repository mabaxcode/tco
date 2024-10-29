<div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
	<!--begin::Menu Container-->
	<div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
		<!--begin::Menu Nav-->
		<ul class="menu-nav">
			<li class="menu-item menu-item-active" aria-haspopup="true">
				<a href="<?php echo base_url() ?>" class="menu-link">
					<span class="svg-icon menu-icon">
						<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
						<span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Shield-user.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
						    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						        <rect x="0" y="0" width="24" height="24"/>
						        <path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" fill="#000000" opacity="0.3"/>
						        <path d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z" fill="#000000" opacity="0.3"/>
						        <path d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z" fill="#000000" opacity="0.3"/>
						    </g>
						</svg><!--end::Svg Icon--></span>
						<!--end::Svg Icon-->
					</span>
					<span class="menu-text">Student</span>
				</a>
			</li>
			<li class="menu-section">
				<h4 class="menu-text">Menu</h4>
				<i class="menu-icon ki ki-bold-more-hor icon-md"></i>
			</li>
			<?/*
			<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
				<a href="javascript:;" class="menu-link menu-toggle">
					<span class="svg-icon menu-icon">
						<!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<rect x="0" y="0" width="24" height="24" />
								<rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
								<path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3" />
							</g>
						</svg>
						<!--end::Svg Icon-->
					</span>
					<span class="menu-text">Application</span>
					<i class="menu-arrow"></i>
				</a>
				<div class="menu-submenu">
					<i class="menu-arrow"></i>
					<ul class="menu-subnav">
						<li class="menu-item" aria-haspopup="true">
							<a href="<?= base_url('student/apply_course')?>" class="menu-link">
								<i class="menu-bullet menu-bullet-dot">
									<span></span>
								</i>
								<span class="menu-text">Apply Tuition Course</span>
							</a>
						</li>
						<li class="menu-item" aria-haspopup="true">
							<a href="<?= base_url('student/apply_status')?>" class="menu-link">
								<i class="menu-bullet menu-bullet-dot">
									<span></span>
								</i>
								<span class="menu-text">Status Application</span>
							</a>
						</li>
					</ul>
				</div>
			</li>
			*/?>
			<? if($users['complete_register'] == 2){ ?>
			<li class="menu-item" aria-haspopup="true">
				<a href="<?= base_url('student/apply_course')?>" class="menu-link">
						<span class="svg-icon menu-icon"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo1\dist/../src/media/svg/icons\Files\File.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
					    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
					        <polygon points="0 0 24 0 24 24 0 24"/>
					        <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
					        <rect fill="#000000" x="6" y="11" width="9" height="2" rx="1"/>
					        <rect fill="#000000" x="6" y="15" width="5" height="2" rx="1"/>
					    </g>
					</svg><!--end::Svg Icon--></span>
					<span class="menu-text">Apply Tuition</span>
				</a>
			</li>
			<?/*
			<li class="menu-item" aria-haspopup="true">
				<a target="_blank" href="https://preview.keenthemes.com/metronic/demo1/builder.html" class="menu-link">
					<span class="svg-icon menu-icon"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo1\dist/../src/media/svg/icons\Devices\Display3.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
					    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
					        <rect x="0" y="0" width="24" height="24"/>
					        <polygon fill="#000000" opacity="0.3" points="5 7 5 15 19 15 19 7"/>
					        <path d="M11,19 L11,16 C11,15.4477153 11.4477153,15 12,15 C12.5522847,15 13,15.4477153 13,16 L13,19 L14.5,19 C14.7761424,19 15,19.2238576 15,19.5 C15,19.7761424 14.7761424,20 14.5,20 L9.5,20 C9.22385763,20 9,19.7761424 9,19.5 C9,19.2238576 9.22385763,19 9.5,19 L11,19 Z" fill="#000000" opacity="0.3"/>
					        <path d="M5,7 L5,15 L19,15 L19,7 L5,7 Z M5.25,5 L18.75,5 C19.9926407,5 21,5.8954305 21,7 L21,15 C21,16.1045695 19.9926407,17 18.75,17 L5.25,17 C4.00735931,17 3,16.1045695 3,15 L3,7 C3,5.8954305 4.00735931,5 5.25,5 Z" fill="#000000" fill-rule="nonzero"/>
					    </g>
					</svg><!--end::Svg Icon--></span>
					<span class="menu-text">My CLass</span>
				</a>
			</li>
			*/?>
			<li class="menu-item" aria-haspopup="true">
				<a href="<?= base_url('student/myhomework'); ?>" class="menu-link">
					<span class="svg-icon menu-icon"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo1\dist/../src/media/svg/icons\Clothes\Briefcase.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
				    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
				        <rect x="0" y="0" width="24" height="24"/>
				        <path d="M5.84026576,8 L18.1597342,8 C19.1999115,8 20.0664437,8.79732479 20.1528258,9.83390904 L20.8194924,17.833909 C20.9112219,18.9346631 20.0932459,19.901362 18.9924919,19.9930915 C18.9372479,19.9976952 18.8818364,20 18.8264009,20 L5.1735991,20 C4.0690296,20 3.1735991,19.1045695 3.1735991,18 C3.1735991,17.9445645 3.17590391,17.889153 3.18050758,17.833909 L3.84717425,9.83390904 C3.93355627,8.79732479 4.80008849,8 5.84026576,8 Z M10.5,10 C10.2238576,10 10,10.2238576 10,10.5 L10,11.5 C10,11.7761424 10.2238576,12 10.5,12 L13.5,12 C13.7761424,12 14,11.7761424 14,11.5 L14,10.5 C14,10.2238576 13.7761424,10 13.5,10 L10.5,10 Z" fill="#000000"/>
				        <path d="M10,8 L8,8 L8,7 C8,5.34314575 9.34314575,4 11,4 L13,4 C14.6568542,4 16,5.34314575 16,7 L16,8 L14,8 L14,7 C14,6.44771525 13.5522847,6 13,6 L11,6 C10.4477153,6 10,6.44771525 10,7 L10,8 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
				    </g>
				</svg><!--end::Svg Icon--></span>

					<span class="menu-text">My Homework</span>
				</a>
			</li>
			<li class="menu-item" aria-haspopup="true">
				<a href="<?= base_url('student/mymaterial'); ?>" class="menu-link">
					<span class="svg-icon menu-icon"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo1\dist/../src/media/svg/icons\Files\Uploaded-file.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
				    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
				        <polygon points="0 0 24 0 24 24 0 24"/>
				        <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
				        <path d="M8.95128003,13.8153448 L10.9077535,13.8153448 L10.9077535,15.8230161 C10.9077535,16.0991584 11.1316112,16.3230161 11.4077535,16.3230161 L12.4310522,16.3230161 C12.7071946,16.3230161 12.9310522,16.0991584 12.9310522,15.8230161 L12.9310522,13.8153448 L14.8875257,13.8153448 C15.1636681,13.8153448 15.3875257,13.5914871 15.3875257,13.3153448 C15.3875257,13.1970331 15.345572,13.0825545 15.2691225,12.9922598 L12.3009997,9.48659872 C12.1225648,9.27584861 11.8070681,9.24965194 11.596318,9.42808682 C11.5752308,9.44594059 11.5556598,9.46551156 11.5378061,9.48659872 L8.56968321,12.9922598 C8.39124833,13.2030099 8.417445,13.5185067 8.62819511,13.6969416 C8.71848979,13.773391 8.8329684,13.8153448 8.95128003,13.8153448 Z" fill="#000000"/>
				    </g>
				</svg><!--end::Svg Icon--></span>
					<span class="menu-text">Student Material</span>
				</a>
			</li>
			<?/*
			<li class="menu-item" aria-haspopup="true">
				<a target="_blank" href="https://preview.keenthemes.com/metronic/demo1/builder.html" class="menu-link">
					<span class="svg-icon menu-icon">
						<!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<rect x="0" y="0" width="24" height="24" />
								<path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000" />
								<rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)" x="16.3255682" y="2.94551858" width="3" height="18" rx="1" />
							</g>
						</svg>
						<!--end::Svg Icon-->
					</span>
					<span class="menu-text">My Quiz</span>
				</a>
			</li>
			*/?>
			<? } ?>
			<?/*
			<li class="menu-section">
				<h4 class="menu-text">APPLICATION</h4>
				<i class="menu-icon ki ki-bold-more-hor icon-md"></i>
			</li>
			<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
				<a href="javascript:;" class="menu-link menu-toggle">
					<span class="svg-icon menu-icon">
						<!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<rect x="0" y="0" width="24" height="24" />
								<rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
								<path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3" />
							</g>
						</svg>
						<!--end::Svg Icon-->
					</span>
					<span class="menu-text">Application</span>
					<i class="menu-arrow"></i>
				</a>
				<div class="menu-submenu">
					<i class="menu-arrow"></i>
					<ul class="menu-subnav">
						<li class="menu-item" aria-haspopup="true">
							<a href="<?= base_url('student/apply_course')?>" class="menu-link">
								<i class="menu-bullet menu-bullet-dot">
									<span></span>
								</i>
								<span class="menu-text">Apply Tuition Course</span>
							</a>
						</li>
						<li class="menu-item" aria-haspopup="true">
							<a href="#" class="menu-link">
								<i class="menu-bullet menu-bullet-dot">
									<span></span>
								</i>
								<span class="menu-text">Status Application</span>
							</a>
						</li>
					</ul>
				</div>
			</li>
			*/?>
		</ul>
		<!--end::Menu Nav-->
	</div>
	<!--end::Menu Container-->
</div>