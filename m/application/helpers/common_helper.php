<?php

class common {

    public static function redirect() {
        $CI = & get_instance();
        $uri = $CI->session->userdata('cur_uri');
        redirect($uri);
    }

    public static function track_uri() {
        $CI = & get_instance();
        $uri = $CI->uri->uri_string();
        $CI->session->set_userdata('cur_uri', $uri);
    }

    public static function is_logged_in() {
        $CI = & get_instance();
        if ($CI->session->userdata('logged_in')) {
            return true;
        } else {
            return false;
        }
    }
    
     public static function is_admin_logged_in() {
        $CI = & get_instance();
        if ($CI->session->userdata('admin_logged_in')) {
            return true;
        } else {
            return false;
        }
    }

    public static function is_logged() {
        $CI = & get_instance();
        if (!$CI->session->userdata('logged_in')) {
            redirect('login');
        }
    }

    public static function nav_menu_link($nav_array) {
        $link = "<div class='nav_menu'>";
        if (is_array($nav_array)) {
            $link.="<a href='" . site_url('home') . "'>Home</a> &raquo; ";
            foreach ($nav_array as $nav) {
                if ($nav[url] != '') {
                    $link.="<a href='" . $nav[url] . "'>$nav[title]</a> &raquo; ";
                } else {
                    $link.="<span class='b'>$nav[title]</span>";
                }
            }
        }
        $link.="</div>";
        return $link;
    }

    function user_account_activation($email='', $user_name='') {

        $CI = & get_instance();
        if ($email != '') {
            $site = common::get_settings_data();
            $admin_email = $site['admin_email'];
            $activation_key = md5(date("F j, Y, g:i a"));
            $sql = "update users set user_activation_key='$activation_key' where user_email='$email'";
            $CI->db->query($sql);
            $base_url = base_url();
            $msg_content = "Hi,<br>
            Thanks for Creating Account in bike2biker<br> ";
            
           
            
            
            $msg_content.= "<br /><br />Please click on the link below to activate your account.
                        <br /><br />
                        Account Activation URL: <a href='" . site_url('login/account_activation/' . $activation_key) . "'>Click Here For Activate Your Account</a>";
            
            
           
            if ($user_name == '') {
                $user_name = $email;
            }
            $from = "Bike2Biker Account Activation Team";
            $from_name = 'www.bike2biker.com';
            $to = $email;
            $subject = "Account Activation";
            //common::sending_mail($from, $from_name, $to, $subject, $msg_content);
            $header .= "From: " . "www.bike2biker.com" . "\r\n";
            $header.="Content-Type: text/html; charset=iso-8859-1" . "\r\n";
            @mail($to, $subject, $msg_content, $header);
            @mail($admin_email, $subject, $msg_content, $header);
            return true;
        }
    }

    public static function sending_mail($from, $from_name, $to, $subject, $msg) {
        $CI = & get_instance();
        $CI->load->library('email');
        $config['protocol'] = 'sendmail';
        $config['mailpath'] = '/usr/sbin/sendmail';
        $config['charset'] = 'utf-8';
        $config['wordwrap'] = TRUE;
        $config['mailtype'] = 'html';
        $CI->email->initialize($config);

        $CI->email->from($from, $from_name);
        $CI->email->to($to);
        //$CI->email->cc('another@another-example.com');
        $CI->email->subject($subject);
        $CI->email->message($msg);
        $CI->email->send();
    }

    public static function get_settings_data() {
        $data = null;
        $rows = sql::rows('settings');
        if (count($rows) > 0) {
            foreach ($rows as $row) {
                $data[$row['key_flag']] = $row['key_value'];
            }
        } return $data;
    }

    public static function get_category($parent='', $categroy_id='') {
        $CI = & get_instance();
        if (is_numeric($parent)) {
            $con = ' and parent=' . $parent;
        }

        if (is_numeric($categroy_id)) {
            $con = ' and  parent_category_id=' . $categroy_id;
        }

        $sql = $CI->db->query('select category_id,category_name,category_image from category where category_status=1 and show_status=1 ' . $con);
        return $sql->result_array();
    }

