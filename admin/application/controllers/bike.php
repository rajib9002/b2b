<?php

class bike extends Controller {

    private $dir = 'bike';

    function __construct() {
        parent::__construct();
        common::is_logged();
        $this->load->model('bike_model');
    }

      function bike_main_type() {
        $this->load->library('grid');
        $gridObj = new grid();
        $gridColumn = array('Type Name','Image', 'Status');
        $gridColumnModel = array(
            array("name" => "",
                "index" => "",
                "width" => 100,
                "sortable" => FALSE,
                "align" => "left",
                "editable" => FALSE
            ),
            array("name" => "",
                "index" => "",
                "width" => 100,
                "sortable" => FALSE,
                "align" => "center",
                "editable" => FALSE
            ),
            array("name" => "",
                "index" => "",
                "width" => 50,
                "sortable" => true,
                "align" => "center",
                "editable" => true
            )
        );
        if ($_POST['search']) {
           $gridObj->setGridOptions("Manage  Bike Main Type", 880, 300, "main_type_id", "desc", $gridColumn, $gridColumnModel, site_url('?c=bike&m=load_bike_main_type&type_name=' . $_POST['type_name']), true);
        } else {
            $gridObj->setGridOptions("Manage Bike Main Type", 880, 300, "main_type_id", "asc", $gridColumn, $gridColumnModel, site_url('bike/load_bike_main_type'), true);
        }
        $data['grid_data'] = $gridObj->getGrid();

        $data['nav_array'] = array(
            array('title' => 'Manage Bike Main Type', 'url' => '')
        );
        $options = array(
            'type_name' => 'Main Type Name'
        );
        $data['search_option'] = $options;
        $data['msg'] = $this->session->flashdata('msg');
        $data['error_msg'] = $this->session->flashdata('error_msg');
        $data['dir'] = $this->dir;
        $data['page_title'] = 'Manage Bike Main Type';
        $data['page'] = 'bike_main_type';
        $this->load->view('main', $data);
    }

    function load_bike_main_type() {
        $this->bike_model->get_bike_main_type_grid();
    }

    function new_bike_main_type() {
        if ($_POST['save']) {
            if ($this->form_validation->run('valid_bike_main_type')) {
                if ($this->bike_model->save_bike_main_type()) {
                    $this->session->set_flashdata('msg', 'Content Added Successfully!!!');
                    redirect('bike/bike_main_type');
                }
            }
        }
        $data['dir'] = $this->dir;
        $data['page_title'] = 'Add New Bike Type';
        $data['action'] = 'bike/new_bike_main_type';
        $data['msg'] = $this->session->flashdata('msg');
        $data['page'] = 'new_bike_main_type';
        $this->load->view('main', $data);
    }

    function edit_bike_main_type($type_id='') {

        if ($type_id == '') {
            redirect('bike/bike_main_type');
        }
        if ($_REQUEST['save']) {
            if ($this->form_validation->run('valid_bike_main_type')) {
                if ($this->bike_model->update_bike_main_type()) {
                    $this->session->set_flashdata('msg', 'Content Updated Successfully!!!');
                    redirect('bike/bike_main_type');
                }
            }
        }
        $data = sql::row('main_type', "main_type_id=$type_id");
        $this->session->set_userdata('main_type_id', $data['main_type_id']);
        $data['nav_array'] = array(
            array('title' => 'Manage Bike Type', 'url' => site_url('bike/bike_main_type')),
            array('title' => 'Edit Bike Type', 'url' => '')
        );
        $data['dir'] = 'bike';
        $data['page_title'] = 'Edit Bike Type';
        $data['action'] = 'bike/edit_bike_main_type/' . $type_id;
        $data['page'] = 'new_bike_main_type';
        $this->load->view('main', $data);
    }

    function bike_main_type_status($status='1', $id='') {

       $type_id = $id;
        if ($type_id == '') {
            redirect('bike/bike_main_type');
        }
        $data = array('type_status' => $status);
        $this->db->update('main_type', $data, array('main_type_id' => $type_id));
        $this->session->set_flashdata('msg', 'Status Updated!!!');
        redirect('bike/bike_main_type');
    }      
    
    function is_valid_bike_main_type() {
        if (sql::count("main_type", "type_name='{$_POST['type_name']}'") > 0 && $_POST['sess_value'] == '') {
            $this->form_validation->set_message('is_valid_bike_main_type', "The Type Name is already Used! Try another.");
            return false;
        } else {
            return true;
        }
    }
   
