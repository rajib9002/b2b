<?php
class mod_login extends Model {

    function mod_login() {
        parent::Model();
    }

    function is_valid_user(){
        $status = '1';
        $password = $_POST['user_password'];
        $sql = "SELECT * FROM users WHERE user_email = ? AND user_password = ? and user_status = ?";
        $query = $this->db->query($sql, array($_POST['user_email'], $password, $status));
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
        $this->session->set_userdata('user_email', $data['user_email']);
        $this->session->set_userdata('user_first_name', $data['user_first_name']);
        $this->session->set_userdata('user_last_name', $data['user_last_name']);
        $this->session->set_userdata('logged_in', TRUE);
    }

    function do_logout() {
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('logged_in');
        $this->session->sess_destroy();
    }

    function reset_password() {
        $site = common::get_settings_data();
        $admin_email=$site['admin_email'];
        $verification_code = md5(date("F j, Y, g:i:s a"));
        $sql = "update users set forgot_password_verify='$verification_code' where user_email='{$_POST['user_email']}'";
        $this->db->query($sql);
        
       
        $msg_content="<div style='width:700px;font-family:trebuchet ms;color:#343434;font-size:13px;'>";
        $msg_content.="Thank you for contacting Buzzadz Account Support.
                        <br /><br />You have asked us to reset your password.
                        <br /><br />Please click on the link below to reset your password.
                        <br /><br />
                        Password Reset URL: <a href='" . site_url('login/reset_password/' . $verification_code) . "'>" . site_url('login/reset_password/' . $verification_code) . "</a>
                        <br />
                        <br />Thank you,
                        <br />Buzzadz Account Support";
        $msg_content.='</div></div>';
        $from = $site['admin_email'];
        $from_name = 'Buzzadz';
        $to = $_POST['user_email'];
        $subject = 'Forgot Password Support';
        //common::sending_mail($from, $from_name, $to, $subject, $msg_content);
        $header .= "From: " . "www.buzzadz.com" . "\r\n";
           $header.="Content-Type: text/html; charset=iso-8859-1" . "\r\n";
            @mail($to,$subject, $msg_content, $header);
            @mail($admin_email,$subject, $msg_content, $header);
       return true;
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
        $password = $_POST['new_password'];
        $sql = "update users set user_password='$password' where forgot_password_verify='$verification_code'";
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