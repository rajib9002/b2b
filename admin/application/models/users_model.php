<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of users_model
 *
 * @author Anwar
 */
class users_model extends Model {

    function __construct() {
        parent::__construct();
    }

    function get_users_grid() {
        $sortname = common::getVar('sidx', 'user_id');
        $sortorder = common::getVar('sord', 'asc');
        $sort = "ORDER BY $sortname $sortorder";

        $con = '1';
        $cid = common::getVar('cid');
        $uid = common::getVar('uid');

        if ($uid != '') {
            $con.=" and user_name like '$uid%'";
        }

        $sql = "select * from users where $con $sort";

        $page = common::getVar('page', 1);
        $limit = common::getVar('rows');
        $temp = $this->db->query($sql);
        $count = count($temp->result_array());
        if ($count > 0) {
            $total_pages = ceil($count / $limit);
        } else {
            $total_pages = 0;
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

        $i = 0;
        $responce->page = $page;
        $responce->total = $total_pages;
        $responce->records = $count;

        foreach ($rows as $row) {
            $user_full_name=$row['user_first_name'].' '.$row['user_last_name'];
            $user_status = $row[user_status] == 1 ? 'Active' : 'Inactive';
            $responce->rows[$i]['id'] = $row['user_id'] + ID_GENERATE;
            $responce->rows[$i]['cell'] = array($row['user_name'], $user_full_name, $row['user_email'], $user_status);
            $i++;
        }
        header("Expires: Sat, 17 Jul 2010 05:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
        header("Cache-Control: no-cache, must-revalidate");
        header("Pragma: no-cache");
        header("Author: Md. Anwar Hossain");
        header("Email: anwarworld@gmail.com");
        header("Content-type: text/x-json");
        echo json_encode($responce);
        return '';
    }

    function save_user() {
        $data = array(
            'user_name' => $_POST['user_name'],
            'user_password' => $_POST['user_password'],
            'user_first_name' => $_POST['user_first_name'],
            'user_last_name' => $_POST['user_last_name'],
            'user_email' => $_POST['user_email'],
            'user_phone' => $_POST['user_phone'],
            'user_type' => 1,
            'user_status'=>1,
            'reply_mail' => "$_POST[reply_mail]",
            'site_title' => "$_POST[site_title]",
            'paypal_settings' => "$_POST[paypal_settings]",
            'contact_information' => "$_POST[contact_information]",
            'change_logo' => "$_POST[change_logo]",
            'change_password' => "$_POST[change_password]",
            'contact_mail' => "$_POST[contact_mail]",
            'about' => "$_POST[about]",
            'welcome1' => "$_POST[welcome1]",
            'welcome2' => "$_POST[welcome2]",
            'welcome3' => "$_POST[welcome3]",
            'privacy' => "$_POST[privacy]",
            'terms' => "$_POST[terms]",
            'spam' => "$_POST[spam]",
            'careers' => "$_POST[careers]",
            'payment' => "$_POST[payment]",
            'ads_fees' => "$_POST[ads_fees]",
            'how' => "$_POST[how]",
            'club' => "$_POST[club]",
            'country' => "$_POST[country]",
            'type' => "$_POST[type]",
            'make' => "$_POST[make]",
            'model' => "$_POST[model]",
            'area' => "$_POST[area]",
            'users' => "$_POST[users]",
            'class' => "$_POST[class]",
            'competition' => "$_POST[competition]",
            'c_details' => "$_POST[c_details]",
            'rider' => "$_POST[rider]",
            'c_result' => "$_POST[c_result]",
             'manage_ads' => "$_POST[manage_ads]",
            'slider' => "$_POST[slider]",
            'banner' => "$_POST[banner]",
            'full_access' => "$_POST[full_access]"
        );
        $this->db->insert('users', $data);
    }

    function update_user() {
        $user_id = $this->session->userdata('edit_user_id');
        $data = array(
            'user_name' => $_POST['user_name'],
            'user_password' => $_POST['user_password'],
            'user_first_name' => $_POST['user_first_name'],
            'user_last_name' => $_POST['user_last_name'],
            'user_email' => $_POST['user_email'],
            'user_phone' => $_POST['user_phone'],
            'user_type' => 1,
            'user_status'=>1,
            'reply_mail' => "$_POST[reply_mail]",
            'site_title' => "$_POST[site_title]",
            'paypal_settings' => "$_POST[paypal_settings]",
            'contact_information' => "$_POST[contact_information]",
            'change_logo' => "$_POST[change_logo]",
            'change_password' => "$_POST[change_password]",
            'contact_mail' => "$_POST[contact_mail]",
            'about' => "$_POST[about]",
            'welcome1' => "$_POST[welcome1]",
            'welcome2' => "$_POST[welcome2]",
            'welcome3' => "$_POST[welcome3]",
            'privacy' => "$_POST[privacy]",
            'terms' => "$_POST[terms]",
            'spam' => "$_POST[spam]",
            'careers' => "$_POST[careers]",
            'payment' => "$_POST[payment]",
            'ads_fees' => "$_POST[ads_fees]",
            'how' => "$_POST[how]",
            'club' => "$_POST[club]",
            'country' => "$_POST[country]",
            'type' => "$_POST[type]",
            'make' => "$_POST[make]",
            'model' => "$_POST[model]",
            'area' => "$_POST[area]",
            'users' => "$_POST[users]",
            'class' => "$_POST[class]",
            'competition' => "$_POST[competition]",
            'c_details' => "$_POST[c_details]",
            'rider' => "$_POST[rider]",
            'c_result' => "$_POST[c_result]",
             'manage_ads' => "$_POST[manage_ads]",
            'slider' => "$_POST[slider]",
            'banner' => "$_POST[banner]",
            'full_access' => "$_POST[full_access]"
        );
        $this->db->update('users', $data, array('user_id' => $user_id));
    }
    
    
}

?>