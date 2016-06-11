<?php

class mod_static_image extends Model {

    function __construct() {
        parent::Model();
    }

    function get_typeGrid() {
        $sortname = common::getVar('sidx', 'id');
        $sortorder = common::getVar('sord', 'asc');
        $sort = "ORDER BY $sortname $sortorder";
        $searchField = common::getVar('searchField');
        $searchValue = common::getVar('searchValue');
        $pid = $_REQUEST['pid'];
        $title= $_REQUEST['title'];
        $status=$_REQUEST['status'];
      $con = " where 1";
        
        if ($_REQUEST['title'] != '')
            $con.=" and static_image.title like '%$_REQUEST[title]%'";
        if ($status != '')
            $con.=" and static_image.status like '%$status%'";

        $sql = "select * from static_image  $con $sort";

        $page = common::getVar('page', 1);
        $limit = common::getVar('rows');
        $i = 0;

        //$count = sql::count('slider as s', $con);
        if ($count > 0) {
            $total_pages = ceil($count / $limit);
        } else {
            $total_pages = 5;
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
            $status = $row[status] == '1' ? 'Active' : 'Inactive';
            $image = "<img src='../uploads/static_image/" . $row['image'] . "' alt='image' style='width:64px;height:64px;'/>";
            $responce->rows[$i]['id'] = $row['id'];
            $responce->rows[$i]['cell'] = array($row['title'], $image, $status);
            $i++;
        }
        header("Expires: Sat, 17 Jul 2010 05:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
        header("Cache-Control: no-cache, must-revalidate");
        header("Pragma: no-cache");
        header("Author: Md. Anwar Hossain");
        header("Email: anwarworld@gmail.com");
        header("Content-type: text/x-json");
        echo json_encode($responce);
        return '';
    }

    function add_static_image() {
        $file = 'static_image';
        $image = "";
        if ($_FILES[$file]['name'] != '') {
            $image = $this->add_image($file);
        }
        $data = array(
            'title' => $_POST['title'],
            'image' => "$image",
            'status' => 1
        );
        $this->db->insert('static_image', $data);
        return true;
    }

    function add_image($file='', $pre_image='') {

        $param['dir'] = UPLOAD_PATH . "static_image/";
        $param['type'] = "jpg,png,gif,jpeg";

        if (class_exists('zupload')) {
            $this->zupload->setUploadDir(UPLOAD_PATH . 'static_image/');
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
        //$this->zthumb->createThumb($img, "full_" . $img, $param['dir'], $param['dir'], 510, 319, false);
        return $img;
    }
    
    
    
       function update_static_image($id='',$image=''){
        $file = 'static_image';
        if ($_FILES[$file]['name'] != '') {
            $image = $this->add_image($file);
        }

       $sql = "update static_image set
        title={$this->db->escape($_POST['title'])},
        image='$image' 
        where id=$id";
        return $this->db->query($sql);
    }

}

?>
