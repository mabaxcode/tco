<?php

class Register_model extends CI_Model {

    function __construct()
    {
        parent::__construct();

        $this->users_table  = 'users';
    }

    function create_new_account($post)
	{
	    $data = array(
	        'name' 		=> $post['name'],
	        'email'  	=> $post['email'],
	        'user_type' => $post['user_type'],
	        'password'  => md5( $post['password'] ),
	        'username'  => $post['username'],
		);

    	# insert new account
    	$this->db->insert($this->users_table, $data);
    	$response = array('status' => true, 'msg' => 'Account has been successfully created');

	    return $response;
	}

	function do_check_email_exist($email)
	{
		# check email
	    $result = get_any_table_row(array('email' => $email), $this->users_table);
	    return $result;
	}
}
