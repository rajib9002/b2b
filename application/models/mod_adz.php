<?php

class mod_adz extends Model {

    function __construct() {
        parent::Model();
    }

    function save_bike_ad() {
        $session_array = $this->session->all_userdata();
        $adz_poster_name = $this->session->userdata('adz_poster_name');
        $adz_poster_phone = $this->session->userdata('adz_poster_phone');
        $adz_poster_email = $this->session->userdata('adz_poster_email');
        $user_id = $this->session->userdata('user_id');
        if ($user_id == '') {
            $user_email = sql::row("users", "user_email='$adz_poster_email'");
            $user_name = sql::row("users", "user_name='$adz_poster_name'");
            if (count($user_email) <= 0) {
                $data = array(
                    'user_name' => "$adz_poster_name",
                    'user_password' => "$adz_poster_phone",
                    'user_phone' => "$adz_poster_phone",
                    'user_email' => "$adz_poster_email",
                    'user_first_name' => "$adz_poster_name",
                    'user_type' => 2,
                    'user_status' => 1,
                );
                $this->db->insert('users', $data);
                $user_id = $this->db->insert_id();
            }
        }
        //$bike_id = $this->session->userdata("bike_insert_id");
        $post_date = date('Y-m-d');


        $model_id = $session_array['model_id'];
        $p = $this->session->userdata('parent_type_id');


         if ($model_id == "Other" || $model_id == "other") {
            $type_id_from_model = sql::row("model", "model_name='$model_id' and main_type_id='$p' and make_id='$session_array[company_id]'", "type_id");
        } else {
            $type_id_from_model = sql::row("model", "model_id='$model_id' and main_type_id='$p' and make_id='$session_array[company_id]'", "type_id");
        }
        if ($model_id == "Other") {
            $data = array('main_type_id' => $p, 'type_id' => $type_id_from_model['type_id'], 'make_id' => $session_array['company_id'], 'model_name' => $session_array['model_name']);
            $this->db->insert('model', $data);
            $model_id = $this->db->insert_id();
        }


        $data = array(
            'ad_type' => $session_array['ad_type'],
            'seller_type' => $session_array['seller_type'],
            'ad_title' => $session_array['ad_title'],
            'type_id' => $type_id_from_model['type_id'],
            'mill_sign' => $session_array['mill_sign'],
            'make_id' => $session_array['company_id'],
            'model_id' => $model_id,
            'country_id' => $session_array['country_id'],
            'area_id' => $session_array['area_id'],
            'post_code' => $session_array['post_code'],
            'currency' => $session_array['currency'],
            'user_id' => $user_id,
            'adz_user_name' => "$adz_poster_name",
            'mobile_phone2' => $session_array['mobile_phone2'],
            'land_phone' => $session_array['land_phone'],
            'adz_user_phone' => "$adz_poster_phone",
            'adz_user_email' => "$adz_poster_email",
            'year' => $session_array['year'],
            'mileage' => $session_array['mileage'],
            'hours' => $session_array['hours'],
            'full_description' => $session_array['full_description'],
            'engine' => $session_array['engine'],
            'bike_post_date' => "$post_date",
            'price' => $session_array['price'],
            'is_confirm_ad' => 1
        );

        $table_name = $this->session->userdata("table_name");

        $this->db->insert("$table_name", $data);
        $bike_id = $this->db->insert_id();



        //$session_id = $this->session->userdata('session_id');
        //$imgdata = array(
        //   'bike_image_status' => 1,
        //   'bike_id' => $bike_id
        //);
        //$this->db->update("bike_image", $imgdata, array('bike_id' => $bike_id));

        $tab_name = $table_name . '_image';

        $file0 = $this->session->userdata('file0');
        if ($file0 != '') {
            $this->db->query("insert into $tab_name set bike_image='$file0',bike_id='$bike_id'");
        }
        $file1 = $this->session->userdata('file1');
        if ($file1 != '') {
            $this->db->query("insert into $tab_name set bike_image='$file1',bike_id='$bike_id'");
        }
        $file2 = $this->session->userdata('file2');
        if ($file2 != '') {
            $this->db->query("insert into $tab_name set bike_image='$file2',bike_id='$bike_id'");
        }
        $file3 = $this->session->userdata('file3');
        if ($file3 != '') {
            $this->db->query("insert into $tab_name set bike_image='$file3',bike_id='$bike_id'");
        }
        $file4 = $this->session->userdata('file4');
        if ($file4 != '') {
            $this->db->query("insert into $tab_name set bike_image='$file4',bike_id='$bike_id'");
        }
        $file5 = $this->session->userdata('file5');
        if ($file5 != '') {
            $this->db->query("insert into $tab_name set bike_image='$file5',bike_id='$bike_id'");
        }

        $this->session->unset_userdata('file0');
        $this->session->unset_userdata('file1');
        $this->session->unset_userdata('file2');
        $this->session->unset_userdata('file3');
        $this->session->unset_userdata('file4');
        $this->session->unset_userdata('file5');

        $this->session->unset_userdata('ad_type');
        $this->session->unset_userdata('seller_type');
        $this->session->unset_userdata('ad_title');

        $this->session->unset_userdata('type_id');
        $this->session->unset_userdata('mill_sign');
        $this->session->unset_userdata('make_id');
        $this->session->unset_userdata('model_id');
        $this->session->unset_userdata('country_id');
        $this->session->unset_userdata('area_id');
        $this->session->unset_userdata('post_code');
        $this->session->unset_userdata('currency');
        $this->session->unset_userdata('mobile_phone2');
        $this->session->unset_userdata('land_phone');
        $this->session->unset_userdata('year');
        $this->session->unset_userdata('mileage');
        $this->session->unset_userdata('hours');
        $this->session->unset_userdata('full_description');
        $this->session->unset_userdata('engine');
        $this->session->unset_userdata('price');

        return $bike_id;
    }

