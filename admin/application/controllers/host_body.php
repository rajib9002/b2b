<?php

class host_body extends Controller {

    private $dir = 'host_body';

    function __construct() {
        parent::__construct();
        common::is_logged();
        $this->load->model('host_body_model');
    }

    function index() {
        $data['nav_array'] = array(
            array('title' => 'Manage Host Body', 'url' => '')
        );
        $this->load->library('grid');
        $gridObj = new grid();
        $gridColumn = array('Host Body Name','Country Name','Status');
        $gridColumnModel = array(
            array("name" => "host_body_name",
                "index" => "host_body_name",
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
            array("name" => "host_body_status",
                "index" => "host_body_status",
                "width" => 5,
                "sortable" => true,
                "align" => "center",
                "editable" => true
            )
        );
        if ($_POST['search']) {
            $gridObj->setGridOptions("Manage Host Body", 920, 300, "host_body_id", "desc", $gridColumn, $gridColumnModel, site_url('?c=host_body&m=load_host_body&host_body_name=' . $_POST['host_body_name']), true);
        } else {
            $gridObj->setGridOptions("Manage Host Body", 920, 300, "host_body_id", "desc", $gridColumn, $gridColumnModel, site_url('host_body/load_host_body'), true);
        }
        $data['grid_data'] = $gridObj->getGrid();
        $data['msg'] = $this->session->flashdata('msg');
        $data['dir'] = $this->dir;
        $data['page'] = 'index';
        $data['page_title'] = 'Manage Host Body';
        $this->load->view('main', $data);
    }

    function load_host_body() {
        $this->host_body_model->get_host_body_grid();
    }

    function new_host_body() {
        if ($_POST['save']) {
            if ($this->form_validation->run('valid_host_body')) {
                $this->host_body_model->save_host_body(); //Don't Change
                $this->session->set_flashdata('msg', 'Successfully Added!!!');
                redirect('host_body');
            }
        }
        $data['nav_array'] = array(
            array('title' => 'Manage Host Body', 'url' => site_url('host_body')),
            array('title' => 'Add New Host Body', 'url' => '')
        );

        $data['dir'] = $this->dir;
        $data['action'] = 'host_body/new_host_body';
        $data['page'] = 'host_body_form';
        $data['page_title'] = 'Add New Host Body';
        $this->load->view('main', $data);
    }

    function is_valid_host_body() {
        if (sql::count("host_body", "host_body_name='{$_POST['host_body_name']}'") > 0 && $_POST['sess_value'] == '') {
            $this->form_validation->set_message('is_valid_host_body', "The Host Body Name is already Used! Try another.");
            return false;
        } else {
            return true;
        }
    }

    function edit_host_body($id = '') {
        $host_body_id = $id;
        if ($_POST['save']) {
            if ($this->form_validation->run('valid_host_body')) {
                $this->host_body_model->update_host_body($host_body_id); //Don't Change
                $this->session->set_flashdata('msg', 'Successfully Updated!!!');
                redirect('host_body');
            }
        }
        if (!is_numeric($host_body_id)) {
            redirect('host_body');
        }
        $data = sql::row('host_body', 'host_body_id=' . $host_body_id); //Don't Change
        $this->session->set_userdata('host_body_id', $data['host_body_id']); //Don't Change
        $data['nav_array'] = array(
            array('title' => 'Manage Host Body', 'url' => site_url('host_body')),
            array('title' => 'Edit Host Body', 'url' => '')
        );
        $data['dir'] = $this->dir;
        $data['action'] = 'host_body/edit_host_body/' . $id;
        $data['page'] = 'host_body_form';
        $data['page_title'] = 'Edit Host Body';
        $this->load->view('main', $data);
    }

    function delete_host_body($id = '') {
        $host_body_id = $id;
        if ($host_body_id == '') {
            redirect('host_body');
        }
        $this->db->delete('host_body', array('host_body_id' => $host_body_id));
        $this->session->set_flashdata('msg', 'Successfully Deleted!!!');
        common::redirect();
    }

    function host_body_status($status = 1, $id = '') {
        $host_body_id = $id;
        if ($host_body_id == '') {
            redirect('host_body');
        }
        $data = array('host_body_status' => $status);
        $this->db->update('host_body', $data, array('host_body_id' => $host_body_id));
        $this->session->set_flashdata('msg', 'Status Updated!!!');
        redirect('host_body');
    }

    
        function get_host_body() {
        echo $this->host_body_model->get_host_body_options_ajax($_POST['country_id']);
    }

}

?>