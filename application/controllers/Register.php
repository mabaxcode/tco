<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	function __construct()
	{
        parent::__construct();
        $this->load->model('Register_model', 'DbRegister');
        
	}

	public function create_account($data=false)
	{	
		$this->load->view('create-account-form', $data);
	}

	public function create_account_process($data=false)
	{	
		$post = $this->input->post();
		// echo "<pre>"; print_r($post); echo "</pre>"; exit();

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_email_exist');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', 'Email address is already exist');
			$this->load->view('create-account-form', $data);
		} else {

			# all is okay proceed to create new account
			$create_account = $this->DbRegister->create_new_account($post);

			if ($create_account['status'] == true) {
				$this->session->set_flashdata('success', $create_account['msg']);
			} else {
				$this->session->set_flashdata('error', $create_account['msg']);
			}

			redirect('welcome');

		}

	}

	function email_exist($email)
	{	
		$email_exist = $this->DbRegister->do_check_email_exist($email);

		if ($email_exist == true) {
			$this->form_validation->set_message('email_exist', 'Email address already exist');
            return FALSE;
		} else {
			return TRUE;
		}
	}
}
