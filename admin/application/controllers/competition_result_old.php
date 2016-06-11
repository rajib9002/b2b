<?php

class competition_result extends Controller {

    public function __construct() {
        parent::Controller();
        $this->load->model('mod_competition_result');
        common::is_logged();
    }

    function index() {
        $this->load->library('grid');
        $gridObj = new grid();
        $gridColumn = array('Competition Name','Round','Class','Date','Status');
        $gridColumnModel = array(
            array("name" => "competitionr_name ",
                "index" => "competitionr_name ",
                "width" => 50,
                "sortable" => true,
                "align" => "left",
                "editable" => true
            ),
            array("name" => "competitionr_details_round",
                "index" => "competitionr_details_round",
                "width" => 50,
                "sortable" => true,
                "align" => "left",
                "editable" => true
            ),
            array("name" => "class_name",
                "index" => "class_name",
                "width" => 50,
                "sortable" => true,
                "align" => "left",
                "editable" => true
            ),
            array("name" => "competition_result_date",
                "index" => "competition_result_date",
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
            $gridObj->setGridOptions("Manage Competition Results", 880, 400, "competition_result_id", "asc", $gridColumn, $gridColumnModel, site_url("?c=competition_result&m=load_competition_result&searchField={$_POST['searchField']}&searchValue={$_POST['searchValue']}&status={$_POST['status']}"), true);
        } else {
            $gridObj->setGridOptions("Manage Competition Results", 880, 400, "competition_result_id", "asc", $gridColumn, $gridColumnModel, site_url('competition_result/load_competition_result'), true);
        }
        $data['grid_data'] = $gridObj->getGrid();
        $data['dir'] = 'competition_result';
        $data['page'] = 'index';
        $this->load->view('main', $data);
    }
    function load_competition_result() { 
        $this->mod_competition_result->get_description_grid();
    }

    function add_competition_result() {
        if ($_POST['save']) {
            if ($this->form_validation->run('valid_competition_result')) {
                $this->mod_competition_result->save_product();
                $this->session->set_flashdata('msg', 'competition_result Added Successfully!!!');
                redirect('competition_result');
            }
        }
        $data['editor'] = TRUE;
        $data['dir'] = 'competition_result';
        $data['page'] = 'add_competition_result';
        $data['action'] = 'competition_result/add_competition_result';
        $this->load->view('main', $data);
    }

    function edit_competition_result($competition_result_id='') {
        $data= sql::row("competition_result", "competition_result_id=$competition_result_id");
        $data['competitor']=sql::rows('competitor',"result_id=$competition_result_id");
        if ($_POST['save']) {
            if ($this->form_validation->run('valid_competition_result')) {
                $this->mod_competition_result->edit_description($competition_result_id);
                $this->session->set_flashdata('msg', 'competition_result Updated Successfully!!!');
                redirect('competition_result');
            }
        }
        $data['editor'] = TRUE;
        $data['dir'] = 'competition_result';
        $data['page'] = 'edit_competition_result';
        $data['action'] = 'competition_result/edit_competition_result/' . $competition_result_id;
        $this->load->view('main', $data);
    }

    function delete_com($competition_result_id='') {
        if ($competition_result_id == '') {
            redirect('competition_result');
        }
        sql::delete('competition_result', 'competition_result_id=' . $competition_result_id);
		 sql::delete('competitor', 'result_id=' . $competition_result_id);
        $this->session->set_flashdata('msg', 'Successfully Deleted!!!');
        common::redirect();
    }

    function com_status($status='', $competition_result_id='') {
        if ($competition_result_id == '') {
            redirect('competition_result');
        }
        $con = "competition_result_id='$competition_result_id'";
        $updateOp = "status='$status'";
        sql::change_status('competition_result', $con, $updateOp);
        $this->session->set_flashdata('msg', 'Status Updated!!!');
        common::redirect();
    }

}

?>