<?php

class ad_image extends Controller {

    private $dir = 'ad_image';

    function __construct() {
        parent::Controller();
        common::is_logged();
        $this->load->model('mod_ad_image');
    }

    function index() {

        $this->load->library('grid');
        $gridObj = new grid();
        $gridColumn = array('Static Image Title', 'Static Image Image', 'Status'); //grid title
        //grid for show
        $gridColumnModel = array(
            array("name" => "title",
                "index" => "title",
                "width" => 25,
                "sortable" => true,
                "align" => "center",
                "editable" => false
            ),
            array("name" => "image",
                "index" => "image",
                "width" => 25,
                "sortable" => true,
                "align" => "center",
                "editable" => false
            ),
            array("name" => "status",
                "index" => "status",
                "width" => 25,
                "sortable" => true,
                "align" => "center",
                "editable" => false
            )
        );

        if ($_POST['search']) {
            $gridObj->setGridOptions("Manage ad_image", 880, 200, "id", "asc", $gridColumn, $gridColumnModel, site_url('?c=ad_image&m=load_ad_image&title=' . $_POST['title'] . '&status=' . $_POST['status']), true);
        } else {
            //read data from database
            $gridObj->setGridOptions("Manage ad_image", 880, 200, "id", "asc", $gridColumn, $gridColumnModel, site_url('ad_image/load_ad_image'), true);
        }
        $data['grid_data'] = $gridObj->getGrid();


        $this->load->helper('text');
        $data['nav_array'] = array(
            array('title' => "Manage ad_image", 'url' => 'ad_image')
        );
        $data['msg'] = $this->session->flashdata('msg');
        $data['dir'] = $this->dir;
        $data['container'] = $this->container;
        $data['page'] = 'index';
        $data['title'] = "ad_image";
        $this->load->view('main', $data);
    }

    function CellEdit() {
        $menu_id = $_REQUEST['id'] - ID_GENERATE;
        $value = $_REQUEST['menu_sort'];
        $this->db->query("update menu set menu_sort='$value' where menu_id='$menu_id'");
    }

    function load_ad_image() {
        $this->mod_ad_image->get_typeGrid();
    }

    function new_ad_image() {
        if ($_POST['save']) {
            if ($this->form_validation->run('valid_ad_image')) {
                if ($this->mod_ad_image->add_ad_image()) {
                    $this->session->set_flashdata('msg', 'ad_image Added Successfully!!!');
                    redirect('ad_image');
                }
            }
        }
        $data['editor'] = TRUE;
        $data['msg'] = $this->session->flashdata('msg');
        $data['dir'] = $this->dir;
        $data['container'] = $this->container;
        $data['action'] = 'ad_image/new_ad_image';
        $data['page'] = 'ad_image_form';
        $data['page_title'] = "Add New ad_image";
        $this->load->view('main', $data);
    }

    function edit_ad_image($id='') {
        $data['ad_image_data'] = sql::row("ad_image", "id=$id");
        $image = $data['ad_image_data']['image'];
        if ($_POST['save']) {
            if ($this->form_validation->run('valid_ad_image')) {
                if ($this->mod_ad_image->update_ad_image($id, $image)) {
                    $this->session->set_flashdata('msg', 'ad_image Updated Successfully!!!');
                    redirect('ad_image');
                }
            }
        }
        $data['editor'] = TRUE;
        $data['title'] = 'Edit ad_image';
        $data['dir'] = $this->dir;
        $data['page'] = 'ad_image_form';
        $data['action'] = 'ad_image/edit_ad_image/' . $id;
        $this->load->view('main', $data);
    }

    function update_status($status='', $id) {

        if ($id == '') {
            redirect('ad_image');
        }
        $this->db->query("update ad_image set status='$status' where id='$id'");
        $this->session->set_flashdata('msg', "Content Status Update Successfully!");
        redirect("ad_image");
    }

    function delete_ad_image($id='') {
        if ($id == '') {
            redirect('ad_image');
        }
        sql::delete('ad_image', 'id=' . $id);
        $this->session->set_flashdata('msg', 'Successfully Deleted!!!');
        common::redirect();
    }

}

?>