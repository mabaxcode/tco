<?php

class Student_model extends CI_Model {

    function __construct()
    {
        parent::__construct();

        $this->users_table  = 'users';
    }

    function do_check_email_exist($email, $user_id)
    {
        # check email
        $result = get_any_table_row(array('email' => $email, 'id !=' => $user_id), $this->users_table);
        return $result;
    }
}
