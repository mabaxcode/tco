<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tutor extends CI_Controller {

	function __construct()
	{
        parent::__construct();
        $this->load->model('Tutor_model', 'DbTutor');

        if ( !$this->session->userdata('user_id') ) {
        	redirect();
        }

        $this->user_id = $this->session->userdata('user_id');
        
	}

	public function index($data=false)
	{	
		$data['add_script']   = 'tutor/tutor-script';
		$data['page_title']   = 'Dashboard';
		$data['users']        = get_any_table_row(array('id' => $this->user_id), 'users');
		$data['picture_data'] = get_any_table_row(array('user_id' => $this->user_id), 'profile_picture');
        $data['content']      = 'tutor/tutor-content';

        # class taken
        $data['class_taken'] = get_any_table_row(array('tutor_id' => $this->user_id), 'tutor');
        // print_r($data['class_taken']); exit;

        // $data['my_students'] = get_any_table_array(array('tutor_id' => $this->user_id, 'class_id' => $data['class_taken']['assign_class']), 'student_class');

        $data['my_students'] = $this->DbTutor->get_lastest_mystudent($this->user_id, $data['class_taken']['assign_class']);

		$this->load->view('tutor/tutor-dashboard', $data);
	}

    function apply_tutor($data=false)
    {
        $data['content']     = 'tutor/application-form';
        $data['add_script']  = 'tutor/tutor-script';
        $data['page_title']  = 'Tutor Application';

        $data['users']       = get_any_table_row(array('id' => $this->user_id), 'users');
        $data['resume_doc']  = get_any_table_row(array('tutor_id' => $this->user_id), 'tutor_document');
        $data['subject']     = get_any_table_array(array('active' => '1'), 'ref_subject');

        $this->load->view('tutor/tutor-dashboard', $data);
    }

    function submit_application($data=false)
    {
        $post = $this->input->post();
        // echo "<pre>"; print_r($post); echo "</pre>"; exit;


        $ext                            = pathinfo($_FILES['profile_avatar']['name'], PATHINFO_EXTENSION);
        $hashfilename                   = getRandomString('20') . "." . $ext;

        $config['upload_path']          = './uploads/user-img';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 9999;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        $config['file_name']            = $hashfilename;

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
            $this->form_validation->set_rules('age', 'Age', 'required');
            $this->form_validation->set_rules('subject', 'Subject', 'required');

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
                // 'filename' => $data['upload_data']['file_name'],
                'filename' => $hashfilename,
                'original_filename' => $data['upload_data']['file_name'],
                'is_submit' => '1',
            );

            # data student info
            $tutor_info = array(
                'name' => $post['name'], 
                'phone_no' => $post['phone_no'],
                'email' => $post['email'],
                'address' => $post['address'],
                'tutor_id' => $this->user_id,
                'age' => $post['age'],
                'status' => '1',
                'subject' => $post['subject'],
            );

            $insert_picture = insert_any_table($picture, 'profile_picture');
            $insert_tutor_info = insert_any_table($tutor_info, 'tutor');

            $update_complete_register = array('complete_register' => '1', 'name' => $post['name'], 'email' => $post['email']);
            $where_user = array('id' => $this->user_id );

            $update = update_any_table($update_complete_register, $where_user, 'users');

            $this->session->set_flashdata('success_login', 'Successfully submit');
            redirect('tutor');

        } else {
            $this->session->set_flashdata('error_register', strip_tags($error_msg));
            redirect('tutor/apply_tutor');
        }
    }

    function get_tutor_timetable()
    {
        $timetables = $this->DbTutor->get_myTimeTables($this->user_id);

        $eventArray = [];

        foreach ($timetables as $event) {

            $title      = get_ref_subject($event['subject_id']);
            $in_class   = get_class_ref($event['class_id']);
            $desc       = $title;
            $class_name = "fc-event-danger fc-event-solid-warning";

            // start: TODAY + 'T12:00:00',
            $class_time = $event['class_time'];
            $time24Hour = date("H:i", strtotime($class_time));

            $eventArray[] = [
                'title'         => $title,
                'start'         => $event['class_dt'] . 'T' . $time24Hour . ":00",
                'description'   => $desc,
                'className'     => $class_name
            ];

            // $eventArray[] = [
            //     'events' => [ // Use => instead of =
            //         'title' => $title,
            //         'start' => $event['class_dt'],
            //         'description' => $desc,
            //         'className' => $class_name
            //     ],
            // ];
        }

        // echo "<pre>"; print_r($eventArray); echo "</pre>"; exit;

        $response = array('events' => $eventArray);
        echo encode($response);
        
    }

    function my_student($data=false)
    {   
        $data['content']     = 'tutor/my-student-list';
        $data['add_script']  = 'tutor/tutor-script';
        $data['page_title']  = 'All My Students';

        $data['users']       = get_any_table_row(array('id' => $this->user_id), 'users');
        // $data['resume_doc']  = get_any_table_row(array('tutor_id' => $this->user_id), 'tutor_document');
        // $data['subject']     = get_any_table_array(array('active' => '1'), 'ref_subject');


        # class taken
        $data['class_taken'] = get_any_table_row(array('tutor_id' => $this->user_id), 'tutor');
        $data['students']    = get_any_table_array(array('tutor_id' => $this->user_id, 'class_id' => $data['class_taken']['assign_class']), 'student_class');

        $this->load->view('tutor/tutor-dashboard', $data);
    }

    function student_material($data=false)
    {
        $data['content']     = 'tutor/student-material';
        $data['add_script']  = 'tutor/tutor-script';
        $data['page_title']  = 'Student Material';

        $data['users']       = get_any_table_row(array('id' => $this->user_id), 'users');
        // $data['resume_doc']  = get_any_table_row(array('tutor_id' => $this->user_id), 'tutor_document');
        // $data['subject']     = get_any_table_array(array('active' => '1'), 'ref_subject');


        # class taken
        $data['class_taken']  = get_any_table_row(array('tutor_id' => $this->user_id), 'tutor');
        $data['materials']    = get_any_table_array(array('tutor_id' => $this->user_id, 'class_id' => $data['class_taken']['assign_class']), 'student_material');
        $data['subject_name'] = get_ref_subject($data['class_taken']['subject']);

        $where = array('tutor_id' => $this->user_id, 'class_id' => $data['class_taken']['assign_class']);

        $data['total'] = count_any_table($where, 'student_material');

        $this->load->view('tutor/tutor-dashboard', $data);
    }


}   
