<?php

class rider extends Controller {

    private $dir = 'rider';

    function __construct() {
        parent::__construct();
        common::is_logged();
        $this->load->model('rider_model');
    }

    function index() {
        $data['nav_array'] = array(
            array('title' => 'Manage Rider details', 'url' => '')
        );
        $this->load->library('grid');
        $gridObj = new grid();
        $gridColumn = array('Rider No', 'Rider First Name', 'Rider Last Name', 'Country', 'Class', 'Competition Name', 'Status');
        $gridColumnModel = array(
            array("name" => "rider_number",
                "index" => "rider_number",
                "width" => 10,
                "sortable" => true,
                "align" => "left",
                "editable" => true
            ),
            array("name" => "rider_first_name",
                "index" => "rider_first_name",
                "width" => 10,
                "sortable" => true,
                "align" => "left",
                "editable" => true
            ),
            array("name" => "rider_last_name",
                "index" => "rider_last_name",
                "width" => 10,
                "sortable" => true,
                "align" => "left",
                "editable" => true
            ),
            array("name" => "country_name",
                "index" => "country_name",
                "width" => 10,
                "sortable" => true,
                "align" => "left",
                "editable" => true
            ),
            array("name" => "class_name",
                "index" => "class_name",
                "width" => 10,
                "sortable" => true,
                "align" => "left",
                "editable" => true
            ),
            array("name" => "competitionr_name",
                "index" => "competitionr_name",
                "width" => 10,
                "sortable" => true,
                "align" => "left",
                "editable" => true
            ),
            array("name" => "rider_status",
                "index" => "rider_status",
                "width" => 5,
                "sortable" => true,
                "align" => "center",
                "editable" => true
            )
        );
        if ($_POST['search']) {
            $gridObj->setGridOptions("Manage Rider details", 880, 300, "rider_id", "desc", $gridColumn, $gridColumnModel, site_url('?c=rider&m=load_rider&rider_name=' . $_POST['rider_name']), true);
        } else {
            $gridObj->setGridOptions("Manage Rider details", 880, 300, "rider_id", "desc", $gridColumn, $gridColumnModel, site_url('rider/load_rider'), true);
        }
        $data['grid_data'] = $gridObj->getGrid();
        $data['msg'] = $this->session->flashdata('msg');
        $data['dir'] = $this->dir;
        $data['page'] = 'index';
        $data['page_title'] = 'Manage Rider details';
        $this->load->view('main', $data);
    }

    function load_rider() {
        $this->rider_model->get_rider_grid();
    }

    function new_rider() {
        if ($_POST['save']) {
            if ($this->form_validation->run('valid_rider')) {
                $this->rider_model->save_rider(); //Don't Change
                $this->session->set_flashdata('msg', 'Successfully Added!!!');
                redirect('rider');
            }
        }
        $data['nav_array'] = array(
            array('title' => 'Manage Rider details', 'url' => site_url('rider')),
            array('title' => 'Add New Rider details', 'url' => '')
        );

        $data['dir'] = $this->dir;
        $data['action'] = 'rider/new_rider';
        $data['page'] = 'rider_form';
        $data['page_title'] = 'Add New rider';
        $this->load->view('main', $data);
    }

    function edit_rider($id = '') {
        $rider_id = $id;
        if ($_POST['save']) {
            if ($this->form_validation->run('valid_rider')) {
                $this->rider_model->update_rider($rider_id); //Don't Change
                $this->session->set_flashdata('msg', 'Successfully Updated!!!');
                redirect('rider');
            }
        }
        if (!is_numeric($rider_id)) {
            redirect('rider');
        }
        $data = sql::row('rider', 'rider_id=' . $rider_id); //Don't Change
        $this->session->set_userdata('rider_id', $data['rider_id']); //Don't Change
        $data['nav_array'] = array(
            array('title' => 'Manage Rider details', 'url' => site_url('rider')),
            array('title' => 'Edit Rider details', 'url' => '')
        );
        $data['dir'] = $this->dir;
        $data['action'] = 'rider/edit_rider/' . $id;
        $data['page'] = 'rider_form';
        $data['page_title'] = 'Edit Rider details';
        $this->load->view('main', $data);
    }

    function delete_rider($id = '') {
        $rider_id = $id;
        if ($rider_id == '') {
            redirect('rider');
        }
        $this->db->delete('rider', array('rider_id' => $rider_id));
        $this->session->set_flashdata('msg', 'Successfully Deleted!!!');
        common::redirect();
    }

    function rider_status($status = 1, $id = '') {
        $rider_id = $id;
        if ($rider_id == '') {
            redirect('rider');
        }
        $data = array('rider_status' => $status);
        $this->db->update('rider', $data, array('rider_id' => $rider_id));
        $this->session->set_flashdata('msg', 'Status Updated!!!');
        redirect('rider');
    }

}

?>