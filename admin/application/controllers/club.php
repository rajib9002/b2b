<?php

class club extends Controller {

    private $dir = 'club';

    function __construct() {
        parent::__construct();
        common::is_logged();
        $this->load->model('club_model');
    }

    function index() {
        $data['nav_array'] = array(
            array('title' => 'Manage club', 'url' => '')
        );
        $this->load->library('grid');
        $gridObj = new grid();
        $gridColumn = array('Club Name','Club Short Name','Country Name','Status');
        $gridColumnModel = array(
            array("name" => "club_name",
                "index" => "club_name",
                "width" => 10,
                "sortable" => true,
                "align" => "left",
                "editable" => true
            ),
            array("name" => "club_short_name",
                "index" => "club_short_name",
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
            array("name" => "club_status",
                "index" => "club_status",
                "width" => 5,
                "sortable" => true,
                "align" => "center",
                "editable" => true
            )
        );
        if ($_POST['search']) {
            $gridObj->setGridOptions("Manage club", 920, 300, "club_id", "desc", $gridColumn, $gridColumnModel, site_url('?c=club&m=load_club&club_name=' . $_POST['club_name']), true);
        } else {
            $gridObj->setGridOptions("Manage club", 920, 300, "club_id", "desc", $gridColumn, $gridColumnModel, site_url('club/load_club'), true);
        }
        $data['grid_data'] = $gridObj->getGrid();
        $data['msg'] = $this->session->flashdata('msg');
        $data['dir'] = $this->dir;
        $data['page'] = 'index';
        $data['page_title'] = 'Manage club';
        $this->load->view('main', $data);
    }

    function load_club() {
        $this->club_model->get_club_grid();
    }

    function new_club() {
        if ($_POST['save']) {
            if ($this->form_validation->run('valid_club')) {
                $this->club_model->save_club(); //Don't Change
                $this->session->set_flashdata('msg', 'Successfully Added!!!');
                redirect('club');
            }
        }
        $data['nav_array'] = array(
            array('title' => 'Manage club', 'url' => site_url('club')),
            array('title' => 'Add New club', 'url' => '')
        );

        $data['dir'] = $this->dir;
        $data['action'] = 'club/new_club';
        $data['page'] = 'club_form';
        $data['page_title'] = 'Add New club';
        $this->load->view('main', $data);
    }

    function is_valid_club() {
        if (sql::count("club", "club_name='{$_POST['club_name']}'") > 0 && $_POST['sess_value'] == '') {
            $this->form_validation->set_message('is_valid_club', "The club Name is already Used! Try another.");
            return false;
        } else {
            return true;
        }
    }

    function edit_club($id = '') {
        $club_id = $id;
        if ($_POST['save']) {
            if ($this->form_validation->run('valid_club')) {
                $this->club_model->update_club($club_id); //Don't Change
                $this->session->set_flashdata('msg', 'Successfully Updated!!!');
                redirect('club');
            }
        }
        if (!is_numeric($club_id)) {
            redirect('club');
        }
        $data = sql::row('club', 'club_id=' . $club_id); //Don't Change
        $this->session->set_userdata('club_id', $data['club_id']); //Don't Change
        $data['nav_array'] = array(
            array('title' => 'Manage club', 'url' => site_url('club')),
            array('title' => 'Edit club', 'url' => '')
        );
        $data['dir'] = $this->dir;
        $data['action'] = 'club/edit_club/' . $id;
        $data['page'] = 'club_form';
        $data['page_title'] = 'Edit club';
        $this->load->view('main', $data);
    }

    function delete_club($id = '') {
        $club_id = $id;
        if ($club_id == '') {
            redirect('club');
        }
        $this->db->delete('club', array('club_id' => $club_id));
        $this->session->set_flashdata('msg', 'Successfully Deleted!!!');
        redirect('club');
    }

    function club_status($status = 1, $id = '') {
        $club_id = $id;
        if ($club_id == '') {
            redirect('club');
        }
        $data = array('club_status' => $status);
        $this->db->update('club', $data, array('club_id' => $club_id));
        $this->session->set_flashdata('msg', 'Status Updated!!!');
        redirect('club');
    }

    
        function get_club() {
        echo $this->club_model->get_club_options_ajax($_POST['country_id']);
    }

}

?>