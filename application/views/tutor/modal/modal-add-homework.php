
<!-- Modal-->
<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Create New Homework</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i aria-hidden="true" class="ki ki-close"></i>
            </button>
        </div>
        <div class="modal-body">
        <form id="add-homework-form">
             <div class="form-group">
            <label><b>Homework Name </b><span class="text-danger">*</span></label>
            <input type="text" name="name" class="form-control"  />
            <!-- <span class="form-text text-muted">This link will share to your students.</span> -->
           </div>
           <div class="form-group">
            <label><b>Justification </b></label>
            <textarea class="form-control" name="remark" rows="4"></textarea>
            <span class="form-text text-muted">Optional</span>
           </div>
            <div class="col-lg-12 col-md-9 col-sm-12">
                <div class="dropzone dropzone-default dropzone-primary" id="kt_dropzone_homework">
                    <div class="dropzone-msg dz-message needsclick">
                        <h3 class="dropzone-msg-title">Drop files here or click to upload.</h3>
                        <span class="dropzone-msg-desc">Only PDF, DOC, DOCX, and Excel files is allowed</span>
                    </div>
                </div>
                <div id="error-upload" style="color: red;"></div>
            </div>

            <input type="hidden" id="class_id" name="class_id" value="<?= $class_id?>">
        <input type="hidden" id="subject_id" name="subject_id" value="<?= $subject_id?>">
        <input type="hidden" id="form" name="form" value="<?= $form?>">
        <input type="hidden" id="temp_key" name="temp_key" value="<?= $temp_key?>">

        </div>
        
    </form>
        <div class="modal-footer">
            <button type="button" class="btn btn-warning font-weight-bold" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary font-weight-bold add-homework">Submit</button>
        </div>
    
    </div>
</div>

<script type="text/javascript">

var class_id = $("#class_id").val();
var subject_id = $("#subject_id").val();
var form = $("#form").val();
var temp_key = $("#temp_key").val();

var myDropzone = new Dropzone("#kt_dropzone_homework", {
    url: base_url + 'upload/do_upload_homework',
    paramName: "file", 
    maxFiles: 1,
    maxFilesize: 10,
    addRemoveLinks: true,
    // acceptedFiles: "application/pdf",
    acceptedFiles: "application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
    params: {class_id:class_id,subject_id:subject_id,form:form,temp_key:temp_key},
    init: function () {
        this.on("success", function (file, response) {
            response = JSON.parse(response);
            if (response.status == true) {
                Swal.fire(
                    "Success!",
                    response.msg,
                    "success"
                )
                // pop the document
                $("#load-homework-doc").html(response.document);
                // $("#modal_upload_receipt").modal('hide');
            } else {
                $("#error-upload").html(response.msg);
            }
        })

    }
});

</script>
