<?php

class mod_competition extends Model {

    function _construct() {
        parent::_construct();
    }

    function get_all_competition($limit = false, $start = '', $perpage = '') {

        $con = "where 1  ";

        if ($_POST['country_id'] != '') {
            $con.=" and competitionr_details.country_id='$_POST[country_id]'";
        }
        if ($limit) {
            $limit_sql.=" limit $start,$perpage";
        }
       

        $query = $this->db->query("select year from competitionr_details $con group by year order by year desc $limit_sql");
        return $query->result_array();


//        $sql = "select * from competitionr $con group by year order by year asc $limit_sql";
//        $query = $this->db->query($sql);
//        return $query->result_array();
    }

    function get_all_competition_details($id='',$year='') {
        $sql = "select competitionr.*,country.country_name,competitionr_details.* 
        from competitionr 
        left join country on country.country_id=competitionr.competitionr_country
        left join competitionr_details on competitionr_details.competitionr_id =competitionr.competitionr_id
        where competitionr_details.competitionr_id=$id and competitionr_details.year='$year' order by competitionr_details.competitionr_details_round asc";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
function get_all_competition_details_date($date='') {
        $sql = "select competitionr.*,country.country_name,competitionr_details.* 
        from competitionr 
        left join country on country.country_id=competitionr.competitionr_country
        left join competitionr_details on competitionr_details.competitionr_id =competitionr.competitionr_id
        where  competitionr_details.competitionr_details_date='$date' order by competitionr_details.competitionr_details_round asc";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function get_all_competition_result($year='',$id='', $round_name='', $c_id='') {
        $con = '1';
        if (isset($_POST['search'])) {
            $class_id = $_POST['class_id'];
            $con.=" and competition_result.class_id='$class_id' ";
        } else {
            if ($c_id != '') {
                $con.=" and competition_result.class_id='$c_id' ";
            }
        }
        if ($round_name == '') {
            $round_name = $this->session->userdata('round_name');
        }


        $sql = "select competition_result.*,competitor.*,competitionr.competitionr_name 
        from competition_result 
        left join competitor on competitor.result_id =competition_result.competition_result_id
         left join competitionr on competitionr.competitionr_id =$id
        where $con and competition_result.competition_id=$id and competition_result.round_id='$round_name' and competition_result.year='$year' order by competitor.position asc";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function get_all_competition_total_result($id='',$year='') {

        $con = '1';
        if (isset($_POST['search'])) {
            $class_id = $_POST['class_id'];
            $con.=" and competition_result.class_id='$class_id' ";
        }



        $sql = "select competition_result.*,competitionr.competitionr_name,rider_class.rider_class_name
        from competition_result 
        left join competitionr on competitionr.competitionr_id =$id
        left join rider_class on rider_class.rider_class_id=competition_result.class_id
        where $con and competitionr.competitionr_id='$id' and competition_result.year='$year'";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    function get_all_class_data($id='',$year='') {
        $sql = "select competition_result.*,rider_class.rider_class_name,rider_class.rider_class_sort from competition_result
left join rider_class on rider_class.rider_class_id=competition_result.class_id where competition_result.competition_id=$id and competition_result.year ='$year' group by competition_result.class_id order by rider_class.rider_class_sort asc                
";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

}

?>
