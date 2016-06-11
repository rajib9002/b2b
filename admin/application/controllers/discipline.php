<?php

class discipline extends Controller {

    private $dir = 'discipline';

    function __construct() {
        parent::__construct();
        common::is_logged();
        $this->load->model('discipline_model');
    }

    function index() {
        $data['nav_array'] = array(
            array('title' => 'Manage discipline', 'url' => '')
        );
        $this->load->library('grid');
        $gridObj = new grid();
        $gridColumn = array('Discipline Name','Status');
        $gridColumnModel = array(
            array("name" => "discipline_name",
                "index" => "discipline_name",
                "width" => 10,
                "sortable" => true,
                "align" => "left",
                "editable" => true
            ),
            
            
            array("name" => "discipline_status",
                "index" => "discipline_status",
                "width" => 5,
                "sortable" => true,
                "align" => "center",
                "editable" => true
            )
        );
        if ($_POST['search']) {
            $gridObj->setGridOptions("Manage discipline", 920, 300, "discipline_id", "desc", $gridColumn, $gridColumnModel, site_url('?c=discipline&m=load_discipline&discipline_name=' . $_POST['discipline_name']), true);
        } else {
            $gridObj->setGridOptions("Manage discipline", 920, 300, "discipline_id", "desc", $gridColumn, $gridColumnModel, site_url('discipline/load_discipline'), true);
        }
        $data['grid_data'] = $gridObj->getGrid();
        $data['msg'] = $this->session->flashdata('msg');
        $data['dir'] = $this->dir;
        $data['page'] = 'index';
        $data['page_title'] = 'Manage discipline';
        $this->load->view('main', $data);
    }

    function load_discipline() {
        $this->discipline_model->get_discipline_grid();
    }

    function new_discipline() {
        if ($_POST['save']) {
            if ($this->form_validation->run('valid_discipline')) {
                $this->discipline_model->save_discipline(); //Don't Change
                $this->session->set_flashdata('msg', 'Successfully Added!!!');
                redirect('discipline');
            }
        }
        $data['nav_array'] = array(
            array('title' => 'Manage discipline', 'url' => site_url('discipline')),
            array('title' => 'Add New discipline', 'url' => '')
        );

        $data['dir'] = $this->dir;
        $data['action'] = 'discipline/new_discipline';
        $data['page'] = 'discipline_form';
        $data['page_title'] = 'Add New discipline';
        $this->load->view('main', $data);
    }

    function is_valid_discipline() {
        if (sql::count("discipline", "discipline_name='{$_POST['discipline_name']}'") > 0 && $_POST['sess_value'] == '') {
            $this->form_validation->set_message('is_valid_discipline', "The Discipline Name is already Used! Try another.");
            return false;
        } else {
            return true;
        }
    }

    function edit_discipline($id = '') {
        $discipline_id = $id;
        if ($_POST['save']) {
            if ($this->form_validation->run('valid_discipline')) {
                $this->discipline_model->update_discipline($discipline_id); //Don't Change
                $this->session->set_flashdata('msg', 'Successfully Updated!!!');
                redirect('discipline');
            }
        }
        if (!is_numeric($discipline_id)) {
            redirect('discipline');
        }
        $data = sql::row('discipline', 'discipline_id=' . $discipline_id); //Don't Change
        $this->session->set_userdata('discipline_id', $data['discipline_id']); //Don't Change
        $data['nav_array'] = array(
            array('title' => 'Manage discipline', 'url' => site_url('discipline')),
            array('title' => 'Edit discipline', 'url' => '')
        );
        $data['dir'] = $this->dir;
        $data['action'] = 'discipline/edit_discipline/' . $id;
        $data['page'] = 'discipline_form';
        $data['page_title'] = 'Edit discipline';
        $this->load->view('main', $data);
    }

    function delete_discipline($id = '') {
        $discipline_id = $id;
        if ($discipline_id == '') {
            redirect('discipline');
        }
        $this->db->delete('discipline', array('discipline_id' => $discipline_id));
        $this->session->set_flashdata('msg', 'Successfully Deleted!!!');
        common::redirect();
    }

    function discipline_status($status = 1, $id = '') {
        $discipline_id = $id;
        if ($discipline_id == '') {
            redirect('discipline');
        }
        $data = array('discipline_status' => $status);
        $this->db->update('discipline', $data, array('discipline_id' => $discipline_id));
        $this->session->set_flashdata('msg', 'Status Updated!!!');
        redirect('discipline');
    }

    
        function get_discipline() {
        echo $this->discipline_model->get_discipline_options_ajax($_POST['country_id']);
    }

}

?>