
<script src="<?= base_url(); ?>assets/js/pages/custom/education/student/profile.js"></script>
<script src="<?= base_url(); ?>assets/js/pages/features/miscellaneous/sweetalert2.js"></script>
<script src="<?= base_url(); ?>assets/js/pages/crud/forms/widgets/select2.js"></script>

<div class="modal fade" id="modal-upload-doc" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true"></div>

<div class="modal fade" id="modal_apply_tuition" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true"></div>

<div class="modal fade" id="modal_apply_tuition" role="dialog" aria-hidden="true"></div>

<script type="text/javascript">

    var table = $('#apply-tuition-datatable');

    table.DataTable({
        responsive: true,
        pagingType: 'full_numbers',
    });

	<?php
	  if ($this->session->flashdata('success_login')) {
	 		?>
	 		
  		  	var msg = '<?php echo $this->session->flashdata('success_login'); ?>';

          	iziToast.success({
                title: 'Success',
                message: msg,
                transitionIn: 'bounceInLeft',
                position: 'topRight',
            });
		  	
	    <?php
	  }
	  ?>

	  <?php
	  if ($this->session->flashdata('error_register')) {
	 		?>
	 		
  		  	var msg = '<?php echo $this->session->flashdata('error_register'); ?>';

          	iziToast.error({
                title: 'Error',
                message: msg,
                transitionIn: 'bounceInLeft',
                position: 'topRight',
            });
		  	
	    <?php
	  }
	  ?>

	  <?php
	  if ($this->session->flashdata('info')) {
	 		?>
	 		
  		  	var msg = '<?php echo $this->session->flashdata('info'); ?>';

          	iziToast.info({
                title: 'Info',
                message: msg,
                transitionIn: 'bounceInLeft',
                position: 'topRight',
            });
		  	
	    <?php
	  }
	  ?>

	$(document).on('click', '.upload-stud-doc', function(e){
        e.preventDefault();

        $.ajax({
            url: base_url + 'upload/check_student_document',
            type: "POST",
            async: true,
            dataType:"json",
            success: function( response ){
                if (response.status == false) {
                	iziToast.error({
		                title: 'Warning',
		                message: "Maximun 1 file only are allowed for upload",
		                transitionIn: 'bounceInLeft',
		                position: 'topRight',
		            });
                } else {
                    $.ajax({
                    	url: base_url + 'upload/upload_single_document',
                        type: "POST",
                        data: {module:"NRIC"},
                        async: true,
                        success: function( response ){
                            $('#modal-upload-doc').html(response);
                            $('#modal-upload-doc').modal('show');
                        },
                        error: function(data){
                            // console.log(data);
                        },
                    });
                }
            },
            error: function(data){
            },
        });  
    });

    $(document).on('click', '.delete-stud-doc', function(e){
        e.preventDefault();

        var id = $(this).data('init');

	    Swal.fire({
	        title: "Are you sure?",
	        text: "This file will be delete",
	        icon: "warning",
	        showCancelButton: true,
	        confirmButtonText: "Yes, delete it!"
	    }).then(function(result) {
	        if (result.value) {
	           
	            $.ajax({
                	url: base_url + 'upload/delete_file',
                    type: "POST",
                    data: {id:id},
                    async: true,
                    dataType:"json",
                    success: function( response ){
                    	console.log(response);
                    	if (response.status == true) {
			                Swal.fire(
				                "Deleted!",
				                "Your file has been deleted.",
				                "success"
				            )
                    	}
                    	$("#load-nric-doc").html('');
                    },
                    error: function(data){
                        // console.log(data);
                    },
                });
	        }
	    }); 
    });

    $(document).on('click', '.apply-new-tuition', function(e){
        e.preventDefault();

        $.ajax({
            url: base_url + 'student/apply_tuition_modal',
            type: "POST",
            async: true,
            success: function( response ){
                $('#modal_apply_tuition').html(response);
                $('#modal_apply_tuition').modal('show');
            },
            error: function(data){
                // console.log(data);
            },
        });
    });

    $(document).on('click', '.edit-subject-payment', function(e){
        e.preventDefault();

        var tuition_id = $(this).data('init');

        $.ajax({
            url: base_url + 'student/edit_tuition_modal',
            type: "POST",
            async: true,
            data:{tuition_id:tuition_id},
            success: function( response ){
                $('#modal_apply_tuition').html(response);
                $('#modal_apply_tuition').modal('show');
            },
            error: function(data){
                // console.log(data);
            },
        });
    });

    $(document).on('click', '.submit-payment-tuition', function(e){
        e.preventDefault();

        var subjects = $("#kt_select_subject").val();

        if (subjects == '') {
            alert ('Please select subject'); return;
        }

        var form_data = $("#subject-form-data").serialize();

        Swal.fire({
            title: "Are you sure want to submit ?",
            text: "This application will be submit to pending payment",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ok, Proceed!"
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    url: base_url + 'student/submit_payment',
                    type: "POST",
                    async: true,
                    data:form_data,
                    dataType:"json",
                    success: function( response ){
                        console.log(response);
                        if (response.status == true) {
                            Swal.fire({
                                text: 'Your tution application has been submit to pending payment',
                                icon: "success",
                                buttonsStyling: !1,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            }).then((function(t) {
                                if (t.isConfirmed) {
                                    //$("#modal_student_regform").modal('hide');
                                    location.reload();
                                }
                            }))

                        } else {
                            Swal.fire(
                                "Error!",
                                "Something wrong",
                                "error"
                            )
                        }
                    },
                    error: function(data){
                        // console.log(data);
                    },
                });
            }
        });
    });

    $(document).on('click', '.update-payment-tuition', function(e){
        e.preventDefault();

        var subjects = $("#kt_select_subject").val();

        if (subjects == '') {
            alert ('Please select subject'); return;
        }

        var form_data = $("#edit-subject-form-data").serialize();

        Swal.fire({
            title: "Are you sure want to save ?",
            // text: "This application will be submit to pending payment",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ok, Proceed!"
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    url: base_url + 'student/do_edit_subject',
                    type: "POST",
                    async: true,
                    data:form_data,
                    dataType:"json",
                    success: function( response ){
                        console.log(response);
                        if (response.status == true) {
                            Swal.fire({
                                text: 'Successfully update',
                                icon: "success",
                                buttonsStyling: !1,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            }).then((function(t) {
                                if (t.isConfirmed) {
                                    //$("#modal_student_regform").modal('hide');
                                    location.reload();
                                }
                            }))

                        } else {
                            Swal.fire(
                                "Error!",
                                "Something wrong",
                                "error"
                            )
                        }
                    },
                    error: function(data){
                        // console.log(data);
                    },
                });
            }
        });
    });

    $(document).on('click', '.pay-tuition', function(e){
        e.preventDefault();

        var tuition_id = $(this).data('init');

        $.ajax({
            url: base_url + 'student/pay_tuition',
            type: "POST",
            async: true,
            data:{tuition_id:tuition_id},
            success: function( response ){
                $('#modal_apply_tuition').html(response);
                $('#modal_apply_tuition').modal('show');
            },
            error: function(data){
                // console.log(data);
            },
        });
    });

</script>