<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of settings
 *
 * @author Anwar
 */
class settings extends Controller {

    private $dir = 'settings';

    function __construct() {
        parent::__construct();
        $this->load->model('settings_model');
    }

    function index() {
        if ($_POST['update']) {
            if ($this->settings_model->update_settings(1)) {
                $msg = "Settings Updated Successfully!!!";
            }
        }
        $data = $this->settings_model->get_settings_data();
        $this->session->set_userdata('system_date', $data['system_date']);
        $data['nav_array'] = array(
            array('title' => 'System Settings', 'url' => '')
        );

        $data['msg'] = $msg;
        $data['page_title'] = "System Settings";
        $data['dir'] = $this->dir;
        $data['page'] = 'index';
        $this->load->view('main', $data);
    }

    function contact() {
        if ($_POST['update']) {
            if ($this->settings_model->update_settings(3)) {
                $msg = "Settings Updated Successfully!!!";
            }
        }
        $data = $this->settings_model->get_settings_data();
        $data['nav_array'] = array(
            array('title' => 'Contact Settings', 'url' => '')
        );

        $data['msg'] = $msg;
        $data['page_title'] = "Contact Settings";
        $data['dir'] = $this->dir;
        $data['page'] = 'contact';
        $this->load->view('main', $data);
    }

    function site_settings() {
        if ($_POST['update']) {
            if ($this->settings_model->update_settings(4)) {
                $msg = "Settings Updated Successfully!!!";
            }
        }
        $data = $this->settings_model->get_settings_data();
        $data['nav_array'] = array(
            array('title' => 'Contact Settings', 'url' => '')
        );

        $data['msg'] = $msg;
        $data['page_title'] = "Contact Settings";
        $data['dir'] = $this->dir;
        $data['page'] = 'site_settings';
        $this->load->view('main', $data);
    }
    
    
    function social_weblink() {
        if ($_POST['update']) {
            if ($this->settings_model->update_settings(7)) {
                $msg = "Settings Updated Successfully!!!";
            }
        }
        $data = $this->settings_model->get_settings_data();
        $data['nav_array'] = array(
            array('title' => 'Social Web Settings', 'url' => '')
        );

        $data['msg'] = $msg;
        $data['page_title'] = "Social Web Settings";
        $data['dir'] = $this->dir;
        $data['page'] = 'social_weblink';
        $this->load->view('main', $data);
    }
    
    
    function change_logo() {
        if ($_POST['update']) {
            if ($this->settings_model->update_settings(6)) {
                $msg = "Settings Updated Successfully!!!";
            }
        }
        $data = $this->settings_model->get_settings_data();
        $data['nav_array'] = array(
            array('title' => 'Change Logo', 'url' => '')
        );

        $data['msg'] = $msg;
        $data['page_title'] = "Change Logo";
        $data['dir'] = $this->dir;
        $data['page'] = 'change_logo';
        $this->load->view('main', $data);
    }
    
    
    
    
    function set_paypal() {
        if ($_POST['update']) {
            if ($this->settings_model->update_settings(5)) {
                $msg = "Settings Updated Successfully!!!";
            }
        }
        $data = $this->settings_model->get_settings_data();
        $data['nav_array'] = array(
            array('title' => 'Paypal Settings', 'url' => '')
        );
        $data['msg'] = $msg;
        $data['page_title'] = "Paypal Settings";
        $data['dir'] = $this->dir;
        $data['page'] = 'set_email';
        $this->load->view('main', $data);
    }
     function ad_price() {
        if ($_POST['update']) {
            if ($this->settings_model->update_settings(5)) {
                $msg = "Settings Updated Successfully!!!";
            }
        }
        $data = $this->settings_model->get_settings_data();
        $data['nav_array'] = array(
            array('title' => 'Ad Price Settings', 'url' => '')
        );

        $data['msg'] = $msg;
        $data['page_title'] = "Ad Price Settings";
        $data['dir'] = $this->dir;
        $data['page'] = 'ad_price';
        $this->load->view('main', $data);
    }

    function change_password() {
        if ($_POST['change_password']) {
            if ($this->form_validation->run('valid_change_password')) {
                if ($this->settings_model->do_update_password()) {
                    $this->session->set_flashdata('msg', 'Your Password changed Successfully!!!');
                    redirect('settings/change_password');
                }
            }
        }
        $data['nav_array'] = array(
            array('title' => 'Change Password', 'url' => '')
        );
        $data['dir'] = $this->dir;
        $data['msg'] = $this->session->flashdata('msg');
        $data['page'] = 'change_password';
        $data['page_title'] = 'Change Password';
        $this->load->view('main', $data);
    }

    function is_valid_user_password() {
        if (!$this->settings_model->confirm_password()) {
            $this->form_validation->set_message('is_valid_user_password', 'Invalid Old Password');
            return false;
        } else {
            return true;
        }
    }
    
    
//    function welcome_right_picture() {
//        if ($_POST['update']) {
//            
//            
//            
//            if ($this->settings_model->update_settings(5)) {
//                $msg = "Settings Updated Successfully!!!";
//            }
//        }
//        $data = $this->settings_model->get_settings_data();
//        $data['nav_array'] = array(
//            array('title' => 'Contact Settings', 'url' => '')
//        );
//
//        $data['msg'] = $msg;
//        $data['page_title'] = "Contact Settings";
//        $data['dir'] = $this->dir;
//        $data['page'] = 'site_settings';
//        $this->load->view('main', $data);
//    }
    

}

?>
