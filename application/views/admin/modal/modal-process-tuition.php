<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Review Application</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i aria-hidden="true" class="ki ki-close"></i>
            </button>
        </div>
        <div class="modal-body">
            <div data-scroll="true" data-height="300">
            	<div class="card-body">
	  				<h6 class="font-weight-bolder mb-3">Details:</h6>
					<div class="text-dark-50 line-height-lg">
						<div><?= strtoupper($student_data['name']); ?></div>
						<div><a href="#"><?= $student_data['email']?></a></div>
						<div><?= $student_data['phone_no']?></div>
					</div>
					<div class="separator separator-dashed my-5"></div>
					<!--end::Section-->
					<!--begin::Section-->
					<!-- <h6 class="font-weight-bolder mb-3">Subject Details:</h6> -->
					<div class="text-dark-50 line-height-lg">
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th class="pl-0 font-weight-bold text-muted text-uppercase">Subject</th>
										<th class="text-right font-weight-bold text-muted text-uppercase"></th>
										<th class="text-right font-weight-bold text-muted text-uppercase"></th>
										<th class="text-right pr-0 font-weight-bold text-muted text-uppercase">Amount</th>
									</tr>
								</thead>
								<tbody>

									<? 

									$subject_arr = explode("|",$tuition_data['subjects']);
									foreach ($subject_arr as $val => $value) {
										$ref_subject = get_any_table_row(array('code' => $value), 'ref_subject');
										?>
											<tr class="font-weight-boldest">
												<td class="border-0 pl-0 pt-7 d-flex align-items-center"><?= $ref_subject['descs']?></td>
												<td class="text-right pt-7 align-middle"></td>
												<td class="text-right pt-7 align-middle"></td>
												<td class="text-primary pr-0 pt-7 text-right align-middle">RM<?= $ref_subject['price']?></td>
											</tr>
										<?
									}

									?>
									<tr>
										<td colspan="2" class="border-0 pt-0"></td>
										<td class="border-0 pt-0 font-weight-bolder font-size-h5 text-right">Grand Total</td>
										<td class="border-0 pt-0 font-weight-bolder font-size-h5 text-success text-right pr-0">
											RM<?= $tuition_data['total']?></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="separator separator-dashed my-5"></div>
					<!--end::Section-->
					<!--begin::Section-->
					<h6 class="font-weight-bolder mb-1">Proof Of Payment:</h6>
					<div class="text-dark-50 line-height-lg">
						
						<? if($receipt_doc): ?>
							<div class="alert alert-secondary mt-2" role="alert">
							    <a href="#" class="alert-link"><?= $receipt_doc['original_filename']?></a>
							</div>
						<? endif; ?>

						
						<div class="form-group row">
						    <label class="col-4 col-form-label"><b>Verified Payment Receipt</b></label>
					  		<div class="col-8">
						   		<span class="switch switch-outline switch-icon switch-danger">
						    	<label>
						    	<?
						    		if ($tuition_data['verified_paid'] == '1') {
						    			$check = "checked";
						    		} else {
						    			$check = '';
						    		}
						    	?>
						     	<input type="checkbox" id="verify-check" <?= $check?> value="1" onchange="act_verify_payment('<?= $tuition_data['tuition_id']?>');" />
						     	<span></span>
						    	</label>
						   		</span>
						  	</div>
						</div>
					</div>
	  			</div>
            <div>
        </div>
        <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="button" class="btn btn-primary mr-2 proceed-class-management" data-init="<?= $tuition_data['tuition_id']?>">Scheduling and Class Management</button>
		</div>
    </div>
</div>
