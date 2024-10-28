<script src="<?= base_url(); ?>assets/js/pages/custom/education/student/profile.js"></script>
<script src="<?= base_url(); ?>assets/js/pages/features/miscellaneous/sweetalert2.js"></script>
<script src="<?= base_url(); ?>assets/js/pages/crud/forms/widgets/select2.js"></script>
<script src="<?= base_url(); ?>assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
<script src="<?= base_url(); ?>assets/js/pages/features/calendar/basic.js"></script>

<div class="modal fade" id="modal-upload-doc" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true"></div>

<div class="modal fade" id="modal_form_details" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true"></div>

<script type="text/javascript">

	var table = $('#mystudent-list-datatable');

	table.DataTable({
		responsive: true,
		pagingType: 'full_numbers',
	});

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

	$(document).on('click', '.upload-tutor-doc', function(e){
        e.preventDefault();

        $.ajax({
            url: base_url + 'upload/check_resume_document',
            type: "POST",
            async: true,
            dataType:"json",
            success: function( response ){
                if (response.status == false) {
                	iziToast.error({
		                // title: 'Warning',
		                message: "Maximun 1 file only are allowed for upload",
		                transitionIn: 'bounceInLeft',
		                position: 'topCenter',
		            });
                } else {
                    $.ajax({
                    	url: base_url + 'upload/upload_resume',
                        type: "POST",
                        data: {module:"RESUME"},
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

	$(document).on('click', '.delete-tutor-doc', function(e){
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
                	url: base_url + 'upload/delete_resume',
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
                    	$("#load-resume-doc").html('');
                    },
                    error: function(data){
                        // console.log(data);
                    },
                });
	        }
	    }); 
    });

    $(document).on('click', '.upload-student-material', function(e){
        e.preventDefault();

        $.ajax({
        	url: base_url + 'upload/upload_student_material',
            type: "POST",
            async: true,
            success: function( response ){
                $('#modal-upload-doc').html(response);
                $('#modal-upload-doc').modal('show');
            },
            error: function(data){
                // console.log(data);
            },
        });
    });

    $(document).on('click', '.view-student-details', function(e){
        
        e.preventDefault();

        var student_id = $(this).data('init');

        $.ajax({
        	url: base_url + 'tutor/view_student_details',
            type: "POST",
            async: true,
            data:{student_id:student_id},
            success: function( response ){
                $('#modal_form_details').html(response);
                $('#modal_form_details').modal('show');
            },
            error: function(data){
                // console.log(data);
            },
        });
    });

    function act_online_class(id)
	{   
	    // Get the checkbox element
	    const checkbox = document.getElementById('online-check-'+id);

	    var class_type = '';
	  
	    // Check if the checkbox is checked or not
	    if (checkbox.checked) {
	        class_type = '1';
	        
	    } else {
	        class_type = '0';
	       
	    }

	    if (class_type == 1) {
	    		
	    	$.ajax({
	        	url: base_url + 'tutor/modal_online_class',
	            type: "POST",
	            async: true,
	            data:{id:id},
	            success: function( response ){
	                $('#modal_form_details').html(response);
	                $('#modal_form_details').modal('show');
	            },
	            error: function(data){
	                // console.log(data);
	            },
	        });

	    } else {
	    	Swal.fire({
	        title: "Are you sure?",
	        text: "Change this class to physical class",
	        icon: "warning",
	        showCancelButton: true,
	        confirmButtonText: "Yes, Confirm"
	    }).then(function(result) {

	        	if (result.value) {
	           
		            $.ajax({
		                url: base_url + 'tutor/proceed_offline_class',
		                type: "POST",
		                data: {id:id},
		                async: true,
		                dataType:"json",
		                success: function( response ){
		                    if (response.status == true) {
		                        Swal.fire({
		                            text: "Successfullyy update",
		                            icon: "success",
		                            buttonsStyling: !1,
		                            confirmButtonText: "Ok, got it!",
		                            customClass: {
		                                confirmButton: "btn btn-primary"
		                            }
		                        }).then((function(t) {
		                            if (t.isConfirmed) {
		                                // $("#modal_student_regform").modal('hide');
		                                location.reload();
		                            }
		                        }))
		                    } else {
		                        Swal.fire({
		                            text: response.msg,
		                            icon: "error",
		                            buttonsStyling: !1,
		                            confirmButtonText: "Ok, got it!",
		                            customClass: {
		                                confirmButton: "btn btn-primary"
		                            }
		                        })
		                    }
		                },
		                error: function(data){
		                    // console.log(data);
		                },
		            });
		        } else {
		        	location.reload();
		        }
		    });

	    }
	}

	$(document).on('click', '.save-class-link', function(e){

	    e.preventDefault();

	    var form_data = $("#class-online-form-data").serialize();

	    Swal.fire({
	        title: "Are you sure?",
	        // text: "This will be send to student",
	        icon: "warning",
	        showCancelButton: true,
	        confirmButtonText: "Yes, Confirm"
	    }).then(function(result) {
	        if (result.value) {
	           
	            $.ajax({
	                url: base_url + 'tutor/proceed_online_class',
	                type: "POST",
	                data: form_data,
	                async: true,
	                dataType:"json",
	                success: function( response ){
	                    if (response.status == true) {
	                        Swal.fire({
	                            text: "Successfullyy created",
	                            icon: "success",
	                            buttonsStyling: !1,
	                            confirmButtonText: "Ok, got it!",
	                            customClass: {
	                                confirmButton: "btn btn-primary"
	                            }
	                        }).then((function(t) {
	                            if (t.isConfirmed) {
	                                // $("#modal_student_regform").modal('hide');
	                                location.reload();
	                            }
	                        }))
	                    } else {
	                        Swal.fire({
	                            text: response.msg,
	                            icon: "error",
	                            buttonsStyling: !1,
	                            confirmButtonText: "Ok, got it!",
	                            customClass: {
	                                confirmButton: "btn btn-primary"
	                            }
	                        })
	                    }
	                },
	                error: function(data){
	                    // console.log(data);
	                },
	            });
	        }
	    });
	});

	$(document).on('click', '.close-checkbox-online', function(e){

	    e.preventDefault();

	    $("#modal_form_details").modal('hide');
	    location.reload();

	});

	$(document).on('click', '.delete-material', function(e){
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
                	url: base_url + 'upload/delete_material',
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
				            location.reload();
                    	}
                    	
                    },
                    error: function(data){
                        // console.log(data);
                    },
                });
	        }
	    }); 
    });
    

    $(document).on('click', '.edit-material', function(e){
        
        e.preventDefault();

        var id = $(this).data('init');

        $.ajax({
        	url: base_url + 'tutor/edit_material_modal',
            type: "POST",
            async: true,
            data:{id:id},
            success: function( response ){
                $('#modal_form_details').html(response);
                $('#modal_form_details').modal('show');
            },
            error: function(data){
                // console.log(data);
            },
        });
    });

    $(document).on('click', '.btn-add-homework', function(e){
        
        e.preventDefault();

        var form_desc = '';
        var form = $(this).data('form');
        var class_id = $(this).data('classid');
        var subject_id = $(this).data('subjectid');

        // if (form == '1') {
        // 	form_desc = 'Form 1';
        // } else if (form == '2') {
        // 	form_desc = 'Form 2';
        // } else if (form == '3') {
        // 	form_desc = 'Form 2';
        // } else if (form == '4') {
        // 	form_desc = 'Form 2';
        // } else if (form == '5') {
        // 	form_desc = 'Form 2';
        // } else if (form == '7') {
        // 	form_desc = 'Sekolah Rendah';
        // }

        // Swal.fire({
	    //     title: "Are you sure?",
	    //     text: "Create Homework For Student "+form_desc,
	    //     icon: "warning",
	    //     showCancelButton: true,
	    //     confirmButtonText: "Yes!"
	    // }).then(function(result) {
	    //     if (result.value) {
	           
	    //         $.ajax({
        //         	url: base_url + 'upload/delete_material',
        //             type: "POST",
        //             data: {id:id},
        //             async: true,
        //             dataType:"json",
        //             success: function( response ){
        //             	console.log(response);
        //             	if (response.status == true) {
		// 	                Swal.fire(
		// 		                "Deleted!",
		// 		                "Your file has been deleted.",
		// 		                "success"
		// 		            )
		// 		            location.reload();
        //             	}
                    	
        //             },
        //             error: function(data){
        //                 // console.log(data);
        //             },
        //         });
	    //     }
	    // }); 

        $.ajax({
        	url: base_url + 'tutor/modal_create_homework',
            type: "POST",
            async: true,
            data:{form:form,class_id:class_id,subject_id:subject_id},
            success: function( response ){
                $('#modal_form_details').html(response);
                $('#modal_form_details').modal('show');
            },
            error: function(data){
                // console.log(data);
            },
        });
    });

    $(document).on('click', '.add-homework', function(e){
        
        e.preventDefault();

        var form_data = $("#add-homework-form").serialize();

        $.ajax({
        	url: base_url + 'tutor/add_new_homework',
            type: "POST",
            async: true,
            data:form_data,
            dataType:"json",
            success: function( response ){
                if (response.status == true) {
                    Swal.fire({
                        text: "Successfullyy created",
                        icon: "success",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    }).then((function(t) {
                        if (t.isConfirmed) {
                            // $("#modal_student_regform").modal('hide');
                            location.reload();
                        }
                    }))
                } else {
                    Swal.fire({
                        text: response.msg,
                        icon: "error",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    })
                }
            },
            error: function(data){
                // console.log(data);
            },
        });
    });

    $(document).on('click', '.view-student-homework-detail', function(e){
        
        e.preventDefault();

        var id = $(this).data('init');

        $.ajax({
        	url: base_url + 'tutor/view_student_homework_details',
            type: "POST",
            async: true,
            data:{id:id},
            success: function( response ){
                $('#modal_form_details').html(response);
                $('#modal_form_details').modal('show');
            },
            error: function(data){
                // console.log(data);
            },
        });
    });

    
    $(document).on('click', '.btn-make-attendence', function(e){
        
        e.preventDefault();

        var id = $(this).data('init');
        var action = $(this).data('action');

        if (action == '2') {
        	iziToast.info({
	            title: 'Warning',
	            message: "This class not start yet",
	            transitionIn: 'bounceInLeft',
	            position: 'topCenter',
	        });
	        return false;
        }

        $.ajax({
        	url: base_url + 'tutor/make_attendence_modal',
            type: "POST",
            async: true,
            data:{id:id},
            success: function( response ){
                $('#modal_form_details').html(response);
                $('#modal_form_details').modal('show');
            },
            error: function(data){
                // console.log(data);
            },
        });
    });


    function act_attend_class(id)
	{   
	    // Get the checkbox element
	    const checkbox = document.getElementById('attend-check-'+id);

	    var attend = '';
	  
	    // Check if the checkbox is checked or not
	    if (checkbox.checked) {
	        attend = '1';
	        
	    } else {
	        attend = '0';
	    }

	    $.ajax({
	        url: base_url + 'tutor/update_attendence',
	        type: "POST",
	        data:{attend:attend,id:id},
	        async: true,
	        dataType:"json",
	        success: function( response ){
	            if (response.status == true) {
	                // location.reload();
	                iziToast.success({
	                    // title: 'success',
	                    message: "Data Successfully Saved !",
	                    transitionIn: 'bounceInLeft',
	                    position: 'topCenter',
	                });
	            }
	            
	        },
	        error: function(data){
	            // console.log(data);
	        },
	    });


	}

</script>