    function delete_bike_main_type($id = '') {
        $type_id = $id;
        if ($type_id == '') {
            redirect('bike/bike_main_type');
        }
        @unlink(UPLOAD_PATH . "bike_type_image/" . $file['bike_image']);
        $this->db->delete('main_type', array('main_type_id' => $type_id));
        $this->session->set_flashdata('msg', 'Successfully Deleted!!!');
        common::redirect();
    }
    
    function bike_model() {
        $data['nav_array'] = array(
            array('title' => 'Manage Bike', 'url' => '')
        );
        $this->load->library('grid');
        $gridObj = new grid();
        $gridColumn = array('Make','Model Name','Main Type Name', 'Type Name','Status');
        $gridColumnModel = array(           
            array("name" => "",
                "index" => "",
                "width" => 2,
                "sortable" => true,
                "align" => "center",
                "editable" => true
            ),
             array("name" => "",
                "index" => "",
                "width" => 2,
                "sortable" => true,
                "align" => "center",
                "editable" => true
            ),
             array("name" => "",
                "index" => "",
                "width" => 2,
                "sortable" => true,
                "align" => "center",
                "editable" => true
            ),
             array("name" => "",
                "index" => "",
                "width" => 2,
                "sortable" => true,
                "align" => "center",
                "editable" => true
            ),
             array("name" => "",
                "index" => "",
                "width" => 1,
                "sortable" => true,
                "align" => "center",
                "editable" => true
            )
        );
        if ($_POST['search']) {
            $gridObj->setGridOptions("Manage Bike Model", 880, 300, "model_id", "desc", $gridColumn, $gridColumnModel, site_url('?c=bike&m=load_bike_model&model_name=' . $_POST['model_name']), true);
        } else {
            $gridObj->setGridOptions("Manage Bike Model", 880, 300, "model_id", "desc", $gridColumn, $gridColumnModel, site_url('bike/load_bike_model'), true);
        }
        $data['grid_data'] = $gridObj->getGrid();
        $data['msg'] = $this->session->flashdata('msg');
        $data['dir'] = $this->dir;
        $data['page'] = 'bike_model';
        $data['page_title'] = 'Manage Bike';
        $this->load->view('main', $data);
    }

    function load_bike_model() {
        $this->bike_model->get_bike_model_grid();
    }

    function new_bike_model() {
        if ($_POST['save']) {
            if ($this->form_validation->run('valid_bike_model')) {
                $this->bike_model->save_bike_model(); //Don't Change
                $this->session->set_flashdata('msg', 'Successfully Added!!!');
                redirect('bike/bike_model');
            }
        }
        $data['nav_array'] = array(
            array('title' => 'Manage Bike Model', 'url' => site_url('bike_model')),
            array('title' => 'Add New Bike Model', 'url' => '')
        );

        $data['dir'] = $this->dir;
        $data['action'] = 'bike/new_bike_model';
        $data['page'] = 'bike_model_form';
        $data['page_title'] = 'Add New Bike Model';
        $this->load->view('main', $data);
    }

    function is_valid_bike_model() {
        if (sql::count("model", "model_name='{$_POST['model_name']}'") > 0 && $_POST['sess_value'] == '') {
            $this->form_validation->set_message('is_valid_bike_model', "The Model Name is already Used! Try another.");
            return false;
        } else {
            return true;
        }
    }

    function edit_bike_model($id = '') {
        $model_id = $id;
        if ($_POST['save']) {
            if ($this->form_validation->run('valid_bike_model')) {
                $this->bike_model->update_bike_model($model_id); //Don't Change
                $this->session->set_flashdata('msg', 'Successfully Updated!!!');
                redirect('bike/bike_model');
            }
        }
        if (!is_numeric($model_id)) {
            redirect('bike/bike_model');
        }
        $data = sql::row('model', 'model_id=' . $model_id); //Don't Change
        $this->session->set_userdata('model_id', $data['model_id']); //Don't Change
        $data['nav_array'] = array(
            array('title' => 'Manage Bike', 'url' => site_url('bike/bike_model')),
            array('title' => 'Edit Bike', 'url' => '')
        );
        $data['dir'] = $this->dir;
        $data['action'] = 'bike/edit_bike_model/' . $id;
        $data['page'] = 'bike_model_form';
        $data['page_title'] = 'Edit Bike Model';
        $this->load->view('main', $data);
    }

    function delete_bike_model($id = '') {
        $model_id = $id;
        if ($model_id == '') {
            redirect('bike/bike_model');
        }
        $this->db->delete('model', array('model_id' => $model_id));
        $this->session->set_flashdata('msg', 'Successfully Deleted!!!');
        common::redirect();
    }

