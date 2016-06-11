<?php

class rider_class extends Controller {

    private $dir = 'rider_class';

    function __construct() {
        parent::__construct();
        common::is_logged();
        $this->load->model('rider_class_model');
    }
   
    function index() {
        $data['nav_array'] = array(
            array('title' => 'Manage Rider Class', 'url' => '')
        );
        $this->load->library('grid');
        $gridObj = new grid();
        $gridColumn = array('Rider Class Name', 'Status');
        $gridColumnModel = array(
            array("name" => "rider_class_name",
                "index" => "rider_class_name",
                "width" => 10,
                "sortable" => true,
                "align" => "left",
                "editable" => true
            ),           
            array("name" => "rider_class_status",
                "index" => "rider_class_status",
                "width" => 5,
                "sortable" => true,
                "align" => "center",
                "editable" => true
            )
        );
        if ($_POST['search']) {
            $gridObj->setGridOptions("Manage Rider Class", 880, 300, "rider_class_id", "desc", $gridColumn, $gridColumnModel, site_url('?c=rider_class&m=load_rider_class&rider_class_name=' . $_POST['rider_class_name']), true);
        } else {
            $gridObj->setGridOptions("Manage Rider Class", 880, 300, "rider_class_id", "desc", $gridColumn, $gridColumnModel, site_url('rider_class/load_rider_class'), true);
        }
        $data['grid_data'] = $gridObj->getGrid();
        $data['msg'] = $this->session->flashdata('msg');
        $data['dir'] = $this->dir;
        $data['page'] = 'index';
        $data['page_title'] = 'Manage Rider Class';
        $this->load->view('main', $data);
    }

    function load_rider_class() {
        $this->rider_class_model->get_rider_class_grid();
    }

    function new_rider_class() {
        if ($_POST['save']) {
            if ($this->form_validation->run('valid_rider_class')) {
                $this->rider_class_model->save_rider_class(); //Don't Change
                $this->session->set_flashdata('msg', 'Successfully Added!!!');
                redirect('rider_class');
            }
        }
        $data['nav_array'] = array(
            array('title' => 'Manage Rider Class', 'url' => site_url('rider_class')),
            array('title' => 'Add New Rider Class', 'url' => '')
        );

        $data['dir'] = $this->dir;
        $data['action'] = 'rider_class/new_rider_class';
        $data['page'] = 'rider_class_form';
        $data['page_title'] = 'Add New rider_class';
        $this->load->view('main', $data);
    }

    function is_valid_rider_class() {
        if (sql::count("rider_class", "rider_class_name='{$_POST['rider_class_name']}'") > 0 && $_POST['sess_value'] == '') {
            $this->form_validation->set_message('is_valid_rider_class', "The rider_class Name is already Used! Try another.");
            return false;
        } else {
            return true;
        }
    }

    function edit_rider_class($id = '') {
        $rider_class_id = $id;
        if ($_POST['save']) {
            if ($this->form_validation->run('valid_rider_class')) {
                $this->rider_class_model->update_rider_class($rider_class_id); //Don't Change
                $this->session->set_flashdata('msg', 'Successfully Updated!!!');
                redirect('rider_class');
            }
        }
        if (!is_numeric($rider_class_id)) {
            redirect('rider_class');
        }
        $data = sql::row('rider_class', 'rider_class_id=' . $rider_class_id); //Don't Change
        $this->session->set_userdata('rider_class_id', $data['rider_class_id']); //Don't Change
        $data['nav_array'] = array(
            array('title' => 'Manage Rider Class', 'url' => site_url('rider_class')),
            array('title' => 'Edit Rider Class', 'url' => '')
        );
        $data['dir'] = $this->dir;
        $data['action'] = 'rider_class/edit_rider_class/' . $id;
        $data['page'] = 'rider_class_form';
        $data['page_title'] = 'Edit Rider Class';
        $this->load->view('main', $data);
    }

    function delete_rider_class($id = '') {
        $rider_class_id = $id;
        if ($rider_class_id == '') {
            redirect('rider_class');
        }       
        $this->db->delete('rider_class', array('rider_class_id' => $rider_class_id));
        $this->session->set_flashdata('msg', 'Successfully Deleted!!!');
        common::redirect();
    }

    function rider_class_status($status = 1, $id = '') {
        $rider_class_id = $id;
        if ($rider_class_id == '') {
            redirect('rider_class');
        }
        $data = array('rider_class_status' => $status);
        $this->db->update('rider_class', $data, array('rider_class_id' => $rider_class_id));
        $this->session->set_flashdata('msg', 'Status Updated!!!');
        redirect('rider_class');
    }

}

?>