    public static function get_category_options($parent='', $sel='') {
        $CI = & get_instance();
        if (is_numeric($parent)) {
            $con = ' and parent_category_id=0 and parent=' . $parent;
        }

        $sql = $CI->db->query('select category_id,category_name,category_image,form_type from category where category_status=1 ' . $con);
        $rows = $sql->result_array();
        $opt.="<option value='' > < Select Category > </option>";
        foreach ($rows as $val) {
            if ($sel == $val['category_id']) {
                $opt.='<option value="' . $val['category_id'] . '" title="' . $val['form_type'] . '" selected="selected">' . $val['category_name'] . '</option>';
            } else {
                $opt.='<option value="' . $val['category_id'] . '" title="' . $val['form_type'] . '">' . $val['category_name'] . '</option>';
            }
        }
        return $opt;
    }

    function get_subcategory_edit($sel='') {

        $str = "";
        $str.="<option value=''>Select A Subcategory</option>";
        $query = $this->db->query("select * from category where category_status=1 order by category_id asc");
        foreach ($query->result_array() as $p) {
            if ($p['category_id'] == $sel) {
                $str.="<option value='" . $p['category_id'] . "' selected>" . $p['category_name'] . "</option>";
            } else {
                $str.="<option value='" . $p['category_id'] . "'>" . $p['category_name'] . "</option>";
            }
        }
        return $str;
    }

    public static function get_subcategory_options($category_id='', $sel='') {
        $CI = & get_instance();
        if (is_numeric($category_id)) {
            $con = ' and parent_category_id=' . $category_id;
        } else {
            $con = ' and parent_category_id!=0';
        }

        $sql = $CI->db->query('select category_id,category_name,form_type from category where category_status=1 ' . $con);
        $rows = $sql->result_array();
        $opt.="<option value=''>< Select Sub Category ></option>";
        foreach ($rows as $val) {
            if ($sel == $val['category_id']) {
                $opt.='<option value="' . $val['category_id'] . '" title="' . $val['form_type'] . '" selected="selected">' . $val['category_name'] . '</option>';
            } else {
                $opt.='<option value="' . $val['category_id'] . '" title="' . $val['form_type'] . '">' . $val['category_name'] . '</option>';
            }
        }
        return $opt;
    }

    public static function get_cat_options($category_id='', $sel='') {
        $CI = & get_instance();
        if (is_numeric($category_id)) {
            $con = ' and category_id=' . $category_id;
        } else {
            $con = ' and category_id!=0';
        }

        $sql = $CI->db->query('select category_id,category_name,form_type from category where category_status=1 ' . $con);
        $rows = $sql->result_array();
        $opt.="<option value='' >Select Category</option>";
        foreach ($rows as $val) {
            if ($sel == $val['category_id']) {
                $opt.='<option value="' . $val['category_id'] . '" title="' . $val['form_type'] . '" selected="selected">' . $val['category_name'] . '</option>';
            } else {
                $opt.='<option value="' . $val['category_id'] . '" title="' . $val['form_type'] . '">' . $val['category_name'] . '</option>';
            }
        }
        return $opt;
    }

    public static function get_area($sel='') {
        $rows = sql::rows('area', 'area_status =1 order by area_name asc');
        $opt = "<option value=''>Select Area</option>";
        if (count($rows) > 0) {
            foreach ($rows as $row) {
                if ($sel == $row['area_id']) {
                    $opt.="<option value='$row[area_id]' selected='selected'>$row[area_name]</option>";
                } else {
                    $opt.="<option value='$row[area_id]'>$row[area_name]</option>";
                }
            }
        }
        return $opt;
    }
    
    
    function get_area_respect_with_country($country_id='',$sel=''){
        $rows = sql::rows('area', "area_status =1 and country_id='$country_id' order by area_name asc");
        $opt = "<option value=''>Select Area</option>";
        if (count($rows) > 0) {
            foreach ($rows as $row) {
                if ($sel == $row['area_id']) {
                    $opt.="<option value='$row[area_id]' selected='selected'>$row[area_name]</option>";
                } else {
                    $opt.="<option value='$row[area_id]'>$row[area_name]</option>";
                }
            }
        }
        return $opt;
    }
    