    function bike_model_status($status = 1, $id = '') {
        $model_id = $id;
        if ($model_id == '') {
            redirect('bike/bike_model');
        }
        $data = array('model_status' => $status);
        $this->db->update('model', $data, array('model_id' => $model_id));
        $this->session->set_flashdata('msg', 'Status Updated!!!');
        redirect('bike/bike_model');
    }

    function bike_make() {
        $data['nav_array'] = array(
            array('title' => 'Manage Bike Make', 'url' => '')
        );
        $this->load->library('grid');
        $gridObj = new grid();
        $gridColumn = array('Make', 'Status');
        $gridColumnModel = array(
            array("name" => "",
                "index" => "",
                "width" => 3,
                "sortable" => true,
                "align" => "left",
                "editable" => true
            ),
           
            array("name" => "",
                "index" => "",
                "width" => 2,
                "sortable" => true,
                "align" => "center",
                "editable" => true
            )
        );
        if ($_POST['search']) {
            $gridObj->setGridOptions("Manage Bike Make", 880, 300, "make_id", "desc", $gridColumn, $gridColumnModel, site_url('?c=bike&m=load_bike_make&make_name=' . $_POST['make_name']), true);
        } else {
            $gridObj->setGridOptions("Manage Bike Make", 880, 300, "make_id", "desc", $gridColumn, $gridColumnModel, site_url('bike/load_bike_make'), true);
        }
        $data['grid_data'] = $gridObj->getGrid();
        $data['msg'] = $this->session->flashdata('msg');
        $data['dir'] = $this->dir;
        $data['page'] = 'bike_make';
        $data['page_title'] = 'Manage Bike make';
        $this->load->view('main', $data);
    }

    function load_bike_make() {
        $this->bike_model->get_bike_make_grid();
    }

    function new_bike_make() {
        if ($_POST['save']) {
            if ($this->form_validation->run('valid_bike_make')) {
                $this->bike_model->save_bike_make(); //Don't Change
                $this->session->set_flashdata('msg', 'Successfully Added!!!');
                redirect('bike/bike_make');
            }
        }
        $data['nav_array'] = array(
            array('title' => 'Manage Bike Make', 'url' => site_url('bike_make')),
            array('title' => 'Add New Bike Make', 'url' => '')
        );

        $data['dir'] = $this->dir;
        $data['action'] = 'bike/new_bike_make';
        $data['page'] = 'bike_make_form';
        $data['page_title'] = 'Add New Bike Make';
        $this->load->view('main', $data);
    }

    function edit_bike_make($id = '') {
        $make_id = $id;
        if ($_POST['save']) {
            if ($this->form_validation->run('valid_bike_make')) {
                $this->bike_model->update_bike_make($make_id); //Don't Change
                $this->session->set_flashdata('msg', 'Successfully Updated!!!');
                redirect('bike/bike_make');
            }
        }
        if (!is_numeric($make_id)) {
            redirect('bike/bike_make');
        }
        $data = sql::row('make', 'make_id=' . $make_id); //Don't Change
        $this->session->set_userdata('make_id', $data['make_id']); //Don't Change
        $data['nav_array'] = array(
            array('title' => 'Manage Bike make', 'url' => site_url('bike/bike_make')),
            array('title' => 'Edit Bike make', 'url' => '')
        );
        $data['dir'] = $this->dir;
        $data['action'] = 'bike/edit_bike_make/' . $id;
        $data['page'] = 'bike_make_form';
        $data['page_title'] = 'Edit Bike make';
        $this->load->view('main', $data);
    }

    function delete_bike_make($id = '') {
        $make_id = $id;
        if ($make_id == '') {
            redirect('bike/bike_make');
        }
        $this->db->delete('make', array('make_id' => $make_id));
        $this->session->set_flashdata('msg', 'Successfully Deleted!!!');
        common::redirect();
    }

    function bike_make_status($status = 1, $id = '') {
        $make_id = $id;
        if ($make_id == '') {
            redirect('bike/bike_make');
        }
        $data = array('make_status' => $status);
        $this->db->update('make', $data, array('make_id' => $make_id));
        $this->session->set_flashdata('msg', 'Status Updated!!!');
        redirect('bike/bike_make');
    }

