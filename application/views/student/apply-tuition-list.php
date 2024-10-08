<div class="container">
	<div class="card card-custom">
		<div class="card-header flex-wrap py-5">
			<div class="card-title">
				<h3 class="card-label">Your Application List</h3>
			</div>
			<div class="card-toolbar">
				<!--begin::Button-->
				<? if($pending_app == false): ?>
				<a href="#" class="btn btn-primary font-weight-bolder apply-new-tuition">
				<span class="svg-icon svg-icon-md">
					<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
							<rect x="0" y="0" width="24" height="24" />
							<circle fill="#000000" cx="9" cy="15" r="6" />
							<path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
						</g>
					</svg>
					<!--end::Svg Icon-->
				</span>Apply New</a>
				<? endif; ?>
				<!--end::Button-->
			</div>
		</div>
		<div class="card-body">
			<? if($tuition_apps): ?>
				<!--begin: Datatable-->
				<table class="table table-separate table-head-custom table-checkable" id="apply-tuition-datatable">
					<thead>
						<tr>
							<th>No.</th>
							<th>Tuition ID</th>
							<th>Selected Subject</th>
							<th>Total Amount (RM)</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<? $no =1; ?>
							<? foreach ($tuition_apps as $key) { ?>
							<tr>
								<td><?= $no++;?></td>
								<td><?= $key['tuition_id']?></td>
								<td>
									

									<?	$subject_arr = explode("|",$key['subjects']);
										foreach ($subject_arr as $val => $value) {
											$ref_subject = get_any_table_row(array('code' => $value), 'ref_subject');
											?>
												<strong> <?= $ref_subject['descs']?> &nbsp; </strong> <br>
											<?
										}
									?>
								</td>
								<td>RM<?= $key['total']?></td>
								<td><span class="label label-warning label-pill label-inline mr-2"><?= $key['stage']?></span></td>
								<td nowrap="nowrap">
									<a href="#" class="btn btn-sm btn-primary font-weight-bolder text-uppercase edit-subject-payment" data-init="<?= $key['tuition_id']?>">Edit</a>
									<a href="#" class="btn btn-sm btn-warning font-weight-bolder text-uppercase pay-tuition" data-init="<?= $key['tuition_id']?>">Pay</a>
								</td>
							</tr>
						<? }  ?>
					</tbody>
				</table>
				<!--end: Datatable-->
			<? else: ?>

				<!-- notice -->
				<div class="alert alert-custom alert-notice alert-light-primary fade show" role="alert">
				    <div class="alert-icon"><i class="flaticon-info"></i></div>
				    <div class="alert-text">Note ! You dont have any tuition application yet. To apply Tuition <strong>Click Apply New</strong>.</div>
				</div>

			<? endif; ?>
		</div>
	</div>
</div>