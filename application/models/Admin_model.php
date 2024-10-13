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

}