    function bike_type() {
        $this->load->library('grid');
        $gridObj = new grid();
        $gridColumn = array('Type Name','Image', 'Status');
        $gridColumnModel = array(
            array("name" => "",
                "index" => "",
                "width" => 100,
                "sortable" => FALSE,
                "align" => "left",
                "editable" => FALSE
            ),
            array("name" => "",
                "index" => "",
                "width" => 100,
                "sortable" => FALSE,
                "align" => "center",
                "editable" => FALSE
            ),
            array("name" => "",
                "index" => "",
                "width" => 50,
                "sortable" => true,
                "align" => "center",
                "editable" => true
            )
        );
        if ($_POST['search']) {
           $gridObj->setGridOptions("Manage Bike Type", 880, 300, "main_type_id", "desc", $gridColumn, $gridColumnModel, site_url('?c=bike&m=load_bike_type&type_name=' . $_POST['type_name']), true);
        } else {
            $gridObj->setGridOptions("Manage Bike Type", 880, 300, "main_type_id", "asc", $gridColumn, $gridColumnModel, site_url('bike/load_bike_type'), true);
        }
        $data['grid_data'] = $gridObj->getGrid();

        $data['nav_array'] = array(
            array('title' => 'Manage Bike Type', 'url' => '')
        );
        $options = array(
            'type_name' => 'Type Name'
        );
        $data['search_option'] = $options;
        $data['msg'] = $this->session->flashdata('msg');
        $data['error_msg'] = $this->session->flashdata('error_msg');
        $data['dir'] = $this->dir;
        $data['page_title'] = 'Manage Bike Type';
        $data['page'] = 'bike_type';
        $this->load->view('main', $data);
    }

    function load_bike_type() {
        $this->bike_model->get_bike_type_grid();
    }

    function new_bike_type() {
        if ($_POST['save']) {
            if ($this->form_validation->run('valid_bike_type')) {
                if ($this->bike_model->save_bike_type()) {
                    $this->session->set_flashdata('msg', 'Content Added Successfully!!!');
                    redirect('bike/bike_type');
                }
            }
        }
        $data['dir'] = $this->dir;
        $data['page_title'] = 'Add New Bike Type';
        $data['action'] = 'bike/new_bike_type';
        $data['msg'] = $this->session->flashdata('msg');
        $data['page'] = 'new_bike_type';
        $this->load->view('main', $data);
    }

    function edit_bike_type($type_id='') {

        if ($type_id == '') {
            redirect('bike/bike_type');
        }
        if ($_REQUEST['save']) {
            if ($this->form_validation->run('valid_bike_type')) {
                if ($this->bike_model->update_bike_type()) {
                    $this->session->set_flashdata('msg', 'Content Updated Successfully!!!');
                    redirect('bike/bike_type');
                }
            }
        }
        $data = sql::row('type', "type_id=$type_id");
        $this->session->set_userdata('type_id', $data['type_id']);
        $data['nav_array'] = array(
            array('title' => 'Manage Bike Type', 'url' => site_url('bike/bike_type')),
            array('title' => 'Edit Bike Type', 'url' => '')
        );
        $data['dir'] = 'bike';
        $data['page_title'] = 'Edit Bike Type';
        $data['action'] = 'bike/edit_bike_type/' . $type_id;
        $data['page'] = 'new_bike_type';
        $this->load->view('main', $data);
    }

    function bike_type_status($status='1', $id='') {

       $type_id = $id;
        if ($type_id == '') {
            redirect('bike/bike_type');
        }
        $data = array('type_status' => $status);
        $this->db->update('type', $data, array('type_id' => $type_id));
        $this->session->set_flashdata('msg', 'Status Updated!!!');
        redirect('bike/bike_type');
    }

      
    
    function is_valid_bike_type() {
        if (sql::count("type", "type_name='{$_POST['type_name']}'") > 0 && $_POST['sess_value'] == '') {
            $this->form_validation->set_message('is_valid_bike_type', "The Type Name is already Used! Try another.");
            return false;
        } else {
            return true;
        }
    }
    
     function is_valid_bike_make() {
        if (sql::count("make", "make_name='{$_POST['make_name']}'") > 0 && $_POST['sess_value'] == '') {
            $this->form_validation->set_message('is_valid_bike_make', "The Make Name is already Used! Try another.");
            return false;
        } else {
            return true;
        }
    }


   
      function delete_bike_type($id = '') {
        $type_id = $id;
        if ($type_id == '') {
            redirect('bike/bike_type');
        }
        $this->db->delete('type', array('type_id' => $type_id));
        $this->db->delete('type', array('type_parent_id' => $type_id));
        $this->session->set_flashdata('msg', 'Successfully Deleted!!!');
        common::redirect();
    }
    
     function get_make() {
        echo $this->bike_model->get_make_options($_POST['type_id']);
    }
    
     function get_type() {
        echo $this->bike_model->get_type_options_ajax($_POST['main_type_id']);
    }
    
  

}

?>