<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ads_model
 *
 * @author Anwar
 */
class ads_model extends Model {

    function __construct() {
        parent::Model();
    }

    function get_ads_grid($table_name='') {
        
        if($table_name==''){
            $table_name=$this->session->userdata('table_name');
        }
        
        $sortname = common::getVar('sidx', 'bike_id');
        $sortorder = common::getVar('sord', 'desc');
        $sort = "ORDER BY $sortname $sortorder";
        $con = "is_confirm_ad=1 ";
        $type_id = $_REQUEST['type_id'];
        $area_id = $_REQUEST['area_id'];
        $make_id = $_REQUEST['make_id'];
        $model_id = $_REQUEST['model_id'];
        if ($type_id != '') {
            $con.=" and $table_name.type_id=" . $type_id;
        }
        if ($area_id != '') {
            $con.=" and $table_name.area_id=" . $area_id;
        }
        if ($make_id != '') {
            $con.=" and $table_name.make_id=" . $make_id;
        }
        if ($model_id != '') {
            $con.=" and $table_name.model_id=" . $model_id;
        }

      

        $sql = "select $table_name.*,type.*, model.*, make.*, area.*, country.*
               from $table_name
	      left join type on type.type_id=$table_name.type_id
              left join model on model.model_id=$table_name.model_id
              left join make on make.make_id=$table_name.make_id
              left join country on country.country_id=$table_name.country_id
              left join area on area.area_id=$table_name.area_id
               where $con order by $table_name.bike_id desc";

       // echo $sql;
        //$sql = "select * from bike where 1";

        $page = common::getVar('page', 1);
        $limit = common::getVar('rows');
        $i = 0;
        $query = $this->db->query($sql);
        $count = sql::count("$table_name", $con);
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
            $responce->rows[$i]['id'] = $row['bike_id'];
           // $details = $row['make_name'] . '-' . $row['model_name'] . '-' . $row['year'] . '-' . $row['type_name'];
            switch ($row['bike_status']) {
                case 1:
                    $status = 'Show';
                    break;
                case 0:
                    $status = 'Blocked';
                    break;
                default:
                    $status = 'Waiting';
            }

            $responce->rows[$i]['cell'] = array($row['ad_title'], $row['type_name'], $row['make_name'], $row['model_name'], $row['area_name'], $status);
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

    function save_ads() {
        $data = array(
            'ads_name' => $_POST['ads_name']
        );

        $this->db->insert("ads", $data);
        return true;
    }

    function update_ads() {
        $ads_id = $this->session->userdata('ads_id');
        $data = array(
            'ads_name' => $_POST['ads_name']
        );
        $this->db->update("ads", $data, array('ads_id' => $ads_id));
        return true;
    }

    function get_mail_lilst() {
        $sql = $this->db->query("select bike.bike_post_date, bike.bike_id, users.user_email
                from bike
                left join users on users.user_id=bike.user_id
               where bike.send_mail_status=0 and bike_post_date<= date_sub(now() , INTERVAL 2 MONTH )");
        return $sql->result_array();
    }
    
    function add_image($file = '', $title = '') {
        $param['dir'] = UPLOAD_PATH . "bike_image/";
        $param['type'] = FILE_TYPE;
        if (class_exists('zupload')) {
            $this->zupload->setUploadDir(UPLOAD_PATH . 'bike_image/');
        } else {
            $this->load->library('zupload', $param);
        }
        if ($pre_image != "") {
            $this->zupload->delFile($pre_image);
            $this->zupload->delFile("full_" . $pre_image);
        }
        $this->zupload->setFileInputName($file);
        $this->zupload->upload(true);
        $img = $this->zupload->getOutputFileName();
        if (!class_exists('zthumb')) {
            $this->load->library('zthumb');
        }
		$this->zthumb->createThumb($img, "t_" . $img, $param['dir'], $param['dir'], 468, 273, false);  
        return $img;
    }

}

?>
