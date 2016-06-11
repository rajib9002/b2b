<?php

class mod_home extends Model {

    function mod_home() {
        parent::Model();
    }

    function get_bike($con='', $limit='') {

                $con.= " and bike.bike_status=1 order by bike.bike_id desc";

        //$sql = $this->db->query("select bike.*, type.*, model.*, make.*, area.*, country.*
//                from bike
//                left join type on type.type_id=bike.type_id
//                 left join model on model.model_id=bike.model_id
//                 left join make on make.make_id=bike.make_id
//                 left join country on country.country_id=bike.country_id
//                 left join area on area.area_id=bike.area_id
//               where $con $limit ");
//        return $sql->result_array();
    }

    function get_bike_details($bike_id) {
        $sql = $this->db->query("select bike.*, bike.type_id as t_id, type.type_name, model.*, make.*, area.*, country.*
                 from bike
                 left join type on type.type_id=bike.type_id
                 left join model on model.model_id=bike.model_id
                 left join make on make.make_id=bike.make_id
                 left join country on country.country_id=bike.country_id
                 left join area on area.area_id=bike.area_id
               where bike_status=1 and bike.bike_id=$bike_id");
        return $sql->row_array();
    }

    function get_save_bike($user_id, $limit = false, $start = '', $perpage = '') {
        if ($limit) {
            $limit_sql.=" limit $start,$perpage";
        }
        $sql = $this->db->query("select bike.*, type.*, model.*, make.*, area.*, country.*, save_ad.*
                from bike
                left join save_ad on save_ad.bike_id=bike.bike_id
                left join type on type.type_id=bike.type_id
                left join model on model.model_id=bike.model_id
                 left join make on make.make_id=bike.make_id
                 left join country on country.country_id=bike.country_id
                 left join area on area.area_id=bike.area_id
               where bike_status=1 and save_ad.user_id=$user_id $limit_sql");
        return $sql->result_array();
    }

    function get_my_bike($user_id) {
        $sql = $this->db->query("select bike.*, type.*, model.*, make.*, area.*, country.*
                from bike
                left join type on type.type_id=bike.type_id
                left join model on model.model_id=bike.model_id
                 left join make on make.make_id=bike.make_id
                 left join country on country.country_id=bike.country_id
                 left join area on area.area_id=bike.area_id
               where bike_status=1 and bike.user_id=$user_id");
        return $sql->result_array();
    }

    function do_post_request($url, $data, $optional_headers = 'Content-type:application/x-www-form-urlencoded') {
        $params = array('http' => array(
                'method' => 'POST',
                'content' => $data,
                ));
        if ($optional_headers !== null) {
            $params['http']['header'] = $optional_headers;
        }
        $ctx = stream_context_create($params);
        $response = @file_get_contents($url, false, $ctx);
        if ($response === false) {
            print "Problem reading data from $url, No status returned\n";
        }
        return $response;
    }

    function add_image2($file = '') {

        // echo $file;
        $param['dir'] = 'uploads/bike_image/';
        $param['type'] = FILE_TYPE;
        $this->load->library('zupload', $param);

        if (class_exists('zupload')) {
            echo 'here <br/>';
            $this->zupload->setUploadDir('uploads/bike_image/');
        } else {
            //echo 'here21';
            //echo '<br/>'.$file.'2';
        }
        //echo $file;
        $multiple = true;
        //$this->zupload->setFileInputName($file);
        //$this->zupload->upload($multiple);
        //$this->zupload->getMsg(); 

        $img = $this->zupload->getOutputFileName();
        $this->zupload->Clean();

        foreach ($_FILES as $file) {
            echo $file[1] . 'bingo <br/>';
            $this->zupload->setFileInputName($file);
            $this->zupload->upload(true);
        }
        if (!class_exists('zthumb')) {
            $this->load->library('zthumb');
        }
        //$this->zthumb->createThumb($img, "thumb_" . $img, $param['dir'], $param['dir'], 60, 60, false);
//$this->zthumb->createThumb($img, "" . $img, $param['dir'], $param['dir'], 1500, 1200, false);
        return $img;
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
            //$this->zupload->delFile($pre_image);
            //$this->zupload->delFile("full_" . $pre_image);
        }
        $this->zupload->setFileInputName($file);
        $this->zupload->upload(true);
        $img = $this->zupload->getOutputFileName();
        if (!class_exists('zthumb')) {
            $this->load->library('zthumb');
        }
        //$this->zthumb->createThumb($img, "thumb_" . $img, $param['dir'], $param['dir'], 60, 60, false);
        $this->zthumb->createThumb($img, "" . $img, $param['dir'], $param['dir'], 800, 1200, false);
        return $img;
    }

}

?>