    public static function get_area_name($sel='') {
        $row = sql::row('area', "area_status =1 and area_id=$sel");
        $name = $row['area_name'];
        return $name;
    }

    public static function get_bike_type($sel='') {
        $rows = sql::rows('type', 'type_status =1');
        $opt = "<option value=''>Select Type</option>";
        if (count($rows) > 0) {
            foreach ($rows as $row) {
                if ($sel == $row['type_id']) {
                    $opt.="<option value='$row[type_id]' selected='selected'>$row[type_name]</option>";
                } else {
                    $opt.="<option value='$row[type_id]'>$row[type_name]</option>";
                }
            }
        }
        return $opt;
    }
	
	
	  public static function get_bike_make_by_r($t_id='',$sel='') {
        $rows = sql::rows('make', "make_status =1 and type_id='$t_id'");
        $opt = "<option value=''>Select Make</option>";
        if (count($rows) > 0) {
            foreach ($rows as $row) {
                if ($sel == $row['make_id']) {
                    $opt.="<option value='$row[make_id]' selected='selected'>$row[make_name]</option>";
                } else {
                    $opt.="<option value='$row[make_id]'>$row[make_name]</option>";
                }
            }
        }
        return $opt;
    }
    
    
    public static function get_bike_model_by_r($t_id='',$make_id='',$sel='') {
        $rows = sql::rows('model', "model_status =1 and type_id=$t_id and make_id=$make_id");
        $opt = "<option value=''>Select  Model</option>";
        if (count($rows) > 0) {
            foreach ($rows as $row) {
                if ($sel == $row['model_id']) {
                    $opt.="<option value='$row[model_id]' selected='selected'>$row[model_name]</option>";
                } else {
                    $opt.="<option value='$row[model_id]'>$row[model_name]</option>";
                }
            }
        }
        return $opt;
    }
	
	

    public static function get_bike_type_name($sel='') {   
        
        $row = sql::row('type', "type_status =1 and type_id=$sel");
        $name = $row['type_name'];
        return $name;
    }

    public static function get_bike_model($sel='') {
        $rows = sql::rows('model', 'model_status =1');
        $opt = "<option value=''>Select  Model</option>";
        if (count($rows) > 0) {
            foreach ($rows as $row) {
                if ($sel == $row['model_id']) {
                    $opt.="<option value='$row[model_id]' selected='selected'>$row[model_name]</option>";
                } else {
                    $opt.="<option value='$row[model_id]'>$row[model_name]</option>";
                }
            }
        }
        return $opt;
    }

    public static function get_bike_model_name($sel='') {
        $row = sql::row('model', "model_status =1 and model_id='$sel'");
        $name = $row['model_name'];
        return $name;
    }

    public static function get_bike_make($sel='') {
        $rows = sql::rows('make', 'make_status =1');
        $opt = "<option value=''>Select Make</option>";
        if (count($rows) > 0) {
            foreach ($rows as $row) {
                if ($sel == $row['make_id']) {
                    $opt.="<option value='$row[make_id]' selected='selected'>$row[make_name]</option>";
                } else {
                    $opt.="<option value='$row[make_id]'>$row[make_name]</option>";
                }
            }
        }
        return $opt;
    }



public static function get_bike_main_type($sel='') {
        $rows = sql::rows('main_type', 'type_status =1');
        $opt = "<option value=''>Select Main Type</option>";
        if (count($rows) > 0) {
            foreach ($rows as $row) {
                if ($sel == $row['main_type_id']) {
                    $opt.="<option value='$row[main_type_id]' selected='selected'>$row[type_name]</option>";
                } else {
                    $opt.="<option value='$row[main_type_id]'>$row[type_name]</option>";
                }
            }
        }
        return $opt;
    }


