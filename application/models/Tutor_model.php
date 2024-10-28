<?php
#[\AllowDynamicProperties]
class Tutor_model extends CI_Model {

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

    function get_myTimeTables($user_id)
    {   
        $this->db->select('*');
        $this->db->where('tutor_id', $user_id);
        $this->db->group_by(['class_dt', 'class_time']);
        $this->db->order_by('class_dt', 'ASC');

        $query = $this->db->get('student_timetable');

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }

        // $result = array(
        //     'title' => 'All Day Event',
        //     'start' => '2024-01',
        //     'description' => 'Toto lorem ipsum dolor sit incid idunt ut',
        //     'className' => "fc-event-danger fc-event-solid-warning"
        // );

        // return $result;

        // {
        //     title: 'All Day Event',
        //     start: YM + '-01',
        //     description: 'Toto lorem ipsum dolor sit incid idunt ut',
        //     className: "fc-event-danger fc-event-solid-warning"
        // },
        // {
        //     title: 'Reporting',
        //     start: YM + '-14T13:30:00',
        //     description: 'Lorem ipsum dolor incid idunt ut labore',
        //     end: YM + '-14',
        //     className: "fc-event-success"
        // },
        // {
        //     title: 'Click for Google',
        //     url: 'http://google.com/',
        //     start: YM + '-28',
        //     className: "fc-event-solid-info fc-event-light",
        //     description: 'Lorem ipsum dolor sit amet, labore'
        // }
    }

    function get_lastest_mystudent($tutor_id, $class_id)
    {
        $this->db->select('*');
        $this->db->where('tutor_id', $tutor_id);
        $this->db->where('class_id', $class_id);
        $this->db->order_by('id', 'ASC');
        $this->db->limit(5);

        $query = $this->db->get('student_class');

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }

    }

    function get_all_mystudent($tutor_id, $class_id)
    {
        $this->db->select('*');
        $this->db->where('tutor_id', $tutor_id);
        $this->db->where('class_id', $class_id);
        $this->db->order_by('id', 'ASC');
        // $this->db->limit(5);

        $query = $this->db->get('student_class');

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }

    }
}
