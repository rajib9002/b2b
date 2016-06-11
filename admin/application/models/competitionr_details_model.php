<?php

class competitionr_details_model extends Model {

    function __construct() {
        parent::Model();
    }

    function get_competitionr_details_grid() {
        $sortname = common::getVar('sidx', 'competitionr_details_id');
        $sortorder = common::getVar('sord', 'ASC');
        $sort = "ORDER BY $sortname $sortorder";
        $tname = $_REQUEST['competitionr_details_name'];
        $con = "1";
        if ($tname != '') {
            $con = "competitionr_name like '$tname%'";
        }
        $sql = "select competitionr_details.*,competitionr.competitionr_host_club,competitionr.competitionr_name, country.country_name from competitionr_details
        left join competitionr on competitionr.competitionr_id=competitionr_details.competitionr_id
        left join country on country.country_id=competitionr_details.country_id
        
        where $con $sort ";

        $page = common::getVar('page', 1);
        $limit = common::getVar('rows');
        $i = 0;
        $query = $this->db->query($sql);
        $count = sql::count('competitionr_details', $con);
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
            $responce->rows[$i]['id'] = $row['competitionr_details_id'];
            $image = '<img src="../uploads/country/' . $row['image'] . '"  width="50" height="30"  />';
            $status = $row['competitionr_details_status'] == 0 ? 'Inactive' : 'Active';
            $club_and_country = $row['competitionr_details_host_club'] . ', ' . $row['country_name'];
            $responce->rows[$i]['cell'] = array($row['competitionr_name'], $row['competitionr_details_round'], $club_and_country,  $row['competitionr_details_date'],$row['year'], $status);
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

    function save_competitionr_details() {
        $competition_round = trim($_POST['competitionr_details_round']);
        $data = array(
            'competitionr_id' => $_POST['competitionr_id'],
            'competitionr_details_round' => "$competition_round",
            'country_id' => $_POST['country_id'],
            'host_country_id' => $_POST['host_country_id'],
            'competitionr_details_host_club' => $_POST['competitionr_details_host_club'],
            'competitionr_details_date' => $_POST['competitionr_details_date'],
            'year' => $_POST['year']
        );

        $this->db->insert("competitionr_details", $data);
        return true;
    }

    function update_competitionr_details() {
        $competitionr_details_id = $this->session->userdata('competitionr_details_id');
        $competition_round = trim($_POST['competitionr_details_round']);
        $data = array(
            'competitionr_id' => $_POST['competitionr_id'],
            'competitionr_details_round' => "$competition_round",
            'country_id' => $_POST['country_id'],
            'host_country_id' => $_POST['host_country_id'],
            'competitionr_details_host_club' => $_POST['competitionr_details_host_club'],
            'competitionr_details_date' => $_POST['competitionr_details_date'],
            'year' => $_POST['year']
        );
        $this->db->update("competitionr_details", $data, array('competitionr_details_id' => $competitionr_details_id));
        return true;
    }

    function get_competition_options($country_id='', $sel='') {
        if (is_numeric($country_id)) {
            $con = ' and competitionr_country=' . $country_id;
        } else {
            $con = '';
        }
        $arr = sql::rows('competitionr', "1 $con order by competitionr_name asc", "competitionr_name,competitionr_id");
        $opt.='<option value=""> Select Competition </option>';
        foreach ($arr as $val) {
            if ($sel == $val['competitionr_id']) {
                $opt.='<option value="' . $val['competitionr_id'] . '" selected="selected">' . $val['competitionr_name'] . '</option>';
            } else {
                $opt.='<option value="' . $val['competitionr_id'] . '">' . $val['competitionr_name'] . '</option>';
            }
        }
        return $opt;
    }

    function get_year_options($country_id='', $sel='') {
        if (is_numeric($country_id)) {
            $con = ' and competitionr_country=' . $country_id;
        } else {
            $con = '';
        }
        $arr = sql::rows('competitionr', "1 $con order by competitionr_name asc", "distinct year");
        $opt.='<option value=""> Select Year </option>';
        foreach ($arr as $val) {
            if ($sel == $val['year']) {
                $opt.='<option value="' . $val['year'] . '" selected="selected">' . $val['year'] . '</option>';
            } else {
                $opt.='<option value="' . $val['year'] . '">' . $val['year'] . '</option>';
            }
        }
        return $opt;
    }

    function get_area_options($country_id='', $sel='') {
        if (is_numeric($country_id)) {
            $con = ' and country_id=' . $country_id;
        } else {
            $con = '';
        }
        $arr = sql::rows('area', "area_status=1 $con order by area_name asc");
        $opt.='<option value=""> Select Area </option>';
        foreach ($arr as $val) {
            if ($sel == $val['area_id']) {
                $opt.='<option value="' . $val['area_id'] . '" selected="selected">' . $val['area_name'] . '</option>';
            } else {
                $opt.='<option value="' . $val['area_id'] . '">' . $val['area_name'] . '</option>';
            }
        }
        return $opt;
    }

}

?>
