<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of area_model
 *
 * @author Anwar
 */
class area_model extends Model {

    function __construct() {
        parent::Model();
    }

    function get_area_grid() {
        $sortname = common::getVar('sidx', 'area_id');
        $sortorder = common::getVar('sord', 'ASC');
        $sort = "ORDER BY $sortname $sortorder";
        $tname = $_REQUEST['area_name'];
        $con = "1";
        if ($tname != '') {
            $con = "area_name like '$tname%'";
        }
        $sql = "select country.*, area.* from area
            left join country on country.country_id=area.country_id
        where $con $sort ";

        $page = common::getVar('page', 1);
        $limit = common::getVar('rows');
        $i = 0;
        $query = $this->db->query($sql);
        $count = sql::count('area', $con);
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
            $responce->rows[$i]['id'] = $row['area_id'];
            $status = $row['area_status'] == 0 ? 'Inactive' : 'Active';
            $responce->rows[$i]['cell'] = array($row['area_name'], $row['country_name'], $status);
            $i++;
        }
        header("Expires: Sat, 17 Jul 2010 05:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
        header("Cache-Control: no-cache, must-revalidate");
        header("Pragma: no-cache");
        header("Author: Shoumitra Dhar Sunny");
        header("Email: suned_p@yahoo.com");
        header("Content-type: text/x-json");
        echo json_encode($responce);
        return '';
    }

    function save_area() {
        $data = array(
            'area_name' => $_POST['area_name'],
            'country_id' => $_POST['country_id']
        );

        $this->db->insert("area", $data);
        return true;
    }

    function update_area() {
        $area_id = $this->session->userdata('area_id');
        $data = array(
             'area_name' => $_POST['area_name'],
            'country_id' => $_POST['country_id']
        );
        $this->db->update("area", $data, array('area_id' => $area_id));
        return true;
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
      function get_area_options($sel = '') {

        $sql = $this->db->query("select * from area where area_status =1 order by area_name asc");
        $data = $sql->result_array();
        $rows = $data;
        $opt = '<option value="">--Select Bank--</option>';
        foreach ($rows as $value) {
            if ($value['area_id'] == $sel) {
                $opt.='<option value="' . $value['area_id'] . '" selected="selected">' . $value['area_name'] . '</option>';
            } else {
                $opt.='<option value="' . $value['area_id'] . '">' . $value['area_name'] . '</option>';
            }
        }
        return $opt;
    }
    
    
}

?>
