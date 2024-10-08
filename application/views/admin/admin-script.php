
<div class="modal fade" id="modal_student_regform" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true"></div>

<script type="text/javascript">

var table = $('#student-register-datatable');

table.DataTable({
	responsive: true,
	pagingType: 'full_numbers',
});

$(document).on('click', '.process-student-register', function(e){
    e.preventDefault();

    var id = $(this).data('init');
    console.log(id);

    $.ajax({
        url: base_url + 'admin/student_register_form',
        type: "POST",
        data: {id:id},
        async: true,
        success: function( response ){
            $('#modal_student_regform').html(response);
            $('#modal_student_regform').modal('show');
        },
        error: function(data){
            // console.log(data);
        },
    });
});

$(document).on('click', '.proceed-student-register', function(e){
    e.preventDefault();

    var id = $(this).data('init');
    var decision = $("#decision-reg-student").val();
    console.log(id);

    if (decision == '') {
    	$("#required-approval").html('<font color="red">Please select approval</font>');
    	return false;
    }

    Swal.fire({
        title: "Are you sure?",
        text: "This will be send to student",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, Confirm"
    }).then(function(result) {
        if (result.value) {
           
            $.ajax({
		        url: base_url + 'admin/proceed_student_register',
		        type: "POST",
		        data: {id:id,decision:decision},
		        async: true,
		        dataType:"json",
		        success: function( response ){
		        	if (response.status == true) {
                        Swal.fire({
                            text: response.msg,
                            icon: "success",
                            buttonsStyling: !1,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        }).then((function(t) {
                            if (t.isConfirmed) {
                                $("#modal_student_regform").modal('hide');
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

</script>
