<?php
$config = array(
        'valid_contact' => array(
                array('field' => 'contact_name', 'label' => 'Name', 'rules' => 'required'),
                array('field' => 'contact_email', 'label' => 'Email', 'rules' => 'required|valid_email'),
                array('field' => 'contact_subject', 'label' => 'Subject', 'rules' => 'required'),
                array('field' => 'contact_message', 'label' => 'Message', 'rules' => 'required')
        ),
        'valid_signup' => array(
                array('field' => 'user_name', 'label' => 'User Name', 'rules' => 'required|callback_is_valid_user'),
                array('field' => 'user_password', 'label' => 'Password', 'rules' => 'required'),
                array('field' => 'confirm_password', 'label' => 'Confirm Password', 'rules' => 'required|matches[user_password]'),
                array('field' => 'user_first_name', 'label' => 'First Name', 'rules' => 'required'),
                array('field' => 'user_email', 'label' => 'Email', 'rules' => 'required|valid_email|callback_is_valid_email'),
                array('field' => 'user_phone', 'label' => 'Phone', 'rules' => 'required'),
                array('field' => 'country_id', 'label' => 'Country', 'rules' => 'required'),
                array('field' => 'area_id', 'label' => 'Area', 'rules' => 'required'),
        ),
        'valid_edit_info' => array(
                array('field' => 'user_first_name', 'label' => 'First Name', 'rules' => 'required'),
                array('field' => 'user_email', 'label' => 'Email', 'rules' => 'required|valid_email|callback_is_valid_email'),
                array('field' => 'user_phone', 'label' => 'Phone', 'rules' => 'required'),
                array('field' => 'area_id', 'label' => 'City', 'rules' => 'required'),
        ),
        'valid_adz' => array(array('field' => 'main_type_id', 'label' => 'Main Type', 'rules' => 'required'),
                array('field' => 'ad_type', 'label' => 'Ad Type', 'rules' => 'required'),
                array('field' => 'type_id_new', 'label' => 'Type', 'rules' => 'required')
        ),
        'valid_adz_step2' => array(
                array('field' => 'parent_id', 'label' => 'Ad Type', 'rules' => 'required')
        ),
        'valid_adz_step3' => array(
                array('field' => 'year', 'label' => 'Year', 'rules' => 'required'),
                array('field' => 'company_id', 'label' => 'Make', 'rules' => 'required'),
                array('field' => 'model_id', 'label' => 'Model Name', 'rules' => 'required')
        ),
        'valid_adz_step3_description' => array(
                array('field' => 'type_id', 'label' => 'Type Name', 'rules' => 'required')
        ),
        'valid_general_info' => array(
                array('field' => 'country_id', 'label' => 'country', 'rules' => 'required'),
                array('field' => 'area_id', 'label' => 'Area', 'rules' => 'required'),
                array('field' => 'currency', 'label' => 'Currency', 'rules' => 'required'),
                array('field' => 'price', 'label' => 'Price', 'rules' => 'required|numeric'),
                array('field' => 'full_description', 'label' => 'full description', 'rules' => 'required')
        ),
        'valid_adz_step5' => array(
                array('field' => 'seller_email', 'label' => 'Email', 'rules' => 'required|valid_email|callback_is_valid_email'),
        ),
        'valid_adz_step6' => array(
                array('field' => 'seller_email', 'label' => 'Email', 'rules' => 'required'),
                array('field' => 'seller_name', 'label' => 'Name', 'rules' => 'required'),
                array('field' => 'seller_phone', 'label' => 'Phone', 'rules' => 'required')
        ),
        'valid_adz_with_user' => array(
                array('field' => 'ad_type', 'label' => 'Ad Type', 'rules' => 'required'),
                array('field' => 'area_id', 'label' => 'Area', 'rules' => 'required'),
                array('field' => 'type_id', 'label' => 'Bike Type', 'rules' => 'required'),
                array('field' => 'model_id', 'label' => 'Bike Model', 'rules' => 'required'),
                array('field' => 'full_description', 'label' => 'Full Description', 'rules' => 'required'),
                array('field' => 'price', 'label' => 'Bike Price', 'rules' => 'required'),
                array('field' => 'seller_name', 'label' => 'Seller Name', 'rules' => 'required|callback_is_valid_user'),
                array('field' => 'user_name', 'label' => 'Username', 'rules' => 'required'),
                array('field' => 'user_password', 'label' => 'Password', 'rules' => 'required')
        ),
        'valid_save_adz' => array(
                array('field' => 'user_name', 'label' => 'User Name', 'rules' => 'callback_save_ad_check')
        ),
        'valid_login' => array(
                array('field' => 'user_name', 'label' => 'User Name', 'rules' => 'required'),
                array('field' => 'user_password', 'label' => 'Password', 'rules' => 'required')
        ),
        'valid_forgot_password' => array(
                array('field' => 'user_email', 'label' => 'Email', 'rules' => 'required|valid_email|callback_is_user'),
        ),
        'valid_change_password' => array(
                array('field' => 'old_password', 'label' => 'Old Password', 'rules' => 'required|callback_is_valid_user_password'),
                array('field' => 'user_password', 'label' => 'New Password', 'rules' => 'required'),
                array('field' => 'confirm_password', 'label' => 'Confirm Password', 'rules' => 'required|matches[user_password]')
        ),
        'valid_adz_update' => array(
                array('field' => 'ad_type', 'label' => 'Ad Type', 'rules' => 'required'),
                array('field' => 'seller_type', 'label' => 'Seller Type', 'rules' => 'required'),
                array('field' => 'ad_title', 'label' => 'Brief Description', 'rules' => 'required'),
                array('field' => 'type_id', 'label' => 'Bike Type', 'rules' => 'required'),
                array('field' => 'area_id', 'label' => 'Area', 'rules' => 'required'),
                array('field' => 'currency', 'label' => 'Currency', 'rules' => 'required'),
                array('field' => 'price', 'label' => 'Bike Price', 'rules' => 'required'),
                array('field' => 'full_description', 'label' => 'Full Description', 'rules' => 'required'),
        ),
);
?>