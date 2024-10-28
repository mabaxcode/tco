<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
        parent::__construct();
        $this->load->model('Admin_model', 'DbAdmin');

        if ( $this->session->userdata('user_id') ) {

        	$user_type = $this->session->userdata('user_type');

        	if ($user_type == 1) {
        		redirect ('tutor');
        	} elseif ($user_type == 2) {
        		redirect ('student');
        	} elseif ($user_type == 3) {
        		redirect ('parent');
        	} elseif ($user_type == 4) {
        		redirect ('admin');
        	} else {
        		echo "ERROR"; exit;
        	}
        }
        
	}

	public function index()
	{	
		$timetable_cron = $this->DbAdmin->timetable_cron();
		$this->load->view('welcome_message');
	}
}
