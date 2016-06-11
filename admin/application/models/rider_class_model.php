<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of rider_class_model
 *
 * @author Anwar
 */
class rider_class_model extends Model {

    function __construct() {
        parent::Model();
    }

    function get_rider_class_grid() {
        $sortname = common::getVar('sidx', 'rider_class_id');
        $sortorder = common::getVar('sord', 'ASC');
        $sort = "ORDER BY $sortname $sortorder";
        $tname = $_REQUEST['rider_class_name'];
        $con = "1";
        if ($tname != '') {
            $con = "rider_class_name like '$tname%'";
        }
        $sql = "select * from rider_class where $con $sort ";

        $page = common::getVar('page', 1);
        $limit = common::getVar('rows');
        $i = 0;
        $query = $this->db->query($sql);
        $count = sql::count('rider_class', $con);
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
            $responce->rows[$i]['id'] = $row['rider_class_id'];
            $status = $row['rider_class_status'] == 0 ? 'Inactive' : 'Active';
            $responce->rows[$i]['cell'] = array($row['rider_class_name'], $status);
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

    function save_rider_class() {
        $data = array(
            'rider_class_name' => $_POST['rider_class_name']
        );

        $this->db->insert("rider_class", $data);
        return true;
    }

    function update_rider_class() {
        $rider_class_id = $this->session->userdata('rider_class_id');
        $data = array(
            'rider_class_name' => $_POST['rider_class_name']
        );
        $this->db->update("rider_class", $data, array('rider_class_id' => $rider_class_id));
        return true;
    }

}

?>
