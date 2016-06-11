<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login
 *
 * @author Anwar
 */
class login extends Controller {

    private $dir = 'login';

    function __construct() {
        parent::__construct();
        $this->load->model('login_model');
    }

    function index() {
        if ($_POST['login']) {
            if ($this->form_validation->run('valid_login')) {
                if ($this->login_model->is_valid_user()) {
                    $user_url = $this->session->userdata('user_url');
                    if ($user_url != '')
                        redirect($user_url);
                    else
                        redirect('adz/adz_list');
                } else {
                    $data['msg'] = 'Invalid User and Password';
                }
            }
        }
        if ($data['msg'] == '') {
            $data['msg'] = $this->session->flashdata('msg');
        }
        $data['cap_image'] = $cap['image'];
        $this->session->set_userdata("sess_word", $cap['word']);
        $data['page_title'] = 'Login';
        $data['page_banner'] = 'images/login.png';
        $data['dir'] = 'login';
        $data['page'] = 'index';
        $this->load->view('login_with_top', $data);
    }

    function adz_login_page() {
        if ($_POST['login']) {
            if ($this->form_validation->run('valid_login')) {
                if ($this->login_model->is_valid_user()) {
                    redirect('adz/add_adz');
                } else {
                    $data['msg'] = 'Invalid User and Password';
                }
            }
        }
        if ($data['msg'] == '') {
            $data['msg'] = $this->session->flashdata('msg');
        }
        $data['cap_image'] = $cap['image'];
        $this->session->set_userdata("sess_word", $cap['word']);
        $data['page_title'] = 'Login';
        $data['page_banner'] = 'images/login.png';
        $data['dir'] = 'login';
        $data['page'] = 'adz_login_page';
        $this->load->view('login_with_top', $data);
    }

    function logout() {
        $this->login_model->do_logout();
        redirect('login');
    }

    function forgot_password() {

        if ($_POST['send']) {
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_is_user');
            if ($this->form_validation->run()) {
                $this->login_model->reset_password();
                $this->session->set_flashdata('msg', '<div style="text-align:left;color:#fff;margin-right:2px;font-size: 20px">Thank you for contacting Bike2Biker Online Account Support.<p>We have Sent you an email to ' . $_POST['email'] . ' .
                                                    <span class="block">Please check your email- a password reset link will be included in a message from Bike2Biker. Please click on the link to complete your password reset Process.</span></p>
                                                    <br />
                                                    <br />Thank you,
                                                    <br />Bike2Biker Online Account Support</div>');
                redirect('login/notice');
            }
        }
        $data['page_title'] = 'Forgot Password';
        $data['dir'] = 'login';
        $data['page_banner'] = 'images/login.png';
        $data['page'] = 'forgot_password';
        $this->load->view('login_with_top', $data);
    }

    function is_user() {
        $valid = sql::count('users', "user_email='{$_POST['email']}'");
        if ($valid > 0) {
            return TRUE;
        } else {
            $this->form_validation->set_message('is_user', 'Email or User Name is invalid!');
            return FALSE;
        }
    }

    function notice() {
        $data['msg'] = $this->session->flashdata('msg');
        //if ($data['msg'] == '') {
        //    redirect('home');
        //}
        $data['page_title'] = 'Notice';
        $data['dir'] = 'login';
        $data['page_banner'] = 'images/login.png';
        $data['page'] = 'notice';
        $this->load->view('login_with_top', $data);
    }

    function reset_password($verification_code = '') {
        if ($_POST['change_password']) {
            $this->form_validation->set_rules('new_user_name', 'User Name', 'required');
            $this->form_validation->set_rules('new_password', 'Password', 'required|min_length[6]');
            $this->form_validation->set_rules('conf_password', 'Confirm Password', 'required|matches[new_password]');
            if ($this->form_validation->run()) {
                $this->login_model->update_password($verification_code);
                $this->session->set_flashdata('msg', 'Password Changed Successfully!!!');
                redirect('login/notice');
            }
        }
        if ($verification_code == '') {
            redirect('adz');
        }
        // if ($this->login_model->is_password_verfiy($verification_code)) {
        $data['verify_code'] = $verification_code;
        $data['link_array'] = array(
            array('title' => 'Reset Password', 'url' => '')
        );
        $data['dir'] = 'login';
        $data['page'] = 'reset_password';
        $data['page_banner'] = 'images/login.png';
        $data['page_title'] = 'Reset Password';
        $this->load->view('login_with_top', $data);
        //} else {
        //   $this->session->set_flashdata('msg', 'Error!!!<br />An Error occured!.');
        //   redirect('login/notice');
        //}
    }

    function account_activation($activation_key = '') {
        if ($activation_key == '') {
            redirect('home');
        }
        if ($this->login_model->activate_account($activation_key))
            $this->session->set_flashdata('msg', 'Your Account Is Activated! Please Login to continue.');
        else
            $this->session->set_flashdata('msg', 'Activation Key is wrong!!');
        redirect('login', 'refresh');
    }

}

?>
