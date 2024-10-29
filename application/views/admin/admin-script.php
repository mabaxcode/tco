
<div class="modal fade" id="modal_student_regform" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true"></div>

<script src="<?= base_url(); ?>/assets/js/pages/features/charts/apexcharts.js"></script>

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

$(document).on('click', '.process-tutor-app', function(e){
    e.preventDefault();

    var id = $(this).data('init');
    console.log(id);

    $.ajax({
        url: base_url + 'admin/tutor_application_form',
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

$(document).on('click', '.view-tutor', function(e){
    e.preventDefault();

    var id = $(this).data('init');
    console.log(id);

    $.ajax({
        url: base_url + 'admin/view_tutor_application',
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

$(document).on('click', '.proceed-tutor-app', function(e){
    e.preventDefault();

    var id = $(this).data('init');
    var decision = $("#decision-reg-tutor").val();
    console.log(id);

    if (decision == '') {
        $("#required-approval-tutor").html('<font color="red">Please select approval</font>');
        return false;
    }

    Swal.fire({
        title: "Are you sure?",
        text: "This will be send to Tutor",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, Confirm"
    }).then(function(result) {
        if (result.value) {
           
            $.ajax({
                url: base_url + 'admin/proceed_tutor_application',
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

$(document).on('click', '.process-tuition-app', function(e){
    e.preventDefault();

    var tuition_id = $(this).data('init');
    // console.log(id);

    $.ajax({
        url: base_url + 'admin/process_tuition_modal',
        type: "POST",
        data: {tuition_id:tuition_id},
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

$(document).on('click', '.proceed-class-management', function(e){
    e.preventDefault();

    var tuition_id = $(this).data('init');
    // console.log(id);

    $.ajax({
        url: base_url + 'admin/check_payment_verify',
        type: "POST",
        data: {tuition_id:tuition_id},
        async: true,
        dataType:"json",
        success: function( response ){

            console.log(response);

            if (response.status == false) {
                Swal.fire({
                    text: "Please verify payment first",
                    icon: "error",
                    buttonsStyling: !1,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                })
            } else {

                // $.ajax({
                //     url: base_url + 'admin/proceed_to_class_management',
                //     type: "POST",
                //     data: {tuition_id:tuition_id},
                //     async: true,
                //     success: function( response ){
                //         if (response.status == true) {

                //         }
                //     },
                //     error: function(data){
                //         // console.log(data);
                //     },
                // });

                Swal.fire({
                    title: "Are you sure?",
                    text: "This will be route to Scheduling",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, Confirm"
                }).then(function(result) {
                    if (result.value) {


                        $.ajax({
                            url: base_url + 'admin/proceed_to_class_management',
                            type: "POST",
                            data: {tuition_id:tuition_id},
                            async: true,
                            dataType:"json",
                            success: function( response ){
                                if (response.status == true) {
                                    if (response.status == true) {
                                        Swal.fire({
                                            text: "Application has been route to Scheduling",
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
                                }
                            },
                            error: function(data){
                                // console.log(data);
                            },
                        });
                    }
                });

            }
        },
        error: function(data){
            // console.log(data);
        },
    });
});

function act_verify_payment(tuition_id)
{   

    // Get the checkbox element
    const checkbox = document.getElementById('verify-check');
    var verify_val = '';
  
    // Check if the checkbox is checked or not
    if (checkbox.checked) {
        verify_val = '1';
    } else {
        verify_val = '0';
    }

    $.ajax({
        url: base_url + 'admin/save_verify_payment',
        type: "POST",
        data: {tuition_id:tuition_id,verify_val:verify_val},
        async: true,
        dataType:"json",
        success: function( response ){
            iziToast.success({
                // title: 'success',
                message: "Data Saved !",
                transitionIn: 'bounceInLeft',
                position: 'topCenter',
            });
        },
        error: function(data){
            // console.log(data);
        },
    });
}

$(document).on('click', '.add-new-tutor', function(e){
    e.preventDefault();

    $.ajax({
        url: base_url + 'admin/add_new_tutor_modal',
        type: "POST",
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

$(document).on('click', '.proceed-add-tutor', function(e){
    e.preventDefault();

    $.ajax({
        url: base_url + 'admin/save_new_tutor',
        type: "POST",
        async: true,
        dataType:"json",
        success: function( response ){
            console.log(response);
            if (response.is_fill == false) {

                iziToast.error({
                    // title: 'success',
                    message: "Please fill all the required field",
                    transitionIn: 'bounceInLeft',
                    position: 'topCenter',
                });

            } else {

            }
        },
        error: function(data){
            // console.log(data);
        },
    });
});

$(document).on('click', '.add-new-class', function(e){
    e.preventDefault();

    // alert ('ss');
    console.log('test');

    $.ajax({
        url: base_url + 'admin/add_new_class_modal',
        type: "POST",
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

$(document).on('click', '.update-class', function(e){
    e.preventDefault();

    var id = $(this).data('init');

    $.ajax({
        url: base_url + 'admin/update_class_modal',
        type: "POST",
        async: true,
        data:{id:id},
        success: function( response ){
            $('#modal_student_regform').html(response);
            $('#modal_student_regform').modal('show');
        },
        error: function(data){
            // console.log(data);
        },
    });
});

$(document).on('click', '.do-update-class', function(e){
    e.preventDefault();

    var form_clssupdate = $("#update-class-form-data").serialize();

    $.ajax({
        url: base_url + 'admin/do_update_class',
        type: "POST",
        async: true,
        data:form_clssupdate,
        dataType:"json",
        success: function( response ){
            if (response.status == true) {
                Swal.fire({
                    text: "Class Updated !",
                    icon: "success",
                    buttonsStyling: !1,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                }).then((function(t) {
                    if (t.isConfirmed) {
                        location.reload();
                    }
                }))
            } else {
                iziToast.error({
                    // title: 'success',
                    message: "Please insert class name",
                    transitionIn: 'bounceInLeft',
                    position: 'topCenter',
                });
                return;
            }
        },
        error: function(data){
            // console.log(data);
        },
    });
});

$(document).on('click', '.submit-new-class', function(e){
    e.preventDefault();

    var form_data = $("#class-form-data").serialize();

    $.ajax({
        url: base_url + 'admin/save_new_class',
        type: "POST",
        data: form_data,
        async: true,
        dataType:"json",
        success: function( response ){

            if (response.status == false) {
                iziToast.error({
                    // title: 'success',
                    message: "Please insert class name",
                    transitionIn: 'bounceInLeft',
                    position: 'topCenter',
                });
                return;
            } else {
                // iziToast.success({
                //     // title: 'success',
                //     message: "Class Saved !",
                //     transitionIn: 'bounceInLeft',
                //     position: 'topCenter',
                // });
                // location.reload();
                Swal.fire({
                    text: "Class Saved !",
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
            }
        },
        error: function(data){
            // console.log(data);
        },
    });
});

$(document).on('click', '.delete-class', function(e){
    e.preventDefault();

    var id = $(this).data('init');


    Swal.fire({
        title: "Delete this class?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, Confirm"
    }).then(function(result) {
        if (result.value) {
           
            $.ajax({
                url: base_url + 'admin/delete_class',
                type: "POST",
                data:{id:id},
                dataType:"json",
                async: true,
                success: function( response ){
                    if (response.status == true) {

                        Swal.fire({
                            text: "Class Deleted !",
                            icon: "success",
                            buttonsStyling: !1,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        }).then((function(t) {
                            if (t.isConfirmed) {
                                location.reload();
                            }
                        }))

                    } else {
                        iziToast.error({
                            // title: 'success',
                            message: "Error on delete class",
                            transitionIn: 'bounceInLeft',
                            position: 'topCenter',
                        });
                        return;   
                    }
                },
                error: function(data){
                    // console.log(data);
                },
            });
                
        }
    });
});

$(document).on('click', '.assign-class', function(e){
    e.preventDefault();

    var id = $(this).data('init');

    $.ajax({
        url: base_url + 'admin/assign_class_modal',
        type: "POST",
        data:{id:id},
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

$(document).on('click', '.do-assign-class', function(e){
    e.preventDefault();

    var assign_class_data = $("#assign-class-form-data").serialize();

    Swal.fire({
        title: "Are you sure?",
        // text: "This will be send to student",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, Confirm"
    }).then(function(result) {
        if (result.value) {
           
            $.ajax({
                url: base_url + 'admin/proceed_assign_class',
                type: "POST",
                data: assign_class_data,
                async: true,
                dataType:"json",
                success: function( response ){
                    if (response.status == true) {
                        Swal.fire({
                            text: "Class successfullyy assigned",
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

function giving_class(student_id, tutor_id, subject_id)
{   

    var tuition_id = $("#t-id").val();

    $.ajax({
        url: base_url + 'admin/giving_the_class',
        type: "POST",
        data:{student_id:student_id,tutor_id:tutor_id,subject_id:subject_id,tuition_id:tuition_id},
        async: true,
        dataType:"json",
        success: function( response ){
            // $('#load_student_class').html(response.result);
            if (response.status == true) {
                location.reload();
            }
            
        },
        error: function(data){
            // console.log(data);
        },
    });
}

$(document).on('click', '.reset-student-class', function(e){
    e.preventDefault();

    var tuition_id = $(this).data('init');
    var student_id = $(this).data('studentid');

    Swal.fire({
        title: "Are you sure want to reset ?",
        // text: "This will be send to student",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, Confirm"
    }).then(function(result) {
        if (result.value) {
           
            $.ajax({
                url: base_url + 'admin/reset_student_class',
                type: "POST",
                data: {student_id:student_id,tuition_id:tuition_id},
                async: true,
                dataType:"json",
                success: function( response ){
                    if (response.status == true) {
                        Swal.fire({
                            text: "Class successfullyy reset",
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


$(document).on('click', '.set-the-class-slot', function(e){
    e.preventDefault();

    var id = $(this).data('init');

    $.ajax({
        url: base_url + 'admin/set_the_class_slot_modal',
        type: "POST",
        data:{id:id},
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

function set_the_class_slot(time, id)
{
    $.ajax({
        url: base_url + 'admin/set_the_class_time',
        type: "POST",
        data:{time:time,id:id},
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

$(document).on('click', '.generate-timetable', function(e){
    e.preventDefault();

    var tuition_id = $(this).data('init');

    $.ajax({
        url: base_url + 'admin/check_all_slot_is_set',
        type: "POST",
        data:{tuition_id:tuition_id},
        async: true,
        dataType:"json",
        success: function( response ){
            console.log(response);
            if(response.status == false)
            {
                Swal.fire({
                    text: response.msg,
                    icon: "warning",
                    buttonsStyling: !1,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                }).then((function(t) {
                    if (t.isConfirmed) {
                        location.reload();
                    }
                }))
            } else {
                Swal.fire({
                    title: "Are you sure?",
                    // text: "This will be send to student",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, Confirm"
                }).then(function(result) {
                    if (result.value) {
                    
                        $.ajax({
                            url: base_url + 'admin/do_generate_timetable',
                            type: "POST",
                            data: {tuition_id:tuition_id},
                            async: true,
                            dataType:"json",
                            success: function( response ){
                                if (response.status == true) {
                                    Swal.fire({
                                        text: "Timetable successfullyy generate",
                                        icon: "success",
                                        buttonsStyling: !1,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn btn-primary"
                                        }
                                    }).then((function(t) {
                                        if (t.isConfirmed) {
                                            // location.reload();
                                           window.location.href = "<?php echo base_url('admin/scheduling'); ?>";
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
            }
            
        },
        error: function(data){
            // console.log(data);
        },
    });
});

$(document).on('click', '.close-modal-class-slot', function(e){
    e.preventDefault();
    $("#modal_student_regform").modal('hide');
    location.reload();
    // setTimeout(function() {
        
    // }, 3000);
});

$(document).on('click', '.view-class-details', function(e){
    e.preventDefault();

    var id = $(this).data('init');

    $.ajax({
        url: base_url + 'admin/view_class_details',
        type: "POST",
        data:{id:id},
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

$(document).on('click', '.view-attendance-record', function(e){
    e.preventDefault();

    var id = $(this).data('init');

    $.ajax({
        url: base_url + 'admin/view_attendance',
        type: "POST",
        data:{id:id},
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



</script>
