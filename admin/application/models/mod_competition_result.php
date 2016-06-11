<?php

class mod_competition_result extends Model {

    public function __construct() {
        parent::Model();
    }

    function get_description_details($id) {
        $sql = $this->db->query("select * from competition_result where competition_result_id = '$id'");
        return $sql->row_array();
    }

    function add_image($pre_image='') {
        $param['dir'] = UPLOAD_PATH . "competition_result_image/";
        $param['type'] = "jpg,png,gif,jpeg";

        if (class_exists('zupload')) {
            $this->zupload->setUploadDir(UPLOAD_PATH . 'competition_result_image/');
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
        $param['dir'] = UPLOAD_PATH . "competition_result_image/";
        $param['type'] = FILE_TYPE;
        $this->load->library('zupload', $param);
        $this->zupload->delFile($image_url);
        $this->zupload->delFile("234_80_" . $image_url);
        return true;
    }

    function save_product() {
        $result_id = $this->add_product_table();
        if (count($_POST['pro_serial']) > 0) {
            $inc = 0;
            foreach ($_POST['pro_serial'] as $val) {
                $competition_round = trim($_POST['competitionr_details_id']);
                $this->db->query("insert into competitor set
                                result_id=$result_id,
                                competition_id={$this->db->escape($_POST['competitionr_id'])},
                                class_id={$this->db->escape($_POST['class_id'])},
                                round_id={$this->db->escape($competition_round)},
                                position={$this->db->escape($_POST['position'][$inc])},
                                start={$this->db->escape($_POST['start'][$inc])},
                                competitor={$this->db->escape($_POST['competitor'][$inc])},
                                r1_score={$this->db->escape($_POST['r1_score'][$inc])},
                                r2_score={$this->db->escape($_POST['r2_score'][$inc])},
                                r3_score={$this->db->escape($_POST['r3_score'][$inc])},
                                r4_score={$this->db->escape($_POST['r4_score'][$inc])},
                                r5_score={$this->db->escape($_POST['r5_score'][$inc])},
                                r6_score={$this->db->escape($_POST['r6_score'][$inc])},
                                r7_score={$this->db->escape($_POST['r7_score'][$inc])},
                                total={$this->db->escape($_POST['total'][$inc])}
                                ");
                $inc++;
            }
        }
        return $result_id;
    }

    function add_product_table() {
        $date = date('Y-m-d');
        $competition_round = trim($_POST['competitionr_details_id']);
        $sql = "insert into competition_result set
                competition_id={$this->db->escape($_POST['competitionr_id'])},
                year={$this->db->escape($_POST['year'])},
                class_id={$this->db->escape($_POST['class_id'])},
                round_id={$this->db->escape($competition_round)},
                competition_result_date={$this->db->escape($date)}
";
        $this->db->query($sql);
        $result_id = $this->db->insert_id();
        return $result_id;
    }

    function edit_description($competition_result_id='') {
        $result_id = $this->update_product_table($competition_result_id);
        $this->db->query("delete from competitor where result_id=$competition_result_id");
        if (count($_POST['pro_serial']) > 0) {
            $inc = 0;
            foreach ($_POST['pro_serial'] as $val) {
                $competition_round = trim($_POST['competitionr_details_id']);
                $this->db->query("insert into competitor set
                                result_id=$result_id,
                                competition_id={$this->db->escape($_POST['competitionr_id'])},
                                year={$this->db->escape($_POST['year'])},
                                class_id={$this->db->escape($_POST['class_id'])},
                                round_id={$this->db->escape($competition_round)},
                                position={$this->db->escape($_POST['position'][$inc])},
                                start={$this->db->escape($_POST['start'][$inc])},
                                competitor={$this->db->escape($_POST['competitor'][$inc])},
                                r1_score={$this->db->escape($_POST['r1_score'][$inc])},
                                r2_score={$this->db->escape($_POST['r2_score'][$inc])},
                                r3_score={$this->db->escape($_POST['r3_score'][$inc])},
                                r4_score={$this->db->escape($_POST['r4_score'][$inc])},
                                r5_score={$this->db->escape($_POST['r5_score'][$inc])},
                                r6_score={$this->db->escape($_POST['r6_score'][$inc])},
                                r7_score={$this->db->escape($_POST['r7_score'][$inc])},
                                total={$this->db->escape($_POST['total'][$inc])}
                                ");
                $inc++;
            }
        }
        return $result_id;
    }

    function update_product_table($competition_result_id='') {
        $date = date('Y-m-d');
        $competition_round = trim($_POST['competitionr_details_id']);
        $sql = "update competition_result set
                competition_id={$this->db->escape($_POST['competitionr_id'])},
                year={$this->db->escape($_POST['year'])},
                class_id={$this->db->escape($_POST['class_id'])},
                round_id={$this->db->escape($competition_round)},
                competition_result_date={$this->db->escape($date)}
                where competition_result_id=$competition_result_id
";
        $this->db->query($sql);
        return $competition_result_id;
    }

    function get_description_grid() {
        $sortname = common::getVar('sidx', 'competition_result_id');
        $sortorder = common::getVar('sord', 'asc');
        $sort = "ORDER BY $sortname $sortorder";
        $field = $_REQUEST['searchField'];
        $value = $_REQUEST['searchValue'];
        $con = " where status<>'1'";
        $con.= ( $field && $value) ? ' and ' . $field . " like " . "'%" . $value . "%'" : '';
        if ($_REQUEST['status'] != '')
            $con.=" and status='$_REQUEST[status]'";

        $sql = "SELECT competition_result. * , competitionr.competitionr_name, rider_class.rider_class_name, competitionr_details.competitionr_details_round
                FROM competition_result
                LEFT JOIN competitionr ON competitionr.competitionr_id = competition_result.competition_id
                LEFT JOIN rider_class ON rider_class.rider_class_id = competition_result.class_id
                LEFT JOIN competitionr_details ON competitionr_details.competitionr_details_id = competition_result.round_id
                WHERE 1 ";

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
            $responce->rows[$i]['id'] = $row['competition_result_id'];
            $status = $row['status'] == 0 ? 'Inactive' : 'Active';
            $responce->rows[$i]['cell'] = array($row['competitionr_name'], $row['year'], $row['round_id'], $row['rider_class_name'], $row['competition_result_date'], $status, $row['how_much_race'], $row['drop_status']);
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

    function get_year_options($competitionr_id='', $sel='') {
        if (is_numeric($competitionr_id)) {
            $con = ' and competitionr_id=' . $competitionr_id;
        } else {
            $con = '';
        }
        $arr = sql::rows('competitionr_details', "1 $con order by year asc", "distinct year");
        $opt.='<option value=""> --Select Year-- </option>';
        foreach ($arr as $val) {
            if ($sel == $val['year']) {
                $opt.='<option value="' . $val['year'] . '" selected="selected">' . $val['year'] . '</option>';
            } else {
                $opt.='<option value="' . $val['year'] . '">' . $val['year'] . '</option>';
            }
        }
        return $opt;
    }

    function get_round_options($competitionr_id='', $sel='') {
        if (is_numeric($competitionr_id)) {
            $con = ' and competitionr_id=' . $competitionr_id;
        } else {
            $con = '';
        }
        $arr = sql::rows('competitionr_details', "1 $con order by competitionr_details_round asc", "distinct competitionr_details_round");
        $opt.='<option value=""> --Select Round-- </option>';
        foreach ($arr as $val) {
            if ($sel == $val['competitionr_details_round']) {
                $opt.='<option value="' . $val['competitionr_details_round'] . '" selected="selected">' . $val['competitionr_details_round'] . '</option>';
            } else {
                $opt.='<option value="' . $val['competitionr_details_round'] . '">' . $val['competitionr_details_round'] . '</option>';
            }
        }
        return $opt;
    }

    function get_class_options($competitionr_id='', $sel='') {
        if (is_numeric($competitionr_id)) {
            $con = ' and competitionr_id=' . $competitionr_id;
        } else {
            $con = '';
        }
        $arr = sql::rows('rider_class', "1");
        $opt.='<option value=""> --Select Class-- </option>';
        foreach ($arr as $val) {
            if ($sel == $val['rider_class_id']) {
                $opt.='<option value="' . $val['rider_class_id'] . '" selected="selected">' . $val['rider_class_name'] . '</option>';
            } else {
                $opt.='<option value="' . $val['rider_class_id'] . '">' . $val['rider_class_name'] . '</option>';
            }
        }
        return $opt;
    }

}

?>