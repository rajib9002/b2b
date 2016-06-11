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
                    redirect("contact/e_mail");
                }
            }
        }
        $data['dir'] = $this->dir;
        $data['page_title'] = 'Contact';
        $data['page'] = 'contact_form';
        $data['page_banner'] = 'images/contact.png';
        $this->load->view("main_contact", $data);
    }

    function e_mail() {

        if ($_REQUEST['submit']) {
            if ($this->form_validation->run('valid_contact')) {
                if ($this->contact_model->save_contact()) {
                    $from = $_POST['contact_email'];
                    $from_name = $_POST['contact_name'];
                    $to = 'info@bike2biker.com';
                    
                    
                    // $to = 'chandodebashish@gmail.com';
                    $subject = $_POST['contact_subject'];
                    $msg = $_REQUEST['contact_message'];
                    $header .= "From: " . "www.bike2biker.com" . "\r\n";
                    $header.="Content-Type: text/html; charset=iso-8859-1" . "\r\n";
                    @mail($to, $subject, $msg, $header);
                    $msg_content = 'Thanks for contact with us';
                    @mail($from, 'Auto reply', $msg_content, $header);
                    // common::sending_mail($from, $from_name, $to, $subject, $msg);
                    redirect("contact/message");
                }
            }
        }
        $data['dir'] = $this->dir;
        $data['page_title'] = 'Contact';
        $data['page'] = 'contact_form';
        $data['page_banner'] = 'images/contact.png';
        $this->load->view("main_contact", $data);
    }

    function message() {
        $data['dir'] = $this->dir;
        $data['page_title'] = 'Success Message';
        $data['page'] = 'message';
        $this->load->view('main_contact', $data);
    }

}

?>