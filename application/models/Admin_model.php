<?php
#[\AllowDynamicProperties]
class Admin_model extends CI_Model {

    function __construct()
    {
        parent::__construct();

        $this->users_table  = 'users';
        $this->class_taken_table  = 'class_taken';
    }


    function class_taken_by_tutor($data)
    {	
    	$where = array('tutor_id' => $data['tutor_id'] );
    	$exist = get_any_table_row($where, 'class_taken');

    	if ($exist == true) {
    		# update

    		$update = array('class_id' => $data['assign_class']);

    		update_any_table($update, $where, 'class_taken');

    	} else {
    		#insert 

    		$insertdata = array('class_id' => $data['assign_class'], 'subject_id' => $data['subject_id'], 'tutor_id' => $data['tutor_id'] );

			//print_r($insertdata); exit;

			insert_any_table($insertdata, 'class_taken');
    	}
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

	function get_student_in_the_class($class_id)
	{
		$this->db->select('student_information.name, student_information.phone_no, student_information.email, student_class.class_id, student_information.student_id');
		$this->db->from('student_information');
		$this->db->join('student_class', 'student_information.student_id = student_class.student_id');
		$this->db->where('class_id', $class_id);
		$this->db->group_by('student_class.student_id');
		$query = $this->db->get();

		// echo $this->db->last_query();

		if ($query->num_rows() > 0) {
			return $query->result_array();
		} else {
			return false;
		}
	}

	function get_tutor_in_the_class($class_id)
	{
		$this->db->select('*');
		$this->db->from('tutor');
		$this->db->where('assign_class', $class_id);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->result_array();
		} else {
			return false;
		}

	}

	function total_tuition_request()
	{
		// get_any_table_array(array('paid' => '1', 'stage' => 'PROCESSING', 'internal_stage' => 'VERIFY'), 'tuition_application');
		
		$this->db->select('*');
		$this->db->from('tuition_application');
		$this->db->where('paid', '1');
		$this->db->where('stage', 'PROCESSING');
		$this->db->where('internal_stage', 'VERIFY');
		$query = $this->db->get();

		$row_count = $query->num_rows();
		return $row_count;
	}

	function total_tutor_request()
	{

		// get_any_table_array(array('status' => '1'), 'tutor');

		$this->db->select('*');
		$this->db->from('tutor');
		$this->db->where('status', '1');
		$query = $this->db->get();

		$row_count = $query->num_rows();
		return $row_count;
	}

}
