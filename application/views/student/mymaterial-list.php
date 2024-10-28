<div class="container">
	<div class="card card-custom">
		<div class="card-header flex-wrap py-5">
			<div class="card-title">
				<h3 class="card-label">List Of Material</h3>
			</div>
		</div>
		<div class="card-body">
			<!--begin: Datatable-->
			<? if($student_material){ ?>
			<table class="table table-separate table-head-custom table-checkable">
				<thead class="thead-light">
					<tr>
						<th>No</th>
						<th>File</th>
						<th>Download</th>
					</tr>
				</thead>
				<tbody>
					<? $no =1; ?>
					
						<? foreach ($student_material as $key) { ?>
						<tr>
							<td><?= $no++;?></td>
							<td><?= $key['original_filename']?></td>
							<td>
								
								<?
								$path = base_url ($key['path'] . "/" . $key['filename']);
								?>
								<a href="<?= $path; ?>" target="_BLANK" class="btn btn-sm btn-primary">Download</a>
							</td>
						</tr>
						<? } ?>
					
				</tbody>
			</table>
			<? }else {
				echo "No Record Found";
			} ?>
			<!--end: Datatable-->
		</div>
	</div>
</div>