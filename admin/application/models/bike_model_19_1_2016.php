<?php

class bike_model extends Model {

    function __construct() {
        parent::Model();
    }

    function get_bike_model_grid() {
        $sortname = common::getVar('sidx', 'model_id');
        $sortorder = common::getVar('sord', 'ASC');
        $sort = "ORDER BY $sortname $sortorder";
        $cname = $_REQUEST['model_name'];
        $con = "1";
        if ($cname != '') {
            $con .= " and model_name like '$cname%'";
        }
        $sql = "select model.*, type.type_name, make.make_name, main_type.type_name as main_type_name from model 
            left join make on make.make_id=model.make_id
            left join type on type.type_id=model.type_id 
            left join main_type on main_type.main_type_id=model.main_type_id        
            where $con $sort ";

        $page = common::getVar('page', 1);
        $limit = common::getVar('rows');
        $i = 0;
        $query = $this->db->query($sql);
        $count = sql::count('model', $con);
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
            $responce->rows[$i]['id'] = $row['model_id'];
            $status = $row['model_status'] == 0 ? 'Inactive' : 'Active';
            $responce->rows[$i]['cell'] = array($row['make_name'], $row['model_name'], $row['main_type_name'], $row['type_name'], $status);
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

    function save_bike_model() {
        $data = array(
            'model_name' => $_POST['model_name'],
            'main_type_id' => $_POST['main_type_id'],
            'type_id' => $_POST['type_id'],
            'make_id' => $_POST['make_id']
        );

        $this->db->insert("model", $data);
        return true;
    }

    function update_bike_model() {
        $model_id = $this->session->userdata('model_id');
        $data = array(
            'model_name' => $_POST['model_name'],
            'main_type_id' => $_POST['main_type_id'],
            'type_id' => $_POST['type_id'],
            'make_id' => $_POST['make_id']
        );
        $this->db->update("model", $data, array('model_id' => $model_id));
        return true;
    }

    function get_bike_make_grid() {
        $sortname = common::getVar('sidx', 'make_id');
        $sortorder = common::getVar('sord', 'ASC');
        $sort = "ORDER BY $sortname $sortorder";
        $cname = $_REQUEST['make_name'];
        $con = "1";
        if ($cname != '') {
            $con .= " and make_name like '$cname%'";
        }
        $sql = "select * from make            
            where $con $sort ";

        $page = common::getVar('page', 1);
        $limit = common::getVar('rows');
        $i = 0;
        $query = $this->db->query($sql);
        $count = sql::count('make', $con);
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
            $responce->rows[$i]['id'] = $row['make_id'];
            $status = $row['make_status'] == 0 ? 'Inactive' : 'Active';
            $responce->rows[$i]['cell'] = array($row['make_name'], $status);
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

    function save_bike_make() {
        $data = array(
            'make_name' => $_POST['make_name']
        );

        $this->db->insert("make", $data);
        return true;
    }

    function update_bike_make() {
        $make_id = $this->session->userdata('make_id');
        $data = array(
            'make_name' => $_POST['make_name']
        );
        $this->db->update("make", $data, array('make_id' => $make_id));
        return true;
    }

    function get_bike_type_grid() {
        $sortname = common::getVar('sidx', 'main_type_id');
        $sortorder = common::getVar('sord', 'asc');
        $sort = "ORDER BY $sortname $sortorder";
        $tname = $_REQUEST['type_name'];
        $con = "1";
        if ($tname != '') {
            $con .= " and type_name like '$tname%'";
        }
        $sql = "select * from main_type where $con $sort ";
        $page = common::getVar('page', 1);
        $limit = common::getVar('rows');
        $i = 0;
        $query = $this->db->query($sql);
        $count = $query->num_rows();
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

        $parent = 0;
        $query = $this->db->query($sql . " limit $start, $limit");
        $rows = $query->result_array();
        $k = 0;
        $responce->page = $page;
        $responce->total = $total_pages;
        $responce->records = $count;
        foreach ($rows as $row) {
            $responce->rows[$i]['id'] = $row['main_type_id'];
            $status = $row['type_status'] == 0 ? 'Inactive' : 'Active';
            $img = '<img src="../uploads/bike_type_image/' . $row['type_image'] . '" width="50" height="30"  />';
            $type_name = "<b>" . $row['type_name'] . "</b>";
            $scat = sql::rows("type", "main_type_id='$row[main_type_id]'");
            $responce->rows[$i]['cell'] = array($type_name, $img, $status);
            $i++;
            foreach ($scat as $scat) {
                $responce->rows[$i]['id'] = $scat['type_id'];
                $img = '<img src="../uploads/bike_type_image/' . $scat['type_image'] . '"  width="50" height="30"  />';
                $pr = sql::count("type", "type_id='$scat[type_id]' and type_status!=0");
                $category_name = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font-size='1'>" . $scat['type_name'] . "</font>";
                $status = $scat['type_status'] == 0 ? 'Inactive' : 'Active';
                $responce->rows[$i]['cell'] = array($category_name, $img, $status);
                $i++;
            }
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

    function save_bike_type() {
        $img = '';
        if ($_FILES['image']['name'] != '') {
            $image = $this->add_image();
        }
        $data = array(
            'main_type_id' => $_POST['main_type_id'],
            'type_name' => $_POST['type_name'],
            'description_type' => $_POST['description_type'],
            'type_image' => "$image"
        );

        $this->db->insert("type", $data);
        return true;
    }

    function update_bike_type() {
        $type_id = $this->session->userdata('type_id');
        $imgage = '';
        if ($_FILES['image']['name'] != '') {
            $image = $this->add_image($_POST['h_image']);
        } else {
            $image = $_POST['h_image'];
        }
        $data = array(
            'main_type_id' => $_POST['main_type_id'],
            'type_name' => $_POST['type_name'],
            'description_type' => $_POST['description_type'],
            'type_image' => "$image"
        );
        $this->db->update("type", $data, array('type_id' => $type_id));
        return true;
    }

    function get_bike_main_type_grid() {
        $sortname = common::getVar('sidx', 'main_type_id');
        $sortorder = common::getVar('sord', 'asc');
        $sort = "ORDER BY $sortname $sortorder";
        $tname = $_REQUEST['type_name'];
        $con = "1";
        if ($tname != '') {
            $con .= " and type_name like '$tname%'";
        }
        $sql = "select * from main_type where $con $sort ";
        $page = common::getVar('page', 1);
        $limit = common::getVar('rows');
        $i = 0;
        $query = $this->db->query($sql);
        $count = $query->num_rows();
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

        $parent = 0;
        $query = $this->db->query($sql . " limit $start, $limit");
        $rows = $query->result_array();
        $k = 0;
        $responce->page = $page;
        $responce->total = $total_pages;
        $responce->records = $count;
        foreach ($rows as $row) {
            $responce->rows[$i]['id'] = $row['main_type_id'];
            $status = $row['type_status'] == 0 ? 'Inactive' : 'Active';
            $img = '<img src="../uploads/bike_type_image/' . $row['type_image'] . '" width="50" height="30"  />';
            $type_name = $row['type_name'];
            $responce->rows[$i]['cell'] = array($type_name, $img, $status);
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

    function save_bike_main_type() {
        $img = '';
        if ($_FILES['image']['name'] != '') {
            $image = $this->add_image();
        }
        $data = array(
            'type_name' => $_POST['type_name'],
            'type_image' => "$image"
        );

        $this->db->insert("main_type", $data);
        return true;
    }

    function update_bike_main_type() {
        $type_id = $this->session->userdata('main_type_id');
        $imgage = '';
        if ($_FILES['image']['name'] != '') {
            $image = $this->add_image($_POST['h_image']);
        } else {
            $image = $_POST['h_image'];
        }
        $data = array(
            'type_name' => $_POST['type_name'],
            'type_image' => "$image"
        );
        $this->db->update("main_type", $data, array('main_type_id' => $type_id));
        return true;
    }

    function get_main_type($sel='') {
        $con = '';
        $types = sql::rows('main_type', "type_status!=0 $con order by main_type_id");
        $opt = "";
        foreach ($types as $type) {
            if ($type['main_type_id'] == $sel) {
                $opt.="<option value='{$type['main_type_id']}' selected='selected' >{$type['type_name']}</option>";
            } else {
                $opt.="<option value='{$type['main_type_id']}' >{$type['type_name']}</option>";
            }
        }
        return $opt;
    }

    function add_image($pre_image='') {
        $param['dir'] = UPLOAD_PATH . "bike_type_image/";
        $param['type'] = "jpg,png,gif,jpeg";

        if (class_exists('zupload')) {
            $this->zupload->setUploadDir(UPLOAD_PATH . 'bike_type_image/');
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

    function get_type_options($sel = '') {
        $sql = $this->db->query("select * from type where type_status =1 and type_parent_id=0 order by type_name asc");
        $p_data = $sql->result_array();
        $p = $p_data;
        $opt.= "<option value=''>Select Type</option>";
        foreach ($p as $p) {
            $opt.="<optgroup style='font-weight:bold' label='{$p[type_name]}'>";
            $sql = $this->db->query("select * from type where type_status =1 and type_parent_id=$p[type_id] order by type_name asc");
            $data = $sql->result_array();
            $rows = $data;
            foreach ($rows as $value) {
                if ($value['type_id'] == $sel) {
                    $opt.='<option value="' . $value['type_id'] . '" selected="selected">' . $value['type_name'] . '</option>';
                } else {
                    $opt.='<option value="' . $value['type_id'] . '">' . $value['type_name'] . '</option>';
                }
            }
            $opt.=" </optgroup>";
        }
        return $opt;
    }

    function get_model_options($sel = '') {
        $sql = $this->db->query("select * from model where model_status =1 order by model_name asc");
        $data = $sql->result_array();
        $rows = $data;
        $opt = '<option value="">--Select Model--</option>';
        foreach ($rows as $value) {
            if ($value['model_id'] == $sel) {
                $opt.='<option value="' . $value['model_id'] . '" selected="selected">' . $value['model_name'] . '</option>';
            } else {
                $opt.='<option value="' . $value['model_id'] . '">' . $value['model_name'] . '</option>';
            }
        }
        return $opt;
    }

    function get_make_options($sel = '') {

        $sql = $this->db->query("select * from make where make_status =1 order by make_name asc");
        $data = $sql->result_array();
        $rows = $data;
        $opt = '<option value="">--Select Make--</option>';
        foreach ($rows as $value) {
            if ($value['make_id'] == $sel) {
                $opt.='<option value="' . $value['make_id'] . '" selected="selected">' . $value['make_name'] . '</option>';
            } else {
                $opt.='<option value="' . $value['make_id'] . '">' . $value['make_name'] . '</option>';
            }
        }
        return $opt;
    }

    function get_type_options_ajax($main_type_id='', $type_id='') {
        if (is_numeric($main_type_id)) {
            $con = ' and main_type_id=' . $main_type_id;
        } else {
            $con = '';
        }
        $arr = sql::rows('type', "type_status=1 $con order by type_id desc");
        $opt.='<option value=""> Select Type </option>';
        foreach ($arr as $val) {
            if ($type_id == $val['type_id']) {
                $opt.='<option value="' . $val['type_id'] . '" selected="selected">' . $val['type_name'] . '</option>';
            } else {
                $opt.='<option value="' . $val['type_id'] . '">' . $val['type_name'] . '</option>';
            }
        }
        return $opt;
    }

}

?>