    public static function get_bike_make2($sel='') {
        $rows = sql::rows('make', "make_status =1 and type_id='$sel'");
        $opt = "<option value=''>Select Make</option>";
        if (count($rows) > 0) {
            foreach ($rows as $row) {
                if ($sel == $row['make_id']) {
                    $opt.="<option value='$row[make_id]' selected='selected'>$row[make_name]</option>";
                } else {
                    $opt.="<option value='$row[make_id]'>$row[make_name]</option>";
                }
            }
        }
        return $opt;
    }

    public static function get_bike_make_name($sel='') {
        $row = sql::row('make', "make_status =1 and make_id=$sel");
        $name = $row['make_name'];
        return $name;
    }

    public static function get_year($sel='') {
        $opt.="<option value='' >Select Year</option>";
        for ($i = date('Y'); $i >= 1981; $i--) {
            if ($i == $sel) {
                $opt.="<option value='$i' selected='selected'>$i</option>";
            } else {

                $opt.="<option value='$i'>$i</option>";
            }
        }
        return $opt;
    }

    function get_country_options($sel = '') {

        $sql = $this->db->query("select * from country where country_status =1 order by country_name asc");
        $data = $sql->result_array();
        $rows = $data;
        $opt = '<option value="">Select Country</option>';
        foreach ($rows as $value) {
            if ($value['country_id'] == $sel) {
                $opt.='<option value="' . $value['country_id'] . '" selected="selected">' . $value['country_name'] . '</option>';
            } else {
                $opt.='<option value="' . $value['country_id'] . '">' . $value['country_name'] . '</option>';
            }
        }
        return $opt;
    }

    public static function get_country_name($sel='') {
        $row = sql::row('country', "country_status =1 and country_id=$sel");
        $name = $row['country_name'];
        return $name;
    }

    public static function get_ad_type_name($sel='') {
        if ($sel == 1)
            $name = 'For Sale';
        else if ($sel == 2)
            $name = 'Wanted';
        return $name;
    }

    public static function get_type_data($parent_id='') {
        if ($parent_id == '')
            $parent_id = 0;
        $data = null;
        $rows = sql::rows('type', "type_status=1 and main_type_id=$parent_id order by type_name asc");
        return $rows;
    }

    function slider_list() {
        $CI = & get_instance();
        $sql = "select * from wb_slider where status=1 order by slider_id desc";
        $query = $CI->db->query($sql);
        return $query->result_array();
    }

    public static function get_bike_parent_type($sel='') {
        $rows = sql::rows('main_type', 'type_status =1');
        $opt.= "<option value=''>Select Type</option>";
        if (count($rows) > 0) {
            foreach ($rows as $row) {
                if ($sel == $row['main_type_id']) {
                    $opt.="<option value='$row[main_type_id]' selected='selected'>$row[type_name]</option>";
                } else {
                    $opt.="<option value='$row[main_type_id]'>$row[type_name]</option>";
                }
            }
        }
        return $opt;
    }

    public static function get_bike_type_respect_parent($main_type_id='',$sel='') {
        //$parent = sql::row('type', "type_status =1 and type_id=$sel", "type_name");
        $rows = sql::rows('type', 'type_status =1 and main_type_id=' . $main_type_id);
        $opt= "<option value=''>Select Type</option>";
        if (count($rows) > 0) {
            foreach ($rows as $row) {
                if ($sel == $row['type_id']) {
                    $opt.="<option value='$row[type_id]' selected='selected'>$row[type_name]</option>";
                } else {
                    $opt.="<option value='$row[type_id]'>$row[type_name]</option>";
                }
            }
        }
        return $opt;
    }

