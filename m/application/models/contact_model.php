<?php

class contact_model extends Model {

    function _construct() {
        parent::_construct();
    }

    function save_contact() {
        $data = array(
            'contact_name' => $_POST['contact_name'],
            'contact_email' => $_POST['contact_email'],
            'contact_subject' => $_POST['contact_subject'],
            'contact_message' => $_POST['contact_message'],
            'contact_date' => date('Y-m-d h:i:s')
        );
        $this->db->insert("contact", $data);


        $from = "$_POST[contact_email]";
        $to = "rajibpaul51@gmail.com"; //ruairibreathnach2528@gmail.com
        $subject = "$_POST[contact_subject]";
        $msg = $_POST['contact_message'];
        $header.= "From: " . "$from" . "\r\n";
        $header.="Content-Type: text/html; charset=iso-8859-1" . "\r\n";
        @mail($to, $subject, $msg, $header);
        $msg_content = 'Thanks for contact with us';
        @mail($from, $subject, $msg_content, $header);



        return true;
    }
    function save_reseller_contact() {
        $data = array(
            'contact_name' => $_POST['contact_name'],
            'country_name' => $_POST['country_name'],
            'contact_email' => $_POST['contact_email'],
            'contact_subject' => $_POST['contact_subject'],
            'contact_message' => $_POST['contact_message'],
            'contact_date' => date('Y-m-d h:i:s')
        );
        $this->db->insert("contact", $data);
        $msg = $_REQUEST['contact_message'];
        $site = common::get_settings_data();
        $to = $site['admin_email'];
        $from_name = 'Leased Telecom';
        $from = $_POST['contact_email'];
        $subject = $_REQUEST['contact_subject'];
        common::sending_mail($_POST['contact_name'], $_POST['contact_email'], $to, $subject, $msg);
        return true;
    }

}

?>
