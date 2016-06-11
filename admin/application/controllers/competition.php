<?php

class competition extends Controller {

    public function __construct() {
        parent::Controller();
        $this->load->model('mod_competition');
        common::is_logged();
    }

    function index() {
        $this->load->library('grid');
        $gridObj = new grid();
        $gridColumn = array('Country','Title','Club','Veneue','Description', 'Date','Image', 'Status');
        $gridColumnModel = array(
            array("name" => "country_name",
                "index" => "country_name",
                "width" => 50,
                "sortable" => true,
                "align" => "left",
                "editable" => true
            ),
            array("name" => "competition_title",
                "index" => "competition_title",
                "width" => 50,
                "sortable" => true,
                "align" => "left",
                "editable" => true
            ),
            array("name" => "competition_club",
                "index" => "competition_club",
                "width" => 50,
                "sortable" => true,
                "align" => "left",
                "editable" => true
            ),
            array("name" => "competition_venue",
                "index" => "competition_venue",
                "width" => 50,
                "sortable" => true,
                "align" => "left",
                "editable" => true
            ),
            array("name" => "competition_des",
                "index" => "competition_des",
                "width" => 50,
                "sortable" => true,
                "align" => "center",
                "editable" => true
            ),
            array("name" => "competition_date",
                "index" => "competition_date",
                "width" => 50,
                "sortable" => true,
                "align" => "left",
                "editable" => true
            ),
            array("name" => "image",
                "index" => "image",
                "width" => 50,
                "sortable" => true,
                "align" => "left",
                "editable" => true
            ),
            array("name" => "status",
                "index" => "status",
                "width" => 50,
                "sortable" => true,
                "align" => "center",
                "editable" => true
            )
        );
        if ($_POST['apply_filter']) {
            $gridObj->setGridOptions("Manage Competition Events and Venue", 880, 400, "competition_id", "asc", $gridColumn, $gridColumnModel, site_url("?c=competition&m=load_competition&searchField={$_POST['searchField']}&searchValue={$_POST['searchValue']}&status={$_POST['status']}"), true);
        } else {
            $gridObj->setGridOptions("Manage Competition Events and Venue", 880, 400, "competition_id", "asc", $gridColumn, $gridColumnModel, site_url('competition/load_competition'), true);
        }
        $data['grid_data'] = $gridObj->getGrid();
        $data['dir'] = 'competition';
        $data['page'] = 'index';
        $this->load->view('main', $data);
    }
    function load_competition() { 
        $this->mod_competition->get_description_grid();
    }

    function add_competition() {
        if ($_POST['save']) {
            if ($this->form_validation->run('valid_competition')) {
                $this->mod_competition->save_product();
                $this->session->set_flashdata('msg', 'competition Added Successfully!!!');
                redirect('competition');
            }
        }
        $data['editor'] = TRUE;
        $data['dir'] = 'competition';
        $data['page'] = 'add_competition';
        $data['action'] = 'competition/add_competition';
        $this->load->view('main', $data);
    }

    function edit_competition($competition_id='') {
        $data['product_data'] = sql::row("competition", "competition_id=$competition_id");
        $image = $data['product_data']['image'];
        if ($_POST['save']) {
            if ($this->form_validation->run('valid_competition')) {
                $this->mod_competition->edit_description($competition_id,$image);
                $this->session->set_flashdata('msg', 'competition Updated Successfully!!!');
                redirect('competition');
            }
        }
        $data['editor'] = TRUE;
        $data['dir'] = 'competition';
        $data['page'] = 'edit_competition';
        $data['action'] = 'competition/edit_competition/' . $competition_id;
        $this->load->view('main', $data);
    }

    function delete_com($competition_id='') {
        if ($competition_id == '') {
            redirect('competition');
        }
        sql::delete('competition', 'competition_id=' . $competition_id);
        $this->session->set_flashdata('msg', 'Successfully Deleted!!!');
        common::redirect();
    }

    function com_status($status='', $competition_id='') {
        if ($competition_id == '') {
            redirect('competition');
        }
        $con = "competition_id='$competition_id'";
        $updateOp = "status='$status'";
        sql::change_status('competition', $con, $updateOp);
        $this->session->set_flashdata('msg', 'Status Updated!!!');
        common::redirect();
    }

}

?>