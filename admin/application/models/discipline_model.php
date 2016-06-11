<?php

class discipline_model extends Model {

    function __construct() {
        parent::Model();
    }

    function get_discipline_grid() {
        $sortname = common::getVar('sidx', 'discipline_id');
        $sortorder = common::getVar('sord', 'ASC');
        $sort = "ORDER BY $sortname $sortorder";
        $tname = $_REQUEST['discipline_name'];
        $con = "1";
        if ($tname != '') {
            $con = "discipline_name like '$tname%'";
        }
        
         $sql = "select * from discipline where $con $sort ";
        
        $page = common::getVar('page', 1);
        $limit = common::getVar('rows');
        $i = 0;
        $query = $this->db->query($sql);
        $count = sql::count('discipline', $con);
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
            $responce->rows[$i]['id'] = $row['discipline_id'];
            $status = $row['discipline_status'] == 0 ? 'Inactive' : 'Active';
            $responce->rows[$i]['cell'] = array($row['discipline_name'], $status);
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

    function save_discipline() {
        $data = array(
            'discipline_name' => $_POST['discipline_name'],
            'discipline_status' => 1
        );
        $this->db->insert("discipline", $data);
        return true;
    }

    function update_discipline() {
        $discipline_id = $this->session->userdata('discipline_id');
        $data = array(
             'discipline_name' => $_POST['discipline_name'],
             'discipline_status' => 1
        );
        $this->db->update("discipline", $data, array('discipline_id' => $discipline_id));
        return true;
    }
   
      function get_discipline_options($sel = '') {
        $sql = $this->db->query("select * from discipline where discipline_status =1 order by discipline_name asc");
        $data = $sql->result_array();
        $rows = $data;
        $opt = '<option value="">--Select discipline--</option>';
        foreach ($rows as $value) {
            if ($value['discipline_id'] == $sel) {
                $opt.='<option value="' . $value['discipline_id'] . '" selected="selected">' . $value['discipline_name'] . '</option>';
            } else {
                $opt.='<option value="' . $value['discipline_id'] . '">' . $value['discipline_name'] . '</option>';
            }
        }
        return $opt;
    }
    
    
       
}

?>
