<?php
class contact extends Controller {
   var $dir = "contact";
    public function __construct() {
        parent::__construct();
        $this->load->model("contact_model");
        if (!common::is_logged_in()) {
            common::redirect("login");
        }
     
    }
    function index(){
         $data['nav_array'] = array(
            array('title' => 'Manage Contact', 'url' => '')
        );
        $this->load->library('grid');
        $gridObj = new grid();
        $gridColumn = array('Sent Date','Name', 'Email', 'Subject', 'Message','Reply');
        $gridColumnModel = array(
            array("name" => "contact_date",
                "index" => "contact_date",
                "width" => 220,
                "sortable" => true,
                "align" => "left",
                "editable" => true
            ), array("name" => "contact_name",
                "index" => "contact_name",
                "width" => 120,
                "sortable" => true,
                "align" => "left",
                "editable" => true
            ),
            array("name" => "contact_email",
                "index" => "contact_email",
                "width" => 200,
                "sortable" => true,
                "align" => "left",
                "editable" => true
            ),
            array("name" => "contact_subject",
                "index" => "contact_subject",
                "width" => 120,
                "sortable" => true,
                "align" => "left",
                "editable" => true
            ),
            array("name" => "contact_message",
                "index" => "contact_message",
                "width" => 380,
                "sortable" => true,
                "align" => "center",
                "editable" => true
            ),
            array("name" => "reply_date",
                "index" => "reply_date",
                "width" => 150,
                "sortable" => true,
                "align" => "center",
                "editable" => true
            )
        );
        if ($_POST['search']) {
            $gridObj->setGridOptions('Contact List', 900, 200, "contact_date", "desc", $gridColumn, $gridColumnModel, site_url("?c=contact&m=load_data&name={$_POST['name']}&subject={$_POST['subject']}&message={$_POST['message']}"), true);
        } else {
            $gridObj->setGridOptions('Contact List', 900, 200, "contact_date", "desc", $gridColumn, $gridColumnModel, site_url('contact/load_data'), true);
        }
        $data['grid_data'] = $gridObj->getGrid();
        $data['msg'] = $this->session->flashdata('msg');
        $data['dir'] = 'contact';
        $data['page'] = 'index';
        $data['page_title'] = 'Manage Contact';
        $this->load->view('main', $data);
    }
    function load_data(){
        $this->contact_model->get_contact_listing();
    }
    function delete_contact($id=''){
        if($this->contact_model->delete_contact($id)){
            $this->session->set_flashdata("msg","Content deleted successfully");
            redirect('contact');
        }
    }
    function reply($id) {
        if($_REQUEST['save']){
            if($this->form_validation->run('valid_contact')){
                
                if($this->contact_model->reply($id)){
                    redirect("contact");
                }
            }
        }
         $data=sql::row("contact","contact_id='$id'");
         $data['nav_array'] = array(
            array('title' => 'Manage Contact', 'url' => site_url('contact')),
              array('title' => 'Reply', 'url' => '')
        );
        
        $data['page_title']="Reply";
        $data['dir'] = $this->dir;
        $data['page'] = 'reply_form';
        $this->load->view("main", $data);
    }
    
}
?>