<?php

class area extends Controller {

    private $dir = 'area';

    function __construct() {
        parent::__construct();
        common::is_logged();
        $this->load->model('area_model');
    }

    function index() {
        $data['nav_array'] = array(
            array('title' => 'Manage Area', 'url' => '')
        );
        $this->load->library('grid');
        $gridObj = new grid();
        $gridColumn = array('Area Name', 'Country Name', 'Status');
        $gridColumnModel = array(
            array("name" => "area_name",
                "index" => "area_name",
                "width" => 10,
                "sortable" => true,
                "align" => "left",
                "editable" => true
            ),
            array("name" => "",
                "index" => "",
                "width" => 10,
                "sortable" => true,
                "align" => "left",
                "editable" => true
            ),
            array("name" => "area_status",
                "index" => "area_status",
                "width" => 5,
                "sortable" => true,
                "align" => "center",
                "editable" => true
            )
        );
        if ($_POST['search']) {
            $gridObj->setGridOptions("Manage Area", 880, 300, "area_id", "desc", $gridColumn, $gridColumnModel, site_url('?c=area&m=load_area&area_name=' . $_POST['area_name']), true);
        } else {
            $gridObj->setGridOptions("Manage Area", 880, 300, "area_id", "desc", $gridColumn, $gridColumnModel, site_url('area/load_area'), true);
        }
        $data['grid_data'] = $gridObj->getGrid();
        $data['msg'] = $this->session->flashdata('msg');
        $data['dir'] = $this->dir;
        $data['page'] = 'index';
        $data['page_title'] = 'Manage Area';
        $this->load->view('main', $data);
    }

    function load_area() {
        $this->area_model->get_area_grid();
    }

    function new_area() {
        if ($_POST['save']) {
            if ($this->form_validation->run('valid_area')) {
                $this->area_model->save_area(); //Don't Change
                $this->session->set_flashdata('msg', 'Successfully Added!!!');
                redirect('area');
            }
        }
        $data['nav_array'] = array(
            array('title' => 'Manage Area', 'url' => site_url('area')),
            array('title' => 'Add New Area', 'url' => '')
        );

        $data['dir'] = $this->dir;
        $data['action'] = 'area/new_area';
        $data['page'] = 'area_form';
        $data['page_title'] = 'Add New area';
        $this->load->view('main', $data);
    }

    function is_valid_area() {
        if (sql::count("area", "area_name='{$_POST['area_name']}'") > 0 && $_POST['sess_value'] == '') {
            $this->form_validation->set_message('is_valid_area', "The Area Name is already Used! Try another.");
            return false;
        } else {
            return true;
        }
    }

    function edit_area($id = '') {
        $area_id = $id;
        if ($_POST['save']) {
            if ($this->form_validation->run('valid_area')) {
                $this->area_model->update_area($area_id); //Don't Change
                $this->session->set_flashdata('msg', 'Successfully Updated!!!');
                redirect('area');
            }
        }
        if (!is_numeric($area_id)) {
            redirect('area');
        }
        $data = sql::row('area', 'area_id=' . $area_id); //Don't Change
        $this->session->set_userdata('area_id', $data['area_id']); //Don't Change
        $data['nav_array'] = array(
            array('title' => 'Manage Area', 'url' => site_url('area')),
            array('title' => 'Edit Area', 'url' => '')
        );
        $data['dir'] = $this->dir;
        $data['action'] = 'area/edit_area/' . $id;
        $data['page'] = 'area_form';
        $data['page_title'] = 'Edit Area';
        $this->load->view('main', $data);
    }

    function delete_area($id = '') {
        $area_id = $id;
        if ($area_id == '') {
            redirect('area');
        }
        $this->db->delete('area', array('area_id' => $area_id));
        $this->session->set_flashdata('msg', 'Successfully Deleted!!!');
        common::redirect();
    }

    function area_status($status = 1, $id = '') {
        $area_id = $id;
        if ($area_id == '') {
            redirect('area');
        }
        $data = array('area_status' => $status);
        $this->db->update('area', $data, array('area_id' => $area_id));
        $this->session->set_flashdata('msg', 'Status Updated!!!');
        redirect('area');
    }


}

?>