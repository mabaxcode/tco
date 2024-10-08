<?php

class Upload_model extends CI_Model {

    function __construct()
    {
        parent::__construct();

        $this->student_document_table  = 'student_document';
    }

    function student_document_exist($student_id, $module)
	{
		$this->db->select('*');
        $this->db->where(array('student_id' => $student_id, 'module' => $module));
        $query = $this->db->get($this->student_document_table);

        if($query->num_rows() > 0){
        	return true;
        }
        return false;
	}
}
