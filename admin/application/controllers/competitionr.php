<?php

class competitionr extends Controller {

    private $dir = 'competitionr';

    function __construct() {
        parent::__construct();
        common::is_logged();
        $this->load->model('competitionr_model');
    }
   
    function index() {
        $data['nav_array'] = array(
            array('title' => 'Manage Competition', 'url' => '')
        );
        $this->load->library('grid');
        $gridObj = new grid();
        $gridColumn = array('Competition Name','Category Name','Discipline Name','Host body','Country','Image','Status');
        $gridColumnModel = array(
            array("name" => "competitionr_name",
                "index" => "competitionr_name",
                "width" => 10,
                "sortable" => true,
                "align" => "left",
                "editable" => true
            ), 
             array("name" => "category_id",
                "index" => "category_id",
                "width" => 10,
                "sortable" => true,
                "align" => "left",
                "editable" => true
            ), 
             array("name" => "discipline_name",
                "index" => "discipline_name",
                "width" => 10,
                "sortable" => true,
                "align" => "left",
                "editable" => true
            ),
            array("name" => "competitionr_host_club",
                "index" => "competitionr_host_club",
                "width" => 10,
                "sortable" => true,
                "align" => "left",
                "editable" => true
            ), 
            array("name" => "competitionr_country",
                "index" => "competitionr_country",
                "width" => 10,
                "sortable" => true,
                "align" => "left",
                "editable" => true
            ), 
            array("name" => "competitionr_image",
                "index" => "competitionr_image",
                "width" => 10,
                "sortable" => true,
                "align" => "left",
                "editable" => true
            ), 
           
            array("name" => "competitionr_status",
                "index" => "competitionr_status",
                "width" => 5,
                "sortable" => true,
                "align" => "center",
                "editable" => true
            )
        );
        if ($_POST['search']) {
            $gridObj->setGridOptions("Manage Competition", 880, 300, "competitionr_id", "desc", $gridColumn, $gridColumnModel, site_url('?c=competitionr&m=load_competitionr&competitionr_name=' . $_POST['competitionr_name']), true);
        } else {
            $gridObj->setGridOptions("Manage Competition", 880, 300, "competitionr_id", "desc", $gridColumn, $gridColumnModel, site_url('competitionr/load_competitionr'), true);
        }
        $data['grid_data'] = $gridObj->getGrid();
        $data['msg'] = $this->session->flashdata('msg');
        $data['dir'] = $this->dir;
        $data['page'] = 'index';
        $data['page_title'] = 'Manage Competition';
        $this->load->view('main', $data);
    }

    function load_competitionr() {
        $this->competitionr_model->get_competitionr_grid();
    }

    function new_competitionr() {
        if ($_POST['save']) {
            if ($this->form_validation->run('valid_competitionr')) {
                $this->competitionr_model->save_competitionr(); //Don't Change
                $this->session->set_flashdata('msg', 'Successfully Added!!!');
                redirect('competitionr');
            }
        }
        $data['nav_array'] = array(
            array('title' => 'Manage Competition', 'url' => site_url('competitionr')),
            array('title' => 'Add New Competition', 'url' => '')
        );

        $data['dir'] = $this->dir;
        $data['action'] = 'competitionr/new_competitionr';
        $data['page'] = 'competitionr_form';
        $data['page_title'] = 'Add New competitionr';
        $this->load->view('main', $data);
    }

    function edit_competitionr($id = '') {
        $competitionr_id = $id;
        if ($_POST['save']) {
            if ($this->form_validation->run('valid_competitionr')) {
                $this->competitionr_model->update_competitionr($competitionr_id); //Don't Change
                $this->session->set_flashdata('msg', 'Successfully Updated!!!');
                redirect('competitionr');
            }
        }
        if (!is_numeric($competitionr_id)) {
            redirect('competitionr');
        }
        $data = sql::row('competitionr', 'competitionr_id=' . $competitionr_id); //Don't Change
        $this->session->set_userdata('competitionr_id', $data['competitionr_id']); //Don't Change
        $data['nav_array'] = array(
            array('title' => 'Manage Competition', 'url' => site_url('competitionr')),
            array('title' => 'Edit Competition', 'url' => '')
        );
        $data['dir'] = $this->dir;
        $data['action'] = 'competitionr/edit_competitionr/' . $id;
        $data['page'] = 'competitionr_form';
        $data['page_title'] = 'Edit Competition';
        $this->load->view('main', $data);
    }

    function delete_competitionr($id = '') {
        $competitionr_id = $id;
        if ($competitionr_id == '') {
            redirect('competitionr');
        }       
        $this->db->delete('competitionr', array('competitionr_id' => $competitionr_id));
        $this->session->set_flashdata('msg', 'Successfully Deleted!!!');
        common::redirect();
    }

    function competitionr_status($status = 1, $id = '') {
        $competitionr_id = $id;
        if ($competitionr_id == '') {
            redirect('competitionr');
        }
        $data = array('competitionr_status' => $status);
        $this->db->update('competitionr', $data, array('competitionr_id' => $competitionr_id));
        $this->session->set_flashdata('msg', 'Status Updated!!!');
        redirect('competitionr');
    }

}

?>