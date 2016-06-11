<?php

class rider_model extends Model {

    function __construct() {
        parent::Model();
    }

    function get_rider_grid() {
        $sortname = common::getVar('sidx', 'rider_id');
        $sortorder = common::getVar('sord', 'ASC');
        $sort = "ORDER BY $sortname $sortorder";
        $tname = $_REQUEST['rider_name'];
        $con = "1";
        if ($tname != '') {
            $con = "rider.rider_first_name like '$tname%'";
        }
        $sql = "select rider.*,rider_class.rider_class_name,country.country_name,competitionr.competitionr_name
        from rider
        left join rider_class on rider_class.rider_class_id=rider.class_id
        left join country on country.country_id=rider.country_id 
        left join competitionr on competitionr.competitionr_id=rider.competitionr_id where $con group by rider_number $sort ";

        $page = common::getVar('page', 1);
        $limit = common::getVar('rows');
        $i = 0;
        $query = $this->db->query($sql);
        $count = sql::count('rider', $con);
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
            $responce->rows[$i]['id'] = $row['rider_id'];
            $image = '<img src="../uploads/country/' . $row['image'] . '"  width="50" height="30"  />';
            $status = $row['rider_status'] == 0 ? 'Inactive' : 'Active';
            $responce->rows[$i]['cell'] = array($row['rider_number'], $row['rider_first_name'], $row['rider_last_name'], $row['country_name'], $row['rider_class_name'], $status);
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

    function save_rider() {
        $inc = 0;
        foreach ($_POST['pro_serial'] as $val) {
            $data = array(
                'rider_number' => $_POST['rider_number'],
                'rider_first_name' => $_POST['rider_first_name'],
                'rider_last_name' => $_POST['rider_last_name'],
                'country_id' => $_POST['country_id'],
                'class_id' => $_POST['class_id'],
                'competitionr_id' => $_POST['competitionr_id'][$inc]
            );
            $this->db->insert("rider", $data);
            $inc++;
        }
        return true;
    }

    function update_rider() {
		$this->db->query("delete from rider where rider_number='$_POST[rider_number_s]' and rider_first_name='$_POST[rider_first_s]' and rider_last_name='$_POST[rider_last_s]' and country_id='$_POST[rider_country_s]' and class_id='$_POST[rider_class_s]'");
		
	$inc = 0;
        foreach ($_POST['pro_serial'] as $val) {
            $data = array(
                'rider_number' => $_POST['rider_number'],
                'rider_first_name' => $_POST['rider_first_name'],
                'rider_last_name' => $_POST['rider_last_name'],
                'country_id' => $_POST['country_id'],
                'class_id' => $_POST['class_id'],
                'competitionr_id' => $_POST['competitionr_id'][$inc]
            );
            $this->db->insert("rider", $data);
            $inc++;
        }
        return true;
    }
    
   function get_competitionr_options($sel = '') {
        $sql = $this->db->query("select * from competitionr where competitionr_status =1 order by competitionr_name asc");
        $data = $sql->result_array();
        $rows = $data;
        $opt = '<option value="">Select Competiton Name</option>';
        foreach ($rows as $value) {
            if ($value['competitionr_id'] == $sel) {
                $opt.='<option value="' . $value['competitionr_id'] . '" selected="selected">' . $value['competitionr_name'] . '</option>';
            } else {
                $opt.='<option value="' . $value['competitionr_id'] . '">' . $value['competitionr_name'] . '</option>';
            }
        }
        return $opt;
    }

}

?>
