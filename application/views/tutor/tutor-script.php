<script src="<?= base_url(); ?>assets/js/pages/custom/education/student/profile.js"></script>
<script src="<?= base_url(); ?>assets/js/pages/features/miscellaneous/sweetalert2.js"></script>
<script src="<?= base_url(); ?>assets/js/pages/crud/forms/widgets/select2.js"></script>

<div class="modal fade" id="modal-upload-doc" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true"></div>

<script type="text/javascript">
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

</script>
