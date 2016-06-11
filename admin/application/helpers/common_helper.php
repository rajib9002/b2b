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

    function is_admin() {

        $CI = & get_instance();
        if ($CI->session->userdata('logged_in') && $CI->session->userdata('user_name') == 'admin') {
            return true;
        } else {
            common::redirect();
        }
    }

    function is_admin_logged_in() {
        $CI = & get_instance();
        if ($CI->session->userdata('admin_logged_in')) {
            return true;
        } else {
            return false;
        }
    }

    function is_admin_logged() {
        $CI = & get_instance();
        if ($CI->session->userdata('logged_in') && $CI->session->userdata('user_name') == 'admin') {
            return true;
        } else {
            return false;
        }
    }

    public static function is_admin_user() {
        $CI = & get_instance();
        if ($CI->session->userdata('logged_in') && $CI->session->userdata('user_type') == 'admin') {
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

    public static function status($status='') {
        if ($status == 1) {
            return 'Active';
        } else {
            return 'Inactive';
        }
    }

    public static function change_status($table, $con, $status) {
        $CI = & get_instance();
        $sql = "update $table set status=$status where $con";
        return $CI->db->query($sql);
    }

    function sending_mail($from, $from_name, $to, $subject, $msg) {
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
        $CI->email->subject($subject);
        $CI->email->message($msg);
        $CI->email->send();
    }

    public static function view_permit() {
        $CI = & get_instance();
        $permit = $CI->session->userdata('permission');

        if ($permit == 1 || $permit == 3 || $permit == 5 || $permit == 7) {
            return true;
        } else {
            return false;
        }
    }

    public static function add_permit($permit='') {
        $CI = & get_instance();
        if ($permit == '') {
            $permit = $CI->session->userdata('permission');
        }
        if ($permit == 2 || $permit == 3 || $permit == 6 || $permit == 7) {
            return true;
        } else {
            return false;
        }
    }

    public static function update_permit($permit='') {
        $CI = & get_instance();
        if ($permit == '') {
            $permit = $CI->session->userdata('permission');
        }
        if ($permit == 4 || $permit == 5 || $permit == 6 || $permit == 7) {
            return true;
        } else {
            return false;
        }
    }

    function getVar($var, $default='') {
        if (isset($_REQUEST[$var]) && !empty($_REQUEST[$var]))
            return $_REQUEST[$var];
        elseif (!empty($default)) {
            return $default;
        }
        else
            return "";
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

    public static function get_area($sel='') {
        $rows = sql::rows('area', 'area_status =1');
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

    public static function get_bike_type($sel='') {
        $rows = sql::rows('type', 'type_status =1');
        $opt = "<option value=''>Select Bike Type</option>";
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

    public static function get_bike_model($sel='') {
        $rows = sql::rows('model', 'model_status =1 order by model_name asc');
        $opt = "<option value=''>Select Bike Model</option>";
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

    public static function get_bike_make($sel='') {
        $rows = sql::rows('make', 'make_status =1 order by make_name asc');
        $opt = "<option value=''>Select Bike make</option>";
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

    public static function get_country($sel='') {
        $country_list = array("Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antigua and Barbuda", "Argentina", "Armenia", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bhutan", "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", "Brunei", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Central African Republic", "Chad", "Chile", "China", "Colombi", "Comoros", "Congo (Brazzaville)", "Congo", "Costa Rica", "Cote d'Ivoire", "Croatia", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor (Timor Timur)", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Fiji", "Finland", "France", "Gabon", "Gambia, The", "Georgia", "Germany", "Ghana", "Greece", "Grenada", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Honduras", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, North", "Korea, South", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Macedonia", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Mauritania", "Mauritius", "Mexico", "Micronesia", "Moldova", "Monaco", "Mongolia", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepa", "Netherlands", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Poland", "Portugal", "Qatar", "Romania", "Russia", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Serbia and Montenegro", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "Spain", "Sri Lanka", "Sudan", "Suriname", "Swaziland", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Togo", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "Uruguay", "Uzbekistan", "Vanuatu", "Vatican City", "Venezuela", "Vietnam", "Yemen", "Zambia", "Zimbabwe");
        $opt.="<option value='' >Select Country</option>";
        for ($i = 0; $i < count($country_list); $i++) {
            if ($country_list[$i] == $sel) {
                $opt.="<option value='$country_list[$i]' selected='selected'>$country_list[$i]</option>";
            } else {

                $opt.="<option value='$country_list[$i]'>$country_list[$i]</option>";
            }
        }
        return $opt;
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

    function get_competition_options($sel = '') {

        $sql = $this->db->query("select * from competition where status =1 order by competition_title asc");
        $data = $sql->result_array();
        $rows = $data;
        $opt = '<option value="">Select Competiton Name</option>';
        foreach ($rows as $value) {
            if ($value['competition_id'] == $sel) {
                $opt.='<option value="' . $value['competition_id'] . '" selected="selected">' . $value['competition_title'] . '</option>';
            } else {
                $opt.='<option value="' . $value['competition_id'] . '">' . $value['competition_title'] . '</option>';
            }
        }
        return $opt;
    }

    function get_competitionr_options($sel = '',$country_id='') {
         $con = 1;
        if (is_numeric($country_id)) {
            $con.= ' and competitionr_country='.$country_id;
        }
        $sql = $this->db->query("select * from competitionr where $con and competitionr_status =1 order by competitionr_name asc");
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

    function get_club_options($country_id='', $sel = '') {

        $con = 1;
        if (is_numeric($country_id)) {
            $con.= ' and country_id='.$country_id;
        }

        $sql = $this->db->query("select * from club where $con and club_status =1 order by club_name asc");
        $data = $sql->result_array();
        $rows = $data;
        $opt = '<option value="">--Select Club--</option>';
        foreach ($rows as $value) {
            if ($value['club_name'] == $sel) {
                $opt.='<option value="' . $value['club_name'] . '" selected="selected">' . $value['club_name'] . '</option>';
            } else {
                $opt.='<option value="' . $value['club_name'] . '">' . $value['club_name'] . '</option>';
            }
        }
        return $opt;
    }

    function get_host_body_options($country_id='', $sel = '') {
         $con = 1;
        if (is_numeric($country_id)) {
            $con.= ' and country_id=' . $country_id;
        }
        $sql = $this->db->query("select * from host_body where $con and host_body_status =1 order by host_body_name asc");
        $data = $sql->result_array();
        $rows = $data;
        $opt = '<option value="">Select Host Body</option>';
        foreach ($rows as $value) {
            if ($value['host_body_name'] == $sel) {
                $opt.='<option value="' . $value['host_body_name'] . '" selected="selected">' . $value['host_body_name'] . '</option>';
            } else {
                $opt.='<option value="' . $value['host_body_name'] . '">' . $value['host_body_name'] . '</option>';
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

    function get_round_options($sel = '') {
        $sql = $this->db->query("select * from competitionr_details where competitionr_details_status =1 group by competitionr_details_round");
        $data = $sql->result_array();
        $rows = $data;
        $opt = '<option value="">Select Round</option>';
        foreach ($rows as $value) {
            if ($value['competitionr_details_round'] == "$sel") {
                $opt.='<option value="' . $value['competitionr_details_round'] . '" selected="selected">' . $value['competitionr_details_round'] . '</option>';
            } else {
                $opt.='<option value="' . $value['competitionr_details_round'] . '">' . $value['competitionr_details_round'] . '</option>';
            }
        }
        return $opt;
    }

    public static function get_discipline($sel='') {
        $CI = & get_instance();
        $sql = $CI->db->query("select * from discipline where discipline_status =1 order by discipline_id asc");
        $data = $sql->result_array();
        $rows = $data;
        $opt = '<option value="">--Select Discipline--</option>';
        foreach ($rows as $value) {
            if ($value['discipline_id'] == $sel) {
                $opt.='<option value="' . $value['discipline_id'] . '" selected="selected">' . $value['discipline_name'] . '</option>';
            } else {
                $opt.='<option value="' . $value['discipline_id'] . '">' . $value['discipline_name'] . '</option>';
            }
        }
        return $opt;
    }

    public static function get_discipline_name($sel='') {
        $dis_list = array("", "MX", "Quads", "Road", "Trial", "Enduro");
        for ($i = 0; $i < count($dis_list); $i++) {
            if ($i == $sel) {
                $opt.=$dis_list[$i];
            }
        }
        return $opt;
    }

}

?>