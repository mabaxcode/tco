<div class="container">
	<div class="card card-custom">
		<div class="card-header flex-wrap py-5">
			<div class="card-title">
				<h3 class="card-label">List Of Tutor Application</h3>
			</div>
			<div class="card-toolbar">
				<a href="#" class="btn btn-primary font-weight-bolder add-new-class">
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
				</span>New Class</a>
			</div>
		</div>
		<div class="card-body">
			<!--begin: Datatable-->
			<table class="table table-separate table-head-custom table-checkable" id="student-register-datatable">
				<thead>
					<tr>
						<th>No</th>
						<th>Tutor's Name</th>
						<th>Age</th>
						<th>Phone No.</th>
						<th>Tutor's Class</th>
						<th>Tutor's Subject</th>
						<th>Status</th>
						<th style="text-align: right;">Action</th>
					</tr>
				</thead>
				<tbody>
					<? $no =1; ?>
					<? if($tutors){ ?>
						<? foreach ($tutors as $key) { ?>
						<tr>
							<td><?= $no++;?></td>
							<td><?= strtoupper($key['name']) ?></td>
							<td><?= $key['age']?></td>
							<td><?= $key['phone_no']?></td>
							<td>
								<? if ($key['assign_class'] == '0') { ?>
											<span class="label label-inline font-weight-bold label-danger">Not Assigned</span>
								<? } else { ?>
											<span class="label label-inline font-weight-bold label-info">
												<?= get_class_ref($key['assign_class']);?>
											</span>
								<? } ?>
							</td>
							<td>
								<b><?= get_ref_subject($key['subject']); ?></b>
							</td>
							<td></td>
							<td align="right">
								<a href="#" class="btn btn-sm btn-primary font-weight-bolder text-uppercase view-tutor" data-init="<?= $key['tutor_id']?>">Details</a>
								<a href="#" class="btn btn-sm btn-success font-weight-bolder text-uppercase assign-class" data-init="<?= $key['tutor_id']?>">Assign Class</a>
							</td>
						</tr>
						<? } ?>
					<? } ?>
				</tbody>
			</table>
			<!--end: Datatable-->
		</div>
	</div>
</div>