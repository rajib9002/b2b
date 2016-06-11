<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of signup
 *
 * @author Anwar
 */
class signup extends Controller {

    private $dir = 'signup';

    function __construct() {
        parent::Controller();
        $this->load->model('signup_model');
    }

    function index() {

        if ($_POST['save']) {
            if ($this->form_validation->run('valid_signup')) {
                $this->signup_model->signup_user();
                $this->session->set_flashdata('msg', 'Thank You! for Creating Account in Bike2Biker, Please Check Your Email to Activate Your Account!');
                $adv_cost = $this->session->userdata('adv_cost');
                if ($adv_cost != '') {
                    redirect('adz/step2');
                } else {
                    redirect('signup/notice');
                }
            }
        }
        $data['msg'] = $this->session->flashdata('msg');
        $data['dir'] = $this->dir;
        $data['page'] = 'index';
        $data['page_title'] = 'Sign Up';
        $data['action'] = 'signup';
        $data['page_banner'] = 'images/sign-up.png';

        $adv_cost = $this->session->userdata('adv_cost');
        if ($adv_cost != '') {
            if ($adv_cost == 1) {
                $this->load->view('main', $data);
            } else if ($adv_cost == 0) {
                $this->load->view('main', $data);
            }
        } else {
            $this->load->view('login_with_top', $data);
        }
    }

    function is_valid_user() {
        if (sql::count("users", "user_name='{$_POST['user_name']}'") > 0 && $_POST['sess_value'] == '') {
            $this->form_validation->set_message('is_valid_user', "The User Name is already Used! Try another.");
            return false;
        } else {
            return true;
        }
    }

    function is_valid_email() {
        if (sql::count("users", "user_email='{$_POST['user_email']}'") > 0 && $_POST['sess_value'] == '') {
            $this->form_validation->set_message('is_valid_email', "The Email is already Used! Try another.");
            return false;
        } else {
            return true;
        }
    }

    function account_activation($activation_key='') {
        if ($activation_key == '') {
            redirect('home');
        }
        if ($this->signup_model->activate_account($activation_key))
            $this->session->set_flashdata('msg', 'Your Account Is Activated! Please Login to Continue.');
        else
            $this->session->set_flashdata('msg', 'Activation Key is wrong!!');
        redirect('login', 'refresh');
    }

    function notice() {
        $data['msg'] = $this->session->flashdata('msg');
        $data['page_title'] = 'Notice';
        $data['dir'] = 'signup';
        $data['page'] = 'notice';
        $this->load->view('login_with_top', $data);
    }

}

?>
