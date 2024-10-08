<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
        parent::__construct();
        $this->load->model('Login_model', 'DbLogin');
        
	}

	public function index($data=false)
	{	
		$this->load->view('login-form', $data);
	}

	public function login_process($data=false)
	{	
		$post = $this->input->post();
		// echo "<pre>"; print_r($post); echo "</pre>";

		# check login username and password is correct
		$where       = array('username' => $post['username'], 'password' => md5($post['password']));
		$check_login = $this->DbLogin->check_login($where);

		if ($check_login['status'] == true) {
			# success login
			// print_r($check_login['data']);

			# set the session data
			$session_data = array(
				'user_id' 	=> $check_login['data']['id'],
				'name' 	  	=> $check_login['data']['name'],
				'username' 	=> $check_login['data']['username'],
				'email' 	=> $check_login['data']['email'],
				'user_type' => $check_login['data']['user_type']
			);

			$this->session->set_userdata($session_data);

			# switch user based on type ; parent or student or tutor
			switch ($check_login['data']['user_type']) {
				case '1':
					# tutor
					break;
				case '2':
					# student
					$this->session->set_flashdata('success_login', 'Successfully Login');
					redirect('student');
					break;
				case '3':
					# parent
					break;
				case '4':
					# admin
					$this->session->set_flashdata('success_login', 'Successfully Login');
					redirect('admin');
					break;
				
				default:
					$data['heading'] = "User Type Not Found";
					$data['message'] = "User type not found while login, please contact admin and check your username";
					$this->load->view('errors/html/error_general', $data);
					break;
			}

		} else {
			# failed login
			$this->session->set_flashdata('error', $check_login['msg']);
			redirect('login');
		}
	}

	function logout($data=false)
	{
		$this->session->sess_destroy();
		redirect('');
	}

}
