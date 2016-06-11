<?php

class competitionr_details extends Controller {

    private $dir = 'competitionr_details';

    function __construct() {
        parent::__construct();
        common::is_logged();
        $this->load->model('competitionr_details_model');
    }
   
    function index() {
        $data['nav_array'] = array(
            array('title' => 'Manage Competition details', 'url' => '')
        );
        $this->load->library('grid');
        $gridObj = new grid();
        $gridColumn = array('Competition Name','Round','Host Club','Date','Year','Status');
        $gridColumnModel = array(
            array("name" => "competitionr_name",
                "index" => "competitionr_name",
                "width" => 10,
                "sortable" => true,
                "align" => "left",
                "editable" => true
            ),  
             array("name" => "competitionr_details_round",
                "index" => "competitionr_details_round",
                "width" => 10,
                "sortable" => true,
                "align" => "left",
                "editable" => true
            ),
            array("name" => "competitionr_details_host_club",
                "index" => "competitionr_details_host_club",
                "width" => 10,
                "sortable" => true,
                "align" => "left",
                "editable" => true
            ), 
           
            array("name" => "competitionr_details_date",
                "index" => "competitionr_details_date",
                "width" => 10,
                "sortable" => true,
                "align" => "left",
                "editable" => true
            ), 
             array("name" => "competitionr_details_date",
                "index" => "competitionr_details_date",
                "width" => 10,
                "sortable" => true,
                "align" => "left",
                "editable" => true
            ), 
            array("name" => "competitionr_details_status",
                "index" => "competitionr_details_status",
                "width" => 5,
                "sortable" => true,
                "align" => "center",
                "editable" => true
            )
        );
        if ($_POST['search']) {
            $gridObj->setGridOptions("Manage Competition details", 880, 300, "competitionr_details_id", "desc", $gridColumn, $gridColumnModel, site_url('?c=competitionr_details&m=load_competitionr_details&competitionr_details_name=' . $_POST['competitionr_details_name']), true);
        } else {
            $gridObj->setGridOptions("Manage Competition details", 880, 300, "competitionr_details_id", "desc", $gridColumn, $gridColumnModel, site_url('competitionr_details/load_competitionr_details'), true);
        }
        $data['grid_data'] = $gridObj->getGrid();
        $data['msg'] = $this->session->flashdata('msg');
        $data['dir'] = $this->dir;
        $data['page'] = 'index';
        $data['page_title'] = 'Manage Competition details';
        $this->load->view('main', $data);
    }

    function load_competitionr_details() {
        $this->competitionr_details_model->get_competitionr_details_grid();
    }

    function new_competitionr_details() {
        if ($_POST['save']) {
            if ($this->form_validation->run('valid_competitionr_details')) {                
                $this->competitionr_details_model->save_competitionr_details(); //Don't Change
                $this->session->set_flashdata('msg', 'Successfully Added!!!');
                redirect('competitionr_details');
            }
        }
        $data['nav_array'] = array(
            array('title' => 'Manage Competition details', 'url' => site_url('competitionr_details')),
            array('title' => 'Add New Competition details', 'url' => '')
        );

        $data['dir'] = $this->dir;
        $data['action'] = 'competitionr_details/new_competitionr_details';
        $data['page'] = 'competitionr_details_form';
        $data['page_title'] = 'Add New competitionr_details';
        $this->load->view('main', $data);
    }

    function edit_competitionr_details($id = '') {
        $competitionr_details_id = $id;
        if ($_POST['save']) {
            if ($this->form_validation->run('valid_competitionr_details')) {
                $this->competitionr_details_model->update_competitionr_details($competitionr_details_id); //Don't Change
                $this->session->set_flashdata('msg', 'Successfully Updated!!!');
                redirect('competitionr_details');
            }
        }
        if (!is_numeric($competitionr_details_id)) {
            redirect('competitionr_details');
        }
        $data = sql::row('competitionr_details', 'competitionr_details_id=' . $competitionr_details_id); //Don't Change
        $this->session->set_userdata('competitionr_details_id', $data['competitionr_details_id']); //Don't Change
        $data['nav_array'] = array(
            array('title' => 'Manage Competition details', 'url' => site_url('competitionr_details')),
            array('title' => 'Edit Competition details', 'url' => '')
        );
        $data['dir'] = $this->dir;
        $data['action'] = 'competitionr_details/edit_competitionr_details/' . $id;
        $data['page'] = 'competitionr_details_form';
        $data['page_title'] = 'Edit Competition details';
        $this->load->view('main', $data);
    }

    function delete_competitionr_details($id = '') {
        $competitionr_details_id = $id;
        if ($competitionr_details_id == '') {
            redirect('competitionr_details');
        }       
        $this->db->delete('competitionr_details', array('competitionr_details_id' => $competitionr_details_id));
        $this->session->set_flashdata('msg', 'Successfully Deleted!!!');
        redirect('competitionr_details');
    }

    function competitionr_details_status($status = 1, $id = '') {
        $competitionr_details_id = $id;
        if ($competitionr_details_id == '') {
            redirect('competitionr_details');
        }
        $data = array('competitionr_details_status' => $status);
        $this->db->update('competitionr_details', $data, array('competitionr_details_id' => $competitionr_details_id));
        $this->session->set_flashdata('msg', 'Status Updated!!!');
        redirect('competitionr_details');
    }
    
    function get_competition() {
        echo $this->competitionr_details_model->get_competition_options($_POST['country_id']);
    }
    function get_year() {
        echo $this->competitionr_details_model->get_year_options($_POST['country_id']);
    }

}

?>