    function update_bike_ad($bike_id = '') {
        $user_id = $this->session->userdata('user_id');
        $file = 'video_name';
        $video = $_POST['h_video'];
        if ($_FILES[$file]['name'] != '') {
            $video = $this->add_video_file($file);
        }
        $data = array(
            'ad_type' => $_POST['ad_type'],
            'type_id' => $_POST['type_id'],
            'make_id' => $_POST['make_id'],
            'model_id' => $_POST['model_id'],
            'country_id' => $_POST['country_id'],
            'area_id' => $_POST['area_id'],
            'post_code' => $_POST['post_code'],
            'user_id' => $user_id,
            'year' => $_POST['year'],
            'mileage' => $_POST['mileage'],
            'hours' => $_POST['hours'],
            'full_description' => $_POST['full_description'],
            'engine' => $_POST['engine'],
            'bike_video' => "$video",
            'price' => $_POST['price']
        );
        $this->db->update("bike", $data, array("bike_id" => $bike_id));
    }

    function add_all_bike_image($bike_id = '') {
        if (count($_POST['pro_serial']) > 0) {
            $inc = 0;
            foreach ($_POST['pro_serial'] as $val) {
                $file = 'images' . $inc;
                $file = $this->add_image($file);
                $this->db->query("insert into bike_image set
                                                    bike_image='$file',
                                                    bike_id='$bike_id',
                                                    bike_image_status=0");
                $file = "";
                $key++;
            }
        }
    }

    function save_bike_image($bike_id = '') {
        if (count($_POST['pro_serial']) > 0) {
            $inc = 0;
            foreach ($_POST['pro_serial'] as $val) {
                $file = 'image_' . $inc;
                $image = $_POST['h_image_' . $inc];
                if ($_FILES[$file]['name'] != '') {
                    $image = $this->add_image($file);
                }
                $this->db->query("insert into bike_image set bike_image='$image',bike_id=$bike_id,bike_image_status=0");

                $file = "";
                $inc++;
            }

            $query = $this->db->query("select * from  bike_image where bike_id=$bike_id and bike_image_status=1");
            $image = $query->result_array();
            foreach ($image as $img) {
                $file_name = $img['image'];
                $img_id = $img['bike_image_id'];
                $this->db->query("delete  from  bike_image where bike_image_id='$img_id'");
            }
            $sql = $this->db->query("select * from  bike_image where bike_id=$bike_id and bike_image_status=0");
            $image_update = $sql->result_array();
            foreach ($image_update as $img_data) {
                $img_data_id = $img_data['bike_image_id'];
                $this->db->query("update bike_image set bike_image_status=1 where bike_image_id='$img_data_id'");
            }
        }
    }

    function update_bike_image($bike_id = '') {
        if (count($session_array['pro_serial']) > 0) {
            $inc = 0;
            foreach ($session_array['pro_serial'] as $val) {
                $file = 'image_' . $inc;
                $file = $this->add_image($file);
                $this->db->query("insert into bike_image set bike_image='$file',bike_id=$bike_id");
                $file = "";
                $inc++;
            }
        }
    }

//    function add_image($file = '', $pre_image = '') {
//        $param['dir'] = UPLOAD_PATH . "bike_image/";
//        $param['type'] = FILE_TYPE;
//        if (class_exists('zupload')) {
//            $this->zupload->setUploadDir(UPLOAD_PATH . 'bike_image/');
//        } else {
//            $this->load->library('zupload', $param);
//        }
//        if ($pre_image != "") {
//            $this->zupload->delFile($pre_image);
//            $this->zupload->delFile("full_" . $pre_image);
//        }
//        $this->zupload->setFileInputName($file);
//        $this->zupload->upload(true);
//        $img = $this->zupload->getOutputFileName();
//        return $img;
//    }


    function add_image($file = '', $pre_image = '') {
        $param['dir'] = UPLOAD_PATH . "bike_image/";
        $param['type'] = IMG_EXT;
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
        $this->zthumb->createThumb($img, "l_" . $img, $param['dir'], $param['dir'], 1500, 1200, false);
        $this->zthumb->createThumb($img, "t_" . $img, $param['dir'], $param['dir'], 300, 300, false);
        return $img;
    }

    function add_file($file = '', $index = '') {
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
        //$this->zupload->setFileInputName("upload_file_" . $index);
        $this->zupload->setFileInputName($file);
        $this->zupload->upload(true);
        $img = $this->zupload->getOutputFileName();
        if (!class_exists('zthumb')) {
            $this->load->library('zthumb');
        }
        $this->zthumb->createThumb($img, "full_" . $img, $param['dir'], $param['dir'], 1200, 1200, true);
        $this->zthumb->createThumb($img, "small_" . $img, $param['dir'], $param['dir'], 150, 150, true);
        return $img;
    }

    function add_video_file($fileName = '', $pre_file = '') {
        if ($pre_file != '') {
            $file = UPLOAD_PATH . 'bike_video/' . $pre_file;
            @chmod($file, 0666);
            @unlink($file);
        }
        $target_path = UPLOAD_PATH . 'bike_video/';
        $random_digit = rand(0000, 9999);
        $file = $random_digit . '_' . str_replace(' ', '_', $_FILES[$fileName]['name']);
        $target_path = $target_path . basename($file);
        if (move_uploaded_file($_FILES[$fileName]['tmp_name'], $target_path)) {
            @chmod(UPLOAD_PATH . 'bike_video/' . basename($file), 0644);
        }
        return $file;
    }

    function nav_links($category_id = '') {
        if ($category_id == '') {
            return "<a href='" . site_url('home') . "'>Home</a>";
        }

        $last = sql::row('category', "category_id=$category_id", 'parent,category_name,category_id');
        $parent = 0;
        if ($last['category_name'] != '') {
            $last_links = " &raquo; <strong>" . $last['category_name'] . '</strong>';
            $parent_id = $last['parent'];
        }
        $first_link = "<a href='" . site_url('home') . "'>Home</a>";
        while ($parent != 0) {
            $data = sql::row('category', "category_id=$parent", 'parent,category_name,category_id');
            $tmp = " &raquo; <a href='" . site_url('help/select_category/' . $data['category_id']) . "'>$data[category_name]</a>";
            $links = $tmp . $links;
            $parent_id = $data['parent'];
        }
        $links = $first_link . $links . $last_links;
        return $links;
    }

    function get_location($sel = '') {
        $str = "";
        $str.="<option value=''>Select A Location</option>";
        $query = $this->db->query("select * from location where location_status=1 order by location_id asc");
        foreach ($query->result_array() as $p) {
            if ($p['location_id'] == $sel) {
                $str.="<option value='" . $p['location_id'] . "' selected>" . $p['location_name'] . "</option>";
            } else {
                $str.="<option value='" . $p['location_id'] . "'>" . $p['location_name'] . "</option>";
            }
        }
        return $str;
    }

    function add_save_adz($bike_id = '', $user_id = '', $table_name = '') {
        $data = array(
            'bike_id' => $bike_id,
            'table_name' => $table_name,
            'user_id' => $user_id,
            'save_ad_status' => 1
        );
        $this->db->insert('save_ad', $data);
        return true;
    }

    function get_area_options($country_id = '', $sel = '') {
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

    function get_make_options($type_id = '', $sel = '') {

        $query = $this->db->query("select distinct make.make_name,model.make_id from make 
              left join model on make.make_id=model.make_id
              where model.type_id='$type_id'");
        $arr = $query->result_array();
        $opt.='<option value=""> -- Select Make -- </option>';
        foreach ($arr as $val) {
            if ($sel == $val['make_id']) {
                $opt.='<option value="' . $val['make_id'] . '" selected="selected">' . $val['make_name'] . '</option>';
            } else {
                $opt.='<option value="' . $val['make_id'] . '">' . $val['make_name'] . '</option>';
            }
        }
        return $opt;
    }

    function get_make_options2($type_id = '', $sel = '') {
        if (is_numeric($type_id)) {
            $con = ' and type_id=' . $type_id;
        } else {
            $con = '';
        }
        $arr = sql::rows('make', "make_status=1 $con");
        $opt.='<option value=""> Select Make </option>';
        foreach ($arr as $val) {
            if ($sel == $val['make_id']) {
                $opt.='<option value="' . $val['make_id'] . '" selected="selected">' . $val['make_name'] . '</option>';
            } else {
                $opt.='<option value="' . $val['make_id'] . '">' . $val['make_name'] . '</option>';
            }
        }
        return $opt;
    }

    function get_model_options($make_id = '', $type_id = '', $sel = '') {
        $main_type_id = $this->session->userdata('parent_type_id');
		
		if($main_type_id==''){
		$main_t_info=sql::rows("model","type_id='$type_id' and make_id='$make_id'");
		$main_type_id=$main_t_info[0]['main_type_id'];
		}
		
        $query = $this->db->query("select * from model where main_type_id='$main_type_id' and  model_status=1  and make_id='$make_id'");
        $arr = $query->result_array();
        $opt.='<option value=""> --Select Model-- </option>';
        foreach ($arr as $val) {
            
            if ($val[model_name] == 'other' || $val[model_name] == 'Other') {
                $val['model_id'] = $val['model_name'];
            } else {
                $val['model_id'] = $val['model_id'];
            }
            
            if ($sel == $val['model_id']) {
                $opt.='<option value="' . $val['model_id'] . '" selected="selected">' . $val['model_name'] . '</option>';
            } else {
                $opt.='<option value="' . $val['model_id'] . '">' . $val['model_name'] . '</option>';
            }
        }
//        $opt.='<option value="Other"> Other </option>';
        return $opt;
    }
    function get_model_options_model_selected($make_id = '', $sel = ''){
         $main_type_id = $this->session->userdata('parent_type_id');
        $query = $this->db->query("select * from model where main_type_id='$main_type_id' and  model_status=1  and make_id='$make_id'");
        $arr = $query->result_array();
        $opt.='<option value=""> --Select Model-- </option>';
        foreach ($arr as $val) {
            if ($val[model_name] == 'other' || $val[model_name] == 'Other') {
                $val['model_id'] = $val['model_name'];
            } else {
                $val['model_id'] = $val['model_id'];
            }
            if ($sel == $val['model_id']) {
                $opt.='<option value="' . $val['model_id'] . '" selected="selected">' . $val['model_name'] . '</option>';
            } else {
                $opt.='<option value="' . $val['model_id'] . '">' . $val['model_name'] . '</option>';
            }
        }
        return $opt;
    }

    function get_model_options2($make_id = '', $type_id = '', $sel = '') {
        if (is_numeric($type_id)) {
            $con = ' and type_id=' . $type_id;
        }
        if (is_numeric($make_id)) {
            $con = ' and make_id=' . $make_id;
        } else {
            $con = '';
        }
        $arr = sql::rows('model', "model_status=1 $con");
        $opt.='<option value=""> Select Model </option>';
        foreach ($arr as $val) {
            if ($sel == $val['model_id']) {
                $opt.='<option value="' . $val['model_id'] . '" selected="selected">' . $val['model_name'] . '</option>';
            } else {
                $opt.='<option value="' . $val['model_id'] . '">' . $val['model_name'] . '</option>';
            }
        }
        return $opt;
    }

    function save_bike_video() {
        $user_id = $this->session->userdata('user_id');
        $file = 'video_name';
        if ($_FILES[$file]['name'] != '') {
            $video = $this->add_video_file($file);
        }
        $data = array(
            'bike_video' => "$video"
        );
        $this->db->insert("bike", $data);
        $bike_id = $this->db->insert_id();
        $this->session->set_userdata("bike_insert_id", "$bike_id");
        return $bike_id;
    }

    function get_bike_id() {
        $user_id = $this->session->userdata('user_id');
        $data = array(
            'is_image_uploaded' => "1"
        );
        $this->db->insert("bike", $data);
        $bike_id = $this->db->insert_id();
        $this->session->set_userdata("bike_insert_id", "$bike_id");
        return $bike_id;
    }

    function update_my_bike_ad($table_name = '', $bike_id = '') {

        $bike = sql::row("$table_name", "bike_id=$bike_id");

        $time = $bike['time'];


        $user_id = $this->session->userdata('user_id');
        $post_date = date('Y-m-d');


        if ($_POST['make_id'] == '') {
            $_POST['make_id'] = 0;
        }
        if ($_POST['model_id'] == '') {
            $_POST['model_id'] = 0;
        }

        $data = array(
            'ad_type' => $_POST['ad_type'],
            'type_id' => $_POST['type_id'],
            'ad_title' => $_POST['ad_title'],
            'seller_type' => $_POST['seller_type'],
            'mill_sign' => $_POST['mill_sign'],
            'make_id' => $_POST['make_id'],
            'model_id' => $_POST['model_id'],
            'country_id' => $_POST['country_id'],
            'area_id' => $_POST['area_id'],
            'post_code' => $_POST['post_code'],
            'currency' => $_POST['currency'],
            'user_id' => $user_id,
            'year' => $_POST['year'],
            'mileage' => $_POST['mileage'],
            'hours' => $_POST['hours'],
            'full_description' => $_POST['full_description'],
            'engine' => $_POST['engine'],
            'bike_post_date' => "$post_date",
            'time' => "$time",
            'price' => $_POST['price']
        );
        $this->db->update("$table_name", $data, array("bike_id" => $bike_id));
        return $bike_id;
    }

    function save_comment($table_name = '', $bike_id = '') {

        $user_id = $this->session->userdata('user_id');
        $data = array(
            'bike_id' => $bike_id,
            'user_id' => $user_id,
            'comment' => $_POST['comment']
        );
        $t_comment = $table_name . '_comment';
        $this->db->insert("$t_comment", $data);
        //$this->db->query("update blogs set blog_no_of_comment=blog_no_of_comment+1 where blog_id='$blog_id'");
    }

}

?>
