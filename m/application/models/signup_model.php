<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of signup_model
 *
 * @author Anwar
 */
class signup_model extends Model {

    function __construct() {
        parent::Model();
    }

    function signup_user() {
        $user_type = $_POST['user_type'];
        $data = array(
            'user_name' => $_POST['user_name'],
            'user_password' => $_POST['user_password'],
            'user_first_name' => $_POST['user_first_name'],
            'user_last_name' => $_POST['user_last_name'],
            'user_email' => $_POST['user_email'],
            'user_phone' => $_POST['user_phone'],
            'mobile_phone2' => $_POST['mobile_phone2'],
            'land_phone' => $_POST['land_phone'],
            'post_code' => $_POST['post_code'],
            'currency' => $_POST['currency'],
            'seller_type' => $_POST['seller_type'],
            'area_id' => $_POST['area_id'],
            'country_id' => $_POST['country_id'],
            'user_type' => 2
        );








        $this->db->insert('users', $data);

        $u_id = $this->db->insert_id();
        $this->session->set_userdata('user_id', $u_id);

        $user_email = $_POST['user_email'];
        $username = $_POST['user_name'];
        common::user_account_activation($user_email, $username, TRUE);
    }

    function activate_account($activation_key) {
        $data = array("user_status" => 1);
        if ($this->db->update("users", $data, array("user_activation_key" => "$activation_key")))
            return TRUE;
        else
            return FALSE;
    }

}

?>
