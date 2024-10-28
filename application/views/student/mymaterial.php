<div class="container">
	<!--begin::Todo Files-->
	<div class="d-flex flex-row">
		<!--begin::List-->
		
		<div class="d-flex flex-column flex-grow-1">

			<!--begin::Row-->
			<div class="row">
				<!--begin::Col-->
				<? foreach ($all_subject as $key => $value) { ?>
				<?

				// $ext = pathinfo($value['original_filename'], PATHINFO_EXTENSION);

				// switch ($ext) {
				// 	case 'pdf':
				// 		$icon_file = "assets/media/svg/files/pdf.svg";
				// 		break;

				// 	case 'doc':
				// 		$icon_file = "assets/media/svg/files/doc.svg";
				// 		break;

				// 	case 'docx':
				// 		$icon_file = "assets/media/svg/files/doc.svg";
				// 		break;

				// 	case 'xls':
				// 		$icon_file = "assets/media/svg/files/csv.svg";
				// 		break;

				// 	case 'xlsx':
				// 		$icon_file = "assets/media/svg/files/csv.svg";
				// 		break;
					
				// 	default:
						//$icon_file = "assets/media/svg/files/doc.svg";
				// 		break;
				// }

				
				?>
				<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
					<!--begin::Card-->
					<div class="card card-custom gutter-b card-stretch">
						<div class="card-body">
							<div class="d-flex flex-column align-items-center">
								<!--begin: Icon-->
								<img alt="" class="max-h-65px" src="<?= base_url('assets/media/svg/files/folder.svg'); ?>" />
								<!--end: Icon-->
								<!--begin: Tite-->
								
						    	<? //$path = base_url ($value['path'] . "/" . $value['filename']); ?>
						    		

								<a href="<?= base_url('student/subject_material/' . $value['code']); ?>" class="text-dark-75 font-weight-bold mt-7 font-size-lg"><?= $value['descs']?></a>
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