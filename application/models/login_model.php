<?php

/**
 * Description of login_model
 *
 * @author Anwar
 */
class login_model extends Model {

    function __construct() {
        parent::__construct();
    }

    function is_valid_user() {
        $status = 1;
        $user_password = $_POST['user_password'];
        $sql = "SELECT * FROM users WHERE (user_name = ?  or user_email= ? ) AND user_password = ? and user_status= ? and user_type=2";
        $query = $this->db->query($sql, array($_POST['user_name'],$_POST['user_name'], $user_password, $status));
        if ($query->num_rows() > 0) {
            $this->do_login($query->row_array());
            return true;
        } else {
            return false;
        }
    }

    function do_login($data) {
        $this->session->set_userdata('user_id', $data['user_id']);
        $this->session->set_userdata('user_name', $data['user_name']);
        $this->session->set_userdata('user_full_name', $data['user_first_name']. ' ' . $data['user_last_name']);
        $this->session->set_userdata('user_type', $data['user_type']);
        $this->session->set_userdata('user_email', $data['user_email']);
         $this->session->set_userdata('user_phone', $data['user_phone']);
        
        
        $this->session->set_userdata('rule_id', $data['rule_id']);
        $this->session->set_userdata('logged_in', TRUE);
    }

    function do_logout() {
        $user_id = $this->session->userdata('user_id');
        $this->session->sess_destroy();
    }

    function reset_password() {
        $site = common::get_settings_data();
        $verification_code = md5(date("F j, Y, g:i:s a"));
        $sql = "update users set forgot_password_verify='$verification_code' where user_email='{$_POST['email']}'";
        $this->db->query($sql);
        $base_url = base_url();
        $msg_content = "<div>
                            <br />
                            <h3 style='border-bottom:1px solid #DDD;margin:0;'></h3>";
        $msg_content.="<div style='width:700px;font-family:trebuchet ms;color:#343434;font-size:13px;'>";
        $msg_content.="Thank you for contacting Bike2Biker Online Account Support.
                        <br /><br />You have asked us to reset your user_password.
                        <br /><br />Please click on the link below to reset your user password.
                        <br /><br />
                        Password Reset URL: <a href='" . site_url('login/reset_password/' . $verification_code) . "'>" . site_url('login/reset_password/' . $verification_code) . "</a>
                        <br />
                        <br />Thank you,
                        <br />Bike2Biker Online Account Support";
        $msg_content.='</div></div>';
        $from = $site['admin_email'];
        $from_name = 'Bike2Biker Online Account Support';
        $to = $_POST['email'];
        $subject = 'Forgot Password Support';
        common::sending_mail($from, $from_name, $to, $subject, $msg_content);
    }

    function is_password_verfiy($password_verify) {
        $sql = $this->db->query("select * from users where forgot_password_verify='$password_verify'");
        if ($sql->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

     function update_password($verification_code) {
        $user_password = $_POST['new_password'];
        $new_user_name=$_POST['new_user_name'];
        $sql = "update users set user_password='$user_password',user_name='$new_user_name' where forgot_password_verify='$verification_code'";
        return $this->db->query($sql);
    }
    
    function activate_account($activation_key) {
        $data = array("user_status" => 1);
        if ($this->db->update("users", $data, array("user_activation_key" => $activation_key)))
            return TRUE;
        else
            return FALSE;
    }

}

?>