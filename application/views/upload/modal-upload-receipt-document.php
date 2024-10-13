
<!-- Modal-->
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Upload Payment Receipt</h5>
            <button type="button" class="close" onclick="$('#modal_upload_receipt').modal('hide');">
                <i aria-hidden="true" class="ki ki-close"></i>
            </button>
        </div>
        <div class="modal-body">
            <div class="col-lg-12 col-md-9 col-sm-12">
                <div class="dropzone dropzone-default dropzone-primary" id="kt_dropzone_receipt">
                    <div class="dropzone-msg dz-message needsclick">
                        <h3 class="dropzone-msg-title">Drop files here or click to upload.</h3>
                        <span class="dropzone-msg-desc">Only PDF File is allowed</span>
                    </div>
                </div>
                <div id="error-upload" style="color: red;"></div>
            </div>
        </div>
        <input type="hidden" id="user-id" value="<?= $user_id?>">
        <input type="hidden" id="module-name" value="<?= $module?>">
        <input type="hidden" id="tuition-id" value="<?= $tuition_id?>">
        <div class="modal-footer">
            <button type="button" class="btn btn-light-primary font-weight-bold" onclick="$('#modal_upload_receipt').modal('hide');">Close</button>
            <!-- <button type="button" class="btn btn-primary font-weight-bold">Upload</button> -->
        </div>
    
    </div>
</div>

<script type="text/javascript">

var tuition_id = $("#tuition-id").val();

var myDropzone = new Dropzone("#kt_dropzone_receipt", {
    url: base_url + 'upload/do_upload_receipt_doc',
    paramName: "file", 
    maxFiles: 1,
    maxFilesize: 10,
    addRemoveLinks: true,
    acceptedFiles: "application/pdf",
    params: {tuition_id:tuition_id},
    init: function () {
        this.on("success", function (file, response) {
            response = JSON.parse(response);
            if (response.status == true) {
                // iziToast.success({
                //     title: 'Success',
                //     message: response.msg,
                //     transitionIn: 'bounceInLeft',
                //     position: 'topRight',
                // });
                Swal.fire(
                    "Success!",
                    response.msg,
                    "success"
                )
                // pop the document
                $("#load-receipt-doc").html(response.document);
                $("#modal_upload_receipt").modal('hide');
            } else {
                $("#error-upload").html(response.msg);
            }
        })

    }
});

</script>
