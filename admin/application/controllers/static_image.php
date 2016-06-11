<?php

class static_image extends Controller {

    private $dir = 'static_image';

    function __construct() {
        parent::Controller();
        common::is_logged();
        $this->load->model('mod_static_image');
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
            $gridObj->setGridOptions("Manage static_image", 880, 200, "id", "asc", $gridColumn, $gridColumnModel, site_url('?c=static_image&m=load_static_image&title=' . $_POST['title'] . '&status=' . $_POST['status']), true);
        } else {
            //read data from database
            $gridObj->setGridOptions("Manage static_image", 880, 200, "id", "asc", $gridColumn, $gridColumnModel, site_url('static_image/load_static_image'), true);
        }
        $data['grid_data'] = $gridObj->getGrid();


        $this->load->helper('text');
        $data['nav_array'] = array(
            array('title' => "Manage static_image", 'url' => 'static_image')
        );
        $data['msg'] = $this->session->flashdata('msg');
        $data['dir'] = $this->dir;
        $data['container'] = $this->container;
        $data['page'] = 'index';
        $data['title'] = "static_image";
        $this->load->view('main', $data);
    }

    function CellEdit() {
        $menu_id = $_REQUEST['id'] - ID_GENERATE;
        $value = $_REQUEST['menu_sort'];
        $this->db->query("update menu set menu_sort='$value' where menu_id='$menu_id'");
    }

    function load_static_image() {
        $this->mod_static_image->get_typeGrid();
    }

    function new_static_image() {
        if ($_POST['save']) {
            if ($this->form_validation->run('valid_static_image')) {
                if ($this->mod_static_image->add_static_image()) {
                    $this->session->set_flashdata('msg', 'static_image Added Successfully!!!');
                    redirect('static_image');
                }
            }
        }
        $data['editor'] = TRUE;
        $data['msg'] = $this->session->flashdata('msg');
        $data['dir'] = $this->dir;
        $data['container'] = $this->container;
        $data['action'] = 'static_image/new_static_image';
        $data['page'] = 'static_image_form';
        $data['page_title'] = "Add New static_image";
        $this->load->view('main', $data);
    }

    function edit_static_image($id='') {
        $data['static_image_data'] = sql::row("static_image", "id=$id");
        $image = $data['static_image_data']['image'];
        if ($_POST['save']) {
            if ($this->form_validation->run('valid_static_image')) {
                if ($this->mod_static_image->update_static_image($id, $image)) {
                    $this->session->set_flashdata('msg', 'static_image Updated Successfully!!!');
                    redirect('static_image');
                }
            }
        }
        $data['editor'] = TRUE;
        $data['title'] = 'Edit static_image';
        $data['dir'] = $this->dir;
        $data['page'] = 'static_image_form';
        $data['action'] = 'static_image/edit_static_image/' . $id;
        $this->load->view('main', $data);
    }

    function update_status($status='', $id) {

        if ($id == '') {
            redirect('static_image');
        }
        $this->db->query("update static_image set status='$status' where id='$id'");
        $this->session->set_flashdata('msg', "Content Status Update Successfully!");
        redirect("static_image");
    }

    function delete_static_image($id='') {
        if ($id == '') {
            redirect('static_image');
        }
        sql::delete('static_image', 'id=' . $id);
        $this->session->set_flashdata('msg', 'Successfully Deleted!!!');
        common::redirect();
    }

}

?>