<?php

class contact extends Controller {

    var $dir = "contact";

    public function __construct() {
        parent::__construct();
        $this->load->model("contact_model");
    }

    function index() {

        if ($_REQUEST['submit']) {
            if ($this->form_validation->run('valid_contact')) {
                if ($this->contact_model->save_contact()) {
                    redirect("contact/message");
                }
            }
        }
        $data['dir'] = $this->dir;
        $data['page_title'] = 'Contact';
        $data['page'] = 'contact_form';
        $data['page_banner'] = 'images/contact.png';
        $this->load->view("login_with_top", $data);
    }

    function e_mail() {

        if ($_REQUEST['submit']) {
            if ($this->form_validation->run('valid_contact')) {
                if ($this->contact_model->save_contact()) {
                    $from = $_POST['contact_email'];
                    $from_name = $_POST['contact_name'];
                    $to = 'ruairibreathnach2528@gmail.com';
                    $subject = $_POST['contact_subject'];
                    $msg = $_REQUEST['contact_message'];
                    common::sending_mail($from, $from_name, $to, $subject, $msg);
                    redirect("contact/message");
                }
            }
        }
        $data['dir'] = $this->dir;
        $data['page_title'] = 'Contact';

        $data['page'] = 'contact_form';

        $data['page_banner'] = 'images/contact.png';
        $this->load->view("login_with_top", $data);
    }

    function message() {
        $data['dir'] = $this->dir;
        $data['page_title'] = 'Success Message';
        $data['page'] = 'message';
        $this->load->view('login_with_top', $data);
    }

}

?>