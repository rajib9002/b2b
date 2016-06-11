<?php

class club_model extends Model {

    function __construct() {
        parent::Model();
    }

    function get_club_grid() {
        $sortname = common::getVar('sidx', 'club_id');
        $sortorder = common::getVar('sord', 'ASC');
        $sort = "ORDER BY $sortname $sortorder";
        $tname = $_REQUEST['club_name'];
        $con = "1";
        if ($tname != '') {
            $con = "club_name like '$tname%'";
        }
        
         $sql = "select country.*, club.* from club
            left join country on country.country_id=club.country_id
        where $con $sort ";
        
        $page = common::getVar('page', 1);
        $limit = common::getVar('rows');
        $i = 0;
        $query = $this->db->query($sql);
        $count = sql::count('club', $con);
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
            $responce->rows[$i]['id'] = $row['club_id'];
            $status = $row['club_status'] == 0 ? 'Inactive' : 'Active';
            $responce->rows[$i]['cell'] = array($row['club_name'],$row['club_short_name'], $row['country_name'], $status);
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

    function save_club() {
        $data = array(
            'club_name' => $_POST['club_name'],
            'club_short_name' => $_POST['club_short_name'],
            'country_id' => $_POST['country_id']
        );
        $this->db->insert("club", $data);
        return true;
    }

    function update_club() {
        $club_id = $this->session->userdata('club_id');
        $data = array(
             'club_name' => $_POST['club_name'],
             'club_short_name' => $_POST['club_short_name'],
             'country_id' => $_POST['country_id']
        );
        $this->db->update("club", $data, array('club_id' => $club_id));
        return true;
    }
   
      function get_club_options($sel = '') {

        $sql = $this->db->query("select * from club where club_status =1 order by club_name asc");
        $data = $sql->result_array();
        $rows = $data;
        $opt = '<option value="">--Select Club--</option>';
        foreach ($rows as $value) {
            if ($value['club_id'] == $sel) {
                $opt.='<option value="' . $value['club_id'] . '" selected="selected">' . $value['club_name'] . '</option>';
            } else {
                $opt.='<option value="' . $value['club_id'] . '">' . $value['club_name'] . '</option>';
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
    
    
    
    function get_club_options_ajax($country_id='', $sel='') {
        if (is_numeric($country_id)) {
            $con = ' and country_id=' . $country_id;
        } else {
            $con = '';
        }
        $arr = sql::rows('club', "club_status=1 $con order by club_name asc");
        $opt.='<option value=""> Select Culb </option>';
        foreach ($arr as $val) {
            if ($sel == $val['club_id']) {
                $opt.='<option value="' . $val['club_name'] . '" selected="selected">' . $val['club_name'] . '</option>';
            } else {
                $opt.='<option value="' . $val['club_name'] . '">' . $val['club_name'] . '</option>';
            }
        }
        return $opt;
    }
    
    
}

?>
