<?php

$config = array(
    'valid_bike_model' => array(
        array('field' => 'model_name', 'label' => 'Model Name', 'rules' => 'required'),
        array('field' => 'make_id', 'label' => 'Make Name', 'rules' => 'required'),
        array('field' => 'main_type_id', 'label' => 'Main Type Name', 'rules' => 'required'),
        array('field' => 'type_id', 'label' => 'Type Name', 'rules' => 'required')
    ),
    'valid_bike_make' => array(
        array('field' => 'make_name', 'label' => 'Make Name', 'rules' => 'required|callback_is_valid_bike_make')
    ),
    'valid_bike_type' => array(
         array('field' => 'main_type_id', 'label' => 'Main Type', 'rules' => 'required'),
        array('field' => 'type_name', 'label' => 'Type Name', 'rules' => 'required|callback_is_valid_bike_type')
    ),
      'valid_bike_main_type' => array(
        array('field' => 'type_name', 'label' => 'Type Name', 'rules' => 'required|callback_is_valid_bike_main_type')
    ),
    'valid_country' => array(
        array('field' => 'country_name', 'label' => 'Country Name', 'rules' => 'required|callback_is_valid_country'),
        array('field' => 'currency', 'label' => 'Currency Name', 'rules' => 'required'),
        array('field' => 'amount', 'label' => 'Amount', 'rules' => 'required')
    ),
    'valid_contact' => array(
        array('field' => 'contact_subject', 'label' => 'Subject', 'rules' => 'required'),
        array('field' => 'contact_message', 'label' => 'Message', 'rules' => 'required'),
    ),
    'valid_host_body' => array(
        array('field' => 'host_body_name', 'label' => 'Host Body Name', 'rules' => 'required|callback_is_valid_host_body'),
        array('field' => 'country_id', 'label' => 'Country Name', 'rules' => 'required')
    ),
    'valid_club' => array(
        array('field' => 'club_name', 'label' => 'Host Club Name', 'rules' => 'required|callback_is_valid_club'),
        array('field' => 'country_id', 'label' => 'Country Name', 'rules' => 'required')
    ),
    'valid_discipline' => array(
        array('field' => 'discipline_name', 'label' => 'Discipline Name', 'rules' => 'required|callback_is_valid_discipline')
    ),
    'valid_area' => array(
        array('field' => 'area_name', 'label' => 'Area Name', 'rules' => 'required|callback_is_valid_area'),
        array('field' => 'country_id', 'label' => 'Country Name', 'rules' => 'required')
    ),
    'valid_forgot_password' => array(
        array('field' => 'email', 'label' => 'Email', 'rules' => 'required|valid_email|callback_is_user'),
    ),
    'valid_login' => array(
        array('field' => 'user_name', 'label' => 'User Name', 'rules' => 'required'),
        array('field' => 'user_password', 'label' => 'Password', 'rules' => 'required')
    ),
    'valid_change_password' => array(
        array('field' => 'old_password', 'label' => 'Old Password', 'rules' => 'required|callback_is_valid_user_password'),
        array('field' => 'new_password', 'label' => 'New Password', 'rules' => 'required'),
        array('field' => 'confirm_password', 'label' => 'Confirm Password', 'rules' => 'required|matches[new_password]')
    ),
    'valid_user' => array(
        array('field' => 'user_name', 'label' => 'User Name', 'rules' => 'required|alpha_numeric|callback_is_valid_user'),
        array('field' => 'user_password', 'label' => 'Password', 'rules' => 'required'),
        array('field' => 'confirm_password', 'label' => 'Confirm Password', 'rules' => 'required|matches[user_password]'),
        array('field' => 'user_first_name', 'label' => 'First Name', 'rules' => 'required'),
        array('field' => 'user_last_name', 'label' => 'Last Name', 'rules' => 'required'),
        array('field' => 'user_email', 'label' => 'Email', 'rules' => 'required|valid_email'),
        array('field' => 'user_phone', 'label' => 'Phone', 'rules' => 'required'),
        array('field' => 'full_access', 'label' => 'Access', 'rules' => 'required')
    ),
    'valid_slider' => array(
        array('field' => 'title', 'label' => 'Title', 'rules' => 'required')
    ),
    'valid_static_image' => array(
        array('field' => 'title', 'label' => 'Title', 'rules' => 'required')
    ),
     'valid_ad_image' => array(
        array('field' => 'title', 'label' => 'Title', 'rules' => 'required')
    ),
    
    
    'valid_competition' => array(
        array('field' => 'country_id', 'label' => 'Country', 'rules' => 'required'),
        array('field' => 'competition_title', 'label' => 'Title', 'rules' => 'required'),
        array('field' => 'competition_des', 'label' => 'Description', 'rules' => 'required'),
        array('field' => 'competition_date', 'label' => 'Date', 'rules' => 'required'),
        array('field' => 'competition_club', 'label' => 'Club', 'rules' => 'required'),
        array('field' => 'competition_venue', 'label' => 'Venue', 'rules' => 'required')
    ),
    'valid_competition_result' => array(
        array('field' => 'competitionr_id', 'label' => 'Competiton Name', 'rules' => 'required'),
        array('field' => 'competitionr_details_id', 'label' => 'Round Name', 'rules' => 'required'),
        array('field' => 'class_id', 'label' => 'Class Name', 'rules' => 'required')
    ),
    'valid_rider_class' => array(
        array('field' => 'rider_class_name', 'label' => 'Class Name', 'rules' => 'required')
    ),
    'valid_competitionr' => array(
        array('field' => 'competitionr_name', 'label' => 'Competition Name', 'rules' => 'required'),
        array('field' => 'competitionr_host_club', 'label' => 'Host Body', 'rules' => 'required'),
        array('field' => 'country_id', 'label' => 'Country Name', 'rules' => 'required')
    ),
    'valid_competitionr_details' => array(
        array('field' => 'competitionr_id', 'label' => 'Competition Name', 'rules' => 'required'),
        array('field' => 'competitionr_details_host_club', 'label' => 'Host Club', 'rules' => 'required'),
        array('field' => 'competitionr_details_round', 'label' => 'Round', 'rules' => 'required'),
        array('field' => 'competitionr_details_date', 'label' => 'Date', 'rules' => 'required'),
        array('field' => 'year', 'label' => 'Year', 'rules' => 'required'),
        array('field' => 'country_id', 'label' => 'Country Name', 'rules' => 'required'),
        array('field' => 'host_country_id', 'label' => 'Host Country Name', 'rules' => 'required')
    ),
    'valid_rider' => array(
        array('field' => 'rider_number', 'label' => 'Rider Number', 'rules' => 'required'),
        array('field' => 'rider_first_name', 'label' => 'Rider First Name', 'rules' => 'required'),
        array('field' => 'rider_last_name', 'label' => 'Rider Last Name', 'rules' => 'required'),
        array('field' => 'country_id', 'label' => 'Country Name', 'rules' => 'required'),
        array('field' => 'class_id', 'label' => 'Class Name', 'rules' => 'required'),
        array('field' => 'competitionr_id', 'label' => 'Competition Name', 'rules' => 'required')
    ),
);
?>
