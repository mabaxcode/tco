<div class="container">
	<div class="card card-custom">
		<div class="card-header flex-wrap py-5">
			<div class="card-title">
				<h3 class="card-label">List Of Class</h3>
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
						<th>Class Name</th>
						<!-- <th>Tutor</th> -->
						<!-- <th>Limit</th> -->
						<th style="text-align: right;">Action</th>
					</tr>
				</thead>
				<tbody>
					<? $no =1; ?>
					<? if($class){ ?>
						<? foreach ($class as $key) { ?>
						<tr>
							<td><?= $no++;?></td>
							<td><?= $key['name']?></td>
							<!-- <td>tutir</td> -->
							<!-- <td><?= $key['limit']?></td> -->
							<td align="right">
								<a href="#" class="btn btn-sm btn-primary font-weight-bolder text-uppercase update-class" data-init="<?= $key['id']?>">Class Details</a>
								<!-- <a href="#" class="btn btn-sm btn-primary font-weight-bolder text-uppercase update-class" data-init="<?= $key['id']?>">Edit</a> -->
								<a href="#" class="btn btn-sm btn-danger font-weight-bolder text-uppercase delete-class" data-init="<?= $key['id']?>">Delete</a>
							</td>
						</tr>
						<? } ?>
					<? } else {
							echo "<tr><td colspan='5'><center>No Record</center></td></tr>";
					} ?>
				</tbody>
			</table>
			<!--end: Datatable-->
		</div>
	</div>
</div>