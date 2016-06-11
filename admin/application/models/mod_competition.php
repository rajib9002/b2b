<?php

class mod_competition extends Model {

    public function __construct() {
        parent::Model();
    }

    function get_description_details($id) {
        $sql = $this->db->query("select * from competition where competition_id = '$id'");
        return $sql->row_array();
    }

  function add_image($pre_image='') {
        $param['dir'] = UPLOAD_PATH . "competition_image/";
        $param['type'] = "jpg,png,gif,jpeg";

        if (class_exists('zupload')) {
            $this->zupload->setUploadDir(UPLOAD_PATH . 'competition_image/');
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

    function delete_image($image_url) {
        $param['dir'] = UPLOAD_PATH . "competition_image/";
        $param['type'] = FILE_TYPE;
        $this->load->library('zupload', $param);
        $this->zupload->delFile($image_url);
        $this->zupload->delFile("234_80_" . $image_url);
        return true;
    }

    function save_product() {
        $file = 'image';
        $image = "";
        if ($_FILES[$file]['name'] != '') {
            $image = $this->add_image($file);
        }
        $data = array(
            'country_id' => $_POST['country_id'],
            'competition_title' => $_POST['competition_title'],
            'competition_des' => $_POST['competition_des'],
            'competition_date' => $_POST['competition_date'],
            'competition_club' => $_POST['competition_club'],
            'competition_venue' => $_POST['competition_venue'],
            'image' =>"$image",
            'status' => '1'
        );

        $this->db->insert("competition", $data);
        return true;
    }

    function edit_description($competition_id='', $image='') {
        $file = 'image';
        if ($_FILES[$file]['name'] != '') {
            $image = $this->add_image($file);
        }

        $sql = "update competition set
        country_id={$this->db->escape($_POST['country_id'])},
        competition_title={$this->db->escape($_POST['competition_title'])},
        competition_des={$this->db->escape($_POST['competition_des'])},
        competition_club={$this->db->escape($_POST['competition_club'])},
        competition_venue={$this->db->escape($_POST['competition_venue'])},
        image='$image',
        competition_date={$this->db->escape($_POST['competition_date'])}    
        where competition_id=$competition_id";
        return $this->db->query($sql);
    }

    function get_description_grid() {
        $sortname = common::getVar('sidx', 'competition_id');
        $sortorder = common::getVar('sord', 'asc');
        $sort = "ORDER BY $sortname $sortorder";
        $field = $_REQUEST['searchField'];
        $value = $_REQUEST['searchValue'];
        $con = " where status<>'1'";
        $con.= ( $field && $value) ? ' and ' . $field . " like " . "'%" . $value . "%'" : '';
        if ($_REQUEST['status'] != '')
            $con.=" and status='$_REQUEST[status]'";

        $sql = "select competition.*,country.country_name from competition
            left join country on country.country_id=competition.country_id where 1";

        $page = common::getVar('page', 1);
        $limit = common::getVar('rows');
        $i = 0;
        $query = $this->db->query($sql);
        $count = count($query->result_array());
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
            $responce->rows[$i]['id'] = $row['competition_id'];
            $status = $row['status'] == 0 ? 'Inactive' : 'Active';
            $type = $row['offers_type'] == 1 ? 'Offers' : 'Fastivity Offers';
            $image = "<img src='../uploads/competition_image/" . $row['image'] . "' alt='image' style='width:64px;height:64px;'/>";
            $responce->rows[$i]['cell'] = array($row['country_name'],$row['competition_title'],$row['competition_club'],$row['competition_venue'], $row['competition_des'], $row['competition_date'], $image, $status);
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

}

?>