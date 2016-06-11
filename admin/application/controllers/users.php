<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of users
 *
 * @author Anwar
 */
class users extends Controller {

    private $dir = 'users';

    function __construct() {
        parent::__construct();
        common::is_admin_logged();
        $this->load->model('users_model');
    }

    function index() {
        $data['nav_array'] = array(
            array('title' => 'Manage Users', 'url' => '')
        );
        $this->load->library('grid');
        $gridObj = new grid();
        $gridColumn = array('User Name', 'Full Name', 'Email', 'Status');
        $gridColumnModel = array(
            array("name" => "user_name",
                "index" => "user_name",
                "width" => 25,
                "sortable" => true,
                "align" => "left",
                "editable" => true
            ),
            array("name" => "user_full_name",
                "index" => "user_full_name",
                "width" => 25,
                "sortable" => true,
                "align" => "left",
                "editable" => true
            ),
            array("name" => "user_email",
                "index" => "user_email",
                "width" => 22,
                "sortable" => true,
                "align" => "center",
                "editable" => true
            ),
            array("name" => "user_status",
                "index" => "user_status",
                "width" => 10,
                "sortable" => true,
                "align" => "center",
                "editable" => true
            )
        );
        if ($_POST['search']) {
            $gridObj->setGridOptions("Manage Users", 880, 300, "user_name", "asc", $gridColumn, $gridColumnModel, site_url('?c=users&m=load_users&uid=' . $_POST['uid']), true);
        } else {
            $gridObj->setGridOptions("Manage Users", 880, 300, "user_name", "asc", $gridColumn, $gridColumnModel, site_url('users/load_users'), true);
        }
        $data['grid_data'] = $gridObj->getGrid();
        $data['msg'] = $this->session->flashdata('msg');
        $data['dir'] = $this->dir;
        $data['page'] = 'index';
        $data['page_title'] = 'Manage Users';
        $this->load->view('main', $data);
    }

    function load_users() {
        $this->users_model->get_users_grid();
    }

    function new_user() {
        if ($_POST['save']) {
            if ($this->form_validation->run('valid_user')) {
                $this->users_model->save_user(); //Don't Change
                $this->session->set_flashdata('msg', 'Successfully Added!!!');
                redirect('users');
            }
        }
        $data['nav_array'] = array(
            array('title' => 'Manage users', 'url' => site_url('users')),
            array('title' => 'Add New users', 'url' => '')
        );

        $data['dir'] = $this->dir;
        $data['action'] = 'users/new_user';
        $data['page'] = 'user_form';
        $data['page_title'] = 'Add New users';
        $this->load->view('main', $data);
    }

    function is_valid_user() {
        if (sql::count("users", "user_name='{$_POST['user_name']}'") > 0 && $_POST['sess_value'] == '') {
            $this->form_validation->set_message('is_valid_user', "The User Name is already Used! Try another.");
            return false;
        } else {
            return true;
        }
    }

    function edit_user($id='') {
        $user_id = $id - ID_GENERATE;
        if ($_POST['save']) {
            if ($this->form_validation->run('valid_user')) {
                $this->users_model->update_user(); //Don't Change
                $this->session->set_flashdata('msg', 'Successfully Updated!!!');
                redirect('users');
            }
        }
        if (!is_numeric($user_id)) {
            redirect('users');
        }
        $data = sql::row('users', 'user_id=' . $user_id); //Don't Change
        
       // echo $data['full_access'];
        
        $this->session->set_userdata('edit_user_id', $data['user_id']); //Don't Change
        $data['nav_array'] = array(
            array('title' => 'Manage Users', 'url' => site_url('users')),
            array('title' => 'Edit Users', 'url' => '')
        );
        $data['dir'] = $this->dir;
        $data['action'] = 'users/edit_user/' . $id;
        $data['page'] = 'user_form';
        $data['page_title'] = 'Edit Users';
        $this->load->view('main', $data);
    }

    function delete_user($id='') {
        $user_id = $id - ID_GENERATE;
        if ($user_id == '') {
            redirect('users');
        }
        $this->db->delete('users', array('user_id' => $user_id));
        $this->session->set_flashdata('msg', 'Successfully Deleted!!!');
        common::redirect();
    }

