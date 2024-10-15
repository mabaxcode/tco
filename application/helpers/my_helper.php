<?php if (!defined('BASEPATH'))
exit('No direct script access allowed');

function load_instance()
{
    $tco =& get_instance();
    return $tco;
}

function get_any_table_row($data_where, $table, $order_latest = false)
{
    $tco = load_instance();
    $tco->load->database();

    $tco->db->select('*');
    $tco->db->where($data_where);
    if ($order_latest <> false) {
        $tco->db->order_by($order_latest, 'desc');
    }
    $query = $tco->db->get($table);

    if ($query->num_rows() > 0) { return $query->row_array(); }

    return false;
}

function insert_any_table($data_insert, $table)
{
    $tco = load_instance();
    $tco->load->database();

    $tco->db->insert($table, $data_insert);
    return $tco->db->affected_rows();
}

function current_dt()
{
    $now = date('Y-m-d H:i:s');
    return $now;
}

function display_current_dt()
{
    $now = date('d F Y');
    return $now;
}

function update_any_table($data_upd, $data_where, $table)
{
    $tco = load_instance();
    $tco->load->database();

    $tco->db->set($data_upd);
    $tco->db->where($data_where);
    $tco->db->update($table);
    return $tco->db->affected_rows();
}

function delete_any_table($where, $table)
{
    $tco = load_instance();
    $tco->load->database();
    $tco->db->delete($table, $where);
    return $tco->db->affected_rows();
}

function encode($str)
{
    if ($str == "false") {
        $str = array('status' => false);
    }
    if ($str == "true") {
        $str = array('status' => true);
    }
    $return = json_encode($str, JSON_PRETTY_PRINT);
    return $return;
}

function view_profile_picture($data)
{
    $url = $data['path'] . "/" . $data['filename'];
    
    $filename = basename($url);

    if (file_exists($url)) {
        # Has image
        $file_extension = strtolower(substr(strrchr($filename,"."),1));
            switch( $file_extension ) {
            case "gif": $ctype="image/gif"; break;
            case "png": $ctype="image/png"; break;
            case "jpeg":
            case "jpg": $ctype="image/jpg"; break;
            default:
        }

        $data   = file_get_contents($url);
        $base64 = 'data:image/' . $file_extension . ';base64,' . base64_encode($data);

        return $base64;
    }else{
        # No image
    }
}

function get_any_table_array($data_where = false, $table = false, $col_sort = false, $type_sort = false)
{
    $tco = load_instance();
    $tco->load->database();

    $tco->db->select('*');
    if($data_where <> false){
        $tco->db->where($data_where);
    }
    
    if ($col_sort <> false) {
        $sort = ($type_sort == false) ? "desc" : $type_sort;
        $tco->db->order_by($col_sort, $sort);
    }
    $query = $tco->db->get($table);

    if ($query->num_rows() > 0) {
        return $query->result_array();
    } else {
        return false;
    }
}

function getRandomString($n) {
    return bin2hex(random_bytes($n / 2));
}

function get_keytab_value($key)
{
    $tco = load_instance();
    $tco->load->database();

    $tco->db->select('*');
    $tco->db->where(array('type' => $key));
    $query = $tco->db->get('keytab');

    if ($query->num_rows() > 0) {
        $result = $query->row();
        update_keytab_value($key, $result->key_num);
        return $result->key_num;
    } else {
        return false;
    }
}

function update_keytab_value($key, $val)
{
    $tco = load_instance();
    $tco->load->database();

    $tco->db->set(array('key_num' => $val + 1));
    $tco->db->where(array('type' => $key));
    $tco->db->update('keytab');

    return $tco->db->affected_rows();
}

function get_ref_subject($code)
{
    $tco = load_instance();
    $tco->load->database();

    $tco->db->select('*');
    $tco->db->where(array('code' => $code));
    $query = $tco->db->get('ref_subject');

    if ($query->num_rows() > 0) {
        $result = $query->row();
        return $result->descs;
    } else {
        return false;
    }
}

function get_class_ref($id)
{
    $tco = load_instance();
    $tco->load->database();

    $tco->db->select('*');
    $tco->db->where(array('id' => $id));
    $query = $tco->db->get('class');

    if ($query->num_rows() > 0) {
        $result = $query->row();
        return $result->name;
    } else {
        return false;
    }
}

function get_value_from_any_table($tbl, $col, $where, $order_by = false)
{
    $tco = load_instance();
    $tco->load->database();

    $tco->db->select($col);
    $tco->db->where($where);
    if ($order_by <> false) {
        $tco->db->order_by($order_by, 'DESC');
        $tco->db->limit(1);
    }
    $query = $tco->db->get($tbl);

    if ($query->num_rows() > 0) {
        $result = $query->row();
        return $result->$col;
    } else {
        return false;
    }
}
