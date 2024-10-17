<?php
defined('BASEPATH') OR exit('No direct script access allowed');
#[\AllowDynamicProperties]
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

	public function index()
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

    function tutor_application_form($data=false)
    {
        $id = $this->input->post('id');
        // echo "<pre>"; print_r($post); echo "</pre>";
        $data['tutor_data'] = get_any_table_row(array('tutor_id' => $id), 'tutor');
        $data['tutor_doc']  = get_any_table_row(array('tutor_id' => $id), 'tutor_document');
 
        $this->load->view('admin/modal/modal-process-tutor', $data);
    }

    function view_tutor_application($data=false)
    {
        $id = $this->input->post('id');
        // echo "<pre>"; print_r($post); echo "</pre>";
        $data['tutor_data'] = get_any_table_row(array('tutor_id' => $id), 'tutor');
        $data['tutor_doc']  = get_any_table_row(array('tutor_id' => $id), 'tutor_document');
 
        $this->load->view('admin/modal/modal-view-tutor', $data);
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

    function proceed_tutor_application($data=false)
    {
        $post = $this->input->post();
        // echo "<pre>"; print_r($post); echo "</pre>"; exit;

        $id = $post['id'];
        $decision = $post['decision'];

        # update complete register to = 2;
        $complete_register = update_any_table(array('complete_register' => '2'), array('id' => $id), 'users');

        if ($complete_register == true) {
            # update approval decision
            $approval = update_any_table(array('status' => '2'), array('tutor_id' => $id), 'tutor');

            if ($approval == true) {
                $response = array('status' => true, 'msg' => 'Tutor Application Completed' );
            } else {
                $response = array('status' => false, 'msg' => 'Failed to update approval decision' );
            }

        } else {
            $response = array('status' => false, 'msg' => 'Failed update complete register' );
        }

        echo encode($response);
    }

    function tuition_application($data=false)
    {
        $data['content']     = 'admin/tuition-application-list';
        $data['add_script']  = 'admin/admin-script';
        $data['page_title']  = 'Tuition Application';

        $data['tuition_apps'] = get_any_table_array(array('paid' => '1', 'stage' => 'PROCESSING', 'internal_stage' => 'VERIFY'), 'tuition_application');

        // echo "<pre>"; print_r($data['tuition_apps']); echo "</pre>"; exit();

        // $data['nric_doc']    = get_any_table_row(array('student_id' => $this->user_id), 'student_document');

        $this->load->view('admin/admin-dashboard', $data);
    }

    function process_tuition_modal($data=false)
    {
        $post = $this->input->post();

        $tuition_id = $post['tuition_id'];

        $data['tuition_data'] = get_any_table_row(array('tuition_id' => $tuition_id), 'tuition_application');

        $student_id = $data['tuition_data']['student_id'];

        $data['student_data'] = get_any_table_row(array('student_id' => $student_id), 'student_information');

        // echo "<pre>"; print_r($data['student_data']); echo "</pre>"; exit();

        $data['receipt_doc'] = get_any_table_row(array('student_id' => $student_id, 'tuition_id' => $tuition_id, 'module' => 'PAY_RECEIPT'), 'student_document');

        $this->load->view('admin/modal/modal-process-tuition', $data);

    }

    function proceed_to_class_management($data=false)
    {
        $post = $this->input->post();

        $tuition_id = $post['tuition_id'];

        $update = array('internal_stage' => 'CLASS');
        $where = array('tuition_id' => $tuition_id, 'verified_paid' => '1');

        $update_stage = update_any_table($update, $where, 'tuition_application');

        if ($update_stage == true) {
            $response = array('status' => true );
        } else {
            $response = array('status' => false );
        }

        echo encode($response);

    }

    function check_payment_verify($data=false)
    {
        $post = $this->input->post();

        $tuition_id = $post['tuition_id'];

        $verify = get_any_table_row(array('tuition_id' => $tuition_id, 'paid' => '1'), 'tuition_application');

        if ($verify['verified_paid'] == '0') {
            $response = array('status' => false );
        } else {
            $response = array('status' => true );
        }

        echo encode($response);
    }

    function save_verify_payment($data=false)
    {
        $post = $this->input->post();

        $tuition_id = $post['tuition_id'];
        $verify_val = $post['verify_val'];

        update_any_table(array('verified_paid' => $verify_val), array('tuition_id' => $tuition_id), 'tuition_application');

        $response = array('status' => true );
        echo encode($response);
    }

    function scheduling($data=false)
    {

        $data['content']     = 'admin/student-scheduling-list';
        $data['page_title']  = 'Student Scheduling & Class Management';
        $data['add_script']  = 'admin/admin-script';

        $data['tuition_apps'] = get_any_table_array(array('paid' => '1', 'stage' => 'PROCESSING', 'internal_stage' => 'CLASS'), 'tuition_application');

        // echo "<pre>"; print_r($data['tuition_apps']); echo "</pre>"; exit();

        // $data['nric_doc']    = get_any_table_row(array('student_id' => $this->user_id), 'student_document');

        $this->load->view('admin/admin-dashboard', $data);
    }

    function student_scheduling($tuition_id)
    {
        $data['content']     = 'admin/scheduling-form';
        $data['page_title']  = 'Scheduling & Class Management';
        $data['add_script']  = 'admin/admin-script';

        $data['tuition_data'] = get_any_table_row(array('tuition_id' => $tuition_id), 'tuition_application');
        $data['student_data'] = get_any_table_row(array('student_id' => $data['tuition_data']['student_id']), 'student_information');
        $data['student_pic']  = get_any_table_row(array('user_id' => $data['tuition_data']['student_id']), 'profile_picture');

        // echo "<pre>"; print_r($data['student_pic']); echo "</pre>"; exit();

        // $data['nric_doc']    = get_any_table_row(array('student_id' => $this->user_id), 'student_document');

        $this->load->view('admin/admin-dashboard', $data);
    }

    function tutor_application($data=false)
    {
        $data['content']     = 'admin/tutor-list';
        $data['page_title']  = 'Tutors';
        $data['add_script']  = 'admin/admin-script';

        $data['tutors'] = get_any_table_array(array('status' => '1'), 'tutor');
        $data['users']  = get_any_table_row(array('id' => $this->user_id), 'users');

        // echo "<pre>"; print_r($data['tuition_apps']); echo "</pre>"; exit();

        // $data['resume_doc'] = get_any_table_row(array('student_id' => $this->user_id), 'student_document');

        $this->load->view('admin/admin-dashboard', $data);
    }

    function add_new_tutor_modal($data=false)
    {
        $this->load->view('admin/modal/modal-add-tutor', $data);   
    }

    function save_new_tutor($data=false)
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('age', 'Age', 'required');
        $this->form_validation->set_rules('phone_no', 'Phone Number', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');


        $is_fill = true;

        if ($this->form_validation->run() == FALSE) {
            
            $is_fill = false;

        }

        if ($is_fill == false) {
            $response = array('is_fill' => false );
            echo encode($response); exit();
        } else {

            // $data = array(
            //     'name' => $ );

            $response = array('is_fill' => true );
        }

    }

    function tutor_all($data=false)
    {   

        $data['content']     = 'admin/approved-tutor-list';
        $data['page_title']  = 'List All Tutors';
        $data['add_script']  = 'admin/admin-script';

        $data['tutors'] = get_any_table_array(array('status' => '2'), 'tutor');
        $data['users']  = get_any_table_row(array('id' => $this->user_id), 'users');

        // echo "<pre>"; print_r($data['tuition_apps']); echo "</pre>"; exit();

        // $data['resume_doc'] = get_any_table_row(array('student_id' => $this->user_id), 'student_document');

        $this->load->view('admin/admin-dashboard', $data);
    }

    function class($data=false)
    {
        $data['content']     = 'admin/class-list';
        $data['page_title']  = 'List All Class';
        $data['add_script']  = 'admin/admin-script';

        $data['class']  = get_any_table_array(array('status' => '1'), 'class');
        //$data['users']  = get_any_table_row(array('id' => $this->user_id), 'users');

        // echo "<pre>"; print_r($data['tuition_apps']); echo "</pre>"; exit();

        // $data['resume_doc'] = get_any_table_row(array('student_id' => $this->user_id), 'student_document');

        $this->load->view('admin/admin-dashboard', $data);
    }

    function add_new_class_modal($data=false)
    {
        $this->load->view('admin/modal/modal-add-class', $data);
    }

    function assign_class_modal($data=false)
    {   
        $tutor_id = $this->input->post('id');

        $data['tutor_data'] = get_any_table_row(array('tutor_id' => $tutor_id), 'tutor');
        $data['class'] = get_any_table_array(array('status' => '1'), 'class');

        $this->load->view('admin/modal/modal-assign-class', $data);
    }

    function update_class_modal($data=false)
    {
        $id = $this->input->post('id');

        $data['class'] = get_any_table_row(array('id' => $id), 'class');
        $data['id'] = $id;

        $this->load->view('admin/modal/modal-update-class', $data);
    }

    function save_new_class($data=false)
    {
        $post = $this->input->post();

        $name = $post['name'];

        if ($name == '') {
            $response = array('status' => false);
        } else {

            $dataInsert = array('name' => $name, 'status' => '1' );

            insert_any_table($dataInsert, 'class');

            $response = array('status' => true);

        }

        echo encode($response);
    }

    function delete_class($data=false)
    {
        $post = $this->input->post();

        $id = $post['id'];

        $delete = delete_any_table(array('id' => $id), 'class');

        if ($delete == true) {
            echo encode(array('status' => true)); exit;
        } else {
            echo encode(array('status' => false)); exit();
        } 
    }

    function do_update_class($data=false)
    {
        $post = $this->input->post();

        // echo "<pre>"; print_r($post); echo "</pre>"; 

        $update = array('name' => $post['name'] );
        $where = array('id' => $post['id'] );

        update_any_table($update, $where, 'class');

        echo encode(array('status' => true ));
    }

    function proceed_assign_class($data=false)
    {
        $post = $this->input->post();
        // print_r($post); exit();

        $this->form_validation->set_rules('assign_class', 'Class', 'required');

        if ($this->form_validation->run() == FALSE) {   
            $response = array('status' => false, 'msg' => 'Please insert class to assign' );
        } else {

            # check class available or not
            $class_taken = get_any_table_row(array('class_id' => $post['assign_class'], 'subject_id' => $post['subject_id']), 'class_taken');

            if($class_taken == true){
                $users = get_any_table_row(array('tutor_id' => $class_taken['tutor_id']), 'tutor');
                $response = array('status' => false, 'msg' => 'This class already taken by ' . strtoupper($users['name']));
                echo encode($response); exit;

            } else {

                #process assigned
                $update = array('assign_class' => $post['assign_class'] );
                $where = array('tutor_id' => $post['tutor_id'] );
    
                update_any_table($update, $where, 'tutor');  
                
                $taken_class = $this->DbAdmin->class_taken_by_tutor($post);

            }
            $response = array('status' => true, 'msg' => 'Success' );

        }

        echo encode($response);
    }

    function giving_the_class($data=false)
    {
        $post = $this->input->post();

        $student_id     = $post['student_id'];
        $tutor_id       = $post['tutor_id'];
        $subject_id     = $post['subject_id'];
        $tuition_id     = $post['tuition_id'];

        $where = array('student_id' => $student_id, 'subject_id' => $subject_id );

        $is_exist = get_any_table_row($where, 'student_class');

        if ($is_exist == true) {
            # update
            $update = array('tutor_id' => $tutor_id);
            update_any_table($update, $where, 'student_class');
        } else {
            $insert = array('student_id' => $student_id, 'tutor_id' => $tutor_id, 'subject_id' => $subject_id, 'tuition_id' => $tuition_id);
            insert_any_table($insert, 'student_class');
        }

        # get class name based on tutuor id
        $latest_stud_class = get_any_table_row($where, 'student_class');

        # delete back if slot has been set to previous tutor
        $where_slot = array('student_id' => $student_id, 'subject_id' => $subject_id, 'tuition_id' => $tuition_id);
        delete_any_table($where_slot, 'student_timetable');

        $response = array('status' => true );
        echo encode($response);

    }

    function reset_student_class($data=false)
    {
        $post = $this->input->post();

        $tuition_id = $post['tuition_id'];
        $student_id = $post['student_id'];

    }

    function set_the_class_slot_modal($data=false)
    {
        $id = $this->input->post('id');

        $data['student_class'] = get_any_table_row(array('id' => $id), 'student_class');
        //$data['class']       = get_any_table_array(array('status' => '1'), 'class');
        //echo "<pre>"; print_r($data['student_class']); echo "</pre>";

        $tutor_details = get_any_table_row(array('tutor_id' => $data['student_class']['tutor_id']), 'tutor');
	    $data['class'] = get_any_table_row(array('id' => $tutor_details['assign_class'] ), 'class');
        $data['tuition_application'] = get_any_table_row(array('tuition_id' => $data['student_class']['tuition_id']), 'student_class');


        $weekdays = getWeekendDates($data['tuition_application']['approved_dt']);

        foreach($weekdays as $date => $val){
            $insert = array(
                'student_id' => $data['tuition_application']['student_id'],
                'tutor_id' => $data['student_class']['tutor_id'],
                'class_id' => $tutor_details['assign_class'],
                'class_dt' => $val,
                'subject_id' => $data['student_class']['subject_id'],
                'status' => '1',
                'tuition_id' => $data['student_class']['tuition_id'],
            );

            $where_timetable = array(
                'student_id' => $data['tuition_application']['student_id'],
                'tutor_id' => $data['student_class']['tutor_id'],
                'class_id' => $tutor_details['assign_class'],
                'class_dt' => $val,
                'subject_id' => $data['student_class']['subject_id'],
                'tuition_id' => $data['student_class']['tuition_id'],
            );

            $check = get_any_table_row($where_timetable, 'student_timetable');

            if($check == false){
                insert_any_table($insert, 'student_timetable');
            }

            
        }

        $where = array(
            'student_id' => $data['tuition_application']['student_id'],
            'tutor_id' => $data['student_class']['tutor_id'],
            'class_id' => $tutor_details['assign_class']
        );

        $data['timetable'] = get_any_table_array($where, 'student_timetable');
        $data['student_id'] = $data['tuition_application']['student_id'];

        $data['getOthersSlot'] = get_any_table_array(array('student_id' => $data['student_id'], 'tuition_id' => $data['student_class']['tuition_id']), 'student_timetable');

        //echo "<pre>"; print_r($data['getOthersSlot']); echo "</pre>";

        $this->load->view('admin/modal/modal-set-the-class', $data);
    }

    function set_the_class_time($data=false)
    {
        $id = $this->input->post('id');
        $time = $this->input->post('time');

        $update = array('class_time' => $time);
        $where = array('id' => $id);

        update_any_table($update, $where, 'student_timetable');
        echo encode(array('status' => true));
    }

    function check_all_slot_is_set($data=false)
    {   
        $slot = array();
        $tuition_id = $this->input->post('tuition_id'); 

        # get all subject in this tuition application
        $where = array('tuition_id' => $tuition_id);
        $tuition_application = get_any_table_row($where, 'tuition_application');

        $subjects = $tuition_application['subjects'];

        $subject_arr = explode("|",$subjects);
		foreach ($subject_arr as $val => $value) {

            # check all tutor are selected
                $whereStudentClass = array('tuition_id' => $tuition_id, 'student_id' => $tuition_application['student_id'], 'subject_id' => $value);
                $getThisStudentClass = get_any_table_row($whereStudentClass, 'student_class');

                if($getThisStudentClass == false)
                {
                    #marked as student class not set yet
                    $slot = array('not-complete');
                } else {

                    # check tutor id must not = 0
                    if($getThisStudentClass['tutor_id'] == '0'){
                        $slot = array('not-complete');
                    }else{
                        $slot = array('complete');
                    }
                }

            # check time slot is set
                # check all is slot is set
                $whereSlot = array('subject_id' => $value, 'tuition_id' => $tuition_id, 'student_id' => $tuition_application['student_id']);

                # if not exist set to false
                $getThisSlot = get_any_table_row($whereSlot, 'student_timetable');

                if($getThisSlot == false)
                {
                    $slot = array('not-complete');
                } else {

                    # class time must be set
                    $whereSlotTime = array('class_time' => ' ', 'tuition_id' => $tuition_id, 'student_id' => $tuition_application['student_id']);
                    $getThisSlotTime = get_any_table_row($whereSlotTime, 'student_timetable');

                    if($getThisSlotTime == true)
                    {
                        $slot = array('not-complete');
                    } else {
                        $slot = array('complete');
                    }

                }

        }

        if (in_array("not-complete", $slot)) {
            $response = array('status' => false, 'msg' => 'Please complete the required fields');
        } else {
            $response = array('status' => true, 'msg' => 'Success');
        }

        echo encode($response);
    }

    function do_generate_timetable($data=false)
    {
        $tuition_id = $this->input->post('tuition_id');

        $update = array('time_table' => '1', 'internal_stage' => 'COMPLETE');
        $where = array('tuition_id' => $tuition_id);
        $update_timetable = update_any_table($update, $where, 'tuition_application');

        $response = array('status' => true);
        echo encode($response);
    }

    function timetable($data=false)
    {
        $data['content']     = 'admin/student-timetable-list';
        $data['page_title']  = 'Student Timetable';
        $data['add_script']  = 'admin/admin-script';

        $data['tuition_apps'] = get_any_table_array(array('paid' => '1', 'stage' => 'PROCESSING', 'internal_stage' => 'COMPLETE', 'time_table' =>'1'), 'tuition_application');

        // echo "<pre>"; print_r($data['tuition_apps']); echo "</pre>"; exit();

        // $data['nric_doc']    = get_any_table_row(array('student_id' => $this->user_id), 'student_document');

        $this->load->view('admin/admin-dashboard', $data);
    }

    function view_timetable($tuition_id)
    {
        $data['content']     = 'admin/timetable-view';
        $data['page_title']  = 'Timetable';
        $data['add_script']  = 'admin/admin-script';

        $data['tuition_data'] = get_any_table_row(array('tuition_id' => $tuition_id), 'tuition_application');
        $data['student_data'] = get_any_table_row(array('student_id' => $data['tuition_data']['student_id']), 'student_information');
        $data['student_pic']  = get_any_table_row(array('user_id' => $data['tuition_data']['student_id']), 'profile_picture');

        // echo "<pre>"; print_r($data['student_pic']); echo "</pre>"; exit();

        $data['timetables'] = get_any_table_array(array('tuition_id' => $tuition_id), 'student_timetable');

        // $data['nric_doc']    = get_any_table_row(array('student_id' => $this->user_id), 'student_document');

        $this->load->view('admin/admin-dashboard', $data);
    }
}