    public static function get_bike_make_all($sel='') {
        $rows = sql::rows('make', "make_status =1");
        $opt = "<option value=''>Select Make</option>";
        if (count($rows) > 0) {
            foreach ($rows as $row) {
                if ($sel == $row['make_id']) {
                    $opt.="<option value='$row[make_id]' selected='selected'>$row[make_name]</option>";
                } else {
                    $opt.="<option value='$row[make_id]'>$row[make_name]</option>";
                }
            }
        }
        return $opt;
    }

    public static function get_hours($posted_date='') {

        $ts2 = "$posted_date";
 //$ts2='2013-06-20 09:59:18';
        $current_time = date("Y-m-d H:i:s");
        $diff_seconds= strtotime($current_time) - strtotime($ts2);
        //$diff_weeks = floor($diff_seconds / 604800);
        //$diff_seconds= $diff_weeks * 604800;
        $diff_days = floor($diff_seconds / 86400);
        //$diff_seconds= $diff_days * 86400;
        $diff_hours = floor($diff_seconds / 3600);
        //$diff_seconds-= $diff_hours * 3600;
        $diff_minutes = floor($diff_seconds / 60);
        //$diff_seconds-= $diff_minutes * 60;
        
        if ($diff_days >0) {
            $hour = $diff_days . ' ' . 'day';
        } else if (($diff_days< 1) && ($diff_hours>0)) {
            $hour = $diff_hours . ' ' . 'hours';
        } else if (($diff_hours< 1) && ($diff_minutes>0)) {
            $hour = $diff_minutes . ' ' . 'min';
        } else if (($diff_minutes < 1) && ($diff_seconds>0)) {
            $hour = $diff_seconds . ' ' . 'sec';
            
        }
        return $hour;
    }
	
	   public static function get_discipline_name($sel='') {
        $dis_list = array("","MX", "Quads", "Road", "Trial", "Enduro");
        for ($i = 0; $i < count($dis_list); $i++) {
            if ($i== $sel) {
                $opt.=$dis_list[$i];
            } 
        }
        return $opt;
    }
	
	    function get_class_options($sel = '') {
        $sql = $this->db->query("select * from rider_class where rider_class_status =1 order by rider_class_name asc");
        $data = $sql->result_array();
        $rows = $data;
        $opt = '<option value="">Select Class Name</option>';
        foreach ($rows as $value) {
            if ($value['rider_class_id'] == $sel) {
                $opt.='<option value="' . $value['rider_class_id'] . '" selected="selected">' . $value['rider_class_name'] . '</option>';
            } else {
                $opt.='<option value="' . $value['rider_class_id'] . '">' . $value['rider_class_name'] . '</option>';
            }
        }
        return $opt;
    }
	
	
	function getDateTime() {
        $dateTime = date("Y:m:d-H:i:s");
        return $dateTime;
    }

    function createHash($chargetotal, $currency) {
        $dateTime = date("Y:m:d-H:i:s");
        $storeId = "13011606149";
        $sharedSecret = "3cGYESseT9";
        $stringToHash = $storeId . $dateTime . $chargetotal . $currency . $sharedSecret;
        $ascii = bin2hex($stringToHash);
        return sha1($ascii);
    }
	
    public static function load_new_type($sel='',$main_t_id='') {
        $rows = sql::rows("type", "type_status =1 and main_type_id='$main_t_id'");
        $opt = "<option value=''>Select Type</option>";
        if (count($rows) > 0) {
            foreach ($rows as $row) {
                if ($sel == $row['type_id']) {
                    $opt.="<option value='$row[type_id]' selected='selected'>$row[type_name]</option>";
                } else {
                    $opt.="<option value='$row[type_id]'>$row[type_name]</option>";
                }
            }
        }
        return $opt;
    }
	

}

?>