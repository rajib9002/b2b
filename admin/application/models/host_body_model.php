<?php

class host_body_model extends Model {

    function __construct() {
        parent::Model();
    }

    function get_host_body_grid() {
        $sortname = common::getVar('sidx', 'host_body_id');
        $sortorder = common::getVar('sord', 'ASC');
        $sort = "ORDER BY $sortname $sortorder";
        $tname = $_REQUEST['host_body_name'];
        $con = "1";
        if ($tname != '') {
            $con = "host_body_name like '$tname%'";
        }
        
         $sql = "select country.*, host_body.* from host_body
            left join country on country.country_id=host_body.country_id
        where $con $sort ";
        
        $page = common::getVar('page', 1);
        $limit = common::getVar('rows');
        $i = 0;
        $query = $this->db->query($sql);
        $count = sql::count('host_body', $con);
        if ($count > 0) {
            $total_pages = ceil($count / $limit);
        } else {
            $total_pages = 1;
        }
        if ($page > $total_pages)
            $page = $total_pages;
        if ($limit < 0)
            $limit = 0;
        $start = $limit * $page - $limit;
        if ($start < 0)
            $start = 0;
        $sql_query = $this->db->query($sql . " limit $start, $limit");
        $rows = $sql_query->result_array();
        $responce->page = $page;
        $responce->total = $total_pages;
        $responce->records = $count;
        foreach ($rows as $row) {
            $responce->rows[$i]['id'] = $row['host_body_id'];
            $status = $row['host_body_status'] == 0 ? 'Inactive' : 'Active';
            $responce->rows[$i]['cell'] = array($row['host_body_name'], $row['country_name'], $status);
            $i++;
        }
        header("Expires: Sat, 17 Jul 2020 05:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
        header("Cache-Control: no-cache, must-revalidate");
        header("Author: Debashish");
        header("Pragma: no-cache");      
        header("Content-type: text/x-json");
        echo json_encode($responce);
        return '';
    }

    function save_host_body() {
        $data = array(
            'host_body_name' => $_POST['host_body_name'],
            'country_id' => $_POST['country_id']
        );
        $this->db->insert("host_body", $data);
        return true;
    }

    function update_host_body() {
        $host_body_id = $this->session->userdata('host_body_id');
        $data = array(
             'host_body_name' => $_POST['host_body_name'],
             'country_id' => $_POST['country_id']
        );
        $this->db->update("host_body", $data, array('host_body_id' => $host_body_id));
        return true;
    }
   
      function get_host_body_options($sel = '') {

        $sql = $this->db->query("select * from host_body where host_body_status =1 order by host_body_name asc");
        $data = $sql->result_array();
        $rows = $data;
        $opt = '<option value="">--Select host_body--</option>';
        foreach ($rows as $value) {
            if ($value['host_body_id'] == $sel) {
                $opt.='<option value="' . $value['host_body_id'] . '" selected="selected">' . $value['host_body_name'] . '</option>';
            } else {
                $opt.='<option value="' . $value['host_body_id'] . '">' . $value['host_body_name'] . '</option>';
            }
        }
        return $opt;
    }
    
     function get_country_options($sel = '') {

        $sql = $this->db->query("select * from country where country_status =1 order by country_name asc");
        $data = $sql->result_array();
        $rows = $data;
        $opt = '<option value="">--Select Country--</option>';
        foreach ($rows as $value) {
            if ($value['country_id'] == $sel) {
                $opt.='<option value="' . $value['country_id'] . '" selected="selected">' . $value['country_name'] . '</option>';
            } else {
                $opt.='<option value="' . $value['country_id'] . '">' . $value['country_name'] . '</option>';
            }
        }
        return $opt;
    }
    
    
    
    function get_host_body_options_ajax($country_id='', $sel='') {
        if (is_numeric($country_id)) {
            $con = ' and country_id=' . $country_id;
        } else {
            $con = '';
        }
        $arr = sql::rows('host_body', "host_body_status=1 $con order by host_body_name asc");
        $opt.='<option value=""> Select Host Body </option>';
        foreach ($arr as $val) {
            if ($sel == $val['host_body_id']) {
                $opt.='<option value="' . $val['host_body_name'] . '" selected="selected">' . $val['host_body_name'] . '</option>';
            } else {
                $opt.='<option value="' . $val['host_body_name'] . '">' . $val['host_body_name'] . '</option>';
            }
        }
        return $opt;
    }
    
    
}

?>
