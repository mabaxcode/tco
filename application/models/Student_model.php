<?php
#[\AllowDynamicProperties]
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

    function get_timetable($tuition_id)
	{
		$this->db->select('*');
		$this->db->where('tuition_id', $tuition_id);
		$this->db->group_by('class_dt');
		$this->db->order_by('class_dt', 'ASC');

		$query = $this->db->get('student_timetable');

		if ($query->num_rows() > 0) {
			return $query->result_array();
		} else {
			return false;
		}
	}
}
