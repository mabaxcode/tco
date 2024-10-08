<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
        parent::__construct();
        $this->load->model('Admin_model', 'DbAdmin');

        if ( !$this->session->userdata('user_id') ) {
        	redirect();
        }

        $this->user_id = $this->session->userdata('user_id');
        
	}

	public function index($data=false)
	{	
		$data['add_script']   = 'admin/admin-script';
		$data['page_title']   = 'Dashboard';
		$data['users']        = get_any_table_row(array('id' => $this->user_id), 'users');
		$data['picture_data'] = get_any_table_row(array('user_id' => $this->user_id), 'profile_picture');
        $data['content']      = 'admin/admin-content';

		$this->load->view('admin/admin-dashboard', $data);
	}

    function student_registration($data=false)
    {
        $data['content']     = 'admin/student-register-list';
        $data['add_script']  = 'admin/admin-script';
        $data['page_title']  = 'Student Registration';

        $data['users']       = get_any_table_row(array('id' => $this->user_id), 'users');

        $data['students']    = get_any_table_array(array('approved' => '0'), 'student_information');

        // echo "<pre>"; print_r($data['students']); echo "</pre>"; exit();

        // $data['nric_doc']    = get_any_table_row(array('student_id' => $this->user_id), 'student_document');

        $this->load->view('admin/admin-dashboard', $data);
    }

    function student_register_form($data=false)
    {
        $id = $this->input->post('id');
        // echo "<pre>"; print_r($post); echo "</pre>";
        $data['student_data'] = get_any_table_row(array('id' => $id), 'student_information');
        $data['student_doc']  = get_any_table_row(array('student_id' => $data['student_data']['student_id']), 'student_document');
 
        $this->load->view('admin/modal/modal-process-student-reg', $data);
    }

    function proceed_student_register($data=false)
    {
        $post = $this->input->post();
        // echo "<pre>"; print_r($post); echo "</pre>"; exit;

        $id = $post['id'];
        $decision = $post['decision'];

        # update complete register to = 2;
        $complete_register = update_any_table(array('complete_register' => '2'), array('id' => $id), 'users');

        if ($complete_register == true) {
            # update approval decision
            $approval = update_any_table(array('approved' => $decision), array('student_id' => $id), 'student_information');

            if ($approval == true) {
                $response = array('status' => true, 'msg' => 'Student Registration Completed' );
            } else {
                $response = array('status' => false, 'msg' => 'Failed to update approval decision' );
            }

        } else {
            $response = array('status' => false, 'msg' => 'Failed update complete register' );
        }

        echo encode($response);

    }
}
