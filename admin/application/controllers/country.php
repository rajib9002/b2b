<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of country
 *
 * @author Anwar
 */
class country extends Controller {

    private $dir = 'country';

    function __construct() {
        parent::__construct();
        common::is_logged();
        $this->load->model('country_model');
    }
   
    function index() {
        $data['nav_array'] = array(
            array('title' => 'Manage Country', 'url' => '')
        );
        $this->load->library('grid');
        $gridObj = new grid();
        $gridColumn = array('Country Name','Currency','Amount','Flag', 'Status');
        $gridColumnModel = array(
            array("name" => "country_name",
                "index" => "country_name",
                "width" => 10,
                "sortable" => true,
                "align" => "left",
                "editable" => true
            ),
        array("name" => "currency",
                "index" => "currency",
                "width" => 10,
                "sortable" => true,
                "align" => "left",
                "editable" => true
            ),
        array("name" => "amount",
                "index" => "amount",
                "width" => 10,
                "sortable" => true,
                "align" => "left",
                "editable" => true
            ),
            array("name" => "image",
                "index" => "image",
                "width" => 10,
                "sortable" => true,
                "align" => "left",
                "editable" => true
            ), 
            array("name" => "country_status",
                "index" => "country_status",
                "width" => 5,
                "sortable" => true,
                "align" => "center",
                "editable" => true
            )
        );
        if ($_POST['search']) {
            $gridObj->setGridOptions("Manage Country", 880, 300, "country_id", "desc", $gridColumn, $gridColumnModel, site_url('?c=country&m=load_country&country_name=' . $_POST['country_name']), true);
        } else {
            $gridObj->setGridOptions("Manage Country", 880, 300, "country_id", "desc", $gridColumn, $gridColumnModel, site_url('country/load_country'), true);
        }
        $data['grid_data'] = $gridObj->getGrid();
        $data['msg'] = $this->session->flashdata('msg');
        $data['dir'] = $this->dir;
        $data['page'] = 'index';
        $data['page_title'] = 'Manage Country';
        $this->load->view('main', $data);
    }

    function load_country() {
        $this->country_model->get_country_grid();
    }

    function new_country() {
        if ($_POST['save']) {
            if ($this->form_validation->run('valid_country')) {
                $this->country_model->save_country(); //Don't Change
                $this->session->set_flashdata('msg', 'Successfully Added!!!');
                redirect('country');
            }
        }
        $data['nav_array'] = array(
            array('title' => 'Manage Country', 'url' => site_url('country')),
            array('title' => 'Add New Country', 'url' => '')
        );

        $data['dir'] = $this->dir;
        $data['action'] = 'country/new_country';
        $data['page'] = 'country_form';
        $data['page_title'] = 'Add New country';
        $this->load->view('main', $data);
    }

    function is_valid_country() {
        if (sql::count("country", "country_name='{$_POST['country_name']}'") > 0 && $_POST['sess_value'] == '') {
            $this->form_validation->set_message('is_valid_country', "The country Name is already Used! Try another.");
            return false;
        } else {
            return true;
        }
    }

    function edit_country($id = '') {
        $country_id = $id;
        if ($_POST['save']) {
            if ($this->form_validation->run('valid_country')) {
                $this->country_model->update_country($country_id); //Don't Change
                $this->session->set_flashdata('msg', 'Successfully Updated!!!');
                redirect('country');
            }
        }
        if (!is_numeric($country_id)) {
            redirect('country');
        }
        $data = sql::row('country', 'country_id=' . $country_id); //Don't Change
        $this->session->set_userdata('country_id', $data['country_id']); //Don't Change
        $data['nav_array'] = array(
            array('title' => 'Manage Country', 'url' => site_url('country')),
            array('title' => 'Edit Country', 'url' => '')
        );
        $data['dir'] = $this->dir;
        $data['action'] = 'country/edit_country/' . $id;
        $data['page'] = 'country_form';
        $data['page_title'] = 'Edit Country';
        $this->load->view('main', $data);
    }

    function delete_country($id = '') {
        $country_id = $id;
        if ($country_id == '') {
            redirect('country');
        }       
        $this->db->delete('country', array('country_id' => $country_id));
        $this->session->set_flashdata('msg', 'Successfully Deleted!!!');
        common::redirect();
    }

    function country_status($status = 1, $id = '') {
        $country_id = $id;
        if ($country_id == '') {
            redirect('country');
        }
        $data = array('country_status' => $status);
        $this->db->update('country', $data, array('country_id' => $country_id));
        $this->session->set_flashdata('msg', 'Status Updated!!!');
        redirect('country');
    }

}

?>