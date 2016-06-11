<?php

class pages extends Controller {

    public function __construct() {
        parent::Controller();
    }

    function about_us() {
        $data['page_title'] = 'About Us';
        $data['dir'] = 'static';
        $data['page'] = 'about_us';
        $data['page_banner'] = 'images/about_us.png';
        $this->load->view("main", $data);
    }

 function schedule() {
        $data['page_title'] = 'schedule';
        $data['dir'] = 'static';
        $data['page'] = 'schedule';
        $data['page_banner'] = 'images/about_us.png';
        $this->load->view("main", $data);
    }


    function terms_of_use() {
        $data['page_title'] = 'Terms And Condition';
        $data['dir'] = 'static';
        $data['page'] = 'terms_of_use';
       $data['page_banner'] = 'images/all.png';
        $this->load->view("main", $data);
    }

    function privacy_policy() {
        $data['page_title'] = 'Privacy Policy';
        $data['dir'] = 'static';
        $data['page'] = 'privacy_policy';
        $data['page_banner'] = 'images/all.png';
        $this->load->view("main", $data);
    }
     function spam() {
        $data['page_title'] = 'Spam';
        $data['dir'] = 'static';
        $data['page'] = 'spam';
        $data['page_banner'] = 'images/all.png';
        $this->load->view("main", $data);
    }

function legal() {
        $data['page_title'] = 'legal';
        $data['dir'] = 'static';
        $data['page'] = 'legal';
        $data['page_banner'] = 'images/legal.png';
        $this->load->view("main", $data);
    }



    function careers() {
        $data['page_title'] = 'Careers';
        $data['dir'] = 'static';
        $data['page'] = 'careers';
        $data['page_banner'] = 'images/careers.png';
        $this->load->view("main", $data);
    }

    function payment_options() {
        $data['page_title'] = 'Payment Options';
        $data['dir'] = 'static';
        $data['page'] = 'payment_options';
        $data['page_banner'] = 'images/all.png';
        $this->load->view("main", $data);
    }
    function advertising_fees() {
        $data['page_title'] = 'Advertising Fees';
        $data['dir'] = 'static';
        $data['page'] = 'advertising_fees';
        $data['page_banner'] = 'images/all.png';
        $this->load->view("main", $data);
    }
   
    function how_to_use() {
        $data['page_title'] = 'How to Use Site';
        $data['dir'] = 'static';
        $data['page'] = 'how_to_use';
        $data['page_banner'] = 'images/all.png';
        $this->load->view("main", $data);
    }
    function welcome() {
        $data['page_title'] = 'Welcome';
        $data['dir'] = 'static';
        $data['page'] = 'welcome';
        $data['page_banner'] = 'images/all.png';
        $this->load->view("main", $data);
    }
    function welcome2() {
        $data['page_title'] = 'Welcome';
        $data['dir'] = 'static';
        $data['page'] = 'welcome2';
        $data['page_banner'] = 'images/all.png';
        $this->load->view("main", $data);
    }

     function welcome3() {
        $data['page_title'] = 'Welcome';
        $data['dir'] = 'static';
        $data['page'] = 'welcome3';
        $data['page_banner'] = 'images/all.png';
        $this->load->view("main", $data);
    }
}
