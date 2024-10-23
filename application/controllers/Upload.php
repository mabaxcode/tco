<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

        function __construct()
        {
                parent::__construct();
                $this->load->model('Upload_model', 'DbUpload');

                if ( !$this->session->userdata('user_id') ) {
                        redirect();
                }

                $this->user_id = $this->session->userdata('user_id');
        }

        public function check_student_document()
        {       
                # only one doc allowed
                $check_doc_exist = $this->DbUpload->student_document_exist($this->user_id, "NRIC");

                if ($check_doc_exist == true) {
                        $response = array('status' => false );
                } else {
                        $response = array('status' => true );
                }

                echo encode($response);
        }

        public function check_resume_document()
        {       
                # only one doc allowed
                $check_doc_exist = $this->DbUpload->tutor_document_exist($this->user_id, "RESUME");

                if ($check_doc_exist == true) {
                        $response = array('status' => false );
                } else {
                        $response = array('status' => true );
                }

                echo encode($response);
        }

        public function check_receipt_document($data=false)
        {       

                $tuition_id = $this->input->post('tuition_id');

                # only one doc allowed
                $check_doc_exist = $this->DbUpload->tuition_receipt_exist($tuition_id, "PAY_RECEIPT");

                if ($check_doc_exist == true) {
                        $response = array('status' => false );
                } else {
                        $response = array('status' => true );
                }

                echo encode($response);
        }

        function upload_single_document($data=false)
        {       
                $post = $this->input->post();

                $data['user_id'] = $this->user_id;
                $data['module']  = $post['module'];

                $this->load->view('upload/modal-upload-single-document', $data);
        }

        function upload_resume($data=false)
        {       
                $post = $this->input->post();

                $data['user_id'] = $this->user_id;
                $data['module']  = $post['module'];

                $this->load->view('upload/modal-upload-resume', $data);
        }

        function upload_receipt_document($data=false)
        {       
                $post = $this->input->post();

                $data['user_id']     = $this->user_id;
                $data['module']      = $post['module'];
                $data['tuition_id']  = $post['tuition_id'];

                $this->load->view('upload/modal-upload-receipt-document', $data);
        }

        function do_upload_student_doc($data=false)
        {       
                $post = $this->input->post();
                

                // echo "<pre>"; print_r($_FILES['file']); echo "</pre>"; exit();


                if(!empty($_FILES['file']['name'])){
                        
                        $ext                            = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                        $hashfilename                   = getRandomString('20') . "." . $ext;
                        $config['upload_path']          = './uploads/student-document';
                        $config['allowed_types']        = 'pdf';
                        $config['max_size']             = 9999;
                        $config['file_name']            = $hashfilename;

                        $this->load->library('upload', $config);

                        $status = true;
                        if ( ! $this->upload->do_upload('file'))
                        {
                                $error      = array('error' => $this->upload->display_errors());
                                $status     = false;
                                $error_msg  = $error['error'];
                        }
                        else
                        {       
                                # insert success upload
                                $data_insert = array(
                                        'student_id' => $this->user_id, 
                                        'module' => $post['module_name'],
                                        'path' => $config['upload_path'],
                                        'create_dt' => current_dt(),
                                        'filename' => $hashfilename,
                                        'original_filename' => $_FILES['file']['name']
                                );

                                $insert = insert_any_table($data_insert, 'student_document');

                        }

                } else {
                        $status = false;
                        $error_msg = 'File not found';
                }

                if ($status == true) {
                        $getback_document = get_any_table_row(array('student_id' => $this->user_id), 'student_document');

                        # create html view
                        $document = '<div class="alert alert-secondary mt-2" role="alert"><a href="#" class="alert-link">'.$getback_document['original_filename'].'</a><a href="#" class="close delete-stud-doc" data-init="'.$getback_document['id'].'"><i class="ki ki-close icon-nm"></i></a></div>';

                        $response = array('status' => true, 'msg' => 'File successfully uploaded', 'document' => $document);
                } else {
                        $response = array('status' => false, 'msg' => $error_msg );
                }

                
                echo  encode($response);
        }

        function do_upload_resume($data=false)
        {       
                $post = $this->input->post();
                

                // echo "<pre>"; print_r($_FILES['file']); echo "</pre>"; exit();


                if(!empty($_FILES['file']['name'])){
                        
                        $ext                            = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                        $hashfilename                   = getRandomString('20') . "." . $ext;
                        $config['upload_path']          = './uploads/tutor-document';
                        $config['allowed_types']        = 'pdf';
                        $config['max_size']             = 9999;
                        $config['file_name']            = $hashfilename;

                        $this->load->library('upload', $config);

                        $status = true;
                        if ( ! $this->upload->do_upload('file'))
                        {
                                $error      = array('error' => $this->upload->display_errors());
                                $status     = false;
                                $error_msg  = $error['error'];
                        }
                        else
                        {       
                                # insert success upload
                                $data_insert = array(
                                        'tutor_id' => $this->user_id, 
                                        'module' => $post['module_name'],
                                        'path' => $config['upload_path'],
                                        'create_dt' => current_dt(),
                                        'filename' => $hashfilename,
                                        'original_filename' => $_FILES['file']['name']
                                );

                                $insert = insert_any_table($data_insert, 'tutor_document');

                        }

                } else {
                        $status = false;
                        $error_msg = 'File not found';
                }

                if ($status == true) {
                        $getback_document = get_any_table_row(array('tutor_id' => $this->user_id), 'tutor_document');

                        # create html view
                        $document = '<div class="alert alert-secondary mt-2" role="alert"><a href="#" class="alert-link">'.$getback_document['original_filename'].'</a><a href="#" class="close delete-stud-doc" data-init="'.$getback_document['id'].'"><i class="ki ki-close icon-nm"></i></a></div>';

                        $response = array('status' => true, 'msg' => 'File successfully uploaded', 'document' => $document);
                } else {
                        $response = array('status' => false, 'msg' => $error_msg );
                }

                
                echo  encode($response);
        }

        function delete_file($data=false)
        {
                $post = $this->input->post();
                // echo "<pre>";print_r($post); echo "</pre>";
                $delete = delete_any_table(array('id' => $post['id']), 'student_document');

                if ($delete == true) {
                        $response = array('status' => true, 'msg' => 'File successfully delete');
                } else {
                        $response = array('status' => false, 'msg' => 'Error on deleting file');
                }
                
                echo encode($response);
        }

        function delete_resume($data=false)
        {
                $post = $this->input->post();
                // echo "<pre>";print_r($post); echo "</pre>";
                $delete = delete_any_table(array('id' => $post['id']), 'tutor_document');

                if ($delete == true) {
                        $response = array('status' => true, 'msg' => 'File successfully delete');
                } else {
                        $response = array('status' => false, 'msg' => 'Error on deleting file');
                }
                
                echo encode($response);
        }

        function do_upload_receipt_doc($data=false)
        {       
                $post = $this->input->post();
                

                // echo "<pre>"; print_r($_FILES['file']); echo "</pre>"; exit();


                if(!empty($_FILES['file']['name'])){
                        
                        $ext                            = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                        $hashfilename                   = getRandomString('20') . "." . $ext;
                        $config['upload_path']          = './uploads/receipt';
                        $config['allowed_types']        = 'pdf';
                        $config['max_size']             = 9999;
                        $config['file_name']            = $hashfilename;

                        $this->load->library('upload', $config);

                        $status = true;
                        if ( ! $this->upload->do_upload('file'))
                        {
                                $error      = array('error' => $this->upload->display_errors());
                                $status     = false;
                                $error_msg  = $error['error'];
                        }
                        else
                        {       
                                # insert success upload
                                $data_insert = array(
                                        'student_id' => $this->user_id, 
                                        'tuition_id' => $post['tuition_id'],
                                        'module' => "PAY_RECEIPT",
                                        'path' => $config['upload_path'],
                                        'create_dt' => current_dt(),
                                        'filename' => $hashfilename,
                                        'original_filename' => $_FILES['file']['name']
                                );

                                $insert = insert_any_table($data_insert, 'student_document');

                        }

                } else {
                        $status = false;
                        $error_msg = 'File not found';
                }

                if ($status == true) {
                        $getback_document = get_any_table_row(array('student_id' => $this->user_id, 'tuition_id' => $post['tuition_id'], 'module' => 'PAY_RECEIPT'), 'student_document');

                        # create html view
                        $document = '<div class="alert alert-secondary mt-2" role="alert"><a href="#" class="alert-link">'.$getback_document['original_filename'].'</a><a href="#" class="close delete-receipt-doc" data-init="'.$getback_document['id'].'"><i class="ki ki-close icon-nm"></i></a></div>';

                        $response = array('status' => true, 'msg' => 'File successfully uploaded', 'document' => $document);
                } else {
                        $response = array('status' => false, 'msg' => $error_msg );
                }

                
                echo  encode($response);
        }

        function upload_student_material($data=false)
        {   
            $this->load->view('upload/modal-upload-material', $data);
        }

        function do_upload_material($data=false)
        {       
                $post = $this->input->post();
                

                // echo "<pre>"; print_r($_FILES['file']); echo "</pre>"; exit();

                $tutor = get_any_table_row(array('tutor_id' => $this->user_id), 'tutor');
                //$class     = get_any_table_array(array('tutor_id' => $this->user_id, 'class_id' => $data['class_taken']['assign_class']), 'student_class');


                if(!empty($_FILES['file']['name'])){
                        
                        $ext                            = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                        $hashfilename                   = getRandomString('20') . "." . $ext;
                        $config['upload_path']          = './uploads/student-material';
                        $config['allowed_types']        = 'pdf|doc|docx|xls|xlsx';
                        $config['max_size']             = 9999;
                        $config['file_name']            = $hashfilename;

                        $this->load->library('upload', $config);

                        $status = true;
                        if ( ! $this->upload->do_upload('file'))
                        {
                                $error      = array('error' => $this->upload->display_errors());
                                $status     = false;
                                $error_msg  = $error['error'];
                        }
                        else
                        {       
                                # insert success upload
                                $data_insert = array(
                                        'tutor_id' => $this->user_id, 
                                        'class_id' => $tutor['assign_class'],
                                        'path' => $config['upload_path'],
                                        'subject_id' => $tutor['subject'],
                                        'filename' => $hashfilename,
                                        'original_filename' => $_FILES['file']['name']
                                );

                                $insert = insert_any_table($data_insert, 'student_material');

                        }

                } else {
                        $status = false;
                        $error_msg = 'File not found';
                }

                if ($status == true) {
                        $response = array('status' => true, 'msg' => 'File successfully uploaded');
                } else {
                        $response = array('status' => false, 'msg' => $error_msg );
                }
                echo  encode($response);
        }
}       

