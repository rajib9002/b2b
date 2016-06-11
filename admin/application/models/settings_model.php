<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of settings_models
 *
 * @author Anwar
 */
class settings_model extends Model {

    function __construct() {
        parent::__construct();
    }

    function add_image($pre_image='') {
        $param['dir'] = UPLOAD_PATH . "welcome_right/";
        $param['type'] = "jpg,png,gif,jpeg";

        if (class_exists('zupload')) {
            $this->zupload->setUploadDir(UPLOAD_PATH . 'welcome_right/');
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

    function update_settings($sel_opt=1) {
        switch ($sel_opt) {
            case 1:
                $key_list = array('admin_email', 'notify_email');
                break;
            case 2:
                $key_list = array('');
                break;
            case 3:
                $key_list = array("company_name", "company_address", "company_phone", "company_fax", "company_others", "company_email", "company_web");
                break;
            case 4:
                $img = '';
                if ($_FILES['image']['name'] != '') {
                    $img = $this->add_image();
                }
                $sql_image = "update settings set key_value='$img' where key_flag='home_right_image'";
                $this->db->query($sql_image);
                $key_list = array("site_title1", "site_title2", "site_title3");
                break;
            case 5:
                $key_list = array('business_email', 'api_user', 'api_password', 'api_signature', 'ad_price');
                break;
            case 7:
                $key_list = array('faecbook_link', 'twitter_link', 'youtube_link', 'googleplus_link');
                break;
            case 6:
                $img = '';
                if ($_FILES['image']['name'] != '') {
                    $img = $this->add_image();
                }
                $sql_logo = "update settings set key_value='$img' where key_flag='logo'";
                $this->db->query($sql_logo);
                return true;
        }
        foreach ($key_list as $key) {
            $sql = "select * from settings where key_flag='$key'";
            $query = $this->db->query($sql);

            if ($query->num_rows() > 0) {
                $mega_sql = "update settings set key_value=" . $this->db->escape($_POST[$key]) . " where key_flag='$key';";
            } else {
                $mega_sql = "insert into settings set key_flag='$key',key_value=" . $this->db->escape($_POST[$key]) . ";";
            }
            if (!$this->db->query($mega_sql)) {
                return false;
            }
        }
        return true;
    }

    function get_settings_data() {
        $data = null;
        $query = $this->db->query("select * from settings");
        $rows = $query->result_array();
        if (count($rows) > 0) {
            foreach ($rows as $row) {
                $data[$row['key_flag']] = $row['key_value'];
            }
        }
        return $data;
    }

    function confirm_password() {
        $status = 1;
        $password = $_POST['old_password'];
        $user_id = $this->session->userdata('user_id');
        $sql = "SELECT * FROM users WHERE user_id = ? AND user_password = ? and user_status= ?";
        $query = $this->db->query($sql, array($user_id, $password, $status));
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function do_update_password() {
        $password = $_POST['new_password'];
        $user_id = $this->session->userdata('user_id');
        $data = array(
            'user_password' => $password
        );
        return $this->db->update("users", $data, array('user_id' => $user_id));
    }

}

?>
