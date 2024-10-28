
<!-- Modal-->
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Upload Document</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i aria-hidden="true" class="ki ki-close"></i>
            </button>
        </div>
        <div class="modal-body">
            <div class="col-lg-12 col-md-9 col-sm-12">
                <div class="dropzone dropzone-default dropzone-primary" id="kt_dropzone_1">
                    <div class="dropzone-msg dz-message needsclick">
                        <h3 class="dropzone-msg-title">Drop files here or click to upload.</h3>
                        <span class="dropzone-msg-desc">Only PDF, DOC, DOCX, and Excel files is allowed</span>
                    </div>
                </div>
                <div id="error-upload" style="color: red;"></div>
            </div>
        </div>
        <input type="hidden" id="homework_id" value="<?= $homework_id?>">
        <div class="modal-footer">
            <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
        </div>
    
    </div>
</div>

<script type="text/javascript">

const homework_id = $("#homework_id").val();

var myDropzone = new Dropzone("#kt_dropzone_1", {
    url: base_url + 'upload/do_upload_student_homework',
    paramName: "file", 
    maxFiles: 1,
    maxFilesize: 10,
    addRemoveLinks: true,
    acceptedFiles: "application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
    params: {homework_id:homework_id},
    init: function () {
        this.on("success", function (file, response) {
            response = JSON.parse(response);
            if (response.status == true) {
                iziToast.success({
                    title: 'Success',
                    message: response.msg,
                    transitionIn: 'bounceInLeft',
                    position: 'topRight',
                });
                location.reload();
                // pop the document
                // $("#load-nric-doc").html(response.document);
                // $("#modal-upload-doc").modal('hide');
            } else {
                $("#error-upload").html(response.msg);
            }
        })

    }
});

</script>
