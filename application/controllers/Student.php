<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

	function __construct()
	{
        parent::__construct();
        $this->load->model('Student_model', 'DbStudent');

        if ( !$this->session->userdata('user_id') ) {
        	redirect();
        }

        $this->user_id = $this->session->userdata('user_id');
        
	}

	public function index($data=false)
	{	
		$data['add_script']   = 'student/student-script';
		$data['page_title']   = 'Dashboard';
		$data['users']        = get_any_table_row(array('id' => $this->user_id), 'users');
		$data['picture_data'] = get_any_table_row(array('user_id' => $this->user_id), 'profile_picture');

		if ($data['users']['complete_register'] == 2) {
            $tuition_data = get_any_table_row(array('student_id' => $this->user_id, 'internal_stage' => 'COMPLETE', 'time_table' => '1'), 'tuition_application');
			if($tuition_data){
                $data['timetable'] = true;
                $data['timetables'] = $this->DbStudent->get_timetable($tuition_data['tuition_id']);
            }else{
                $data['timetable'] = false;
            }

            $data['content'] = 'student/student-content';
            
		} else {
			$data['content'] = 'student/student-content-not-complete';
		}

		$this->load->view('student/student-dashboard', $data);
	}

	function registration($data=false)
	{	
		$data['content']     = 'student/registration-form';
		$data['add_script']  = 'student/student-script';
		$data['page_title']  = 'Student Registration';

		$data['users']       = get_any_table_row(array('id' => $this->user_id), 'users');
		$data['nric_doc']    = get_any_table_row(array('student_id' => $this->user_id), 'student_document');

		$this->load->view('student/student-dashboard', $data);
	}

	function submit_registration($data=false)
	{
		$post = $this->input->post();
		// echo "<pre>"; print_r($post); echo "</pre>"; exit;

		$config['upload_path']          = './uploads/user-img';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 9999;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);

        $status = true;

        if ( ! $this->upload->do_upload('profile_avatar'))
        {
            $error      = array('error' => $this->upload->display_errors());
            $status     = false;
            $error_msg  = $error['error'];
        }
        else
        {	
        	# success upload

        	# checking register form complete or not
        	$this->form_validation->set_rules('name', 'Name', 'required');
        	$this->form_validation->set_rules('phone_no', 'Phone Number', 'required');
        	$this->form_validation->set_rules('email', 'Email', 'required');
        	$this->form_validation->set_rules('address', 'Address', 'required');
            $this->form_validation->set_rules('form', 'Form', 'required');
            $this->form_validation->set_rules('school_name', 'School Name', 'required');
            $this->form_validation->set_rules('school_address', 'School Address', 'required');
            $this->form_validation->set_rules('guardian_name⁠', 'Guardian Name', 'required');
            $this->form_validation->set_rules('guardian_phone', 'Guardian Phone', 'required');

        	if ($this->form_validation->run() == FALSE) {
        		
        		$status     = false;
        		$error_msg  = "Please complete all the required fields";

			} else {
				$status = true;
				# continue the process
			}

        }

        # check upload supporting document
        /*
        $document = get_any_table_row(array('student_id' => $this->user_id), 'student_document');

        if ($document == false) {
        	$status = false;
        	$error_msg = "Please upload supporting document";
        }
        */

        if ($status == true) {
        	
        	$data = array('upload_data' => $this->upload->data());

        	# data profile picture
        	$picture = array(
        		'user_id' => $this->user_id,
        		'path' => $config['upload_path'],
        		'filename' => $data['upload_data']['file_name'],
        		'original_filename' => $data['upload_data']['file_name'],
        		'is_submit' => '1',
        	);

        	# data student info
        	$student_info = array(
        		'name' => $post['name'], 
        		'phone_no' => $post['phone_no'],
        		'email' => $post['email'],
        		'address' => $post['address'],
        		'student_id' => $this->user_id,
                'form' => $post['form'],
                'guardian_name⁠' => $post['guardian_name⁠'],
                'school_name' => $post['school_name'],
                'school_address' => $post['school_address'],
                'guardian_phone' => $post['guardian_phone'],
        	);

            // echo "<pre>"; print_r($student_info); echo "</pre>"; exit;

        	$insert_picture = insert_any_table($picture, 'profile_picture');
        	$insert_student_info = insert_any_table($student_info, 'student_information');

        	$update_complete_register = array('complete_register' => '1', 'name' => $post['name'], 'email' => $post['email']);
        	$where_user = array('id' => $this->user_id );

        	$update = update_any_table($update_complete_register, $where_user, 'users');

        	$this->session->set_flashdata('success_login', 'Successfully submit');
        	redirect('student');

        } else {
        	$this->session->set_flashdata('error_register', strip_tags($error_msg));
        	redirect('student/registration');
        }
	}

	function apply_course($data=false)
	{
			$data['users']        = get_any_table_row(array('id' => $this->user_id), 'users');
            $data['picture_data'] = get_any_table_row(array('user_id' => $this->user_id), 'profile_picture');

			if ($data['users']['complete_register'] <> 2) {
				# cant do anything
				$this->session->set_flashdata('info', 'Your registration currently under approval or not complete yet');
				redirect('student');
			} else {
                
                $data['content']      = 'student/apply-tuition-list';
                $data['add_script']   = 'student/student-script';
                $data['page_title']   = 'Apply Tuition';

                # application data
                $data['tuition_apps'] = get_any_table_array(array('student_id' => $this->user_id), 'tuition_application');

                # check pending app
                $data['pending_app'] = get_any_table_row(array('student_id' => $this->user_id, 'stage !=' => 'COMPLETE'), 'tuition_application');

			}

            $this->load->view('student/student-dashboard', $data);
	}

	function apply_status($data=false)
	{
			$data['users'] = get_any_table_row(array('id' => $this->user_id), 'users');

			if ($data['users']['complete_register'] <> 2) {
				# cant do anything
				$this->session->set_flashdata('info', 'Your registration currently under approval or not complete yet');
				redirect('student');
			} else {

			}
	}

    function apply_tuition_modal($data=false)
    {   
        $studentInfo = get_any_table_row(array('student_id' => $this->user_id), 'student_information');

        //echo "<pre>"; print_r($studentInfo); echo "</pre>";

        switch ($studentInfo['form']) {
            case '1':
            case '2':
            case '3':
                $type = array('1','4','5','10');
                break;
            
            case '4':
            case '5':
                $type = array('1','2','3','4','5','6','7','8','9','10');
                break;
            case '7':
                $type = array('15');
                break;    

            default:
                echo "Subject Type Not Found"; exit;
                break;
        }

        //$data['subjects'] = get_any_table_array(array('active' => '1', 'type' => $type), 'ref_subject');
        $data['subjects'] = $this->DbStudent->get_list_subject_based_on_age($type);

        $this->load->view('student/modal/modal-apply-tuition', $data);
    }

    function edit_tuition_modal($data=false)
    {   
        $post = $this->input->post();

        $data['detail']   = get_any_table_row(array('tuition_id' => $post['tuition_id']), 'tuition_application');
        $data['subjects'] = get_any_table_array(array('active' => '1'), 'ref_subject');

        # create array for subject
        $subjects = $data['detail']['subjects'];

        $data['arr_subjects'] = explode("|",$subjects);
        $data['tuition_id'] = $post['tuition_id'];

        $this->load->view('student/modal/modal-edit-tuition', $data);
    }

    function submit_payment($data=false)
    {
        $post = $this->input->post();

        $tuition_id = get_keytab_value('tuition_id');

        $imp_subject = implode("|",$post['subjects']);

        $total = 0;

        foreach ($post['subjects'] as $key => $value) {
            $subject_detail = get_any_table_row(array('code' => $value), 'ref_subject');

            $total = $total + $subject_detail['price'];
        }

        $data = array(
            'student_id' => $this->user_id,
            'subjects' => $imp_subject,
            'total' => $total,
            'tuition_id' => "TCO-" . $tuition_id,
            'stage' => 'PENDING PAYMENT',
        );

        $insert = insert_any_table($data, "tuition_application");


        if ($insert == true) {
            $response = array('status' => true);
        } else {
            $response = array('status' => false);
        }

        echo encode($response);
        // echo "<pre>"; print_r($data); echo "</pre>";exit();
    }

    function do_edit_subject($data=false)
    {
        $post = $this->input->post();

        // print_r($post); exit();

        $tuition_id = $post['tuition_id'];

        $imp_subject = implode("|",$post['subjects']);

        $total = 0;

        foreach ($post['subjects'] as $key => $value) {
            $subject_detail = get_any_table_row(array('code' => $value), 'ref_subject');

            $total = $total + $subject_detail['price'];
        }

        $update = array(
            'subjects' => $imp_subject,
            'total' => $total,
        );

        $where = array('tuition_id' => $tuition_id);

        $update = update_any_table($update, $where, 'tuition_application');

        $response = array('status' => true );
        echo encode($response);
    }

    function tuition_app($data=false)
    {
        $data['add_script']   = 'student/student-script';
        $data['page_title']   = 'Tuition Application';
        $data['tuition_app']  = get_any_table_row(array('student_id' => $this->user_id), 'tuition_application');
        $data['content']      = 'student/form/tuition-application-form';
        $data['users']        = get_any_table_row(array('id' => $this->user_id), 'users');
        $data['picture_data'] = get_any_table_row(array('user_id' => $this->user_id), 'profile_picture');

        $this->load->view('student/student-dashboard', $data);
    }

    function pay_tuition($data=false)
    {
        $post = $this->input->post();

        $tuition_id = $post['tuition_id'];

        $data['tuition_data'] = get_any_table_row(array('tuition_id' => $tuition_id), 'tuition_application');

        $data['student_data'] = get_any_table_row(array('student_id' => $data['tuition_data']['student_id']), 'student_information');

        $data['receipt_doc'] = get_any_table_row(array('student_id' => $this->user_id, 'tuition_id' => $tuition_id, 'module' => 'PAY_RECEIPT'), 'student_document');

        // echo "<pre>"; print_r($data['tuition_data']); echo "</pre>";

        $this->load->view('student/modal/modal-pay-tuition', $data);
    }

    function submit_tuition_application($data=false)
    {
        $post = $this->input->post();
        $tuition_id = $post['tuition_id'];

        $update = array('paid' => '1', 'stage' => 'PROCESSING', 'internal_stage' => 'VERIFY');
        $where = array('tuition_id' => $tuition_id, 'student_id' => $this->user_id );

        $update_doc = array('is_submit' => '1');
        $where_doc = array('tuition_id' => $tuition_id, 'module' => 'PAY_RECEIPT');

        $update_tuition_app = update_any_table($update, $where, 'tuition_application');

        if ($update_tuition_app == true) {
            $update_doc = update_any_table($update_doc, $where_doc, 'student_document');
            $response = array('status' => true, 'msg' => 'Your application has been submit');
        } else {
            $response = array('status' => false, 'msg' => 'Failed to submit application' );
        }

        echo encode($response);
    }

    function view_tuition_modal($data=false)
    {

        $post = $this->input->post();

        $tuition_id = $post['tuition_id'];

        $data['tuition_data'] = get_any_table_row(array('tuition_id' => $tuition_id), 'tuition_application');

        $data['student_data'] = get_any_table_row(array('student_id' => $data['tuition_data']['student_id']), 'student_information');

        $data['receipt_doc'] = get_any_table_row(array('student_id' => $this->user_id, 'tuition_id' => $tuition_id, 'module' => 'PAY_RECEIPT'), 'student_document');

        $this->load->view('student/modal/modal-view-tuition', $data);
    }

    function myhomework($data=false)
    {
        $data['content']      = 'student/myhomework';
        $data['add_script']   = 'student/student-script';
        $data['page_title']   = 'My Homework';

        # application data
        // $data['tuition_apps'] = get_any_table_array(array('student_id' => $this->user_id), 'tuition_application');

        // # check pending app
        // $data['pending_app'] = get_any_table_row(array('student_id' => $this->user_id, 'stage !=' => 'COMPLETE'), 'tuition_application');

        $data['users']        = get_any_table_row(array('id' => $this->user_id), 'users');

        # get student subject
        $data['timetable_subjects'] = $this->DbStudent->get_subject_base_on_timetable($data['users']['id']);

        if ($data['timetable_subjects']) {
            $data['no_subject']   = false;
        } else {
            $data['no_subject']   = true;
        }

        $this->load->view('student/student-dashboard', $data);
    
    }

    function mymaterial($data=false)
    {
        $data['content']      = 'student/mymaterial';
        $data['add_script']   = 'student/student-script';
        $data['page_title']   = 'Student Materials';

        $data['users']        = get_any_table_row(array('id' => $this->user_id), 'users');

        $data['all_subject'] = get_any_table_array(array('active' => '1'), 'ref_subject');

        $this->load->view('student/student-dashboard', $data);

    }


    function subject_material($subject_id)
    {
        $data['content']      = 'student/mymaterial-list';
        $data['add_script']   = 'student/student-script';
        $data['page_title']   = "Student's Material";

        $data['users']        = get_any_table_row(array('id' => $this->user_id), 'users');

        $data['student_material'] = get_any_table_array(array('subject_id' => $subject_id), 'student_material');

        $this->load->view('student/student-dashboard', $data);
    }






}
