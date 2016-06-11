<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of country_model
 *
 * @author Anwar
 */
class country_model extends Model {

    function __construct() {
        parent::Model();
    }

    function get_country_grid() {
        $sortname = common::getVar('sidx', 'country_id');
        $sortorder = common::getVar('sord', 'ASC');
        $sort = "ORDER BY $sortname $sortorder";
        $tname = $_REQUEST['country_name'];
        $con = "1";
        if ($tname != '') {
            $con = "country_name like '$tname%'";
        }
        $sql = "select * from country where $con $sort ";

        $page = common::getVar('page', 1);
        $limit = common::getVar('rows');
        $i = 0;
        $query = $this->db->query($sql);
        $count = sql::count('country', $con);
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
            $responce->rows[$i]['id'] = $row['country_id'];
            $img = '<img src="../uploads/country/' . $row['image'] . '"  width="50" height="30"  />';
            $status = $row['country_status'] == 0 ? 'Inactive' : 'Active';
            $responce->rows[$i]['cell'] = array($row['country_name'],$row['currency'],$row['amount'],$img,$status);
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

    function add_image($pre_image='') {
        $param['dir'] = UPLOAD_PATH . "country/";
        $param['type'] = "jpg,png,gif,jpeg";

        if (class_exists('zupload')) {
            $this->zupload->setUploadDir(UPLOAD_PATH . 'country/');
        } else {
            $this->load->library('zupload', $param);
        }

        if ($pre_image != "") {
            $this->zupload->delFile($pre_image);
            $this->zupload->delFile("n" . $pre_image);
        }
        $this->zupload->setFileInputName('image');
        $this->zupload->upload(true);
        $img = $this->zupload->getOutputFileName();

        return $img;
    }
    
    
    function save_country() {
        $img = '';
        if ($_FILES['image']['name'] != '') {
            $image = $this->add_image();
        }
        $data = array(
            'country_name' => $_POST['country_name'],
            'currency' => $_POST['currency'],
'amount' => $_POST['amount'],
            'image' => "$image"
        );

        $this->db->insert("country", $data);
        return true;
    }

    function update_country() {
        $imgage = '';
        if ($_FILES['image']['name'] != '') {
            $image = $this->add_image($_POST['h_image']);
        } else {
            $image = $_POST['h_image'];
        }
        $country_id = $this->session->userdata('country_id');
        $data = array(
            'country_name' => $_POST['country_name'],
            'currency' => $_POST['currency'],
'amount' => $_POST['amount'],
            'image' => "$image"
        );
        $this->db->update("country", $data, array('country_id' => $country_id));
        return true;
    }

}

?>