    function user_status($status=1, $id='') {
        $user_id = $id - ID_GENERATE;
        if ($user_id == '') {
            redirect('users');
        }
        $data = array('user_status' => $status);
        $this->db->update('users', $data, array('user_id' => $user_id));
        $this->session->set_flashdata('msg', 'Status Updated!!!');
        redirect('users');
    }
    
    
    
    function user_level() {
        $data['nav_array'] = array(
            array('title' => 'Manage User Level', 'url' => '')
        );
        $this->load->library('grid');
        $gridObj = new grid();
        $gridColumn = array('Level Name', 'Points', 'Status');
        $gridColumnModel = array(
            array("name" => "level_name",
                "index" => "level_name",
                "width" => 10,
                "sortable" => true,
                "align" => "center",
                "editable" => true
            ),
            array("name" => "level_point",
                "index" => "level_point",
                "width" => 10,
                "sortable" => true,
                "align" => "center",
                "editable" => true
            ),
            array("name" => "level_status",
                "index" => "level_status",
                "width" => 5,
                "sortable" => true,
                "align" => "center",
                "editable" => true
            )
        );
        if ($_POST['search']) {
            $gridObj->setGridOptions("Manage Level Name", 880, 300, "level_id", "desc", $gridColumn, $gridColumnModel, site_url('?c=users&m=load_level&level_name=' . $_POST['level_name']), true);
        } else {
            $gridObj->setGridOptions("Manage Level Name", 880, 300, "level_id", "desc", $gridColumn, $gridColumnModel, site_url('users/load_level'), true);
        }
        $data['grid_data'] = $gridObj->getGrid();
        $data['msg'] = $this->session->flashdata('msg');
        $data['dir'] = $this->dir;
        $data['page'] = 'user_level';
        $data['page_title'] = 'Manage Level Name';
        $this->load->view('main', $data);
    }

    function load_level() {
        $this->users_model->get_user_level_grid();
    }

    function new_level() {
        if ($_POST['save']) {
            if ($this->form_validation->run('valid_level_name')) {
                $this->users_model->save_level(); //Don't Change
                $this->session->set_flashdata('msg', 'Successfully Added!!!');
                redirect('users/user_level');
            }
        }
        $data['nav_array'] = array(
            array('title' => 'Manage Level Name', 'url' => site_url('users/level')),
            array('title' => 'Add New Level Name', 'url' => '')
        );

        $data['dir'] = $this->dir;
        $data['action'] = 'users/new_level';
        $data['page'] = 'level_form';
        $data['page_title'] = 'Add New Level Name';
        $this->load->view('main', $data);
    }

    function is_valid_level() {
        if (sql::count("user_levels", "level_name='{$_POST['level_name']}'") > 0 && $_POST['sess_value'] == '') {
            $this->form_validation->set_message('is_valid_level', "The Level Name Name is already Used! Try another.");
            return false;
        } else {
            return true;
        }
    }

    function edit_level($id = '') {
        $level_id = $id;
        if ($_POST['save']) {
            if ($this->form_validation->run('valid_level_name')) {
                $this->users_model->update_level($level_id); //Don't Change
                $this->session->set_flashdata('msg', 'Successfully Updated!!!');
                redirect('users/user_level');
            }
        }
        if (!is_numeric($level_id)) {
            redirect('users/user_level');
        }
        $data = sql::row('user_levels', 'level_id=' . $level_id); //Don't Change
        $this->session->set_userdata('level_id', $data['level_id']); //Don't Change
        $data['nav_array'] = array(
            array('title' => 'Manage Level Name', 'url' => site_url('users')),
            array('title' => 'Edit Level Name', 'url' => '')
        );
        $data['dir'] = $this->dir;
        $data['action'] = 'users/edit_level/' . $id;
        $data['page'] = 'level_form';
        $data['page_title'] = 'Edit Level Name';
        $this->load->view('main', $data);
    }

    function delete_level($id = '') {
        $level_id = $id;
        if ($level_id == '') {
            redirect('users/user_level');
        }
        $this->db->delete('user_levels', array('level_id' => $level_id));
        $this->session->set_flashdata('msg', 'Successfully Deleted!!!');
        common::redirect();
    }

    function level_status($status = 1, $id = '') {
        $level_id = $id;
        if ($level_id == '') {
            redirect('users/level');
        }
        $data = array('level_status' => $status);
        $this->db->update('user_levels', $data, array('level_id' => $level_id));
        $this->session->set_flashdata('msg', 'Status Updated!!!');
        redirect('users/user_level');
    }
    

}

?>