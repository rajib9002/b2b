<?php

class competitionr_model extends Model {

    function __construct() {
        parent::Model();
    }

    function get_competitionr_grid() {
        $sortname = common::getVar('sidx', 'competitionr_id');
        $sortorder = common::getVar('sord', 'ASC');
        $sort = "ORDER BY $sortname $sortorder";
        $tname = $_REQUEST['competitionr_name'];
        $con = "1";
        if ($tname != '') {
            $con = "competitionr_name like '$tname%'";
        }
        $sql = "select competitionr.*,country.country_name,country.image from competitionr
        left join country on country.country_id=competitionr.competitionr_country where $con $sort ";

        $page = common::getVar('page', 1);
        $limit = common::getVar('rows');
        $i = 0;
        $query = $this->db->query($sql);
        $count = sql::count('competitionr', $con);
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
            $responce->rows[$i]['id'] = $row['competitionr_id'];
           $image = '<img src="../uploads/country/' . $row['image'] . '"  width="50" height="30"  />';
            $status = $row['competitionr_status'] == 0 ? 'Inactive' : 'Active';
            $category_id=$row['category_id'] == 1? 'Amateur' : 'Professional';
            $dis=common::get_discipline_name($row['discipline_id']);
            $responce->rows[$i]['cell'] = array($row['competitionr_name'],$category_id,$dis,$row['competitionr_host_club'],$row['country_name'],$image,$status);
            //$responce->rows[$i]['cell'] = array($row['competitionr_name'],$category_id,$dis,$row['competitionr_host_club'],$row['country_name'],$image,$row['competitionr_date'], $status);
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

    function save_competitionr() {
        
        //$year=date('Y', strtotime($_POST['competitionr_date']));
         $year=$_POST['competitionr_year'];
        
        $data = array(
            'competitionr_name' => $_POST['competitionr_name'],
            'category_id' => $_POST['category_id'],
            'discipline_id' => $_POST['discipline_id'],
            'competitionr_host_club' => $_POST['competitionr_host_club'],
            'competitionr_country' => $_POST['country_id']
        );

        $this->db->insert("competitionr", $data);
        return true;
    }

    function update_competitionr() {
        $competitionr_id = $this->session->userdata('competitionr_id');
        //$year=date('Y', strtotime($_POST['competitionr_date']));
        $year=date('Y', strtotime($_POST['competitionr_year']));
        
        
        $data = array(
            'competitionr_name' => $_POST['competitionr_name'],
            'category_id' => $_POST['category_id'],
            'discipline_id' => $_POST['discipline_id'],
            'competitionr_host_club' => $_POST['competitionr_host_club'],
            'competitionr_country' => $_POST['country_id']
        );
        $this->db->update("competitionr", $data, array('competitionr_id' => $competitionr_id));
        return true;
    }

}

?>
