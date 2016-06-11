<?php

class static_pages extends Controller {

    function __construct() {
        parent::__construct();
        if (!common::is_logged_in()) {
            common::redirect("login");
        }
        $this->load->helper('file');
    }

    function index($page="about_us") {
        $data['content'] = $page;
        $data['page_title'] = "Previewing <b>" . $page . "</b> page";
        $data['dir'] = "static_pages";
        $data['page'] = "index";
        $this->load->view('main', $data);
    }

    function edit() {
        $page = $this->uri->segment(3);
        $data['content'] = $page;
        $data['page_title'] = "You Are Editing <b>" . $page . "</b> Page";
        $data['editor'] = TRUE;
        $data['dir'] = "static_pages";
        $data['page'] = "edit";
        $this->load->view('main', $data);
    }

    function save() {
        $page = $this->uri->segment(3);
        write_file(FRONT_END . "views/static/" . $page . ".php", $_POST['static_content'], "w+");
        redirect('static_pages/' . $page);
        $data['editor'] = TRUE;
        exit;
    }

    function about_us() {
        $this->index("about_us");
    }
 function schedule() {
        $this->index("schedule");
    }
    function welcome() {
        $this->index("welcome");
    }
     function welcome2() {
        $this->index("welcome2");
    }
    
    function welcome3() {
        $this->index("welcome3");
    }
    
     function contact_us() {
        $this->index("contact_us");
    }

    function terms_of_use() {
        $this->index("terms_of_use");
    }
    function privacy_policy() {
        $this->index("privacy_policy");
    }
     function spam() {
        $this->index("spam");
    }

    function careers() {
        $this->index("careers");
    }
    function payment_options () {
        $this->index("payment_options");
    }
     function advertising_fees () {
        $this->index("advertising_fees");
    }
    
    function how_to_use () {
        $this->index("how_to_use");
    }
	
	function competition () {
        $this->index("competition");
    }
   function club() {
        $this->index("club");
    }
function legal() {
        $this->index("legal");
    }
}

?>